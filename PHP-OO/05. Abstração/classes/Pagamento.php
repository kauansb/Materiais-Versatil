<?php

abstract class Pagamento {
    protected $valor;

    public function __construct($valor) {
        $this->valor = $valor;
    }

    // Método abstrato - cada tipo de pagamento terá sua implementação específica
    abstract public function processarPagamento();

    public function getValor() {
        return $this->valor;
    }
}
?>
