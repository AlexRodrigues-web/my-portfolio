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
      <a href="templates.php"><i data-lucide="layers"></i> Templates</a>
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

  <!-- 4 ▸ Certificados (colapsável) -->
  <div class="certificados">
    <button class="cert-btn" onclick="toggleCertificados()">📜 Ver Certificados</button>
    <ul id="cert-list" class="cert-list">
      <li><a href="https://media.networkme.io/simulatorcertificate/70024d54-3e56-411f-92b1-f6c56f1cde0f/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/application_support_engineer_natixis_alex_oliveira.pdf" target="_blank">Application Support Engineer – Natixis</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/660f70f4-403b-4052-bc21-f5e79b6964b8/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/big_data_engineer_natixis_alex_oliveira.pdf" target="_blank">Big Data Engineer – Natixis</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/e163bd78-4ae0-4c61-8bd0-973b5c7f1339/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/.net_developer_decode_alex_oliveira.pdf" target="_blank">.NET Developer – Decode</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/58cd5beb-448b-4306-a651-3f26d512597d/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/azure_developer_microsoft_education_alex_oliveira.pdf" target="_blank">Azure Developer – Microsoft Education</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/cbb94fa0-85e1-42c7-97cf-367440294a08/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/_engenheiro_de_sistemas_the_navigator_company_alex_oliveira.pdf" target="_blank">Engenheiro de Sistemas – Navigator Company</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/b70f384d-25de-48db-821c-4400a21db37e/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/kyc_vetting_analyst_natixis_alex_oliveira.pdf" target="_blank">KYC Vetting Analyst – Natixis</a></li>
      <li><a href="https://media.networkme.io/simulatorcertificate/2fe11775-0ae4-4b25-a434-4119bd8076f0/e076b7da-61e0-4ee1-9092-2ae9e9c55cae/s&e_transaction_monitoring_analyst_natixis_alex_oliveira.pdf" target="_blank">S&E Transaction Monitoring Analyst – Natixis</a></li>
      <li><a href="https://www.hackerrank.com/certificates/iframe/5e29101ecc7e" target="_blank">HackerRank Cert 1</a></li>
      <li><a href="https://www.hackerrank.com/certificates/iframe/2fec96019b4a" target="_blank">HackerRank Cert 2</a></li>
      <li><a href="https://www.hackerrank.com/certificates/iframe/05e10170531d" target="_blank">HackerRank Cert 3</a></li>
      <li><a href="https://www.hackerrank.com/certificates/iframe/e3d8f2ca2846" target="_blank">HackerRank Cert 4</a></li>
      <li><a href="https://www.hackerrank.com/certificates/1def17ab3966" target="_blank">HackerRank Cert 5</a></li>
    </ul>
  </div>

  <!-- 5 ▸ Tech credit -->
  <p class="credit">
    Built with PHP · HTML · CSS · JavaScript
    <i data-lucide="heart" class="heart" aria-hidden="true"></i>
  </p>

  <!-- 6 ▸ Back-to-top -->
  <button id="topBtn" class="top-btn" aria-label="Back to top">
    <i data-lucide="arrow-up"></i>
  </button>
</footer>

<!-- Assets -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<script src="https://unpkg.com/lucide@latest"></script>
<script src="assets/js/temas.js"></script>

<script>
  lucide.createIcons();

  // Smooth back-to-top
  const topBtn = document.getElementById('topBtn');
  topBtn.addEventListener('click', () =>
    window.scrollTo({ top: 0, behavior: 'smooth' })
  );
  window.addEventListener('scroll', () =>
    topBtn.classList.toggle('show', window.scrollY > 300)
  );

  // Toggle certificados
  function toggleCertificados() {
    document.getElementById("cert-list").classList.toggle("show");
  }
</script>

<!-- Footer-specific styles -->
<style>
.footer {
  background: var(--dark);
  color: var(--text);
  padding: 2rem 1rem 1.2rem;
  border-top: 4px solid var(--accent);
  position: relative;
  overflow: hidden;
}
.footer::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(135deg, transparent 70%, rgba(0,0,0,.1));
  pointer-events: none;
}
.footer-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  justify-content: space-between;
  align-items: flex-start;
}
.logo {
  font-family: 'Oswald', sans-serif;
  font-size: 1.5rem;
  display: flex;
  align-items: center;
  gap: .4rem;
  color: var(--accent);
}
.logo i { font-size: 1.3rem }
.reg { font-size: .7rem; vertical-align: super; margin-left: 1px }
.small {
  font-size: .8rem;
  color: var(--light-accent);
  margin-top: .3rem;
  line-height: 1.4;
}
.quick a {
  display: flex;
  align-items: center;
  gap: .4rem;
  color: var(--text);
  font-size: .9rem;
  margin: .1rem 0;
  transition: color .3s;
}
.quick a:hover { color: var(--accent) }
.quick i { font-size: 1rem }
.social a {
  font-size: 1.3rem;
  margin-right: .8rem;
  color: var(--light-accent);
  transition: color .3s;
}
.social a:hover { color: var(--accent) }
.credit {
  text-align: center;
  margin-top: 1.4rem;
  font-size: .85rem;
  color: var(--light-accent);
}
.heart {
  color: #e45858;
  vertical-align: middle;
}
.top-btn {
  position: fixed;
  right: 1.2rem;
  bottom: 1.2rem;
  background: var(--accent);
  border: none;
  color: #fff;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: var(--shadow);
  opacity: 0;
  visibility: hidden;
  transform: translateY(20px);
  transition: .3s;
}
.top-btn i { font-size: 1.2rem }
.top-btn.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}
.certificados {
  text-align: center;
  margin-top: 1.5rem;
}
.cert-btn {
  background: none;
  color: var(--light-accent);
  border: none;
  cursor: pointer;
  font-size: 0.9rem;
  text-decoration: underline;
  padding: 0.4rem;
}
.cert-list {
  display: none;
  margin-top: 0.7rem;
  list-style: none;
  padding: 0;
  font-size: 0.85rem;
}
.cert-list.show { display: block; }
</style>
