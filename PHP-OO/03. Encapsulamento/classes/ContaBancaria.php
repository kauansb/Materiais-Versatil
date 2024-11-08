<?php

class ContaBancaria {
    private $titular;
    private $saldo;

    // Construtor da classe
    public function __construct($titular, $saldoInicial = 0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    // Getter para o titular
    public function getTitular() {
        return $this->titular;
    }

    // Setter para o titular
    public function setTitular($titular) {
        $this->titular = $titular;
    }

    // Método para obter o saldo
    public function getSaldo() {
        return $this->saldo;
    }

    // Método para depositar um valor
    public function depositar($valor) {
        if ($valor > 0) {
            $this->saldo += $valor;
        }
    }

    // Método para sacar um valor
    public function sacar($valor) {
        if ($valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
        }
    }
}
?>
