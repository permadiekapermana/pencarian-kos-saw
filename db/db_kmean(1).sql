-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 23, 2020 at 04:43 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kmean`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(4) NOT NULL,
  `id_tempat` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_tempat`, `nama`, `foto`) VALUES
(4, 'KS.003', 'Tempat Tidur', '46ertiga.jpg'),
(5, 'KS.004', '', ''),
(6, 'KS.001', 'Dekat Dengan Jalan Raya', '63Screenshot (11).png'),
(7, 'KS.002', 'Ruang Tamu bersih', '25Screenshot (13).png');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fas` varchar(5) NOT NULL,
  `fas_m` double NOT NULL,
  `fas_s` double NOT NULL,
  `fas_nilai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fas`, `fas_m`, `fas_s`, `fas_nilai`) VALUES
('F.001', 0, 0.2, 1),
('F.002', 0.21, 0.4, 2),
('F.003', 0.41, 0.6, 3),
('F.004', 0.61, 0.8, 4),
('F.005', 0.81, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_harga` varchar(5) NOT NULL,
  `harga_m` int(9) NOT NULL,
  `harga_s` int(9) NOT NULL,
  `harga_nilai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_harga`, `harga_m`, `harga_s`, `harga_nilai`) VALUES
('H.001', 1500000, 3000000, 1),
('H.002', 700000, 1499999, 2),
('H.003', 550000, 699999, 3),
('H.004', 400000, 549999, 4),
('H.005', 300000, 399999, 5);

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_histori` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sesicari` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_histori`, `ip`, `tanggal`, `sesicari`) VALUES
(49, '192.168.100.2', '2020-02-22 04:27:09', '84688871dd7a3b1c06cfce52ad7f4df446f75523'),
(50, '192.168.100.2', '2020-02-22 04:27:58', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(51, '192.168.100.2', '2020-02-22 04:56:21', '0debfd879da676575799bb624bc54da912c00ed1'),
(52, '192.168.100.3', '2020-02-23 12:09:14', '73d03713bc57d3d603a48866682e942af5ee169d'),
(53, '192.168.100.3', '2020-02-23 12:09:33', '11b1181da16a041c3e99c6ddd68f1c9ff98be81a'),
(54, '192.168.100.3', '2020-02-23 12:09:45', '8e32d9a3a2526f0390cd91bfceee752e346fedad'),
(55, '192.168.100.3', '2020-02-23 12:10:22', 'd676956672d7bb70f46227b31e184ca8e7926216'),
(56, '192.168.100.3', '2020-02-23 12:10:58', 'c822341133f32c1d1da4ed90fae93e73b87dd3fc'),
(57, '192.168.100.3', '2020-02-23 12:11:13', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(58, '192.168.100.3', '2020-02-23 12:11:32', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(59, '192.168.100.3', '2020-02-23 12:11:41', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(4) NOT NULL,
  `email` varchar(35) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `email`, `name`, `message`) VALUES
(1, 'wijayatoyota09@gmail.com', 'Iqbal Maulana', 'ddd'),
(2, 'wijayatoyota09@gmail.com', 'Iqbal Maulana', 'ddd'),
(3, 'iqbalmr2008@yahoo.co.id', 'Iqbal Maulana', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL,
  `ket_nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `ket_nilai`) VALUES
