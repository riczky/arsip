-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2021 pada 10.03
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `no_arsip` varchar(30) DEFAULT NULL,
  `nama_arsip` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(255) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `id_kategori`, `no_arsip`, `nama_arsip`, `deskripsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `id_jabatan`, `id_user`) VALUES
(7, 2, 'SK.666666', 'Bebas Bersyarat', 'Bebas Bersyarat 1', '2021-01-31', '2021-01-31', 'SK+Penetapan+Panitia+Pameran.pdf', 1, 1),
(9, 6, 'SK. 123123', 'Rapid Test', 'Rapid Test Covid 19', '2021-01-31', '2021-01-31', 'SE_Penerbitan_Surat_Keterangan_Dokter.pdf', 1, 1),
(10, 7, 'SA. 111111', 'Absensi Pegawai', 'Absensi Pegawai Bulan Februari 2021', '2021-02-01', '2021-02-01', 'Absensi.pdf', 1, 1),
(11, 5, 'SP. 981982/1212/21', 'Pedoman Nilai Rapot', 'Pedoman Nilai Rapot  2021', '2021-02-01', '2021-02-01', 'PEDOMAN_PENDATAAN_NILAI_RAPOR1.pdf', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Sekretaris'),
(2, 'Bendahara Keuangan'),
(3, 'Kemasyarakatan'),
(4, 'Sosial dan Budaya'),
(6, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Surat Keputusan'),
(3, 'Surat Masuk'),
(4, 'Surat Keluar'),
(5, 'Surat Edaran'),
(6, 'Surat Kesehatan'),
(7, 'Absensi ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1.admin, 2.user',
  `id_jabatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `id_jabatan`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Riczky', 'Jakarta', 1, 1),
(3, 'yahiko', 'e60c43d97055a87acdd33dc26cf1c74815417124', 'yahiko', 'amegakure', 2, 4),
(4, 'minato', '402d443fc8f01181c0400faef3515caba06ba90d', 'Minato', 'Konohagakure', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
