<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Restaurante Étoile — Experiência Gastronômica 5 Estrelas</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Playfair+Display&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Icons (Bootstrap Icons CDN) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    /* Reset */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Lato', sans-serif;
      background: #fcfaf8;
      color: #2c2c2c;
      scroll-behavior: smooth;
    }

    /* Navbar */
    header {
      position: sticky;
      top: 0;
      z-index: 1030;
      background: #111111ee;
      backdrop-filter: saturate(180%) blur(10px);
      transition: box-shadow 0.3s ease;
    }
    header.scrolled {
      box-shadow: 0 4px 15px rgb(0 0 0 / 0.35);
    }
    .navbar-brand {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 1.8rem;
      color: #ffbf00;
      letter-spacing: 0.12em;
      user-select: none;
    }
    .navbar-dark .navbar-nav .nav-link {
      font-weight: 600;
      font-size: 1.1rem;
      color: #ddd;
      transition: color 0.25s ease;
      letter-spacing: 0.04em;
    }
    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link.active {
      color: #ffbf00;
    }

    /* Hero */
    .hero {
      height: 80vh;
      background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
      padding: 0 1rem;
      position: relative;
      overflow: hidden;
    }
    .hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(0,0,0,0.55) 0%, rgba(0,0,0,0.85) 100%);
      z-index: 0;
    }
    .hero h1, .hero p {
      position: relative;
      z-index: 1;
      opacity: 0;
      transform: translateY(30px);
      animation-fill-mode: forwards;
    }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 6vw, 4.5rem);
      font-weight: 900;
      letter-spacing: 0.15em;
      margin-bottom: 0.5rem;
      animation: fadeSlideIn 1s ease forwards 0.3s;
      text-shadow: 0 2px 6px rgba(0,0,0,0.9);
    }
    .hero p {
      font-size: clamp(1.3rem, 3vw, 1.8rem);
      font-style: italic;
      font-weight: 600;
      color: #ffbf00;
      letter-spacing: 0.07em;
      animation: fadeSlideIn 1s ease forwards 1.1s;
      text-shadow: 0 1px 5px rgba(0,0,0,0.8);
      user-select: none;
    }

    @keyframes fadeSlideIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Main content spacing */
    main.container {
      margin-top: 3rem;
      margin-bottom: 5rem;
      max-width: 1140px;
    }

    /* Section Titles */
    section h2 {
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 2.2rem;
      color: #222;
      border-bottom: 3px solid #ffbf00;
      padding-bottom: 0.5rem;
      letter-spacing: 0.12em;
      text-transform: uppercase;
    }

    /* Cardápio cards */
    .card-menu {
      border-radius: 1.25rem;
      box-shadow: 0 10px 30px rgb(0 0 0 / 0.12);
      overflow: hidden;
      cursor: pointer;
      position: relative;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: #fff;
    }
    .card-menu:hover {
      transform: scale(1.06);
      box-shadow: 0 18px 48px rgb(0 0 0 / 0.25);
      z-index: 5;
    }
    .card-menu img {
      width: 100%;
      height: 200px;
      object-fit: cover;
      display: block;
      transition: transform 0.4s ease;
      border-bottom-left-radius: 0;
      border-bottom-right-radius: 0;
    }
    .card-menu:hover img {
      transform: scale(1.12);
      filter: brightness(1.05);
    }
    .card-body-menu {
      padding: 1.6rem 1.5rem 2rem;
      position: relative;
    }
    .card-title-menu {
      font-family: 'Playfair Display', serif;
      font-weight: 800;
      font-size: 1.5rem;
      margin-bottom: 0.25rem;
      color: #222;
    }
    .card-text-menu {
      font-style: italic;
      font-size: 0.92rem;
      color: #555;
      margin-bottom: 1.2rem;
      min-height: 48px;
    }
    .price-menu {
      font-weight: 700;
      font-size: 1.3rem;
      color: #ffbf00;
      letter-spacing: 0.05em;
      margin-bottom: 1.4rem;
    }
    .btn-detail {
      background: transparent;
      border: 2.5px solid #ffbf00;
      color: #ffbf00;
      font-weight: 700;
      padding: 0.45rem 1.3rem;
      border-radius: 2rem;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      user-select: none;
    }
    .btn-detail:hover,
    .btn-detail:focus {
      background: #ffbf00;
      color: #111;
      text-decoration: none;
    }

    /* Modal for detail */
    .modal-content {
      border-radius: 1rem;
      padding: 2rem;
    }
    .modal-header {
      border-bottom: none;
      padding-bottom: 0;
    }
    .modal-title {
      font-family: 'Playfair Display', serif;
      font-weight: 900;
      font-size: 2rem;
      color: #222;
    }
    .modal-body p {
      font-size: 1.05rem;
      color: #444;
      line-height: 1.55;
      margin-bottom: 1rem;
    }
    .modal-body ul {
      padding-left: 1.25rem;
      margin-bottom: 0;
    }
    .modal-body ul li {
      font-size: 1rem;
      color: #666;
      margin-bottom: 0.4rem;
    }

    /* Reserva form */
    form#formReserva {
      background: #fff;
      padding: 2.5rem 2rem;
      border-radius: 1.5rem;
      box-shadow: 0 10px 28px rgb(0 0 0 / 0.15);
      max-width: 600px;
      margin: 0 auto;
    }
    form#formReserva label {
      font-weight: 600;
      font-size: 1rem;
      color: #222;
    }
    form#formReserva .form-control,
    form#formReserva .form-select {
      border-radius: 0.7rem;
      border: 1.8px solid #ccc;
      padding: 0.55rem 0.9rem;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    form#formReserva .form-control:focus,
    form#formReserva .form-select:focus {
      border-color: #ffbf00;
      box-shadow: 0 0 12px rgb(255 191 0 / 0.45);
      outline: none;
    }
    form#formReserva button[type="submit"] {
      background: #ffbf00;
      border: none;
      color: #111;
      font-weight: 700;
      font-size: 1.2rem;
      padding: 0.65rem 2rem;
      border-radius: 3rem;
      width: 100%;
      cursor: pointer;
      transition: background 0.3s ease;
      user-select: none;
    }
    form#formReserva button[type="submit"]:hover,
    form#formReserva button[type="submit"]:focus {
      background: #dda800;
      outline: none;
    }

    /* Gallery */
    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fit,minmax(240px,1fr));
      gap: 1.7rem;
    }
    .gallery-item {
      position: relative;
      overflow: hidden;
      border-radius: 1rem;
      box-shadow: 0 8px 25px rgb(0 0 0 / 0.15);
      cursor: pointer;
      transition: transform 0.3s ease;
    }
    .gallery-item:hover {
      transform: scale(1.08);
      z-index: 3;
      box-shadow: 0 14px 42px rgb(0 0 0 / 0.25);
    }
    .gallery-item img {
      width: 100%;
      display: block;
      border-radius: 1rem;
      filter: brightness(0.9);
      transition: filter 0.3s ease;
    }
    .gallery-item:hover img {
      filter: brightness(1);
    }

    /* Footer */
    footer {
      background: #111;
      color: #eee;
      padding: 3rem 1rem;
      text-align: center;
      font-size: 0.95rem;
      font-weight: 300;
      letter-spacing: 0.06em;
      user-select: none;
    }
    footer .social-icons {
      margin-bottom: 1.4rem;
    }
    footer .social-icons a {
      color: #eee;
      font-size: 1.5rem;
      margin: 0 0.75rem;
      transition: color 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }
    footer .social-icons a:hover,
    footer .social-icons a:focus {
      color: #ffbf00;
      outline: none;
    }

    /* Responsive tweaks */
    @media (max-width: 576px) {
      .hero h1 {
        font-size: 2.4rem;
      }
      .hero p {
        font-size: 1.15rem;
      }
    }
  </style>
