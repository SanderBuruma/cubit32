-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2018 at 11:34 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ultramarkt`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertentie`
--

CREATE TABLE `advertentie` (
  `advertentieID` int(10) NOT NULL,
  `categorieID` int(10) NOT NULL,
  `subcategorieID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `prijs` int(10) NOT NULL,
  `beschrijving` varchar(5000) NOT NULL,
  `datumplaatsing` date NOT NULL,
  `tijdplaatsing` time(6) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `image1` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertentie`
--

INSERT INTO `advertentie` (`advertentieID`, `categorieID`, `subcategorieID`, `userID`, `prijs`, `beschrijving`, `datumplaatsing`, `tijdplaatsing`, `titel`, `image1`) VALUES
(4, 5, 67, 15, 5, 'met ventilatiegaatjes zodat er geen luchtdruk in de weg komt en ook niet zo hard.', '2018-10-25', '20:48:43.000000', 'pakslaagplankje 500 gram', 'user-plus-solid.svg'),
(5, 5, 67, 15, 5, 'met ventilatiegaatjes zodat er geen luchtdruk in de weg komt en ook niet zo hard.', '2018-10-25', '20:52:56.000000', 'pakslaagplankje 500 gram', 'user-plus-solid.svg'),
(6, 5, 67, 15, 5, 'met ventilatiegaatjes zodat er geen luchtdruk in de weg komt en ook niet zo hard.', '2018-10-25', '20:53:29.000000', 'pakslaagplankje 500 gram', 'user-plus-solid.svg'),
(7, 5, 67, 15, 5, 'met ventilatiegaatjes zodat er geen luchtdruk in de weg komt en ook niet zo hard.', '2018-10-25', '20:54:37.000000', 'pakslaagplankje 500 gram', 'user-plus-solid.svg'),
(8, 5, 67, 15, 5, 'met ventilatiegaatjes zodat er geen luchtdruk in de weg komt en ook niet zo hard.', '2018-10-25', '20:56:21.000000', 'pakslaagplankje 500 gram', 'user-plus-solid.svg'),
(9, 9, 129, 15, 50, 'test', '2018-10-25', '21:04:30.000000', 'test', ''),
(10, 3, 32, 15, 5, 'sdf', '2018-10-25', '23:29:04.000000', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `categorieen`
--

CREATE TABLE `categorieen` (
  `categorieID` int(10) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorieen`
--

INSERT INTO `categorieen` (`categorieID`, `naam`) VALUES
(1, 'Boeken'),
(2, 'Autos'),
(3, 'Kunst & Antiek'),
(4, 'Computers & Laptops'),
(5, 'Baby & Kind'),
(6, 'Kleren, Sieraden & Mode'),
(7, 'Sport, Outdoor & Fietsen'),
(8, 'Kantoor'),
(9, 'Drank'),
(10, 'Wonen & Huishouden'),
(11, 'Tuin & Klussen');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorieen`
--

CREATE TABLE `subcategorieen` (
  `subcategorieID` int(10) NOT NULL,
  `categorieID` int(10) NOT NULL,
  `naam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorieen`
--

INSERT INTO `subcategorieen` (`subcategorieID`, `categorieID`, `naam`) VALUES
(1, 1, 'Roman'),
(2, 1, 'Geschiedenis'),
(3, 1, 'Encylopedie'),
(4, 1, 'Kaarten'),
(5, 1, 'Theologie'),
(6, 1, 'Cultuur'),
(7, 1, 'Nederlands'),
(8, 1, 'Engels'),
(9, 1, 'Koken'),
(10, 1, 'Fantasie'),
(11, 1, 'Kinder'),
(12, 1, 'Biologie'),
(13, 1, 'Economie'),
(14, 1, 'Scheikunde'),
(15, 1, 'Sport'),
(16, 1, 'Voetbal'),
(17, 1, 'Psychologie'),
(18, 1, 'Mysticisme'),
(19, 1, 'Astronomie'),
(20, 1, 'Cosmologie'),
(21, 1, 'Aardkunde'),
(22, 1, 'Bouwkunde'),
(23, 1, 'Sociologie'),
(24, 2, 'Elektrisch'),
(25, 2, 'Benzine'),
(26, 2, 'Diesel'),
(27, 2, 'LPG'),
(28, 2, 'Personenauto'),
(29, 2, 'Vrachtwagen'),
(30, 2, 'Bromauto'),
(31, 3, 'Standbeeld <1m'),
(32, 3, 'Standbeeld >1m'),
(33, 3, 'Kandelaar'),
(34, 3, 'Schilderei'),
(35, 3, 'Fontein'),
(36, 3, 'Meubels'),
(37, 3, 'Eetgerei'),
(38, 3, 'Sieraden'),
(39, 3, 'Portret'),
(40, 3, 'Reparatie'),
(41, 4, 'Desktop'),
(42, 4, 'Monitoren'),
(43, 4, 'PC Muis'),
(44, 4, 'Tassen & Hoezen'),
(45, 4, 'Printers'),
(46, 4, 'Inkt'),
(47, 4, 'Smartphones'),
(48, 4, 'Tablets'),
(49, 4, 'E-Readers'),
(50, 4, 'Navigatiesysteem'),
(51, 4, 'Fotocameras'),
(52, 4, 'Dataopslag'),
(53, 4, 'Netwerk & Internet'),
(54, 4, 'Smart Home'),
(55, 5, 'Luiers'),
(56, 5, 'Zwangerschapskleding'),
(57, 5, 'Jongensschoenen'),
(58, 5, 'Meisjesschoenen'),
(59, 5, 'Babyschoenen'),
(60, 5, 'Babyboxen'),
(61, 5, 'Veiligheid'),
(62, 5, 'Babykamer'),
(63, 5, 'Autostoeltjes'),
(64, 5, 'Fietsstoeltjes'),
(65, 5, 'Buggys'),
(66, 5, 'Draagzakken'),
(67, 5, 'Pakslaagplankjes'),
(68, 6, 'Broeken'),
(69, 6, 'Jurken'),
(70, 6, 'Onderbroeken'),
(71, 6, 'Sokken'),
(72, 6, 'Kortebroek'),
(73, 6, 'Zwembroek'),
(74, 6, 'Handschoenen'),
(75, 6, 'Shirt'),
(76, 6, 'Pak'),
(77, 6, 'Formeel'),
(78, 6, 'Informeel'),
(79, 6, 'Tassen'),
(80, 6, 'Portemonnees'),
(81, 6, 'Nachtkleding'),
(82, 6, 'Sieraden'),
(83, 6, 'Horloges'),
(84, 6, 'Zonnebrillen'),
(85, 7, 'Sport'),
(86, 7, 'Yoga'),
(87, 7, 'Fitnes'),
(88, 7, 'Hardlopen'),
(89, 7, 'Voetbal'),
(90, 7, 'Wintersport'),
(91, 7, 'Kamperen'),
(92, 7, 'Wandelschoenen'),
(93, 7, 'Barefoot Schoenen'),
(94, 7, 'Regenbescherming'),
(95, 7, 'Complete Fietsen'),
(96, 7, 'Fietsaccessoires'),
(97, 7, 'Ligfietsen'),
(98, 7, 'Eenwielers'),
(99, 7, 'Driewielers'),
(100, 7, 'Koffers'),
(101, 7, 'Tassen'),
(102, 7, 'Rugzakken'),
(103, 8, 'Schoolagenda'),
(104, 8, 'Rekenmachines'),
(105, 8, 'Rugzakken'),
(106, 8, 'Schrijfwaren'),
(107, 8, 'Etuis'),
(108, 8, 'Schriften'),
(109, 8, 'Collegeblokken'),
(110, 8, 'Mappen'),
(111, 8, 'Notitieboeken'),
(112, 8, 'Markeerstiften'),
(113, 8, 'Kafpapier'),
(114, 8, 'Printerpapier'),
(115, 8, 'Bureau Accessoires'),
(116, 8, 'Whiteboards'),
(117, 8, 'Prikborden'),
(118, 8, 'Archiveren'),
(119, 8, 'Organiseren'),
(120, 8, 'Geldverwerking'),
(121, 8, 'Bureaustoelen'),
(122, 8, 'Bureaus'),
(123, 8, 'Agenda'),
(124, 8, 'Planners'),
(125, 8, 'Kalenders'),
(126, 8, 'Verjaardagkalenders'),
(127, 8, 'Vriendenboeken'),
(128, 8, 'Reisdagboeken'),
(129, 9, 'Rode Wijn'),
(130, 9, 'Witte Wijn'),
(131, 9, 'Rose'),
(132, 9, 'Dessertwijn'),
(133, 9, 'Port'),
(134, 9, 'Sherry'),
(135, 9, 'Alcoholvrij'),
(136, 9, 'Champagne'),
(137, 9, 'Prosecco'),
(138, 9, 'Cava'),
(139, 9, 'Lambrusco'),
(140, 9, 'Speciaalbier'),
(141, 9, 'Alcoholvrij'),
(142, 9, 'Bierpaketten'),
(143, 9, 'Whisky'),
(144, 9, 'Gin'),
(145, 9, 'Likeur'),
(146, 9, 'Cognac'),
(147, 9, 'Wodka'),
(148, 9, 'Rum'),
(149, 9, 'Jenever'),
(150, 10, 'Woonaccessoires'),
(151, 10, 'Verlichting'),
(152, 10, 'Banken'),
(153, 10, 'Stoelen'),
(154, 10, 'Tafels'),
(155, 10, 'Kasten'),
(156, 10, 'Bedden'),
(157, 10, 'Matrassen'),
(158, 10, 'Beddengoed'),
(159, 10, 'Badtextiel'),
(160, 10, 'Vloerkleden'),
(161, 10, 'Raamdecoratie'),
(162, 10, 'Babykamer'),
(163, 10, 'Kinderkamer'),
(164, 10, 'Pannen'),
(165, 10, 'Barbecues'),
(166, 10, 'Servies'),
(167, 10, 'Kookgerei'),
(168, 10, 'Glazen'),
(169, 10, 'Bestek'),
(170, 10, 'Koffie'),
(171, 10, 'Koffiemachines'),
(172, 10, 'Keukenmachines'),
(173, 10, 'Koelkasten'),
(174, 10, 'Magnetrons'),
(175, 10, 'Huishoudmiddelen'),
(176, 10, 'Prullenbakken'),
(177, 10, 'Droogmolens'),
(178, 10, 'Opbergen'),
(179, 10, 'Schoonmaken'),
(180, 10, 'Strijken'),
(181, 10, 'Voedselopslag'),
(182, 10, 'Stofzuigers'),
(183, 10, 'Wasdrogers'),
(184, 10, 'Wasmachines'),
(185, 11, 'Kerst'),
(186, 11, 'Tuin'),
(187, 11, 'Tuingereedschap'),
(188, 11, 'Buitenverlichting'),
(189, 11, 'Tuinmeubels'),
(190, 11, 'Terrasverwarmers'),
(191, 11, 'Tuininrichting'),
(192, 11, 'Planten'),
(193, 11, 'Insecten & Ongedierte'),
(194, 11, 'Tuinaanleg'),
(195, 11, 'Elektrisch Gereedschap'),
(196, 11, 'Handgereedschap'),
(197, 11, 'Badkamer & Sanitair'),
(198, 11, 'Centrale Verwarming'),
(199, 11, 'Verf'),
(200, 11, 'Keuken'),
(201, 11, 'Elektra'),
(202, 11, 'Opbergen'),
(203, 11, 'Behang'),
(204, 11, 'Bouwmaterialen'),
(205, 11, 'Werkkleding'),
(206, 11, 'Ijzerwaren'),
(207, 11, 'Deuren & Ramen'),
(208, 11, 'Inbraakbeveiliging'),
(209, 11, 'Brandbeveiliging'),
(210, 11, 'Honden'),
(211, 11, 'Katten'),
(212, 11, 'Knaagdieren'),
(213, 11, 'Dier'),
(214, 11, 'Konijnen'),
(215, 11, 'Vissen'),
(216, 11, 'Paard'),
(217, 11, 'Kippen'),
(218, 11, 'Reptielen'),
(219, 11, 'Vogels');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwordSalt` varchar(16) NOT NULL,
  `passwordMD5` varchar(100) NOT NULL,
  `sessionID` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `passwordSalt`, `passwordMD5`, `sessionID`) VALUES
(15, 'test12', 'test12@gmail.com', 'zCguDrcnT5hfxvPW', '6c22ddeb325da80e8a30c65e49f0bf10', 'MXKvtboRxSLPYGAU68Y4yVKxGgwZiVpnBaJbVSVb0YDeAsu6bXYut0Yh8p4M'),
(16, 'test13', 'test13@gmail.com', 'H4UiVyKKGZwwkTOE', '837858786046ebfa76905e7d25b45d43', '1FB0Rh6tVfEDAaE0BQz7FwgcCfRoJkSVqrvwzvLgkjLFcmdWpkYy9I09KfTs'),
(17, 'test14', 'test14@gmail.com', '8JoCqU0oMVjIKPqZ', '4542acbd26dfa30a9f5755ab57a99655', 'PRtnfSxd2CdjZAT1twTjGPWyBtxXP3VDAITAhaEP0hdJi1X4WInod2NzKWBQ'),
(18, 'test15', 'test15@gmail.com', 'Gxlyhnsf4QxDsF8A', 'f28605fa5fa409f8ed2ba4108edf7eec', 'Pt5AFR3sZomhNxTDhmBvQSZ3snRhTlTw5vy2gcSxOV48w5uiOXJXpv1OV956'),
(19, 'test16', 'test16@gmail.com', 'nmWZ759oaVhXniqq', 'f6fb5fe71a238c9875be89fc7b9d25b2', 'McTec4CSVLGHgHqQfpu4LV7WNiy4lUKeUYgv5qiUk1CB8eWJf5ZeZDtFSAVq'),
(20, 'test17', 'test@gmail.com', 'ONZFcmkNw6F3sJRl', 'ddef52359d61559f1f6ce721ce2a9807', 'AUNWmS2pfy4o55PQwJOZeyWUxokkKrPFfooNbpj77HIWc5dftphnf1rxUA2z'),
(21, 'test18', 'test@test.nl', 'aWcLFjxbNXQ0F6MZ', 'c6bd5555180540da1e8c8706376b490d', 'Sjmjmr2EB9VBEZpAkhzMTDK71qJwsNyZgJ6C56tPgSNOyBoYVHGtGi7kT2EH'),
(22, 'test20', 'test20@gmail.com', 'XykYg6SZ4KUZidEf', '5d7b000fd54cdd6f41a407ce08883af8', 'zqfVPLYjeVBXGYZ5S9VEmkzcgihvUwMN1Wh7rpu7U4aU4a3grCVhRS1xYXMk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertentie`
--
ALTER TABLE `advertentie`
  ADD PRIMARY KEY (`advertentieID`),
  ADD KEY `categorieID` (`categorieID`),
  ADD KEY `subcategorieID` (`subcategorieID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `categorieen`
--
ALTER TABLE `categorieen`
  ADD PRIMARY KEY (`categorieID`);

--
-- Indexes for table `subcategorieen`
--
ALTER TABLE `subcategorieen`
  ADD PRIMARY KEY (`subcategorieID`),
  ADD KEY `categorieID` (`categorieID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertentie`
--
ALTER TABLE `advertentie`
  MODIFY `advertentieID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categorieen`
--
ALTER TABLE `categorieen`
  MODIFY `categorieID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subcategorieen`
--
ALTER TABLE `subcategorieen`
  MODIFY `subcategorieID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertentie`
--
ALTER TABLE `advertentie`
  ADD CONSTRAINT `advertentie_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorieen` (`categorieID`),
  ADD CONSTRAINT `advertentie_ibfk_2` FOREIGN KEY (`subcategorieID`) REFERENCES `subcategorieen` (`subcategorieID`),
  ADD CONSTRAINT `advertentie_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `subcategorieen`
--
ALTER TABLE `subcategorieen`
  ADD CONSTRAINT `subcategorieen_ibfk_1` FOREIGN KEY (`categorieID`) REFERENCES `categorieen` (`categorieID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
