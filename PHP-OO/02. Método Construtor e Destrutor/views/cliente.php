<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/estilo.css">
    <title>Informações do Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Dados do Cliente</h1>
        <p><span class="highlight">Nome:</span> <?php echo $cliente->nome; ?></p>
        <p><span class="highlight">Email:</span> <?php echo $cliente->email; ?></p>
    </div>
</body>
</html>
