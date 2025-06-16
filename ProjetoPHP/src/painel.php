<?php
include 'proteger.php'; // Protege a página para usuários autenticados
include './db/conexao.php';

$busca = $_GET['busca'] ?? '';
if ($busca) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?");
    $stmt->execute(["%$busca%", "%$busca%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM usuarios");
}
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

$erro = $_SESSION['erro'] ?? '';
$msg = $_SESSION['msg'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cadastro de Clientes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
  <?php include 'navbar.php'; ?>

  <?php if (!empty($erro)): ?><div class="alert alert-danger" role="alert"><?= htmlspecialchars($erro) ?></div><?php unset($_SESSION['erro']); endif; ?>
  <?php if (!empty($msg)): ?><div class="alert alert-success" role="alert"><?= htmlspecialchars($msg) ?></div><?php unset($_SESSION['msg']); endif; ?>
  
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
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Gênero</th>
            <th>Status</th>
            <?php if ($_SESSION['user_type'] == 'admin'): ?>
              <th>Ações</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
        <?php if (count($usuarios)): ?>
          <?php foreach ($usuarios as $i => $row): ?>
            <tr>
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
              <?php if ($_SESSION['user_type'] == 'admin'): ?>
                <td class="table-actions">
                  <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                  <a href="#" class="btn-danger btn-excluir" data-id="<?= $row['id'] ?>">Excluir</a>
                </td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center">Nenhum usuário encontrado.</td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="excluir.php" id="formExcluir">
        <div class="modal-header">
          <h5 class="modal-title" id="modalExcluirLabel">Confirmar Exclusão</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          Tem certeza que deseja excluir este registro?
          <input type="hidden" name="id" id="inputExcluirId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  <script src="../assets/js/main.js"></script>
</body>
</html>