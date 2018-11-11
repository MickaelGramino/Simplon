-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 06:59 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionordinateur`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `idetudiant` int(11) NOT NULL,
  `etudiantnom` varchar(45) DEFAULT NULL,
  `etudiantprenom` varchar(45) DEFAULT NULL,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`idetudiant`, `etudiantnom`, `etudiantprenom`, `disponible`) VALUES
(1, 'Deva', 'Kamil', 1),
(2, 'Arya', 'Karine', 0),
(3, 'Yuna', 'Karla', 0),
(4, 'Djeneba', 'Kenza', 0),
(5, 'Jihane', 'Khadija', 0),
(6, 'MÃ©lie', 'Kylian', 0),
(7, 'MaÃ¯lys', 'Ladji', 0),
(8, 'Patricia', 'Laetitia', 1),
(9, 'YaÃ«lle', 'Lancelot', 0),
(10, 'Mayar', 'Leandre', 0),
(11, 'Salima', 'Leane', 1),
(12, 'Marthe', 'LeÃ¯la', 0),
(13, 'Ombeline', 'Leo', 0),
(14, 'Assil', 'Leonore', 0),
(15, 'Celia', 'Leopoldine', 0),
(16, 'NÃ©lya', 'Lilou', 0),
(17, 'LeÃ¯na', 'LoÃ¯s', 0),
(18, 'Sanaa', 'Lola', 0),
(19, 'Lily-Rose', 'Lorenzo', 0),
(20, 'NaÃ¯a', 'Lorraine', 0),
(21, 'Alissa', 'Louise', 0),
(22, 'Ayana', 'Louison', 0),
(23, 'AurÃ©lie', 'Lucy', 0),
(24, 'Quitterie', 'Mael', 0),
(25, 'Dania', 'MaÃ«lle', 0),
(26, 'Emmie', 'Maeva', 0),
(27, 'Marta', 'MaÃ«va', 0),
(28, 'Milena', 'MaÃ¯a', 0),
(29, 'Lyla', 'MaÃ¯wenn', 0),
(30, 'Naelle', 'Malcolm', 0),
(31, 'Arwen', 'Malek', 0),
(32, 'Aissatou', 'Marianne', 0),
(33, 'LoÃ¯s', 'Marina', 0),
(34, 'Nadine', 'Marion', 0),
(35, 'Tasnime', 'Marius', 0),
(36, 'LÃ©ontine', 'Marko', 0),
(37, 'Rym', 'Maryam', 0),
(38, 'Gabriel', 'Mateo', 0),
(39, 'RaphaÃ«l', 'Mathieu', 0),
(40, 'Arthur', 'Mahault', 0),
(41, 'Joseph', 'AgnÃ¨s', 0),
(42, 'Augustin', 'Lyana', 0),
(43, 'Oscar', 'Maxime', 0),
(44, 'Noah', 'Joy', 0),
(45, 'Enzo', 'MeÃ¯ssa', 0),
(46, 'Aaron', 'Leyna', 0),
(47, 'Jean', 'Eulalie', 0),
(48, 'Maxence', 'Jennah', 0),
(49, 'CÃ´me', 'Assya', 0),
(50, 'Amir', 'Loane', 0),
(51, 'Gustave', 'Mayar', 0),
(52, 'Elias', 'Kelya', 0),
(53, 'Mamadou', 'AÃ¯ssata', 0),
(54, 'Daniel', 'Solveig', 0),
(55, 'Vadim', 'ClÃ©a', 0),
(56, 'Armand', 'Baya', 0),
(57, 'Matthieu', 'Safa', 0),
(58, 'Charlie', 'Haya', 0),
(59, 'LÃ©andre', 'Luce', 0),
(60, 'Anton', 'Gloria', 0),
(61, 'Yassine', 'Ã‰lÃ©na', 0),
(62, 'ArsÃ¨ne', 'Yousra', 0),
(63, 'Corentin', 'GrÃ¢ce', 0),
(64, 'Marin', 'Bella', 0),
(65, 'Max', 'Zeynab', 0),
(66, 'Emmanuel', 'Delphine', 0),
(67, 'Mathieu', 'Iliana', 0),
(68, 'Samy', 'Bonnie', 0),
(69, 'Anatole', 'LeÃ¯na', 0),
(70, 'Emile', 'Chayma', 0),
(71, 'Maximilien', 'Adame', 0),
(72, 'Ariel', 'AdÃ©lie', 0),
(73, 'AurÃ©lien', 'Lehna', 0),
(74, 'Matteo', 'Safia', 0),
(75, 'Djibril', 'Eya', 0),
(76, 'Guillaume', 'Eleanor', 0),
(77, 'Ilian', 'Gaia', 0),
(78, 'Dylan', 'Matilda', 0),
(79, 'Owen', 'Orlane', 0),
(80, 'Mohammed', 'Sabrina', 0),
(81, 'Dimitri', 'Ludivine', 0),
(82, 'Abdallah', 'BÃ©ryl', 0),
(83, 'Walid', 'Amelia', 0),
(84, 'Ferdinand', 'Madeline', 0),
(85, 'RafaÃ«l', 'Loubna', 0),
(86, 'Florian', 'Ranya', 0),
(87, 'Erwan', 'Ayline', 0),
(88, 'AurÃ¨le', 'Anita', 0),
(89, 'Bastien', 'CloÃ©', 0),
(90, 'Iyed', 'Roxanne', 0),
(91, 'Elio', 'Linoy', 0),
(92, 'Jayden', 'Daniella', 0),
(93, 'KÃ©vin', 'Arwen', 0),
(94, 'RÃ©mi', 'ElÃ©anore', 0),
(95, 'Elijah', 'Kim', 0),
(96, 'Imrane', 'SÃ©rine', 0),
(97, 'Boubacar', 'Israa', 0),
(98, 'Melvin', 'Malek', 0),
(99, 'Kenzo', 'MaÃ«va', 0),
(100, 'Fares', 'Anouck', 0),
(101, 'Ewan', 'Noemi', 0),
(102, 'Farah', 'Kadiatou', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordinateur`
--

