<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Armadura</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            margin: 20px;
        }
        form {
            max-width: 300px;
        }
        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .image-container img {
            width: 150px;
            height: 150px;
            margin-bottom: 10px;
        }
        #definir, #resetar {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <form method="POST" action="">
        <h2>Escolha a parte da armadura:</h2>
        <select name="armor-part">
            <option value="cabeca">Cabeça</option>
            <option value="tronco">Tronco</option>
            <option value="perna">Pernas</option>
        </select>

        <h2>Escolha a cor:</h2>
        <label><input type="radio" name="color" value="dourada"> Dourada</label><br>
        <label><input type="radio" name="color" value="vermelha"> Vermelha</label><br>
        <label><input type="radio" name="color" value="preta"> Preta</label><br>
        <label><input type="radio" name="color" value="branca"> Branca</label><br>

        <input id="definir" type="submit" name="definir" value="Definir">
        <input id="resetar" type="submit" name="resetar" value="Resetar">
    </form>

    <div class="image-container">
        <img id="cabeca" src="<?php echo $cabecaSrc; ?>" alt="Cabeça">
        <img id="tronco" src="<?php echo $troncoSrc; ?>" alt="Tronco">
        <img id="perna" src="<?php echo $pernaSrc; ?>" alt="Pernas">
    </div>

</body>
</html>

<?php
    // Definindo os caminhos padrão das imagens
    $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
    $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
    $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";

    // Verificando se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['definir'])) {
            $part = $_POST['armor-part'];
            $color = $_POST['color'];

            // Atualizando as imagens com base na seleção
            if ($part == 'cabeca') {
                $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_$color.png";
            } elseif ($part == 'tronco') {
                $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_$color.png";
            } elseif ($part == 'perna') {
                $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_$color.png";
            }
        } elseif (isset($_POST['resetar'])) {
            // Resetando as imagens para o estado inicial
            $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
            $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
            $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";
        }
    }
?>
