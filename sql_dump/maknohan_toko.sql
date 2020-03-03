-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2020 at 09:08 PM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maknohan_toko`
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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@konveksigs.com', '08238923848', 'admin', 'N');

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
(29, 'ajisaongko', 'genturtaufik@gmail.com', 'tes', 'coba', '2018-08-01'),
(30, 'Kennethexine', 'raphaeEneseGymn@gmail.com', 'Do you want cheap and innovative advertising for little money?', 'Good day!  maknohan.com \r\n \r\nDid you know that it is possible to send letter wholly legitimate way? \r\nWe propose a new method of sending proposal through feedback forms. Such forms are located on many sites. \r\nWhen such proposals are sent, no personal data is used, and messages are sent to forms specifically designed to receive messages and appeals. \r\nAlso, messages sent through contact Forms do not get into spam because such messages are considered important. \r\nWe offer you to test our service for free. We will send up to 50,000 messages for you. \r\nThe cost of sending one million messages is 49 USD. \r\n \r\nThis offer is created automatically. Please use the contact details below to contact us. \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', '2020-02-01'),
(31, 'Terrygycle', 'hcard.marketing@gmail.com', 'Bisakah Anda memperkenalkan MasterCard di situs web Anda?', 'Hai, saya Chris, direktur pemasaran kartu debit crypto bernama Hcard. \r\n \r\nKali ini saya menghubungi Anda untuk memperkenalkan Hcard di situs web Anda. \r\n \r\nHcard adalah penyihir kartu debit merek MasterCard yang sangat mudah digunakan. \r\n \r\nPenggunaan Hcard membutuhkan aplikasi Fiatbit dan Hcard. \r\n \r\nAplikasi Fiatbit memiliki fungsi afiliasi dan Anda dapat menerima hadiah berikut ketika penerbit kartu keluar dari tautan referensi Anda. \r\n \r\n>> Hadiah Penerbitan Kartu \r\n1 tingkat: $ 100-an \r\n2 tingkat: $ 50 \r\n3 tingkat: $ 30 \r\n \r\n>> Isi hadiah \r\n1 tingkat: 30% dari biaya \r\n2tier: 20% dari biaya \r\n3 tingkat: 10% dari biaya \r\n \r\nUntuk menerima hadiah, Anda harus membuka akun dari tautan di bawah ini. \r\nhttps://www.fiatbit.com/register.html?recommendCode=72cf \r\n \r\nSetelah membuka akun Anda, silakan instal aplikasi dari tautan di bawah ini dan masuk. \r\n \r\niPhone \r\nhttps://apps.apple.com/ky/app/fiatbit/id1483437141 \r\n \r\nAndroid \r\nhttps://play.google.com/store/apps/details?id=vcb.fiatbit.com&hl=id \r\n \r\nHcard \r\nhttps://hcard.in/ \r\n \r\n \r\nE-mail: \r\nhcard.marketing@gmail.com', '2020-02-19'),
(32, 'Josephpraws', 'yundongyuancun@163.com', 'Supply Yaskawa Servo Motor', 'More than 500.000 Parts available ship worldwide in fast delivery time (PLC, HMI, Inverters, Servo Drives, CNC, Motors - Encoders, Software, Low Voltage...) \r\nNEW PRODUCTS and OBSOLETE / Discontinued by manufacturers:Panasonic Yaskawa,Mitsubishi, AB etc. \r\nhttps://eusens.com/ \r\n130 Brands SIEMENS â€“ ABB â€“ GE FANUC â€“ PHOENIX CONTACT - SCHNEIDER ELECTRIC - ALLEN BRADLEY... \r\nPlease for any request do not hesitate to contact us.', '2020-03-03');

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
(26, 'Purwaceng', 'purwaceng'),
(28, 'Cemilan Khas', 'cemilan-khas'),
(29, 'Mie Ongklok', 'mie-ongklok'),
(30, 'Produk Herbal', 'produk-herbal'),
(31, 'Lain-lain', 'lainlain');

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
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `blokir` varchar(15) DEFAULT 'N',
  `address` varchar(100) DEFAULT NULL,
  `provinsi` int(2) DEFAULT NULL,
  `kota` int(3) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `kode_konfirmasi` varchar(100) DEFAULT NULL,
  `status_konfirmasi` char(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `email`, `password`, `nama`, `no_telp`, `tgl_daftar`, `blokir`, `address`, `provinsi`, `kota`, `kode_pos`, `kode_konfirmasi`, `status_konfirmasi`) VALUES
(2, 'fajar@gmail.com', '24bc50d85ad8fa9cda686145cf1f8aca', 'Fajar Nugroho Setiawan', '08564537589', '2017-11-12', 'N', '', NULL, NULL, NULL, NULL, NULL),
(3, 'sofyan@gmail.com', 'a43ea2f3c29ef3423c48d633d1a1909d', 'Sofyan', '085645375675', '2017-11-28', 'N', '', NULL, NULL, NULL, NULL, NULL),
(4, 'genturtaufi@gmail.com', '32dfd459bb719a390ae9cc4ff7c2f93a', 'gentur taufik septiaji', '085678745', '2018-01-11', 'N', '', NULL, NULL, NULL, NULL, NULL),
(5, 'dimas@gmail.com', '7d49e40f4b3d8f68c19406a58303f826', 'dimas', '097865547', '2018-01-11', 'N', '', NULL, NULL, NULL, NULL, NULL),
(6, 'bayu@gmail.com', 'a430e06de5ce438d499c2e4063d60fd6', 'bayu', '089765876', '2018-01-15', 'N', 'jl.dandeles bantul rt 4 rw 5', NULL, NULL, NULL, NULL, NULL),
(28, 'Joni782@gmail.com', '1c0ac25b077a885dc53d91b05b14544e', 'Joni', '085678123456', '2020-01-23', 'N', 'Padukuhan salakan Rt 02/26, Trihanggo, Gamping, Sleman, Yogayakarta', 5, 419, '67823', NULL, NULL),
(25, 'paw@gmail.com', '923bc349921a077cc5ddfb7a091ce0b9', 'paw', '085789456123', '2020-01-23', 'N', 'Padukuhan salakan Rt 02/26, Trihanggo, Gamping, Sleman, Yogayakarta', 5, 501, '35765', NULL, NULL),
(26, 'albert345@gmail.com', '52bcc761775fb6141b704e91df7a55ef', 'albert', '085678234123', '2020-01-23', 'N', 'kota jogja', 5, 501, '87634', NULL, NULL),
(27, 'didi@gmail.com', '3bb7712a8e21862ba3a20abb302c848e', 'didi', '085123456789', '2020-01-23', 'N', 'Padukuhan salakan Rt 02/26, Trihanggo, Gamping, Sleman, Yogayakarta', 5, 419, '35765', NULL, NULL),
(21, '3s0c9m7@gmail.com', '74eeb5ec0ca42aa2085685d886120eac', 'sinur', '081234567890', '2020-01-21', 'N', 'kebumen', 10, 177, '82251', NULL, '1'),
(23, 'toni@gmail.com', 'dce6345ea5b90d6ea53f0ef5c4b4c72c', 'toni', '085678231456', '2020-01-21', 'N', 'gamping', 5, 419, '67823', NULL, NULL),
(29, 'paw12@gmail.com', '923bc349921a077cc5ddfb7a091ce0b9', 'paw', '085987654321', '2020-01-23', 'N', 'Padukuhan salakan Rt 02/26, Trihanggo, Gamping, Sleman, Yogayakarta', 5, 419, '34672', NULL, NULL),
(30, 'tryscm@gmail.com', '74eeb5ec0ca42aa2085685d886120eac', 'sinur', '08122530688', '2020-01-23', 'N', 'sfsdfsdf', 5, 501, '55225', 'bsgc2fe2fl8phv8ool76juv445', '1'),
(31, 'paweat37@gmail.com', '3fac62a6f8a39dc73a8ec3e5fd81c4c8', 'pawit saputra', '085640843424', '2020-01-27', 'N', 'padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman', 5, 419, '55291', '76fm922gu15epf5mg4p5ruqqt6', '1'),
(32, 'hera99donis@gmail.com', '99056b91160db3bd898e37b5bc7e7e7a', 'Heradonis', '085892312555', '2020-01-30', 'N', 'Kalilunjar Rt 02/03, Kec.Banjarmangu, Kab. Banjarnegara\r\nJawa Tengah', 10, 37, '6482', 'se8icia6lvou9rg02cvjpfe3m6', '1'),
(33, 'heradonis@gmail.com', '99056b91160db3bd898e37b5bc7e7e7a', 'Donis', '0869875612333', '2020-01-30', 'N', 'Kalilunjar RT02/03, Kec.Banjarmangu, Kab.Banjarnegara\r\nJawa Tengah', 10, 37, '67823', 'se8icia6lvou9rg02cvjpfe3m6', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_orders` char(32) COLLATE latin1_general_ci NOT NULL,
  `id_kustomer` int(5) DEFAULT NULL,
  `alamat` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `status_order` varchar(50) COLLATE latin1_general_ci DEFAULT 'Unpaid',
  `status_transaksi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `jam_order` time DEFAULT NULL,
  `jenis_pembayaran` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `kurir` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `paket` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `external_id` text COLLATE latin1_general_ci DEFAULT NULL,
  `invoice_url` text COLLATE latin1_general_ci DEFAULT NULL,
  `no_resi` char(64) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_orders`, `id_kustomer`, `alamat`, `status_order`, `status_transaksi`, `tgl_order`, `jam_order`, `jenis_pembayaran`, `kurir`, `paket`, `ongkir`, `external_id`, `invoice_url`, `no_resi`) VALUES
