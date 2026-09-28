<?php

/* ==========================================================
   ALEXDEVCODE — SOBRE

   Esta página explica:
   - o que é a AlexDevCode
   - como a identidade foi construída
   - o que orienta a marca
   - como o ecossistema se conecta
   - quem está por trás

   Serviços e processo NÃO são repetidos aqui.

   PT / EN / ES centralizados via includes/i18n.php.
========================================================== */

try {

    require_once __DIR__
        . '/includes/header.php';

} catch (Throwable $e) {

    error_log(
        'Failed to load header.php: '
        . $e->getMessage()
    );

}


/* ==========================================================
   HELPERS
========================================================== */

$e = static function ($value): string {

    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );

};


/* ==========================================================
   URLS
========================================================== */

$servicesUrl =
    function_exists('adc_url')
        ? adc_url('solucoes.php')
        : 'solucoes.php';


$projectsUrl =
    function_exists('adc_url')
        ? adc_url('projetos.php')
        : 'projetos.php';


$contactUrl =
    function_exists('adc_url')
        ? adc_url('contato.php')
        : 'contato.php';


$guideUrl =
    function_exists('adc_url')
        ? adc_url('performance-mini-guide.php')
        : 'performance-mini-guide.php';


$templatesUrl =
    function_exists('adc_url')
        ? adc_url('templates.php')
        : 'templates.php';


$radarUrl =
    function_exists('adc_url')
        ? adc_url('oportunidades.php')
        : 'oportunidades.php';


$demoFirstUrl =
    function_exists('adc_demofirst_url')
        ? adc_demofirst_url()
        : 'https://demofirst.alexdevcode.com/pt/demofirst';


/* ==========================================================
   ORIGEM
========================================================== */

$story = [
    ['number'=>'01','label'=>t('about.page.story.1.label'),'title'=>t('about.page.story.1.title'),'text'=>t('about.page.story.1.text')],
    ['number'=>'02','label'=>t('about.page.story.2.label'),'title'=>t('about.page.story.2.title'),'text'=>t('about.page.story.2.text')],
    ['number'=>'03','label'=>t('about.page.story.3.label'),'title'=>t('about.page.story.3.title'),'text'=>t('about.page.story.3.text')],
];


/* ==========================================================
   MANIFESTO
========================================================== */

$principles = [
    ['number'=>'01','word'=>t('about.page.principles.1.word'),'title'=>t('about.page.principles.1.title'),'text'=>t('about.page.principles.1.text')],
    ['number'=>'02','word'=>t('about.page.principles.2.word'),'title'=>t('about.page.principles.2.title'),'text'=>t('about.page.principles.2.text')],
    ['number'=>'03','word'=>t('about.page.principles.3.word'),'title'=>t('about.page.principles.3.title'),'text'=>t('about.page.principles.3.text')],
    ['number'=>'04','word'=>t('about.page.principles.4.word'),'title'=>t('about.page.principles.4.title'),'text'=>t('about.page.principles.4.text')],
];


/* ==========================================================
   ECOSSISTEMA
========================================================== */

$ecosystem = [
    ['id'=>'demofirst','icon'=>'fa-rocket','title'=>'DemoFirst','type'=>t('about.page.ecosystem.demofirst.type'),'text'=>t('about.page.ecosystem.demofirst.text'),'url'=>$demoFirstUrl,'external'=>true],
    ['id'=>'projects','icon'=>'fa-folder-open','title'=>t('about.page.ecosystem.projects.title'),'type'=>t('about.page.ecosystem.projects.type'),'text'=>t('about.page.ecosystem.projects.text'),'url'=>$projectsUrl],
    ['id'=>'guide','icon'=>'fa-book-open','title'=>'Mini Guide','type'=>t('about.page.ecosystem.guide.type'),'text'=>t('about.page.ecosystem.guide.text'),'url'=>$guideUrl],
    ['id'=>'radar','icon'=>'fa-satellite-dish','title'=>'Radar','type'=>t('about.page.ecosystem.radar.type'),'text'=>t('about.page.ecosystem.radar.text'),'url'=>$radarUrl],
    ['id'=>'templates','icon'=>'fa-layer-group','title'=>'Templates','type'=>t('about.page.ecosystem.templates.type'),'text'=>t('about.page.ecosystem.templates.text'),'url'=>$templatesUrl],
];

?>


<!-- ==========================================================
     FONTES / ICONS / AOS
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
   ABOUT — TOKENS
========================================================== */

.adc-about {

    --a-dark:
        #141414;

    --a-accent:
        #8b735d;

    --a-accent-dk:
        #715d4b;

    --a-accent-lt:
        #c6b8a9;

    --a-bg:
        #d7d9dd;

    --a-card:
        #ffffff;

    --a-soft:
        #f7f4f0;

    --a-text:
        #302f2e;

    --a-muted:
        #69645f;

    --a-border:
        rgba(20, 20, 20, .11);

    --a-shadow:
        0 10px 30px
        rgba(20, 20, 20, .10);

    --a-shadow-strong:
        0 22px 58px
        rgba(20, 20, 20, .18);


    position:
        relative;


    overflow:
        hidden;


    color:
        var(--a-text);


    background:

        radial-gradient(
            circle at 0% 0%,
            rgba(139, 115, 93, .16),
            transparent 28rem
        ),

        radial-gradient(
            circle at 100% 55%,
            rgba(20, 20, 20, .07),
            transparent 31rem
        ),

        var(--a-bg);

}


body[data-tema="escuro"]
.adc-about {

    --a-bg:
        #171717;

    --a-card:
        #202020;

    --a-soft:
        #262322;

    --a-text:
        #ebe6e0;

    --a-muted:
        #aaa39d;

    --a-border:
        rgba(255, 255, 255, .10);

    --a-shadow:
        0 10px 30px
        rgba(0, 0, 0, .26);

    --a-shadow-strong:
        0 22px 58px
        rgba(0, 0, 0, .36);

}


.adc-about *,
.adc-about *::before,
.adc-about *::after {

    box-sizing:
        border-box;

}


.adc-about-container {

    width:
        min(
            calc(100% - 2rem),
            1180px
        );


    margin:
        0 auto;

}


