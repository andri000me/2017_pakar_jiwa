-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2017 at 01:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2017_pakar_jiwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa_hasil`
--

CREATE TABLE `analisa_hasil` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa_hasil`
--

INSERT INTO `analisa_hasil` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `kd_penyakit`, `noip`, `tanggal`) VALUES
(0190, 'Ramdan', 'P', 'Madiun', 'Swasta', 'P001', '127.0.0.1', '2013-06-23 00:21:20'),
(0189, 'nokia e63', 'P', 'xxxxx', 'xxxxx', 'P005', '192.168.233.101', '2013-06-22 15:30:51'),
(0188, 'nokia tes', 'P', 'xxxx', 'xxxxxx', 'P014', '192.168.233.101', '2013-06-22 15:27:22'),
(0187, 'Tes', 'P', 'tes', 'mencoba', 'P008', '127.0.0.1', '2013-06-22 15:20:49'),
(0186, 'Tes', 'P', 'tes', 'tes', 'P013', '127.0.0.1', '2013-06-22 15:18:50'),
(0185, 'Tes', 'P', 'tes', 'ting', 'P001', '127.0.0.1', '2013-06-22 15:02:29'),
(0184, 'guh', 'P', 'madiun', 'swasta', 'P014', '127.0.0.1', '2013-06-22 12:09:21'),
(0183, 'reski', 'P', 'tes', 'tes', 'P001', '127.0.0.1', '2013-06-22 01:28:21'),
(0182, 'bismillah', 'P', 'a', 'a', 'P002', '127.0.0.1', '2013-06-22 01:22:50'),
(0181, 'reski', 'P', 'tes', 'tes', 'P015', '127.0.0.1', '2013-06-22 01:21:15'),
(0180, 'reski', 'P', 'tes', 'tes', 'P001', '127.0.0.1', '2013-06-22 01:20:30'),
(0179, 'tes', 'P', 'tes', 'tes', 'P001', '127.0.0.1', '2013-06-22 01:15:40'),
(0178, 'tes', 'P', 'tes', 'a', 'P001', '127.0.0.1', '2013-06-22 01:12:16'),
(0177, 'reski', 'P', 'x', 'x', 'P005', '127.0.0.1', '2013-06-22 01:00:27'),
(0176, 'reski', 'P', 'madiun', 'maha', 'P001', '127.0.0.1', '2013-06-22 00:59:33'),
(0175, 'Alfan', 'P', 'Madiun', 'Mahasiswa', 'P014', '127.0.0.1', '2013-06-22 00:55:33'),
(0174, 'Tes', 'W', 'madiun', 'swasta', 'P001', '127.0.0.1', '2013-06-22 00:44:59'),
(0173, 'reski', 'P', 'Jiwan', 'Mahasiswa', 'P013', '127.0.0.1', '2013-06-22 00:42:05'),
(0172, 'ujicoba', 'P', 'madiun,jawa timur, indonesia', 'wiraswasta', 'P005', '192.168.233.101', '2013-06-22 00:40:22'),
(0191, 'XXXX', 'P', 'XXXX', 'XXXX', 'P002', '127.0.0.1', '2013-09-23 09:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `nm_gejala` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
('G001', 'selalu menangis atau mengeluarkan air mata'),
('G002', 'selalu menggosokan mata ketangkringan'),
('G003', 'mengantuk,lemas dan kurus'),
('G004', 'pembengkakan dan kemerahan disekitar mata'),
('G005', 'kotoran encer berwarna putih'),
('G006', 'tumbuh kutil atau nodul pada daerah bebas bulu seperti kaki, margin dari mata dan dasar paruh.'),
('G007', 'nafas tersenggal-senggal'),
('G008', 'pernapasan ngorok'),
('G009', 'sering bersin'),
('G010', 'hidung lembab, basah, berlendir');

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE `pakar` (
  `userID` varchar(50) NOT NULL,
  `passID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`userID`, `passID`) VALUES
('admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `nm_penyakit` varchar(60) NOT NULL,
  `pemeriksaan` text NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `pemeriksaan`, `keterangan`, `solusi`) VALUES
('P001', 'Penyakit mata lovebird (snot)', 'mata berair.', 'Snot merupakan salah penyakit mata yang sering menimpa lovebird. Penyakit ini ditandai dengan mata burung yang membengkak dan mengeluarkan air. Hal ini disebabkan kondisi kesehatan burung yang menurun karena terlalu lama dalam proses penjemuran dan udara di siang hari yang cukup panas.', '<p><ol>\r\n<li>Pemberian salep mata merek chlorampenicol, dioleskan setiap pagi sambil burung tersebut dikarantina dari angin dan sinar matahari (jangan di jemur).</li>\r\n<li>pemberian obat merek Bodrex 1/2 tablet yang dihancurkan terlebih dahulu, kemudian dicampurkan kedalam air minumnya. ganti air setiap hari dengan resep yang sama. biasanya dalam satu minggu burung akan sembuh total dari sakit mata. Untuk menghindari burung krmbali terserang penyakit mata, teruskan pemberian obat sampai minggu kedua. selama pengobatan, burung tidak perlu dijemur, &nbsp;pakan diberikan seperti biasa dan kebersihan kandang harus lebih di perhatikan.&nbsp;</li>\r\n</ol></p>\r\n<p><strong><span style="text-decoration: underline;">NB: Pisahkan love bird yang terinfeksi penyakit mata karna sangat mudah menular</span></strong></p>'),
('P002', 'Patex/Avian Pox/Cacar Unggas', 'tumbuh seperti kutil atau nodul', 'Penyakit ini disebabkan oleh beberapa strain virus cacar', '<p><ol>\r\n<li>Menangkap, mengisolasi,mengobati, bahkan memusnahkan burung yang terkena infeksi</li>\r\n<li>Menghilangkan genangan air sehingga mengurangi populasi nyamuk</li>\r\n<li>pengumpan, wateres, birdbaths perlu didekontaminasi dengan larutan pemutih 10%</li>\r\n</ol></p>'),
('P003', 'Penyakit saluran pernafasan', 'nafas tersenggal', 'Penyebab penyakit pernapasan adalah adanya infeksi sekunder pada saluran pernapasan oleh E. coli dan virus sejenis Mycoplasma gallisepticcum yang lebih terkenal dengan nama CRD (Chronic Respiratory Desease).', '<p><ol>\r\n<li>Burung love bird yang terinfeksi penyakit pernapasan segera diisolasi di kandang tersendiri dan diobati agar tidak menular kepada burung-burung kenari yang lain.</li>\r\n<li>Sangkar, tempat makan, dan tempat minum selalu dikontrol dan semua kotoran yang terdapat di dalam sangkar ataupun di dalam wadah makanan/minuman selalu dibersihkan.</li>\r\n<li>Makanan yang akan diberikan dicuci bersih dan dikeringkan untuk menghilangkan kemungkinan adanya residu pestisida pertanian yang membahayakan kesehatan burung.</li>\r\n<li>Minuman yang kotor segera diganti dengan air yang bersih, segar, sehat, dan tidak mengandung bahan-bahan beracun yang membahayakan kesehatan burung. Air untuk minum direbus terlebih dahulu hingga mendidih untuk membunuh semua jenis bibit penyakit yang terdapat di dalamnya.</li>\r\n</ol></p>');

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `kd_penyakit` char(4) NOT NULL,
  `kd_gejala` char(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`kd_penyakit`, `kd_gejala`) VALUES
('P001', 'G001'),
('P001', 'G002'),
('P001', 'G003'),
('P001', 'G004'),
('P001', 'G005'),
('P002', 'G003'),
('P002', 'G006'),
('P002', 'G007'),
('P003', 'G003'),
('P003', 'G008'),
('P003', 'G009'),
('P003', 'G010');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `noip` varchar(60) NOT NULL DEFAULT '',
  `kd_penyakit` char(4) NOT NULL DEFAULT '',
  `kd_gejala` char(4) NOT NULL DEFAULT '',
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_analisa`
--

INSERT INTO `tmp_analisa` (`noip`, `kd_penyakit`, `kd_gejala`, `status`) VALUES
('127.0.0.1', 'P002', 'G007', 'Y'),
('127.0.0.1', 'P002', 'G006', 'Y'),
('127.0.0.1', 'P002', 'G003', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `kd_gejala` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`kd_gejala`, `noip`) VALUES
('G003', '127.0.0.1'),
('G006', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_pasien`
--

CREATE TABLE `tmp_pasien` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(60) NOT NULL,
  `kelamin` enum('P','W') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `noip` varchar(60) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_pasien`
--

INSERT INTO `tmp_pasien` (`id`, `nama`, `kelamin`, `alamat`, `pekerjaan`, `noip`, `tanggal`) VALUES
(0001, 'XXXX', 'P', 'XXXX', 'XXXX', '127.0.0.1', '2013-09-23 09:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `kd_penyakit` char(4) NOT NULL,
  `noip` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_penyakit`
--

INSERT INTO `tmp_penyakit` (`kd_penyakit`, `noip`) VALUES
('P002', '127.0.0.1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `pakar`
--
ALTER TABLE `pakar`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisa_hasil`
--
ALTER TABLE `analisa_hasil`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `tmp_pasien`
--
ALTER TABLE `tmp_pasien`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
