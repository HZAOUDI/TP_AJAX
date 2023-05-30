-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 08:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petition`
--

-- --------------------------------------------------------

--
-- Table structure for table `petitions`
--

CREATE TABLE `petitions` (
  `IDP` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `DatePublic` timestamp NOT NULL DEFAULT current_timestamp(),
  `Titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petitions`
--

INSERT INTO `petitions` (`IDP`, `Nom`, `Prenom`, `Description`, `DatePublic`, `Titre`) VALUES
(1, 'zaoudi', 'haya', 'Demande au gouvernement d\'instaurer un salaire min décent pour tous les travailleurs', '2023-05-03 00:00:00', 'Pour un salaire minimum décent'),
(2, 'User2_Nom', 'User2_Prenom', 'Demande à gouvernement pour protéger notre planète et réduire les émissions et encourager la transition vers des énergies renouvelables.', '2022-12-06 23:00:00', ' Protégeons notre planète '),
(5, 'Mariam', 'Ansari', 'Demande une action immédiate pour mettre fin à la la violence contre les femmes.', '2023-05-02 02:09:11', ' La violence contre les femmes'),
(6, 'Ahmed', 'Ahmadi', 'Demande l\'arrêt de la discrimination raciale dans le processus d\'embauche. ', '2023-05-02 02:15:11', 'Discrimination raciale dans l\'embauche'),
(7, 'Sanaa', 'Bakkali', ' Demande une éducation gratuite pour tous et Nous exhortons les gouvernements à investir dans l\'éducation pour tous les niveaux', '2023-05-02 02:24:02', ' éducation gratuite pour tous'),
(9, 'User9_Nom', 'User9_Prenom', 'Description 9', '2023-05-03 00:23:32', 'Title9');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `IDS` int(11) NOT NULL,
  `IDP` int(11) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT current_timestamp(),
  `Heure` time(6) DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`IDS`, `IDP`, `Nom`, `Prenom`, `Pays`, `Date`, `Heure`) VALUES
(8, 1, 'El Alaoui', 'Yassine', 'Maroc', '2023-05-03', '05:48:52.000000'),
(9, 1, 'Bennani', 'Fatima Zahra', 'Maroc', '2023-05-03', '05:49:11.000000'),
(10, 2, 'Kabbaj', 'Abdelilah ', 'Maroc', '2023-05-03', '05:49:29.000000'),
(11, 1, 'El Haddad', 'Mohamed Amine', 'Tunisie', '2023-05-03', '05:49:51.000000'),
(12, 7, 'Oubella', 'Aicha ', 'Maroc', '2023-05-03', '05:50:07.000000'),
(13, 5, 'Bensaad', 'Samira ', 'Algerie', '2023-05-03', '05:50:38.000000'),
(26, 7, 'El Mouden', 'Nabil ', 'Maroc', '2023-05-03', '06:50:42.000000'),
(27, 2, 'Bouziane', 'Salma ', 'Tunisie', '2023-05-03', '06:51:11.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `petitions`
--
ALTER TABLE `petitions`
  ADD PRIMARY KEY (`IDP`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`IDS`),
  ADD KEY `signatures_ibfk_1` (`IDP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petitions`
--
ALTER TABLE `petitions`
  MODIFY `IDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `IDS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_ibfk_1` FOREIGN KEY (`IDP`) REFERENCES `petitions` (`IDP`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
