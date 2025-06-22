<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Salão de Beleza Premium | Exclusivo para Mulheres</title>
  <meta name="description" content="Salão de beleza profissional feminino com serviços exclusivos, atendimento premium e agendamento online." />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- Ícones -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
   body {
  font-family: 'Poppins', sans-serif;
  background-color: #fdfcf8; /* tom marfim suave */
  color: #5e5548; /* tom neutro elegante */
  margin: 0;
  padding-top: 80px;
}

header {
  background-color: #faf7f0; /* pérola */
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 999;
}

.navbar-brand {
  font-family: 'Playfair Display', serif;
  color: #a68c5d !important; /* dourado suave */
  font-weight: 700;
  font-size: 1.8rem;
}

.nav-link {
  font-weight: 500;
  color: #83785f !important;
}

.nav-link:hover {
  color: #c4b38a !important; /* toque de champanhe */
}

.hero {
  background: linear-gradient(135deg, #f7f3ea, #f0e8d9); /* degradê pérola e areia */
  padding: 100px 20px 80px;
  text-align: center;
}

.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: 3rem;
  color:rgb(209, 174, 0); /* dourado escuro elegante */
  margin-bottom: 15px;
}

.hero p {
  font-size: 1.2rem;
  max-width: 600px;
  margin: 0 auto 25px;
  color: #9a8862;
}

.btn-primary {
  background-color: #a68c5d; /* dourado clássico */
  border: none;
  padding: 12px 30px;
  font-weight: 600;
  font-size: 1.1rem;
  border-radius: 8px;
  color: #fff;
}

.btn-primary:hover {
  background-color: #8f7749;
}

.services {
  padding: 60px 20px;
  background: #fffefb;
  text-align: center;
}

.services h2 {
  font-family: 'Playfair Display', serif;
  color: #a68c5d;
  margin-bottom: 40px;
}

.service-item {
  background: #f5f3ed;
  border-radius: 12px;
  padding: 30px 20px;
  margin: 15px;
  box-shadow: 0 4px 15px rgba(166, 140, 93, 0.1);
}

.service-icon {
  font-size: 45px;
  color: #a68c5d;
  margin-bottom: 15px;
}

.service-title {
  font-weight: 600;
  color: #5e5548;
}

.booking {
  background: #faf6ef;
  padding: 60px 20px;
  border-radius: 16px;
  max-width: 700px;
  margin: 0 auto;
}

.booking h2 {
  color: #8f7749;
  font-family: 'Playfair Display', serif;
  margin-bottom: 30px;
}

.form-control, .form-select {
  border-radius: 8px;
  border: 1.5px solid #ddd;
}

.form-control:focus, .form-select:focus {
  border-color: #c4b38a;
  box-shadow: 0 0 5px rgba(196, 179, 138, 0.3);
}

.btn-submit {
  background-color: #a68c5d;
  border: none;
  width: 100%;
  padding: 14px;
  border-radius: 8px;
  color: #fff;
  font-weight: 700;
}

.btn-submit:hover {
  background-color: #7e653f;
}

.contact {
  padding: 60px 20px;
  text-align: center;
  background: #fefdf9;
}

.contact h2 {
  font-family: 'Playfair Display', serif;
  color: #a68c5d;
  margin-bottom: 20px;
}

footer {
  background-color: #f5f3ed;
  padding: 40px 20px;
  font-size: 0.95rem;
}

footer a {
  color: #83785f;
  text-decoration: none;
}

footer a:hover {
  text-decoration: underline;
}

.service-card {
  height: 340px;
  position: relative;
  transition: transform 0.3s ease;
}

.service-card img {
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.service-card:hover img {
  transform: scale(1.05);
}

.service-card .overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  background: linear-gradient(to top, rgba(166, 140, 93, 0.8), transparent);
  opacity: 0;
  transition: opacity 0.4s ease;
}

.service-card:hover .overlay {
  opacity: 1;
}

/* Swiper spacing */
.swiper {
  padding: 10px;
}

.swiper-slide {
  width: 270px;
}

#availableTimes button {
  background: #f3efe3;
  border: 1px solid #c4b38a;
  padding: 10px 15px;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}

#availableTimes button:hover {
  background-color: #a68c5d;
  color: #fff;
}

