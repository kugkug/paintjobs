-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_paintjobs.tbl_paintjobs
CREATE TABLE IF NOT EXISTS `tbl_paintjobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plateno` varchar(10) DEFAULT NULL,
  `currentcolor` varchar(10) DEFAULT NULL,
  `targetcolor` varchar(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `entrydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table db_paintjobs.tbl_paintjobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_paintjobs` DISABLE KEYS */;
INSERT INTO `tbl_paintjobs` (`id`, `plateno`, `currentcolor`, `targetcolor`, `status`, `entrydate`) VALUES
	(1, '123456', 'red', 'green', 'completed', '2021-03-17 13:40:28'),
	(2, '123456', 'red', 'green', 'completed', '2021-03-17 13:40:39'),
	(3, '12343', 'green', 'blue', 'completed', '2021-03-17 13:47:54'),
	(4, '122 343', 'blue', 'red', 'completed', '2021-03-17 13:48:01'),
	(5, '1222 343', 'red', 'green', 'completed', '2021-03-17 13:48:07'),
	(6, '222 343', 'blue', 'blue', 'completed', '2021-03-17 13:48:17');
/*!40000 ALTER TABLE `tbl_paintjobs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
