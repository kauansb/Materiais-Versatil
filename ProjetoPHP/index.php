<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Versátil - Sistema de Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Bem-vindo ao Sistema Versátil</h1>
                <p class="col-md-8 fs-4">
                    Gerencie usuários de forma simples e eficiente.<br>
                    Utilize o menu para acessar as funcionalidades do sistema.
                </p>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <a href="painel.php" class="btn btn-primary btn-lg">Ir para o Painel</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-primary btn-lg">Entrar</a>
                    <a href="cadastrar.php" class="btn btn-outline-primary btn-lg">Cadastre-se</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Cadastro de Usuários</h5>
                        <p class="card-text">Adicione, edite e exclua usuários facilmente.</p>
                        <a href="painel.php" class="btn btn-outline-secondary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Busca Rápida</h5>
                        <p class="card-text">Encontre usuários pelo nome ou email.</p>
                        <a href="painel.php" class="btn btn-outline-secondary">Buscar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>