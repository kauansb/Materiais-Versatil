<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Versátil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Usuários</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php if (isset($_SESSION['usuario'])): ?>
                    <span class="navbar-text me-2">Olá, <strong><?= $_SESSION['usuario'] ?></strong></span>
                    <a href="logout.php" class="btn btn-outline-danger">Sair</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-outline-primary btn-sm">Entrar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
