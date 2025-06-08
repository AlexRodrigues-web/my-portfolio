<?php
session_start();

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proteção contra CSRF
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf'])) {
        $_SESSION['erros_profissional'][] = "Token CSRF inválido.";
        header('Location: oportunidades.php');
        exit;
    }

    // Sanitize e captura dos dados
    $nome      = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
    $email     = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));

    // Validação
    if (empty($nome) || empty($email) || empty($descricao)) {
        $_SESSION['erros_profissional'][] = "Por favor, preencha todos os campos obrigatórios.";
        header('Location: oportunidades.php');
        exit;
    }

    // Conexão com o banco
    require_once('includes/conexao.php');

    try {
        // Inserção segura no banco
        $stmt = $pdo->prepare("INSERT INTO profissionais (nome, email, descricao, data_publicacao)
                               VALUES (:nome, :email, :descricao, NOW())");
        $stmt->execute([
            ':nome' => $nome,
            ':email' => $email,
            ':descricao' => $descricao
        ]);

        $_SESSION['sucesso_profissional'] = "Perfil publicado com sucesso!";
        header('Location: oportunidades.php');
        exit;
    } catch (PDOException $e) {
        error_log("Erro ao salvar profissional: " . $e->getMessage());
        $_SESSION['erros_profissional'][] = "Erro ao salvar os dados. Tente novamente.";
        header('Location: oportunidades.php');
        exit;
    }

} else {
    header('Location: oportunidades.php');
    exit;
}
