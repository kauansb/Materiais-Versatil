<?php

require_once 'classes/Usuario.php';

// Instancia uma nova sessão de usuário
$sessao = new Usuario("Kauan");

// Inclui a view para exibir as informações da sessão
include 'views/sessao.php';

?>
