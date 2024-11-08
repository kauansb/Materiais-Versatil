<?php
session_start();

class AutenticaUsuario {
    public function destruirSessao() {
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
}

$objAutentica = new AutenticaUsuario();
$objAutentica->destruirSessao();
?>
