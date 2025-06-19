<?php
// Página SPA para Clínica/Petshop - Tema Ursinhos Carinhosos
$msg_enviado = '';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send_msg"])) {
  $nome = strip_tags($_POST["nome"] ?? "");
  $email = strip_tags($_POST["email"] ?? "");
  $mensagem = strip_tags($_POST["mensagem"] ?? "");
  $msg_enviado = "<p style='color:green; font-weight:bold; text-align:center;'>🐾 Obrigado, $nome! Mensagem enviada com sucesso!</p>";
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>O Pet Carinhoso 🐾</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Fontes e AOS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>
  <script src="https://kit.fontawesome.com/a2d9b63b07.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&family=Kalam&display=swap" rel="stylesheet">


  <style>
  :root {
    --azul-serenity: #85cfd5;
    --verde-menta: #b2e7d4;
    --rosa-cha: #f3cfe6;
    --cinza-aveludado: #555;
    --branco-neve: #fdfdfd;
  }

  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: url('https://www.transparenttextures.com/patterns/paw-print.png') repeat var(--branco-neve);
    overflow-x: hidden;
    color: var(--cinza-aveludado);
  }

  header {
    position: fixed;
    top: 0; left: 0;
    width: 100%;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    z-index: 999;
    backdrop-filter: blur(6px);
    animation: slideDown 1s ease forwards;
  }

  @keyframes slideDown {
    from { transform: translateY(-100%); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
  }

  .navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
  }

  .nav-links {
    display: flex;
    gap: 20px;
    list-style: none;
    transition: all 0.3s ease-in-out;
  }

  .nav-links li a {
    color: var(--cinza-aveludado);
    text-decoration: none;
    font-weight: 500;
    padding: 8px 12px;
    border-radius: 8px;
    transition: 0.3s;
    position: relative;
  }

  .nav-links li a:hover {
    background: var(--rosa-cha);
    color: var(--azul-serenity);
  }

  .nav-links li.cta a {
    background: var(--azul-serenity);
    color: white;
    border-radius: 30px;
    font-weight: bold;
    padding: 10px 20px;
    transition: 0.3s ease-in-out;
  }

  .nav-links li.cta a:hover {
    background: #71bbc0;
  }

  .menu-icon {
    display: none;
    font-size: 26px;
    color: var(--azul-serenity);
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .menu-icon {
      display: block;
    }

    #menu-toggle {
      display: none;
    }

    .nav-links {
      position: absolute;
      top: 65px;
      left: 0;
      width: 100%;
      background: var(--branco-neve);
      flex-direction: column;
      align-items: center;
      max-height: 0;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    #menu-toggle:checked ~ .nav-links {
      max-height: 500px;
      padding: 20px 0;
    }

    .nav-links li {
      width: 100%;
      text-align: center;
      margin: 10px 0;
    }
  }

  @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@500&family=Kalam&display=swap');

@import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@600&family=Kalam&display=swap');

.hero {
  position: relative;
  height: 100vh;
  background: url('https://st.depositphotos.com/26922084/51596/v/1600/depositphotos_515961828-stock-illustration-pet-shop-poster-concept.jpg') no-repeat center center;
  background-size: cover;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  padding: 0 20px;
  overflow: hidden;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.45); /* escurece a imagem para dar contraste */
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  max-width: 800px;
  color: #fff;
}

.hero-content .headline {
  font-family: 'Fredoka', sans-serif;
  font-size: 3rem;
  margin-bottom: 15px;
  color: #fff;
  text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
}

.hero-content .subtext {
  font-family: 'Kalam', cursive;
  font-size: 1.4rem;
  margin-bottom: 25px;
  color: #fdfdfd;
  text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.7);
}

.btn-hero {
  padding: 14px 34px;
  background: #ffb84d;
  color: #2b2b2b;
  font-weight: bold;
  border: none;
  border-radius: 30px;
  font-size: 1.1rem;
  cursor: pointer;
  transition: 0.3s ease-in-out;
  box-shadow: 0 4px 12px rgba(0,0,0,0.3);
}

.btn-hero:hover {
  background: #ffa726;
  transform: scale(1.05);
}

