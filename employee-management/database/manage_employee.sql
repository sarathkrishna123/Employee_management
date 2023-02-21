-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 07:45 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage_employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_designation` varchar(100) NOT NULL,
  `mail_id` varchar(255) NOT NULL,
  `emp_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`emp_id`, `emp_name`, `emp_designation`, `mail_id`, `emp_image`) VALUES
(1, 'Hameed Ali', 'Frontend developer', 'alihameed@gmail.com', 'project_anand pavar.jpg'),
(3, 'Joel H', 'Software Developer', 'Joe@hotmail.com', 'images.jpg'),
(4, 'Rohan S', 'MIS', 'rohan@hotmail.com', ''),
(5, 'Jobin J', 'CRE', 'jobin@outlook.com', ''),
(6, 'Arun S', 'Software developer', 'arun123@gmail.com', ''),
(7, 'Harsha S', 'Front desk', 'harshas123@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
