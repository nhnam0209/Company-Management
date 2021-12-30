-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 11:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mycompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `pwd`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Did` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `roomnum` int(11) NOT NULL,
  `descript` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Did`, `eid`, `dname`, `roomnum`, `descript`) VALUES
(2, 100002, 'IT', 1223, 'IT Team'),
(3, 100004, 'Marketing', 1223, 'Marketing Team');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` text NOT NULL,
  `DoB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `pic` text NOT NULL,
  `stt` tinyint(1) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `lastname`, `email`, `pwd`, `DoB`, `gender`, `phonenumber`, `addr`, `dept`, `degree`, `pic`, `stt`) VALUES
(100002, 'Tran', 'Tuan Minh', 'ttminh@mycompany.com', '$2y$10$K5d8ZaBGb3k/135w4/eDhOaOpCbMfMxOC221zaqq76n2t1WRZW8oi', '2005-01-13', 'Male', '09033654489', '11 Nguyen Hue', 'IT', 'Bachelor', 'images/download (1).jpeg', -1),
(100004, 'Minh Nhan', 'Nguyen', 'nmnhan@mycompany.com', '$2y$10$9HiGt7UyExr3ifm/hgFS3.oRFH1U9927u/ElDhP72I9qjM7qzKlG.', '1993-06-15', 'Male', '055315656', '23 Nguyen Hue', 'Marketing', 'Bachelor', 'images/no.jpg', 0),
(100005, 'Nguyen', 'Minh Tam', 'nmtam@mycompany.com', '$2y$10$05S2Wgcb/FXjsNOXyzIeLujGUutoFAGOQsAaMutP/9wu0ia5fEXqG', '1992-04-30', 'Male', '0399552331', '25/1 Tran Hung Dao', 'IT', 'Bachelor', 'images/no.jpg', -1),
(100006, 'Nguyễn', 'Thị Diễm My', 'ntdmy@mycompany.com', '$2y$10$2yhCpJp2U5wm98.KivdyjOrDjw79gRZf9WvLr6O4LUjT4AqNge7q.', '1999-06-08', 'Female', '09112364586', '55 Võ Trường Toản', 'IT', 'Bachelor', 'images/no.jpg', -1),
(100007, 'Hoàng', 'Anh Tuấn', 'hatuan@mycompany.com', '$2y$10$c.FagIuq1YnJLiT5mSV05.WHEEBJLjK1CTsToljdcR..zh3agr.xy', '1995-05-01', 'Male', '0666549866', '32 Võ Thị Sáu', 'IT', 'Bachelor', 'images/no.jpg', -1),
(100008, 'Tạ', 'Hoàng Minh', 'thoangminh@mycompany.com', '$2y$10$q52L/z1ESNcxQJE1rUx.5uQydNn9jgtBMvvfEENPIjMcX5CLhRgiW', '1994-05-16', 'Male', '095316162', '22  Điện Biên Phủ', 'IT', 'Bachelor', 'images/no.jpg', -1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeleave`
--

CREATE TABLE `employeeleave` (
  `id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `reason` varchar(100) NOT NULL,
  `stt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeleave`
--

INSERT INTO `employeeleave` (`id`, `token`, `start`, `end`, `reason`, `stt`) VALUES
(100002, 0, '2021-12-16', '2021-12-30', 'Sick', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `tid` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `tname` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `subdate` date NOT NULL,
  `stt` varchar(50) DEFAULT NULL,
  `descript` text NOT NULL,
  `rating` varchar(50) NOT NULL,
  `upfile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`tid`, `eid`, `tname`, `deadline`, `subdate`, `stt`, `descript`, `rating`, `upfile`) VALUES
(6, 100002, 'Data Structure ', '2021-12-03', '0000-00-00', 'Completed', 'ABC', 'Good', ''),
(7, 100004, 'Data Structure4', '2022-01-05', '0000-00-00', 'New', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100009;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
