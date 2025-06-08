<?php
try {
    include('includes/header.php');
} catch (Exception $e) {
    error_log("Error loading header.php: " . $e->getMessage());
}
?>

<!-- Google Fonts, Font-Awesome & SweetAlert2 -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnH2N2..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
/* ---------- THEME ---------- */
:root{
  --dark:#141414;
  --accent:#8b735d;
  --accent-dk:#715d4b;
  --light-accent:#c6b8a9;
  --bg:#d7d9dd;
  --text:#e9e5df;
  --radius:20px;
  --transition:.3s ease;
  --shadow:0 4px 14px rgba(0,0,0,.15);
  --shadow-hov:0 8px 28px rgba(0,0,0,.25);
}

/* ---------- RESET ---------- */
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Poppins',sans-serif;background:var(--bg);color:#333;line-height:1.6}

/* ---------- WRAPPER ---------- */
.projetos-page{max-width:1200px;margin:3rem auto;padding:0 1rem}

/* ---------- HEADING ---------- */
.projetos-page h1{font-size:2.8rem;color:var(--accent);text-align:center;margin-bottom:.5rem}
.projetos-page .intro{text-align:center;color:#666;max-width:800px;margin:0 auto 2.5rem;font-size:1.1rem}

/* ---------- FILTER BAR ---------- */
.filter-bar{display:flex;flex-wrap:wrap;justify-content:center;gap:.6rem 1rem;margin-bottom:2.5rem}
.filter-btn{border:2px solid var(--accent);background:transparent;color:var(--accent);padding:.55rem 1.2rem;border-radius:var(--radius);font-weight:600;cursor:pointer;transition:background var(--transition),color var(--transition),transform var(--transition)}
.filter-btn:hover,.filter-btn.active{background:var(--accent);color:var(--dark);transform:translateY(-2px)}

/* ---------- GRID ---------- */
.projetos-grid{display:grid;gap:2rem;grid-template-columns:repeat(auto-fit,minmax(280px,1fr))}

/* ---------- CARD ---------- */
.projeto-card{background:#fff;border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden;display:flex;flex-direction:column;transition:transform var(--transition),box-shadow var(--transition);opacity:0;animation:fadeIn .8s forwards}
@keyframes fadeIn{to{opacity:1}}
.projeto-card:hover{transform:translateY(-6px);box-shadow:var(--shadow-hov)}
.selo{position:absolute;top:14px;right:-22px;background:#ff9800;color:#fff;padding:.35rem 1.1rem;font-size:.75rem;font-weight:700;transform:rotate(15deg);border-radius:4px}

/* image */
.img-container{position:relative;overflow:hidden}
.img-container img{width:100%;height:200px;object-fit:cover;transition:transform var(--transition)}
.img-container:hover img{transform:scale(1.05)}
.img-overlay{position:absolute;inset:0;background:rgba(0,0,0,.45);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity var(--transition)}
.img-container:hover .img-overlay{opacity:1}
.img-overlay span{color:#fff;font-weight:600;background:rgba(0,0,0,.55);padding:.4rem .9rem;border-radius:6px}

/* body */
.projeto-card h3{font-size:1.3rem;color:var(--accent);margin:1rem 1rem .5rem}
.projeto-card p{margin:0 1rem 1rem;color:#555}
.tecnologias{margin:0 1rem 1.2rem;font-size:.9rem;color:#444}

/* buttons */
.botoes{display:flex;gap:.6rem;padding:1rem;flex-wrap:wrap}
.btn{flex:1;text-align:center;padding:.65rem;border-radius:8px;font-size:.9rem;text-decoration:none;transition:background var(--transition),transform var(--transition)}
.btn-primary{background:var(--accent);color:var(--dark)}
.btn-primary:hover{background:var(--accent-dk);transform:translateY(-2px)}
/* buttons without live demo */
.btn-disabled{background:var(--light-accent);color:#777;cursor:pointer}
.btn-disabled:hover{background:#eae8e4;transform:none}

/* utilities */
.hidden{display:none!important}

/* ---------- RESPONSIVE ---------- */
@media(max-width:768px){
  .projetos-page h1{font-size:2.4rem}
  .intro{font-size:1rem}
}
</style>

<main class="projetos-page">
  <h1>📁 My Projects</h1>
  <p class="intro">Discover a curated collection of projects—each crafted for speed, accessibility, and seamless interaction.</p>

  <!-- FILTERS -->
  <div class="filter-bar">
    <button class="filter-btn active" data-filter="all">All</button>
    <button class="filter-btn" data-filter="ecommerce">E-commerce</button>
    <button class="filter-btn" data-filter="finance">Finance</button>
    <button class="filter-btn" data-filter="education">Education</button>
    <button class="filter-btn" data-filter="utilities">Utilities</button>
    <button class="filter-btn" data-filter="portfolio">Portfolio</button>
  </div>

  <!-- GRID -->
  <div class="projetos-grid">

<!-- CARD 1 – ONLY GITHUB (no live demo) -->
<div class="projeto-card" data-category="ecommerce">
  <div class="selo">✨ Featured</div>

  <div class="img-container">
    <img src="assets/img/projetos/mercearia.jpeg" alt="Online Grocery">
    <div class="img-overlay"><span>Preview</span></div>
  </div>

  <h3>Online Grocery</h3>
  <p>Complete e-commerce with cart, promos, analytics &amp; admin panel.</p>
  <p class="tecnologias"><strong>PHP • MySQL • MVC • JS</strong></p>

  <div class="botoes">
    <!-- disabled View: triggers SweetAlert -->
    <a href="#" class="btn btn-disabled view-demo">View</a>
    <!-- source code -->
    <a href="https://github.com/AlexRodrigues-web/mercearia-online" target="_blank"
       class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
  </div>
</div>


    <!-- CARD 2 – NO DEMO YET -->
    <div class="projeto-card" data-category="finance">
      <div class="img-container">
        <img src="assets/img/projetos/financeiro.PNG" alt="Personal Finance">
        <div class="img-overlay"><span>Preview</span></div>
      </div>
      <h3>Personal Finance</h3>
      <p>Budget &amp; expense tracker with interactive charts.</p>
      <p class="tecnologias"><strong>JS • Chart.js • CSS</strong></p>
      <div class="botoes">
        <a href="#" class="btn btn-disabled view-demo">View</a>
        <a href="https://github.com/AlexRodrigues-web/Personal-Finance-Tracker" target="_blank" class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
      </div>
    </div>

    <!-- CARD 3 – NO DEMO YET -->
    <div class="projeto-card" data-category="education">
      <div class="img-container">
        <img src="assets/img/projetos/plataforma.PNG" alt="Journey Platform">
        <div class="img-overlay"><span>Preview</span></div>
      </div>
      <h3>Journey Platform</h3>
      <p>Virtual learning environment for students &amp; teachers.</p>
      <p class="tecnologias"><strong>Node.js • Vue.js • CSS</strong></p>
      <div class="botoes">
        <a href="#" class="btn btn-disabled view-demo">View</a>
        <a href="https://github.com/AlexRodrigues-web/journey-platform" target="_blank" class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
      </div>
    </div>

    <!-- CARD 4 – NO DEMO YET -->
    <div class="projeto-card" data-category="utilities">
      <div class="img-container">
        <img src="assets/img/projetos/escala.PNG" alt="Work Schedule">
        <div class="img-overlay"><span>Preview</span></div>
      </div>
      <h3>Work Schedule</h3>
      <p>Python script that auto-generates shift schedules.</p>
      <p class="tecnologias"><strong>Python • Pandas</strong></p>
      <div class="botoes">
        <a href="#" class="btn btn-disabled view-demo">View</a>
        <a href="https://github.com/AlexRodrigues-web/escala-de-trabalho" target="_blank" class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
      </div>
    </div>

    <!-- CARD 5 – NO DEMO YET -->
    <div class="projeto-card" data-category="portfolio">
      <div class="img-container">
        <img src="assets/img/projetos/recrutamento.PNG" alt="Recruitment Portfolio">
        <div class="img-overlay"><span>Preview</span></div>
      </div>
      <h3>Recruitment Portfolio</h3>
      <p>Personal site crafted for developer selection.</p>
      <p class="tecnologias"><strong>HTML • CSS • JS</strong></p>
      <div class="botoes">
        <a href="#" class="btn btn-disabled view-demo">View</a>
        <a href="https://github.com/AlexRodrigues-web/meu-portfolio-recrutamento" target="_blank" class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
      </div>
    </div>

    <!-- CARD 6 – NO DEMO YET -->
    <div class="projeto-card" data-category="ecommerce">
      <div class="img-container">
        <img src="assets/img/projetos/mercearia.1.0.jpg" alt="Grocery 1.0">
        <div class="img-overlay"><span>Preview</span></div>
      </div>
      <h3>Grocery 1.0</h3>
      <p>Initial version of the grocery e-commerce.</p>
      <p class="tecnologias"><strong>PHP • HTML • CSS</strong></p>
      <div class="botoes">
        <a href="#" class="btn btn-disabled view-demo">View</a>
        <a href="https://github.com/AlexRodrigues-web/mercearia1.0" target="_blank" class="btn btn-secundario"><i class="fab fa-github"></i>&nbsp;Code</a>
      </div>
    </div>

  </div>

  <!-- Inspirational Quote -->
  <section class="quote" style="margin-top:3rem;text-align:center;">
    <blockquote style="font-size:1.1rem;font-style:italic;color:var(--dark);max-width:750px;margin:0 auto;">
      “<span style="color:var(--accent);font-weight:600;">Programming</span> is one of the most difficult branches of applied <span style="color:var(--accent);font-weight:600;">mathematics</span>; the poorer mathematicians had better remain pure mathematicians.”
    </blockquote>
    <p style="margin-top:.6rem;color:#555;">— <strong>Edsger W. Dijkstra</strong>, pioneer of structured programming</p>
  </section>
</main>

<script>
/* ------ FILTERING ------ */
document.querySelectorAll('.filter-btn').forEach(btn=>{
  btn.addEventListener('click',()=>{
    document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
    btn.classList.add('active');
    const cat=btn.dataset.filter;
    document.querySelectorAll('.projeto-card').forEach(card=>{
      card.classList.toggle('hidden',cat!=='all'&&card.dataset.category!==cat);
    });
  });
});

/* ------ ALERT FOR NON-HOSTED DEMOS ------ */
document.querySelectorAll('.view-demo').forEach(btn=>{
  btn.addEventListener('click',e=>{
    e.preventDefault();
    Swal.fire({
      title:'Live demo unavailable',
      text:'This project does not have an online preview yet. You can still explore the full source code on GitHub. 😊',
      icon:'info',
      confirmButtonColor:'#8b735d'
    });
  });
});
</script>

<?php
try {
    include('includes/footer.php');
} catch (Exception $e) {
    error_log("Error loading footer.php: " . $e->getMessage());
}
?>
