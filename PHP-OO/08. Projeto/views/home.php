<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['autenticado'] !== true) {
    header("Location: ../views/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="site-container">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']['login']); ?>!</h2>
        <h3>Último login:  <?php echo htmlspecialchars($_SESSION['usuario']['ultima_atividade']); ?>!</h3>
        
        <p>Você está autenticado e pode acessar o painel de controle.</p>

        <a href="../controllers/logout.php" class="btn-logout">Sair</a>
    </div>
</body>
</html>
