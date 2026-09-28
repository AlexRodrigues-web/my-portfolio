<?php

/* ==========================================================
   ALEXDEVCODE — PROJETOS

   Página editorial de projetos / case studies.
   Sem grid duplicado de cards e sem repetir a Home/Serviços.

   PT / EN / ES centralizados via includes/i18n.php.
========================================================== */

try {

    require_once __DIR__ . '/includes/header.php';

} catch (Throwable $e) {

    error_log(
        'Failed to load header.php: '
        . $e->getMessage()
    );

}


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
   URLS
========================================================== */

$contactUrl =
    adc_url('contato.php');

$servicesUrl =
    adc_url('solucoes.php');

$demoFirstUrl =
    function_exists('adc_demofirst_url')
        ? adc_demofirst_url()
        : 'https://demofirst.alexdevcode.com/pt/demofirst';


/* ==========================================================
   PROJETOS
========================================================== */

$projects = [

    /* ======================================================
       HOUSEFLOW
    ======================================================= */

    [
        'id' =>
            'houseflow',

        'number' =>
            '01',

        'title' =>
            'HouseFlow',

        'type' =>
            t('projects.houseflow.type'),

        'status' =>
            t('projects.houseflow.status'),

        'image' =>
            'assets/img/projetos/houseflow-cover.webp',

        'alt' =>
            'HouseFlow',

        'url' =>
            'https://houseflow.alexdevcode.com',

        'url_label' =>
            t('projects.houseflow.url_label'),

        'lead' =>
            t('projects.houseflow.lead'),

        'text' =>
            t('projects.houseflow.text'),

        'problem' =>
            t('projects.houseflow.problem'),

        'built' =>
            t('projects.houseflow.built'),

        'result' =>
            t('projects.houseflow.result'),

        'highlights' => [
            t('projects.houseflow.highlight1'),
            t('projects.houseflow.highlight2'),
            t('projects.houseflow.highlight3'),
        ],

        'stack' => [
            'PHP',
            'MySQL',
            'JavaScript',
            'Responsive UI',
        ],
    ],


    /* ======================================================
       TIMECLOCK
    ======================================================= */

    [
        'id' =>
            'timeclock',

        'number' =>
            '02',

        'title' =>
            'TimeClock',

        'type' =>
            t('projects.timeclock.type'),

        'status' =>
            t('projects.timeclock.status'),

        'image' =>
            'assets/img/projetos/timeclock-cover.webp',

        'alt' =>
            'TimeClock',

        'url' =>
            'https://timeclock.alexdevcode.com',

        'url_label' =>
            t('projects.timeclock.url_label'),

        'lead' =>
            t('projects.timeclock.lead'),

        'text' =>
            t('projects.timeclock.text'),

        'problem' =>
            t('projects.timeclock.problem'),

        'built' =>
            t('projects.timeclock.built'),

        'result' =>
            t('projects.timeclock.result'),

        'highlights' => [
            t('projects.timeclock.highlight1'),
            t('projects.timeclock.highlight2'),
            t('projects.timeclock.highlight3'),
        ],

        'stack' => [
            'PHP',
            'MySQL',
            'JavaScript',
            'PWA / Responsive',
        ],
    ],


    /* ======================================================
       DEMOFIRST
    ======================================================= */

    [
        'id' =>
            'demofirst',

        'number' =>
            '03',

        'title' =>
            'DemoFirst',

        'type' =>
            t('projects.demofirst.type'),

        'status' =>
            t('projects.demofirst.status'),

        'image' =>
            'assets/img/projetos/demofirst-cover.webp',

        'alt' =>
            'DemoFirst',

        'url' =>
            $demoFirstUrl,

        'url_label' =>
            t('projects.demofirst.url_label'),

        'lead' =>
            t('projects.demofirst.lead'),

        'text' =>
            t('projects.demofirst.text'),

        'problem' =>
            t('projects.demofirst.problem'),

        'built' =>
            t('projects.demofirst.built'),

        'result' =>
            t('projects.demofirst.result'),

        'highlights' => [
            t('projects.demofirst.highlight1'),
            t('projects.demofirst.highlight2'),
            t('projects.demofirst.highlight3'),
        ],

        'stack' => [
            'Next.js',
            'React',
            'TypeScript',
            'Web Platform',
        ],
    ],


    /* ======================================================
       DENTALCARE
    ======================================================= */

    [
        'id' =>
            'dentalcare',

        'number' =>
            '04',

        'title' =>
            'DentalCare Clinic',

        'type' =>
            t('projects.dentalcare.type'),

        'status' =>
            t('projects.dentalcare.status'),

        'image' =>
            'assets/img/projetos/dentalcare-cover.webp',

        'alt' =>
            'DentalCare Clinic',

        'url' =>
            'https://dentalcare.alexdevcode.com',

        'url_label' =>
            t('projects.dentalcare.url_label'),

        'lead' =>
            t('projects.dentalcare.lead'),

        'text' =>
            t('projects.dentalcare.text'),

        'problem' =>
            t('projects.dentalcare.problem'),

        'built' =>
            t('projects.dentalcare.built'),

        'result' =>
            t('projects.dentalcare.result'),

        'highlights' => [
            t('projects.dentalcare.highlight1'),
            t('projects.dentalcare.highlight2'),
            t('projects.dentalcare.highlight3'),
        ],

        'stack' => [
            'Ionic',
            'Angular',
            'TypeScript',
            'SCSS',
        ],
    ],


    /* ======================================================
       CLIQUEJÁ
    ======================================================= */

    [
        'id' =>
            'cliqueja',

        'number' =>
            '05',

        'title' =>
            'CliqueJá Biz Lister',

        'type' =>
            t('projects.cliqueja.type'),

        'status' =>
            t('projects.cliqueja.status'),

        'image' =>
            'assets/img/projetos/cliqueja-cover.webp',

        'alt' =>
            'CliqueJá Biz Lister',

        'url' =>
            'https://cliqueja.org/biz/public/',

        'url_label' =>
            t('projects.cliqueja.url_label'),

        'lead' =>
            t('projects.cliqueja.lead'),

        'text' =>
            t('projects.cliqueja.text'),

        'problem' =>
            t('projects.cliqueja.problem'),

        'built' =>
            t('projects.cliqueja.built'),

        'result' =>
            t('projects.cliqueja.result'),

        'highlights' => [
            t('projects.cliqueja.highlight1'),
            t('projects.cliqueja.highlight2'),
            t('projects.cliqueja.highlight3'),
        ],

        'stack' => [
            'PHP',
            'MySQL',
            'MVC',
            'JavaScript',
        ],
    ],

];

