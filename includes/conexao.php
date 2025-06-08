<?php
// Configurações do banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_oportunidades');
define('DB_USER', 'root');
define('DB_PASS', ''); // Senha padrão do XAMPP é vazia

try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USER, DB_PASS);

    // Configura o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: força o uso de prepared statements nativos do MySQL
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    // Mostra mensagem amigável e termina execução
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
?>
