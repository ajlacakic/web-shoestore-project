-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: shoestore
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `men_shoes`
--

DROP TABLE IF EXISTS `men_shoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `men_shoes` (
  `shoe_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `image_url1` varchar(255) NOT NULL,
  `image_url2` varchar(255) NOT NULL,
  PRIMARY KEY (`shoe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `men_shoes`
--

LOCK TABLES `men_shoes` WRITE;
/*!40000 ALTER TABLE `men_shoes` DISABLE KEYS */;
INSERT INTO `men_shoes` VALUES (9,'NIKE DEFYALLDAY',93.50,'43,44','https://www.nsport.ba/UserFiles/products/big/08/15/muske-patike-nike-defyallday-DJ1196-001.jpg','https://www.nsport.ba/UserFiles/products/big/08/15/muske-patike-nike-defyallday-DJ1196-001-3.jpg'),(10,'NIKE DEFYALLDAY WHITE',83.50,'43','https://www.nsport.ba/UserFiles/products/big/11/09/muske-patike-nike-defyallday-DJ1196-101.png','https://www.nsport.ba/UserFiles/products/big/11/09/muske-patike-nike-defyallday-DJ1196-101-3.png'),(11,'REEBOK NANOFLEX ADVENTURE TR',107.10,'43','https://www.nsport.ba/UserFiles/products/big/05/15/muske-patike-reebok-nanoflex-adventure-tr-HP9231.jpg','https://www.nsport.ba/UserFiles/products/big/05/15/muske-patike-reebok-nanoflex-adventure-tr-HP9231-3.jpg'),(12,'REEBOK NFX TRAINER',145.80,'43','https://www.nsport.ba/UserFiles/products/big/05/15/zenske-patike-reebok-nfx-trainer-IE2110.jpg','https://www.nsport.ba/UserFiles/products/big/05/15/zenske-patike-reebok-nfx-trainer-IE2110-3.jpg'),(13,'NIKE M AIR MAX ALPHA TRAINER 6',123.60,'43','https://www.nsport.ba/UserFiles/products/big/10/11/muske-patike-nike-m-air-max-alpha-trainer-6-DM0829-001.jpg','https://www.nsport.ba/UserFiles/products/big/10/11/muske-patike-nike-m-air-max-alpha-trainer-6-DM0829-001-3.png'),(14,'NIKE M AIR MAX ALPHA TRAINER 5',135.50,'43','https://www.nsport.ba/UserFiles/products/big/12/19/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-301.jpg','https://www.nsport.ba/UserFiles/products/big/12/19/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-301-3.jpg'),(15,'NIKE M AIR MAX ALPHA TRAINER 5 GREY',107.10,'43','https://www.nsport.ba/UserFiles/products/big/03/19/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-013.jpg','https://www.nsport.ba/UserFiles/products/big/03/19/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-013-3.jpg'),(16,'NIKE M AIR MAX ALPHA TRAINER 5 RED',145.80,'43','https://www.nsport.ba/UserFiles/products/big/09/25/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-200.jpg','https://www.nsport.ba/UserFiles/products/big/09/25/muske-patike-nike-m-air-max-alpha-trainer-5-DM0829-200-3.jpg'),(17,'PUMA BMW MMS TRC BLAZE',63.50,'42','https://www.nsport.ba/UserFiles/products/big/01/16/muske-patike-puma-bmw-mms-trc-blaze-307135-02.jpg','https://www.nsport.ba/UserFiles/products/big/01/16/muske-patike-puma-bmw-mms-trc-blaze-307135-02-3.jpg'),(18,'PUMA CAVEN DIME',103.50,'42','https://www.nsport.ba/UserFiles/products/big/03/01/muske-patike-puma-caven-dime-384953-16.png','https://www.nsport.ba/UserFiles/products/big/03/01/muske-patike-puma-caven-dime-384953-16-3.png'),(19,'ADIDAS MIDCITY LOW',107.10,'42','https://www.nsport.ba/UserFiles/products/big/08/21/muske-patike-adidas-midcity-low-IE4518.jpg','https://www.nsport.ba/UserFiles/products/big/08/21/muske-patike-adidas-midcity-low-IE4518-3.jpg'),(20,'ADIDAS OZWEEGO',145.80,'42','https://www.nsport.ba/UserFiles/products/big/08/15/muske-patike-adidas-ozweego-EE6461.jpg','https://www.nsport.ba/UserFiles/products/big/08/15/muske-patike-adidas-ozweego-EE6461-4.jpg'),(21,'NIKE AIR MAX SC',123.60,'42','https://www.nsport.ba/UserFiles/products/big/12/30/djecije-patike-nike-air-max-bolt-CW1626-001.jpg','https://www.nsport.ba/UserFiles/products/big/12/30/djecije-patike-nike-air-max-bolt-CW1626-001-3.jpg'),(22,'NIKE COURT VISION LO BE',135.50,'42','https://www.nsport.ba/UserFiles/products/big/12/19/zenske-patike-nike-w-court-vision-lo-nn-DH3158-601.png','https://www.nsport.ba/UserFiles/products/big/12/19/zenske-patike-nike-w-court-vision-lo-nn-DH3158-601-3.jpg'),(23,'TOMMY HILFIGER BASKET CORE LTH MIX ESS',107.10,'42','https://www.nsport.ba/UserFiles/products/big/01/29/muske-patike-tommy-hilfiger-basket-core-lth-mix-ess-FM0FM05058-YBS.jpg','https://www.nsport.ba/UserFiles/products/big/01/29/muske-patike-tommy-hilfiger-basket-core-lth-mix-ess-FM0FM05058-YBS-3.jpg'),(24,'TOMMY HILFIGER ICONIC SOCK RUNNER',145.80,'42','https://www.nsport.ba/UserFiles/products/big/12/12/muske-patike-tommy-hilfiger-iconic-sock-runner-m-FM0FM04137-DW5.jpg','https://www.nsport.ba/UserFiles/products/big/12/12/muske-patike-tommy-hilfiger-iconic-sock-runner-m-FM0FM04137-DW5-3.jpg');
/*!40000 ALTER TABLE `men_shoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-23  2:35:51
