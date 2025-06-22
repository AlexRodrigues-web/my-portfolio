<?php
// consultor_coach.php
$msg_enviado = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['send_msg'])) {
    $nome = isset($_POST['nome']) ? strip_tags(trim($_POST['nome'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : '';
    $mensagem = isset($_POST['mensagem']) ? strip_tags(trim($_POST['mensagem'])) : '';

    if (!$nome || !$email || !$mensagem) {
        $msg_enviado = "<p class='error'>Por favor, preencha todos os campos corretamente.</p>";
    } else {
        $log = date('Y-m-d H:i:s') . " | $nome <$email> | $mensagem\n";
        file_put_contents(__DIR__ . "/mensagens.txt", $log, FILE_APPEND);
        $msg_enviado = "<p class='success'>Mensagem enviada com sucesso! Obrigado pelo contato.</p>";
        $nome = $email = $mensagem = "";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Consultoria com Propósito – Transformação com Clareza</title>
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }
    body {
      background: #fdfdfd;
      color: #222;
      line-height: 1.7;
      scroll-behavior: smooth;
    }
    a {
      color: #1e88e5;
      text-decoration: none;
    }
    .container {
      width: 90%;
      max-width: 960px;
      margin: auto;
      padding: 40px 0;
    }
    
    .intro {
      background: linear-gradient(to right, #f5f7fa, #c3cfe2);
      padding: 60px 20px;
      text-align: center;
    }
    .intro h2 {
      font-size: 1.9rem;
      margin-bottom: 20px;
    }
    .intro p {
      font-size: 1.2rem;
      color: #444;
      max-width: 680px;
      margin: auto;
    }
    .sessao {
      padding: 50px 20px;
    }
    .sessao h2 {
      font-size: 1.8rem;
      color: #1e88e5;
      margin-bottom: 20px;
    }
    .linha-tempo {
      display: flex;
      flex-direction: column;
      gap: 16px;
      margin-top: 20px;
    }
    .linha-tempo span {
      background: #e3f2fd;
      padding: 12px 16px;
      border-left: 5px solid #1e88e5;
    }
    .caminhos {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      margin-top: 20px;
    }
    .caminhos button {
      flex: 1 1 250px;
      padding: 18px;
      background: #1e88e5;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .caminhos button:hover {
      background: #1565c0;
    }
    .bloco-caminho {
      margin-top: 30px;
      padding: 20px;
      background: #f5f5f5;
      border-left: 4px solid #1e88e5;
      display: none;
    }
    .ativo {
      display: block !important;
    }
    .nao-contrate {
      background: #fff3cd;
      padding: 30px 20px;
      border-left: 5px solid #ffc107;
      margin-top: 30px;
    }
    .nao-contrate ul {
      list-style: none;
      padding-left: 0;
    }
    .nao-contrate li {
      margin: 10px 0;
    }
    .sabedoria {
      margin-top: 40px;
      font-style: italic;
      background: #f0f4f8;
      padding: 20px;
      border-left: 5px solid #90caf9;
    }
 

    .formulario {
      padding: 40px 20px;
      background: #e3f2fd;
      border-radius: 8px;
      margin-top: 40px;
    }
    .formulario h3 {
      margin-bottom: 10px;
    }
    .formulario textarea,
    .formulario input {
      width: 100%;
      margin-bottom: 16px;
      padding: 12px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    .formulario button {
      background: #1e88e5;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 6px;
      cursor: pointer;
    }
    .success, .error {
      text-align: center;
      margin-top: 10px;
      font-weight: bold;
    }
    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>

 <header>
  <div class="container">
    <div class="logo">
      <a href="/">
        <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/5094225-de-design-de-logotipo-de-coaching-de-vida-simples-vetor.jpg" 
             alt="Logo Consultoria" />
      </a>
    </div>

    <button class="menu-toggle" aria-label="Abrir Menu">&#9776;</button>

    <nav class="menu">
      <a href="#sobre">Sobre</a>
      <a href="#caminhos">Caminhos</a>
      <a href="#nao-me-contrate">Não me contrate se</a>
      <a href="#transformacoes">Transformações</a>
      <a href="#contato">Contato</a>
    </nav>
  </div>
</header>

<style>
  header {
    background: linear-gradient(to bottom, rgb(26, 51, 78), rgb(94, 122, 154));
    padding: 20px 0;
    border-bottom: 1px solid #d0e2f2;
    box-shadow: 0 4px 10px rgba(0, 80, 180, 0.06);
    width: 100%;
  }

  .container {
    max-width: 1200px;
    margin: auto;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .logo img {
    height: 60px;
    border-radius: 10px;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  }

  .logo img:hover {
    transform: scale(1.04);
  }

  .menu {
    display: flex;
    gap: 18px;
    align-items: center;
    flex-wrap: wrap;
  }

  .menu a {
    font-size: 1rem;
    font-weight: 600;
    color: #09294c;
    text-decoration: none;
    padding: 10px 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
  }

  .menu a:hover {
    background: #e3f2fd;
    border: 1px solid #bbdefb;
    color: #0d47a1;
  }

  .menu-toggle {
    display: none;
    font-size: 28px;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
  }

  @media (max-width: 768px) {
    .menu-toggle {
      display: block;
    }

    .menu {
      width: 100%;
      flex-direction: column;
      display: none;
      margin-top: 1rem;
    }

    .menu.show {
      display: flex;
    }

    .menu a {
      width: 100%;
      text-align: center;
      padding: 12px;
    }

    .container {
      flex-direction: column;
      align-items: flex-start;
    }

    .logo {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
  }

   body {
      font-family: "Segoe UI", sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      line-height: 1.6;
    }

    section.container {
      max-width: 960px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .sessao h2 {
      font-size: 1.8rem;
      margin-bottom: 16px;
      color: #1e88e5;
    }

    .intro {
      background: #f1f8ff;
      text-align: center;
      padding: 60px 20px;
    }

    .intro h2 {
      font-size: 2rem;
      margin-bottom: 12px;
      color: #0d47a1;
    }

    .caminhos button {
      margin: 8px;
      padding: 10px 20px;
      border: none;
      background-color: #1e88e5;
      color: white;
      border-radius: 6px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .caminhos button:hover {
      background-color: #0d47a1;
    }

    .bloco-caminho {
      display: none;
      background: #e3f2fd;
      margin-top: 16px;
      padding: 16px;
      border-radius: 6px;
    }

    .nao-contrate ul {
      list-style: none;
      padding-left: 0;
    }

    .nao-contrate li {
      margin-bottom: 10px;
    }

    .sabedoria {
      text-align: center;
      background: #f0f4f8;
      padding: 40px 20px;
      border-left: 4px solid #1565c0;
    }

    .formulario {
      background: #f8f9fa;
      padding: 40px 20px;
      border-radius: 10px;
    }

    .formulario input,
    .formulario textarea {
      display: block;
      width: 100%;
      margin-bottom: 16px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    .formulario button {
      background-color: #1e88e5;
      color: #fff;
      border: none;
      padding: 12px 24px;
      font-size: 1rem;
      border-radius: 6px;
      cursor: pointer;
    }

    .formulario button:hover {
      background-color: #0d47a1;
    }

</style>

<script>
  // Toggle responsivo para o menu mobile
  document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.querySelector(".menu-toggle");
    const menu = document.querySelector(".menu");

    toggle.addEventListener("click", () => {
      menu.classList.toggle("show");
    });
  });
</script>


   
  </style>

  <section class="intro">
    <h2>Você está cansado de se sentir travado, mesmo sabendo que pode mais?</h2>
    <p>Tem dias em que parece que seu potencial foi colocado no mudo?<br />
      Bem-vindo ao lugar onde a sua voz volta a ter força.</p>
  </section>

  <section id="sobre" class="container sessao sobre-coach">
  <div class="conteudo-sobre">
    <div class="texto-sobre">
      <h2>Quem sou – pela sua perspectiva</h2>
      <p>
        Eu não sou só coach. Sou o tradutor entre o que você sente e o que você pode ser.<br />
        Pessoas me procuram quando a carreira vira rotina, quando o negócio vira peso ou quando a vida vira ruído.<br />
        Meu trabalho? Limpar o canal entre você e seu propósito — com método, verdade e presença.
      </p>
      <div class="linha-tempo">
        <span>🔹 2014 – Deixei uma carreira sólida em empresa para seguir meu propósito</span><br>
        <span>🔹 2016 – Formado pelo Instituto XYZ com foco em coaching de transição</span><br>
        <span>🔹 2018 – Ajudei +300 pessoas a destravar decisões profissionais</span><br>
        <span>🔹 2023 – Criei o ciclo “Clareza Essencial”, meu processo exclusivo</span>
      </div>
    </div>

    <div class="foto-coach">
      <img src="https://us.123rf.com/450wm/feedough/feedough1909/feedough190900546/129431444-black-and-white-portrait-of-a-sexy-young-man-in-tuxedo-standing-with-hands-crossed.jpg" alt="Foto do Coach" />
    </div>
  </div>
</section>

<style>
  .sobre-coach {
    padding: 5rem 2rem;
    background: #f9f9fb;
    color: #2c3e50;
  }

  .conteudo-sobre {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
  }

  .texto-sobre {
    flex: 1 1 500px;
  }

  .texto-sobre h2 {
    font-size: 2rem;
    margin-bottom: 1rem;
    font-family: 'Segoe UI', sans-serif;
  }

  .texto-sobre p {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #444;
    margin-bottom: 1.5rem;
  }

  .linha-tempo {
    font-size: 1rem;
    color: #333;
    background: #fff;
    padding: 1rem;
    border-left: 4px solid #1e88e5;
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
  }

  .foto-coach {
    flex: 1 1 320px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .foto-coach img {
    width: 100%;
    max-width: 320px;
    aspect-ratio: 3/4;
    object-fit: cover;
    border-radius: 50% / 40%;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
  }

  .foto-coach img:hover {
    transform: scale(1.02);
  }

  @media (max-width: 768px) {
    .conteudo-sobre {
      flex-direction: column-reverse;
      text-align: center;
    }

    .texto-sobre,
    .foto-coach {
      flex: 1 1 100%;
    }

    .linha-tempo {
      text-align: left;
    }
  }
</style>


  <section id="caminhos" class="container sessao">
    <h2>Escolha seu caminho</h2>
    <div class="caminhos">
      <button onclick="mostrarCaminho('carreira')">Quero clareza na carreira</button>
      <button onclick="mostrarCaminho('negocio')">Quero crescer com meu negócio</button>
      <button onclick="mostrarCaminho('sentir')">Quero me sentir inteiro</button>
      <button onclick="mostrarCaminho('naosei')">Quero mudar, mas não sei o quê</button>
    </div>

    <div id="carreira" class="bloco-caminho">
      <strong>Você sente que está no lugar errado, mesmo “dando certo”?<br></strong>
      Aqui, você vai reencontrar o fio condutor da sua vocação.
    </div>
    <div id="negocio" class="bloco-caminho">
      <strong>Seu negócio nasceu com propósito, mas agora pesa?<br></strong>
      Juntos, vamos reorganizar com sentido, leveza e clareza.
    </div>
    <div id="sentir" class="bloco-caminho">
      <strong>Você está cansado de viver no modo automático?<br></strong>
      Vamos criar espaço para você voltar a se escutar.
    </div>
    <div id="naosei" class="bloco-caminho">
      <strong>Você sente que algo precisa mudar, mas não consegue nomear?<br></strong>
      Eu escuto sem pressa. Às vezes, a resposta está no silêncio certo.
    </div>
  </section>

  <section id="nao-me-contrate" class="container sessao nao-contrate">
    <h2>Não me contrate se...</h2>
    <ul>
      <li>❌ Você quer fórmulas prontas</li>
      <li>❌ Espera que alguém mude você</li>
      <li>❌ Busca resultado sem enfrentar verdades</li>
      <li>✅ Mas se você busca clareza brutal com acolhimento, vem comigo</li>
    </ul>
  </section>

  <section id="transformacoes" class="container sessao">
    <h2>Vozes reais, transformações reais</h2>
    <p><em>"Antes: Eu travava em reuniões. Sentia que sempre era pequena.<br>
        Depois: Assumi um novo cargo e aprendi a confiar em mim."<br>
        <strong>— Maria, 37, Gerente de Projetos – SP</strong></em></p>
    <p><em>"Um ciclo de 21 dias me fez perceber que o problema não era falta de tempo. Era falta de direção."<br>
        <strong>— Rafael, 42, empreendedor</strong></em></p>
  </section>

  <section class="container sabedoria">
    <p><strong>“Você não está perdido. Só está longe de si mesmo.”</strong></p>
    <p>Reflexões, frases, provocações reais — direto do campo da escuta e da presença.</p>
  </section>

  <section id="contato" class="formulario-contato">
  <div class="container">
    <h3>✨ Sentiu algo? Me escreva.</h3>
    <p>Seja uma dúvida, uma história ou um “estou pronto”. Meu trabalho começa com a escuta.</p>

    <button class="abrir-modal-contato">📬 Abrir canais de contato</button>
  </div>
</section>

<!-- MODAL COM DIFERENTES CONTATOS -->
<div id="modalContato" class="modal-contato">
  <div class="modal-content">
    <span class="fechar-modal">&times;</span>
    <h3>Para onde deseja direcionar sua mensagem?</h3>
    <div class="abas-contato">
      <button class="aba ativa" data-target="emocional">🧠 Terapia Emocional</button>
      <button class="aba" data-target="mentoria">💼 Mentoria Profissional</button>
      <button class="aba" data-target="espiritualidade">🌌 Espiritualidade</button>
    </div>
    <div class="conteudo-contato" id="emocional">
      <p>Compartilhe suas emoções, desafios ou inquietações. Estou aqui com escuta e empatia.</p>
      <a href="mailto:terapia@seudominio.com" class="btn-contato">Enviar e-mail para Terapia</a>
    </div>
    <div class="conteudo-contato" id="mentoria" style="display:none;">
      <p>Vamos falar sobre seus passos, direção profissional e propósito de carreira.</p>
      <a href="mailto:mentoria@seudominio.com" class="btn-contato">Enviar e-mail para Mentoria</a>
    </div>
    <div class="conteudo-contato" id="espiritualidade" style="display:none;">
      <p>Para questões internas, intuições ou caminhos espirituais, minha escuta é sem julgamentos.</p>
      <a href="https://wa.me/351912345678" class="btn-contato" target="_blank">Conversar via WhatsApp</a>
    </div>
  </div>
</div>


<style>
.formulario-contato {
  padding: 5rem 1rem;
  background: linear-gradient(to bottom right, #f3f4f8, #ffffff);
  color: #2c3e50;
  text-align: center;
}

.formulario-contato h3 {
  font-size: 2rem;
  margin-bottom: 0.5rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.formulario-contato p {
  font-size: 1.1rem;
  margin-bottom: 2rem;
  color: #555;
}

.abrir-modal-contato {
  background: #0d47a1;
  color: white;
  padding: 1rem 2rem;
  font-size: 1rem;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s;
  font-weight: bold;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
.abrir-modal-contato:hover {
  background: #1565c0;
}

/* MODAL */
.modal-contato {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}
.modal-content {
  background: #fff;
  margin: 10vh auto;
  padding: 2rem;
  border-radius: 14px;
  max-width: 600px;
  position: relative;
  animation: fadeIn 0.3s ease;
  text-align: center;
}
.fechar-modal {
  position: absolute;
  top: 12px; right: 16px;
  font-size: 1.5rem;
  cursor: pointer;
  color: #888;
}
.abas-contato {
  display: flex;
  justify-content: space-around;
  margin: 1.5rem 0;
  flex-wrap: wrap;
  gap: 0.5rem;
}
.aba {
  background: #e0e0e0;
  border: none;
  padding: 0.7rem 1.2rem;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.2s ease;
}
.aba.ativa {
  background: #0d47a1;
  color: white;
}
.conteudo-contato {
  display: block;
}
.btn-contato {
  margin-top: 1rem;
  display: inline-block;
  background: #43a047;
  color: white;
  padding: 0.9rem 1.6rem;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s;
}
.btn-contato:hover {
  background: #2e7d32;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(-10px);}
  to {opacity: 1; transform: translateY(0);}
}

@media (max-width: 600px) {
  .abas-contato {
    flex-direction: column;
    align-items: stretch;
  }
}
</style>

<script>
document.querySelector('.abrir-modal-contato').addEventListener('click', function () {
  document.getElementById('modalContato').style.display = 'block';
});
document.querySelector('.fechar-modal').addEventListener('click', function () {
  document.getElementById('modalContato').style.display = 'none';
});
window.addEventListener('click', function (e) {
  if (e.target.id === 'modalContato') {
    document.getElementById('modalContato').style.display = 'none';
  }
});
document.querySelectorAll('.aba').forEach(function (btn) {
  btn.addEventListener('click', function () {
    document.querySelectorAll('.aba').forEach(el => el.classList.remove('ativa'));
    btn.classList.add('ativa');

    const alvo = btn.dataset.target;
    document.querySelectorAll('.conteudo-contato').forEach(el => el.style.display = 'none');
    document.getElementById(alvo).style.display = 'block';
  });
});
</script>



<footer style="background: linear-gradient(135deg, rgb(26, 51, 78) 0%, rgb(94, 122, 154) 50%, rgb(111, 141, 168) 100%); color: #eee; padding: 40px 20px 20px; font-family: sans-serif;">
  <div class="footer-container" style="max-width: 1200px; margin: auto;">

    <!-- Logo no centro -->
    <div class="footer-logo" style="text-align: center; margin-bottom: 24px;">
      <img src="https://static.vecteezy.com/ti/vetor-gratis/p1/5094225-de-design-de-logotipo-de-coaching-de-vida-simples-vetor.jpg"
           alt="Logomarca Coaching" style="height: 72px; border-radius: 10px; box-shadow: 0 2px 6px rgba(255,255,255,0.05);">
    </div>

    <div class="footer-top" style="text-align: center; margin-bottom: 30px;">
      <h4 style="font-size: 24px; margin: 0; color:rgb(9, 66, 113);">Life Coaching</h4>
      <p style="font-size: 16px; margin-top: 5px; color:rgb(8, 41, 57);">Consultoria com Propósito</p>
    </div>

    <div class="footer-social" style="text-align: center; margin-bottom: 24px;">
      <a href="#" title="Instagram" style="margin: 0 10px; color: #eee; text-decoration: none; font-size: 20px;">📸</a>
      <a href="#" title="LinkedIn" style="margin: 0 10px; color: #eee; text-decoration: none; font-size: 20px;">🔗</a>
      <a href="#" title="YouTube" style="margin: 0 10px; color: #eee; text-decoration: none; font-size: 20px;">▶️</a>
      <a href="#" title="WhatsApp" style="margin: 0 10px; color: #eee; text-decoration: none; font-size: 20px;">💬</a>
    </div>

    <div class="footer-bottom" style="text-align: center; font-size: 14px; color:rgb(3, 37, 51);">
      <p style="margin: 5px 0;">&copy; <?=date('Y')?> Todos os direitos reservados</p>
      <p style="font-style: italic; margin: 5px 0;">“Transformar vidas começa com uma conversa honesta.”</p>
      <p style="margin-top: 10px; color: #90a4ae;">Desenvolvido com 💡 por <strong>Alex Oliveira</strong></p>
    </div>

  </div>
</footer>



<script>
function mostrarCaminho(id) {
  const blocos = document.querySelectorAll('.bloco-caminho');
  blocos.forEach(b => b.classList.remove('ativo'));
  document.getElementById(id).classList.add('ativo');
}
</script>

</body>
</html>
