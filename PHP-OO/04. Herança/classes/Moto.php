<?php

require_once 'Veiculo.php';

class Moto extends Veiculo {
    private $tipoGuidao;

    public function __construct($marca, $modelo, $ano, $tipoGuidao) {
        parent::__construct($marca, $modelo, $ano);
        $this->tipoGuidao = $tipoGuidao;
    }

    public function informacoes() {
        return parent::informacoes() . " - Guidão: {$this->tipoGuidao}";
    }
}
?>
