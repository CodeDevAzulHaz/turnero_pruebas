DROP DATABASE turnero;

CREATE DATABASE turnero CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

use turnero;


DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `ciudad` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=INNODB;




DROP TABLE IF EXISTS `users_email`;

CREATE TABLE `users_email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `enlace` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userId_email`  FOREIGN KEY (`userId`)  REFERENCES `usuarios` (`id`)
) ENGINE=INNODB;


DROP TABLE IF EXISTS `users_email_config`;

CREATE TABLE `users_email_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `host` varchar(255) NOT NULL,
  `senderName` varchar(255) NOT NULL,
  `port` varchar(255) NOT NULL,
  `encryption` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userId_econfig`  FOREIGN KEY (`userId`)  REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `users_cliente_saludo`;

CREATE TABLE `users_cliente_saludo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `descuento` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userId_econfig`  FOREIGN KEY (`userId`)  REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB;
