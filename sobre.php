<?php
try {
    include('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}
?>

<!-- Google Fonts, Font Awesome & AOS -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnH2N2..." crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<style>
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
  *, *::before, *::after { box-sizing: border-box; margin:0; padding:0 }
  body {
    font-family: 'Poppins', sans-serif;
    background: var(--light-bg);
    color: var(--text);
    line-height:1.6;
  }
  .sobre-page {
    max-width:1000px;
    margin:3rem auto;
    padding:0 1rem;
  }
  .sobre-page h1 {
    font-family:'Oswald',sans-serif;
    font-size:2.8rem;
    color:var(--primary);
    text-align:center;
    margin-bottom:1rem;
  }
  .sobre-page p.intro {
    text-align:center;
    font-size:1.1rem;
    color:#555;
    margin-bottom:3rem;
  }
  .section {
    background:var(--white);
    border-radius:var(--radius);
    padding:2rem;
    margin-bottom:2rem;
    box-shadow:0 4px 16px rgba(0,0,0,0.05);
    position:relative;
    overflow:hidden;
  }
  .section::before {
    content:'';
    position:absolute;
    top:-30px; right:-30px;
    width:100px; height:100px;
    background:var(--accent);
    opacity:0.1;
    border-radius:50%;
  }
  .section-title {
    font-family:'Oswald',sans-serif;
    font-size:1.8rem;
    color:var(--primary);
    margin-bottom:1rem;
    position:relative;
    padding-left:2.5rem;
  }
  .section-title i {
    position:absolute;
    left:0; top:0;
    font-size:1.4rem;
    color:var(--accent);
  }
  .apresentacao {
    display:flex; flex-wrap:wrap; align-items:center; gap:2rem;
  }
  .foto-perfil {
    flex:0 0 200px; text-align:center;
  }
  .foto-perfil img {
    width:100%;
    border-radius:50%;
    border:4px solid var(--primary);
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
  }
  .texto-apresentacao {
    flex:1; font-size:1.1rem; color:#444;
  }
  .grid-2 {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:2rem;
  }
  .fa-ul { list-style:none; margin-left:1.5rem; }
  .fa-ul li {
    position:relative; padding-left:2rem; margin-bottom:0.6rem; color:#555;
  }
  .fa-ul .fa-li {
    position:absolute; left:0; top:0; color:var(--accent);
  }
  .cta {
    text-align:center; margin-top:2rem;
  }
  .cta p {
    margin-bottom:1rem; color:#555;
  }
  .cta .btn {
    display:inline-block;
    margin:0.5rem;
    padding:0.75rem 1.5rem;
    background:var(--primary);
    color:var(--white);
    border-radius:var(--radius);
    font-weight:600;
    transition:background var(--trans),transform var(--trans);
  }
  .cta .btn:hover {
    background:var(--accent);
    transform:translateY(-2px);
  }
  @media(max-width:768px){
    .apresentacao { flex-direction:column; text-align:center; }
    .foto-perfil { width:150px; margin:0 auto; }
  }
</style>

<main class="sobre-page" data-aos="fade-up">
  <h1>About Me</h1>
  <p class="intro">I’m Alex Oliveira, a Full Stack Developer specializing in building performant, accessible, and user-friendly web applications.</p>

  <section class="section apresentacao" data-aos="fade-right">
    <div class="foto-perfil">
      <img src="assets/img/alexxx.jpg" alt="Alex Oliveira">
    </div>
    <div class="texto-apresentacao">
      <p>With a background in Systems Analysis & Development, I create modern solutions using clean code principles, performance optimizations, and intuitive UX/UI. Let’s transform ideas into reality!</p>
    </div>
  </section>

  <section class="section" data-aos="fade-left">
    <h2 class="section-title"><i class="fas fa-rocket"></i> Specialization</h2>
    <div class="grid-2">
      <p>Languages: <strong>PHP, JavaScript, HTML/CSS</strong></p>
      <p>Frameworks: <strong>Laravel, Vue.js, Tailwind CSS</strong></p>
      <p>Databases: <strong>MySQL, PostgreSQL</strong></p>
      <p>Tools: <strong>Git, VS Code, Figma, Postman</strong></p>
    </div>
  </section>

  <section class="section" data-aos="fade-right">
    <h2 class="section-title"><i class="fas fa-briefcase"></i> Experience</h2>
    <p>I’ve built admin dashboards, e-commerce platforms, and corporate sites, always focusing on performance, reliability, and scalability. Certified in modern web development best practices.</p>
  </section>

  <section class="section" data-aos="fade-up">
    <h2 class="section-title"><i class="fas fa-code"></i> Technical Highlights</h2>
    <ul class="fa-ul">
      <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Clean Architecture (SOLID, PSR)</li>
      <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Automated Testing (TDD)</li>
      <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>RESTful API Integration</li>
      <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Performance Optimizations</li>
      <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Scalable Database Design</li>
    </ul>
  </section>

  <section class="section" data-aos="fade-up">
    <h2 class="section-title"><i class="fas fa-paint-brush"></i> UX/UI & Workflow</h2>
    <div class="grid-2">
      <ul class="fa-ul">
        <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Mobile-first Responsive Design</li>
        <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Accessibility (WCAG)</li>
      </ul>
      <ul class="fa-ul">
        <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Agile (Scrum, Kanban)</li>
        <li><span class="fa-li"><i class="fas fa-check-circle"></i></span>Clear Documentation & Git</li>
      </ul>
    </div>
  </section>

  <section class="cta" data-aos="zoom-in">
    <h2><i class="fas fa-paper-plane"></i> Let’s Connect</h2>
    <p>Interested in working together? <a href="contact.php">Send me a message</a> or <a href="assets/documents/rodrigues_alex.pdf" target="_blank">download my CV</a>.</p>
    <a href="contato.php" class="btn">Contact Me</a>
    <a href="assets/documents/rodrigues_alex.pdf" class="btn" target="_blank">📄 Download CV</a>
  </section>
</main>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script> AOS.init({ duration:800, once:true }); </script>

<?php
try {
    include('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>
