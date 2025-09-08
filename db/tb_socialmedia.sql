-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2025 pada 17.45
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jagofurniture`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_socialmedia`
--

CREATE TABLE `tb_socialmedia` (
  `socialmedia_id` int(11) NOT NULL,
  `socialmedia_name` varchar(100) NOT NULL,
  `socialmedia_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_socialmedia`
--

INSERT INTO `tb_socialmedia` (`socialmedia_id`, `socialmedia_name`, `socialmedia_link`) VALUES
(1, 'Facebook', 'https://www.facebook.com/'),
(2, 'Instagram', 'https://www.instagram.com/'),
(3, 'Tiktok', 'https://www.tiktok.com/'),
(4, 'Youtube', 'https://www.youtube.com/');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_socialmedia`
--
ALTER TABLE `tb_socialmedia`
  ADD PRIMARY KEY (`socialmedia_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_socialmedia`
--
ALTER TABLE `tb_socialmedia`
  MODIFY `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
