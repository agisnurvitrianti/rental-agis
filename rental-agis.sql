-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2024 pada 04.16
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental-agis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_costumer`
--

CREATE TABLE `data_costumer` (
  `id_costumer` int(10) NOT NULL,
  `nama_costumer` varchar(30) NOT NULL,
  `alamat_costumer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_costumer`
--

INSERT INTO `data_costumer` (`id_costumer`, `nama_costumer`, `alamat_costumer`, `no_hp`) VALUES
(1, 'AGIS', 'MAJALENGKA', '089754876388'),
(2, 'DINA', 'MAJA', '09645834678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mobil`
--

CREATE TABLE `data_mobil` (
  `kd_mobil` int(10) NOT NULL,
  `merk_mobil` varchar(30) NOT NULL,
  `type_mobil` varchar(30) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `harga_sewa` int(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_mobil`
--

INSERT INTO `data_mobil` (`kd_mobil`, `merk_mobil`, `type_mobil`, `id_kategori`, `harga_sewa`, `foto`) VALUES
(1, 'DAIHATSU', 'TERIOS', 1, 400000, 'dhts_terios.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'MANUAL'),
(2, 'MATIC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`no`, `username`, `password`) VALUES
(1, 'agis', 'agis'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_costumer` int(10) NOT NULL,
  `kd_mobil` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `tujuan_sewa` varchar(30) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_costumer`, `kd_mobil`, `id_kategori`, `tujuan_sewa`, `tgl_sewa`, `tgl_kembali`, `total_bayar`) VALUES
(1, 2, 1, 2, 'BANDUNG', '2024-08-12', '2024-08-13', 400000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_costumer`
--
ALTER TABLE `data_costumer`
  ADD PRIMARY KEY (`id_costumer`);

--
-- Indeks untuk tabel `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD PRIMARY KEY (`kd_mobil`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_costumer` (`id_costumer`),
  ADD KEY `kd_mobil` (`kd_mobil`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_mobil`
--
ALTER TABLE `data_mobil`
  ADD CONSTRAINT `data_mobil_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_costumer`) REFERENCES `data_costumer` (`id_costumer`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kd_mobil`) REFERENCES `data_mobil` (`kd_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