.emoji {
  display: inline-block;
  animation: wiggle 1.5s infinite;
}

@keyframes wiggle {
  0%, 100% { transform: rotate(0deg); }
  25% { transform: rotate(-8deg); }
  50% { transform: rotate(8deg); }
  75% { transform: rotate(-4deg); }
}

/* Patinhas e passarinho */
.pata {
  position: absolute;
  font-size: 2rem;
  opacity: 0.12;
  animation: andar 25s linear infinite;
  z-index: 0;
}

.pata1 {
  top: 12%;
  left: -15%;
  animation-delay: 0s;
}

.pata2 {
  bottom: 10%;
  left: -20%;
  animation-delay: 10s;
}

@keyframes andar {
  0% { transform: translateX(0); }
  100% { transform: translateX(120vw); }
}

.passarinho {
  position: absolute;
  top: 6%;
  left: -5%;
  font-size: 2rem;
  animation: voar 18s linear infinite;
  opacity: 0.2;
  z-index: 0;
}

@keyframes voar {
  0% { transform: translate(0, 0); }
  50% { transform: translate(70vw, 20vh); }
  100% { transform: translate(120vw, -10vh); }
}


@keyframes voar {
  0% { transform: translate(0, 0); }
  50% { transform: translate(70vw, 20vh); }
  100% { transform: translate(120vw, -10vh); }
}


  html {
    scroll-behavior: smooth;
  }

  .card-servico {
    background: #fff;
    width: 180px;
    height: 180px;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .card-servico::before {
    content: "🐾";
    position: absolute;
    font-size: 60px;
    opacity: 0.04;
    top: -10px;
    right: -10px;
    transform: rotate(-30deg);
  }

  .card-servico:hover {
    background: var(--verde-menta);
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.12);
  }

  .card-servico h4 {
    margin-top: 10px;
    color: var(--azul-serenity);
  }

  footer {
    background: linear-gradient(135deg, var(--azul-serenity), var(--verde-menta));
    color: white;
    padding: 40px 20px 20px;
    position: relative;
    overflow: hidden;
  }

  footer::before {
    content: "🐶🐱";
    position: absolute;
    bottom: 10px;
    right: 10px;
    font-size: 40px;
    opacity: 0.08;
    transform: rotate(-15deg);
  }

  .container {
    width: 90%;
    margin: auto;
    max-width: 1200px;
  }

  .topo {
  background: rgba(255, 255, 255, 0.95);
  position: fixed;
  top: 0; left: 0; width: 100%;
  z-index: 1000;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  backdrop-filter: blur(6px);
}

.logo {
  font-size: 1.6rem;
  font-weight: 600;
  color: #5ca3a3;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: 0.3s;
}

.logo span {
  font-weight: bold;
  color: #2b6f6f;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 0;
  position: relative;
}

.nav-links {
  display: flex;
  gap: 20px;
  list-style: none;
}

.nav-links li a {
  text-decoration: none;
  color: #444;
  font-weight: 500;
  padding: 8px 12px;
  border-radius: 6px;
  transition: 0.3s;
}

.nav-links li a:hover {
  background-color: #e2f6f6;
  color: #2b6f6f;
}

.nav-links .cta a {
  background: #5ca3a3;
  color: white;
  padding: 10px 18px;
  border-radius: 30px;
  font-weight: 600;
  transition: 0.3s;
}

.nav-links .cta a:hover {
  background: #459090;
}

.menu-toggle {
  display: none;
  background: none;
  border: none;
  font-size: 26px;
  color: #5ca3a3;
  cursor: pointer;
}

/* Responsivo */
@media (max-width: 768px) {
  .menu-toggle {
    display: block;
  }

  .nav-links {
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    background: white;
    flex-direction: column;
    align-items: center;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease-in-out;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
  }

  .nav-links.open {
    max-height: 500px;
    padding: 10px 0 20px;
  }

  .nav-links li {
    width: 100%;
    text-align: center;
    margin: 10px 0;
  }
}

@keyframes pulseImg {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.03); }
}

.carousel-container {
  overflow: hidden;
  position: relative;
  max-width: 100%;
  margin: auto;
}

