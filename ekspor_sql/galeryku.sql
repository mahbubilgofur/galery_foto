-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2025 pada 05.43
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeryku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id_album` int(11) NOT NULL,
  `nama_album` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_buat` date NOT NULL,
  `cover` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_album`
--

INSERT INTO `tbl_album` (`id_album`, `nama_album`, `deskripsi`, `tgl_buat`, `cover`) VALUES
(2, 'HEWAN', 'kumpulanpara hewan', '2024-01-31', 'kumpulanhewan.jpeg'),
(5, 'Sponsbob', 'kumpulan spons\r\n', '2024-02-06', 'download_(1).jpeg'),
(6, 'Naruto', 'kumpulan anime naruto', '2024-02-01', 'images_(2).jpeg'),
(7, 'Ultraman', 'kumpulan ultraman keren', '2024-02-01', 'red-ultraman-hero-hd-wallpaper-preview.jpg'),
(12, 'Doraemon', 'kumpulan gambar doraemon ', '2024-02-22', 'Doraemon_Wallpaper_Hd_For_Pc_4k.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tgl_unggah` date NOT NULL,
  `lokasi_file` varchar(255) NOT NULL,
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `judul_foto`, `deskripsi_foto`, `tgl_unggah`, `lokasi_file`, `id_album`, `id_user`) VALUES
(8, 'spongebob', 'upload gambar terbaru apakah ada yang kurang?', '2024-02-01', 'desktop-wallpaper-cute-spongebob-spongebob-squarepants.jpg', 5, 15),
(9, 'spongebob gg', 'llucu', '2024-02-01', 'hd-spongebob-snail-shell-phone-obye46x12jay1by5.jpg', 5, 15),
(10, 'spongebob kren', '.', '2024-02-01', 'wallpaper-hape-spongebob-1-cfef0582a80ae534cc74a72bc649fdaf.jpg', 5, 15),
(11, 'spongebob bgus', '..', '2024-02-01', 'images.jpeg', 5, 15),
(12, 'spon gemoy', '..', '2024-02-01', 'wallpaper-hape-spongebob-3-27a76c9a1d8d5a11d4fff59c29e55ee1.jpg', 5, 15),
(13, 'spongebobb', '..', '2024-02-01', 'download_(1).jpeg', 5, 15),
(14, 'leryy', '...', '2024-02-01', 'wallpaper-hape-spongebob-21-3ea4a658f332f9fd0cb659755078338e.jpg', 5, 15),
(15, 'spongebob bgus', '...', '2024-02-01', 'hipwee-BikiniBottomHD.jpg', 5, 15),
(16, 'spongebob', '...', '2024-02-01', 'images_(1).jpeg', 5, 15),
(22, 'kucing lucu', 'kucing di salju', '2024-02-21', '9GAG_❤️_Memeland_on_X.jpg', 2, 15),
(23, 'pinwin satu', 'pingwin lucu', '2024-02-21', 'download_(4).jpg', 2, 15),
(24, 'singa ', '...', '2024-02-21', 'download_(7).jpg', 2, 15),
(25, 'kucing oren lucu', 'lagi gabut \r\n', '2024-02-21', 'download_(5).jpg', 2, 15),
(26, 'serigala oren', 'serigala satu', '2024-02-21', 'download_(6).jpg', 2, 15),
(27, 'zebra satu', 'zebra wan', '2024-02-21', 'Zebra.jpg', 2, 15),
(28, 'kucing gemoy', '...', '2024-02-21', 'Flufy_Banget,_10_Kucing_Paling_Berbulu_di_Dunia.jpg', 2, 15),
(29, 'kucing pose', '????', '2024-02-21', 'download_(9).jpg', 2, 15),
(30, 'elang satu', 'gaya kiri elang', '2024-02-21', 'Southern_Bald_Eagle.jpg', 2, 15),
(31, 'spon kawan', '????', '2024-02-21', 'Spongebob_hd___Girasol_en_acuarela,_Temas_para_celular_rosa,_Fondos_de_pantallas_cool_de_anime.jpg', 5, 15),
(32, 'spongbob', '????', '2024-02-21', 'dfac59bd-72a4-4126-92c6-9c0816c7cc06.jpg', 5, 15),
(33, 'spon hd', '....\r\n', '2024-02-21', 'Bob_Esponja___Bolo_Do_Bob_Esponja,_Festa_De_Aniversário_Do_23F.jpg', 5, 15),
(34, 'narutO', '...', '2024-02-21', 'Anime.jpg', 6, 21),
(35, 'naruto kren', '...', '2024-02-21', '✰Naruto.jpg', 6, 21),
(36, 'naruTO kerenn', '...', '2024-02-21', '˚⭑·_͟͟͞͞➳_ᴬⁱ_ᴬʳᵗ.jpg', 6, 21),
(37, 'narutoo', '...', '2024-02-21', 'download_(6)1.jpg', 6, 21),
(38, 'naruto', '...', '2024-02-21', 'download_(4)1.jpg', 6, 21),
(39, 'narUto', '...', '2024-02-21', 'Art_by_Kishimoto.jpg', 6, 21),
(40, 'kumpulan', ',,,', '2024-02-21', 'download_(7)1.jpg', 6, 21),
(41, 'k naruto', '...', '2024-02-21', 'download_(5)1.jpg', 6, 21),
(42, 'black', '...', '2024-02-21', 'download_(8).jpg', 6, 21),
(43, 'narutO kren', '...', '2024-02-21', 'Naruto_uzumaki_wallpaper.jpg', 6, 21),
(44, 'rival', '...', '2024-02-21', 'Naruto_Sasuke.jpg', 6, 21),
(45, 'duo rival', '...', '2024-02-21', 'download_(9)1.jpg', 6, 21),
(46, 'kumpulan naruto', '...', '2024-02-21', 'download_(11).jpg', 6, 21),
(47, 'r naruto', '...', '2024-02-21', 'download_(18).jpg', 6, 21),
(48, 'rival blue', '...', '2024-02-21', 'download_(10).jpg', 6, 21),
(49, 'duo g end', ',,,', '2024-02-21', 'download_(12).jpg', 6, 21),
(50, 'groub', '.....\r\n', '2024-02-21', 'download_(14).jpg', 6, 21),
(51, 'kumpulan narutO', '......', '2024-02-21', 'download_(13).jpg', 6, 21),
(52, 'k groub', '..', '2024-02-21', 'download_(15).jpg', 6, 21),
(53, 'duo anak', '....', '2024-02-21', 'download_(17).jpg', 6, 21),
(54, 'doraemOn', '....', '2024-02-22', 'download_(5)2.jpg', 12, 13),
(55, 'doraemon blackk', 'gambar doraemon dan nobita', '2024-02-25', 'Doraemon_Wallpaper_Background_HD.jpg', 12, 13),
(56, 'doraemon one', '...', '2024-02-22', 'Doraemon_New_Full_HD_Wallpaper.jpg', 12, 13),
(57, 'kumpulan doraemon', '...', '2024-02-22', 'download_(4)2.jpg', 12, 13),
(58, 'doraemoN', '....', '2024-02-22', 'download_(8)1.jpg', 12, 13),
(59, 'doraemon eat', '....', '2024-02-22', 'download_(7)2.jpg', 12, 13),
(60, 'Doraemon', '....', '2024-02-22', 'Lunch_time__.jpg', 12, 13),
(61, 'duo', '...', '2024-02-22', '4f61d2b1-7605-42f2-bf93-80a7ddec570c.jpg', 7, 13),
(62, 'one black', '....', '2024-02-22', 'download_(4)3.jpg', 7, 13),
(63, 'blue one', '...', '2024-02-22', '746baa90-5f05-41e0-b0f8-19790f68a93b.jpg', 7, 13),
(64, 'one black', '...', '2024-02-22', 'download_(5)3.jpg', 7, 13),
(65, 'duo red', '....', '2024-02-22', 'download_(6)2.jpg', 7, 13),
(66, 'one 1', '....', '2024-02-22', 'download_(8)2.jpg', 7, 13),
(67, 'duo keren', '....', '2024-02-22', 'download_(7)3.jpg', 7, 13),
(68, 'duo gg', '...', '2024-02-22', 'download_(9)2.jpg', 7, 13),
(69, 'kumpulan kren', '...', '2024-02-22', 'ultraman-cool-hd-family.jpg', 7, 13),
(70, 'solo', '...', '2024-02-22', 'ULTRAMAN_MAX_-_ULTRA_GALAXY_FIGHT__THE_ABSOLUTE_CONSPIRACY.jpg', 7, 13),
(71, 'kumpulan 5', '...', '2024-02-22', 'ultraman_zero.jpg', 7, 13),
(72, '3 keren', '...', '2024-02-22', 'Ultraman.jpg', 7, 13),
(74, 'naruto keren ', 'gambar naruto', '2024-02-25', 'download_(5)4.jpg', 6, 13),
(75, 'hokage 4', 'hokage keren  ', '2024-02-25', 'download_(6)3.jpg', 6, 13),
(77, 'desain hewan ', 'gambar desain ', '2024-02-26', 'Wallpaper_Design1.jpg', 2, 15),
(78, 'hewan lucu pinguin', '...', '2024-02-26', 'Penguin_Facts__Species_Habitat.jpg', 2, 13),
(79, 'gambar panda lucu ', 'penda ', '2024-02-26', 'download_(8)3.jpg', 2, 13),
(80, 'jerapah solo ', '...', '2024-02-26', 'download_(7)4.jpg', 2, 13),
(81, 'gajah solo ', 'gajah keren hd', '2024-02-26', 'fantasyanddreamsworld.jpg', 2, 13),
(82, 'serigala biru', 'serigala blue hd', '2024-02-26', '500+_Hình_nền_điện_thoại_Full_HD_4K,_chất_nhất_quả_đất_2024.jpg', 2, 13),
(84, 'tupai lucu ', 'tupai lucu makan', '2024-02-26', 'Sweet_Squirrel.jpg', 2, 13),
(85, 'hewan hd', '..', '2024-02-26', 'download_(9)3.jpg', 2, 21),
(86, 'img spongebob ', 'kumpulan foto', '2024-02-26', 'download_(10)1.jpg', 5, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komen` int(11) NOT NULL COMMENT '\r\n',
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komen`, `id_foto`, `id_user`, `isi_komentar`, `tgl_komentar`) VALUES
(3, 5, 13, 'keren', '2024-02-21'),
(4, 5, 13, 'bagus', '2024-02-21'),
(5, 9, 13, 'p', '2024-02-21'),
(24, 8, 15, 'halo', '2024-02-04'),
(25, 8, 13, 'p', '2024-02-04'),
(27, 8, 13, 'p', '2024-02-04'),
(33, 7, 13, 'p', '2024-02-07'),
(37, 9, 13, 'pp', '2024-02-12'),
(39, 5, 13, 'p', '2024-02-13'),
(48, 8, 13, 'p', '2024-02-13'),
(49, 8, 13, 'p', '2024-02-13'),
(50, 8, 13, 'pp', '2024-02-13'),
(52, 18, 16, 'lucu ', '2024-02-14'),
(55, 15, 13, 'tes', '2024-02-17'),
(56, 9, 13, 'p', '2024-02-19'),
(57, 9, 13, 'p', '2024-02-19'),
(58, 10, 13, 'p', '2024-02-19'),
(59, 10, 13, 'pp', '2024-02-19'),
(60, 18, 13, 'gg', '2024-02-21'),
(61, 34, 13, 'keren', '2024-02-22'),
(62, 22, 13, 'ppp', '2024-02-22'),
(66, 54, 13, 'p', '2024-02-22'),
(69, 22, 13, 'lucu kucing nya', '2024-02-25'),
(70, 64, 13, 'keren', '2024-02-25'),
(71, 36, 13, 'tes', '2024-02-25'),
(73, 9, 21, 'halo', '2024-02-26'),
(74, 25, 21, 'kucing oren', '2024-02-26'),
(76, 23, 13, 'pingwin lucu', '2024-02-26'),
(77, 36, 13, 'tes', '2024-02-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_like`
--

CREATE TABLE `tbl_like` (
  `id_like` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_like` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_like`
--

INSERT INTO `tbl_like` (`id_like`, `id_foto`, `id_user`, `tgl_like`) VALUES
(51, 5, 13, '2024-02-21'),
(54, 5, 7, '2024-01-31'),
(55, 5, 13, '2024-02-21'),
(62, 5, 13, '2024-02-21'),
(63, 9, 12, '2024-02-01'),
(67, 5, 15, '2024-02-03'),
(92, 8, 15, '2024-02-07'),
(96, 13, 13, '2024-02-07'),
(147, 7, 13, '2024-02-13'),
(152, 18, 16, '2024-02-14'),
(153, 14, 13, '2024-02-15'),
(159, 12, 13, '2024-02-15'),
(162, 11, 13, '2024-02-15'),
(163, 15, 13, '2024-02-17'),
(165, 8, 13, '2024-02-18'),
(166, 10, 13, '2024-02-19'),
(167, 18, 13, '2024-02-21'),
(173, 40, 13, '2024-02-22'),
(175, 35, 21, '2024-02-22'),
(176, 34, 21, '2024-02-22'),
(177, 36, 21, '2024-02-22'),
(178, 37, 21, '2024-02-22'),
(179, 40, 21, '2024-02-22'),
(180, 39, 21, '2024-02-22'),
(181, 48, 21, '2024-02-22'),
(183, 22, 21, '2024-02-22'),
(187, 70, 13, '2024-02-22'),
(188, 69, 13, '2024-02-22'),
(190, 67, 13, '2024-02-22'),
(192, 61, 21, '2024-02-22'),
(193, 62, 21, '2024-02-22'),
(194, 63, 21, '2024-02-22'),
(195, 64, 21, '2024-02-22'),
(196, 65, 21, '2024-02-22'),
(197, 67, 21, '2024-02-22'),
(198, 68, 21, '2024-02-22'),
(199, 70, 21, '2024-02-22'),
(200, 69, 21, '2024-02-22'),
(201, 72, 21, '2024-02-22'),
(202, 34, 15, '2024-02-22'),
(203, 36, 15, '2024-02-22'),
(204, 38, 15, '2024-02-22'),
(205, 42, 15, '2024-02-22'),
(206, 43, 15, '2024-02-22'),
(207, 49, 15, '2024-02-22'),
(208, 63, 15, '2024-02-22'),
(209, 62, 15, '2024-02-22'),
(210, 64, 15, '2024-02-22'),
(211, 68, 15, '2024-02-22'),
(212, 65, 15, '2024-02-22'),
(213, 66, 15, '2024-02-22'),
(214, 71, 15, '2024-02-22'),
(215, 72, 15, '2024-02-22'),
(216, 22, 15, '2024-02-22'),
(217, 23, 15, '2024-02-22'),
(218, 24, 15, '2024-02-22'),
(219, 25, 15, '2024-02-22'),
(221, 28, 15, '2024-02-22'),
(222, 27, 15, '2024-02-22'),
(223, 26, 15, '2024-02-22'),
(225, 54, 15, '2024-02-22'),
(226, 55, 15, '2024-02-22'),
(227, 56, 15, '2024-02-22'),
(228, 57, 15, '2024-02-22'),
(229, 60, 15, '2024-02-22'),
(230, 59, 15, '2024-02-22'),
(231, 58, 15, '2024-02-22'),
(234, 35, 13, '2024-02-22'),
(235, 43, 13, '2024-02-22'),
(236, 44, 13, '2024-02-22'),
(237, 47, 13, '2024-02-22'),
(238, 33, 13, '2024-02-22'),
(252, 56, 13, '2024-02-22'),
(254, 55, 13, '2024-02-22'),
(256, 61, 13, '2024-02-22'),
(259, 22, 13, '2024-02-22'),
(306, 68, 13, '2024-02-23'),
(310, 63, 13, '2024-02-25'),
(313, 62, 13, '2024-02-25'),
(314, 64, 13, '2024-02-25'),
(317, 54, 13, '2024-02-25'),
(318, 73, 13, '2024-02-25'),
(319, 74, 13, '2024-02-25'),
(320, 27, 13, '2024-02-25'),
(322, 75, 13, '2024-02-25'),
(326, 46, 13, '2024-02-25'),
(328, 36, 13, '2024-02-25'),
(329, 53, 13, '2024-02-25'),
(334, 47, 21, '2024-02-25'),
(335, 9, 13, '2024-02-26'),
(337, 61, 15, '2024-02-26'),
(338, 29, 15, '2024-02-26'),
(339, 84, 13, '2024-02-26'),
(340, 82, 13, '2024-02-26'),
(341, 81, 13, '2024-02-26'),
(342, 80, 13, '2024-02-26'),
(344, 23, 21, '2024-02-26'),
(345, 25, 21, '2024-02-26'),
(346, 28, 21, '2024-02-26'),
(347, 32, 21, '2024-02-26'),
(348, 86, 21, '2024-02-26'),
(349, 16, 21, '2024-02-26'),
(350, 31, 21, '2024-02-26'),
(351, 54, 21, '2024-02-26'),
(352, 59, 21, '2024-02-26'),
(353, 56, 21, '2024-02-26'),
(354, 57, 21, '2024-02-26'),
(356, 29, 21, '2024-02-26'),
(358, 25, 13, '2024-02-27'),
(359, 25, 13, '2024-02-27'),
(360, 25, 13, '2024-02-27'),
(361, 25, 13, '2024-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_aktivitas`
--

CREATE TABLE `tbl_riwayat_aktivitas` (
  `id_aksi` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_like` int(11) NOT NULL,
  `id_komen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_riwayat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riwayat_aktivitas`
--

INSERT INTO `tbl_riwayat_aktivitas` (`id_aksi`, `id_foto`, `id_like`, `id_komen`, `id_user`, `tgl_riwayat`) VALUES
(2, 14, 67, 3, 16, '2024-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `role_id`, `profil`) VALUES
(5, 'admin', '111', 'admin@gmail.com', 'admin', 'malang', 1, 'user1.jpg'),
(13, 'mahbubilgofur', '123', 'mahbubilgofur@gmail.com', 'MOHAMMAD MAHBUBIL GOFUR', 'gambirono', 2, 'desktop-wallpaper-cute-spongebob-spongebob-squarepants.jpg'),
(15, 'panji', 'ppp', 'panji@gmail.com', 'p', 'p', 2, '4e281e6e3f474decac496f1ea1b4900f1.jpg'),
(16, 'b', 'bbb', 'b@gmail.com', 'b', 'b', 2, 'bdg2.jpg'),
(17, 'h', 'hhh', 'h@gmail.com', 'h', 'h', 2, '17_20240215.jpg'),
(20, '11111', '111', '11@gmail.com', '1', '1', 2, '20_20240221.jpg'),
(21, 'rahmad', 'rahmad', 'rahmad@gmail.com', 'rahmad arysi', 'surabaya', 2, 'Doraemon_New_Full_HD_Wallpaper.jpg'),
(23, 'bubil12', '1010', 'pop12@gmail.com', 'popmie', 'jlcvbnm', 2, '@Bruhh_soul.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_view`
--

CREATE TABLE `tbl_view` (
  `id_view` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_lihat_view` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_view`
--

INSERT INTO `tbl_view` (`id_view`, `id_foto`, `id_user`, `tgl_lihat_view`) VALUES
(1, 9, 13, '0000-00-00'),
(2, 10, 13, '0000-00-00'),
(3, 8, 13, '0000-00-00'),
(4, 11, 13, '0000-00-00'),
(5, 8, 15, '0000-00-00'),
(6, 14, 15, '0000-00-00'),
(7, 13, 15, '0000-00-00'),
(8, 13, 13, '0000-00-00'),
(9, 12, 13, '0000-00-00'),
(10, 15, 13, '0000-00-00'),
(11, 7, 13, '0000-00-00'),
(12, 5, 13, '0000-00-00'),
(13, 18, 13, '0000-00-00'),
(14, 14, 13, '0000-00-00'),
(15, 16, 13, '0000-00-00'),
(16, 5, 15, '0000-00-00'),
(17, 7, 15, '0000-00-00'),
(18, 18, 15, '0000-00-00'),
(19, 5, 16, '0000-00-00'),
(20, 7, 16, '0000-00-00'),
(21, 18, 16, '0000-00-00'),
(22, 21, 13, '0000-00-00'),
(23, 22, 15, '0000-00-00'),
(24, 23, 15, '0000-00-00'),
(25, 24, 15, '0000-00-00'),
(26, 25, 15, '0000-00-00'),
(27, 26, 15, '0000-00-00'),
(28, 27, 15, '0000-00-00'),
(29, 28, 15, '0000-00-00'),
(30, 29, 15, '0000-00-00'),
(31, 30, 15, '0000-00-00'),
(32, 9, 15, '0000-00-00'),
(33, 10, 15, '0000-00-00'),
(34, 11, 15, '0000-00-00'),
(35, 12, 15, '0000-00-00'),
(36, 15, 15, '0000-00-00'),
(37, 16, 15, '0000-00-00'),
(38, 31, 15, '0000-00-00'),
(39, 34, 21, '0000-00-00'),
(40, 5, 21, '0000-00-00'),
(41, 7, 21, '0000-00-00'),
(42, 18, 21, '0000-00-00'),
(43, 22, 21, '0000-00-00'),
(44, 23, 21, '0000-00-00'),
(45, 24, 21, '0000-00-00'),
(46, 25, 21, '0000-00-00'),
(47, 26, 21, '0000-00-00'),
(48, 27, 21, '0000-00-00'),
(49, 28, 21, '0000-00-00'),
(50, 29, 21, '0000-00-00'),
(51, 30, 21, '0000-00-00'),
(52, 36, 21, '0000-00-00'),
(53, 37, 21, '0000-00-00'),
(54, 22, 13, '0000-00-00'),
(55, 23, 13, '0000-00-00'),
(56, 24, 13, '0000-00-00'),
(57, 25, 13, '0000-00-00'),
(58, 26, 13, '0000-00-00'),
(59, 27, 13, '0000-00-00'),
(60, 28, 13, '0000-00-00'),
(61, 29, 13, '0000-00-00'),
(62, 30, 13, '0000-00-00'),
(63, 36, 13, '0000-00-00'),
(64, 37, 13, '0000-00-00'),
(65, 38, 13, '0000-00-00'),
(66, 39, 13, '0000-00-00'),
(67, 41, 13, '0000-00-00'),
(68, 44, 13, '0000-00-00'),
(69, 48, 13, '0000-00-00'),
(70, 53, 13, '0000-00-00'),
(71, 34, 13, '0000-00-00'),
(72, 35, 13, '0000-00-00'),
(73, 40, 13, '0000-00-00'),
(74, 42, 13, '0000-00-00'),
(75, 43, 13, '0000-00-00'),
(76, 45, 13, '0000-00-00'),
(77, 46, 13, '0000-00-00'),
(78, 47, 13, '0000-00-00'),
(79, 49, 13, '0000-00-00'),
(80, 50, 13, '0000-00-00'),
(81, 51, 13, '0000-00-00'),
(82, 52, 13, '0000-00-00'),
(83, 35, 21, '0000-00-00'),
(84, 38, 21, '0000-00-00'),
(85, 39, 21, '0000-00-00'),
(86, 40, 21, '0000-00-00'),
(87, 41, 21, '0000-00-00'),
(88, 42, 21, '0000-00-00'),
(89, 43, 21, '0000-00-00'),
(90, 44, 21, '0000-00-00'),
(91, 45, 21, '0000-00-00'),
(92, 46, 21, '0000-00-00'),
(93, 47, 21, '0000-00-00'),
(94, 48, 21, '0000-00-00'),
(95, 49, 21, '0000-00-00'),
(96, 50, 21, '0000-00-00'),
(97, 51, 21, '0000-00-00'),
(98, 52, 21, '0000-00-00'),
(99, 53, 21, '0000-00-00'),
(100, 8, 21, '0000-00-00'),
(101, 9, 21, '0000-00-00'),
(102, 10, 21, '0000-00-00'),
(103, 11, 21, '0000-00-00'),
(104, 12, 21, '0000-00-00'),
(105, 13, 21, '0000-00-00'),
(106, 14, 21, '0000-00-00'),
(107, 15, 21, '0000-00-00'),
(108, 16, 21, '0000-00-00'),
(109, 31, 21, '0000-00-00'),
(110, 32, 21, '0000-00-00'),
(111, 33, 21, '0000-00-00'),
(112, 54, 13, '0000-00-00'),
(113, 55, 13, '0000-00-00'),
(114, 56, 13, '0000-00-00'),
(115, 57, 13, '0000-00-00'),
(116, 58, 13, '0000-00-00'),
(117, 59, 13, '0000-00-00'),
(118, 60, 13, '0000-00-00'),
(119, 61, 13, '0000-00-00'),
(120, 62, 13, '0000-00-00'),
(121, 63, 13, '0000-00-00'),
(122, 64, 13, '0000-00-00'),
(123, 65, 13, '0000-00-00'),
(124, 66, 13, '0000-00-00'),
(125, 67, 13, '0000-00-00'),
(126, 68, 13, '0000-00-00'),
(127, 69, 13, '0000-00-00'),
(128, 70, 13, '0000-00-00'),
(129, 71, 13, '0000-00-00'),
(130, 72, 13, '0000-00-00'),
(131, 61, 21, '0000-00-00'),
(132, 62, 21, '0000-00-00'),
(133, 63, 21, '0000-00-00'),
(134, 64, 21, '0000-00-00'),
(135, 65, 21, '0000-00-00'),
(136, 66, 21, '0000-00-00'),
(137, 67, 21, '0000-00-00'),
(138, 68, 21, '0000-00-00'),
(139, 69, 21, '0000-00-00'),
(140, 70, 21, '0000-00-00'),
(141, 71, 21, '0000-00-00'),
(142, 72, 21, '0000-00-00'),
(143, 34, 15, '0000-00-00'),
(144, 35, 15, '0000-00-00'),
(145, 36, 15, '0000-00-00'),
(146, 37, 15, '0000-00-00'),
(147, 38, 15, '0000-00-00'),
(148, 39, 15, '0000-00-00'),
(149, 40, 15, '0000-00-00'),
(150, 41, 15, '0000-00-00'),
(151, 42, 15, '0000-00-00'),
(152, 43, 15, '0000-00-00'),
(153, 44, 15, '0000-00-00'),
(154, 45, 15, '0000-00-00'),
(155, 46, 15, '0000-00-00'),
(156, 47, 15, '0000-00-00'),
(157, 48, 15, '0000-00-00'),
(158, 49, 15, '0000-00-00'),
(159, 50, 15, '0000-00-00'),
(160, 51, 15, '0000-00-00'),
(161, 52, 15, '0000-00-00'),
(162, 53, 15, '0000-00-00'),
(163, 61, 15, '0000-00-00'),
(164, 62, 15, '0000-00-00'),
(165, 63, 15, '0000-00-00'),
(166, 64, 15, '0000-00-00'),
(167, 65, 15, '0000-00-00'),
(168, 66, 15, '0000-00-00'),
(169, 67, 15, '0000-00-00'),
(170, 68, 15, '0000-00-00'),
(171, 69, 15, '0000-00-00'),
(172, 70, 15, '0000-00-00'),
(173, 71, 15, '0000-00-00'),
(174, 72, 15, '0000-00-00'),
(175, 54, 15, '0000-00-00'),
(176, 55, 15, '0000-00-00'),
(177, 56, 15, '0000-00-00'),
(178, 57, 15, '0000-00-00'),
(179, 58, 15, '0000-00-00'),
(180, 59, 15, '0000-00-00'),
(181, 60, 15, '0000-00-00'),
(182, 31, 13, '0000-00-00'),
(183, 32, 13, '0000-00-00'),
(184, 33, 13, '0000-00-00'),
(185, 0, 13, '0000-00-00'),
(186, 73, 13, '0000-00-00'),
(187, 74, 13, '0000-00-00'),
(188, 75, 13, '0000-00-00'),
(189, 54, 21, '0000-00-00'),
(190, 55, 21, '0000-00-00'),
(191, 56, 21, '0000-00-00'),
(192, 57, 21, '0000-00-00'),
(193, 58, 21, '0000-00-00'),
(194, 59, 21, '0000-00-00'),
(195, 60, 21, '0000-00-00'),
(196, 9, 22, '0000-00-00'),
(197, 76, 15, '0000-00-00'),
(198, 32, 15, '0000-00-00'),
(199, 33, 15, '0000-00-00'),
(200, 74, 15, '0000-00-00'),
(201, 75, 15, '0000-00-00'),
(202, 77, 15, '0000-00-00'),
(203, 77, 13, '0000-00-00'),
(204, 78, 13, '0000-00-00'),
(205, 79, 13, '0000-00-00'),
(206, 80, 13, '0000-00-00'),
(207, 81, 13, '0000-00-00'),
(208, 82, 13, '0000-00-00'),
(209, 83, 13, '0000-00-00'),
(210, 84, 13, '0000-00-00'),
(211, 77, 21, '0000-00-00'),
(212, 78, 21, '0000-00-00'),
(213, 79, 21, '0000-00-00'),
(214, 80, 21, '0000-00-00'),
(215, 81, 21, '0000-00-00'),
(216, 82, 21, '0000-00-00'),
(217, 84, 21, '0000-00-00'),
(218, 86, 21, '0000-00-00'),
(219, 74, 21, '0000-00-00'),
(220, 75, 21, '0000-00-00'),
(221, 86, 13, '0000-00-00'),
(222, 85, 13, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indeks untuk tabel `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`id_like`);

--
-- Indeks untuk tabel `tbl_riwayat_aktivitas`
--
ALTER TABLE `tbl_riwayat_aktivitas`
  ADD PRIMARY KEY (`id_aksi`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_view`
--
ALTER TABLE `tbl_view`
  ADD PRIMARY KEY (`id_view`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT COMMENT '\r\n', AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_aktivitas`
--
ALTER TABLE `tbl_riwayat_aktivitas`
  MODIFY `id_aksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_view`
--
ALTER TABLE `tbl_view`
  MODIFY `id_view` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
