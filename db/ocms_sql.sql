-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ocms
DROP DATABASE IF EXISTS `ocms`;
CREATE DATABASE IF NOT EXISTS `ocms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ocms`;

-- Dumping structure for table ocms.comment_tb
DROP TABLE IF EXISTS `comment_tb`;
CREATE TABLE IF NOT EXISTS `comment_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `comment_by` varchar(255) NOT NULL,
  `date_create` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.comment_tb: ~5 rows (approximately)
/*!40000 ALTER TABLE `comment_tb` DISABLE KEYS */;
INSERT INTO `comment_tb` (`id`, `conf_id`, `document_id`, `message`, `comment_by`, `date_create`) VALUES
	(4, 2, 2, 'Nice Paper work', 'review@gmail.com', '2019-01-11'),
	(5, 2, 2, 'Thanks', 'ola@gmail.com', '2019-01-11'),
	(7, 2, 2, 'Will you be able to publish this work before end of this year?', 'review@gmail.com', '2019-02-11'),
	(8, 2, 2, 'qq', 'review@gmail.com', '2019-02-11'),
	(9, 2, 2, 'Yes Sir i will try to publish it but dont have money to do that. i dont mind if u can help me out', 'ola@gmail.com', '2019-02-12');
/*!40000 ALTER TABLE `comment_tb` ENABLE KEYS */;

-- Dumping structure for table ocms.conference_reg_tb
DROP TABLE IF EXISTS `conference_reg_tb`;
CREATE TABLE IF NOT EXISTS `conference_reg_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.conference_reg_tb: ~5 rows (approximately)
/*!40000 ALTER TABLE `conference_reg_tb` DISABLE KEYS */;
INSERT INTO `conference_reg_tb` (`id`, `conf_id`, `user_email`, `end_date`, `payment_status`) VALUES
	(1, 1, 'abdul@abdul.com', '01/09/2019', NULL),
	(2, 2, 'Testing@test.com', '01/10/2019', NULL),
	(3, 2, 'abdulrasheeda9@gmail.com', '01/10/2019', NULL),
	(4, 2, 'ola@gmail.com', '01/10/2019', NULL),
	(7, 1, 'faruk@gmail.com', '01/09/2019', NULL);
/*!40000 ALTER TABLE `conference_reg_tb` ENABLE KEYS */;

