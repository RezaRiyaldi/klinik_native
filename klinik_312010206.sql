-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2022 at 04:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik_312010206`
--

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date NOT NULL,
  `keluhan_pasien` varchar(200) NOT NULL,
  `hasil_diagnosa` varchar(200) NOT NULL,
  `penatalaksana` enum('Rawat Jalan','Rawat Inap','Rujuk','Lainnya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksana`) VALUES
(5, 8, 10, '2022-06-15', 'Pusing', 'Kebanyakan begadang', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(10, 'Bambang'),
(11, 'Ketut'),
(12, 'Rudi'),
(13, 'Septi');

-- --------------------------------------------------------

--
-- Table structure for table `log_user`
--

CREATE TABLE `log_user` (
  `id_log` int(11) NOT NULL,
  `action_by` varchar(50) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_user`
--

INSERT INTO `log_user` (`id_log`, `action_by`, `aktivitas`, `waktu`) VALUES
(6, 'admin', 'Menambahkan user baru dengan username: hayabusa', '2022-06-28 19:24:42'),
(7, 'admin', 'Merubah data user dengan username: rezariy', '2022-06-28 19:33:25'),
(8, 'admin', 'Logout aplikasi', '2022-06-28 19:55:34'),
(9, 'rezariy', 'Login aplikasi', '2022-06-28 19:57:06'),
(10, 'rezariy', 'Logout aplikasi', '2022-06-28 20:00:03'),
(11, 'rezariy', 'Login aplikasi', '2022-06-28 20:00:09'),
(12, 'rezariy', 'Menghapus user dengan username: asdasd', '2022-06-28 20:28:55'),
(13, 'rezariy', 'Menghapus user dengan username: asda', '2022-06-28 20:29:10'),
(14, 'rezariy', 'Menghapus user dengan username: coba', '2022-06-28 20:29:30'),
(15, 'rezariy', 'Menghapus user dengan username: reza', '2022-06-28 20:29:34'),
(16, 'rezariy', 'Menghapus user dengan username: masa', '2022-06-28 20:29:37'),
(17, 'rezariy', 'Menghapus user dengan username: masa', '2022-06-28 20:29:41'),
(18, 'rezariy', 'Menghapus user dengan username: anjas', '2022-06-28 20:39:39'),
(19, 'rezariy', 'Merubah data user dengan username: admin', '2022-06-28 21:25:57'),
(20, 'rezariy', 'Logout aplikasi', '2022-06-28 21:26:05'),
(21, 'admin', 'Login aplikasi', '2022-06-28 21:26:14'),
(22, 'admin', 'Menghapus user dengan username: rezariy', '2022-06-28 21:26:25'),
(23, 'admin', 'Menghapus user dengan username: hayabusa', '2022-06-28 21:26:28'),
(24, 'admin', 'Logout aplikasi', '2022-06-28 21:26:33'),
(25, 'admin', 'Login aplikasi', '2022-06-28 21:26:43'),
(26, 'admin', 'Logout aplikasi', '2022-06-28 21:26:55'),
(27, 'admin', 'Login aplikasi', '2022-06-28 21:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1, 'Paracetamol'),
(4, 'Oskadon'),
(6, 'tes obat');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(6, 'Ica', 'P', 19),
(7, 'Asep', 'L', 18),
(8, 'Agung', 'L', 30),
(9, 'Andre', 'L', 25);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pasien_laki`
-- (See below for the actual view)
--
CREATE TABLE `pasien_laki` (
`total_pasien_laki` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pasien_perempuan`
-- (See below for the actual view)
--
CREATE TABLE `pasien_perempuan` (
`total_pasien_perempuan` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(5, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `update_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `added_by`, `update_by`) VALUES
(2, 'admin', '$2y$10$VdQNEygpR/nqhw6F1brd0.oTgvIGM6WEJF4wM1CIr9.p3liJYKQwm', 'admin aja', '', 'rezariy');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `user` FOR EACH ROW BEGIN
	INSERT INTO log_user (id_log, action_by, aktivitas, waktu) 
    VALUES (NULL, new.added_by, CONCAT('Menambahkan user baru dengan username: ', new.username), NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_user` AFTER UPDATE ON `user` FOR EACH ROW BEGIN
	INSERT INTO log_user (id_log, action_by, aktivitas, waktu) 
    VALUES (NULL, new.update_by, CONCAT('Merubah data user dengan username: ', new.username), NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `pasien_laki`
--
DROP TABLE IF EXISTS `pasien_laki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasien_laki`  AS SELECT count(0) AS `total_pasien_laki` FROM `pasien` WHERE `pasien`.`jenis_kelamin` = 'L''L'  ;

-- --------------------------------------------------------

--
-- Structure for view `pasien_perempuan`
--
DROP TABLE IF EXISTS `pasien_perempuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasien_perempuan`  AS SELECT count(0) AS `total_pasien_perempuan` FROM `pasien` WHERE `pasien`.`jenis_kelamin` = 'P''P'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `user_id` (`action_by`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_berobat` (`id_berobat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `update_by` (`update_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `berobat_FK` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE SET NULL,
  ADD CONSTRAINT `berobat_FK_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE SET NULL;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `FK_resep_obat_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE SET NULL,
  ADD CONSTRAINT `resep_obat_FK` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