('MA20200123051307', 21, '<b>sinur</b><br>\r\n								081234567890 (3s0c9m7@gmail.com)<br>\r\n								kebumen, Kabupaten Kebumen, Jawa Tengah 82251', 'PAID', 'PESANAN SELESAI', '2020-01-23', '05:25:01', NULL, 'JNE OKE Rp. 9.000 3-6 HARI', NULL, 9000, '5e297a8af8a4d24146f57042', 'https://invoice-staging.xendit.co/web/invoices/5e297a8af8a4d24146f57042', 'MA20200123051307'),
('MN20200123061311', 21, '<b>sinur</b><br>\r\n								081234567890 (3s0c9m7@gmail.com)<br>\r\n								kebumen, Kabupaten Kebumen, Jawa Tengah 82251', 'EXPIRED', 'PESANAN DIBATALKAN', '2020-01-23', '06:13:14', NULL, 'TIKI REG Rp. 32.000 3 HARI', NULL, 32000, '5e297fcdf8a4d24146f570b8', 'https://invoice-staging.xendit.co/web/invoices/5e297fcdf8a4d24146f570b8', NULL),
('MN20200123063249', 29, '<b>paw</b><br>\r\n								085987654321 (paw12@gmail.com)<br>\r\n								Padukuhan salakan Rt 02/26, Trihanggo, Gamping, Sleman, Yogayakarta, Kabupaten Sleman, DI Yogyakarta 34672', 'PAID', 'SEDANG DIPROSES', '2020-01-23', '06:33:00', NULL, 'JNE OKE Rp. 12.000 2-3 HARI', NULL, 12000, '5e29846ef8a4d24146f570f2', 'https://invoice-staging.xendit.co/web/invoices/5e29846ef8a4d24146f570f2', NULL),
('MN20200127084448', 0, '<b></b><br>\r\n								 ()<br>\r\n								,  ,  ', 'UNPAID', 'BELUM BAYAR', '2020-01-27', '08:44:51', NULL, '', NULL, 0, '', '', NULL),
('MN20200127084501', 0, '<b></b><br>\r\n								 ()<br>\r\n								,  ,  ', 'UNPAID', 'BELUM BAYAR', '2020-01-27', '08:47:15', NULL, '', NULL, 0, '', '', NULL),
('', 0, '', 'UNPAID', 'BELUM BAYAR', '2020-01-27', '08:47:18', NULL, '', NULL, 0, '', '', NULL),
('MN20200127095555', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'PAID', 'PESANAN SELESAI', '2020-01-27', '09:56:18', NULL, 'JNE REG Rp. 15.000 1-2 HARI', NULL, 15000, '5e2efa15f8a4d24146f5a35e', 'https://invoice-staging.xendit.co/web/invoices/5e2efa15f8a4d24146f5a35e', 'CGK2H03789568816'),
('MN20200127095802', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'EXPIRED', 'PESANAN DIBATALKAN', '2020-01-27', '09:58:07', NULL, 'JNE OKE Rp. 12.000 2-3 HARI', NULL, 12000, '5e2efa82f8a4d24146f5a361', 'https://invoice-staging.xendit.co/web/invoices/5e2efa82f8a4d24146f5a361', NULL),
('MN20200128102023', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'PAID', 'PESANAN SELESAI', '2020-01-28', '10:20:34', NULL, 'JNE REG Rp. 15.000 1-2 HARI', NULL, 15000, '5e2fa885f8a4d24146f5a9b3', 'https://invoice-staging.xendit.co/web/invoices/5e2fa885f8a4d24146f5a9b3', 'CGK2H03789568816'),
('MN20200128102447', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'PAID', 'SEDANG DIPROSES', '2020-01-28', '10:24:53', NULL, 'JNE REG Rp. 15.000 1-2 HARI', NULL, 15000, '5e2fa987f8a4d24146f5a9be', 'https://invoice-staging.xendit.co/web/invoices/5e2fa987f8a4d24146f5a9be', NULL),
('MN20200130115213', 31, '\r\n									<b>Heradonis</b><br>\r\n									0865456123441 (heradonis@gmail.com)<br>\r\n									Padukuhan Salakan Rt 02/26, Trihanggo, Gamping, Sleman, DIY, Kabupaten Sleman, DI Yogyakarta 55291\r\n								', 'PAID', 'PESANAN SELESAI', '2020-01-30', '11:56:13', NULL, '', NULL, 0, '5e330ab09138ca030f52ac88', 'https://invoice-staging.xendit.co/web/invoices/5e330ab09138ca030f52ac88', 'CGK2H03789568816'),
('MN20200131124357', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'PAID', 'SEDANG DIPROSES', '2020-01-31', '12:44:02', NULL, 'JNE YES Rp. 21.000 1-1 HARI', NULL, 21000, '5e3315e69138ca030f52acef', 'https://invoice-staging.xendit.co/web/invoices/5e3315e69138ca030f52acef', NULL),
('MN20200208121618', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'EXPIRED', 'PESANAN DIBATALKAN', '2020-02-08', '12:18:16', NULL, 'JNE OKE Rp. 12.000 2-3 HARI', NULL, 12000, '5e3e449b9138ca030f5309ab', 'https://invoice-staging.xendit.co/web/invoices/5e3e449b9138ca030f5309ab', NULL),
('MN20200303035838', 31, '<b>pawit saputra</b><br>\r\n								085640843424 (paweat37@gmail.com)<br>\r\n								padukuhan salakan rt 02/26, Trihanggo, Gamping, Sleman, Kabupaten Sleman, DI Yogyakarta 55291', 'PAID', 'SEDANG DIPROSES', '2020-03-03', '03:58:57', NULL, 'JNE OKE Rp. 24.000 2-3 HARI', NULL, 24000, '5e5e1c54f4e318243d332d2d', 'https://invoice-staging.xendit.co/web/invoices/5e5e1c54f4e318243d332d2d', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders_detail` int(11) NOT NULL,
  `id_orders` char(32) COLLATE latin1_general_ci DEFAULT NULL,
  `id_produk` int(5) DEFAULT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders_detail`, `id_orders`, `id_produk`, `id_ukuran`, `jumlah`) VALUES
