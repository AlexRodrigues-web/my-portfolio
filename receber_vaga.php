<?php
session_start();

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Proteção contra CSRF
    if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf'])) {
        $_SESSION['erros_vaga'][] = "Token CSRF inválido.";
        header('Location: oportunidades.php');
        exit;
    }

    // Coleta e sanitiza os dados
    $empresa   = trim(filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_SPECIAL_CHARS));
    $titulo    = trim(filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS));
    $descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS));
    $link      = trim(filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL));

    // Verifica se os campos obrigatórios foram preenchidos
    if (empty($empresa) || empty($titulo) || empty($descricao)) {
        $_SESSION['erros_vaga'][] = "Por favor, preencha todos os campos obrigatórios.";
        header('Location: oportunidades.php');
        exit;
    }

    // Conecta ao banco de dados
    require_once('includes/conexao.php');

    try {
        // Prepara e executa a query
        $stmt = $pdo->prepare("INSERT INTO vagas (empresa, titulo, descricao, link, data_publicacao)
                               VALUES (:empresa, :titulo, :descricao, :link, NOW())");
        $stmt->execute([
            ':empresa' => $empresa,
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':link' => $link
        ]);

        $_SESSION['sucesso_vaga'] = "Vaga publicada com sucesso!";
        header('Location: oportunidades.php');
        exit;
    } catch (PDOException $e) {
        error_log("Erro ao salvar vaga: " . $e->getMessage());
        $_SESSION['erros_vaga'][] = "Erro ao salvar a vaga. Tente novamente.";
        header('Location: oportunidades.php');
        exit;
    }

} else {
    // Redireciona se acesso direto
    header('Location: oportunidades.php');
    exit;
}
