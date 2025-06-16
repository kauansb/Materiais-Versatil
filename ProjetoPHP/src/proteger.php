<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header('Location: index.php');
  exit;
}

// Função para verificar se o usuário é admin
function verificarAdmin() {
  if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    $_SESSION['erro'] = 'Você não tem permissão para acessar este recurso.';
    header('Location: painel.php');
    exit;
  }
}
?>