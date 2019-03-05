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
  `tema` varchar(100) DEFAULT 'light-blue',
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
  `titolo` varchar(20) NOT NULL,
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
    REFERENCES `lezioni` (`id`),
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
    REFERENCES `lezioni` (`id`),
  FOREIGN KEY (`idMateriale`)
    REFERENCES `materiali` (`id`)
) ENGINE=InnoDB;

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`)
 VALUES ('Alex', 'Sordo', 'prof@gmail.com', 'qwerty', 'professore');
INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`)
  VALUES ('Luca', 'Rippa', 'studente@gmail.com', 'qwerty', 'studente');
INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`)
 VALUES ('Christian', 'Gabban', 'admin@gmail.com', 'qwerty', 'admin');
INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`)
  VALUES ('Nicolò', 'Pflanzer', 'test@gmail.com', 'qwerty', 'admin');


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
