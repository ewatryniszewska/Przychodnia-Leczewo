-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Gru 2020, 02:16
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przychodnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `email`, `haslo`) VALUES
(1, 'admin@leczewo.pl', '11111111');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lekarz`
--

CREATE TABLE `lekarz` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `specjalizacja` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) NOT NULL,
  `nr_gabinetu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `lekarz`
--

INSERT INTO `lekarz` (`id`, `imie`, `nazwisko`, `specjalizacja`, `telefon`, `nr_gabinetu`) VALUES
(8, 'Poncjusz', 'Piłat', 'dentysta', 800500507, 7),
(9, 'Bartosz', 'Mocny', 'laryngolog', 800500508, 8),
(10, 'Alicja', 'Nowak', 'endokrynolog', 800500503, 3),
(11, 'Marta', 'Kora', 'laryngolog', 800500505, 5),
(12, 'Bianka', 'Kora', 'dentysta', 800500519, 19),
(13, 'Wojciech', 'Ulatowicz', 'dentysta', 800500502, 2),
(14, 'Marzena', 'Wypasik', 'endokrynolog', 800500506, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pacjent`
--

CREATE TABLE `pacjent` (
  `id` int(11) NOT NULL,
  `imie` text COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `pesel` bigint(11) NOT NULL,
  `miasto` text COLLATE utf8_polish_ci NOT NULL,
  `adres` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pacjent`
--

INSERT INTO `pacjent` (`id`, `imie`, `nazwisko`, `data_urodzenia`, `pesel`, `miasto`, `adres`, `haslo`, `email`) VALUES
(23, 'Bartłomiej', 'Nieziemski', '1991-07-25', 91072503545, 'Gdańsk', 'Michałówka 11', '11111111', 'bnieziemski@gmail.com'),
(24, 'Łukasz', 'Panda', '1975-09-22', 75092245789, 'Warszawa', 'Warszawska 12b/15', '11111111', 'pandalukasz@wp.pl'),
(25, 'Anna', 'Wesołowska', '1994-08-05', 94080512589, 'Łódź', 'Miłosierna 15', '11111111', 'awesolowska@interia.pl'),
(26, 'Bogumiła', 'Wariot', '1969-07-06', 69070612478, 'Mikołajewo', 'Wielka 14/9', '11111111', 'wariot@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rejestracja`
--

CREATE TABLE `rejestracja` (
  `id` int(11) NOT NULL,
  `id_pacjenta` int(11) DEFAULT NULL,
  `specjalizacja` text CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `dolegliwosci` text CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_polish_ci;

--
-- Zrzut danych tabeli `rejestracja`
--

INSERT INTO `rejestracja` (`id`, `id_pacjenta`, `specjalizacja`, `dolegliwosci`) VALUES
(9, 24, 'dentysta', 'zielone zęby'),
(10, 24, 'endokrynolog', 'badanie kontrolne'),
(11, 25, 'laryngolog', 'ból uszu'),
(12, 26, 'laryngolog', 'przytępiony słuch'),
(13, 26, 'dentysta', 'ból, straszny ból'),
(14, 26, 'endokrynolog', 'boli');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wizyta`
--

CREATE TABLE `wizyta` (
  `id` int(11) NOT NULL,
  `id_pacjenta` int(11) DEFAULT NULL,
  `id_lekarza` int(11) DEFAULT NULL,
  `data_wizyty` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wizyta`
--

INSERT INTO `wizyta` (`id`, `id_pacjenta`, `id_lekarza`, `data_wizyty`) VALUES
(18, 25, 12, '2020-08-13 11:15:00'),
(19, 25, 10, '2020-05-01 17:30:00'),
(20, 24, 11, '2019-06-28 09:00:00'),
(21, 26, 11, '2020-12-17 02:00:00'),
(23, 24, 14, '2021-01-01 17:30:00'),
(24, 26, 8, '2021-01-10 20:00:00'),
(25, 24, 8, '2020-12-03 10:15:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rejestracja`
--
ALTER TABLE `rejestracja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacjenta` (`id_pacjenta`);

--
-- Indeksy dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacjenta` (`id_pacjenta`),
  ADD KEY `id_lekarza` (`id_lekarza`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `lekarz`
--
ALTER TABLE `lekarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `pacjent`
--
ALTER TABLE `pacjent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `rejestracja`
--
ALTER TABLE `rejestracja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `rejestracja`
--
ALTER TABLE `rejestracja`
  ADD CONSTRAINT `rejestracja_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `wizyta`
--
ALTER TABLE `wizyta`
  ADD CONSTRAINT `wizyta_ibfk_1` FOREIGN KEY (`id_pacjenta`) REFERENCES `pacjent` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wizyta_ibfk_2` FOREIGN KEY (`id_lekarza`) REFERENCES `lekarz` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