#availableTimes button.selected {
  background-color: #a68c5d;
  color: #fff;
  font-weight: bold;
}

.animated-card {
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  border: none;
  border-radius: 16px;
  overflow: hidden;
}

.animated-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 30px rgba(166, 140, 93, 0.3);
}

.animated-card img {
  height: 240px;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.animated-card:hover img {
  transform: scale(1.05);
}

.card-body h5 {
  font-family: 'Playfair Display', serif;
  color: #a68c5d;
}

.card-body p {
  font-size: 0.9rem;
  line-height: 1.5;
}

.btn-agendamento-flutuante {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #a68c5d;
  color: white;
  border: none;
  border-radius: 50px;
  padding: 12px 22px;
  font-weight: bold;
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  transition: all 0.3s ease;
}

.btn-agendamento-flutuante:hover {
  background-color: #8f7749;
  transform: scale(1.05);
}

.whatsapp-float {
  position: fixed;
  bottom: 90px;
  right: 20px;
  z-index: 9999;
  background-color: transparent;
  border-radius: 50%;
  transition: transform 0.2s;
}

.whatsapp-float:hover {
  transform: scale(1.1);
}

.whatsapp-icon {
  width: 60px;
  height: 60px;
}

  </style>
</head>
<body>

<!-- HEADER -->
<header class="shadow-sm bg-white fixed-top py-2">
  <div class="container d-flex align-items-center justify-content-between">
    
    <!-- Logo -->
    <a class="navbar-brand d-flex align-items-center" href="#">
     <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYCRsIOBG46nFQkQGdaNc6FLlNXLudgsLbaQ&s" alt="Logo Salão Premium" width="40" height="40" class="me-2" style="object-fit: contain;" />
      <span style="font-family: 'Playfair Display', serif; font-size: 1.5rem; color:rgb(156, 140, 0);">SalãoPremium</span>
    </a>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav ms-auto gap-3 text-center">
          <li class="nav-item">
            <a href="#servicos" class="nav-link text-dark fw-semibold">Serviços</a>
          </li>
          <li class="nav-item">
            <a href="#agendamento" class="nav-link text-dark fw-semibold">Agendamento</a>
          </li>
          <li class="nav-item">
            <a href="#contato" class="nav-link text-dark fw-semibold">Contato</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Botão Agendar -->
    <a href="#agendamento" class="btn btn-sm btn-primary d-none d-lg-inline-block" style="background-color:rgb(156, 140, 0); border: none; font-weight: 600;">
      Agendar Agora
    </a>
  </div>
</header>


<!-- HERO -->
<!-- Google Fonts (adicione no <head> se ainda não estiver): -->
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

<section class="hero d-flex align-items-center" style="
  background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), 
  url('https://png.pngtree.com/thumb_back/fh260/background/20250423/pngtree-a-woman-with-long-flowing-hair-gracefully-styled-and-cascading-around-image_17217026.jpg') center center / cover no-repeat;
  min-height: 90vh;
  padding: 100px 20px 80px;
  color: #ffe8f2;
  text-shadow: 0 2px 6px rgba(0,0,0,0.3);
">
  <div class="container text-center">
    <h1 style="font-family: 'Great Vibes', cursive; font-size: 3.5rem; font-weight: 400;">
      Beleza que Inspira
    </h1>
    <p style="font-family: 'Poppins', sans-serif; font-size: 1.15rem; max-width: 600px; margin: 0 auto 25px; color:rgb(176, 195, 4);">
      Serviços de excelência para realçar sua beleza natural com cuidado e carinho.
    </p>

    <!-- Estrelas -->
    <div class="mb-4">
      <i class="bi bi-star-fill fs-4" style="color: #ffd8eb;"></i>
      <i class="bi bi-star-fill fs-4" style="color: #ffd8eb;"></i>
      <i class="bi bi-star-fill fs-4" style="color: #ffd8eb;"></i>
      <i class="bi bi-star-fill fs-4" style="color: #ffd8eb;"></i>
      <i class="bi bi-star-fill fs-4" style="color: #ffd8eb;"></i>
      <span class="d-block mt-2" style="font-size: 0.95rem; color: #ffdeec;">Avaliação 5.0 | +1.200 clientes felizes</span>
    </div>

    <a href="#agendamento" class="btn px-4 py-2 fw-bold" style="
      background-color:rgb(156, 140, 0); 
      border: none; 
      border-radius: 8px;
      color: white;
      font-family: 'Poppins', sans-serif;
    ">
      Agendar Agora
    </a>
  </div>
