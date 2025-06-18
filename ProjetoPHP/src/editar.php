<?php
// Esses arquivos garantem que o usuário esteja autenticado e que a conexão com o banco esteja disponível.
include 'proteger.php';
verificarAdmin(); // Função que verifica se o usuário é admin 
include './db/conexao.php';

// Verifica se o ID do usuário foi passado via GET
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: painel.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(); // Guardamos os dados no array $usuario.
if (!$usuario) {
    header('Location: painel.php');
    exit;
}

$erro = '';
// Quando o formulário é enviado, capturamos os dados e usamos UPDATE para alterar no banco de dados.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $data_nascimento = !empty($_POST['data_nascimento']) ? trim($_POST['data_nascimento']) : null;
    $genero = $_POST['genero'];
    $user_type = $_POST['user_type'];
    $status = isset($_POST['status']) ? 1 : 0;

    // validações
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'E-mail inválido.';
    } elseif (!empty($telefone) && !preg_match('/^\d{10,11}$/', $telefone)) {
        $erro = 'Telefone inválido.';
    } elseif (!empty($data_nascimento)) {
        $d = DateTime::createFromFormat('Y-m-d', $data_nascimento);
        if (!$d || $d->format('Y-m-d') !== $data_nascimento) {
            $erro = 'Data de nascimento inválida.';
        }
    }

    if (empty($erro)) {
        try {
            $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, email=?, telefone=?, data_nascimento=?, genero=?, user_type=?, status=? WHERE id=?");
            $stmt->execute([$nome, $email, $telefone, $data_nascimento, $genero, $user_type, $status, $id]);
            $edicaoSucesso = true;
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $erro = 'E-mail já cadastrado.';
            } else {
                $erro = 'Erro ao atualizar: ' . $e->getMessage();
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
    <title>Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/main.css"/>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <main class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-5 w-100" style="max-width:900px;">
            <h1 class="login-title mb-4 mt-2">
                <span class="muted">Editar</span><span>Cliente</span>
            </h1>
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger text-center"><?= $erro ?></div>
            <?php endif; ?>
            <form class="mt-4" method="POST" autocomplete="off"> 
                <div class="row mb-3">
                    <div class="col-12">
                        <input type="text" class="form-control mb-3" placeholder="Nome" name="nome" required value="<?= htmlspecialchars($usuario['nome']) ?>">
                    </div>
                    <div class="col-md-6 mb-3 mb-md-0">
                        <input type="email" class="form-control" placeholder="E-mail" name="email" required value="<?= htmlspecialchars($usuario['email']) ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="tel" class="form-control" placeholder="Telefone" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>">
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="me-2 mb-0" for="data_nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?= htmlspecialchars($usuario['data_nascimento']) ?>">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <label class="me-2 mb-0" for="genero">Gênero:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genero" id="masculino" value="masculino" <?= $usuario['genero']=='masculino'?'checked':'' ?>>
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="genero" id="feminino" value="feminino" <?= $usuario['genero']=='feminino'?'checked':'' ?>>
                            <label class="form-check-label" for="feminino">Feminino</label>
                        </div>
                        <div class="form-check form-check-inline ms-2">
                            <input class="form-check-input" type="radio" name="genero" id="outro" value="outro" <?= $usuario['genero']=='outro'?'checked':'' ?>>
                            <label class="form-check-label" for="outro">Outro</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="me-2 mb-0" for="user_type">Perfil:</label>
                        <select name="user_type" id="user_type" class="form-select">
                            <option value="user" <?= $usuario['user_type']=='user'?'selected':'' ?>>Comum</option>
                            <option value="admin" <?= $usuario['user_type']=='admin'?'selected':'' ?>>Admin</option>
                        </select>
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <input type="checkbox" name="status" id="status" class="form-check-input me-2" <?= $usuario['status'] ? 'checked' : '' ?>>
                        <label class="form-check-label mb-0" for="status">Ativo</label>
                    </div>
                </div>
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                    <a href="painel.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
    <!-- Modal de Sucesso Edição -->
    <div class="modal fade" id="modalSucessoEditar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:16px;">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body text-center pt-2">
                    <p class="fs-5 mb-4 mt-2">Usuário atualizado com sucesso!</p>
                    <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
  <?php include 'footer.html'; ?>
  <!-- Modal de sucesso ao editar -->
  <?php if (!empty($edicaoSucesso)): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var modalEl = document.getElementById('modalSucessoEditar');
      var modal = new bootstrap.Modal(modalEl);
      modal.show();
      modalEl.addEventListener('hidden.bs.modal', function() {
        window.location.href = 'painel.php';
      });
    });
  </script>
  <?php endif; ?>
</body>
</html>