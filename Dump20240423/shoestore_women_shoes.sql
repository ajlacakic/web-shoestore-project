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
-- Table structure for table `women_shoes`
--

DROP TABLE IF EXISTS `women_shoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `women_shoes` (
  `shoe_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` int(11) NOT NULL,
  `image_url1` varchar(255) DEFAULT NULL,
  `image_url2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`shoe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `women_shoes`
--

LOCK TABLES `women_shoes` WRITE;
/*!40000 ALTER TABLE `women_shoes` DISABLE KEYS */;
INSERT INTO `women_shoes` VALUES (25,'PUMA CARINA L',93.50,38,'https://www.nsport.ba/UserFiles/products/big/06/21/zenske-patike-puma-carina-l-370325-01.jpg','https://www.nsport.ba/UserFiles/products/big/06/21/zenske-patike-puma-carina-l-370325-01-3.jpg'),(26,'PUMA CASSIA SL',83.50,38,'https://www.nsport.ba/UserFiles/products/big/09/18/muske-patike-puma-caven-380810-21.jpg','https://www.nsport.ba/UserFiles/products/big/09/18/muske-patike-puma-caven-380810-21-3.jpg'),(27,'PUMA CASSIA VIA ANIMAL',107.10,38,'https://www.nsport.ba/UserFiles/products/big/04/11/zenske-patike-puma-cassia-via-animal-391945-01.jpg','https://www.nsport.ba/UserFiles/products/big/04/11/zenske-patike-puma-cassia-via-animal-391945-01-3.jpg'),(28,'GUESS BECKIE',145.80,38,'https://www.nsport.ba/UserFiles/products/big/12/05/zenske-patike-guess-beckie-FL5BEKFAL-WHITE.jpg','https://www.nsport.ba/UserFiles/products/big/12/05/zenske-patike-guess-beckie-FL5BEKFAL-WHITE-3.jpg'),(29,'GUESS CLARKZ2 - POLY',123.60,38,'https://www.nsport.ba/UserFiles/products/big/02/19/zenske-patike-guess-clarkz-sneaker-cupsole-low-FLPCLKFAL-WHITE.jpg','https://www.nsport.ba/UserFiles/products/big/02/19/zenske-patike-guess-clarkz-sneaker-cupsole-low-FLPCLKFAL-WHITE-3.jpg'),(30,'GUESS SNEAKER CUPSOLE LOW',135.50,38,'https://www.nsport.ba/UserFiles/products/big/02/19/zenske-patike-guess-gianele-sneaker-cupsole-low-FLPGN4FAL-BLACK.jpg','https://www.nsport.ba/UserFiles/products/big/02/19/zenske-patike-guess-gianele-sneaker-cupsole-low-FLPGN4FAL-BLACK-3.jpg'),(31,'NIKE COURT VISION LO NN',107.10,38,'https://www.nsport.ba/UserFiles/products/big/11/09/zenske-patike-nike-w-nike-court-vision-alta-ltr-DM0113-002.jpg','https://www.nsport.ba/UserFiles/products/big/11/09/zenske-patike-nike-w-nike-court-vision-alta-ltr-DM0113-002.jpg'),(32,'GUESS VIBO SNEAKER CUPSOLE LOW',145.80,38,'https://www.nsport.ba/UserFiles/products/big/02/27/zenske-patike-guess-vibo---leather-FL8VIBLEA-WHIBR.jpg','https://www.nsport.ba/UserFiles/products/big/02/27/zenske-patike-guess-vibo---leather-FL8VIBLEA-WHIBR-3.jpg'),(41,'PUMA PROVOKE XT FTR MOTO ROSE WNS',93.50,38,'https://www.nsport.ba/UserFiles/products/big/01/16/zenske-patike-puma-provoke-xt-ftr-moto-rose-wn-s-195612-01.jpg','https://www.nsport.ba/UserFiles/products/big/01/16/zenske-patike-puma-provoke-xt-ftr-moto-rose-wn-s-195612-01-1.jpg'),(42,'NIKE WMNS ATSUMA',83.50,38,'https://www.nsport.ba/UserFiles/products/big/10/11/zenske-patike-nike-wmns-city-rep-tr-DA1351-604.jpg','https://www.nsport.ba/UserFiles/products/big/10/11/zenske-patike-nike-wmns-city-rep-tr-DA1351-604-3.jpg'),(43,'NIKE WMNS CITY REP TR',107.10,38,'https://www.nsport.ba/UserFiles/products/big/10/03/zenske-patike-nike-wmns-city-rep-tr-DA1351-014.jpg','https://www.nsport.ba/UserFiles/products/big/10/03/zenske-patike-nike-wmns-city-rep-tr-DA1351-014-3.jpg'),(44,'NIKE WMNS CITY REP TR',145.80,38,'https://www.nsport.ba/UserFiles/products/big/03/19/zenske-patike-nike-wmns-air-max-sc-CW4554-117.jpg','https://www.nsport.ba/UserFiles/products/big/03/19/zenske-patike-nike-wmns-air-max-sc-CW4554-117-3.jpg'),(45,'NIKE AIR MAX BELLA TR 5',123.60,38,'https://www.nsport.ba/UserFiles/products/big/10/27/zenske-patike-nike-wmns-zenske-patike-nike-air-max-bella-tr-5-CW3398-600.jpg','https://www.nsport.ba/UserFiles/products/big/10/27/zenske-patike-nike-wmns-zenske-patike-nike-air-max-bella-tr-5-CW3398-600-3.jpg'),(46,'NIKE WMNS JUNIPER TRAIL 2 NN',135.50,38,'https://www.nsport.ba/UserFiles/products/big/10/16/zenske-patike-nike-wmns-juniper-trail-2-nn-DM0821-301.jpg','https://www.nsport.ba/UserFiles/products/big/10/16/zenske-patike-nike-wmns-juniper-trail-2-nn-DM0821-301-3.jpg'),(47,'ADIDAS POSTMOVE SE',107.10,38,'https://www.nsport.ba/UserFiles/products/big/08/15/zenske-patike-adidas-postmove-se-GZ6785.png','https://www.nsport.ba/UserFiles/products/big/08/15/zenske-patike-adidas-postmove-se-GZ6785-3.png'),(48,'PUMA CASSIA SL',145.80,38,'https://www.nsport.ba/UserFiles/products/big/03/15/zenske-patike-puma-cassia-sl-385279-01.jpg','https://www.nsport.ba/UserFiles/products/big/03/15/zenske-patike-puma-cassia-sl-385279-01-3.jpg');
/*!40000 ALTER TABLE `women_shoes` ENABLE KEYS */;
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
