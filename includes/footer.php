<?php

/* ==========================================================
   ALEXDEVCODE
   FOOTER GLOBAL

   - PT / EN / ES pelo motor global
   - Mobile-first
   - Sem traduções duplicadas
   - Sem fallback local
========================================================== */

if (!function_exists('t')) {
    require_once __DIR__ . '/i18n.php';
}

$year = date('Y');


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
   URLs
========================================================== */

$homeUrl = adc_url('index.php');
$servicesUrl = adc_url('solucoes.php');
$projectsUrl = adc_url('projetos.php');
$aboutUrl = adc_url('sobre.php');
$contactUrl = adc_url('contato.php?utm_source=website&utm_medium=organic&utm_campaign=footer');
$templatesUrl = adc_url('templates.php');
$radarUrl = adc_url('oportunidades.php');
$guideUrl = adc_url('performance-mini-guide.php?utm_source=website&utm_medium=organic&utm_campaign=footer_guide');
$privacyUrl = adc_url('politica.php');
$helpUrl = adc_url('ajuda.php');

$demoFirstUrl = adc_demofirst_url();

?>

<footer
    class="adc-footer"
    id="site-footer"
>

    <div class="adc-footer-shell">


        <!-- ==================================================
             CONTEÚDO PRINCIPAL
        =================================================== -->

        <div class="adc-footer-main">


            <!-- ==============================================
                 MARCA
            =============================================== -->

            <section class="adc-footer-brand">

                <a
                    href="<?= $e($homeUrl) ?>"
                    class="adc-footer-logo"
                    aria-label="AlexDevCode"
                >

                    <span
                        class="adc-footer-logo-symbol"
                        aria-hidden="true"
                    >
                        &lt;/&gt;
                    </span>

                    <span class="adc-footer-logo-text">
                        Alex<span>Dev</span>Code
                    </span>

                </a>


                <p class="adc-footer-description">
                    <?= $e(t('footer.positioning')) ?>
                </p>


                <a
                    href="<?= $e($contactUrl) ?>"
                    class="adc-footer-status"
                >

                    <span
                        class="adc-footer-status-dot"
                        aria-hidden="true"
                    ></span>

                    <span>
                        <?= $e(t('footer.availability')) ?>
                    </span>

                </a>

            </section>



            <!-- ==============================================
                 NAVEGAÇÃO
            =============================================== -->

            <div class="adc-footer-navigation">


                <!-- EXPLORAR -->

                <section class="adc-footer-column">

                    <h2>
                        <?= $e(t('footer.explore')) ?>
                    </h2>


                    <nav
                        aria-label="<?= $e(t('footer.explore')) ?>"
                    >

                        <a href="<?= $e($servicesUrl) ?>">
                            <?= $e(t('footer.services')) ?>
                        </a>

                        <a href="<?= $e($projectsUrl) ?>">
                            <?= $e(t('footer.projects')) ?>
                        </a>

                        <a href="<?= $e($aboutUrl) ?>">
                            <?= $e(t('footer.about')) ?>
                        </a>

                        <a href="<?= $e($contactUrl) ?>">
                            <?= $e(t('footer.contact')) ?>
                        </a>

                    </nav>

                </section>



                <!-- ECOSSISTEMA -->

                <section class="adc-footer-column">

                    <h2>
                        <?= $e(t('footer.ecosystem')) ?>
                    </h2>


                    <nav
                        aria-label="<?= $e(t('footer.ecosystem')) ?>"
                    >

                        <a
                            href="<?= $e($demoFirstUrl) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="adc-footer-demo"
                        >

                            <span>DemoFirst</span>

                            <i
                                class="fa-solid fa-arrow-up-right-from-square"
                                aria-hidden="true"
                            ></i>

                        </a>


                        <a href="<?= $e($templatesUrl) ?>">
                            <?= $e(t('footer.templates')) ?>
                        </a>


                        <a href="<?= $e($radarUrl) ?>">
                            <?= $e(t('footer.radar')) ?>
                        </a>

                        <a href="<?= $e($guideUrl) ?>">
                            Mini Guide
                        </a>

                    </nav>

                </section>

            </div>



            <!-- ==============================================
                 CONTACTO
            =============================================== -->

            <section class="adc-footer-connect">

                <h2>
                    <?= $e(t('footer.connect')) ?>
                </h2>


                <a
                    href="<?= $e($contactUrl) ?>"
                    class="adc-footer-cta"
                >

                    <span>
                        <?= $e(t('footer.project_cta')) ?>
                    </span>

                    <i
                        class="fa-solid fa-arrow-right"
                        aria-hidden="true"
                    ></i>

                </a>


                <a
                    href="mailto:contact@alexdevcode.com"
                    class="adc-footer-email"
                >
                    contact@alexdevcode.com
                </a>


                <div
                    class="adc-footer-social"
                    aria-label="<?= $e(t('footer.social_label')) ?>"
                >

                    <a
                        href="https://www.linkedin.com/in/alex-rodrigues-1345a11a5/"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="LinkedIn"
                        title="LinkedIn"
                    >
                        <i
                            class="fa-brands fa-linkedin-in"
                            aria-hidden="true"
                        ></i>
                    </a>


                    <a
                        href="https://github.com/AlexRodrigues-web"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="GitHub"
                        title="GitHub"
                    >
                        <i
                            class="fa-brands fa-github"
                            aria-hidden="true"
                        ></i>
                    </a>


                    <a
                        href="mailto:contact@alexdevcode.com"
                        aria-label="Email"
                        title="Email"
                    >
                        <i
                            class="fa-solid fa-envelope"
                            aria-hidden="true"
                        ></i>
                    </a>


                    <a
                        href="https://wa.me/351932121766"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="WhatsApp"
                        title="WhatsApp"
                    >
                        <i
                            class="fa-brands fa-whatsapp"
                            aria-hidden="true"
                        ></i>
                    </a>

                </div>


                <p class="adc-footer-location">

                    <i
                        class="fa-solid fa-location-dot"
                        aria-hidden="true"
                    ></i>

                    <span>
                        <?= $e(t('footer.location')) ?>
                    </span>

                </p>

            </section>

        </div>



        <!-- ==================================================
             RODAPÉ INFERIOR
        =================================================== -->

        <div class="adc-footer-bottom">

            <p class="adc-footer-copyright">

                &copy;
                <?= $e((string) $year) ?>

                <strong>AlexDevCode</strong>.

                <?= $e(t('footer.rights')) ?>

            </p>


            <nav
                class="adc-footer-legal"
                aria-label="<?= $e(t('footer.legal_nav')) ?>"
            >

                <a href="<?= $e($privacyUrl) ?>">
                    <?= $e(t('footer.privacy')) ?>
                </a>

                <a href="<?= $e($helpUrl) ?>">
                    <?= $e(t('footer.help')) ?>
                </a>

            </nav>

        </div>

    </div>



    <!-- ======================================================
         VOLTAR AO TOPO
    ======================================================= -->

    <button
        type="button"
        id="adcFooterTop"
        class="adc-footer-top"
        aria-label="<?= $e(t('footer.back_top')) ?>"
        title="<?= $e(t('footer.back_top')) ?>"
    >

        <i
            class="fa-solid fa-arrow-up"
            aria-hidden="true"
        ></i>

    </button>

