<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Armadura</title>
<link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
</head>
<body>

    <?php
    class ConstrutorArmadura{
        // Verificar se há dados enviados via POST para definir ou resetar
        public $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
        public $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
        public $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($username == 'admin' && $password == 'password123') {
                $_SESSION['username'] = $username;
                    $_SESSION['role'] = 'admin'; // Role de administrador
                if (isset($_POST['resetar'])) {
                    // Se resetar foi clicado, redefina as imagens para o estado inicial
                    $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
                    $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
                    $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";
                } else {
                    // Se definir foi clicado, altere as imagens de acordo com a seleção
                    $part = $_POST['armor-part'];
                    $color = $_POST['color'];

                    if ($part == 'cabeca') {
                        $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_$color.png";
                    } elseif ($part == 'tronco') {
                        $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_$color.png";
                    } elseif ($part == 'perna') {
                        $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_$color.png";
                    }
                }
            }else{
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'user'; // Role de usuário comum
            }
        }
    }
?>

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
        <img id="cabeca" src="<?php echo $cabecaSrc; ?>" alt="Cabeça">
        <img id="tronco" src="<?php echo $troncoSrc; ?>" alt="Tronco">
        <img id="perna" src="<?php echo $pernaSrc; ?>" alt="Pernas">
    </div>

    <script>
        document.getElementById('definir').addEventListener('click', function() {
            // Coletar dados do formulário e enviar via POST usando JavaScript (AJAX)
            const form = document.getElementById('armorForm');
            const formData = new FormData(form);

            fetch("", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Atualizar as imagens com base na resposta do servidor
                document.querySelector('.image-container').innerHTML = new DOMParser().parseFromString(data, 'text/html').querySelector('.image-container').innerHTML;
            });
        });

        document.getElementById('resetar').addEventListener('click', function() {
            // Resetar as imagens para o estado inicial
            fetch("", {
                method: "POST",
                body: new URLSearchParams('resetar=1')
            })
            .then(response => response.text())
            .then(data => {
                // Atualizar as imagens com base na resposta do servidor
                document.querySelector('.image-container').innerHTML = new DOMParser().parseFromString(data, 'text/html').querySelector('.image-container').innerHTML;
            });
        });
    </script>

</body>
</html>
