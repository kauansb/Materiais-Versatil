<?php

require_once 'Veiculo.php';

class Carro extends Veiculo {
    private $portas;

    public function __construct($marca, $modelo, $ano, $portas) {
        parent::__construct($marca, $modelo, $ano);
        $this->portas = $portas;
    }

    public function informacoes() {
        return parent::informacoes() . " - {$this->portas} portas";
    }
}
?>