.carousel-track {
  display: flex;
  gap: 20px;
  animation: scrollCarousel 30s linear infinite;
}

.carousel-track img {
  width: 300px;
  height: 200px;
  object-fit: cover;
  border-radius: 15px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

@keyframes scrollCarousel {
  0% { transform: translateX(0); }
  100% { transform: translateX(-100%); }
}


  
</style>


</head>
<body>
 <header class="topo" style="background: linear-gradient(135deg,rgb(201, 182, 205), #2ba5c4); position: sticky; top: 0; z-index: 999;">
  <div class="container">
    <nav class="navbar" style="display: flex; align-items: center; justify-content: space-between;">
      
      <!-- Logo com símbolo veterinário -->
      <a href="#inicio" class="logo" style="display: flex; align-items: center; font-size: 1.8rem; font-family: 'Fredoka', sans-serif; color: #4a9a9f; text-decoration: none;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJrD4czUpA2ZLBQdRZDJsANdtrXSKPIxCkbA&s" alt="Símbolo Veterinário" style="height: 40px; margin-right: 12px; border-radius: 50%; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
        <span>Pet Carinhoso 🐾</span>
      </a>

      <!-- Botão mobile -->
      <button class="menu-toggle" aria-label="Abrir menu" style="background: none; border: none; font-size: 1.6rem; color: #444;">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navegação -->
      <ul class="nav-links" style="display: flex; flex-wrap: wrap; gap: 20px; list-style: none; padding-left: 0; margin: 0;">
        <li><a href="#inicio">Início</a></li>
        <li><a href="#sobre">Sobre</a></li>
        <li><a href="#servicos">Serviços</a></li>
        <li><a href="#equipe">Equipe</a></li>
        <li><a href="#galeria">Galeria</a></li>
        <li><a href="#depoimentos">Depoimentos</a></li>
        <li><a href="#contato">Contato</a></li>
        <li class="cta"><a href="#contato" style="background: #4a9a9f; color: white; padding: 8px 16px; border-radius: 25px;">🐶 Agendar</a></li>
      </ul>

    </nav>
  </div>
</header>




 <section id="inicio" class="hero">
  <div class="hero-overlay"></div>

  <div class="hero-content" data-aos="fade-up">
    <h1 class="headline">Cuidamos com amor do seu melhor amigo <span class="emoji">🐶🐱</span></h1>
    <p class="subtext">Consultas, banho, vacinas e muito carinho!</p>
    <button class="btn-hero" onclick="document.getElementById('contato').scrollIntoView({behavior: 'smooth'})">
      💌 Agende Agora
    </button>
  </div>

  <div class="pata pata1">🐾</div>
  <div class="pata pata2">🐾</div>
  <div class="passarinho">🐦</div>
</section>



<section id="sobre" style="padding: 100px 0 60px; background: #f7fcfe;">
  <div class="container" data-aos="fade-up">
    <div style="display: flex; flex-wrap: wrap; gap: 60px; align-items: center; justify-content: center;">
      
      <!-- Texto -->
      <div style="flex: 1; min-width: 320px;">
        <h2 style="font-family: 'Fredoka', sans-serif; font-size: 2.4rem; color: #4a9a9f; margin-bottom: 30px;">
          🏥 Cuidando de Vidas com Amor
        </h2>
        <p style="font-size: 1.2rem; line-height: 1.7; color: #444; font-family: 'Kalam', cursive;">
          Somos uma clínica veterinária que vai além da consulta. Aqui, cada animal é tratado como família, com atenção, carinho e estrutura moderna. Nossa missão é oferecer <strong>saúde, segurança e felicidade</strong> para o seu pet!
        </p>
        <ul style="margin-top: 30px; list-style: none; padding-left: 0; font-size: 1.05rem; color: #333; line-height: 1.8;">
          <li>🐾 Clínica completa e moderna</li>
          <li>🩺 Equipe apaixonada por pets</li>
          <li>💖 Ambiente acolhedor e seguro</li>
        </ul>
      </div>

      <!-- Imagem com moldura circular animada -->
      <div style="flex: 1; min-width: 320px; display: flex; justify-content: center;">
        <div style="border-radius: 50%; overflow: hidden; border: 10px solid #d6f4f8; box-shadow: 0 8px 24px rgba(0,0,0,0.1); animation: pulseImg 3s infinite;">
          <img src="https://cdn.pixabay.com/photo/2017/09/25/13/12/veterinarian-2785074_1280.jpg" alt="Clínica Veterinária" style="width: 300px; height: 300px; object-fit: cover;">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Carrossel de Imagens -->
<section style="background: #fff; padding: 40px 0;">
  <div class="container" data-aos="zoom-in">
    <h3 style="text-align: center; font-family: 'Fredoka', sans-serif; color: #4a9a9f; font-size: 2rem; margin-bottom: 30px;">🐶 Nosso Dia a Dia na Clínica</h3>
    
    <div class="carousel-container">
      <div class="carousel-track">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7eTT1QGMGlmelMGe5F9eg2HmVQvJOiyxY7w&s" alt="Pet feliz">
        <img src="https://i.pinimg.com/736x/8d/a4/70/8da4705ad8de7301ab5f92ab4db43e5f.jpg" alt="Banho divertido">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuDKDf3tVTFxVI5mVWDbfzKX-aCi8ncavd1Q&s" alt="Pet brincando">
        <img src="https://purina.com.br/sites/default/files/2024-08/consulta-veterinaria-filhotes-br.jpg" alt="Consulta atenciosa">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6h8OpsUg4QKZutQW-LV6z8DsjGdPQRiLNKw&s" alt="Carinho com gatos">
      </div>
    </div>
  </div>
</section>



<section id="servicos" style="padding: 80px 0; background: #eafcff; position: relative; overflow: hidden;">
  <!-- Pegadas animadas -->
  <div class="animacao-pegadas">
    <span>🐾</span><span>🐾</span><span>🐾</span><span>🐾</span>
  </div>

  <!-- Áudios -->
  <audio id="som-miado" src="https://assets.mixkit.co/sfx/preview/mixkit-small-cat-meow-81.mp3"></audio>
  <audio id="som-latido" src="https://assets.mixkit.co/sfx/preview/mixkit-dog-barking-twice-1.mp3"></audio>

  <div class="container" data-aos="fade-up">
    <h2 style="text-align: center; color: #2ba5c4; font-size: 2rem; margin-bottom: 40px;">
      🐶 Serviços com Muito Amor
    </h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
      <div class="card-servico" onclick="abrirModal('Consulta Veterinária', 'Consultas detalhadas, exames e check-up para garantir a saúde do seu pet.')">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Consulta" style="width: 60px;">
        <h4>Consulta</h4>
      </div>
      <div class="card-servico" onclick="abrirModal('Vacinação', 'Vacinas atualizadas com carinho e responsabilidade.')">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616430.png" alt="Vacinação" style="width: 60px;">
        <h4>Vacinação</h4>
      </div>
      <div class="card-servico" onclick="abrirModal('Banho e Tosa', 'Espaço higiênico, com produtos de qualidade e cuidado total.')">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616408.png" alt="Banho e Tosa" style="width: 60px;">
        <h4>Banho & Tosa</h4>
      </div>
      <div class="card-servico" onclick="abrirModal('Hotelzinho', 'Hospedagem segura, com amor e monitoramento diário.')">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616401.png" alt="Hotelzinho" style="width: 60px;">
        <h4>Hotelzinho</h4>
      </div>
      <div class="card-servico" onclick="abrirModal('Petshop', 'Produtos selecionados com curadoria e carinho para seu pet.')">
        <img src="https://cdn-icons-png.flaticon.com/512/616/616493.png" alt="Petshop" style="width: 60px;">
        <h4>Petshop</h4>
      </div>
    </div>
  </div>

  <!-- Modal de Serviços -->
  <div id="modal-servico" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.6); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:white; padding:30px; border-radius:15px; width:90%; max-width:500px; text-align:center; position:relative;">
      <span onclick="fecharModal()" style="position:absolute; right:15px; top:10px; font-size:24px; cursor:pointer;">&times;</span>
      <h3 id="modal-titulo" style="color:#2ba5c4;"></h3>
      <p id="modal-descricao" style="color:#444;"></p>
    </div>
  </div>

  <style>
    .card-servico {
      background: #fff;
      width: 180px;
      height: 180px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      cursor: pointer;
      transition: transform 0.3s, background 0.3s;
    }
    .card-servico:hover {
      background: #d1f6ff;
      transform: translateY(-5px);
    }
    .card-servico h4 {
      margin-top: 10px;
      color: #2ba5c4;
    }

    .animacao-pegadas {
      position: absolute;
      top: 60%;
      left: -300px;
      display: flex;
      gap: 10px;
      font-size: 2rem;
      animation: andarPegadas 20s linear infinite;
      opacity: 0.2;
      pointer-events: none;
    }

    @keyframes andarPegadas {
      0% { left: -300px; top: 60%; }
      50% { top: 62%; }
      100% { left: 110%; top: 60%; }
    }
  </style>

  <script>
    function abrirModal(titulo, descricao) {
      document.getElementById('modal-titulo').innerText = titulo;
      document.getElementById('modal-descricao').innerText = descricao;
      document.getElementById('modal-servico').style.display = 'flex';
    }
    function fecharModal() {
      document.getElementById('modal-servico').style.display = 'none';
    }

    const somLatido = document.getElementById('som-latido');
    const somMiado = document.getElementById('som-miado');
    document.querySelectorAll('.card-servico').forEach((card, index) => {
      card.addEventListener('mouseenter', () => {
        if (index % 2 === 0) {
          somLatido.currentTime = 0;
          somLatido.play();
        } else {
          somMiado.currentTime = 0;
          somMiado.play();
        }
      });
    });
  </script>
