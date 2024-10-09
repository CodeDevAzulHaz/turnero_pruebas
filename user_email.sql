/*
SQLyog Community
MySQL - 8.3.0 : Database - turnero
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`turnero` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `turnero`;

/*Table structure for table `users_email` */

DROP TABLE IF EXISTS `users_email`;

CREATE TABLE `users_email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_general_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_userId_email` (`userId`),
  CONSTRAINT `fk_userId_email` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `users_email_config` */

DROP TABLE IF EXISTS `users_email_config`;

CREATE TABLE `users_email_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `host` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senderName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `port` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_userId_econfig` (`userId`),
  CONSTRAINT `fk_userId_econfig` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
