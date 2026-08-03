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
    outros VARCHAR(255),
    empresa VARCHAR(150),
    cargo_empresa VARCHAR(150),
    experiencia_inicio DATE,
    experiencia_fim DATE,
    descricao_experiencia TEXT,
    instituicao VARCHAR(150),
    curso VARCHAR(150),
    formacao_inicio DATE,
    formacao_fim DATE,
    habilidades TEXT
);

SELECT * FROM curriculos;