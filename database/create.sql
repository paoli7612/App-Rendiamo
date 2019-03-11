DROP DATABASE IF EXISTS lele;
CREATE DATABASE lele;

USE lele;

CREATE TABLE `istituti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `temi` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `a` varchar(10) NOT NULL,
  `b` varchar(10) NOT NULL,
  `c` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `etichette` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`nome`)
) ENGINE=InnoDB;

CREATE TABLE `utenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `domandaSicurezza` varchar(100),
  `rispostaSicurezza` varchar(20),
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `avatar` varchar(100),
  `idTema` int(15) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`),
  FOREIGN KEY (`idTema`)
    REFERENCES `temi` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `istitutiDiUtenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idIstituto` int(15),
  `idUtente` int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idIstituto`)
    REFERENCES `istituti` (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `lezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `titolo` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `note` varchar(200),
  PRIMARY KEY (`id`),
  UNIQUE (`idUtente`, `titolo`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materie` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(30),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materieDiLezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione` int(15),
  `idMateria` int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idMateria`)
    REFERENCES `materie` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materiali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(300) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`titolo`),
  UNIQUE KEY (`indirizzo`)
) ENGINE=InnoDB;

CREATE TABLE `materialiDiLezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione`  int(15),
  `idMateriale`  int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idMateriale`)
    REFERENCES `materiali` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `etichettedilezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione`  int(15),
  `idEtichetta`  int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idEtichetta`)
    REFERENCES `etichette` (`id`)
) ENGINE=InnoDB;

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `temi` (`a`,`b`,`c`)
  VALUES ('green', 'amber', 'purple');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES

('Alex', 'Sordo', 'prof@gmail.com', SHA('qwerty60'), 'admin'),
('Luca', 'Rippa', 'studente@gmail.com', SHA('qwerty71'), 'adimn'),
('Christian', 'Gabban', 'admin@gmail.com', SHA('qwerty66'), 'admin'),
('Nicolo\'', 'Pflanzer', 'test01@gmail.com', SHA('qwerty27'), 'admin'),
('Tommaso', 'Paoli', 'test02@gmail.com', SHA('qwerty81'), 'admin'),
('Simone', 'Paoli', 'mario@gmail.com', SHA('qwerty93'), 'admin'),
('Grassi', 'Manuel', 'giovanni@gmail.com', SHA('qwerty33'), 'admin'),

('Giocamo', 'Poretti', 'giacomo@gmail.com', SHA('qwerty'), 'professore'),
('Aldo', 'Baglio', 'aldo@gmail.com', SHA('qwerty'), 'studente');
('Lorenzo', 'Stoi', 'lorenzo@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Porro', 'gino@gmail.com', SHA('qwerty'), 'professore'),
('Giocamo', 'Leonardi', 'giacomo@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Baglio', 'aldo@gmail.com', SHA('qwerty'), 'studente');
('Simona', 'Dalla', 'lorenzo@gmail.com', SHA('qwerty'), 'professore'),
('Beppe', 'Grillo', 'gino@gmail.com', SHA('qwerty'), 'professore'),
('Pippa', 'Nera', 'pippo@gmail.com', SHA('qwerty'), 'studente'),
('Pippo', 'Freso', 'pippo@gmail.com', SHA('qwerty'), 'studente');


INSERT INTO `istitutidiutenti` (`idUtente`, `idIstituto`)
  VALUES (1, 1);

INSERT INTO `materiali` (`indirizzo`, `titolo`, `tipo`)
  VALUES ("asdgewr","asf","video"), ("asdgewrgg","dgdfg",NULL), ("asdgewjhgr","ahthjtsf","pdf");

INSERT INTO `etichette` (`nome`)
  VALUES ('dante'),('naturalismo'),('coseno'),('seno');

INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`,`note`) VALUES
(8, 'Romanticismo', CURRENT_TIMESTAMP, NULL),
(8, 'Prima Guerra Mondiale', CURRENT_TIMESTAMP, NULL),
(10, 'Trigonometria', CURRENT_TIMESTAMP, 'seno coseno tangente...'),
(12, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(14, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(11, 'Newton', CURRENT_TIMESTAMP, 'In questa lezione parliamo di Newton e le sue scoperte nel ambito della fisica');
(11, 'Dante', CURRENT_TIMESTAMP, 'Dante come pochi sapeva che...'),
(15, 'Dante', CURRENT_TIMESTAMP, NULL),
(12, 'Tempi verbali', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana')

INSERT INTO `materialidilezioni` (`idLezione`, `idMateriale`)
VALUES 
(1,1), (1,2), 
(2,2),
(3,3),
(4,4),
(5,4), 
(6,3), (6,8),
(7,1), 
(8,1), 
(9,1), (9,5);

INSERT INTO `materie` (`id`,`titolo`) VALUES
(1,'Italiano'),
(2,'Storia'),
(3,'Matematica'),
(4,'Informatica'),
(5,'Inglese'),
(6,'Tedesco'),
(7,'Francese'),
(8,'Fisica'),
(9,'Chimica');

INSERT INTO `materiedilezioni` (`idLezione`, `idMateria`) VALUES
(1,1), (1,2), 
(2,2),
(3,3),
(4,4),
<<<<<<< HEAD
(5,4),
(6,8);

INSERT INTO `etichettedilezioni` (`idLezione`, `idEtichetta`) VALUES
(1,1),(1,2),
(2,2),
(3,2),(3,3);
=======
(5,4), 
(6,3), (6,8),
(7,1), 
(8,1), 
(9,1), (9,5);
>>>>>>> lucarippa-patch-1
