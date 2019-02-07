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
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `frequentano` (
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
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materie` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(30),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `riguardano` (
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
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nome`)
) ENGINE=InnoDB;

CREATE TABLE `contengono` (
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
 VALUES ('Tommaso', 'Paoli', 'prof@gmail.com', 'qwerty', 'professore');
 INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`)
  VALUES ('asd', 'asd', 'studente@gmail.com', 'qwerty', 'studente');

INSERT INTO `frequentano` (`idUtente`, `idIstituto`)
  VALUES (1, 1);

INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`)
  VALUES (1, 'romanticismo', CURRENT_TIMESTAMP);

INSERT INTO `materie` (`titolo`) VALUES ('Italiano');
INSERT INTO `materie` (`titolo`) VALUES ('Storia');
INSERT INTO `materie` (`titolo`) VALUES ('Matematica');
INSERT INTO `materie` (`titolo`) VALUES ('Informatica');

INSERT INTO `riguardano` (`idLezione`, `idMateria`)
  VALUES (1, 1);
INSERT INTO `riguardano` (`idLezione`, `idMateria`)
  VALUES (1, 2);
