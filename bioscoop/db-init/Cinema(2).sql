-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 24 jan 2025 om 21:27
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
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `background` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `movies`
--

INSERT INTO `movies` (`id`, `naam`, `beschrijving`, `duur`, `datum`, `rating`, `cover`, `background`) VALUES
(1, 'Joker: Folie à Deux', 'Todd Phillips&#039; &quot;Joker: Folie à Deux&quot; speelt Joaquin Phoenix in zijn Oscar-winnende dubbelrol als Arthur Fleck/Joker tegenover Oscar-winnaar Lady Gaga', '138 minuten', '2024-12-20', '5,2/10', 'https://m.media-amazon.com/images/M/MV5BNTRlNmU1NzEtODNkNC00ZGM3LWFmNzQtMjBlMWRiYTcyMGRhXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://cdn.prod.website-files.com/65cfe20094561f14a48e5d22/67112e16c2ee5fc7baffb8e5_what-do-you-think-of-joker-folie-a-deux-v0-rdsnrvqjqctd1.webp'),
(2, 'Spider-Man: Into The Spider-Verse', '“Spider-Man: Into the Spider-Verse” introduceert Miles Morales, een tiener uit Brooklyn, en de grenzeloze mogelijkheden van de Spider-Verse, waarbij meer dan één persoon het masker kan dragen.', '111 minuten', '2018', '8,4/10', 'https://m.media-amazon.com/images/M/MV5BMjMwNDkxMTgzOF5BMl5BanBnXkFtZTgwNTkwNTQ3NjM@._V1_.jpg', 'https://media.pathe.nl/nocropthumb/1600x590/gfx_content/other/api/filmdepot/v1/movie/download/32623_105095_st_sd-high.jpg'),
(10, 'A Minecraft Movie', 'Vier buitenbeentjes worden plotseling door een mysterieus portaal getrokken naar een bizar, kubusvormig wonderland dat gedijt op de verbeelding. Om weer thuis te komen, moeten ze deze wereld onder de knie krijgen terwijl ze op zoektocht gaan met een onverwachte, deskundige ambachtsman.', 'Nog niet bekend', '2025-04-04', 'Nog niet bekend', 'https://m.media-amazon.com/images/M/MV5BYWI2ZWE1NDktYmI1MC00MDAzLWI3MGYtMTgwMjkzNmJjY2ZlXkEyXkFqcGc@._V1_.jpg', 'https://www.minecraft.net/content/dam/minecraftnet/franchise/photography/things/AMM%20Hero%20Visual%20Bee%20-%201170x500.jpg.jpg'),
(13, 'The Super Mario Bros. Movie', 'Een loodgieter genaamd Mario reist samen met zijn broer Luigi door een ondergronds labyrint, in een poging een gevangengenomen prinses te redden.', '92 minuten', '2024-04-01', '7,0/10', 'https://m.media-amazon.com/images/M/MV5BOGZlN2EzOTYtMzUzOS00NTM3LTg0MTQtZDVjZGM4YmJlNWNhXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://reflector.uindy.edu/wp-content/uploads/2023/04/ENTER-MOVIE-SUPER-MARIO-BROS-BOXOFFICE-MCT-scaled.jpg'),
(14, 'Haikyu!! The Dumpster Battle', 'Ondanks een sterk deelnemersveld komt het Karasuno High-volleybalteam voorbij de voorronde van het Harutaka-toernooi in de prefectuur Miyagi om de derde ronde te bereiken.', '85 minuten', '2024-05-30', '7,8/10', 'https://media.pathe.nl/nocropthumb/620x955/gfx_content//api/filmdepot/v1/movie/download/35645/35645_178527_ps_sd-high.jpg', 'https://static1.srcdn.com/wordpress/wp-content/uploads/2024/06/haikyuu-the-dumpster-battle-team-names.jpg'),
(15, 'Mufasa: The Lion King (Originele versie) ', 'In Mufasa: The Lion King vertelt Rafiki de legende van Mufasa aan de jonge leeuwenwelp Kiara, dochter van Simba en Nala. Hierbij wordt hij op eigenzinnige wijze ondersteund door Timon en Pumbaa.', '118 minuten', '2024-12-18', '6,7/10', 'https://lumiere-a.akamaihd.net/v1/images/image_301ea434.jpeg', 'https://www.travelpro.nl/wp-content/uploads/Mufasa.png'),
(16, 'Sonic the Hedgehog', 'Taking refuge on Earth, when Sonic uses his incredible speed and accidentally knock out the power in part of the United States, he catches the attention of Dr. Robotnik and must stop him from using his unique power for world domination.', '99 minuten', '2020-02-13', '6,5/10', 'https://m.media-amazon.com/images/M/MV5BYTg2Yjc5MzItNzVmMi00MTllLWI2MDQtOTYyOWNjYWIxNzEzXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://m.media-amazon.com/images/M/MV5BNzU1ZjllYjAtNDlhYi00ZWZkLWI3ODAtNjU1NzQ1MGJjN2FiXkEyXkFqcGdeQVRoaXJkUGFydHlJbmdlc3Rpb25Xb3JrZmxvdw@@._V1_.jpg'),
(17, 'Sonic the Hedgehog 2', 'When Dr. Robotnik returns with a new partner, Knuckles, in search of an emerald that has the power to destroy civilizations, Sonic teams up with his own sidekick, Tails, on a journey across the world to find the emerald first.', '122 minuten', '2022-03-30', '6,5/10', 'https://media.pathe.nl/nocropthumb/620x955/gfx_content/Sonic-The-Hedgehog-2-NL-_ps_1_jpg_sd-low_Copyright-2021-Paramount-Pictures-and-Sega-of-America-Inc.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbqNiARxdbouqT5aoIEwsh_eTPVqPYGJSH5w&s'),
(18, 'Sonic The Hedgehog 3', 'Sonic the Hedgehog keert deze winter terug in de bioscoop voor zijn spannendste avontuur tot nu toe. Sonic, Knuckles en Tails moeten het samen opnemen tegen een sterke nieuwe vijand: de mysterieuze Shadow, die over ongekende krachten beschikt.', '110 minuten', '2024-12-26', '7,2/10', 'https://m.media-amazon.com/images/M/MV5BMjZjNjE5NDEtOWJjYS00Mjk2LWI1ZDYtOWI1ZWI3MzRjM2UzXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://movies.sterkinekor.co.za/CDN/media/entity/get/FilmTitleGraphic/HO00003316?referenceScheme=HeadOffice&allowPlaceHolder=true'),
(19, 'Spider-Man: Across the Spider-Verse', 'Miles Morales katapulteert door het multiversum, waar hij een team van Spider-People tegenkomt dat belast is met het beschermen van het voortbestaan ​​ervan. Wanneer de helden botsen over de vraag hoe ze met een nieuwe dreiging moeten omgaan, moet Miles opnieuw definiëren wat het betekent om een ​​held te zijn', '2 h 20 min', '2023-06-01', '8,5/10', 'https://m.media-amazon.com/images/M/MV5BNThiZjA3MjItZGY5Ni00ZmJhLWEwN2EtOTBlYTA4Y2E0M2ZmXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://musicart.xboxlive.com/7/f3dd6600-0000-0000-0000-000000000002/504/image.jpg'),
(26, 'Five Nights at Freddy\s', 'Een onrustige bewaker gaat werken bij Freddy Fazbear&#039;s Pizza. Tijdens zijn vijf nachten op het werk realiseert hij zich dat er iets mis is met de pizzeria en ontdekt hij al snel de waarheid over de animatronics.', '109 minuten', '2023-10-27', '5,4/10', 'https://brhscatseyeview.org/wp-content/uploads/2023/11/fnafposter-758x1200.jpg', 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/10/five-night-s-at-freddy-s-movie-animatronics-nearly-caused-fire-on-set.jpg'),
(27, 'The Godfather', 'De ouder wordende patriarch van een dynastie van de georganiseerde misdaad draagt de controle over zijn clandestiene imperium over aan zijn onwillige zoon.', '175 minuten', '1972-09-28', '9,2/10', 'https://m.media-amazon.com/images/M/MV5BNGEwYjgwOGQtYjg5ZS00Njc1LTk2ZGEtM2QwZWQ2NjdhZTE5XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://musicart.xboxlive.com/7/631d5200-0000-0000-0000-000000000002/504/image.jpg'),
(28, 'The Godfather Part II', 'Het vroege leven en de carrière van Vito Corleone in het New York City van de jaren twintig worden geportretteerd, terwijl zijn zoon Michael zijn greep op het familiemisdaadsyndicaat uitbreidt en verstevigt.', '202 minuten', '1975-07-17', '9,0/10', 'https://www.thegardencinema.co.uk/wp-content/uploads/films/The-Godfather-Part-II.jpg', 'https://streamcoimg-a.akamaihd.net/000/390/616/390616-Banner-L2-55dd75731636ad6f10908d2ec9b23bd3.jpg'),
(29, 'Creed', 'De voormalige wereldkampioen zwaargewicht Rocky Balboa fungeert als trainer en mentor voor Adonis Johnson, de zoon van zijn overleden vriend en voormalige rivaal Apollo Creed.', '133 minuten', '2016-01-21', '7,6/10', 'https://m.media-amazon.com/images/M/MV5BNWM3NjY2ZDctMGZiYy00OGFlLThkMTktOTY2MDM2YjE2OTliXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg', 'https://miro.medium.com/v2/resize:fit:2560/1*RqVYqssjbZhbD8py9OoNTA.png'),
(30, 'Creed II', 'Onder leiding van Rocky Balboa neemt de kersverse zwaargewichtkampioen Adonis Creed het op tegen Viktor Drago, de zoon van Ivan Drago.', '130 minuten', '2019-01-10', '7,1/10', 'https://m.media-amazon.com/images/I/915Mm6Ut9HL.jpg', 'https://cdn.filmtotaal.nl/images/original/31318-creed-ii.jpg'),
(31, 'Creed III', 'Adonis bloeit op in zijn carrière en gezinsleven, maar wanneer een jeugdvriend en voormalig bokswonderkind weer opduikt, is de confrontatie meer dan alleen een gevecht.', '116 minuten', '2023-03-02', '6,7/10', 'https://m.media-amazon.com/images/M/MV5BOWY0MTRmY2YtMzBlYi00NjlkLThkZWYtMmE2NzJiZmIzODFkXkEyXkFqcGc@._V1_.jpg', 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2023/02/creed-3-first-reactions-praise-michael-b-jordan-s-directorial-debut.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `reservation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `movie_id`, `reservation_date`) VALUES
(16, 2, 10, '2025-01-24 18:29:53'),
(28, 2, 19, '2025-01-24 18:38:57'),
(29, 2, 26, '2025-01-24 18:39:03'),
(30, 2, 31, '2025-01-24 18:39:07'),
(31, 2, 29, '2025-01-24 18:39:10'),
(32, 2, 16, '2025-01-24 18:39:12'),
(33, 5, 10, '2025-01-24 21:06:41'),
(34, 5, 14, '2025-01-24 21:06:45'),
(35, 5, 26, '2025-01-24 21:06:48'),
(36, 5, 17, '2025-01-24 21:06:51'),
(37, 5, 16, '2025-01-24 21:06:53'),
(38, 4, 27, '2025-01-24 21:07:08'),
(39, 4, 29, '2025-01-24 21:07:11'),
(40, 4, 28, '2025-01-24 21:07:13'),
(41, 4, 16, '2025-01-24 21:07:15'),
(42, 4, 30, '2025-01-24 21:07:17');

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
(4, '123', '123@gmail.com', '$2y$13$UfpOSnLeorFilKxrN1QL2e8hDdZe7sOtzXar75JDrq8RhzWi2qiCu', '0612345678', 1),
(5, 'FrankBouwer', 'BouwerFrank94@gmail.com', '$2y$13$OjP6k4Ue.AnhCVkv0UPDkeDFshIb.zc8/AdX/S4kk3MeH8mZl.4bW', '0688888888', 0),
(6, 'dsdsd', 'dsdds@gmail.com', '$2y$13$U1zpEXjJz4DBgDLsy33mDemKDnlU5SDisNlhL63QBPel29TOwdIIC', '0681818181', 0),
(7, '&lt;script&gt;alert(&#039;Welkom bij de beheerpagina van Mbo Cinema!&#039;);&lt;/script&gt;', '1234@gmail.com', '$2y$13$YsWlH62rOz4tqH5l7Ubz8uIYGXjFaM6eNKaaqdajRhs7qHPwfSsjm', '0612345678', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT voor een tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
