-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: app_unasam
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `persona_id` int NOT NULL,
  `escuela_id` int NOT NULL,
  `procedencia_id` int NOT NULL,
  `condicion_economica_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ALUMNO_PERSONA1_idx` (`persona_id`),
  KEY `fk_ALUMNO_ESCUELA1_idx` (`escuela_id`),
  KEY `fk_ALUMNO_PROCENDENCIA1_idx` (`procedencia_id`),
  KEY `fk_ALUMNO_CONDICION_ECONOMICA1_idx` (`condicion_economica_id`),
  CONSTRAINT `fk_ALUMNO_CONDICION_ECONOMICA1` FOREIGN KEY (`condicion_economica_id`) REFERENCES `condicion_economica` (`id`),
  CONSTRAINT `fk_ALUMNO_ESCUELA1` FOREIGN KEY (`escuela_id`) REFERENCES `escuela` (`id`),
  CONSTRAINT `fk_ALUMNO_PERSONA1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_ALUMNO_PROCENDENCIA1` FOREIGN KEY (`procedencia_id`) REFERENCES `procedencia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'171.2503.015',1,1,1,1),(2,'171.2503.021',2,3,3,3),(3,'171.2504.015',3,3,3,2),(4,'161.2503.015',4,4,3,2),(5,'191.2503.015',5,1,1,2),(6,'121.2503.015',6,3,1,2),(7,'181.2503.061',7,3,4,1),(8,'111.2503.015',8,1,4,3),(9,'161.1661.042',9,5,1,2),(10,'181.2503.016',10,4,1,1);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_x_grupo`
--

DROP TABLE IF EXISTS `alumno_x_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno_x_grupo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  `grupo_universitario_id` int NOT NULL,
  `alumno_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ALUMNO_X_GRUPO_GRUPO_UNIVERSITARIO1_idx` (`grupo_universitario_id`),
  KEY `fk_ALUMNO_X_GRUPO_ALUMNO1_idx` (`alumno_id`),
  CONSTRAINT `fk_ALUMNO_X_GRUPO_ALUMNO1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`),
  CONSTRAINT `fk_ALUMNO_X_GRUPO_GRUPO_UNIVERSITARIO1` FOREIGN KEY (`grupo_universitario_id`) REFERENCES `grupo_universitario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_x_grupo`
--

LOCK TABLES `alumno_x_grupo` WRITE;
/*!40000 ALTER TABLE `alumno_x_grupo` DISABLE KEYS */;
INSERT INTO `alumno_x_grupo` VALUES (1,'2016-05-05','activo',1,1),(2,'2018-08-05','activo',3,1),(3,'2016-10-12','activo',3,3),(4,'2017-05-05','activo',4,2),(5,'2020-05-05','activo',4,7),(6,'2019-06-15','activo',1,3),(7,'2018-08-05','activo',3,5),(8,'2016-10-12','activo',1,4),(9,'2019-05-05','activo',4,6),(10,'2020-10-25','activo',1,7),(11,'2021-11-21','activo',1,5),(12,'2021-11-21','activo',1,10),(13,'2021-11-21','activo',3,10),(14,'2021-11-21','activo',5,10),(15,'2021-11-21','activo',5,6),(16,'2021-12-02','activo',6,7),(17,'2021-12-02','activo',6,3);
/*!40000 ALTER TABLE `alumno_x_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficio`
--

DROP TABLE IF EXISTS `beneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio`
--

LOCK TABLES `beneficio` WRITE;
/*!40000 ALTER TABLE `beneficio` DISABLE KEYS */;
INSERT INTO `beneficio` VALUES (1,'Beneficio 1 '),(2,'Beneficio 2'),(3,'  DESCUENTO CID'),(4,' Beneficio 3 '),(5,' Beneficio 4 '),(6,' Beneficio 6 '),(7,' Beneficio 7 '),(8,' Beneficio 8 '),(9,' Beneficio 9 '),(10,' Beneficio 10 '),(11,' Beneficio 11 '),(12,' Beneficio 12 '),(13,' Beneficio 13 '),(14,' Beneficio 14 '),(15,' Beneficio 15 '),(16,' Beneficio 17 '),(17,' Beneficio 18 '),(18,' Beneficio 19 '),(19,'  '),(20,' Beneficio 21 '),(21,' Beneficio 22 mo'),(22,' Beneficio 55'),(23,'  beneficio 333'),(24,' Beneficio 1 '),(25,' Beneficio 77 '),(26,' Beneficio 32 '),(27,' Beneficio nuevo '),(28,' Descuento de Matricula '),(29,'  1b'),(30,'  2b');
/*!40000 ALTER TABLE `beneficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficio_x_alumno`
--

DROP TABLE IF EXISTS `beneficio_x_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficio_x_alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `fecha_efectiva` date DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `semestre_id` int NOT NULL,
  `beneficio_x_tipo_grupo_id` int NOT NULL,
  `alumno_x_grupo_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_BENEFICIO_X_ALUMNO_SEMESTRE1_idx` (`semestre_id`),
  KEY `fk_BENEFICIO_X_ALUMNO_BENEFICIO_X_TIPO_GRUPO1_idx` (`beneficio_x_tipo_grupo_id`),
  KEY `fk_BENEFICIO_X_ALUMNO_ALUMNO_X_GRUPO1_idx` (`alumno_x_grupo_id`),
  KEY `fk_BENEFICIO_X_ALUMNO_USUARIO1_idx` (`usuario_id`),
  CONSTRAINT `fk_BENEFICIO_X_ALUMNO_ALUMNO_X_GRUPO1` FOREIGN KEY (`alumno_x_grupo_id`) REFERENCES `alumno_x_grupo` (`id`),
  CONSTRAINT `fk_BENEFICIO_X_ALUMNO_BENEFICIO_X_TIPO_GRUPO1` FOREIGN KEY (`beneficio_x_tipo_grupo_id`) REFERENCES `beneficio_x_tipo_grupo` (`id`),
  CONSTRAINT `fk_BENEFICIO_X_ALUMNO_SEMESTRE1` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  CONSTRAINT `fk_BENEFICIO_X_ALUMNO_USUARIO1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio_x_alumno`
