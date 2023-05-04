-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: May 03, 2023 at 10:48 AM
-- Server version: 10.11.2-MariaDB-1:10.11.2+maria~ubu2204
-- PHP Version: 8.1.17

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
  `gathering_location` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `group_price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history_tours`
--

INSERT INTO `history_tours` (`id`, `language`, `datetime`, `gathering_location`, `employee_id`, `employee_name`, `capacity`, `price`, `group_price`) VALUES
(1, 'Dutch', '2023-03-07 12:00:00', 'Standbeeld van Laurens Janszoon Coster', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00),
(2, 'Chinese', '2023-03-07 12:00:00', 'Oude Groenmarkt 22, 2011 HL Haarlem', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00),
(3, 'English', '2023-03-07 12:00:00', 'Statue of Laurens Jansz Coster', 1, 'Jan Jaap van Laar', 24, 17.50, 60.00);

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

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url`, `body_markup`) VALUES
(1, '/home', 'Welcome to The Festival, a celebration of everything that has to do with food, history, dance and culture in Haarlem. First up, we have Yummy!, a delicious food festival. \r\nNext up, travel back in time and visit A Stroll Through History Then we have DANCE, a high-energy dance event featuring some of the best DJ’s from around the world. \r\nFinally, delve into the mysteries of the Teylers Museum with The Secret Of Professor Teyler treasure hunt! Don\'t be afraid to join in and go all out!'),
(2, '/home', 'In Haarlem a charming and tasty food festival called “Yummy!” is taking place. Here you can try loads of new dishes in various restaurants. \r\nBe sure to mark your calendars and plan your trip today!'),
(3, '/home', 'The city of Haarlem has a rich history and a lot of beautiful sites to see.\r\nFor a limited time only the event, A stroll through history will take place. During this event, a guide will take you to see Haarlem\'s most important sites.'),
(4, '/home', 'Do you want to have a wild night out with friends or family?\r\nYoung or old you are all welcome to the Haarlem DANCE event where amazing DJ’s from around the world will be performing in our best venues.'),
(5, '/home', 'Do you want to learn all about the amazing professor Teyler? Come to the Teyler museum for an interactive museum experience.'),
(6, '/home', 'Each dotted location on the map represents an event with Purple - DANCE! venues, Yellow - YUMMY restaurants, Red - Teylers museum and Blue - Historic buildings.\r\nBe sure to visit the St.-Bavokerk in the heart of Haarlem since most of the culinary industry and various historic sites are located around it.\r\nNo matter what your interests may be, there is something on this map for everyone so start exploring the vibrant city of Haarlem today!'),
(7, '/home', 'Caprera openluchttheater in the far left corner can be reached by going with the car following the N208 or by cycling 16 minutes through Midden Duin and Daalseweg.'),
(8, '/history', 'Welcome to A Stroll through History. This is an event where you will be taken on a guided tour through Haarlem. \r\nOn this tour you will visit places that are important in the history of Haarlem. On this page you will find more information about the tour. \r\nYou can check out information about the venues that are visited in the tour, \r\nwhen the tours are and what the prices are to get a ticket for the tour.'),
(9, '/history', 'During the tour you will get visit to visit nine amazing locations in Haarlem. \r\nEach of these locations has a great story behind them and an important contribution to the history of Haarlem. \r\nIf you want to find out more details about a location or what the importance of a location was in the history of Haarlem you can find out more by clicking on it.'),
(10, '/history', 'Due to the nature of this tour all participants must be a minimum of 12 years old and strollers are not\r\nallowed.'),
(11, '/history/JopenKerk', 'The Jopenkerk, located in the heart of Haarlem on the Gedempte Voldersgracht, offers a one-of-a-kind\r\nexperience. This former church has been transformed into a brewery, café, and restaurant all in one. For an\r\nextra special visit, come during the week when you can watch the brewers in action while sipping on a craft beer or enjoying a meal.'),
(12, '/history/JopenKerk', 'The Vestekerk, originally known as the \"Vrijzinnig Hervormde Kerk,\" was built in 1910 on Vestestraat street. In 1958, \r\nit was renamed the Jacobskerk and served as a house of worship until 1975. It was later saved from destruction by the Stichting de Hoeksteen in 2005 and converted \r\ninto the Jopenkerk in 2010, now housing a brewery, café, and restaurant for visitors to enjoy.'),
(13, '/history/JopenKerk', 'Experience a unique culinary journey at Jopenkerk\'s 1st-floor restaurant, where craft beer and food come together in perfect harmony. \r\nEnjoy specially crafted dishes expertly paired with the restaurant\'s selection of beers, or choose from a carefully curated wine list. Please note that the restaurant \r\nis not wheelchair accessible, so please call in advance for any special needs.'),
(14, '/history/JopenKerk', 'This location is located at point E on the map and will be visited after visiting the Proveniershof in the tour. \r\nThe next stop on the route will be the Waalse Kerk Haarlem.'),
(15, '/history/WaalseKerk', 'The Waalse Kerk is the oldest church in Haarlem and was built in 1348. It is located at the Begijnhof. The Waalse Kerk is a small and beautiful church. \r\nThe church holds some historical gems that are certainly worth checking out if you have the opportunity.'),
(16, '/history/WaalseKerk', 'The Waalse Kerk, built in 1348, is the oldest church in Haarlem. Originally a Catholic church, \r\nit was gifted to the city by the States of Holland as compensation for the damages caused by the Spanish siege. \r\nIn 1590, the City of Haarlem gave it to the French-speaking Protestants, who started holding services in their language. \r\nIt served as a refuge for Flemish Protestants who had fled from Catholic persecution in the 16th century, \r\nwith many of the 20,000 refugees who came to Haarlem worshipping at the Waalse Kerk.'),
(17, '/history/WaalseKerk', 'Inside the church two mural paintings have remained intact. On the northeast side of the choir is a green tapestry. \r\nDuring the restauration it appeared that the green tapestry was fitted over a red painting. This was probably done during the 19e century.\r\nNext to the altar niche is a painting of the three Maria’s on easter morning. \r\nAt the niche the entire easter story was visible, the story that stands central in the liturgy and the church year.'),
(18, '/history/WaalseKerk', 'This location is located at point E on the map and will be visited after visiting the Proveniershof in the tour. \nThe next stop on the route will be the Waalse Kerk Haarlem.'),
(19, '/yummy', 'In the charming city of Haarlem, a food festival called “Yummy!” is taking place. The streets are filled with beautiful restaurants serving a variety of tasty dishes.\nHaarlem is a culinary city with a thriving restaurant scene that offers something for every palate; from traditional Dutch cuisine to international flavours.\nIt doesn’t matter where you come from or what you like; Haarlem has something for everyone! So scroll down and book a reservation for just €35,- to €45,- per person!'),
(20, '/yummy/deripper', 'Restaurant De Ripper once started as a meeting centre but has since grown into a remarkable trainee restaurant.\r\nExperience the unique opportunity to sample straightforward good food and familiar favourites prepared by trainee chefs. Informal but professional!'),
(21, '/yummy/deripper', 'Led by a team of five experienced culinary instructors, De Ripper\'s trainee chefs prepare a wide range of choices within a fixed-price menu to become chefs.\r\nChoose from a wide range of drinks such as coffee from Peeze, tea, soft drinks, wines, and, among other beers, beer from Jopen. For questions contact us by phone/email\r\n023 51 85 160 info@deripper.nl'),
(22, '/yummy/deripper', 'Ripperdastraat 13-A, 2011 KG, Haarlem Just a 5 minute walk from Haarlem station!'),
(23, '/yummy/coster52', 'Coster 52° is a Haarlem eatery where hospitality and quality are of great importance. In addition to the delicious drink and/or snack, \nwhich can be enjoyed at Coster 52°, knowledge can also be gained about the history of Haarlem. A historically delicious restaurant!'),
(24, '/yummy/coster52', 'Coster52° is a Haarlem café restaurant that stands for local, homemade and fresh! It’s known for a menu with familiar favourites where anyone can find something tasty.\r\nAlso, don’t forget to visit their bar that’s alive until the late hours to enjoy many skillfully crafted cocktails. For questions contact us by phone/email\r\n+31 23 202 4726 info@coster52.nl'),
(25, '/yummy/coster52', 'Lange Veerstraat 20-22, 2011 DB, Haarlem Just a 5 minute walk from Haarlem center!'),
(26, '/dance', 'Welcome to our Haarlem DANCE! event where many different DJ’s from around the world will be performing in our venues to make sure you get to experience the best night ever! \r\nIf you want to know more about where or when they will be performing please go ahead and take a look at the schedule below.'),
(27, '/dance', 'In our venues top talented DJ’s like Hardwell, Tiësto, Martin Garrix and many more will be performing in front of you and your friends to give you a night out you won’t forget. \r\nIf you want to find out more about them we got two detailed pages of some Dutch DJ’s to hype you up! \r\nSo don’t be shy and find out more about your favourite DJ’s by visiting our pages.'),
(28, '/dance/hardwell', 'We have detailed all you need to know about Hardwell below so check it out!'),
(29, '/dance/hardwell', 'Hardwell who’s real name is Robbert van de Corput, is a professional Dutch DJ and music producer. Robbert was born on January 7 1988 in a Dutch city called Breda. \r\nHe first gained recognition in 2009 for his bootleg of “Show Me Love vs. Be” and has since then never stopped growing to become the professional DJ he is today.'),
(30, '/dance/hardwell', 'With his long career as a DJ, Hardwell has many highlights. He has performed on the biggest stages like Ultra Music Festival, Sunburn and Tomorrowland in front of giant crowds. \r\nWas voted the world’s number-one DJ by DJ Mag in 2013 and again in 2014. And has topped the lists many times over with great musical masterpieces like “Spaceman” and “Apollo”.'),
(31, '/dance/hardwell', 'Hardwell has written, coproduced, and been featured in various tracks and albums, including classics like \"Off The Hook,\" \"Arcadia,\" and \"Young Again.\" \r\nHowever, his most famous track and the one that is most important to him and his fans is \"Spaceman.\" The production of \"Spaceman\" led to millions of people falling in \r\nlove with Hardwell and his big-room sound, and it is also featured in his biggest album to date, \"The Story of Hardwell.\"'),
(32, '/dance/afrojack', 'We have detailed all you need to know about Afrojack below so check it out!'),
(33, '/dance/afrojack', 'Afrojack Who’s real name is Nick Leonardus van de Wall is a Dutch DJ and music producer. After taking a interest in making music \r\nhe produced his first ever release at the age of 18 called “In Your Face”. Now Nick is performing with amazing artists like Beyoncé in the biggest venues.'),
(34, '/dance/afrojack', 'Afrojack the famous Dutch DJ has a career spanning 10+ years long with winning a Grammy as an award-winning producer/songwriter/DJ, ringing the Nasdaq bell \r\nin New York City for SFX; and producing famous tracks like ‘Run the World’ with Beyoncé.'),
(35, '/dance/afrojack', 'Afrojack is a Grammy award-winning DJ with many top 100 tracks and popular songs, including \"Hey Mama,\" \"Can\'t Stop Me,\" and \"Give Me Everything.\" \r\nHis album \"Forget The World\" also contributed to his success. However; his most important song, \"Take Over Control\" was the first song \r\nto air on the radio and launch Afrojack\'s career.');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `final_check` decimal(11,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `nr_of_adults` int(11) NOT NULL,
  `nr_of_kids` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `restaurant_id`, `final_check`, `item_id`, `nr_of_adults`, `nr_of_kids`, `datetime`) VALUES
(1, 1, 65.00, 1, 2, 2, '2023-03-26 18:00:00');

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
(1, 'De Ripper', 32, 'Ripperdastraat 13-A, 2011 KG Haarlem', 35.00, 17.50, 10.00),
(2, 'Coster 52°', 21, 'Lange Veerstraat 20-22, 2011 DB Haarlem', 35.00, 17.50, 10.00);

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
  ADD KEY `event_id` (`event_id`),
  ADD KEY `item_ibfk_1` (`order_id`);

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
  ADD KEY `reservation_ibfk_2` (`item_id`);

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
  ADD KEY `performance_id` (`performance_id`),
  ADD KEY `ticket_dance_ibfk_1` (`item_id`);

--
-- Indexes for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tour_id` (`tour_id`),
  ADD KEY `ticket_history_ibfk_1` (`item_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_dance`
--
ALTER TABLE `ticket_dance`
  ADD CONSTRAINT `ticket_dance_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_dance_ibfk_2` FOREIGN KEY (`performance_id`) REFERENCES `performance` (`id`);

--
-- Constraints for table `ticket_history`
--
ALTER TABLE `ticket_history`
  ADD CONSTRAINT `ticket_history_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_history_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `history_tours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
