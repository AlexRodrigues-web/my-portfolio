<?php
session_start();

// Configurações de produção
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/log_erros.txt');
error_reporting(E_ALL);

// Tempo mínimo entre envios: 15s
if (isset($_SESSION['last_submit']) && time() - $_SESSION['last_submit'] < 15) {
    echo "<script>alert('Aguarde alguns segundos antes de reenviar.'); history.back();</script>";
    exit;
}
$_SESSION['last_submit'] = time();

// Verifica se é um envio via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<script>alert('Acesso inválido.'); window.location.href='../';</script>";
    exit;
}

// Verifica CSRF token
$csrf_token = $_POST['csrf_token'] ?? '';
if (empty($csrf_token) || $csrf_token !== ($_SESSION['csrf_token'] ?? '')) {
    echo "<script>alert('Token inválido. Recarregue a página e tente novamente.'); history.back();</script>";
    exit;
}

// Sanitização e validação
$nome = htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
$email_raw = trim($_POST['email'] ?? '');
$email = filter_var($email_raw, FILTER_VALIDATE_EMAIL);
$assunto = htmlspecialchars(trim($_POST['assunto'] ?? 'Sem assunto'), ENT_QUOTES, 'UTF-8');
$mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8');
$verificacao = trim($_POST['verificacao'] ?? '');

// Verificação antispam
if ($verificacao !== '12') {
    echo "<script>alert('Resposta incorreta para verificação antispam.'); history.back();</script>";
    exit;
}

// Verificação de campos obrigatórios
if (empty($nome) || !$email || empty($mensagem)) {
    echo "<script>alert('Preencha todos os campos obrigatórios.'); history.back();</script>";
    exit;
}

// Proteção contra header injection
if (preg_match("/[\r\n]/", $nome) || preg_match("/[\r\n]/", $email_raw)) {
    echo "<script>alert('Dados inválidos no formulário.'); history.back();</script>";
    exit;
}

// Import PHPMailer classes via Composer autoload
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configurações SMTP Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alexrroliver200@gmail.com';          // Seu email Gmail
    $mail->Password = 'djzp hgbh utlk tiej';                // Sua senha de app aqui
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    // TLS
    $mail->Port = 587;

    // Remetente e destinatário
    $mail->setFrom('alexrroliver200@gmail.com', 'Site Meu Portfolio');
    $mail->addAddress('alexrroliver200@gmail.com');         // Para quem vai o email (você mesmo)

    // Responder para o usuário que enviou o formulário
    $mail->addReplyTo($email, $nome);

    // Conteúdo do email
    $mail->isHTML(false);
    $mail->Subject = "Formulário do site: $assunto";

    $corpo = <<<MSG
Nome: $nome
Email: $email
Assunto: $assunto

Mensagem:
$mensagem
MSG;

    $mail->Body = $corpo;

    // Enviar
    $mail->send();

    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='../contato.php';</script>";
    exit;

} catch (Exception $e) {
    error_log("Erro ao enviar e-mail de contato: {$mail->ErrorInfo}");
    echo "<script>alert('Erro ao enviar a mensagem. Tente novamente mais tarde.'); history.back();</script>";
    exit;
}
