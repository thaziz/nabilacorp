-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.19-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bisnis_tamma.d_access
CREATE TABLE IF NOT EXISTS `d_access` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) DEFAULT NULL,
  `a_parrent` int(11) DEFAULT NULL,
  `a_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_access: ~67 rows (approximately)
DELETE FROM `d_access`;
/*!40000 ALTER TABLE `d_access` DISABLE KEYS */;
INSERT INTO `d_access` (`a_id`, `a_name`, `a_parrent`, `a_order`) VALUES
	(1, 'Master', NULL, 1),
	(2, 'Data Supplier', 1, 2),
	(3, 'Data Customer', 2, 3),
	(4, 'Data Bahan Baku', 3, 4),
	(5, 'Data Jenis Produksi', 4, 5),
	(6, 'Data Pegawai ', 5, 6),
	(7, 'Data Akun Keuangan ', 6, 7),
	(8, 'Data Transaksi keuangan ', 7, 8),
	(9, 'Data Barang', 8, 9),
	(10, 'Purchasing', 0, 10),
	(11, 'Rencana Bahan Baku Produksi', 1, 11),
	(12, 'Rencana Pembelian', 2, 12),
	(13, 'Order Pembelian ', 3, 13),
	(14, 'Belanja Harian', 4, 14),
	(15, 'Return pembelian', 5, 15),
	(16, 'Inventory', NULL, 16),
	(17, 'Penerimaan Barang Supplier', 1, 17),
	(18, 'Penerimaan Barang Hasil Produksi', 2, 18),
	(19, 'Penerimaan Barang Return Customer', 3, 19),
	(20, 'Barang digunakan', 4, 20),
	(21, 'Stock Opname', 5, 21),
	(22, 'Produksi', NULL, 22),
	(23, 'Monitoring Order & Stock', 1, 23),
	(24, 'Rencana Produksi', 2, 24),
	(25, 'Manajemen SPK', 3, 25),
	(26, 'Manajemen Output Produksi', 4, 26),
	(27, 'Manajemen Sampah (Waste)', 5, 27),
	(28, 'Penjualan', NULL, 28),
	(29, 'Manajemen Harga', 1, 29),
	(30, 'Manajemen Promosi', 2, 30),
	(31, 'Broadcast Promosi Via Email ', 3, 31),
	(32, 'Rencana Penjualan', 4, 32),
	(33, 'POS Penjualan Retail ', 5, 33),
	(34, 'Ritail Transfer', 6, 34),
	(35, 'Pos Penjualan Grosir/Online', 7, 35),
	(36, 'Grosir Transfer', 8, 36),
	(37, 'Monitoring Return Penjualalan', 9, 37),
	(38, 'Manajemen Return Penjualan ', 10, 38),
	(39, 'Monitoring Progres Penjualan', 11, 39),
	(40, 'Mutasi Stock & Retail', 12, 40),
	(41, 'HRD', NULL, 41),
	(42, 'Data Karyawan ', 1, 42),
	(43, 'Data Administrasi Pegawai ', 2, 43),
	(44, 'Data Lembur Pegawai ', 3, 44),
	(45, 'Scoreboard Pegawai Per Hari', 4, 45),
	(46, 'Payroll', 5, 46),
	(47, 'Manajemen KPI Pegawai ', 6, 47),
	(48, 'Training Pegawai ', 7, 48),
	(49, 'Recruitment', 8, 49),
	(50, 'Keuangan', NULL, 50),
	(51, 'Manajemen SPK', 1, 51),
	(52, 'Proses Input Transaksi', 2, 52),
	(53, 'Laporan Hutang Piutang ', 3, 53),
	(54, 'Laporan (Jurnal,Buku Besar,Neraca,DLL)', 4, 54),
	(55, 'Analisa Progress Terhadap Perencanaan', 5, 55),
	(56, 'Analisa Net Profit Terhadap OCF', 6, 56),
	(57, 'Analisa Pertumbuhan Aset', 7, 57),
	(58, 'Analisa Cashflow', 8, 58),
	(59, 'Analisa Common Size dan Index', 9, 59),
	(60, 'Analisa Rasio Keuangan ', 10, 60),
	(61, 'Analisa Three Botton Line ', 11, 61),
	(62, 'Analisa ROE', 12, 62),
	(63, 'System', NULL, 63),
	(64, 'Manajemen User', 1, 64),
	(65, 'Manajemen Hak Akses', 2, 65),
	(66, 'Profil Perusahaan', 3, 66),
	(67, 'Tahun Finansial', 4, 67);
/*!40000 ALTER TABLE `d_access` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_akun
CREATE TABLE IF NOT EXISTS `d_akun` (
  `id_akun` varchar(50) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `kelompok_akun` varchar(100) NOT NULL,
  `posisi_akun` varchar(10) NOT NULL,
  `type_akun` varchar(15) NOT NULL,
  `group_neraca` varchar(20) DEFAULT NULL,
  `group_laba_rugi` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_akun: ~5 rows (approximately)
DELETE FROM `d_akun`;
/*!40000 ALTER TABLE `d_akun` DISABLE KEYS */;
INSERT INTO `d_akun` (`id_akun`, `nama_akun`, `kelompok_akun`, `posisi_akun`, `type_akun`, `group_neraca`, `group_laba_rugi`, `created_at`, `updated_at`) VALUES
	('1.00', 'KAS', 'Aset Lancar', 'D', 'GENERAL', 'A1-00', NULL, '2018-06-20 12:37:02', '2018-06-20 17:06:00'),
	('1.00.00', 'KAS KECIL', 'KAS', 'D', 'DETAIL', 'A1-00', NULL, '2018-06-21 11:01:07', '2018-06-21 11:01:07'),
	('1.01', 'BANK', 'Aset Lancar', 'D', 'GENERAL', 'A1-01', NULL, '2018-06-20 16:15:51', '2018-06-20 17:06:06'),
	('1.878787', 'Piutang', 'Aset Lancar', 'D', 'GENERAL', 'code01', 'edoc01', '2018-06-28 16:48:32', '2018-06-28 16:48:32'),
	('1.878787.78', 'usaha', 'KAS', 'D', 'DETAIL', 'code01', 'edoc01', '2018-06-28 16:50:42', '2018-06-28 16:50:42');
/*!40000 ALTER TABLE `d_akun` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_akun_saldo
CREATE TABLE IF NOT EXISTS `d_akun_saldo` (
  `id_akun` varchar(50) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(20) NOT NULL,
  `saldo` double DEFAULT NULL,
  PRIMARY KEY (`id_akun`,`bulan`,`tahun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_akun_saldo: ~2 rows (approximately)
DELETE FROM `d_akun_saldo`;
/*!40000 ALTER TABLE `d_akun_saldo` DISABLE KEYS */;
INSERT INTO `d_akun_saldo` (`id_akun`, `bulan`, `tahun`, `saldo`) VALUES
	('1.00.00', '06', '2018', 50000000),
	('1.878787.78', '06', '2018', 7999);
/*!40000 ALTER TABLE `d_akun_saldo` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_delivery_order
CREATE TABLE IF NOT EXISTS `d_delivery_order` (
  `do_id` int(11) NOT NULL AUTO_INCREMENT,
  `do_nota` varchar(50) DEFAULT NULL,
  `do_date_send` date DEFAULT NULL,
  `do_time` time DEFAULT NULL,
  `do_date_received` time DEFAULT NULL,
  `do_insert` timestamp NULL DEFAULT NULL,
  `do_update` datetime DEFAULT NULL,
  PRIMARY KEY (`do_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_delivery_order: ~3 rows (approximately)
DELETE FROM `d_delivery_order`;
/*!40000 ALTER TABLE `d_delivery_order` DISABLE KEYS */;
INSERT INTO `d_delivery_order` (`do_id`, `do_nota`, `do_date_send`, `do_time`, `do_date_received`, `do_insert`, `do_update`) VALUES
	(1, 'DO180605-000-1', '2018-06-05', '12:56:05', NULL, '2018-06-05 12:56:05', NULL),
	(2, 'DO180608-000-2', '2018-06-08', '15:46:43', NULL, '2018-06-08 15:46:43', NULL),
	(3, 'DO180624-000-3', '2018-06-24', '20:49:10', NULL, '2018-06-24 20:49:10', NULL);
/*!40000 ALTER TABLE `d_delivery_order` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_delivery_orderdt
CREATE TABLE IF NOT EXISTS `d_delivery_orderdt` (
  `dod_do` int(11) NOT NULL,
  `dod_detailid` tinyint(4) NOT NULL,
  `dod_prdt_productresult` tinyint(4) NOT NULL,
  `dod_prdt_detail` tinyint(4) NOT NULL,
  `dod_item` int(11) DEFAULT NULL,
  `dod_qty_send` int(11) DEFAULT NULL,
  `dod_date_send` date DEFAULT NULL,
  `dod_time_send` time DEFAULT NULL,
  `dod_qty_received` int(11) DEFAULT '0',
  `dod_date_received` date DEFAULT NULL,
  `dod_time_received` time DEFAULT NULL,
  `dod_status` varchar(2) DEFAULT 'WT' COMMENT 'WT : Waiting | FN : Finish',
  `dod_insert` timestamp NULL DEFAULT NULL,
  `dod_update` datetime DEFAULT NULL,
  PRIMARY KEY (`dod_do`,`dod_detailid`),
  CONSTRAINT `FK_d_delivery_orderdt_d_delivery_order` FOREIGN KEY (`dod_do`) REFERENCES `d_delivery_order` (`do_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_delivery_orderdt: ~4 rows (approximately)
DELETE FROM `d_delivery_orderdt`;
/*!40000 ALTER TABLE `d_delivery_orderdt` DISABLE KEYS */;
INSERT INTO `d_delivery_orderdt` (`dod_do`, `dod_detailid`, `dod_prdt_productresult`, `dod_prdt_detail`, `dod_item`, `dod_qty_send`, `dod_date_send`, `dod_time_send`, `dod_qty_received`, `dod_date_received`, `dod_time_received`, `dod_status`, `dod_insert`, `dod_update`) VALUES
	(1, 1, 1, 1, 320, 10, '2018-06-05', '12:56:05', 10, '2018-06-05', '10:15:00', 'FN', '2018-06-05 12:56:05', '2018-06-05 05:58:21'),
	(2, 1, 2, 3, 161, 10, '2018-06-08', '15:46:43', 0, NULL, NULL, 'WT', '2018-06-08 15:46:43', NULL),
	(2, 2, 3, 4, 166, 10, '2018-06-08', '15:46:43', 8, '2018-06-08', '16:20:00', 'WT', '2018-06-08 15:46:43', '2018-06-08 16:16:34'),
	(3, 1, 1, 1, 326, 60, '2018-06-24', '20:49:10', 0, NULL, NULL, 'WT', '2018-06-24 20:49:10', NULL);
/*!40000 ALTER TABLE `d_delivery_orderdt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_formula
CREATE TABLE IF NOT EXISTS `d_formula` (
  `f_id` int(11) DEFAULT NULL,
  `f_detailid` int(11) DEFAULT NULL,
  `f_bb` int(11) DEFAULT NULL,
  `f_value` decimal(11,2) DEFAULT NULL,
  `f_scale` varchar(20) DEFAULT NULL,
  KEY `FK_d_formula_d_formula_result` (`f_id`),
  KEY `FK_d_formula_m_item` (`f_bb`),
  CONSTRAINT `FK_d_formula_d_formula_result` FOREIGN KEY (`f_id`) REFERENCES `d_formula_result` (`fr_id`),
  CONSTRAINT `FK_d_formula_m_item` FOREIGN KEY (`f_bb`) REFERENCES `m_item` (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_formula: ~0 rows (approximately)
DELETE FROM `d_formula`;
/*!40000 ALTER TABLE `d_formula` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_formula` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_formula_result
CREATE TABLE IF NOT EXISTS `d_formula_result` (
  `fr_id` int(11) NOT NULL AUTO_INCREMENT,
  `fr_adonan` int(11) NOT NULL,
  `fr_result` decimal(10,2) DEFAULT NULL,
  `fr_scale` varchar(10) DEFAULT NULL,
  `fr_updated` timestamp NULL DEFAULT NULL,
  `fr_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`fr_id`,`fr_adonan`),
  UNIQUE KEY `fr_adonan` (`fr_adonan`),
  CONSTRAINT `FK_d_formula_result_m_item` FOREIGN KEY (`fr_adonan`) REFERENCES `m_item` (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_formula_result: ~0 rows (approximately)
DELETE FROM `d_formula_result`;
/*!40000 ALTER TABLE `d_formula_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_formula_result` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_group
CREATE TABLE IF NOT EXISTS `d_group` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`g_id`),
  UNIQUE KEY `g_name` (`g_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='nama group';

-- Dumping data for table bisnis_tamma.d_group: ~0 rows (approximately)
DELETE FROM `d_group`;
/*!40000 ALTER TABLE `d_group` DISABLE KEYS */;
INSERT INTO `d_group` (`g_id`, `g_name`) VALUES
	(1, 'ke');
/*!40000 ALTER TABLE `d_group` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_group_access
CREATE TABLE IF NOT EXISTS `d_group_access` (
  `ga_access` int(11) NOT NULL,
  `ga_group` int(11) NOT NULL,
  `ga_read` enum('Y','N') DEFAULT 'N',
  `ga_insert` enum('Y','N') DEFAULT 'N',
  `ga_update` enum('Y','N') DEFAULT 'N',
  `ga_delete` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`ga_access`,`ga_group`),
  KEY `FK_d_group_access_d_group` (`ga_group`),
  CONSTRAINT `FK_d_group_access_d_access` FOREIGN KEY (`ga_access`) REFERENCES `d_access` (`a_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_d_group_access_d_group` FOREIGN KEY (`ga_group`) REFERENCES `d_group` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_group_access: ~67 rows (approximately)
DELETE FROM `d_group_access`;
/*!40000 ALTER TABLE `d_group_access` DISABLE KEYS */;
INSERT INTO `d_group_access` (`ga_access`, `ga_group`, `ga_read`, `ga_insert`, `ga_update`, `ga_delete`) VALUES
	(1, 1, 'N', 'N', 'N', 'N'),
	(2, 1, 'Y', 'N', 'N', 'N'),
	(3, 1, 'Y', 'N', 'N', 'N'),
	(4, 1, 'N', 'N', 'N', 'N'),
	(5, 1, 'N', 'N', 'N', 'N'),
	(6, 1, 'N', 'N', 'N', 'N'),
	(7, 1, 'N', 'N', 'N', 'N'),
	(8, 1, 'N', 'N', 'N', 'N'),
	(9, 1, 'N', 'N', 'N', 'N'),
	(10, 1, 'N', 'N', 'N', 'N'),
	(11, 1, 'N', 'N', 'N', 'N'),
	(12, 1, 'N', 'N', 'N', 'N'),
	(13, 1, 'N', 'N', 'N', 'N'),
	(14, 1, 'N', 'N', 'N', 'N'),
	(15, 1, 'N', 'N', 'N', 'N'),
	(16, 1, 'N', 'N', 'N', 'N'),
	(17, 1, 'N', 'N', 'N', 'N'),
	(18, 1, 'N', 'N', 'N', 'N'),
	(19, 1, 'N', 'N', 'N', 'N'),
	(20, 1, 'N', 'N', 'N', 'N'),
	(21, 1, 'N', 'N', 'N', 'N'),
	(22, 1, 'N', 'N', 'N', 'N'),
	(23, 1, 'N', 'N', 'N', 'N'),
	(24, 1, 'N', 'N', 'N', 'N'),
	(25, 1, 'N', 'N', 'N', 'N'),
	(26, 1, 'N', 'N', 'N', 'N'),
	(27, 1, 'N', 'N', 'N', 'N'),
	(28, 1, 'N', 'N', 'N', 'N'),
	(29, 1, 'N', 'N', 'N', 'N'),
	(30, 1, 'N', 'N', 'N', 'N'),
	(31, 1, 'N', 'N', 'N', 'N'),
	(32, 1, 'N', 'N', 'N', 'N'),
	(33, 1, 'N', 'N', 'N', 'N'),
	(34, 1, 'N', 'N', 'N', 'N'),
	(35, 1, 'N', 'N', 'N', 'N'),
	(36, 1, 'N', 'N', 'N', 'N'),
	(37, 1, 'N', 'N', 'N', 'N'),
	(38, 1, 'N', 'N', 'N', 'N'),
	(39, 1, 'N', 'N', 'N', 'N'),
	(40, 1, 'N', 'N', 'N', 'N'),
	(41, 1, 'N', 'N', 'N', 'N'),
	(42, 1, 'N', 'N', 'N', 'N'),
	(43, 1, 'N', 'N', 'N', 'N'),
	(44, 1, 'N', 'N', 'N', 'N'),
	(45, 1, 'N', 'N', 'N', 'N'),
	(46, 1, 'N', 'N', 'N', 'N'),
	(47, 1, 'N', 'N', 'N', 'N'),
	(48, 1, 'N', 'N', 'N', 'N'),
	(49, 1, 'N', 'N', 'N', 'N'),
	(50, 1, 'N', 'N', 'N', 'N'),
	(51, 1, 'N', 'N', 'N', 'N'),
	(52, 1, 'N', 'N', 'N', 'N'),
	(53, 1, 'N', 'N', 'N', 'N'),
	(54, 1, 'N', 'N', 'N', 'N'),
	(55, 1, 'N', 'N', 'N', 'N'),
	(56, 1, 'N', 'N', 'N', 'N'),
	(57, 1, 'N', 'N', 'N', 'N'),
	(58, 1, 'N', 'N', 'N', 'N'),
	(59, 1, 'N', 'N', 'N', 'N'),
	(60, 1, 'N', 'N', 'N', 'N'),
	(61, 1, 'N', 'N', 'N', 'N'),
	(62, 1, 'N', 'N', 'N', 'N'),
	(63, 1, 'N', 'N', 'N', 'N'),
	(64, 1, 'N', 'N', 'N', 'N'),
	(65, 1, 'N', 'N', 'N', 'N'),
	(66, 1, 'N', 'N', 'N', 'N'),
	(67, 1, 'N', 'N', 'N', 'N');
/*!40000 ALTER TABLE `d_group_access` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_gudangcabang
CREATE TABLE IF NOT EXISTS `d_gudangcabang` (
  `gc_id` int(11) NOT NULL AUTO_INCREMENT,
  `gc_gudang` varchar(30) NOT NULL COMMENT 'GC : GUDANG CUSTOMER | GG : GUDANG GROSIR | GR : GUDANG RETAIL | GS : GUDANG SENDING | GP : GUDANG PRODUKSI | GB : GUDANG BAHAN BAKU',
  `gc_comp` int(11) NOT NULL COMMENT 'GC : GUDANG CUSTOMER | GG : GUDANG GROSIR | GR : GUDANG RETAIL | GS : GUDANG SENDING | GP : GUDANG PRODUKSI | GB : GUDANG BAHAN BAKU',
  `gc_insert` datetime DEFAULT NULL,
  `gc_update` datetime DEFAULT NULL,
  PRIMARY KEY (`gc_id`),
  KEY `FK_d_gudangcabang_m_cabang` (`gc_comp`),
  KEY `FK_d_gudangcabang_m_gudang` (`gc_gudang`),
  CONSTRAINT `FK_d_gudangcabang_m_comp` FOREIGN KEY (`gc_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_d_gudangcabang_m_gudang` FOREIGN KEY (`gc_gudang`) REFERENCES `m_gudang` (`g_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_gudangcabang: ~5 rows (approximately)
DELETE FROM `d_gudangcabang`;
/*!40000 ALTER TABLE `d_gudangcabang` DISABLE KEYS */;
INSERT INTO `d_gudangcabang` (`gc_id`, `gc_gudang`, `gc_comp`, `gc_insert`, `gc_update`) VALUES
	(1, 'GUDANG PENJUALAN', 1, NULL, NULL),
	(2, 'GUDANG TITIP', 1, NULL, NULL),
	(3, 'GUDANG TITIPAN', 1, NULL, NULL),
	(4, 'GUDANG PENJUALAN', 2, NULL, NULL),
	(5, 'GUDANG PRODUKSI', 1, NULL, NULL);
/*!40000 ALTER TABLE `d_gudangcabang` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_itemtitipan_dt
CREATE TABLE IF NOT EXISTS `d_itemtitipan_dt` (
  `idt_itemtitipan` int(11) NOT NULL,
  `idt_detailid` int(11) NOT NULL,
  `idt_date` date NOT NULL,
  `idt_comp` int(11) NOT NULL,
  `idt_position` int(11) NOT NULL,
  `idt_item` int(11) DEFAULT NULL,
  `idt_qty` decimal(6,2) DEFAULT NULL,
  `idt_sisa` decimal(6,2) DEFAULT NULL,
  `idt_terjual` decimal(6,2) DEFAULT NULL,
  `idt_return_qty` decimal(6,2) DEFAULT NULL COMMENT 'menyimpan return sisa kemarin',
  `idt_return_titip` decimal(6,2) DEFAULT NULL COMMENT 'menyimpan return baru',
  `idt_price` decimal(10,2) DEFAULT NULL,
  `idt_action` varchar(50) DEFAULT NULL,
  `idt_status` enum('Y','N') DEFAULT 'N' COMMENT 'Y: selesai N:proses',
  `idt_created` datetime DEFAULT NULL,
  `idt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`idt_itemtitipan`,`idt_detailid`),
  CONSTRAINT `FK_d_itemtitipan_dt_d_item_titipan` FOREIGN KEY (`idt_itemtitipan`) REFERENCES `d_item_titipan` (`it_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_itemtitipan_dt: ~0 rows (approximately)
DELETE FROM `d_itemtitipan_dt`;
/*!40000 ALTER TABLE `d_itemtitipan_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_itemtitipan_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_itemtitip_dt
CREATE TABLE IF NOT EXISTS `d_itemtitip_dt` (
  `idt_itemtitip` int(11) NOT NULL,
  `idt_detailid` int(11) NOT NULL,
  `idt_date` date NOT NULL,
  `idt_item` int(11) DEFAULT NULL,
  `idt_qty` decimal(6,2) DEFAULT NULL,
  `idt_price` decimal(10,2) DEFAULT NULL,
  `idt_created` datetime DEFAULT NULL,
  `idt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`idt_itemtitip`,`idt_detailid`),
  CONSTRAINT `FK_d_itemtitip_dt_d_item_titip` FOREIGN KEY (`idt_itemtitip`) REFERENCES `d_item_titip` (`it_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_itemtitip_dt: ~0 rows (approximately)
DELETE FROM `d_itemtitip_dt`;
/*!40000 ALTER TABLE `d_itemtitip_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_itemtitip_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_item_supplier
CREATE TABLE IF NOT EXISTS `d_item_supplier` (
  `is_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_item` int(11) DEFAULT NULL,
  `is_supplier` int(11) DEFAULT NULL,
  `is_price` decimal(10,2) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `is_created` timestamp NULL DEFAULT NULL,
  `is_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`is_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_item_supplier: ~5 rows (approximately)
DELETE FROM `d_item_supplier`;
/*!40000 ALTER TABLE `d_item_supplier` DISABLE KEYS */;
INSERT INTO `d_item_supplier` (`is_id`, `is_item`, `is_supplier`, `is_price`, `is_active`, `is_created`, `is_updated`) VALUES
	(1, 1, 20, 5000.00, 'Y', NULL, NULL),
	(2, 9, 20, 6000.00, 'Y', NULL, NULL),
	(3, 10, 20, 7000.00, 'Y', NULL, NULL),
	(4, 11, 21, 5000.00, 'Y', NULL, NULL),
	(5, 11, 20, 5000.00, 'Y', NULL, NULL);
