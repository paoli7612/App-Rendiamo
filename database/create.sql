DROP DATABASE IF EXISTS appRendiamo;
CREATE DATABASE appRendiamo;

USE appRendiamo;

CREATE TABLE `utenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `aiuti` BOOLEAN DEFAULT 1,
  `notifiche` BOOLEAN DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `notifiche` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `data` datetime,
  `testo` varchar(150) NOT NULL,
  `link` varchar(50),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `lezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `titolo` varchar(40) NOT NULL,
  `data` datetime NOT NULL,
  `note` varchar(150),
  PRIMARY KEY (`id`),
  UNIQUE (`idUtente`, `titolo`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materie` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materieDiLezioni` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione` int(15),
  `idMateria` int(15),
  PRIMARY KEY (`id`),
  UNIQUE KEY (`idLezione`, `idMateria`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idMateria`)
    REFERENCES `materie` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `tipiMateriali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `titolo` varchar(50) NOT NULL,
  `plurale` varchar(50) NOT NULL,
  `colore` varchar(50) NOT NULL,
  `icona` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materiali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idLezione` int(15) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `dimensione` int(15) NOT NULL,
  `data` date NOT NULL,
  `idTipo` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`idLezione`, `titolo`),
  FOREIGN KEY (`idTipo`)
    REFERENCES `tipiMateriali` (`id`),
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `utentiDiLezioni` (
	`id` int(15) NOT NULL AUTO_INCREMENT,
	`idUtente`  int(15),
	`idLezione`  int(15),
	PRIMARY KEY (`id`),
    FOREIGN KEY (`idLezione`)
      REFERENCES `lezioni` (`id`)
      ON DELETE CASCADE,
    FOREIGN KEY (`idUtente`)
      REFERENCES `utenti` (`id`)
	  ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `utentiDiUtenti` (
	`id` int(15) NOT NULL AUTO_INCREMENT,
	`idUtente`  int(15),
	`idStudente`  int(15),
	PRIMARY KEY (`id`),
  FOREIGN KEY (`idStudente`)
    REFERENCES `utenti` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
  ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES
('Asdrubale', 'Arelli', 'admin@root', SHA('qwerty'), 'admin'),
('Diano', 'Dalconte', 'mario.rossi@scuole.provincia.tn.it', SHA('qwerty'), 'professore'),
('Scanfranco', 'Sitti', 'giovanni99@gmail.com', SHA('qwerty'), 'studente');

INSERT INTO `tipiMateriali` (`titolo`, `colore`, `icona`, `plurale`) VALUES
('Documento', 'primary', 'fas fa-file-pdf', 'Documenti'),
('Video', 'warning', 'fas fa-film', 'Video'),
('Esercitazione', 'success', 'fas fa-dumbbell', 'Esercitazioni'),
('Presentazione', 'info', 'fas fa-chalkboard-teacher', 'Presentazioni'),
('Audio', 'danger', 'fas fa-headphones-alt', 'Audio'),
('Immagine', 'purple', 'fas fa-images', 'Immagini'),
('Mappa concettuale', 'light', 'fas fa-project-diagram', 'Mappe concettuali');


INSERT INTO `materie` (`id`,`titolo`) VALUES
(1,'Lingua e letteratura italiana'),
(2,'Storia'),
(3,'Matematica'),
(4,'Informatica'),
(5,'Inglese'),
(6,'Tedesco'),
(7,'Francese'),
(8,'Fisica'),
(9,'Chimica'),
(10,'Diritto ed economia'),
(11,'Gestione progetto organizzazione impresa'),
(12,'Geografia'),
(13,'Scienze naturali'),
(14,'Latino'),
(15,'Filosofia'),
(16,'Storia dell arte'),
(17,'Religione'),
(18,'Certificazione delle competenze digitali'),
(19,'Scienze umane'),
(20,'Scienze motorie sportive'),
(21,'Russo'),
(22,'Spagnolo'),
(23,'Scienze integrate'),
(24,'Diritto e diritto dell informatica'),
(25,'Economia politica'),
(26,'Economia aziendale'),
(27,'Tecniche di comunicazione di impresa'),
(28,'Web editing'),
(29,'Web markenting'),
(30,'Diritto e legislazione turistica'),
(31,'Discipline turistiche ed aziendali'),
(32,'Arte e territorio'),
(33,'Tecnologie tecniche di rappresentazione grafiche'),
(34,'Tecnologie informatiche'),
(35,'Scienze e tecnologie applicate'),
(36,'Gestione del cantiere, sicurezza dell ambiente di lavoro'),
(37,'Progettazione, costruzioni impianti'),
(38,'Geopedologia, economia, ed estimo'),
(39,'Topografia'),
(40,'Ambiente, energia e territorio'),
(41,'Laboratorio di robotica'),
(42,'Tecnologie e progettazione di sistemi informatici e telecomunicazione'),
(43,'Telecomunicazioni'),
(44,'Laboratorio d autonomia'),
(45,'Sistemi e reti');

INSERT INTO lezioni (`titolo`, `idutente`, `data`, `note`)
VALUES ('Prima lezione prova', 2, CURRENT_TIMESTAMP, 'descrizione');

INSERT INTO materieDiLezioni (`idMateria`, `idLezione`)
VALUES (1,1),(2,1),(3,1);
