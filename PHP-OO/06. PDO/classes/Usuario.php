<?php
require_once 'Database.php';

class Usuario {
    private $conn;
    private $table = 'usuarios';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Listar todos os usuários
    public function listar() {
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->query($sql);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Criar um novo usuário
    public function criar($nome, $email) {
        $sql = "INSERT INTO " . $this->table . " (nome, email) VALUES (:nome, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        
        return $stmt->execute();
    }


    // Excluir um usuário pelo ID
    public function excluir($id) {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    // Atualizar um usuário existente
    public function atualizar($id, $nome, $email) {
        $sql = "UPDATE " . $this->table . " SET nome = :nome, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }


}
?>