?>


<!-- ==========================================================
     FONTES / ÍCONES / AOS
========================================================== -->

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
   PROJECTS — TOKENS
========================================================== */

.adc-projects {

    --p-dark:
        #141414;

    --p-accent:
        #8b735d;

    --p-accent-dk:
        #715d4b;

    --p-accent-lt:
        #c6b8a9;

    --p-bg:
        #d7d9dd;

    --p-card:
        #ffffff;

    --p-soft:
        #f7f4f0;

    --p-text:
        #302f2e;

    --p-muted:
        #5f5b57;

    --p-border:
        rgba(20, 20, 20, .11);

    --p-shadow:
        0 10px 30px
        rgba(20, 20, 20, .10);

    --p-shadow-strong:
        0 22px 60px
        rgba(20, 20, 20, .18);


    color:
        var(--p-text);


    background:

        radial-gradient(
            circle at 3% 0%,
            rgba(139, 115, 93, .15),
            transparent 27rem
        ),

        radial-gradient(
            circle at 98% 52%,
            rgba(20, 20, 20, .07),
            transparent 31rem
        ),

        var(--p-bg);


    overflow:
        hidden;

}


body[data-tema="escuro"]
.adc-projects {

    --p-bg:
        #171717;

    --p-card:
        #202020;

    --p-soft:
        #262322;

    --p-text:
        #ebe6e0;

    --p-muted:
        #b3aca6;

    --p-border:
        rgba(255, 255, 255, .10);

    --p-shadow:
        0 10px 30px
        rgba(0, 0, 0, .26);

    --p-shadow-strong:
        0 22px 60px
        rgba(0, 0, 0, .36);

}


.adc-projects *,
.adc-projects *::before,
.adc-projects *::after {

    box-sizing:
        border-box;

}


.adc-projects-container {

    width:
        min(
            calc(100% - 2rem),
            1180px
        );


    margin:
        0 auto;

}


.adc-projects a:focus-visible,
.adc-projects summary:focus-visible {

    outline:
        2px solid
        var(--p-accent);


    outline-offset:
        4px;

}



/* ==========================================================
   PROGRESS
========================================================== */

.adc-projects-progress {

    position:
        fixed;


    left:
        0;


    top:
        0;


    width:
        0;


    height:
        3px;


    z-index:
        9999;


    background:
        var(--p-accent);


    box-shadow:
        0 0 12px
        rgba(139, 115, 93, .65);


    pointer-events:
        none;

}



/* ==========================================================
   HERO — EDITORIAL
========================================================== */

.adc-projects-hero {

    position:
        relative;


    padding:
        4rem 0
        3.2rem;


    border-bottom:
        1px solid
        var(--p-border);


    overflow:
        hidden;

}


.adc-projects-hero::before {

    content:
        "WORK";


    position:
        absolute;


    right:
        -1.2rem;


    top:
        -3.6rem;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            8rem,
            25vw,
            19rem
        );


    font-weight:
        700;


    line-height:
        1;


    color:
        rgba(139, 115, 93, .055);


    pointer-events:
        none;

}


.adc-projects-hero-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    gap:
        2.4rem;


    align-items:
        end;

}



/* ==========================================================
   KICKER
========================================================== */

