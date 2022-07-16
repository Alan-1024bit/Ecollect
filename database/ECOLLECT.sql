DROP DATABASE IF EXISTS ECOLLECT;
CREATE DATABASE IF NOT EXISTS ECOLLECT;
USE ECOLLECT;

CREATE TABLE BAIRRO (
    idBairro INT NOT NULL AUTO_INCREMENT,
    nomeBairro VARCHAR(30) NOT NULL,
    PRIMARY KEY(idBairro)
);

INSERT INTO `bairro`
    (`idBairro`, `nomeBairro`)
VALUES
    (NULL, 'Pq. São Paulo'),
    (NULL, 'Jd. das Hortências'),
    (NULL, 'Yolanda'),
    (NULL, 'Maria Luiza'),
    (NULL, 'Selmi Dei'),
    (NULL, 'Vila Xavier'),
    (NULL, 'Cecap'),
    (NULL, 'Universal'),
    (NULL, 'Vale do Sol'),
    (NULL, 'Centro');

CREATE TABLE DESCARTADOR (
    emailDescartador VARCHAR(35) NOT NULL,
    senha VARCHAR(33) NOT NULL,
    nomeDescartador VARCHAR(15) NOT NULL,
    sbrnomeDescartador VARCHAR(15) NOT NULL,
    telDescartador VARCHAR(15) NOT NULL,
    ruaCasa VARCHAR(50) NOT NULL,
    nmrCasa INT NOT NULL,
    idBairro INT NOT NULL,
    PRIMARY KEY(emailDescartador),
    FOREIGN KEY (idBairro) REFERENCES BAIRRO (idBairro) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `descartador`
    (`emailDescartador`,
    `senha`,
    `nomeDescartador`,
    `sbrnomeDescartador`,
    `telDescartador`,
    `ruaCasa`,
    `nmrCasa`,
    `idBairro`)
VALUES 
    ('descartador@gmail.com',
    'd51df387089a7dceae4289d17a62aa3a',
    'Jonas',
    'dos Santos',
    '(16)99727-3747',
    'Av. Carlos Francisco Martins',
    '36',
    '2');

CREATE TABLE COLETOR (
    emailColetor VARCHAR(35) NOT NULL,
    senha VARCHAR(33) NOT NULL,
    nomeColetor VARCHAR(15) NOT NULL,
    sbrnomeColetor VARCHAR(15) NOT NULL,
    telColetor VARCHAR(15) NOT NULL,
    PRIMARY KEY(emailColetor)
);

INSERT INTO `coletor`
    (`emailColetor`,
    `senha`,
    `nomeColetor`,
    `sbrnomeColetor`,
    `telColetor`)
VALUES
    ('coletor@gmail.com',
    '36762b25bab840677f4ce830c2c73674',
    'Robson',
    'Pereira',
    '(16)99828-3848');

CREATE TABLE MATERIAL (
    idMaterial INT NOT NULL AUTO_INCREMENT,
    tipoMaterial VARCHAR(15) NOT NULL,
    PRIMARY KEY(idMaterial)
);

INSERT INTO `material`
    (`idMaterial`,
    `tipoMaterial`)
VALUES
    (NULL, 'Papel'),
    (NULL, 'Latinha'),
    (NULL, 'Plástico'),
    (NULL, 'PET'),
    (NULL, 'Vidro'),
    (NULL, 'Metal'),
    (NULL, 'Papelão');

CREATE TABLE COLETOR_MATERIAL (
    idMaterial INT NOT NULL,
    emailColetor VARCHAR(35) NOT NULL,
    PRIMARY KEY (idMaterial, emailColetor),
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idMaterial) REFERENCES MATERIAL (idMaterial) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `coletor_material`
    (`idMaterial`,
    `emailColetor`)
VALUES
    ('1', 'coletor@gmail.com'),
    ('3', 'coletor@gmail.com');

CREATE TABLE COLETOR_BAIRRO (
    idBairro INT NOT NULL,
    emailColetor VARCHAR(35) NOT NULL,
    PRIMARY KEY (idBairro, emailColetor),
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idBairro) REFERENCES BAIRRO (idBairro) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `coletor_bairro`
    (`idBairro`, `emailColetor`)
VALUES
    ('1', 'coletor@gmail.com'),
    ('2', 'coletor@gmail.com');

CREATE TABLE COLETA (
    emailDescartador VARCHAR(35) NOT NULL, 
    idMaterial INT NOT NULL,
    dataColeta DATE NOT NULL,
    horaColeta TIME NOT NULL,
    emailColetor VARCHAR(35) NULL,
    concluida BOOLEAN NOT NULL,
    dataPrazo DATE NOT NULL,
    horaPrazo TIME NOT NULL,
    qtddMaterial FLOAT NOT NULL,
    idColeta INT NOT NULL AUTO_INCREMENT UNIQUE, 
    PRIMARY KEY (emailDescartador, idMaterial, dataColeta, horaColeta),
    FOREIGN KEY (emailDescartador) REFERENCES DESCARTADOR (emailDescartador) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idMaterial) REFERENCES MATERIAL (idMaterial) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `coleta`
    (`emailDescartador`,
    `idMaterial`,
    `dataColeta`,
    `horaColeta`,
    `emailColetor`,
    `concluida`,
    `dataPrazo`,
    `horaPrazo`,
    `qtddMaterial`,
    `idColeta`)
VALUES
    ('descartador@gmail.com',
    '1',
    '2022-09-07',
    '13:40:00',
    NULL,
    '0',
    '2022-09-05',
    '16:30:00',
    '0.5',
    NULL);

CREATE TABLE COLETA_COLETOR (
    emailColetor VARCHAR(35) NOT NULL,
    idColeta INT NOT NULL,
    dataConc DATE NOT NULL,
    horaConc TIME NOT NULL,
    PRIMARY KEY (emailColetor, idColeta),
    FOREIGN KEY (emailColetor) REFERENCES COLETOR (emailColetor) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idColeta) REFERENCES COLETA (idColeta) ON UPDATE CASCADE ON DELETE CASCADE
);