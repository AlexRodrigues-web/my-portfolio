<?php
require_once __DIR__ . '/includes/i18n.php';

$lang = adc_lang();

$copy = [
    'pt' => [
        'title' => 'Auditoria Express de Site | AlexDevCode',
        'description' => 'Mini-auditoria automática gratuita e auditoria completa de websites para SEO, UX, performance e conversão. Planos desde 19€.',
        'badge' => 'Mini-auditoria automática · grátis',
        'h1' => 'Descubra agora o que pode estar a <span>travar o seu site.</span>',
        'intro' => 'Cole o endereço do seu site e receba em segundos uma verificação técnica inicial. Se quiser contexto, prioridades e plano de ação, avance para a Auditoria Express.',
        'url_label' => 'Qual é o seu site?',
        'url_placeholder' => 'https://exemplo.pt',
        'scan' => 'Analisar grátis agora',
        'loading' => 'A analisar o site…',
        'error' => 'Não foi possível concluir a análise.',
        'result_kicker' => 'Resultado automático',
        'score_label' => 'Score inicial',
        'checks_label' => 'verificações aprovadas',
        'response_label' => 'Resposta inicial',
        'issues_title' => 'Prioridades encontradas',
        'no_issues' => 'A verificação inicial não encontrou falhas críticas nos itens analisados.',
        'upgrade' => 'Quer saber o que realmente deve corrigir primeiro? Escolha uma auditoria completa abaixo.',
        'how_title' => 'Como funciona',
        'steps' => [
            ['01','Faça a mini-auditoria grátis','O sistema verifica automaticamente os principais sinais técnicos da página.'],
            ['02','Escolha a profundidade','A Essencial entrega o relatório automático completo. A Pro acrescenta revisão humana e a Correção avança para implementação.'],
            ['03','Receba prioridades reais','A auditoria paga acrescenta contexto, impacto e ordem prática do que fazer primeiro.'],
        ],
        'plans_title' => 'Transforme o diagnóstico automático num plano de ação.',
        'plans' => [
            ['id'=>'essencial','name'=>'Essencial','price'=>'19 €','tag'=>'100% automática','items'=>['Relatório PDF automático','11 verificações técnicas','Prioridades e recomendações','Entrega automática após pagamento'],'cta'=>'Quero a Essencial'],
            ['id'=>'pro','name'=>'Pro','price'=>'39 €','tag'=>'Automático + humano','items'=>['Tudo da Essencial','Revisão humana dos resultados','Análise de conversão','Plano de ação mais detalhado'],'cta'=>'Quero a Pro'],
            ['id'=>'correcao','name'=>'Correção inicial','price'=>'desde 79 €','tag'=>'Resolver, não só analisar','items'=>['Auditoria incluída','1 correção previamente acordada','Validação depois da alteração','Sem projeto grande obrigatório'],'cta'=>'Quero analisar + corrigir'],
        ],
        'why_title' => 'Automação primeiro. Contexto humano quando importa.',
        'why_text' => 'A mini-auditoria é automática e gratuita. O plano Essencial de 19 € também é automático e entrega o PDF após o pagamento. Pro e Correção acrescentam intervenção humana.',
        'final_title' => 'Pode começar sem pagar nada.',
        'final_text' => 'Faça a mini-auditoria agora. Se o resultado mostrar oportunidade, escolha o nível de análise que fizer sentido.',
        'check_labels' => [
            'https'=>'HTTPS ativo','title'=>'Título SEO','description'=>'Meta description','h1'=>'Estrutura H1','mobile'=>'Preparação mobile','canonical'=>'URL canónica','indexable'=>'Indexação','social'=>'Partilha social','schema'=>'Dados estruturados','images'=>'Texto alternativo em imagens','conversion'=>'Sinal de contacto/conversão'
        ],
    ],
    'en' => [
        'title'=>'Express Website Audit | AlexDevCode',
        'description'=>'Free automatic website mini-audit plus complete SEO, UX, performance and conversion audits. Plans from €19.',
        'badge'=>'Automatic mini-audit · free',
        'h1'=>'Find out now what may be <span>holding your website back.</span>',
        'intro'=>'Paste your website address and get an instant technical first check. For context, priorities and an action plan, upgrade to the Express Audit.',
        'url_label'=>'What is your website?','url_placeholder'=>'https://example.com','scan'=>'Run free audit now','loading'=>'Analysing the website…','error'=>'The audit could not be completed.','result_kicker'=>'Automatic result','score_label'=>'Initial score','checks_label'=>'checks passed','response_label'=>'Initial response','issues_title'=>'Priorities found','no_issues'=>'The initial check found no critical failures in the items analysed.','upgrade'=>'Want to know what to fix first? Choose a complete audit below.','how_title'=>'How it works',
        'steps'=>[['01','Run the free mini-audit','The system automatically checks key technical signals on the page.'],['02','Choose the depth','Essential delivers the full automatic report. Pro adds human review and Initial Fix moves into implementation.'],['03','Get real priorities','The paid report turns findings into clear priorities and next actions.']],
        'plans_title'=>'Turn the automatic diagnosis into an action plan.',
        'plans'=>[['id'=>'essencial','name'=>'Essential','price'=>'€19','tag'=>'100% automatic','items'=>['Automatic PDF report','11 technical checks','Priorities and recommendations','Automatic delivery after payment'],'cta'=>'Choose Essential'],['id'=>'pro','name'=>'Pro','price'=>'€39','tag'=>'Automatic + human','items'=>['Everything in Essential','Human review of the findings','Conversion review','More detailed action plan'],'cta'=>'Choose Pro'],['id'=>'correcao','name'=>'Initial fix','price'=>'from €79','tag'=>'Fix, not only analyse','items'=>['Audit included','1 agreed fix','Post-change validation','No large project required'],'cta'=>'Audit + fix']],
        'why_title'=>'Automation first. Human context where it matters.','why_text'=>'The mini-audit is automatic and free. The €19 Essential plan is also automatic and delivers the PDF after payment. Pro and Initial Fix add human intervention.','final_title'=>'You can start for free.','final_text'=>'Run the mini-audit now. If the result shows opportunity, choose the level of analysis that makes sense.',
        'check_labels'=>['https'=>'HTTPS active','title'=>'SEO title','description'=>'Meta description','h1'=>'H1 structure','mobile'=>'Mobile readiness','canonical'=>'Canonical URL','indexable'=>'Indexability','social'=>'Social sharing','schema'=>'Structured data','images'=>'Image alt text','conversion'=>'Contact/conversion signal'],
    ],
    'es' => [
        'title'=>'Auditoría Express de Sitio Web | AlexDevCode',
        'description'=>'Mini auditoría automática gratuita y auditoría completa de SEO, UX, rendimiento y conversión. Planes desde 19 €.',
        'badge'=>'Mini auditoría automática · gratis',
        'h1'=>'Descubre ahora qué puede estar <span>frenando tu sitio web.</span>',
        'intro'=>'Pega la dirección de tu web y recibe en segundos una revisión técnica inicial. Para contexto, prioridades y plan de acción, pasa a la Auditoría Express.',
        'url_label'=>'¿Cuál es tu sitio web?','url_placeholder'=>'https://ejemplo.es','scan'=>'Analizar gratis ahora','loading'=>'Analizando el sitio…','error'=>'No se pudo completar el análisis.','result_kicker'=>'Resultado automático','score_label'=>'Puntuación inicial','checks_label'=>'verificaciones aprobadas','response_label'=>'Respuesta inicial','issues_title'=>'Prioridades encontradas','no_issues'=>'La revisión inicial no encontró fallos críticos en los elementos analizados.','upgrade'=>'¿Quieres saber qué corregir primero? Elige una auditoría completa abajo.','how_title'=>'Cómo funciona',
        'steps'=>[['01','Haz la mini auditoría gratis','El sistema verifica automáticamente las señales técnicas principales.'],['02','Elige la profundidad','Esencial entrega el informe automático completo. Pro añade revisión humana y Corrección pasa a implementación.'],['03','Recibe prioridades reales','El informe de pago convierte los hallazgos en prioridades y acciones claras.']],
        'plans_title'=>'Convierte el diagnóstico automático en un plan de acción.',
        'plans'=>[['id'=>'essencial','name'=>'Esencial','price'=>'19 €','tag'=>'100% automática','items'=>['Informe PDF automático','11 verificaciones técnicas','Prioridades y recomendaciones','Entrega automática tras el pago'],'cta'=>'Quiero la Esencial'],['id'=>'pro','name'=>'Pro','price'=>'39 €','tag'=>'Automático + humano','items'=>['Todo lo de Esencial','Revisión humana de resultados','Análisis de conversión','Plan de acción más detallado'],'cta'=>'Quiero la Pro'],['id'=>'correcao','name'=>'Corrección inicial','price'=>'desde 79 €','tag'=>'Resolver, no solo analizar','items'=>['Auditoría incluida','1 corrección acordada','Validación posterior','Sin proyecto grande obligatorio'],'cta'=>'Analizar + corregir']],
        'why_title'=>'Automatización primero. Contexto humano cuando importa.','why_text'=>'La mini auditoría es automática y gratuita. El plan Esencial de 19 € también es automático y entrega el PDF después del pago. Pro y Corrección añaden intervención humana.','final_title'=>'Puedes empezar gratis.','final_text'=>'Haz la mini auditoría ahora. Si el resultado muestra oportunidad, elige el nivel de análisis adecuado.',
        'check_labels'=>['https'=>'HTTPS activo','title'=>'Título SEO','description'=>'Meta description','h1'=>'Estructura H1','mobile'=>'Preparación móvil','canonical'=>'URL canónica','indexable'=>'Indexación','social'=>'Compartir en redes','schema'=>'Datos estructurados','images'=>'Texto alternativo de imágenes','conversion'=>'Señal de contacto/conversión'],
    ],
];

