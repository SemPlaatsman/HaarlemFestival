-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 20 feb 2023 om 20:31
-- Serverversie: 10.11.2-MariaDB-1:10.11.2+maria~ubu2204
-- PHP-versie: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

-- Database: `haarlem_festival`

--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Artist`
--

CREATE TABLE `Artist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `History tours`
--

CREATE TABLE `History tours` (
  `language` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `empolyee` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Item`
--

CREATE TABLE `Item` (
  `id` int(11) NOT NULL,
  `item_type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `VAT` int(11) NOT NULL,
  `shoppingcart_id` int(11) NOT NULL,
  `QR_Code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_payed` datetime NOT NULL,
  `payment_Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Pages`
--

CREATE TABLE `Pages` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `body_markup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Playing Artist`
--

CREATE TABLE `Playing Artist` (
  `artist_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reservation`
--

CREATE TABLE `Reservation` (
  `nrOfAdults` int(11) NOT NULL,
  `nrOfKids` int(11) NOT NULL,
  `date` date NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Restaurant`
--

CREATE TABLE `Restaurant` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Ticket Dance`
--

CREATE TABLE `Ticket Dance` (
  `artist_venue_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Ticket History`
--

CREATE TABLE `Ticket History` (
  `Tour` int(11) NOT NULL,
  `TicketType` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time_created` datetime NOT NULL,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Venue`
--

CREATE TABLE `Venue` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `History tours`
--
ALTER TABLE `History tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoppingcart_id` (`shoppingcart_id`),
  ADD KEY `item_type_id` (`item_type_id`);

--
-- Indexen voor tabel `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `Playing Artist`
--
ALTER TABLE `Playing Artist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`);

--
-- Indexen voor tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Ticket Dance`
--
ALTER TABLE `Ticket Dance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_venue_id` (`artist_venue_id`);

--
-- Indexen voor tabel `Ticket History`
--
ALTER TABLE `Ticket History`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Tour` (`Tour`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Venue`
--
ALTER TABLE `Venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Artist`
--
ALTER TABLE `Artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `History tours`
--
ALTER TABLE `History tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Playing Artist`
--
ALTER TABLE `Playing Artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Ticket Dance`
--
ALTER TABLE `Ticket Dance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Ticket History`
--
ALTER TABLE `Ticket History`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `Venue`
--
ALTER TABLE `Venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `Item_ibfk_1` FOREIGN KEY (`shoppingcart_id`) REFERENCES `Orders` (`id`),
  ADD CONSTRAINT `Item_ibfk_2` FOREIGN KEY (`item_type_id`) REFERENCES `Ticket Dance` (`id`),
  ADD CONSTRAINT `Item_ibfk_3` FOREIGN KEY (`item_type_id`) REFERENCES `Ticket History` (`id`),
  ADD CONSTRAINT `Item_ibfk_4` FOREIGN KEY (`item_type_id`) REFERENCES `Reservation` (`id`);

--
-- Beperkingen voor tabel `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`);

--
-- Beperkingen voor tabel `Playing Artist`
--
ALTER TABLE `Playing Artist`
  ADD CONSTRAINT `Playing Artist_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `Artist` (`id`),
  ADD CONSTRAINT `Playing Artist_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `Venue` (`id`);

--
-- Beperkingen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`restaurantId`) REFERENCES `Restaurant` (`id`);

--
-- Beperkingen voor tabel `Ticket Dance`
--
ALTER TABLE `Ticket Dance`
  ADD CONSTRAINT `Ticket Dance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `Playing Artist` (`id`);

--
-- Beperkingen voor tabel `Ticket History`
--
ALTER TABLE `Ticket History`
  ADD CONSTRAINT `Ticket History_ibfk_1` FOREIGN KEY (`Tour`) REFERENCES `History tours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
