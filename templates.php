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
    background: var(--background,rgb(143, 143, 143));
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


  .talk-button i {
    font-size: 1.2rem;
    transition: transform 0.3s ease;
  }


  .talk-button:hover i {
    transform: scale(1.2);
  }

  .lets-talk-section {
  margin-top: 4rem;
  padding-top: 2rem;
  padding-bottom: 3rem;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
}

.lets-talk-section p {
  font-size: 1.2rem;
  line-height: 1.8;
  max-width: 600px;
  margin: 0 auto 1.5rem;
  color: #f1f1f1;
}

.filter-btn {
  background-color: transparent;
  border: 1px solid #666;
  color: #ccc;
  transition: all 0.3s ease;
  border-radius: 20px;
}

.filter-btn:hover,
.filter-btn.active {
  background-color: #28a745;
  border-color: #28a745;
  color: #fff;
}

.card-title {
  font-size: 1.2rem;
}

.card-text {
  font-size: 0.95rem;
  color: #bbb;
}


</style>

<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<!-- FONT AWESOME -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<header>
<main class="container-fluid py-5 template-section" style="position: relative; background-color:rgb(233, 231, 231); color: #fff; overflow: hidden;">
  <!-- Marca d'água -->
  <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:url('assets/img/alex-perfil.png') center center / contain no-repeat; opacity:0.035; pointer-events:none; z-index:0;"></div>

  <div class="container py-5 position-relative" style="z-index: 1;">
  <header class="text-center mb-5">
    <h1 class="display-4 fw-bold mb-4" style="color: #222;">Website Templates by AlexDevCode</h1>

<p class="lead mb-4" style="line-height: 1.8; color: #444; margin-bottom: 2rem;">
  These templates were designed and developed by me, AlexDevCode, as part of my journey as a Full Stack Developer — while also aiming to support entrepreneurs, small businesses, and professionals who need a strong and modern digital presence.
  They are <strong>completely free for basic use</strong>, helping you launch your website quickly, efficiently, and at zero cost.
</p>

<p style="line-height: 1.8; color: #444; margin-bottom: 2rem;">
  My mission is to deliver real, effective solutions that help your business grow — whether you're just starting out or scaling up. By using one of these templates, you’re not just getting a useful tool for your brand — you're also helping me evolve through real-world experience and portfolio building.
</p>

<p style="line-height: 1.8; color: #444;">
  If you're looking for something more advanced — such as personalized branding, custom integrations, or unique features — feel free to reach out. I'm here to build what you need, while growing together through solid, meaningful results.
  <br><br>
  <strong>Where others see problems, I see opportunities to build smarter.</strong>
</p>

  </header>
</div>


<!-- === === === -->
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin-bottom: 3rem;"/>


    <!-- Cards -->
    <section class="plans-wrapper d-flex flex-wrap justify-content-center gap-4 mb-5">
      <!-- Free -->
      <div class="plan-card text-dark bg-light">
        <h3 class="text-success mb-3"><i class="fas fa-leaf me-2"></i>Free Basic</h3>
        <p>Clean, ready-to-use template ideal for small projects, portfolios, or promos.</p>
        <ul class="list-unstyled text-start small mt-3 mb-4">
          <li><i class="fas fa-check text-success me-2"></i> Mobile Responsive</li>
          <li><i class="fas fa-check text-success me-2"></i> Quick Setup</li>
          <li><i class="fas fa-check text-success me-2"></i> No coding needed</li>
        </ul>
      </div>

      <!-- Custom -->
      <div class="plan-card text-dark bg-light">
        <h3 class="text-primary mb-3"><i class="fas fa-paint-brush me-2"></i>Custom Template</h3>
        <p>Get your logo, colors, and custom sections applied for a unique experience.</p>
        <ul class="list-unstyled text-start small mt-3 mb-4">
          <li><i class="fas fa-check text-primary me-2"></i> Branded Look</li>
          <li><i class="fas fa-check text-primary me-2"></i> Personalized Sections</li>
          <li><i class="fas fa-check text-primary me-2"></i> Optimized Performance</li>
        </ul>
      </div>

      <!-- Pro -->
      <div class="plan-card text-dark bg-light">
        <h3 class="text-dark mb-3"><i class="fas fa-rocket me-2"></i>Pro Website</h3>
        <p>Full-featured website including admin, SEO, integrations and advanced tools.</p>
        <ul class="list-unstyled text-start small mt-3 mb-4">
          <li><i class="fas fa-check text-dark me-2"></i> Custom CMS & Admin</li>
          <li><i class="fas fa-check text-dark me-2"></i> SEO & Analytics</li>
          <li><i class="fas fa-check text-dark me-2"></i> Forms & Integrations</li>
        </ul>
      </div>
    </section>

    <!-- === === === -->
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin-bottom: 3rem;"/>


    <!-- Botão Let's Talk -->
