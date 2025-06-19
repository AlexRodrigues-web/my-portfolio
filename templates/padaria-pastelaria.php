<?php
$msg_enviado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
    $nome     = trim($_POST['nome'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    if ($nome && filter_var($email, FILTER_VALIDATE_EMAIL) && $mensagem) {
        $msg_enviado = '<div class="alert success">✔️ Obrigado, ' . htmlspecialchars($nome) . '! Sua mensagem foi enviada com sucesso.</div>';
        $nome = $email = $mensagem = '';
    } else {
        $msg_enviado = '<div class="alert error">⚠️ Por favor, preencha todos os campos corretamente.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Padaria & Pastelaria Artesanal</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- AOS Animations -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    :root {
      --brown-D: #5C4033;
      --beige:   #F5E1D4;
      --cream:   #FFF6ED;
      --wine:    #A64B2A;
      --mint:    #A6D5BA;
      --pink:    #FBD8D4;
      --white:   #FFFFFF;
    }
    * { box-sizing: border-box; margin:0; padding:0; }
    body {
      font-family: 'Poppins', sans-serif;
      background: var(--cream);
      color: var(--brown-D);
      line-height: 1.6;
      scroll-behavior: smooth;
      opacity: 0;
      transition: opacity 0.6s ease-in-out;
    }
    body.loaded { opacity: 1; }
    a { text-decoration: none; color: inherit; }

    /* ALERTAS */
    .alert {
      padding: 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      font-weight: 600;
      text-align: center;
    }
    .alert.success {
      background: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    .alert.error {
      background: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    /* HEADER */
    header {
      position: fixed; top:0; left:0; width:100%;
      background: rgba(255,255,255,0.8);
      backdrop-filter: blur(10px);
      z-index: 1000;
      display: flex; align-items:center; justify-content: space-between;
      padding:1rem 2rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .logo { font-family: 'Playfair Display', serif; font-size:1.8rem; color:var(--wine); }
    nav { display:flex; gap:1rem; }
    nav a { font-weight:600; padding:0.4rem 0.6rem; transition: color 0.3s; }
    nav a:hover { color: var(--wine); }

    .menu-toggle {
      display: none;
      font-size: 1.6rem;
      cursor: pointer;
    }
    @media (max-width: 768px) {
      nav {
        position: absolute; top:100%; left:0;
        width: 100%; background: var(--cream);
        flex-direction: column;
        align-items: center;
        display: none;
      }
      nav.show { display: flex; }
      .menu-toggle { display: block; }
    }

    .btn-cta {
      background: #ff6f61;
      border: none;
      color: #fff;
      font-weight: 600;
      font-size: 1.1rem;
      padding: 0.75rem 1.8rem;
      border-radius: 50px;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(255,111,97,0.5);
      transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }
    .btn-cta:hover {
      background: #ff4a30;
      box-shadow: 0 6px 20px rgba(255,74,48,0.7);
      transform: translateY(-2px);
    }

    /* HERO */
    .hero {
      position: relative;
      height: 80vh;
      background: url('https://images.unsplash.com/photo-1565958018014-5a73131c3d87?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 1.5rem;
      font-family: 'Playfair Display', serif;
    }
    .hero-content {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(8px);
      border-radius: 16px;
      padding: 3rem 2rem;
      color: #fff;
      text-align: center;
      box-shadow: 0 8px 24px rgba(0,0,0,0.3);
    }
    .hero h1 {
      font-size: 3.6rem;
      margin-bottom: 1rem;
    }
    .hero p {
      font-size: 1.4rem;
      margin-bottom: 2rem;
    }

    /* SECTION GENÉRICOS */
    section { padding:4rem 2rem; }
    h2 { font-family:'Playfair Display', serif; font-size:2.4rem; color:var(--wine); margin-bottom:1rem; text-align:center; }

    .filtro { display:flex; justify-content:center; gap:1rem; flex-wrap:wrap; margin-bottom:2rem; }
    .filtro button {
      background:var(--beige); border:none; padding:0.6rem 1rem; border-radius:20px;
      cursor:pointer; transition:background 0.3s;
    }
    .filtro button.active, .filtro button:hover { background:var(--wine); color:#fff; }

    .produtos {
      display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
      gap:1.5rem;
    }
    .produto-card {
      background:var(--cream);
      border-radius:10px;
      overflow:hidden;
      box-shadow:0 4px 12px rgba(0,0,0,0.05);
      transition:transform 0.3s;
    }
    .produto-card:hover { transform:translateY(-5px); }
    .produto-card img {
      width:100%; height:180px; object-fit:cover;
      transition: transform 0.3s ease;
    }
    .produto-card:hover img {
      transform: scale(1.05);
    }
    .produto-info {
      padding:1rem; text-align:center;
    }
    .produto-info h3 { margin-bottom:0.5rem; color:var(--wine); }
    .produto-info p { font-size:0.9rem; margin-bottom:0.5rem; }
    .produto-info .price { font-weight:600; color:var(--mint); }

    .sobre { display:flex; flex-wrap:wrap; align-items:center; gap:2rem; }
    .sobre-text, .sobre-img { flex:1; }
    .sobre-img img { width:100%; border-radius:10px; }
    .selos {
      display: flex; gap: 0.5rem; flex-wrap: wrap; margin-top: 1rem;
    }
    .selos span {
      background: var(--mint); color: var(--brown-D);
      padding: 0.4rem 0.8rem; border-radius: 30px;
      font-size: 0.85rem; font-weight: 600;
    }

    .encomendas { background:var(--beige); border-radius:10px; padding:2rem; max-width: 600px; margin: 0 auto; }
    .encomendas form { display:grid; gap:1rem; }
    .encomendas input, .encomendas textarea, .encomendas select {
      padding:0.8rem; border-radius:5px; border:1px solid #ccc;
    }

    .galeria-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:1rem; }
    .galeria-grid img {
      width:100%; border-radius:8px; cursor:pointer; transition:transform 0.3s;
    }
    .galeria-grid img:hover { transform:scale(1.03); }

    .depoimentos { text-align:center; }
    .depoimento-item { display:none; }
    .depoimento-item.active { display:block; }
    .depoimento-item p { font-style:italic; margin-bottom:0.5rem; }
    .depoimento-item .autor { font-weight:600; }
    .depo-controles { margin-top:1rem; display:flex; justify-content:center; gap:1rem; }
    .depo-controles button {
      background:var(--wine); color:#fff; border:none; border-radius:50%; padding:0.5rem;
      cursor:pointer;
    }

    .contato { max-width:500px; margin:0 auto; }
    .contato form { display:grid; gap:1rem; }

    footer {
      background:var(--wine); color:var(--white); text-align:center;
      padding:2rem 1rem; margin-top:2rem;
    }
    footer .social a { margin:0 0.5rem; color:var(--white); font-size:1.2rem; }

    .galeria-grid.compacta {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 1rem;
  justify-content: center;
}
.galeria-grid.compacta img {
  width: 100%;
  height: 140px;
  object-fit: cover;
  border-radius: 8px;
  cursor: zoom-in;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.galeria-grid.compacta img:hover {
  transform: scale(1.03);
  box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

  </style>
</head>
<body>
  <header>
    <a href="#inicio" class="logo"><i class="fas fa-bread-slice"></i> Padaria Arte & Sabor</a>
    <nav>
      <a href="#inicio">Início</a>
      <a href="#produtos">Produtos</a>
      <a href="#sobre">Sobre</a>
      <a href="#encomendas">Encomendas</a>
      <a href="#galeria">Galeria</a>
      <a href="#depoimentos">Depoimentos</a>
      <a href="#contato">Contato</a>
    </nav>
    <button class="btn-cta" onclick="location.href='https://wa.me/351900000000'">
      <i class="fab fa-whatsapp"></i> WhatsApp
    </button>
    <div class="menu-toggle"><i class="fas fa-bars"></i></div>
  </header>

 <section class="hero" id="inicio" style="position: relative; background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1606851092121-8b97f9a9be68?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat; padding: 6rem 1.5rem; text-align: center; color: #fff;">
  <div class="hero-wrapper" data-aos="fade-down" style="max-width: 700px; margin: 0 auto;">
    <h1 style="font-size: 3rem; line-height: 1.2; font-family: 'Playfair Display', serif; margin-bottom: 1rem;">
      Tradição e Sabor Autêntico
    </h1>
    <p style="font-size: 1.2rem; font-weight: 300; margin-bottom: 2rem; color: #f5f5f5;">
      Padaria & Pastelaria Artesanal desde 1985 — feita com amor, fermentação natural e ingredientes selecionados.
    </p>
    <button class="btn-cta" onclick="document.getElementById('produtos').scrollIntoView({behavior:'smooth'})">
      <i class="fas fa-store"></i> Ver Produtos
    </button>
  </div>
</section>


  <main>
    <section id="produtos">
      <h2 data-aos="fade-up">Produtos de Destaque</h2>
      <div class="filtro" data-aos="fade-up" data-aos-delay="100">
        <button class="active">Todos</button>
        <button>Pães</button>
        <button>Doces</button>
        <button>Pastéis</button>
        <button>Café</button>
      </div>
      <div class="produtos" data-aos="fade-up" data-aos-delay="200">
        <div class="produto-card">
          <img src="https://sire-media-24k.techops.disn.io/24k_pt/clip-main/485104.1200x675.jpg" alt="Bolo de Chocolate">
          <div class="produto-info">
            <h3>Bolo de Chocolate</h3>
            <p>Fofinho, com cobertura intensa e irresistível.</p>
            <div class="price">€4,50</div>
          </div>
        </div>
        <div class="produto-card">
          <img src="https://offloadmedia.feverup.com/lisboasecreta.co/wp-content/uploads/2019/04/16104701/56862374_2208594645845235_4752233248321437696_o-1024x683.jpg" alt="Pastel de Nata">
          <div class="produto-info">
            <h3>Pastel de Nata</h3>
            <p>Tradicional, crocante e cremoso.</p>
            <div class="price">€1,20</div>
          </div>
        </div>
      </div>
    </section>

   <section id="sobre" style="background: var(--cream); padding: 3rem 1.5rem; border-radius: 16px; border: 1px solid #eee;">
  <div class="sobre-minimal" data-aos="fade-up">
    <div class="sobre-logo" style="text-align:center; margin-bottom:1.5rem;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMQwdFRd4IQ5HWXoSsQ65VpOmNMzgOZV00HA&s" alt="Logomarca da Padaria" style="max-width: 80px; opacity: 0.7;">
    </div>
    <h2 style="text-align:center; color: var(--wine); font-size: 2.2rem; margin-bottom: 1rem;">
      <i class="fas fa-info-circle"></i> Sobre a Padaria
    </h2>
    <p style="max-width: 700px; margin: 0 auto; font-size: 1.05rem; text-align: center; color: #444; line-height: 1.7;">
      Desde 1985, somos referência em produtos de fermentação natural, feitos com amor, dedicação e ingredientes selecionados. Nossa missão é oferecer uma experiência única em cada mordida.
    </p>

    <ul class="selos-sobre" style="margin-top: 2rem; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; list-style: none; padding: 0;">
      <li style="background: var(--mint); color: var(--brown-D); padding: 0.5rem 1rem; border-radius: 30px; font-weight: 600;">100% Artesanal</li>
      <li style="background: var(--pink); color: var(--brown-D); padding: 0.5rem 1rem; border-radius: 30px; font-weight: 600;">Receitas Familiares</li>
      <li style="background: var(--beige); color: var(--brown-D); padding: 0.5rem 1rem; border-radius: 30px; font-weight: 600;">Mais de 500 Clientes</li>
    </ul>
  </div>
</section>


    <section id="encomendas">
      <h2 data-aos="fade-left">Encomendas & Festas</h2>
      <div class="encomendas" data-aos="fade-up">
        <form onsubmit="enviarWhatsAppEncomenda(event)">
          <input type="text" name="nome" placeholder="Seu Nome" required>
          <input type="date" name="data" required>
          <select name="tipo">
            <option value="">Selecione Tipo de Encomenda</option>
            <option>Bolos Personalizados</option>
            <option>Cestas Matinais</option>
            <option>Mini Doces</option>
            <option>Coffee Break</option>
          </select>
          <textarea name="detalhes" rows="3" placeholder="Detalhes"></textarea>
          <button type="submit" class="btn-cta"><i class="fas fa-bolt"></i> Encomendar via WhatsApp</button>
        </form>
      </div>
    </section>

   <section id="galeria" style="background: var(--beige); padding: 3rem 1.5rem; border-radius: 16px;">
  <h2 data-aos="zoom-in" style="margin-bottom: 2rem;"><i class="fas fa-camera-retro"></i> Galeria de Sabores</h2>

  <div class="galeria-grid compacta" data-aos="fade-up" data-aos-delay="100">
    <img src="https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480/img/recipe/ras/Assets/C7B07465-736B-4A08-A20E-EA5D8DE23B31/Derivates/D759BD49-CED7-43D7-9C55-24719260EC0D.jpg" alt="Broa de Milho" onclick="abrirLightbox(this)">
    <img src="https://img.freepik.com/fotos-gratis/croissants-em-uma-tabua-de-madeira_1150-28480.jpg?semt=ais_hybrid&w=740" alt="Croissant" onclick="abrirLightbox(this)">
    <img src="https://storage.googleapis.com/imagens_videos_gou_cooking_prod/production/mesas/2020/06/416e06c2-massa-de-pastel-caseiro-%E2%80%93-pastel-de-feira-_-tm-pastel-_-hel%C3%B4-bacellar-_-alta-4.jpg" alt="Pastel Artesanal" onclick="abrirLightbox(this)">
    <img src="https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480_1_5x/img/recipe/ras/Assets/371553d8-9664-43d2-b6d3-843004f34739/Derivates/ac2ecef8-e20f-4af8-979b-ba0c5eb7edb2.jpg" alt="Tarte de Maçã" onclick="abrirLightbox(this)">
  </div>

  <!-- Lightbox -->
  <div id="lightbox" onclick="fecharLightbox()" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); justify-content:center; align-items:center; z-index:9999;">
    <img id="lightbox-img" src="" alt="Ampliado" style="max-width:90%; max-height:90%; border-radius:12px; box-shadow:0 0 20px rgba(255,255,255,0.3);">
  </div>
</section>


    <section id="depoimentos">
      <h2 data-aos="fade-up">Depoimentos</h2>
      <div class="depoimentos" data-aos="fade-up" data-aos-delay="200">
        <div class="depoimento-item active">
          <p>“O melhor pão de fermentação natural da cidade!”</p>
          <div class="autor">– Ana, Lisboa</div>
        </div>
        <div class="depoimento-item">
          <p>“O pastel de nata mais autêntico que já provei.”</p>
          <div class="autor">– Pedro, Porto</div>
        </div>
        <div class="depo-controles">
          <button onclick="mostrarDepoimento(-1)">❮</button>
          <button onclick="mostrarDepoimento(1)">❯</button>
        </div>
      </div>
    </section>

    <section id="contato" style="background: var(--beige); border-radius: 16px; padding: 4rem 2rem; margin-top: 2rem;">
  <div class="contato-container" data-aos="fade-up">
    <h2 style="text-align:center; font-size:2.6rem; color:var(--wine); margin-bottom:1rem;">
      <i class="fas fa-envelope-open-text"></i> Fale Connosco
    </h2>
    <p class="subtitle" style="text-align:center; margin-bottom:2rem; font-size:1.1rem; color:#555;">
      Estamos prontos para adoçar seu dia! Preencha o formulário abaixo e responderemos o mais breve possível.
    </p>

    <?= $msg_enviado ?>

    <form class="contato-form" method="post" action="#contato" data-aos="fade-up" data-aos-delay="100" style="max-width: 600px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.07);">
      <div style="display: grid; gap: 1.2rem;">
        <div>
          <label for="nome" class="sr-only">Nome</label>
          <input type="text" id="nome" name="nome" placeholder="👤 Seu nome completo" value="<?= htmlspecialchars($nome ?? '') ?>" required
                 style="width: 100%; padding: 0.8rem 1rem; border-radius: 8px; border: 1px solid #ccc;">
        </div>
        <div>
          <label for="email" class="sr-only">Email</label>
          <input type="email" id="email" name="email" placeholder="📧 Seu email" value="<?= htmlspecialchars($email ?? '') ?>" required
                 style="width: 100%; padding: 0.8rem 1rem; border-radius: 8px; border: 1px solid #ccc;">
        </div>
        <div>
          <label for="mensagem" class="sr-only">Mensagem</label>
          <textarea id="mensagem" name="mensagem" rows="5" placeholder="💬 Sua mensagem..." required
                    style="width: 100%; padding: 1rem; border-radius: 8px; border: 1px solid #ccc; resize: vertical;"><?= htmlspecialchars($mensagem ?? '') ?></textarea>
        </div>
        <button type="submit" name="enviar" class="btn-cta" style="margin-top: 1rem;">
          <i class="fas fa-paper-plane"></i> Enviar Mensagem
        </button>
      </div>
    </form>
  </div>
</section>


  <footer data-aos="fade-up">
    <div class="social">
      <a href="mailto:contato@padaria.com"><i class="fas fa-envelope"></i></a>
      <a href="https://wa.me/351900000000"><i class="fab fa-whatsapp"></i></a>
      <a href="https://instagram.com/padaria"><i class="fab fa-instagram"></i></a>
    </div>
    <p>© <?= date('Y') ?> Padaria Arte & Sabor • Feito com ❤️ e fermento natural • Desenvolvido por Alex - Web Developer</p>
  </footer>

  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({ once: true });
    window.addEventListener('load', () => document.body.classList.add('loaded'));

    const items = document.querySelectorAll('.depoimento-item');
    let di = 0;
    function mostrarDepoimento(dir) {
      items[di].classList.remove('active');
      di = (di + dir + items.length) % items.length;
      items[di].classList.add('active');
    }

    function enviarWhatsAppEncomenda(e) {
      e.preventDefault();
      const f = e.target;
      const text = `Olá! ${f.nome.value}, gostaria de encomendar ${f.tipo.value} para ${f.data.value}. Detalhes: ${f.detalhes.value}`;
      window.open('https://wa.me/351900000000?text=' + encodeURIComponent(text), '_blank');
    }

    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
      document.querySelector('nav').classList.toggle('show');
    });
  </script>

  <script>
  function abrirLightbox(img) {
    const lightbox = document.getElementById('lightbox');
    const imgZoom = document.getElementById('lightbox-img');
    imgZoom.src = img.src;
    lightbox.style.display = 'flex';
  }

  function fecharLightbox() {
    const lightbox = document.getElementById('lightbox');
    lightbox.style.display = 'none';
    document.getElementById('lightbox-img').src = '';
  }
</script>

</body>
</html>
