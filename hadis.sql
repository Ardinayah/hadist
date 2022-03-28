-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2022 at 03:23 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hadis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `apenulis`
--

CREATE TABLE `apenulis` (
  `penulis_id` int(11) NOT NULL,
  `penulis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `penulis_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apenulis`
--

INSERT INTO `apenulis` (`penulis_id`, `penulis`, `penulis_desc`) VALUES
(1, 'Ibnu Hajar al-\'Asqalani', 'Ibnu Hajar al-\'Asqalani (773 H/1372 M – 852 H/1449 M) adalah seorang ahli hadits dari mazhab Syafi\'i yang terkemuka.[2][5] Nama lengkapnya adalah Syihabuddin Abul Fadhl Ahmad bin Ali bin Muhammad bin Muhammad bin Ali bin Mahmud bin Ahmad bin Hajar, tetapi lebih dikenal sebagai Ibnu Hajar al-Asqalani dikarenakan kemasyhuran nenek moyangnya yang berasal dari Ashkelon, Palestina.[6] Salah satu karyanya yang terkenal adalah kitab Fathul Bari (Kemenangan Sang Pencipta), yang merupakan penjelasan dari kitab shahih milik Imam Bukhari dan disepakati sebagai kitab penjelasan Shahih Bukhari yang paling detail yang pernah dibuat.'),
(3, 'test', '`');

-- --------------------------------------------------------

--
-- Table structure for table `ariwayat`
--

CREATE TABLE `ariwayat` (
  `riwayat_id` int(11) NOT NULL,
  `riwayat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `riwayat_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ariwayat`
--

INSERT INTO `ariwayat` (`riwayat_id`, `riwayat`, `riwayat_desc`) VALUES
(1, 'Ibnu Majah', NULL),
(2, 'Imam At-Tirmizi', NULL),
(3, 'Imam Abu Dawud', NULL),
(4, 'Imam Muslim', NULL),
(5, 'Imam Bukhari', NULL),
(6, 'Imam An Nasai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hadits`
--

CREATE TABLE `hadits` (
  `hadits_id` int(11) NOT NULL,
  `hadits_judul` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hadits_sabda` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_dari` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_kata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_arti_indo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_arti_ing` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_arti_arab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_riwayat_id` int(11) NOT NULL,
  `hadits_kitab_id` int(11) NOT NULL,
  `hadits_penulis_id` int(11) NOT NULL,
  `hadits_kitab_ayat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hadits_nasab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hadits_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hadits`
--

INSERT INTO `hadits` (`hadits_id`, `hadits_judul`, `hadits_sabda`, `hadits_dari`, `hadits_kata`, `hadits_arti_indo`, `hadits_arti_ing`, `hadits_arti_arab`, `hadits_riwayat_id`, `hadits_kitab_id`, `hadits_penulis_id`, `hadits_kitab_ayat`, `hadits_nasab`, `hadits_desc`) VALUES
(2, 'Air Laut', 'قَالَ رَسُولُ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ', 'عَنْ أَبِي هُرَيْرَةَ رَضِيَ اللَّهُ عَنْهُ', '((ٌوَإِذَا كَانَ يَوْمُ صَوْمِ أَحَدِكُمْ، فَلاَ يَرْفُثْ وَلاَ يَصْخَبْ، فَإِنْ سَابَّهُ أَحَدٌ، أَوْ قَاتَلَهُ فَلْيَقُلْ إِنِّي امْرُؤٌ صَائِمٌ. ِ)). رواه البخاري', 'Dari Abu Hurairah Radliyallaahu \'anhu bahwa Rasulullah Shallallaahu \'alaihi wa Sallam bersabda tentang (air) laut. ', ' From Abu Hurairah Radliyallaahu \'anhu that Rasulullah Sallallaahu\' alaihi wa Sallam said about (water) the sea. ', '', 2, 1, 1, '1', '', ''),
(4, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 5, 3, 3, 'test', 'test', 'test'),
(5, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 5, 1, 3, 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `kitab`
--

CREATE TABLE `kitab` (
  `kitab_id` int(11) NOT NULL,
  `kitab_nama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kitab_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `kitab_penulis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kitab`
--

INSERT INTO `kitab` (`kitab_id`, `kitab_nama`, `kitab_desc`, `kitab_penulis_id`) VALUES
(1, 'Bulughul Maram', 'Kitab Bulughul Maram memuat 1.371 buah hadis. Di setiap akhir hadis yang dimuat dalam Bulughul Maram, Ibnu Hajar menyebutkan siapa perawi hadis asalnya. Bulughul Maram memasukkan hadis-hadis yang berasal dari sumber-sumber utama seperti Sahih al-Bukhari, Sahih Muslim, Sunan Abu Dawud, Sunan at-Tirmidzi, Sunan an-Nasa\'i, Sunan Ibnu Majah, dan Musnad Ahmad dan selainnya.  Kitab Bulughul Maram memiliki keutamaan yang istimewa karena seluruh hadis yang termuat di dalamnya kemudian menjadi fondasi landasan fikih dalam mazhab Syafi\'i. Selain menyebutkan asal muasal hadis-hadis yang termuat di dalamnya, penyusun juga memasukkan perbandingan antara beberapa riwayat hadis lainnya yang datang dari jalur yang lain. Karena keistimewaannya ini, Bulughul Maram hingga kini tetap menjadi kitab rujukan hadis yang dipakai secara luas tanpa mempedulikan mazhab fikihnya.', 1),
(3, 'test', 'test', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apenulis`
--
ALTER TABLE `apenulis`
  ADD PRIMARY KEY (`penulis_id`);

--
-- Indexes for table `ariwayat`
--
ALTER TABLE `ariwayat`
  ADD PRIMARY KEY (`riwayat_id`);

--
-- Indexes for table `hadits`
--
ALTER TABLE `hadits`
  ADD PRIMARY KEY (`hadits_id`);

--
-- Indexes for table `kitab`
--
ALTER TABLE `kitab`
  ADD PRIMARY KEY (`kitab_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apenulis`
--
ALTER TABLE `apenulis`
  MODIFY `penulis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ariwayat`
--
ALTER TABLE `ariwayat`
  MODIFY `riwayat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hadits`
--
ALTER TABLE `hadits`
  MODIFY `hadits_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kitab`
--
ALTER TABLE `kitab`
  MODIFY `kitab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
