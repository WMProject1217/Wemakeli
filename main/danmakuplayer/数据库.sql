-- MySQL dump 10.13  Distrib 5.6.47, for Linux (x86_64)
--
-- Host: localhost    Database: bfq
-- ------------------------------------------------------
-- Server version	5.6.47-log

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
-- Table structure for table `danmaku_ip`
--

DROP TABLE IF EXISTS `danmaku_ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `danmaku_ip` (
  `ip` varchar(12) NOT NULL COMMENT '发送弹幕的IP地址',
  `c` int(1) NOT NULL DEFAULT '1' COMMENT '规定时间内的发送次数',
  `time` int(10) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danmaku_ip`
--

LOCK TABLES `danmaku_ip` WRITE;
/*!40000 ALTER TABLE `danmaku_ip` DISABLE KEYS */;
INSERT INTO `danmaku_ip` VALUES ('182.129.28.1',1,1580987843);
/*!40000 ALTER TABLE `danmaku_ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danmaku_list`
--

DROP TABLE IF EXISTS `danmaku_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `danmaku_list` (
  `id` varchar(32) NOT NULL COMMENT '弹幕池id',
  `cid` int(8) NOT NULL AUTO_INCREMENT COMMENT '弹幕id',
  `type` varchar(8) NOT NULL COMMENT '弹幕类型',
  `text` varchar(128) NOT NULL COMMENT '弹幕内容',
  `color` varchar(20) NOT NULL COMMENT '弹幕颜色',
  `videotime` float(24,3) NOT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danmaku_list`
--

LOCK TABLES `danmaku_list` WRITE;
/*!40000 ALTER TABLE `danmaku_list` DISABLE KEYS */;
INSERT INTO `danmaku_list` VALUES ('84fe19ce42e1c3f4e8c3ec2d76c8d2b3',1,'right','1','rgb(254, 3, 2)',11.282,1580987843),('84fe19ce42e1c3f4e8c3ec2d76c8d2b3',2,'right','测试','rgb(255, 255, 255)',24.639,1580987966),('84fe19ce42e1c3f4e8c3ec2d76c8d2b3',3,'right','测试','rgb(254, 3, 2)',46.535,1580987988),('84fe19ce42e1c3f4e8c3ec2d76c8d2b3',4,'right','测试','rgb(254, 3, 2)',63.294,1580988005);
/*!40000 ALTER TABLE `danmaku_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-13 14:50:03
