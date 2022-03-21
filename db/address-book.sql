-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2022 at 11:00 AM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `address-book`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE IF NOT EXISTS `persons` (
`ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile` bigint NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Permanant_Address` varchar(250) NOT NULL,
  `Temporary_Address` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Persons';

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`ID`, `Name`, `Mobile`, `Email`, `Permanant_Address`, `Temporary_Address`) VALUES
(1, 'Lorem', 50123456, 'lorem@lorem.com', 'lorem ipsum', 'ipsum dolor');

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Last_Login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First_Name`, `Last_Name`, `Username`, `Password`, `Last_Login`) VALUES
(1, 'Super', 'Admin', 'admin', '1a1dc91c907325c69271ddf0c944bc72', '2022-03-21 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--

ALTER TABLE `persons` ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--

ALTER TABLE `users` ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--

ALTER TABLE `persons` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--

ALTER TABLE `users` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;