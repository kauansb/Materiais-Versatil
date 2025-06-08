<?php
include './db/conexao.php';
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

$busca = $_GET['busca'] ?? '';
if ($busca) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?");
    $stmt->execute(["%$busca%", "%$busca%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM usuarios");
}
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container-fluid px-0" style="max-width:1200px; margin:0 auto;">
    <h1 class="main-title">Cadastro de Clientes</h1>
    <div class="welcome">
      Bem-vindo <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong>
    </div>
    <form method="GET" class="search-form mb-4" role="search">
      <input type="text" name="busca" class="form-control" placeholder="Pesquisar" value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>" aria-label="Pesquisar">
      <button type="submit" class="btn" title="Buscar" aria-label="Buscar">
        <span class="bi bi-search" aria-hidden="true"></span>
      </button>
    </form>
    <div class="table-container">
      <table class="table align-middle">
        <thead>
          <tr>
            <th style="width:24px;">#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Gênero</th>
            <th>Status</th>
            <th style="width:120px;">Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php if (count($usuarios)): ?>
          <?php foreach ($usuarios as $i => $row): ?>
            <tr>
              <td class="row-handle">⋮</td>
              <td><?= htmlspecialchars($row['nome']) ?></td>
              <td><?= htmlspecialchars($row['email']) ?></td>
              <td><?= htmlspecialchars($row['telefone'] ?? '-') ?></td>
              <td><?= !empty($row['data_nascimento']) && $row['data_nascimento'] !== '0000-00-00' ? date('d/m/Y', strtotime($row['data_nascimento'])) : '-' ?></td>
              <td><?= htmlspecialchars($row['genero'] ?? '-') ?></td>
              <td>
                <?php if (isset($row['status'])): ?>
                  <span class="badge <?= $row['status'] ? 'bg-success' : 'bg-secondary' ?>">
                    <?= $row['status'] ? 'Ativo' : 'Inativo' ?>
                  </span>
                <?php else: ?>
                  -
                <?php endif; ?>
              </td>
              <td class="table-actions">
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="excluir.php?id=<?= $row['id'] ?>" class="btn-danger" onclick="return confirm('Tem certeza?')">Excluir</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>