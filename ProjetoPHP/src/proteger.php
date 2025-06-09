<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: ./index.php');
  exit;
}

// Verifica se o usuário tem permissão para editar
if ($_SESSION['usuario'] !== $usuario['nome'] && $_SESSION['user_type'] !== 'admin') {
    header('Location: painel.php');
    exit;
}
?>