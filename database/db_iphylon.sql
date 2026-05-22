-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2026 at 04:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iphylon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jo_spk`
--

CREATE TABLE `tbl_jo_spk` (
  `id_jo_spk` int(11) NOT NULL,
  `no_dokumen` varchar(100) DEFAULT NULL,
  `revisi` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `mesin` varchar(50) DEFAULT NULL,
  `injector` varchar(50) DEFAULT NULL,
  `line_produksi` varchar(50) DEFAULT NULL,
  `tanggal_spk` date DEFAULT NULL,
  `nama_spk` varchar(255) DEFAULT NULL,
  `no_jo` varchar(100) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL,
  `uploaded_by` varchar(100) DEFAULT NULL,
  `file_excel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jo_spk`
--

INSERT INTO `tbl_jo_spk` (`id_jo_spk`, `no_dokumen`, `revisi`, `item`, `mesin`, `injector`, `line_produksi`, `tanggal_spk`, `nama_spk`, `no_jo`, `tanggal_upload`, `uploaded_by`, `file_excel`, `created_at`) VALUES
(26, 'FORM/SHP-01/02', 1, 'NIKE COURT LITE 4 HC', '1', '2', '1', '2026-05-24', 'SPK LOW CARBON MATERIAL (LC)', 'JO-20260522091500', '2026-05-22 09:15:00', 'Ciko', '1779416100_template_spk_planning (14).xlsx', '2026-05-22 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_barcode`
--

