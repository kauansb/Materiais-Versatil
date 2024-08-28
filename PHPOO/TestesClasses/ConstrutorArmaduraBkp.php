<?php
    class ConstrutorArmadura{
        // Verificar se há dados enviados via POST para definir ou resetar
        public $nome = null;
        public $password = null;
        public $cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
        public $troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
        public $pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";
        public __construct($username,$password){
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
    }
?>
