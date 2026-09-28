<?php

/* ==========================================================
   ALEXDEVCODE
   HOME

   Função desta página:
   - apresentar rapidamente a AlexDevCode
   - mostrar as duas frentes principais
   - encaminhar para Serviços, Projetos e Contacto
   - mostrar provas sem repetir a página Serviços

   PT/EN/ES centralizados via includes/i18n.php.
========================================================== */

try {
    require_once __DIR__ . '/includes/header.php';
} catch (Throwable $e) {
    error_log('Failed to load header.php: ' . $e->getMessage());
}

$e = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$servicesUrl  = adc_url('solucoes.php');
$projectsUrl  = adc_url('projetos.php');
$aboutUrl     = adc_url('sobre.php');
$contactUrl   = adc_url('contato.php?utm_source=website&utm_medium=organic&utm_campaign=home');
$demoFirstUrl = adc_demofirst_url();


/* ==========================================================
   CAMINHOS PRINCIPAIS
========================================================== */

$homePaths = [

    [
        'number' => '01',
        'icon'   => 'fa-window-maximize',
        'title'  => t('home.paths.item1_title'),
        'text'   => t('home.paths.item1_text'),
    ],

    [
        'number' => '02',
        'icon'   => 'fa-diagram-project',
        'title'  => t('home.paths.item2_title'),
        'text'   => t('home.paths.item2_text'),
    ],

    [
        'number' => '03',
        'icon'   => 'fa-arrow-trend-up',
        'title'  => t('home.paths.item3_title'),
        'text'   => t('home.paths.item3_text'),
    ],

];


/* ==========================================================
   PROJETOS EM DESTAQUE
========================================================== */

$featuredProjects = [

    [
        'number' => '01',
        'type'   => t('home.projects.houseflow_type'),
        'title'  => 'HouseFlow',
        'text'   => t('home.projects.houseflow_text'),
        'url'    => $projectsUrl,
    ],

    [
        'number' => '02',
        'type'   => t('home.projects.timeclock_type'),
        'title'  => 'TimeClock',
        'text'   => t('home.projects.timeclock_text'),
        'url'    => $projectsUrl,
    ],

    [
        'number'   => '03',
        'type'     => t('home.projects.demofirst_type'),
        'title'    => 'DemoFirst',
        'text'     => t('home.projects.demofirst_text'),
        'url'      => $demoFirstUrl,
        'external' => true,
    ],

];


/* ==========================================================
   PROVAS / SINAIS DE CONFIANÇA
========================================================== */

$trustSignals = [

    [
        'icon'  => 'fa-circle-check',
        'title' => t('home.proof.signal1_title'),
        'text'  => t('home.proof.signal1_text'),
    ],

    [
        'icon'  => 'fa-code-branch',
        'title' => t('home.proof.signal2_title'),
        'text'  => t('home.proof.signal2_text'),
    ],

    [
        'icon'  => 'fa-user-check',
        'title' => t('home.proof.signal3_title'),
        'text'  => t('home.proof.signal3_text'),
    ],

    [
        'icon'  => 'fa-arrow-rotate-right',
        'title' => t('home.proof.signal4_title'),
        'text'  => t('home.proof.signal4_text'),
    ],

];


/* ==========================================================
   EXPLORAR ALEXDEVCODE
========================================================== */

$exploreItems = [

    [
        'icon'    => 'fa-comments',
        'title'   => t('home.explore.contact_title'),
        'text'    => t('home.explore.contact_text'),
        'url'     => $contactUrl,
        'primary' => true,
    ],

    [
        'icon'  => 'fa-code',
        'title' => t('home.explore.services_title'),
        'text'  => t('home.explore.services_text'),
        'url'   => $servicesUrl,
    ],

    [
        'icon'  => 'fa-folder-open',
        'title' => t('home.explore.projects_title'),
        'text'  => t('home.explore.projects_text'),
        'url'   => $projectsUrl,
    ],

    [
        'icon'     => 'fa-arrow-up-right-from-square',
        'title'    => t('home.explore.demofirst_title'),
        'text'     => t('home.explore.demofirst_text'),
        'url'      => $demoFirstUrl,
        'external' => true,
    ],

];

?>


<link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
>

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
>

<link
    rel="stylesheet"
    href="https://unpkg.com/aos@2.3.1/dist/aos.css"
>


<style>

/* ==========================================================
   HOME
========================================================== */

.adc-home {

    --h-dark:
        #141414;

    --h-accent:
        #8b735d;

    --h-accent-dk:
        #715d4b;

    --h-accent-lt:
        #c6b8a9;

    --h-bg:
        #d7d9dd;

    --h-card:
        #ffffff;

    --h-soft:
        #f7f4f0;

    --h-text:
        #2f2f2f;

    --h-muted:
        #5b5753;

    --h-border:
        rgba(20, 20, 20, .10);

    --h-shadow:
        0 8px 24px
        rgba(20, 20, 20, .10);

    --h-shadow-strong:
        0 18px 48px
        rgba(20, 20, 20, .18);


    color:
        var(--h-text);


    background:

        radial-gradient(
            circle at 4% 0%,
            rgba(139, 115, 93, .16),
            transparent 27rem
        ),

        radial-gradient(
            circle at 96% 48%,
            rgba(20, 20, 20, .07),
            transparent 30rem
        ),

        var(--h-bg);


    overflow:
        hidden;

}


