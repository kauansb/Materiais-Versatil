<?php 
include './db/conexao.php';   // Conecta com o banco
session_start();

$erro = '';
$cadastroSucesso = false;

// Recebe os dados enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome          = trim($_POST['nome'] ?? '');
    $email         = trim($_POST['email'] ?? '');
    $telefone      = trim($_POST['telefone'] ?? '');
    $senha         = $_POST['senha'] ?? '';
    $repetirSenha  = $_POST['repetir_senha'] ?? '';
    $data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null; // Data de nascimento é opcional
    $genero = $_POST['genero'];

    // Validações básicas
    if (empty($nome) || empty($email) || empty($senha) || empty($repetirSenha)) {
        $erro = 'Por favor, preencha todos os campos obrigatórios.';
    } elseif (!preg_match('/^\d{10,11}$/', $telefone)) {
        $erro = 'Telefone deve ter 10 a 11 dígitos';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'E-mail inválido.';
    } elseif ($senha !== $repetirSenha) {
        $erro = 'As senhas não coincidem.';
    } else {
        // Verifica se o e-mail já existe
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $erro = 'E-mail já cadastrado.';
        } else {
            // Insere no banco
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, telefone, senha) VALUES (?, ?, ?, ?)');
            if ($stmt->execute([$nome, $email, $telefone, $senhaHash])) {
                $cadastroSucesso = true;
            } else {
                $erro = 'Falha ao cadastrar. Tente novamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Cadastrar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../assets/css/main.css"/>
</head>
<body>

  <!-- Se cadastro foi bem-sucedido, exibe o modal e redireciona após fechar -->
  <?php if ($cadastroSucesso): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modalEl = document.getElementById('modalSucesso');
      var modal = new bootstrap.Modal(modalEl);
      modal.show();
      modalEl.addEventListener('hidden.bs.modal', function() {
        window.location.href = 'index.php';
      });
    });
  </script>
  <?php endif; ?>

    <main class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-5 w-100 mx-auto" style="max-width:900px;">
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
                            <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" <?= (!isset($_POST['sexo']) || $_POST['sexo'] == 'masculino') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'feminino') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="feminino">Feminino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="genero" id="outro" value="outro" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'outro') ? 'checked' : '' ?>>
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
                <div class="mt-3 text-center">
                    <button type="submit" class="btn btn-primary mt-3" style="font-size:1.1rem;">Cadastrar</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <a href="index.php">Voltar</a>
            </div>
        </div>
    </main>

    <!-- Modal de Sucesso -->
    <div class="modal fade" id="modalSucesso" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:16px;">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center pt-2">
                    <p class="fs-5 mb-4 mt-2">Cadastro realizado com sucesso!</p>
                    <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

  <?php include 'footer.html'; ?>
</body>
</html>