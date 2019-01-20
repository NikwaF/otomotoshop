-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 08:22 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_nama` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_nama`, `adm_email`, `adm_password`, `created_at`) VALUES
(1, 'niko wahyu fitrianto', 'nikonabilah@gmail.com', 'niko21', '2018-12-03 06:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kode_pos` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `nama`, `email`, `password`, `nohp`, `tgl_lahir`, `alamat`, `kota`, `kode_pos`, `created_at`, `updated_at`) VALUES
(1, 'Niko Wahyu Fitrianto', 'nikonabilah@gmail.com', 'niko21', '0895380894476', '1999-01-28', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'situbondo', '68322', '2018-12-09 05:01:41', '2018-12-08 23:29:20'),
(2, 'niok aha', 'nikoaha@gmail.com', 'niko21', '0892898832433', '2018-12-13', '', '', '', '2018-12-13 05:04:13', '2018-12-12 19:00:00'),
(3, 'albusran', 'busran@busran.com', '123', '082123213', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '32423', '2018-12-14 02:55:40', '2018-12-14 02:55:40'),
(4, 'willian ganteng', 'willian@willian', '123', '081232321321', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'padang', '123455', '2018-12-14 03:11:19', '2018-12-14 03:11:19'),
(5, 'fiyan', 'fiyan@fiyan.com', '123', '082321323', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'sidoarjo', '232321', '2018-12-14 03:12:12', '2018-12-14 03:12:12'),
(6, 'riska', 'riska@riska.com', '123', '082132132', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-14 03:17:11', '2018-12-14 03:17:11'),
(7, 'raya', 'raya@raya.com', '123', '087321432123', '0000-00-00', 'situbondo ', 'jember', '323431232', '2018-12-14 03:19:49', '2018-12-14 03:19:49'),
(8, 'javar', 'javar@javar.com', 'haha', '089323212321', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-16 03:35:00', '2018-12-16 03:35:00'),
(9, 'haha', 'haha@haha.com', '123', '082321231', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-16 03:40:58', '2018-12-16 03:40:58'),
(10, 'haha', 'haha@haha.com', '123', '082321231', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-16 03:42:15', '2018-12-16 03:42:15'),
(11, 'saber', 'saber@gmail.com', '081', '0821212312', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-16 03:42:44', '2018-12-16 03:42:44'),
(12, 'saber2', 'sabe2r@gmail.com', '123', '0821212312', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '432323', '2018-12-16 03:43:48', '2018-12-16 03:43:48'),
(13, 'hahahaha', 'gogogo@gogogo.com', '123', '0871231231232', '0000-00-00', 'perumnas panji permai blok oo-19 dekat jalan jaln jaln jaln jalan', 'jember', '32423', '2018-12-16 03:45:33', '2018-12-16 03:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `info_toko`
--

CREATE TABLE `info_toko` (
  `info_toko_id` int(11) NOT NULL,
  `isi_info` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'alat cuci mobil dan motor', '2018-12-07 16:40:51', '0000-00-00 00:00:00'),
(2, 'alat pengangkat', '2018-12-07 16:40:51', '0000-00-00 00:00:00'),
(3, 'Peralatan Bengkel Motor', '2018-12-08 16:48:55', '2018-12-08 10:48:55'),
(4, 'Alat Ukur', '2018-12-09 08:40:34', '2018-12-09 02:40:34'),
(5, 'mesin perkakas', '2018-12-09 08:41:00', '2018-12-09 02:41:00'),
(6, 'Perkakas Bengkel Mobil', '2018-12-09 08:41:22', '2018-12-09 02:41:22'),
(7, 'Perkakas Angin', '2018-12-09 08:41:58', '2018-12-09 02:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `kode_unik`
--

CREATE TABLE `kode_unik` (
  `kode_unik_id` int(11) NOT NULL,
  `kode_unik` varchar(6) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_unik`
--

INSERT INTO `kode_unik` (`kode_unik_id`, `kode_unik`, `orders_id`) VALUES
(1, 'llCBDe', 1),
(2, '2vh7sB', 2),
(3, 'sc16ZX', 3),
(4, 'QFAJK8', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `method_order` varchar(10) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_belanja` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `method_order`, `tanggal_transaksi`, `total_belanja`, `customer_id`) VALUES
(1, 'jemput', '2018-12-16 13:51:34', 0, 1),
(2, 'antar', '2018-12-16 14:06:13', 0, 3),
(3, 'jemput', '2018-12-16 14:14:19', 0, 4),
(4, 'jemput', '2018-12-16 14:16:54', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `nama_products` varchar(300) NOT NULL,
  `harga_products` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `nama_products`, `harga_products`, `quantity`, `subtotal`, `orders_id`, `products_id`) VALUES
(1, ' Semprotan Angin Kuningan FREED', 25000, 2, 50000, 1, 2),
(2, ' Bearing Disassembler 5 pcs 18-835 GRIP ON', 217800, 0, 217800, 1, 6),
(3, 'Alat-Pemotong-Rantai-Spd.-Motor-WP-22000-WIPRO-300x300', 105300, 1, 105300, 1, 10),
(4, 'Kop Kaca 2 Kaki GS102 WIPRO', 189000, 1, 189000, 1, 8),
(5, 'Bipolar-Clutch-Tool-Double-Crown-Socket-Honda-8958041-AMERICAN-TOOL-300x299', 37000, 1, 37000, 1, 17),
(6, 'Selang Peredam Knalpot', 184000, 1, 184000, 2, 3),
(7, 'mantulllll', 20000000, 1, 20000000, 2, 22),
(8, 'pengukur mantap jiwaaaa ', 200000, 1, 200000, 3, 25),
(9, 'Alat-Pemotong-Rantai-Spd.-Motor-WP-22000-WIPRO-300x300', 105300, 1, 105300, 3, 10),
(10, 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON-1-300x300', 217000, 1, 217000, 3, 12),
(11, ' Bearing Disassembler 5 pcs 18-835 GRIP ON', 217800, 1, 217800, 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `gambar_tf` varchar(300) NOT NULL,
  `kode_unik` varchar(6) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `nama_products` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `nama_products`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(2, ' Semprotan Angin Kuningan FREED', 25000, '47376524_510854826093236_3163368929628258304_n.png', '2018-12-08 04:16:28', '2018-12-14 23:49:50'),
(3, 'Selang Peredam Knalpot', 184000, 'Selang-Peredam-Knalpot-1-1.jpg', '2018-12-08 16:49:51', '2018-12-15 00:33:23'),
(4, 'Flexible Flywheel Holder 8958023 AMERICAN TOOL', 182700, 'Flexible-Flywheel-Holder-8958023.jpg', '2018-12-08 16:52:16', '2018-12-08 10:52:16'),
(5, 'K. Stelan Klep u/ Spd Motor KSK 05 WIPRO', 31500, 'K_-Stelan-Klep-u-motor.jpg', '2018-12-08 16:54:13', '2018-12-08 10:54:13'),
(6, ' Bearing Disassembler 5 pcs 18-835 GRIP ON', 217800, 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON-1.jpg', '2018-12-08 17:08:16', '2018-12-08 11:08:16'),
(7, 'Pembuka Pentil / Core Remover (8958630) AMERICAN TOOL', 36000, 'Pembuka-Pentil.jpg', '2018-12-08 17:10:10', '2018-12-08 11:10:10'),
(8, 'Kop Kaca 2 Kaki GS102 WIPRO', 189000, 'Kop-Kaca-2-Kaki-NANKAI.jpg', '2018-12-08 17:11:49', '2018-12-08 11:11:49'),
(9, 'Alat-Injeksi-Sepeda-Motor-300x300', 3200000, 'Alat-Injeksi-Sepeda-Motor-300x300.jpg', '2018-12-09 08:11:01', '2018-12-09 02:11:01'),
(10, 'Alat-Pemotong-Rantai-Spd.-Motor-WP-22000-WIPRO-300x300', 105300, 'Alat-Pemotong-Rantai-Spd_-Motor-WP-22000-WIPRO-300x300.jpg', '2018-12-09 08:15:22', '2018-12-09 02:15:22'),
(11, 'Angle-Divender-AD-0502-WIPRO-1-300x300', 364000, 'Angle-Divender-AD-0502-WIPRO-1-300x300.jpg', '2018-12-09 08:16:48', '2018-12-09 02:16:48'),
(12, 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON-1-300x300', 217000, 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON-1-300x300.jpg', '2018-12-09 08:18:15', '2018-12-09 02:18:15'),
(13, 'Bearing-Puller-16-802-AB-01-19-35mm-GRIP-ON-1-300x300', 171000, 'Bearing-Puller-16-802-AB-01-19-35mm-GRIP-ON-1-300x300.jpg', '2018-12-09 08:19:54', '2018-12-09 02:19:54'),
(14, ' Bearing Puller 16-803 (AB-02) (24-55mm) GRIP ON', 190000, 'Bearing-Puller-16-802-AB-01-19-35mm-GRIP-ON-1.jpg', '2018-12-09 08:23:03', '2018-12-09 02:23:03'),
(15, 'Bike-Lift-T-61004A-Westco-300x299', 6500000, 'Bike-Lift-T-61004A-Westco-300x299.jpg', '2018-12-09 08:25:09', '2018-12-09 02:25:09'),
(16, 'Bearing-Puller-Set-18-838-GRIP-ON-1-300x300', 587000, 'Bearing-Puller-Set-18-838-GRIP-ON-1-300x300.jpg', '2018-12-09 08:26:41', '2018-12-09 02:26:41'),
(17, 'Bipolar-Clutch-Tool-Double-Crown-Socket-Honda-8958041-AMERICAN-TOOL-300x299', 37000, 'Bipolar-Clutch-Tool-Double-Crown-Socket-Honda-8958041-AMERICAN-TOOL-300x299.jpg', '2018-12-09 08:28:27', '2018-12-09 02:28:27'),
(18, 'Cam-Degree-Wheel-300x300', 326700, 'Cam-Degree-Wheel-300x300.jpg', '2018-12-09 08:29:28', '2018-12-09 02:29:28'),
(19, 'CDI-Tester-Marshall-300x300', 2115000, 'CDI-Tester-Marshall-300x300.jpg', '2018-12-09 08:30:51', '2018-12-09 02:30:51'),
(20, 'Chain-Breaker-Tool', 103500, 'Chain-Breaker-Tool-300x300.jpg', '2018-12-09 08:32:20', '2018-12-09 02:32:20'),
(21, 'Chain-Cutter-Big-Body', 90000, 'Chain-Cutter-Big-Body-300x300.jpg', '2018-12-09 08:33:21', '2018-12-09 02:33:21'),
(22, 'mantulllll', 20000000, '1_lsWE9dh54kaC8e2YSQbIrA.jpeg', '2018-12-10 04:44:20', '2018-12-09 22:44:20'),
(25, 'pengukur mantap jiwaaaa ', 200000, '47171914_770069980062437_8581013000033402880_n.png', '2018-12-15 06:27:50', '2018-12-15 00:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE `products_details` (
  `products_details_id` int(11) NOT NULL,
  `deskripsi_products` text,
  `tipe_products` varchar(150) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `products_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`products_details_id`, `deskripsi_products`, `tipe_products`, `url`, `created_at`, `updated_at`, `products_id`, `kategori_id`) VALUES
(1, '   jangan sembarangan dong kurang n pak', 'Kuningan', 'Semprotan-Angin-Kuningan-FREED', '2018-12-08 04:16:28', '2018-12-14 23:49:50', 2, 1),
(2, '  Selang peredam knalpot adalah jenis selang yang biasa di gunakan pada bengkel-bengkel kendaraan bermotor yang berfungsi sebagai alat pengurai asap di service area serta pengurai polusi agar area bengkel tidak di penuhi asap dan suara yang di hasilkan oleh motor yang di servise menjadi lebih kecil.', '-', 'Selang-Peredam-Knalpot', '2018-12-08 16:49:51', '2018-12-15 00:33:23', 3, 1),
(3, 'Jual Flexible Flywheel Holder 8958023 AMERICAN TOOL  Harga Murah, Toko Alat Mekanik, Special Tool Sepeda Motor: Crankshaft, Crankcase, dll. Harga Diskon, Kualitas Alat Terjamin', '-', 'Flexible-Flywheel-Holder-8958023-AMERICAN-TOOL', '2018-12-08 16:52:16', '2018-12-08 10:52:16', 4, 3),
(4, 'Jual K. Stelan Klep u/ Spd Motor KSK 05 WIPRO Murah, Special Tool Sepeda Motor: Treker Klep, Treker Kampas, dll', 'KSK 05', 'K-Stelan-Klep-u-Spd-Motor-KSK-05-WIPRO', '2018-12-08 16:54:13', '2018-12-08 10:54:13', 5, 1),
(5, 'Jual Bearing Disassembler 5 pcs 18-835 GRIP ON Murah, Pusat Alat Mekanik, Special Tool Sepeda Motor: Clutch Spring Compressor, Compressor Tester, dll', '5 pcs 18-835', 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON', '2018-12-08 17:08:16', '2018-12-08 11:08:16', 6, 3),
(6, 'Pembuka Pentil / Core Remover AMERICAN TOOL / Kunci Pembuka Pentil Ban\r\nKunci pentil ban adalah kunci yang berfungsi membuka dan megencangkan pentil. Ada penjepit pengait pentil nya\r\nSangat praktis serta lubang untuk memasukan tali agar tidak tercecer\r\nBisa digunakan untuk\r\n– Sepeda motor\r\n– Mobil\r\n– Sepeda\r\n– Truck', '8958630', 'Pembuka-Pentil-Core-Remover-8958630-AMERICAN-TOOL', '2018-12-08 17:10:10', '2018-12-08 11:10:10', 7, 1),
(7, 'Kop Kaca 2 Kaki GS102 WIPRO\r\n\r\nKop Kaca 2 Kaki GS102 WIPRO di gunakan untuk mempermudah anda dalam pekerjaan mengangkat kaca, memegang kaca dan pekerjaan lain yang menggunakan bahan Kop Kaca 2 Kaki terbuat dari bahan pilihan tidak mudah karat, sedang pada Kop terbuat dari bahan Karet berkualitas, tidak mudah kering dan memiliki daya hisap yang kuat.\r\n\r\nKelebihan :\r\n– Kop kaca 2 kaki\r\n– Perkakas untuk mengangkat kaca\r\n– Karet kop sangat kuat menghisap/ memegang\r\n– Sudah terbukti banyak di gunakan\r\n– Lebih hemat', 'GS102 ', 'Kop-Kaca-2-Kaki-GS102-WIPRO', '2018-12-08 17:11:49', '2018-12-08 11:11:49', 8, 3),
(8, 'Penggunaan :\r\n1. Sepeda Motor Yamaha FI / Injeksi\r\n2. Sepeda Motor Yamaha FI Blue Core', 'alat scan motor', 'Alat-Injeksi-Sepeda-Motor-300x300', '2018-12-09 08:11:01', '2018-12-09 02:11:01', 9, 3),
(9, 'Alat Pemotong Rantai Spd. Motor WIPRO WP 22000 merupakan alat bantu mekanik dalam melakukan pemotongan rantai pada sepeda motor, cara penggunaan alat ini sendiri ialah terdapat 2 tuas yang mana tuas pertama berfungsi untuk mengunci rantai pada alat dan tuas kedua berfungsi untuk mendorong pengancing rantai sehingga rantai sepeda motor dapat terlepas', 'WP 22000', 'Alat-Pemotong-Rantai-Spd-Motor-WP-22000-WIPRO-300x300', '2018-12-09 08:15:22', '2018-12-09 02:15:22', 10, 3),
(10, 'Fungsi : Alat untuk mengukur sudut pengapian spd. motor', 'AD 0502', 'Angle-Divender-AD-0502-WIPRO-1-300x300', '2018-12-09 08:16:48', '2018-12-09 02:16:48', 11, 3),
(11, 'Berat Kirim : 3 kg\r\nMaterial : Chrome Vanadium', '5 pcs 18-835', 'Bearing-Disassembler-5-pcs-18-835-GRIP-ON-1-300x300', '2018-12-09 08:18:15', '2018-12-09 02:18:15', 12, 3),
(12, 'Berat Kirim : 2 kg', '16-802 (AB-01) (19-35mm)', 'Bearing-Puller-16-802-AB-01-19-35mm-GRIP-ON-1-300x300', '2018-12-09 08:19:54', '2018-12-09 02:19:54', 13, 3),
(13, 'Berat Kirim : 2 kg', '16-803 (AB-02) (24-55mm) GRIP ON', 'Bearing-Puller-16-803-AB-02-24-55mm-GRIP-ON', '2018-12-09 08:23:03', '2018-12-09 02:23:03', 14, 3),
(14, 'Jual Bike Lift T-61004A Westco Harga Murah, Pusat Alat Mekanik, Special Tool Sepeda Motor: Clutch Spring Compressor, Compressor Tester, dll. Harga Diskon', 'T-61004A', 'Bike-Lift-T-61004A-Westco-300x299', '2018-12-09 08:25:10', '2018-12-09 02:25:09', 15, 3),
(15, 'Jual Bearing Puller Set 18-838 GRIP-ON Harga Murah, Special Tool Sepeda Motor: Clutch Spring Compressor, Compressor Tester, dll. Harga Diskon', '18-838', 'Bearing-Puller-Set-18-838-GRIP-ON-1-300x300', '2018-12-09 08:26:41', '2018-12-09 02:26:41', 16, 3),
(16, 'Jual Bipolar Clutch Tool (Double Crown Socket) Honda 8958041 AMERICAN TOOL Harga Murah, Toko Alat Mekanik, Special Tool Sepeda Motor: Clutch Housing, Clutch Spring', 'Honda', 'Bipolar-Clutch-Tool-Double-Crown-Socket-Honda-8958041-AMERICAN-TOOL-300x299', '2018-12-09 08:28:27', '2018-12-09 02:28:27', 17, 3),
(17, 'Jual Cam Degree Wheel 17-001 GRIP-ON Harga Murah, Special Tool Sepeda Motor: Spark Plug Murah, Grip Coil, dll. Harga Diskon', '-', 'Cam-Degree-Wheel-300x300', '2018-12-09 08:29:28', '2018-12-09 02:29:28', 18, 3),
(18, 'Fungsi :\r\nUntuk mengetest kondisi busi apakah masih bagus atau jelekdengan melihat loncatan bunga api pada busi.\r\n\r\nBisa di gunakan untuk semua jenis busi.', '-', 'CDI-Tester-Marshall-300x300', '2018-12-09 08:30:51', '2018-12-09 02:30:51', 19, 3),
(19, 'Jual Chain Breaker Tool 8957804 AMERICAN TOOL Harga Murah, Pusat Alat Mekanik, Special Tool Sepeda Motor: Coupling Holder, Coupling Nut,', '-', 'Chain-Breaker-Tool', '2018-12-09 08:32:20', '2018-12-09 02:32:20', 20, 3),
(20, 'Jual Chain Cutter Big Body 9604 GREAT Harga Murah, Special Tool Sepeda Motor: Clutch Housing Holder, Clutch Spring Compresor, dll. Harga Diskon', 'Big Body', 'Chain-Cutter-Big-Body', '2018-12-09 08:33:21', '2018-12-09 02:33:21', 21, 3),
(21, 'cepat dan kuat', 'ninja', 'mantulllll', '2018-12-10 04:44:20', '2018-12-09 22:44:20', 22, 7),
(24, 'pengukur kemantapan jiwa yang sangat akurat', 'langkalah', 'pengukur-mantap-jiwaaaa', '2018-12-15 06:27:50', '2018-12-15 00:27:50', 25, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `info_toko`
--
ALTER TABLE `info_toko`
  ADD PRIMARY KEY (`info_toko_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kode_unik`
--
ALTER TABLE `kode_unik`
  ADD PRIMARY KEY (`kode_unik_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `products_details`
--
ALTER TABLE `products_details`
  ADD PRIMARY KEY (`products_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `info_toko`
--
ALTER TABLE `info_toko`
  MODIFY `info_toko_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kode_unik`
--
ALTER TABLE `kode_unik`
  MODIFY `kode_unik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_details`
--
ALTER TABLE `products_details`
  MODIFY `products_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
