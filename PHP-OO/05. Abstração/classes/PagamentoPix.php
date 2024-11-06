<?php

require_once 'Pagamento.php';

class PagamentoPix extends Pagamento {
    private $chavePix;

    public function __construct($valor, $chavePix) {
        parent::__construct($valor);
        $this->chavePix = $chavePix;
    }

    // Implementação específica para pagamento via Pix
    public function processarPagamento() {
        return "Pagamento de R$ " . number_format($this->valor, 2, ',', '.') . 
               " processado via Pix (chave: " . $this->chavePix . ")";
    }
}
?>
