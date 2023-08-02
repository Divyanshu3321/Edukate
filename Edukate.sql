-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: edukate
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adminlogin`
--

DROP TABLE IF EXISTS `adminlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adminlogin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `college` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminlogin`
--

LOCK TABLES `adminlogin` WRITE;
/*!40000 ALTER TABLE `adminlogin` DISABLE KEYS */;
INSERT INTO `adminlogin` VALUES ('Divyanshu___33','123','pic.jpg','NIT Jalandhar','div20023041@gmail.com','Divyanshu');
/*!40000 ALTER TABLE `adminlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contactus` (
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `subject` varchar(30) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactus`
--

LOCK TABLES `contactus` WRITE;
/*!40000 ALTER TABLE `contactus` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developer_assignment`
--

DROP TABLE IF EXISTS `developer_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `developer_assignment` (
  `dev_assignment` int NOT NULL AUTO_INCREMENT,
  `takethisassignmentid` int DEFAULT NULL,
  `assignment` varchar(405) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dev_assignment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer_assignment`
--

LOCK TABLES `developer_assignment` WRITE;
/*!40000 ALTER TABLE `developer_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `developer_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `developer_register`
--

DROP TABLE IF EXISTS `developer_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `developer_register` (
  `developerid` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `linkedln` varchar(200) DEFAULT NULL,
  `github` varchar(200) DEFAULT NULL,
  `technicalskills` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `yourimage` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `samplework` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`developerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer_register`
--

LOCK TABLES `developer_register` WRITE;
/*!40000 ALTER TABLE `developer_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `developer_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `takethisassignment`
--

DROP TABLE IF EXISTS `takethisassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `takethisassignment` (
  `TakeAssignmentid` int NOT NULL AUTO_INCREMENT,
  `developerdeadline` varchar(456) DEFAULT NULL,
  `amount` varchar(456) DEFAULT NULL,
  `developerid` varchar(452) DEFAULT NULL,
  `assignmentid` varchar(345) DEFAULT NULL,
  `username` varchar(565) DEFAULT NULL,
  `status` int DEFAULT '0',
  PRIMARY KEY (`TakeAssignmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takethisassignment`
--

LOCK TABLES `takethisassignment` WRITE;
/*!40000 ALTER TABLE `takethisassignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `takethisassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_assignment`
--

DROP TABLE IF EXISTS `user_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_assignment` (
  `assignmentid` int NOT NULL AUTO_INCREMENT,
  `assignmentname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `language` varchar(45) DEFAULT NULL,
  `pagelength` varchar(45) DEFAULT NULL,
  `specifications` varchar(45) DEFAULT NULL,
  `deadline` varchar(45) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`assignmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_assignment`
--

LOCK TABLES `user_assignment` WRITE;
/*!40000 ALTER TABLE `user_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_register`
--

DROP TABLE IF EXISTS `user_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_register` (
  `fistname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `reenterpassword` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_register`
--

LOCK TABLES `user_register` WRITE;
/*!40000 ALTER TABLE `user_register` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_register` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-01  1:38:57
