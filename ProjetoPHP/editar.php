<?php
// Esses arquivos garantem que o usuário esteja autenticado e que a conexão com o banco esteja disponível.
include 'proteger.php'; 
include 'conexao.php';

// Verifica se o ID do usuário foi passado via GET
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(); // Guardamos os dados no array $usuario.

// Quando o formulário é enviado, capturamos os dados e usamos UPDATE para alterar no banco de dados.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, email=?, telefone=? WHERE id=?");
    $stmt->execute([$nome, $email, $telefone, $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1>Editar Usuário</h1>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" value="<?= $usuario['nome'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= $usuario['email'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control" value="<?= $usuario['telefone'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>

</body>
</html>