/*!40000 ALTER TABLE `d_item_supplier` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_item_titip
CREATE TABLE IF NOT EXISTS `d_item_titip` (
  `it_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_code` varchar(50) NOT NULL DEFAULT '0',
  `it_comp` int(11) NOT NULL DEFAULT '0',
  `it_date` date DEFAULT NULL,
  `it_toko` varchar(50) DEFAULT NULL,
  `it_status` varchar(50) DEFAULT NULL,
  `it_total` decimal(10,2) DEFAULT NULL,
  `it_bayar` decimal(10,2) DEFAULT NULL,
  `it_keterangan` varchar(50) DEFAULT NULL,
  `it_created` datetime DEFAULT NULL,
  `it_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`it_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_item_titip: ~0 rows (approximately)
DELETE FROM `d_item_titip`;
/*!40000 ALTER TABLE `d_item_titip` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_item_titip` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_item_titipan
CREATE TABLE IF NOT EXISTS `d_item_titipan` (
  `it_id` int(11) NOT NULL AUTO_INCREMENT,
  `it_comp` int(11) NOT NULL DEFAULT '0',
  `it_code` varchar(50) NOT NULL DEFAULT '0',
  `it_status` varchar(50) NOT NULL DEFAULT '0' COMMENT 'lunas, dibayar,kosong',
  `it_supplier` int(11) NOT NULL DEFAULT '0',
  `it_date` date DEFAULT NULL,
  `it_toko` varchar(50) DEFAULT NULL,
  `it_note` varchar(50) DEFAULT NULL,
  `it_total` decimal(15,2) DEFAULT NULL,
  `it_disc` decimal(15,2) DEFAULT NULL,
  `it_bayar` decimal(15,2) DEFAULT NULL,
  `it_jurnal` decimal(15,2) DEFAULT NULL,
  `it_keterangan` varchar(50) DEFAULT '0',
  `it_created` datetime DEFAULT NULL,
  `it_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`it_id`),
  UNIQUE KEY `it_code` (`it_code`),
  KEY `FK_d_item_titipan_m_comp` (`it_comp`),
  KEY `FK_d_item_titipan_m_supplier` (`it_supplier`),
  CONSTRAINT `FK_d_item_titipan_m_comp` FOREIGN KEY (`it_comp`) REFERENCES `m_comp` (`c_id`),
  CONSTRAINT `FK_d_item_titipan_m_supplier` FOREIGN KEY (`it_supplier`) REFERENCES `m_supplier` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_item_titipan: ~0 rows (approximately)
DELETE FROM `d_item_titipan`;
/*!40000 ALTER TABLE `d_item_titipan` DISABLE KEYS */;
INSERT INTO `d_item_titipan` (`it_id`, `it_comp`, `it_code`, `it_status`, `it_supplier`, `it_date`, `it_toko`, `it_note`, `it_total`, `it_disc`, `it_bayar`, `it_jurnal`, `it_keterangan`, `it_created`, `it_updated`) VALUES
	(1, 1, 'IT-1810-00001', '0', 20, '2018-10-10', NULL, NULL, 1270000.00, NULL, NULL, NULL, 'tambah', '2018-10-10 09:42:03', '2018-10-10 09:42:03');
/*!40000 ALTER TABLE `d_item_titipan` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mem
CREATE TABLE IF NOT EXISTS `d_mem` (
  `m_id` varchar(10) NOT NULL,
  `m_username` varchar(20) DEFAULT NULL,
  `m_passwd` varchar(40) DEFAULT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `m_birth_tgl` date DEFAULT NULL,
  `m_addr` varchar(100) DEFAULT NULL,
  `m_reff` varchar(10) DEFAULT NULL,
  `m_lastlogin` timestamp NULL DEFAULT NULL,
  `m_lastlogout` timestamp NULL DEFAULT NULL,
  `m_insert` timestamp NULL DEFAULT NULL,
  `m_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mem: ~3 rows (approximately)
DELETE FROM `d_mem`;
/*!40000 ALTER TABLE `d_mem` DISABLE KEYS */;
INSERT INTO `d_mem` (`m_id`, `m_username`, `m_passwd`, `m_name`, `m_birth_tgl`, `m_addr`, `m_reff`, `m_lastlogin`, `m_lastlogout`, `m_insert`, `m_update`) VALUES
	('1', 'thoriq', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'shitta', '2018-03-28', NULL, NULL, '2018-03-28 08:24:54', '2018-03-28 08:24:53', '2018-03-28 08:24:50', '2018-04-09 20:30:36'),
	('2', 'shitta', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'dfd', '2018-05-02', NULL, NULL, '2018-05-02 16:22:44', '2018-05-02 16:22:53', '2018-04-10 07:24:47', '2018-05-02 16:22:54'),
	('4', 'mahmud', '47e3896af5f3d18dbce321283dd9af0197f8c0e4', 'sds', '2018-05-02', NULL, NULL, '2018-05-02 16:22:45', '2018-05-02 16:22:47', '2018-04-10 07:31:19', '2018-05-02 16:22:50');
/*!40000 ALTER TABLE `d_mem` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mem_access
CREATE TABLE IF NOT EXISTS `d_mem_access` (
  `ma_id` int(11) NOT NULL AUTO_INCREMENT,
  `ma_mem` varchar(10) DEFAULT NULL,
  `ma_access` int(11) DEFAULT NULL,
  `ma_group` int(11) DEFAULT NULL,
  `ma_type` enum('M','G') DEFAULT NULL COMMENT 'M: langsung dari member, G: harus melalui group akses',
  `ma_read` enum('N','Y') DEFAULT 'N',
  `ma_insert` enum('N','Y') DEFAULT 'N',
  `ma_update` enum('N','Y') DEFAULT 'N',
  `ma_delete` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`ma_id`),
  KEY `FK_d_mem_acces_d_mem` (`ma_mem`),
  KEY `FK_d_mem_acces_d_access` (`ma_access`),
  CONSTRAINT `FK_d_mem_acces_d_access` FOREIGN KEY (`ma_access`) REFERENCES `d_access` (`a_id`),
  CONSTRAINT `FK_d_mem_acces_d_mem` FOREIGN KEY (`ma_mem`) REFERENCES `d_mem` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='menampung akses user';

-- Dumping data for table bisnis_tamma.d_mem_access: ~0 rows (approximately)
DELETE FROM `d_mem_access`;
/*!40000 ALTER TABLE `d_mem_access` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem_access` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mem_comp
CREATE TABLE IF NOT EXISTS `d_mem_comp` (
  `mc_mem` varchar(10) NOT NULL,
  `mc_comp` int(11) NOT NULL,
  `mc_lvl` tinyint(4) DEFAULT NULL,
  `mc_active` varchar(1) DEFAULT '0',
  `mc_insert` timestamp NULL DEFAULT NULL,
  `mc_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mc_mem`,`mc_comp`),
  KEY `FK_d_mem_comp_m_comp` (`mc_comp`),
  CONSTRAINT `FK_d_mem_comp_d_mem` FOREIGN KEY (`mc_mem`) REFERENCES `d_mem` (`m_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_d_mem_comp_m_comp` FOREIGN KEY (`mc_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mem_comp: ~2 rows (approximately)
DELETE FROM `d_mem_comp`;
/*!40000 ALTER TABLE `d_mem_comp` DISABLE KEYS */;
INSERT INTO `d_mem_comp` (`mc_mem`, `mc_comp`, `mc_lvl`, `mc_active`, `mc_insert`, `mc_update`) VALUES
	('1', 1, NULL, 'Y', NULL, '2018-09-06 16:08:01'),
	('1', 2, NULL, 'y', NULL, '2018-09-06 18:43:13');
/*!40000 ALTER TABLE `d_mem_comp` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mem_gudangcomp
CREATE TABLE IF NOT EXISTS `d_mem_gudangcomp` (
  `mg_mem` varchar(50) NOT NULL,
  `mg_gudangcomp` int(11) NOT NULL,
  `mg_created` datetime DEFAULT NULL,
  `mg_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`mg_mem`,`mg_gudangcomp`),
  KEY `FK_d_mem_gudangcomp_d_gudangcabang` (`mg_gudangcomp`),
  CONSTRAINT `FK_d_mem_gudangcomp_d_gudangcabang` FOREIGN KEY (`mg_gudangcomp`) REFERENCES `d_gudangcabang` (`gc_id`),
  CONSTRAINT `FK_d_mem_gudangcomp_d_mem` FOREIGN KEY (`mg_mem`) REFERENCES `d_mem` (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mem_gudangcomp: ~0 rows (approximately)
DELETE FROM `d_mem_gudangcomp`;
/*!40000 ALTER TABLE `d_mem_gudangcomp` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mem_gudangcomp` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mutasi_item
CREATE TABLE IF NOT EXISTS `d_mutasi_item` (
  `mi_id` int(11) NOT NULL AUTO_INCREMENT,
  `mi_comp` int(11) NOT NULL DEFAULT '0',
  `mi_date` date NOT NULL COMMENT 'RT: Retail | GR: Grosir',
  `mi_code` varchar(50) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mi_keterangan` varchar(50) DEFAULT '0000-00-00 00:00:00',
  `mi_created` timestamp NULL DEFAULT NULL,
  `mi_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`mi_id`),
  KEY `FK_d_mutasi_item_m_comp` (`mi_comp`),
  CONSTRAINT `FK_d_mutasi_item_m_comp` FOREIGN KEY (`mi_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mutasi_item: ~0 rows (approximately)
DELETE FROM `d_mutasi_item`;
/*!40000 ALTER TABLE `d_mutasi_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mutasi_item` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mutationitem_material
CREATE TABLE IF NOT EXISTS `d_mutationitem_material` (
  `mm_mutationitem` int(11) NOT NULL,
  `mm_detailid` int(11) NOT NULL,
  `mm_comp` int(11) NOT NULL,
  `mm_position` int(11) NOT NULL,
  `mm_item` int(11) DEFAULT NULL,
  `mm_qty` decimal(10,2) DEFAULT NULL,
  `mm_hpp` decimal(10,2) DEFAULT NULL,
  `mm_create` datetime DEFAULT NULL,
  `mm_update` datetime DEFAULT NULL,
  PRIMARY KEY (`mm_mutationitem`,`mm_detailid`),
  KEY `FK_d_mutationitem_material_m_comp` (`mm_comp`),
  CONSTRAINT `FK_d_mutationitem_material_d_mutasi_item` FOREIGN KEY (`mm_mutationitem`) REFERENCES `d_mutasi_item` (`mi_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mutationitem_material: ~0 rows (approximately)
DELETE FROM `d_mutationitem_material`;
/*!40000 ALTER TABLE `d_mutationitem_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mutationitem_material` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_mutationitem_product
CREATE TABLE IF NOT EXISTS `d_mutationitem_product` (
  `mp_mutationitem` int(11) NOT NULL,
  `mp_detailid` int(11) NOT NULL,
  `mp_comp` int(11) NOT NULL,
  `mp_position` int(11) NOT NULL,
  `mp_item` int(11) DEFAULT NULL,
  `mp_qty` decimal(10,2) DEFAULT NULL,
  `mp_hpp` decimal(10,2) DEFAULT NULL,
  `mp_create` datetime DEFAULT NULL,
  `mp_update` datetime DEFAULT NULL,
  PRIMARY KEY (`mp_mutationitem`,`mp_detailid`),
  KEY `FK_d_mutationitem_product_m_comp` (`mp_comp`),
  CONSTRAINT `FK_d_mutationitem_product_d_mutasi_item` FOREIGN KEY (`mp_mutationitem`) REFERENCES `d_mutasi_item` (`mi_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_mutationitem_product: ~0 rows (approximately)
DELETE FROM `d_mutationitem_product`;
/*!40000 ALTER TABLE `d_mutationitem_product` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_mutationitem_product` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_pengiriman
CREATE TABLE IF NOT EXISTS `d_pengiriman` (
  `p_id` int(11) NOT NULL,
  `p_pr` varchar(100) DEFAULT NULL,
  `p_code` varchar(100) DEFAULT NULL,
  `p_tanggal_produksi` date DEFAULT NULL,
  `p_tanggal_transfer` date DEFAULT NULL,
  `p_keterangan` varchar(100) DEFAULT NULL,
  `p_insert` datetime DEFAULT NULL,
  `p_update` datetime DEFAULT NULL,
  `p_status_diterima` enum('Y','N','T') DEFAULT 'Y' COMMENT 'N=''Belum di kirim , Y=Kirim'' ,T=''Terima''',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_pengiriman: ~0 rows (approximately)
DELETE FROM `d_pengiriman`;
/*!40000 ALTER TABLE `d_pengiriman` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_pengiriman` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_pengiriman_dt
CREATE TABLE IF NOT EXISTS `d_pengiriman_dt` (
  `pd_pengiriman` int(11) NOT NULL,
  `pd_detailid` int(11) NOT NULL,
  `pd_comp` int(11) DEFAULT NULL,
  `pd_position` int(11) DEFAULT NULL,
  `pd_item` int(11) DEFAULT NULL,
  `pd_qty` int(11) DEFAULT NULL,
  `pd_diterima` int(11) DEFAULT '0',
  `pd_penerima` varchar(50) DEFAULT '0',
  `pd_status_diterima` enum('Y','N') DEFAULT 'N',
  `pd_hpp` decimal(10,2) DEFAULT NULL,
  `pd_insert` datetime DEFAULT NULL,
  `pd_update` datetime DEFAULT NULL,
  PRIMARY KEY (`pd_pengiriman`,`pd_detailid`),
  CONSTRAINT `FK_d_pengiriman_dt_d_pengiriman` FOREIGN KEY (`pd_pengiriman`) REFERENCES `d_pengiriman` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_pengiriman_dt: ~0 rows (approximately)
DELETE FROM `d_pengiriman_dt`;
/*!40000 ALTER TABLE `d_pengiriman_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_pengiriman_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_productplan
CREATE TABLE IF NOT EXISTS `d_productplan` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_date` date DEFAULT NULL,
  `pp_item` int(11) DEFAULT NULL,
  `pp_qty` decimal(10,0) DEFAULT NULL,
  `pp_isspk` enum('N','Y','P','C') DEFAULT 'N' COMMENT 'N : Rencana | Y : Spk | P : Produksi ',
  `pp_insert` timestamp NULL DEFAULT NULL,
  `pp_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productplan: ~3 rows (approximately)
DELETE FROM `d_productplan`;
/*!40000 ALTER TABLE `d_productplan` DISABLE KEYS */;
INSERT INTO `d_productplan` (`pp_id`, `pp_date`, `pp_item`, `pp_qty`, `pp_isspk`, `pp_insert`, `pp_update`) VALUES
	(14, '2018-06-10', 326, 100, 'N', NULL, '2018-06-10 18:13:32'),
	(15, '2018-06-24', 163, 70, 'N', NULL, '2018-06-24 20:44:45'),
	(16, '2018-06-24', 371, 55, 'N', NULL, '2018-06-24 20:51:31');
/*!40000 ALTER TABLE `d_productplan` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_productresult
CREATE TABLE IF NOT EXISTS `d_productresult` (
  `pr_id` int(11) NOT NULL,
  `pr_comp` int(11) NOT NULL,
  `pr_code` varchar(50) NOT NULL,
  `pr_spk` int(11) NOT NULL,
  `pr_date` date DEFAULT NULL,
  `pr_item` int(11) DEFAULT NULL,
  `pr_note` varchar(50) DEFAULT NULL,
  `pr_status` char(10) DEFAULT NULL,
  `pr_created` datetime DEFAULT NULL,
  `pr_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `pr_spk` (`pr_spk`),
  KEY `FK_d_productresult_m_comp` (`pr_comp`),
  CONSTRAINT `FK_d_productresult_m_comp` FOREIGN KEY (`pr_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productresult: ~1 rows (approximately)
DELETE FROM `d_productresult`;
/*!40000 ALTER TABLE `d_productresult` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_productresult` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_productresult_dt
CREATE TABLE IF NOT EXISTS `d_productresult_dt` (
  `prdt_productresult` int(11) NOT NULL,
  `prdt_detailid` int(11) NOT NULL,
  `prdt_comp` int(11) NOT NULL,
  `prdt_position` int(11) NOT NULL,
  `prdt_date` date DEFAULT NULL,
  `prdt_item` int(11) DEFAULT NULL,
  `prdt_qty` decimal(10,0) DEFAULT NULL,
  `prdt_qty_sisa` decimal(10,0) DEFAULT NULL,
  `prdt_kirim` decimal(10,0) DEFAULT '0',
  `prdt_status` varchar(2) DEFAULT NULL COMMENT 'RD : Ready | PR : Progres | FN : Final | RC : Received',
  `prdt_hpp` decimal(10,2) NOT NULL,
  `prdt_time` time DEFAULT NULL,
  `prdt_created` datetime DEFAULT NULL,
  `prdt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`prdt_productresult`,`prdt_detailid`),
  KEY `FK_d_productresult_dt_m_comp` (`prdt_comp`),
  CONSTRAINT `FK_d_productresult_dt_d_productresult` FOREIGN KEY (`prdt_productresult`) REFERENCES `d_productresult` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_productresult_dt: ~2 rows (approximately)
DELETE FROM `d_productresult_dt`;
/*!40000 ALTER TABLE `d_productresult_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_productresult_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchaseorder_dt
CREATE TABLE IF NOT EXISTS `d_purchaseorder_dt` (
  `podt_purchaseorder` int(11) NOT NULL,
  `podt_detailid` int(11) NOT NULL COMMENT 'ID PURCHASING (d_pcs_id)',
  `podt_item` int(11) NOT NULL COMMENT 'ID ITEM (m_item)',
  `podt_purchaseplandt` int(11) NOT NULL COMMENT 'ID PURCHASINGPLAN DETAIL (d_pcspdt_id)',
  `podt_qty` int(11) NOT NULL DEFAULT '0',
  `podt_qtyconfirm` int(11) NOT NULL DEFAULT '0',
  `podt_price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'HARGA SATUAN',
  `podt_prevcost` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'HARGA PEMBELIAN TERAKHIR',
  `podt_total` decimal(20,2) unsigned DEFAULT '0.00' COMMENT 'HARGA TOTAL',
  `podt_isconfirm` varchar(5) DEFAULT 'FALSE' COMMENT 'IS CONFIRM ?',
  `podt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `podt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`podt_purchaseorder`,`podt_detailid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchaseorder_dt: ~0 rows (approximately)
DELETE FROM `d_purchaseorder_dt`;
/*!40000 ALTER TABLE `d_purchaseorder_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchaseorder_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchaseplan_dt
CREATE TABLE IF NOT EXISTS `d_purchaseplan_dt` (
  `ppdt_pruchaseplan` int(11) NOT NULL AUTO_INCREMENT,
  `ppdt_detailid` int(11) NOT NULL DEFAULT '0',
  `ppdt_item` int(11) NOT NULL DEFAULT '0',
  `ppdt_qty` int(11) NOT NULL DEFAULT '0',
  `ppdt_prevcost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ppdt_qtyconfirm` int(11) NOT NULL DEFAULT '0',
  `ppdt_isconfirm` varchar(5) NOT NULL DEFAULT 'FALSE' COMMENT 'IS CONFIRM ?',
  `ppdt_ispo` varchar(5) NOT NULL DEFAULT 'FALSE' COMMENT 'IS PO ?',
  `ppdt_poid` int(11) NOT NULL DEFAULT '0' COMMENT 'ID PURCHASING',
  `ppdt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ppdt_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ppdt_pruchaseplan`,`ppdt_detailid`),
  CONSTRAINT `FK_d_purchaseplan_dt_d_purchase_plan` FOREIGN KEY (`ppdt_pruchaseplan`) REFERENCES `d_purchase_plan` (`p_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchaseplan_dt: ~0 rows (approximately)
DELETE FROM `d_purchaseplan_dt`;
/*!40000 ALTER TABLE `d_purchaseplan_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchaseplan_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchase_order
CREATE TABLE IF NOT EXISTS `d_purchase_order` (
  `po_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_date` date DEFAULT NULL,
  `po_purchaseplan` int(11) NOT NULL COMMENT 'PURCHASING PLAN',
  `po_supplier` int(11) NOT NULL COMMENT 'SUPPLIER',
  `po_code` varchar(15) NOT NULL,
  `po_mem` varchar(15) NOT NULL COMMENT 'DIABAIKAN SEMENTARA',
  `po_method` varchar(7) NOT NULL COMMENT 'METODE BAYAR',
  `po_total_gross` decimal(20,2) DEFAULT '0.00',
  `po_discount` decimal(20,2) DEFAULT '0.00' COMMENT 'DISKON DALAM RUPIAH',
  `po_disc_percent` smallint(6) DEFAULT '0' COMMENT 'DISKON PRESENTASE',
  `po_disc_value` decimal(20,2) DEFAULT '0.00' COMMENT 'KONVERSI HASIL DISKON PRESENTASE',
  `po_tax_percent` smallint(6) DEFAULT '0' COMMENT 'PAJAK PERSENTASE',
  `po_tax_value` decimal(20,2) DEFAULT '0.00' COMMENT 'KONVERSI HASIL PAJAK PERSENTASE',
  `po_total_net` decimal(20,2) DEFAULT '0.00',
  `po_received` date DEFAULT NULL,
  `po_date_confirm` date DEFAULT NULL,
  `po_duedate` date DEFAULT NULL COMMENT 'TGL JATUH TEMPO PADA TOP, TGL TERAKHIR PENGIRIMAN PADA DEPOSIT',
  `po_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: WAITING | CF: CONFIRMED | DE: DAPAT DIEDIT | RC: RECEIVED',
  `po_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `po_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`po_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchase_order: ~0 rows (approximately)
DELETE FROM `d_purchase_order`;
/*!40000 ALTER TABLE `d_purchase_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchase_order` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchase_plan
CREATE TABLE IF NOT EXISTS `d_purchase_plan` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_date` date NOT NULL,
  `p_code` varchar(15) NOT NULL,
  `p_supplier` int(11) NOT NULL,
  `p_mem` varchar(10) NOT NULL COMMENT 'd_mem (m_id)',
  `p_confirm` date DEFAULT NULL,
  `p_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: waiting | PE: Pending  dapat diedit | AP: disetujui | NAP: tdk disetujui',
  `p_status_date` date DEFAULT NULL,
  `p_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `p_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchase_plan: ~0 rows (approximately)
DELETE FROM `d_purchase_plan`;
/*!40000 ALTER TABLE `d_purchase_plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchase_plan` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasing
CREATE TABLE IF NOT EXISTS `d_purchasing` (
  `d_pcs_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcsp_id` int(11) NOT NULL COMMENT 'PURCHASING PLAN',
  `s_id` int(11) NOT NULL COMMENT 'SUPPLIER',
  `d_pcs_code` varchar(15) NOT NULL,
  `d_pcs_staff` varchar(15) NOT NULL COMMENT 'DIABAIKAN SEMENTARA',
  `d_pcs_method` varchar(7) NOT NULL COMMENT 'METODE BAYAR',
  `d_pcs_total_gross` decimal(20,2) DEFAULT '0.00',
  `d_pcs_discount` decimal(20,2) DEFAULT '0.00' COMMENT 'DISKON DALAM RUPIAH',
  `d_pcs_disc_percent` smallint(6) DEFAULT '0' COMMENT 'DISKON PRESENTASE',
  `d_pcs_disc_value` decimal(20,2) DEFAULT '0.00' COMMENT 'KONVERSI HASIL DISKON PRESENTASE',
  `d_pcs_tax_percent` smallint(6) DEFAULT '0' COMMENT 'PAJAK PERSENTASE',
  `d_pcs_tax_value` decimal(20,2) DEFAULT '0.00' COMMENT 'KONVERSI HASIL PAJAK PERSENTASE',
  `d_pcs_total_net` decimal(20,2) DEFAULT '0.00',
  `d_pcs_date_created` date DEFAULT NULL,
  `d_pcs_date_received` date DEFAULT NULL,
  `d_pcs_date_confirm` date DEFAULT NULL,
  `d_pcs_duedate` date DEFAULT NULL COMMENT 'TGL JATUH TEMPO PADA TOP, TGL TERAKHIR PENGIRIMAN PADA DEPOSIT',
  `d_pcs_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: WAITING | CF: CONFIRMED | DE: DAPAT DIEDIT | RC: RECEIVED',
  `d_pcs_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcs_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`d_pcs_id`),
  KEY `FK_d_purchasing_d_supplier` (`s_id`),
  CONSTRAINT `FK_d_purchasing_d_supplier` FOREIGN KEY (`s_id`) REFERENCES `m_supplier` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasing: ~9 rows (approximately)
DELETE FROM `d_purchasing`;
/*!40000 ALTER TABLE `d_purchasing` DISABLE KEYS */;
INSERT INTO `d_purchasing` (`d_pcs_id`, `d_pcsp_id`, `s_id`, `d_pcs_code`, `d_pcs_staff`, `d_pcs_method`, `d_pcs_total_gross`, `d_pcs_discount`, `d_pcs_disc_percent`, `d_pcs_disc_value`, `d_pcs_tax_percent`, `d_pcs_tax_value`, `d_pcs_total_net`, `d_pcs_date_created`, `d_pcs_date_received`, `d_pcs_date_confirm`, `d_pcs_duedate`, `d_pcs_status`, `d_pcs_created`, `d_pcs_updated`) VALUES
	(1, 5, 20, 'PO-061808-00001', 'Jamilah', 'CASH', 100000.00, 0.00, 10, 10000.00, 0, 0.00, 90000.00, '2018-06-08', NULL, '2018-06-10', '2018-05-30', 'CF', '2018-06-08 23:28:31', '2018-06-10 21:29:34'),
	(4, 5, 20, 'PO-061810-00002', 'Jamilah', 'CASH', 457500.00, 0.00, 12, 54900.00, 0, 0.00, 402600.00, '2018-06-10', NULL, NULL, NULL, 'WT', '2018-06-10 01:23:35', '2018-06-10 14:47:04'),
	(10, 2, 20, 'PO-061810-00003', 'Jamilah', 'CASH', 7500.00, 1000.00, 0, 0.00, 0, 0.00, 6500.00, '2018-06-10', NULL, NULL, NULL, 'WT', '2018-06-10 22:00:19', '2018-06-10 22:00:19'),
	(11, 2, 20, 'PO-061810-00004', 'Jamilah', 'CASH', 210000.00, 0.00, 10, 21000.00, 0, 0.00, 189000.00, '2018-06-10', NULL, NULL, NULL, 'WT', '2018-06-10 22:01:05', '2018-06-10 22:01:05'),
	(12, 9, 21, 'PO-061812-00005', 'Jamilah', 'DEPOSIT', 365000.00, 0.00, 10, 36500.00, 0, 0.00, 328500.00, '2018-06-12', NULL, NULL, NULL, 'WT', '2018-06-12 07:22:07', '2018-06-12 07:22:07'),
	(13, 11, 21, 'PO-061821-00006', 'Jamilah', 'CASH', 260000.00, 0.00, 0, 0.00, 0, 0.00, 260000.00, '2018-06-21', NULL, NULL, NULL, 'WT', '2018-06-21 13:34:35', '2018-06-21 13:34:35'),
	(14, 12, 20, 'PO-061822-00007', 'Jamilah', 'CASH', 23100.00, 3000.00, 15, 3465.00, 10, 2310.00, 18298.00, '2018-06-22', NULL, '2018-06-22', '2018-07-02', 'CF', '2018-06-22 14:01:48', '2018-06-22 14:02:33'),
	(15, 13, 21, 'PO-061824-00008', 'Jamilah', 'CASH', 630000.00, 2000.00, 15, 94500.00, 10, 53350.00, 586850.00, '2018-06-24', NULL, '2018-06-26', '2018-07-02', 'CF', '2018-06-24 00:07:50', '2018-06-26 23:00:35'),
	(17, 15, 21, 'PO-061826-00009', 'Jamilah', 'CASH', 99500.00, 4525.00, 5, 4975.00, 0, 0.00, 90000.00, '2018-06-26', NULL, '2018-06-26', '2018-07-02', 'CF', '2018-06-26 23:07:55', '2018-06-26 23:08:18');
