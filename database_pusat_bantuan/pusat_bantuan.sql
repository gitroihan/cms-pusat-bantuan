-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 06:22 AM
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
  `status` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `pembuat`, `isi`, `isi2`, `gambar_artikel`, `gambar_1`, `gambar_2`, `tanggal_unggah`, `id_kategori`, `id_layout`, `id_user`, `status`, `slug`) VALUES
(45, 'Pentingkah Perawatan di Klinik Kecantikan?', '1', '<p>Pentingkah Perawatan di Klinik Kecantikan? Ulik di Sini Efektivitasnya!Mengapa perawatan di klinik kecantikan dianggap penting? Temukan alasan betapa pentingnya perawatan di klinik kecantikan dengan mengulik informasi selengkapnya dalam artikel berikut ini.</p><p>Kecantikan diri adalah hal yang kerap kali diperjuangkan oleh seluruh orang. Ada jenis perawatan yang bisa dilakukan secara sederhana di rumah, ada pula perawatan yang membutuhkan tenaga ahli seperti di klinik kecantikan.</p><p>Dibandingkan melakukan perawatan yang sederhana, perawatan di klinik kecantikan memiliki manfaat yang lebih unggul untuk merawat serta mempercantik diri. Memangnya, apa saja manfaat yang diberikan dari perawatan di klinik kecantikan?</p><p>Antara lain:<br>- Mendapatkan konsultasi dari ahli yang profesional<br>- Mendapat rekomendasi perawatan sesuai kebutuhan<br>- Jenis perawatan canggih yang lebih beragam<br>- Prosedur treatment yang lebih berkualitas<br>- Produk yang digunakan lebih terjamin efektivitasnya<br>- Teknologi untuk treatment lebih canggih<br>- Penanganan masalah yang lebih efektif<br>- Hasil perawatan lebih optimal</p>', '<p>Dari manfaat di atas, perawatan di klinik kecantikan memberikan hasil yang lebih efektif secara keseluruhan. Bahkan, perawatan di klinik kecantikan cocok jadi penyeimbang penggunaan skincare yang rutin.</p><p>Namun, perawatan di klinik kecantikan juga memiliki beberapa pertimbangan yang harus diketahui. Mulai dari tempat, biaya perawatan, hingga resiko, dan efek samping yang diberikan.</p><p>Maka dari itu, pilihlah klinik kecantikan terpercaya dan berkualitas untuk mendukung hasil perawatan yang lebih baik. Pastikan klinik kecantikan tersebut memberikan hasil yang nyata dan realistis tanpa memberikan efek samping yang merugikan.</p><p>Dapatkan pengalaman perawatan di klinik kecantikan untuk wujudkan performa kulit yang diinginkan.</p>', 'gambarartikelklinik.png', 'artikelgambarklinikkecantikan.jpg', 'artikelgambarklinikkecantikan2.jpg', '2024-06-02 12:44:41', 12, 1, 1, 'publish', 'pentingkah-perawatan-di-klinik-kecantikan-1'),
(46, 'Pengaruh Teknologi Digital terhadap Perkembangan Sosial Anak', '1', '<p>Penggunaan teknologi digital semakin meluas di kalangan anak-anak, yang dapat mempengaruhi cara mereka berinteraksi sosial. Artikel ini mengidentifikasi faktor-faktor yang mempengaruhi perkembangan sosial anak dalam konteks teknologi digital, serta pentingnya memahami dampak positif dan negatifnya dalam mendukung perkembangan sosial yang sehat.</p><p>Pengaruh Penggunaan Teknologi Digital Terhadap Perkembangan Sosial Anak:<br>1. Interaksi Sosial Virtual: Anak-anak sering kali terlibat dalam interaksi sosial melalui media sosial, permainan daring, dan platform online lainnya. Hal ini dapat mempengaruhi kemampuan mereka dalam membangun hubungan sosial secara langsung.</p><p>2. Kualitas Interaksi: Kualitas interaksi yang terjadi melalui teknologi digital dapat bervariasi. Interaksi yang positif dapat meningkatkan keterampilan sosial seperti kerjasama dan empati, sementara interaksi yang negatif seperti cyberbullying dapat berdampak buruk pada perkembangan sosial anak.</p>', '<p>Studi Kasus dan Penelitian Empiris:<br>Studi empiris menunjukkan bahwa anak-anak yang terlalu banyak terpapar pada media sosial dan permainan daring cenderung mengalami penurunan dalam keterampilan sosial, seperti kemampuan membaca ekspresi wajah atau menanggapi emosi orang lain secara langsung.</p><p>Implikasi dan Rekomendasi:<br>Memahami dampak teknologi digital terhadap perkembangan sosial anak adalah kunci dalam mengelola penggunaan teknologi dalam pendidikan dan keluarga. Rekomendasi praktis termasuk mengatur waktu layar, mengawasi konten yang dikonsumsi anak, dan mendorong interaksi sosial offline untuk mendukung perkembangan sosial yang seimbang.</p>', 'gambarartikelanakkecil.png', 'artikelgambarpengarusdigital2.jpg', 'artikelgambarpengarusdigital1.jpg', '2024-05-30 06:50:53', 12, 1, 1, 'publish', 'pengaruh-teknologi-digital-terhadap-perkembangan-sosial-anak'),
(50, 'Studi Literatur Penelitian Pengaruh Mutu Pelayanan Kesehatan terhadap Kepuasan dan Minat', '1', '<p>Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan dan menyediakan pelayanan medis dasar atau spesialistik,diselenggarakan oleh lebih dari datu jenis tenaga Kesehatan dan dipimpinoleh seorang tenaga medis (Purwaningtyas.n.d) Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan pelayanan Kesehatan perorangan yang menyediakan pelayanan medis dasar dan spesialistik ( Permenkes RI Nomor 9, 2014).</p><p>Menurut Kotler (Laksana, 2018:18), pelayanan adalah setiap Tindakan atau kegiatan yang dapat ditawarkan oleh suatu pihak kepada pihak lain, yang pada dasarnya tidak berwujud dan tidak mengakibatkan kepemilikan apapun.</p><p>&nbsp;</p><p>Konten ini telah tayang di Kompasiana.com dengan judul \"Studi Literatur Penelitian Pengaruh Mutu Pelayanan Kesehatan terhadap Kepuasan dan Minat Kembali di Klinik Pratama Promedika \", Klik untuk baca:<br>https://www.kompasiana.com/anisaputri8509/6641aac2c57afb7b5f189632/studi-literatur-penelitian-pengaruh-mutu-pelayanan-kesehatan-terhadap-kepuasan-dan-minat-kembali-di-klinik-pratama-promedika</p><p>Kreator: Anisa Putri</p><p>&nbsp;</p><p>Kompasiana adalah platform blog. Konten ini menjadi tanggung jawab bloger dan tidak mewakili pandangan redaksi Kompas.</p><p>Tulis opini Anda seputar isu terkini di Kompasiana.com</p><p>Perilaku pembeli dapat dijadikan kiat dasar untuk menghubungkan kualitas pelayanan kepuasan dan minat. Perilaku konsumen untuk menggunakan layanan yang sama apabila mereka merasa puas dengan pelayanan yang mereka terima, misalnya kualitas produk jasa yang bagus. Hal ini disebabkan karena pelanggan membeli atau memakai jasa yang sama sangat dipengaruhi oleh pengalaman pelanggan terhadap pelayanan yang diberikan sebelumnya.</p><p>Isi<br>Klinik adalah fasilitas pelayanan Kesehatan yang menyelenggarakan pelayanan Kesehatan perorangan yang menyediakan pelayanan medis dasar dan spesialistik ( Permenkes RI Nomor 9, 2014).</p><p>Berdasarkan jenis pelayanannya klinik dibagi menjadi dua, yaitu klinik utama dan klinik pratama. Klinik pratama merupakan klinik yang menyediakan pelayanan medis spesialistik atau pelayanan medis dasr dan spesialistik ( Permenkes RI Nomor 9,2014).</p><p>Bentuk pelayanan klinik berbeda-beda diantaranya rawat jalan, rawat inap, one day care, home care, serta pelayanan 24 jam dalam 7 hari. Klinik pratama yang menjalankan rawat inap harus memiliki izin dalam bentuk badan usaha, dan dapat dimiliki secara perorangan ataupun badan usaha. Bagi klinik yang yang menjalankan rawat inap harus menyediakan beberapa fasilitas sebagaimana tercantum dalam permenkes RI No.9 Tahun 2014 &nbsp;:</p>', '<p>Klinik Pratama<br>Klinik utama merupakan klinik yang menyelenggarakan pelayananmedik dasar yang melayani oleh dokter umum dan dipimpin oleh seorang dokter umum. Berdasarkan perjanjian klinik utama dapat dimiliki oleh perseorangan ataupun badan usaha.</p><p>Klinik Utama<br>Klinik utama merupakan Klinik yang menyelenggarakan pelayanan medik spesialistik atau pelayanan medik dasar dan spesialistik. &nbsp;Spesialistk artinya mengkhususkan pelayanan pada satu bidang tertentu berdasarkan disiplin ilmu, golongan umur, organ atau jenis penyakit terentu. Klinik ini harus dipimpin oleh seorang dokter spesialis ataupun dokter gigi spesialis. Berdasarkan perjanjiannya klinik ini hanya dapat dimiliki oleh badan usaha berupa CV, ataupun PT.</p><p>Pelayanan adalah usaha melayani kebutuhan orang lain dengan memperoleh imbalab (uang) atau jasa. Menurut AS.Moenir, pelayanan adalah proses pemenuhan kebutuhan melalui aktivitas oranf lain yang langsung (Moenir, 2005:16)</p><p>Ruang rawat inap yang memenuhi persyaratan yaitu minimal ada 5 bed dan maksimal yaitu 10 bed, dengan lama inap maksimal 10 hari.<br>Tenaga medis dan keperawatan sesuai jumlah kualifikasi.<br>Mempunyai dapur gizi.<br>Pelayanan laboratorium klinik pratama<br>Jenis-jenis Klinik</p><p>Kompasiana adalah platform blog. Konten ini menjadi tanggung jawab bloger dan tidak mewakili pandangan redaksi Kompas.</p><p>Tulis opini Anda seputar isu terkini di Kompasiana.com</p>', 'klinik.png', 'banner_beranda.jpg', 'banner_beranda.jpg', '2024-06-02 12:44:08', 12, 3, 1, 'publish', 'studi-literatur-penelitian-pengaruh-mutu-pelayanan-kesehatan-terhadap-kepuasan-dan-minat'),
(64, 'NCC dan PSC 119: Penyelenggaraan, Fungsi, dan Layanannya', '2', '<p>Apakah Anda tahu apa itu NCC 119? Pernahkah Anda melihat ambulan bertuliskan PSC 119? Siapa pelaksana operasional ambulan PSC 119? Apa fungsi ambulan tersebut? Kenapa juga ada angka 119? Lebih lanjut, apa sih sebetulnya PSC119 itu? Tulisan ini mencoba menjawab pertanyaan-pertanyaan di atas dengan mengacu kepada peraturan terkait serta berdasarkan pengalaman penulis sebagai personil Tim Mentor PT Sijarimas Teknologi Inovasi (STI) dalam mendampingi penyiapan PSC 119 di sejumlah kabupaten/kota di Indonesia.</p><p><br>NCC (National Command Center) dan PSC (Public Safety Center) adalah bagian dari sistem penanggulangan gawat darurat terpadu atau SPGDT di Indonesia. Penyelenggaraan SPGDT ini &nbsp;mengacu pada Peraturan Menteri Kesehatan RI nomor 19 &nbsp;tahun 2016 tentang Sistem Penanggulangan Gawat Darurat Terpadu. Menurut Permenkes &nbsp;tersebut, SPGDT adalah suatu mekanisme pelayanan korban atau pasien gawat darurat yang terintegrasi dan berbasis call center dengan menggunakan kode akses telekomunikasi 119 dengan melibatkan masyarakat. &nbsp;</p><p>SPGDT bertujuan meningkatkan akses dan mutu pelayanan kegawatdaruratan, mempercepat waktu penanganan (respon time) korban atau pasien gawat darurat, dan menurunkan angka kematian serta kecacatan. Ruang lingkup pengaturan SPGDT meliputi penyelenggaraan kegawatdaruratan medis sehari-hari, misalnya korban kecelakaan lalu lintas, korban kebakaran, orang tenggelam, penderita serangan jantung, korban gigitan binatang buas, dan-lain-lain.</p>', '<p>Personalia PSC terdiri dari &nbsp;koordinator, tenaga kesehatan, operator call center, dan tenaga lain. Koordinator memiliki tugas menggerakkan tim ke lapangan jika ada informasi adanya kejadian kegawatdaruratan dan mengoordinasikan kegiatan dengan kelompok lain diluar bidang kesehatan.</p><p>Tenaga kesehatan terdiri dari tenaga medis, tenaga perawat, dan tenaga bidan yang terlatih kegawatdaruratan. Tenaga kesehatan memiliki tugas memberikan pertolongan gawat darurat dan stabilisasi bagi korban, dan mengevakuasi korban ke fasilitas pelayanan kesehatan terdekat untuk mendapatkan pelayanan kesehatan sesuai dengan tingkat kegawatdaruratannya.</p><p>Operator call center merupakan petugas penerima panggilan dengan kualifikasi minimal tenaga kesehatan. Dia memiliki tugas menerima dan menjawab panggilan yang masuk ke call center, mengoperasionalkan komputer dan aplikasinya, &nbsp;dan menginput di sistem aplikasi komputer di call center. Tenaga lain merupakan tenaga yang mendukung penyelenggaraan PSC, misalnya sopir mobil ambulan, tenaga ahli Teknologi Informasi dan Komunikasi.</p><p>Sistem Komunikasi Gawat Darurat<br>Sistem komunikasi gawat darurat dikelola oleh NCC dan dilakukan secara terintegrasi antara NCC, PSC, dan Fasilitas Pelayanan Kesehatan. Masyarakat yang mengetahui dan mengalami kegawatdaruratan medis dapat melaporkan dan/atau meminta bantuan melalui Call Center 119.</p>', 'gambarartikelambulan.png', 'artikelgambarambulan1.jpg', 'artikelgambarambulan2.jpg', '2024-06-02 12:44:36', 12, 2, 2, 'publish', 'ncc-dan-psc-119-penyelenggaraan-fungsi-dan-layanannya'),
(65, 'Perkembangan Teknologi Laboratorium Medis di Dunia Kesehatan', '2', '<p>eknologi Laboratorium Medis (TLM) adalah pelayanan laboratorium kesehatan untuk mengetahui keadaan tubuh seseorang terhadap kondisi suatu penyakit dengan cara melakukan analisis terhadap cairan dan jaringan tubuh manusia. Ahli Teknologi Laboratorium Medis dapat membantu Dokter dalam penegakan diagnosa pasien, untuk dapat memberikan penanganan yang lebih cepat kepada pasien.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Teknologi Kesehatan adalah segala bentuk alat, produk, dan/atau metode yang ditujukan untuk membantu menegakkan diagnosis, pencegahan, dan penanganan permasalahan kesehatan manusia. Hadirnya teknologi mampu memberikan kemudahan bagi pasien. Terutama dalam mengakses informasi dan pelayanan kesehatan.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sejarah perkembangan laboratorium kesehatan di dunia dimulai sejak awal diketemukannya mikroba oleh Antony van Leeuwenhoek (1632 -- 1723) yang kemudian menjadikannya menjadi salah seorang penemu mikrobiologi. Kemudian dilanjutkan dengan beberapa penemuan di dunia mikrobiologi lainnya seperti Louis Pasteur (1822 -- 1895) penemu teori biogenesis dan penemu protozoa penyebab penyakit serta penemu vaksin, Robert Koch (1843 -- 1910) penemu penyakit Anthrax dan terkenal dengan Postulat Koch.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tidak ada buku sejarah yang otentik tentang perkembangan laboratorium di Indonesia, namun menelusuri berbagai catatan dan masukan dari beberapa orang yang terlibat dalam proses terbentuknya laboratorium kesehatan di Indonesia. Perkembangan tersebut adalah sejak dimulainya pemerintah penjajahan Belanda pada abad ke -16, pada tahun 1851 sekolah dokter Jawa didirikan oleh dr. Bosch, kepala pelayanan kesehatan sipil dan militer dan dr. Bleeker di Indonesia. Kemudian sekolah ini terkenal dengan nama STOVIA (School Tot Oplelding Van Indiche Arsten) atau sekolah untuk pendidikan dokter pribumi.&nbsp;</p>', '<p>Dalam rangka mengembangkan kesehatan masyarakat di Indonesia pada saat itu kemudian didirikan Pusat Laboratorium Kedokteran di Bandung pada tahun 1888. Kemudian pada tahun 1938, pusat laboratorium ini berubah menjadi Lembaga Eykman dan selanjutnya disusul didirikan laboratorium lain di Medan, Semarang, Makassar, Surabaya dan Yogyakarta. Laboratorium-laboratorium ini mempunyai peranan yang sangat penting dalam rangka menunjang pemberantasan penyakit seperti malaria, lepra, cacar dan sebagainya bahkan untuk bidang kesehatan masyarakat yang lain seperti gizi dan sanitasi.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pada tahun 1968 dalam rapat kerja kesehatan nasional, dicetuskan bahwa puskesmas adalah merupakan sistem pelayanan kesehatan terpadu yang kemudian dikembangkan oleh pemerintah (Departemen Kesehatan) menjadi Pusat Pelayanan Kesehatan Masyarakat (Puskesmas). Salah satu kegiatan pokok puskesmas mencakup antara lain adalah laboratorium. Kemudian terjadi perkembangan pelayanan laboratorium kesehatan selain yang diselenggarakan oleh pemerintah khususnya swasta dengan berdirinya Laboratorium Klinik \"CITO \" pada tanggal 10 April 1967 oleh Bapak. H. Achmad Djoeahir.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Perkembangan institusi pendidikan analis kesehatan mengalami perkembangan yang pesat. Seperti halnya kebijakan pemerintah untuk menggabungkan akademi-akademi kesehatan di institusi negeri menjadi Politeknik Kesehatan dan mengilhami pendirian sekolah-sekolah tinggi kesehatan yang juga menyelenggarakan pendidikan Diploma III dan Diploma IV Analis Kesehatan.&nbsp;</p><p>Atas kerja keras dan komitmen organisasi profesi analis kesehatan (PATELKI) maka sampai saat ini telah ada institusi penyelenggara S1 Analis Kesehatan dengan nama S1 Teknologi Laboratorium Kesehatan yang berada di Makassar. Sampai saat ini pendidikan Analis Kesehatan terus berkembang pesat sampai terbentuklan nomenklatur yang baru yaitu Teknologi Laboratorium Medis (TLM).</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ahli teknologi laboratorium medis atau yang sering disebut analis kesehatan berperan dalam membantu dokter untuk mengidentifikasi jenis penyakit dan menentukan langkah perawatan yang tepat. Untuk dapat bekerja sebagai ahli teknologi laboratorium medis, diperlukan kualifikasi di bidang Teknologi Laboratorium Medis (TLM).</p>', 'gambarartikellab.png', 'artikelgambarlab.jpg', 'artikelgambarlab2.jpg', '2024-06-02 12:44:29', 20, 1, 2, 'publish', 'perkembangan-teknologi-laboratorium-medis-di-dunia-kesehatan');

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
(1, 'banner_beranda.jpg', 'PT GOLDSTEP INDONESIA');

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
(1, 'pt goldstep indonesia', 'default ', 'banner.jpg');

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
  `id_user` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `deskripsi_kategori`, `ikon`, `id_parent`, `id_user`, `slug`) VALUES