</section>


<section id="equipe" style="padding: 80px 0; background: #fff3f9; position: relative; overflow: hidden;">
  <!-- Fundo com patinhas decorativas -->
  <div class="decor-patas"></div>

  <div class="container" data-aos="fade-up">
    <h2 style="text-align: center; color: #d75da5; font-size: 2.5rem; margin-bottom: 50px; font-family: 'Comic Sans MS', cursive;">
      🐾 Nossa Equipe de Heróis Pet
    </h2>

    <div class="equipe-grid">
      <!-- Dra. Sofia -->
      <div class="card-equipe">
        <img src="https://img.freepik.com/vetores-gratis/veterinario-com-o-cao-engracado-dos-desenhos-animados-e-ilustracao-do-vetor-personagens-isolados_1196-293.jpg" alt="Dra. Sofia">
        <h4>Dra. Sofia Lima</h4>
        <p>Clínica Geral <br> 👩‍⚕️ 10 anos de experiência</p>
      </div>

      <!-- Dr. Ricardo -->
      <div class="card-equipe">
        <img src="https://thumbs.dreamstime.com/b/car%C3%A1ter-amig%C3%A1vel-do-veterin%C3%A1rio-dos-desenhos-animados-o-doutor-feliz-com-um-dobrador-e-estetosc%C3%B3pio-est%C3%A1-perto-c%C3%A3o-de-puxar-104174222.jpg" alt="Dr. Ricardo">
        <h4>Dr. Ricardo Alves</h4>
        <p>Cirurgia e Ortopedia <br> 🦴 Especialista em grandes e pequenos animais</p>
      </div>
    </div>
  </div>

  <style>
    .equipe-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 40px;
    }

    .card-equipe {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      padding: 20px;
      max-width: 240px;
      text-align: center;
      transition: transform 0.4s, box-shadow 0.4s;
      cursor: pointer;
      position: relative;
    }

    .card-equipe:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 8px 30px rgba(215, 93, 165, 0.3);
    }

    .card-equipe img {
      width: 100%;
      height: auto;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin-bottom: 15px;
      transition: transform 0.3s ease;
    }

    .card-equipe:hover img {
      transform: scale(1.05);
    }

    .card-equipe h4 {
      color: #d75da5;
      font-size: 1.2rem;
      margin-bottom: 8px;
      font-family: 'Trebuchet MS', sans-serif;
    }

    .card-equipe p {
      font-size: 0.95rem;
      color: #444;
      line-height: 1.4;
      font-family: 'Arial Rounded MT Bold', sans-serif;
    }

    /* Patinhas de fundo */
    .decor-patas {
      background-image: url('https://cdn-icons-png.flaticon.com/512/616/616408.png');
      background-repeat: repeat;
      background-size: 50px;
      opacity: 0.03;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
    }

    #equipe .container {
      position: relative;
      z-index: 1;
    }

    @media (max-width: 600px) {
      .card-equipe {
        max-width: 90%;
      }
    }
  </style>
