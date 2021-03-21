-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 11:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(11) NOT NULL,
  `bnum` text NOT NULL,
  `source` text NOT NULL,
  `destination` text NOT NULL,
  `arrival` text NOT NULL,
  `fare` float NOT NULL,
  `seats` int(11) NOT NULL,
  `source_stat` int(11) NOT NULL,
  `destination_stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `bnum`, `source`, `destination`, `arrival`, `fare`, `seats`, `source_stat`, `destination_stat`) VALUES
(1, 'mh19ar6083', 'nagpur', 'amoda', '14:05', 250, 45, 1, 1),
(6, 'mh19ar6085', 'pune', 'nagpur', '21:45', 500, 210, 1, 1),
(7, 'mh19ar6086', 'Jalgaon', 'Kolhapur', '10:50', 250, 65, 1, 1),
(8, 'mh19ar6087', 'Jalgaon', 'bamnod', '21:78', 360, 100, 0, 1),
(9, 'mh19ar6088', 'pune', 'amoda', '25:30', 250, 45, 0, 0),
(10, 'mh19ar6080', 'Jalgaon', 'akola', '19:30', 250, 45, 0, 1),
(11, 'mh19ar6090', 'JALGAON', 'AMODA', '16:25', 150, 25, 0, 0),
(12, 'MH19AR2020', 'DHULE', 'MUMBAI', '05:20', 5000, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cbookings`
--

CREATE TABLE `cbookings` (
  `id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `csource` text NOT NULL,
  `cdestination` text NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `rseats` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `busid` int(11) NOT NULL,
  `bnum` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cbookings`
--

INSERT INTO `cbookings` (`id`, `fname`, `mname`, `lname`, `csource`, `cdestination`, `phone`, `email`, `gender`, `address`, `rseats`, `rdate`, `busid`, `bnum`) VALUES
(1, 'chg', 'vhgch', 'ghvhm', 'pune', 'amoda', 576657675, 'smfegade2799@gmail.com', 'Male', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 45, '1970-01-01', 0, ''),
(2, 'rg', 'rfg', 'fg', 'dgd', 'rdgd', 564656565, 'smfegade2799@gmail.com', 'Male', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 2, '1970-01-01', 0, ''),
(3, 'trc', 'rgc', 'rgc', 'rdttrc', 'r', 978678676, 'testuser@gmail.com', 'Male', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 45, '2020-03-12', 0, ''),
(4, 'Shreyas', 'Manoj', 'Fegade', 'JALGAON', 'AMODA', 9404341181, 'saloni@gmail.com', 'Male', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 2, '2020-04-03', 11, 'mh19ar6090'),
(5, 'Saloni', 'Sanjiv', 'Chaudhari', 'JALGAON', 'AMODA', 9404341181, 'sayali@gmail.com', 'Female', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 2, '2020-04-03', 11, 'mh19ar6090'),
(6, 'ddt', 'fth', 'fjyuh', 'JALGAON', 'AMODA', 766868787, 'testuser@gmail.com', 'Male', 'hgdjhfjf\r\nfwehbfkjwef\r\nefwklnfklwn', 5, '2020-04-03', 11, 'mh19ar6090'),
(7, 'ddt', 'fth', 'fjyuh', 'JALGAON', 'AMODA', 766868787, 'testuser@gmail.com', 'Male', 'hgdjhfjf\r\nfwehbfkjwef\r\nefwklnfklwn', 5, '2020-04-03', 11, 'mh19ar6090'),
(8, 'ddtefwf', 'ghjgjkuj', 'kljkl', 'JALGAON', 'AMODA', 89876876878, 'testuser@gmail.com', 'Male', 'hgdjhfjf\r\nfwehbfkjwef\r\nefwklnfklwn', 5, '2020-04-03', 11, 'mh19ar6090'),
(9, 'ddtefwf', 'ghjgjkuj', 'kljkl', 'JALGAON', 'AMODA', 89876876878, 'testuser@gmail.com', 'Male', 'hgdjhfjf\r\nfwehbfkjwef\r\nefwklnfklwn', 5, '2020-04-03', 11, 'mh19ar6090'),
(11, 'Mrudula', 'Arvind', 'Mahajan', 'JALGAON', 'AMODA', 9887535312, 'testuser@gmail.com', 'Female', 'plot no.16,Laxman nagar\r\ninfront of Bajrang Railway tunnel,Pimprala road,Jalgaon', 1, '2020-04-03', 11, 'mh19ar6090'),
(12, 'UJA', 'SANJIV', 'Chaudhari', 'DHULE', 'MUMBAI', 7588009848, 'uja@gmail.com', 'Male', 'at post amode', 5, '2020-04-05', 12, 'MH19AR2020'),
(14, 'ddt', 'hgh', 'jhj', 'DHULE', 'MUMBAI', 23456789, 'smf@gmail.com', 'Male', 'plot no.16,,,,425001', 1, '2020-04-05', 12, 'MH19AR2020'),
(15, 'Manisha', 'Sanjiv', 'Chaudhari', 'Jalgaon', 'akola', 9096471448, 'chaudharisanjiv28@gmail.com', 'Female', 'At post amod,dist-jalgoan', 5, '2020-04-09', 10, 'mh19ar6080'),
(16, 'sandhya', 'muralidhar', 'pawar', 'DHULE', 'MUMBAI', 9011404848, 'sandhya@gmaio.com', 'Female', 'at post parabhani', 2, '2020-04-06', 12, 'MH19AR2020'),
(17, 'abc', 'xyz', 'mnc', 'JALGAON', 'AMODA', 9854752156, 'salonisanjivchaudhari@gmail.com', 'Male', 'hvejshvfkjhvkjahfkjhfjkmhfhrb', 1, '2020-04-10', 11, 'mh19ar6090'),
(18, 'sayali', 'Sanjiv', 'chaudhari', 'JALGAON', 'AMODA', 234567889, 'sayalisanjivchaudhari@gmail.com', 'Female', 'mhjkhk', 5, '2020-04-08', 11, 'mh19ar6090'),
(19, 'Rohi', 'Ankush', 'Deshmukh', 'JALGAON', 'AMODA', 9404341181, 'smfegade2799@gmail.com', 'Female', 'Mehkar,Buldhana', 2, '2020-05-30', 11, 'mh19ar6090');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Shreyas Fegade', 'smfegade2799@gmail.com', 'Ticket Enquiry', 'So costly tickets'),
(7, 'Rohini', 'rohi@gmail.com', 'Ticket confirmation', 'Please send me ticket to my email');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `pass`) VALUES
(2, 'Saloni Chaudhari', 'salonisanjivchaudhari@gmail.com', '12345'),
(3, 'Shreyas Fegade', 'smfegade2799@gmail.com', '12345'),
(4, 'sayali', 'sayalisanjivchaudhari@gmail.com', 'sayali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbookings`
--
ALTER TABLE `cbookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cbookings`
--
ALTER TABLE `cbookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
