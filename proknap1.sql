-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 08:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proknap`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorisation`
--

CREATE TABLE `authorisation` (
  `Auth_id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authorisation`
--

INSERT INTO `authorisation` (`Auth_id`, `Role`) VALUES
(1, 'Admin'),
(2, 'Procurement Head'),
(3, 'Dealing Officer'),
(4, 'Indenter');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dname` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dname`, `Dept_id`) VALUES
('Procurement', 0),
('IT', 1),
('Finance', 2),
('Electrical', 3),
('Mechanical', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ext1`
--

CREATE TABLE `ext1` (
  `T_id` int(11) NOT NULL,
  `Ext_date1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ext2`
--

CREATE TABLE `ext2` (
  `T_id` int(11) NOT NULL,
  `Ext_date2` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indent`
--

CREATE TABLE `indent` (
  `Pr_no` int(11) NOT NULL,
  `Pr_date` date NOT NULL,
  `Descr` text NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `do` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indent`
--

INSERT INTO `indent` (`Pr_no`, `Pr_date`, `Descr`, `Dept_id`, `do`) VALUES
(1, '2016-06-22', 'sda asvjcj cjd jcda  ca c', 1, 'Jayaprakash Rai'),
(2, '2016-07-11', 'sdcds fcadsecfed cfasdfc as', 2, 'Kavita Soham'),
(3, '2016-08-10', 'rgvadsf gdfsg fds g sdfg ', 3, 'Sagar Mitra'),
(4, '2016-02-09', 'cgxgxhhcj  hg h  h j j ik kk', 4, 'Suzan Pinto');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `User_id` varchar(20) NOT NULL,
  `Req_no` int(11) NOT NULL,
  `Descr` text NOT NULL,
  `Req_status` varchar(15) NOT NULL DEFAULT 'Pending',
  `Date` date NOT NULL,
  `Item` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`User_id`, `Req_no`, `Descr`, `Req_status`, `Date`, `Item`, `Quantity`) VALUES
('Tushar Pandey', 1, 'ghvjj vhvv vjhvjhjhvjh', 'Pending', '2016-06-13', 'cluster system', 1),
('Nikhila', 2, ' vnjv  hg vhuu gvjvuv vgvjju', 'Pending', '2016-09-19', 'air conditioner', 1),
('Rachita Gururaj', 3, 'yuugyu yyi78 hihyiihi ghiuh', 'Pending', '2016-08-11', 'furniture', 6),
('Abhishekh S', 4, 'mhjvhv  h h h hhj j j j j j  jkhhjuhhj m,,k', 'Pending', '2016-10-18', 'laptop', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `Status_id` int(11) NOT NULL,
  `Descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_id`, `Descr`) VALUES
(1, 'Evaluation Sent Date'),
(2, 'Evaluation Received date'),
(3, 'Approval for Price bid Opening Sent date'),
(4, 'Received from Finance date'),
(5, 'Award approval sent date'),
(6, 'Award approval received date'),
(7, 'PO Date');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE `tender` (
  `T_id` int(11) NOT NULL,
  `Tdate` date NOT NULL,
  `Bid_open_date` date NOT NULL,
  `Pr_no` int(11) NOT NULL,
  `Status_id` int(11) NOT NULL,
  `Last_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`T_id`, `Tdate`, `Bid_open_date`, `Pr_no`, `Status_id`, `Last_updated`) VALUES
(3, '2016-04-12', '2016-06-09', 1, 6, '2016-08-18'),
(4, '2016-08-16', '2016-10-02', 1, 4, '2016-10-07'),
(5, '2016-10-01', '2016-10-12', 3, 1, '2016-10-22'),
(6, '2016-08-07', '2016-09-15', 2, 2, '2016-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `Auth_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Dept_id`, `Auth_id`, `password`) VALUES
('Abhilasha Shah', 2, 4, 'password'),
('Abhishekh S', 1, 4, 'password'),
('Akshay Jadeja', 0, 2, 'password'),
('Bhavana Kohli', 3, 4, 'password'),
('Chandana N T', 4, 4, 'password'),
('Gagandeep', 2, 4, 'password'),
('Gargi', 3, 4, 'password'),
('Jayaprakash Rai', 0, 3, 'password'),
('Kavita Soham', 0, 3, 'password'),
('Nikhila', 1, 4, 'password'),
('Nisha Ramesh', 1, 4, 'password'),
('Nisha Singh', 2, 4, 'password'),
('Pratap', 4, 4, 'password'),
('Rachita Gururaj', 4, 4, 'password'),
('Sagar Mitra', 0, 3, 'password'),
('Satwik Pandit', 1, 4, 'password'),
('Suzan Pinto', 0, 3, 'password'),
('Tushar Pandey', 4, 4, 'password'),
('Yuvraj Singh', 3, 4, 'password'),
('Zuber Ali', 2, 4, 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorisation`
--
ALTER TABLE `authorisation`
  ADD PRIMARY KEY (`Auth_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `ext1`
--
ALTER TABLE `ext1`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `ext2`
--
ALTER TABLE `ext2`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `indent`
--
ALTER TABLE `indent`
  ADD PRIMARY KEY (`Pr_no`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `do` (`do`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Req_no`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`T_id`),
  ADD KEY `Pr_no` (`Pr_no`),
  ADD KEY `Status_id` (`Status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `Auth_id` (`Auth_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ext1`
--
ALTER TABLE `ext1`
  ADD CONSTRAINT `ext1_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `tender` (`T_id`);

--
-- Constraints for table `ext2`
--
ALTER TABLE `ext2`
  ADD CONSTRAINT `ext2_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `tender` (`T_id`);

--
-- Constraints for table `indent`
--
ALTER TABLE `indent`
  ADD CONSTRAINT `indent_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `indent_ibfk_2` FOREIGN KEY (`do`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `tender`
--
ALTER TABLE `tender`
  ADD CONSTRAINT `tender_ibfk_1` FOREIGN KEY (`Pr_no`) REFERENCES `indent` (`Pr_no`),
  ADD CONSTRAINT `tender_ibfk_2` FOREIGN KEY (`Status_id`) REFERENCES `status` (`Status_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Auth_id`) REFERENCES `authorisation` (`Auth_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
