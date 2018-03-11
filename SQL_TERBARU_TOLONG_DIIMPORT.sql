-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 2017_pakar_jiwa
DROP DATABASE IF EXISTS `2017_pakar_jiwa`;
CREATE DATABASE IF NOT EXISTS `2017_pakar_jiwa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `2017_pakar_jiwa`;

-- Dumping structure for table 2017_pakar_jiwa.analisa_hasil
DROP TABLE IF EXISTS `analisa_hasil`;
CREATE TABLE IF NOT EXISTS `analisa_hasil` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=303 DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.analisa_hasil: 3 rows
DELETE FROM `analisa_hasil`;
/*!40000 ALTER TABLE `analisa_hasil` DISABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.gejala
DROP TABLE IF EXISTS `gejala`;
CREATE TABLE IF NOT EXISTS `gejala` (
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `nm_gejala` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`kd_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.gejala: 17 rows
DELETE FROM `gejala`;
/*!40000 ALTER TABLE `gejala` DISABLE KEYS */;
INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
	('G011', 'Delusi'),
	('G012', 'Gangguan konsentrasi\r\n'),
	('G013', 'Gangguan mentorik\r\n'),
	('G014', 'Gangguan mood\r\n'),
	('G015', 'Histeria\r\n'),
	('G016', 'Kurang perhatian dari orang tua\r\n'),
	('G017', 'Melawan orang tua\r\n'),
	('G018', 'Penyalahgunaan zat dan obat-obatan terlarang\r\n'),
	('G019', 'Depresi\r\n'),
	('G020', 'Halusinasi\r\n'),
	('G021', 'Kecemasan\r\n'),
	('G022', 'Stress\r\n'),
	('G023', 'Damensia\r\n'),
	('G024', 'Kesulitan Mengeja\r\n'),
	('G025', 'Obsesif kompulsif\r\n'),
	('G027', 'Fobia\r\n'),
	('G028', 'Autis');
/*!40000 ALTER TABLE `gejala` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.pakar
DROP TABLE IF EXISTS `pakar`;
CREATE TABLE IF NOT EXISTS `pakar` (
  `userID` varchar(50) NOT NULL,
  `passID` varchar(250) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.pakar: ~1 rows (approximately)
DELETE FROM `pakar`;
/*!40000 ALTER TABLE `pakar` DISABLE KEYS */;
INSERT INTO `pakar` (`userID`, `passID`) VALUES
	('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');
/*!40000 ALTER TABLE `pakar` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.penyakit
DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE IF NOT EXISTS `penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `nm_penyakit` varchar(60) NOT NULL,
  `pemeriksaan` text NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL,
  PRIMARY KEY (`kd_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.penyakit: 5 rows
DELETE FROM `penyakit`;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;
INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `pemeriksaan`, `keterangan`, `solusi`) VALUES
	('P004', 'Tumbuh Kembang', '-', '-', '<p>-</p>'),
	('P005', 'Psikosis', '-', '-', '<p>-</p>'),
	('P006', 'Neurosis', '-', '-', '<p>-</p>'),
	('P007', 'Kenakalan Remaja', '-', '-', '<p>-</p>'),
	('P008', 'Disolder', '-', '-', '<p>-</p>');
/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.relasi
DROP TABLE IF EXISTS `relasi`;
CREATE TABLE IF NOT EXISTS `relasi` (
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala1` char(4) NOT NULL,
  `kd_gejala2` char(4) DEFAULT NULL,
  `kd_gejala3` char(4) DEFAULT NULL,
  `id_relasi` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_relasi`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.relasi: 20 rows
DELETE FROM `relasi`;
/*!40000 ALTER TABLE `relasi` DISABLE KEYS */;
INSERT INTO `relasi` (`kd_penyakit`, `kd_gejala1`, `kd_gejala2`, `kd_gejala3`, `id_relasi`) VALUES
	('P006', 'G014', 'G023', '', 1),
	('P004', 'G013', '', '', 2),
	('P005', 'G012', 'G025', '', 12),
	('P008', 'G012', 'G024', '', 3),
	('P005', 'G012', 'G023', '', 13),
	('P005', 'G011', 'G022', 'G027', 4),
	('P006', 'G011', 'G022', 'G023', 14),
	('P006', 'G011', 'G021', '', 5),
	('P005', 'G011', 'G020', '', 15),
	('P005', 'G011', 'G019', 'G027', 6),
	('P004', 'G028', '', '', 16),
	('P005', 'G011', 'G019', 'G023', 7),
	('P005', 'G014', 'G027', '', 17),
	('P005', 'G014', 'G025', '', 8),
	('P006', 'G015', 'G019', '', 18),
	('P006', 'G015', 'G020', '', 9),
	('P005', 'G015', 'G022', '', 19),
	('P005', 'G016', '', '', 10),
	('P007', 'G018', '', '', 20),
	('P007', 'G017', '', '', 11),
	('P008', 'G011', 'G019', 'G022', 39);
