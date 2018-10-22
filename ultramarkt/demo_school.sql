-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2018 at 04:48 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `docenten`
--

CREATE TABLE `docenten` (
  `docentID` int(10) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `leeftijd` int(10) NOT NULL,
  `vakken` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL,
  `stad` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klassen`
--

CREATE TABLE `klassen` (
  `klasID` int(10) NOT NULL,
  `niveauID` int(10) NOT NULL,
  `schooljaar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klassen`
--

INSERT INTO `klassen` (`klasID`, `niveauID`, `schooljaar`) VALUES
(1, 1, 4),
(2, 4, 4),
(3, 4, 4),
(4, 1, 4),
(5, 3, 4),
(6, 3, 4),
(7, 3, 4),
(8, 2, 4),
(9, 4, 4),
(10, 4, 3),
(11, 3, 3),
(12, 3, 3),
(13, 1, 3),
(14, 1, 3),
(15, 3, 3),
(16, 3, 3),
(17, 3, 3),
(18, 4, 3),
(19, 1, 3),
(20, 1, 2),
(21, 4, 2),
(22, 2, 2),
(23, 4, 2),
(24, 3, 2),
(25, 2, 2),
(26, 4, 2),
(27, 4, 2),
(28, 3, 2),
(29, 2, 2),
(30, 3, 1),
(31, 1, 1),
(32, 3, 1),
(33, 1, 1),
(34, 4, 1),
(35, 2, 1),
(36, 3, 1),
(37, 1, 1),
(38, 2, 1),
(39, 3, 1),
(40, 1, 1),
(41, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lesblokken`
--

CREATE TABLE `lesblokken` (
  `lesblokID` int(10) NOT NULL,
  `tijd` time NOT NULL,
  `dagvdweek` int(11) NOT NULL,
  `docentID` int(11) NOT NULL,
  `vakID` int(11) NOT NULL,
  `klasID` int(11) NOT NULL,
  `minuten` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `niveaus`
--

CREATE TABLE `niveaus` (
  `niveauID` int(10) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `niveauvakkenID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveaus`
--

INSERT INTO `niveaus` (`niveauID`, `naam`, `niveauvakkenID`) VALUES
(1, 'mbo', 1),
(2, 'hbo', 2),
(3, 'vwo', 3),
(4, 'vmbo', 4);

-- --------------------------------------------------------

--
-- Table structure for table `niveauvakken`
--

CREATE TABLE `niveauvakken` (
  `niveauvakkenID` int(10) NOT NULL,
  `vakID` int(10) NOT NULL,
  `notities` varchar(50) NOT NULL,
  `niveauID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveauvakken`
--

INSERT INTO `niveauvakken` (`niveauvakkenID`, `vakID`, `notities`, `niveauID`) VALUES
(1, 1, '', 1),
(2, 3, '', 1),
(3, 4, '', 1),
(4, 5, '', 1),
(5, 6, '', 1),
(6, 7, '', 1),
(7, 10, '', 1),
(8, 11, '', 1),
(9, 12, '', 1),
(10, 1, '', 2),
(11, 3, '', 2),
(12, 4, '', 2),
(13, 5, '', 2),
(14, 6, '', 2),
(15, 8, '', 2),
(16, 9, '', 2),
(17, 10, '', 2),
(18, 11, '', 2),
(19, 12, '', 2),
(20, 1, '', 3),
(21, 3, '', 3),
(22, 4, '', 3),
(23, 5, '', 3),
(24, 6, '', 3),
(25, 8, '', 3),
(26, 9, '', 3),
(27, 10, '', 3),
(28, 11, '', 3),
(29, 12, '', 3),
(30, 13, '', 3),
(31, 14, '', 3),
(32, 1, '', 4),
(33, 3, '', 4),
(34, 4, '', 4),
(35, 5, '', 4),
(36, 6, '', 4),
(37, 7, '', 4),
(38, 10, '', 4),
(39, 11, '', 4),
(40, 12, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

CREATE TABLE `studenten` (
  `studentID` int(10) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `leeftijd` int(10) NOT NULL,
  `geslacht` varchar(1) NOT NULL,
  `notities` longtext NOT NULL,
  `klasID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vakken`
--

CREATE TABLE `vakken` (
  `vakID` int(10) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `notities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vakken`
--

INSERT INTO `vakken` (`vakID`, `naam`, `notities`) VALUES
(1, 'engels', ''),
(3, 'nederlands', ''),
(4, 'biologie', ''),
(5, 'scheikunde', ''),
(6, 'latijns', ''),
(7, 'religie', ''),
(8, 'duits', ''),
(9, 'frans', ''),
(10, 'wiskunde', ''),
(11, 'lichamelijkeopvoeding', ''),
(12, 'natuurkunde', ''),
(13, 'informatica', ''),
(14, 'economie', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `docenten`
--
ALTER TABLE `docenten`
  ADD PRIMARY KEY (`docentID`);

--
-- Indexes for table `klassen`
--
ALTER TABLE `klassen`
  ADD PRIMARY KEY (`klasID`),
  ADD KEY `niveauID` (`niveauID`);

--
-- Indexes for table `lesblokken`
--
ALTER TABLE `lesblokken`
  ADD PRIMARY KEY (`lesblokID`),
  ADD KEY `docentID` (`docentID`),
  ADD KEY `vakID` (`vakID`),
  ADD KEY `klasID` (`klasID`);

--
-- Indexes for table `niveaus`
--
ALTER TABLE `niveaus`
  ADD PRIMARY KEY (`niveauID`),
  ADD KEY `niveauvakkenID` (`niveauvakkenID`);

--
-- Indexes for table `niveauvakken`
--
ALTER TABLE `niveauvakken`
  ADD PRIMARY KEY (`niveauvakkenID`),
  ADD KEY `vakID` (`vakID`),
  ADD KEY `niveauID` (`niveauID`);

--
-- Indexes for table `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `klasID` (`klasID`);

--
-- Indexes for table `vakken`
--
ALTER TABLE `vakken`
  ADD PRIMARY KEY (`vakID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `docenten`
--
ALTER TABLE `docenten`
  MODIFY `docentID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `klassen`
--
ALTER TABLE `klassen`
  MODIFY `klasID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `lesblokken`
--
ALTER TABLE `lesblokken`
  MODIFY `lesblokID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `niveaus`
--
ALTER TABLE `niveaus`
  MODIFY `niveauID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `niveauvakken`
--
ALTER TABLE `niveauvakken`
  MODIFY `niveauvakkenID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `studenten`
--
ALTER TABLE `studenten`
  MODIFY `studentID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vakken`
--
ALTER TABLE `vakken`
  MODIFY `vakID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `klassen`
--
ALTER TABLE `klassen`
  ADD CONSTRAINT `klassen_ibfk_1` FOREIGN KEY (`niveauID`) REFERENCES `niveaus` (`niveauID`);

--
-- Constraints for table `lesblokken`
--
ALTER TABLE `lesblokken`
  ADD CONSTRAINT `lesblokken_ibfk_1` FOREIGN KEY (`docentID`) REFERENCES `docenten` (`docentID`),
  ADD CONSTRAINT `lesblokken_ibfk_2` FOREIGN KEY (`vakID`) REFERENCES `vakken` (`vakID`),
  ADD CONSTRAINT `lesblokken_ibfk_3` FOREIGN KEY (`klasID`) REFERENCES `klassen` (`klasID`);

--
-- Constraints for table `niveaus`
--
ALTER TABLE `niveaus`
  ADD CONSTRAINT `niveaus_ibfk_1` FOREIGN KEY (`niveauvakkenID`) REFERENCES `niveauvakken` (`niveauvakkenID`);

--
-- Constraints for table `niveauvakken`
--
ALTER TABLE `niveauvakken`
  ADD CONSTRAINT `niveauvakken_ibfk_1` FOREIGN KEY (`vakID`) REFERENCES `vakken` (`vakID`),
  ADD CONSTRAINT `niveauvakken_ibfk_2` FOREIGN KEY (`niveauID`) REFERENCES `niveaus` (`niveauID`);

--
-- Constraints for table `studenten`
--
ALTER TABLE `studenten`
  ADD CONSTRAINT `studenten_ibfk_1` FOREIGN KEY (`klasID`) REFERENCES `klassen` (`klasID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
