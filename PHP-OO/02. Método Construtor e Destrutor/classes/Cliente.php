<?php


class Cliente
{
    public $nome;
    public $email;

    // Método construtor
    public function __construct($nome, $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    // Método destrutor
    public function __destruct()
    {
        echo "Cliente {$this->nome} foi removido do sistema.<br>";
    }
}

