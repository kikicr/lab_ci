-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: laboratory_inventory
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.10-MariaDB

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
-- Table structure for table `tb_menu`
--

DROP TABLE IF EXISTS `tb_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_menu` (
  `idtb_menu` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(45) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`idtb_menu`,`name`,`description`,`url`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_menu`
--

LOCK TABLES `tb_menu` WRITE;
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_menu_role`
--

DROP TABLE IF EXISTS `tb_menu_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_menu_role` (
  `idtb_menu_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`idtb_menu_role`),
  KEY `fk_role_idx` (`id_role`),
  KEY `fk_menu_idx` (`id_menu`),
  CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`idtb_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_menu_role`
--

LOCK TABLES `tb_menu_role` WRITE;
/*!40000 ALTER TABLE `tb_menu_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_menu_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_role` (
  `idrole` int(11) NOT NULL,
  `role_name` varchar(45) NOT NULL,
  `role_description` varchar(45) NOT NULL,
  PRIMARY KEY (`idrole`,`role_name`,`role_description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_role`
--

LOCK TABLES `tb_role` WRITE;
/*!40000 ALTER TABLE `tb_role` DISABLE KEYS */;
INSERT INTO `tb_role` VALUES (0,'bendahara','bendahara'),(1,'guru','guru'),(2,'sarpra','sarpra'),(3,'kepsek','kepala sekolah'),(4,'korlab','koordinator laboratorium');
/*!40000 ALTER TABLE `tb_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_identity`
--

DROP TABLE IF EXISTS `tb_user_identity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user_identity` (
  `idtb_user_identity` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(45) NOT NULL,
  `identity_number` varchar(25) NOT NULL,
  `employe_id` varchar(45) NOT NULL,
  `tb_user_identitycol` varchar(45) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  PRIMARY KEY (`idtb_user_identity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this is for user identity ,like address etc	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_identity`
--

LOCK TABLES `tb_user_identity` WRITE;
/*!40000 ALTER TABLE `tb_user_identity` DISABLE KEYS */;
INSERT INTO `tb_user_identity` VALUES (0,'akbar pambudi','jl.address','36581306091997','2112312312312312312','','');
/*!40000 ALTER TABLE `tb_user_identity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user_login`
--

DROP TABLE IF EXISTS `tb_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user_login` (
  `iduser_login` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `identity_id` int(11) NOT NULL,
  PRIMARY KEY (`iduser_login`),
  KEY `fk_user_idenitty_idx` (`identity_id`),
  KEY `fk_user_role_idx` (`role_id`),
  CONSTRAINT `fk_user_idenitty` FOREIGN KEY (`identity_id`) REFERENCES `tb_user_identity` (`idtb_user_identity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user_login`
--

LOCK TABLES `tb_user_login` WRITE;
/*!40000 ALTER TABLE `tb_user_login` DISABLE KEYS */;
INSERT INTO `tb_user_login` VALUES (0,'akbar.pambudi','37449c184d94fb6b0adcf3a9ceffa3482d9e30b3',0,0);
/*!40000 ALTER TABLE `tb_user_login` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-29 13:29:23