</head>
<body>

<header>
  <nav class="navbar navbar-expand-lg navbar-dark container">
    <a class="navbar-brand" href="#">Étoile</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" 
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="#cardapio">Cardápio</a></li>
        <li class="nav-item"><a class="nav-link" href="#reserva">Reserva</a></li>
        <li class="nav-item"><a class="nav-link" href="#galeria">Galeria</a></li>
        <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
      </ul>
    </div>
  </nav>
</header>

<section class="hero">
  <h1>Restaurante Étoile</h1>
  <p>Experiência Gastronômica 5 Estrelas</p>
</section>

<main class="container">

  <!-- Cardápio -->
  <section id="cardapio" class="mb-5">
    <h2>Nosso Cardápio</h2>
    <div class="row g-4">
      <?php
      // Array exemplo com pratos, na prática buscar do banco
      $pratos = [
        [
          'nome' => 'Magret de Pato ao Molho de Laranja',
          'descricao' => 'Peito de pato grelhado com molho cítrico e guarnições finas.',
          'ingredientes' => ['Peito de pato', 'Molho de laranja', 'Batatas douradas', 'Ervas finas'],
          'preco' => '129,00',
          'imagem' => 'https://images.unsplash.com/photo-1600891964599-f61ba0e24092?auto=format&fit=crop&w=600&q=80',
        ],
        [
          'nome' => 'Ravioli de Lagosta com Manteiga de Ervas',
          'descricao' => 'Massa fresca recheada com lagosta, servida com manteiga aromatizada.',
          'ingredientes' => ['Lagosta', 'Massa fresca', 'Manteiga', 'Ervas finas'],
          'preco' => '142,00',
          'imagem' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80',
        ],
        [
          'nome' => 'Tartare de Salmão com Abacate',
          'descricao' => 'Salmão fresco picado com cubos de abacate e toque cítrico.',
          'ingredientes' => ['Salmão fresco', 'Abacate', 'Limão siciliano', 'Ervas'],
          'preco' => '89,00',
          'imagem' => 'https://images.unsplash.com/photo-1555992336-03a23c13a9de?auto=format&fit=crop&w=600&q=80',
        ],
        // Adicione mais pratos conforme necessidade
      ];
      foreach ($pratos as $idx => $prato): ?>
      <div class="col-md-6 col-lg-4">
        <div class="card-menu shadow-sm" data-bs-toggle="modal" data-bs-target="#modalPrato<?=$idx?>" tabindex="0" role="button" aria-label="Detalhes do prato <?=$prato['nome']?>">
          <img src="<?=htmlspecialchars($prato['imagem'])?>" alt="Foto do prato <?=$prato['nome']?>" />
          <div class="card-body-menu">
            <h5 class="card-title-menu"><?=htmlspecialchars($prato['nome'])?></h5>
            <p class="card-text-menu"><?=htmlspecialchars($prato['descricao'])?></p>
            <div class="price-menu">R$ <?=htmlspecialchars($prato['preco'])?></div>
            <button type="button" class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalPrato<?=$idx?>" 
                    onclick="event.stopPropagation()">Ver Detalhes</button>
          </div>
        </div>
      </div>

      <!-- Modal Detalhes prato -->
      <div class="modal fade" id="modalPrato<?=$idx?>" tabindex="-1" aria-labelledby="modalPratoLabel<?=$idx?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalPratoLabel<?=$idx?>"><?=htmlspecialchars($prato['nome'])?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
              <p><?=htmlspecialchars($prato['descricao'])?></p>
              <h6>Ingredientes:</h6>
              <ul>
                <?php foreach ($prato['ingredientes'] as $ingrediente): ?>
                  <li><?=htmlspecialchars($ingrediente)?></li>
                <?php endforeach; ?>
              </ul>
              <p class="price-menu fs-4 fw-bold">Preço: R$ <?=htmlspecialchars($prato['preco'])?></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Reserva -->
  <section id="reserva" class="mb-5">
    <h2>Faça Sua Reserva</h2>
    <form id="formReserva" novalidate>
      <div class="mb-3">
        <label for="nome" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="nome" name="nome" required minlength="3" maxlength="70" placeholder="Seu nome completo" />
        <div class="invalid-feedback">Por favor, informe seu nome (mínimo 3 caracteres).</div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="seu@email.com" />
        <div class="invalid-feedback">Informe um e-mail válido.</div>
      </div>
      <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" id="telefone" name="telefone" required placeholder="(XX) XXXXX-XXXX" maxlength="15" />
        <div class="invalid-feedback">Informe um telefone válido.</div>
      </div>
      <div class="mb-3">
        <label for="data" class="form-label">Data da Reserva</label>
        <input type="date" class="form-control" id="data" name="data" required min="<?=date('Y-m-d')?>" />
        <div class="invalid-feedback">Selecione uma data válida (hoje ou futura).</div>
      </div>
      <div class="mb-3">
        <label for="horario" class="form-label">Horário</label>
        <select class="form-select" id="horario" name="horario" required>
          <option value="" selected disabled>Escolha o horário</option>
          <option>18:00</option>
          <option>19:00</option>
          <option>20:00</option>
          <option>21:00</option>
          <option>22:00</option>
        </select>
        <div class="invalid-feedback">Selecione um horário.</div>
      </div>
      <div class="mb-3">
        <label for="pessoas" class="form-label">Número de Pessoas</label>
        <input type="number" class="form-control" id="pessoas" name="pessoas" required min="1" max="20" placeholder="Ex: 2" />
        <div class="invalid-feedback">Informe o número de pessoas (1 a 20).</div>
      </div>
      <button type="submit">Reservar Agora</button>
    </form>
  </section>

  <!-- Galeria -->
  <section id="galeria" class="mb-5">
    <h2>Galeria</h2>
    <div class="gallery">
      <?php
      $imagens = [
        'https://images.unsplash.com/photo-1496417263034-38ec4f0b665a?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1555992336-03a23c13a9de?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1556910103-1e564a41f72f?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1543349686-c63f24435d4b?auto=format&fit=crop&w=600&q=80',
        'https://images.unsplash.com/photo-1551218808-94e220e084d2?auto=format&fit=crop&w=600&q=80',
      ];
      foreach ($imagens as $idx => $img): ?>
      <div class="gallery-item" tabindex="0" role="button" aria-label="Ver imagem <?=($idx+1)?>" data-bs-toggle="modal" data-bs-target="#modalGallery" data-img="<?=htmlspecialchars($img)?>">
        <img src="<?=htmlspecialchars($img)?>" alt="Imagem do restaurante <?=($idx+1)?>" loading="lazy" />
      </div>
      <?php endforeach; ?>
    </div>
  </section>

