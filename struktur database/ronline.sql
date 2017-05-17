-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2017 at 05:45 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ronline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbconfig`
--

CREATE TABLE `tbconfig` (
  `Cid` varchar(11) NOT NULL,
  `Cnama` varchar(20) NOT NULL,
  `Ctipe` varchar(10) NOT NULL,
  `Cisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbkelas`
--

CREATE TABLE `tbkelas` (
  `Kkode_kelas` varchar(10) NOT NULL,
  `Kkelas` varchar(3) NOT NULL,
  `Kjurusan` varchar(15) NOT NULL,
  `Kurutan` int(2) NOT NULL,
  `Kjumlah` int(11) NOT NULL DEFAULT '0',
  `Kkuota` int(3) NOT NULL DEFAULT '39',
  `Ktahun1` varchar(4) NOT NULL,
  `Ktahun2` int(4) NOT NULL,
  `Kstatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbmapel`
--

CREATE TABLE `tbmapel` (
  `Mkode_mapel` varchar(5) NOT NULL,
  `Mnama_mapel` varchar(100) NOT NULL,
  `Mkkm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbnilai`
--

CREATE TABLE `tbnilai` (
  `Nkode_nilai` varchar(5) NOT NULL,
  `Nnis` varchar(10) NOT NULL,
  `Nkode_kelas` varchar(5) NOT NULL,
  `Nkode_mapel` varchar(5) NOT NULL,
  `Nnilai_harian` int(3) NOT NULL,
  `Nnilai_uts` int(3) NOT NULL,
  `Nnilai_uas` int(3) NOT NULL,
  `Nnilai_akhir` int(3) NOT NULL,
  `Nnilai_praktek` int(3) NOT NULL,
  `Nsemester` varchar(3) NOT NULL,
  `Nnilai_sikap` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `Snis` varchar(10) NOT NULL,
  `Snisn` varchar(10) NOT NULL,
  `Snama` varchar(100) NOT NULL,
  `Stempat` varchar(100) NOT NULL,
  `Stanggal` date NOT NULL,
  `Sjk` varchar(1) NOT NULL,
  `Sagama` varchar(10) NOT NULL,
  `Skode_kelas` varchar(5) NOT NULL,
  `Salamat` varchar(100) NOT NULL,
  `Stelp` varchar(20) NOT NULL,
  `Sstatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbconfig`
--
ALTER TABLE `tbconfig`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `tbkelas`
--
ALTER TABLE `tbkelas`
  ADD PRIMARY KEY (`Kkode_kelas`);

--
-- Indexes for table `tbmapel`
--
ALTER TABLE `tbmapel`
  ADD PRIMARY KEY (`Mkode_mapel`);

--
-- Indexes for table `tbnilai`
--
ALTER TABLE `tbnilai`
  ADD PRIMARY KEY (`Nkode_nilai`);

--
-- Indexes for table `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`Snis`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
