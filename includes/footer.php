<?php
/* footer.php – included on every page */
error_log('Footer loaded – ' . date('c'));
$year = date('Y');
?>

<footer class="footer" id="site-footer">
  <div class="container footer-grid">

    <!-- 1 ▸ Brand -->
    <div class="brand">
      <p class="logo">
        <i data-lucide="code" aria-hidden="true"></i>
        Alex Oliveira<span class="reg">&reg;</span>
      </p>
      <p class="small">
        &copy; <?= $year; ?> · All&nbsp;rights&nbsp;reserved.<br>
        ColorADD<span class="reg">&reg;</span> licence in place.
      </p>
    </div>

    <!-- 2 ▸ Quick links -->
    <nav class="quick" aria-label="Quick links">
      <a href="index.php"><i data-lucide="home"></i> Home</a>
      <a href="sobre.php"><i data-lucide="user-circle"></i> About</a>
      <a href="projetos.php"><i data-lucide="folders"></i> Projects</a>
      <a href="contato.php"><i data-lucide="mail"></i> Contact</a>
      <a href="politica.php"><i data-lucide="shield-check"></i> Privacy</a>
      <a href="ajuda.php"><i data-lucide="help-circle"></i> Help</a>
    </nav>

    <!-- 3 ▸ Social -->
    <div class="social" aria-label="Social media">
      <a href="https://www.linkedin.com/in/alex-rodrigues-1345a11a5/"
         target="_blank" rel="noopener" aria-label="LinkedIn">
        <i data-lucide="linkedin"></i>
      </a>
      <a href="https://github.com/AlexRodrigues-web"
         target="_blank" rel="noopener" aria-label="GitHub">
        <i data-lucide="github"></i>
      </a>
      <a href="mailto:alexrroliver200@gmail.com" aria-label="E-mail">
        <i data-lucide="send"></i>
      </a>
    </div>
  </div>

  <!-- 4 ▸ Tech credit -->
  <p class="credit">
    Built with PHP · HTML · CSS · JavaScript
    <i data-lucide="heart" class="heart" aria-hidden="true"></i>
  </p>

  <!-- 5 ▸ Back-to-top -->
  <button id="topBtn" class="top-btn" aria-label="Back to top">
    <i data-lucide="arrow-up"></i>
  </button>
</footer>

<!--  —— Assets ——  -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<script src="assets/js/temas.js"></script>

<script>
  lucide.createIcons();

  /* smooth back-to-top */
  const topBtn = document.getElementById('topBtn');
  topBtn.addEventListener('click', () =>
    window.scrollTo({ top: 0, behavior: 'smooth' })
  );
  window.addEventListener('scroll', () =>
    topBtn.classList.toggle('show', window.scrollY > 300)
  );
</script>

<!--  —— Footer-specific styles — uses global CSS variables  ——  -->
<style>
.footer{
  background:var(--dark);
  color:var(--text);
  padding:3rem 1rem 2rem;
  border-top:6px solid var(--accent);
  position:relative;
  overflow:hidden;
}
.footer::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,transparent 70%,rgba(0,0,0,.12));
  pointer-events:none;
}
.footer-grid{
  display:flex;flex-wrap:wrap;gap:2.5rem;
  justify-content:space-between;align-items:flex-start;
}

.logo{
  font-family:'Oswald',sans-serif;
  font-size:1.6rem;font-weight:500;
  display:flex;align-items:center;gap:.4rem;
  color:var(--accent);
}
.logo i{font-size:1.3rem}
.reg{font-size:.7rem;vertical-align:super;margin-left:1px}

.small{
  font-size:.85rem;color:var(--light-accent);
  margin-top:.35rem;line-height:1.4;
}

/* quick links */
.quick a{
  display:flex;align-items:center;gap:.35rem;
  color:var(--text);font-size:.95rem;margin:.15rem 0;
  transition:color .3s;
}
.quick a:hover{color:var(--accent)}
.quick i{font-size:1rem}

/* social */
.social a{
  font-size:1.5rem;margin-right:.9rem;
  color:var(--light-accent);transition:color .3s;
}
.social a:hover{color:var(--accent)}

/* tech credit */
.credit{
  text-align:center;margin:1.8rem 0 0;
  font-size:.9rem;color:var(--light-accent)
}
.heart{color:#e45858;vertical-align:middle}

/* back-to-top */
.top-btn{
  position:fixed;right:1.2rem;bottom:1.2rem;
  background:var(--accent);border:none;color:#fff;
  width:44px;height:44px;border-radius:50%;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  box-shadow:var(--shadow);
  opacity:0;visibility:hidden;transform:translateY(20px);
  transition:.3s;
}
.top-btn i{font-size:1.2rem}
.top-btn.show{opacity:1;visibility:visible;transform:translateY(0)}

@media (max-width:700px){
  .footer-grid{flex-direction:column;align-items:center;text-align:center}
  .quick{margin:1rem 0}
  .credit{font-size:.8rem}
}
</style>