<div class="container mt-5">
  <div class="card text-center shadow-lg border-0" style="background-color:rgba(0, 0, 0, 0.71); color: #f1f1f1;">
    <div class="card-body py-5">
      <h2 class="card-title fw-bold mb-3">Let’s Connect</h2>
      <p class="card-text fs-5 mb-4" style="color: #ccc;">
        Want to get started or have a question? I’m happy to help — let’s talk!
      </p>
    <div class="text-center mt-4">
  <a href="mailto:alexrroliver200@gmail.com?subject=General Inquiry"
     class="btn btn-lg px-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm"
     style="background-color: rgb(50, 55, 211); color: white; border: none; transition: background-color 0.3s ease;">
    <i class="fas fa-comments"></i> Let's Talk
  </a>
</div>

    </div>
  </div>
</div>




<style>
  body {
    font-family: 'Poppins', sans-serif;
  }

  .template-section {
    position: relative;
    background-color: #0a0a0a;
    color: #fff;
    overflow: hidden;
  }

  .template-section::before {
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: url('assets/img/alex-perfil.png') center center / contain no-repeat;
    opacity: 0.035;
    z-index: 0;
    pointer-events: none;
  }

  .template-section > .container {
    position: relative;
    z-index: 1;
  }

  .plans-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2.5rem;
  }

  .plan-card {
    width: 320px;
    background: #fff;
    color: #000;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.07);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
  }

  .plan-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
  }

  .talk-button {
    margin-top: 1rem;
    font-size: 1.1rem;
    font-weight: 500;
    border-radius: 40px;
    transition: all 0.3s ease;
  }

  .talk-button:hover {
    background-color: #28a745;
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(40, 167, 69, 0.3);
  }

  h1, h3 {
    font-weight: 700;
  }

  .btn {
    border-radius: 50px;
    font-weight: 500;
  }

  p {
    line-height: 1.7;
    margin-bottom: 1.25rem;
  }

  @media (max-width: 768px) {
    .plans-wrapper {
      flex-direction: column;
      align-items: center;
    }

    .plan-card {
      width: 100%;
      max-width: 90vw;
    }
  }
</style>

<!-- === === === -->
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin-bottom: 3rem;"/>

<!-- Templates Gratuitos -->
<section class="container-fluid" style="background-color: #0d0d0d; color: #fff; padding: 3rem 1rem;">
  <div class="container d-flex flex-column justify-content-center align-items-center text-center" style="height: 100%;">
    <header class="mb-4">
      <h2 class="fw-bold display-5 text-white mb-3">Explore Free Website Templates</h2>
      <p class="fs-5" style="color: #aaa;">
        Hand-crafted templates for small businesses, services, and creators.
      </p>
    </header>
  </div>
</section>
   

<script>
  document.querySelectorAll('.filter-btn').forEach(button => {
    button.addEventListener('click', () => {
      // Ativa o botão clicado
      document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      const filter = button.getAttribute('data-filter');
      const cards = document.querySelectorAll('#template-list .card');

      cards.forEach(card => {
        if (filter === 'all' || card.classList.contains(filter)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
</script>



<!-- === === === -->
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin: 0;"/>
<hr style="border: none; height: 3px; background: repeating-linear-gradient(to right, #28a745 0, #28a745 33%, transparent 33%, transparent 66%, #28a745 66%, #28a745 100%); margin-bottom: 3rem;"/>


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
       alt="Barbershop preview" class="card-img-top" loading="lazy" />
  <div class="card-body">
    <h2 class="card-title">Barbershop</h2>
    <p class="card-text">
      Perfect for modern barbershops. Includes service listings, gallery, customer reviews, and online booking.
    </p>
    <a href="templates/barbearia.php" class="btn btn-primary" target="_blank" rel="noopener">
      View Demo
    </a>
  </div>
</article>


  </section>

 <section class="cta text-center py-5" aria-label="Call to Action to Explore More Templates" style="background: linear-gradient(145deg, #0e0e0e, #1a1a1a); color: #fff;">
  <div class="container">
    <h3 class="fw-bold mb-4 display-6">🚀 Discover More Templates</h3>

    <p class="mb-5 px-3" style="color: #ccc; max-width: 800px; margin: 0 auto; font-size: 1.15rem; line-height: 1.7;">
      If you liked any of the templates or want to learn more about what I can do, I'd be glad to talk with you.
      I’m here to help—with dedication, professionalism, and a commitment to quality.
      I don't bring problems—I bring solutions.
    </p>

    <div class="d-flex justify-content-center flex-wrap gap-3">
      <a href="templates.php" class="btn btn-outline-light btn-lg px-4 py-2 shadow-sm" aria-label="Browse All Templates">
        Browse Templates
      </a>
      <a href="contact.php" class="btn btn-success btn-lg px-4 py-2 shadow" aria-label="Contact Me">
        Contact Me
      </a>
    </div>
  </div>
</section>
</main>


<script>
  document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;

      document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      document.querySelectorAll('.template-item').forEach(item => {
        const category = item.dataset.category;
        item.style.display = (filter === 'all' || category === filter) ? 'block' : 'none';
      });
    });
  });
</script>


<?php
try {
    require_once('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>
