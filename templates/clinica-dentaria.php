<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Clínica Dentária </title>
  <style>
    /* Reset básico */
    *, *::before, *::after {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f8ff;
      color: #344955;
      line-height: 1.6;
    }
    main.container {
      max-width: 1080px;
      margin: 3rem auto 4rem;
      padding: 0 1rem;
    }
    
    h1 {
      font-weight: 900;
      font-size: 3.2rem;
      color: #4db6ac;
      letter-spacing: 0.1em;
      margin-bottom: 0.5rem;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.1);
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    p.lead {
      font-size: 1.3rem;
      font-weight: 600;
      max-width: 720px;
      margin: 0 auto;
    }
    section.row {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      justify-content: center;
    }
    article.card {
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 15px 25px rgba(77, 182, 172, 0.3);
      overflow: hidden;
      flex: 1 1 320px;
      max-width: 320px;
      display: flex;
      flex-direction: column;
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      color: #344955;
    }
    article.card:hover {
      transform: translateY(-12px);
      box-shadow: 0 30px 45px rgba(77, 182, 172, 0.5);
    }
    .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
      transition: transform 0.6s ease;
      border-bottom-left-radius: 20px;
      border-bottom-right-radius: 20px;
    }
    article.card:hover .card-img-top {
      transform: scale(1.08);
    }
    .card-body {
      padding: 2rem 1.6rem;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }
    .card-title {
      font-size: 1.6rem;
      font-weight: 800;
      color: #4db6ac;
      margin-bottom: 0.75rem;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-text {
      font-size: 1.05rem;
      color: #344955;
      flex-grow: 1;
      margin-bottom: 1.5rem;
    }
    a.btn {
      align-self: flex-start;
      text-decoration: none;
      font-weight: 700;
      border-radius: 30px;
      padding: 0.7rem 2.2rem;
      font-size: 1.1rem;
      transition: background-color 0.35s ease, box-shadow 0.35s ease;
      user-select: none;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(77, 182, 172, 0.75);
      background-color: #4db6ac;
      color: #fff;
      border: none;
    }
    a.btn:hover,
    a.btn:focus {
      background-color: #3a9d96;
      box-shadow: 0 12px 32px rgba(57, 156, 148, 0.85);
      outline: none;
    }

    /* Seção infantil */
    section.infantil {
      margin-top: 4rem;
      background: #ffe4e1;
      border-radius: 24px;
      padding: 2rem 1.5rem;
      box-shadow: 0 15px 30px rgba(244, 143, 177, 0.3);
      color: #7b4053;
      text-align: center;
    }
    section.infantil h2 {
      font-size: 2.6rem;
      font-weight: 900;
      margin-bottom: 1rem;
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    section.infantil p {
      font-size: 1.3rem;
      max-width: 600px;
      margin: 0 auto 2rem;
      font-weight: 600;
    }
    section.infantil .row {
      justify-content: center;
    }
    section.infantil article.card {
      max-width: 280px;
      box-shadow: 0 10px 25px rgba(244, 143, 177, 0.4);
      background: #fff0f6;
    }
    .card-img-top.infantil {
      height: 180px;
      border-radius: 18px;
      filter: drop-shadow(2px 4px 6px rgba(244, 143, 177, 0.4));
    }

    /* CTA */
    section.cta {
      margin-top: 4rem;
      padding: 3rem 2rem;
      background: #d0f0fd;
      border-radius: 24px;
      text-align: center;
      box-shadow: 0 12px 28px rgba(38, 150, 228, 0.15);
      color: #34568b;
    }
    section.cta h3 {
      font-size: 2.4rem;
      font-weight: 800;
      margin-bottom: 1rem;
    }
    section.cta p {
      font-size: 1.125rem;
      max-width: 640px;
      margin: 0 auto 2rem;
      line-height: 1.6;
    }
    section.cta .btn-group {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      flex-wrap: wrap;
    }
    section.cta a.btn-outline {
      border: 2px solid #34568b;
      color: #34568b;
      background: transparent;
      box-shadow: none;
      padding: 0.75rem 2.5rem;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1.1rem;
      text-decoration: none;
      cursor: pointer;
      transition: background-color 0.35s ease, color 0.35s ease;
    }
    section.cta a.btn-outline:hover,
    section.cta a.btn-outline:focus {
      background-color: #34568b;
      color: #fff;
      outline: none;
    }

    /* Responsivo */
    @media (max-width: 992px) {
      main.container {
        margin: 2.5rem auto 3rem;
        padding: 0 1rem;
      }
      .card-img-top {
        height: 180px;
      }
      .card-img-top.infantil {
        height: 160px;
      }
    }
    @media (max-width: 576px) {
      h1 {
        font-size: 2.4rem;
      }
      section.row {
        gap: 1.5rem;
      }
      article.card {
        max-width: 100%;
      }
      .card-img-top {
        height: 150px;
      }
      .card-img-top.infantil {
        height: 140px;
      }
      section.cta {
        padding: 2rem 1rem;
      }
      section.cta h3 {
        font-size: 1.8rem;
      }
    }
  </style>

</head>


<body>
 <main role="main" aria-label="Clínica Dentária">

  <style>
  /* Reset básico */
  * {
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
  }

  header.text-center {
    width: 100vw;
    min-height: 280px;
    background: 
      linear-gradient(rgba(13, 59, 102, 0.75), rgba(13, 59, 102, 0.75)),
      url('https://static.vecteezy.com/ti/vetor-gratis/t1/7023598-itens-de-cuidados-bucais-horizontal-banner-dentista-para-higiene-bucal-diaria-enxaguante-e-escova-de-dentes-com-colar-maca-goma-de-mascar-branco-dentes-saudaveis-isolado-icones-planos-em-um-fundo-azul-vetor.jpg') no-repeat center center/cover;
    color: white;
    text-align: center;
    padding: 2.5rem 1rem 3rem;
    position: relative;
    overflow: hidden;
    box-shadow: inset 0 0 60px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    z-index: 1;
  }

  /* Fundo animado emojis - mais visíveis e com glow */
  header.text-center::before {
    content: "🦷 🪥 🦷 🧵 🦷 🪥 🦷🪥 🦷 🧵 🦷 🪥 🦷 🧵🪥 🦷 🧵 🦷 🪥 🦷 🧵🦷 🪥 🦷 🧵 🦷 🪥 🦷🪥 🦷 🧵 🦷 🪥 🦷 🧵🪥 🦷 🧵 🦷 🪥 🦷 🧵";
    position: absolute;
    top: 15px;
    left: -60%;
    font-size: 3rem;
    opacity: 0.45;
    white-space: nowrap;
    animation: floatRight 40s linear infinite;
    user-select: none;
    pointer-events: none;
    z-index: 0;
    text-shadow: 0 0 8px rgba(255, 255, 255, 0.7);
  }

  header.text-center::after {
    content: "🪥 🦷 🧵 🦷 🪥 🦷 🧵🪥 🦷 🧵 🦷 🪥 🦷 🧵🪥 🦷 🧵 🦷 🪥 🦷 🧵🦷 🪥 🦷 🧵 🦷 🪥 🦷🪥 🦷 🧵 🦷 🪥 🦷 🧵🪥 🦷 🧵 🦷 🪥 🦷 🧵";
    position: absolute;
    bottom: 15px;
    right: -60%;
    font-size: 3rem;
    opacity: 0.45;
    white-space: nowrap;
    animation: floatLeft 40s linear infinite;
    user-select: none;
    pointer-events: none;
    z-index: 0;
    text-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
  }

  @keyframes floatRight {
    0% { transform: translateX(0); }
    100% { transform: translateX(220%); }
  }
  @keyframes floatLeft {
    0% { transform: translateX(0); }
    100% { transform: translateX(-220%); }
  }

  header.text-center h1 {
    font-family: 'Montserrat', sans-serif;
    font-weight: 900;
    font-size: 3rem;
    margin: 0;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
    position: relative;
    display: inline-block;
    z-index: 2;
  }
  header.text-center h1::before {
    content: "🪥";
    font-size: 2rem;
    position: absolute;
    left: -2.5rem;
    top: 50%;
    transform: translateY(-50%) rotate(-20deg);
    filter: drop-shadow(0 0 2px rgba(0,0,0,0.8));
    z-index: 2;
  }
  header.text-center h1::after {
    content: "🧵";
    font-size: 2rem;
    position: absolute;
    right: -2.5rem;
    top: 50%;
    transform: translateY(-50%) rotate(30deg);
    filter: drop-shadow(0 0 2px rgba(0,0,0,0.8));
    z-index: 2;
  }

  header.text-center p {
    font-size: 1.15rem;
    max-width: 680px;
    margin: 0 auto;
    font-weight: 500;
    line-height: 1.7;
    text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
    position: relative;
    z-index: 2;
    padding: 0 1rem;
  }

  /* Botão abrir modal */
  header.text-center button.open-modal-btn {
    background-color: #e03e79;
    border: none;
    padding: 0.7rem 2.2rem;
    font-size: 1.2rem;
    font-weight: 700;
    color: white;
    border-radius: 40px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 6px 15px rgba(224, 62, 121, 0.6);
    position: relative;
    z-index: 2;
    margin-top: 1rem;
  }
  header.text-center button.open-modal-btn:hover {
    background-color: #bf3468;
    transform: scale(1.05);
  }

  /* Submenu horizontal */
  nav.submenu {
    margin-top: 2rem;
    display: flex;
    justify-content: center;
    gap: 2.5rem;
    font-weight: 600;
    font-size: 1.1rem;
    position: relative;
    z-index: 2;
  }
  nav.submenu a {
    color: white;
    text-decoration: none;
    padding-bottom: 4px;
    border-bottom: 3px solid transparent;
    transition: border-color 0.3s ease;
  }
  nav.submenu a:hover,
  nav.submenu a:focus {
    border-bottom: 3px solid #e03e79;
    outline: none;
  }

  /* Modal overlay */
  .modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 9999;
  }

  /* Modal content */
  .modal {
    background: white;
    border-radius: 12px;
    padding: 2.5rem 3rem;
    max-width: 480px;
    width: 95%;
    box-shadow: 0 18px 48px rgba(0,0,0,0.35);
    position: relative;
    color: #333;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  .modal h2 {
    margin-top: 0;
    margin-bottom: 1.25rem;
    color: #0D3B66;
    font-family: 'Montserrat', sans-serif;
    font-weight: 900;
    text-align: center;
    font-size: 2rem;
  }
  .modal p {
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 1.75rem;
    text-align: center;
    color: #444;
  }

  /* Close button */
  .modal .close-btn {
    position: absolute;
    top: 1rem;
    right: 1.25rem;
    font-size: 2rem;
    background: none;
    border: none;
    cursor: pointer;
    color: #777;
    font-weight: 700;
    transition: color 0.25s ease;
  }
  .modal .close-btn:hover {
    color: #0D3B66;
  }

  /* Form */
  .modal form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .modal label {
    font-weight: 700;
    color: #0D3B66;
    font-size: 1rem;
  }
  .modal input,
  .modal textarea {
    padding: 0.75rem 1.1rem;
    border-radius: 10px;
    border: 2px solid #a9c4e8;
    font-size: 1rem;
    font-family: inherit;
    resize: vertical;
    transition: border-color 0.3s ease;
  }
  .modal input:focus,
  .modal textarea:focus {
    border-color: #0D3B66;
    outline: none;
    box-shadow: 0 0 8px rgba(13,59,102,0.5);
  }
  .modal button.submit-btn {
    margin-top: 1.5rem;
    background-color: #0D3B66;
    color: white;
    padding: 0.9rem 0;
    font-weight: 900;
    border: none;
    border-radius: 40px;
    cursor: pointer;
    font-size: 1.2rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 10px 28px rgba(13, 59, 102, 0.7);
    user-select: none;
  }
  .modal button.submit-btn:hover,
  .modal button.submit-btn:focus {
    background-color: #0a2a47;
    box-shadow: 0 12px 36px rgba(10, 42, 71, 0.9);
    outline: none;
  }

  /* Responsividade */
  @media (max-width: 576px) {
    header.text-center {
      min-height: auto;
      padding: 2rem 1rem 3rem;
    }
    header.text-center h1 {
      font-size: 2.4rem;
    }
    header.text-center p {
      font-size: 1rem;
      max-width: 90vw;
    }
    nav.submenu {
      gap: 1.2rem;
      font-size: 0.9rem;
      flex-wrap: wrap;
    }
    header.text-center h1::before,
    header.text-center h1::after {
      font-size: 1.5rem;
      left: -1.5rem;
      right: -1.5rem;
    }
    .modal {
      padding: 1.5rem 1.75rem;
      max-width: 95%;
    }
    .modal h2 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }
    .modal p {
      font-size: 1rem;
      margin-bottom: 1.25rem;
    }
    .modal button.submit-btn {
      font-size: 1rem;
      padding: 0.75rem 0;
    }
  }