</footer>



<script>
(() => {

    'use strict';

    const button =
        document.getElementById('adcFooterTop');

    if (!button) {
        return;
    }


    const reducedMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        );


    const updateButton = () => {

        button.classList.toggle(
            'is-visible',
            window.scrollY > 420
        );

    };


    updateButton();


    window.addEventListener(
        'scroll',
        updateButton,
        {
            passive: true
        }
    );


    button.addEventListener(
        'click',
        () => {

            window.scrollTo({

                top: 0,

                behavior:
                    reducedMotion.matches
                        ? 'auto'
                        : 'smooth'

            });

        }
    );

})();
</script>



<style>

/* ==========================================================
   ALEXDEVCODE
   FOOTER GLOBAL
   MOBILE-FIRST
========================================================== */

.adc-footer {

    --adc-footer-bg: #111111;

    --adc-footer-text:
        #f5f1ed;

    --adc-footer-muted:
        rgba(245, 241, 237, .64);

    --adc-footer-border:
        rgba(245, 241, 237, .11);

    --adc-footer-surface:
        rgba(255, 255, 255, .055);


    position: relative;

    overflow: hidden;


    background:

        radial-gradient(
            circle at 5% 0%,
            rgba(139, 115, 93, .16),
            transparent 32%
        ),

        var(--adc-footer-bg);


    color:
        var(--adc-footer-text);


    border-top:
        3px solid
        var(--accent, #8b735d);


    padding:
        2.7rem 1.15rem
        1.15rem;

}



/* ==========================================================
   CONTAINER
========================================================== */

.adc-footer-shell {

    width: 100%;

    max-width: 1180px;

    margin: 0 auto;

}



/* ==========================================================
   ESTRUTURA PRINCIPAL
========================================================== */

.adc-footer-main {

    display: grid;

    grid-template-columns:
        minmax(0, 1fr);

    gap: 2.25rem;

}



/* ==========================================================
   MARCA
========================================================== */

.adc-footer-brand {

    max-width: 430px;

}


.adc-footer-logo {

    display: inline-flex;

    align-items: center;

    gap: .72rem;


    color: #fff;

    text-decoration: none;

}


.adc-footer-logo-symbol {

    display: inline-flex;

    align-items: center;

    justify-content: center;


    width: 42px;

    height: 42px;

    flex: 0 0 42px;


    border-radius: 12px;


    background:
        var(--accent, #8b735d);


    color: #fff;


    font-family:
        Consolas,
        Monaco,
        monospace;


    font-size: .8rem;

    font-weight: 800;


    box-shadow:
        0 8px 22px
        rgba(0, 0, 0, .22);

}


.adc-footer-logo-text {

    font-family:
        'Oswald',
        sans-serif;


    font-size: 1.72rem;

    font-weight: 700;

    line-height: 1;


    letter-spacing: -.035em;

}


.adc-footer-logo-text span {

    color:
        var(
            --light-accent,
            #c6b8a9
        );

}



/* ==========================================================
   DESCRIÇÃO
========================================================== */

.adc-footer-description {

    max-width: 400px;


    margin:
        1rem 0 0;


    color:
        var(--adc-footer-muted);


    font-size: .87rem;

    line-height: 1.65;

}



/* ==========================================================
   DISPONIBILIDADE
========================================================== */

.adc-footer-status {

    display: inline-flex;

    align-items: center;

    gap: .55rem;


    margin-top: 1rem;


    color:
        var(--adc-footer-text);


    text-decoration: none;


    font-size: .8rem;

    font-weight: 600;


    transition:
        color .2s ease;

}


.adc-footer-status:hover {

    color:
        var(
            --light-accent,
            #c6b8a9
        );

}


.adc-footer-status-dot {

    width: 8px;

    height: 8px;

    flex: 0 0 8px;


    border-radius: 50%;


    background:
        #66c987;


    box-shadow:
        0 0 0 4px
        rgba(102, 201, 135, .11);

}



/* ==========================================================
   NAVEGAÇÃO
========================================================== */

.adc-footer-navigation {

    display: grid;


    grid-template-columns:
        repeat(
            2,
            minmax(0, 1fr)
        );


    gap: 1.7rem;

}


.adc-footer-column h2,
.adc-footer-connect h2 {

    margin:
        0 0 .85rem;


    color: #fff;


    font-family:
        'Poppins',
        sans-serif;


    font-size: .7rem;

    font-weight: 700;


    letter-spacing: .1em;


    text-transform: uppercase;

}


.adc-footer-column nav {

    display: flex;

    flex-direction: column;

    align-items: flex-start;


    gap: .64rem;

}


.adc-footer-column a {

    color:
        var(--adc-footer-muted);


    text-decoration: none;


    font-size: .84rem;

    line-height: 1.4;


    transition:
        color .2s ease,
        transform .2s ease;

}


.adc-footer-column a:hover {

    color: #fff;


    transform:
        translateX(3px);

}


.adc-footer-demo {

    display: inline-flex;

    align-items: center;

    gap: .4rem;

}


.adc-footer-demo i {

    font-size: .62rem;

}



/* ==========================================================
   CONTACTO
========================================================== */

.adc-footer-connect {

    display: flex;

    flex-direction: column;

    align-items: flex-start;

}



/* ==========================================================
   CTA
========================================================== */

.adc-footer-cta {

    display: inline-flex;

    align-items: center;

    justify-content: center;


    gap: .7rem;


    min-height: 42px;


    padding:
        .68rem .95rem;


    border-radius: 10px;


    background:
        #f7f5f2;


    color:
        #171717;


    text-decoration: none;


    font-size: .8rem;

    font-weight: 700;


    transition:
        transform .2s ease,
        background .2s ease;

}


.adc-footer-cta:hover {

    transform:
        translateY(-2px);


    background:
        var(
            --light-accent,
            #c6b8a9
        );

}



/* ==========================================================
   EMAIL
========================================================== */

.adc-footer-email {

    margin-top: .9rem;


    color:
        var(--adc-footer-muted);


    text-decoration: none;


    font-size: .78rem;


    overflow-wrap: anywhere;


    transition:
        color .2s ease;

}


.adc-footer-email:hover {

    color: #fff;

}



/* ==========================================================
   REDES SOCIAIS
========================================================== */

.adc-footer-social {

    display: flex;

    flex-wrap: wrap;


    gap: .5rem;


    margin-top: 1rem;

}


.adc-footer-social a {

    display: inline-flex;

    align-items: center;

    justify-content: center;


    width: 36px;

    height: 36px;


    border:
        1px solid
        var(--adc-footer-border);


    border-radius: 10px;


    background:
        var(--adc-footer-surface);


    color: #fff;


    text-decoration: none;


    transition:
        background .2s ease,
        border-color .2s ease,
        transform .2s ease;

}


.adc-footer-social a:hover {

    transform:
        translateY(-2px);


    background:
        rgba(139, 115, 93, .25);


    border-color:
        rgba(198, 184, 169, .35);

}


.adc-footer-social i {

    font-size: .95rem;

}



/* ==========================================================
   LOCALIZAÇÃO
========================================================== */

.adc-footer-location {

    display: inline-flex;

    align-items: center;


    gap: .45rem;


    margin:
        1rem 0 0;


    color:
        var(--adc-footer-muted);


    font-size: .77rem;

}


.adc-footer-location i {

    color:
        var(
            --light-accent,
            #c6b8a9
        );


    font-size: .75rem;

}



/* ==========================================================
   RODAPÉ INFERIOR
========================================================== */

.adc-footer-bottom {

    display: flex;

    flex-direction: column;


    gap: .75rem;


    margin-top: 2.4rem;


    padding-top: 1.1rem;


    border-top:
        1px solid
        var(--adc-footer-border);


    color:
        var(--adc-footer-muted);


    font-size: .72rem;

}


.adc-footer-bottom p {

    margin: 0;

}


.adc-footer-bottom strong {

    color:
        var(
            --light-accent,
            #c6b8a9
        );


    font-weight: 600;

}



/* ==========================================================
   LEGAL
========================================================== */

.adc-footer-legal {

    display: flex;

    flex-wrap: wrap;


    gap: 1rem;

}


.adc-footer-legal a {

    color:
        var(--adc-footer-muted);


    text-decoration: none;


    transition:
        color .2s ease;

}


.adc-footer-legal a:hover {

    color: #fff;

}



/* ==========================================================
   VOLTAR AO TOPO
========================================================== */

.adc-footer-top {

    position: fixed;


    right: 1rem;

    bottom: 1rem;


    z-index: 900;


    display: flex;

    align-items: center;

    justify-content: center;


    width: 42px;

    height: 42px;


    padding: 0;


    border:
        1px solid
        rgba(255, 255, 255, .18);


    border-radius: 50%;


    background:
        var(
            --accent,
            #8b735d
        );


    color: #fff;


    cursor: pointer;


    box-shadow:
        0 8px 22px
        rgba(0, 0, 0, .25);


    opacity: 0;

    visibility: hidden;


    transform:
        translateY(12px);


    transition:
        opacity .2s ease,
        visibility .2s ease,
        transform .2s ease,
        background .2s ease;

}


.adc-footer-top.is-visible {

    opacity: 1;

    visibility: visible;


    transform:
        translateY(0);

}


.adc-footer-top:hover {

    background:
        var(
            --accent-dk,
            #6e5845
        );

}



/* ==========================================================
   FOCO / ACESSIBILIDADE
========================================================== */

.adc-footer a:focus-visible,
.adc-footer button:focus-visible {

    outline:
        2px solid
        var(
            --light-accent,
            #c6b8a9
        );


    outline-offset: 4px;

}



/* ==========================================================
   TABLET
========================================================== */

@media (min-width: 720px) {

    .adc-footer {

        padding:
            3rem 1.6rem
            1.2rem;

    }


    .adc-footer-main {

        grid-template-columns:
            minmax(0, 1.2fr)
            minmax(0, 1fr);


        column-gap: 3rem;

        row-gap: 2.2rem;

    }


    .adc-footer-connect {

        grid-column:
            1 / -1;

    }


    .adc-footer-bottom {

        flex-direction: row;


        justify-content:
            space-between;


        align-items:
            center;

    }

}



/* ==========================================================
   DESKTOP
========================================================== */

@media (min-width: 980px) {

    .adc-footer {

        padding:
            3rem 2rem
            1.25rem;

    }


    .adc-footer-main {

        grid-template-columns:
            minmax(0, 1.25fr)
            minmax(300px, 1fr)
            minmax(230px, .75fr);


        align-items: start;


        gap: 4rem;

    }


    .adc-footer-connect {

        grid-column: auto;

    }

}



/* ==========================================================
   MOBILE PEQUENO
========================================================== */

@media (max-width: 420px) {

    .adc-footer {

        padding-left: 1rem;

        padding-right: 1rem;

    }


    .adc-footer-navigation {

        gap: 1.15rem;

    }


    .adc-footer-logo-text {

        font-size: 1.55rem;

    }


    .adc-footer-cta {

        width: 100%;

    }

}



/* ==========================================================
   REDUCED MOTION
========================================================== */

@media (prefers-reduced-motion: reduce) {

    .adc-footer *,
    .adc-footer *::before,
    .adc-footer *::after {

        transition:
            none !important;


        scroll-behavior:
            auto !important;

    }

}

</style>