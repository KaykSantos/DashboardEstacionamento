CREATE DATABASE dbestacionamento;
USE dbestacionamento;

CREATE TABLE vaga(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    tipo_vaga VARCHAR(100),
    ds_vaga LONGTEXT
);

INSERT INTO vaga VALUES
(null, "Individual", "Vaga individual"),
(null, "Mensal", "Vaga para assinantes mensais"),
(null, "Convênio", "Vaga para participantes do convênio");

CREATE TABLE funcionario(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nm_funcionario VARCHAR(100),
    email_funcionario VARCHAR(100),
    cpf_funcionario VARCHAR(14),
    senha_funcionario VARCHAR(40),
    dt_nascimento DATE
);

INSERT INTO funcionario VALUES
(null, "Alexandre", "alexandre@gmail.com", "414.431.989-00", md5("20alex20"), "2002-02-02"),
(null, "Eduarda", "duda@gmail.com", "145.642.240-50", md5("dudinha123"), "2000-12-31"),
(null, "Mario", "mario@gmail.com", "430.836.052-85", md5("gamesmario"), "1995-07-20");

CREATE TABLE veiculo(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    modelo VARCHAR(100),
    marca VARCHAR(100)
);

INSERT INTO veiculo VALUES
(null, "Novo Uno", "Fiat"),
(null, "Cronos", "Fiat"),
(null, "Cross fox", "Volkswagen"),
(null, "Voyage", "Volkswagen"),
(null, "Gol", "Volkswagen"),
(null, "Onix", "Chevrolet "),
(null, "HB20", "Hyundai");

CREATE TABLE cliente(
    cd INT PRIMARY KEY AUTO_INCREMENT,
    nm_cliente VARCHAR(100),
    email_cliente VARCHAR(100),
    cpf_cliente VARCHAR(100),
    dt_cadastro DATE,
    vaga INT,
    tipo_vaga INT,
    id_veiculo INT,
    FOREIGN KEY (tipo_vaga) REFERENCES vaga(cd),
    FOREIGN KEY (id_veiculo) REFERENCES veiculo(cd)
);

INSERT INTO nm_cliente VALUES
(null, "Arnold", "arnold@gmail.com", "385.174.876-05", "2000-11-03", 1, 1, 1),
(null, "Marcos", "marquinhos@gmail.com", "485.849.467-56", "1990-01-31", 2, 1, 2),
(null, "Ana", "anamaria@gmail.com", "599.561.343-09", "1999-06-21", 3, 2, 3),
(null, "João", "joaozinho@gmail.com", "402.886.114-46", "2003-09-11", 4, 2, 4),
(null, "Steve", "stevedomine@gmail.com", "326.071.836-26", "2001-11-16", 5, 3, 5),
(null, "Alexa", "alexagameplays@gmail.com", "958.313.777-41", "2003-08-18", 6, 3, 6),
(null, "Pedro", "pedrocas@gmail.com", "654.514.168-69", "1996-02-28", 7, 3, 7);

CREATE VIEW vwCliente AS 
    SELECT c.cd AS cd, c.nm_cliente AS nome, c.email_cliente AS email, c.cpf_cliente AS cpf, 
    c.dt_cadastro AS data_cadastro, c.vaga AS vaga, c.id_veiculo AS veiculo,
    vei.modelo AS modelo_veiculo, vei.marca AS marca_veiculo, vag.tipo_vaga AS tipo_vaga, 
    vag.ds_vaga AS ds_vaga
        FROM cliente c, veiculo vei, vaga vag 
            WHERE c.tipo_vaga = vag.cd 
            AND c.id_veiculo = vei.cd;

-- CREATE VIEW vwCliente AS 
--     SELECT cliente.*, veiculo.*, vaga.*
--         FROM cliente c, veiculo vei, vaga vag 
--             WHERE c.tipo_vaga = vag.cd 
--             AND c.id_veiculo = vei.cd;
