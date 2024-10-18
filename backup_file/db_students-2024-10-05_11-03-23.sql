-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_students
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `add_to_class`
--

DROP TABLE IF EXISTS `add_to_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `add_to_class` (
  `id` int(10) NOT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Class_id` int(10) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_to_class`
--

LOCK TABLES `add_to_class` WRITE;
/*!40000 ALTER TABLE `add_to_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `add_to_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_attendance`
--

DROP TABLE IF EXISTS `tb_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_attendance` (
  `id` int(10) NOT NULL,
  `Class_id` int(10) DEFAULT NULL,
  `Attendance` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_attendance`
--

LOCK TABLES `tb_attendance` WRITE;
/*!40000 ALTER TABLE `tb_attendance` DISABLE KEYS */;
INSERT INTO `tb_attendance` VALUES (0,NULL,NULL,'2024-09-04',NULL,'2024-08-28 11:54:21.00000','2024-09-02 18:54:25.00000');
/*!40000 ALTER TABLE `tb_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_class`
--

DROP TABLE IF EXISTS `tb_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_class` (
  `ClassID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Class_name` varchar(30) DEFAULT NULL,
  `Teacher_id` int(6) unsigned zerofill DEFAULT NULL,
  `Course_id` int(6) unsigned zerofill DEFAULT NULL,
  `Class_Type` varchar(1) DEFAULT NULL,
  `Time_in` time DEFAULT NULL,
  `Time_out` time DEFAULT NULL,
  `Shift` varchar(10) DEFAULT NULL,
  `Start_class` date DEFAULT NULL,
  `End_class` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ClassID`) USING BTREE,
  KEY `courseFK` (`Course_id`),
  KEY `teacherFK` (`Teacher_id`),
  CONSTRAINT `courseFK` FOREIGN KEY (`Course_id`) REFERENCES `tb_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `teacherFK` FOREIGN KEY (`Teacher_id`) REFERENCES `tb_teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_class`
--

LOCK TABLES `tb_class` WRITE;
/*!40000 ALTER TABLE `tb_class` DISABLE KEYS */;
INSERT INTO `tb_class` VALUES (000001,'ថ្នាក់ទី១ ',000001,000002,'ក','18:35:50','21:35:58','PM','2024-09-29','2024-09-29','2024-09-04 11:36:43.00000','2024-09-04 19:36:47'),(000002,'ថ្នាក់ទី១ ',000003,000001,'ខ','01:55:03','02:24:16','AM','2024-09-29','2024-09-29','2024-09-27 18:55:29.00000',NULL),(000005,'ថ្នាក់ទី២',000001,000002,'ក',NULL,NULL,'PM','2024-09-29','2024-09-29',NULL,NULL),(000006,'dfgdxfg',000003,000002,'','00:00:00','00:00:00',NULL,'0000-00-00','0000-00-00',NULL,NULL),(000007,'dfdf',000003,000002,'','00:00:00','00:00:00',NULL,'0000-00-00','0000-00-00',NULL,NULL),(000008,'class',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_course`
--

