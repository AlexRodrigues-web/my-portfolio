<?php
// index.php – Template moderno e masculino para barbearia (sem canvas, tudo no chat)
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8">
  <title>Barbearia Artesanal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 e ícones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Spectral+SC:wght@500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jolly+Lodger&family=Spectral+SC:wght@500&display=swap" rel="stylesheet">


  <style>
    body {
      background-color: #121212;
      color: #f1f1f1;
      font-family: 'Segoe UI', sans-serif;
    }
   header {
  background: url('wood-texture-dark.jpg') center center / cover no-repeat;
  color: #fff;
  border-bottom: 3px solid #aa8833;
  font-family: 'Alfa Slab One', cursive;
}

header h1 {
  font-size: 2rem;
  letter-spacing: 2px;
  display: flex;
  align-items: center;
}

header h1 i {
  margin-right: 10px;
  color: #aa8833;
}

header nav a {
  color: #f1f1f1;
  margin: 0 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  position: relative;
}

header nav a:hover {
  color: #aa8833;
  text-decoration: none;
}

@media (max-width: 768px) {
  header .container {
    flex-direction: column;
  }
  header nav {
    margin-top: 10px;
  }
}

    .hero {
  background: url('https://www.efectoled.com/blog/es/wp-content/uploads/sites/2/2023/09/iluminacion-barberia.jpg') center center / cover no-repeat;
  height: 80vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}
.hero::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.65); /* escurece a imagem para dar contraste */
}
.hero .content {
  position: relative;
  text-align: center;
  z-index: 2;
}

    .btn-dourado {
      background-color: #aa8833;
      color: #fff;
      border: none;
    }
    .btn-dourado:hover {
      background-color: #c99e33;
    }
    section {
      padding: 4rem 0;
    }
  .section-title {
  font-family: 'Jolly Lodger', cursive;
  font-size: 2.5rem;
  color: #aa8833;
  letter-spacing: 1px;
  position: relative;
}

.service-card {
  transition: all 0.3s ease-in-out;
  background: linear-gradient(145deg, #1a1a1a, #262626);
  border-radius: 12px;
}
.service-card:hover {
  transform: scale(1.03);
  box-shadow: 0 0 20px rgba(170, 136, 51, 0.4);
}

    footer {
      background: #1c1c1c;
      text-align: center;
      padding: 2rem 1rem;
      border-top: 2px solid #aa8833;
    }
    footer .signature {
      font-family: monospace;
      font-size: 0.9rem;
      color: #888;
    }
    .card {
      background-color: #2b2b2b;
      color: #fff;
      border: 1px solid #444;
    }
    .galeria img {
      height: 150px;
      object-fit: cover;
      border: 2px solid #aa8833;
    }

    .pulse {
  animation: pulseEffect 1.5s infinite;
  transition: all 0.3s ease-in-out;
}

@keyframes pulseEffect {
  0% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.05); opacity: 0.8; }
  100% { transform: scale(1); opacity: 1; }
}


.hero .content h2 {
  font-family: 'UnifrakturMaguntia', cursive;
  font-size: 4.2rem;
  letter-spacing: 1px;
  text-transform: none;
  color: #fdfdfd;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
}

.hero .content p {
  font-family: 'Spectral SC', serif;
  font-size: 1.3rem;
  letter-spacing: 1px;
  color: #ddd;
  text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
  margin-top: 10px;
}

.product-carousel-img {
  height: 400px;
  object-fit: cover;
  cursor: pointer;
  border-radius: 8px;
}

.galeria-thumb {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: zoom-in;
}
.galeria-thumb:hover {
  transform: scale(1.05);
  box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
}

#modalMarcacao .form-label {
  font-weight: bold;
  color: #f0e68c;
}
#modalMarcacao .form-control,
#modalMarcacao .form-select {
  border: 1px solid #444;
}
#modalMarcacao .btn-outline-light:hover {
  background-color: #f0e68c;
  color: #000;
}



</style>
</head>
<body>

<!-- Header -->
<header class="bg-dark text-light">
  <div class="container py-3">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <!-- LOGO + NOME -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-skull-with-retro-barbershop-badge-and-barbershop-tools-suitable-for-barber-png-image_5305856.jpg"
             alt="Logo Barbearia" width="48" height="48"
             class="me-2 rounded-circle shadow border border-light">
        <span style="font-family: 'Jolly Lodger', cursive; font-size: 1.8rem;">
          <i class="bi bi-scissors me-1"></i> Barbearia Artesanal
        </span>
      </a>

      <!-- BOTÃO HAMBURGUER -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENU -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="#servicos" class="nav-link text-light">Serviços</a></li>
          <li class="nav-item"><a href="#loja" class="nav-link text-light">Loja</a></li>
          <li class="nav-item"><a href="#espaco" class="nav-link text-light">Espaço</a></li>
          <li class="nav-item"><a href="#galeria" class="nav-link text-light">Galeria</a></li>
          <li class="nav-item"><a href="#contato" class="nav-link text-light">Contacto</a></li>
        </ul>
      </div>
    </nav>
  </div>
