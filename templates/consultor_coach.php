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
      <nav>
        <a href="#sobre">Sobre</a>
        <a href="#transformacoes">Transformações</a>
        <a href="#caminhos">Caminhos</a>
        <a href="#nao-me-contrate">Não me contrate se</a>
        <a href="#contato">Contato</a>
      </nav>
    </div>
  </header>

  <style>
    header {
      background: linear-gradient(to bottom, rgb(26, 51, 78) 0%, rgb(94, 122, 154) 50%, rgb(111, 141, 168) 100%);
      padding: 28px 0;
      border-bottom: 1px solid #d0e2f2;
      box-shadow: 0 4px 10px rgba(0, 80, 180, 0.06);
      position: sticky;
      top: 0;
      z-index: 999;
    }

    header .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 32px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    header .logo img {
      height: 72px;
      max-height: 80px;
      border-radius: 10px;
      transition: transform 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    header .logo img:hover {
      transform: scale(1.04);
    }

    header nav {
      display: flex;
      gap: 18px;
      flex-wrap: wrap;
      align-items: center;
    }

    header nav a {
      font-size: 1.05rem;
      font-weight: 600;
      color:rgb(9, 41, 76);
      text-decoration: none;
      padding: 10px 18px;
      border-radius: 8px;
      transition: all 0.3s ease;
      background: transparent;
      border: 1px solid transparent;
    }

    header nav a:hover {
      background: #e3f2fd;
      border-color: #bbdefb;
      color: #0d47a1;
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

  <section class="intro">
    <h2>Você está cansado de se sentir travado, mesmo sabendo que pode mais?</h2>
    <p>Tem dias em que parece que seu potencial foi colocado no mudo?<br />
      Bem-vindo ao lugar onde a sua voz volta a ter força.</p>
  </section>

  <section id="sobre" class="container sessao">
    <h2>Quem sou – pela sua perspectiva</h2>
    <p>Eu não sou só coach. Sou o tradutor entre o que você sente e o que você pode ser.<br />
      Pessoas me procuram quando a carreira vira rotina, quando o negócio vira peso ou quando a vida vira ruído.<br />
      Meu trabalho? Limpar o canal entre você e seu propósito — com método, verdade e presença.</p>

    <div class="linha-tempo">
      <span>🔹 2014 – Deixei uma carreira sólida em empresa para seguir meu propósito</span><br>
      <span>🔹 2016 – Formado pelo Instituto XYZ com foco em coaching de transição</span><br>
      <span>🔹 2018 – Ajudei +300 pessoas a destravar decisões profissionais</span><br>
      <span>🔹 2023 – Criei o ciclo “Clareza Essencial”, meu processo exclusivo</span>
    </div>
  </section>

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

  <section id="contato" class="container formulario">
    <h3>Sentiu algo? Me escreva.</h3>
    <p>Pode ser uma dúvida, uma história, ou só um “estou pronto”. Meu trabalho começa na escuta.</p>
    <?php if ($msg_enviado) echo $msg_enviado; ?>
    <form method="POST" action="#contato">
      <input type="text" name="nome" placeholder="Seu nome" required value="<?=htmlspecialchars($nome ?? '')?>" />
      <input type="email" name="email" placeholder="Seu e-mail" required value="<?=htmlspecialchars($email ?? '')?>" />
      <textarea name="mensagem" placeholder="O que você quer compartilhar?" required><?=htmlspecialchars($mensagem ?? '')?></textarea>
      <button type="submit" name="send_msg">Enviar</button>
    </form>
  </section>

  <script>
    function mostrarCaminho(id) {
      document.querySelectorAll('.bloco-caminho').forEach(div => {
        div.style.display = 'none';
      });
      const el = document.getElementById(id);
      if (el) el.style.display = 'block';
    }
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
