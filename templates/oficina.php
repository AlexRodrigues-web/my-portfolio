<?php
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
  $nome = trim($_POST['nome'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $mensagem = trim($_POST['mensagem'] ?? '');

  if ($nome && filter_var($email, FILTER_VALIDATE_EMAIL) && $mensagem) {
    $msg = "<p style='color:green;'>Obrigado, <strong>" . htmlspecialchars($nome) . "</strong>. Sua mensagem foi enviada com sucesso!</p>";
    $nome = $email = $mensagem = '';
  } else {
    $msg = "<p style='color:red;'>Preencha todos os campos corretamente.</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8" />
  <title>Oficina Auto Portugal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: 'Segoe UI', sans-serif; background: #f9f9f9; color: #333; }

    header {
      background: #1c1c1c;
      color: #fff;
      padding: 1.5rem 1rem;
      text-align: center;
    }
    header h1 { margin: 0; font-size: 2rem; }
    header p { font-size: 1rem; margin-top: .5rem; color: #ccc; }
    nav { margin-top: 1rem; }
    nav a {
      color: #ffd700;
      margin: 0 0.8rem;
      text-decoration: none;
      font-weight: bold;
    }

    .hero {
      background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.7)),
        url('https://images.unsplash.com/photo-1608581726598-42e9b9f0b2db?auto=format&fit=crop&w=1500&q=80') center/cover no-repeat;
      color: #fff;
      padding: 6rem 2rem;
      text-align: center;
    }
    .hero h2 { font-size: 2.5rem; margin-bottom: 1rem; }
    .hero p { font-size: 1.2rem; margin-bottom: 2rem; }
    .hero a {
      background: #ffd700;
      color: #000;
      padding: 0.8rem 1.5rem;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      margin: 0 0.5rem;
    }

    main { max-width: 1100px; margin: 2rem auto; padding: 0 1rem; }

    h3.section-title {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 1.5rem;
      color: #1c1c1c;
    }

    .servicos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1.5rem;
    }
    .servico {
      background: #fff;
      border-radius: 8px;
      padding: 1rem;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      text-align: center;
    }
    .servico i {
      font-size: 2rem;
      color: #ffd700;
      margin-bottom: 0.5rem;
    }
    .servico h4 { margin: 0.5rem 0; color: #222; }

    .sobre {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 2rem;
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .sobre img {
      flex: 1 1 300px;
      border-radius: 8px;
      max-width: 100%;
    }
    .sobre-texto {
      flex: 2;
    }

    form {
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      max-width: 600px;
      margin: 2rem auto;
      box-shadow: 0 2px 10px rgba(0,0,0,0.07);
    }
    label { display: block; margin-top: 1rem; font-weight: bold; }
    input, textarea {
      width: 100%;
      padding: 0.7rem;
      margin-top: 0.3rem;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      margin-top: 1.2rem;
      background: #1c1c1c;
      color: #fff;
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 5px;
      font-size: 1rem;
      cursor: pointer;
    }
    button:hover {
      background: #000;
    }

    .galeria {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
      margin: 1rem 0;
    }
    .galeria img {
      width: 100%;
      border-radius: 6px;
      box-shadow: 0 1px 5px rgba(0,0,0,0.1);
    }

    .footer {
  background: #1b1e24;
  color: #ccc;
  padding: 60px 20px 30px;
  font-size: 0.95rem;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 30px;
  max-width: 1200px;
  margin: auto;
}

.footer-col {
  flex: 1 1 300px;
  min-width: 280px;
}

.footer h4 {
  color: #fff;
  font-size: 1.2rem;
  margin-bottom: 15px;
}

.footer p {
  margin: 8px 0;
}

.footer a {
  color: #ccc;
  text-decoration: none;
  transition: color 0.3s ease;
}

.footer a:hover {
  color: #fff;
}

.social-icons a {
  display: inline-block;
  margin-right: 12px;
  font-size: 1.2rem;
  color: #ccc;
  transition: transform 0.3s ease, color 0.3s ease;
}
.social-icons a:hover {
  color: #00aced;
  transform: scale(1.2);
}

.footer-form input {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: none;
  border-radius: 6px;
  font-size: 0.95rem;
}

.footer-form button {
  width: 100%;
  background: #007bff;
  color: white;
  padding: 12px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.footer-form button:hover {
  background: #0056b3;
}

.footer-bottom {
  border-top: 1px solid #333;
  margin-top: 30px;
  padding-top: 20px;
  text-align: center;
  font-size: 0.9rem;
  color: #aaa;
}

.footer-bottom .assinatura {
  margin-top: 5px;
  font-style: italic;
}


    .depoimentos {
      background: #fff;
      padding: 2rem;
      border-radius: 8px;
      margin: 2rem 0;
    }
    .depoimento {
      font-style: italic;
      margin-bottom: 1.2rem;
    }

    .sobre-oficina {
  background: #f7f9fc;
  padding: 60px 20px;
}
.sobre-oficina .section-title {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 30px;
  color:rgb(41, 42, 42);
}
.sobre-bloco {
  max-width: 1000px;
  margin: auto;
}
.texto-principal p {
  font-size: 1.1rem;
  line-height: 1.7;
  margin-bottom: 1rem;
  color: #333;
}
.diferenciais {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  margin-top: 30px;
}
.destaque {
  flex: 1 1 300px;
  background: #fff;
  padding: 20px;
  border-left: 5px solid #3498db;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  border-radius: 8px;
}
.destaque i {
  font-size: 1.8rem;
  color: #3498db;
}
.destaque h4 {
  margin-top: 10px;
  margin-bottom: 10px;
  color:rgb(43, 45, 47);
}
.destaque p {
  font-size: 0.95rem;
  color: #555;
}
.chamada-final {
  margin-top: 30px;
  padding: 20px;
  background: #eaf2f8;
  border-left: 5px solid #2c3e50;
  font-style: italic;
  color: #2c3e50;
  text-align: center;
  border-radius: 6px;
}

.contato-section {
  background: #f4f6f8;
  padding: 80px 20px;
  text-align: center;
}
.contato-section .section-title {
  font-size: 2.2rem;
  margin-bottom: 1.5rem;
  color: #2c3e50;
}

.form-contato {
  max-width: 600px;
  margin: 0 auto;
  text-align: left;
  display: grid;
  gap: 1.5rem;
  padding: 2rem;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}

.campo {
  position: relative;
}
.campo label {
  display: block;
  margin-bottom: 8px;
  color: #2c3e50;
  font-weight: 600;
}
.campo input,
.campo textarea {
  width: 100%;
  padding: 14px 18px;
  border: 1px solid #d1d9e6;
  border-radius: 8px;
  font-size: 1rem;
  background: #f9faff;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.campo input:focus,
.campo textarea:focus {
  border-color: #0056b3;
  box-shadow: 0 0 0 3px rgba(0,86,179,0.15);
  outline: none;
}

.campo input::placeholder,
.campo textarea::placeholder {
  color: #a0aec0;
  font-style: italic;
}

.btn-enviar {
  padding: 14px 32px;
  font-size: 1.05rem;
  color: #fff;
  background: #0056b3;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  justify-self: end;
  transition: background 0.3s ease, transform 0.2s ease;
  box-shadow: 0 4px 10px rgba(0,86,179,0.3);
}
.btn-enviar:hover {
  background: #003f8a;
  transform: translateY(-2px);
}

@media (max-width: 600px) {
  .form-contato {
    padding: 1.5rem;
  }
  .btn-enviar {
    width: 100%;
    justify-self: center;
  }
}

.localizacao {
  background: #f4f4f4;
  padding: 60px 20px;
  text-align: center;
}

.localizacao .section-title {
  font-size: 1.8rem;
  color: #333;
  margin-bottom: 10px;
}

.localizacao p {
  font-size: 1rem;
  color: #555;
  margin-bottom: 30px;
}

.mapa-container {
  width: 100%;
  max-width: 1000px;
  margin: 0 auto;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.15);
}



  </style>
</head>
<body>

<header>
  <h1>Oficina Auto Portugal</h1>
  <p>Confiança e Qualidade no Seu Carro</p>
  <nav>
    <a href="#servicos">Serviços</a>
    <a href="#sobre">Sobre</a>
    <a href="#galeria">Galeria</a>
    <a href="#depoimentos">Clientes</a>
    <a href="#contacto">Contato</a>
  </nav>
</header>

<section class="hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)),
  url('https://www.megautos.com/wp-content/uploads/2019/02/ferrari-f8-tributo-frente-1024x669.jpg') center center / cover no-repeat;
  color: #fff; text-align: center; padding: 6rem 2rem;">

  <div style="max-width: 900px; margin: 0 auto;">
    <h2 style="font-size: 2.8rem; margin-bottom: 1rem;">Seu carro nas mãos certas</h2>
    <p style="font-size: 1.3rem; margin-bottom: 2rem;">Agende sua revisão, manutenção ou diagnóstico com nossa equipa especializada</p>

    <!-- Botões com responsividade -->
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
      <a href="#contacto" style="background: #ffd700; color: #000; padding: 0.9rem 1.6rem; border-radius: 5px; text-decoration: none; font-weight: bold;">
        <i class="fas fa-envelope"></i> Fale Conosco
      </a>
      <a href="#servicos" style="background: #333; color: #fff; padding: 0.9rem 1.6rem; border-radius: 5px; text-decoration: none; font-weight: bold;">
        <i class="fas fa-wrench"></i> Ver Serviços
      </a>
    </div>
  </div>

</section>



<main>
  <h3 class="section-title" id="servicos">Serviços Oferecidos</h3>

  <div class="servicos-grid">
    <div class="servico" onclick="abrirModal('oleo')">
      <i class="fas fa-oil-can"></i>
      <h4>Troca de Óleo</h4>
      <p>Lubrificantes de alta performance e filtros novos.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
    <div class="servico" onclick="abrirModal('alinhamento')">
      <i class="fas fa-sliders-h"></i>
      <h4>Alinhamento</h4>
      <p>Precisão digital para direção segura.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
    <div class="servico" onclick="abrirModal('freios')">
      <i class="fas fa-car-crash"></i>
      <h4>Freios</h4>
      <p>Substituição e revisão de discos e pastilhas.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
    <div class="servico" onclick="abrirModal('revisao')">
      <i class="fas fa-cogs"></i>
      <h4>Revisão Geral</h4>
      <p>Check-up completo com 30 itens avaliados.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
    <div class="servico" onclick="abrirModal('ar')">
      <i class="fas fa-wind"></i>
      <h4>Ar Condicionado</h4>
      <p>Higienização e recarga de gás.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
    <div class="servico" onclick="abrirModal('eletrica')">
      <i class="fas fa-bolt"></i>
      <h4>Elétrica</h4>
      <p>Correções em sistema de luzes e bateria.</p>
      <span class="indicador">Clique para ver mais informações</span>
    </div>
  </div>

  <!-- Modal -->
  <div id="modalServico" class="modal-servico" onclick="fecharModal(event)">
    <div class="modal-content" onclick="event.stopPropagation()">
      <span class="fechar" onclick="fecharModal()">&times;</span>
      <h3 id="modalTitulo"></h3>
      <p id="modalDescricao"></p>
      <p id="modalPreco" style="font-weight: bold; color: #2c3e50;"></p>
    </div>
  </div>
</main>

<style>
  main {
    padding: 4rem 2rem;
    background: #f8f9fa;
  }

  .section-title {
    font-size: 2.2rem;
    text-align: center;
    margin-bottom: 2rem;
    color: #333;
    font-weight: 600;
  }

  .servicos-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }

  .servico {
    background: #fff;
    padding: 2rem 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
  }

  .servico:hover {
    transform: translateY(-8px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  }

  .servico i {
    font-size: 2.8rem;
    color: #ffc107;
    margin-bottom: 1rem;
  }

  .servico h4 {
    font-size: 1.25rem;
    color: #222;
    margin-bottom: 0.6rem;
  }

  .servico p {
    font-size: 0.95rem;
    color: #555;
    min-height: 48px;
  }

  .indicador {
    display: block;
    margin-top: 1rem;
    font-size: 0.85rem;
    color: #666;
    font-style: italic;
  }

  .modal-servico {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    padding: 2rem;
  }

  .modal-content {
    background: #fff;
    padding: 2rem;
    max-width: 500px;
    margin: 5% auto;
    border-radius: 12px;
    position: relative;
    text-align: left;
  }

  .modal-content h3 {
    margin-top: 0;
    color: #333;
  }

  .modal-content p {
    margin-bottom: 1rem;
    color: #444;
  }

  .fechar {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 1.5rem;
    color: #999;
    cursor: pointer;
  }

  .fechar:hover {
    color: #000;
  }

  @media (max-width: 500px) {
    .servico {
      padding: 1.2rem 1rem;
    }

    .servico i {
      font-size: 2.2rem;
    }

    .servico h4 {
      font-size: 1.1rem;
    }
  }
</style>

<script>
  function abrirModal(servico) {
    const dados = {
      oleo: {
        titulo: "Troca de Óleo",
        descricao: "Inclui lubrificante de alta performance, filtro novo e verificação de nível.",
        preco: "A partir de € 49"
      },
      alinhamento: {
        titulo: "Alinhamento",
        descricao: "Alinhamento computadorizado com precisão digital em todas as rodas.",
        preco: "A partir de € 35"
      },
      freios: {
        titulo: "Freios",
        descricao: "Revisão completa dos freios: pastilhas, discos, fluido e pinças.",
        preco: "A partir de € 59"
      },
      revisao: {
        titulo: "Revisão Geral",
        descricao: "Check-up com mais de 30 itens, incluindo motor, freios, suspensão e eletrônica.",
        preco: "Pacote completo por € 129"
      },
      ar: {
        titulo: "Ar Condicionado",
        descricao: "Higienização interna e recarga de gás com verificação de vazamentos.",
        preco: "A partir de € 45"
      },
      eletrica: {
        titulo: "Elétrica Automotiva",
        descricao: "Diagnóstico e reparo em bateria, alternador, iluminação, sensores e chicotes.",
        preco: "Valor sob consulta"
      }
    };

    document.getElementById('modalTitulo').innerText = dados[servico].titulo;
    document.getElementById('modalDescricao').innerText = dados[servico].descricao;
    document.getElementById('modalPreco').innerText = dados[servico].preco;
    document.getElementById('modalServico').style.display = 'block';
  }

  function fecharModal(event) {
    if (!event || event.target.id === 'modalServico') {
      document.getElementById('modalServico').style.display = 'none';
    }
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') fecharModal();
  });
</script>


 <section id="sobre" class="sobre-oficina">
  <div class="container">
    <h3 class="section-title">🚗 Quem Somos</h3>
    <div class="sobre-bloco">
      <div class="texto-principal">
        <p><strong>Auto Portugal</strong> é mais do que uma oficina — somos um centro de confiança automotiva onde tecnologia, precisão e cuidado se encontram.</p>
        <p>Com mais de <strong>10 anos de experiência</strong>, nossa equipa técnica é altamente qualificada, com certificações nacionais e internacionais, pronta para atender desde manutenções simples até diagnósticos avançados.</p>
      </div>

      <div class="diferenciais">
        <div class="destaque">
          <i class="fas fa-shield-alt"></i>
          <h4>Garantia e Confiança</h4>
          <p>Todos os serviços com até <strong>6 meses de garantia</strong>, peças originais e transparência total.</p>
        </div>
        <div class="destaque">
          <i class="fas fa-user-check"></i>
          <h4>Atendimento Personalizado</h4>
          <p>Receba orientação clara e atendimento humanizado do orçamento à entrega do veículo.</p>
        </div>
        <div class="destaque">
          <i class="fas fa-tools"></i>
          <h4>Estrutura de Ponta</h4>
          <p>Ambiente moderno com tecnologia de diagnóstico e manutenção para qualquer tipo de carro.</p>
        </div>
      </div>

      <div class="chamada-final">
        <p><em>Confiança não se compra, se conquista. E é isso que entregamos: resultado, clareza e cuidado em cada serviço prestado.</em></p>
      </div>
    </div>
  </div>
</section>


  <section class="transformacoes" id="galeria">
  <h3 class="section-title">🔧 Transformações que Inspiram</h3>
  <p class="subtitulo-galeria">
    Cada carro tem alma. A gente revela o melhor dela com técnica, história e paixão.
  </p>

  <div class="galeria-transformacao">
    <div class="card-transformacao" data-aos="zoom-in-up">
      <div class="fundo" style="background-image: url('https://www.omeuclassico.pt/wp-content/uploads/2022/05/Oficinas-de-Restauro.jpg');"></div>
      <div class="info">
        <h4>Restauração Completa</h4>
        <p>Carro clássico com peças originais, pintura artesanal e alma nova. Um verdadeiro renascimento.</p>
      </div>
    </div>

    <div class="card-transformacao" data-aos="zoom-in-up" data-aos-delay="150">
      <div class="fundo" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCrVQiyRR8VK1YpBNKP17BSxJE64ycVCjoUg&s');"></div>
      <div class="info">
        <h4>Estética Premium</h4>
        <p>Vitrificação de vidros, polimento técnico e proteção cerâmica. Resultado: brilho eterno.</p>
      </div>
    </div>

    <div class="card-transformacao" data-aos="zoom-in-up" data-aos-delay="300">
      <div class="fundo" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK6cPLucmemHb2OfxDxpp61sEsYHAb-2-GcQ&s');"></div>
      <div class="info">
        <h4>Reparo Estrutural</h4>
        <p>Alinhamento 3D de precisão e solda especializada. Estabilidade com visual de fábrica.</p>
      </div>
    </div>
  </div>
</section>

<style>
  .transformacoes {
    padding: 5rem 2rem;
    background: linear-gradient(to bottom, #f8f9fb, #edf0f5);
    text-align: center;
    font-family: 'Poppins', sans-serif;
  }

  .section-title {
    font-size: 2.5rem;
    color:rgb(11, 11, 11);
    margin-bottom: 0.5rem;
    font-weight: 700;
    letter-spacing: -0.5px;
  }

  .subtitulo-galeria {
    font-size: 1.15rem;
    color: #555;
    max-width: 720px;
    margin: 0 auto 3rem;
    font-style: italic;
    line-height: 1.6;
  }

  .galeria-transformacao {
    display: flex;
    flex-wrap: wrap;
    gap: 2.5rem;
    justify-content: center;
  }

  .card-transformacao {
    width: 330px;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.4s ease;
    transform: perspective(800px) rotateX(0deg);
  }

  .card-transformacao:hover {
    transform: perspective(800px) rotateX(3deg) translateY(-5px);
    box-shadow: 0 16px 40px rgba(0,0,0,0.15);
  }

  .card-transformacao .fundo {
    height: 200px;
    background-size: cover;
    background-position: center;
    filter: brightness(0.88);
    transition: filter 0.3s ease;
  }

  .card-transformacao:hover .fundo {
    filter: brightness(1);
  }

  .card-transformacao .info {
    padding: 1.5rem;
    text-align: left;
  }

  .card-transformacao h4 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
  }

  .card-transformacao p {
    font-size: 0.97rem;
    color: #555;
    line-height: 1.5;
  }

  @media (max-width: 500px) {
    .card-transformacao {
      width: 100%;
    }
    .card-transformacao .info {
      text-align: center;
    }
  }
</style>


  <section id="depoimentos" class="depoimentos-section">
  <h3 class="section-title">✨ O que dizem nossos clientes</h3>

  <div class="depoimentos-slider">
    <div class="card-depoimento">
      <p class="comentario">
        <i class="fas fa-quote-left"></i>
        Atendimento impecável, profissionais honestos e transparência do início ao fim. Recomendo de olhos fechados!
        <i class="fas fa-quote-right"></i>
      </p>
      <div class="cliente">
        <strong>João M.</strong> <span>Cliente desde 2021</span>
      </div>
    </div>

    <div class="card-depoimento">
      <p class="comentario">
        <i class="fas fa-quote-left"></i>
        Levei minha frota para revisão e fiquei impressionada com a agilidade e seriedade. Voltarei com certeza!
        <i class="fas fa-quote-right"></i>
      </p>
      <div class="cliente">
        <strong>Fátima L.</strong> <span>Gestora de Frotas</span>
      </div>
    </div>

    <div class="card-depoimento">
      <p class="comentario">
        <i class="fas fa-quote-left"></i>
        A oficina mais organizada e honesta que conheci. Explicam tudo com clareza. Meu carro está em boas mãos.
        <i class="fas fa-quote-right"></i>
      </p>
      <div class="cliente">
        <strong>Bruno S.</strong> <span>Cliente recorrente</span>
      </div>
    </div>
  </div>
</section>

<style>
  .depoimentos-section {
    background: #f7f9fc;
    padding: 4rem 2rem;
    text-align: center;
  }

  .section-title {
    font-size: 2.4rem;
    margin-bottom: 2rem;
    color:rgb(31, 32, 34);
  }

  .depoimentos-slider {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
    max-width: 1100px;
    margin: 0 auto;
  }

  .card-depoimento {
    background: #fff;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 18px rgba(0,0,0,0.06);
    transition: transform 0.3s ease;
    position: relative;
  }

  .card-depoimento:hover {
    transform: translateY(-6px);
  }

  .comentario {
    font-size: 1.05rem;
    font-style: italic;
    color: #444;
    line-height: 1.6;
    position: relative;
    margin-bottom: 1.2rem;
  }

  .comentario i {
    color: #ffd700;
    font-size: 1rem;
    margin: 0 5px;
  }

  .cliente {
    font-size: 0.9rem;
    color: #666;
  }

  .cliente strong {
    display: block;
    color:rgb(33, 35, 36);
    font-size: 1rem;
  }

  @media (max-width: 500px) {
    .comentario {
      font-size: 0.95rem;
    }
    .section-title {
      font-size: 1.8rem;
    }
  }
</style>

<!-- Font Awesome (caso não esteja incluso) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-MdObLppkKsE0YdbQKn2f93e9U4oz6F1M8U3+7LtrjFOi+6W7AqNzYQKx5sUvK/KT4Ls/Y6rSJKy3MBwZ2XZ3Fg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



 <section id="contacto" class="contato-section">
  <h3 class="section-title">📬 Fale Connosco</h3>
  <?= $msg ?>

  <form method="post" action="#contacto" class="form-contato">
    <div class="campo">
      <label for="nome"><i class="fas fa-user"></i> Nome completo</label>
      <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome ?? '') ?>" placeholder="Digite seu nome..." required>
    </div>

    <div class="campo">
      <label for="email"><i class="fas fa-envelope"></i> E-mail</label>
      <input type="email" name="email" id="email" value="<?= htmlspecialchars($email ?? '') ?>" placeholder="Seu melhor e-mail..." required>
    </div>

    <div class="campo">
      <label for="mensagem"><i class="fas fa-comment-dots"></i> Mensagem</label>
      <textarea name="mensagem" id="mensagem" placeholder="Como podemos ajudar?" required><?= htmlspecialchars($mensagem ?? '') ?></textarea>
    </div>

    <button type="submit" name="enviar" class="btn-enviar">
      <i class="fas fa-paper-plane"></i> Enviar Mensagem
    </button>
  </form>
</section>

<section class="localizacao" id="localizacao">
  <h3 class="section-title">📍 Nossa Localização</h3>
  <p>Estamos em uma área de fácil acesso. Venha nos visitar!</p>
  <div class="mapa-container">
    <iframe
      title="Mapa da Oficina Auto Portugal"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3110.3029440677133!2d-9.139336784653507!3d38.72225297959654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19331d6f6e2441%3A0x6bc3d8a9d94e470f!2sLisboa%2C%20Portugal!5e0!3m2!1spt-PT!2spt!4v1680000000000"
      width="100%"
      height="400"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>

</main>

<footer class="footer">
  <div class="footer-container">
    <div class="footer-col">
      <h4>Oficina Auto Portugal</h4>
      <p>Atendimento personalizado e excelência em mecânica desde 2010.</p>
      <p><i class="fas fa-map-marker-alt"></i> Rua das Oficinas, 123 - Lisboa</p>
      <p><i class="fas fa-phone-alt"></i> +351 912 345 678</p>
      <p><i class="fas fa-envelope"></i> atendimento@autoportugal.pt</p>
    </div>

    <div class="footer-col">
      <h4>Redes Sociais</h4>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Peça seu Orçamento</h4>
      <form action="#contacto" method="post" class="footer-form">
        <input type="text" name="nome" placeholder="Seu nome" required>
        <input type="email" name="email" placeholder="Seu e-mail" required>
        <button type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
      </form>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; <?= date('Y') ?> Oficina Auto Portugal · Todos os direitos reservados</p>
    <p class="assinatura">Desenvolvido por <strong>Alex oliveira</strong> 🚀</p>
  </div>
</footer>


</body>
</html>
