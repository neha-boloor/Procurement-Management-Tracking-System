-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 06:47 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proknap`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_view`(IN `flag` INT(11))
begin if (flag<10) then select * from `pr` where (`pr`.`Pr_no` in (select `tender`.`Pr_no` from `tender` where (`tender`.`Status` <> 12)) or (not(`pr`.`Pr_no` in (select `tender`.`Pr_no` from `tender`)))) ; else select * from `pr` where (`pr`.`Pr_no` in (select `tender`.`Pr_no` from `tender` where (`tender`.`Status` = 12))); end if; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE IF NOT EXISTS `assign` (
  `Pr_no` int(11) NOT NULL,
  `DO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`Pr_no`, `DO`) VALUES
(10, 'DO1'),
(11, 'DO1'),
(13, 'DO1'),
(7, 'DO2'),
(8, 'DO3'),
(9, 'DO3');

-- --------------------------------------------------------

--
-- Table structure for table `authorisation`
--

CREATE TABLE IF NOT EXISTS `authorisation` (
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
(4, 'Indentor');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Dept_name` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_name`, `Dept_id`) VALUES
('Procurement', 0),
('IT', 1),
('Finance', 2),
('Electrical', 3),
('Mechanical', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ext1`
--

CREATE TABLE IF NOT EXISTS `ext1` (
  `Pr_no` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ext1`
--

INSERT INTO `ext1` (`Pr_no`, `T_id`, `Date`) VALUES
(8, 1, '2016-12-30'),
(9, 1, '2016-12-30'),
(9, 2, '2016-12-30'),
(13, 1, '2016-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `ext2`
--

CREATE TABLE IF NOT EXISTS `ext2` (
  `Pr_no` int(11) NOT NULL,
  `T_id` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ext2`
--

INSERT INTO `ext2` (`Pr_no`, `T_id`, `Date`) VALUES
(9, 1, '2016-11-30'),
(9, 2, '2016-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `pr`
--

CREATE TABLE IF NOT EXISTS `pr` (
  `Pr_no` int(11) NOT NULL,
  `Pr_date` date NOT NULL,
  `Dept` int(11) NOT NULL,
  `Item` varchar(20) NOT NULL,
  `Descr` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pr`
--

INSERT INTO `pr` (`Pr_no`, `Pr_date`, `Dept`, `Item`, `Descr`, `Quantity`) VALUES
(7, '2016-11-02', 2, 'Safe', 'First Alert 2092DF 1.31 Cubic Foot Waterproof', 10),
(8, '2016-11-04', 3, 'Cartridge', 'HP 61 Black/Tri-color Original Ink Cartridges', 15),
(9, '2016-11-06', 4, 'Printer', 'HP LaserJet Pro P1102w Wireless Monochrome Printer', 10),
(10, '2016-11-13', 1, 'Folder', 'Letter Size, 1/3 Cut, Manila', 400),
(11, '2016-11-13', 1, 'Pens', 'BIC Medium Point (1.0 mm)', 1000),
(12, '2016-11-13', 1, 'Envelope', 'oly Mailers Envelopes Bags, 10x13-inch', 600),
(13, '2016-11-13', 2, 'Chair', 'Divano black office chairs', 10),
(15, '2017-04-11', 2, 'HP AU006TX Laptop', '8GB RAM, Nvidia 940 Mx', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pr_view`
--
CREATE TABLE IF NOT EXISTS `pr_view` (
`Pr_no` int(11)
,`Pr_date` date
,`Dept` int(11)
,`Item` varchar(20)
,`Descr` varchar(50)
,`Quantity` int(11)
,`DO` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `Status_id` int(11) NOT NULL,
  `Descr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_id`, `Descr`) VALUES
(1, 'Pending'),
(2, 'PR Approved'),
(3, 'Tender Floated'),
(4, 'Bid Opening Date Sent'),
(5, 'Sent for Evaluation'),
(6, 'Received after Evaluation'),
(7, 'Feasible'),
(8, 'Sent to Finance for Approval'),
(9, 'Approval from Finance Received'),
(10, 'Approval for Award Sent'),
(11, 'Approval for Award Received'),
(12, 'Purchase Order');

-- --------------------------------------------------------

--
-- Table structure for table `tender`
--

CREATE TABLE IF NOT EXISTS `tender` (
  `T_id` int(11) NOT NULL,
  `Floated_date` date NOT NULL,
  `Bid_open_date` date NOT NULL,
  `Pr_no` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Status_updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tender`
--

INSERT INTO `tender` (`T_id`, `Floated_date`, `Bid_open_date`, `Pr_no`, `Status`, `Status_updated_date`) VALUES
(1, '2016-11-13', '2016-12-30', 8, 4, '2016-11-13'),
(1, '2016-11-13', '2016-11-27', 9, 4, '2016-11-13'),
(1, '2016-11-13', '2016-11-30', 13, 12, '2016-11-14'),
(2, '2016-11-13', '2016-12-30', 7, 6, '2016-11-13'),
(2, '2016-11-13', '2016-11-29', 9, 3, '2016-11-13'),
(5, '2017-04-11', '2017-04-27', 11, 3, '2017-04-11');

--
-- Triggers `tender`
--
DELIMITER $$
CREATE TRIGGER `status` BEFORE UPDATE ON `tender`
 FOR EACH ROW begin IF NEW.Status <> OLD.Status THEN  SET NEW.Status_updated_date =(select CURDATE()); END IF; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_id` varchar(20) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `Auth_id` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `Dept_id`, `Auth_id`, `password`) VALUES
('ADMIN', 0, 1, 'password'),
('DO1', 0, 3, 'password'),
('DO2', 0, 3, 'password'),
('DO3', 0, 3, 'password'),
('DO4', 0, 3, 'password'),
('E01', 2, 4, 'password'),
('E02', 1, 4, 'password'),
('E03', 3, 4, 'password'),
('E04', 4, 4, 'password'),
('E05', 2, 4, 'password'),
('E06', 3, 4, 'password'),
('E07', 1, 4, 'password'),
('E08', 1, 4, 'password'),
('E09', 2, 4, 'password'),
('E10', 4, 4, 'password'),
('E11', 4, 4, 'password'),
('E12', 1, 4, 'password'),
('E13', 4, 4, 'password'),
('E14', 3, 4, 'password'),
('E15', 2, 4, 'password'),
('PH01', 0, 2, 'password');

-- --------------------------------------------------------

--
-- Structure for view `pr_view`
--
DROP TABLE IF EXISTS `pr_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pr_view` AS select `pr`.`Pr_no` AS `Pr_no`,`pr`.`Pr_date` AS `Pr_date`,`pr`.`Dept` AS `Dept`,`pr`.`Item` AS `Item`,`pr`.`Descr` AS `Descr`,`pr`.`Quantity` AS `Quantity`,`assign`.`DO` AS `DO` from (`pr` join `assign` on((`pr`.`Pr_no` = `assign`.`Pr_no`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`Pr_no`),
  ADD KEY `DO` (`DO`);

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
  ADD PRIMARY KEY (`Pr_no`,`T_id`),
  ADD KEY `T_id` (`T_id`);

--
-- Indexes for table `ext2`
--
ALTER TABLE `ext2`
  ADD PRIMARY KEY (`Pr_no`,`T_id`),
  ADD KEY `T_id` (`T_id`);

--
-- Indexes for table `pr`
--
ALTER TABLE `pr`
  ADD PRIMARY KEY (`Pr_no`),
  ADD KEY `Dept` (`Dept`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Status_id`);

--
-- Indexes for table `tender`
--
ALTER TABLE `tender`
  ADD PRIMARY KEY (`T_id`,`Pr_no`),
  ADD KEY `Pr_no` (`Status`),
  ADD KEY `Pr_no_2` (`Pr_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `Dept_id` (`Dept_id`,`Auth_id`),
  ADD KEY `Auth_id` (`Auth_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pr`
--
ALTER TABLE `pr`
  MODIFY `Pr_no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`DO`) REFERENCES `user` (`User_id`),
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`Pr_no`) REFERENCES `pr` (`Pr_no`);

--
-- Constraints for table `ext1`
--
ALTER TABLE `ext1`
  ADD CONSTRAINT `ext1_ibfk_1` FOREIGN KEY (`Pr_no`) REFERENCES `pr` (`Pr_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `ext1_ibfk_2` FOREIGN KEY (`T_id`) REFERENCES `tender` (`T_id`);

--
-- Constraints for table `ext2`
--
ALTER TABLE `ext2`
  ADD CONSTRAINT `ext2_ibfk_1` FOREIGN KEY (`Pr_no`) REFERENCES `pr` (`Pr_no`) ON DELETE CASCADE,
  ADD CONSTRAINT `ext2_ibfk_2` FOREIGN KEY (`T_id`) REFERENCES `tender` (`T_id`);

--
-- Constraints for table `pr`
--
ALTER TABLE `pr`
  ADD CONSTRAINT `pr_ibfk_1` FOREIGN KEY (`Dept`) REFERENCES `department` (`Dept_id`);

--
-- Constraints for table `tender`
--
ALTER TABLE `tender`
  ADD CONSTRAINT `tender_ibfk_2` FOREIGN KEY (`Status`) REFERENCES `status` (`Status_id`),
  ADD CONSTRAINT `tender_ibfk_3` FOREIGN KEY (`Pr_no`) REFERENCES `pr` (`Pr_no`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`Auth_id`) REFERENCES `authorisation` (`Auth_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
