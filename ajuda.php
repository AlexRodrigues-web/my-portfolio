<?php
/* ajuda.php — Help Center / FAQ */
include_once 'includes/header.php';
?>

<main class="container faq">

  <h1><i data-lucide="life-buoy"></i> Help Center / FAQ</h1>
  <p class="intro">Quick answers about publishing jobs and résumés on this open platform.</p>

  <!-- Accordion FAQ -->
  <div class="accordion">

    <!-- Q1 – No account needed -->
    <details>
      <summary><i data-lucide="user-check"></i> Do I need an account to publish?</summary>
      <div>
        No account is required. Simply open <strong>Opportunities&nbsp;&rsaquo;&nbsp;New</strong>,
        choose the type of post, fill in the form and hit “Publish”. Your listing goes live instantly.
      </div>
    </details>

    <!-- Q2 -->
    <details>
      <summary><i data-lucide="file-text"></i> What happens when my job post expires?</summary>
      <div>
        Job and internship posts are visible for 15&nbsp;days.  
        You’ll see a “Renew” button 48&nbsp;hours before expiry—click it to extend for another 15&nbsp;days.  
        Résumés (CVs) do not expire.
      </div>
    </details>

    <!-- Q3 -->
    <details>
      <summary><i data-lucide="eye-off"></i> Can I remove my post early?</summary>
      <div>
        Yes. Every card has a small trash-can icon.  
        Click it, confirm, and the post disappears immediately.
      </div>
    </details>

    <!-- Q4 -->
    <details>
      <summary><i data-lucide="shield"></i> Where can I read the privacy policy?</summary>
      <div>
        The full policy is available <a href="politica.php">here</a>.
      </div>
    </details>

    <!-- Q5 -->
    <details>
      <summary><i data-lucide="gavel"></i> What are the legal rules for job offers in Portugal?</summary>
      <div>

        <p>Below is a concise checklist of the main legal requirements you must follow when publishing an open job offer in Portugal.</p>

        <table class="legal-table">
          <thead>
            <tr>
              <th>Topic</th>
              <th>Legal requirement</th>
              <th>Where in the law</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>No discrimination</strong></td>
              <td>
                Ads must <em>not</em> set any restriction or preference based on
                gender, age, race/ethnicity, disability, sexual orientation,
                nationality, religion, etc.
              </td>
              <td>Art.&nbsp;30.º&nbsp;(2) &mdash; Portuguese Labour Code</td>
            </tr>
            <tr>
              <td><strong>Content monitoring</strong></td>
              <td>
                The platform admin has no general duty to monitor all user
                content, but must remove or block any manifestly illegal ad
                quickly after becoming aware of it.
              </td>
              <td>Art.&nbsp;12.º, Decree-Law&nbsp;7/2004 (E-Commerce Directive)</td>
            </tr>
            <tr>
              <td><strong>Quality standards (IEFP)</strong></td>
              <td>
                Each offer must: <br>a) clearly describe duties;<br>
                b) state location and pay &ge; minimum wage;<br>
                c) be free from discrimination.
              </td>
              <td>“Normas gerais das Ofertas de Emprego”, IEFP, p.&nbsp;3</td>
            </tr>
            <tr>
              <td><strong>Data protection</strong></td>
              <td>
                Any personal data (candidates or advertisers) must be processed
                under GDPR + Law&nbsp;58/2019. Provide a legal basis (e.g.,
                consent) and a privacy notice.
              </td>
              <td>GDPR &amp; Law&nbsp;58/2019</td>
            </tr>
          </tbody>
        </table>

        <p style="margin-top:1rem">
          <em>⚠️ Note:</em> The above is only a quick reference. For full details,
          please review our <a href="politica.php">Terms &amp; Conditions</a>
          and consult the original legal texts if needed.
        </p>

      </div>
    </details>

    <!-- Q6 -->
    <details>
      <summary><i data-lucide="mail"></i> Need more help?</summary>
      <div>
        Drop an e-mail to <a href="mailto:alexrroliver200@gmail.com">alexrroliver200@gmail.com</a>.  
        We reply within one working day.
      </div>
    </details>

  </div>
</main>

<!-- Page-specific styles -->
<style>
.faq h1{
  font-size:2.2rem;display:flex;align-items:center;gap:.6rem;
  color:var(--accent);margin-bottom:1rem
}
.faq .intro{font-size:1.05rem;color:var(--light-accent);margin-bottom:1.8rem}

.accordion details{
  background:var(--dark);color:var(--text);border-radius:var(--radius);
  margin-bottom:1rem;padding:1rem 1.4rem;box-shadow:var(--shadow);
  transition:box-shadow .3s ease
}
.accordion details[open]{box-shadow:var(--shadow-hov)}
.accordion summary{
  list-style:none;cursor:pointer;font-weight:600;
  display:flex;align-items:center;gap:.5rem;
}
.accordion summary::-webkit-details-marker{display:none}
.accordion details div{margin-top:.8rem;line-height:1.6;color:var(--light-accent)}

/* Legal table */
.legal-table{
  width:100%;border-collapse:collapse;font-size:.95rem;margin-top:.6rem;color:var(--text)
}
.legal-table thead tr{background:var(--accent)}
.legal-table th,.legal-table td{padding:.6rem .8rem;border:1px solid rgba(255,255,255,.15)}
.legal-table th{font-weight:600;text-align:left}
.legal-table tbody tr:nth-child(even){background:rgba(255,255,255,.05)}
</style>

<?php include_once 'includes/footer.php'; ?>
