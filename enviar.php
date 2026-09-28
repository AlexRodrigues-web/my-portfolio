<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/*
|--------------------------------------------------------------------------
| PRODUCTION ERROR SETTINGS
|--------------------------------------------------------------------------
*/

ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set(
    'error_log',
    __DIR__ . '/log_erros.txt'
);

error_reporting(E_ALL);


/*
|--------------------------------------------------------------------------
| HELPERS
|--------------------------------------------------------------------------
*/

function contact_request_lang()
{
    $lang =
        $_POST['lang']
        ?? $_GET['lang']
        ?? $_COOKIE['adc_lang']
        ?? $_SESSION['adc_lang']
        ?? $_SESSION['lang']
        ?? 'pt';


    $lang =
        strtolower(
            trim(
                (string) $lang
            )
        );


    if (
        !in_array(
            $lang,
            [
                'pt',
                'en',
                'es'
            ],
            true
        )
    ) {
        $lang =
            'pt';
    }


    return $lang;
}


function contact_localize_message(
    $message,
    $lang
) {
    if (
        $lang === 'pt'
    ) {
        return $message;
    }


    $translations = [

        'en' => [
            'Aguarde alguns segundos antes de reenviar.' =>
                'Wait a few seconds before submitting again.',
            'Muitas tentativas em pouco tempo. Aguarde antes de enviar novamente.' =>
                'Too many attempts in a short period. Please wait before submitting again.',
            'Mensagem bloqueada.' =>
                'Message blocked.',
            'Token inválido. Recarregue a página e tente novamente.' =>
                'Invalid security token. Reload the page and try again.',
            'Sessão do formulário expirada. Recarregue a página e tente novamente.' =>
                'The form session has expired. Reload the page and try again.',
            'Mensagem bloqueada por envio rápido demais.' =>
                'Message blocked because it was submitted too quickly.',
            'O formulário expirou. Recarregue a página e tente novamente.' =>
                'The form has expired. Reload the page and try again.',
            'Falha na verificação de segurança. Recarregue a página e tente novamente.' =>
                'Security verification failed. Reload the page and try again.',
            'Confirme que esta é uma mensagem real e relacionada a projeto ou contacto profissional.' =>
                'Please confirm that this is a genuine message related to a project or professional enquiry.',
            'Informe um nome válido.' =>
                'Please enter a valid name.',
            'Email inválido.' =>
                'Invalid email address.',
            'Dados inválidos no formulário.' =>
                'Invalid form data.',
            'Escolha um tipo de mensagem válido.' =>
                'Please choose a valid contact type.',
            'Escreva uma mensagem mais completa.' =>
                'Please provide a more complete message.',
            'A mensagem é demasiado longa.' =>
                'The message is too long.',
            'Mensagem bloqueada pelas regras anti-spam.' =>
                'The message was blocked by the anti-spam rules.',
            'Erro interno no envio. Contacte diretamente por email.' =>
                'Internal sending error. Please contact us directly by email.',
            'Configuração de email incompleta. Contacte diretamente por email.' =>
                'Email configuration is incomplete. Please contact us directly by email.',
            'Mensagem enviada com sucesso. Obrigado por contactar a AlexDevCode.' =>
                'Message sent successfully. Thank you for contacting AlexDevCode.',
            'Erro ao enviar a mensagem. Tente novamente mais tarde.' =>
                'Unable to send the message. Please try again later.',
        ],

        'es' => [
            'Aguarde alguns segundos antes de reenviar.' =>
                'Espere unos segundos antes de volver a enviar.',
            'Muitas tentativas em pouco tempo. Aguarde antes de enviar novamente.' =>
                'Demasiados intentos en poco tiempo. Espere antes de volver a enviar.',
            'Mensagem bloqueada.' =>
                'Mensaje bloqueado.',
            'Token inválido. Recarregue a página e tente novamente.' =>
                'Token de seguridad no válido. Recargue la página e inténtelo de nuevo.',
            'Sessão do formulário expirada. Recarregue a página e tente novamente.' =>
                'La sesión del formulario ha caducado. Recargue la página e inténtelo de nuevo.',
            'Mensagem bloqueada por envio rápido demais.' =>
                'Mensaje bloqueado porque se envió demasiado rápido.',
            'O formulário expirou. Recarregue a página e tente novamente.' =>
                'El formulario ha caducado. Recargue la página e inténtelo de nuevo.',
            'Falha na verificação de segurança. Recarregue a página e tente novamente.' =>
                'La verificación de seguridad ha fallado. Recargue la página e inténtelo de nuevo.',
            'Confirme que esta é uma mensagem real e relacionada a projeto ou contacto profissional.' =>
                'Confirme que se trata de un mensaje real relacionado con un proyecto o contacto profesional.',
            'Informe um nome válido.' =>
                'Introduzca un nombre válido.',
            'Email inválido.' =>
                'Dirección de correo electrónico no válida.',
            'Dados inválidos no formulário.' =>
                'Datos del formulario no válidos.',
            'Escolha um tipo de mensagem válido.' =>
                'Seleccione un tipo de contacto válido.',
            'Escreva uma mensagem mais completa.' =>
                'Escriba un mensaje más completo.',
            'A mensagem é demasiado longa.' =>
                'El mensaje es demasiado largo.',
            'Mensagem bloqueada pelas regras anti-spam.' =>
                'El mensaje ha sido bloqueado por las reglas antispam.',
            'Erro interno no envio. Contacte diretamente por email.' =>
                'Error interno de envío. Póngase en contacto directamente por correo electrónico.',
            'Configuração de email incompleta. Contacte diretamente por email.' =>
                'La configuración del correo electrónico está incompleta. Póngase en contacto directamente por correo electrónico.',
            'Mensagem enviada com sucesso. Obrigado por contactar a AlexDevCode.' =>
                'Mensaje enviado correctamente. Gracias por contactar con AlexDevCode.',
            'Erro ao enviar a mensagem. Tente novamente mais tarde.' =>
                'No se ha podido enviar el mensaje. Inténtelo de nuevo más tarde.',
        ],
    ];


    return
        $translations[$lang][$message]
        ?? $message;
}


