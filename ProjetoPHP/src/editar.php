<?php
// Esses arquivos garantem que o usuário esteja autenticado e que a conexão com o banco esteja disponível.
include './db/conexao.php';


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
    $data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
    $genero = $_POST['genero'];
    $perfil = $_POST['perfil'];
    $status = isset($_POST['status']) ? 1 : 0;

    $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, email=?, telefone=?, data_nascimento=?, genero=?, perfil=?, status=? WHERE id=?");
    $stmt->execute([$nome, $email, $telefone, $data_nascimento, $genero, $perfil, $status, $id]);
    header('Location: painel.php');
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
    <div class="mb-3">
      <label class="form-label">Data de Nascimento</label>
      <input type="date" name="data_nascimento" class="form-control" value="<?= $usuario['data_nascimento'] ?>">
    </div>
    <div class="mb-3">
      <label class="form-label">Gênero</label>
      <select name="genero" class="form-control">
        <option value="masculino" <?= $usuario['genero']=='masculino'?'selected':'' ?>>Masculino</option>
        <option value="feminino" <?= $usuario['genero']=='feminino'?'selected':'' ?>>Feminino</option>
        <option value="outro" <?= $usuario['genero']=='outro'?'selected':'' ?>>Outro</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label">Perfil</label>
      <select name="perfil" class="form-control">
        <option value="comum" <?= $usuario['perfil']=='comum'?'selected':'' ?>>Comum</option>
        <option value="admin" <?= $usuario['perfil']=='admin'?'selected':'' ?>>Admin</option>
      </select>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" name="status" class="form-check-input" <?= $usuario['status'] ? 'checked' : '' ?>>
      <label class="form-check-label">Ativo</label>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>

</body>
</html>