</section>



<!-- SERVIÇOS -->
<section class="services" id="planos" style="background:rgb(52, 47, 46); padding: 80px 0;">
  <div class="container">
    <h2 class="text-center mb-5" style="font-family: 'Playfair Display', serif; color:rgb(149, 159, 1); font-size: 2.5rem;">
      Planos & Pacotes Femininos
    </h2>

    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <!-- Slide: Pacote Diva -->
        <div class="swiper-slide">
          <div class="service-card rounded-4 overflow-hidden shadow-lg" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalDiva">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO4Zorn16qFI0nNO3iEvCWTYE-bS4AZqBtjA&s" class="w-100 h-100 object-fit-cover" alt="Pacote Diva">
            <div class="overlay d-flex flex-column justify-content-end p-3 bg-dark bg-opacity-50">
              <h5 class="fw-bold text-white mb-1">Pacote Diva</h5>
              <p class="text-white small mb-0">Coloração + Escova + Design de Sobrancelhas</p>
              <span class="badge bg-light text-dark mt-2">-15% de desconto</span>
            </div>
          </div>
        </div>

        <!-- Slide: Beleza Completa -->
        <div class="swiper-slide">
          <div class="service-card rounded-4 overflow-hidden shadow-lg" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalCompleta">
            <img src="https://img.joomcdn.net/d3bbf0683894133947f7a6ab2d4685fa3e602fb6_1024_1024.jpeg" class="w-100 h-100 object-fit-cover" alt="Beleza Completa">
            <div class="overlay d-flex flex-column justify-content-end p-3 bg-dark bg-opacity-50">
              <h5 class="fw-bold text-white mb-1">Beleza Completa</h5>
              <p class="text-white small mb-0">Limpeza de Pele + Massagem + Mãos & Pés</p>
              <span class="badge bg-light text-dark mt-2">€ 119,00</span>
            </div>
          </div>
        </div>

        <!-- Slide: Dia da Rainha -->
        <div class="swiper-slide">
          <div class="service-card rounded-4 overflow-hidden shadow-lg" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalRainha">
            <img src="https://imagens.ne10.uol.com.br/legado/ne10/imagem/noticia/2016/09/09/normal/ce074f048328a9ec8cb7fe07fdf20d75.jpg" class="w-100 h-100 object-fit-cover" alt="Dia da Rainha">
            <div class="overlay d-flex flex-column justify-content-end p-3 bg-dark bg-opacity-50">
              <h5 class="fw-bold text-white mb-1">Dia da Rainha</h5>
              <p class="text-white small mb-0">Dia completo no salão com tudo incluso</p>
              <span class="badge bg-light text-dark mt-2">Especial para presentes</span>
            </div>
          </div>
        </div>

        <!-- Slide: Essencial Feminina -->
        <div class="swiper-slide">
          <div class="service-card rounded-4 overflow-hidden shadow-lg" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalEssencial">
            <img src="https://empreendedores.mercadopago.com.br/hs-fs/hubfs/imagens/blog/empreendedor/como-montar-um-salao-de-beleza.jpg?width=670&name=como-montar-um-salao-de-beleza.jpg" class="w-100 h-100 object-fit-cover" alt="Essencial Feminina">
            <div class="overlay d-flex flex-column justify-content-end p-3 bg-dark bg-opacity-50">
              <h5 class="fw-bold text-white mb-1">Essencial Feminina</h5>
              <p class="text-white small mb-0">Serviços rápidos para quem tem pressa e bom gosto</p>
              <span class="badge bg-light text-dark mt-2">Combo Express</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- NOSSA EQUIPE -->
