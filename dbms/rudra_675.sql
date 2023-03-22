-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 03:15 PM
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `password` varchar(75) NOT NULL,
  `salary` int(10) NOT NULL,
  `dp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `gender`, `dob`, `password`, `salary`, `dp`) VALUES
(13, 'emp1', 'emp1@emp.com', 'Male', '1998-06-25', '1234', 121123, '60df10fa13c124.43381995marco-mons-ROWNIiEV9iM-unsplash.jpg'),
(14, 'emp2', 'emp2@emp.com', 'Female', '1998-07-09', '1234', 3432423, '60df15c11c4505.59875888marco-mons-ROWNIiEV9iM-unsplash.png'),
(16, 'test', 'test@gmail.com', 'Male', '1998-06-19', 'asdf', 234, '60e047c12caa19.90869347profile.png'),
(17, 'Rucha', 'rucha@gmail.com', 'Female', '23-09-1998', 'hello@123', 23000, 'gsgsg'),
(18, 'Rucha', 'rucha@gmail.com', 'Female', '23-09-1998', 'hello@123', 23000, 'gsgsg');

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
-- Table structure for table `recruitments`
--

CREATE TABLE `recruitments` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `board_name` varchar(50) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `uni_name` varchar(50) NOT NULL,
  `current_company` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `vaccination` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `resume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruitments`
--

INSERT INTO `recruitments` (`id`, `date`, `first_name`, `middle_name`, `last_name`, `dob`, `age`, `gender`, `email`, `father_name`, `mother_name`, `contact`, `address1`, `address2`, `city`, `pincode`, `state`, `education`, `stream`, `degree`, `board_name`, `college_name`, `uni_name`, `current_company`, `designation`, `experience`, `vaccination`, `remarks`, `resume`) VALUES
(1, '2023-03-21 20:26:56', 'Rahul', '', '', '', 0, 'Select', '', '', '', '', '', '', '', '', '', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Select', 'Select', '', 'ytku6', 'Assignment 17.docx'),
(2, '2023-03-21 20:30:25', 'Rahul', '', '', '', 0, 'Select', '', '', '', '', '', '', '', '', '', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Select', 'Select', '', 'ytku6', 'Assignment 17.docx'),
(3, '2023-03-21 23:01:54', 'Rahul', '', '', '', 0, 'Select', '', '', '', '', '', '', '', '', '', 'Select', 'Select', 'Select', 'Select', '', '', '', 'Select', 'Select', '', 'ytku6', 'Assignment 17.docx'),
(4, '2023-03-22 10:54:54', 'Seema', 'Manik', 'Desai', '1988-07-21', 34, 'Female', 'seema@gmail.com', 'Manik', 'sayli', '989897897', 'jhvjvjg', 'mvjkg', 'ksagfiua', '8768758', 'Maharashtra', 'Graduate', 'Science', 'Bsc', 'Central Board of Secondary Education (CBSE)', 'hvhkvkkh', 'hvhjvgc', 'hvjgvjg', 'Receptionist', '0-2 Years', 'on', 'nbkhhhhhhh', 'ass2.cpp');

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruitments`
--
ALTER TABLE `recruitments`
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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
