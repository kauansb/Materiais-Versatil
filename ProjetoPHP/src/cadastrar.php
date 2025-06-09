<?php
include './db/conexao.php'; // Conecta com o banco

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $repetir_senha = $_POST['repetir_senha'];
    $data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
    $genero = $_POST['sexo'];
    $status = 1; // Ativo por padrão
    $user_type = 'user';

    // Validação de senha
    if ($senha !== $repetir_senha) {
        $erro = 'As senhas não coincidem!';
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, telefone, senha, data_nascimento, genero, status, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nome, $email, $telefone, $senha_hash, $data_nascimento, $genero, $status, $user_type]);
            session_start();
            $_SESSION['sucesso'] = 'Usuário cadastrado com sucesso!';
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            $erro = 'Erro ao cadastrar: ' . ($e->errorInfo[1] == 1062 ? 'E-mail já cadastrado.' : $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cadastrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/main.css"/>
</head>
<body>
    <main class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-5 w-100" style="max-width:900px;">
            <h1 class="login-title mb-4 mt-2">
                <span class="muted">Cadastrar</span><span>Cliente</span>
            </h1>
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger text-center"> <?= $erro ?> </div>
            <?php endif; ?>
            <form class="mt-4" method="POST" autocomplete="off">
                <div class="row mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" placeholder="Nome" name="nome" required value="<?= isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '' ?>">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" placeholder="Telefone" name="telefone" value="<?= isset($_POST['telefone']) ? htmlspecialchars($_POST['telefone']) : '' ?>">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6 d-flex align-items-center mb-3 mb-md-0">
                        <label class="me-2 mb-0" for="sexo">Sexo:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sexo" id="masculino" value="masculino" <?= (!isset($_POST['sexo']) || $_POST['sexo'] == 'masculino') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="sexo" id="feminino" value="feminino" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'feminino') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="feminino">Feminino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="sexo" id="outro" value="outro" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'outro') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="outro">Outro</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-4 align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="mb-1" for="senha">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" id="senha" name="senha" required>
                            <span class="input-group-text bg-transparent border-0" style="cursor:pointer;" id="toggleSenha">
                                <i class="bi bi-eye" style="color: var(--placeholder);"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="mb-1" for="repetir_senha">Repetir Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" id="repetir_senha" name="repetir_senha" required>
                            <span class="input-group-text bg-transparent border-0" style="cursor:pointer;" id="toggleRepetirSenha">
                                <i class="bi bi-eye" style="color: var(--placeholder);"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Data de Nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" value="<?= isset($_POST['data_nascimento']) ? htmlspecialchars($_POST['data_nascimento']) : '' ?>">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" style="font-size:1.1rem;">Cadastrar</button>
                    <div class="mt-3">
                        <a href="index.php" style="color: var(--primary);">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/main.js"></script>          
</body>
</html>