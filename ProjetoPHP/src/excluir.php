<?php include './db/conexao.php'; ?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: painel.php');
    exit;
}
?>