/*!40000 ALTER TABLE `d_purchasing` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingharian
CREATE TABLE IF NOT EXISTS `d_purchasingharian` (
  `d_pcsh_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcsh_code` varchar(15) NOT NULL,
  `d_pcsh_date` date NOT NULL,
  `d_pcsh_noreff` varchar(15) DEFAULT NULL,
  `d_pcsh_totalprice` decimal(20,2) DEFAULT NULL,
  `d_pcsh_totalpaid` decimal(20,2) DEFAULT NULL,
  `d_pcsh_staff` varchar(50) NOT NULL,
  `d_pcsh_supid` int(11) NOT NULL COMMENT 'ID SUPPLIER (d_supplier)',
  `d_pcsh_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: Waiting | DE: Dapat Diedit | CF: Confirmed',
  `d_pcsh_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcsh_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`d_pcsh_id`),
  KEY `FK_d_purchasingharian_d_supplier` (`d_pcsh_supid`),
  CONSTRAINT `FK_d_purchasingharian_d_supplier` FOREIGN KEY (`d_pcsh_supid`) REFERENCES `m_supplier` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingharian: ~0 rows (approximately)
DELETE FROM `d_purchasingharian`;
/*!40000 ALTER TABLE `d_purchasingharian` DISABLE KEYS */;
INSERT INTO `d_purchasingharian` (`d_pcsh_id`, `d_pcsh_code`, `d_pcsh_date`, `d_pcsh_noreff`, `d_pcsh_totalprice`, `d_pcsh_totalpaid`, `d_pcsh_staff`, `d_pcsh_supid`, `d_pcsh_status`, `d_pcsh_created`, `d_pcsh_updated`) VALUES
	(2, 'PH-061812-00001', '2018-06-11', 'ABC-112233', 211000.00, 211000.00, 'Jamilah', 21, 'WT', '2018-06-12 01:54:07', '2018-06-12 01:54:07');
/*!40000 ALTER TABLE `d_purchasingharian` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingharian_dt
CREATE TABLE IF NOT EXISTS `d_purchasingharian_dt` (
  `d_pcshdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcshdt_pcshid` int(11) NOT NULL,
  `d_pcshdt_item` int(11) NOT NULL,
  `d_pcshdt_qty` int(11) NOT NULL DEFAULT '0',
  `d_pcshdt_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `d_pcshdt_pricetotal` decimal(12,2) NOT NULL DEFAULT '0.00',
  `d_pcshdt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcshdt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`d_pcshdt_id`),
  KEY `FK_d_purchasingharian_dt_d_purchasingharian` (`d_pcshdt_pcshid`),
  KEY `FK_d_purchasingharian_dt_m_item` (`d_pcshdt_item`),
  CONSTRAINT `FK_d_purchasingharian_dt_d_purchasingharian` FOREIGN KEY (`d_pcshdt_pcshid`) REFERENCES `d_purchasingharian` (`d_pcsh_id`),
  CONSTRAINT `FK_d_purchasingharian_dt_m_item` FOREIGN KEY (`d_pcshdt_item`) REFERENCES `m_item` (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingharian_dt: ~0 rows (approximately)
DELETE FROM `d_purchasingharian_dt`;
/*!40000 ALTER TABLE `d_purchasingharian_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchasingharian_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingplan
CREATE TABLE IF NOT EXISTS `d_purchasingplan` (
  `d_pcsp_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcsp_code` varchar(15) NOT NULL,
  `d_pcsp_sup` int(11) NOT NULL,
  `d_pcsp_staff` varchar(15) NOT NULL COMMENT 'SEMENTARA',
  `d_pcsp_datecreated` date DEFAULT NULL,
  `d_pcsp_dateconfirm` date DEFAULT NULL,
  `d_pcsp_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: waiting | DE: dapat diedit | FN: disetujui',
  `d_pcsp_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcsp_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_pcsp_id`),
  KEY `FK_d_purchasingplan_d_supplier` (`d_pcsp_sup`),
  CONSTRAINT `FK_d_purchasingplan_d_supplier` FOREIGN KEY (`d_pcsp_sup`) REFERENCES `m_supplier` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingplan: ~11 rows (approximately)
DELETE FROM `d_purchasingplan`;
/*!40000 ALTER TABLE `d_purchasingplan` DISABLE KEYS */;
INSERT INTO `d_purchasingplan` (`d_pcsp_id`, `d_pcsp_code`, `d_pcsp_sup`, `d_pcsp_staff`, `d_pcsp_datecreated`, `d_pcsp_dateconfirm`, `d_pcsp_status`, `d_pcsp_created`, `d_pcsp_updated`) VALUES
	(1, 'ROR-061803-0001', 20, 'Jamilah', '2018-06-03', NULL, 'WT', '2018-06-03 18:47:34', '2018-06-06 21:10:53'),
	(2, 'ROR-061803-0002', 20, 'Jamilah', '2018-06-03', '2018-06-10', 'FN', '2018-06-03 18:48:33', '2018-06-10 17:12:38'),
	(3, 'ROR-061805-0003', 20, 'Jamilah', '2018-06-05', NULL, 'WT', '2018-06-05 15:29:19', '2018-06-05 19:28:30'),
	(5, 'ROR-061805-0004', 20, 'Jamilah', '2018-06-05', '2018-06-08', 'FN', '2018-06-05 15:53:42', '2018-06-08 02:19:40'),
	(9, 'ROR-061806-0005', 20, 'Jamilah', '2018-06-06', '2018-06-07', 'FN', '2018-06-06 22:00:56', '2018-06-07 10:06:24'),
	(10, 'ROR-061812-0006', 20, 'Jamilah', '2018-06-12', NULL, 'WT', '2018-06-12 07:21:17', '2018-06-12 07:21:17'),
	(11, 'ROR-061821-0007', 21, 'Jamilah', '2018-06-21', '2018-06-21', 'FN', '2018-06-21 13:28:29', '2018-06-21 13:30:03'),
	(12, 'ROR-061822-0008', 20, 'Jamilah', '2018-06-22', '2018-06-22', 'FN', '2018-06-22 10:40:00', '2018-06-22 10:40:53'),
	(13, 'ROR-061823-0009', 21, 'Jamilah', '2018-06-23', '2018-06-23', 'FN', '2018-06-23 23:25:30', '2018-06-23 23:27:09'),
	(14, 'ROR-061825-0010', 20, 'Jamilah', '2018-06-25', '2018-06-25', 'FN', '2018-06-25 11:10:58', '2018-06-25 11:11:22'),
	(15, 'ROR-061826-0011', 21, 'Jamilah', '2018-06-26', '2018-06-26', 'FN', '2018-06-26 22:01:24', '2018-06-26 23:02:31');
/*!40000 ALTER TABLE `d_purchasingplan` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingplan_dt
CREATE TABLE IF NOT EXISTS `d_purchasingplan_dt` (
  `d_pcspdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcspdt_idplan` int(11) NOT NULL DEFAULT '0',
  `d_pcspdt_item` int(11) NOT NULL DEFAULT '0',
  `d_pcspdt_qty` int(11) NOT NULL DEFAULT '0',
  `d_pcspdt_prevcost` decimal(10,2) NOT NULL DEFAULT '0.00',
  `d_pcspdt_qtyconfirm` int(11) NOT NULL DEFAULT '0',
  `d_pcspdt_isconfirm` varchar(5) NOT NULL DEFAULT 'FALSE' COMMENT 'IS CONFIRM ?',
  `d_pcspdt_ispo` varchar(5) NOT NULL DEFAULT 'FALSE' COMMENT 'IS PO ?',
  `d_pcspdt_poid` int(11) NOT NULL DEFAULT '0' COMMENT 'ID PURCHASING',
  `d_pcspdt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcspdt_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_pcspdt_id`),
  KEY `FK_d_purchasingplan_dt_d_purchasingplan` (`d_pcspdt_idplan`),
  CONSTRAINT `FK_d_purchasingplan_dt_d_purchasingplan` FOREIGN KEY (`d_pcspdt_idplan`) REFERENCES `d_purchasingplan` (`d_pcsp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingplan_dt: ~0 rows (approximately)
DELETE FROM `d_purchasingplan_dt`;
/*!40000 ALTER TABLE `d_purchasingplan_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchasingplan_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingreturn
CREATE TABLE IF NOT EXISTS `d_purchasingreturn` (
  `d_pcsr_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcsr_pcsid` int(11) NOT NULL COMMENT 'id_purchashing (d_purchasing)',
  `d_pcsr_supid` int(11) NOT NULL COMMENT 'id_supplier (d_supplier)',
  `d_pcsr_code` varchar(15) NOT NULL,
  `d_pcsr_method` varchar(2) NOT NULL COMMENT 'TK : TUKAR BARANG | PN: POTONG NOTA',
  `d_pcs_staff` varchar(50) NOT NULL COMMENT 'Sementara (blm ada data karyawan)',
  `d_pcsr_datecreated` date NOT NULL,
  `d_pcsr_dateupdated` date DEFAULT NULL,
  `d_pcsr_dateconfirm` date DEFAULT NULL,
  `d_pcsr_pricetotal` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'Nilai total dari barang yang diretur',
  `d_pcsr_priceresult` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT 'apablia method: PN maka nilai didapat dari total pembelian - nilai total retur | jika TK maka nilai ini akan sama dengan nilai total pembelian (nilai transaksi pembelian seteleh dikurangi return)',
  `d_pcsr_status` varchar(2) NOT NULL DEFAULT 'WT' COMMENT 'WT: Waiting | CF: Confirmed | DE: Dapat diedit',
  `d_pcsr_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcsr_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`d_pcsr_id`),
  KEY `FK_d_purchasingreturn_d_supplier` (`d_pcsr_supid`),
  KEY `FK_d_purchasingreturn_d_purchasing` (`d_pcsr_pcsid`),
  CONSTRAINT `FK_d_purchasingreturn_d_purchasing` FOREIGN KEY (`d_pcsr_pcsid`) REFERENCES `d_purchasing` (`d_pcs_id`),
  CONSTRAINT `FK_d_purchasingreturn_d_supplier` FOREIGN KEY (`d_pcsr_supid`) REFERENCES `m_supplier` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingreturn: ~0 rows (approximately)
DELETE FROM `d_purchasingreturn`;
/*!40000 ALTER TABLE `d_purchasingreturn` DISABLE KEYS */;
INSERT INTO `d_purchasingreturn` (`d_pcsr_id`, `d_pcsr_pcsid`, `d_pcsr_supid`, `d_pcsr_code`, `d_pcsr_method`, `d_pcs_staff`, `d_pcsr_datecreated`, `d_pcsr_dateupdated`, `d_pcsr_dateconfirm`, `d_pcsr_pricetotal`, `d_pcsr_priceresult`, `d_pcsr_status`, `d_pcsr_created`, `d_pcsr_updated`) VALUES
	(2, 15, 21, 'RTN-061825-0001', 'PN', 'Jamilah', '2018-06-25', '2018-06-28', '2018-07-01', 119233.00, 586850.00, 'CF', '2018-06-25 21:55:30', '2018-07-01 17:11:20');
/*!40000 ALTER TABLE `d_purchasingreturn` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasingreturn_dt
CREATE TABLE IF NOT EXISTS `d_purchasingreturn_dt` (
  `d_pcsrdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcsrdt_idpcsr` int(11) NOT NULL,
  `d_pcsrdt_smdetail` int(11) NOT NULL COMMENT 'd_stock_mutation (sm_detailid)',
  `d_pcsrdt_item` int(11) NOT NULL,
  `d_pcsrdt_qty` int(11) NOT NULL,
  `d_pcsrdt_qtyconfirm` int(11) NOT NULL DEFAULT '0',
  `d_pcsrdt_price` int(11) NOT NULL,
  `d_pcsrdt_pricetotal` int(11) NOT NULL,
  `d_pcsrdt_isconfirm` varchar(5) NOT NULL DEFAULT 'FALSE',
  `d_pcsrdt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcsrdt_updated` datetime NOT NULL,
  PRIMARY KEY (`d_pcsrdt_id`),
  KEY `FK_d_purchasingreturn_dt_d_purchasingreturn` (`d_pcsrdt_idpcsr`),
  KEY `FK_d_purchasingreturn_dt_m_item` (`d_pcsrdt_item`),
  CONSTRAINT `FK_d_purchasingreturn_dt_d_purchasingreturn` FOREIGN KEY (`d_pcsrdt_idpcsr`) REFERENCES `d_purchasingreturn` (`d_pcsr_id`),
  CONSTRAINT `FK_d_purchasingreturn_dt_m_item` FOREIGN KEY (`d_pcsrdt_item`) REFERENCES `m_item` (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasingreturn_dt: ~0 rows (approximately)
DELETE FROM `d_purchasingreturn_dt`;
/*!40000 ALTER TABLE `d_purchasingreturn_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchasingreturn_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_purchasing_dt
CREATE TABLE IF NOT EXISTS `d_purchasing_dt` (
  `d_pcsdt_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_pcs_id` int(11) NOT NULL COMMENT 'ID PURCHASING (d_pcs_id)',
  `i_id` int(11) NOT NULL COMMENT 'ID ITEM (m_item)',
  `d_pcsdt_idpdt` int(11) NOT NULL COMMENT 'ID PURCHASINGPLAN DETAIL (d_pcspdt_id)',
  `d_pcsdt_qty` int(11) NOT NULL DEFAULT '0',
  `d_pcsdt_qtyconfirm` int(11) NOT NULL DEFAULT '0',
  `d_pcsdt_price` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'HARGA SATUAN',
  `d_pcsdt_prevcost` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT 'HARGA PEMBELIAN TERAKHIR',
  `d_pcsdt_total` decimal(20,2) unsigned DEFAULT '0.00' COMMENT 'HARGA TOTAL',
  `d_pcsdt_isconfirm` varchar(5) DEFAULT 'FALSE' COMMENT 'IS CONFIRM ?',
  `d_pcsdt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `d_pcsdt_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`d_pcsdt_id`),
  KEY `FK_d_purchasing_dt_d_purchasing` (`d_pcs_id`),
  KEY `FK_d_purchasing_dt_d_purchasingplan_dt` (`d_pcsdt_idpdt`),
  KEY `FK_d_purchasing_dt_m_item` (`i_id`),
  CONSTRAINT `FK_d_purchasing_dt_d_purchasing` FOREIGN KEY (`d_pcs_id`) REFERENCES `d_purchasing` (`d_pcs_id`),
  CONSTRAINT `FK_d_purchasing_dt_d_purchasingplan_dt` FOREIGN KEY (`d_pcsdt_idpdt`) REFERENCES `d_purchasingplan_dt` (`d_pcspdt_id`),
  CONSTRAINT `FK_d_purchasing_dt_m_item` FOREIGN KEY (`i_id`) REFERENCES `m_item` (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_purchasing_dt: ~0 rows (approximately)
DELETE FROM `d_purchasing_dt`;
/*!40000 ALTER TABLE `d_purchasing_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_purchasing_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_sales
CREATE TABLE IF NOT EXISTS `d_sales` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_comp` int(11) NOT NULL DEFAULT '0',
  `s_channel` varchar(10) NOT NULL COMMENT 'RT: Retail | GR: Grosir',
  `s_jenis_bayar` char(1) DEFAULT NULL COMMENT '1:Tunai | 2:Tempo',
  `s_date` date DEFAULT NULL,
  `s_finishdate` date DEFAULT NULL,
  `s_duedate` date DEFAULT NULL,
  `s_note` varchar(40) DEFAULT NULL,
  `s_kasir` varchar(40) DEFAULT NULL,
  `s_machine` varchar(40) DEFAULT NULL,
  `s_create_by` varchar(10) DEFAULT NULL COMMENT 'DIABAIKAN SEMENTARA',
  `s_update_by` varchar(10) DEFAULT NULL,
  `s_customer` int(11) DEFAULT NULL,
  `s_nama_cus` varchar(30) DEFAULT NULL,
  `s_alamat_cus` varchar(30) DEFAULT NULL,
  `s_gross` decimal(20,2) DEFAULT NULL,
  `s_disc_percent` decimal(10,2) DEFAULT NULL,
  `s_disc_value` decimal(20,2) unsigned DEFAULT NULL,
  `s_tax` smallint(6) NOT NULL DEFAULT '0',
  `s_ongkir` decimal(10,2) NOT NULL DEFAULT '0.00',
  `s_bulat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `s_net` decimal(20,2) DEFAULT NULL,
  `s_bayar` decimal(20,2) DEFAULT NULL,
  `s_kembalian` decimal(20,2) DEFAULT NULL,
  `s_jurnal` decimal(20,2) DEFAULT NULL,
  `s_status` varchar(10) DEFAULT NULL COMMENT 'DR: Draft | WA: Waiting | PR: Progress | FN: Final | PC: PACKING | SN : Sending | RC : Received',
  `s_insert` timestamp NULL DEFAULT NULL,
  `s_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `s_note` (`s_note`),
  KEY `FK_sales_customer` (`s_customer`),
  KEY `FK_d_sales_m_comp` (`s_comp`),
  CONSTRAINT `FK_d_sales_m_comp` FOREIGN KEY (`s_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales: ~0 rows (approximately)
DELETE FROM `d_sales`;
/*!40000 ALTER TABLE `d_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_sales` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_sales_dt
CREATE TABLE IF NOT EXISTS `d_sales_dt` (
  `sd_sales` int(11) NOT NULL,
  `sd_detailid` tinyint(4) NOT NULL,
  `sd_date` date NOT NULL,
  `sd_comp` int(11) NOT NULL,
  `sd_position` int(11) NOT NULL,
  `sd_item` int(11) NOT NULL,
  `sd_qty` double NOT NULL,
  `sd_price` decimal(10,0) DEFAULT NULL,
  `sd_disc_percent` smallint(6) DEFAULT '0',
  `sd_disc_percentvalue` decimal(10,2) DEFAULT '0.00',
  `sd_disc_value` decimal(20,2) unsigned DEFAULT NULL,
  `sd_total_disc` decimal(20,2) DEFAULT NULL,
  `sd_total` decimal(20,2) DEFAULT NULL,
  PRIMARY KEY (`sd_sales`,`sd_detailid`),
  KEY `FK_d_sales_dt_m_comp` (`sd_comp`),
  CONSTRAINT `FK_d_sales_dt_d_sales` FOREIGN KEY (`sd_sales`) REFERENCES `d_sales` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_d_sales_dt_m_comp` FOREIGN KEY (`sd_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales_dt: ~0 rows (approximately)
DELETE FROM `d_sales_dt`;
/*!40000 ALTER TABLE `d_sales_dt` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_sales_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_sales_payment
CREATE TABLE IF NOT EXISTS `d_sales_payment` (
  `sp_sales` int(11) NOT NULL,
  `sp_paymentid` tinyint(4) NOT NULL,
  `sp_date` date DEFAULT NULL,
  `sp_comp` int(11) NOT NULL,
  `sp_method` tinyint(4) NOT NULL,
  `sp_nominal` decimal(15,2) NOT NULL,
  PRIMARY KEY (`sp_sales`,`sp_paymentid`),
  KEY `FK_d_sales_payment_m_comp` (`sp_comp`),
  CONSTRAINT `FK1_sales_payment` FOREIGN KEY (`sp_sales`) REFERENCES `d_sales` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_d_sales_payment_m_comp` FOREIGN KEY (`sp_comp`) REFERENCES `m_comp` (`c_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_sales_payment: ~0 rows (approximately)
DELETE FROM `d_sales_payment`;
/*!40000 ALTER TABLE `d_sales_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_sales_payment` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_spk
CREATE TABLE IF NOT EXISTS `d_spk` (
  `spk_id` int(11) NOT NULL,
  `spk_ref` int(11) DEFAULT NULL COMMENT 'id_panning',
  `spk_code` varchar(20) DEFAULT NULL,
  `spk_date` date DEFAULT NULL,
  `spk_item` int(11) DEFAULT NULL,
  `spk_status` varchar(2) DEFAULT NULL,
  `spk_insert` datetime DEFAULT NULL,
  `spk_update` datetime DEFAULT NULL,
  PRIMARY KEY (`spk_id`),
  KEY `FK_d_spk_d_productplan` (`spk_ref`),
  CONSTRAINT `FK_d_spk_d_productplan` FOREIGN KEY (`spk_ref`) REFERENCES `d_productplan` (`pp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_spk: ~2 rows (approximately)
DELETE FROM `d_spk`;
/*!40000 ALTER TABLE `d_spk` DISABLE KEYS */;
INSERT INTO `d_spk` (`spk_id`, `spk_ref`, `spk_code`, `spk_date`, `spk_item`, `spk_status`, `spk_insert`, `spk_update`) VALUES
	(1, 14, 'SPK1806101', '2018-06-10', 326, 'CL', '2018-06-10 18:09:24', '2018-06-24 20:09:55'),
	(2, 14, 'SPK1806102', '2018-06-10', 326, 'FN', '2018-06-10 18:13:21', '2018-06-10 18:13:21');
