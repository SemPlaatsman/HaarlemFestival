-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 07, 2023 at 06:34 PM
-- Server version: 10.10.3-MariaDB-1:10.10.3+maria~ubu2204
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haarlem_festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Armin van Buuren'),
(2, 'Martin Garrix'),
(3, 'Hardwell'),
(4, 'Afrojack');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `start_date`, `end_date`) VALUES
(1, 'Yummy!', '2023-02-19', '2023-04-29'),
(2, 'DANCE!', '2023-02-19', '2023-04-29'),
(3, 'A Stroll Through History', '2023-02-19', '2023-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `history_tours`
--

CREATE TABLE `history_tours` (
  `id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `group_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_tours`
--

INSERT INTO `history_tours` (`id`, `language`, `datetime`, `employee_id`, `employee_name`, `capacity`, `price`, `group_price`) VALUES
(1, 'Dutch', '2023-03-07 12:00:00', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00),
(2, 'Chinese', '2023-03-07 12:00:00', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00),
(3, 'English', '2023-03-07 12:00:00', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `VAT` int(11) NOT NULL,
  `QR_Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `order_id`, `event_id`, `total_price`, `VAT`, `QR_Code`) VALUES
(1, 1, 1, 40.00, 9, ''),
(2, 1, 2, 220.00, 9, ''),
(3, 1, 3, 77.50, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `day_of_week` int(11) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `restaurant_id`, `day_of_week`, `opening_time`, `closing_time`) VALUES
(1, 1, 1, '17:30:00', '22:30:00'),
(2, 1, 2, '17:30:00', '22:30:00'),
(3, 1, 3, '17:30:00', '22:30:00'),
(4, 1, 4, '17:30:00', '22:30:00'),
(5, 2, 0, '16:00:00', '02:00:00'),
(6, 2, 1, '16:00:00', '02:00:00'),
(7, 2, 2, '16:00:00', '02:00:00'),
(8, 2, 3, '16:00:00', '02:00:00'),
(9, 2, 4, '16:00:00', '02:00:00'),
(10, 2, 5, '16:00:00', '02:00:00'),
(11, 2, 6, '16:00:00', '02:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_payed` datetime DEFAULT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `time_payed`, `payment_status`) VALUES
(1, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `body_markup` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`id`, `artist_id`, `venue_id`, `start_date`, `end_date`, `price`) VALUES
(1, 3, 1, '2023-03-20 16:00:00', '2023-03-20 22:00:00', 60.00),
(2, 1, 2, '2023-03-21 14:00:00', '2023-03-22 02:00:00', 110.00),
(3, 3, 2, '2023-03-21 14:00:00', '2023-03-22 02:00:00', 110.00),
(4, 2, 2, '2023-03-21 14:00:00', '2023-03-22 02:00:00', 110.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `nr_of_adults` int(11) NOT NULL,
  `nr_of_kids` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `restaurant_id`, `item_id`, `nr_of_adults`, `nr_of_kids`, `datetime`) VALUES
(1, 1, 1, 2, 2, '2023-03-15 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `adult_price` decimal(11,2) NOT NULL,
  `kids_price` decimal(11,2) NOT NULL,
  `reservation_fee` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `seats`, `location`, `adult_price`, `kids_price`, `reservation_fee`) VALUES
(1, 'De Ripper', 32, 'Ripperdastraat 13-A, 2011 KG, Haarlem', 35.00, 17.50, 10.00),
(2, 'Coster 52°', 21, 'Lange Veerstraat 20-22, 2011 DB, Haarlem', 35.00, 17.50, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_dance`
--

CREATE TABLE `ticket_dance` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `performance_id` int(11) NOT NULL,
  `nr_of_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_dance`
--

INSERT INTO `ticket_dance` (`id`, `item_id`, `performance_id`, `nr_of_people`) VALUES
(1, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_history`
--

CREATE TABLE `ticket_history` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `nr_of_people` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_history`
--

INSERT INTO `ticket_history` (`id`, `item_id`, `tour_id`, `nr_of_people`) VALUES
(1, 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `time_created`, `is_admin`, `name`) VALUES
(1, 'admin@haarlem.nl', '$2y$10$CDNiCZFRqVAQauoFYn9fUO8KN/AKh0TEjxCEXr8nBFimIVbU8ixF.', '2023-02-27 13:48:12', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `seats`, `location`) VALUES
(1, 'Jopenkerk', 200, 'Gedempte Voldersgracht 2, 2011 WD, Haarlem'),
(2, 'Caprera Openluchttheater', 400, 'Hoge Duin en Daalseweg 2, 2061 AG, Bloemendaal'),
(3, 'XO The Club', 150, 'Grote Markt 8, 2011 RD Haarlem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_tours`
--
ALTER TABLE `history_tours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurant_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_dance`
--
ALTER TABLE `ticket_dance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `performance_id` (`performance_id`);

--
-- Indexes for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history_tours`
--
ALTER TABLE `history_tours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_dance`
--
ALTER TABLE `ticket_dance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_history`
--
ALTER TABLE `ticket_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`);

--
-- Constraints for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD CONSTRAINT `opening_hours_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `performance_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `ticket_dance`
--
ALTER TABLE `ticket_dance`
  ADD CONSTRAINT `ticket_dance_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `ticket_dance_ibfk_2` FOREIGN KEY (`performance_id`) REFERENCES `performance` (`id`);

--
-- Constraints for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD CONSTRAINT `ticket_history_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `ticket_history_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `history_tours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
