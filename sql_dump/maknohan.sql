-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 02:13 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maknohan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'admin',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
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

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Cara Pembelian', '<p>\r\n&nbsp;Cara Pembelian ;\r\n</p>\r\n<ol>\r\n	<li>Klik pada tombol Beli pada produk yang ingin Anda pesan.</li>\r\n	<li>Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol hapus yang berada di kolom paling kanan.</li>\r\n	<li>Jika sudah selesai, klik tombol checkout, isikan alamat anda, pilih metode pembayaran.</li>\r\n	<li>Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran jika melakukan proses pembayaran menggunkan fasapay ikut alur yang diminta oleh fasapay. Harap Konfrimasi Ke nomor HP : 085292777746 jika sudah melakukan pembayaran atau konfirmasi melaluli website.</li>\r\n	<li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan.<br />\r\n	</li>\r\n</ol>\r\n', '2015-10-30', ''),
(2, 'Profil Mak Nohan Oleh-Oleh Wonosobo', '<div style=\"line-height: 20.4px; margin-bottom: 10px\">\r\n<div style=\"text-align: justify\">\r\n<font face=\"Helvetica, sans-serif\" color=\"#333333\"><span style=\"font-size: 13.6px\">pusat oleh-oleh khas wonosobo &quot;Mak Nohan&quot; menjual berbagai macam makanan khas wonosobo,seperti carica in syrup,kacang dieng, jamur dieng,rengging, opak, purwaceng dll...dengan harga terjangkau dan beda dengan yang lain...melayani pemesanan dalam dan luar kota..</span></font>\r\n</div>\r\n</div>\r\n<div style=\"color: #333333; font-family: Helvetica, sans-serif; font-size: 13.6px; line-height: 20.4px; margin-bottom: 10px\">\r\n</div>\r\n', '2015-10-30', 'sinar .jpg'),
(3, 'Hubungi Kami', '<h5 style=\"margin: 10px 0px\">ADDITIONAL INFORMATION</h5>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Phone Agus:</strong>0813 9015 7959\r\n</font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Fita:</strong>0856 2853 19\r\n</font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Email:</strong> tokomaknohan@gmail.com\r\n</font>\r\n</p>\r\n<h5 style=\"margin: 10px 0px\"><strong style=\"font-size: small; color: #222222\">Alamat Toko: </strong><span style=\"font-size: small; color: #222222; font-weight: normal\">Jl. Raya Kretek km 05 Sayangan Wonosobo</span></h5>\r\n<p>\r\n<font size=\"2\"><strong style=\"color: #222222\">Telp:</strong><span style=\"color: #222222\">Â +62 858-6865-0026Â </span>Â </font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong style=\"color: #222222\">Jam Operasional:</strong><br />\r\n<span style=\"color: #222222\">Monday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Tuesday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Wednesday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Thursday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Friday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Saturday: 9:00 AM â€“ 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Sunday: 9:00 AM â€“ 6:00 PM</span></font>\r\n</p>\r\n', '2017-10-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(27, 'Silvi', 'silvi@gmail.com', 'TAnya saja', 'tes tessss', '2017-10-26'),
(28, 'andi', 'dimasandi@gmail.com', 'coba', 'coba tes', '2018-01-13'),
(29, 'ajisaongko', 'genturtaufik@gmail.com', 'tes', 'coba', '2018-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(25, 'Carica', 'carica'),
(26, 'Purwaceng', 'purwaceng');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirmasi` int(5) NOT NULL,
  `id_orders` int(5) NOT NULL,
  `pemilik_rekening` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Baru'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kustomer`
--

CREATE TABLE `kustomer` (
  `id_kustomer` int(5) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tgl_daftar` date NOT NULL,
  `blokir` varchar(15) NOT NULL DEFAULT 'N',
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `email`, `password`, `nama`, `no_telp`, `tgl_daftar`, `blokir`, `address`) VALUES
(2, 'fajar@gmail.com', '24bc50d85ad8fa9cda686145cf1f8aca', 'Fajar Nugroho Setiawan', '08564537589', '2017-11-12', 'N', ''),
(3, 'sofyan@gmail.com', 'a43ea2f3c29ef3423c48d633d1a1909d', 'Sofyan', '085645375675', '2017-11-28', 'N', ''),
(4, 'genturtaufi@gmail.com', '32dfd459bb719a390ae9cc4ff7c2f93a', 'gentur taufik septiaji', '085678745', '2018-01-11', 'N', ''),
(5, 'dimas@gmail.com', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', '097865547', '2018-01-11', 'N', ''),
(6, 'bayu@gmail.com', 'a430e06de5ce438d499c2e4063d60fd6', 'bayu', '089765876', '2018-01-15', 'N', 'jl.dandeles bantul rt 4 rw 5'),
(7, 'hanung@gmail.com', '52022deb1378b8590ecd1aba5b905d77', 'hanung', '098787766', '2018-01-17', 'N', ''),
(8, 'bani@gmail.com', '497a333d611f80dfddb5407f81632a85', 'bani', '098657899', '2018-01-17', 'N', ''),
(9, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '2018-01-21', 'N', ''),
(10, 'hhh@gmail.com', 'a3aca2964e72000eea4c56cb341002a4', 'dimasandi', '089765433', '2018-01-23', 'N', ''),
(11, 'rahma@gmail.com', 'b007b7d6520a7b3dcccd2a1ec2891009', 'rahma', '089765454', '2018-01-26', 'N', ''),
(12, 'genturtaufik@gmail.com', '1617309f37368466bcbbed50f4096f05', 'gentur aji', '085602114202', '2018-02-01', 'N', ''),
(13, 'ajisaongko@gmail.com', '8d045450ae16dc81213a75b725ee2760', 'ajisaongko', '09876544', '2018-03-22', 'N', ''),
(14, 'boejoels@gmail.com', 'c000ccf225950aac2a082a59ac5e57ff', 'anwari lutfi', '0897575555', '2018-07-31', 'N', 'yogyakarta, bonbin'),
(15, 'heru@gmail.com', 'a648ab9a3e32c5f3f6e9ddbd41c0530f', 'Heru Setiawan', '086758455', '2018-08-17', 'N', 'jogja janti km 10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` int(15) NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Belum-Dibayar',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `jenis_pembayaran` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kurir` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `paket` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ongkir` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_kustomer`, `alamat`, `status_order`, `tgl_order`, `jam_order`, `jenis_pembayaran`, `kurir`, `paket`, `ongkir`) VALUES
(1, 6, 'Baciro, Gondokusuman, Yogyakarta City, Special Region of Yogyakarta 55225', 'Belum-Dibayar', '2020-01-12', '12:34:23', 'FASAPAY', 'jne', 'OKE', 42000);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_produk`, `id_ukuran`, `jumlah`) VALUES
(1, 3, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE `orders_temp` (
  `id_orders_temp` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  `stok_temp` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `produk_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `berat` decimal(5,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`) VALUES
(1, 25, 'Carica Sumbing 1 Dus isi 4 cup', 'carica-sumbing-1-dus-isi-4-cup', '                                            <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    ', 16000, 99, '0.48', '2020-01-10', '29carica-isi-4-cup-400x400.jpg', 1),
(2, 25, 'Carica Sumbing 1 Dus isi 6 cup', 'carica-sumbing-1-dus-isi-6-cup', '                                            <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    ', 22000, 150, '0.72', '2020-01-10', '85carica-sumbing-cup-isi-6-400x400.jpg', 1),
(3, 25, 'Carica Sumbing 1 Dus isi 12 cup', 'carica-sumbing-1-dus-isi-12-cup', '                                                                                        <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    \r\n                    ', 42000, 199, '1.44', '2020-01-10', '47carica-cup-isi-12-400x400.jpg', 1),
(4, 26, 'Purwaceng Kopi Dieng Purba', 'purwaceng-kopi-dieng-purba', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Merupakan olahan tanaman herbal purwaceng dalam bentuk serbuk yang dicampur dengan kopi. Dengan komposisi yang ideal, minuman ini menghadirkan cita rasa yang mantap namun tetap berkhasiat tinggi untuk meningkatkan semangat dan stamina Anda. Purwaceng Kopi sangat baik untuk kesehatan.</span>\r\n', 70000, 50, '0.10', '2020-01-12', '56purwaceng-kopi.jpg', 1),
(5, 26, 'Purwaceng Susu Dieng Purba', 'purwaceng-susu-dieng-purba', '                                            <p>\r\n<strong style=\"box-sizing: border-box; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Produk Premium Purwaceng Susu</strong><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">1 pak isi 10</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">10 x 15 gram</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">100% herbal murni</span>\r\n</p>\r\n<p>\r\nÂ \r\n</p>\r\n<p>\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Purwaceng susu adalah paduan antaraÂ </span><strong style=\"box-sizing: border-box; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">tanaman purwaceng Dieng</strong><span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Â dengan rempah-rempah ditambah susu, sehingga menjadi minuman dengan citarasa tinggi, berkhasiat sangat istimewa bagi kesehatan, terutama untuk penambah stamina.</span>Â \r\n</p>\r\n\r\n                    ', 85000, 60, '0.25', '2020-01-12', '6920190724_2234131.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(108, 9, 10),
(109, 9, 11),
(110, 8, 10),
(111, 8, 11),
(114, 6, 10),
(115, 6, 11),
(116, 4, 10),
(117, 4, 11),
(145, 10, 10),
(146, 10, 11),
(149, 12, 10),
(150, 12, 11),
(153, 11, 10),
(154, 11, 11),
(157, 14, 10),
(158, 14, 11),
(159, 15, 10),
(160, 15, 11),
(161, 16, 10),
(162, 16, 11),
(163, 17, 10),
(164, 17, 11),
(165, 18, 10),
(166, 18, 11),
(171, 19, 10),
(172, 19, 11),
(173, 20, 10),
(174, 20, 11),
(175, 21, 10),
(176, 21, 11),
(181, 23, 10),
(182, 23, 11),
(183, 22, 10),
(184, 22, 11),
(188, 26, 10),
(189, 25, 10),
(190, 24, 10),
(191, 24, 11),
(192, 27, 10),
(194, 28, 10),
(195, 29, 10),
(196, 30, 10),
(197, 31, 10),
(198, 32, 10),
(199, 33, 10),
(201, 35, 10),
(202, 34, 10),
(203, 36, 10),
(204, 37, 10),
(205, 38, 10),
(206, 39, 10),
(207, 40, 10),
(208, 41, 10),
(209, 42, 10),
(210, 43, 10),
(211, 44, 10),
(212, 45, 10),
(214, 47, 10),
(215, 48, 10),
(217, 46, 10),
(218, 50, 10),
(220, 52, 10),
(221, 53, 10),
(222, 54, 10),
(228, 13, 9),
(229, 13, 8),
(230, 13, 7),
(231, 13, 6),
(234, 49, 10),
(236, 55, 10),
(237, 51, 10),
(239, 56, 8),
(242, 57, 9),
(243, 58, 8),
(244, 59, 7),
(245, 60, 10),
(247, 61, 11),
(248, 62, 10),
(249, 63, 10),
(250, 64, 10),
(251, 65, 10),
(252, 66, 11),
(253, 67, 11),
(254, 68, 11),
(255, 69, 11),
(256, 70, 11),
(257, 71, 11),
(258, 72, 11),
(259, 73, 11),
(260, 74, 11),
(261, 75, 11),
(262, 76, 10),
(263, 77, 10),
(264, 78, 11),
(267, 79, 11),
(268, 80, 10),
(269, 81, 10),
(270, 82, 11),
(271, 83, 10),
(272, 84, 11),
(273, 85, 10),
(274, 86, 11),
(275, 87, 10),
(276, 88, 11),
(277, 89, 11),
(278, 90, 10),
(279, 91, 11),
(280, 92, 10),
(281, 93, 11),
(282, 94, 10),
(283, 95, 11),
(284, 96, 10),
(285, 97, 11),
(286, 98, 10),
(287, 99, 11),
(292, 2, 13),
(293, 1, 13),
(294, 3, 13),
(295, 4, 14),
(297, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `gambar`) VALUES
(7, 'Carica Sumbing', 'Slide Carica Sumbing.jpeg'),
(9, 'Mie Ongklok', 'Slide Mie Ongklok.jpeg'),
(10, 'Teh Tambi', 'Slide Teh Tambi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(10) NOT NULL,
  `kode_ukuran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `kode_ukuran`) VALUES
(14, '100 gr'),
(15, '250 gr'),
(13, '120 gr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indexes for table `kustomer`
--
ALTER TABLE `kustomer`
  ADD PRIMARY KEY (`id_kustomer`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
  ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
  MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
