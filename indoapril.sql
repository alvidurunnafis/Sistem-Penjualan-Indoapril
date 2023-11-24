-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table tokoonline.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `alamat` text,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.admin: ~1 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `kontak`, `alamat`) VALUES
	(4, 'ata', '24accbed29ea007663fb3d7e5765f1c7', 'atala', 'ata@gmail.com', '08657432451', 'bandung'),
	(5, 'dirga', 'cdf36aa7733956385d6329a003e75966', 'dirgantara', 'dirgantara@gmail.com', '089765345623', 'jl. bandung, malang');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table tokoonline.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.kategori: ~9 rows (approximately)
DELETE FROM `kategori`;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
	(1, 'Snack'),
	(2, 'Minuman'),
	(4, 'Gula Pasir'),
	(5, 'Beras'),
	(6, 'tepung'),
	(7, 'minyak goreng'),
	(8, 'mie instan'),
	(9, 'sirup'),
	(10, 'kecap');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;

-- Dumping structure for table tokoonline.ongkir
CREATE TABLE IF NOT EXISTS `ongkir` (
  `id_ongkir` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(50) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ongkir`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.ongkir: ~22 rows (approximately)
DELETE FROM `ongkir`;
/*!40000 ALTER TABLE `ongkir` DISABLE KEYS */;
INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
	(1, 'malang', 10000),
	(2, 'lumajang', 12000),
	(3, 'surabaya', 15000),
	(4, 'jogja', 17000),
	(5, 'bandung', 20000),
	(6, 'jakarta', 22000),
	(7, 'semarang', 17000),
	(8, 'mojokerto', 10000),
	(9, 'pasuruan', 12000),
	(10, 'jember', 12000),
	(11, 'blitar', 12000),
	(12, 'kediri', 12000),
	(13, 'madiun', 13000),
	(14, 'tulungagung', 13000),
	(15, 'trenggalek', 13000),
	(16, 'kebumen', 17000),
	(17, 'magelang', 17000),
	(18, 'klaten', 17000),
	(19, 'tasikmalaya', 18000),
	(20, 'bekasi', 20000),
	(21, 'bogor', 22000),
	(22, 'banten', 25000),
	(23, 'sidoarjo', 13000),
	(24, 'gresik', 15000);
/*!40000 ALTER TABLE `ongkir` ENABLE KEYS */;

-- Dumping structure for table tokoonline.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `alamat_pelanggan` text,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pelanggan: ~3 rows (approximately)
DELETE FROM `pelanggan`;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_lengkap`, `email`, `kontak`, `alamat_pelanggan`) VALUES
	(9, 'bumi', '71ca1096c6cb7d4ab24d8c04d2865c87', 'bumi langit', 'bumi@gmail.com', '087656435123', 'pasuruan'),
	(10, 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'ahmad', 'ahmad@gmail.com', '0897656453251', 'jogja');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- Dumping structure for table tokoonline.pembayaran
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `via` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `id_pembelian` (`id_pembelian`),
  CONSTRAINT `FK_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pembayaran: ~1 rows (approximately)
DELETE FROM `pembayaran`;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `via`, `jumlah`, `tanggal`, `bukti`) VALUES
	(3, 26, 'bumi langit', 'bri', 50000, '2021-06-06', '20210606055736struk-atm-mandiri-asli.jpg'),
	(4, 27, 'bumi langit', 'bri', 46000, '2021-06-06', '20210606093906Struk-seminar-42c179385a598c3e0007f6bde43989be.jpg');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- Dumping structure for table tokoonline.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `alamat` text,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL,
  `id_ongkir` int(11) DEFAULT NULL,
  `id_pengiriman` int(11) DEFAULT NULL,
  `nama_kota` varchar(100) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `status_pembelian` varchar(100) DEFAULT 'pending',
  `resi_pengiriman` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_ongkir` (`id_ongkir`),
  KEY `id_pengiriman` (`id_pengiriman`),
  CONSTRAINT `FK1_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  CONSTRAINT `FK2_ongkir` FOREIGN KEY (`id_ongkir`) REFERENCES `ongkir` (`id_ongkir`),
  CONSTRAINT `FK4_pengiriman` FOREIGN KEY (`id_pengiriman`) REFERENCES `pengiriman` (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pembelian: ~1 rows (approximately)
DELETE FROM `pembelian`;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `alamat`, `tanggal_pembelian`, `total_pembelian`, `id_ongkir`, `id_pengiriman`, `nama_kota`, `tarif`, `status_pembelian`, `resi_pengiriman`) VALUES
	(26, 9, 'jl. sukarno, pasuruan', '2021-06-06', 50000, 9, 2, 'pasuruan', 12000, 'sudah kirim pembayaran', NULL),
	(27, 9, 'jl. sukarno, pasuruan', '2021-06-06', 46000, 9, 3, 'pasuruan', 12000, 'sudah kirim pembayaran', NULL),
	(28, 9, 'jl.bromo, pasuruan', '2021-06-06', 50000, 9, 3, 'pasuruan', 12000, 'pending', NULL);
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- Dumping structure for table tokoonline.pembelian_produk
CREATE TABLE IF NOT EXISTS `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `netto_produk` int(11) DEFAULT NULL,
  `varian` varchar(100) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `subberat` int(11) DEFAULT NULL,
  `subharga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian_produk`),
  KEY `id_pembelian` (`id_pembelian`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `FK1_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
  CONSTRAINT `FK2_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pembelian_produk: ~6 rows (approximately)
DELETE FROM `pembelian_produk`;
/*!40000 ALTER TABLE `pembelian_produk` DISABLE KEYS */;
INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama_produk`, `harga_produk`, `netto_produk`, `varian`, `expired`, `subberat`, `subharga`) VALUES
	(36, 26, 7, 1, 'Marjan sirup cocopandan [460 ml]', 18000, 460, 'cocopandan', '2022-02-17', 460, 18000),
	(37, 26, 8, 1, 'Marjan sirup mocca [460 ml]', 20000, 460, 'mocca', '2022-06-17', 460, 20000),
	(38, 27, 10, 1, 'Marjan sirup jeruk [460 ml]', 19000, 460, 'jeruk', '2022-10-29', 460, 19000),
	(39, 27, 11, 1, 'gulaku murni premium [1 kg]', 15000, 1, 'murni premium', '2023-06-20', 1, 15000),
	(40, 28, 7, 1, 'Marjan sirup cocopandan [460 ml]', 18000, 460, 'cocopandan', '2022-02-17', 460, 18000),
	(41, 28, 8, 1, 'Marjan sirup mocca [460 ml]', 20000, 460, 'mocca', '2022-06-17', 460, 20000);
/*!40000 ALTER TABLE `pembelian_produk` ENABLE KEYS */;

-- Dumping structure for table tokoonline.pengiriman
CREATE TABLE IF NOT EXISTS `pengiriman` (
  `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT,
  `metode_pengiriman` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pengiriman`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.pengiriman: ~5 rows (approximately)
DELETE FROM `pengiriman`;
/*!40000 ALTER TABLE `pengiriman` DISABLE KEYS */;
INSERT INTO `pengiriman` (`id_pengiriman`, `metode_pengiriman`) VALUES
	(1, 'COD'),
	(2, 'JNE'),
	(3, 'JNT'),
	(4, 'Si Cepat'),
	(5, 'Antareja');
/*!40000 ALTER TABLE `pengiriman` ENABLE KEYS */;

-- Dumping structure for table tokoonline.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `netto_produk` int(11) DEFAULT NULL,
  `varian` varchar(50) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT NULL,
  `deskripsi_produk` text,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `FK1_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.produk: ~12 rows (approximately)
DELETE FROM `produk`;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `netto_produk`, `varian`, `expired`, `stok`, `foto_produk`, `deskripsi_produk`, `id_kategori`) VALUES
	(7, 'Marjan sirup cocopandan [460 ml]', 18000, 460, 'cocopandan', '2022-02-17', 96, 'marjan_marjan-syrup-coco-pandan-450ml_full01.jpg', 'â€¢ Sirup\r\nâ€¢ Terbuat dari bahan-bahan pilihan\r\nâ€¢ Diproses tanpa bahan pemanis buatan\r\nâ€¢ Dapat memberikan kesegaran saat diminum serta nyaman ditenggorokan\r\nâ€¢ Isi bersih : 460 mL', 9),
	(8, 'Marjan sirup mocca [460 ml]', 20000, 460, 'mocca', '2022-06-17', 195, 'marjan_marjan-mocca-0008-syrup--500-ml-_full01.jpg', 'â€¢ Sirup\r\nâ€¢ Terbuat dari bahan-bahan pilihan\r\nâ€¢ Diproses tanpa bahan pemanis buatan\r\nâ€¢ Dapat memberikan kesegaran saat diminum serta nyaman ditenggorokan\r\nâ€¢ Isi bersih : 460 mL', 9),
	(10, 'Marjan sirup jeruk [460 ml]', 19000, 460, 'jeruk', '2022-10-29', 99, '5c9d936d-a0fd-45a7-a58c-26cb94d71088.jpg', 'â€¢ Sirup\r\nâ€¢ Terbuat dari bahan-bahan pilihan\r\nâ€¢ Diproses tanpa bahan pemanis buatan\r\nâ€¢ Dapat memberikan kesegaran saat diminum serta nyaman ditenggorokan\r\nâ€¢ Isi bersih : 460 mL', 9),
	(11, 'gulaku murni premium [1 kg]', 15000, 1, 'murni premium', '2023-06-20', 97, 'eec283e8-bb6b-4324-9fcb-3cecfc7cf11a.jpg', 'Gulaku Premium ini dihasilkan dari tebu segar berkualitas yang tumbuh di perkebunan Lampung. Gula tebu ini diproses dengan standar mutu yang tinggi sehingga menghasilkan gula yang murni, manis, bersih, dan alami. Gula tebu asli Indonesia ini akan menjadi pemanis yang tepat bagi semua makanan dan minuman Anda. Nikmati saat santai bersama keluarga anda dengan makanan dan minuman lezat dari Gulaku Gula Tebu Premium 1kg.', 4),
	(12, 'gulaku murni [1 kg]', 14500, 1, 'murni', '2023-02-22', 95, 'gulaku_gulaku-tebu--1-kg-_full02.jpg', 'Gulaku Murni ini dihasilkan dari tebu segar berkualitas yang tumbuh di perkebunan Lampung. Gula tebu ini diproses dengan standar mutu yang tinggi sehingga menghasilkan gula yang murni, manis, bersih, dan alami. Gula tebu asli Indonesia ini akan menjadi pemanis yang tepat bagi semua makanan dan minuman Anda. Nikmati saat santai bersama keluarga anda dengan makanan dan minuman lezat dari Gulaku Gula Tebu Murni 1kg.', 4),
	(13, 'Sania beras premium [5 kg]', 75000, 5, 'Beras Premium', '2023-06-27', 99, 'sania_sania-beras--5-kg-_full02.jpg', 'â€¢ Sertifikat : Halal\r\nâ€¢Beras murni\r\nâ€¢ Berasal dari padi berkualitas\r\nâ€¢ Diproses secara higienis dan tidak menggunakan pemutih atau pengawet\r\nâ€¢ Menghasilkan nasi yang pulen\r\nâ€¢ Aman dikonsumsi untuk seluruh anggota keluarga Anda', 5),
	(14, 'Beras Maknyuss [5 kg]', 65000, 5, '-', '2023-03-22', 100, 'beras-maknyuss_beras-maknyuss-5kg_full04.jpg', '- Beras putih\r\n- Tanpa pengawet, tanpa pewangi, dan tanpa pemutih\r\n- Memiliki rasa yang pulen dan enak saat dimakan\r\n- Sangat baik dikonsumsi oleh seluruh anggota keluarga\r\n- Berat : 5 kg', 5),
	(15, 'susu uht ultra milk full cream [1 L]', 17000, 1, 'full cream', '2021-10-05', 99, 'uht_full_cream.jpg', '• Sertifikat : Halal, Diklaim sebagai susu bernutrisi seimbang yang baik diminum sehari-hari bagi seluruh keluarga Indonesia, Produk ini direkomendasikan untuk diminum anak-anak di atas usia 1 tahun', 2),
	(16, 'indomie goreng instan [40 pcs]', 110000, 85, 'indomie goreng', '2023-07-13', 100, 'c0588773a4ba09e12149640e24246a92.jpg', 'Mie instant Goreng\r\nMemiliki cita rasa yang gurih dan lezat, membuat siapa saja menyukainya\r\nDengan tekstur yang lembut, kenyal, dan rasa yang gurih\r\nCocok dinikmati setiap saat kapanpun dan dimanapun\r\nIsi : 40 pcs', 8),
	(17, 'BANGO Kecap Manis [400 mL/Kemasan Pouch]', 15000, 400, '-', '2022-01-05', 100, 'bango400.jpg', 'Dibuat sepenuh hati dari perpaduan tepat bahan pilihan berkualitas dari alam : kedelai hitam Mallika, gula, garam dan air', 10),
	(18, 'LOTTE Choco Pie Cake Isi Marshmallow Salut Coklat [12 Pcs]', 27000, 56, '-', '2022-06-05', 100, 'chocopie.jpg', 'Makanan ringan dari korea, Menggunakan bahan baku berkualitas, Memiliki citarasa yang nikmat dan lezat yang dapat memanjakan lidah Anda, Isi : 12 Pcs', 1),
	(21, 'minyak goreng bimoli [2 L]', 27000, 2, '2L', '2023-06-05', 100, '625fe697a5444ff860b9a3b895b39d94.png', 'minyak goreng dengan warna keemasan yang berasal dari Beta Karoten alami dan mengandung omega-9,\r\nberat bersih : 2 liter', 7);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table tokoonline.tambah_produk
CREATE TABLE IF NOT EXISTS `tambah_produk` (
  `id_tambah` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tambah`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `FK1_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table tokoonline.tambah_produk: ~1 rows (approximately)
DELETE FROM `tambah_produk`;
/*!40000 ALTER TABLE `tambah_produk` DISABLE KEYS */;
INSERT INTO `tambah_produk` (`id_tambah`, `jumlah`, `id_produk`) VALUES
	(2, 100, 8);
/*!40000 ALTER TABLE `tambah_produk` ENABLE KEYS */;

-- Dumping structure for trigger tokoonline.sisa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `sisa` AFTER INSERT ON `pembelian_produk` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok - NEW.jumlah
WHERE id_produk = NEW.id_produk;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger tokoonline.tambah
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tambah` AFTER INSERT ON `tambah_produk` FOR EACH ROW BEGIN
UPDATE produk SET stok = stok + NEW.jumlah
WHERE id_produk = NEW.id_produk;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
