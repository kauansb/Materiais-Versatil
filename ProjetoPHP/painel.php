<?php include 'proteger.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Painel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<body class="container mt-5">
    <h2>Bem-vindo, <?= $_SESSION['usuario'] ?>!</h2>
    <a href="index.php" class="btn btn-success">Gerenciar Usuários</a>
    <a href="logout.php" class="btn btn-danger">Sair</a>
</body>
</html>