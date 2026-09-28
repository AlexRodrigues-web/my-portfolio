<?php
declare(strict_types=1);

header(
    'Content-Type: application/json; charset=UTF-8'
);
header(
    'X-Content-Type-Options: nosniff'
);
header(
    'Cache-Control: no-store'
);

ini_set('display_errors', '0');
ini_set('log_errors', '1');

require_once
    dirname(__DIR__)
    . '/includes/audit-engine.php';

function adc_audit_api_json(
    array $payload,
    int $status = 200
): void {
    http_response_code($status);

    echo json_encode(
        $payload,
        JSON_UNESCAPED_UNICODE
        | JSON_UNESCAPED_SLASHES
    );

    exit;
}

function adc_audit_api_rate_limit(): void
{
    $ip =
        $_SERVER['REMOTE_ADDR']
        ?? 'unknown';

    $dir =
        dirname(__DIR__)
        . '/storage/audit-rate-limit';

    if (!is_dir($dir)) {
        @mkdir(
            $dir,
            0750,
            true
        );
    }

    $file =
        $dir
        . '/'
        . hash(
            'sha256',
            (string) $ip
        )
        . '.json';

    $now = time();
    $window = 3600;
    $max = 12;
    $attempts = [];

    if (is_readable($file)) {
        $decoded =
            json_decode(
                (string) file_get_contents(
                    $file
                ),
                true
            );

        if (is_array($decoded)) {
            $attempts = $decoded;
        }
    }

    $attempts =
        array_values(
            array_filter(
                $attempts,
                static fn($ts) =>
                    is_numeric($ts)
                    && (
                        $now
                        - (int) $ts
                    ) < $window
            )
        );

    if (
        count($attempts)
        >= $max
    ) {
        adc_audit_api_json(
            [
                'ok' => false,
                'error' =>
                    'Limite temporário atingido. Tente novamente mais tarde.',
            ],
            429
        );
    }

    $attempts[] = $now;

    @file_put_contents(
        $file,
        json_encode(
            $attempts
        ),
        LOCK_EX
    );
}

if (
    ($_SERVER['REQUEST_METHOD'] ?? '')
    !== 'POST'
) {
    adc_audit_api_json(
        [
            'ok' => false,
            'error' =>
                'Método não permitido.',
        ],
        405
    );
}

adc_audit_api_rate_limit();

$raw =
    file_get_contents(
        'php://input'
    );

$data =
    json_decode(
        (string) $raw,
        true
    );

$url =
    (string) (
        $data['url']
        ?? $_POST['url']
        ?? ''
    );

$result =
    adc_audit_engine_run(
        $url
    );

adc_audit_api_json(
    $result,
    !empty($result['ok'])
        ? 200
        : 422
);
