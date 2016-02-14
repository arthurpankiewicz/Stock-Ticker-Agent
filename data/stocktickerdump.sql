-- MySQL dump 10.13  Distrib 5.6.27, for osx10.8 (x86_64)
--
-- Host: localhost    Database: stockticker
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('aa57c83a9cf237febc1a1d911e67764a8313aa80','127.0.0.1',1455414661,'__ci_last_regenerate|i:1455414541;'),('a4e19d65576a878bd7acc800b0834e15873012d6','127.0.0.1',1455414999,'__ci_last_regenerate|i:1455414939;'),('886b272c4f0ad01edc9bf04090b817be557fdac1','127.0.0.1',1455416884,'__ci_last_regenerate|i:1455416731;'),('c78b9f962ea7dd27c967a5dbfb5a6f9add10e553','127.0.0.1',1455417137,'__ci_last_regenerate|i:1455417060;'),('f24ca3afc20d7ef542139f4d8c9a75b4e529be89','127.0.0.1',1455417889,'__ci_last_regenerate|i:1455417655;'),('30b7e40493b58935061717a166e2f2d8f5661198','127.0.0.1',1455418546,'__ci_last_regenerate|i:1455418277;'),('3c0dca4ba7e9130ac8e9e55fc216b6853f98d877','127.0.0.1',1455419110,'__ci_last_regenerate|i:1455418851;'),('a96da2b93b6ab26c4c3db14adadbda5499f51bdb','127.0.0.1',1455419481,'__ci_last_regenerate|i:1455419191;'),('fbfd8dcc10ef43c489a5d41a4f818b952f322a75','127.0.0.1',1455419911,'__ci_last_regenerate|i:1455419627;'),('ffdfe55b80792558d6372f1b5edfb59a60b1a3d3','127.0.0.1',1455420311,'__ci_last_regenerate|i:1455420028;'),('8b98ce7d4c6a0305b72b71e6343112060d22a798','127.0.0.1',1455420632,'__ci_last_regenerate|i:1455420332;'),('cd54b0e8a07900202762aa864ae10fe5dcc64bd7','127.0.0.1',1455420831,'__ci_last_regenerate|i:1455420633;username|s:2:\"aa\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holdings`
--

DROP TABLE IF EXISTS `holdings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holdings` (
  `player` varchar(6) NOT NULL,
  `stock` varchar(4) NOT NULL,
  `quantity` int(4) NOT NULL,
  `value` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holdings`
--

LOCK TABLES `holdings` WRITE;
/*!40000 ALTER TABLE `holdings` DISABLE KEYS */;
INSERT INTO `holdings` VALUES ('Henry','GOLD',1000,110),('George','OIL',600,52),('George','IND',100,39),('Donald','BOND',100,66);
/*!40000 ALTER TABLE `holdings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movements`
--

DROP TABLE IF EXISTS `movements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movements` (
  `Datetime` varchar(19) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL,
  `Action` varchar(4) DEFAULT NULL,
  `Amount` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movements`
--

LOCK TABLES `movements` WRITE;
/*!40000 ALTER TABLE `movements` DISABLE KEYS */;
INSERT INTO `movements` VALUES ('2016.02.01-09:01:00','BOND','down',5),('2016.02.01-09:01:02','IND','div',5),('2016.02.01-09:01:04','OIL','down',10),('2016.02.01-09:01:06','GOLD','div',5),('2016.02.01-09:01:08','BOND','up',20),('2016.02.01-09:01:10','GOLD','div',5),('2016.02.01-09:01:12','GOLD','down',20),('2016.02.01-09:01:14','IND','div',10),('2016.02.01-09:01:16','OIL','up',20),('2016.02.01-09:01:18','BOND','down',5),('2016.02.01-09:01:20','BOND','up',5),('2016.02.01-09:01:22','BOND','div',20),('2016.02.01-09:01:24','BOND','div',20),('2016.02.01-09:01:26','GOLD','div',20),('2016.02.01-09:01:28','IND','up',20),('2016.02.01-09:01:30','OIL','down',20),('2016.02.01-09:01:32','GRAN','down',20),('2016.02.01-09:01:34','BOND','up',5),('2016.02.01-09:01:36','GOLD','down',20),('2016.02.01-09:01:38','GOLD','down',20),('2016.02.01-09:01:40','TECH','down',20),('2016.02.01-09:01:42','TECH','up',5),('2016.02.01-09:01:44','OIL','up',20),('2016.02.01-09:01:46','BOND','up',5),('2016.02.01-09:01:48','GOLD','div',10),('2016.02.01-09:01:50','GOLD','down',5),('2016.02.01-09:01:52','GOLD','up',20),('2016.02.01-09:01:54','IND','down',10),('2016.02.01-09:01:56','GOLD','div',20);
/*!40000 ALTER TABLE `movements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `Player` varchar(6) DEFAULT NULL,
  `Cash` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES ('Mickey',1000),('Donald',3000),('George',2000),('Henry',2500);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `Code` varchar(4) DEFAULT NULL,
  `Name` varchar(10) DEFAULT NULL,
  `Category` varchar(1) DEFAULT NULL,
  `Value` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES ('BOND','Bonds','B',66),('GOLD','Gold','B',110),('GRAN','Grain','B',113),('IND','Industrial','B',39),('OIL','Oil','B',52),('TECH','Tech','B',37);
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `DateTime` varchar(19) DEFAULT NULL,
  `Player` varchar(6) DEFAULT NULL,
  `Stock` varchar(4) DEFAULT NULL,
  `Trans` varchar(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES ('2016.02.01-09:01:00','Donald','BOND','buy',100),('2016.02.01-09:01:05','Donald','TECH','sell',1000),('2016.02.01-09:01:10','Henry','TECH','sell',1000),('2016.02.01-09:01:15','Donald','IND','sell',1000),('2016.02.01-09:01:20','George','GOLD','sell',100),('2016.02.01-09:01:25','George','OIL','buy',500),('2016.02.01-09:01:30','Henry','GOLD','sell',100),('2016.02.01-09:01:35','Henry','GOLD','buy',1000),('2016.02.01-09:01:40','Donald','TECH','buy',100),('2016.02.01-09:01:45','Donald','OIL','sell',100),('2016.02.01-09:01:50','Donald','TECH','sell',100),('2016.02.01-09:01:55','George','OIL','buy',100),('2016.02.01-09:01:60','George','IND','buy',100);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-13 19:36:34
