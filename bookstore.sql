-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 06:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE `bookinventory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`id`, `name`, `price`, `quantity`) VALUES
(1, 'Murach\'s MYSQL', '20', 7),
(2, 'Adobe Photoshop', '40', 1),
(3, 'comic', '10', 2),
(4, 'recipe book', '50', 9),
(5, 'games', '10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bookinventoryorder`
--

CREATE TABLE `bookinventoryorder` (
  `orderid` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinventoryorder`
--

INSERT INTO `bookinventoryorder` (`orderid`, `firstname`, `lastname`, `cardnumber`, `email`, `id`) VALUES
(1, 'Saloni', 'vats', 66666666, 'vats140stav@gmail.com', 2),
(2, 'Saloni', 'vats', 2147483647, 'vats140stav@gmail.com', 2),
(3, 'Saloni', 'vats', 2147483647, 'vats140stav@gmail.com', 2),
(4, 'Saloni', 'vats', 345678, 'vats140stav@gmail.com', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookinventoryorder`
--
ALTER TABLE `bookinventoryorder`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookinventoryorder`
--
ALTER TABLE `bookinventoryorder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