$c = $copy[$lang] ?? $copy['pt'];

$adcPageMetaOverride = [
    'title' => $c['title'],
    'description' => $c['description'],
    'image' => 'https://alexdevcode.com/assets/img/alex-perfil.png',
    'path' => 'auditoria-express',
];

require_once __DIR__ . '/includes/header.php';

$e = static fn($v) => htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
?>
<style>
.auditx{--x:#141414;--a:#8b735d;--m:#667085;--ok:#15803d;--bad:#b42318;max-width:1180px;margin:auto;padding:2rem 1rem 4rem;color:var(--x)}
.auditx-hero,.auditx-card,.auditx-box,.auditx-result{background:#fff;border:1px solid rgba(139,115,93,.18);border-radius:24px;box-shadow:0 10px 30px rgba(15,23,42,.07)}
.auditx-hero{padding:2.2rem 1.2rem;background:radial-gradient(circle at 90% 10%,rgba(139,115,93,.18),transparent 32%),#fff}
.auditx-badge,.auditx-result-kicker{display:inline-flex;padding:.4rem .7rem;border-radius:999px;background:rgba(139,115,93,.1);color:#715d4b;font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.07em}
.auditx h1{font-size:clamp(2.3rem,6vw,4.5rem);line-height:.98;letter-spacing:-.045em;margin:.9rem 0}.auditx h1 span,.auditx h2 span{color:var(--a)}
.auditx-hero>p,.auditx-section>header p,.auditx-card p{color:var(--m);line-height:1.7}.auditx-hero>p{max-width:760px}
.auditx-url{display:grid;grid-template-columns:1fr;gap:.6rem;margin-top:1.25rem;max-width:820px}.auditx-url input{min-height:52px;border:1px solid rgba(20,20,20,.15);border-radius:14px;padding:0 1rem;font:inherit}.auditx-url button{min-height:52px;border:0;border-radius:14px;background:var(--x);color:#fff;padding:0 1.15rem;font-weight:800;cursor:pointer}.auditx-url button:disabled{opacity:.65;cursor:wait}
.auditx-result{display:none;margin-top:1rem;padding:1.2rem}.auditx-result.is-visible{display:block}.auditx-result-head{display:grid;gap:1rem;align-items:center}.auditx-score{width:108px;height:108px;border-radius:50%;display:grid;place-items:center;background:conic-gradient(var(--a) calc(var(--score,0)*1%),#ece8e4 0);position:relative}.auditx-score:after{content:"";position:absolute;inset:9px;background:#fff;border-radius:50%}.auditx-score strong{position:relative;z-index:2;font-size:1.65rem}.auditx-score span{position:relative;z-index:2;font-size:.7rem;color:var(--m)}
.auditx-result-meta{display:flex;flex-wrap:wrap;gap:.6rem;margin:.75rem 0;color:var(--m);font-size:.8rem}.auditx-result-meta span{padding:.35rem .55rem;background:#f6f4f1;border-radius:999px}
.auditx-issues{display:grid;gap:.55rem;margin-top:1rem}.auditx-issue{display:flex;gap:.65rem;align-items:flex-start;padding:.72rem .8rem;border:1px solid rgba(180,35,24,.13);background:rgba(180,35,24,.035);border-radius:12px}.auditx-issue i{color:var(--bad);margin-top:.18rem}.auditx-upgrade{margin-top:1rem;padding:1rem;border-radius:14px;background:#141414;color:#fff;font-weight:700}
.auditx-error{display:none;margin-top:.75rem;color:var(--bad);font-size:.85rem;font-weight:700}.auditx-error.is-visible{display:block}
.auditx-section{margin-top:2.2rem}.auditx-section>header{text-align:center;max-width:780px;margin:0 auto 1.2rem}.auditx-section h2{font-size:clamp(1.7rem,4vw,2.5rem);line-height:1.1;margin-bottom:.5rem}
.auditx-grid{display:grid;grid-template-columns:1fr;gap:1rem}.auditx-card{padding:1.2rem}.auditx-step{font-size:.76rem;font-weight:900;color:var(--a);letter-spacing:.08em}.auditx-card h3{margin:.35rem 0;font-size:1.15rem}
.auditx-plan{display:flex;flex-direction:column}.auditx-price{font-size:2rem;font-weight:900;margin:.35rem 0}.auditx-tag{font-size:.72rem;color:var(--a);font-weight:800;text-transform:uppercase;letter-spacing:.06em}
.auditx-list{list-style:none;padding:0;display:grid;gap:.55rem;margin:1rem 0}.auditx-list li{color:var(--m)}.auditx-list li:before{content:"✓";color:var(--a);font-weight:900;margin-right:.5rem}
.auditx-cta{display:inline-flex;justify-content:center;text-decoration:none;border-radius:999px;padding:.8rem 1rem;background:var(--x);color:#fff;font-weight:800;margin-top:auto}.auditx-pro{border-color:rgba(139,115,93,.5);box-shadow:0 18px 42px rgba(139,115,93,.16)}
.auditx-box{padding:1.5rem;text-align:center}.auditx-box p{max-width:720px;margin:.55rem auto 0;color:var(--m);line-height:1.7}
body[data-tema="escuro"] .auditx{--x:#f5f1ed;--m:#b7b0aa}.auditx body{}
body[data-tema="escuro"] .auditx-hero,body[data-tema="escuro"] .auditx-card,body[data-tema="escuro"] .auditx-box,body[data-tema="escuro"] .auditx-result{background:#202020;border-color:rgba(255,255,255,.1)}
body[data-tema="escuro"] .auditx-score:after{background:#202020}body[data-tema="escuro"] .auditx-url input{background:#171717;color:#fff;border-color:rgba(255,255,255,.13)}body[data-tema="escuro"] .auditx-url button,body[data-tema="escuro"] .auditx-upgrade,body[data-tema="escuro"] .auditx-cta{background:#8b735d;color:#fff}
@media(min-width:760px){.auditx-url{grid-template-columns:1fr auto}.auditx-grid{grid-template-columns:repeat(3,1fr)}.auditx-hero{padding:3rem 2.2rem}.auditx-result-head{grid-template-columns:auto 1fr}}
</style>

<main class="auditx">
<section class="auditx-hero">
  <span class="auditx-badge"><?= $e($c['badge']) ?></span>
  <h1><?= $c['h1'] ?></h1>
  <p><?= $e($c['intro']) ?></p>

  <div class="auditx-url">
    <input id="auditSite" type="url" inputmode="url" autocomplete="url" placeholder="<?= $e($c['url_placeholder']) ?>" aria-label="<?= $e($c['url_label']) ?>">
    <button type="button" id="auditScanBtn"><?= $e($c['scan']) ?></button>
  </div>

  <div class="auditx-error" id="auditError" role="alert"></div>

  <div class="auditx-result" id="auditResult" aria-live="polite">
    <div class="auditx-result-head">
      <div class="auditx-score" id="auditScore">
        <div style="display:grid;text-align:center">
          <strong id="auditScoreValue">0</strong>
          <span>/ 100</span>
        </div>
      </div>
      <div>
        <span class="auditx-result-kicker"><?= $e($c['result_kicker']) ?></span>
        <h2 style="margin:.55rem 0 .2rem"><?= $e($c['score_label']) ?></h2>
        <div class="auditx-result-meta">
          <span id="auditChecksMeta"></span>
          <span id="auditResponseMeta"></span>
        </div>
      </div>
    </div>

    <h3 style="margin:1rem 0 .4rem"><?= $e($c['issues_title']) ?></h3>
    <div class="auditx-issues" id="auditIssues"></div>
    <div class="auditx-upgrade"><?= $e($c['upgrade']) ?></div>
  </div>
</section>

<section class="auditx-section">
  <header><h2><?= $e($c['how_title']) ?></h2></header>
  <div class="auditx-grid">
    <?php foreach($c['steps'] as $step): ?>
      <article class="auditx-card"><span class="auditx-step"><?= $e($step[0]) ?></span><h3><?= $e($step[1]) ?></h3><p><?= $e($step[2]) ?></p></article>
    <?php endforeach; ?>
  </div>
</section>

<section class="auditx-section" id="auditPlans">
  <header><h2><?= $e($c['plans_title']) ?></h2></header>
  <div class="auditx-grid">
    <?php foreach($c['plans'] as $plan): ?>
      <article class="auditx-card auditx-plan <?= $plan['id']==='pro' ? 'auditx-pro' : '' ?>">
        <span class="auditx-tag"><?= $e($plan['tag']) ?></span>
        <h3><?= $e($plan['name']) ?></h3>
        <div class="auditx-price"><?= $e($plan['price']) ?></div>
        <ul class="auditx-list"><?php foreach($plan['items'] as $item): ?><li><?= $e($item) ?></li><?php endforeach; ?></ul>
        <a class="auditx-cta" href="#" data-audit-plan="<?= $e($plan['id']) ?>" data-audit-name="<?= $e($plan['name']) ?>" data-audit-price="<?= $e($plan['price']) ?>"><?= $e($plan['cta']) ?></a>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="auditx-section"><div class="auditx-box"><h2><?= $e($c['why_title']) ?></h2><p><?= $e($c['why_text']) ?></p></div></section>
<section class="auditx-section"><div class="auditx-box"><h2><?= $e($c['final_title']) ?></h2><p><?= $e($c['final_text']) ?></p></div></section>
</main>

<script>
(function(){
  const siteInput=document.getElementById('auditSite');
  const scanBtn=document.getElementById('auditScanBtn');
  const result=document.getElementById('auditResult');
  const errorBox=document.getElementById('auditError');
  const score=document.getElementById('auditScore');
  const scoreValue=document.getElementById('auditScoreValue');
  const checksMeta=document.getElementById('auditChecksMeta');
  const responseMeta=document.getElementById('auditResponseMeta');
  const issuesBox=document.getElementById('auditIssues');
  const labels=<?= json_encode($c['check_labels'], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>;
  const txt={
    loading:<?= json_encode($c['loading'], JSON_UNESCAPED_UNICODE) ?>,
    error:<?= json_encode($c['error'], JSON_UNESCAPED_UNICODE) ?>,
    checks:<?= json_encode($c['checks_label'], JSON_UNESCAPED_UNICODE) ?>,
    response:<?= json_encode($c['response_label'], JSON_UNESCAPED_UNICODE) ?>,
    noIssues:<?= json_encode($c['no_issues'], JSON_UNESCAPED_UNICODE) ?>
  };

  function showError(message){
    errorBox.textContent=message||txt.error;
    errorBox.classList.add('is-visible');
    result.classList.remove('is-visible');
  }

  function clearError(){
    errorBox.textContent='';
    errorBox.classList.remove('is-visible');
  }

  function track(name,params){
    if(typeof window.gtag==='function'){
      window.gtag('event',name,params||{});
    }
  }

  async function runAudit(){
    const site=(siteInput?.value||'').trim();
    clearError();

    if(!site){
      showError(txt.error);
      siteInput?.focus();
      return;
    }

    scanBtn.disabled=true;
    const oldLabel=scanBtn.textContent;
    scanBtn.textContent=txt.loading;

    try{
      const response=await fetch('api/auditoria.php',{
        method:'POST',
        headers:{'Content-Type':'application/json'},
        body:JSON.stringify({url:site})
      });

      const data=await response.json();

      if(!response.ok||!data.ok){
        throw new Error(data.error||txt.error);
      }

      const scoreNumber=Math.max(0,Math.min(100,Number(data.score)||0));
      score.style.setProperty('--score',String(scoreNumber));
      scoreValue.textContent=String(scoreNumber);
      checksMeta.textContent=String(data.summary.passed)+' / '+String(data.summary.total)+' '+txt.checks;
      responseMeta.textContent=txt.response+': '+String(data.summary.response_ms)+' ms';

      issuesBox.replaceChildren();

      const issues=Array.isArray(data.top_issues)?data.top_issues:[];

      if(!issues.length){
        const item=document.createElement('div');
        item.className='auditx-issue';
        const icon=document.createElement('i');
        icon.className='fa-solid fa-circle-check';
        icon.style.color='var(--ok)';
        const text=document.createElement('span');
        text.textContent=txt.noIssues;
        item.append(icon,text);
        issuesBox.append(item);
      }else{
        issues.forEach(function(issue){
          const item=document.createElement('div');
          item.className='auditx-issue';
          const icon=document.createElement('i');
          icon.className='fa-solid fa-triangle-exclamation';
          const text=document.createElement('span');
          text.textContent=labels[issue.id]||issue.label||issue.id;
          item.append(icon,text);
          issuesBox.append(item);
        });
      }

      result.classList.add('is-visible');
      result.scrollIntoView({behavior:'smooth',block:'nearest'});

      track('audit_scan',{
        audit_score:scoreNumber,
        audit_url_host:(new URL(data.url)).hostname
      });

    }catch(error){
      showError(error?.message||txt.error);
    }finally{
      scanBtn.disabled=false;
      scanBtn.textContent=oldLabel;
    }
  }

  scanBtn?.addEventListener('click',runAudit);

  siteInput?.addEventListener('keydown',function(event){
    if(event.key==='Enter'){
      event.preventDefault();
      runAudit();
    }
  });

  document.querySelectorAll('[data-audit-plan]').forEach(function(link){
    link.addEventListener('click',function(event){
      event.preventDefault();
      const site=(siteInput?.value||'').trim();

      track('audit_package_click',{
        audit_package:link.dataset.auditPlan||'',
        audit_price:link.dataset.auditPrice||''
      });

      const params=new URLSearchParams({
        lang:'<?= $e($lang) ?>',
        plan:link.dataset.auditPlan||'essencial',
        site:site
      });

      window.location.href='auditoria-checkout.php?'+params.toString();
    });
  });
})();
</script>

<script type="application/ld+json">
<?= json_encode([
  '@context'=>'https://schema.org',
  '@type'=>'Service',
  'name'=>'Auditoria Express AlexDevCode',
  'description'=>$c['description'],
  'provider'=>['@type'=>'Organization','name'=>'AlexDevCode','url'=>'https://alexdevcode.com/'],
  'offers'=>[
    ['@type'=>'Offer','name'=>'Auditoria Essencial','price'=>'19','priceCurrency'=>'EUR'],
    ['@type'=>'Offer','name'=>'Auditoria Pro','price'=>'39','priceCurrency'=>'EUR'],
  ],
  'url'=>'https://alexdevcode.com/auditoria-express.php?lang='.$lang
], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) ?>
</script>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
