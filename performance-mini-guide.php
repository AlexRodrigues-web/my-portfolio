<?php
try {
    include('includes/header.php');
} catch (Exception $e) {
    error_log("Failed to load header.php: " . $e->getMessage());
}

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$guideUrl = 'https://alexdevcode.com/performance-mini-guide';
$guideDisplayUrl = 'alexdevcode.com/performance-mini-guide';
$qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=220x220&margin=14&data=' . urlencode($guideUrl);

$guidePages = [
    [
        'src' => 'assets/img/miniguide/miniguide-01.jpg',
        'title' => 'Cover',
        'desc' => 'High-performance development overview.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-02.jpg',
        'title' => 'Why Performance Matters',
        'desc' => 'Speed, trust, scalability and user experience.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-03.jpg',
        'title' => 'Frontend Performance',
        'desc' => 'Clean interfaces, optimized loading and better rendering.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-04.jpg',
        'title' => 'Backend & APIs',
        'desc' => 'Reliable APIs, response time and scalable architecture.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-05.jpg',
        'title' => 'Database Optimization',
        'desc' => 'Queries, indexes, data flow and performance bottlenecks.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-06.jpg',
        'title' => 'UX Performance',
        'desc' => 'Perceived speed, loading states and mobile-first experience.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-07.jpg',
        'title' => 'Architecture',
        'desc' => 'Clean structure, maintainability and long-term scalability.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-08.jpg',
        'title' => 'Workflow',
        'desc' => 'Better process, documentation and development habits.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-09.jpg',
        'title' => 'Checklist',
        'desc' => 'A practical review before shipping features.'
    ],
    [
        'src' => 'assets/img/miniguide/miniguide-10.jpg',
        'title' => 'Conclusion',
        'desc' => 'A final summary for building better digital products.'
    ],
];

$references = [
    [
        'title' => 'Google Core Web Vitals',
        'desc' => 'LCP, INP and CLS as user experience quality signals.',
        'url' => 'https://developers.google.com/search/docs/appearance/core-web-vitals',
        'icon' => 'fa-chart-line'
    ],
    [
        'title' => 'web.dev Web Vitals',
        'desc' => 'Practical guidance around modern performance metrics.',
        'url' => 'https://web.dev/articles/vitals',
        'icon' => 'fa-gauge-high'
    ],
    [
        'title' => 'Lighthouse Documentation',
        'desc' => 'Audits for performance, accessibility, SEO and quality.',
        'url' => 'https://developer.chrome.com/docs/lighthouse/overview',
        'icon' => 'fa-lightbulb'
    ],
    [
        'title' => 'Chrome DevTools Performance',
        'desc' => 'Tools for recording, analyzing and improving runtime performance.',
        'url' => 'https://developer.chrome.com/docs/devtools/performance/overview',
        'icon' => 'fa-magnifying-glass-chart'
    ],
    [
        'title' => 'MDN Web Performance Guides',
        'desc' => 'Browser performance concepts, optimization and best practices.',
        'url' => 'https://developer.mozilla.org/en-US/docs/Web/Performance/Guides',
        'icon' => 'fa-book'
    ],
    [
        'title' => 'PostgreSQL EXPLAIN',
        'desc' => 'Query plans, performance analysis and database optimization basics.',
        'url' => 'https://www.postgresql.org/docs/current/using-explain.html',
        'icon' => 'fa-database'
    ],
];

$guidePagesJson = json_encode(
    $guidePages,
    JSON_UNESCAPED_SLASHES |
    JSON_UNESCAPED_UNICODE |
    JSON_HEX_TAG |
    JSON_HEX_APOS |
    JSON_HEX_AMP |
    JSON_HEX_QUOT
);
?>

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />

