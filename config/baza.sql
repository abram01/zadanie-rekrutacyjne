-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 06 Sie 2025, 19:07
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `widoczni_zadanie`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia_zmian`
--

CREATE TABLE `historia_zmian` (
  `id` int(11) NOT NULL,
  `tabela` varchar(100) DEFAULT NULL,
  `rekord_id` varchar(50) DEFAULT NULL,
  `pole` varchar(100) DEFAULT NULL,
  `stara_wartosc` text DEFAULT NULL,
  `nowa_wartosc` text DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `data_zmiany` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `historia_zmian`
--

INSERT INTO `historia_zmian` (`id`, `tabela`, `rekord_id`, `pole`, `stara_wartosc`, `nowa_wartosc`, `ip`, `data_zmiany`) VALUES
(1, 'opiekunowie', 'O-000001', 'dodatkowe_info', 'Dodatkowe informacje 1', 'Dodatkowe informacje 1dsffdfds', '::1', '2025-08-06 15:25:33'),
(2, 'klienci', 'K-000039', 'nazwa', 'Test TRIGERA', 'Test TRIGERA - poprawka', '::1', '2025-08-06 15:26:51'),
(3, 'klienci', 'K-000039', 'status', 'aktywny', 'nieaktywny', '::1', '2025-08-06 15:26:51'),
(4, 'opiekunowie', 'O-000003', 'status', 'nieaktywny', 'aktywny', '::1', '2025-08-06 18:41:32'),
(5, 'opiekunowie', 'O-000005', 'status', 'nieaktywny', 'aktywny', '::1', '2025-08-06 18:45:29'),
(6, 'relacje_opiekun_klient', 'R-000011', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:45:48'),
(7, 'relacje_opiekun_klient', 'R-000011', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:45:48'),
(8, 'relacje_opiekun_klient', 'R-000012', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:45:48'),
(9, 'relacje_opiekun_klient', 'R-000012', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 18:45:48'),
(10, 'relacje_opiekun_klient', 'R-000013', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:45:48'),
(11, 'relacje_opiekun_klient', 'R-000013', 'id_opiekun', NULL, 'O-000003', '::1', '2025-08-06 18:45:48'),
(12, 'relacje_opiekun_klient', 'R-000014', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:45:48'),
(13, 'relacje_opiekun_klient', 'R-000014', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:45:48'),
(14, 'relacje_opiekun_klient', 'R-000015', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:45:48'),
(15, 'relacje_opiekun_klient', 'R-000015', 'id_opiekun', NULL, 'O-000005', '::1', '2025-08-06 18:45:48'),
(16, 'relacje_opiekun_klient', 'R-000016', 'id_klient', NULL, 'K-000009', '::1', '2025-08-06 18:45:56'),
(17, 'relacje_opiekun_klient', 'R-000016', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:45:56'),
(18, 'relacje_opiekun_klient', 'R-000017', 'id_klient', NULL, 'K-000009', '::1', '2025-08-06 18:45:56'),
(19, 'relacje_opiekun_klient', 'R-000017', 'id_opiekun', NULL, 'O-000003', '::1', '2025-08-06 18:45:56'),
(20, 'relacje_opiekun_klient', 'R-000018', 'id_klient', NULL, 'K-000009', '::1', '2025-08-06 18:45:56'),
(21, 'relacje_opiekun_klient', 'R-000018', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:45:56'),
(22, 'relacje_opiekun_klient', 'R-000019', 'id_klient', NULL, 'K-000008', '::1', '2025-08-06 18:46:03'),
(23, 'relacje_opiekun_klient', 'R-000019', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:46:03'),
(24, 'relacje_opiekun_klient', 'R-000020', 'id_klient', NULL, 'K-000008', '::1', '2025-08-06 18:46:03'),
(25, 'relacje_opiekun_klient', 'R-000020', 'id_opiekun', NULL, 'O-000005', '::1', '2025-08-06 18:46:03'),
(26, 'relacje_opiekun_klient', 'R-000021', 'id_klient', NULL, 'K-000006', '::1', '2025-08-06 18:46:08'),
(27, 'relacje_opiekun_klient', 'R-000021', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:46:08'),
(28, 'relacje_opiekun_klient', 'R-000022', 'id_klient', NULL, 'K-000001', '::1', '2025-08-06 18:46:21'),
(29, 'relacje_opiekun_klient', 'R-000022', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:46:21'),
(30, 'relacje_opiekun_klient', 'R-000023', 'id_klient', NULL, 'K-000001', '::1', '2025-08-06 18:46:21'),
(31, 'relacje_opiekun_klient', 'R-000023', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 18:46:21'),
(32, 'relacje_opiekun_klient', 'R-000024', 'id_klient', NULL, 'K-000002', '::1', '2025-08-06 18:46:27'),
(33, 'relacje_opiekun_klient', 'R-000024', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 18:46:27'),
(34, 'relacje_opiekun_klient', 'R-000025', 'id_klient', NULL, 'K-000003', '::1', '2025-08-06 18:46:33'),
(35, 'relacje_opiekun_klient', 'R-000025', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:46:33'),
(36, 'relacje_opiekun_klient', 'R-000026', 'id_klient', NULL, 'K-000004', '::1', '2025-08-06 18:46:40'),
(37, 'relacje_opiekun_klient', 'R-000026', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:46:40'),
(38, 'relacje_opiekun_klient', 'R-000027', 'id_klient', NULL, 'K-000004', '::1', '2025-08-06 18:46:40'),
(39, 'relacje_opiekun_klient', 'R-000027', 'id_opiekun', NULL, 'O-000005', '::1', '2025-08-06 18:46:40'),
(40, 'relacje_opiekun_klient', 'R-000028', 'id_klient', NULL, 'K-000005', '::1', '2025-08-06 18:46:45'),
(41, 'relacje_opiekun_klient', 'R-000028', 'id_opiekun', NULL, 'O-000003', '::1', '2025-08-06 18:46:45'),
(42, 'relacje_opiekun_klient', 'R-000029', 'id_klient', NULL, 'K-000007', '::1', '2025-08-06 18:46:51'),
(43, 'relacje_opiekun_klient', 'R-000029', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:46:51'),
(44, 'opiekunowie', 'O-000003', 'status', 'aktywny', 'zawieszony', '::1', '2025-08-06 18:47:04'),
(45, 'opiekunowie', 'O-000005', 'status', 'aktywny', 'nieaktywny', '::1', '2025-08-06 18:47:20'),
(46, 'relacje_opiekun_klient', 'R-000030', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:48:16'),
(47, 'relacje_opiekun_klient', 'R-000030', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:48:16'),
(48, 'relacje_opiekun_klient', 'R-000031', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:48:16'),
(49, 'relacje_opiekun_klient', 'R-000031', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 18:48:16'),
(50, 'relacje_opiekun_klient', 'R-000032', 'id_klient', NULL, 'K-000010', '::1', '2025-08-06 18:48:16'),
(51, 'relacje_opiekun_klient', 'R-000032', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:48:16'),
(52, 'relacje_opiekun_klient', 'R-000033', 'id_klient', NULL, 'K-000012', '::1', '2025-08-06 18:57:03'),
(53, 'relacje_opiekun_klient', 'R-000033', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 18:57:03'),
(54, 'relacje_opiekun_klient', 'R-000034', 'id_klient', NULL, 'K-000012', '::1', '2025-08-06 18:57:03'),
(55, 'relacje_opiekun_klient', 'R-000034', 'id_opiekun', NULL, 'O-000004', '::1', '2025-08-06 18:57:03'),
(56, 'relacje_opiekun_klient', 'R-000035', 'id_klient', NULL, 'K-000015', '::1', '2025-08-06 18:59:17'),
(57, 'relacje_opiekun_klient', 'R-000035', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 18:59:17'),
(58, 'relacje_opiekun_klient', 'R-000035', 'id_klient', 'K-000015', NULL, '::1', '2025-08-06 19:00:52'),
(59, 'relacje_opiekun_klient', 'R-000035', 'id_opiekun', 'O-000001', NULL, '::1', '2025-08-06 19:00:52'),
(60, 'relacje_opiekun_klient', 'R-000036', 'id_klient', NULL, 'K-000015', '::1', '2025-08-06 19:00:52'),
(61, 'relacje_opiekun_klient', 'R-000036', 'id_opiekun', NULL, 'O-000001', '::1', '2025-08-06 19:00:52'),
(62, 'relacje_opiekun_klient', 'R-000037', 'id_klient', NULL, 'K-000015', '::1', '2025-08-06 19:00:52'),
(63, 'relacje_opiekun_klient', 'R-000037', 'id_opiekun', NULL, 'O-000002', '::1', '2025-08-06 19:00:52');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `id_generator`
--

CREATE TABLE `id_generator` (
  `typ` varchar(20) NOT NULL,
  `prefix` varchar(5) NOT NULL,
  `ostatni_numer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `id_generator`
