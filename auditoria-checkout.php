<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('X-Robots-Tag: noindex, nofollow', true);

require_once __DIR__ . '/includes/i18n.php';
require_once __DIR__ . '/includes/audit-sales.php';

$lang = adc_lang();

if (
    empty($_SESSION['audit_checkout_csrf'])
) {
    $_SESSION['audit_checkout_csrf'] =
        bin2hex(
            random_bytes(32)
        );
}

$csrf =
    (string) $_SESSION['audit_checkout_csrf'];

$planId =
    trim(
        (string) (
            $_POST['plan']
            ?? $_GET['plan']
            ?? 'essencial'
        )
    );

$package =
    adc_audit_package($planId)
    ?? adc_audit_package('essencial');

$site =
    trim(
        (string) (
            $_POST['site']
            ?? $_GET['site']
            ?? ''
        )
    );

$name =
    trim(
        (string) (
            $_POST['name']
            ?? ''
        )
    );

$email =
    trim(
        (string) (
            $_POST['email']
            ?? ''
        )
    );

$errors = [];

$copy = [
    'pt' => [
        'title' => 'Checkout — Auditoria Express | AlexDevCode',
        'kicker' => 'Checkout seguro',
        'h1' => 'Concluir Auditoria Express',
        'intro' => 'Confirme os dados. O pagamento é feito numa página segura da IFTHENPAY quando o modo de produção estiver ativo.',
        'name' => 'Nome',
        'email' => 'Email',
        'site' => 'Site a analisar',
        'package' => 'Pacote',
        'total' => 'Total',
        'consent' => 'Aceito que os meus dados sejam usados para processar este pedido e a auditoria.',
        'pay' => 'Continuar para pagamento',
        'test' => 'Pagamento ainda em modo de teste. O pedido pode ser criado, mas nenhum valor será cobrado.',
        'back' => 'Voltar à Auditoria Express',
        'required' => 'Preencha os campos obrigatórios.',
        'invalid_email' => 'Informe um email válido.',
        'invalid_site' => 'Informe um endereço de site válido.',
        'invalid_csrf' => 'A sessão expirou. Atualize a página e tente novamente.',
        'save_error' => 'Não foi possível criar o pedido. Tente novamente.',
        'gateway_error' => 'O pedido foi criado, mas o pagamento online não pôde ser iniciado. Pode acompanhar o estado na página do pedido.',
        'privacy' => 'Política de Privacidade',
    ],
    'en' => [
        'title'=>'Checkout — Express Audit | AlexDevCode','kicker'=>'Secure checkout','h1'=>'Complete Express Audit','intro'=>'Confirm your details. Payment is handled on a secure IFTHENPAY page when production mode is active.','name'=>'Name','email'=>'Email','site'=>'Website to audit','package'=>'Package','total'=>'Total','consent'=>'I agree that my data may be used to process this order and audit.','pay'=>'Continue to payment','test'=>'Payment is still in test mode. The order can be created, but no real charge will be made.','back'=>'Back to Express Audit','required'=>'Please fill in the required fields.','invalid_email'=>'Enter a valid email address.','invalid_site'=>'Enter a valid website address.','invalid_csrf'=>'The session expired. Refresh the page and try again.','save_error'=>'The order could not be created. Try again.','gateway_error'=>'The order was created, but online payment could not be started. You can follow its status on the order page.','privacy'=>'Privacy Policy',
    ],
    'es' => [
        'title'=>'Checkout — Auditoría Express | AlexDevCode','kicker'=>'Checkout seguro','h1'=>'Completar Auditoría Express','intro'=>'Confirma tus datos. El pago se realiza en una página segura de IFTHENPAY cuando el modo de producción esté activo.','name'=>'Nombre','email'=>'Email','site'=>'Sitio a analizar','package'=>'Paquete','total'=>'Total','consent'=>'Acepto que mis datos se usen para procesar este pedido y la auditoría.','pay'=>'Continuar al pago','test'=>'El pago sigue en modo de prueba. El pedido puede crearse, pero no se cobrará ningún importe real.','back'=>'Volver a Auditoría Express','required'=>'Completa los campos obligatorios.','invalid_email'=>'Introduce un email válido.','invalid_site'=>'Introduce una dirección web válida.','invalid_csrf'=>'La sesión ha caducado. Actualiza la página e inténtalo de nuevo.','save_error'=>'No se pudo crear el pedido. Inténtalo de nuevo.','gateway_error'=>'El pedido se creó, pero no se pudo iniciar el pago online. Puedes seguir su estado en la página del pedido.','privacy'=>'Política de Privacidad',
    ],
];

$c =
    $copy[$lang]
    ?? $copy['pt'];

