-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 06:25 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silt`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `genre_buku`) VALUES
(1, 'Romance'),
(2, 'Thriller'),
(3, 'Fantasi'),
(4, 'Fiksi'),
(5, 'Sejarah'),
(6, 'Sastra Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'HRD'),
(2, 'Staff IT'),
(3, 'Staff Pendidikan'),
(4, 'Staff Marketing'),
(5, 'Staff Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kode_karyawan` int(11) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kode_karyawan`, `nama_lengkap`, `nik`, `id_jabatan`, `jk`, `alamat`, `no_hp`) VALUES
(1, 'Kang Daniel', '123456789', 1, 'Laki-laki', 'Jalan Pahlawan No. 23, Mekarsari, Bogor', '08912378983'),
(2, 'Petter Parker', '123456788', 2, 'Laki-laki', 'Tasikmalaya', '089266738221'),
(3, 'Samuel Kim', '123456787', 3, 'Laki-laki', 'hh2', '11112');

-- --------------------------------------------------------

--
-- Table structure for table `resume_buku`
--

CREATE TABLE `resume_buku` (
  `id_buku` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `no_isbn` varchar(20) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `resume` longtext NOT NULL,
  `nilai_plus` int(11) DEFAULT NULL,
  `nilai_isi` int(11) DEFAULT NULL,
  `bulan` varchar(12) NOT NULL,
  `tahun` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resume_buku`
--

INSERT INTO `resume_buku` (`id_buku`, `username`, `judul`, `id_genre`, `no_isbn`, `penulis`, `penerbit`, `tahun_terbit`, `resume`, `nilai_plus`, `nilai_isi`, `bulan`, `tahun`, `status`) VALUES
(1, 'petter', 'My Love is You', 3, 'ISBN 78892381', 'JK Rowling', 'Love', '2021', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis obcaecati eaque architecto at saepe sit a sequi non harum, cumque facere, fuga ducimus quasi quaerat sed tenetur dolorum suscipit alias.\r\n', 90, 77, '3', 2022, 1),
(2, 'petter', 'Rainy Day', 1, 'ISBN 87878978', 'Depa Melina', 'PT Terbit', '2019', 'The site configured at this address does not contain the requested file.If this is your site, make sure that the filename case matches the URL. For root URLs (like http://example.com/) you must provide an index.html file. Read the full documentation for more information about using GitHub Pages.\r\nGitHub Status — @githubstatus', 80, 90, '1', 2022, 1),
(3, 'petter', 'aass', 2, 'aa', 'aa', 'aa', '2000', '<h2><big><strong>aa</strong></big></h2>\r\n\r\n<p><big><strong>nknknk</strong></big></p>\r\n', 100, 60, '2', 2022, 1),
(4, 'petter', 'Angkasa', 6, '190902', 'Depa', 'Depa Juga', '2004', '<ol>\r\n	<li>ssas</li>\r\n	<li>Hmm</li>\r\n	<li>Yayya</li>\r\n</ol>\r\n', 50, 78, '4', 2022, 1),
(10, 'petter', 'Ketika cinta bertasbih', 1, '190902', 'Gramedia dong', 'Cahaya', '2015', '<p>Ada beberapa poin penting diantaranya</p>\r\n\r\n<ol>\r\n	<li>Aku</li>\r\n	<li>Kamu</li>\r\n	<li>Selamanya</li>\r\n</ol>\r\n', 100, 100, '5', 2022, 1),
(11, 'samuel', '123', 2, '2331', 'weq', 'qeqw', '3', '<p>asddas</p>\r\n', 90, 84, '1', 2022, 1),
(13, 'bogum', 'Angkasa', 1, '888', 'JJAH', 'AAS', '1', '<p>AAS</p>\r\n', 70, 99, '1', 2022, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `kode_karyawan` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `color1` varchar(7) NOT NULL,
  `color2` varchar(7) NOT NULL,
  `gradient` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `kode_karyawan`, `fullname`, `password`, `level`, `foto`, `active`, `color1`, `color2`, `gradient`) VALUES
('daniel', 1, 'Kang Daniel', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'hrd', 'user-img.jpg', 1, '#083470', '#083470', 'on'),
('petter', 2, 'Petter Parker', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'karyawan', 'user-img.jpg', 1, '#083470', '#083470', 'on'),
('samuel', 3, 'Samuel Kim', '$2y$10$7vK9BmOYGWNtDSVy7gLVjun1dVP4pkPlWoh2Xx7j8moYez9GdI1fm', 'karyawan', NULL, 1, '#083470', '#083470', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kode_karyawan`);

--
-- Indexes for table `resume_buku`
--
ALTER TABLE `resume_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `kode_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resume_buku`
--
ALTER TABLE `resume_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