/*!40000 ALTER TABLE `relasi` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.tmp_analisa
DROP TABLE IF EXISTS `tmp_analisa`;
CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `noip` varchar(60) NOT NULL DEFAULT '',
  `kd_penyakit` char(4) NOT NULL DEFAULT '',
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.tmp_analisa: 0 rows
DELETE FROM `tmp_analisa`;
/*!40000 ALTER TABLE `tmp_analisa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_analisa` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.tmp_gejala
DROP TABLE IF EXISTS `tmp_gejala`;
CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `kd_gejala` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.tmp_gejala: 0 rows
DELETE FROM `tmp_gejala`;
/*!40000 ALTER TABLE `tmp_gejala` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_gejala` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.tmp_pasien
DROP TABLE IF EXISTS `tmp_pasien`;
CREATE TABLE IF NOT EXISTS `tmp_pasien` (
  `id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nama` varchar(60) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.tmp_pasien: 1 rows
DELETE FROM `tmp_pasien`;
/*!40000 ALTER TABLE `tmp_pasien` DISABLE KEYS */;
INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `noip`, `tanggal`) VALUES
	(0155, '1', 'P', '1', '1', '127.0.0.1', '2018-02-25 18:05:46');
/*!40000 ALTER TABLE `tmp_pasien` ENABLE KEYS */;

-- Dumping structure for table 2017_pakar_jiwa.tmp_penyakit
DROP TABLE IF EXISTS `tmp_penyakit`;
CREATE TABLE IF NOT EXISTS `tmp_penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table 2017_pakar_jiwa.tmp_penyakit: 0 rows
DELETE FROM `tmp_penyakit`;
/*!40000 ALTER TABLE `tmp_penyakit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmp_penyakit` ENABLE KEYS */;

-- Dumping structure for view 2017_pakar_jiwa.vw_gejala
DROP VIEW IF EXISTS `vw_gejala`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_gejala` (
	`kd_gejala` CHAR(4) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_gejala` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view 2017_pakar_jiwa.vw_relasi
DROP VIEW IF EXISTS `vw_relasi`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_relasi` (
	`id_relasi` INT(11) NOT NULL,
	`kd_penyakit` CHAR(4) NOT NULL COLLATE 'latin1_swedish_ci',
	`nm_penyakit` VARCHAR(60) NULL COLLATE 'latin1_swedish_ci',
	`kd_gejala1` CHAR(4) NOT NULL COLLATE 'latin1_swedish_ci',
	`gejala1` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`kd_gejala2` CHAR(4) NULL COLLATE 'latin1_swedish_ci',
	`gejala2` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci',
	`kd_gejala3` CHAR(4) NULL COLLATE 'latin1_swedish_ci',
	`gejala3` VARCHAR(500) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view 2017_pakar_jiwa.vw_gejala
DROP VIEW IF EXISTS `vw_gejala`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_gejala`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_gejala` AS select distinct `r`.`kd_gejala1` AS `kd_gejala`,`g`.`nm_gejala` AS `nm_gejala` from ((((`relasi` `r` left join `penyakit` `p` on((`p`.`kd_penyakit` = `r`.`kd_penyakit`))) left join `gejala` `g` on((`g`.`kd_gejala` = `r`.`kd_gejala1`))) left join `gejala` `g1` on((`g1`.`kd_gejala` = `r`.`kd_gejala2`))) left join `gejala` `g2` on((`g2`.`kd_gejala` = `r`.`kd_gejala3`))) order by `g`.`nm_gejala`;

-- Dumping structure for view 2017_pakar_jiwa.vw_relasi
DROP VIEW IF EXISTS `vw_relasi`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_relasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relasi` AS select `r`.`id_relasi` AS `id_relasi`,`r`.`kd_penyakit` AS `kd_penyakit`,`p`.`nm_penyakit` AS `nm_penyakit`,`r`.`kd_gejala1` AS `kd_gejala1`,`g`.`nm_gejala` AS `gejala1`,`r`.`kd_gejala2` AS `kd_gejala2`,`g1`.`nm_gejala` AS `gejala2`,`r`.`kd_gejala3` AS `kd_gejala3`,`g2`.`nm_gejala` AS `gejala3` from ((((`relasi` `r` left join `penyakit` `p` on((`p`.`kd_penyakit` = `r`.`kd_penyakit`))) left join `gejala` `g` on((`g`.`kd_gejala` = `r`.`kd_gejala1`))) left join `gejala` `g1` on((`g1`.`kd_gejala` = `r`.`kd_gejala2`))) left join `gejala` `g2` on((`g2`.`kd_gejala` = `r`.`kd_gejala3`))) order by `p`.`nm_penyakit`,`g`.`nm_gejala`,`g1`.`nm_gejala`,`g2`.`nm_gejala`;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
