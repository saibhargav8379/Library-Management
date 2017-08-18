-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 01:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ucmlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(20) NOT NULL,
  `bookid` int(11) NOT NULL,
  `fdate` varchar(20) NOT NULL,
  `tdate` varchar(20) NOT NULL,
  `days` int(11) NOT NULL,
  `Delivery_type` varchar(30) NOT NULL,
  `Delivery_Charge` int(11) NOT NULL,
  `Total_Amount` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL,
  `BookStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `studentid`, `bookid`, `fdate`, `tdate`, `days`, `Delivery_type`, `Delivery_Charge`, `Total_Amount`, `Status`, `BookStatus`) VALUES
(38, '700638595', 8, '2016-11-25', '2016-11-26', 1, 'Store', 0, '6', 1, 1),
(39, '700638595', 12, '2016-11-26', '2016-11-27', 1, 'Store', 0, '7', 1, 1),
(40, '700638595', 12, '2016-11-26', '2016-11-27', 1, 'Store', 0, '7', 1, 1),
(41, '700638595', 12, '2016-11-26', '2016-11-29', 3, 'Store', 0, '9', 1, 1),
(42, '700638595', 12, '2016-11-26', '2016-12-13', 17, 'Store', 0, '23', 1, 1),
(47, '700638595', 15, '2016-12-14', '2016-12-05', 9, 'Store', 0, '13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookName` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Cost` varchar(20) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Id`, `BookName`, `Author`, `Publisher`, `Pages`, `Cost`, `Image`, `status`) VALUES
(2, 'css', 'Elizabeth', 'Elizabeth Castro', 1200, '4', '../Images/css.png', 'True'),
(3, 'html', 'Matthew', 'OReilly', 1450, '5', '../Images/html.jpeg', 'True'),
(4, 'java', 'DEITEL', 'DEITEL', 1600, '6', '../Images/javaDEITEL.jpg', 'True'),
(5, 'javascript', 'Eric Freeman', 'OREILLY', 1409, '4', '../Images/javascript.jpeg', 'True'),
(6, 'professionalc#', '3Edition', 'Vfox', 1560, '5', '../Images/professional c#.jpeg', 'True'),
(7, 'webdesign', 'Susan', 'New Riders', 1500, '4', '../Images/webdesign.jpeg', 'True'),
(8, 'HTML ', 'O Reilly', 'Matthew', 1200, '5', '../Images/html.jpeg', 'True'),
(9, 'web', 'sam', 'oreilly', 1065, '5', '../Images/css.png', 'True'),
(12, 'java', 'deitel', 'deitel', 1295, '6', '../Images/javaDEITEL.jpg', 'True'),
(14, 'java', 'deit', 'deitel', 1300, '4', '../Images/javaDEITEL.jpg', 'True'),
(15, 'Sai Bhargav Pothuguntla', 'Jerry Menas', 'Friendsof ED', 1300, '4', '../Images/book2.jpg', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `Feedback` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `User`, `Feedback`) VALUES
(2, '700638597', 'Need java book'),
(3, '700638596', 'Need Jquery Ebook'),
(4, '700638597', 'Need Bootstrap'),
(5, '700638595', 'mm'),
(6, '', 'shdvbskjh'),
(7, '', 'fknv kdfj'),
(8, '', 'jhbjhbjhb'),
(9, '', 'fkj nkdj n'),
(10, '', 'kjd nksj n'),
(11, '', 'hjgvhjgj'),
(12, '', 'jhvhgvghv'),
(13, '700638595', 'bhbhhbhb');

-- --------------------------------------------------------

--
-- Table structure for table `freebooks`
--

CREATE TABLE IF NOT EXISTS `freebooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BookName` varchar(50) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(50) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Document` varchar(1000) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `freebooks`
--

INSERT INTO `freebooks` (`id`, `BookName`, `Author`, `Publisher`, `Pages`, `Document`, `status`) VALUES
(6, 'Gift of Fire', 'Saara', 'Baase', 1048, '../Images/A Gift of Fire- Social, Legal, and Ethical Issues for Computing Technology.pdf', 'True'),
(7, 'Electronic Commerce', 'Gray', 'Gray', 1200, '../Images/Electronic Commerce 11th edition by Gary... (1).pdf', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE IF NOT EXISTS `librarian` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`ID`, `UserName`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookingid` int(11) NOT NULL,
  `Total_Amount` varchar(20) NOT NULL,
  `CardholderName` varchar(50) NOT NULL,
  `Bank` varchar(50) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Accno` varchar(30) NOT NULL,
  `CardNo` varchar(30) NOT NULL,
  `CvvNo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `bookingid`, `Total_Amount`, `CardholderName`, `Bank`, `Type`, `Accno`, `CardNo`, `CvvNo`) VALUES
(6, 23, '20', 'Sai Bhargav Pothuguntla', 'bank of america', 'Credit', '4545445454545454', '7458547854758457', '154'),
(7, 31, '16', 'Sai Bhargav Pothuguntla', 'bank of america', 'Debit', '1212121212121212', '1212121212121212', '121'),
(8, 33, '15', 'Sai Bhargav Pothuguntla', 'bank of america', 'Debit', '1212121212121212', '2121212121212121', '151');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `studentid` (`studentid`),
  UNIQUE KEY `emailid` (`emailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `studentid`, `firstname`, `lastname`, `mobile`, `emailid`, `password`, `gender`) VALUES
(1, '700638595', 'Sai ', 'Pothuguntla', '9133259104', 'sxp85950@ucmo.edu', 'op', 'Male'),
(2, '700638596', 'Adams', 'B', '9701355579', 'axb95950@ucmo.edu', 'pothuguntla', 'Male'),
(3, '700638597', 'Mary', 'B', '8019563765', 'mxb96960@ucmo.edu', 'pothuguntla', 'Female'),
(9, '700638583', 'Sai Bhargav', 'Pothuguntla', '9133259105', 'sxp85951@ucmo.edu', 'pothuguntla', 'Male'),
(10, '700638562', 'Bravo James', 'V', '9133259705', 'bxv75859@ucmo.edu', 'pothu', 'Male'),
(11, '700654738', 'Sai', 'Pothuguntla', '9133259105', 'sxp85748@ucmo.edu', 'po', 'Male'),
(12, '700859486', 'Sai', 'Pothuguntla', '9133259105', 'sxp85987@ucmo.edu', 'po', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
