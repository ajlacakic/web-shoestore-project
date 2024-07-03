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
-- Table structure for table `kids_shoes`
--

DROP TABLE IF EXISTS `kids_shoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kids_shoes` (
  `shoe_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` int(11) NOT NULL,
  `image_url1` varchar(255) DEFAULT NULL,
  `image_url2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shoe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kids_shoes`
--

LOCK TABLES `kids_shoes` WRITE;
/*!40000 ALTER TABLE `kids_shoes` DISABLE KEYS */;
INSERT INTO `kids_shoes` VALUES (1,'PUMA CA PRO MIX MTCH PS',93.50,27,'images/kl1.jpg','images/kl11.jpg'),(2,'PUMA CARINA 2.0 MERMAID V INF',83.50,27,'images/kl2.jpg','images/kl22.jpg'),(3,'PUMA CARINA 2.0 SPONGEBOB V INF',107.10,27,'images/kl3.jpg','images/kl33.jpg'),(4,'PUMA RS-X DREAMY JR',145.80,27,'images/kl4.jpg','images/kl44.jpg'),(5,'ADIDAS ADVANTAGE MOANA K',123.60,27,'images/kl5.jpg','images/kl55.jpg'),(6,'ADIDAS BREAKNET MICKEY CF',135.50,27,'images/kl6.jpg','images/kl66.jpg'),(7,'ADIDAS BREAKNET 2.0 EL K',107.10,27,'images/kl7.jpg','images/kl77.jpg'),(8,'ADIDAS OZWEEGO J',145.80,27,'images/kl8.jpg','images/kl88.png'),(33,'PUMA MULTIFLEX SL V INF',93.50,27,'images/ks1.jpg','images/ks11.jpg'),(34,'PUMA RS-X? TWILL AIRMESH JR',83.50,27,'images/ks2.jpg','images/ks22.jpg'),(35,'PUMA STEPFLEEX 2 SL VE GLITZ FS V INF',107.10,27,'images/ks3.jpg','images/ks33.jpg'),(36,'PUMA X-RAY SPEED MID WTR JR',145.80,27,'images/ks4.jpg','images/ks44.jpg'),(37,'PUMA X-RAY SPEED MID WTR JR',123.60,27,'images/ks5.jpg','images/ks55.jpg'),(38,'PUMA X-RAY AC PS',135.50,27,'images/ks6.jpg','images/ks66.jpg'),(39,'ADIDAS FORTARUN 2.0 EL I',107.10,27,'images/ks7.jpg','images/ks77.jpg'),(40,'ADIDAS FORTARUN 2.0 MICKEY EL I',145.80,27,'images/ks8.jpg','images/ks88.jpg');
/*!40000 ALTER TABLE `kids_shoes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-23  2:35:52
