-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 07:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depnaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pelatihan`
--

CREATE TABLE `detail_pelatihan` (
  `Id_detail` int(3) NOT NULL,
  `Id_lembaga` int(3) NOT NULL,
  `Id_pelatihan` int(3) NOT NULL,
  `Id_peserta` int(3) NOT NULL,
  `status` varchar(25) NOT NULL,
  `sertifikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pelatihan`
--

INSERT INTO `detail_pelatihan` (`Id_detail`, `Id_lembaga`, `Id_pelatihan`, `Id_peserta`, `status`, `sertifikat`) VALUES
(70, 37, 34, 67, 'lulus', 'gambar rahasia.jpg'),
(71, 36, 32, 67, 'tidak', ''),
(72, 37, 33, 67, 'lulus', '10.JPG'),
(73, 36, 32, 66, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `Id_lembaga` int(3) NOT NULL,
  `Id_user` int(3) NOT NULL,
  `Kode_lembaga` varchar(4) NOT NULL,
  `Nama_lembaga` varchar(50) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`Id_lembaga`, `Id_user`, `Kode_lembaga`, `Nama_lembaga`, `Alamat`) VALUES
(36, 141, 'L001', 'LPBK SEOUL', 'Jl. Raya Celeng Lohbener No. 32 Blok Jembatan Merah Kec. Lohbener Kab. Indramayu 45252'),
(37, 142, 'L002', 'LKP Pelita Modiste', 'Jl. Basuki Rahmat â€“ Haurgeulis, Indramayu'),
(38, 149, 'L003', 'LPBK Bahasa Inggris', 'jl. Lohbener Lama nomer 8 Celeng');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `Id_pelatihan` int(3) NOT NULL,
  `Id_lembaga` int(3) NOT NULL,
  `Nama_pelatihan` varchar(50) NOT NULL,
  `Kode_pelatihan` varchar(4) NOT NULL,
  `Kuota` int(3) NOT NULL,
  `Alamat` text NOT NULL,
  `Deskripsi` text NOT NULL,
  `Tgl_mulai` date NOT NULL,
  `Tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`Id_pelatihan`, `Id_lembaga`, `Nama_pelatihan`, `Kode_pelatihan`, `Kuota`, `Alamat`, `Deskripsi`, `Tgl_mulai`, `Tgl_akhir`) VALUES
(32, 36, 'Pelatihan Bahasa Korea', 'P001', 100, 'celeng', 'Jl. Raya Celeng Lohbener No. 32 Blok Jembatan Merah Kec. Lohbener Kab. Indramayu 45252', '2017-01-01', '2017-01-01'),
(33, 37, 'Pelatihan Menjahit', 'P002', 39, 'Jl. Basuki Rahmat â€“ Haurgeulis, Indramayu', 'Menciptakan lulusan dari pelatihan menjahit yang berkualitas di bidang dunia Texttil', '2000-09-09', '2000-09-09'),
(34, 37, 'Pelatihan Menjahit Sandal', 'P003', 0, 'Juntinyuat, Kabupaten Indramayu, Jawa Barat 45282', 'Memudahkan Masyrakat Untuk bisa mengsol sepatu sendiri dimanapun dan kapanpun', '2018-01-04', '2018-01-10'),
(35, 38, 'Pelatihan Bahasa Inggris', 'P004', 20, 'jembatan merah', 'untuk memperlancar toefl', '2018-01-03', '2018-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `Id_peserta` int(11) NOT NULL,
  `Id_user` int(11) NOT NULL,
  `Nama_lengkap` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(14) NOT NULL,
  `Jenis_kelamin` varchar(10) NOT NULL,
  `Agama` varchar(8) NOT NULL,
  `Alamat` text NOT NULL,
  `Tempat_lahir` varchar(25) NOT NULL,
  `Tanggal_lahir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`Id_peserta`, `Id_user`, `Nama_lengkap`, `Email`, `Telepon`, `Jenis_kelamin`, `Agama`, `Alamat`, `Tempat_lahir`, `Tanggal_lahir`) VALUES
(66, 108, 'Jakaria', 'Jakariaaa27@gmail.com', '08312281441', 'Laki-laki', 'Islam', 'Jalan Raya Luwung Blok Mlabang Wetan Rt 01 Rw 04 Desa Luwung Kecamatan Mundu Kabupaten Cirebon 45173', 'Cirebon', '1970-01-01'),
(67, 113, 'Rizky Alief Satria', 'RizkyAliefSatria@gmail.com', '089669486451', 'Laki-laki', 'Islam', 'Indramayu', 'indramayu', '1997-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_user` int(8) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_user`, `username`, `password`, `level`) VALUES
(142, 'L002', 'L002', 'petugas'),
(141, 'L001', 'L001', 'petugas'),
(22, 'depnaker', 'dep123', 'admin'),
(113, 'Rizky88', '123', 'peserta'),
(149, 'L003', 'L003', 'petugas'),
(108, 'jaka', '123', 'peserta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pelatihan`
--
ALTER TABLE `detail_pelatihan`
  ADD PRIMARY KEY (`Id_detail`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`Id_lembaga`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`Id_pelatihan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`Id_peserta`),
  ADD KEY `Id_user` (`Id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pelatihan`
--
ALTER TABLE `detail_pelatihan`
  MODIFY `Id_detail` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `Id_lembaga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `Id_pelatihan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `Id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
