<?php

/* ==========================================================
   ALEXDEVCODE — CONTACTO

   Página de contacto orientada à conversa:
   - vários caminhos de contacto
   - formulário existente preservado
   - Smart Guard preservado
   - acessibilidade reforçada

   PT / EN / ES centralizados via includes/i18n.php.
========================================================== */


/* ==========================================================
   SESSION
========================================================== */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/* ==========================================================
   CSRF
========================================================== */

if (empty($_SESSION['csrf_token'])) {

    $_SESSION['csrf_token'] =
        bin2hex(
            random_bytes(32)
        );

}


/* ==========================================================
   FLASH
========================================================== */

$flashType =
    $_SESSION['flash_type']
    ?? '';

$flashMessage =
    $_SESSION['flash_message']
    ?? '';

unset(
    $_SESSION['flash_type'],
    $_SESSION['flash_message']
);


/* ==========================================================
   CLEAN OLD FORM KEYS
========================================================== */

if (
    !isset($_SESSION['contact_form_keys'])
    || !is_array($_SESSION['contact_form_keys'])
) {

    $_SESSION['contact_form_keys'] = [];

}


if (
    !isset($_SESSION['contact_pow'])
    || !is_array($_SESSION['contact_pow'])
) {

    $_SESSION['contact_pow'] = [];

}


$now = time();


foreach (
    $_SESSION['contact_form_keys']
    as $key => $createdAt
) {

    if (
        ($now - (int) $createdAt)
        > 3600
    ) {

        unset(
            $_SESSION['contact_form_keys'][$key],
            $_SESSION['contact_pow'][$key]
        );

    }

}


/* ==========================================================
   SMART GUARD
========================================================== */

$formKey =
    bin2hex(
        random_bytes(16)
    );


$powSeed =
    bin2hex(
        random_bytes(24)
    );


$powDifficulty = 3;


$_SESSION['contact_form_keys'][$formKey] =
    $now;


$_SESSION['contact_pow'][$formKey] = [

    'seed' =>
        $powSeed,

    'difficulty' =>
        $powDifficulty,

    'created_at' =>
        $now,

];


/* ==========================================================
   HEADER
========================================================== */

try {

    require_once __DIR__
        . '/includes/header.php';

} catch (Throwable $e) {

    error_log(
        'Header include failed: '
        . $e->getMessage()
    );

}


/* ==========================================================
   HELPERS
========================================================== */

$esc = static function ($value): string {

    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );

};


/* ==========================================================
   CONTACT LANGUAGE
========================================================== */

$contactLangCandidate =
    $_GET['lang']
    ?? $_COOKIE['adc_lang']
    ?? $_SESSION['adc_lang']
    ?? $_SESSION['lang']
    ?? 'pt';


$contactLang =
    strtolower(
        trim(
            (string) $contactLangCandidate
        )
    );


if (
    !in_array(
        $contactLang,
        [
            'pt',
            'en',
            'es'
        ],
        true
    )
) {

    $contactLang =
        'pt';

}


/* ==========================================================
   URLS
========================================================== */

$projectsUrl =
    function_exists('adc_url')
        ? adc_url('projetos.php')
        : 'projetos.php';


$servicesUrl =
    function_exists('adc_url')
        ? adc_url('solucoes.php')
        : 'solucoes.php';


$email =
    'contact@alexdevcode.com';


$phoneDisplay =
    '+351 934 535 967';


$phoneDigits =
    '351934535697';


$emailUrl =
    'mailto:' . $email;


$whatsappUrl =
    'https://wa.me/' . $phoneDigits;


/* ==========================================================
   QUICK START
========================================================== */