--

LOCK TABLES `beneficio_x_alumno` WRITE;
/*!40000 ALTER TABLE `beneficio_x_alumno` DISABLE KEYS */;
INSERT INTO `beneficio_x_alumno` VALUES (1,'COMPLETADO','2021-11-22','una desc',1,2,11,1),(2,'COMPLETADO','2021-11-22','una desc 2',1,2,11,1),(3,'COMPLETADO','2021-11-22','una desc 3',1,2,11,1),(4,'COMPLETADO','2021-11-22','una desc',1,2,11,1),(5,'COMPLETADO','2021-11-22','una desc 4',1,2,11,1),(6,'COMPLETADO','2021-11-22','una desc 5',1,2,11,1),(7,'COMPLETADO','2021-11-21','una desc 6',1,2,11,1),(8,'PENDIENTE','2021-11-21','una desc 6',1,2,11,1),(9,'PENDIENTE','2021-11-21','descripcion',1,2,12,1),(10,'PENDIENTE','2021-11-21','descripcion 2',1,2,12,1),(11,'PENDIENTE','2021-11-21','descripcion 3',1,2,12,1),(12,'COMPLETADO','2021-11-21','descripcion 4',1,2,12,1),(13,'COMPLETADO','2021-11-21','descripcion 5',1,2,12,1),(14,'COMPLETADO','2021-11-21','descripcion 6',1,2,12,1),(15,'COMPLETADO','2021-11-21','descripcion 7',1,3,12,1),(16,'COMPLETADO','2021-11-21','descripcion 7',1,3,12,1),(17,'PENDIENTE','2021-11-21','de nuevo',1,3,12,1),(18,'COMPLETADO','2021-11-21','de nuevo otra vez',1,3,12,1),(19,'COMPLETADO','2021-11-21','',1,2,12,1),(20,'COMPLETADO','2021-11-24','una desc 6',1,1,13,1),(21,'COMPLETADO','2021-11-29','por un mes',1,4,1,5),(22,'COMPLETADO','2021-11-30','una desc 6',1,1,13,1),(23,'COMPLETADO','2021-12-02','descripcion 7',1,3,12,2),(24,'COMPLETADO','2021-12-02','descripcion 7',1,4,12,2),(25,'COMPLETADO','2021-12-02','descripcion 7',1,8,12,2);
/*!40000 ALTER TABLE `beneficio_x_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficio_x_tipo_grupo`
--

DROP TABLE IF EXISTS `beneficio_x_tipo_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficio_x_tipo_grupo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `beneficio_id` int NOT NULL,
  `tipo_grupo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_BENEFICIO_X_TIPO_GRUPO_BENEFICIO1_idx` (`beneficio_id`),
  KEY `fk_BENEFICIO_X_TIPO_GRUPO_TIPO_GRUPO1_idx` (`tipo_grupo_id`),
  CONSTRAINT `fk_BENEFICIO_X_TIPO_GRUPO_BENEFICIO1` FOREIGN KEY (`beneficio_id`) REFERENCES `beneficio` (`id`),
  CONSTRAINT `fk_BENEFICIO_X_TIPO_GRUPO_TIPO_GRUPO1` FOREIGN KEY (`tipo_grupo_id`) REFERENCES `tipo_grupo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio_x_tipo_grupo`
--

LOCK TABLES `beneficio_x_tipo_grupo` WRITE;
/*!40000 ALTER TABLE `beneficio_x_tipo_grupo` DISABLE KEYS */;
INSERT INTO `beneficio_x_tipo_grupo` VALUES (1,'ACTIVO',1,2),(2,'ACTIVO',1,4),(3,'ACTIVO',2,4),(4,'ACTIVO',3,4),(5,'INACTIVO',1,1),(6,'ACTIVO',1,4),(7,'INACTIVO',1,4),(8,'ACTIVO',3,4);
/*!40000 ALTER TABLE `beneficio_x_tipo_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condicion_economica`
--

DROP TABLE IF EXISTS `condicion_economica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `condicion_economica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicion_economica`
--

LOCK TABLES `condicion_economica` WRITE;
/*!40000 ALTER TABLE `condicion_economica` DISABLE KEYS */;
INSERT INTO `condicion_economica` VALUES (1,'POBRE'),(2,'NO POBRE'),(3,'POBRE EXTREMO');
/*!40000 ALTER TABLE `condicion_economica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_usuario`
--

DROP TABLE IF EXISTS `datos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `persona_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_DATOS_USUARIO_PERSONA1_idx` (`persona_id`),
  KEY `fk_DATOS_USUARIO_USUARIO1_idx` (`usuario_id`),
  CONSTRAINT `fk_DATOS_USUARIO_PERSONA1` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_DATOS_USUARIO_USUARIO1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_usuario`
--

LOCK TABLES `datos_usuario` WRITE;
/*!40000 ALTER TABLE `datos_usuario` DISABLE KEYS */;
INSERT INTO `datos_usuario` VALUES (1,1,1),(2,17,2),(3,18,3),(4,22,4),(5,23,5);
/*!40000 ALTER TABLE `datos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuela`
--

DROP TABLE IF EXISTS `escuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escuela` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `facultad_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ESCUELA_FACULTAD1_idx` (`facultad_id`),
  CONSTRAINT `fk_ESCUELA_FACULTAD1` FOREIGN KEY (`facultad_id`) REFERENCES `facultad` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuela`
--

LOCK TABLES `escuela` WRITE;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` VALUES (1,'Administración',1),(2,'Turismo',1),(3,'Ingeniería de Sistemas e Informática',2),(4,'Estadística e informática',2),(5,'Matemática',2),(6,'Agronomía',3),(7,'Ingeniería Agrícola',3),(8,'Ingeniería Ambiental',4),(9,'Ingeniería Sanitaria',4),(10,'Ciencias de la comunicación',5),(11,'Educación Comunicación Linguistica',5),(12,'Educación Primaria',5),(13,'Educación Secundaria Matemática e informática',5),(14,'Eduación lengua extrajera',5),(15,'Arqueología',5),(16,'Enfermería',6),(17,'Obstetricia',6),(18,'Economía',7),(19,'Contabilidad',7),(20,'Ingeniería Civil',8),(21,'Arquitectura y urbanismo',8),(22,'Ingeniería de Minas',9),(23,'Ingeniería de industrias alimentarias',10),(24,'Ingeniería Industrial',10),(25,'Derecho y Ciencias politicas',11);
/*!40000 ALTER TABLE `escuela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `organizador_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_EVENTO_ORGANIZADOR1_idx` (`organizador_id`),
  CONSTRAINT `fk_EVENTO_ORGANIZADOR1` FOREIGN KEY (`organizador_id`) REFERENCES `organizador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (2,'Danza de Festividades Ancashinas','2020-01-01','2020-01-05',1),(3,'Concurso de Canto','2021-04-23','2021-04-25',2),(4,'Concurso de Actuación 2021','2021-05-13','2021-05-16',3),(5,'Concurso de Bailes Típicos','2021-06-01','2021-06-06',4),(6,'Concurso de Actuación','2021-06-15','2021-06-19',4),(7,'Evento 1','2021-11-16','2021-11-25',1),(8,'Evento uno','2021-11-16','2021-11-25',1),(9,'Evento 2 ','2021-11-16','2021-11-25',1),(10,'Evento 33333','2021-11-26','2021-11-28',1),(11,'Evento 4','2021-11-13','2021-11-27',3);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facultad` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'Facultad de Administración y turismo'),(2,'Facultad de Ciencias'),(3,'Facultad de Ciencias Agrarias'),(4,'Facultad de Ciencias del Ambiente'),(5,'Facultad de Ciencias Sociales Educación y Comunicación'),(6,'Facultad de Ciencias Médicas'),(7,'Facultad de Economia y Contabilidad'),(8,'Facultad de Ingeniería Civil'),(9,'Facultad de Ingeniería de Minas, Geología y Metalurgia'),(10,'Facultad de Ingeniería de Industraias Alimentarias'),(11,'Facultad de Derecho y Ciencias Politicas');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formacion_socioeconomica`
--

DROP TABLE IF EXISTS `formacion_socioeconomica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formacion_socioeconomica` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  `alumno_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_FORMACION_SOCIOECONOMICA_ALUMNO1_idx` (`alumno_id`),
  CONSTRAINT `fk_FORMACION_SOCIOECONOMICA_ALUMNO1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacion_socioeconomica`
--

LOCK TABLES `formacion_socioeconomica` WRITE;
/*!40000 ALTER TABLE `formacion_socioeconomica` DISABLE KEYS */;
/*!40000 ALTER TABLE `formacion_socioeconomica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_universitario`
--

DROP TABLE IF EXISTS `grupo_universitario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_universitario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `resolucion_creacion` varchar(25) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `tipo_grupo_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_GRUPO_UNIVERSITARIO_TIPO_GRUPO1_idx` (`tipo_grupo_id`),
  CONSTRAINT `fk_GRUPO_UNIVERSITARIO_TIPO_GRUPO1` FOREIGN KEY (`tipo_grupo_id`) REFERENCES `tipo_grupo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_universitario`
--

LOCK TABLES `grupo_universitario` WRITE;
/*!40000 ALTER TABLE `grupo_universitario` DISABLE KEYS */;
INSERT INTO `grupo_universitario` VALUES (1,'TUNA MASCULINA','2000-05-25','RES_1','eac875e44c35d78a2ef3f6e573fe5d99.jpg',4),(3,'TUSAM ','2008-10-15','res_tusama','293a4ff19faac29458f924bd79bb998a.jpg',2),(4,'TUNA FEMENINA','2010-05-20','RES_FEM','802cbf05bd142c7d6d5a074d8254d85a.jpg',4),(5,' Grupo 1','2021-11-18','RES_1','d6726b299da9f8722efee9476d157fad.jpg',1),(6,' Grupo 2','2021-11-18','RES_1','7b0d832d85139b852b8005c4b57ecfe0.jpg',2),(7,' TUNA MASCULINA mod','2000-05-25','RES_2','f624096e772cd2de3d2d7dde6b61664e.jpg',4),(8,' TUNA MASCULINA mod','2000-05-25','RES_2','c68d1a9b8b856fabc928d500cbe5dbbf.jpg',4),(9,' TUNA MASCULINA','2000-05-25','RES_2','cdb252e96b53b92b62d66d778c58dd8f.jpg',4),(10,' TUNA MASCULINA mod','2000-05-25','RES_2','e3f9887ac89ebb13aad87a81b1a49a98.jpg',4),(11,' TUNA MASCULINA','2000-05-25','RES_2','924f656557741dab4a78bc074d22f7f0.jpg',4),(12,' TUNA MASCULINA','2000-05-25','RES_2','5a4efceacf2e290cfad7624f4e137160.jpg',4),(13,' TUNA MASCULINA','2000-05-25','RES_2','f10c8e818eacf66b1ed04f75c3fdc520.jpg',4),(14,'Grupo 10','2021-11-20','2334','d7753a57229e3f02085b9758e758c856.jpg',2),(15,'Grupo 20','2021-11-19','res555e','294d2c9b8e5152f54b243f0b5265eb60.jpg',3);
/*!40000 ALTER TABLE `grupo_universitario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitacion`
--

DROP TABLE IF EXISTS `invitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invitacion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NOT NULL,
  `fecha_hora` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  `observacion` varchar(100) DEFAULT NULL,
  `evento_id` int NOT NULL,
  `grupo_universitario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_INVITACION_EVENTO1_idx` (`evento_id`),
  KEY `fk_INVITACION_GRUPO_UNIVERSITARIO1_idx` (`grupo_universitario_id`),
  CONSTRAINT `fk_INVITACION_EVENTO1` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`),
  CONSTRAINT `fk_INVITACION_GRUPO_UNIVERSITARIO1` FOREIGN KEY (`grupo_universitario_id`) REFERENCES `grupo_universitario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitacion`
--

LOCK TABLES `invitacion` WRITE;
/*!40000 ALTER TABLE `invitacion` DISABLE KEYS */;
INSERT INTO `invitacion` VALUES (4,'2021-11-16','2020-01-01','CUMPLIDO','Tipo presencial',2,1),(5,'2021-11-16','2020-01-01','CUMPLIDO','Tipo presencial',2,3),(6,'2021-11-16','2020-01-01','CUMPLIDO','Tipo presencial',3,4),(7,'2021-11-16','2020-01-01','CUMPLIDO','Tipo presencial',4,1),(8,'2021-11-16','2021-01-01','CUMPLIDO','Tipo presencial',5,3),(9,'2021-11-25','2021-11-26','PENDIENTE','NInguna obersfasg',11,3),(10,'2021-11-30','2021-11-30','PENDIENTE','obsrrvacion',6,5),(11,'2021-12-03','2021-12-12','PENDIENTE','bzdxfvc',7,5),(12,'2021-12-03','2021-12-09','PENDIENTE','tess',11,6);
/*!40000 ALTER TABLE `invitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opcion_x_tipo`
--

DROP TABLE IF EXISTS `opcion_x_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opcion_x_tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `opciones_id` int NOT NULL,
  `tipo_usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_OPCION_X_TIPO_OPCIONES1_idx` (`opciones_id`),
  KEY `fk_OPCION_X_TIPO_TIPO_USUARIO1_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_OPCION_X_TIPO_OPCIONES1` FOREIGN KEY (`opciones_id`) REFERENCES `opciones` (`id`),
  CONSTRAINT `fk_OPCION_X_TIPO_TIPO_USUARIO1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opcion_x_tipo`
--

LOCK TABLES `opcion_x_tipo` WRITE;
/*!40000 ALTER TABLE `opcion_x_tipo` DISABLE KEYS */;
INSERT INTO `opcion_x_tipo` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(12,3,3),(13,4,3),(14,5,3),(18,1,6),(19,2,4),(20,1,5),(21,2,5),(22,1,7),(23,3,7),(24,4,7),(33,3,2),(34,4,2),(35,5,2);
/*!40000 ALTER TABLE `opcion_x_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `opciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
INSERT INTO `opciones` VALUES (1,'grupos'),(2,'eventos'),(3,'semestres'),(4,'beneficios'),(5,'administrador');
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizador`
--

DROP TABLE IF EXISTS `organizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `contacto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizador`
--

LOCK TABLES `organizador` WRITE;
/*!40000 ALTER TABLE `organizador` DISABLE KEYS */;
INSERT INTO `organizador` VALUES (1,'Municipalidad de Huaraz','huaraz@gmail.com'),(2,'Municipalidad de Independencia','idependencia@gmail.com'),(3,'I.E. Jorge Basadre Grohmann','987678453'),(4,'I.E. Mariscal Toribio de Luzuriaga','987678854'),(5,'Universidad del Santa','987999444'),(6,'Org 1','963852741'),(7,'',''),(8,'Org 2','');
/*!40000 ALTER TABLE `organizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participacion_alumno`
--

DROP TABLE IF EXISTS `participacion_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participacion_alumno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `alumno_x_grupo_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  `semestre_id` int DEFAULT NULL,
  `invitacion_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_PARTICIPACION_ALUMNO_ALUMNO_X_GRUPO1_idx` (`alumno_x_grupo_id`),
  KEY `fk_PARTICIPACION_ALUMNO_USUARIO1_idx` (`usuario_id`),
  KEY `fk_PARTICIPACION_ALUMNO_SEMESTRE1_idx` (`semestre_id`),
  KEY `fk_PARTICIPACION_ALUMNO_INVITACION1_idx` (`invitacion_id`),
  CONSTRAINT `fk_PARTICIPACION_ALUMNO_ALUMNO_X_GRUPO1` FOREIGN KEY (`alumno_x_grupo_id`) REFERENCES `alumno_x_grupo` (`id`),
  CONSTRAINT `fk_PARTICIPACION_ALUMNO_INVITACION1` FOREIGN KEY (`invitacion_id`) REFERENCES `invitacion` (`id`),
  CONSTRAINT `fk_PARTICIPACION_ALUMNO_SEMESTRE1` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`),
  CONSTRAINT `fk_PARTICIPACION_ALUMNO_USUARIO1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participacion_alumno`
--

LOCK TABLES `participacion_alumno` WRITE;
/*!40000 ALTER TABLE `participacion_alumno` DISABLE KEYS */;
INSERT INTO `participacion_alumno` VALUES (4,'Presencial',6,1,1,4),(5,'Presencial',2,1,1,5),(10,' presencial luna',7,1,1,5),(11,' presencial a',4,1,1,6),(12,' presencial tipicos',7,1,2,8),(13,' grupal fes achs',8,1,1,4),(14,' actu 2021',8,1,1,7),(16,' fest ancahs grupal',3,1,1,5),(17,' tipicos',3,1,2,8),(25,' grupal',11,1,1,4),(29,'grupal 234',12,1,1,7),(31,'presencial',1,5,1,7),(33,'presencial',13,2,1,5),(34,'presencial luna',5,2,1,6),(36,'presencial',12,2,1,4);
/*!40000 ALTER TABLE `participacion_alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` char(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'12345678','Carlos','Jhardel','Masculino','jr. direccion','jurbanom@unasam.edu.pe','963852741'),(2,'54876985','Andres Antonio','Lopez Gomez','MASCULINO','Intependencia jr. Recuay','andresLopez@unasam.edu.pe','98774585'),(3,'25458123','Joaquin','Camones Montañez','MASCULINO','Independencia av. centenario','joaquinc@unasam.edu.pe','95874598'),(4,'12548745','Adrian Aron','Shuan Montalvo','MASCULINO','Lima','aronshuan@unasam.edu.pe','95871285'),(5,'65876595','Luna Lucero','Trujillo Perez','FEMENINO','Jangas jr. alisos','trujilloperez@unasam.edu.pe','958732651'),(6,'45658795','Anneliz Dana','Lima Leon','FEMENINO','Independencia av. Universitaria','limadana@unasam.edu.pe','958784612'),(7,'12548765','Diana Katerine','Vega Perez','FEMENINO','Independencia av. Independencia','vegaperez@unasam.edu.pe','95812654'),(8,'12587965','Deysi Sofia','Cabello Rendon','FEMENINO','Yungay psj. Alonso','dcabellor@unasam.edu.pe','91254985'),(9,'32659887','Eli Sandra','Ardiles Torre','FEMENINO','Huacho','eardilest@unasam.edu.pe','958732654'),(10,'32655487','Angel','Molina Morales','MASCULINO','Lima','amolinam@unasam.edu.pe','943879852'),(11,'98653254','Mario Luis','Caceres Lopez','MASCULINO','Bolognesi','mcaceresl@unasam.edu.pe','943369852'),(12,'45987612','Luis Estefano','Lopez Torres','MASCULINO','Pomabamba','llopezt@unasam.edu.pe','98745623'),(13,'12456598','Esmeralda Eliza','Roque Lucero','FEMENINO','Independencia','eroquel@unasam.edu.pe','94875452'),(14,'12455689','Fiorella Esli','Mejia Limas','FEMENINO','Huaraz Soledad','fmegial@unasam.edu.pe','96587455'),(15,'48758956','Jorge Jose','Molina Jara','MASCULINO','Huaraz jr. Alonso','jmolinaj@unasam.edu.pe','9686865'),(16,'85746596','Julian Angel','Rosales Jara','MASCULINO','Yungay psj. Alonso','jrosalesj@unasam.edu.pe','95874585'),(17,'85957458','Ximena ','Coral','Femenino','dir 234','corellanor@unasam.edu.pe','963852444'),(18,'12344322','Claudia','briceño ','Femenino','dir','claudia@correo.com','963852744'),(19,'76565656','Jose','Lopez','Masculino','jr lodrrrrr','orellano428@gmail.com','9638527'),(20,'99887788','Jose','Lopez','Masculino','dir 234','orellano428@gmail.com','9638527'),(21,'78955455','Jose','Lopez','Masculino','duit','orellano428@correo.com','963852747'),(22,'77889999','Jose','Lopez','Masculino','duit','orellano428@gmail.com','963852777'),(23,'44556677','Maria','Coral','Femenino','duit','corellanor@unasam.edu.pe','963852747');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `porcentaje_descuento`
--

DROP TABLE IF EXISTS `porcentaje_descuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `porcentaje_descuento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `porcentaje` decimal(5,2) NOT NULL,
  `beneficio_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_PORCENTAJE_DESCUENTO_BENEFICIO1_idx` (`beneficio_id`),
  CONSTRAINT `fk_PORCENTAJE_DESCUENTO_BENEFICIO1` FOREIGN KEY (`beneficio_id`) REFERENCES `beneficio` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `porcentaje_descuento`
--

LOCK TABLES `porcentaje_descuento` WRITE;
/*!40000 ALTER TABLE `porcentaje_descuento` DISABLE KEYS */;
/*!40000 ALTER TABLE `porcentaje_descuento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedencia`
--

DROP TABLE IF EXISTS `procedencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedencia`
--

LOCK TABLES `procedencia` WRITE;
/*!40000 ALTER TABLE `procedencia` DISABLE KEYS */;
INSERT INTO `procedencia` VALUES (1,'Callejon de Huaylas'),(2,'Callejon de Conchucos'),(3,'Huaraz'),(4,'Lima'),(5,'Huanuco');
/*!40000 ALTER TABLE `procedencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolucion_x_beneficio`
--

DROP TABLE IF EXISTS `resolucion_x_beneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolucion_x_beneficio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_resolucion` varchar(45) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `beneficio_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_RESOLUCION_X_BENEFICIO_BENEFICIO_idx` (`beneficio_id`),
  CONSTRAINT `fk_RESOLUCION_X_BENEFICIO_BENEFICIO` FOREIGN KEY (`beneficio_id`) REFERENCES `beneficio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolucion_x_beneficio`
--

LOCK TABLES `resolucion_x_beneficio` WRITE;
/*!40000 ALTER TABLE `resolucion_x_beneficio` DISABLE KEYS */;
INSERT INTO `resolucion_x_beneficio` VALUES (1,' ','2021-11-20','COMPLETADO',16),(2,' RES_44','2021-11-21','COMPLETADO',17),(3,' RES_443','2021-12-05','PENDIENTE',18),(4,' RES_66','2021-11-25','COMPLETADO',20),(5,' RES_22 mo','2021-11-17','COMPLETADO',21),(6,' RES_55','2021-11-21','COMPLETADO',22),(7,' RES_1222','2021-11-21','COMPLETADO',23),(8,' RES_22','2021-11-21','COMPLETADO',24),(9,' RES_12345','2021-11-25','COMPLETADO',1),(10,' RES_778','2021-11-21','COMPLETADO',2),(11,' RES_58','2021-11-18','COMPLETADO',25),(12,' RES_66','2021-11-23','COMPLETADO',26),(13,' RES_33333','2021-11-24','PENDIENTE',3),(14,' RES_002','2021-11-17','COMPLETADO',28),(15,'RES_22','2021-11-18','PENDIENTE',29),(16,'23rwvf','2021-12-17','PENDIENTE',10);
/*!40000 ALTER TABLE `resolucion_x_beneficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semestre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
INSERT INTO `semestre` VALUES (1,'Sin Semestre','2000-01-01','2000-01-01','ACTIVO'),(2,'Semestre 2021','2021-01-01','2021-04-04','ACTIVO'),(3,'2022-I','2022-02-07','2022-05-22','INACTIVO');
/*!40000 ALTER TABLE `semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_grupo`
--

DROP TABLE IF EXISTS `tipo_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_grupo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_grupo`
--

LOCK TABLES `tipo_grupo` WRITE;
/*!40000 ALTER TABLE `tipo_grupo` DISABLE KEYS */;
INSERT INTO `tipo_grupo` VALUES (1,'Académico '),(2,'Teatro'),(3,'Deportivo'),(4,'Música'),(5,' Tipo 1 '),(6,' Tipos 2 '),(7,' Tipo 3 '),(8,' Tipo 4 '),(9,' Tipo 5 '),(10,' Tipo 6 '),(11,' Tipo 7 '),(12,' Tipo 8 '),(13,' Tipo 8 '),(14,' Tipo 9 '),(15,' Tipo 10 '),(16,' Tipo 11 '),(17,' Tipo 12 '),(18,' Tipo 13 '),(19,' Tipo 14 '),(20,' Tipo 15 '),(21,' Tipo 16 '),(22,' Tipo 17 '),(23,' Tipo 18 '),(24,' Tipo 19 '),(25,' Tipo z'),(26,' Tipo y '),(27,'Tipo u'),(28,'tipo nnn'),(29,'Tipo a'),(30,'Musica new');
/*!40000 ALTER TABLE `tipo_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Admin'),(2,'Director'),(3,'Nuevo Rol'),(4,'Prueba'),(5,'Narro'),(6,'Profe'),(7,'Rol 1');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `pass` text NOT NULL,
  `estado` varchar(45) NOT NULL,
  `tipo_usuario_id` int NOT NULL,
  `confirmado` tinyint(1) DEFAULT NULL,
  `token` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_USUARIO_TIPO_USUARIO1_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_USUARIO_TIPO_USUARIO1` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin12','activo',1,0,''),(2,'ximena','$2y$10$Z6L2n.y6Y9YnRawDXXuNPuQ6JhfMfeZ0PU2AMkO6xbv69D1OFibva','activo',6,0,''),(3,'claudia','12344322','activo',4,0,NULL),(4,'prueba','$2y$10$abtysFw/wF5cO3/7dMjcc.eyw7Kx0sXICXseo/GU4o8iYG3vG0c0K','activo',4,0,NULL),(5,'Maria','$2y$10$.DuQ4LWn8iGMRoDaa7xHG.GzisX.p2HYDJXc9WsgPLB1fFAFRKDuK','activo',7,0,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vista_estudiantes`
--

DROP TABLE IF EXISTS `vista_estudiantes`;
/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_estudiantes` AS SELECT 
 1 AS `idPersona`,
 1 AS `dni`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `genero`,
 1 AS `direccion`,
 1 AS `email`,
 1 AS `telefono`,
 1 AS `idAlumno`,
 1 AS `codigo`,
 1 AS `idEscuela`,
 1 AS `nombre_escuela`,
 1 AS `idCondicionEconomica`,
 1 AS `nombre_condicion`,
 1 AS `idProcedencia`,
 1 AS `nombre_procedencia`,
 1 AS `idAlumnoGrupo`,
 1 AS `fecha_inscripcion`,
 1 AS `estado`,
 1 AS `idgrupo_universitario`,
 1 AS `fecha_creacion`,
 1 AS `resolucion_creacion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_usuarios`
--

DROP TABLE IF EXISTS `vista_usuarios`;
/*!50001 DROP VIEW IF EXISTS `vista_usuarios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_usuarios` AS SELECT 
 1 AS `idPersona`,
 1 AS `dni`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `genero`,
 1 AS `direccion`,
 1 AS `email`,
 1 AS `telefono`,
 1 AS `idDatosUsu`,
 1 AS `idUsuario`,
 1 AS `usuario`,
 1 AS `pass`,
 1 AS `estado`,
 1 AS `idTipoUsu`,
 1 AS `tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'app_unasam'
--
/*!50003 DROP FUNCTION IF EXISTS `func_EstadoInvitacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `func_EstadoInvitacion`(idInv int, fechaHora text) RETURNS varchar(12) CHARSET utf8mb3
    DETERMINISTIC
begin
if(select count(*) from participacion_alumno where invitacion_id=idInv)>0 then
return 'CUMPLIDA';
else
if(timestampdiff(day,curdate(),date(fechaHora)))>0 then
return 'VIGENTE';
else
return 'NO CUMPLIDA';
END IF;
END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `f_idSemestreInv` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `f_idSemestreInv`(id_invitacion int) RETURNS varchar(20) CHARSET utf8mb3
    DETERMINISTIC
begin
declare fecha_inv datetime;
set fecha_inv = (select fecha_hora from invitacion where id=id_invitacion);
if length(fecha_inv)>0 then
return (select id from semestre where fecha_inv between fecha_inicio and fecha_fin limit 1);
else
return null;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertUsuario`(dniP char(8), NombreP Varchar(45), apellido Varchar(45), genero Varchar(12), direccion Varchar(45),
email Varchar(45), telefono Varchar(9), usu Varchar(45), pass text, estado Varchar(45), idTipoUsuo int)
begin
declare idP int;
if(select count(*) from persona where dni=dniP)>0 then
set idP=(select id from persona where dni=dniP order by id desc limit 1 );
else
insert into persona values(null,dniP,nombreP,apellido,genero,direccion,email,telefono);
set idP=(select id from persona order by id desc limit 1);
end if;
if(select count(*) from usuario where usuario=usu)>0 then
select 0 valor;
else
insert into usuario values(null,usu,pass,estado,idTipoUsuo, 0,null);
insert into datos_usuario values(null,idP,(select id from usuario order by id desc limit 1));
select 1 valor;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_updateUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_updateUsuario`(idUsu int,dniP char(8), NombreP Varchar(45), apellidop Varchar(45), generop Varchar(12), direccionp Varchar(45),
emailp Varchar(45), telefonop Varchar(9), usu Varchar(45), passu text, estadou Varchar(45), idTipoUsu int)
begin
declare idP int;
set idP=(select idPersona from vista_usuarios where idUsuario=idUsu);
if(select count(*) from persona where dni=dniP and id!=idP)>0 then
select 0 valor;
else
if(select count(*) from usuario where usuario=usu and id!=idUsu)>0 then
select 1 valor;
else
update persona set dni=dniP,nombre=nombreP,apellido=apellidop,genero=generop,direccion=direccionp,email=emailp,telefono=telefonop where id=idP;
update usuario set usuario=usu,estado=estadou,tipo_usuario_id=idTipoUsu where id=idUsu;
select 2 valor;
end if;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_ingresar_alumno_grupo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ingresar_alumno_grupo`(codigoA varchar(45),personaID int, descripcionSocio longtext,fecha_inscripcion date, estadoA varchar(45),id_Grupo_U int)
begin
declare id_Alumno int;
declare id_Formacion int;
declare id_Alumno_G int;
if (select count(*) from alumno where codigo=codigoA)>0 then
set id_Alumno= (select id from alumno where codigo=codigoA order by id desc limit 1 );
set id_Formacion= (select id from formacion_socioeconomica where alumno_id=id_Alumno order by id desc limit 1 );
update formacion_socioeconomica set descripcion= descripcionSocio where id=id_Formacion;
else
insert into alumno(codigo, persona_id) values(codigoA,personaID);
insert into formacion_socioeconomica values(null,descripcion,id_Alumno);
select 2;
end if;
set id_Alumno= (select id from alumno where codigo=codigoA order by id desc limit 1 );
if(select count(*) from alumno_x_grupo where alumno_id=id_Alumno and grupo_universitario_id=id_Grupo_U)>0 then
set id_Alumno_G= (select id from alumno_x_grupo where grupo_universitario_id=id_Grupo_U and alumno_id=id_Alumno order by id desc limit 1 );
update alumno_x_grupo set fecha_inscripcion=fecha_inscripcion,estado=estadoA where id=id_Alumno_G;
else
select id_Alumno;
insert into alumno_x_grupo values(null,fecha_inscripcion,estadoA,id_Grupo_U,id_Alumno);
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vista_estudiantes`
--

/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_estudiantes` AS select `p`.`id` AS `idPersona`,`p`.`dni` AS `dni`,`p`.`nombre` AS `nombre`,`p`.`apellido` AS `apellido`,`p`.`genero` AS `genero`,`p`.`direccion` AS `direccion`,`p`.`email` AS `email`,`p`.`telefono` AS `telefono`,`a`.`id` AS `idAlumno`,`a`.`codigo` AS `codigo`,`e`.`id` AS `idEscuela`,`e`.`nombre` AS `nombre_escuela`,`ce`.`id` AS `idCondicionEconomica`,`ce`.`nombre` AS `nombre_condicion`,`pro`.`id` AS `idProcedencia`,`pro`.`nombre` AS `nombre_procedencia`,`ag`.`id` AS `idAlumnoGrupo`,`ag`.`fecha_inscripcion` AS `fecha_inscripcion`,`ag`.`estado` AS `estado`,`gu`.`id` AS `idgrupo_universitario`,`gu`.`fecha_creacion` AS `fecha_creacion`,`gu`.`resolucion_creacion` AS `resolucion_creacion` from ((((((`persona` `p` join `alumno` `a` on((`p`.`id` = `a`.`persona_id`))) join `escuela` `e` on((`e`.`id` = `a`.`escuela_id`))) join `condicion_economica` `ce` on((`ce`.`id` = `a`.`condicion_economica_id`))) join `procedencia` `pro` on((`pro`.`id` = `a`.`procedencia_id`))) join `alumno_x_grupo` `ag` on((`ag`.`alumno_id` = `a`.`id`))) join `grupo_universitario` `gu` on((`gu`.`id` = `ag`.`grupo_universitario_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_usuarios`
--

/*!50001 DROP VIEW IF EXISTS `vista_usuarios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_usuarios` AS select `p`.`id` AS `idPersona`,`p`.`dni` AS `dni`,`p`.`nombre` AS `nombre`,`p`.`apellido` AS `apellido`,`p`.`genero` AS `genero`,`p`.`direccion` AS `direccion`,`p`.`email` AS `email`,`p`.`telefono` AS `telefono`,`du`.`id` AS `idDatosUsu`,`u`.`id` AS `idUsuario`,`u`.`usuario` AS `usuario`,`u`.`pass` AS `pass`,`u`.`estado` AS `estado`,`tu`.`id` AS `idTipoUsu`,`tu`.`nombre` AS `tipo` from (((`persona` `p` join `datos_usuario` `du` on((`du`.`persona_id` = `p`.`id`))) join `usuario` `u` on((`u`.`id` = `du`.`usuario_id`))) join `tipo_usuario` `tu` on((`tu`.`id` = `u`.`tipo_usuario_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-03  0:50:51