.adc-projects-kicker {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .5rem;


    color:
        var(--p-accent-dk);


    font-size:
        .69rem;


    font-weight:
        800;


    letter-spacing:
        .11em;


    text-transform:
        uppercase;

}


body[data-tema="escuro"]
.adc-projects-kicker {

    color:
        var(--p-accent-lt);

}


.adc-projects-kicker::before {

    content:
        "";


    width:
        22px;


    height:
        2px;


    border-radius:
        999px;


    background:
        var(--p-accent);

}



/* ==========================================================
   HERO COPY
========================================================== */

.adc-projects-hero h1 {

    max-width:
        800px;


    margin:
        .7rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            3rem,
            10vw,
            6rem
        );


    line-height:
        .9;


    letter-spacing:
        -.05em;


    color:
        var(--p-dark);

}


body[data-tema="escuro"]
.adc-projects-hero h1 {

    color:
        #fff;

}


.adc-projects-hero h1 span {

    display:
        block;


    color:
        var(--p-accent);

}


.adc-projects-hero-copy > p {

    max-width:
        650px;


    margin:
        1rem 0 0;


    color:
        var(--p-muted);


    font-size:
        .86rem;


    line-height:
        1.7;

}


.adc-projects-hero-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        1.15rem;

}



/* ==========================================================
   BOTÕES
========================================================== */

.adc-projects-btn {

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
        color .22s ease,
        border-color .22s ease;

}


.adc-projects-btn:hover {

    transform:
        translateY(-3px);

}


.adc-projects-btn-primary {

    background:
        var(--p-dark);


    color:
        #fff;

}


.adc-projects-btn-primary:hover {

    background:
        var(--p-accent);

}


.adc-projects-btn-secondary {

    border-color:
        rgba(139, 115, 93, .24);


    background:
        rgba(139, 115, 93, .08);


    color:
        var(--p-dark);

}


body[data-tema="escuro"]
.adc-projects-btn-secondary {

    color:
        #fff;

}


.adc-projects-btn-secondary:hover {

    background:
        rgba(139, 115, 93, .18);

}



/* ==========================================================
   HERO PROJECT REEL
========================================================== */

.adc-projects-reel {

    position:
        relative;


    transition:
        transform .18s ease-out;

}


.adc-projects-reel::before {

    content:
        "";


    position:
        absolute;


    left:
        28px;


    top:
        0;


    bottom:
        0;


    width:
        1px;


    background:
        var(--p-border);

}


.adc-projects-reel-row {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        58px
        minmax(0, 1fr);


    gap:
        .7rem;


    align-items:
        center;


    min-height:
        52px;


    border-bottom:
        1px solid
        var(--p-border);


    animation:
        adcProjectsReelFloat
        5.2s
        ease-in-out
        infinite;

}


.adc-projects-reel-row:nth-child(2) {

    animation-delay:
        .45s;

}


.adc-projects-reel-row:nth-child(3) {

    animation-delay:
        .9s;

}


.adc-projects-reel-row:nth-child(4) {

    animation-delay:
        1.35s;

}


.adc-projects-reel-row:nth-child(5) {

    animation-delay:
        1.8s;

}


.adc-projects-reel-number {

    position:
        relative;


    z-index:
        2;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    width:
        32px;


    height:
        32px;


    margin-left:
        12px;


    border-radius:
        50%;


    background:
        var(--p-dark);


    color:
        #fff;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .65rem;


    box-shadow:
        0 0 0 6px
        var(--p-bg);

}


.adc-projects-reel-title {

    min-width:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.2rem,
            4vw,
            1.65rem
        );


    color:
        var(--p-dark);


    white-space:
        nowrap;


    overflow:
        hidden;


    text-overflow:
        ellipsis;

}


body[data-tema="escuro"]
.adc-projects-reel-title {

    color:
        #fff;

}



/* ==========================================================
   PORTFOLIO
========================================================== */

.adc-projects-portfolio {

    padding:
        4.8rem 0;

}


.adc-projects-portfolio-grid {

    display:
        grid;


    gap:
        2rem;

}



/* ==========================================================
   INDEX
========================================================== */

.adc-projects-index {

    display:
        flex;


    gap:
        .35rem;


    overflow-x:
        auto;


    padding:
        0 0 .65rem;


    scrollbar-width:
        thin;

}


.adc-projects-index a {

    flex:
        0 0 auto;


    display:
        inline-flex;


    align-items:
        center;


    gap:
        .45rem;


    padding:
        .48rem .2rem;


    border-bottom:
        2px solid transparent;


    color:
        var(--p-muted);


    text-decoration:
        none;


    font-size:
        .67rem;


    font-weight:
        700;


    transition:
        color .22s ease,
        border-color .22s ease;

}


.adc-projects-index a span {

    color:
        var(--p-accent);


    font-family:
        'Oswald',
        sans-serif;

}


