<?php
session_start();
include 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
  $stmt->execute([$email]);
  $usuario = $stmt->fetch();
  if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario'] = $usuario['nome'];
    header('Location: index.php');
  } else {
    $erro = "E-mail ou senha inválidos!";
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
<body class="container mt-5">
<h2>Login</h2>
<?php if (!empty($erro)): ?><div class="alert alert-danger"><?= $erro ?></div><?php endif; ?>
<form method="POST">
  <div class="mb-3"><label>E-mail</label><input type="email" name="email" class="form-control" required></div>
  <div class="mb-3"><label>Senha</label><input type="password" name="senha" class="form-control" required></div>
  <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</body>
</html>