</main>

<!-- Footer -->
<footer id="contato">
  <div class="social-icons mb-3">
    <a href="#" aria-label="Facebook" target="_blank" rel="noopener"><i class="bi bi-facebook"></i></a>
    <a href="#" aria-label="Instagram" target="_blank" rel="noopener"><i class="bi bi-instagram"></i></a>
    <a href="#" aria-label="Twitter" target="_blank" rel="noopener"><i class="bi bi-twitter"></i></a>
  </div>
  <p>© 2025 Restaurante Étoile - Todos os direitos reservados.</p>
  <p class="text-muted small">Desenvolvido por <strong>Alex Oliveira</strong>.</p>
</footer>


<!-- Modal Galeria -->
<div class="modal fade" id="modalGallery" tabindex="-1" aria-labelledby="modalGalleryLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img src="" alt="Imagem ampliada" id="modalGalleryImage" class="img-fluid w-100 rounded" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Fechar">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Formulário reserva com validação customizada
  (() => {
    'use strict';
    const form = document.getElementById('formReserva');

    form.addEventListener('submit', e => {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add('was-validated');
        return;
      }
      // Envio AJAX simulado
      alert('Reserva enviada com sucesso! Obrigado, ' + form.nome.value + '.');
      form.reset();
      form.classList.remove('was-validated');
    });

    // Galeria - troca imagem no modal
    const modalGallery = document.getElementById('modalGallery');
    const modalGalleryImage = document.getElementById('modalGalleryImage');

    modalGallery.addEventListener('show.bs.modal', e => {
      const trigger = e.relatedTarget;
      if (trigger) {
        const imgSrc = trigger.getAttribute('data-img');
        modalGalleryImage.src = imgSrc;
      }
    });
  })();
</script>

</body>
</html>
