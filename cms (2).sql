-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 09:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` varchar(15) NOT NULL,
  `resident_id` varchar(15) NOT NULL,
  `total_income` double NOT NULL,
  `date` datetime NOT NULL,
  `registration_turn` int(3) NOT NULL,
  `sacc_id` varchar(20) NOT NULL,
  `payment_status` double NOT NULL,
  `rest_time` int(3) NOT NULL,
  `monthly_payment` double NOT NULL,
  `pre_payment` int(11) NOT NULL,
  `house_type` varchar(10) NOT NULL,
  `bead_room` int(3) NOT NULL,
  `house_price` double NOT NULL,
  `ai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `resident_id`, `total_income`, `date`, `registration_turn`, `sacc_id`, `payment_status`, `rest_time`, `monthly_payment`, `pre_payment`, `house_type`, `bead_room`, `house_price`, `ai_id`) VALUES
('1', 'BSR2', 10212, '2018-03-08 00:00:00', 2, '212121212121212', 3200, 1, 221, 21, '323', 2, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `applicanta`
--

CREATE TABLE `applicanta` (
  `applicant_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `total_income` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `rest_time` int(11) NOT NULL,
  `monthly_payment` int(11) NOT NULL,
  `house_type` int(11) NOT NULL,
  `bead_room` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='sacc_id';

-- --------------------------------------------------------

--
-- Table structure for table `deletedmarital`
--

CREATE TABLE `deletedmarital` (
  `marital_id` varchar(15) NOT NULL,
  `his_id` varchar(15) NOT NULL,
  `her_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `datadeleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedmarital`
--

INSERT INTO `deletedmarital` (`marital_id`, `his_id`, `her_id`, `date`, `datadeleted`) VALUES
('BSM1', 'BSR2', 'BSR3', '2018-03-13', '2018-03-29'),
('BSM2', 'BSR2', 'BSR3', '2018-03-28', '2018-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `deletedresident`
--

CREATE TABLE `deletedresident` (
  `resident_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `birth` date NOT NULL,
  `dateexite` date NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(20) NOT NULL,
  `mothername` varchar(20) NOT NULL,
  `grandmothername` varchar(20) NOT NULL,
  `sub_city` varchar(15) NOT NULL,
  `woreda` varchar(4) NOT NULL,
  `kebele` varchar(4) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `house_status` varchar(10) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `income` double DEFAULT NULL,
  `income_source` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedresident`
--

INSERT INTO `deletedresident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `birth`, `dateexite`, `date`, `photo`, `mothername`, `grandmothername`, `sub_city`, `woreda`, `kebele`, `contact`, `email`, `house_status`, `marital_status`, `income`, `income_source`) VALUES
('BSR4', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '2018-03-28', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `sex` char(1) NOT NULL,
  `birth` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `mname`, `lname`, `sex`, `birth`, `type`, `role`, `branch`, `photo`) VALUES
('CA001', 'Eyasu', 'Tewodros', 'Ketema', 'M', '1993-01-27', 'Administrator', 'Normal', 'Bole medhanialem', '1'),
('CA002', 'Kinde', 'Tewachew', 'Ergetea', 'M', '1985-01-03', 'Administrator', 'Normal', 'Bole Medhanialem', '1'),
('CA003', 'Kinde', 'Tewachew', 'Ergetea', 'M', '1985-01-03', 'Administrator', 'Normal', 'Bole Medhanialem', '1'),
('CA004', 'Kinde', 'Tewachew', 'Ergetea', 'M', '1985-01-03', 'Administrator', 'Normal', 'Bole Medhanialem', '1');

-- --------------------------------------------------------

--
-- Table structure for table `emp_acc`
--

CREATE TABLE `emp_acc` (
  `acc_id` int(10) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_acc`
--

INSERT INTO `emp_acc` (`acc_id`, `emp_id`, `user_name`, `password`, `user_type`) VALUES
(1, 'CA001', 'Eyasuy', '123456', 'Admin'),
(2, 'CA002', 'Eyasuy', '123456', 'Admin'),
(3, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(4, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(5, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(6, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(7, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(8, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(9, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(10, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(11, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(12, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(13, 'CA004', 'jsdhfjhsdjfh', '123456', 'CBE');

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE `marital` (
  `marital_id` varchar(15) NOT NULL,
  `his_id` varchar(15) NOT NULL,
  `her_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `ai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`marital_id`, `his_id`, `her_id`, `date`, `ai_id`) VALUES
('BSM10', 'BSR10', 'BSR11', '2018-03-29', 10),
('BSM11', 'BSR11', 'BSR8', '2018-03-07', 11),
('BSM3', 'BSR2', 'BSR3', '2018-03-28', 3),
('BSM4', 'BSR2', 'BSR3', '2018-03-28', 4),
('BSM5', 'BSR2', 'BSR3', '2018-03-28', 5),
('BSM6', 'BSR2', 'BSR3', '2018-03-28', 6),
('BSM7', 'BSR2', 'BSR3', '2018-03-28', 7),
('BSM8', 'BSR2', 'BSR3', '2018-03-28', 8),
('BSM9', 'BSR2', 'BSR3', '2018-03-28', 9);

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `birth` date NOT NULL,
  `date` date NOT NULL,
  `photo` varchar(20) NOT NULL,
  `mothername` varchar(20) NOT NULL,
  `grandmothername` varchar(20) NOT NULL,
  `sub_city` varchar(15) NOT NULL,
  `woreda` varchar(4) NOT NULL,
  `kebele` varchar(4) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `house_status` varchar(10) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `income` double DEFAULT NULL,
  `income_source` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `birth`, `date`, `photo`, `mothername`, `grandmothername`, `sub_city`, `woreda`, `kebele`, `contact`, `email`, `house_status`, `marital_status`, `income`, `income_source`) VALUES
('BSR10', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 10000, 'governmental'),
('BSR11', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'F', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 10000, 'governmental'),
('BSR2', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '2018-Sun-Mar', '1', 'Bgfgfg', 'Bole', 'Nvbv', '01', '01', '+25198888888', 'hasgdh@sdg', 'own', 0, '30000'),
('BSR3', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental'),
('BSR5', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental'),
('BSR6', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental'),
('BSR7', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental'),
('BSR8', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '2', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental'),
('BSR9', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 10000, 'governmental');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `user_name`, `password`, `user_type`) VALUES
('Eyasuy123456', 'Eyasuy', '123456', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`ai_id`,`applicant_id`),
  ADD KEY `resident_id` (`resident_id`);

--
-- Indexes for table `deletedmarital`
--
ALTER TABLE `deletedmarital`
  ADD PRIMARY KEY (`marital_id`);

--
-- Indexes for table `deletedresident`
--
ALTER TABLE `deletedresident`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_acc`
--
ALTER TABLE `emp_acc`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `emp_id_2` (`emp_id`);

--
-- Indexes for table `marital`
--
ALTER TABLE `marital`
  ADD PRIMARY KEY (`marital_id`),
  ADD KEY `his_id` (`his_id`),
  ADD KEY `her_id` (`her_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `ai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);

--
-- Constraints for table `emp_acc`
--
ALTER TABLE `emp_acc`
  ADD CONSTRAINT `emp_acc_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marital`
--
ALTER TABLE `marital`
  ADD CONSTRAINT `marital_ibfk_1` FOREIGN KEY (`his_id`) REFERENCES `resident` (`resident_id`),
  ADD CONSTRAINT `marital_ibfk_2` FOREIGN KEY (`her_id`) REFERENCES `resident` (`resident_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