<section id="equipe" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-5" style="font-family: 'Playfair Display', serif; color:rgb(133, 143, 6);">Nossa Equipa de Especialistas</h2>
    <div class="row g-4 justify-content-center">

      <div class="col-md-4 text-center">
        <img src="https://img.freepik.com/vetores-gratis/atraente-cabeleireira-feliz-menina-com-pente-e-secador-de-cabelo-retrato-isolado-no-fundo-branco-ilustracao-vetorial_1284-2390.jpg" alt="Esteticista" class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
        <h5 class="fw-bold">Camila Rodrigues</h5>
        <p class="text-muted small">Esteticista & Dermoterapeuta</p>
      </div>

      <div class="col-md-4 text-center">
        <img src="https://w7.pngwing.com/pngs/717/630/png-transparent-comb-hairdresser-hair-dryers-hair-clipper-hair-illustration-microphone-hair-dryers-arm.png" alt="Cabeleireira" class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
        <h5 class="fw-bold">Inês Carvalho</h5>
        <p class="text-muted small">Hair Stylist & Colorista</p>
      </div>

      <div class="col-md-4 text-center">
        <img src="https://w7.pngwing.com/pngs/304/220/png-transparent-hairdresser-beauty-parlour-personal-stylist-hairdryer-blue-people-navy-blue-thumbnail.png" alt="Maquiadora" class="rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
        <h5 class="fw-bold">Joana Lima</h5>
        <p class="text-muted small">Maquiadora Profissional</p>
      </div>

    </div>
  </div>
</section>

<!-- NOSSO ESPAÇO + SERVIÇOS -->
<section id="nosso-espaco" class="py-5" style="background-color:rgb(183, 171, 171);">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; color:rgb(151, 137, 8);">Nosso Espaço</h2>
    <p class="text-center mb-5 text-muted" style="max-width: 700px; margin: 0 auto; color:rgb(220, 219, 208);">
      Um ambiente acolhedor e sofisticado, pensado para cuidar de você com conforto, privacidade e amor em cada detalhe.
    </p>

    <div class="row g-4 justify-content-center">
      <div class="col-md-4">
        <div class="card animated-card h-100">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhuy2mk_JIwzcVacdOVYdvASlLd8TYHrWqag&s" class="card-img-top" alt="Estética e Limpeza de Pele">
          <div class="card-body text-center">
            <h5 class="fw-bold">Estética & Limpeza de Pele</h5>
            <p class="text-muted">Tratamentos faciais, hidratação profunda, antiacne, anti-idade e limpeza de pele completa.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card animated-card h-100">
          <img src="https://xn--sanft-schn-mcb.de/wp-content/uploads/2022/08/shutterstock-609344555-1024x695.jpg.webp" class="card-img-top" alt="Sobrancelhas e Depilação">
          <div class="card-body text-center">
            <h5 class="fw-bold">Sobrancelhas & Depilação</h5>
            <p class="text-muted">Design com pinça ou linha, henna, depilação com cera quente, fria e técnicas para peles sensíveis.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card animated-card h-100">
          <img src="https://www.msccruzeiros.pt/-/media/global-contents/on-board/spa-beauty-and-fitness/enjoy_spa_01.jpg?bc=transparent&as=1&mh=1080&mw=1380&hash=63FB7711038588C091366E6AE3687CD6" class="card-img-top" alt="Massagem e Spa">
          <div class="card-body text-center">
            <h5 class="fw-bold">Massagem & Spa</h5>
            <p class="text-muted">Relaxamento, drenagem linfática, spa dos pés e mãos com aromaterapia e óleos essenciais.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card animated-card h-100">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp9yrx9tNaOdhAyItpjbeid_hhjmWIDJQlrg&s" class="card-img-top" alt="Cabelos & Nutrição Capilar">
          <div class="card-body text-center">
            <h5 class="fw-bold">Cabelos & Nutrição</h5>
            <p class="text-muted">Coloração, cortes, escova, hidratação profunda, cronograma capilar e brilho absoluto.</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card animated-card h-100">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPmiXQXcXcPDOilWBpzZ8riYMTMFDZtX9tEg&s" class="card-img-top" alt="Maquiagem e Consultoria de Imagem">
          <div class="card-body text-center">
            <h5 class="fw-bold">Maquiagem & Imagem</h5>
            <p class="text-muted">Maquiagem para eventos e noivas, visagismo, consultoria de imagem e estilo feminino.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  <!-- MODAIS -->
  <!-- Modal Dia da Noiva -->
  <div class="modal fade" id="modalNoiva" tabindex="-1" aria-labelledby="modalNoivaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalNoivaLabel">Dia da Noiva</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Um dia completo de preparação com pacote de maquiagem, penteado, massagem relaxante, manicure, pedicure e muito mais. Inclui recepção com espumante, ambiente reservado e fotógrafa disponível.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Beleza a Domicílio -->
  <div class="modal fade" id="modalDomicilio" tabindex="-1" aria-labelledby="modalDomicilioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDomicilioLabel">Beleza a Domicílio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Leve o salão até você! Agende nossos serviços para sua casa ou hotel. Ideal para quem busca comodidade com qualidade. Cobrimos grande parte da região de Lisboa.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Spa & Relax -->
  <div class="modal fade" id="modalSpa" tabindex="-1" aria-labelledby="modalSpaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalSpaLabel">Spa & Relax</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Pacotes de relaxamento com massagens terapêuticas, aromaterapia, banho de imersão, hidratação facial e música ambiente. Um verdadeiro momento de autocuidado.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Manicure & Pedicure -->
  <div class="modal fade" id="modalManicure" tabindex="-1" aria-labelledby="modalManicureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalManicureLabel">Manicure & Pedicure</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Tratamento para unhas com corte, lixamento, cuticulagem, esmaltação e spa dos pés. Trabalhamos com marcas premium e técnicas de longa duração.
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Coloração Profissional -->
  <div class="modal fade" id="modalColoracao" tabindex="-1" aria-labelledby="modalColoracaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalColoracaoLabel">Coloração Profissional</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Cores vibrantes ou tons naturais com técnicas de mechas, balayage, luzes e retoques. Produtos profissionais e análise capilar inclusa.
        </div>
      </div>
    </div>
  </div>