.adc-projects-index a:hover,
.adc-projects-index a.is-active {

    color:
        var(--p-dark);


    border-color:
        var(--p-accent);

}


body[data-tema="escuro"]
.adc-projects-index a:hover,

body[data-tema="escuro"]
.adc-projects-index a.is-active {

    color:
        #fff;

}


.adc-projects-stories {

    min-width:
        0;

}



/* ==========================================================
   PROJECT STORY
========================================================== */

.adc-project-story {

    position:
        relative;


    padding:
        0 0
        4.6rem;


    margin:
        0 0
        4.6rem;


    border-bottom:
        1px solid
        var(--p-border);

}


.adc-project-story:last-child {

    margin-bottom:
        0;

}


.adc-project-story-grid {

    display:
        grid;


    gap:
        1.7rem;


    align-items:
        center;

}



/* ==========================================================
   PROJECT MEDIA
========================================================== */

.adc-project-story-media {

    position:
        relative;


    min-width:
        0;

}


.adc-project-story-media::before {

    content:
        attr(data-number);


    position:
        absolute;


    right:
        -.1rem;


    top:
        -2.1rem;


    z-index:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            5rem,
            18vw,
            9rem
        );


    line-height:
        1;


    font-weight:
        700;


    color:
        rgba(139, 115, 93, .08);


    pointer-events:
        none;

}


.adc-project-image-frame {

    position:
        relative;


    z-index:
        1;


    overflow:
        hidden;


    border:
        1px solid
        var(--p-border);


    border-radius:
        20px;


    background:
        var(--p-soft);


    box-shadow:
        var(--p-shadow);


    transform:
        translateZ(0);

}


.adc-project-image-frame::after {

    content:
        "";


    position:
        absolute;


    inset:
        0;


    background:
        linear-gradient(
            to top,
            rgba(20, 20, 20, .24),
            transparent 44%
        );


    pointer-events:
        none;

}


.adc-project-image-frame img {

    display:
        block;


    width:
        100%;


    aspect-ratio:
        16 / 10;


    object-fit:
        cover;


    transition:
        transform .65s
        cubic-bezier(.2, .7, .2, 1),
        filter .65s ease;

}


.adc-project-story:hover
.adc-project-image-frame img {

    transform:
        scale(1.035);


    filter:
        saturate(1.04)
        contrast(1.02);

}


.adc-project-image-status {

    position:
        absolute;


    left:
        .8rem;


    bottom:
        .75rem;


    z-index:
        2;


    display:
        inline-flex;


    align-items:
        center;


    gap:
        .4rem;


    color:
        #fff;


    font-size:
        .62rem;


    font-weight:
        700;

}


.adc-project-image-status::before {

    content:
        "";


    width:
        7px;


    height:
        7px;


    border-radius:
        50%;


    background:
        #66c982;


    box-shadow:
        0 0 0 4px
        rgba(102, 201, 130, .16);

}



/* ==========================================================
   PROJECT COPY
========================================================== */

.adc-project-story-copy {

    position:
        relative;


    min-width:
        0;

}


.adc-project-story-topline {

    display:
        flex;


    flex-wrap:
        wrap;


    align-items:
        center;


    gap:
        .45rem .75rem;


    margin-bottom:
        .5rem;


    color:
        var(--p-muted);


    font-size:
        .62rem;


    font-weight:
        700;


    letter-spacing:
        .06em;


    text-transform:
        uppercase;

}


.adc-project-story-topline strong {

    color:
        var(--p-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .72rem;

}


.adc-project-story h2 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.4rem,
            8vw,
            4.6rem
        );


    line-height:
        .92;


    letter-spacing:
        -.045em;


    color:
        var(--p-dark);

}


body[data-tema="escuro"]
.adc-project-story h2 {

    color:
        #fff;

}


.adc-project-story-lead {

    max-width:
        720px;


    margin:
        .8rem 0 0;


    color:
        var(--p-dark);


    font-size:
        .91rem;


    font-weight:
        600;


    line-height:
        1.55;

}


body[data-tema="escuro"]
.adc-project-story-lead {

    color:
        #ddd6cf;

}


.adc-project-story-text {

    max-width:
        720px;


    margin:
        .65rem 0 0;


    color:
        var(--p-muted);


    font-size:
        .75rem;


    line-height:
        1.65;

}



/* ==========================================================
   CASE STUDY — PROBLEMA / SOLUÇÃO / RESULTADO
========================================================== */

.adc-project-case {

    display:
        grid;

    gap:
        .55rem;

    margin-top:
        1.05rem;

}


.adc-project-case-block {

    position:
        relative;

    padding:
        .82rem .9rem;

    border:
        1px solid
        var(--p-border);

    border-radius:
        14px;

    background:
        rgba(255, 255, 255, .42);

}


body[data-tema="escuro"]
.adc-project-case-block {

    background:
        rgba(255, 255, 255, .035);

}


