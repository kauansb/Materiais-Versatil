<?php
// Definindo a classe Produto
class Produto {
    public $nome;
    public $preco;

    // Método para formatar o preço
    public function exibirPreco() {
        return "R$ " . number_format($this->preco, 2, ',', '.');
    }
}

?>
