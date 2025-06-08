<?php
try {
    include('includes/header.php');
} catch (Exception $e) {
    error_log("Header include failed: " . $e->getMessage());
}
?>

<!-- HEAD: Google Fonts & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600&family=Dancing+Script:wght@400;500&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnH2N2..." crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
 :root{
  --dark:          #141414;   /* nearly-black for icons/strong text */
  --accent:        #8b735d;   /* deep earthy beige */
  --accent-dk:     #715d4b;   /* hover shade */
  --light-accent:  #c6b8a9;   /* subtle card/button bg */
  --bg:            #d7d9dd;   /* medium-gray page bg */
  --text:          #e9e5df;   /* text on dark surfaces */
  --radius:        20px;
  --transition:    0.3s ease;
  --shadow:        0 4px 14px rgba(0,0,0,.15);
  --shadow-hov:    0 8px 28px rgba(0,0,0,.25);
}
  *, *::before, *::after { box-sizing: border-box; margin:0; padding:0; }
  body {
    font-family: 'Poppins', sans-serif;
    background: var(--bg);
    color: #222;
    line-height: 1.6;
  }
  .container {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 0 1rem;
  }
  h1, h2 {
    font-family: 'Oswald', sans-serif;
    color: var(--dark);
    text-align: center;
    margin-bottom: 1rem;
  }
  h1 { font-size: 2.2rem; }
  h2 { font-size: 1.6rem; }

  /* BUSINESS CARD */
  #business-card {
    position: relative;
    background: var(--dark);
    color: var(--text);
    border-radius: var(--radius);
    overflow: hidden;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    padding: 2rem;
    margin: 2rem 0;
  }
  /* decorative circles */
  #business-card::before {
    content: '';
    position: absolute;
    bottom: -80px; right: -80px;
    width: 200px; height: 200px;
    background: var(--accent);
    border-radius: 50%;
  }
  #business-card::after {
    content: '';
    position: absolute;
    bottom: -50px; right: -50px;
    width: 150px; height: 150px;
    background: var(--light-accent);
    border-radius: 50%;
  }
  /* left info */
  #business-card .info {
    flex: 1 1 220px;
    z-index: 1;
  }
  #business-card .info .name {
    font-family: 'Oswald', sans-serif;
    font-size: 1.8rem;
    color: var(--accent);
    margin-bottom: 0.2rem;
  }
  #business-card .info .title {
    font-family: 'Dancing Script', cursive;
    font-size: 1.2rem;
    margin-bottom: 1rem;
    color: var(--light-accent);
  }
  #business-card .info .contact {
    font-size: 0.95rem;
    margin-bottom: 0.6rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  #business-card .info .contact i {
    color: var(--accent);
    width: 20px;
    text-align: center;
  }
  /* right photo */
  #business-card .photo {
    flex: 0 0 120px;
    margin-left: auto;
    z-index: 1;
  }
  #business-card .photo img {
    width: 120px; height: 120px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid var(--accent);
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
  }

  /* rest of page */
  section.form-section {
    background: #fff;
    padding: 2rem;
    border-radius: var(--radius);
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    margin-bottom: 2rem;
  }
  .form-section h2 { font-size:1.4rem; color:var(--dark); margin-bottom:1rem; }
  .form-section form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap:1.5rem;
  }
  .form-group {
    position: relative;
  }
  .form-group.full { grid-column:1/-1; }
  .form-group i {
    position:absolute; left:12px; top:50%; transform:translateY(-50%);
    color:#999;
  }
  input, textarea {
    width:100%; padding:0.75rem 1rem 0.75rem 2.5rem;
    border:1px solid #ccc; border-radius:8px;
    transition:border var(--transition), box-shadow var(--transition);
  }
  input:focus, textarea:focus {
    border-color:var(--accent); box-shadow:0 0 0 3px rgba(200,183,166,0.2); outline:none;
  }
  textarea { resize:vertical; min-height:140px; }
  .btn-submit {
    grid-column:1/-1;
    padding:1rem; background: var(--accent);
    color:var(--dark); border:none; border-radius:8px;
    font-weight:600; cursor:pointer;
    transition:background var(--transition), transform var(--transition);
  }
  .btn-submit:hover {
    background: var(--light-accent); transform:translateY(-2px);
  }

  /* ADDITIONAL INFO & CTA */
  #additional-info, #cta { text-align:center; margin-bottom:2rem; }
  #additional-info h2, #cta h2 { font-size:1.4rem; }
  #additional-info p, #cta p { margin-bottom:1rem; color:#555; }
  #additional-info a { color:var(--accent); margin:0 0.5rem; transition:color var(--transition); }
  #additional-info a:hover { color:var(--light-accent); }
  .btn-cta {
    padding:0.9rem 2rem; background:var(--accent);
    color:var(--dark); border:none; border-radius:8px;
    font-weight:600; cursor:pointer; transition:transform var(--transition);
  }
  .btn-cta:hover { transform:translateY(-2px); }

  @media(max-width:768px){
    #business-card { flex-direction:column; text-align:center; }
    #business-card .photo { margin:1rem auto 0; }
    .form-section form { grid-template-columns:1fr; }
  }
</style>

<div class="container">
    <!-- Contact Form -->
  <section class="form-section">
    <h2><i class="fas fa-envelope"></i> Send a Message</h2>
    <form method="post" action="enviar.php">
      <div class="form-group"><i class="fas fa-user"></i><input type="text" name="nome" placeholder="Your Name*" required></div>
      <div class="form-group"><i class="fas fa-at"></i><input type="email" name="email" placeholder="Your Email*" required></div>
      <div class="form-group full"><i class="fas fa-heading"></i><input type="text" name="assunto" placeholder="Subject"></div>
      <div class="form-group full"><i class="fas fa-comment-dots"></i><textarea name="mensagem" placeholder="Your Message*" required></textarea></div>
      <div class="form-group full"><i class="fas fa-shield-alt"></i><input type="text" name="verificacao" placeholder="Anti-spam: 5 + 7 = ?" required></div>
      <button type="submit" class="btn-submit">Send Message</button>
    </form>
  </section>

<!-- Business Card -->
  <section id="business-card">
    <div class="info">
      <div class="name">Alex Oliveira</div>
      <div class="title">Full Stack Web Developer</div>
      <div class="contact"><i class="fas fa-envelope"></i> alexrroliver200@gmail.com</div>
      <div class="contact"><i class="fab fa-whatsapp"></i> +351 932 121 766</div>
      <div class="contact"><i class="fas fa-map-marker-alt"></i> Vila Nova de Gaia, Portugal</div>
    </div>
    <div class="photo">
      <img src="assets/img/alex.png" alt="Alex Oliveira">
    </div>
  </section>

  <!-- Additional Info -->
  <section id="additional-info">
    <h2><i class="fas fa-info-circle"></i> Additional Info</h2>
    <p><strong>Response Time:</strong> Within 24 business hours</p>
    <p><a href="politica.php">Privacy Policy</a> | <a href="ajuda.php">Help Center / FAQ</a></p>
  </section>

  <!-- Call to Action -->
  <section id="cta">
    <h2><i class="fas fa-comments"></i> Let’s Talk!</h2>
    <p>I love turning ideas into reality. Click below and let’s start a conversation.</p>
    <button class="btn-cta" onclick="location.href='https://wa.me/351912345678'">
      <i class="fab fa-whatsapp"></i> Chat on WhatsApp
    </button>
  </section>
</div>

<?php
try {
    include('includes/footer.php');
} catch (Exception $e) {
    error_log("Footer include failed: " . $e->getMessage());
}
?>
