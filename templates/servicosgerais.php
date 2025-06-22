<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Serviços Gerais “Faz-Tudo”</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  
  <style>
    :root {
      --primary-dark:   #1E2A38;
      --primary-light:  #F3F3F3;
      --accent-orange:  #FF8C00;
      --accent-yellow:  #FFD700;
      --white:          #FFFFFF;
      --text-dark:      #222222;
    }
    *, *::before, *::after { box-sizing: border-box; margin:0; padding:0; }
    body {
      font-family: 'Open Sans', sans-serif;
      color: var(--text-dark);
      background: var(--primary-light);
      scroll-behavior: smooth;
    }
    a { text-decoration: none; color: inherit; }

   /* HEADER */
#header {
  background: linear-gradient(to right,rgb(78, 81, 139), #2ba5c4);
  color: white;
  padding: 15px 0;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  position: sticky;
  top: 0;
  z-index: 1000;
}

#header .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: 1200px;
  margin: auto;
  padding: 0 20px;
}

#header .logo {
  font-size: 1.6rem;
  font-weight: bold;
  color: white;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 8px;
}

.navbar {
  display: flex;
  gap: 20px;
}

.navbar a {
  color: white;
  font-weight: 500;
  text-decoration: none;
  transition: color 0.3s;
}

.navbar a:hover {
  color: #fff176;
}

.btn-whatsapp {
  background: #25D366;
  padding: 10px 18px;
  border-radius: 5px;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s;
}

.btn-whatsapp:hover {
  background: #1ebd5a;
}

/* Responsivo */
#menu-toggle {
  display: none;
}

.menu-icon {
  display: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: white;
}

/* Mobile */
@media (max-width: 768px) {
  .navbar {
    position: absolute;
    top: 70px;
    left: 0;
    right: 0;
    background: #2ba5c4;
    flex-direction: column;
    align-items: center;
    display: none;
    padding: 20px 0;
  }

  .navbar a {
    padding: 10px 0;
  }

  #menu-toggle:checked + .menu-icon + .navbar {
    display: flex;
  }

  .menu-icon {
    display: block;
  }

  .btn-whatsapp {
    display: none;
  }
}

   .hero {
  position: relative;
  background: url('https://images.unsplash.com/photo-1600703124751-b9c981a2b225?auto=format&fit=crop&w=1600&q=80') no-repeat center center;
  background-size: cover;
  height: 75vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  overflow: hidden;
  padding: 0 20px;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(30,42,56,0.6), rgba(0,0,0,0.7));
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  color: #fff;
  max-width: 800px;
  padding: 20px;
  animation: fadeIn 1.5s ease-in-out both;
}

.hero-content h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 2.5rem;
  margin-bottom: 1rem;
  line-height: 1.3;
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 1.8rem;
}

.hero-content .cta {
  background: #ff9800;
  color: #fff;
  padding: 0.9rem 2rem;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s ease;
}

.hero-content .cta:hover {
  background: #e68300;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-30px); }
  to   { opacity: 1; transform: translateY(0); }
}


    /* SECTION STYLES */
    section { padding:4rem 2%; }
    section h2 {
      font-family:'Montserrat',sans-serif; margin-bottom:2rem; text-align:center;
      color: var(--primary-dark);
    }

    /* 3. SERVIÇOS COM MODAIS */
    #servicos { background: var(--white); }
    .grid-servicos {
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
      gap:2rem;
    }
    .servico-card {
  cursor: pointer;
  background: #fff;
  padding: 2rem 1.5rem;
  border-radius: 1rem;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  text-align: center;
}

.servico-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
  background: #fffefc;
}

.servico-card i {
  font-size: 2.2rem;
  color: #ffbf00;
  margin-bottom: 0.7rem;
  transition: transform 0.3s ease;
}

.servico-card:hover i {
  transform: scale(1.2) rotate(-4deg);
}

.servico-card h3 {
  font-size: 1.3rem;
  font-weight: 700;
  margin-bottom: 0.4rem;
  color: #222;
}