function redirect_contact(
    $type,
    $message
) {
    $lang =
        contact_request_lang();


    $localizedMessage =
        contact_localize_message(
            $message,
            $lang
        );


    $_SESSION['flash_type'] =
        $type;


    $_SESSION['flash_message'] =
        $localizedMessage;


    if (
        $type === 'success'
    ) {
        $_SESSION['msg_sucesso'] =
            $localizedMessage;
    }


    header(
        'Location: contato.php?lang='
        . rawurlencode(
            $lang
        )
        . '#contact-form'
    );


    exit;
}


function clean_text(
    $value,
    $maxLength = 3000
) {
    $value =
        trim(
            (string) $value
        );


    $value =
        str_replace(
            [
                "\0",
                "\r"
            ],
            '',
            $value
        );


    $value =
        strip_tags(
            $value
        );


    if (
        function_exists(
            'mb_substr'
        )
    ) {
        return mb_substr(
            $value,
            0,
            $maxLength,
            'UTF-8'
        );
    }


    return substr(
        $value,
        0,
        $maxLength
    );
}


function text_length(
    $value
) {
    if (
        function_exists(
            'mb_strlen'
        )
    ) {
        return mb_strlen(
            $value,
            'UTF-8'
        );
    }


    return strlen(
        $value
    );
}


function has_header_injection(
    $value
) {
    return preg_match(
        "/[\r\n]/",
        (string) $value
    );
}


function count_urls(
    $text
) {
    preg_match_all(
        '/https?:\/\/|www\.|\.com|\.net|\.org|\.io|\.xyz|\.ru|\.cn/i',
        $text,
        $matches
    );


    return count(
        $matches[0]
    );
}


function contains_blocked_pattern(
    $text,
    $patterns
) {
    $text =
        strtolower(
            $text
        );


    foreach (
        $patterns
        as $pattern
    ) {
        if (
            strpos(
                $text,
                strtolower(
                    $pattern
                )
            ) !== false
        ) {
            return true;
        }
    }


    return false;
}


/*
|--------------------------------------------------------------------------
| RATE LIMIT
|--------------------------------------------------------------------------
*/

function too_many_ip_attempts()
{
    $ip =
        $_SERVER['REMOTE_ADDR']
        ?? 'unknown';


    $hash =
        hash(
            'sha256',
            $ip
        );


    $limitDir =
        __DIR__
        . '/storage/contact-rate-limit';


    $limitFile =
        $limitDir
        . '/'
        . $hash
        . '.json';


    if (
        !is_dir(
            $limitDir
        )
    ) {
        @mkdir(
            $limitDir,
            0755,
            true
        );
    }


    $now =
        time();


    /*
     * Janela de 1 hora.
     */
    $window =
        3600;


    /*
     * Máximo de 5 tentativas
     * por IP dentro da janela.
     */
    $maxAttempts =
        5;


    $attempts =
        [];


    if (
        is_readable(
            $limitFile
        )
    ) {
        $raw =
            file_get_contents(
                $limitFile
            );


        $decoded =
            json_decode(
                $raw,
                true
            );


        if (
            is_array(
                $decoded
            )
        ) {
            $attempts =
                $decoded;
        }
    }


    $attempts =
        array_filter(
            $attempts,
            function (
                $timestamp
            ) use (
                $now,
                $window
            ) {
                return
                    is_numeric(
                        $timestamp
                    )
                    &&
                    (
                        $now
                        - (int) $timestamp
                    )
                    < $window;
            }
        );


    if (
        count(
            $attempts
        )
        >= $maxAttempts
    ) {
        return true;
    }


    $attempts[] =
        $now;


    @file_put_contents(
        $limitFile,
        json_encode(
            array_values(
                $attempts
            )
        ),
        LOCK_EX
    );


    return false;
}


/*
|--------------------------------------------------------------------------
| REQUEST METHOD
|--------------------------------------------------------------------------
*/

if (
    (
        $_SERVER[
            'REQUEST_METHOD'
        ]
        ?? ''
    )
    !== 'POST'
) {
    header(
        'Location: contato.php?lang='
        . rawurlencode(
            contact_request_lang()
        )
    );

    exit;
}


$contactLang =
    contact_request_lang();


/*
|--------------------------------------------------------------------------
| SESSION COOLDOWN
|--------------------------------------------------------------------------
*/

if (
    isset(
        $_SESSION[
            'last_submit'
        ]
    )
    &&
    (
        time()
        - (int) $_SESSION[
            'last_submit'
        ]
    )
    < 15
) {
    redirect_contact(
        'error',
        'Aguarde alguns segundos antes de reenviar.'
    );
}


