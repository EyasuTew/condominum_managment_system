-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 08:13 AM
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
('BSA1', 'BSR2', 10212, '2018-03-08 00:00:00', 2, '212121212121212', 3200, 1, 221, 21, '323', 2, 200000, 1),
('BSA5', 'BSR7', 30000, '2018-03-31 09:03:29', 10, '2147483648', 0, 0, 1200000, 15000, '40/60', 3, 600000, 28),
('BSA6', 'BSR8', 30000, '2018-03-31 09:03:43', 10, '2147483648', 0, 0, 1200000, 15000, '40/60', 3, 600000, 29),
('BSA7', 'BSR9', 10000, '2018-03-31 09:03:48', 10, '2147483648', 0, 0, 1200000, 15000, '40/60', 3, 600000, 30),
('BSA8', 'BSR10', 20000, '2018-04-01 09:04:14', 5, '10000111112', 0, 0, 1000000, 12500, '40/60', 2, 500000, 43),
('BSA9', 'BSR6', 30000, '2018-04-03 07:04:05', 4, '10000111113', 0, 12, 1000000, 25000, '20/80', 3, 500000, 44);

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
-- Table structure for table `app_acc`
--

CREATE TABLE `app_acc` (
  `acc_id` int(15) NOT NULL,
  `applicant_id` varchar(15) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_acc`
--

INSERT INTO `app_acc` (`acc_id`, `applicant_id`, `user_name`, `password`, `user_type`) VALUES
(24, 'BSA8', 'EyasVjsBh', 'U:FU5FM5', 'Applicant'),
(25, 'BSA9', 'EyasVjsBh', 'UAFU5FUW', 'Applicant');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `block_id` int(11) NOT NULL,
  `model` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `project_type` varchar(15) NOT NULL,
  `site_name` varchar(30) NOT NULL,
  `no_floor` int(11) NOT NULL,
  `no_room` int(11) NOT NULL,
  `bno` int(11) NOT NULL,
  `no_house` int(11) NOT NULL,
  `no_shop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deletedapplicant`
--

CREATE TABLE `deletedapplicant` (
  `applicant_id` varchar(15) NOT NULL,
  `resident_id` varchar(15) NOT NULL,
  `registration_date` datetime NOT NULL,
  `deleted_date` datetime NOT NULL,
  `house_type` varchar(10) NOT NULL,
  `bedroom` varchar(2) NOT NULL,
  `cause_type` varchar(20) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `ai_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deletedapplicant`
--

INSERT INTO `deletedapplicant` (`applicant_id`, `resident_id`, `registration_date`, `deleted_date`, `house_type`, `bedroom`, `cause_type`, `cause`, `ai_id`) VALUES
('BSA3', 'BSR5', '1945-02-05 00:00:00', '2018-04-10 10:04:58', '40/60', '2', 'Loss', 'Bnbnzbcnbzc nbnb bn', 1);

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
('CA004', 'Kinde', 'Tewachew', 'Ergetea', 'M', '1985-01-03', 'Administrator', 'Normal', 'Bole Medhanialem', '1'),
('CA005', 'Eyasu', 'Tewac', 'Ernbnb', 'M', '1985-01-03', 'Manager', 'Normal', 'Bole Medhanialem', '1'),
('CA006', 'Eyasu', 'Tewac', 'Ernbnb', 'M', '1985-01-03', 'Manager', 'Normal', 'Bole Medhanialem', '1');

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
(2, 'CA002', 'Eyasu11', '123456', 'Admin'),
(3, 'CA003', 'Eyasu33', '123456', 'BSC'),
(4, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(5, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(6, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(7, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(8, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(9, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(10, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(11, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(12, 'CA003', 'Eyasuyt', '123456', 'BSC'),
(13, 'CA004', 'Eyasu22', '123456', 'CBE'),
(14, 'CA005', 'Eyasu55', '123456', 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE `marital` (
  `marital_id` varchar(15) NOT NULL,
  `his_id` varchar(15) NOT NULL,
  `her_id` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `ai_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`marital_id`, `his_id`, `her_id`, `date`, `ai_id`) VALUES
