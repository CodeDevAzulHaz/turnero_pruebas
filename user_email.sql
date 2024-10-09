DROP TABLE IF EXISTS `user_email`;

CREATE TABLE `user_email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `port` varchar(255) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `id` (`id`),
  CONSTRAINT `userid` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON UPDATE RESTRICT
) ENGINE=InnoDB;