('SD.001', 'Pasutri', 1),
('SD.002', 'Karyawan', 2),
('SD.003', 'Putera', 3),
('SD.004', 'Puteri', 4),
('SD.005', 'Mahasiswa', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` varchar(6) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `id_kprovinsi` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `id_kprovinsi`) VALUES
('KT0001', 'Kab. Aceh Barat', 'PV0001'),
('KT0002', 'Kab. Aceh Barat Daya', 'PV0001'),
('KT0003', 'Kab. Aceh Besar', 'PV0001'),
('KT0004', 'Kab. Aceh Jaya', 'PV0001'),
('KT0005', 'Kab. Aceh Selatan', 'PV0001'),
('KT0006', 'Kab. Aceh Singkil', 'PV0001'),
('KT0007', 'Kab. Aceh Tamiang', 'PV0001'),
('KT0008', 'Kab. Aceh Tengah', 'PV0001'),
('KT0009', 'Kab. Aceh Tenggara', 'PV0001'),
('KT0010', 'Kab. Aceh Timur', 'PV0001'),
('KT0011', 'Kab. Aceh Utara', 'PV0001'),
('KT0012', 'Kab. Bener Meriah', 'PV0001'),
('KT0013', 'Kab. Bireuen', 'PV0001'),
('KT0014', 'Kab. Gayo Lues', 'PV0001'),
('KT0015', 'Kab. Nagan Raya', 'PV0001'),
('KT0016', 'Kab. Pidie', 'PV0001'),
('KT0017', 'Kab. Pidie Jaya', 'PV0001'),
('KT0018', 'Kab. Simeulue', 'PV0001'),
('KT0019', 'Kota Banda Aceh', 'PV0001'),
('KT0020', 'Kota Langsa', 'PV0001'),
('KT0021', 'Kota Lhokseumawe', 'PV0001'),
('KT0022', 'Kota Sabang', 'PV0001'),
('KT0023', 'Kota Subulussalam', 'PV0001'),
('KT0024', 'Kab. Asahan', 'PV0002'),
('KT0025', 'Kab. Batubara', 'PV0002'),
('KT0026', 'Kab. Dairi', 'PV0002'),
('KT0027', 'Kab. Deli Serdang', 'PV0002'),
('KT0028', 'Kab. Humbang Hasundutan', 'PV0002'),
('KT0029', 'Kab. Karo', 'PV0002'),
('KT0030', 'Kab. Labuhanbatu', 'PV0002'),
('KT0031', 'Kab. Labuhanbatu Selatan', 'PV0002'),
('KT0032', 'Kab. Labuhanbatu Utara', 'PV0002'),
('KT0033', 'Kab. Langkat', 'PV0002'),
('KT0034', 'Kab. Mandailing Natal', 'PV0002'),
('KT0035', 'Kab. Nias', 'PV0002'),
('KT0036', 'Kab. Nias Barat', 'PV0002'),
('KT0037', 'Kab. Nias Selatan', 'PV0002'),
('KT0038', 'Kab. Nias Utara', 'PV0002'),
('KT0039', 'Kab. Padang Lawas', 'PV0002'),
('KT0040', 'Kab. Padang Lawas Utara', 'PV0002'),
('KT0041', 'Kab. Pakpak Bharat', 'PV0002'),
('KT0042', 'Kab. Samosir', 'PV0002'),
('KT0043', 'Kab. Serdang Bedagai', 'PV0002'),
('KT0044', 'Kab. Simalungun', 'PV0002'),
('KT0045', 'Kab. Tapanuli Selatan', 'PV0002'),
('KT0046', 'Kab. Tapanuli Tengah', 'PV0002'),
('KT0047', 'Kab. Tapanuli Utara', 'PV0002'),
('KT0048', 'Kab. Toba Samosir', 'PV0002'),
('KT0049', 'Kota Binjai', 'PV0002'),
('KT0050', 'Kota Gunungsitoli', 'PV0002'),
('KT0051', 'Kota Medan', 'PV0002'),
('KT0052', 'Kota Padangsidempuan', 'PV0002'),
('KT0053', 'Kota Pematangsiantar', 'PV0002'),
('KT0054', 'Kota Sibolga', 'PV0002'),
('KT0055', 'Kota Tanjungbalai', 'PV0002'),
('KT0056', 'Kota Tebing Tinggi', 'PV0002'),
('KT0057', 'Kab. Agam', 'PV0003'),
('KT0058', 'Kab. Dharmasraya', 'PV0003'),
('KT0059', 'Kab. Kepulauan Mentawai', 'PV0003'),
('KT0060', 'Kab. Lima Puluh Kota', 'PV0003'),
('KT0061', 'Kab. Padang Pariaman', 'PV0003'),
('KT0062', 'Kab. Pasaman', 'PV0003'),
('KT0063', 'Kab. Pasaman Barat', 'PV0003'),
('KT0064', 'Kab. Pesisir Selatan', 'PV0003'),
('KT0065', 'Kab. Sijunjung', 'PV0003'),
('KT0066', 'Kab. Solok', 'PV0003'),
('KT0067', 'Kab. Solok Selatan', 'PV0003'),
('KT0068', 'Kab. Tanah Datar', 'PV0003'),
('KT0069', 'Kota Bukittinggi', 'PV0003'),
('KT0070', 'Kota Padang', 'PV0003'),
('KT0071', 'Kota Padangpanjang', 'PV0003'),
('KT0072', 'Kota Pariaman', 'PV0003'),
('KT0073', 'Kota Payakumbuh', 'PV0003'),
('KT0074', 'Kota Sawahlunto', 'PV0003'),
('KT0075', 'Kota Solok', 'PV0003'),
('KT0076', 'Kab. Bengkalis', 'PV0004'),
('KT0077', 'Kab. Indragiri Hilir', 'PV0004'),
('KT0078', 'Kab. Indragiri Hulu', 'PV0004'),
('KT0079', 'Kab. Kampar', 'PV0004'),
('KT0080', 'Kab. Kepulauan Meranti', 'PV0004'),
('KT0081', 'Kab. Kuantan Singingi', 'PV0004'),
('KT0082', 'Kab. Pelalawan', 'PV0004'),
('KT0083', 'Kab. Rokan Hilir', 'PV0004'),
('KT0084', 'Kab. Rokan Hulu', 'PV0004'),
('KT0085', 'Kab. Siak', 'PV0004'),
('KT0086', 'Kota Dumai', 'PV0004'),
('KT0087', 'Kota Pekanbaru', 'PV0004'),
('KT0088', 'Kab. Bintan Kepulauan', 'PV0005'),
('KT0089', 'Kab. Karimun', 'PV0005'),
('KT0090', 'Kab. Kepulauan Anambas', 'PV0005'),
('KT0091', 'Kab. Lingga', 'PV0005'),
('KT0092', 'Kab. Natuna', 'PV0005'),
('KT0093', 'Kota Batam', 'PV0005'),
('KT0094', 'Kota Tanjung Pinang', 'PV0005'),
('KT0095', 'Kab. Batanghari', 'PV0006'),
('KT0096', 'Kab. Bungo', 'PV0006'),
('KT0097', 'Kab. Kerinci', 'PV0006'),
('KT0098', 'Kab. Merangin', 'PV0006'),
('KT0099', 'Kab. Muaro Jambi', 'PV0006'),
('KT0100', 'Kab. Sarolangun', 'PV0006'),
('KT0101', 'Kab. Tanjung Jabung Barat', 'PV0006'),
('KT0102', 'Kab. Tanjung Jabung Timur', 'PV0006'),
('KT0103', 'Kab. Tebo', 'PV0006'),
('KT0104', 'Kota Jambi', 'PV0006'),
('KT0105', 'Kota Sungaipenuh', 'PV0006'),
('KT0106', 'Kab. Bengkulu Selatan', 'PV0007'),
('KT0107', 'Kab Bengkulu Tengah', 'PV0007'),
('KT0108', 'Kab.  Bengkulu Utara', 'PV0007'),
('KT0109', 'Kab. Kaur', 'PV0007'),
('KT0110', 'Kab. Kepahiang', 'PV0007'),
('KT0111', 'Kab. Lebong', 'PV0007'),
('KT0112', 'Kab. Mukomuko', 'PV0007'),
('KT0113', 'Kab. Rejang Lebong', 'PV0007'),
('KT0114', 'Kab. Seluma', 'PV0007'),
('KT0115', 'Kota Bengkulu', 'PV0007'),
('KT0116', 'Kab. Banyuasin', 'PV0008'),
('KT0117', 'Kab. Empat Lawang', 'PV0008'),
('KT0118', 'Kab. Lahat', 'PV0008'),
('KT0119', 'Kab. Muara Enim', 'PV0008'),
('KT0120', 'Kab. Musi Banyuasin', 'PV0008'),
('KT0121', 'Kab. Musi Rawas', 'PV0008'),
('KT0122', 'Kab. Musi Rawas Utara', 'PV0008'),
('KT0123', 'Kab. Ogan Ilir', 'PV0008'),
('KT0124', 'Kab. Ogan Komering Ilir', 'PV0008'),
('KT0125', 'Kab. Ogan Komering Ulu', 'PV0008'),
('KT0126', 'Kab. Ogan Komering Ulu Selatan', 'PV0008'),
('KT0127', 'Kab. Ogan Komering Ulu Timur', 'PV0008'),
('KT0128', 'Kab. Penukal Abab Lematang Ilir', 'PV0008'),
('KT0129', 'Kota Lubuklinggau', 'PV0008'),
('KT0130', 'Kota Pagar Alam', 'PV0008'),
('KT0131', 'Kota Palembang', 'PV0008'),
('KT0132', 'Kota Prabumulih', 'PV0008'),
('KT0133', 'Kab. Bangka', 'PV0009'),
('KT0134', 'Kab. Bangka Barat', 'PV0009'),
('KT0135', 'Kab. Bangka Selatan', 'PV0009'),
('KT0136', 'Kab. Bangka Tengah', 'PV0009'),
('KT0137', 'Kab. Belitung', 'PV0009'),
('KT0138', 'Kab. Belitung Timur', 'PV0009'),
('KT0139', 'Kota Pangkal Pinang', 'PV0009'),
('KT0140', 'Kab. Lampung Barat', 'PV0010'),
('KT0141', 'Kab. Lampung Selatan', 'PV0010'),
('KT0142', 'Kab. Lampung Tengah', 'PV0010'),
('KT0143', 'Kab. Lampung Timur', 'PV0010'),
('KT0144', 'Kab. Lampung Utara', 'PV0010'),
('KT0145', 'Kab. Mesuji', 'PV0010'),
('KT0146', 'Kab. Pesawaran', 'PV0010'),
('KT0147', 'Kab. Pesisir Barat', 'PV0010'),
('KT0148', 'Kab. Pringsewu', 'PV0010'),
('KT0149', 'Kab. Tanggamus', 'PV0010'),
('KT0150', 'Kab. Tulang Bawang', 'PV0010'),
('KT0151', 'Kab. Tulang Bawang Barat', 'PV0010'),
('KT0152', 'Kab. Way Kanan', 'PV0010'),
('KT0153', 'Kota Bandar Lampung', 'PV0010'),
('KT0154', 'Kota Metro', 'PV0010'),
('KT0155', 'Kab. Lebak', 'PV0011'),
('KT0156', 'Kab. Pandeglang', 'PV0011'),
('KT0157', 'Kab. Serang', 'PV0011'),
('KT0158', 'Kab. Tangerang', 'PV0011'),
('KT0159', 'Kota Cilegon', 'PV0011'),
('KT0160', 'Kota Serang', 'PV0011'),
('KT0161', 'Kota Tangerang', 'PV0011'),
('KT0162', 'Kota Tangerang Selatan', 'PV0011'),
('KT0163', 'Kab. Bandung', 'PV0012'),
('KT0164', 'Kab. Bandung Barat', 'PV0012'),
('KT0165', 'Kab. Bekasi', 'PV0012'),
('KT0166', 'Kab. Bogor', 'PV0012'),
('KT0167', 'Kab. Ciamis', 'PV0012'),
('KT0168', 'Kab. Cianjur', 'PV0012'),
('KT0169', 'Kab. Cirebon', 'PV0012'),
('KT0170', 'Kab. Garut', 'PV0012'),
('KT0171', 'Kab. Indramayu', 'PV0012'),
('KT0172', 'Kab. Karawang', 'PV0012'),
('KT0173', 'Kab. Kuningan', 'PV0012'),
('KT0174', 'Kab. Majalengka', 'PV0012'),
('KT0175', 'Kab. Pangandaran', 'PV0012'),
('KT0176', 'Kab. Purwakarta', 'PV0012'),
('KT0177', 'Kab. Subang', 'PV0012'),
('KT0178', 'Kab. Sukabumi', 'PV0012'),
('KT0179', 'Kab. Sumedang', 'PV0012'),
('KT0180', 'Kab. Tasikmalaya', 'PV0012'),
('KT0181', 'Kota Bandung', 'PV0012'),
('KT0182', 'Kota Banjar', 'PV0012'),
('KT0183', 'Kota Bekasi', 'PV0012'),
('KT0184', 'Kota Bogor', 'PV0012'),
('KT0185', 'Kota Cimahi', 'PV0012'),
('KT0186', 'Kota Cirebon', 'PV0012'),
('KT0187', 'Kota Depok', 'PV0012'),
('KT0188', 'Kota Sukabumi', 'PV0012'),
('KT0189', 'Kota Tasikmalaya', 'PV0012'),
('KT0190', 'DKI Jakarta', 'PV0013'),
('KT0191', 'Jakarta Barat', 'PV0013'),
('KT0192', 'Jakarta Pusat', 'PV0013'),
('KT0193', 'Jakarta Selatan', 'PV0013'),
('KT0194', 'Jakarta Timur', 'PV0013'),
('KT0195', 'Jakarta Utara', 'PV0013'),
('KT0196', 'Kepulauan Seribu', 'PV0013'),
('KT0197', 'Kab. Banjarnegara', 'PV0014'),
('KT0198', 'Kab. Banyumas', 'PV0014'),
('KT0199', 'Kab. Batang', 'PV0014'),
('KT0200', 'Kab. Blora', 'PV0014'),
('KT0201', 'Kab. Boyolali', 'PV0014'),
('KT0202', 'Kab. Brebes', 'PV0014'),
('KT0203', 'Kab. Cilacap', 'PV0014'),
('KT0204', 'Kab. Demak', 'PV0014'),
('KT0205', 'Kab. Grobogan', 'PV0014'),
('KT0206', 'Kab. Jepara', 'PV0014'),
('KT0207', 'Kab. Karanganyar', 'PV0014'),
('KT0208', 'Kab. Kebumen', 'PV0014'),
('KT0209', 'Kab. Kendal', 'PV0014'),
('KT0210', 'Kab. Klaten', 'PV0014'),
('KT0211', 'Kab. Kudus', 'PV0014'),
('KT0212', 'Kab. Magelang', 'PV0014'),
('KT0213', 'Kab. Pati', 'PV0014'),
('KT0214', 'Kab. Pekalongan', 'PV0014'),
('KT0215', 'Kab. Pemalang', 'PV0014'),
('KT0216', 'Kab. Purbalingga', 'PV0014'),
('KT0217', 'Kab. Purworejo', 'PV0014'),
('KT0218', 'Kab. Rembang', 'PV0014'),
('KT0219', 'Kab. Semarang', 'PV0014'),
('KT0220', 'Kab. Sragen', 'PV0014'),
('KT0221', 'Kab. Sukoharjo', 'PV0014'),
('KT0222', 'Kab. Tegal', 'PV0014'),
('KT0223', 'Kab. Temanggung', 'PV0014'),
('KT0224', 'Kab. Wonogiri', 'PV0014'),
('KT0225', 'Kab. Wonosobo', 'PV0014'),
('KT0226', 'Kota Magelang', 'PV0014'),
('KT0227', 'Kota Pekalongan', 'PV0014'),
('KT0228', 'Kota Salatiga', 'PV0014'),
('KT0229', 'Kota Semarang', 'PV0014'),
('KT0230', 'Kota Surakarta', 'PV0014'),
('KT0231', 'Kota Tegal', 'PV0014'),
('KT0232', 'Kab. Bantul', 'PV0016'),
('KT0233', 'Kab. Gunungkidul', 'PV0016'),
('KT0234', 'Kab. Kulon Progo', 'PV0016'),
('KT0235', 'Kab. Sleman', 'PV0016'),
('KT0236', 'Kota Yogyakarta', 'PV0016'),
('KT0237', 'Kab. Bangkalan', 'PV0015'),
('KT0238', 'Kab. Banyuwangi', 'PV0015'),
('KT0239', 'Kab. Blitar', 'PV0015'),
('KT0240', 'Kab. Bojonegoro', 'PV0015'),
('KT0241', 'Kab. Bondowoso', 'PV0015'),
('KT0242', 'Kab. Gresik', 'PV0015'),
('KT0243', 'Kab. Jember', 'PV0015'),
('KT0244', 'Kab. Jombang', 'PV0015'),
('KT0245', 'Kab. Kediri', 'PV0015'),
('KT0246', 'Kab. Lamongan', 'PV0015'),
('KT0247', 'Kab. Lumajang', 'PV0015'),
('KT0248', 'Kab. Madiun', 'PV0015'),
('KT0249', 'Kab. Magetan', 'PV0015'),
('KT0250', 'Kab. Malang', 'PV0015'),
('KT0251', 'Kab. Mojokerto', 'PV0015'),
('KT0252', 'Kab. Nganjuk', 'PV0015'),
('KT0253', 'Kab. Ngawi', 'PV0015'),
('KT0254', 'Kab. Pacitan', 'PV0015'),
('KT0255', 'Kab. Pamekasan', 'PV0015'),
('KT0256', 'Kab. Pasuruan', 'PV0015'),
('KT0257', 'Kab. Ponorogo', 'PV0015'),
('KT0258', 'Kab. Probolinggo', 'PV0015'),
('KT0259', 'Kab. Sampang', 'PV0015'),
('KT0260', 'Kab. Sidoarjo', 'PV0015'),
('KT0261', 'Kab. Situbondo', 'PV0015'),
('KT0262', 'Kab. Sumenep', 'PV0015'),
('KT0263', 'Kab. Trenggalek', 'PV0015'),
('KT0264', 'Kab. Tuban', 'PV0015'),
('KT0265', 'Kab. Tulungagung', 'PV0015'),
('KT0266', 'Kota Batu', 'PV0015'),
('KT0267', 'Kota Blitar', 'PV0015'),
('KT0268', 'Kota Kediri', 'PV0015'),
('KT0269', 'Kota Madiun', 'PV0015'),
('KT0270', 'Kota Malang', 'PV0015'),
('KT0271', 'Kota Mojokerto', 'PV0015'),
('KT0272', 'Kota Pasuruan', 'PV0015'),
('KT0273', 'Kota Probolinggo', 'PV0015'),
('KT0274', 'Kota Surabaya', 'PV0015'),
('KT0275', 'Kab. Badung', 'PV0017'),
('KT0276', 'Kab. Bangli', 'PV0017'),
('KT0277', 'Kab. Buleleng', 'PV0017'),
('KT0278', 'Kab. Gianyar', 'PV0017'),
('KT0279', 'Kab. Jembrana', 'PV0017'),
('KT0280', 'Kab. Karangasem', 'PV0017'),
('KT0281', 'Kab. Klungkung', 'PV0017'),
('KT0282', 'Kab. Tabanan', 'PV0017'),
('KT0283', 'Kota Denpasar', 'PV0017'),
('KT0284', 'Kab. Bima', 'PV0018'),
('KT0285', 'Kab. Dompu', 'PV0018'),
('KT0286', 'Kab. Lombok Barat', 'PV0018'),
('KT0287', 'Kab. Lombok Tengah', 'PV0018'),
('KT0288', 'Kab. Lombok Timur', 'PV0018'),
('KT0289', 'Kab. Lombok Utara', 'PV0018'),
('KT0290', 'Kab. Sumbawa', 'PV0018'),
('KT0291', 'Kab. Sumbawa Barat', 'PV0018'),
('KT0292', 'Kota Bima', 'PV0018'),
('KT0293', 'Kota Mataram', 'PV0018'),
('KT0294', 'Kab. Alor', 'PV0019'),
('KT0295', 'Kab. Belu', 'PV0019'),
('KT0296', 'Kab. Ende', 'PV0019'),
('KT0297', 'Kab. Flores Timur', 'PV0019'),
('KT0298', 'Kab. Kupang', 'PV0019'),
('KT0299', 'Kab. Lembata', 'PV0019'),
('KT0300', 'Kab. Malaka', 'PV0019'),
('KT0301', 'Kab. Manggarai', 'PV0019'),
('KT0302', 'Kab. Manggarai Barat', 'PV0019'),
('KT0303', 'Kab. Manggarai Timur', 'PV0019'),
('KT0304', 'Kab. Ngada', 'PV0019'),
('KT0305', 'Kab. Nagekeo', 'PV0019'),
('KT0306', 'Kab. Rote Ndao', 'PV0019'),
('KT0307', 'Kab. Sabu Raijua', 'PV0019'),
('KT0308', 'Kab. Sikka', 'PV0019'),
('KT0309', 'Kab. Sumba Barat', 'PV0019'),
('KT0310', 'Kab. Sumba Barat Daya', 'PV0019'),
('KT0311', 'Kab. Sumba Tengah', 'PV0019'),
('KT0312', 'Kab. Sumba Timur', 'PV0019'),
('KT0313', 'Kab. Timor Tengah Selatan', 'PV0019'),
('KT0314', 'Kab. Timor Tengah Utara', 'PV0019'),
('KT0315', 'Kota Kupang', 'PV0019'),
('KT0316', 'Kab. Bengkayang', 'PV0020'),
('KT0317', 'Kab. Kapuas Hulu', 'PV0020'),
('KT0318', 'Kab. Kayong Utara', 'PV0020'),
('KT0319', 'Kab. Ketapang', 'PV0020'),
('KT0320', 'Kab. Kubu Raya', 'PV0020'),
('KT0321', 'Kab. Landak', 'PV0020'),
('KT0322', 'Kab. Melawi', 'PV0020'),
('KT0323', 'Kab. Mempawah', 'PV0020'),
('KT0324', 'Kab. Sambas', 'PV0020'),
('KT0325', 'Kab. Sanggau', 'PV0020'),
('KT0326', 'Kab. Sekadau', 'PV0020'),
('KT0327', 'Kab. Sintang', 'PV0020'),
('KT0328', 'Kota Pontianak', 'PV0020'),
('KT0329', 'Kota Singkawang', 'PV0020'),
('KT0330', 'Kab. Balangan', 'PV0021'),
('KT0331', 'Kab. Banjar', 'PV0021'),
('KT0332', 'Kab. Barito Kuala', 'PV0021'),
('KT0333', 'Kab. Hulu Sungai Selatan', 'PV0021'),
('KT0334', 'Kab. Hulu Sungai Tengah', 'PV0021'),
('KT0335', 'Kab. Hulu Sungai Utara', 'PV0021'),
('KT0336', 'Kab. Kotabaru', 'PV0021'),
('KT0337', 'Kab. Tabalong', 'PV0021'),
('KT0338', 'Kab. Tanah Bumbu', 'PV0021'),
('KT0339', 'Kab. Tanah Laut', 'PV0021'),
('KT0340', 'Kab. Tapin', 'PV0021'),
('KT0341', 'Kota Banjarbaru', 'PV0021'),
('KT0342', 'Kota Banjarmasin', 'PV0021'),
('KT0343', 'Kab. Barito Selatan', 'PV0022'),
('KT0344', 'Kab. Barito Timur', 'PV0022'),
('KT0345', 'Kab. Barito Utara', 'PV0022'),
('KT0346', 'Kab. Gunung Mas', 'PV0022'),
('KT0347', 'Kab. Kapuas', 'PV0022'),
('KT0348', 'Kab. Katingan', 'PV0022'),
('KT0349', 'Kab. Kotawaringin Barat', 'PV0022'),
('KT0350', 'Kab. Kotawaringin Timur', 'PV0022'),
('KT0351', 'Kab. Lamandau', 'PV0022'),
('KT0352', 'Kab. Murung Raya', 'PV0022'),
('KT0353', 'Kab. Pulang Pisau', 'PV0022'),
('KT0354', 'Kab. Sukamara', 'PV0022'),
('KT0355', 'Kab. Seruyan', 'PV0022'),
('KT0356', 'Kota Palangka Raya', 'PV0022'),
('KT0357', 'Kab. Bera', 'PV0023'),
('KT0358', 'Kab. Kutai Barat', 'PV0023'),
('KT0359', 'Kab. Kutai Kartanegara', 'PV0023'),
('KT0360', 'Kab. Kutai Timur', 'PV0023'),
('KT0361', 'Kab. Mahakam Ulu', 'PV0023'),
('KT0362', 'Kab. Paser', 'PV0023'),
('KT0363', 'Kab. Penajam Paser Utara', 'PV0023'),
('KT0364', 'Kota Balikpapan', 'PV0023'),
('KT0365', 'Kota Bontang', 'PV0023'),
('KT0366', 'Kota Samarinda', 'PV0023'),
('KT0367', 'Kab. Bulungan', 'PV0024'),
('KT0368', 'Kab. Malinau', 'PV0024'),
('KT0369', 'Kab. Nunukan', 'PV0024'),
('KT0370', 'Kab. Tana Tidung', 'PV0024'),
('KT0371', 'Kota Tarakan', 'PV0024'),
('KT0372', 'Kab. Boalemo', 'PV0025'),
('KT0373', 'Kab. Bone Bolango', 'PV0025'),
('KT0374', 'Kab. Gorontalo', 'PV0025'),
('KT0375', 'Kab. Gorontalo Utara', 'PV0025'),
('KT0376', 'Kab. Pohuwato', 'PV0025'),
('KT0377', 'Kota Gorontalo', 'PV0025'),
('KT0378', 'Kab. Bantaeng', 'PV0026'),
('KT0379', 'Kab. Barru', 'PV0026'),
('KT0380', 'Kab. Bone', 'PV0026'),
('KT0381', 'Kab. Bulukumba', 'PV0026'),
('KT0382', 'Kab. Enrekang', 'PV0026'),
('KT0383', 'Kab. Gowa', 'PV0026'),
('KT0384', 'Kab. Jeneponto', 'PV0026'),
('KT0385', 'Kab. Kepulauan Selayar', 'PV0026'),
('KT0386', 'Kab. Luwu', 'PV0026'),
('KT0387', 'Kab. Luwu Timur', 'PV0026'),
('KT0388', 'Kab. Luwu Utara', 'PV0026'),
('KT0389', 'Kab. Maros', 'PV0026'),
('KT0390', 'Kab. Pangkajene dan Kepulauan', 'PV0026'),
('KT0391', 'Kab. Pinrang', 'PV0026'),
('KT0392', 'Kab. Sidenreng Rappang', 'PV0026'),
('KT0393', 'Kab. Sinjai', 'PV0026'),
('KT0394', 'Kab. Soppeng', 'PV0026'),
('KT0395', 'Kab. Takalar', 'PV0026'),
('KT0396', 'Kab. Tana Toraja', 'PV0026'),
('KT0397', 'Kab. Toraja Utara', 'PV0026'),
('KT0398', 'Kab. Wajo', 'PV0026'),
('KT0399', 'Kota Makassar', 'PV0026'),
('KT0400', 'Kota Palopo', 'PV0026'),
('KT0401', 'Kota Parepare', 'PV0026'),
('KT0402', 'Kab. Bombana', 'PV0027'),
('KT0403', 'Kab. Buton', 'PV0027'),
('KT0404', 'Kab. Buton Selatan', 'PV0027'),
('KT0405', 'Kab. Buton Tengah', 'PV0027'),
('KT0406', 'Kab. Buton Utara', 'PV0027'),
('KT0407', 'Kab. Kolaka', 'PV0027'),
('KT0408', 'Kab. Kolaka Timur', 'PV0027'),
('KT0409', 'Kab. Kolaka Utara', 'PV0027'),
('KT0410', 'Kab. Konawe', 'PV0027'),
('KT0411', 'Kab. Konawe Kepulauan', 'PV0027'),
('KT0412', 'Kab. Konawe Selatan', 'PV0027'),
('KT0413', 'Kab. Konawe Utara', 'PV0027'),
('KT0414', 'Kab. Muna', 'PV0027'),
('KT0415', 'Kab. Muna Barat', 'PV0027'),
('KT0416', 'Kab. Wakatobi', 'PV0027'),
('KT0417', 'Kota Bau-Bau', 'PV0027'),
('KT0418', 'Kota Kendari', 'PV0027'),
('KT0419', 'Kab. Banggai', 'PV0028'),
('KT0420', 'Kab. Banggai Kepulauan', 'PV0028'),
('KT0421', 'Kab. Banggai Laut', 'PV0028'),
('KT0422', 'Kab. Buol', 'PV0028'),
('KT0423', 'Kab. Donggala', 'PV0028'),
('KT0424', 'Kab. Morowali', 'PV0028'),
('KT0425', 'Kab. Morowali Utara', 'PV0028'),
('KT0426', 'Kab. Parigi Moutong', 'PV0028'),
('KT0427', 'Kab. Poso', 'PV0028'),
('KT0428', 'Kab. Sigi', 'PV0028'),
('KT0429', 'Kab. Tojo Una-Una', 'PV0028'),
('KT0430', 'Kab. Tolitoli', 'PV0028'),
('KT0431', 'Kota Palu', 'PV0028'),
('KT0432', 'Kab. Bolaang Mongondow', 'PV0029'),
('KT0433', 'Kab. Bolaang Mongondow Selatan', 'PV0029'),
('KT0434', 'Kab. Bolaang Mongondow Timur', 'PV0029'),
('KT0435', 'Kab. Bolaang Mongondow Utara', 'PV0029'),
('KT0436', 'Kab. Kepulauan Sangihe', 'PV0029'),
('KT0437', 'Kab. Kepulauan Siau Tagulandang Biaro', 'PV0029'),
('KT0438', 'Kab. Kepulauan Talaud', 'PV0029'),
('KT0439', 'Kab. Minahasa', 'PV0029'),
('KT0440', 'Kab. Minahasa Selatan', 'PV0029'),
('KT0441', 'Kab. Minahasa Tenggara', 'PV0029'),
('KT0442', 'Kab. Minahasa Utara', 'PV0029'),
('KT0443', 'Kota Bitung', 'PV0029'),
('KT0444', 'Kota Kotamobagu', 'PV0029'),
('KT0445', 'Kota Manado', 'PV0029'),
('KT0446', 'Kota Tomohon', 'PV0029'),
('KT0447', 'Kab. Majene', 'PV0030'),
('KT0448', 'Kab. Mamasa', 'PV0030'),
('KT0449', 'Kab. Mamuju', 'PV0030'),
('KT0450', 'Kab. Mamuju Tengah', 'PV0030'),
('KT0451', 'Kab. Pasangkayu', 'PV0030'),
('KT0452', 'Kab. Polewali Mandar', 'PV0030'),
('KT0453', 'Kab. Buru', 'PV0031'),
('KT0454', 'Kab. Buru Selatan', 'PV0031'),
('KT0455', 'Kab. Kepulauan Aru', 'PV0031'),
('KT0456', 'Kab. Maluku Barat Daya', 'PV0031'),
('KT0457', 'Kab. Maluku Tengah', 'PV0031'),
('KT0458', 'Kab. Maluku Tenggara', 'PV0031'),
('KT0459', 'Kab. Maluku Tenggara Barat', 'PV0031'),
('KT0460', 'Kab. Seram Bagian Barat', 'PV0031'),
('KT0461', 'Kab. Seram Bagian Timur', 'PV0031'),
('KT0462', 'Kota Ambon', 'PV0031'),
('KT0463', 'Kota Tual', 'PV0031'),
('KT0464', 'Kab. Halmahera Barat', 'PV0032'),
('KT0465', 'Kab. Halmahera Tengah', 'PV0032'),
('KT0466', 'Kab. Halmahera Timur', 'PV0032'),
('KT0467', 'Kab. Halmahera Selatan', 'PV0032'),
('KT0468', 'Kab. Halmahera Utara', 'PV0032'),
('KT0469', 'Kab. Kepulauan Sula', 'PV0032'),
('KT0470', 'Kab. Pulau Morotai', 'PV0032'),
('KT0471', 'Kab. Pulau Taliabu', 'PV0032'),
('KT0472', 'Kota Ternate', 'PV0032'),
('KT0473', 'Kota Tidore Kepulauan', 'PV0032'),
('KT0474', 'Kab. Asmat', 'PV0033'),
('KT0475', 'Kab. Biak Numfor', 'PV0033'),
('KT0476', 'Kab. Boven Digoel', 'PV0033'),
('KT0477', 'Kab. Deiyai', 'PV0033'),
('KT0478', 'Kab. Dogiyai', 'PV0033'),
('KT0479', 'Kab. Intan Jaya', 'PV0033'),
('KT0480', 'Kab. Jayapura', 'PV0033'),
('KT0481', 'Kab. Jayawijaya', 'PV0033'),
('KT0482', 'Kab. Keerom', 'PV0033'),
('KT0483', 'Kab. Kepulauan Yapen', 'PV0033'),
('KT0484', 'Kab. Lanny Jaya', 'PV0033'),
('KT0485', 'Kab. Mamberamo Raya', 'PV0033'),
('KT0486', 'Kab. Mamberamo Tengah', 'PV0033'),
('KT0487', 'Kab. Mappi', 'PV0033'),
('KT0488', 'Kab. Merauke', 'PV0033'),
('KT0489', 'Kab. Mimika', 'PV0033'),
('KT0490', 'Kab. Nabire', 'PV0033'),
('KT0491', 'Kab. Nduga', 'PV0033'),
('KT0492', 'Kab. Paniai', 'PV0033'),
('KT0493', 'Kab. Pegunungan Bintang', 'PV0033'),
('KT0494', 'Kab. Puncak', 'PV0033'),
('KT0495', 'Kab. Puncak Jaya', 'PV0033'),
('KT0496', 'Kab. Sarmi', 'PV0033'),
('KT0497', 'Kab. Supiori', 'PV0033'),
('KT0498', 'Kab. Tolikara', 'PV0033'),
('KT0499', 'Kab. Waropen', 'PV0033'),
('KT0500', 'Kab. Yahukimo', 'PV0033'),
('KT0501', 'Kab. Yalimo', 'PV0033'),
('KT0502', 'Kota Jayapura', 'PV0033'),
('KT0503', 'Kab. Fakfak', 'PV0034'),
('KT0504', 'Kab. Kaimana', 'PV0034'),
('KT0505', 'Kab. Manokwari', 'PV0034'),
('KT0506', 'Kab. Manokwari Selatan', 'PV0034'),
('KT0507', 'Kab. Maybrat', 'PV0034'),
('KT0508', 'Kab. Pegunungan Arfak', 'PV0034'),
('KT0509', 'Kab. Raja Ampat', 'PV0034'),
('KT0510', 'Kab. Sorong', 'PV0034'),
('KT0511', 'Kab. Sorong Selatan', 'PV0034'),
('KT0512', 'Kab. Tambrauw', 'PV0034'),
('KT0513', 'Kab. Teluk Bintuni', 'PV0034'),
('KT0514', 'Kab. Teluk Wondama', 'PV0034'),
('KT0515', 'Kota Sorong', 'PV0034');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `nama_pengguna` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `kordinat_pel` varchar(50) NOT NULL,
  `tgl_pengguna` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_kategori`, `nama_pengguna`, `email`, `kordinat_pel`, `tgl_pengguna`) VALUES
