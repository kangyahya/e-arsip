-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Sep 2022 pada 12.42
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_logs`
--

CREATE TABLE `app_logs` (
  `log_id` int(11) NOT NULL,
  `Timestamp` varchar(255) DEFAULT NULL,
  `Action` varchar(255) DEFAULT NULL,
  `TableName` varchar(255) DEFAULT NULL,
  `RecordID` varchar(255) DEFAULT NULL,
  `SqlQuery` varchar(255) DEFAULT NULL,
  `UserID` varchar(255) DEFAULT NULL,
  `ServerIP` varchar(255) DEFAULT NULL,
  `RequestUrl` text DEFAULT NULL,
  `RequestData` text DEFAULT NULL,
  `RequestCompleted` varchar(255) DEFAULT NULL,
  `RequestMsg` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `app_logs`
--

INSERT INTO `app_logs` (`log_id`, `Timestamp`, `Action`, `TableName`, `RecordID`, `SqlQuery`, `UserID`, `ServerIP`, `RequestUrl`, `RequestData`, `RequestCompleted`, `RequestMsg`) VALUES
(1, '2022-09-27 16:50:05', 'add', 'tbl_instansi', '1', 'INSERT INTO tbl_instansi (`nama_instansi`, `alamat`, `date_created`)  VALUES (?, ?, ?)', '1', '::1', 'tbl_instansi/add', '{\"nama_instansi\":\"Dinas Pendidikan Kota Cirebon\",\"alamat\":\"Kota Cirebon\"}', 'true', NULL),
(2, '2022-09-27 16:53:25', 'add', 'tbl_instansi', '1', 'INSERT INTO tbl_instansi (`kode_instansi`, `nama_instansi`, `alamat`, `date_created`)  VALUES (?, ?, ?, ?)', '1', '::1', 'tbl_instansi/add', '{\"kode_instansi\":\"1\",\"nama_instansi\":\"Dinas Pendidikan Kota Cirebon\",\"alamat\":\"Kota Cirebon\"}', 'true', NULL),
(3, '2022-09-27 17:02:55', 'delete', 'tbl_instansi', '1', 'DELETE FROM tbl_instansi WHERE  tbl_instansi.kode_instansi in ( ? )  AND tbl_instansi.kode_instansi = ? ', '1', '::1', 'tbl_instansi/delete/1/', '[]', 'true', NULL),
(4, '2022-09-27 17:04:09', 'add', 'tbl_instansi', '1', 'INSERT INTO tbl_instansi (`kode_instansi`, `nama_instansi`, `alamat`, `date_created`)  VALUES (?, ?, ?, ?)', '1', '::1', 'tbl_instansi/add', '{\"kode_instansi\":\"2\",\"nama_instansi\":\"Dinas\",\"alamat\":\"Dinsos\"}', 'true', NULL),
(5, '2022-09-27 17:06:27', 'add', 'tbl_users', '1', 'INSERT INTO tbl_users (`id_pengguna`, `username`, `password`, `nama_lengkap`, `email`, `photo`, `last_login`, `user_role_id`, `date_created`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', '1', '::1', 'tbl_users/add', '{\"id_pengguna\":\"2\",\"username\":\"Abuse\",\"password\":\"$2y$10$BzBn2560CXjg.kHdZGzdiudSVhsBRphliLxDq59qNfjuENinXXYMW\",\"nama_lengkap\":\"Abuse dong\",\"email\":\"abuse@dong.com\",\"photo\":\"http:\\/\\/localhost\\/e-arsip\\/uploads\\/files\\/oi58jhg4zmbrcy6.jpg\",\"last_login\":\"2022-09-24\",\"user_role_id\":\"1\"}', 'true', NULL),
(6, '2022-09-27 17:08:34', 'edit', 'tbl_users', '1', 'UPDATE tbl_users SET `id_pengguna` = ?, `username` = ?, `nama_lengkap` = ?, `photo` = ?, `last_login` = ?, `user_role_id` = ?, `date_updated` = ? WHERE  tbl_users.id_pengguna = ? ', '1', '::1', 'tbl_users/edit/1/', '{\"id_pengguna\":\"1\",\"username\":\"yahya\",\"nama_lengkap\":\"Muhammad\",\"photo\":\"http:\\/\\/localhost\\/e-arsip\\/uploads\\/files\\/8h217d5lqny43ut.jpg\",\"last_login\":\"2022-09-27\",\"user_role_id\":\"1\"}', 'true', NULL),
(7, '2022-09-27 22:12:37', 'view', 'tbl_instansi', '2', 'SELECT   kode_instansi, nama_instansi, alamat, date_created, date_updated FROM tbl_instansi WHERE  tbl_instansi.kode_instansi = ?  LIMIT 1', '1', '::1', 'tbl_instansi/view/2', '[]', 'true', NULL),
(8, '2022-09-27 22:12:38', 'view', 'tbl_instansi', '2', 'SELECT   kode_instansi, nama_instansi, alamat, date_created, date_updated FROM tbl_instansi WHERE  tbl_instansi.kode_instansi = ?  LIMIT 1', '1', '::1', 'tbl_instansi/view/2', '[]', 'true', NULL),
(9, '2022-09-27 22:12:39', 'view', 'tbl_instansi', '2', 'SELECT   kode_instansi, nama_instansi, alamat, date_created, date_updated FROM tbl_instansi WHERE  tbl_instansi.kode_instansi = ?  LIMIT 1', '1', '::1', 'tbl_instansi/view/2', '[]', 'true', NULL),
(10, '2022-09-27 22:12:57', 'edit', 'tbl_instansi', '2', 'UPDATE tbl_instansi SET `alamat` = ?, `date_updated` = ? WHERE  tbl_instansi.kode_instansi = ? ', '1', '::1', 'tbl_instansi/editfield/2', '{\"alamat\":\"Kota Cirebon\"}', 'true', NULL),
(11, '2022-09-27 22:13:33', 'userlogout', 'tbl_users', NULL, NULL, '1', '::1', 'index/logout', '[]', 'true', NULL),
(12, '2022-09-27 22:13:41', 'userlogout', 'tbl_users', NULL, NULL, '1', '::1', 'index/logout', '[]', 'true', NULL),
(13, '2022-09-27 22:13:48', 'userlogin', 'tbl_users', NULL, 'SELECT   * FROM tbl_users WHERE  username = ?  OR email = ?  LIMIT 1', '1', '::1', 'index/login/', '{\"username\":\"yahya\",\"password\":\"$2y$10$iTB9Wt5mh5NodWIWTe.wGeN1V7jtOObBbjy4SEAC8R91RpVIZ5z\\/W\"}', 'true', NULL),
(14, '2022-09-27 22:20:18', 'add', 'tbl_surat_masuk', '1', 'INSERT INTO tbl_surat_masuk (`no_surat`, `tgl_surat`, `tgl_diterima`, `perihal`, `sifat`, `lampiran`, `file`, `kode_instansi`, `date_created`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', '1', '::1', 'tbl_surat_masuk/add', '{\"no_surat\":\"023\\/SMKYT\\/2022\\/XI\",\"tgl_surat\":\"2022-09-25\",\"tgl_diterima\":\"2022-09-27\",\"perihal\":\"Suatu Saat\",\"sifat\":\"Penting\",\"lampiran\":\"3\",\"file\":\"http:\\/\\/localhost\\/e-arsip\\/uploads\\/files\\/masuk\\/iljku1dbwex98gt.pdf\",\"kode_instansi\":\"1\"}', 'true', NULL),
(15, '2022-09-27 22:31:14', 'add', 'tbl_surat_masuk', '1', 'INSERT INTO tbl_surat_masuk (`no_surat`, `tgl_surat`, `tgl_diterima`, `perihal`, `sifat`, `lampiran`, `file`, `kode_instansi`, `date_created`)  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)', '1', '::1', 'tbl_surat_masuk/add', '{\"no_surat\":\"024\\/SMKYT\\/2022\\/XI\",\"tgl_surat\":\"2022-09-23\",\"tgl_diterima\":\"2022-09-27\",\"perihal\":\"Satu\",\"sifat\":\"Penting\",\"lampiran\":\"2\",\"file\":\"http:\\/\\/localhost\\/e-arsip\\/uploads\\/files\\/masuk\\/f41gjnpq36xuv85.pdf\",\"kode_instansi\":\"2\"}', 'true', NULL),
(16, '2022-09-27 22:39:36', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(17, '2022-09-27 22:39:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(18, '2022-09-27 22:39:39', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(19, '2022-09-27 22:39:39', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(20, '2022-09-27 22:39:39', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(21, '2022-09-27 22:39:41', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(22, '2022-09-27 22:39:41', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(23, '2022-09-27 22:39:41', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(24, '2022-09-27 22:39:42', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(25, '2022-09-27 22:40:50', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(26, '2022-09-27 22:40:50', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(27, '2022-09-27 22:40:55', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(28, '2022-09-27 22:40:55', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(29, '2022-09-27 22:40:56', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(30, '2022-09-27 22:40:56', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(31, '2022-09-27 22:40:57', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(32, '2022-09-27 22:40:57', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(33, '2022-09-27 22:40:57', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(34, '2022-09-27 22:40:57', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(35, '2022-09-27 22:40:57', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(36, '2022-09-27 22:40:58', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(37, '2022-09-27 22:40:58', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(38, '2022-09-27 22:40:59', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(39, '2022-09-27 22:40:59', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(40, '2022-09-27 22:41:22', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(41, '2022-09-27 22:41:23', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(42, '2022-09-27 22:41:25', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(43, '2022-09-27 22:41:34', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(44, '2022-09-27 22:41:35', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(45, '2022-09-27 22:41:35', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(46, '2022-09-27 22:41:36', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(47, '2022-09-27 22:41:36', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(48, '2022-09-27 22:41:36', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(49, '2022-09-27 22:41:37', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(50, '2022-09-27 22:41:37', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(51, '2022-09-27 22:41:37', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(52, '2022-09-27 22:41:37', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(53, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(54, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(55, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(56, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(57, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(58, '2022-09-27 22:41:38', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(59, '2022-09-27 22:43:13', 'view', 'tbl_surat_masuk', '2', 'SELECT   id, no_surat, tgl_surat, tgl_diterima, perihal, sifat, lampiran, file, kode_instansi, date_created, date_updated FROM tbl_surat_masuk WHERE  tbl_surat_masuk.no_surat = ?  LIMIT 1', '1', '::1', 'tbl_surat_masuk/view/2', '[]', 'true', NULL),
(60, '2022-09-28 14:12:03', 'userlogout', 'tbl_users', NULL, NULL, '1', '::1', 'index/logout', '[]', 'true', NULL),
(61, '2022-09-28 14:12:09', 'userlogin', 'tbl_users', NULL, 'SELECT   * FROM tbl_users WHERE  username = ?  OR email = ?  LIMIT 1', '1', '::1', 'index/login/', '{\"username\":\"yahya\",\"password\":\"$2y$10$iTB9Wt5mh5NodWIWTe.wGeN1V7jtOObBbjy4SEAC8R91RpVIZ5z\\/W\"}', 'true', NULL),
(62, '2022-09-28 14:38:16', 'userlogout', 'tbl_users', NULL, NULL, '1', '::1', 'index/logout', '[]', 'true', NULL),
(63, '2022-09-28 14:38:24', 'userlogin', 'tbl_users', NULL, 'SELECT   * FROM tbl_users WHERE  username = ?  OR email = ?  LIMIT 1', '1', '::1', 'index/login/', '{\"username\":\"yahya\",\"password\":\"$2y$10$iTB9Wt5mh5NodWIWTe.wGeN1V7jtOObBbjy4SEAC8R91RpVIZ5z\\/W\"}', 'true', NULL),
(64, '2022-09-28 15:25:39', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(65, '2022-09-28 15:25:41', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(66, '2022-09-28 15:25:42', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(67, '2022-09-28 15:25:42', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(68, '2022-09-28 15:25:43', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(69, '2022-09-28 15:25:44', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(70, '2022-09-28 15:25:51', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(71, '2022-09-28 15:25:52', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(72, '2022-09-28 15:25:52', 'view', 'tbl_inventaris', '1', 'SELECT   id, tanggal, kode_produk, nama_produk, satuan, stok_awal, stok_in, stok_out FROM tbl_inventaris WHERE  tbl_inventaris.id = ?  LIMIT 1', '1', '::1', 'tbl_inventaris/view/1', '[]', 'true', NULL),
(73, '2022-09-28 17:32:44', 'userlogin', 'tbl_users', NULL, 'SELECT   * FROM tbl_users WHERE  username = ?  OR email = ?  LIMIT 1', '1', '::1', 'index/login/', '{\"username\":\"yahya\",\"password\":\"$2y$10$iTB9Wt5mh5NodWIWTe.wGeN1V7jtOObBbjy4SEAC8R91RpVIZ5z\\/W\"}', 'true', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_permissions`
--

