<?php
// Inclui a classe Usuario e a conexão com o banco de dados
require_once '../classes/Usuario.php';

// Verifica se o ID do usuário foi passado via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Cria uma instância da classe Usuario
    $usuario = new Usuario();

    // Chama o método excluir da classe Usuario
    if ($usuario->excluir($id)) {
        // Redireciona com uma mensagem de sucesso
        session_start();
        $_SESSION['mensagem'] = "<p class='success'>Usuário excluído com sucesso!</p>";
        header("Location: ../index.php");  // Redireciona de volta para a lista de usuários
        exit();
    } else {
        // Redireciona com uma mensagem de erro
        session_start();
        $_SESSION['mensagem'] = "<p class='error'>Erro ao excluir usuário.</p>";
        header("Location: ../index.php");
        exit();
    }
} else {
    // Se não passar o ID, redireciona para a página de lista de usuários
    header("Location: ../index.php");
    exit();
}
