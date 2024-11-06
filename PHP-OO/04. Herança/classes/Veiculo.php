<?php

class Veiculo {
    protected $marca;
    protected $modelo;
    protected $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function informacoes() {
        return "{$this->marca} {$this->modelo} ({$this->ano})";
    }
}
?>