.adc-about-section {

    padding:
        5rem 0;

}


.adc-about a:focus-visible,
.adc-about button:focus-visible {

    outline:
        3px solid
        rgba(139, 115, 93, .40);


    outline-offset:
        4px;

}



/* ==========================================================
   PROGRESS
========================================================== */

.adc-about-progress {

    position:
        fixed;


    top:
        0;


    left:
        0;


    z-index:
        9999;


    width:
        0;


    height:
        3px;


    background:
        var(--a-accent);


    box-shadow:
        0 0 12px
        rgba(139, 115, 93, .7);


    pointer-events:
        none;

}



/* ==========================================================
   COMMON TEXT
========================================================== */

.adc-about-kicker {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .5rem;


    color:
        var(--a-accent-dk);


    font-size:
        .68rem;


    font-weight:
        800;


    letter-spacing:
        .11em;


    text-transform:
        uppercase;

}


body[data-tema="escuro"]
.adc-about-kicker {

    color:
        var(--a-accent-lt);

}


.adc-about-kicker::before {

    content:
        "";


    width:
        22px;


    height:
        2px;


    border-radius:
        999px;


    background:
        var(--a-accent);

}


.adc-about-heading {

    max-width:
        850px;


    margin:
        .65rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.2rem,
            7vw,
            4.1rem
        );


    line-height:
        .98;


    letter-spacing:
        -.04em;


    color:
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-heading {

    color:
        #fff;

}


.adc-about-intro {

    max-width:
        700px;


    margin:
        .85rem 0 0;


    color:
        var(--a-muted);


    font-size:
        .84rem;


    line-height:
        1.72;

}



/* ==========================================================
   BUTTON
========================================================== */

.adc-about-btn {

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
        .74rem;


    font-weight:
        700;


    transition:
        transform .22s ease,
        background .22s ease,
        border-color .22s ease,
        color .22s ease;

}


.adc-about-btn:hover {

    transform:
        translateY(-3px);

}


.adc-about-btn-primary {

    background:
        var(--a-dark);


    color:
        #fff;

}


.adc-about-btn-primary:hover {

    background:
        var(--a-accent);

}


.adc-about-btn-secondary {

    border-color:
        rgba(139, 115, 93, .24);


    background:
        rgba(139, 115, 93, .08);


    color:
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-btn-secondary {

    color:
        #fff;

}


.adc-about-btn-secondary:hover {

    background:
        rgba(139, 115, 93, .18);

}



/* ==========================================================
   HERO
========================================================== */

.adc-about-hero {

    position:
        relative;


    overflow:
        hidden;


    padding:
        4.4rem 0
        3.9rem;


    border-bottom:
        1px solid
        var(--a-border);

}


.adc-about-hero::before {

    content:
        "ABOUT";


    position:
        absolute;


    right:
        -1.8rem;


    top:
        -4.8rem;


    color:
        rgba(139, 115, 93, .055);


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


    pointer-events:
        none;

}


.adc-about-hero-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    gap:
        2.6rem;


    align-items:
        center;

}