-- Dumping structure for table ocms.conference_tb
DROP TABLE IF EXISTS `conference_tb`;
CREATE TABLE IF NOT EXISTS `conference_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_title` varchar(100) NOT NULL,
  `conf_desc` varchar(4000) NOT NULL,
  `conf_venue` varchar(100) NOT NULL,
  `conf_date` varchar(100) NOT NULL,
  `conf_time` varchar(50) NOT NULL,
  `conf_image` varchar(255) NOT NULL,
  `conf_end_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.conference_tb: ~2 rows (approximately)
/*!40000 ALTER TABLE `conference_tb` DISABLE KEYS */;
INSERT INTO `conference_tb` (`id`, `conf_title`, `conf_desc`, `conf_venue`, `conf_date`, `conf_time`, `conf_image`, `conf_end_date`) VALUES
	(1, 'National Association Of Computer Science Conference North-west Zone National', 'National Association Of Computer Science Conference North-west Zone National National Association Of Computer Science Conference North-west Zone National', 'Auditorium UDUS Sokoto State, Nigeria', '01/09/2019', '10:00 AM', 'uploads/2348091616848-1448490063.jpg', ''),
	(2, 'Software Coding Greel', 'Is All About Coding, Come And Share Your Programming Skills With People And Get To Meet Mentors.', 'Sokoto State University, Sokot State Nigeria', '01/10/2019', '12:00 AM', 'uploads/campus2.jpg', '');
/*!40000 ALTER TABLE `conference_tb` ENABLE KEYS */;

-- Dumping structure for table ocms.fee_tb
DROP TABLE IF EXISTS `fee_tb`;
CREATE TABLE IF NOT EXISTS `fee_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `conf_id` int(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `reviewer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.fee_tb: ~2 rows (approximately)
/*!40000 ALTER TABLE `fee_tb` DISABLE KEYS */;
INSERT INTO `fee_tb` (`id`, `conf_id`, `user`, `author`, `reviewer`) VALUES
	(1, 1, '# 10,000.00', '# 20,000.00', NULL),
	(2, 2, '# 13,00.00', '# 26,000.00', NULL);
/*!40000 ALTER TABLE `fee_tb` ENABLE KEYS */;

-- Dumping structure for table ocms.reviewer_author
DROP TABLE IF EXISTS `reviewer_author`;
CREATE TABLE IF NOT EXISTS `reviewer_author` (
  `id` int(25) NOT NULL,
  `author_email` varchar(255) NOT NULL,
  `reviewer_email` varchar(255) NOT NULL,
  `conf_id` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.reviewer_author: ~0 rows (approximately)
/*!40000 ALTER TABLE `reviewer_author` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviewer_author` ENABLE KEYS */;

-- Dumping structure for table ocms.upload_document
DROP TABLE IF EXISTS `upload_document`;
CREATE TABLE IF NOT EXISTS `upload_document` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `conf_id` int(25) NOT NULL,
  `document` varchar(255) NOT NULL,
  `reviewer` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `about` varchar(2550) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.upload_document: ~2 rows (approximately)
/*!40000 ALTER TABLE `upload_document` DISABLE KEYS */;
INSERT INTO `upload_document` (`id`, `email`, `conf_id`, `document`, `reviewer`, `status`, `about`) VALUES
	(2, 'ola@gmail.com', 2, 'uploads/CMP409.pdf', 'review@gmail.com', 1, 'This paper is all about software where u can get this done very soon'),
	(3, 'faruk@gmail.com', 1, '..admin/uploads/ViewerJS/Zeenat Project.docx', NULL, NULL, 'The paper is all about ....... Still cant find want is use for. Maybe i should contact my boss Oga Abduulahi Ict or what should i do?');
/*!40000 ALTER TABLE `upload_document` ENABLE KEYS */;

-- Dumping structure for table ocms.user_profile
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.user_profile: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`, `email`, `title`, `fullname`, `phone`, `bio`, `passport`, `field`, `social_name`) VALUES
	(1, 'ola@gmail.com', 'Dr.', 'Olamide Babatunde Ola', '08060415148', 'A Prof In Computer Software Engineering ', 'uploads/Binraheem2.jpg', NULL, NULL),
	(2, 'review@gmail.com', 'Prof.', 'Abdullahi Mustapha', '08060415147', 'Am Pro in Software Engineering', 'uploads/ab2.jpg', 'Software Engineering ', 'mustapha@facebook.com'),
	(3, 'faruk@gmail.com', 'Dr.', 'Faruk Ijaya', '08028082808', 'Am a senior lecturer in computer networking. ', 'uploads/Isahict.jpg', NULL, NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;

-- Dumping structure for table ocms.user_profile_tb
DROP TABLE IF EXISTS `user_profile_tb`;
CREATE TABLE IF NOT EXISTS `user_profile_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `specilization` varchar(100) DEFAULT NULL,
  `socail_media` varchar(100) NOT NULL,
  `bio` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.user_profile_tb: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_profile_tb` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile_tb` ENABLE KEYS */;

-- Dumping structure for table ocms.user_tb
DROP TABLE IF EXISTS `user_tb`;
CREATE TABLE IF NOT EXISTS `user_tb` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  `date_create` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table ocms.user_tb: ~7 rows (approximately)
/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` (`id`, `email`, `username`, `password`, `usertype`, `date_create`) VALUES
	(1, 'binraheem01@gmail.com', NULL, NULL, 'Participant', '2019-01-01'),
	(3, 'abdul@abdul.com', NULL, NULL, 'Participant', '2019-01-02'),
	(4, 'Testing@test.com', NULL, NULL, 'Participant', '2019-01-02'),
	(5, 'abdulrasheeda9@gmail.com', NULL, NULL, 'author', '2019-01-02'),
	(6, 'ola@gmail.com', 'ola', 'babatunde', 'author', '2019-01-03'),
	(7, 'review@gmail.com', 'review', 'review', 'reviewer', '2019-01-09'),
	(8, 'faruk@gmail.com', 'faruk', 'faruk12345', 'author', '2019-02-12');
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
