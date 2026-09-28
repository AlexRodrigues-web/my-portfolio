<?php
require_once __DIR__ . '/includes/i18n.php';

$lang = adc_lang();

$copy = [
    'pt' => [
        'title' => 'Links AlexDevCode | Sites, Auditoria e Soluções',
        'description' => 'Links oficiais da AlexDevCode: auditoria grátis, serviços, projetos e contacto.',
        'eyebrow' => 'AlexDevCode · links oficiais',
        'h1' => 'Transformo problemas digitais em soluções <span>que funcionam.</span>',
        'intro' => 'Sites, sistemas, automações e auditorias para negócios que querem melhorar a sua presença digital.',
        'audit' => 'Analisar o meu site grátis',
        'audit_sub' => 'Mini-auditoria automática em segundos.',
        'paid' => 'Auditoria Express — desde 19 €',
        'paid_sub' => 'Relatório completo com prioridades.',
        'services' => 'Ver serviços',
        'services_sub' => 'Sites, sistemas, APIs e automações.',
        'projects' => 'Ver projetos',
        'projects_sub' => 'Projetos reais e demos da AlexDevCode.',
        'contact' => 'Falar comigo',
        'contact_sub' => 'Conte-me o que precisa.',
        'follow' => 'AlexDevCode · Porto / Gaia · Portugal',
    ],
    'en' => [
        'title' => 'AlexDevCode Links | Websites, Audits and Solutions',
        'description' => 'Official AlexDevCode links: free audit, services, projects and contact.',
        'eyebrow' => 'AlexDevCode · official links',
        'h1' => 'I turn digital problems into solutions <span>that work.</span>',
        'intro' => 'Websites, systems, automations and audits for businesses improving their digital presence.',
        'audit' => 'Audit my website for free',
        'audit_sub' => 'Automatic mini-audit in seconds.',
        'paid' => 'Express Audit — from €19',
        'paid_sub' => 'Complete report with priorities.',
        'services' => 'View services',
        'services_sub' => 'Websites, systems, APIs and automation.',
        'projects' => 'View projects',
        'projects_sub' => 'Real projects and AlexDevCode demos.',
        'contact' => 'Talk to me',
        'contact_sub' => 'Tell me what you need.',
        'follow' => 'AlexDevCode · Porto / Gaia · Portugal',
    ],
    'es' => [
        'title' => 'Links AlexDevCode | Sitios, Auditoría y Soluciones',
        'description' => 'Links oficiales de AlexDevCode: auditoría gratis, servicios, proyectos y contacto.',
        'eyebrow' => 'AlexDevCode · enlaces oficiales',
        'h1' => 'Transformo problemas digitales en soluciones <span>que funcionan.</span>',
        'intro' => 'Sitios, sistemas, automatizaciones y auditorías para negocios que quieren mejorar su presencia digital.',
        'audit' => 'Analizar mi sitio gratis',
        'audit_sub' => 'Mini auditoría automática en segundos.',
        'paid' => 'Auditoría Express — desde 19 €',
        'paid_sub' => 'Informe completo con prioridades.',
        'services' => 'Ver servicios',
        'services_sub' => 'Sitios, sistemas, APIs y automatizaciones.',
        'projects' => 'Ver proyectos',
        'projects_sub' => 'Proyectos reales y demos de AlexDevCode.',
        'contact' => 'Hablar conmigo',
        'contact_sub' => 'Cuéntame qué necesitas.',
        'follow' => 'AlexDevCode · Porto / Gaia · Portugal',
    ],
];

$c = $copy[$lang] ?? $copy['pt'];

$adcPageMetaOverride = [
    'title' => $c['title'],
    'description' => $c['description'],
    'image' => 'https://alexdevcode.com/assets/img/alex-perfil.png',
    'path' => 'links',
];

require_once __DIR__ . '/includes/header.php';

