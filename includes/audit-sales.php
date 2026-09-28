<?php
declare(strict_types=1);

/**
 * AlexDevCode — Auditoria Express sales/payment helpers.
 * Secrets live in the project .env, never in public files.
 */

function adc_audit_env_all(): array
{
    static $values = null;

    if (is_array($values)) {
        return $values;
    }

    $values = [];
    $envFile = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';

    if (is_file($envFile) && is_readable($envFile)) {
        $lines = file(
            $envFile,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        if (is_array($lines)) {
            foreach ($lines as $line) {
                $line = trim((string) $line);

                if (
                    $line === ''
                    || str_starts_with($line, '#')
                    || !str_contains($line, '=')
                ) {
                    continue;
                }

                [$key, $value] =
                    array_map(
                        'trim',
                        explode('=', $line, 2)
                    );

                $value =
                    trim(
                        $value,
                        " \t\n\r\0\x0B\"'"
                    );

                if ($key !== '') {
                    $values[$key] = $value;
                }
            }
        }
    }

    return $values;
}

function adc_audit_env(
    string $key,
    string $default = ''
): string {
    $system =
        getenv($key);

    if (
        $system !== false
        && $system !== ''
    ) {
        return (string) $system;
    }

    if (
        isset($_ENV[$key])
        && $_ENV[$key] !== ''
    ) {
        return (string) $_ENV[$key];
    }

    $values =
        adc_audit_env_all();

    return
        isset($values[$key])
        && $values[$key] !== ''
            ? (string) $values[$key]
            : $default;
}

function adc_audit_packages(): array
{
    return [
        'essencial' => [
            'id' => 'essencial',
            'name' => 'Auditoria Essencial',
            'price' => 19.00,
        ],
        'pro' => [
            'id' => 'pro',
            'name' => 'Auditoria Pro',
            'price' => 39.00,
        ],
        'correcao' => [
            'id' => 'correcao',
            'name' => 'Auditoria + Correção Inicial',
            'price' => 79.00,
        ],
    ];
}

function adc_audit_package(
    string $id
): ?array {
    $packages =
        adc_audit_packages();

    return
        $packages[$id]
        ?? null;
}

function adc_audit_orders_dir(): string
{
    return
        dirname(__DIR__)
        . DIRECTORY_SEPARATOR
        . 'storage'
        . DIRECTORY_SEPARATOR
        . 'audit-orders';
}

function adc_audit_ensure_storage(): bool
{
    $dir =
        adc_audit_orders_dir();

    if (
        !is_dir($dir)
        && !@mkdir(
            $dir,
            0750,
            true
        )
    ) {
        return false;
    }

    return
        is_dir($dir)
        && is_writable($dir);
}

function adc_audit_order_path(
    string $id
): string {
    if (
        !preg_match(
            '/^[0-9]{10,15}$/',
            $id
        )
    ) {
        return '';
    }

    return
        adc_audit_orders_dir()
        . DIRECTORY_SEPARATOR
        . $id
        . '.json';
}

function adc_audit_new_order_id(): string
{
    for ($attempt = 0; $attempt < 10; $attempt++) {
        $id =
            date('ymdHis')
            . (string) random_int(
                10,
                99
            );

        $path =
            adc_audit_order_path($id);

        if (
            $path !== ''
            && !is_file($path)
        ) {
            return $id;
        }

        usleep(1000);
    }

    throw new RuntimeException(
        'Não foi possível gerar o ID do pedido.'
    );
}

function adc_audit_save_order(
    array $order
): bool {
    if (
        !adc_audit_ensure_storage()
        || empty($order['id'])
    ) {
        return false;
    }

    $path =
        adc_audit_order_path(
            (string) $order['id']
        );

    if ($path === '') {
        return false;
    }

    $encoded =
        json_encode(
            $order,
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
            | JSON_PRETTY_PRINT
        );

    if ($encoded === false) {
        return false;
    }

    return
        file_put_contents(
            $path,
            $encoded,
            LOCK_EX
        ) !== false;
}

function adc_audit_get_order(
    string $id
): ?array {
    $path =
        adc_audit_order_path($id);

    if (
        $path === ''
        || !is_readable($path)
    ) {
        return null;
    }

    $decoded =
        json_decode(
            (string) file_get_contents($path),
            true
        );

    return
        is_array($decoded)
            ? $decoded
            : null;
}

function adc_audit_update_order(
    string $id,
    array $changes
): ?array {
    $order =
        adc_audit_get_order($id);

    if (!$order) {
        return null;
    }

    $order =
        array_merge(
            $order,
            $changes
        );

    $order['updated_at'] =
        gmdate('c');

    return
        adc_audit_save_order($order)
            ? $order
            : null;
}

function adc_audit_mark_paid(
    string $id,
    string $source,
    array $extra = []
): ?array {
    $order =
        adc_audit_get_order($id);

    if (!$order) {
        return null;
    }

    if (
        ($order['payment_status'] ?? '')
        === 'paid'
    ) {
        return $order;
    }

    return
        adc_audit_update_order(
            $id,
            array_merge(
                [
                    'payment_status' => 'paid',
                    'order_status' => 'paid',
                    'paid_at' => gmdate('c'),
                    'payment_source' => $source,
                    'fulfillment_status' =>
                        $order['fulfillment_status']
                        ?? 'pending',
                ],
                $extra
            )
        );
}

function adc_audit_is_local(): bool
{
    $host =
        strtolower(
            (string) (
                $_SERVER['HTTP_HOST']
                ?? ''
            )
        );

    $host =
        preg_replace(
            '/:\d+$/',
            '',
            $host
        );

    return
        in_array(
            $host,
            [
                'localhost',
                '127.0.0.1',
                '::1',
            ],
            true
        );
}

function adc_audit_payment_mode(): string
{
    $mode =
        strtolower(
            trim(
                adc_audit_env(
                    'IFTHENPAY_MODE',
                    'test'
                )
            )
        );

    return
        $mode === 'live'
            ? 'live'
            : 'test';
}

function adc_audit_gateway_ready(): bool
{
    return
        adc_audit_payment_mode()
        === 'live'
        && trim(
            adc_audit_env(
                'IFTHENPAY_GATEWAY_KEY'
            )
        ) !== '';
}

function adc_audit_public_base(): string
{
    return
        rtrim(
            adc_audit_env(
                'ALEXDEVCODE_PUBLIC_URL',
                'https://alexdevcode.com'
            ),
            '/'
        );
}

function adc_audit_http_json_post(
    string $url,
    array $payload
): ?array {
    $body =
        json_encode(
            $payload,
            JSON_UNESCAPED_UNICODE
            | JSON_UNESCAPED_SLASHES
        );

    if ($body === false) {
        return null;
    }

    if (function_exists('curl_init')) {
        $ch =
            curl_init($url);

        curl_setopt_array(
            $ch,
            [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Accept: application/json',
                ],
                CURLOPT_POSTFIELDS => $body,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
            ]
        );

        $raw =
            curl_exec($ch);

        $code =
            (int) curl_getinfo(
                $ch,
                CURLINFO_RESPONSE_CODE
            );

        curl_close($ch);

        if (
            $raw === false
            || $code < 200
            || $code >= 300
        ) {
            return null;
        }

        $decoded =
            json_decode(
                (string) $raw,
                true
            );

        return
            is_array($decoded)
                ? $decoded
                : null;
    }

    return null;
}

