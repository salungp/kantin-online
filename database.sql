-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 04 Agu 2019 pada 19.26
-- Versi Server: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `subject`, `email`, `pesan`, `created_at`) VALUES
(1, 'Salung Prastyo', 'Percobaan', 'salungprastyo99@gmail.com', 'Cuma percobaan.', '2019-08-04 11:46:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pembelian`
--

CREATE TABLE `log_pembelian` (
  `id` int(11) NOT NULL,
  `barang` varchar(256) NOT NULL,
  `total` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `menu_image` varchar(256) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama`, `harga`, `kategori`, `menu_image`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Soto Ayam', 3000, 2, 'default.jpg', 1, '2019-08-04 03:04:47', '2019-08-04 10:04:47'),
(2, 'Mie Ayam', 4000, 2, 'default.jpg', 1, '2019-08-04 03:06:25', '2019-08-04 10:06:25'),
(3, 'Bakwan', 500, 4, 'default.jpg', 1, '2019-08-04 03:07:04', '2019-08-04 10:07:04'),
(4, 'Mendowan', 500, 4, 'default.jpg', 1, '2019-08-04 03:07:30', '2019-08-04 10:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `kategori` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `title`, `slug`, `from`, `to`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Pesananmu sudah dikirim', 'pesananmu-sudah-dikirim', 1, 1, 'makanan', '2019-08-04 06:17:45', '2019-08-04 13:17:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `lokasi_user` varchar(128) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `barang_id`, `nama`, `foto`, `user_id`, `harga`, `lokasi_user`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(6, 2, 'Mie Ayam', 'default.jpg', 1, 4000, 'Aula', 1, '2019-08-04 05:34:24', '2019-08-04 00:00:00'),
(7, 1, 'Soto Ayam', 'default.jpg', 1, 3000, 'Ruang Guru', 2, '2019-08-04 06:04:24', '2019-08-04 00:00:00'),
(8, 3, 'Bakwan', 'default.jpg', 1, 500, 'Aula', 1, '2019-08-04 06:24:18', '2019-08-04 00:00:00'),
(9, 2, 'Mie Ayam', 'default.jpg', 1, 4000, 'Aula', 3, '2019-08-04 11:25:49', '2019-08-04 00:00:00'),
(10, 3, 'Bakwan', 'default.jpg', 2, 500, 'Aula', 1, '2019-08-04 12:07:23', '2019-08-04 00:00:00'),
(11, 1, 'Soto Ayam', 'default.jpg', 2, 3000, 'Aula', 3, '2019-08-04 12:07:38', '2019-08-04 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `kelas` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nis` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `profile_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `kelas`, `email`, `password`, `nis`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'Salung Prastyo', 'XI-RPL-2', 'salungprastyo@gmail.com', '$2y$10$mmkYFSrl2233ZIvomhqdCO9Kt8F.iHRy1SOkE8fUnqyHCIeRIKiDK', 2355, '2019-08-04 05:10:32', '2019-08-04 12:10:32', 'default.jpg'),
(2, 'Kevin alvaro', 'XI-BDP-1', 'kevinalvaro@gmail.com', '$2y$10$bOuFEkZkbRTgp8qeKkN/pe7Gi.CZ1Jm0TXtvuhV4rwOZawjYOKQXK', 2455, '2019-08-04 12:04:40', '2019-08-04 19:04:40', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_pembelian`
--
ALTER TABLE `log_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log_pembelian`
--
ALTER TABLE `log_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
