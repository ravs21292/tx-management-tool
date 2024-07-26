-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2024 at 10:59 PM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tx_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `management_txs`
--

CREATE TABLE `management_txs` (
  `id` int NOT NULL,
  `description` text NOT NULL,
  `credit` int DEFAULT NULL,
  `debit` int DEFAULT NULL,
  `running_balance` int NOT NULL,
  `tx_date` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `management_txs`
--

INSERT INTO `management_txs` (`id`, `description`, `credit`, `debit`, `running_balance`, `tx_date`, `created_at`) VALUES
(1, 'Testing descirpt', 100, NULL, 100, '26-26-2024', '2024-07-26 17:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `management_txs`
--
ALTER TABLE `management_txs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `management_txs`
--
ALTER TABLE `management_txs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
