-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pot
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `boeking`
--

DROP TABLE IF EXISTS `boeking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `boeking` (
  `boeking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `boeking_betaling` varchar(45) DEFAULT NULL,
  `boeking_begin` varchar(45) DEFAULT NULL,
  `boeking_eind` varchar(45) DEFAULT NULL,
  `huis_huis_ID` int(11) DEFAULT NULL,
  `klant_klant_ID` int(11) NOT NULL,
  PRIMARY KEY (`boeking_ID`),
  KEY `fk_boeking_huis_idx` (`huis_huis_ID`),
  KEY `fk_boeking_klant1_idx` (`klant_klant_ID`),
  CONSTRAINT `fk_boeking_huis` FOREIGN KEY (`huis_huis_ID`) REFERENCES `huis` (`huis_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_boeking_klant1` FOREIGN KEY (`klant_klant_ID`) REFERENCES `klant` (`klant_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `boeking`
--

LOCK TABLES `boeking` WRITE;
/*!40000 ALTER TABLE `boeking` DISABLE KEYS */;
INSERT INTO `boeking` VALUES (76,NULL,'2017-04-13','2017-04-14',4,1),(77,NULL,'2017-04-27','2017-04-28',4,1),(78,NULL,'2017-04-26','2017-04-27',4,1),(79,NULL,'2017-05-01','2017-05-12',4,1),(80,NULL,'2017-05-01','2017-04-14',4,1),(81,NULL,'2017-04-13','2017-04-14',6,1),(82,NULL,'2017-04-15','2017-04-22',6,1),(83,NULL,'2017-05-15','2017-05-16',4,1),(84,NULL,'2017-06-14','2017-06-15',4,1);
/*!40000 ALTER TABLE `boeking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faciliteiten`
--

DROP TABLE IF EXISTS `faciliteiten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faciliteiten` (
  `faciliteiten_ID` int(11) NOT NULL AUTO_INCREMENT,
  `faciliteiten_naam` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`faciliteiten_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faciliteiten`
--

LOCK TABLES `faciliteiten` WRITE;
/*!40000 ALTER TABLE `faciliteiten` DISABLE KEYS */;
/*!40000 ALTER TABLE `faciliteiten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huis`
--

DROP TABLE IF EXISTS `huis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `huis` (
  `huis_ID` int(11) NOT NULL AUTO_INCREMENT,
  `huis_oppervlakte` varchar(45) DEFAULT NULL,
  `huis_prijs` varchar(45) DEFAULT NULL,
  `huis_parkeren` varchar(45) DEFAULT NULL,
  `park_park_ID` int(11) NOT NULL,
  `huis_idhuis_type` int(11) NOT NULL,
  `huis_image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`huis_ID`),
  KEY `fk_huis_park1_idx` (`park_park_ID`),
  KEY `fk_huis_huis_type1_idx` (`huis_idhuis_type`),
  CONSTRAINT `fk_huis_huis_type1` FOREIGN KEY (`huis_idhuis_type`) REFERENCES `huis_type` (`idhuis_type`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_huis_park1` FOREIGN KEY (`park_park_ID`) REFERENCES `park` (`park_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huis`
--

LOCK TABLES `huis` WRITE;
/*!40000 ALTER TABLE `huis` DISABLE KEYS */;
INSERT INTO `huis` VALUES (1,'44','444','nee',2,1,'huis2.jpg'),(4,'33','33','ja',1,0,'huis1.jpg'),(5,'333','33','rrr',1,1,'eee'),(6,'200','34','ja',1,1,'huis1.jpg');
/*!40000 ALTER TABLE `huis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `huis_type`
--

DROP TABLE IF EXISTS `huis_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `huis_type` (
  `idhuis_type` int(11) NOT NULL,
  `huis_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idhuis_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `huis_type`
--

LOCK TABLES `huis_type` WRITE;
/*!40000 ALTER TABLE `huis_type` DISABLE KEYS */;
INSERT INTO `huis_type` VALUES (0,'1'),(1,'1');
/*!40000 ALTER TABLE `huis_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `klant`
--

DROP TABLE IF EXISTS `klant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `klant` (
  `klant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `klant_vnaam` varchar(45) DEFAULT NULL,
  `klant_anaam` varchar(45) DEFAULT NULL,
  `klant_email` varchar(45) DEFAULT NULL,
  `klant_woonplaats` varchar(45) DEFAULT NULL,
  `klant_adres` varchar(45) DEFAULT NULL,
  `klant_tel` varchar(45) DEFAULT NULL,
  `klant_postcode` varchar(45) DEFAULT NULL,
  `klant_land` varchar(45) DEFAULT NULL,
  `klant_username` varchar(45) DEFAULT NULL,
  `klant_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`klant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `klant`
--

LOCK TABLES `klant` WRITE;
/*!40000 ALTER TABLE `klant` DISABLE KEYS */;
INSERT INTO `klant` VALUES (1,'dd','ddd','ddd','ddd','ddd 78','555','555','fff','bob','test1'),(6,'bob','broersen','200@email.nl','beverwijk','zonnebloemlaan 10','06','1943 bx','nederland','bobb','test2'),(7,'Dre','Broersen','Broersen@mail.com','beverwijk','zonnebloemlaan 10','0612225230','1943 bx','nederland','Dre','Welkom01');
/*!40000 ALTER TABLE `klant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `park`
--

DROP TABLE IF EXISTS `park`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `park` (
  `park_ID` int(11) NOT NULL AUTO_INCREMENT,
  `park_naam` varchar(45) DEFAULT NULL,
  `park_plaats` varchar(45) DEFAULT NULL,
  `park_land` varchar(45) DEFAULT NULL,
  `park_image` varchar(45) DEFAULT NULL,
  `park_omschrijving` longtext,
  PRIMARY KEY (`park_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `park`
--

LOCK TABLES `park` WRITE;
/*!40000 ALTER TABLE `park` DISABLE KEYS */;
INSERT INTO `park` VALUES (1,'park 1','Beverwijk','Nederland','park1.jpg','omschrijving'),(2,'park 2','Zaandam','Nederland','park1.jpg','omschrijving');
/*!40000 ALTER TABLE `park` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parkfaciliteiten`
--

DROP TABLE IF EXISTS `parkfaciliteiten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parkfaciliteiten` (
  `faciliteiten_faciliteiten_ID` int(11) NOT NULL,
  `park_park_ID` int(11) NOT NULL,
  PRIMARY KEY (`faciliteiten_faciliteiten_ID`,`park_park_ID`),
  KEY `fk_hotel-faciliteiten_faciliteiten1_idx` (`faciliteiten_faciliteiten_ID`),
  KEY `fk_parkfaciliteiten_park1_idx` (`park_park_ID`),
  CONSTRAINT `fk_hotel-faciliteiten_faciliteiten1` FOREIGN KEY (`faciliteiten_faciliteiten_ID`) REFERENCES `faciliteiten` (`faciliteiten_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_parkfaciliteiten_park1` FOREIGN KEY (`park_park_ID`) REFERENCES `park` (`park_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parkfaciliteiten`
--

LOCK TABLES `parkfaciliteiten` WRITE;
/*!40000 ALTER TABLE `parkfaciliteiten` DISABLE KEYS */;
/*!40000 ALTER TABLE `parkfaciliteiten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `werknemers`
--

DROP TABLE IF EXISTS `werknemers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `werknemers` (
  `werknemers_ID` int(11) NOT NULL,
  `werknemers_vnaam` varchar(45) DEFAULT NULL,
  `werknemers_anaam` varchar(45) DEFAULT NULL,
  `werknemers_tv` varchar(45) DEFAULT NULL,
  `werknemers_seks` varchar(45) DEFAULT NULL,
  `werknemers_functie` varchar(45) DEFAULT NULL,
  `werknemers_plaats` varchar(45) DEFAULT NULL,
  `werknemers_handicap` varchar(45) DEFAULT NULL,
  `park_park_ID` int(11) DEFAULT NULL,
  `werknemers_username` varchar(45) DEFAULT NULL,
  `werknemers_password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`werknemers_ID`),
  KEY `fk_werknemers_park1_idx` (`park_park_ID`),
  CONSTRAINT `fk_werknemers_park1` FOREIGN KEY (`park_park_ID`) REFERENCES `park` (`park_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `werknemers`
--

LOCK TABLES `werknemers` WRITE;
/*!40000 ALTER TABLE `werknemers` DISABLE KEYS */;
INSERT INTO `werknemers` VALUES (0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'bob','test1');
/*!40000 ALTER TABLE `werknemers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-19  9:29:07