</section>

<!-- AGENDAMENTO -->
<section class="booking" id="agendamento" style="background: #fef7fb; padding: 80px 0;">
  <div class="container">
    <h2 class="text-center mb-5" style="color:rgb(195, 180, 9); font-family: 'Playfair Display', serif;">Verifique Disponibilidade & Agende</h2>

    <form id="bookingForm" novalidate class="row justify-content-center gy-4">

      <div class="col-md-6">
        <label for="name" class="form-label">Nome Completo</label>
        <input type="text" id="name" name="name" class="form-control" required>
        <div class="invalid-feedback">Por favor, insira seu nome.</div>
      </div>

      <div class="col-md-6">
        <label for="phone" class="form-label">Telefone</label>
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="+351 912 345 678" pattern="(\+351\s)?9[1236]\d{7}" required>
        <div class="invalid-feedback">Por favor, insira um telefone válido.</div>
      </div>

      <div class="col-md-6">
        <label for="service" class="form-label">Serviço</label>
        <select id="service" name="service" class="form-select" required>
          <option value="" disabled selected>Escolha um serviço</option>
          <option>Dia da Noiva</option>
          <option>Beleza a Domicílio</option>
          <option>Spa & Relax</option>
          <option>Manicure & Pedicure</option>
          <option>Coloração Profissional</option>
        </select>
        <div class="invalid-feedback">Selecione um serviço.</div>
      </div>

      <div class="col-md-6">
        <label for="date" class="form-label">Data</label>
        <input type="date" id="date" name="date" class="form-control" required>
      </div>

      <div class="col-md-12">
        <label class="form-label">Horários Disponíveis</label>
        <div id="availableTimes" class="d-flex flex-wrap gap-2"></div>
        <input type="hidden" name="time" id="timeSelected" required>
        <div class="invalid-feedback d-block" id="timeError" style="display: none;">Selecione um horário disponível.</div>
      </div>

      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary px-5 mt-3" style="background:rgb(171, 180, 4); border: none;">Confirmar Agendamento</button>
      </div>
    </form>
  </div>
</section>

<!-- BLOG -->
<section id="blog" class="py-5" style="background-color:rgb(50, 47, 47);">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family:'Playfair Display', serif; color:rgb(154, 152, 10);">Dicas & Inspirações</h2>
    <p class="text-center mb-5" style="color: #e98a2d; max-width: 700px; margin: 0 auto;">
  Leia nossos posts para aprender mais sobre cuidados com a pele, maquiagem, cabelos e tendências de beleza.
