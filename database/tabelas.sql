CREATE TABLE Cliente (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(80) NOT NULL,
    email VARCHAR(80) NOT NULL,
    telefone VARCHAR(20),
    cpf INTEGER(11) UNIQUE NOT NULL,
    endereco VARCHAR(45) NOT NULL,
    Criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    Atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE Categoria_Exercicio (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(25) NOT NULL,
    Criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    Atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP()
);

CREATE TABLE Exercicio (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(25) NOT NULL,
    duracao INTEGER(2) NOT NULL,
    categoria_id BIGINT NOT NULL,
    Criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    Atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(),

    FOREIGN KEY (categoria_id) REFERENCES Categoria_Exercicio (id)
);

CREATE TABLE Treino (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,  
    data_treino DATE NOT NULL,
    cliente_id BIGINT NOT NULL,
    exercicio_id BIGINT NOT NULL,
    Criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    Atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(),

    FOREIGN KEY (cliente_id) REFERENCES Cliente (id),
    FOREIGN KEY (exercicio_id) REFERENCES Exercicio (id)
);