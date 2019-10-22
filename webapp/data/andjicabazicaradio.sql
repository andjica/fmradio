-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 10:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andjicabazicaradio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'New relases', ''),
(2, 'Trending', ''),
(3, 'Trending artist', ''),
(4, 'Trending albums', ''),
(5, 'Upcoming albums', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`) VALUES
(36, 'assets/images/dua-lipa-new-rules-christmas-920x584.jpg'),
(37, 'assets/images/jos.jpg'),
(38, 'assets/images/jos1.jpg'),
(39, 'assets/images/ana.jpg'),
(40, 'assets/images/frenna.jpg'),
(41, 'assets/images/chiv.jpg'),
(42, 'assets/images/frenna.jpg'),
(43, 'assets/images/broeder.jpg'),
(44, 'assets/images/4x.jpg'),
(45, 'assets/images/dope.jpg'),
(46, 'assets/images/dua-lipa-new-rules-christmas-920x584.jpg'),
(47, 'assets/images/dua-lipa-new-rules-christmas-920x584.jpg'),
(48, 'assets/images/ronnie.jpg'),
(49, 'assets/images/mp.jpg'),
(50, 'assets/images/joso.jpg'),
(51, 'assets/images/fren.jpg'),
(52, 'assets/images/freee.jpg'),
(53, 'assets/images/ddd.jpg'),
(54, 'assets/images/broeder.jpg'),
(55, 'assets/images/joooo.jpg'),
(56, 'assets/images/freet.jpg'),
(57, 'assets/images/dax'),
(58, 'assets/images/freheh.jpg'),
(59, 'assets/images/kam.jpg'),
(60, 'assets/images/guap.jpg'),
(61, 'assets/images/tester.jpg'),
(62, 'assets/images/bizzy.png'),
(63, 'assets/images/maxresdefault.jpg'),
(64, 'assets/images/DJTT5228.JPG'),
(65, 'assets/images/DMEC5415.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`) VALUES
(6, 'De Artist of the year : Ronnie Flex', 'Wat een mooie prestatie, de artist of the year : Ronnie flex, we zijn er zeer blij mee en laten we hopen dat we nog meer mooie liedjes van ronnie flex mogen horen. Wellicht komen er nog meer nieuwe liedjes erbij de komende weken en maanden!\r\n\r\n18-08-2019 15:30', 'assets/news-images/roo.jpeg'),
(7, 'Boef is de songwriter of the year', 'Boef heeft een zeer mooie statement gelegd, de beste artiest en songwriter of the year. Met zijn vele mooie songs en prestaties is Boef een voorbeeld rapper geworden voor velen. Binnenkort komen er nieuwe songs!', 'assets/news-images/boef.jpg'),
(8, 'Frenna flinken fouten gemaakt in het verleden!', 'Frenna heeft een hoop fouten gemaakt in het verleden maar dankzij zijn doorzettings vermogen heeft de beste man supper hits gemaakt!', 'assets/news-images/frenna.jpg'),
(9, 'Boef maakt miljoenen!, Flinke miljoenen zelfs', 'Boef heeft onlangs een contract getekend bij Sony music, de beste man gaat miljoenen maken en is nu al miljonair. Wel verdiend eerlijkgezegd!', 'assets/news-images/guap.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(50) NOT NULL,
  `song_url` text NOT NULL,
  `description` text NOT NULL,
  `artist_name` varchar(50) NOT NULL,
  `album_name` varchar(50) NOT NULL,
  `img_id` int(11) NOT NULL,
  `active_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `song_url`, `description`, `artist_name`, `album_name`, `img_id`, `active_img`) VALUES
(63, 'Gimma', 'assets/songs/gimma.mp3', 'josq', 'Josilvio', 'Gimma', 55, 1),
(64, 'Ana Wiyak', 'assets/songs/Clandistino - Ana Wiyak ft. Numidia (prod. YAM).mp3', 'desc', 'Beluister nu jouw favoriete ICON Radio!', 'Clandestino', 62, 1),
(66, 'Viraal', 'assets/songs/Frenna x Mula B - Viraal (prod. Diquenza & IliassOpDeBeat).mp3', 'Frenna', 'Frenna x Mula B', 'Viraal', 51, 1),
(67, 'Louboutin', 'assets/songs/Frenna - Louboutin ft. Jonna Fraser, Emms & Idaly (prod. Diquenza & Ozhora Miyagi).mp3', 'frenna', 'Frenna', 'Louboutin', 58, 1),
(68, 'Mi No Lob', 'assets/songs/Broederliefde - Mi No Lob (prod. Angosoundz).mp3', 'Broder', 'Broederliefde', 'Mi No Lob', 54, 1),
(70, 'Intro ', 'assets/songs/D-Double - Intro (prod. D-Pep).mp3', 'dd', 'D -Double', 'Intro', 53, 1),
(71, 'Kiss and make up', 'assets/songs/Dua Lipa, BLACKPINK - Kiss and Make Up.mp3', 'dua', 'Dua Lipa', 'Kiss and make up', 47, 1),
(72, 'Wack ass Rappers', 'assets/songs/Dax - Wack Ass Rappers Freestyle [One Take Video].mp3', 'Dax', 'Dax', 'Dax', 57, 1),
(73, 'The Ocean', 'assets/songs/Mike Perry - The Ocean (ft. Shy Martin) [CC].mp3', 'mp', 'Mike Perry', 'Mike Perry', 49, 1),
(74, 'Kita Song', 'assets/songs/kita-zauber-stern.jpg', 'Epic', 'Kita', 'Songs for Live', 0, 0),
(75, 'MIX', 'assets/songs/Screenshot 2019-08-06 at 15.58.34.png', 'MIX', 'MIX', 'MIX', 0, 0),
(76, 'KAMIKAZA', 'assets/songs/JalaBratxBubaCorellixSenidahKAMIKAZA.mp3', 'New artist', 'Jala Brat x Buba Corelli', 'Kamikaza', 59, 1),
(77, 'GUAP', 'assets/songs/BOEF_FEAT_DOPEBWOY_-_GUAP_PROD_JACK_HIRAK[Converterino.online].mp3', 'Beof', 'Boef & Dopebwoy', 'Guap', 60, 1),
(78, 'Domino\'s pizza korting Actie!', 'assets/songs/tester.jpg', '  ', '  Domino\'s pizza korting Actie!', '  ', 61, 1),
(79, ' ', 'assets/songs/maxresdefault.jpg', ' ', 'Mediamarkt, de gekste acties deze week!', ' ', 63, 1),
(80, 'proba', 'assets/songs/DMEC5415.JPG', 'proba', 'andjica', 'andjica', 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs_categories`
--

CREATE TABLE `songs_categories` (
  `id` int(11) NOT NULL,
  `id_song` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs_categories`
--

INSERT INTO `songs_categories` (`id`, `id_song`, `id_category`) VALUES
(19, 64, 1),
(20, 65, 1),
(21, 67, 2),
(22, 68, 2),
(23, 69, 2),
(24, 70, 3),
(25, 71, 3),
(26, 59, 3),
(27, 62, 1),
(28, 62, 1),
(29, 72, 4),
(30, 73, 4),
(31, 65, 5),
(32, 70, 5),
(33, 66, 5),
(34, 68, 5),
(35, 70, 2),
(36, 76, 3),
(37, 77, 4),
(38, 78, 1),
(39, 79, 1),
(40, 80, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `reg_date`) VALUES
(1, 'Andjela', 'Stojanovic', 'andjaaa95@gmail.com', '637a7dac8d694a1cd86cf4e0cb9f2bf7', '2019-08-01 22:18:14'),
(2, 'danny', 'milosevic', 'deni@gmail.com', '637a7dac8d694a1cd86cf4e0cb9f2bf7', '2019-10-07 20:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `song_name` varchar(55) NOT NULL,
  `artist` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`, `song_name`, `artist`) VALUES
(3, 'assets/videos/JalaBratxBubaCorellixSenidahKAMIKAZA.mp4', 'KAMIKAZA', 'Jala Brat x Buba Corelli'),
(9, 'assets/videos/BOEF_FEAT_DOPEBWOY_-_GUAP_PROD_JACK_HIRAK[Converterino.online].mp4', 'Guap - PROD - JACK', 'Boef & Dopebwoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs_categories`
--
ALTER TABLE `songs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `songs_categories`
--
ALTER TABLE `songs_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