</p>


    <div class="row g-4 justify-content-center">
      <!-- Card de Blog -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
        <div class="card animated-card h-100">
          <img src="https://blog.prataearte.com.br/wp-content/uploads/2017/07/capa-8.png" class="card-img-top" alt="Maquiagem natural">
          <div class="card-body">
            <h5 class="card-title fw-bold">Maquiagem Natural para o Dia a Dia</h5>
            <p class="card-text text-muted small">
              Saiba como conseguir um look leve e duradouro com produtos certos.
            </p>
            <a href="#" class="btn btn-sm btn-outline-primary">Ler Mais</a>
          </div>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="card animated-card h-100">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoDFmvL-kj2srN1PnoFWTUKffIM7MAAeF-sQ&s" class="card-img-top" alt="Cuidados com a pele">
          <div class="card-body">
            <h5 class="card-title fw-bold">Rotina de Cuidados com a Pele</h5>
            <p class="card-text text-muted small">
              Passo a passo ideal para pele radiante e saudável em qualquer idade.
            </p>
            <a href="#" class="btn btn-sm btn-outline-primary">Ler Mais</a>
          </div>
        </div>
      </div>

      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card animated-card h-100">
          <img src="https://blog.trinks.com/wp-content/uploads/2023/04/1-10.jpg.webp" class="card-img-top" alt="Tendência de cabelo">
          <div class="card-body">
            <h5 class="card-title fw-bold">Tendências de Cabelo 2025</h5>
            <p class="card-text text-muted small">
              Inspirações e cortes que estão em alta nesta temporada.
            </p>
            <a href="#" class="btn btn-sm btn-outline-primary">Ler Mais</a>
          </div>
        </div>
      </div>

    </div>

    <div class="text-center mt-4">
      <a href="#" class="btn btn-primary" style="background-color:rgb(165, 168, 10); border: none;">Ver Mais Posts</a>
    </div>
  </div>
</section>


<!-- CONTATO -->
<section class="contact" id="contato">
  <div class="container text-center">
    <h2>Contato</h2>
    
   <div class="row justify-content-center text-start mt-4">
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm bg-light h-100">
      <i class="bi bi-whatsapp fs-3 text-success"></i>
      <div>
        <small class="text-muted d-block">WhatsApp</small>
        <a href="https://wa.me/351932121766" target="_blank" class="text-dark fw-semibold text-decoration-none">+351 912 345 678</a>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm bg-light h-100">
      <i class="bi bi-envelope-fill fs-3 text-primary"></i>
      <div>
        <small class="text-muted d-block">Email</small>
        <a href="mailto:contato@salaopremium.pt" class="text-dark fw-semibold text-decoration-none">contato@salaopremium.pt</a>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4 mb-4">
    <div class="d-flex align-items-center gap-3 p-3 border rounded shadow-sm bg-light h-100">
      <i class="bi bi-geo-alt-fill fs-3 text-danger"></i>
      <div>
        <small class="text-muted d-block">Endereço</small>
        <span class="text-dark fw-semibold">Rua da Bélgica 2450 – Canidelo, Portugal</span>
      </div>
    </div>
  </div>
</div>


    <!-- Mapa Google pequeno -->
    <div style="margin-top: 30px;">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2986.5088022857655!2d-8.647986684408456!3d41.12256407928908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464dc186cd7fd%3A0x34223b48c81f1e9a!2sRua%20da%20B%C3%A9lgica%202450%2C%204405-031%20Canidelo!5e0!3m2!1spt-PT!2spt!4v1718993070200!5m2!1spt-PT!2spt" 
        width="100%" 
        height="250" 
        style="border:0; border-radius: 12px;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</section>


