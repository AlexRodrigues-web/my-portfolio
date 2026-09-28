<?php
require_once __DIR__ . '/config.php';

if (!function_exists('adc_op_http')) {
    function adc_op_http($url, $method = 'GET', $body = null, $headers = array())
    {
        $config = adc_op_config();
        $defaultHeaders = array('Accept: application/json, application/rss+xml, application/xml, text/xml;q=0.9, */*;q=0.8');
        $headers = array_merge($defaultHeaders, $headers);

        if (function_exists('curl_init')) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 12);
            curl_setopt($ch, CURLOPT_TIMEOUT, 25);
            curl_setopt($ch, CURLOPT_USERAGENT, $config['user_agent']);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

            if (strtoupper($method) === 'POST') {
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            }

            $content = curl_exec($ch);
            $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            if ($content === false || $status < 200 || $status >= 300) {
                throw new RuntimeException('HTTP request failed (' . $status . '): ' . $error);
            }

            return $content;
        }

        $context = stream_context_create(array('http' => array(
            'method' => strtoupper($method),
            'timeout' => 25,
            'ignore_errors' => true,
            'header' => implode("\r\n", array_merge($headers, array('User-Agent: ' . $config['user_agent']))),
            'content' => $body === null ? '' : $body
        )));

        $content = @file_get_contents($url, false, $context);
        if ($content === false) {
            throw new RuntimeException('HTTP request failed for ' . $url);
        }

        return $content;
    }
}