.servico-card p {
  font-size: 0.95rem;
  color: #555;
}

    .modal {
      display: none;
      position: fixed; top:0; left:0; width:100%; height:100%;
      background: rgba(0,0,0,0.5);
      align-items:center; justify-content:center;
      z-index:2000;
    }
    .modal-content {
      background: var(--white);
      padding:2rem;
      border-radius:8px;
      max-width:500px;
      width:90%;
      text-align:left;
      position:relative;
    }
    .modal-content h3 { margin-top:0; color: var(--primary-dark); }
    .modal-content p  { margin:1rem 0; line-height:1.6; }
    .modal .close {
      position:absolute; top:1rem; right:1rem; font-size:1.5rem;
      cursor:pointer; color: var(--text-dark);
    }

    /* 4. SOBRE - Melhorado com estética moderna, sombreamento e layout refinado */
#sobre {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  background: #f9f9f9;
  padding: 60px 20px;
  position: relative;
  overflow: hidden;
  border-top: 4px solid var(--accent-orange);
  border-bottom: 4px solid var(--accent-orange);
}

.sobre-text {
  flex: 1 1 400px;
  padding: 20px 40px;
  animation: fadeInLeft 1s both;
  color: #333;
}

.sobre-text h2 {
  font-family: 'Montserrat', sans-serif;
  font-size: 2.2rem;
  margin-bottom: 1rem;
  color: var(--primary-dark);
  position: relative;
}

.sobre-text h2::after {
  content: "";
  width: 60px;
  height: 4px;
  background: var(--accent-orange);
  display: block;
  margin-top: 8px;
}

.sobre-text p {
  margin-bottom: 1rem;
  line-height: 1.8;
  font-size: 1.1rem;
  color: #555;
}

.selos {
  display: flex;
  gap: 1rem;
  margin-top: 1.5rem;
  flex-wrap: wrap;
}

.selo {
  background: var(--accent-yellow);
  color: var(--primary-dark);
  padding: 0.6rem 1.2rem;
  border-radius: 50px;
  font-weight: 600;
  font-size: 0.95rem;
  box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.selo:hover {
  transform: scale(1.05);
}

.sobre-img {
  flex: 1 1 400px;
  text-align: center;
  animation: fadeInRight 1s both;
}

.sobre-img img {
  max-width: 100%;
  height: auto;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.4s ease;
}

.sobre-img img:hover {
  transform: scale(1.03);
}

@keyframes fadeInLeft {
  from { opacity: 0; transform: translateX(-30px); }
  to   { opacity: 1; transform: translateX(0); }
}

@keyframes fadeInRight {
  from { opacity: 0; transform: translateX(30px); }
  to   { opacity: 1; transform: translateX(0); }
}

    /* 6. DEPOIMENTOS */
#depoimentos {
  background: linear-gradient(135deg, #f9f9f9, #e8f0f8);
  padding: 60px 20px;
  text-align: center;
}

.depoimentos-wrapper {
  position: relative;
  max-width: 600px;
  margin: 0 auto;
}

.depoimento {
  display: none;
  background: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
  font-size: 1.1rem;
  line-height: 1.6;
  font-style: italic;
  color: #333;
  transition: opacity 0.3s ease;
}

.depoimento.active {
  display: block;
}

.depoimento .autor {
  margin-top: 1rem;
  font-weight: bold;
  color: var(--primary-dark);
}

.depo-controles {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  gap: 1rem;
}

.depo-controles button {
  background: var(--accent-orange);
  border: none;
  color: #fff;
  font-size: 1.4rem;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  transition: background 0.3s;
}

.depo-controles button:hover {
  background: #e96b00;
}


   #orcamento {
  background: var(--primary-light);
  padding: 60px 20px;
  text-align: center;
}

#orcamento h2 {
  font-size: 2rem;
  color: var(--primary-dark);
  margin-bottom: 10px;
}

.sub-text {
  font-size: 1rem;
  color: #444;
  margin-bottom: 30px;
}

.form-orc {
  max-width: 600px;
  margin: auto;
  text-align: left;
}

.form-group {
  margin-bottom: 20px;
}

.form-orc label {
  font-weight: 600;
  display: block;
  margin-bottom: 6px;
  color: var(--primary-dark);
}

.form-orc input,
.form-orc select,
.form-orc textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  transition: border-color 0.3s;
}

