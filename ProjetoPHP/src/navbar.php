<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<nav class="navbar" style="min-height:48px; box-shadow:none; border:none;">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5" style="min-height:48px;">
        <a class="navbar-brand d-flex align-items-center" href="painel.php" style="padding:0;">
            <img src="../assets/imgs/logo.png" alt="Versátil" style="height:40px; margin-right:8px;">
        </a>
        <div>
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="logout.php" class="btn btn-danger btn-sm px-3" style="border-radius:6px; font-size:15px; font-weight:400; min-width:56px;">Sair</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary btn-sm px-3" style="border-radius:6px; font-size:15px; font-weight:400; min-width:56px;">Entrar</a>
            <?php endif; ?>
        </div>
    </div>
</nav>