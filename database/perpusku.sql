-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2025 pada 13.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaansdkrendetan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggotaa`
--

CREATE TABLE `tb_anggotaa` (
  `nis` int(5) NOT NULL,
  `nama_anggota` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggotaa`
--

INSERT INTO `tb_anggotaa` (`nis`, `nama_anggota`, `alamat`, `jenkel`, `kelas`) VALUES
(3968, 'Alfia Nur Asifa', 'Semawung', 'Perempuan', '3 SD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(25) NOT NULL,
  `judul_buku` varchar(20) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `pengarang` varchar(20) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `jumlah_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `penerbit`, `pengarang`, `tahun_terbit`, `jumlah_buku`) VALUES
(3434, 'Aku Aku', 'kakakak', 'akkaakka', 2012, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `nis` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_buku`, `nis`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(445, 3434, 3888, '2025-01-01', '2025-01-03', 'kembali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_anggotaa`
--
ALTER TABLE `tb_anggotaa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_anggotaa`
--
ALTER TABLE `tb_anggotaa`
  MODIFY `nis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000000;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2438883;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
