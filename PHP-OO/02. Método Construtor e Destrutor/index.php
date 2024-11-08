<?php

require_once './classes/Cliente.php';


// Criando uma nova instância da classe Cliente
$cliente = new Cliente("Kauan", "kauan@email.com");

// Incluindo a visualização
include './views/cliente.php';

?>

