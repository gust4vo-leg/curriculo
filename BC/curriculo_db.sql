create database curriculo;

select current_user();
show databases;
use curriculo;


CREATE DATABASE IF NOT EXISTS curriculo;
USE curriculo;

SHOW TABLES;

CREATE TABLE curriculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cargo VARCHAR(150),
    resumo TEXT,
    cidade VARCHAR(100),
    data_nascimento DATE,
    email VARCHAR(150),
    telefone VARCHAR(30),
    linkedin VARCHAR(255),
    outros VARCHAR(255)
);

SELECT * FROM curriculos;

CREATE TABLE formacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curriculo_id INT NOT NULL,
    instituicao VARCHAR(150) NOT NULL,
    curso VARCHAR(150) NOT NULL,
    nivel VARCHAR(100),
    periodo_inicio DATE,
    periodo_fim DATE,

    FOREIGN KEY (curriculo_id)
        REFERENCES curriculos(id)
        ON DELETE CASCADE
);

SELECT * FROM formacao;

CREATE TABLE experiencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curriculo_id INT NOT NULL,
    empresa VARCHAR(150) NOT NULL,
    cargo VARCHAR(150) NOT NULL,
    periodo_inicio DATE,
    periodo_fim DATE,
    descricao TEXT,

    FOREIGN KEY (curriculo_id)
        REFERENCES curriculos(id)
        ON DELETE CASCADE
);