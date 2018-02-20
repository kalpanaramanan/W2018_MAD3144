-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2018 at 09:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus_passes`
--

CREATE TABLE `bus_passes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `timings` varchar(50) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `total_seats_available` int(11) DEFAULT '25',
  `no_of_seats_left` int(11) DEFAULT '25'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_passes`
--

INSERT INTO `bus_passes` (`id`, `name`, `timings`, `from`, `to`, `total_seats_available`, `no_of_seats_left`) VALUES
(1, 'Bus_1', '6.45 A.M', 2, 1, 25, 4),
(2, 'Bus_2', '6.45 A.M', 3, 1, 25, 20),
(3, 'Bus_3', '10.20 A.M', 2, 1, 25, 25),
(4, 'Bus_4', '11.15 A.M', 3, 1, 25, 18);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Lambton College'),
(2, 'Mississauga'),
(3, 'Brampton');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', 1),
(2, 'student', 'student', 2),
(3, 'staff', 'staff', 3),
(4, 'kalpana', 'kalpana123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `timings` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '1',
  `saturday` tinyint(1) NOT NULL,
  `notes` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `from`, `to`, `timings`, `status`, `saturday`, `notes`) VALUES
(9, 3, 1, '6:45 AM', 1, 1, '7:00 A.M on Saturdays '),
(10, 2, 1, '6:45 AM', 1, 1, '7:15 A.M on Saturdays'),
(11, 3, 1, '10:20 AM', 1, 0, ' '),
(12, 3, 1, '11:00 AM', 1, 1, ''),
(13, 2, 1, '11:15 AM', 1, 0, ''),
(14, 3, 1, '11:40 AM', 1, 1, ''),
(15, 3, 1, '12:30 PM', 1, 1, ''),
(16, 2, 1, '12:00 PM', 1, 1, ''),
(17, 3, 1, '2:30 PM', 1, 0, ''),
(18, 3, 1, '3:40 PM', 1, 0, ''),
(19, 3, 1, '4:00 PM', 1, 1, ''),
(20, 3, 1, '4:25 PM', 1, 0, ''),
(21, 2, 1, '4:25 PM', 1, 0, ''),
(22, 1, 3, '11:30 AM', 1, 1, ''),
(23, 1, 2, '12:30 PM', 1, 1, ''),
(24, 1, 3, '12:30 PM', 1, 1, ' '),
(25, 1, 3, '1:30 PM', 1, 1, ''),
(26, 1, 3, '1:45 PM', 1, 1, ''),
(27, 1, 2, '1:45 PM', 1, 1, ''),
(28, 1, 3, '2:30 PM', 1, 0, ''),
(29, 1, 2, '2:30 PM', 1, 0, ''),
(30, 1, 2, '3:30 PM', 1, 1, ' 4:00 P.M on Saturdays '),
(31, 1, 3, '3:30 PM', 1, 1, '4:00 P.M on Saturdays'),
(32, 1, 3, '5:00 PM', 1, 1, ''),
(33, 1, 2, '5:00 PM', 1, 1, ''),
(34, 1, 3, '5:05 PM', 1, 0, 'Not Available on Tuesdays and Thursdays'),
(35, 1, 3, '6:00 PM', 1, 1, ''),
(36, 1, 2, '6:00 PM', 1, 1, ''),
(37, 1, 3, '7:30 PM', 1, 1, ''),
(38, 1, 2, '7:30 PM', 1, 1, ''),
(39, 1, 3, '7:45 PM', 1, 1, ''),
(40, 1, 3, '8:10 PM', 1, 1, ''),
(41, 1, 2, '8:10 PM', 1, 1, ''),
(42, 1, 3, '9:35 PM', 1, 0, ' '),
(43, 1, 3, '9:45 PM', 1, 0, ''),
(44, 1, 2, '9:45 PM', 1, 0, ''),
(45, 1, 3, '10:20 PM', 1, 1, ''),
(46, 1, 2, '10:20 PM', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `student_bus_pass`
--

CREATE TABLE `student_bus_pass` (
  `id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `timings` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_passes`
--
ALTER TABLE `bus_passes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_bus_pass`
--
ALTER TABLE `student_bus_pass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus_passes`
--
ALTER TABLE `bus_passes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_bus_pass`
--
ALTER TABLE `student_bus_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
