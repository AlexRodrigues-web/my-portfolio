<?php

/* ==========================================================
   ALEXDEVCODE
   HEADER GLOBAL

   - Mobile-first
   - PT / EN / ES
   - Navegação profissional
   - SEO multilíngue
   - Tema claro / escuro
========================================================== */

require_once __DIR__ . '/i18n.php';


/* ==========================================================
   PÁGINA ATUAL
========================================================== */

$currentFile =
    basename(
        $_SERVER['PHP_SELF'] ?? 'index.php'
    );


/* ==========================================================
   ESCAPE
========================================================== */

$e = static function (string $value): string {

    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );

};


/* ==========================================================
   SEO POR PÁGINA
========================================================== */

$pageMeta = [

    'index.php' => [
        'title' =>
            t('seo.home_title'),

        'description' =>
            t(
                'seo.home_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            '',
    ],


    'sobre.php' => [
        'title' =>
            t('seo.about_title'),

        'description' =>
            t(
                'seo.about_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            'sobre',
    ],


    'projetos.php' => [
        'title' =>
            t('seo.projects_title'),

        'description' =>
            t(
                'seo.projects_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            'projetos',
    ],


    'templates.php' => [
        'title' =>
            t('seo.templates_title'),

        'description' =>
            t(
                'seo.templates_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            'templates',
    ],


    'solucoes.php' => [
        'title' =>
            t(
                'seo.services_title',
                [],
                t('seo.solutions_title')
            ),

        'description' =>
            t(
                'seo.services_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            'solucoes',
    ],


    'contato.php' => [
        'title' =>
            t('seo.contact_title'),

        'description' =>
            t(
                'seo.contact_description',
                [],
                t('seo.default_description')
            ),

        'image' =>
            'https://alexdevcode.com/assets/img/alex-perfil.png',

        'path' =>
            'contato',
    ],


    'oportunidades.php' => [
        'title' =>
            t('seo.opportunities_title'),

        'description' =>
            t('seo.opportunities_description'),

        'image' =>
            'https://alexdevcode.com/assets/img/oportunidades-banner.png',

        'path' =>
            'oportunidades',
    ],


    'performance-mini-guide.php' => [
        'title' =>
            t('seo.guide_title'),

        'description' =>
            t('seo.guide_description'),

        'image' =>
            'https://alexdevcode.com/assets/img/miniguide/miniguide-01.jpg',

        'path' =>
            'performance-mini-guide',
    ],

];


/* ==========================================================
   SEO DEFAULT
========================================================== */

$defaultMeta = [
    'title' =>
        t('seo.default_title'),

    'description' =>
        t('seo.default_description'),

    'image' =>
        'https://alexdevcode.com/assets/img/alex-perfil.png',

    'path' =>
        '',
];

if (
    isset($adcPageMetaOverride)
    && is_array($adcPageMetaOverride)
) {
    $meta =
        array_merge(
            $defaultMeta,
            $adcPageMetaOverride
        );
}
else {
    $meta =
        $pageMeta[$currentFile]
        ?? $defaultMeta;
}


$pageTitle =
    $meta['title'];


$pageDescription =
    $meta['description'];


$pageImage =
    $meta['image'];


/* ==========================================================
   URL CANONICAL / HREFLANG / OPEN GRAPH
========================================================== */

$pageBaseUrl =
    $currentFile === 'index.php'
        ? 'https://alexdevcode.com/'
        : 'https://alexdevcode.com/'
            . rawurlencode($currentFile);


$pageCanonicalUrl =
    $pageBaseUrl
    . '?lang='
    . rawurlencode(adc_lang());


$pageLanguageUrls = [];

foreach (adc_languages() as $languageCode => $languageData) {

    $pageLanguageUrls[$languageCode] =
        $pageBaseUrl
        . '?lang='
        . rawurlencode((string) $languageCode);
}


$pageXDefaultUrl =
    $pageLanguageUrls['pt']
    ?? $pageBaseUrl;


$pageOgUrl =
    $pageCanonicalUrl;


/* ==========================================================
   OPEN GRAPH LOCALE
========================================================== */

$ogLocale =
    str_replace(
        '-',
        '_',
        adc_html_lang()
    );


/* ==========================================================
   NAVEGAÇÃO PRINCIPAL

   Hierarquia profissional:
   Início
   Serviços + submenu
   Projetos
   Sobre
   Contacto
   DemoFirst
========================================================== */

$serviceNavigationCopy = [

    'pt' => [
        'all' => 'Todos os serviços',
        'sites' => 'Criação de Sites em Gaia',
        'freelancer' => 'Programador Freelancer no Porto',
        'systems' => 'Sistemas Personalizados',
        'audit' => 'Auditoria Express',
        'automation' => 'Automações e Integrações',
    ],

    'en' => [
        'all' => 'All services',
        'sites' => 'Website Development in Gaia',
        'freelancer' => 'Freelance Web Developer in Porto',
        'systems' => 'Custom Web Systems',
        'audit' => 'Express Website Audit',
        'automation' => 'Automation & Integrations',
    ],

    'es' => [
        'all' => 'Todos los servicios',
        'sites' => 'Creación de Sitios Web en Gaia',
        'freelancer' => 'Programador Web Freelance en Porto',
        'systems' => 'Sistemas Web Personalizados',
        'audit' => 'Auditoría Express',
        'automation' => 'Automatización e Integraciones',
    ],

];


$serviceNavigation =
    $serviceNavigationCopy[adc_lang()]
    ?? $serviceNavigationCopy['pt'];


$primaryNavigation = [

    [
        'file' => 'index.php',
        'label' => t('nav.home'),
    ],

    [
        'file' => 'solucoes.php',
        'label' => t(
            'nav.services',
            [],
            t('nav.solutions')
        ),
        'children' => [
            [
                'file' => 'solucoes.php',
                'label' => $serviceNavigation['all'],
                'icon' => 'layout-grid',
            ],
            [
                'file' => 'criacao-sites-gaia.php',
                'label' => $serviceNavigation['sites'],
                'icon' => 'globe-2',
            ],
            [
                'file' => 'programador-freelancer-porto.php',
                'label' => $serviceNavigation['freelancer'],
                'icon' => 'code-2',
            ],
            [
                'file' => 'sistemas-personalizados.php',
                'label' => $serviceNavigation['systems'],
                'icon' => 'workflow',
            ],
            [
                'file' => 'automacoes.php',
                'label' => $serviceNavigation['automation'],
                'icon' => 'workflow',
            ],
            [
                'file' => 'auditoria-express.php',
                'label' => $serviceNavigation['audit'],
                'icon' => 'scan-search',
            ],
        ],
    ],

    [
        'file' => 'projetos.php',
        'label' => t('nav.projects'),
    ],

    [
        'file' => 'sobre.php',
        'label' => t('nav.about'),
    ],

    [
        'file' => 'contato.php',
        'label' => t('nav.contact'),
    ],

];


/* ==========================================================
   IDIOMAS
========================================================== */

$currentLanguage =
    adc_current_language();


$languageOptions =
    adc_language_options();


/* ==========================================================
   DEMOFIRST
========================================================== */

$demoFirstUrl =
    adc_demofirst_url();

?>
<!DOCTYPE html>

<html
    lang="<?= $e(adc_html_lang()) ?>"
>

<head>

    <!-- ======================================================
         APOLLO WEBSITE VISITOR TRACKING
    ======================================================= -->

    <script>
        function initApollo() {
            var n = Math.random().toString(36).substring(7),
                o = document.createElement("script");

            o.src =
                "https://assets.apollo.io/micro/website-tracker/tracker.iife.js?nocache="
                + n;

            o.async = true;
            o.defer = true;

            o.onload = function () {
                window.trackingFunctions.onLoad({
                    appId: "6ab83f3b9b3617002042537f"
                });
            };

            document.head.appendChild(o);
        }

        function scheduleApollo() {
            if ('requestIdleCallback' in window) {
                requestIdleCallback(initApollo, { timeout: 2500 });
            } else {
                setTimeout(initApollo, 1500);
            }
        }
        if (document.readyState === 'complete') scheduleApollo();
        else window.addEventListener('load', scheduleApollo, { once: true });
    </script>


    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >


    <!-- ======================================================
         SEO
    ======================================================= -->

    <title>
        <?= $e($pageTitle) ?>
    </title>

    <meta
        name="description"
        content="<?= $e($pageDescription) ?>"
    >

    <meta
        name="author"
        content="Alex Oliveira"
    >

    <meta
        name="robots"
        content="index, follow"
    >

    <meta
        name="theme-color"
        content="#141414"
    >


    <!-- ======================================================
         CANONICAL / HREFLANG
    ======================================================= -->

    <link
        rel="canonical"
        href="<?= $e($pageCanonicalUrl) ?>"
    >

    <?php foreach (adc_languages() as $languageCode => $languageData): ?>

        <link
            rel="alternate"
            hreflang="<?= $e($languageData['locale']) ?>"
            href="<?= $e($pageLanguageUrls[$languageCode]) ?>"
        >

    <?php endforeach; ?>

    <link
        rel="alternate"
        hreflang="x-default"
        href="<?= $e($pageXDefaultUrl) ?>"
    >


    <!-- ======================================================
         OPEN GRAPH
    ======================================================= -->

    <meta
        property="og:site_name"
        content="AlexDevCode"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:title"
        content="<?= $e($pageTitle) ?>"
    >

    <meta
        property="og:description"
        content="<?= $e($pageDescription) ?>"
    >

    <meta
        property="og:image"
        content="<?= $e($pageImage) ?>"
    >

    <meta
        property="og:url"
        content="<?= $e($pageOgUrl) ?>"
    >

    <meta
        property="og:locale"
        content="<?= $e($ogLocale) ?>"
    >


    <?php foreach (adc_languages() as $languageCode => $languageData): ?>

        <?php
        $alternateLocale =
            str_replace(
                '-',
                '_',
                $languageData['locale']
            );
        ?>

        <?php if ($languageCode !== adc_lang()): ?>

            <meta
                property="og:locale:alternate"
                content="<?= $e($alternateLocale) ?>"
            >

        <?php endif; ?>

    <?php endforeach; ?>


    <!-- ======================================================
         TWITTER / X
    ======================================================= -->

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

    <meta
        name="twitter:title"
        content="<?= $e($pageTitle) ?>"
    >

    <meta
        name="twitter:description"
        content="<?= $e($pageDescription) ?>"
    >

    <meta
        name="twitter:image"
        content="<?= $e($pageImage) ?>"
    >


    <!-- ======================================================
         FAVICON
    ======================================================= -->

    <link
        rel="icon"
        href="/favicon.ico?v=2"
        type="image/x-icon"
        sizes="any"
    >

    <link
        rel="shortcut icon"
        href="/favicon.ico?v=2"
        type="image/x-icon"
    >


    <!-- ======================================================
         FONTES
    ======================================================= -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- ======================================================
         CSS GLOBAL
    ======================================================= -->

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

    <link
        rel="stylesheet"
        href="assets/css/escuro.css"
        id="darkSheet"
        disabled
    >
    <!-- ======================================================
         ÍCONES
    ======================================================= -->

    <script
        src="https://unpkg.com/lucide@latest"
        defer
    ></script>


    <!-- ======================================================
         HEADER CSS
         MOBILE-FIRST
    ======================================================= -->

    <style>

        :root {

            --adc-header-bg:
                #141414;

            --adc-header-bg-strong:
                #101010;

            --adc-header-text:
                #f5f1ed;

            --adc-header-muted:
                rgba(245, 241, 237, .68);

            --adc-header-accent:
                #8b735d;

            --adc-header-accent-dark:
                #715d4b;

            --adc-header-light:
                #c6b8a9;

            --adc-header-border:
                rgba(245, 241, 237, .12);

            --adc-header-surface:
                rgba(255, 255, 255, .065);

            --adc-header-shadow:
                0 18px 45px rgba(0, 0, 0, .28);

        }


        /* ======================================================
           ACESSIBILIDADE
        ======================================================= */

        .adc-sr-only {

            position: absolute !important;

            width: 1px !important;
            height: 1px !important;

            padding: 0 !important;
            margin: -1px !important;

            overflow: hidden !important;

            clip: rect(0, 0, 0, 0) !important;

            white-space: nowrap !important;

            border: 0 !important;

        }


        /* ======================================================
           HEADER
        ======================================================= */

        .adc-header {

            position: sticky;

            top: 0;

            z-index: 5000;


            overflow: visible;


            color:
                var(--adc-header-text);


            background:

                radial-gradient(
                    circle at 10% 0%,
                    rgba(139, 115, 93, .16),
                    transparent 34%
                ),

                linear-gradient(
                    135deg,
                    rgba(20, 20, 20, .98),
                    rgba(16, 16, 16, .97)
                );


            border-bottom:
                1px solid
                var(--adc-header-border);


            box-shadow:
                0 7px 24px
                rgba(0, 0, 0, .16);


            backdrop-filter:
                blur(16px);

            -webkit-backdrop-filter:
                blur(16px);

        }


        .adc-header-inner {

            position: relative;


            width: 100%;

            max-width: 1220px;


            min-height: 56px;


            margin: 0 auto;


            padding:
                .45rem .75rem;


            display: flex;

            align-items: center;


            justify-content:
                space-between;


            gap: .68rem;

        }


        /* ======================================================
           LOGO
        ======================================================= */

        .adc-header-logo {

            display: inline-flex;

            align-items: center;


            gap: .5rem;


            min-width: 0;


            color: #fff;


            text-decoration: none;

        }


        .adc-header-logo-icon {

            width: 31px;

            height: 31px;


            flex:
                0 0 31px;


            display: inline-flex;

            align-items: center;

            justify-content: center;


            border-radius: 9px;


            background:
                var(--adc-header-accent);


            color: #fff;


            box-shadow:
                0 7px 18px
                rgba(0, 0, 0, .22);


            transition:
                transform .2s ease,
                background .2s ease;

        }


        .adc-header-logo-icon svg {

            width: 17px;

            height: 17px;

        }


        .adc-header-logo:hover
        .adc-header-logo-icon {

            transform:
                translateY(-1px);


            background:
                var(--adc-header-accent-dark);

        }


        .adc-header-logo-word {

            font-family:
                'Oswald',
                sans-serif;


            font-size: 1.25rem;

            font-weight: 700;


            line-height: 1;


            letter-spacing: -.03em;


            white-space: nowrap;

        }


        .adc-header-logo-word span {

            color:
                var(--adc-header-light);

        }


        .adc-header-logo-word strong {

            color:
                var(--adc-header-accent);


            font-weight: 700;

        }


        /* ======================================================
           BURGER
        ======================================================= */

        .adc-header-burger {

            width: 36px;

            height: 36px;


            flex:
                0 0 36px;


            display: inline-flex;

            align-items: center;

            justify-content: center;


            padding: 0;


            border:
                1px solid
                var(--adc-header-border);


            border-radius: 10px;


            background:
                var(--adc-header-surface);


            color: #fff;


            cursor: pointer;


            -webkit-tap-highlight-color:
                transparent;


            transition:
                background .2s ease,
                transform .2s ease;

        }


        .adc-header-burger:hover {

            background:
                rgba(139, 115, 93, .25);

        }


        .adc-header-burger svg {

            width: 19px;

            height: 19px;

        }


        .adc-header-burger
        .adc-icon-close {

            display: none;

        }


        .adc-header-burger.is-open
        .adc-icon-menu {

            display: none;

        }


        .adc-header-burger.is-open
        .adc-icon-close {

            display: inline-flex;

        }


        /* ======================================================
           PAINEL MOBILE
        ======================================================= */

        .adc-header-panel {

            position: absolute;


            top:
                calc(100% + .35rem);

            left: .55rem;

            right: .55rem;


            display: grid;


            gap: .78rem;


            padding: .7rem;


            border:
                1px solid
                var(--adc-header-border);


            border-radius: 15px;


            background:

                linear-gradient(
                    145deg,
                    rgba(20, 20, 20, .995),
                    rgba(15, 15, 15, .99)
                );


            box-shadow:
                var(--adc-header-shadow);


            opacity: 0;

            visibility: hidden;

            pointer-events: none;


            transform:
                translateY(-8px)
                scale(.985);


            transform-origin:
                top center;


            transition:
                opacity .2s ease,
                visibility .2s ease,
                transform .2s ease;

        }


        .adc-header-panel.is-open {

            opacity: 1;

            visibility: visible;

            pointer-events: auto;


            transform:
                translateY(0)
                scale(1);

        }


        /* ======================================================
           NAVEGAÇÃO
        ======================================================= */

        .adc-header-nav {

            display: flex;

            flex-direction: column;


            gap: .28rem;

        }


        .adc-header-nav a {

            position: relative;


            display: flex;

            align-items: center;


            min-height: 40px;


            padding:
                .54rem .68rem;


            border-radius: 10px;


            background:
                rgba(255, 255, 255, .045);


            color:
                var(--adc-header-muted);


            text-decoration: none;


            font-size: .84rem;

            font-weight: 600;


            transition:
                color .2s ease,
                background .2s ease,
                transform .2s ease;

        }


        .adc-header-nav a:hover {

            color: #fff;


            background:
                rgba(255, 255, 255, .085);

        }


        .adc-header-nav a.is-active {

            color: #fff;


            background:
                rgba(139, 115, 93, .25);

        }


        .adc-header-nav a.is-active::before {

            content: "";


            position: absolute;


            left: 0;


            width: 3px;

            height: 18px;


            border-radius:
                0 3px 3px 0;


            background:
                var(--adc-header-light);

        }


        /* ======================================================
           SERVIÇOS — SUBMENU
        ======================================================= */

        .adc-header-services {

            position: relative;

            width: 100%;

        }


        .adc-header-services > summary {

            position: relative;

            min-height: 40px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: .5rem;

            padding: .54rem .68rem;

            list-style: none;

            border-radius: 10px;

            background: rgba(255, 255, 255, .045);

            color: var(--adc-header-muted);

            cursor: pointer;

            user-select: none;

            font-size: .84rem;

            font-weight: 600;

            transition:
                color .2s ease,
                background .2s ease,
                transform .2s ease;

        }


        .adc-header-services > summary::-webkit-details-marker {

            display: none;

        }


        .adc-header-services > summary:hover,
        .adc-header-services > summary.is-active,
        .adc-header-services[open] > summary {

            color: #fff;

            background: rgba(139, 115, 93, .25);

        }


        .adc-header-services-summary-label {

            display: inline-flex;

            align-items: center;

            gap: .42rem;

            min-width: 0;

        }


        .adc-header-services-summary-label svg {

            width: 15px;

            height: 15px;

            flex: 0 0 15px;

            color: var(--adc-header-light);

        }


        .adc-header-services-chevron {

            width: 15px;

            height: 15px;

            flex: 0 0 15px;

            transition: transform .2s ease;

        }


        .adc-header-services[open]
        .adc-header-services-chevron {

            transform: rotate(180deg);

        }


        .adc-header-services-menu {

            display: grid;

            gap: .22rem;

            margin-top: .3rem;

            padding: .36rem;

            border: 1px solid var(--adc-header-border);

            border-radius: 11px;

            background: #181818;

            box-shadow: 0 12px 30px rgba(0, 0, 0, .22);

        }


        .adc-header-services-menu a {

            gap: .58rem;

            min-height: 42px;

            padding: .55rem .65rem;

            border-radius: 9px;

            background: transparent;

            font-size: .79rem;

            line-height: 1.25;

        }


        .adc-header-services-menu a:hover,
        .adc-header-services-menu a.is-active {

            background: rgba(255, 255, 255, .075);

        }


        .adc-header-services-menu a.is-active {

            color: #fff;

        }


        .adc-header-services-menu a svg {

            width: 16px;

            height: 16px;

            flex: 0 0 16px;

            color: var(--adc-header-light);

        }


        /* ======================================================
           CONTACTO — CTA PRINCIPAL
        ======================================================= */

        .adc-header-nav
        .adc-header-contact {

            color: #fff;

            background:
                var(--adc-header-accent);

            font-weight: 700;

        }


        .adc-header-nav
        .adc-header-contact:hover {

            color: #fff;

            background:
                var(--adc-header-accent-dark);

        }


        .adc-header-nav
        .adc-header-contact.is-active {

            color: #fff;

            background:
                var(--adc-header-accent-dark);

        }


        /* ======================================================
           DEMOFIRST
        ======================================================= */

        .adc-header-nav
        .adc-header-demofirst {

            display: flex;

            align-items: center;

            justify-content:
                space-between;


            border:
                1px solid
                rgba(245, 241, 237, .10);


            color:
                var(--adc-header-muted);


            background:
                transparent;


            font-weight: 600;

        }


        .adc-header-nav
        .adc-header-demofirst:hover {

            color: #fff;

            background:
                rgba(255, 255, 255, .045);

        }


        .adc-header-demofirst span {

            display: inline-flex;

            align-items: center;


            gap: .45rem;

        }


        .adc-header-demofirst svg {

            width: 13px;

            height: 13px;


            color:
                var(--adc-header-light);

        }


        /* ======================================================
           FERRAMENTAS
        ======================================================= */

        .adc-header-tools {

            display: flex;

            flex-direction: column;


            gap: .65rem;


            padding-top: .7rem;


            border-top:
                1px solid
                var(--adc-header-border);

        }


        /* ======================================================
           IDIOMA
        ======================================================= */

        .adc-lang-switch {

            position: relative;


            width: 100%;

        }


        .adc-lang-switch summary {

            display: flex;

            align-items: center;


            justify-content:
                space-between;


            gap: .55rem;


            min-height: 42px;


            padding:
                .55rem .7rem;


            list-style: none;


            border:
                1px solid
                var(--adc-header-border);


            border-radius: 10px;


            background:
                var(--adc-header-surface);


            color:
                var(--adc-header-text);


            cursor: pointer;


            user-select: none;


            font-size: .8rem;

            font-weight: 600;

        }


        .adc-lang-switch
        summary::-webkit-details-marker {

            display: none;

        }


        .adc-lang-current {

            display: inline-flex;

            align-items: center;


            gap: .5rem;

        }


        .adc-lang-flag {

            font-size: 1.05rem;

            line-height: 1;

        }


        .adc-lang-chevron {

            width: 15px;

            height: 15px;


            transition:
                transform .2s ease;

        }


        .adc-lang-switch[open]
        .adc-lang-chevron {

            transform:
                rotate(180deg);

        }


        .adc-lang-menu {

            display: grid;


            gap: .25rem;


            margin-top: .45rem;


            padding: .35rem;


            border:
                1px solid
                var(--adc-header-border);


            border-radius: 10px;


            background:
                #181818;

        }


        .adc-lang-menu a {

            display: flex;

            align-items: center;


            gap: .6rem;


            min-height: 39px;


            padding:
                .5rem .6rem;


            border-radius: 8px;


            color:
                var(--adc-header-muted);


            text-decoration: none;


            font-size: .8rem;

        }


        .adc-lang-menu a:hover,
        .adc-lang-menu a.is-active {

            color: #fff;


            background:
                rgba(255, 255, 255, .08);

        }


        .adc-lang-menu a.is-active {

            font-weight: 700;

        }


        /* ======================================================
           TEMA — CONTROLO ÚNICO
        ======================================================= */

        .adc-theme-switch {

            position: relative;

            width: 100%;

        }


        .adc-theme-switch summary {

            display: flex;

            align-items: center;

            justify-content:
                space-between;

            gap: .55rem;

            min-height: 42px;

            padding:
                .55rem .7rem;

            list-style: none;

            border:
                1px solid
                var(--adc-header-border);

            border-radius: 10px;

            background:
                var(--adc-header-surface);

            color:
                var(--adc-header-text);

            cursor: pointer;

            user-select: none;

            font-size: .8rem;

            font-weight: 600;

        }


        .adc-theme-switch
        summary::-webkit-details-marker {

            display: none;

        }


        .adc-theme-current {

            display: inline-flex;

            align-items: center;

            gap: .5rem;

        }


        .adc-theme-current svg,
        .adc-theme-chevron {

            width: 16px;

            height: 16px;

        }


        .adc-theme-chevron {

            transition:
                transform .2s ease;

        }


        .adc-theme-switch[open]
        .adc-theme-chevron {

            transform:
                rotate(180deg);

        }


        .adc-theme-menu {

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: .35rem;

            margin-top: .45rem;

            padding: .35rem;

            border:
                1px solid
                var(--adc-header-border);

            border-radius: 10px;

            background: #181818;

        }


        .adc-header-theme-btn {

            min-height: 39px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: .4rem;

            padding: .45rem .5rem;

            border: 0;

            border-radius: 8px;

            background: transparent;

            color:
                var(--adc-header-muted);

            cursor: pointer;

            font: inherit;

            font-size: .72rem;

            font-weight: 600;

            transition:
                color .2s ease,
                background .2s ease;

        }


        .adc-header-theme-btn:hover,
        .adc-header-theme-btn.is-active {

            color: #fff;

            background:
                rgba(139, 115, 93, .28);

        }


        .adc-header-theme-btn svg {

            width: 16px;

            height: 16px;

        }


        .adc-theme-label {

            display: inline;

        }



        /* ======================================================
           FOCUS
        ======================================================= */

        .adc-header a:focus-visible,
        .adc-header button:focus-visible,
        .adc-header summary:focus-visible {

            outline:
                2px solid
                var(--adc-header-light);


            outline-offset: 3px;

        }


        /* ======================================================
           MOBILE PEQUENO
        ======================================================= */

        @media (max-width: 390px) {

            .adc-header-logo-word {

                font-size: 1.16rem;

            }


            .adc-header-inner {

                padding-left: .6rem;

                padding-right: .6rem;

            }

        }


        /* ======================================================
           DESKTOP
        ======================================================= */

        @media (min-width: 921px) {

            .adc-header-inner {

                min-height: 68px;


                padding:
                    .62rem 1rem;


                gap: 1rem;

            }


            .adc-header-logo-icon {

                width: 36px;

                height: 36px;


                flex-basis: 36px;


                border-radius: 12px;

            }


            .adc-header-logo-word {

                font-size: 1.42rem;

            }


            .adc-header-burger {

                display: none;

            }


            .adc-header-panel {

                position: static;


                flex: 1;


                display: flex;


                align-items: center;


                justify-content:
                    space-between;


                gap: 1rem;


                padding: 0;


                border: 0;


                border-radius: 0;


                background: none;


                box-shadow: none;


                opacity: 1;

                visibility: visible;

                pointer-events: auto;


                transform: none;

            }


            .adc-header-nav {

                flex: 1;


                flex-direction: row;


                align-items: center;


                justify-content: center;


                gap: .12rem;

            }


            .adc-header-nav a {

                min-height: 36px;


                padding:
                    .42rem .58rem;


                border-radius: 999px;


                background: transparent;


                font-size: .8rem;


                white-space: nowrap;

            }


            .adc-header-nav a:hover {

                transform:
                    translateY(-1px);

            }


            .adc-header-nav a.is-active::before {

                display: none;

            }


            .adc-header-services {

                width: auto;

            }


            .adc-header-services > summary {

                min-height: 36px;

                padding: .42rem .58rem;

                border-radius: 999px;

                background: transparent;

                font-size: .8rem;

                white-space: nowrap;

            }


            .adc-header-services > summary:hover {

                transform: translateY(-1px);

            }


            .adc-header-services-menu {

                position: absolute;

                top: calc(100% + .55rem);

                left: 50%;

                z-index: 5200;

                min-width: 300px;

                margin-top: 0;

                padding: .45rem;

                transform: translateX(-50%);

                border-radius: 13px;

                background:
                    linear-gradient(
                        145deg,
                        rgba(24, 24, 24, .995),
                        rgba(14, 14, 14, .995)
                    );

                box-shadow:
                    0 18px 44px
                    rgba(0, 0, 0, .34);

            }


            .adc-header-services-menu a {

                min-height: 44px;

                padding: .58rem .68rem;

                border-radius: 10px;

                white-space: normal;

                font-size: .8rem;

            }


            .adc-header-services-menu a:hover {

                transform: none;

            }


            .adc-header-nav
            .adc-header-contact {

                margin-left: .12rem;

                padding-inline: .78rem;

                color: #fff;

                background:
                    var(--adc-header-accent);

            }


            .adc-header-nav
            .adc-header-contact:hover,
            .adc-header-nav
            .adc-header-contact.is-active {

                color: #fff;

                background:
                    var(--adc-header-accent-dark);

            }


            .adc-header-nav
            .adc-header-demofirst {

                margin-left: .18rem;

                padding-inline: .5rem;

                border: 0;

                color:
                    var(--adc-header-muted);

                background: transparent;

                font-size: .75rem;

                opacity: .82;

            }


            .adc-header-nav
            .adc-header-demofirst:hover {

                color: #fff;

                background: transparent;

                opacity: 1;

            }


            .adc-header-tools {

                flex: 0 0 auto;


                flex-direction: row;


                align-items: center;


                gap: .35rem;


                padding-top: 0;


                border-top: 0;

            }


            .adc-lang-switch {

                width: auto;

            }


            .adc-lang-switch summary {

                min-height: 36px;


                padding:
                    .42rem .55rem;


                border-radius: 9px;

            }


            .adc-lang-name {

                display: none;

            }


            .adc-lang-menu {

                position: absolute;


                top:
                    calc(100% + .5rem);


                right: 0;


                z-index: 5100;


                min-width: 175px;


                margin-top: 0;


                padding: .4rem;


                border-radius: 12px;


                box-shadow:
                    0 14px 36px
                    rgba(0, 0, 0, .28);

            }


            .adc-theme-switch {

                width: auto;

            }


            .adc-theme-switch summary {

                width: 36px;

                height: 36px;

                min-height: 36px;

                justify-content: center;

                padding: 0;

                border-radius: 50%;

            }


            .adc-theme-switch-label,
            .adc-theme-switch summary
            .adc-theme-chevron {

                display: none;

            }


            .adc-theme-menu {

                position: absolute;

                top:
                    calc(100% + .5rem);

                right: 0;

                z-index: 5100;

                min-width: 190px;

                grid-template-columns: 1fr;

                margin-top: 0;

                padding: .4rem;

                border-radius: 12px;

                box-shadow:
                    0 14px 36px
                    rgba(0, 0, 0, .28);

            }


            .adc-header-theme-btn {

                width: 100%;

                min-height: 38px;

                justify-content: flex-start;

                padding: .5rem .65rem;

                border-radius: 8px;

                font-size: .78rem;

            }

        }


        /* ======================================================
           DESKTOP MÉDIO
        ======================================================= */

        @media (
            min-width: 921px
        ) and (
            max-width: 1080px
        ) {

            .adc-header-nav a {

                padding-inline: .48rem;

                font-size: .77rem;

            }


            .adc-header-logo-word {

                font-size: 1.34rem;

            }

        }


        /* ======================================================
           REDUCED MOTION
        ======================================================= */

        @media (prefers-reduced-motion: reduce) {

            .adc-header *,
            .adc-header *::before,
            .adc-header *::after {

                transition:
                    none !important;

            }

        }

    </style>


    <!-- ======================================================
         STRUCTURED DATA — ALEXDEVCODE
    ======================================================= -->

    <script type="application/ld+json">
    <?= json_encode(
        [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => 'https://alexdevcode.com/#organization',
                    'name' => 'AlexDevCode',
                    'url' => 'https://alexdevcode.com/',
                    'logo' => 'https://alexdevcode.com/assets/img/alex-perfil.png',
                    'email' => 'contact@alexdevcode.com',
                    'founder' => [
                        '@id' => 'https://alexdevcode.com/#alex-oliveira',
                    ],
                    'areaServed' => [
                        [
                            '@type' => 'Country',
                            'name' => 'Portugal',
                        ],
                        [
                            '@type' => 'AdministrativeArea',
                            'name' => 'Porto',
                        ],
                        [
                            '@type' => 'City',
                            'name' => 'Vila Nova de Gaia',
                        ],
                    ],
                    'sameAs' => [
                        'https://www.linkedin.com/in/alex-rodrigues-1345a11a5/',
                        'https://github.com/AlexRodrigues-web',
                    ],
                ],
                [
                    '@type' => 'Person',
                    '@id' => 'https://alexdevcode.com/#alex-oliveira',
                    'name' => 'Alex Oliveira',
                    'url' => 'https://alexdevcode.com/sobre.php?lang=pt',
                    'jobTitle' => 'Full Stack Developer',
                    'worksFor' => [
                        '@id' => 'https://alexdevcode.com/#organization',
                    ],
                    'knowsAbout' => [
                        'Desenvolvimento web full stack',
                        'Websites profissionais',
                        'Landing pages',
                        'Sistemas personalizados',
                        'Dashboards',
                        'APIs e integrações',
                        'Manutenção e evolução web',
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => 'https://alexdevcode.com/#website',
                    'url' => 'https://alexdevcode.com/',
                    'name' => 'AlexDevCode',
                    'publisher' => [
                        '@id' => 'https://alexdevcode.com/#organization',
                    ],
                    'inLanguage' => [
                        'pt-PT',
                        'en-GB',
                        'es-ES',
                    ],
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => $pageCanonicalUrl . '#webpage',
                    'url' => $pageCanonicalUrl,
                    'name' => $pageTitle,
                    'description' => $pageDescription,
                    'isPartOf' => [
                        '@id' => 'https://alexdevcode.com/#website',
                    ],
                    'about' => [
                        '@id' => 'https://alexdevcode.com/#organization',
                    ],
                    'inLanguage' => adc_html_lang(),
                ],
            ],
        ],
        JSON_UNESCAPED_SLASHES
        | JSON_UNESCAPED_UNICODE
        | JSON_PRETTY_PRINT
    ) ?>
    </script>


    <!-- ======================================================
         GOOGLE ANALYTICS
    ======================================================= -->

    <script
        async
        src="https://www.googletagmanager.com/gtag/js?id=G-N3H36BHC9D"
    ></script>

    <script>

        window.dataLayer =
            window.dataLayer || [];


        function gtag() {

            dataLayer.push(arguments);

        }


        gtag(
            'js',
            new Date()
        );


        gtag(
            'config',
            'G-N3H36BHC9D'
        );

    </script>

</head>


<body data-tema="claro">


<header
    class="adc-header"
    id="site-header"
>

    <div class="adc-header-inner">


        <!-- ==================================================
             LOGO
        =================================================== -->

        <a
            href="<?= $e(adc_url('index.php')) ?>"
            class="adc-header-logo"
            aria-label="<?= adc_e('header.home_label') ?>"
        >

            <span
                class="adc-header-logo-icon"
                aria-hidden="true"
            >
                <i data-lucide="code-2"></i>
            </span>


            <span class="adc-header-logo-word">
                Alex<span>Dev</span><strong>Code</strong>
            </span>

        </a>



        <!-- ==================================================
             MENU MOBILE
        =================================================== -->

        <button
            type="button"
            class="adc-header-burger"
            id="adcHeaderBurger"

            aria-controls="adcHeaderPanel"
            aria-expanded="false"

            aria-label="<?= adc_e('header.open_menu') ?>"

            data-open-label="<?= adc_e('header.open_menu') ?>"
            data-close-label="<?= adc_e('header.close_menu') ?>"
        >

            <span
                class="adc-icon-menu"
                aria-hidden="true"
            >
                <i data-lucide="menu"></i>
            </span>


            <span
                class="adc-icon-close"
                aria-hidden="true"
            >
                <i data-lucide="x"></i>
            </span>

        </button>



        <!-- ==================================================
             PAINEL
        =================================================== -->

        <div
            class="adc-header-panel"
            id="adcHeaderPanel"
        >


            <!-- ==============================================
                 NAVEGAÇÃO PRINCIPAL
            =============================================== -->

            <nav
                class="adc-header-nav"
                aria-label="<?= adc_e('header.primary_nav') ?>"
            >

                <?php foreach ($primaryNavigation as $item): ?>

                    <?php

                    $hasChildren =
                        !empty($item['children'])
                        && is_array($item['children']);


                    $isActive =
                        $currentFile ===
                        $item['file'];


                    $hasActiveChild =
                        false;


                    if ($hasChildren) {

                        foreach ($item['children'] as $child) {

                            if (
                                $currentFile ===
                                ($child['file'] ?? '')
                            ) {
                                $hasActiveChild =
                                    true;

                                break;
                            }
                        }
                    }


                    $isGroupActive =
                        $isActive
                        || $hasActiveChild;

                    ?>

                    <?php if ($hasChildren): ?>

                        <details
                            class="adc-header-services"
                            id="adcServicesSwitch"
                        >

                            <summary
                                class="<?= $isGroupActive
                                    ? 'is-active'
                                    : ''
                                ?>"
                            >

                                <span class="adc-header-services-summary-label">
                                    <i
                                        data-lucide="briefcase-business"
                                        aria-hidden="true"
                                    ></i>

                                    <span>
                                        <?= $e($item['label']) ?>
                                    </span>
                                </span>

                                <i
                                    data-lucide="chevron-down"
                                    class="adc-header-services-chevron"
                                    aria-hidden="true"
                                ></i>

                            </summary>


                            <div class="adc-header-services-menu">

                                <?php foreach ($item['children'] as $child): ?>

                                    <?php
                                    $isChildActive =
                                        $currentFile ===
                                        ($child['file'] ?? '');
                                    ?>

                                    <a
                                        href="<?= $e(
                                            adc_url(
                                                $child['file']
                                            )
                                        ) ?>"

                                        class="<?= $isChildActive
                                            ? 'is-active'
                                            : ''
                                        ?>"

                                        <?= $isChildActive
                                            ? 'aria-current="page"'
                                            : ''
                                        ?>
                                    >
                                        <i
                                            data-lucide="<?= $e(
                                                $child['icon']
                                                ?? 'arrow-right'
                                            ) ?>"
                                            aria-hidden="true"
                                        ></i>

                                        <span>
                                            <?= $e($child['label']) ?>
                                        </span>
                                    </a>

                                <?php endforeach; ?>

                            </div>

                        </details>

                    <?php else: ?>

                        <a
                            href="<?= $e(
                                adc_url(
                                    $item['file']
                                )
                            ) ?>"

                            class="<?= $e(
                                trim(
                                    ($isActive
                                        ? 'is-active '
                                        : ''
                                    )
                                    . ($item['file'] === 'contato.php'
                                        ? 'adc-header-contact'
                                        : ''
                                    )
                                )
                            ) ?>"

                            <?= $isActive
                                ? 'aria-current="page"'
                                : ''
                            ?>
                        >
                            <?= $e($item['label']) ?>
                        </a>

                    <?php endif; ?>

                <?php endforeach; ?>


                <!-- DEMOFIRST -->

                <a
                    href="<?= $e($demoFirstUrl) ?>"

                    target="_blank"

                    rel="noopener noreferrer"

                    class="adc-header-demofirst"
                >

                    <span>
                        <?= adc_e(
                            'nav.demofirst',
                            [],
                            'DemoFirst'
                        ) ?>

                        <i
                            data-lucide="external-link"
                            aria-hidden="true"
                        ></i>
                    </span>


                    <span class="adc-sr-only">
                        <?= adc_e(
                            'header.external_link'
                        ) ?>
                    </span>

                </a>

            </nav>



            <!-- ==============================================
                 FERRAMENTAS
            =============================================== -->

            <div class="adc-header-tools">


                <!-- ==========================================
                     IDIOMA
                =========================================== -->

                <details
                    class="adc-lang-switch"
                    id="adcLanguageSwitch"
                >

                    <summary
                        aria-label="<?= adc_e(
                            'lang.selector'
                        ) ?>"
                    >

                        <span class="adc-lang-current">

                            <span
                                class="adc-lang-flag"
                                aria-hidden="true"
                            >
                                <?= $e(
                                    $currentLanguage[
                                        'flag'
                                    ]
                                ) ?>
                            </span>


                            <span>
                                <?= $e(
                                    $currentLanguage[
                                        'code'
                                    ]
                                ) ?>
                            </span>


                            <span class="adc-lang-name">
                                <?= $e(
                                    $currentLanguage[
                                        'name'
                                    ]
                                ) ?>
                            </span>

                        </span>


                        <i
                            data-lucide="chevron-down"
                            class="adc-lang-chevron"
                            aria-hidden="true"
                        ></i>

                    </summary>


                    <div
                        class="adc-lang-menu"
                        role="menu"
                    >

                        <?php
                        foreach (
                            $languageOptions
                            as $languageCode =>
                               $languageData
                        ):
                        ?>

                            <a
                                href="<?= $e(
                                    $languageData[
                                        'url'
                                    ]
                                ) ?>"

                                lang="<?= $e(
                                    $languageData[
                                        'locale'
                                    ]
                                ) ?>"

                                hreflang="<?= $e(
                                    $languageData[
                                        'locale'
                                    ]
                                ) ?>"

                                class="<?= !empty(
                                    $languageData[
                                        'active'
                                    ]
                                )
                                    ? 'is-active'
                                    : ''
                                ?>"

                                role="menuitem"
                            >

                                <span
                                    class="adc-lang-flag"
                                    aria-hidden="true"
                                >
                                    <?= $e(
                                        $languageData[
                                            'flag'
                                        ]
                                    ) ?>
                                </span>


                                <span>
                                    <?= $e(
                                        $languageData[
                                            'name'
                                        ]
                                    ) ?>
                                </span>

                            </a>

                        <?php endforeach; ?>

                    </div>

                </details>



                <!-- ==========================================
                     TEMA
                =========================================== -->

                <details
                    class="adc-theme-switch"
                    id="adcThemeSwitch"
                >

                    <summary
                        title="<?= adc_e('header.theme_switch') ?>"
                        aria-label="<?= adc_e('header.theme_switch') ?>"
                    >
                        <span class="adc-theme-current">
                            <i data-lucide="sun-moon" aria-hidden="true"></i>
                            <span class="adc-theme-switch-label">
                                <?= adc_e('header.theme_switch') ?>
                            </span>
                        </span>

                        <i
                            data-lucide="chevron-down"
                            class="adc-theme-chevron"
                            aria-hidden="true"
                        ></i>
                    </summary>


                    <div
                        class="adc-theme-menu"
                        role="group"
                        aria-label="<?= adc_e('header.theme_switch') ?>"
                    >
                        <button
                            type="button"
                            id="lightBtn"
                            class="adc-header-theme-btn"
                            title="<?= adc_e('header.light') ?>"
                            aria-label="<?= adc_e('header.light') ?>"
                            aria-pressed="false"
                        >
                            <i data-lucide="sun" aria-hidden="true"></i>
                            <span class="adc-theme-label">
                                <?= adc_e('header.light') ?>
                            </span>
                        </button>

                        <button
                            type="button"
                            id="darkBtn"
                            class="adc-header-theme-btn"
                            title="<?= adc_e('header.dark') ?>"
                            aria-label="<?= adc_e('header.dark') ?>"
                            aria-pressed="false"
                        >
                            <i data-lucide="moon" aria-hidden="true"></i>
                            <span class="adc-theme-label">
                                <?= adc_e('header.dark') ?>
                            </span>
                        </button>
                    </div>

                </details>
