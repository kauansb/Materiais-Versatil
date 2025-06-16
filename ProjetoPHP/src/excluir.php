<?php 
include 'proteger.php'; 
verificarAdmin(); 
include './db/conexao.php'; 
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: painel.php');
    exit;
}
?>