<!-- DEPOIMENTOS -->
<section id="depoimentos" class="py-5" style="background-color: #fffaf9;">
  <div class="container">
    <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; color:rgb(186, 171, 9);">O que Nossas Clientes Dizem</h2>

    <div id="carouselDepoimentos" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner text-center">

        <!-- Depoimento 1 -->
        <div class="carousel-item active">
          <div class="d-flex flex-column align-items-center">
            <img src="https://randomuser.me/api/portraits/women/44.jpg" class="rounded-circle mb-3" alt="Cliente 1" width="90" height="90">
            <h5 class="fw-bold" style="color:rgb(157, 167, 9);">Carla Mendes</h5>
            <p class="text-muted small px-4" style="max-width: 600px;">
              "Simplesmente maravilhosa! Fiz sobrancelha e limpeza de pele, saí me sentindo outra mulher. Atendimento impecável!"
            </p>
            <div class="text-warning fs-5">
              ★★★★★
            </div>
          </div>
        </div>

        <!-- Depoimento 2 -->
        <div class="carousel-item">
          <div class="d-flex flex-column align-items-center">
            <img src="https://randomuser.me/api/portraits/women/65.jpg" class="rounded-circle mb-3" alt="Cliente 2" width="90" height="90">
            <h5 class="fw-bold" style="color:rgb(121, 125, 9);">Lúcia Ferreira</h5>
            <p class="text-muted small px-4" style="max-width: 600px;">
              "Fiz o Dia da Noiva completo, tudo perfeito! Me maquiaram com tanto carinho, parecia um conto de fadas."
            </p>
            <div class="text-warning fs-5">
              ★★★★★
            </div>
          </div>
        </div>

        <!-- Depoimento 3 -->
        <div class="carousel-item">
          <div class="d-flex flex-column align-items-center">
            <img src="https://randomuser.me/api/portraits/women/29.jpg" class="rounded-circle mb-3" alt="Cliente 3" width="90" height="90">
            <h5 class="fw-bold" style="color:rgb(151, 181, 6);">Ana Beatriz</h5>
            <p class="text-muted small px-4" style="max-width: 600px;">
              "Uso o serviço de beleza a domicílio e sempre me surpreendo. Super profissionais, pontuais e gentis."
            </p>
            <div class="text-warning fs-5">
              ★★★★★
            </div>
          </div>
        </div>

      </div>

      <!-- Controles -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselDepoimentos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" style="filter: invert(1);"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselDepoimentos" data-bs-slide="next">
        <span class="carousel-control-next-icon" style="filter: invert(1);"></span>
      </button>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer style="background-color: #1b1b1b; color: #f0f0f0; padding: 40px 20px;">
  <div class="container">
    <div class="row gy-4 text-start">

      <!-- Sobre o salão -->
      <div class="col-md-4">
        <h5>Sobre o Salão</h5>
        <p style="font-size: 0.95rem;">No SalãoPremium cuidamos da sua beleza com excelência, carinho e os melhores profissionais. Atendemos com qualidade e sofisticação em cada detalhe.</p>
      </div>

      <!-- Links úteis -->
      <div class="col-md-2">
        <h5>Links</h5>
        <ul class="list-unstyled small">
          <li><a href="#servicos" class="text-decoration-none text-light">Serviços</a></li>
          <li><a href="#equipe" class="text-decoration-none text-light">Nossa Equipe</a></li>
          <li><a href="#espaco" class="text-decoration-none text-light">Nosso Espaço</a></li>
          <li><a href="#blog" class="text-decoration-none text-light">Blog</a></li>
          <li><a href="#contato" class="text-decoration-none text-light">Contato</a></li>
        </ul>
      </div>

      <!-- Redes Sociais -->
      <div class="col-md-3">
        <h5>Siga-nos</h5>
        <p class="small">Acompanhe nossas novidades nas redes:</p>
        <a href="https://facebook.com" target="_blank" class="text-light me-3"><i class="fab fa-facebook fa-lg"></i></a>
        <a href="https://instagram.com" target="_blank" class="text-light me-3"><i class="fab fa-instagram fa-lg"></i></a>
        <a href="https://wa.me/351912345678" target="_blank" class="text-light"><i class="fab fa-whatsapp fa-lg"></i></a>
      </div>

      <!-- Newsletter -->
      <div class="col-md-3">
        <h5>Newsletter</h5>
        <form>
          <input type="email" class="form-control mb-2" placeholder="Seu email" required>
          <button class="btn btn-light btn-sm w-100">Assinar</button>
        </form>
      </div>
    </div>

    <hr class="mt-4 mb-3" style="border-color: rgba(255,255,255,0.1);">

    <div class="text-center small">
      <p class="mb-1">&copy; <?php echo date('Y'); ?> SalãoPremium. Todos os direitos reservados.</p>
      <p class="small" style="color:rgba(240, 230, 255, 0.51);">Desenvolvido com ❤️ por <strong>Alex Oliveira</strong></p>

    </div>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const form = document.getElementById('bookingForm');
  const dateInput = document.getElementById('date');
  const today = new Date().toISOString().split('T')[0];
  dateInput.min = today;

  form.addEventListener('submit', function (e) {
    if (!form.checkValidity()) {
      e.preventDefault();
      e.stopPropagation();
    } else {
      e.preventDefault();
      alert('Agendamento confirmado! Em breve entraremos em contato.');
      form.reset();
    }
    form.classList.add('was-validated');
  });
  
