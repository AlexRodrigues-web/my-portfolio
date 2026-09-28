<?php
/* politica.php — Updated Privacy Policy */
include_once 'includes/header.php';
?>

<main class="container policy">

  <h1><i data-lucide="shield-check"></i> Privacy Policy</h1>
  <p class="intro">
    Your privacy is important — and we respect it.  
    This platform was designed to be safe, transparent, and free of unnecessary data collection.
  </p>

  <!-- 1 ▸ No account, no login -->
  <section>
    <h2>1. No accounts, no logins</h2>
    <p>
      This site does not require user registration or authentication.  
      You can freely browse, share job listings, or publish your résumé without creating an account.
    </p>
  </section>

  <!-- 2 ▸ No automatic data collection -->
  <section>
    <h2>2. No automatic data collection</h2>
    <p>
      We do not collect or store personal data such as names, emails, passwords, or locations.  
      There are no trackers, ads, or third-party scripts (except Google Analytics for basic visitor stats).
    </p>
  </section>

  <!-- 3 ▸ Cookies -->
  <section>
    <h2>3. Cookies</h2>
    <p>
      This site uses only a minimal cookie to store your theme preference (light/dark).  
      No session cookies, login persistence, or advertising cookies are used.
    </p>
  </section>

  <!-- 4 ▸ Public content -->
  <section>
    <h2>4. Public content</h2>
    <p>
      Job listings and résumés are publicly visible.  
      Avoid posting sensitive personal information (e.g., address, phone number) unless necessary.
    </p>
  </section>

  <!-- 5 ▸ Respecting your rights -->
  <section>
    <h2>5. Your rights</h2>
    <p>
      If you’ve posted content and wish to edit or remove it, just send us an email.  
      We'll process your request quickly and respectfully.
    </p>
    <p>Contact: <a href="mailto:alexrroliver200@gmail.com">alexrroliver200@gmail.com</a></p>
  </section>

  <!-- 6 ▸ Legal disclaimer (Portugal) -->
  <section>
    <h2>6. Legal disclaimer (Portugal)</h2>
    <p>
      Public job offers must follow basic legal and ethical standards, including:
    </p>
    <ul>
      <li>No discriminatory content (gender, age, origin, disability, etc.)</li>
      <li>Job details should be clear and truthful</li>
      <li>Minimum wage must be respected</li>
      <li>All content remains the responsibility of the submitter</li>
    </ul>
    <p class="legal-note">Sources: Portuguese Labour Code • IEFP • Decree-Law 7/2004</p>
  </section>

</main>

<style>
.policy h1{
  font-size:2.2rem;display:flex;align-items:center;gap:.6rem;
  color:var(--accent);margin-bottom:1rem
}
.policy .intro{font-size:1.05rem;color:var(--light-accent);margin-bottom:2rem}
.policy section{margin-bottom:2rem}
.policy h2{color:var(--accent-dk);margin-bottom:.6rem;font-size:1.3rem}
.policy ul{margin-left:1.1rem;list-style:disc}
.policy li{margin:.35rem 0;line-height:1.6}
.legal-note{font-size:.85rem;color:var(--light-accent);margin-top:.6rem}
</style>

<?php include_once 'includes/footer.php'; ?>