--

INSERT INTO `id_generator` (`typ`, `prefix`, `ostatni_numer`) VALUES
('historia', 'H', 0),
('klienci', 'K', 15),
('opiekunowie', 'O', 5),
('relacja', 'R', 37);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id` varchar(10) NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_edycji` datetime DEFAULT NULL,
  `ostatnia_modyfikacja` varchar(55) DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `komentarz` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id`, `data_utworzenia`, `data_edycji`, `ostatnia_modyfikacja`, `nazwa`, `status`, `komentarz`) VALUES
('K-000001', '2023-12-15 00:00:00', '2025-08-06 18:46:21', '::1', 'TechSolutions Sp. z o.o.', 'aktywny', 'Długoletni partner handlowy.'),
('K-000002', '2024-03-22 00:00:00', '2025-08-06 18:46:27', '::1', 'GreenBuild Polska', 'nieaktywny', 'Wstrzymana współpraca w 2024.'),
('K-000003', '2025-05-10 00:00:00', '2025-08-06 18:46:33', '::1', 'NovaTech Group', 'aktywny', 'Nowy klient z branży IT.'),
('K-000004', '2023-08-06 00:00:00', '2025-08-06 18:46:40', '::1', 'EcoTransport S.A.', 'aktywny', 'Zainteresowani współpracą międzynarodową.'),
('K-000005', '2024-11-30 00:00:00', '2025-08-06 18:46:45', '::1', 'MediCare Polska', 'nieaktywny', 'Brak kontaktu od 6 miesięcy.'),
('K-000006', '2025-01-17 00:00:00', '2025-08-06 18:46:08', '::1', 'Softline Solutions', 'aktywny', 'Zadowoleni z ostatniej dostawy.'),
('K-000007', '2024-07-09 00:00:00', '2025-08-06 18:46:51', '::1', 'QuickFix Serwis', 'aktywny', 'Polecony przez innego klienta.'),
('K-000008', '2024-04-25 00:00:00', '2025-08-06 18:46:03', '::1', 'FutureEnergy Group', 'nieaktywny', 'Zmienili dostawcę.'),
('K-000009', '2023-10-12 00:00:00', '2025-08-06 18:45:56', '::1', 'OptiTrade Sp. z o.o.', 'aktywny', 'Zwiększone zamówienia w 2025.'),
('K-000010', '2025-06-30 00:00:00', '2025-08-06 18:48:16', '::1', 'BrightVision Agency', 'aktywny', 'Świetna współpraca marketingowa.'),
('K-000011', '2024-01-20 00:00:00', '2025-08-06 18:42:00', '::1', 'NextGen Industries', 'nieaktywny', 'Zawieszeni z powodu restrukturyzacji.'),
('K-000012', '2025-03-04 00:00:00', '2025-08-06 18:57:03', '::1', 'Logix Systems', 'aktywny', 'Nowy projekt wdrożeniowy.'),
('K-000013', '2024-06-18 00:00:00', '2025-08-06 18:41:23', '::1', 'Zenith Consulting', 'aktywny', 'Bardzo pozytywne opinie od zespołu.'),
('K-000014', '2023-11-05 00:00:00', '2025-08-06 18:41:18', '::1', 'AutoPlus Serwis', 'nieaktywny', 'Opóźnienia w płatnościach.'),
('K-000015', '2025-02-27 00:00:00', '2025-08-06 19:00:52', '::1', 'AlphaDesign Studio', 'aktywny', 'Zlecenie na nowe logo i identyfikację wizualną.');

--
-- Wyzwalacze `klienci`
--
DELIMITER $$
CREATE TRIGGER `klienci_update` BEFORE UPDATE ON `klienci` FOR EACH ROW BEGIN
  IF NOT OLD.nazwa <=> NEW.nazwa THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('klienci', OLD.id, 'nazwa', OLD.nazwa, NEW.nazwa, NEW.ostatnia_modyfikacja);
  END IF;

  IF NOT OLD.status <=> NEW.status THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('klienci', OLD.id, 'status', OLD.status, NEW.status, NEW.ostatnia_modyfikacja);
  END IF;

  IF NOT OLD.komentarz <=> NEW.komentarz THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('klienci', OLD.id, 'komentarz', OLD.komentarz, NEW.komentarz, NEW.ostatnia_modyfikacja);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opiekunowie`
