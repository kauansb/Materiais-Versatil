<?php
session_start();
include './db/conexao.php'; // Inclui o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
  $stmt->execute([$email]);
  $usuario = $stmt->fetch();
  if ($usuario && password_verify($senha, $usuario['senha'])) {
    $_SESSION['usuario'] = $usuario['nome'];
    header('Location: painel.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">    
    <link rel="stylesheet" href="../assets/css/main.css" />
  </head>
<body class="container mt-5">

<!-- Mensagens de erro e sucesso serão exibidas abaixo: -->
<?php if (!empty($erro)): ?><div class="alert alert-danger"><?= $erro ?></div><?php endif; ?>

  <main class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-5 shadow-sm">
      <h1 class="login-title mb-4 mt-5">
        <span class="muted">Login</span><span>System</span>
      </h1>
      <form class="mt-5" method="POST">
        <div class="mb-4">
          <input
            type="email"
            placeholder="E-mail"
            class="form-control"
            id="email"
            name="email"
            required
          />
        </div>
        <div class="mb-4">
          <input
            type="password"
            placeholder="Senha"
            class="form-control"
            id="password"
            name="senha"
            required
          />
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mt-3">Acessar</button>
        </div>
      </form>
        <p class="mt-5 text-center">
          Não tem cadastrado? <a href="cadastrar.php">Clique aqui</a>
        </p>
    </div>
  </main>
</body>
</html>