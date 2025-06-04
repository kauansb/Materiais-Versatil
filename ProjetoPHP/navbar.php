<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 220px; height: 100vh; position: fixed;">
  <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
    <span class="fs-4 fw-bold">Versátil</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="index.php" class="nav-link">Usuários</a>
    </li>
    <li>
      <a href="adicionar.php" class="nav-link">Novo Usuário</a>
    </li>
  </ul>
  <hr>
  <div>
    <?php if (isset($_SESSION['usuario'])): ?>
      <div class="mb-2">Olá, <strong><?= $_SESSION['usuario'] ?></strong></div>
      <a href="logout.php" class="btn btn-outline-danger btn-sm">Sair</a>
    <?php else: ?>
      <a href="login.php" class="btn btn-outline-primary btn-sm">Entrar</a>
    <?php endif; ?>
  </div>
</div>