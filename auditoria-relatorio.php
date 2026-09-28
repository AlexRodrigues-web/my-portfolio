<?php
declare(strict_types=1);

header(
    'X-Robots-Tag: noindex, nofollow',
    true
);
header(
    'Cache-Control: private, no-store',
    true
);

require_once __DIR__ . '/includes/audit-sales.php';
require_once __DIR__ . '/includes/audit-fulfillment.php';

$id =
    preg_replace(
        '/\D+/',
        '',
        (string) (
            $_GET['id']
            ?? ''
        )
    );

$token =
    (string) (
        $_GET['token']
        ?? ''
    );

$order =
    adc_audit_get_order($id);

if (
    !$order
    || $token === ''
    || empty(
        $order['access_token']
    )
    || !hash_equals(
        (string) $order[
            'access_token'
        ],
        $token
    )
    || (
        $order['payment_status']
        ?? ''
    ) !== 'paid'
) {
    http_response_code(404);
    echo 'Relatório não encontrado.';
    exit;
}

$path =
    adc_audit_report_path($id);

if (
    !is_file($path)
) {
    adc_audit_fulfill_order(
        $id
    );
}

if (
    !is_file($path)
    || !is_readable($path)
) {
    http_response_code(503);
    echo 'O relatório ainda está a ser preparado.';
    exit;
}

header(
    'Content-Type: application/pdf'
);
header(
    'Content-Disposition: inline; filename="AlexDevCode-Auditoria-'
    . $id
    . '.pdf"'
);
header(
    'Content-Length: '
    . filesize($path)
);

readfile($path);
