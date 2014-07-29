-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2014 at 07:58 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `kd_admin` varchar(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama`) VALUES
('admin1', 'Prabowo'),
('admin2', 'Sepha');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tglLahir` date NOT NULL,
  `golongan` varchar(6) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `telp` varchar(12) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `alamat`, `tglLahir`, `golongan`, `jabatan`, `jk`, `foto`, `telp`) VALUES
('1090122111112', 'Anang Hermansyah', 'JL. Bukit Tinggi 28', '2012-11-21', '2', 'Rektor', 1, 'anang_hermansyah.jpg', '09800000000');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fk` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fk`) VALUES
(1, 'PSIK'),
(2, 'PSSI'),
(3, 'FKIP'),
(4, 'KEDOKTERAN');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gol` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `nama_gol`) VALUES
(1, 'IA'),
(2, 'IB'),
(3, 'IC'),
(4, 'ID'),
(5, 'IIA'),
(6, 'IIB'),
(7, 'IIC'),
(8, 'IID'),
(9, 'IIIA'),
(10, 'IIIB'),
(11, 'IIIC'),
(12, 'IIID'),
(13, 'IVA'),
(14, 'IVB'),
(15, 'IVC'),
(16, 'IVD');

-- --------------------------------------------------------

--
-- Table structure for table `jk`
--

CREATE TABLE IF NOT EXISTS `jk` (
  `id_jk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jk` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jk`
--

INSERT INTO `jk` (`id_jk`, `nama_jk`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `jns_matkul`
--

CREATE TABLE IF NOT EXISTS `jns_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pilihan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jns_matkul`
--

INSERT INTO `jns_matkul` (`id`, `nama_pilihan`) VALUES
(1, 'wajib'),
(2, 'pilihan'),
(3, 'tidak ada');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `level` tinyint(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pass`, `level`) VALUES
(1, '102410101064', '41da1b1dd459747ac5edebc216278121', 2),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(3, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(6, '1090122111112', '2326af735beba37279d41c7f0ab62e73', 3),
(7, '1090122111113', '61243c7b9a4022cb3f8dc3106767ed12', 3),
(8, '102410101054', 'b0baee9d279d34fa1dfd71aadb908c3f', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(12) NOT NULL,
  `thn_akademik` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` tinyint(1) NOT NULL,
  `sma` varchar(20) NOT NULL,
  `nm_ayah` varchar(20) NOT NULL,
  `nm_ibu` varchar(30) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `thn_akademik`, `tanggal`, `kelamin`, `sma`, `nm_ayah`, `nm_ibu`, `foto`) VALUES
('102410101054', 'anre', 'sadasldmaskl', 2010, '2014-05-05', 1, 'SMAN 2 JEMBER', 'Mr. Endrans', 'Mrs. Endoss', 'Koala3.jpg'),
('102410101064', 'Bangun Rizki A', '', 2010, '0000-00-00', 1, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `jumlah_sks` int(5) NOT NULL,
  `jns_matkul` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama`, `jumlah_sks`, `jns_matkul`) VALUES
(1, 'Teknologi Informasi', 3, 1),
(3, 'Agama', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `id_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `id_fk`) VALUES
(1, 'Progam Studi Teknik Informatika', 2),
(2, 'Progam Studi Sistem Informasi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruang` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thn_akademik1` varchar(20) NOT NULL,
  `thn_akademik2` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jns_semester` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `type_semester`
--

CREATE TABLE IF NOT EXISTS `type_semester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `nama_semester` varchar(30) NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `type_semester`
--

INSERT INTO `type_semester` (`id_semester`, `nama_semester`) VALUES
(1, 'ganjil'),
(2, 'genap'),
(3, 'pendek');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
