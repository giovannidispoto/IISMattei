
CREATE TABLE Alunni(
cod_matricola varchar(255) not null primary key,
Nome varchar(255) not null,
Cognome varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Relatori(
cod_relatore varchar(255) not null primary key,
Nome varchar(255) not null,
Cognome varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Amministratori(
cod_amministratore varchar(255) not null primary key,
Nome varchar(255) not null,
Cognome varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Corsi(
id_corso int not null auto_increment primary key,
descrizione varchar(255) not null,
cod_relatore varchar(255) nut null,
ora_inizio datetime not null,
ora_fine datetime not null,
max_iscritti int,
FOREIGN KEY(relatore) references Relatori(cod_relatore)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Iscrizioni(
id_iscrizione int not null auto_increment primary key,
cod_matricola varchar(255) not null,
id_corso int not null,
FOREIGN KEY(cod_matricola) references Alunni(cod_matricola),
FOREIGN KEY(id_corso) references Corsi(id_corso)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginAlunni(
id_login int not null auto_increment,
cod_matricola varchar(255) not null,
pass varchar(255) not null,
PRIMARY KEY(id_login),
FOREIGN KEY(cod_matricola) references Alunni(cod_matricola)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginRelatori(
id_login int not null auto_increment,
cod_relatore varchar(255) not null,
pass varchar(255) not null,
PRIMARY KEY(id_login),
FOREIGN KEY(cod_relatore) references Relatori(cod_relatore)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE LoginAmministratori(
id_login int not null auto_increment,
cod_amministratore varchar(255) not null,
pass varchar(255) not null,
PRIMARY KEY(id_login),
FOREIGN KEY(cod_amministratore) references Amministratori(cod_amministratore)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

INSERT INTO Alunni(cod_matricola,Nome,Cognome) VALUES
('00AABB','Mario','Rossi'),
('11AABB','Rosario','Verdi'),
('22AABB','Mario','Rosini');

INSERT INTO Relatori(cod_relatore,Nome,Cognome) VALUES
('RR00AABB','Antonietta','Marini'),
('RR11AABB','Mario','De Rossi');

INSERT INTO Amministratori(cod_amministratore,Nome,Cognome) VALUES
('AA00AABB','Nicola','Peca'),
('AA11AABB','Antonio','Rossi');

INSERT INTO Corsi(Descrizione,cod_relatore,ora_inizio,ora_fine, max_iscritti) VALUES
('Politiche Giovanili','RR00AABB','09.00','11.00','30'),
('Ping Pong','RR00AABB','11.00','13.00','30'),
('Boxe','RR11AABB','09.00','11.00','25'),
('Pattinaggio','RR11AABB','11.00','13.00','20');

INSERT INTO Iscrizioni(cod_matricola,id_corso) VALUES
('00AABB','01'),
('00AABB','02');

INSERT INTO LoginAlunni(cod_matricola, pass) VALUES
('00AABB','password1'),
('11AABB','password2'),
('22AABB','password3');

INSERT INTO LoginRelatori(cod_relatore, pass) VALUES
('RR00AABB','password1'),
('RR11AABB','password2');

INSERT INTO LoginAmministratori(cod_amministratore, pass) VALUES
('AA00AABB','password1'),
('AA11AABB','password2');




