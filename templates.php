<?php
try {
    require_once('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}

if (!function_exists('h')) {
    function h($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
    }
}

$templates = [
    [
        'title' => 'Beauty Salon',
        'brand' => 'Beauty Bloom',
        'category' => 'Beauty',
        'filter' => 'beauty',
        'url' => 'templates/demo-salao.php',
        'desc' => 'Premium beauty template for salons and aesthetic studios, with soft booking-first hero, treatment sections, service cards, gallery, testimonials and elegant conversion blocks.',
        'best' => 'Beauty salons, aesthetic studios, hairdressers and beauty professionals',
        'features' => ['Services', 'Gallery', 'Booking', 'Beauty CTA']
    ],
    [
        'title' => 'Bistro Prime',
        'brand' => 'Bistrô Prime',
        'category' => 'Restaurant',
        'filter' => 'food',
        'url' => 'templates/demo-restaurante.php',
        'desc' => 'Dark premium restaurant template with editorial hero, menu highlights, reservation flow, opening hours, food cards and refined dining atmosphere.',
        'best' => 'Restaurants, cafés, bistros, bars and premium food businesses',
        'features' => ['Menu', 'Reservations', 'Chef Cards', 'Food Sections']
    ],
    [
        'title' => 'ProFix Services',
        'brand' => 'ProFix Services',
        'category' => 'General Services',
        'filter' => 'services',
        'url' => 'templates/servicosgerais.php',
        'desc' => 'Complete general services template with problem-first UX, house map, quote request, booking flow, SOS page, client portal and admin operations board.',
        'best' => 'Maintenance companies, repair services, cleaning, gardening, condominiums and local service providers',
        'features' => ['Quote Request', 'Booking', 'SOS', 'Client Portal', 'Admin']
    ],
    [
        'title' => 'VetCare Plus',
        'brand' => 'VetCare Plus',
        'category' => 'Veterinary',
        'filter' => 'health',
        'url' => 'templates/petshop_veterinaria.php',
        'desc' => 'Premium veterinary clinic template with modern public site, appointments, emergency care, pet owner portal, clinic services and internal admin area.',
        'best' => 'Veterinary clinics, petshops with clinic services and animal care businesses',
        'features' => ['Appointments', 'Pet Portal', 'Admin Clinic', 'Urgency']
    ],
    [
        'title' => 'Maison Boulanger',
        'brand' => 'Maison Boulanger',
        'category' => 'Bakery',
        'filter' => 'food',
        'url' => 'templates/padaria-pastelaria.php',
        'desc' => 'Boutique bakery and pastry template with warm editorial layout, product shelves, ordering flow, daily offers, café menu and artisanal brand feeling.',
        'best' => 'Bakeries, pastry shops, brunch cafés, cake studios and local food brands',
        'features' => ['Products', 'Orders', 'Menu', 'Daily Offers']
    ],
    [
        'title' => 'AutoForce Garage',
        'brand' => 'AutoForce Garage',
        'category' => 'Auto Services',
        'filter' => 'services',
        'url' => 'templates/oficina.php',
        'desc' => 'Dark professional auto repair template with diagnostic panel, service matrix, booking CTA, workshop trust blocks and technical service presentation.',
        'best' => 'Mechanics, garages, tire shops, diagnostics centers and auto repair providers',
        'features' => ['Diagnostics', 'Services', 'Booking', 'Workshop CTA']
    ],
    [
        'title' => 'Clínica Sorriso Gaia',
        'brand' => 'Clínica Sorriso Gaia',
        'category' => 'Dental Clinic',
        'filter' => 'health',
        'url' => 'templates/clinica-dentaria.php',
        'desc' => 'Clean dental clinic template with calm healthcare visuals, treatment sections, team trust, WhatsApp scheduling and patient-focused communication.',
        'best' => 'Dental clinics, oral health professionals and private healthcare providers',
        'features' => ['Treatments', 'WhatsApp CTA', 'Team', 'Patient Trust']
    ],
    [
        'title' => 'Clarus Coach',
        'brand' => 'Clarus Coach',
        'category' => 'Personal Brand',
        'filter' => 'personal',
        'url' => 'templates/consultor_coach.php',
        'desc' => 'Editorial personal-brand template for consultants and coaches, with strong authority hero, method sections, diagnostics, plans and premium positioning.',
        'best' => 'Consultants, coaches, mentors, strategists and independent experts',
        'features' => ['Authority', 'Method', 'Diagnostics', 'Booking']
    ],
    [
        'title' => 'Barbearia Artesanal',
        'brand' => 'Barbearia Artesanal',
        'category' => 'Barbershop',
        'filter' => 'beauty',
        'url' => 'templates/barbearia.php',
        'desc' => 'Dark premium barbershop template with bold masculine identity, service menu, barber schedule, gallery, reviews and booking-focused conversion.',
        'best' => 'Barbershops, men’s grooming studios and independent barbers',
        'features' => ['Services', 'Gallery', 'Reviews', 'Booking']
    ],
];

$carouselTemplates = array_merge($templates, $templates);

$offers = [
    [
        'icon' => 'fa-layer-group',
        'title' => 'Template Base',
        'desc' => 'A professional starting point with real business structure, responsive layout, visual identity and conversion sections.',
        'items' => ['Responsive structure', 'Real business layout', 'Fast launch direction']
    ],
    [
        'icon' => 'fa-wand-magic-sparkles',
        'title' => 'Personalized Template',
        'desc' => 'A customized version adapted to the business category, brand colors, service offer and customer journey.',
        'items' => ['Brand colors and identity', 'Custom sections', 'Better business fit']
    ],
    [
        'icon' => 'fa-rocket',
        'title' => 'Complete Website',
        'desc' => 'A complete website solution with stronger copy, forms, SEO, analytics, WhatsApp flows and future admin features.',
        'items' => ['Forms and SEO', 'Integrations', 'Built for business growth']
    ],
];

$addOns = [
    ['icon' => 'fa-envelope-open-text', 'title' => 'Contact forms', 'desc' => 'Secure forms, lead capture, WhatsApp buttons and professional contact flows.'],
    ['icon' => 'fa-chart-line', 'title' => 'SEO structure', 'desc' => 'Page titles, descriptions, semantic sections and content structure for discoverability.'],
    ['icon' => 'fa-calendar-check', 'title' => 'Booking flows', 'desc' => 'Appointment buttons, scheduling sections and service-based conversion paths.'],
    ['icon' => 'fa-language', 'title' => 'Multilingual pages', 'desc' => 'Adapted content for businesses that need Portuguese, English or other languages.'],
    ['icon' => 'fa-gauge-high', 'title' => 'Performance polish', 'desc' => 'Image optimization, clean structure and mobile-first improvements.'],
    ['icon' => 'fa-plug', 'title' => 'Integrations', 'desc' => 'Maps, analytics, email links, WhatsApp, social links and future custom APIs.'],
];

function template_preview_url($url) {
    $separator = strpos($url, '?') === false ? '?' : '&';
    return $url . $separator . 'preview_card=1';
}
?>

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<style>
  :root {
    --tpl-dark: #141414;
    --tpl-primary: #141414;
    --tpl-accent: #8b735d;
    --tpl-accent-dark: #715d4b;
    --tpl-accent-light: #c6b8a9;
    --tpl-bg: #d7d9dd;
    --tpl-card: #ffffff;
    --tpl-text: #2f2a26;
    --tpl-muted: #6f6861;
    --tpl-shadow: 0 8px 24px rgba(15,23,42,.09);
    --tpl-shadow-hover: 0 16px 42px rgba(15,23,42,.16);
    --tpl-transition: .28s ease;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  html {
    scroll-behavior: smooth;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background:
      radial-gradient(circle at top left, rgba(139,115,93,.15), transparent 30%),
      radial-gradient(circle at bottom right, rgba(20,20,20,.08), transparent 28%),
      var(--tpl-bg);
    color: var(--tpl-text);
    line-height: 1.6;
    overflow-x: hidden;
  }

  .tpl-scroll-progress {
    position: fixed;
    left: 0;
    top: 0;
    height: 4px;
    width: 0%;
    background: var(--tpl-accent);
    z-index: 9999;
    box-shadow: 0 0 12px rgba(139,115,93,.72);
  }

  .tpl-page {
    position: relative;
    overflow: hidden;
  }

  .tpl-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background: url('assets/img/alex-perfil.png') center 60px / 480px no-repeat;
    opacity: .022;
    pointer-events: none;
  }

  .tpl-inner {
    position: relative;
    z-index: 1;
    max-width: 1220px;
    margin: 0 auto;
    padding: 2.6rem 1rem 4.5rem;
  }

  .tpl-hero {
    position: relative;
    overflow: hidden;
    background:
      linear-gradient(135deg, rgba(255,255,255,.96), rgba(255,255,255,.86)),
      var(--tpl-card);
    border-radius: 30px;
    padding: 2rem 1.25rem;
    box-shadow: var(--tpl-shadow);
    margin-bottom: 1.7rem;
  }

  .tpl-hero::before,
  .tpl-hero::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
  }

  .tpl-hero::before {
    width: 220px;
    height: 220px;
    top: -85px;
    right: -70px;
    background: rgba(139,115,93,.12);
    animation: tplFloat 9s ease-in-out infinite;
  }

  .tpl-hero::after {
    width: 170px;
    height: 170px;
    left: -70px;
    bottom: -80px;
    background: rgba(20,20,20,.06);
    animation: tplFloat 10s ease-in-out infinite reverse;
  }

  .tpl-hero-grid {
    position: relative;
    z-index: 2;
    display: grid;
    gap: 1.6rem;
    align-items: center;
  }

  .tpl-badge {
    display: inline-flex;
    align-items: center;
    gap: .5rem;
    width: fit-content;
    padding: .42rem .78rem;
    background: rgba(139,115,93,.12);
    border: 1px solid rgba(139,115,93,.18);
    color: var(--tpl-accent-dark);
    border-radius: 999px;
    font-weight: 700;
    font-size: .76rem;
    letter-spacing: .08em;
    text-transform: uppercase;
    margin-bottom: .9rem;
  }

  .tpl-hero h1 {
    max-width: 760px;
    font-family: 'Oswald', sans-serif;
    font-size: clamp(2rem, 4.3vw, 3.45rem);
    line-height: 1.05;
    color: var(--tpl-primary);
    margin-bottom: .95rem;
    font-weight: 700;
    letter-spacing: -.025em;
  }

  .tpl-hero h1 span {
    color: var(--tpl-accent);
  }

  .tpl-hero p {
    max-width: 760px;
    color: var(--tpl-muted);
    line-height: 1.75;
    font-size: .98rem;
    margin-bottom: .8rem;
  }

  .tpl-hero strong {
    color: var(--tpl-accent-dark);
  }

  .tpl-actions {
    display: flex;
    flex-direction: column;
    gap: .75rem;
    margin-top: 1.15rem;
  }

  .tpl-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .5rem;
    text-decoration: none;
    border-radius: 999px;
    padding: .78rem 1.05rem;
    font-weight: 700;
    transition: transform var(--tpl-transition), background var(--tpl-transition), box-shadow var(--tpl-transition), color var(--tpl-transition), border-color var(--tpl-transition);
    border: none;
    cursor: pointer;
    font-size: .9rem;
    font-family: inherit;
  }

  .tpl-btn-primary {
    background: var(--tpl-primary);
    color: #fff;
    box-shadow: var(--tpl-shadow);
  }

  .tpl-btn-primary:hover {
    background: var(--tpl-accent);
    transform: translateY(-3px);
    box-shadow: var(--tpl-shadow-hover);
  }

  .tpl-btn-secondary {
    background: rgba(139,115,93,.12);
    color: var(--tpl-primary);
    border: 1px solid rgba(139,115,93,.22);
  }

  .tpl-btn-secondary:hover {
    background: var(--tpl-accent-light);
    transform: translateY(-3px);
  }

  .tpl-hero-panel {
    background: #f7f4f0;
    border: 1px solid rgba(139,115,93,.16);
    border-radius: 24px;
    padding: 1.1rem;
    display: grid;
    gap: .85rem;
  }

  .tpl-panel-item {
    display: flex;
    gap: .8rem;
    align-items: flex-start;
  }

  .tpl-panel-item i {
    min-width: 38px;
    height: 38px;
    border-radius: 14px;
    background: var(--tpl-primary);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .tpl-panel-item strong {
    display: block;
    color: var(--tpl-primary);
    font-size: .95rem;
    margin-bottom: .1rem;
  }

  .tpl-panel-item span {
    display: block;
    color: var(--tpl-muted);
    font-size: .86rem;
  }

  .tpl-value-strip {
    display: grid;
    grid-template-columns: 1fr;
    gap: .85rem;
    margin: 1.4rem 0 1.8rem;
  }

  .tpl-value-box {
    background: rgba(255,255,255,.88);
    border: 1px solid rgba(255,255,255,.72);
    border-radius: 20px;
    padding: 1rem;
    box-shadow: 0 4px 16px rgba(0,0,0,.05);
    transition: transform var(--tpl-transition), box-shadow var(--tpl-transition), background var(--tpl-transition);
  }

  .tpl-value-box:hover {
    transform: translateY(-4px);
    box-shadow: var(--tpl-shadow);
    background: #fff;
  }

  .tpl-value-box h4 {
    font-family: 'Oswald', sans-serif;
    color: var(--tpl-accent);
    font-size: 1.12rem;
    font-weight: 600;
    margin-bottom: .35rem;
  }

  .tpl-value-box p {
    color: var(--tpl-muted);
    line-height: 1.65;
    font-size: .9rem;
  }

  .tpl-section {
    margin-top: 2rem;
  }

  .tpl-section-head {
    text-align: center;
    max-width: 760px;
    margin: 0 auto 1.4rem;
  }

  .tpl-section-kicker {
    display: inline-block;
    margin-bottom: .45rem;
    font-size: .76rem;
    text-transform: uppercase;
    letter-spacing: .09em;
    font-weight: 700;
    color: var(--tpl-accent);
  }

  .tpl-section-head h2 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(1.65rem, 3.6vw, 2.35rem);
    line-height: 1.12;
    color: var(--tpl-primary);
    font-weight: 600;
    margin-bottom: .7rem;
  }

  .tpl-section-head h2 span {
    color: var(--tpl-accent);
  }

  .tpl-section-head p {
    color: var(--tpl-muted);
    line-height: 1.75;
    font-size: .96rem;
  }

  .tpl-offers-grid,
  .tpl-process-grid,
  .tpl-addons-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
    margin-top: 1.3rem;
  }

  .tpl-offer-card,
  .tpl-process-card,
  .tpl-addon-card {
    position: relative;
    background: rgba(255,255,255,.9);
    border: 1px solid rgba(255,255,255,.74);
    border-radius: 24px;
    padding: 1.25rem;
    box-shadow: 0 4px 16px rgba(0,0,0,.05);
    transition: transform var(--tpl-transition), box-shadow var(--tpl-transition), background var(--tpl-transition);
    overflow: hidden;
  }

  .tpl-offer-card::before,
  .tpl-process-card::before,
  .tpl-addon-card::before {
    content: "";
    position: absolute;
    top: -34px;
    right: -34px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: rgba(139,115,93,.1);
  }

  .tpl-offer-card:hover,
  .tpl-process-card:hover,
  .tpl-addon-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--tpl-shadow-hover);
    background: #fff;
  }

  .tpl-card-icon,
  .tpl-process-number {
    width: 46px;
    height: 46px;
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--tpl-primary);
    color: #fff;
    font-size: 1.08rem;
    margin-bottom: .75rem;
    position: relative;
    z-index: 2;
    font-weight: 800;
  }

  .tpl-offer-card h3,
  .tpl-process-card h3,
  .tpl-addon-card h3 {
    font-family: 'Oswald', sans-serif;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: .45rem;
    color: var(--tpl-primary);
    position: relative;
    z-index: 2;
  }

  .tpl-offer-card p,
  .tpl-process-card p,
  .tpl-addon-card p {
    color: var(--tpl-muted);
    line-height: 1.65;
    margin-bottom: .95rem;
    font-size: .92rem;
    position: relative;
    z-index: 2;
  }

  .tpl-offer-card ul {
    list-style: none;
    display: grid;
    gap: .55rem;
    position: relative;
    z-index: 2;
  }

  .tpl-offer-card li {
    color: #5b5650;
    display: flex;
    align-items: flex-start;
    gap: .55rem;
    line-height: 1.5;
    font-size: .9rem;
  }

  .tpl-offer-card li i {
    color: var(--tpl-accent);
    margin-top: .2rem;
  }

  .tpl-library-shell {
    margin-top: 1.5rem;
    background: rgba(255,255,255,.74);
    border: 1px solid rgba(255,255,255,.72);
    border-radius: 28px;
    padding: 1rem;
    box-shadow: var(--tpl-shadow);
    backdrop-filter: blur(14px);
    overflow: hidden;
  }

  .tpl-library-top {
    display: grid;
    gap: 1rem;
    align-items: center;
    margin-bottom: 1rem;
  }

  .tpl-library-note strong {
    display: block;
    font-family: 'Oswald', sans-serif;
    font-size: 1.2rem;
    color: var(--tpl-primary);
    margin-bottom: .15rem;
  }

  .tpl-library-note span {
    color: var(--tpl-muted);
    font-size: .9rem;
  }

  .tpl-carousel-controls {
    display: flex;
    flex-wrap: wrap;
    gap: .55rem;
  }

  .tpl-filter-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: .55rem;
    margin: 1.2rem 0 0;
  }

  .tpl-filter-btn {
    border: 1px solid rgba(139,115,93,.24);
    background: rgba(255,255,255,.82);
    color: var(--tpl-accent-dark);
    border-radius: 999px;
    padding: .55rem .85rem;
    font-family: inherit;
    font-weight: 700;
    cursor: pointer;
    font-size: .84rem;
    transition: transform var(--tpl-transition), background var(--tpl-transition), color var(--tpl-transition), box-shadow var(--tpl-transition);
  }

  .tpl-filter-btn:hover,
  .tpl-filter-btn.active {
    background: var(--tpl-accent);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139,115,93,.2);
  }

  .tpl-marquee {
    overflow: hidden;
    width: 100%;
    position: relative;
    mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
    -webkit-mask-image: linear-gradient(to right, transparent, #000 6%, #000 94%, transparent);
  }

  .tpl-marquee-track {
    display: flex;
    width: max-content;
    gap: 1rem;
    animation: tplMarqueeLoop 38s linear infinite;
  }

  .tpl-marquee:hover .tpl-marquee-track,
  .tpl-marquee-track.paused {
    animation-play-state: paused;
  }

  .tpl-carousel-card {
    width: 270px;
    min-width: 270px;
    background: #fff;
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid rgba(139,115,93,.10);
    box-shadow: 0 8px 24px rgba(0,0,0,.06);
    transition: transform var(--tpl-transition), box-shadow var(--tpl-transition);
  }

  .tpl-carousel-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--tpl-shadow-hover);
  }

  .tpl-card-media {
    position: relative;
    height: 170px;
    overflow: hidden;
    background: #111;
  }

  .tpl-live-preview {
    position: absolute;
    inset: 0;
    overflow: hidden;
    background: #111;
  }

  .tpl-live-preview iframe {
    position: absolute;
    left: 0;
    top: 0;
    width: 1200px;
    height: 820px;
    border: 0;
    pointer-events: none;
    transform-origin: 0 0;
    transform: scale(.225);
    background: #fff;
  }

  .tpl-template-card .tpl-live-preview iframe {
    transform: scale(.315);
  }

  .tpl-live-preview::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background:
      linear-gradient(180deg, rgba(0,0,0,.18), rgba(0,0,0,0) 38%, rgba(0,0,0,.18)),
      linear-gradient(90deg, rgba(0,0,0,.10), rgba(0,0,0,0) 28%, rgba(0,0,0,.10));
    z-index: 2;
  }

  .tpl-template-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(20,20,20,.74);
    color: #fff;
    padding: .36rem .68rem;
    border-radius: 999px;
    font-size: .72rem;
    font-weight: 700;
    backdrop-filter: blur(6px);
    z-index: 4;
  }

  .tpl-card-body {
    padding: .95rem;
  }

  .tpl-card-body h3 {
    font-family: 'Oswald', sans-serif;
    font-size: 1.08rem;
    color: var(--tpl-primary);
    margin-bottom: .35rem;
    font-weight: 600;
  }

  .tpl-card-body p {
    color: var(--tpl-muted);
    font-size: .86rem;
    line-height: 1.55;
    margin-bottom: .8rem;
  }

  .tpl-mini-btn,
  .tpl-card-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .42rem;
    text-decoration: none;
    border-radius: 999px;
    padding: .56rem .82rem;
    font-weight: 700;
    font-size: .82rem;
    background: var(--tpl-accent);
    color: #fff;
    transition: transform var(--tpl-transition), background var(--tpl-transition), box-shadow var(--tpl-transition);
  }

  .tpl-mini-btn:hover,
  .tpl-card-btn:hover {
    background: var(--tpl-accent-dark);
    transform: translateY(-2px);
  }

  .tpl-templates-box {
    margin-top: 1.25rem;
    background: rgba(255,255,255,.72);
    border: 1px solid rgba(255,255,255,.72);
    border-radius: 28px;
    padding: .9rem;
    box-shadow: var(--tpl-shadow);
    backdrop-filter: blur(14px);
  }

  .tpl-templates-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
  }

  .tpl-template-card {
    background: var(--tpl-card);
    border-radius: 22px;
    overflow: hidden;
    box-shadow: 0 4px 16px rgba(0,0,0,.06);
    transition: transform var(--tpl-transition), box-shadow var(--tpl-transition), opacity var(--tpl-transition);
    display: flex;
    flex-direction: column;
    border: 1px solid rgba(139,115,93,.10);
  }

  .tpl-template-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--tpl-shadow-hover);
  }

  .tpl-template-card.hidden {
    display: none;
  }

  .tpl-template-card .tpl-card-media {
    height: 205px;
  }

  .tpl-template-body {
    padding: 1.15rem;
    display: flex;
    flex-direction: column;
    flex: 1;
  }

  .tpl-template-body h3 {
    font-family: 'Oswald', sans-serif;
    font-size: 1.14rem;
    font-weight: 600;
    color: var(--tpl-primary);
    margin-bottom: .45rem;
  }

  .tpl-template-body p {
    color: var(--tpl-muted);
    line-height: 1.65;
    margin-bottom: .9rem;
    font-size: .91rem;
  }

  .tpl-best {
    margin-bottom: .85rem;
    padding: .75rem;
    background: #f7f4f0;
    border: 1px solid rgba(139,115,93,.13);
    border-radius: 16px;
    color: var(--tpl-muted);
    font-size: .86rem;
  }

  .tpl-best strong {
    color: var(--tpl-accent-dark);
  }

  .tpl-chip-row {
    display: flex;
    flex-wrap: wrap;
    gap: .42rem;
    margin-bottom: 1rem;
  }

  .tpl-chip {
    display: inline-flex;
    align-items: center;
    gap: .3rem;
    padding: .34rem .58rem;
    border-radius: 999px;
    background: #f5f2ee;
    color: #6a5848;
    border: 1px solid #e7ddd2;
    font-size: .74rem;
    font-weight: 700;
  }

  .tpl-template-actions {
    margin-top: auto;
    display: flex;
    gap: .6rem;
    flex-wrap: wrap;
  }

  .tpl-empty-state {
    display: none;
    text-align: center;
    padding: 2rem 1rem;
    border: 1px dashed rgba(139,115,93,.34);
    border-radius: 22px;
    background: rgba(255,255,255,.82);
    color: var(--tpl-muted);
  }

  .tpl-empty-state.show {
    display: block;
  }

  .tpl-empty-state i {
    display: block;
    font-size: 2rem;
    color: var(--tpl-accent);
    margin-bottom: .7rem;
  }

  .tpl-cta-box {
    margin-top: 2rem;
    background:
      linear-gradient(135deg, rgba(20,20,20,.95), rgba(20,20,20,.88)),
      var(--tpl-primary);
    color: #fff;
    border-radius: 28px;
    padding: 2rem 1.25rem;
    text-align: center;
    box-shadow: var(--tpl-shadow-hover);
    position: relative;
    overflow: hidden;
  }

  .tpl-cta-box::before {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    right: -60px;
    top: -60px;
    border-radius: 50%;
    background: rgba(198,184,169,.12);
    animation: tplFloat 8s ease-in-out infinite;
  }

  .tpl-cta-box h3 {
    position: relative;
    z-index: 2;
    font-family: 'Oswald', sans-serif;
    font-size: clamp(1.7rem, 4vw, 2.2rem);
    font-weight: 600;
    margin-bottom: .7rem;
  }

  .tpl-cta-box h3 span {
    color: var(--tpl-accent-light);
  }

  .tpl-cta-box p {
    position: relative;
    z-index: 2;
    max-width: 760px;
    margin: 0 auto 1.2rem;
    line-height: 1.75;
    color: rgba(255,255,255,.82);
    font-size: .95rem;
  }

  .tpl-cta-actions {
    position: relative;
    z-index: 2;
    display: flex;
    justify-content: center;
    flex-direction: column;
    gap: .75rem;
  }

  .tpl-btn-light {
    background: #fff;
    color: var(--tpl-accent-dark);
  }

  .tpl-btn-light:hover {
    background: #f3ede7;
    transform: translateY(-2px);
  }

  .tpl-btn-ghost {
    background: transparent;
    color: #fff;
    border: 1px solid rgba(255,255,255,.35);
  }

  .tpl-btn-ghost:hover {
    background: rgba(255,255,255,.1);
    transform: translateY(-2px);
  }

  @keyframes tplFloat {
    0%, 100% {
      transform: translateY(0) scale(1);
    }
    50% {
      transform: translateY(16px) scale(1.04);
    }
  }

  @keyframes tplMarqueeLoop {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(calc(-50% - .5rem));
    }
  }

  @media (min-width: 640px) {
    .tpl-actions,
    .tpl-cta-actions {
      flex-direction: row;
      flex-wrap: wrap;
    }

    .tpl-value-strip,
    .tpl-offers-grid,
    .tpl-process-grid {
      grid-template-columns: repeat(3, 1fr);
    }

    .tpl-addons-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .tpl-library-top {
      grid-template-columns: 1fr auto;
    }

    .tpl-templates-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .tpl-carousel-card {
      width: 290px;
      min-width: 290px;
    }

    .tpl-carousel-card .tpl-live-preview iframe {
      transform: scale(.242);
    }
  }

  @media (min-width: 960px) {
    .tpl-inner {
      padding: 2.8rem 1.2rem 5rem;
    }

    .tpl-hero {
      padding: 2.4rem 2rem;
    }

    .tpl-hero-grid {
      grid-template-columns: 1.15fr .85fr;
    }

    .tpl-addons-grid {
      grid-template-columns: repeat(3, 1fr);
    }

    .tpl-templates-grid {
      grid-template-columns: repeat(3, 1fr);
    }

    .tpl-template-card .tpl-card-media {
      height: 210px;
    }

    .tpl-carousel-card {
      width: 300px;
      min-width: 300px;
    }

    .tpl-carousel-card .tpl-live-preview iframe {
      transform: scale(.25);
    }
  }

  @media (max-width: 768px) {
    .tpl-inner {
      padding: 2rem 1rem 3.5rem;
    }

    .tpl-hero {
      border-radius: 24px;
      padding: 1.7rem 1.15rem;
    }

    .tpl-hero h1 {
      font-size: 2.05rem;
    }

    .tpl-hero p {
      font-size: .94rem;
    }

    .tpl-library-shell,
    .tpl-templates-box {
      border-radius: 24px;
    }

    .tpl-template-card .tpl-card-media {
      height: 200px;
    }

    .tpl-template-actions,
    .tpl-cta-actions,
    .tpl-actions {
      flex-direction: column;
    }

    .tpl-btn,
    .tpl-card-btn {
      width: 100%;
    }

    .tpl-marquee-track {
      animation-duration: 28s;
    }

    .tpl-carousel-card {
      width: 240px;
      min-width: 240px;
    }

    .tpl-card-media {
      height: 150px;
    }

    .tpl-carousel-card .tpl-live-preview iframe {
      transform: scale(.20);
    }

    .tpl-template-card .tpl-live-preview iframe {
      transform: scale(.29);
    }
  }

  @media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
      animation: none !important;
      transition: none !important;
      scroll-behavior: auto !important;
    }
  }
