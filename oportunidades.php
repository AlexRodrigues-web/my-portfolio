<?php
/*********************************************************************
 *  oportunidades.php  ·  Alex Oliveira portfolio
 *  - Job & CV board with 15-day auto-expiry and delete option
 *********************************************************************/

session_start();
if (!isset($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['csrf_token'];

include_once 'includes/header.php';
require_once  'includes/conexao.php';

/*–– remove vacancies older than 15 days –––––––––––––––––––––––––––*/
$pdo->exec("DELETE FROM vagas
            WHERE data_expira IS NOT NULL
              AND data_expira < NOW()");

/*–– fetch data –––––––––––––––––––––––––––––––––––––––––––––––––––*/
$vagas = $pdo->query("SELECT * FROM vagas ORDER BY data_publicacao DESC")
             ->fetchAll(PDO::FETCH_ASSOC);

$cvs   = $pdo->query("SELECT * FROM profissionais ORDER BY data_publicacao DESC")
             ->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Google-fonts & FontAwesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&family=Fira+Code&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

<style>
/* –––––––––––––––––– DESIGN TOKENS –––––––––––––––––– */
:root{
  --dark:#1e1e1e;
  --accent:#8b735d; --accent-dk:#715d4b;
  --light-accent:#c6b8a9;
  --bg:#d7d9dd;
  --text:#ece8e1;
  --radius:20px;
  --transition:.3s ease;
  --shadow:0 4px 14px rgba(0,0,0,.15);
  --shadow-hov:0 8px 28px rgba(0,0,0,.25);
}
*{box-sizing:border-box}
body{margin:0;font-family:Poppins,sans-serif;background:var(--bg);color:var(--dark)}
.container{max-width:1100px;margin:auto;padding:2.5rem 1rem}

/* ––––– Tabs ––––– */
.tabs{display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;
      background:var(--dark);padding:.9rem 1.2rem;border-radius:var(--radius);box-shadow:var(--shadow)}
.tabs button{all:unset;display:flex;align-items:center;gap:.45rem;color:var(--text);
             padding:.45rem 1.1rem;border-radius:12px;font-weight:500;cursor:pointer;
             transition:background var(--transition),transform var(--transition)}
.tabs button:hover,
.tabs button.active{background:var(--accent);transform:translateY(-2px)}
.tabs i{font-size:1rem}

/* ––––– Cards grid ––––– */
.grid{display:grid;gap:2rem;grid-template-columns:repeat(auto-fit,minmax(300px,1fr))}
.card{background:var(--dark);color:var(--text);padding:1.4rem;border-radius:var(--radius);
      box-shadow:var(--shadow);display:flex;flex-direction:column;position:relative;overflow:hidden}
.card:hover{box-shadow:var(--shadow-hov);transform:translateY(-3px);transition:var(--transition)}
.card h3{margin:.05rem 0 .45rem;font-size:1.15rem}
.card small{color:var(--light-accent)}
.card p{margin:.6rem 0 1.1rem;line-height:1.55}

/* small buttons */
.btn-mini{background:var(--accent);border:none;color:#fff;font-size:.85rem;
          padding:.45rem 1rem;border-radius:12px;cursor:pointer;transition:background var(--transition);
          text-decoration:none}
.btn-mini:hover{background:var(--accent-dk)}
.btn-trash{background:#b33939;margin-left:.4rem}
.btn-trash:hover{background:#992d2d}

/* progress-bar + countdown */
.bar{height:4px;width:100%;position:absolute;left:0;bottom:0;
     background:var(--light-accent);border-radius:3px;transform-origin:left;
     transform:scaleX(var(--perc));transition:transform .6s linear}
.countdown{position:absolute;top:.7rem;right:.9rem;font-size:.75rem;color:var(--light-accent);
           font-family:"Fira Code",monospace}

/* ––––– Modal wizard ––––– */
#modal{position:fixed;inset:0;background:rgba(0,0,0,.6);display:none;
       align-items:center;justify-content:center;z-index:1000}
.modal-box{background:var(--dark);color:var(--text);width:95%;max-width:520px;
           padding:2rem 2.2rem;border-radius:var(--radius);box-shadow:var(--shadow);
           position:relative;animation:pop .25s}
@keyframes pop{from{opacity:0;transform:scale(.85)}to{opacity:1;transform:scale(1)}}
.close{all:unset;position:absolute;top:.7rem;right:.9rem;font-size:1.3rem;
       color:var(--text);cursor:pointer}
.step-indic{display:flex;gap:.5rem;margin-bottom:1.3rem}
.step-indic span{width:14px;height:14px;border-radius:50%;background:var(--light-accent);opacity:.5;transition:opacity var(--transition)}
.step-indic span.active{opacity:1;background:var(--accent)}

label{font-weight:600;margin-top:.35rem}
input,textarea,select{width:100%;padding:.75rem;margin-top:.4rem;font-size:.95rem;
  border-radius:12px;border:1px solid #555;background:#2a2a2a;color:var(--text)}
textarea{min-height:110px;resize:vertical}
.modal-btn{background:var(--accent);border:none;color:#fff;padding:.7rem 1.3rem;
           border-radius:12px;font-weight:600;cursor:pointer;transition:background var(--transition)}
.modal-btn:hover{background:var(--accent-dk)}
.footer-btns{display:flex;gap:.8rem;justify-content:flex-end;margin-top:1rem}
.toggle-email{display:flex;align-items:center;gap:.6rem;margin:.4rem 0;font-weight:600;font-size:.9rem}

@media(max-width:600px){
  .grid{grid-template-columns:1fr}
  .tabs button{font-size:.9rem}
}
</style>

<!-- ––––––––– HTML ––––––––– -->
<main class="container">

  <!-- Tabs -->
  <nav class="tabs">
    <button data-tab="vagas" class="active"><i class="fa-solid fa-briefcase"></i> Jobs</button>
    <button data-tab="cvs"><i class="fa-solid fa-user"></i> CVs</button>
    <button id="btn-novo"><i class="fa-solid fa-circle-plus"></i> New</button>
  </nav>

  <!-- Vacancies -->
  <section id="vagas" class="grid">
  <?php foreach($vagas as $v):
        $exp=$v['data_expira'];
        $perc=$exp?max(0,min(1,(strtotime($exp)-time())/1296000)):1; ?>
    <div class="card" data-expira="<?= $exp ?>">
      <?php if($exp):?>
        <span class="countdown"></span>
        <div class="bar" style="--perc:<?= $perc?>"></div>
      <?php endif; ?>

      <h3><?= htmlspecialchars($v['titulo']) ?></h3>
      <small><?= htmlspecialchars($v['empresa']) ?> •
             <?= (new DateTime($v['data_publicacao']))->format('d/m/Y') ?></small>
      <p><?= nl2br(htmlspecialchars($v['descricao'])) ?></p>

      <div>
        <?php if($v['link']): ?>
          <a class="btn-mini" target="_blank"
             href="<?= htmlspecialchars($v['link']) ?>">Open link</a>
        <?php endif; ?>
        <?php if(!empty($v['email'])): ?>
          <a class="btn-mini" href="mailto:<?= htmlspecialchars($v['email']) ?>">Email</a>
        <?php endif; ?>

        <!-- delete vacancy -->
        <form action="excluir_vaga.php" method="POST" style="display:inline">
          <input type="hidden" name="csrf" value="<?= $token ?>">
          <input type="hidden" name="id"   value="<?= $v['id'] ?>">
          <button type="submit" class="btn-mini btn-trash" title="Delete"
                  onclick="return confirm('Delete this post?');">
            <i class="fa-solid fa-trash"></i>
          </button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
  </section>

  <!-- CVs -->
  <section id="cvs" class="grid" style="display:none">
  <?php foreach($cvs as $cv): ?>
    <div class="card">
      <h3>👤 <?= htmlspecialchars($cv['nome']) ?></h3>
      <small><?= htmlspecialchars($cv['email']) ?> •
             <?= (new DateTime($cv['data_publicacao']))->format('d/m/Y') ?></small>
      <p><?= nl2br(htmlspecialchars($cv['descricao'])) ?></p>
      <a href="mailto:<?= htmlspecialchars($cv['email']) ?>" class="btn-mini">Contact</a>
    </div>
  <?php endforeach; ?>
  </section>

</main>

<!-- ––––– Modal Wizard ––––– -->
<div id="modal">
  <div class="modal-box">
    <button class="close" title="Close">&times;</button>

    <div class="step-indic"><span id="dot1" class="active"></span><span id="dot2"></span></div>

    <!-- step 1 -->
    <div id="s1">
      <h2>New opportunity</h2>
      <label>Type</label>
      <select id="tipoSel" required>
        <option value="" disabled selected hidden>Choose…</option>
        <option value="emprego">Job</option>
        <option value="estagio">Internship</option>
        <option value="outra">Other</option>
        <option value="cv">CV</option>
      </select>
      <div class="footer-btns">
        <button id="next" class="modal-btn" disabled>Next</button>
      </div>
    </div>

    <!-- step 2 -->
    <div id="s2" style="display:none">
      <h2 id="formTitle"></h2>
      <form id="dynForm" method="POST">
        <input type="hidden" name="csrf" value="<?= $token ?>">
        <!-- fields injected by JS -->
        <div class="footer-btns">
          <button type="button" id="back" class="modal-btn" style="background:#777">Back</button>
          <button id="publish" class="modal-btn">Publish</button>
        </div>
      </form>
    </div>

  </div>
</div>

<!-- ––––––––– JS ––––––––– -->
<script>
/* Tabs */
document.querySelectorAll('.tabs button[data-tab]').forEach(btn=>{
  btn.onclick=()=>{
    document.querySelectorAll('.tabs button[data-tab]')
            .forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('section')
            .forEach(sec=>sec.style.display='none');
    document.getElementById(btn.dataset.tab).style.display='grid';
  };
});

/* Modal open / close */
const modal=document.getElementById('modal');
document.getElementById('btn-novo').onclick=()=>modal.style.display='flex';
document.querySelector('.close').onclick=closeModal;
window.onclick=e=>{ if(e.target===modal) closeModal(); };
function closeModal(){ modal.style.display='none'; resetWizard(); }

/* Wizard navigation */
const dot1=document.getElementById('dot1'), dot2=document.getElementById('dot2');
const s1=document.getElementById('s1'),  s2=document.getElementById('s2');
const tipoSel=document.getElementById('tipoSel');
tipoSel.onchange = ()=> document.getElementById('next').disabled=false;

document.getElementById('next').onclick=()=>{
  buildForm(tipoSel.value);
  s1.style.display='none'; s2.style.display='block';
  dot1.classList.remove('active'); dot2.classList.add('active');
};
document.getElementById('back').onclick=resetWizard;
function resetWizard(){
  s2.style.display='none'; s1.style.display='block';
  dot2.classList.remove('active'); dot1.classList.add('active');
  tipoSel.value=''; document.getElementById('next').disabled=true;
}

/* dynamic form builder */
const form=document.getElementById('dynForm');
function field(label,name,type='text',required=true){
  return `<label>${label}${required?'*':''}</label>
          <input name="${name}" type="${type}" ${required?'required':''}>`;
}
function buildForm(t){
  form.action = (t==='cv') ? 'receber_profissional.php' : 'receber_vaga.php';
  let html = `<input type="hidden" name="tipo" value="${t}">`;

  const emailToggle = `
    <label class="toggle-email">
      <input type="checkbox" id="chkEmail"> Include contact e-mail
    </label>
    <div id="wrapEmail" style="display:none">
      ${field('Contact e-mail','email','email',false)}
    </div>`;

  if(t==='emprego' || t==='estagio'){
    html += field('Company','empresa')
         + field(t==='emprego'?'Job title':'Area / Course','titulo')
         + `<label>Description*</label><textarea name="descricao" required></textarea>`
         + field('Link','link','url',false)
         + emailToggle;
    formTitle.textContent = t==='emprego' ? 'Publish a job' : 'Publish an internship';
  }else if(t==='outra'){
    html += field('Title','titulo')
         + `<label>Description*</label><textarea name="descricao" required></textarea>`
         + field('Link','link','url',false)
         + emailToggle;
    formTitle.textContent = 'Publish an opportunity';
  }else{ /* cv */
    html += field('Name','nome')
         + field('E-mail','email','email')
         + `<label>About you*</label><textarea name="descricao" required></textarea>`;
    formTitle.textContent = 'Publish a CV';
  }

  /* clear previous dynamic fields */
  form.querySelectorAll('input:not([type=hidden]),textarea,label.toggle-email,div#wrapEmail')
      .forEach(el=>el.remove());
  form.insertAdjacentHTML('afterbegin',html);

  /* toggle optional email */
  const chk=document.getElementById('chkEmail');
  if(chk){
    chk.onchange = ()=> document.getElementById('wrapEmail').style.display =
                      chk.checked ? 'block' : 'none';
  }
}

/* countdown + bar refresh */
function tick(){
  document.querySelectorAll('.card[data-expira]').forEach(card=>{
    const exp=new Date(card.dataset.expira), diff=exp-new Date();
    if(diff<=0){ card.remove(); return; }
    const d=Math.floor(diff/86400000), h=Math.floor((diff%86400000)/3600000);
    card.querySelector('.countdown').textContent = `${d}d ${h}h`;
    card.style.setProperty('--perc', Math.max(0, Math.min(1, diff/1296000000)));
  });
}
tick(); setInterval(tick,60000);
</script>

<?php include_once 'includes/footer.php'; ?>
