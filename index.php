<?php
try {
    include('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}
?>

<!-- Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnH2N2..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
/* ---------  GLOBAL THEME  --------- */
:root{
  --dark:          #141414;   /* nearly-black for icons/strong text */
  --accent:        #8b735d;   /* deep earthy beige */
  --accent-dk:     #715d4b;   /* hover shade */
  --light-accent:  #c6b8a9;   /* subtle card/button bg */
  --bg:            #d7d9dd;   /* medium-gray page bg */
  --text:          #e9e5df;   /* text on dark surfaces */
  --radius:        20px;
  --transition:    0.3s ease;
  --shadow:        0 4px 14px rgba(0,0,0,.15);
  --shadow-hov:    0 8px 28px rgba(0,0,0,.25);
}

/* ---------  RESET  --------- */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Poppins',sans-serif;
  background:var(--bg);
  color:#333;
  line-height:1.6;
}

/* --------- HERO / DUO SECTION --------- */
.dupla-face{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
  align-items:center;
  gap:2rem;
  max-width:1200px;
  margin:3rem auto 4rem;
  padding:0 1rem;
}
.lado{
  text-align:center;
}
.lado h2{
  font-size:2rem;
  color:var(--accent);
  margin-bottom:.7rem;
}
.lado.designer i,
.lado.coder i{
  font-size:2.2rem;
  color:var(--accent);
  margin-bottom:.4rem;
}
.lado p{color:#555;font-size:1rem}
.centro-imagem{
  position:relative;
  text-align:center;
}
.imagem-dividida img{
  width:240px;height:240px;
  object-fit:cover;
  border-radius:50%;
  border:5px solid var(--accent);
  box-shadow:var(--shadow);
  transition:transform var(--transition);
}
.imagem-dividida img:hover{transform:scale(1.05)}
.conteudo-centro{
  margin-top:1.5rem;
}
.conteudo-centro .frase{
  font-style:italic;
  font-size:1rem;
  color:#666;
  max-width:260px;
  margin:0 auto;
}
.btn{
  display:inline-block;
  margin-top:1rem;
  background:var(--accent);
  color:var(--dark);
  padding:.65rem 1.4rem;
  border-radius:var(--radius);
  font-weight:600;
  text-decoration:none;
  transition:background var(--transition),transform var(--transition);
}
.btn:hover{
  background:var(--accent-dk);
  transform:translateY(-2px);
}

/* ---------  SUMMARY CARDS  --------- */
.resumos{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
  gap:2rem;
  max-width:1100px;
  margin:0 auto 4rem;
  padding:0 1rem;
}
.resumo-bloco{
  background:#fff;
  border-radius:var(--radius);
  box-shadow:var(--shadow);
  padding:2rem 1.5rem;
  text-align:center;
  transition:transform var(--transition),box-shadow var(--transition);
}
.resumo-bloco:hover{
  transform:translateY(-6px);
  box-shadow:var(--shadow-hov);
}
.resumo-bloco h3{
  font-size:1.4rem;
  color:var(--accent);
  margin-bottom:.6rem;
}
.resumo-bloco p{
  color:#555;
  margin-bottom:1rem;
}
.btn-mini{
  display:inline-block;
  background:var(--light-accent);
  color:var(--dark);
  padding:.5rem 1rem;
  border-radius:8px;
  font-size:.9rem;
  text-decoration:none;
  transition:background var(--transition),transform var(--transition);
}
.btn-mini:hover{
  background:#e2d8ce;
  transform:translateY(-2px);
}

/* ---------  ANIMATION  --------- */
.fade-in{animation:fadeIn 1s ease forwards;opacity:0}
@keyframes fadeIn{to{opacity:1}}

/* ---------  RESPONSIVE TWEAKS  --------- */
@media(max-width:600px){
  .lado h2{font-size:1.6rem}
  .imagem-dividida img{width:200px;height:200px}
}
</style>

<main id="topo" class="dupla-face fade-in">

  <!-- DESIGNER SIDE -->
  <div class="lado designer">
    <i class="fas fa-palette"></i>
    <h2>UI-Focused Developer</h2>
    <p>Crafting performant interfaces &amp; cohesive design systems.</p>
  </div>

  <!-- CENTER IMAGE & CV -->
  <div class="centro-imagem">
    <div class="imagem-dividida">
      <img src="assets/img/alex-perfil.png" alt="Alex Oliveira portrait">
    </div>
    <div class="conteudo-centro">
      <p class="frase"><strong>“Focused on smart solutions with analytical thinking and adaptability.”</strong></p>
      <a href="assets/documents/mini-guide-web.pdf" class="btn" target="_blank" download aria-label="Mini-Guia Performance">
        <i class="fas fa-file-download"></i>&nbsp;Mini-Guide Performance
      </a>
    </div>
  </div>

  <!-- CODER SIDE -->
  <div class="lado coder">
    <i class="fas fa-code"></i>
    <h2>&lt;coder&gt;</h2>
    <p>Skilled in PHP, JavaScript &amp; MySQL — logic-driven &amp; performance-minded.</p>
  </div>
</main>

<!-- SUMMARY CARDS -->
<section class="resumos fade-in">
  <div class="resumo-bloco">
    <h3><i class="fas fa-user"></i>&nbsp; About Me</h3>
    <p>Web developer passionate about building clean, functional, user-first apps.</p>
    <a href="sobre.php" class="btn-mini" aria-label="Read more about me">Read more</a>
  </div>

  <div class="resumo-bloco">
    <h3><i class="fas fa-rocket"></i>&nbsp; Projects</h3>
    <p>Explore PHP &amp; JS projects — responsive, accessible &amp; fast.</p>
    <a href="projetos.php" class="btn-mini" aria-label="See portfolio projects">See projects</a>
  </div>

  <div class="resumo-bloco">
    <h3><i class="fas fa-envelope"></i>&nbsp; Contact</h3>
    <p>Reach me via email, GitHub or LinkedIn.</p>
    <a href="contato.php" class="btn-mini" aria-label="Go to contact page">Contact me</a>
  </div>
</section>

<?php
try {
    include('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>
