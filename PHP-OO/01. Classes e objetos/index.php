<?php

// Inclui a classe Produto
require_once 'classes/Produto.php';

// Instancia o produto
$produto = new Produto("Smartphone", 1500.00);

// Inclui a view para exibir o produto
include 'views/produto.php';
?>
