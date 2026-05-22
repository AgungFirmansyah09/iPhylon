-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 10:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dashboard_rubber`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_input_waste`
--

CREATE TABLE `tbl_input_waste` (
  `id_waste` int(11) NOT NULL,
  `category_waste` varchar(100) NOT NULL,
  `jenis_waste` varchar(500) NOT NULL,
  `kg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_input_waste`
--

INSERT INTO `tbl_input_waste` (`id_waste`, `category_waste`, `jenis_waste`, `kg`) VALUES
(1, 'Hazardous Waste (B3)', 'CONFORM', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_input_waste`
--
ALTER TABLE `tbl_input_waste`
  ADD PRIMARY KEY (`id_waste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_input_waste`
--
ALTER TABLE `tbl_input_waste`
  MODIFY `id_waste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
