<?php
require_once __DIR__ . '/includes/i18n.php';
http_response_code(404); // Define o código de resposta HTTP
?>

<!DOCTYPE html>
<html lang="<?= htmlspecialchars(adc_html_lang(), ENT_QUOTES, 'UTF-8') ?>">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars(t('404.title'), ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: #f3f3f3;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    }
    .container {
      text-align: center;
      padding: 2rem;
      max-width: 600px;
      background: #fff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      border-radius: 16px;
    }
    h1 {
      font-size: 4rem;
      margin-bottom: 1rem;
      color: #c0392b;
    }
    p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }
    .btn {
      background: #c0392b;
      color: #fff;
      padding: 0.9rem 2rem;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: 0.3s ease;
    }
    .btn:hover {
      background: #e74c3c;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1><i class="fas fa-exclamation-triangle"></i> 404</h1>
    <p><?= t('404.message') ?></p>
    <a href="/" class="btn"><i class="fas fa-home"></i> <?= t('404.back_home') ?></a>
  </div>
</body>
</html>
