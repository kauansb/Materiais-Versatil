<?php

// Inclui a classe Produto
require_once 'classes/Produto.php';

// Instancia o produto
$produto = new Produto();

// Atribui valor aos atributos
$produto->nome = "Iphone";
$produto->preco = 7000.00;


// Inclui a view para exibir o produto
include 'views/produto.php';

?>