</style>

<header class="text-center" role="banner" aria-label="Cabeçalho Clínica Dentária">
  <h1>Clínica Dentária Lusitana</h1>
  <p>
    Cuidamos do seu sorriso com excelência, tecnologia avançada e um atendimento humanizado para todas as idades, especialmente para as crianças.
  </p>

  <button class="open-modal-btn" aria-haspopup="dialog" aria-controls="agendamento-modal" aria-expanded="false">
    Agende Sua Consulta
  </button>

  <nav class="submenu" role="navigation" aria-label="Submenu Clínica Dentária">
    <a href="#servicos" tabindex="0">Serviços</a>
    <a href="#equipe" tabindex="0">Equipe</a>
    <a href="#contato" tabindex="0">Contato</a>
    <a href="#infantil" tabindex="0">Seção Infantil</a>
  </nav>
</header>

<!-- SEÇÃO DE TECNOLOGIA DE PONTA -->
<section id="tecnologia" style="padding: 4rem 1.5rem; background: #f0f8ff; border-top: 4px solid #0D3B66;">
  <h2 style="text-align: center; font-size: 2.2rem; color: #0D3B66; margin-bottom: 2rem;">Tecnologia de Ponta</h2>
  <div style="max-width: 980px; margin: 0 auto; display: flex; flex-direction: column; gap: 2rem;">
    <p style="font-size: 1.15rem; line-height: 1.7; color: #333; text-align: center;">
      Nossa clínica utiliza equipamentos de última geração para garantir diagnósticos precisos e tratamentos eficazes.
    </p>
    <ul style="list-style: none; padding-left: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
      <li style="background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.1);">
        <strong>Scanner Intraoral 3D</strong><br>
        Mapeamento digital sem desconforto, substituindo moldes tradicionais.
      </li>
      <li style="background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.1);">
        <strong>Radiografia Digital Panorâmica</strong><br>
        Visualização completa da estrutura bucal com baixa exposição à radiação.
      </li>
      <li style="background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 6px 16px rgba(0,0,0,0.1);">
        <strong>Laser Cirúrgico</strong><br>
        Procedimentos mais rápidos, com menos dor e tempo de cicatrização reduzido.
      </li>
    </ul>
  </div>
