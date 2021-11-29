-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Lis 2021, 19:00
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `siproj`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'twórca',
  `content` varchar(1024) NOT NULL COMMENT 'treść lub ścieżka',
  `place` enum('forum','recipe') NOT NULL COMMENT 'komentarz w forum czy recipe',
  `postID` int(11) NOT NULL COMMENT 'ID postu komentowanego'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'twórca',
  `title` varchar(32) NOT NULL,
  `picture` varchar(64) DEFAULT NULL COMMENT 'ścieżka do pliku',
  `content` varchar(1024) NOT NULL COMMENT 'ścieżka lub treść?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `forum`
--

INSERT INTO `forum` (`id`, `userID`, `title`, `picture`, `content`) VALUES
(1, 1, 'Testowy post', '', 'Testowy post, proszę o pomoc w ugotowaniu krewetki, ciągle ucieka.'),
(2, 5, 'Testowy post 2', 'miecz.png', 'Testowy post 2, krewetka nadal ucieka.'),
(3, 5, 'Testowy post 3', '', 'Testowy post 3, krewetka złapana ponownie.'),
(4, 1, 'Testing123', NULL, 'testing123'),
(5, 1, 'Testing123', NULL, 'testing123'),
(6, 1, 'a', NULL, 'zdjęcie'),
(7, 1, 'a', NULL, 'zdjęcie'),
(8, 1, 'Zdjęcie', '', '123'),
(11, 1, 'Zdjęcie', 'wng563jd9abtk0v.png', '123345'),
(12, 1, 'test substr', NULL, '// 7 = .image/'),
(13, 1, 'test substr', 't3h8dsz7i7rwpnxryse7.ng', '// 7 = .image/'),
(14, 1, 'refresh test', 'xnbvye8f09tyearnlv8v.ng', 'test'),
(15, 1, 'hash test', 'bK29MqT8Zrnc41WpfdHD.ng', '123'),
(16, 1, 'refresh test', 'Jikq8WmfBE6BnjgTmELw.png', '123'),
(17, 1, 'png test', 'kEoHfM5vBoKZX4erGWqZ.png', '123'),
(18, 1, 'sha test', 'NTOOdSi9aliTreeLE3br.png', '123'),
(19, 1, 'sha test1', 'Pz1RJOVVuW4FNOk96yTV.png', '123'),
(20, 1, 'Test sha1', '92ad2e67e1744edf7dba4551080713c378e53107.png', 'sha1 - miecz = 92ad2e67e1744edf7dba4551080713c378e53107'),
(21, 1, 'test sha1 nr 2', '92ad2e67e1744edf7dba4551080713c378e53107.png', 'sha 1 miecz = 92ad2e67e1744edf7dba4551080713c378e53107');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'twórca',
  `title` varchar(32) NOT NULL,
  `picture` varchar(50) NOT NULL COMMENT 'ścieżka do zdjęcia',
  `content` varchar(1024) NOT NULL COMMENT 'treść przepisu albo ścieżka do pliku txt?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `photo` varchar(64) NOT NULL COMMENT 'profilowe ścieżka',
  `description` varchar(256) NOT NULL COMMENT 'opis profilu',
  `permission` enum('admin','user','mod') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `nick`, `email`, `photo`, `description`, `permission`) VALUES
(1, 'user', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Bartek', 'bartek@random.com', 'forsene.jpg', 'Administrator serwisu SuperPrzepisy.pl', 'admin'),
(5, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test', 'test@test', '', 'testowy description', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
