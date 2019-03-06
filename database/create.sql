DROP DATABASE IF EXISTS lele;
CREATE DATABASE lele;

USE lele;

CREATE TABLE `istituti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `utenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `domandaSicurezza` varchar(100),
  `rispostaSicurezza` varchar(20),
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `avatar` varchar(100),
  `tema` varchar(100) DEFAULT 'green',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
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

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES
('Alex', 'Sordo', 'prof@gmail.com', 'qwerty', 'professore'),
('Luca', 'Rippa', 'studente@gmail.com', 'qwerty', 'studente'),
('Christian', 'Gabban', 'admin@gmail.com', 'qwertyu', 'admin'),
('Nicolo\'', 'Pflanzer', 'test@gmail.com', 'qwerty', 'studente'),
('Mario', 'Rossi', 'mario@gmail.com', 'qwerty', 'professore'),
('Giovanni', 'Storti', 'giovanni@gmail.com', 'qwerty', 'studente'),
('Giocamo', 'Poretti', 'giacomo@gmail.com', 'qwerty', 'professore'),
('Aldo', 'Baglio', 'aldo@gmail.com', 'qwerty', 'studente');


INSERT INTO `istitutidiutenti` (`idUtente`, `idIstituto`)
  VALUES (1, 1);

INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`,`note`) VALUES
(1, 'Romanticismo', CURRENT_TIMESTAMP, NULL),
(2, 'Prima Guerra Mondiale', CURRENT_TIMESTAMP, NULL),
(4, 'Trigonometria', CURRENT_TIMESTAMP, 'seno coseno tangente...'),
(2, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(3, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(1, 'Newton', CURRENT_TIMESTAMP, 'In questa lezione parliamo di Newton e le sue scoperte nel ambito della fisica');

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
(1,1),(1,2),
(2,2),
(3,8),(3,3),
(4,4),
(5,4),
(6,8);
