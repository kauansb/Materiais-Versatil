<?php
include 'conexao.php';

$senha = password_hash('123', PASSWORD_DEFAULT);
$pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)")
    ->execute(['Admin', 'admin@versatil.com', '9999-9999', $senha]);
?>
