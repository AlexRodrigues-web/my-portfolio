<?php
$host = 'localhost';
$dbname = 'portfolio_oportunidades';
$user = 'root';
$pass = ''; // senha padrão do XAMPP é vazia

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão com o banco: " . $e->getMessage());
}
?>
