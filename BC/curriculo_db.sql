create database curriculo;

select current_user();
show databases;
use curriculo;


CREATE DATABASE IF NOT EXISTS curriculo;
USE curriculo;

CREATE TABLE dados_pessoais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cargo VARCHAR(150),                 
    resumo TEXT,                     
    informacoes_principais VARCHAR(255)             
);

ALTER TABLE dados_pessoais
DROP COLUMN informacoes_principais,
ADD COLUMN cidade VARCHAR(100),
ADD COLUMN data_nascimento DATE;

SELECT * FROM dados_pessoais;

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dados_pessoais_id INT NOT NULL,
    email VARCHAR(150),
    telefone VARCHAR(30),
    linkedin VARCHAR(255),             
    outro_perfil VARCHAR(255),                   
    CONSTRAINT fk_contatos_perfil
        FOREIGN KEY (dados_pessoais_id) REFERENCES dados_pessoais(id)
        ON DELETE CASCADE
);


CREATE TABLE experiencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dados_pessoais_id INT NOT NULL,
    empresa VARCHAR(150) NOT NULL,
    funcao VARCHAR(150) NOT NULL,         
    periodo_inicio DATE,
    periodo_fim DATE,                          
    descricao TEXT,
    ordem INT DEFAULT 0,           
    CONSTRAINT fk_experiencias_perfil
        FOREIGN KEY (dados_pessoais_id) REFERENCES dados_pessoais(id)
        ON DELETE CASCADE
);

CREATE TABLE formacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dados_pessoais_id INT NOT NULL,
    instituicao VARCHAR(150) NOT NULL,
    curso VARCHAR(150) NOT NULL,
    periodo_inicio DATE,
    periodo_fim DATE,             
    ordem INT DEFAULT 0,
    CONSTRAINT fk_formacao_perfil
        FOREIGN KEY (dados_pessoais_id) REFERENCES dados_pessoais(id)
        ON DELETE CASCADE
);