--

CREATE TABLE `opiekunowie` (
  `id` varchar(10) NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_edycji` datetime DEFAULT NULL,
  `ostatnia_modyfikacja` varchar(55) DEFAULT NULL,
  `nazwa` varchar(255) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `dodatkowe_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `opiekunowie`
--

INSERT INTO `opiekunowie` (`id`, `data_utworzenia`, `data_edycji`, `ostatnia_modyfikacja`, `nazwa`, `status`, `dodatkowe_info`) VALUES
('O-000001', '2024-02-14 00:00:00', NULL, '192.168.1.10', 'Anna Kowalska', 'aktywny', 'Specjalistka ds. klientów kluczowych.'),
('O-000002', '2025-06-01 00:00:00', NULL, '10.0.0.25', 'Marcin Nowak', 'aktywny', 'Obsługuje rynek niemiecki.'),
('O-000003', '2023-11-30 00:00:00', '2025-08-06 18:47:04', '::1', 'Karolina Wiśniewska', 'zawieszony', 'Na urlopie wychowawczym.'),
('O-000004', '2024-09-17 00:00:00', NULL, '192.168.0.77', 'Tomasz Zieliński', 'aktywny', 'Doświadczony opiekun B2B.'),
('O-000005', '2025-03-20 00:00:00', '2025-08-06 18:47:20', '::1', 'Magdalena Krawczyk', 'nieaktywny', 'Zakończyła współpracę w lipcu 2025.');

--
-- Wyzwalacze `opiekunowie`
--
DELIMITER $$
CREATE TRIGGER `opiekunowie_update` BEFORE UPDATE ON `opiekunowie` FOR EACH ROW BEGIN
  IF NOT OLD.nazwa <=> NEW.nazwa THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('opiekunowie', OLD.id, 'nazwa', OLD.nazwa, NEW.nazwa, NEW.ostatnia_modyfikacja);
  END IF;

  IF NOT OLD.status <=> NEW.status THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('opiekunowie', OLD.id, 'status', OLD.status, NEW.status, NEW.ostatnia_modyfikacja);
  END IF;

  IF NOT OLD.dodatkowe_info <=> NEW.dodatkowe_info THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('opiekunowie', OLD.id, 'dodatkowe_info', OLD.dodatkowe_info, NEW.dodatkowe_info, NEW.ostatnia_modyfikacja);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `relacje_opiekun_klient`
--

CREATE TABLE `relacje_opiekun_klient` (
  `id` varchar(25) NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_edycji` datetime DEFAULT NULL,
  `ostatnia_modyfikacja` varchar(55) DEFAULT NULL,
  `id_klient` varchar(10) NOT NULL,
  `id_opiekun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `relacje_opiekun_klient`
--

INSERT INTO `relacje_opiekun_klient` (`id`, `data_utworzenia`, `data_edycji`, `ostatnia_modyfikacja`, `id_klient`, `id_opiekun`) VALUES
('R-000003', '2025-08-06 18:41:18', '2025-08-06 18:41:18', '::1', 'K-000014', 'O-000001'),
('R-000004', '2025-08-06 18:41:23', '2025-08-06 18:41:23', '::1', 'K-000013', 'O-000004'),
('R-000007', '2025-08-06 18:42:00', '2025-08-06 18:42:00', '::1', 'K-000011', 'O-000001'),
('R-000008', '2025-08-06 18:42:00', '2025-08-06 18:42:00', '::1', 'K-000011', 'O-000002'),
('R-000009', '2025-08-06 18:42:00', '2025-08-06 18:42:00', '::1', 'K-000011', 'O-000003'),
('R-000010', '2025-08-06 18:42:00', '2025-08-06 18:42:00', '::1', 'K-000011', 'O-000004'),
('R-000016', '2025-08-06 18:45:56', '2025-08-06 18:45:56', '::1', 'K-000009', 'O-000001'),
('R-000017', '2025-08-06 18:45:56', '2025-08-06 18:45:56', '::1', 'K-000009', 'O-000003'),
('R-000018', '2025-08-06 18:45:56', '2025-08-06 18:45:56', '::1', 'K-000009', 'O-000004'),
('R-000019', '2025-08-06 18:46:03', '2025-08-06 18:46:03', '::1', 'K-000008', 'O-000004'),
('R-000020', '2025-08-06 18:46:03', '2025-08-06 18:46:03', '::1', 'K-000008', 'O-000005'),
('R-000021', '2025-08-06 18:46:08', '2025-08-06 18:46:08', '::1', 'K-000006', 'O-000004'),
('R-000022', '2025-08-06 18:46:21', '2025-08-06 18:46:21', '::1', 'K-000001', 'O-000001'),
('R-000023', '2025-08-06 18:46:21', '2025-08-06 18:46:21', '::1', 'K-000001', 'O-000002'),
('R-000024', '2025-08-06 18:46:27', '2025-08-06 18:46:27', '::1', 'K-000002', 'O-000002'),
('R-000025', '2025-08-06 18:46:33', '2025-08-06 18:46:33', '::1', 'K-000003', 'O-000004'),
('R-000026', '2025-08-06 18:46:40', '2025-08-06 18:46:40', '::1', 'K-000004', 'O-000001'),
('R-000027', '2025-08-06 18:46:40', '2025-08-06 18:46:40', '::1', 'K-000004', 'O-000005'),
('R-000028', '2025-08-06 18:46:45', '2025-08-06 18:46:45', '::1', 'K-000005', 'O-000003'),
('R-000029', '2025-08-06 18:46:51', '2025-08-06 18:46:51', '::1', 'K-000007', 'O-000004'),
('R-000030', '2025-08-06 18:48:16', '2025-08-06 18:48:16', '::1', 'K-000010', 'O-000001'),
('R-000031', '2025-08-06 18:48:16', '2025-08-06 18:48:16', '::1', 'K-000010', 'O-000002'),
('R-000032', '2025-08-06 18:48:16', '2025-08-06 18:48:16', '::1', 'K-000010', 'O-000004'),
('R-000033', '2025-08-06 18:57:03', '2025-08-06 18:57:03', '::1', 'K-000012', 'O-000002'),
('R-000034', '2025-08-06 18:57:03', '2025-08-06 18:57:03', '::1', 'K-000012', 'O-000004'),
('R-000036', '2025-08-06 19:00:52', '2025-08-06 19:00:52', '::1', 'K-000015', 'O-000001'),
('R-000037', '2025-08-06 19:00:52', '2025-08-06 19:00:52', '::1', 'K-000015', 'O-000002');

--
-- Wyzwalacze `relacje_opiekun_klient`
--
DELIMITER $$
CREATE TRIGGER `relacje_opiekun_klient_delete` AFTER DELETE ON `relacje_opiekun_klient` FOR EACH ROW BEGIN
  INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
  VALUES ('relacje_opiekun_klient', OLD.id, 'id_klient', OLD.id_klient, NULL, OLD.ostatnia_modyfikacja);

  INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
  VALUES ('relacje_opiekun_klient', OLD.id, 'id_opiekun', OLD.id_opiekun, NULL, OLD.ostatnia_modyfikacja);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `relacje_opiekun_klient_insert` AFTER INSERT ON `relacje_opiekun_klient` FOR EACH ROW BEGIN
  INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
  VALUES ('relacje_opiekun_klient', NEW.id, 'id_klient', NULL, NEW.id_klient, NEW.ostatnia_modyfikacja);

  INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
  VALUES ('relacje_opiekun_klient', NEW.id, 'id_opiekun', NULL, NEW.id_opiekun, NEW.ostatnia_modyfikacja);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `relacje_opiekun_klient_update` BEFORE UPDATE ON `relacje_opiekun_klient` FOR EACH ROW BEGIN
  IF NOT OLD.id_klient <=> NEW.id_klient THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('relacje_opiekun_klient', OLD.id, 'id_klient', OLD.id_klient, NEW.id_klient, NEW.ostatnia_modyfikacja);
  END IF;

  IF NOT OLD.id_opiekun <=> NEW.id_opiekun THEN
    INSERT INTO historia_zmian (tabela, rekord_id, pole, stara_wartosc, nowa_wartosc, ip)
    VALUES ('relacje_opiekun_klient', OLD.id, 'id_opiekun', OLD.id_opiekun, NEW.id_opiekun, NEW.ostatnia_modyfikacja);
  END IF;
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `historia_zmian`
--
ALTER TABLE `historia_zmian`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `id_generator`
--
ALTER TABLE `id_generator`
  ADD PRIMARY KEY (`typ`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `opiekunowie`
--
ALTER TABLE `opiekunowie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `relacje_opiekun_klient`
--
ALTER TABLE `relacje_opiekun_klient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klient` (`id_klient`),
  ADD KEY `id_opiekun` (`id_opiekun`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `historia_zmian`
--
ALTER TABLE `historia_zmian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `relacje_opiekun_klient`
--
ALTER TABLE `relacje_opiekun_klient`
  ADD CONSTRAINT `relacje_opiekun_klient_ibfk_1` FOREIGN KEY (`id_klient`) REFERENCES `klienci` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `relacje_opiekun_klient_ibfk_2` FOREIGN KEY (`id_opiekun`) REFERENCES `opiekunowie` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
