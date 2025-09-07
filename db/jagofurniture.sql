-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Sep 2025 pada 16.53
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
-- Struktur dari tabel `tb_banner`
--

CREATE TABLE `tb_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_tittle` text NOT NULL,
  `banner_sub` text NOT NULL,
  `banner_images` text NOT NULL,
  `banner_button` varchar(100) NOT NULL,
  `banner_buttonlink` text NOT NULL,
  `banner_category` varchar(100) NOT NULL DEFAULT 'banner 1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_banner`
--

INSERT INTO `tb_banner` (`banner_id`, `banner_tittle`, `banner_sub`, `banner_images`, `banner_button`, `banner_buttonlink`, `banner_category`) VALUES
(1, 'Jago Furniture', 'Jagonya Custom Furniture, Profesional dan berpengalaman lebih dari 10 tahun di Industri.', 'bg-home-07.jpg', 'Explore Website', '', 'banner 1'),
(2, 'Jago Furniture', 'Profesional dan berpengalaman lebih dari 10 tahun di Industri.', 'banner-01.jpg', 'Visit', 'https://jagofurniture.com/product.html', 'banner 1'),
(3, 'Custom', 'Custom Furniture', 'c_13.jpg', 'Hubungi Kami', 'https://wa.me/6287776304443', 'banner 2'),
(4, 'Project', 'Interior Design', 'c_14.jpg', 'Hubungi Kami', 'https://wa.me/6287776304443', 'banner 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_header`
--

CREATE TABLE `tb_header` (
  `header_id` int(11) NOT NULL,
  `slug` int(11) NOT NULL,
  `header_page` varchar(255) NOT NULL,
  `header_logo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `header_tittle` varchar(255) NOT NULL,
  `header_description` text NOT NULL,
  `header_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_header`
--

INSERT INTO `tb_header` (`header_id`, `slug`, `header_page`, `header_logo`, `header_tittle`, `header_description`, `header_keywords`) VALUES
(1, 0, 'beranda', 'logo.png', 'Jago Furniture - Mebel Jakarta', 'deskripsi', 'mebel jakarta'),
(2, 0, 'about', 'logo.png', 'Jago Furniture - Mebel Jakarta', 'deskripsi', 'mebel jakarta'),
(3, 0, 'product', 'logo.png', 'Jago Furniture - Mebel Jakarta', 'deskripsi', 'mebel jakarta'),
(4, 0, 'blog', 'logo.png', 'Jago Furniture - Mebel Jakarta', 'deskripsi', 'mebel jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_category_name` text NOT NULL,
  `product_images` text NOT NULL,
  `product_favorite` varchar(100) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `product_category_id`, `product_category_name`, `product_images`, `product_favorite`) VALUES
(1, 1, 'Booth', 'booth1.jpg', 'yes'),
(2, 1, 'Booth ', 'booth2.jpg', 'yes'),
(3, 1, 'Booth Portable', 'portable1.jpg', 'yes'),
(4, 1, 'Booth', 'booth4.jpg', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_category`
--

CREATE TABLE `tb_product_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product_category`
--

INSERT INTO `tb_product_category` (`category_id`, `category_name`) VALUES
(1, 'Booth'),
(2, 'Booth Portable'),
(3, 'Gerobak Kontainer'),
(4, 'Gerobak Dorong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_images` text NOT NULL,
  `testimoni_rate` int(11) NOT NULL,
  `testimoni_desc` text NOT NULL,
  `testimoni_name` varchar(255) NOT NULL,
  `testimoni_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indeks untuk tabel `tb_header`
--
ALTER TABLE `tb_header`
  ADD PRIMARY KEY (`header_id`);

--
-- Indeks untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indeks untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_header`
--
ALTER TABLE `tb_header`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `tb_product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `tb_product_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