</script>

<!-- Swiper.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".mySwiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
    loop: true,
    grabCursor: true,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false
    },
    breakpoints: {
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 }
    }
  });
</script>

<script>
  const horariosPorServico = {
    "Dia da Noiva": ["09:00", "13:00", "15:30"],
    "Beleza a Domicílio": ["10:00", "14:00", "16:30"],
    "Spa & Relax": ["11:00", "13:30", "17:00"],
    "Manicure & Pedicure": ["09:30", "11:00", "14:30"],
    "Coloração Profissional": ["10:30", "13:00", "15:00"]
  };

  document.getElementById('service').addEventListener('change', atualizarHorarios);
  document.getElementById('date').addEventListener('change', atualizarHorarios);

  function atualizarHorarios() {
    const servico = document.getElementById('service').value;
    const data = document.getElementById('date').value;
    const container = document.getElementById('availableTimes');
    const inputTime = document.getElementById('timeSelected');
    const erro = document.getElementById('timeError');

    container.innerHTML = '';
    inputTime.value = '';
    erro.style.display = 'none';

    if (servico && data) {
      const horarios = horariosPorServico[servico] || [];

      horarios.forEach(hora => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.textContent = hora;
        btn.onclick = () => {
          document.querySelectorAll('#availableTimes button').forEach(b => b.classList.remove('selected'));
          btn.classList.add('selected');
          inputTime.value = hora;
        };
        container.appendChild(btn);
      });
    }
  }

  document.getElementById('bookingForm').addEventListener('submit', e => {
    const timeSelected = document.getElementById('timeSelected').value;
    const erro = document.getElementById('timeError');
    if (!timeSelected) {
      erro.style.display = 'block';
      e.preventDefault();
    }
  });
</script>

<!-- BOTÃO FLOTANTE DE AGENDAMENTO -->
<button id="btn-agendamento" class="btn-agendamento-flutuante" data-bs-toggle="modal" data-bs-target="#modalAgendamento">
  💬 Agende Agora
</button>

<!-- MODAL DE AGENDAMENTO -->
<div class="modal fade" id="modalAgendamento" tabindex="-1" aria-labelledby="modalAgendamentoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-light border-0">
        <h5 class="modal-title text-muted" id="modalAgendamentoLabel">📅 Agendar Serviço</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form id="formAgendamentoRapido">
          <div class="mb-3">
            <label for="nomeRapido" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nomeRapido" required>
          </div>
          <div class="mb-3">
            <label for="telefoneRapido" class="form-label">Telefone</label>
            <input type="tel" class="form-control" id="telefoneRapido" placeholder="+351 912 345 678" required>
          </div>
          <div class="mb-3">
            <label for="servicoRapido" class="form-label">Serviço</label>
            <select class="form-select" id="servicoRapido" required>
              <option disabled selected>Selecione</option>
              <option>Dia da Noiva</option>
              <option>Beleza a Domicílio</option>
              <option>Spa & Relax</option>
              <option>Estética e Limpeza</option>
              <option>Sobrancelhas & Depilação</option>
              <option>Coloração Profissional</option>
              <option>Maquiagem & Consultoria</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="dataRapido" class="form-label">Data</label>
            <input type="date" class="form-control" id="dataRapido" required>
          </div>
          <div class="mb-3">
            <label for="horaRapido" class="form-label">Horário</label>
            <select class="form-select" id="horaRapido" required>
              <option disabled selected>Escolha um horário</option>
              <option>09:00</option>
              <option>10:30</option>
              <option>13:00</option>
              <option>15:30</option>
              <option>17:00</option>
            </select>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn text-white fw-bold" style="background-color: #d291bc;">Confirmar Agendamento</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- BOTÃO WHATSAPP FLUTUANTE -->
<a href="https://wa.me/351912345678?text=Olá!%20Gostaria%20de%20falar%20com%20a%20equipe." target="_blank" class="whatsapp-float" title="Fale conosco pelo WhatsApp">
  <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp" class="whatsapp-icon">
</a>


</body>
</html>
