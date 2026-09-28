<?php
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('Cache-Control: public, max-age=300, stale-while-revalidate=600');

require_once dirname(__DIR__) . '/includes/opportunities/pipeline.php';

$region = isset($_GET['region']) ? strtolower(trim((string) $_GET['region'])) : 'portugal';
$force = false;
$config = adc_op_config();

if (isset($_GET['refresh']) && $_GET['refresh'] === '1' && $config['refresh_token'] !== '') {
    $providedToken = isset($_GET['token']) ? (string) $_GET['token'] : '';
    $force = hash_equals($config['refresh_token'], $providedToken);
}

try {
    $payload = adc_op_pipeline($region, $force);
    http_response_code(200);
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
} catch (Throwable $error) {
    http_response_code(503);
    echo json_encode(array(
        'ok' => false,
        'region' => $region,
        'jobs' => array(),
        'sources' => array(),
        'updated_at' => gmdate('c'),
        'message' => 'The opportunity sources are temporarily unavailable. Please try again later.'
    ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}
