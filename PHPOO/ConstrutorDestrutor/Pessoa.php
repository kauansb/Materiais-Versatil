<?php
class Pessoa {
public $nome;
private $corpo;
function __construct($n) {
$this->nome = $n;
echo "<p>Olá {$this->nome} seja bem vindo(a)</p>";
}
function criar_corpo($parte) {
$this->corpo .= " {$parte} ";
}
function mostra_corpo() {
echo $this->corpo;
}
function __destruct() {
echo ", eu sou um método destrutor";
}
}
?>