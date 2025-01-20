-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 20 jan 2025 om 19:54
-- Serverversie: 8.1.0
-- PHP-versie: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cinema`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `duur` varchar(255) NOT NULL,
  `datum` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `movies`
--

INSERT INTO `movies` (`id`, `naam`, `beschrijving`, `duur`, `datum`, `rating`, `src`) VALUES
(1, 'Joker: Folie à Deux', 'Todd Phillips&#039; &quot;Joker: Folie à Deux&quot; speelt Joaquin Phoenix in zijn Oscar-winnende dubbelrol als Arthur Fleck/Joker tegenover Oscar-winnaar Lady Gaga', '2 h 18 min', '2024-12-20', '5,2/10', 'img/Movie-Img/Joker-Folie-à-Deux.jpg'),
(2, 'Spider-Man: Into The Spider-Verse', '“Spider-Man: Into the Spider-Verse” introduceert Miles Morales, een tiener uit Brooklyn, en de grenzeloze mogelijkheden van de Spider-Verse, waarbij meer dan één persoon het masker kan dragen.', '1 h 51 min', '2018', '8,4/10', 'img/Movie-Img/Spiderman-Into-SpiderVerse.jpg'),
(10, 'A Minecraft Movie', 'Vier buitenbeentjes worden plotseling door een mysterieus portaal getrokken naar een bizar, kubusvormig wonderland dat gedijt op de verbeelding. Om weer thuis te komen, moeten ze deze wereld onder de knie krijgen terwijl ze op zoektocht gaan met een onverwachte, deskundige ambachtsman.', 'Nog niet bekend', '2025-04-04', 'Nog niet bekend', 'https://m.media-amazon.com/images/M/MV5BYWI2ZWE1NDktYmI1MC00MDAzLWI3MGYtMTgwMjkzNmJjY2ZlXkEyXkFqcGc@._V1_.jpg'),
(13, 'The Super Mario Bros. Movie', 'Een loodgieter genaamd Mario reist samen met zijn broer Luigi door een ondergronds labyrint, in een poging een gevangengenomen prinses te redden.', '1 h 32 min', '2024-04-01', '7,0/10', 'https://m.media-amazon.com/images/M/MV5BOGZlN2EzOTYtMzUzOS00NTM3LTg0MTQtZDVjZGM4YmJlNWNhXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
(14, 'Haikyu!! The Dumpster Battle', 'Ondanks een sterk deelnemersveld komt het Karasuno High-volleybalteam voorbij de voorronde van het Harutaka-toernooi in de prefectuur Miyagi om de derde ronde te bereiken.', '1 h 25 min', '2024-05-30', '7,8/10', 'https://media.pathe.nl/nocropthumb/620x955/gfx_content//api/filmdepot/v1/movie/download/35645/35645_178527_ps_sd-high.jpg'),
(15, 'Mufasa: The Lion King (Originele versie) ', 'In Mufasa: The Lion King vertelt Rafiki de legende van Mufasa aan de jonge leeuwenwelp Kiara, dochter van Simba en Nala. Hierbij wordt hij op eigenzinnige wijze ondersteund door Timon en Pumbaa.', '1 h 58 min', '2024-12-18', '6,7/10', 'https://lumiere-a.akamaihd.net/v1/images/image_301ea434.jpeg'),
(16, 'Sonic the Hedgehog', 'Taking refuge on Earth, when Sonic uses his incredible speed and accidentally knock out the power in part of the United States, he catches the attention of Dr. Robotnik and must stop him from using his unique power for world domination.', '1 h 39 min', '2020-02-13', '6,5/10', 'https://m.media-amazon.com/images/M/MV5BYTg2Yjc5MzItNzVmMi00MTllLWI2MDQtOTYyOWNjYWIxNzEzXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
(17, 'Sonic the Hedgehog 2', 'When Dr. Robotnik returns with a new partner, Knuckles, in search of an emerald that has the power to destroy civilizations, Sonic teams up with his own sidekick, Tails, on a journey across the world to find the emerald first.', '2 h 2 min', '2022-03-30', '6,5/10', 'https://media.pathe.nl/nocropthumb/620x955/gfx_content/Sonic-The-Hedgehog-2-NL-_ps_1_jpg_sd-low_Copyright-2021-Paramount-Pictures-and-Sega-of-America-Inc.jpg'),
(18, 'Sonic The Hedgehog 3', 'Sonic the Hedgehog keert deze winter terug in de bioscoop voor zijn spannendste avontuur tot nu toe. Sonic, Knuckles en Tails moeten het samen opnemen tegen een sterke nieuwe vijand: de mysterieuze Shadow, die over ongekende krachten beschikt.', '1 h 50 min', '2024-12-26', '7,2/10', 'https://m.media-amazon.com/images/M/MV5BMjZjNjE5NDEtOWJjYS00Mjk2LWI1ZDYtOWI1ZWI3MzRjM2UzXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
(19, 'Spider-Man: Across the Spider-Verse', 'Miles Morales katapulteert door het multiversum, waar hij een team van Spider-People tegenkomt dat belast is met het beschermen van het voortbestaan ​​ervan. Wanneer de helden botsen over de vraag hoe ze met een nieuwe dreiging moeten omgaan, moet Miles opnieuw definiëren wat het betekent om een ​​held te zijn', '2 h 20 min', '2023-06-01', '8,5/10', 'https://m.media-amazon.com/images/M/MV5BNThiZjA3MjItZGY5Ni00ZmJhLWEwN2EtOTBlYTA4Y2E0M2ZmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telnmr` varchar(10) NOT NULL,
  `Rol` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`id`, `username`, `email`, `password`, `telnmr`, `Rol`) VALUES
(2, 'Julian', 'Julian123@gmail.com', '$2y$13$qAnSYi55QHPsoPu7HknoCu6KfX0QAnn5rZzw31K78gV9SFpwys7RC', '0612345678', 1),
(3, 'Kishan', 'Kishan123@gmail.com', '$2y$13$mVxYLOJ4.P0CORbNp4gm6ew0fg.tIRpper2CuQU9JigyAzhzmqdMa', '0612345678', 1),
(4, '123', '123@gmail.com', '$2y$13$UfpOSnLeorFilKxrN1QL2e8hDdZe7sOtzXar75JDrq8RhzWi2qiCu', '0612345678', 0),
(5, 'FrankBouwer', 'BouwerFrank94@gmail.com', '$2y$13$OjP6k4Ue.AnhCVkv0UPDkeDFshIb.zc8/AdX/S4kk3MeH8mZl.4bW', '0688888888', 0),
(6, 'dsdsd', 'dsdds@gmail.com', '$2y$13$U1zpEXjJz4DBgDLsy33mDemKDnlU5SDisNlhL63QBPel29TOwdIIC', '0681818181', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