CREATE TABLE `ordinateur` (
  `idordinateur` int(11) NOT NULL,
  `Identifiantordinateur` varchar(7) DEFAULT NULL,
  `Disponible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordinateur`
--

INSERT INTO `ordinateur` (`idordinateur`, `Identifiantordinateur`, `Disponible`) VALUES
(1, 'P60', 0),
(2, 'P61', 0),
(3, 'P62', 1),
(4, 'P63', 0),
(5, 'P64', 0),
(6, 'P65', 0),
(7, 'P66', 1),
(8, 'P67', 0),
(9, 'P68', 0),
(10, 'P69', 0),
(11, 'P70', 0),
(12, 'P71', 1),
(13, 'P72', 0),
(14, 'P73', 0),
(15, 'P74', 0),
(16, 'P75', 0),
(17, 'P76', 0),
(18, 'P77', 0),
(19, 'P78', 0),
(20, 'P79', 0),
(21, 'P80', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `Reservation_etudiant_id` int(11) NOT NULL,
  `Reservation_etudiant_nom` varchar(45) DEFAULT NULL,
  `Reservation_etudiant_prenom` varchar(45) DEFAULT NULL,
  `Reservation_horaire` varchar(45) DEFAULT NULL,
  `Reservation_ordinateur_id` int(11) NOT NULL,
  `Reservationcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `Reservation_etudiant_id`, `Reservation_etudiant_nom`, `Reservation_etudiant_prenom`, `Reservation_horaire`, `Reservation_ordinateur_id`, `Reservationcol`) VALUES
(1, 8, 'Patricia', 'Laetitia', '12:00', 7, 'P66');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idetudiant`);

--
-- Indexes for table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD PRIMARY KEY (`idordinateur`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idetudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `ordinateur`
--
ALTER TABLE `ordinateur`
  MODIFY `idordinateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