</style>

<div class="tpl-scroll-progress" id="scrollProgress"></div>

<main class="tpl-page">
  <div class="tpl-inner">

    <section class="tpl-hero" data-aos="fade-up">
      <div class="tpl-hero-grid">
        <div>
          <div class="tpl-badge">
            <i class="fa-solid fa-layer-group"></i>
            AlexDevCode Template Studio
          </div>

          <h1>
            Professional templates that already feel like <span>real business products.</span>
          </h1>

          <p>
            A curated library of modern, mobile-first website templates created by <strong>AlexDevCode</strong>
            for small businesses, local services and independent professionals.
          </p>

          <p>
            The cards now show the actual template pages inside the banner area. No missing image files, no generic placeholder and no fake screenshot assets.
          </p>

          <div class="tpl-actions">
            <a href="#template-library" class="tpl-btn tpl-btn-primary">
              <i class="fa-solid fa-eye"></i>
              View Templates
            </a>

            <a href="contato.php" class="tpl-btn tpl-btn-secondary">
              <i class="fa-solid fa-paper-plane"></i>
              Request a Website
            </a>
          </div>
        </div>

        <aside class="tpl-hero-panel" data-aos="zoom-in" data-aos-delay="120">
          <div class="tpl-panel-item">
            <i class="fa-solid fa-window-restore"></i>
            <div>
              <strong>Live template banners</strong>
              <span>Every banner renders the real template page in a compact preview.</span>
            </div>
          </div>

          <div class="tpl-panel-item">
            <i class="fa-solid fa-mobile-screen-button"></i>
            <div>
              <strong>Original compact cards</strong>
              <span>The gallery proportions stay close to the original layout.</span>
            </div>
          </div>

          <div class="tpl-panel-item">
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            <div>
              <strong>Ready to evolve</strong>
              <span>Use a template as a starting point and grow it into a full custom solution.</span>
            </div>
          </div>
        </aside>
      </div>
    </section>

    <section class="tpl-value-strip" data-aos="fade-up">
      <div class="tpl-value-box">
        <h4>9 live templates</h4>
        <p>A focused library covering real business categories and common client needs.</p>
      </div>

      <div class="tpl-value-box">
        <h4>Real banner previews</h4>
        <p>Each card loads the actual template URL directly inside the banner.</p>
      </div>

      <div class="tpl-value-box">
        <h4>Business-focused</h4>
        <p>The goal is not only visual design — it is trust, clarity and action.</p>
      </div>
    </section>

    <section class="tpl-section">
      <div class="tpl-section-head" data-aos="fade-up">
        <span class="tpl-section-kicker">Choose your route</span>
        <h2>Pick the level that fits your <span>current stage</span></h2>
        <p>
          Whether the business needs a simple online presence or a stronger custom website,
          the approach stays practical: clear structure, clean interface and room to grow.
        </p>
      </div>

      <div class="tpl-offers-grid">
        <?php foreach ($offers as $index => $offer): ?>
          <article class="tpl-offer-card" data-aos="zoom-in" data-aos-delay="<?= ($index + 1) * 80 ?>">
            <div class="tpl-card-icon">
              <i class="fa-solid <?= h($offer['icon']) ?>"></i>
            </div>

            <h3><?= h($offer['title']) ?></h3>
            <p><?= h($offer['desc']) ?></p>

            <ul>
              <?php foreach ($offer['items'] as $item): ?>
                <li>
                  <i class="fa-solid fa-check"></i>
                  <span><?= h($item) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="tpl-section" id="template-library">
      <div class="tpl-section-head" data-aos="fade-up">
        <span class="tpl-section-kicker">Template library</span>
        <h2>Explore templates in motion, then choose from the <span>full gallery</span></h2>
        <p>
          The carousel creates movement and quick discovery. The gallery below keeps every template visible,
          filterable and easy to open.
        </p>
      </div>

      <div class="tpl-library-shell" data-aos="fade-up">
        <div class="tpl-library-top">
          <div class="tpl-library-note">
            <strong>Automatic template showcase</strong>
            <span>Continuous carousel with the full filterable library below.</span>
          </div>

          <div class="tpl-carousel-controls">
            <button class="tpl-btn tpl-btn-secondary" type="button" id="pauseCarouselBtn">
              <i class="fa-solid fa-pause"></i>
              Pause
            </button>

            <a class="tpl-btn tpl-btn-primary" href="contato.php">
              <i class="fa-solid fa-paper-plane"></i>
              Start Project
            </a>
          </div>
        </div>

        <div class="tpl-marquee">
          <div class="tpl-marquee-track" id="templateCarouselTrack">
            <?php foreach ($carouselTemplates as $template): ?>
              <article class="tpl-carousel-card">
                <div class="tpl-card-media">
                  <div class="tpl-live-preview" aria-hidden="true">
                    <iframe
                      src="<?= h(template_preview_url($template['url'])) ?>"
                      title="<?= h($template['title']) ?> live preview"
                      loading="lazy"
                      tabindex="-1"
                    ></iframe>
                  </div>
                  <span class="tpl-template-badge"><?= h($template['category']) ?></span>
                </div>

                <div class="tpl-card-body">
                  <h3><?= h($template['title']) ?></h3>
                  <p><?= h($template['desc']) ?></p>
                  <a href="<?= h($template['url']) ?>" target="_blank" rel="noopener" class="tpl-mini-btn">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    View Template
                  </a>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="tpl-filter-row" aria-label="Template filters">
          <button type="button" class="tpl-filter-btn active" data-filter="all">All</button>
          <button type="button" class="tpl-filter-btn" data-filter="beauty">Beauty</button>
          <button type="button" class="tpl-filter-btn" data-filter="food">Food</button>
          <button type="button" class="tpl-filter-btn" data-filter="services">Services</button>
          <button type="button" class="tpl-filter-btn" data-filter="health">Health</button>
          <button type="button" class="tpl-filter-btn" data-filter="personal">Personal Brand</button>
        </div>
      </div>

      <div class="tpl-section-head" data-aos="fade-up" style="margin-top:2rem;">
        <span class="tpl-section-kicker">Full gallery</span>
        <h2>All templates <span>available below</span></h2>
        <p>
          Compare each template, see what it is best for and open the live template.
        </p>
      </div>

      <div class="tpl-templates-box" data-aos="fade-up">
        <div class="tpl-templates-grid" id="templatesGrid">
          <?php foreach ($templates as $template): ?>
            <article class="tpl-template-card" data-template-category="<?= h($template['filter']) ?>">
              <div class="tpl-card-media">
                <div class="tpl-live-preview" aria-hidden="true">
                  <iframe
                    src="<?= h(template_preview_url($template['url'])) ?>"
                    title="<?= h($template['title']) ?> live preview"
                    loading="lazy"
                    tabindex="-1"
                  ></iframe>
                </div>
                <span class="tpl-template-badge"><?= h($template['category']) ?></span>
              </div>

              <div class="tpl-template-body">
                <h3><?= h($template['title']) ?></h3>
                <p><?= h($template['desc']) ?></p>

                <div class="tpl-best">
                  <strong>Best for:</strong> <?= h($template['best']) ?>
                </div>

                <div class="tpl-chip-row">
                  <?php foreach ($template['features'] as $feature): ?>
                    <span class="tpl-chip">
                      <i class="fa-solid fa-check"></i>
                      <?= h($feature) ?>
                    </span>
                  <?php endforeach; ?>
                </div>

                <div class="tpl-template-actions">
                  <a href="<?= h($template['url']) ?>" target="_blank" rel="noopener" class="tpl-card-btn">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    View Template
                  </a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        </div>

        <div class="tpl-empty-state" id="templatesEmptyState">
          <i class="fa-solid fa-layer-group"></i>
          <h3>No templates found</h3>
          <p>Try another category to explore more templates.</p>
        </div>
      </div>
    </section>

    <section class="tpl-section">
      <div class="tpl-section-head" data-aos="fade-up">
        <span class="tpl-section-kicker">What can be added</span>
        <h2>Turn a template into a <span>real business tool</span></h2>
        <p>
          A template can be only the starting point. From there, the website can grow with features that support visibility,
          communication and customer conversion.
        </p>
      </div>

      <div class="tpl-addons-grid">
        <?php foreach ($addOns as $index => $addon): ?>
          <article class="tpl-addon-card" data-aos="zoom-in" data-aos-delay="<?= ($index % 3) * 80 ?>">
            <div class="tpl-card-icon">
              <i class="fa-solid <?= h($addon['icon']) ?>"></i>
            </div>
            <h3><?= h($addon['title']) ?></h3>
            <p><?= h($addon['desc']) ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="tpl-section">
      <div class="tpl-section-head" data-aos="fade-up">
        <span class="tpl-section-kicker">My process</span>
        <h2>From template to <span>real website</span></h2>
        <p>
          The idea is simple: start with a clear visual direction, adapt it to the business,
          and deliver a useful website that can evolve over time.
        </p>
      </div>

      <div class="tpl-process-grid">
        <article class="tpl-process-card" data-aos="zoom-in" data-aos-delay="80">
          <span class="tpl-process-number">1</span>
          <h3>Choose a base</h3>
          <p>Select the template that feels closer to your business or professional profile.</p>
        </article>

        <article class="tpl-process-card" data-aos="zoom-in" data-aos-delay="160">
          <span class="tpl-process-number">2</span>
          <h3>Customize the experience</h3>
          <p>Adapt colors, sections, text, images, contact buttons and content structure.</p>
        </article>

        <article class="tpl-process-card" data-aos="zoom-in" data-aos-delay="240">
          <span class="tpl-process-number">3</span>
          <h3>Launch and evolve</h3>
          <p>Publish the page and improve it later with SEO, forms, integrations or admin features.</p>
        </article>
      </div>
    </section>

    <section class="tpl-cta-box" data-aos="fade-up">
      <h3>Need a website that feels like <span>your business?</span></h3>
      <p>
        Start from one of these templates or request something more tailored to your brand, workflow and goals.
        I build solutions that look good, make sense and help your business move forward.
      </p>

      <div class="tpl-cta-actions">
        <a href="#template-library" class="tpl-btn tpl-btn-light">
          <i class="fa-solid fa-layer-group"></i>
          Browse Templates
        </a>

        <a href="contato.php" class="tpl-btn tpl-btn-ghost">
          <i class="fa-solid fa-paper-plane"></i>
          Contact Me
        </a>

        <a href="mailto:alexrroliver200@gmail.com?subject=Website Template Inquiry" class="tpl-btn tpl-btn-ghost">
          <i class="fa-solid fa-envelope"></i>
          Let’s Talk
        </a>
      </div>
    </section>

  </div>
