<?php
// Definindo a classe Produto
class Produto {
    public $nome;
    public $preco;

    // Construtor da classe
    public function __construct($nome, $preco) {
        $this->nome = $nome;
        $this->preco = $preco;
    }

    // Método para formatar o preço
    public function exibirPreco() {
        return "R$ " . number_format($this->preco, 2, ',', '.');
    }
}

?>
