-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 06:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egames`
--
CREATE DATABASE IF NOT EXISTS `egames` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `egames`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `mdp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `login`, `mdp`) VALUES
(1, 'Admin123', '$2y$10$HfiRGGvdgSv24bPAYLN0b.oOwLd.4KCJa0wpWaeRmldD3zI5IAlGO'),
(11, 'a', '$2y$10$j5EhFfhdKls4HqaswdwNa.39PrO2AnbB6Q4EFR5MnTwG7bZHTERjq'),
(17, 'qwerrr', '$2y$10$rAGfVFCZgD4Do41nsfvkZO2PwQGnTYk6FtXpTPLQyXODIQr4Aobne'),
(19, 'aa', '$2y$10$iTGBaRJ13tRfOyiwdg80tudS3l8o47NizbQ/xwo147L3.Hfcq7tCi');

-- --------------------------------------------------------

--
-- Table structure for table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `fk_jeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `fk_jeu`) VALUES
(12, 'Schalke 04', 2),
(13, 'San Francisco Shock', 3),
(14, 'G2 Esports', 2),
(15, 'G2 Esports', 1),
(18, 'FaZe Clan', 2),
(19, 'Astralis', 2),
(22, 'Fnatic', 1),
(23, 'SK Gaming', 1),
(24, 'MAD Lions', 1),
(25, 'KEKW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

CREATE TABLE `jeux` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`) VALUES
(1, 'League of Legends'),
(2, 'Counter strike : Global Offensive'),
(3, 'Overwatch');

-- --------------------------------------------------------

--
-- Table structure for table `joueurs`
--

