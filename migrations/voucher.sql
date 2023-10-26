-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: voucher
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
-- Table structure for table `billings`
--

DROP TABLE IF EXISTS `billings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billings` (
  `id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `customer_id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `package` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billings`
--

LOCK TABLES `billings` WRITE;
/*!40000 ALTER TABLE `billings` DISABLE KEYS */;
INSERT INTO `billings` VALUES ('1001001','MTX001','100 mbps'),('1001002','MTX001','101 mbps'),('1001003','MTX001','102 mbps'),('1001004','MTX001','103 mbps'),('1001005','MTX001','104 mbps'),('1001006','MTX001','105 mbps'),('1002001','MTX002','106 mbps'),('1002002','MTX002','107 mbps'),('1002003','MTX002','108 mbps'),('1002004','MTX002','109 mbps'),('1002005','MTX002','110 mbps'),('1002006','MTX002','111 mbps'),('1002007','MTX002','112 mbps');
/*!40000 ALTER TABLE `billings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb3_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `timestamp` int unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('ntfl9uu506org67s0usn8m0059cpnq1e','127.0.0.1',1698191385,_binary '__ci_last_regenerate|i:1698191385;username|s:5:\"admin\";role|s:5:\"admin\";message|s:20:\"Imported 12 partners\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('17e2pss9p9gbn6ir8b64vnug8std3r72','127.0.0.1',1698191714,_binary '__ci_last_regenerate|i:1698191714;username|s:5:\"admin\";role|s:5:\"admin\";message|s:15:\"partner Updated\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('crgel9m18cr7mc6n3kplne31vibarltc','127.0.0.1',1698192116,_binary '__ci_last_regenerate|i:1698192116;username|s:5:\"admin\";role|s:5:\"admin\";message|s:15:\"partner Deleted\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('tnokq271is280nr1cim0kdrtegqv4fim','127.0.0.1',1698192425,_binary '__ci_last_regenerate|i:1698192425;username|s:5:\"admin\";role|s:5:\"admin\";'),('r6feltdektorsndgee4or68rovfmh189','127.0.0.1',1698192727,_binary '__ci_last_regenerate|i:1698192727;username|s:5:\"admin\";role|s:5:\"admin\";'),('hnfj970ehge3rfngfnpu5tbg5886auqb','127.0.0.1',1698196517,_binary '__ci_last_regenerate|i:1698196517;username|s:5:\"admin\";role|s:5:\"admin\";'),('7c9eppg0nv9olae3r0aiadr2mvokmohd','127.0.0.1',1698196821,_binary '__ci_last_regenerate|i:1698196821;username|s:5:\"admin\";role|s:5:\"admin\";'),('ii0ebnie74erhnikk0s04k1om5fi68dn','127.0.0.1',1698197125,_binary '__ci_last_regenerate|i:1698197125;username|s:5:\"admin\";role|s:5:\"admin\";'),('mfvd50s9np0kvgnb2ljtv8al171572oa','127.0.0.1',1698197754,_binary '__ci_last_regenerate|i:1698197754;username|s:5:\"admin\";role|s:5:\"admin\";'),('dhgfpahmvgi7lr4u4f41pn08hs7saoct','127.0.0.1',1698197754,_binary '__ci_last_regenerate|i:1698197754;'),('9b25bkphjuhn41lthc4bbgon9m4h7mlc','127.0.0.1',1698282417,_binary '__ci_last_regenerate|i:1698282417;username|s:5:\"admin\";role|s:5:\"admin\";'),('qsuvn8a4qo0i7aej24cq20enjfqn3661','127.0.0.1',1698283049,_binary '__ci_last_regenerate|i:1698283049;username|s:5:\"admin\";role|s:5:\"admin\";'),('52uqr2jgjf6ehfu404i7l6m3tp9pb616','127.0.0.1',1698283469,_binary '__ci_last_regenerate|i:1698283469;username|s:5:\"admin\";role|s:5:\"admin\";'),('asubnpjltl60qdlgpr8cuvduffthftkq','127.0.0.1',1698284050,_binary '__ci_last_regenerate|i:1698284050;username|s:5:\"admin\";role|s:5:\"admin\";'),('53li8qt3ru8mt2l7rqeoo0njsdge4nga','127.0.0.1',1698284360,_binary '__ci_last_regenerate|i:1698284360;username|s:5:\"admin\";role|s:5:\"admin\";'),('h4104icb2ohece7nlhaq3jgkruk23718','127.0.0.1',1698284664,_binary '__ci_last_regenerate|i:1698284664;username|s:5:\"admin\";role|s:5:\"admin\";'),('jei6gci0msgdb29g5kminergl7k0q0jb','127.0.0.1',1698285012,_binary '__ci_last_regenerate|i:1698285012;username|s:5:\"admin\";role|s:5:\"admin\";'),('o33mojihg5ckaoe7ligupv5je9eke62c','127.0.0.1',1698285379,_binary '__ci_last_regenerate|i:1698285379;username|s:5:\"admin\";role|s:5:\"admin\";'),('dnr33h6i384qfk043d1v7r9v3jbcoeb3','127.0.0.1',1698285687,_binary '__ci_last_regenerate|i:1698285687;username|s:5:\"admin\";role|s:5:\"admin\";'),('dbg96j1adhcnj68i5uk3nb54fdujrqfq','127.0.0.1',1698286009,_binary '__ci_last_regenerate|i:1698286009;username|s:5:\"admin\";role|s:5:\"admin\";'),('d1k3ek8pqus145nsig7k2u2k0dasj5ee','127.0.0.1',1698286403,_binary '__ci_last_regenerate|i:1698286403;username|s:5:\"admin\";role|s:5:\"admin\";message|s:15:\"billing Updated\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('tcf11mp9o6d62pr8g0e3g8a5p399a577','127.0.0.1',1698286949,_binary '__ci_last_regenerate|i:1698286949;username|s:5:\"admin\";role|s:5:\"admin\";'),('vrlec5p3m7ochd9mdr5ok7ov2r21afno','127.0.0.1',1698287860,_binary '__ci_last_regenerate|i:1698287860;username|s:5:\"admin\";role|s:5:\"admin\";'),('r14idj4v1b4sacsp3tmbltvif3njliuv','127.0.0.1',1698288459,_binary '__ci_last_regenerate|i:1698288459;username|s:5:\"admin\";role|s:5:\"admin\";'),('s70u07ur1cas6ku2287kbo7r7n9t6359','127.0.0.1',1698289043,_binary '__ci_last_regenerate|i:1698289043;username|s:5:\"admin\";role|s:5:\"admin\";message|s:15:\"voucher Updated\";__ci_vars|a:1:{s:7:\"message\";s:3:\"old\";}'),('0ld15a19f1sjr551iej26vhqh2bu73ga','127.0.0.1',1698289425,_binary '__ci_last_regenerate|i:1698289425;username|s:5:\"admin\";role|s:5:\"admin\";'),('bos4gjlfn83f0nctda0e939jgs9pnh2a','127.0.0.1',1698289822,_binary '__ci_last_regenerate|i:1698289822;username|s:5:\"admin\";role|s:5:\"admin\";'),('6pd522rqdvn6f9bcibma97j4np3fe718','127.0.0.1',1698290155,_binary '__ci_last_regenerate|i:1698290155;username|s:5:\"admin\";role|s:5:\"admin\";'),('2vqsam1ufi9d6bvcgfb7cqbkk5016lcg','127.0.0.1',1698290462,_binary '__ci_last_regenerate|i:1698290462;username|s:5:\"admin\";role|s:5:\"admin\";'),('hrb3da6j4vpfr1v9km73u397t03cqulj','127.0.0.1',1698290497,_binary '__ci_last_regenerate|i:1698290471;username|s:4:\"user\";role|s:4:\"user\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('MTX001','Customer 1','812123441234','customer1@mail.com'),('MTX002','Customer 2','812123441235','customer1@mail.com'),('MTX003','Customer 3','812123441236','customer1@mail.com'),('MTX004','Customer 4','812123441237','customer1@mail.com'),('MTX005','Customer 5','812123441238','customer1@mail.com'),('MTX006','Customer 6','812123441239','customer1@mail.com'),('MTX007','Customer 7','812123441240','customer1@mail.com'),('MTX008','Customer 8','812123441241','customer1@mail.com'),('MTX009','Customer 9','812123441242','customer1@mail.com'),('MTX010','Customer 10','812123441243','customer1@mail.com'),('MTX011','Customer 11','812123441244','customer1@mail.com'),('MTX012','Customer 12','812123441245','customer1@mail.com'),('MTX013','Customer 13','812123441246','customer1@mail.com');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'2023-10-24 23:43:03','admin logged in',NULL),(2,'2023-10-24 23:46:42','admin imported 12 partners',NULL),(3,'2023-10-24 23:51:15','admin imported 12 partners',NULL),(4,'2023-10-24 23:53:46','admin inserted 1 partner','{\"id\":\"\",\"name\":\"Palmer Bright\",\"product\":\"Debitis blanditiis e\"}'),(5,'2023-10-24 23:53:55','admin deleted partner 25','{\"id\":\"25\",\"product\":\"Debitis blanditiis e\",\"name\":\"Palmer Bright\"}'),(6,'2023-10-24 23:54:01','admin inserted 1 partner','{\"id\":\"\",\"name\":\"Uta Kirk\",\"product\":\"Nostrum in proident\"}'),(7,'2023-10-24 23:54:09','admin updated 1 partner','{\"id\":\"26\",\"name\":\"Bruno Flores\",\"product\":\"Totam mollit iste do\"}'),(8,'2023-10-24 23:56:04','admin deleted partner 26','{\"id\":\"26\",\"product\":\"Totam mollit iste do\",\"name\":\"Bruno Flores\"}'),(9,'2023-10-25 00:02:02','admin imported 2 vouchers','[{\"code\":\"VCR001\",\"partner_id\":\"13\",\"status\":\"available\"},{\"code\":\"VCR002\",\"partner_id\":\"21\",\"status\":\"available\"}]'),(10,'2023-10-25 00:06:20','admin imported 3 customers','[{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":\"1\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":\"2\"},{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":null}]'),(11,'2023-10-25 00:12:07','admin deleted 2 vouchers','[{\"id\":\"1\",\"code\":\"VCR001\",\"partner_id\":\"13\",\"status\":\"active\"},{\"id\":\"2\",\"code\":\"VCR002\",\"partner_id\":\"21\",\"status\":\"sent\"}]'),(12,'2023-10-25 00:12:18','admin deleted 3 customers','[{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":null},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":null},{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441234\",\"email\":\"customer@mail.com\",\"package\":\"100\",\"voucher_id\":null}]'),(13,'2023-10-25 00:12:26','admin deleted 10 partners','[{\"id\":\"13\",\"product\":\"HB CP+ LITE TESTING\",\"name\":\"CP+\"},{\"id\":\"14\",\"product\":\"HB CP+ LITE\",\"name\":\"CP+\"},{\"id\":\"15\",\"product\":\"SB CP+ MOVIE LOVER TESTING\",\"name\":\"CP+\"},{\"id\":\"16\",\"product\":\"SB CP+ MOVIE LOVER\",\"name\":\"CP+\"},{\"id\":\"17\",\"product\":\"SB CP+ TVOD (Single Rental) and TVOD MULTI-PACK (testing)\",\"name\":\"CP+\"},{\"id\":\"18\",\"product\":\"CP+ TVOD (Single Rental) and TVOD MULTI-PACK\",\"name\":\"CP+\"},{\"id\":\"19\",\"product\":\"CP+ Premium VOD (PVOD) (testing)\",\"name\":\"CP+\"},{\"id\":\"20\",\"product\":\"CP+ Premium VOD (PVOD)\",\"name\":\"CP+\"},{\"id\":\"21\",\"product\":\"SB - HIFI\\u2019s Entertainment package (Bundling Package) \\u2013 30 days voucher TESTING\",\"name\":\"VIU\"},{\"id\":\"22\",\"product\":\"SB - HIFI\\u2019s Entertainment package (Bundling Package) \\u2013 30 days voucher\",\"name\":\"VIU\"}]'),(14,'2023-10-25 00:12:33','admin deleted 2 partners','[{\"id\":\"23\",\"product\":\"SB - Service as a standalone product - 30 days voucher TESTING\",\"name\":\"VIU\"},{\"id\":\"24\",\"product\":\"SB - Service as a standalone product - 30 days voucher\",\"name\":\"VIU\"}]'),(15,'2023-10-25 00:13:02','admin imported 12 partners',NULL),(16,'2023-10-25 00:13:08','admin imported 12 vouchers','[{\"code\":\"VCR001\",\"partner_id\":\"27\",\"status\":\"available\"},{\"code\":\"VCR002\",\"partner_id\":\"28\",\"status\":\"available\"},{\"code\":\"VCR003\",\"partner_id\":\"29\",\"status\":\"available\"},{\"code\":\"VCR004\",\"partner_id\":\"30\",\"status\":\"available\"},{\"code\":\"VCR005\",\"partner_id\":\"31\",\"status\":\"available\"},{\"code\":\"VCR006\",\"partner_id\":\"32\",\"status\":\"available\"},{\"code\":\"VCR007\",\"partner_id\":\"33\",\"status\":\"available\"},{\"code\":\"VCR008\",\"partner_id\":\"34\",\"status\":\"available\"},{\"code\":\"VCR009\",\"partner_id\":\"35\",\"status\":\"available\"},{\"code\":\"VCR010\",\"partner_id\":\"36\",\"status\":\"available\"},{\"code\":\"VCR011\",\"partner_id\":\"37\",\"status\":\"available\"},{\"code\":\"VCR012\",\"partner_id\":\"38\",\"status\":\"available\"}]'),(17,'2023-10-25 00:14:49','admin imported 13 customers','[{\"id\":\"MTX001\",\"name\":\"Customer 1\",\"phone\":\"812123441234\",\"email\":\"customer1@mail.com\",\"package\":\"100 mb\",\"voucher_id\":\"3\"},{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441235\",\"email\":\"customer1@mail.com\",\"package\":\"101 mb\",\"voucher_id\":\"4\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441236\",\"email\":\"customer1@mail.com\",\"package\":\"102 mb\",\"voucher_id\":\"5\"},{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441237\",\"email\":\"customer1@mail.com\",\"package\":\"103 mb\",\"voucher_id\":\"6\"},{\"id\":\"MTX005\",\"name\":\"Customer 5\",\"phone\":\"812123441238\",\"email\":\"customer1@mail.com\",\"package\":\"104 mb\",\"voucher_id\":\"7\"},{\"id\":\"MTX006\",\"name\":\"Customer 6\",\"phone\":\"812123441239\",\"email\":\"customer1@mail.com\",\"package\":\"105 mb\",\"voucher_id\":\"8\"},{\"id\":\"MTX007\",\"name\":\"Customer 7\",\"phone\":\"812123441240\",\"email\":\"customer1@mail.com\",\"package\":\"106 mb\",\"voucher_id\":\"9\"},{\"id\":\"MTX008\",\"name\":\"Customer 8\",\"phone\":\"812123441241\",\"email\":\"customer1@mail.com\",\"package\":\"107 mb\",\"voucher_id\":\"10\"},{\"id\":\"MTX009\",\"name\":\"Customer 9\",\"phone\":\"812123441242\",\"email\":\"customer1@mail.com\",\"package\":\"108 mb\",\"voucher_id\":\"11\"},{\"id\":\"MTX010\",\"name\":\"Customer 10\",\"phone\":\"812123441243\",\"email\":\"customer1@mail.com\",\"package\":\"109 mb\",\"voucher_id\":\"12\"},{\"id\":\"MTX011\",\"name\":\"Customer 11\",\"phone\":\"812123441244\",\"email\":\"customer1@mail.com\",\"package\":\"110 mb\",\"voucher_id\":\"13\"},{\"id\":\"MTX012\",\"name\":\"Customer 12\",\"phone\":\"812123441245\",\"email\":\"customer1@mail.com\",\"package\":\"111 mb\",\"voucher_id\":\"14\"},{\"id\":\"MTX013\",\"name\":\"Customer 13\",\"phone\":\"812123441246\",\"email\":\"customer1@mail.com\",\"package\":\"112 mb\",\"voucher_id\":null}]'),(18,'2023-10-25 01:35:54','admin logged out',NULL),(19,'2023-10-26 00:52:01','admin logged in',NULL),(20,'2023-10-26 01:38:27','admin inserted 1 customer','{\"id\":\"9862995288755791\",\"name\":\"Reese Mcgowan\",\"email\":\"widutiwo@mailinator.com\",\"phone\":\"6299676132101\"}'),(21,'2023-10-26 01:39:29','admin updated 1 customer','{\"id\":\"9862995288755791\",\"name\":\"Cole Navarro\",\"email\":\"mokutosuv@mailinator.com\",\"phone\":\"6278511617175\"}'),(22,'2023-10-26 01:39:38','admin updated 1 customer','{\"id\":\"9862995288755791\",\"name\":\"Melodie Heath\",\"email\":\"wobag@mailinator.com\",\"phone\":\"6273754379753\"}'),(23,'2023-10-26 01:39:44','admin deleted customer 9862995288755791','{\"id\":\"9862995288755791\",\"name\":\"Melodie Heath\",\"phone\":\"6273754379753\",\"email\":\"wobag@mailinator.com\"}'),(24,'2023-10-26 01:40:49','admin inserted 1 customer','{\"id\":\"7172949869843644\",\"name\":\"Adrienne Webb\",\"email\":\"dudaqu@mailinator.com\",\"phone\":\"6280564586321\"}'),(25,'2023-10-26 01:40:53','admin deleted customer 7172949869843644','{\"id\":\"7172949869843644\",\"name\":\"Adrienne Webb\",\"phone\":\"6280564586321\",\"email\":\"dudaqu@mailinator.com\"}'),(26,'2023-10-26 01:44:24','admin deleted 10 customers','[{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441237\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX005\",\"name\":\"Customer 5\",\"phone\":\"812123441238\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX006\",\"name\":\"Customer 6\",\"phone\":\"812123441239\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX007\",\"name\":\"Customer 7\",\"phone\":\"812123441240\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX008\",\"name\":\"Customer 8\",\"phone\":\"812123441241\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX009\",\"name\":\"Customer 9\",\"phone\":\"812123441242\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX010\",\"name\":\"Customer 10\",\"phone\":\"812123441243\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX011\",\"name\":\"Customer 11\",\"phone\":\"812123441244\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX012\",\"name\":\"Customer 12\",\"phone\":\"812123441245\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX013\",\"name\":\"Customer 13\",\"phone\":\"812123441246\",\"email\":\"customer1@mail.com\"}]'),(27,'2023-10-26 01:44:58','admin deleted 3 customers','[{\"id\":\"MTX001\",\"name\":\"Customer 1\",\"phone\":\"812123441234\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441235\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441236\",\"email\":\"customer1@mail.com\"}]'),(28,'2023-10-26 01:45:53','admin imported 13 customers','[{\"id\":\"MTX001\",\"name\":\"Customer 1\",\"phone\":\"812123441234\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441235\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441236\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441237\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX005\",\"name\":\"Customer 5\",\"phone\":\"812123441238\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX006\",\"name\":\"Customer 6\",\"phone\":\"812123441239\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX007\",\"name\":\"Customer 7\",\"phone\":\"812123441240\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX008\",\"name\":\"Customer 8\",\"phone\":\"812123441241\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX009\",\"name\":\"Customer 9\",\"phone\":\"812123441242\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX010\",\"name\":\"Customer 10\",\"phone\":\"812123441243\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX011\",\"name\":\"Customer 11\",\"phone\":\"812123441244\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX012\",\"name\":\"Customer 12\",\"phone\":\"812123441245\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX013\",\"name\":\"Customer 13\",\"phone\":\"812123441246\",\"email\":\"customer1@mail.com\"}]'),(29,'2023-10-26 01:46:56','admin deleted 10 customers','[{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441237\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX005\",\"name\":\"Customer 5\",\"phone\":\"812123441238\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX006\",\"name\":\"Customer 6\",\"phone\":\"812123441239\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX007\",\"name\":\"Customer 7\",\"phone\":\"812123441240\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX008\",\"name\":\"Customer 8\",\"phone\":\"812123441241\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX009\",\"name\":\"Customer 9\",\"phone\":\"812123441242\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX010\",\"name\":\"Customer 10\",\"phone\":\"812123441243\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX011\",\"name\":\"Customer 11\",\"phone\":\"812123441244\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX012\",\"name\":\"Customer 12\",\"phone\":\"812123441245\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX013\",\"name\":\"Customer 13\",\"phone\":\"812123441246\",\"email\":\"customer1@mail.com\"}]'),(30,'2023-10-26 01:47:03','admin deleted 3 customers','[{\"id\":\"MTX001\",\"name\":\"Customer 1\",\"phone\":\"812123441234\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441235\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441236\",\"email\":\"customer1@mail.com\"}]'),(31,'2023-10-26 01:47:11','admin imported 13 customers','[{\"id\":\"MTX001\",\"name\":\"Customer 1\",\"phone\":\"812123441234\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX002\",\"name\":\"Customer 2\",\"phone\":\"812123441235\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX003\",\"name\":\"Customer 3\",\"phone\":\"812123441236\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX004\",\"name\":\"Customer 4\",\"phone\":\"812123441237\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX005\",\"name\":\"Customer 5\",\"phone\":\"812123441238\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX006\",\"name\":\"Customer 6\",\"phone\":\"812123441239\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX007\",\"name\":\"Customer 7\",\"phone\":\"812123441240\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX008\",\"name\":\"Customer 8\",\"phone\":\"812123441241\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX009\",\"name\":\"Customer 9\",\"phone\":\"812123441242\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX010\",\"name\":\"Customer 10\",\"phone\":\"812123441243\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX011\",\"name\":\"Customer 11\",\"phone\":\"812123441244\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX012\",\"name\":\"Customer 12\",\"phone\":\"812123441245\",\"email\":\"customer1@mail.com\"},{\"id\":\"MTX013\",\"name\":\"Customer 13\",\"phone\":\"812123441246\",\"email\":\"customer1@mail.com\"}]'),(32,'2023-10-26 02:06:49','admin inserted 1 billing','{\"id\":\"5453419525159536\",\"customer_id\":\"MTX010\",\"package\":\"Aut omnis cupiditate\"}'),(33,'2023-10-26 02:07:31','admin updated 1 billing','{\"id\":\"5453419525159536\",\"customer_id\":\"MTX006\",\"package\":\"Recusandae Impedit\"}'),(34,'2023-10-26 02:14:59','admin deleted billing 5453419525159536','{\"id\":\"5453419525159536\",\"customer_id\":\"MTX006\",\"package\":\"Recusandae Impedit\"}'),(35,'2023-10-26 02:17:18','admin deleted 3 billings','[{\"id\":\"00101\",\"customer_id\":\"MTX001\",\"package\":\"100 mbps\"},{\"id\":\"00102\",\"customer_id\":\"MTX001\",\"package\":\"200 mbps\"},{\"id\":\"00201\",\"customer_id\":\"MTX002\",\"package\":\"200 mbps\"}]'),(36,'2023-10-26 02:23:27','admin imported 13 billings',NULL),(37,'2023-10-26 02:24:22','admin deleted 10 billings','[{\"id\":\"1001004\",\"customer_id\":\"MTX001\",\"package\":null},{\"id\":\"1001005\",\"customer_id\":\"MTX001\",\"package\":null},{\"id\":\"1001006\",\"customer_id\":\"MTX001\",\"package\":null},{\"id\":\"1002001\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002002\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002003\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002004\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002005\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002006\",\"customer_id\":\"MTX002\",\"package\":null},{\"id\":\"1002007\",\"customer_id\":\"MTX002\",\"package\":null}]'),(38,'2023-10-26 02:24:26','admin deleted 3 billings','[{\"id\":\"1001001\",\"customer_id\":\"MTX001\",\"package\":null},{\"id\":\"1001002\",\"customer_id\":\"MTX001\",\"package\":null},{\"id\":\"1001003\",\"customer_id\":\"MTX001\",\"package\":null}]'),(39,'2023-10-26 02:24:33','admin imported 13 billings',NULL),(40,'2023-10-26 02:47:39','admin inserted 1 voucher','{\"code\":\"4232354671224261\",\"partner_id\":null,\"billing_id\":\"1001006\",\"status\":\"available\"}'),(41,'2023-10-26 02:47:55','admin inserted 1 voucher','{\"code\":\"4872628178688153\",\"partner_id\":null,\"billing_id\":\"1002004\",\"status\":\"sent\"}'),(42,'2023-10-26 02:51:24','admin inserted 1 voucher','{\"code\":\"5518237755961343\",\"partner_id\":\"33\",\"billing_id\":\"1002003\",\"status\":\"suspend\"}'),(43,'2023-10-26 02:51:39','admin updated 1 voucher','{\"code\":\"5518237755961343\",\"partner_id\":\"35\",\"billing_id\":\"1001005\",\"status\":\"active\"}'),(44,'2023-10-26 02:57:23','admin deleted voucher 17','{\"id\":\"17\",\"code\":\"5518237755961343\",\"partner_id\":\"35\",\"status\":\"active\",\"billing_id\":\"1001005\"}'),(45,'2023-10-26 02:57:32','admin inserted 1 voucher','{\"code\":\"8713142368824853\",\"partner_id\":\"30\",\"billing_id\":\"1002007\",\"status\":\"active\"}'),(46,'2023-10-26 02:57:37','admin inserted 1 voucher','{\"code\":\"2928811617145777\",\"partner_id\":\"31\",\"billing_id\":\"1002007\",\"status\":\"active\"}'),(47,'2023-10-26 02:57:55','admin deleted 2 vouchers','[{\"id\":\"18\",\"code\":\"8713142368824853\",\"partner_id\":\"30\",\"status\":\"active\",\"billing_id\":\"1002007\"},{\"id\":\"19\",\"code\":\"2928811617145777\",\"partner_id\":\"31\",\"status\":\"active\",\"billing_id\":\"1002007\"}]'),(48,'2023-10-26 03:03:51','admin deleted 10 vouchers','[{\"id\":\"5\",\"code\":\"VCR003\",\"partner_id\":\"29\",\"status\":\"redeem\",\"billing_id\":\"00101\"},{\"id\":\"6\",\"code\":\"VCR004\",\"partner_id\":\"30\",\"status\":\"suspend\",\"billing_id\":\"00201\"},{\"id\":\"7\",\"code\":\"VCR005\",\"partner_id\":\"31\",\"status\":\"terminate\",\"billing_id\":\"00101\"},{\"id\":\"8\",\"code\":\"VCR006\",\"partner_id\":\"32\",\"status\":\"inactive\",\"billing_id\":\"00101\"},{\"id\":\"9\",\"code\":\"VCR007\",\"partner_id\":\"33\",\"status\":\"active\",\"billing_id\":\"00102\"},{\"id\":\"10\",\"code\":\"VCR008\",\"partner_id\":\"34\",\"status\":\"sent\",\"billing_id\":\"00101\"},{\"id\":\"11\",\"code\":\"VCR009\",\"partner_id\":\"35\",\"status\":\"redeem\",\"billing_id\":\"00101\"},{\"id\":\"12\",\"code\":\"VCR010\",\"partner_id\":\"36\",\"status\":\"suspend\",\"billing_id\":\"00101\"},{\"id\":\"13\",\"code\":\"VCR011\",\"partner_id\":\"37\",\"status\":\"terminate\",\"billing_id\":\"00101\"},{\"id\":\"14\",\"code\":\"VCR012\",\"partner_id\":\"38\",\"status\":\"available\",\"billing_id\":\"\"}]'),(49,'2023-10-26 03:03:55','admin deleted 2 vouchers','[{\"id\":\"3\",\"code\":\"VCR001\",\"partner_id\":\"27\",\"status\":\"active\",\"billing_id\":\"00101\"},{\"id\":\"4\",\"code\":\"VCR002\",\"partner_id\":\"28\",\"status\":\"sent\",\"billing_id\":\"00102\"}]'),(50,'2023-10-26 03:04:02','admin imported 12 vouchers',NULL),(51,'2023-10-26 03:06:01','admin deleted 10 vouchers','[{\"id\":\"22\",\"code\":\"VCR003\",\"partner_id\":\"29\",\"status\":\"terminate\",\"billing_id\":\"MTX001\"},{\"id\":\"23\",\"code\":\"VCR004\",\"partner_id\":\"30\",\"status\":\"redeem\",\"billing_id\":\"MTX001\"},{\"id\":\"24\",\"code\":\"VCR005\",\"partner_id\":\"31\",\"status\":\"inactive\",\"billing_id\":\"MTX001\"},{\"id\":\"25\",\"code\":\"VCR006\",\"partner_id\":\"32\",\"status\":\"suspend\",\"billing_id\":\"MTX001\"},{\"id\":\"26\",\"code\":\"VCR007\",\"partner_id\":\"33\",\"status\":\"available\",\"billing_id\":\"\"},{\"id\":\"27\",\"code\":\"VCR008\",\"partner_id\":\"34\",\"status\":\"active\",\"billing_id\":\"MTX002\"},{\"id\":\"28\",\"code\":\"VCR009\",\"partner_id\":\"35\",\"status\":\"redeem\",\"billing_id\":\"MTX002\"},{\"id\":\"29\",\"code\":\"VCR010\",\"partner_id\":\"36\",\"status\":\"suspend\",\"billing_id\":\"MTX002\"},{\"id\":\"30\",\"code\":\"VCR011\",\"partner_id\":\"37\",\"status\":\"inactive\",\"billing_id\":\"MTX002\"},{\"id\":\"31\",\"code\":\"VCR012\",\"partner_id\":\"38\",\"status\":\"terminate\",\"billing_id\":\"MTX002\"}]'),(52,'2023-10-26 03:06:05','admin deleted 2 vouchers','[{\"id\":\"20\",\"code\":\"VCR001\",\"partner_id\":\"27\",\"status\":\"available\",\"billing_id\":\"\"},{\"id\":\"21\",\"code\":\"VCR002\",\"partner_id\":\"28\",\"status\":\"active\",\"billing_id\":\"MTX001\"}]'),(53,'2023-10-26 03:07:35','admin imported 12 vouchers',NULL),(54,'2023-10-26 03:21:11','admin logged out',NULL),(55,'2023-10-26 03:21:19','user logged in',NULL);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (27,'HB CP+ LITE TESTING','CP+'),(28,'HB CP+ LITE','CP+'),(29,'SB CP+ MOVIE LOVER TESTING','CP+'),(30,'SB CP+ MOVIE LOVER','CP+'),(31,'SB CP+ TVOD (Single Rental) and TVOD MULTI-PACK (testing)','CP+'),(32,'CP+ TVOD (Single Rental) and TVOD MULTI-PACK','CP+'),(33,'CP+ Premium VOD (PVOD) (testing)','CP+'),(34,'CP+ Premium VOD (PVOD)','CP+'),(35,'SB - HIFI’s Entertainment package (Bundling Package) – 30 days voucher TESTING','VIU'),(36,'SB - HIFI’s Entertainment package (Bundling Package) – 30 days voucher','VIU'),(37,'SB - Service as a standalone product - 30 days voucher TESTING','VIU'),(38,'SB - Service as a standalone product - 30 days voucher','VIU');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `username` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','secret','admin'),('user','secret','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vouchers`
--

DROP TABLE IF EXISTS `vouchers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vouchers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `partner_id` bigint unsigned NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'tersedia',
  `billing_id` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vouchers_un` (`code`),
  KEY `partners_FK` (`partner_id`),
  CONSTRAINT `partners_FK` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vouchers`
--

LOCK TABLES `vouchers` WRITE;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
INSERT INTO `vouchers` VALUES (32,'VCR001',27,'available',''),(33,'VCR002',28,'active','1001002'),(34,'VCR003',29,'terminate','1001003'),(35,'VCR004',30,'redeem','1001004'),(36,'VCR005',31,'inactive','1001005'),(37,'VCR006',32,'suspend','1001006'),(38,'VCR007',33,'available',''),(39,'VCR008',34,'active','1002002'),(40,'VCR009',35,'redeem','1002003'),(41,'VCR010',36,'suspend','1002004'),(42,'VCR011',37,'inactive','1002005'),(43,'VCR012',38,'terminate','1002006');
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'voucher'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-26 10:21:59
