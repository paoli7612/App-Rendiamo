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
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `aiuti` BOOLEAN DEFAULT 1,
  `notifiche` BOOLEAN DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`email`)
) ENGINE=InnoDB;

CREATE TABLE `notifiche` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `idUtente` int(15),
  `testo` varchar(150) NOT NULL,
  `link` varchar(50),
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
  `titolo` varchar(100) NOT NULL,
  `estensione` varchar(10) NOT NULL,
  `idTipo` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE (`titolo`),
  FOREIGN KEY (`idTipo`)
    REFERENCES `tipiMateriali` (`id`)
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
('Beppe', 'Grillo', 'gino@gmail.com', SHA('qwerty'), 'professore');

INSERT INTO `tipiMateriali` (`titolo`, `colore`, `icona`, `plurale`) VALUES
('Documento', 'primary', 'fas fa-file-pdf', 'Documenti'),
('Video', 'warning', 'fas fa-film', 'Video'),
('Esercitazione', 'success', 'fas fa-dumbbell', 'Esercitazioni'),
('Presentazione', 'info', 'fas fa-project-diagram', 'Presentazioni'),
('Audio', 'danger', 'fas fa-headphones-alt', 'Video'),
('Altro', 'secondary', 'fas fa-ellipsis-v', 'Altro');

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
(23,'Francese'),
(24,'Scienze integrate'),
(25,'Diritto e diritto dell informatica'),
(26,'Economia politica'),
(27,'Economia aziendale'),
(28,'Tecniche di comunicazione di impresa'),
(29,'Web editing'),
(30,'Web markenting'),
(31,'Diritto e legislazione turistica'),
(32,'Discipline turistiche ed aziendali'),
(33,'Arte e territorio'),
(34,'Tecnologie tecniche di rappresentazione grafiche'),
(35,'Tecnologie informatiche'),
(36,'Scienze e tecnologie applicate'),
(37,'Gestione del cantiere, sicurezza dell ambiente di lavoro'),
(38,'Progettazione, costruzioni impianti'),
(39,'Geopedologia, economia, ed estimo'),
(40,'Topografia'),
(41,'Ambiente, energia e territorio'),
(42,'Laboratorio di robotica'),
(43,'Tecnologie e progettazione di sistemi informatici e telecomunicazione'),
(44,'Telecomunicazioni'),
(45,'Laboratorio d autonomia'),
(46,'Sistemi e reti');

INSERT INTO `lezioni` (`idUtente`,`titolo`,`data`,`note`) VALUES
(8, 'Romanticismo', CURRENT_TIMESTAMP, NULL),
(8, 'Prima Guerra Mondiale', CURRENT_TIMESTAMP, NULL),
(10, 'Trigonometria', CURRENT_TIMESTAMP, 'seno coseno tangente...'),
(12, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(14, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(11, 'Newton', CURRENT_TIMESTAMP, 'In questa lezione parliamo di Newton e le sue scoperte nel ambito della fisica'),
(11, 'Dante', CURRENT_TIMESTAMP, 'Dante come pochi sapeva che...'),
(15, 'Dante', CURRENT_TIMESTAMP, NULL),
(12, 'Tempi verbali', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(12, 'Tempi', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(12, 'Analisi logica', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(15, 'Equazioni di secondo grado', CURRENT_TIMESTAMP, NULL),
(14, 'Soggetti di diritto', CURRENT_TIMESTAMP, 'Studio base del Diritto'),
(12, 'Ordinamento giuridico', CURRENT_TIMESTAMP, 'Ordinamento giuridico e definizioni'),
(8, 'Progettazione concettuale', CURRENT_TIMESTAMP, 'studio dello schema ER e dello schema relazionale'),
(10, 'Progettazione fisica', CURRENT_TIMESTAMP, 'Il Database'),
(12, 'Ciclo di vita di un progetto', CURRENT_TIMESTAMP, 'Studio delle fasi del ciclo di vita');

INSERT INTO `materieDiLezioni` (`idLezione`, `idMateria`) VALUES
(1,1), (1,2),
(2,2),
(3,3),
(4,4), (4,12),
(5,4), (5,12),
(6,8), (6,9),
(7,1),
(8,1),
(9,5), (9,1),
(10,6), (10,7),
(11,1), (11,5),
(12,3),
(13,10),
(14,10),
(15,4),
(16,4),
(17,11);
