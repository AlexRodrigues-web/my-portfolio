<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('X-Robots-Tag: noindex, nofollow', true);

require_once __DIR__ . '/includes/i18n.php';
require_once __DIR__ . '/includes/audit-sales.php';
require_once __DIR__ . '/includes/audit-fulfillment.php';

$lang = adc_lang();

$id =
    preg_replace(
        '/\D+/',
        '',
        (string) (
            $_GET['id']
            ?? $_POST['id']
            ?? ''
        )
    );

$token =
    (string) (
        $_GET['token']
        ?? $_POST['token']
        ?? ''
    );

$order =
    adc_audit_get_order($id);

$validAccess =
    $order
    && $token !== ''
    && !empty($order['access_token'])
    && hash_equals(
        (string) $order['access_token'],
        $token
    );

if (!$validAccess) {
    http_response_code(404);
    echo 'Pedido não encontrado.';
    exit;
}

if (
    empty($_SESSION['audit_order_csrf'])
) {
    $_SESSION['audit_order_csrf'] =
        bin2hex(
            random_bytes(32)
        );
}

$csrf =
    (string) $_SESSION['audit_order_csrf'];

if (
    ($_SERVER['REQUEST_METHOD'] ?? '')
    === 'POST'
    && (
        $_POST['action']
        ?? ''
    ) === 'simulate_paid'
) {
    $postedCsrf =
        (string) (
            $_POST['csrf']
            ?? ''
        );

    if (
        adc_audit_payment_mode()
        === 'test'
        && adc_audit_is_local()
        && hash_equals(
            $csrf,
            $postedCsrf
        )
    ) {
        $order =
            adc_audit_mark_paid(
                $id,
                'local_test'
            )
            ?? $order;

        adc_audit_fulfill_order(
            $id
        );

        $order =
            adc_audit_get_order(
                $id
            )
            ?? $order;
    }
}

$notice =
    (string) (
        $_SESSION['audit_checkout_notice']
        ?? ''
    );

unset(
    $_SESSION['audit_checkout_notice']
);

$copy = [
    'pt' => [
        'title'=>'Pedido de Auditoria | AlexDevCode','kicker'=>'Pedido criado','h1'=>'Estado da sua Auditoria Express','order'=>'Pedido','site'=>'Site','package'=>'Pacote','amount'=>'Valor','payment'=>'Pagamento','status'=>'Estado','pending'=>'Aguardando pagamento','paid'=>'Pagamento confirmado','waiting'=>'Aguardando confirmação segura do pagamento.','paid_text'=>'Pagamento confirmado. A preparação da auditoria foi iniciada automaticamente.','report_ready'=>'O seu relatório está pronto.','report_btn'=>'Abrir relatório PDF','processing'=>'O relatório ainda está a ser preparado.','test'=>'Este pedido está em modo de teste e nenhum valor real foi cobrado.','simulate'=>'Simular pagamento aprovado (local)','back'=>'Voltar à Auditoria Express','success_return'=>'O gateway indicou retorno de sucesso. Estamos aguardando/validando a confirmação segura do pagamento.','cancel_return'=>'O pagamento foi cancelado ou interrompido. O pedido continua pendente.','error_return'=>'O gateway informou um erro. O pedido continua pendente.',
    ],
    'en' => [
        'title'=>'Audit Order | AlexDevCode','kicker'=>'Order created','h1'=>'Your Express Audit status','order'=>'Order','site'=>'Website','package'=>'Package','amount'=>'Amount','payment'=>'Payment','status'=>'Status','pending'=>'Awaiting payment','paid'=>'Payment confirmed','waiting'=>'Waiting for secure payment confirmation.','paid_text'=>'Payment confirmed. Audit preparation started automatically.','report_ready'=>'Your report is ready.','report_btn'=>'Open PDF report','processing'=>'The report is still being prepared.','test'=>'This order is in test mode and no real amount was charged.','simulate'=>'Simulate approved payment (local)','back'=>'Back to Express Audit','success_return'=>'The gateway returned success. We are waiting for/validating secure payment confirmation.','cancel_return'=>'Payment was cancelled or interrupted. The order remains pending.','error_return'=>'The gateway reported an error. The order remains pending.',
    ],
    'es' => [
        'title'=>'Pedido de Auditoría | AlexDevCode','kicker'=>'Pedido creado','h1'=>'Estado de tu Auditoría Express','order'=>'Pedido','site'=>'Sitio','package'=>'Paquete','amount'=>'Importe','payment'=>'Pago','status'=>'Estado','pending'=>'Esperando pago','paid'=>'Pago confirmado','waiting'=>'Esperando confirmación segura del pago.','paid_text'=>'Pago confirmado. La preparación de la auditoría comenzó automáticamente.','report_ready'=>'Tu informe está listo.','report_btn'=>'Abrir informe PDF','processing'=>'El informe todavía se está preparando.','test'=>'Este pedido está en modo de prueba y no se ha cobrado ningún importe real.','simulate'=>'Simular pago aprobado (local)','back'=>'Volver a Auditoría Express','success_return'=>'La pasarela indicó retorno exitoso. Estamos esperando/validando la confirmación segura del pago.','cancel_return'=>'El pago fue cancelado o interrumpido. El pedido sigue pendiente.','error_return'=>'La pasarela informó un error. El pedido sigue pendiente.',
    ],
];