.adc-about-hero h1 {

    max-width:
        780px;


    margin:
        .75rem 0 0;


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
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-hero h1 {

    color:
        #fff;

}


.adc-about-hero h1 span {

    display:
        block;


    color:
        var(--a-accent);

}


.adc-about-hero-copy > p {

    max-width:
        650px;


    margin:
        1rem 0 0;


    color:
        var(--a-muted);


    font-size:
        .86rem;


    line-height:
        1.72;

}


.adc-about-hero-actions {

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
   BRAND STAGE

   O hero apresenta a marca AlexDevCode.
   A foto pessoal permanece apenas na secção "Quem está por trás".
========================================================== */

.adc-about-profile-stage {

    position:
        relative;


    min-height:
        350px;


    display:
        flex;


    align-items:
        center;


    justify-content:
        center;


    transition:
        transform .16s ease-out;

}


.adc-about-profile-ring {

    position:
        absolute;


    width:
        290px;


    height:
        290px;


    border:
        1px dashed
        rgba(139, 115, 93, .45);


    border-radius:
        50%;


    animation:
        adcAboutSpin
        24s
        linear
        infinite;

}


.adc-about-profile-ring::before,
.adc-about-profile-ring::after {

    content:
        "";


    position:
        absolute;


    width:
        12px;


    height:
        12px;


    border-radius:
        50%;


    background:
        var(--a-accent);

}


.adc-about-profile-ring::before {

    top:
        26px;


    left:
        42px;

}


.adc-about-profile-ring::after {

    right:
        38px;


    bottom:
        28px;


    background:
        var(--a-dark);

}


.adc-about-profile {

    position:
        relative;


    z-index:
        4;


    width:
        200px;


    height:
        200px;


    padding:
        6px;


    border-radius:
        50%;


    background:
        linear-gradient(
            135deg,
            var(--a-accent),
            #141414
        );


    box-shadow:
        var(--a-shadow-strong);


    animation:
        adcAboutProfileFloat
        4.8s
        ease-in-out
        infinite;

}


.adc-about-profile img {

    display:
        block;


    width:
        100%;


    height:
        100%;


    object-fit:
        contain;


    padding:
        10px;


    background:
        #fff;


    border:
        4px solid
        #fff;


    border-radius:
        50%;

}


.adc-about-profile-caption {

    position:
        absolute;


    z-index:
        7;


    left:
        50%;


    bottom:
        25px;


    transform:
        translateX(-50%);


    min-width:
        max-content;


    padding:
        .42rem .65rem;


    border:
        1px solid
        rgba(255, 255, 255, .12);


    border-radius:
        999px;


    background:
        rgba(20, 20, 20, .88);


    color:
        #fff;


    font-size:
        .59rem;


    font-weight:
        700;


    backdrop-filter:
        blur(8px);

}



/* ==========================================================
   FLOATING MARKERS
========================================================== */

.adc-about-float {

    position:
        absolute;


    z-index:
        5;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    width:
        44px;


    height:
        44px;


    border:
        1px solid
        var(--a-border);


    border-radius:
        14px;


    background:
        var(--a-card);


    color:
        var(--a-accent);


    box-shadow:
        var(--a-shadow);


    animation:
        adcAboutTechFloat
        4.3s
        ease-in-out
        infinite;

}


.adc-about-float.one {

    top:
        24px;


    left:
        10%;

}


.adc-about-float.two {

    top:
        70px;


    right:
        7%;


    animation-delay:
        .7s;

}


.adc-about-float.three {

    bottom:
        60px;


    left:
        6%;


    animation-delay:
        1.4s;

}


.adc-about-float.four {

    right:
        14%;


    bottom:
        24px;


    animation-delay:
        2.1s;

}



/* ==========================================================
   BRAND TRACE
========================================================== */

.adc-about-trace {

    overflow:
        hidden;


    border-bottom:
        1px solid
        var(--a-border);


    background:
        var(--a-dark);

}


.adc-about-trace-track {

    display:
        flex;


    gap:
        2rem;


    width:
        max-content;


    padding:
        .75rem 1rem;


    animation:
        adcAboutTrack
        27s
        linear
        infinite;

}


.adc-about-trace-item {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .55rem;


    white-space:
        nowrap;


    color:
        rgba(255, 255, 255, .78);


    font-size:
        .64rem;


    font-weight:
        600;

}


.adc-about-trace-item i {

    color:
        var(--a-accent-lt);


    font-size:
        .55rem;

}



/* ==========================================================
   IDENTITY STATEMENT
========================================================== */

.adc-about-identity {

    padding:
        5.3rem 0;

}


.adc-about-identity-grid {

    display:
        grid;


    gap:
        2rem;


    align-items:
        start;

}


.adc-about-identity-mark {

    position:
        relative;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            4rem,
            18vw,
            9rem
        );


    font-weight:
        700;


    line-height:
        .78;


    letter-spacing:
        -.06em;


    color:
        rgba(139, 115, 93, .16);


    user-select:
        none;

}


.adc-about-identity-copy {

    max-width:
        730px;

}


.adc-about-identity-copy blockquote {

    margin:
        .8rem 0 0;


    padding:
        0;


    border:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.8rem,
            6vw,
            3rem
        );


    line-height:
        1.05;


    color:
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-identity-copy blockquote {

    color:
        #fff;

}


.adc-about-identity-copy blockquote strong {

    color:
        var(--a-accent);

}


.adc-about-identity-copy p {

    margin:
        .9rem 0 0;


    color:
        var(--a-muted);


    font-size:
        .78rem;


    line-height:
        1.7;

}



/* ==========================================================
   ORIGIN
========================================================== */

.adc-about-origin {

    position:
        relative;


    overflow:
        hidden;


    background:
        var(--a-dark);


    color:
        #fff;

}


.adc-about-origin::before {

    content:
        "STORY";


    position:
        absolute;


    right:
        -1.2rem;


    top:
        -5rem;


    color:
        rgba(255, 255, 255, .025);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        15rem;


    font-weight:
        700;


    pointer-events:
        none;

}


.adc-about-origin
.adc-about-kicker {

    color:
        var(--a-accent-lt);

}


.adc-about-origin
.adc-about-heading {

    color:
        #fff;

}


.adc-about-origin
.adc-about-intro {

    color:
        #aaa39c;

}


.adc-about-story {

    position:
        relative;


    z-index:
        2;


    margin-top:
        2rem;


    border-top:
        1px solid
        rgba(255, 255, 255, .10);

}


.adc-about-story-item {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        44px
        minmax(0, 1fr);


    gap:
        .9rem;


    padding:
        1.4rem 0;


    border-bottom:
        1px solid
        rgba(255, 255, 255, .10);


    overflow:
        hidden;


    transition:
        padding .24s ease;

}


.adc-about-story-item::before {

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
            rgba(139, 115, 93, .23),
            transparent
        );


    transition:
        transform .34s ease;

}


@media (hover: hover) and (pointer: fine) {

    .adc-about-story-item:hover::before {

        transform:
            scaleX(1);

    }


    .adc-about-story-item:hover {

        padding-left:
            .7rem;


        padding-right:
            .7rem;

    }

}


.adc-about-story-number,
.adc-about-story-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-about-story-number {

    color:
        var(--a-accent-lt);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .73rem;

}


.adc-about-story-label {

    display:
        block;


    margin-bottom:
        .15rem;


    color:
        #938a83;


    font-size:
        .56rem;


    font-weight:
        800;


    letter-spacing:
        .10em;


    text-transform:
        uppercase;

}


.adc-about-story-copy h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.45rem,
            5vw,
            2.2rem
        );


    color:
        #fff;

}


.adc-about-story-copy p {

    max-width:
        780px;


    margin:
        .4rem 0 0;


    color:
        #aaa39c;


    font-size:
        .72rem;


    line-height:
        1.62;

}



/* ==========================================================
   MANIFESTO
========================================================== */

.adc-about-manifesto-list {

    margin-top:
        2rem;


    border-top:
        1px solid
        var(--a-border);

}


.adc-about-principle {

    position:
        relative;


    display:
        grid;


    gap:
        .65rem;


    padding:
        1.6rem 0;


    border-bottom:
        1px solid
        var(--a-border);


    overflow:
        hidden;

}


.adc-about-principle-word {

    position:
        relative;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.9rem,
            11vw,
            5.5rem
        );


    font-weight:
        700;


    line-height:
        .85;


    letter-spacing:
        -.045em;


    color:
        rgba(139, 115, 93, .22);


    transition:
        color .28s ease,
        transform .28s ease;

}


.adc-about-principle:hover
.adc-about-principle-word {

    color:
        var(--a-accent);


    transform:
        translateX(8px);

}


.adc-about-principle-copy {

    position:
        relative;

}


