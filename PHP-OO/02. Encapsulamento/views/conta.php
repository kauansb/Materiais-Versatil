<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta Bancária</title>
    <link rel="stylesheet" href="./assets/estilo.css">
</head>
<body>

<div class="produto">
    <h2>Titular da Conta: <?php echo $conta->getTitular(); ?></h2>
    <p>Saldo Atual: <span class="preco"><?php echo "R$ " . number_format($conta->getSaldo(), 2, ',', '.'); ?></span></p>
</div>

</body>
</html>
