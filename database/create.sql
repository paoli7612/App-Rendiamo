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
  `email` varchar(20),
  `password` varchar(30),
  `nome` varchar(20),
  `cognome` varchar(20),
  `domandaSicurezza` varchar(100),
  `rispostaSicurezza` varchar(20),
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `avatar` varchar(100),
  `tema` ENUM('red', 'blue', 'green', 'black') DEFAULT 'black',
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
  `titolo` varchar(20),
  `data` datetime,
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
    REFERENCES `lezioni` (`id`),
  FOREIGN KEY (`idMateria`)
    REFERENCES `materie` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materiali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30),
  `tipo` enum('testo', 'video', 'mappa', 'audio'),
  `path` varchar(100),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nome`)
) ENGINE=InnoDB;

CREATE TABLE `materialiDiLezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione`  int(15),
  `idMateriale`  int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`),
  FOREIGN KEY (`idMateriale`)
    REFERENCES `materiali` (`id`)
) ENGINE=InnoDB;

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`, `tema`)
 VALUES ('Tommaso', 'Paoli', 'prof@gmail.com', 'qwerty', 'professore', 'red');
 INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`, `tema`)
  VALUES ('Luca', 'Rippa', 'studente@gmail.com', 'qwerty', 'studente', 'blue');
INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`, `tema`)
 VALUES ('Christian', 'Gabban', 'admin@gmail.com', 'qwerty', 'admin', 'green');

INSERT INTO `istitutidiutenti` (`idUtente`, `idIstituto`)
  VALUES (1, 1);

INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`)
  VALUES (1, 'Romanticismo', CURRENT_TIMESTAMP);
INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`)
  VALUES (1, 'Newton', CURRENT_TIMESTAMP);

INSERT INTO `materie` (`titolo`) VALUES ('Italiano');
INSERT INTO `materie` (`titolo`) VALUES ('Storia');
INSERT INTO `materie` (`titolo`) VALUES ('Matematica');
INSERT INTO `materie` (`titolo`) VALUES ('Informatica');
INSERT INTO `materie` (`titolo`) VALUES ('Inglese');
INSERT INTO `materie` (`titolo`) VALUES ('Tedesco');
INSERT INTO `materie` (`titolo`) VALUES ('Francese');
INSERT INTO `materie` (`titolo`) VALUES ('Fisica');
INSERT INTO `materie` (`titolo`) VALUES ('Chimica');

INSERT INTO `materiedilezioni` (`idLezione`, `idMateria`)
  VALUES (1, 1);
INSERT INTO `materiedilezioni` (`idLezione`, `idMateria`)
  VALUES (1, 2);
INSERT INTO `materiedilezioni` (`idLezione`, `idMateria`)
  VALUES (2, 8);
