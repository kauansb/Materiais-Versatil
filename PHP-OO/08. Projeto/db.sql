-- Cria o banco de dados
CREATE DATABASE IF NOT EXISTS sistema_usuarios;
USE sistema_usuarios;

-- Cria a tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

-- Insere dados de exemplo na tabela
INSERT INTO usuarios (nome, email) VALUES 
('Kauan', 'kauan@versatil.com'),
('ED', 'ED@versatil.com'),
('Fernanda', 'fernanda@versatil.com'),
('Kamila', 'Kamila@versatil.com');

