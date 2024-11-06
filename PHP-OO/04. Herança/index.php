<?php

require_once 'classes/Carro.php';
require_once 'classes/Moto.php';

// Instancia um carro e uma moto
$carro = new Carro("Toyota", "Corolla", 2020, 4);
$moto = new Moto("Honda", "CB 500", 2019, "Esportivo");

// Inclui a view para exibir as informações dos veículos
include 'views/veiculos.php';
?>
