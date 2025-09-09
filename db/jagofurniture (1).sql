-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2025 pada 14.28
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
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `about_id` int(11) NOT NULL,
  `about_tittle` text NOT NULL,
  `about_sub` text NOT NULL,
  `about_img_header` text NOT NULL,
  `about_desc_1` text NOT NULL,
  `about_desc_2` text NOT NULL,
  `about_img_1` text NOT NULL,
  `about_desc_3` text NOT NULL,
  `about_alamat` text NOT NULL,
  `about_whatsapp` varchar(100) NOT NULL,
  `about_img_2` text NOT NULL,
  `about_desc_footer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`about_id`, `about_tittle`, `about_sub`, `about_img_header`, `about_desc_1`, `about_desc_2`, `about_img_1`, `about_desc_3`, `about_alamat`, `about_whatsapp`, `about_img_2`, `about_desc_footer`) VALUES
(1, 'About Us', '\"Jago Furniture\"<br>\r\nFurnitur custom yang dirancang untuk menciptakan ruangan yang lebih hidup dan fungsional untuk bisnis dan rumah Anda.', 'bg-about-us-02', 'Jago Furniture hadir untuk membantu Anda menciptakan furnitur yang benar-benar mencerminkan kepribadian dan kebutuhan ruang Anda.', 'Di Jago Furniture, kami percaya bahwa setiap rumah memiliki cerita, dan furnitur adalah bagian penting dari cerita itu. Itulah mengapa kami menawarkan layanan custom furniture – bukan sekadar menjual produk, tetapi membantu Anda mewujudkan ide menjadi kenyataan. <br> Dengan tim desainer berpengalaman dan pengrajin profesional, kami siap menciptakan furnitur yang unik, fungsional, dan berkualitas tinggi. Mulai dari pemilihan material, desain, hingga finishing, setiap detail dikerjakan dengan teliti agar sesuai dengan gaya hidup, ukuran ruangan, dan selera pribadi Anda. <br> Kami berkomitmen menghadirkan pengalaman yang menyenangkan: Konsultasi desain untuk menemukan konsep terbaik Proses produksi transparan sehingga Anda tahu setiap tahap pembuatan Hasil akhir berkualitas premium yang bertahan lama Bersama Jago Furniture, rumah Anda tidak hanya nyaman, tetapi juga penuh karakter.', 'b-17.jpg', 'Kami bekerja dengan proses yang jelas dan kolaboratif: Konsultasi awal – mendengar ide, gaya, dan kebutuhan Anda. Desain 3D & revisi – supaya Anda bisa melihat wujud furnitur sebelum diproduksi. Produksi oleh pengrajin ahli – dengan standar kualitas tinggi dan ketelitian pada detail. Pengiriman & pemasangan – hingga furnitur siap mempercantik ruang Anda.\r\n\r\nLebih dari sekadar membuat meja, lemari, atau kursi, misi kami adalah mewujudkan ruang yang nyaman, fungsional, dan mencerminkan siapa Anda. Dengan Jago Furniture, Anda mendapatkan furnitur yang bukan hanya dipakai – tetapi juga dinikmati setiap hari.', 'Jkt Outer Ring Road Jl. Raya Pondok Randu No.2, RW.2, Duri Kosambi, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11750\r\n', '+6287776304443', 'b-21.jpg', 'Jago Furniture adalah Usaha Dagang yang bergerak dibidang mebel dan custom furniture dengan memiliki pengalaman di bidang meuel lebih dari 10+ tahun melayani lebih dari 500+ customer di area jabodetabek');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_header`
--

CREATE TABLE `tb_header` (
  `header_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
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
(1, '', 'beranda', 'logo.png', 'Jago Furniture - Mebel Jakarta', 'deskripsi', 'mebel jakarta'),
(2, 'aboutus', 'about', 'logo.png', 'About Us - Jago Furniture', 'deskripsi', 'mebel jakarta'),
(3, 'product', 'product', 'logo.png', 'Product - Jago Furniture', 'deskripsi', 'mebel jakarta'),
(4, 'blog', 'blog', 'logo.png', 'Blog - Jago Furniture', 'deskripsi', 'mebel jakarta'),
(5, 'categories', 'category', 'logo.png', 'Category - Jago Furniture', 'deskripsi', 'mebel jakarta');

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
(4, 1, 'Booth', 'booth4.jpg', 'no'),
(5, 1, 'Booth', 'booth1.jpg', 'yes'),
(6, 1, 'Booth ', 'booth2.jpg', 'yes'),
(7, 1, 'Booth Portable', 'portable1.jpg', 'yes'),
(8, 1, 'Booth', 'booth4.jpg', 'no'),
(9, 1, 'Booth', 'booth1.jpg', 'yes'),
(10, 1, 'Booth ', 'booth2.jpg', 'yes'),
(11, 1, 'Booth Portable', 'portable1.jpg', 'yes'),
(12, 1, 'Booth', 'booth4.jpg', 'no'),
(13, 1, 'Booth', 'booth1.jpg', 'yes'),
(14, 1, 'Booth ', 'booth2.jpg', 'yes'),
(15, 1, 'Booth Portable', 'portable1.jpg', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_product_category`
--

CREATE TABLE `tb_product_category` (
  `category_id` int(11) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_product_category`
--

INSERT INTO `tb_product_category` (`category_id`, `category_slug`, `category_name`) VALUES
(1, 'booth', 'Booth'),
(2, 'booth-portable', 'Booth Portable'),
(3, 'gerobak-kontainer', 'Gerobak Kontainer'),
(4, 'gerobak-box', 'Gerobak Box');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_images` text NOT NULL,
  `testimoni_rate` varchar(100) NOT NULL,
  `testimoni_desc` text NOT NULL,
  `testimoni_name` varchar(255) NOT NULL,
  `testimoni_place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`testimoni_id`, `testimoni_images`, `testimoni_rate`, `testimoni_desc`, `testimoni_name`, `testimoni_place`) VALUES
(1, 'tes_01.png', '', 'Kesekian kalinya, saya order booth portabel utk bisnis saya dan saya puas sama hasilnya. Recommended', 'Siti Nurhapipah', 'Booth Portabel'),
(2, 'tes_02.png', '', 'Pengerjaan cepat tapi rapih, saya order gerobak dorong untuk jualan saya dan saya puas banget. Makasih ya.', 'Alfie', 'Gerobak Bisnis'),
(3, 'tes_03.png', '', 'Harga terjagkau, gratis ongkir juga dan kualitas bagus, saya order container di sini dan puas.', 'Adelia Fernanda', 'Booth Container'),
(4, 'tes_03.png', '', 'Jujur puas dengan hasilnya gak mengecewakan. Mantab semoga awet selalu', 'Beta Indrawan', 'Booth Container'),
(5, '68beeaa302c11.png', '5', 'Kesekian kalinya, saya order booth portabel utk bisnis saya dan saya puas sama hasilnya. Recommended	', 'Daus', 'Booth Angle');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(1, 'fireblast.fire@gmail.com', 'admin', '$2y$10$H.SC1vf3VMSBsKLv9t3n2OiXn/OO8H/lt2BDxi0HJRXss.8AzQVhG', '2025-09-07 17:13:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indeks untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indeks untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

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
-- Indeks untuk tabel `tb_socialmedia`
--
ALTER TABLE `tb_socialmedia`
  ADD PRIMARY KEY (`socialmedia_id`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_header`
--
ALTER TABLE `tb_header`
  MODIFY `header_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_socialmedia`
--
ALTER TABLE `tb_socialmedia`
  MODIFY `socialmedia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
