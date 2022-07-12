-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Jul 2022 pada 15.52
-- Versi server: 8.0.27
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_iuran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `iuran`
--

CREATE TABLE `iuran` (
  `idIuran` int NOT NULL,
  `idWarga` int NOT NULL,
  `keterangan` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` int NOT NULL,
  `bulan` int NOT NULL,
  `tahun` year NOT NULL,
  `jumlah` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iuran`
--

INSERT INTO `iuran` (`idIuran`, `idWarga`, `keterangan`, `tanggal`, `bulan`, `tahun`, `jumlah`) VALUES
(1, 1, 'Bayar Bulan Februari', 2, 1, 2022, '120000'),
(2, 1, 'Bayaarr April', 7, 4, 2022, '200000'),
(4, 14, 'sdfsd', 12, 7, 2022, '300100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `idWarga` int NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `namaWarga` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `kelamin` enum('L','P') COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `noRumah` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`idWarga`, `nik`, `namaWarga`, `kelamin`, `alamat`, `noRumah`, `status`) VALUES
(1, '3519112002980001', 'Febro Herdyanto', 'L', 'Jl. Sulawesi Krajan', '011', 1),
(5, '123456799', 'Farhan A', 'L', 'kjas,dlaknaslk,jd', '112', 1),
(8, '092192019', 'Aldidsf', 'L', 'dsadada', '111', 1),
(9, '99131201001', 'Yanuar', 'L', 'Jl. Sulawesi', '001', 1),
(10, '99131201002', 'Bobby', 'L', 'Jl. Kamboja', '002', 1),
(11, '99131201003', 'Rega', 'L', 'Jl. Sulawesi', '003', 1),
(12, '99131201004', 'Eddi', 'L', 'Jl. Sulawesi', '004', 1),
(13, '99131201005', 'Enggar', 'P', 'Jl. Kamboja', '005', 1),
(14, '99131201006', 'Yovira', 'P', 'Jl. Sulawesi', '006', 1),
(15, '99131201007', 'Iswati', 'P', 'Jl. Sulawesi', '007', 1),
(16, '99131201008', 'Setiawan', 'L', 'Jl. Kamboja', '008', 1),
(17, '99131201009', 'Fitri', 'P', 'Jl. Sulawesi', '012', 1),
(18, '99131201010', 'Irianti', 'P', 'Jl. Kamboja', '014', 1),
(19, '99131201011', 'Herdyanto', 'L', 'Jl. Kamboja', '009', 1),
(20, '99131201012', 'Sri', 'P', 'Jl. Sulawesi', '022', 1),
(21, '99131201013', 'Radja', 'L', 'Jl. Kamboja', '018', 1),
(22, '99131201014', 'Sabila', 'P', 'Jl. Sulawesi', '032', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `iuran`
--
ALTER TABLE `iuran`
  ADD PRIMARY KEY (`idIuran`),
  ADD KEY `idWarga` (`idWarga`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`idWarga`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `iuran`
--
ALTER TABLE `iuran`
  MODIFY `idIuran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `idWarga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `iuran`
--
ALTER TABLE `iuran`
  ADD CONSTRAINT `iuran_ibfk_1` FOREIGN KEY (`idWarga`) REFERENCES `warga` (`idWarga`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
