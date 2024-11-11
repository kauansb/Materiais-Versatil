<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Login</title>
</head>
<body>
<main id="container">
    <form id="login_form" method="post" action="../classes/AutenticaUsuario.php">
        <div id="form_header">
            <img src="../assets/img/logo.png" alt="Versátil TI">
        </div>

        <!-- Div para exibição de erro -->
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>

        <div id="inputs">
            <div class="input-box">
                <label for="name">Nome
                    <div class="input-field">
                        <input type="text" id="login" name="login" required>
                    </div>
                </label>
            </div>
            <div class="input-box">
                <label for="senha">Senha
                    <div class="input-field">
                        <input type="password" id="senha" name="senha" required>
                    </div>
                </label>
            </div>
        </div>
        <button type="submit" id="login_button">Login</button>
    </form>

</main>

<script type="text/javascript" src="../assets/js/script.js"></script>

<?php if (isset($_SESSION['erro'])): ?>
        <script>
            // Exibe a mensagem de erro ao carregar a página
            showErrorMessage('<?php echo $_SESSION['erro']; ?>');
        </script>
        <?php unset($_SESSION['erro']); ?>
<?php endif; ?>

</body>
</html>
