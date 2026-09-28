<?php
declare(strict_types=1);

require_once __DIR__ . '/audit-sales.php';
require_once __DIR__ . '/audit-engine.php';
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;
use PHPMailer\PHPMailer\PHPMailer;

function adc_audit_reports_dir(): string
{
    return
        dirname(__DIR__)
        . DIRECTORY_SEPARATOR
        . 'storage'
        . DIRECTORY_SEPARATOR
        . 'audit-reports';
}

function adc_audit_report_path(
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
        adc_audit_reports_dir()
        . DIRECTORY_SEPARATOR
        . $id
        . '.pdf';
}

function adc_audit_ensure_report_dir(): bool
{
    $dir =
        adc_audit_reports_dir();

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

function adc_audit_html_escape(
    $value
): string {
    return
        htmlspecialchars(
            (string) $value,
            ENT_QUOTES,
            'UTF-8'
        );
}

function adc_audit_report_html(
    array $order,
    array $analysis
): string {
    $site =
        adc_audit_html_escape(
            $analysis['url']
            ?? $order['site']
            ?? ''
        );

    $orderId =
        adc_audit_html_escape(
            $order['id']
            ?? ''
        );

    $package =
        adc_audit_html_escape(
            $order['package_name']
            ?? 'Auditoria Express'
        );

    $score =
        (int) (
            $analysis['score']
            ?? 0
        );

    $passed =
        (int) (
            $analysis['summary']['passed']
            ?? 0
        );

    $total =
        (int) (
            $analysis['summary']['total']
            ?? 0
        );

    $responseMs =
        (int) (
            $analysis['summary']['response_ms']
            ?? 0
        );

    $checksHtml = '';

    foreach (
        (array) (
            $analysis['checks']
            ?? []
        )
        as $check
    ) {
        $passedCheck =
            !empty(
                $check['passed']
            );

        $status =
            $passedCheck
                ? 'OK'
                : 'ATENÇÃO';

        $statusClass =
            $passedCheck
                ? 'ok'
                : 'warn';

        $label =
            adc_audit_html_escape(
                $check['label']
                ?? $check['id']
                ?? ''
            );

        $detail =
            adc_audit_html_escape(
                $check['detail']
                ?? ''
            );

        $recommendation =
            adc_audit_html_escape(
                $check['recommendation']
                ?? ''
            );

        $checksHtml .=
            '<div class="check">'
            . '<div class="check-head">'
            . '<strong>'
            . $label
            . '</strong>'
            . '<span class="badge '
            . $statusClass
            . '">'
            . $status
            . '</span>'
            . '</div>'
            . '<p>'
            . $detail
            . '</p>';

        if (!$passedCheck) {
            $checksHtml .=
                '<div class="recommendation"><b>Recomendação:</b> '
                . $recommendation
                . '</div>';
        }

        $checksHtml .=
            '</div>';
    }

    $priorityHtml = '';

    foreach (
        (array) (
            $analysis['top_issues']
            ?? []
        )
        as $index => $issue
    ) {
        $priorityHtml .=
            '<div class="priority">'
            . '<span>'
            . (
                (int) $index
                + 1
            )
            . '</span>'
            . '<div><strong>'
            . adc_audit_html_escape(
                $issue['label']
                ?? $issue['id']
                ?? ''
            )
            . '</strong><p>'
            . adc_audit_html_escape(
                $issue['recommendation']
                ?? ''
            )
            . '</p></div></div>';
    }

    if ($priorityHtml === '') {
        $priorityHtml =
            '<p class="muted">'
            . 'A análise inicial não encontrou falhas críticas nos itens verificados.'
            . '</p>';
    }

    $generatedAt =
        date(
            'd/m/Y H:i'
        );

    return <<<HTML
<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8">
<style>
@page { margin: 32px 34px; }
* { box-sizing: border-box; }
body { margin:0; font-family: DejaVu Sans, sans-serif; color:#282522; font-size:11px; line-height:1.5; }
.brand { border-bottom:2px solid #8b735d; padding-bottom:14px; margin-bottom:20px; }
.brand h1 { margin:0; font-size:26px; color:#141414; }
.brand h1 span { color:#8b735d; }
.brand p { margin:4px 0 0; color:#6b655f; }
.hero { background:#f5f1ed; border:1px solid #e2d9d0; border-radius:12px; padding:18px; margin-bottom:18px; }
.score { font-size:40px; font-weight:bold; color:#8b735d; line-height:1; }
.hero-grid { width:100%; }
.hero-grid td { vertical-align:top; }
.meta { color:#6b655f; }
h2 { font-size:17px; margin:22px 0 10px; color:#141414; }
.check { border:1px solid #e6e1dc; border-radius:9px; padding:10px 12px; margin-bottom:8px; page-break-inside:avoid; }
.check-head { margin-bottom:4px; }
.badge { float:right; font-size:9px; font-weight:bold; padding:3px 7px; border-radius:10px; }
.badge.ok { color:#176b35; background:#e9f7ee; }
.badge.warn { color:#9c3d22; background:#fff0ea; }
.check p { margin:3px 0; color:#625d58; }
.recommendation { margin-top:7px; padding:7px 9px; background:#faf7f4; border-left:3px solid #8b735d; }
.priority { display:table; width:100%; margin-bottom:8px; page-break-inside:avoid; }
.priority > span { display:table-cell; width:30px; height:30px; text-align:center; vertical-align:middle; background:#141414; color:white; border-radius:15px; font-weight:bold; }
.priority > div { display:table-cell; padding-left:10px; vertical-align:top; }
.priority p { margin:2px 0 0; color:#625d58; }
.muted { color:#6b655f; }
.footer { margin-top:28px; padding-top:12px; border-top:1px solid #ddd5ce; color:#77716c; font-size:9px; }
.small { font-size:9px; }
</style>
</head>
<body>
<div class="brand">
    <h1>Alex<span>Dev</span>Code</h1>
    <p>Auditoria Express · Relatório automático</p>
</div>

<div class="hero">
    <table class="hero-grid">
        <tr>
            <td width="25%">
                <div class="score">{$score}/100</div>
                <div class="meta">Score inicial</div>
            </td>
            <td width="75%">
                <strong>{$package}</strong><br>
                <span class="meta">Site: {$site}</span><br>
                <span class="meta">Pedido: #{$orderId}</span><br>
                <span class="meta">{$passed}/{$total} verificações aprovadas · resposta inicial {$responseMs} ms</span>
            </td>
        </tr>
    </table>
</div>

<h2>Prioridades</h2>
{$priorityHtml}

<h2>Verificações</h2>
{$checksHtml}

<h2>Como usar este relatório</h2>
<p>
Comece pelos itens marcados como ATENÇÃO com maior impacto. Faça uma alteração de cada vez,
valide a página novamente e acompanhe resultados reais de tráfego, contactos e conversões.
</p>

<p class="small muted">
Este relatório avalia sinais técnicos observáveis na página analisada e não substitui dados
de Search Console, Analytics, testes de utilizadores ou uma auditoria manual aprofundada.
</p>

<div class="footer">
Gerado em {$generatedAt} · AlexDevCode · https://alexdevcode.com
</div>
</body>
</html>
HTML;
}

function adc_audit_generate_pdf(
    array $order,
    array $analysis
): ?string {
    if (
        !class_exists(
            Dompdf::class
        )
        || !adc_audit_ensure_report_dir()
    ) {
        return null;
    }

    $path =
        adc_audit_report_path(
            (string) $order['id']
        );

    if ($path === '') {
        return null;
    }

    try {
        $options =
            new Options();

        $options->set(
            'isRemoteEnabled',
            false
        );

        $options->set(
            'defaultFont',
            'DejaVu Sans'
        );

        $dompdf =
            new Dompdf($options);

        $dompdf->loadHtml(
            adc_audit_report_html(
                $order,
                $analysis
            ),
            'UTF-8'
        );

        $dompdf->setPaper(
            'A4',
            'portrait'
        );

        $dompdf->render();

        $bytes =
            $dompdf->output();

        if (
            $bytes === ''
            || file_put_contents(
                $path,
                $bytes,
                LOCK_EX
            ) === false
        ) {
            return null;
        }

        return $path;
    }
    catch (Throwable $e) {
        error_log(
            'Audit PDF error: '
            . $e->getMessage()
        );

        return null;
    }
}

function adc_audit_send_report_email(
    array $order,
    string $pdfPath
): bool {
    if (
        adc_audit_is_local()
    ) {
        return true;
    }

    $configFile =
        __DIR__
        . '/smtp_config.php';

    if (
        is_file($configFile)
    ) {
        require_once
            $configFile;
    }

    $smtpUser =
        getenv(
            'SMTP_USERNAME'
        )
        ?: (
            defined(
                'SMTP_USERNAME'
            )
                ? SMTP_USERNAME
                : ''
        );

    $smtpPass =
        getenv(
            'SMTP_PASSWORD'
        )
        ?: (
            defined(
                'SMTP_PASSWORD'
            )
                ? SMTP_PASSWORD
                : ''
        );

    if (
        $smtpUser === ''
        || $smtpPass === ''
    ) {
        error_log(
            'Audit email skipped: SMTP credentials missing.'
        );

        return false;
    }

    $lang =
        (string) (
            $order['lang']
            ?? 'pt'
        );

    $copy = [
        'pt' => [
            'subject' =>
                'A sua Auditoria Express está pronta — AlexDevCode',
            'hello' => 'Olá',
            'ready' =>
                'O seu relatório automático da Auditoria Express está pronto.',
            'site' => 'Site analisado',
            'package' => 'Pacote',
            'attached' =>
                'O PDF segue em anexo. Também pode aceder ao relatório através da página privada do seu pedido.',
            'thanks' =>
                'Obrigado por escolher a AlexDevCode.',
        ],
        'en' => [
            'subject' =>
                'Your Express Audit is ready — AlexDevCode',
            'hello' => 'Hello',
            'ready' =>
                'Your automatic Express Audit report is ready.',
            'site' => 'Website',
            'package' => 'Package',
            'attached' =>
                'The PDF is attached. You can also access it from your private order page.',
            'thanks' =>
                'Thank you for choosing AlexDevCode.',
        ],
        'es' => [
            'subject' =>
                'Tu Auditoría Express está lista — AlexDevCode',
            'hello' => 'Hola',
            'ready' =>
                'Tu informe automático de Auditoría Express está listo.',
            'site' => 'Sitio analizado',
            'package' => 'Paquete',
            'attached' =>
                'El PDF se adjunta. También puedes acceder desde la página privada de tu pedido.',
            'thanks' =>
                'Gracias por elegir AlexDevCode.',
        ],
    ];

    $c =
        $copy[$lang]
        ?? $copy['pt'];

    $orderUrl =
        adc_audit_public_base()
        . '/auditoria-pedido.php?id='
        . rawurlencode(
            (string) $order['id']
        )
        . '&token='
        . rawurlencode(
            (string) $order['access_token']
        )
        . '&lang='
        . rawurlencode($lang);

    try {
        $mail =
            new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host =
            'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username =
            $smtpUser;
        $mail->Password =
            $smtpPass;
        $mail->SMTPSecure =
            PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet =
            'UTF-8';

        $mail->setFrom(
            $smtpUser,
            'AlexDevCode'
        );

        $mail->addAddress(
            (string) $order[
                'customer_email'
            ],
            (string) $order[
                'customer_name'
            ]
        );

        $mail->addReplyTo(
            'contact@alexdevcode.com',
            'AlexDevCode'
        );

        $mail->Subject =
            $c['subject'];

        $name =
            adc_audit_html_escape(
                $order['customer_name']
            );

        $site =
            adc_audit_html_escape(
                $order['site']
            );

        $package =
            adc_audit_html_escape(
                $order['package_name']
            );

        $safeUrl =
            adc_audit_html_escape(
                $orderUrl
            );

        $mail->isHTML(true);

        $mail->Body =
            '<div style="font-family:Arial,sans-serif;max-width:620px;margin:auto;color:#262321">'
            . '<h2 style="margin-bottom:6px">AlexDevCode</h2>'
            . '<p>'
            . $c['hello']
            . ' '
            . $name
            . ',</p>'
            . '<p>'
            . $c['ready']
            . '</p>'
            . '<div style="padding:14px;background:#f6f2ee;border-radius:10px">'
            . '<b>'
            . $c['site']
            . ':</b> '
            . $site
            . '<br><b>'
            . $c['package']
            . ':</b> '
            . $package
            . '</div>'
            . '<p>'
            . $c['attached']
            . '</p>'
            . '<p><a href="'
            . $safeUrl
            . '" style="display:inline-block;padding:11px 16px;background:#141414;color:#fff;text-decoration:none;border-radius:22px">Ver pedido e relatório</a></p>'
            . '<p>'
            . $c['thanks']
            . '</p>'
            . '</div>';

        $mail->AltBody =
            $c['ready']
            . "\n"
            . $c['site']
            . ': '
            . (string) $order['site']
            . "\n"
            . $orderUrl;

        $mail->addAttachment(
            $pdfPath,
            'AlexDevCode-Auditoria-'
            . (string) $order['id']
            . '.pdf'
        );

        $mail->send();

        return true;
    }
    catch (Throwable $e) {
        error_log(
            'Audit email error: '
            . $e->getMessage()
        );

        return false;
    }
}

function adc_audit_fulfill_order(
    string $id
): array {
    $order =
        adc_audit_get_order($id);

    if (!$order) {
        return [
            false,
            'order_not_found',
        ];
    }

    if (
        ($order['payment_status'] ?? '')
        !== 'paid'
    ) {
        return [
            false,
            'not_paid',
        ];
    }

    if (
        in_array(
            (string) (
                $order[
                    'fulfillment_status'
                ]
                ?? ''
            ),
            [
                'sent',
                'ready_local',
            ],
            true
        )
    ) {
        return [
            true,
            $order,
        ];
    }

    $analysis =
        adc_audit_engine_run(
            (string) (
                $order['site']
                ?? ''
            )
        );

    if (
        empty(
            $analysis['ok']
        )
    ) {
        $updated =
            adc_audit_update_order(
                $id,
                [
                    'fulfillment_status' =>
                        'audit_error',
                    'fulfillment_error' =>
                        (string) (
                            $analysis['error']
                            ?? 'audit_failed'
                        ),
                ]
            );

        return [
            false,
            $updated
            ?? 'audit_error',
        ];
    }

    $pdfPath =
        adc_audit_generate_pdf(
            $order,
            $analysis
        );

    if (!$pdfPath) {
        $updated =
            adc_audit_update_order(
                $id,
                [
                    'fulfillment_status' =>
                        'pdf_error',
                ]
            );

        return [
            false,
            $updated
            ?? 'pdf_error',
        ];
    }

    $order =
        adc_audit_update_order(
            $id,
            [
                'audit_score' =>
                    (int) $analysis['score'],
                'audit_summary' =>
                    $analysis['summary'],
                'audit_top_issues' =>
                    $analysis['top_issues'],
                'report_file' =>
                    basename($pdfPath),
                'report_generated_at' =>
                    gmdate('c'),
                'fulfillment_status' =>
                    'report_ready',
            ]
        )
        ?? $order;

    $sent =
        adc_audit_send_report_email(
            $order,
            $pdfPath
        );

    $finalStatus =
        adc_audit_is_local()
            ? 'ready_local'
            : (
                $sent
                    ? 'sent'
                    : 'ready_email_error'
            );

    $order =
        adc_audit_update_order(
            $id,
            [
                'fulfillment_status' =>
                    $finalStatus,
                'email_sent_at' =>
                    $sent
                    && !adc_audit_is_local()
                        ? gmdate('c')
                        : null,
            ]
        )
        ?? $order;

    return [
        true,
        $order,
    ];
}