.form-orc input:focus,
.form-orc select:focus,
.form-orc textarea:focus {
  border-color: var(--accent-orange);
  outline: none;
}

.form-orc button {
  background: #25D366;
  color: white;
  border: none;
  padding: 12px 20px;
  border-radius: 6px;
  font-size: 1rem;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.3s;
  width: 100%;
}

.form-orc button:hover {
  background: #1ebd5a;
}


   .area-atendimento {
  background: #f9f9f9;
  padding: 60px 20px;
  text-align: center;
}

.area-atendimento h2 {
  font-size: 2rem;
  margin-bottom: 30px;
  color: #333;
  font-family: 'Montserrat', sans-serif;
}

.mapa-container {
  width: 100%;
  max-width: 900px;
  height: 400px;
  margin: auto;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

.mapa {
  width: 100%;
  height: 100%;
  border: none;
}

.lista-area {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 15px;
  margin-top: 30px;
}

.lista-area span {
  background: #2ba5c4;
  color: white;
  padding: 10px 20px;
  border-radius: 30px;
  font-weight: bold;
  transition: transform 0.3s, background 0.3s;
}

.lista-area span:hover {
  background: #a65fb5;
  transform: scale(1.05);
}


    /* 9. CONTATO RÁPIDO */
    #contato { background: var(--primary-light); text-align:center; }
    .contato-rapido a {
      display:inline-block; margin:0.5rem; font-size:1.1rem;
      color:var(--primary-dark); transition:color 0.2s;
    }
    .contato-rapido a:hover { color:var(--accent-orange); }
    .contato-rapido i { margin-right:0.5rem; vertical-align:middle; }
    .contato-rapido img { margin-top:1rem; width:100px; }

   .footer-moderno {
  background: linear-gradient(to right,rgb(78, 81, 139), #2ba5c4);
  color: #fff;
  padding: 40px 20px;
  text-align: center;
  font-size: 0.95rem;
}

.footer-moderno .container {
  max-width: 1100px;
  margin: auto;
}

.footer-moderno .slogan {
  font-size: 1.1rem;
  font-weight: bold;
  margin-bottom: 20px;
}

.footer-links {
  margin: 10px 0 20px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 15px;
}

.footer-links a {
  color: #ffffff;
  text-decoration: none;
  transition: color 0.3s;
  font-weight: 500;
}

.footer-links a:hover {
  color: #fff176;
}

.footer-social {
  margin-bottom: 15px;
}

.footer-social a {
  margin: 0 10px;
  font-size: 1.4rem;
  color: white;
  transition: transform 0.3s, color 0.3s;
}

.footer-social a:hover {
  color: #fff176;
  transform: scale(1.2);
}

.footer-moderno .assinatura {
  margin-top: 10px;
  font-size: 0.9rem;
}

    /* 5. PORTFÓLIO MODERNO */
#portfolio {
  background: #f3f3f3;
  padding: 60px 20px;
  text-align: center;
}

.sec-title {
  font-size: 2.4rem;
  color: var(--primary-dark);
  font-family: 'Montserrat', sans-serif;
  margin-bottom: 0.5rem;
  position: relative;
}

.sec-title::after {
  content: '';
  display: block;
  width: 60px;
  height: 4px;
  margin: 10px auto 0;
  background: var(--accent-orange);
}

.sec-subtitle {
  font-size: 1.1rem;
  color: #666;
  margin-bottom: 2rem;
}

.galeria-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 20px;
  padding: 10px;
}

.portfolio-item {
  position: relative;
  overflow: hidden;
  border-radius: 8px;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  transition: transform 0.4s;
}

.portfolio-item:hover {
  transform: scale(1.02);
}

.portfolio-item img {
  width: 100%;
  display: block;
  border-radius: 8px;
  transition: opacity 0.3s;
  object-fit: cover;
  height: 200px;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(30, 42, 56, 0.85);
  color: #fff;
  padding: 1rem;
  opacity: 0;
  transition: opacity 0.4s ease-in-out;
  border-radius: 0 0 8px 8px;
}

.portfolio-item:hover .overlay {
  opacity: 1;
}

.overlay h4 {
  font-size: 1.2rem;
  margin: 0 0 0.3rem;
}