body[data-tema="escuro"]
.adc-home {

    --h-bg:
        #171717;

    --h-card:
        #202020;

    --h-soft:
        #262322;

    --h-text:
        #ebe6e0;

    --h-muted:
        #b5aea8;

    --h-border:
        rgba(255, 255, 255, .10);

    --h-shadow:
        0 8px 24px
        rgba(0, 0, 0, .24);

    --h-shadow-strong:
        0 18px 48px
        rgba(0, 0, 0, .34);

}


.adc-home *,
.adc-home *::before,
.adc-home *::after {

    box-sizing:
        border-box;

}


.adc-home-container {

    width:
        min(
            calc(100% - 2rem),
            1180px
        );


    margin:
        0 auto;

}


.adc-home-section {

    padding:
        4.7rem 0;

}



/* ==========================================================
   TÍTULOS
========================================================== */

.adc-home-kicker {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .5rem;


    color:
        var(--h-accent-dk);


    font-size:
        .7rem;


    font-weight:
        800;


    letter-spacing:
        .11em;


    text-transform:
        uppercase;

}


body[data-tema="escuro"]
.adc-home-kicker {

    color:
        var(--h-accent-lt);

}


.adc-home-kicker::before {

    content:
        "";


    width:
        22px;


    height:
        2px;


    border-radius:
        999px;


    background:
        var(--h-accent);

}


.adc-home-heading {

    max-width:
        780px;


    margin:
        .65rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.15rem,
            7vw,
            4rem
        );


    line-height:
        .98;


    letter-spacing:
        -.04em;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-heading {

    color:
        #fff;

}


.adc-home-intro {

    max-width:
        680px;


    margin:
        .85rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .86rem;


    line-height:
        1.7;

}



/* ==========================================================
   BOTÕES
========================================================== */

.adc-home-btn {

    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    gap:
        .5rem;


    min-height:
        43px;


    padding:
        .7rem 1rem;


    border:
        1px solid transparent;


    border-radius:
        999px;


    text-decoration:
        none;


    font-size:
        .76rem;


    font-weight:
        700;


    transition:
        transform .22s ease,
        background .22s ease,
        border-color .22s ease,
        color .22s ease;

}


.adc-home-btn:hover {

    transform:
        translateY(-3px);

}


.adc-home-btn-primary {

    background:
        var(--h-dark);


    color:
        #fff;

}


.adc-home-btn-primary:hover {

    background:
        var(--h-accent);

}


.adc-home-btn-ghost {

    border-color:
        rgba(139, 115, 93, .24);


    background:
        rgba(139, 115, 93, .08);


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-btn-ghost {

    color:
        #fff;

}


.adc-home-btn-ghost:hover {

    background:
        rgba(139, 115, 93, .18);

}



/* ==========================================================
   HERO
========================================================== */

.adc-home-hero-wrap {

    padding:
        3rem 0 1rem;

}


.adc-home-hero {

    position:
        relative;


    overflow:
        hidden;


    border:
        1px solid
        var(--h-border);


    border-radius:
        30px;


    padding:
        1.5rem;


    background:
        rgba(255, 255, 255, .88);


    box-shadow:
        var(--h-shadow);

}


body[data-tema="escuro"]
.adc-home-hero {

    background:
        rgba(30, 30, 30, .92);

}


.adc-home-hero::before,
.adc-home-hero::after {

    content:
        "";


    position:
        absolute;


    border-radius:
        50%;


    pointer-events:
        none;

}


.adc-home-hero::before {

    width:
        240px;


    height:
        240px;


    right:
        -80px;


    top:
        -100px;


    background:
        var(--h-accent);


    opacity:
        .10;


    animation:
        adcHomeFloat
        8s
        ease-in-out
        infinite;

}


.adc-home-hero::after {

    width:
        190px;


    height:
        190px;


    left:
        -70px;


    bottom:
        -90px;


    background:
        var(--h-dark);


    opacity:
        .055;


    animation:
        adcHomeFloat
        9s
        ease-in-out
        infinite reverse;

}


.adc-home-hero-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    grid-template-columns:
        minmax(0, 1fr);


    gap:
        1rem;


    align-items:
        center;

}



/* ==========================================================
   CENTRO
========================================================== */

.adc-home-brand {

    order:
        1;


    text-align:
        center;


    padding:
        .4rem;


    transition:
        transform .18s ease-out;

}



/* ==========================================================
   PILARES
========================================================== */

.adc-home-pillar {

    order:
        2;


    position:
        relative;


    min-height:
        145px;


    padding:
        1rem;


    overflow:
        hidden;


    border:
        1px solid
        rgba(139, 115, 93, .18);


    border-radius:
        20px;


    background:
        var(--h-soft);


    transition:
        transform .25s ease,
        box-shadow .25s ease;

}


.adc-home-pillar:last-child {

    order:
        3;

}


.adc-home-pillar:hover {

    transform:
        translateY(-5px);


    box-shadow:
        var(--h-shadow);

}


.adc-home-pillar::after {

    content:
        "";


    position:
        absolute;


    width:
        90px;


    height:
        90px;


    right:
        -34px;


    top:
        -34px;


    border:
        1px solid
        rgba(139, 115, 93, .18);


    border-radius:
        50%;

}


.adc-home-pillar-label {

    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2rem,
            10vw,
            3.5rem
        );


    line-height:
        .9;


    letter-spacing:
        .03em;


    color:
        var(--h-accent);

}


