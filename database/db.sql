-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 03, 2018 at 06:44 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `ID` varchar(35) NOT NULL,
  `location` int(2) DEFAULT NULL,
  `submitted_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `submitted_by` varchar(90) DEFAULT NULL,
  `recieved_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `initial_remarks` varchar(2000) DEFAULT NULL,
  `final_remarks` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` varchar(20) NOT NULL,
  `location` int(2) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endtime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `emailid` varchar(90) NOT NULL,
  `flag` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`emailid`, `flag`) VALUES
('aditi_b150063cs@nitc.ac.in', 7),
('ameersuhail_b150592cs@nitc.ac.in', 5),
('devan_b150072cs@nitc.ac.in', 8),
('evareshma_b150129cs@nitc.ac.in', 4),
('geo_b150005cs@nitc.ac.in', 0),
('haziq_b150350cs@nitc.ac.in', 6),
('kiran_b150020cs@nitc.ac.in', 9),
('maheshkumar_b150588cs@nitc.ac.in', 2),
('reuben_b150042cs@nitc.ac.in', 10),
('rohit_b150264cs@nitc.ac.in', 11),
('saahilsuhas_b150470cs@nitc.ac.in', 3),
('saiswaroop_b150376cs@nitc.ac.in', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`,`location`,`starttime`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`emailid`),
  ADD UNIQUE KEY `emailid` (`emailid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