.overlay p {
  font-size: 0.95rem;
  margin: 0;
}

.hero-modern {
  position: relative;
  min-height: 65vh;
  padding: 100px 20px;
  background: url('https://static.vecteezy.com/system/resources/previews/024/320/114/non_2x/mechanic-man-logo-handyman-for-service-repairman-or-maintenance-mascot-concept-cartoon-character-design-isolated-illustration-png.png') center top/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  color: #fff;
}

.hero-modern .hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.6);
  backdrop-filter: blur(2px);
  z-index: 1;
}

.hero-modern .hero-content {
  position: relative;
  z-index: 2;
  max-width: 720px;
  text-align: center;
}

.hero-modern h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(2rem, 5.5vw, 3.5rem);
  font-weight: 800;
  margin-bottom: 1rem;
  letter-spacing: 0.05em;
  text-shadow: 0 3px 12px rgba(0,0,0,0.7);
}

.hero-modern h1 span {
  color: #ffbf00;
  text-shadow: 0 2px 10px rgba(255, 191, 0, 0.6);
}

.hero-modern p {
  font-size: 1.1rem;
  font-weight: 500;
  margin-bottom: 2rem;
  color: #f1f1f1;
  text-shadow: 0 1px 6px rgba(0,0,0,0.4);
}

.hero-modern .cta {
  background-color: #ffbf00;
  border: none;
  border-radius: 50px;
  padding: 0.7rem 2rem;
  font-weight: 700;
  font-size: 1rem;
  color: #111;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 8px 22px rgba(0,0,0,0.25);
}

.hero-modern .cta:hover {
  background-color: #e6a900;
  color: #fff;
  box-shadow: 0 10px 28px rgba(0,0,0,0.35);
}

@media (max-width: 576px) {
  .hero-modern {
    padding: 80px 16px;
    min-height: 60vh;
  }
  .hero-modern h1 {
    font-size: 1.8rem;
  }
  .hero-modern p {
    font-size: 1rem;
  }
}



  </style>
</head>
<body>

  <header id="header">
  <div class="container">
    <a href="#" class="logo"><i class="fas fa-tools"></i> Faz-Tudo</a>

    <input type="checkbox" id="menu-toggle" />
    <label for="menu-toggle" class="menu-icon"><i class="fas fa-bars"></i></label>

    <nav class="navbar">
      <a href="#inicio">Início</a>
      <a href="#servicos">Serviços</a>
      <a href="#sobre">Sobre</a>
      <a href="#portfolio">Portfólio</a>
      <a href="#depoimentos">Depoimentos</a>
      <a href="#orcamento">Orçamento</a>
      <a href="#area">Área</a>
      <a href="#contato">Contato</a>
    </nav>

    <div class="btn-whatsapp" onclick="location.href='https://wa.me/351900000000'" title="Fale conosco no WhatsApp">
      <i class="fab fa-whatsapp"></i> WhatsApp
    </div>
  </div>
</header>


  <!-- 1. HERO -->
<section class="hero hero-modern" id="inicio">
  <div class="hero-overlay"></div>
  <div class="hero-content container text-center" data-aos="fade-down">
    <h1>🔧 Precisa de uma Mão? <span>Fazemos Tudo!</span></h1>
    <p>🛠️ Serviços rápidos, seguros e profissionais ao seu alcance.</p>
    <button class="cta" onclick="document.getElementById('servicos').scrollIntoView({behavior: 'smooth'})">
      Solicite um Orçamento <i class="bi bi-lightning-charge-fill"></i>
    </button>
  </div>
</section>



  <!-- 3. SERVIÇOS COM MODAIS -->
  <!-- Seção Serviços -->