CREATE TABLE `role_permissions` (
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `action_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role_permissions`
--

INSERT INTO `role_permissions` (`permission_id`, `role_id`, `page_name`, `action_name`) VALUES
(216, 1, 'user', 'import_data'),
(217, 1, 'tbl_users', 'list'),
(218, 1, 'tbl_users', 'view'),
(219, 1, 'tbl_users', 'add'),
(220, 1, 'tbl_users', 'edit'),
(221, 1, 'tbl_users', 'editfield'),
(222, 1, 'tbl_users', 'delete'),
(223, 1, 'tbl_instansi', 'list'),
(224, 1, 'tbl_instansi', 'view'),
(225, 1, 'tbl_instansi', 'add'),
(226, 1, 'tbl_instansi', 'edit'),
(227, 1, 'tbl_instansi', 'editfield'),
(228, 1, 'tbl_instansi', 'delete'),
(229, 1, 'tbl_surat_keluar', 'list'),
(230, 1, 'tbl_surat_keluar', 'view'),
(231, 1, 'tbl_surat_keluar', 'add'),
(232, 1, 'tbl_surat_keluar', 'edit'),
(233, 1, 'tbl_surat_keluar', 'editfield'),
(234, 1, 'tbl_surat_keluar', 'delete'),
(235, 1, 'tbl_surat_masuk', 'list'),
(236, 1, 'tbl_surat_masuk', 'view'),
(237, 1, 'tbl_surat_masuk', 'add'),
(238, 1, 'tbl_surat_masuk', 'edit'),
(239, 1, 'tbl_surat_masuk', 'editfield'),
(240, 1, 'tbl_surat_masuk', 'delete'),
(241, 1, 'tbl_users', 'accountedit'),
(242, 1, 'tbl_users', 'accountview'),
(243, 1, 'role_permissions', 'list'),
(244, 1, 'role_permissions', 'view'),
(245, 1, 'role_permissions', 'add'),
(246, 1, 'role_permissions', 'edit'),
(247, 1, 'role_permissions', 'editfield'),
(248, 1, 'role_permissions', 'delete'),
(249, 1, 'roles', 'list'),
(250, 1, 'roles', 'view'),
(251, 1, 'roles', 'add'),
(252, 1, 'roles', 'edit'),
(253, 1, 'roles', 'editfield'),
(254, 1, 'roles', 'delete'),
(255, 1, 'app_logs', 'list'),
(256, 1, 'app_logs', 'view'),
(257, 1, 'tbl_inventaris', 'list'),
(258, 1, 'tbl_inventaris', 'view'),
(259, 1, 'tbl_inventaris', 'add'),
(260, 1, 'tbl_inventaris', 'edit'),
(261, 1, 'tbl_inventaris', 'editfield'),
(262, 1, 'tbl_inventaris', 'delete'),
(263, 1, 'tbl_bbm', 'list'),
(264, 1, 'tbl_bbm', 'view'),
(265, 1, 'tbl_bbm', 'add'),
(266, 1, 'tbl_bbm', 'edit'),
(267, 1, 'tbl_bbm', 'editfield'),
(268, 1, 'tbl_bbm', 'delete'),
(269, 2, 'tbl_users', 'list'),
(270, 2, 'tbl_users', 'accountedit'),
(271, 2, 'tbl_users', 'accountview');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bbm`
--

CREATE TABLE `tbl_bbm` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kendaraan` varchar(20) DEFAULT NULL,
  `item_biaya` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `kode_instansi` varchar(15) NOT NULL,
  `nama_instansi` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`kode_instansi`, `nama_instansi`, `alamat`, `date_created`, `date_updated`) VALUES
