<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>

    <!-- Link para o arquivo CSS na pasta assets -->
    <link rel="stylesheet" href="./assets/estilo.css">
</head>
<body>

<div class="card">
    <h2><?php echo $produto->nome; ?></h2>
    <p class="preco"><?php echo $produto->exibirPreco(); ?></p>
</div>

</body>
</html>
