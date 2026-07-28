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


INSERT INTO dados_pessoais (nome, cargo, resumo, informacoes_principais)
VALUES (
    'Maria Fernandes',
    'Analista de Dados Pleno',
    'Profissional com 5 anos de experiência em análise de dados, especializada em transformar informações complexas em decisões de negócio.',
    '5 anos de experiência · São Paulo, SP'
);

INSERT INTO contatos (dados_pessoais_id, email, telefone, linkedin, outro_perfil)
VALUES (
    1,
    'maria.fernandes@exemplo.com',
    '(11) 99999-0000',
    'linkedin.com/in/mariafernandes',
    'github.com/mariafernandes'
);

INSERT INTO experiencias (dados_pessoais_id, empresa, funcao, periodo_inicio, periodo_fim, descricao, ordem)
VALUES
    (1, 'Empresa Alfa Tecnologia', 'Analista de Dados Pleno', '2023-01-01', NULL,
     'Liderança de projetos de BI, criação de dashboards e automação de relatórios.', 1),
    (1, 'Empresa Beta Consultoria', 'Analista de Dados Júnior', '2021-03-01', '2022-12-01',
     'Apoio na construção de pipelines de dados e elaboração de relatórios gerenciais.', 2),
    (1, 'Empresa Gama Sistemas', 'Estagiária de TI', '2019-07-01', '2021-02-01',
     'Suporte a projetos internos e primeiros contatos com análise de dados.', 3);

INSERT INTO formacao (dados_pessoais_id, instituicao, curso, periodo_inicio, periodo_fim, ordem)
VALUES
    (1, 'Universidade Federal', 'Ciência da Computação', '2016-01-01', '2020-12-01', 1),
    (1, 'Instituto de Tecnologia', 'Pós-graduação em Ciência de Dados', '2021-01-01', '2022-12-01', 2);