<style>
  :root {
    --dark: #141414;
    --primary: #141414;
    --accent: #8b735d;
    --accent-dk: #715d4b;
    --light-accent: #c6b8a9;
    --bg: #d7d9dd;
    --white: #ffffff;
    --text: #e9e5df;
    --muted: #555;
    --radius: 20px;
    --transition: 0.3s ease;
    --trans: 0.3s ease;
    --shadow: 0 4px 14px rgba(0,0,0,.15);
    --shadow-hov: 0 8px 28px rgba(0,0,0,.25);
  }

  *, *::before, *::after {
    box-sizing: border-box;
  }

  html {
    scroll-behavior: smooth;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background: var(--bg);
    color: var(--dark);
    line-height: 1.6;
  }

  .guide-page {
    max-width: 1120px;
    margin: 3rem auto;
    padding: 0 1rem;
    overflow: hidden;
  }

  .guide-hero {
    position: relative;
    background:
      radial-gradient(circle at top left, rgba(139,115,93,0.23), transparent 32%),
      radial-gradient(circle at bottom right, rgba(20,20,20,0.14), transparent 34%),
      var(--white);
    border-radius: 28px;
    padding: 2rem 1.2rem;
    box-shadow: var(--shadow);
    overflow: hidden;
  }

  .guide-hero::before {
    content: '';
    position: absolute;
    width: 220px;
    height: 220px;
    right: -80px;
    top: -80px;
    background: var(--accent);
    opacity: 0.12;
    border-radius: 50%;
    animation: floatShape 7s ease-in-out infinite;
  }

  .guide-hero::after {
    content: '';
    position: absolute;
    width: 160px;
    height: 160px;
    left: -70px;
    bottom: -70px;
    background: var(--dark);
    opacity: 0.08;
    border-radius: 50%;
    animation: floatShape 9s ease-in-out infinite reverse;
  }

  .guide-hero-inner {
    position: relative;
    z-index: 2;
    display: grid;
    gap: 2rem;
    align-items: center;
  }

  .guide-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.55rem;
    width: fit-content;
    padding: 0.45rem 0.85rem;
    border-radius: 999px;
    background: rgba(139,115,93,0.13);
    color: var(--accent-dk);
    font-size: 0.86rem;
    font-weight: 600;
    margin-bottom: 1rem;
  }

  .guide-hero h1 {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(2.35rem, 8vw, 4.6rem);
    line-height: 0.98;
    color: var(--primary);
    margin-bottom: 1rem;
    letter-spacing: -0.03em;
  }

  .guide-hero h1 span {
    color: var(--accent);
  }

  .guide-hero p {
    color: #4d4d4d;
    font-size: 1rem;
    max-width: 620px;
    margin-bottom: 1.35rem;
  }

  .guide-actions {
    display: flex;
    flex-direction: column;
    gap: 0.85rem;
  }

  .guide-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.6rem;
    padding: 0.9rem 1.25rem;
    border-radius: var(--radius);
    font-weight: 700;
    text-decoration: none;
    transition: transform var(--transition), background var(--transition), box-shadow var(--transition), color var(--transition), border-color var(--transition);
    border: 0;
    cursor: pointer;
    font-family: inherit;
    font-size: 0.96rem;
  }

  .guide-btn-primary {
    background: var(--primary);
    color: var(--white);
    box-shadow: var(--shadow);
  }

  .guide-btn-primary:hover {
    background: var(--accent);
    transform: translateY(-3px);
    box-shadow: var(--shadow-hov);
  }

  .guide-btn-secondary {
    background: rgba(139,115,93,0.13);
    color: var(--primary);
    border: 1px solid rgba(139,115,93,0.22);
  }

  .guide-btn-secondary:hover {
    background: var(--light-accent);
    transform: translateY(-3px);
  }

  .hero-preview {
    position: relative;
    min-height: 330px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .preview-card {
    position: absolute;
    width: min(72vw, 245px);
    border-radius: 18px;
    overflow: hidden;
    background: var(--white);
    box-shadow: 0 18px 40px rgba(0,0,0,0.22);
    border: 4px solid rgba(255,255,255,0.9);
    transition: transform var(--transition);
  }

  .preview-card img {
    width: 100%;
    display: block;
  }

  .preview-card.main {
    z-index: 3;
    transform: rotate(-2deg) translateY(-6px);
    animation: cardFloat 4s ease-in-out infinite;
  }

  .preview-card.back-one {
    z-index: 2;
    transform: translateX(42px) rotate(7deg) scale(0.86);
    opacity: 0.9;
  }

  .preview-card.back-two {
    z-index: 1;
    transform: translateX(-42px) rotate(-8deg) scale(0.82);
    opacity: 0.75;
  }

  .guide-section {
    position: relative;
    background: var(--white);
    border-radius: var(--radius);
    padding: 1.5rem;
    margin-top: 2rem;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    overflow: hidden;
  }

  .guide-section::before {
    content: '';
    position: absolute;
    top: -30px;
    right: -30px;
    width: 100px;
    height: 100px;
    background: var(--accent);
    opacity: 0.1;
    border-radius: 50%;
  }

  .section-title {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(1.7rem, 5vw, 2.25rem);
    color: var(--primary);
    margin-bottom: 1rem;
    position: relative;
    padding-left: 2.4rem;
    z-index: 2;
  }

  .section-title i {
    position: absolute;
    left: 0;
    top: 0.15rem;
    font-size: 1.35rem;
    color: var(--accent);
  }

  .guide-section > p {
    color: var(--muted);
    position: relative;
    z-index: 2;
  }

  .guide-features {
    display: grid;
    gap: 1rem;
    margin-top: 1.4rem;
    position: relative;
    z-index: 2;
  }

  .feature-card {
    background: #f7f4f0;
    border: 1px solid rgba(139,115,93,0.16);
    border-radius: 18px;
    padding: 1.1rem;
    transition: transform var(--transition), box-shadow var(--transition), background var(--transition);
  }

  .feature-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow);
    background: #fff;
  }

  .feature-card i {
    width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: var(--primary);
    color: var(--white);
    border-radius: 14px;
    margin-bottom: 0.75rem;
  }

  .feature-card h3 {
    font-family: 'Oswald', sans-serif;
    color: var(--primary);
    font-size: 1.25rem;
    margin-bottom: 0.35rem;
  }

  .feature-card p {
    color: var(--muted);
    font-size: 0.95rem;
  }

  /* BOOK READER */
  .book-section {
    background:
      radial-gradient(circle at top left, rgba(139,115,93,0.14), transparent 30%),
      linear-gradient(135deg, rgba(255,255,255,0.98), rgba(255,255,255,0.9));
  }

  .book-shell {
    position: relative;
    z-index: 2;
    margin-top: 1.5rem;
    background: #f7f4f0;
    border: 1px solid rgba(139,115,93,0.16);
    border-radius: 26px;
    padding: 1rem;
    box-shadow: 0 10px 28px rgba(0,0,0,0.10);
  }

  .book-toolbar {
    display: grid;
    gap: 1rem;
    margin-bottom: 1rem;
  }

  .book-meta {
    display: flex;
    align-items: center;
    gap: 0.8rem;
  }

  .book-number {
    width: 54px;
    height: 54px;
    border-radius: 18px;
    background: var(--primary);
    color: var(--white);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-family: 'Oswald', sans-serif;
    font-size: 1.3rem;
    font-weight: 700;
    flex: 0 0 auto;
  }

  .book-meta h3 {
    font-family: 'Oswald', sans-serif;
    color: var(--primary);
    font-size: 1.45rem;
    line-height: 1.1;
    margin-bottom: 0.25rem;
  }

  .book-meta p {
    color: var(--muted);
    font-size: 0.92rem;
  }

  .book-tools {
    display: flex;
    flex-wrap: wrap;
    gap: 0.6rem;
  }

  .book-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.45rem;
    padding: 0.72rem 0.95rem;
    border-radius: 999px;
    border: 1px solid rgba(139,115,93,0.22);
    background: #fff;
    color: var(--primary);
    font-family: inherit;
    font-weight: 700;
    cursor: pointer;
    text-decoration: none;
    transition: transform var(--transition), background var(--transition), color var(--transition), box-shadow var(--transition), opacity var(--transition);
  }

  .book-btn:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow);
  }

  .book-btn:disabled {
    opacity: 0.45;
    cursor: not-allowed;
    transform: none;
    box-shadow: none;
  }

  .book-btn.primary {
    background: var(--primary);
    color: var(--white);
    border-color: var(--primary);
  }

  .book-btn.primary:hover {
    background: var(--accent);
    border-color: var(--accent);
  }

  .book-hint {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 0.55rem;
    color: var(--muted);
    font-size: 0.86rem;
    margin-bottom: 1rem;
  }

  .book-hint span {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    background: #fff;
    border: 1px solid rgba(139,115,93,0.14);
    border-radius: 999px;
    padding: 0.42rem 0.65rem;
  }

  .book-stage {
    position: relative;
    perspective: 1600px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0.8rem;
    background:
      radial-gradient(circle at center, rgba(139,115,93,0.14), transparent 55%),
      linear-gradient(135deg, rgba(20,20,20,0.96), rgba(20,20,20,0.88));
    border-radius: 24px;
    min-height: 420px;
    overflow: hidden;
  }

  .book-stage::before {
    content: "";
    position: absolute;
    inset: 0;
    background:
      linear-gradient(90deg, rgba(255,255,255,0.04), transparent 20%, transparent 80%, rgba(255,255,255,0.04)),
      radial-gradient(circle at 20% 10%, rgba(255,255,255,0.08), transparent 26%);
    pointer-events: none;
  }

  .book-page {
    position: relative;
    z-index: 2;
    width: min(100%, 760px);
    border-radius: 22px;
    transform-style: preserve-3d;
    transform-origin: left center;
    box-shadow:
      0 22px 55px rgba(0,0,0,0.38),
      0 0 0 1px rgba(255,255,255,0.16);
    background: #fff;
    overflow: hidden;
    cursor: pointer;
  }

  .book-page::before {
    content: "";
    position: absolute;
    inset: 0;
    background:
      linear-gradient(90deg, rgba(0,0,0,0.14), transparent 12%, transparent 88%, rgba(0,0,0,0.08));
    pointer-events: none;
    z-index: 3;
    opacity: 0.45;
  }

  .book-page.turn-next {
    animation: turnNext 0.52s ease both;
  }

  .book-page.turn-prev {
    animation: turnPrev 0.52s ease both;
  }

  .book-page img {
    display: block;
    width: 100%;
    height: auto;
    user-select: none;
    -webkit-user-drag: none;
  }

  .page-side {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 50%;
    z-index: 5;
    border: 0;
    background: transparent;
    cursor: pointer;
  }

  .page-side.left {
    left: 0;
  }

  .page-side.right {
    right: 0;
  }

  .page-side::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(20,20,20,0.58);
    color: #fff;
    display: grid;
    place-items: center;
    font-family: "Font Awesome 6 Free";
    font-weight: 900;
    opacity: 0;
    transform: translateY(-50%) scale(0.88);
    transition: opacity var(--transition), transform var(--transition), background var(--transition);
  }

  .page-side.left::after {
    content: "\f060";
    left: 18px;
  }

  .page-side.right::after {
    content: "\f061";
    right: 18px;
  }

  .book-page:hover .page-side::after {
    opacity: 1;
    transform: translateY(-50%) scale(1);
  }

  .page-side:hover::after {
    background: var(--accent);
  }

  .book-progress {
    margin-top: 1rem;
    display: grid;
    gap: 0.65rem;
  }

  .book-progress-bar {
    height: 8px;
    background: rgba(139,115,93,0.16);
    border-radius: 999px;
    overflow: hidden;
  }

  .book-progress-fill {
    width: 10%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg, var(--accent), var(--light-accent));
    transition: width var(--transition);
  }

  .book-dots {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.4rem;
  }

  .book-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    border: 0;
    background: rgba(139,115,93,0.28);
    cursor: pointer;
    transition: transform var(--transition), background var(--transition);
  }

  .book-dot.active {
    background: var(--accent);
    transform: scale(1.35);
  }

  .guide-cta {
    text-align: center;
    background:
      linear-gradient(135deg, rgba(20,20,20,0.94), rgba(20,20,20,0.86)),
      var(--primary);
    color: var(--white);
  }

  .guide-cta::before {
    background: var(--light-accent);
    opacity: 0.11;
  }

  .guide-cta .section-title {
    color: var(--white);
    padding-left: 0;
  }

  .guide-cta .section-title i {
    position: static;
    margin-right: 0.5rem;
  }

  .guide-cta p {
    color: rgba(255,255,255,0.78);
    max-width: 680px;
    margin: 0 auto 1.25rem;
  }

  .resource-section {
    background:
      radial-gradient(circle at top left, rgba(139,115,93,0.16), transparent 32%),
      linear-gradient(135deg, rgba(255,255,255,0.96), rgba(255,255,255,0.88));
  }

  .resource-grid {
    position: relative;
    z-index: 2;
    display: grid;
    gap: 1.25rem;
    margin-top: 1.4rem;
  }

  .share-card,
  .references-card {
    background: #f7f4f0;
    border: 1px solid rgba(139,115,93,0.16);
    border-radius: 22px;
    padding: 1.25rem;
  }

  .share-card {
    display: grid;
    gap: 1rem;
    align-items: center;
  }

  .qr-wrap {
    width: 190px;
    height: 190px;
    background: #fff;
    border-radius: 22px;
    padding: 0.75rem;
    box-shadow: 0 10px 24px rgba(0,0,0,0.11);
    border: 1px solid rgba(20,20,20,0.06);
    margin: 0 auto;
  }

  .qr-wrap img {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 14px;
  }

  .share-content h3,
  .references-card h3 {
    font-family: 'Oswald', sans-serif;
    color: var(--primary);
    font-size: 1.45rem;
    margin-bottom: 0.45rem;
  }

  .share-content p,
  .references-card p {
    color: var(--muted);
    font-size: 0.94rem;
  }

  .url-pill {
    margin: 1rem 0;
    display: inline-flex;
    align-items: center;
    gap: 0.55rem;
    max-width: 100%;
    padding: 0.7rem 0.9rem;
    border-radius: 999px;
    background: #fff;
    border: 1px solid rgba(139,115,93,0.2);
    color: var(--accent-dk);
    font-weight: 700;
    font-size: 0.9rem;
    word-break: break-word;
  }

  .url-pill i {
    color: var(--accent);
  }

  .copy-feedback {
    display: none;
    margin-top: 0.7rem;
    color: var(--accent-dk);
    font-weight: 700;
    font-size: 0.88rem;
  }

  .copy-feedback.show {
    display: block;
  }

  .references-list {
    display: grid;
    gap: 0.75rem;
    margin-top: 1rem;
  }

  .reference-link {
    display: grid;
    grid-template-columns: 42px 1fr auto;
    gap: 0.8rem;
    align-items: center;
    padding: 0.85rem;
    border-radius: 16px;
    background: #fff;
    border: 1px solid rgba(139,115,93,0.14);
    text-decoration: none;
    transition: transform var(--transition), box-shadow var(--transition), border-color var(--transition);
  }

  .reference-link:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow);
    border-color: rgba(139,115,93,0.32);
  }

  .reference-icon {
    width: 42px;
    height: 42px;
    border-radius: 14px;
    background: var(--primary);
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .reference-link strong {
    display: block;
    color: var(--primary);
    font-size: 0.94rem;
    margin-bottom: 0.15rem;
  }

  .reference-link span {
    display: block;
    color: var(--muted);
    font-size: 0.82rem;
    line-height: 1.45;
  }

  .reference-link .external-icon {
    color: var(--accent);
  }

  .brand-signature {
    position: relative;
    z-index: 2;
    margin-top: 1.25rem;
    text-align: center;
    padding: 1rem;
    border-radius: 18px;
    background: rgba(20,20,20,0.94);
    color: rgba(255,255,255,0.82);
    font-weight: 600;
  }

  .brand-signature strong {
    color: var(--light-accent);
  }

  @keyframes floatShape {
    0%, 100% {
      transform: translateY(0) scale(1);
    }

    50% {
      transform: translateY(18px) scale(1.04);
    }
  }

  @keyframes cardFloat {
    0%, 100% {
      transform: rotate(-2deg) translateY(-6px);
    }

    50% {
      transform: rotate(-1deg) translateY(-18px);
    }
  }

  @keyframes turnNext {
    0% {
      transform: rotateY(0deg) translateX(0);
      opacity: 1;
    }

    45% {
      transform: rotateY(-22deg) translateX(-8px);
      opacity: 0.72;
    }

    100% {
      transform: rotateY(0deg) translateX(0);
      opacity: 1;
    }
  }

  @keyframes turnPrev {
    0% {
      transform: rotateY(0deg) translateX(0);
      opacity: 1;
    }

    45% {
      transform: rotateY(22deg) translateX(8px);
      opacity: 0.72;
    }

    100% {
      transform: rotateY(0deg) translateX(0);
      opacity: 1;
    }
  }

  @media (min-width: 640px) {
    .guide-actions {
      flex-direction: row;
      flex-wrap: wrap;
    }

    .guide-features {
      grid-template-columns: repeat(2, 1fr);
    }

    .book-toolbar {
      grid-template-columns: 1fr auto;
      align-items: center;
    }

    .share-card {
      grid-template-columns: 210px 1fr;
    }

    .qr-wrap {
      margin: 0;
    }
  }

  @media (min-width: 900px) {
    .guide-hero {
      padding: 3rem;
    }

    .guide-hero-inner {
      grid-template-columns: 1.05fr 0.95fr;
    }

    .guide-section {
      padding: 2rem;
    }

    .guide-features {
      grid-template-columns: repeat(4, 1fr);
    }

    .hero-preview {
      min-height: 450px;
    }

    .preview-card {
      width: 285px;
    }

    .book-shell {
      padding: 1.25rem;
    }

    .book-stage {
      min-height: 620px;
      padding: 1.2rem;
    }

    .book-page {
      width: min(100%, 780px);
    }

    .resource-grid {
      grid-template-columns: 0.9fr 1.1fr;
      align-items: stretch;
    }
  }

  @media (max-width: 640px) {
    .book-stage {
      min-height: 330px;
      padding: 0.55rem;
      border-radius: 20px;
    }

    .book-page {
      border-radius: 16px;
    }

    .book-tools {
      display: grid;
      grid-template-columns: 1fr 1fr;
    }

    .book-btn {
      font-size: 0.84rem;
      padding: 0.68rem 0.75rem;
    }

    .page-side::after {
      display: none;
    }

    .reference-link {
      grid-template-columns: 38px 1fr;
    }

    .reference-link .external-icon {
      display: none;
    }

    .url-pill {
      border-radius: 16px;
      align-items: flex-start;
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

<main class="guide-page">
  <section class="guide-hero" data-aos="fade-up">
    <div class="guide-hero-inner">
      <div>
        <div class="guide-badge">
          <i class="fas fa-bolt"></i>
          Portfolio Resource
        </div>

        <h1>
          High-Performance <span>Development</span> Mini-Guide
        </h1>

        <p>
          A visual and practical guide about building faster, cleaner and more scalable digital products,
          covering frontend, backend, databases, UX, architecture and development workflow.
        </p>

        <div class="guide-actions">
          <a href="#guide-preview" class="guide-btn guide-btn-primary">
            <i class="fas fa-book-open"></i>
            Open Reader
          </a>

          <a href="assets/documents/performance-mini-guide.pdf" target="_blank" class="guide-btn guide-btn-secondary">
            <i class="fas fa-file-arrow-down"></i>
            Download PDF
          </a>

          <a href="contato.php?utm_source=mini_guide&utm_medium=resource&utm_campaign=performance_guide" class="guide-btn guide-btn-secondary">
            <i class="fas fa-paper-plane"></i>
            Contact Me
          </a>
        </div>
      </div>

      <div class="hero-preview" aria-hidden="true">
        <div class="preview-card back-two">
          <img src="assets/img/miniguide/miniguide-03.jpg" alt="">
        </div>

        <div class="preview-card back-one">
          <img src="assets/img/miniguide/miniguide-02.jpg" alt="">
        </div>

        <div class="preview-card main">
          <img src="assets/img/miniguide/miniguide-01.jpg" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="guide-section" data-aos="fade-up">
    <h2 class="section-title">
      <i class="fas fa-circle-info"></i>
      About This Guide
    </h2>

    <p>
      This mini-guide was created as a portfolio resource to show how I think about performance,
      user experience, architecture and scalable development. It is not only a design piece — it reflects
      the way I approach modern web projects from both a technical and product perspective.
    </p>

    <div class="guide-features">
      <article class="feature-card" data-aos="zoom-in" data-aos-delay="80">
        <i class="fas fa-gauge-high"></i>
        <h3>Performance</h3>
        <p>Focused on speed, response time, loading states and better user experience.</p>
      </article>

      <article class="feature-card" data-aos="zoom-in" data-aos-delay="160">
        <i class="fas fa-code"></i>
        <h3>Clean Code</h3>
        <p>Clear structure, maintainable components and scalable project organization.</p>
      </article>

      <article class="feature-card" data-aos="zoom-in" data-aos-delay="240">
        <i class="fas fa-server"></i>
        <h3>Backend</h3>
        <p>API reliability, database performance and better data flow decisions.</p>
      </article>

      <article class="feature-card" data-aos="zoom-in" data-aos-delay="320">
        <i class="fas fa-mobile-screen"></i>
        <h3>Mobile-first</h3>
        <p>Designed for modern users, responsive interfaces and accessible experiences.</p>
      </article>
    </div>
  </section>

  <section id="guide-preview" class="guide-section book-section" data-aos="fade-up">
    <h2 class="section-title">
      <i class="fas fa-book-open"></i>
      Digital Guide Reader
    </h2>

    <p>
      Read the guide like a digital book. Click the page sides, use the buttons, use keyboard arrows,
      or swipe on mobile to turn pages.
    </p>

    <div class="book-shell">
      <div class="book-toolbar">
        <div class="book-meta">
          <div class="book-number" id="bookPageNumber">01</div>

          <div>
            <h3 id="bookPageTitle">Cover</h3>
            <p id="bookPageDesc">High-performance development overview.</p>
          </div>
        </div>

        <div class="book-tools">
          <button type="button" class="book-btn" id="prevPageBtn">
            <i class="fas fa-arrow-left"></i>
            Previous
          </button>

          <button type="button" class="book-btn primary" id="nextPageBtn">
            Next
            <i class="fas fa-arrow-right"></i>
          </button>

          <a href="<?php echo h($guidePages[0]['src']); ?>" target="_blank" rel="noopener" class="book-btn" id="openPageBtn">
            <i class="fas fa-up-right-and-down-left-from-center"></i>
            Open Page
          </a>
        </div>
      </div>

      <div class="book-hint">
        <span><i class="fas fa-arrow-pointer"></i> Click left/right side to turn</span>
        <span><i class="fas fa-keyboard"></i> Use keyboard arrows</span>
        <span><i class="fas fa-mobile-screen"></i> Swipe on mobile</span>
      </div>

      <div class="book-stage">
        <div class="book-page" id="bookPage">
          <img id="bookImage" src="<?php echo h($guidePages[0]['src']); ?>" alt="<?php echo h($guidePages[0]['title']); ?>">

          <button type="button" class="page-side left" id="pageLeftBtn" aria-label="Previous page"></button>
          <button type="button" class="page-side right" id="pageRightBtn" aria-label="Next page"></button>
        </div>
      </div>

      <div class="book-progress">
        <div class="book-progress-bar">
          <div class="book-progress-fill" id="bookProgressFill"></div>
        </div>

        <div class="book-dots" id="bookDots" aria-label="Guide pages navigation"></div>
      </div>
    </div>
  </section>

  <section class="guide-section guide-cta" data-aos="zoom-in">
    <h2 class="section-title">
      <i class="fas fa-paper-plane"></i>
      Want Better Performance?
    </h2>

    <p>
      If you need a faster, cleaner and more scalable website or web application,
      I can help improve frontend performance, backend structure, user experience and technical quality.
    </p>

    <div class="guide-actions" style="justify-content:center;">
      <a href="contato.php?utm_source=mini_guide&utm_medium=resource&utm_campaign=performance_guide" class="guide-btn guide-btn-primary">
        <i class="fas fa-envelope"></i>
        Contact Me
      </a>

      <a href="assets/documents/performance-mini-guide.pdf" target="_blank" class="guide-btn guide-btn-secondary">
        <i class="fas fa-file-arrow-down"></i>
        Download PDF
      </a>
    </div>
  </section>

  <section class="guide-section resource-section" data-aos="fade-up">
    <h2 class="section-title">
      <i class="fas fa-share-nodes"></i>
      Share & References
    </h2>

    <p>
      Use the QR code to open or share this guide quickly. The references below support the performance concepts used throughout the guide.
    </p>

    <div class="resource-grid">
      <article class="share-card" data-aos="zoom-in" data-aos-delay="80">
        <div class="qr-wrap">
          <img
            src="<?php echo h($qrCodeUrl); ?>"
            alt="QR code to open the High-Performance Development Mini-Guide"
            loading="lazy"
          >
        </div>

        <div class="share-content">
          <h3>Scan to open / share this guide</h3>

          <p>
            Open this resource on mobile, share it in conversations, or use it as a quick technical reference from the AlexDevCode portfolio.
          </p>

          <div class="url-pill">
            <i class="fas fa-link"></i>
            <span><?php echo h($guideDisplayUrl); ?></span>
          </div>

          <div class="guide-actions">
            <a href="<?php echo h($guideUrl); ?>" target="_blank" rel="noopener" class="guide-btn guide-btn-primary">
              <i class="fas fa-arrow-up-right-from-square"></i>
              Open Guide
            </a>

            <button type="button" class="guide-btn guide-btn-secondary" id="copyGuideLink" data-copy-url="<?php echo h($guideUrl); ?>">
              <i class="fas fa-copy"></i>
              Copy Link
            </button>
          </div>

          <div class="copy-feedback" id="copyFeedback">
            Link copied to clipboard.
          </div>
        </div>
      </article>

      <article class="references-card" data-aos="zoom-in" data-aos-delay="160">
        <h3>References</h3>

        <p>
          Official documentation and learning resources related to Core Web Vitals, Lighthouse, DevTools, web performance and database analysis.
        </p>

        <div class="references-list">
          <?php foreach ($references as $reference): ?>
            <a href="<?php echo h($reference['url']); ?>" class="reference-link" target="_blank" rel="noopener">
              <span class="reference-icon">
                <i class="fas <?php echo h($reference['icon']); ?>"></i>
              </span>

              <span>
                <strong><?php echo h($reference['title']); ?></strong>
                <span><?php echo h($reference['desc']); ?></span>
              </span>

              <i class="fas fa-arrow-up-right-from-square external-icon"></i>
            </a>
          <?php endforeach; ?>
        </div>
      </article>
    </div>

    <div class="brand-signature">
      Built with care by <strong>AlexDevCode</strong>. Performance is not a final step — it is a development habit.
    </div>
  </section>
</main>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  const guidePages = <?php echo $guidePagesJson ?: '[]'; ?>;

  if (window.AOS) {
    AOS.init({
      duration: 800,
      once: true,
      offset: 80
    });
  }

  const bookPage = document.getElementById('bookPage');
  const bookImage = document.getElementById('bookImage');
  const pageNumber = document.getElementById('bookPageNumber');
  const pageTitle = document.getElementById('bookPageTitle');
  const pageDesc = document.getElementById('bookPageDesc');
  const prevPageBtn = document.getElementById('prevPageBtn');
  const nextPageBtn = document.getElementById('nextPageBtn');
  const pageLeftBtn = document.getElementById('pageLeftBtn');
  const pageRightBtn = document.getElementById('pageRightBtn');
  const openPageBtn = document.getElementById('openPageBtn');
  const progressFill = document.getElementById('bookProgressFill');
  const dotsWrap = document.getElementById('bookDots');

  let currentPage = 0;
  let touchStartX = 0;
  let touchStartY = 0;

  function padPageNumber(number) {
    return String(number).padStart(2, '0');
  }

  function renderDots() {
    dotsWrap.innerHTML = '';

    guidePages.forEach((page, index) => {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = 'book-dot' + (index === currentPage ? ' active' : '');
      dot.setAttribute('aria-label', 'Open page ' + (index + 1));
      dot.addEventListener('click', () => goToPage(index));
      dotsWrap.appendChild(dot);
    });
  }

  function updateReader() {
    const page = guidePages[currentPage];

    if (!page) {
      return;
    }

    pageNumber.textContent = padPageNumber(currentPage + 1);
    pageTitle.textContent = page.title;
    pageDesc.textContent = page.desc;

    bookImage.src = page.src;
    bookImage.alt = page.title;

    openPageBtn.href = page.src;

    prevPageBtn.disabled = currentPage === 0;
    nextPageBtn.disabled = currentPage === guidePages.length - 1;
    pageLeftBtn.disabled = currentPage === 0;
    pageRightBtn.disabled = currentPage === guidePages.length - 1;

    const progress = ((currentPage + 1) / guidePages.length) * 100;
    progressFill.style.width = progress + '%';

    renderDots();
  }

  function animateTurn(direction) {
    bookPage.classList.remove('turn-next', 'turn-prev');
    void bookPage.offsetWidth;
    bookPage.classList.add(direction === 'next' ? 'turn-next' : 'turn-prev');

    setTimeout(() => {
      bookPage.classList.remove('turn-next', 'turn-prev');
    }, 540);
  }

  function goToPage(index) {
    if (index < 0 || index >= guidePages.length || index === currentPage) {
      return;
    }

    const direction = index > currentPage ? 'next' : 'prev';

    currentPage = index;
    updateReader();
    animateTurn(direction);
  }

  function nextPage() {
    goToPage(currentPage + 1);
  }

  function prevPage() {
    goToPage(currentPage - 1);
  }

  prevPageBtn.addEventListener('click', prevPage);
  nextPageBtn.addEventListener('click', nextPage);
  pageLeftBtn.addEventListener('click', prevPage);
  pageRightBtn.addEventListener('click', nextPage);

  bookPage.addEventListener('touchstart', (event) => {
    const touch = event.changedTouches[0];

    touchStartX = touch.clientX;
    touchStartY = touch.clientY;
  }, { passive: true });

  bookPage.addEventListener('touchend', (event) => {
    const touch = event.changedTouches[0];
    const diffX = touch.clientX - touchStartX;
    const diffY = touch.clientY - touchStartY;

    if (Math.abs(diffX) > 55 && Math.abs(diffY) < 70) {
      if (diffX < 0) {
        nextPage();
      } else {
        prevPage();
      }
    }
  }, { passive: true });

  document.addEventListener('keydown', (event) => {
    const activeTag = document.activeElement ? document.activeElement.tagName : '';

    if (['INPUT', 'TEXTAREA', 'SELECT'].includes(activeTag)) {
      return;
    }

    if (event.key === 'ArrowRight') {
      nextPage();
    }

    if (event.key === 'ArrowLeft') {
      prevPage();
    }
  });

  updateReader();

  const copyGuideLink = document.getElementById('copyGuideLink');
  const copyFeedback = document.getElementById('copyFeedback');

  if (copyGuideLink && copyFeedback) {
    copyGuideLink.addEventListener('click', async () => {
      const url = copyGuideLink.dataset.copyUrl;

      try {
        await navigator.clipboard.writeText(url);
        copyFeedback.textContent = 'Link copied to clipboard.';
      } catch (error) {
        copyFeedback.textContent = 'Copy failed. You can copy the URL manually.';
      }

      copyFeedback.classList.add('show');

      setTimeout(() => {
        copyFeedback.classList.remove('show');
      }, 2600);
    });
  }
</script>

<?php
try {
    include('includes/footer.php');
} catch (Exception $e) {
    error_log("Failed to load footer.php: " . $e->getMessage());
}
?>