if (
    ($_SERVER['REQUEST_METHOD'] ?? '')
    === 'POST'
) {
    $postedCsrf =
        (string) (
            $_POST['csrf']
            ?? ''
        );

    if (
        $postedCsrf === ''
        || !hash_equals(
            $csrf,
            $postedCsrf
        )
    ) {
        $errors[] =
            $c['invalid_csrf'];
    }

    if (
        $name === ''
        || mb_strlen($name) < 2
    ) {
        $errors[] =
            $c['required'];
    }

    if (
        !filter_var(
            $email,
            FILTER_VALIDATE_EMAIL
        )
    ) {
        $errors[] =
            $c['invalid_email'];
    }

    if (
        $site !== ''
        && !preg_match(
            '~^https?://~i',
            $site
        )
    ) {
        $site =
            'https://'
            . $site;
    }

    if (
        !filter_var(
            $site,
            FILTER_VALIDATE_URL
        )
        || !in_array(
            strtolower(
                (string) parse_url(
                    $site,
                    PHP_URL_SCHEME
                )
            ),
            ['http', 'https'],
            true
        )
    ) {
        $errors[] =
            $c['invalid_site'];
    }

    if (
        empty(
            $_POST['consent']
        )
    ) {
        $errors[] =
            $c['required'];
    }

    if (!$errors) {
        try {
            $id =
                adc_audit_new_order_id();

            $accessToken =
                bin2hex(
                    random_bytes(24)
                );

            $order = [
                'id' => $id,
                'access_token' => $accessToken,
                'package_id' =>
                    (string) $package['id'],
                'package_name' =>
                    (string) $package['name'],
                'amount' =>
                    (float) $package['price'],
                'currency' => 'EUR',
                'site' => $site,
                'customer_name' => $name,
                'customer_email' =>
                    strtolower($email),
                'lang' => $lang,
                'payment_status' => 'pending',
                'order_status' =>
                    'pending_payment',
                'fulfillment_status' =>
                    'waiting_payment',
                'payment_mode' =>
                    adc_audit_payment_mode(),
                'created_at' => gmdate('c'),
                'updated_at' => gmdate('c'),
            ];

            if (
                !adc_audit_save_order(
                    $order
                )
            ) {
                throw new RuntimeException(
                    'save_failed'
                );
            }

            $statusUrl =
                'auditoria-pedido.php?id='
                . rawurlencode($id)
                . '&token='
                . rawurlencode(
                    $accessToken
                )
                . '&lang='
                . rawurlencode($lang);

            if (
                adc_audit_gateway_ready()
            ) {
                $paymentUrl =
                    adc_audit_create_payment_url(
                        $order
                    );

                if ($paymentUrl) {
                    header(
                        'Location: '
                        . $paymentUrl
                    );
                    exit;
                }

                $_SESSION['audit_checkout_notice'] =
                    $c['gateway_error'];
            }

            header(
                'Location: '
                . $statusUrl
            );
            exit;
        }
        catch (Throwable $e) {
            error_log(
                'Audit checkout create error: '
                . $e->getMessage()
            );

            $errors[] =
                $c['save_error'];
        }
    }
}

$adcPageMetaOverride = [
    'title' => $c['title'],
    'description' =>
        'Checkout Auditoria Express AlexDevCode.',
    'image' =>
        'https://alexdevcode.com/assets/img/alex-perfil.png',
    'path' => 'auditoria-checkout',
];

require_once __DIR__ . '/includes/header.php';

$e =
    static fn($v) =>
        htmlspecialchars(
            (string) $v,
            ENT_QUOTES,
            'UTF-8'
        );
