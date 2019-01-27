-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2019 at 12:50 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
-- Table structure for table `antar`
--

CREATE TABLE `antar` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `kode_unik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proses_antar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antar`
--

INSERT INTO `antar` (`id`, `orders_id`, `customer_id`, `kode_unik`, `proses_antar`) VALUES
(1, 2, 2, '8QxkiN', 'sudah dijemput'),
(2, 3, 1, 'liUsNy', 'belum diantar'),
(3, 9, 4, 'M0CSz3', 'sudah diantar'),
(4, 4, 1, '1Sl9zG', 'sudah diantar'),
(5, 13, 1, 'KvA1c9', 'sudah diantar'),
(6, 14, 1, 'x6TXpc', 'belum diantar');

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
(1, 'niko wahyu fitrainto', 'nikonabilah@gmail.com', '9d07a8ef2c6f0467b155a10afc761226', '0895380894476', '0000-00-00', 'panji permai blok oo-19', 'situbondo', '68322', '2019-01-16 07:00:40', '2019-01-16 07:00:40'),
(2, 'willian refky', 'willian@gmail.com', '6c4ee85ff749b114211a5517ac76ac09', '082233390268', '0000-00-00', 'besuki', 'situbondo', '68356', '2019-01-16 07:56:30', '2019-01-16 07:56:30'),
(3, 'Riska Aprilia', 'riska.aprilia50@yahoo.co.id', 'fb059ad1c514876b15b3ec40df1acdac', '0895800117769', '0000-00-00', 'Jlhdjshsj', 'Jember', '93673', '2019-01-16 18:55:38', '2019-01-16 18:55:38'),
(4, 'valensia serafim', 'valensia.serafim@gmail.com', '51e2d0b4ad28c39f2a970af3cf73e62a', '082188981191', '0000-00-00', 'perhutani', 'jember', '68122', '2019-01-16 22:34:23', '2019-01-16 22:34:23'),
(5, 'MILO', 'kummalamilo405@gmail.com', '8b3d85510ab2637dc828093fcbcb2da5', '081234567897', '0000-00-00', 'jember', 'Jember', '68155', '2019-01-17 00:03:46', '2019-01-17 00:03:46');

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
-- Table structure for table `jemput`
--