.adc-project-case-block small {

    display:
        flex;

    align-items:
        center;

    gap:
        .42rem;

    color:
        var(--p-accent-dk);

    font-size:
        .58rem;

    font-weight:
        800;

    letter-spacing:
        .09em;

    text-transform:
        uppercase;

}


body[data-tema="escuro"]
.adc-project-case-block small {

    color:
        var(--p-accent-lt);

}


.adc-project-case-block small i {

    width:
        18px;

    color:
        var(--p-accent);

    text-align:
        center;

}


.adc-project-case-block p {

    margin:
        .32rem 0 0;

    color:
        var(--p-muted);

    font-size:
        .69rem;

    line-height:
        1.55;

}


.adc-project-case-block.is-result {

    border-color:
        rgba(139, 115, 93, .28);

    background:
        rgba(139, 115, 93, .08);

}


body[data-tema="escuro"]
.adc-project-case-block.is-result {

    background:
        rgba(139, 115, 93, .10);

}


/* ==========================================================
   HIGHLIGHTS
========================================================== */

.adc-project-highlights {

    display:
        grid;


    gap:
        .42rem;


    margin:
        .9rem 0 0;

}


.adc-project-highlight {

    display:
        flex;


    align-items:
        flex-start;


    gap:
        .5rem;


    color:
        var(--p-muted);


    font-size:
        .69rem;


    line-height:
        1.5;

}


.adc-project-highlight i {

    margin-top:
        .18rem;


    color:
        var(--p-accent);

}



/* ==========================================================
   STACK
========================================================== */

.adc-project-stack {

    display:
        flex;


    flex-wrap:
        wrap;


    gap:
        .25rem .65rem;


    margin-top:
        .9rem;


    color:
        var(--p-muted);


    font-size:
        .62rem;


    font-weight:
        700;

}


.adc-project-stack span {

    position:
        relative;

}


.adc-project-stack span + span::before {

    content:
        "·";


    margin-right:
        .65rem;


    color:
        var(--p-accent);

}



/* ==========================================================
   PROJECT ACTIONS
========================================================== */

.adc-project-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        1rem;

}


.adc-project-link {

    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    gap:
        .5rem;


    min-height:
        42px;


    padding:
        .66rem .95rem;


    border-radius:
        999px;


    background:
        var(--p-dark);


    color:
        #fff;


    text-decoration:
        none;


    font-size:
        .72rem;


    font-weight:
        700;


    transition:
        transform .22s ease,
        background .22s ease;

}


.adc-project-link:hover {

    transform:
        translateY(-3px);


    background:
        var(--p-accent);

}



/* ==========================================================
   CTA FINAL
========================================================== */

.adc-projects-cta {

    padding:
        1rem 0
        5rem;

}


.adc-projects-cta-line {

    position:
        relative;


    padding:
        2.7rem 0;


    border-top:
        2px solid
        var(--p-dark);


    border-bottom:
        2px solid
        var(--p-dark);

}


body[data-tema="escuro"]
.adc-projects-cta-line {

    border-color:
        rgba(255, 255, 255, .85);

}


.adc-projects-cta-line::after {

    content:
        "↗";


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
        8rem;


    line-height:
        1;


    pointer-events:
        none;


    animation:
        adcProjectsArrow
        3s
        ease-in-out
        infinite;

}


.adc-projects-cta-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-projects-cta-copy h2 {

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
            4.4rem
        );


    line-height:
        .96;


    letter-spacing:
        -.04em;


    color:
        var(--p-dark);

}


body[data-tema="escuro"]
.adc-projects-cta-copy h2 {

    color:
        #fff;

}


.adc-projects-cta-copy p {

    max-width:
        620px;


    margin:
        .65rem 0 0;


    color:
        var(--p-muted);


    font-size:
        .74rem;


    line-height:
        1.6;

}


