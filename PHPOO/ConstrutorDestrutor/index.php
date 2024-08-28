<?php
// index.php

session_start();
require_once 'ConstrutorArmadura.php';

$armadura = new ConstrutorArmadura();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Armadura</title>
    <link rel="stylesheet" type="text/css" href="/ConstrutorDestrutor/css/stylesheet.css" media="screen" />
</head>
<body>

    <form id="armorForm" method="POST" action="">
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

        <input id="definir" type="button" value="Definir">
        <input id="resetar" type="button" value="Resetar">
    </form>

    <div class="image-container">
        <img id="cabeca" src="<?php echo $armadura->getCabecaSrc(); ?>" alt="Cabeça">
        <img id="tronco" src="<?php echo $armadura->getTroncoSrc(); ?>" alt="Tronco">
        <img id="perna" src="<?php echo $armadura->getPernaSrc(); ?>" alt="Pernas">
    </div>

    <script src="/ConstrutorDestrutor/scripts/RenderizadorArmadura.js"></script>

</body>
</html>
