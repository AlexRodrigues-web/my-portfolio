<?php 
try {
    require_once('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}
?>

<style>
  /* Colors and fonts for your project via CSS variables */
  body {
    background: var(--background, #ffffff);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: var(--text-color, #000000);
    margin: 0;
    padding: 0;
  }

  body[data-tema="claro"] {
    --background: #ffffff;
    --text-color: #000000;
    --btn-bg:rgba(68, 48, 40, 0.91);
    --btn-bg-hover:rgba(119, 108, 104, 0.91);
    --btn-text: #ffffff;
    --btn-outline-border:rgba(119, 108, 104, 0.91);
    --btn-outline-bg-hover:rgba(119, 108, 104, 0.91);
    --btn-outline-text-hover: #ffffff;
  }

  body[data-tema="escuro"] {
    --background: #121212;
    --text-color: #eeeeee;
    --btn-bg: #3b82f6;
    --btn-bg-hover: #60a5fa;
    --btn-text: #ffffff;
    --btn-outline-border: #3b82f6;
    --btn-outline-bg-hover: #3b82f6;
    --btn-outline-text-hover: #ffffff;
  }

  body[data-tema="coloradd"] {
    --background: #f9f9f2;
    --text-color: #2e2e2e;
    --btn-bg: #2563eb;
    --btn-bg-hover: #1d4ed8;
    --btn-text: #ffffff;
    --btn-outline-border: #2563eb;
    --btn-outline-bg-hover: #2563eb;
    --btn-outline-text-hover: #ffffff;
  }

  main.container {
    max-width: 1080px;
    margin: 3rem auto 4rem;
    padding: 0 1rem;
  }

  header.text-center {
    margin-bottom: 3rem;
  }

  h1.display-4 {
    font-weight: 800;
    font-size: 3rem;
    color: #555;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
    text-shadow: 0 1px 4px rgba(0,0,0,0.1);
  }

  p.lead {
    font-size: 1.2rem;
    font-weight: 500;
    color: #555;
    max-width: 720px;
    margin: 0 auto;
    line-height: 1.6;
  }

  section.row {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
  }

  article.card {
    background: var(--card-bg, #ffffff);
    border-radius: 16px;
    box-shadow: 0 12px 28px rgba(0,0,0,0.12);
    overflow: hidden;
    flex: 1 1 320px;
    max-width: 320px;
    display: flex;
    flex-direction: column;
    transition: transform 0.35s ease, box-shadow 0.35s ease;
    color: var(--text-color);
  }

  article.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.22);
  }

  .card-img-top {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  article.card:hover .card-img-top {
    transform: scale(1.06);
  }

  .card-body {
    padding: 1.8rem 1.6rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text-color);
    margin-bottom: 0.75rem;
  }

  .card-text {
    font-size: 1rem;
    color: var(--text-color);
    flex-grow: 1;
    margin-bottom: 1.5rem;
    line-height: 1.5;
  }

  a.btn {
    align-self: flex-start;
    text-decoration: none;
    font-weight: 600;
    border-radius: 30px;
    padding: 0.6rem 1.9rem;
    font-size: 1rem;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    user-select: none;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(185, 103, 85, 0.8);
  }

  a.btn-primary {
    background-color: var(--btn-bg);
    color: var(--btn-text);
    border: none;
  }

  a.btn-primary:hover,
  a.btn-primary:focus {
    background-color: var(--btn-bg-hover);
    box-shadow: 0 8px 20px rgba(14, 14, 15, 0.5);
    outline: none;
  }

  section.cta {
    margin-top: 4rem;
    padding: 3rem 2rem;
    background: #e0e7ff;
    border-radius: 24px;
    text-align: center;
    box-shadow: 0 12px 28px rgba(37, 99, 235, 0.15);
    color: #555;
    color: var(--accent);
  }

  section.cta h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #555;
    margin-bottom: 1rem;
  }

  section.cta p {
    font-size: 1.125rem;
    color: var(--text-color);
    margin-bottom: 2rem;
    max-width: 640px;
    margin-left: auto;
    margin-right: auto;
    line-height: 1.6;
  }

  section.cta .btn-group {
    display: flex;
    justify-content: center;
    gap: 1.25rem;
    flex-wrap: wrap;
  }

  section.cta .btn-outline-primary {
    border: 2px solid var(--btn-outline-border);
    color: var(--btn-outline-border);
    background: transparent;
    box-shadow: none;
    padding: 0.65rem 2.2rem;
  }

  section.cta .btn-outline-primary:hover,
  section.cta .btn-outline-primary:focus {
    background-color: var(--btn-outline-bg-hover);
    color: var(--btn-outline-text-hover);
    box-shadow: 0 8px 20px rgba(185, 78, 48, 0.86);
    outline: none;
  }

  @media (max-width: 992px) {
    main.container {
      margin: 2.5rem auto 3rem;
      padding: 0 1rem;
    }

    .card-img-top {
      height: 180px;
    }
  }

  @media (max-width: 576px) {
    h1.display-4 {
      font-size: 2.2rem;
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

    section.cta {
      padding: 2rem 1rem;
    }

    section.cta h3 {
      font-size: 1.6rem;
      color: #555; 
    }
  }
</style>

<main class="container" role="main" aria-label="Templates Portfolio">
  <header class="text-center" role="banner">
    <h1 class="display-4">Free Professional Website Templates</h1>
    <p class="lead">
      Explore a curated collection of clean, modern website templates crafted for diverse industries. Customize freely and launch your brand with confidence.
    </p>
  </header>

  <section class="row" aria-label="Template Examples">
    <article class="card" role="article" tabindex="0">
      <img src="https://images.pexels.com/photos/4974566/pexels-photo-4974566.jpeg?auto=compress&cs=tinysrgb&h=300" 
           alt="Interior of a modern beauty salon" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Beauty Salon Template</h2>
        <p class="card-text">
          Designed for salons and barbershops — featuring appointment scheduling, services showcase, and elegant imagery.
        </p>
        <a href="templates/demo-salao.php" class="btn btn-primary" target="_blank" rel="noopener" aria-label="View Beauty Salon Demo Template">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&h=300" 
           alt="Cozy restaurant with table settings" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Restaurant Template</h2>
        <p class="card-text">
          Elegant and inviting design with online menu, reservation system, and gallery integration.
        </p>
        <a href="templates/demo-restaurante.php" class="btn btn-primary" target="_blank" rel="noopener" aria-label="View Restaurant Demo Template">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://img.olx.com.br/images/37/372585537019115.jpg" 
           alt="General Services in action" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">General Services</h2>
        <p class="card-text">
          Ideal for maintenance, cleaning, gardening, and concierge businesses. Functional and direct interface.
        </p>
        <a href="templates/servicosgerais.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5PpvhzabRQKjdoXPKO98t3cJ8TJo4KnScEw&s" 
           alt="Petshop and veterinary clinic" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Petshop & Veterinary</h2>
        <p class="card-text">
          Complete template with appointments, service details, vet profiles, and basic e-commerce.
        </p>
        <a href="templates/petshop_veterinaria.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://images.pexels.com/photos/3184192/pexels-photo-3184192.jpeg?auto=compress&cs=tinysrgb&h=300" 
           alt="Bakery with artisanal bread" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Bakery & Pastry</h2>
        <p class="card-text">
          Features menus with images, delivery times, highlights, and special offers for bakeries.
        </p>
        <a href="templates/padaria-pastelaria.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRqOMVkr4zWme4RC1BypEFaMxvSC_S2n1SsA&s" 
           alt="Mechanical workshop with customer service" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Auto Repair Shop</h2>
        <p class="card-text">
          A modern visual solution for workshops. Includes booking, service catalog, and fast contact.
        </p>
        <a href="templates/oficina.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://saudeoral.pt/wp-content/uploads/2023/05/clinica_dentaria_2014_620.jpg" 
           alt="Modern dental clinic" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Dental Clinic</h2>
        <p class="card-text">
          A modern and professional page for dental clinics in Portugal, with scheduling, team info, blog, and chatbot.
        </p>
        <a href="templates/clinica-dentaria.php" class="btn btn-primary" target="_blank" rel="noopener" aria-label="View Dental Clinic Demo Template">
          View Demo
        </a>
      </div>
    </article>

    <article class="card" role="article" tabindex="0">
      <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&h=300" 
           alt="Consultant or coach in session" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Consultant / Coach</h2>
        <p class="card-text">
          Ideal for coaches and independent consultants. Service pages, testimonials, and online scheduling.
        </p>
        <a href="templates/consultor_coach.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

     <article class="card" role="article" tabindex="0">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBbFunnXqB8UEcD7MfZ3mHGLZrd3oLSpoQgA&s" 
           alt="Consultant or coach in session" class="card-img-top" loading="lazy" />
      <div class="card-body">
        <h2 class="card-title">Consultant / Coach</h2>
        <p class="card-text">
          Ideal for coaches and independent consultants. Service pages, testimonials, and online scheduling.
        </p>
        <a href="templates/barbearia.php" class="btn btn-primary" target="_blank" rel="noopener">
          View Demo
        </a>
      </div>
    </article>

  </section>

  <section class="cta" aria-label="Call to Action to Explore More Templates">
    <h3>Discover More Templates</h3>
    <p style="color: rgba(87, 61, 52, 0.91);">
      Visit our template collection page to browse and download a wide range of free professional website templates tailored to your needs.
    </p>

    <div class="btn-group">
      <a href="templates.php" class="btn btn-outline-primary" aria-label="Browse All Templates">Browse All Templates</a>
      <a href="contact.php" class="btn btn-primary" aria-label="Contact Us for Custom Templates">Contact Us</a>
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
