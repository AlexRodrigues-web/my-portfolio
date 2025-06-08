<?php
session_start();

// Verifica CSRF e se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['csrf'], $_POST['id'])) {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf'])) {
        $_SESSION['erros_vaga'][] = "Token CSRF inválido.";
        header('Location: oportunidades.php');
        exit;
    }

    $id = (int) $_POST['id'];

    // Conecta ao banco de dados
    require_once('includes/conexao.php');

    try {
        // Verifica se a vaga existe
        $stmtCheck = $pdo->prepare("SELECT id FROM vagas WHERE id = :id");
        $stmtCheck->execute([':id' => $id]);

        if ($stmtCheck->rowCount() === 0) {
            $_SESSION['erros_vaga'][] = "Vaga não encontrada.";
        } else {
            // Exclui a vaga
            $stmtDelete = $pdo->prepare("DELETE FROM vagas WHERE id = :id");
            $stmtDelete->execute([':id' => $id]);
            $_SESSION['sucesso_vaga'] = "Vaga excluída com sucesso!";
        }

    } catch (PDOException $e) {
        error_log("Erro ao excluir vaga: " . $e->getMessage());
        $_SESSION['erros_vaga'][] = "Erro ao excluir a vaga.";
    }

} else {
    $_SESSION['erros_vaga'][] = "Requisição inválida.";
}

header('Location: oportunidades.php');
exit;
