<?php

/* ==========================================================
   ALEXDEVCODE
   SERVIÇOS

   Função desta página:
   - explicar o que pode ser contratado
   - mostrar para que tipo de necessidade cada serviço serve
   - explicar como o trabalho acontece
   - mostrar o que normalmente faz parte da entrega
   - encaminhar para contacto

   PT/EN/ES centralizados via includes/i18n.php.
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
   HELPER
========================================================== */

if (!function_exists('h')) {

    function h($value): string
    {
        return htmlspecialchars(
            (string) $value,
            ENT_QUOTES,
            'UTF-8'
        );
    }

}


/* ==========================================================
   URLS
========================================================== */

$projectsUrl =
    adc_url('projetos.php');

$contactUrl =
    adc_url('contato.php?utm_source=website&utm_medium=organic&utm_campaign=services');


/* ==========================================================
   SERVIÇOS
========================================================== */

$services = [

    [
        'number' => '01',
        'icon' => 'fa-window-maximize',
        'title' => t('services.items.1.title'),
        'for' => t('services.items.1.for'),
        'text' => t('services.items.1.text'),
        'items' => [
            t('services.items.1.item1'),
            t('services.items.1.item2'),
            t('services.items.1.item3'),
            t('services.items.1.item4'),
        ],
    ],

    [
        'number' => '02',
        'icon' => 'fa-bullseye',
        'title' => t('services.items.2.title'),
        'for' => t('services.items.2.for'),
        'text' => t('services.items.2.text'),
        'items' => [
            t('services.items.2.item1'),
            t('services.items.2.item2'),
            t('services.items.2.item3'),
            t('services.items.2.item4'),
        ],
    ],

    [
        'number' => '03',
        'icon' => 'fa-table-columns',
        'title' => t('services.items.3.title'),
        'for' => t('services.items.3.for'),
        'text' => t('services.items.3.text'),
        'items' => [
            t('services.items.3.item1'),
            t('services.items.3.item2'),
            t('services.items.3.item3'),
            t('services.items.3.item4'),
        ],
    ],

    [
        'number' => '04',
        'icon' => 'fa-screwdriver-wrench',
        'title' => t('services.items.4.title'),
        'for' => t('services.items.4.for'),
        'text' => t('services.items.4.text'),
        'items' => [
            t('services.items.4.item1'),
            t('services.items.4.item2'),
            t('services.items.4.item3'),
            t('services.items.4.item4'),
        ],
    ],

    [
        'number' => '05',
        'icon' => 'fa-gears',
        'title' => t('services.items.5.title'),
        'for' => t('services.items.5.for'),
        'text' => t('services.items.5.text'),
        'items' => [t('services.items.5.item1'), t('services.items.5.item2'), t('services.items.5.item3'), t('services.items.5.item4')],
    ],

];


/* ==========================================================
   NECESSIDADES
========================================================== */

$needs = [

    [
        'letter' => 'A',
        'title' => t('services.needs.item1_title'),
        'text' => t('services.needs.item1_text'),
    ],

    [
        'letter' => 'B',
        'title' => t('services.needs.item2_title'),
        'text' => t('services.needs.item2_text'),
    ],

    [
        'letter' => 'C',
        'title' => t('services.needs.item3_title'),
        'text' => t('services.needs.item3_text'),
    ],

];


/* ==========================================================
   PROCESSO
========================================================== */

$process = [

    [
        'step' => '01',
        'title' => t('services.process.step1_title'),
        'text' => t('services.process.step1_text'),
    ],

    [
        'step' => '02',
        'title' => t('services.process.step2_title'),
        'text' => t('services.process.step2_text'),
    ],

    [
        'step' => '03',
        'title' => t('services.process.step3_title'),
        'text' => t('services.process.step3_text'),
    ],

    [
        'step' => '04',
        'title' => t('services.process.step4_title'),
        'text' => t('services.process.step4_text'),
    ],

    [
        'step' => '05',
        'title' => t('services.process.step5_title'),
        'text' => t('services.process.step5_text'),
    ],

];


/* ==========================================================
   O QUE PODE ENTRAR
========================================================== */

$included = [

    [
        'icon' => 'fa-mobile-screen-button',
        'title' => t('services.included.item1_title'),
        'text' => t('services.included.item1_text'),
    ],

    [
        'icon' => 'fa-universal-access',
        'title' => t('services.included.item2_title'),
        'text' => t('services.included.item2_text'),
    ],

    [
        'icon' => 'fa-code',
        'title' => t('services.included.item3_title'),
        'text' => t('services.included.item3_text'),
    ],

    [
        'icon' => 'fa-database',
        'title' => t('services.included.item4_title'),
        'text' => t('services.included.item4_text'),
    ],

    [
        'icon' => 'fa-shield-halved',
        'title' => t('services.included.item5_title'),
        'text' => t('services.included.item5_text'),
    ],

    [
        'icon' => 'fa-cloud-arrow-up',
        'title' => t('services.included.item6_title'),
        'text' => t('services.included.item6_text'),
    ],

];


/* ==========================================================
   EXEMPLOS
========================================================== */

