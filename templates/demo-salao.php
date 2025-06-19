<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Salão de Beleza Premium | Seu Estilo, Nossa Paixão</title>
  <meta name="description" content="Template profissional para salão de beleza, com agendamento online, serviços e contato fácil. Responsivo e moderno." />

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Google Fonts - Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


  <style>
    /* Reset e base */
    body {
      font-family: 'Poppins', sans-serif;
      background: #fffaf6;
      color: #444;
      margin: 0;
      padding-top: 80px;
    }

    /* Header */
    header {
      position: fixed;
      top: 0;
      width: 100%;
      background: #fff;
      box-shadow: 0 2px 5px rgb(0 0 0 / 0.1);
      z-index: 1030;
    }

    .navbar-brand {
      font-weight: 700;
      color: #d6336c !important;
      font-size: 1.6rem;
      letter-spacing: 1px;
    }

    .nav-link {
      font-weight: 500;
      color: #555 !important;
      transition: color 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
      color: #d6336c !important;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
      color: #fff;
      padding: 100px 15px 80px;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 20px;
      text-shadow: 0 2px 6px rgb(0 0 0 / 0.3);
    }

    .hero p {
      font-size: 1.3rem;
      max-width: 600px;
      margin: 0 auto 30px;
      text-shadow: 0 1px 4px rgb(0 0 0 / 0.2);
    }

    .btn-primary {
      background-color: #d6336c;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      font-size: 1.1rem;
      box-shadow: 0 6px 15px rgb(214 51 108 / 0.5);
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #b52a59;
      box-shadow: 0 8px 20px rgb(181 42 89 / 0.7);
    }

    /* Serviços */
    .services {
      padding: 60px 15px;
      background: #fff;
      text-align: center;
    }

    .services h2 {
      font-weight: 700;
      margin-bottom: 40px;
      color: #d6336c;
    }

    .service-item {
      background: #fff0f6;
      border-radius: 12px;
      padding: 25px;
      margin: 15px;
      box-shadow: 0 3px 10px rgb(214 51 108 / 0.15);
      transition: transform 0.3s ease;
      cursor: default;
      min-height: 200px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .service-item:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 20px rgb(214 51 108 / 0.3);
    }

    .service-icon {
      font-size: 50px;
      color: #d6336c;
      margin-bottom: 15px;
    }

    .service-title {
      font-weight: 600;
      font-size: 1.25rem;
      margin-bottom: 10px;
      color: #333;
    }

    /* Formulário de agendamento */
    .booking {
      background: #fef6f9;
      padding: 60px 15px;
      border-radius: 16px;
      max-width: 700px;
      margin: 0 auto 60px;
      box-shadow: 0 8px 25px rgb(214 51 108 / 0.1);
    }

    .booking h2 {
      color: #d6336c;
      font-weight: 700;
      margin-bottom: 30px;
      text-align: center;
    }

    .form-label {
      font-weight: 500;
      color: #444;
    }

    .form-control,
    .form-select {
      border-radius: 8px;
      border: 1.5px solid #ddd;
      padding: 10px 15px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #d6336c;
      box-shadow: 0 0 8px rgb(214 51 108 / 0.4);
      outline: none;
    }

    .btn-submit {
      background-color: #d6336c;
      border: none;
      padding: 14px 40px;
      font-weight: 700;
      font-size: 1.1rem;
      width: 100%;
      border-radius: 8px;
      color: white;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .btn-submit:hover {
      background-color: #b52a59;
    }

    /* Contato */
    .contact {
      background: #fff;
      padding: 50px 15px 80px;
      text-align: center;
    }

    .contact h2 {
      font-weight: 700;
      margin-bottom: 20px;
      color: #d6336c;
    }

    .contact p {
      font-size: 1.1rem;
      margin-bottom: 10px;
    }

    /* Responsividade */
    @media (max-width: 767.98px) {
      .hero h1 {
        font-size: 2.2rem;
      }

      .service-item {
        min-height: 180px;
        margin: 10px 0;
      }

      .booking {
        padding: 40px 15px;
      }
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header>
    <nav class="navbar navbar-expand-lg container">
      <a class="navbar-brand" href="#">SalãoPremium</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"
        aria-controls="navMenu" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="#servicos" class="nav-link">Serviços</a></li>
          <li class="nav-item"><a href="#agendamento" class="nav-link">Agendamento</a></li>
          <li class="nav-item"><a href="#contato" class="nav-link">Contato</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container">
      <h1>Seu Estilo, Nossa Paixão</h1>
      <p>Transforme seu visual com os melhores profissionais. Agende seu horário de forma rápida e prática.</p>
      <a href="#agendamento" class="btn btn-primary" aria-label="Ir para formulário de agendamento">Agendar Agora</a>
    </div>
  </section>

  <!-- SERVIÇOS -->
  <section class="services" id="servicos">
    <div class="container">
      <h2>Nossos Serviços</h2>
      <div class="row justify-content-center">
        <div class="col-md-4 col-sm-6">
          <div class="service-item" role="region" aria-label="Corte de cabelo">
            <div class="service-icon">✂️</div>
            <h3 class="service-title">Corte de Cabelo</h3>
            <p>Estilos modernos para todos os gostos e ocasiões.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-item" role="region" aria-label="Coloração e Mechas">
            <div class="service-icon">🎨</div>
            <h3 class="service-title">Coloração e Mechas</h3>
            <p>Coloração profissional para realçar sua beleza.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="service-item" role="region" aria-label="Manicure e Pedicure">
            <div class="service-icon">💅</div>
            <h3 class="service-title">Manicure e Pedicure</h3>
            <p>Cuidados completos para suas unhas e mãos.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FORMULÁRIO DE AGENDAMENTO -->
  <section class="booking" id="agendamento" aria-label="Formulário de agendamento de serviços">
    <h2>Agende seu horário</h2>
    <form id="bookingForm" novalidate>
      <div class="mb-3">
        <label for="name" class="form-label">Nome Completo</label>
        <input type="text" class="form-control" id="name" name="name" required aria-required="true"
          placeholder="Seu nome completo" />
        <div class="invalid-feedback">Por favor, insira seu nome.</div>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Telefone</label>
        <input type="tel" class="form-control" id="phone" name="phone" required aria-required="true"
          placeholder="(XX) XXXXX-XXXX" pattern="^\(?\d{2}\)?\s?\d{4,5}-?\d{4}$" />
        <div class="invalid-feedback">Insira um telefone válido (ex: (11) 91234-5678).</div>
      </div>
      <div class="mb-3">
        <label for="service" class="form-label">Serviço</label>
        <select id="service" name="service" class="form-select" required aria-required="true">
          <option value="" selected disabled>Selecione um serviço</option>
          <option value="corte">Corte de Cabelo</option>
          <option value="coloracao">Coloração e Mechas</option>
          <option value="manicure">Manicure e Pedicure</option>
        </select>
        <div class="invalid-feedback">Escolha um serviço para continuar.</div>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Data do Agendamento</label>
        <input type="date" class="form-control" id="date" name="date" required aria-required="true" min="" />
        <div class="invalid-feedback">Selecione uma data válida.</div>
      </div>
      <div class="mb-3">
        <label for="time" class="form-label">Horário</label>
        <select id="time" name="time" class="form-select" required aria-required="true">
          <option value="" selected disabled>Selecione um horário</option>
          <option>09:00</option>
          <option>10:00</option>
          <option>11:00</option>
          <option>13:00</option>
          <option>14:00</option>
          <option>15:00</option>
          <option>16:00</option>
          <option>17:00</option>
        </select>
        <div class="invalid-feedback">Escolha um horário para o seu agendamento.</div>
      </div>
      <button type="submit" class="btn-submit" aria-label="Enviar formulário de agendamento">Confirmar Agendamento</button>
    </form>
  </section>

  <!-- CONTATO -->
  <section class="contact" id="contato" aria-label="Informações para contato">
    <div class="container">
      <h2>Contato</h2>
      <p>Telefone: <a href="tel:+5511999999999" class="text-decoration-none">+55 (11) 99999-9999</a></p>
      <p>Email: <a href="mailto:contato@salaopremium.com.br" class="text-decoration-none">contato@salaopremium.com.br</a></p>
      <p>Endereço: Rua das Flores, 123 - São Paulo, SP</p>
      <iframe title="Mapa do Salão de Beleza" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.4518415645654!2d-46.65583538452047!3d-23.56498768468405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c3e0a21f8d%3A0x796b7939b48f62d4!2sRua%20das%20Flores%2C%20123%20-%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1687080400000!5m2!1spt-BR!2sbr"
        width="100%" height="250" style="border:0; border-radius: 12px;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Set mínimo para data agendamento para hoje
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;

    // Validação simples formulário bootstrap 5
    (function () {
      'use strict';
      const form = document.getElementById('bookingForm');
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          event.preventDefault();
          alert('Obrigado pelo seu agendamento! Entraremos em contato em breve.');
          form.reset();
        }
        form.classList.add('was-validated');
      }, false);
    })();
  </script>~

  <!-- FOOTER PADRÃO PROFISSIONAL -->
