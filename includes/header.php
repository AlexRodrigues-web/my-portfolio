<?php
error_log('Header loaded (' . date('c') . ')');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>Alex Oliveira | Portfolio</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Main stylesheets -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/escuro.css"   id="darkSheet"    disabled>
  <link rel="stylesheet" href="assets/css/coloradd.css" id="colorAddSheet" disabled>

  <!-- Lucide icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Header-only CSS -->
  <style>
    :root{
      /* already defined in your global file – listed here for clarity */
      --dark:#1e1e1e; --accent:#8b735d; --accent-dk:#715d4b;
      --light-accent:#c6b8a9; --text:#ece8e1; --radius:20px;
    }

    /* Header shell */
    .topbar{
      position:sticky;top:0;z-index:1000;
      background:var(--dark);color:var(--text);
      border-bottom:4px solid var(--accent);
      box-shadow:0 3px 14px rgba(0,0,0,.13);
      padding:1rem 1.4rem;
    }
    .hdr{max-width:1200px;margin:auto;
         display:flex;align-items:center;gap:1.4rem;flex-wrap:wrap;}

    /* Logo */
    .logo{font-family:'Oswald',sans-serif;font-size:1.9rem;
          color:var(--accent);display:flex;align-items:center;gap:.4rem;
          text-decoration:none;white-space:nowrap;}
    .logo:hover{opacity:.8}

    /* Main navigation */
    .nav{flex:1;display:flex;justify-content:center;gap:2.1rem}
    .nav a{
      position:relative;color:var(--text);font-weight:500;
      text-decoration:none;transition:color .3s;}
    .nav a::after{
      content:'';position:absolute;left:0;bottom:-6px;height:2px;width:0;
      background:var(--accent);transition:width .3s;}
    .nav a:hover{color:var(--accent)}
    .nav a:hover::after{width:100%}

    /* Theme switchers */
    .themes{display:flex;gap:.8rem}
    .themes button{
      all:unset;cursor:pointer;color:var(--text);font-size:1.25rem;
      line-height:1;transition:transform .25s,color .25s;}
    .themes button:hover{color:var(--accent);transform:scale(1.2)}

    /* Burger (≤ 768 px) */
    .burger{display:none;background:none;border:0;cursor:pointer}
    .burger i{font-size:1.7rem;color:var(--text)}
    @media(max-width:768px){
      .burger{display:block;margin-left:auto}
      .nav{
        position:absolute;left:0;right:0;top:100%;
        flex-direction:column;align-items:center;gap:1.2rem;
        background:var(--dark);padding:1.2rem 0;border-bottom:4px solid var(--accent);
        transform-origin:top;transform:scaleY(0);transition:transform .3s;}
      .nav.open{transform:scaleY(1)}
      .themes{margin-left:auto}
    }

    /* Optional ColorADD legend (can be removed) */
    .legend{
      background:var(--light-accent);color:var(--dark);
      font-size:.85rem;display:flex;flex-wrap:wrap;gap:1.1rem;
      justify-content:center;padding:.6rem 1.2rem}
    body[data-tema="escuro"] .legend{background:#262626;color:var(--text)}
    .swatch{width:18px;height:18px;border-radius:3px;margin-right:4px;display:inline-block}
    .red{background:#d32f2f}.blue{background:#1976d2}
    .yellow{background:#fdd835}.green{background:#388e3c}
    .orange{background:#f57c00}.purple{background:#7b1fa2}
    .black{background:#000}.white{background:#fff;border:1px solid #ccc}
  </style>
</head>

<body data-tema="claro">

<header class="topbar">
  <div class="hdr">

    <!-- Logo -->
    <a class="logo" href="index.php" aria-label="Home">
      <i data-lucide="code"></i> Alex Oliveira
    </a>

    <!-- Main nav -->
    <nav class="nav" id="mainNav" aria-label="Primary">
      <a href="index.php">Home</a>
      <a href="sobre.php">About</a>
      <a href="projetos.php">Projects</a>
      <a href="oportunidades.php">Opportunities</a>
      <a href="contato.php">Contact</a>
      <a href="templates.php">Templates</a>
    </nav>

    <!-- Theme buttons -->
    <div class="themes" aria-label="Theme switch">
      <button id="lightBtn"  title="Light"><i data-lucide="sun"></i></button>
      <button id="darkBtn"   title="Dark"><i data-lucide="moon"></i></button>
      <button id="addBtn"    title="ColorADD"><i data-lucide="eye"></i></button>
    </div>

    <!-- Burger -->
    <button class="burger" id="burgerBtn" aria-label="Toggle menu">
      <i data-lucide="menu"></i>
    </button>
  </div>
</header>

<!-- ColorADD key -->
<div class="legend" id="colorLegend">
  <span><i class="swatch red"></i>Red</span>
  <span><i class="swatch blue"></i>Blue</span>
  <span><i class="swatch yellow"></i>Yellow</span>
  <span><i class="swatch green"></i>Green</span>
  <span><i class="swatch orange"></i>Orange</span>
  <span><i class="swatch purple"></i>Purple</span>
  <span><i class="swatch black"></i>Black</span>
  <span><i class="swatch white"></i>White</span>
</div>

<script>
/* icon set */
lucide.createIcons();

/* Theme toggling */
const body=document.body,
      darkCSS=document.getElementById('darkSheet'),
      addCSS =document.getElementById('colorAddSheet');
document.getElementById('lightBtn').onclick = ()=>{ body.dataset.tema='claro'; darkCSS.disabled=addCSS.disabled=true; };
document.getElementById('darkBtn' ).onclick = ()=>{ body.dataset.tema='escuro';darkCSS.disabled=false; addCSS.disabled=true; };
document.getElementById('addBtn'  ).onclick = ()=>{ body.dataset.tema='coloradd';addCSS.disabled=false; darkCSS.disabled=true; };

/* Burger behaviour */
const burger=document.getElementById('burgerBtn'),
      nav   =document.getElementById('mainNav');
burger.onclick = ()=> nav.classList.toggle('open');
nav.querySelectorAll('a').forEach(link=> link.onclick = ()=> nav.classList.remove('open'));
</script>