.adc-home-pillar h2 {

    margin:
        .8rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.18rem;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-pillar h2 {

    color:
        #fff;

}


.adc-home-pillar p {

    margin:
        .35rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .72rem;


    line-height:
        1.55;

}



/* ==========================================================
   LOGO / ÓRBITA
========================================================== */

.adc-home-logo-orbit {

    position:
        relative;


    width:
        150px;


    height:
        150px;


    margin:
        0 auto .75rem;


    padding:
        6px;


    border-radius:
        50%;


    background:
        linear-gradient(
            135deg,
            var(--h-accent),
            var(--h-dark)
        );


    box-shadow:
        0 15px 38px
        rgba(0, 0, 0, .18);


    animation:
        adcHomeLogoFloat
        4.8s
        ease-in-out
        infinite;

}


.adc-home-logo-orbit::before {

    content:
        "";


    position:
        absolute;


    inset:
        -15px;


    border:
        2px dashed
        rgba(139, 115, 93, .38);


    border-radius:
        50%;


    animation:
        adcHomeSpin
        24s
        linear
        infinite;

}


.adc-home-logo-orbit::after {

    content:
        "";


    position:
        absolute;


    width:
        10px;


    height:
        10px;


    top:
        4px;


    right:
        20px;


    border-radius:
        50%;


    background:
        var(--h-accent);

}


.adc-home-logo-orbit img {

    position:
        relative;


    z-index:
        2;


    display:
        block;


    width:
        100%;


    height:
        100%;


    object-fit:
        cover;


    border:
        4px solid #fff;


    border-radius:
        50%;

}



/* ==========================================================
   MARCA
========================================================== */

.adc-home-availability {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .4rem;


    color:
        var(--h-accent-dk);


    font-size:
        .62rem;


    font-weight:
        700;

}


body[data-tema="escuro"]
.adc-home-availability {

    color:
        var(--h-accent-lt);

}


.adc-home-availability::before {

    content:
        "";


    width:
        6px;


    height:
        6px;


    border-radius:
        50%;


    background:
        #61ba78;


    box-shadow:
        0 0 0 4px
        rgba(97, 186, 120, .12);

}


.adc-home-brand-name {

    margin:
        .4rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.4rem,
            9vw,
            4rem
        );


    line-height:
        .92;


    letter-spacing:
        -.045em;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-brand-name {

    color:
        #fff;

}


.adc-home-brand-name span {

    color:
        var(--h-accent);

}


.adc-home-brand-message {

    max-width:
        560px;


    margin:
        .55rem auto 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.35rem,
            4vw,
            1.9rem
        );


    line-height:
        1.05;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-brand-message {

    color:
        #fff;

}


.adc-home-brand-message strong {

    color:
        var(--h-accent);

}


.adc-home-brand-copy {

    max-width:
        560px;


    margin:
        .55rem auto 0;


    color:
        var(--h-muted);


    font-size:
        .75rem;


    line-height:
        1.6;

}


.adc-home-hero-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        .8rem;

}


.adc-home-hero-actions
.adc-home-btn-ghost {

    background:
        transparent;


    border-color:
        transparent;

}



/* ==========================================================
   TICKER
========================================================== */

.adc-home-ticker {

    position:
        relative;


    overflow:
        hidden;


    margin-top:
        1.2rem;


    margin-bottom:
        2.6rem;


    border-radius:
        14px;


    background:
        var(--h-dark);


    box-shadow:
        var(--h-shadow);

}


.adc-home-ticker::before,
.adc-home-ticker::after {

    content:
        "";


    position:
        absolute;


    top:
        0;


    bottom:
        0;


    z-index:
        2;


    width:
        55px;


    pointer-events:
        none;

}


.adc-home-ticker::before {

    left:
        0;


    background:
        linear-gradient(
            90deg,
            var(--h-dark),
            transparent
        );

}


.adc-home-ticker::after {

    right:
        0;


    background:
        linear-gradient(
            -90deg,
            var(--h-dark),
            transparent
        );

}


.adc-home-ticker-track {

    display:
        flex;


    align-items:
        center;


    gap:
        1.7rem;


    width:
        max-content;


    padding:
        .72rem 1rem;


    animation:
        adcHomeTicker
        28s
        linear
        infinite;

}


.adc-home-ticker-item {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .4rem;


    white-space:
        nowrap;


    color:
        rgba(255, 255, 255, .82);


    font-size:
        .68rem;


    font-weight:
        600;

}


.adc-home-ticker-item i {

    color:
        var(--h-accent-lt);

}



/* ==========================================================
   PROVA / CONFIANÇA
========================================================== */

.adc-home-proof {

    padding:
        .4rem 0 4.2rem;

}


.adc-home-proof-head {

    display:
        grid;


    gap:
        .7rem;


    align-items:
        end;

}


.adc-home-proof .adc-home-heading {

    max-width:
        760px;


    font-size:
        clamp(
            1.85rem,
            6vw,
            3.2rem
        );

}


.adc-home-proof .adc-home-intro {

    max-width:
        650px;

}


.adc-home-proof-grid {

    display:
        grid;


    gap:
        .65rem;


    margin-top:
        1.5rem;

}


.adc-home-proof-item {

    position:
        relative;


    min-height:
        150px;


    padding:
        1rem;


    border:
        1px solid
        var(--h-border);


    border-radius:
        16px;


    background:
        rgba(255, 255, 255, .58);


    overflow:
        hidden;

}


body[data-tema="escuro"]
.adc-home-proof-item {

    background:
        rgba(255, 255, 255, .035);

}


.adc-home-proof-item::after {

    content:
        "";


    position:
        absolute;


    width:
        78px;


    height:
        78px;


    right:
        -30px;


    bottom:
        -34px;


    border:
        1px solid
        rgba(139, 115, 93, .16);


    border-radius:
        50%;

}


