-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 08:27 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bundascarf`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` varchar(10) NOT NULL,
  `NAMA_KATEGORI` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('001', 'Jilbab'),
('002', 'Peci'),
('003', 'Sarung'),
('004', 'Selimut'),
('005', 'Kerudung'),
('006', 'Hijab');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sub`
--

CREATE TABLE `kategori_sub` (
  `ID_SUB` int(11) NOT NULL,
  `ID_KATEGORI` varchar(16) NOT NULL,
  `JENIS_PRODUK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_sub`
--

INSERT INTO `kategori_sub` (`ID_SUB`, `ID_KATEGORI`, `JENIS_PRODUK`) VALUES
(1, '001', 'Sorong'),
(2, '001', 'Segiempat'),
(3, '001', 'Sekolah'),
(4, '001', 'Anak'),
(5, '001', 'Pashmina'),
(6, '001', 'Kaos'),
(7, '002', 'AC Kotak'),
(8, '002', 'Bulat Haji'),
(9, '003', 'Dewasa'),
(10, '003', 'Anak'),
(11, '004', 'Jumbo'),
(12, '004', 'Cinta'),
(13, '004', 'Single'),
(14, '006', 'Spandex');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_CUST` varchar(10) NOT NULL,
  `NAMA_CUST` varchar(32) DEFAULT NULL,
  `ALAMAT` text,
  `EMAIL` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID_CUST`, `NAMA_CUST`, `ALAMAT`, `EMAIL`) VALUES
('000', NULL, NULL, NULL),
('001', 'Tommy', 'Jl. Dago Barat', 'tommygaool@gmail.com'),
('002', 'Imam', 'Jl. Sadang Serang', 'imamalromu@gmail.com'),
('003', 'Yusuf', 'Jl. Sadang Serang', 'yusufnofianto@gmail.com'),
('004', 'Wildan', 'Jl. Lembang AURI', 'wildanalwi@yahoo.co.id'),
('005', 'Hilman', 'Jl. Raya Cibiru', 'hilmananshari@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `ID_PEMBELIAN` varchar(24) NOT NULL,
  `ID_USER` varchar(10) NOT NULL,
  `ID_SUPP` varchar(10) NOT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `TOTAL` int(11) NOT NULL,
  `ADMIN` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`ID_PEMBELIAN`, `ID_USER`, `ID_SUPP`, `TANGGAL_PEMBELIAN`, `TOTAL`, `ADMIN`) VALUES
('BL-0001', 'U001', '010', '2017-01-16', 185500, 'hutomo khairinnas'),
('BL-0002', 'U001', '010', '2017-01-16', 190000, 'hutomo khairinnas'),
('BL-0003', 'U001', '004', '2017-01-26', 15000, 'hutomo khairinnas'),
('BL-0004', 'U001', '009', '2017-01-29', 40000, 'hutomo khairinnas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `ID_PROD` varchar(16) NOT NULL,
  `ID_PEMBELIAN` varchar(24) NOT NULL,
  `NAMA_PROD` varchar(32) NOT NULL,
  `JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`ID_PROD`, `ID_PEMBELIAN`, `NAMA_PROD`, `JUMLAH`) VALUES
