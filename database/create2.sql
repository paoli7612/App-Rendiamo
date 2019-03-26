DROP DATABASE IF EXISTS lele;
CREATE DATABASE lele;

USE lele;

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
  `email` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `domandaSicurezza` varchar(100),
  `rispostaSicurezza` varchar(20),
  `tipo` ENUM('studente', 'professore', 'admin') DEFAULT 'studente',
  `avatar` varchar(100),
  `idTema` int(15) DEFAULT '1',
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
  `note` varchar(150),
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
  `indirizzo` varchar(150) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
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

CREATE TABLE `utentiDilezioni` (
	`id` int(15) NOT NULL AUTO_INCREMENT,
	`idUtente`  int(15),
	`idLezione`  int(15),
	`preferiti`  BOOLEAN,
	`visualizzato`  BOOLEAN,
	PRIMARY KEY (`id`),
    FOREIGN KEY (`idLezione`)
      REFERENCES `lezioni` (`id`)
      ON DELETE CASCADE,
    FOREIGN KEY (`idUtente`)
      REFERENCES `utenti` (`id`)
	  ON DELETE CASCADE
) ENGINE=InnoDB;

INSERT INTO `istituti` (`nome`)
  VALUES ('Marie Curie Pergine Valsugana');

INSERT INTO `utenti` (`nome`, `cognome`, `email`, `password`, `tipo`) VALUES

('Alex', 'Sordo', 'prof@gmail.com', SHA('qwerty60'), 'admin'),
('Luca', 'Rippa', 'studente@gmail.com', SHA('qwerty71'), 'admin'),
('Christian', 'Gabban', 'admin@gmail.com', SHA('qwerty66'), 'admin'),
('Nicolo\'', 'Pflanzer', 'test01@gmail.com', SHA('qwerty27'), 'admin'),
('Tommaso', 'Paoli', 'admin@root', SHA('qwerty'), 'admin'),
('Simone', 'Paoli', 'mario@gmail.com', SHA('qwerty93'), 'admin'),
('Grassi', 'Manuel', 'giovanni@gmail.com', SHA('qwerty33'), 'admin'),
('Giocamo', 'Poretti', 'giacomo@gmail.com', SHA('qwerty'), 'professore'),
('Aldo', 'Baglio', 'aldo1@gmail.com', SHA('qwerty'), 'studente'),
('Lorenzo', 'Stoi', 'lorenzo@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Porro', 'gino1@gmail.com', SHA('qwerty'), 'professore'),
('Giocamo', 'Leonardi', 'giacomo1@gmail.com', SHA('qwerty'), 'professore'),
('Gino', 'Baglio', 'aldo@gmail.com', SHA('qwerty'), 'studente'),
('Simona', 'Dalla', 'lorenzo1@gmail.com', SHA('qwerty'), 'professore'),
('Beppe', 'Grillo', 'gino@gmail.com', SHA('qwerty'), 'professore'),
('Pippa', 'Nera', 'pippo1@gmail.com', SHA('qwerty'), 'studente'),
('Pippo', 'Freso', 'pippo@gmail.com', SHA('qwerty'), 'studente');

INSERT INTO `istitutidiutenti` (`idUtente`, `idIstituto`)
  VALUES (1, 1);

INSERT INTO `materiali` (`id`, `indirizzo`, `titolo`, `tipo`) VALUES
  (1, "asdgewr","Italiano","video"), 
  (2, "asdgewrgg","Storia",NULL), 
  (3, "asdgewjhgr","Matematica","pdf"),
  (4, "asdgewjh3gr","Informatica","pdf"),
  (5, "asdgewj4hgr","Inglese","pdf"),
  (6, "asdgewjh6gr","Tedesco","pdf"),
  (7, "asdgewjhg7r","Francese","pdf"),
  (8, "asdgewjhg9r","Fisica","pdf"),
  (9, "asdgewjhgr8","Chimica","pdf"),
  (10, "awj4hgr","Gestion progetto organizzazione impresa","pdf"),
  (11, "astfjh6gr","Chimica1","pdf"),
  (12, "asdg88777r","Francese1","pdf"),
  (13, "a44444jhg9r","Diritto ed economia","pdf"),
  (14, "asr8","Diritto ed economia1","pdf");