$e = static fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<style>
.adc-links{max-width:760px;margin:auto;padding:2rem 1rem 4rem;color:#181818}
.adc-links-hero{text-align:center;padding:2.2rem 1rem 1.3rem}
.adc-links-kicker{display:inline-flex;padding:.38rem .72rem;border-radius:999px;background:rgba(139,115,93,.12);color:#715d4b;font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.07em}
.adc-links h1{font-size:clamp(2.1rem,7vw,4.2rem);line-height:.98;letter-spacing:-.045em;margin:.9rem auto;max-width:720px}.adc-links h1 span{color:#8b735d}
.adc-links-hero p{max-width:610px;margin:auto;color:#667085;line-height:1.7}
.adc-links-grid{display:grid;gap:.85rem;margin-top:1.2rem}
.adc-link-card{display:flex;align-items:center;gap:.9rem;padding:1rem 1.05rem;background:#fff;border:1px solid rgba(139,115,93,.18);border-radius:18px;box-shadow:0 10px 28px rgba(15,23,42,.06);text-decoration:none;color:#181818;transition:.2s ease}
.adc-link-card:hover{transform:translateY(-2px);box-shadow:0 16px 34px rgba(15,23,42,.09);border-color:rgba(139,115,93,.38)}
.adc-link-icon{width:44px;height:44px;border-radius:14px;display:grid;place-items:center;background:#f5f1ed;flex:0 0 44px}.adc-link-icon svg{width:20px;height:20px;color:#8b735d}
.adc-link-text{min-width:0;flex:1}.adc-link-text strong{display:block;font-size:1rem}.adc-link-text span{display:block;color:#667085;font-size:.82rem;margin-top:.14rem;line-height:1.45}
.adc-link-arrow{font-size:1.1rem;color:#8b735d}
.adc-links-footer{text-align:center;margin-top:1.4rem;color:#667085;font-size:.78rem}
body[data-tema="escuro"] .adc-links{color:#eee}body[data-tema="escuro"] .adc-link-card{background:#202020;border-color:rgba(255,255,255,.1);color:#eee}body[data-tema="escuro"] .adc-link-icon{background:#2c2926}
</style>

<main class="adc-links">
    <section class="adc-links-hero">
        <span class="adc-links-kicker"><?= $e($c['eyebrow']) ?></span>
        <h1><?= $c['h1'] ?></h1>
        <p><?= $e($c['intro']) ?></p>
    </section>

    <section class="adc-links-grid">
        <a class="adc-link-card" href="<?= $e(adc_url('auditoria-express.php')) ?>?utm_source=instagram&utm_medium=bio&utm_campaign=auditoria">
            <span class="adc-link-icon"><i data-lucide="scan-search"></i></span>
            <span class="adc-link-text"><strong><?= $e($c['audit']) ?></strong><span><?= $e($c['audit_sub']) ?></span></span>
            <span class="adc-link-arrow">→</span>
        </a>

        <a class="adc-link-card" href="<?= $e(adc_url('auditoria-checkout.php')) ?>?plan=essencial&utm_source=instagram&utm_medium=bio&utm_campaign=auditoria_19">
            <span class="adc-link-icon"><i data-lucide="file-check-2"></i></span>
            <span class="adc-link-text"><strong><?= $e($c['paid']) ?></strong><span><?= $e($c['paid_sub']) ?></span></span>
            <span class="adc-link-arrow">→</span>
        </a>

        <a class="adc-link-card" href="<?= $e(adc_url('solucoes.php')) ?>?utm_source=instagram&utm_medium=bio&utm_campaign=servicos">
            <span class="adc-link-icon"><i data-lucide="briefcase-business"></i></span>
            <span class="adc-link-text"><strong><?= $e($c['services']) ?></strong><span><?= $e($c['services_sub']) ?></span></span>
            <span class="adc-link-arrow">→</span>
        </a>

        <a class="adc-link-card" href="<?= $e(adc_url('projetos.php')) ?>?utm_source=instagram&utm_medium=bio&utm_campaign=projetos">
            <span class="adc-link-icon"><i data-lucide="layers-3"></i></span>
            <span class="adc-link-text"><strong><?= $e($c['projects']) ?></strong><span><?= $e($c['projects_sub']) ?></span></span>
            <span class="adc-link-arrow">→</span>
        </a>

        <a class="adc-link-card" href="<?= $e(adc_url('contato.php')) ?>?utm_source=instagram&utm_medium=bio&utm_campaign=contacto">
            <span class="adc-link-icon"><i data-lucide="message-circle"></i></span>
            <span class="adc-link-text"><strong><?= $e($c['contact']) ?></strong><span><?= $e($c['contact_sub']) ?></span></span>
            <span class="adc-link-arrow">→</span>
        </a>
    </section>

    <div class="adc-links-footer"><?= $e($c['follow']) ?></div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
