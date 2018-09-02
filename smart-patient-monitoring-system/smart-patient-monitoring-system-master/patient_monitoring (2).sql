-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2017 at 11:13 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecg_log`
--

CREATE TABLE `ecg_log` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `datetime` timestamp NOT NULL,
  `ecg_rate` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `health_record`
--

CREATE TABLE `health_record` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `tempreture` double DEFAULT NULL,
  `pulse_rate` int(11) DEFAULT NULL,
  `ecg` float NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_record`
--

INSERT INTO `health_record` (`id`, `patient_id`, `tempreture`, `pulse_rate`, `ecg`, `time`) VALUES
(1, 10, 76, 24, 50, '2017-01-11 15:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patinet_name` varchar(15) NOT NULL,
  `age` int(2) NOT NULL,
  `diseases` varchar(20) NOT NULL,
  `date_of_admission` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`id`, `patient_id`, `patinet_name`, `age`, `diseases`, `date_of_admission`, `status`) VALUES
(1, 10, 'guddu', 22, 'maleria', '2017-03-30 19:51:21', 1),
(2, 11, 'dhavan', 25, 'fever', '2017-04-01 13:45:01', 0),
(3, 12, 'mihir', 25, 'dangue', '2017-04-01 13:47:29', 0),
(4, 13, 'ymp', 20, 'maleria', '2017-04-01 13:53:35', 0),
(5, 14, 'shiv', 21, 'cholera', '2017-04-01 13:54:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pulse_log`
--

CREATE TABLE `pulse_log` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `pulse_rate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pulse_log`
--

INSERT INTO `pulse_log` (`id`, `patient_id`, `datetime`, `pulse_rate`) VALUES
(1, 10, '2017-02-12 15:12:10', 1),
(2, 10, '2017-02-12 15:13:12', 4),
(3, 10, '2017-02-12 15:13:22', 18),
(4, 10, '2017-02-12 15:15:00', 2),
(5, 10, '2017-02-12 15:15:10', 5),
(6, 10, '2017-02-12 15:15:18', 24),
(7, 10, '2017-02-12 15:16:29', 30),
(8, 10, '2017-02-12 15:18:53', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tempreture_log`
--

CREATE TABLE `tempreture_log` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `tempreture` int(11) NOT NULL,
  `Date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempreture_log`
--

INSERT INTO `tempreture_log` (`id`, `p_id`, `tempreture`, `Date_time`) VALUES
(1, 10, 11, '0000-00-00 00:00:00'),
(2, 10, 23, '0000-00-00 00:00:00'),
(3, 10, 24, '2017-01-11 10:46:07'),
(4, 10, 37, '2017-01-12 05:55:58'),
(5, 10, 17, '2017-01-12 07:21:14'),
(6, 10, 23, '2017-01-12 07:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `role`) VALUES
(1, 'admin', 'dhavan123', 'admin'),
(2, 'dhavan', 'dhavan123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecg_log`
--
ALTER TABLE `ecg_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `health_record`
--
ALTER TABLE `health_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_id_2` (`patient_id`),
  ADD KEY `patient_id` (`patient_id`),
  ADD KEY `patient_id_3` (`patient_id`);

--
-- Indexes for table `pulse_log`
--
ALTER TABLE `pulse_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `tempreture_log`
--
ALTER TABLE `tempreture_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecg_log`
--
ALTER TABLE `ecg_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pulse_log`
--
ALTER TABLE `pulse_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tempreture_log`
--
ALTER TABLE `tempreture_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `health_record`
--
ALTER TABLE `health_record`
  ADD CONSTRAINT `health_record_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient_data` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tempreture_log`
--
ALTER TABLE `tempreture_log`
  ADD CONSTRAINT `tempreture_log_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient_data` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