INSERT INTO `lezioni` (`id`,`idUtente`,`titolo`,`data`,`note`) VALUES
(1, 8, 'Romanticismo', CURRENT_TIMESTAMP, NULL),
(2, 8, 'Prima Guerra Mondiale', CURRENT_TIMESTAMP, NULL),
(3, 10, 'Trigonometria', CURRENT_TIMESTAMP, 'seno coseno tangente...'),
(4, 12, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(5, 14, 'Cisco Packet Tracer', CURRENT_TIMESTAMP, NULL),
(6, 11, 'Newton', CURRENT_TIMESTAMP, 'In questa lezione parliamo di Newton e le sue scoperte nel ambito della fisica'),
(7, 11, 'Dante', CURRENT_TIMESTAMP, 'Dante come pochi sapeva che...'),
(8, 15, 'Dante', CURRENT_TIMESTAMP, NULL),
(9, 12, 'Tempi verbali', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(10, 12, 'Tempi', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(11, 12, 'Analisi logica', CURRENT_TIMESTAMP, 'Grammatica inglese e italiana'),
(12, 15, 'Equazioni di secondo grado', CURRENT_TIMESTAMP, NULL),
(13, 14, 'Soggetti di diritto', CURRENT_TIMESTAMP, 'Studio base del Diritto'),
(14, 12, 'Ordinamento giuridico', CURRENT_TIMESTAMP, 'Ordinamento giuridico e definizioni'),
(15, 8, 'Progettazione concettuale', CURRENT_TIMESTAMP, 'studio dello schema ER e dello schema relazionale'),
(16, 10, 'Progettazione fisica', CURRENT_TIMESTAMP, 'Il Database'),
(17, 12, 'Ciclo di vita di un progetto', CURRENT_TIMESTAMP, 'Studio delle fasi del ciclo di vita');

INSERT INTO `materie` (`id`,`titolo`) VALUES
(1,'Italiano'),
(2,'Storia'),
(3,'Matematica'),
(4,'Informatica'),
(5,'Inglese'),
(6,'Tedesco'),
(7,'Francese'),
(8,'Fisica'),
(9,'Chimica'),
(10, 'Diritto ed Economia'),
(11, 'Gestione progetto organizzazione impresa'),
(12, 'Sistemi e reti');

INSERT INTO `materialidilezioni` (`idLezione`, `idMateriale`)
VALUES
(1,1), (1,2), 
(2,2),
(3,3),
(4,4),
(5,4), 
(6,3), (6,8), (6,9), (6,11),
(7,1), 
(8,1), 
(9,1), (9,5),
(10,6), (10,7), (10,12), 
(11,1), 
(12,3), 
(13,13), (13,14),
(14,13), (14,14),
(15,4),
(16,4),
(17,10);

INSERT INTO `etichette` (`id`, `nome`) VALUES
(1, 'sin' ),
(2, 'sen'),
(3, 'cos'),
(4, 'cotan'),
(5, 'tan'),
(6, 'prima' ),
(7, 'guerra'),
(8, 'mondiale'),
(9, 'germania'),
(10, 'italia' ),
(11, 'naturalismo'),
(12, 'verismo'),
(13, 'verga'),
(14, 'dante' ),
(15, 'divina'),
(16, 'commedia'),
(17, 'bismark'),
(18, 'romantico'),
(19, 'soggetti'),
(20, 'diritto'),
(21, 'persone'),
(22, 'fisiche' ),
(23, 'giuridiche'),
(24, 'schema'),
(25, 'er'),
(26, 'relazionale' ),
(27, 'pianificazione'),
(28, 'progettazione'),
(29, 'dispiegamento'),
(30, 'revisione'),
(31, 'finale'),
(32, 'ordinamento'),
(33, 'giuridico'),
(34, 'database');

INSERT INTO `materiedilezioni` (`idLezione`, `idMateria`) VALUES
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

INSERT INTO `etichettedilezioni` (`idLezione`, `idEtichetta`) VALUES
(1,18),
(2,6), (2,7), (2,8), (2,9), (2,10),
(3,1),(3,2), (3,3), (3,4), (3,5),
(7,14), (7,15), (7,16),
(8,14), (8,15), (8,16),
(11,1), (9,5),
(13,19), (13,20), (13,21), (13,22), (13,23),
(14,32), (14,33),
(15,24), (15,25), (15,26),
(16,34),
(17,27), (17,28), (17,29), (17,30), (17,31);
