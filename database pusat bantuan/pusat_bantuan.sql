-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 04:29 PM
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
  `id_user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `pembuat`, `isi`, `gambar_artikel`, `gambar_1`, `gambar_2`, `tanggal_unggah`, `id_kategori`, `id_layout`, `id_user`, `status`) VALUES
(45, 'tag', '1', '<p>111</p>', 'default.png', '', '', '2024-05-21 04:44:14', 12, 1, 1, 'draft'),
(46, 'tag2', '1', '<p>11</p>', '', '', '', '2024-05-21 04:44:40', 12, 3, 1, 'draft'),
(50, 'tag', '1', '<p>isi</p>', 'icon_trushmedis.png', '', '', '2024-05-21 07:52:08', 36, 3, 1, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_layout`
--

CREATE TABLE `artikel_layout` (
  `id` int(11) NOT NULL,
  `nama_layout` varchar(255) NOT NULL,
  `gambar_layout` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel_layout`
--

INSERT INTO `artikel_layout` (`id`, `nama_layout`, `gambar_layout`) VALUES
(1, 'A', ''),
(2, 'B', ''),
(3, 'C', '');

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
  `id_parent` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi_kategori`, `ikon`, `id_parent`, `id_user`) VALUES
(1, 'Feature', 'Tata cara penggunaan sistem Goldstep', 'logo_goldstep.png', NULL, 1),
(2, 'produk', 'Goldstep Product', 'icon_trushmedis.png', NULL, 1),
(12, 'goldstep clinic', 'goldstep clinic', 'icon_trushmedis.png', 2, 1),
(20, 'goldstep lab', 'goldstep lab', 'dokter.png', 2, 1),
(36, 'setting', 'Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai', 'logo_goldstep.png', 1, 1);

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
(1, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-21 06:32:02'),
(2, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 06:32:29'),
(3, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 06:32:47'),
(4, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-21 06:32:53'),
(5, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 06:35:23'),
(6, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 06:40:25'),
(7, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 06:40:36'),
(8, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 06:40:58'),
(9, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 06:41:11'),
(10, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 06:41:23'),
(11, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 06:46:37'),
(12, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 06:46:49'),
(13, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 06:47:07'),
(14, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-21 06:47:52'),
(15, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-21 06:48:07'),
(16, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-21 06:53:03'),
(17, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-21 06:53:22'),
(18, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-21 06:53:41'),
(19, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 06:54:05'),
(20, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 06:54:38'),
(21, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 06:54:54'),
(22, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 06:55:16'),
(23, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-21 07:17:46');

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
(25, 'tag1', 45, 1),
(26, 'tag1', 46, 1),
(27, 'tag2', 46, 1),
(29, 'tag2', 50, 1),
(30, 'tag3', 50, 1),
(31, 'baru', 50, 1);

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
(1, 'goldstep indonesia', 'For more than 15 years in the software development industry, we have provided software development in various types of businesses ranging from retail, manufacturing, e-commerce, health care to edutech on various business scales. Our developers have implemented customized software according to the business requirements of each client.');

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
(1, 'aditha', 'adit@gmail.com', '$2y$10$OFgQpOnn9agbFLh1bO3tA.JJJqaIu.r1RpPdPKc/ZG5zQq55DMe4a', 'a', 'admin', 'dokter.png');

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
  ADD KEY `id_artikel` (`id_artikel`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `artikel_layout`
--
ALTER TABLE `artikel_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header_tentang_kami`
--
ALTER TABLE `header_tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
