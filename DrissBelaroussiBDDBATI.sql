-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: batiinterim
-- ------------------------------------------------------
-- Server version	5.5.41-0+wheezy1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `affecter`
--

DROP TABLE IF EXISTS `affecter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affecter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etatAffectation` char(1) NOT NULL,
  `idMission` int(11) NOT NULL,
  `idArtisan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Affecter_idArtisan` (`idArtisan`),
  KEY `FK_Affecter_idMission` (`idMission`),
  CONSTRAINT `FK_Affecter_idArtisan` FOREIGN KEY (`idArtisan`) REFERENCES `artisan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_Affecter_idMission` FOREIGN KEY (`idMission`) REFERENCES `mission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affecter`
--

LOCK TABLES `affecter` WRITE;
/*!40000 ALTER TABLE `affecter` DISABLE KEYS */;
INSERT INTO `affecter` VALUES (57,'E',11,4),(62,'E',10,1),(67,'A',6,2),(69,'A',13,9);
/*!40000 ALTER TABLE `affecter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `affecterChef`
--

DROP TABLE IF EXISTS `affecterChef`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `affecterChef` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idChef` int(11) NOT NULL,
  `idChantier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_AffecterChef_idChef` (`idChef`),
  KEY `FK_AffecterChef_idChantier` (`idChantier`),
  CONSTRAINT `FK_AffecterChef_idChantier` FOREIGN KEY (`idChantier`) REFERENCES `chantier` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_AffecterChef_idChef` FOREIGN KEY (`idChef`) REFERENCES `chefChantier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `affecterChef`
--

LOCK TABLES `affecterChef` WRITE;
/*!40000 ALTER TABLE `affecterChef` DISABLE KEYS */;
INSERT INTO `affecterChef` VALUES (15,10,6),(17,10,5),(22,10,20),(23,10,1),(24,11,1),(26,10,21),(27,11,21);
/*!40000 ALTER TABLE `affecterChef` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artisan`
--

DROP TABLE IF EXISTS `artisan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artisan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `dateNaiss` date NOT NULL,
  `lieuNaiss` varchar(50) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `login` varchar(25) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `idCorpsMetier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Artisan_idCorpsMetier` (`idCorpsMetier`),
  CONSTRAINT `FK_Artisan_idCorpsMetier` FOREIGN KEY (`idCorpsMetier`) REFERENCES `corpsmetier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artisan`
--

LOCK TABLES `artisan` WRITE;
/*!40000 ALTER TABLE `artisan` DISABLE KEYS */;
INSERT INTO `artisan` VALUES (1,'Piquoi','Carlotta','2012-08-27','paris','0345968574','12 kdoeke','93500','Nogent','cpiquoi','247714232db7af9c6fa94641c9067e52',1),(2,'Belaroussi','Drissou','1996-04-18','Lilles','0896441648','aaaa','93500','Pantin','dbelarou','247714232db7af9c6fa94641c9067e52',3),(3,'hecker','amal','2017-02-03','Brest','0123456789','rue Pasteur','75001','Paris','amalhecker','247714232db7af9c6fa94641c9067e52',1),(4,'prigent','ewen','1950-01-01','brest','0123456789','rue Pasteur','75000','Paris','ewenprigen','247714232db7af9c6fa94641c9067e52',1),(7,'Sacquet','Bilbon','1964-06-13','La Comté','0102030405','13 avenue souscolline','17707','Shire','bsacquet','247714232db7af9c6fa94641c9067e52',3),(8,'Belaroussi','Adame','2000-05-31','Paris','0123456789','31 rue pasteur','94110','Pantin','abelarouss','ab4f63f9ac65152575886860dde480a1',2),(9,'Lemire','Tristan','1995-06-19','Pontault-Combault','0123456789','10 rue des marguerites','77340','Pontault-Combault','tlemire','247714232db7af9c6fa94641c9067e52',3),(10,'Thoquenne','Margaux','1950-01-01','Paris','0123456789','10 rue des pierres','75000','Paris','mthoquenne','ab4f63f9ac65152575886860dde480a1',1),(11,'Gennevier','Maxime','1950-01-01','Paris','0123456789','10 rue des pierres','75000','Paris','mgennevier','ab4f63f9ac65152575886860dde480a1',2),(13,'Venel','Romain','1950-01-01','Paris','0123456789','10 rues des fleurs','75000','Paris','rvenel','ab4f63f9ac65152575886860dde480a1',4),(14,'Abid','Alexis','1950-01-01','Paris','0123456789','20 rue des arbres','75000','Paris','aabid','ab4f63f9ac65152575886860dde480a1',1);
/*!40000 ALTER TABLE `artisan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chantier`
--

DROP TABLE IF EXISTS `chantier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chantier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idEntrepreneur` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_chantier_idEntrepreneur` (`idEntrepreneur`),
  CONSTRAINT `FK_chantier_idEntrepreneur` FOREIGN KEY (`idEntrepreneur`) REFERENCES `entrepreneur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chantier`
--

LOCK TABLES `chantier` WRITE;
/*!40000 ALTER TABLE `chantier` DISABLE KEYS */;
INSERT INTO `chantier` VALUES (1,'Hotel mercure','2017-03-01','2017-05-01',1,'Paris'),(5,'Mairie','2017-03-01','2017-05-01',1,'Lyon'),(6,'Bibliotèque','2017-03-01','2017-05-01',1,'Marseille'),(7,'Piscine municipale','2017-03-01','2017-05-01',1,'Pantin'),(8,'Disneyland','2017-03-01','2017-05-01',1,'Marne la vallée'),(18,'Maternelle','2017-04-26','2017-05-01',1,'Paris'),(19,'Maternelle','2017-04-29','2017-05-31',1,'Paris'),(20,'Centrale','2017-04-29','2017-05-12',1,'Lyon'),(21,'Hopital','2017-05-01','2017-07-01',1,'Paris'),(22,'Hopital','2017-05-01','2017-07-01',1,'Paris');
/*!40000 ALTER TABLE `chantier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chefChantier`
--

DROP TABLE IF EXISTS `chefChantier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chefChantier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `dateNaiss` date NOT NULL,
  `lieuNaiss` varchar(50) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `idEntrepreneur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_chefChantier_Entrepreneur` (`idEntrepreneur`),
  CONSTRAINT `FK_chefChantier_Entrepreneur` FOREIGN KEY (`idEntrepreneur`) REFERENCES `entrepreneur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chefChantier`
--

LOCK TABLES `chefChantier` WRITE;
/*!40000 ALTER TABLE `chefChantier` DISABLE KEYS */;
INSERT INTO `chefChantier` VALUES (10,'Raymond','Bob','1959-01-01','Paris','0123456789','50 rue des dolipranes','75015','Paris',1),(11,'Lopez','Marco','1950-01-01','Madrid','0123456789','10 rue de France','91020','Essones',1),(16,'Hollande2','François','1950-01-01','Paris','0123456789','5 rue des champs Elysées','75001','Paris',1),(17,'Hollande3','François','1950-01-01','Paris','0123456789','5 rue des champs Elysées','75001','Paris',1),(18,'Hollande4','François','1950-01-01','Paris','0123456789','5 rue des champs Elysées','75001','Paris',1),(19,'Hollande5','François','1950-01-01','Paris','0123456789','5 rue des champs Elysées','75001','Paris',1),(20,'Hollande','François','1950-01-01','Paris','0123456789','5 rue des champs Elysées','75001','Paris',1),(21,'Marley','Bob','1950-01-01','France','0123456789','10 rue de la musique','75001','Paris',1),(22,'Franklin','Benjamin','1950-01-01','Paris','0123456789','10 rue de la musique','75001','Paris',1);
/*!40000 ALTER TABLE `chefChantier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conge`
--

DROP TABLE IF EXISTS `conge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `etatConge` char(1) NOT NULL,
  `idArtisan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_conge_artisan` (`idArtisan`),
  CONSTRAINT `FK_conge_artisan` FOREIGN KEY (`idArtisan`) REFERENCES `artisan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conge`
--

LOCK TABLES `conge` WRITE;
/*!40000 ALTER TABLE `conge` DISABLE KEYS */;
INSERT INTO `conge` VALUES (25,'2017-05-12','2017-05-16','A',2),(26,'2017-05-18','2017-05-19','A',2),(28,'2017-05-22','2017-05-23','R',2),(29,'2017-05-24','2017-05-25','A',2),(31,'2017-05-01','2017-05-10','A',9);
/*!40000 ALTER TABLE `conge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corpsmetier`
--

DROP TABLE IF EXISTS `corpsmetier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corpsmetier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corpsmetier`
--

LOCK TABLES `corpsmetier` WRITE;
/*!40000 ALTER TABLE `corpsmetier` DISABLE KEYS */;
INSERT INTO `corpsmetier` VALUES (1,'Structure et gros oeuvre'),(2,'Enveloppe exterieure'),(3,'Equipement technique'),(4,'Aménagement et finitions');
/*!40000 ALTER TABLE `corpsmetier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrepreneur`
--

DROP TABLE IF EXISTS `entrepreneur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrepreneur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomSociete` varchar(25) NOT NULL,
  `nomChef` varchar(25) NOT NULL,
  `prenomChef` varchar(25) NOT NULL,
  `telephoneSociete` varchar(25) NOT NULL,
  `adresseSociete` varchar(50) NOT NULL,
  `cpSociete` char(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `idSecteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `FK_Entrepreneur_idSecteur` (`idSecteur`),
  CONSTRAINT `FK_Entrepreneur_idSecteur` FOREIGN KEY (`idSecteur`) REFERENCES `secteur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrepreneur`
--

LOCK TABLES `entrepreneur` WRITE;
/*!40000 ALTER TABLE `entrepreneur` DISABLE KEYS */;
INSERT INTO `entrepreneur` VALUES (1,'Arvato','Geoffroy','Nicolas','0123456789','10 rue des pommiers','75009','Massy-','ngeoffrey','247714232db7af9c6fa94641c9067e52',1),(4,'Ikea','Dupont','Jean-Paul','0123456789','10 rue du meuble','12345','Villiers','jdupont','247714232db7af9c6fa94641c9067e52',5),(5,'Oasis','Picasso','Pablo','0123456789','5 rue de la cascade','75019','Paris','ppicasso','ab4f63f9ac65152575886860dde480a1',1);
/*!40000 ALTER TABLE `entrepreneur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestionnaire`
--

DROP TABLE IF EXISTS `gestionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginG` varchar(25) NOT NULL,
  `mdpG` varchar(50) NOT NULL,
  `nomG` varchar(25) NOT NULL,
  `prenomG` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestionnaire`
--

LOCK TABLES `gestionnaire` WRITE;
/*!40000 ALTER TABLE `gestionnaire` DISABLE KEYS */;
INSERT INTO `gestionnaire` VALUES (1,'cpicois','21232f297a57a5a743894a0e4a801fc3','Picois','Charloute'),(2,'admin','ab4f63f9ac65152575886860dde480a1','Picois','Charloute');
/*!40000 ALTER TABLE `gestionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission`
--

DROP TABLE IF EXISTS `mission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `nbArtisans` int(11) NOT NULL,
  `prixJournalier` float NOT NULL,
  `idCorpsMetier` int(11) NOT NULL,
  `idChantier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Mission_idCorpsMetier` (`idCorpsMetier`),
  KEY `FK_Mission_idChantier` (`idChantier`),
  CONSTRAINT `FK_Mission_idChantier` FOREIGN KEY (`idChantier`) REFERENCES `chantier` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_Mission_idCorpsMetier` FOREIGN KEY (`idCorpsMetier`) REFERENCES `corpsmetier` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission`
--

LOCK TABLES `mission` WRITE;
/*!40000 ALTER TABLE `mission` DISABLE KEYS */;
INSERT INTO `mission` VALUES (4,'Carrelage baignoire','2017-03-01','2017-04-01',2,11,4,1),(5,'Salle de bain','2017-03-01','2017-04-01',3,50,1,5),(6,'Cuisine','2017-03-01','2017-04-01',2,60,3,5),(7,'Cuisine2','2017-03-01','2017-04-01',2,50,3,5),(8,'Jardin','2017-03-01','2017-04-01',2,80,3,7),(9,'Space Mountain','2017-03-01','2017-04-01',2,50,1,8),(10,'Parquet','2017-04-23','2017-05-01',3,50,1,1),(11,'Parquet','2017-03-01','2017-04-20',5,50,1,1),(12,'Cour','2017-04-29','2017-05-12',3,50,4,20),(13,'Chambre21','2017-05-25','2017-06-25',3,60,3,21);
/*!40000 ALTER TABLE `mission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `secteur`
--

LOCK TABLES `secteur` WRITE;
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` VALUES (1,'Gros oeuvre'),(2,'Aménagements/finitions'),(3,'Couverture/plomberie'),(4,'Sanitaire/électrique'),(5,'Menuiserie'),(6,'Serrurerie');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-25 19:53:58
