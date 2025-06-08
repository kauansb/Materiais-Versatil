<?php
include 'conexao.php'; // Faz a conexão com o banco de dados
include 'proteger.php'; // Protege a página para usuários autenticados

$busca = $_GET['busca'] ?? '';
if ($busca) {
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?");
    $stmt->execute(["%$busca%", "%$busca%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM usuarios");
}
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

    <form method="GET" class="mb-3 d-flex" style="max-width:400px;">
      <input type="text" name="busca" class="form-control me-2" placeholder="Buscar por nome ou email" value="<?= htmlspecialchars($_GET['busca'] ?? '') ?>">
      <button type="submit" class="btn btn-outline-primary">Buscar</button>
    </form>
    
    <a href="cadastrar.php" class="btn btn-primary mb-3">Cadastrar Novo Usuário</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nome</th><th>Email</th><th>Telefone</th><th>Data Nasc.</th><th>Gênero</th>
          <th>Perfil</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
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
          <td><?= $row['data_nascimento'] ?></td>
          <td><?= ucfirst($row['genero']) ?></td>
          <td><?= ucfirst($row['perfil']) ?></td>
          <td>
            <?php if ($row['status']): ?>
              <span class="badge bg-success">Ativo</span>
            <?php else: ?>
              <span class="badge bg-secondary">Inativo</span>
            <?php endif; ?>
          </td>
          <td>
            <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
            <a href="excluir.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</a>
          </td>
        </tr>
      <?php endwhile; ?>
      <?php if ($stmt->rowCount() == 0): ?>
        <tr>
          <td colspan="7" class="text-center">Nenhum usuário encontrado.</td>
        </tr>
      </tbody>
      <?php endif; ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>