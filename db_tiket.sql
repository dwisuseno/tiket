-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 08:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `count_home` int(11) NOT NULL DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `count_home`, `created_at`, `updated_at`) VALUES
(1, 526, NULL, '2017-12-22 02:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(255) DEFAULT NULL,
  `tgl_event` date DEFAULT NULL,
  `waktu_event` time DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `deskripsi` longtext,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `path_gambar` varchar(255) DEFAULT NULL,
  `harga_ps` int(11) DEFAULT NULL,
  `harga_ots` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `tiket_terjual` int(11) DEFAULT '0',
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL,
  `gambar6` varchar(255) DEFAULT NULL,
  `gambar7` varchar(255) DEFAULT NULL,
  `gambar8` varchar(255) DEFAULT NULL,
  `gambar9` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `tgl_event`, `waktu_event`, `alamat`, `deskripsi`, `jumlah_tiket`, `path_gambar`, `harga_ps`, `harga_ots`, `count`, `tiket_terjual`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`, `gambar9`, `created_at`, `updated_at`) VALUES
(1, 'Surya Professional Mild Tour', '2020-12-05', '20:00:00', 'Lapangan Kodam V Brawijaya, Surabaya, Jawa Timur', 'Konser Musik Surya Professional Mild Tour menghadirkan grup band Indonesia antara lain: NOAH, DEWA 19, NIDJI, dan juga grup band internasional yaitu COLDPLAY', 931, 'uploads/foto/Surya Professional Mild Tour_1.jpg', 300000, 500000, 18, 69, 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_1.png', 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_2.png', 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_3.jpg', '', '', '', NULL, NULL, NULL, '2017-12-20 14:59:12', '2017-12-22 02:01:00'),
(2, 'Konser Musik Pro Mild Jam On The Road', '2021-02-06', '21:00:00', 'Jl. Soekarno Hatta, Jatimulyo, Malang (Depan Kampus Politeknik Negeri Malang)', 'Konser Musik Pro Mild On The Road merupakan konser musik yang disediakan setiap bulan keliling kota di Indonesia.', 1935, 'uploads/foto/Konser Musik Pro Mild On The Road_2.png', 150000, 300000, 13, 65, 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_1.png', 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_2.jpg', 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-20 15:31:35', '2017-12-22 01:39:31'),
(3, 'Line Concert 2017', '2017-09-08', '20:00:00', 'Grand City Hall, Surabaya', 'Line Concert 2017 menghadirkan TULUS, ISYANA SARAWATI, GLENN FREDLY, SHEILA ON 7', 5000, 'uploads/foto/Line Concert 2017_3.jpg', 200000, 300000, 0, 0, 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_1.jpg', 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_2.jpg', 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_3.jpg', 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_4.jpeg', 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_5.jpg', 'uploads/event/Line Concert 2017_3/Line Concert 2017_3_6.jpg', NULL, NULL, NULL, '2017-12-20 15:52:32', '2017-12-20 15:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tiket`
--

CREATE TABLE `jenis_tiket` (
  `id` int(11) NOT NULL,
  `id_tiket` int(11) DEFAULT NULL,
  `kode_jenis` varchar(10) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_tiket`
--

INSERT INTO `jenis_tiket` (`id`, `id_tiket`, `kode_jenis`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(1, NULL, 'VVIP', 'Very Very Important Person', 250000, '2016-09-04 16:17:00', '2016-09-04 16:17:00'),
(2, NULL, 'VIP', 'Very Important Person', 200000, '2016-09-04 16:40:04', '2016-09-04 16:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `likert`
--

CREATE TABLE `likert` (
  `id` int(11) NOT NULL,
  `kelas_a` int(11) NOT NULL,
  `kelas_b` int(11) NOT NULL,
  `kelas_c` int(11) NOT NULL,
  `kelas_d` int(11) NOT NULL,
  `kelas_e` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `hasil` double NOT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likert`
--

INSERT INTO `likert` (`id`, `kelas_a`, `kelas_b`, `kelas_c`, `kelas_d`, `kelas_e`, `total`, `hasil`, `created_at`, `updated_at`) VALUES
(1, 24, 72, 38, 62, 4, 200, 65, '', '2017-12-22 02:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `authKey` varchar(50) DEFAULT NULL,
  `accessToken` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `authKey`, `accessToken`, `role`) VALUES
(1, 'admin', 'admin', NULL, NULL, 'admin'),
(2, 'ulfatinika_sari', 'ulfatinikasari', '', '', 'guest'),
(3, 'haryanto', 'haryanto', '', '', 'guest'),
(4, 'maulinda', 'maulinda', '', '', 'guest'),
(5, 'andhika_dwi', 'andhikadwi', '', '', 'guest'),
(6, 'fausi_oktaviani', 'fausioktaviani', '', '', 'user'),
(7, 'rully_effendi', 'rullyeffendi', '', '', 'user'),
(8, 'agung_wijaya', 'agungwijaya', '', '', 'user'),
(9, 'tri_anggita_sari', 'trianggitasari', '', '', 'user'),
(10, 'siti_rohmah', 'sitirohmah', '', '', 'user'),
(11, 'sirajuddin_handalguna', 'sirajuddinhandalguna', '', '', 'user'),
(12, 'robbi_firmansah', 'robbifirmansah', '', '', 'user'),
(13, 'yudha_tri_hardika', 'yudhatrihardika', '', '', 'user'),
(14, 'muhammad_wildan', 'muhammadwildan', '', '', 'user'),
(15, 'pandhu_buwono', 'pandhubuwono', '', '', 'user'),
(16, 'husma_yaqin', 'husmayaqin', '', '', 'user'),
(17, 'andhik_rezki_pratama', 'andhikrezkipratama', '', '', 'user'),
(18, '_tri_wicaksono', 'triwicaksono', '', '', 'user'),
(19, 'rezy_okzayunita', 'rezyokzayunita', '', '', 'user'),
(20, 'ririn_dwi_astutik', 'ririndwiastutik', '', '', 'user'),
(21, 'sri_yamti', 'sriyamti', '', '', 'user'),
(22, 'ismatul_jannah', 'ismatuljannah', '', '', 'user'),
(23, 'febrike_inggit_', 'febrikeinggit', '', '', 'user'),
(24, 'ach_zamroni', 'achzamroni', '', '', 'user'),
(25, 'desyanti', 'desyanti', '', '', 'user'),
(26, 'ruslan_anang', 'ruslananang', '', '', 'user'),
(27, 'eka_rahmawati', 'ekarahmawati', '', '', 'user'),
(28, 'dhea_fardha', 'dheafardha', '', '', 'user'),
(29, 'rendiana_sulistiyan', 'rendianasulistiyan', '', '', 'user'),
(30, 'putra_sudarsono', 'putrasudarsono', '', '', 'user'),
(31, 'david_fadhilla', 'davidfadhilla', '', '', 'user'),
(32, 'fahmi_jannur', 'fahmijannur', '', '', 'user'),
(33, 'hanif_darmawan', 'hanifdarmawan', '', '', 'user'),
(34, 'miftachul_hidayat', 'miftachulhidayat', '', '', 'user'),
(35, 'rikky_januarsam', 'rikkyjanuarsam', '', '', 'user'),
(36, 'iin_widya_agustin', 'iinwidyaagustin', '', '', 'user'),
(37, 'ihyauddin', 'ihyauddin', '', '', 'user'),
(38, 'rizki_jaya_kurnia', 'rizkijayakurnia', '', '', 'user'),
(39, 'puji_muhammad', 'pujimuhammad', '', '', 'user'),
(40, 'angga_bima_saputra', 'anggabimasaputra', '', '', 'user'),
(41, 'yayang_yudhistira', 'yayangyudhistira', '', '', 'user'),
(42, 'rudi_iswanto', 'rudiiswanto', '', '', 'user'),
(43, 'imam_priyanto', 'imampriyanto', '', '', 'user'),
(44, 'eko_saputro', 'ekosaputro', '', '', 'user'),
(45, 'feri_bima', 'feribima', '', '', 'user'),
(46, 'lukman_hakim', 'lukmanhakim', '', '', 'user'),
(47, 'taufikurrahman', 'taufikurrahman', '', '', 'user'),
(48, 'bagus_catur', 'baguscatur', '', '', 'user'),
(49, 'nur_rohman', 'nurrohman', '', '', 'user'),
(50, 'akbar_rafsanjani', 'akbarrafsanjani', '', '', 'user'),
(51, 'nova_mustika', 'novamustika', '', '', 'user'),
(52, 'yuniar_andriany', 'yuniarandriany', '', '', 'user'),
(53, 'mohammad_khairil', 'mohammadkhairil', '', '', 'user'),
(54, 'muhammad_rian', 'muhammadrian', '', '', 'user'),
(55, 'ita_nur_cholifah', 'itanurcholifah', '', '', 'user'),
(56, 'mayda_betty', 'maydabetty', '', '', 'user'),
(57, 'novita_risky', 'novitarisky', '', '', 'user'),
(58, 'erva_yuanita', 'ervayuanita', '', '', 'user'),
(59, 'arif_purnomo', 'arifpurnomo', '', '', 'user'),
(60, 'helmy_yusuf', 'helmyyusuf', '', '', 'user'),
(61, 'indah_nurul', 'indahnurul', '', '', 'user'),
(62, 'hery_nuryunianto', 'herynuryunianto', '', '', 'user'),
(63, 'joko_nugroho', 'jokonugroho', '', '', 'user'),
(64, 'serdika', 'serdika', '', '', 'user'),
(65, 'nisa''_arum_prisyanti', 'nisa''arumprisyanti', '', '', 'user'),
(66, 'bagus_candra', 'baguscandra', '', '', 'user'),
(67, 'robby_abdillah', 'robbyabdillah', '', '', 'user'),
(68, 'walidah_ambarwati', 'walidahambarwati', '', '', 'user'),
(69, 'hesti_dwi', 'hestidwi', '', '', 'user'),
(70, 'roiyan_fauzi', 'roiyanfauzi', '', '', 'user'),
(71, 'dwi_arum_rahayu', 'dwiarumrahayu', '', '', 'user'),
(72, 'asioka_soghidin', 'asiokasoghidin', '', '', 'user'),
(73, 'hendri_atmoko', 'hendriatmoko', '', '', 'user'),
(74, 'rega_susilo', 'regasusilo', '', '', 'user'),
(75, 'moh._ashari_pratama', 'moh.asharipratama', '', '', 'user'),
(76, 'wulan_permata', 'wulanpermata', '', '', 'user'),
(77, 'ridwan_chandra', 'ridwanchandra', '', '', 'user'),
(78, 'nanda_syailendra', 'nandasyailendra', '', '', 'user'),
(79, 'dody_nurdiansyah', 'dodynurdiansyah', '', '', 'user'),
(80, 'rahmad_kukuh', 'rahmadkukuh', '', '', 'user'),
(81, 'devi_vidiya', 'devividiya', '', '', 'user'),
(82, 'willy_opsi_purwoko', 'willyopsipurwoko', '', '', 'user'),
(83, 'erik_riskiono', 'erikriskiono', '', '', 'user'),
(84, 'bambang_supriyadi', 'bambangsupriyadi', '', '', 'user'),
(85, 'siti_hotimatul', 'sitihotimatul', '', '', 'user'),
(86, 'luhung_wiratama', 'luhungwiratama', '', '', 'user'),
(87, 'indahapriliyah', 'indahapriliyah', '', '', 'user'),
(88, 'zuhal_ramzi', 'zuhalramzi', '', '', 'user'),
(89, 'cindy_lovina', 'cindylovina', '', '', 'user'),
(90, 'afit_syawalli', 'afitsyawalli', '', '', 'user'),
(91, 'roni_wijayanto', 'roniwijayanto', '', '', 'user'),
(92, 'yongkyputra', 'yongkyputra', '', '', 'user'),
(93, 'miftachul_huda', 'miftachulhuda', '', '', 'user'),
(94, 'dwi_wilujeng', 'dwiwilujeng', '', '', 'user'),
(95, 'faruk', 'faruk', '', '', 'user'),
(96, 'azizah_desy', 'azizahdesy', '', '', 'user'),
(97, 'fatchullah', 'fatchullah', '', '', 'user'),
(98, 'muhammad_nizar', 'muhammadnizar', '', '', 'user'),
(99, 'miftakhul_mujahidin', 'miftakhulmujahidin', '', '', 'user'),
(100, 'mochamad_mulya', 'mochamadmulya', '', '', 'user'),
(101, 'ary_prabowo', 'aryprabowo', '', '', 'user'),
(102, 'sofyani_putri_yulfiani', 'sofyaniputriyulfiani', '', '', 'user'),
(103, 'muhammad_rizal_bahri', 'muhammadrizalbahri', '', '', 'user'),
(104, 'kiromim_baroroh', 'kiromimbaroroh', '', '', 'user'),
(105, 'joko_dwi_purnomo', 'jokodwipurnomo', '', '', 'user'),
(106, 'yulistyan_wahyu_firnanda', 'yulistyanwahyufirnanda', '', '', 'user'),
(107, 'danang_setyawan', 'danangsetyawan', '', '', 'user'),
(108, 'angger_pradana', 'anggerpradana', '', '', 'user'),
(109, 'moh._faisol_wahono', 'moh.faisolwahono', '', '', 'user'),
(110, 'ardian_hasti', 'ardianhasti', '', '', 'user'),
(111, 'lailatul_fitrianingsih', 'lailatulfitrianingsih', '', '', 'user'),
(112, 'bagus_nursyah_abdilah', 'bagusnursyahabdilah', '', '', 'user'),
(113, 'bayu_mukti_purgiyanto', 'bayumuktipurgiyanto', '', '', 'user'),
(114, 'eka_dila_maulidiana', 'ekadilamaulidiana', '', '', 'user'),
(115, 'syfira_mafruda', 'syfiramafruda', '', '', 'user'),
(116, 'achmad_widodo', 'achmadwidodo', '', '', 'user'),
(117, 'fahmi_fahrezi', 'fahmifahrezi', '', '', 'user'),
(118, 'anindya_anindhita', 'anindyaanindhita', '', '', 'user'),
(119, 'puput_marina', 'puputmarina', '', '', 'user'),
(120, 'yandhika', 'yandhika', '', '', 'user'),
(121, 'oky_mafrudin', 'okymafrudin', '', '', 'user'),
(122, 'silvy_nur_haliza', 'silvynurhaliza', '', '', 'user'),
(123, 'fariyadi_agil', 'fariyadiagil', '', '', 'user'),
(124, 'abdul_fattahil_munir', 'abdulfattahilmunir', '', '', 'user'),
(125, 'punasan', 'punasan', '', '', 'user'),
(126, 'moh_helmi_darmawan', 'mohhelmidarmawan', '', '', 'user'),
(127, 'ach._lutfi_kurniawan', 'ach.lutfikurniawan', '', '', 'user'),
(128, 'andi_rahman', 'andirahman', '', '', 'user'),
(129, 'imam_rokhadi', 'imamrokhadi', '', '', 'user'),
(130, 'yani_dwi_pranata', 'yanidwipranata', '', '', 'user'),
(131, 'novita_putri_anggraeni', 'novitaputrianggraeni', '', '', 'user'),
(132, 'moch._fuguh_syaifudin', 'moch.fuguhsyaifudin', '', '', 'user'),
(133, 'erick_surya_hadiwijaya', 'ericksuryahadiwijaya', '', '', 'user'),
(134, 'herdika_dwi_ahmedy', 'herdikadwiahmedy', '', '', 'user'),
(135, 'ajeng_nur', 'ajengnur', '', '', 'user'),
(136, 'afrizal_muzakki', 'afrizalmuzakki', '', '', 'user'),
(137, 'tegar_prahastira', 'tegarprahastira', '', '', 'user'),
(138, 'gilang_purbo_gusti', 'gilangpurbogusti', '', '', 'user'),
(139, 'fajar_windy_atmoko', 'fajarwindyatmoko', '', '', 'user'),
(140, 'welly_hendra_kusuma', 'wellyhendrakusuma', '', '', 'user'),
(141, 'narruta', 'narruta', '', '', 'user'),
(142, 'ika_pramita', 'ikapramita', '', '', 'user'),
(143, 'shafa_fauziya', 'shafafauziya', '', '', 'user'),
(144, 'prima_ade_intantri', 'primaadeintantri', '', '', 'user'),
(145, 'feris', 'feris', '', '', 'user'),
(146, 'agung_santoso', 'agungsantoso', '', '', 'user'),
(147, 'ahmad_saichu', 'ahmadsaichu', '', '', 'user'),
(148, 'kunang_indra', 'kunangindra', '', '', 'user'),
(149, 'triwicaksana', 'triwicaksana', '', '', 'user'),
(150, 'aulia_karuniawati', 'auliakaruniawati', '', '', 'user'),
(151, 'arista_intan', 'aristaintan', '', '', 'user'),
(152, 'ajie_utomo', 'ajieutomo', '', '', 'user'),
(153, 'bachtiyar_azis', 'bachtiyarazis', '', '', 'user'),
(154, 'khoirum', 'khoirum', '', '', 'user'),
(155, 'baharuddin_syah', 'baharuddinsyah', '', '', 'user'),
(156, 'wibowo', 'wibowo', '', '', 'user'),
(157, 'bahkrul_munir', 'bahkrulmunir', '', '', 'user'),
(158, 'dony_satria', 'donysatria', '', '', 'user'),
(159, 'susilowati', 'susilowati', '', '', 'user'),
(160, 'firdaus_pratama', 'firdauspratama', '', '', 'user'),
(161, 'nadhifatur_rohmah', 'nadhifaturrohmah', '', '', 'user'),
(162, 'andika_pratama', 'andikapratama', '', '', 'user'),
(163, 'yuniatun_khasanah', 'yuniatunkhasanah', '', '', 'user'),
(164, 'rachmad_prasandianto', 'rachmadprasandianto', '', '', 'user'),
(165, 'andriana_noviyanthi', 'andriananoviyanthi', '', '', 'user'),
(166, 'novan_ferdianika', 'novanferdianika', '', '', 'user'),
(167, 'nurul_fibrianita', 'nurulfibrianita', '', '', 'user'),
(168, 'wana_arta', 'wanaarta', '', '', 'user'),
(169, 'agung_rizky_fauzy', 'agungrizkyfauzy', '', '', 'user'),
(170, 'kopastika', 'kopastika', '', '', 'user'),
(171, 'chairil_yulianto', 'chairilyulianto', '', '', 'user'),
(172, 'aris_firhansyah', 'arisfirhansyah', '', '', 'user'),
(173, 'fauzan_faturrahman', 'fauzanfaturrahman', '', '', 'user'),
(174, 'diane_purnamasari', 'dianepurnamasari', '', '', 'user'),
(175, 'taufik_kurrahman', 'taufikkurrahman', '', '', 'user'),
(176, 'yufi_rudianto', 'yufirudianto', '', '', 'user'),
(177, 'akbar_hidayatullah', 'akbarhidayatullah', '', '', 'user'),
(178, 'subyantoro', 'subyantoro', '', '', 'user'),
(179, 'aprianto', 'aprianto', '', '', 'user'),
(180, 'igor_wisnu_wardana', 'igorwisnuwardana', '', '', 'user'),
(181, 'andi_taufik', 'anditaufik', '', '', 'user'),
(182, 'okta_yudha_purnama', 'oktayudhapurnama', '', '', 'user'),
(183, 'riadi', 'riadi', '', '', 'user'),
(184, 'alex_zakaria_hasan', 'alexzakariahasan', '', '', 'user'),
(185, 'devi_asmaul_khusna', 'deviasmaulkhusna', '', '', 'user'),
(186, 'nadhia_rahmadhani', 'nadhiarahmadhani', '', '', 'user'),
(187, 'febrian_arianto', 'febrianarianto', '', '', 'user'),
(188, 'ach._fathol_hadi', 'ach.fatholhadi', '', '', 'user'),
(189, 'gunawan_kusuma', 'gunawankusuma', '', '', 'user'),
(190, 'windarti', 'windarti', '', '', 'user'),
(191, 'bahol_mustafa', 'baholmustafa', '', '', 'user'),
(192, 'ony_irvansyah', 'onyirvansyah', '', '', 'user'),
(193, 'agus_budiono', 'agusbudiono', '', '', 'user'),
(194, 'aziz_nur', 'aziznur', '', '', 'user'),
(195, 'sales_amirudin', 'salesamirudin', '', '', 'user'),
(196, 'nurul_awiyah', 'nurulawiyah', '', '', 'user'),
(197, 'sigit_wijanarko', 'sigitwijanarko', '', '', 'user'),
(198, 'nuari', 'nuari', '', '', 'user'),
(199, 'jainaru', 'jainaru', '', '', 'user'),
(200, 'restu_panji', 'restupanji', '', '', 'user'),
(201, 'echsan_utomo', 'echsanutomo', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1472987152),
('m140506_102106_rbac_init', 1472987155),
('m140602_111327_create_menu_table', 1472988234),
('m160312_050000_create_user', 1472988234);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `isi` longtext,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `event_id`, `isi`, `created_at`, `updated_at`) VALUES
(1, 2, 'Tahun kemarin dengan konser yang sama sangat seru banget, dijamin pasti akan terhibur', '2017-12-21 06:37:02', '2017-12-21 06:37:02'),
(2, 2, 'Tahun sebelumnya pada konser yang sama menghadirkan grup band papan atas, keren banget pokoknya', '2017-12-21 06:39:22', '2017-12-21 06:39:22'),
(3, 2, 'Konser musiknya unik karena lokasinya on the road', '2017-12-21 06:41:32', '2017-12-21 06:41:32'),
(4, 2, 'Konser musik yang tiket pre-sale-nya sangat terjangau bagi kalangan pemuda khususnya pelajar', '2017-12-21 06:43:00', '2017-12-21 06:43:00'),
(5, 2, 'Biasanya konser musik on the road seperti ini rawan akan terjadi tawuran', '2017-12-21 06:44:31', '2017-12-21 06:44:31'),
(6, 2, 'Konser kali ini didakan di Malang, semoga saja konser berikutnya bisa diadakan di Jember', '2017-12-21 06:45:44', '2017-12-21 06:45:44'),
(7, 2, 'Hati-hati bagi cewek yang nonton konser musik seperti ini, biasanya rawan tawuran', '2017-12-21 06:47:39', '2017-12-21 06:47:39'),
(8, 2, 'Harga tiketnya murah, tempatnya deket kos lagi. Recomended bagi pemuda pemudi daerah Suhat', '2017-12-21 06:49:10', '2017-12-21 06:49:10'),
(9, 2, 'Akhirnya konser musik on the road ini hadir di kota malang, nggak sabar pingin segera nonton', '2017-12-21 06:50:53', '2017-12-21 06:50:53'),
(10, 2, 'Pas banget pas malam minggu bia buat kumpul-kumpul bareng komunitas pecinta musik', '2017-12-21 06:53:09', '2017-12-21 06:53:09'),
(11, 1, 'Bintang tamunya asli kereen banget', '2017-12-21 06:54:16', '2017-12-21 06:54:16'),
(12, 1, 'Wah ada COLDPLAY, band indo-nya juga nggak kalah keren, ada NOAH, DEWA19, NIDJI', '2017-12-21 06:55:35', '2017-12-21 06:55:35'),
(13, 1, 'Para fans COLDPLAY segera merapat, tiketnya terbatas', '2017-12-21 06:56:43', '2017-12-21 06:56:43'),
(14, 1, 'Bintang tamunya keren-keren banget, ngga sabar pingin segera melihat COLDPLAY live in Surabaya', '2017-12-21 06:58:04', '2017-12-21 06:58:04'),
(15, 1, 'Baru kali ini konser musik yang biintang tamunya keren-keren tapi harga tiketnya sangat terjangkau', '2017-12-21 06:59:53', '2017-12-21 06:59:53'),
(16, 1, 'Konser musik paling WOW yang pernah ada di Surabaya', '2017-12-21 07:01:15', '2017-12-21 07:01:15'),
(17, 1, 'COLDPLAY im waiting for you', '2017-12-21 07:02:47', '2017-12-21 07:02:47'),
(18, 1, 'Mega biintang banget yang hadir dalam konser musik ini, harap Surabaya dikondisikan', '2017-12-21 07:04:18', '2017-12-21 07:04:18'),
(19, 1, 'Ayoo pemuda pemudi Surabaya kita ramaikan konser ini, jarang ada COLDPLAY mau ke sini', '2017-12-21 07:05:42', '2017-12-21 07:05:42'),
(20, 1, 'Lokasinya deket rumah, bintang tamunya keren banget, harga tiketnya sangat terjangkau, pas banget deh..', '2017-12-21 07:07:01', '2017-12-21 07:07:01'),
(21, 1, 'Hanya Surya Pro Mild yang bisa menghadirkan konser musik dengan bintang tamu seperti ini', '2017-12-21 07:08:25', '2017-12-21 07:08:25'),
(22, 1, 'Bintang tamunya cool dan keren banget, pasti Surabaya padat banget dah pada waktu itu. Harap hati-hati yang mau ke Surabaya pada waktu konser ini berlangsung', '2017-12-21 07:10:04', '2017-12-21 07:10:04'),
(23, 1, 'Semoga kedepannya Surya Pro Mild tetap mengadakan konser musik yang lebih besar dan WOW daripada ini', '2017-12-21 07:12:06', '2017-12-21 07:12:06'),
(24, 1, 'Konser musik yang sangat keren, jangan lupa para penonton hrus tetap berhati-hati barangkali ada tawuran dan semacamnya', '2017-12-21 07:15:08', '2017-12-21 07:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `kode_pembayaran` varchar(255) DEFAULT NULL,
  `kode_tiket` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `event_id`, `user_id`, `kode_pembayaran`, `kode_tiket`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 9, '1295', NULL, 150000, '0', '2017-12-21 06:36:13', '2017-12-21 06:36:13'),
(2, 2, 10, '9559', NULL, 150000, '0', '2017-12-21 06:38:26', '2017-12-21 06:38:26'),
(3, 2, 21, '4944', NULL, 150000, '0', '2017-12-21 06:40:41', '2017-12-21 06:40:41'),
(4, 2, 22, '4465', NULL, 150000, '0', '2017-12-21 06:42:24', '2017-12-21 06:42:24'),
(5, 2, 12, '9757', NULL, 150000, '0', '2017-12-21 06:43:38', '2017-12-21 06:43:38'),
(6, 2, 14, '6273', NULL, 150000, '0', '2017-12-21 06:45:16', '2017-12-21 06:45:16'),
(7, 2, 25, '2492', NULL, 150000, '0', '2017-12-21 06:47:02', '2017-12-21 06:47:02'),
(8, 2, 15, '7550', NULL, 150000, '0', '2017-12-21 06:48:26', '2017-12-21 06:48:26'),
(9, 2, 7, '7269', NULL, 150000, '0', '2017-12-21 06:49:53', '2017-12-21 06:49:53'),
(10, 2, 8, '4368', NULL, 150000, '0', '2017-12-21 06:52:36', '2017-12-21 06:52:36'),
(11, 2, 6, '0257', NULL, 150000, '0', '2017-12-22 01:12:48', '2017-12-22 01:12:48'),
(12, 2, 11, '8691', NULL, 150000, '0', '2017-12-22 01:13:13', '2017-12-22 01:13:13'),
(13, 2, 13, '0928', NULL, 150000, '0', '2017-12-22 01:13:42', '2017-12-22 01:13:42'),
(14, 2, 16, '6601', NULL, 150000, '0', '2017-12-22 01:14:10', '2017-12-22 01:14:10'),
(15, 2, 17, '7434', NULL, 150000, '0', '2017-12-22 01:14:32', '2017-12-22 01:14:32'),
(16, 2, 18, '6380', NULL, 150000, '0', '2017-12-22 01:14:56', '2017-12-22 01:14:56'),
(17, 2, 19, '3092', NULL, 150000, '0', '2017-12-22 01:15:17', '2017-12-22 01:15:17'),
(18, 2, 20, '4014', NULL, 150000, '0', '2017-12-22 01:15:37', '2017-12-22 01:15:37'),
(19, 2, 23, '3475', NULL, 150000, '0', '2017-12-22 01:16:03', '2017-12-22 01:16:03'),
(20, 2, 24, '3413', NULL, 150000, '0', '2017-12-22 01:16:30', '2017-12-22 01:16:30'),
(21, 2, 26, '3638', NULL, 150000, '0', '2017-12-22 01:16:52', '2017-12-22 01:16:52'),
(22, 2, 30, '7846', NULL, 150000, '0', '2017-12-22 01:17:22', '2017-12-22 01:17:22'),
(23, 2, 31, '5573', NULL, 150000, '0', '2017-12-22 01:17:49', '2017-12-22 01:17:49'),
(24, 2, 32, '6336', NULL, 150000, '0', '2017-12-22 01:18:27', '2017-12-22 01:18:27'),
(25, 2, 33, '7211', NULL, 150000, '0', '2017-12-22 01:18:46', '2017-12-22 01:18:46'),
(26, 2, 34, '0096', NULL, 150000, '0', '2017-12-22 01:19:08', '2017-12-22 01:19:08'),
(27, 2, 35, '9918', NULL, 150000, '0', '2017-12-22 01:19:28', '2017-12-22 01:19:28'),
(28, 2, 37, '0022', NULL, 150000, '0', '2017-12-22 01:19:58', '2017-12-22 01:19:58'),
(29, 2, 38, '5999', NULL, 150000, '0', '2017-12-22 01:20:19', '2017-12-22 01:20:19'),
(30, 2, 39, '4201', NULL, 150000, '0', '2017-12-22 01:20:39', '2017-12-22 01:20:39'),
(31, 2, 41, '6196', NULL, 150000, '0', '2017-12-22 01:23:37', '2017-12-22 01:23:37'),
(32, 2, 42, '5406', NULL, 150000, '0', '2017-12-22 01:23:58', '2017-12-22 01:23:58'),
(33, 2, 43, '7189', NULL, 150000, '0', '2017-12-22 01:24:19', '2017-12-22 01:24:19'),
(34, 2, 45, '8599', NULL, 150000, '0', '2017-12-22 01:24:42', '2017-12-22 01:24:42'),
(35, 2, 47, '9095', NULL, 150000, '0', '2017-12-22 01:25:08', '2017-12-22 01:25:08'),
(36, 2, 49, '8428', NULL, 150000, '0', '2017-12-22 01:25:30', '2017-12-22 01:25:30'),
(37, 2, 50, '2969', NULL, 150000, '0', '2017-12-22 01:25:51', '2017-12-22 01:25:51'),
(38, 2, 52, '6728', NULL, 150000, '0', '2017-12-22 01:26:15', '2017-12-22 01:26:15'),
(39, 2, 53, '8303', NULL, 150000, '0', '2017-12-22 01:26:36', '2017-12-22 01:26:36'),
(40, 2, 54, '0023', NULL, 150000, '0', '2017-12-22 01:26:57', '2017-12-22 01:26:57'),
(41, 2, 55, '0526', NULL, 150000, '0', '2017-12-22 01:27:17', '2017-12-22 01:27:17'),
(42, 2, 59, '5163', NULL, 150000, '0', '2017-12-22 01:29:21', '2017-12-22 01:29:21'),
(43, 2, 60, '3394', NULL, 150000, '0', '2017-12-22 01:29:43', '2017-12-22 01:29:43'),
(44, 2, 62, '4592', NULL, 150000, '0', '2017-12-22 01:30:04', '2017-12-22 01:30:04'),
(45, 2, 63, '7288', NULL, 150000, '0', '2017-12-22 01:30:29', '2017-12-22 01:30:29'),
(46, 2, 64, '5334', NULL, 150000, '0', '2017-12-22 01:30:54', '2017-12-22 01:30:54'),
(47, 2, 65, '7797', NULL, 150000, '0', '2017-12-22 01:31:16', '2017-12-22 01:31:16'),
(48, 2, 66, '5602', NULL, 150000, '0', '2017-12-22 01:31:36', '2017-12-22 01:31:36'),
(49, 2, 67, '1603', NULL, 150000, '0', '2017-12-22 01:31:58', '2017-12-22 01:31:58'),
(50, 2, 68, '0357', NULL, 150000, '0', '2017-12-22 01:32:20', '2017-12-22 01:32:20'),
(51, 2, 70, '8822', NULL, 150000, '0', '2017-12-22 01:32:42', '2017-12-22 01:32:42'),
(52, 2, 71, '4248', NULL, 150000, '0', '2017-12-22 01:33:07', '2017-12-22 01:33:07'),
(53, 2, 72, '0508', NULL, 150000, '0', '2017-12-22 01:33:26', '2017-12-22 01:33:26'),
(54, 2, 73, '9111', NULL, 150000, '0', '2017-12-22 01:33:44', '2017-12-22 01:33:44'),
(55, 2, 74, '6154', NULL, 150000, '0', '2017-12-22 01:34:03', '2017-12-22 01:34:03'),
(56, 2, 75, '1468', NULL, 150000, '0', '2017-12-22 01:34:23', '2017-12-22 01:34:23'),
(57, 2, 76, '1190', NULL, 150000, '0', '2017-12-22 01:34:43', '2017-12-22 01:34:43'),
(58, 2, 77, '0032', NULL, 150000, '0', '2017-12-22 01:35:03', '2017-12-22 01:35:03'),
(59, 2, 78, '9340', NULL, 150000, '0', '2017-12-22 01:35:37', '2017-12-22 01:35:37'),
(60, 2, 79, '8473', NULL, 150000, '0', '2017-12-22 01:35:57', '2017-12-22 01:35:57'),
(61, 2, 80, '0490', NULL, 150000, '0', '2017-12-22 01:38:14', '2017-12-22 01:38:14'),
(62, 2, 81, '1197', NULL, 150000, '0', '2017-12-22 01:38:34', '2017-12-22 01:38:34'),
(63, 2, 82, '3802', NULL, 150000, '0', '2017-12-22 01:38:53', '2017-12-22 01:38:53'),
(64, 2, 83, '6806', NULL, 150000, '0', '2017-12-22 01:39:12', '2017-12-22 01:39:12'),
(65, 2, 84, '0332', NULL, 150000, '0', '2017-12-22 01:39:31', '2017-12-22 01:39:31'),
(66, 1, 85, '8533', NULL, 300000, '0', '2017-12-22 01:42:01', '2017-12-22 01:42:01'),
(67, 1, 86, '4605', NULL, 300000, '0', '2017-12-22 01:42:22', '2017-12-22 01:42:22'),
(68, 1, 87, '5959', NULL, 300000, '0', '2017-12-22 01:43:05', '2017-12-22 01:43:05'),
(69, 1, 88, '8186', NULL, 300000, '0', '2017-12-22 01:43:27', '2017-12-22 01:43:27'),
(70, 1, 89, '7638', NULL, 300000, '0', '2017-12-22 01:43:47', '2017-12-22 01:43:47'),
(71, 1, 90, '5883', NULL, 300000, '0', '2017-12-22 01:44:05', '2017-12-22 01:44:05'),
(72, 1, 91, '6344', NULL, 300000, '0', '2017-12-22 01:44:25', '2017-12-22 01:44:25'),
(73, 1, 92, '4376', NULL, 300000, '0', '2017-12-22 01:44:42', '2017-12-22 01:44:42'),
(74, 1, 93, '7037', NULL, 300000, '0', '2017-12-22 01:44:59', '2017-12-22 01:44:59'),
(75, 1, 94, '6199', NULL, 300000, '0', '2017-12-22 01:45:19', '2017-12-22 01:45:19'),
(76, 1, 95, '6725', NULL, 300000, '0', '2017-12-22 01:45:38', '2017-12-22 01:45:38'),
(77, 1, 96, '9248', NULL, 300000, '0', '2017-12-22 01:46:01', '2017-12-22 01:46:01'),
(78, 1, 97, '3782', NULL, 300000, '0', '2017-12-22 01:46:17', '2017-12-22 01:46:17'),
(79, 1, 98, '4365', NULL, 300000, '0', '2017-12-22 01:46:36', '2017-12-22 01:46:36'),
(80, 1, 99, '5156', NULL, 300000, '0', '2017-12-22 01:46:55', '2017-12-22 01:46:55'),
(81, 1, 100, '0165', NULL, 300000, '0', '2017-12-22 01:47:14', '2017-12-22 01:47:14'),
(82, 1, 101, '7990', NULL, 300000, '0', '2017-12-22 01:47:32', '2017-12-22 01:47:32'),
(83, 1, 102, '1699', NULL, 300000, '0', '2017-12-22 01:48:18', '2017-12-22 01:48:18'),
(84, 1, 103, '6904', NULL, 300000, '0', '2017-12-22 01:48:44', '2017-12-22 01:48:44'),
(85, 1, 104, '3671', NULL, 300000, '0', '2017-12-22 01:49:04', '2017-12-22 01:49:04'),
(86, 1, 105, '1223', NULL, 300000, '0', '2017-12-22 01:49:24', '2017-12-22 01:49:24'),
(87, 1, 106, '0013', NULL, 300000, '0', '2017-12-22 01:49:43', '2017-12-22 01:49:43'),
(88, 1, 107, '4306', NULL, 300000, '0', '2017-12-22 01:50:01', '2017-12-22 01:50:01'),
(89, 1, 108, '4436', NULL, 300000, '0', '2017-12-22 01:50:20', '2017-12-22 01:50:20'),
(90, 1, 109, '0020', NULL, 300000, '0', '2017-12-22 01:50:39', '2017-12-22 01:50:39'),
(91, 1, 110, '0339', NULL, 300000, '0', '2017-12-22 01:50:59', '2017-12-22 01:50:59'),
(92, 1, 111, '3171', NULL, 300000, '0', '2017-12-22 01:51:21', '2017-12-22 01:51:21'),
(93, 1, 112, '8307', NULL, 300000, '0', '2017-12-22 01:51:40', '2017-12-22 01:51:40'),
(94, 1, 113, '7001', NULL, 300000, '0', '2017-12-22 01:51:59', '2017-12-22 01:51:59'),
(95, 1, 114, '3614', NULL, 300000, '0', '2017-12-22 01:52:18', '2017-12-22 01:52:18'),
(96, 1, 115, '0690', NULL, 300000, '0', '2017-12-22 01:52:37', '2017-12-22 01:52:37'),
(97, 1, 116, '3721', NULL, 300000, '0', '2017-12-22 01:52:56', '2017-12-22 01:52:56'),
(98, 1, 117, '6854', NULL, 300000, '0', '2017-12-22 01:53:18', '2017-12-22 01:53:18'),
(99, 1, 118, '5776', NULL, 300000, '0', '2017-12-22 01:53:37', '2017-12-22 01:53:37'),
(100, 1, 119, '9048', NULL, 300000, '0', '2017-12-22 01:53:58', '2017-12-22 01:53:58'),
(101, 1, 120, '4115', NULL, 300000, '0', '2017-12-22 01:54:15', '2017-12-22 01:54:15'),
(102, 1, 121, '9265', NULL, 300000, '0', '2017-12-22 01:54:33', '2017-12-22 01:54:33'),
(103, 1, 122, '7762', NULL, 300000, '0', '2017-12-22 01:54:51', '2017-12-22 01:54:51'),
(104, 1, 123, '5433', NULL, 300000, '0', '2017-12-22 01:55:09', '2017-12-22 01:55:09'),
(105, 1, 124, '7928', NULL, 300000, '0', '2017-12-22 01:55:27', '2017-12-22 01:55:27'),
(106, 1, 125, '8922', NULL, 300000, '0', '2017-12-22 01:55:42', '2017-12-22 01:55:42'),
(107, 1, 126, '5510', NULL, 300000, '0', '2017-12-22 01:56:00', '2017-12-22 01:56:00'),
(108, 1, 127, '2034', NULL, 300000, '0', '2017-12-22 01:56:18', '2017-12-22 01:56:18'),
(109, 1, 128, '8595', NULL, 300000, '0', '2017-12-22 01:56:44', '2017-12-22 01:56:44'),
(110, 1, 129, '2853', NULL, 300000, '0', '2017-12-22 01:57:15', '2017-12-22 01:57:15'),
(111, 1, 130, '7739', NULL, 300000, '0', '2017-12-22 01:57:32', '2017-12-22 01:57:32'),
(112, 1, 131, '6030', NULL, 300000, '0', '2017-12-22 01:58:22', '2017-12-22 01:58:22'),
(113, 1, 132, '0786', NULL, 300000, '0', '2017-12-22 01:58:41', '2017-12-22 01:58:41'),
(114, 1, 133, '1401', NULL, 300000, '0', '2017-12-22 01:59:00', '2017-12-22 01:59:00'),
(115, 1, 134, '9909', NULL, 300000, '0', '2017-12-22 01:59:17', '2017-12-22 01:59:17'),
(116, 1, 135, '8329', NULL, 300000, '0', '2017-12-22 01:59:45', '2017-12-22 01:59:45'),
(117, 1, 136, '6234', NULL, 300000, '0', '2017-12-22 02:00:04', '2017-12-22 02:00:04'),
(118, 1, 137, '8025', NULL, 300000, '0', '2017-12-22 02:00:23', '2017-12-22 02:00:23'),
(119, 1, 138, '1129', NULL, 300000, '0', '2017-12-22 02:01:00', '2017-12-22 02:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`) VALUES
(1, 'mursit', '', '', NULL, '', 10, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tiket` (`id_tiket`);

--
-- Indexes for table `likert`
--
ALTER TABLE `likert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `likert`
--
ALTER TABLE `likert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jenis_tiket`
--
ALTER TABLE `jenis_tiket`
  ADD CONSTRAINT `jenis_tiket_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