</div>

        </div>

    </div>

</header>





<!-- ==========================================================
     HEADER JS
========================================================== -->

<script>

(function () {

    'use strict';

    function initAlexDevCodeHeader() {

        if (window.lucide) {
            window.lucide.createIcons();
        }

        const pageBody = document.body;

        const darkCSS = document.getElementById('darkSheet');

        const lightBtn = document.getElementById('lightBtn');
        const darkBtn = document.getElementById('darkBtn');

        const burger = document.getElementById('adcHeaderBurger');
        const panel = document.getElementById('adcHeaderPanel');

        const servicesSwitch = document.getElementById('adcServicesSwitch');
        const languageSwitch = document.getElementById('adcLanguageSwitch');
        const themeSwitch = document.getElementById('adcThemeSwitch');


        /* ======================================================
           TEMA — SOMENTE CLARO / ESCURO
        ======================================================= */

        function setTheme(theme) {

            if (!['claro', 'escuro'].includes(theme)) {
                theme = 'claro';
            }

            pageBody.dataset.tema = theme;

            if (darkCSS) {
                darkCSS.disabled = theme !== 'escuro';
            }

            [lightBtn, darkBtn].forEach(function (button) {

                if (!button) {
                    return;
                }

                button.classList.remove('is-active');
                button.setAttribute('aria-pressed', 'false');
            });

            const activeButton =
                theme === 'escuro'
                    ? darkBtn
                    : lightBtn;

            if (activeButton) {
                activeButton.classList.add('is-active');
                activeButton.setAttribute('aria-pressed', 'true');
            }

            try {
                localStorage.setItem(
                    'alexdevcode-theme',
                    theme
                );
            }
            catch (error) {
                /* localStorage indisponível */
            }
        }

        /* ======================================================
           RESTAURAR PREFERÊNCIA DE TEMA
        ======================================================= */

        let savedTheme = 'claro';

        try {
            savedTheme =
                localStorage.getItem('alexdevcode-theme')
                || 'claro';
        }
        catch (error) {
            savedTheme = 'claro';
        }

        setTheme(savedTheme);




        /* ======================================================
           EVENTOS
        ======================================================= */

        if (lightBtn) {
            lightBtn.addEventListener('click', function () {
                setTheme('claro');

                if (themeSwitch) {
                    themeSwitch.open = false;
                }
            });
        }

        if (darkBtn) {
            darkBtn.addEventListener('click', function () {
                setTheme('escuro');

                if (themeSwitch) {
                    themeSwitch.open = false;
                }
            });
        }



        /* ======================================================
           MENU MOBILE
        ======================================================= */

        function closeMenu() {

            if (!burger || !panel) {
                return;
            }

            panel.classList.remove('is-open');
            burger.classList.remove('is-open');

            burger.setAttribute(
                'aria-expanded',
                'false'
            );

            burger.setAttribute(
                'aria-label',
                burger.dataset.openLabel
            );
        }


        function openMenu() {

            if (!burger || !panel) {
                return;
            }

            panel.classList.add('is-open');
            burger.classList.add('is-open');

            burger.setAttribute(
                'aria-expanded',
                'true'
            );

            burger.setAttribute(
                'aria-label',
                burger.dataset.closeLabel
            );
        }


        function toggleMenu() {

            if (!burger || !panel) {
                return;
            }

            if (panel.classList.contains('is-open')) {
                closeMenu();
            }
            else {
                openMenu();
            }
        }


        if (burger && panel) {

            burger.addEventListener(
                'click',
                toggleMenu
            );

            panel
                .querySelectorAll('.adc-header-nav a')
                .forEach(function (link) {
                    link.addEventListener(
                        'click',
                        function () {

                            if (servicesSwitch) {
                                servicesSwitch.open = false;
                            }

                            closeMenu();
                        }
                    );
                });
        }


        /* ======================================================
           CLICK FORA
        ======================================================= */

        document.addEventListener('click', function (event) {

            if (
                panel
                && burger
                && panel.classList.contains('is-open')
                && !panel.contains(event.target)
                && !burger.contains(event.target)
            ) {
                closeMenu();
            }

            [
                servicesSwitch,
                languageSwitch,
                themeSwitch

            ].forEach(function (details) {

                if (
                    details
                    && details.open
                    && !details.contains(event.target)
                ) {
                    details.open = false;
                }
            });
        });


        /* ======================================================
           ESC
        ======================================================= */

        document.addEventListener('keydown', function (event) {

            if (event.key !== 'Escape') {
                return;
            }

            closeMenu();

            [
                servicesSwitch,
                languageSwitch,
                themeSwitch

            ].forEach(function (details) {

                if (details) {
                    details.open = false;
                }
            });
        });


        /* ======================================================
           RESIZE
        ======================================================= */

        window.addEventListener('resize', function () {

            if (window.innerWidth >= 921) {
                closeMenu();
            }
        });
    }


    if (document.readyState === 'loading') {

        document.addEventListener(
            'DOMContentLoaded',
            initAlexDevCodeHeader
        );
    }
    else {
        initAlexDevCodeHeader();
    }

})();

</script>