.adc-about-principle-meta {

    display:
        flex;


    align-items:
        center;


    gap:
        .55rem;


    color:
        var(--a-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .62rem;

}


.adc-about-principle-copy h3 {

    margin:
        .25rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.28rem;


    color:
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-principle-copy h3 {

    color:
        #fff;

}


.adc-about-principle-copy p {

    max-width:
        700px;


    margin:
        .35rem 0 0;


    color:
        var(--a-muted);


    font-size:
        .7rem;


    line-height:
        1.58;

}



/* ==========================================================
   ECOSYSTEM
========================================================== */

.adc-about-ecosystem {

    position:
        relative;


    overflow:
        hidden;


    padding:
        5.5rem 0;

}


.adc-about-ecosystem-stage {

    position:
        relative;


    margin-top:
        2.3rem;


    min-height:
        500px;

}


.adc-about-ecosystem-lines {

    display:
        none;

}


.adc-about-core {

    position:
        relative;


    z-index:
        5;


    width:
        170px;


    height:
        170px;


    margin:
        0 auto 1.5rem;


    display:
        flex;


    flex-direction:
        column;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        50%;


    background:
        var(--a-dark);


    color:
        #fff;


    text-align:
        center;


    box-shadow:
        var(--a-shadow-strong);


    animation:
        adcAboutCoreFloat
        5s
        ease-in-out
        infinite;

}


.adc-about-core strong {

    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.55rem;


    line-height:
        .95;

}


.adc-about-core strong span {

    color:
        var(--a-accent-lt);

}


.adc-about-core small {

    max-width:
        110px;


    margin-top:
        .4rem;


    color:
        rgba(255, 255, 255, .55);


    font-size:
        .53rem;


    line-height:
        1.4;

}


.adc-about-ecosystem-node {

    position:
        relative;


    z-index:
        4;


    display:
        grid;


    grid-template-columns:
        38px minmax(0, 1fr) 24px;


    gap:
        .7rem;


    align-items:
        center;


    width:
        100%;


    margin-bottom:
        .6rem;


    padding:
        .75rem;


    border:
        1px solid
        var(--a-border);


    border-radius:
        14px;


    background:
        var(--a-card);


    color:
        inherit;


    text-decoration:
        none;


    box-shadow:
        var(--a-shadow);


    transition:
        transform .25s ease,
        border-color .25s ease;

}


.adc-about-ecosystem-node:hover {

    transform:
        translateY(-4px);


    border-color:
        rgba(139, 115, 93, .34);

}


.adc-about-node-icon {

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
        var(--a-accent);

}


.adc-about-node-copy small {

    display:
        block;


    color:
        var(--a-accent);


    font-size:
        .52rem;


    font-weight:
        800;


    letter-spacing:
        .08em;


    text-transform:
        uppercase;

}


.adc-about-node-copy strong {

    display:
        block;


    margin-top:
        .06rem;


    color:
        var(--a-dark);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.08rem;

}


body[data-tema="escuro"]
.adc-about-node-copy strong {

    color:
        #fff;

}


.adc-about-node-copy span {

    display:
        block;


    margin-top:
        .12rem;


    color:
        var(--a-muted);


    font-size:
        .56rem;


    line-height:
        1.4;

}


.adc-about-node-arrow {

    color:
        var(--a-accent);


    transition:
        transform .22s ease;

}


.adc-about-ecosystem-node:hover
.adc-about-node-arrow {

    transform:
        translateX(4px);

}



/* ==========================================================
   FOUNDER
========================================================== */

.adc-about-founder {

    position:
        relative;


    overflow:
        hidden;


    background:
        var(--a-dark);


    color:
        #fff;

}


.adc-about-founder::before {

    content:
        "ALEX";


    position:
        absolute;


    right:
        -1rem;


    bottom:
        -4rem;


    color:
        rgba(255, 255, 255, .025);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            9rem,
            25vw,
            18rem
        );


    font-weight:
        700;


    pointer-events:
        none;

}


.adc-about-founder-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    gap:
        2rem;


    align-items:
        center;

}


.adc-about-founder-photo {

    position:
        relative;


    width:
        min(
            100%,
            290px
        );


    margin:
        0 auto;


    transform:
        rotate(-2deg);


    transition:
        transform .3s ease;

}


.adc-about-founder-photo::before {

    content:
        "";


    position:
        absolute;


    inset:
        -10px;


    border:
        1px solid
        rgba(198, 184, 169, .28);


    border-radius:
        26px;


    transform:
        rotate(5deg);

}


.adc-about-founder-photo img {

    position:
        relative;


    z-index:
        2;


    display:
        block;


    width:
        100%;


    aspect-ratio:
        4 / 4.8;


    object-fit:
        cover;


    border:
        5px solid
        #fff;


    border-radius:
        21px;


    box-shadow:
        var(--a-shadow-strong);

}


.adc-about-founder-photo:hover {

    transform:
        rotate(0)
        translateY(-5px);

}


.adc-about-founder
.adc-about-kicker {

    color:
        var(--a-accent-lt);

}


.adc-about-founder h2 {

    max-width:
        700px;


    margin:
        .65rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.3rem,
            8vw,
            4rem
        );


    line-height:
        .96;


    letter-spacing:
        -.04em;


    color:
        #fff;

}


.adc-about-founder h2 span {

    color:
        var(--a-accent-lt);

}


.adc-about-founder-copy > p {

    max-width:
        690px;


    margin:
        .8rem 0 0;


    color:
        #aaa39c;


    font-size:
        .75rem;


    line-height:
        1.65;

}


.adc-about-founder-signature {

    margin-top:
        1.15rem;


    padding-top:
        1rem;


    border-top:
        1px solid
        rgba(255, 255, 255, .11);

}


.adc-about-founder-signature strong {

    display:
        block;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.2rem;


    color:
        #fff;

}


.adc-about-founder-signature span {

    display:
        block;


    margin-top:
        .15rem;


    color:
        #948b83;


    font-size:
        .63rem;

}


.adc-about-founder-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        1.1rem;

}


.adc-about-founder
.adc-about-btn-secondary {

    border-color:
        rgba(255, 255, 255, .14);


    background:
        rgba(255, 255, 255, .06);


    color:
        #fff;

}



/* ==========================================================
   TECH SIGNATURE
========================================================== */

.adc-about-tech {

    padding:
        1.8rem 0;

}