(1, 'MA20200123051307', 5, NULL, 1),
(2, 'MN20200123061311', 3, NULL, 1),
(3, 'MN20200123063249', 20, NULL, 1),
(4, 'MN20200123063249', 22, NULL, 1),
(5, 'MN20200127084448', 22, NULL, 1),
(6, 'MN20200127095555', 21, NULL, 1),
(7, 'MN20200127095802', 22, NULL, 1),
(8, 'MN20200128102023', 22, NULL, 1),
(9, 'MN20200128102447', 20, NULL, 1),
(10, 'MN20200130115213', 22, NULL, 1),
(11, 'MN20200131124357', 21, NULL, 1),
(12, 'MN20200208121618', 8, NULL, 5),
(13, 'MN20200303035838', 3, NULL, 1),
(14, 'MN20200303035838', 20, NULL, 1);

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
  `berat` decimal(5,2) UNSIGNED NOT NULL DEFAULT 0.00,
  `tgl_masuk` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibeli` int(5) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`) VALUES
(1, 25, 'Carica Sumbing 1 Dus isi 4 cup', 'carica-sumbing-1-dus-isi-4-cup', '                                            <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    ', 16000, 99, 0.48, '2020-01-10', '29carica-isi-4-cup-400x400.jpg', 1),
(2, 25, 'Carica Sumbing 1 Dus isi 6 cup', 'carica-sumbing-1-dus-isi-6-cup', '                                            <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    ', 22000, 150, 0.72, '2020-01-10', '85carica-sumbing-cup-isi-6-400x400.jpg', 1),
(3, 25, 'Carica Sumbing 1 Dus isi 12 cup', 'carica-sumbing-1-dus-isi-12-cup', '                                                                                        <p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nBuah carica merupakan buah khas Dataran Tinggi Dieng. Buah ini sungguh unik karena menurut mitos masyarakat sekitar buah ini hanya tumbuh di tanah Dieng. Jika anda berkunjung ke dataran tinggi Dieng pasti menemukan pohon seperti buah pepaya namun buanya lebih kecil.\r\n</p>\r\n<p style=\"text-align: justify; box-sizing: border-box; margin: 0px 0px 20px; color: #180e00; font-family: Verdana, Geneva, sans-serif; font-size: 15px\">\r\nMemang buah carica masih masuk ke keluarga pepaya, namun ukuran dan jenis buahnya berbeda. Masyarakat menyebut buah ini sebagai buah dewa Dieng. Segudang manfaat dan cita rasanya yang enak membuat banyak orang menyukai buah carica.\r\n</p>\r\n\r\n                    \r\n                    ', 42000, 197, 1.44, '2020-01-10', '47carica-cup-isi-12-400x400.jpg', 3),
(4, 26, 'Purwaceng Kopi Dieng Purba', 'purwaceng-kopi-dieng-purba', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Merupakan olahan tanaman herbal purwaceng dalam bentuk serbuk yang dicampur dengan kopi. Dengan komposisi yang ideal, minuman ini menghadirkan cita rasa yang mantap namun tetap berkhasiat tinggi untuk meningkatkan semangat dan stamina Anda. Purwaceng Kopi sangat baik untuk kesehatan.</span>\r\n', 70000, 50, 0.10, '2020-01-12', '56purwaceng-kopi.jpg', 1),
(5, 26, 'Purwaceng Susu Dieng Purba', 'purwaceng-susu-dieng-purba', '                                            <p>\r\n<strong style=\"box-sizing: border-box; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Produk Premium Purwaceng Susu</strong><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">1 pak isi 10</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">10 x 15 gram</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">100% herbal murni</span>\r\n</p>\r\n<p>\r\nÂ \r\n</p>\r\n<p>\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Purwaceng susu adalah paduan antaraÂ </span><strong style=\"box-sizing: border-box; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">tanaman purwaceng Dieng</strong><span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Â dengan rempah-rempah ditambah susu, sehingga menjadi minuman dengan citarasa tinggi, berkhasiat sangat istimewa bagi kesehatan, terutama untuk penambah stamina.</span>Â \r\n</p>\r\n\r\n                    ', 85000, 57, 0.25, '2020-01-12', '6920190724_2234131.jpg', 4),
(7, 30, 'Herbalipid Pelangsing Alami (Original)', 'herbalipid-pelangsing-alami-original', '<p>\r\nHerbalipid Slimming Original –<br />\r\nObat Pelangsing Tubuh Herbal – Lulus Uji BPOM (POM TR 183318431)\r\n</p>\r\n<p>\r\nNomor Registrasi BPOM  :    TR183318431<br />\r\n1 botol isi 50 kapsul<br />\r\n1 kapsul 500 mg\r\n</p>\r\n<p>\r\nHerbalipid Slimming Capsule merupakan obat pelangsing herbal, terbuat\r\ndari bahan utama ekstrak Guazumae Ulmifolia Folium yang dapat \r\nmenurunkan kadar lemak tubuh.\r\n</p>\r\n<p>\r\nManfaat Herbalipid Slimming Capsule<br />\r\n1. Menurunkan kadar lemak jahat pada tubuh.<br />\r\n2. Membantu membuang lemak tubuh berlebih (obesitas).<br />\r\n3. Membantu mengecilkan lingkar perut, lengan, dan paha.<br />\r\n4. Menambah kemampuan kerja usus, membersihkan usus, toksin dan sampah, mengeluarkan lemak yang diserap usus.<br />\r\n5. Mengontrol berat badan, menjaga proporsi tubuh ideal.\r\n</p>\r\n<p>\r\nKeunggulan Herbalipid Slimming Capsule<br />\r\n– Tidak menyebabkan ketergantungan.<br />\r\n– Bisa dan aman digunakan untuk ibu menyusui.<br />\r\n– Tidak ada efek samping, seperti diare, mules, gemetaran, sakit kepala, migrain, dsb.<br />\r\n– Aman dikonsumsi bagi penderita maag.<br />\r\n– Menurunkan berat badan secara cepat dan efektif, aman dikonsumsi.<br />\r\n– Bisa dikonsumsi oleh pria dan wanita.\r\n</p>\r\n<p>\r\nHerbalipid Slimming Capsule diminum 3 kali sehari ;<br />\r\n– 1 Kapsul setelah makan pagi.<br />\r\n– 1 Kapsul setelah makan siang.<br />\r\n– 1 Kapsul sebelum tidur.\r\n</p>\r\n<p>\r\nPENTING!!!<br />\r\n– Perbanyak konsumsi air putih untuk meningkatkan pembakaran lemak dan proses pembuangan.<br />\r\n– Tetap Harus makan seperti biasa untuk menjaga metabolisme tubuh.\r\n</p>\r\n*500 mg x 50 capsule / bottle\r\n', 350000, 20, 1.00, '2020-01-13', '25herbalipid-1024x688.jpg', 1),
(8, 30, 'Herbaskin Suplemen Pemutih Badan Alami', 'herbaskin-suplemen-pemutih-badan-alami', '<p>\r\nManfaat Herbaskin Natural Brightening :<br />\r\n– Mencerahkan kulit seluruh tubuh<br />\r\n– Mengurangi bintik gelap & melasma<br />\r\n– Memperlambat penuaan kulit dan keriput<br />\r\n– Mengurangi pembentukan melanin<br />\r\n– Mengurangi kelebihan pigmentasi, seperti tanda bekas luka, bintik-bintik hitam<br />\r\n– Meningkatkan kekebalan tubuh<br />\r\n– Menghilangkan jerawat/bekas jerawat<br />\r\n– Mengurangi pori2 besar di wajah<br />\r\n– Sebagai antioksidan tinggi, mempercepat penyembuhan saat sakit\r\n</p>\r\n<p>\r\nTips Mencerahkan Kulit Ala Herbaskin Natural Brightening<br />\r\n– Minumlah 2 kapsul Herbaskin pada malam hari sebelum tidur<br />\r\n– Hindari terik matahari secara langsung<br />\r\n– Perbanyak makan buah dan sayur yang mengandung vitamin c<br />\r\n– Minumlah air putih yang cukup.<br />\r\n– Untuk mendapatkan hasil yang maksimal, minum HERBASKIN dicombine dengan 1000mg Vitamin C (pada pagi hari)<br />\r\nJika telah mencapai warna kulit yg diinginkan, dosis bisa dikurangi utk maintain warna kulit..\r\n</p>\r\n<p>\r\n* Hasil pada tiap2 individu berbeda karena perbedaan sistem metabolisme tubuh satu sama lainnya.<br />\r\n* Wajib konsumsi rutin setiap hari untuk mendapatkan hasil yang maksimal.\r\n</p>\r\n<p>\r\nHerbaskin kapsul pemutih menghasilkan KANDUNGAN PEMUTIH TIGA KALI LEBIH TINGGI dari produk lainnya di pasaran.\r\n</p>\r\n', 332500, 15, 0.50, '2020-01-13', '21herbaskin-1024x688.jpg', 6),
(9, 30, 'MAX-V KANIKA', 'maxv-kanika', '<div id=\"tab-description\" class=\"woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab\" style=\"display: block\">\r\n<p>\r\n<strong>Manfaat Max-V Kanika</strong>\r\n</p>\r\n<ul>\r\n	<li>Mengencangkan otot-otot yang kendor.</li>\r\n	<li>Meningkatkan sensitivitas, menambah kebahagiaan suami istri.</li>\r\n	<li>Menyehatkan vagina.</li>\r\n	<li>Mengatasi semua masalah pada organ kewanitaan.</li>\r\n</ul>\r\n<p>\r\n<strong>Keunggulan Max-V Kanika</strong>\r\n</p>\r\n<ul>\r\n	<li>Terbuat dari herbal pilihan</li>\r\n	<li>Tanpa efek samping</li>\r\n	<li>Ampuh mengatasi masalah pada organ kewanitaan</li>\r\n</ul>\r\n</div>\r\n', 275000, 20, 0.50, '2020-01-13', '20max-v-kanika.jpg', 1),
(10, 29, 'MIE ONGKLOK INSTAN AGRIPINA KHAS WONOSOBO', 'mie-ongklok-instan-agripina-khas-wonosobo', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">\r\nMie Ongklok Agripina, Mi Ongklok Instant Khas Wonosobo<br />\r\nNetto : 100 gram\r\n</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">\r\nKomposisi<br />\r\nMie : Tepung Terigu, Minyak Nabati, Garam..<br />\r\nBumbu : Tepung Tapioka, Garam, Bawang<br />\r\nKecap Manis : Gula, Air Kedelai, Gandum, Garam&lt; Bumbu &amp; Rempah Pelengkap : Bawang Goreng, Sayur Kering Cara Penyajian : 1. Masukkan sayur kering dan kecap 2. Tuang air mendidih &plusmn; 200 ml (sampai mie terendam) 3. Tutup mangkok, tunggu 3 menit 4. Buka tutup, masukkan pasta kering, bumbu kacang dan bawang goreng 5. Aduk sampai rata 6. Siap dihidangkan\r\n</p>\r\n', 15000, 19, 0.10, '2020-01-17', '28ongklok.jpg', 2),
(11, 29, 'MIE ONGKLOK INSTANT', 'mie-ongklok-instant', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Kangen sama makanan yang satu ini? Mie Ongklok Wonosobo, kuliner khas dari kota kecil di kaki gunung Sindoro, hanya bisa dinikmati di kota Wonosobo. Kini telah tersedia mie ongklok instant yang bisa dinikmati kapan saja, dimanapun Ada berada.</span>\r\n', 10000, 50, 0.10, '2020-01-17', '67mie-ongklok-wonosobo.jpg', 1),
(12, 28, 'KACANG DIENG KHAS WONOSOBO 200G', 'kacang-dieng-khas-wonosobo-200g', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Kacang Dieng merupakan olahan kacang khas Dataran Tinggi Dieng yang jarang ditemui di seluruh wilayah Nusantara. Oleh-oleh khas ini banyak diburu oleh wisatawan yang datang ke kawasan wisata Dieng maupun Wonosobo. Kacang Dieng hanya ada di Dieng dan Wonosobo.</span>\r\n', 17000, 30, 0.10, '2020-01-17', '98kacang-dieng.jpg', 1),
(13, 28, 'KACANG DIENG KHAS WONOSOBO RASA KEJU 200G', 'kacang-dieng-khas-wonosobo-rasa-keju-200g', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Kacang Dieng Khas Wonosobo</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Kacang Dieng merupakan olahan kacang khas Dataran Tinggi Dieng yang jarang ditemui di seluruh wilayah Nusantara. Oleh-oleh khas ini banyak diburu oleh wisatawan yang datang ke kawasan wisata Dieng maupun Wonosobo. Kacang Dieng hanya ada di Dieng dan Wonosobo.</span>\r\n', 18000, 30, 0.10, '2020-01-17', '48Kacang-Dieng-3.jpg', 1),
(14, 28, 'KERIPIK CARICA 200G', 'keripik-carica-200g', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Keripik Carica merupakan produk olahan lain dari buah carica, aroma khas buah carica yang sangat harum menjadikan makanan ini menjadi primadona wisatawan di Dieng.</span>\r\n', 17000, 30, 0.10, '2020-01-17', '59keripik-carica.jpg', 1),
(15, 28, 'KERIPIK GADUNG', 'keripik-gadung', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Makanan khas Wonosobo, hasil olahan dan inovasi dari Agripina Food.</span>\r\n', 17000, 30, 0.10, '2020-01-17', '84keripik-gadung.jpg', 1),
(16, 28, 'KERIPIK KENTANG KHAS WONOSOBO', 'keripik-kentang-khas-wonosobo', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">\r\nKeripik Kentang Enak Khas Wonosobo\r\n</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">\r\nKeripik Kentang Khas Wonosobo merupakan salah satu camilan khas yang sudah cukup populer di kalangan wisatawan Dieng. Rasanya yang gurih dan renyah sangat cocok di lidah masyarakat Nusantara. Terbuat dari bahan pilihan, cocok untuk camilan saat santai.\r\n</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">\r\nKomposisi : Kentang pilihan, minyak non kelesterol<br />\r\nNetto : 150 gram\r\n</p>\r\n', 25000, 30, 0.10, '2020-01-17', '86keripik-kentang.jpg', 1),
(17, 28, 'KERIPIK PETOS (TEMPE KEMUL ATOS) KHAS WONOSOBO', 'keripik-petos-tempe-kemul-atos-khas-wonosobo', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Keripik Petos (Tempe Kemul Atos) Khas Wonosobo kini tersedia di oleholehwonosobo.com</span><br />\r\n<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Meskipun keripik petos singkatan dari tempe kemul atos, keripik jenis ini tidak atos seperti namanya. Justru sebaliknya, sangat renyah layaknya jenis keripik lain. Dilihat dari sejarahnya, petos diciptakan oleh masyarakat Wonosobo untuk mempermudah para pecinta tempe kemul (salah satu makanan khas Wonosobo) agar tetap bisa menikmati kuliner ini. Rasanya yang ngangenin, membuat petos sangat digemari wisatawan yang berkunjung ke Dieng. Bagi yang masih penasaran apa itu petos, silahkan dicoba&hellip;</span>\r\n', 15000, 30, 0.10, '2020-01-17', '69petos.jpg', 1),
(18, 28, 'KERIPIK TAHU', 'keripik-tahu', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Keripik tahu merupakan salah satu olahan khas Wonosobo, sangat cocok untuk cemilan ringan.</span>\r\n', 18000, 30, 0.10, '2020-01-17', '49Keripik-Tahu600.jpg', 1),
(19, 28, 'KERIPIK UBI ANGGREK', 'keripik-ubi-anggrek', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 16px\">Produk spesial keripik ubi anggrek dari Agripina Food, diolah dari ubi anggrek pilihan dengan minyak non kolesterol</span>\r\n', 17000, 30, 0.10, '2020-01-17', '56Keripik-Ubi-Anggrek600.jpg', 1),
(20, 28, 'OPAK SINGKONG TRADISIONAL', 'opak-singkong-tradisional', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">\r\nOpak Mateng Asli Tradisional – Opak Singkong Enak Khas Wonosobo\r\n</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">\r\nOpak Singkong Khas Wonosobo terbuat dari bahan singkong pilihan yang diolah sedemikian rupa sehingga menghasilkan camilan khas Wonosobo yang sangat disukai wisatawan Dieng pada umumnya dan masyarakat Wonosobo itu sendiri. Camilan jenis ini mungkin tidak Anda jumpai di daerah lain, karena opak merupakan camilan khas asli daerah Wonosobo. Meskipun opak sudah ada sejak jaman nenek moyang, tetapi belum banyak dikenal oleh Nusantara. Dulu, hampir tiap rumah memiliki camilan khas yg satu ini, disajikan saat pagi untuk menemani “medang” (minum, biasanya 1 cangkir teh/kopi). Oya, tau kenapa orang Wonosobo dan sekitarnya hampir tiap pagi pasti medang dulu sebelum beraktivitas? Ya… bisa ditebak memang, karena daerahnya yang pegunungan, jika langsung beraktivitas malah menjadi kurang produktif, udara terasa begitu dingin masuk ke sum-sum tulang saat fajar tiba.\r\n</p>\r\n', 17000, 15, 0.10, '2020-01-17', '59Opak2.jpg', 15),
(21, 31, 'KOPI BONDALEM WONOSOBO – ARABICA', 'kopi-bondalem-wonosobo-–-arabica', '<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">\r\nBubuk kopi arabica kulitas unggul, Asli Wonosobo, dengan penanganan yang sempurna, mulai dari penanaman, panen, hingga pengolahan dan pemrosesan pasca panen.\r\n</p>\r\n<p style=\"box-sizing: border-box; margin: 0px 0px 20px; padding: 0px; color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">\r\nFull wash processig.<br />\r\nDiambil dari tanaman di ketinggian geografis di atas 800 mdpl.<br />\r\nSertifikat MPIG.REG.ID G 000000030\r\n</p>\r\n', 35000, 0, 0.10, '2020-01-17', '79kopiii.jpg', 6),
(22, 31, 'TEPUNG BUMBU TEMPE KEMUL ', 'tepung-bumbu-tempe-kemul-', '<span style=\"color: #404248; font-family: Graphik, -apple-system, BlinkMacSystemFont, \"Segoe UI\", Helvetica, Arial, sans-serif; font-size: 16px\">Bagi penggemar tempe kemul khas Wonosobo, tepung bumbu ini memberikan solusi praktis, hanya perlu menambahkan air secukupnya, aduk hingga merata, kemudian digunakan untuk menggoreng tempe.</span>\r\n', 14000, 0, 0.08, '2020-01-17', '35tepung-bumbu-tempe-kemul.jpg', 15);

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
(108, 9, 10),
(109, 9, 11),
(114, 6, 10),
(115, 6, 11),
(116, 4, 10),
(117, 4, 11),
(145, 10, 10),
(146, 10, 11),
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
(181, 23, 10),
(182, 23, 11),
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
(297, 5, 15),
(298, 0, 14),
(299, 6, 14),
(302, 9, 15),
(303, 0, 15),
(304, 0, 15),
(305, 0, 15),
(306, 7, 13),
(307, 10, 14),
(308, 10, 13),
(309, 10, 15),
(310, 11, 14),
(311, 11, 13),
(312, 11, 15),
(316, 12, 14),
(317, 12, 13),
(318, 12, 15),
(319, 13, 14),
(320, 13, 13),
(321, 13, 15),
(322, 14, 14),
(323, 14, 13),
(324, 14, 15),
(325, 15, 14),
(326, 15, 13),
(327, 15, 15),
(328, 16, 14),
(329, 16, 13),
(330, 16, 15),
(331, 17, 14),
(332, 17, 13),
(333, 17, 15),
(334, 18, 14),
(335, 18, 13),
(336, 18, 15),
(337, 19, 14),
(338, 19, 13),
(339, 19, 15),
(349, 21, 14),
(350, 21, 13),
(351, 21, 15),
(355, 20, 14),
(356, 20, 13),
(357, 20, 15),
(361, 22, 14),
(362, 22, 13),
(363, 22, 15);

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
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_orders_detail`);

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
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
  MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id_orders_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

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
