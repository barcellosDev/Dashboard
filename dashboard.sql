-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: dashboard
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `tb_finalidade`
--

DROP TABLE IF EXISTS `tb_finalidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_finalidade` (
  `id_finalidade` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id_finalidade` (`id_finalidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_finalidade`
--

LOCK TABLES `tb_finalidade` WRITE;
/*!40000 ALTER TABLE `tb_finalidade` DISABLE KEYS */;
INSERT INTO `tb_finalidade` VALUES (1,'Projetos Didáticos'),(2,'Projetos de Pesquisa'),(3,'Projetos de Laboratório'),(4,'Departamento');
/*!40000 ALTER TABLE `tb_finalidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_os_eletronica`
--

DROP TABLE IF EXISTS `tb_os_eletronica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_os_eletronica` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` tinyint(4) NOT NULL,
  `responsavel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resumo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sala` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finalidade` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `material_fornecimento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_descricao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `acao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_os_eletronica`
--

LOCK TABLES `tb_os_eletronica` WRITE;
/*!40000 ALTER TABLE `tb_os_eletronica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_os_eletronica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_os_informatica`
--

DROP TABLE IF EXISTS `tb_os_informatica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_os_informatica` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` tinyint(4) NOT NULL,
  `responsavel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resumo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sala` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finalidade` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `material_fornecimento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_descricao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `acao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_os_informatica`
--

LOCK TABLES `tb_os_informatica` WRITE;
/*!40000 ALTER TABLE `tb_os_informatica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_os_informatica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_os_manutencao`
--

DROP TABLE IF EXISTS `tb_os_manutencao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_os_manutencao` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` tinyint(4) NOT NULL,
  `responsavel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resumo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sala` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finalidade` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `material_fornecimento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_descricao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `acao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_os_manutencao`
--

LOCK TABLES `tb_os_manutencao` WRITE;
/*!40000 ALTER TABLE `tb_os_manutencao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_os_manutencao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_os_mecanica`
--

DROP TABLE IF EXISTS `tb_os_mecanica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_os_mecanica` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `id_chamado` tinyint(4) NOT NULL,
  `responsavel` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resumo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sala` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `finalidade` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `material_fornecimento` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_descricao` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ativo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `acao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_os`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_os_mecanica`
--

LOCK TABLES `tb_os_mecanica` WRITE;
/*!40000 ALTER TABLE `tb_os_mecanica` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_os_mecanica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_sala`
--

DROP TABLE IF EXISTS `tb_sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sala` (
  `id_sala` int(11) NOT NULL,
  `num_sala` int(11) NOT NULL,
  `nome_sala` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `piso` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id_sala` (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sala`
--

LOCK TABLES `tb_sala` WRITE;
/*!40000 ALTER TABLE `tb_sala` DISABLE KEYS */;
INSERT INTO `tb_sala` VALUES (1,220,'Laboratório de Análises','Térreo'),(2,256,'Laboratório de Medições','Térreo'),(3,335,'Auditório 1','Superior');
/*!40000 ALTER TABLE `tb_sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_secao`
--

DROP TABLE IF EXISTS `tb_secao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_secao` (
  `id_secao` int(11) NOT NULL,
  `nome_secao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id_secao` (`id_secao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_secao`
--

LOCK TABLES `tb_secao` WRITE;
/*!40000 ALTER TABLE `tb_secao` DISABLE KEYS */;
INSERT INTO `tb_secao` VALUES (1,'Manutenção Predial'),(2,'Eletrônica'),(3,'Oficina Mecânica'),(4,'Informática');
/*!40000 ALTER TABLE `tb_secao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `num_usp` int(11) NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `id_usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (1,500,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Relator Simples','relator@dev.local'),(2,100,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Técnico Manutenção','manut@dev.local'),(3,101,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Gestor Manutenção','gestor_manut@dev.local'),(4,200,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Técnico Eletrônica','eletronica@dev.local'),(5,201,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Gestor Eletrônica','gestor_elet@dev.local'),(6,300,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Técnico Mecânica','mecanica@dev.local'),(7,301,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Gestor Mecânica','gestor_mecanica@dev.local'),(8,400,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Técnico Informática','informatica@dev.local'),(9,401,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Gestor Informática','gestor_inf@dev.local'),(10,1000,'40BD001563085FC35165329EA1FF5C5ECBDBBEEF','Gestor da Unidade','gestor_unidade@dev.local');
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-26 21:16:55
