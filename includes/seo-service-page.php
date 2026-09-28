<?php
require_once __DIR__ . '/i18n.php';

if (!isset($adcServicePage) || !is_array($adcServicePage)) {
    http_response_code(500);
    exit('Service page configuration missing.');
}

$lang = adc_lang();
$content = $adcServicePage['content'][$lang] ?? $adcServicePage['content']['pt'];

$adcPageMetaOverride = [
    'title' => $content['meta_title'],
    'description' => $content['meta_description'],
    'image' => 'https://alexdevcode.com/assets/img/alex-perfil.png',
    'path' => $adcServicePage['slug'],
];

include __DIR__ . '/header.php';

$esc = static function ($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};

$serviceContactUrl = adc_url(
    'contato.php?utm_source=service_page&utm_medium=organic&utm_campaign='
    . rawurlencode((string) $adcServicePage['slug'])
);
?>
<style>
.adc-seo{max-width:1180px;margin:0 auto;padding:2rem 1rem 4rem;color:#141414}
.adc-seo-hero,.adc-seo-card,.adc-seo-faq,.adc-seo-cta{background:#fff;border:1px solid rgba(139,115,93,.18);border-radius:24px;box-shadow:0 10px 30px rgba(15,23,42,.07)}
.adc-seo-hero{padding:2rem 1.2rem;background:radial-gradient(circle at top right,rgba(139,115,93,.16),transparent 32%),#fff}
.adc-seo-badge{display:inline-flex;padding:.4rem .7rem;border-radius:999px;background:rgba(139,115,93,.1);color:#715d4b;font-size:.76rem;font-weight:800;text-transform:uppercase;letter-spacing:.06em}
.adc-seo h1{font-size:clamp(2rem,5vw,3.6rem);line-height:1.05;letter-spacing:-.035em;margin:.85rem 0}
.adc-seo h1 span,.adc-seo h2 span{color:#8b735d}
.adc-seo-hero p,.adc-seo-section>header p,.adc-seo-card p,.adc-seo-faq p{color:#667085;line-height:1.7}
.adc-seo-actions{display:flex;flex-wrap:wrap;gap:.7rem;margin-top:1.2rem}
.adc-seo-btn{display:inline-flex;align-items:center;justify-content:center;text-decoration:none;border-radius:999px;padding:.8rem 1rem;font-weight:800}
.adc-seo-btn-primary{background:#141414;color:#fff}.adc-seo-btn-secondary{background:#f5f1ed;color:#141414;border:1px solid rgba(139,115,93,.18)}
.adc-seo-section{margin-top:2rem}.adc-seo-section>header{text-align:center;max-width:780px;margin:0 auto 1.2rem}
.adc-seo-section h2{font-size:clamp(1.55rem,3.5vw,2.3rem);line-height:1.15;margin-bottom:.55rem}
.adc-seo-grid,.adc-seo-proof{display:grid;grid-template-columns:1fr;gap:1rem}.adc-seo-card{padding:1.15rem}
.adc-seo-card h3{margin-bottom:.35rem}.adc-seo-card a{color:#141414;font-weight:800}
.adc-seo-list{display:grid;gap:.7rem;list-style:none;padding:0}.adc-seo-list li{display:flex;gap:.6rem;color:#667085}.adc-seo-list li:before{content:"✓";color:#8b735d;font-weight:900}
.adc-seo-faq{padding:1rem}.adc-seo-faq details{padding:.9rem 0;border-bottom:1px solid rgba(139,115,93,.18)}.adc-seo-faq details:last-child{border-bottom:0}.adc-seo-faq summary{cursor:pointer;font-weight:800}
.adc-seo-cta{padding:2rem 1.2rem;text-align:center;background:#141414;color:#fff}.adc-seo-cta p{max-width:680px;margin:.7rem auto 0;color:rgba(255,255,255,.75)}.adc-seo-cta .adc-seo-btn-primary{background:#fff;color:#141414}.adc-seo-cta .adc-seo-btn-secondary{background:transparent;color:#fff;border-color:rgba(255,255,255,.3)}
@media(min-width:720px){.adc-seo-grid,.adc-seo-proof{grid-template-columns:repeat(3,1fr)}.adc-seo-hero{padding:2.7rem 2.2rem}}
</style>

<main class="adc-seo">
<section class="adc-seo-hero">
  <span class="adc-seo-badge"><?= $esc($content['badge']) ?></span>
  <h1><?= $content['h1'] ?></h1>
  <p><?= $esc($content['intro']) ?></p>
  <div class="adc-seo-actions">
    <a class="adc-seo-btn adc-seo-btn-primary" href="<?= $esc($serviceContactUrl) ?>"><?= $esc($content['cta_primary']) ?></a>
    <a class="adc-seo-btn adc-seo-btn-secondary" href="<?= $esc(adc_url('projetos.php')) ?>"><?= $esc($content['cta_secondary']) ?></a>
  </div>
</section>

<section class="adc-seo-section">
  <header><h2><?= $content['problems_title'] ?></h2><p><?= $esc($content['problems_intro']) ?></p></header>
  <div class="adc-seo-grid">
    <?php foreach ($content['problems'] as $item): ?>
      <article class="adc-seo-card"><h3><?= $esc($item['title']) ?></h3><p><?= $esc($item['text']) ?></p></article>
    <?php endforeach; ?>
  </div>
</section>

<section class="adc-seo-section">
  <header><h2><?= $content['deliver_title'] ?></h2><p><?= $esc($content['deliver_intro']) ?></p></header>
  <article class="adc-seo-card"><ul class="adc-seo-list">
    <?php foreach ($content['deliverables'] as $item): ?><li><?= $esc($item) ?></li><?php endforeach; ?>
  </ul></article>
</section>

<section class="adc-seo-section">
  <header><h2><?= $content['proof_title'] ?></h2><p><?= $esc($content['proof_intro']) ?></p></header>
  <div class="adc-seo-proof">
    <?php foreach ($content['proofs'] as $proof): ?>
      <article class="adc-seo-card"><h3><?= $esc($proof['title']) ?></h3><p><?= $esc($proof['text']) ?></p><a href="<?= $esc($proof['url']) ?>" target="_blank" rel="noopener"><?= $esc($proof['label']) ?></a></article>
    <?php endforeach; ?>
  </div>
</section>

<section class="adc-seo-section">
  <header><h2><?= $esc($content['faq_title']) ?></h2></header>
  <div class="adc-seo-faq">
    <?php foreach ($content['faq'] as $item): ?>
      <details><summary><?= $esc($item['q']) ?></summary><p><?= $esc($item['a']) ?></p></details>
    <?php endforeach; ?>
  </div>
</section>

<section class="adc-seo-section">
  <div class="adc-seo-cta">
    <h2><?= $esc($content['final_title']) ?></h2>
    <p><?= $esc($content['final_text']) ?></p>
    <div class="adc-seo-actions" style="justify-content:center">
      <a class="adc-seo-btn adc-seo-btn-primary" href="<?= $esc($serviceContactUrl) ?>"><?= $esc($content['cta_primary']) ?></a>
      <a class="adc-seo-btn adc-seo-btn-secondary" href="<?= $esc(adc_url('solucoes.php')) ?>"><?= $esc($content['services_link']) ?></a>
    </div>
  </div>
</section>
</main>

<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => $content['schema_name'],
    'description' => $content['meta_description'],
    'provider' => ['@type' => 'Organization', 'name' => 'AlexDevCode', 'url' => 'https://alexdevcode.com/'],
    'areaServed' => $adcServicePage['area_served'],
    'url' => 'https://alexdevcode.com/' . $adcServicePage['slug'] . '.php?lang=' . $lang,
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>

<?php include __DIR__ . '/footer.php'; ?>