<footer style="background-color: #f8f9fa; border-top: 1px solid #e0e0e0; font-family: 'Poppins', sans-serif;">
  <div class="container py-4">
    <div class="row align-items-start gy-4">

      <!-- Logo e descrição -->
      <div class="col-md-4">
        <h5 class="fw-bold text-uppercase" style="color: #d6336c;">SalãoPremium</h5>
        <p class="text-muted small">
          Especialistas em beleza e bem-estar. Atendimento profissional, personalizado e com agendamento rápido.
        </p>
        <p class="text-muted small mb-0">&copy; <?php echo date('Y'); ?> SalãoPremium. Todos os direitos reservados.</p>
        <p class="text-muted small">Desenvolvido por <strong>Alex Olivira</strong>.</p>
      </div>

      <!-- Informações de contato -->
      <div class="col-md-4">
        <h6 class="fw-bold mb-3">Contacto</h6>
        <ul class="list-unstyled text-muted small">
          <li class="mb-2"><i class="bi bi-telephone me-2 text-danger"></i><a href="tel:+351912345678" class="text-decoration-none text-dark">+351 912 345 678</a></li>
          <li class="mb-2"><i class="bi bi-envelope me-2 text-danger"></i><a href="mailto:geral@salaopremium.pt" class="text-decoration-none text-dark">geral@salaopremium.pt</a></li>
          <li><i class="bi bi-geo-alt me-2 text-danger"></i>Rua das Flores, 123 - Lisboa, Portugal</li>
        </ul>
      </div>

      <!-- Links rápidos e redes sociais -->
      <div class="col-md-4 text-md-end">
        <h6 class="fw-bold mb-3">Links úteis</h6>
        <ul class="list-inline mb-3">
          <li class="list-inline-item"><a href="#servicos" class="text-decoration-none text-dark small">Serviços</a></li>
          <li class="list-inline-item"><a href="#agendamento" class="text-decoration-none text-dark small">Agendamento</a></li>
          <li class="list-inline-item"><a href="#contato" class="text-decoration-none text-dark small">Contacto</a></li>
        </ul>
        <div class="d-flex justify-content-md-end justify-content-center gap-3">
          <a href="#" class="text-muted fs-5" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="text-muted fs-5" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-muted fs-5" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

    </div>
  </div>
</footer>


</body>

</html>