.adc-projects-cta-actions {

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

@keyframes adcProjectsReelFloat {

    0%,
    100% {

        transform:
            translateX(0);

    }


    50% {

        transform:
            translateX(7px);

    }

}


@keyframes adcProjectsArrow {

    0%,
    100% {

        transform:
            translateY(-50%)
            translate(0, 0);

    }


    50% {

        transform:
            translateY(-50%)
            translate(8px, -8px);

    }

}



/* ==========================================================
   TABLET
========================================================== */

@media (min-width: 640px) {

    .adc-projects-hero-actions,
    .adc-project-actions,
    .adc-projects-cta-actions {

        flex-direction:
            row;


        flex-wrap:
            wrap;

    }


    .adc-project-case-block {

        display:
            grid;

        grid-template-columns:
            92px
            minmax(0, 1fr);

        gap:
            .8rem;

        align-items:
            start;

    }


    .adc-project-case-block p {

        margin-top:
            0;

    }

}



/* ==========================================================
   DESKTOP
========================================================== */

@media (min-width: 920px) {

    .adc-projects-hero {

        padding:
            5rem 0
            4rem;

    }


    .adc-projects-hero-grid {

        grid-template-columns:
            minmax(0, 1.25fr)
            minmax(340px, .75fr);


        gap:
            4rem;

    }


    .adc-projects-portfolio {

        padding:
            5.8rem 0;

    }


    .adc-projects-portfolio-grid {

        grid-template-columns:
            190px
            minmax(0, 1fr);


        gap:
            3.2rem;


        align-items:
            start;

    }


    /* ======================================================
       INDEX LATERAL
    ======================================================= */

    .adc-projects-index {

        position:
            sticky;


        top:
            108px;


        display:
            grid;


        gap:
            0;


        overflow:
            visible;


        padding:
            0;


        border-top:
            1px solid
            var(--p-border);

    }


    .adc-projects-index a {

        width:
            100%;


        padding:
            .7rem 0;


        border-bottom:
            1px solid
            var(--p-border);


        border-left:
            0;

    }


    .adc-projects-index a.is-active {

        padding-left:
            .45rem;


        border-bottom-color:
            var(--p-border);


        box-shadow:
            inset 2px 0 0
            var(--p-accent);

    }



    /* ======================================================
       STORIES
    ======================================================= */

    .adc-project-story {

        padding-bottom:
            5.5rem;


        margin-bottom:
            5.5rem;

    }


    .adc-project-story-grid {

        grid-template-columns:
            minmax(0, 1.05fr)
            minmax(0, .95fr);


        gap:
            3.6rem;

    }


    /* alternância real */

    .adc-project-story:nth-child(even)
    .adc-project-story-media {

        order:
            2;

    }


    .adc-project-story:nth-child(even)
    .adc-project-story-copy {

        order:
            1;

    }

}



/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 639px) {

    .adc-projects-hero {

        padding-top:
            2.5rem;

    }


    .adc-projects-hero h1 {

        font-size:
            2.85rem;

        line-height:
            .94;

    }


    .adc-project-story h2 {

        font-size:
            2.2rem;

    }


    .adc-project-story {

        padding-bottom:
            3.8rem;


        margin-bottom:
            3.8rem;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-projects *,
    .adc-projects *::before,
    .adc-projects *::after {

        animation:
            none !important;


        transition:
            none !important;


        scroll-behavior:
            auto !important;

    }

}

</style>


<!-- ==========================================================
     PROGRESS BAR
========================================================== -->

<div
    class="adc-projects-progress"
    id="adcProjectsProgress"
    aria-hidden="true"
></div>


<main class="adc-projects">


    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="adc-projects-hero">

        <div class="adc-projects-container">

            <div class="adc-projects-hero-grid">


                <!-- =========================================
                     TEXTO
                ========================================== -->

                <div
                    class="adc-projects-hero-copy"
                    data-aos="fade-right"
                >

                    <span class="adc-projects-kicker">
                        <?= $e(t('projects.hero.kicker')) ?>
                    </span>


                    <h1>

                        <?= $e(t('projects.hero.title_before')) ?>

                        <span>
                            <?= $e(t('projects.hero.title_highlight')) ?>
                        </span>

                    </h1>


                    <p>

                        <?= $e(t('projects.hero.text')) ?>

                    </p>


                    <div class="adc-projects-hero-actions">


                        <a
                            href="#portfolio"
                            class="
                                adc-projects-btn
                                adc-projects-btn-primary
                            "
                        >

                            <i
                                class="fas fa-arrow-down"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('projects.hero.primary_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($contactUrl) ?>"
                            class="
                                adc-projects-btn
                                adc-projects-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('projects.hero.secondary_cta')) ?>

                        </a>


                    </div>


                </div>



                <!-- =========================================
                     REEL DE PROJETOS
                ========================================== -->

                <div
                    class="adc-projects-reel"
                    id="adcProjectsReel"
                    data-aos="fade-left"
                    aria-label="<?= $e(t('projects.aria.reel')) ?>"
                >


                    <?php foreach ($projects as $project): ?>


                        <div class="adc-projects-reel-row">


                            <span class="adc-projects-reel-number">

                                <?= $e($project['number']) ?>

                            </span>


                            <span class="adc-projects-reel-title">

                                <?= $e($project['title']) ?>

                            </span>


                        </div>


                    <?php endforeach; ?>


                </div>


            </div>

        </div>

    </section>



    <!-- ======================================================
         PORTFOLIO
    ======================================================= -->

    <section
        class="adc-projects-portfolio"
        id="portfolio"
    >

        <div class="adc-projects-container">


            <div class="adc-projects-portfolio-grid">


                <!-- =========================================
                     ÍNDICE
                ========================================== -->

                <nav
                    class="adc-projects-index"
                    aria-label="<?= $e(t('projects.aria.index')) ?>"
                >


                    <?php foreach ($projects as $index => $project): ?>


                        <a
                            href="#<?= $e($project['id']) ?>"

                            class="
                                <?= $index === 0
                                    ? 'is-active'
                                    : '' ?>
                            "

                            data-project-link="<?= $e($project['id']) ?>"
                        >

                            <span>
                                <?= $e($project['number']) ?>
                            </span>

                            <?= $e($project['title']) ?>

                        </a>


                    <?php endforeach; ?>


                </nav>



                <!-- =========================================
                     CASE STORIES
                ========================================== -->

                <div class="adc-projects-stories">


                    <?php foreach ($projects as $project): ?>


                        <article
                            class="adc-project-story"

                            id="<?= $e($project['id']) ?>"

                            data-project-section="<?= $e($project['id']) ?>"
                        >


                            <div class="adc-project-story-grid">


                                <!-- =========================
                                     IMAGEM
                                ========================== -->

                                <div
                                    class="adc-project-story-media"

                                    data-number="<?= $e($project['number']) ?>"

                                    data-aos="fade-up"
                                >


                                    <div class="adc-project-image-frame">


                                        <img
                                            loading="lazy"
                                            decoding="async"

                                            src="<?= $e($project['image']) ?>"

                                            alt="<?= $e($project['alt']) ?>"

                                            onerror="
                                                adcProjectImageFallback(
                                                    this,
                                                    '<?= $e($project['title']) ?>'
                                                )
                                            "
                                        >


                                        <span class="adc-project-image-status">

                                            <?= $e($project['status']) ?>

                                        </span>


                                    </div>


                                </div>



                                <!-- =========================
                                     CONTEÚDO
                                ========================== -->

                                <div
                                    class="adc-project-story-copy"
                                    data-aos="fade-up"
                                >


                                    <div class="adc-project-story-topline">


                                        <strong>
                                            <?= $e($project['number']) ?>
                                        </strong>


                                        <span>
                                            <?= $e($project['type']) ?>
                                        </span>


                                    </div>


                                    <h2>
                                        <?= $e($project['title']) ?>
                                    </h2>


                                    <p class="adc-project-story-lead">

                                        <?= $e($project['lead']) ?>

                                    </p>


                                    <p class="adc-project-story-text">

                                        <?= $e($project['text']) ?>

                                    </p>



                                    <!-- =====================
                                         CASE STUDY
                                    ====================== -->

                                    <div class="adc-project-case">


                                        <div class="adc-project-case-block">

                                            <small>
                                                <i
                                                    class="fas fa-circle-question"
                                                    aria-hidden="true"
                                                ></i>
                                                <?= $e(t('projects.labels.problem')) ?>
                                            </small>

                                            <p>
                                                <?= $e($project['problem']) ?>
                                            </p>

                                        </div>


                                        <div class="adc-project-case-block">

                                            <small>
                                                <i
                                                    class="fas fa-screwdriver-wrench"
                                                    aria-hidden="true"
                                                ></i>
                                                <?= $e(t('projects.labels.solution')) ?>
                                            </small>

                                            <p>
                                                <?= $e($project['built']) ?>
                                            </p>

                                        </div>


                                        <div class="adc-project-case-block is-result">

                                            <small>
                                                <i
                                                    class="fas fa-circle-check"
                                                    aria-hidden="true"
                                                ></i>
                                                <?= $e(t('projects.labels.result')) ?>
                                            </small>

                                            <p>
                                                <?= $e($project['result']) ?>
                                            </p>

                                        </div>


                                    </div>



                                    <!-- =====================
                                         DESTAQUES
                                    ====================== -->

                                    <div class="adc-project-highlights">


                                        <?php foreach ($project['highlights'] as $highlight): ?>


                                            <div class="adc-project-highlight">


                                                <i
                                                    class="fas fa-arrow-right"
                                                    aria-hidden="true"
                                                ></i>


                                                <span>

                                                    <?= $e($highlight) ?>

                                                </span>


                                            </div>


                                        <?php endforeach; ?>


                                    </div>



                                    <!-- =====================
                                         STACK
                                    ====================== -->

                                    <div
                                        class="adc-project-stack"
                                        aria-label="<?= $e(t('projects.aria.technologies')) ?>"
                                    >


                                        <?php foreach ($project['stack'] as $technology): ?>


                                            <span>

                                                <?= $e($technology) ?>

                                            </span>


                                        <?php endforeach; ?>


                                    </div>



                                    <!-- =====================
                                         LINK
                                    ====================== -->

                                    <div class="adc-project-actions">


                                        <a
                                            href="<?= $e($project['url']) ?>"

                                            target="_blank"

                                            rel="noopener noreferrer"

                                            class="adc-project-link"
                                        >

                                            <?= $e($project['url_label']) ?>


                                            <i
                                                class="fas fa-arrow-up-right-from-square"
                                                aria-hidden="true"
                                            ></i>

                                        </a>


                                    </div>


                                </div>


                            </div>


                        </article>


                    <?php endforeach; ?>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         CTA FINAL
    ======================================================= -->

    <section class="adc-projects-cta">


        <div class="adc-projects-container">


            <div
                class="adc-projects-cta-line"
                data-aos="fade-up"
            >


                <div class="adc-projects-cta-copy">


                    <span class="adc-projects-kicker">

                        <?= $e(t('projects.final.kicker')) ?>

                    </span>


                    <h2>

                        <?= $e(t('projects.final.title')) ?>

                    </h2>


                    <p>

                        <?= $e(t('projects.final.text')) ?>

                    </p>


                    <div class="adc-projects-cta-actions">


                        <a
                            href="<?= $e($contactUrl) ?>"

                            class="
                                adc-projects-btn
                                adc-projects-btn-primary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('projects.final.primary_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($servicesUrl) ?>"

                            class="
                                adc-projects-btn
                                adc-projects-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-code"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('projects.final.secondary_cta')) ?>

                        </a>


                    </div>


                </div>


            </div>


        </div>


    </section>


</main>



<!-- ==========================================================
     AOS
========================================================== -->

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
       SCROLL PROGRESS
    ======================================================= */

    const progress =
        document.getElementById(
            'adcProjectsProgress'
        );


    function updateProgress() {

        if (!progress) {
            return;
        }


        const height =
            document.documentElement.scrollHeight
            - window.innerHeight;


        const value =
            height > 0

                ? (
                    window.scrollY
                    / height
                ) * 100

                : 0;


        progress.style.width =
            value + '%';

    }


    window.addEventListener(
        'scroll',
        updateProgress,
        {
            passive: true
        }
    );


    updateProgress();



    /* ======================================================
       MOVIMENTO DO REEL NO HERO
    ======================================================= */

    const hero =
        document.querySelector(
            '.adc-projects-hero'
        );


    const reel =
        document.getElementById(
            'adcProjectsReel'
        );


    if (
        hero
        && reel
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
                    / 65;


                const y =
                    (
                        event.clientY
                        - rect.top
                        - rect.height / 2
                    )
                    / 65;


                reel.style.transform =
                    `translate(${x}px, ${y}px)`;

            }
        );


        hero.addEventListener(
            'mouseleave',
            function () {

                reel.style.transform =
                    'translate(0, 0)';

            }
        );

    }



    /* ======================================================
       ÍNDICE ATIVO CONFORME SCROLL
    ======================================================= */

    const sections =
        document.querySelectorAll(
            '[data-project-section]'
        );


    const links =
        document.querySelectorAll(
            '[data-project-link]'
        );


    if (
        'IntersectionObserver' in window
        && sections.length
        && links.length
    ) {

        const observer =
            new IntersectionObserver(

                function (entries) {

                    entries.forEach(
                        function (entry) {

                            if (!entry.isIntersecting) {
                                return;
                            }


                            const id =
                                entry.target.getAttribute(
                                    'data-project-section'
                                );


                            links.forEach(
                                function (link) {

                                    link.classList.toggle(

                                        'is-active',

                                        link.getAttribute(
                                            'data-project-link'
                                        ) === id

                                    );

                                }
                            );

                        }
                    );

                },

                {
                    rootMargin:
                        '-25% 0px -55% 0px',

                    threshold:
                        0
                }

            );


        sections.forEach(
            function (section) {

                observer.observe(
                    section
                );

            }
        );

    }

})();



