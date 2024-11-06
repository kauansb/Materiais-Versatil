<?php

class Usuario {
    private $nome;
    private $horaLogin;

    // Método construtor - Inicia a sessão do usuário
    public function __construct($nome) {
        $this->nome = $nome;
        $this->horaLogin = date("H:i:s");
        echo "Sessão iniciada para {$this->nome}";
    }

    // Método para obter o nome do usuário
    public function getNome() {
        return $this->nome;
    }

    // Método para obter a hora de login
    public function getHoraLogin() {
        return $this->horaLogin;
    }

    // Método destrutor - Finaliza a sessão do usuário
    public function __destruct() {
        echo "Sessão encerrada para {$this->nome}.";
    }
}
?>