('PRD-00012', 'BL-0001', 'MyLove Jumbo', 1),
('PRD-00012', 'BL-0002', 'MyLove Jumbo', 1),
('PRD-00013', 'BL-0003', 'Rabbani Fushia', 1),
('PRD-00015', 'BL-0004', 'Batu Berlian', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `ID_PENJUALAN` varchar(24) NOT NULL,
  `ID_USER` varchar(10) DEFAULT NULL,
  `TOTAL` int(11) NOT NULL,
  `ID_CUST` varchar(10) NOT NULL,
  `TANGGAL_PENJUALAN` date DEFAULT NULL,
  `KASIR` varchar(20) NOT NULL,
  `DISK` int(11) NOT NULL,
  `TOTAL_DISK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`ID_PENJUALAN`, `ID_USER`, `TOTAL`, `ID_CUST`, `TANGGAL_PENJUALAN`, `KASIR`, `DISK`, `TOTAL_DISK`) VALUES
('JL-0001', 'U003', 1308000, '004', '2017-01-16', 'khairinissa', 5, 1242600),
('JL-0002', 'U003', 180000, '000', '2017-01-16', 'khairinissa', 0, 180000),
('JL-0003', 'U003', 30000, '000', '2017-01-29', 'khairinissa', 0, 30000),
('JL-0004', 'U003', 12000, '004', '2017-01-29', 'khairinissa', 5, 11400),
('JL-0005', 'U003', 78000, '001', '2017-01-29', 'khairinissa', 5, 74100),
('JL-0006', 'U003', 84000, '000', '2017-02-01', 'khairinissa', 0, 84000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_produk`
--

CREATE TABLE `penjualan_produk` (
  `ID_PROD` varchar(16) NOT NULL,
  `ID_PENJUALAN` varchar(24) NOT NULL,
  `NAMA_PROD` varchar(32) NOT NULL,
  `JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_produk`
--

INSERT INTO `penjualan_produk` (`ID_PROD`, `ID_PENJUALAN`, `NAMA_PROD`, `JUMLAH`) VALUES
('PRD-00001', 'JL-0005', 'Amory Shwal', 1),
('PRD-00010', 'JL-0001', 'MyLove Single', 7),
('PRD-00011', 'JL-0001', 'Paris Segiempat', 25),
('PRD-00011', 'JL-0002', 'Paris Segiempat', 15),
('PRD-00014', 'JL-0003', 'Batu Permata', 1),
('PRD-00015', 'JL-0004', 'Batu Berlian', 1),
('PRD-00015', 'JL-0005', 'Batu Berlian', 1),
('PRD-00016', 'JL-0006', 'M. Iming', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ID_PROD` varchar(12) NOT NULL,
  `ID_SUPP` varchar(10) DEFAULT NULL,
  `ID_KATEGORI` varchar(10) DEFAULT NULL,
  `ID_SUB` int(11) NOT NULL,
  `NAMA_PROD` varchar(99) DEFAULT NULL,
  `STOK` int(11) DEFAULT NULL,
  `HARGA_BELI` int(11) DEFAULT NULL,
  `HARGA_JUAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ID_PROD`, `ID_SUPP`, `ID_KATEGORI`, `ID_SUB`, `NAMA_PROD`, `STOK`, `HARGA_BELI`, `HARGA_JUAL`) VALUES
('PRD-00001', '004', '001', 5, 'Amory Shwal', 50, 45000, 54000),
('PRD-00002', '007', '003', 9, 'Wadimor', 95, 45000, 54000),
('PRD-00003', '002', '002', 7, 'H. Imitas', 47, 23000, 27600),
('PRD-00004', '009', '001', 3, 'Rabbani Livy', 61, 18000, 21600),
('PRD-00005', '010', '004', 11, 'Internal Jumbo', 25, 210000, 252000),
('PRD-00006', '002', '002', 8, 'H. Lucky', 95, 12500, 15000),
('PRD-00007', '006', '003', 9, 'Gajah Duduk', 260, 50000, 60000),
('PRD-00008', '004', '001', 5, 'Hanatajima Instant', 90, 48000, 57600),
('PRD-00009', '009', '001', 3, 'Rabbani Cadilac', 145, 35000, 42000),
('PRD-00010', '010', '004', 13, 'MyLove Single', 65, 120000, 144000),
('PRD-00011', '004', '001', 2, 'Paris Segiempat', 285, 10000, 12000),
('PRD-00012', '010', '004', 11, 'MyLove Jumbo', 20, 190000, 222000),
('PRD-00013', '004', '001', 6, 'Rabbani Fushia', 18, 15000, 18000),
('PRD-00014', '009', '006', 14, 'Batu Permata', 8, 25000, 30000),
('PRD-00015', '009', '006', 14, 'Batu Berlian', 9, 20000, 24000),
('PRD-00016', '002', '002', 7, 'M. Iming', 18, 35000, 42000);

-- --------------------------------------------------------

--
-- Table structure for table `produk_stok`
--

CREATE TABLE `produk_stok` (
  `ID_STOK` int(11) NOT NULL,
  `ID_PROD` varchar(13) NOT NULL,
  `STOK` int(11) NOT NULL,
  `S` int(11) NOT NULL,
  `M` int(11) NOT NULL,
  `L` int(11) NOT NULL,
  `XL` int(11) NOT NULL,
  `ALL_SIZE` int(11) NOT NULL,
  `s1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `l3` int(11) NOT NULL,
  `xl4` int(11) NOT NULL,
  `as5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_stok`
--

INSERT INTO `produk_stok` (`ID_STOK`, `ID_PROD`, `STOK`, `S`, `M`, `L`, `XL`, `ALL_SIZE`, `s1`, `m2`, `l3`, `xl4`, `as5`) VALUES
(1, 'PRD-00001', 50, 7, 11, 11, 7, 0, 0, 0, 0, 0, 0),
(2, 'PRD-00002', 95, 0, 0, 47, 48, 0, 0, 0, 0, 0, 0),
(3, 'PRD-00003', 47, 0, 0, 0, 0, 0, 0, 14, 9, 24, 0),
(4, 'PRD-00004', 61, 9, 14, 19, 19, 0, 0, 0, 0, 0, 0),
(6, 'PRD-00005', 25, 0, 0, 10, 15, 0, 0, 0, 0, 0, 0),
(7, 'PRD-00006', 95, 0, 0, 0, 0, 0, 20, 25, 25, 20, 5),
(8, 'PRD-00007', 260, 0, 100, 100, 60, 0, 0, 0, 0, 0, 0),
(9, 'PRD-00008', 90, 0, 35, 35, 20, 0, 0, 0, 0, 0, 0),
(10, 'PRD-00009', 145, 35, 40, 35, 35, 0, 0, 0, 0, 0, 0),
(11, 'PRD-00010', 58, 30, 28, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'PRD-00011', 260, 0, 90, 85, 85, 0, 0, 0, 0, 0, 0),
(13, 'PRD-00012', 20, 1, 1, 5, 13, 0, 0, 0, 0, 0, 0),
(14, 'PRD-00013', 18, 5, 5, 5, 3, 0, 0, 0, 0, 0, 0),
(16, 'PRD-00014', 8, 0, 3, 2, 1, 2, 0, 0, 0, 0, 0),
(17, 'PRD-00015', 9, 1, 2, 2, 2, 2, 0, 0, 0, 0, 0),
(18, 'PRD-00016', 18, 0, 0, 0, 0, 0, -1, -1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPP` varchar(10) NOT NULL,
  `NAMA_SUPP` varchar(32) DEFAULT NULL,
  `NO_TELP_SUPP` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPP`, `NAMA_SUPP`, `NO_TELP_SUPP`) VALUES
('001', 'Toko Serba Ada', '081236547891'),
('002', 'Toko Serba Murah', '084526985478'),
('003', 'Toko Sumber Berkah', '085698547859'),
('004', 'PD. Konveksi Scarf', '081258963565'),
('005', 'PT. Selalu Jayatex', '084526985478'),
('006', 'PT. Gajah Doedoek', '081525856936'),
('007', 'PT. Wadimoer', '02158589686'),
('008', 'PT. Atalaes', '02158569856'),
('009', 'PD. Makmur Scarf', '085245869586'),
('010', 'PD. Serba Konveksi', '089585698547');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANS` int(11) NOT NULL,
  `ID_PENJUALAN` varchar(12) DEFAULT NULL,
  `ID_PEMBELIAN` varchar(12) DEFAULT NULL,
  `TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(10) NOT NULL,
  `NAMA_USER` varchar(32) DEFAULT NULL,
  `USERNAME` varchar(12) DEFAULT NULL,
  `PASSWORD` varchar(16) DEFAULT NULL,
  `LEVEL` enum('Admin','Gudang','Penjualan','') DEFAULT NULL,
  `NO_HP` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `USERNAME`, `PASSWORD`, `LEVEL`, `NO_HP`) VALUES
('U001', 'hutomo khairinnas', 'admin', 'admin', 'Admin', '081220848525'),
('U002', 'bunda nur', 'gudang', 'gudang', 'Gudang', '082172834111'),
('U003', 'khairinissa', 'penjualan', 'penjualan', 'Penjualan', '085222751051');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `kategori_sub`
--
ALTER TABLE `kategori_sub`
  ADD PRIMARY KEY (`ID_SUB`),
  ADD KEY `ID_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_CUST`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`ID_PEMBELIAN`),
  ADD KEY `FK_MELAKUKAN_PEMBELIAN` (`ID_USER`),
  ADD KEY `FK_MEMBELI_KE_SUPPLIER` (`ID_SUPP`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`ID_PROD`,`ID_PEMBELIAN`),
  ADD KEY `FK_PEMBELIAN_PRODUK2` (`ID_PEMBELIAN`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`ID_PENJUALAN`),
  ADD KEY `FK_MENJUAL_KE` (`ID_CUST`),
  ADD KEY `FK_USER_MENJUAL` (`ID_USER`);

--
-- Indexes for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD PRIMARY KEY (`ID_PROD`,`ID_PENJUALAN`),
  ADD KEY `FK_PENJUALAN_PRODUK2` (`ID_PENJUALAN`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_PROD`),
  ADD KEY `FK_BARANG_DARI` (`ID_SUPP`),
  ADD KEY `FK_PENGKATEGORIAN` (`ID_KATEGORI`);

--
-- Indexes for table `produk_stok`
--
ALTER TABLE `produk_stok`
  ADD PRIMARY KEY (`ID_STOK`),
  ADD KEY `ID_PROD` (`ID_PROD`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPP`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANS`),
  ADD KEY `ID_PENJUALAN` (`ID_PENJUALAN`,`ID_PEMBELIAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_sub`
--
ALTER TABLE `kategori_sub`
  MODIFY `ID_SUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk_stok`
--
ALTER TABLE `produk_stok`
  MODIFY `ID_STOK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANS` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_sub`
--
ALTER TABLE `kategori_sub`
  ADD CONSTRAINT `kategori_sub_ibfk_1` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_MELAKUKAN_PEMBELIAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`),
  ADD CONSTRAINT `FK_MEMBELI_KE_SUPPLIER` FOREIGN KEY (`ID_SUPP`) REFERENCES `supplier` (`ID_SUPP`);

--
-- Constraints for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD CONSTRAINT `FK_PEMBELIAN_PRODUK` FOREIGN KEY (`ID_PROD`) REFERENCES `produk` (`ID_PROD`),
  ADD CONSTRAINT `FK_PEMBELIAN_PRODUK2` FOREIGN KEY (`ID_PEMBELIAN`) REFERENCES `pembelian` (`ID_PEMBELIAN`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_MENJUAL_KE` FOREIGN KEY (`ID_CUST`) REFERENCES `pelanggan` (`ID_CUST`),
  ADD CONSTRAINT `FK_USER_MENJUAL` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `penjualan_produk`
--
ALTER TABLE `penjualan_produk`
  ADD CONSTRAINT `FK_PENJUALAN_PRODUK` FOREIGN KEY (`ID_PROD`) REFERENCES `produk` (`ID_PROD`),
  ADD CONSTRAINT `FK_PENJUALAN_PRODUK2` FOREIGN KEY (`ID_PENJUALAN`) REFERENCES `penjualan` (`ID_PENJUALAN`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_BARANG_DARI` FOREIGN KEY (`ID_SUPP`) REFERENCES `supplier` (`ID_SUPP`),
  ADD CONSTRAINT `FK_PENGKATEGORIAN` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `produk_stok`
--
ALTER TABLE `produk_stok`
  ADD CONSTRAINT `produk_stok_ibfk_1` FOREIGN KEY (`ID_PROD`) REFERENCES `produk` (`ID_PROD`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
