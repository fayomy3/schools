-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 23, 2025 at 01:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dibuat_pada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama_lengkap`, `username`, `password`, `dibuat_pada`) VALUES
(1, 'Zacky Alghifari', 'zkyyy', '12345', '2025-12-12 18:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi_konten` longtext NOT NULL,
  `gambar_sampul` varchar(255) DEFAULT NULL,
  `status` enum('Terbit','Draf') DEFAULT 'Terbit',
  `tanggal_terbit` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_penulis` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul`, `slug`, `isi_konten`, `gambar_sampul`, `status`, `tanggal_terbit`, `id_penulis`, `id_kategori`) VALUES
(1, 'KEPALA SEKOLAH KORUPSI??? SIMAK SELENGKAPNYA ACH', 'kepala-sekolah-korupsi???-simak-selengkapnya-ach', 'WADUH BROOKKKK, KEPSEKNYA KORUP SAMPE KEBELI PAJERO😭😭😭😱😱😱', 'default-user.jpg', 'Terbit', '2025-12-12 18:03:52', 1, NULL),
(3, 'DUH SEKOLAH MENYEMPIT KARENA KEPSEK GAK VISIONER??', 'duh-sekolah-menyempit-karena-kepsek-gak-visioner??', 'KEPSEK BLOON SEKOLAH SEMPIT BUKANNYA DIBIKIN TINGKAT MALAH NGORBANIN LAPANGAN, TARUNA CUMA EMBEL-EMBEL DOANG NIH BERARTI???? ', '999-2A0EBBB8-F75C-4FED-AD4E-1FA28128077B - Najil Fikri Anugrah.jpeg', 'Terbit', '2025-12-12 20:21:22', 1, NULL),
(4, 'KEPSEL WAHYU YANG MALANG', 'kepsel-wahyu-yang-malang', 'WAHYU MENANGIS SETELAH TIDAK MENJABAT SEBAGAI KEPALA SMKN 1 BOJONG PWK, BELIAU MENANGIS SELAMA 5 BULAN LAMANNYA, MENGINGAT KENANGAN DI NEBO', '880-WhatsApp Image 2025-11-29 at 12.14.45.jpeg', 'Terbit', '2025-12-12 20:22:13', 1, NULL),
(5, 'NYAO AHHH', 'nyao-ahhh', 'NGODING JAM 3 PAGI KEK ORANG GILA', '210-Screenshot 2022-09-23 153645.png', 'Terbit', '2025-12-12 20:38:46', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `judul_kegiatan` varchar(100) DEFAULT NULL,
  `file_media` varchar(255) DEFAULT NULL,
  `tipe_media` enum('Foto','Video') DEFAULT 'Foto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `judul_kegiatan`, `file_media`, `tipe_media`) VALUES
(1, 'PANCA WALUYA HEBAT', '697-mineral.jpg', 'Foto'),
(2, 'NYAO AHHH', '325-WhatsApp Video 2023-02-06 at 12.16.35.mp4', 'Foto');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan_tampil` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `nama_lengkap`, `nip`, `jabatan`, `foto`, `urutan_tampil`) VALUES
(1, 'wahyu', '3214066969690004', 'Koruptor', '786-IMG-20220826-WA0025.jpg', 10),
(2, 'RiSDiYantoh', '21122222', 'Wakaseks', '2701-IMG-20251031-WA0079.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `logo_sekolah` varchar(255) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `email_sekolah` varchar(50) DEFAULT NULL,
  `link_facebook` varchar(255) DEFAULT NULL,
  `link_instagram` varchar(255) DEFAULT NULL,
  `link_youtube` varchar(255) DEFAULT NULL,
  `nama_kepsek` varchar(100) DEFAULT NULL,
  `foto_kepsek` varchar(255) DEFAULT NULL,
  `sambutan_kepsek` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` int(11) NOT NULL,
  `nama_pengirim` varchar(100) DEFAULT NULL,
  `email_pengirim` varchar(100) DEFAULT NULL,
  `isi_pesan` text DEFAULT NULL,
  `waktu_kirim` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id`, `nama_pengirim`, `email_pengirim`, `isi_pesan`, `waktu_kirim`) VALUES
(1, 'wahyu', 'yahahawahyu@gmail.com', 'HOAXX WOYYYY', '2025-12-12 19:51:40'),
(2, 'Wahyu Skaks', 'wahyu22@gmail.co.id', 'Pesan nya dibalas', '2025-12-12 20:43:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penulis` (`id_penulis`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