</section>


<section id="galeria" style="padding: 80px 0; background: #f0fcff;">
  <div class="container" data-aos="zoom-in">
    <h2 style="text-align: center; color: #5cbdd0; font-size: 2.3rem; margin-bottom: 50px; font-family: 'Comic Sans MS', cursive;">
      📸 Momentos Felizes dos Nossos Pacientes
    </h2>

    <div class="galeria-carousel">
      <div class="galeria-slide">
        <img src="https://love.doghero.com.br/wp-content/uploads/2018/12/golden-retriever-1.png" alt="Pet feliz">
      </div>
      <div class="galeria-slide">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlaTwF5ldhd2FnhqwQMxdHhj9bfFKSYHRrUA&s" alt="Pet banho">
      </div>
      <div class="galeria-slide">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSrFnc2trFkJoclLVTauTmnwVtBZX6vZRJGvw&s" alt="Pet brincando">
      </div>
      <div class="galeria-slide">
        <img src="https://www.generalitranquilidade.pt/-/media/images/tranquilidade/blog/familia/preco-consulta-veterinario_principal.jpg?rev=9450f4d3e583408faf27c1babf62e8dd" alt="Consulta veterinária">
      </div>
    </div>
  </div>

  <style>
    .galeria-carousel {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      gap: 20px;
      padding-bottom: 10px;
    }

    .galeria-slide {
      flex: 0 0 auto;
      width: 250px;
      height: 180px;
      scroll-snap-align: center;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .galeria-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .galeria-slide:hover img {
      transform: scale(1.1);
    }

    /* Scrollbar personalizada */
    .galeria-carousel::-webkit-scrollbar {
      height: 8px;
    }

    .galeria-carousel::-webkit-scrollbar-thumb {
      background: #5cbdd0;
      border-radius: 10px;
    }

    @media (max-width: 600px) {
      .galeria-slide {
        width: 200px;
        height: 140px;
      }
    }
  </style>
</section>


<section id="depoimentos" style="padding: 80px 0; background: #fffaf4;">
  <div class="container" data-aos="fade-up">
    <h2 style="text-align: center; color: #f4a261; font-size: 2.2rem; margin-bottom: 50px; font-family: 'Comic Sans MS', cursive;">
      💬 O que dizem nossos tutores felizes
    </h2>

    <div class="depoimentos-carousel">
      <div class="depoimento-card">
        <p>“A Dra. Sofia cuidou do meu gatinho como se fosse dela. Atendimento impecável!”</p>
        <span>— Carla Mendes 🐱</span>
      </div>
      <div class="depoimento-card">
        <p>“Nunca vi meu cachorro tão feliz no banho! Recomendo demais!”</p>
        <span>— Tiago e Thor 🐶</span>
      </div>
      <div class="depoimento-card">
        <p>“Ambiente acolhedor, atendimento humano e muito carinho com os animais. Virei cliente fiel!”</p>
        <span>— Ana Beatriz 🐾</span>
      </div>
      <div class="depoimento-card">
        <p>“Deixei meu coelhinho por 3 dias no hotelzinho, e ele voltou calmo e cheiroso. Maravilhoso!”</p>
        <span>— Fernanda 🐰</span>
      </div>
    </div>
  </div>

  <style>
    .depoimentos-carousel {
      display: flex;
      overflow-x: auto;
      gap: 30px;
      scroll-snap-type: x mandatory;
      padding-bottom: 20px;
    }

    .depoimento-card {
      flex: 0 0 300px;
      background: #fff;
      padding: 25px 20px;
      border-radius: 20px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.05);
      scroll-snap-align: start;
      transition: transform 0.3s ease;
    }

    .depoimento-card:hover {
      transform: translateY(-5px);
    }

    .depoimento-card p {
      font-size: 1rem;
      line-height: 1.6;
      color: #444;
      margin-bottom: 15px;
    }

    .depoimento-card span {
      font-weight: bold;
      color: #f4a261;
      font-size: 0.95rem;
    }

    .depoimentos-carousel::-webkit-scrollbar {
      height: 8px;
    }

    .depoimentos-carousel::-webkit-scrollbar-thumb {
      background: #f4a261;
      border-radius: 10px;
    }

    @media (max-width: 500px) {
      .depoimento-card {
        flex: 0 0 90%;
      }
    }
  </style>