$proof = [

    [
        'title' => 'HouseFlow',
        'type' => t('services.proof.item1_type'),
        'text' => t('services.proof.item1_text'),
    ],

    [
        'title' => 'TimeClock',
        'type' => t('services.proof.item2_type'),
        'text' => t('services.proof.item2_text'),
    ],

    [
        'title' => 'DemoFirst',
        'type' => t('services.proof.item3_type'),
        'text' => t('services.proof.item3_text'),
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
   SERVIÇOS
========================================================== */

.adc-services {

    --s-dark:
        #141414;

    --s-accent:
        #8b735d;

    --s-accent-dk:
        #715d4b;

    --s-accent-lt:
        #c6b8a9;

    --s-bg:
        #d7d9dd;

    --s-card:
        #ffffff;

    --s-soft:
        #f7f4f0;

    --s-text:
        #302f2e;

    --s-muted:
        #5f5a55;

    --s-border:
        rgba(20, 20, 20, .10);

    --s-shadow:
        0 9px 28px
        rgba(20, 20, 20, .10);

    --s-shadow-strong:
        0 20px 55px
        rgba(20, 20, 20, .18);


    position:
        relative;


    overflow:
        hidden;


    color:
        var(--s-text);


    background:

        radial-gradient(
            circle at 3% 0%,
            rgba(139, 115, 93, .15),
            transparent 28rem
        ),

        radial-gradient(
            circle at 98% 45%,
            rgba(20, 20, 20, .07),
            transparent 31rem
        ),

        var(--s-bg);

}


body[data-tema="escuro"]
.adc-services {

    --s-bg:
        #171717;

    --s-card:
        #202020;

    --s-soft:
        #262322;

    --s-text:
        #ebe6e0;

    --s-muted:
        #b8b1aa;

    --s-border:
        rgba(255, 255, 255, .10);

    --s-shadow:
        0 9px 28px
        rgba(0, 0, 0, .26);

    --s-shadow-strong:
        0 20px 55px
        rgba(0, 0, 0, .36);

}


.adc-services *,
.adc-services *::before,
.adc-services *::after {

    box-sizing:
        border-box;

}


.adc-services-container {

    width:
        min(
            calc(100% - 2rem),
            1180px
        );


    margin:
        0 auto;

}


.adc-services-section {

    padding:
        4.8rem 0;

}



/* ==========================================================
   TÍTULOS
========================================================== */

.adc-services-kicker {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .5rem;


    color:
        var(--s-accent-dk);


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
.adc-services-kicker {

    color:
        var(--s-accent-lt);

}


.adc-services-kicker::before {

    content:
        "";


    width:
        22px;


    height:
        2px;


    border-radius:
        999px;


    background:
        var(--s-accent);

}


.adc-services-heading {

    max-width:
        820px;


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
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-heading {

    color:
        #fff;

}


.adc-services-intro {

    max-width:
        680px;


    margin:
        .85rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .86rem;


    line-height:
        1.7;

}



/* ==========================================================
   BOTÕES
========================================================== */

.adc-services-btn {

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


.adc-services-btn:hover {

    transform:
        translateY(-3px);

}


.adc-services-btn-primary {

    background:
        var(--s-dark);


    color:
        #fff;

}


.adc-services-btn-primary:hover {

    background:
        var(--s-accent);

}


.adc-services-btn-secondary {

    border-color:
        rgba(139, 115, 93, .24);


    background:
        rgba(139, 115, 93, .08);


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-btn-secondary {

    color:
        #fff;

}


.adc-services-btn-secondary:hover {

    background:
        rgba(139, 115, 93, .18);

}



/* ==========================================================
   PROGRESSO
========================================================== */

.adc-services-progress {

    position:
        fixed;


    left:
        0;


    top:
        0;


    z-index:
        9999;


    width:
        0;


    height:
        3px;


    background:
        var(--s-accent);


    box-shadow:
        0 0 12px
        rgba(139, 115, 93, .65);


    pointer-events:
        none;

}



/* ==========================================================
   HERO — DIFERENTE DA HOME
========================================================== */

.adc-services-hero-wrap {

    padding:
        3.8rem 0 1rem;

}


.adc-services-hero {

    position:
        relative;


    overflow:
        hidden;


    border-top:
        1px solid
        var(--s-border);


    border-bottom:
        1px solid
        var(--s-border);


    padding:
        2.4rem 0;

}


.adc-services-hero::before {

    content:
        "SERVICES";


    position:
        absolute;


    right:
        -1rem;


    top:
        -4.3rem;


    color:
        rgba(139, 115, 93, .055);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            7rem,
            22vw,
            17rem
        );


    line-height:
        1;


    font-weight:
        700;


    pointer-events:
        none;

}


.adc-services-hero-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    gap:
        2.2rem;


    align-items:
        center;

}


.adc-services-hero h1 {

    max-width:
        790px;


    margin:
        .7rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.8rem,
            10vw,
            5.6rem
        );


    line-height:
        .9;


    letter-spacing:
        -.05em;


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-hero h1 {

    color:
        #fff;

}


.adc-services-hero h1 span {

    color:
        var(--s-accent);

}


.adc-services-hero-copy > p {

    max-width:
        630px;


    margin:
        1rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .86rem;


    line-height:
        1.7;

}


.adc-services-hero-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .55rem;


    margin-top:
        1.1rem;

}



/* ==========================================================
   MAPA VISUAL DO SERVIÇO
========================================================== */

.adc-services-map {

    position:
        relative;


    min-height:
        300px;


    display:
        flex;


    align-items:
        center;


    justify-content:
        center;


    transition:
        transform .18s ease-out;

}


.adc-services-map-line {

    position:
        absolute;


    left:
        50%;


    top:
        32px;


    bottom:
        32px;


    width:
        2px;


    transform:
        translateX(-50%);


    background:
        rgba(139, 115, 93, .18);


    overflow:
        hidden;

}


.adc-services-map-line::after {

    content:
        "";


    position:
        absolute;


    left:
        0;


    top:
        -35%;


    width:
        100%;


    height:
        35%;


    background:
        var(--s-accent);


    animation:
        adcServiceFlow
        3.2s
        ease-in-out
        infinite;

}


.adc-services-map-list {

    position:
        relative;


    z-index:
        2;


    width:
        min(
            100%,
            330px
        );


    display:
        grid;


    gap:
        .65rem;

}


.adc-services-map-item {

    display:
        grid;


    grid-template-columns:
        38px minmax(0, 1fr);


    gap:
        .7rem;


    align-items:
        center;


    padding:
        .75rem;


    border:
        1px solid
        var(--s-border);


    border-radius:
        13px;


    background:
        var(--s-card);


    box-shadow:
        var(--s-shadow);


    animation:
        adcServiceMapFloat
        4.6s
        ease-in-out
        infinite;

}


.adc-services-map-item:nth-child(2) {

    animation-delay:
        .6s;

}


.adc-services-map-item:nth-child(3) {

    animation-delay:
        1.2s;

}


.adc-services-map-item:nth-child(4) {

    animation-delay:
        1.8s;

}


.adc-services-map-node {

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
        50%;


    background:
        var(--s-dark);


    color:
        #fff;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .65rem;

}


.adc-services-map-item strong {

    display:
        block;


    font-family:
        'Oswald',
        sans-serif;


    color:
        var(--s-dark);


    font-size:
        1rem;

}


body[data-tema="escuro"]
.adc-services-map-item strong {

    color:
        #fff;

}


.adc-services-map-item span {

    display:
        block;


    margin-top:
        .1rem;


    color:
        var(--s-muted);


    font-size:
        .62rem;

}



/* ==========================================================
   LISTA DOS SERVIÇOS
========================================================== */

.adc-services-list {

    margin-top:
        1.8rem;


    border-top:
        1px solid
        var(--s-border);

}


.adc-services-row {

    position:
        relative;


    overflow:
        hidden;


    padding:
        1.3rem .1rem;


    border-bottom:
        1px solid
        var(--s-border);


    transition:
        padding .25s ease;

}


.adc-services-row::before {

    content:
        "";


    position:
        absolute;


    inset:
        0 auto 0 0;


    width:
        0;


    background:
        rgba(139, 115, 93, .065);


    transition:
        width .35s ease;

}


.adc-services-row:hover::before {

    width:
        100%;

}


.adc-services-row:hover {

    padding-left:
        .65rem;


    padding-right:
        .65rem;

}


.adc-services-row-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    grid-template-columns:
        42px minmax(0, 1fr);


    gap:
        .8rem;


    align-items:
        start;

}


.adc-services-row-number {

    padding-top:
        .2rem;


    color:
        var(--s-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .7rem;

}


.adc-services-row-icon {

    width:
        38px;


    height:
        38px;


    margin-bottom:
        .65rem;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        10px;


    background:
        var(--s-dark);


    color:
        #fff;


    transition:
        transform .25s ease,
        background .25s ease;

}


.adc-services-row:hover
.adc-services-row-icon {

    transform:
        rotate(-5deg);


    background:
        var(--s-accent);

}


.adc-services-row h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.45rem,
            5vw,
            2rem
        );


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-row h3 {

    color:
        #fff;

}


.adc-services-row-for {

    margin:
        .25rem 0 0;


    color:
        var(--s-accent-dk);


    font-size:
        .7rem;


    font-weight:
        700;

}


body[data-tema="escuro"]
.adc-services-row-for {

    color:
        var(--s-accent-lt);

}


.adc-services-row-details {

    grid-column:
        2;

}


.adc-services-row-text {

    max-width:
        720px;


    margin:
        .45rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .73rem;


    line-height:
        1.6;

}


.adc-services-row-items {

    display:
        flex;


    flex-wrap:
        wrap;


    gap:
        .35rem;


    margin-top:
        .65rem;

}


.adc-services-row-items span {

    padding:
        .25rem .45rem;


    border:
        1px solid
        rgba(139, 115, 93, .18);


    border-radius:
        999px;


    color:
        var(--s-muted);


    font-size:
        .56rem;


    font-weight:
        600;

}



/* ==========================================================
   NECESSIDADES
========================================================== */

.adc-services-needs {

    position:
        relative;


    overflow:
        hidden;


    background:
        var(--s-dark);


    color:
        #fff;

}


.adc-services-needs::before {

    content:
        "?";


    position:
        absolute;


    right:
        3%;


    top:
        -5rem;


    color:
        rgba(255, 255, 255, .025);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        20rem;


    line-height:
        1;


    pointer-events:
        none;

}


.adc-services-needs
.adc-services-kicker {

    color:
        var(--s-accent-lt);

}


.adc-services-needs
.adc-services-heading {

    color:
        #fff;

}


.adc-services-needs
.adc-services-intro {

    color:
        #aaa39c;

}


.adc-services-needs-list {

    position:
        relative;


    z-index:
        2;


    margin-top:
        1.8rem;


    border-top:
        1px solid
        rgba(255, 255, 255, .10);

}


.adc-services-need {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        42px minmax(0, 1fr);


    gap:
        .8rem;


    padding:
        1.2rem 0;


    border-bottom:
        1px solid
        rgba(255, 255, 255, .10);


    overflow:
        hidden;


    transition:
        padding .24s ease;

}


.adc-services-need::before {

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
            transparent
        );


    transition:
        transform .34s ease;

}


.adc-services-need:hover::before {

    transform:
        scaleX(1);

}


.adc-services-need:hover {

    padding-left:
        .65rem;


    padding-right:
        .65rem;

}


.adc-services-need-letter,
.adc-services-need-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-services-need-letter {

    color:
        var(--s-accent-lt);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .8rem;

}


.adc-services-need h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.3rem,
            5vw,
            1.85rem
        );


    color:
        #fff;

}


