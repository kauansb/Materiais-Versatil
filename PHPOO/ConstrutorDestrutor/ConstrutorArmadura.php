<?php
// ConstrutorArmadura.php

class ConstrutorArmadura {
    private $cabecaSrc;
    private $troncoSrc;
    private $pernaSrc;

    public function __construct() {
        $this->cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
        $this->troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
        $this->pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processarFormulario();
        }
    }

    private function processarFormulario() {
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == 'admin' && $password == 'password123') {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'admin';

                if (isset($_POST['resetar'])) {
                    $this->resetarArmadura();
                } else {
                    $this->definirArmadura($_POST['armor-part'], $_POST['color']);
                }
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'user';
            }
        }
    }

    private function resetarArmadura() {
        $this->cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_inicial.png";
        $this->troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_inicial.png";
        $this->pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_inicial.png";
    }

    private function definirArmadura($part, $color) {
        if ($part == 'cabeca') {
            $this->cabecaSrc = "/ConstrutorDestrutor/img/armaduras/cabeca_$color.png";
        } elseif ($part == 'tronco') {
            $this->troncoSrc = "/ConstrutorDestrutor/img/armaduras/tronco_$color.png";
        } elseif ($part == 'perna') {
            $this->pernaSrc = "/ConstrutorDestrutor/img/armaduras/perna_$color.png";
        }
    }

    public function getCabecaSrc() {
        return $this->cabecaSrc;
    }

    public function getTroncoSrc() {
        return $this->troncoSrc;
    }

    public function getPernaSrc() {
        return $this->pernaSrc;
    }
}
?>
