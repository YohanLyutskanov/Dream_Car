-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dream_car
CREATE DATABASE IF NOT EXISTS `dream_car` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dream_car`;

-- Dumping structure for table dream_car.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `importer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95C71D147FCFE58E` (`importer_id`),
  CONSTRAINT `FK_95C71D147FCFE58E` FOREIGN KEY (`importer_id`) REFERENCES `importers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dream_car.cars: ~11 rows (approximately)
DELETE FROM `cars`;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id`, `brand`, `year`, `power`, `description`, `importer_id`) VALUES
	(1, 'Audi', 2014, 116, 'This is Audi A4', 1),
	(2, 'BMW', 2010, 110, 'This is BMW X1', 5),
	(3, 'VW', 2013, 75, 'VW Golf 5', 4),
	(5, 'Opel', 2000, 65, 'Opel Astra', 3),
	(6, 'Toyota', 2012, 154, 'This is Toyota Rav4', 2),
	(8, 'Audi', 1999, 100, 'This is Audi RS7', 3),
	(9, 'Lada', 1969, 55, 'This is Lada Niva', 5),
	(11, 'Audi', 1900, 213, 'This is Audi Q7', 5),
	(14, 'Mercedes', 2013, 550, 'This is Mercedes C220', 2),
	(15, 'Mazda', 2008, 90, 'This is Mazda 3', 4),
	(16, 'Audi', 2008, 116, 'This is Audi A3', 1);
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping structure for table dream_car.importers
CREATE TABLE IF NOT EXISTS `importers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `importer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_B5BB4DC264E883E8` (`importer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table dream_car.importers: ~5 rows (approximately)
DELETE FROM `importers`;
/*!40000 ALTER TABLE `importers` DISABLE KEYS */;
INSERT INTO `importers` (`id`, `importer`) VALUES
	(1, 'Bavaria Auto'),
	(5, 'Cars-BG'),
	(4, 'Luxury Cars'),
	(3, 'New Cars'),
	(2, 'Sofauto');
/*!40000 ALTER TABLE `importers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
