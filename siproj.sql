-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Gru 2021, 22:09
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

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

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `userID`, `content`, `place`, `postID`) VALUES
(17, 1, 'Testowy komentarz do przepisów 2', 'recipe', 1),
(22, 1, 'dzień dobry', 'recipe', 3),
(23, 1, 'elo', 'recipe', 3),
(25, 1, 'jyrdjytfuyg', 'recipe', 8),
(26, 1, ';iugk;lknihlkvuhb', 'recipe', 8),
(27, 1, 'hgvnbkgcjvhjbk', 'recipe', 8),
(28, 5, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'recipe', 7),
(29, 5, 'Polecam Zeptera, dość drogie, ale starczą na lata :)', 'forum', 32),
(30, 7, 'No ja próbowałem i nie jest to takie złe. Finalnie jem mięso, ale polecam spróbować na jakiś czas odstawić, może podpasuje ;)', 'forum', 33),
(31, 5, 'Nie zamierzam XD nie jestem takim debilem jak ty, żeby to wkładać do ust XDDD', 'forum', 33),
(32, 1, 'Grzeczniej bo dostaniesz bana. Nie wyzywamy ;)', 'forum', 33);

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
(32, 7, 'Od jakiej firmy garnki?', '9f50da6013e47de3611fb756953b1b3e059c2cae.jpeg', 'Witam, od jakiegoś czasu męczę się z moimi garnkami. Słyszałem, że teraz produkują takie konkretne, grube, nic się nie przypala. Ktoś poleca takie garnki od jakiejś konkretnej firmy? czy firma tu nie ma większego znaczenie i wszystkie są dobre'),
(33, 5, 'Kuchnia wegańska, tak czy nie?', 'ff826c16dbab43f8eebeebbbb1903739c041cbde.jpeg', 'Cześć, Mam do was pytanie, jaki stosunek macie do kuchni wegańskiej? Ja szczerze mówiąc nie bardzo rozumiem jak można całkowicie nie jeść mięsa ani produktów zwierzęcych XD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `likes`
--

CREATE TABLE `likes` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `recipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `likes`
--

INSERT INTO `likes` (`ID`, `userID`, `recipeID`) VALUES
(3, 1, 7),
(5, 1, 3),
(7, 5, 3),
(8, 5, 9),
(9, 5, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL COMMENT 'twórca',
  `title` text NOT NULL,
  `picture` varchar(50) DEFAULT NULL COMMENT 'ścieżka do zdjęcia',
  `content` text NOT NULL COMMENT 'treść przepisu albo ścieżka do pliku txt?',
  `likes` int(11) NOT NULL DEFAULT 0,
  `dayRecipe` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `recipe`
--

INSERT INTO `recipe` (`id`, `userID`, `title`, `picture`, `content`, `likes`, `dayRecipe`) VALUES
(1, 1, 'Curry z dyni', '294c82b468385ab4388612c0bd3ae2fdd39b7e95.png', 'Z dyni usuwamy pestki, ale nie usuwamy skóry. Skóra dyni hokkaido jest miękka i zawiera w sobie dużo aromatu. Następnie dynię kroimy w kostkę ok. 2x2 cm. Wrzucamy do garnka na rozgrzany olej kokosowy. Przesmażamy tak, aby dynia zachowała zwartą konsystencję. Przesypujemy do naczynia, a w tym samym garnku z dodatkiem kolejnej łyżki oleju kokosowego przesmażamy cebulę krótko, ale na dość wysokim płomieniu.\n\nCzosnek siekamy. Do cebuli dodajemy pomidory, następnie mleczko kokosowe i mieszamy. Dusimy chwilę i dodajemy posiekany wcześniej czosnek. Pora na przyprawy: curry, paprykę ostrą, paprykę słodką, mielony kumin, posiekaną natkę kolendry, odrobinę soli i pieprzu.\n\nNa koniec dodajemy dynię i pozostawiamy na 20-30 sekund, po czym zestawiamy z ognia.\n\nChlebki pita możemy podsmażyć bezpośrednio na płomieniu lub upiec w rozgrzanym piecu.\n\nCurry podajemy na ciepło z pokrojonymi w ćwiartki chlebkami oraz plasterkami limonki.', 0, 1),
(2, 1, 'Udka w sosie kawowym', '472b16abf4b974ab03f9839513a7ad110b2ddcd0.png', 'Udka musimy zamarynować w cynamonie, mielonym czarnym pieprzu, curry, przyprawie do kurczaka oraz odrobinie soli. Przyprawy musimy wmasować w mięso. Odstawiamy na min. 20 minut. Po tym czasie pieczemy: najpierw przez 10-12 minut w temp., potem przez 30 minut w temperaturze 180 stopni.\n\nGruszki obieramy, kroimy na ćwiartki, pozbawiając gniazd nasiennych. Brzoskwinie lub nektarynki dzielimy na pół i usuwamy pestkę. Owoce smażymy na maśle, w niskiej temperaturze, co jakiś czas delikatnie mieszając.\n\nSos kawowy: w rondelku śmietankę podgrzewamy z kawą rozpuszczalną, sosem sojowym oraz kaparami. Po wymieszaniu doprowadzamy do wrzenia i zostawiamy na małym ogniu na 8-10 minut do zredukowania. Doprawiamy odrobiną pieprzu.', 1, 0),
(3, 1, 'Kugel z gęsiną', 'd40a859ee15727c138d8baa63389e85ed3d04db3.jpg', 'Ziemniaki ucieramy na tarce lub przy użyciu robota/malaksera. Dodajemy mąkę, dwa jajka, a następnie przyprawy: sól, pieprz, majeranek, paprykę słodką mieloną oraz posiekane ząbki czosnku. Dokładnie mieszamy.\n\nNogi filetujemy, oddzielając również skórę od mięsa. Skórę układamy na zimnej patelni i zaczynamy ją ogrzewać. Mięso drobno kroimy. Jeśli tylko ze skóry wytopi się tłuszcz, wyjmujemy ją z patelni, umieszczając w niej mięso z nogi. Skórą smarujmy jeszcze wnętrze naczynia, w którym będziemy zapiekać kugel.\n\nCebulę białą i czerwoną kroimy w drobno kostkę i dodajemy ją do gęsiny. Dusimy przez 5-7 minut, następnie dodajemy masło i dusimy przez kolejne 5 minut.\n\nNa dnie naczynia, w którym będziemy zapiekać kugle układamy porcję ciasta ziemniaczanego. Na nim duszone mięso z gęsi. Na koniec przykrywamy znów warstwą ciasta.\n\nPieczemy w temp. 170 stopni przez 70-75 minut.\n\nPodajemy z porcją kwaśnej śmietany z dodatkiem szczypiorku oraz słodko-kwaśnym dodatkiem np. sałatką szwedzką. Na koniec doprawiamy całość odrobiną soli i pieprzu.\n\nZaczynamy od nagrzania piekarnika do 180°C. Pierś z gęsi przyprawioną z obu stron majerankiem oraz pieprzem, umieszczamy w rękawie do pieczenia, zamkniętym z jednej strony. Dodajemy suszone śliwki w całości, wydrążone świeże śliwki oraz jabłka pokrojone w ćwiartki. Do całości dolewamy soku jabłkowego. Szczelnie zamykamy rękaw i wkładamy gęś do rozgrzanego piekarnika na ok. 80 minut/ 180°C.\n\nKroimy chleb w kostkę, podsmażamy w garnku na odrobinie oleju. Dodajemy drobno pokrojone suszone śliwki, miód, czerwone wytrawne wino. Pozostawiamy do zagotowania, aby alkohol wyparował z sosu. Na koniec dodajemy tłuszcz wytopiony z gęsi. Mieszamy.\n\nKopytka umieszczamy na patelnie, dodajemy majeranek. Podsmażamy.\n\nDanie gotowe, możemy podawać.', 2, 0),
(7, 1, 'Pierś gęsi na sezonowych owocach', '5e9f203067f75a36a23dbae950a35dfb1353adbf.jpg', 'Zaczynamy od nagrzania piekarnika do 180°C. Pierś z gęsi przyprawioną z obu stron majerankiem oraz pieprzem, umieszczamy w rękawie do pieczenia, zamkniętym z jednej strony. Dodajemy suszone śliwki w całości, wydrążone świeże śliwki oraz jabłka pokrojone w ćwiartki. Do całości dolewamy soku jabłkowego. Szczelnie zamykamy rękaw i wkładamy gęś do rozgrzanego piekarnika na ok. 80 minut/ 180°C.\n\nKroimy chleb w kostkę, podsmażamy w garnku na odrobinie oleju. Dodajemy drobno pokrojone suszone śliwki, miód, czerwone wytrawne wino. Pozostawiamy do zagotowania, aby alkohol wyparował z sosu. Na koniec dodajemy tłuszcz wytopiony z gęsi. Mieszamy.\n\nKopytka umieszczamy na patelnie, dodajemy majeranek. Podsmażamy.\n\nDanie gotowe, możemy podawać.', 1, 0),
(8, 1, 'Wege dla każdego! Zapiekanka z bakłażana', '4d4f6f6f70c0b2c67b5ce477a268ddf1c038a408.jpg', 'Bakłażana kroimy wzdłuż w grubsze plastry. Plastry układamy na rozgrzanej patelni i grillujemy z każdej strony przez ok 3 minuty.\n\nSos beszamelowy: mąkę wsypujemy do rondelka i podprażamy przez 2-3 minuty. Następnie dodajemy masło, a po chwili mleko. Redukujemy ogień do minimum i systematycznie mieszamy. Doprawiamy odrobiną soli i gałką muszkatołową. Mieszamy, aż sos zgęstnieje.\n\nSkładamy zapiekankę: dno naczynia żaroodpornego pokrywamy cienką warstwą beszamelu. Następnie układamy bakłażany i posypujemy gruboziarnistą przyprawą do dań kuchni włoskiej. Układamy kawałki sera feta, posypujemy kuminem, dodajemy listki świeżej bazylii, na wierzchu warstwy układamy plastry sera żółtego i podlewamy beszamelem. W ten sposób tworzymy kolejne warstwy.\n\nWierzch zapiekanki pokrywamy beszamelem, dodajemy zioła prowansalskie oraz żółty ser.\n\nPieczemy w 185 stopniach przez 40-45 minut. Po wyciągnięciu z pieca pozostawiamy zapiekankę na 15 minut, by odpoczęła.\n\nPodajemy ze spieczonymi na chrupko pszennym plackami.', 0, 0),
(9, 5, 'Pieczony kurczak z ziemniakami', '55dd73563ecac8694c5d5ba16c21127c3072170a.png', 'Składniki:\r\nkurczak (ok. 1,5 kg) - 1 sztuka\r\n\r\nPrzyprawa do złotego kurczaka Knorr - 4 łyżki\r\n\r\nziemniaki - 800 gramów\r\n\r\nPapryka słodka z Hiszpanii Knorr - 1 łyżeczka\r\n\r\nOregano z Turcji Knorr - 1 łyżeczka\r\n\r\nolej - 2 łyżki\r\n\r\nKrok 1\r\nStwórz błyskawiczną marynatę, mieszając przyprawę Knorr z olejem, papryką i oregano. Natrzyj nią kurczaka z zewnątrz i od środka. Jeśli lubisz potrawy pikantne, do marynaty dodaj również trochę ostrej papryki.\r\n\r\nKrok 2\r\nZiemniaki obierz i przekrój na cztery części.\r\n\r\nKrok 3\r\nKurczaka i ziemniaki umieść w brytfance, piecz 60 minut w 190 °C.', 1, 0);

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
(1, 'user', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Bartek', 'bartek@random.com', 'forsene.jpg', 'Administrator serwisu SuperPrzepisy.pl', 'admin'),
(5, 'test', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Arek', 'testowanie@wp', '7f6e684159353ffc9e308d03aefd2bea8a88a77f.jpeg', 'Gdyby Pan Bóg nie chciał żebyśmy jedli świnie to zrobiłby je z trocin a nie z mięsa ;)', 'user'),
(7, 'q', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'qqłka', 'q@q', 'fe4c7869e7fbc3a4fea0c7365134582be078112e.jpeg', 'Od niedawna zacząłem przygodę z kuchnią, lubię dyskutować na forach, więc zapraszam do komentowania moich postów :)', 'user'),
(8, 'robert makłowicz', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'robert makłowicz', 'mc@lowicz', '', '', 'user');

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
-- Indeksy dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT dla tabeli `likes`
--
ALTER TABLE `likes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
