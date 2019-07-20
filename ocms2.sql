-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ocms
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `comment_tb`
--

DROP TABLE IF EXISTS `comment_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `date_create` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_tb`
--

LOCK TABLES `comment_tb` WRITE;
/*!40000 ALTER TABLE `comment_tb` DISABLE KEYS */;
INSERT INTO `comment_tb` VALUES (4,2,2,'Nice Paper work','review@gmail.com','2019-01-11'),(5,2,2,'Thanks','ola@gmail.com','2019-01-11'),(7,2,2,'Will you be able to publish this work before end of this year?','review@gmail.com','2019-02-11'),(8,2,2,'qq','review@gmail.com','2019-02-11'),(9,2,2,'Yes Sir i will try to publish it but dont have money to do that. i dont mind if u can help me out','ola@gmail.com','2019-02-12'),(10,2,2,'Have go through your work is ok to some extent ','olamide@gmail.com','2019-02-14');
/*!40000 ALTER TABLE `comment_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference_reg_tb`
--

DROP TABLE IF EXISTS `conference_reg_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference_reg_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference_reg_tb`
--

LOCK TABLES `conference_reg_tb` WRITE;
/*!40000 ALTER TABLE `conference_reg_tb` DISABLE KEYS */;
INSERT INTO `conference_reg_tb` VALUES (1,1,'abdul@abdul.com','01/09/2019',NULL),(2,2,'Testing@test.com','01/10/2019','NULL'),(3,2,'abdulrasheeda9@gmail.com','01/10/2019','NULL'),(4,2,'ola@gmail.com','01/10/2019','1'),(7,1,'faruk@gmail.com','01/09/2019',NULL),(10,4,'ola@gmail.com','02/19/2019','1');
/*!40000 ALTER TABLE `conference_reg_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conference_tb`
--

DROP TABLE IF EXISTS `conference_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conference_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(100) NOT NULL,
  `conf_desc` varchar(4000) NOT NULL,
  `conf_venue` varchar(100) NOT NULL,
  `conf_date` varchar(100) NOT NULL,
  `conf_time` varchar(50) NOT NULL,
  `conf_image` varchar(255) NOT NULL,
  `conf_end_date` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conference_tb`
--

LOCK TABLES `conference_tb` WRITE;
/*!40000 ALTER TABLE `conference_tb` DISABLE KEYS */;
INSERT INTO `conference_tb` VALUES (1,'National Association Of Computer Science Conference North-west Zone National','National Association Of Computer Science Conference North-west Zone National  National Association Of Computer Science Conference North-west Zone National','Auditorium UDUS Sokoto State, Nigeria','01/09/2019','10:00 AM','uploads/2348091616848-1448490063.jpg','01/09/2019'),(2,'2nd Edition Conference ','Is All About Coding, Come And Share Your Programming Skills With People And Get To Meet Mentors.','Sokoto State University, Sokot State Nigeria','02/14/2019','12:45 PM','uploads/campus2.jpg','02/14/2019'),(4,'2nd Networking The World','This Conference Is For Testing, Lets See If Jit Works','Kebbi State University, Birinin Kebbi ','02/19/2019','8:00 AM','uploads/campus3.jpg','02/22/2019');
/*!40000 ALTER TABLE `conference_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fee_tb`
--

DROP TABLE IF EXISTS `fee_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fee_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_id` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `reviewer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fee_tb`
--

LOCK TABLES `fee_tb` WRITE;
/*!40000 ALTER TABLE `fee_tb` DISABLE KEYS */;
INSERT INTO `fee_tb` VALUES (1,1,'# 10,000.00','# 20,000.00',NULL),(2,2,'# 13,00.00','# 26,000.00',NULL),(3,4,'# 8,000.00','# 15,000.00',NULL);
/*!40000 ALTER TABLE `fee_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviewer_author`
--

DROP TABLE IF EXISTS `reviewer_author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviewer_author` (
  `id` int(25) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `reviewer_email` varchar(255) NOT NULL,
  `conf_id` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviewer_author`
--

LOCK TABLES `reviewer_author` WRITE;
/*!40000 ALTER TABLE `reviewer_author` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviewer_author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_document`
--

DROP TABLE IF EXISTS `upload_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_document` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `conf_id` int(25) NOT NULL,
  `document` varchar(255) NOT NULL,
  `reviewer` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `about` varchar(2550) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_document`
--

LOCK TABLES `upload_document` WRITE;
/*!40000 ALTER TABLE `upload_document` DISABLE KEYS */;
INSERT INTO `upload_document` VALUES (2,'ola@gmail.com',2,'uploads/CMP409.pdf','olamide@gmail.com',1,'This paper is all about software where u can get this done very soon'),(3,'faruk@gmail.com',1,'uploads/Invoice.pdf','olamide@gmail.com',1,'The paper is all about ....... Still cant find want is use for. Maybe i should contact my boss Oga Abduulahi Ict or what should i do?'),(8,'ola@gmail.com',4,'uploads/jamila1.pdf','review@gmail.com',NULL,'aaa');
/*!40000 ALTER TABLE `upload_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `bio` text,
  `passport` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `social_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` VALUES (1,'ola@gmail.com','Dr.','Olamide Babatunde Ola','08060415148','A Prof In Computer Software Engineering ','uploads/IMG_20190120_134456.jpg',NULL,NULL),(2,'review@gmail.com','Mr.','Abdullahi Mustapha','08060415147','Am Pro in Software Engineering','uploads/picture006.jpg','Software Engineering ','mustapha@facebook.com'),(3,'faruk@gmail.com','Dr.','Faruk Ijaya','08028082808','Am a senior lecturer in computer networking. ','uploads/Isahict.jpg',NULL,NULL),(4,'olamide@gmail.com','Mr.','Olamide Abdullahi','080998877','Actaully as u can see am still under testing so dont think i can release my biography to anyone.... #winks...LOL','uploads/2348064096223.jpg','System Administrator','olamide.abdullahi@facebook.com'),(5,'binraheem01@gmail.com',NULL,'Yusuf Mustapha','09088776655',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile_tb`
--

DROP TABLE IF EXISTS `user_profile_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `specilization` varchar(100) DEFAULT NULL,
  `socail_media` varchar(100) NOT NULL,
  `bio` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile_tb`
--

LOCK TABLES `user_profile_tb` WRITE;
/*!40000 ALTER TABLE `user_profile_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile_tb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `date_create` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tb`
--

LOCK TABLES `user_tb` WRITE;
/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` VALUES (1,'binraheem01@gmail.com','raheem','pass1234','Participant','2019-01-01'),(3,'abdul@abdul.com',NULL,'abdullahi','Participant','2019-01-02'),(4,'Testing@test.com',NULL,NULL,'Participant','2019-01-02'),(5,'abdulrasheeda9@gmail.com',NULL,NULL,'author','2019-01-02'),(6,'ola@gmail.com','ola','babatunde','author','2019-01-03'),(7,'review@gmail.com','review','review','reviewer','2019-01-09'),(8,'faruk@gmail.com','faruk','faruk12345','author','2019-02-12'),(9,'olamide@gmail.com','olamide','olamide001','reviewer','2019-02-14'),(10,'islamiya01@gmail.com','islamiya','12345678','Participant','2019-03-13');
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-20 21:18:49