<section id="servicos" style="padding: 80px 20px; background-color: #fcfaf8;">
  <div class="container text-center">

    <h2 style="
      font-family: 'Playfair Display', serif;
      font-weight: 800;
      font-size: 2.6rem;
      color: #222;
      margin-bottom: 0.5rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;">
      Nossos Serviços
    </h2>

    <p style="
      font-size: 1.05rem;
      color: #666;
      margin-bottom: 40px;
      font-weight: 500;">
      👆 <strong>Clique em um serviço para ver mais detalhes.</strong>
    </p>

    <div class="grid-servicos" style="
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 30px;
      max-width: 1140px;
      margin: 0 auto;">
      
      <div class="servico-card" data-modal="modal-eletrica">
        <i class="fas fa-bolt"></i>
        <h3>Elétrica</h3>
        <p>Instalação e reparo de circuitos e iluminação.</p>
      </div>
      
      <div class="servico-card" data-modal="modal-hidraulica">
        <i class="fas fa-shower"></i>
        <h3>Hidráulica</h3>
        <p>Conserto de vazamentos e tubulações.</p>
      </div>
      
      <div class="servico-card" data-modal="modal-pintura">
        <i class="fas fa-paint-roller"></i>
        <h3>Pintura</h3>
        <p>Pintura interna e externa profissional.</p>
      </div>
      
      <div class="servico-card" data-modal="modal-montagem">
        <i class="fas fa-wrench"></i>
        <h3>Montagem</h3>
        <p>Montagem de móveis e suportes.</p>
      </div>
      
      <div class="servico-card" data-modal="modal-portas">
        <i class="fas fa-door-open"></i>
        <h3>Portas</h3>
        <p>Instalação e manutenção de portas e janelas.</p>
      </div>
      
      <div class="servico-card" data-modal="modal-jardinagem">
        <i class="fas fa-leaf"></i>
        <h3>Jardinagem</h3>
        <p>Poda e manutenção de áreas verdes.</p>
      </div>
    </div>
    
  </div>
</section>


    <!-- MODAIS -->
    <div class="modal" id="modal-eletrica">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Elétrica</h3>
        <p>Instalamos, reparamos e modernizamos todo tipo de circuito elétrico, quadros de disjuntores e iluminação residencial ou comercial, sempre seguindo normas de segurança e garantindo um serviço duradouro.</p>
      </div>
    </div>
    <div class="modal" id="modal-hidraulica">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Hidráulica</h3>
        <p>Detectamos e consertamos vazamentos, trocamos tubulações, registros e torneiras, além de realizar manutenção preventiva para evitar infiltrações e danos em paredes e pisos.</p>
      </div>
    </div>
    <div class="modal" id="modal-pintura">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Pintura</h3>
        <p>Oferecemos pintura interna e externa com preparação de superfícies, aplicação de seladora e acabamento de alta qualidade, usando tintas de primeira linha para garantir durabilidade e beleza.</p>
      </div>
    </div>
    <div class="modal" id="modal-montagem">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Montagem</h3>
        <p>Montamos móveis de todos os tipos (cozinhas, armários, estantes) e instalamos suportes para TV, prateleiras e painéis, sempre com rapidez e cuidado para não danificar seus objetos.</p>
      </div>
    </div>
    <div class="modal" id="modal-portas">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Portas</h3>
        <p>Instalamos e ajustamos portas de madeira, alumínio e vidro, além de consertar dobradiças, fechaduras e vãos, garantindo isolamento acústico e térmico adequados.</p>
      </div>
    </div>
    <div class="modal" id="modal-jardinagem">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Jardinagem</h3>
        <p>Realizamos poda de arbustos, limpeza de jardins, plantação de flores e manutenção de gramados, mantendo seu espaço externo sempre bonito e saudável.</p>
      </div>
    </div>
  </section>

  <!-- 4. SOBRE -->
  <section id="sobre">
    <div class="sobre-text">
      <h2>Quem Sou Eu</h2>
      <p>“Sou Marcos, profissional ‘faz-tudo’ com mais de 10 anos de experiência em elétrica, hidráulica, pintura e reformas gerais. Atendo residências e empresas com responsabilidade e garantia total.”</p>
      <div class="selos">
        <div class="selo">🔒 Garantia 90 dias</div>
        <div class="selo">👥 +200 clientes</div>
      </div>
    </div>
    <div class="sobre-img">
      <img src="https://www.careeraddict.com/uploads/article/59099/illustration-man-suit.jpg" alt="Marcos, profissional">
    </div>
  </section>

 <!-- 5. PORTFÓLIO -->