('KS.001', 'SD.005', 'Dari Website', '-', '-', '2020-02-21'),
('KS.002', 'SD.005', 'arr', 'dhhj', '-6.7518135,108.4696064', '2020-02-21'),
('KS.003', 'SD.005', 'Khaelanis', '0832837234', '-', '2020-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan`
--

CREATE TABLE `perhitungan` (
  `id_per` int(3) NOT NULL,
  `id_tempat` varchar(6) NOT NULL,
  `C1_Harga` int(1) NOT NULL,
  `C2_Fasilitas` float NOT NULL,
  `C3_Kategori` int(1) NOT NULL,
  `jarak` varchar(4) NOT NULL,
  `Hasil_akhir` double NOT NULL,
  `ip` varchar(15) NOT NULL,
  `session` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perhitungan`
--

INSERT INTO `perhitungan` (`id_per`, `id_tempat`, `C1_Harga`, `C2_Fasilitas`, `C3_Kategori`, `jarak`, `Hasil_akhir`, `ip`, `session`) VALUES
(209, 'KS.010', 5, 1, 5, '3.33', 10.2, '192.168.100.2', '84688871dd7a3b1c06cfce52ad7f4df446f75523'),
(210, 'KS.009', 5, 5, 5, '3.33', 11, '192.168.100.2', '84688871dd7a3b1c06cfce52ad7f4df446f75523'),
(211, 'KS.011', 5, 2, 5, '3.33', 10.4, '192.168.100.2', '84688871dd7a3b1c06cfce52ad7f4df446f75523'),
(212, 'KS.012', 5, 1, 5, '3.33', 10.2, '192.168.100.2', '84688871dd7a3b1c06cfce52ad7f4df446f75523'),
(213, 'KS.005', 4, 1, 5, '0', 10, '192.168.100.2', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(214, 'KS.013', 4, 2, 5, '3.33', 11, '192.168.100.2', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(215, 'KS.003', 4, 2, 5, '0', 11, '192.168.100.2', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(216, 'KS.014', 4, 2, 5, '1.11', 11, '192.168.100.2', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(217, 'KS.015', 4, 2, 5, '0', 11, '192.168.100.2', 'f6c45259c9efea24b5a91214ce166cfe864169a6'),
(218, 'KS.010', 5, 1, 5, '3.33', 10.6, '192.168.100.2', '0debfd879da676575799bb624bc54da912c00ed1'),
(219, 'KS.009', 5, 5, 5, '3.33', 13, '192.168.100.2', '0debfd879da676575799bb624bc54da912c00ed1'),
(220, 'KS.011', 5, 2, 5, '3.33', 11.2, '192.168.100.2', '0debfd879da676575799bb624bc54da912c00ed1'),
(221, 'KS.012', 5, 1, 5, '3.33', 10.6, '192.168.100.2', '0debfd879da676575799bb624bc54da912c00ed1'),
(222, 'KS.010', 5, 1, 5, '3.33', 10.2, '192.168.100.3', '73d03713bc57d3d603a48866682e942af5ee169d'),
(223, 'KS.009', 5, 5, 5, '3.33', 11, '192.168.100.3', '73d03713bc57d3d603a48866682e942af5ee169d'),
(224, 'KS.011', 5, 2, 5, '3.33', 10.4, '192.168.100.3', '73d03713bc57d3d603a48866682e942af5ee169d'),
(225, 'KS.012', 5, 1, 5, '3.33', 10.2, '192.168.100.3', '73d03713bc57d3d603a48866682e942af5ee169d'),
(226, 'KS.005', 4, 1, 5, '0', 5.5, '192.168.100.3', '11b1181da16a041c3e99c6ddd68f1c9ff98be81a'),
(227, 'KS.003', 0, 2, 5, '0', 6, '192.168.100.3', '11b1181da16a041c3e99c6ddd68f1c9ff98be81a'),
(228, 'KS.014', 0, 2, 5, '1.11', 6, '192.168.100.3', '11b1181da16a041c3e99c6ddd68f1c9ff98be81a'),
(229, 'KS.015', 0, 2, 5, '0', 6, '192.168.100.3', '11b1181da16a041c3e99c6ddd68f1c9ff98be81a'),
(230, 'KS.005', 4, 1, 5, '0', 5.5, '192.168.100.3', '8e32d9a3a2526f0390cd91bfceee752e346fedad'),
(231, 'KS.003', 0, 2, 5, '0', 6, '192.168.100.3', '8e32d9a3a2526f0390cd91bfceee752e346fedad'),
(232, 'KS.014', 0, 2, 5, '1.11', 6, '192.168.100.3', '8e32d9a3a2526f0390cd91bfceee752e346fedad'),
(233, 'KS.015', 0, 2, 5, '0', 6, '192.168.100.3', '8e32d9a3a2526f0390cd91bfceee752e346fedad'),
(234, 'KS.010', 5, 1, 5, '3.33', 10.2, '192.168.100.3', 'd676956672d7bb70f46227b31e184ca8e7926216'),
(235, 'KS.009', 5, 5, 5, '3.33', 11, '192.168.100.3', 'd676956672d7bb70f46227b31e184ca8e7926216'),
(236, 'KS.011', 5, 2, 5, '3.33', 10.4, '192.168.100.3', 'd676956672d7bb70f46227b31e184ca8e7926216'),
(237, 'KS.012', 5, 1, 5, '3.33', 10.2, '192.168.100.3', 'd676956672d7bb70f46227b31e184ca8e7926216'),
(238, 'KS.010', 5, 1, 5, '2.22', 10.2, '192.168.100.3', 'c822341133f32c1d1da4ed90fae93e73b87dd3fc'),
(239, 'KS.009', 5, 5, 5, '2.22', 11, '192.168.100.3', 'c822341133f32c1d1da4ed90fae93e73b87dd3fc'),
(240, 'KS.011', 5, 2, 5, '2.22', 10.4, '192.168.100.3', 'c822341133f32c1d1da4ed90fae93e73b87dd3fc'),
(241, 'KS.012', 5, 1, 5, '2.22', 10.2, '192.168.100.3', 'c822341133f32c1d1da4ed90fae93e73b87dd3fc'),
(242, 'KS.005', 4, 1, 5, '0', 9.5, '192.168.100.3', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(243, 'KS.013', 4, 2, 5, '2.22', 10, '192.168.100.3', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(244, 'KS.003', 4, 2, 5, '0', 10, '192.168.100.3', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(245, 'KS.014', 4, 2, 5, '0', 10, '192.168.100.3', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(246, 'KS.015', 4, 2, 5, '0', 10, '192.168.100.3', 'eaee15777affddfd7ba8171869661f3ce9d1f427'),
(247, 'KS.005', 4, 1, 5, '0', 9.5, '192.168.100.3', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(248, 'KS.013', 4, 2, 5, '2.22', 10, '192.168.100.3', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(249, 'KS.003', 4, 2, 5, '0', 10, '192.168.100.3', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(250, 'KS.014', 4, 2, 5, '0', 10, '192.168.100.3', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(251, 'KS.015', 4, 2, 5, '0', 10, '192.168.100.3', '60707d1b4c20fdaac9e70a890dcfbfad45980015'),
(252, 'KS.005', 4, 1, 5, '0', 9.5, '192.168.100.3', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8'),
(253, 'KS.013', 4, 2, 5, '2.22', 10, '192.168.100.3', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8'),
(254, 'KS.003', 4, 2, 5, '0', 10, '192.168.100.3', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8'),
(255, 'KS.014', 4, 2, 5, '0', 10, '192.168.100.3', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8'),
(256, 'KS.015', 4, 2, 5, '0', 10, '192.168.100.3', '85140f5a8a114d0692cf6a4b5aed45f654f8e9e8');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(15) NOT NULL,
  `id_pengguna` varchar(15) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_tempat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pengguna`, `jumlah`, `tgl_pesan`, `id_tempat`) VALUES
('PS.001', 'KS.001', 1, '2020-02-21', 'KS.013'),
('PS.002', 'KS.002', 1, '2020-02-21', 'KS.013'),
('PS.003', 'KS.003', 1, '2020-02-21', 'KS.003');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `DEL` AFTER DELETE ON `pesanan` FOR EACH ROW BEGIN
UPDATE tempat set jml_kosong = jml_kosong + OLD.jumlah WHERE id_tempat=OLD.id_tempat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
UPDATE tempat set jml_kosong = jml_kosong - NEW.jumlah WHERE id_tempat=NEW.id_tempat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(6) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
('PV0001', 'Aceh'),
('PV0002', 'Sumatera Utara'),
('PV0003', 'Sumatera Barat'),
('PV0004', 'Riau'),
('PV0005', 'Kepulauan Riau'),
('PV0006', 'Jambi'),
('PV0007', 'Bengkulu'),
('PV0008', 'Sumatera Selatan'),
('PV0009', 'Kepulauan Bangka Belitung'),
('PV0010', 'Lampung'),
('PV0011', 'Banten'),
('PV0012', 'Jawa Barat'),
('PV0013', 'DKI Jakarta'),
('PV0014', 'Jawa Tengah'),
('PV0015', 'Jawa Timur'),
('PV0016', 'DI Yogyakarta'),
('PV0017', 'Bali'),
('PV0018', 'Nusa Tenggara Barat'),
('PV0019', 'Nusa Tenggara Timur'),
('PV0020', 'Kalimantan Barat'),
('PV0021', 'Kalimantan Selatan'),
('PV0022', 'Kalimantan Tengah'),
('PV0023', 'Kalimantan Timur'),
('PV0024', 'Kalimantan Utara'),
('PV0025', 'Gorontalo'),
('PV0026', 'Sulawesi Selatan'),
('PV0027', 'Sulawesi Tenggara'),
('PV0028', 'Sulawesi Tengah'),
('PV0029', 'Sulawesi Utara'),
('PV0030', 'Sulawesi Barat'),
('PV0031', 'Maluku'),
('PV0032', 'Maluku Utara'),
('PV0033', 'Papua'),
('PV0034', 'Papua Barat');

-- --------------------------------------------------------

--
-- Table structure for table `sementara`
--

CREATE TABLE `sementara` (
  `id` int(11) NOT NULL,
  `id_tempat` varchar(15) NOT NULL,
  `jarak` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  `nama_tempat` varchar(35) NOT NULL,
  `keterangan` text NOT NULL,
  `alamat` text NOT NULL,
  `luas_kamar` varchar(35) NOT NULL,
  `jml_kamar` int(5) NOT NULL,
  `jml_kosong` int(5) NOT NULL,
  `tarif` varchar(35) NOT NULL,
  `harga_tarif` int(9) NOT NULL,
  `fasilitas` varchar(35) NOT NULL,
  `detail_fasilitas` varchar(100) NOT NULL,
  `kordinat` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `frame` text NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_kota` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `id_kategori`, `nama_tempat`, `keterangan`, `alamat`, `luas_kamar`, `jml_kamar`, `jml_kosong`, `tarif`, `harga_tarif`, `fasilitas`, `detail_fasilitas`, `kordinat`, `gambar`, `frame`, `id_user`, `id_kota`) VALUES
('KS.001', 'SD.002', 'Kos Cirebon City', ' 1. Ada banyak jenis kamar  \r\n2. Tempat nyaman\r\n3. Tempat parkir luas\r\n4. Kamar Bersih\r\n5.Dekat dengan pusat perkotaan\r\n\r\nJika minat Hub : 0852-2222-2282 \r\n ', 'Jalan. Gg Sijarak 2 No. 8, RT04 RW04, Kampung Melati, Kesambi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45134    ', '3x3', 5, 4, 'Bulanan', 350000, '', 'Kasur, Lemari', '-6.73259, 108.55191', '38Screenshot (12).jpg', '<iframe src="https://www.google.com/maps/d/u/4/embed?mid=1QfkMvXtARanmG4mDPxrMN6rqrvL7pclQ" width="640" height="480"></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.002', 'SD.002', 'Abdi Negara Kos', ' 0813-2422-7447 ', ' Jl.Abdi Negara 1 ', '3x3', 5, 2, '', 450000, '', 'Kasur, Lemari', '-6.7419123,108.4930614', '38Screenshot (12).jpg', '<iframe src="https://www.google.com/maps/d/u/4/embed?mid=1QfkMvXtARanmG4mDPxrMN6rqrvL7pclQ" width="640" height="480"></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.003', 'SD.005', 'ARRS KOSST', '', 'JL. Abdi Negara', '3X4', 14, 2, 'Bulanan', 450000, 'Isi', 'TV, Lemari, Kasur', '-6.7511647,108.4710366', '63370405.jpg', 'Null', 'firman@gmail.com', 'KT0169'),
('KS.005', 'SD.005', 'SENJA SEJASHTRA', '', ' Jl. Makmur No.3, Kesambi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45134', '3X4', 11, 2, 'Bulanan', 410000, 'Isi', 'cool', '-6.751732,108.471303', '26Jellyfish.jpg', 'rrrt', 'firman@gmail.com', 'KT0169'),
('KS.008', 'SD.001', 'kosan baru', 'jkjk', 'Jl. Karang Jalak, Sunyaragi, Kec. Kesambi, Kota Cirebon, Jawa Barat 45132', '4x3M', 20, 15, 'Harian', 1000000, 'Isi ', 'tv,lemari,ac', '-6.675182,106.941633', '12cbk.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126793.62323544807!2d108.47520680566501!3d-6.7331180153445445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1df4a7575065%3A0x9841aba20d0a3d4c!2sKosan%20Belakang!5e0!3m2!1sid!2sid!4v1568970361227!5m2!1sid!2sid" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.009', 'SD.005', 'Kost Putri BIRU', '', 'Jl. Pesantren, Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '3x3m', 5, 3, 'Bulanan', 350000, 'Isi', 'Kasur,Lemari,Tv,Ac,Kulkas,wc,wcluar,kipas', '-6.7420816,108.4933255', '40kos.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d572.2212817458843!2d108.49332546289254!3d-6.742081594835552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2d509ed2d76d554!2sKost%20Putri%20BIRU!5e0!3m2!1sid!2sid!4v1582000625828!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.010', 'SD.005', 'Kost Putri Gendhis', '', 'Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '4 X 5', 5, 4, 'Bulanan', 300000, 'Isi', 'Lemari', '-6.7418342,108.4934435', '54kos1.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.557379530166!2d108.49344352192205!3d-6.7418341706410345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1feb5b65c589%3A0x525a9a9e233184f!2sKost%20Putri%20Gendhis!5e0!3m2!1sid!2sid!4v1582000974963!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.011', 'SD.005', 'Kost Melody', '', 'Jl. Fatahillah No.33, Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '4 X 5', 7, 5, 'Bulanan', 300000, 'Isi', 'Kasur,Lemari,Wc', '-6.7417982,108.4939213', '82kos2.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d700.4298921373002!2d108.4939212862604!3d-6.741798245072805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f089b20634f%3A0x628d020b2c19e3ca!2sKost%20Melody!5e0!3m2!1sid!2sid!4v1582001240235!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.012', 'SD.005', ' Kost Putri Pandawa Lima', '', 'Jl. Pesindangan, Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '3x3m', 7, 5, 'Bulanan', 300000, 'Isi', 'Kasur', '-6.7423416,108.4944181', '78kos3.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d700.429106855162!2d108.49441814554542!3d-6.742341623395557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1fc1ec6c5669%3A0x5bd0e51cc3c793bc!2sKost%20Putri%20Pandawa%20Lima!5e0!3m2!1sid!2sid!4v1582001547940!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.013', 'SD.005', 'Lux Homestay', '', 'Gang Pesantren, Kav Depag, Jl. Fatahillah, 45611, Watubelah, Sumber, Cirebon, West Java 45611', '3x3m', 7, 0, 'Bulanan', 430000, 'Isi', 'Kasur, Lemari', '-6.7422801,108.4949489', '18kos4.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.5564682226949!2d108.4949488510373!3d-6.742280060242678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e3cf696cb89%3A0x88d8969dd9550fb3!2sLux%20Homestay!5e0!3m2!1sid!2sid!4v1582001817803!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.014', 'SD.005', 'Anezka Kost', '', 'Jl. Pesantren, Kav. Depag No. 5B, Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '3x3m', 7, 5, 'Bulanan', 430000, 'Isi', 'Kasur, Lemari', '-6.7532236,108.4768781', '83kos5.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.5559061079741!2d108.49480845683219!3d-6.7425550802324015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1e3cf9843cb5%3A0x4cf7c25f29a3d160!2sAnezka%20Kost!5e0!3m2!1sid!2sid!4v1582002020187!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.015', 'SD.005', ' CATHA Kost', '', 'Jl. Fatahillah, Watubelah, Kec. Sumber, Cirebon, Jawa Barat 45611', '3x3m', 7, 4, 'Bulanan', 430000, 'Isi', 'Kasur, Lemari', '-6.7540043,108.4730445', '17kos6.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.5533723641433!2d108.49177759999999!3d-6.743794599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1fe83cbbd621%3A0xf33a544d70600539!2sCATHA%20Kost!5e0!3m2!1sid!2sid!4v1582002375932!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.016', 'SD.004', 'Kost Pondok Muslimah Al Fath', '', 'Jl. Pendidikan, RT.6/RW.2, Watubelah, Sumber, Cirebon, West Java 45611', '3x3m', 7, 5, 'Bulanan', 300000, 'Isi', 'Kasur, Lemari', '-6.7485004,108.4691897', '60kos7.jpg', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d832.9586493535957!2d108.4924751562848!3d-6.740379426111287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f3565a19a37%3A0x9c37d2ec582e81aa!2sKost%20Pondok%20Muslimah%20Al%20Fath!5e0!3m2!1sid!2sid!4v1582002616355!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>', 'ahmad.kaelani1@gmail.com', ''),
('KS.017', 'SD.001', 'Kosan Mutiara Hati', 'Murah lah pokonya', 'Jl. mutiara no 3', '3x3', 10, 10, 'Bulanan', 750000, 'Isi ', 'Kasur, Lemari, Tv, Kamar mandi', '-6.913669,107.620838', '81IMG-20151211-WA0002.jpg', 'ga ada', 'firman@gmail.com', 'KT0275');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('adm', 'c20ad4d76fe97759aa27a0c99bff6710', 'ahmad kaelani', 'ahmad.kaelani09@gmail.com', '08999371409', 'user', 'N', 'e00cf25ad42683b3df678c61f42c6bda'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@detik.com', '08238923848', 'admin', 'N', 'r8sifpvafnmrooocakk6pubu37'),
('adminkece', 'c20ad4d76fe97759aa27a0c99bff6710', 'Admin Frans', 'adminkece@gmail.com', '085111222333', 'kepala', 'N', '71637b92d28d25a5774135d8740f9bc6'),
('ahmad.kaelani1@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Ahmad Khaelani', 'ahmad.kaelani1@gmail.com', '08999371401', 'user', 'N', ''),
('firman@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Firman Arr', 'firman@gmail.com', '089666444595', 'user', 'N', ''),
('gwns@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Gunawan', 'gwns@gmail.com', '08111000222', 'user', 'N', ''),
('kepala', 'c20ad4d76fe97759aa27a0c99bff6710', 'Ir. Nugroho', 'a@mail.com', '098765', 'kepala', 'N', '98828a5cb77e74e7d184603abca942c9'),
('kostkiw@gmial.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'Halaman Luas', 'kostkiw@gmial.com', '234556', 'user', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fas`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `kd_kategori` (`id_kategori`);

--
-- Indexes for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `sementara`
--
ALTER TABLE `sementara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perhitungan`
--
ALTER TABLE `perhitungan`
  MODIFY `id_per` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
--
-- AUTO_INCREMENT for table `sementara`
--
ALTER TABLE `sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `perhitungan`
--
ALTER TABLE `perhitungan`
  ADD CONSTRAINT `perhitungan_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat` (`id_tempat`);

--
-- Constraints for table `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
