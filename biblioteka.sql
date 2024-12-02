-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 10:57 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `login`, `haslo`, `email`) VALUES
(1, 'uzytkownik1', '$2y$10$e.gfqjLt/BRTz1234abcd.', 'uzytkownik1@example.com'),
(2, 'uzytkownik2', '$2y$10$e.gfqjLt/BRTz5678efgh.', 'uzytkownik2@example.com'),
(3, 'uzytkownik3', '$2y$10$e.gfqjLt/BRTz9012ijkl.', 'uzytkownik3@example.com'),
(4, 'uzytkownik4', '$2y$10$e.gfqjLt/BRTz3456mnop.', 'uzytkownik4@example.com'),
(5, 'grisza', '$2y$10$hLAAKgmDZ0Md/96NR/iuveJSEpL6.sI.2Jywl7o.B1u102YWao.fy', 'miszokkacper@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id_ksiazki` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `data_wydania` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `nazwa`, `autor`, `data_wydania`) VALUES
(1, 'W pustyni i w puszczy', 'Henryk Sienkiewicz', '1911-01-01'),
(2, 'Lalka', 'Bolesław Prus', '1890-01-01'),
(3, 'Pan Tadeusz', 'Adam Mickiewicz', '1834-06-28'),
(4, 'Krzyżacy', 'Henryk Sienkiewicz', '1900-01-01'),
(5, 'Potop', 'Henryk Sienkiewicz', '1886-01-01'),
(6, 'Faraon', 'Bolesław Prus', '1897-01-01'),
(7, 'Chłopi', 'Władysław Reymont', '1904-01-01'),
(8, 'Zbrodnia i kara', 'Fiodor Dostojewski', '1866-01-01');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `id_wypozyczenia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_ksiazki` int(11) NOT NULL,
  `data_wypozyczenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wypozyczenia`
--

INSERT INTO `wypozyczenia` (`id_wypozyczenia`, `id_klienta`, `id_ksiazki`, `data_wypozyczenia`) VALUES
(1, 1, 1, '2024-01-01'),
(2, 1, 2, '2024-01-05'),
(3, 2, 3, '2024-01-10'),
(4, 3, 4, '2024-01-12'),
(5, 3, 5, '2024-01-15'),
(6, 4, 6, '2024-01-20'),
(7, 2, 7, '2024-01-22'),
(8, 4, 8, '2024-01-25'),
(9, 5, 7, '2024-12-02'),
(10, 5, 4, '2024-12-02'),
(11, 5, 4, '2024-12-02'),
(12, 5, 5, '2024-12-02');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id_ksiazki`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`id_wypozyczenia`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_ksiazki` (`id_ksiazki`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  MODIFY `id_wypozyczenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id_klienta`) ON DELETE CASCADE,
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`id_ksiazki`) REFERENCES `ksiazki` (`id_ksiazki`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
