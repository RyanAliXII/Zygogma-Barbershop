-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 09:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `service` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `age`, `email`, `contact`, `schedule`, `service`, `price`, `total`) VALUES
(15, 'rogem', '34', 'ssdsdsds', 'fdfd', 'fdfdf', 'dfd', 'fdf', 'df'),
(16, 'hhhh', 'dfdf', 'dfdfsdsd', 'bvb', 'vbvb', 'vbvb', 'vbvb', 'sdsd'),
(17, 'sdsd', 'sd', 'sdsc', 'ds', 'xcx', 'rfgr', 'edfe', 'df'),
(18, 'sds', 'dsdsd', 'sds', 'sd', 'xcvsdsd', 'xc', 'zxcved', 'vdv'),
(19, 'rogem', 'dsdsdsd', 'sds', 'dsd', 'sdsd', 'sdsd', 's', 'dsd'),
(20, 'cvbc', 'vbvb', 'vbv', 'bvbv', 'bvbv', 'bvb', 'vbv', 'vb'),
(21, 'sdsd', 'sdsd', 'sdsd', 'sds', 'dsd', 'sdsd', 'sdsd', 'sd'),
(22, 'sdsds', 'dsdddf', 'sdsd', 'sds', 'dsdsd', 'sd', 'sd', 'dsd'),
(23, 'sd', 'sdsds', 'dsdsd', 'sds', 'dsd', 'sdsd', 'sds', 'ds'),
(24, 'sdsd', 'sds', 'dsd', 'sds', 'dsd', 'sds', 'dsd', 'sd'),
(25, 'sds', 'dsdsdsd', 'ssdd', 'sd', 'sdsd', 'sd', 'sd', 'sd'),
(26, 'sds', 'dsdsd', 'sds', 'dsds', 'dsd', 'sds', 'dsds', 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