$quickStarts = [

    [
        'number' => '01',
        'icon' => 'fa-lightbulb',
        'title' => t('contact.quick.item1_title'),
        'text' => t('contact.quick.item1_text'),
        'intent' => 'Project / Website',
        'subject' => t('contact.quick.item1_subject'),
        'placeholder' => t('contact.quick.item1_placeholder'),
    ],

    [
        'number' => '02',
        'icon' => 'fa-screwdriver-wrench',
        'title' => t('contact.quick.item2_title'),
        'text' => t('contact.quick.item2_text'),
        'intent' => 'Project / Website',
        'subject' => t('contact.quick.item2_subject'),
        'placeholder' => t('contact.quick.item2_placeholder'),
    ],

    [
        'number' => '03',
        'icon' => 'fa-handshake',
        'title' => t('contact.quick.item3_title'),
        'text' => t('contact.quick.item3_text'),
        'intent' => 'Opportunity',
        'subject' => t('contact.quick.item3_subject'),
        'placeholder' => t('contact.quick.item3_placeholder'),
    ],

    [
        'number' => '04',
        'icon' => 'fa-comment-dots',
        'title' => t('contact.quick.item4_title'),
        'text' => t('contact.quick.item4_text'),
        'intent' => 'Technical Question',
        'subject' => t('contact.quick.item4_subject'),
        'placeholder' => t('contact.quick.item4_placeholder'),
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
   CONTACT — TOKENS
========================================================== */

.adc-contact {

    --c-dark:
        #141414;

    --c-accent:
        #8b735d;

    --c-accent-dk:
        #715d4b;

    --c-accent-lt:
        #c6b8a9;

    --c-bg:
        #d7d9dd;

    --c-card:
        #ffffff;

    --c-soft:
        #f7f4f0;

    --c-text:
        #302f2e;

    --c-muted:
        #5d5955;

    --c-border:
        rgba(20, 20, 20, .11);

    --c-success:
        #15803d;

    --c-danger:
        #b42318;

    --c-shadow:
        0 10px 30px
        rgba(20, 20, 20, .10);

    --c-shadow-strong:
        0 22px 60px
        rgba(20, 20, 20, .18);


    position:
        relative;


    overflow:
        hidden;


    color:
        var(--c-text);


    background:

        radial-gradient(
            circle at 0% 0%,
            rgba(139, 115, 93, .16),
            transparent 28rem
        ),

        radial-gradient(
            circle at 100% 52%,
            rgba(20, 20, 20, .07),
            transparent 30rem
        ),

        var(--c-bg);

}


body[data-tema="escuro"]
.adc-contact {

    --c-bg:
        #171717;

    --c-card:
        #202020;

    --c-soft:
        #262322;

    --c-text:
        #ebe6e0;

    --c-muted:
        #b7b0aa;

    --c-border:
        rgba(255, 255, 255, .10);

    --c-shadow:
        0 10px 30px
        rgba(0, 0, 0, .26);

    --c-shadow-strong:
        0 22px 60px
        rgba(0, 0, 0, .36);

}


.adc-contact *,
.adc-contact *::before,
.adc-contact *::after {

    box-sizing:
        border-box;

}


.adc-contact-container {

    width:
        min(
            calc(100% - 2rem),
            1180px
        );


    margin:
        0 auto;

}


.adc-contact-section {

    padding:
        4.8rem 0;

}



/* ==========================================================
   ACCESSIBILITY
========================================================== */

.adc-sr-only {

    position:
        absolute !important;


    width:
        1px !important;


    height:
        1px !important;


    padding:
        0 !important;


    margin:
        -1px !important;


    overflow:
        hidden !important;


    clip:
        rect(0, 0, 0, 0) !important;


    white-space:
        nowrap !important;


    border:
        0 !important;

}


.adc-contact a:focus-visible,
.adc-contact button:focus-visible,
.adc-contact input:focus-visible,
.adc-contact textarea:focus-visible,
.adc-contact select:focus-visible,
.adc-contact summary:focus-visible {

    outline:
        3px solid
        rgba(139, 115, 93, .45);


    outline-offset:
        3px;

}



/* ==========================================================
   PROGRESS
========================================================== */

.adc-contact-progress {

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
        var(--c-accent);


    box-shadow:
        0 0 12px
        rgba(139, 115, 93, .65);


    pointer-events:
        none;

}



/* ==========================================================
   KICKER / HEADINGS
========================================================== */

.adc-contact-kicker {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .5rem;


    color:
        var(--c-accent-dk);


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
.adc-contact-kicker {

    color:
        var(--c-accent-lt);

}


.adc-contact-kicker::before {

    content:
        "";


    width:
        22px;


    height:
        2px;


    border-radius:
        999px;


    background:
        var(--c-accent);

}


.adc-contact-heading {

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
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-heading {

    color:
        #fff;

}


.adc-contact-intro {

    max-width:
        680px;


    margin:
        .85rem 0 0;


    color:
        var(--c-muted);


    font-size:
        .85rem;


    line-height:
        1.7;

}



/* ==========================================================
   HERO — OPEN / CONVERSATIONAL
========================================================== */

.adc-contact-hero {

    position:
        relative;


    overflow:
        hidden;


    padding:
        4.1rem 0
        3.6rem;


    border-bottom:
        1px solid
        var(--c-border);

}


.adc-contact-hero::before {

    content:
        "?";


    position:
        absolute;


    right:
        3%;


    top:
        -6.5rem;


    color:
        rgba(139, 115, 93, .075);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            13rem,
            34vw,
            25rem
        );


    line-height:
        1;


    pointer-events:
        none;

}


.adc-contact-hero-grid {

    position:
        relative;


    z-index:
        2;


    display:
        grid;


    gap:
        2.5rem;


    align-items:
        center;

}


.adc-contact-hero h1 {

    max-width:
        760px;


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
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-hero h1 {

    color:
        #fff;

}


.adc-contact-hero h1 span {

    display:
        block;


    color:
        var(--c-accent);

}


.adc-contact-hero-copy > p {

    max-width:
        630px;


    margin:
        1rem 0 0;


    color:
        var(--c-muted);


    font-size:
        .86rem;


    line-height:
        1.7;

}


.adc-contact-hero-actions {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .5rem;


    margin-top:
        1.2rem;

}


.adc-contact-hero-cta {

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
        .75rem;


    font-weight:
        800;


    transition:
        transform .22s ease,
        background .22s ease,
        border-color .22s ease,
        color .22s ease;

}


.adc-contact-hero-cta:hover {

    transform:
        translateY(-3px);

}


.adc-contact-hero-cta-primary {

    background:
        var(--c-dark);


    color:
        #fff;

}


.adc-contact-hero-cta-primary:hover {

    background:
        var(--c-accent);

}


.adc-contact-hero-cta-secondary {

    border-color:
        rgba(139, 115, 93, .26);


    background:
        rgba(139, 115, 93, .08);


    color:
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-hero-cta-secondary {

    color:
        #fff;

}


.adc-contact-hero-cta-secondary:hover {

    background:
        rgba(139, 115, 93, .16);

}



/* ==========================================================
   CONTACT BOARD
========================================================== */

.adc-contact-board {

    position:
        relative;


    border-top:
        1px solid
        var(--c-border);


    transition:
        transform .18s ease-out;

}


.adc-contact-board-label {

    display:
        block;


    padding:
        0 0 .7rem;


    color:
        var(--c-muted);


    font-size:
        .64rem;


    font-weight:
        700;


    letter-spacing:
        .07em;


    text-transform:
        uppercase;

}


.adc-contact-channel {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        38px minmax(0, 1fr) auto;


    gap:
        .75rem;


    align-items:
        center;


    min-height:
        72px;


    padding:
        .85rem 0;


    border-bottom:
        1px solid
        var(--c-border);


    color:
        inherit;


    text-decoration:
        none;


    overflow:
        hidden;


    transition:
        padding .22s ease;

}


.adc-contact-channel::before {

    content:
        "";


    position:
        absolute;


    inset:
        0 auto 0 0;


    width:
        0;


    background:
        rgba(139, 115, 93, .07);


    transition:
        width .32s ease;

}


.adc-contact-channel:hover::before {

    width:
        100%;

}


.adc-contact-channel:hover {

    padding-left:
        .55rem;


    padding-right:
        .55rem;

}


.adc-contact-channel-icon,
.adc-contact-channel-copy,
.adc-contact-channel-action {

    position:
        relative;


    z-index:
        2;

}


.adc-contact-channel-icon {

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
        50%;


    background:
        var(--c-dark);


    color:
        #fff;

}


.adc-contact-channel-copy small {

    display:
        block;


    color:
        var(--c-accent);


    font-size:
        .56rem;


    font-weight:
        700;


    text-transform:
        uppercase;


    letter-spacing:
        .07em;

}


.adc-contact-channel-copy strong {

    display:
        block;


    margin-top:
        .08rem;


    color:
        var(--c-dark);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.12rem;


    font-weight:
        600;

}


body[data-tema="escuro"]
.adc-contact-channel-copy strong {

    color:
        #fff;

}


.adc-contact-channel-copy span {

    display:
        block;


    margin-top:
        .1rem;


    color:
        var(--c-muted);


    font-size:
        .62rem;

}


.adc-contact-channel-action {

    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    width:
        31px;


    height:
        31px;


    border:
        1px solid
        var(--c-border);


    border-radius:
        50%;


    color:
        var(--c-accent);


    background:
        transparent;


    cursor:
        pointer;


    transition:
        transform .2s ease,
        background .2s ease;

}


.adc-contact-channel:hover
.adc-contact-channel-action {

    transform:
        translateX(4px);


    background:
        rgba(139, 115, 93, .09);

}



/* ==========================================================
   QUICK START
========================================================== */

.adc-contact-start {

    padding:
        4.7rem 0;

}


.adc-contact-start-list {

    margin-top:
        1.8rem;


    border-top:
        1px solid
        var(--c-border);

}


.adc-contact-start-option {

    position:
        relative;


    width:
        100%;


    display:
        grid;


    grid-template-columns:
        38px
        minmax(0, 1fr)
        26px;


    gap:
        .8rem;


    align-items:
        center;


    padding:
        1.15rem .1rem;


    border:
        0;


    border-bottom:
        1px solid
        var(--c-border);


    background:
        transparent;


    color:
        inherit;


    text-align:
        left;


    font:
        inherit;


    cursor:
        pointer;


    overflow:
        hidden;


    transition:
        padding .24s ease;

}


.adc-contact-start-option::before {

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


.adc-contact-start-option:hover::before {

    width:
        100%;

}


.adc-contact-start-option:hover {

    padding-left:
        .7rem;


    padding-right:
        .7rem;

}


.adc-contact-start-number,
.adc-contact-start-copy,
.adc-contact-start-arrow {

    position:
        relative;


    z-index:
        2;

}


.adc-contact-start-number {

    color:
        var(--c-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .72rem;

}


.adc-contact-start-copy {

    display:
        grid;


    grid-template-columns:
        36px minmax(0, 1fr);


    gap:
        .7rem;


    align-items:
        center;

}


.adc-contact-start-icon {

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
        var(--c-dark);


    color:
        #fff;


    transition:
        transform .22s ease,
        background .22s ease;

}


.adc-contact-start-option:hover
.adc-contact-start-icon {

    transform:
        rotate(-5deg);


    background:
        var(--c-accent);

}


.adc-contact-start-copy strong {

    display:
        block;


    color:
        var(--c-dark);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.25rem;

}


body[data-tema="escuro"]
.adc-contact-start-copy strong {

    color:
        #fff;

}


.adc-contact-start-copy span {

    display:
        block;


    max-width:
        650px;


    margin-top:
        .15rem;


    color:
        var(--c-muted);


    font-size:
        .67rem;


    line-height:
        1.5;

}


.adc-contact-start-arrow {

    color:
        var(--c-accent);


    transition:
        transform .22s ease;

}


.adc-contact-start-option:hover
.adc-contact-start-arrow {

    transform:
        translateX(5px);

}



/* ==========================================================
   FORM AREA
========================================================== */

.adc-contact-form-area {

    position:
        relative;


    padding:
        5rem 0;


    background:
        rgba(255, 255, 255, .17);

}


body[data-tema="escuro"]
.adc-contact-form-area {

    background:
        rgba(255, 255, 255, .012);

}


.adc-contact-form-grid {

    display:
        grid;


    gap:
        2rem;


    align-items:
        start;

}



/* ==========================================================
   FORM
========================================================== */

.adc-contact-form-shell {

    position:
        relative;


    padding:
        1.15rem;


    border:
        1px solid
        var(--c-border);


    border-radius:
        24px;


    background:
        var(--c-card);


    box-shadow:
        var(--c-shadow);

}


.adc-contact-form-header {

    display:
        flex;


    flex-direction:
        column;


    gap:
        .75rem;


    margin-bottom:
        1.4rem;

}


.adc-contact-form-header h2 {

    margin:
        .45rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            1.75rem,
            5vw,
            2.4rem
        );


    line-height:
        1;


    color:
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-form-header h2 {

    color:
        #fff;

}


.adc-contact-form-header p {

    max-width:
        640px;


    margin:
        .4rem 0 0;


    color:
        var(--c-muted);


    font-size:
        .75rem;


    line-height:
        1.6;

}


.adc-contact-status {

    display:
        inline-flex;


    align-items:
        center;


    gap:
        .4rem;


    width:
        fit-content;


    color:
        var(--c-success);


    font-size:
        .63rem;


    font-weight:
        700;

}


.adc-contact-status::before {

    content:
        "";


    width:
        7px;


    height:
        7px;


    border-radius:
        50%;


    background:
        var(--c-success);


    box-shadow:
        0 0 0 4px
        rgba(21, 128, 61, .11);

}



/* ==========================================================
   FORM ELEMENTS
========================================================== */

.adc-contact-form {

    display:
        grid;


    gap:
        1rem;

}


.adc-contact-form-row {

    display:
        grid;


    gap:
        1rem;

}


.adc-contact-form-group {

    min-width:
        0;

}


.adc-contact-form-group > label,
.adc-contact-fieldset legend {

    display:
        block;


    margin-bottom:
        .4rem;


    color:
        var(--c-dark);


    font-size:
        .75rem;


    font-weight:
        700;

}


body[data-tema="escuro"]
.adc-contact-form-group > label,

body[data-tema="escuro"]
.adc-contact-fieldset legend {

    color:
        #fff;

}


.adc-contact-required {

    color:
        var(--c-accent);

}


.adc-contact-field-helper {

    display:
        block;


    margin-top:
        .35rem;


    color:
        var(--c-muted);


    font-size:
        .61rem;


    line-height:
        1.45;

}


.adc-contact-input-wrap {

    position:
        relative;

}


.adc-contact-input-wrap > i {

    position:
        absolute;


    left:
        .9rem;


    top:
        50%;


    transform:
        translateY(-50%);


    color:
        var(--c-accent);


    pointer-events:
        none;

}


.adc-contact-input-wrap.adc-textarea > i {

    top:
        1rem;


    transform:
        none;

}


.adc-contact-form input[type="text"],
.adc-contact-form input[type="email"],
.adc-contact-form textarea,
.adc-contact-form select {

    width:
        100%;


    border:
        1px solid
        rgba(139, 115, 93, .22);


    border-radius:
        13px;


    background:
        var(--c-soft);


    color:
        var(--c-dark);


    font:
        inherit;


    font-size:
        .82rem;


    outline:
        none;


    transition:
        background .22s ease,
        border-color .22s ease,
        box-shadow .22s ease;

}


body[data-tema="escuro"]
.adc-contact-form input[type="text"],

body[data-tema="escuro"]
.adc-contact-form input[type="email"],

body[data-tema="escuro"]
.adc-contact-form textarea,

body[data-tema="escuro"]
.adc-contact-form select {

    color:
        #fff;

}


.adc-contact-form input[type="text"],
.adc-contact-form input[type="email"],
.adc-contact-form select {

    min-height:
        48px;


    padding:
        .7rem .85rem
        .7rem 2.45rem;

}


.adc-contact-form textarea {

    min-height:
        170px;


    resize:
        vertical;


    padding:
        .85rem .85rem
        .85rem 2.45rem;


    line-height:
        1.6;

}


.adc-contact-form input:focus,
.adc-contact-form textarea:focus,
.adc-contact-form select:focus {

    border-color:
        var(--c-accent);


    background:
        var(--c-card);


    box-shadow:
        0 0 0 4px
        rgba(139, 115, 93, .10);

}



/* ==========================================================
   FIELDSET
========================================================== */

.adc-contact-fieldset {

    min-width:
        0;


    padding:
        0;


    margin:
        0;


    border:
        0;

}



/* ==========================================================
   INTENT OPTIONS
========================================================== */

.adc-contact-intents {

    display:
        grid;


    gap:
        .45rem;

}


.adc-contact-intent {

    position:
        relative;


    display:
        grid;


    grid-template-columns:
        34px minmax(0, 1fr) 20px;


    gap:
        .65rem;


    align-items:
        center;


    min-height:
        61px;


    padding:
        .65rem;


    border:
        1px solid
        var(--c-border);


    border-radius:
        12px;


    background:
        var(--c-soft);


    cursor:
        pointer;


    transition:
        border-color .22s ease,
        background .22s ease,
        transform .22s ease;

}


.adc-contact-intent:hover {

    transform:
        translateY(-2px);


    border-color:
        rgba(139, 115, 93, .34);

}


.adc-contact-intent input {

    position:
        absolute;


    opacity:
        0;


    pointer-events:
        none;

}


.adc-contact-intent-icon {

    width:
        32px;


    height:
        32px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        9px;


    background:
        var(--c-dark);


    color:
        #fff;

}


.adc-contact-intent strong {

    display:
        block;


    color:
        var(--c-dark);


    font-size:
        .72rem;

}


body[data-tema="escuro"]
.adc-contact-intent strong {

    color:
        #fff;

}


.adc-contact-intent span span {

    display:
        block;


    margin-top:
        .05rem;


    color:
        var(--c-muted);


    font-size:
        .59rem;


    line-height:
        1.4;

}


.adc-contact-intent-check {

    color:
        transparent;


    transition:
        color .2s ease,
        transform .2s ease;

}


.adc-contact-intent:has(input:checked) {

    border-color:
        var(--c-accent);


    background:
        rgba(139, 115, 93, .11);

}


.adc-contact-intent:has(input:checked)
.adc-contact-intent-check {

    color:
        var(--c-accent);


    transform:
        scale(1.1);

}


.adc-contact-intent:focus-within {

    outline:
        3px solid
        rgba(139, 115, 93, .24);


    outline-offset:
        2px;

}



/* ==========================================================
   MESSAGE TOOLS
========================================================== */

.adc-contact-message-tools {

    display:
        flex;


    justify-content:
        space-between;


    gap:
        .8rem;


    margin-top:
        .35rem;


    color:
        var(--c-muted);


    font-size:
        .6rem;

}


.adc-contact-prompts {

    display:
        flex;


    flex-wrap:
        wrap;


    gap:
        .35rem;


    margin-top:
        .6rem;

}


.adc-contact-prompt {

    padding:
        .37rem .55rem;


    border:
        1px solid
        rgba(139, 115, 93, .19);


    border-radius:
        999px;


    background:
        transparent;


    color:
        var(--c-accent-dk);


    font:
        inherit;


    font-size:
        .58rem;


    font-weight:
        700;


    cursor:
        pointer;


    transition:
        background .2s ease,
        transform .2s ease;

}


body[data-tema="escuro"]
.adc-contact-prompt {

    color:
        var(--c-accent-lt);

}


.adc-contact-prompt:hover {

    transform:
        translateY(-2px);


    background:
        rgba(139, 115, 93, .10);

}



/* ==========================================================
   SMART GUARD
========================================================== */

.adc-contact-guard {

    position:
        relative;


    overflow:
        hidden;


    display:
        grid;


    grid-template-columns:
        40px minmax(0, 1fr);


    gap:
        .7rem;


    align-items:
        center;


    padding:
        .85rem;


    border:
        1px solid
        rgba(255, 255, 255, .11);


    border-radius:
        14px;


    background:
        var(--c-dark);


    color:
        #fff;


    transition:
        background .3s ease;

}


.adc-contact-guard-icon {

    width:
        38px;


    height:
        38px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    border-radius:
        50%;


    background:
        rgba(255, 255, 255, .08);


    color:
        var(--c-accent-lt);

}


.adc-contact-guard strong {

    display:
        block;


    font-size:
        .7rem;

}


.adc-contact-guard-text {

    display:
        block;


    margin-top:
        .1rem;


    color:
        rgba(255, 255, 255, .74);


    font-size:
        .58rem;


    line-height:
        1.4;

}


.adc-contact-guard-bar {

    grid-column:
        1 / -1;


    height:
        4px;


    overflow:
        hidden;


    border-radius:
        999px;


    background:
        rgba(255, 255, 255, .10);

}


.adc-contact-guard-bar span {

    display:
        block;


    width:
        12%;


    height:
        100%;


    border-radius:
        inherit;


    background:
        var(--c-accent-lt);


    transition:
        width .35s ease;

}


.adc-contact-guard.ready {

    background:
        #173d27;

}


.adc-contact-guard.ready
.adc-contact-guard-bar span {

    width:
        100%;


    background:
        #9fe0b1;

}


.adc-contact-guard.failed {

    background:
        #641d19;

}


.adc-contact-guard.failed
.adc-contact-guard-bar span {

    width:
        100%;


    background:
        #fecaca;

}



/* ==========================================================
   CONSENT
========================================================== */

.adc-contact-consent {

    display:
        grid;


    grid-template-columns:
        19px minmax(0, 1fr);


    gap:
        .6rem;


    align-items:
        start;


    padding:
        .75rem;


    border:
        1px solid
        var(--c-border);


    border-radius:
        12px;


    background:
        var(--c-soft);

}


.adc-contact-consent input {

    width:
        17px;


    height:
        17px;


    margin-top:
        .1rem;


    accent-color:
        var(--c-accent);

}


.adc-contact-consent label {

    color:
        var(--c-muted);


    font-size:
        .62rem;


    line-height:
        1.5;

}



/* ==========================================================
   SUBMIT
========================================================== */

.adc-contact-submit {

    width:
        100%;


    min-height:
        51px;


    display:
        inline-flex;


    align-items:
        center;


    justify-content:
        center;


    gap:
        .5rem;


    padding:
        .75rem 1rem;


    border:
        0;


    border-radius:
        999px;


    background:
        var(--c-dark);


    color:
        #fff;


    font:
        inherit;


    font-size:
        .78rem;


    font-weight:
        800;


    cursor:
        pointer;


    transition:
        transform .22s ease,
        background .22s ease,
        box-shadow .22s ease;

}


.adc-contact-submit:hover {

    transform:
        translateY(-3px);


    background:
        var(--c-accent);


    box-shadow:
        var(--c-shadow);

}


.adc-contact-submit:disabled {

    opacity:
        .68;


    cursor:
        wait;


    transform:
        none;

}



/* ==========================================================
   HONEYPOT
========================================================== */

.adc-contact-honeypot {

    position:
        absolute !important;


    left:
        -9999px !important;


    width:
        1px !important;


    height:
        1px !important;


    overflow:
        hidden !important;


    opacity:
        0 !important;

}



/* ==========================================================
   SIDE GUIDE
========================================================== */

.adc-contact-guide {

    display:
        grid;


    gap:
        1.5rem;

}


.adc-contact-guide-block {

    padding-bottom:
        1.25rem;


    border-bottom:
        1px solid
        var(--c-border);

}


.adc-contact-guide-block:last-child {

    border-bottom:
        0;

}


.adc-contact-guide-number {

    display:
        block;


    margin-bottom:
        .3rem;


    color:
        var(--c-accent);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        .65rem;

}


.adc-contact-guide h3 {

    margin:
        0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.18rem;


    color:
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-guide h3 {

    color:
        #fff;

}


.adc-contact-guide p {

    margin:
        .35rem 0 0;


    color:
        var(--c-muted);


    font-size:
        .68rem;


    line-height:
        1.55;

}



/* ==========================================================
   DIRECT CONTACT PANEL
========================================================== */

.adc-contact-direct {

    position:
        relative;


    overflow:
        hidden;


    padding:
        1.15rem;


    border-radius:
        18px;


    background:
        var(--c-dark);


    color:
        #fff;

}


.adc-contact-direct::before {

    content:
        "@";


    position:
        absolute;


    right:
        -1rem;


    bottom:
        -3rem;


    color:
        rgba(255, 255, 255, .035);


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        9rem;


    pointer-events:
        none;

}


.adc-contact-direct-content {

    position:
        relative;


    z-index:
        2;

}


.adc-contact-direct h3 {

    margin:
        0;


    color:
        #fff;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        1.25rem;

}


.adc-contact-direct p {

    margin:
        .35rem 0 .9rem;


    color:
        rgba(255, 255, 255, .74);


    font-size:
        .64rem;


    line-height:
        1.5;

}


.adc-contact-direct-link {

    display:
        flex;


    align-items:
        center;


    justify-content:
        space-between;


    gap:
        .7rem;


    padding:
        .65rem 0;


    border-top:
        1px solid
        rgba(255, 255, 255, .10);


    color:
        #fff;


    text-decoration:
        none;


    font-size:
        .65rem;


    transition:
        color .2s ease;

}


.adc-contact-direct-link:hover {

    color:
        var(--c-accent-lt);

}


.adc-contact-direct-link i {

    color:
        var(--c-accent-lt);

}



/* ==========================================================
   COPY BUTTON
========================================================== */

.adc-contact-copy {

    border:
        0;


    background:
        transparent;


    color:
        var(--c-accent-lt);


    cursor:
        pointer;


    font:
        inherit;


    font-size:
        .58rem;


    font-weight:
        700;

}



/* ==========================================================
   FINAL NOTE
========================================================== */

.adc-contact-final {

    padding:
        4rem 0 5rem;

}


.adc-contact-final-line {

    position:
        relative;


    display:
        grid;


    gap:
        1rem;


    padding:
        2.4rem 0;


    border-top:
        2px solid
        var(--c-dark);


    border-bottom:
        2px solid
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-final-line {

    border-color:
        rgba(255, 255, 255, .85);

}


.adc-contact-final-line::after {

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
        adcContactArrow
        3s
        ease-in-out
        infinite;

}


.adc-contact-final-copy {

    position:
        relative;


    z-index:
        2;

}


.adc-contact-final h2 {

    max-width:
        760px;


    margin:
        .45rem 0 0;


    font-family:
        'Oswald',
        sans-serif;


    font-size:
        clamp(
            2.1rem,
            8vw,
            4rem
        );


    line-height:
        .97;


    letter-spacing:
        -.04em;


    color:
        var(--c-dark);

}


body[data-tema="escuro"]
.adc-contact-final h2 {

    color:
        #fff;

}


.adc-contact-final p {

    max-width:
        620px;


    margin:
        .6rem 0 0;


    color:
        var(--c-muted);


    font-size:
        .73rem;


    line-height:
        1.6;

}


.adc-contact-final-actions {

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
   FLASH / TOAST — CENTRO DA TELA
========================================================== */

.adc-contact-toast {

    position:
        fixed;

    left:
        50%;

    top:
        50%;

    z-index:
        999999;

    width:
        min(
            calc(100% - 2rem),
            560px
        );

    min-height:
        132px;

    display:
        grid;

    grid-template-columns:
        64px minmax(0, 1fr) 40px;

    gap:
        1rem;

    align-items:
        center;

    padding:
        1.35rem;

    border:
        2px solid #ffffff;

    border-radius:
        22px;

    color:
        #ffffff;

    font-family:
        'Poppins', sans-serif;

    box-shadow:
        0 30px 80px rgba(0, 0, 0, .34),
        0 10px 30px rgba(0, 0, 0, .20);

    transform:
        translate(-50%, -50%);

    animation:
        adcContactToast
        .38s
        cubic-bezier(.2, .8, .2, 1)
        both;

}


.adc-contact-toast.success {

    background:
        #15803d;

    border-color:
        #bbf7d0;

}


.adc-contact-toast.error {

    background:
        #b42318;

    border-color:
        #fecaca;

}


.adc-contact-toast > i {

    width:
        60px;

    height:
        60px;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    border-radius:
        50%;

    background:
        #ffffff;

    font-size:
        1.75rem;

}


.adc-contact-toast.success > i {

    color:
        #15803d;

}


.adc-contact-toast.error > i {

    color:
        #b42318;

}


.adc-contact-toast > div {

    min-width:
        0;

    color:
        #ffffff;

    font-size:
        .98rem;

    font-weight:
        600;

    line-height:
        1.6;

}


.adc-contact-toast button {

    width:
        38px;

    height:
        38px;

    display:
        inline-flex;

    align-items:
        center;

    justify-content:
        center;

    padding:
        0;

    border:
        2px solid #ffffff;

    border-radius:
        50%;

    background:
        #ffffff;

    color:
        #171717;

    font-family:
        Arial, sans-serif;

    font-size:
        1.25rem;

    font-weight:
        700;

    line-height:
        1;

    cursor:
        pointer;

    transition:
        transform .2s ease,
        background .2s ease,
        color .2s ease;

}


.adc-contact-toast button:hover {

    transform:
        scale(1.08);

    background:
        #171717;

    color:
        #ffffff;

}


.adc-contact-toast button:focus-visible {

    outline:
        3px solid #ffffff;

    outline-offset:
        4px;

}


@media (max-width: 639px) {

    .adc-contact-toast {

        width:
            calc(100% - 1.25rem);

        min-height:
            112px;

        grid-template-columns:
            50px minmax(0, 1fr) 34px;

        gap:
            .75rem;

        padding:
            1rem;

        border-radius:
            18px;

    }


    .adc-contact-toast > i {

        width:
            48px;

        height:
            48px;

        font-size:
            1.35rem;

    }


    .adc-contact-toast > div {

        font-size:
            .82rem;

        line-height:
            1.5;

    }


    .adc-contact-toast button {

        width:
            32px;

        height:
            32px;

        font-size:
            1.05rem;

    }

}


/* ==========================================================
   ANIMATIONS
========================================================== */

@keyframes adcContactArrow {

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


@keyframes adcContactToast {

    from {

        opacity:
            0;

        transform:
            translate(-50%, calc(-50% + 26px))
            scale(.94);

    }


    to {

        opacity:
            1;

        transform:
            translate(-50%, -50%)
            scale(1);

    }

}



/* ==========================================================
   TABLET
========================================================== */

@media (min-width: 640px) {

    .adc-contact-hero-actions,
    .adc-contact-final-actions {

        flex-direction:
            row;


        flex-wrap:
            wrap;

    }


    .adc-contact-form-row {

        grid-template-columns:
            repeat(
                2,
                minmax(0, 1fr)
            );

    }


    .adc-contact-intents {

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

    .adc-contact-hero {

        padding:
            5.3rem 0
            4.5rem;

    }


    .adc-contact-hero-grid {

        grid-template-columns:
            minmax(0, 1.15fr)
            minmax(330px, .85fr);


        gap:
            4.2rem;

    }


    .adc-contact-start-option {

        grid-template-columns:
            50px
            minmax(0, 1fr)
            34px;


        padding:
            1.3rem .2rem;

    }


    .adc-contact-start-copy {

        grid-template-columns:
            42px
            minmax(0, 1fr);

    }


    .adc-contact-start-icon {

        width:
            40px;


        height:
            40px;

    }


    .adc-contact-form-grid {

        grid-template-columns:
            minmax(0, 1.35fr)
            minmax(280px, .65fr);


        gap:
            3rem;

    }


    .adc-contact-form-shell {

        padding:
            1.5rem;

    }


    .adc-contact-guide {

        position:
            sticky;


        top:
            110px;

    }

}



/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 639px) {

    .adc-contact-hero {

        padding-top:
            2.7rem;

    }


    .adc-contact-hero h1 {

        font-size:
            2.9rem;


        line-height:
            .94;

    }


    .adc-contact-channel {

        grid-template-columns:
            36px
            minmax(0, 1fr)
            28px;

    }


    .adc-contact-start-copy {

        grid-template-columns:
            1fr;

    }


    .adc-contact-start-icon {

        display:
            none;

    }


    .adc-contact-form-shell {

        padding:
            1rem;

    }


    .adc-contact-message-tools {

        flex-direction:
            column;


        gap:
            .15rem;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-contact *,
    .adc-contact *::before,
    .adc-contact *::after {

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
    class="adc-contact-progress"
    id="adcContactProgress"
    aria-hidden="true"
></div>


<!-- ==========================================================
     FLASH
========================================================== -->

<?php if (!empty($flashMessage)): ?>

    <div
        class="
            adc-contact-toast
            <?= $esc(
                $flashType === 'success'
                    ? 'success'
                    : 'error'
            ) ?>
        "

        id="flashToast"

        role="status"

        aria-live="polite"
    >

        <i
            class="
                fa-solid
                <?= $flashType === 'success'
                    ? 'fa-circle-check'
                    : 'fa-triangle-exclamation' ?>
            "
            aria-hidden="true"
        ></i>


        <div>
            <?= $esc($flashMessage) ?>
        </div>


        <button
            type="button"

            aria-label="<?= $esc(t('contact.flash.close')) ?>"

            onclick="
                document
                    .getElementById('flashToast')
                    ?.remove()
            "
        >
            ×
        </button>

    </div>

<?php endif; ?>


<div
    class="adc-sr-only"
    id="contactAnnouncer"
    aria-live="polite"
    aria-atomic="true"
></div>


<main class="adc-contact">


    <!-- ======================================================
         HERO
    ======================================================= -->

    <section class="adc-contact-hero">

        <div class="adc-contact-container">

            <div class="adc-contact-hero-grid">


                <!-- =========================================
                     COPY
                ========================================== -->

                <div
                    class="adc-contact-hero-copy"
                    data-aos="fade-right"
                >

                    <span class="adc-contact-kicker">
                        <?= $esc(t('contact.hero.kicker')) ?>
                    </span>


                    <h1>

                        <?= $esc(t('contact.hero.title_before')) ?>

                        <span>
                            <?= $esc(t('contact.hero.title_highlight')) ?>
                        </span>

                    </h1>


                    <p>

                        <?= $esc(t('contact.hero.text1')) ?>

                    </p>


                    <p>

                        <?= $esc(t('contact.hero.text2')) ?>

                    </p>


                    <div class="adc-contact-hero-actions">

                        <a
                            href="#mensagem-form"
                            class="
                                adc-contact-hero-cta
                                adc-contact-hero-cta-primary
                            "
                        >
                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $esc(t('contact.hero.primary_cta')) ?>
                        </a>


                        <a
                            href="<?= $esc($projectsUrl) ?>"
                            class="
                                adc-contact-hero-cta
                                adc-contact-hero-cta-secondary
                            "
                        >
                            <i
                                class="fas fa-folder-open"
                                aria-hidden="true"
                            ></i>

                            <?= $esc(t('contact.hero.secondary_cta')) ?>
                        </a>

                    </div>

                </div>



                <!-- =========================================
                     CHANNEL BOARD
                ========================================== -->

                <div
                    class="adc-contact-board"
                    id="adcContactBoard"
                    data-aos="fade-left"
                >

                    <span class="adc-contact-board-label">

                        <?= $esc(t('contact.channels.label')) ?>

                    </span>



                    <!-- EMAIL -->

                    <a
                        href="<?= $esc($emailUrl) ?>"
                        class="adc-contact-channel"
                    >

                        <span class="adc-contact-channel-icon">

                            <i
                                class="fas fa-envelope"
                                aria-hidden="true"
                            ></i>

                        </span>


                        <span class="adc-contact-channel-copy">

                            <small>
                                <?= $esc(t('contact.channels.email_label')) ?>
                            </small>

                            <strong>
                                <?= $esc($email) ?>
                            </strong>

                            <span>
                                <?= $esc(t('contact.channels.email_hint')) ?>
                            </span>

                        </span>


                        <span class="adc-contact-channel-action">

                            <i
                                class="fas fa-arrow-right"
                                aria-hidden="true"
                            ></i>

                        </span>

                    </a>



                    <!-- WHATSAPP -->

                    <a
                        href="<?= $esc($whatsappUrl) ?>"

                        target="_blank"

                        rel="noopener noreferrer"

                        class="adc-contact-channel"
                    >

                        <span class="adc-contact-channel-icon">

                            <i
                                class="fab fa-whatsapp"
                                aria-hidden="true"
                            ></i>

                        </span>


                        <span class="adc-contact-channel-copy">

                            <small>
                                <?= $esc(t('contact.channels.whatsapp_label')) ?>
                            </small>

                            <strong>
                                <?= $esc($phoneDisplay) ?>
                            </strong>

                            <span>
                                <?= $esc(t('contact.channels.whatsapp_hint')) ?>
                            </span>

                        </span>


                        <span class="adc-contact-channel-action">

                            <i
                                class="fas fa-arrow-up-right-from-square"
                                aria-hidden="true"
                            ></i>

                        </span>

                    </a>



                    <!-- FORM -->

                    <a
                        href="#mensagem-form"
                        class="adc-contact-channel"
                    >

                        <span class="adc-contact-channel-icon">

                            <i
                                class="fas fa-pen"
                                aria-hidden="true"
                            ></i>

                        </span>


                        <span class="adc-contact-channel-copy">

                            <small>
                                <?= $esc(t('contact.channels.form_label')) ?>
                            </small>

                            <strong>
                                <?= $esc(t('contact.channels.form_title')) ?>
                            </strong>

                            <span>
                                <?= $esc(t('contact.channels.form_hint')) ?>
                            </span>

                        </span>


                        <span class="adc-contact-channel-action">

                            <i
                                class="fas fa-arrow-down"
                                aria-hidden="true"
                            ></i>

                        </span>

                    </a>


                </div>


            </div>

        </div>

    </section>



    <!-- ======================================================
         QUICK START
    ======================================================= -->

    <section class="adc-contact-start">

        <div class="adc-contact-container">


            <span class="adc-contact-kicker">
                <?= $esc(t('contact.quick.kicker')) ?>
            </span>


            <h2 class="adc-contact-heading">

                <?= $esc(t('contact.quick.title')) ?>

            </h2>


            <p class="adc-contact-intro">

                <?= $esc(t('contact.quick.text')) ?>

            </p>


            <div class="adc-contact-start-list">


                <?php foreach ($quickStarts as $item): ?>


                    <button
                        type="button"

                        class="adc-contact-start-option"

                        data-contact-start

                        data-intent="<?= $esc($item['intent']) ?>"

                        data-subject="<?= $esc($item['subject']) ?>"

                        data-placeholder="<?= $esc($item['placeholder']) ?>"
                    >


                        <span class="adc-contact-start-number">

                            <?= $esc($item['number']) ?>

                        </span>


                        <span class="adc-contact-start-copy">


                            <span
                                class="adc-contact-start-icon"
                                aria-hidden="true"
                            >

                                <i
                                    class="fas <?= $esc($item['icon']) ?>"
                                ></i>

                            </span>


                            <span>


                                <strong>

                                    <?= $esc($item['title']) ?>

                                </strong>


                                <span>

                                    <?= $esc($item['text']) ?>

                                </span>


                            </span>


                        </span>


                        <span
                            class="adc-contact-start-arrow"
                            aria-hidden="true"
                        >

                            <i class="fas fa-arrow-right"></i>

                        </span>


                    </button>


                <?php endforeach; ?>


            </div>


        </div>

    </section>



    <!-- ======================================================
         FORM AREA
    ======================================================= -->

    <section
        class="adc-contact-form-area"
        id="mensagem-form"
    >

        <div class="adc-contact-container">


            <div class="adc-contact-form-grid">


                <!-- =========================================
                     FORM
                ========================================== -->

                <div
                    class="adc-contact-form-shell"
                    data-aos="fade-up"
                >


                    <header class="adc-contact-form-header">


                        <div>

                            <span class="adc-contact-kicker">
                                <?= $esc(t('contact.form.kicker')) ?>
                            </span>


                            <h2>

                                <?= $esc(t('contact.form.title')) ?>

                            </h2>


                            <p>

                                <?= $esc(t('contact.form.intro')) ?>

                            </p>

                        </div>


                        <span class="adc-contact-status">

                            <?= $esc(t('contact.form.protected')) ?>

                        </span>


                    </header>



                    <form
                        method="post"

                        action="enviar.php"

                        class="adc-contact-form"

                        id="smartContactForm"

                        novalidate
                    >


                        <!-- =============================
                             SECURITY HIDDEN FIELDS
                        ============================== -->

                        <input
                            type="hidden"
                            name="lang"
                            value="<?= $esc($contactLang) ?>"
                        >

                        <input type="hidden" name="utm_source" value="<?= $esc(substr((string)($_GET['utm_source'] ?? ''), 0, 80)) ?>">
                        <input type="hidden" name="utm_medium" value="<?= $esc(substr((string)($_GET['utm_medium'] ?? ''), 0, 80)) ?>">
                        <input type="hidden" name="utm_campaign" value="<?= $esc(substr((string)($_GET['utm_campaign'] ?? ''), 0, 120)) ?>">
                        <input type="hidden" name="lead_origin" value="<?= $esc(substr((string)($_GET['from'] ?? ($_SERVER['HTTP_REFERER'] ?? 'direct')), 0, 220)) ?>">


                        <input
                            type="hidden"
                            name="csrf_token"
                            value="<?= $esc($_SESSION['csrf_token']) ?>"
                        >


                        <input
                            type="hidden"
                            name="form_key"
                            value="<?= $esc($formKey) ?>"
                        >


                        <input
                            type="hidden"
                            name="pow_nonce"
                            id="powNonce"
                            value=""
                        >


                        <input
                            type="hidden"
                            name="pow_hash"
                            id="powHash"
                            value=""
                        >



                        <!-- =============================
                             HONEYPOT
                        ============================== -->

                        <div
                            class="adc-contact-honeypot"
                            aria-hidden="true"
                        >

                            <label for="website">
                                <?= $esc(t('contact.form.website')) ?>
                            </label>

                            <input
                                type="text"
                                id="website"
                                name="website"
                                tabindex="-1"
                                autocomplete="off"
                            >

                        </div>



                        <!-- =============================
                             NAME / EMAIL
                        ============================== -->

                        <div class="adc-contact-form-row">


                            <div class="adc-contact-form-group">


                                <label for="nome">

                                    <?= $esc(t('contact.form.name')) ?>

                                    <span class="adc-contact-required">
                                        *
                                    </span>

                                </label>


                                <div class="adc-contact-input-wrap">

                                    <i
                                        class="fas fa-user"
                                        aria-hidden="true"
                                    ></i>


                                    <input
                                        type="text"

                                        id="nome"

                                        name="nome"

                                        placeholder="<?= $esc(t('contact.form.name_placeholder')) ?>"

                                        required

                                        minlength="2"

                                        maxlength="80"

                                        autocomplete="name"
                                    >

                                </div>


                            </div>



                            <div class="adc-contact-form-group">


                                <label for="email">

                                    <?= $esc(t('contact.form.email')) ?>

                                    <span class="adc-contact-required">
                                        *
                                    </span>

                                </label>


                                <div class="adc-contact-input-wrap">

                                    <i
                                        class="fas fa-at"
                                        aria-hidden="true"
                                    ></i>


                                    <input
                                        type="email"

                                        id="email"

                                        name="email"

                                        placeholder="<?= $esc(t('contact.form.email_placeholder')) ?>"

                                        required

                                        maxlength="120"

                                        autocomplete="email"
                                    >

                                </div>


                            </div>


                        </div>



                        <!-- =============================
                             INTENT
                        ============================== -->

                        <fieldset class="adc-contact-fieldset">


                            <legend>

                                <?= $esc(t('contact.form.intent_label')) ?>

                                <span class="adc-contact-required">
                                    *
                                </span>

                            </legend>


                            <div class="adc-contact-intents">


                                <label class="adc-contact-intent">


                                    <input
                                        type="radio"

                                        name="tipo"

                                        value="Project / Website"

                                        required
                                    >


                                    <span class="adc-contact-intent-icon">

                                        <i
                                            class="fas fa-laptop-code"
                                            aria-hidden="true"
                                        ></i>

                                    </span>


                                    <span>

                                        <strong>
                                            <?= $esc(t('contact.form.intent_project')) ?>
                                        </strong>

                                        <span>
                                            <?= $esc(t('contact.form.intent_project_hint')) ?>
                                        </span>

                                    </span>


                                    <i
                                        class="
                                            fas
                                            fa-circle-check
                                            adc-contact-intent-check
                                        "
                                        aria-hidden="true"
                                    ></i>


                                </label>



                                <label class="adc-contact-intent">


                                    <input
                                        type="radio"

                                        name="tipo"

                                        value="Collaboration"
                                    >


                                    <span class="adc-contact-intent-icon">

                                        <i
                                            class="fas fa-handshake"
                                            aria-hidden="true"
                                        ></i>

                                    </span>


                                    <span>

                                        <strong>
                                            <?= $esc(t('contact.form.intent_collab')) ?>
                                        </strong>

                                        <span>
                                            <?= $esc(t('contact.form.intent_collab_hint')) ?>
                                        </span>

                                    </span>


                                    <i
                                        class="
                                            fas
                                            fa-circle-check
                                            adc-contact-intent-check
                                        "
                                        aria-hidden="true"
                                    ></i>


                                </label>



                                <label class="adc-contact-intent">


                                    <input
                                        type="radio"

                                        name="tipo"

                                        value="Opportunity"
                                    >


                                    <span class="adc-contact-intent-icon">

                                        <i
                                            class="fas fa-briefcase"
                                            aria-hidden="true"
                                        ></i>

                                    </span>


                                    <span>

                                        <strong>
                                            <?= $esc(t('contact.form.intent_opportunity')) ?>
                                        </strong>

                                        <span>
                                            <?= $esc(t('contact.form.intent_opportunity_hint')) ?>
                                        </span>

                                    </span>


                                    <i
                                        class="
                                            fas
                                            fa-circle-check
                                            adc-contact-intent-check
                                        "
                                        aria-hidden="true"
                                    ></i>


                                </label>



                                <label class="adc-contact-intent">


                                    <input
                                        type="radio"

                                        name="tipo"

                                        value="Technical Question"
                                    >


                                    <span class="adc-contact-intent-icon">

                                        <i
                                            class="fas fa-comment-dots"
                                            aria-hidden="true"
                                        ></i>

                                    </span>


                                    <span>

                                        <strong>
                                            <?= $esc(t('contact.form.intent_question')) ?>
                                        </strong>

                                        <span>
                                            <?= $esc(t('contact.form.intent_question_hint')) ?>
                                        </span>

                                    </span>


                                    <i
                                        class="
                                            fas
                                            fa-circle-check
                                            adc-contact-intent-check
                                        "
                                        aria-hidden="true"
                                    ></i>


                                </label>


                            </div>


                        </fieldset>



                        <!-- =============================
                             TIMELINE / SCOPE
                        ============================== -->

                        <div class="adc-contact-form-row">


                            <div class="adc-contact-form-group">


                                <label for="prazo">
                                    <?= $esc(t('contact.form.when')) ?>
                                </label>


                                <div class="adc-contact-input-wrap">

                                    <i
                                        class="fas fa-calendar-days"
                                        aria-hidden="true"
                                    ></i>


                                    <select
                                        id="prazo"
                                        name="prazo"
                                    >

                                        <option value="">
                                            <?= $esc(t('contact.form.unknown')) ?>
                                        </option>

                                        <option value="As soon as possible">
                                            <?= $esc(t('contact.form.asap')) ?>
                                        </option>

                                        <option value="This month">
                                            <?= $esc(t('contact.form.this_month')) ?>
                                        </option>

                                        <option value="Next 1-3 months">
                                            <?= $esc(t('contact.form.next_1_3')) ?>
                                        </option>

                                        <option value="Just exploring">
                                            <?= $esc(t('contact.form.exploring')) ?>
                                        </option>

                                    </select>

                                </div>


                                <small class="adc-contact-field-helper">
                                    <?= $esc(t('contact.form.optional')) ?>
                                </small>


                            </div>



                            <div class="adc-contact-form-group">


                                <label for="orcamento">
                                    <?= $esc(t('contact.form.scope')) ?>
                                </label>


                                <div class="adc-contact-input-wrap">

                                    <i
                                        class="fas fa-layer-group"
                                        aria-hidden="true"
                                    ></i>


                                    <select
                                        id="orcamento"
                                        name="orcamento"
                                    >

                                        <option value="">
                                            <?= $esc(t('contact.form.unknown')) ?>
                                        </option>

                                        <option value="Small page / template">
                                            <?= $esc(t('contact.form.scope_small')) ?>
                                        </option>

                                        <option value="Custom website">
                                            <?= $esc(t('contact.form.scope_site')) ?>
                                        </option>

                                        <option value="Full platform">
                                            <?= $esc(t('contact.form.scope_platform')) ?>
                                        </option>

                                        <option value="Not sure yet">
                                            <?= $esc(t('contact.form.scope_guidance')) ?>
                                        </option>

                                    </select>

                                </div>


                                <small class="adc-contact-field-helper">
                                    <?= $esc(t('contact.form.optional')) ?>
                                </small>


                            </div>


                        </div>



                        <!-- =============================
                             SUBJECT
                        ============================== -->

                        <div class="adc-contact-form-group">


                            <label for="assunto">
                                <?= $esc(t('contact.form.subject')) ?>
                            </label>


                            <div class="adc-contact-input-wrap">

                                <i
                                    class="fas fa-heading"
                                    aria-hidden="true"
                                ></i>


                                <input
                                    type="text"

                                    id="assunto"

                                    name="assunto"

                                    placeholder="<?= $esc(t('contact.form.subject_placeholder')) ?>"

                                    maxlength="120"
                                >

                            </div>


                        </div>



                        <!-- =============================
                             MESSAGE
                        ============================== -->

                        <div class="adc-contact-form-group">


                            <label for="mensagem">

                                <?= $esc(t('contact.form.message')) ?>

                                <span class="adc-contact-required">
                                    *
                                </span>

                            </label>


                            <div
                                class="
                                    adc-contact-input-wrap
                                    adc-textarea
                                "
                            >

                                <i
                                    class="fas fa-comment-dots"
                                    aria-hidden="true"
                                ></i>


                                <textarea
                                    id="mensagem"

                                    name="mensagem"

                                    placeholder="<?= $esc(t('contact.form.message_placeholder')) ?>"

                                    required

                                    minlength="20"

                                    maxlength="3000"

                                    aria-describedby="
                                        messageHelp
                                        charCounter
                                    "
                                ></textarea>

                            </div>


                            <div class="adc-contact-message-tools">

                                <span id="messageHelp">
                                    <?= $esc(t('contact.form.message_help')) ?>
                                </span>

                                <span id="charCounter">
                                    0 / 3000
                                </span>

                            </div>



                            <!-- PROMPTS -->

                            <div
                                class="adc-contact-prompts"
                                aria-label="<?= $esc(t('contact.form.prompts_aria')) ?>"
                            >


                                <button
                                    type="button"

                                    class="adc-contact-prompt"

                                    data-prompt="<?= $esc(t('contact.form.prompt_idea_text')) ?>"
                                >
                                    <?= $esc(t('contact.form.prompt_idea')) ?>
                                </button>


                                <button
                                    type="button"

                                    class="adc-contact-prompt"

                                    data-prompt="<?= $esc(t('contact.form.prompt_improve_text')) ?>"
                                >
                                    <?= $esc(t('contact.form.prompt_improve')) ?>
                                </button>


                                <button
                                    type="button"

                                    class="adc-contact-prompt"

                                    data-prompt="<?= $esc(t('contact.form.prompt_opportunity_text')) ?>"
                                >
                                    <?= $esc(t('contact.form.prompt_opportunity')) ?>
                                </button>


                                <button
                                    type="button"

                                    class="adc-contact-prompt"

                                    data-prompt="<?= $esc(t('contact.form.prompt_question_text')) ?>"
                                >
                                    <?= $esc(t('contact.form.prompt_question')) ?>
                                </button>


                            </div>


                        </div>



                        <!-- =============================
                             SMART GUARD
                        ============================== -->

                        <div
                            class="adc-contact-guard"
                            id="smartGuard"

                            role="status"

                            aria-live="polite"
                        >


                            <div class="adc-contact-guard-icon">

                                <i
                                    class="fas fa-shield-halved"
                                    aria-hidden="true"
                                ></i>

                            </div>


                            <div>


                                <strong id="smartGuardTitle">

                                    <?= $esc(t('contact.form.protecting')) ?>

                                </strong>


                                <span
                                    class="adc-contact-guard-text"
                                    id="smartGuardText"
                                >

                                    <?= $esc(t('contact.form.pow_help')) ?>

                                </span>


                            </div>


                            <div
                                class="adc-contact-guard-bar"
                                aria-hidden="true"
                            >

                                <span id="smartGuardProgress"></span>

                            </div>


                        </div>



                        <!-- =============================
                             CONSENT
                        ============================== -->

                        <div class="adc-contact-consent">


                            <input
                                type="checkbox"

                                id="consent"

                                name="consent"

                                value="1"

                                required
                            >


                            <label for="consent">

                                <?= $esc(t('contact.form.consent')) ?>

                            </label>


                        </div>



                        <!-- =============================
                             SUBMIT
                        ============================== -->

                        <button
                            type="submit"

                            class="adc-contact-submit"

                            id="submitBtn"
                        >

                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $esc(t('contact.form.submit')) ?>

                        </button>


                    </form>


                </div>



                <!-- =========================================
                     GUIDE
                ========================================== -->

                <aside
                    class="adc-contact-guide"
                    aria-label="<?= $esc(t('contact.help.aria')) ?>"
                >


                    <div
                        class="adc-contact-guide-block"
                        data-aos="fade-up"
                    >

                        <span class="adc-contact-guide-number">
                            01
                        </span>


                        <h3>
                            <?= $esc(t('contact.help.item1_title')) ?>
                        </h3>


                        <p>

                            <?= $esc(t('contact.help.item1_text')) ?>

                        </p>

                    </div>



                    <div
                        class="adc-contact-guide-block"
                        data-aos="fade-up"
                    >

                        <span class="adc-contact-guide-number">
                            02
                        </span>


                        <h3>
                            <?= $esc(t('contact.help.item2_title')) ?>
                        </h3>


                        <p>

                            <?= $esc(t('contact.help.item2_text')) ?>

                        </p>

                    </div>



                    <div
                        class="adc-contact-guide-block"
                        data-aos="fade-up"
                    >

                        <span class="adc-contact-guide-number">
                            03
                        </span>


                        <h3>
                            <?= $esc(t('contact.help.item3_title')) ?>
                        </h3>


                        <p>

                            <?= $esc(t('contact.help.item3_text')) ?>

                        </p>

                    </div>



                    <!-- DIRECT -->

                    <div
                        class="adc-contact-direct"
                        data-aos="fade-up"
                    >

                        <div class="adc-contact-direct-content">


                            <h3>
                                <?= $esc(t('contact.direct.title')) ?>
                            </h3>


                            <p>

                                <?= $esc(t('contact.direct.text')) ?>

                            </p>



                            <a
                                href="<?= $esc($emailUrl) ?>"
                                class="adc-contact-direct-link"
                            >

                                <span>

                                    <i
                                        class="fas fa-envelope"
                                        aria-hidden="true"
                                    ></i>

                                    &nbsp;

                                    <?= $esc($email) ?>

                                </span>


                                <i
                                    class="fas fa-arrow-right"
                                    aria-hidden="true"
                                ></i>

                            </a>



                            <a
                                href="<?= $esc($whatsappUrl) ?>"

                                target="_blank"

                                rel="noopener noreferrer"

                                class="adc-contact-direct-link"
                            >

                                <span>

                                    <i
                                        class="fab fa-whatsapp"
                                        aria-hidden="true"
                                    ></i>

                                    &nbsp;

                                    <?= $esc($phoneDisplay) ?>

                                </span>


                                <i
                                    class="fas fa-arrow-up-right-from-square"
                                    aria-hidden="true"
                                ></i>

                            </a>



                            <div class="adc-contact-direct-link">


                                <span>
                                    <?= $esc(t('contact.direct.copy_email')) ?>
                                </span>


                                <button
                                    type="button"

                                    class="adc-contact-copy"

                                    data-copy="<?= $esc($email) ?>"

                                    data-copy-label="<?= $esc(t('contact.direct.email_copied')) ?>"
                                >
                                    <?= $esc(t('common.copy')) ?>
                                </button>


                            </div>



                            <div class="adc-contact-direct-link">


                                <span>
                                    <?= $esc(t('contact.direct.copy_phone')) ?>
                                </span>


                                <button
                                    type="button"

                                    class="adc-contact-copy"

                                    data-copy="<?= $esc($phoneDisplay) ?>"

                                    data-copy-label="<?= $esc(t('contact.direct.phone_copied')) ?>"
                                >
                                    <?= $esc(t('common.copy')) ?>
                                </button>


                            </div>


                        </div>

                    </div>


                </aside>


            </div>

        </div>

    </section>



    <!-- ======================================================
         FINAL
    ======================================================= -->

    <section class="adc-contact-final">

        <div class="adc-contact-container">


            <div
                class="adc-contact-final-line"
                data-aos="fade-up"
            >


                <div class="adc-contact-final-copy">


                    <span class="adc-contact-kicker">
                        <?= $esc(t('contact.final.kicker')) ?>
                    </span>


                    <h2>

                        <?= $esc(t('contact.final.title')) ?>

                    </h2>


                    <p>

                        <?= $esc(t('contact.final.text')) ?>

                    </p>


                    <div class="adc-contact-final-actions">

                        <a
                            href="#mensagem-form"
                            class="
                                adc-contact-hero-cta
                                adc-contact-hero-cta-primary
                            "
                        >
                            <i
                                class="fas fa-paper-plane"
                                aria-hidden="true"
                            ></i>

                            <?= $esc(t('contact.final.primary_cta')) ?>
                        </a>


                        <a
                            href="<?= $esc($servicesUrl) ?>"
                            class="
                                adc-contact-hero-cta
                                adc-contact-hero-cta-secondary
                            "
                        >
                            <i
                                class="fas fa-code"
                                aria-hidden="true"
                            ></i>

                            <?= $esc(t('contact.final.secondary_cta')) ?>
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


    const contactI18n =
        <?= json_encode(
            [
                'preparedFor' => t('contact.js.prepared_for'),
                'suggestionAdded' => t('contact.js.suggestion_added'),
                'copied' => t('contact.js.copied'),
                'copyFailed' => t('contact.js.copy_failed'),
                'guardUnavailableTitle' => t('contact.js.guard_unavailable_title'),
                'guardUnavailableText' => t('contact.js.guard_unavailable_text'),
                'guardProtectingTitle' => t('contact.form.protecting'),
                'guardProtectingText' => t('contact.js.guard_protecting_text'),
                'guardReadyTitle' => t('contact.js.guard_ready_title'),
                'guardReadyText' => t('contact.js.guard_ready_text'),
                'guardFailedTitle' => t('contact.js.guard_failed_title'),
                'guardFailedText' => t('contact.js.guard_failed_text'),
                'invalidForm' => t('contact.js.invalid_form'),
                'verifyingSecurity' => t('contact.js.verifying_security'),
                'sendMessage' => t('contact.form.submit'),
                'securityFailed' => t('contact.js.security_failed'),
                'sending' => t('contact.js.sending'),
                'sendingAnnounce' => t('contact.js.sending_announce'),
            ],
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
        ) ?>;


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
       ELEMENTS
    ======================================================= */

    const progressBar =
        document.getElementById(
            'adcContactProgress'
        );


    const form =
        document.getElementById(
            'smartContactForm'
        );


    const messageBox =
        document.getElementById(
            'mensagem'
        );


    const charCounter =
        document.getElementById(
            'charCounter'
        );


    const subjectInput =
        document.getElementById(
            'assunto'
        );


    const submitBtn =
        document.getElementById(
            'submitBtn'
        );


    const announcer =
        document.getElementById(
            'contactAnnouncer'
        );


    const board =
        document.getElementById(
            'adcContactBoard'
        );


    const hero =
        document.querySelector(
            '.adc-contact-hero'
        );



    /* ======================================================
       ANNOUNCER
    ======================================================= */

    function announce(message) {

        if (!announcer) {
            return;
        }


        announcer.textContent = '';


        window.setTimeout(
            function () {

                announcer.textContent =
                    message;

            },
            50
        );

    }



    /* ======================================================
       SCROLL PROGRESS
    ======================================================= */

    function updateProgress() {

        if (!progressBar) {
            return;
        }


        const docHeight =
            document.documentElement.scrollHeight
            - window.innerHeight;


        const progress =
            docHeight > 0

                ? (
                    window.scrollY
                    / docHeight
                ) * 100

                : 0;


        progressBar.style.width =
            progress + '%';

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
       HERO MOVEMENT
    ======================================================= */

    if (
        hero
        && board
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
                    / 70;


                const y =
                    (
                        event.clientY
                        - rect.top
                        - rect.height / 2
                    )
                    / 70;


                board.style.transform =
                    `translate(${x}px, ${y}px)`;

            }
        );


        hero.addEventListener(
            'mouseleave',
            function () {

                board.style.transform =
                    'translate(0, 0)';

            }
        );

    }



    /* ======================================================
       QUICK START

       Seleciona o tipo existente do formulário.
       Não altera valores enviados ao backend.
    ======================================================= */

    document
        .querySelectorAll(
            '[data-contact-start]'
        )
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const intent =
                            button.dataset.intent
                            || '';


                        const subject =
                            button.dataset.subject
                            || '';


                        const placeholder =
                            button.dataset.placeholder
                            || '';


                        const radio =
                            form?.querySelector(
                                'input[name="tipo"][value="'
                                + CSS.escape(intent)
                                + '"]'
                            );


                        if (radio) {

                            radio.checked = true;


                            radio.dispatchEvent(
                                new Event(
                                    'change',
                                    {
                                        bubbles: true
                                    }
                                )
                            );

                        }


                        if (
                            subjectInput
                            && !subjectInput.value.trim()
                        ) {

                            subjectInput.value =
                                subject;

                        }


                        if (
                            messageBox
                            && placeholder
                        ) {

                            messageBox.placeholder =
                                placeholder;

                        }


                        document
                            .getElementById(
                                'mensagem-form'
                            )
                            ?.scrollIntoView({

                                behavior:
                                    'smooth',

                                block:
                                    'start'

                            });


                        window.setTimeout(
                            function () {

                                document
                                    .getElementById(
                                        'nome'
                                    )
                                    ?.focus();

                            },
                            600
                        );


                        announce(
                            contactI18n.preparedFor
                            + subject
                        );

                    }
                );

            }
        );



    /* ======================================================
       AUDITORIA EXPRESS — PREFILL VIA URL
    ======================================================= */

    const auditParams =
        new URLSearchParams(
            window.location.search
        );

    if (
        auditParams.get('auditoria') === '1'
        && form
    ) {

        const auditPlan =
            auditParams.get('pacote_nome')
            || auditParams.get('pacote')
            || '';

        const auditPrice =
            auditParams.get('preco')
            || '';

        const auditSite =
            auditParams.get('site')
            || '';

        const projectRadio =
            form.querySelector(
                'input[name="tipo"][value="Project / Website"]'
            );

        if (projectRadio) {
            projectRadio.checked = true;
            projectRadio.dispatchEvent(
                new Event(
                    'change',
                    {
                        bubbles: true
                    }
                )
            );
        }

        if (subjectInput) {
            subjectInput.value =
                'Auditoria Express — '
                + auditPlan;
        }

        if (messageBox) {

            const auditMessages = {
                pt:
                    'Quero solicitar uma Auditoria Express AlexDevCode.\n\n'
                    + 'Pacote: ' + auditPlan
                    + (auditPrice ? ' (' + auditPrice + ')' : '')
                    + '\nSite: ' + (auditSite || 'a indicar')
                    + '\n\nObjetivo: perceber os principais problemas e prioridades do site.',

                en:
                    'I would like to request an AlexDevCode Express Audit.\n\n'
                    + 'Package: ' + auditPlan
                    + (auditPrice ? ' (' + auditPrice + ')' : '')
                    + '\nWebsite: ' + (auditSite || 'to be provided')
                    + '\n\nGoal: identify the main issues and priorities for the website.',

                es:
                    'Quiero solicitar una Auditoría Express AlexDevCode.\n\n'
                    + 'Paquete: ' + auditPlan
                    + (auditPrice ? ' (' + auditPrice + ')' : '')
                    + '\nSitio: ' + (auditSite || 'por indicar')
                    + '\n\nObjetivo: identificar los principales problemas y prioridades del sitio.'
            };

            const currentLang =
                (
                    document.documentElement.lang
                    || 'pt'
                )
                .slice(0, 2)
                .toLowerCase();

            messageBox.value =
                auditMessages[currentLang]
                || auditMessages.pt;

            messageBox.dispatchEvent(
                new Event(
                    'input',
                    {
                        bubbles: true
                    }
                )
            );
        }

        const deadline =
            document.getElementById(
                'prazo'
            );

        if (
            deadline
            && !deadline.value
        ) {
            deadline.value =
                'As soon as possible';
        }

        const scope =
            document.getElementById(
                'orcamento'
            );

        if (
            scope
            && !scope.value
        ) {
            scope.value =
                'Small page / template';
        }

        window.setTimeout(
            function () {

                document
                    .getElementById(
                        'mensagem-form'
                    )
                    ?.scrollIntoView({

                        behavior:
                            'smooth',

                        block:
                            'start'

                    });

            },
            250
        );
    }


    /* ======================================================
       MESSAGE COUNTER
    ======================================================= */

    function updateCharCounter() {

        if (
            !messageBox
            || !charCounter
        ) {

            return;

        }


        const count =
            messageBox.value.length;


        charCounter.textContent =
            count + ' / 3000';

    }


    if (messageBox) {

        messageBox.addEventListener(
            'input',
            updateCharCounter
        );


        updateCharCounter();

    }



    /* ======================================================
       PROMPTS
    ======================================================= */

    document
        .querySelectorAll(
            '.adc-contact-prompt'
        )
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        if (!messageBox) {
                            return;
                        }


                        const prompt =
                            button.dataset.prompt
                            || '';


                        if (
                            messageBox.value.trim()
                        ) {

                            messageBox.value +=
                                '\n\n' + prompt;

                        } else {

                            messageBox.value =
                                prompt;

                        }


                        messageBox.focus();


                        messageBox.setSelectionRange(
                            messageBox.value.length,
                            messageBox.value.length
                        );


                        updateCharCounter();


                        announce(
                            contactI18n.suggestionAdded
                        );

                    }
                );

            }
        );



    /* ======================================================
       COPY CONTACT
    ======================================================= */

    document
        .querySelectorAll(
            '[data-copy]'
        )
        .forEach(
            function (button) {

                button.addEventListener(
                    'click',
                    async function () {

                        const value =
                            button.dataset.copy
                            || '';


                        const label =
                            button.dataset.copyLabel
                            || contactI18n.copied;


                        try {

                            await navigator.clipboard.writeText(
                                value
                            );


                            const oldText =
                                button.textContent;


                            button.textContent =
                                contactI18n.copied;


                            announce(
                                label
                            );


                            window.setTimeout(
                                function () {

                                    button.textContent =
                                        oldText;

                                },
                                1600
                            );

                        } catch (error) {

                            announce(
                                contactI18n.copyFailed
                            );

                        }

                    }
                );

            }
        );



    /* ======================================================
       SMART GUARD
    ======================================================= */

    const smartGuard =
        document.getElementById(
            'smartGuard'
        );


    const smartGuardTitle =
        document.getElementById(
            'smartGuardTitle'
        );


    const smartGuardText =
        document.getElementById(
            'smartGuardText'
        );


    const smartGuardProgress =
        document.getElementById(
            'smartGuardProgress'
        );


    const powNonceInput =
        document.getElementById(
            'powNonce'
        );


    const powHashInput =
        document.getElementById(
            'powHash'
        );


    const powSeed =
        <?= json_encode(
            $powSeed,
            JSON_UNESCAPED_SLASHES
            | JSON_UNESCAPED_UNICODE
        ) ?>;


    const powDifficulty =
        <?= (int) $powDifficulty ?>;


    const powTarget =
        '0'.repeat(
            powDifficulty
        );


    let guardReady =
        false;


    let guardSolving =
        false;


    let formSubmitting =
        false;



    /* ======================================================
       SHA256
    ======================================================= */

    async function sha256Hex(message) {

        const encoded =
            new TextEncoder()
                .encode(
                    message
                );


        const hashBuffer =
            await crypto.subtle.digest(
                'SHA-256',
                encoded
            );


        const hashArray =
            Array.from(
                new Uint8Array(
                    hashBuffer
                )
            );


        return hashArray

            .map(
                function (byte) {

                    return byte

                        .toString(16)

                        .padStart(
                            2,
                            '0'
                        );

                }
            )

            .join('');

    }



    /* ======================================================
       GUARD STATE
    ======================================================= */

    function setGuardState(
        state,
        title,
        text,
        progress
    ) {

        if (!smartGuard) {
            return;
        }


        smartGuard.classList.remove(
            'ready',
            'failed'
        );


        if (state) {

            smartGuard.classList.add(
                state
            );

        }


        if (smartGuardTitle) {

            smartGuardTitle.textContent =
                title;

        }


        if (smartGuardText) {

            smartGuardText.textContent =
                text;

        }


        if (smartGuardProgress) {

            smartGuardProgress.style.width =
                progress + '%';

        }

    }



    /* ======================================================
       SOLVE SMART GUARD
    ======================================================= */

    async function solveSmartGuard() {

        if (
            guardReady
            || guardSolving
        ) {

            return guardReady;

        }


        if (
            !window.crypto
            || !window.crypto.subtle
        ) {

            setGuardState(

                'failed',

                contactI18n.guardUnavailableTitle,

                contactI18n.guardUnavailableText,

                100

            );


            return false;

        }


        guardSolving =
            true;


        setGuardState(

            '',

            contactI18n.guardProtectingTitle,

            contactI18n.guardProtectingText,

            18

        );


        let nonce =
            Math.floor(
                Math.random()
                * 1000000
            );


        let attempts =
            0;


        const maxAttempts =
            600000;


        while (
            attempts
            < maxAttempts
        ) {


            for (
                let i = 0;
                i < 80;
                i++
            ) {


                const hash =
                    await sha256Hex(
                        `${powSeed}:${nonce}`
                    );


                if (
                    hash.startsWith(
                        powTarget
                    )
                ) {

                    powNonceInput.value =
                        String(
                            nonce
                        );


                    powHashInput.value =
                        hash;


                    guardReady =
                        true;


                    guardSolving =
                        false;


                    setGuardState(

                        'ready',

                        contactI18n.guardReadyTitle,

                        contactI18n.guardReadyText,

                        100

                    );


                    return true;

                }


                nonce++;

                attempts++;

            }


            const progress =
                Math.min(

                    92,

                    18
                    + Math.floor(
                        (
                            attempts
                            / maxAttempts
                        )
                        * 74
                    )

                );


            if (smartGuardProgress) {

                smartGuardProgress.style.width =
                    progress + '%';

            }


            await new Promise(
                function (resolve) {

                    setTimeout(
                        resolve,
                        0
                    );

                }
            );

        }


        guardSolving =
            false;


        setGuardState(

            'failed',

            contactI18n.guardFailedTitle,

            contactI18n.guardFailedText,

            100

        );


        return false;

    }



    /* ======================================================
       START GUARD
    ======================================================= */

    solveSmartGuard();



    /* ======================================================
       FORM SUBMIT
    ======================================================= */

    if (form) {

        form.addEventListener(
            'submit',
            async function (event) {

                if (formSubmitting) {
                    return;
                }


                if (
                    !form.checkValidity()
                ) {

                    event.preventDefault();


                    form.reportValidity();


                    const invalidField =
                        form.querySelector(
                            ':invalid'
                        );


                    if (invalidField) {

                        invalidField.focus();

                    }


                    announce(
                        contactI18n.invalidForm
                    );


                    return;

                }


                if (!guardReady) {

                    event.preventDefault();


                    submitBtn.disabled =
                        true;


                    submitBtn.innerHTML =

                        '<i class="fa-solid fa-spinner fa-spin"></i>'
                        + ' ' + contactI18n.verifyingSecurity;


                    const solved =
                        await solveSmartGuard();


                    if (!solved) {

                        submitBtn.disabled =
                            false;


                        submitBtn.innerHTML =

                            '<i class="fa-solid fa-paper-plane"></i>'
                            + ' ' + contactI18n.sendMessage;


                        announce(
                            contactI18n.securityFailed
                        );


                        return;

                    }


                    submitBtn.disabled =
                        false;


                    submitBtn.innerHTML =

                        '<i class="fa-solid fa-paper-plane"></i>'
                        + ' ' + contactI18n.sendMessage;


                    form.requestSubmit();


                    return;

                }


                formSubmitting =
                    true;


                submitBtn.disabled =
                    true;


                submitBtn.innerHTML =

                    '<i class="fa-solid fa-spinner fa-spin"></i>'
                    + ' ' + contactI18n.sending;


                announce(
                    contactI18n.sendingAnnounce
                );

            }
        );

    }



    /* ======================================================
       REMOVE FLASH
    ======================================================= */

    window.setTimeout(
        function () {

            const toast =
                document.getElementById(
                    'flashToast'
                );


            if (toast) {

                toast.remove();

            }

        },
        6500
    );

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
        'Footer include failed: '
        . $e->getMessage()
    );

}

?>