function adc_op_clean_text($value)
{
    $value = html_entity_decode((string) $value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $value = strip_tags($value);
    $value = preg_replace('/\s+/u', ' ', $value);
    return trim($value);
}

function adc_op_lower($value)
{
    $value = adc_op_clean_text($value);
    return function_exists('mb_strtolower') ? mb_strtolower($value, 'UTF-8') : strtolower($value);
}

function adc_op_excerpt($value, $limit = 260)
{
    $value = adc_op_clean_text($value);
    if (function_exists('mb_strlen') && mb_strlen($value, 'UTF-8') > $limit) {
        return rtrim(mb_substr($value, 0, $limit - 1, 'UTF-8')) . '…';
    }
    if (strlen($value) > $limit) {
        return rtrim(substr($value, 0, $limit - 1)) . '…';
    }
    return $value;
}

function adc_op_days_since($dateValue)
{
    if ($dateValue === null || $dateValue === '') return 0;
    $timestamp = is_numeric($dateValue) ? (int) $dateValue : strtotime((string) $dateValue);
    if (!$timestamp) return 0;
    $days = (int) floor((time() - $timestamp) / 86400);
    return max(0, $days);
}

function adc_op_detect_mode($text, $explicit = '')
{
    $haystack = adc_op_lower($explicit . ' ' . $text);
    if (preg_match('/\b(hybrid|híbrido|hibrido)\b/u', $haystack)) return 'hybrid';
    if (preg_match('/\b(remote|remoto|teletrabalho|home office|work from home)\b/u', $haystack)) return 'remote';
    return 'onsite';
}

function adc_op_detect_level($text)
{
    $haystack = adc_op_lower($text);
    if (preg_match('/\b(junior|júnior|entry|graduate|trainee|intern|estágio|estagio)\b/u', $haystack)) return 'junior';
    if (preg_match('/\b(senior|sénior|lead|principal|staff|head)\b/u', $haystack)) return 'senior';
    if (preg_match('/\b(mid|middle|pleno|intermediate)\b/u', $haystack)) return 'mid';
    return 'any';
}

function adc_op_detect_category($text)
{
    $haystack = adc_op_lower($text);
    $map = array(
        'Frontend' => array('frontend', 'front-end', 'react', 'angular', 'vue'),
        'Backend' => array('backend', 'back-end', 'php', 'laravel', 'java', '.net', 'python', 'node'),
        'Full Stack' => array('full stack', 'fullstack'),
        'DevOps' => array('devops', 'cloud', 'aws', 'azure', 'kubernetes'),
        'Data' => array('data engineer', 'data scientist', 'analytics', 'bi '),
        'QA' => array('qa ', 'quality assurance', 'tester', 'testing'),
        'Support' => array('support', 'helpdesk', 'service desk')
    );
    foreach ($map as $label => $terms) {
        foreach ($terms as $term) {
            if (strpos($haystack, $term) !== false) return $label;
        }
    }
    return 'Technology';
}

function adc_op_detect_skills($text, $provided = array())
{
    $skills = array();
    foreach ((array) $provided as $skill) {
        $skill = trim(adc_op_clean_text($skill));
        if ($skill !== '') $skills[] = $skill;
    }
    $dictionary = array('PHP','Laravel','Symfony','JavaScript','TypeScript','React','Next.js','Vue','Angular','Node.js','Java','.NET','C#','Python','Django','SQL','MySQL','PostgreSQL','MongoDB','Docker','Kubernetes','AWS','Azure','Git','REST APIs','GraphQL','WordPress','HTML','CSS','Tailwind CSS','Bootstrap');
    $haystack = adc_op_lower($text);
    foreach ($dictionary as $skill) {
        if (strpos($haystack, adc_op_lower($skill)) !== false) $skills[] = $skill;
    }
    $skills = array_values(array_unique($skills));
    return array_slice($skills, 0, 8);
}

function adc_op_extract_requirements($html)
{
    $items = array();
    if (preg_match_all('/<li[^>]*>(.*?)<\/li>/is', (string) $html, $matches)) {
        foreach ($matches[1] as $item) {
            $clean = adc_op_excerpt($item, 180);
            if ($clean !== '') $items[] = $clean;
            if (count($items) >= 3) break;
        }
    }
    return $items;
}

function adc_op_filter_stats_reset()
{
    $GLOBALS['adc_op_filter_stats'] = array(
        'accepted' => 0,
        'rejected_non_tech' => 0,
        'rejected_invalid' => 0
    );
}

function adc_op_filter_stats_add($key)
{
    if (!isset($GLOBALS['adc_op_filter_stats']) || !is_array($GLOBALS['adc_op_filter_stats'])) {
        adc_op_filter_stats_reset();
    }
    if (!isset($GLOBALS['adc_op_filter_stats'][$key])) {
        $GLOBALS['adc_op_filter_stats'][$key] = 0;
    }
    $GLOBALS['adc_op_filter_stats'][$key]++;
}

function adc_op_filter_stats_get()
{
    if (!isset($GLOBALS['adc_op_filter_stats']) || !is_array($GLOBALS['adc_op_filter_stats'])) {
        adc_op_filter_stats_reset();
    }
    return $GLOBALS['adc_op_filter_stats'];
}

function adc_op_is_rejected_role($title)
{
    $title = adc_op_lower($title);
    if ($title === '') return true;

    $alwaysRejected = '/\b(marketing|marketer|sales|vendas|recruiter|recruitment|recrutador|recrutamento|talent acquisition|human resources|recursos humanos|people operations|people partner|account executive|account manager|business development|customer success|customer service|social media|content writer|copywriter|communications|public relations|finance|financial controller|accountant|contabilista|legal counsel|lawyer|procurement|purchasing|office manager|administrative assistant|executive assistant)\b/u';
    if (preg_match($alwaysRejected, $title)) return true;

    $genericManagement = '/\b(product manager|product owner|project manager|program manager|programme manager|operations manager|general manager|delivery manager|scrum master|agile coach|business analyst)\b/u';
    if (preg_match($genericManagement, $title)) {
        $technicalQualifier = '/\b(technical|technology|information technology|it|software|systems?|digital|data|cloud|cyber|security|devops|web|application)\b/u';
        return !preg_match($technicalQualifier, $title);
    }

    return false;
}

function adc_op_is_tech_role($title, $category = '', $tags = array(), $description = '')
{
    $titleText = adc_op_lower($title);
    if ($titleText === '' || adc_op_is_rejected_role($titleText)) return false;

    $strongTitle = '/\b(developer|desenvolvedor(?:a)?|programmer|programador(?:a)?|software engineer|engenheir[oa] de software|front[ -]?end|back[ -]?end|full[ -]?stack|web developer|mobile developer|android developer|ios developer|wordpress developer|salesforce developer|php developer|laravel developer|react developer|javascript developer|typescript developer|node(?:\.js)? developer|java developer|python developer|\.net developer|c# developer|devops|devsecops|site reliability engineer|sre|cloud engineer|platform engineer|data engineer|data scientist|data analyst|machine learning engineer|ml engineer|ai engineer|artificial intelligence engineer|qa engineer|qa analyst|quality assurance|test automation|automation tester|software tester|cybersecurity engineer|cybersecurity analyst|security engineer|security analyst|soc analyst|network engineer|systems? engineer|systems? administrator|sysadmin|database administrator|dba|solutions architect|software architect|technical support|it support|application support|service desk|help desk|support engineer|it service engineer)\b/u';
    if (preg_match($strongTitle, $titleText)) return true;

    $context = adc_op_lower($category . ' ' . implode(' ', (array) $tags));
    $strongCategory = '/\b(software development|software engineering|programming|web development|information technology|it support|technical support|devops|cloud|data engineering|data science|analytics|quality assurance|qa|cybersecurity|information security|database|mobile development|machine learning|artificial intelligence)\b/u';
    $technicalRole = '/\b(engineer|engenheir[oa]|analyst|analista|architect|arquiteto|administrator|administrador|developer|desenvolvedor|programmer|programador|specialist|especialista|technician|técnico|tecnico|consultant|consultor|support|suporte|tester|testador)\b/u';

    if (preg_match($strongCategory, $context) && preg_match($technicalRole, $titleText)) return true;

    $explicitItRole = '/\b(it|software|systems?|application|cloud|data|security|cyber|network|database|web|mobile)\b.*\b(engineer|analyst|architect|administrator|specialist|technician|consultant|support)\b/u';
    if (preg_match($explicitItRole, $titleText)) return true;

    return false;
}

function adc_op_is_tech($text)
{
    return adc_op_is_tech_role($text);
}

function adc_op_is_freelance($text)
{
    return (bool) preg_match('/\b(freelance|freelancer|contractor|contract role|fixed.?price|hourly|prestação de serviços|prestacao de servicos)\b/u', adc_op_lower($text));
}

function adc_op_country_match($locationText, $region, $isRemote = false, $context = '')
{
    $location = adc_op_lower($locationText);
    $remoteContext = adc_op_lower($locationText . ' ' . $context);

    if ($region === 'portugal') {
        if (preg_match('/\b(portugal|portuguese|lisboa|lisbon|porto|braga|aveiro|coimbra|setúbal|setubal|faro|leiria|viseu|madeira|açores|acores|gaia|matosinhos)\b/u', $location)) return true;
        return $isRemote && (bool) preg_match('/\b(portugal|europe|european union|eu remote|emea|worldwide|anywhere)\b/u', $remoteContext);
    }

    if ($region === 'brazil') {
        if (preg_match('/\b(brazil|brasil|são paulo|sao paulo|rio de janeiro|curitiba|belo horizonte|florianópolis|florianopolis|porto alegre|recife|salvador|brasília|brasilia)\b/u', $location)) return true;
        return $isRemote && (bool) preg_match('/\b(brazil|brasil|latam|latin america|south america|worldwide|anywhere)\b/u', $remoteContext);
    }

    if ($region === 'europe') {
        if (preg_match('/\b(europe|european union|portugal|spain|france|germany|netherlands|ireland|italy|belgium|austria|sweden|denmark|finland|norway|poland|czech|czechia|romania|greece|croatia|slovenia|slovakia|hungary|estonia|latvia|lithuania|luxembourg|switzerland|united kingdom|uk)\b/u', $location)) return true;
        return $isRemote && (bool) preg_match('/\b(europe|european union|eu remote|emea|worldwide|anywhere)\b/u', $remoteContext);
    }

    return true;
}

function adc_op_valid_url($url)
{
    return filter_var($url, FILTER_VALIDATE_URL) && preg_match('/^https?:\/\//i', $url);
}

function adc_op_job($data)
{
    $defaults = array(
        'id' => '', 'title' => '', 'company' => 'Company not disclosed', 'region' => 'europe',
        'country' => '', 'city' => 'Location not disclosed', 'mode' => 'onsite', 'level' => 'any',
        'contract' => 'Contract not disclosed', 'kind' => 'job', 'source' => '', 'posted_days' => 0,
        'salary' => 'Salary not disclosed by source', 'skills' => array(), 'category' => 'Technology',
        'summary' => '', 'description' => '', 'requirements' => array(), 'featured' => false,
        'url' => '', 'published_at' => ''
    );
    $job = array_merge($defaults, $data);
    if (!adc_op_valid_url($job['url']) || trim($job['title']) === '' || trim($job['source']) === '') {
        adc_op_filter_stats_add('rejected_invalid');
        return null;
    }
    if (!adc_op_is_tech_role($job['title'], $job['category'], $job['skills'], $job['description'])) {
        adc_op_filter_stats_add('rejected_non_tech');
        return null;
    }
    adc_op_filter_stats_add('accepted');
    $job['summary'] = adc_op_excerpt($job['summary'] !== '' ? $job['summary'] : $job['description'], 260);
    $job['description'] = adc_op_excerpt($job['description'] !== '' ? $job['description'] : $job['summary'], 1600);
    $job['skills'] = array_values(array_unique((array) $job['skills']));
    $job['requirements'] = array_values(array_filter((array) $job['requirements']));
    return $job;
}

function adc_op_itjobs_rss()
{
    $config = adc_op_config();
    $xmlText = adc_op_http($config['itjobs_rss_url']);
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($xmlText, 'SimpleXMLElement', LIBXML_NOCDATA);
    if (!$xml || !isset($xml->channel->item)) throw new RuntimeException('Invalid ITJobs RSS feed.');
    $jobs = array();
    foreach ($xml->channel->item as $item) {
        $rawTitle = adc_op_clean_text((string) $item->title);
        $descriptionHtml = (string) $item->description;
        $description = adc_op_clean_text($descriptionHtml);
        $title = $rawTitle;
        $company = 'Company listed on ITJobs';
        $parts = preg_split('/\s+-\s+/u', $rawTitle);
        if (is_array($parts) && count($parts) >= 2) {
            $company = trim(array_pop($parts));
            $title = trim(implode(' - ', $parts));
        }
        $link = trim((string) $item->link);
        $pubDate = trim((string) $item->pubDate);
        $text = $title . ' ' . $description;
        $job = adc_op_job(array(
            'id' => 'itjobs-rss-' . sha1($link), 'title' => $title, 'company' => $company,
            'region' => 'portugal', 'country' => 'Portugal', 'city' => 'Portugal',
            'mode' => adc_op_detect_mode($text), 'level' => adc_op_detect_level($text),
            'contract' => adc_op_is_freelance($text) ? 'Service / contract' : 'See source',
            'kind' => adc_op_is_freelance($text) ? 'freelance' : 'job', 'source' => 'ITJobs',
            'posted_days' => adc_op_days_since($pubDate), 'skills' => adc_op_detect_skills($text),
            'category' => adc_op_detect_category($text), 'summary' => $description,
            'description' => $description, 'requirements' => adc_op_extract_requirements($descriptionHtml),
            'url' => $link, 'published_at' => $pubDate
        ));
        if ($job) $jobs[] = $job;
        if (count($jobs) >= 60) break;
    }
    return $jobs;
}

function adc_op_itjobs_api($apiKey)
{
    $config = adc_op_config();
    $body = http_build_query(array('api_key' => $apiKey, 'limit' => 100, 'page' => 1));
    $raw = adc_op_http($config['itjobs_api_url'], 'POST', $body, array('Content-Type: application/x-www-form-urlencoded'));
    $payload = json_decode($raw, true);
    if (!is_array($payload) || !isset($payload['results']) || !is_array($payload['results'])) throw new RuntimeException('Invalid ITJobs API response.');
    $jobs = array();
    foreach ($payload['results'] as $item) {
        $company = isset($item['company']['name']) ? $item['company']['name'] : 'Company listed on ITJobs';
        $locations = array();
        foreach (isset($item['locations']) ? (array) $item['locations'] : array() as $location) {
            if (isset($location['name'])) $locations[] = $location['name'];
        }
        $locationText = $locations ? implode(', ', $locations) : 'Portugal';
        $descriptionHtml = isset($item['body']) ? $item['body'] : '';
        $title = isset($item['title']) ? adc_op_clean_text($item['title']) : '';
        $workModel = isset($item['workModel']) ? (int) $item['workModel'] : 0;
        $mode = $workModel === 1 ? 'remote' : ($workModel === 2 ? 'hybrid' : 'onsite');
        $types = array();
        foreach (isset($item['types']) ? (array) $item['types'] : array() as $type) if (isset($type['name'])) $types[] = $type['name'];
        $slug = isset($item['slug']) ? $item['slug'] : '';
        $id = isset($item['id']) ? $item['id'] : sha1($title . $company);
        $url = 'https://www.itjobs.pt/oferta/' . rawurlencode($id) . '/' . rawurlencode($slug);
        $salary = 'Salary not disclosed by source';
        if (!empty($item['salaryMin']) || !empty($item['salaryMax'])) {
            $salary = '€' . (int) $item['salaryMin'] . '–€' . (int) $item['salaryMax'] . ' / year';
        }
        $text = $title . ' ' . adc_op_clean_text($descriptionHtml);
        $job = adc_op_job(array(
            'id' => 'itjobs-' . $id, 'title' => $title, 'company' => $company,
            'region' => 'portugal', 'country' => 'Portugal', 'city' => $locationText,
            'mode' => $mode, 'level' => adc_op_detect_level($text),
            'contract' => $types ? implode(', ', $types) : 'See source', 'kind' => adc_op_is_freelance($text) ? 'freelance' : 'job',
            'source' => 'ITJobs', 'posted_days' => adc_op_days_since(isset($item['publishedAt']) ? $item['publishedAt'] : ''),
            'salary' => $salary, 'skills' => adc_op_detect_skills($text), 'category' => adc_op_detect_category($text),
            'summary' => $descriptionHtml, 'description' => $descriptionHtml,
            'requirements' => adc_op_extract_requirements($descriptionHtml), 'url' => $url,
            'published_at' => isset($item['publishedAt']) ? $item['publishedAt'] : ''
        ));
        if ($job) $jobs[] = $job;
    }
    return $jobs;
}

function adc_op_arbeitnow($region)
{
    $config = adc_op_config();
    $raw = adc_op_http($config['arbeitnow_url']);
    $payload = json_decode($raw, true);
    if (!is_array($payload) || !isset($payload['data'])) throw new RuntimeException('Invalid Arbeitnow response.');
    $jobs = array();
    foreach ((array) $payload['data'] as $item) {
        $title = isset($item['title']) ? $item['title'] : '';
        $descriptionHtml = isset($item['description']) ? $item['description'] : '';
        $location = isset($item['location']) ? $item['location'] : 'Europe';
        $text = $title . ' ' . $location . ' ' . adc_op_clean_text($descriptionHtml) . ' ' . implode(' ', isset($item['tags']) ? (array) $item['tags'] : array());
        $freelance = adc_op_is_freelance($text . ' ' . implode(' ', isset($item['job_types']) ? (array) $item['job_types'] : array()));
        $mode = !empty($item['remote']) ? 'remote' : adc_op_detect_mode($text);
        if ($region === 'freelance' && !$freelance) continue;
        if ($region === 'brazil') continue;
        if ($region !== 'freelance' && !adc_op_country_match($location, $region, $mode === 'remote', $text)) continue;
        $targetRegion = $region === 'freelance' ? 'freelance' : $region;
        $job = adc_op_job(array(
            'id' => 'arbeitnow-' . (isset($item['slug']) ? $item['slug'] : sha1($title)),
            'title' => adc_op_clean_text($title), 'company' => isset($item['company_name']) ? adc_op_clean_text($item['company_name']) : 'Company listed on Arbeitnow',
            'region' => $targetRegion, 'country' => 'Europe', 'city' => adc_op_clean_text($location),
            'mode' => $mode, 'level' => adc_op_detect_level($text),
            'contract' => !empty($item['job_types']) ? implode(', ', (array) $item['job_types']) : ($freelance ? 'Contract / freelance' : 'See source'),
            'kind' => $freelance ? 'freelance' : 'job', 'source' => 'Arbeitnow',
            'posted_days' => adc_op_days_since(isset($item['created_at']) ? $item['created_at'] : ''),
            'skills' => adc_op_detect_skills($text, isset($item['tags']) ? $item['tags'] : array()),
            'category' => adc_op_detect_category($text), 'summary' => $descriptionHtml, 'description' => $descriptionHtml,
            'requirements' => adc_op_extract_requirements($descriptionHtml), 'url' => isset($item['url']) ? $item['url'] : '',
            'published_at' => isset($item['created_at']) ? date(DATE_ATOM, (int) $item['created_at']) : ''
        ));
        if ($job) $jobs[] = $job;
    }
    return $jobs;
}

function adc_op_remotive($region)
{
    $config = adc_op_config();
    $raw = adc_op_http($config['remotive_url']);
    $payload = json_decode($raw, true);
    if (!is_array($payload) || !isset($payload['jobs'])) throw new RuntimeException('Invalid Remotive response.');
    $jobs = array();
    foreach ((array) $payload['jobs'] as $item) {
        $title = isset($item['title']) ? $item['title'] : '';
        $descriptionHtml = isset($item['description']) ? $item['description'] : '';
        $candidateLocation = isset($item['candidate_required_location']) ? $item['candidate_required_location'] : 'Worldwide';
        $jobType = isset($item['job_type']) ? $item['job_type'] : '';
        $text = $title . ' ' . $candidateLocation . ' ' . $jobType . ' ' . adc_op_clean_text($descriptionHtml) . ' ' . implode(' ', isset($item['tags']) ? (array) $item['tags'] : array());
        $freelance = adc_op_is_freelance($text);
        if ($region === 'freelance' && !$freelance) continue;
        if ($region !== 'freelance' && !adc_op_country_match($candidateLocation, $region, true, $text)) continue;
        $targetRegion = $region === 'freelance' ? 'freelance' : $region;
        $job = adc_op_job(array(
            'id' => 'remotive-' . (isset($item['id']) ? $item['id'] : sha1($title)),
            'title' => adc_op_clean_text($title), 'company' => isset($item['company_name']) ? adc_op_clean_text($item['company_name']) : 'Company listed on Remotive',
            'region' => $targetRegion, 'country' => $candidateLocation, 'city' => $candidateLocation,
            'mode' => 'remote', 'level' => adc_op_detect_level($text),
            'contract' => $jobType !== '' ? adc_op_clean_text($jobType) : ($freelance ? 'Contract / freelance' : 'Remote role'),
            'kind' => $freelance ? 'freelance' : 'job', 'source' => 'Remotive',
            'posted_days' => adc_op_days_since(isset($item['publication_date']) ? $item['publication_date'] : ''),
            'salary' => !empty($item['salary']) ? adc_op_clean_text($item['salary']) : 'Salary not disclosed by source',
            'skills' => adc_op_detect_skills($text, isset($item['tags']) ? $item['tags'] : array()),
            'category' => isset($item['category']) ? adc_op_clean_text($item['category']) : adc_op_detect_category($text),
            'summary' => $descriptionHtml, 'description' => $descriptionHtml,
            'requirements' => adc_op_extract_requirements($descriptionHtml), 'url' => isset($item['url']) ? $item['url'] : '',
            'published_at' => isset($item['publication_date']) ? $item['publication_date'] : ''
        ));
        if ($job) $jobs[] = $job;
    }
    return $jobs;
}

function adc_op_jooble($region, $apiKey)
{
    $config = adc_op_config();
    $queries = array();
    if ($region === 'portugal') $queries = array(array('keywords' => 'developer, programador, frontend, backend, full stack, PHP, React, JavaScript', 'location' => 'Portugal'));
    elseif ($region === 'brazil') $queries = array(array('keywords' => 'desenvolvedor, programador, frontend, backend, full stack, PHP, React, JavaScript', 'location' => 'Brasil'));
    elseif ($region === 'freelance') $queries = array(
        array('keywords' => 'freelance developer, contractor software, prestação de serviços tecnologia', 'location' => 'Portugal'),
        array('keywords' => 'freelance developer, contract software', 'location' => 'Europe'),
        array('keywords' => 'freelance desenvolvedor, contrato tecnologia', 'location' => 'Brasil')
    );
    else $queries = array(array('keywords' => 'software developer, frontend, backend, full stack, PHP, React', 'location' => 'Europe'));

    $jobs = array();
    foreach ($queries as $query) {
        $query['radius'] = '80';
        $query['page'] = '1';
        $query['ResultOnPage'] = 50;
        $raw = adc_op_http($config['jooble_url'] . rawurlencode($apiKey), 'POST', json_encode($query), array('Content-Type: application/json'));
        $payload = json_decode($raw, true);
        if (!is_array($payload) || !isset($payload['jobs'])) continue;
        foreach ((array) $payload['jobs'] as $item) {
            $title = isset($item['title']) ? $item['title'] : '';
            $snippet = isset($item['snippet']) ? $item['snippet'] : '';
            $location = isset($item['location']) ? $item['location'] : '';
            $text = $title . ' ' . $snippet . ' ' . $location . ' ' . (isset($item['type']) ? $item['type'] : '');
                $freelance = adc_op_is_freelance($text);
            if ($region === 'freelance' && !$freelance) continue;
            $job = adc_op_job(array(
                'id' => 'jooble-' . (isset($item['id']) ? $item['id'] : sha1(isset($item['link']) ? $item['link'] : $title)),
                'title' => adc_op_clean_text($title), 'company' => !empty($item['company']) ? adc_op_clean_text($item['company']) : 'Company listed on Jooble',
                'region' => $region, 'country' => $region === 'brazil' ? 'Brazil' : ($region === 'portugal' ? 'Portugal' : 'Europe'),
                'city' => adc_op_clean_text($location) ?: 'Location not disclosed', 'mode' => adc_op_detect_mode($text),
                'level' => adc_op_detect_level($text), 'contract' => !empty($item['type']) ? adc_op_clean_text($item['type']) : 'See source',
                'kind' => $freelance ? 'freelance' : 'job', 'source' => 'Jooble',
                'posted_days' => adc_op_days_since(isset($item['updated']) ? $item['updated'] : ''),
                'salary' => !empty($item['salary']) ? adc_op_clean_text($item['salary']) : 'Salary not disclosed by source',
                'skills' => adc_op_detect_skills($text), 'category' => adc_op_detect_category($text),
                'summary' => $snippet, 'description' => $snippet, 'requirements' => array(),
                'url' => isset($item['link']) ? $item['link'] : '', 'published_at' => isset($item['updated']) ? $item['updated'] : ''
            ));
            if ($job) $jobs[] = $job;
        }
    }
    return $jobs;
}

function adc_op_dedupe($jobs)
{
    $seen = array();
    $result = array();
    foreach ($jobs as $job) {
        if (!is_array($job)) continue;
        $key = sha1(adc_op_lower($job['title']) . '|' . adc_op_lower($job['company']) . '|' . adc_op_lower($job['city']));
        if (isset($seen[$key])) continue;
        $seen[$key] = true;
        $result[] = $job;
    }
    usort($result, function ($a, $b) {
        return (int) $a['posted_days'] - (int) $b['posted_days'];
    });
    if (isset($result[0])) $result[0]['featured'] = true;
    return $result;
}

function adc_op_cache_file($region)
{
    $config = adc_op_config();
    $version = preg_replace('/[^a-zA-Z0-9_-]/', '-', (string) $config['cache_version']);
    return $config['cache_dir'] . DIRECTORY_SEPARATOR . $version . '-' . $region . '.json';
}

function adc_op_cache_read($region, $allowStale = false)
{
    $config = adc_op_config();
    $file = adc_op_cache_file($region);
    if (!is_file($file) || !is_readable($file)) return null;
    if (!$allowStale && (time() - filemtime($file)) > $config['cache_ttl']) return null;
    $payload = json_decode(file_get_contents($file), true);
    if (!is_array($payload)) return null;
    if (!isset($payload['pipeline_version']) || $payload['pipeline_version'] !== $config['cache_version']) return null;
    return $payload;
}

function adc_op_cache_write($region, $payload)
{
    $config = adc_op_config();
    if (!is_dir($config['cache_dir'])) @mkdir($config['cache_dir'], 0755, true);
    if (is_dir($config['cache_dir'])) {
        @file_put_contents($config['cache_dir'] . DIRECTORY_SEPARATOR . '.htaccess', "Require all denied
Deny from all
");
        @file_put_contents(adc_op_cache_file($region), json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), LOCK_EX);
    }
}

function adc_op_pipeline($region, $force = false)
{
    $allowed = array('portugal', 'europe', 'brazil', 'freelance');
    if (!in_array($region, $allowed, true)) $region = 'portugal';
    if (!$force) {
        $cached = adc_op_cache_read($region, false);
        if ($cached) return $cached;
    }

    $config = adc_op_config();
    adc_op_filter_stats_reset();
    $jobs = array();
    $errors = array();
    $sources = array();

    if ($region === 'portugal') {
        try {
            $portugalJobs = $config['itjobs_api_key'] !== '' ? adc_op_itjobs_api($config['itjobs_api_key']) : adc_op_itjobs_rss();
            $jobs = array_merge($jobs, $portugalJobs);
            if ($portugalJobs) $sources[] = 'ITJobs';
        } catch (Throwable $e) { $errors[] = 'ITJobs temporarily unavailable.'; }
    }

    try {
        $arbeitnowJobs = adc_op_arbeitnow($region);
        $jobs = array_merge($jobs, $arbeitnowJobs);
        if ($arbeitnowJobs) $sources[] = 'Arbeitnow';
    } catch (Throwable $e) { $errors[] = 'Arbeitnow temporarily unavailable.'; }

    try {
        $remotiveJobs = adc_op_remotive($region);
        $jobs = array_merge($jobs, $remotiveJobs);
        if ($remotiveJobs) $sources[] = 'Remotive';
    } catch (Throwable $e) { $errors[] = 'Remotive temporarily unavailable.'; }

    if ($config['jooble_api_key'] !== '') {
        try {
            $joobleJobs = adc_op_jooble($region, $config['jooble_api_key']);
            $jobs = array_merge($jobs, $joobleJobs);
            if ($joobleJobs) $sources[] = 'Jooble';
        } catch (Throwable $e) { $errors[] = 'Jooble temporarily unavailable.'; }
    }

    $jobs = adc_op_dedupe($jobs);
    $jobs = array_slice($jobs, 0, $config['max_jobs_per_region']);
    $payload = array(
        'ok' => true,
        'live' => true,
        'pipeline_version' => $config['cache_version'],
        'region' => $region,
        'updated_at' => gmdate('c'),
        'sources' => array_values(array_unique($sources)),
        'total' => count($jobs),
        'jobs' => $jobs,
        'filter_stats' => adc_op_filter_stats_get(),
        'warnings' => array_values(array_unique($errors))
    );

    if (!$jobs) {
        $stale = adc_op_cache_read($region, true);
        if ($stale && !empty($stale['jobs'])) {
            $stale['stale'] = true;
            $stale['warnings'][] = 'Showing the last verified cache because sources are temporarily unavailable.';
            return $stale;
        }
    }

    adc_op_cache_write($region, $payload);
    return $payload;
}
