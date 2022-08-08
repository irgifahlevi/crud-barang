-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2022 pada 04.45
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_evaluasi_pert7`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mst_barang`
--

CREATE TABLE `tbl_mst_barang` (
  `barang_id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mst_barang`
--

INSERT INTO `tbl_mst_barang` (`barang_id`, `kode_barang`, `nama_barang`, `jumlah`, `harga`) VALUES
(10, 'QA0001', 'Kabel USB', '2', '15000'),
(12, 'QA0002', 'Sabun', '15', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mst_user`
--

CREATE TABLE `tbl_mst_user` (
  `user_id` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `user_name_login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mst_user`
--

INSERT INTO `tbl_mst_user` (`user_id`, `nama_anggota`, `user_name_login`, `password`) VALUES
(5, 'budi', '00dfc53ee86af02e742515cdcf075ed3', 'b0baee9d279d34fa1dfd71aadb908c3f'),
(6, 'wawan', '0a000f688d85de79e3761dec6816b2a5', '698d51a19d8a121ce581499d7b701668'),
(7, 'irgi', 'b260295ba7a66b27ae7950b312ee92fd', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'maman', '6ffee7d3af984c95d72d813efda2d919', '6ffee7d3af984c95d72d813efda2d919'),
(9, 'ujang', 'ujang', 'ujang'),
(10, 'supri', 'f4d97d7df30acdd7612605f460cb50eb', 'd79444495ba8886c397b418227564d3f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trx_order`
--

CREATE TABLE `tbl_trx_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `jumlah_pesanan` decimal(10,0) NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `total_harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_trx_order`
--

INSERT INTO `tbl_trx_order` (`order_id`, `user_id`, `barang_id`, `no_invoice`, `jumlah_pesanan`, `harga_satuan`, `total_harga`) VALUES
(1, 8, 1, 'INV0001', '3', '1000', '3000'),
(6, 5, 1, 'git', '2', '3000', '6000'),
(7, 10, 7, 'INV004', '20', '90000', '1800000'),
(8, 8, 3, 'INV005', '20', '3000', '60000'),
(11, 9, 4, 'INV007', '20', '3000', '60000'),
(12, 10, 12, 'INV009', '2', '3000', '6000'),
(14, 9, 12, 'INV010', '2', '1000', '2000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_mst_barang`
--
ALTER TABLE `tbl_mst_barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `tbl_mst_user`
--
ALTER TABLE `tbl_mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tbl_trx_order`
--
ALTER TABLE `tbl_trx_order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `u_tbl_trx_order_1` (`no_invoice`),
  ADD KEY `fk_tbl_trx_order_1` (`user_id`),
  ADD KEY `fk_tbl_trx_order_2` (`barang_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_mst_barang`
--
ALTER TABLE `tbl_mst_barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_mst_user`
--
ALTER TABLE `tbl_mst_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_trx_order`
--
ALTER TABLE `tbl_trx_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_trx_order`
--
ALTER TABLE `tbl_trx_order`
  ADD CONSTRAINT `fk_tbl_trx_order_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_mst_user` (`user_id`),
  ADD CONSTRAINT `fk_tbl_trx_order_2` FOREIGN KEY (`barang_id`) REFERENCES `tbl_mst_barang` (`barang_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