('1', 'Dinas Komunikasi Informasi dan Statistika Kota Cirebon', 'Kota Cirebon', '2022-09-27 16:50:05', NULL),
('2', 'Dinas', 'Kota Cirebon', '2022-09-27 17:04:09', '2022-09-27 22:12:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inventaris`
--

CREATE TABLE `tbl_inventaris` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_produk` varchar(255) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_in` int(11) NOT NULL,
  `stok_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_inventaris`
--

INSERT INTO `tbl_inventaris` (`id`, `tanggal`, `kode_produk`, `nama_produk`, `satuan`, `stok_awal`, `stok_in`, `stok_out`) VALUES
(1, '2022-09-28', 'B0021', 'Monitor', 'Unit', 20, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `no_surat` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` text NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `lampiran` int(11) NOT NULL,
  `kode_instansi` varchar(15) NOT NULL,
  `no_surat_masuk` varchar(30) NOT NULL,
  `file` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `perihal` text NOT NULL,
  `sifat` varchar(50) NOT NULL,
  `lampiran` int(3) NOT NULL,
  `kode_instansi` varchar(15) NOT NULL,
  `file` text NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id`, `no_surat`, `tgl_surat`, `tgl_diterima`, `perihal`, `sifat`, `lampiran`, `kode_instansi`, `file`, `date_created`, `date_updated`) VALUES
(1, '1', '2022-09-25', '2022-09-27', 'Pengumuman', 'Penting', 3, '1', 'http://localhost/e-arsip/uploads/files/masuk/iljku1dbwex98gt.pdf', '2022-09-27 22:20:18', NULL),
(2, '2', '2022-09-23', '2022-09-27', 'Satu', 'Penting', 2, '2', 'http://localhost/e-arsip/uploads/files/masuk/f41gjnpq36xuv85.pdf', '2022-09-27 22:31:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2022-12-27 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `user_role_id` int(11) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_pengguna`, `username`, `password`, `nama_lengkap`, `email`, `photo`, `last_login`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `user_role_id`, `date_created`, `date_updated`) VALUES
(1, 'yahya', '$2y$10$iTB9Wt5mh5NodWIWTe.wGeN1V7jtOObBbjy4SEAC8R91RpVIZ5z/W', 'Muhammad', 'inikangyahya@gmail.com', 'http://localhost/e-arsip/uploads/files/8h217d5lqny43ut.jpg', '2022-09-27', '8ced81fc29318b3c6ef0651387595d52', NULL, '2022-12-27 00:00:00', NULL, 1, NULL, '2022-09-27 17:08:34'),
(2, 'Abuse', '$2y$10$BzBn2560CXjg.kHdZGzdiudSVhsBRphliLxDq59qNfjuENinXXYMW', 'Abuse dong', 'abuse@dong.com', 'http://localhost/e-arsip/uploads/files/oi58jhg4zmbrcy6.jpg', '2022-09-24', NULL, NULL, '2022-12-27 00:00:00', NULL, 1, '2022-09-27 17:06:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_logs`
--
ALTER TABLE `app_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indeks untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indeks untuk tabel `tbl_bbm`
--
ALTER TABLE `tbl_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`kode_instansi`);

--
-- Indeks untuk tabel `tbl_inventaris`
--
ALTER TABLE `tbl_inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`no_surat`),
  ADD KEY `kode_instansi` (`kode_instansi`);

--
-- Indeks untuk tabel `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id`,`no_surat`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_logs`
--
ALTER TABLE `app_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT untuk tabel `tbl_bbm`
--
ALTER TABLE `tbl_bbm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_inventaris`
--
ALTER TABLE `tbl_inventaris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD CONSTRAINT `tbl_surat_keluar_ibfk_1` FOREIGN KEY (`kode_instansi`) REFERENCES `tbl_instansi` (`kode_instansi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_surat_keluar_ibfk_2` FOREIGN KEY (`no_surat_masuk`) REFERENCES `tbl_surat_masuk` (`no_surat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD CONSTRAINT `tbl_surat_masuk_ibfk_1` FOREIGN KEY (`kode_instansi`) REFERENCES `tbl_instansi` (`kode_instansi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
