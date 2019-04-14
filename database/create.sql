DROP DATABASE IF EXISTS appRendiamo;
CREATE DATABASE appRendiamo;

USE appRendiamo;

CREATE TABLE `istituti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `etichette` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`nome`)
) ENGINE=InnoDB;

CREATE TABLE `utenti` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `domandaSicurezza` varchar(100),
  `rispostaSicurezza` varchar(20),
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `avatar` varchar(100),
  `aiuti` BOOLEAN DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `notifiche` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `testo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUtente`)
  REFERENCES `utenti` (`id`)
  ON DELETE CASCADE
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
  FOREIGN KEY (`idLezione`)
    REFERENCES `lezioni` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idMateria`)
    REFERENCES `materie` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `materiali` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `indirizzo` varchar(150) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `estensione` varchar(10) NOT NULL,
  `tipo` varchar(30) NOT NULL,
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

CREATE TABLE `utentiDiLezioni` (
	`id` int(15) NOT NULL AUTO_INCREMENT,
	`idUtente`  int(15),
	`idLezione`  int(15),
	`preferito`  BOOLEAN DEFAULT 0,
	`visualizzato`  BOOLEAN,
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
  `preferito` BOOLEAN DEFAULT 0,
	PRIMARY KEY (`id`),
  FOREIGN KEY (`idStudente`)
    REFERENCES `utenti` (`id`)
    ON DELETE CASCADE,
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`)
  ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES

('Asdrubale', 'Arelli', 'admin@root', SHA('qwerty'), 'admin'),
('Diano', 'Dalconte', 'docente@root', SHA('qwerty'), 'professore'),
('Scanfranco', 'Sitti', 'studente@root', SHA('qwerty'), 'studente'),

('Alex', 'Sordo', 'prof@gmail.com', SHA('qwerty60'), 'admin'),
('Luca', 'Rippa', 'studente@gmail.com', SHA('qwerty71'), 'admin'),
('Christian', 'Gabban', 'admin@gmail.com', SHA('qwerty66'), 'admin'),
('Nicolo\'', 'Pflanzer', 'test01@gmail.com', SHA('qwerty27'), 'admin'),
('Simone', 'Paoli', 'mario@gmail.com', SHA('qwerty93'), 'admin'),
('Grassi', 'Manuel', 'giovanni@gmail.com', SHA('qwerty33'), 'admin'),
('Giocamo', 'Poretti', 'giacomo@gmail.com', SHA('qwerty'), 'professore'),
('Aldo', 'Baglio', 'aldo1@gmail.com', SHA('qwerty'), 'professore'),
('Lorenzo', 'Stoi', 'lorenzo@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Porro', 'gino1@gmail.com', SHA('qwerty'), 'professore'),
('Giocamo', 'Leonardi', 'giacomo1@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Baglio', 'aldo@gmail.com', SHA('qwerty'), 'professore'),
('Simona', 'Dalla', 'lorenzo1@gmail.com', SHA('qwerty'), 'professore'),
('Beppe', 'Grillo', 'gino@gmail.com', SHA('qwerty'), 'professore'),
('sfa', 'Nera', 'pippgdsfgo1@gmail.com', SHA('qwerty'), 'studente'),
('asdf', 'Nera', 'asd@gmail.com', SHA('qwerty'), 'studente'),
('sad', 'asf', 'sdg@gmail.com', SHA('qwerty'), 'studente'),
('Pippa', 'asd', 'pipasdsadpo1@gmail.com', SHA('qwerty'), 'studente'),
('ads', 'Freso', 'asfsa@gmail.com', SHA('qwerty'), 'studente');

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
(10,'Diritto ed Economia'),
(11,'Gestione progetto organizzazione impresa'),
(12,'geografia'),
(13,'scienze naturali'),
(14,'latino'),
(15,'filosofia'),
(16,'storia dell arte'),
(17,'religione'),
(18,'certificazione delle competenze digitali'),
(19,'scienze umane'),
(20,'scienze motorie sportive'),
(21,'russo'),
(22,'spagnolo'),
(23,'francese'),
(24,'scienze integrate'),
(25,'Diritto e diritto dell informatica'),
(26,'economia politica'),
(27,'economia aziendale'),
(28,'Tecniche di Comunicazione di Impresa'),
(29,'Web editing'),
(30,'Web Markenting'),
(31,'Diritto e legislazione turistica'),
(32,'Discipline turistiche ed aziendali'),
(33,'Arte e territorio'),
(34,'Tecnologiee tecniche di rappresentazione grafiche'),
(35,'Tecnologie informatiche'),
(36,'Scienbze e tecnologie applicate'),
(37,'Gestione del cantiere,sicurezza dell ambiente di lavoro'),
(38,'Progettazione, costruzioni impianti'),
(39,'Geopedologia,economia , ed estimo'),
(40,'Topografia'),
(41,'Ambiente,energia e territorio'),
(42,'Laboratorio di robotica'),
(43,'Tecnologie e progrttazione di sistemi informatici e telecomunicazione'),
(44,'Telecomunicazioni'),
(45,'Laboratorio d autonomia'),
(46,'Sistemi e reti');