</section>

<!-- SEÇÃO DE EQUIPE -->
<section id="equipe" style="padding: 4rem 1.5rem; background: #fff;">
  <h2 style="text-align: center; font-size: 2.2rem; color: #0D3B66; margin-bottom: 2rem;">Nossa Equipe</h2>
  <div style="max-width: 980px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 2rem;">
    <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
      <img src="https://img.freepik.com/vetores-gratis/dentista-segurando-instrumentos-em-fundo-branco_1308-94358.jpg?semt=ais_hybrid&w=740" alt="Dra. Ana Ferreira" style="border-radius: 50%; margin-bottom: 1rem; width: 90px; height: 90px; object-fit: cover;">
      <h3 style="margin: 0 0 0.5rem; font-size: 1.2rem; color: #0D3B66;">Dra. Ana Ferreira</h3>
      <p style="margin: 0; color: #555;">Ortodontista e especialista em estética facial</p>
    </div>
    <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
      <img src="https://us.123rf.com/450wm/gigidigidesign/gigidigidesign2504/gigidigidesign250464851/244709699-dentist-man-with-stomatology-tools-vector-illustration.jpg?ver=6" alt="Dr. Miguel Rocha" style="border-radius: 50%; margin-bottom: 1rem; width: 90px; height: 90px; object-fit: cover;">
      <h3 style="margin: 0 0 0.5rem; font-size: 1.2rem; color: #0D3B66;">Dr. Miguel Rocha</h3>
      <p style="margin: 0; color: #555;">Cirurgião-dentista e implantodontista</p>
    </div>
    <div style="background: #f9f9f9; padding: 1.5rem; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
      <img src="https://i.pinimg.com/originals/a5/52/13/a55213e50b14c0cff9199460a6dc788c.jpg" alt="Dra. Beatriz Lima" style="border-radius: 50%; margin-bottom: 1rem; width: 90px; height: 90px; object-fit: cover;">
      <h3 style="margin: 0 0 0.5rem; font-size: 1.2rem; color: #0D3B66;">Dra. Beatriz Lima</h3>
      <p style="margin: 0; color: #555;">Odontopediatra e especialista em cuidados infantis</p>
    </div>
  </div>
