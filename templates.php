<?php 
try {
    require_once('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}
?>

<style>
  body {
    background: linear-gradient(135deg, #f7f9fc, #e1e8f7);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
  }
  main.container {
    max-width: 1200px;
  }
  h1.display-4 {
    font-weight: 700;
    color: #2c3e50;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
  }
  p.lead {
    font-size: 1.25rem;
    color: #555;
  }
  .card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 10px 25px rgba(44, 62, 80, 0.15);
    overflow: hidden;
    background: white;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(44, 62, 80, 0.3);
  }
  .card-img-top {
    height: 220px;
    object-fit: cover;
    transition: transform 0.5s ease;
  }
  .card:hover .card-img-top {
    transform: scale(1.05);
  }
  .card-body {
    padding: 1.5rem;
  }
  .card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #34495e;
  }
  .card-text {
    color: #6c7a89;
    font-size: 1rem;
    margin-top: 0.75rem;
  }
  .btn-primary {
    background: #2980b9;
    border: none;
    padding: 0.7rem 1.8rem;
    font-size: 1.1rem;
    border-radius: 50px;
    box-shadow: 0 5px 15px rgba(41, 128, 185, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }
  .btn-primary:hover {
    background-color: #1c5980;
    box-shadow: 0 8px 25px rgba(28, 89, 128, 0.6);
  }
  .btn-success {
    background: #27ae60;
    border-radius: 50px;
    padding: 0.8rem 2.5rem;
    font-size: 1.2rem;
    box-shadow: 0 5px 15px rgba(39, 174, 96, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }
  .btn-success:hover {
    background-color: #1f8a46;
    box-shadow: 0 8px 25px rgba(31, 138, 70, 0.6);
  }
  .btn-outline-primary {
    border: 2px solid #2980b9;
    color: #2980b9;
    background-color: transparent;
    border-radius: 50px;
    transition: all 0.3s ease;
  }
  .btn-outline-primary:hover {
    background-color: #2980b9;
    color: #fff;
    box-shadow: 0 5px 15px rgba(41, 128, 185, 0.4);
  }
  @media (max-width: 767.98px) {
    .card-img-top {
      height: 180px;
    }
    .card-title {
      font-size: 1.3rem;
    }
    .btn-primary, .btn-success, .btn-outline-primary {
      width: 100%;
      padding: 0.8rem 0;
    }
  }
</style>

<main class="container my-5">
  <header class="text-center mb-5">
    <h1 class="display-4">Modelos de Sites Profissionais</h1>
    <p class="lead">
      Templates prontos e responsivos, personalizados com sua marca, conteúdo e identidade.
    </p>
  </header>

  <section class="row g-4">
    <!-- Salão de Beleza -->
    <article class="col-md-4">
      <div class="card h-100">
        <img src="https://images.pexels.com/photos/4974566/pexels-photo-4974566.jpeg?auto=compress&cs=tinysrgb&h=300" 
             class="card-img-top" alt="Interior moderno de um salão de beleza" loading="lazy">
        <div class="card-body d-flex flex-column">
          <h2 class="card-title">Salão de Beleza</h2>
          <p class="card-text flex-grow-1">Para salões e barbearias: agendamento, serviços, imagens modernas.</p>
          <a href="templates/demo-salao.php" class="btn btn-primary mt-3 align-self-start" target="_blank" rel="noopener">Ver Demo</a>
        </div>
      </div>
    </article>

    <!-- Restaurante -->
    <article class="col-md-4">
      <div class="card h-100">
        <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&h=300" 
             class="card-img-top" alt="Ambiente aconchegante de restaurante com mesa posta" loading="lazy">
        <div class="card-body d-flex flex-column">
          <h2 class="card-title">Restaurante</h2>
          <p class="card-text flex-grow-1">Cardápio online, reservas e galeria — visual elegante e convidativo.</p>
          <a href="templates/demo-restaurante.php" class="btn btn-primary mt-3 align-self-start" target="_blank" rel="noopener">Ver Demo</a>
        </div>
      </div>
    </article>

    <!-- Loja Online -->
    <article class="col-md-4">
      <div class="card h-100">
        <img src="https://images.pexels.com/photos/6347729/pexels-photo-6347729.jpeg?auto=compress&cs=tinysrgb&h=300" 
             class="card-img-top" alt="Loja online sendo exibida em um notebook moderno" loading="lazy">
        <div class="card-body d-flex flex-column">
          <h2 class="card-title">Loja Online</h2>
          <p class="card-text flex-grow-1">Catálogo, carrinho e checkout integrado — design clean e eficiente.</p>
          <a href="templates/demo-loja.php" class="btn btn-primary mt-3 align-self-start" target="_blank" rel="noopener">Ver Demo</a>
        </div>
      </div>
    </article>
  </section>

  <!-- Seção Final com CTA -->
  <section class="text-center mt-5 py-5 bg-light rounded-4 shadow-sm">
    <h3 class="mb-3">Pronto para ter seu site profissional?</h3>
    <p class="mb-4 px-3">
      Personalização gratuita com sua marca. Design moderno, rápido e direto ao ponto.
    </p>
    <div class="d-flex justify-content-center flex-wrap gap-3">
      <a href="contato.php" class="btn btn-success px-4 py-2" aria-label="Ir para página de contato">
        <i class="fa fa-envelope me-2"></i> Contato
      </a>
      <a href="mailto:contato@seudominio.com" class="btn btn-outline-primary px-4 py-2" aria-label="Enviar e-mail">
        <i class="fa fa-paper-plane me-2"></i> email
      </a>
    </div>
  </section>
</main>

<?php 
try {
    require_once('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>
