-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: nueva_sonrisa
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `especialidad_users`
--

DROP TABLE IF EXISTS `especialidad_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidad_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `especialidad_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `especialidad_users_user_id_foreign` (`user_id`),
  KEY `especialidad_users_especialidad_id_foreign` (`especialidad_id`),
  CONSTRAINT `especialidad_users_especialidad_id_foreign` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidads` (`id`),
  CONSTRAINT `especialidad_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad_users`
--

LOCK TABLES `especialidad_users` WRITE;
/*!40000 ALTER TABLE `especialidad_users` DISABLE KEYS */;
INSERT INTO `especialidad_users` VALUES (2,5,8,'2023-11-24 03:31:48','2023-11-24 03:31:48'),(3,4,2,'2023-11-24 03:32:35','2023-11-24 03:32:35'),(4,18,5,NULL,NULL);
/*!40000 ALTER TABLE `especialidad_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidads`
--

DROP TABLE IF EXISTS `especialidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidads`
--

LOCK TABLES `especialidads` WRITE;
/*!40000 ALTER TABLE `especialidads` DISABLE KEYS */;
INSERT INTO `especialidads` VALUES (1,'otorrino','Otorrinolaringología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(2,'general','Medicina General','2023-11-24 02:59:23','2023-11-24 02:59:23'),(3,'pediatra','Pediatría','2023-11-24 02:59:23','2023-11-24 02:59:23'),(4,'aneste','Anestesiología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(5,'cardio','Cardiología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(6,'gastro','Gastroenterología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(7,'gineco','Ginecología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(8,'psico','Psicología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(9,'psiquia','Psiquiatría','2023-11-24 02:59:23','2023-11-24 02:59:23'),(10,'ortope','Ortopedia','2023-11-24 02:59:23','2023-11-24 02:59:23'),(11,'neuro','Neurología','2023-11-24 02:59:23','2023-11-24 02:59:23'),(12,'oftal','Oftalmología','2023-11-24 02:59:23','2023-11-24 02:59:23');
/*!40000 ALTER TABLE `especialidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `selector` bigint NOT NULL,
  `doctor_id` bigint NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `hora_cita` time NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (3,'14 Dic',1,8,5,'...','2023-12-14','10:45:00','#778cf3','2023-11-24 03:28:41','2023-11-24 03:28:41'),(4,'Cita 23 Dic',1,2,4,'Malestar en la cabeza','2023-12-23','13:30:00','#f86868','2023-11-24 03:29:37','2023-11-24 03:29:37'),(5,'Cita Anestesiología',1,4,2,'Anestesia para cirugía de hernia inguinal','2023-12-27','08:00:00','#81ec5b','2023-11-24 03:30:53','2023-11-24 03:30:53'),(7,'Cita 24',8,8,5,'Perdida de Familair','2023-11-24','00:44:00','#8e2e2e','2023-11-24 04:41:33','2023-11-24 04:41:33');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=368 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (358,'2014_10_12_000000_create_users_table',1),(359,'2014_10_12_100000_create_password_reset_tokens_table',1),(360,'2014_10_12_100000_create_password_resets_table',1),(361,'2019_08_19_000000_create_failed_jobs_table',1),(362,'2019_12_14_000001_create_personal_access_tokens_table',1),(363,'2023_10_25_220807_create_roles_table',1),(364,'2023_10_25_221116_create_role_user_table',1),(365,'2023_10_29_031425_create_especialidads_table',1),(366,'2023_10_30_160840_create_especialidad_users_table',1),(367,'2023_10_31_173447_create_eventos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,2,1,'2023-11-24 02:59:22','2023-11-24 02:59:22'),(3,3,3,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(4,3,4,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(5,3,5,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(6,3,6,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(7,1,7,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(8,2,8,'2023-11-24 04:40:33','2023-11-24 04:40:33'),(9,1,18,'2024-09-01 23:48:00','2024-09-01 23:48:00'),(10,2,19,'2024-09-02 00:41:25','2024-09-02 00:41:25');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2023-11-24 02:59:22','2023-11-24 02:59:22'),(2,'paciente','Paciente','2023-11-24 02:59:22','2023-11-24 02:59:22'),(3,'doctor','Doctor','2023-11-24 02:59:22','2023-11-24 02:59:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_document_unique` (`document`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Santiago','Giron Lozano','1005893342','Cra 29 # 98 - 51','gironlozano1975@gmail.com',NULL,'3188048049','$2y$10$zukcD5kG0TVbom8pFAF6p.DBl5bJwxT6hNgT7VnCPAwLVA9hWtilW',NULL,'2023-11-24 02:59:22','2023-11-24 04:38:30'),(3,'Julian Andres','Cifuentes Villada','1006053806','Cra 21e # 43 - 50','cifu@gmail.com',NULL,'3177100525','$2y$10$vnGz8TeeuLzpIz3Ahrob7OzE/zxaJSNzqftmaAIyHb1X1NdaT.IVu',NULL,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(4,'Adriana','Lozano Zamorano','66840413','Cra 54 # 32a - 24','alz@gmail.com',NULL,'3174125345','$2y$10$Su1zNMGtqVJrXbNdsHayL.FCOMwlmLBlbr1IYghff6H4u0HwbOV1C',NULL,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(5,'Johns James','Giron Lozano','94707431','Cra 74 # 23b - 46','joarasan@gmail.com',NULL,'3152341665','$2y$10$SII2.ciUb2AyytjkvIyspO5JBcOIdIitdUJdX8dK9at3dFvz5a6Cq',NULL,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(6,'Camila','Rosero Noguera','94145634','Cra 17f # 31 - 23','camirn@gmail.com',NULL,'318123991','$2y$10$XQXj1DWWiiZKNzBS.mh6ZuZdWMbmj7WJW369.9VXZUtWYnuO9pQ72',NULL,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(7,'Andres Mauricio','Muñoz Puyo','1323556443','Cra 105 #12b-118','andrespuyo@gmail.com',NULL,'3106017492','$2y$10$jD2djCF6xNiAaJ3PQrkkH.UNGE4YppYGXGUoUEm77bs3RlFgotSkW',NULL,'2023-11-24 02:59:23','2023-11-24 02:59:23'),(8,'Carlos','Bolaños','12345678','cra 45 # 32 56','carlos@gmail.com',NULL,'313454374','$2y$10$oU/VJLY6/Cj9/KTt6dOw4eagi16e7.hi.AgzpbkJmgr2mvfmAZ1qa',NULL,'2023-11-24 04:40:33','2023-11-24 04:40:33'),(15,'Octavio','Sabrundo','1005123123','Cra 18726 9asd80','oct@gmail.com','2024-05-21 06:24:48','313413534','$2y$04$PiZ/OFmrVDqakuZQ9ApPpeDyi3bu2Y4dTSuWP8.BPl/qhJ7SGTJKO','OOSfaiX5o2','2024-05-21 06:24:48','2024-05-21 06:24:48'),(18,'Esteban','Gonzalez Ceballos','1104804532','Kra 12','estebangonzalez@estudiante.uniajc.edu.co',NULL,'3162380774','$2y$10$QHYiwosdZYvY0gzWp.OAUuh6wNTO/Z2PmR/MKRYDWiXqUBJ4mqovu',NULL,'2024-09-01 23:48:00','2024-09-01 23:48:00'),(19,'Usuario','Prueba','123456789','kra 12','prueba@gmail.com',NULL,'12345','$2y$10$080A4MFe6peCQhe5T9/Jb.PTIIu/t.7JKCAcexbdE6tODR3q2CFay',NULL,'2024-09-02 00:41:25','2024-09-02 00:41:25');
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

-- Dump completed on 2024-09-14 18:14:26
