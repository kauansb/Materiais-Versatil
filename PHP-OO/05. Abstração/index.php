<?php

require_once 'classes/PagamentoCartao.php';
require_once 'classes/PagamentoPix.php';

// Instancia um pagamento com cartão e um pagamento via Pix
$pagamentoCartao = new PagamentoCartao(150.00, "1234567890123456");
$pagamentoPix = new PagamentoPix(250.00, "email@example.com");

// Inclui a view para exibir as informações dos pagamentos
include 'views/pagamento.php';
?>