function adc_audit_create_payment_url(
    array $order
): ?string {
    if (!adc_audit_gateway_ready()) {
        return null;
    }

    $gatewayKey =
        trim(
            adc_audit_env(
                'IFTHENPAY_GATEWAY_KEY'
            )
        );

    $lang =
        strtolower(
            (string) (
                $order['lang']
                ?? 'pt'
            )
        );

    if (
        !in_array(
            $lang,
            ['pt', 'en', 'es'],
            true
        )
    ) {
        $lang = 'pt';
    }

    $id =
        (string) $order['id'];

    $statusUrl =
        adc_audit_public_base()
        . '/auditoria-pedido.php?id='
        . rawurlencode($id)
        . '&token='
        . rawurlencode(
            (string) (
                $order['access_token']
                ?? ''
            )
        )
        . '&lang='
        . rawurlencode($lang);

    $payload = [
        'id' => $id,
        'amount' =>
            number_format(
                (float) $order['amount'],
                2,
                '.',
                ''
            ),
        'description' =>
            (string) (
                $order['package_name']
                ?? 'Auditoria Express'
            ),
        'lang' => $lang,
        'expiredate' =>
            date(
                'Ymd',
                strtotime('+3 days')
            ),
        'success_url' =>
            $statusUrl
            . '&payment=success',
        'error_url' =>
            $statusUrl
            . '&payment=error',
        'cancel_url' =>
            $statusUrl
            . '&payment=cancel',
    ];

    $response =
        adc_audit_http_json_post(
            'https://api.ifthenpay.com/gateway/pinpay/'
            . rawurlencode($gatewayKey),
            $payload
        );

    if (!$response) {
        return null;
    }

    $url =
        (string) (
            $response['RedirectUrl']
            ?? $response['redirectUrl']
            ?? $response['redirect_url']
            ?? ''
        );

    return
        filter_var(
            $url,
            FILTER_VALIDATE_URL
        )
            ? $url
            : null;
}

function adc_audit_verify_callback(
    array $query
): array {
    $expectedKey =
        adc_audit_env(
            'IFTHENPAY_CALLBACK_KEY'
        );

    if ($expectedKey === '') {
        return [
            false,
            'callback_key_missing',
        ];
    }

    $providedKey =
        (string) (
            $query['key']
            ?? ''
        );

    if (
        $providedKey === ''
        || !hash_equals(
            $expectedKey,
            $providedKey
        )
    ) {
        return [
            false,
            'invalid_key',
        ];
    }

    $id =
        preg_replace(
            '/\D+/',
            '',
            (string) (
                $query['id']
                ?? ''
            )
        );

    $order =
        adc_audit_get_order($id);

    if (!$order) {
        return [
            false,
            'order_not_found',
        ];
    }

    $receivedAmount =
        number_format(
            (float) (
                $query['amount']
                ?? -1
            ),
            2,
            '.',
            ''
        );

    $expectedAmount =
        number_format(
            (float) (
                $order['amount']
                ?? 0
            ),
            2,
            '.',
            ''
        );

    if (
        $receivedAmount
        !== $expectedAmount
    ) {
        return [
            false,
            'amount_mismatch',
        ];
    }

    return [
        true,
        $order,
    ];
}
