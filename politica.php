<?php
/* politica.php — Privacy Policy */
include_once 'includes/header.php';
?>

<!--  ───  PAGE CONTENT  ─── -->
<main class="container policy">

  <h1><i data-lucide="shield-check"></i> Privacy Policy</h1>
  <p class="intro">
    Your privacy matters to us. This document explains <strong>what data we collect, why we collect it, and how you can manage it</strong>.
  </p>

  <!-- 1 ▸ Information we collect -->
  <section>
    <h2>1. Information we collect</h2>
    <ul>
      <li><strong>Account data:</strong> name, e-mail and password hash.</li>
      <li><strong>Usage data:</strong> pages visited, IP address, browser details.</li>
      <li><strong>Content:</strong> résumés / job offers you voluntarily publish.</li>
    </ul>
  </section>

  <!-- 2 ▸ How we use it -->
  <section>
    <h2>2. How we use your data</h2>
    <p>
      Data is processed to deliver the service, improve performance, prevent fraud and—if you opt-in—send occasional updates.
      We <em>never</em> sell personal information.
    </p>
  </section>

  <!-- 3 ▸ Cookies -->
  <section>
    <h2>3. Cookies</h2>
    <p>
      Only minimal first-party cookies are set (session ID, theme preference).  
      Disabling cookies may limit core functionality such as login persistence.
    </p>
  </section>

  <!-- 4 ▸ Your rights -->
  <section>
    <h2>4. Your rights</h2>
    <ul>
      <li>Access or export your personal data.</li>
      <li>Rectify inaccurate information.</li>
      <li>Erase your account (“right to be forgotten”).</li>
      <li>Object to specific processing.</li>
    </ul>
    <p>Send requests to <a href="mailto:alexrroliver200@gmail.com">alexrroliver200@gmail.com</a>. We reply within 30 days.</p>
  </section>

  <!-- 5 ▸ Legal Rules for Job Listings (Portugal) -->
  <section>
    <h2>5. Legal Rules for Job Listings (Portugal)</h2>
    <p>Public job offers on this platform must comply with the following Portuguese legal requirements:</p>
    <table class="job-rules">
      <thead>
        <tr>
          <th>Requirement</th>
          <th>Legal Basis</th>
          <th>Reference</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>No discrimination in ads</td>
          <td>Ads must not contain any restriction or preference based on gender, age, race/ethnicity, disability, sexual orientation, nationality, religion, etc.</td>
          <td>Art. 30.º(2), <br>Portuguese Labour Code</td>
        </tr>
        <tr>
          <td>Content moderation</td>
          <td>The platform administrator has no general duty to monitor all posts, but must remove illegal listings once notified.</td>
          <td>Art. 12.º, <br>Decree-Law 7/2004</td>
        </tr>
        <tr>
          <td>Quality standards</td>
          <td>Listings must clearly describe the job, specify the location and salary (≥ minimum wage), and be free of discrimination.</td>
          <td>IEFP, "General Rules for Job Offers", p. 3</td>
        </tr>
        <tr>
          <td>Data protection</td>
          <td>Personal data (name, e-mail, IP, cookies, etc.) must comply with GDPR and Law 58/2019. Requires legal basis (e.g., consent) and privacy notice.</td>
          <td>GDPR + Law 58/2019</td>
        </tr>
      </tbody>
    </table>
    <p class="legal-note">Source: sabiasque.pt • wipo.int • iefp.pt • bairrossaudaveis.gov.pt</p>
  </section>

  <!-- 6 ▸ Contact -->
  <section>
    <h2>6. Contact</h2>
    <p>
      Questions regarding this policy? <br>
      <i data-lucide="mail" style="vertical-align:middle"></i>
      <a href="mailto:alexrroliver200@gmail.com">alexrroliver200@gmail.com</a>
    </p>
  </section>

</main>

<!--  ───  PAGE-SPECIFIC STYLES  ─── -->
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

/* Job Legal Table */
table.job-rules{
  width:100%;border-collapse:collapse;margin-top:1rem;font-size:.96rem
}
table.job-rules th, table.job-rules td{
  border:1px solid var(--border);padding:.75rem;text-align:left;vertical-align:top
}
table.job-rules th{background:var(--bg-dk);color:var(--text);font-weight:600}
table.job-rules td strong{font-weight:600}
.legal-note{font-size:.85rem;color:var(--light-accent);margin-top:.6rem}
</style>

<?php include_once 'includes/footer.php'; ?>