</section>


<section id="contato" style="padding: 80px 0; background: #f0fff5;">
  <div class="container" data-aos="fade-up">
    <h2 style="text-align: center; color: #4caf50; font-size: 2.2rem; margin-bottom: 40px; font-family: 'Comic Sans MS', cursive;">
      📬 Fale Conosco com Carinho
    </h2>

    <?php if (!empty($msg_enviado)): ?>
      <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
        <?= $msg_enviado ?>
      </div>
    <?php endif; ?>

    <form action="" method="post" style="max-width: 650px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
      <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">

      <div style="margin-bottom: 20px;">
        <label style="color: #333; font-weight: bold;">👤 Nome:</label><br>
        <input type="text" name="nome" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ccc; font-size: 1rem;">
      </div>

      <div style="margin-bottom: 20px;">
        <label style="color: #333; font-weight: bold;">📧 Email:</label><br>
        <input type="email" name="email" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ccc; font-size: 1rem;">
      </div>

      <div style="margin-bottom: 20px;">
        <label style="color: #333; font-weight: bold;">💬 Mensagem:</label><br>
        <textarea name="mensagem" rows="5" required style="width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #ccc; font-size: 1rem;"></textarea>
      </div>

      <div style="text-align: center; margin-top: 30px;">
        <button type="submit" name="send_msg" style="background: #4caf50; color: white; border: none; padding: 12px 35px; font-size: 1rem; border-radius: 10px; cursor: pointer; transition: background 0.3s;">
          🐾 Enviar Mensagem
        </button>
      </div>
    </form>
  </div>
