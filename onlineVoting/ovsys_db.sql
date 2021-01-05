-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 04:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovsys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin1'),
(2, 'admin2', 'admin2@gmail.com', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `candidates_tbl`
--

CREATE TABLE `candidates_tbl` (
  `candidates_id` int(11) NOT NULL,
  `candidates_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `total_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates_tbl`
--

INSERT INTO `candidates_tbl` (`candidates_id`, `candidates_name`, `elections_name`, `total_votes`) VALUES
(11, 'A', 'HOD', 3),
(12, 'B', 'HOD', 6),
(13, 'C', 'HOD', 0),
(14, 'C', 'VICE CHAIRMAN', 1),
(15, 'D', 'VICE CHAIRMAN', 4),
(16, 'E', 'CLASS MONITOR', 1),
(17, 'F', 'CLASS MONITOR', 2),
(18, 'G', 'CLASS MONITOR', 1),
(19, 'H', 'DIRECTOR', 3),
(20, 'I', 'DIRECTOR', 1),
(30, 'O', 'Principle', 0),
(31, 'L', 'Principle', 0),
(32, 'P', 'Principle', 1),
(33, 'Q', 'Principle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `elections_tbl`
--

CREATE TABLE `elections_tbl` (
  `elections_id` int(11) NOT NULL,
  `elections_name` varchar(100) NOT NULL,
  `elections_start_date` date NOT NULL,
  `elections_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elections_tbl`
--

INSERT INTO `elections_tbl` (`elections_id`, `elections_name`, `elections_start_date`, `elections_end_date`) VALUES
(5, 'HOD', '2020-12-29', '2021-01-05'),
(7, 'VICE CHAIRMAN', '2020-12-29', '2021-01-03'),
(8, 'CLASS MONITOR', '2020-12-29', '2021-01-01'),
(9, 'DIRECTOR', '2020-12-29', '2021-01-01'),
(10, 'Chairman', '2021-01-02', '2021-01-07'),
(11, 'Principle', '2021-01-04', '2021-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `idreq_db`
--

CREATE TABLE `idreq_db` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idreq_db`
--

INSERT INTO `idreq_db` (`id`, `user_name`, `user_email`, `user_state`) VALUES
(50, 'test9', 'test9@gmail.com', 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `results_tbl`
--

CREATE TABLE `results_tbl` (
  `id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `candidates_name` varchar(100) NOT NULL,
  `elections_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results_tbl`
--

INSERT INTO `results_tbl` (`id`, `user_email`, `candidates_name`, `elections_name`) VALUES
(10, 'test2@gmail.com', 'B', 'HOD'),
(11, 'test@gmail.com', 'E', 'CLASS MONITOR'),
(12, 'test@gmail.com', 'B', 'HOD'),
(13, 'test@gmail.com', 'D', 'VICE CHAIRMAN'),
(14, 'test@gmail.com', 'H', 'DIRECTOR'),
(15, 'test3@gmail.com', 'B', 'HOD'),
(16, 'test3@gmail.com', 'C', 'VICE CHAIRMAN'),
(17, 'test3@gmail.com', 'F', 'CLASS MONITOR'),
(18, 'test3@gmail.com', 'H', 'DIRECTOR'),
(19, 'test4@gmail.com', 'B', 'HOD'),
(20, 'test4@gmail.com', 'D', 'VICE CHAIRMAN'),
(21, 'test4@gmail.com', 'F', 'CLASS MONITOR'),
(22, 'test4@gmail.com', 'I', 'DIRECTOR'),
(23, 'test5@gmail.com', 'A', 'HOD'),
(24, 'test5@gmail.com', 'D', 'VICE CHAIRMAN'),
(25, 'test5@gmail.com', 'G', 'CLASS MONITOR'),
(26, 'test5@gmail.com', 'H', 'DIRECTOR'),
(30, 'test99@gmail.com', 'B', 'HOD'),
(31, 'test9@gmail.com', 'A', 'HOD'),
(32, 'test9@gmail.com', 'P', 'Principle');

-- --------------------------------------------------------

--
-- Table structure for table `users_db`
--

CREATE TABLE `users_db` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_state` varchar(100) NOT NULL,
  `user_district` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `id_generated` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_db`
--

INSERT INTO `users_db` (`user_id`, `user_name`, `user_email`, `user_gender`, `user_state`, `user_district`, `user_city`, `user_password`, `id_generated`) VALUES
(4, 'test', 'test@gmail.com', 'male', 'Karnataka', 'DK', 'Mangalore', 'test1', 'KA5764318XYZ'),
(5, 'test2', 'test2@gmail.com', 'male', 'karnataka', 'dk', 'mang', 'test2', 'ML9093684XYZ'),
(6, 'test3', 'test3@gmail.com', 'male', 'Karnataka', 'dk', 'mang', 'test3', 'KA3734687XYZ'),
(7, 'test4', 'test4@gmail.com', 'male', 'Tamilnadu', 'dk', 'mang', 'test4', 'ML3473727XYZ'),
(8, 'test5', 'test5@gmail.com', 'male', 'Kerala', 'Kg', 'Kasaragod', 'test5', 'KL3905984XYZ'),
(11, 'test99', 'test99@gmail.com', 'male', 'Karnataka', 'DK', 'Mangalore', 'test99', 'KA5789382XYZ'),
(12, 'test9', 'test9@gmail.com', 'male', 'Karnataka', 'dk', 'mangalore', 'test9', 'KA2514650XYZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  ADD PRIMARY KEY (`candidates_id`);

--
-- Indexes for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  ADD PRIMARY KEY (`elections_id`);

--
-- Indexes for table `idreq_db`
--
ALTER TABLE `idreq_db`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results_tbl`
--
ALTER TABLE `results_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_db`
--
ALTER TABLE `users_db`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates_tbl`
--
ALTER TABLE `candidates_tbl`
  MODIFY `candidates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `elections_tbl`
--
ALTER TABLE `elections_tbl`
  MODIFY `elections_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `idreq_db`
--
ALTER TABLE `idreq_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `results_tbl`
--
ALTER TABLE `results_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users_db`
--
ALTER TABLE `users_db`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