.adc-services-need p {

    max-width:
        720px;


    margin:
        .3rem 0 0;


    color:
        #aaa39c;


    font-size:
        .7rem;


    line-height:
        1.55;

}



/* ==========================================================
   PROCESSO
========================================================== */

.adc-services-process-wrap {

    position:
        relative;


    margin-top:
        1.8rem;

}


.adc-services-process-line {

    display:
        none;

}


.adc-services-process {

    display:
        grid;


    gap:
        .75rem;

}


.adc-services-process-step {

    display:
        grid;


    grid-template-columns:
        42px minmax(0, 1fr);


    gap:
        .8rem;


    padding:
        .9rem;


    border:
        1px solid
        var(--s-border);


    border-radius:
        14px;


    background:
        var(--s-card);


    transition:
        transform .22s ease,
        box-shadow .22s ease;

}


.adc-services-process-step:hover {

    transform:
        translateY(-4px);


    box-shadow:
        var(--s-shadow);

}


.adc-services-process-node {

    width:
        42px;


    height:
        42px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        50%;


    background:
        var(--s-dark);


    color:
        #fff;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .7rem;


    box-shadow:
        0 0 0 5px
        rgba(139, 115, 93, .10);

}


.adc-services-process-step h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.05rem;


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-process-step h3 {

    color:
        #fff;

}