</section>

<!-- SEÇÃO FINAL DE CONTATO -->
<section id="contato" style="padding: 4rem 1.5rem; background: #f0f0f0; text-align: center; border-top: 4px solid #e03e79;">
  <h2 style="font-size: 2.2rem; color: #0D3B66; margin-bottom: 1rem;">Entre em Contato</h2>
  <p style="max-width: 680px; margin: 0 auto 2rem; font-size: 1.1rem; color: #444;">
    Ficou com dúvidas ou quer saber mais sobre nossos serviços? Envie uma mensagem ou agende uma visita, teremos prazer em recebê-lo!
  </p>
  <a href="#agendamento-modal" class="open-modal-btn" style="text-decoration:none;">
    <button style="background-color:#e03e79; border:none; padding:0.9rem 2.5rem; font-size:1.2rem; font-weight:700; color:white; border-radius:40px; cursor:pointer; box-shadow:0 6px 15px rgba(224,62,121,0.6); transition:background 0.3s;">
      Agendar Agora
    </button>
  </a>
</section>


<!-- Modal -->
<div class="modal-overlay" id="agendamento-modal" role="dialog" aria-modal="true" aria-labelledby="modal-title" tabindex="-1">
  <div class="modal" role="document" aria-describedby="modal-desc">
    <button class="close-btn" aria-label="Fechar modal">&times;</button>
    <h2 id="modal-title">Agendamento de Consulta</h2>
    <p id="modal-desc" style="margin-bottom:1.5rem; font-size:1.1rem; color:#555; text-align:center;">
      Preencha o formulário para agendar sua consulta com nossa equipe especializada. Estamos aqui para cuidar do seu sorriso com atenção personalizada.
    </p>
    <form novalidate>
      <label for="nome">Nome Completo</label>
      <input type="text" id="nome" name="nome" required autocomplete="name" placeholder="Seu nome completo" />

      <label for="telefone">Telefone</label>
      <input type="tel" id="telefone" name="telefone" required pattern="[\d\s\-\+\(\)]+" placeholder="(xx) xxxx-xxxx" inputmode="tel" />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required autocomplete="email" placeholder="seuemail@exemplo.com" />

      <label for="mensagem">Mensagem</label>
      <textarea id="mensagem" name="mensagem" rows="4" placeholder="Ex: Prefiro horário pela manhã"></textarea>

      <button type="submit" class="submit-btn" aria-label="Enviar formulário de agendamento">Enviar</button>
    </form>
  </div>
