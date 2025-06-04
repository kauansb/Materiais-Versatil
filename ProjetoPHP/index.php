<?php include 'db/conexao.php'; ?>
<?php include 'proteger.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<?php include 'navbar.php'; ?>

  <h1>Usuários</h1>
  <a href="adicionar.php" class="btn btn-success mb-3">Novo Usuário</a>

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
    </tbody>
  </table>

</body>
</html>
