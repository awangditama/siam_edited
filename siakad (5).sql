-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2014 at 02:13 PM
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
-- Table structure for table `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absensi` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kd_matkul` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id_absensi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `tanggal`, `kd_matkul`, `id_status`) VALUES
(1, '2014-07-03', 3, 1),
(3, '2014-07-02', 3, 1),
(4, '2014-07-02', 4, 1),
(5, '2014-07-03', 4, 1),
(6, '2014-07-17', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_detail`
--

CREATE TABLE IF NOT EXISTS `absensi_detail` (
  `id_absensi_detail` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `id_absensi` int(11) DEFAULT NULL,
  `keterangan` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_absensi_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `absensi_detail`
--

INSERT INTO `absensi_detail` (`id_absensi_detail`, `nim`, `id_absensi`, `keterangan`) VALUES
(2, '102410101054', 3, 1),
(3, '102410101054', 1, 1);

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
('1090122111112', 'Anang Hermansyah', 'JL. Bukit Tinggi 28', '2012-11-21', '2', 'Rektor', 1, 'anang_hermansyah.jpg', '09800000000'),
('124555', 'sandy saja', 'rusun nawa', '2014-07-01', '3', 'kapsek', 1, 'dw_2.png', '666666'),
('192111121211', 'ahmad dani', 'republik cinta', '2014-06-03', '6', 'Rektor', 1, 'Koala4.jpg', '0874121121');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_wali`
--

CREATE TABLE IF NOT EXISTS `dosen_wali` (
  `id_dw` int(11) NOT NULL AUTO_INCREMENT,
  `id_nip` varchar(20) NOT NULL,
  `id_nim` varchar(20) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_dw`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dosen_wali`
--

INSERT INTO `dosen_wali` (`id_dw`, `id_nip`, `id_nim`, `id_status`, `status`) VALUES
(4, '1090122111112', '102410101054', 1, 1),
(5, '192111121211', '102410101064', 1, 1);

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
-- Table structure for table `krs`
--

CREATE TABLE IF NOT EXISTS `krs` (
  `id_krs` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `id_penawaran_matkul` int(11) NOT NULL,
  `id_penawaran_matkul_detail` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_krs`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `krs`
--

INSERT INTO `krs` (`id_krs`, `nim`, `id_penawaran_matkul`, `id_penawaran_matkul_detail`, `id_status`, `status`) VALUES
(1, '102410101054', 3, 2, 1, 1),
(2, '102410101064', 3, 2, 1, 0),
(5, '102410101054', 4, 3, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `pass`, `level`) VALUES
(1, '102410101064', '41da1b1dd459747ac5edebc216278121', 2),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 1),
(3, '12345', '827ccb0eea8a706c4c34a16891f84e7b', 3),
(6, '1090122111112', 'c20ad4d76fe97759aa27a0c99bff6710', 3),
(7, '1090122111113', '61243c7b9a4022cb3f8dc3106767ed12', 3),
(8, '102410101054', 'a684eceee76fc522773286a895bc8436', 2),
(9, '192111121211', '6512bd43d9caa6e02c990b0a82652dca', 3),
(10, '124555', '827ccb0eea8a706c4c34a16891f84e7b', 3);

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
('102410101054', 'anre basokoro', 'sadasldmaskl', 2010, '2014-05-05', 1, 'SMAN 2 JEMBER', 'Mr. Endrans', 'Mrs. Endoss', 'Koala3.jpg'),
('102410101064', 'Bangun Rizki A', '', 2010, '0000-00-00', 1, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `kd_matkul` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jumlah_sks` int(5) NOT NULL,
  `jns_matkul` tinyint(1) NOT NULL,
  PRIMARY KEY (`kd_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kd_matkul`, `nama`, `jumlah_sks`, `jns_matkul`) VALUES
('BSI01', 'Basisdata', 3, 1),
('CSI01', 'Teknologi Informasi', 3, 1),
('CSI02', 'Agama', 3, 3),
('CSI03', 'Pemrograman Berorientasi Objek 1', 4, 1),
('CSI05', 'Pemrograman Berorientasi Objek 2', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_detail`
--

CREATE TABLE IF NOT EXISTS `nilai_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(12) NOT NULL,
  `kd_matkul_detail` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_matkul`
--

CREATE TABLE IF NOT EXISTS `penawaran_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_matkul` varchar(11) NOT NULL,
  `kd_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `v_penawaran_matkul` (`id`,`kd_matkul`,`kd_status`),
  UNIQUE KEY `i_penawaran_matkul` (`id`,`kd_matkul`,`kd_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penawaran_matkul`
--

INSERT INTO `penawaran_matkul` (`id`, `kd_matkul`, `kd_status`) VALUES
(1, 'CSI01', 2),
(2, 'CSI02', 2),
(3, 'BSI01', 1),
(4, 'CSI03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_matkul_detail`
--

CREATE TABLE IF NOT EXISTS `penawaran_matkul_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas` tinytext NOT NULL,
  `jumlah` int(5) NOT NULL,
  `ruang` int(11) NOT NULL,
  `kd_waktu` int(11) NOT NULL,
  `hari` varchar(12) NOT NULL,
  `id_penawaran_matkul` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `penawaran_matkul_detail`
--

INSERT INTO `penawaran_matkul_detail` (`id`, `kelas`, `jumlah`, `ruang`, `kd_waktu`, `hari`, `id_penawaran_matkul`, `id_status`) VALUES
(2, 'A', 50, 1, 1, 'Senin', 3, 1),
(3, 'A', 50, 2, 2, 'Senin', 4, 1),
(4, 'B', 50, 2, 1, 'Senin', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran_matkul_dosen`
--

CREATE TABLE IF NOT EXISTS `penawaran_matkul_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) NOT NULL,
  `id_penawaran_matkul` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `penawaran_matkul_dosen`
--

INSERT INTO `penawaran_matkul_dosen` (`id`, `nip`, `id_penawaran_matkul`) VALUES
(6, '1090122111112', 1),
(7, '192111121211', 2),
(8, '1090122111112', 3),
(9, '1090122111112', 4),
(10, '1090122111112', 5),
(11, '1090122111112', 6),
(12, '1090122111112', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III'),
(4, 'IV'),
(5, 'kkm');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thn_akademik1` varchar(20) NOT NULL,
  `thn_akademik2` varchar(20) NOT NULL,
  `masa_krs1` date NOT NULL,
  `masa_krs2` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jns_semester` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `thn_akademik1`, `thn_akademik2`, `masa_krs1`, `masa_krs2`, `status`, `jns_semester`) VALUES
(1, '2010', '2011', '2014-06-16', '2014-06-28', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_dosen_wali`
--
CREATE TABLE IF NOT EXISTS `tb_dosen_wali` (
`id_dw` int(11)
,`id_nip` varchar(20)
,`id_nim` varchar(20)
,`id_status` int(11)
,`status` tinyint(4)
,`nm_mhs` varchar(20)
,`nm_dosen` varchar(20)
,`thn_akademik1` varchar(20)
,`thn_akademik2` varchar(20)
,`nama_semester` varchar(30)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_persetujuan_krs`
--
CREATE TABLE IF NOT EXISTS `tb_persetujuan_krs` (
`nim_mhs` varchar(12)
,`nama` varchar(20)
,`id_dw` int(11)
,`status_persetujuan_dosen_wali` tinyint(4)
,`id_status_dw` int(11)
,`id_status_krs` int(11)
,`status_persetujuan_mahasiswa` tinyint(1)
,`nip` varchar(20)
,`jumlah` decimal(32,0)
);
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

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE IF NOT EXISTS `user_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ip` varchar(20) NOT NULL,
  `jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`id`, `id_ip`, `jam`, `status`) VALUES
(7, 'admin1', '2014-06-17 11:18:38', 0),
(8, 'admin1', '2014-06-17 11:21:31', 0),
(9, 'admin1', '2014-06-17 11:22:06', 0),
(10, 'admin1', '2014-06-17 12:18:04', 0),
(11, 'admin1', '2014-06-17 12:18:17', 0),
(12, '102410101064', '2014-06-17 12:18:54', 0),
(13, 'admin1', '2014-06-17 12:30:23', 0),
(14, '102410101064', '2014-06-17 12:30:38', 0),
(15, '102410101064', '2014-06-17 12:35:06', 0),
(16, 'admin1', '2014-06-17 12:39:55', 0),
(17, '102410101064', '2014-06-17 12:42:47', 0),
(18, '102410101054', '2014-06-17 12:43:51', 0),
(19, '102410101054', '2014-06-17 12:46:17', 0),
(20, '12345', '2014-06-17 12:47:22', 0),
(21, '1090122111112', '2014-06-17 12:49:15', 0),
(22, '102410101064', '2014-06-17 12:49:25', 0),
(23, '102410101054', '2014-06-17 12:50:18', 0),
(24, 'admin1', '2014-06-17 12:50:46', 0),
(25, '102410101054', '2014-06-17 12:52:21', 0),
(26, 'admin1', '2014-06-18 15:40:26', 0),
(27, 'admin1', '2014-06-18 15:42:17', 0),
(28, '102410101054', '2014-06-18 16:16:34', 0),
(29, 'admin1', '2014-06-19 07:16:27', 0),
(30, '102410101054', '2014-06-19 08:58:13', 0),
(31, 'admin1', '2014-06-19 09:01:43', 0),
(32, 'admin1', '2014-06-20 07:08:17', 0),
(33, '102410101054', '2014-06-20 13:20:20', 0),
(34, 'admin1', '2014-06-20 13:09:19', 0),
(35, '102410101054', '2014-06-20 13:20:20', 0),
(36, 'admin1', '2014-06-20 13:26:21', 0),
(37, '102410101054', '2014-06-20 13:27:22', 0),
(38, 'admin1', '2014-06-20 13:27:49', 0),
(39, '102410101054', '2014-06-20 13:39:00', 0),
(40, 'admin1', '2014-06-20 13:39:36', 0),
(41, '102410101054', '2014-06-20 15:18:58', 0),
(42, '102410101064', '2014-06-23 13:24:33', 0),
(43, '102410101054', '2014-06-20 23:16:49', 0),
(44, 'admin1', '2014-06-20 23:23:24', 0),
(45, '102410101054', '2014-06-20 23:26:13', 0),
(46, '102410101054', '2014-06-23 02:15:43', 0),
(47, 'admin1', '2014-06-23 08:43:55', 0),
(48, '102410101054', '2014-06-23 09:00:35', 0),
(49, 'admin1', '2014-06-23 09:13:35', 0),
(50, '102410101054', '2014-06-23 09:53:07', 0),
(51, 'admin1', '2014-06-23 09:53:21', 0),
(52, '102410101054', '2014-06-23 09:53:32', 0),
(53, '12345', '2014-06-23 13:09:57', 0),
(54, 'admin1', '2014-06-23 13:10:20', 0),
(55, 'admin1', '2014-06-23 13:20:10', 0),
(56, 'admin1', '2014-06-23 13:22:06', 0),
(57, 'admin1', '2014-06-23 13:25:49', 0),
(58, '1090122111112', '2014-06-23 13:41:51', 0),
(59, '102410101064', '2014-06-23 13:47:01', 0),
(60, '102410101054', '2014-06-23 14:10:52', 0),
(61, '1090122111112', '2014-06-23 14:14:32', 0),
(62, '1090122111112', '2014-06-23 23:43:05', 0),
(63, '1090122111112', '2014-06-23 23:43:05', 0),
(64, 'admin1', '2014-06-24 22:41:54', 0),
(65, '102410101054', '2014-06-24 23:07:38', 0),
(66, '1090122111112', '2014-06-24 23:07:56', 0),
(67, '102410101054', '2014-06-24 23:08:14', 0),
(68, 'admin1', '2014-06-24 23:09:11', 0),
(69, 'admin1', '2014-07-05 03:51:06', 0),
(70, 'admin1', '2014-07-05 03:51:06', 0),
(71, 'admin1', '2014-07-05 03:51:06', 0),
(72, '102410101054', '2014-07-05 03:51:48', 0),
(73, '1090122111112', '2014-07-05 03:52:10', 0),
(74, '102410101054', '2014-07-05 04:01:44', 0),
(75, 'admin1', '2014-07-06 05:31:42', 0),
(76, 'admin1', '2014-07-06 05:31:42', 0),
(77, 'admin1', '2014-07-06 05:31:42', 0),
(78, 'admin1', '2014-07-06 05:31:42', 0),
(79, 'admin1', '2014-07-07 00:52:56', 0),
(80, 'admin1', '2014-07-07 00:52:56', 0),
(81, 'admin1', '2014-07-07 00:52:56', 0),
(82, '102410101054', '2014-07-07 00:53:20', 0),
(83, 'admin1', '2014-07-07 02:28:59', 0),
(84, 'admin1', '2014-07-08 01:18:39', 0),
(85, 'admin1', '2014-07-08 01:18:39', 0),
(86, '102410101054', '2014-07-08 01:18:56', 0),
(87, 'admin1', '2014-07-08 04:23:34', 0),
(88, 'admin1', '2014-07-09 09:46:21', 0),
(89, '102410101054', '2014-07-09 09:50:54', 0),
(90, '1090122111112', '2014-07-29 04:12:01', 0),
(91, 'admin1', '2014-07-10 03:03:05', 0),
(92, 'admin1', '2014-07-10 03:05:53', 0),
(93, '102410101054', '2014-07-10 03:06:28', 0),
(94, 'admin1', '2014-07-15 04:06:57', 0),
(95, 'admin1', '2014-07-15 04:06:57', 0),
(96, 'admin1', '2014-07-15 04:06:57', 0),
(97, 'admin1', '2014-07-15 04:06:57', 0),
(98, 'admin1', '2014-07-29 04:17:17', 0),
(99, '1090122111112', '2014-07-29 04:12:01', 0),
(100, 'admin1', '2014-07-29 04:17:17', 0),
(101, '102410101054', '2014-07-29 04:17:55', 0),
(102, '102410101054', '2014-07-29 04:18:20', 0),
(103, '1090122111112', '2014-07-31 14:03:28', 0),
(104, 'admin1', '2014-07-29 14:31:00', 0),
(105, '102410101054', '2014-07-29 14:32:10', 0),
(106, '1090122111112', '2014-07-31 14:03:28', 0),
(107, '1090122111112', '2014-07-31 14:03:28', 0),
(108, 'admin1', '2014-07-30 01:55:06', 0),
(109, '1090122111112', '2014-07-31 14:03:28', 0),
(110, '1090122111112', '2014-07-31 14:03:28', 0),
(111, '1090122111112', '2014-07-31 14:03:28', 0),
(112, 'admin1', '2014-07-31 14:04:17', 0),
(113, '192111121211', '2014-07-31 14:04:39', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_krs_setujui`
--
CREATE TABLE IF NOT EXISTS `v_krs_setujui` (
`id` int(11)
,`kd_matkul` varchar(11)
,`nama` varchar(40)
,`jumlah_sks` int(5)
,`nama_pilihan` varchar(20)
,`nama_semester` varchar(30)
,`id_semester` int(11)
,`id_krs` int(11)
,`nim` varchar(12)
,`id_penawaran_matkul` int(11)
,`id_penawaran_matkul_detail` int(11)
,`id_status` int(11)
,`status` tinyint(1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penawaran_matkul`
--
CREATE TABLE IF NOT EXISTS `v_penawaran_matkul` (
`id` int(11)
,`kd_matkul` varchar(11)
,`nama` varchar(40)
,`jumlah_sks` int(5)
,`nama_pilihan` varchar(20)
,`nama_semester` varchar(30)
,`id_semester` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penawaran_matkul_detail`
--
CREATE TABLE IF NOT EXISTS `v_penawaran_matkul_detail` (
`id_pm` int(11)
,`kd_matkul` varchar(11)
,`id_penawaran_matkul` int(11)
,`nama_ruang` varchar(30)
,`waktu1` time
,`waktu2` time
,`jumlah` int(5)
,`kelas` tinytext
,`id` int(11)
,`hari` varchar(12)
,`nama` varchar(40)
,`id_status` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penawaran_matkul_dosen`
--
CREATE TABLE IF NOT EXISTS `v_penawaran_matkul_dosen` (
`id` int(11)
,`nip` varchar(20)
,`id_penawaran_matkul` int(11)
,`nama` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penawaran_matkul_dosen_detail`
--
CREATE TABLE IF NOT EXISTS `v_penawaran_matkul_dosen_detail` (
`id` int(11)
,`nama` varchar(40)
,`nama_semester` varchar(30)
,`dosen` text
,`jumlah_sks` int(5)
,`nama_pilihan` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tampil_absensi`
--
CREATE TABLE IF NOT EXISTS `v_tampil_absensi` (
`nim` varchar(12)
,`id_penawaran_matkul_detail` int(11)
,`id_status` int(11)
,`status` tinyint(1)
,`nama` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE IF NOT EXISTS `waktu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu1` time NOT NULL,
  `waktu2` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id`, `waktu1`, `waktu2`) VALUES
(1, '07:00:00', '08:40:00'),
(2, '08:50:00', '10:00:00');

-- --------------------------------------------------------

--
-- Structure for view `tb_dosen_wali`
--
DROP TABLE IF EXISTS `tb_dosen_wali`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_dosen_wali` AS select `dosen_wali`.`id_dw` AS `id_dw`,`dosen_wali`.`id_nip` AS `id_nip`,`dosen_wali`.`id_nim` AS `id_nim`,`dosen_wali`.`id_status` AS `id_status`,`dosen_wali`.`status` AS `status`,`mahasiswa`.`nama` AS `nm_mhs`,`dosen`.`nama` AS `nm_dosen`,`status`.`thn_akademik1` AS `thn_akademik1`,`status`.`thn_akademik2` AS `thn_akademik2`,`type_semester`.`nama_semester` AS `nama_semester` from ((((`dosen_wali` join `mahasiswa`) join `dosen`) join `status`) join `type_semester`) where ((`dosen_wali`.`id_nip` = `dosen`.`nip`) and (`dosen_wali`.`id_nim` = `mahasiswa`.`nim`) and (`dosen_wali`.`id_status` = `status`.`id`) and (`status`.`jns_semester` = `type_semester`.`id_semester`));

-- --------------------------------------------------------

--
-- Structure for view `tb_persetujuan_krs`
--
DROP TABLE IF EXISTS `tb_persetujuan_krs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tb_persetujuan_krs` AS select `krs`.`nim` AS `nim_mhs`,`mahasiswa`.`nama` AS `nama`,`dosen_wali`.`id_dw` AS `id_dw`,`dosen_wali`.`status` AS `status_persetujuan_dosen_wali`,`dosen_wali`.`id_status` AS `id_status_dw`,`krs`.`id_status` AS `id_status_krs`,`krs`.`status` AS `status_persetujuan_mahasiswa`,`dosen_wali`.`id_nip` AS `nip`,sum(`matkul`.`jumlah_sks`) AS `jumlah` from ((((`krs` join `dosen_wali`) join `penawaran_matkul`) join `matkul`) join `mahasiswa`) where ((`krs`.`nim` = `dosen_wali`.`id_nim`) and (`penawaran_matkul`.`kd_matkul` = `matkul`.`kd_matkul`) and (`penawaran_matkul`.`id` = `krs`.`id_penawaran_matkul`) and (`dosen_wali`.`id_nim` = `mahasiswa`.`nim`)) group by `krs`.`nim`;

-- --------------------------------------------------------

--
-- Structure for view `v_krs_setujui`
--
DROP TABLE IF EXISTS `v_krs_setujui`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_krs_setujui` AS select `v_penawaran_matkul`.`id` AS `id`,`v_penawaran_matkul`.`kd_matkul` AS `kd_matkul`,`v_penawaran_matkul`.`nama` AS `nama`,`v_penawaran_matkul`.`jumlah_sks` AS `jumlah_sks`,`v_penawaran_matkul`.`nama_pilihan` AS `nama_pilihan`,`v_penawaran_matkul`.`nama_semester` AS `nama_semester`,`v_penawaran_matkul`.`id_semester` AS `id_semester`,`krs`.`id_krs` AS `id_krs`,`krs`.`nim` AS `nim`,`krs`.`id_penawaran_matkul` AS `id_penawaran_matkul`,`krs`.`id_penawaran_matkul_detail` AS `id_penawaran_matkul_detail`,`krs`.`id_status` AS `id_status`,`krs`.`status` AS `status` from (`v_penawaran_matkul` join `krs`) where (`v_penawaran_matkul`.`id` = `krs`.`id_penawaran_matkul`);

-- --------------------------------------------------------

--
-- Structure for view `v_penawaran_matkul`
--
DROP TABLE IF EXISTS `v_penawaran_matkul`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penawaran_matkul` AS select `penawaran_matkul`.`id` AS `id`,`penawaran_matkul`.`kd_matkul` AS `kd_matkul`,`matkul`.`nama` AS `nama`,`matkul`.`jumlah_sks` AS `jumlah_sks`,`jns_matkul`.`nama_pilihan` AS `nama_pilihan`,`type_semester`.`nama_semester` AS `nama_semester`,`type_semester`.`id_semester` AS `id_semester` from (((`penawaran_matkul` join `type_semester`) join `matkul`) join `jns_matkul`) where ((`penawaran_matkul`.`kd_matkul` = `matkul`.`kd_matkul`) and (`penawaran_matkul`.`kd_status` = `type_semester`.`id_semester`) and (`jns_matkul`.`id` = `matkul`.`jns_matkul`));

-- --------------------------------------------------------

--
-- Structure for view `v_penawaran_matkul_detail`
--
DROP TABLE IF EXISTS `v_penawaran_matkul_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penawaran_matkul_detail` AS select `penawaran_matkul`.`id` AS `id_pm`,`penawaran_matkul`.`kd_matkul` AS `kd_matkul`,`penawaran_matkul_detail`.`id_penawaran_matkul` AS `id_penawaran_matkul`,`ruang`.`nama_ruang` AS `nama_ruang`,`waktu`.`waktu1` AS `waktu1`,`waktu`.`waktu2` AS `waktu2`,`penawaran_matkul_detail`.`jumlah` AS `jumlah`,`penawaran_matkul_detail`.`kelas` AS `kelas`,`penawaran_matkul_detail`.`id` AS `id`,`penawaran_matkul_detail`.`hari` AS `hari`,`matkul`.`nama` AS `nama`,`penawaran_matkul_detail`.`id_status` AS `id_status` from ((((`penawaran_matkul_detail` join `ruang`) join `waktu`) join `penawaran_matkul`) join `matkul`) where ((`penawaran_matkul`.`id` = `penawaran_matkul_detail`.`id_penawaran_matkul`) and (`penawaran_matkul_detail`.`ruang` = `ruang`.`id`) and (`waktu`.`id` = `penawaran_matkul_detail`.`kd_waktu`) and (`matkul`.`kd_matkul` = `penawaran_matkul`.`kd_matkul`));

-- --------------------------------------------------------

--
-- Structure for view `v_penawaran_matkul_dosen`
--
DROP TABLE IF EXISTS `v_penawaran_matkul_dosen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penawaran_matkul_dosen` AS select `penawaran_matkul_dosen`.`id` AS `id`,`penawaran_matkul_dosen`.`nip` AS `nip`,`penawaran_matkul_dosen`.`id_penawaran_matkul` AS `id_penawaran_matkul`,`dosen`.`nama` AS `nama` from ((`penawaran_matkul` join `penawaran_matkul_dosen`) join `dosen`) where ((`penawaran_matkul`.`id` = `penawaran_matkul_dosen`.`id_penawaran_matkul`) and (`penawaran_matkul_dosen`.`nip` = `dosen`.`nip`));

-- --------------------------------------------------------

--
-- Structure for view `v_penawaran_matkul_dosen_detail`
--
DROP TABLE IF EXISTS `v_penawaran_matkul_dosen_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penawaran_matkul_dosen_detail` AS select `v_penawaran_matkul`.`id` AS `id`,`v_penawaran_matkul`.`nama` AS `nama`,`v_penawaran_matkul`.`nama_semester` AS `nama_semester`,group_concat(`v_penawaran_matkul_dosen`.`nama` order by `v_penawaran_matkul_dosen`.`id` ASC separator ',') AS `dosen`,`v_penawaran_matkul`.`jumlah_sks` AS `jumlah_sks`,`v_penawaran_matkul`.`nama_pilihan` AS `nama_pilihan` from (`v_penawaran_matkul` join `v_penawaran_matkul_dosen`) where (`v_penawaran_matkul`.`id` = `v_penawaran_matkul_dosen`.`id_penawaran_matkul`) group by `v_penawaran_matkul`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `v_tampil_absensi`
--
DROP TABLE IF EXISTS `v_tampil_absensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tampil_absensi` AS select `krs`.`nim` AS `nim`,`krs`.`id_penawaran_matkul_detail` AS `id_penawaran_matkul_detail`,`krs`.`id_status` AS `id_status`,`krs`.`status` AS `status`,`mahasiswa`.`nama` AS `nama` from ((`krs` join `penawaran_matkul_detail`) join `mahasiswa`) where ((`krs`.`id_penawaran_matkul_detail` = `penawaran_matkul_detail`.`id`) and (`mahasiswa`.`nim` = `krs`.`nim`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
