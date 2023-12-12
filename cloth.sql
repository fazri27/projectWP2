-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 18.47
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloth`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `id_kategori`, `harga`, `deskripsi`, `gambar`) VALUES
(3, 'VISHES', 4, 299400, 'DESKRIPSI :\r\n\r\n- Terbuat dari kain denim yang dicuci \r\n- Pas lurus santai, pinggang biasa \r\n- Jahitan bartack pada titik stres vital \r\n- Zip terbang \r\n- Label kulit', 'vishes1.jpg'),
(4, 'RILEY', 6, 70980, 'DESKRIPSI :\r\n\r\n-Drill material\r\n-Dad\'s Hat\r\n-Six Panel\r\n-Script Embroidery Logo\r\n-Bright Orange Color\r\n-Emboroidered Ventilation eyelet\r\n-one size fits all', 'riley1.jpg'),
(7, 'BAJU', 1, 199999, 'deskripsi', 'dentonWhite11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kaos'),
(3, 'Jaket'),
(4, 'Celana'),
(6, 'Topi'),
(8, 'Sepatu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_katalog` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_katalog`, `ket`, `gambar`) VALUES
(7, 7, 'gambar 2', 'dentonWhite21.jpg'),
(8, 7, 'gambar 3', 'dentonWhite31.jpg'),
(11, 4, 'gambar 2', 'riley2.jpg'),
(12, 4, 'gambar 3', 'riley3.jpg'),
(13, 3, 'gambar 2', 'vishes2.jpg'),
(14, 3, 'gambar 3', 'vishes3.jpg'),
(15, 2, 'gambar 2', 'haerenOrange2.jpg'),
(17, 2, 'gambar 3', 'haerenOrange3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `rowid` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `nama_katalog` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jasa_pengirim` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `tgl_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `rowid`, `qty`, `harga`, `nama_katalog`, `subtotal`, `provinsi`, `kota`, `alamat`, `jasa_pengirim`, `total`, `tgl_transaksi`) VALUES
(1, 'a87ff679a2f3e71d9181a67b7542122c', 4, '70980', 'RILEY', '283920', NULL, 'bogor', 'cibuntu kaum', '2', '283920', 1671390708),
(2, 'a87ff679a2f3e71d9181a67b7542122c', 4, '70980', 'RILEY', '283920', NULL, '', '', '', '283920', 1671390783),
(3, 'a87ff679a2f3e71d9181a67b7542122c', 4, '70980', 'RILEY', '283920', NULL, 'dqwdq', 'dqwdqwd', 'JNE', '283920', 1671390817),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', NULL, 'dqwd', 'dqwdq', 'JNT', '960379', 1671390884),
(5, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', 'ada', 'dawd', 'asda', 'SiCepat', '960379', 1671391046),
(6, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '960379', 1671391562),
(7, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '70980', 1671391664),
(8, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '70980', 1671391734),
(9, 'c81e728d9d4c2f636f067f89cc14862c', 1, '390000', 'HAEREN ORANGE', '390000', '', '', '', '', '390000', 1671391854),
(10, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '370380', 1671392410),
(11, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '70980', 1671393278),
(12, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '70980', 1671393355),
(13, '8f14e45fceea167a5a36dedd4bea2543', 1, '199999', 'BAJU', '199999', '', '', '', '', '199999', 1671393410),
(14, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', '', '', '', '', '2074500', 1671426510),
(15, 'c9f0f895fb98ab9159f51fd0297e236d', 1, '1114121', 'fRUVKA', '1114121', 'jawa barat', 'bogor', 'jalan merdeka', 'JNE', '1114121', 1671426565),
(16, '8f14e45fceea167a5a36dedd4bea2543', 1, '199999', 'BAJU', '199999', 'jawa barat', 'bogor', 'jalan merdeka', 'JNT', '199999', 1671435181),
(17, 'a87ff679a2f3e71d9181a67b7542122c', 1, '70980', 'RILEY', '70980', 'jawa barat', 'bogor', 'asdas', 'JNE', '70980', 1671436021),
(18, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1, '299400', 'VISHES', '299400', 'jawa barat', 'bogor', 'jkjk', 'JNT', '299400', 1681200718),
(19, '8f14e45fceea167a5a36dedd4bea2543', 2, '199999', 'BAJU', '399998', 'bogor', 'jawa barat', 'qesdwq', 'JNE', '399998', 1685942033);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(4, 'siapa', 'siapa@gmail.com', 'user.png', '$2y$10$3tjRQlwUrUj/wf0WuZ1n4eLEHmTcxvqf/MxQn95o8/4sv8Sg7zZbO', 1, 1, 1670786964),
(10, 'admin', 'admin@gmail.com', 'admin.png', '$2y$10$u96VavITRcQhj4XJWjzot.HR3rmTcAfnxHufBwsydtSALVPZtS6Ve', 1, 1, 1670908008),
(11, 'kita', 'kita@gmail.com', 'user.png', '$2y$10$1UcUbt5dKsMsyWNatBLjUeD4AXYMNEJnlYtp4qf5iy.THe9X4Upw6', 2, 1, 1671229152),
(12, 'azis', 'azis@gmail.com', 'user.png', '$2y$10$qLwVWtJL2awjFv/qJ1WSH.aP7o.kQ4yTsvO8cCuW28VwzmKfaFVTu', 2, 1, 1671263050),
(13, 'farhan', 'farhan@gmail.com', 'user.png', '$2y$10$a.iNaMV6G9cGTOeq8m5eOe888N80Wez/fcjHnZg.I4jujjjA2V4UK', 2, 1, 1671393700),
(14, 'user', 'user@gmail.com', 'user.png', '$2y$10$kTMk58U/aqgVHuwWxS7LP.AbPp8xGSTXrOLz1RzlwElk.Hc6o7LeS', 2, 1, 1671425593),
(16, 'maul', 'maul123@gmail.com', 'user.png', '$2y$10$LGrD1iL3ieBn4bjrbQ3PteLTVMW9n7qFu4CynTJAinEbK4jAtR3Bm', 2, 1, 1681200650);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
