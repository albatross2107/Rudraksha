-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 04:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rudra_675`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`) VALUES
('Rudraksha', 'Rudraksha@675');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `teaquality` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `packagequality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `age`, `gender`, `phone`, `email`, `teaquality`, `price`, `packagequality`) VALUES
(2, 'Rohan K', '20', 'Male', '9975134169', 'rohan@gmail.com', 'Good', 'Slightly High', 'Good'),
(4, 'Sushmita', '54', 'Female', '8768767542', 'sushmita@gmail.com', 'Average', 'Perfect', 'Good'),
(5, 'Sonia Raut', '76', 'Female', '9986345654', 'sonia@gmail.com', 'Good', 'Slightly High', 'Poor'),
(6, 'Sanket', '44', 'Male', '8876788998', 'sanket@gmail.com', 'Excellent', 'Expensive', 'Good'),
(7, 'Amit', '65', 'Male', '8766876865', 'amit@gmail.com', 'Good', 'Slightly High', 'Excellent'),
(8, 'Amit', '65', 'Male', '8766876865', 'amit@gmail.com', 'Good', 'Slightly High', 'Excellent'),
(9, 'Amit', '65', 'Male', '8766876865', 'amit@gmail.com', 'Good', 'Slightly High', 'Excellent'),
(10, 'Asmita', '43', 'Female', '9223488211', 'asmita@123', 'Excellent', 'Perfect', 'Excellent'),
(11, 'Soham', '39', 'Male', '9876534478', 'soham@123', 'Poor', 'Expensive', 'Average'),
(12, 'Jaspreet', '23', 'Female', '8765457898', 'jaspreet@123', 'Average', 'Perfect', 'Poor');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `teabrand` varchar(50) NOT NULL,
  `teacups_perday` varchar(50) NOT NULL,
  `quality_product` varchar(50) NOT NULL,
  `price_perkg` varchar(50) NOT NULL,
  `quantity_permonth` varchar(50) NOT NULL,
  `taste` varchar(50) NOT NULL,
  `gift` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `date`, `name`, `age`, `gender`, `phone_no`, `email`, `city`, `state`, `profession`, `teabrand`, `teacups_perday`, `quality_product`, `price_perkg`, `quantity_permonth`, `taste`, `gift`) VALUES
(12, '2023-02-28 14:14:13', 'Ishwari Kulkarni', 21, 'Female', '9975134169', 'ishwari@gmail.com', 'Pune', 'Maharashtra', 'Student', 'Brooke Bond', '2', 'Strong', 'Rs.275', '500g', 'Normal', 'Biscuit'),
(13, '2023-02-28 14:16:18', 'Sonia Raut', 23, 'Female', '8887626389', 'sonia@gmail.com', 'Pune', 'Maharashtra', 'Teacher', 'Wagh Bakri', '2', 'Flavored', 'Rs.250', '750g', 'Strong', 'Mug'),
(14, '2023-02-28 14:17:14', 'Rohan K', 54, 'Male', '8896654431', 'rohan@gmail.com', 'Pune', 'Maharashtra', 'Banker', 'Society', '4', 'Normal', 'Rs.425', '1000g', 'Normal', 'Select'),
(15, '2023-02-28 17:28:55', 'Rohan K', 54, 'Male', '8896654431', 'rohan@gmail.com', 'Pune', 'Maharashtra', 'Banker', 'Society', '4', 'Normal', 'Rs.425', '1000g', 'Normal', 'Select'),
(16, '2023-03-05 10:45:25', 'Ram', 56, 'Male', '9768645855', 'ram@gmail.com', 'Pune', 'Maharashtra', 'Govt. Services', 'Lipton', '5', 'Normal', 'Rs.350', '1000g', 'Normal', 'No Gifts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
