/*criando bd*/
CREATE DATABASE parecerTecncio;

use parecerTecnico;

/*criando tabelas*/
CREATE TABLE localizacao(
    id_localizacao INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    localizacao VARCHAR(255),
    setor VARCHAR(255)
);

CREATE TABLE servidor(
    id_servidor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_servidor VARCHAR(255),
    numero_siape INT
);

CREATE TABLE patrimonio(
    id_patrimonio INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    numero_patrimonio INT,
    descricao VARCHAR(255),
    numero_serie INT,
    marca VARCHAR(255),
    modelo VARCHAR(255),
    last_update DATE,
    observacao_patrimonio VARCHAR(255)
);

CREATE TABLE parecer_tecnico(
    id_parecer INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    observacao_parecer VARCHAR(255),
    status_parecer VARCHAR(255),
    data_teste DATE
);

/*inserindo dados de teste*/

INSERT INTO servidor (nome_servidor, numero_siape) VALUES (1,'Anderson', 1111111);
INSERT INTO servidor (nome_servidor, numero_siape) VALUES ('Ariosvaldo', 2222222);
INSERT INTO servidor (nome_servidor, numero_siape) VALUES ('João', 3333333),
                                                            ('Hermes', 4444444),
                                                            ('Juliana', 5555555),
                                                            ('Edson', 6666666),
                                                            ('Augusto', 7777777);


INSERT INTO localizacao (localizacao, setor) VALUES ('24', 'SETEC'),
                                                            ('30', 'SETEC'),
                                                            ('32', 'SETEC');



INSERT INTO patrimonio (numero_patrimonio, descricao, numero_serie, marca, modelo, last_update, observacao_patrimonio) 
    VALUES (3436860, 'CPU', 9911605358, 'DELL','OPTPLEX 7050', 2019-12-31, 'Ativo');

INSERT INTO patrimonio (numero_patrimonio, descricao, marca, modelo, last_update, observacao_patrimonio) 
    VALUES (3436822, 'MONITOR', 'DELL','P2317H', '2019-12-31', 'Ativo');