.adc-home-proof-icon {

    width:
        34px;


    height:
        34px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        10px;


    background:
        var(--h-dark);


    color:
        #fff;


    font-size:
        .78rem;

}


.adc-home-proof-item h3 {

    position:
        relative;


    z-index:
        2;


    margin:
        .75rem 0 0;


    color:
        var(--h-dark);


    font-family:
        'Poppins',
        sans-serif;


    font-size:
        .82rem;


    font-weight:
        700;

}


body[data-tema="escuro"]
.adc-home-proof-item h3 {

    color:
        #fff;

}


.adc-home-proof-item p {

    position:
        relative;


    z-index:
        2;


    margin:
        .35rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .7rem;


    line-height:
        1.58;

}



/* ==========================================================
   CAMINHOS
========================================================== */

.adc-home-paths {

    margin-top:
        1.7rem;


    border-top:
        1px solid
        var(--h-border);

}


.adc-home-path {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        40px minmax(0, 1fr) 28px;


    gap:
        .8rem;


    align-items:
        center;


    padding:
        1.2rem .1rem;


    border-bottom:
        1px solid
        var(--h-border);


    color:
        inherit;


    text-decoration:
        none;


    overflow:
        hidden;


    transition:
        padding .24s ease;

}


.adc-home-path::before {

    content:
        "";


    position:
        absolute;


    inset:
        0 auto 0 0;


    width:
        0;


    background:
        rgba(139, 115, 93, .075);


    transition:
        width .35s ease;

}


.adc-home-path:hover::before {

    width:
        100%;

}


.adc-home-path:hover {

    padding-left:
        .7rem;


    padding-right:
        .7rem;

}


.adc-home-path-icon,
.adc-home-path-copy,
.adc-home-path-arrow {

    position:
        relative;


    z-index:
        2;

}


.adc-home-path-icon {

    width:
        36px;


    height:
        36px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        10px;


    background:
        var(--h-dark);


    color:
        #fff;

}


.adc-home-path-copy small {

    display:
        block;


    margin-bottom:
        .15rem;


    color:
        var(--h-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .66rem;

}


.adc-home-path-copy h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.35rem;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-path-copy h3 {

    color:
        #fff;

}


.adc-home-path-copy p {

    max-width:
        720px;


    margin:
        .3rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .72rem;


    line-height:
        1.55;

}


.adc-home-path-arrow {

    color:
        var(--h-accent);


    transition:
        transform .22s ease;

}


.adc-home-path:hover
.adc-home-path-arrow {

    transform:
        translateX(5px);

}



/* ==========================================================
   PROJETOS
========================================================== */

.adc-home-work {

    position:
        relative;


    overflow:
        hidden;


    background:
        var(--h-dark);


    color:
        #fff;

}


.adc-home-work::before {

    content:
        "</>";


    position:
        absolute;


    right:
        -1.5rem;


    top:
        -3rem;


    color:
        rgba(255, 255, 255, .025);


    font-family:
        ui-monospace,
        monospace;


    font-size:
        15rem;


    font-weight:
        900;


    pointer-events:
        none;

}


.adc-home-work
.adc-home-kicker {

    color:
        var(--h-accent-lt);

}


.adc-home-work
.adc-home-heading {

    color:
        #fff;

}


.adc-home-work
.adc-home-intro {

    color:
        #aaa39c;

}


.adc-home-work-rail {

    margin-top:
        1.7rem;


    border-top:
        1px solid
        rgba(255, 255, 255, .10);

}


.adc-home-work-row {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        38px minmax(0, 1fr) 30px;


    gap:
        .8rem;


    align-items:
        center;


    padding:
        1.2rem 0;


    border-bottom:
        1px solid
        rgba(255, 255, 255, .10);


    color:
        #fff;


    text-decoration:
        none;


    overflow:
        hidden;


    transition:
        padding .24s ease;

}


.adc-home-work-row::before {

    content:
        "";


    position:
        absolute;


    inset:
        0;


    transform:
        scaleX(0);


    transform-origin:
        left;


    background:
        linear-gradient(
            90deg,
            rgba(139, 115, 93, .22),
            rgba(139, 115, 93, .03)
        );


    transition:
        transform .34s ease;

}


.adc-home-work-row:hover::before {

    transform:
        scaleX(1);

}


.adc-home-work-row:hover {

    padding-left:
        .7rem;


    padding-right:
        .7rem;

}


.adc-home-work-index,
.adc-home-work-copy,
.adc-home-work-arrow {

    position:
        relative;


    z-index:
        2;

}


.adc-home-work-index {

    color:
        var(--h-accent-lt);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .72rem;

}


.adc-home-work-type {

    display:
        block;


    margin-bottom:
        .1rem;


    color:
        #968c84;


    font-size:
        .56rem;


    font-weight:
        700;


    letter-spacing:
        .09em;


    text-transform:
        uppercase;

}


.adc-home-work-copy h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.5rem,
            5vw,
            2.3rem
        );


    line-height:
        1;

}


.adc-home-work-copy p {

    max-width:
        720px;


    margin:
        .3rem 0 0;


    color:
        #aaa39c;


    font-size:
        .68rem;


    line-height:
        1.5;

}


.adc-home-work-arrow {

    width:
        30px;


    height:
        30px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border:
        1px solid
        rgba(255, 255, 255, .13);


    border-radius:
        50%;


    color:
        var(--h-accent-lt);


    transition:
        transform .25s ease;

}


