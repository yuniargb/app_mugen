-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 06:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_mugen`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_pesan`
--

CREATE TABLE `a_pesan` (
  `id_a_pesan` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_a_produk` int(11) NOT NULL,
  `qty_a_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `a_produk`
--

CREATE TABLE `a_produk` (
  `id_a_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_warna` int(11) NOT NULL,
  `stok_a_produk` int(11) NOT NULL,
  `harga_a_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_pelanggan`
--

CREATE TABLE `m_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL,
  `no_telp_pelanggan` varchar(15) NOT NULL,
  `tanggal_lahir_pelanggan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_produk`
--

CREATE TABLE `m_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `bahan_produk` varchar(30) NOT NULL,
  `berat_produk` varchar(30) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` text NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_size`
--

CREATE TABLE `m_size` (
  `id_size` int(11) NOT NULL,
  `nama_size` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_slider`
--

CREATE TABLE `m_slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(20) NOT NULL,
  `deskripsi_slider` varchar(30) NOT NULL,
  `gambar_slider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_warna`
--

CREATE TABLE `m_warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_bayar`
--

CREATE TABLE `t_bayar` (
  `id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bukti_bayar` text NOT NULL,
  `bank_bayar` varchar(10) NOT NULL,
  `bank_tujuan_bayar` varchar(10) NOT NULL,
  `no_telp_bayar` int(11) NOT NULL,
  `nama_bayar` int(11) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE `t_pesan` (
  `id_pesan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `alamat_tujuan_pesan` int(11) NOT NULL,
  `kurir_pesan` varchar(10) NOT NULL,
  `ongkir_pesan` int(11) NOT NULL,
  `paket_pesan` varchar(20) NOT NULL,
  `total_pesan` int(11) NOT NULL,
  `status_pesan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(10) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `no_telp_user` int(11) NOT NULL,
  `alamat_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_pesan`
--
ALTER TABLE `a_pesan`
  ADD PRIMARY KEY (`id_a_pesan`);

--
-- Indexes for table `a_produk`
--
ALTER TABLE `a_produk`
  ADD PRIMARY KEY (`id_a_produk`);

--
-- Indexes for table `m_kategori`
--
ALTER TABLE `m_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `m_produk`
--
ALTER TABLE `m_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `m_size`
--
ALTER TABLE `m_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `m_slider`
--
ALTER TABLE `m_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `m_warna`
--
ALTER TABLE `m_warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- Indexes for table `t_bayar`
--
ALTER TABLE `t_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `t_pesan`
--
ALTER TABLE `t_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_pesan`
--
ALTER TABLE `a_pesan`
  MODIFY `id_a_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a_produk`
--
ALTER TABLE `a_produk`
  MODIFY `id_a_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_kategori`
--
ALTER TABLE `m_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pelanggan`
--
ALTER TABLE `m_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_produk`
--
ALTER TABLE `m_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_size`
--
ALTER TABLE `m_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_slider`
--
ALTER TABLE `m_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_warna`
--
ALTER TABLE `m_warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_bayar`
--
ALTER TABLE `t_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pesan`
--
ALTER TABLE `t_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
