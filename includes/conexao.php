<?php
// Configurações do banco de dados na Hostinger
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'portfolio_oportunidades_rebuild_20260802_230511');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Configura o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: força o uso de prepared statements nativos do MySQL
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Exibe mensagem segura ao usuário e loga o erro
    error_log("❌ Erro ao conectar: " . $e->getMessage());
    die("Erro ao conectar com o banco de dados. Tente novamente mais tarde.");
}
?>
