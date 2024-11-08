<?php

require_once 'Pagamento.php';

class PagamentoCartao extends Pagamento {
    private $numeroCartao;

    public function __construct($valor, $numeroCartao) {
        parent::__construct($valor);
        $this->numeroCartao = $numeroCartao;
    }

    // Implementação específica para pagamento com cartão
    public function processarPagamento() {
        return "Pagamento de R$ " . number_format($this->getValor(), 2, ',', '.') . 
               " processado com cartão de crédito (número: ****" . substr($this->numeroCartao, -4) . ")";
    }
}
?>