</div>


<script>
  const openBtn = document.querySelector('.open-modal-btn');
  const modalOverlay = document.getElementById('agendamento-modal');
  const closeBtn = modalOverlay.querySelector('.close-btn');

  openBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'flex';
    openBtn.setAttribute('aria-expanded', 'true');
    modalOverlay.querySelector('form').reset();
    // Focar primeiro campo do formulário para acessibilidade
    modalOverlay.querySelector('input, textarea').focus();
  });

  closeBtn.addEventListener('click', () => {
    modalOverlay.style.display = 'none';
    openBtn.setAttribute('aria-expanded', 'false');
    openBtn.focus();
  });

  // Fecha modal ao clicar fora do conteúdo
  modalOverlay.addEventListener('click', e => {
    if (e.target === modalOverlay) {
      closeBtn.click();
    }
  });

  // Fecha modal com ESC
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && modalOverlay.style.display === 'flex') {
      closeBtn.click();
    }
  });
</script>

<style>
  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
    padding: 4rem 1rem;
    background: #f8f8f8;
  }
  .card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    max-width: 320px;
    flex: 1 1 280px;
    display: flex;
    flex-direction: column;
  }
  .card img {
    width: 100%;
    height: auto;
    object-fit: cover;
  }
  .card-body {
    padding: 1.5rem;
    flex-grow: 1;
  }
  .card-title {
    margin: 0 0 0.75rem;
    font-size: 1.4rem;
    color: #0D3B66;
  }
  .card-text {
    margin-bottom: 1.5rem;
    font-size: 1rem;
    color: #444;
  }
  .btn {
    background: #e03e79;
    color: white;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .btn:hover {
    background: #c72e68;
  }

  .modal-overlay {
    display: none;
    position: fixed;
    z-index: 9999;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
  }
  .modal {
    background: #fff;
    border-radius: 10px;
    padding: 2rem;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 4px 16px rgba(0,0,0,0.2);
    position: relative;
  }
  .modal h3 {
    margin-top: 0;
    color: #0D3B66;
  }
  .modal p {
    font-size: 1rem;
    color: #333;
    margin-bottom: 1rem;
  }
  .modal label {
    display: block;
    margin: 0.5rem 0 0.25rem;
    font-weight: bold;
  }
  .modal input, .modal textarea {
    width: 100%;
    padding: 0.6rem;
    margin-bottom: 1rem;
    border-radius: 6px;
    border: 1px solid #ccc;
  }
  .close-btn {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: transparent;
    border: none;
    font-size: 1.5rem;
    color: #999;
    cursor: pointer;
  }
</style>

<section class="row" aria-label="Seção principal da clínica">
  <article class="card" role="article" tabindex="0">
    <img src="https://www.implart.com.br/wp-content/themes/yootheme/cache/0e/prevencao_saude_bucal_checkup_dentista_50kb-0ef2c72f.jpeg" 
         alt="Clínica dentária moderna" class="card-img-top" loading="lazy" />
    <div class="card-body">
      <h2 class="card-title">Atendimento Profissional</h2>
      <p class="card-text">Equipe qualificada, pronta para oferecer tratamentos modernos e cuidados personalizados.</p>
      <button class="btn open-modal-btn" data-modal="modal1" aria-haspopup="dialog" aria-controls="modal1" aria-expanded="false">Agendar Consulta</button>
    </div>
  </article>

  <article class="card" role="article" tabindex="0">
    <img src="https://img.freepik.com/fotos-premium/clinica-odontologica-com-tecnologia-de-ponta_933496-6605.jpg" 
         alt="Consulta odontológica moderna" class="card-img-top" loading="lazy" />
    <div class="card-body">
      <h2 class="card-title">Tecnologia de Ponta</h2>
      <p class="card-text">Equipamentos de última geração para diagnósticos precisos e tratamentos eficazes.</p>
      <button class="btn open-modal-btn" data-modal="modal2" aria-haspopup="dialog" aria-controls="modal2" aria-expanded="false">Saiba Mais</button>
    </div>
  </article>

  <article class="card" role="article" tabindex="0">
    <img src="https://media.licdn.com/dms/image/v2/D4D12AQGStLkH5Pyy9Q/article-cover_image-shrink_720_1280/article-cover_image-shrink_720_1280/0/1687211025055?e=2147483647&v=beta&t=e9fLyuvWf1Fg3v9mNEYOMgMx7_0Cw8ittmF4XRv9dGY" 
         alt="Equipe de dentistas sorrindo" class="card-img-top" loading="lazy" />
    <div class="card-body">
      <h2 class="card-title">Equipe Amigável</h2>
      <p class="card-text">Profissionais dedicados que cuidam de você com atenção e empatia.</p>
      <button class="btn open-modal-btn" data-modal="modal3" aria-haspopup="dialog" aria-controls="modal3" aria-expanded="false">Conheça a Equipe</button>
    </div>
  </article>
</section>

<!-- MODAIS -->
<div class="modal-overlay" id="modal1" role="dialog" aria-modal="true" aria-labelledby="modal1-title" tabindex="-1">
  <div class="modal">
    <button class="close-btn" aria-label="Fechar modal">&times;</button>
    <h3 id="modal1-title">Agendamento de Consulta</h3>
    <p>Preencha o formulário abaixo para agendar sua consulta com nossos especialistas.</p>
    <form>
      <label for="nome1">Nome Completo</label>
      <input type="text" id="nome1" name="nome1" required>

      <label for="telefone1">Telefone</label>
      <input type="tel" id="telefone1" name="telefone1" required pattern="[\d\s\-\+\(\)]+" >

      <label for="email1">Email</label>
      <input type="email" id="email1" name="email1" required>

      <label for="mensagem1">Mensagem</label>
      <textarea id="mensagem1" name="mensagem1" rows="3" placeholder="Ex: Prefiro horário pela manhã"></textarea>

      <button type="submit" class="btn">Enviar</button>
    </form>
  </div>
</div>

<div class="modal-overlay" id="modal2" role="dialog" aria-modal="true" aria-labelledby="modal2-title" tabindex="-1">
  <div class="modal">
    <button class="close-btn" aria-label="Fechar modal">&times;</button>
    <h3 id="modal2-title">Tecnologia de Ponta</h3>
    <p>Equipamentos modernos como Scanner 3D, Laser Cirúrgico e Radiografia Digital garantem precisão e conforto.</p>
  </div>
</div>

<div class="modal-overlay" id="modal3" role="dialog" aria-modal="true" aria-labelledby="modal3-title" tabindex="-1">
  <div class="modal">
    <button class="close-btn" aria-label="Fechar modal">&times;</button>
    <h3 id="modal3-title">Equipe Amigável</h3>
    <p>Nossos dentistas são treinados para oferecer um atendimento acolhedor, com escuta ativa e respeito ao seu tempo e história.</p>
  </div>
</div>

<script>
  const modalButtons = document.querySelectorAll('.open-modal-btn');
  const modals = document.querySelectorAll('.modal-overlay');

  modalButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const modalId = btn.getAttribute('data-modal');
      const modal = document.getElementById(modalId);
      if (modal) {
        modal.style.display = 'flex';
        btn.setAttribute('aria-expanded', 'true');
        modal.querySelector('input, textarea')?.focus();
      }
    });
  });

  modals.forEach(modal => {
    modal.querySelector('.close-btn').addEventListener('click', () => {
      modal.style.display = 'none';
      const btn = document.querySelector(`[data-modal="${modal.id}"]`);
      if (btn) {
        btn.setAttribute('aria-expanded', 'false');
        btn.focus();
      }
    });
    modal.addEventListener('click', e => {
      if (e.target === modal) {
        modal.querySelector('.close-btn').click();
      }
    });
  });

  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      modals.forEach(modal => {
        if (modal.style.display === 'flex') {
          modal.querySelector('.close-btn').click();
        }
      });
    }
  });