CREATE TABLE `jemput` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `kode_unik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proses_jemput` varchar(59) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jemput`
--

INSERT INTO `jemput` (`id`, `orders_id`, `customer_id`, `kode_unik`, `proses_jemput`) VALUES
(1, 1, 2, 'NPcqoW', 'sudah dijemput'),
(2, 11, 4, 'qKuTuz', 'sudah dijemput');

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
(1, 'NPcqoW', 1),
(2, '8QxkiN', 2),
(3, 'liUsNy', 3),
(4, '1Sl9zG', 4),
(5, 'k6q2Pv', 5),
(6, '5HMIfp', 6),
(7, 'YjbFTa', 7),
(8, 'Unu7xH', 8),
(9, 'M0CSz3', 9),
(10, 'mOIJnC', 10),
(11, 'qKuTuz', 11),
(12, 'Mgq2mP', 12),
(13, 'KvA1c9', 13),
(14, 'x6TXpc', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `method_order` varchar(10) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_belanja` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `method_order`, `tanggal_transaksi`, `total_belanja`, `customer_id`, `status_bayar`) VALUES
(1, 'jemput', '2019-01-16 14:57:34', 184500, 2, 'sudah bayar'),
(2, 'antar', '2019-01-16 14:59:43', 700400, 2, 'sudah bayar'),
(3, 'antar', '2019-01-17 02:49:18', 616600, 1, 'sudah bayar'),
(4, 'antar', '2019-01-17 02:49:19', 20000, 1, 'sudah bayar'),
(5, 'antar', '2019-01-17 02:49:21', 20000, 1, 'belum bayar'),
(6, 'jemput', '2019-01-17 04:01:07', 184500, 1, 'belum bayar'),
(7, 'jemput', '2019-01-17 04:43:47', 133200, 2, 'belum bayar'),
(8, 'jemput', '2019-01-17 04:54:15', 182700, 1, 'belum bayar'),
(9, 'antar', '2019-01-17 05:39:58', 204500, 4, 'sudah bayar'),
(10, 'antar', '2019-01-17 05:48:24', 204500, 4, 'belum bayar'),
(11, 'jemput', '2019-01-17 05:51:00', 300000, 4, 'sudah bayar'),
(12, 'antar', '2019-01-17 07:06:29', 204500, 1, 'belum bayar'),
(13, 'antar', '2019-01-17 07:19:29', 9245000, 1, 'sudah bayar'),
(14, 'antar', '2019-01-17 07:26:27', 202700, 1, 'sudah bayar');

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
(1, 'Selang Peredam Knalpot', 184500, 1, 184500, 1, 1),
(2, '14 Pcs Cup Type Oil Filter Wrench Set HS 1245 WIPRO', 680400, 1, 680400, 2, 18),
(3, 'Flexible Flywheel Holder 8958023 AMERICAN TOOL', 182700, 1, 182700, 3, 2),
(4, ' Dongkrak Botol 10 Ton TEKIRO', 413900, 1, 413900, 3, 15),
(5, 'Selang Peredam Knalpot', 184500, 1, 184500, 6, 1),
(6, 'Digital Clamp Meter MT87', 133200, 1, 133200, 7, 7),
(7, 'Flexible Flywheel Holder 8958023 AMERICAN TOOL', 182700, 1, 182700, 8, 2),
(8, 'Selang Peredam Knalpot', 184500, 1, 184500, 9, 1),
(9, 'Selang Peredam Knalpot', 184500, 1, 184500, 10, 1),
(10, 'Generic Merah Tangki Snow Wash', 300000, 1, 300000, 11, 9),
(11, 'Selang Peredam Knalpot', 184500, 1, 184500, 12, 1),
(12, 'Selang Peredam Knalpot', 184500, 50, 9225000, 13, 1),
(13, 'Flexible Flywheel Holder 8958023 AMERICAN TOOL', 182700, 1, 182700, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `gambar_tf` varchar(300) NOT NULL,
  `kode_unik` varchar(6) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dikonfirmasi` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `gambar_tf`, `kode_unik`, `status`, `tanggal_upload`, `dikonfirmasi`, `customer_id`) VALUES
(1, 'img-20161201-wa0000_3501.jpg', '8QxkiN', 'terkonfirmasi', '2019-01-16 15:00:20', '2019-01-17 00:29:19', 2),
(2, 'img-20161201-wa0000_35011.jpg', 'NPcqoW', 'terkonfirmasi', '2019-01-17 04:21:52', '2019-01-17 00:29:19', 2),
(3, 'img-20161201-wa0000_35012.jpg', 'YjbFTa', 'terkonfirmasi', '2019-01-17 04:45:57', '2019-01-17 00:29:19', 2),
(4, 'img-20161201-wa0000_35013.jpg', 'liUsNy', 'terkonfirmasi', '2019-01-17 04:56:00', '2019-01-17 00:29:19', 1),
(5, 'img-20161201-wa0000_35014.jpg', 'M0CSz3', 'terkonfirmasi', '2019-01-17 05:42:10', '2019-01-17 00:29:19', 4),
(6, 'img-20161201-wa0000_35015.jpg', 'qKuTuz', 'terkonfirmasi', '2019-01-17 05:51:41', '2019-01-17 00:29:19', 4),
(7, 'img-20161201-wa0000_35016.jpg', '1Sl9zG', 'terkonfirmasi', '2019-01-17 07:07:33', '2019-01-17 00:29:19', 1),
(8, 'img-20161201-wa0000_35017.jpg', 'KvA1c9', 'terkonfirmasi', '2019-01-17 07:20:46', '2019-01-17 00:29:19', 1),
(9, 'img-20161201-wa0000_35018.jpg', 'x6TXpc', 'terkonfirmasi', '2019-01-17 07:27:31', '2019-01-17 00:29:19', 1),
(10, 'img-20161201-wa0000_35019.jpg', 'x6TXpc', 'terkonfirmasi', '2019-01-17 07:27:38', '2019-01-17 00:29:19', 1);

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
(1, 'Selang Peredam Knalpot', 184500, 'Selang-Peredam-Knalpot-1-1.jpg', '2019-01-16 14:03:06', '2019-01-16 07:03:06'),
(2, 'Flexible Flywheel Holder 8958023 AMERICAN TOOL', 182700, 'Flexible-Flywheel-Holder-8958023.jpg', '2019-01-16 14:04:32', '2019-01-16 07:04:32'),
(3, 'Alat Injeksi Sepeda Motor Yamaha FH – 100', 3200000, 'Alat-Injeksi-Sepeda-Motor.jpg', '2019-01-16 14:07:32', '2019-01-16 07:07:32'),
(4, 'Bike Lift T-61004A Westco', 6500700, 'Bike-Lift-T-61004A-Westco.jpg', '2019-01-16 14:09:27', '2019-01-16 07:09:27'),
(5, 'Altimeter / Alat Ukur Ketinggian', 209700, 'Altimeter-Barometer.jpg', '2019-01-16 14:11:29', '2019-01-16 07:11:29'),
(6, 'Bore Gauge 50 – 160 MM OPT', 563400, 'Bore-Gauge.jpg', '2019-01-16 14:13:00', '2019-01-16 07:13:00'),
(7, 'Digital Clamp Meter MT87', 133200, 'Digital-Clamp-Meter-Sinhwa.jpg', '2019-01-16 14:14:36', '2019-01-16 07:16:44'),
(8, 'Alat Pembersih Kaca Body Besi 10? JASON', 36000, 'Alat-Pembersih-Kaca-Body-Besi-10-JASON.jpg', '2019-01-16 14:16:33', '2019-01-16 07:16:33'),
(9, 'Generic Merah Tangki Snow Wash', 300000, 'Generic-Merah-Tangki-Snow-Wash.jpg', '2019-01-16 14:18:30', '2019-01-16 07:18:30'),
(10, 'Angle Grinder 125mm (5?) 9005N', 2400000, 'Angle-Grinder-125mm-5-9005N.jpg', '2019-01-16 14:20:23', '2019-01-16 07:20:23'),
(11, 'Bor Duduk Mini 6mm NANKAI', 702000, 'Bor-Duduk-Mini-6mm-NANKAI.png', '2019-01-16 14:21:39', '2019-01-16 07:21:39'),
(12, ' Cordless Impact 36V (CSL-CD9236) CASAL', 2406000, 'Cordless-Impact-36V-CSL-CD9236-CASAL.jpg', '2019-01-16 14:23:15', '2019-01-16 07:23:15'),
(13, '1/2 DR Air Ratchet Wrench (KAAF1605) TOPTUL', 9558000, '12-DR-Air-Ratchet-Wrench-KAAF1605-TOPTUL.png', '2019-01-16 14:25:43', '2019-01-16 07:29:20'),
(14, ' 1/2Inch Reversible Air Drill RP7104 WIPRO', 594400, 'Reversible-Air-Drill-RP7104-WIPRO-1.jpg', '2019-01-16 14:27:06', '2019-01-16 07:29:00'),
(15, ' Dongkrak Botol 10 Ton TEKIRO', 413900, 'Dongkrak-Botol-10-Ton-TEKIRO.jpg', '2019-01-16 14:28:43', '2019-01-16 07:28:43'),
(16, 'Chain Block 5Ton x 5M', 3300000, 'Chain-Block.jpg', '2019-01-16 14:30:26', '2019-01-16 07:30:26'),
(17, '14 In 1 Multi Function 88 712 SELLERY', 50400, '14-In-1-Multi-Function-88-712-SELLERY-1.jpg', '2019-01-16 14:32:04', '2019-01-16 07:32:18'),
(18, '14 Pcs Cup Type Oil Filter Wrench Set HS 1245 WIPRO', 680400, '14-Pcs-Cup-Type-Oil-Filter-Wrench-Set-HS-1245-WIPRO-1-420x422.jpg', '2019-01-16 14:33:54', '2019-01-16 07:33:54'),
(19, 'Bearing Puller Disassembler 5 pcs (8958150) AMERICAN TOOL', 220500, 'Bearing-Puller-Disassembler-5-pcs-9611-GREAT-1.jpg', '2019-01-16 14:35:15', '2019-01-16 07:35:15'),
(20, 'Chain Cutter Big Body 9604 GREAT', 90000, 'Chain-Cutter-Big-Body-420x420.jpg', '2019-01-16 14:36:56', '2019-01-16 07:36:56');

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
(2, 'Selang Peredam Knalpot Terbuat Dari Bahan Karet Epdm Dengan Lapisan Kain Anti Panas Dengan Di Kombinasi Dengan Kawat Baja Spiral Dan Berfungsi Sebagai Buangan Angin Dan Pengurai Udara Biasanya Produk Ini Di Gunakan Pada Bengkel-Bengkel Resmi Kendaraan Bermotor. Selang Peredam Knalpot Terbuat Dari Bahan Karet Epdm Dengan Lapisan Kain Anti Panas Dengan Di Kombinasi Dengan Kawat Baja Spiral Dan Berfungsi Sebagai Buangan Angin Dan Pengurai Udara serta meredam suara bising dan polusi saat uji coba. Biasanya Produk Ini Di Gunakan Pada Bengkel-Bengkel Resmi Kendaraan Bermotor.', '-', 'Selang-Peredam-Knalpot', '2019-01-16 14:03:06', '2019-01-16 07:03:06', 1, 3),
(3, 'Jual Flexible Flywheel Holder 8958023 AMERICAN TOOL  Harga Murah, Toko Alat Mekanik, Special Tool Sepeda Motor: Crankshaft, Crankcase, dll. Harga Diskon, Kualitas Alat Terjamin, Hanya di otomotoshop', '-', 'Flexible-Flywheel-Holder-8958023-AMERICAN-TOOL', '2019-01-16 14:04:32', '2019-01-16 07:04:32', 2, 3),
(4, 'Secara fungsi Alat Injeksi Sepeda Motor Yamaha tipe FH-100 memiliki kesamaan fungsi dengan Alat Injeksi Sepeda Motor Yamaha tipe sebelumnya ( biasanya berwarna silver ), yaitu untuk mendiagnosa kerusakan sistem Injeksi pada unit sepeda motor Yamaha.', 'FH-100', 'Alat-Injeksi-Sepeda-Motor-Yamaha-FH-100', '2019-01-16 14:07:32', '2019-01-16 07:07:32', 3, 3),
(5, 'Jual Bike Lift T-61004A Westco Harga Murah, Pusat Alat Mekanik, Special Tool Sepeda Motor: Clutch Spring Compressor, Compressor Tester, dll. Harga Diskon, Hanya di otomotoshopcom', 'T-61004A', 'Bike-Lift-T-61004A-Westco', '2019-01-16 14:09:27', '2019-01-16 07:09:27', 4, 1),
(6, '8 in 1 Fungsi: altimeter digital, dengan barometer digital, kompas digital, ramalan cuaca, waktu, kalender, termometer, dan lampu latar\r\n\r\nPerangkat ini didasarkan pada teknologi sensor bantalan elektronik dan sensor barometrik\r\n\r\nAltimeter digital dirancang untuk penggunaan luar ruangan, string yang dapat dilepas menjadikan kompas digital sebagai perangkat genggam yang sempurna untuk berbagai aktivasi luar ruangan, Ini akan memberi Anda cahaya latar ketika Anda menekan tombol apa saja kapan saja, Ramalkan cuaca untuk 12 hingga 24 jam mendatang berdasarkan tekanan barometrik\r\n\r\nAltimeter: -700 ~ 9000m / -2300 ~ 29500ft', '-', 'Altimeter-Alat-Ukur-Ketinggian', '2019-01-16 14:11:29', '2019-01-16 07:11:29', 5, 4),
(7, 'Bore gauge adalah alat yang dapat digunakan untuk mengukur diameter dalam suatu cylinder. Dial gauge yang terletak pada bagian atas dapat dilepas dengan melonggarkan securing position posisi dial gauge. Grip adalah pemegang untuk memposisikan ketepatan pengukuran. Ujung batang pengukur (measuring point) dapat bergerak bila ditekan dan akan menggerakkan jarum pada dial gauge antara 0-2 mm dari harga standarnya. Rod end akan diikat oleh mur pengikat tongkat pengukur (rod securing thread) tongkat pengukur (rod end) ini dapat ditukar-tukar ukurannya menurut kebutuhannnya.\r\n\r\nGuide plate dipergunakan untuk membantu menempatkan kedudukan dial gauge pada kedudukan horizontal dan untuk mendapatkan harga pengukuran yang maksimum. Pada dial gauge model baru yang dipergunakan pada bore gauge skala penunjukkan jarum terdiri dari angka 0 – 50 pada setengah lingkaran dari arah jarum jam atau berlawanan arah jarum jam. Masukkan bore gauge ke dalam cylinder dengan posisi seperti gambar di bawah ini\r\n\r\nPosisi yang benar dalam melakukan pengukuran diamater dalam suatu silinder adalah pada posisi ditengah-tengah seperti ditunjukan pada gambar.\r\n\r\nPada gambar A posisi b adalah bore gauge yang benar, dan apabila terjadi penyimpangan maka jarum besar akan bergerak searah jarum jam. Bila terjadi penyimpangan ( d ) dan ( f ) maka jarum akan berputar berlawanan dengan arah putaran jarum jam.', '50 – 160 MM', 'Bore-Gauge-50-160-MM-OPT', '2019-01-16 14:13:00', '2019-01-16 07:13:00', 6, 1),
(8, ' Digital Clamp Meter MT87\r\nDigital Clamp Meter\r\nfeatures:\r\n* continuty beeper\r\n* data hold function\r\n* small size, lightweight\r\n* power source : UM-4 or AAA 1,5v x 2\r\n* pengukuran arus bisa di bawah 1 ampere.\r\n\r\n', 'MT87', 'Digital-Clamp-Meter-MT87', '2019-01-16 14:14:36', '2019-01-16 07:16:44', 7, 4),
(9, 'Jual Alat Pembersih Kaca Body Besi 10? JASON murah Harga Murah  di otomotoshop.com', '10?', 'Alat-Pembersih-Kaca-Body-Besi-10-JASON', '2019-01-16 14:16:33', '2019-01-16 07:16:33', 8, 1),
(10, 'Jual Generic Merah Tangki Snow Wash Harga Murah', '10 liter', 'Generic-Merah-Tangki-Snow-Wash', '2019-01-16 14:18:30', '2019-01-16 07:18:30', 9, 1),
(11, 'Mesin gerinda tangan merupakan mesin yang berfungsi untuk menggerinda benda kerja. Awalnya mesin gerinda hanya ditujukan untuk benda kerja berupa logam yang keras seperti besi dan stainless steel. Menggerinda dapat bertujuan untuk mengasah benda kerja seperti pisau dan pahat,\r\natau dapat juga bertujuan untuk membentuk benda kerja seperti merapikan hasil pemotongan, merapikan hasil las, membentuk lengkungan pada benda kerja yang bersudut, menyiapkan permukaan benda kerja untuk dilas, dan lain-lain.', '9005N', 'Angle-Grinder-125mm-5-9005N', '2019-01-16 14:20:23', '2019-01-16 07:20:23', 10, 5),
(12, 'digunakan untuk melubangi besi dimana lubang yang dibuat pada besi itu banyak, oleh karena itu mesin bor ini di desain sedemikian rupa agar pengguna bor tidak mudah lelah. Tinggal putar saja tuasnya, maka mata bor dan kepala bor nya akan turun ke bawah. Mesin bor ini dapat mengebor beberapa lapis besi sekaligus, dengan tebal maksimal sesuai dengan panjang mata bor yang digunakan. Bor ini umum nya digunakan pada putaran lambat, tapi kecepatan putarannya bisa diatur melalui belting yang berada pada bagian atasnya', '6mm', 'Bor-Duduk-Mini-6mm-NANKAI', '2019-01-16 14:21:39', '2019-01-16 07:21:39', 11, 5),
(13, 'Cordless Impact 36V (CSL-CD9236) CASAL / Mesin Bor\r\n\r\nModel : CSL-CD9236\r\n\r\n– Capacities\r\nSteel, Wood, Wood screw & Machine Screw For Socket 16-30mm Standard for 22mm\r\n– No Load Speed (RPM)\r\nHigh :0-2300rpm\r\nLow : 0-3200bpm\r\n– Chuck Capacity : Dr. 1/2?\r\n– Rated Voltage : DC 36 V', '(CSL-CD9236)', 'Cordless-Impact-36V-CSL-CD9236-CASAL', '2019-01-16 14:23:15', '2019-01-16 07:23:15', 12, 5),
(14, ' Jual 1/2 DR Air Ratchet Wrench (KAAF1605) TOPTUL Murah, Jual Obeng Angin, Berfungsi sebagai pemasang sekrup dan pelepas sekrup dengan mudah juga menjual berbagai Alat perkakas lainnya', '(KAAF1605)', '12-DR-Air-Ratchet-Wrench-KAAF1605-TOPTUL', '2019-01-16 14:25:43', '2019-01-16 07:29:20', 13, 7),
(15, ' Durable Lightweight Aluminum Housing.\r\nConvenient One-hand Operation with Side Mounted F/R Lever.\r\nFully Hardened Planetary Gearing for Long Life.\r\nSoft Grip for Increased Comfort.\r\nRear Exhaust.\r\nHeavy Duty Ball and Needle Bearing.\r\nRemovable Auxiliary Handle Included.', 'RP7104', '12Inch-Reversible-Air-Drill-RP7104-WIPRO', '2019-01-16 14:27:06', '2019-01-16 07:29:00', 14, 7),
(16, 'Dongkrak adalah alat untuk menaikkan kendaraan guna mempermudah pekerjaan reparasi dibagian bawah kendaraan\r\n\r\nBottle jack / dongkrak botol, dongkrak ini disebut bottle jack karena bentuknya seperti botol. Fungsi bottle jack sama seperti crocodile jack, yaitu untuk mengangkat kendaraan pada ketinggian tertentu untuk dapat melakukan perbaikan pada bagian bawah kendaraan. Perbedaannya adalah penggunaan bottle jack dapat dimasukkan kedalam kendaraan sebagai perlengkapan utama kendaraan yang mutlak dibutuhkan untuk mengganti roda (ban) sewaktu ban kempes/ bocor.Untuk mendongkrak sebuah kendaraan, dongkrak harus diletakkan tegak lurus pada torak pengangkatnya supaya jangan sampai bengkok.', '10 Ton', 'Dongkrak-Botol-10-Ton-TEKIRO', '2019-01-16 14:28:43', '2019-01-16 07:28:43', 15, 2),
(17, 'atrol adalah suatu roda dengan bagian berongga di sepanjang sisinya untuk tempat tali atau kabel. Katrol biasanya digunakan dalam suatu rangkaian yang dirancang untuk mengurangi jumlah gaya yang dibutuhkan untuk mengangkat suatu beban. Walaupun demikian, jumlah usaha yang dilakukan untuk membuat beban tersebut mencapai tinggi yang sama adalah sama dengan yang diperlukan tanpa menggunakan katrol. Besarnya gaya memang dikurangi, tapi gaya tersebut harus bekerja atas jarak yang lebih jauh. Usaha yang diperlukan untuk mengangkat suatu beban secara kasar sama dengan berat beban dibagi jumlah roda. Semakin banyak roda yang ada, sistem semakin tidak efisien. karena akan timbul lebih banyak gesekan antara tali dan roda. Katrol adalah salah satu dari enam jenis pesawat sederhana.\r\n\r\nTidak ditemukan catatan mengenai kapan dan oleh siapa katrol pertama kali dikembangkan, tapi kemugkinan besar berasal dari Eurasia. Bagian dasar pembentuk sistem katrol, roda, ditemukan beberapa waktu setelah penemuan di Eurasia pada masyarakat di belahan barat, Afrika sub-Sahara, dan Australia. Dipercayai juga bahwa Archimedes mengembangkan rangkaian sistem katrol pertama, sebagai mana dicatat oleh Plutarch.', '5 Ton x 5 M', 'Chain-Block-5Ton-x-5M', '2019-01-16 14:30:26', '2019-01-16 07:30:26', 16, 2),
(18, ' Jual 14 In 1 Multi Function 88 712  SELLERY Murah', '88-712 ', '14-In-1-Multi-Function-88-712-SELLERY', '2019-01-16 14:32:04', '2019-01-16 07:32:18', 17, 6),
(19, 'Merk : WIPRO', 'HS 1245', '14-Pcs-Cup-Type-Oil-Filter-Wrench-Set-HS-1245-WIPRO', '2019-01-16 14:33:54', '2019-01-16 07:33:54', 18, 6),
(20, 'Bearing Puller Disassembler 5 pcs (8958150) AMERICAN TOOL ( Top Quality ) Alat Lepas Bearing / Perkakas Bengkel / Alat Alat Motor\r\n\r\nUntuk melepas bearing dalam pada motor\r\nTerdiri dari 5 buah mata bearing berbagai ukuran\r\nCara penggunaan :\r\nMata bearing dipasangkan dengan as puller lalu dimasukkan ke bearing, lalu mata bearing ditahan menggunakan kunci pas, as puller diputar sampai mata bearing mengembang. Setelah itu selongsong bearing dimasukkan ke as puller beserta dengan ring untuk menahan selongsong. Mur yang berada pada as puller diputar menggunakan kunci pas sehingga bearing akan terbawa keluar.\r\nJika ukuran mata bearing berbeda sedikit dari ukuran di atas, tetap dapat digunakan karena mata bearing akan mengembang.', '5 pcs (8958150)', 'Bearing-Puller-Disassembler-5-pcs-8958150-AMERICAN-TOOL', '2019-01-16 14:35:15', '2019-01-16 07:35:15', 19, 3),
(21, 'jual Chain Cutter Big Body 9604 GREAT Harga Murah, Special Tool Sepeda Motor: Clutch Housing Holder, Clutch Spring Compresor, dll. ', 'Big Body', 'Chain-Cutter-Big-Body-9604-GREAT', '2019-01-16 14:36:56', '2019-01-16 07:36:56', 20, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_done`
--

CREATE TABLE `transaksi_done` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `kode_unik` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_done`
--

INSERT INTO `transaksi_done` (`id`, `orders_id`, `kode_unik`, `customer_id`, `method`, `tanggal`) VALUES
(1, 2, '8QxkiN', 2, 'antar', '2019-01-16 08:01:51'),
(5, 1, 'NPcqoW', 2, 'jemput', '2019-01-16 21:33:23'),
(6, 9, 'M0CSz3', 4, 'antar', '2019-01-16 22:44:26'),
(7, 11, 'qKuTuz', 4, 'jemput', '2019-01-16 22:52:46'),
(8, 4, '1Sl9zG', 1, 'antar', '2019-01-17 00:09:48'),
(9, 13, 'KvA1c9', 1, 'antar', '2019-01-17 00:22:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `antar`
--
ALTER TABLE `antar`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `jemput`
--
ALTER TABLE `jemput`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transaksi_done`
--
ALTER TABLE `transaksi_done`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `antar`
--
ALTER TABLE `antar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_toko`
--
ALTER TABLE `info_toko`
  MODIFY `info_toko_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jemput`
--
ALTER TABLE `jemput`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kode_unik`
--
ALTER TABLE `kode_unik`
  MODIFY `kode_unik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_details`
--
ALTER TABLE `products_details`
  MODIFY `products_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi_done`
--
ALTER TABLE `transaksi_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
