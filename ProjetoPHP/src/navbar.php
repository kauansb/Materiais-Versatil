<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar navbar-min-height navbar-no-shadow navbar-no-border">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5 navbar-container-min-height">
        <a class="navbar-brand d-flex align-items-center navbar-brand-no-padding" href="painel.php">
            <img src="../assets/imgs/logo.png" alt="Versátil" class="logo-img">
        </a>
        <div>
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="logout.php" class="btn btn-danger btn-sm navbar-btn-sair">Sair</a>
            <?php endif; ?>
        </div>
    </div>
</nav>