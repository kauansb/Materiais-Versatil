<?php

require_once 'classes/ContaBancaria.php';

// Instancia a conta bancária
$conta = new ContaBancaria("Kauan", 1000.00);

// Realiza algumas operações
$conta->depositar(500.00);
$conta->sacar(200.00);

// Inclui a view para exibir as informações da conta
include 'views/conta.php';
?>

