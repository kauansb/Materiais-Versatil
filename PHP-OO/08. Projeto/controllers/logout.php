<?php
session_start();

class Logout {
    // Destroi a sessão do usuário
    public function destruirSessao() {
        $_SESSION = [];
        if (session_id() !== "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        session_destroy();
    }
   
}

$objAutentica = new Logout();
$objAutentica->destruirSessao();
?>