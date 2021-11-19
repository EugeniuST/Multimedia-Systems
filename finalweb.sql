-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 02:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonare_tabel`
--

CREATE TABLE `abonare_tabel` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonare_tabel`
--

INSERT INTO `abonare_tabel` (`id`, `full_name`, `email`) VALUES
(1, 'saljdlsa andsl', 'sadsasdadsa'),
(2, 'sadsa', 'sad');

-- --------------------------------------------------------

--
-- Table structure for table `agenti`
--

CREATE TABLE `agenti` (
  `id` int(11) NOT NULL,
  `nume` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenti`
--

INSERT INTO `agenti` (`id`, `nume`, `telefon`, `email`) VALUES
(1, 'Chisca Ion', '09377711441', 'ionmacaron@gmail.com'),
(2, 'Stoica Eugen', '0997266123', 'eugen1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `proprietati`
--

CREATE TABLE `proprietati` (
  `id` int(11) NOT NULL,
  `id_agent` int(11) NOT NULL,
  `titlu` varchar(255) DEFAULT NULL,
  `pret` int(20) DEFAULT NULL,
  `camere` int(11) DEFAULT NULL,
  `suprafata` int(11) DEFAULT NULL,
  `anul` varchar(4) DEFAULT NULL,
  `tip_achizitie` varchar(255) DEFAULT NULL,
  `tip_imobil` varchar(255) DEFAULT NULL,
  `oras` varchar(255) DEFAULT NULL,
  `descriere` varchar(500) DEFAULT NULL,
  `facilitati` varchar(2000) NOT NULL,
  `imagine_1` varchar(255) DEFAULT NULL,
  `imagine_2` varchar(255) DEFAULT NULL,
  `imagine_3` varchar(255) DEFAULT NULL,
  `imagine_4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proprietati`
--

INSERT INTO `proprietati` (`id`, `id_agent`, `titlu`, `pret`, `camere`, `suprafata`, `anul`, `tip_achizitie`, `tip_imobil`, `oras`, `descriere`, `facilitati`, `imagine_1`, `imagine_2`, `imagine_3`, `imagine_4`) VALUES
(1, 1, 'Telecentru, DUMBRAVEI', 1200, 4, 1300, '2019', 'Arendeaza', 'Casa', 'Sibiu', 'Se vinde apartament, în complexul locativ DUMRAVA RESIDENCE, amplasat pe str. Matei Basarab.                         Suprafața totală 1300 m.p. Compartimentare: 4 camere, bucătărie comasat cu living, dressing, bloc sanitar.        ', 'Incalzire autonoma, Mobila, Teren de joaca, Supermarket, Frigider, Bloc nou, Bucatarie, Geamuri Termopan, Parcare Subterana, Usa blindata si usi din lemn, Zona de parc, Parcare Deschisa, Masa cu scaune, Aer conditionat', '', '', '', ''),
(2, 1, 'Centru, ȘTEFAN CEL MARE', 500, 2, 900, '2019', 'Cumpara', 'Casa', 'Bucuresti', 'Vă oferim spre vânzare un apartament la sol cu 2 camere, sect. Centru, str. Stefan cel Mare, o zonă deosebit de liniștită și curată, ușor accesibilă.\r\nApartamentul este compartimentat în: 2 dormitoare, bucătărie, bloc sanitar separat, balcon.\r\nSuprafața t', 'sadsadmlsad, asdasdsa, sadsa, asda, asda\r\n', '', '', '', ''),
(4, 2, 'Buiucani, ALba Iulia 25', 1000, 3, 230, '1990', 'Cumpara', 'Oficiu', 'Chisinau', 'Alege acest apartament amenajat impecabil cu 3 camere și living, bucătărie, 2 blocuri sanitare, 2 garderobe, balcon, amplasat în sect. Buiucani str. Alba Iulia. Zonă în care toate facilitățile sunt puse la dispoziția ta, fără griji suplimentare dar cel mai important cu cel mai bun raport calitate – preţ!\r\n', '', 'images/buiucani-oficiu1.jpg', 'images/buiucani-oficiu2.jpg', 'images/buiucani-oficiu3.jpg', 'images/buiucani-oficiu4.jpg'),
(23, 2, 'Centru, ISMAIL', 245, 2, 58, '2020', 'Arendeaza', 'Apartament', 'Chisinau', 'Vă prezentăm acest apartament, cu 2 camere ce oferă caracteristici unice de calitate și comoditate.  Se prezintă cu suprafața 58 mp locativi + 9 mp balcon, amplasat în sect. Centru str. Ismail. Compartimentare: 2 camere, bucătărie, bloc sanitar separat, balcon. În imediata vecinătate de toate punctele de interes necesare: grădiniță, școală, piață, cafenele, bancă, farmacie etc.', '', 'images/izmail1.jpg', 'images/izmail2.jpg', 'images/izmail3.jpg', 'images/izmail4.jpg'),
(24, 2, 'Centru, C. NEGRUZZI', 180, 2, 58, '2016', 'Arendeaza', 'Apartament', 'Chisinau', 'Vă prezentăm acest apartament, cu 2 camere ce oferă caracteristici unice de calitate și comoditate.  Se prezintă cu suprafața 58 mp locativi + 9 mp balcon, amplasat în sect. Centru str. Ismail. Compartimentare: 2 camere, bucătărie, bloc sanitar separat, balcon. În imediata vecinătate de toate punctele de interes necesare: grădiniță, școală, piață, cafenele, bancă, farmacie etc.', '', 'images/negruzzi1.jpg', 'images/negruzzi2.jpg', 'images/negruzzi3.jpg', 'images/negruzzi4.jpg'),
(27, 2, 'sadsa', 12121, 2121, 121, '1999', 'Arendeaza', 'Apartament', 'Alba Iulia', 'sadsa', 'sadas, dsad sa, sadsa', 'images/', 'images/', 'images/', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`) VALUES
(1, 'eugen1', '4297f44b13955235245b2497399d7a93', 'Eugen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonare_tabel`
--
ALTER TABLE `abonare_tabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenti`
--
ALTER TABLE `agenti`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `proprietati`
--
ALTER TABLE `proprietati`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_agent` (`id_agent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonare_tabel`
--
ALTER TABLE `abonare_tabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenti`
--
ALTER TABLE `agenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proprietati`
--
ALTER TABLE `proprietati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proprietati`
--
ALTER TABLE `proprietati`
  ADD CONSTRAINT `proprietati_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `agenti` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
