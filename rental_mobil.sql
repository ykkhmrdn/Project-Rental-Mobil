-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 16.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` int(3) NOT NULL,
  `KdMerk` varchar(50) NOT NULL,
  `NmMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` int(3) NOT NULL,
  `NoPlat` varchar(10) NOT NULL,
  `KdMerk` varchar(20) DEFAULT NULL,
  `IdType` varchar(20) DEFAULT NULL,
  `StatusRental` enum('Jalan','Dipesan','Kosong') DEFAULT NULL,
  `HargaSewa` double(10,0) DEFAULT NULL,
  `JenisMobil` varchar(20) DEFAULT NULL,
  `Transmisi` enum('Manual','CVT','Matic') DEFAULT NULL,
  `FotoMobil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id` int(3) NOT NULL,
  `IdSopir` char(6) NOT NULL,
  `NIK` char(13) NOT NULL,
  `NmSopir` varchar(50) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` char(13) DEFAULT NULL,
  `JenisKelamin` enum('P','L') DEFAULT NULL,
  `NoSim` char(20) DEFAULT NULL,
  `TarifPerhari` double(10,0) DEFAULT NULL,
  `StatusSopir` enum('Busy','Booked','Free') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `NoTransaksi` char(8) NOT NULL,
  `NIK` char(13) DEFAULT NULL,
  `Id_Mobil` int(3) DEFAULT NULL,
  `Tanggal_Pesan` date DEFAULT NULL,
  `Tanggal_Pinjam` date DEFAULT NULL,
  `Tanggal_Kembali_Rencana` date DEFAULT NULL,
  `Tanggal_Kembali_Sebenarnya` date DEFAULT NULL,
  `LamaRental` int(3) DEFAULT NULL,
  `LamaDenda` int(3) DEFAULT NULL,
  `Kerusakan` text DEFAULT NULL,
  `Id_Sopir` char(6) DEFAULT NULL,
  `BiayaBBM` double(10,0) DEFAULT NULL,
  `BiayaKerusakan` double(10,0) DEFAULT NULL,
  `Denda` double(10,0) DEFAULT NULL,
  `Total_Bayar` double(10,0) DEFAULT NULL,
  `Jumlah_Bayar` double(10,0) DEFAULT NULL,
  `Kembalian` double(10,0) DEFAULT NULL,
  `StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai') DEFAULT NULL,
  `Arsip` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id` int(3) NOT NULL,
  `IdType` varchar(20) NOT NULL,
  `NmType` varchar(50) DEFAULT NULL,
  `KdMerk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `NIK` char(13) NOT NULL,
  `Nama` varchar(30) DEFAULT NULL,
  `NamaUser` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `JenisKelamin` enum('L','P') DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `NoTelp` varchar(13) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `RoleId` int(2) DEFAULT NULL,
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `NIK`, `Nama`, `NamaUser`, `Password`, `JenisKelamin`, `Alamat`, `NoTelp`, `Foto`, `RoleId`, `IsActive`) VALUES
(1, '', 'admin', 'admin@gmail.com', 'admin', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Karyawan'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewmobil`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewmobil` (
`id` int(3)
,`NoPlat` varchar(10)
,`KdMerk` varchar(20)
,`IdType` varchar(20)
,`StatusRental` enum('Jalan','Dipesan','Kosong')
,`HargaSewa` double(10,0)
,`FotoMobil` varchar(100)
,`NmMerk` varchar(50)
,`NmType` varchar(50)
,`JenisMobil` varchar(20)
,`Transmisi` enum('Manual','CVT','Matic')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewtransaksi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewtransaksi` (
`NoTransaksi` char(8)
,`NIK` char(13)
,`Id_Mobil` int(3)
,`Tanggal_Pesan` date
,`Tanggal_Pinjam` date
,`Tanggal_Kembali_Rencana` date
,`Tanggal_Kembali_Sebenarnya` date
,`LamaRental` int(3)
,`LamaDenda` int(3)
,`Kerusakan` text
,`Id_Sopir` char(6)
,`BiayaBBM` double(10,0)
,`BiayaKerusakan` double(10,0)
,`Denda` double(10,0)
,`Total_Bayar` double(10,0)
,`Jumlah_Bayar` double(10,0)
,`Kembalian` double(10,0)
,`StatusTransaksi` enum('Proses','Mulai','Batal','Arsip','Selesai')
,`Nama` varchar(30)
,`NamaUser` varchar(50)
,`NmSopir` varchar(50)
,`TarifPerhari` double(10,0)
,`id` int(3)
,`Arsip` int(1)
,`NoPlat` varchar(10)
,`HargaSewa` double(10,0)
,`NmMerk` varchar(50)
,`NmType` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewtype`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewtype` (
`id` int(3)
,`IdType` varchar(20)
,`NmType` varchar(50)
,`KdMerk` varchar(50)
,`NmMerk` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewusers`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewusers` (
`id` int(3)
,`NIK` char(13)
,`Nama` varchar(30)
,`NamaUser` varchar(50)
,`Password` varchar(255)
,`JenisKelamin` enum('L','P')
,`Alamat` text
,`NoTelp` varchar(13)
,`Foto` varchar(100)
,`RoleId` int(2)
,`IsActive` int(1)
,`role` varchar(20)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewmobil`
--
DROP TABLE IF EXISTS `viewmobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewmobil`  AS SELECT `mobil`.`id` AS `id`, `mobil`.`NoPlat` AS `NoPlat`, `mobil`.`KdMerk` AS `KdMerk`, `mobil`.`IdType` AS `IdType`, `mobil`.`StatusRental` AS `StatusRental`, `mobil`.`HargaSewa` AS `HargaSewa`, `mobil`.`FotoMobil` AS `FotoMobil`, `merk`.`NmMerk` AS `NmMerk`, `type`.`NmType` AS `NmType`, `mobil`.`JenisMobil` AS `JenisMobil`, `mobil`.`Transmisi` AS `Transmisi` FROM ((`mobil` join `type` on(`mobil`.`IdType` = `type`.`IdType`)) join `merk` on(`mobil`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewtransaksi`
--
DROP TABLE IF EXISTS `viewtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtransaksi`  AS SELECT `transaksi`.`NoTransaksi` AS `NoTransaksi`, `transaksi`.`NIK` AS `NIK`, `transaksi`.`Id_Mobil` AS `Id_Mobil`, `transaksi`.`Tanggal_Pesan` AS `Tanggal_Pesan`, `transaksi`.`Tanggal_Pinjam` AS `Tanggal_Pinjam`, `transaksi`.`Tanggal_Kembali_Rencana` AS `Tanggal_Kembali_Rencana`, `transaksi`.`Tanggal_Kembali_Sebenarnya` AS `Tanggal_Kembali_Sebenarnya`, `transaksi`.`LamaRental` AS `LamaRental`, `transaksi`.`LamaDenda` AS `LamaDenda`, `transaksi`.`Kerusakan` AS `Kerusakan`, `transaksi`.`Id_Sopir` AS `Id_Sopir`, `transaksi`.`BiayaBBM` AS `BiayaBBM`, `transaksi`.`BiayaKerusakan` AS `BiayaKerusakan`, `transaksi`.`Denda` AS `Denda`, `transaksi`.`Total_Bayar` AS `Total_Bayar`, `transaksi`.`Jumlah_Bayar` AS `Jumlah_Bayar`, `transaksi`.`Kembalian` AS `Kembalian`, `transaksi`.`StatusTransaksi` AS `StatusTransaksi`, `users`.`Nama` AS `Nama`, `users`.`NamaUser` AS `NamaUser`, `sopir`.`NmSopir` AS `NmSopir`, `sopir`.`TarifPerhari` AS `TarifPerhari`, `users`.`id` AS `id`, `transaksi`.`Arsip` AS `Arsip`, `viewmobil`.`NoPlat` AS `NoPlat`, `viewmobil`.`HargaSewa` AS `HargaSewa`, `viewmobil`.`NmMerk` AS `NmMerk`, `viewmobil`.`NmType` AS `NmType` FROM (((`transaksi` join `sopir` on(`transaksi`.`Id_Sopir` = `sopir`.`IdSopir`)) join `users` on(`transaksi`.`NIK` = `users`.`NIK`)) join `viewmobil` on(`transaksi`.`Id_Mobil` = `viewmobil`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewtype`
--
DROP TABLE IF EXISTS `viewtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtype`  AS SELECT `type`.`id` AS `id`, `type`.`IdType` AS `IdType`, `type`.`NmType` AS `NmType`, `type`.`KdMerk` AS `KdMerk`, `merk`.`NmMerk` AS `NmMerk` FROM (`type` join `merk` on(`type`.`KdMerk` = `merk`.`KdMerk`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewusers`
--
DROP TABLE IF EXISTS `viewusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewusers`  AS SELECT `users`.`id` AS `id`, `users`.`NIK` AS `NIK`, `users`.`Nama` AS `Nama`, `users`.`NamaUser` AS `NamaUser`, `users`.`Password` AS `Password`, `users`.`JenisKelamin` AS `JenisKelamin`, `users`.`Alamat` AS `Alamat`, `users`.`NoTelp` AS `NoTelp`, `users`.`Foto` AS `Foto`, `users`.`RoleId` AS `RoleId`, `users`.`IsActive` AS `IsActive`, `user_role`.`role` AS `role` FROM (`users` join `user_role` on(`users`.`RoleId` = `user_role`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`,`KdMerk`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`,`NoPlat`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`,`IdSopir`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`NoTransaksi`);

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`,`IdType`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`NIK`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `type`
--
ALTER TABLE `type`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
