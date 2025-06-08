DROP DATABASE IF EXISTS crud_db;
CREATE DATABASE crud_db DEFAULT CHARACTER SET utf8mb4;
USE crud_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL DEFAULT '',
    telefone VARCHAR(20),
    data_nascimento DATE DEFAULT NULL,
    genero ENUM('masculino', 'feminino', 'outro') DEFAULT 'outro',
    status TINYINT(1) NOT NULL DEFAULT 1,
    user_type ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);