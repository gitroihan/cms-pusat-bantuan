-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:21 AM
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
(1, 'Menu Laporan Resep', '1', '<ul><li>ttt</li></ul>', 'dokter.png', 'dokter.png', 'coode layout_3.png', '2024-05-17 00:00:00', 4, 1, 1),
(2, 'goldstep Clinic', '1', '<ul><li>ttt</li></ul>', 'dokter.png', 'dokter.png', 'coode layout_3.png', '2024-05-17 00:00:00', 4, 1, 1),
(3, 'goldstep Suite', '1', '<p>rr</p>', 'dokter.png', 'dokter.png', 'dokter.png', '2024-05-17 00:00:00', 13, 1, 1),
(4, 'goldstep Lab', '1', '<ol><li>bbbb</li><li>rr</li></ol>', 'dokter.png', 'dokter.png', 'dokter.png', '2024-05-17 00:00:00', 13, 1, 1),
(5, 'goldstep Pharmacy\n', '1', '<p>aevsvsev</p>', 'dokter_8.png', 'dokter.png', 'dokter_7.png', '2024-05-17 00:00:00', 13, 1, 1);

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
(1, 'a');

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
(1, 'setting kategori', '2', '1715776609_9d0864ddf91aba5764bd.png', 1, NULL, 1),
(2, 'produk', '3', '1715765051_8f03b4d5f1deb940d59f.png', 1, NULL, 1),
(4, 'setting', 'Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai', '1715763560_c46f81e640a986bbc4a8.png', 1, 1, 1),
(12, 'produk', 'produk deskripsi oke', '1715824827_97b60de429d2c8faefb9.png', 1, 2, 1),
(13, 'produk3', '3', '1715765107_cd84f59dd6864c4e6ce7.png', 1, 12, 1),
(17, 'produk 4', '4', '1715765119_f53b7c57939d83975fde.png', 1, 20, 1),
(20, 'produkk', '123', '1715766398_5ed60419eda643836b0d.png', 1, 2, 1);

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
(5, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-13 20:26:26'),
(6, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-13 23:31:19'),
(7, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:02:16'),
(8, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:17:35'),
(9, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:26:40'),
(10, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:31:45'),
(11, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:31:53'),
(12, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:34:24'),
(13, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:38:55'),
(14, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:39:21'),
(15, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:48:42'),
(16, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:49:02'),
(17, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-14 00:52:57'),
(18, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-15 05:45:46'),
(19, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-15 05:48:18'),
(20, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-15 05:50:35'),
(21, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-15 05:54:56'),
(22, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-15 05:55:07'),
(23, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-15 05:55:11'),
(24, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-15 15:02:47'),
(25, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-15 19:00:27'),
(26, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-15 19:22:28'),
(27, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-15 19:22:39'),
(28, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-15 19:23:01'),
(29, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-15 19:23:39'),
(30, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-15 19:24:34'),
(31, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-15 22:38:14'),
(32, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-15 22:38:21'),
(33, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-15 22:38:29');

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
(1, 'tag 1', 1, '3,4,5'),
(2, 'tag 2', 1, '3,5'),
(3, 'tag 3', 1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `modul` varchar(255) NOT NULL,
  `klasifikasi` varchar(255) NOT NULL,
  `prioritas` varchar(255) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `nama_kontak`, `email`, `modul`, `klasifikasi`, `prioritas`, `subjek`, `deskripsi`, `status`) VALUES
(1, 'adit', 'adit@gmail.com', 'modul', 'klasifikasi', 'priosritas', 'subjek', 'deskripsi ', ''),
(2, 'raihan', 'raihan@gmail.com', 'raihan', 'raihan', 'raihan', 'raihan', 'Siapa yang tidak mengenal kata “raihan”? Kata yang terdengar sederhana, namun sarat dengan makna dan simbolisme. Dalam bahasa Indonesia, kata “raihan” memiliki arti keberhasilan yang diraih setelah melalui perjuangan yang penuh keringat dan kerja keras. Bukankah itu menggambarkan betapa indahnya hidup ini, saat kita benar-benar berusaha dan kemudian kita mencapai apa yang kita inginkan?\r\n\r\nRaihan bisa menjadi kata yang memberikan semangat dan inspirasi bagi banyak orang. Tidak hanya bagi mereka yang tengah berjuang keras mengejar impiannya, tetapi juga bagi mereka yang merasa putus asa dan perlu dorongan untuk tetap bergerak maju. Kata “raihan” memberikan makna bahwa kita semua bisa meraih apa yang kita inginkan jika kita mau berjuang dengan tekad yang kuat.', '');

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
(1, 'adita', 'adit@gmail.com', '$2y$10$OFgQpOnn9agbFLh1bO3tA.JJJqaIu.r1RpPdPKc/ZG5zQq55DMe4a', 'a', 'admin', '1715672347_9bd5c5a38bf3fe167a1e.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artikel_layout`
--
ALTER TABLE `artikel_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tag2`
--
ALTER TABLE `tag2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
