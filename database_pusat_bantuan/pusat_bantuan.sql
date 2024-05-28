-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 11:25 AM
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
  `isi2` text NOT NULL,
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

INSERT INTO `artikel` (`id`, `judul_artikel`, `pembuat`, `isi`, `isi2`, `gambar_artikel`, `gambar_1`, `gambar_2`, `tanggal_unggah`, `id_kategori`, `id_layout`, `id_user`, `status`) VALUES
(45, 'Mengenal Jenis-Jenis Klinik untuk Pilihan Kesehatan Anda', '1', '<p><strong>Klinik Kesehatan Wanita</strong></p><p>Klinik ini khusus dirancang untuk memenuhi kebutuhan kesehatan perempuan, klinik kesehatan wanita menyediakan beberapa layanan yang hanya fokus pada aspek-aspek kesehatan reproduksi dan kehamilan. Pemeriksaan kesehatan reproduksi, konseling kehamilan, serta penanganan masalah yang spesifik atau hanya terjadi pada perempuan.</p><p>Dari penjelasan diatas anda bisa membuat keputusan yang tepat untuk memilih klinik perawatan yang sesuai dengan kebutuhan anda. Pemahaman yang mendalam pada jenis klinik ini juga dapat membantu anda membangun kesadaran akan pentingnya perawatan kesehatan yang primer dalam menjaga kesehatan.</p>', '<p><strong>Klinik Kesehatan Wanita</strong></p><p>Klinik ini khusus dirancang untuk memenuhi kebutuhan kesehatan perempuan, klinik kesehatan wanita menyediakan beberapa layanan yang hanya fokus pada aspek-aspek kesehatan reproduksi dan kehamilan. Pemeriksaan kesehatan reproduksi, konseling kehamilan, serta penanganan masalah yang spesifik atau hanya terjadi pada perempuan.</p><p>Dari penjelasan diatas anda bisa membuat keputusan yang tepat untuk memilih klinik perawatan yang sesuai dengan kebutuhan anda. Pemahaman yang mendalam pada jenis klinik ini juga dapat membantu anda membangun kesadaran akan pentingnya perawatan kesehatan yang primer dalam menjaga kesehatan.</p>', 'default.png', 'banner.jpg', 'banner.jpg', '2024-05-27 08:03:13', 12, 1, 1, 'draft'),
(46, 'Pengaruh Teknologi Digital terhadap Perkembangan Sosial Anak ', '1', '<p>Penggunaan teknologi digital semakin meluas di kalangan anak-anak, yang dapat mempengaruhi cara mereka berinteraksi sosial. Artikel ini mengidentifikasi faktor-faktor yang mempengaruhi perkembangan sosial anak dalam konteks teknologi digital, serta pentingnya memahami dampak positif dan negatifnya dalam mendukung perkembangan sosial yang sehat.</p><p>Pengaruh Penggunaan Teknologi Digital Terhadap Perkembangan Sosial Anak:<br>1. Interaksi Sosial Virtual: Anak-anak sering kali terlibat dalam interaksi sosial melalui media sosial, permainan daring, dan platform online lainnya. Hal ini dapat mempengaruhi kemampuan mereka dalam membangun hubungan sosial secara langsung.</p><p>2. Kualitas Interaksi: Kualitas interaksi yang terjadi melalui teknologi digital dapat bervariasi. Interaksi yang positif dapat meningkatkan keterampilan sosial seperti kerjasama dan empati, sementara interaksi yang negatif seperti cyberbullying dapat berdampak buruk pada perkembangan sosial anak.</p>', '<p>Penggunaan teknologi digital semakin meluas di kalangan anak-anak, yang dapat mempengaruhi cara mereka berinteraksi sosial. Artikel ini mengidentifikasi faktor-faktor yang mempengaruhi perkembangan sosial anak dalam konteks teknologi digital, serta pentingnya memahami dampak positif dan negatifnya dalam mendukung perkembangan sosial yang sehat.</p><p>Pengaruh Penggunaan Teknologi Digital Terhadap Perkembangan Sosial Anak:<br>1. Interaksi Sosial Virtual: Anak-anak sering kali terlibat dalam interaksi sosial melalui media sosial, permainan daring, dan platform online lainnya. Hal ini dapat mempengaruhi kemampuan mereka dalam membangun hubungan sosial secara langsung.</p><p>2. Kualitas Interaksi: Kualitas interaksi yang terjadi melalui teknologi digital dapat bervariasi. Interaksi yang positif dapat meningkatkan keterampilan sosial seperti kerjasama dan empati, sementara interaksi yang negatif seperti cyberbullying dapat berdampak buruk pada perkembangan sosial anak.</p>', 'dokter.png', 'banner.jpg', 'banner_beranda.jpg', '2024-05-27 08:05:41', 12, 3, 1, 'publish'),
(50, 'Studi Literatur Penelitian Pengaruh Mutu Pelayanan Kesehatan terhadap Kepuasan dan Minat  ', '1', '<p>Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan dan menyediakan pelayanan medis dasar atau spesialistik,diselenggarakan oleh lebih dari datu jenis tenaga Kesehatan dan dipimpinoleh seorang tenaga medis (Purwaningtyas.n.d) Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan pelayanan Kesehatan perorangan yang menyediakan pelayanan medis dasar dan spesialistik ( Permenkes RI Nomor 9, 2014).</p><p>Menurut Kotler (Laksana, 2018:18), pelayanan adalah setiap Tindakan atau kegiatan yang dapat ditawarkan oleh suatu pihak kepada pihak lain, yang pada dasarnya tidak berwujud dan tidak mengakibatkan kepemilikan apapun.</p><p>&nbsp;</p><p>Konten ini telah tayang di Kompasiana.com dengan judul \"Studi Literatur Penelitian Pengaruh Mutu Pelayanan Kesehatan terhadap Kepuasan dan Minat Kembali di Klinik Pratama Promedika \", Klik untuk baca:<br>https://www.kompasiana.com/anisaputri8509/6641aac2c57afb7b5f189632/studi-literatur-penelitian-pengaruh-mutu-pelayanan-kesehatan-terhadap-kepuasan-dan-minat-kembali-di-klinik-pratama-promedika</p><p>Kreator: Anisa Putri</p><p>&nbsp;</p><p>Kompasiana adalah platform blog. Konten ini menjadi tanggung jawab bloger dan tidak mewakili pandangan redaksi Kompas.</p><p>Tulis opini Anda seputar isu terkini di Kompasiana.com</p><p>Perilaku pembeli dapat dijadikan kiat dasar untuk menghubungkan kualitas pelayanan kepuasan dan minat. Perilaku konsumen untuk menggunakan layanan yang sama apabila mereka merasa puas dengan pelayanan yang mereka terima, misalnya kualitas produk jasa yang bagus. Hal ini disebabkan karena pelanggan membeli atau memakai jasa yang sama sangat dipengaruhi oleh pengalaman pelanggan terhadap pelayanan yang diberikan sebelumnya.</p><p>Isi<br>Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan pelayanan Kesehatan perorangan yang menyediakan pelayanan medis dasar dan spesialistik ( Permenkes RI Nomor 9, 2014).</p><p>Berdasarkan jenis pelayanannya klinik dibagi menjadi dua, yaitu klinik utama dan klinik pratama. Klinik pratama merupakan klinik yang menyediakan pelayanan medis spesialistik atau pelayanan medis dasr dan spesialistik ( Permenkes RI Nomor 9,2014).</p><p>Bentuk pelayanan klinik berbeda-beda diantaranya rawat jalan, rawat inap, one day care, home care, serta pelayanan 24 jam dalam 7 hari. Klinik pratama yang menjalankan rawat inap harus memiliki izin dalam bentuk badan usaha, dan dapat dimiliki secara perorangan ataupun badan usaha. Bagi klinik yang yang menjalankan rawat inap harus menyediakan beberapa fasilitas sebagaimana tercantum dalam permenkes RI No.9 Tahun 2014 &nbsp;:</p>', '<p>Klinik Pratama<br>Klinik utama merupakan klinik yang menyelenggarakan pelayananmedik dasar yang melayani oleh dokter umum dan dipimpin oleh seorang dokter umum. Berdasarkan perjanjian klinik utama dapat dimiliki oleh perseorangan ataupun badan usaha.</p><p>Klinik Utama<br>Klinik utama merupakan Klinik yang menyelenggarakan pelayanan medik spesialistik atau pelayanan medik dasar dan spesialistik. &nbsp;Spesialistk artinya mengkhususkan pelayanan pada satu bidang tertentu berdasarkan disiplin ilmu, golongan umur, organ atau jenis penyakit terentu. Klinik ini harus dipimpin oleh seorang dokter spesialis ataupun dokter gigi spesialis. Berdasarkan perjanjiannya klinik ini hanya dapat dimiliki oleh badan usaha berupa CV, ataupun PT.</p><p>Pelayanan adalah usaha melayani kebutuhan orang lain dengan memperoleh imbalab (uang) atau jasa. Menurut AS.Moenir, pelayanan adalah proses pemenuhan kebutuhan melalui aktivitas oranf lain yang langsung (Moenir, 2005:16)</p><p>Ruang rawat inap yang memenuhi persyaratan yaitu minimal ada 5 bed dan maksimal yaitu 10 bed, dengan lama inap maksimal 10 hari.<br>Tenaga medis dan keperawatan sesuai jumlah kualifikasi.<br>Mempunyai dapur gizi.<br>Pelayanan laboratorium klinik pratama<br>Jenis-jenis Klinik</p><p>Kompasiana adalah platform blog. Konten ini menjadi tanggung jawab bloger dan tidak mewakili pandangan redaksi Kompas.</p><p>Tulis opini Anda seputar isu terkini di Kompasiana.com</p>', 'klinik.png', 'banner_beranda.jpg', 'banner_beranda.jpg', '2024-05-27 08:18:30', 12, 3, 1, 'draft');

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
(1, 'A', 'latyout_a.png'),
(2, 'B', 'layout_b.png'),
(3, 'C', 'layout_c.png');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `teks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `gambar`, `teks`) VALUES
(1, 'banner.jpg', 'PT GOLDSTEP INDONESIAan');

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
(1, 'pt goldstep indonesiaan', 'default', 'banner.jpg');

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
(12, 'goldstep klinik', 'goldstep klinik', 'icon_trushmedis.png', 2, 1),
(20, 'goldstep lab', 'goldstep lab', 'dokter.png', 2, 1),
(36, 'setting', 'Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai', 'logo_goldstep.png', 1, 1),
(77, 'Keuangan', 'Menu untuk mensetting keuangan', 'default.png', 36, 1),
(78, 'Penggajian', 'Menu untuk mensetting penggajian', 'dokter.png', 77, 1);

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
(1, 'goldstep', 'goldstep.co.id', 'Taman Kopo Indah 3, Ruko D35\r\nBandung, Indonesiaa', '+62 812-2218-8524', '', '');

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
(23, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-21 07:17:46'),
(24, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-21 21:13:14'),
(25, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-21 21:13:27'),
(26, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-21 22:41:33'),
(27, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 03:37:52'),
(28, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:10:35'),
(29, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:10:41'),
(30, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:12:02'),
(31, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:14:35'),
(32, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:14:35'),
(33, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:18:31'),
(34, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:19:10'),
(35, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:23:14'),
(36, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-25 17:23:21'),
(37, 1, 'ubah', 'mengubah informasi kontak', 0, 1, '2024-05-26 15:31:47'),
(38, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-26 17:16:12'),
(39, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-26 17:16:19'),
(40, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-26 17:17:32'),
(41, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-26 17:18:09'),
(42, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-26 17:19:05'),
(43, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-26 17:19:16'),
(44, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-26 19:51:56'),
(45, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-26 22:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `isi`) VALUES
(1, '<h2><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kebijakan Privasi</strong></h2><p>&nbsp;</p><p>&nbsp;</p><h3><strong>1. Pendahuluan</strong></h3><p>Kami di goldstep menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat Anda mengunjungi situs web kami.</p><h3><strong>2. Informasi yang Kami Kumpulkan</strong></h3><p>Kami dapat mengumpulkan berbagai jenis informasi dari Anda, termasuk:</p><ul><li><strong>Informasi Pribadi</strong>: Nama, alamat email, nomor telepon, alamat pos, dll.</li><li><strong>Informasi Teknis</strong>: Alamat IP, jenis browser, sistem operasi, informasi perangkat.</li><li><strong>Informasi Penggunaan</strong>: Halaman yang dikunjungi, waktu yang dihabiskan di halaman tersebut, klik, dan aktivitas serupa.</li></ul><h3><strong>3. Bagaimana Kami Menggunakan Informasi Anda</strong></h3><p>Informasi yang kami kumpulkan dapat digunakan untuk:</p><ul><li>Menyediakan, mengoperasikan, dan memelihara situs web kami.</li><li>Meningkatkan, mempersonalisasi, dan memperluas situs web kami.</li><li>Berkomunikasi dengan Anda, termasuk melalui email, tentang pembaruan, promosi, dan layanan lainnya.</li><li>Menganalisis bagaimana pengguna menggunakan situs web kami untuk meningkatkan pengalaman pengguna.</li></ul><h3><strong>4. Bagaimana Kami Melindungi Informasi Anda</strong></h3><p>Kami menggunakan berbagai langkah keamanan teknis dan organisasi untuk melindungi data pribadi Anda dari akses yang tidak sah, penggunaan yang tidak semestinya, atau pengungkapan. Meskipun kami berusaha keras untuk melindungi data pribadi Anda, tidak ada metode transmisi melalui internet atau metode penyimpanan elektronik yang 100% aman.</p><h3><strong>5. Pengungkapan kepada Pihak Ketiga</strong></h3><p>Kami tidak akan menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali jika diharuskan oleh hukum atau sebagai bagian dari layanan yang Anda gunakan.</p><h3><strong>6. Cookies</strong></h3><p>Situs web kami menggunakan cookies untuk meningkatkan pengalaman pengguna Anda. Cookies adalah file teks kecil yang disimpan di perangkat Anda. Anda dapat memilih untuk menonaktifkan cookies melalui pengaturan browser Anda, tetapi ini mungkin mempengaruhi fungsi situs web kami.</p><h3><strong>7. Hak Anda</strong></h3><p>Anda memiliki hak untuk:</p><ul><li>Mengakses informasi pribadi yang kami miliki tentang Anda.</li><li>Meminta perbaikan atau penghapusan informasi pribadi Anda.</li><li>Menolak atau membatasi pemrosesan data pribadi Anda.</li><li>Menarik persetujuan Anda kapan saja (jika pemrosesan didasarkan pada persetujuan).</li></ul><h3><strong>8. Perubahan pada Kebijakan Privasi</strong></h3><p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diberitahukan dengan memperbarui tanggal di bagian atas kebijakan ini dan/atau melalui pemberitahuan langsung kepada Anda.</p><h3><strong>9. Hubungi Kami</strong></h3><p>Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini atau praktik privasi kami, silakan hubungi kami di:</p><ul><li>Email: [Alamat Email Anda]</li><li>Alamat: [Alamat Kantor Anda]</li></ul>');

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
(29, 'klinik', 50, 1),
(36, 'pendidikan', 46, 1),
(39, 'klinik', 45, 1);

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
(1, 'goldstep indonesia', 'For more than 15 years in the software development industry, we have provided software development in various types of businesses ranging from retail, manufacturing, e-commerce, health care to edutech on various business scales. Our developers have implemented customized software according to the business requirements of each client.'),
(5, 'halo', 'halooo');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_condition`
--

