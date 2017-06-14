-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: ck_analitics
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `campaign_statistics_daily`
--

DROP TABLE IF EXISTS `campaign_statistics_daily`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_statistics_daily` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `cost` float NOT NULL,
  `views` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_statistics_daily`
--

LOCK TABLES `campaign_statistics_daily` WRITE;
/*!40000 ALTER TABLE `campaign_statistics_daily` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_statistics_daily` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_statistics_hourly`
--

DROP TABLE IF EXISTS `campaign_statistics_hourly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_statistics_hourly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `cost` float NOT NULL,
  `views` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_statistics_hourly`
--

LOCK TABLES `campaign_statistics_hourly` WRITE;
/*!40000 ALTER TABLE `campaign_statistics_hourly` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_statistics_hourly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `rel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaigns`
--

LOCK TABLES `campaigns` WRITE;
/*!40000 ALTER TABLE `campaigns` DISABLE KEYS */;
INSERT INTO `campaigns` VALUES (3,2,'standart-doors.ru','direct',0),(4,3,'makedoor.ru','direct',0),(5,4,'krepostdver.ru','direct',0),(6,5,'klinklinom.ru','direct',0),(7,6,'korado7.ru','direct',0),(8,7,'potolok1.com','direct',0),(9,8,'zamokna.ru','direct',0),(10,9,'Xdver.ru Баланс','direct',0),(11,9,'xdver.ru','direct',0),(13,1,'dveri-2000.ru','adwords',0),(14,4,'krepostdver.ru','adwords',0),(15,2,'standart-doors.ru','adwords',0),(16,5,'klinklinom.ru','adwords',0),(17,4,'krepostdver.ru SEO','adwords',0),(18,1,'dveri-2000.ru РСЯ Максимум ','direct',7980032),(19,1,'dveri-2000.ru Города 2.0','direct',12734440),(20,1,'dveri-2000.ru Поселки ч.1','direct',12734444),(21,1,'dveri-2000.ru Поселки ч.2','direct',12734445),(22,1,'dveri-2000 РСЯ2015','direct',13031790),(23,1,'dveri-2000.ru Н.КОВКА','direct',13344714),(24,1,'dveri-2000.ru Н.КОНКУРЕНТЫ','direct',14349435),(25,1,'dveri-2000, релакс','direct',14631365),(26,1,'dveri-2000, дальняк релакс','direct',25447482),(27,1,'dveri-2000, массив','direct',25683473),(28,4,'Krepostdver.ru МДФ','direct',18663046),(29,4,'Krepostdver.ru ГОРОДА','direct',19706632),(30,4,'Krepostdver.ru Ворота, решетки, пожарки','direct',26068285),(31,4,'Krepostdver РСЯ2017','direct',26958096);
/*!40000 ALTER TABLE `campaigns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `context` text NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,0,'Array','{\"campaigns\":[{\"id\":18,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0420\\u0421\\u042f \\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0443\\u043c \",\"type\":\"direct\",\"rel_id\":7980032},{\"id\":19,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0413\\u043e\\u0440\\u043e\\u0434\\u0430 2.0\",\"type\":\"direct\",\"rel_id\":12734440},{\"id\":20,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.1\",\"type\":\"direct\",\"rel_id\":12734444},{\"id\":21,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.2\",\"type\":\"direct\",\"rel_id\":12734445},{\"id\":22,\"site_id\":1,\"caption\":\"dveri-2000 \\u0420\\u0421\\u042f2015\",\"type\":\"direct\",\"rel_id\":13031790},{\"id\":23,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u0412\\u041a\\u0410\",\"type\":\"direct\",\"rel_id\":13344714},{\"id\":24,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u041d\\u041a\\u0423\\u0420\\u0415\\u041d\\u0422\\u042b\",\"type\":\"direct\",\"rel_id\":14349435},{\"id\":25,\"site_id\":1,\"caption\":\"dveri-2000, \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":14631365},{\"id\":26,\"site_id\":1,\"caption\":\"dveri-2000, \\u0434\\u0430\\u043b\\u044c\\u043d\\u044f\\u043a \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":25447482},{\"id\":27,\"site_id\":1,\"caption\":\"dveri-2000, \\u043c\\u0430\\u0441\\u0441\\u0438\\u0432\",\"type\":\"direct\",\"rel_id\":25683473},{\"id\":28,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u041c\\u0414\\u0424\",\"type\":\"direct\",\"rel_id\":18663046},{\"id\":29,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0413\\u041e\\u0420\\u041e\\u0414\\u0410\",\"type\":\"direct\",\"rel_id\":19706632},{\"id\":30,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0412\\u043e\\u0440\\u043e\\u0442\\u0430, \\u0440\\u0435\\u0448\\u0435\\u0442\\u043a\\u0438, \\u043f\\u043e\\u0436\\u0430\\u0440\\u043a\\u0438\",\"type\":\"direct\",\"rel_id\":26068285},{\"id\":31,\"site_id\":4,\"caption\":\"Krepostdver \\u0420\\u0421\\u042f2017\",\"type\":\"direct\",\"rel_id\":26958096}],\"report\":[{\"CampaignId\":\"7980032\",\"Cost\":\"145.80\",\"Impressions\":\"1930\",\"Clicks\":\"9\"}]}','2017-06-14 15:30:21'),(2,0,'Array','{\"campaigns\":[{\"id\":18,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0420\\u0421\\u042f \\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0443\\u043c \",\"type\":\"direct\",\"rel_id\":7980032},{\"id\":19,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0413\\u043e\\u0440\\u043e\\u0434\\u0430 2.0\",\"type\":\"direct\",\"rel_id\":12734440},{\"id\":20,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.1\",\"type\":\"direct\",\"rel_id\":12734444},{\"id\":21,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.2\",\"type\":\"direct\",\"rel_id\":12734445},{\"id\":22,\"site_id\":1,\"caption\":\"dveri-2000 \\u0420\\u0421\\u042f2015\",\"type\":\"direct\",\"rel_id\":13031790},{\"id\":23,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u0412\\u041a\\u0410\",\"type\":\"direct\",\"rel_id\":13344714},{\"id\":24,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u041d\\u041a\\u0423\\u0420\\u0415\\u041d\\u0422\\u042b\",\"type\":\"direct\",\"rel_id\":14349435},{\"id\":25,\"site_id\":1,\"caption\":\"dveri-2000, \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":14631365},{\"id\":26,\"site_id\":1,\"caption\":\"dveri-2000, \\u0434\\u0430\\u043b\\u044c\\u043d\\u044f\\u043a \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":25447482},{\"id\":27,\"site_id\":1,\"caption\":\"dveri-2000, \\u043c\\u0430\\u0441\\u0441\\u0438\\u0432\",\"type\":\"direct\",\"rel_id\":25683473},{\"id\":28,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u041c\\u0414\\u0424\",\"type\":\"direct\",\"rel_id\":18663046},{\"id\":29,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0413\\u041e\\u0420\\u041e\\u0414\\u0410\",\"type\":\"direct\",\"rel_id\":19706632},{\"id\":30,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0412\\u043e\\u0440\\u043e\\u0442\\u0430, \\u0440\\u0435\\u0448\\u0435\\u0442\\u043a\\u0438, \\u043f\\u043e\\u0436\\u0430\\u0440\\u043a\\u0438\",\"type\":\"direct\",\"rel_id\":26068285},{\"id\":31,\"site_id\":4,\"caption\":\"Krepostdver \\u0420\\u0421\\u042f2017\",\"type\":\"direct\",\"rel_id\":26958096}],\"report\":[{\"CampaignId\":\"7980032\",\"Cost\":\"145.80\",\"Impressions\":\"1930\",\"Clicks\":\"9\"}]}','2017-06-14 15:31:21'),(3,0,'shell:UpdateDirectStatisticsShell:today','{\"campaigns\":[{\"id\":18,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0420\\u0421\\u042f \\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0443\\u043c \",\"type\":\"direct\",\"rel_id\":7980032},{\"id\":19,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0413\\u043e\\u0440\\u043e\\u0434\\u0430 2.0\",\"type\":\"direct\",\"rel_id\":12734440},{\"id\":20,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.1\",\"type\":\"direct\",\"rel_id\":12734444},{\"id\":21,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.2\",\"type\":\"direct\",\"rel_id\":12734445},{\"id\":22,\"site_id\":1,\"caption\":\"dveri-2000 \\u0420\\u0421\\u042f2015\",\"type\":\"direct\",\"rel_id\":13031790},{\"id\":23,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u0412\\u041a\\u0410\",\"type\":\"direct\",\"rel_id\":13344714},{\"id\":24,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u041d\\u041a\\u0423\\u0420\\u0415\\u041d\\u0422\\u042b\",\"type\":\"direct\",\"rel_id\":14349435},{\"id\":25,\"site_id\":1,\"caption\":\"dveri-2000, \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":14631365},{\"id\":26,\"site_id\":1,\"caption\":\"dveri-2000, \\u0434\\u0430\\u043b\\u044c\\u043d\\u044f\\u043a \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":25447482},{\"id\":27,\"site_id\":1,\"caption\":\"dveri-2000, \\u043c\\u0430\\u0441\\u0441\\u0438\\u0432\",\"type\":\"direct\",\"rel_id\":25683473},{\"id\":28,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u041c\\u0414\\u0424\",\"type\":\"direct\",\"rel_id\":18663046},{\"id\":29,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0413\\u041e\\u0420\\u041e\\u0414\\u0410\",\"type\":\"direct\",\"rel_id\":19706632},{\"id\":30,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0412\\u043e\\u0440\\u043e\\u0442\\u0430, \\u0440\\u0435\\u0448\\u0435\\u0442\\u043a\\u0438, \\u043f\\u043e\\u0436\\u0430\\u0440\\u043a\\u0438\",\"type\":\"direct\",\"rel_id\":26068285},{\"id\":31,\"site_id\":4,\"caption\":\"Krepostdver \\u0420\\u0421\\u042f2017\",\"type\":\"direct\",\"rel_id\":26958096}],\"report\":[{\"CampaignId\":\"7980032\",\"Cost\":\"145.80\",\"Impressions\":\"1930\",\"Clicks\":\"9\"}]}','2017-06-14 15:32:39'),(4,0,'shell:UpdateDirectStatisticsShell:today','{\"campaigns\":[{\"id\":18,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0420\\u0421\\u042f \\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0443\\u043c \",\"type\":\"direct\",\"rel_id\":7980032},{\"id\":19,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0413\\u043e\\u0440\\u043e\\u0434\\u0430 2.0\",\"type\":\"direct\",\"rel_id\":12734440},{\"id\":20,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.1\",\"type\":\"direct\",\"rel_id\":12734444},{\"id\":21,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.2\",\"type\":\"direct\",\"rel_id\":12734445},{\"id\":22,\"site_id\":1,\"caption\":\"dveri-2000 \\u0420\\u0421\\u042f2015\",\"type\":\"direct\",\"rel_id\":13031790},{\"id\":23,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u0412\\u041a\\u0410\",\"type\":\"direct\",\"rel_id\":13344714},{\"id\":24,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u041d\\u041a\\u0423\\u0420\\u0415\\u041d\\u0422\\u042b\",\"type\":\"direct\",\"rel_id\":14349435},{\"id\":25,\"site_id\":1,\"caption\":\"dveri-2000, \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":14631365},{\"id\":26,\"site_id\":1,\"caption\":\"dveri-2000, \\u0434\\u0430\\u043b\\u044c\\u043d\\u044f\\u043a \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":25447482},{\"id\":27,\"site_id\":1,\"caption\":\"dveri-2000, \\u043c\\u0430\\u0441\\u0441\\u0438\\u0432\",\"type\":\"direct\",\"rel_id\":25683473},{\"id\":28,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u041c\\u0414\\u0424\",\"type\":\"direct\",\"rel_id\":18663046},{\"id\":29,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0413\\u041e\\u0420\\u041e\\u0414\\u0410\",\"type\":\"direct\",\"rel_id\":19706632},{\"id\":30,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0412\\u043e\\u0440\\u043e\\u0442\\u0430, \\u0440\\u0435\\u0448\\u0435\\u0442\\u043a\\u0438, \\u043f\\u043e\\u0436\\u0430\\u0440\\u043a\\u0438\",\"type\":\"direct\",\"rel_id\":26068285},{\"id\":31,\"site_id\":4,\"caption\":\"Krepostdver \\u0420\\u0421\\u042f2017\",\"type\":\"direct\",\"rel_id\":26958096}],\"report\":[{\"CampaignId\":\"7980032\",\"Cost\":\"145.80\",\"Impressions\":\"1990\",\"Clicks\":\"9\"}]}','2017-06-14 16:25:38'),(5,0,'shell:UpdateDirectStatisticsShell:today','{\"campaigns\":[{\"id\":18,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0420\\u0421\\u042f \\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0443\\u043c \",\"type\":\"direct\",\"rel_id\":7980032},{\"id\":19,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u0413\\u043e\\u0440\\u043e\\u0434\\u0430 2.0\",\"type\":\"direct\",\"rel_id\":12734440},{\"id\":20,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.1\",\"type\":\"direct\",\"rel_id\":12734444},{\"id\":21,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041f\\u043e\\u0441\\u0435\\u043b\\u043a\\u0438 \\u0447.2\",\"type\":\"direct\",\"rel_id\":12734445},{\"id\":22,\"site_id\":1,\"caption\":\"dveri-2000 \\u0420\\u0421\\u042f2015\",\"type\":\"direct\",\"rel_id\":13031790},{\"id\":23,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u0412\\u041a\\u0410\",\"type\":\"direct\",\"rel_id\":13344714},{\"id\":24,\"site_id\":1,\"caption\":\"dveri-2000.ru \\u041d.\\u041a\\u041e\\u041d\\u041a\\u0423\\u0420\\u0415\\u041d\\u0422\\u042b\",\"type\":\"direct\",\"rel_id\":14349435},{\"id\":25,\"site_id\":1,\"caption\":\"dveri-2000, \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":14631365},{\"id\":26,\"site_id\":1,\"caption\":\"dveri-2000, \\u0434\\u0430\\u043b\\u044c\\u043d\\u044f\\u043a \\u0440\\u0435\\u043b\\u0430\\u043a\\u0441\",\"type\":\"direct\",\"rel_id\":25447482},{\"id\":27,\"site_id\":1,\"caption\":\"dveri-2000, \\u043c\\u0430\\u0441\\u0441\\u0438\\u0432\",\"type\":\"direct\",\"rel_id\":25683473},{\"id\":28,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u041c\\u0414\\u0424\",\"type\":\"direct\",\"rel_id\":18663046},{\"id\":29,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0413\\u041e\\u0420\\u041e\\u0414\\u0410\",\"type\":\"direct\",\"rel_id\":19706632},{\"id\":30,\"site_id\":4,\"caption\":\"Krepostdver.ru \\u0412\\u043e\\u0440\\u043e\\u0442\\u0430, \\u0440\\u0435\\u0448\\u0435\\u0442\\u043a\\u0438, \\u043f\\u043e\\u0436\\u0430\\u0440\\u043a\\u0438\",\"type\":\"direct\",\"rel_id\":26068285},{\"id\":31,\"site_id\":4,\"caption\":\"Krepostdver \\u0420\\u0421\\u042f2017\",\"type\":\"direct\",\"rel_id\":26958096}],\"report\":[{\"CampaignId\":\"7980032\",\"Cost\":\"145.80\",\"Impressions\":\"1992\",\"Clicks\":\"9\"}]}','2017-06-14 16:28:14');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20170528135950,'CreateUsers','2017-05-28 10:59:52','2017-05-28 10:59:52',0),(20170529173444,'CreateProjects','2017-05-29 14:35:39','2017-05-29 14:35:40',0),(20170529173916,'CreateCampaigns','2017-05-29 14:39:21','2017-05-29 14:39:21',0),(20170529173944,'CreateSites','2017-05-29 14:39:50','2017-05-29 14:39:50',0),(20170529174204,'RemoveCampaignFromSites','2017-05-29 14:42:27','2017-05-29 14:42:27',0),(20170529174732,'CreateCampaignSite','2017-05-29 14:47:54','2017-05-29 14:47:54',0),(20170529175018,'RenameTables','2017-05-29 16:30:08','2017-05-29 16:30:08',0),(20170529192958,'AddCaptionToSites','2017-05-29 16:30:08','2017-05-29 16:30:08',0),(20170602053931,'AddCidToCampaigns','2017-06-02 02:40:06','2017-06-02 02:40:06',0),(20170607202548,'CreateStatisticsHourly','2017-06-07 17:26:19','2017-06-07 17:26:20',0),(20170607203039,'RemoveCidFromCampaigns','2017-06-07 17:31:06','2017-06-07 17:31:06',0),(20170607203208,'CreateStatisticsDaily','2017-06-07 17:32:21','2017-06-07 17:32:21',0),(20170607203614,'RemoveDateFromStatisticsDaily','2017-06-07 17:36:35','2017-06-07 17:36:35',0),(20170607203630,'AddDateToStatisticsDaily','2017-06-07 17:36:35','2017-06-07 17:36:35',0),(20170608175143,'RemoveProjectIdFromCampaigns','2017-06-08 14:54:09','2017-06-08 14:54:09',0),(20170608175420,'DropSites','2017-06-08 14:54:43','2017-06-08 14:54:43',0),(20170608175456,'CreateSites','2017-06-08 14:54:57','2017-06-08 14:54:58',0),(20170608180637,'AddSiteIdToCampaigns','2017-06-08 15:14:08','2017-06-08 15:14:08',0),(20170608181756,'AddTypeToCampaigns','2017-06-08 15:17:57','2017-06-08 15:17:58',0),(20170608182956,'DropCampaignSite','2017-06-08 15:30:12','2017-06-08 15:30:12',0),(20170608195126,'DropStatisticsDaily','2017-06-08 17:06:49','2017-06-08 17:06:49',0),(20170608195131,'DropStatisticsHourly','2017-06-08 17:06:49','2017-06-08 17:06:49',0),(20170608195135,'CreateCampaignStatisticsDaily','2017-06-08 17:06:49','2017-06-08 17:06:49',0),(20170608195136,'CreateCampaignStatisticsHourly','2017-06-08 17:06:49','2017-06-08 17:06:49',0),(20170608200532,'CreateSiteStatisticsHourly','2017-06-08 17:06:49','2017-06-08 17:06:49',0),(20170608200934,'RemoveEmailsFromSiteStatisticsHourly','2017-06-08 17:09:36','2017-06-08 17:09:36',0),(20170608201014,'AddMailsToSiteStatisticsHourly','2017-06-08 17:10:31','2017-06-08 17:10:31',0),(20170614150833,'CreateLogs','2017-06-14 12:08:42','2017-06-14 12:08:42',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Двери','doors'),(2,'Потолки','ceilings'),(3,'Отопление',''),(4,'Окна','');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_statistics_hourly`
--

DROP TABLE IF EXISTS `site_statistics_hourly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_statistics_hourly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `calls` int(11) NOT NULL,
  `mails` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_statistics_hourly`
--

LOCK TABLES `site_statistics_hourly` WRITE;
/*!40000 ALTER TABLE `site_statistics_hourly` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_statistics_hourly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'1','dveri-2000.ru'),(2,'1','standart-doors.ru'),(3,'1','makedoor.ru'),(4,'1','krepostdver.ru'),(5,'1','klinklinom.ru'),(6,'3','korado7.ru'),(7,'2','potolok1.com'),(8,'4','zamokna.ru'),(9,'1','xdver.ru');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$NvrkgIQ3oT3w70RQZFti4egmFRY2eKACM9qIgwj7GT3wvgsXy4A/O','admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-14 19:46:45