$c =
    $copy[$lang]
    ?? $copy['pt'];

$isPaid =
    ($order['payment_status'] ?? '')
    === 'paid';


if (
    $isPaid
    && !is_file(
        adc_audit_report_path(
            $id
        )
    )
) {
    adc_audit_fulfill_order(
        $id
    );

    $order =
        adc_audit_get_order(
            $id
        )
        ?? $order;
}


$reportReady =
    $isPaid
    && is_file(
        adc_audit_report_path(
            $id
        )
    );


$reportUrl =
    $reportReady
        ? 'auditoria-relatorio.php?id='
            . rawurlencode($id)
            . '&token='
            . rawurlencode($token)
        : '';


$returnState =
    strtolower(
        (string) (
            $_GET['payment']
            ?? ''
        )
    );

$returnMessage = '';

if (!$isPaid) {
    if ($returnState === 'success') {
        $returnMessage =
            $c['success_return'];
    }
    elseif ($returnState === 'cancel') {
        $returnMessage =
            $c['cancel_return'];
    }
    elseif ($returnState === 'error') {
        $returnMessage =
            $c['error_return'];
    }
}

$adcPageMetaOverride = [
    'title' => $c['title'],
    'description' =>
        'Estado do pedido de Auditoria Express.',
    'image' =>
        'https://alexdevcode.com/assets/img/alex-perfil.png',
    'path' => 'auditoria-pedido',
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
.audit-order{max-width:820px;margin:auto;padding:2rem 1rem 4rem}.audit-order-card{background:#fff;border:1px solid rgba(139,115,93,.18);border-radius:24px;box-shadow:0 16px 42px rgba(15,23,42,.08);padding:1.3rem}.audit-order-kicker{display:inline-flex;padding:.38rem .65rem;border-radius:999px;background:rgba(139,115,93,.11);color:#715d4b;font-size:.72rem;font-weight:800;text-transform:uppercase}.audit-order h1{font-size:clamp(2rem,6vw,3.3rem);line-height:1;margin:.8rem 0}.audit-order-grid{display:grid;gap:.7rem;margin:1.2rem 0}.audit-order-row{display:grid;grid-template-columns:110px 1fr;gap:1rem;padding:.75rem 0;border-bottom:1px solid rgba(20,20,20,.08)}.audit-order-row span{color:#667085;font-size:.8rem}.audit-order-row strong{overflow-wrap:anywhere}.audit-status{padding:1rem;border-radius:14px;font-weight:800}.audit-status.pending{background:#fff8e7;color:#735c12}.audit-status.paid{background:#edf9f0;color:#146c2e}.audit-note{margin-top:.8rem;padding:.8rem 1rem;border-radius:12px;background:#f7f4f0;color:#667085;font-size:.82rem}.audit-simulate{margin-top:1rem}.audit-simulate button{border:0;border-radius:999px;background:#141414;color:#fff;padding:.75rem 1rem;font-weight:800;cursor:pointer}.audit-report-btn{display:inline-flex;align-items:center;justify-content:center;margin-top:1rem;padding:.8rem 1rem;border-radius:999px;background:#141414;color:#fff!important;text-decoration:none;font-weight:900}.audit-back{display:inline-flex;margin-top:1rem;color:#715d4b;font-weight:800;text-decoration:none}body[data-tema="escuro"] .audit-order-card{background:#202020;border-color:rgba(255,255,255,.1)}body[data-tema="escuro"] .audit-order-row{border-color:rgba(255,255,255,.08)}body[data-tema="escuro"] .audit-note{background:#292725}
</style>

<main class="audit-order">
    <section class="audit-order-card">
        <span class="audit-order-kicker"><?= $e($c['kicker']) ?></span>
        <h1><?= $e($c['h1']) ?></h1>

        <div class="audit-order-grid">
            <div class="audit-order-row"><span><?= $e($c['order']) ?></span><strong>#<?= $e($id) ?></strong></div>
            <div class="audit-order-row"><span><?= $e($c['site']) ?></span><strong><?= $e((string)$order['site']) ?></strong></div>
            <div class="audit-order-row"><span><?= $e($c['package']) ?></span><strong><?= $e((string)$order['package_name']) ?></strong></div>
            <div class="audit-order-row"><span><?= $e($c['amount']) ?></span><strong><?= number_format((float)$order['amount'], 2, ',', '.') ?> €</strong></div>
        </div>

        <div class="audit-status <?= $isPaid ? 'paid' : 'pending' ?>">
            <?= $e($isPaid ? $c['paid'] : $c['pending']) ?>
        </div>

        <p>
            <?= $e(
                $reportReady
                    ? $c['report_ready']
                    : (
                        $isPaid
                            ? $c['paid_text']
                            : $c['waiting']
                    )
            ) ?>
        </p>

        <?php if ($reportReady): ?>
            <a
                class="audit-report-btn"
                href="<?= $e($reportUrl) ?>"
                target="_blank"
                rel="noopener"
            >
                <?= $e($c['report_btn']) ?> →
            </a>
        <?php elseif ($isPaid): ?>
            <div class="audit-note">
                <?= $e($c['processing']) ?>
            </div>
        <?php endif; ?>

        <?php if ($returnMessage !== ''): ?>
            <div class="audit-note"><?= $e($returnMessage) ?></div>
        <?php endif; ?>

        <?php if ($notice !== ''): ?>
            <div class="audit-note"><?= $e($notice) ?></div>
        <?php endif; ?>

        <?php if (adc_audit_payment_mode() === 'test'): ?>
            <div class="audit-note"><?= $e($c['test']) ?></div>
        <?php endif; ?>

        <?php if (
            !$isPaid
            && adc_audit_payment_mode() === 'test'
            && adc_audit_is_local()
        ): ?>
            <form class="audit-simulate" method="post">
                <input type="hidden" name="csrf" value="<?= $e($csrf) ?>">
                <input type="hidden" name="id" value="<?= $e($id) ?>">
                <input type="hidden" name="token" value="<?= $e($token) ?>">
                <input type="hidden" name="action" value="simulate_paid">
                <button type="submit"><?= $e($c['simulate']) ?></button>
            </form>
        <?php endif; ?>

        <a class="audit-back" href="<?= $e(adc_url('auditoria-express.php')) ?>">← <?= $e($c['back']) ?></a>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
