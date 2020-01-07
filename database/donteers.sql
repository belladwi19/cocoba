-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2020 at 02:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donteers`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `title`, `description`, `location`, `img`, `category`, `tipe`, `startDate`, `endDate`, `startTime`, `endTime`) VALUES
(21, 'Aksi Tebar Makanan Nusantara', '<p>Indonesia, sebuah negeri yang kaya ini, masih menyimpan fakta bahwa masyarakatnya masih banyak yang hidup di bawah garis kemiskinan. Dengan diperkuat data yang dilansir dari tribunnews.com, bahwa 19,4 juta penduduk Indonesia masih menderita kelaparan setiap harinya. Sedih memang, namun diam tak akan memberikan solusi.</p><p> </p><p><strong>Yuk, mulai beraksi untuk membantu menurunkan angka yang cukup tinggi itu. Dukung aktivitas kami dalam program Aksi Tebar Makanan Nusantara (ATMNusa) sebagai relawan</strong>.</p><p> </p><p><strong>Apa sih ATM Nusa itu ?</strong> Program yang akan membagikan paket nasi box kepada masyarakat dhuafa di seluruh pelosok nusantara. Saat ini kami telah beraksi di 5 kota besar, seperti Pandeglang, Bondowoso, Pacitan, Banyumas dan Majalengka.</p><p> </p><p>Dan InShaa Allah, dengan bantuan kalian program ini akan terus meluas hingga ke seluruh Nusantara. Dimanapun kamu tinggal, bisa tetap membantu kami</p>', ' Aktivitas ini dikerjakan di tempat-tempat umum', '050106202010245d77569782e94fa0e15b68b8_thumbnail370x250.jpg', 'pengembangan masyarakat', 'regular', '2020-01-05', '2020-01-11', '08:00:00', '05:00:00'),
(22, 'Creatives Content Writer', 'Beberes Indonesia merupakan Platform Penjemputan Sampah Daur Ulang dan Donasi yang dibentuk oleh Outlet Dhuafa untuk mengakomodasi Penjemputan dan Pengiriman yang ditujukan untuk Outlet Dhuafa.\r\n\r\n \r\n\r\nBeberes Indonesia menjadi perwujudan Outlet Dhuafa dalam upaya keikutsertaan dalam memahami dan mengatasi masalah lingkungan yaitu Sampah di masyarakat.\r\n\r\n \r\n\r\nDari program Donatur Tetap menjadi Beberes Indonesia, telah memiliki 200 member terdaftar dan penjemputan aktif 70 - 100 titik setiap bulannya di Tangerang Selatan, Jakarta Selatan dan Bogor. Beberes Indonesia menyediakan berbagai layanan Penjemputan Sampah Daur Ulang, kebutuhan fasilitas Penampungan Sampah Daur Ulang dan kerjasama Pengolahan Sampah Daur Ulang.', 'Malang, Indonesia', '010520200630485e0f37ec11945248b6c4279a.png', 'lingkungan', 'project', '2020-01-05', '2020-01-12', NULL, NULL),
(23, 'Semua Pantas Untuk Belajar', '<p>Ayo memulai kebaikan dari hal kecil. Jadilah seseorang yang juga berperan dalam kesuksesan seseorang. Mari kita wujudkan impian saudara kita yang kesulitan mengenyam pendidikan. Jika bukan kita, siapa lagi?. Ayo Bergerak. Jadilah seseorang yang bermanfaat.</p>', 'Jakarta', '010620200402435d9099156a78473b33feab2b.jpg', 'pendidikan', 'event', '2020-01-06', '2020-01-14', '08:00:00', '04:00:00'),
(24, 'Relawan Listener Pundak Cerita', 'Kamu perempuan yang memiliki wawasan yang luas dan bisa menjadi pendengar yang baik? Mari bergabung bersama Pundak Cerita dan menjadi bagian dari senyum dan semangat sahabat Pundak Cerita!', 'Denpasar, bali Kota Denpasar, Bali', '010620200405315cde38ab2c92dbbcbe5809a2.jpg', 'hak asasi manusia', 'regular', '2020-01-06', '2020-01-10', '10:00:00', '03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `eksam`
--

CREATE TABLE `eksam` (
  `id` int(11) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `startTime` time DEFAULT NULL,
  `endTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eksam`
--

INSERT INTO `eksam` (`id`, `startDate`, `endDate`, `startTime`, `endTime`) VALUES
(9, '2020-01-05', '2020-01-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nama_panggilan` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nik` bigint(16) NOT NULL,
  `hp` bigint(12) NOT NULL,
  `status` enum('0','1') DEFAULT '1',
  `tugas_relawan` text DEFAULT NULL,
  `perlengkapan_relawan` text DEFAULT NULL,
  `metode_briefing` text DEFAULT NULL,
  `informasi_tambahan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `nama_panggilan`, `password`, `email`, `nik`, `hp`, `status`, `tugas_relawan`, `perlengkapan_relawan`, `metode_briefing`, `informasi_tambahan`) VALUES
(6, 'Peggy Klimus', 'pklimus0', 'cd3b1f8ec479d9c9bd49fead39c98d00', 'pklimus0@cocolog-nifty.com	', 1700148603583836, 240447548572, '1', NULL, NULL, NULL, NULL),
(7, 'Bella Mardiana', 'bella', '123', 'bellamardiana19@gmail.com', 3507165912000001, 895329262783, '1', NULL, NULL, NULL, NULL),
(8, 'nama', 'nama', '123', 'email@email.com', 121273917239, 1238712387, '1', NULL, NULL, NULL, NULL),
(9, 'nama123', 'nama123', '12345', 'nama123@gmail.com', 182739812738, 18273891273, '1', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eksam`
--
ALTER TABLE `eksam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eksam`
--
ALTER TABLE `eksam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
