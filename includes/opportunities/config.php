<?php
/**
 * AlexDevCode Opportunity Radar configuration.
 * PHP 7.2 compatible. No database access.
 */

if (!function_exists('adc_op_env_all')) {
    function adc_op_env_all()
    {
        static $values = null;

        if (is_array($values)) {
            return $values;
        }

        $values = array();
        $root = dirname(__DIR__, 2);
        $envFile = $root . DIRECTORY_SEPARATOR . '.env';

        if (is_file($envFile) && is_readable($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if (is_array($lines)) {
                foreach ($lines as $line) {
                    $line = trim($line);

                    if ($line === '' || strpos($line, '#') === 0 || strpos($line, '=') === false) {
                        continue;
                    }

                    list($key, $value) = array_map('trim', explode('=', $line, 2));
                    $value = trim($value, " \t\n\r\0\x0B\"'");

                    if ($key !== '') {
                        $values[$key] = $value;
                    }
                }
            }
        }

        return $values;
    }
}

if (!function_exists('adc_op_env')) {
    function adc_op_env($key, $default = '')
    {
        $systemValue = getenv($key);

        if ($systemValue !== false && $systemValue !== '') {
            return $systemValue;
        }

        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return $_ENV[$key];
        }

        $values = adc_op_env_all();

        return isset($values[$key]) && $values[$key] !== '' ? $values[$key] : $default;
    }
}

if (!function_exists('adc_op_config')) {
    function adc_op_config()
    {
        $root = dirname(__DIR__, 2);

        return array(
            'root' => $root,
            'cache_dir' => $root . DIRECTORY_SEPARATOR . '_cache' . DIRECTORY_SEPARATOR . 'opportunities',
            'cache_ttl' => 21600,
            'cache_version' => '20260803-3',
            'max_jobs_per_region' => 80,
            'user_agent' => 'AlexDevCode-OpportunityRadar/3.0 (+https://alexdevcode.com/oportunidades.php)',
            'jooble_api_key' => adc_op_env('JOOBLE_API_KEY', ''),
            'itjobs_api_key' => adc_op_env('ITJOBS_API_KEY', ''),
            'refresh_token' => adc_op_env('OPPORTUNITIES_REFRESH_TOKEN', ''),
            'remotive_url' => 'https://remotive.com/api/remote-jobs?category=software-dev&limit=100',
            'arbeitnow_url' => 'https://www.arbeitnow.com/api/job-board-api',
            'itjobs_rss_url' => 'https://feeds.itjobs.pt/feed/emprego',
            'itjobs_api_url' => 'https://api.itjobs.pt/job/list.json',
            'jooble_url' => 'https://jooble.org/api/'
        );
    }
}
