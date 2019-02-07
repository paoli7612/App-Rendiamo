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
  `anno` int(1),
  `tipo` ENUM('studente', 'professore', 'admin'),
  `avatar` varchar(100),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `appartengono` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente`  int(15),
  `idIstituto`  int(15),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`),
  FOREIGN KEY (`idIstituto`)
    REFERENCES `istituti` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materie` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(30),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `test` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30),
  `data` datetime,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materiali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30),
  `tipo` enum('testo', 'video', 'mappa', 'audio'),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`nome`)
) ENGINE=InnoDB;

CREATE TABLE `lezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `titolo` varchar(20),
  `contenuto` varchar(1000),
  `data` datetime,
  `idMateria` int(15),
  `idTest` int(15),
  `idMateriale` int(15),
  `anno` int(1),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`),
  FOREIGN KEY (`idMateria`)
    REFERENCES `materie` (`id`),
  FOREIGN KEY (`idTest`)
    REFERENCES `test` (`id`),
  FOREIGN KEY (`idMateriale`)
    REFERENCES `materiali` (`id`)
) ENGINE=InnoDB;


INSERT INTO `utenti` (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`,`avatar`)
  VALUES ('nickpfla@gmail.com', 'asdqwerty', 'Nicolò', 'Pflanzer', 'asfgwergwergfsd','adfsafegfea', NULL, 'admin', NULL);
INSERT INTO `utenti` (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`,`avatar`)
  VALUES ('lucadmaxzz@gmail.com', 'bella321', 'Luca', 'Rippa', 'asfgwergwergfsd','adfsafegfea', 3, 'studente', 'avatar2');

INSERT INTO `materie` (`titolo`)
  VALUES ('Storia');

INSERT INTO `lezioni` (`idUtente`, `titolo`, `contenuto`, `data`, `idMateria`, `anno`)
  VALUES (1, 'Romanticismo', 'In questa lezione vediamo come...', CURRENT_TIMESTAMP, 1, 1);
