-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 23. Mrz 2023 um 11:13
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `BE17_CR4_Silia_BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `BE17_CR4_Silia_BigLibrary` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `BE17_CR4_Silia_BigLibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isbn` varchar(17) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` enum('CD','book','DVD') NOT NULL,
  `author_first_name` varchar(50) DEFAULT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publish_date` year(4) NOT NULL,
  `status` enum('available','reserved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`id`, `title`, `image`, `isbn`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(3, 'Cover', 'https://images.moviesanywhere.com/6305a9e8ed76d5fa485ac16637655cf7/bcc68be4-eede-409b-a63d-e179b28d19b4.jpg', '978-92-95055-02', 'Cover will engross you in a gripping tale of lies, betrayal and infidelity. Vivica A. Fox and Aunjuane Ellis headline an all-star cast in this suspenseful account of murder.', 'DVD', 'Bill', 'Duke', 'Warner Bros', 'Hollywood', 2008, 'reserved'),
(6, 'Bloom', 'https://create.vista.com/s3-static/templates/6340101dc606e149ac95b9fb-650.webp', '354-3-16-141220', 'Holly is gonna transport you with her chill beats and her soft calming voice.', 'CD', 'Holly', 'Atwater', 'WV Sound', 'Vienna', 2018, 'reserved'),
(7, 'Retrowave', '    https://d1csarkz8obe9u.cloudfront.net/posterpreviews/retrowave-cd-album-cover-design-template-206d75bf8fa037c71d26282182c1ef97_screen.jpg?ts=1607505810', '984-2-16-15572', 'Retrowaves was created to remember the good old music combined with new waves of sound effects.', 'CD', '', 'Mavicwave', 'Parental Advisory', 'London', 2017, 'reserved'),
(8, 'This is my Life', 'https://edit.org/images/cat/cd-covers-big-2019090515.jpg', '123-8-56680-1', 'Selene is introducing herself to the world with her album \"this is my Life\".', 'CD', 'Selene', 'Brown', 'Sony Sounds', 'Manhatten, NY', 2022, 'reserved'),
(9, 'Us - Watch Yourself', '    https://i0.wp.com/bloody-disgusting.com/wp-content/uploads/2019/02/jordan-peele-us-poster.jpg?ssl=1', '267-9-678765-1', 'Horror Movie', 'DVD', 'Jordan', 'Peele', 'Universal Pictures', 'Hollywood', 2021, 'reserved'),
(29, 'The Winter Orphans', 'https://i.pinimg.com/236x/fe/6b/f8/fe6bf804c150d9eb9f91b75cb623d771.jpg', '234-098-564', 'a Novel from Kristin Beck', 'book', 'Kristin', 'Beck', 'Springer', 'Hamburg, DE', 2016, 'reserved'),
(33, 'if an egyptian cannot speak english', ' https://brittlepaper.com/wp-content/uploads/2022/06/noor-naga-scaled.jpeg', '230-983-09', 'Noor Nagas writing is fearless, virtuosic, and pithy with aphorism, her sentences honed to dagger point, thrumming with swag.', 'book', 'Noor', 'Naga', 'Brittle Paper', 'Oxford', 2015, 'available'),
(34, 'Summers Edge', 'https://d28hgpri8am2if.cloudfront.net/book_images/onix/cvr9781534493117/summers-edge-9781534493117_hr.jpg', '230-34-87678', 'beautifully written love-story to escape reality.', 'book', 'Dana', 'Mell', 'Barnes', 'San Francisco', 2021, 'reserved'),
(35, 'Kings of the Future', 'https://edit.org/photos/img/blog/k2e-movie-poster-credits-template-cover-maker-online-editor.jpg-840.jpg', '120-3873-3', 'The historical lineage that will reach the next century.', 'DVD', 'Steven', 'Spielberg', 'Movie Pictures', 'Hollywood', 2020, 'reserved'),
(36, 'State of War', '', '120-0837-76', 'The secret History of the CIA and the Bush administration.', 'book', 'James', 'Risen', 'Free Press', 'Oxford', 2006, 'available'),
(37, 'Alladin', 'https://amc-theatres-res.cloudinary.com/v1579120040/amc-cdn/production/2/movies/50900/50869/Poster/p_800x1200_AMC_Aladdin2019_En_091719.jpg', '918-821-9453', 'A new version of Alladin with Will Smith playing the Genie.', 'DVD', 'Dan', 'Lin', 'Disney', 'New York', 2019, 'available'),
(38, 'Smile', 'https://i-viaplay-com.akamaized.net/viaplay-prod/701/672/1669295285-278ff11ccdd5ce61ed4defd51d9bb48b209a0227.jpg?width=400&height=600', '230-354-2767', 'Smile is a 2022 American supernatural psychological horror film.', 'DVD', 'Parker', 'Finn', 'Paramount Players', 'Hollywood', 2022, 'available'),
(39, 'Pink Floyd (Dark Side of the Moon)', 'https://static.standard.co.uk/s3fs-public/thumbnails/image/2012/01/03/09/DarkSideMoon_415.jpg?width=968', '978-0760360613', 'This stunning look back at Pink Floyd’s discography comprises a series of in-depth, frank, and entertaining conversations.', 'CD', 'Pink', 'Floyd', 'Voyageur Press', '', 2018, 'available'),
(40, 'The White Stripes', 'https://images.radiox.co.uk/images/67379?crop=16_9&width=660&relax=1&signature=emgDK8szBoL9oAw1MwZufEGhdZs=', '153-7-28758', 'The White Stripes is the debut studio album by American rock duo The White Stripes, released on June 15, 1999.', 'CD', 'White', 'Stripes', 'Ghetto Recorders', 'Oxford', 1999, 'available'),
(41, 'Der Insasse', 'https://bilder.buecher.de/produkte/56/56008/56008114n.jpg', '978-3-426-28153-6', 'Sebastian Fitzek, Deutschlands prominentester Autor von Psychothrillern, mit seinem neuen Bestseller aus dem Inneren der Psychiatrie!', 'book', 'Sebastian', 'Fitzeck', 'Droemer Knau', 'Berlin', 2018, 'available');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
