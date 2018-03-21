-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2018 at 07:08 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deanproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `no` int(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datemodify` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`no`, `rollno`, `status`, `datemodify`) VALUES
(1, 'b150223cs', 'option1', '2018-03-22'),
(3, 'b150005cs', 'option3', '2018-03-22'),
(4, 'b150223cs', 'option3', '2018-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `mtechstudent`
--

CREATE TABLE `mtechstudent` (
  `name` varchar(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `guide` varchar(225) NOT NULL,
  `guidemail` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mtechstudent`
--

INSERT INTO `mtechstudent` (`name`, `rollno`, `email`, `department`, `guide`, `guidemail`) VALUES
('heshan', 'b150005cs', 'deshawn@gmail.com', 'Mathematics', 'vinod', 'sumanathilaka_b150413cs@nitc.ac.in'),
('suneet', 'b150223cs', 'ara@gmail.com', 'Mathematics', 'vinod', 'sumanathilaka_b150413cs@nitc.ac.in'),
('deshan', 'b150413cs', 'deshan@gmail.com', 'Computer Science & Engineering', 'vinod', 'sumanathilaka_b150413cs@nitc.ac.in'),
('rakhee', 'b150474cs', 'rakhee@gmail.com', 'Mechanical Engineering', 'vinod', 'sumanathilaka_b150413cs@nitc.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `rollno` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`rollno`, `topic`, `status`, `date`) VALUES
('b150005cs', 'solar plant', 'option3', '2018-03-22'),
('b150223cs', 'asus', 'option3', '2018-03-29'),
('b150413cs', 'network', 'option1', '2018-03-22'),
('b150474cs', 'compiler', 'option1', '2018-03-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `mtechstudent`
--
ALTER TABLE `mtechstudent`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
