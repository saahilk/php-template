-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2018 at 12:40 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deanproject`
--

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
('deshank', 'b150050cs', 'desddhan@gmail.com', 'Electronics & Communication Engineering', 'Dr.suviya', 'suviya@nitc.ac.in'),
('deshan', 'b150413cs', 'deshan@gmail.com', 'Electrical Engineering', 'Dr . vinod pathari', 'pathari@nitc.ac.in'),
('gana', 'b150417ce', 'des@gmsil.com', 'Electrical Engineering', 'Dr.suviya', 'suviya@nitc.ac.in');

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
('b150050cs', 'computer archi', 'Dean\'s approval', '2018-03-20'),
('b150413cs', 'computer archi', 'Dean\'s approval', '2018-03-19'),
('b150417ce', 'computer c', 'Dean\'s approval', '2018-03-20');

--
-- Indexes for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

