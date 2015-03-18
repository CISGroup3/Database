-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: webforum
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Malware'),(2,'Anti-Virus Software'),(3,'Computer Support'),(4,'Mobile/Tablet Support'),(5,'Operating Systems'),(6,'Browsers'),(7,'Miscellaneous');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questiondetails`
--

DROP TABLE IF EXISTS `questiondetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questiondetails` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `questionText` text NOT NULL,
  `userID` int(11) NOT NULL,
  `questionTitle` text NOT NULL,
  `questionDate` date NOT NULL,
  `questionStatus` text NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`questionID`),
  KEY `userInformation` (`userID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `questiondetails_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  CONSTRAINT `userInformation` FOREIGN KEY (`userID`) REFERENCES `userdetails` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questiondetails`
--

LOCK TABLES `questiondetails` WRITE;
/*!40000 ALTER TABLE `questiondetails` DISABLE KEYS */;
INSERT INTO `questiondetails` VALUES (48,'Add your question text here.\r\n		',17,'fh','0000-00-00','Open',1),(49,'Something else',17,'Something','0000-00-00','Open',1),(50,'Add your question text here.\r\n		',17,'second','2015-03-08','Open',1),(51,'RFYHUNHYGT',17,'xdtgbuuj','2015-03-09','Open',1);
/*!40000 ALTER TABLE `questiondetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsedetails`
--

DROP TABLE IF EXISTS `responsedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsedetails` (
  `responseID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `responseDate` date NOT NULL,
  `preferredAnswer` enum('T','F') NOT NULL,
  PRIMARY KEY (`responseID`),
  KEY `fk_responseuser` (`userID`),
  KEY `questionID` (`questionID`),
  CONSTRAINT `responsedetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userdetails` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `responsedetails_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `questiondetails` (`questionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsedetails`
--

LOCK TABLES `responsedetails` WRITE;
/*!40000 ALTER TABLE `responsedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userdetails` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userNickname` text NOT NULL,
  `userEmail` text NOT NULL,
  `userFirstName` text NOT NULL,
  `userLastName` text NOT NULL,
  `userPassword` text NOT NULL,
  `IPAddr1` text,
  `IPAddr2` text,
  `reputationPoints` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES (17,'katme','katrionaangel@rocketmail.com','K','Angel','me',NULL,NULL,NULL);
/*!40000 ALTER TABLE `userdetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-09 17:56:44
