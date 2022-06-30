-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Jun 2022 pada 11.36
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

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
-- Struktur dari tabel `berobat`
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
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksana`) VALUES
(5, 8, 10, '2022-06-15', 'Pusing', 'Kebanyakan begadang', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(10, 'Apri'),
(11, 'Maya'),
(12, 'Arta'),
(13, 'Cantika'),
(17, 'Herman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
--

CREATE TABLE `log_user` (
  `id_log` int(11) NOT NULL,
  `action_by` varchar(50) NOT NULL,
  `aktivitas` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_user`
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
(27, 'admin', 'Login aplikasi', '2022-06-28 21:27:08'),
(28, 'admin', 'Logout aplikasi', '2022-06-28 21:54:02'),
(29, '', 'Logout aplikasi', '2022-06-28 22:01:53'),
(30, 'admin', 'Login aplikasi', '2022-06-28 22:10:25'),
(31, 'admin', 'Login aplikasi', '2022-06-28 22:11:44'),
(32, 'admin', 'Login aplikasi', '2022-06-28 22:13:04'),
(33, 'admin', 'Login aplikasi', '2022-06-28 22:13:09'),
(34, 'admin', 'Login aplikasi', '2022-06-28 22:13:22'),
(35, 'admin', 'Login aplikasi', '2022-06-28 22:14:03'),
(36, 'admin', 'Login aplikasi', '2022-06-30 16:21:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1, 'Paramex'),
(4, 'Promag'),
(6, 'Puyer'),
(7, 'Imodium'),
(8, 'Bodrex Flu Batuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `umur` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(6, 'Malik', 'L', 22),
(7, 'Mualim', 'L', 19),
(8, 'Dwi', 'P', 19),
(9, 'Risa', 'P', 21),
(17, 'Ekot', 'L', 24);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pasien_laki`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pasien_laki` (
`total_pasien_laki` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pasien_perempuan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pasien_perempuan` (
`total_pasien_perempuan` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(5, 5, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `added_by`, `update_by`) VALUES
(2, 'admin', '$2y$10$VdQNEygpR/nqhw6F1brd0.oTgvIGM6WEJF4wM1CIr9.p3liJYKQwm', 'admin aja', '', 'rezariy');

--
-- Trigger `user`
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
-- Struktur untuk view `pasien_laki`
--
DROP TABLE IF EXISTS `pasien_laki`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasien_laki`  AS SELECT count(0) AS `total_pasien_laki` FROM `pasien` WHERE `pasien`.`jenis_kelamin` = 'L''L'  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pasien_perempuan`
--
DROP TABLE IF EXISTS `pasien_perempuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pasien_perempuan`  AS SELECT count(0) AS `total_pasien_perempuan` FROM `pasien` WHERE `pasien`.`jenis_kelamin` = 'P''P'  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `user_id` (`action_by`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_berobat` (`id_berobat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `update_by` (`update_by`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `berobat_FK` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE SET NULL,
  ADD CONSTRAINT `berobat_FK_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `FK_resep_obat_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE SET NULL,
  ADD CONSTRAINT `resep_obat_FK` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
