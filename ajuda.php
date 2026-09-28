<?php
/* ajuda.php — Help Center / FAQ */
include_once 'includes/header.php';
?>

<main class="container faq">

  <h1><i data-lucide="life-buoy"></i> Help Center / FAQ</h1>
  <p class="intro">Common questions about publishing content on this open platform — no account needed.</p>

  <!-- Accordion FAQ -->
  <div class="accordion">

    <!-- Q1 – No account needed -->
    <details>
      <summary><i data-lucide="user-check"></i> Do I need to register or log in?</summary>
      <div>
        No. This platform is 100% open. You can publish job offers or résumés without creating an account.
      </div>
    </details>

    <!-- Q2 – How to publish -->
    <details>
      <summary><i data-lucide="file-plus"></i> How do I publish a job offer or résumé?</summary>
      <div>
        Go to <strong>Opportunities &rsaquo; New</strong>, choose the type of listing, fill in the form, and click "Publish".  
        Your content goes live immediately.
      </div>
    </details>

    <!-- Q3 – Editing or removing a post -->
    <details>
      <summary><i data-lucide="trash-2"></i> Can I remove or edit my post?</summary>
      <div>
        Yes. Each post shows a small trash or edit icon.  
        Click it to remove or update your listing anytime.
      </div>
    </details>

    <!-- Q4 – Expiration time -->
    <details>
      <summary><i data-lucide="clock-3"></i> How long does a job offer stay online?</summary>
      <div>
        Job offers remain visible for 15 days.  
        A "Renew" button appears 48 hours before expiry, allowing you to extend for another 15 days.  
        Résumés (CVs) never expire.
      </div>
    </details>

    <!-- Q5 – Privacy policy -->
    <details>
      <summary><i data-lucide="shield"></i> What about data privacy?</summary>
      <div>
        We don’t collect personal data or require accounts.  
        Only a minimal cookie is used to remember your theme preference.  
        Full details are available in our <a href="politica.php">Privacy Policy</a>.
      </div>
    </details>

    <!-- Q6 – Legal job rules (Portugal) -->
    <details>
      <summary><i data-lucide="gavel"></i> Are there legal requirements for job offers in Portugal?</summary>
      <div>

        <p>Yes. Job ads must comply with Portuguese labor law. Here’s a quick summary:</p>

        <table class="legal-table">
          <thead>
            <tr>
              <th>Topic</th>
              <th>Legal requirement</th>
              <th>Law</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>No discrimination</strong></td>
              <td>No preferences or restrictions by gender, age, nationality, etc.</td>
              <td>Art. 30.º(2), Labour Code</td>
            </tr>
            <tr>
              <td><strong>Content moderation</strong></td>
              <td>Admins must remove illegal content if notified.</td>
              <td>Art. 12.º, Decree-Law 7/2004</td>
            </tr>
            <tr>
              <td><strong>Offer standards</strong></td>
              <td>Job must include: clear duties, location, salary ≥ minimum wage.</td>
              <td>IEFP Guidelines</td>
            </tr>
            <tr>
              <td><strong>GDPR compliance</strong></td>
              <td>No personal data unless justified. Privacy info must be provided.</td>
              <td>GDPR + Law 58/2019</td>
            </tr>
          </tbody>
        </table>

        <p style="margin-top:1rem">
          <em>Note:</em> These are simplified rules. For full legal information, refer to our <a href="politica.php">Privacy Policy</a> and official sources.
        </p>

      </div>
    </details>

    <!-- Q7 – Contact -->
    <details>
      <summary><i data-lucide="mail"></i> Still have questions?</summary>
      <div>
        Feel free to reach out at <a href="mailto:alexrroliver200@gmail.com">alexrroliver200@gmail.com</a>.  
        We usually reply within 1 working day.
      </div>
    </details>

  </div>
</main>

<style>
.faq h1 {
  font-size:2.2rem;display:flex;align-items:center;gap:.6rem;
  color:var(--accent);margin-bottom:1rem
}
.faq .intro {
  font-size:1.05rem;color:var(--light-accent);margin-bottom:1.8rem
}
.accordion details {
  background:var(--dark);color:var(--text);border-radius:var(--radius);
  margin-bottom:1rem;padding:1rem 1.4rem;box-shadow:var(--shadow);
  transition:box-shadow .3s ease
}
.accordion details[open] {
  box-shadow:var(--shadow-hov)
}
.accordion summary {
  list-style:none;cursor:pointer;font-weight:600;
  display:flex;align-items:center;gap:.5rem;
}
.accordion summary::-webkit-details-marker {
  display:none
}
.accordion details div {
  margin-top:.8rem;line-height:1.6;color:var(--light-accent)
}
.legal-table {
  width:100%;border-collapse:collapse;font-size:.95rem;margin-top:.6rem;color:var(--text)
}
.legal-table thead tr {
  background:var(--accent)
}
.legal-table th, .legal-table td {
  padding:.6rem .8rem;border:1px solid rgba(255,255,255,.15)
}
.legal-table th {
  font-weight:600;text-align:left
}
.legal-table tbody tr:nth-child(even) {
  background:rgba(255,255,255,.05)
}
</style>

<?php include_once 'includes/footer.php'; ?>