(1, 'Feature ', 'Tata cara penggunaan sistem Goldstep', 'logo_goldstep.png', NULL, 1, 'feature'),
(2, 'produk ', 'Goldstep Product', 'icon_trushmedis.png', NULL, 1, 'produk'),
(12, 'goldstep klinik ', 'goldstep klinik', 'icon_trushmedis.png', 2, 1, 'goldstep-klinik'),
(20, 'goldstep lab ', 'goldstep lab', 'dokter.png', 2, 1, 'goldstep-lab-1'),
(36, 'setting', 'Modul setting, digunakan untuk melakukan penyesuaian data-data master yang berkaitan dengan pelayanan saat menggunakan sistem HIS seperti master harga dan data pegawai', 'rumah sakit.jpeg', 1, 1, ''),
(77, 'Keuangan', 'Menu untuk mensetting keuangan', 'default.png', 36, 1, ''),
(78, 'Penggajian', 'Menu untuk mensetting penggajian', 'dokter.png', 77, 1, '');

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
(1, 'goldstep teknologi indonesia', 'goldstep.co.id', 'Taman Kopo Indah 3, Ruko D35\r\nBandung, Indonesiaa', '+62 812-2218-8524', '', '');

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
(45, 1, 'Update Profile', 'mengubah informasi profile', 0, 1, '2024-05-26 22:25:39'),
(46, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-30 01:13:08'),
(47, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-30 01:13:27'),
(48, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-30 01:14:23'),
(49, 1, 'tambah', 'menambah kategori', 0, 1, '2024-05-30 01:14:34'),
(50, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-30 01:14:44'),
(51, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:14:54'),
(52, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:15:54'),
(53, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:16:07'),
(54, 1, 'hapus', 'menghapus kategori', 0, 1, '2024-05-30 01:16:16'),
(55, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-30 01:17:50'),
(56, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-30 01:19:18'),
(57, 1, 'tambah', 'menambah subkategori', 0, 1, '2024-05-30 01:19:28'),
(58, 1, 'hapus', 'menghapus subkategori', 0, 1, '2024-05-30 01:19:38'),
(59, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:19:52'),
(60, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:19:56'),
(61, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-30 01:20:09'),
(62, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-30 01:20:19'),
(63, 1, 'ubah', 'mengubah subkategori', 0, 1, '2024-05-30 01:20:31'),
(64, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:20:40'),
(65, 1, 'ubah', 'mengubah kategori', 0, 1, '2024-05-30 01:20:46'),
(66, 2, 'tambah', 'menambah kategori', 0, 2, '2024-05-30 19:17:06'),
(67, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-05-30 19:17:12'),
(68, 2, 'tambah', 'menambah kategori', 0, 2, '2024-05-30 19:51:05'),
(69, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-05-30 19:51:11'),
(70, 2, 'tambah', 'menambah kategori', 0, 2, '2024-05-30 19:51:27'),
(71, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-05-30 19:51:36'),
(72, 2, 'tambah', 'menambah kategori', 0, 2, '2024-05-30 19:53:37'),
(73, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-05-30 19:53:42'),
(74, 2, 'tambah', 'menambah kategori', 0, 2, '2024-05-30 19:54:02'),
(75, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-05-30 19:54:08'),
(76, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-05-30 23:32:22'),
(77, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-05-30 23:32:28'),
(78, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-05-30 23:33:09'),
(79, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-02 03:36:14'),
(80, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:23:33'),
(81, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:23:41'),
(82, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:23:49'),
(83, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:24:01'),
(84, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 07:24:35'),
(85, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:25:03'),
(86, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 07:29:14'),
(87, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 08:30:52'),
(88, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 08:30:56'),
(89, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 08:31:01'),
(90, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 08:31:05'),
(91, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 08:31:10'),
(92, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-02 19:48:49'),
(93, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:20:54'),
(94, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:20:59'),
(95, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:21:04'),
(96, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:23:26'),
(97, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:23:31'),
(98, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:23:35'),
(99, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:23:40'),
(100, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:23:47'),
(101, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:23:53'),
(102, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:33:11'),
(103, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:54:30'),
(104, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:54:34'),
(105, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-02 23:54:39'),
(106, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:56:00'),
(107, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:56:04'),
(108, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-02 23:56:08'),
(109, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-02 23:56:52'),
(110, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-06-02 23:57:12'),
(111, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-03 00:00:18'),
(112, 2, 'ubah', 'mengubah kategori', 0, 2, '2024-06-03 00:02:58'),
(113, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:05:01'),
(114, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:20'),
(115, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:31'),
(116, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:37'),
(117, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:43'),
(118, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:51'),
(119, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:06:58'),
(120, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 00:07:59'),
(121, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:08:06'),
(122, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 00:08:33'),
(123, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:08:43'),
(124, 2, 'ubah', 'mengubah subkategori', 0, 2, '2024-06-03 00:19:25'),
(125, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 00:21:21'),
(126, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:21:31'),
(127, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 00:29:21'),
(128, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:29:31'),
(129, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 00:30:22'),
(130, 2, 'tambah', 'menambah subkategori', 0, 2, '2024-06-03 00:31:14'),
(131, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-03 00:45:44'),
(132, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-06-03 00:46:00'),
(133, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-03 01:02:26'),
(134, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-03 02:38:10'),
(135, 2, 'ubah', 'mengubah kategori', 0, 2, '2024-06-03 02:38:22'),
(136, 2, 'ubah', 'mengubah kategori', 0, 2, '2024-06-03 02:38:31'),
(137, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-06-03 02:39:53'),
(138, 2, 'tambah', 'menambah kategori', 0, 2, '2024-06-04 19:30:33'),
(139, 2, 'ubah', 'mengubah kategori', 0, 2, '2024-06-04 19:31:31'),
(140, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-06-04 19:31:53'),
(141, 2, 'ubah', 'mengubah isi dari terms and condition', 0, 2, '2024-06-04 19:39:35'),
(142, 2, 'ubah', 'mengubah teks dari privacy policy', 0, 2, '2024-06-04 19:41:56'),
(143, 2, 'ubah', 'mengubah judul di beranda', 0, 2, '2024-06-04 19:48:41'),
(144, 2, 'ubah', 'mengubah judul dan gambar di beranda', 0, 2, '2024-06-04 19:49:02'),
(145, 2, 'ubah', 'mengubah gambar di beranda', 0, 2, '2024-06-04 19:49:27'),
(146, 2, 'ubah', 'mengubah informasi kontak: nama, email, link whatsapp', 0, 2, '2024-06-04 19:54:55'),
(147, 2, 'ubah', 'mengubah informasi kontak: email, link whatsapp', 0, 2, '2024-06-04 19:55:27'),
(148, 2, 'tambah', 'menambahkan entri Tentang Kami: 1', 0, 2, '2024-06-04 19:58:39'),
(149, 2, 'tambah', 'menambahkan entri Tentang Kami: halooo', 0, 2, '2024-06-04 20:01:46'),
(150, 2, 'hapus', 'menghapus entri Tentang Kami: halooo', 0, 2, '2024-06-04 20:01:50'),
(151, 2, 'ubah', 'mengubah entri Tentang Kami: deskripsi', 0, 2, '2024-06-04 20:04:44'),
(152, 2, 'ubah', 'mengubah entri Tentang Kami: judul', 0, 2, '2024-06-04 20:05:04'),
(153, 2, 'ubah', 'mengubah entri Tentang Kami: judul, deskripsi', 0, 2, '2024-06-04 20:05:16'),
(154, 2, 'ubah', 'mengubah header Tentang Kami: judul banner, deskripsi, gambar', 0, 2, '2024-06-04 20:09:41'),
(155, 2, 'ubah', 'mengubah header Tentang Kami: gambar', 0, 2, '2024-06-04 20:10:09'),
(156, 2, 'tambah', 'menambahkan artikel: tes', 0, 2, '2024-06-04 20:23:20'),
(157, 2, 'ubah', 'mengubah artikel: paragraf 2', 0, 2, '2024-06-04 20:29:24'),
(158, 2, 'ubah', 'mengubah artikel: paragraf 1, paragraf 2', 0, 2, '2024-06-04 20:30:21'),
(159, 2, 'hapus', 'menghapus artikel: tes', 0, 2, '2024-06-04 20:30:42'),
(160, 116, 'tambah', 'menambah kategori: tes dengan deskripsi:  dan ikon: default.png', 0, 2, '2024-06-04 20:33:36'),
(161, 2, 'hapus', 'menghapus kategori', 0, 2, '2024-06-04 20:33:53'),
(162, 117, 'tambah', 'menambah kategori: tes dengan deskripsi: 123 dan ikon: default.png', 0, 2, '2024-06-04 20:37:20'),
(163, 117, 'ubah', 'mengubah kategori: nama dari \'tes\' menjadi \'tes  gg\'', 0, 2, '2024-06-04 20:37:40'),
(164, 117, 'ubah', 'mengubah kategori: deskripsi dari \'123\' menjadi \'123  \'', 0, 2, '2024-06-04 20:37:55'),
(165, 117, 'ubah', 'mengubah kategori: nama dari \'tes  gg\' menjadi \'tes  gg    \', deskripsi dari \'123  \' menjadi \'123      \'', 0, 2, '2024-06-04 20:38:06'),
(166, 117, 'hapus', 'menghapus kategori: tes  gg    ', 0, 2, '2024-06-04 20:40:22'),
(167, 118, 'tambah', 'menambah kategori: tes sub dengan deskripsi:  dan ikon: default.png', 0, 2, '2024-06-04 20:40:51'),
(168, 119, 'tambah', 'menambah subkategori: tes tambah', 0, 2, '2024-06-04 20:43:07'),
(169, 119, 'tambah', 'menambah subkategori: tes tambah', 0, 2, '2024-06-04 20:43:07'),
(170, 120, 'tambah', 'menambah subkategori: tes', 0, 2, '2024-06-04 20:43:26'),
(171, 120, 'tambah', 'menambah subkategori: tes', 0, 2, '2024-06-04 20:43:26'),
(172, 2, 'hapus', 'menghapus subkategori', 0, 2, '2024-06-04 20:44:04'),
(173, 121, 'tambah', 'menambah subkategori: tes tambah2', 0, 2, '2024-06-04 20:44:11'),
(174, 121, 'ubah', 'mengubah subkategori: tes tambah2 menjadi tes tambah2', 0, 2, '2024-06-04 20:46:07'),
(175, 118, 'ubah', 'mengubah kategori: ikon dari \'default.png\' menjadi \'klinik.png\'', 0, 2, '2024-06-04 20:47:44'),
(176, 118, 'ubah', 'mengubah kategori: nama dari \'tes sub\' menjadi \'tes subww\', deskripsi dari \'\' menjadi \'www\', ikon dari \'klinik.png\' menjadi \'gambarartikelanakkecil.png\'', 0, 2, '2024-06-04 20:48:01'),
(178, 121, 'ubah', 'mengubah subkategori: nama dari \'tes tambah2   \' menjadi \'tes tambah3\', ', 0, 2, '2024-06-04 20:58:30'),
(179, 121, 'ubah', 'mengubah subkategori: deskripsi dari \'tambah deskripsi dan gambar\' menjadi \'tambah deskripsi dan gambar  \', ikon dari \'rumah sakit.jpeg\' menjadi \'klinik.png\'', 0, 2, '2024-06-04 20:58:52'),
(180, 121, 'hapus', 'menghapus subkategori: nama \'tes tambah3\', deskripsi \'tambah deskripsi dan gambar  \', ikon \'klinik.png\'', 0, 2, '2024-06-04 21:01:45'),
(181, 119, 'hapus', 'menghapus subkategori: nama \'tes tambah\', deskripsi \'\', ikon \'default.png\'', 0, 2, '2024-06-04 21:01:53'),
(182, 118, 'hapus', 'menghapus kategori: tes subww', 0, 2, '2024-06-04 21:01:57'),
(183, 2, 'Update Profile', 'mengubah informasi profile:', 0, 2, '2024-06-04 21:07:03'),
(184, 2, 'Update Profile', 'mengubah informasi profile: nama dari \'surya\' menjadi \'surili\'', 0, 2, '2024-06-04 21:07:34'),
(185, 2, 'Update Profile', 'mengubah informasi profile: nama dari \'surili\' menjadi \'surya\', email dari \'sur@gmail.com\' menjadi \'surya@gmail.com\'', 0, 2, '2024-06-04 21:07:49'),
(186, 2, 'Update Foto Profile', 'mengubah foto profil dari \'gambarartikelanakkecil.png\' menjadi \'gambarartikellab.png\'', 0, 2, '2024-06-04 21:12:18'),
(187, 2, 'ubah password', 'mengubah password', 0, 2, '2024-06-04 21:15:42'),
(188, 2, 'logout', 'logout oleh ', 0, 2, '2024-06-04 21:20:15'),
(189, 2, 'login', 'login', 0, 2, '2024-06-04 21:20:18'),
(190, 2, 'logout', 'logout', 0, 2, '2024-06-04 21:21:00'),
(191, 1, 'login', 'login', 0, 1, '2024-06-04 21:21:04');

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
(1, '<h3><strong>1. Pendahuluan</strong></h3><p>Kami di goldstep menghargai privasi Anda dan berkomitmen untuk melindungi data pribadi Anda. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat Anda mengunjungi situs web kami.</p><h3><strong>2. Informasi yang Kami Kumpulkan</strong></h3><p>Kami dapat mengumpulkan berbagai jenis informasi dari Anda, termasuk:</p><ul><li><strong>Informasi Pribadi</strong>: Nama, alamat email, nomor telepon, alamat pos, dll.</li><li><strong>Informasi Teknis</strong>: Alamat IP, jenis browser, sistem operasi, informasi perangkat.</li><li><strong>Informasi Penggunaan</strong>: Halaman yang dikunjungi, waktu yang dihabiskan di halaman tersebut, klik, dan aktivitas serupa.</li></ul><h3><strong>3. Bagaimana Kami Menggunakan Informasi Anda</strong></h3><p>Informasi yang kami kumpulkan dapat digunakan untuk:</p><ul><li>Menyediakan, mengoperasikan, dan memelihara situs web kami.</li><li>Meningkatkan, mempersonalisasi, dan memperluas situs web kami.</li><li>Berkomunikasi dengan Anda, termasuk melalui email, tentang pembaruan, promosi, dan layanan lainnya.</li><li>Menganalisis bagaimana pengguna menggunakan situs web kami untuk meningkatkan pengalaman pengguna.</li></ul><h3><strong>4. Bagaimana Kami Melindungi Informasi Anda</strong></h3><p>Kami menggunakan berbagai langkah keamanan teknis dan organisasi untuk melindungi data pribadi Anda dari akses yang tidak sah, penggunaan yang tidak semestinya, atau pengungkapan. Meskipun kami berusaha keras untuk melindungi data pribadi Anda, tidak ada metode transmisi melalui internet atau metode penyimpanan elektronik yang 100% aman.</p><h3><strong>5. Pengungkapan kepada Pihak Ketiga</strong></h3><p>Kami tidak akan menjual, memperdagangkan, atau menyewakan informasi pribadi Anda kepada pihak ketiga tanpa persetujuan Anda, kecuali jika diharuskan oleh hukum atau sebagai bagian dari layanan yang Anda gunakan.</p><h3><strong>6. Cookies</strong></h3><p>Situs web kami menggunakan cookies untuk meningkatkan pengalaman pengguna Anda. Cookies adalah file teks kecil yang disimpan di perangkat Anda. Anda dapat memilih untuk menonaktifkan cookies melalui pengaturan browser Anda, tetapi ini mungkin mempengaruhi fungsi situs web kami.</p><h3><strong>7. Hak Anda</strong></h3><p>Anda memiliki hak untuk:</p><ul><li>Mengakses informasi pribadi yang kami miliki tentang Anda.</li><li>Meminta perbaikan atau penghapusan informasi pribadi Anda.</li><li>Menolak atau membatasi pemrosesan data pribadi Anda.</li><li>Menarik persetujuan Anda kapan saja (jika pemrosesan didasarkan pada persetujuan).</li></ul><h3><strong>8. Perubahan pada Kebijakan Privasi</strong></h3><p>Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diberitahukan dengan memperbarui tanggal di bagian atas kebijakan ini dan/atau melalui pemberitahuan langsung kepada Anda.</p><h3><strong>9. Hubungi Kami</strong></h3><p>Jika Anda memiliki pertanyaan atau kekhawatiran tentang kebijakan privasi ini atau praktik privasi kami, silakan hubungi kami di:</p><ul><li>Email: [Alamat Email Anda]</li><li>Alamat: [Alamat Kantor Anda]</li></ul>');

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
(39, 'klinik', 45, 1),
(42, 'layanan', 64, 2),
(43, 'layanan', 65, 2);

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
(1, '<h2><strong>Syarat dan Ketentuan</strong></h2><h3><strong>1. Pendahuluan</strong></h3><p>Selamat datang di [Nama Perusahaan/Website]! Dengan mengakses atau menggunakan situs web kami yang terletak di [URL Situs Web] (selanjutnya disebut \"Situs\"), Anda menyetujui untuk terikat oleh syarat dan ketentuan berikut (selanjutnya disebut \"Syarat dan Ketentuan\"). Jika Anda tidak setuju dengan bagian manapun dari Syarat dan Ketentuan ini, harap jangan menggunakan Situs kami.</p><h3><strong>2. Penggunaan Situs</strong></h3><ul><li><strong>Kelayakan</strong>: Anda harus berusia minimal [usia minimum] tahun untuk menggunakan Situs ini.</li><li><strong>Akses dan Penggunaan</strong>: Anda setuju untuk menggunakan Situs ini hanya untuk tujuan yang sah dan sesuai dengan Syarat dan Ketentuan ini.</li><li><strong>Larangan Penggunaan</strong>: Anda setuju untuk tidak menggunakan Situs ini untuk tindakan yang melanggar hukum, merusak, atau merugikan pihak ketiga.</li></ul><h3><strong>3. Akun Pengguna</strong></h3><ul><li><strong>Pendaftaran Akun</strong>: Untuk mengakses beberapa fitur Situs, Anda mungkin diminta untuk mendaftar dan membuat akun pengguna.</li><li><strong>Keamanan Akun</strong>: Anda bertanggung jawab atas menjaga kerahasiaan informasi akun Anda, termasuk kata sandi, dan untuk semua aktivitas yang terjadi di bawah akun Anda.</li><li><strong>Kewajiban Akun</strong>: Anda setuju untuk memberikan informasi yang akurat, lengkap, dan terkini saat mendaftar dan menggunakan akun Anda.</li></ul><h3><strong>4. Konten Pengguna</strong></h3><ul><li><strong>Kepemilikan Konten</strong>: Anda mempertahankan kepemilikan atas semua konten yang Anda kirimkan, posting, atau tampilkan di atau melalui Situs.</li><li><strong>Lisensi Konten</strong>: Dengan mengirimkan, memposting, atau menampilkan konten di atau melalui Situs, Anda memberikan lisensi non-eksklusif, bebas royalti, dan dapat dipindahtangankan kepada kami untuk menggunakan, menyalin, memodifikasi, dan menampilkan konten tersebut.</li></ul><h3><strong>5. Kekayaan Intelektual</strong></h3><ul><li><strong>Kepemilikan</strong>: Semua hak cipta, merek dagang, dan hak kekayaan intelektual lainnya dalam dan atas Situs dan kontennya adalah milik kami atau pemberi lisensi kami.</li><li><strong>Penggunaan Terbatas</strong>: Anda tidak diperbolehkan menggunakan konten kami tanpa izin tertulis dari kami.</li></ul><h3><strong>6. Batasan Tanggung Jawab</strong></h3><ul><li><strong>Tidak Ada Jaminan</strong>: Situs ini disediakan \"sebagaimana adanya\" dan \"sebagaimana tersedia\". Kami tidak memberikan jaminan apapun terkait ketersediaan, keakuratan, atau kelengkapan Situs.</li><li><strong>Batasan Kerugian</strong>: Dalam hal apapun, kami tidak bertanggung jawab atas kerugian atau kerusakan tidak langsung, insidental, khusus, atau konsekuensial yang timbul dari penggunaan atau ketidakmampuan menggunakan Situs.</li></ul><h3><strong>7. Perubahan pada Syarat dan Ketentuan</strong></h3><p>Kami berhak untuk memperbarui atau mengubah Syarat dan Ketentuan ini kapan saja tanpa pemberitahuan sebelumnya. Perubahan akan berlaku segera setelah diposting di Situs. Anda disarankan untuk meninjau Syarat dan Ketentuan ini secara berkala.</p><h3><strong>8. Hukum yang Berlaku</strong></h3><p>Syarat dan Ketentuan ini diatur oleh dan ditafsirkan sesuai dengan hukum [Negara/Wilayah Anda]. Setiap sengketa yang timbul dari atau terkait dengan Syarat dan Ketentuan ini akan diselesaikan di pengadilan [Negara/Wilayah Anda].</p><h3><strong>9. Kontak Kami</strong></h3><p>Jika Anda memiliki pertanyaan atau kekhawatiran mengenai Syarat dan Ketentuan ini, silakan hubungi kami di:</p><ul><li>Email:</li><li>Alamat:&nbsp;</li></ul>');

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
(1, 'aditha', 'adit@gmail.com', '$2y$10$OFgQpOnn9agbFLh1bO3tA.JJJqaIu.r1RpPdPKc/ZG5zQq55DMe4a', 'a', 'admin', 'dokter.png'),
(2, 'surya', 'surya@gmail.com', '$2y$10$enTgOgTKWA36H6R085TiMOESmebXkmSdMWrTpaFlbT1fhYVakPWHa', 'a', 'admin', 'gambarartikellab.png'),
(3, '1', '1@gmail.com', '$2y$10$vFu9kblhVMv3gE8jc74SE.zIqEHqul9iwyJizojcxwI6Ce5xjD0ba', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms_and_condition`
--
ALTER TABLE `terms_and_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