.adc-home-work-row:hover
.adc-home-work-arrow {

    transform:
        rotate(45deg);

}



/* ==========================================================
   EXPLORAR
========================================================== */

.adc-home-explore {

    display:
        grid;


    gap:
        .65rem;


    margin-top:
        1.6rem;

}


.adc-home-explore-item {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        38px minmax(0, 1fr) 24px;


    gap:
        .7rem;


    align-items:
        center;


    padding:
        .85rem;


    border:
        1px solid
        var(--h-border);


    border-radius:
        14px;


    color:
        inherit;


    text-decoration:
        none;


    background:
        var(--h-card);


    transition:
        transform .22s ease,
        border-color .22s ease;

}


.adc-home-explore-item:hover {

    transform:
        translateY(-3px);


    border-color:
        rgba(139, 115, 93, .34);

}


.adc-home-explore-item.is-primary {

    border-color:
        var(--h-dark);


    background:
        var(--h-dark);


    color:
        #fff;

}


.adc-home-explore-item.is-primary
.adc-home-explore-icon {

    background:
        rgba(255, 255, 255, .10);


    color:
        var(--h-accent-lt);

}


.adc-home-explore-item.is-primary
.adc-home-explore-copy h3 {

    color:
        #fff;

}


.adc-home-explore-item.is-primary
.adc-home-explore-copy p {

    color:
        rgba(255, 255, 255, .68);

}


.adc-home-explore-item.is-primary
.adc-home-explore-arrow {

    color:
        var(--h-accent-lt);

}


.adc-home-explore-icon {

    width:
        36px;


    height:
        36px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        10px;


    background:
        rgba(139, 115, 93, .11);


    color:
        var(--h-accent);

}


.adc-home-explore-copy h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.05rem;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-explore-copy h3 {

    color:
        #fff;

}


.adc-home-explore-copy p {

    margin:
        .18rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .66rem;


    line-height:
        1.5;

}


.adc-home-explore-arrow {

    color:
        var(--h-accent);

}



/* ==========================================================
   RESPONSÁVEL
========================================================== */

.adc-home-founder {

    padding-top:
        1rem;

}


.adc-home-founder-line {

    position:
        relative;


    display:
        grid;


    gap:
        1.2rem;


    align-items:
        center;


    padding:
        2rem 0;


    border-top:
        1px solid
        var(--h-border);


    border-bottom:
        1px solid
        var(--h-border);

}


.adc-home-founder-visual {

    position:
        relative;


    width:
        130px;


    height:
        130px;


    margin:
        0 auto;

}


.adc-home-founder-visual::before {

    content:
        "";


    position:
        absolute;


    inset:
        -12px;


    border:
        1px dashed
        rgba(139, 115, 93, .36);


    border-radius:
        50%;


    animation:
        adcHomeSpin
        28s
        linear
        infinite reverse;

}


.adc-home-founder-visual img {

    width:
        100%;


    height:
        100%;


    display:
        block;


    object-fit:
        cover;


    border:
        5px solid #fff;


    border-radius:
        50%;


    box-shadow:
        var(--h-shadow);

}


.adc-home-founder-copy h2 {

    margin:
        .55rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.9rem,
            6vw,
            3rem
        );


    line-height:
        1;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-founder-copy h2 {

    color:
        #fff;

}


.adc-home-founder-copy p {

    max-width:
        700px;


    margin:
        .6rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .74rem;


    line-height:
        1.6;

}


.adc-home-founder-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        .85rem;

}



/* ==========================================================
   CTA
========================================================== */

.adc-home-cta {

    padding:
        4rem 0 5rem;

}


.adc-home-cta-line {

    position:
        relative;


    padding:
        2.5rem 0;


    border-top:
        2px solid
        var(--h-dark);


    border-bottom:
        2px solid
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-cta-line {

    border-color:
        rgba(255, 255, 255, .85);

}


.adc-home-cta-line::after {

    content:
        "→";


    position:
        absolute;


    right:
        0;


    top:
        50%;


    transform:
        translateY(-50%);


    color:
        rgba(139, 115, 93, .13);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        9rem;


    line-height:
        1;


    pointer-events:
        none;


    animation:
        adcHomeArrow
        3s
        ease-in-out
        infinite;

}


.adc-home-cta-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-home-cta-copy h2 {

    max-width:
        800px;


    margin:
        .55rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.2rem,
            8vw,
            4.3rem
        );


    line-height:
        .96;


    letter-spacing:
        -.04em;


    color:
        var(--h-dark);

}


body[data-tema="escuro"]
.adc-home-cta-copy h2 {

    color:
        #fff;

}


.adc-home-cta-copy p {

    max-width:
        620px;


    margin:
        .65rem 0 0;


    color:
        var(--h-muted);


    font-size:
        .75rem;


    line-height:
        1.6;

}


.adc-home-cta-actions {

    position:
        relative;


    z-index:
        2;


    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        1rem;

}



/* ==========================================================
   ANIMAÇÕES
========================================================== */

@keyframes adcHomeFloat {

    0%,
    100% {

        transform:
            translateY(0)
            scale(1);

    }


    50% {

        transform:
            translateY(16px)
            scale(1.04);

    }

}


@keyframes adcHomeLogoFloat {

    0%,
    100% {

        transform:
            translateY(0)
            rotate(-1deg);

    }


    50% {

        transform:
            translateY(-9px)
            rotate(1deg);

    }

}


@keyframes adcHomeSpin {

    from {

        transform:
            rotate(0);

    }


    to {

        transform:
            rotate(360deg);

    }

}


