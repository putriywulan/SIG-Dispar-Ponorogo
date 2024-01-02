-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2022 pada 17.04
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`) VALUES
(1, 'Parkir'),
(2, 'MCK'),
(3, 'Penginapan'),
(4, 'Rumah makan'),
(5, 'Tempat ibadah'),
(6, 'Wifi'),
(26, 'Tempat duduk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_wisata`
--

CREATE TABLE `gambar_wisata` (
  `id_gambar_wisata` int(11) NOT NULL,
  `nama_gambar_wisata` varchar(250) NOT NULL,
  `wisata_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_wisata`
--

INSERT INTO `gambar_wisata` (`id_gambar_wisata`, `nama_gambar_wisata`, `wisata_id`) VALUES
(54, '462201627131084NGEBEL_3.jpg', 17),
(55, '263431627131084NGEBEL_4.jpg', 17),
(56, '228611627131084NGEBEL_5.jpg', 17),
(57, '92381627131084NGEBEL_6.jpg', 17),
(58, '680151627131084NGEBEL_7.jpg', 17),
(59, '561561627133421GUNUNG_BERUK_1.jpg', 18),
(60, '812251627133421GUNUNG_BERUK_2.jpg', 18),
(61, '173021627133421GUNUNG_BERUK_3.jpg', 18),
(62, '880701627133948Kolam-Renang-Arcici-Sport-Center.jpg', 23),
(63, '338571627133948maxresdefault_(1).jpg', 23),
(64, '742911627134698NGEMBAG_6.jpg', 24),
(65, '992531627134698NGRAYUN_1.jpg', 24),
(66, '409521627134698NGRAYUN_2.jpg', 24),
(67, '486751627134847ALON_ALON_6.jpg', 25),
(68, '965061627134847ALON_ALON_7.jpg', 25),
(69, '779891627134847ALON_ALON_8.jpg', 25),
(70, '922941627134847ALON_ALON_9.jpg', 25),
(73, '691121627135288KIRAB_PUSAKA_2.jpg', 27),
(74, '379061627135288KIRAB_PUSAKA.JPG', 27),
(75, '26331627135288KIRAP_PUSAKA_3.jpg', 27),
(76, '459561627135288KLONO_1.jpg', 27),
(77, '445571627135459TG_2016_(4).jpg', 28),
(78, '878411627135459TG_2016_(5).jpg', 28),
(79, '394621627135459TG_2016_(6).jpg', 28),
(80, '932241627135619KULINER_2.jpg', 29),
(81, '602711627135619KULINER_3.jpg', 29),
(82, '389491627135818KULINER_7.jpg', 30),
(83, '268461627135818KULINER_9.jpg', 30),
(84, '597741627135818KULINER_13.jpg', 30),
(85, '935291627135818KULINER_14.jpg', 30),
(86, '36161627136527KULINER_5.jpg', 31),
(87, '585041627136527KULINER_8.jpg', 31),
(88, '806131627136527KULINER_10.jpg', 31),
(92, '970911627188619ALON_ALON_4.jpg', 33),
(93, '527961627188619ALON_ALON_5.jpg', 33),
(94, '367111627188619ALON_ALON_6.jpg', 33),
(95, '153391627188619ALON_ALON_7.jpg', 33),
(96, '1092162718886846105306.jpg', 34),
(97, '755321627188868maxresdefault_(1).jpg', 34),
(98, '722901627189356maxresdefault_(1).jpg', 35),
(99, '410091627189356Kolam-Renang-Arcici-Sport-Center.jpg', 35),
(100, '373661627189676AIR_TERJUN_KOKOK.jpg', 36),
(101, '682511627189676AIR_TERJUN_PLETUK_1.JPG', 36),
(102, '697711627189676AIR_TERJUN_PLETUK_2.jpg', 36),
(103, '302201627190181AIR_TERJUN_TOYOMARTO_4.JPG', 37),
(104, '195851627190181AIR_TERJUN_WIDODAREN_1.jpg', 37),
(105, '235011627191707GUNUNG_BERUK_2.jpg', 38),
(106, '563711627191707GUNUNG_BERUK_3.jpg', 38),
(107, '858111627191937NGEMBAG_1.JPG', 39),
(108, '469471627191937NGEMBAG_2.jpg', 39),
(109, '877661627191937NGEMBAG_3.jpg', 39),
(110, '322851627192613GUNUNG_BERUK_2.jpg', 40),
(111, '13351627192613GUNUNG_BERUK_3.jpg', 40),
(112, '969641627192613GUNUNG_MASJID.jpg', 40),
(113, '141491627193443AIR_TERJUN_TOYOMARTO_1.JPG', 41),
(114, '854501627193443AIR_TERJUN_TOYOMARTO_2.JPG', 41),
(115, '217671627193444AIR_TERJUN_TOYOMARTO_3.JPG', 41),
(116, '190041627193444AIR_TERJUN_TOYOMARTO_4.JPG', 41),
(117, '479701627218388LARUNG_3.jpg', 42),
(118, '614851627218388LARUNG_4.jpg', 42),
(119, '658331627218388LARUNG_5.jpg', 42),
(120, '640561627218389LARUNG_6.jpg', 42),
(127, '690781627258074GREBEG_SURO_1.jpg', 44),
(128, '947571627258074GANONG_1.jpg', 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `icon`
--

CREATE TABLE `icon` (
  `id_icon` int(11) NOT NULL,
  `icon` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `icon`
--

INSERT INTO `icon` (`id_icon`, `icon`) VALUES
(8, 'fas fa-users'),
(9, 'fas fa-pencil-alt'),
(10, 'fa fa-star'),
(11, 'fas fa-trash'),
(12, 'fa fa-gift'),
(14, 'fa fa-user-lock'),
(20, 'fa fa-flag'),
(21, 'fas fa-tree'),
(22, 'fas fa-home'),
(23, 'fas fa-store'),
(24, 'fas fa-university'),
(25, 'fas fa-mosque');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_wisata`
--

CREATE TABLE `kategori_wisata` (
  `id_kategori_wisata` int(11) NOT NULL,
  `nama_kategori_wisata` varchar(250) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_wisata`
--

INSERT INTO `kategori_wisata` (`id_kategori_wisata`, `nama_kategori_wisata`, `icon_id`, `users_id`, `deskripsi`) VALUES
(6, 'Wisata Alam', 21, 1, 'ini deskripsi kategori wisata alam'),
(7, 'Wisata Minat', 10, 1, 'ini deskripsi kategori wisata minat\r\n'),
(9, 'Wisata Keluarga', 8, 1, 'ini deskripsi kategori wisata keluarga'),
(15, 'Wisata Budaya', 12, 1, 'Ini deskripsi kategori wisata budaya'),
(16, 'Wisata Kuliner', 20, 1, 'Ini deskripsi kategori wisata kuliner'),
(17, 'Wisata Religi', 25, 1, 'Ini deskripsi kategori Wisata Religi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_aplikasi` varchar(300) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar_konfigurasi` varchar(300) NOT NULL,
  `created_by` varchar(300) NOT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_aplikasi`, `keterangan`, `gambar_konfigurasi`, `created_by`, `facebook`, `instagram`, `youtube`, `email`, `alamat`, `no_hp`) VALUES
(1, 'SIG Wisata', 'SIG atau Sistem informasi geografis adalah ilmu yang mempelajari tata cara pembuatan peta menggunakan komputer dengan langkah-langkah memasukkan data, memproses data, dan menampilkan hasil. Peta digital yang digunakan pada penelitian ini adalah Mapbox. Mapbox merupakan suatu platform peta untuk membuat suatu aplikasi web desktop ataupun mobile agar terintegrasi menggunakan peta. Pemilihan Mapbox dikarenakan  penggunaan API (Access Token) sehingga  lebih dimudahkan, dan data yang diperoleh lebih lengkap, mulai dari jarak, koordinat, nama jalan, dan rute jalan. Penelitian ini bertujuan untuk menghasilkan sistem informasi geografis sebaran wisata di Kabupaten Ponorogo berbasis web dengan menggunakan Mapbox API. Data objek wisata berdasarkan data dari Dinas Kebudayaan Pariwisata Pemuda dan Olahraga Kabupaten Ponorogo. Sistem ini diharapkan dapat mempermudah wisatawan dalam merencanakan perjalanan wisata dengan adanya informasi detail wisata, foto dan vidio pada masing-masing wisata. Selain itu juga memberikan 3 wisata terdekat dari lokasi wisatawan serta fitur rute menuju lokasi. Proses pembuatan dan pengembangan sistem ini menggunakan metode waterfall, yang terdiri dari analisa kebutuhan, desain sistem, penulisan kode program, pengujian , penerapan dan pemeliharaan. ', '649661625377211map.png', 'DisbudParpora', 'DisbudParpora', 'https://www.instagram.com/ponorogo.tourism/', 'https://www.youtube.com/channel/UCGu5NLgGEbI4_qKqb-waLdw/', 'disbudparporaponorogo1@gmail.com', 'Jl. Pramuka No. 19A Ponorogo', '(0352) 486012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `aktifitas` text NOT NULL,
  `diinsert_pada` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log`
--

INSERT INTO `log` (`id_log`, `users_id`, `aktifitas`, `diinsert_pada`) VALUES
(421, 1, 'Menghapus data wisata dengan id = 43', '2021-07-26 02:39:45'),
(422, 1, 'Menghapus data wisata dengan id = 32', '2021-07-26 02:40:16'),
(423, 1, 'Login users', '2022-10-28 14:58:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_profile` varchar(200) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `gambar_profile` varchar(200) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `tanggal_lahir`, `nama_profile`, `jenis_kelamin`, `no_hp`, `alamat`, `gambar_profile`, `users_id`) VALUES
(1, '2021-07-13', 'Putri wulan sari', 'L', '0832947923', 'Ponorogo', 'male.png', 1),
(2, '2021-07-06', 'super admin putri', 'L', '0923879028', 'medan', '997051626027403altumcode-dC6Pb2JdAqs-unsplash.jpg', 2),
(11, '2021-07-19', 'admin121', 'L', '32523532', '2532523532', '548861626886944altumcode-dMUt0X3f59Q-unsplash.jpg', 14),
(12, '1996-08-10', 'yahya', 'L', '081330126274', 'Ngawi', '697031627194219a4.jpg', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `wisata_id`, `email`, `rate`) VALUES
(10, 23, 'putriywulansari@gmail.com', 1),
(11, 17, 'putriywulansari@gmail.com', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `judul`, `deskripsi`, `nama_file`) VALUES
(3, 'Sistem Informasi Geografis  Wisata', 'Di Kabupaten Ponorogo Dengan Menggunakan Mapbox API', '594841627255295REYOG_3.jpg'),
(4, 'Wisata Alam ', 'Temukan Keindahan Wisata Alam Disini', '741921627254491CUMBRI_4.jpg'),
(5, 'Wisata Kuliner', 'Temukan Berbagai Wisata Kuliner Disini', '209851627254544KULINER_3.jpg'),
(8, 'Wisata Budaya', 'Temukan Berbagai Wisata Budaya Disini', '813391627255266LARUNG_3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `message` text NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `message`, `wisata_id`, `first_name`, `last_name`, `email`, `gender`, `image`) VALUES
(34, 'Baik', 8, 'Putriy', 'WulanSari', 'putriywulansari@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AOh14GjEClSMdjooF3M7Nmsyy_0FrNaDl68cx8FEXkZn9w=s96-c'),
(37, 'Baik sekali loh betull', 17, 'Putriy', 'WulanSari', 'putriywulansari@gmail.com', '', 'https://lh3.googleusercontent.com/a-/AOh14GjEClSMdjooF3M7Nmsyy_0FrNaDl68cx8FEXkZn9w=s96-c');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('admin','super admin') NOT NULL,
  `cookie` varchar(200) NOT NULL,
  `forgot` enum('iya','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`, `cookie`, `forgot`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin', '', 'tidak'),
(2, 'superadmin123', 'ac497cfaba23c4184cb03b97e8c51e0a', 'super admin', '', 'tidak'),
(14, 'admin121', '39596dfee3b2b8409147bff7d9a6269b', 'admin', '', 'tidak'),
(15, 'yahya123', '3ab896b5b94e97beb42b6d91294dbd62', 'admin', '', 'iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_wisata` varchar(250) NOT NULL,
  `alamat_wisata` varchar(250) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `vidio` text DEFAULT NULL,
  `fasilitas_id` varchar(200) NOT NULL,
  `buka` time NOT NULL,
  `tutup` time NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `kategori_wisata_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `harga_tiket_masuk` int(11) NOT NULL,
  `kabupaten_id` bigint(20) NOT NULL,
  `kecamatan_id` bigint(20) NOT NULL,
  `kelurahan_id` bigint(20) NOT NULL,
  `hari_buka` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `gambar`, `deskripsi`, `nama_wisata`, `alamat_wisata`, `latitude`, `longitude`, `vidio`, `fasilitas_id`, `buka`, `tutup`, `kontak`, `facebook`, `twitter`, `instagram`, `kategori_wisata_id`, `users_id`, `harga_tiket_masuk`, `kabupaten_id`, `kecamatan_id`, `kelurahan_id`, `hari_buka`) VALUES
(17, '224591627131083NGEBEL_3.jpg', 'elaga Ngebel adalah sebuah danau alami yang terletak di Kecamatan Ngebel, Kabupaten Ponorogo. Kecamatan Ngebel terletak di kaki gunung Wilis. Telaga Ngebel terletak sekitar 30 kilometer dari pusat kota Ponorogo atau yang terkenal dengan nama Kota Reog. Keliling dari Telaga Ngebel sekitar 5 KM.', 'Telaga ngebel', 'Kecamatan Ngebel, Ponorogo', '-7.795406026256815', '111.63183853076985', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/l9XTdA96bAY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,3,4,5', '01:00:00', '01:30:00', '088801673035', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 6, 1, 10000, 3502, 3502200, 3502200001, 'Senin,Rabu'),
(18, '326011627133420GUNUNG_BEDES_2.jpg', 'Wisata Gunung Gajah di Ponorogo merupakan tempat wisata yang harus anda kunjungi karena pesona keindahannya tidak ada duanya. Penduduk lokal daerah Wisata Gunung Gajah di Ponorogo juga sangat ramah tamah terhadap wisatawan lokal maupun wisatawan asing. Kota Ponorogo juga terkenal akan Wisata Gunung Gajah di Ponorogo yang sangat menarik untuk dikunjungi. Gunung Gajah Ponorogo memiliki ketinggian puncak sampai 1200 mdpl. ', 'Gunung gajah', 'Desa Gajah, Kecamatan Sambit Ponorogo', '-8.024135886661929 ', '111.51873498805996', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TVD13wYww8I\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,5', '08:00:00', '12:00:00', '088867544453', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 6, 1, 5000, 3502, 3502040, 3502040001, 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(23, '47985162713394846105306.jpg', 'Merupakan salah satu kolam renang yang berada di Kabupaten Ponorogo. Kolam renang ini sering dimanfaatkan oleh warga Kabupaten Ponorogo untuk olahraga renang dan rekreasi air. Kolam Renang TIRTO JOYO memiliki kolam desain dengan baik, aman, terawat, air jernih serta dilengkapi fasilitas yang lengkap seperti kantin, kamar ganti dan kamar mandi. Kolam renang Kabupaten Ponorogo juga ramah anak, sehingga warga bisa mengajak serta anak untuk berenang. Kolam renang ini terbuka untuk umum dengan harga tiket masuk yang murah dan terjangkau. Segera kunjungi kolam renang terdekat ini untuk renang atau rekreasi air lainnya bersama keluarga.\r\n', 'Kolam Renang Tirtomenggolo', 'Nologaten, Kecamatan Ponorogo, Ponorogo', '-7.863908532794538', '111.48016178324643', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/TkAIBnAMBQU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2,4', '04:00:00', '15:00:00', '088867544453', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 7, 1, 25000, 3502, 3502170, 3502170015, 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(24, '131661627134698NGEMBAG_2.jpg', 'Taman Wengker Keanekaragaman Hayati (Kehati) mencuri perhatian masyarakat dengan hawa yang sejuk dan dipenuhi berbagai macam tumbuhan. Destinasi wisata yang berada di Jalan Ponorogo – Madiun itu berkonsep taman terbuka hijau. Akses yang mudah berada di pinggir jalan nasional membuat taman tersebut ramai oleh pengunjung saban harinya.', 'Taman wengker', 'Jalan Raya Ponorogo-Madiun, Desa Cokromenggalan, Kecamatan Ponorogo, Ponorogo', '-7.829010558326999', '111.48961691023392', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/2jdSx-jhwXM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2,5,6', '01:30:00', '01:30:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 7, 1, 10000, 3502, 3502170, 3502170016, 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(25, '379681627134846ALON_ALON_9.jpg', 'Taman Klonosewandono yang berlokasi di jalan pramuka kabupaten Ponorogo. Tepatnya disamping gedung olahraga kabupaten Ponorogo. Pembenahan fasilitas ini dimaksudkan untuk memenuhi kebutuhan ruang terbuka hijau di tengah perkotaan. Sebelumnya banyak orang yang merasa kesulitan mencari lokasi taman ini. Karena tidak adanya papan nama sebagai identitas taman ini. Selain itu banyak julukan dari taman ini seperti taman pramuka dan taman GOR. Tapi sekarang sudah ada papan nama yang cukup besar sehingga mudah untuk ditemukan.', 'Taman Kelono Sewandono', 'Nologaten, Kecamatan Ponorogo, Ponorogo', '-7.86392477971662 ', '111.47917302557575', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/SnlhZr5Qk8k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2,4,6', '03:00:00', '19:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 9, 1, 0, 3502, 3502170, 3502170015, 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(27, '56011627135287KIRAB_PUSAKA_1.jpg', 'Ini deskripsi wisata Kirab pusaka', 'Kirab pusaka', 'Ponorogo', '-7.87072394467036', '111.49060662451012', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3R7Y22u1cYE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '01:30:00', '02:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 15, 1, 0, 3502, 3502170, 3502170007, 'Selasa,Rabu'),
(28, '611811627135459TG_2016_(2).jpg', 'Ini deskripsi wisata Gelar budaya', 'Gelar budaya', 'Ponorogo', '-7.8535491196561935', '111.43807824316298', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/3R7Y22u1cYE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '01:00:00', '02:00:00', '088867544453', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 15, 1, 10000, 3502, 3502020, 3502020018, 'Senin'),
(29, '224711627135619KULINER_11.jpg', 'ini deskripsi wisata sate', 'SATE AYAM GANG SATE (H.TUKRI SOBIKUN)', 'Ponorogo', '-7.851678551249023', '111.47738869848621', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/iqtlI5ioctE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,4,5', '01:30:00', '23:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 16, 1, 25000, 3502, 3502030, 3502030005, 'Selasa,Sabtu'),
(30, '703631627135818KULINER_14.jpg', 'ini deskripsi wisata pecelll', 'Pecell', 'Ponorogo', '-7.86885345367952', '111.49901803198213', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Eaagmjjw16Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,4', '01:30:00', '04:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 16, 1, 10000, 3502, 3502100, 3502100003, 'Senin,Selasa,Rabu'),
(31, '573011627136527Dawet-Jabung.jpg', 'ini deskripsi dawet', 'Dawet Jabung', 'Ponorogo', '-7.888408169290884', '111.49867470922896', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/xG4qae2uFXs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '4', '02:00:00', '01:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 16, 1, 5000, 3502, 3502100, 3502100012, 'Kamis,Jumat'),
(33, '585571627188619ALON_ALON_3.jpg', 'Deskripsi Taman Sukowati', 'Taman Sukowati', 'Banyudono, Kecamatan Ponorogo, Ponorogo', '-7.853077488980906', '111.47019226023427', 'vidio', '1,6', '01:30:00', '02:00:00', '088801673035', 'https://facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 9, 1, 10000, 3502, 3502170, 3502170014, 'Senin,Selasa,Rabu'),
(34, '3913916271906441147310212261041161091056697.jpg', 'ini deskripsi kategori wisata minat\r\n', 'Kolam Renang Tirtojoyo', 'Mangkujayan, Kecamatan Ponorogo, Ponorogo', '-7.857070753758038', '111.46584148324635', 'video', '1,6', '01:00:00', '01:30:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 7, 1, 10000, 3502, 3502170, 3502170014, 'Senin,Selasa,Rabu'),
(35, '488401627189471Kolam-Renang-Arcici-Sport-Center.jpg', 'ini deskripsi kategori wisata minat\r\n', 'Kolam Renang Nuansa', 'Jalan Sembodro, Wetan Talang, Purbosuman, Kecamatan Ponorogo, Ponorogo', '-7.95669363224733', '111.4318122679061', 'video', '1,6', '01:00:00', '01:30:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 7, 1, 20000, 3502, 3502170, 3502170006, 'Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(36, '584141627189675air-terjun-widodaren-foto-dari-@fajar_wedar-Copy.jpg', 'ini deskripsi kategori wisata alam', 'Air Terjun Selorejo Toyomarto', 'Dukuh Toyomerto, Desa Pupus, Kecamatan Ngebel, Ponorogo', '-7.772833449751341', '111.67391512557465', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/lkEK7QRU__k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '08:30:00', '15:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 6, 1, 20000, 3502, 3502200, 3502200002, 'Selasa,Kamis,Sabtu'),
(37, '382061627190180AIR_TERJUN_PLETUK_2.jpg', 'deskripsi Air Terjun Widodaren', 'Air Terjun Widodaren', 'Desa Talun, Dusun Tritis, Kecamatan Ngebel, Ponorogo', '-7.818717037986726 ', '111.63908159673989', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ZAvWMbBKPXo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '02:00:00', '15:00:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 6, 1, 20000, 3502, 3502200, 3502200004, 'Senin,Selasa'),
(38, '826461627191706GUNUNG_GAJAH_2.jpg', 'Gunung Beruk', 'Gunung Beruk', 'Dusun Tanggungrejo, Desa Karang Patihan, Kecamatan Balong, Ponorogo', '-7.950285057147694 ', '111.35383511023525', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/PqUsbGeQVn0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2', '01:30:00', '10:30:00', '088867544453', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 6, 1, 10000, 3502, 3502110, 3502110005, 'Senin,Selasa,Rabu,Kamis'),
(39, '499181627191937NGEMBAG_5.jpg', 'Sendang Bulus', 'Sendang Bulus', 'Dukuh Glagah Malang, Desa Pager, Kecamatan Bungkal, Ponorogo', '-8.009034383068851 ', '111.4695519409189', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q78KmW1FMiA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2,4', '17:30:00', '19:30:00', '088801673035', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 9, 1, 10000, 3502, 3502030, 3502030007, 'Senin,Selasa,Rabu'),
(40, '240931627192613GUNUNG_GAJAH_4.jpg', 'Sumber Air Panas Pandosan', 'Sumber Air Panas Pandosan', 'Dukuh Pucuk, Desa Wagir Lor, Kecamatan Ngebel, Ponorogo', '-7.816118952232465', '111.6358019347582', 'vidioo', '1,2,3,4,5', '08:30:00', '23:30:00', '088801673035', 'https://web.facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 6, 1, 10000, 3502, 3502200, 3502200003, 'Senin,Selasa,Rabu,Kamis'),
(41, '86361627193443AIR_TERJUN_PLETUK_2.jpg', 'deskripsi', 'Air Terjun Coban Lawe', 'Dusun Ngreco, Desa Kricik, Kecamatan Pudak, Ponorogo', '-7.84607348324343', '111.72167696790474', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/70ca9nA9Bv0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,2,3', '03:30:00', '02:00:00', '088867544453', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 6, 1, 10000, 3502, 3502061, 3502061004, 'Senin,Selasa,Rabu'),
(42, '770611627218387SEMAUR_1.jpg', 'Semaur', 'Semaur', 'ponorogo', '-7.885177465684919', '111.4222003629709', 'vidio', '2,3', '01:00:00', '01:00:00', '0888087677', 'faceboook', 'twitter', 'instagram', 6, 1, 10000, 3502, 3502050, 3502050008, 'Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu'),
(44, '788391627257558OBYOK_2.jpg', 'Deskripsi Pagelaran Reog', 'Pagelaran Reog', 'Ponorogo', '-7.857542094769613', '111.56958709014464', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/UTBWeGT7aAA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1,6', '02:00:00', '01:30:00', '088867544453', 'https://web.facebook.com/', 'https://web.twitter.com/', 'https://web.instagram.com/', 15, 1, 10000, 3502, 3502090, 3502090015, 'Senin,Selasa,Rabu,Minggu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `gambar_wisata`
--
ALTER TABLE `gambar_wisata`
  ADD PRIMARY KEY (`id_gambar_wisata`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id_icon`);

--
-- Indeks untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD PRIMARY KEY (`id_kategori_wisata`),
  ADD KEY `icon_id` (`icon_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `wisata_id` (`wisata_id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indeks untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `kategori_wisata_id` (`kategori_wisata_id`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `gambar_wisata`
--
ALTER TABLE `gambar_wisata`
  MODIFY `id_gambar_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `icon`
--
ALTER TABLE `icon`
  MODIFY `id_icon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  MODIFY `id_kategori_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar_wisata`
--
ALTER TABLE `gambar_wisata`
  ADD CONSTRAINT `gambar_wisata_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori_wisata`
--
ALTER TABLE `kategori_wisata`
  ADD CONSTRAINT `kategori_wisata_ibfk_1` FOREIGN KEY (`icon_id`) REFERENCES `icon` (`id_icon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategori_wisata_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`id_wisata`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wisata`
--
ALTER TABLE `wisata`
  ADD CONSTRAINT `wisata_ibfk_1` FOREIGN KEY (`kategori_wisata_id`) REFERENCES `kategori_wisata` (`id_kategori_wisata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wisata_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