CREATE TABLE `joueurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `dateNaissance` date NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `fk_jeu` int(11) NOT NULL,
  `fk_equipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom`, `prenom`, `dateNaissance`, `age`, `email`, `pseudo`, `fk_jeu`, `fk_equipe`) VALUES
(30, 'Pirynskkkk', 'Norman', '1111-01-01', 910, 't@gmail.com', 'asd', 2, 12),
(31, 'Pirynskkkkl', 'Norman', '1111-01-01', 910, 'y@gmail.com', 'qwe', 2, 12),
(32, 'Pirynsiii', 'Norman', '1111-11-01', 909, 'u@gmail.com', 'zxc', 2, 12),
(33, 'Pirynsu', 'Norman', '1111-01-01', 910, 'i@gmail.com', '2wesad', 2, 12),
(34, 'Piryns', 'Norman', '1111-01-01', 910, 'o@gmail.com', 'sdsa', 2, 12),
(35, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.comh', 'qweeeee', 3, 13),
(36, 'Piryns', 'Norman', '1111-01-01', 910, 'xd@gmail.comw', 'seeeeeq', 3, 13),
(37, 'Piryns', 'Norman', '1111-11-01', 909, 'ad@gmail.com', 'eeeeeeq', 3, 13),
(38, 'Piryns', 'Norman', '1111-01-01', 910, 'normqeanpiryns@gmail.com', 'ssssse', 3, 13),
(39, 'Piryns', 'Norman', '1111-11-01', 909, 'normasenpiryns@gmail.com', 'sssssssddddd', 3, 13),
(40, 'Piryns', 'Norman', '1111-01-01', 910, 'normanddpiryns@gmail.com', 'ssssseqc', 2, 14),
(41, 'Piryns', 'Norman', '1111-01-01', 910, 'ddq@gmail.com', 'sssssssdq', 2, 14),
(42, 'Piryns', 'Norman', '1111-01-01', 910, 'eeq@gmail.com', 'sssssssc', 2, 14),
(43, 'Piryns', 'Norman', '1111-01-01', 910, 'qqee@gmail.com', 'cccccccqqwe', 2, 14),
(44, 'Piryns', 'Norman', '1111-01-01', 910, 'ssss@gmail.com', 'wwwwwwwwqeq', 2, 14),
(45, 'Jean-mark', 'Eeq', '1111-01-01', 910, 'x@xxx.com', 'tqtqtq', 1, NULL),
(47, 'Wsq', 'Seq', '1111-01-01', 910, 'eweww@abv.bg', 'ceeee', 3, NULL),
(48, 'Pirynqq', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.com', 'qwe', 2, NULL),
(49, 'Piryns', 'Norman', '1111-01-01', 910, 'normansssepiryns@gmail.com', 'qsdq23', 1, 15),
(50, 'Piryns', 'Norman', '1111-01-01', 910, 'eqeqwe@gmail.com', 'sq32', 1, 15),
(51, 'Piryns', 'Norman', '1111-01-01', 910, 'asea@asd.com', 'eqeqq23', 1, 15),
(52, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@sd.com', 'qeeeee2e', 1, 15),
(53, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@qm.com', 'qweeeeeq2', 1, 15),
(68, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpirsesyns@gmail.com', 'ghghgh5', 2, 18),
(69, 'Piryns', 'Norman', '1111-01-01', 910, 'normeeqanpiryns@gmail.com', 'h56h6h6', 2, 18),
(70, 'Piryns', 'Norman', '1111-02-02', 909, 'qssssssse@gmail.com', 'hdfdg4', 2, 18),
(71, 'Piryns', 'Norman', '1111-02-02', 909, 'eewghg@gmail.com', 'ghf4', 2, 18),
(72, 'Piryns', 'Norman', '1111-02-02', 909, 'h@gmghgail.com', 'dfgdgd3', 2, 18),
(73, 'Piryns', 'Norman', '1111-01-01', 910, 'qqqqqe2e2w@gmail.com', 'ssssseqcs', 2, 19),
(74, 'Piryns', 'Norman', '1111-01-01', 910, '2eq2eq@gmail.com', 'qqqqqqqqwewew', 2, 19),
(75, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmssail.com', 'ssssseqcqqqq', 2, 19),
(76, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@geqmail.com', 'qqqqqqqqqwewewe', 2, 19),
(77, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmaeeil.com', 'eeeeeeeeewewq', 2, 19),
(83, 'Aaaaaae', 'Seqwe', '1111-01-01', 910, 'eqw@ifosupwavre.be', 'toto223', 1, NULL),
(89, 'A', 'A', '1222-01-01', 799, 'c@c.com', 'qwe', 1, NULL),
(90, 'A', 'A', '1222-01-01', 799, 'c@c.coms', 'qwes', 2, NULL),
(91, 'Piryns', 'Norman', '1111-01-01', 910, 'w@gmaieql.com', 'fghg5', 1, 22),
(92, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@w.ceom', 'ftygj7', 1, 22),
(93, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@w.coeqm', '8oyuy8o8', 1, 22),
(94, 'Piryns', 'Norman', '1111-11-01', 909, 'normanpiryns@qe.com', 't7o7okf6', 1, 22),
(95, 'Piryns', 'Norman', '1111-03-02', 909, 'normanpiryns@eq.eecom', 'a3ttage', 1, 22),
(96, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.comce', 'g4gww4g', 1, 23),
(97, 'Piryns', 'Norman', '1111-11-01', 909, 'normanpiryns@gmail.coerm', 'j6e6rk', 1, 23),
(98, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.corrtm', '3taayr47', 1, 23),
(99, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.ctyom', 'di6e8', 1, 23),
(100, 'Piryns', 'Norman', '1111-11-01', 909, 'normanpiryns@gmabil.com', 'di6i6', 1, 23),
(101, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.cs', 'as4d5a', 1, 24),
(102, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.coem', 'q9w7e', 1, 24),
(103, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.ceom', 'g4h', 1, 24),
(104, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.crom', 'tjf56', 1, 24),
(105, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.cyom', 'dfg65f6d5g', 1, 24),
(106, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.cdddddddom', 'a5s4dsa54', 1, 25),
(107, 'Yu', 'Norman', '1111-01-01', 910, 'dfdfd@gmail.coeeeeeeeeem', 'ewr8w98e', 1, 25),
(108, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.ctttttttom', 'df1s', 1, 25),
(109, 'Piryns', 'Norman', '1111-11-01', 909, 'normanpiryns@gmail.cyyyyyyom', 's5d4s', 1, 25),
(110, 'Piryns', 'Norman', '1111-01-01', 910, 'normanpiryns@gmail.uuuuuucom', 'h4jh6', 1, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
