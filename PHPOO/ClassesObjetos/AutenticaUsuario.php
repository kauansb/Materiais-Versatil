<?php

session_start();

class AutenticaUsuario {
    private $login;
    private $senha;

    public function __construct($login, $senha) {
        $this->login = $login;
        $this->senha = $senha;
    }

    public function validarCredenciais() {
        return $this->login == "admin" && $this->senha == "123";
    }

    public function iniciarSessao() {
        $_SESSION['login'] = $this->login;
        $_SESSION['senha'] = $this->senha;
    }

    public function destruirSessao() {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
    }

    public function redirecionar($url) {
        header("Location: $url");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $objautentica = new AutenticaUsuario($login, $senha);

    if ($objautentica->validarCredenciais()) {
        $objautentica->iniciarSessao();
        $objautentica->redirecionar('site.php');
    } else {
        $objautentica->destruirSessao();
        $objautentica->redirecionar('erro.php');
    }
}
?>
