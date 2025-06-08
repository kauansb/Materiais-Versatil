<?php
// Definindo os dados para a conexão
$host = 'localhost';     // Nome do servidor (localhost significa que o banco está na mesma máquina)
$db   = 'crud_db';       // Nome do banco de dados que será usado
$user = 'root';          // Nome de usuário do banco (padrão do XAMPP é 'root')
$pass = '';              // Senha do usuário (padrão do XAMPP é vazio)
$charset = 'utf8mb4';    // Define o conjunto de caracteres para evitar problemas com acentuação

// Montando a string de conexão (DSN - Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opções da conexão com PDO
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,          // Lança exceções em caso de erro
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Retorna os resultados como array associativo
];

// Tentando realizar a conexão com o banco de dados
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // Se der erro, exibe a mensagem e para o script
    die('Erro: ' . $e->getMessage());
}
?>
