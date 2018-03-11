-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 08:23 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_img` varchar(50) NOT NULL,
  `book_cat` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_publisher` varchar(50) NOT NULL,
  `book_moredetails` varchar(50) NOT NULL,
  `book_price` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_img`, `book_cat`, `book_author`, `book_publisher`, `book_moredetails`, `book_price`) VALUES
(1, 'Building Java Programs', 'bjp2.jpg', 'cse', 'Stuart reges ', 'Pearson', '', '500'),
(2, 'Computer System Architecture', 'co.jpg', 'cse', 'M. Morris Mano', 'Pearson', '', '400'),
(3, 'The Design & Analysis of Algorithms', 'daa.jpg', 'cse', 'Anany Levitin', 'Pearson', '', '600'),
(4, 'Database Management Systems', 'DBMS.jpg', 'cse', 'Ramakrishnan', 'McGRAW-HILL', '', '350'),
(5, 'Digital Logic and Computer Design', 'dld.jpg', 'cse', 'M. Morris Mano', 'Pearson', '', '250'),
(6, 'DATA MINING', 'dm.jpg', 'cse', 'Jiawei Han | Jian Pei', 'Morgan Kaufmann', '', '345'),
(7, 'Data Structures using C and C++', 'ds.jpg', 'cse', 'Yedidyah Langsam', 'PHI', '', '350'),
(8, 'HTML Black Book', 'html-black.jpg', 'cse', 'Steven Holzner', 'dreamtech', '', '500'),
(9, 'CSS and HTML Web Design', 'html-css-book.jpg', 'cse', 'Craig Grannell', 'friendsoft', '', '700'),
(10, 'The Complete Reference Java', 'java.jpg', 'cse', 'Herbert Schildt', 'McGRAW HILL', '', '800');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `usr_email` varchar(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `book_quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `usr_email`, `book_id`, `book_quantity`) VALUES
(1, 'mbs.yaswanth@gmail.com', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(50) NOT NULL,
  `usr_email` varchar(50) NOT NULL,
  `usr_password` varchar(50) NOT NULL,
  `usr_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`usr_id`, `usr_name`, `usr_email`, `usr_password`, `usr_phone`) VALUES
(1, 'M B S Yaswanth', 'mbs.yaswanth@gmail.com', '1234', '9010331481'),
(3, 'samba', 'samba@gmail.com', '123', '9999989899');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
