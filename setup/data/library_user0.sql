-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.1.1    Database: library
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `name` varchar(200) character set utf8 NOT NULL,
  `account` varchar(45) character set utf8 NOT NULL,
  `password` varchar(45) character set utf8 NOT NULL,
  `isAdministrator` tinyint(4) NOT NULL,
  `birthday` date default NULL,
  `email` varchar(45) character set utf8 NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `Account_UNIQUE` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'supervisor','supervisor','group9',1,NULL,'grassking100@gmail.com'),(3,'Ching-Tien','40243118S','40243118S',1,NULL,'grassking100@gmail.com'),(4,'Agent E','SCP_agent','SCP-1171',0,NULL,'unknown@scp.com.scp'),(5,'Slaine','slaine_mars','314',0,NULL,'marsking@mars.com.mars'),(6,'superhuman','super','super',1,'1001-01-01','grassking100@gmail.com'),(7,'1111','Account','UserPassword',0,NULL,'UserEmail'),(8,'1111','1111','super',0,NULL,'wswswsw'),(9,'1111','2222','3333',0,NULL,'wswswsw'),(10,'1111','3333','4444',0,NULL,'wswswsw'),(11,'nomral','normal','normal',0,NULL,'normal@n.com'),(12,'','super3','super3',0,NULL,''),(13,'','super4','super34',0,NULL,''),(14,'','super43','super343',1,NULL,''),(15,'','123','123',1,NULL,''),(16,'','1233','1233',0,NULL,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-26 22:14:45
