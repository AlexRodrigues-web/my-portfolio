<?php

/* ==========================================================
   ALEXDEVCODE
   MOTOR GLOBAL DE INTERNACIONALIZAÇÃO

   Idiomas:
   PT — Português / Portugal
   EN — English / UK
   ES — Español / España

   Compatível com:
   ?lang=pt
   ?lang=en
   ?lang=es

   Preparado também para futura estrutura:
   /pt/
   /en/
   /es/
========================================================== */


/* ==========================================================
   CONFIGURAÇÃO
========================================================== */

$ADC_DEFAULT_LANGUAGE = 'pt';

$ADC_LANGUAGES = [

    'pt' => [
        'locale' => 'pt-PT',
        'flag'   => '🇵🇹',
        'code'   => 'PT',
        'name'   => 'Português',
        'native' => 'Português',
    ],

    'en' => [
        'locale' => 'en-GB',
        'flag'   => '🇬🇧',
        'code'   => 'EN',
        'name'   => 'English',
        'native' => 'English',
    ],

    'es' => [
        'locale' => 'es-ES',
        'flag'   => '🇪🇸',
        'code'   => 'ES',
        'name'   => 'Español',
        'native' => 'Español',
    ],

];


/* ==========================================================
   HELPERS INTERNOS
========================================================== */

if (!function_exists('adc_supported_language')) {

    function adc_supported_language(string $language): bool
    {
        global $ADC_LANGUAGES;

        return isset(
            $ADC_LANGUAGES[
                strtolower(trim($language))
            ]
        );
    }

}


if (!function_exists('adc_language_from_path')) {

    function adc_language_from_path(): ?string
    {
        global $ADC_LANGUAGES;

        $uri = $_SERVER['REQUEST_URI'] ?? '';

        $path = parse_url(
            $uri,
            PHP_URL_PATH
        );

        if (!is_string($path) || $path === '') {
            return null;
        }

        $segments = array_values(
            array_filter(
                explode(
                    '/',
                    trim($path, '/')
                ),
                static fn($item) => $item !== ''
            )
        );

        foreach ($segments as $segment) {

            $segment = strtolower(
                trim((string) $segment)
            );

            if (isset($ADC_LANGUAGES[$segment])) {
                return $segment;
            }
        }

        return null;
    }

}


/* ==========================================================
   DETEÇÃO DO IDIOMA

   Prioridade:

   1. ?lang=
   2. URL /pt/ /en/ /es/
   3. Cookie
   4. Português
========================================================== */

$requestedLanguage = strtolower(
    trim(
        (string) (
            $_GET['lang']
            ?? ''
        )
    )
);


$pathLanguage = adc_language_from_path();


$cookieLanguage = strtolower(
    trim(
        (string) (
            $_COOKIE['adc_lang']
            ?? ''
        )
    )
);


if (
    $requestedLanguage !== ''
    && adc_supported_language(
        $requestedLanguage
    )
) {

    $lang = $requestedLanguage;

}
elseif (
    $pathLanguage !== null
    && adc_supported_language(
        $pathLanguage
    )
) {

    $lang = $pathLanguage;

}
elseif (
    $cookieLanguage !== ''
    && adc_supported_language(
        $cookieLanguage
    )
) {

    $lang = $cookieLanguage;

}
else {

    $lang = $ADC_DEFAULT_LANGUAGE;

}


/* ==========================================================
   COOKIE

   Só grava quando necessário.
========================================================== */

$currentCookie =
    $_COOKIE['adc_lang']
    ?? null;


if (
    $currentCookie !== $lang
    && !headers_sent()
) {

    setcookie(

        'adc_lang',

        $lang,

        [
            'expires'  =>
                time() + 31536000,

            'path'     =>
                '/',

            'secure'   =>
                !empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off',

            'httponly' =>
                false,

            'samesite' =>
                'Lax',
        ]
    );

}


/* ==========================================================
   CARREGAMENTO DO DICIONÁRIO
========================================================== */

$langFile =
    dirname(__DIR__)
    . '/lang/'
    . $lang
    . '.php';


$ADC_TRANSLATIONS = [];


if (is_file($langFile)) {

    $loadedTranslations =
        require $langFile;


    if (is_array($loadedTranslations)) {

        $ADC_TRANSLATIONS =
            $loadedTranslations;

    }

}


/* ==========================================================
   IDIOMA ATUAL
========================================================== */

if (!function_exists('adc_lang')) {

    function adc_lang(): string
    {
        global $lang;

        return $lang;
    }

}


/* ==========================================================
   LOCALE HTML
========================================================== */

if (!function_exists('adc_html_lang')) {

    function adc_html_lang(): string
    {
        global $ADC_LANGUAGES;
        global $lang;

        return
            $ADC_LANGUAGES[$lang]['locale']
            ?? 'pt-PT';
    }

}


/* ==========================================================
   TODOS OS IDIOMAS
========================================================== */

if (!function_exists('adc_languages')) {

    function adc_languages(): array
    {
        global $ADC_LANGUAGES;

        return $ADC_LANGUAGES;
    }

}


/* ==========================================================
   DADOS DO IDIOMA ATUAL
========================================================== */

if (!function_exists('adc_current_language')) {

    function adc_current_language(): array
    {
        global $ADC_LANGUAGES;
        global $lang;

        return
            $ADC_LANGUAGES[$lang]
            ?? $ADC_LANGUAGES['pt'];
    }

}


