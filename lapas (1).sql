-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 11, 2022 at 03:57 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapas`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapelatihan`
--

CREATE TABLE `datapelatihan` (
  `id` int(11) NOT NULL,
  `kode_pel` char(8) NOT NULL,
  `noreg` char(8) NOT NULL,
  `nama_pel` varchar(50) NOT NULL,
  `jenis_pel` varchar(30) NOT NULL,
  `lama_pel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapelatihan`
--

INSERT INTO `datapelatihan` (`id`, `kode_pel`, `noreg`, `nama_pel`, `jenis_pel`, `lama_pel`) VALUES
(2, '07112201', '15102210', 'latihan senam', 'olahraga', '30 hari');

-- --------------------------------------------------------

--
-- Table structure for table `datapetugas`
--

CREATE TABLE `datapetugas` (
  `id` int(11) NOT NULL,
  `id_pet` char(8) NOT NULL,
  `nama_pet` varchar(50) NOT NULL,
  `alpet` varchar(50) NOT NULL,
  `telpet` varchar(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datapetugas`
--

INSERT INTO `datapetugas` (`id`, `id_pet`, `nama_pet`, `alpet`, `telpet`, `jabatan`, `username`, `password`, `level`) VALUES
(1, '01052101', 'tofan', 'jl. taman siswa', '082228371827', 'sipir', 'tofan', 'f74b9bf64d77b4f5f305e8dea2299c7be964863a', 'admin'),
(3, '09102202', 'petugas', 'mergangsan, yogyakarta', '082347374834', 'petugas', 'petugas', 'aa027e41edc3372c35646eb382168ecd7092de7a', 'petugas'),
(4, '08112201', 'kalapas', 'yogyakarta', '0847384726', 'Kepala Lapas', 'kalapas', 'c40036cd1d355c1e0136f79847e2f72bd5f47d22', 'kepala_lapas');

-- --------------------------------------------------------

--
-- Table structure for table `datasel`
--

CREATE TABLE `datasel` (
  `id` int(11) NOT NULL,
  `kode_sel` char(8) NOT NULL,
  `nama_sel` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `kapasitas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasel`
--

INSERT INTO `datasel` (`id`, `kode_sel`, `nama_sel`, `kategori`, `kapasitas`) VALUES
(1, '15102201', 'Sel Mawar', 'wanita', 120),
(2, '11122022', 'Se Melati', 'pria', 150);

-- --------------------------------------------------------

--
-- Table structure for table `datatahanan`
--

CREATE TABLE `datatahanan` (
  `id` int(11) NOT NULL,
  `id_tahanan` char(8) NOT NULL,
  `nama_tahanan` varchar(50) NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `nama_png` varchar(50) NOT NULL,
  `telp_png` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datatahanan`
--

INSERT INTO `datatahanan` (`id`, `id_tahanan`, `nama_tahanan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `agama`, `nama_png`, `telp_png`) VALUES
(3, '11102202', 'zidan', 'P', 'gunung kidul', '2022-10-18', 'mahasiswa', 'kristen', 'ronyyyy', '08238473627'),
(5, '11122022', 'Anggit Dwi Arifin', 'L', 'Kebumen', '2022-12-22', 'Mahasiswa', 'islam', 'Rony', '082347583848');

-- --------------------------------------------------------

--
-- Table structure for table `data_remisi`
--

CREATE TABLE `data_remisi` (
  `id` int(11) NOT NULL,
  `kode_rem` char(8) NOT NULL,
  `noreg` char(8) NOT NULL,
  `nama_rem` varchar(50) NOT NULL,
  `ket_rem` varchar(50) NOT NULL,
  `lama_rem` varchar(20) NOT NULL,
  `tgl_rem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_remisi`
--

INSERT INTO `data_remisi` (`id`, `kode_rem`, `noreg`, `nama_rem`, `ket_rem`, `lama_rem`, `tgl_rem`) VALUES
(1, '08112201', '15102210', 'remisi 1', 'keterangan tes', '30 hari', '2022-11-16'),
(2, '08112202', '15102210', 'remisi 2', 'tes', '2 hari', '2022-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `data_tahanan_keluar`
--

CREATE TABLE `data_tahanan_keluar` (
  `id` int(11) NOT NULL,
  `noreg` char(8) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `ket_keluar` varchar(30) NOT NULL,
  `id_pet` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tahanan_keluar`
--

INSERT INTO `data_tahanan_keluar` (`id`, `noreg`, `tgl_keluar`, `ket_keluar`, `id_pet`) VALUES
(2, '15102210', '2022-12-31', 'selesai\r\n', '09102202');

-- --------------------------------------------------------

--
-- Table structure for table `data_tahanan_masuk`
--

CREATE TABLE `data_tahanan_masuk` (
  `id` int(11) NOT NULL,
  `noreg` char(8) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_tahanan` char(8) NOT NULL,
  `kasus` varchar(100) NOT NULL,
  `kejadian` varchar(50) NOT NULL,
  `catatan` varchar(100) NOT NULL,
  `kode_sel` char(10) NOT NULL,
  `id_pet` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_tahanan_masuk`
--

INSERT INTO `data_tahanan_masuk` (`id`, `noreg`, `tgl_masuk`, `id_tahanan`, `kasus`, `kejadian`, `catatan`, `kode_sel`, `id_pet`) VALUES
(1, '15102210', '2022-10-17', '11102202', 'pencabulan', 'kejadian dirumah', 'tidak ada catatan', '15102201', '09102202');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapelatihan`
--
ALTER TABLE `datapelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapetugas`
--
ALTER TABLE `datapetugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datasel`
--
ALTER TABLE `datasel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatahanan`
--
ALTER TABLE `datatahanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_remisi`
--
ALTER TABLE `data_remisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tahanan_keluar`
--
ALTER TABLE `data_tahanan_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tahanan_masuk`
--
ALTER TABLE `data_tahanan_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapelatihan`
--
ALTER TABLE `datapelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datapetugas`
--
ALTER TABLE `datapetugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `datasel`
--
ALTER TABLE `datasel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datatahanan`
--
ALTER TABLE `datatahanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_remisi`
--
ALTER TABLE `data_remisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_tahanan_keluar`
--
ALTER TABLE `data_tahanan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_tahanan_masuk`
--
ALTER TABLE `data_tahanan_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