/*!40000 ALTER TABLE `d_spk` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_stock
CREATE TABLE IF NOT EXISTS `d_stock` (
  `s_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `s_comp` int(11) NOT NULL COMMENT 'PEMILIK',
  `s_position` int(11) NOT NULL COMMENT 'POSISI',
  `s_item` int(11) DEFAULT NULL,
  `s_qty` decimal(10,2) DEFAULT NULL,
  `s_qty_min` decimal(10,2) DEFAULT '0.00' COMMENT 'STOK MINIMUM',
  `s_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `s_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`),
  KEY `FK_d_stock_d_gudangcabang` (`s_comp`),
  KEY `FK_d_stock_d_gudangcabang_2` (`s_position`),
  CONSTRAINT `FK_d_stock_d_gudangcabang` FOREIGN KEY (`s_comp`) REFERENCES `d_gudangcabang` (`gc_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_d_stock_d_gudangcabang_2` FOREIGN KEY (`s_position`) REFERENCES `d_gudangcabang` (`gc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_stock: ~5 rows (approximately)
DELETE FROM `d_stock`;
/*!40000 ALTER TABLE `d_stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_stock` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_stock_mutation
CREATE TABLE IF NOT EXISTS `d_stock_mutation` (
  `sm_stock` bigint(20) NOT NULL,
  `sm_detailid` tinyint(4) NOT NULL,
  `sm_date` date DEFAULT NULL,
  `sm_comp` int(11) DEFAULT NULL COMMENT '1: G. Bahan Baku | 2:G.Produksi |3: G.Grosir | 11: G. Retail',
  `sm_position` int(11) DEFAULT NULL,
  `sm_mutcat` tinyint(4) DEFAULT NULL,
  `sm_item` int(11) DEFAULT NULL,
  `sm_qty` decimal(10,2) DEFAULT NULL,
  `sm_qty_used` decimal(10,2) DEFAULT NULL,
  `sm_qty_sisa` decimal(10,2) DEFAULT NULL,
  `sm_qty_expired` decimal(10,2) DEFAULT NULL,
  `sm_detail` varchar(255) DEFAULT NULL,
  `sm_keterangan` varchar(255) DEFAULT NULL,
  `sm_hpp` decimal(10,2) DEFAULT NULL,
  `sm_sell` decimal(10,2) DEFAULT NULL,
  `sm_reff` varchar(50) DEFAULT NULL,
  `sm_insert` datetime DEFAULT NULL,
  `sm_update` datetime DEFAULT NULL,
  PRIMARY KEY (`sm_detailid`,`sm_stock`),
  KEY `FK_d_stock_mutation_d_gudangcabang` (`sm_comp`),
  KEY `FK_d_stock_mutation_d_stock` (`sm_stock`),
  KEY `FK_d_stock_mutation_d_stock_mutcat` (`sm_mutcat`),
  CONSTRAINT `FK_d_stock_mutation_d_stock` FOREIGN KEY (`sm_stock`) REFERENCES `d_stock` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_d_stock_mutation_d_stock_mutcat` FOREIGN KEY (`sm_mutcat`) REFERENCES `d_stock_mutcat` (`smc_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table bisnis_tamma.d_stock_mutation: ~8 rows (approximately)
DELETE FROM `d_stock_mutation`;
/*!40000 ALTER TABLE `d_stock_mutation` DISABLE KEYS */;
/*!40000 ALTER TABLE `d_stock_mutation` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_stock_mutcat
CREATE TABLE IF NOT EXISTS `d_stock_mutcat` (
  `smc_id` tinyint(4) NOT NULL,
  `smc_note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`smc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_stock_mutcat: ~13 rows (approximately)
DELETE FROM `d_stock_mutcat`;
/*!40000 ALTER TABLE `d_stock_mutcat` DISABLE KEYS */;
INSERT INTO `d_stock_mutcat` (`smc_id`, `smc_note`) VALUES
	(1, 'penjualan Toko'),
	(2, 'Penjualan Pesanan'),
	(3, 'Hasil Produksi'),
	(4, 'Bahan Baku Rusak'),
	(5, 'Bahan Baku Hilang'),
	(6, 'menambah opname '),
	(7, 'mengurangi opname '),
	(8, 'barang expired'),
	(9, 'penambahan stock'),
	(10, 'pengurangan stock'),
	(11, 'TRANSFER GROSIR'),
	(12, 'BARANG TITIP'),
	(13, 'BARANG TITIPAN');
/*!40000 ALTER TABLE `d_stock_mutcat` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_transferitem
CREATE TABLE IF NOT EXISTS `d_transferitem` (
  `ti_id` int(11) NOT NULL AUTO_INCREMENT,
  `ti_time` datetime DEFAULT NULL,
  `ti_code` varchar(20) DEFAULT NULL,
  `ti_order` varchar(2) NOT NULL COMMENT 'RT: Retail | GR: Grosir',
  `ti_orderstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `ti_note` varchar(100) DEFAULT NULL,
  `ti_isapproved` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_issent` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_isreceived` enum('Y','N') NOT NULL DEFAULT 'N',
  `ti_insert` timestamp NULL DEFAULT NULL,
  `ti_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_transferitem: ~13 rows (approximately)
DELETE FROM `d_transferitem`;
/*!40000 ALTER TABLE `d_transferitem` DISABLE KEYS */;
INSERT INTO `d_transferitem` (`ti_id`, `ti_time`, `ti_code`, `ti_order`, `ti_orderstaff`, `ti_note`, `ti_isapproved`, `ti_issent`, `ti_isreceived`, `ti_insert`, `ti_update`) VALUES
	(1, '2018-04-17 00:00:00', 'REQ1804171', 'RT', NULL, 'js', 'Y', 'Y', 'Y', '2018-04-17 10:15:07', '2018-04-17 11:34:02'),
	(2, '2018-04-30 00:00:00', 'REQ1804302', 'RT', NULL, 'aku minta', 'N', 'N', 'N', '2018-04-30 00:10:14', '2018-04-30 00:10:14'),
	(3, '2018-05-27 00:00:00', 'REQ1805273', 'RT', NULL, 'aku jaluk', 'Y', 'Y', 'Y', '2018-05-27 11:40:47', '2018-05-27 11:41:19'),
	(4, '2018-05-31 00:00:00', 'REQ1805314', 'GR', NULL, NULL, 'Y', 'Y', 'N', '2018-05-31 04:07:49', '2018-05-31 04:07:49'),
	(5, '2018-05-31 00:00:00', 'REQ1805315', 'GR', NULL, NULL, 'Y', 'Y', 'N', '2018-05-31 04:08:19', '2018-05-31 04:08:19'),
	(6, '2018-05-31 00:00:00', 'REQ1805316', 'GR', NULL, NULL, 'Y', 'Y', 'N', '2018-05-31 04:14:51', '2018-05-31 04:14:51'),
	(7, '2018-06-06 00:00:00', 'REQ1806067', 'RT', NULL, 'minta 1', 'Y', 'Y', 'Y', '2018-06-06 06:04:34', '2018-06-06 16:49:28'),
	(8, '2018-06-06 00:00:00', 'REQ1806068', 'RT', NULL, NULL, 'Y', 'Y', 'Y', '2018-06-06 16:53:34', '2018-06-06 16:54:19'),
	(9, '2018-06-07 00:00:00', 'REQ1806079', 'GR', NULL, NULL, 'Y', 'Y', 'Y', '2018-06-07 10:23:13', '2018-06-07 11:08:52'),
	(10, '2018-06-08 00:00:00', 'REQ18060810', 'GR', NULL, 'kirim', 'Y', 'Y', 'Y', '2018-06-08 13:18:22', '2018-06-08 14:09:14'),
	(11, '2018-06-08 00:00:00', 'REQ18060811', 'GR', NULL, 'tt', 'Y', 'Y', 'Y', '2018-06-08 14:12:29', '2018-06-08 14:13:09'),
	(12, '2018-06-08 00:00:00', 'REQ18060812', 'GR', NULL, NULL, 'Y', 'Y', 'Y', '2018-06-08 14:15:23', '2018-06-08 14:15:48'),
	(13, '2018-06-08 00:00:00', 'REQ18060813', 'GR', NULL, NULL, 'Y', 'Y', 'Y', '2018-06-08 14:30:26', '2018-06-08 14:33:33');
