# Database
<link rel="databse sql" href="database/ppiasupan_200_cooking_recipe">
This is where you will place information about your database:
- Structure
- SQL dump
- etc.

admin:

username: ppiasupan
password: cl@dr0Stis
database: ppiasupan_200_cooking_recipe


my databse 
-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `iframe`;
CREATE TABLE `iframe` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `website_url` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `width` int NOT NULL,
  `height` int NOT NULL,
  `iframe_code` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `iframe` (`id`, `website_url`, `title`, `width`, `height`, `iframe_code`) VALUES
(23,	'https://www.waimea.school.nz/',	'waimea',	1,	1,	'1'),
(24,	'https://www.waimea.school.nz/',	'waimea',	1,	1,	'1'),
(25,	'https://www.waimea.school.nz/',	'waimea',	2,	1,	'2'),
(26,	'https://www.waimea.school.nz/',	'waimea',	2,	1,	'12'),
(27,	'https://www.waimea.school.nz/',	'Yes',	2,	2,	'4'),
(28,	'https://www.wikipedia.org/',	'uh',	2,	2,	'2'),
(29,	'https://www.wikipedia.org/',	'uh',	2,	2,	'2');

DROP TABLE IF EXISTS `website_explanations`;
CREATE TABLE `website_explanations` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `iframe_id` bigint DEFAULT NULL,
  `explanations` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  KEY `idx_iframe_id` (`iframe_id`),
  CONSTRAINT `website_explanations_ibfk_1` FOREIGN KEY (`iframe_id`) REFERENCES `iframe` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `website_explanations` (`id`, `iframe_id`, `explanations`) VALUES
(1,	28,	'sdfdf'),
(2,	29,	'sdfdf');

-- 2024-09-01 22:51:44