@keyframes adcHomeTicker {

    from {

        transform:
            translateX(0);

    }


    to {

        transform:
            translateX(-50%);

    }

}


@keyframes adcHomeArrow {

    0%,
    100% {

        transform:
            translateY(-50%)
            translateX(0);

    }


    50% {

        transform:
            translateY(-50%)
            translateX(12px);

    }

}



/* ==========================================================
   TABLET
========================================================== */

@media (min-width: 640px) {

    .adc-home-hero-actions,
    .adc-home-founder-actions,
    .adc-home-cta-actions {

        flex-direction:
            row;


        flex-wrap:
            wrap;


        justify-content:
            center;

    }


    .adc-home-founder-actions,
    .adc-home-cta-actions {

        justify-content:
            flex-start;

    }


    .adc-home-proof-grid,
    .adc-home-explore {

        grid-template-columns:
            repeat(
                2,
                minmax(0, 1fr)
            );

    }

}



/* ==========================================================
   DESKTOP
========================================================== */

@media (min-width: 920px) {

    .adc-home-section {

        padding:
            5.4rem 0;

    }


    .adc-home-hero-wrap {

        padding-top:
            3.8rem;

    }


    .adc-home-hero {

        padding:
            2rem;

    }


    .adc-home-hero-grid {

        grid-template-columns:
            minmax(190px, .72fr)
            minmax(0, 1.55fr)
            minmax(190px, .72fr);


        gap:
            2.2rem;

    }


    .adc-home-pillar,
    .adc-home-brand,
    .adc-home-pillar:last-child {

        order:
            initial;

    }


    .adc-home-pillar {

        min-height:
            205px;


        padding:
            1.15rem;

    }


    .adc-home-pillar-label {

        font-size:
            3rem;

    }


    .adc-home-logo-orbit {

        width:
            142px;


        height:
            142px;

    }


    .adc-home-brand-name {

        font-size:
            3.75rem;

    }


    .adc-home-brand-message {

        font-size:
            1.75rem;

    }


    .adc-home-brand-copy {

        font-size:
            .72rem;

    }


    .adc-home-path {

        grid-template-columns:
            48px
            minmax(0, 1fr)
            32px;

    }


    .adc-home-proof-grid,
    .adc-home-explore {

        grid-template-columns:
            repeat(
                4,
                minmax(0, 1fr)
            );

    }


    .adc-home-proof-head {

        grid-template-columns:
            minmax(0, 1.15fr)
            minmax(320px, .85fr);


        gap:
            3rem;

    }


    .adc-home-founder-line {

        grid-template-columns:
            160px
            minmax(0, 1fr);


        gap:
            2.4rem;

    }


    .adc-home-founder-visual {

        width:
            145px;


        height:
            145px;

    }

}



