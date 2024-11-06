<?php
// Inicia a sessão para poder usar variáveis de sessão
session_start();

// Inclui a classe Usuario e sanitiza dados de entrada
require_once '../classes/Usuario.php';

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim(htmlspecialchars($_POST['nome']));
    $email = trim(htmlspecialchars($_POST['email']));

    $usuario = new Usuario();
    if ($usuario->criar($nome, $email)) {
        // Armazena mensagem de sucesso na sessão
        $_SESSION['mensagem'] = "<p class='success'>Usuário adicionado com sucesso!</p>";
        // Redireciona para o index.php após adicionar o usuário
        header("Location: ../index.php");
        exit();  // Garante que o script pare de executar
    } else {
        $_SESSION['mensagem'] = "<p class='error'>Erro ao adicionar usuário.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <link rel="stylesheet" href="../assets/adiciona_usuario.css">
</head>
<body>
    <h1>Adicionar Usuário</h1>

    <form method="POST" action="adiciona_usuario.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Adicionar Usuário</button>
    </form>
</body>
</html>
