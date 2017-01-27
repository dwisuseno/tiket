-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jan 2017 pada 05.10
-- Versi Server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_event` varchar(255) DEFAULT NULL,
  `tgl_event` date DEFAULT NULL,
  `waktu_event` time DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `deskripsi` longtext,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `path_gambar` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `nama_event`, `tgl_event`, `waktu_event`, `alamat`, `deskripsi`, `jumlah_tiket`, `path_gambar`, `created_at`, `updated_at`) VALUES
(1, 'Konser Musik Jamaika', '2016-09-30', '19:15:15', 'Jalan Diponegoro', 'Acara ini sangat bagus dan penting', 173, 'uploads/foto/Konser Musik Jamaika.jpg', '2016-09-03 19:21:22', '2016-12-02 09:55:26'),
(2, 'Konser Musik Jepang', '2016-09-30', '09:30:30', 'Jalan Ahmad Yani Surabaya', 'Tempat berada di tempat', 93, 'uploads/foto/Konser Musik Jepang.jpg', '2016-09-03 19:28:15', '2016-12-02 09:58:03'),
(3, 'Konser Tunggal Reva Yoga', '2016-10-31', '00:30:45', 'Jalan Teknik Informatika', 'dwadwa', 121, 'uploads/foto/Konser Tunggal Reva Yoga.jpg', '2016-09-04 00:03:28', '2016-12-02 10:08:44'),
(4, 'Konser Musik Tunggal Rizkifika', '2016-09-17', '12:45:30', 'Jalan Tenik Kimia', NULL, 178, 'uploads/foto/Konser Musik Tunggal Rizkifika.jpg', '2016-09-04 12:22:38', '2016-11-07 21:53:23'),
(5, 'Bazaar Musik', '2016-09-30', '19:15:15', 'Jalan Orchid ', NULL, 899, 'uploads/foto/Bazaar Musik.jpg', '2016-09-04 19:42:57', '2016-09-13 23:20:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_tiket`
--

CREATE TABLE IF NOT EXISTS `jenis_tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tiket` int(11) DEFAULT NULL,
  `kode_jenis` varchar(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tiket` (`id_tiket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `jenis_tiket`
--

INSERT INTO `jenis_tiket` (`id`, `id_tiket`, `kode_jenis`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, NULL, 'VVIP', 'Very Very Important Person', 250000, '2016-09-04 16:17:00', '2016-09-04 16:17:00'),
(2, NULL, 'VIP', 'Very Important Person', 200000, '2016-09-04 16:40:04', '2016-09-04 16:40:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`) VALUES
(1, 'mursit', 'bismillah', 'mursit-12345', 'mumu2937412912zzzz', 'Admin'),
(2, 'admin', 'admin', 'admin999', 'dwlkopdwa', 'Admin'),
(3, 'yunan', 'user', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1472987152),
('m140506_102106_rbac_init', 1472987155),
('m140602_111327_create_menu_table', 1472988234),
('m160312_050000_create_user', 1472988234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `kode_pembayaran` varchar(255) DEFAULT NULL,
  `kode_tiket` varchar(255) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id`, `event_id`, `kode_pembayaran`, `kode_tiket`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'Hm1nB', NULL, '0', '2016-09-22 01:38:06', '2016-09-22 01:38:06'),
(6, 4, '28iSA', NULL, '0', '2016-09-22 02:22:29', '2016-09-22 02:22:29'),
(10, 4, '3o6Og', NULL, '0', '2016-10-18 00:45:52', '2016-10-18 00:45:52'),
(13, 4, 'nCwzi', NULL, '0', '2016-11-07 17:33:14', '2016-11-07 17:33:14'),
(14, 4, 'L2j_0', NULL, '0', '2016-11-07 17:33:23', '2016-11-07 17:33:23'),
(19, 4, 'ZTAtf', NULL, '0', '2016-11-07 17:55:33', '2016-11-07 17:55:33'),
(26, 1, 'ZuaUt', NULL, '0', '2016-11-07 21:53:11', '2016-11-07 21:53:11'),
(27, 1, '9Y5Ug', NULL, '0', '2016-11-07 21:53:19', '2016-11-07 21:53:19'),
(28, 4, 'Pw8wh', NULL, '0', '2016-11-07 21:53:24', '2016-11-07 21:53:24'),
(31, 1, '0MSS9', NULL, '0', '2016-12-02 09:55:27', '2016-12-02 09:55:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`) VALUES
(1, 'mursit', '', '', NULL, '', 10, NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  ADD CONSTRAINT `jenis_tiket_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
