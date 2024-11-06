<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>

    <link rel="stylesheet" href="./assets/estilo.css">
</head>
<body>

<div class="veiculo">
    <h2>Carro:</h2>
    <p><?php echo $carro->informacoes(); ?></p>
</div>

<div class="veiculo">
    <h2>Moto:</h2>
    <p><?php echo $moto->informacoes(); ?></p>
</div>

</body>
</html>
