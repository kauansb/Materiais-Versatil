<?php
session_start();

class Logout {
    public function destruirSessao() {
        session_unset();
        session_destroy();
        header("Location: ../views/login.php");
        exit();
    }
}

$objAutentica = new Logout();
$objAutentica->destruirSessao();
?>