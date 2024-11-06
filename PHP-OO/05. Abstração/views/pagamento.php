<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamentos</title>

    <link rel="stylesheet" href="./assets/estilo.css">
</head>
<body>

<div class="pagamento">
    <h2>Pagamento com Cartão:</h2>
    <p><?php echo $pagamentoCartao->processarPagamento(); ?></p>
</div>

<div class="pagamento">
    <h2>Pagamento via Pix:</h2>
    <p><?php echo $pagamentoPix->processarPagamento(); ?></p>
</div>

</body>
</html>
