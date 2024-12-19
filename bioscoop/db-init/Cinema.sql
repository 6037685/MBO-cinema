-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 19 dec 2024 om 16:49
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
-- Tabelstructuur voor tabel `beheerder`
--

CREATE TABLE `beheerder` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telnmr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `beheerder`
--

INSERT INTO `beheerder` (`id`, `username`, `email`, `password`, `telnmr`) VALUES
(2, 'Julian', 'Julian123@gmail.com', '$2y$13$qAnSYi55QHPsoPu7HknoCu6KfX0QAnn5rZzw31K78gV9SFpwys7RC', '0612345678'),
(3, 'Kishan', 'Kishan123@gmail.com', '$2y$13$mVxYLOJ4.P0CORbNp4gm6ew0fg.tIRpper2CuQU9JigyAzhzmqdMa', '0612345678');

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
(10, 'A Minecraft Movie', 'Vier buitenbeentjes worden plotseling door een mysterieus portaal getrokken naar een bizar, kubusvormig wonderland dat gedijt op de verbeelding. Om weer thuis te komen, moeten ze deze wereld onder de knie krijgen terwijl ze op zoektocht gaan met een onverwachte, deskundige ambachtsman.', 'Nog niet bekend', '2025-04-04', 'Nog niet bekend', 'https://m.media-amazon.com/images/M/MV5BYWI2ZWE1NDktYmI1MC00MDAzLWI3MGYtMTgwMjkzNmJjY2ZlXkEyXkFqcGc@._V1_.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `telnmr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `telnmr`) VALUES
(16, '123', '123@gmail.com', '$2y$13$UfpOSnLeorFilKxrN1QL2e8hDdZe7sOtzXar75JDrq8RhzWi2qiCu', '0612345678'),
(17, 'FrankBouwer', 'BouwerFrank94@gmail.com', '$2y$13$OjP6k4Ue.AnhCVkv0UPDkeDFshIb.zc8/AdX/S4kk3MeH8mZl.4bW', '0688888888'),
(18, 'dsdsd', 'dsdds@gmail.com', '$2y$13$U1zpEXjJz4DBgDLsy33mDemKDnlU5SDisNlhL63QBPel29TOwdIIC', '0681818181');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `beheerder`
--
ALTER TABLE `beheerder`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `beheerder`
--
ALTER TABLE `beheerder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
