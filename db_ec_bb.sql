-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2021 pada 12.06
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ec_bb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `kode_bank` varchar(30) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_kategori` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_kategori`, `satuan`, `harga_pokok`, `harga_jual`, `diskon`, `deskripsi`) VALUES
('B00005', 'Butik Sewn by Widy', 'KG004', 'stel', 750000, 750000, 0, ''),
('B00006', 'Prasmanan Special Emmy Saelan', 'KG001', 'porsi', 27000, 27000, 0, NULL),
('B00007', 'Prasmanan Favorite Emmy Saelan', 'KG001', 'porsi', 30000, 30000, 0, NULL),
('B00008', 'Prasmanan Istimewa Emmy Saelan', 'KG001', 'porsi', 34000, 34000, 0, NULL),
('B00009', 'Butik Pengantin Alluria Baju Bodo', 'KG004', 'pcs', 150000, 150000, 0, NULL),
('B00010', 'Undangan Jenis Single Hardcover', 'KG005', 'pcs', 8000, 11000, 0, NULL),
('B00011', 'Butik Sewn by Widy', 'KG004', 'stel', 750000, 750000, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_awal`
--

CREATE TABLE `barang_awal` (
  `id_ba` varchar(30) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_kategori` varchar(30) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `harga_pokok` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `diskon` int(3) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_awal`
--

INSERT INTO `barang_awal` (`id_ba`, `nama_barang`, `kode_kategori`, `satuan`, `harga_pokok`, `harga_jual`, `diskon`, `deskripsi`) VALUES
('BA00001', 'Prasmanan Special Emmy Saelan', 'KG001', 'porsi', 27000, 27000, 0, ''),
('BA00002', 'Prasmanan Favorite Emmy Saelan', 'KG001', 'porsi', 30000, 30000, 0, ''),
('BA00003', 'Prasmanan Istimewa Emmy Saelan', 'KG001', 'porsi', 34000, 34000, 0, ''),
('BA00004', 'Butik Pengantin Alluria Baju Bodo', 'KG004', 'pcs', 150000, 150000, 0, ''),
('BA00005', 'Undangan Jenis Single Hardcover', 'KG005', 'pcs', 8000, 11000, 0, ''),
('BA00006', 'Butik Sewn by Widy', 'KG004', 'stel', 750000, 750000, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_image`
--

CREATE TABLE `barang_image` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_image`
--

INSERT INTO `barang_image` (`id`, `kode_barang`, `image`) VALUES
(8, 'B00005', 'sewnbywidy_1.jpg'),
(9, 'B00006', 'paket_a.jpg'),
(10, 'B00007', 'catering_c.jpeg'),
(11, 'B00008', 'catering_b.jpg'),
(12, 'B00009', 'butikpengantinAlluria Bajubodo_150k.jpg'),
(13, 'B00010', 'undangan_eksklusif_1-3.jpg'),
(14, 'B00011', 'sewnbywidy_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_image_awal`
--

CREATE TABLE `barang_image_awal` (
  `id` int(11) NOT NULL,
  `id_ba` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_image_awal`
--

INSERT INTO `barang_image_awal` (`id`, `id_ba`, `image`) VALUES
(1, 'BA00001', 'paket_a.jpg'),
(2, 'BA00002', 'catering_c.jpeg'),
(3, 'BA00003', 'catering_b.jpg'),
(4, 'BA00004', 'butikpengantinAlluria Bajubodo_150k.jpg'),
(5, 'BA00005', 'undangan_eksklusif_1-3.jpg'),
(6, 'BA00006', 'sewnbywidy_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_tambah_stok`
--

CREATE TABLE `history_tambah_stok` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(100) NOT NULL,
  `jml` int(11) NOT NULL,
  `w_insert` datetime NOT NULL,
  `id_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kode_kategori` varchar(30) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kode_kategori`, `kategori`, `w_insert`, `w_update`, `id_user`) VALUES
('KG001', 'Catering', '2021-06-04 01:39:42', NULL, '58'),
('KG002', 'Gedung', '2021-06-04 01:40:00', NULL, '58'),
('KG003', 'Fotografer', '2021-06-04 01:40:20', NULL, '58'),
('KG004', 'Busana & Riasan', '2021-06-04 01:40:48', NULL, '58'),
('KG005', 'Undangan', '2021-06-04 01:44:52', NULL, '58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_transaksi` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `id_account` varchar(6) NOT NULL,
  `alamat_tujuan` varchar(300) NOT NULL,
  `contact_alt` varchar(50) NOT NULL,
  `img_pembayaran` varchar(50) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `keterangan` varchar(300) DEFAULT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `id_user` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_transaksi`, `tgl`, `id_account`, `alamat_tujuan`, `contact_alt`, `img_pembayaran`, `total_bayar`, `status`, `keterangan`, `w_insert`, `w_update`, `id_user`) VALUES
('160BF9BE29D42B', '2021-06-09', '1', 'jl. singa', 'wilda/082123123876', '118989644_245156053427534_7062326275285431372_n.jp', 8950000, 'Dikirim', 'harap menunggu', '2021-06-09 00:33:42', '2021-07-11 18:32:59', '58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `no_transaksi`, `kode_barang`, `jumlah`, `total`) VALUES
(1, '160BF9BE29D42B', 'B00006', 100, 2700000),
(2, '160BF9BE29D42B', 'B00011', 1, 750000),
(3, '160BF9BE29D42B', 'B00010', 500, 5500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` varchar(10) NOT NULL,
  `nama_toko` varchar(150) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `motto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `telephone`, `motto`) VALUES
('system', 'Wedding Solution', '081234567890', 'Solusi vendor dan paket untuk pernikahan anda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `kode_barang` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`kode_barang`, `stok`) VALUES
('B00001', 0),
('B00002', 0),
('B00003', 0),
('B00004', 0),
('B00005', 2),
('B00006', 49800),
('B00007', 50000),
('B00008', 50000),
('B00009', 90),
('B00010', 89000),
('B00011', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_awal`
--

CREATE TABLE `stok_awal` (
  `id_ba` varchar(30) NOT NULL,
  `kode_barang` varchar(30) DEFAULT NULL,
  `stok_awal` int(11) NOT NULL,
  `kode_supplier` varchar(30) DEFAULT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `publish` varchar(1) NOT NULL DEFAULT '0',
  `publish_by` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_awal`
--

INSERT INTO `stok_awal` (`id_ba`, `kode_barang`, `stok_awal`, `kode_supplier`, `w_insert`, `w_update`, `id_user`, `publish`, `publish_by`) VALUES
('BA00001', 'B00006', 50000, 'SP003', '2021-06-04 03:19:52', '0000-00-00 00:00:00', '58', '1', '58'),
('BA00002', 'B00007', 50000, 'SP003', '2021-06-04 03:21:02', '0000-00-00 00:00:00', '58', '1', '58'),
('BA00003', 'B00008', 50000, 'SP003', '2021-06-04 03:21:47', '0000-00-00 00:00:00', '58', '1', '58'),
('BA00004', 'B00009', 90, 'SP004', '2021-06-04 03:25:03', '0000-00-00 00:00:00', '58', '1', '58'),
('BA00005', 'B00010', 90000, 'SP002', '2021-06-04 03:28:25', '0000-00-00 00:00:00', '58', '1', '58'),
('BA00006', 'B00011', 2, 'SP001', '2021-06-04 03:30:45', '0000-00-00 00:00:00', '58', '1', '58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `kode_supplier` varchar(30) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `kode_barang`, `kode_supplier`, `jumlah`, `w_insert`, `w_update`, `id_user`) VALUES
(1, 'B00005', 'SP001', 2, '2021-08-12 17:46:12', '0000-00-00 00:00:00', '58');

--
-- Trigger `stok_masuk`
--
DELIMITER $$
CREATE TRIGGER `stok_masuk_ai` AFTER INSERT ON `stok_masuk` FOR EACH ROW BEGIN
  UPDATE stok SET stok=stok+NEW.jumlah WHERE kode_barang=NEW.kode_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_masuk_bd` BEFORE DELETE ON `stok_masuk` FOR EACH ROW BEGIN
   UPDATE stok SET stok=stok-OLD.jumlah WHERE kode_barang=OLD.kode_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(30) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `supplier`, `w_insert`, `w_update`, `id_user`) VALUES
('SP001', 'Apollo Project', '2021-06-04 01:38:16', NULL, '58'),
('SP002', 'Undangan Eksklusif', '2021-06-04 01:38:56', NULL, '58'),
('SP003', 'Catering Emmy saelan', '2021-06-04 01:39:26', NULL, '58'),
('SP004', 'Alluria Bajubodo', '2021-06-04 02:15:47', NULL, '58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `level`, `username`, `password`, `nama_lengkap`, `aktif`) VALUES
(56, 'a', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Admin 2', '1'),
(58, 'a', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_account`
--

CREATE TABLE `users_account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `w_insert` datetime NOT NULL,
  `w_update` datetime DEFAULT NULL,
  `aktif` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_account`
--

INSERT INTO `users_account` (`id_account`, `username`, `password`, `nama_lengkap`, `email`, `alamat`, `telephone`, `w_insert`, `w_update`, `aktif`) VALUES
(1, 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user', 'user@gmail.com', 'jl.mon.emmy saelan', '081234567891', '2021-06-09 00:07:16', NULL, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_account_keranjang`
--

CREATE TABLE `users_account_keranjang` (
  `id` int(11) NOT NULL,
  `id_account` varchar(8) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `w_insert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_account_keranjang`
--

INSERT INTO `users_account_keranjang` (`id`, `id_account`, `kode_barang`, `jumlah`, `w_insert`) VALUES
(4, '1', 'B00010', 102, '2021-07-15 23:31:48'),
(5, '1', 'B00007', 100, '2021-07-15 23:32:57'),
(6, '1', 'B00009', 1, '2021-07-15 23:33:13'),
(7, '1', 'B00006', 1, '2021-08-12 13:09:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`kode_bank`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `barang_awal`
--
ALTER TABLE `barang_awal`
  ADD PRIMARY KEY (`id_ba`);

--
-- Indeks untuk tabel `barang_image`
--
ALTER TABLE `barang_image`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_image_awal`
--
ALTER TABLE `barang_image_awal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_tambah_stok`
--
ALTER TABLE `history_tambah_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indeks untuk tabel `stok_awal`
--
ALTER TABLE `stok_awal`
  ADD PRIMARY KEY (`id_ba`);

--
-- Indeks untuk tabel `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `users_account`
--
ALTER TABLE `users_account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indeks untuk tabel `users_account_keranjang`
--
ALTER TABLE `users_account_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_image`
--
ALTER TABLE `barang_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `barang_image_awal`
--
ALTER TABLE `barang_image_awal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `history_tambah_stok`
--
ALTER TABLE `history_tambah_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `users_account`
--
ALTER TABLE `users_account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_account_keranjang`
--
ALTER TABLE `users_account_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
