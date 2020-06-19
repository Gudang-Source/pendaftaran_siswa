-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2020 pada 11.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `ttl` varchar(128) NOT NULL,
  `warga_negara` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `asal` varchar(128) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `penghasilan` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `ttl`, `warga_negara`, `alamat`, `email`, `no_hp`, `asal`, `nama_ayah`, `nama_ibu`, `penghasilan`, `username`, `foto`) VALUES
(3, 'Laras Faizah', '', 'Indonesia', 'Jakarta', 'nuris.akbar@gmail.com', '0896962659', 'SMPN 234 Jakarta', 'Rohili', 'Supriyatin', '5700000', '', 'WhatsApp Image 2020-06-18 at 22.38.21.jpeg'),
(4, 'Novitasari Oktapiani', '', 'Indonesia', 'tipar cakung', 'novitasari@gmail.com', '085666771233', 'SMPN 236 Jakarta', 'Wawan', 'Rahma', '2560000', '', 'WhatsApp Image 2020-06-18 at 10.28.19 (1).jpeg'),
(5, 'julianto', '', 'Indonesia', 'Jakarta', 'julian@gmail.com', '085666771233', 'SMPN 14 Jakarta', 'budi', 'ani', '3000000', 'user7', 'WhatsApp Image 2020-06-18 at 22.38.21.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(80) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Aulia Syifa', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'Mukis Aditya', 'siswa1', '013f0f67779f3b1686c604db150d12ea', 'user'),
(9, 'Achmad Fauzi', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user'),
(10, 'Laras Faizah', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user'),
(12, 'Novitasari Oktapiani', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user'),
(15, 'julianto', 'user7', '3e0469fb134991f8f75a2760e409c6ed', 'user'),
(16, 'Lala Marsela', 'user5', '0a791842f52a0acfbb3a783378c066b8', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