CREATE TABLE `terms_and_condition` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms_and_condition`
--

INSERT INTO `terms_and_condition` (`id`, `isi`) VALUES
(1, '<h2><strong>Syarat dan Ketentuan</strong></h2><h3><strong>1. Pendahuluan</strong></h3><p>Selamat datang di [Nama Perusahaan/Website]! Dengan mengakses atau menggunakan situs web kami yang terletak di [URL Situs Web] (selanjutnya disebut \"Situs\"), Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut (selanjutnya disebut \"Syarat dan Ketentuan\"). Jika Anda tidak setuju dengan bagian manapun dari Syarat dan Ketentuan ini, harap jangan menggunakan Situs kami.</p><h3><strong>2. Penggunaan Situs</strong></h3><ul><li><strong>Kelayakan</strong>: Anda harus berusia minimal [usia minimum] tahun untuk menggunakan Situs ini.</li><li><strong>Akses dan Penggunaan</strong>: Anda setuju untuk menggunakan Situs ini hanya untuk tujuan yang sah dan sesuai dengan Syarat dan Ketentuan ini.</li><li><strong>Larangan Penggunaan</strong>: Anda setuju untuk tidak menggunakan Situs ini untuk tindakan yang melanggar hukum, merusak, atau merugikan pihak ketiga.</li></ul><h3><strong>3. Akun Pengguna</strong></h3><ul><li><strong>Pendaftaran Akun</strong>: Untuk mengakses beberapa fitur Situs, Anda mungkin diminta untuk mendaftar dan membuat akun pengguna.</li><li><strong>Keamanan Akun</strong>: Anda bertanggung jawab atas menjaga kerahasiaan informasi akun Anda, termasuk kata sandi, dan untuk semua aktivitas yang terjadi di bawah akun Anda.</li><li><strong>Kewajiban Akun</strong>: Anda setuju untuk memberikan informasi yang akurat, lengkap, dan terkini saat mendaftar dan menggunakan akun Anda.</li></ul><h3><strong>4. Konten Pengguna</strong></h3><ul><li><strong>Kepemilikan Konten</strong>: Anda mempertahankan kepemilikan atas semua konten yang Anda kirimkan, posting, atau tampilkan di atau melalui Situs.</li><li><strong>Lisensi Konten</strong>: Dengan mengirimkan, memposting, atau menampilkan konten di atau melalui Situs, Anda memberikan lisensi non-eksklusif, bebas royalti, dan dapat dipindahtangankan kepada kami untuk menggunakan, menyalin, memodifikasi, dan menampilkan konten tersebut.</li></ul><h3><strong>5. Kekayaan Intelektual</strong></h3><ul><li><strong>Kepemilikan</strong>: Semua hak cipta, merek dagang, dan hak kekayaan intelektual lainnya dalam dan atas Situs dan kontennya adalah milik kami atau pemberi lisensi kami.</li><li><strong>Penggunaan Terbatas</strong>: Anda tidak diperbolehkan menggunakan konten kami tanpa izin tertulis dari kami.</li></ul><h3><strong>6. Batasan Tanggung Jawab</strong></h3><ul><li><strong>Tidak Ada Jaminan</strong>: Situs ini disediakan \"sebagaimana adanya\" dan \"sebagaimana tersedia\". Kami tidak memberikan jaminan apapun terkait ketersediaan, keakuratan, atau kelengkapan Situs.</li><li><strong>Batasan Kerugian</strong>: Dalam hal apapun, kami tidak bertanggung jawab atas kerugian atau kerusakan tidak langsung, insidental, khusus, atau konsekuensial yang timbul dari penggunaan atau ketidakmampuan menggunakan Situs.</li></ul><h3><strong>7. Perubahan pada Syarat dan Ketentuan</strong></h3><p>Kami berhak untuk memperbarui atau mengubah Syarat dan Ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Perubahan akan berlaku segera setelah diposting di Situs. Anda disarankan untuk meninjau Syarat dan Ketentuan ini secara berkala.</p><h3><strong>8. Hukum yang Berlaku</strong></h3><p>Syarat dan Ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum [Negara/Wilayah Anda]. Setiap sengketa yang timbul dari atau terkait dengan Syarat dan Ketentuan ini akan diselesaikan di pengadilan [Negara/Wilayah Anda].</p><h3><strong>9. Kontak Kami</strong></h3><p>Jika Anda memiliki pertanyaan atau kekhawatiran mengenai Syarat dan Ketentuan ini, silakan hubungi kami di:</p><ul><li>Email: [Alamat Email Anda]</li><li>Alamat: [Alamat Kantor Anda]</li></ul>');

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
(1, 'adit', 'adit@gmail.com', 'pesan', 'deskripsi ', ''),
(2, 'raihan', 'raihan@gmail.com', 'raihan', 'Siapa yang tidak mengenal kata “raihan”? Kata yang terdengar sederhana, namun sarat dengan makna dan simbolisme. Dalam bahasa Indonesia, kata “raihan” memiliki arti keberhasilan yang diraih setelah melalui perjuangan yang penuh keringat dan kerja keras. Bukankah itu menggambarkan betapa indahnya hidup ini, saat kita benar-benar berusaha dan kemudian kita mencapai apa yang kita inginkan?\r\n\r\nRaihan bisa menjadi kata yang memberikan semangat dan inspirasi bagi banyak orang. Tidak hanya bagi mereka yang tengah berjuang keras mengejar impiannya, tetapi juga bagi mereka yang merasa putus asa dan perlu dorongan untuk tetap bergerak maju. Kata “raihan” memberikan makna bahwa kita semua bisa meraih apa yang kita inginkan jika kita mau berjuang dengan tekad yang kuat.', ''),
(3, 'ghazi', 'ghazi@gmail.com', 'pesan', 'Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.Mengirim pesan dalam jumlah kata yang begitu banyak, bisa membuat HP teman ngeblank, error, dan membuat aplikasi WhatsApp tertutup tiba-tiba. Tenang saja, ini tak akan membuat HP korban rusak. Sistem mereka hanya kaget saja. Tapi biasanya sebelum HP mereka yang ngeblank, HP Anda bakal ngeblank duluan karena terlalu banyak mengirim pesan.', '');

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
-- Indexes for table `banner`
--
ALTER TABLE `banner`
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
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `artikel_layout`
--
ALTER TABLE `artikel_layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header_tentang_kami`
--
ALTER TABLE `header_tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