/* ==========================================================
   VERIFICAR SE UMA TRADUÇÃO EXISTE
========================================================== */

if (!function_exists('adc_has_translation')) {

    function adc_has_translation(
        string $key
    ): bool {

        global $ADC_TRANSLATIONS;

        return
            array_key_exists(
                $key,
                $ADC_TRANSLATIONS
            )
            &&
            is_string(
                $ADC_TRANSLATIONS[$key]
            );

    }

}


/* ==========================================================
   TRADUÇÃO

   Exemplo:

   <?= t('home.title') ?>

   Com variáveis:

   t(
       'contact.hello',
       ['name' => 'Alex']
   )

   Tradução:
   Olá, :name
========================================================== */

if (!function_exists('t')) {

    function t(
        string $key,
        array $replace = [],
        ?string $fallback = null
    ): string {

        global $ADC_TRANSLATIONS;


        $text =
            $ADC_TRANSLATIONS[$key]
            ?? $fallback
            ?? $key;


        if (!is_string($text)) {

            return
                $fallback
                ?? $key;

        }


        foreach (
            $replace
            as $name => $value
        ) {

            $text = str_replace(

                ':' . $name,

                (string) $value,

                $text

            );

        }


        return $text;
    }

}


/* ==========================================================
   TRADUÇÃO ESCAPADA

   Para textos simples em HTML.
========================================================== */

if (!function_exists('adc_e')) {

    function adc_e(
        string $key,
        array $replace = [],
        ?string $fallback = null
    ): string {

        return htmlspecialchars(

            t(
                $key,
                $replace,
                $fallback
            ),

            ENT_QUOTES,

            'UTF-8'

        );

    }

}


/* ==========================================================
   CRIA URL INTERNA PRESERVANDO IDIOMA

   Exemplos:

   adc_url('sobre.php')

   =>
   sobre.php?lang=pt


   adc_url(
       'oportunidades.php?region=portugal'
   )

   =>
   oportunidades.php?region=portugal&lang=pt
========================================================== */

if (!function_exists('adc_url')) {

    function adc_url(
        string $url
    ): string {

        $url = trim($url);


        if ($url === '') {
            return '';
        }


        /*
         * Não altera:
         * mailto:
         * tel:
         * javascript:
         * anchors
         */

        if (
            str_starts_with(
                $url,
                '#'
            )
            ||
            preg_match(
                '~^(mailto:|tel:|javascript:)~i',
                $url
            )
        ) {

            return $url;

        }


        /*
         * URLs externas ficam intactas.
         */

        if (
            preg_match(
                '~^https?://~i',
                $url
            )
        ) {

            return $url;

        }


        $fragment = '';


        if (
            str_contains(
                $url,
                '#'
            )
        ) {

            [
                $url,
                $fragment
            ] = explode(
                '#',
                $url,
                2
            );

            $fragment =
                '#'
                . $fragment;

        }


        $parts =
            parse_url($url);


        $path =
            $parts['path']
            ?? '';


        $query = [];


        if (
            !empty(
                $parts['query']
            )
        ) {

            parse_str(
                $parts['query'],
                $query
            );

        }


        $query['lang'] =
            adc_lang();


        $queryString =
            http_build_query($query);


        return
            $path
            . (
                $queryString !== ''
                    ? '?' . $queryString
                    : ''
            )
            . $fragment;

    }

}


/* ==========================================================
   URL PARA TROCAR DE IDIOMA

   Preserva:
   - página atual
   - parâmetros atuais
   - filtros
   - fragmento
========================================================== */

if (!function_exists('adc_lang_url')) {

    function adc_lang_url(
        string $target
    ): string {

        global $ADC_LANGUAGES;


        $target =
            strtolower(
                trim($target)
            );


        if (
            !isset(
                $ADC_LANGUAGES[$target]
            )
        ) {

            $target = 'pt';

        }


        $uri =
            $_SERVER['REQUEST_URI']
            ?? '/';


        $parts =
            parse_url($uri);


        $path =
            $parts['path']
            ?? '/';


        $query = [];


        if (
            !empty(
                $parts['query']
            )
        ) {

            parse_str(
                $parts['query'],
                $query
            );

        }


        $query['lang'] =
            $target;


        $fragment = '';


        if (
            !empty(
                $parts['fragment']
            )
        ) {

            $fragment =
                '#'
                . $parts['fragment'];

        }


        return
            $path
            . '?'
            . http_build_query($query)
            . $fragment;

    }

}


/* ==========================================================
   URL DEMOFIRST NO IDIOMA ATUAL
========================================================== */

if (!function_exists('adc_demofirst_url')) {

    function adc_demofirst_url(): string
    {
        return
            'https://demofirst.alexdevcode.com/'
            . rawurlencode(
                adc_lang()
            )
            . '/demofirst';
    }

}


/* ==========================================================
   LANGUAGE SWITCHER DATA

   Útil para Header / Mobile Menu.
========================================================== */

if (!function_exists('adc_language_options')) {

    function adc_language_options(): array
    {
        global $ADC_LANGUAGES;

        $current =
            adc_lang();


        $result = [];


        foreach (
            $ADC_LANGUAGES
            as $code => $language
        ) {

            $result[$code] =
                $language
                + [
                    'active' =>
                        $code === $current,

                    'url' =>
                        adc_lang_url(
                            $code
                        ),
                ];

        }


        return $result;
    }

}