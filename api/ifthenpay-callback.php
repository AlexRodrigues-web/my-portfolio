<?php
declare(strict_types=1);

header('Content-Type: text/plain; charset=UTF-8');
header('X-Robots-Tag: noindex, nofollow', true);
header('Cache-Control: no-store');

require_once dirname(__DIR__) . '/includes/audit-sales.php';
require_once dirname(__DIR__) . '/includes/audit-fulfillment.php';

[$valid, $result] =
    adc_audit_verify_callback(
        $_GET
    );

if (!$valid) {
    http_response_code(403);
    echo 'ERROR';
    exit;
}

$order =
    $result;

$updated =
    adc_audit_mark_paid(
        (string) $order['id'],
        'ifthenpay_callback',
        [
            'payment_method' =>
                substr(
                    trim(
                        (string) (
                            $_GET['payment_method']
                            ?? ''
                        )
                    ),
                    0,
                    50
                ),
            'payment_datetime' =>
                substr(
                    trim(
                        (string) (
                            $_GET['payment_datetime']
                            ?? ''
                        )
                    ),
                    0,
                    80
                ),
        ]
    );

if (!$updated) {
    http_response_code(500);
    echo 'ERROR';
    exit;
}

/*
 * O pagamento já está confirmado.
 * A entrega é tentada imediatamente.
 * Se PDF/email falharem, mantemos o pagamento confirmado
 * e registamos o estado do fulfillment para recuperação.
 */
adc_audit_fulfill_order(
    (string) $updated['id']
);

echo 'OK';
