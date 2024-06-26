-- Host: 127.0.0.1    Database: pharmaceutical
-- Version de PHP : 8.2.12
-- ------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

START TRANSACTION;

--
-- Table structure for table `get_in_touch`
--

DROP TABLE IF EXISTS `get_in_touch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `get_in_touch` (
                                `id` int NOT NULL AUTO_INCREMENT,
                                `message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                                PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `get_in_touch`
--

LOCK TABLES `get_in_touch` WRITE;
/*!40000 ALTER TABLE `get_in_touch` DISABLE KEYS */;
/*!40000 ALTER TABLE `get_in_touch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
                           `id` int NOT NULL AUTO_INCREMENT,
                           `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                           `quantity` int DEFAULT NULL,
                           `price` int DEFAULT NULL,
                           `expiring_date` date DEFAULT NULL,
                           `user_id` int DEFAULT NULL,
                           `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                           PRIMARY KEY (`id`),
                           KEY `product_user_foreign_fk` (`user_id`),
                           CONSTRAINT `product_user_foreign_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Doua',69,2507,'2028-03-05',1,NULL),(4,'paracetamol',350,120,'2027-06-24',1,NULL),(5,'bose',5,40000,'2026-04-01',1,NULL),(7,'loll',2,345,'2031-05-04',1,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
                        `id` int NOT NULL AUTO_INCREMENT,
                        `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `phone` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `role` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'customer',
                        `profession` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `gender` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
                        `status` varchar(25) COLLATE utf8mb4_general_ci DEFAULT 'active',
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','658183169','admin@admin.com','Admin','hospital','$2y$10$ffEt7Xe6NyHQqUV3NlJKFuyURZnT0vL6bLLoQjplaTrwqkJYsxOUK','Male','active'),(5,'Name','694114247','dyosby237@gmail.com','admin','pharmacist','$2y$10$.l3ccmCOr.GRJThCuIm8SOEb.8nwqVdfTx2RxKBdB6STRR9yXvY7K','Female','active'),(8,'Name','6941142470','dyos98@gmail.com','admin','pharmacist','$2y$10$TKCQJavN1amGGvuCEi1ik.b7.tdcLy0SteRbdrOwuVqM.NlFtccPG','Male','active'),(9,'dilane','1234','dilane@admin.com','customer','doctor','$2y$10$PZNkrqTF2ETB4TnlBsMgLeG3hX2mQc/YOGIIrG88rTg7UdSVMJuIK','Male','active'),(12,'dyos','694114247','Dyos','Admin',NULL,'123456',NULL,'active'),(17,'bala','mouphe','loll@loll.com','customer','doctor','$2y$10$nXRmosJZRVF.tpGlvjhWmuxix23/2t.52Df0l4Q9hMMKx/2N46UNm','Male','active');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-30  9:49:36