</header>



<!-- Hero -->
<section class="hero text-light">
  <div class="content text-center">
    <h2 class="display-4">Estilo, tradição e cerveja artesanal</h2>

    <p class="text-light mt-3" style="font-family: 'Jolly Lodger', cursive; font-size: 1.5rem; text-shadow: 1px 1px 2px #000;">
      ✂️ Agende já o seu corte ou venha curtir um jogo de sinuca connosco 🍺
    </p>

    <!-- Botão que abre o modal de agendamento -->
    <button class="btn btn-dourado btn-lg mb-4" data-bs-toggle="modal" data-bs-target="#modalMarcacao">
    Agendar Agora
  </button>
  </div>
</section>




<!-- Serviços -->
<section id="servicos" class="container py-5">
  <h3 class="section-title text-center mb-5">💈 Serviços Masculinos</h3>
  <div class="row g-4">
    <?php
    $servicos = [
      ['Corte Clássico', '€15', '30 min', 'bi-scissors', 'Corte tradicional com máquina e tesoura, finalização com produtos profissionais.'],
      ['Barba com Toalha Quente', '€12', '25 min', 'bi-droplet', 'Modelagem da barba com lâmina e aplicação de toalha quente aromatizada.'],
      ['Combo Corte + Barba + Cerveja 🍺', '€25', '50 min', 'bi-beer', 'Pacote completo: corte de cabelo, barba bem desenhada e uma cerveja artesanal.'],
      ['Sobrancelha', '€7', '15 min', 'bi-eyeglasses', 'Limpeza e modelagem natural das sobrancelhas masculinas.'],
      ['Corte Degradê Navalhado', '€18', '35 min', 'bi-person-bounding-box', 'Degradê preciso com navalha e acabamento impecável.'],
      ['Barba + Design com Navalha', '€16', '30 min', 'bi-lightning', 'Desenho da barba personalizado, usando navalha e óleo relaxante.'],
      ['Pacote Corte Mensal', '€50', '4 sessões', 'bi-calendar3', 'Assinatura mensal com 4 cortes agendados + prioridade nos horários.'],
      ['Limpeza Facial Masculina', '€20', '30 min', 'bi-flower2', 'Higienização profunda da pele com produtos próprios para o homem.']
    ];

    foreach ($servicos as $index => $s) {
      echo "
      <div class='col-md-6 col-lg-3'>
        <div class='card bg-dark text-light border border-secondary h-100 shadow-sm service-card'>
          <div class='card-body text-center'>
            <div class='mb-3'><i class='bi {$s[3]} fs-1 text-warning'></i></div>
            <h5 class='fw-bold'>{$s[0]}</h5>
            <p class='text-warning fs-5'>{$s[1]}</p>
            <p><small class='text-muted'>Duração: {$s[2]}</small></p>
            <button class='btn btn-outline-light btn-sm mt-3' data-bs-toggle='modal' data-bs-target='#modalServico{$index}'>Ver detalhes</button>
          </div>
        </div>
      </div>

      <!-- Modal do serviço {$s[0]} -->
      <div class='modal fade' id='modalServico{$index}' tabindex='-1'>
        <div class='modal-dialog modal-dialog-centered'>
          <div class='modal-content bg-dark text-light'>
            <div class='modal-header border-secondary'>
              <h5 class='modal-title text-warning'>{$s[0]}</h5>
              <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body'>
              <p>{$s[4]}</p>
              <ul class='list-unstyled'>
                <li><strong>Preço:</strong> {$s[1]}</li>
                <li><strong>Duração:</strong> {$s[2]}</li>
              </ul>
            </div>
            <div class='modal-footer border-secondary'>
              <a href='#agendar' class='btn btn-dourado'>Agendar este serviço</a>
            </div>
          </div>
        </div>
      </div>
      ";
    }
    ?>
  </div>

  <div class="text-center mt-5">
    <a href="#agendar" class="btn btn-dourado btn-lg">
      <i class="bi bi-calendar-check me-2"></i> Ver Todos os Horários
    </a>
  </div>