.adc-about-tech-window {

    overflow:
        hidden;


    border-top:
        1px solid
        var(--a-border);


    border-bottom:
        1px solid
        var(--a-border);

}


.adc-about-tech-track {

    display:
        flex;


    gap:
        2rem;


    width:
        max-content;


    padding:
        .82rem 1rem;


    animation:
        adcAboutTrack
        28s
        linear
        infinite reverse;

}


.adc-about-tech-item {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .4rem;


    white-space:
        nowrap;


    color:
        var(--a-muted);


    font-size:
        .65rem;


    font-weight:
        700;

}


.adc-about-tech-item i {

    color:
        var(--a-accent);

}



/* ==========================================================
   CTA
========================================================== */

.adc-about-cta {

    padding:
        3.5rem 0
        5rem;

}


.adc-about-cta-line {

    position:
        relative;


    padding:
        2.6rem 0;


    border-top:
        2px solid
        var(--a-dark);


    border-bottom:
        2px solid
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-cta-line {

    border-color:
        rgba(255, 255, 255, .84);

}


.adc-about-cta-line::after {

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
        rgba(139, 115, 93, .12);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        8rem;


    pointer-events:
        none;


    animation:
        adcAboutArrow
        3s
        ease-in-out
        infinite;

}


.adc-about-cta-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-about-cta h2 {

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
        var(--a-dark);

}


body[data-tema="escuro"]
.adc-about-cta h2 {

    color:
        #fff;

}


.adc-about-cta p {

    max-width:
        620px;


    margin:
        .65rem 0 0;


    color:
        var(--a-muted);


    font-size:
        .73rem;


    line-height:
        1.62;

}


.adc-about-cta-actions {

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
   ANIMATIONS
========================================================== */

@keyframes adcAboutSpin {

    from {

        transform:
            rotate(0);

    }


    to {

        transform:
            rotate(360deg);

    }

}


@keyframes adcAboutProfileFloat {

    0%,
    100% {

        transform:
            translateY(0)
            rotate(-1deg);

    }


    50% {

        transform:
            translateY(-13px)
            rotate(1deg);

    }

}


@keyframes adcAboutTechFloat {

    0%,
    100% {

        transform:
            translateY(0)
            rotate(0);

    }


    50% {

        transform:
            translateY(-10px)
            rotate(4deg);

    }

}


@keyframes adcAboutCoreFloat {

    0%,
    100% {

        transform:
            translateY(0);

    }


    50% {

        transform:
            translateY(-9px);

    }

}


@keyframes adcAboutTrack {

    from {

        transform:
            translateX(0);

    }


    to {

        transform:
            translateX(-50%);

    }

}


@keyframes adcAboutArrow {

    0%,
    100% {

        transform:
            translateY(-50%)
            translateX(0);

    }


    50% {

        transform:
            translateY(-50%)
            translateX(10px);

    }

}



/* ==========================================================
   TABLET
========================================================== */

@media (min-width: 640px) {

    .adc-about-hero-actions,
    .adc-about-founder-actions,
    .adc-about-cta-actions {

        flex-direction:
            row;


        flex-wrap:
            wrap;

    }


    .adc-about-principle {

        grid-template-columns:
            minmax(180px, .7fr)
            minmax(0, 1.3fr);


        align-items:
            center;


        gap:
            2rem;

    }

}



/* ==========================================================
   DESKTOP
========================================================== */

@media (min-width: 920px) {

    .adc-about-hero {

        padding:
            5.4rem 0
            4.6rem;

    }


    .adc-about-hero-grid {

        grid-template-columns:
            minmax(0, 1.15fr)
            minmax(350px, .85fr);


        gap:
            4rem;

    }


    .adc-about-profile-stage {

        min-height:
            410px;

    }


    .adc-about-profile-ring {

        width:
            330px;


        height:
            330px;

    }


    .adc-about-profile {

        width:
            230px;


        height:
            230px;

    }



    /* ======================================================
       IDENTITY
    ======================================================= */

    .adc-about-identity-grid {

        grid-template-columns:
            260px
            minmax(0, 1fr);


        gap:
            4rem;


        align-items:
            center;

    }



    /* ======================================================
       STORY
    ======================================================= */

    .adc-about-story-item {

        grid-template-columns:
            58px
            170px
            minmax(0, 1fr);


        gap:
            1rem;


        align-items:
            start;

    }


    .adc-about-story-label {

        padding-top:
            .1rem;

    }



    /* ======================================================
       ECOSYSTEM CONSTELLATION
    ======================================================= */

    .adc-about-ecosystem-stage {

        min-height:
            610px;

    }


    .adc-about-core {

        position:
            absolute;


        left:
            50%;


        top:
            50%;


        transform:
            translate(-50%, -50%);


        width:
            190px;


        height:
            190px;


        margin:
            0;

    }


    .adc-about-core {

        animation:
            adcAboutCoreDesktop
            5s
            ease-in-out
            infinite;

    }


    @keyframes adcAboutCoreDesktop {

        0%,
        100% {

            transform:
                translate(-50%, -50%)
                translateY(0);

        }


        50% {

            transform:
                translate(-50%, -50%)
                translateY(-9px);

        }

    }


    .adc-about-ecosystem-lines {

        display:
            block;


        position:
            absolute;


        inset:
            0;


        z-index:
            1;


        pointer-events:
            none;

    }


    .adc-about-ecosystem-lines::before,
    .adc-about-ecosystem-lines::after {

        content:
            "";


        position:
            absolute;


        left:
            50%;


        top:
            50%;


        border:
            1px dashed
            rgba(139, 115, 93, .22);


        border-radius:
            50%;


        transform:
            translate(-50%, -50%);

    }


    .adc-about-ecosystem-lines::before {

        width:
            430px;


        height:
            430px;


        animation:
            adcAboutSpin
            38s
            linear
            infinite;

    }


    .adc-about-ecosystem-lines::after {

        width:
            570px;


        height:
            570px;


        animation:
            adcAboutSpin
            55s
            linear
            infinite reverse;

    }


    .adc-about-ecosystem-node {

        position:
            absolute;


        width:
            270px;


        margin:
            0;


        animation:
            adcAboutNodeFloat
            5s
            ease-in-out
            infinite;

    }


    .adc-about-ecosystem-node.node-1 {

        left:
            2%;


        top:
            12%;

    }


    .adc-about-ecosystem-node.node-2 {

        right:
            0;


        top:
            8%;


        animation-delay:
            .7s;

    }


    .adc-about-ecosystem-node.node-3 {

        left:
            0;


        bottom:
            12%;


        animation-delay:
            1.4s;

    }


    .adc-about-ecosystem-node.node-4 {

        right:
            2%;


        bottom:
            10%;


        animation-delay:
            2.1s;

    }


    .adc-about-ecosystem-node.node-5 {

        left:
            50%;


        bottom:
            -2%;


        transform:
            translateX(-50%);


        animation:
            adcAboutNodeCenter
            5s
            ease-in-out
            infinite;

    }


    @keyframes adcAboutNodeFloat {

        0%,
        100% {

            transform:
                translateY(0);

        }


        50% {

            transform:
                translateY(-7px);

        }

    }


    @keyframes adcAboutNodeCenter {

        0%,
        100% {

            transform:
                translateX(-50%)
                translateY(0);

        }


        50% {

            transform:
                translateX(-50%)
                translateY(-7px);

        }

    }



    /* ======================================================
       FOUNDER
    ======================================================= */

    .adc-about-founder-grid {

        grid-template-columns:
            300px
            minmax(0, 1fr);


        gap:
            4rem;

    }


    .adc-about-founder-photo {

        margin:
            0;

    }

}



/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 639px) {

    .adc-about-section {

        padding:
            4.25rem 0;

    }


    .adc-about-hero {

        padding:
            2.7rem 0
            3.35rem;

    }


    .adc-about-hero::before {

        right:
            -1rem;


        top:
            -2.2rem;


        font-size:
            8.5rem;

    }


    .adc-about-hero h1 {

        font-size:
            clamp(
                2.75rem,
                14vw,
                3.15rem
            );


        line-height:
            .92;

    }


    .adc-about-hero-copy > p {

        font-size:
            .84rem;

    }


    .adc-about-profile-stage {

        min-height:
            300px;

    }


    .adc-about-profile-ring {

        width:
            232px;


        height:
            232px;

    }


    .adc-about-profile {

        width:
            166px;


        height:
            166px;

    }


    .adc-about-profile-caption {

        bottom:
            2px;


        max-width:
            calc(100vw - 3rem);


        min-width:
            0;


        white-space:
            nowrap;

    }


    .adc-about-identity {

        padding:
            4.4rem 0;

    }


    .adc-about-identity-mark {

        font-size:
            4.6rem;

    }


    .adc-about-origin::before {

        right:
            -.7rem;


        top:
            -2.2rem;


        font-size:
            8.2rem;

    }


    /* ======================================================
       ORIGEM — CORREÇÃO DO GRID MOBILE

       O markup possui 3 filhos diretos:
       número + label + conteúdo. No mobile o layout usa 2
       colunas, por isso cada elemento recebe posição explícita.
    ======================================================= */

    .adc-about-story {

        margin-top:
            1.65rem;

    }


    .adc-about-story-item {

        grid-template-columns:
            36px
            minmax(0, 1fr);


        column-gap:
            .75rem;


        row-gap:
            .18rem;


        padding:
            1.35rem 0;


        align-items:
            start;

    }


    .adc-about-story-number {

        grid-column:
            1;


        grid-row:
            1 / span 2;


        padding-top:
            .12rem;

    }


    .adc-about-story-label {

        grid-column:
            2;


        grid-row:
            1;


        margin:
            0;

    }


    .adc-about-story-copy {

        grid-column:
            2;


        grid-row:
            2;


        min-width:
            0;

    }


    .adc-about-story-copy h3 {

        font-size:
            1.55rem;


        line-height:
            1.05;

    }


    .adc-about-story-copy p {

        margin-top:
            .48rem;


        font-size:
            .78rem;


        line-height:
            1.65;

    }


    .adc-about-principle-word {

        font-size:
            clamp(
                2.65rem,
                13vw,
                3.35rem
            );

    }


    .adc-about-ecosystem {

        padding:
            4.6rem 0;

    }


    .adc-about-ecosystem-stage {

        min-height:
            auto;


        margin-top:
            1.9rem;

    }


    .adc-about-core {

        width:
            154px;


        height:
            154px;


        margin-bottom:
            1.35rem;

    }


    .adc-about-founder-photo {

        width:
            min(
                82vw,
                270px
            );

    }


    .adc-about-founder h2 {

        font-size:
            clamp(
                2.2rem,
                11vw,
                3rem
            );

    }


    .adc-about-founder-copy > p {

        font-size:
            .78rem;

    }


    .adc-about-cta {

        padding:
            3rem 0
            4.25rem;

    }


    .adc-about-cta-line::after {

        right:
            -.35rem;


        font-size:
            5.5rem;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-about *,
    .adc-about *::before,
    .adc-about *::after {

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
     PROGRESS
========================================================== -->

<div
    class="adc-about-progress"
    id="adcAboutProgress"
    aria-hidden="true"
></div>


<main class="adc-about">


    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="adc-about-hero">

        <div class="adc-about-container">


            <div class="adc-about-hero-grid">


                <!-- =========================================
                     COPY
                ========================================== -->

                <div
                    class="adc-about-hero-copy"
                    data-aos="fade-right"
                >


                    <span class="adc-about-kicker">

                        <?= $e(t('about.page.hero.kicker')) ?>

                    </span>


                    <h1>

                        <?= $e(t('about.page.hero.title_before')) ?>

                        <span>
                            <?= $e(t('about.page.hero.title_highlight')) ?>
                        </span>

                    </h1>


                    <p>

                        <?= $e(t('about.page.hero.text1')) ?>

                    </p>


                    <p>

                        <?= $e(t('about.page.hero.text2')) ?>

                    </p>


                    <div class="adc-about-hero-actions">


                        <a
                            href="#origem"

                            class="
                                adc-about-btn
                                adc-about-btn-primary
                            "
                        >

                            <i
                                class="fas fa-arrow-down"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.hero.history_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($projectsUrl) ?>"

                            class="
                                adc-about-btn
                                adc-about-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-folder-open"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.hero.projects_cta')) ?>

                        </a>


                    </div>


                </div>



                <!-- =========================================
                     MARCA / LOGO
                ========================================== -->

                <div
                    class="adc-about-profile-stage"
                    id="adcAboutProfileStage"

                    data-aos="zoom-in"
                    data-aos-delay="120"
                >


                    <div
                        class="adc-about-profile-ring"
                        aria-hidden="true"
                    ></div>


                    <div class="adc-about-profile">

                        <img
                            src="assets/img/alex-perfil.jpeg"
                            alt="<?= $e(t('about.page.hero.logo_alt')) ?>"
                        >

                    </div>


                    <span
                        class="
                            adc-about-float
                            one
                        "
                        aria-hidden="true"
                    >
                        <i class="fab fa-php"></i>
                    </span>


                    <span
                        class="
                            adc-about-float
                            two
                        "
                        aria-hidden="true"
                    >
                        <i class="fab fa-js"></i>
                    </span>


                    <span
                        class="
                            adc-about-float
                            three
                        "
                        aria-hidden="true"
                    >
                        <i class="fas fa-database"></i>
                    </span>


                    <span
                        class="
                            adc-about-float
                            four
                        "
                        aria-hidden="true"
                    >
                        <i class="fab fa-react"></i>
                    </span>


                    <span class="adc-about-profile-caption">

                        <?= $e(t('about.page.hero.caption')) ?>

                    </span>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         TRACE
    ======================================================= -->

    <div
        class="adc-about-trace"
        aria-hidden="true"
    >

        <div class="adc-about-trace-track">


            <?php for ($repeat = 0; $repeat < 2; $repeat++): ?>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.idea')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.structure')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.code')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.product')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.real_use')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


                <span class="adc-about-trace-item">
                    <?= $e(t('about.page.trace.evolution')) ?>
                    <i class="fas fa-arrow-right"></i>
                </span>


            <?php endfor; ?>


        </div>

    </div>



    <!-- ======================================================
         IDENTIDADE
    ======================================================= -->

    <section class="adc-about-identity">

        <div class="adc-about-container">


            <div class="adc-about-identity-grid">


                <div
                    class="adc-about-identity-mark"
                    data-aos="fade-right"
                    aria-hidden="true"
                >

                    ADC

                </div>


                <div
                    class="adc-about-identity-copy"
                    data-aos="fade-up"
                >


                    <span class="adc-about-kicker">

                        <?= $e(t('about.page.identity.kicker')) ?>

                    </span>


                    <blockquote>

                        <?= $e(t('about.page.identity.quote_before')) ?>

                        <strong>
                            <?= $e(t('about.page.identity.quote_highlight')) ?>
                        </strong>

                        <?= $e(t('about.page.identity.quote_after')) ?>

                    </blockquote>


                    <p>

                        <?= $e(t('about.page.identity.text')) ?>

                    </p>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         ORIGEM
    ======================================================= -->

    <section
        class="
            adc-about-section
            adc-about-origin
        "

        id="origem"
    >

        <div class="adc-about-container">


            <span class="adc-about-kicker">

                <?= $e(t('about.page.origin.kicker')) ?>

            </span>


            <h2 class="adc-about-heading">

                <?= $e(t('about.page.origin.title')) ?>

            </h2>


            <p class="adc-about-intro">

                <?= $e(t('about.page.origin.text')) ?>

            </p>


            <div class="adc-about-story">


                <?php foreach ($story as $item): ?>


                    <article
                        class="adc-about-story-item"
                        data-aos="fade-up"
                    >


                        <span class="adc-about-story-number">

                            <?= $e($item['number']) ?>

                        </span>


                        <span class="adc-about-story-label">

                            <?= $e($item['label']) ?>

                        </span>


                        <div class="adc-about-story-copy">


                            <h3>

                                <?= $e($item['title']) ?>

                            </h3>


                            <p>

                                <?= $e($item['text']) ?>

                            </p>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         MANIFESTO
    ======================================================= -->

    <section class="adc-about-section">

        <div class="adc-about-container">


            <span class="adc-about-kicker">

                <?= $e(t('about.page.manifesto.kicker')) ?>

            </span>


            <h2 class="adc-about-heading">

                <?= $e(t('about.page.manifesto.title')) ?>

            </h2>


            <p class="adc-about-intro">

                <?= $e(t('about.page.manifesto.text')) ?>

            </p>


            <div class="adc-about-manifesto-list">


                <?php foreach ($principles as $principle): ?>


                    <article
                        class="adc-about-principle"
                        data-aos="fade-up"
                    >


                        <div class="adc-about-principle-word">

                            <?= $e($principle['word']) ?>

                        </div>


                        <div class="adc-about-principle-copy">


                            <div class="adc-about-principle-meta">

                                <?= $e($principle['number']) ?>

                                <span>—</span>

                                AlexDevCode

                            </div>


                            <h3>

                                <?= $e($principle['title']) ?>

                            </h3>


                            <p>

                                <?= $e($principle['text']) ?>

                            </p>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         ECOSYSTEM
    ======================================================= -->

    <section class="adc-about-ecosystem">

        <div class="adc-about-container">


            <span class="adc-about-kicker">

                <?= $e(t('about.page.ecosystem.kicker')) ?>

            </span>


            <h2 class="adc-about-heading">

                <?= $e(t('about.page.ecosystem.title')) ?>

            </h2>


            <p class="adc-about-intro">

                <?= $e(t('about.page.ecosystem.text')) ?>

            </p>



            <div class="adc-about-ecosystem-stage">


                <div
                    class="adc-about-ecosystem-lines"
                    aria-hidden="true"
                ></div>



                <!-- CORE -->

                <div class="adc-about-core">


                    <strong>

                        Alex<span>Dev</span>Code

                    </strong>


                    <small>

                        <?= $e(t('about.page.ecosystem.core_text')) ?>

                    </small>


                </div>



                <!-- NODES -->

                <?php foreach ($ecosystem as $index => $item): ?>


                    <a
                        href="<?= $e($item['url']) ?>"

                        class="
                            adc-about-ecosystem-node
                            node-<?= $index + 1 ?>
                        "

                        <?php if (!empty($item['external'])): ?>

                            target="_blank"
                            rel="noopener noreferrer"

                        <?php endif; ?>

                        data-aos="zoom-in"
                    >


                        <span
                            class="adc-about-node-icon"
                            aria-hidden="true"
                        >

                            <i
                                class="fas <?= $e($item['icon']) ?>"
                            ></i>

                        </span>


                        <span class="adc-about-node-copy">


                            <small>

                                <?= $e($item['type']) ?>

                            </small>


                            <strong>

                                <?= $e($item['title']) ?>

                            </strong>


                            <span>

                                <?= $e($item['text']) ?>

                            </span>


                        </span>


                        <span
                            class="adc-about-node-arrow"
                            aria-hidden="true"
                        >

                            <i
                                class="
                                    fas
                                    <?= !empty($item['external'])
                                        ? 'fa-arrow-up-right-from-square'
                                        : 'fa-arrow-right' ?>
                                "
                            ></i>

                        </span>


                    </a>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         FOUNDER
    ======================================================= -->

    <section
        class="
            adc-about-section
            adc-about-founder
        "
    >

        <div class="adc-about-container">


            <div class="adc-about-founder-grid">


                <!-- PHOTO -->

                <div
                    class="adc-about-founder-photo"
                    data-aos="fade-right"
                >

                    <img
                        src="assets/img/alexxx.jpg"
                        alt="Alex Oliveira"
                    >

                </div>



                <!-- COPY -->

                <div
                    class="adc-about-founder-copy"
                    data-aos="fade-left"
                >


                    <span class="adc-about-kicker">

                        <?= $e(t('about.page.founder.kicker')) ?>

                    </span>


                    <h2>

                        <?= $e(t('about.page.founder.title_before')) ?>
                        <span>
                            <?= $e(t('about.page.founder.title_highlight')) ?>
                        </span>

                    </h2>


                    <p>

                        <?= $e(t('about.page.founder.text1')) ?>

                    </p>


                    <p>

                        <?= $e(t('about.page.founder.text2')) ?>

                    </p>


                    <div class="adc-about-founder-signature">


                        <strong>
                            Alex Oliveira
                        </strong>


                        <span>

                            <?= $e(t('about.page.founder.role')) ?>

                        </span>


                    </div>


                    <div class="adc-about-founder-actions">


                        <a
                            href="<?= $e($projectsUrl) ?>"

                            class="
                                adc-about-btn
                                adc-about-btn-primary
                            "
                        >

                            <i
                                class="fas fa-folder-open"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.founder.projects_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($contactUrl) ?>"

                            class="
                                adc-about-btn
                                adc-about-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.founder.contact_cta')) ?>

                        </a>


                    </div>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         TECHNOLOGY SIGNATURE
    ======================================================= -->

    <section
        class="adc-about-tech"
        aria-label="<?= $e(t('about.page.tech.aria')) ?>"
    >

        <div class="adc-about-container">


            <div class="adc-about-tech-window">


                <div class="adc-about-tech-track">


                    <?php for ($repeat = 0; $repeat < 2; $repeat++): ?>


                        <span class="adc-about-tech-item">
                            <i class="fab fa-php"></i>
                            PHP
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fab fa-js"></i>
                            JavaScript
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fas fa-code"></i>
                            TypeScript
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fab fa-react"></i>
                            React / Next.js
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fab fa-laravel"></i>
                            Laravel
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fas fa-database"></i>
                            MySQL / PostgreSQL
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fas fa-plug"></i>
                            REST APIs
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fab fa-git-alt"></i>
                            Git
                        </span>


                        <span class="adc-about-tech-item">
                            <i class="fas fa-mobile-screen-button"></i>
                            Mobile-first
                        </span>


                    <?php endfor; ?>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         CTA
    ======================================================= -->

    <section class="adc-about-cta">

        <div class="adc-about-container">


            <div
                class="adc-about-cta-line"
                data-aos="fade-up"
            >


                <div class="adc-about-cta-copy">


                    <span class="adc-about-kicker">

                        <?= $e(t('about.page.final.kicker')) ?>

                    </span>


                    <h2>

                        <?= $e(t('about.page.final.title')) ?>

                    </h2>


                    <p>

                        <?= $e(t('about.page.final.text')) ?>

                    </p>


                    <div class="adc-about-cta-actions">


                        <a
                            href="<?= $e($projectsUrl) ?>"

                            class="
                                adc-about-btn
                                adc-about-btn-primary
                            "
                        >

                            <i
                                class="fas fa-folder-open"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.final.projects_cta')) ?>

                        </a>


                        <a
                            href="<?= $e($contactUrl) ?>"

                            class="
                                adc-about-btn
                                adc-about-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $e(t('about.page.final.contact_cta')) ?>

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
                780,

            once:
                true,

            offset:
                70,

            easing:
                'ease-out-cubic'

        });

    }



    /* ======================================================
       SCROLL PROGRESS
    ======================================================= */

    const progress =
        document.getElementById(
            'adcAboutProgress'
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
       BRAND PARALLAX
    ======================================================= */

    const hero =
        document.querySelector(
            '.adc-about-hero'
        );


    const profile =
        document.getElementById(
            'adcAboutProfileStage'
        );


    if (
        hero
        && profile
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
                    / 42;


                const y =
                    (
                        event.clientY
                        - rect.top
                        - rect.height / 2
                    )
                    / 42;


                profile.style.transform =
                    `translate(${x}px, ${y}px)`;

            }
        );


        hero.addEventListener(
            'mouseleave',
            function () {

                profile.style.transform =
                    'translate(0, 0)';

            }
        );

    }

})();

</script>


<?php

/* ==========================================================
   FOOTER
========================================================== */

try {

    require_once __DIR__
        . '/includes/footer.php';

} catch (Throwable $e) {

    error_log(
        'Failed to load footer.php: '
        . $e->getMessage()
    );

}

?>