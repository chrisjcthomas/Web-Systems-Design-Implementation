-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2018 at 10:16 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testregister`
--
CREATE DATABASE IF NOT EXISTS `testregister` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testregister`;

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

DROP TABLE IF EXISTS `demo`;
CREATE TABLE IF NOT EXISTS `demo` (
  `IDNum` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `DOB` text NOT NULL,
  `Gender` text NOT NULL,
  `Marital_Status` text NOT NULL,
  `Email` text NOT NULL,
  `Bio` text NOT NULL,
  `ProfilePicture` text NOT NULL,
  PRIMARY KEY (`IDNum`),
  UNIQUE KEY `Email` (`IDNum`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`IDNum`, `First_Name`, `Last_Name`, `DOB`, `Gender`, `Marital_Status`, `Email`, `Bio`, `ProfilePicture`) VALUES
(1, 'Lushane', 'Jones', '1988-11-08', 'Male', 'Married', 'lushane.a.jones@gmail.com', 'I am a happily married Christian man.', 'uploads/Taikenzor.png'),
(2, 'Joe', 'Johnson', '1989-11-08', 'Male', 'Single', 'jj@live.com', 'Wild man!', 'uploads/Male.jpg'),
(12, 'Rushane', 'Jones', '1988-11-08', 'Male', 'Single', 'rushane.a.jones@gmail.com', 'Leave me alone...', 'uploads/IMG_20160503_135745.jpg'),
(5, 'David', 'Kingston', '1985-11-02', 'Male', 'Single', 'king.david@live.com', 'I go to wars, I slay Philistenes.', 'uploads/FBWords2017.jpg'),
(9, 'Chicken', 'Little', '1990-06-07', 'Male', 'Single', 'lil.chicken@rooster.com', 'The sky is falling!', 'uploads/chicken%20little.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
