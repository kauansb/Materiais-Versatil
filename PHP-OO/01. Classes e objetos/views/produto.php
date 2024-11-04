<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>

    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="produto">
    <h2><?php echo ($produto->nome); ?></h2>
    <p class="preco"><?php echo htmlspecialchars($produto->exibirPreco()); ?></p>
</div>

</body>
</html>
