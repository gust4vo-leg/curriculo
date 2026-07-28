CREATE TABLE dados_pessoais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    resumo TEXT,
    informacoes_principais TEXT
);

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pessoa INT NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    perfil_profissional VARCHAR(255),
    FOREIGN KEY (id_pessoa) REFERENCES dados_pessoais(id) ON DELETE CASCADE
);

CREATE TABLE experiencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pessoa INT NOT NULL,
    empresa VARCHAR(100) NOT NULL,
    funcao VARCHAR(100) NOT NULL,
    periodo INT,
    descricao TEXT,
    FOREIGN KEY (id_pessoa) REFERENCES dados_pessoais(id) ON DELETE CASCADE
);

CREATE TABLE formacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_pessoa INT NOT NULL,
    instituicao VARCHAR(255) NULL,
    curso VARCHAR(255) NULL,
    periodo INT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES dados_pessoais(id) ON DELETE CASCADE
);