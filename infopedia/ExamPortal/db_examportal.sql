-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2017 at 05:01 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_examportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(100) NOT NULL DEFAULT 'admin@admin.admin',
  `password` varchar(100) NOT NULL DEFAULT 'admin1234admin',
  `organization` varchar(100) NOT NULL DEFAULT 'ADMIN'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `password`, `organization`) VALUES
('admin2@admining.com', '123456789', 'ADMIN'),
('admin@1234', 'admin', 'ADMIN'),
('admin@admin.admin', 'admin1234admin', 'ADMIN'),
('adminnew@test.com', '456123', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catName` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `markQuestCorrect` int(1) NOT NULL DEFAULT '3',
  `markQuestIncorrect` int(1) NOT NULL DEFAULT '0',
  `totTime` varchar(5) NOT NULL DEFAULT '1800',
  `organization` varchar(150) NOT NULL DEFAULT 'ADMIN'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catName`, `status`, `markQuestCorrect`, `markQuestIncorrect`, `totTime`, `organization`) VALUES
('jjasjgfj', 0, 3, 0, '1800', 'ADMIN'),
('category test1', 1, 3, 0, '3600', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `category test1`
--

CREATE TABLE `category test1` (
  `questno` int(255) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `opt1` varchar(150) NOT NULL,
  `opt2` varchar(150) NOT NULL,
  `opt3` varchar(150) NOT NULL,
  `opt4` varchar(150) NOT NULL,
  `optCorrect` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category test1`
--

INSERT INTO `category test1` (`questno`, `quest`, `opt1`, `opt2`, `opt3`, `opt4`, `optCorrect`) VALUES
(1, 'kjsdgfiu', 'kfhkjhkj', 'kfdhkj', 'hhkjdhfkjhkj', 'kfdslkhgl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jjasjgfj`
--

CREATE TABLE `jjasjgfj` (
  `questno` int(255) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `opt1` varchar(150) NOT NULL,
  `opt2` varchar(150) NOT NULL,
  `opt3` varchar(150) NOT NULL,
  `opt4` varchar(150) NOT NULL,
  `optCorrect` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `orga` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`orga`) VALUES
('ARDENT'),
('CAMBRIDGE'),
('GCELT'),
('GLOBSYN'),
('HP ACADEMY'),
('IEM'),
('MCKV'),
('RAJU\'S TUTION'),
('RCC'),
('TECHNO INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `fname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `fname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`fname`, `dob`, `phone`, `gender`, `organization`, `qualification`, `email`, `password`) VALUES
('Amit Sadhukhan', '1960-07-17', '9831853021', 'male', 'GLOBSYN', 'none', 'assadhukhanamit@gmail.com', '12345678910'),
('Bratati Sadhukhan', '1966-07-15', '', 'female', 'MCKV', 'none', 'bratati@gmail.com', '789456123'),
('akjsbfkjbk', '1955-04-05', '', '', 'GCELT', '10th', 'kbasfkjbfhj@kbsfkhgbkh', '456456'),
('jsldgkjb', '1890-02-22', '', '', 'ARDENT', 'none', 'kjjdksjbdgkj@kjfnkjgbsjk', '123123'),
('aldgjgbgk jnakfjkj', '1895-11-22', '', '', 'IEM', 'none', 'kajbkjbfkj@zdnjkfnj', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `temp_teachers`
--

CREATE TABLE `temp_teachers` (
  `fname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `organization` varchar(255) NOT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`email`,`organization`,`password`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catName`);

--
-- Indexes for table `category test1`
--
ALTER TABLE `category test1`
  ADD PRIMARY KEY (`questno`);

--
-- Indexes for table `jjasjgfj`
--
ALTER TABLE `jjasjgfj`
  ADD PRIMARY KEY (`questno`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`orga`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`organization`,`email`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`email`,`organization`);

--
-- Indexes for table `temp_teachers`
--
ALTER TABLE `temp_teachers`
  ADD PRIMARY KEY (`organization`,`email`,`password`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
