-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_data`
--

CREATE TABLE `sales_data` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `sales_amount` decimal(10,2) DEFAULT NULL,
  `sales_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_data`
--

INSERT INTO `sales_data` (`id`, `product_name`, `sales_amount`, `sales_date`) VALUES
(11, 'Product A', 150.25, '2024-01-01'),
(12, 'Product A', 200.00, '2024-01-02'),
(13, 'Product D', 175.50, '2024-01-03'),
(14, 'Product D', 210.75, '2024-01-04'),
(15, 'Product F', 180.30, '2024-01-05'),
(16, 'Product F', 220.40, '2024-01-06'),
(17, 'Product G', 250.00, '2024-01-07'),
(18, 'Product G', 210.00, '2024-01-08'),
(19, 'Product I', 195.60, '2024-01-09'),
(20, 'Product I', 205.25, '2024-01-10'),
(21, 'Product K', 170.15, '2024-01-11'),
(22, 'Product K', 190.80, '2024-01-12'),
(23, 'Product M', 215.40, '2024-01-13'),
(24, 'Product M', 240.00, '2024-01-14'),
(25, 'Product O', 230.50, '2024-01-15'),
(26, 'Product O', 180.00, '2024-01-16'),
(27, 'Product R', 170.25, '2024-01-17'),
(28, 'Product R', 210.00, '2024-01-18'),
(29, 'Product R', 205.80, '2024-01-19'),
(30, 'Product U', 230.20, '2024-01-20'),
(31, 'Product U', 190.50, '2024-01-21'),
(32, 'Product V', 175.90, '2024-01-22'),
(33, 'Product V', 200.60, '2024-01-23'),
(34, 'Product V', 215.75, '2024-01-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_data`
--
ALTER TABLE `sales_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