?>
<style>
.adc-checkout{max-width:920px;margin:auto;padding:2rem 1rem 4rem;color:#242424}.adc-checkout-card{background:#fff;border:1px solid rgba(139,115,93,.18);border-radius:24px;box-shadow:0 16px 42px rgba(15,23,42,.08);padding:1.25rem}.adc-checkout-kicker{display:inline-flex;padding:.38rem .65rem;border-radius:999px;background:rgba(139,115,93,.11);color:#715d4b;font-size:.72rem;font-weight:800;text-transform:uppercase;letter-spacing:.07em}.adc-checkout h1{font-size:clamp(2rem,6vw,3.5rem);line-height:1;margin:.8rem 0}.adc-checkout p{color:#667085;line-height:1.7}.adc-checkout-grid{display:grid;grid-template-columns:1fr;gap:1rem;margin-top:1.2rem}.adc-field{display:grid;gap:.4rem}.adc-field label{font-size:.8rem;font-weight:800}.adc-field input{min-height:48px;border:1px solid rgba(20,20,20,.15);border-radius:12px;padding:0 .85rem;font:inherit}.adc-order-summary{display:grid;gap:.7rem;padding:1rem;border-radius:16px;background:#f7f4f0;margin-top:1.2rem}.adc-order-row{display:flex;justify-content:space-between;gap:1rem}.adc-order-total{font-size:1.2rem;font-weight:900;border-top:1px solid rgba(20,20,20,.1);padding-top:.7rem}.adc-consent{display:flex;align-items:flex-start;gap:.65rem;margin:1rem 0;color:#667085;font-size:.82rem;line-height:1.5}.adc-consent input{margin-top:.25rem}.adc-pay-btn{width:100%;min-height:50px;border:0;border-radius:999px;background:#141414;color:#fff;font-weight:900;cursor:pointer}.adc-errors,.adc-test{padding:.85rem 1rem;border-radius:12px;margin:1rem 0;font-size:.82rem}.adc-errors{background:#fff1f1;color:#a11}.adc-test{background:#fff9e8;color:#735c12}.adc-back{display:inline-flex;margin-top:1rem;color:#715d4b;font-weight:800;text-decoration:none}.adc-checkout-note{font-size:.75rem;text-align:center;margin-top:.8rem}.adc-checkout a{color:#715d4b}@media(min-width:720px){.adc-checkout-card{padding:2rem}.adc-checkout-grid{grid-template-columns:1fr 1fr}.adc-field-wide{grid-column:1/-1}}body[data-tema="escuro"] .adc-checkout{color:#eee}body[data-tema="escuro"] .adc-checkout-card{background:#202020;border-color:rgba(255,255,255,.1)}body[data-tema="escuro"] .adc-field input{background:#171717;color:#fff;border-color:rgba(255,255,255,.13)}body[data-tema="escuro"] .adc-order-summary{background:#292725}body[data-tema="escuro"] .adc-pay-btn{background:#8b735d}
</style>

<main class="adc-checkout">
    <section class="adc-checkout-card">
        <span class="adc-checkout-kicker"><?= $e($c['kicker']) ?></span>
        <h1><?= $e($c['h1']) ?></h1>
        <p><?= $e($c['intro']) ?></p>

        <?php if ($errors): ?>
            <div class="adc-errors">
                <?php foreach (array_unique($errors) as $error): ?>
                    <div><?= $e($error) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!adc_audit_gateway_ready()): ?>
            <div class="adc-test">
                <?= $e($c['test']) ?>
            </div>
        <?php endif; ?>

        <form method="post" autocomplete="on">
            <input type="hidden" name="csrf" value="<?= $e($csrf) ?>">
            <input type="hidden" name="plan" value="<?= $e((string)$package['id']) ?>">
            <input type="hidden" name="lang" value="<?= $e($lang) ?>">

            <div class="adc-checkout-grid">
                <div class="adc-field">
                    <label for="adcAuditName"><?= $e($c['name']) ?> *</label>
                    <input id="adcAuditName" name="name" required maxlength="100" autocomplete="name" value="<?= $e($name) ?>">
                </div>

                <div class="adc-field">
                    <label for="adcAuditEmail"><?= $e($c['email']) ?> *</label>
                    <input id="adcAuditEmail" name="email" type="email" required maxlength="160" autocomplete="email" value="<?= $e($email) ?>">
                </div>

                <div class="adc-field adc-field-wide">
                    <label for="adcAuditSite"><?= $e($c['site']) ?> *</label>
                    <input id="adcAuditSite" name="site" type="url" required maxlength="2048" autocomplete="url" value="<?= $e($site) ?>" placeholder="https://">
                </div>
            </div>

            <div class="adc-order-summary">
                <div class="adc-order-row">
                    <span><?= $e($c['package']) ?></span>
                    <strong><?= $e((string)$package['name']) ?></strong>
                </div>
                <div class="adc-order-row adc-order-total">
                    <span><?= $e($c['total']) ?></span>
                    <strong><?= number_format((float)$package['price'], 2, ',', '.') ?> €</strong>
                </div>
            </div>

            <label class="adc-consent">
                <input type="checkbox" name="consent" value="1" required <?= !empty($_POST['consent']) ? 'checked' : '' ?>>
                <span>
                    <?= $e($c['consent']) ?>
                    <a href="<?= $e(adc_url('politica.php')) ?>" target="_blank" rel="noopener"><?= $e($c['privacy']) ?></a>.
                </span>
            </label>

            <button class="adc-pay-btn" type="submit">
                <?= $e($c['pay']) ?> →
            </button>
        </form>

        <p class="adc-checkout-note">
            IFTHENPAY · EUR · AlexDevCode
        </p>

        <a class="adc-back" href="<?= $e(adc_url('auditoria-express.php')) ?>">
            ← <?= $e($c['back']) ?>
        </a>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
