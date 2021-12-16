/*criando bd*/
CREATE DATABASE parecerTecnico;

use parecerTecnico;

/*criando tabelas*/
CREATE TABLE localizacao(
    id_localizacao INT NOT NULL AUTO_INCREMENT,
    localizacao VARCHAR(255),
    setor VARCHAR(255),
    CONSTRAINT pk_localizacao PRIMARY KEY (id_localizacao)
);

CREATE TABLE servidor(
    id_servidor INT NOT NULL AUTO_INCREMENT,
    nome_servidor VARCHAR(255),
    numero_siape INT,
    CONSTRAINT pk_servidor PRIMARY KEY (id_servidor)
);

CREATE TABLE equipamento(
    id_equipamento INT NOT NULL AUTO_INCREMENT,
    descricao VARCHAR(255),
    marca VARCHAR(255),
    modelo VARCHAR(255),
    observacao_equipamento VARCHAR(255),
    CONSTRAINT pk_equipamento PRIMARY KEY (id_equipamento)
);

CREATE TABLE parecer_tecnico(
    id_parecer INT NOT NULL AUTO_INCREMENT,
    numero_patrimonio INT,
    numero_serie VARCHAR(255),
    observacao_parecer VARCHAR(255),
    status_parecer VARCHAR(255),
    data_teste DATE,
    fk_equipamento INT,
    fk_localizacao INT,
    fk_servidor INT,
    CONSTRAINT pk_parecer PRIMARY KEY (id_parecer),
    CONSTRAINT fk_equip FOREIGN KEY (fk_equipamento) REFERENCES equipamento(id_equipamento),
    CONSTRAINT fk_local FOREIGN KEY (fk_localizacao) REFERENCES localizacao(id_localizacao),
    CONSTRAINT fk_funcionario FOREIGN KEY (fk_servidor) REFERENCES servidor(id_servidor)
);

 ALTER DATABASE parecerTecnico CHARSET = UTF8 COLLATE = utf8_general_ci;

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



INSERT INTO equipamento (descricao, marca, modelo) 
    VALUES ('CPU', 'DELL','OPTPLEX 7050');

INSERT INTO equipamento (descricao, marca, modelo) 
    VALUES ('MONITOR','DELL','P2314H');

INSERT INTO equipamento (descricao, marca, modelo) 
    VALUES ('TELEFONE','ALCATEL-LUCENT','8028 PREMIUM DESKPHONE');

ALTER TABLE equipamento DROP COLUMN observacao_equipamento;



INSERT INTO parecer_tecnico (numero_patrimonio, numero_serie, status_parecer, data_teste, fk_equipamento, fk_localizacao, fk_servidor) 
    VALUES (3436860,'4JX43N2','OCIOSO', '2021-12-16', 1, 1, 1);

SELECT id_parecer,numero_patrimonio, numero_serie, status_parecer,data_teste, descricao, localizacao, nome_servidor
    FROM parecer_tecnico
    INNER JOIN equipamento ON id_equipamento = fk_equipamento
    INNER JOIN localizacao ON id_localizacao = fk_localizacao
    INNER JOIN servidor ON id_servidor = fk_servidor;