<section id="portfolio">
  <div class="container">
    <h2 class="sec-title">Nosso Portfólio</h2>
    <p class="sec-subtitle">Veja alguns dos trabalhos realizados com dedicação e excelência.</p>

    <div class="galeria-grid">
      <div class="portfolio-item">
        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Instalação Elétrica">
        <div class="overlay">
          <h4>Instalação Elétrica</h4>
          <p>Bairro Central</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://i.pinimg.com/736x/85/6d/fd/856dfda5d9c7a5639854ee9ad1322594.jpg" alt="Pintura de Interior">
        <div class="overlay">
          <h4>Pintura Residencial</h4>
          <p>Jardins</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://triider-prd-blog-files.s3.sa-east-1.amazonaws.com/wp-content/uploads/2018/03/30141737/hidraulica-residencial-materiais1.jpg" alt="Serviço Hidráulico">
        <div class="overlay">
          <h4>Conserto Hidráulico</h4>
          <p>Vila Nova</p>
        </div>
      </div>

      <div class="portfolio-item">
        <img src="https://ramosmontagens.com.br/wp-content/uploads/2024/12/empresa-de-montagem-de-moveis-montando-armario-2.png" alt="Montagem de Móveis">
        <div class="overlay">
          <h4>Montagem de Armário</h4>
          <p>Alphaville</p>
        </div>
      </div>
    </div>
  </div>
</section>



 <!-- 6. DEPOIMENTOS -->
<section id="depoimentos">
  <div class="container">
    <h2 class="sec-title">Depoimentos</h2>
    <p class="sec-subtitle">Veja o que nossos clientes dizem sobre nós</p>

    <div class="depoimentos-wrapper">
      <div class="depoimento active">
        <p>“Resolveram tudo em poucas horas. Super recomendo!”</p>
        <div class="autor">– Ana, Lisboa</div>
      </div>
      <div class="depoimento">
        <p>“Atendimento excelente e preço justo.”</p>
        <div class="autor">– Pedro, Porto</div>
      </div>
      <div class="depoimento">
        <p>“Profissionalismo e pontualidade do início ao fim.”</p>
        <div class="autor">– Carla, Faro</div>
      </div>

      <div class="depo-controles">
        <button onclick="mostrarDepoimento(-1)" aria-label="Anterior">⟨</button>
        <button onclick="mostrarDepoimento(1)" aria-label="Próximo">⟩</button>
      </div>
    </div>
  </div>
</section>


  <!-- 7. ORÇAMENTO EXPRESS -->
<section id="orcamento">
  <div class="container">
    <h2><i class="fas fa-file-signature"></i> Orçamento Express</h2>
    <p class="sub-text">Preencha os dados e receba seu orçamento rápido e direto no WhatsApp!</p>

    <form class="form-orc" onsubmit="enviarWhatsApp(event)" data-aos="fade-up">
      <div class="form-group">
        <label for="nome"><i class="fas fa-user"></i> Nome completo</label>
        <input id="nome" name="nome" type="text" placeholder="Seu nome" required>
      </div>

      <div class="form-group">
        <label for="servico"><i class="fas fa-tools"></i> Serviço desejado</label>
        <select id="servico" name="servico" required>
          <option value="" disabled selected>Selecione...</option>
          <option>Elétrica</option>
          <option>Hidráulica</option>
          <option>Pintura</option>
          <option>Montagem</option>
          <option>Portas e Janelas</option>
          <option>Jardinagem</option>
        </select>
      </div>

      <div class="form-group">
        <label for="bairro"><i class="fas fa-map-marker-alt"></i> Cidade </label>
        <input id="bairro" name="bairro" type="text" placeholder="Ex: Bairro da Luz, Lisboa" required>
      </div>

      <div class="form-group">
        <label for="mensagem"><i class="fas fa-comment-dots"></i> Detalhes adicionais</label>
        <textarea id="mensagem" name="mensagem" rows="3" placeholder="Descreva o que precisa..." required></textarea>
      </div>

      <button type="submit"><i class="fab fa-whatsapp"></i> Enviar via WhatsApp</button>
    </form>
  </div>
</section>

  <!-- 8. ÁREA DE ATENDIMENTO -->
