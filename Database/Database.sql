CREATE TABLE Alunni(
Cod_matricola varchar(255) not null primary key,
Nome varchar(255) not null,
Cognome varchar(255) not null,
Classe varchar(255) not null
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Corsi(
id_corso int not null auto_increment primary key,
Descrizione varchar(255) not null,
ora_inizio datetime not null,
ora_fine datetime not null,
max_iscritti int
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Iscrizioni(
id_iscrizione int not null auto_increment primary key,
cod_matricola varchar(255) not null,
id_corso int not null,
FOREIGN KEY(cod_matricola) references Alunno(cod_matricola),
FOREIGN KEY(id_iscrizione) references Corso(id_corso)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

CREATE TABLE Login(
Cod_matricola varchar(255) not null,
passvarchar(255) not null
PRIMARY KEY(Cod_matricola,pass)
)DEFAULT CHARSET="utf8" ENGINE=InnoDB;

INSERT INTO Alunni (cod_matricola,Nome,Cognome,Classe) VALUES
('00AABB','Mario','Rossi','5B Inf'),
('11AABB','Rosario','Verdi','3A LSA'),
('22AABB','Mario','Rosini','3A Mec');

INSERT INTO Corsi(Descrizione,ora_inizio,ora_fine, max_iscritti) VALUES
('Politiche Giovanili','09.00','11.00','30'),
('Ping Pong','11.00','13.00','30'),
('Boxe','09.00','11.00','25'),
('Pattinaggio','11.00','13.00','20');

INSERT INTO Iscrizioni(cod_matricola,id_corso) VALUES
('00AABB','01'),
('00AABB','02'),
('11AABB','01'),
('11AABB','02');

INSERT INTO Login(cod_matricola, pass) VALUES
('00AABB','password1'),
('11AABB','password2');




