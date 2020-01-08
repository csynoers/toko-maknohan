-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2018 at 04:47 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_gentur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'admin',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@konveksigs.com', '08238923848', 'admin', 'N'),
('gentur', '32dfd459bb719a390ae9cc4ff7c2f93a', 'Gentur Adi Nugroho', 'gentur@gmail.com', '08564537589', 'admin', 'N'),
('aji', '8d045450ae16dc81213a75b725ee2760', 'gentur aji', 'genturtaufik@gmail.com', '098876544', 'admin', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Cara Pembelian', '<p>\r\n&nbsp;Cara Pembelian ;\r\n</p>\r\n<ol>\r\n	<li>Klik pada tombol Beli pada produk yang ingin Anda pesan.</li>\r\n	<li>Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol Kali yang berada di kolom paling kanan.</li>\r\n	<li>Jika sudah selesai, klik tombol Selesai Belanja, maka akan tampil form untuk pengisian data kustomer/pembeli.</li>\r\n	<li>Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran.Harap Konfrimasi Ke nomor HP : 085292777746 jika sudah melakukan pembayaran.</li>\r\n	<li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan.<br />\r\n	</li>\r\n</ol>\r\n', '2015-10-30', ''),
(2, 'Profil Sinar Abadi Batik', '<div style="color: #333333; font-family: Helvetica, sans-serif; font-size: 13.6px; line-height: 20.4px; margin-bottom: 10px">\r\n<div style="text-align: justify">\r\n<span style="font-size: 13.6px">Sinar Abadi Batik atau SAB merupakan salah satu home industriyang berada di Gulu Rejo Lendah Kulonprogo. SAB didirikan oleh bapak puryanto pada tahun 2008, bapak puryanto merupakan salah satu pengrajin yang cukup terkenal dan karyanya menjadi favorit bagi para pelanggan.&nbsp;</span>\r\n</div>\r\n</div>\r\n<div style="color: #333333; font-family: Helvetica, sans-serif; font-size: 13.6px; line-height: 20.4px; margin-bottom: 10px">\r\n<div style="text-align: justify">\r\n<span style="font-size: 13.6px">Para pelanggan batik SAB terdiri dari dari berbagai kalangan diantaranya, dari kalagan pejabat pemerintahan, instansi-instansi, ataupun masyarakat biasa.&nbsp;</span>\r\n</div>\r\n<div style="text-align: justify">\r\nSinar Abadi Batik dikenal dengan desain batiknya yang sangat inovativ dan menarik.&nbsp;\r\n</div>\r\n</div>\r\n', '2015-10-30', 'sinar .jpg'),
(3, 'Hubungi Kami', '<h5 style="margin: 10px 0px">ADDITIONAL INFORMATION</h5>\r\n<p style="margin: 0px 0px 10px; color: #333333">\r\n<font size="2"><strong>Phone Agus:</strong>0813 9015 7959\r\n</font>\r\n</p>\r\n<p style="margin: 0px 0px 10px; color: #333333">\r\n<font size="2"><strong>Fita:</strong>0856 2853 19\r\n</font>\r\n</p>\r\n<p style="margin: 0px 0px 10px; color: #333333">\r\n<font size="2"><strong>Email:</strong> sinarabadibatikkp@yahoo.com\r\n</font>\r\n</p>\r\n<font size="2"><br />\r\n</font>\r\n<h5 style="margin: 10px 0px"><font size="2">WORK SHOP</font></h5>\r\n<p>\r\n<font size="2">\r\nKasihan 1, Ngentakrejo, Lendah, Kulon Progo, \r\n</font>\r\n</p>\r\n<p>\r\n<font size="2">\r\nYogyakarta 55663</font>\r\n</p>\r\n<font size="2"><strong style="color: #222222; font-family: Raleway, HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif">Alamat Toko:&nbsp;</strong><span style="color: #222222; font-family: Raleway, HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif">Jl. Sutijab No.48, Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55651, Indonesia</span><br />\r\n</font>\r\n<p>\r\n<font size="2"><strong style="color: #222222; font-family: Raleway, HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif">Telp:</strong><span style="color: #222222; font-family: Raleway, HelveticaNeue, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif">&nbsp;+62 858-6865-0026&nbsp;</span>&nbsp;</font>\r\n</p>\r\n<p style="margin: 0px 0px 10px; color: #333333">\r\n<font size="2"><strong style="color: #222222">Jam Operasional:</strong><br />\r\n<span style="color: #222222">Monday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Tuesday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Wednesday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Thursday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Friday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Saturday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style="color: #222222">Sunday: 9:00 AM &ndash; 6:00 PM</span></font>\r\n</p>\r\n', '2017-10-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(27, 'Silvi', 'silvi@gmail.com', 'TAnya saja', 'tes tessss', '2017-10-26'),
(28, 'andi', 'dimasandi@gmail.com', 'coba', 'coba tes', '2018-01-13');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(9, 'Baju', 'baju'),
(16, 'Kain', 'kain');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT,
  `id_orders` int(5) NOT NULL,
  `pemilik_rekening` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Baru',
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_orders`, `pemilik_rekening`, `tanggal`, `jam`, `gambar`, `status`) VALUES
(1, 1, 'Silvi Agustina', '2018-01-21', '14:37:18', 'Blitar-Xderes.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `ongkos_kirim`) VALUES
(1, 'Jakarta', 13000),
(2, 'Bandung', 13500),
(3, 'Semarang', 10000),
(4, 'Medan', 10000),
(5, 'Aceh', 25000),
(6, 'Banjarmasin', 17500),
(7, 'Balikpapan', 18500),
(8, 'Samarinda', 19500),
(9, 'Lainnya', 10000),
(10, 'Palembang', 23000),
(11, 'Surabaya', 13000);

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

CREATE TABLE IF NOT EXISTS `kustomer` (
  `id_kustomer` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `blokir` varchar(15) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_kustomer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `email`, `password`, `nama`, `no_telp`, `tgl_daftar`, `blokir`) VALUES
(2, 'fajar@gmail.com', '24bc50d85ad8fa9cda686145cf1f8aca', 'Fajar Nugroho Setiawan', '08564537589', '2017-11-12', 'N'),
(3, 'sofyan@gmail.com', 'a43ea2f3c29ef3423c48d633d1a1909d', 'Sofyan', '085645375675', '2017-11-28', 'N'),
(4, 'genturtaufi@gmail.com', '32dfd459bb719a390ae9cc4ff7c2f93a', 'gentur taufik septiaji', '085678745', '2018-01-11', 'N'),
(5, 'dimas@gmail.com', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', '097865547', '2018-01-11', 'N'),
(6, 'bayu@gmail.com', 'a430e06de5ce438d499c2e4063d60fd6', 'bayu', '089765876', '2018-01-15', 'N'),
(7, 'hanung@gmail.com', '52022deb1378b8590ecd1aba5b905d77', 'hanung', '098787766', '2018-01-17', 'N'),
(8, 'bani@gmail.com', '497a333d611f80dfddb5407f81632a85', 'bani', '098657899', '2018-01-17', 'N'),
(9, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '2018-01-21', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `norek`
--

CREATE TABLE IF NOT EXISTS `norek` (
  `id_norek` int(5) NOT NULL AUTO_INCREMENT,
  `atas_nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_norek`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `norek`
--

INSERT INTO `norek` (`id_norek`, `atas_nama`, `bank`, `nomor`, `gambar`) VALUES
(1, 'Gatot Saputro', 'Mandiri', '1234-09867-3456', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(15) NOT NULL AUTO_INCREMENT,
  `id_kustomer` int(5) NOT NULL,
  `id_kota` int(5) NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Baru',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `jenis_pembayaran` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_kustomer`, `id_kota`, `alamat`, `status_order`, `tgl_order`, `jam_order`, `jenis_pembayaran`) VALUES
(1, 2, 1, 'Jl. Gejayan No. 25, Yogyakarta', 'Baru', '2017-11-28', '21:55:00', ''),
(27, 4, 5, 'jogja', 'Baru', '2018-01-12', '10:02:03', 'BANK'),
(34, 8, 1, 'bandung', 'Baru', '2018-01-17', '11:21:47', 'BANK'),
(33, 8, 5, 'bandung', 'Baru', '2018-01-17', '11:19:51', 'BANK'),
(32, 8, 2, 'jogja', 'Baru', '2018-01-17', '11:17:31', 'BANK'),
(31, 8, 7, 'jogja', 'Baru', '2018-01-17', '11:15:05', 'BANK'),
(30, 0, 2, 'dfghj', 'Baru', '2018-01-16', '04:24:44', 'IPAYMU'),
(21, 4, 11, 'jogja', 'Lunas', '2018-01-11', '10:50:02', 'BANK'),
(29, 6, 8, 'jogja', 'Baru', '2018-01-16', '03:53:32', 'BANK'),
(23, 4, 5, 'jogja', 'Lunas', '2018-01-11', '11:12:35', 'BANK'),
(28, 6, 5, 'jogja', 'Lunas', '2018-01-15', '14:25:40', 'BANK'),
(25, 5, 7, 'jogja', 'Lunas', '2018-01-11', '11:35:45', 'BANK'),
(26, 5, 0, '', 'Lunas', '2018-01-11', '11:39:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `id_ukuran`, `jumlah`) VALUES
(1, 1, NULL, 1),
(2, 4, 0, 1),
(2, 2, 6, 2),
(3, 4, 0, 1),
(4, 2, 6, 1),
(5, 4, 0, 1),
(7, 4, 0, 1),
(8, 4, 0, 1),
(9, 4, 0, 1),
(10, 4, 0, 1),
(11, 5, 0, 1),
(15, 5, 0, 1),
(16, 5, 0, 1),
(17, 5, 0, 1),
(18, 5, 0, 1),
(19, 4, 0, 1),
(20, 4, 0, 2),
(21, 6, 6, 2),
(23, 7, 6, 1),
(24, 6, 6, 1),
(25, 7, 6, 1),
(27, 6, 6, 1),
(28, 8, 5, 1),
(29, 8, 5, 1),
(30, 9, 1, 1),
(31, 8, 5, 1),
(32, 8, 5, 1),
(33, 9, 5, 1),
(34, 9, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL,
  PRIMARY KEY (`id_orders_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=94 ;

--
-- Dumping data for table `orders_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(5) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) unsigned NOT NULL DEFAULT '0.00',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`) VALUES
(4, 9, 'batik sd', 'batik-sd', 'kain batik yang diunakan sebai bahan baju sragam ana sd.<br />\r\n', 60000, 2, '1.00', '2018-01-05', '9320151024-82470geblek-renteng-seragam-sd.jpg', 1),
(2, 9, 'Batik Tulis Coklat', 'batik-tulis-coklat', 'kain batik yang pembuatanya menggunakan teknik tulis tangan                                            \r\n', 100000, 15, '1.00', '2018-01-05', '76images (1).jpg', 1),
(3, 9, 'Batik Cap', 'batik-cap', 'kain batik yang elegan utuk dikenakan<br />\r\n                                            \r\n', 90000, 12, '1.00', '2018-01-05', '62batik-geblek-renteng-kulon-progo.jpg', 1),
(6, 9, 'batik', 'batik', 'batik yang bagus\r\n', 300000, 5, '1.00', '2018-01-11', '68640px-Batikyogya_01.jpg', 1),
(8, 16, 'Batik Pulau', 'batik-pulau', 'batik pulau sangat bagus corraknya penuh dengan karya seni\r\n', 100000, 5, '1.00', '2018-01-14', '11640px-Batikyogya_01.jpg', 1),
(9, 16, 'Batik Tradisional', 'batik-tradisional', 'kain batik yang bagus\r\n', 150000, 6, '1.00', '2018-01-14', '581371653692_521094585_1-Jual-batik-Geblek-Renteng-Lendah-Kulon-Progo.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE IF NOT EXISTS `produk_ukuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `produk_ukuran`
--

INSERT INTO `produk_ukuran` (`id`, `id_produk`, `id_ukuran`) VALUES
(10, 7, 6),
(11, 7, 7),
(12, 7, 8),
(13, 7, 9),
(14, 7, 10),
(15, 7, 11),
(16, 6, 6),
(17, 6, 7),
(18, 6, 8),
(19, 6, 9),
(30, 4, 5),
(31, 4, 3),
(32, 4, 2),
(33, 4, 1),
(34, 4, 4),
(35, 3, 5),
(36, 3, 3),
(37, 3, 2),
(38, 3, 1),
(39, 3, 4),
(40, 2, 5),
(41, 2, 3),
(42, 2, 2),
(43, 2, 1),
(44, 2, 4),
(45, 8, 5),
(46, 8, 3),
(47, 8, 2),
(48, 8, 1),
(49, 8, 4),
(50, 9, 5),
(51, 9, 3),
(52, 9, 2),
(53, 9, 1),
(54, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id_slide` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `gambar`) VALUES
(4, 'Batik SAB Kulon Progo', 'label-sab.jpg'),
(5, 'Work Shop & Gallery', 'slidebatik.jpg'),
(6, 'Batik SAB Kulon Progo', 'slide-batik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE IF NOT EXISTS `ukuran` (
  `id_ukuran` int(10) NOT NULL AUTO_INCREMENT,
  `kode_ukuran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_ukuran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `kode_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'ALL SIZE'),
(6, '40'),
(7, '41'),
(8, '42'),
(9, '43'),
(10, '44'),
(11, '220 x 115');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