</section>


<footer style="background: linear-gradient(135deg,rgb(201, 182, 205), #2ba5c4); color: white; padding: 40px 20px 20px;">
  <div class="container" style="max-width: 1200px; margin: auto; text-align: center;">
    
    <div style="margin-bottom: 25px;">
      <h3 style="font-size: 1.5rem; margin-bottom: 10px;">🐾 Amor, Cuidado e Dedicação</h3>
      <p style="font-size: 1rem;">Por todos os latidos, miados e olhares que nos ensinam o verdadeiro amor incondicional. Obrigado por confiar em nossa equipe. 💕</p>
    </div>

    <div style="margin-bottom: 25px;">
      <a href="https://facebook.com" target="_blank" style="margin: 0 10px; color: white; text-decoration: none;">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a href="https://instagram.com" target="_blank" style="margin: 0 10px; color: white; text-decoration: none;">
        <i class="fab fa-instagram"></i> Instagram
      </a>
      <a href="https://wa.me/351900000000" target="_blank" style="margin: 0 10px; color: white; text-decoration: none;">
        <i class="fab fa-whatsapp"></i> WhatsApp
      </a>
    </div>

    <p style="font-size: 0.9rem; margin-bottom: 5px;">
      &copy; <?= date("Y") ?> Clínica Pet Amor & Cuidado. Todos os direitos reservados.
    </p>
    <p style="font-size: 0.8rem; color: #eee;">
      Desenvolvido com 🐾 por <strong>Alex - Desenvolvedor Web</strong>
    </p>
  </div>
</footer>

<!-- Font Awesome CDN (coloque no <head> ou antes do fechamento do body) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<!-- Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
  });
</script>

<script>
  const toggleBtn = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  toggleBtn.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });
</script>

