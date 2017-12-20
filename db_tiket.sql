-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 12:49 PM
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
(1, 248, NULL, '2017-12-20 14:36:36');

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
(1, 'Surya Professional Mild Tour', '2020-12-05', '20:00:00', 'Lapangan Kodam V Brawijaya, Surabaya, Jawa Timur', 'Konser Musik Surya Professional Mild Tour menghadurkan grup band Indonesia antara lain: NOAH, DEWA 19, NIDJI, dan juga grup band internasional yaitu COLDPLAY', 1000, 'uploads/foto/Surya Professional Mild Tour_1.jpg', 300000, 500000, 1, 0, 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_1.png', 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_2.png', 'uploads/event/Surya Professional Mild Tour_1/Surya Professional Mild Tour_1_3.jpg', '', '', '', NULL, NULL, NULL, '2017-12-20 14:59:12', '2017-12-20 15:45:41'),
(2, 'Konser Musik Pro Mild Jam On The Road', '2021-02-06', '21:00:00', 'Jl. Soekarno Hatta, Jatimulyo, Malang (Depan Kampus Politeknik Negeri Malang)', 'Konser Musik Pro Mild On The Road merupakan konser musik yang disediakan setiap bulan keliling kota di Indonesia.', 2000, 'uploads/foto/Konser Musik Pro Mild On The Road_2.png', 150000, 300000, 1, 0, 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_1.png', 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_2.jpg', 'uploads/event/Konser Musik Pro Mild On The Road_2/Konser Musik Pro Mild On The Road_2_3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-20 15:31:35', '2017-12-20 15:45:50'),
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
(1, 24, 72, 38, 62, 124, 200, 65, '', '2017-12-01 16:12:03');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