</main>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  if (window.AOS) {
    AOS.init({
      duration: 780,
      once: true,
      offset: 70,
      easing: 'ease-out-cubic'
    });
  }

  const progressBar = document.getElementById('scrollProgress');

  function updateScrollProgress() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

    if (progressBar) {
      progressBar.style.width = progress + '%';
    }
  }

  window.addEventListener('scroll', updateScrollProgress);
  updateScrollProgress();

  const carouselTrack = document.getElementById('templateCarouselTrack');
  const pauseCarouselBtn = document.getElementById('pauseCarouselBtn');
  let carouselPaused = false;

  if (carouselTrack && pauseCarouselBtn) {
    pauseCarouselBtn.addEventListener('click', () => {
      carouselPaused = !carouselPaused;
      carouselTrack.classList.toggle('paused', carouselPaused);

      pauseCarouselBtn.innerHTML = carouselPaused
        ? '<i class="fa-solid fa-play"></i> Resume'
        : '<i class="fa-solid fa-pause"></i> Pause';
    });
  }

  const filterButtons = document.querySelectorAll('.tpl-filter-btn');
  const templateCards = document.querySelectorAll('.tpl-template-card');
  const emptyState = document.getElementById('templatesEmptyState');

  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      filterButtons.forEach((btn) => btn.classList.remove('active'));
      button.classList.add('active');

      const filter = button.dataset.filter;
      let visibleCount = 0;

      templateCards.forEach((card) => {
        const shouldShow = filter === 'all' || card.dataset.templateCategory === filter;
        card.classList.toggle('hidden', !shouldShow);

        if (shouldShow) {
          visibleCount++;
        }
      });

      if (emptyState) {
        emptyState.classList.toggle('show', visibleCount === 0);
      }
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