-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barokah_depot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id_chat` int(11) NOT NULL,
  `id_pelanggan` char(10) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  `waktu` datetime NOT NULL,
  `sender` char(10) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id_chat`, `id_pelanggan`, `pesan`, `waktu`, `sender`, `status`) VALUES
(2, 'PLN00001', 'Bismillah', '2021-07-13 20:38:20', 'Admin', '1'),
(3, 'PLN00001', 'TES', '2021-07-14 01:09:06', 'Pelanggan', '1'),
(4, 'PLN00001', 'yesss', '2021-07-13 21:00:02', 'Admin', '1'),
(6, 'PLN00001', 'Testing', '2021-07-13 21:24:41', 'Pelanggan', '1'),
(7, 'PLN00001', 'sssssss', '2021-07-13 21:24:53', 'Pelanggan', '1'),
(8, 'PLN00002', 'tes', '2021-07-14 07:12:22', 'Pelanggan', ''),
(9, 'PLN00002', 'tes', '2021-07-14 15:41:32', 'Pelanggan', ''),
(10, 'PLN00001', 'halo', '2021-07-14 19:57:47', 'Admin', ''),
(11, 'PLN00003', 'Tolong Dibenahi lagi', '2021-07-14 21:27:45', 'Pelanggan', '1'),
(12, 'PLN00003', 'Baik siap', '2021-07-14 21:28:35', 'Admin', '1'),
(13, 'PLN00004', 'Halo lagi nyari Filter CTO ada?', '2021-07-15 14:11:15', 'Pelanggan', '1'),
(14, 'PLN00004', 'hehe bisa dong\r\n', '2021-07-15 14:20:47', 'Pelanggan', '1'),
(15, 'PLN00004', 'Alhamdulillah sedikit-sedikit ya', '2021-07-15 14:24:54', 'Admin', '1'),
(16, 'PLN00004', 'pasti bisa wkwk', '2021-07-15 14:25:12', 'Admin', '1'),
(17, 'PLN00004', 'fitur chat selesai!!!!!', '2021-07-15 14:25:52', 'Admin', '1'),
(18, 'PLN00004', 'tes lagi', '2021-07-15 14:29:11', 'Admin', '1'),
(19, '', 'sx', '2021-07-15 14:29:50', 'Admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_order`
--

CREATE TABLE `tbl_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` char(10) NOT NULL,
  `kd_produk` char(4) NOT NULL,
  `pcs` int(11) NOT NULL,
  `jml_byr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail_order`
--

INSERT INTO `tbl_detail_order` (`id_detail_order`, `id_order`, `kd_produk`, `pcs`, `jml_byr`) VALUES
(73, 'TR000001', 'P004', 1, 45000),
(74, 'TR000002', 'P005', 1, 45000),
(75, 'TR000003', 'P006', 1, 40000),
(76, 'TR000004', 'P006', 1, 40000),
(77, 'TR000005', 'P004', 4, 144000),
(78, 'TR000005', 'P005', 2, 81000),
(79, 'TR000005', '', 1, 0),
(80, 'TR000005', '', 1, 0),
(81, 'TR000006', 'P005', 1, 40500),
(82, 'TR000006', 'P004', 1, 36000),
(83, 'TR000007', 'P011', 3, 18000),
(84, 'TR000007', 'P006', 1, 30000),
(85, 'TR000007', 'P005', 1, 40500),
(86, 'TR000008', 'P005', 1, 40500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(3) NOT NULL,
  `nama_kategori` char(50) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `keterangan`) VALUES
(2, 'Air Minum Isi Ulang', 'Air Minum Isi Ulang ada 2 jenis yaitu Air Minum Isi Ulang Biasa dan RO'),
(3, 'Perlengkapan', 'Kategori Perlengkapan yaitu alat-alat pelengkap depot seperti tutup air galon, lampus, dsb.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `kd_keranjang` int(11) NOT NULL,
  `id_pelanggan` char(10) NOT NULL,
  `kd_produk` char(4) NOT NULL,
  `jml_pcs` int(3) NOT NULL,
  `jml_byr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keranjang`
--

INSERT INTO `tbl_keranjang` (`kd_keranjang`, `id_pelanggan`, `kd_produk`, `jml_pcs`, `jml_byr`) VALUES
(46, 'PLN00001', 'P006', 1, 40000),
(47, 'PLN00001', '', 1, 0),
(49, 'PLN00001', '', 1, 0),
(55, 'PLN00004', 'P008', 1, 8000),
(56, 'PLN00004', 'P008', 1, 8000),
(57, 'PLN00004', 'P008', 1, 8000),
(58, 'PLN00004', 'P006', 1, 30000),
(59, 'PLN00004', 'P015', 1, 810000),
(60, 'PLN00004', 'P015', 1, 810000),
(61, 'PLN00004', 'P013', 1, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` char(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `telp` char(13) NOT NULL,
  `email` char(25) NOT NULL,
  `username` char(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `poin` int(11) NOT NULL,
  `nominal_poin` int(11) NOT NULL,
  `status_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `tgl_lahir`, `alamat`, `id_wilayah`, `telp`, `email`, `username`, `password`, `poin`, `nominal_poin`, `status_pelanggan`) VALUES
('PLN00001', 'Gilang Ramadhan', 'L', '1998-12-01', 'Jl. Dukuh, Dusun Dusun Kliwon, RT. 24, RW. 09, Desa Bojong, Kec. Cilimus', 1, '082116086667', '11a3102yanuar@gmail.com', 'gilang', 'f8f4d937bbdf93aba7535d37a5805bd0', 0, 100, 1),
('PLN00004', 'Nisa', 'L', '1999-07-14', 'Bekasi', 2, '0821160835434', 'dfgsaa', 'nisa', '5fad30428811fe378fd389cd7659a33c', 8, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_order` char(10) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `kurir` char(10) NOT NULL,
  `alamat_pengiriman` varchar(200) NOT NULL,
  `status_pengiriman` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengiriman`
--

INSERT INTO `tbl_pengiriman` (`id_pengiriman`, `id_order`, `tgl_pengiriman`, `kurir`, `alamat_pengiriman`, `status_pengiriman`) VALUES
(40, 'TR000001', '0000-00-00', 'JNE', 'Mekar, Dusun Pahing, RT. 22, RW. 12, Desa Mandirancan, Kec. Cilimus', '1'),
(41, 'TR000002', '0000-00-00', 'JNE', 'Mekar, Dusun Pahing, RT. 22, RW. 12, Desa Mandirancan, Kec. Cilimus', '1'),
(42, 'TR000003', '0000-00-00', 'JNE', 'Mekar, Dusun Pahing, RT. 22, RW. 12, Desa Mandirancan, Kec. Cilimus', '1'),
(43, 'TR000004', '0000-00-00', 'JNE', 'Mekar, Dusun Pahing, RT. 22, RW. 12, Desa Mandirancan, Kec. Cilimus', '1'),
(44, 'TR000005', '0000-00-00', 'JNE', 'Bekasi', '1'),
(45, 'TR000006', '0000-00-00', 'JNE', 'Bekasi', '1'),
(46, 'TR000007', '0000-00-00', 'JNE', 'Bekasi', '1'),
(47, 'TR000008', '0000-00-00', 'JNE', 'Bekasi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kd_produk` char(4) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `nama_produk` char(50) NOT NULL,
  `deskripsi` varchar(700) NOT NULL,
  `berat` int(4) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `diskon` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_pemesanan` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kd_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `berat`, `harga`, `stok`, `gambar`, `diskon`, `status`, `status_pemesanan`) VALUES
('P001', 2, 'Isi Ulang Air Galon 19 lt Biasa', 'Air minum isi ulang ukuran 19 lt', 3000, 5000, 300, 'galon 19 lt isi ulang.png', 10, 0, '1'),
('P002', 2, 'Isi Ulang Air Galon 12 lt Biasa', 'Diisi ulang dengan proses filterisasi yang bersih, aman dan higenis.', 3000, 3000, 0, 'galon 12 lt isi ulang.png', 0, 0, '0'),
('P003', 2, 'Isi Ulang Air Galon 10 lt Biasa', 'Diisi ulang dengan proses filterisasi yang bersih, aman dan higenis.', 2000, 2500, 500, 'galon 10 lt isi ulang.png', 0, 0, '1'),
('P004', 3, 'Galon 19 liter', ' Kemasan ini banyak digunakan dalam industri minuman dan tersedia dalam berbagai ukuran sesuai kebutuhan. ', 400, 40000, 5, 'galon 19 ltr.png', 10, 0, '0'),
('P005', 3, 'Galon 19 ltr keran', 'Galo Kemasan ini banyak digunakan dalam industri minuman dan tersedia dalam berbagai ukuran sesuai kebutuhan. ', 400, 45000, 0, 'galon 19  lt keran.png', 10, 1, '0'),
('P006', 3, 'Galon 12 ltr keran', ' Kemasan ini banyak digunakan dalam industri minuman dan tersedia dalam berbagai ukuran sesuai kebutuhan. ', 300, 30000, 19, 'galon 12 lt keran.png', 0, 0, '0'),
('P007', 3, 'Galon 10 ltr keran', ' Kemasan ini banyak digunakan dalam industri minuman dan tersedia dalam berbagai ukuran sesuai kebutuhan. ', 250, 25000, 20, 'galon 10 lt keran.png', 0, 0, '0'),
('P008', 2, 'Isi Ulang Air Galon 19 lt RO', 'Diisi ulang dengan proses filterisasi RO yang bersih, aman dan higenis.', 3000, 8000, 300, 'galon 19 ltr isi ulang RO.png', 0, 0, '0'),
('P009', 2, 'Isi Ulang Air Galon 12 lt RO', 'Diisi ulang dengan proses filterisasi RO yang bersih, aman dan higenis.', 3000, 6000, 300, 'galon 12 ltr isi ulang RO.png', 0, 0, '1'),
('P010', 2, 'Isi Ulang Air Galon 10 lt RO', 'DiiDiisi ulang dengan filterisasi RO yang aman, bersih dan higenis', 3000, 5000, 300, 'galon 10 ltr isi ulang RO.png', 0, 0, '1'),
('P011', 3, 'Cartridge Nano Filter 10inc', 'Cartridge filter yang terbuat dari spoon (PolyPropylene = PP)', 250, 6000, 0, 'Catridge filter air Nano Filter 10inc.png', 0, 0, '0'),
('P012', 3, 'Cartridge filter CTO 10inc', 'Cartridge CTO ini terbuat dari bahan karbon aktif yang dipadatkan dan cartridge ini harus dimasukan ke dalam housing filter sesuai ukurannya.', 250, 25000, 10, 'Catridge filter CTO.png', 0, 0, '0'),
('P013', 3, 'Housing filter 10inc 1 set', 'Fungsi Housing Filter adalah untuk menempatkan cartridge filter, housing ini berukuran 10inc.', 1000, 90000, 5, 'Housing filter 10inc 1 Set.png', 0, 0, '0'),
('P014', 3, 'Adaptor 24v DC 2', 'Booster pump ini yaitu pompa yang bertujuan untuk menarik air dari tahap 2 dan tekanan air di membrane di tahap 4. Digunakan pada 50 gpd, 75 gpd, hingga sampai 200 gpd.', 500, 185000, 2, 'Adaptor 24v DC 2A untuk pompa booster RO.png', 0, 0, '0'),
('P015', 3, 'Lampu UV 8 GPM depot', 'Alat ini berfungsi untuk mensterilisasikan air minum dari kuman, bakteri sehingga akan dibunuh oleh ultraviolet. alat ini lengkap satu set terdiri dari UV dan Ballast.', 3000, 900000, 2, 'Lampu UV 8 GPM depot.png', 10, 1, '0'),
('P016', 3, 'Mesin Reserve Osmosis Micron 100 Gdp', 'Mesin Reverse Osmosis (RO) Micron ini sudah komplit 1 set dan sudah siap untuk langsung dipasang dengan mengambil jalur inlet dari keran air yang ada di rumah.', 5000, 1750000, 1, 'Mesin Reserve Osmosis Micron 100 Gdp.png', 10, 1, '0'),
('P017', 3, 'Membran RO 100 Gdp', 'Membran Reverse Osmosis berfungsi untuk menyaring atau memfilter air dari kandungan logam, virus atau bakteri sehingga menghasilkan air murni bebas dari pencemaran.', 500, 250000, 4, 'Membran RO 100 gdp.png', 0, 0, '0'),
('P018', 3, 'Ozone Generator O3', 'Ozone juga disebut O3, oksigen segar, adalah sejenis gas yang tidak berwarna, tidak beracun, memiliki sedikit aroma daun segar karena Ozone memiliki kemampuan menembus yang sangat kuat.', 1000, 500000, 3, 'Ozone Generator O3.png', 0, 0, '0'),
('P019', 3, 'Tutup galon per 1pack/1000 pcs', 'Tutup Galon Air Minum Isi Ulang ( isi +- 1000 pcs ). Produk merupakan barang asli/premium quality. ', 2500, 100000, 10, 'tutup galon 1000 pcs.png', 0, 0, '0'),
('P020', 3, 'Tutup galon per 1pack/100 pcs', 'Tutup Galon Air Minum Isi Ulang ( isi +- 100 pcs). Produk merupakan barang asli/premium quality.', 250, 10000, 50, 'tutup galon 100 pcs.png', 0, 0, '0'),
('P021', 3, 'Tissue galon per 1pack/100 pcs', 'Tissue Galon Air Minum Isi Ulang ( isi +- 100 pcs). Produk merupakan barang asli/premium quality.', 100, 5000, 50, 'tissue galon 100 pcs.png', 0, 0, '0'),
('P022', 3, 'Paket tutup 1000 pcs+tissue 10 pack', 'Tissue dan  Tutup Galon Air Minum Isi Ulang ( isi masing-masing +- 1000 pcs). Produk merupakan barang asli/premium quality', 3500, 140000, 5, 'Paket tutup 1000 pcs+tissue 10 pack.png', 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reward`
--

CREATE TABLE `tbl_reward` (
  `id_reward` int(11) NOT NULL,
  `nama_reward` char(30) NOT NULL,
  `poin` int(11) NOT NULL,
  `harga_poin` int(11) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reward`
--

INSERT INTO `tbl_reward` (`id_reward`, `nama_reward`, `poin`, `harga_poin`, `ket`) VALUES
(1, 'Reward Poin', 1, 100, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_order` char(10) NOT NULL,
  `id_pelanggan` char(10) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `jenis_byr` enum('e-wallet','TF') NOT NULL,
  `jml_byr` int(11) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `tgl_byr` date NOT NULL,
  `bukti_byr` char(30) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_order`, `id_pelanggan`, `tgl_pemesanan`, `jenis_byr`, `jml_byr`, `ongkir`, `tgl_byr`, `bukti_byr`, `status`) VALUES
('TR000001', 'PLN00004', '2021-07-15', 'TF', 45000, 0, '2021-07-15', 'byr2.png', '6'),
('TR000002', 'PLN00004', '2021-07-15', 'TF', 44000, 0, '2021-07-15', 'byr3.jpg', '6'),
('TR000003', 'PLN00004', '2021-07-15', 'TF', 39900, 0, '2021-07-15', 'byr2.png', '6'),
('TR000004', 'PLN00004', '2021-07-16', 'TF', 40000, 0, '0000-00-00', '-', '1'),
('TR000005', 'PLN00004', '2021-07-23', 'TF', 267000, 42000, '0000-00-00', '-', '1'),
('TR000006', 'PLN00004', '2021-07-23', 'TF', 97500, 21000, '0000-00-00', '-', '1'),
('TR000007', 'PLN00004', '2021-07-24', 'TF', 130500, 42000, '2021-07-24', 'tukar poin.JPG', '6'),
('TR000008', 'PLN00004', '2021-07-24', 'TF', 61500, 21000, '2021-07-24', 'aaaa.JPG', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` char(10) NOT NULL,
  `nama_user` char(30) NOT NULL,
  `username` char(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Admin','Pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('US001', 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('US003', 'Tuminem', 'tuminem', 'a36f5d5ed3f504bd8f171359e60c8bf4', 'Pemilik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_wilayah`, `nama_wilayah`, `ongkir`) VALUES
(1, 'Bojong - Kuningan', 0),
(2, 'Bekasi', 21000),
(3, 'Bandung', 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`kd_keranjang`),
  ADD KEY `id_konsumen` (`id_pelanggan`),
  ADD KEY `kd_produk` (`kd_produk`),
  ADD KEY `kd_produk_2` (`kd_produk`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_wilayah` (`id_wilayah`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_penjualan` (`id_order`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kd_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_reward`
--
ALTER TABLE `tbl_reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_konsumen` (`id_pelanggan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_detail_order`
--
ALTER TABLE `tbl_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `kd_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_reward`
--
ALTER TABLE `tbl_reward`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `tbl_pelanggan_ibfk_1` FOREIGN KEY (`id_wilayah`) REFERENCES `tbl_wilayah` (`id_wilayah`);

--
-- Constraints for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD CONSTRAINT `tbl_pengiriman_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tbl_transaksi` (`id_order`);

--
-- Constraints for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD CONSTRAINT `tbl_produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`);

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
