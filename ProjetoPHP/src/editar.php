<?php
include './db/conexao.php';

// Busca usuário
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: painel.php');
    exit;
}
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch();
if (!$usuario) {
    header('Location: painel.php');
    exit;
}

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
    $genero = $_POST['genero'];
    $user_type = $_POST['user_type'];
    $status = isset($_POST['status']) ? 1 : 0;

    try {
        $stmt = $pdo->prepare("UPDATE usuarios SET nome=?, email=?, telefone=?, data_nascimento=?, genero=?, user_type=?, status=? WHERE id=?");
        $stmt->execute([$nome, $email, $telefone, $data_nascimento, $genero, $user_type, $status, $id]);
        header('Location: painel.php');
        exit;
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            $erro = 'E-mail já cadastrado.';
        } else {
            $erro = 'Erro ao atualizar: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>