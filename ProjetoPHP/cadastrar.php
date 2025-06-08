<?php 
include 'conexao.php';   // Conecta com o banco

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null; // Data de nascimento é opcional
    $genero = $_POST['genero'];
    $perfil = isset($_POST['perfil']) ? $_POST['perfil'] : 'comum'; // Define o perfil como 'comum' por padrão
    $status = isset($_POST['status']) ? 0 : 1; // Define o status como ativo (1) por padrão

    // Criptografa a senha com segurança
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara e executa a inserção no banco de dados
    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha, data_nascimento, genero, perfil, status) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $telefone, $senha_hash, $data_nascimento, $genero, $perfil, $status]);
    // Redireciona para a página de login após o cadastro
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Novo Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

  <h1>Novo Usuário</h1>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Senha</label>
      <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Data de Nascimento</label>
      <input type="date" name="data_nascimento" class="form-control">
    </div>
    <div class="mb-3">
      <label class="form-label">Gênero</label>
      <select name="genero" class="form-control">
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
        <option value="outro">Outro</option>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>

</body>
</html>