('BSM10', 'BSR10', 'BSR11', '2018-03-29', 1),
('BSM3', 'BSR2', 'BSR3', '2018-03-28', 3),
('BSM4', 'BSR2', 'BSR3', '2018-03-28', 4),
('BSM5', 'BSR2', 'BSR3', '2018-03-28', 5),
('BSM6', 'BSR2', 'BSR3', '2018-03-28', 6),
('BSM7', 'BSR2', 'BSR3', '2018-03-28', 7),
('BSM8', 'BSR2', 'BSR3', '2018-03-28', 8),
('BSM9', 'BSR2', 'BSR3', '2018-03-28', 9);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(15) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `emp_id`, `title`, `date`, `content_id`) VALUES
(1, 'CA003', 'Nbznxbcnbnzcbnzx', '2018-04-11 00:00:00', 1);

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
  `income_source` varchar(20) DEFAULT NULL,
  `ai_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `gender`, `birth`, `date`, `photo`, `mothername`, `grandmothername`, `sub_city`, `woreda`, `kebele`, `contact`, `email`, `house_status`, `marital_status`, `income`, `income_source`, `ai_id`) VALUES
('BSR10', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'rent', 'marrid', 10000, 'governmental', 1),
('BSR11', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'F', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'rent', 'marrid', 10000, 'governmental', 2),
('BSR2', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '2018-Sun-Mar', '1', 'Bgfgfg', 'Bole', 'Nvbv', '01', '01', '+25198888888', 'hasgdh@sdg', 'own', 0, '30000', 3),
('BSR3', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', '1', 'marrid', 30000, 'governmental', 4),
('BSR5', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental', 5),
('BSR6', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'rent', 'single', 30000, 'governmental', 6),
('BSR7', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '1', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental', 7),
('BSR8', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '2', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '01', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 30000, 'governmental', 8),
('BSR9', 'Eyasu', 'Vjsdhfj', 'Bhghgh', 'M', '2018-12-31', '1945-02-05', '3', 'Bgfgfg', 'Nvbvb', 'Bole', '01', '03', '+25198888888', 'hasgdh@sdgh.nv', 'own', 'marrid', 10000, 'governmental', 9);

-- --------------------------------------------------------

--
-- Table structure for table `savingaccount`
--

CREATE TABLE `savingaccount` (
  `sacc_id` varchar(20) NOT NULL,
  `resident_id` varchar(15) NOT NULL,
  `nationality` varchar(15) NOT NULL,
  `education_level` varchar(15) NOT NULL,
  `income` double NOT NULL,
  `acc_no` varchar(20) NOT NULL,
  `acc_type` varchar(10) NOT NULL,
  `balance` double NOT NULL,
  `loan` double NOT NULL,
  `interest` double NOT NULL,
  `ai_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savingaccount`
--

INSERT INTO `savingaccount` (`sacc_id`, `resident_id`, `nationality`, `education_level`, `income`, `acc_no`, `acc_type`, `balance`, `loan`, `interest`, `ai_id`) VALUES
('10000111111', 'BSR5', 'Ethiopian', 'Certificate', 30000, '10000111111', 'savinghous', 0, 0, 0.7, 1),
('10000111112', 'BSR10', 'Ethiopian', 'Diploma', 10000, '10000111112', 'savinghous', 0, 0, 0.7, 12),
('10000111113', 'BSR6', 'Ethiopian', 'Diploma', 30000, '10000111113', 'savinghous', 0, 0, 0.7, 13);

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
('Eyasu22123456', 'Eyasu22', '123456', 'CBE'),
('Eyasu33123456', 'Eyasu33', '123456', 'BSC'),
('Eyasu55123456', 'Eyasu55', '123456', 'MG'),
('Eyasuy123456', 'Eyasuy', '123456', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`ai_id`,`applicant_id`),
  ADD KEY `resident_id` (`resident_id`),
  ADD KEY `sacc_id` (`sacc_id`);

--
-- Indexes for table `app_acc`
--
ALTER TABLE `app_acc`
  ADD PRIMARY KEY (`acc_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `deletedapplicant`
--
ALTER TABLE `deletedapplicant`
  ADD PRIMARY KEY (`ai_id`);

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
  ADD UNIQUE KEY `ai_id` (`ai_id`),
  ADD KEY `his_id` (`his_id`),
  ADD KEY `her_id` (`her_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`),
  ADD UNIQUE KEY `ai_id` (`ai_id`);

--
-- Indexes for table `savingaccount`
--
ALTER TABLE `savingaccount`
  ADD PRIMARY KEY (`sacc_id`),
  ADD UNIQUE KEY `ai_id` (`ai_id`),
  ADD KEY `resident_id` (`resident_id`);

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
  MODIFY `ai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `app_acc`
--
ALTER TABLE `app_acc`
  MODIFY `acc_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deletedapplicant`
--
ALTER TABLE `deletedapplicant`
  MODIFY `ai_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marital`
--
ALTER TABLE `marital`
  MODIFY `ai_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `ai_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `savingaccount`
--
ALTER TABLE `savingaccount`
  MODIFY `ai_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Constraints for table `savingaccount`
--
ALTER TABLE `savingaccount`
  ADD CONSTRAINT `savingaccount_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `resident` (`resident_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