/* ==========================================================
   IMAGE FALLBACK
========================================================== */

function adcProjectImageFallback(
    img,
    label
) {

    const safeLabel =
        String(
            label || 'Projeto'
        )
        .replace(
            /[<>&"']/g,
            ''
        );


    const svg =
        encodeURIComponent(
            `
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="1200"
                height="750"
            >

                <defs>

                    <linearGradient
                        id="g"
                        x1="0"
                        y1="0"
                        x2="1"
                        y2="1"
                    >

                        <stop
                            stop-color="#ede7df"
                            offset="0"
                        />

                        <stop
                            stop-color="#d7cabb"
                            offset="1"
                        />

                    </linearGradient>

                </defs>


                <rect
                    width="100%"
                    height="100%"
                    fill="url(#g)"
                />


                <circle
                    cx="1040"
                    cy="90"
                    r="170"
                    fill="rgba(139,115,93,.16)"
                />


                <circle
                    cx="130"
                    cy="660"
                    r="210"
                    fill="rgba(255,255,255,.30)"
                />


                <text
                    x="50%"
                    y="48%"
                    dominant-baseline="middle"
                    text-anchor="middle"
                    font-family="Arial"
                    font-size="52"
                    font-weight="700"
                    fill="#6b5a49"
                >
                    ${safeLabel}
                </text>


                <text
                    x="50%"
                    y="57%"
                    dominant-baseline="middle"
                    text-anchor="middle"
                    font-family="Arial"
                    font-size="22"
                    fill="#7b6a58"
                >
                    AlexDevCode
                </text>

            </svg>
            `
        );


    img.src =
        `data:image/svg+xml;charset=utf-8,${svg}`;

}

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