.adc-services-process-step p {

    margin:
        .25rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .68rem;


    line-height:
        1.5;

}



/* ==========================================================
   O QUE ENTRA
========================================================== */

.adc-services-included {

    background:
        rgba(255, 255, 255, .20);

}


body[data-tema="escuro"]
.adc-services-included {

    background:
        rgba(255, 255, 255, .015);

}


.adc-services-included-list {

    display:
        grid;


    margin-top:
        1.7rem;


    border-top:
        1px solid
        var(--s-border);

}


.adc-services-included-item {

    display:
        grid;


    grid-template-columns:
        40px minmax(0, 1fr);


    gap:
        .7rem;


    padding:
        .95rem .1rem;


    border-bottom:
        1px solid
        var(--s-border);


    transition:
        padding .22s ease,
        background .22s ease;

}


.adc-services-included-item:hover {

    padding-left:
        .5rem;


    padding-right:
        .5rem;


    background:
        rgba(139, 115, 93, .05);

}


.adc-services-included-icon {

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
        var(--s-accent);

}


.adc-services-included-item h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.03rem;


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-included-item h3 {

    color:
        #fff;

}


.adc-services-included-item p {

    margin:
        .2rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .66rem;


    line-height:
        1.5;

}



/* ==========================================================
   PROVAS
========================================================== */

.adc-services-proof-list {

    margin-top:
        1.7rem;


    border-top:
        1px solid
        var(--s-border);

}


.adc-services-proof-row {

    display:
        grid;


    grid-template-columns:
        minmax(0, 1fr) 24px;


    gap:
        .7rem;


    align-items:
        center;


    padding:
        1rem .1rem;


    border-bottom:
        1px solid
        var(--s-border);

}


.adc-services-proof-row small {

    color:
        var(--s-accent);


    font-size:
        .58rem;


    font-weight:
        700;


    letter-spacing:
        .08em;


    text-transform:
        uppercase;

}


