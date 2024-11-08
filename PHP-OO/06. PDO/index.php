<?php
// Inclui a conexão com o banco de dados e a classe Usuario
require_once './classes/Database.php';
require_once './classes/Usuario.php';

try {
    // Conecta ao banco de dados
    $database = new Database();
    $pdo = $database->getConnection();

    // Consulta os usuários
    $query = $pdo->query("SELECT * FROM usuarios");
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit();
}

// Inicia a sessão para poder acessar variáveis de sessão
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="./assets/index.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <h1>Lista de Usuários</h1>

    <?php
        // Exibe mensagem de sucesso ou erro, se estiver definida na sessão
        if (isset($_SESSION['mensagem'])) {
            echo $_SESSION['mensagem'];
            // Limpa a mensagem da sessão após exibição
            unset($_SESSION['mensagem']);
        }
    ?>

    <!-- Link para adicionar novo usuário -->
    <div class="add-user">
        <a href="./views/adiciona_usuario.php" class="button">Adicionar Novo Usuário</a>
    </div>

    <!-- Tabela de usuários -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($usuarios)): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td>
                            <!-- Botão de exclusão -->
                            <a href="./views/excluir_usuario.php?id=<?php echo $usuario['id']; ?>" class="btn-excluir">
                                <i class="fa fa-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhum usuário encontrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="./assets/index.js"></script>
</body>
</html>