/*!40000 ALTER TABLE `d_transferitem` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.d_transferitem_dt
CREATE TABLE IF NOT EXISTS `d_transferitem_dt` (
  `tidt_id` int(11) NOT NULL,
  `tidt_detail` tinyint(4) NOT NULL,
  `tidt_item` int(11) DEFAULT NULL,
  `tidt_qty` decimal(10,0) DEFAULT NULL,
  `tidt_qty_appr` decimal(10,0) DEFAULT NULL,
  `tidt_apprtime` datetime DEFAULT NULL,
  `tidt_apprstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `tidt_qty_send` decimal(10,0) DEFAULT NULL,
  `tidt_sendtime` datetime DEFAULT NULL,
  `tidt_sendstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  `tidt_qty_received` decimal(10,0) DEFAULT NULL,
  `tidt_receivedtime` datetime DEFAULT NULL,
  `tidt_receivedstaff` int(10) DEFAULT NULL COMMENT 'TEMPORARY DIABAIKAN',
  PRIMARY KEY (`tidt_id`,`tidt_detail`),
  CONSTRAINT `FK_d_request_dt_d_request_item` FOREIGN KEY (`tidt_id`) REFERENCES `d_transferitem` (`ti_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.d_transferitem_dt: ~17 rows (approximately)
DELETE FROM `d_transferitem_dt`;
/*!40000 ALTER TABLE `d_transferitem_dt` DISABLE KEYS */;
INSERT INTO `d_transferitem_dt` (`tidt_id`, `tidt_detail`, `tidt_item`, `tidt_qty`, `tidt_qty_appr`, `tidt_apprtime`, `tidt_apprstaff`, `tidt_qty_send`, `tidt_sendtime`, `tidt_sendstaff`, `tidt_qty_received`, `tidt_receivedtime`, `tidt_receivedstaff`) VALUES
	(1, 1, 176, 56, 5, '2018-04-17 11:28:55', NULL, 5, '2018-04-17 11:28:55', NULL, 3, '2018-04-17 11:34:02', NULL),
	(2, 1, 173, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 1, 207, 5, 5, '2018-05-27 11:40:59', NULL, 5, '2018-05-27 11:40:59', NULL, 5, '2018-05-27 11:41:19', NULL),
	(4, 1, 320, 4, 4, '2018-05-31 04:07:49', NULL, 4, '2018-05-31 04:07:49', NULL, NULL, NULL, NULL),
	(5, 1, 320, 4, 4, '2018-05-31 04:08:19', NULL, 4, '2018-05-31 04:08:19', NULL, NULL, NULL, NULL),
	(6, 1, 320, 3, 3, '2018-05-31 04:14:51', NULL, 3, '2018-05-31 04:14:51', NULL, NULL, NULL, NULL),
	(7, 1, 161, 10, 10, '2018-06-06 06:05:19', NULL, 10, '2018-06-06 06:05:19', NULL, 10, '2018-06-06 04:27:34', NULL),
	(7, 2, 166, 10, 10, '2018-06-06 06:05:19', NULL, 10, '2018-06-06 06:05:19', NULL, 10, '2018-06-06 04:27:34', NULL),
	(8, 1, 161, 5, 5, '2018-06-06 04:53:48', NULL, 5, '2018-06-06 04:53:48', NULL, NULL, NULL, NULL),
	(8, 2, 166, 5, 5, '2018-06-06 04:53:48', NULL, 5, '2018-06-06 04:53:48', NULL, NULL, NULL, NULL),
	(9, 1, 161, 10, 10, '2018-06-07 10:23:13', NULL, 10, '2018-06-07 10:23:13', NULL, NULL, NULL, NULL),
	(9, 2, 166, 10, 10, '2018-06-07 10:23:13', NULL, 10, '2018-06-07 10:23:13', NULL, NULL, NULL, NULL),
	(10, 1, 207, 5, 5, '2018-06-08 01:18:22', NULL, 5, '2018-06-08 01:18:22', NULL, NULL, NULL, NULL),
	(11, 1, 166, 5, 5, '2018-06-08 02:12:29', NULL, 5, '2018-06-08 02:12:29', NULL, NULL, NULL, NULL),
	(11, 2, 207, 5, 5, '2018-06-08 02:12:29', NULL, 5, '2018-06-08 02:12:29', NULL, NULL, NULL, NULL),
	(12, 1, 166, 5, 5, '2018-06-08 02:15:23', NULL, 5, '2018-06-08 02:15:23', NULL, NULL, NULL, NULL),
	(13, 1, 563, 20, 20, '2018-06-08 02:30:26', NULL, 20, '2018-06-08 02:30:26', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `d_transferitem_dt` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.migrations: 110 rows
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1),
	('2018_02_12_091908_create_customer_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_acces_gudangitem
CREATE TABLE IF NOT EXISTS `m_acces_gudangitem` (
  `ag_id` int(11) NOT NULL AUTO_INCREMENT,
  `ag_gudang` varchar(50) DEFAULT NULL,
  `ag_fitur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_acces_gudangitem: ~2 rows (approximately)
DELETE FROM `m_acces_gudangitem`;
/*!40000 ALTER TABLE `m_acces_gudangitem` DISABLE KEYS */;
INSERT INTO `m_acces_gudangitem` (`ag_id`, `ag_gudang`, `ag_fitur`) VALUES
	(1, '1', 'Penjualan'),
	(2, '4,5', 'Pembelian');
/*!40000 ALTER TABLE `m_acces_gudangitem` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_cabang
CREATE TABLE IF NOT EXISTS `m_cabang` (
  `c_id` varchar(3) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_insert` datetime DEFAULT NULL,
  `c_update` datetime DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_cabang: ~10 rows (approximately)
DELETE FROM `m_cabang`;
/*!40000 ALTER TABLE `m_cabang` DISABLE KEYS */;
INSERT INTO `m_cabang` (`c_id`, `c_name`, `c_insert`, `c_update`) VALUES
	('GB1', 'GUDANG BAHANBAKU 1', '2018-05-02 14:38:18', '2018-05-02 14:38:16'),
	('GB2', 'GUDANG BAHANBAKU 2', '2018-05-02 14:43:32', '2018-05-02 14:43:33'),
	('GC', 'GUDANG CUSTOMER', '2018-05-02 14:35:46', '2018-05-02 14:35:48'),
	('GG1', 'GUDANG GROSIR 1', '2018-05-02 14:14:33', '2018-05-02 14:14:40'),
	('GG2', 'GUDANG  GROSIR 2', '2018-05-02 14:14:34', '2018-05-02 14:14:39'),
	('GP1', 'GUDANG  PRODUKSI 1', '2018-05-02 14:14:34', '2018-05-02 14:14:36'),
	('GP2', 'GUDANG  PRODUKSI 2', '2018-05-02 14:14:35', '2018-05-02 14:14:38'),
	('GR1', 'GUDANG  RETAIL 1', '2018-05-02 14:11:26', '2018-05-02 14:11:27'),
	('GR2', 'GUDANG  RETAIL 2', '2018-05-02 14:14:32', '2018-05-02 14:14:41'),
	('GS', 'GUDANG SENDING', '2018-05-02 14:38:14', '2018-05-02 14:38:15');
/*!40000 ALTER TABLE `m_cabang` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_comp
CREATE TABLE IF NOT EXISTS `m_comp` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_code` varchar(50) DEFAULT '0',
  `c_owner` varchar(10) DEFAULT NULL,
  `c_name` varchar(40) DEFAULT NULL,
  `c_address` varchar(40) DEFAULT NULL,
  `c_type` tinyint(4) DEFAULT NULL,
  `c_control` varchar(1) DEFAULT NULL,
  `c_insert` timestamp NULL DEFAULT NULL,
  `c_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_comp: ~2 rows (approximately)
DELETE FROM `m_comp`;
/*!40000 ALTER TABLE `m_comp` DISABLE KEYS */;
INSERT INTO `m_comp` (`c_id`, `c_code`, `c_owner`, `c_name`, `c_address`, `c_type`, `c_control`, `c_insert`, `c_update`) VALUES
	(1, 'A01', 'Ponorogo', 'Ponorogo', 'Ponorogo', NULL, NULL, NULL, '2018-09-06 18:41:17'),
	(2, 'A02', 'Ponorogo', 'xxx', 'Ponorogo', NULL, NULL, NULL, '2018-09-24 10:45:27');
/*!40000 ALTER TABLE `m_comp` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_customer
CREATE TABLE IF NOT EXISTS `m_customer` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `c_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `c_birthday` date DEFAULT NULL,
  `c_email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_hp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_address` text COLLATE utf8_unicode_ci,
  `c_class` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'A | B | C',
  `c_type` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'RT: Retail | GR: Grosir',
  `c_insert` timestamp NULL DEFAULT NULL,
  `c_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_code` (`c_code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.m_customer: ~6 rows (approximately)
DELETE FROM `m_customer`;
/*!40000 ALTER TABLE `m_customer` DISABLE KEYS */;
INSERT INTO `m_customer` (`c_id`, `c_code`, `c_name`, `c_birthday`, `c_email`, `c_hp`, `c_address`, `c_class`, `c_type`, `c_insert`, `c_update`) VALUES
	(1, 'CUS0618/C001/001', 'mahmud', '0000-00-00', 'mahmud1@gmail.com', '4545454', NULL, 'A', 'RT', '2018-06-28 02:48:07', '2018-06-28 09:48:07'),
	(2, 'CUS0618/C001/002', 'aya', NULL, NULL, '454545', NULL, 'C', 'RT', '2018-06-28 04:17:33', '2018-06-28 11:17:33'),
	(3, 'CUS0618/C001/003', 'ed', '0000-00-00', NULL, '454545', NULL, 'B', 'RT', '2018-06-28 07:20:37', '2018-06-28 14:22:53'),
	(4, 'CUS0618/C001/004', 'meli', '0000-00-00', 'mahmudbojonegoro@gmail.com', '676767', NULL, NULL, 'GR', '2018-06-29 03:49:30', '2018-06-29 10:49:30'),
	(5, 'CUS0718/C001/005', 'ggg', '0000-00-00', 'demo.user@justinc.me', '4546456', '444', NULL, 'GR', '2018-07-02 02:52:33', '2018-07-02 09:52:33'),
	(6, 'CUS0718/C001/006', 'cius', NULL, 'mahmud1@gmail.com', '343434', NULL, 'B', 'GR', '2018-07-02 03:04:26', '2018-07-02 10:04:26');
/*!40000 ALTER TABLE `m_customer` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_employee
CREATE TABLE IF NOT EXISTS `m_employee` (
  `e_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `e_nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_employee: ~0 rows (approximately)
DELETE FROM `m_employee`;
/*!40000 ALTER TABLE `m_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_employee` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_group
CREATE TABLE IF NOT EXISTS `m_group` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(255) DEFAULT NULL,
  `g_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `g_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_group: ~4 rows (approximately)
DELETE FROM `m_group`;
/*!40000 ALTER TABLE `m_group` DISABLE KEYS */;
INSERT INTO `m_group` (`g_id`, `g_name`, `g_create`, `g_update`) VALUES
	(1, 'Barang Baku ', '2018-09-13 14:24:36', NULL),
	(2, 'Barang Produksi', '2018-09-13 14:25:43', NULL),
	(3, 'Barang Jual', '2018-09-13 14:25:57', NULL),
	(4, 'Barang Titipan', '2018-09-13 14:26:07', NULL);
/*!40000 ALTER TABLE `m_group` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_gudang
CREATE TABLE IF NOT EXISTS `m_gudang` (
  `g_name` varchar(30) NOT NULL,
  `g_insert` datetime DEFAULT NULL,
  `g_update` datetime DEFAULT NULL,
  PRIMARY KEY (`g_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_gudang: ~9 rows (approximately)
DELETE FROM `m_gudang`;
/*!40000 ALTER TABLE `m_gudang` DISABLE KEYS */;
INSERT INTO `m_gudang` (`g_name`, `g_insert`, `g_update`) VALUES
	('GUDANG BAHAN BAKU', '2018-05-02 13:45:22', '2018-05-02 13:45:23'),
	('GUDANG CUSTOMER', '2018-05-02 13:45:55', '2018-05-02 13:45:56'),
	('GUDANG GROSIR', '2018-05-02 13:42:05', '2018-05-02 13:42:06'),
	('GUDANG PENJUALAN', NULL, NULL),
	('GUDANG PRODUKSI', '2018-05-02 13:42:51', '2018-05-02 13:42:52'),
	('GUDANG RETAIL', '2018-05-02 13:42:07', '2018-05-02 13:42:08'),
	('GUDANG SENDING', '2018-05-02 13:46:33', '2018-05-02 13:46:34'),
	('GUDANG TITIP', '2018-09-19 10:57:03', '2018-09-19 10:57:04'),
	('GUDANG TITIPAN', '2018-09-19 10:57:02', '2018-09-19 10:57:05');
/*!40000 ALTER TABLE `m_gudang` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_item
CREATE TABLE IF NOT EXISTS `m_item` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT,
  `i_code` varchar(12) NOT NULL,
  `i_group` int(11) DEFAULT NULL,
  `i_type` varchar(5) DEFAULT NULL COMMENT 'BB: Bahan Baku | BP: Barang Produksi | BJ: Barang Jualan',
  `i_name` varchar(50) DEFAULT NULL,
  `i_satuan` int(11) DEFAULT NULL,
  `i_hpp` decimal(10,2) DEFAULT NULL,
  `i_price` decimal(10,2) DEFAULT NULL,
  `i_status` enum('Y','N') DEFAULT 'Y',
  `i_active` enum('Y','N') DEFAULT 'Y',
  `i_det` varchar(150) DEFAULT NULL COMMENT 'DETAIL',
  `i_insert` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `i_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`i_id`),
  UNIQUE KEY `i_kode` (`i_code`),
  KEY `FK_m_item_m_group` (`i_group`)
) ENGINE=InnoDB AUTO_INCREMENT=1410 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_item: ~805 rows (approximately)
DELETE FROM `m_item`;
/*!40000 ALTER TABLE `m_item` DISABLE KEYS */;
INSERT INTO `m_item` (`i_id`, `i_code`, `i_group`, `i_type`, `i_name`, `i_satuan`, `i_hpp`, `i_price`, `i_status`, `i_active`, `i_det`, `i_insert`, `i_update`) VALUES
	(1, 'ICW001', 3, 'BB', 'POPULER COKLAT & STRAWBERRY', 3, 4000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'ICW002', 3, 'BB', 'CORNETO CLASSICO BLACK & WHITE', 2, 6800.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'ICW003', 3, 'BB', 'CORNETO ROYALE BLACKFOREST', 3, 8500.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 'ICW004', 3, 'BB', 'PADDLE POP MAGIC DUO', 1, 4000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 'ICW005', 3, 'BB', 'PADDLE POP ROKET JELLY', 6, 4000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 'ICW006', 3, 'BB', 'PADDLE POP TORNADO', 3, 4000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(7, 'ICW007', 3, 'BB', 'PADDLE POP CHOCO MAGMA', 7, 2000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(8, 'ICW008', 3, 'BB', 'PADDLE  POP DINO FREEZE', 3, 3000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(9, 'ICW009', 3, 'BB', 'MAGNUM (GOLD, ALMOND DLL)', 3, 12000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(10, 'ICW010', 3, 'BB', 'PADDLE  POP COLOR POPPER', 4, 3000.00, 10000.00, 'Y', 'Y', '\\N', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(11, 'ICW011', 3, 'BB', 'PADDLE  POP RAINBOW POWER', 1, 3000.00, 6000.00, 'Y', 'Y', 'rrtrt', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(12, 'ICW012', 3, '', 'PADDLE  POP DRAGON POP', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(13, 'ICW013', 3, '', 'PADDLE  POP TRICO', 4, 2000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(14, 'ICW014', 3, '', 'SHAKY SHAKE', 4, 7500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(15, 'ICW015', 3, '', 'MAGNUM MINI pack', 4, 39000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(16, 'ICW016', 3, '', 'BUAVITA GRAPE,MANGGA,STRAW,KIWI)', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(17, 'ICW017', 3, '', 'FEAST', 4, 4800.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(18, 'ICW018', 3, '', 'WALLS SELECTION 410ml', 4, 24000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(19, 'ICW019', 3, '', 'WALLS SELECTION 750ml', 4, 42000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(20, 'ICW020', 3, '', 'BUAVITA SMOTHIEZ', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(21, 'ICW021', 3, '', 'WALLS EXTRA CREAMY 3in1 350ml', 4, 18000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(22, 'ICW022', 3, '', 'WALLS EXTRA CREAMY 3in1 700ml', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(23, 'ICW023', 3, '', 'DUNG-DUNG 350ml', 4, 18000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(24, 'ICW024', 3, '', 'DUNG-DUNG 700ml', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(25, 'ICW025', 3, '', 'DUNG-DUNG STICK', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(26, 'ICW026', 3, '', 'CORNETO MINI pack ISI 6bj', 4, 2500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(27, 'ICW027', 3, '', 'CORNETO MINI bj', 4, 15000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(28, 'ICW028', 3, '', 'CORNETO MINI pack ISI 12bj', 4, 29000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(29, 'ICW029', 3, '', 'CORNETO ROYALE DOUBLE CHO FEAST', 4, 8500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(30, 'ICW030', 3, '', 'CORNETO DISC CO', 4, 8500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(31, 'ICW031', 3, '', 'MAGNUM biji', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(32, 'ICW033', 3, '', 'MAGNUM RED VELVED', 4, 13500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(33, 'ICW034', 3, '', 'CORNETTO OREO', 4, 9000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(34, 'ICW035', 3, '', 'WALLS ICY FLOAT', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(35, 'ICW036', 3, '', 'WALLS OCTOPUS', 4, 4500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(36, 'ICW037', 3, '', 'CORNETO CLASSICO BLACK & WHITE', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(37, 'CGM001', 3, '', 'MANDARIN CAKE', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(38, 'CGM002', 3, '', 'MANDARIN CAKE UTUH', 4, 117.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(39, 'CGM003', 3, '', 'MANDARIN CAKE UTUH P/B', 4, 122.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(40, 'CGM004', 3, '', 'MANDARIN 16CM BULAT', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(41, 'CGM005', 3, '', 'MANDARIN 16CM PERSEGI', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(42, 'CGM006', 3, '', 'MANDARIN PANJANG', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(43, 'CGM007', 3, '', 'MOULD CAKE PACK ISI 8 BIJI', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(44, 'CGM008', 3, '', 'MOULD CAKE BIJI', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(45, 'CGM009', 3, '', 'LAPIS SURABAYA 30X40 UTUH', 4, 190.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(46, 'CGM010', 3, '', 'LAPIS 30X40 P/B (65 BIJI)', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(47, 'CGM011', 3, '', 'LAPIS SURABAYA 26X26 UTUH', 4, 90.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(48, 'CGM012', 3, '', 'LAPIS SURABAYA 26X26 P/B (30 BIJI)', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(49, 'CGM013', 3, '', 'LAPIS SURABAYA PER BIJI', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(50, 'CGM014', 3, '', 'BROWNIES OVEN UTUH 30CM', 4, 60.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(51, 'CGM015', 3, '', 'BROWNIES OVEN KECIL', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(52, 'CGM016', 3, '', 'BROWNIES OVEN BESAR', 4, 22.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(53, 'CGM017', 3, '', 'BROWNIES OVEN UTUH 30CM+DUS', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(54, 'CGM018', 3, '', 'BROWNIES MINI TART 10CM', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(55, 'CGM019', 3, '', 'CHOCOLATE BANANA UTUH 30CM+DUS', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(56, 'CGM020', 3, '', 'CHOCOLATE BANANA BESAR', 4, 22.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(57, 'CGM021', 3, '', 'CHOCOLATE BANANA KECIL', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(58, 'CGM022', 3, '', 'CAKE TAPE KETAN HITAM UTUH 30CM+DUS', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(59, 'CGM023', 3, '', 'CAKE TAPE KETAN HITAM BESAR', 4, 22.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(60, 'CGM024', 3, '', 'CAKE TAPE KETAN HITAM KECIL', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(61, 'CGM025', 3, '', 'FRUIT CAKE 30CM+DUS', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(62, 'CGM026', 3, '', 'FRUIT CAKE BESAR', 4, 28.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(63, 'CGM027', 3, '', 'FRUIT CAKE K', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(64, 'CGM028', 3, '', 'COKLAT LAYER CAKE UTUH 28CM', 4, 115.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(65, 'CGM029', 3, '', 'COKLAT LAYER CAKE PT', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(66, 'CGM030', 3, '', 'EMOTICON COOKIES', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(67, 'CGM031', 3, '', 'PUDING ROTI CAKE', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(68, 'CGM032', 3, '', 'PUDING CAKE UTUH 20CM', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(69, 'CGM033', 3, '', 'PUDING CAKE UTUH 20CM (24 BIJI)', 4, 36.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(70, 'CGM034', 3, '', 'BF MINI', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(71, 'CGM035', 3, '', 'MNC BC /MINI CAKE BUTTER CREAM', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(72, 'CGM036', 3, '', 'MNC SRM /MINICAKE SIRAM', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(73, 'CGM037', 3, '', 'MNC KEJU/ MINICAKE KEJU', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(74, 'CGM038', 3, '', 'MNC ROLL PDN ', 4, 1.80, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(75, 'CGM039', 3, '', 'MNC BDR/MINICAKE BENDERA', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(76, 'CGM040', 3, '', 'ROLL MINI CO/KC 4X7', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(77, 'CGM041', 3, '', 'ROLL MINI O/KC 4X6', 4, 1.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(78, 'CGM042', 3, '', 'ROLL MINI CO/KC 4X5', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(79, 'CGM043', 3, '', 'MINITART A kecil', 4, 4.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(80, 'CGM044', 3, '', 'MINITART A besar', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(81, 'CGM045', 3, '', 'MINITART B kecil', 4, 5.25, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(82, 'CGM046', 3, '', 'MINITART B besar', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(83, 'CGM047', 3, '', 'MINITART B besar HIAS KEJU', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(84, 'CGM048', 3, '', 'MINITART B SG PANJANG', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(85, 'CGM049', 3, '', 'MINITART BF', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(86, 'CGM050', 3, '', 'MINTART BF HIAS KEJU', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(87, 'CGM051', 3, '', 'MINITART BF SG PANJANG', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(88, 'CGM052', 3, '', 'MINITART O', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(89, 'CGM053', 3, '', 'TART BLT DIA.8CM', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(90, 'CGM054', 3, '', 'TART BLT DIA.10CM', 4, 27.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(91, 'CGM055', 3, '', 'TART BLT DIA.12CM', 4, 42.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(92, 'CGM056', 3, '', 'TART BLT DIA.16CM', 4, 75.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(93, 'CGM057', 3, '', 'TART BLT DIA.18CM', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(94, 'CGM058', 3, '', 'TART BLT DIA.20CM', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(95, 'CGM059', 3, '', 'TART BLT DIA.30CM', 4, 240.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(96, 'CGM060', 3, '', 'TART LOVE DIA.25', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(97, 'CGM061', 3, '', 'TART LOVE DIA.30', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(98, 'CGM062', 3, '', 'ROLL SP utuh', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(99, 'CGM063', 3, '', 'ROLL SP pb', 4, 24.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(100, 'CGM064', 3, '', 'MARMER utuh + MIKA', 4, 34.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(101, 'CGM065', 3, '', 'BOLU utuh + MIKA', 4, 38.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(102, 'CGM066', 3, '', 'CHIFFON utuh + MIKA', 4, 32.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(103, 'CGM067', 3, '', 'TART KTK 20cm', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(104, 'CGM068', 3, '', 'TART KTK 24cm', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(105, 'CGM069', 3, '', 'TART KTK 26cm', 4, 240.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(106, 'CGM070', 3, '', 'TART KTK 30cm', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(107, 'CGM071', 3, '', 'TART 30 x 40', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(108, 'CGM072', 3, '', 'ROLL SP pack', 4, 9.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(109, 'CGM073', 3, '', 'BF 8cm SERUT', 4, 25.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(110, 'CGM074', 3, '', 'BF 8cm TEMPEL', 4, 27.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(111, 'CGM075', 3, '', 'BF 10cm SERUT', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(112, 'CGM076', 3, '', 'BF 10cm TEMPEL', 4, 32.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(113, 'CGM077', 3, '', 'BF 12cm SERUT', 4, 47.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(114, 'CGM078', 3, '', 'BF 12cm SIRAM', 4, 55.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(115, 'CGM079', 3, '', 'BF 16cm TEMPEL', 4, 80.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(116, 'CGM080', 3, '', 'BF 16cm SIRAM', 4, 90.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(117, 'CGM081', 3, '', 'BF 18cm TEMPEL', 4, 115.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(118, 'CGM082', 3, '', 'BF 18cm SIRAM', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(119, 'CGM083', 3, '', 'BF 20cm TEMPEL', 4, 135.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(120, 'CGM084', 3, '', 'BF 20cm SIRAM', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(121, 'CGM085', 3, '', 'BF 24cm TEMPEL', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(122, 'CGM086', 3, '', 'BF 24cm SIRAM', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(123, 'CGM087', 3, '', 'BF 26cm TEMPEL', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(124, 'CGM088', 3, '', 'BF 26cm SIRAM', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(125, 'CGM089', 3, '', 'BF 30cm TEMPEL', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(126, 'CGM090', 3, '', 'BF 30cm SIRAM', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(127, 'CGM091', 3, '', 'BF 20cm KOTAK tempel', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(128, 'CGM092', 3, '', 'BF 20cm KOTAK SIRAM', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(129, 'CGM093', 3, '', 'BF 24cm KOTAK tempel', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(130, 'CGM094', 3, '', 'BF 24cm KOTAK SIRAM', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(131, 'CGM095', 3, '', 'BF 26cm KOTAK tempel', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(132, 'CGM096', 3, '', 'BF 26cm KOTAK SIRAM', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(133, 'CGM097', 3, '', 'BF 30cm KOTAK tempel', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(134, 'CGM098', 3, '', 'BF 30cm KOTAK SIRAM', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(135, 'CGM099', 3, '', 'BF 30 X 40cm tempel', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(136, 'CGM100', 3, '', 'BF 30 X 40cm SIRAM', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(137, 'CGM101', 3, '', 'TART BLT DIA.26CM', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(138, 'CGM102', 3, '', 'BF LOVE 25 tempel', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(139, 'CGM103', 3, '', 'BF LOVE 25 SIRAM', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(140, 'CGM104', 3, '', 'BF LOVE 30 tempel', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(141, 'CGM105', 3, '', 'BF LOVE 30 SIRAM', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(142, 'CGM106', 3, '', 'FONDANT BLT 18 cm', 4, 130.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(143, 'CGM107', 3, '', 'FONDANT BLT 20 cm', 4, 160.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(144, 'CGM108', 3, '', 'FONDANT BLT 26 cm', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(145, 'CGM109', 3, '', 'FONDANT BLT 30 cm', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(146, 'CGM110', 3, '', 'FONDANT KTK 20 cm', 4, 180.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(147, 'CGM111', 3, '', 'FONDANT KTK 24 cm', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(148, 'CGM112', 3, '', 'FONDANT KTK 26 cm', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(149, 'CGM113', 3, '', 'FONDANT KTK 30 cm', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(150, 'CGM114', 3, '', 'FONDANT KTK 30x40cm', 4, 550.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(151, 'CGM115', 3, '', 'TART KOALA sp', 4, 75.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(152, 'CGM116', 3, '', 'TART KOALA + 2LPS SPIKU 30cm', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(153, 'CGM117', 3, '', 'TART KERETA THOMAS', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(154, 'CGM118', 3, '', 'TART KERETA THOMAS + 1 LPS SPIKU 30x40', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(155, 'CGM119', 3, '', 'ROLL RAINBOW utuh', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(156, 'CGM120', 3, '', 'ROLL RAINBOW pb', 4, 36.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(157, 'CGM121', 3, '', 'ROLL RAINBOW pack (4bj)', 4, 11.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(158, 'CGM122', 3, '', 'ROLL RAINBOW pt', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(159, 'CGM123', 3, '', 'MANDARIN utuh', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(160, 'CGM124', 3, '', 'MANDARIN pb', 4, 24.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(161, 'CGM125', 3, '', 'MANDARIN pack 5bj', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(162, 'CGM126', 3, '', 'MANDARIN pt', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(163, 'CGM127', 3, '', 'RAINBOW cake', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(164, 'CGM128', 3, '', 'RAINBOW BLT 16cm BC ATAS', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(165, 'CGM129', 3, '', 'RAINBOW BLT 16cm SIRAM ATAS', 4, 110.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(166, 'CGM130', 3, '', 'RAINBOW BLT 16cm BC PENUH', 4, 120.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(167, 'CGM131', 3, '', 'RAINBOW BLT 16cm SIRAM PENUH', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(168, 'CGM132', 3, '', 'RAINBOW BLT 18cm BC ATAS', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(169, 'CGM133', 3, '', 'RAINBOW BLT 18cm SIRAM ATAS', 4, 160.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(170, 'CGM134', 3, '', 'RAINBOW BLT 18cm BC PENUH', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(171, 'CGM135', 3, '', 'RAINBOW BLT 18cm SIRAM PENUH', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(172, 'CGM136', 3, '', 'RAINBOW BLT 20cm BC ATAS', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(173, 'CGM137', 3, '', 'RAINBOW BLT 20cm SIRAM ATAS', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(174, 'CGM138', 3, '', 'RAINBOW BLT 20cm BC PENUH', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(175, 'CGM139', 3, '', 'RAINBOW BLT 20cm SIRAM PENUH', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(176, 'CGM140', 3, '', 'RAINBOW BLT 24cm BC ATAS', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(177, 'CGM141', 3, '', 'RAINBOW BLT 24cm SIRAM ATAS', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(178, 'CGM142', 3, '', 'RAINBOW BLT 24cm BC PENUH', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(179, 'CGM143', 3, '', 'RAINBOW BLT 24cm SIRAM PENUH', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(180, 'CGM144', 3, '', 'RAINBOW BLT 26cm BC ATAS', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(181, 'CGM145', 3, '', 'RAINBOW BLT 26cm SIRAM ATAS', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(182, 'CGM146', 3, '', 'RAINBOW BLT 26cm BC PENUH', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(183, 'CGM147', 3, '', 'RAINBOW BLT 26cm SIRAM PENUH', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(184, 'CGM148', 3, '', 'RAINBOW BLT 30cm BC ATAS', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(185, 'CGM149', 3, '', 'RAINBOW BLT 30cm SIRAM ATAS', 4, 425.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(186, 'CGM150', 3, '', 'RAINBOW BLT 30cm BC PENUH', 4, 475.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(187, 'CGM151', 3, '', 'RAINBOW BLT 30cm SIRAM PENUH', 4, 525.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(188, 'CGM152', 3, '', 'RAINBOW KTK 16cm BC ATAS', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(189, 'CGM153', 3, '', 'RAINBOW KTK 16cm SIRAM ATAS', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(190, 'CGM154', 3, '', 'RAINBOW KTK 16cm BC PENUH', 4, 165.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(191, 'CGM155', 3, '', 'RAINBOW KTK 16cm SIRAM PENUH', 4, 180.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(192, 'CGM156', 3, '', 'RAINBOW KTK 20cm BC ATAS', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(193, 'CGM157', 3, '', 'RAINBOW KTK 20cm SIRAM ATAS', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(194, 'CGM158', 3, '', 'RAINBOW KTK 20cm BC PENUH', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(195, 'CGM159', 3, '', 'RAINBOW KTK 20cm SIRAM PENUH', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(196, 'CGM160', 3, '', 'RAINBOW KTK 24cm BC ATAS', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(197, 'CGM161', 3, '', 'RAINBOW KTK 24cm SIRAM ATAS', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(198, 'CGM162', 3, '', 'RAINBOW KTK 24cm BC PENUH', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(199, 'CGM163', 3, '', 'RAINBOW KTK 24cm SIRAM PENUH', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(200, 'CGM164', 3, '', 'RAINBOW KTK 26cm BC ATAS', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(201, 'CGM165', 3, '', 'RAINBOW KTK 26cm SIRAM ATAS', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(202, 'CGM166', 3, '', 'RAINBOW KTK 26cm BC PENUH', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(203, 'CGM167', 3, '', 'RAINBOW KTK 26cm SIRAM PENUH', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(204, 'CGM168', 3, '', 'RAINBOW KTK 30cm BC ATAS', 4, 425.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(205, 'CGM169', 3, '', 'RAINBOW KTK 30cm SIRAM ATAS', 4, 475.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(206, 'CGM170', 3, '', 'RAINBOW KTK 30cm BC PENUH', 4, 525.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(207, 'CGM171', 3, '', 'RAINBOW KTK 30cm SIRAM PENUH', 4, 575.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(208, 'CGM172', 3, '', 'RAINBOW KTK 30x40cm BC ATAS', 4, 550.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(209, 'CGM173', 3, '', 'RAINBOW KTK 30x40cm SIRAM ATAS', 4, 625.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(210, 'CGM174', 3, '', 'RAINBOW KTK 30x40cm BC PENUH', 4, 700.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(211, 'CGM175', 3, '', 'RAINBOW KTK 30x40cm SIRAM PENUH', 4, 775.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(212, 'CGM176', 3, '', 'RED VELVED cake', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(213, 'CGM177', 3, '', 'RED VELVED BLT 16cm BC ATAS', 4, 75.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(214, 'CGM178', 3, '', 'RED VELVED BLT 16cm SIRAM ATAS', 4, 85.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(215, 'CGM179', 3, '', 'RED VELVED BLT 16cm BC PENUH', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(216, 'CGM180', 3, '', 'RED VELVED BLT 16cm SIRAM PENUH', 4, 110.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(217, 'CGM181', 3, '', 'RED VELVED BLT 18cm BC ATAS', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(218, 'CGM182', 3, '', 'RED VELVED BLT 18cm SIRAM ATAS', 4, 110.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(219, 'CGM183', 3, '', 'RED VELVED BLT 18cm BC PENUH', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(220, 'CGM184', 3, '', 'RED VELVED BLT 18cm SIRAM PENUH', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(221, 'CGM185', 3, '', 'RED VELVED BLT 20cm BC ATAS', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(222, 'CGM186', 3, '', 'RED VELVED BLT 20cm SIRAM ATAS', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(223, 'CGM187', 3, '', 'RED VELVED BLT 20cm BC PENUH', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(224, 'CGM188', 3, '', 'RED VELVED BLT 20cm SIRAM PENUH', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(225, 'CGM189', 3, '', 'RED VELVED BLT 24cm BC ATAS', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(226, 'CGM190', 3, '', 'RED VELVED BLT 24cm SIRAM ATAS', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(227, 'CGM191', 3, '', 'RED VELVED BLT 24cm BC PENUH', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(228, 'CGM192', 3, '', 'RED VELVED BLT 24cm SIRAM PENUH', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(229, 'CGM193', 3, '', 'RED VELVED BLT 26cm BC ATAS', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(230, 'CGM194', 3, '', 'RED VELVED BLT 26cm SIRAM ATAS', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(231, 'CGM195', 3, '', 'RED VELVED BLT 26cm BC PENUH', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(232, 'CGM196', 3, '', 'RED VELVED BLT 26cm SIRAM PENUH', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(233, 'CGM197', 3, '', 'RED VELVED BLT 30cm BC ATAS', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(234, 'CGM198', 3, '', 'RED VELVED BLT 30cm SIRAM ATAS', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(235, 'CGM199', 3, '', 'RED VELVED BLT 30cm BC PENUH', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(236, 'CGM200', 3, '', 'RED VELVED BLT 30cm SIRAM PENUH', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(237, 'CGM201', 3, '', 'RED VELVED KTK 16cm BC ATAS', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(238, 'CGM202', 3, '', 'RED VELVED KTK 16cm SIRAM ATAS', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(239, 'CGM203', 3, '', 'RED VELVED KTK 16cm BC PENUH', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(240, 'CGM204', 3, '', 'RED VELVED KTK 16cm SIRAM PENUH', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(241, 'CGM205', 3, '', 'RED VELVED KTK 20cm BC ATAS', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(242, 'CGM206', 3, '', 'RED VELVED KTK 20cm SIRAM ATAS', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(243, 'CGM207', 3, '', 'RED VELVED KTK 20cm BC PENUH', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(244, 'CGM208', 3, '', 'RED VELVED KTK 20cm SIRAM PENUH', 4, 225.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(245, 'CGM209', 3, '', 'RED VELVED KTK 24cm BC ATAS', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(246, 'CGM210', 3, '', 'RED VELVED KTK 24cm SIRAM ATAS', 4, 230.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(247, 'CGM211', 3, '', 'RED VELVED KTK 24cm BC PENUH', 4, 260.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(248, 'CGM212', 3, '', 'RED VELVED KTK 24cm SIRAM PENUH', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(249, 'CGM213', 3, '', 'RED VELVED KTK 26cm BC ATAS', 4, 275.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(250, 'CGM214', 3, '', 'RED VELVED KTK 26cm SIRAM ATAS', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(251, 'CGM215', 3, '', 'RED VELVED KTK 26cm BC PENUH', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(252, 'CGM216', 3, '', 'RED VELVED KTK 26cm SIRAM PENUH', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(253, 'CGM217', 3, '', 'RED VELVED KTK 30cm BC ATAS', 4, 350.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(254, 'CGM218', 3, '', 'RED VELVED KTK 30cm SIRAM ATAS', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(255, 'CGM219', 3, '', 'RED VELVED KTK 30cm BC PENUH', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(256, 'CGM220', 3, '', 'RED VELVED KTK 30cm SIRAM PENUH', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(257, 'CGM221', 3, '', 'RED VELVED KTK 30x40cm BC ATAS', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(258, 'CGM222', 3, '', 'RED VELVED KTK 30x40cm SIRAM ATAS', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(259, 'CGM223', 3, '', 'RED VELVED KTK 30x40cm BC PENUH', 4, 550.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(260, 'CGM224', 3, '', 'RED VELVED KTK 30x40cm SIRAM PENUH', 4, 600.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(261, 'CGM225', 3, '', 'PANDAN roll (12bj)', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(262, 'CGM226', 3, '', 'PANDAN roll BJ', 4, 1.40, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(263, 'CGM227', 3, '', 'CHEESS roll (12bj)', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(264, 'CGM228', 3, '', 'CHEESS roll BJ', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(265, 'CGM229', 3, '', 'CUP CAKE kecil', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(266, 'CGM230', 3, '', 'CUP CAKE ISI 6bj', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(267, 'CGM231', 3, '', 'CUP CAKE 1S', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(268, 'CGM232', 3, '', 'CUP CAKE 2S', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(269, 'CGM233', 3, '', 'CUP CAKE 4S', 4, 43.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(270, 'CGM234', 3, '', 'CUP CAKE 6S', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(271, 'CGM235', 3, '', 'CUP CAKE 9S', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(272, 'CGM236', 3, '', 'CHIFFON topping BIASA', 4, 25.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(273, 'CGM237', 3, '', 'SPIKU BIASA pack (isi 4bj)', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(274, 'CGM238', 3, '', 'MARMER pack (isi 5bj)', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(275, 'CGM239', 3, '', 'BOLU pack (isi 10bj)', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(276, 'CGM240', 3, '', 'BANANA ORIGINAL 2S', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(277, 'CGM241', 3, '', 'BANANA SIRAM 2S', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(278, 'CGM242', 3, '', 'BROWNIES KOTAK utuh', 4, 50.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(279, 'CGM243', 3, '', 'BROWNIES KOTAK pb', 4, 52.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(280, 'CGM244', 3, '', 'BROWNIES KOTAK utuh +mika', 4, 58.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(281, 'CGM245', 3, '', 'BROWNIES PACK (isi 4bj)', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(282, 'CGM246', 3, '', 'BROWNIES bj', 4, 1.80, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(283, 'CGM247', 3, '', 'MINITART BF SGP KEJU', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(284, 'CGM248', 3, '', 'CHIFFON PACK 10bj', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(285, 'CGM249', 3, '', 'MARMER PELANGI pack 5bj', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(286, 'CGM250', 3, '', 'BOLU pack (isi 5bj)', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(287, 'CGM251', 3, '', 'MOIST CAKE', 4, 3.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(288, 'CGM252', 3, '', 'MARMER pack (isi 10bj)', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(289, 'CGM253', 3, '', 'MINICAKE 4S', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(290, 'CGM254', 3, '', 'RAINBOW CERRY', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(291, 'CGM255', 3, '', 'MARMER utuh biasa', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(292, 'CGM256', 3, '', 'SPIKU BIASA + MIKA', 4, 43.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(293, 'CGM257', 3, '', 'SPIKU BIASA pack (isi 5bj)', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(294, 'CGM258', 3, '', 'ROLL SP bj', 4, 1.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(295, 'CGM259', 3, '', 'MARMER PELANGI isi 25bj', 4, 38.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(296, 'CGM260', 3, '', 'SPIKU BIASA isi 24', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(297, 'CGM261', 3, '', 'TART SUSUN ktk 24 & blt 26', 4, 265.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(298, 'CGM262', 3, '', 'TART SUSUN ktk 26 & blt 30', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(299, 'CGM263', 3, '', 'TART SUSUN ktk 30', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(300, 'CGM264', 3, '', 'TART SUSUN 2/2', 4, 450.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(301, 'CGM265', 3, '', 'TART 3 LAPIS', 4, 400.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(302, 'CGM266', 3, '', 'TART SUSUN 3/2', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(303, 'CGM267', 3, '', 'CHIFFON topping KEJU PENUH', 4, 27.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(304, 'CGM268', 3, '', 'CHIFFON topping KEJU SEPARO', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(305, 'CGM269', 3, '', 'MINITART B SG PJNG KEJU', 4, 16.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(306, 'CGM270', 3, '', 'OMBRE STRAWBERRY', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(307, 'CGM271', 3, '', 'TART EDIBLE blt.12cm', 4, 55.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(308, 'CGM272', 3, '', 'TART EDIBLE blt.16cm', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(309, 'CGM273', 3, '', 'TART EDIBLE blt.18cm', 4, 124.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(310, 'CGM274', 3, '', 'TART EDIBLE blt.20cm', 4, 161.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(311, 'CGM275', 3, '', 'BF 16cm SIRAM + SABUK', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(312, 'CGM276', 3, '', 'ROLL SP PANDAN-nanas', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(313, 'CGM277', 3, '', 'ROLL SP PANDAN-nanas pb', 4, 24.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(314, 'CGM278', 3, '', 'ROLL SP PANDAN bj', 4, 1.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(315, 'CGM279', 3, '', 'ROLL SP PANDAN pack isi 5bj', 4, 9.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(316, 'CGM280', 3, '', 'TART BLT.16 TOPING COKLAT', 4, 85.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(317, 'CGM281', 3, '', 'BF BLT.16 SIRAM TOP CKLT', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(318, 'CGM282', 3, '', 'JAPANESE COTTON CAKE kecil', 4, 13.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(319, 'CGM283', 3, '', 'JAPANESE COTTON CAKE besar', 4, 25.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(320, 'CGM284', 3, '', 'BF BLT.12 TEMPEL EDIBLE ', 4, 60.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(321, 'CGM285', 3, '', 'TART MOBIL', 4, 75.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(322, 'CGM286', 3, '', 'TART BLT 30 SUSUN', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(323, 'CGM287', 3, '', 'TART KTK 24cm SUSUN', 4, 265.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(324, 'CGM288', 3, '', 'ROLL MOKA 12bj', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(325, 'CGM289', 3, '', 'ROLL MOKA bj', 4, 1.40, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(326, 'CGM290', 3, '', 'ROLL COKLAT KEJU 12bj', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(327, 'CGM291', 3, '', 'ROLL COKLAT KEJU bj', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(328, 'CGM292', 3, '', 'LAPIS SURABAYA dus ROLL SP', 4, 32.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(329, 'CGM293', 3, '', 'CUP CAKE sj', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(330, 'CGM294', 3, '', 'SPONGEBOB cake MUFFIN', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(331, 'CGM295', 3, '', 'SPONGEBOB cake BOLU', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(332, 'CGM296', 3, '', 'RAINBOW CAKE BLT.16cm', 4, 80.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(333, 'CGM297', 3, '', 'RAINBOW CAKE BLT.18cm', 4, 120.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(334, 'CGM298', 3, '', 'RAINBOW CAKE BLT.20cm', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(335, 'CGM299', 3, '', 'RAINBOW CAKE BLT.24cm', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(336, 'CGM300', 3, '', 'RAINBOW CAKE BLT.26cm', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(337, 'CGM301', 3, '', 'RAINBOW CAKE BLT.30cm', 4, 325.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(338, 'CGM302', 3, '', 'RAINBOW CAKE KTK.16cm', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(339, 'CGM303', 3, '', 'RAINBOW CAKE KTK.20cm', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(340, 'CGM304', 3, '', 'RAINBOW CAKE KTK.24cm', 4, 250.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(341, 'CGM305', 3, '', 'RAINBOW CAKE KTK.26cm', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(342, 'CGM306', 3, '', 'RAINBOW CAKE KTK.30cm', 4, 375.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(343, 'CGM307', 3, '', 'RAINBOW CAKE KTK.30x40cm', 4, 475.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(344, 'CGM308', 3, '', 'TART KTK.20cm (roti marmer)', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(345, 'CGM309', 3, '', 'CHIFFON TOPING almond', 4, 28.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(346, 'CGM310', 3, '', 'CHIFFON TOPING almond MIKA', 4, 36.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(347, 'CGM311', 3, '', 'CHIFFON TOP almond-KEJU', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(348, 'CGM312', 3, '', 'CHIFFON TOP almond-KEJU MIKA', 4, 38.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(349, 'CGM313', 3, '', 'RAINBOW ROLL cerry', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(350, 'CGM314', 3, '', 'BANANA ART kecil ORIGINAL', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(351, 'CGM315', 3, '', 'BANANA ART kecil SIRAM (2bj)', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(352, 'CGM316', 3, '', 'TART BLT dia.24CM', 4, 170.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(353, 'CGM317', 3, '', 'ROLL SP 2lapis UTUH', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(354, 'CGM318', 3, '', 'ROLL SP 2lapis PB', 4, 31.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(355, 'CGM319', 3, '', 'ROLL SP 2lapis PT', 4, 2.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(356, 'CGM320', 3, '', 'ROLL SP 2lapis MIKA', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(357, 'CGM321', 3, '', 'TART ISI LAPIS SBY KTK. 26', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(358, 'CGM322', 3, '', 'BATIK ROLL + MIKA', 4, 38.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(359, 'CGM323', 3, '', 'BATIK ROLL biasa', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(360, 'CGM324', 3, '', 'HELLO KITTY CAKE', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(361, 'CGM325', 3, '', 'FONDANT LOVE.25', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(362, 'CGM326', 3, '', 'CHIFFON K RAINBOW', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(363, 'CGM327', 3, '', 'DORAEMON CAKE', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(364, 'CGM328', 3, '', 'FONDANT LOVE.30', 4, 300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(365, 'CGM329', 3, '', 'TART KEPALA HELLO KITTY SUSUN 1lps kotak 24', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(366, 'CGM330', 3, '', 'TART KELAPA HELLO KITTY saja', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(367, 'CGM331', 3, '', 'LAPIS SURABAYA tebal', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(368, 'CGM332', 3, '', 'LAPIS SURABAYA 30X40 pb', 4, 210.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(369, 'CGM333', 3, '', 'BOLU ORANGE UTUH', 4, 31.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(370, 'CGM334', 3, '', 'BOLU ORANGE PB', 4, 33.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(371, 'CGM335', 3, '', 'BF BLT.16 TOPING BUAH', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(372, 'CGM336', 3, '', 'BATIK UTUH 24X24 (3 lapis) + dus', 4, 95.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(373, 'CGM337', 3, '', 'BF BLT.16 SABUK+ BUAH (image)', 4, 150.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(374, 'CGM338', 3, '', 'BF BLT.16 + BUAH (image)', 4, 130.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(375, 'CGM339', 3, '', 'RED VELVED cup cake', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(376, 'CGM340', 3, '', 'ROLL SP PANDAN NANAS SIRAM COKL', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(377, 'CGM341', 3, '', 'COKLAT LAYER PIRAMID', 4, 12.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(378, 'CGM342', 3, '', 'BROWNIES TOPPING KEJU', 4, 16.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(379, 'CGM343', 3, '', 'BF RICH BLT 16', 4, 135.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(380, 'CGM344', 3, '', 'BROWNIES KUKUS coklat-vanila (Mika)', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(381, 'CGM345', 3, '', 'BROWNIES KUKUS coklat-vanila (K)', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(382, 'CGM346', 3, '', 'BROWNIES KUKUS coklat-pandan(Mika)', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(383, 'CGM347', 3, '', 'HELLO KITTY +TART KTK 26 1 LPS', 4, 210.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(384, 'CGM348', 3, '', 'CHIFFON PELANGI UTUH dus', 4, 26.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(385, 'CGM349', 3, '', 'CHIFFON PELANGI pb', 4, 28.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(386, 'CGM350', 3, '', 'CHIFFON PELANGI UTUH-mika', 4, 34.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(387, 'CGM351', 3, '', 'BROWNIES OVEN pt.12', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(388, 'CGM352', 3, '', 'FRUIT CAKE pt.12', 4, 2.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(389, 'CGM353', 3, '', 'FRUIT CAKE pt.14', 4, 2.40, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(390, 'CGM354', 3, '', 'BROWNIES OVEN ALMOND', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(391, 'CGM355', 3, '', 'TART KEPALA HELLO KITTY SUSUN 1lps kotak 26', 4, 210.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(392, 'CGM356', 3, '', 'FONDANT SUSUN BLT.26', 4, 420.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(393, 'CGM357', 3, '', 'FONDANT SUSUN BLT.30', 4, 500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(394, 'CGM358', 3, '', 'BANANA ORIGINAL BIJI', 4, 2.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(395, 'CGM359', 3, '', 'PIE CHEESE BANANA ISI 2', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(396, 'CGM360', 3, '', 'BROWNIES KUKUS coklat-pandan(Mika)', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(397, 'CGM361', 3, '', 'PIE CHEESE BANANA BIJI', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(398, 'CGM362', 3, '', 'BROWNIES KUKUS 2LPS PT 4', 4, 3.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(399, 'CGM363', 3, '', 'MANDARIN 16CM BLT+DUS krumpul+pisau', 4, 24.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(400, 'CGM364', 3, '', 'ROLL SP/PDN NANAS TOP COKLT MIKA', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(401, 'CGM365', 3, '', 'ROLL SP TOP SIRAM COKLT PNH MIKA', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(402, 'CGM366', 3, '', 'MINITART BF mika', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(403, 'CGM367', 3, '', 'MINITART B mika', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(404, 'CGM368', 3, '', 'MINITART A mika', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(405, 'CGM369', 3, '', 'MNC GREEN TEA VELVET', 4, 3.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(406, 'CGM370', 3, '', 'MNC GREEN TEA VELVET 4S', 4, 16.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(407, 'CGM371', 3, '', 'MNC GREEN TEA VELVET 6S', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(408, 'CGM372', 3, '', 'BROWNIES KUKUS COKLAT-GREEN TEA', 4, 16.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(409, 'CGM373', 3, '', 'BROWNIES KUKUS COKLAT- BLUEBERRY', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(410, 'CGM374', 3, '', 'BROWNIES KUKUS COK-pdn/vanila/taro/blue pt (1mk:6)', 4, 2.10, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(411, 'CGM375', 3, '', 'BROWNIES KUKUS COK-straw/greentea (1mk:6)', 4, 2.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(412, 'CGM376', 3, '', 'RAINBOW CAKE with chees cream', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(413, 'CGM377', 3, '', 'BF RICH BLT 18', 4, 175.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(414, 'CGM378', 3, '', 'BF RICH BLT 18 SRM ATAS CKLT', 4, 200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(415, 'CGM379', 3, '', 'PIE BROWNIES', 4, 3.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(416, 'CGM380', 3, '', 'CUP CAKE kecil ISI 4bj', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(417, 'CGM381', 3, '', 'BROWNIES oven ALMOND', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(418, 'CGM382', 3, '', 'BROWNIES oven STRAWBERY', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(419, 'CGM383', 3, '', 'BROWNIES DUO COKLAT-ALMOND', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(420, 'CGM384', 3, '', 'BROWNIES DUO ALMOND-STRAW', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(421, 'CGM385', 3, '', 'MUFFIN VANILA tanggung PANJANG', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(422, 'CGM386', 3, '', 'MUFFIN COKLAT tanggung PANJANG', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(423, 'CGM387', 3, '', 'BROWNIES KUKUS STRAW-KEJU', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(424, 'CGM388', 3, '', 'BROWNIES KUKUS PDN-KEJU', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(425, 'CGM389', 3, '', 'FONDANT BLT 24', 4, 240.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(426, 'CGM390', 3, '', 'TART KUPU-KUPU', 4, 110.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(427, 'CGM391', 3, '', 'MINION CAKE', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(428, 'CGM392', 3, '', 'BROWNIES DUO ALMOND-GREEN TEA', 4, 32.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(429, 'CGM393', 3, '', 'ROTI LPS SBY mika', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(430, 'CGM394', 3, '', 'BROWNIES DUO COKLAT-STRAW', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(431, 'CGM395', 3, '', 'BROWNIES ALMOND 30X30 plus dus', 4, 90.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(432, 'CGM396', 3, '', 'GIRAFEE ROLL CAKE pt', 4, 2.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(433, 'CGM397', 3, '', 'GIRAFEE ROLL CAKE utuh', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(434, 'CGM398', 3, '', 'BROWNIES DUO COKLAT- GREEN TEA', 4, 32.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(435, 'CGM399', 3, '', 'BROWNIES oven GREEN TEA sj', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(436, 'CGM400', 3, '', 'SPIKU BSA TEBAL POTONG AJA', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(437, 'CGM401', 3, '', 'BROWNIES TOPING B', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(438, 'CGM402', 3, '', 'BF BLT 18 COKLT VARIASI', 4, 140.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(439, 'CGM403', 3, '', 'PELANGI pt', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(440, 'CGM404', 3, '', 'CHOCOLATE BANANA KUKUS', 4, 2.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(441, 'CGM405', 3, '', 'CHIF. T siram Coklat', 4, 50.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(442, 'CGM406', 3, '', 'BOLU pt 20/bj', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(443, 'CGM407', 3, '', 'BANANA CAKE new', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(444, 'CGM408', 3, '', 'DOMINO lebaran 2017', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(445, 'CGM409', 3, '', 'BROWNIES lebaran 2017', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(446, 'CGM410', 3, '', 'TAPE CAKE lebaran 2017', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(447, 'CGM411', 3, '', 'FRUIT CAKE lebaran 2017', 4, 34.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(448, 'CGM412', 3, '', 'LAPIS SBY tebal lebaran 2017', 4, 7.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(449, 'CGM413', 3, '', 'ROLL SP pb lebaran 2017', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(450, 'CGM414', 3, '', 'ROLL SP UTUH lebaran 2017', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(451, 'CGM415', 3, '', 'MINITART BC pjng lebaran 2017', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(452, 'CGN 416', 3, '', 'CHEES ROLL mika 4bj', 4, 13.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(453, 'CGM417', 3, '', 'brownies all variant lebaran', 4, 15.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(454, 'CGM418', 3, '', 'bolu lebaran', 4, 37.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(455, 'CGM419', 3, '', 'LAPIS PONOROGO', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(456, 'CGM420', 3, '', 'CHIFFON pt.12', 4, 2.40, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(457, 'CGM421', 3, '', 'BF CUP bola', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(458, 'CGM422', 3, '', 'TART BLT.24 SUSUN', 4, 255.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(459, 'CGM423', 3, '', 'LAPIS SBY PREMIUM BLOK+MIKA', 4, 49.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(460, 'CGM424', 3, '', 'LAPIS SBY PREMIUM UTUH 24X24', 4, 139.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(461, 'CGM425', 3, '', 'NAPOLEON STRAWBERY', 4, 45.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(462, 'CGM426', 3, '', 'NAPOLEON COKLAT', 4, 45.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(463, 'CGM427', 3, '', 'NAPOLEON MELON', 4, 45.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(464, 'CGM428', 3, '', 'CAKE KARAKTER ISI 4', 4, 40.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(465, 'CGM429', 3, '', 'PIE BROWNIES DUS ALL VARIANT', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(466, 'CGM430', 3, '', 'PROLL TAPE mika sobek', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(467, 'CGM431', 3, '', 'LAPIS LEGIT nabila', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(468, 'CGM432', 3, '', 'PROLL TAPE PT', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(469, 'BK001', 3, '', 'ANEK', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(470, 'BK002', 3, '', 'AYAM', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(471, 'BK003', 3, '', 'AYAM BALADO', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(472, 'BK004', 3, '', 'BULAT COKLAT', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(473, 'BK005', 3, '', 'BULAT COKLT KEJU kecil (4)', 4, 18.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(474, 'BK006', 3, '', 'BURGER', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(475, 'BK007', 3, '', 'BURGER JOGLO', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(476, 'BK008', 3, '', 'BURGER KEJU', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(477, 'BK009', 3, '', 'BURGER KEJU ayam', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(478, 'BK010', 3, '', 'BURGER KOSONGAN 4S', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(479, 'BK011', 3, '', 'BLACK burger KEJU', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(480, 'BK012', 3, '', 'BLACK burger KEJU-ayam', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(481, 'BK013', 3, '', 'BULAT KEJU', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(482, 'BK014', 3, '', 'BULAT KEJU kecil', 4, 330.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(483, 'BK015', 3, '', 'BULAT COKLT KEJU kecil (4)', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(484, 'BK016', 3, '', 'COKLAT', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(485, 'BK017', 3, '', 'COKLAT 20gr', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(486, 'BK018', 3, '', 'COKLAT 25gr', 4, 2.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(487, 'BK019', 3, '', 'COKLAT 30gr', 4, 2.80, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(488, 'BK020', 3, '', 'COKLAT 40gr', 4, 3.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(489, 'BK021', 3, '', 'COKLAT 50gr', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(490, 'BK022', 3, '', 'COKLAT filling', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(491, 'BK023', 3, '', 'COKLAT KEJU', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(492, 'BK024', 3, '', 'COKLAT KEJU kecil', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(493, 'BK025', 3, '', 'COKLAT KEJU 50gr', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(494, 'BK026', 3, '', 'CKS (cklt,kj,susu)', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(495, 'BK027', 3, '', 'DURIAN', 4, 3.25, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(496, 'BK028', 3, '', 'KACANG', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(497, 'BK029', 3, '', 'KEJU', 4, 3.25, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(498, 'BK030', 3, '', 'HOTDOG', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(499, 'BK031', 3, '', 'HOKAIDO', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(500, 'BK032', 3, '', 'KISMIS', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(501, 'BK033', 3, '', 'KRENTEN', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(502, 'BK034', 3, '', 'KRENTEN TNPA ISI', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(503, 'BK035', 3, '', 'KRENTEN/4 d bks plastik', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(504, 'BK036', 3, '', 'KRENTEN K DUS BROWNIES', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(505, 'BK037', 3, '', 'KRUMPUL', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(506, 'BK038', 3, '', 'KRUMPUL PERSEGI', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(507, 'BK039', 3, '', 'KURA-KURA', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(508, 'BK040', 3, '', 'NANAS', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(509, 'BK041', 3, '', 'NANAS KECIL', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(510, 'BK042', 3, '', 'PANDAN', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(511, 'BK043', 3, '', 'PISANG B', 4, 13.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(512, 'BK044', 3, '', 'PISANG 40gr', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(513, 'BK045', 3, '', 'PISANG CREAM VANILA', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(514, 'BK046', 3, '', 'PISANG K', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(515, 'BK047', 3, '', 'PK3', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(516, 'BK048', 3, '', 'PISANG COKLAT', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(517, 'BK049', 3, '', 'PISANG COKLAT 50gr', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(518, 'BK050', 3, '', 'PISANG COKLAT 40gr', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(519, 'BK051', 3, '', 'PISANG COKLAT KECIL', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(520, 'BK052', 3, '', 'PISANG KEJU', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(521, 'BK053', 3, '', 'PISANG KEJU KECIL', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(522, 'BK054', 3, '', 'PKK3', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(523, 'BK055', 3, '', 'PIZZA', 4, 16.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(524, 'BK056', 3, '', 'PIZZA K', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(525, 'BK057', 3, '', 'PIZZA sgtga', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(526, 'BK058', 3, '', 'POTATO Flakes', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(527, 'BK059', 3, '', 'SOBEK 5 RASA', 4, 17.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(528, 'BK060', 3, '', 'SOFTBUND', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(529, 'BK061', 3, '', '3 RASA', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(530, 'BK062', 3, '', 'SOBEK COKLAT K', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(531, 'BK063', 3, '', 'SOBEK COKLAT BESAR', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(532, 'BK064', 3, '', 'SOBEK COKLAT KEJU', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(533, 'BK065', 3, '', 'SAPI', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(534, 'BK066', 3, '', 'SAPI 40gr', 4, 8.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(535, 'BK067', 3, '', 'SAPI 30gr', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(536, 'BK068', 3, '', 'SARIKAYA PANDAN', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(537, 'BK069', 3, '', 'SISIR', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(538, 'BK070', 3, '', 'SISIR PUTIH', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(539, 'BK071', 3, '', 'SOBEK KEJU', 4, 9.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(540, 'BK072', 3, '', 'SOBEK KACANG', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(541, 'BK073', 3, '', 'SOBEK KISMIS', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(542, 'BK074', 3, '', 'SOBEK NANAS', 4, 22.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(543, 'BK075', 3, '', 'SOBEK PISANG', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(544, 'BK076', 3, '', 'SOBEK SUSU', 4, 13.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(545, 'BK077', 3, '', 'SOSIS TOP ABON', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(546, 'BK078', 3, '', 'STRAWBERRY', 4, 3.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(547, 'BK079', 3, '', 'SUSU', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(548, 'BK080', 3, '', 'TOPING CREAM', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(549, 'BK081', 3, '', 'TOPIING MOCCA', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(550, 'BK082', 3, '', 'TOPING COKLAT', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(551, 'BK083', 3, '', 'TOPING VANILA KACANG', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(552, 'BK084', 3, '', 'RASBERRY', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(553, 'BK085', 3, '', 'UNYIL', 4, 14.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(554, 'BK086', 3, '', 'UNYIL BJ', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(555, 'BK087', 3, '', 'UNYIL DUS ISI 10', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(556, 'BK088', 3, '', 'ROTI SEMIR 50gr', 4, 9.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(557, 'BK089', 3, '', 'ROTI SEMIR 60gr', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(558, 'BK090', 3, '', 'ROTI SEMIR', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(559, 'BK091', 3, '', 'SM10', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(560, 'BK092', 3, '', 'SMS10', 4, 7.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(561, 'BK093', 3, '', 'SMC10', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(562, 'BK094', 3, '', 'SMK10', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(563, 'BK095', 3, '', 'SMR10', 4, 11.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(564, 'BK096', 3, '', 'SMST10', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(565, 'BK097', 3, '', 'SM5', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(566, 'BK098', 3, '', 'SMS5', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(567, 'BK099', 3, '', 'SMC5', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(568, 'BK100', 3, '', 'SMK5', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(569, 'BK101', 3, '', 'SMR5', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(570, 'BK102', 3, '', 'SMST5', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(571, 'BK103', 3, '', 'SEMIR KOSONG 10', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(572, 'BK104', 3, '', 'SEMIR KOSONG 5', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(573, 'BK105', 3, '', 'SEMIR KOSONG BIJI', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(574, 'BK106', 3, '', 'KRUMPUL IDOLA', 4, 8.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(575, 'BK107', 3, '', 'KRUMPUL IDOLA PERSEGI', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(576, 'DNT001', 3, '', 'DONAT', 4, 2300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(577, 'DNT002', 3, '', 'DONAT GULA', 4, 2500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(578, 'DNT003', 3, '', 'DONAT MESES', 4, 2800.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(579, 'DNT004', 3, '', 'DONAT MIKA MESES COKLT/WRN', 4, 7000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(580, 'DNT005', 3, '', 'DONAT MIKA SIRAM', 4, 7000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(581, 'DNT006', 3, '', 'DONAT MINI MS/SRM BJ', 4, 1300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(582, 'DNT007', 3, '', 'DONAT MINI KEJU', 4, 1500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(583, 'DNT008', 3, '', 'DONAT SIRAM', 4, 2800.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(584, 'DNT009', 3, '', 'DONAT KEJU', 4, 3300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(585, 'DNT010', 3, '', 'DONAT MESES KEJU', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(586, 'DNT011', 3, '', 'DONAT KACANG', 4, 2800.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(587, 'DNT012', 3, '', 'DONAT SATE', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(588, 'DNT013', 3, '', 'DONAT MESES 65 GR', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(589, 'DNT014', 3, '', 'DONAT SIRAM 65 GR', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(590, 'DNT015', 3, '', 'DONAT KEJU 65 GR', 4, 5500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(591, 'DNT016', 3, '', 'DONAT MESES KEJU 65 GR', 4, 5300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(592, 'DNT017', 3, '', 'DONAT KACANG 65 GR', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(593, 'DNT018', 3, '', 'DONAT KARAKTER', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(594, 'DNT019', 3, '', 'DONAT MINI ISI 10', 4, 17000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(595, 'DNT020', 3, '', 'DONAT BABY ISI 10', 4, 18500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(596, 'DNT021', 3, '', 'DONAT BESAR', 4, 5500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(597, 'DNT022', 3, '', 'DONAT BABY ISI 6', 4, 11000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(598, 'PSTR001', 3, '', 'CROISSANT COKLAT', 4, 4000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(599, 'PSTR002', 3, '', 'CROISSANT PISANG', 4, 4000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(600, 'PSTR003', 3, '', 'CROISSANT KEJU', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(601, 'PSTR004', 3, '', 'CROISSANT KEJU COKLAT', 4, 6500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(602, 'PSTR005', 3, '', 'CROISSANT KEJU PANJANG', 4, 5500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(603, 'PSTR006', 3, '', 'CROISSANT CRUMBLE', 4, 4500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(604, 'PSTR007', 3, '', 'PASTRY SAPI', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(605, 'PSTR008', 3, '', 'PEAR PASTRY', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(606, 'PSTR009', 3, '', 'APPLE PASTRY', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(607, 'PSTR010', 3, '', 'PASTRY ISI KACANG', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(608, 'PSTR011', 3, '', 'PASTRY ISI COKLAT ', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(609, 'PSTR012', 3, '', 'PASTRY ISI NANAS', 4, 4000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(610, 'PSTR013', 3, '', 'DANISH PASTRY', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(611, 'PSTR014', 3, '', 'FRUIT PASTRY BULAT', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(612, 'PSTR015', 3, '', 'PIE BULAN SABIT', 4, 6500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(613, 'PSTR016', 3, '', 'PIE NANAS', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(614, 'PSTR017', 3, '', 'PIE PISANG COKLAT', 4, 4000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(615, 'PSTR018', 3, '', 'PIE NANAS DUS ISI 6', 4, 22500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(616, 'PSTR019', 3, '', 'PIE PISCOK DUS ISI 6', 4, 25500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(617, 'PSTR020', 3, '', 'PIE TELUR/SUSU', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(618, 'PSTR021', 3, '', 'ALMOND DANISH', 4, 5000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(619, 'PSTR022', 3, '', 'PIE BUAH', 4, 2000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(620, 'PSTR023', 3, '', 'NASTAR JAMBU', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(621, 'PSTR024', 3, '', 'NASTAR JAMBU DUS ISI 10', 4, 32000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(622, 'PSTR025', 3, '', 'PASTRY CERRY', 4, 2750.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(623, 'PSTR026', 3, '', 'PASTRY ISI KEJU', 4, 6000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(624, 'BRO001', 3, '', 'BROWNIES OVEN KECIL', 4, 14000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(625, 'BRO002', 3, '', 'BROWNIES OVEN BESAR', 4, 24000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(626, 'BRO003', 3, '', 'BROWNIES OVEN UTUH 30CM+DUS', 4, 80000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(627, 'BRO004', 3, '', 'BROWNIES MINI TART 10CM', 4, 7500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(628, 'BRO005', 3, '', 'BROWNIES PT', 4, 2000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(629, 'BRO006', 3, '', 'BROWNIES DUO CKLT ALMOND', 4, 29000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(630, 'BRO007', 3, '', 'BROWNIES DUO CKLT STRAWBERY', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(631, 'BRO008', 3, '', 'BROWNIES DUO CKLT GREENTEA', 4, 32000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(632, 'BRO009', 3, '', 'BROWNIES DUO ALMOND STRAWBERY', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(633, 'BRO010', 3, '', 'BROWNIES DUO ALMOND GREENTEA', 4, 32000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(634, 'BRO011', 3, '', 'BROWNIES OVEN ALMOND', 4, 29000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(635, 'BRO012', 3, '', 'BROWNIES OVEN STRAWBERY', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(636, 'BRO013', 3, '', 'BROWNIES TOPING COKLAT RAINBOW', 4, 35000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(637, 'BRO014', 3, '', 'BROWNIES KUKUS 30X30CM', 4, 35000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(638, 'BRO015', 3, '', 'BROWNIES KUKUS BESAR', 4, 35000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(639, 'BRO016', 3, '', 'BROWNIES KUKUS KECIL', 4, 35000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(640, 'RL01', 3, '', 'ROLL TIGER KECIL', 4, 11000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(641, 'RL02', 3, '', 'ROLL TIGER BESAR', 4, 13000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(642, 'RL03', 3, '', 'ROLL TIGER PB', 4, 14000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(643, 'RL04', 3, '', 'ROLL SPESIAL UTUH', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(644, 'RL05', 3, '', 'ROLL SPESIAL PT', 4, 2300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(645, 'RL06', 3, '', 'ROLL SPESIAL PB', 4, 31000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(646, 'RL07', 3, '', 'ROLL SPESIAL PANDAN UTUH', 4, 30000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(647, 'RL08', 3, '', 'ROLL SPESIAL PANDA PT', 4, 2300.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(648, 'RL09', 3, '', 'ROLL SPESIAL PANDAN PB', 4, 31000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(649, 'RL10', 3, '', 'ROLL BSA UTUH', 4, 18000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(650, 'RL11', 3, '', 'ROLL BSA PT', 4, 1600.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(651, 'RL12', 3, '', 'ROLL SP 2 LPS', 4, 33000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(652, 'RL13', 3, '', 'ROLL BATIK', 4, 38000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(653, 'RL14', 3, '', 'ROLL RAINBOW UTUH', 4, 40000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(654, 'RL15', 3, '', 'ROLL RAINBOW PT', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(655, 'RL16', 3, '', 'ROLL RAINBOW PB', 4, 41000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(656, 'RL17', 3, '', 'ROLL SOFT CAKE', 4, 20000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(657, 'RL18', 3, '', 'ROLL MINI PANDAN PT', 4, 1800.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(658, 'RL19', 3, '', 'ROLL MINI PANDAN PT 12', 4, 20000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(659, 'RL20', 3, '', 'ROLL MINI CHEESE PT', 4, 2000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(660, 'RL21', 3, '', 'ROLL MINI CHESE PT 12', 4, 22000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(661, 'RL22', 3, '', 'PANDAN ROLL B UTUH', 4, 38000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(662, 'RL23', 3, '', 'PANDAN ROLL B PT 14', 4, 3000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(663, 'RL24', 3, '', 'CHEESE ROLL B UTUH', 4, 43000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(664, 'RL25', 3, '', 'CHEESE ROLL B PT 14', 4, 3500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(665, 'RL26', 3, '', 'ROLL MN COK/KC 4X7', 4, 2000.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(666, 'RL27', 3, '', 'ROLL MN COK/KC 4X6', 4, 2200.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(667, 'RL28', 3, '', 'ROLL MN COK/KC 4X5', 4, 2500.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(668, 'RL29', 3, '', 'ROLL RAINBOW UTUH', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(669, 'RL30', 3, '', 'ROLL RAINBOW PB', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(670, 'RL31', 3, '', 'ROLL ABON SAPI', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(671, 'RL32', 3, '', 'ROLL ABON SAPI 4S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(672, 'RL33', 3, '', 'ROLL ABON 8S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(673, 'RL34', 3, '', 'ROLL KEJU', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(674, 'RL35', 3, '', 'ROLL KEJU 8S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(675, 'RL36', 3, '', 'ROLL KEJU 4S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(676, 'RL37', 3, '', 'ROLL ABON TUNA', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(677, 'RL38', 3, '', 'ROLL ABON TUNA 4S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(678, 'RL39', 3, '', 'ROLL ABON TUNA 8S', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(679, 'RL40', 3, '', 'ROLL TIGER DUS ISI 24', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(680, 'CP001', 3, '', 'ZEBRA', 4, 1.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(681, 'CP002', 3, '', 'chif', 4, 25.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(682, 'CP003', 3, '', 'ZEBRA P/B (ISI 30)', 4, 31.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(683, 'CP004', 3, '', 'BOLU CAKE 12pt/bj', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(684, 'CP005', 3, '', 'BOLU CAKE PANJANG', 4, 16.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(685, 'CP006', 3, '', 'BOLU CAKE 30pt/bj', 4, 1.20, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(686, 'CP007', 3, '', 'BOLU CAKE P/B (30bj)', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(687, 'CP008', 3, '', 'SPIKU BIASA/POTONG', 4, 1.80, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(688, 'CP009', 3, '', 'SPIKU BIASA/PACK 12bj', 4, 21.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(689, 'CP010', 3, '', 'SPIKU BIASA DUS ISI 20', 4, 36.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(690, 'CP011', 3, '', 'SP BS 30X40 2pls TIPIS', 4, 80.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(691, 'CP012', 3, '', 'SP BS 30X40 2LPS TIPIS P/B', 4, 85.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(692, 'CP013', 3, '', 'SP BS 30X40 2LPS TEBAL P/B', 4, 130.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(693, 'CP014', 3, '', 'SPIKU MM UTUH 20cm', 4, 23.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(694, 'CP015', 3, '', 'SPIKU MM P/B', 4, 25.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(695, 'CP016', 3, '', 'CHIFFON CAKE POTONG', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(696, 'CP017', 3, '', 'CHIFFON CAKE UTUH', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(697, 'CP018', 3, '', 'CHIFFON CAKE P/B', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(698, 'CP019', 3, '', 'CHIFFON K', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(699, 'CP020', 3, '', 'ROLL TIGER KECIL', 4, 10.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(700, 'CP021', 3, '', 'ROLL TIGER BESAR', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(701, 'CP022', 3, '', 'ROLL BIASA POLOS', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(702, 'CP023', 3, '', 'BROWNIES KUKUS 30X30CM', 4, 90.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(703, 'CP024', 3, '', 'BROWNIES KUKUS BESAR', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(704, 'CP025', 3, '', 'BROWNIES KUKUS KECIL', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(705, 'CP026', 3, '', 'SUS RAGUT', 4, 1.90, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(706, 'CP027', 3, '', 'SUS FLA', 4, 1.70, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(707, 'CP028', 3, '', 'SUS ROLL PT 6BJ', 4, 2.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(708, 'CP029', 3, '', 'SUS ROLL PT 7BJ', 4, 1.80, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(709, 'CP030', 3, '', 'SUS ROLL PT 8BJ', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(710, 'CP031', 3, '', 'KROKET', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(711, 'CP032', 3, '', 'TAWAR RAGUT', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(712, 'CP033', 3, '', 'KABIN RAGUT', 4, 1.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(713, 'CP034', 3, '', 'PIE PEPAYA', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(714, 'CP035', 3, '', 'PIE KEJU', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(715, 'CP036', 3, '', 'MARMER UTUH', 4, 26.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(716, 'CP037', 3, '', 'MARMER P/B', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(717, 'CP038', 3, '', 'MARMER POTONG', 4, 1.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(718, 'CP039', 3, '', 'MARMER BULAT', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(719, 'CP040', 3, '', 'MARMER PELANGI UTUH', 4, 110.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(720, 'CP041', 3, '', 'MARMER PELANGI P/B 75PT', 4, 115.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(721, 'CP042', 3, '', 'MARMER PELANGI POTONG', 4, 1.60, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(722, 'CP043', 3, '', 'MARMER PELANGI BLOK 15PT', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(723, 'CP044', 3, '', 'MARMER PELANGI 2 LAPIS UTUH', 4, 82.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(724, 'CP045', 3, '', 'MARMER PELANGI 2 LAPIS P/B', 4, 87.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(725, 'CP046', 3, '', 'SPIKU MM KTK 24cm UTUH', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(726, 'CP047', 3, '', 'SPIKU MM KTK 26cm UTUH', 4, 40.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(727, 'CP048', 3, '', 'SPIKU MM KTK 30cm UTUH', 4, 55.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(728, 'CP049', 3, '', 'SPIKU bs KTK 20cm UTUH', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(729, 'CP050', 3, '', 'SPIKU bs KTK 24cm UTUH', 4, 45.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(730, 'CP051', 3, '', 'SPIKU bs KTK 26cm UTUH', 4, 55.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(731, 'CP052', 3, '', 'SPIKU bs KTK 30cm UTUH', 4, 75.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(732, 'CP053', 3, '', 'SPIKU sp/spiku MANDARIN 20cm KTK UTUH', 4, 47.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(733, 'CP054', 3, '', 'SPIKU sp/spiku MANDARIN 24cm KTK UTUH', 4, 70.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(734, 'CP055', 3, '', 'SPIKU sp/spiku MANDARIN 26cm KTK UTUH', 4, 80.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(735, 'CP056', 3, '', 'SPIKU sp/spiku MANDARIN 30cm KTK UTUH', 4, 100.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(736, 'CP057', 3, '', 'BOLU cake 20cm KTK UTUH', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(737, 'CP058', 3, '', 'SPIKU MM 16cm BLT', 4, 15.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(738, 'CP059', 3, '', 'SPIKU MM 20cm BLT', 4, 21.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(739, 'CP060', 3, '', 'SPIKU MM 26cm BLT', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(740, 'CP061', 3, '', 'SPIKU MM 30cm BLT', 4, 45.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(741, 'CP062', 3, '', 'SPIKU bs 16cm BLT', 4, 17.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(742, 'CP063', 3, '', 'SPIKU bs 20cm BLT', 4, 27.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(743, 'CP064', 3, '', 'SPIKU bs 26cm BLT', 4, 50.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(744, 'CP065', 3, '', 'SPIKU bs 30cm BLT', 4, 65.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(745, 'CP066', 3, '', 'SPIKU bs isi 24bj', 4, 0.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(746, 'CP067', 3, '', 'SPIKU MM 20cm MIKA', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(747, 'CP068', 3, '', 'ROLL TIGER Pb', 4, 12.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(748, 'CP069', 3, '', 'SPIKU BSA tebal (75pt)', 4, 120.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(749, 'CP070', 3, '', 'SPIKU BSA  TEBAL UTUH SELAI', 4, 125.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(750, 'CP071', 3, '', 'SPIKU BSA TEBAL P/B SELAI', 4, 130.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(751, 'CP072', 3, '', 'SPIKU BSA  20BJ', 4, 34.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(752, 'CP073', 3, '', 'SPIKU BSA tipis 75bj', 4, 85.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(753, 'CP074', 3, '', 'MARMER TOPPING', 4, 35.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(754, 'CP075', 3, '', 'MARMER BLOK PDN', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(755, 'CP076', 3, '', 'MARMER LOREK PDN', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(756, 'CP077', 3, '', 'MARMER BLOK STRW', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(757, 'CP078', 3, '', 'MARMER LOREK STRAW', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(758, 'CP079', 3, '', 'MARMER STRW PDN', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(759, 'CP080', 3, '', 'MARMER LOREK UNGU', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(760, 'CP081', 3, '', 'CHIF. COKLAT PB', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(761, 'CP082', 3, '', 'CHIF. VANILA PB', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(762, 'CP083', 3, '', 'CHIF. KECIL COKLAT', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(763, 'CP084', 3, '', 'SPIKU BSA tipis 30bj', 4, 36.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(764, 'CP085', 3, '', 'SPIKU BSA tipis MIKA 5bj', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(765, 'CP086', 3, '', 'SPIKU TIPIS bj', 4, 1.20, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(766, 'CP087', 3, '', 'MARMER PDN-ORANGE PB', 4, 29.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(767, 'CP088', 3, '', 'TIGER LAPIS ISI 30', 4, 28.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(768, 'CP089', 3, '', 'CHIFFON pb lebaran', 4, 30.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(769, 'CP090', 3, '', 'marmer bj pt.24', 4, 1.30, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(770, 'CP091', 3, '', 'LAPIS NEOPOLITAN', 4, 49.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(771, 'CP092', 3, '', 'ZUPPA SOUP', 4, 9.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(772, 'CP093', 3, '', 'PIE SUSU ISI 6', 4, 20.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(773, 'CP094', 3, '', 'lapis legit ktk mk', 4, 55.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(774, 'CP095', 3, '', 'LAPIS LEGIT KTK PT', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(775, 'RCG001', 3, '', 'CROISSANT COKLAT', 4, 3.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(776, 'RCG002', 3, '', 'CROISSANT PISANG', 4, 3.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(777, 'RCG003', 3, '', 'CROISSANT KEJU', 4, 3.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(778, 'RCG004', 3, '', 'CROISSANT COKLAT KEJU', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(779, 'RCG005', 3, '', 'CROISSANT KEJU PANJANG', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(780, 'RCG006', 3, '', 'CROISSANT CRUMPBLE', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(781, 'RCG007', 3, '', 'PASTRY SAPI', 4, 5.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(782, 'RCG008', 3, '', 'APPLE PASTRY', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(783, 'RCG009', 3, '', 'PASTRY ISI KACANG', 4, 2.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(784, 'RCG010', 3, '', 'DANISH PASTRY', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(785, 'RCG011', 3, '', 'FRUIT PASTRY BULAT', 4, 2.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(786, 'RCG012', 3, '', 'PIE BULAN SABIT', 4, 6.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(787, 'RCG013', 3, '', 'PIE NANAS', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(788, 'RCG014', 3, '', 'PIE PISANG COKLAT', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(789, 'RCG015', 3, '', 'PIE TELUR', 4, 2.25, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(790, 'RCG016', 3, '', 'ALMOND DANISH', 4, 4.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(791, 'RCG017', 3, '', 'NASTAR JAMBU', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(792, 'RCG018', 3, '', 'PIE BUAH', 4, 1.85, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(793, 'RCG019', 3, '', 'PASTRY CERRY', 4, 2.75, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(794, 'RCG020', 3, '', 'CROISSANT 50GR', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(795, 'RCG021', 3, '', 'PASTRY ISI NANAS', 4, 3.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(796, 'RCG022', 3, '', 'PASTRY ISI ABON', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(797, 'RCG023', 3, '', 'PASTRY ISI COKLAT', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(798, 'RCG024', 3, '', 'PASTRY ISI KEJU', 4, 6.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(799, 'RCG025', 3, '', 'PASTRY APPLE', 4, 5.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(800, 'RCG026', 3, '', 'DANISH PASTRY lebaran', 4, 4.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(801, 'RCG027', 3, '', 'Pie nanas dus isi 6', 4, 22.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(802, 'RCG028', 3, '', 'Pie piscoklt dus isi 6', 4, 25.50, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(803, 'RCG029', 3, '', 'NASTAR JAMBU DUS', 4, 32.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(804, 'RCG030', 3, '', 'PIE BULAN SABIT DUS', 4, 27.00, 0.00, '', 'Y', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(1409, 'i_code', 3, 'i_typ', 'i_name', 4, 0.00, 0.00, '', 'Y', 'i_det', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `m_item` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_machine
CREATE TABLE IF NOT EXISTS `m_machine` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_type` char(50) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `m_active` char(50) DEFAULT NULL,
  `m_insert` date DEFAULT NULL,
  `m_update` date DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_machine: ~2 rows (approximately)
DELETE FROM `m_machine`;
/*!40000 ALTER TABLE `m_machine` DISABLE KEYS */;
INSERT INTO `m_machine` (`m_id`, `m_type`, `m_name`, `m_active`, `m_insert`, `m_update`) VALUES
	(2, 'Toko', 'Kasir 1', NULL, NULL, NULL),
	(3, 'Toko', 'Kasir 2', NULL, NULL, NULL);
/*!40000 ALTER TABLE `m_machine` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_paymentmethod
CREATE TABLE IF NOT EXISTS `m_paymentmethod` (
  `pm_id` tinyint(4) NOT NULL,
  `pm_year` varchar(50) DEFAULT NULL,
  `pm_name` varchar(50) DEFAULT NULL,
  `pm_coa_comp` varchar(10) NOT NULL,
  `pm_coa_year` varchar(4) NOT NULL,
  `pm_coa_code` varchar(9) NOT NULL,
  `pm_firur` varchar(50) DEFAULT NULL,
  `pm_active` enum('Y','N') DEFAULT 'Y',
  `pm_insert` timestamp NULL DEFAULT NULL,
  `pm_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_paymentmethod: ~6 rows (approximately)
DELETE FROM `m_paymentmethod`;
/*!40000 ALTER TABLE `m_paymentmethod` DISABLE KEYS */;
INSERT INTO `m_paymentmethod` (`pm_id`, `pm_year`, `pm_name`, `pm_coa_comp`, `pm_coa_year`, `pm_coa_code`, `pm_firur`, `pm_active`, `pm_insert`, `pm_update`) VALUES
	(1, '2018', 'TUNAI', 'RMZ-', '2018', '1010.....', 'Penjualan', 'Y', NULL, NULL),
	(2, '2018', 'BCA', '', '2018', '1010.....', 'Penjualan', 'Y', NULL, NULL),
	(3, '2018', 'MANDIRI', '', '2018', '', 'Penjualan', 'Y', NULL, NULL),
	(4, '2018', 'BNI', '', '2018', '', 'Penjualan', 'Y', NULL, NULL),
	(5, '2018', 'BRI', '', '2018', '', 'Penjualan', 'Y', NULL, NULL),
	(6, '2018', 'HUTANG', '', '2018', '', 'Penjualan', 'Y', NULL, NULL);
/*!40000 ALTER TABLE `m_paymentmethod` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_price
CREATE TABLE IF NOT EXISTS `m_price` (
  `m_pid` int(11) NOT NULL AUTO_INCREMENT,
  `m_pitem` int(11) NOT NULL DEFAULT '0',
  `m_pbuy1` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Beli/Satuan Utama',
  `m_pbuy2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Beli/Satuan2',
  `m_pbuy3` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Beli/Satuan3',
  `m_psell1` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Jual/Satuan Utama',
  `m_psell2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Jual/Satuan2',
  `m_psell3` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Harga Jual/Satuan3',
  `m_pcreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `m_pupdated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`m_pid`)
) ENGINE=InnoDB AUTO_INCREMENT=646 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_price: ~645 rows (approximately)
DELETE FROM `m_price`;
/*!40000 ALTER TABLE `m_price` DISABLE KEYS */;
INSERT INTO `m_price` (`m_pid`, `m_pitem`, `m_pbuy1`, `m_pbuy2`, `m_pbuy3`, `m_psell1`, `m_psell2`, `m_psell3`, `m_pcreated`, `m_pupdated`) VALUES
	(1, 1, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(2, 2, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(3, 3, 5888.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(4, 4, 11000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(5, 5, 50.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(6, 6, 94500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(7, 7, 210.52, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(8, 8, 6340.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(9, 9, 68000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(10, 10, 1090.90, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(11, 11, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(12, 12, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(13, 13, 2000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(14, 14, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(15, 15, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(16, 16, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(17, 17, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(18, 18, 34000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(19, 19, 57000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(20, 20, 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(21, 21, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(22, 22, 23000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(23, 23, 6600.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(24, 24, 13666.66, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(25, 25, 9466.66, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(26, 26, 57000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(27, 27, 4750.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(28, 28, 84400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(29, 29, 6174.93, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(30, 30, 33583.33, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(31, 31, 122000.00, 0.00, 0.00, 137000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(32, 32, 200000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(33, 33, 5500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(34, 34, 1345.83, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(35, 35, 103000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(36, 36, 25000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(37, 37, 16500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', '2018-06-28 09:54:18'),
	(38, 38, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(39, 39, 10833.33, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(40, 40, 30000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(41, 41, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(42, 42, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(43, 43, 43000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(44, 44, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(45, 45, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(46, 46, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(47, 47, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(48, 48, 32615.38, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(49, 49, 10520.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(50, 50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(51, 51, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(52, 52, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(53, 53, 15500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(54, 54, 11555.55, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(55, 55, 9400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(56, 56, 80.00, 0.00, 0.00, 5750.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(57, 57, 180.00, 0.00, 0.00, 160000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(58, 58, 120.00, 0.00, 0.00, 115000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(59, 59, 150.00, 0.00, 0.00, 130000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(60, 60, 170.00, 0.00, 0.00, 150000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(61, 61, 20000.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(62, 62, 16000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(63, 63, 120.00, 0.00, 0.00, 9500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(64, 64, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(65, 65, 58000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(66, 66, 24000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(67, 67, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(68, 68, 6520.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(69, 69, 35000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(70, 70, 35000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(71, 71, 36000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(72, 72, 144000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(73, 73, 120.00, 0.00, 0.00, 9000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(74, 74, 110.00, 0.00, 0.00, 8000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(75, 75, 100.00, 0.00, 0.00, 6500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(76, 76, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(77, 77, 180.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(78, 78, 21458.33, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(79, 79, 0.00, 0.00, 0.00, 98000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(80, 80, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(81, 81, 0.00, 0.00, 0.00, 28000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(82, 82, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(83, 83, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(84, 84, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(85, 85, 45000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(86, 86, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(87, 87, 750.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(88, 88, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(89, 89, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(90, 90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(91, 91, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(92, 92, 11000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(93, 93, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(94, 94, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(95, 95, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(96, 96, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(97, 97, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(98, 98, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(99, 99, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(100, 100, 36750.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(101, 101, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(102, 102, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(103, 103, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(104, 104, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(105, 105, 45000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(106, 106, 42500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(107, 107, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(108, 108, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(109, 109, 35000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(110, 110, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(111, 111, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(112, 112, 19800.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(113, 113, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(114, 114, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(115, 115, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(116, 116, 39000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(117, 117, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(118, 118, 24066.66, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(119, 119, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(120, 120, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(121, 121, 1345.83, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(122, 122, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(123, 123, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(124, 124, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(125, 125, 20000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(126, 126, 20000.00, 0.00, 0.00, 285000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(127, 127, 0.00, 0.00, 0.00, 825000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(128, 128, 1345.83, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(129, 129, 0.00, 0.00, 0.00, 825000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(130, 130, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(131, 131, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(132, 132, 350.00, 0.00, 0.00, 218000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(133, 133, 1345.83, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(134, 134, 1345.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(135, 135, 1345.83, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(136, 136, 1345.83, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(137, 137, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(138, 138, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(139, 139, 65500.00, 0.00, 0.00, 109000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(140, 140, 24499.00, 0.00, 0.00, 18300.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(141, 141, 0.00, 0.00, 0.00, 700000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(142, 142, 12000.00, 0.00, 0.00, 12350.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(143, 143, 1354.33, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(144, 144, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(145, 145, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(146, 146, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(147, 147, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(148, 148, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(149, 149, 380.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(150, 150, 360.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(151, 151, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(152, 152, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(153, 153, 4400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(154, 154, 60.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(155, 155, 35.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(156, 156, 25.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(157, 157, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(158, 158, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(159, 159, 230.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(160, 160, 0.00, 0.00, 0.00, 12000.00, 13000.00, 0.00, '2018-06-05 02:58:18', '2018-06-29 03:47:12'),
	(161, 161, 0.00, 0.00, 0.00, 1000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(162, 162, 12941.52, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', '2018-06-27 23:05:54'),
	(163, 163, 32500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', '2018-06-27 23:27:11'),
	(164, 164, 16000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(165, 165, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(166, 166, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(167, 167, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(168, 168, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(169, 169, 3849.49, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(170, 170, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(171, 171, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(172, 172, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(173, 173, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(174, 174, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(175, 175, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(176, 176, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(177, 177, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(178, 178, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(179, 179, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(180, 180, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(181, 181, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(182, 182, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(183, 183, 19000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(184, 184, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(185, 185, 17000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(186, 186, 28000.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(187, 187, 115000.00, 0.00, 0.00, 130000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(188, 188, 68400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(189, 189, 190000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(190, 190, 65000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(191, 191, 35000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(192, 192, 18055.55, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(193, 193, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(194, 194, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(195, 195, 5000.00, 0.00, 0.00, 5000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(196, 196, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(197, 197, 15600.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(198, 198, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(199, 199, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(200, 200, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(201, 201, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(202, 202, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(203, 203, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(204, 204, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(205, 205, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(206, 206, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(207, 207, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(208, 208, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(209, 209, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(210, 210, 3500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(211, 211, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(212, 212, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(213, 213, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(214, 214, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(215, 215, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(216, 216, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(217, 217, 1345.83, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(218, 218, 0.00, 0.00, 0.00, 3500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(219, 219, 0.00, 0.00, 0.00, 3500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(220, 220, 0.00, 0.00, 0.00, 3500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(221, 221, 0.00, 0.00, 0.00, 3500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(222, 222, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(223, 223, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(224, 224, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(225, 225, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(226, 226, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(227, 227, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(228, 228, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(229, 229, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(230, 230, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(231, 231, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(232, 232, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(233, 234, 26500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(234, 235, 102000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(235, 236, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(236, 237, 30000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(237, 238, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(238, 239, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(239, 240, 12003.75, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(240, 241, 23000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(241, 242, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(242, 243, 10900.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(243, 244, 16800.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(244, 245, 14440.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(245, 246, 12825.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(246, 247, 22600.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(247, 248, 85000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(248, 249, 8000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(249, 250, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(250, 251, 98300.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(251, 252, 9400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(252, 253, 7000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(253, 254, 39695.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(254, 255, 15000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(255, 256, 225000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(256, 257, 11800.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(257, 258, 69400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(258, 259, 4900.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(259, 260, 22600.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(260, 261, 2040.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(261, 262, 2040.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(262, 263, 0.00, 0.00, 0.00, 49000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(263, 264, 10500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(264, 265, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(265, 266, 0.00, 0.00, 0.00, 43000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(266, 267, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(267, 268, 17500.00, 0.00, 0.00, 23500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(268, 269, 525000.00, 0.00, 0.00, 4167.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(269, 270, 2000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(270, 271, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(271, 272, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(272, 273, 200.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(273, 274, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(274, 275, 14000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(275, 276, 8000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(276, 277, 0.00, 0.00, 0.00, 45000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(277, 278, 52500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(278, 279, 14000.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(279, 280, 100000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(280, 281, 16000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(281, 282, 0.00, 0.00, 0.00, 2000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(282, 283, 0.00, 0.00, 0.00, 3200.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(283, 284, 2000.00, 0.00, 0.00, 2000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(284, 285, 1268.00, 0.00, 0.00, 2500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(285, 286, 0.00, 0.00, 0.00, 1400.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(286, 287, 1932.00, 0.00, 0.00, 5000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(287, 288, 0.00, 0.00, 0.00, 13000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(288, 289, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(289, 290, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(290, 291, 0.00, 0.00, 0.00, 4000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(291, 292, 0.00, 0.00, 0.00, 16000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(292, 293, 4791.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(293, 294, 0.00, 0.00, 0.00, 10500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(294, 295, 0.00, 0.00, 0.00, 12500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(295, 296, 0.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(296, 297, 0.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(297, 298, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(298, 299, 15165.49, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(299, 300, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(300, 301, 633079.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(301, 302, 20000.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(302, 303, 7708.05, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(303, 304, 5076.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(304, 305, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(305, 306, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(306, 307, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(307, 308, 0.00, 0.00, 0.00, 18600.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(308, 309, 0.00, 0.00, 0.00, 12500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(309, 310, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(310, 311, 15643.33, 0.00, 0.00, 27000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(311, 312, 8508.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(312, 313, 0.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(313, 314, 0.00, 0.00, 0.00, 31000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(314, 315, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(315, 316, 0.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(316, 317, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(317, 318, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(318, 319, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(319, 320, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(320, 321, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(321, 322, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(322, 323, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(323, 324, 11376.49, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(324, 325, 22187.62, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(325, 326, 17535.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(326, 327, 6012.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(327, 328, 25000.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(328, 329, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(329, 330, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(330, 331, 32000.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(331, 332, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(332, 333, 19000.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(333, 334, 0.00, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(334, 335, 11167.00, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(335, 336, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(336, 337, 11264.23, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(337, 338, 21000.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(338, 339, 23000.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(339, 340, 21000.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(340, 341, 9437.50, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(341, 342, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(342, 343, 9856.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(343, 344, 7496.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(344, 345, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(345, 346, 12941.17, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(346, 347, 12096.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(347, 348, 6876.71, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(348, 349, 16965.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(349, 350, 16965.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(350, 351, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(351, 352, 19000.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(352, 353, 0.00, 0.00, 0.00, 28000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(353, 354, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(354, 355, 0.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(355, 356, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(356, 357, 8770.18, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(357, 358, 0.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(358, 359, 21000.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(359, 360, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(360, 361, 8116.82, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(361, 362, 14645.98, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(362, 363, 0.00, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(363, 364, 15000.00, 0.00, 0.00, 26000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(364, 365, 0.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(365, 366, 0.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(366, 367, 0.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(367, 368, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(368, 369, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(369, 370, 3500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(370, 371, 5500.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(371, 372, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(372, 373, 0.00, 0.00, 0.00, 13000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(373, 374, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(374, 375, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(375, 376, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(376, 377, 106000.00, 0.00, 0.00, 96000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(377, 378, 0.00, 0.00, 0.00, 87500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(378, 379, 210000.00, 0.00, 0.00, 225000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(379, 380, 0.00, 0.00, 0.00, 220000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(380, 381, 12000.00, 0.00, 0.00, 12000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(381, 382, 0.00, 0.00, 0.00, 12500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(382, 383, 0.00, 0.00, 0.00, 14000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(383, 384, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(384, 385, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(385, 386, 0.00, 0.00, 0.00, 16000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(386, 387, 97000.00, 0.00, 0.00, 115000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(387, 388, 0.00, 0.00, 0.00, 36000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(388, 389, 28675.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(389, 390, 0.00, 0.00, 0.00, 36000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(390, 391, 110760.00, 0.00, 0.00, 130000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(391, 392, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(392, 393, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(393, 394, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(394, 395, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(395, 396, 0.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(396, 397, 0.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(397, 398, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(398, 399, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(399, 400, 50000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(400, 401, 0.00, 0.00, 0.00, 200000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(401, 402, 0.00, 0.00, 0.00, 30500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(402, 403, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(403, 404, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(404, 405, 1550000.00, 0.00, 0.00, 1950000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(405, 406, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(406, 407, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(407, 408, 230.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(408, 409, 0.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(409, 410, 0.00, 0.00, 0.00, 40000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(410, 411, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(411, 412, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(412, 413, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(413, 414, 0.00, 0.00, 0.00, 500000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(414, 415, 0.00, 0.00, 0.00, 320000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(415, 416, 0.00, 0.00, 0.00, 420000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(416, 417, 290000.00, 0.00, 0.00, 370000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(417, 418, 0.00, 0.00, 0.00, 470000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(418, 419, 335000.00, 0.00, 0.00, 420000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(419, 420, 435000.00, 0.00, 0.00, 520000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(420, 422, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(421, 423, 1400000.00, 0.00, 0.00, 1700000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(422, 424, 60000.00, 0.00, 0.00, 200000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(423, 425, 0.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(424, 426, 0.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(425, 427, 0.00, 0.00, 0.00, 110000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(426, 428, 0.00, 0.00, 0.00, 400000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(427, 429, 0.00, 0.00, 0.00, 90000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(428, 430, 59280.00, 0.00, 0.00, 55000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(429, 431, 0.00, 0.00, 0.00, 110000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(430, 432, 17500.00, 0.00, 0.00, 19500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(431, 433, 0.00, 0.00, 0.00, 22000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(432, 434, 0.00, 0.00, 0.00, 2300000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(433, 435, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(434, 436, 0.00, 0.00, 0.00, 218000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(435, 437, 0.00, 0.00, 0.00, 115000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(436, 438, 1800.00, 0.00, 0.00, 2500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(437, 439, 0.00, 0.00, 0.00, 3000000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(438, 440, 52910.00, 0.00, 0.00, 63000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(439, 441, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(440, 442, 250000.00, 0.00, 0.00, 270000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(441, 443, 195000.00, 0.00, 0.00, 225000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(442, 444, 0.00, 0.00, 0.00, 16000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(443, 445, 0.00, 0.00, 0.00, 60000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(444, 446, 0.00, 0.00, 0.00, 115000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(445, 447, 15500.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(446, 448, 0.00, 0.00, 0.00, 16500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(447, 449, 10000.00, 0.00, 0.00, 13000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(448, 450, 201000.00, 0.00, 0.00, 230000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(449, 451, 0.00, 0.00, 0.00, 122000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(450, 452, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(451, 453, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(452, 454, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(453, 455, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(454, 456, 50000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(455, 457, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(456, 458, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(457, 459, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(458, 460, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(459, 461, 0.00, 0.00, 0.00, 219000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(460, 462, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(461, 463, 0.00, 0.00, 0.00, 23600.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(462, 464, 0.00, 0.00, 0.00, 23600.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(463, 465, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(464, 466, 0.00, 0.00, 0.00, 11700.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(465, 467, 0.00, 0.00, 0.00, 7900.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(466, 468, 0.00, 0.00, 0.00, 1900.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(467, 469, 0.00, 0.00, 0.00, 46200.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(468, 470, 0.00, 0.00, 0.00, 22700.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(469, 471, 0.00, 0.00, 0.00, 77900.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(470, 472, 0.00, 0.00, 0.00, 20700.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(471, 473, 0.00, 0.00, 0.00, 28400.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(472, 474, 0.00, 0.00, 0.00, 35400.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(473, 475, 0.00, 0.00, 0.00, 63100.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(474, 476, 0.00, 0.00, 0.00, 42600.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(475, 477, 0.00, 0.00, 0.00, 34300.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(476, 478, 0.00, 0.00, 0.00, 12400.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(477, 479, 0.00, 0.00, 0.00, 16000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(478, 480, 0.00, 0.00, 0.00, 110000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(479, 481, 0.00, 0.00, 0.00, 75000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(480, 482, 440.00, 0.00, 0.00, 60000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(481, 483, 0.00, 0.00, 0.00, 55000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(482, 484, 0.00, 0.00, 0.00, 2400000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(483, 485, 0.00, 0.00, 0.00, 2200000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(484, 486, 11000.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(485, 487, 90000.00, 0.00, 0.00, 110000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(486, 488, 16095.00, 0.00, 0.00, 23000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(487, 489, 21367.50, 0.00, 0.00, 28000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(488, 490, 0.00, 0.00, 0.00, 300000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(489, 491, 0.00, 0.00, 0.00, 40000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(490, 492, 0.00, 0.00, 0.00, 45000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(491, 493, 0.00, 0.00, 0.00, 70000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(492, 494, 0.00, 0.00, 0.00, 110000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(493, 495, 0.00, 0.00, 0.00, 113000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(494, 496, 65212.50, 0.00, 0.00, 75000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(495, 497, 0.00, 0.00, 0.00, 375000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(496, 498, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(497, 499, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(498, 500, 0.00, 0.00, 0.00, 102000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(499, 501, 0.00, 0.00, 0.00, 102000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(500, 502, 18000.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(501, 503, 0.00, 0.00, 0.00, 45000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(502, 504, 0.00, 0.00, 0.00, 45000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(503, 505, 216520.00, 0.00, 0.00, 257000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(504, 506, 0.00, 0.00, 0.00, 425000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(505, 507, 0.00, 0.00, 0.00, 450000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(506, 508, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(507, 509, 0.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(508, 510, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(509, 511, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(510, 512, 0.00, 0.00, 0.00, 13500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(511, 513, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(512, 514, 28000.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(513, 515, 25000.00, 0.00, 0.00, 29000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(514, 516, 17000.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(515, 517, 23000.00, 0.00, 0.00, 24000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(516, 518, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(517, 519, 0.00, 0.00, 0.00, 22500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(518, 520, 27000.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(519, 521, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(520, 522, 16000.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(521, 523, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(522, 524, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(523, 525, 20000.00, 0.00, 0.00, 14000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(524, 526, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(525, 527, 0.00, 0.00, 0.00, 225000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(526, 528, 10000.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(527, 529, 57500.00, 0.00, 0.00, 68000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(528, 530, 45000.00, 0.00, 0.00, 55000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(529, 531, 0.00, 0.00, 0.00, 108000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(530, 532, 0.00, 0.00, 0.00, 27500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(531, 533, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(532, 534, 0.00, 0.00, 0.00, 30500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(533, 535, 0.00, 0.00, 0.00, 30000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(534, 536, 0.00, 0.00, 0.00, 800000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(535, 537, 15000.00, 0.00, 0.00, 18000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(536, 538, 0.00, 0.00, 0.00, 535000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(537, 539, 0.00, 0.00, 0.00, 48000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(538, 540, 0.00, 0.00, 0.00, 36000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(539, 541, 0.00, 0.00, 0.00, 39000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(540, 542, 0.00, 0.00, 0.00, 47000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(541, 543, 0.00, 0.00, 0.00, 34000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(542, 544, 0.00, 0.00, 0.00, 15000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(543, 545, 6500.00, 0.00, 0.00, 7000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(544, 546, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(545, 547, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(546, 548, 0.00, 0.00, 0.00, 37000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(547, 549, 0.00, 0.00, 0.00, 90000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(548, 550, 0.00, 0.00, 0.00, 25000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(549, 551, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(550, 552, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(551, 553, 18000.00, 0.00, 0.00, 17000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(552, 554, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(553, 555, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(554, 556, 18000.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(555, 557, 0.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(556, 558, 0.00, 0.00, 0.00, 300000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(557, 559, 0.00, 0.00, 0.00, 11000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(558, 560, 0.00, 0.00, 0.00, 28000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(559, 561, 11000.00, 0.00, 0.00, 10500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(560, 562, 0.00, 0.00, 0.00, 37000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(561, 563, 216520.00, 0.00, 0.00, 257000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(562, 564, 0.00, 0.00, 0.00, 30400.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(563, 565, 0.00, 0.00, 0.00, 30875.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(564, 566, 0.00, 0.00, 0.00, 29450.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(565, 567, 0.00, 0.00, 0.00, 117250.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(566, 568, 0.00, 0.00, 0.00, 125000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(567, 569, 5415.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(568, 570, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(569, 571, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(570, 572, 0.00, 0.00, 0.00, 16000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(571, 574, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(572, 575, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(573, 576, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(574, 577, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(575, 578, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(576, 579, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(577, 580, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(578, 581, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(579, 582, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(580, 583, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(581, 584, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(582, 585, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(583, 586, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(584, 587, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(585, 588, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(586, 589, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(587, 590, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(588, 591, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(589, 592, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(590, 593, 0.00, 0.00, 0.00, 35000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(591, 594, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(592, 595, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(593, 596, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(594, 597, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(595, 598, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(596, 599, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(597, 600, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(598, 601, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(599, 602, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(600, 603, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(601, 604, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(602, 605, 41000.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(603, 606, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(604, 607, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(605, 608, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(606, 609, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(607, 610, 0.00, 0.00, 0.00, 51000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(608, 611, 0.00, 0.00, 0.00, 72000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(609, 612, 23000.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(610, 613, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(611, 614, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(612, 615, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(613, 616, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(614, 617, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(615, 618, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(616, 619, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(617, 620, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(618, 621, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(619, 622, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(620, 623, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(621, 624, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(622, 625, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(623, 626, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(624, 627, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(625, 628, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(626, 629, 0.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(627, 630, 27000.00, 0.00, 0.00, 50000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(628, 631, 41000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(629, 632, 23000.00, 0.00, 0.00, 27500.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(630, 633, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(631, 634, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(632, 635, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(633, 636, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(634, 637, 18000.00, 0.00, 0.00, 21000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(635, 638, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(636, 639, 18000.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(637, 640, 0.00, 0.00, 0.00, 19000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(638, 641, 0.00, 0.00, 0.00, 20000.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(639, 642, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(640, 643, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(641, 644, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(642, 645, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-06-05 02:58:18', NULL),
	(643, 647, 800.00, 8000.00, 8000.00, 0.00, 0.00, 0.00, '2018-07-03 04:05:25', NULL),
	(644, 648, 3500.00, 42000.00, 42000.00, 0.00, 0.00, 0.00, '2018-07-03 04:12:09', NULL),
	(645, 651, 1200.00, 24000.00, 24000.00, 0.00, 0.00, 0.00, '2018-07-03 04:18:37', NULL);
/*!40000 ALTER TABLE `m_price` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_satuan
CREATE TABLE IF NOT EXISTS `m_satuan` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) DEFAULT NULL,
  `s_detname` varchar(50) DEFAULT NULL,
  `s_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `s_update` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_satuan: ~12 rows (approximately)
DELETE FROM `m_satuan`;
/*!40000 ALTER TABLE `m_satuan` DISABLE KEYS */;
INSERT INTO `m_satuan` (`s_id`, `s_name`, `s_detname`, `s_create`, `s_update`) VALUES
	(1, 'PACK', 'PACK', '2018-06-06 12:57:10', NULL),
	(2, 'UNIT', 'UNIT', '2018-06-06 12:57:34', NULL),
	(3, 'KG', 'KILOGRAM', '2018-07-03 15:29:07', NULL),
	(4, 'PCS', 'PIECES', '2018-07-03 15:29:22', NULL),
	(5, 'KLG', 'KALENG', '2018-07-03 16:16:03', NULL),
	(6, 'BTL', 'BOTOL', '2018-07-04 00:39:45', NULL),
	(7, 'LTR', 'LITER', '2018-07-04 00:40:08', NULL),
	(8, 'GR', 'GRAM', '2018-07-04 00:45:16', NULL),
	(9, 'ONS', 'ONS', '2018-07-04 00:45:35', NULL),
	(10, 'LBR', 'LEMBAR', '2018-07-04 00:46:03', NULL),
	(11, 'MTR', 'METER', '2018-07-04 00:46:22', NULL),
	(12, 'PJK', 'PAJAK', '2018-07-04 00:57:22', NULL);
/*!40000 ALTER TABLE `m_satuan` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_stock_cabang
CREATE TABLE IF NOT EXISTS `m_stock_cabang` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_stock_cabang: ~24 rows (approximately)
DELETE FROM `m_stock_cabang`;
/*!40000 ALTER TABLE `m_stock_cabang` DISABLE KEYS */;
INSERT INTO `m_stock_cabang` (`sc_id`, `sc_name`) VALUES
	(1, 'Gudang Bahan Baku Master 1'),
	(2, 'Gudang Bahan Baku Master 2'),
	(3, 'Gudang Bahan Baku Cabang 1'),
	(4, 'Gudang Bahan Baku Cabang 2'),
	(5, 'Gudang Grosir Master 1'),
	(6, 'Gudang Grosir Master 2'),
	(7, 'Gudang Grosir Cabang 1'),
	(8, 'Gudang Grosir Cabang 2'),
	(9, 'Gudang Retail Master 1'),
	(10, 'Gudang Retail Master 2'),
	(11, 'Gudang Retail Cabang 1'),
	(12, 'Gudang Retail Cabang 2'),
	(13, 'Gudang Customer Master 1'),
	(14, 'Gudang Customer Master 2'),
	(15, 'Gudang Customer Cabang 1'),
	(16, 'Gudang Customer Cabang 2'),
	(17, 'Gudang Produksi Master 1'),
	(18, 'Gudang Produksi Master 2'),
	(19, 'Gudang Produksi Cabang 1'),
	(20, 'Gudang Produksi Cabang 2'),
	(21, 'Gudang Sending Master 1'),
	(22, 'Gudang Sending Master 2'),
	(23, 'Gudang Sending Cabang 1'),
	(24, 'Gudang Sending Cabang 2');
/*!40000 ALTER TABLE `m_stock_cabang` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_supplier
CREATE TABLE IF NOT EXISTS `m_supplier` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_company` varchar(100) DEFAULT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `s_address` varchar(100) DEFAULT NULL,
  `s_phone` varchar(50) DEFAULT NULL,
  `s_fax` varchar(50) DEFAULT NULL,
  `s_note` text,
  `s_created` timestamp NULL DEFAULT NULL,
  `s_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.m_supplier: ~2 rows (approximately)
DELETE FROM `m_supplier`;
/*!40000 ALTER TABLE `m_supplier` DISABLE KEYS */;
INSERT INTO `m_supplier` (`s_id`, `s_company`, `s_name`, `s_address`, `s_phone`, `s_fax`, `s_note`, `s_created`, `s_updated`, `s_active`) VALUES
	(20, 'Dealer Honda', 'Supadi', 'Sumberejo Bojonegoro', '089765345678', '1234', NULL, NULL, '2018-03-23 10:47:10', ''),
	(21, 'ttt', 'fgfgfgf', 'bnbnbnb', '5454545', '43434', 'bvbvbvbvb', '2018-06-29 06:20:55', '2018-06-29 13:20:55', NULL);
/*!40000 ALTER TABLE `m_supplier` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.m_users
CREATE TABLE IF NOT EXISTS `m_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.m_users: ~2 rows (approximately)
DELETE FROM `m_users`;
/*!40000 ALTER TABLE `m_users` DISABLE KEYS */;
INSERT INTO `m_users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'amdin1', 'admin22@gmail.com', 'admin', '$2y$10$hFooeUmTUWV5bmY8HMPvJOEo1kGC/CqEWeWtX226xvM4qgMUBP6oe', 'IAuRvsCRBpGsCDZuxcWNByFrpMnMUsqiClo78vkRjmV2cJLZGQpQMbVnGetI', '2017-12-19 06:20:05', '2018-04-02 05:26:19'),
	(2, 'Bravo', 'bravo@bravo.com', 'bravo', '$2y$10$ORK70cBLfoFFcXBJFNFwFeIPpUKnk3Vf3ro/0GZOGYfDLntxxFzF6', 'swMqwu1kNY36uWl56Rmsqssjtvp7I5u7QJGVVofjXNIgrkjKcB9MbHanhxjL', '2018-02-03 01:46:43', '2018-02-03 01:46:51');
/*!40000 ALTER TABLE `m_users` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.password_resets: 110 rows
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46'),
	('bravo@bravo.com', 'cf414a57670872d4bd8c1b0f18d3509f5deb06a0c579f51ca494b81d4dc4e8c9', '2018-02-03 01:48:46');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.spk_formula
CREATE TABLE IF NOT EXISTS `spk_formula` (
  `fr_spk` int(12) DEFAULT NULL,
  `fr_detailid` int(12) DEFAULT NULL,
  `fr_formula` int(12) DEFAULT NULL,
  `fr_value` decimal(10,2) DEFAULT NULL,
  `fr_scale` varchar(50) DEFAULT NULL,
  KEY `FK_spk_formula_d_spk` (`fr_spk`),
  KEY `fr_detailid` (`fr_detailid`),
  CONSTRAINT `FK_spk_formula_d_spk` FOREIGN KEY (`fr_spk`) REFERENCES `d_spk` (`spk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table bisnis_tamma.spk_formula: ~0 rows (approximately)
DELETE FROM `spk_formula`;
/*!40000 ALTER TABLE `spk_formula` DISABLE KEYS */;
/*!40000 ALTER TABLE `spk_formula` ENABLE KEYS */;


-- Dumping structure for table bisnis_tamma.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table bisnis_tamma.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'amdin1', 'admin22@gmail.com', 'admin', '$2y$10$hFooeUmTUWV5bmY8HMPvJOEo1kGC/CqEWeWtX226xvM4qgMUBP6oe', 'P8GCWFWR07E2tnEmThy5o3WA90r9lnpzPhb7sybctW3jQKfdNvwINfay2J9s', '2017-12-19 06:20:05', '2018-03-12 07:18:22'),
	(2, 'Bravo', 'bravo@bravo.com', 'bravo', '$2y$10$ORK70cBLfoFFcXBJFNFwFeIPpUKnk3Vf3ro/0GZOGYfDLntxxFzF6', 'swMqwu1kNY36uWl56Rmsqssjtvp7I5u7QJGVVofjXNIgrkjKcB9MbHanhxjL', '2018-02-03 01:46:43', '2018-02-03 01:46:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