/*
|--------------------------------------------------------------------------
| IP RATE LIMIT
|--------------------------------------------------------------------------
*/

if (
    too_many_ip_attempts()
) {
    redirect_contact(
        'error',
        'Muitas tentativas em pouco tempo. Aguarde antes de enviar novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| HONEYPOT ANTI-BOT
|--------------------------------------------------------------------------
*/

$website =
    trim(
        (string) (
            $_POST[
                'website'
            ]
            ?? ''
        )
    );


if (
    $website !== ''
) {
    error_log(
        'Contact blocked by honeypot.'
    );


    redirect_contact(
        'error',
        'Mensagem bloqueada.'
    );
}


/*
|--------------------------------------------------------------------------
| CSRF VALIDATION
|--------------------------------------------------------------------------
*/

$csrfToken =
    $_POST[
        'csrf_token'
    ]
    ?? '';


$sessionToken =
    $_SESSION[
        'csrf_token'
    ]
    ?? '';


if (
    empty(
        $csrfToken
    )
    ||
    empty(
        $sessionToken
    )
    ||
    !hash_equals(
        $sessionToken,
        $csrfToken
    )
) {
    redirect_contact(
        'error',
        'Token inválido. Recarregue a página e tente novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| FORM KEY + SMART GUARD
|--------------------------------------------------------------------------
|
| Compatível com o contato.php atual:
|
| - form_key
| - contact_form_keys
| - contact_pow
| - pow_nonce
| - pow_hash
|
|--------------------------------------------------------------------------
*/

$formKey =
    trim(
        (string) (
            $_POST[
                'form_key'
            ]
            ?? ''
        )
    );


$formCreatedAt =
    $_SESSION[
        'contact_form_keys'
    ][
        $formKey
    ]
    ?? null;


$powData =
    $_SESSION[
        'contact_pow'
    ][
        $formKey
    ]
    ?? null;


/*
|--------------------------------------------------------------------------
| VALIDAR SESSÃO DO FORMULÁRIO
|--------------------------------------------------------------------------
*/

if (
    $formKey === ''
    ||
    empty(
        $formCreatedAt
    )
    ||
    !is_array(
        $powData
    )
) {
    redirect_contact(
        'error',
        'Sessão do formulário expirada. Recarregue a página e tente novamente.'
    );
}


$formAge =
    time()
    - (int) $formCreatedAt;


/*
|--------------------------------------------------------------------------
| TEMPO MÍNIMO
|--------------------------------------------------------------------------
*/

if (
    $formAge < 4
) {
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    error_log(
        'Contact blocked: submitted too quickly.'
    );


    redirect_contact(
        'error',
        'Mensagem bloqueada por envio rápido demais.'
    );
}


/*
|--------------------------------------------------------------------------
| EXPIRAÇÃO DO FORMULÁRIO
|--------------------------------------------------------------------------
*/

if (
    $formAge > 3600
) {
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    redirect_contact(
        'error',
        'O formulário expirou. Recarregue a página e tente novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| SMART GUARD — PROOF OF WORK
|--------------------------------------------------------------------------
|
| O JavaScript do contato.php calcula:
|
| SHA256(seed:nonce)
|
| e envia:
|
| pow_nonce
| pow_hash
|
|--------------------------------------------------------------------------
*/

$postedNonce =
    trim(
        (string) (
            $_POST[
                'pow_nonce'
            ]
            ?? ''
        )
    );


$postedHash =
    strtolower(
        trim(
            (string) (
                $_POST[
                    'pow_hash'
                ]
                ?? ''
            )
        )
    );


$powSeed =
    (string) (
        $powData[
            'seed'
        ]
        ?? ''
    );


$powDifficulty =
    (int) (
        $powData[
            'difficulty'
        ]
        ?? 0
    );


/*
|--------------------------------------------------------------------------
| VALIDAR ESTRUTURA DO PROOF OF WORK
|--------------------------------------------------------------------------
*/

if (
    $postedNonce === ''
    ||
    !ctype_digit(
        $postedNonce
    )
    ||
    $postedHash === ''
    ||
    !preg_match(
        '/^[a-f0-9]{64}$/',
        $postedHash
    )
    ||
    $powSeed === ''
    ||
    $powDifficulty < 1
    ||
    $powDifficulty > 6
) {
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    error_log(
        'Contact blocked: invalid Smart Guard payload.'
    );


    redirect_contact(
        'error',
        'Falha na verificação de segurança. Recarregue a página e tente novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| RECALCULAR HASH NO SERVIDOR
|--------------------------------------------------------------------------
*/

$calculatedHash =
    hash(
        'sha256',
        $powSeed
        . ':'
        . $postedNonce
    );


/*
|--------------------------------------------------------------------------
| COMPARAR HASH
|--------------------------------------------------------------------------
*/

if (
    !hash_equals(
        $calculatedHash,
        $postedHash
    )
) {
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    error_log(
        'Contact blocked: Smart Guard hash mismatch.'
    );


    redirect_contact(
        'error',
        'Falha na verificação de segurança. Recarregue a página e tente novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| VALIDAR DIFICULDADE
|--------------------------------------------------------------------------
*/

$requiredPrefix =
    str_repeat(
        '0',
        $powDifficulty
    );


if (
    substr(
        $calculatedHash,
        0,
        $powDifficulty
    )
    !== $requiredPrefix
) {
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    error_log(
        'Contact blocked: Smart Guard difficulty failed.'
    );


    redirect_contact(
        'error',
        'Falha na verificação de segurança. Recarregue a página e tente novamente.'
    );
}


/*
|--------------------------------------------------------------------------
| CONSENT VALIDATION
|--------------------------------------------------------------------------
*/

if (
    empty(
        $_POST[
            'consent'
        ]
    )
    ||
    $_POST[
        'consent'
    ]
    !== '1'
) {
    redirect_contact(
        'error',
        'Confirme que esta é uma mensagem real e relacionada a projeto ou contacto profissional.'
    );
}


/*
|--------------------------------------------------------------------------
| READ AND SANITIZE FIELDS
|--------------------------------------------------------------------------
*/

$nome =
    clean_text(
        $_POST[
            'nome'
        ]
        ?? '',
        80
    );


$emailRaw =
    trim(
        (string) (
            $_POST[
                'email'
            ]
            ?? ''
        )
    );


$email =
    filter_var(
        $emailRaw,
        FILTER_VALIDATE_EMAIL
    );


$tipo =
    clean_text(
        $_POST[
            'tipo'
        ]
        ?? '',
        80
    );


$prazo =
    clean_text(
        $_POST[
            'prazo'
        ]
        ?? '',
        80
    );


$orcamento =
    clean_text(
        $_POST[
            'orcamento'
        ]
        ?? '',
        80
    );


$assunto =
    clean_text(
        $_POST[
            'assunto'
        ]
        ?? 'Sem assunto',
        120
    );


$mensagem =
    clean_text(
        $_POST[
            'mensagem'
        ]
        ?? '',
        3000
    );



$utmSource = clean_text($_POST['utm_source'] ?? '', 80);
$utmMedium = clean_text($_POST['utm_medium'] ?? '', 80);
$utmCampaign = clean_text($_POST['utm_campaign'] ?? '', 120);
$leadOrigin = clean_text($_POST['lead_origin'] ?? 'direct', 220);


$allowedTypes = [
    'Project / Website',
    'Collaboration',
    'Opportunity',
    'Technical Question'
];


/*
|--------------------------------------------------------------------------
| FIELD VALIDATION
|--------------------------------------------------------------------------
*/

if (
    text_length(
        $nome
    )
    < 2
) {
    redirect_contact(
        'error',
        'Informe um nome válido.'
    );
}


if (
    !$email
) {
    redirect_contact(
        'error',
        'Email inválido.'
    );
}


if (
    has_header_injection(
        $nome
    )
    ||
    has_header_injection(
        $emailRaw
    )
    ||
    has_header_injection(
        $assunto
    )
) {
    error_log(
        'Contact blocked: header injection attempt.'
    );


    redirect_contact(
        'error',
        'Dados inválidos no formulário.'
    );
}


if (
    !in_array(
        $tipo,
        $allowedTypes,
        true
    )
) {
    redirect_contact(
        'error',
        'Escolha um tipo de mensagem válido.'
    );
}


if (
    text_length(
        $mensagem
    )
    < 20
) {
    redirect_contact(
        'error',
        'Escreva uma mensagem mais completa.'
    );
}


if (
    text_length(
        $mensagem
    )
    > 3000
) {
    redirect_contact(
        'error',
        'A mensagem é demasiado longa.'
    );
}


/*
|--------------------------------------------------------------------------
| ANTI-SPAM CONTENT RULES
|--------------------------------------------------------------------------
*/

$fullText =
    strtolower(
        $nome
        . ' '
        . $emailRaw
        . ' '
        . $assunto
        . ' '
        . $mensagem
    );


$blockedPatterns = [
    'seo backlinks',
    'backlinks',
    'casino',
    'crypto investment',
    'forex',
    'loan offer',
    'viagra',
    'telegram promotion',
    'guest post',
    'link building',
    'rank on google',
    'bulk email',
    'whatsapp marketing',
    'increase your traffic',
    'increase traffic',
    'cheap traffic',
    'buy followers',
    'adult',
    'porn',
    'betting',
    'gambling',
    'free money',
    'make money fast'
];


if (
    count_urls(
        $mensagem
    )
    > 2
    ||
    contains_blocked_pattern(
        $fullText,
        $blockedPatterns
    )
) {
    error_log(
        'Contact blocked by spam rules from: '
        . $emailRaw
    );


    redirect_contact(
        'error',
        'Mensagem bloqueada pelas regras anti-spam.'
    );
}


/*
|--------------------------------------------------------------------------
| LOAD PHPMAILER
|--------------------------------------------------------------------------
*/

$autoload =
    __DIR__
    . '/vendor/autoload.php';


if (
    !file_exists(
        $autoload
    )
) {
    error_log(
        'PHPMailer autoload not found: '
        . $autoload
    );


    redirect_contact(
        'error',
        'Erro interno no envio. Contacte diretamente por email.'
    );
}


require $autoload;


/*
|--------------------------------------------------------------------------
| SMTP CONFIG
|--------------------------------------------------------------------------
|
| Pode usar:
|
| includes/smtp_config.php
|
| com:
|
| define('SMTP_USERNAME', 'email@gmail.com');
| define('SMTP_PASSWORD', 'senha-de-app');
|
|--------------------------------------------------------------------------
*/

$configFile =
    __DIR__
    . '/includes/smtp_config.php';


if (
    file_exists(
        $configFile
    )
) {
    require_once(
        $configFile
    );
}


/*
|--------------------------------------------------------------------------
| SMTP CREDENTIALS
|--------------------------------------------------------------------------
*/

$smtpUser =
    getenv(
        'SMTP_USERNAME'
    )
    ?: (
        defined(
            'SMTP_USERNAME'
        )
            ? SMTP_USERNAME
            : 'alexrroliver200@gmail.com'
    );


$smtpPass =
    getenv(
        'SMTP_PASSWORD'
    )
    ?: (
        defined(
            'SMTP_PASSWORD'
        )
            ? SMTP_PASSWORD
            : ''
    );


if (
    empty(
        $smtpPass
    )
) {
    error_log(
        'SMTP password missing. Set SMTP_PASSWORD or includes/smtp_config.php.'
    );


    redirect_contact(
        'error',
        'Configuração de email incompleta. Contacte diretamente por email.'
    );
}


/*
|--------------------------------------------------------------------------
| BUILD EMAIL
|--------------------------------------------------------------------------
*/

$subjectSafe =
    $assunto !== ''
        ? $assunto
        : 'Sem assunto';


$mailSubject =
    'Formulário AlexDevCode: '
    . $subjectSafe;


$ip =
    $_SERVER[
        'REMOTE_ADDR'
    ]
    ?? 'Unknown';


$userAgent =
    $_SERVER[
        'HTTP_USER_AGENT'
    ]
    ?? 'Unknown';


$sentAt =
    date(
        'Y-m-d H:i:s'
    );


$body = <<<MSG
Nova mensagem recebida pelo formulário seguro do site AlexDevCode.

Nome: {$nome}
Email: {$email}
Tipo de contacto: {$tipo}
Idioma: {$contactLang}
Prazo: {$prazo}
Orçamento / Escopo: {$orcamento}
Origem do lead: {$utmSource}
Meio: {$utmMedium}
Campanha: {$utmCampaign}
Página / referência: {$leadOrigin}
Assunto: {$subjectSafe}

Mensagem:
{$mensagem}

--------------------------------
Dados de segurança:
IP: {$ip}
User-Agent: {$userAgent}
Data/Hora: {$sentAt}
Idade do formulário: {$formAge} segundos
MSG;


/*
|--------------------------------------------------------------------------
| AUTO-REPLY — PT / EN / ES
|--------------------------------------------------------------------------
*/

$autoReplyCopy = [

    'pt' => [
        'html_lang' => 'pt',
        'subject' => 'Recebemos a sua mensagem — AlexDevCode',
        'preheader' => 'A sua mensagem foi recebida com sucesso pela AlexDevCode.',
        'brand_tagline' => 'Web Development · Soluções Digitais',
        'badge' => 'Resposta automática',
        'kicker' => 'Contacto recebido',
        'title' => 'Recebemos a sua mensagem',
        'subtitle' => 'Confirmação de receção · AlexDevCode',
        'greeting' => 'Olá',
        'thanks' => 'Obrigado por entrar em contacto com a AlexDevCode.',
        'paragraph_1' => 'A sua mensagem foi recebida com sucesso e já se encontra registada para análise. Cada contacto é revisto individualmente para compreender o contexto do pedido e preparar uma resposta adequada ao que procura.',
        'paragraph_2' => 'Caso seja necessário esclarecer algum ponto ou obter informações adicionais, entrarei em contacto consigo através deste mesmo endereço de email.',
        'summary_title' => 'Resumo do seu contacto',
        'subject_label' => 'Assunto',
        'type_label' => 'Tipo de contacto',
        'notice_strong' => 'Não é necessário responder a esta mensagem para confirmar a receção.',
        'notice_text' => 'Assim que houver uma atualização sobre o seu pedido, receberá uma resposta diretamente da AlexDevCode.',
        'closing_thanks' => 'Obrigado pela confiança e pelo interesse no nosso trabalho.',
        'signoff' => 'Até breve,',
        'services' => 'Web Development · Soluções Digitais · Projetos à medida',
        'footer_auto' => 'Esta é uma confirmação automática enviada após o preenchimento do formulário em alexdevcode.com.',
        'footer_company' => 'Desenvolvimento web e soluções digitais.',
        'types' => [
            'Project / Website' => 'Projeto / Website',
            'Collaboration' => 'Colaboração',
            'Opportunity' => 'Oportunidade',
            'Technical Question' => 'Questão técnica',
        ],
    ],

    'en' => [
        'html_lang' => 'en',
        'subject' => 'We received your message — AlexDevCode',
        'preheader' => 'Your message has been successfully received by AlexDevCode.',
        'brand_tagline' => 'Web Development · Digital Solutions',
        'badge' => 'Automatic reply',
        'kicker' => 'Enquiry received',
        'title' => 'We received your message',
        'subtitle' => 'Receipt confirmation · AlexDevCode',
        'greeting' => 'Hello',
        'thanks' => 'Thank you for contacting AlexDevCode.',
        'paragraph_1' => 'Your message has been received successfully and is now registered for review. Each enquiry is reviewed individually so we can understand the context of your request and prepare a response suited to what you are looking for.',
        'paragraph_2' => 'If we need to clarify anything or request additional information, I will contact you through this same email address.',
        'summary_title' => 'Summary of your enquiry',
        'subject_label' => 'Subject',
        'type_label' => 'Contact type',
        'notice_strong' => 'You do not need to reply to this message to confirm receipt.',
        'notice_text' => 'As soon as there is an update regarding your request, you will receive a response directly from AlexDevCode.',
        'closing_thanks' => 'Thank you for your trust and for your interest in our work.',
        'signoff' => 'Best regards,',
        'services' => 'Web Development · Digital Solutions · Tailored Projects',
        'footer_auto' => 'This is an automatic confirmation sent after submitting the form at alexdevcode.com.',
        'footer_company' => 'Web development and digital solutions.',
        'types' => [
            'Project / Website' => 'Project / Website',
            'Collaboration' => 'Collaboration',
            'Opportunity' => 'Opportunity',
            'Technical Question' => 'Technical Question',
        ],
    ],

    'es' => [
        'html_lang' => 'es',
        'subject' => 'Hemos recibido su mensaje — AlexDevCode',
        'preheader' => 'Su mensaje se ha recibido correctamente en AlexDevCode.',
        'brand_tagline' => 'Desarrollo web · Soluciones digitales',
        'badge' => 'Respuesta automática',
        'kicker' => 'Contacto recibido',
        'title' => 'Hemos recibido su mensaje',
        'subtitle' => 'Confirmación de recepción · AlexDevCode',
        'greeting' => 'Hola',
        'thanks' => 'Gracias por ponerse en contacto con AlexDevCode.',
        'paragraph_1' => 'Su mensaje se ha recibido correctamente y ya está registrado para su revisión. Cada contacto se revisa individualmente para comprender el contexto de la solicitud y preparar una respuesta adecuada a lo que necesita.',
        'paragraph_2' => 'Si es necesario aclarar algún punto u obtener información adicional, me pondré en contacto con usted a través de esta misma dirección de correo electrónico.',
        'summary_title' => 'Resumen de su contacto',
        'subject_label' => 'Asunto',
        'type_label' => 'Tipo de contacto',
        'notice_strong' => 'No es necesario responder a este mensaje para confirmar la recepción.',
        'notice_text' => 'Cuando haya una actualización sobre su solicitud, recibirá una respuesta directamente de AlexDevCode.',
        'closing_thanks' => 'Gracias por su confianza y por su interés en nuestro trabajo.',
        'signoff' => 'Hasta pronto,',
        'services' => 'Desarrollo web · Soluciones digitales · Proyectos a medida',
        'footer_auto' => 'Esta es una confirmación automática enviada después de completar el formulario en alexdevcode.com.',
        'footer_company' => 'Desarrollo web y soluciones digitales.',
        'types' => [
            'Project / Website' => 'Proyecto / Sitio web',
            'Collaboration' => 'Colaboración',
            'Opportunity' => 'Oportunidad',
            'Technical Question' => 'Consulta técnica',
        ],
    ],
];


$autoCopy =
    $autoReplyCopy[
        $contactLang
    ]
    ?? $autoReplyCopy['pt'];


$autoReplySubject =
    $autoCopy['subject'];


$autoReplyType =
    $autoCopy['types'][$tipo]
    ?? $tipo;


$autoName =
    htmlspecialchars(
        $nome,
        ENT_QUOTES
        | ENT_SUBSTITUTE,
        'UTF-8'
    );


$autoSubject =
    htmlspecialchars(
        $subjectSafe,
        ENT_QUOTES
        | ENT_SUBSTITUTE,
        'UTF-8'
    );


$autoType =
    htmlspecialchars(
        $autoReplyType,
        ENT_QUOTES
        | ENT_SUBSTITUTE,
        'UTF-8'
    );


$autoYear =
    date(
        'Y'
    );


$autoReplyHtml = <<<HTML
<!doctype html>
<html lang="{$autoCopy['html_lang']}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light only">
    <meta name="supported-color-schemes" content="light">
    <title>{$autoCopy['subject']}</title>

    <style>
        @media only screen and (max-width: 640px) {
            .adc-shell {
                width: 100% !important;
            }

            .adc-pad {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }

            .adc-title {
                font-size: 30px !important;
                line-height: 36px !important;
            }

            .adc-summary-label,
            .adc-summary-value {
                display: block !important;
                width: 100% !important;
            }

            .adc-summary-value {
                padding-top: 4px !important;
                text-align: left !important;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;background:#eef0f2;font-family:Arial,Helvetica,sans-serif;color:#25272a;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

    <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
        {$autoCopy['preheader']}
    </div>

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#eef0f2;">
        <tr>
            <td align="center" style="padding:34px 16px;">

                <table role="presentation" width="640" cellspacing="0" cellpadding="0" border="0" class="adc-shell" style="width:640px;max-width:640px;background:#ffffff;border:1px solid #dedfe1;border-radius:20px;overflow:hidden;box-shadow:0 14px 42px rgba(20,20,20,.10);">

                    <tr>
                        <td class="adc-pad" style="padding:30px 38px 28px;background:#171717;border-bottom:5px solid #9a7b5f;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="vertical-align:middle;">
                                        <div style="font-size:24px;line-height:28px;font-weight:800;letter-spacing:-.8px;color:#ffffff;">
                                            Alex<span style="color:#b69a80;">Dev</span>Code
                                        </div>
                                        <div style="margin-top:5px;font-size:10px;line-height:16px;letter-spacing:1.6px;text-transform:uppercase;color:#bfc2c5;">
                                            {$autoCopy['brand_tagline']}
                                        </div>
                                    </td>

                                    <td align="right" style="vertical-align:middle;">
                                        <span style="display:inline-block;padding:8px 12px;border:1px solid rgba(255,255,255,.16);border-radius:999px;background:#252525;color:#d5c4b4;font-size:10px;line-height:12px;font-weight:700;letter-spacing:1px;text-transform:uppercase;">
                                            {$autoCopy['badge']}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:42px 38px 18px;">
                            <div style="display:inline-block;margin-bottom:14px;color:#8b6f55;font-size:11px;line-height:14px;font-weight:800;letter-spacing:1.5px;text-transform:uppercase;">
                                {$autoCopy['kicker']}
                            </div>

                            <h1 class="adc-title" style="margin:0;font-size:38px;line-height:44px;letter-spacing:-1.4px;color:#1e2023;font-weight:800;">
                                {$autoCopy['title']}
                            </h1>

                            <p style="margin:10px 0 0;color:#73777c;font-size:14px;line-height:22px;">
                                {$autoCopy['subtitle']}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:14px 38px 12px;">
                            <p style="margin:0 0 20px;color:#25272a;font-size:16px;line-height:26px;">
                                {$autoCopy['greeting']}, <strong>{$autoName}</strong>,
                            </p>

                            <p style="margin:0 0 18px;color:#404348;font-size:15px;line-height:25px;">
                                {$autoCopy['thanks']}
                            </p>

                            <p style="margin:0 0 18px;color:#404348;font-size:15px;line-height:25px;">
                                {$autoCopy['paragraph_1']}
                            </p>

                            <p style="margin:0 0 18px;color:#404348;font-size:15px;line-height:25px;">
                                {$autoCopy['paragraph_2']}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:8px 38px 14px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;border:1px solid #e2d9d0;border-radius:14px;background:#f8f5f2;">
                                <tr>
                                    <td colspan="2" style="padding:18px 20px 10px;color:#7f654d;font-size:11px;line-height:14px;font-weight:800;letter-spacing:1.3px;text-transform:uppercase;">
                                        {$autoCopy['summary_title']}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="adc-summary-label" style="width:160px;padding:11px 20px;border-top:1px solid #e8dfd7;color:#25272a;font-size:13px;line-height:20px;font-weight:700;">
                                        {$autoCopy['subject_label']}
                                    </td>
                                    <td class="adc-summary-value" style="padding:11px 20px;border-top:1px solid #e8dfd7;color:#51555a;font-size:13px;line-height:20px;text-align:right;">
                                        {$autoSubject}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="adc-summary-label" style="width:160px;padding:11px 20px 16px;border-top:1px solid #e8dfd7;color:#25272a;font-size:13px;line-height:20px;font-weight:700;">
                                        {$autoCopy['type_label']}
                                    </td>
                                    <td class="adc-summary-value" style="padding:11px 20px 16px;border-top:1px solid #e8dfd7;color:#51555a;font-size:13px;line-height:20px;text-align:right;">
                                        {$autoType}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:12px 38px 8px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background:#f2f3f4;border-left:4px solid #9a7b5f;border-radius:10px;">
                                <tr>
                                    <td style="padding:14px 16px;color:#55595e;font-size:12px;line-height:20px;">
                                        <strong style="color:#303236;">
                                            {$autoCopy['notice_strong']}
                                        </strong>
                                        {$autoCopy['notice_text']}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:22px 38px 34px;">
                            <p style="margin:0 0 20px;color:#404348;font-size:15px;line-height:25px;">
                                {$autoCopy['closing_thanks']}
                            </p>

                            <p style="margin:0;color:#25272a;font-size:14px;line-height:22px;">
                                {$autoCopy['signoff']}
                            </p>

                            <p style="margin:4px 0 0;color:#8b6f55;font-size:19px;line-height:24px;font-weight:800;">
                                Alex Oliveira
                            </p>

                            <p style="margin:2px 0 0;color:#25272a;font-size:14px;line-height:22px;font-weight:700;">
                                AlexDevCode
                            </p>

                            <p style="margin:2px 0 0;color:#73777c;font-size:12px;line-height:20px;">
                                {$autoCopy['services']}
                            </p>

                            <p style="margin:8px 0 0;font-size:12px;line-height:20px;">
                                <a href="mailto:contact@alexdevcode.com" style="color:#8b6f55;text-decoration:none;font-weight:700;">
                                    contact@alexdevcode.com
                                </a>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="adc-pad" style="padding:22px 38px;background:#171717;border-top:1px solid #2c2c2c;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <td style="color:#b9bdc1;font-size:10px;line-height:17px;">
                                        {$autoCopy['footer_auto']}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top:8px;color:#777c81;font-size:10px;line-height:16px;">
                                        © {$autoYear} AlexDevCode · {$autoCopy['footer_company']}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
HTML;


$autoReplyText = <<<TXT
{$autoCopy['greeting']}, {$nome},

{$autoCopy['thanks']}

{$autoCopy['paragraph_1']}

{$autoCopy['paragraph_2']}

{$autoCopy['summary_title']}

{$autoCopy['subject_label']}: {$subjectSafe}
{$autoCopy['type_label']}: {$autoReplyType}

{$autoCopy['notice_strong']} {$autoCopy['notice_text']}

{$autoCopy['closing_thanks']}

{$autoCopy['signoff']}
Alex Oliveira
AlexDevCode
{$autoCopy['services']}
contact@alexdevcode.com
TXT;


/*
|--------------------------------------------------------------------------
| SEND EMAIL
|--------------------------------------------------------------------------
*/

$mail =
    new \PHPMailer\PHPMailer\PHPMailer(
        true
    );


try {

    $mail->CharSet =
        'UTF-8';


    $mail->Encoding =
        'base64';


    /*
     * Gmail SMTP.
     */
    $mail->isSMTP();


    $mail->Host =
        'smtp.gmail.com';


    $mail->SMTPAuth =
        true;


    $mail->Username =
        $smtpUser;


    $mail->Password =
        $smtpPass;


    $mail->SMTPSecure =
        \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;


    $mail->Port =
        587;


    /*
     * O Gmail normalmente exige que
     * o From seja o utilizador autenticado.
     */
    $mail->setFrom(
        $smtpUser,
        'AlexDevCode Contact'
    );


    /*
     * DESTINATÁRIO INTERNO.
     */
    $mail->addAddress(
        'alexrroliver200@gmail.com',
        'Alex Oliveira'
    );


    /*
     * Ao clicar em responder,
     * responde diretamente à pessoa
     * que preencheu o formulário.
     */
    $mail->addReplyTo(
        $email,
        $nome
    );


    $mail->isHTML(
        false
    );


    $mail->Subject =
        $mailSubject;


    $mail->Body =
        $body;


    /*
     * Primeiro: enviar a mensagem recebida
     * para a AlexDevCode.
     */
    $mail->send();


    /*
    |--------------------------------------------------------------------------
    | AUTO-REPLY AO UTILIZADOR
    |--------------------------------------------------------------------------
    |
    | A confirmação automática é independente
    | do envio principal.
    |
    | Se a confirmação ao utilizador falhar,
    | a mensagem original continua considerada
    | recebida com sucesso.
    |
    |--------------------------------------------------------------------------
    */

    try {

        $autoReply =
            new \PHPMailer\PHPMailer\PHPMailer(
                true
            );


        $autoReply->CharSet =
            'UTF-8';


        $autoReply->Encoding =
            'base64';


        $autoReply->isSMTP();


        $autoReply->Host =
            'smtp.gmail.com';


        $autoReply->SMTPAuth =
            true;


        $autoReply->Username =
            $smtpUser;


        $autoReply->Password =
            $smtpPass;


        $autoReply->SMTPSecure =
            \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;


        $autoReply->Port =
            587;


        /*
         * O From continua a ser o Gmail
         * autenticado para evitar rejeição.
         */
        $autoReply->setFrom(
            $smtpUser,
            'AlexDevCode'
        );


        /*
         * Resposta automática enviada
         * para quem preencheu o formulário.
         */
        $autoReply->addAddress(
            $email,
            $nome
        );


        /*
         * Se o utilizador clicar em Responder,
         * a resposta segue para o email
         * profissional da AlexDevCode.
         */
        $autoReply->addReplyTo(
            'contact@alexdevcode.com',
            'AlexDevCode'
        );


        /*
         * Identifica corretamente a mensagem
         * como resposta automática e ajuda
         * a evitar loops entre autoresponders.
         */
        $autoReply->addCustomHeader(
            'Auto-Submitted',
            'auto-replied'
        );


        $autoReply->addCustomHeader(
            'X-Auto-Response-Suppress',
            'All'
        );


        $autoReply->addCustomHeader(
            'Precedence',
            'auto_reply'
        );


        $autoReply->isHTML(
            true
        );


        $autoReply->Subject =
            $autoReplySubject;


        $autoReply->Body =
            $autoReplyHtml;


        $autoReply->AltBody =
            $autoReplyText;


        $autoReply->send();

    }
    catch (
        \Throwable
        $autoReplyError
    ) {

        /*
         * Não falhar o formulário se apenas
         * a confirmação automática falhar.
         */
        error_log(
            'Auto-reply AlexDevCode falhou para '
            . $email
            . ': '
            . $autoReplyError->getMessage()
        );

    }


    /*
     * Cooldown apenas após envio real.
     */
    $_SESSION[
        'last_submit'
    ] =
        time();


    /*
     * Consumir o Smart Guard.
     * Impede reutilização do mesmo desafio.
     */
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    redirect_contact(
        'success',
        'Mensagem enviada com sucesso. Obrigado por contactar a AlexDevCode.'
    );

}
catch (
    \PHPMailer\PHPMailer\Exception
    $e
) {

    /*
     * Eliminar desafio mesmo quando
     * o SMTP principal falha.
     */
    unset(
        $_SESSION[
            'contact_form_keys'
        ][
            $formKey
        ],
        $_SESSION[
            'contact_pow'
        ][
            $formKey
        ]
    );


    error_log(
        'Erro ao enviar e-mail de contato: '
        . $mail->ErrorInfo
        . ' | Exception: '
        . $e->getMessage()
    );


    redirect_contact(
        'error',
        'Erro ao enviar a mensagem. Tente novamente mais tarde.'
    );
}
