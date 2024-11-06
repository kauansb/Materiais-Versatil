<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessão de Usuário</title>

    <link rel="stylesheet" href="./assets/estilo.css">
</head>
<body>

<div class="sessao">
    <h2>Bem-vindo, <?php echo $sessao->getNome(); ?>!</h2>
    <p>Hora de Login: <?php echo $sessao->getHoraLogin(); ?></p>
</div>

</body>
</html>
