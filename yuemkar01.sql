-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                10.4.17-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win64
-- HeidiSQL Sürüm:               11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- yuemkar01 için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `yuemkar01` /*!40100 DEFAULT CHARACTER SET ucs2 */;
USE `yuemkar01`;

-- tablo yapısı dökülüyor yuemkar01.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `isMenu` tinyint(1) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- yuemkar01.category: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
REPLACE INTO `category` (`id`, `title`, `isActive`, `isMenu`, `createdAt`) VALUES
	(16, 'Falfabe', 1, 1, '2020-12-05 01:29:19');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- tablo yapısı dökülüyor yuemkar01.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `comment` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `post_id` int(11) unsigned DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  CONSTRAINT `FK_comments_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- yuemkar01.comments: ~0 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
REPLACE INTO `comments` (`id`, `user_id`, `name`, `email`, `comment`, `createdAt`, `post_id`, `isActive`) VALUES
	(33, 17, 'yunusemrekaruser', 'yunusemrekaruser@gmail.com', '180929041 Yunus Emre Kar<div>\r\n\r\n180929041 Yunus Emre Kar\r\n\r\n<br></div>', '2020-12-08 16:45:38', 24, 1),
	(34, 17, 'yunusemrekaruser', 'yunusemrekaruser@gmail.com', 'YunusEmrePhpBLOG', '2020-12-08 16:50:51', 25, 1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- tablo yapısı dökülüyor yuemkar01.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(8) DEFAULT 0,
  `title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_turkish_ci DEFAULT NULL,
  `post_type` int(11) DEFAULT 1,
  `img_url` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `video_url` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `display_count` int(11) DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `createdAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- yuemkar01.post: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
REPLACE INTO `post` (`id`, `user_id`, `title`, `description`, `post_type`, `img_url`, `video_url`, `display_count`, `category_id`, `isActive`, `createdAt`) VALUES
	(24, 6, 'FalBLOG', '<p>FALFABE</p>', 1, 'Adsız.png', '', 18, 16, 1, '2020-12-08 15:56:44'),
	(25, 6, 'YunusEmre', '<p>YunusEmre<br></p>', 1, 'Adsız.png', '', 5, 16, 1, '2020-12-08 16:50:26'),
	(26, 18, 'YazarDeneme', '<p>\r\n\r\nYazarDeneme\r\n\r\n<br></p><p>\r\n\r\nYazarDeneme\r\n\r\n<br></p><p>\r\n\r\nYazarDeneme\r\n\r\n<br></p>', 10, '', '', 1, 16, 1, '2020-12-08 16:53:35');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

-- tablo yapısı dökülüyor yuemkar01.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `about_me` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_turkish_ci DEFAULT NULL,
  `profile_image_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `post_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- yuemkar01.settings: ~2 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`id`, `full_name`, `about_me`, `email`, `phone`, `profile_image_url`, `isActive`, `post_type`) VALUES
	(31, 'Yunus Emre Kar PHP', '<p>Yunus Emre Kar PHP 180929041<br></p>', 'yunusemrekarphp@gmail.com', '5432010734', '', 1, 10);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- tablo yapısı dökülüyor yuemkar01.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT 0,
  `sbox` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- yuemkar01.user: ~3 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `full_name`, `email`, `password`, `createdAt`, `isActive`, `sbox`) VALUES
	(6, 'Yunus Emrelocal', 'yunusemreadmin@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-06 20:11:31', 1, 'Admin'),
	(11, 'yunusemreuser', 'yunusemreuser@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-07 01:06:33', 1, 'User'),
	(12, 'yunusemreauthor', 'yunusemreauthor@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-07 01:06:48', 1, 'Author'),
	(17, 'yunusemrekaruser', 'yunusemrekaruser@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-12-08 16:44:37', 1, 'User'),
	(18, 'yunusphpauthor', 'yunusphpauthor@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-12-08 16:52:47', 1, 'Author');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