<section id="area" class="area-atendimento">
  <h2 data-aos="fade-up">Área de Atendimento</h2>

  <!-- Mapa Google Maps -->
  <div class="mapa-container" data-aos="fade-up" data-aos-delay="100">
    <iframe class="mapa" 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31105.214212460705!2d-9.168474780442498!3d38.70716112842981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19331e2f6e3c9d%3A0x400ebbde49036b0!2sLisboa!5e0!3m2!1spt-PT!2spt!4v1718759999999" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <!-- Lista de Cidades -->
  <div class="lista-area" data-aos="fade-up" data-aos-delay="200">
    <span>Lisboa</span>
    <span>Porto</span>
    <span>Faro</span>
    <span>Coimbra</span>
    <span>Braga</span>
    <span>Setúbal</span>
  </div>
</section>


  <!-- 9. CONTATO RÁPIDO -->
  <section id="contato">
    <h2>Contato Rápido</h2>
    <div class="contato-rapido" data-aos="fade-up">
      <a href="tel:+351900000000"><i class="fas fa-phone"></i> +351 900 000 000</a><br>
      <a href="https://wa.me/351900000000"><i class="fab fa-whatsapp"></i> WhatsApp</a><br>
      <a href="mailto:contato@faztudo.com"><i class="fas fa-envelope"></i> contato@faztudo.com</a><br>
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=https://wa.me/351900000000" alt="QR Code">
    </div>
  </section>

  <!-- 10. FOOTER -->
<footer class="footer-moderno" data-aos="fade-up">
  <div class="container">
    <p class="slogan">🔧 Faz-Tudo – “O que você precisa, a gente resolve!”</p>

    <div class="footer-links">
      <a href="#inicio">Início</a>
      <a href="#servicos">Serviços</a>
      <a href="#sobre">Sobre</a>
      <a href="#portfolio">Portfólio</a>
      <a href="#depoimentos">Depoimentos</a>
      <a href="#orcamento">Orçamento</a>
      <a href="#">Política de Privacidade</a>
    </div>

    <div class="footer-social">
      <a href="mailto:contato@faztudo.pt" title="Enviar Email"><i class="fas fa-envelope"></i></a>
      <a href="https://wa.me/351900000000" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
      <a href="https://t.me/seutelegram" target="_blank" title="Telegram"><i class="fab fa-telegram-plane"></i></a>
      <a href="https://instagram.com/seuinsta" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
      <a href="https://facebook.com/seuface" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
    </div>

    <p class="assinatura">
      © <span id="ano"></span> Faz-Tudo • Desenvolvido com 💻 por <strong>Alex - Web Developer</strong>
    </p>
  </div>
</footer>


  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://unpkg.com/lottie-web@5.9.4/build/player/lottie_light.min.js"></script>
  <script>
    // HEADER SCROLL
    const hdr = document.getElementById('header');
    window.addEventListener('scroll', ()=> hdr.classList.toggle('scrolled', window.scrollY > 50));

    // MODAIS
    document.querySelectorAll('.servico-card').forEach(card => {
      card.addEventListener('click', ()=> {
        document.getElementById(card.dataset.modal).style.display = 'flex';
      });
    });
    document.querySelectorAll('.modal').forEach(modal => {
      modal.addEventListener('click', e => {
        if(e.target === modal || e.target.classList.contains('close')) {
          modal.style.display = 'none';
        }
      });
    });

    // DEPOIMENTOS CAROUSEL
    let idx = 0, deps = document.querySelectorAll('.depoimento');
    function mostrarDepoimento(dir) {
      deps[idx].classList.remove('active');
      idx = (idx + dir + deps.length) % deps.length;
      deps[idx].classList.add('active');
    }

    // ORÇAMENTO VIA WHATSAPP
    function enviarWhatsApp(e) {
      e.preventDefault();
      const f = e.target,
            n = encodeURIComponent(f.nome.value),
            s = encodeURIComponent(f.servico.value),
            b = encodeURIComponent(f.bairro.value),
            m = encodeURIComponent(f.mensagem.value);
      window.open(`https://wa.me/351900000000?text=Olá! Sou ${n}, preciso de orçamento para ${s} em ${b}. ${m}`, '_blank');
    }

    // INIT AOS & YEAR
    AOS.init({ once:true });
    document.getElementById('ano').textContent = new Date().getFullYear();
  </script>
</body>
</html>