</script>



   <style>
  /* Fundo temático sutil com dentinhos e escovas em padrão */
  section.infantil {
    margin-top: 4rem;
    padding: 3rem 2rem;
    background: #fff9f9;
    border-radius: 24px;
    box-shadow: 0 12px 28px rgba(255, 105, 180, 0.15);
    color: #7b4053;
    text-align: center;
    position: relative;
    background-image: url('https://svgshare.com/i/_1X.svg'); /* ícone dentinho repetido */
    background-repeat: repeat;
    background-size: 80px 80px;
  }

  section.infantil h2 {
    font-size: 2.8rem;
    font-weight: 900;
    margin-bottom: 0.5rem;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    color: #d6336c;
  }

  section.infantil p.intro {
    font-size: 1.3rem;
    max-width: 700px;
    margin: 0 auto 2.5rem;
    font-weight: 600;
    line-height: 1.5;
  }

  section.infantil p.brinde {
    font-size: 1.25rem;
    font-weight: 700;
    color: #e03e79;
    margin-bottom: 3rem;
  }

  section.infantil .row {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
  }

  section.infantil article.card {
    max-width: 300px;
    background: #ffe6f0;
    border-radius: 24px;
    box-shadow: 0 12px 20px rgba(255, 105, 180, 0.35);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
  }

  section.infantil article.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 30px rgba(255, 105, 180, 0.55);
  }

  .card-img-top.infantil {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-bottom-left-radius: 24px;
    border-bottom-right-radius: 24px;
    transition: transform 0.5s ease;
  }

  section.infantil article.card:hover .card-img-top.infantil {
    transform: scale(1.05);
  }

  .card-body {
    padding: 1.8rem 1.6rem;
  }

  .card-title {
    font-size: 1.5rem;
    font-weight: 800;
    margin-bottom: 0.8rem;
    color: #d6336c;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  .card-title span.emoji {
    font-size: 1.8rem;
  }

  .card-text {
    font-size: 1rem;
    color: #7b4053;
    line-height: 1.5;
  }

  /* Responsividade */
  @media (max-width: 768px) {
    section.infantil .row {
      flex-direction: column;
      gap: 2.5rem;
      align-items: center;
    }
  }
