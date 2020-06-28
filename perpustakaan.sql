-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2020 pada 03.16
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_anggota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama_anggota`, `alamat`, `no_telp`, `created_at`, `updated_at`) VALUES
(3, 'Park Woojin', 'Jalan menuju hatiku', '085354672187', '2020-01-15 00:45:51', NULL),
(4, 'Nisrina Izdihar', 'Jalan menuju hatinya Woojin', '083687425619', '2020-01-15 00:45:51', NULL),
(5, 'Dong Si Cheng', 'Shanghai, China', '082167396519', '2020-01-15 00:45:51', NULL),
(6, 'Park Jisung', 'Seoul', '0838176293689', '2020-01-15 00:45:51', NULL),
(7, 'Nakamoto Yuta', 'Osaka', '085672935428', '2020-01-15 00:45:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `pengarang`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Amelia', 'PT Gramedia', 'Tereliye', '-', '2020-01-15 00:46:51', NULL),
(2, 'Hujan', 'PT Gramedia', 'Tereliye', '-', '2020-01-15 00:46:51', NULL),
(3, 'Matahari', 'PT Gramedia', 'Tereliye', '-', '2020-01-15 00:46:51', NULL),
(4, 'Pulang', 'PT Gramedia', 'Tereliye', '-', '2020-01-15 00:46:51', NULL),
(5, 'Bulan', 'PT Gramedia', 'Tereliye', '-', '2020-01-15 00:46:51', NULL),
(7, 'Tidak Ada Judulnya', 'Penerbit', 'Apasih', 'aaaa', NULL, NULL),
(8, 'aaaaa', 'bbbbb', 'ccccc', 'ddddd', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `id_peminjaman`, `id_buku`, `qty`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '4', NULL, '2020-02-02 06:27:17'),
(3, 4, 1, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_01_13_073530_create_anggota_table', 1),
(2, '2020_01_13_073555_create_buku_table', 1),
(3, '2020_01_13_073623_create_peminjaman_table', 1),
(4, '2020_01_13_073649_create_detail_peminjaman_table', 1),
(5, '2020_01_13_073708_create_petugas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `deadline` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_anggota`, `id_petugas`, `tgl_pinjam`, `deadline`, `tgl_kembali`, `denda`, `created_at`, `updated_at`) VALUES
(3, 7, 10, '2020-01-02', '2020-01-09', '2020-01-07', '', NULL, NULL),
(4, 2, 1, '2020-02-05', '2020-02-15', '2020-02-09', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `nama_petugas`, `alamat`, `no_telp`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Kang daniel', 'Busan', '0543762568', 'DanielK96', 'DanielK96', 'admin', '2020-01-15 00:46:51', NULL),
(2, 'Talitha', 'Di sumur', '052864317', 'Talithampar', 'Talithampar', 'admin', '2020-01-15 00:46:51', NULL),
(3, 'Angelia', 'Di lubang tikus', '02576186', 'Angelbocil', 'Angelbocil', 'admin', '2020-01-15 00:46:51', NULL),
(4, 'Fara Nisha', 'Di gorong - gorong', '04671823', 'Fralala', 'Fralala', 'admin', '2020-01-15 00:46:51', NULL),
(5, 'Chittaphon Leechaiyapornkul', 'Bangkok', '0267385', 'Chittaphrr', 'Chittaphrr', 'admin', '2020-01-15 00:46:51', NULL),
(6, 'Nisrina Izdihar', 'Malang', '086432816433', 'Ninis02', '$2y$10$B7ETVxPRQPWyXkbeSYL3LOdKX/3J3CS44x0TQZwcuSmiZ2/4rkfI.', 'admin', '2020-01-20 23:57:34', '2020-01-20 23:57:34'),
(7, 'Nisrina Izdihar', 'Malang', '086432816433', 'Ninis02', '$2y$10$rDHFNJ42d.8XZfDoZrN/jOidTVsJTEV7g3o/A13cLgQ1oMY33rtHi', 'admin', '2020-01-20 23:57:53', '2020-01-20 23:57:53'),
(8, 'Ninis', 'Malang', '0875324816592', 'Niap1102', '$2y$10$210LyIiOcphdHEIdXprHYewUHH0R7m1liM5RIQr/oIAj.0BZkqL7.', 'admin', '2020-01-21 00:50:49', '2020-01-21 00:50:49'),
(9, 'Ninis', 'Malang', '0875324816592', 'Niap1102', '$2y$10$sO2Tu2h517I8ftu0xKkc1ei6kT.qICFsg5ej1B9wkP6DtfaGpI/du', 'admin', '2020-01-21 00:52:48', '2020-01-21 00:52:48'),
(10, 'Syafid', 'Malang', '08763528175', 'Syafid10', '$2y$10$Neb6fduCV6rx1Sv3G4qwE.f9l5TIUE1zVtGO2Vx2PiZwqyUAF9Xxi', 'petugas', '2020-01-22 02:33:37', '2020-01-22 02:33:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peminjaman` (`id_peminjaman`,`id_buku`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anggota` (`id_anggota`,`id_petugas`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
