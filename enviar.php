<?php
// enviar.php — envio seguro do formulário de contato

session_start();

// Ativa log de erros e desativa exibição pública
ini_set('display_errors', 0);
ini_set('log_errors', 1);
error_reporting(E_ALL);

// Limite mínimo de tempo entre envios (15s)
if (isset($_SESSION['last_submit']) && time() - $_SESSION['last_submit'] < 15) {
    echo "<script>alert('Aguarde alguns segundos antes de reenviar.'); history.back();</script>";
    exit;
}
$_SESSION['last_submit'] = time();

// Verifica se é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
        echo "<script>alert('Token inválido. Recarregue a página e tente novamente.'); history.back();</script>";
        exit;
    }

    // Captura e sanitiza os dados
    $nome = htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $assunto = htmlspecialchars(trim($_POST['assunto'] ?? 'Sem assunto'), ENT_QUOTES, 'UTF-8');
    $mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8');
    $verificacao = trim($_POST['verificacao'] ?? '');

    // Valida antispam
    if ($verificacao !== '12') {
        echo "<script>alert('Resposta incorreta para verificação antispam.'); history.back();</script>";
        exit;
    }

    // Verifica campos obrigatórios
    if (empty($nome) || empty($email) || empty($mensagem)) {
        echo "<script>alert('Por favor, preencha todos os campos obrigatórios.'); history.back();</script>";
        exit;
    }

    // Prepara e envia o e-mail
    $destinatario = 'alexrroliver200@gmail.com';
    $titulo = "Formulário do site: $assunto";
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Assunto: $assunto\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($destinatario, $titulo, $corpo, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='../contato.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem. Tente novamente mais tarde.'); history.back();</script>";
    }

} else {
    echo "<script>alert('Acesso inválido.'); window.location.href='../';</script>";
}
?>