</style>

<!-- SEÇÃO INFANTIL COM FUNDO E ESTILO MODERNO -->
<section class="infantil" aria-label="Seção Infantil - Clínica Dentária Lusitana" style="padding: 4rem 1.5rem; background: linear-gradient(135deg, #f9f7fd 0%, #e8f0fe 100%);">
  <h2 style="text-align: center; font-size: 2.2rem; color: #0D3B66; margin-bottom: 1rem;">🦷 Clínica Infantil: Sorrisos que Brilham!</h2>
  <p class="intro" style="text-align: center; max-width: 700px; margin: 0 auto 1rem; font-size: 1.1rem; color: #444;">
    Um espaço acolhedor e divertido, pensado para tornar o cuidado dental das crianças uma experiência leve, educativa e feliz.
  </p>
  <p class="brinde" style="text-align: center; font-weight: bold; color: #0077cc; margin-bottom: 2rem;">
    🎁 Venha nos visitar e ganhe o seu Kit Sorriso Forte — escova + pasta + surpresa especial!
  </p>

  <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 2rem; max-width: 1024px; margin: 0 auto;">
    <article class="card" role="article" tabindex="0" style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 1.5rem; text-align: center;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRORDOp6UafuoYepMs7-WLOWi9GHCoIzk0YRg&s" 
           alt="Crianças sorrindo no consultório" style="width: 100%; max-height: 180px; border-radius: 10px; object-fit: cover; margin-bottom: 1rem;" loading="lazy" />
      <h3 class="card-title" style="font-size: 1.3rem; color: #0D3B66; margin-bottom: 0.5rem;"><span class="emoji">😄</span> Consultas Divertidas</h3>
      <p class="card-text" style="color: #555;">
        Dentistas especializados que transformam a visita ao consultório em uma experiência alegre, com jogos e histórias que encantam os pequenos.
      </p>
    </article>

    <article class="card" role="article" tabindex="0" style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 1.5rem; text-align: center;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAAJqfrzZvk9UF1Ae7CaYXFGzqJdvc7ZVyiQ&s" 
           alt="Atividades lúdicas para crianças" style="width: 100%; max-height: 180px; border-radius: 10px; object-fit: cover; margin-bottom: 1rem;" loading="lazy" />
      <h3 class="card-title" style="font-size: 1.3rem; color: #0D3B66; margin-bottom: 0.5rem;"><span class="emoji">🪥</span> Atividades Educativas</h3>
      <p class="card-text" style="color: #555;">
        Espaço com brinquedos, jogos e oficinas que ensinam a importância da higiene bucal de forma lúdica e divertida.
      </p>
    </article>

    <article class="card" role="article" tabindex="0" style="background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.06); padding: 1.5rem; text-align: center;">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZdfWgIg-HxviPM98tUJ3ICG1KqsSJJ9R_fg&s" 
           alt="Dentista cuidando de criança" style="width: 100%; max-height: 180px; border-radius: 10px; object-fit: cover; margin-bottom: 1rem;" loading="lazy" />
      <h3 class="card-title" style="font-size: 1.3rem; color: #0D3B66; margin-bottom: 0.5rem;"><span class="emoji">🦸‍♂️</span> Odontopediatria Especializada</h3>
      <p class="card-text" style="color: #555;">
        Tratamentos personalizados e cuidadosos para garantir o desenvolvimento saudável dos dentinhos e a confiança das crianças.
      </p>
    </article>
  </div>
</section>