.adc-services-proof-row h3 {

    margin:
        .15rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.3rem;


    color:
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-proof-row h3 {

    color:
        #fff;

}


.adc-services-proof-row p {

    max-width:
        700px;


    margin:
        .25rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .68rem;


    line-height:
        1.5;

}


.adc-services-proof-row i {

    color:
        var(--s-accent);

}



/* ==========================================================
   CTA
========================================================== */

.adc-services-cta {

    padding:
        1rem 0 5rem;

}


.adc-services-cta-line {

    position:
        relative;


    padding:
        2.6rem 0;


    border-top:
        2px solid
        var(--s-dark);


    border-bottom:
        2px solid
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-cta-line {

    border-color:
        rgba(255, 255, 255, .85);

}


.adc-services-cta-line::after {

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
        adcServicesArrow
        3s
        ease-in-out
        infinite;

}


.adc-services-cta-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-services-cta-copy h2 {

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
        var(--s-dark);

}


body[data-tema="escuro"]
.adc-services-cta-copy h2 {

    color:
        #fff;

}


.adc-services-cta-copy p {

    max-width:
        620px;


    margin:
        .65rem 0 0;


    color:
        var(--s-muted);


    font-size:
        .74rem;


    line-height:
        1.6;

}


.adc-services-cta-actions {

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

@keyframes adcServiceFlow {

    0% {

        top:
            -35%;

    }


    100% {

        top:
            100%;

    }

}


@keyframes adcServiceMapFloat {

    0%,
    100% {

        transform:
            translateY(0);

    }


    50% {

        transform:
            translateY(-6px);

    }

}


@keyframes adcServicesArrow {

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

    .adc-services-hero-actions,
    .adc-services-cta-actions {

        flex-direction:
            row;


        flex-wrap:
            wrap;

    }


    .adc-services-included-list {

        grid-template-columns:
            repeat(
                2,
                minmax(0, 1fr)
            );

    }


    .adc-services-included-item:nth-child(even) {

        padding-left:
            1rem;


        border-left:
            1px solid
            var(--s-border);

    }


    .adc-services-included-item:nth-child(odd) {

        padding-right:
            1rem;

    }

}



/* ==========================================================
   DESKTOP
========================================================== */

@media (min-width: 920px) {

    .adc-services-section {

        padding:
            5.5rem 0;

    }


    .adc-services-hero-grid {

        grid-template-columns:
            minmax(0, 1.2fr)
            minmax(320px, .8fr);


        gap:
            4rem;

    }


    .adc-services-map {

        min-height:
            350px;

    }


    .adc-services-row-grid {

        grid-template-columns:
            55px
            minmax(260px, .7fr)
            minmax(0, 1.3fr);


        align-items:
            start;


        gap:
            1.3rem;

    }


    .adc-services-row-head {

        grid-column:
            2;

    }


    .adc-services-row-details {

        grid-column:
            3;

    }


    .adc-services-row-icon {

        margin-bottom:
            .75rem;

    }


    .adc-services-need {

        grid-template-columns:
            50px
            minmax(0, 1fr);

    }


    .adc-services-process-line {

        display:
            block;


        position:
            absolute;


        left:
            7%;


        right:
            7%;


        top:
            34px;


        height:
            2px;


        background:
            linear-gradient(
                90deg,
                rgba(139, 115, 93, .10),
                var(--s-accent),
                rgba(139, 115, 93, .10)
            );


        background-size:
            180% 100%;


        animation:
            adcServicesProcessLine
            4s
            linear
            infinite;

    }


    .adc-services-process {

        grid-template-columns:
            repeat(
                5,
                minmax(0, 1fr)
            );


        gap:
            .6rem;

    }


    .adc-services-process-step {

        position:
            relative;


        z-index:
            2;


        grid-template-columns:
            1fr;


        padding:
            .75rem;


        border-color:
            transparent;


        background:
            transparent;


        box-shadow:
            none;


        text-align:
            center;

    }


    .adc-services-process-step:hover {

        background:
            var(--s-card);

    }


    .adc-services-process-node {

        margin:
            0 auto .35rem;

    }


    @keyframes adcServicesProcessLine {

        from {

            background-position:
                180% 0;

        }


        to {

            background-position:
                -180% 0;

        }

    }

}



/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 639px) {

    .adc-services-hero-wrap {

        padding-top:
            2rem;

    }


    .adc-services-hero h1 {

        font-size:
            3rem;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-services *,
    .adc-services *::before,
    .adc-services *::after {

        animation:
            none !important;


        transition:
            none !important;


        scroll-behavior:
            auto !important;

    }

}

</style>


<div
    class="adc-services-progress"
    id="adcServicesProgress"
    aria-hidden="true"
></div>


<main class="adc-services">


    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="adc-services-hero-wrap">

        <div class="adc-services-container">


            <div class="adc-services-hero">

                <div class="adc-services-hero-grid">


                    <!-- TEXTO -->

                    <div
                        class="adc-services-hero-copy"
                        data-aos="fade-right"
                    >

                        <span class="adc-services-kicker">
                            <?= h(t('services.hero.kicker')) ?>
                        </span>


                        <h1>

                            <?= h(t('services.hero.title_before')) ?>

                            <span>
                                <?= h(t('services.hero.title_highlight')) ?>
                            </span>

                        </h1>


                        <p>

                            <?= h(t('services.hero.text')) ?>

                        </p>


                        <div class="adc-services-hero-actions">

                            <a
                                href="<?= h($contactUrl) ?>"
                                class="
                                    adc-services-btn
                                    adc-services-btn-primary
                                "
                            >

                                <i
                                    class="fas fa-paper-plane"
                                    aria-hidden="true"
                                ></i>

                                <?= h(t('services.hero.primary_cta')) ?>

                            </a>


                            <a
                                href="#tipos-servico"
                                class="
                                    adc-services-btn
                                    adc-services-btn-secondary
                                "
                            >

                                <i
                                    class="fas fa-arrow-down"
                                    aria-hidden="true"
                                ></i>

                                <?= h(t('services.hero.secondary_cta')) ?>

                            </a>

                        </div>

                    </div>



                    <!-- FLUXO -->

                    <div
                        class="adc-services-map"
                        id="adcServicesMap"
                        data-aos="fade-left"
                    >

                        <div
                            class="adc-services-map-line"
                            aria-hidden="true"
                        ></div>


                        <div class="adc-services-map-list">


                            <div class="adc-services-map-item">

                                <span class="adc-services-map-node">
                                    01
                                </span>


                                <div>

                                    <strong>
                                        <?= h(t('services.map.item1_title')) ?>
                                    </strong>

                                    <span>
                                        <?= h(t('services.map.item1_text')) ?>
                                    </span>

                                </div>

                            </div>



                            <div class="adc-services-map-item">

                                <span class="adc-services-map-node">
                                    02
                                </span>


                                <div>

                                    <strong>
                                        <?= h(t('services.map.item2_title')) ?>
                                    </strong>

                                    <span>
                                        <?= h(t('services.map.item2_text')) ?>
                                    </span>

                                </div>

                            </div>



                            <div class="adc-services-map-item">

                                <span class="adc-services-map-node">
                                    03
                                </span>


                                <div>

                                    <strong>
                                        <?= h(t('services.map.item3_title')) ?>
                                    </strong>

                                    <span>
                                        <?= h(t('services.map.item3_text')) ?>
                                    </span>

                                </div>

                            </div>



                            <div class="adc-services-map-item">

                                <span class="adc-services-map-node">
                                    04
                                </span>


                                <div>

                                    <strong>
                                        <?= h(t('services.map.item4_title')) ?>
                                    </strong>

                                    <span>
                                        <?= h(t('services.map.item4_text')) ?>
                                    </span>

                                </div>

                            </div>


                        </div>

                    </div>


                </div>

            </div>


        </div>

    </section>



    <!-- ======================================================
         SERVIÇOS
    ======================================================= -->

    <section
        class="adc-services-section"
        id="tipos-servico"
    >

        <div class="adc-services-container">


            <span class="adc-services-kicker">
                <?= h(t('services.offer.kicker')) ?>
            </span>


            <h2 class="adc-services-heading">

                <?= h(t('services.offer.title')) ?>

            </h2>


            <p class="adc-services-intro">

                <?= h(t('services.offer.text')) ?>

            </p>


            <div class="adc-services-list">


                <?php foreach ($services as $service): ?>


                    <article
                        class="adc-services-row"
                        data-aos="fade-up"
                    >

                        <div class="adc-services-row-grid">


                            <span class="adc-services-row-number">

                                <?= h($service['number']) ?>

                            </span>



                            <div class="adc-services-row-head">


                                <span
                                    class="adc-services-row-icon"
                                    aria-hidden="true"
                                >

                                    <i
                                        class="fas <?= h($service['icon']) ?>"
                                    ></i>

                                </span>


                                <h3>
                                    <?= h($service['title']) ?>
                                </h3>


                                <p class="adc-services-row-for">
                                    <?= h($service['for']) ?>
                                </p>


                            </div>



                            <div class="adc-services-row-details">


                                <p class="adc-services-row-text">
                                    <?= h($service['text']) ?>
                                </p>


                                <div class="adc-services-row-items">

                                    <?php foreach ($service['items'] as $item): ?>

                                        <span>
                                            <?= h($item) ?>
                                        </span>

                                    <?php endforeach; ?>

                                </div>


                            </div>


                        </div>

                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         NÃO SABE QUAL SERVIÇO
    ======================================================= -->

    <section
        class="
            adc-services-section
            adc-services-needs
        "
    >

        <div class="adc-services-container">


            <span class="adc-services-kicker">
                <?= h(t('services.needs.kicker')) ?>
            </span>


            <h2 class="adc-services-heading">

                <?= h(t('services.needs.title')) ?>

            </h2>


            <p class="adc-services-intro">

                <?= h(t('services.needs.text')) ?>

            </p>


            <div class="adc-services-needs-list">


                <?php foreach ($needs as $need): ?>


                    <article
                        class="adc-services-need"
                        data-aos="fade-up"
                    >

                        <span class="adc-services-need-letter">

                            <?= h($need['letter']) ?>

                        </span>


                        <div class="adc-services-need-copy">


                            <h3>
                                <?= h($need['title']) ?>
                            </h3>


                            <p>
                                <?= h($need['text']) ?>
                            </p>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         PROCESSO
    ======================================================= -->

    <section class="adc-services-section">

        <div class="adc-services-container">


            <span class="adc-services-kicker">
                <?= h(t('services.process.kicker')) ?>
            </span>


            <h2 class="adc-services-heading">

                <?= h(t('services.process.title')) ?>

            </h2>


            <p class="adc-services-intro">

                <?= h(t('services.process.text')) ?>

            </p>


            <div class="adc-services-process-wrap">


                <div
                    class="adc-services-process-line"
                    aria-hidden="true"
                ></div>


                <div class="adc-services-process">


                    <?php foreach ($process as $step): ?>


                        <article
                            class="adc-services-process-step"
                            data-aos="zoom-in"
                        >

                            <span class="adc-services-process-node">

                                <?= h($step['step']) ?>

                            </span>


                            <div>


                                <h3>
                                    <?= h($step['title']) ?>
                                </h3>


                                <p>
                                    <?= h($step['text']) ?>
                                </p>


                            </div>


                        </article>


                    <?php endforeach; ?>


                </div>


            </div>


        </div>

    </section>



    <!-- ======================================================
         O QUE ENTRA
    ======================================================= -->

    <section
        class="
            adc-services-section
            adc-services-included
        "
    >

        <div class="adc-services-container">


            <span class="adc-services-kicker">
                <?= h(t('services.included.kicker')) ?>
            </span>


            <h2 class="adc-services-heading">

                <?= h(t('services.included.title')) ?>

            </h2>


            <p class="adc-services-intro">

                <?= h(t('services.included.text')) ?>

            </p>


            <div class="adc-services-included-list">


                <?php foreach ($included as $item): ?>


                    <article
                        class="adc-services-included-item"
                        data-aos="fade-up"
                    >

                        <span
                            class="adc-services-included-icon"
                            aria-hidden="true"
                        >

                            <i
                                class="fas <?= h($item['icon']) ?>"
                            ></i>

                        </span>


                        <div>


                            <h3>
                                <?= h($item['title']) ?>
                            </h3>


                            <p>
                                <?= h($item['text']) ?>
                            </p>


                        </div>


                    </article>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         EXEMPLOS
    ======================================================= -->

    <section class="adc-services-section">

        <div class="adc-services-container">


            <span class="adc-services-kicker">
                <?= h(t('services.proof.kicker')) ?>
            </span>


            <h2 class="adc-services-heading">

                <?= h(t('services.proof.title')) ?>

            </h2>


            <p class="adc-services-intro">

                <?= h(t('services.proof.text')) ?>

            </p>


            <div class="adc-services-proof-list">


                <?php foreach ($proof as $item): ?>


                    <div
                        class="adc-services-proof-row"
                        data-aos="fade-up"
                    >

                        <div>


                            <small>
                                <?= h($item['type']) ?>
                            </small>


                            <h3>
                                <?= h($item['title']) ?>
                            </h3>


                            <p>
                                <?= h($item['text']) ?>
                            </p>


                        </div>


                        <i
                            class="fas fa-arrow-right"
                            aria-hidden="true"
                        ></i>


                    </div>


                <?php endforeach; ?>


            </div>


            <div style="margin-top:1.2rem">


                <a
                    href="<?= h($projectsUrl) ?>"
                    class="
                        adc-services-btn
                        adc-services-btn-secondary
                    "
                >

                    <i
                        class="fas fa-folder-open"
                        aria-hidden="true"
                    ></i>

                    <?= h(t('services.proof.cta')) ?>

                </a>


            </div>


        </div>

    </section>



    <!-- ======================================================
         SERVIÇOS EM DESTAQUE
    ======================================================= -->

    <?php
    $seoLandingCopy = [
        'pt' => [
            'kicker' => 'Serviços em destaque',
            'title' => 'Escolha o ponto de entrada mais próximo do que precisa',
            'text' => 'Cada serviço parte de um problema real e leva a uma página com mais contexto, exemplos e forma de trabalho.',
            'cards' => [
                [
                    'file' => 'criacao-sites-gaia.php',
                    'icon' => 'fa-globe',
                    'eyebrow' => 'Presença digital',
                    'title' => 'Criação de sites em Gaia',
                    'text' => 'Sites profissionais, mobile-first e preparados para SEO local, contacto e crescimento.',
                    'cta' => 'Conhecer este serviço',
                ],
                [
                    'file' => 'programador-freelancer-porto.php',
                    'icon' => 'fa-code',
                    'eyebrow' => 'Desenvolvimento direto',
                    'title' => 'Programador freelancer no Porto',
                    'text' => 'Websites, sistemas, APIs, dashboards e integrações com contacto direto durante o projeto.',
                    'cta' => 'Ver como posso ajudar',
                ],
                [
                    'file' => 'sistemas-personalizados.php',
                    'icon' => 'fa-gears',
                    'eyebrow' => 'Processos e automação',
                    'title' => 'Sistemas personalizados',
                    'text' => 'Soluções web para organizar processos, reduzir trabalho manual e ligar ferramentas.',
                    'cta' => 'Explorar esta solução',
                ],
                [
                    'file' => 'auditoria-express.php',
                    'icon' => 'fa-magnifying-glass-chart',
                    'eyebrow' => 'Entrada rápida · desde 19 €',
                    'title' => 'Auditoria Express',
                    'text' => 'Descubra problemas de SEO, UX, performance e conversão antes de investir num projeto maior.',
                    'cta' => 'Analisar o meu site',
                ],
            ],
        ],
        'en' => [
            'kicker' => 'Featured services',
            'title' => 'Choose the starting point closest to what you need',
            'text' => 'Each service starts from a real problem and leads to a focused page with more context, examples and approach.',
            'cards' => [
                ['file'=>'criacao-sites-gaia.php','icon'=>'fa-globe','eyebrow'=>'Digital presence','title'=>'Website development in Gaia','text'=>'Professional mobile-first websites prepared for local SEO, enquiries and growth.','cta'=>'Explore this service'],
                ['file'=>'programador-freelancer-porto.php','icon'=>'fa-code','eyebrow'=>'Direct development','title'=>'Freelance web developer in Porto','text'=>'Websites, systems, APIs, dashboards and integrations with direct technical contact.','cta'=>'See how I can help'],
                ['file'=>'sistemas-personalizados.php','icon'=>'fa-gears','eyebrow'=>'Processes & automation','title'=>'Custom web systems','text'=>'Web solutions to organize processes, reduce manual work and connect tools.','cta'=>'Explore this solution'],
                ['file'=>'auditoria-express.php','icon'=>'fa-magnifying-glass-chart','eyebrow'=>'Quick entry · from €19','title'=>'Express Website Audit','text'=>'Find SEO, UX, performance and conversion issues before committing to a larger project.','cta'=>'Audit my website'],
            ],
        ],
        'es' => [
            'kicker' => 'Servicios destacados',
            'title' => 'Elige el punto de entrada más cercano a lo que necesitas',
            'text' => 'Cada servicio parte de un problema real y lleva a una página con más contexto, ejemplos y forma de trabajo.',
            'cards' => [
                ['file'=>'criacao-sites-gaia.php','icon'=>'fa-globe','eyebrow'=>'Presencia digital','title'=>'Creación de sitios web en Gaia','text'=>'Webs profesionales mobile-first preparadas para SEO local, contactos y crecimiento.','cta'=>'Conocer este servicio'],
                ['file'=>'programador-freelancer-porto.php','icon'=>'fa-code','eyebrow'=>'Desarrollo directo','title'=>'Programador web freelance en Porto','text'=>'Webs, sistemas, APIs, dashboards e integraciones con contacto técnico directo.','cta'=>'Ver cómo puedo ayudar'],
                ['file'=>'sistemas-personalizados.php','icon'=>'fa-gears','eyebrow'=>'Procesos y automatización','title'=>'Sistemas web personalizados','text'=>'Soluciones para organizar procesos, reducir trabajo manual y conectar herramientas.','cta'=>'Explorar esta solución'],
                ['file'=>'auditoria-express.php','icon'=>'fa-magnifying-glass-chart','eyebrow'=>'Entrada rápida · desde 19 €','title'=>'Auditoría Express','text'=>'Detecta problemas de SEO, UX, rendimiento y conversión antes de invertir en un proyecto mayor.','cta'=>'Analizar mi sitio'],
            ],
        ],
    ];

    $seoLandingCurrent =
        $seoLandingCopy[adc_lang()]
        ?? $seoLandingCopy['pt'];
    ?>

    <style>
        .adc-services-featured-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: 1.4rem;
        }

        .adc-services-featured-card {
            display: flex;
            flex-direction: column;
            min-height: 100%;
            padding: 1.15rem;
            text-decoration: none;
            color: var(--s-text);
            background: var(--s-card);
            border: 1px solid var(--s-border);
            border-radius: 16px;
            box-shadow: var(--s-shadow);
            transition: transform .22s ease, box-shadow .22s ease, border-color .22s ease;
        }

        .adc-services-featured-card:hover {
            transform: translateY(-4px);
            border-color: rgba(139,115,93,.42);
            box-shadow: 0 16px 34px rgba(0,0,0,.10);
        }

        .adc-services-featured-icon {
            width: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: .85rem;
            background: var(--s-dark);
            color: #fff;
        }

        .adc-services-featured-eyebrow {
            display: block;
            margin-bottom: .3rem;
            color: var(--s-accent);
            font-size: .72rem;
            font-weight: 800;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        .adc-services-featured-card h3 {
            margin: 0 0 .45rem;
            color: var(--s-dark);
            font-family: 'Oswald', sans-serif;
            font-size: 1.2rem;
            line-height: 1.2;
        }

        body[data-tema="escuro"] .adc-services-featured-card h3 {
            color: #fff;
        }

        .adc-services-featured-card p {
            margin: 0;
            color: var(--s-muted);
            font-size: .86rem;
            line-height: 1.6;
        }

        .adc-services-featured-cta {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            margin-top: auto;
            padding-top: 1rem;
            color: var(--s-dark);
            font-size: .8rem;
            font-weight: 800;
        }

        body[data-tema="escuro"] .adc-services-featured-cta {
            color: #fff;
        }

        .adc-services-featured-cta i {
            color: var(--s-accent);
            transition: transform .22s ease;
        }

        .adc-services-featured-card:hover .adc-services-featured-cta i {
            transform: translateX(4px);
        }

        @media (min-width: 760px) {
            .adc-services-featured-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1100px) {
            .adc-services-featured-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }
    </style>

    <section class="adc-services-section">

        <div class="adc-services-container">

            <div class="adc-services-section-head">

                <span class="adc-services-kicker">
                    <?= h($seoLandingCurrent['kicker']) ?>
                </span>

                <h2>
                    <?= h($seoLandingCurrent['title']) ?>
                </h2>

                <p>
                    <?= h($seoLandingCurrent['text']) ?>
                </p>

            </div>

            <div class="adc-services-featured-grid">

                <?php foreach ($seoLandingCurrent['cards'] as $seoCard): ?>

                    <a
                        href="<?= h(adc_url($seoCard['file'])) ?>"
                        class="adc-services-featured-card"
                    >

                        <span class="adc-services-featured-icon">
                            <i
                                class="fas <?= h($seoCard['icon']) ?>"
                                aria-hidden="true"
                            ></i>
                        </span>

                        <span class="adc-services-featured-eyebrow">
                            <?= h($seoCard['eyebrow']) ?>
                        </span>

                        <h3>
                            <?= h($seoCard['title']) ?>
                        </h3>

                        <p>
                            <?= h($seoCard['text']) ?>
                        </p>

                        <span class="adc-services-featured-cta">
                            <?= h($seoCard['cta']) ?>
                            <i
                                class="fas fa-arrow-right"
                                aria-hidden="true"
                            ></i>
                        </span>

                    </a>

                <?php endforeach; ?>

            </div>

        </div>

    </section>


    <!-- ======================================================
         CTA
    ======================================================= -->

    <section class="adc-services-cta">

        <div class="adc-services-container">


            <div
                class="adc-services-cta-line"
                data-aos="fade-up"
            >

                <div class="adc-services-cta-copy">


                    <span class="adc-services-kicker">
                        <?= h(t('services.final.kicker')) ?>
                    </span>


                    <h2>

                        <?= h(t('services.final.title')) ?>

                    </h2>


                    <p>

                        <?= h(t('services.final.text')) ?>

                    </p>


                    <div class="adc-services-cta-actions">


                        <a
                            href="<?= h($contactUrl) ?>"
                            class="
                                adc-services-btn
                                adc-services-btn-primary
                            "
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= h(t('services.final.primary_cta')) ?>

                        </a>


                        <a
                            href="<?= h($projectsUrl) ?>"
                            class="
                                adc-services-btn
                                adc-services-btn-secondary
                            "
                        >

                            <i
                                class="fas fa-folder-open"
                                aria-hidden="true"
                            ></i>

                            <?= h(t('services.final.secondary_cta')) ?>

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
       BARRA DE PROGRESSO
    ======================================================= */

    const progress =
        document.getElementById(
            'adcServicesProgress'
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
       MOVIMENTO DO FLUXO NO HERO
    ======================================================= */

    const hero =
        document.querySelector(
            '.adc-services-hero'
        );


    const map =
        document.getElementById(
            'adcServicesMap'
        );


    if (
        hero
        && map
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


                map.style.transform =
                    `translate(${x}px, ${y}px)`;

            }
        );


        hero.addEventListener(
            'mouseleave',
            function () {

                map.style.transform =
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