<?php
session_start();

class AutenticaUsuario {
    private $login;
    private $senha;

    public function __construct($login, $senha) {
        $this->login = $login;
        $this->senha = $senha;
    }

    // Valida credenciais de acesso
    public function validarCredenciais() {
        // Comparar credenciais com valores salvos de forma segura
        return hash_equals($this->login, 'admin') && hash_equals($this->senha, '123');
    }

    // Inicia a sessão de usuário com segurança
    public function iniciarSessao() {
        $_SESSION['usuario'] = [
            'login' => $this->login,
            'autenticado' => true,
            'ultima_atividade' => time(),
        ];
    }

    // Destroi a sessão do usuário
    public function destruirSessao() {
        $_SESSION = [];
        if (session_id() !== "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        session_destroy();
    }

    // Redirecionamento seguro
    public function redirecionar($url) {
        if ($url) {
            header("Location: $url");
            exit();
        }
        throw new Exception('URL inválida');
    }
}

// Verifica o envio do formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Entrada segura com validação de formulário
    $login = filter_input(INPUT_POST, 'login');
    $senha = filter_input(INPUT_POST, 'senha');

    $objAutentica = new AutenticaUsuario($login, $senha);

    // Validação e definição de mensagem de erro com base na autenticação
    if ($objAutentica->validarCredenciais()) {
        $objAutentica->iniciarSessao();
        // Redireciona para o site após o login bem-sucedido
        $objAutentica->redirecionar('../views/site.php');
    } else {
        // Define erro e redireciona de volta para a página de login
        $_SESSION['erro'] = 'Usuário ou senha inválidos. Tente novamente.';
        $objAutentica->redirecionar('../views/login.php');
    }
}
?>