CREATE TABLE `tbl_master_barcode` (
  `id_barcode` int(11) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `bucket` varchar(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `po_item` varchar(10) NOT NULL,
  `style` varchar(10) NOT NULL,
  `model` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `last_update` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_master_barcode`
--

INSERT INTO `tbl_master_barcode` (`id_barcode`, `qr_code`, `bucket`, `po`, `po_item`, `style`, `model`, `size`, `qty`, `last_update`, `updated_by`) VALUES
(2, '816e4c1b-88ab-47b0-a98c-6a960abe7006', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(3, '250042802324', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(4, '250042802325', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(5, '250042802326', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(6, '250042802327', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(7, '250042802328', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(8, '250042802329', '250317SO', '6200911848', '300', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(9, '250042802330', '250317SO', '6200913245', '100', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(10, '250042802331', '250317SO', '6200913245', '100', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL),
(11, '250042802332', '250317SO', '6200913245', '100', 'FJ4195-100', 'NIKE WAFFLE NAV', '07T', '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_time`
--

CREATE TABLE `tbl_master_time` (
  `id_time` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `hour` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spk_detail`
--

CREATE TABLE `tbl_spk_detail` (
  `id_detail` int(11) NOT NULL,
  `id_jo_spk` int(11) DEFAULT NULL,
  `style` varchar(100) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `bucket` varchar(20) DEFAULT NULL,
  `po` varchar(100) DEFAULT NULL,
  `po_item` int(11) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `total_order` int(11) DEFAULT NULL,
  `total_qty` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spk_detail`
--

INSERT INTO `tbl_spk_detail` (`id_detail`, `id_jo_spk`, `style`, `colour`, `gender`, `bucket`, `po`, `po_item`, `country`, `total_order`, `total_qty`, `created_at`) VALUES
(48, 26, 'FD6574-111', 'WHITE ', 'MAN', '260518', '6204461204', 200, 'Belgium', 507, 300, '2026-05-22 02:15:00'),
(49, 26, 'FD6574-001', 'BLACK', 'WOMAN', '260525', '6204461204', 300, 'Denmark', 1000, 90, '2026-05-22 02:15:00'),
(50, 26, 'FD6574-002', 'RED', 'GS', '260525', '6204461204', 400, 'Japan', 2000, 150, '2026-05-22 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spk_size_qty`
--

CREATE TABLE `tbl_spk_size_qty` (
  `id_size_qty` int(11) NOT NULL,
  `id_detail` int(11) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spk_size_qty`
--

INSERT INTO `tbl_spk_size_qty` (`id_size_qty`, `id_detail`, `size`, `qty`, `created_at`) VALUES
(85, 48, '1', 50, '2026-05-22 02:15:00'),
(86, 48, '1T', 50, '2026-05-22 02:15:00'),
(87, 48, '2', 50, '2026-05-22 02:15:00'),
(88, 48, '2T', 50, '2026-05-22 02:15:00'),
(89, 48, '3', 50, '2026-05-22 02:15:00'),
(90, 48, '3T', 50, '2026-05-22 02:15:00'),
(91, 49, '1', 10, '2026-05-22 02:15:00'),
(92, 49, '1T', 20, '2026-05-22 02:15:00'),
(93, 49, '2', 10, '2026-05-22 02:15:00'),
(94, 49, '2T', 20, '2026-05-22 02:15:00'),
(95, 49, '3', 10, '2026-05-22 02:15:00'),
(96, 49, '3T', 20, '2026-05-22 02:15:00'),
(97, 50, '1', 20, '2026-05-22 02:15:00'),
(98, 50, '1T', 20, '2026-05-22 02:15:00'),
(99, 50, '2', 10, '2026-05-22 02:15:00'),
(100, 50, '2T', 100, '2026-05-22 02:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_scan`
--

CREATE TABLE `tbl_transaction_scan` (
  `id_transac` int(11) NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `date_transaction` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type_scan` varchar(100) NOT NULL,
  `hour_scan` varchar(11) NOT NULL,
  `shift` varchar(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cost_center` varchar(100) NOT NULL,
  `date_scan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transprod`
--
-- Error reading structure for table db_iphylon.tbl_transprod: #1932 - Table 'db_iphylon.tbl_transprod' doesn't exist in engine
-- Error reading data for table db_iphylon.tbl_transprod: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_iphylon`.`tbl_transprod`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `authorize` varchar(100) NOT NULL,
  `scan_type` varchar(100) NOT NULL,
  `cost_center` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `nik`, `password`, `authorize`, `scan_type`, `cost_center`) VALUES
(1, 'Ciko', '1410422', '123456', 'Admin', 'IN_SM', 'Line 1'),
(122, 'User Out Packing', '789456', '789456', 'User', 'OUT_PACKING', 'Line 8'),
(123, 'User IN SM', '222222', '123456', 'User', 'IN_SM', 'Line 8'),
(124, 'User Out SM', '333333', '123456', 'User', 'OUT_SM', 'Line 8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jo_spk`
--
ALTER TABLE `tbl_jo_spk`
  ADD PRIMARY KEY (`id_jo_spk`);

--
-- Indexes for table `tbl_master_barcode`
--
ALTER TABLE `tbl_master_barcode`
  ADD PRIMARY KEY (`id_barcode`),
  ADD KEY `qr_code` (`qr_code`),
  ADD KEY `idx_master_qrcode` (`qr_code`),
  ADD KEY `idx_master_po_size` (`po`,`po_item`,`size`);

--
-- Indexes for table `tbl_master_time`
--
ALTER TABLE `tbl_master_time`
  ADD PRIMARY KEY (`id_time`);

--
-- Indexes for table `tbl_spk_detail`
--
ALTER TABLE `tbl_spk_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_jo_spk` (`id_jo_spk`);

--
-- Indexes for table `tbl_spk_size_qty`
--
ALTER TABLE `tbl_spk_size_qty`
  ADD PRIMARY KEY (`id_size_qty`),
  ADD KEY `id_detail` (`id_detail`);

--
-- Indexes for table `tbl_transaction_scan`
--
ALTER TABLE `tbl_transaction_scan`
  ADD PRIMARY KEY (`id_transac`),
  ADD KEY `type_scan` (`type_scan`),
  ADD KEY `idx_join` (`qr_code`,`type_scan`,`date_transaction`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nik` (`nik`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jo_spk`
--
ALTER TABLE `tbl_jo_spk`
  MODIFY `id_jo_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_master_barcode`
--
ALTER TABLE `tbl_master_barcode`
  MODIFY `id_barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1247274;

--
-- AUTO_INCREMENT for table `tbl_master_time`
--
ALTER TABLE `tbl_master_time`
  MODIFY `id_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13189;

--
-- AUTO_INCREMENT for table `tbl_spk_detail`
--
ALTER TABLE `tbl_spk_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_spk_size_qty`
--
ALTER TABLE `tbl_spk_size_qty`
  MODIFY `id_size_qty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_transaction_scan`
--
ALTER TABLE `tbl_transaction_scan`
  MODIFY `id_transac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3250486;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_spk_detail`
--
ALTER TABLE `tbl_spk_detail`
  ADD CONSTRAINT `tbl_spk_detail_ibfk_1` FOREIGN KEY (`id_jo_spk`) REFERENCES `tbl_jo_spk` (`id_jo_spk`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_spk_size_qty`
--
ALTER TABLE `tbl_spk_size_qty`
  ADD CONSTRAINT `tbl_spk_size_qty_ibfk_1` FOREIGN KEY (`id_detail`) REFERENCES `tbl_spk_detail` (`id_detail`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
