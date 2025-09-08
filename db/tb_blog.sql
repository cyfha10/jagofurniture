-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2025 pada 16.24
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
-- Struktur dari tabel `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_slug` varchar(255) NOT NULL,
  `blog_date` date NOT NULL,
  `blog_tittle` text NOT NULL,
  `blog_img_thumbnails` varchar(255) NOT NULL,
  `blog_img_header` varchar(255) NOT NULL,
  `blog_short` text NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_slug`, `blog_date`, `blog_tittle`, `blog_img_thumbnails`, `blog_img_header`, `blog_short`, `blog_desc`, `blog_created`) VALUES
(1, 'alasan-memilih-custom-furniture', '2025-09-07', '5 Alasan Memilih Custom Furniture untuk Rumah Anda', 'blog_01.jpg', '', 'Rumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\n', 'Rumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\nRumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\nRumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n', 'Jago Furniture'),
(2, 'tren-desain-custom-furniture', '2025-09-07', 'Tren Desain Custom Furniture 2025 yang Wajib Kamu Tahu', 'blog_02.jpg', '', 'Dunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n', 'Dunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n<br>\r\nDunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n<br>\r\nDunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n', 'Jago Furniture'),
(3, 'memilih-material-untuk-custom-furniture', '2025-09-07', 'Panduan Memilih Material untuk Custom Furniture', 'blog_03.jpg', '', 'Bahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n', 'Bahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n<br>\r\nBahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n\r\n<br>\r\n\r\nBahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n\r\n', 'Jago Furniture'),
(4, 'alasan-memilih-custom-furniture', '2025-09-07', '5 Alasan Memilih Custom Furniture untuk Rumah Anda', 'blog_01.jpg', '', 'Rumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\n', 'Rumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\nRumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n\r\nRumah Anda adalah cerminan kepribadian Anda. Jadi, kenapa harus puas dengan furnitur pasaran yang sama seperti milik orang lain? Custom furniture memberi Anda kebebasan untuk menentukan desain, material, dan ukuran yang pas, sehingga setiap sudut rumah terasa lebih personal.\r\n', 'Jago Furniture'),
(5, 'tren-desain-custom-furniture', '2025-09-07', 'Tren Desain Custom Furniture 2025 yang Wajib Kamu Tahu', 'blog_02.jpg', '', 'Dunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n', 'Dunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n<br>\r\nDunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n<br>\r\nDunia desain interior terus berkembang, dan tahun 2025 membawa angin segar untuk para pecinta custom furniture. Dari furnitur multifungsi hingga penggunaan material ramah lingkungan, tren tahun ini mengutamakan gaya hidup praktis dan berkelanjutan.\r\n', 'Jago Furniture'),
(6, 'memilih-material-untuk-custom-furniture', '2025-09-07', 'Panduan Memilih Material untuk Custom Furniture', 'blog_03.jpg', '', 'Bahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n', 'Bahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n<br>\r\nBahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n\r\n<br>\r\n\r\nBahan yang Anda pilih untuk custom furniture akan menentukan kualitas, tampilan, dan umur pemakaian furnitur tersebut. Memahami perbedaan material seperti solid wood, HPL, atau Duco akan membantu Anda membuat keputusan yang tepat sesuai kebutuhan.\r\n\r\n', 'Jago Furniture');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
