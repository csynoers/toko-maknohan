-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19 Agu 2018 pada 11.01
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinf4956_batik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
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
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'redaksi@konveksigs.com', '08238923848', 'admin', 'N'),
('gentur', '32dfd459bb719a390ae9cc4ff7c2f93a', 'Gentur Adi Nugroho', 'gentur@gmail.com', '08564537589', 'admin', 'N'),
('aji', '8d045450ae16dc81213a75b725ee2760', 'gentur aji', 'genturtaufik@gmail.com', '098876544', 'admin', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `halamanstatis`
--

CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Cara Pembelian', '<p>\r\n&nbsp;Cara Pembelian ;\r\n</p>\r\n<ol>\r\n	<li>Klik pada tombol Beli pada produk yang ingin Anda pesan.</li>\r\n	<li>Produk yang Anda pesan akan masuk ke dalam Keranjang Belanja. Anda dapat melakukan perubahan jumlah produk yang diinginkan dengan mengganti angka di kolom Jumlah, kemudian klik tombol Update. Sedangkan untuk menghapus sebuah produk dari Keranjang Belanja, klik tombol hapus yang berada di kolom paling kanan.</li>\r\n	<li>Jika sudah selesai, klik tombol checkout, isikan alamat anda, pilih metode pembayaran.</li>\r\n	<li>Setelah data pembeli selesai diisikan, klik tombol Proses, maka akan tampil data pembeli beserta produk yang dipesannya (jika diperlukan catat nomor ordersnya). Dan juga ada total pembayaran serta nomor rekening pembayaran jika melakukan proses pembayaran menggunkan fasapay ikut alur yang diminta oleh fasapay. Harap Konfrimasi Ke nomor HP : 085292777746 jika sudah melakukan pembayaran atau konfirmasi melaluli website.</li>\r\n	<li>Apabila telah melakukan pembayaran, maka produk/barang akan segera kami kirimkan.<br />\r\n	</li>\r\n</ol>\r\n', '2015-10-30', ''),
(2, 'Profil Sinar Abadi Batik', '<div style=\"color: #333333; font-family: Helvetica, sans-serif; font-size: 13.6px; line-height: 20.4px; margin-bottom: 10px\">\r\n<div style=\"text-align: justify\">\r\n<span style=\"font-size: 13.6px\">Sinar Abadi Batik atau SAB merupakan salah satu home industriyang berada di Gulu Rejo Lendah Kulonprogo. SAB didirikan oleh bapak puryanto pada tahun 2008, bapak puryanto merupakan salah satu pengrajin yang cukup terkenal dan karyanya menjadi favorit bagi para pelanggan.&nbsp;</span>\r\n</div>\r\n</div>\r\n<div style=\"color: #333333; font-family: Helvetica, sans-serif; font-size: 13.6px; line-height: 20.4px; margin-bottom: 10px\">\r\n<div style=\"text-align: justify\">\r\n<span style=\"font-size: 13.6px\">Para pelanggan batik SAB terdiri dari dari berbagai kalangan diantaranya, dari kalagan pejabat pemerintahan, instansi-instansi, ataupun masyarakat biasa.&nbsp;</span>\r\n</div>\r\n<div style=\"text-align: justify\">\r\nSinar Abadi Batik dikenal dengan desain batiknya yang sangat inovativ dan menarik.&nbsp;\r\n</div>\r\n</div>\r\n', '2015-10-30', 'sinar .jpg'),
(3, 'Hubungi Kami', '<h5 style=\"margin: 10px 0px\">ADDITIONAL INFORMATION</h5>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Phone Agus:</strong>0813 9015 7959\r\n</font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Fita:</strong>0856 2853 19\r\n</font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong>Email:</strong> sinarabadibatikkp@yahoo.com\r\n</font>\r\n</p>\r\n<font size=\"2\"><br />\r\n</font>\r\n<h5 style=\"margin: 10px 0px\"><font size=\"2\">WORK SHOP</font></h5>\r\n<p>\r\n<font size=\"2\">\r\nKasihan 1, Ngentakrejo, Lendah, Kulon Progo, \r\n</font>\r\n</p>\r\n<p>\r\n<font size=\"2\">\r\nYogyakarta 55663</font>\r\n</p>\r\n<font size=\"2\"><strong style=\"color: #222222\">Alamat Toko:&nbsp;</strong><span style=\"color: #222222\">Jl. Sutijab No.48, Wates, Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta 55651, Indonesia</span><br />\r\n</font>\r\n<p>\r\n<font size=\"2\"><strong style=\"color: #222222\">Telp:</strong><span style=\"color: #222222\">&nbsp;+62 858-6865-0026&nbsp;</span>&nbsp;</font>\r\n</p>\r\n<p style=\"margin: 0px 0px 10px; color: #333333\">\r\n<font size=\"2\"><strong style=\"color: #222222\">Jam Operasional:</strong><br />\r\n<span style=\"color: #222222\">Monday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Tuesday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Wednesday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Thursday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Friday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Saturday: 9:00 AM &ndash; 6:00 PM</span><br />\r\n<span style=\"color: #222222\">Sunday: 9:00 AM &ndash; 6:00 PM</span></font>\r\n</p>\r\n', '2017-10-16', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
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
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(27, 'Silvi', 'silvi@gmail.com', 'TAnya saja', 'tes tessss', '2017-10-26'),
(28, 'andi', 'dimasandi@gmail.com', 'coba', 'coba tes', '2018-01-13'),
(29, 'ajisaongko', 'genturtaufik@gmail.com', 'tes', 'coba', '2018-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`) VALUES
(9, 'Batik Cap Komb.Tulis Colet', 'batik-cap-kombtulis-colet'),
(16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup'),
(17, 'Batik Tulis Full', 'batik-tulis-full');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
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

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_orders`, `pemilik_rekening`, `tanggal`, `jam`, `gambar`, `status`) VALUES
(1, 1, 'Silvi Agustina', '2018-01-21', '14:37:18', 'Blitar-Xderes.jpg', '0'),
(2, 35, '112334567', '2018-01-25', '01:17:58', 'win3.jpg', 'Baru'),
(3, 36, 'bayu', '2018-01-25', '15:57:05', 'kopikap.jpg', 'Baru'),
(4, 38, '577764433', '2018-01-26', '04:16:08', '2016 kuda.png', 'Baru'),
(5, 51, 'aji', '2018-03-22', '14:55:31', '201612241849313387.png', 'Baru'),
(6, 0, '', '2018-03-22', '15:53:31', '', 'Baru'),
(7, 0, '', '2018-03-26', '14:28:49', '', 'Baru'),
(8, 56, '535353535', '2018-03-28', '08:31:30', 'alahdab3.jpg', 'Baru'),
(9, 58, '6666666666', '2018-03-28', '08:32:01', 'alahdab1.png', 'Baru'),
(10, 60, '666778777', '2018-03-28', '08:39:46', '201701241251187592.png', 'Baru'),
(11, 61, '676789', '2018-03-28', '08:49:12', 'bk1.jpg', 'Baru'),
(12, 62, 'heru', '2018-04-03', '12:00:31', 'bk 2.jpg', 'Baru'),
(13, 0, '', '2018-04-03', '13:39:15', '', 'Baru'),
(14, 63, 'bayu', '2018-04-10', '08:36:35', 'bk 2.jpg', 'Baru'),
(15, 0, '', '2018-04-10', '09:47:28', '', 'Baru'),
(16, 0, '', '2018-04-12', '02:30:07', '', 'Baru'),
(17, 0, '', '2018-04-25', '07:06:00', '', 'Baru'),
(18, 0, '', '2018-04-26', '14:24:42', '', 'Baru'),
(19, 0, '', '2018-05-16', '01:14:04', '', 'Baru'),
(20, 0, '', '2018-05-28', '15:33:15', '', 'Baru'),
(21, 0, '', '2018-06-28', '20:26:26', '', 'Baru'),
(22, 0, '', '2018-07-30', '12:55:32', '', 'Baru'),
(23, 96, 'joel', '2018-07-31', '14:09:40', 'bk3.jpg', 'Baru'),
(24, 98, 'joel', '2018-07-31', '14:15:07', 'bk1.jpg', 'Baru'),
(25, 97, 'joel', '2018-07-31', '14:15:41', 'bk 2.jpg', 'Baru'),
(26, 100, 'gentur aji', '2018-08-10', '10:52:54', 'bukti fasapay.JPG', 'Baru'),
(27, 102, 'bayu', '2018-08-11', '11:06:40', 'buktipembayara f.JPG', 'Baru'),
(28, 116, 'bayu', '2018-08-16', '08:09:17', 'bukti fasapay pengirim.JPG', 'Baru'),
(29, 118, 'heru', '2018-08-17', '15:36:50', 'bk 2.jpg', 'Baru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kustomer`
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
-- Dumping data untuk tabel `kustomer`
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
-- Struktur dari tabel `orders`
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
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `id_kustomer`, `alamat`, `status_order`, `tgl_order`, `jam_order`, `jenis_pembayaran`, `kurir`, `paket`, `ongkir`) VALUES
(36, 6, 'jogja', 'Lunas', '2018-01-25', '15:55:24', 'BANK', '', '', 0),
(21, 4, 'jogja', 'Sudah-Dikirim', '2018-01-11', '10:50:02', 'BANK', '', '', 0),
(35, 8, 'jogja', 'Lunas', '2018-01-25', '01:16:29', 'BANK', '', '', 0),
(23, 4, 'jogja', 'Sudah-Dikirim', '2018-01-11', '11:12:35', 'BANK', '', '', 0),
(28, 6, 'jogja', 'Lunas', '2018-01-15', '14:25:40', 'BANK', '', '', 0),
(25, 5, 'jogja', 'Lunas', '2018-01-11', '11:35:45', 'BANK', '', '', 0),
(26, 5, '', 'Lunas', '2018-01-11', '11:39:02', '', '', '', 0),
(96, 14, 'yogyakarta, bonbin', 'Lunas', '2018-07-31', '13:50:18', 'TRANSFER', 'jne', 'CTC', 8000),
(58, 6, 'jl.merdeka rt 34 rw 16', 'Lunas', '2018-03-28', '08:14:14', 'TRANSFER', 'jne', 'REG', 16000),
(98, 14, 'kuningan, jawa barat', 'Sudah-Dikirim', '2018-07-31', '14:07:41', 'TRANSFER', 'jne', 'OKE', 30000),
(56, 6, 'jakarta, kebon sirih', 'Lunas', '2018-03-28', '08:09:22', 'TRANSFER', 'jne', '', 30000),
(51, 6, 'bogor', 'Lunas', '2018-03-22', '14:52:42', 'TRANSFER', 'jne', 'REG', 34000),
(52, 6, 'tulang bawang', 'Lunas', '2018-03-22', '15:06:10', 'FASAPAY', 'tiki', 'TDS', 19000),
(62, 6, 'bekasi', 'Lunas', '2018-04-03', '11:45:55', 'FASAPAY', 'jne', 'YES', 34000),
(63, 6, 'lebak', 'Lunas', '2018-04-10', '08:31:07', 'FASAPAY', 'jne', 'YES', 47000),
(60, 6, 'jl.maju rt 34 rw 16', 'Lunas', '2018-03-28', '08:16:21', 'FASAPAY', 'jne', 'OKE', 34000),
(61, 6, 'bengli', 'Lunas', '2018-03-28', '08:45:34', 'TRANSFER', 'jne', '', 0),
(97, 14, '', 'Lunas', '2018-07-31', '14:04:13', '', '', '', 0),
(86, 6, 'jl.dandeles bantul rt 4 rw 5', 'Lunas', '2018-05-15', '15:08:41', 'FASAPAY', 'jne', 'CTC', 8000),
(85, 6, 'jl.dandeles bantul rt 4 rw 5', 'Lunas', '2018-05-15', '14:58:18', 'FASAPAY', 'jne', '', 8000),
(84, 6, 'jl.dandeles bantul rt 4 rw 5', 'Lunas', '2018-05-15', '14:34:28', 'FASAPAY', 'jne', '', 0),
(83, 6, 'jl.dandeles bantul rt 4 rw 5', 'Lunas', '2018-05-14', '15:29:55', 'FASAPAY', 'jne', '', 0),
(95, 6, 'jl.kalimatan barat', 'Lunas', '2018-07-31', '13:37:28', 'TRANSFER', 'jne', 'OKE', 57000),
(99, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-08', '15:14:53', 'FASAPAY', 'jne', 'CTC', 8000),
(100, 12, 'jl. bantul km 15', 'Sudah-Dikirim', '2018-08-10', '10:45:51', 'FASAPAY', 'jne', 'CTC', 8000),
(102, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-11', '10:56:04', 'FASAPAY', 'jne', 'CTC', 8000),
(103, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '14:00:17', 'TRANSFER', 'jne', 'CTC', 8000),
(104, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '14:48:07', 'TRANSFER', 'jne', 'OKE', 30000),
(105, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '14:49:34', 'TRANSFER', 'jne', 'CTCYES', 8000),
(106, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '15:12:35', 'TRANSFER', 'pos', 'Paket', 10000),
(107, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '16:02:54', 'FASAPAY', 'tiki', '', 10000),
(108, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-12', '16:06:25', 'FASAPAY', 'jne', 'CTC', 8000),
(110, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-15', '13:27:07', 'TRANSFER', 'jne', 'CTC', 8000),
(118, 15, 'jogja janti km 10', 'Sudah-Dikirim', '2018-08-17', '14:05:43', 'TRANSFER', 'jne', 'CTC', 8000),
(112, 6, 'jl.dandeles bantul rt 4 rw 5', 'Belum-Dibayar', '2018-08-15', '13:44:33', 'FASAPAY', 'jne', 'CTC', 8000),
(113, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-15', '13:55:52', 'FASAPAY', 'jne', 'CTCYES', 8000),
(114, 6, '', 'Belum-Dibayar', '2018-08-15', '14:05:09', '', '', '', 0),
(115, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-15', '14:08:25', 'FASAPAY', 'jne', 'CTC', 8000),
(116, 6, 'jl.dandeles bantul rt 4 rw 5', 'Sudah-Dikirim', '2018-08-16', '07:53:03', 'FASAPAY', 'jne', 'CTC', 8000),
(117, 6, 'jl.dandeles bantul rt 4 rw 5', 'Belum-Dibayar', '2018-08-16', '17:28:16', 'TRANSFER', 'tiki', 'REG', 10000),
(119, 15, 'jogja janti km 10', 'Belum-Dibayar', '2018-08-18', '03:07:42', 'FASAPAY', 'jne', '', 0),
(120, 15, 'jogja janti km 10', 'Belum-Dibayar', '2018-08-18', '03:10:56', 'FASAPAY', 'jne', 'CTC', 8000),
(121, 15, 'jogja janti km 10', 'Belum-Dibayar', '2018-08-18', '04:34:12', 'FASAPAY', 'jne', 'CTC', 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `id_ukuran` int(5) DEFAULT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `orders_detail`
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
(34, 9, 5, 1),
(35, 8, 5, 2),
(36, 9, 5, 1),
(37, 8, 5, 1),
(38, 8, 5, 1),
(39, 8, 5, 2),
(40, 6, 6, 1),
(41, 8, 3, 1),
(42, 8, 3, 1),
(43, 8, 3, 1),
(44, 6, 7, 1),
(45, 9, 5, 1),
(46, 2, 5, 1),
(47, 4, 5, 1),
(48, 9, 5, 1),
(48, 6, 6, 1),
(49, 2, 5, 1),
(50, 2, 5, 1),
(51, 9, 3, 1),
(52, 9, 2, 1),
(53, 8, 3, 1),
(54, 9, 3, 1),
(55, 6, 6, 1),
(56, 9, 3, 1),
(57, 6, 6, 1),
(58, 4, 3, 1),
(59, 3, 5, 1),
(60, 9, 3, 1),
(61, 4, 3, 1),
(62, 4, 3, 1),
(63, 4, 2, 1),
(64, 4, 3, 1),
(66, 4, 3, 1),
(67, 4, 3, 1),
(68, 4, 3, 1),
(69, 8, 3, 1),
(70, 8, 3, 1),
(71, 8, 3, 1),
(72, 8, 3, 1),
(73, 8, 3, 1),
(74, 3, 3, 1),
(75, 4, 3, 1),
(76, 4, 3, 1),
(77, 8, 5, 1),
(78, 4, 3, 1),
(79, 9, 5, 1),
(80, 8, 5, 1),
(81, 8, 5, 1),
(82, 8, 5, 1),
(83, 9, 11, 1),
(84, 9, 11, 1),
(85, 9, 11, 1),
(86, 9, 11, 1),
(87, 9, 11, 1),
(88, 9, 11, 1),
(89, 9, 11, 1),
(90, 9, 11, 1),
(91, 8, 5, 1),
(92, 9, 11, 1),
(94, 9, 11, 1),
(95, 8, 2, 1),
(96, 8, 5, 1),
(98, 6, 6, 1),
(99, 9, 11, 1),
(100, 13, 2, 1),
(101, 13, 1, 1),
(102, 13, 2, 1),
(103, 13, 3, 1),
(104, 12, 10, 2),
(105, 11, 11, 1),
(106, 12, 10, 1),
(107, 13, 1, 1),
(108, 13, 3, 1),
(109, 13, 8, 1),
(110, 23, 10, 2),
(112, 13, 9, 1),
(113, 23, 10, 1),
(114, 13, 9, 1),
(115, 11, 10, 1),
(116, 13, 9, 1),
(117, 13, 9, 1),
(118, 54, 10, 1),
(119, 49, 10, 1),
(120, 49, 10, 1),
(121, 49, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_temp`
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
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `produk_seo`, `deskripsi`, `harga`, `stok`, `berat`, `tgl_masuk`, `gambar`, `dibeli`) VALUES
(4, 9, 'Batik Cap Komb.Tulis Colet', 'batik-cap-kombtulis-colet', '<div>\r\nâ—ï¸Batik Cap Komb.Tulis Colet\r\n</div>\r\n<div>\r\nâ—ï¸Katun Sanforis\r\n</div>\r\n<div>\r\nâ—2m x 1,15m\r\n</div>\r\n<div>\r\nâ—250.000\r\n</div>\r\n', 250000, 5, '0.50', '2018-01-05', '57sab 1.JPG', 1),
(2, 9, 'Batik Cap Komb.Tulis Colet', 'batik-cap-kombtulis-colet', '<div>\r\nBatik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;ï¸200.000\r\n</div>\r\n', 200000, 13, '0.50', '2018-01-05', '76sab 3.JPG', 1),
(3, 9, 'Batik Cap Komb.Tulis Colet', 'batik-cap-kombtulis-colet', '<div>\r\nBatik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;ï¸200.000\r\n</div>\r\n', 200000, 12, '0.50', '2018-01-05', '82sab 2.JPG', 1),
(6, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '                                                                                        <div>\r\nÂ¤Batik Tulis Galaran Celup\r\n</div>\r\n<div>\r\nÂ¤Katun Sanforis\r\n</div>\r\n<div>\r\nÂ¤2m x 1,15m\r\n</div>\r\n<div>\r\nÂ¤ï¸200.000\r\n</div>\r\n\r\n                    \r\n                    ', 200000, 3, '1.00', '2018-01-11', '25sab tulis 3.JPG', 1),
(8, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '                                            <div>\r\nÂ¤Batik Tulis Galaran Celup\r\n</div>\r\n<div>\r\nÂ¤Katun Sanforis\r\n</div>\r\n<div>\r\nÂ¤2m x 1,15m\r\n</div>\r\n<div>\r\nÂ¤ï¸200.000\r\n</div>\r\n\r\n                    ', 200000, 2, '0.50', '2018-01-14', '86sab tulis 2.JPG', 1),
(9, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '                                                                                        <div>\r\nÂ¤Batik Tulis Galaran Celup\r\n</div>\r\n<div>\r\nÂ¤Katun Sanforis\r\n</div>\r\n<div>\r\nÂ¤2m x 1,15m\r\n</div>\r\n<div>\r\nÂ¤ï¸200.000\r\n</div>\r\n\r\n                    \r\n                    ', 200000, 3, '0.10', '2018-01-14', '36sab tulis 1.JPG', 1),
(10, 17, 'Batik Tulis Full', 'batik-tulis-full', '                                            <div>\r\n?Batik Tulis Full\r\n</div>\r\n<div>\r\n?Katun Primisima\r\n</div>\r\n<div>\r\n?2,5m x 1,15m\r\n</div>\r\n<div>\r\n?600.000\r\n</div>\r\n\r\n                    ', 600000, 4, '1.00', '2018-08-10', '15sab tulis full 1.JPG', 1),
(11, 17, 'Batik Tulis Full', 'batik-tulis-full', '                                                                                                                                    <div>\r\n??Batik Tulis Coletan\r\n</div>\r\n<div>\r\n??Katun Primisima\r\n</div>\r\n<div>\r\n??2,5m x 1,05m\r\n</div>\r\n<div>\r\n??800.000\r\n</div>\r\n\r\n                    \r\n                    \r\n                    ', 800000, 9, '1.00', '2018-08-10', '34sab tulis full 2.JPG', 1),
(12, 17, 'Batik Tulis Full', 'batik-tulis-full', '                                                                                                                                    <div>\r\n??Batik Tulis Coletan\r\n</div>\r\n<div>\r\n??Katun Primisima\r\n</div>\r\n<div>\r\n??2,5m x 1,05m\r\n</div>\r\n<div>\r\n??800.000\r\n</div>\r\n\r\n                    \r\n                    \r\n                    ', 800000, 10, '1.00', '2018-08-10', '1sab tulis full 3.JPG', 1),
(13, 18, 'Gelang Batik', 'gelang-batik', '                                                                                                                                    <p style=\"text-align: justify\">\r\nGelang Batik\r\n</p>\r\n<p style=\"text-align: justify\">\r\nBahan Kulit\r\n</p>\r\n<p style=\"text-align: justify\">\r\n13 cm\r\n</p>\r\n<p style=\"text-align: justify\">\r\n14 cm\r\n</p>\r\n<p style=\"text-align: justify\">\r\n15 cmÂ \r\n</p>\r\n<p style=\"text-align: justify\">\r\n16 cmÂ \r\n</p>\r\n<p style=\"text-align: justify\">\r\nharga Rp 1000,00Â Â \r\n</p>\r\n\r\n                    \r\n                    \r\n                    ', 1000, 7, '1.00', '2018-08-10', '61aksesoris 1.JPG', 1),
(14, 9, 'Batik Cap Komb.Tulis', 'batik-cap-kombtulis', '                                            <div>\r\n??Batik Cap Komb.Tulis\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n\r\n                    ', 150000, 5, '1.00', '2018-08-13', '70â˜‘ï¸Batik Cap Komb.Tulis48.JPG', 1),
(15, 9, 'Batik Cap Komb.Tulis', 'batik-cap-kombtulis', '<div>\r\n??Batik Cap Komb.Tulis\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 5, '1.00', '2018-08-13', '61â˜‘ï¸Batik Cap Komb.Tulis47.JPG', 1),
(16, 9, 'Batik Cap Komb.Tulis', 'batik-cap-kombtulis', '<div>\r\n??Batik Cap Komb.Tulis46\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 5, '1.00', '2018-08-13', '15â˜‘ï¸Batik Cap Komb.Tulis Gradasi46.JPG', 1),
(17, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 150000, 5, '1.00', '2018-08-13', '82â˜‘ï¸Batik Cap Komb.Tulis Gradasi45.JPG', 1),
(18, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-13', '54â˜‘ï¸Batik Cap Komb.Tulis Gradasi44.JPG', 1),
(19, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-13', '44bati cap combi tulis43.JPG', 1),
(20, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-13', '6bati cap combi tulis42.JPG', 1),
(21, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-13', '48bati cap combi tulis41.JPG', 1),
(22, 16, 'Batik Tulis Galaran Geblek Gradasi', 'batik-tulis-galaran-geblek-gradasi', '                                            <div>\r\n??Batik Tulis Galaran + Geblek Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n\r\n                    ', 300000, 5, '1.00', '2018-08-13', '4bati cap combi tulis40.JPG', 1),
(23, 16, 'Batik Tulis blarak Geblek Gradasi', 'batik-tulis-blarak-geblek-gradasi', '                                            <div>\r\n??Batik Tulis blarak sempal+Geblek Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n\r\n                    ', 300000, 2, '1.00', '2018-08-13', '73bati cap combi tulis39.JPG', 1),
(24, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '<div>\r\n??Batik Tulis Galaran+Purbonegoro Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n', 300000, 5, '1.00', '2018-08-16', '39bati cap combi tulis37.JPG', 1),
(25, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 1, '1.00', '2018-08-16', '93bati cap combi tulis38.JPG', 1),
(26, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-16', '91bati cap combi tulis30.JPG', 1),
(27, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-16', '33bati cap combi tulis29.JPG', 1),
(28, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-16', '51bati cap combi tulis36.JPG', 1),
(29, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 5, '1.00', '2018-08-16', '16bati cap combi tulis35.JPG', 1),
(30, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '<div>\r\n??Batik Tulis Galaran+Geblek Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', 300000, 3, '1.00', '2018-08-16', '44batik tulis full34.JPG', 1),
(31, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '<div>\r\n??Batik Tulis Galaran+Geblek Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n', 300000, 3, '1.00', '2018-08-16', '77bati cap combi tulis33.JPG', 1),
(32, 16, 'Batik Tulis Galaran Celup', 'batik-tulis-galaran-celup', '<div>\r\n??Batik Tulis Galaran+Purbonegoro Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??300.000\r\n</div>\r\n', 300000, 3, '1.00', '2018-08-16', '59bati cap combi tulis32.JPG', 1),
(33, 9, 'Batik Cap Komb.Tulis Gradasi', 'batik-cap-kombtulis-gradasi', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '66bati cap combi tulis31.JPG', 1),
(34, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '                                            <div>\r\nÂ¤Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\nÂ¤Katun Primisima\r\n</div>\r\n<div>\r\nÂ¤2m x 1,15m\r\n</div>\r\n<div>\r\nÂ¤?200.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n\r\n                    ', 200000, 3, '1.00', '2018-08-16', '56bati cap combi tulis28.JPG', 1),
(35, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '16bati cap combi tulis27.JPG', 1),
(36, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '69bati cap combi tulis26.JPG', 1),
(37, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '2bati cap combi tulis25.JPG', 1),
(38, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '99bati cap combi tulis24.JPG', 1),
(39, 16, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '76bati cap combi tulis23.JPG', 1),
(40, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '11bati cap combi tulis22.JPG', 1),
(41, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 2, '1.00', '2018-08-16', '3bati cap combi tulis21.JPG', 1),
(42, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 3, '1.00', '2018-08-16', '32bati cap combi tulis17.JPG', 1),
(43, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 3, '1.00', '2018-08-16', '82bati cap combi tulis16.JPG', 1),
(44, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', 150000, 3, '1.00', '2018-08-16', '32bati cap combi tulis15.JPG', 1),
(45, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 2, '1.00', '2018-08-16', '28bati cap combi tulis14.JPG', 1),
(46, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '                                            <div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n\r\n                    ', 150000, 3, '1.00', '2018-08-16', '85bati cap combi tulis13.JPG', 1),
(47, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '60batik tulis full20.JPG', 1),
(48, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n&curren;Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n', 200000, 3, '1.00', '2018-08-16', '27bati cap combi tulis19.JPG', 1),
(49, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '                                                                                                                                    <div>\r\n??Batik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n\r\n                    \r\n                    \r\n                    ', 1000, 0, '0.10', '2018-08-16', '52bati cap combi tulis18.JPG', 1),
(50, 9, 'Batik Cap Komb.Tulis ', 'batik-cap-kombtulis-', '<div>\r\n??Batik Cap Komb.Tulis Gradasi\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n?2m x 1,15m\r\n</div>\r\n<div>\r\n?200.000\r\n</div>\r\n', 200000, 2, '1.00', '2018-08-16', '53bati cap combi tulis7.JPG', 1),
(51, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup&nbsp;\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 5, '1.00', '2018-08-16', '60bati cap combi tulis5.JPG', 1),
(52, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\n??Batik Cap Komb.Tulis Celup&nbsp;\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n??2m x 1,15m\r\n</div>\r\n<div>\r\n??150.000\r\n</div>\r\n', 150000, 2, '1.00', '2018-08-16', '6bati cap combi tulis4.JPG', 1),
(53, 9, 'Batik Cap Komb.Tulis Celup', 'batik-cap-kombtulis-celup', '<div>\r\nBatik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', 200000, 2, '1.00', '2018-08-16', '11sab 3.JPG', 1),
(54, 9, 'Batik Cap Komb.Tulis Celup ', 'batik-cap-kombtulis-celup-', '<div>\r\nBatik Cap Komb.Tulis Celup\r\n</div>\r\n<div>\r\n&curren;Katun Primisima\r\n</div>\r\n<div>\r\n&curren;2m x 1,15m\r\n</div>\r\n<div>\r\n&curren;?200.000\r\n</div>\r\n<div>\r\n<br />\r\n</div>\r\n', 200000, 1, '1.00', '2018-08-16', '89sab 2.JPG', 1),
(55, 9, 'Batik Cap Komb.Tulis Colet', 'batik-cap-kombtulis-colet', '<div>\r\n??Batik Cap Komb.Tulis Colet\r\n</div>\r\n<div>\r\n??Katun Sanforis\r\n</div>\r\n<div>\r\n?2m x 1,15m\r\n</div>\r\n<div>\r\n?250.000\r\n</div>\r\n', 250000, 1, '1.00', '2018-08-16', '19sab 1.JPG', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_ukuran`
--

CREATE TABLE `produk_ukuran` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_ukuran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_ukuran`
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
(118, 3, 10),
(119, 3, 11),
(120, 2, 10),
(121, 2, 11),
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
(219, 51, 10),
(220, 52, 10),
(221, 53, 10),
(222, 54, 10),
(223, 55, 10),
(228, 13, 9),
(229, 13, 8),
(230, 13, 7),
(231, 13, 6),
(234, 49, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`id_slide`, `judul`, `gambar`) VALUES
(4, 'Batik SAB Kulon Progo', 'label-sab.jpg'),
(5, 'Work Shop & Gallery', 'slidebatik.jpg'),
(6, 'Batik SAB Kulon Progo', 'slide-batik.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(10) NOT NULL,
  `kode_ukuran` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `kode_ukuran`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'ALL SIZE'),
(6, '16 cm'),
(7, '15 cm'),
(8, '14 cm'),
(9, '13 cm'),
(10, '200 x 115'),
(11, '220 x 115');

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
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konfirmasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kustomer`
--
ALTER TABLE `kustomer`
  MODIFY `id_kustomer` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_orders` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
  MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `produk_ukuran`
--
ALTER TABLE `produk_ukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