</section>



<!-- Loja -->
<section id="loja" class="container py-5">
  <h3 class="section-title text-center mb-5" style="font-family: 'Jolly Lodger', cursive; font-size: 2.5rem; color: #FFD700; text-shadow: 2px 2px 4px #000;">
    🧴 Nossa Linha Exclusiva
  </h3>

  <p class="text-center mb-4" style="color: #eee; font-family: 'Spectral SC', serif; font-size: 1.2rem; text-shadow: 1px 1px 2px #000;">
    Veja alguns dos nossos <span style="color: #FFD700; text-decoration: underline dotted;">produtos artesanais</span> em detalhe 🧔🪒
  </p>

  <div id="carouselProdutos" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner text-center">

      <?php
      $imgs = [
        ['Pomada Modeladora', 'Cabelos', 'https://cdn.awsli.com.br/2500x2500/2455/2455458/produto/259859806/pasta-black-feed-yvg01d086q.png'],
        ['Óleo Premium para Barba', 'Barba', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYZeuFDmy4iY2AGL7Qrd63Dn_h-a2EYzAH-w&s'],
        ['Shampoo Fortificante', 'Cabelos', 'https://grandha.com.br/wp-content/uploads/2025/01/shampoo-black-touch-3x1-rejuvenescendo-barba-e-cabelo-grandha-bg.jpg'],
        ['Balm Pós-Barba Calmante', 'Barba', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6QWnv3BMoIczJwKklWY1nhhZ-3Aajhv-Rjw&s']
      ];

      foreach ($imgs as $i => $img): ?>
        <div class="carousel-item<?= $i==0?' active':'' ?>">
          <div class="d-flex justify-content-center">
            <div class="card bg-dark text-light border-0 shadow-lg" style="width: 20rem;">
              <img src="<?= $img[2] ?>" class="card-img-top p-3 rounded" alt="<?= $img[0] ?>" style="height: 300px; object-fit: contain;">
              <div class="card-body">
                <h5 class="card-title" style="font-family: 'Jolly Lodger', cursive; font-size: 1.5rem;"><?= $img[0] ?></h5>
                <p class="card-text" style="color: #ccc;"><?= $img[1] ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdutos" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselProdutos" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>
</section>


<!-- Lightbox simples -->
<div class="modal fade" id="modalImage" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark">
      <button type="button" class="btn-close btn-close-white m-3 position-absolute end-0" data-bs-dismiss="modal"></button>
      <img src="" id="modalImageSrc" class="img-fluid rounded mx-auto d-block">
    </div>
  </div>
</div>


<!-- Espaço -->
<section id="espaco" class="container text-center py-5">
  <h3 class="section-title mb-3" style="font-family: 'Jolly Lodger', cursive; font-size: 2.5rem;">🍺 Nosso Espaço</h3>
  <p class="mb-4 text-light" style="font-family: 'Spectral SC', serif; font-size: 1.2rem;">
    Sinuca, cervejas artesanais, atendimento premium e aquele ambiente <strong>lenhador que respeita a barba do homem moderno</strong>.
  </p>

  <div class="mx-auto" style="max-width: 720px;">
    <div class="ratio ratio-16x9 rounded overflow-hidden shadow-lg">
      <iframe 
        src="https://www.youtube.com/embed/YkP212hTiTQ?start=271" 
        title="Espaço da Barbearia" 
        allowfullscreen 
        loading="lazy"
        style="border:0;">
      </iframe>
    </div>
  </div>
</section>



<!-- Galeria -->
<section id="galeria" class="container py-5">
  <h3 class="section-title text-center mb-4" style="font-family: 'Jolly Lodger', cursive; font-size: 2.5rem;">📸 Galeria de Estilo</h3>

  <div class="row g-4 justify-content-center">
    <?php
    $fotos = [
      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTSyeXsmfQbUEEy7FnW95WqpxJEWCe6kffSuA&s',
      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSrqb5ko8lSchfYt2OO8k6qrPRZRpCjetUTA&s',
      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxJM8PTL5hoJEZOncMy4wBPpEkxYtXUp8OHg&s',
      'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3Lniz6UOJUDKQS4lw_PgS8iXuIfpMSeLBFA&s',
      'https://i.ytimg.com/vi/3VoOE7oYNJ4/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLB7jtIZ03XElAFRx2TkFM_-l8HIaA',
      'https://blog.mygon.com/wp-content/uploads/2015/10/shutterstock_364869428.jpg'
    ];
    foreach ($fotos as $index => $f) {
      echo "
      <div class='col-6 col-md-4 col-lg-2'>
        <img src='{$f}' class='img-fluid rounded galeria-thumb shadow-sm' alt='Estilo Barbearia' data-bs-toggle='modal' data-bs-target='#modalFoto{$index}'>
      </div>

      <!-- Modal da imagem -->
      <div class='modal fade' id='modalFoto{$index}' tabindex='-1' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-lg'>
          <div class='modal-content bg-dark'>
            <div class='modal-header border-0'>
              <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal'></button>
            </div>
            <div class='modal-body text-center'>
              <img src='{$f}' class='img-fluid rounded'>
            </div>
          </div>
        </div>
      </div>
      ";
    }
    ?>
  </div>
</section>



<!-- Contato -->
<section id="contato" class="container text-center py-5">
  <h3 class="section-title mb-4" style="font-family: 'Jolly Lodger', cursive;">✂️ Marcação de Horário</h3>
 <p class="text-light mb-3" style="font-family: 'Spectral SC', serif; font-size: 1.3rem; letter-spacing: 0.5px; text-shadow: 1px 1px 2px #000;">
  Escolha seu <strong>serviço</strong>, <strong>profissional</strong> e <strong>horário</strong>. Atendimento personalizado com estilo 🧔✂️🍺
</p>


  <button class="btn btn-dourado btn-lg mb-4" data-bs-toggle="modal" data-bs-target="#modalMarcacao">
    Agendar Agora
  </button>

  <p class="text-light mt-4 mb-0" style="font-family: 'Spectral SC', serif; font-size: 1.1rem; text-shadow: 1px 1px 2px #000;">
  <span class="d-block mb-2" style="font-size: 1.2rem;">
    📍 <strong>Rua da Bélgica 2450</strong>, Canidelo – Vila Nova de Gaia
  </span>
  📞 <strong>+351 912 345 678</strong> &nbsp;|&nbsp;
  ✉️ <a href="mailto:contato@barbearia.pt" class="text-decoration-none text-warning">contato@barbearia.pt</a>
</p>


  <!-- Quadro de madeira lenhador com mapa dentro -->
  <div class="quadro-mapa mx-auto mt-4">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.050739127303!2d-8.65826518458168!3d41.123617279288004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464f9619e3001%3A0x8b5a659b8beef41a!2sR.%20da%20B%C3%A9lgica%202450%2C%204405-034%20Vila%20Nova%20de%20Gaia!5e0!3m2!1spt-PT!2spt!4v1719012345678" 
      width="100%" 
      height="200" 
      style="border:0; filter: grayscale(100%) brightness(90%) contrast(120%);" 
      allowfullscreen 
      loading="lazy">
    </iframe>
  </div>

  <style>
    .quadro-mapa {
      max-width: 400px;
      height: auto;
      padding: 20px;
      margin-top: 30px;
      border-radius: 15px;
      background: url('https://previews.123rf.com/images/aquir/aquir2308/aquir230801272/210655803-rustic-three-dimensional-wood-texture-wood-background-modern-wooden-facing-background-dark-wooden.jpg') center/cover no-repeat;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.7);
    }

    .quadro-mapa iframe {
      border-radius: 8px;
    }
  </style>
</section>


<div class="modal fade" id="modalMarcacao" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content text-light" style="background: url('https://png.pngtree.com/png-clipart/20200225/original/pngtree-skull-with-retro-barbershop-badge-and-barbershop-tools-suitable-for-barber-png-image_5305856.jpg') center center / cover no-repeat; border: 4px solid #222;">

      <div class="modal-header border-0">
        <h5 class="modal-title text-light" style="font-family: 'Jolly Lodger', cursive; font-size: 2rem;">💈 Agendamento</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body bg-black bg-opacity-75 p-4 rounded">
        <form id="formMarcacao" class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control bg-dark text-light" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Telemóvel</label>
            <input type="tel" class="form-control bg-dark text-light">
          </div>
          <div class="col-md-6">
            <label class="form-label">Serviço</label>
            <select class="form-select bg-dark text-light" required>
              <option selected disabled>Escolha...</option>
              <option>Corte Clássico</option>
              <option>Barba com Toalha Quente</option>
              <option>Combo Corte + Barba + Cerveja 🍺</option>
              <option>Sobrancelha</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Data</label>
            <input type="date" class="form-control bg-dark text-light" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Horário</label>
            <select class="form-select bg-dark text-light" required>
              <option selected disabled>Escolha...</option>
              <option>10:00</option>
              <option>11:30</option>
              <option>14:00</option>
              <option>16:30</option>
              <option>18:00</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Profissional</label>
            <div class="d-flex gap-3">
              <label class="text-center">
                <input type="radio" name="barbeiro" class="btn-check" id="barbeiro1" required>
                <label class="btn btn-outline-light" for="barbeiro1">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTKY3BRb9HtAZwQ9QgX4ITbfuHqnlgHUCxXQ&s" alt="João" class="rounded-circle mb-1" width="50"><br>João
                </label>
              </label>
              <label class="text-center">
                <input type="radio" name="barbeiro" class="btn-check" id="barbeiro2" required>
                <label class="btn btn-outline-light" for="barbeiro2">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwGZc0ofPXUKZVBs3PO6mr3FqJbtM1A6C25w&s" alt="Carlos" class="rounded-circle mb-1" width="50"><br>Carlos
                </label>

                <label class="text-center">
                <input type="radio" name="barbeiro" class="btn-check" id="barbeiro2" required>
                <label class="btn btn-outline-light" for="barbeiro2">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSr57CUIWtVU5WnMfmAwjbMvT4Q0Zvvzmum1A&s" alt="Carlos" class="rounded-circle mb-1" width="50"><br>Manoel 
                </label>

              </label>
            </div>
          </div>

          <div class="col-12 text-end mt-4">
            <button type="submit" class="btn btn-dourado btn-lg">Confirmar Marcação</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="bg-dark text-light py-5 mt-5 border-top border-secondary">
  <div class="container text-center">
    <h5 class="mb-3" style="font-family: 'Jolly Lodger', cursive; font-size: 2rem;">Barbearia Artesanal</h5>

    <div class="mb-4">
      <a href="#modalAgendar" class="btn btn-outline-warning btn-lg px-4 py-2 fw-bold shadow pulse" data-bs-toggle="modal">
        💈 Agendar Agora
      </a>
    </div>

    <div class="d-flex justify-content-center gap-4 mb-4 fs-4">
      <a href="https://www.instagram.com/barbeariaartesanal" target="_blank" class="text-warning" title="Instagram">
        <i class="bi bi-instagram"></i>
      </a>
      <a href="https://www.facebook.com/barbeariaartesanal" target="_blank" class="text-warning" title="Facebook">
        <i class="bi bi-facebook"></i>
      </a>
      <a href="https://wa.me/351912345678" target="_blank" class="text-warning" title="WhatsApp">
        <i class="bi bi-whatsapp"></i>
      </a>
    </div>

    <p class="mb-2 small">&copy; <?= date('Y') ?> Barbearia Artesanal • Todos os direitos reservados.</p>

 <p class="signature small mt-3" style="
  font-family: 'Spectral SC', serif;
  font-size: 0.95rem;
  color: #f4f4f4;
  letter-spacing: 0.5px;
  text-shadow: 1px 1px 2px #000;">
  Desenvolvido com 💻 por <strong style="color: #ffc107;">Alex Oliveira</strong> •
</p>

  </div>
</footer>


<!-- Modal Agendamento -->
<div class="modal fade" id="modalAgendar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-light">
      <form id="formAgendar">
        <div class="modal-header">
          <h5 class="modal-title">Agendar Corte</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="datetime-local" class="form-control mb-3" required>
          <select class="form-select mb-3">
            <option>Barbeiro João</option>
            <option>Barbeiro Miguel</option>
            <option>Barbeiro Duarte</option>
          </select>
          <input type="email" class="form-control mb-3" placeholder="Seu Email" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dourado">Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const carrinho = [];
  function addCarrinho(prod, preco) {
    carrinho.push({ prod, preco });
    document.getElementById('carrinho').innerHTML =
      '<hr><h5>Carrinho:</h5>' + carrinho.map((x, i) =>
        `<div>${i + 1}. ${x.prod} – ${x.preco}</div>`).join('');
  }

  document.getElementById('formAgendar').addEventListener('submit', e => {
    e.preventDefault();
    alert("Agendamento realizado com sucesso! 🍻");
    bootstrap.Modal.getInstance(document.getElementById('modalAgendar')).hide();
  });

  document.getElementById('formContato').addEventListener('submit', e => {
    e.preventDefault();
    alert("Mensagem enviada. Entraremos em contacto!");
  });
</script>

<script>
document.querySelectorAll('.carousel-item img').forEach(img => {
  img.addEventListener('click', () => {
    document.getElementById('modalImageSrc').src = img.src;
    new bootstrap.Modal(document.getElementById('modalImage')).show();
  });
});
</script>


</body>
</html>