/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 639px) {

    .adc-home-hero-wrap {

        padding-top:
            2rem;

    }


    .adc-home-logo-orbit {

        width:
            142px;


        height:
            142px;

    }


    .adc-home-proof {

        padding-bottom:
            3.4rem;

    }


    .adc-home-ticker {

        margin-bottom:
            2rem;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-home *,
    .adc-home *::before,
    .adc-home *::after {

        animation:
            none !important;


        transition:
            none !important;


        scroll-behavior:
            auto !important;

    }

}

</style>


<main class="adc-home">


    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="adc-home-hero-wrap">

        <div class="adc-home-container">


            <div
                class="adc-home-hero"
                data-aos="fade-up"
            >

                <div class="adc-home-hero-grid">


                    <!-- WEB -->

                    <article
                        class="adc-home-pillar"
                        data-aos="fade-right"
                        data-aos-delay="80"
                    >

                        <div class="adc-home-pillar-label">
                            WEB
                        </div>


                        <h2>
                            <?= $e(t('home.hero.web_title')) ?>
                        </h2>


                        <p>
                            <?= $e(t('home.hero.web_text')) ?>
                        </p>

                    </article>



                    <!-- CENTRO -->

                    <div
                        class="adc-home-brand"
                        id="adcHomeBrand"
                        data-aos="zoom-in"
                        data-aos-delay="140"
                    >

                        <div class="adc-home-logo-orbit">

                            <img
                                src="assets/img/alex-perfil.jpeg"
                                alt="AlexDevCode"
                            >

                        </div>


                        <span class="adc-home-availability">
                            <?= $e(t('home.hero.badge')) ?>
                        </span>


                        <h1 class="adc-home-brand-name">

                            Alex<span>Dev</span>Code

                        </h1>


                        <h2 class="adc-home-brand-message">

                            <?= $e(t('home.hero.title_before')) ?>

                            <strong>
                                <?= $e(t('home.hero.title_highlight')) ?>
                            </strong>

                        </h2>


                        <p class="adc-home-brand-copy">

                            <?= $e(t('home.hero.description')) ?>

                        </p>


                        <div class="adc-home-hero-actions">

                            <a
                                href="<?= $e($contactUrl) ?>"
                                class="
                                    adc-home-btn
                                    adc-home-btn-primary
                                "
                            >

                                <i
                                    class="fas fa-paper-plane"
                                    aria-hidden="true"
                                ></i>

                                <?= $e(t('home.hero.primary_cta')) ?>

                            </a>


                            <a
                                href="<?= $e($projectsUrl) ?>"
                                class="
                                    adc-home-btn
                                    adc-home-btn-ghost
                                "
                            >

                                <i
                                    class="fas fa-folder-open"
                                    aria-hidden="true"
                                ></i>

                                <?= $e(t('home.hero.secondary_cta')) ?>

                            </a>

                        </div>

                    </div>



                    <!-- SYSTEM -->

                    <article
                        class="adc-home-pillar"
                        data-aos="fade-left"
                        data-aos-delay="80"
                    >

                        <div class="adc-home-pillar-label">
                            SYSTEM
                        </div>


                        <h2>
                            <?= $e(t('home.hero.system_title')) ?>
                        </h2>


                        <p>
                            <?= $e(t('home.hero.system_text')) ?>
                        </p>

                    </article>


                </div>

            </div>



            <!-- =================================================
                 TICKER
            ================================================== -->

            <div
                class="adc-home-ticker"
                data-aos="fade-up"
            >

                <div class="adc-home-ticker-track">

                    <?php for ($repeat = 0; $repeat < 2; $repeat++): ?>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-window-maximize"></i>
                            <?= $e(t('home.ticker.websites')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-bullseye"></i>
                            <?= $e(t('home.ticker.landing')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-table-columns"></i>
                            <?= $e(t('home.ticker.dashboards')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-gears"></i>
                            <?= $e(t('home.ticker.systems')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-plug"></i>
                            <?= $e(t('home.ticker.apis')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-mobile-screen-button"></i>
                            <?= $e(t('home.ticker.mobile')) ?>
                        </span>

                        <span class="adc-home-ticker-item">
                            <i class="fas fa-arrow-trend-up"></i>
                            <?= $e(t('home.ticker.evolution')) ?>
                        </span>

                    <?php endfor; ?>

                </div>

            </div>


        </div>

    </section>



    <!-- ======================================================
         PROVA / CONFIANÇA
    ======================================================= -->

    <section class="adc-home-proof">

        <div class="adc-home-container">

            <div class="adc-home-proof-head">

                <div>

                    <span class="adc-home-kicker">
                        <?= $e(t('home.proof.kicker')) ?>
                    </span>

                    <h2 class="adc-home-heading">
                        <?= $e(t('home.proof.title')) ?>
                    </h2>

                </div>

                <p class="adc-home-intro">
                    <?= $e(t('home.proof.description')) ?>
                </p>

            </div>

            <div class="adc-home-proof-grid">

                <?php foreach ($trustSignals as $signal): ?>

                    <article
                        class="adc-home-proof-item"
                        data-aos="fade-up"
                    >

                        <span
                            class="adc-home-proof-icon"
                            aria-hidden="true"
                        >
                            <i class="fas <?= $e($signal['icon']) ?>"></i>
                        </span>

                        <h3>
                            <?= $e($signal['title']) ?>
                        </h3>

                        <p>
                            <?= $e($signal['text']) ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>

    </section>



    <!-- ======================================================
         CAMINHOS
    ======================================================= -->

    <section class="adc-home-section">

        <div class="adc-home-container">


            <span class="adc-home-kicker">
                <?= $e(t('home.paths.kicker')) ?>
            </span>


            <h2 class="adc-home-heading">

                <?= $e(t('home.paths.title')) ?>

            </h2>


            <p class="adc-home-intro">

                <?= $e(t('home.paths.description')) ?>

            </p>


            <div class="adc-home-paths">

                <?php foreach ($homePaths as $path): ?>

                    <a
                        href="<?= $e($servicesUrl) ?>"
                        class="adc-home-path"
                        data-aos="fade-up"
                    >

                        <span
                            class="adc-home-path-icon"
                            aria-hidden="true"
                        >
                            <i
                                class="fas <?= $e($path['icon']) ?>"
                            ></i>
                        </span>


                        <div class="adc-home-path-copy">

                            <small>
                                <?= $e($path['number']) ?>
                            </small>


                            <h3>
                                <?= $e($path['title']) ?>
                            </h3>


                            <p>
                                <?= $e($path['text']) ?>
                            </p>

                        </div>


                        <span
                            class="adc-home-path-arrow"
                            aria-hidden="true"
                        >
                            <i class="fas fa-arrow-right"></i>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>


        </div>

    </section>



    <!-- ======================================================
         PROJETOS
    ======================================================= -->

    <section
        class="
            adc-home-section
            adc-home-work
        "
    >

        <div class="adc-home-container">


            <span class="adc-home-kicker">
                <?= $e(t('home.projects.kicker')) ?>
            </span>


            <h2 class="adc-home-heading">

                <?= $e(t('home.projects.title')) ?>

            </h2>


            <p class="adc-home-intro">

                <?= $e(t('home.projects.description')) ?>

            </p>


            <div class="adc-home-work-rail">

                <?php foreach ($featuredProjects as $project): ?>

                    <a
                        href="<?= $e($project['url']) ?>"
                        class="adc-home-work-row"

                        <?php if (!empty($project['external'])): ?>

                            target="_blank"
                            rel="noopener noreferrer"

                        <?php endif; ?>

                        data-aos="fade-up"
                    >

                        <span class="adc-home-work-index">

                            <?= $e($project['number']) ?>

                        </span>


                        <div class="adc-home-work-copy">

                            <span class="adc-home-work-type">
                                <?= $e($project['type']) ?>
                            </span>


                            <h3>
                                <?= $e($project['title']) ?>
                            </h3>


                            <p>
                                <?= $e($project['text']) ?>
                            </p>

                        </div>


                        <span
                            class="adc-home-work-arrow"
                            aria-hidden="true"
                        >
                            <i
                                class="fas fa-arrow-up-right-from-square"
                            ></i>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>


            <div style="margin-top:1.2rem">

                <a
                    href="<?= $e($projectsUrl) ?>"
                    class="adc-home-btn"
                    style="
                        border-color:rgba(255,255,255,.16);
                        background:rgba(255,255,255,.06);
                        color:#fff;
                    "
                >

                    <i
                        class="fas fa-folder-open"
                        aria-hidden="true"
                    ></i>

                    <?= $e(t('home.projects.all_cta')) ?>

                </a>

            </div>


        </div>

    </section>



    <!-- ======================================================
         EXPLORAR
    ======================================================= -->

    <section class="adc-home-section">

        <div class="adc-home-container">


            <span class="adc-home-kicker">
                <?= $e(t('home.explore.kicker')) ?>
            </span>


            <h2 class="adc-home-heading">

                <?= $e(t('home.explore.title')) ?>

            </h2>


            <div class="adc-home-explore">

                <?php foreach ($exploreItems as $item): ?>

                    <a
                        href="<?= $e($item['url']) ?>"
                        class="adc-home-explore-item<?= !empty($item['primary']) ? ' is-primary' : '' ?>"

                        <?php if (!empty($item['external'])): ?>

                            target="_blank"
                            rel="noopener noreferrer"

                        <?php endif; ?>

                        data-aos="zoom-in"
                    >

                        <span
                            class="adc-home-explore-icon"
                            aria-hidden="true"
                        >
                            <i
                                class="fas <?= $e($item['icon']) ?>"
                            ></i>
                        </span>


                        <div class="adc-home-explore-copy">

                            <h3>
                                <?= $e($item['title']) ?>
                            </h3>


                            <p>
                                <?= $e($item['text']) ?>
                            </p>

                        </div>


                        <span
                            class="adc-home-explore-arrow"
                            aria-hidden="true"
                        >
                            <i class="fas fa-arrow-right"></i>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>


        </div>

    </section>



    <!-- ======================================================
         QUEM DESENVOLVE
    ======================================================= -->

    <section class="adc-home-founder">

        <div class="adc-home-container">


            <div
                class="adc-home-founder-line"
                data-aos="fade-up"
            >


                <div class="adc-home-founder-visual">

                    <img
                        src="assets/img/alexxx.jpg"
                        alt="Alex Oliveira"
                    >

                </div>


                <div class="adc-home-founder-copy">

                    <span class="adc-home-kicker">
                        <?= $e(t('home.founder.kicker')) ?>
                    </span>


                    <h2>
                        <?= $e(t('home.founder.title')) ?>
                    </h2>


                    <p>

                        <?= $e(t('home.founder.text')) ?>

                    </p>


                    <div class="adc-home-founder-actions">

                        <a
                            href="<?= $e($aboutUrl) ?>"
                            class="
                                adc-home-btn
                                adc-home-btn-ghost
                            "
                        >

                            <i
                                class="fas fa-user"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('home.founder.about_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($contactUrl) ?>"
                            class="
                                adc-home-btn
                                adc-home-btn-primary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('home.founder.contact_cta')) ?>

                        </a>

                    </div>

                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         CTA FINAL
    ======================================================= -->

    <section class="adc-home-cta">

        <div class="adc-home-container">


            <div
                class="adc-home-cta-line"
                data-aos="fade-up"
            >

                <div class="adc-home-cta-copy">


                    <span class="adc-home-kicker">
                        <?= $e(t('home.final.kicker')) ?>
                    </span>


                    <h2>

                        <?= $e(t('home.final.title')) ?>

                    </h2>


                    <p>

                        <?= $e(t('home.final.text')) ?>

                    </p>


                    <div class="adc-home-cta-actions">

                        <a
                            href="<?= $e($contactUrl) ?>"
                            class="
                                adc-home-btn
                                adc-home-btn-primary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('home.final.primary_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($servicesUrl) ?>"
                            class="
                                adc-home-btn
                                adc-home-btn-ghost
                            "
                        >

                            <i
                                class="fas fa-code"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('home.final.secondary_cta')) ?>

                        </a>

                    </div>


                </div>

            </div>


        </div>

    </section>


</main>


<script
    src="https://unpkg.com/aos@2.3.1/dist/aos.js"
></script>


<script>

(function () {

    'use strict';


    /* ======================================================
       AOS
    ======================================================= */

    if (window.AOS) {

        AOS.init({

            duration:
                760,

            once:
                true,

            offset:
                65,

            easing:
                'ease-out-cubic'

        });

    }



    /* ======================================================
       MOVIMENTO DO HERO
    ======================================================= */

    const hero =
        document.querySelector(
            '.adc-home-hero'
        );


    const brand =
        document.getElementById(
            'adcHomeBrand'
        );


    if (
        hero
        && brand
        && window.matchMedia(
            '(pointer: fine)'
        ).matches
        && !window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches
    ) {

        hero.addEventListener(
            'mousemove',
            function (event) {

                const rect =
                    hero.getBoundingClientRect();


                const x =
                    (
                        event.clientX
                        - rect.left
                        - rect.width / 2
                    )
                    / 55;


                const y =
                    (
                        event.clientY
                        - rect.top
                        - rect.height / 2
                    )
                    / 55;


                brand.style.transform =
                    `translate(${x}px, ${y}px)`;

            }
        );


        hero.addEventListener(
            'mouseleave',
            function () {

                brand.style.transform =
                    'translate(0, 0)';

            }
        );

    }

})();

</script>


<?php

try {

    require_once __DIR__ . '/includes/footer.php';

} catch (Throwable $e) {

    error_log(
        'Failed to load footer.php: '
        . $e->getMessage()
    );

}

?>