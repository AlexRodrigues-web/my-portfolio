<?php
// consultor_coach.php
session_start();

$msg_texto = "";
$msg_tipo = "";

$nome = "";
$email = "";
$mensagem = "";
$area = "Diagnóstico inicial";

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function novo_token_csrf() {
    try {
        return bin2hex(random_bytes(32));
    } catch (Exception $e) {
        return sha1(uniqid('', true));
    }
}

function limpar_linha($value) {
    return trim(preg_replace('/\s+/', ' ', strip_tags((string)$value)));
}

function limpar_mensagem($value) {
    return trim(strip_tags((string)$value));
}

function tamanho_texto($value) {
    return function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = novo_token_csrf();
}

$areas_permitidas = [
    "Diagnóstico inicial",
    "Clareza na carreira",
    "Crescimento do negócio",
    "Vida emocional",
    "Transição de vida",
    "Ainda não sei"
];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['send_msg'])) {
    $csrf_post = $_POST['csrf_token'] ?? '';

    $nome = limpar_linha($_POST['nome'] ?? '');
    $email_raw = trim($_POST['email'] ?? '');
    $email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);
    $mensagem = limpar_mensagem($_POST['mensagem'] ?? '');
    $area = limpar_linha($_POST['area'] ?? 'Diagnóstico inicial');

    if (!in_array($area, $areas_permitidas, true)) {
        $area = "Diagnóstico inicial";
    }

    if (!hash_equals($_SESSION['csrf_token'], $csrf_post)) {
        $msg_tipo = "error";
        $msg_texto = "Não foi possível validar o envio. Atualize a página e tente novamente.";
    } elseif (tamanho_texto($nome) < 2 || !$email || tamanho_texto($mensagem) < 10) {
        $msg_tipo = "error";
        $msg_texto = "Preencha nome, e-mail válido e uma mensagem com pelo menos 10 caracteres.";
    } else {
        $registro = [
            "data" => date('c'),
            "nome" => $nome,
            "email" => $email,
            "area" => $area,
            "mensagem" => preg_replace('/\R+/', ' ', $mensagem),
            "ip" => $_SERVER['REMOTE_ADDR'] ?? ''
        ];

        file_put_contents(
            __DIR__ . "/mensagens.txt",
            json_encode($registro, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );

        $msg_tipo = "success";
        $msg_texto = "Mensagem enviada com sucesso. Obrigado pelo contato!";
        $nome = "";
        $email = "";
        $mensagem = "";
        $area = "Diagnóstico inicial";
        $_SESSION['csrf_token'] = novo_token_csrf();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Clareza.Coach — Coaching de Alta Clareza</title>
  <meta name="description" content="Coaching humano, estratégico e visual para carreira, negócios e transformação pessoal." />

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800&display=swap');

    :root {
      --dark: #101814;
      --dark-2: #15241d;
      --green: #315c4d;
      --green-2: #8faf9b;
      --gold: #d6a84f;
      --gold-2: #f2d58b;
      --cream: #f7f1e8;
      --paper: #fffaf2;
      --white: #ffffff;
      --muted: #6d766f;
      --text: #17211d;
      --line: rgba(23, 33, 29, .12);

      --radius-xl: 34px;
      --radius-lg: 26px;
      --radius-md: 18px;

      --shadow-soft: 0 22px 70px rgba(16, 24, 20, .12);
      --shadow-dark: 0 30px 90px rgba(16, 24, 20, .38);

      --container: 1180px;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: var(--text);
      background:
        radial-gradient(circle at 10% 5%, rgba(214, 168, 79, .24), transparent 26%),
        radial-gradient(circle at 80% 12%, rgba(49, 92, 77, .22), transparent 30%),
        linear-gradient(180deg, #fbf6ee 0%, #ffffff 42%, #f8f1e7 100%);
      line-height: 1.65;
      overflow-x: hidden;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      pointer-events: none;
      z-index: -2;
      background-image:
        linear-gradient(rgba(49, 92, 77, .055) 1px, transparent 1px),
        linear-gradient(90deg, rgba(49, 92, 77, .055) 1px, transparent 1px);
      background-size: 54px 54px;
      mask-image: linear-gradient(to bottom, rgba(0,0,0,.7), transparent 72%);
    }

    img {
      max-width: 100%;
      display: block;
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    button,
    input,
    textarea,
    select {
      font: inherit;
    }

    .wrap {
      width: min(100% - 32px, var(--container));
      margin-inline: auto;
    }

    .scroll-progress {
      position: fixed;
      top: 0;
      left: 0;
      height: 4px;
      width: 0%;
      z-index: 99999;
      background: linear-gradient(90deg, var(--gold), var(--green-2), var(--green));
      box-shadow: 0 0 18px rgba(214, 168, 79, .65);
    }

    .cursor-glow {
      position: fixed;
      width: 360px;
      height: 360px;
      left: 0;
      top: 0;
      border-radius: 999px;
      background: radial-gradient(circle, rgba(214, 168, 79, .20), transparent 68%);
      transform: translate(-50%, -50%);
      pointer-events: none;
      z-index: -1;
      opacity: .75;
      transition: opacity .3s ease;
    }

    .site-header {
      position: fixed;
      top: 16px;
      left: 0;
      right: 0;
      z-index: 1000;
      transition: .35s ease;
    }

    .site-header.scrolled {
      top: 8px;
    }

    .nav-shell {
      width: min(100% - 32px, var(--container));
      margin-inline: auto;
      min-height: 76px;
      padding: 10px 12px 10px 18px;
      border: 1px solid rgba(255, 255, 255, .52);
      background: rgba(255, 250, 242, .68);
      backdrop-filter: blur(22px);
      border-radius: 999px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 18px;
      box-shadow: 0 18px 48px rgba(16, 24, 20, .10);
      transition: .35s ease;
    }

    .site-header.scrolled .nav-shell {
      min-height: 66px;
      background: rgba(255, 250, 242, .88);
      box-shadow: 0 14px 40px rgba(16, 24, 20, .13);
    }

    .brand {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-weight: 900;
      letter-spacing: -.04em;
      white-space: nowrap;
    }

    .brand-mark {
      width: 48px;
      height: 48px;
      border-radius: 18px;
      display: grid;
      place-items: center;
      color: #fff;
      background:
        radial-gradient(circle at 70% 20%, var(--gold), transparent 34%),
        linear-gradient(135deg, var(--dark), var(--green));
      box-shadow: 0 16px 35px rgba(49, 92, 77, .32);
      animation: breathe 3.2s ease-in-out infinite;
    }

    @keyframes breathe {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.055); }
    }

    .brand small {
      display: block;
      color: var(--muted);
      font-size: .72rem;
      letter-spacing: .02em;
      font-weight: 800;
      margin-top: -4px;
    }

    .nav-menu {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .nav-menu a {
      padding: 10px 13px;
      border-radius: 999px;
      color: rgba(23, 33, 29, .75);
      font-size: .92rem;
      font-weight: 800;
      transition: .22s ease;
    }

    .nav-menu a:hover {
      color: var(--dark);
      background: rgba(49, 92, 77, .10);
      transform: translateY(-1px);
    }

    .nav-menu .nav-cta {
      background: var(--dark);
      color: #fff;
      box-shadow: 0 12px 26px rgba(16, 24, 20, .20);
    }

    .nav-menu .nav-cta:hover {
      background: var(--green);
      color: #fff;
    }

    .menu-toggle {
      display: none;
      border: none;
      background: var(--dark);
      color: #fff;
      width: 48px;
      height: 48px;
      border-radius: 18px;
      cursor: pointer;
    }

    .menu-toggle span {
      width: 20px;
      height: 2px;
      display: block;
      margin: 5px auto;
      border-radius: 999px;
      background: currentColor;
    }

    .hero {
      position: relative;
      min-height: 100vh;
      padding: 154px 0 80px;
      overflow: hidden;
    }

    .hero-bg-word {
      position: absolute;
      left: 50%;
      top: 18%;
      transform: translateX(-50%);
      font-size: clamp(6rem, 18vw, 18rem);
      line-height: 1;
      font-weight: 900;
      letter-spacing: -.12em;
      color: rgba(49, 92, 77, .045);
      white-space: nowrap;
      pointer-events: none;
      z-index: -1;
    }

    .blob {
      position: absolute;
      border-radius: 999px;
      filter: blur(12px);
      opacity: .8;
      pointer-events: none;
      z-index: -1;
      animation: blobMove 9s ease-in-out infinite;
    }

    .blob-1 {
      width: 320px;
      height: 320px;
      background: rgba(214, 168, 79, .25);
      right: -80px;
      top: 120px;
    }

    .blob-2 {
      width: 260px;
      height: 260px;
      background: rgba(49, 92, 77, .20);
      left: -70px;
      bottom: 80px;
      animation-delay: -3s;
    }

    .blob-3 {
      width: 180px;
      height: 180px;
      background: rgba(143, 175, 155, .30);
      right: 36%;
      bottom: 10%;
      animation-delay: -5s;
    }

    @keyframes blobMove {
      0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
      35% { transform: translate3d(28px, -30px, 0) scale(1.08); }
      70% { transform: translate3d(-20px, 26px, 0) scale(.96); }
    }

    .hero-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.02fr) minmax(360px, .98fr);
      gap: 54px;
      align-items: center;
    }

    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 13px;
      border-radius: 999px;
      border: 1px solid rgba(49, 92, 77, .14);
      background: rgba(255, 255, 255, .56);
      color: var(--green);
      font-size: .82rem;
      font-weight: 900;
      box-shadow: 0 12px 26px rgba(16, 24, 20, .05);
      margin-bottom: 18px;
    }

    .hero h1 {
      font-family: "Playfair Display", serif;
      font-size: clamp(3.4rem, 7.5vw, 7.6rem);
      line-height: .88;
      letter-spacing: -.07em;
      max-width: 760px;
    }

    .hero h1 span {
      display: inline-block;
      color: transparent;
      background: linear-gradient(110deg, var(--green), var(--gold), var(--green));
      background-size: 240% 100%;
      -webkit-background-clip: text;
      background-clip: text;
      animation: textShine 5s ease-in-out infinite;
    }

    @keyframes textShine {
      0%, 100% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
    }

    .hero-lead {
      color: var(--muted);
      font-size: clamp(1.06rem, 1.9vw, 1.28rem);
      max-width: 650px;
      margin: 28px 0 30px;
    }

    .hero-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      align-items: center;
    }

    .btn {
      position: relative;
      overflow: hidden;
      min-height: 54px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 0 24px;
      border: 0;
      border-radius: 999px;
      font-weight: 900;
      cursor: pointer;
      transition: transform .23s ease, box-shadow .23s ease, background .23s ease;
    }

    .btn::after {
      content: "";
      position: absolute;
      inset: 0;
      transform: translateX(-120%);
      background: linear-gradient(90deg, transparent, rgba(255,255,255,.34), transparent);
      transition: transform .55s ease;
    }

    .btn:hover::after {
      transform: translateX(120%);
    }

    .btn:hover {
      transform: translateY(-3px);
    }

    .btn:active {
      transform: scale(.98);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--dark), var(--green));
      color: #fff;
      box-shadow: 0 18px 38px rgba(49, 92, 77, .32);
    }

    .btn-secondary {
      background: rgba(255, 255, 255, .72);
      color: var(--dark);
      border: 1px solid rgba(49, 92, 77, .13);
      box-shadow: 0 14px 30px rgba(16, 24, 20, .08);
    }

    .hero-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 34px;
    }

    .hero-badges span {
      padding: 10px 12px;
      border-radius: 999px;
      background: rgba(255, 255, 255, .58);
      border: 1px solid rgba(23, 33, 29, .08);
      color: var(--muted);
      font-size: .88rem;
      font-weight: 800;
    }

    .hero-visual {
      position: relative;
      min-height: 680px;
    }

    .photo-frame {
      position: absolute;
      right: 0;
      top: 0;
      width: min(100%, 470px);
      height: 620px;
      border-radius: 46px;
      overflow: hidden;
      background: var(--dark);
      box-shadow: var(--shadow-dark);
      transform: rotate(2deg);
      isolation: isolate;
    }

    .photo-frame::before {
      content: "";
      position: absolute;
      inset: 0;
      background:
        linear-gradient(to top, rgba(16, 24, 20, .72), transparent 52%),
        radial-gradient(circle at 78% 20%, rgba(214, 168, 79, .26), transparent 28%);
      z-index: 2;
    }

    .photo-frame img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1.05);
      animation: imageBreath 8s ease-in-out infinite;
    }

    @keyframes imageBreath {
      0%, 100% { transform: scale(1.05); }
      50% { transform: scale(1.11); }
    }

    .photo-caption {
      position: absolute;
      left: 26px;
      bottom: 26px;
      right: 26px;
      z-index: 3;
      color: #fff;
    }

    .photo-caption strong {
      font-family: "Playfair Display", serif;
      display: block;
      font-size: 2.1rem;
      line-height: 1;
      letter-spacing: -.04em;
    }

    .photo-caption span {
      color: rgba(255,255,255,.72);
      font-weight: 700;
    }

    .float-card {
      position: absolute;
      z-index: 4;
      border-radius: 26px;
      padding: 18px;
      background: rgba(255, 255, 255, .82);
      border: 1px solid rgba(255, 255, 255, .72);
      backdrop-filter: blur(18px);
      box-shadow: 0 22px 50px rgba(16, 24, 20, .18);
      animation: floatCard 5.6s ease-in-out infinite;
    }

    @keyframes floatCard {
      0%, 100% { transform: translateY(0) rotate(0); }
      50% { transform: translateY(-14px) rotate(-1deg); }
    }

    .card-session {
      width: 240px;
      left: 0;
      top: 90px;
    }

    .card-session strong,
    .card-progress strong,
    .card-energy strong {
      display: block;
      font-size: 1.05rem;
      color: var(--dark);
      margin-bottom: 6px;
    }

    .card-session span,
    .card-progress span,
    .card-energy span {
      color: var(--muted);
      font-weight: 700;
      font-size: .9rem;
    }

    .mini-avatars {
      display: flex;
      margin-top: 14px;
    }

    .mini-avatars i {
      width: 34px;
      height: 34px;
      border-radius: 999px;
      border: 3px solid #fff;
      margin-left: -8px;
      background: linear-gradient(135deg, var(--green-2), var(--gold));
    }

    .mini-avatars i:first-child {
      margin-left: 0;
    }

    .card-progress {
      width: 260px;
      right: 10px;
      bottom: 42px;
      animation-delay: -2s;
    }

    .progress-line {
      height: 10px;
      margin-top: 14px;
      border-radius: 999px;
      background: rgba(49, 92, 77, .12);
      overflow: hidden;
    }

    .progress-line i {
      display: block;
      width: 76%;
      height: 100%;
      border-radius: inherit;
      background: linear-gradient(90deg, var(--green), var(--gold));
      animation: progressPulse 2.8s ease-in-out infinite;
    }

    @keyframes progressPulse {
      0%, 100% { width: 62%; }
      50% { width: 82%; }
    }

    .card-energy {
      width: 205px;
      left: 14px;
      bottom: 128px;
      animation-delay: -4s;
    }

    .energy-bars {
      display: flex;
      gap: 7px;
      align-items: end;
      height: 56px;
      margin-top: 12px;
    }

    .energy-bars i {
      flex: 1;
      border-radius: 999px 999px 6px 6px;
      background: linear-gradient(to top, var(--green), var(--gold));
      animation: barDance 1.4s ease-in-out infinite;
    }

    .energy-bars i:nth-child(1) { height: 42%; animation-delay: 0s; }
    .energy-bars i:nth-child(2) { height: 68%; animation-delay: .2s; }
    .energy-bars i:nth-child(3) { height: 52%; animation-delay: .4s; }
    .energy-bars i:nth-child(4) { height: 84%; animation-delay: .6s; }
    .energy-bars i:nth-child(5) { height: 62%; animation-delay: .8s; }

    @keyframes barDance {
      0%, 100% { transform: scaleY(.9); opacity: .75; }
      50% { transform: scaleY(1.08); opacity: 1; }
    }

    .section {
      padding: 94px 0;
      position: relative;
    }

    .section-head {
      max-width: 780px;
      margin-bottom: 36px;
    }

    .section-head.center {
      text-align: center;
      margin-inline: auto;
    }

    .section h2 {
      font-family: "Playfair Display", serif;
      font-size: clamp(2.5rem, 5vw, 5.1rem);
      line-height: .96;
      letter-spacing: -.06em;
    }

    .section-lead {
      color: var(--muted);
      font-size: 1.08rem;
      margin-top: 16px;
    }

    .stats {
      transform: translateY(-40px);
      position: relative;
      z-index: 5;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 14px;
    }

    .stat-card {
      min-height: 150px;
      padding: 24px;
      border-radius: 30px;
      background: rgba(255, 255, 255, .72);
      border: 1px solid rgba(255, 255, 255, .8);
      backdrop-filter: blur(18px);
      box-shadow: 0 20px 48px rgba(16, 24, 20, .10);
      transition: .25s ease;
    }

    .stat-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 26px 70px rgba(16, 24, 20, .14);
    }

    .stat-card strong {
      font-family: "Playfair Display", serif;
      font-size: 3.1rem;
      line-height: 1;
      color: var(--green);
      letter-spacing: -.06em;
    }

    .stat-card span {
      display: block;
      margin-top: 8px;
      color: var(--muted);
      font-weight: 800;
    }

    .diagnostic-box {
      display: grid;
      grid-template-columns: 1fr .9fr;
      gap: 24px;
      padding: clamp(20px, 4vw, 36px);
      border-radius: 42px;
      background:
        linear-gradient(145deg, rgba(255,255,255,.76), rgba(255,250,242,.72));
      border: 1px solid rgba(255,255,255,.72);
      box-shadow: var(--shadow-soft);
      overflow: hidden;
      position: relative;
    }

    .diagnostic-box::before {
      content: "";
      position: absolute;
      width: 340px;
      height: 340px;
      right: -120px;
      top: -100px;
      border-radius: 999px;
      background: rgba(214, 168, 79, .18);
      filter: blur(4px);
    }

    .diagnostic-options {
      display: grid;
      gap: 13px;
      position: relative;
      z-index: 2;
    }

    .diag-option {
      text-align: left;
      border: 1px solid rgba(49,92,77,.14);
      background: rgba(255,255,255,.72);
      border-radius: 24px;
      padding: 18px;
      cursor: pointer;
      transition: .25s ease;
    }

    .diag-option strong {
      display: block;
      font-size: 1.05rem;
      color: var(--dark);
      margin-bottom: 4px;
    }

    .diag-option span {
      color: var(--muted);
      font-size: .94rem;
      font-weight: 650;
    }

    .diag-option:hover,
    .diag-option.active {
      background: linear-gradient(135deg, var(--dark), var(--green));
      color: #fff;
      transform: translateX(8px);
      box-shadow: 0 18px 36px rgba(49, 92, 77, .24);
    }

    .diag-option:hover strong,
    .diag-option:hover span,
    .diag-option.active strong,
    .diag-option.active span {
      color: #fff;
    }

    .diag-result {
      min-height: 420px;
      padding: 30px;
      border-radius: 34px;
      background:
        linear-gradient(to top, rgba(16,24,20,.78), rgba(16,24,20,.18)),
        url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=900&q=80') center/cover;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      box-shadow: var(--shadow-dark);
      position: relative;
      overflow: hidden;
      z-index: 2;
    }

    .diag-result::before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 20% 10%, rgba(214,168,79,.34), transparent 32%);
      animation: glowSweep 5s ease-in-out infinite;
    }

    @keyframes glowSweep {
      0%, 100% { opacity: .6; transform: translateX(0); }
      50% { opacity: 1; transform: translateX(20px); }
    }

    .diag-result > * {
      position: relative;
      z-index: 2;
    }

    .diag-result small {
      display: inline-flex;
      width: fit-content;
      padding: 7px 11px;
      border-radius: 999px;
      background: rgba(255,255,255,.15);
      backdrop-filter: blur(10px);
      color: rgba(255,255,255,.82);
      font-weight: 900;
      margin-bottom: 14px;
    }

    .diag-result h3 {
      font-family: "Playfair Display", serif;
      font-size: 2.5rem;
      line-height: .96;
      letter-spacing: -.05em;
      margin-bottom: 14px;
    }

    .diag-result p {
      color: rgba(255,255,255,.80);
      font-weight: 650;
    }

    .about-grid {
      display: grid;
      grid-template-columns: .95fr 1.05fr;
      gap: 34px;
      align-items: center;
    }

    .about-photo-stack {
      position: relative;
      min-height: 640px;
    }

    .about-main-photo {
      position: absolute;
      inset: 0 auto auto 0;
      width: 78%;
      height: 560px;
      border-radius: 46px;
      overflow: hidden;
      box-shadow: var(--shadow-dark);
      transform: rotate(-2deg);
    }

    .about-main-photo::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(16,24,20,.55), transparent 55%);
    }

    .about-main-photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .about-small-photo {
      position: absolute;
      right: 0;
      bottom: 20px;
      width: 48%;
      height: 300px;
      border-radius: 34px;
      overflow: hidden;
      border: 8px solid #fbf6ee;
      box-shadow: 0 24px 60px rgba(16,24,20,.22);
      transform: rotate(4deg);
    }

    .about-small-photo img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .about-signature {
      position: absolute;
      left: 28px;
      bottom: 70px;
      z-index: 2;
      max-width: 300px;
      padding: 18px;
      border-radius: 24px;
      background: rgba(255,255,255,.78);
      backdrop-filter: blur(14px);
      box-shadow: 0 20px 44px rgba(16,24,20,.16);
      animation: floatCard 5s ease-in-out infinite;
    }

    .about-signature strong {
      display: block;
      color: var(--dark);
    }

    .about-signature span {
      color: var(--muted);
      font-weight: 700;
      font-size: .9rem;
    }

    .about-content {
      padding: clamp(24px, 4vw, 42px);
      border-radius: 42px;
      background: rgba(255,255,255,.70);
      border: 1px solid rgba(255,255,255,.8);
      box-shadow: var(--shadow-soft);
    }

    .timeline {
      display: grid;
      gap: 13px;
      margin-top: 28px;
    }

    .timeline-item {
      display: grid;
      grid-template-columns: 84px 1fr;
      gap: 16px;
      padding: 16px;
      border-radius: 22px;
      background: rgba(49, 92, 77, .07);
      border: 1px solid rgba(49, 92, 77, .10);
      transition: .22s ease;
    }

    .timeline-item:hover {
      transform: translateX(8px);
      background: rgba(214, 168, 79, .13);
    }

    .timeline-item strong {
      color: var(--green);
      font-weight: 900;
    }

    .method-scene {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
    }

    .method-card {
      position: relative;
      min-height: 330px;
      padding: 24px;
      border-radius: 34px;
      overflow: hidden;
      color: #fff;
      background: var(--dark);
      box-shadow: var(--shadow-soft);
      transition: .28s ease;
      isolation: isolate;
    }

    .method-card:hover {
      transform: translateY(-10px) scale(1.015);
      box-shadow: var(--shadow-dark);
    }

    .method-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(16,24,20,.88), rgba(16,24,20,.18));
      z-index: -1;
    }

    .method-card::after {
      content: "";
      position: absolute;
      inset: 0;
      background: var(--bg-image) center/cover;
      z-index: -2;
      transform: scale(1.04);
      transition: transform .5s ease;
    }

    .method-card:hover::after {
      transform: scale(1.14);
    }

    .method-number {
      width: 46px;
      height: 46px;
      border-radius: 16px;
      display: grid;
      place-items: center;
      background: rgba(255,255,255,.15);
      backdrop-filter: blur(10px);
      font-weight: 900;
      margin-bottom: 130px;
    }

    .method-card h3 {
      font-family: "Playfair Display", serif;
      font-size: 2rem;
      line-height: .96;
      margin-bottom: 10px;
    }

    .method-card p {
      color: rgba(255,255,255,.78);
      font-weight: 650;
      font-size: .95rem;
    }

    .platform {
      overflow: hidden;
    }

    .platform-shell {
      display: grid;
      grid-template-columns: .88fr 1.12fr;
      gap: 30px;
      align-items: center;
      padding: clamp(22px, 4vw, 40px);
      border-radius: 46px;
      background:
        radial-gradient(circle at 88% 10%, rgba(214,168,79,.24), transparent 28%),
        linear-gradient(135deg, var(--dark), var(--green));
      color: #fff;
      box-shadow: var(--shadow-dark);
      position: relative;
    }

    .platform-shell::before {
      content: "";
      position: absolute;
      inset: 18px;
      border: 1px solid rgba(255,255,255,.10);
      border-radius: 36px;
      pointer-events: none;
    }

    .platform-copy {
      position: relative;
      z-index: 2;
    }

    .platform-copy .eyebrow {
      background: rgba(255,255,255,.10);
      border-color: rgba(255,255,255,.14);
      color: rgba(255,255,255,.82);
    }

    .platform-copy h2 {
      color: #fff;
    }

    .platform-copy p {
      color: rgba(255,255,255,.72);
    }

    .feature-list {
      display: grid;
      gap: 12px;
      margin-top: 24px;
    }

    .feature-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      color: rgba(255,255,255,.78);
      font-weight: 700;
    }

    .feature-item i {
      width: 30px;
      height: 30px;
      flex: 0 0 auto;
      border-radius: 12px;
      display: grid;
      place-items: center;
      background: rgba(214,168,79,.22);
      color: var(--gold-2);
      font-style: normal;
      font-weight: 900;
    }

    .dashboard-visual {
      position: relative;
      min-height: 540px;
      z-index: 2;
    }

    .dash-window {
      position: absolute;
      right: 0;
      top: 20px;
      width: min(100%, 610px);
      padding: 18px;
      border-radius: 34px;
      background: rgba(255,255,255,.12);
      border: 1px solid rgba(255,255,255,.14);
      backdrop-filter: blur(20px);
      box-shadow: 0 26px 80px rgba(0,0,0,.28);
      transform: rotate(-2deg);
    }

    .dash-top {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 6px 6px 18px;
      color: rgba(255,255,255,.72);
      font-weight: 900;
    }

    .dash-dots {
      display: flex;
      gap: 7px;
    }

    .dash-dots i {
      width: 11px;
      height: 11px;
      border-radius: 999px;
      background: rgba(255,255,255,.26);
    }

    .dash-grid {
      display: grid;
      grid-template-columns: 1.1fr .9fr;
      gap: 12px;
    }

    .dash-card {
      padding: 16px;
      min-height: 140px;
      border-radius: 24px;
      background: rgba(255,255,255,.10);
      border: 1px solid rgba(255,255,255,.10);
    }

    .dash-card.large {
      min-height: 285px;
    }

    .dash-card small {
      color: rgba(255,255,255,.58);
      font-weight: 900;
    }

    .dash-card h3 {
      font-size: 1.2rem;
      line-height: 1.12;
      margin-top: 8px;
    }

    .ring {
      width: 126px;
      height: 126px;
      margin: 28px auto 0;
      border-radius: 999px;
      display: grid;
      place-items: center;
      background: conic-gradient(var(--gold) 0 76%, rgba(255,255,255,.14) 76% 100%);
      position: relative;
      animation: ringSpin 4.8s ease-in-out infinite;
    }

    @keyframes ringSpin {
      0%, 100% { filter: brightness(1); }
      50% { filter: brightness(1.22); }
    }

    .ring::before {
      content: "";
      position: absolute;
      inset: 13px;
      border-radius: inherit;
      background: #20372d;
    }

    .ring strong {
      position: relative;
      z-index: 2;
      font-size: 1.7rem;
    }

    .dash-list {
      display: grid;
      gap: 9px;
      margin-top: 14px;
    }

    .dash-list span {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      padding: 10px;
      border-radius: 14px;
      background: rgba(255,255,255,.08);
      color: rgba(255,255,255,.76);
      font-size: .9rem;
      font-weight: 700;
    }

    .phone-card {
      position: absolute;
      left: 0;
      bottom: 26px;
      width: 250px;
      min-height: 410px;
      padding: 16px;
      border-radius: 34px;
      background: #fff;
      color: var(--text);
      box-shadow: var(--shadow-dark);
      transform: rotate(5deg);
      animation: floatCard 5.8s ease-in-out infinite;
    }

    .phone-screen {
      border-radius: 26px;
      min-height: 378px;
      padding: 18px;
      background:
        radial-gradient(circle at 80% 10%, rgba(214,168,79,.28), transparent 30%),
        linear-gradient(180deg, #fbf6ee, #ffffff);
    }

    .phone-screen strong {
      font-family: "Playfair Display", serif;
      display: block;
      font-size: 1.8rem;
      line-height: 1;
      margin-bottom: 12px;
    }

    .mood-row {
      display: flex;
      gap: 8px;
      margin: 18px 0;
    }

    .mood-row button {
      width: 43px;
      height: 43px;
      border: 0;
      border-radius: 14px;
      background: rgba(49,92,77,.08);
      cursor: pointer;
      transition: .22s ease;
    }

    .mood-row button:hover {
      transform: translateY(-4px);
      background: rgba(214,168,79,.22);
    }

    .phone-task {
      margin-top: 12px;
      padding: 12px;
      border-radius: 18px;
      background: rgba(49,92,77,.08);
      color: var(--muted);
      font-weight: 750;
      font-size: .9rem;
    }

    .paths-grid {
      display: grid;
      grid-template-columns: .9fr 1.1fr;
      gap: 24px;
      align-items: start;
    }

    .path-buttons {
      display: grid;
      gap: 12px;
    }

    .path-btn {
      padding: 20px;
      text-align: left;
      border: 1px solid rgba(49,92,77,.12);
      border-radius: 26px;
      background: rgba(255,255,255,.70);
      cursor: pointer;
      box-shadow: 0 16px 34px rgba(16,24,20,.06);
      transition: .24s ease;
    }

    .path-btn strong {
      display: block;
      font-size: 1.05rem;
      color: var(--dark);
    }

    .path-btn span {
      color: var(--muted);
      font-weight: 650;
      font-size: .94rem;
    }

    .path-btn:hover,
    .path-btn.active {
      transform: translateX(8px);
      background: linear-gradient(135deg, var(--dark), var(--green));
      color: #fff;
      box-shadow: 0 22px 50px rgba(49, 92, 77, .22);
    }

    .path-btn:hover strong,
    .path-btn:hover span,
    .path-btn.active strong,
    .path-btn.active span {
      color: #fff;
    }

    .path-panel {
      display: none;
      min-height: 520px;
      border-radius: 42px;
      overflow: hidden;
      position: relative;
      color: #fff;
      padding: 34px;
      box-shadow: var(--shadow-dark);
      isolation: isolate;
    }

    .path-panel.active {
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      animation: fadeUp .4s ease both;
    }

    .path-panel::before {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(16,24,20,.88), rgba(16,24,20,.20));
      z-index: -1;
    }

    .path-panel::after {
      content: "";
      position: absolute;
      inset: 0;
      background: var(--path-image) center/cover;
      z-index: -2;
      transform: scale(1.06);
      animation: imageBreath 8s ease-in-out infinite;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(16px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .path-panel h3 {
      font-family: "Playfair Display", serif;
      font-size: clamp(2.4rem, 4.5vw, 4.2rem);
      line-height: .92;
      letter-spacing: -.06em;
      max-width: 620px;
      margin-bottom: 16px;
    }

    .path-panel p {
      color: rgba(255,255,255,.78);
      font-size: 1.05rem;
      font-weight: 650;
      max-width: 620px;
    }

    .path-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 9px;
      margin-top: 22px;
    }

    .path-tags span {
      padding: 9px 11px;
      border-radius: 999px;
      background: rgba(255,255,255,.14);
      color: rgba(255,255,255,.82);
      font-size: .86rem;
      font-weight: 900;
      backdrop-filter: blur(10px);
    }

    .warning {
      padding: 0;
    }

    .warning-shell {
      padding: clamp(24px, 4vw, 46px);
      border-radius: 46px;
      background:
        radial-gradient(circle at 85% 20%, rgba(214,168,79,.32), transparent 28%),
        linear-gradient(135deg, #fff5d8, #ffffff);
      border: 1px solid rgba(214,168,79,.35);
      box-shadow: var(--shadow-soft);
      display: grid;
      grid-template-columns: .85fr 1.15fr;
      gap: 26px;
      align-items: start;
    }

    .warning-list {
      display: grid;
      gap: 12px;
    }

    .warning-list li {
      list-style: none;
      padding: 17px;
      border-radius: 22px;
      background: rgba(255,255,255,.64);
      border: 1px solid rgba(214,168,79,.22);
      font-weight: 850;
      transition: .22s ease;
    }

    .warning-list li:hover {
      transform: translateX(8px);
      background: rgba(214,168,79,.16);
    }

    .testimonials-wrap {
      position: relative;
      padding: clamp(22px, 4vw, 34px);
      border-radius: 46px;
      background:
        linear-gradient(135deg, rgba(255,255,255,.72), rgba(255,250,242,.68));
      border: 1px solid rgba(255,255,255,.8);
      box-shadow: var(--shadow-soft);
      overflow: hidden;
    }

    .testimonial-slider {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 24px;
      align-items: center;
    }

    .testimonial-image {
      min-height: 460px;
      border-radius: 34px;
      overflow: hidden;
      box-shadow: var(--shadow-dark);
      position: relative;
    }

    .testimonial-image::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(16,24,20,.58), transparent 50%);
    }

    .testimonial-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .testimonial-card {
      display: none;
      padding: 10px;
    }

    .testimonial-card.active {
      display: block;
      animation: fadeUp .35s ease both;
    }

    .testimonial-card p {
      font-family: "Playfair Display", serif;
      font-size: clamp(2rem, 4vw, 3.8rem);
      line-height: .98;
      letter-spacing: -.05em;
      margin-bottom: 22px;
    }

    .testimonial-card strong {
      display: block;
      color: var(--green);
      font-size: 1.1rem;
      margin-bottom: 4px;
    }

    .testimonial-card span {
      color: var(--muted);
      font-weight: 750;
    }

    .slider-controls {
      display: flex;
      gap: 10px;
      margin-top: 28px;
    }

    .slider-controls button {
      width: 48px;
      height: 48px;
      border: 0;
      border-radius: 18px;
      background: var(--dark);
      color: #fff;
      cursor: pointer;
      font-size: 1.2rem;
      transition: .22s ease;
    }

    .slider-controls button:hover {
      transform: translateY(-3px);
      background: var(--green);
    }

    .quote {
      text-align: center;
      padding: 90px 0;
    }

    .quote-box {
      max-width: 940px;
      margin-inline: auto;
      padding: clamp(34px, 7vw, 72px);
      border-radius: 48px;
      color: #fff;
      background:
        radial-gradient(circle at 20% 0%, rgba(214,168,79,.34), transparent 34%),
        linear-gradient(135deg, var(--dark), var(--green));
      box-shadow: var(--shadow-dark);
      position: relative;
      overflow: hidden;
    }

    .quote-box::before {
      content: "“";
      position: absolute;
      left: 28px;
      top: -60px;
      font-family: Georgia, serif;
      font-size: 16rem;
      color: rgba(255,255,255,.075);
    }

    .quote-box h2 {
      color: #fff;
      position: relative;
      z-index: 2;
    }

    .quote-box p {
      color: rgba(255,255,255,.72);
      margin-top: 16px;
      font-weight: 650;
      position: relative;
      z-index: 2;
    }

    .contact-grid {
      display: grid;
      grid-template-columns: .85fr 1.15fr;
      gap: 24px;
      align-items: start;
    }

    .contact-card,
    .contact-form {
      padding: clamp(24px, 4vw, 36px);
      border-radius: 42px;
      background: rgba(255,255,255,.74);
      border: 1px solid rgba(255,255,255,.8);
      box-shadow: var(--shadow-soft);
    }

    .contact-card {
      min-height: 520px;
      color: #fff;
      background:
        linear-gradient(to top, rgba(16,24,20,.82), rgba(16,24,20,.24)),
        url('https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=80') center/cover;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      overflow: hidden;
    }

    .contact-card h3,
    .contact-form h3 {
      font-family: "Playfair Display", serif;
      font-size: 2.7rem;
      line-height: .96;
      letter-spacing: -.05em;
      margin-bottom: 14px;
    }

    .contact-card p {
      color: rgba(255,255,255,.76);
      font-weight: 650;
      margin-bottom: 22px;
    }

    .contact-links {
      display: grid;
      gap: 10px;
    }

    .contact-links a {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      padding: 14px;
      border-radius: 18px;
      background: rgba(255,255,255,.14);
      color: rgba(255,255,255,.86);
      backdrop-filter: blur(12px);
      font-weight: 850;
      transition: .22s ease;
    }

    .contact-links a:hover {
      transform: translateX(8px);
      background: rgba(214,168,79,.24);
      color: #fff;
    }

    .form-alert {
      margin-bottom: 18px;
      padding: 14px 16px;
      border-radius: 18px;
      font-weight: 900;
    }

    .form-alert.success {
      color: #166534;
      background: rgba(22, 101, 52, .10);
      border: 1px solid rgba(22, 101, 52, .20);
    }

    .form-alert.error {
      color: #9f3412;
      background: rgba(159, 52, 18, .10);
      border: 1px solid rgba(159, 52, 18, .20);
    }

    .form-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
    }

    .field {
      display: grid;
      gap: 7px;
      margin-bottom: 14px;
    }

    .field.full {
      grid-column: 1 / -1;
    }

    label {
      color: var(--dark);
      font-size: .88rem;
      font-weight: 900;
    }

    input,
    select,
    textarea {
      width: 100%;
      border: 1px solid rgba(49,92,77,.14);
      border-radius: 18px;
      background: rgba(255,255,255,.80);
      color: var(--text);
      padding: 14px 16px;
      outline: none;
      transition: .22s ease;
    }

    textarea {
      min-height: 150px;
      resize: vertical;
    }

    input:focus,
    select:focus,
    textarea:focus {
      border-color: rgba(49,92,77,.52);
      box-shadow: 0 0 0 4px rgba(49,92,77,.10);
      background: #fff;
    }

    .quick-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 4px 0 16px;
    }

    .quick-tag {
      border: 1px solid rgba(49,92,77,.18);
      background: rgba(49,92,77,.07);
      color: var(--green);
      padding: 8px 10px;
      border-radius: 999px;
      font-size: .83rem;
      font-weight: 900;
      cursor: pointer;
      transition: .2s ease;
    }

    .quick-tag:hover {
      background: var(--green);
      color: #fff;
      transform: translateY(-2px);
    }

    .footer {
      margin-top: 70px;
      padding: 52px 0 26px;
      background:
        radial-gradient(circle at 12% 0%, rgba(214,168,79,.18), transparent 26%),
        linear-gradient(135deg, #101814, #1c382e);
      color: #fff;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 26px;
      align-items: start;
    }

    .footer p {
      color: rgba(255,255,255,.65);
      max-width: 560px;
      margin-top: 12px;
    }

    .footer-links {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
      flex-wrap: wrap;
    }

    .footer-links a {
      padding: 10px 12px;
      border-radius: 999px;
      background: rgba(255,255,255,.08);
      color: rgba(255,255,255,.78);
      font-weight: 850;
      transition: .22s ease;
    }

    .footer-links a:hover {
      background: rgba(214,168,79,.18);
      color: #fff;
      transform: translateY(-2px);
    }

    .footer-bottom {
      margin-top: 32px;
      padding-top: 22px;
      border-top: 1px solid rgba(255,255,255,.12);
      display: flex;
      justify-content: space-between;
      gap: 14px;
      flex-wrap: wrap;
      color: rgba(255,255,255,.54);
      font-size: .92rem;
    }

    .reveal {
      opacity: 0;
      transform: translateY(28px);
      transition: opacity .75s ease, transform .75s ease;
    }

    .reveal.visible {
      opacity: 1;
      transform: translateY(0);
    }

    [data-parallax] {
      will-change: transform;
    }

    @media (max-width: 1020px) {
      .hero-grid,
      .diagnostic-box,
      .about-grid,
      .platform-shell,
      .paths-grid,
      .warning-shell,
      .testimonial-slider,
      .contact-grid,
      .footer-grid {
        grid-template-columns: 1fr;
      }

      .hero-visual {
        min-height: 660px;
      }

      .photo-frame {
        left: 50%;
        right: auto;
        transform: translateX(-50%) rotate(1.5deg);
      }

      .stats-grid,
      .method-scene {
        grid-template-columns: repeat(2, 1fr);
      }

      .dashboard-visual {
        min-height: 620px;
      }

      .dash-window {
        left: 50%;
        right: auto;
        transform: translateX(-50%) rotate(-1deg);
      }

      .phone-card {
        left: 4%;
      }

      .footer-links {
        justify-content: flex-start;
      }
    }

    @media (max-width: 780px) {
      .site-header {
        top: 10px;
      }

      .nav-shell {
        border-radius: 26px;
      }

      .menu-toggle {
        display: block;
      }

      .nav-menu {
        position: absolute;
        left: 16px;
        right: 16px;
        top: 82px;
        display: none;
        flex-direction: column;
        align-items: stretch;
        padding: 14px;
        border-radius: 26px;
        background: rgba(255,250,242,.96);
        backdrop-filter: blur(20px);
        box-shadow: var(--shadow-soft);
        border: 1px solid rgba(255,255,255,.9);
      }

      .nav-menu.show {
        display: flex;
        animation: fadeUp .22s ease both;
      }

      .nav-menu a {
        text-align: center;
      }

      .hero {
        padding-top: 132px;
      }

      .hero h1 {
        font-size: clamp(3.1rem, 16vw, 5.4rem);
      }

      .hero-actions .btn {
        width: 100%;
      }

      .hero-visual {
        min-height: 700px;
      }

      .photo-frame {
        width: 92%;
        height: 580px;
      }

      .card-session {
        left: 0;
        top: 40px;
      }

      .card-energy {
        left: 0;
        bottom: 166px;
      }

      .card-progress {
        right: 0;
        bottom: 30px;
      }

      .stats {
        transform: none;
        padding: 30px 0;
      }

      .stats-grid,
      .method-scene,
      .dash-grid,
      .form-grid {
        grid-template-columns: 1fr;
      }

      .about-photo-stack {
        min-height: 600px;
      }

      .about-main-photo {
        width: 88%;
      }

      .platform-shell {
        border-radius: 34px;
      }

      .dash-window {
        position: relative;
        width: 100%;
        left: auto;
        transform: rotate(0);
      }

      .phone-card {
        position: relative;
        width: min(100%, 280px);
        left: auto;
        bottom: auto;
        margin: 22px auto 0;
        transform: rotate(0);
      }

      .dashboard-visual {
        min-height: auto;
      }

      .path-panel {
        min-height: 480px;
      }

      .testimonial-image {
        min-height: 340px;
      }
    }

    @media (max-width: 520px) {
      .wrap,
      .nav-shell {
        width: min(100% - 22px, var(--container));
      }

      .brand small {
        display: none;
      }

      .brand-mark {
        width: 44px;
        height: 44px;
      }

      .section {
        padding: 70px 0;
      }

      .photo-frame {
        height: 520px;
      }

      .float-card {
        padding: 14px;
        border-radius: 22px;
      }

      .card-session,
      .card-progress,
      .card-energy {
        width: 210px;
      }

      .about-main-photo {
        width: 100%;
        height: 470px;
      }

      .about-small-photo {
        width: 64%;
        height: 220px;
      }

      .about-signature {
        left: 14px;
        bottom: 86px;
      }

      .timeline-item {
        grid-template-columns: 1fr;
      }

      .method-number {
        margin-bottom: 120px;
      }

      .contact-card {
        min-height: 440px;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      *,
      *::before,
      *::after {
        animation-duration: .001ms !important;
        animation-iteration-count: 1 !important;
        scroll-behavior: auto !important;
        transition-duration: .001ms !important;
      }

      .cursor-glow {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="scroll-progress" id="scrollProgress"></div>
  <div class="cursor-glow" id="cursorGlow"></div>

  <header class="site-header" id="siteHeader">
    <div class="nav-shell">
      <a href="#" class="brand" aria-label="Clareza Coach">
        <span class="brand-mark">✦</span>
        <span>
          Clareza.Coach
          <small>Consultoria com propósito</small>
        </span>
      </a>

      <button class="menu-toggle" id="menuToggle" type="button" aria-label="Abrir menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="nav-menu" id="navMenu">
        <a href="#diagnostico">Diagnóstico</a>
        <a href="#sobre">Profissional</a>
        <a href="#metodo">Método</a>
        <a href="#plataforma">Plataforma</a>
        <a href="#caminhos">Caminhos</a>
        <a href="#contato" class="nav-cta">Falar comigo</a>
      </nav>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="hero-bg-word" data-parallax="-.08">CLAREZA</div>
      <div class="blob blob-1" data-parallax=".12"></div>
      <div class="blob blob-2" data-parallax="-.08"></div>
      <div class="blob blob-3" data-parallax=".06"></div>

      <div class="wrap hero-grid">
        <div class="hero-copy reveal">
          <span class="eyebrow">✨ Coaching premium para decisões reais</span>

          <h1>
            Pare de sobreviver no automático. Volte a viver com <span>direção.</span>
          </h1>

          <p class="hero-lead">
            Um processo de coaching humano, visual e estratégico para quem precisa recuperar clareza,
            reorganizar decisões e transformar intenção em movimento.
          </p>

          <div class="hero-actions">
            <a href="#diagnostico" class="btn btn-primary">Começar diagnóstico</a>
            <a href="#sobre" class="btn btn-secondary">Conhecer o profissional</a>
          </div>

          <div class="hero-badges">
            <span>✓ Sessões 1:1</span>
            <span>✓ Plano semanal</span>
            <span>✓ Check-ins emocionais</span>
            <span>✓ Progresso visual</span>
          </div>
        </div>

        <div class="hero-visual reveal">
          <div class="photo-frame" data-parallax="-.06">
            <img
              src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&q=85"
              alt="Coach profissional em ambiente executivo"
            />

            <div class="photo-caption">
              <strong>Alex Mentor</strong>
              <span>Coach de carreira, negócios e clareza pessoal</span>
            </div>
          </div>

          <div class="float-card card-session" data-parallax=".10">
            <strong>Próxima sessão</strong>
            <span>Quinta-feira · 18h30</span>
            <div class="mini-avatars" aria-hidden="true">
              <i></i><i></i><i></i>
            </div>
          </div>

          <div class="float-card card-energy" data-parallax=".14">
            <strong>Energia da semana</strong>
            <span>Foco em alta</span>
            <div class="energy-bars" aria-hidden="true">
              <i></i><i></i><i></i><i></i><i></i>
            </div>
          </div>

          <div class="float-card card-progress" data-parallax=".08">
            <strong>Progresso do plano</strong>
            <span>76% concluído</span>
            <div class="progress-line"><i></i></div>
          </div>
        </div>
      </div>
    </section>

    <section class="stats">
      <div class="wrap stats-grid">
        <article class="stat-card reveal">
          <strong data-counter="300">0</strong>
          <span>Pessoas acompanhadas</span>
        </article>

        <article class="stat-card reveal">
          <strong data-counter="21">0</strong>
          <span>Dias no ciclo inicial</span>
        </article>

        <article class="stat-card reveal">
          <strong data-counter="4">0</strong>
          <span>Etapas de transformação</span>
        </article>

        <article class="stat-card reveal">
          <strong data-counter="92">0</strong>
          <span>% relatam mais clareza</span>
        </article>
      </div>
    </section>

    <section id="diagnostico" class="section">
      <div class="wrap">
        <div class="section-head center reveal">
          <span class="eyebrow">🧭 Diagnóstico vivo</span>
          <h2>A página não fica parada. Ela conversa com o visitante.</h2>
          <p class="section-lead">
            O utilizador clica no momento que está vivendo e recebe uma direção visual imediata.
          </p>
        </div>

        <div class="diagnostic-box reveal">
          <div class="diagnostic-options">
            <button type="button" class="diag-option active" data-diag="carreira" data-area="Clareza na carreira">
              <strong>Sinto que minha carreira perdeu sentido</strong>
              <span>Funciona por fora, mas por dentro parece desconectado.</span>
            </button>

            <button type="button" class="diag-option" data-diag="negocio" data-area="Crescimento do negócio">
              <strong>Tenho um negócio, mas estou sobrecarregado</strong>
              <span>O projeto cresceu, mas o peso cresceu junto.</span>
            </button>

            <button type="button" class="diag-option" data-diag="emocional" data-area="Vida emocional">
              <strong>Estou no automático e não me escuto mais</strong>
              <span>Você precisa de presença, pausa e perguntas melhores.</span>
            </button>

            <button type="button" class="diag-option" data-diag="transicao" data-area="Transição de vida">
              <strong>Estou numa fase de mudança</strong>
              <span>Algo antigo terminou, mas o novo ainda não ficou claro.</span>
            </button>
          </div>

          <aside class="diag-result" id="diagResult">
            <small id="diagSmall">Resultado sugerido</small>
            <h3 id="diagTitle">Caminho: Clareza Profissional</h3>
            <p id="diagText">
              O primeiro passo é separar pressão externa de desejo real. Mapeamos valores,
              bloqueios e decisões adiadas para criar um plano possível.
            </p>
            <a href="#contato" class="btn btn-secondary" style="margin-top: 24px; width: fit-content;">Quero falar sobre isso</a>
          </aside>
        </div>
      </div>
    </section>

    <section id="sobre" class="section">
      <div class="wrap about-grid">
        <div class="about-photo-stack reveal">
          <div class="about-main-photo" data-parallax="-.04">
            <img
              src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=900&q=85"
              alt="Foto profissional do coach"
            />
          </div>

          <div class="about-small-photo" data-parallax=".10">
            <img
              src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=700&q=85"
              alt="Sessão de coaching com cliente"
            />
          </div>

          <div class="about-signature">
            <strong>Presença + método + coragem.</strong>
            <span>O processo começa quando a conversa deixa de fugir da verdade.</span>
          </div>
        </div>

        <div class="about-content reveal">
          <span class="eyebrow">👤 O profissional</span>

          <h2>Não é sobre motivar. É sobre provocar clareza.</h2>

          <p class="section-lead">
            Eu trabalho com pessoas que sentem que “dão conta”, mas já não querem viver só dando conta.
            A proposta é escutar com profundidade, organizar a confusão e transformar percepção em ação.
          </p>

          <div class="timeline">
            <div class="timeline-item">
              <strong>2014</strong>
              <span>Transição de uma carreira sólida para o trabalho com desenvolvimento humano.</span>
            </div>

            <div class="timeline-item">
              <strong>2016</strong>
              <span>Formação em coaching de carreira, escuta ativa e processos de decisão.</span>
            </div>

            <div class="timeline-item">
              <strong>2018</strong>
              <span>Mais de 300 clientes acompanhados em ciclos de clareza e reposicionamento.</span>
            </div>

            <div class="timeline-item">
              <strong>2023</strong>
              <span>Criação do método Clareza Essencial, com diagnóstico, plano e acompanhamento.</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="metodo" class="section">
      <div class="wrap">
        <div class="section-head center reveal">
          <span class="eyebrow">⚙️ Método com impacto visual</span>
          <h2>Quatro etapas. Um processo que dá para sentir e acompanhar.</h2>
        </div>

        <div class="method-scene">
          <article class="method-card reveal" style="--bg-image: url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=800&q=85');">
            <div class="method-number">1</div>
            <h3>Diagnóstico</h3>
            <p>Entendemos o momento, os bloqueios, a energia atual e as decisões pendentes.</p>
          </article>

          <article class="method-card reveal" style="--bg-image: url('https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=85');">
            <div class="method-number">2</div>
            <h3>Plano</h3>
            <p>Criamos foco semanal, metas reais e ações pequenas o suficiente para acontecerem.</p>
          </article>

          <article class="method-card reveal" style="--bg-image: url('https://images.unsplash.com/photo-1556761175-4b46a572b786?auto=format&fit=crop&w=800&q=85');">
            <div class="method-number">3</div>
            <h3>Sessões</h3>
            <p>Conversas guiadas, exercícios de reflexão e acompanhamento entre encontros.</p>
          </article>

          <article class="method-card reveal" style="--bg-image: url('https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=85');">
            <div class="method-number">4</div>
            <h3>Evolução</h3>
            <p>Você acompanha decisões, mudança de comportamento e progresso visível.</p>
          </article>
        </div>
      </div>
    </section>

    <section id="plataforma" class="section platform">
      <div class="wrap platform-shell reveal">
        <div class="platform-copy">
          <span class="eyebrow">💻 Experiência de plataforma</span>

          <h2>Não é só uma landing page. Parece um produto vivo.</h2>

          <p class="section-lead">
            A pessoa vê progresso, sessão, check-in, emoções e ações. Isso dá confiança
            porque transforma coaching em algo concreto.
          </p>

          <div class="feature-list">
            <div class="feature-item">
              <i>✓</i>
              <span>Check-in emocional antes das sessões.</span>
            </div>

            <div class="feature-item">
              <i>✓</i>
              <span>Plano semanal com próximos passos.</span>
            </div>

            <div class="feature-item">
              <i>✓</i>
              <span>Resumo da última sessão e foco atual.</span>
            </div>

            <div class="feature-item">
              <i>✓</i>
              <span>Dashboard visual com progresso e hábitos.</span>
            </div>
          </div>
        </div>

        <div class="dashboard-visual">
          <div class="dash-window" data-parallax="-.06">
            <div class="dash-top">
              <span>Dashboard do cliente</span>
              <div class="dash-dots"><i></i><i></i><i></i></div>
            </div>

            <div class="dash-grid">
              <div class="dash-card large">
                <small>Progresso desta semana</small>
                <h3>Clareza profissional e decisão com coragem</h3>
                <div class="ring"><strong>76%</strong></div>
              </div>

              <div class="dash-card">
                <small>Próxima sessão</small>
                <h3>Quinta · 18h30</h3>
                <div class="dash-list">
                  <span>Foco <b>Decisão</b></span>
                  <span>Energia <b>Alta</b></span>
                </div>
              </div>

              <div class="dash-card">
                <small>Hábitos ativos</small>
                <div class="dash-list">
                  <span>Diário de clareza <b>✓</b></span>
                  <span>Check-in emocional <b>✓</b></span>
                  <span>Ação corajosa <b>→</b></span>
                </div>
              </div>
            </div>
          </div>

          <div class="phone-card" data-parallax=".09">
            <div class="phone-screen">
              <strong>Como você está hoje?</strong>
              <p style="color: var(--muted); font-weight: 700;">Escolha seu estado atual.</p>

              <div class="mood-row">
                <button type="button">😌</button>
                <button type="button">🔥</button>
                <button type="button">🤔</button>
                <button type="button">🌱</button>
              </div>

              <div class="phone-task">
                Próxima ação: escrever 3 decisões que você vem adiando.
              </div>

              <div class="phone-task">
                Reflexão: o que você está tentando provar?
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="caminhos" class="section">
      <div class="wrap">
        <div class="section-head reveal">
          <span class="eyebrow">🛤️ Caminhos de entrada</span>
          <h2>O visitante escolhe o que sente. A página muda com ele.</h2>
        </div>

        <div class="paths-grid">
          <div class="path-buttons reveal">
            <button type="button" class="path-btn active" data-path="carreira">
              <strong>Quero clareza na carreira</strong>
              <span>Quando o sucesso externo já não conversa com o interno.</span>
            </button>

            <button type="button" class="path-btn" data-path="negocio">
              <strong>Quero crescer com meu negócio</strong>
              <span>Para organizar expansão sem perder sentido.</span>
            </button>

            <button type="button" class="path-btn" data-path="sentir">
              <strong>Quero me sentir inteiro</strong>
              <span>Para sair do automático e voltar a se escutar.</span>
            </button>

            <button type="button" class="path-btn" data-path="naosei">
              <strong>Quero mudar, mas não sei o quê</strong>
              <span>Quando a resposta ainda não tem nome.</span>
            </button>
          </div>

          <div class="reveal">
            <article class="path-panel active" data-path-panel="carreira" style="--path-image: url('https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1000&q=85');">
              <h3>Você sente que está no lugar errado, mesmo dando certo?</h3>
              <p>
                Vamos separar expectativa externa de desejo real e criar um plano de carreira
                possível, corajoso e alinhado.
              </p>
              <div class="path-tags">
                <span>Valores</span>
                <span>Transição</span>
                <span>Decisão</span>
                <span>Reposicionamento</span>
              </div>
            </article>

            <article class="path-panel" data-path-panel="negocio" style="--path-image: url('https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1000&q=85');">
              <h3>Seu negócio nasceu com propósito, mas agora pesa?</h3>
              <p>
                Reorganizamos prioridades, oferta, rotina e visão para crescer com leveza,
                foco e mais consciência.
              </p>
              <div class="path-tags">
                <span>Estratégia</span>
                <span>Liderança</span>
                <span>Prioridades</span>
                <span>Oferta</span>
              </div>
            </article>

            <article class="path-panel" data-path-panel="sentir" style="--path-image: url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=1000&q=85');">
              <h3>Você está cansado de viver no modo automático?</h3>
              <p>
                Criamos espaço para presença, check-ins emocionais e reconstrução de rotina
                com mais escuta interna.
              </p>
              <div class="path-tags">
                <span>Presença</span>
                <span>Energia</span>
                <span>Escuta</span>
                <span>Rotina</span>
              </div>
            </article>

            <article class="path-panel" data-path-panel="naosei" style="--path-image: url('https://images.unsplash.com/photo-1490730141103-6cac27aaab94?auto=format&fit=crop&w=1000&q=85');">
              <h3>Você sabe que algo precisa mudar, mas ainda não sabe o quê.</h3>
              <p>
                Começamos pelo silêncio certo. Perguntas melhores organizam aquilo que ainda
                não tem nome.
              </p>
              <div class="path-tags">
                <span>Diagnóstico</span>
                <span>Clareza</span>
                <span>Escuta</span>
                <span>Primeiro passo</span>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>

    <section id="nao-me-contrate" class="section warning">
      <div class="wrap warning-shell reveal">
        <div>
          <span class="eyebrow">⚠️ Posicionamento forte</span>
          <h2>Não me contrate se...</h2>
          <p class="section-lead">
            Esta secção dá personalidade à página e filtra clientes errados.
          </p>
        </div>

        <ul class="warning-list">
          <li>❌ Você quer fórmulas prontas e respostas mágicas.</li>
          <li>❌ Espera que alguém mude tudo por você.</li>
          <li>❌ Busca resultado sem encarar verdades importantes.</li>
          <li>✅ Mas se quer clareza brutal com acolhimento, vem comigo.</li>
        </ul>
      </div>
    </section>

    <section id="transformacoes" class="section">
      <div class="wrap">
        <div class="section-head center reveal">
          <span class="eyebrow">🌱 Transformações</span>
          <h2>Histórias com rosto, emoção e movimento.</h2>
        </div>

        <div class="testimonials-wrap reveal">
          <div class="testimonial-slider">
            <div class="testimonial-image">
              <img
                src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1000&q=85"
                alt="Cliente em sessão de coaching"
                id="testimonialImage"
              />
            </div>

            <div>
              <article class="testimonial-card active" data-testimonial="0">
                <p>“Eu não precisava de mais motivação. Precisava de direção.”</p>
                <strong>Maria, 37</strong>
                <span>Gerente de Projetos · Reposicionamento profissional</span>
              </article>

              <article class="testimonial-card" data-testimonial="1">
                <p>“O problema não era falta de tempo. Era falta de clareza.”</p>
                <strong>Rafael, 42</strong>
                <span>Empreendedor · Reorganização de negócio</span>
              </article>

              <article class="testimonial-card" data-testimonial="2">
                <p>“Voltei a tomar decisões sem pedir desculpa por existir.”</p>
                <strong>Camila, 34</strong>
                <span>Consultora · Transição de vida</span>
              </article>

              <div class="slider-controls">
                <button type="button" id="prevTestimonial" aria-label="Testemunho anterior">←</button>
                <button type="button" id="nextTestimonial" aria-label="Próximo testemunho">→</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="quote">
      <div class="wrap">
        <div class="quote-box reveal">
          <h2>Você não está perdido. Só está longe de si mesmo.</h2>
          <p>
            Clareza não nasce da pressa. Nasce de uma conversa honesta, um método simples
            e coragem para dar o próximo passo.
          </p>
        </div>
      </div>
    </section>

    <section id="contato" class="section">
      <div class="wrap">
        <div class="section-head center reveal">
          <span class="eyebrow">📬 Contato</span>
          <h2>Sentiu que este processo conversa com o seu momento?</h2>
          <p class="section-lead">
            Envie uma mensagem curta. O primeiro passo é entender onde você está agora.
          </p>
        </div>

        <div class="contact-grid">
          <aside class="contact-card reveal">
            <h3>Vamos conversar?</h3>
            <p>
              Use os canais rápidos ou envie o formulário. Troque os contatos pelos dados reais do profissional.
            </p>

            <div class="contact-links">
              <a href="mailto:contato@seudominio.com">
                <span>📧 contato@seudominio.com</span>
                <span>→</span>
              </a>

              <a href="https://wa.me/351912345678" target="_blank" rel="noopener">
                <span>💬 WhatsApp</span>
                <span>→</span>
              </a>

              <a href="#" target="_blank" rel="noopener">
                <span>🔗 LinkedIn</span>
                <span>→</span>
              </a>

              <a href="#" target="_blank" rel="noopener">
                <span>📸 Instagram</span>
                <span>→</span>
              </a>
            </div>
          </aside>

          <form class="contact-form reveal" method="POST" action="<?= h($_SERVER['PHP_SELF']); ?>#contato">
            <h3>Enviar mensagem</h3>

            <?php if ($msg_texto): ?>
              <div class="form-alert <?= h($msg_tipo); ?>" role="alert">
                <?= h($msg_texto); ?>
              </div>
            <?php endif; ?>

            <input type="hidden" name="csrf_token" value="<?= h($_SESSION['csrf_token']); ?>" />

            <div class="form-grid">
              <div class="field">
                <label for="nome">Nome</label>
                <input
                  id="nome"
                  name="nome"
                  type="text"
                  value="<?= h($nome); ?>"
                  placeholder="Seu nome"
                  required
                  minlength="2"
                  maxlength="80"
                />
              </div>

              <div class="field">
                <label for="email">E-mail</label>
                <input
                  id="email"
                  name="email"
                  type="email"
                  value="<?= h($email); ?>"
                  placeholder="voce@email.com"
                  required
                  maxlength="120"
                />
              </div>

              <div class="field full">
                <label for="area">Área de interesse</label>
                <select id="area" name="area" required>
                  <?php foreach ($areas_permitidas as $opcao): ?>
                    <option value="<?= h($opcao); ?>" <?= $area === $opcao ? 'selected' : ''; ?>>
                      <?= h($opcao); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="field full">
                <label>Atalhos de mensagem</label>

                <div class="quick-tags">
                  <button type="button" class="quick-tag" data-fill="Quero entender melhor o processo de coaching.">Entender o processo</button>
                  <button type="button" class="quick-tag" data-fill="Estou numa fase de transição e preciso de clareza.">Estou em transição</button>
                  <button type="button" class="quick-tag" data-fill="Quero organizar minha carreira e tomar decisões com mais segurança.">Carreira</button>
                  <button type="button" class="quick-tag" data-fill="Tenho um negócio e preciso crescer com mais direção e leveza.">Negócio</button>
                </div>
              </div>

              <div class="field full">
                <label for="mensagem">Mensagem</label>
                <textarea
                  id="mensagem"
                  name="mensagem"
                  placeholder="Conte em poucas linhas o que você está vivendo agora..."
                  required
                  minlength="10"
                  maxlength="1500"
                ><?= h($mensagem); ?></textarea>
              </div>
            </div>

            <button class="btn btn-primary" type="submit" name="send_msg" value="1">
              Enviar mensagem
            </button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="wrap">
      <div class="footer-grid">
        <div>
          <a href="#" class="brand">
            <span class="brand-mark">✦</span>
            <span>
              Clareza.Coach
              <small>Consultoria com propósito</small>
            </span>
          </a>

          <p>
            Uma experiência de coaching para sair do ruído, recuperar direção
            e transformar intenção em prática.
          </p>
        </div>

        <div class="footer-links">
          <a href="#diagnostico">Diagnóstico</a>
          <a href="#sobre">Profissional</a>
          <a href="#metodo">Método</a>
          <a href="#plataforma">Plataforma</a>
          <a href="#contato">Contato</a>
        </div>
      </div>

      <div class="footer-bottom">
        <span>&copy; <?= date('Y'); ?> Clareza.Coach. Todos os direitos reservados.</span>
        <span>Desenvolvido com 💡 por <strong>Alex Oliveira</strong></span>
      </div>
    </div>
  </footer>

  <script>
    const header = document.getElementById('siteHeader');
    const progress = document.getElementById('scrollProgress');
    const cursorGlow = document.getElementById('cursorGlow');
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');

    function onScroll() {
      const scrollTop = window.scrollY || document.documentElement.scrollTop;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const percent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

      progress.style.width = percent + '%';
      header.classList.toggle('scrolled', scrollTop > 28);

      document.querySelectorAll('[data-parallax]').forEach((el) => {
        const speed = parseFloat(el.dataset.parallax || 0);
        const movement = scrollTop * speed;
        el.style.transform = `translate3d(0, ${movement}px, 0)`;
      });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    window.addEventListener('mousemove', (event) => {
      if (!cursorGlow) return;
      cursorGlow.style.left = event.clientX + 'px';
      cursorGlow.style.top = event.clientY + 'px';
    });

    if (menuToggle && navMenu) {
      menuToggle.addEventListener('click', () => {
        const isOpen = navMenu.classList.toggle('show');
        menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      });

      navMenu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
          navMenu.classList.remove('show');
          menuToggle.setAttribute('aria-expanded', 'false');
        });
      });
    }

    const revealItems = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.14 });

    revealItems.forEach((item) => revealObserver.observe(item));

    const counterItems = document.querySelectorAll('[data-counter]');
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const el = entry.target;
        const target = parseInt(el.dataset.counter, 10);
        const duration = 1300;
        const start = performance.now();

        function animateCounter(now) {
          const progress = Math.min((now - start) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          const value = Math.floor(target * eased);

          el.textContent = value;

          if (progress < 1) {
            requestAnimationFrame(animateCounter);
          } else {
            el.textContent = target;
          }
        }

        requestAnimationFrame(animateCounter);
        counterObserver.unobserve(el);
      });
    }, { threshold: 0.5 });

    counterItems.forEach((item) => counterObserver.observe(item));

    const diagnosticData = {
      carreira: {
        title: 'Caminho: Clareza Profissional',
        text: 'O primeiro passo é separar pressão externa de desejo real. Mapeamos valores, bloqueios e decisões adiadas para criar um plano possível.',
        image: "linear-gradient(to top, rgba(16,24,20,.78), rgba(16,24,20,.18)), url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=900&q=85') center/cover"
      },
      negocio: {
        title: 'Caminho: Negócio com Direção',
        text: 'O foco é reorganizar prioridades, oferta, rotina e visão para que o crescimento não dependa apenas de esforço e desgaste.',
        image: "linear-gradient(to top, rgba(16,24,20,.78), rgba(16,24,20,.18)), url('https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=900&q=85') center/cover"
      },
      emocional: {
        title: 'Caminho: Presença e Escuta',
        text: 'Criamos espaço interno para entender padrões, emoções recorrentes e pequenas ações de reconexão.',
        image: "linear-gradient(to top, rgba(16,24,20,.78), rgba(16,24,20,.18)), url('https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=900&q=85') center/cover"
      },
      transicao: {
        title: 'Caminho: Transição com Coragem',
        text: 'Damos nome ao que está terminando, clareamos o que está nascendo e construímos um plano possível para atravessar a mudança.',
        image: "linear-gradient(to top, rgba(16,24,20,.78), rgba(16,24,20,.18)), url('https://images.unsplash.com/photo-1490730141103-6cac27aaab94?auto=format&fit=crop&w=900&q=85') center/cover"
      }
    };

    const diagTitle = document.getElementById('diagTitle');
    const diagText = document.getElementById('diagText');
    const diagResult = document.getElementById('diagResult');
    const areaSelect = document.getElementById('area');

    document.querySelectorAll('[data-diag]').forEach((button) => {
      button.addEventListener('click', () => {
        document.querySelectorAll('[data-diag]').forEach((item) => item.classList.remove('active'));
        button.classList.add('active');

        const key = button.dataset.diag;
        const area = button.dataset.area;
        const data = diagnosticData[key];

        if (!data) return;

        diagTitle.textContent = data.title;
        diagText.textContent = data.text;
        diagResult.style.background = data.image;

        if (areaSelect && area) {
          areaSelect.value = area;
        }
      });
    });

    document.querySelectorAll('[data-path]').forEach((button) => {
      button.addEventListener('click', () => {
        const target = button.dataset.path;

        document.querySelectorAll('[data-path]').forEach((item) => item.classList.remove('active'));
        document.querySelectorAll('[data-path-panel]').forEach((panel) => panel.classList.remove('active'));

        button.classList.add('active');

        const panel = document.querySelector(`[data-path-panel="${target}"]`);
        if (panel) {
          panel.classList.add('active');
        }
      });
    });

    const messageBox = document.getElementById('mensagem');

    document.querySelectorAll('[data-fill]').forEach((button) => {
      button.addEventListener('click', () => {
        if (!messageBox) return;

        const text = button.dataset.fill || '';
        messageBox.value = messageBox.value.trim()
          ? messageBox.value.trim() + "\n\n" + text
          : text;

        messageBox.focus();
      });
    });

    const testimonialImages = [
      'https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1000&q=85',
      'https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1000&q=85',
      'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1000&q=85'
    ];

    let testimonialIndex = 0;
    const testimonialCards = document.querySelectorAll('[data-testimonial]');
    const testimonialImage = document.getElementById('testimonialImage');
    const prevTestimonial = document.getElementById('prevTestimonial');
    const nextTestimonial = document.getElementById('nextTestimonial');

    function showTestimonial(index) {
      testimonialCards.forEach((card) => card.classList.remove('active'));

      testimonialIndex = (index + testimonialCards.length) % testimonialCards.length;

      const activeCard = document.querySelector(`[data-testimonial="${testimonialIndex}"]`);
      if (activeCard) {
        activeCard.classList.add('active');
      }

      if (testimonialImage) {
        testimonialImage.style.opacity = '0';

        setTimeout(() => {
          testimonialImage.src = testimonialImages[testimonialIndex];
          testimonialImage.style.opacity = '1';
        }, 180);
      }
    }

    if (prevTestimonial && nextTestimonial) {
      prevTestimonial.addEventListener('click', () => showTestimonial(testimonialIndex - 1));
      nextTestimonial.addEventListener('click', () => showTestimonial(testimonialIndex + 1));

      setInterval(() => {
        showTestimonial(testimonialIndex + 1);
      }, 6500);
    }

    document.querySelectorAll('.btn, .path-btn, .diag-option, .stat-card, .method-card').forEach((item) => {
      item.addEventListener('mousemove', (event) => {
        const rect = item.getBoundingClientRect();
        const x = event.clientX - rect.left - rect.width / 2;
        const y = event.clientY - rect.top - rect.height / 2;

        item.style.transform += ` rotateX(${(-y / 80).toFixed(2)}deg) rotateY(${(x / 80).toFixed(2)}deg)`;
      });

      item.addEventListener('mouseleave', () => {
        item.style.transform = '';
      });
    });
  </script>
</body>
</html>