<?php 
try {
    require_once('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}
?>

<!-- Meta tag para responsividade -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
:root {
  --dark: #141414;
  --accent: #8b735d;
  --accent-dk: #715d4b;
  --light-accent: #c6b8a9;
  --bg: #d7d9dd;
  --text: #e9e5df;
  --radius: 20px;
  --transition: 0.3s ease;
  --shadow: 0 4px 14px rgba(0,0,0,.15);
  --shadow-hov: 0 8px 28px rgba(0,0,0,.25);
}

*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Poppins', sans-serif;
  background: var(--bg);
  color: #333;
  line-height: 1.6;
}

main, section {
  width: 100%;
}

/* Layout principal */
.dupla-face {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 3rem auto 4rem;
  padding: 0 1.5rem;
  align-items: center;
}

.lado {
  text-align: center;
}

.lado h2 {
  font-size: 2rem;
  color: var(--accent);
  margin-bottom: 0.7rem;
}

.lado.designer i,
.lado.coder i {
  font-size: 2.2rem;
  color: var(--accent);
  margin-bottom: 0.4rem;
}

.lado p {
  color: #555;
  font-size: 1rem;
}

.centro-imagem {
  text-align: center;
}

.imagem-dividida img {
  width: 240px;
  height: 240px;
  object-fit: cover;
  border-radius: 50%;
  border: 5px solid var(--accent);
  box-shadow: var(--shadow);
  transition: transform var(--transition);
}

.imagem-dividida img:hover {
  transform: scale(1.05);
}

.conteudo-centro {
  margin-top: 1.5rem;
}

.conteudo-centro .frase {
  font-style: italic;
  font-size: 1rem;
  color: #666;
  max-width: 260px;
  margin: 0 auto;
}

.btn {
  display: inline-block;
  margin-top: 1rem;
  background: var(--accent);
  color: var(--dark);
  padding: 0.65rem 1.4rem;
  border-radius: var(--radius);
  font-weight: 600;
  text-decoration: none;
  transition: background var(--transition), transform var(--transition);
  cursor: pointer;
  border: none;
}

.btn:hover {
  background: var(--accent-dk);
  transform: translateY(-2px);
}

.btn-mini {
  display: inline-block;
  background: var(--light-accent);
  color: var(--dark);
  padding: 0.5rem 1rem;
  border-radius: 8px;
  font-size: 0.9rem;
  text-decoration: none;
  transition: background var(--transition), transform var(--transition);
  cursor: pointer;
  border: none;
}

.btn-mini:hover {
  background: #e2d8ce;
  transform: translateY(-2px);
}

.resumos {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
  gap: 2rem;
  max-width: 1100px;
  margin: 0 auto 4rem;
  padding: 0 1.5rem;
}

.resumo-bloco {
  background: #fff;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  padding: 2rem 1.5rem;
  text-align: center;
  transition: transform var(--transition), box-shadow var(--transition);
}

.resumo-bloco:hover {
  transform: translateY(-6px);
  box-shadow: var(--shadow-hov);
}

.resumo-bloco h3 {
  font-size: 1.4rem;
  color: var(--accent);
  margin-bottom: 0.6rem;
}

.resumo-bloco p {
  color: #555;
  margin-bottom: 1rem;
}

.fade-in {
  animation: fadeIn 1s ease forwards;
  opacity: 0;
}

@keyframes fadeIn {
  to { opacity: 1; }
}

/* Responsivo extra */
@media (max-width: 900px) {
  .imagem-dividida img {
    width: 200px;
    height: 200px;
  }

  .conteudo-centro .frase {
    font-size: 0.95rem;
  }
}

@media (max-width: 600px) {
  .imagem-dividida img {
    width: 160px;
    height: 160px;
    border-width: 4px;
  }

  .lado h2 {
    font-size: 1.6rem;
    margin-bottom: 0.5rem;
  }

  .lado.designer i,
  .lado.coder i {
    font-size: 2rem;
    margin-bottom: 0.3rem;
  }

  .lado p {
    font-size: 0.95rem;
    max-width: 280px;
    margin: 0 auto;
  }

  .conteudo-centro {
    margin-top: 1rem;
  }

  .conteudo-centro .frase {
    font-size: 0.9rem;
    margin: 0.5rem auto 1rem auto;
  }

  .btn {
    padding: 0.5rem 1.2rem;
    font-size: 0.9rem;
  }
}
</style>

<main class="dupla-face fade-in">
  <!-- Exemplo de conteúdo lado esquerdo -->
  <div class="lado designer">
    <i class="fas fa-palette"></i>
    <h2>Seu título aqui</h2>
    <p>Descrição ou texto com a mesma cor e estilo do index.</p>
    <button class="btn" type="button">Botão Primário</button>
  </div>

  <!-- Exemplo de conteúdo centro, pode adaptar -->
  <div class="centro-imagem">
    <div class="imagem-dividida">
      <img src="/meu-portfolio/assets/img/alex-perfil.png" alt="Descrição da imagem">
    </div>
    <div class="conteudo-centro">
      <p class="frase"><strong>Uma frase ou citação no estilo index.</strong></p>
      <a href="#" class="btn" aria-label="Link principal">Link com estilo botão</a>
    </div>
  </div>

  <!-- Exemplo de conteúdo lado direito -->
  <div class="lado coder">
    <i class="fas fa-code"></i>
    <h2>Outro título</h2>
    <p>Texto com a cor cinza #555, tamanho 1rem, alinhado ao centro.</p>
    <button class="btn" type="button">Outro botão</button>
  </div>
</main>

<section class="resumos fade-in">
  <div class="resumo-bloco">
    <h3><i class="fas fa-user"></i>&nbsp; Resumo 1</h3>
    <p>Texto do resumo um, mantendo o padrão do index.</p>
    <a href="#" class="btn-mini" aria-label="Link resumo 1">Ver mais</a>
  </div>

  <div class="resumo-bloco">
    <h3><i class="fas fa-rocket"></i>&nbsp; Resumo 2</h3>
    <p>Texto do resumo dois, mantendo o padrão do index.</p>
    <a href="#" class="btn-mini" aria-label="Link resumo 2">Ver mais</a>
  </div>

  <div class="resumo-bloco">
    <h3><i class="fas fa-envelope"></i>&nbsp; Resumo 3</h3>
    <p>Texto do resumo três, mantendo o padrão do index.</p>
    <a href="#" class="btn-mini" aria-label="Link resumo 3">Ver mais</a>
  </div>
</section>

<?php
try {
    require_once('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>
