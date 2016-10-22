-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: proknap
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `authorisation`
--

DROP TABLE IF EXISTS `authorisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authorisation` (
  `Auth_id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  PRIMARY KEY (`Auth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authorisation`
--

LOCK TABLES `authorisation` WRITE;
/*!40000 ALTER TABLE `authorisation` DISABLE KEYS */;
INSERT INTO `authorisation` VALUES (1,'Admin'),(2,'Procurement Head'),(3,'Dealing Officer'),(4,'Indenter');
/*!40000 ALTER TABLE `authorisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `Dname` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  PRIMARY KEY (`Dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('Procurement',0),('IT',1),('Finance',2),('Electrical',3),('Mechanical',4);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext1`
--

DROP TABLE IF EXISTS `ext1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext1` (
  `T_id` int(11) NOT NULL,
  `Ext_date1` date NOT NULL,
  PRIMARY KEY (`T_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext1`
--

LOCK TABLES `ext1` WRITE;
/*!40000 ALTER TABLE `ext1` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ext2`
--

DROP TABLE IF EXISTS `ext2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext2` (
  `T_id` int(11) NOT NULL,
  `Ext_date2` date NOT NULL,
  PRIMARY KEY (`T_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ext2`
--

LOCK TABLES `ext2` WRITE;
/*!40000 ALTER TABLE `ext2` DISABLE KEYS */;
/*!40000 ALTER TABLE `ext2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indent`
--

DROP TABLE IF EXISTS `indent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indent` (
  `Pr_no` int(11) NOT NULL,
  `Pr_date` date NOT NULL,
  `Descr` text NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `Do` int(11) NOT NULL,
  PRIMARY KEY (`Pr_no`),
  KEY `Dept_id` (`Dept_id`),
  CONSTRAINT `indent_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indent`
--

LOCK TABLES `indent` WRITE;
/*!40000 ALTER TABLE `indent` DISABLE KEYS */;
/*!40000 ALTER TABLE `indent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request` (
  `User_id` varchar(20) NOT NULL,
  `Req_no` int(11) NOT NULL,
  `Descr` text NOT NULL,
  `Req_status` varchar(15) NOT NULL DEFAULT 'Pending',
  `Date` date NOT NULL,
  `Item` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Req_no`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `Status_id` int(11) NOT NULL,
  `Descr` text NOT NULL,
  PRIMARY KEY (`Status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tender`
--

DROP TABLE IF EXISTS `tender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tender` (
  `T_id` int(11) NOT NULL,
  `Tdate` date NOT NULL,
  `Bid_open_date` date NOT NULL,
  `Pr_no` int(11) NOT NULL,
  `Status_id` int(11) NOT NULL,
  `Last_updated` date NOT NULL,
  PRIMARY KEY (`T_id`),
  KEY `Pr_no` (`Pr_no`),
  KEY `Status_id` (`Status_id`),
  CONSTRAINT `tender_ibfk_1` FOREIGN KEY (`Pr_no`) REFERENCES `indent` (`Pr_no`),
  CONSTRAINT `tender_ibfk_2` FOREIGN KEY (`Status_id`) REFERENCES `status` (`Status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tender`
--

LOCK TABLES `tender` WRITE;
/*!40000 ALTER TABLE `tender` DISABLE KEYS */;
/*!40000 ALTER TABLE `tender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `User_id` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `Auth_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`User_id`),
  KEY `Dept_id` (`Dept_id`),
  KEY `Auth_id` (`Auth_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Auth_id`) REFERENCES `authorisation` (`Auth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Abhilasha Shah',2,4,'password'),('Abhishekh S',1,4,'password'),('Akshay Jadeja',0,2,'password'),('Bhavana Kohli',3,4,'password'),('Chandana N T',4,4,'password'),('Gagandeep',2,4,'password'),('Gargi',3,4,'password'),('Jayaprakash Rai',0,3,'password'),('Kavita Soham',0,3,'password'),('Nikhila',1,4,'password'),('Nisha Ramesh',1,4,'password'),('Nisha Singh',2,4,'password'),('Pratap',4,4,'password'),('Rachita Gururaj',4,4,'password'),('Sagar Mitra',0,3,'password'),('Satwik Pandit',1,4,'password'),('Suzan Pinto',0,3,'password'),('Tushar Pandey',4,4,'password'),('Yuvraj Singh',3,4,'password'),('Zuber Ali',2,4,'password');
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

-- Dump completed on 2016-10-22 13:36:10
