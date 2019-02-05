DROP DATABASE IF EXISTS lele;
CREATE DATABASE lele;

USE lele;

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


CREATE TABLE `lezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `titolo` varchar(20),
  `contenuto` varchar(1000),
  `data` datetime,
  `materia` varchar(25),
  `anno` int(1),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;


INSERT INTO `utenti` (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`,`avatar`)
  VALUES ('nickpfla@gmail.com', 'asdqwerty', 'Nicolò', 'Pflanzer', 'asfgwergwergfsd','adfsafegfea', NULL, 'admin', NULL);
INSERT INTO `utenti` (`email`,`password`,`nome`,`cognome`,`domandaSicurezza`,`rispostaSicurezza`,`anno`,`tipo`,`avatar`)
  VALUES ('lucadmaxzz@gmail.com', 'bella321', 'Luca', 'Rippa', 'asfgwergwergfsd','adfsafegfea', 3, 'studente', 'avatar2');




INSERT INTO `lezioni` (`idUtente`, `titolo`, `contenuto`, `data`, `materia`, `anno`)
  VALUES (1, 'Romanticismo', 'In questa lezione vediamo come...', CURRENT_TIMESTAMP, 'Italiano', 1);
