-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 09:32 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(10) NOT NULL,
  `jenis_identitas` varchar(30) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `jenis_identitas`, `no_identitas`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(1, 'KTP', '2171040612889001', 'Dedi', 'Batam', '2017-04-05', 'Laki - Laki', 'Batam Center', '2147483647'),
(3, 'PASSPORT', '213123', 'qqweqweqwe', 'qeweq', '2017-05-17', 'Perempuan', 'qwweew', '12312'),
(4, 'SIM', '167890', 'erdtfghjk', 'wertyu', '2017-07-01', 'Laki - Laki', 'ertgyuhji', '345678'),
(5, 'KTP / Kartu Pelajar', '9999999', '99999999', '99999999', '2017-07-15', 'Laki - Laki', '999999', '99999xxxxx'),
(6, 'KTP / Kartu Pelajar', '221231213312', 'Testing', 'Batam', '2017-07-12', 'Laki - Laki', 'Batam', '080999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `biaya`) VALUES
(1, 'Paket Umum 1 Bulan', 175000),
(2, 'Paket Umum 3 Bulan', 325000),
(3, 'Paket Umum 6 Bulan', 600000),
(4, 'Paket Couple 1 Bulan', 100000),
(5, 'Paket Couple 3 Bulan', 275000),
(6, 'Paket Couple 6 Bulan', 500000),
(7, 'Paket Pelajar 1 Bulan', 100000),
(8, 'Paket Pelajar 3 Bulan', 250000),
(9, 'Paket Pelajar 6 Bulan', 400000),
(14, 'WWWWWWW', 333333),
(15, 'pppp', 999);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(10) NOT NULL,
  `no_card` int(5) NOT NULL,
  `id_anggota` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `tgl_expired` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `no_card`, `id_anggota`, `id_kategori`, `tgl_daftar`, `tgl_expired`, `keterangan`) VALUES
(1, 3029, 4, 2, '2017-01-14', '2017-04-14', 'rtyuio'),
(3, 3333, 1, 1, '2017-05-18', '2017-06-07', 'ghj'),
(5, 77777, 4, 3, '2017-07-01', '2017-07-15', 'rtgyh'),
(6, 56666, 6, 1, '2017-07-11', '2017-07-05', 'ccccc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_member` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `pembayaran` int(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_member`, `id_kategori`, `nama_anggota`, `pembayaran`, `tgl_transaksi`, `user_id`) VALUES
(18, 3, 2, 'Dedi', 325000, '2017-07-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `no_hp`, `gambar`) VALUES
(1, 'admin', 'admin', 'Juni', '08xxxx', 'gambar/user.png'),
(3, 'tes lagi', 'tes lagi', 'tes lagi', 'teslagi', 'gambar/6768666-1080p-wallpapers.jpg'),
(4, 'coba3', 'coba', 'dicoba lagi', '56789', 'gambar/Sudung Belaja.JPG'),
(5, '9999999999', '99999999', '999999', '9999999', 'gambar/3d-abstract_widewallpaper_bright-blue-sky_2'),
(6, '888999', '999999', '999999', '99999', 'gambar/0-mountain.jpg'),
(7, 'GGGGG', 'GGGGG', 'GGGGG', 'GGGGG', 'gambar/0-mountain.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