<!-- CTA MODERNA -->
<section class="cta" aria-label="Call to Action Agendamento"
  style="padding: 4rem 1.5rem; background: linear-gradient(135deg, #e0f7ff 0%, #f0fbff 100%); text-align: center; border-top: 3px solid #0D3B66; border-bottom: 3px solid #0D3B66;">
  
  <h3 id="agendamento" style="font-size: 2.3rem; color: #0D3B66; margin-bottom: 1rem;">✨ Agende Sua Consulta Hoje Mesmo!</h3>

  <p style="max-width: 700px; margin: 0 auto 2rem; font-size: 1.1rem; color: #333;">
    Entre em contato conosco pelo telefone  
    <strong style="color: #0D3B66;">📞 (+351) 912 345 678</strong>  
    ou pelo email  
    <a href="mailto:contato@clinicadentarialusitana.pt" style="color: #0D3B66; text-decoration: underline;">contato@clinicadentarialusitana.pt</a>.  
    Estamos ansiosos para cuidar do seu sorriso com carinho e excelência!
  </p>

  <div class="btn-group" style="margin-top: 1.5rem; display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
    <a href="tel:+351912345678" class="btn" aria-label="Ligar para clínica"
      style="padding: 0.8rem 1.5rem; background: #0D3B66; color: #fff; border: none; border-radius: 8px; font-size: 1rem; text-decoration: none; transition: background 0.3s;">
      📞 Ligar Agora
    </a>
    <a href="mailto:contato@clinicadentarialusitana.pt" class="btn" aria-label="Enviar email para clínica"
      style="padding: 0.8rem 1.5rem; background: #20bfa9; color: #fff; border: none; border-radius: 8px; font-size: 1rem; text-decoration: none; transition: background 0.3s;">
      ✉️ Enviar Email
    </a>
  </div>
</section>

<!-- FOOTER MODERNO -->
<footer style="background: #0D3B66; color: #fff; padding: 3rem 1.5rem 2rem; font-size: 0.95rem;">
  <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

    <!-- SOBRE A CLÍNICA -->
    <div style="flex: 1; min-width: 220px;">
      <h4 style="color: #FFDD00; margin-bottom: 1rem;">Clínica Dentária Lusitana</h4>
      <p>Excelência em saúde bucal com tecnologia de ponta e atendimento humanizado em Portugal.</p>
      <p style="margin-top: 1rem;">
        📍 Rua da Saúde, 123 - Lisboa<br>
        📞 (+351) 912 345 678<br>
        ✉️ contato@clinicadentarialusitana.pt
      </p>
    </div>

    <!-- LINKS ÚTEIS -->
    <div style="flex: 1; min-width: 180px;">
      <h4 style="color: #FFDD00; margin-bottom: 1rem;">Links Rápidos</h4>
      <ul style="list-style: none; padding: 0; line-height: 1.8;">
        <li><a href="#inicio" style="color: #fff; text-decoration: none;">🏠 Início</a></li>
        <li><a href="#servicos" style="color: #fff; text-decoration: none;">🦷 Serviços</a></li>
        <li><a href="#equipe" style="color: #fff; text-decoration: none;">👨‍⚕️ Equipe</a></li>
        <li><a href="#agendamento" style="color: #fff; text-decoration: none;">📅 Agendamento</a></li>
      </ul>
    </div>

    <!-- REDES SOCIAIS -->
    <div style="flex: 1; min-width: 220px;">
      <h4 style="color: #FFDD00; margin-bottom: 1rem;">Siga-nos</h4>
      <div style="display: flex; gap: 1rem; font-size: 1.2rem;">
        <a href="#" style="color: #fff; text-decoration: none;">🌐 Site</a>
        <a href="#" style="color: #fff; text-decoration: none;">📘 Facebook</a>
        <a href="#" style="color: #fff; text-decoration: none;">📸 Instagram</a>
      </div>
    </div>

    <!-- NEWSLETTER (opcional) -->
    <div style="flex: 1 1 100%; margin-top: 2rem; text-align: center;">
      <form style="display: inline-flex; gap: 0.5rem; flex-wrap: wrap; justify-content: center;">
        <input type="email" placeholder="Seu email para novidades" required
               style="padding: 0.6rem 1rem; border: none; border-radius: 5px; min-width: 220px;">
        <button type="submit"
                style="padding: 0.6rem 1rem; background: #FFDD00; color: #0D3B66; border: none; border-radius: 5px; cursor: pointer;">
          Assinar
        </button>
      </form>
    </div>
  </div>

  <!-- RODAPÉ FINAL -->
  <div style="margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 1rem; text-align: center; font-size: 0.85rem;">
    <p style="margin: 0;">© 2025 Clínica Dentária Lusitana. Todos os direitos reservados.</p>
    <p style="margin: 0.3rem 0 0;">Desenvolvido com ❤️ por <strong>Alex Oliveira</strong></p>
  </div>
</footer>


  </main>
</body>
</html>
