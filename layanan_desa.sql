-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `layanan_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` longtext NOT NULL,
  `level` varchar(45) DEFAULT 'administrator',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '1', 'administrator', NULL, NULL),
(2, 'Admin 2', 'admin_2', '1', 'administrator', NULL, NULL),
(3, 'Admin 3', 'admin_3', '1', 'administrator', NULL, NULL),
(4, 'Admin 4', 'admin_4', '1', 'administrator', NULL, NULL),
(5, 'Admin 5', 'admin_5', '1', 'administrator', NULL, NULL),
(6, 'Consequat Qui at au', 'rybejuzij', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:35:36', '2023-05-21 01:35:36'),
(7, 'Quia mollit deserunt', 'xynyh', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:35:56', '2023-05-21 01:35:56'),
(8, 'Illo cre', 'kuroxa', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:36:48', '2023-05-21 01:42:05'),
(9, 'Est quia totam adipi', 'sokybet', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:36:57', '2023-05-21 01:36:57'),
(10, 'Qui aut perferendis ', 'vemahyp', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:37:01', '2023-05-21 01:37:01'),
(11, 'Praesentium enim dol', 'ruduriw', 'Pa$$w0rd!', 'administrator', '2023-05-21 01:37:07', '2023-05-21 01:37:07'),
(12, 'Facere voluptatum fu', 'weqyxyl', 's', 'administrator', '2023-05-21 01:37:49', '2023-05-21 01:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengajuan`
--

CREATE TABLE `jenis_pengajuan` (
  `id` int(11) NOT NULL,
  `nama` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_pengajuan`
--

INSERT INTO `jenis_pengajuan` (`id`, `nama`, `deskripsi`, `status`, `created_at`, `updated_at`, `file`) VALUES
(1, 'Pembuatan SKCK', 'Cillum molestiae nos dsd', 'inactive', '2023-05-21 02:09:53', '2023-05-20 20:07:16', NULL),
(2, 'Surat Keterangan Tidak Mampu', 'Atque sit voluptate', 'active', '2023-05-20 19:31:14', '2023-05-20 20:07:36', NULL),
(3, 'Surat Kematian', 'Dignissimos cupidita', 'inactive', '2023-05-20 19:40:27', '2023-05-20 20:07:47', NULL),
(4, 'Eos assumenda anim q', '', '', '2023-05-25 03:58:17', '2023-05-25 03:58:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `no_kk` varchar(45) NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` varchar(45) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(45) DEFAULT NULL,
  `rw` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(150) DEFAULT NULL,
  `kecamatan` varchar(150) DEFAULT NULL,
  `kabupaten` varchar(150) DEFAULT NULL,
  `provinsi` varchar(150) DEFAULT NULL,
  `kode_pos` varchar(45) DEFAULT NULL,
  `agama` varchar(150) NOT NULL,
  `status_perkawinan` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(150) DEFAULT NULL,
  `kewarganegaraan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `no_kk`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `golongan_darah`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(1, '2357575', '79', 'Tempor sit enim at ', 'Animi consectetur ', '1995-08-05', 'Laki-laki', 'Odit ', 'Accusantium velit ea', '60', '3', 'Adipisci placeat vo', 'Laboriosam in quae ', 'Quae eum velit eaqu', 'Vel veniam aute sit', '35', 'In velit dolore sed ', 'Vel cupiditate elit', 'Et deleniti eveniet', 'Sapiente obcaecati d', '2023-05-25 20:08:08', '2023-05-25 20:08:08'),
(2, '23', '100', 'Aut quos et consecte', 'Dolorem ipsum conseq', '1992-06-27', 'Perempuan', 'Dolor', 'Non harum non dolore', '21', '44', 'In ut in illum face', 'Quae sapiente quisqu', 'Id aliquid tempore', '28', '60', 'Vitae natus doloremq', 'Consequat Voluptate', 'Eligendi sed deserun', 'Recusandae Dicta no', '2023-05-25 04:13:31', '2023-05-25 04:13:31'),
(3, '11', '42', 'Eu assumenda ullamco', 'Incididunt voluptate', '2014-07-28', 'Laki-laki', 'Omnis', 'Aut quia accusamus e', '78', '23', 'Eos autem quidem ul', 'Commodo et aspernatu', 'Ea eos animi hic c', 'Consequatur dolore ', '37', 'Quae ad quo quisquam', 'Et aliqua Et laudan', 'Laborum Eius except', 'Qui assumenda sit nu', '2023-05-25 04:35:46', '2023-05-25 04:35:46'),
(4, '42', '34', 'Nostrum et quia non ', 'Aperiam ut et cum cu', '2000-09-22', 'Laki-laki', 'Nobis', 'Anim dolor esse ips', '60', '70', 'Qui perferendis sit ', 'Perferendis laudanti', 'Placeat consequuntu', 'Neque officiis hic l', '49', 'Magni quod facilis q', 'Laboris ullamco ut n', 'Enim dignissimos est', 'Tempor qui mollit el', '2023-05-25 04:35:59', '2023-05-25 04:35:59'),
(5, '7', '41', 'Sed nemo qui et lore', 'Adipisci qui excepte', '2015-08-09', 'Laki-laki', 'Aliqu', 'Ut assumenda et nemo', '95', '86', 'Qui eaque voluptatem', 'Aliquid deserunt por', 'Adipisicing earum in', 'Accusantium sunt rep', '6', 'Necessitatibus vitae', 'Tenetur nostrum mole', 'Minim et autem expli', 'Obcaecati obcaecati ', '2023-05-25 04:38:05', '2023-05-25 04:38:05'),
(6, '1', '33', 'Enim in doloribus il', 'Id amet nemo fuga ', '1992-06-26', 'Perempuan', 'Odit ', 'Qui sed asperiores o', '93', '66', 'Quis laboris duis vo', 'Quia libero illo lib', 'Aut illo minus ipsa', 'Necessitatibus repel', '16', 'Sunt excepteur enim ', 'Amet soluta dicta a', 'Quo sint id cum non ', 'Sed voluptatem non e', '2023-05-25 04:51:18', '2023-05-25 04:51:18'),
(7, '3', '66', 'Error consequuntur o', 'Deserunt consequuntu', '1983-07-15', 'Laki-laki', 'Atque', 'Vel ut eum voluptati', '9', '71', 'Consequat Do dolor ', 'Corporis minus et ni', 'Consequat Sed incid', 'Impedit sit repreh', '22', 'Laboris libero cupid', 'Quis est non aut do', 'Ex non incidunt ten', 'Qui in dolorem omnis', '2023-05-25 04:51:24', '2023-05-25 04:51:24'),
(8, '71', '38', 'Autem natus voluptat', 'Sapiente ut sed volu', '2014-10-04', 'Laki-laki', 'Est v', 'Deleniti et deserunt', '40', '87', 'Recusandae Culpa q', 'Sunt dolores eligend', 'Deserunt ea ut volup', 'Ad non fugiat nostru', '79', 'Dolor modi veniam s', 'Doloribus neque cons', 'A in occaecat except', 'Ipsa a illo dolores', '2023-05-25 04:51:31', '2023-05-25 04:51:31'),
(9, '29', '79', 'Qui iure aliqua A a', 'Enim sit ad eos aut', '1978-11-21', 'Laki-laki', 'Excep', 'Magna libero volupta', '41', '40', 'Odio nihil ullamco p', 'Id rem tempore culp', 'Sed vel dolor in ali', 'Repudiandae quod qui', '50', 'Ut nihil fugiat seq', 'Rem et consequatur ', 'Et doloribus dolores', 'Magna dolorem a vel ', '2023-05-25 04:51:38', '2023-05-25 04:51:38'),
(10, '31', '7', 'Debitis ad do volupt', 'A qui in nihil aut e', '2008-11-02', 'Laki-laki', 'Unde ', 'Aut voluptas nisi re', '68', '73', 'Labore sed iure solu', 'Culpa exercitation ', 'Neque sunt vel harum', 'Earum harum quas nih', '1', 'Aliquip id eaque lab', 'Qui qui eum sed exce', 'Esse voluptas aut f', 'In magnam atque mole', '2023-05-25 04:51:47', '2023-05-25 04:51:47'),
(11, '65', '38', 'Ea duis totam nihil ', 'Dolore in quis omnis', '2023-01-08', 'Laki-laki', 'Eum d', 'Adipisci quasi quibu', '98', '33', 'Ut sed voluptatem U', 'Ut pariatur Aut est', 'Illum voluptatem er', 'Ea sapiente rerum vo', '98', 'Laborum tenetur et f', 'Ut voluptate ullamco', 'Magna aliqua Mollit', 'Quis ipsam tempore ', '2023-05-25 04:51:52', '2023-05-25 04:51:52'),
(12, '67', '46', 'Reprehenderit conse', 'Similique nihil cons', '1970-07-28', 'Laki-laki', 'Eos i', 'In saepe deserunt at', '69', '96', 'Aspernatur quisquam ', 'Est modi eiusmod tem', 'Aut nihil dolorum do', 'In quam ad sit fugia', '83', 'Temporibus neque et ', 'Perspiciatis in mod', 'Qui ipsum irure qui', 'At delectus delectu', '2023-05-25 20:07:30', '2023-05-25 20:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengajuan`
--

CREATE TABLE `surat_pengajuan` (
  `id` int(11) NOT NULL,
  `id_penduduk` bigint(20) NOT NULL,
  `id_jenis_pengajuan` bigint(20) NOT NULL,
  `keterangan` longtext DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_pengajuan`
--
ALTER TABLE `jenis_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
