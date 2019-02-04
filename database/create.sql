DROP DATABASE IF EXISTS rpgsp;
CREATE DATABASE rpgsp;

USE rpgsp;

CREATE TABLE `utenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20),
  `cognome` varchar(20),
  `email` varchar(20),
  `password` varchar(20),
  `immagine` varchar(100),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;


CREATE TABLE `lezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `materia` varchar(25),
  `anno` int(1),
  `contenuto` varchar(10),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `immagine`)
  VALUES ('Luca', 'Rippa', 'lucadmaxzz@gmail.com', 'Bella321', 'avatar2');

INSERT INTO `lezioni` (`idUtente`, `materia`, `anno`)
  VALUES (1, 'Italiano', 1);
