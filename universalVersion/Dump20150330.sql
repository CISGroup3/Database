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
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`questionID`),
  KEY `userInformation` (`userID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `questiondetails_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  CONSTRAINT `userInformation` FOREIGN KEY (`userID`) REFERENCES `userdetails` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questiondetails`
--

LOCK TABLES `questiondetails` WRITE;
/*!40000 ALTER TABLE `questiondetails` DISABLE KEYS */;
INSERT INTO `questiondetails` VALUES (67,'A browser redirect happens when Google is opened called Snap.Do. Is it malware, and can it be removed?',17,'Browser Redirection','2015-03-30','Open',1,0),(69,'How can I close an unresponsive tab in Chrome without closing all windows?',17,'Chrome Unresponsive Page','2015-03-30','Open',6,0),(70,'Can anyone recommend a good, free and safe virus scanner for my computer? My computer runs very slowly and the pre-installed scanner may not be picking up all of the malware. ',17,'Virus Scanner','2015-03-30','Open',1,0),(71,'Does reputable software exist for scanning a download file to check for viruses?',17,'Software for File Scanning?','2015-03-30','Open',1,0),(72,'Is there an anti-virus software program built especially for Apple? Which ones are incompatible?',17,'Apple Anti-Virus Software','2015-03-30','Open',2,0),(73,'I am 99.9% certain my PC has contracted a virus. How can I be certain it has been removed? Are there files I can simply delete, or do I need to reformat my computer?',17,'Virus infection - how to fix PC?','2015-03-30','Open',2,0),(74,'How do I know if my firewall is functioning? Are there better options than the system default?',17,'Is my firewall functioning?','2015-03-30','Open',2,0),(75,'My computer response time is very slow. Is there a way I can improve it? ',17,'Computer Response Time','2015-03-30','Open',3,0),(76,'How often should I de-frag my computer?',17,'De-fragmentation','2015-03-30','Open',3,0),(78,'iTunes will not seem to work with my Android tablet. Is it not currently supported? ',17,'iTunes Compatiblity Issues','2015-03-30','Open',4,0),(79,'Which operating system is the most secure? ',17,'Security Query','2015-03-30','Open',5,0),(81,'What is the safest way of disposing of old hardware? Is deleting all the data from C: enough?',17,'Disposing of old hardware','2015-03-30','Open',7,0);
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
  `responseContent` tinytext,
  PRIMARY KEY (`responseID`),
  KEY `fk_responseuser` (`userID`),
  KEY `fkresponse` (`questionID`),
  CONSTRAINT `fkresponse` FOREIGN KEY (`questionID`) REFERENCES `questiondetails` (`questionID`) ON DELETE CASCADE,
  CONSTRAINT `responsedetails_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `userdetails` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `responsedetails_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `questiondetails` (`questionID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsedetails`
--

LOCK TABLES `responsedetails` WRITE;
/*!40000 ALTER TABLE `responsedetails` DISABLE KEYS */;
INSERT INTO `responsedetails` VALUES (15,18,71,0,'2015-03-30','F','You could try using VirusTotal, which is an online service. '),(16,40,71,0,'2015-03-30','F','Also, when installing, make sure to refuse any add-ons that the installer offers. These are usually malware. '),(17,17,71,0,'2015-03-30','F','I tried VirusTotal with Firefox, but is there an equivalent plugin for Chrome?');
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
  `reputationPoints` int(11) DEFAULT '0',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdetails`
--

LOCK TABLES `userdetails` WRITE;
/*!40000 ALTER TABLE `userdetails` DISABLE KEYS */;
INSERT INTO `userdetails` VALUES (17,'katme','katrionaangel@rocketmail.com','K','Angel','new',NULL,NULL,0),(18,'Demo','demo@demo.com','Demo','Demo','me2',NULL,NULL,0),(40,'nicho','nicholaj05@hotmail.co.uk','Alex','Nicholson','me',NULL,NULL,0),(41,'jamhall','jam-hall@hotmail.co.uk','James','Hall','me',NULL,NULL,0),(42,'lqbaker','lqb@live.co.uk','Luke','Baker','me',NULL,NULL,0),(43,'ozarock','oza-rock@hotmail.com','Owen','Hufton','me',NULL,NULL,0);
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

-- Dump completed on 2015-03-30 15:09:44
