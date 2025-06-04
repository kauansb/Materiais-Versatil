<?php
include 'conexao.php'; // Faz a conexão com o banco de dados
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.php'; ?>
  <div class="container mt-5">
    <h1 class="mb-4">Bem-vindo ao Painel</h1>
    <h1>Usuários</h1>
    <a href="adicionarUser.php" class="btn btn-success mb-3">Novo Usuário</a>
    <table class="table table-bordered">
      <thead>
        <tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>
      </thead>
      <tbody>
      <?php
        $stmt = $pdo->query("SELECT * FROM usuarios");
        while ($row = $stmt->fetch()):
      ?>
        <tr>
          <td><?= $row['nome'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['telefone'] ?></td>
          <td>
            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="excluir.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
      <?php if ($stmt->rowCount() == 0): ?>
        <tr>
          <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
        </tr>
      </tbody>
      <?php endif; ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>