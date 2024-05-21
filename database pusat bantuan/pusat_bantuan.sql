-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 03:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pusat_bantuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `pembuat` varchar(255) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `gambar_1` varchar(255) NOT NULL,
  `gambar_2` varchar(255) NOT NULL,
  `tanggal_unggah` datetime NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `pembuat`, `isi`, `gambar_artikel`, `gambar_1`, `gambar_2`, `tanggal_unggah`, `id_kategori`, `id_layout`, `id_user`) VALUES
(1, 'Menu Laporan Resep', '1', '<ul><li>ttt</li></ul>', 'dokter.png', 'dokter.png', 'coode layout_3.png', '2024-05-17 00:00:00', 20, 1, 1),
(2, 'goldstep Clinic', '1', '<ul><li>ttt</li></ul>', 'dokter.png', 'dokter.png', 'coode layout_3.png', '2024-05-17 00:00:00', 20, 2, 1),
(9, 'tes tag', '1', '<p>tag baru</p>', 'dokter.png', 'dokter.png', 'dokter.png', '2024-05-17 09:55:17', 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `artikel_layout`
--

CREATE TABLE `artikel_layout` (
  `id` int(11) NOT NULL,
  `nama_layout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel_layout`
--

INSERT INTO `artikel_layout` (`id`, `nama_layout`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `header_tentang_kami`
--

CREATE TABLE `header_tentang_kami` (
  `id` int(11) NOT NULL,
  `judul_banner` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_tentang_kami`
--

INSERT INTO `header_tentang_kami` (`id`, `judul_banner`, `deskripsi`, `gambar`) VALUES
(1, 'pt goldstep indonesia', 'default', 'banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi_kategori` text DEFAULT NULL,
  `ikon` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi_kategori`, `ikon`, `urutan`, `id_parent`, `id_user`) VALUES
(1, 'Feature', 'Tata cara penggunaan sistem Goldstep', '1715776609_9d0864ddf91aba5764bd.png', 1, NULL, 1),
(2, 'produk', 'Goldstep Product', '1715765051_8f03b4d5f1deb940d59f.png', 1, NULL, 1),
(12, 'goldstep clinic', 'goldstep clinic', '1715824827_97b60de429d2c8faefb9.png', 1, 2, 1),
(20, 'goldstep lab', 'goldstep lab', '1716254581_55e13ba7a3462e6f50a3.png', 1, 2, 1),
(36, 'setting', 'Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai', '1716184525_f06718b646f6d637dc3a.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `link_whatsapp` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `alamat`, `nomor_telepon`, `link_whatsapp`, `link_instagram`) VALUES
(1, 'goldstep', 'goldstep.co.id', 'Taman Kopo Indah 3, Ruko D35\r\nBandung, Indonesia,', '+62 812-2218-8524', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `id_ref` int(11) NOT NULL,
  `log_tipe` varchar(255) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `alamat_ip` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `id_ref`, `log_tipe`, `aktivitas`, `alamat_ip`, `id_user`, `updated_at`) VALUES
(97, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-19 20:09:50'),
(98, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:32:40'),
(99, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-19 22:33:44'),
(100, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:45:41'),
(101, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:45:54'),
(102, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:46:02'),
(103, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:46:11'),
(104, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:46:24'),
(105, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:47:03'),
(106, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:47:10'),
(107, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:47:17'),
(108, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:47:26'),
(109, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:48:40'),
(110, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:48:49'),
(111, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-19 22:49:00'),
(112, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:49:10'),
(113, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:49:17'),
(114, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-19 22:49:23'),
(115, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-19 22:55:25'),
(116, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-20 17:02:52'),
(117, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-20 17:04:03'),
(118, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-20 17:04:07'),
(119, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-20 17:04:13'),
(120, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-20 17:06:04'),
(121, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-20 17:06:09'),
(122, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-20 17:07:17'),
(123, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-20 17:07:21'),
(124, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-20 17:08:39'),
(125, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-20 17:08:43'),
(126, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-20 17:08:47'),
(127, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-20 17:26:02'),
(128, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-20 17:26:07'),
(129, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-20 17:26:58'),
(130, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-20 17:32:53'),
(131, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-20 17:32:57'),
(132, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-20 17:33:04'),
(133, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-20 17:33:19'),
(134, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-20 17:33:25'),
(135, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-20 18:00:25'),
(136, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-20 18:00:41'),
(137, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-20 18:22:51'),
(138, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-20 18:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `nama_tag` varchar(255) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `nama_tag`, `id_artikel`, `id_user`) VALUES
(2, 'tes tag', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag2`
--

CREATE TABLE `tag2` (
  `id` int(11) NOT NULL,
  `nama_tag` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_artikel` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tag2`
--

INSERT INTO `tag2` (`id`, `nama_tag`, `id_user`, `id_artikel`) VALUES
(1, 'tag 1', 1, '3,4,5,6,8,10,11,13,14,16,17,18,19'),
(2, 'tag 2', 1, '3,5,7,9,10'),
(3, 'tag 3', 1, '5,1,9'),
(4, 'tag_baru', 1, '9,1'),
(5, 'taggg', 1, '19');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul`, `deskripsi`) VALUES
(1, 'goldstep inggris', 'For more than 15 years in the software development industry, we have provided software development in various types of businesses ranging from retail, manufacturing, e-commerce, health care to edutech on various business scales. Our developers have implemented customized software according to the business requirements of each client.');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `nama_kontak`, `email`, `subjek`, `deskripsi`, `status`) VALUES
(1, 'adit', 'adit@gmail.com', 'subjek', 'deskripsi ', ''),
(2, 'raihan', 'raihan@gmail.com', 'raihan', 'Siapa yang tidak mengenal kata “raihan”? Kata yang terdengar sederhana, namun sarat dengan makna dan simbolisme. Dalam bahasa Indonesia, kata “raihan” memiliki arti keberhasilan yang diraih setelah melalui perjuangan yang penuh keringat dan kerja keras. Bukankah itu menggambarkan betapa indahnya hidup ini, saat kita benar-benar berusaha dan kemudian kita mencapai apa yang kita inginkan?\r\n\r\nRaihan bisa menjadi kata yang memberikan semangat dan inspirasi bagi banyak orang. Tidak hanya bagi mereka yang tengah berjuang keras mengejar impiannya, tetapi juga bagi mereka yang merasa putus asa dan perlu dorongan untuk tetap bergerak maju. Kata “raihan” memberikan makna bahwa kita semua bisa meraih apa yang kita inginkan jika kita mau berjuang dengan tekad yang kuat.', ''),
(3, 'p', 'p@gmail.com', 'tes', 'Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `foto_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `status`, `role`, `foto_profile`) VALUES
(1, 'aditha', 'adit@gmail.com', '$2y$10$OFgQpOnn9agbFLh1bO3tA.JJJqaIu.r1RpPdPKc/ZG5zQq55DMe4a', 'a', 'admin', '1715672347_9bd5c5a38bf3fe167a1e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikel_id_user_foreign` (`id_user`),
  ADD KEY `artikel_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `artikel_layout`
--
ALTER TABLE `artikel_layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_tentang_kami`
--
ALTER TABLE `header_tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id_user_foreign` (`id_user`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kontak_email_unique` (`email`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_aktivitas_id_user_foreign` (`id_user`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tag_id_user_foreign` (`id_user`),
  ADD KEY `tag_id_artikel_foreign` (`id_artikel`);

--
-- Indexes for table `tag2`
--
ALTER TABLE `tag2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tiket_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `artikel_layout`
--
ALTER TABLE `artikel_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `header_tentang_kami`
--
ALTER TABLE `header_tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag2`
--
ALTER TABLE `tag2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `artikel_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_id_artikel_foreign` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`),
  ADD CONSTRAINT `tag_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `tag2`
--
ALTER TABLE `tag2`
  ADD CONSTRAINT `tag2_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
