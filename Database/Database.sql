
CREATE TABLE Alunni(
cod_matricola int not null primary key,
nome varchar(255) not null,
cognome varchar(255) not null,
classe varchar(255) not null,
stato_registrazione int not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Amministratori(
username varchar(255) not null primary key,
nome varchar(255) not null,
cognome varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Relatori(
username varchar(255) not null primary key,
nome varchar(255) not null,
cognome varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Corsi(
id_corso int not null auto_increment primary key,
descrizione varchar(255) not null,
username_relatore varchar(255) not null,
aula varchar(255) not null,
data date not null,
ora_inizio datetime not null,
ora_fine datetime not null,
max_iscritti int,
FOREIGN KEY(username_relatore) references  Relatori(username)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Iscrizioni(
cod_matricola int not null,
id_corso int not null,
FOREIGN KEY(cod_matricola) references Alunni(cod_matricola),
FOREIGN KEY(id_corso) references Corsi(id_corso),
PRIMARY KEY(cod_matricola,id_corso)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginAlunni(
cod_matricola int not null,
pass varchar(255) not null,
PRIMARY KEY(cod_matricola),
FOREIGN KEY(cod_matricola) references Alunni(cod_matricola)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginAmministratori(
username_amministratore varchar(255) not null,
pass varchar(255) not null,
PRIMARY KEY(username_amministratore),
FOREIGN KEY(username_amministratore) references Amministratori(username)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginRelatori(
username_relatore varchar(255) not null,
pass varchar(255) not null,
PRIMARY KEY(username_relatore),
FOREIGN KEY(username_relatore) references Relatori(username)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

INSERT INTO Alunni(cod_matricola,nome,cognome,classe,stato_registrazione) VALUES
(1, 'Mario', 'Rossi', '5AINF', 0),
(11, 'Michele', 'Verdi', '5BLSA', 0),
(101, 'Michele', 'Rossi', '5AINF', 0),
(102, 'Rosario', 'Antonello', '3ACH', 0),
(1000, 'Rosario', 'Verdi', '5BINF', 0),
(1022, 'Antonio', 'Rossetti', '3ACH', 0),
(10245, 'Michele', 'We', '3BCH', 0);

INSERT INTO Amministratori(username,nome,cognome) VALUES
('N.Peca','Nicola','Peca'),
('A.Rossi','Antonio','Rossi');

INSERT INTO Relatori(username,nome,cognome) VALUES
('A.Marini','Antonietta','Marini'),
('M.DeRossi','Mario','De Rossi');

INSERT INTO Corsi(Descrizione,aula,username_relatore,ora_inizio,ora_fine, max_iscritti) VALUES
('Politiche Giovanili','1','A.Marini','09.00','11.00','30'),
('Ping Pong','178','A.Marini','11.00','13.00','30'),
('Boxe','124','M.DeRossi','09.00','11.00','25'),
('Pattinaggio','34','M.DeRossi','11.00','13.00','20');

INSERT INTO Iscrizioni(cod_matricola,id_corso) VALUES
(1, 1),
(11, 2);

INSERT INTO LoginAlunni(cod_matricola, pass) VALUES
(11,'password1'),
(1,'password2'),
(1000,'password3');

INSERT INTO LoginRelatori(username_relatore, pass) VALUES
('A.Marini','Rpassword1'),
('M.DeRossi','Rpassword2');

INSERT INTO LoginAmministratori(username_amministratore, pass) VALUES
('N.Peca','Apassword1'),
('A.Rossi','Apassword2');





