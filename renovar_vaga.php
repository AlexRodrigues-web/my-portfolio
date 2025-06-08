<?php
session_start();
require_once 'includes/conexao.php';
if ($_POST['csrf'] !== $_SESSION['csrf_token']) exit;
$id = (int)$_POST['id'];
$pdo->prepare("UPDATE vagas SET data_expira = DATE_ADD(NOW(),INTERVAL 15 DAY) WHERE id=?")
    ->execute([$id]);
echo 'ok';