DROP TABLE IF EXISTS `tb_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_course` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Course_name` varchar(50) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Sub_id` int(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjectFK` (`Sub_id`),
  CONSTRAINT `subjectFK` FOREIGN KEY (`Sub_id`) REFERENCES `tb_subject` (`SubID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_course`
--

LOCK TABLES `tb_course` WRITE;
/*!40000 ALTER TABLE `tb_course` DISABLE KEYS */;
INSERT INTO `tb_course` VALUES (000001,'Pre-Class','bg-warning',1,'2024-09-04','2024-09-04 11:51:09.00000','2024-09-04 18:51:13.00000'),(000002,'let\'s go','bg-info',2,'2024-09-03','2024-08-31 18:50:49.00000','2024-09-01 01:50:57.00000'),(000003,'Book1','bg-success',2,'2024-09-02','2024-06-02 18:50:52.00000','2024-09-08 01:51:00.00000');
/*!40000 ALTER TABLE `tb_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_final_score`
--

DROP TABLE IF EXISTS `tb_final_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_final_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Participation` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Final` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_final_score`
--

LOCK TABLES `tb_final_score` WRITE;
/*!40000 ALTER TABLE `tb_final_score` DISABLE KEYS */;
INSERT INTO `tb_final_score` VALUES (1,NULL,60,60,70,69,69,'NEW','2024-09-02',NULL,'2024-08-27 11:50:22.00000','2024-09-04 18:50:26.00000');
/*!40000 ALTER TABLE `tb_final_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_login` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(10) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Role` char(1) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_login`
--

LOCK TABLES `tb_login` WRITE;
/*!40000 ALTER TABLE `tb_login` DISABLE KEYS */;
INSERT INTO `tb_login` VALUES (1,NULL,'Chamroeun','122000','a','2024-09-04');
/*!40000 ALTER TABLE `tb_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_mid_score`
--

DROP TABLE IF EXISTS `tb_mid_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_mid_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Paticipantion` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Midterm` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_mid_score`
--

LOCK TABLES `tb_mid_score` WRITE;
/*!40000 ALTER TABLE `tb_mid_score` DISABLE KEYS */;
INSERT INTO `tb_mid_score` VALUES (1,NULL,79,50,59,79,79,'NEW','2024-09-04',NULL,'2024-09-04 11:49:08.00000','2024-09-04 18:49:11.00000');
/*!40000 ALTER TABLE `tb_mid_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_month_score`
--

DROP TABLE IF EXISTS `tb_month_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_month_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Paticipation` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Monthly` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Course_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_month_score`
--

LOCK TABLES `tb_month_score` WRITE;
/*!40000 ALTER TABLE `tb_month_score` DISABLE KEYS */;
INSERT INTO `tb_month_score` VALUES (1,NULL,60,70,50,60,68,'New','2024-08-29',NULL,NULL,'2024-09-03 11:48:27.00000','2024-09-01 18:48:32');
/*!40000 ALTER TABLE `tb_month_score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_monthly`
--

DROP TABLE IF EXISTS `tb_monthly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_monthly` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Class_id` int(6) unsigned zerofill DEFAULT NULL,
  `Course_id` int(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classFK` (`Class_id`),
  CONSTRAINT `classFK` FOREIGN KEY (`Class_id`) REFERENCES `tb_class` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_monthly`
--

LOCK TABLES `tb_monthly` WRITE;
/*!40000 ALTER TABLE `tb_monthly` DISABLE KEYS */;
INSERT INTO `tb_monthly` VALUES (000001,000001,NULL,'2024-09-03','2024-09-03 11:47:25.00000','2024-09-04 18:47:29.00000'),(000003,000002,NULL,'2024-09-10',NULL,NULL);
/*!40000 ALTER TABLE `tb_monthly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sch-teacher`
--

DROP TABLE IF EXISTS `tb_sch-teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sch-teacher` (
  `SchID` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(10) DEFAULT NULL,
  `Time_in` datetime DEFAULT NULL,
  `Time_out` datetime DEFAULT NULL,
  `Start_class` date DEFAULT NULL,
  `End_class` date DEFAULT NULL,
  `Monday` varchar(255) DEFAULT NULL,
  `Tuesday` varchar(255) DEFAULT NULL,
  `Wednesday` varchar(255) DEFAULT NULL,
  `Thursday` varchar(255) DEFAULT NULL,
  `Friday` varchar(255) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`SchID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sch-teacher`
--

LOCK TABLES `tb_sch-teacher` WRITE;
/*!40000 ALTER TABLE `tb_sch-teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_sch-teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_student`
--

DROP TABLE IF EXISTS `tb_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_student` (
  `ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Stu_code` varchar(10) DEFAULT NULL,
  `En_name` varchar(50) DEFAULT NULL,
  `Kh_name` varchar(50) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Level` varchar(10) DEFAULT NULL,
  `Unit` varchar(5) DEFAULT NULL,
  `Time` varchar(2) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `Profile_img` varchar(255) DEFAULT NULL,
  `Dad_name` varchar(50) DEFAULT NULL,
  `Mom_name` varchar(50) DEFAULT NULL,
  `Dad_job` varchar(100) DEFAULT NULL,
  `Mom_job` varchar(100) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_student`
--

LOCK TABLES `tb_student` WRITE;
/*!40000 ALTER TABLE `tb_student` DISABLE KEYS */;
INSERT INTO `tb_student` VALUES (0000000023,'Stu123','Vichetsdfsfs','ចិត្រ','Male','2024-08-26','Sr','Let\'s go','New','AM',0,'2024-09-29 09:34:44','2024-09-29 16:34:44',NULL,'','','','','098 576 356 4'),(0000000024,NULL,'Mantih','ម៉ានិត','Male','2024-09-01','kdjfvsnfj','Pre-Class','New','PM',NULL,NULL,NULL,NULL,'sdkjdj','skdnfj','ksdjf','kjfj','dkfjfik'),(0000000027,NULL,'Kroeun','skjdh','Male','2024-09-09','dfvfv','sdff','dfvfv','sd',NULL,NULL,NULL,NULL,'dfdfg','dvfv','sdfvdfv','dfvvf','dvffv'),(0000000028,NULL,'Kroeun','skjdh',NULL,'0000-00-00','kxfvkdjf,','sdff','','',NULL,NULL,NULL,NULL,'dfdfg','','','','rdgde'),(0000000029,NULL,'Kroeun','skjdh','Male','2024-09-01','sdzdfv','sdff','','',NULL,NULL,NULL,NULL,'dg','','drg','',''),(0000000030,NULL,'Kroeun','skjdh',NULL,'0000-00-00','sdf','','','',NULL,NULL,NULL,NULL,'','','','','069 6000900'),(0000000031,NULL,'Kroeun','skjdh',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000032,NULL,'Kroeun','skjdh',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000033,NULL,'Kroeun','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000034,NULL,'Kroeun','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000035,NULL,'Kroeun','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000037,NULL,'Kroeun','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000038,NULL,'Kroeun22','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000039,NULL,'Hello','សួស្តី','Male','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000040,NULL,'តេស','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000041,NULL,'Hello','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000042,NULL,'Hello','','Male','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000043,NULL,'Hello','','Male','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000044,NULL,'meeeeee','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000045,NULL,'meeeeee','','Male','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000046,NULL,'xccxv','cvxcv','Female','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000047,NULL,'Kroeun','fdvd',NULL,'0000-00-00','','dfdf','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000048,NULL,'Hello','','Male','0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000052,NULL,'Saigon','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000053,NULL,'Kroeun111111','wwefsf','Male','2024-09-03','sdfsd','sdff','dfvfv','sd',NULL,NULL,NULL,NULL,'scd','dsfdf','d','dsf','sdfsdf'),(0000000054,NULL,'dfgdxfgxdfg','ដថងដថងថង','Male','2024-09-02','xc','ដថបវដថវ','ខចវខច','ខច',NULL,NULL,NULL,NULL,'fvf','fg','xfg','xc','xbxcbvxfbv'),(0000000056,NULL,'Saigon','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000057,NULL,'Saigon','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000058,NULL,'dsfdfdfdf','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','',''),(0000000059,NULL,'Saigon','',NULL,'0000-00-00','','','','',NULL,NULL,NULL,NULL,'','','','','');
/*!40000 ALTER TABLE `tb_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_subject`
--

DROP TABLE IF EXISTS `tb_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_subject` (
  `SubID` int(10) NOT NULL AUTO_INCREMENT,
  `Subject_name` varchar(50) DEFAULT NULL,
  `Color` varchar(40) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`SubID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_subject`
--

LOCK TABLES `tb_subject` WRITE;
/*!40000 ALTER TABLE `tb_subject` DISABLE KEYS */;
INSERT INTO `tb_subject` VALUES (1,'Khmer','bg-info','2024-09-04 11:44:06.00000','2024-09-04 18:44:09.00000'),(2,'English','bg-warning','2024-09-03 11:45:10.00000','2024-09-04 18:45:15.00000'),(3,'Chinese','bg-info','2024-09-02 11:13:43.00000','2024-09-01 18:13:48.00000');
/*!40000 ALTER TABLE `tb_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_teacher`
--

DROP TABLE IF EXISTS `tb_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_teacher` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Profile_img` varchar(255) DEFAULT NULL,
  `En_name` varchar(50) DEFAULT NULL,
  `Kh_name` varchar(50) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Age` int(2) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Staff_code` varchar(20) DEFAULT NULL,
  `Nation` varchar(20) DEFAULT NULL,
  `Ethnicity` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `En_name` (`En_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teacher`
--

LOCK TABLES `tb_teacher` WRITE;
/*!40000 ALTER TABLE `tb_teacher` DISABLE KEYS */;
INSERT INTO `tb_teacher` VALUES (000001,NULL,'Saran Chamroeun','សារ៉ាន ចំរើន','Male',18,'2024-09-09','09847563/0123456678','Teacher','SR','9999','Khmer','Khmer','New','2024-09-04','2024-09-04 11:42:17.00000','2024-09-04 18:42:21.00000'),(000003,NULL,'Chet',NULL,'Female',20,'2024-08-27','098768356676','Teacher','pp','8888',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_teacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-05 16:03:24
