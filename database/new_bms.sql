-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 01:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bms_booking`
--

CREATE TABLE `bms_booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `bookingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bms_booking_seat`
--

CREATE TABLE `bms_booking_seat` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `route_id` int(100) NOT NULL,
  `book_date` date NOT NULL,
  `creat_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_booking_seat`
--

INSERT INTO `bms_booking_seat` (`id`, `bus_id`, `seat_id`, `route_id`, `book_date`, `creat_date`) VALUES
(1, 1, 1, 1, '2023-12-27', '0000-00-00 00:00:00.000000'),
(2, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:31.304380'),
(3, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:37.889565'),
(4, 1, 9, 1, '2023-12-27', '2023-12-25 13:26:39.991515'),
(5, 1, 2, 1, '2023-12-27', '2023-12-25 13:26:45.858215'),
(6, 1, 1, 1, '2024-01-03', '2024-01-03 06:09:22.108783'),
(7, 1, 2, 1, '2024-01-03', '2024-01-03 06:09:22.115145'),
(8, 1, 12, 1, '2024-01-03', '2024-01-03 06:14:17.781229'),
(9, 1, 18, 1, '2024-01-03', '2024-01-03 06:14:17.794084'),
(10, 1, 13, 1, '2024-01-03', '2024-01-03 06:29:40.961268'),
(11, 1, 4, 1, '2024-01-03', '2024-01-03 09:54:17.313026'),
(12, 1, 9, 1, '2024-01-03', '2024-01-03 09:54:17.324998'),
(13, 1, 14, 1, '2024-01-03', '2024-01-03 09:54:23.655853'),
(14, 1, 19, 1, '2024-01-03', '2024-01-03 09:54:23.664351'),
(15, 1, 5, 1, '2024-01-03', '2024-01-03 09:58:06.073187'),
(16, 1, 20, 1, '2024-01-03', '2024-01-03 09:58:10.679598');

-- --------------------------------------------------------

--
-- Table structure for table `bms_buses`
--

CREATE TABLE `bms_buses` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_buses`
--

INSERT INTO `bms_buses` (`bus_id`, `bus_name`) VALUES
(1, 'hp 72'),
(2, 'hp 80');

-- --------------------------------------------------------

--
-- Table structure for table `bms_route`
--

CREATE TABLE `bms_route` (
  `route_id` int(11) NOT NULL,
  `from_location` varchar(255) DEFAULT NULL,
  `to_location` varchar(255) DEFAULT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_route`
--

INSERT INTO `bms_route` (`route_id`, `from_location`, `to_location`, `price`) VALUES
(1, 'una', 'chandigarh', '210'),
(2, 'chandigarh', 'una', '210');

-- --------------------------------------------------------

--
-- Table structure for table `bms_sch`
--

CREATE TABLE `bms_sch` (
  `sch_id` int(11) NOT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `dep_time` time DEFAULT NULL,
  `arv_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_sch`
--

INSERT INTO `bms_sch` (`sch_id`, `bus_id`, `route_id`, `dep_time`, `arv_time`) VALUES
(1, 1, 1, '07:50:20', '10:50:20'),
(2, 2, 2, '08:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bms_seat`
--

CREATE TABLE `bms_seat` (
  `seat_id` int(11) NOT NULL,
  `seat_name` varchar(255) DEFAULT NULL,
  `bus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_seat`
--

INSERT INTO `bms_seat` (`seat_id`, `seat_name`, `bus_id`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'A3', 1),
(4, 'A4', 1),
(5, 'A5', 1),
(6, 'B1', 1),
(7, 'B2', 1),
(8, 'B3', 1),
(9, 'B4', 1),
(10, 'B5', 1),
(11, 'C1', 1),
(12, 'C2', 1),
(13, 'C3', 1),
(14, 'C4', 1),
(15, 'C5', 1),
(16, 'D1', 1),
(17, 'D2', 1),
(18, 'D3', 1),
(19, 'D4', 1),
(20, 'D5', 1),
(21, 'E1', 1),
(22, 'E2', 1),
(23, 'E3', 1),
(24, 'E4', 1),
(25, 'E5', 1),
(26, 'A1', 2),
(27, 'A2', 2),
(28, 'A3', 2),
(29, 'A4', 2),
(30, 'A5', 2),
(31, 'B1', 2),
(32, 'B2', 2),
(33, 'B3', 2),
(34, 'B4', 2),
(35, 'B5', 2),
(36, 'C1', 2),
(37, 'C2', 2),
(38, 'C3', 2),
(39, 'C4', 2),
(40, 'C5', 2),
(41, 'D1', 2),
(42, 'D2', 2),
(43, 'D3', 2),
(44, 'D4', 2),
(45, 'D5', 2),
(46, 'E1', 2),
(47, 'E2', 2),
(48, 'E3', 2),
(49, 'E4', 2),
(50, 'E5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bms_user`
--

CREATE TABLE `bms_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bms_user`
--

INSERT INTO `bms_user` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Sulabh Sharma', 'gfhgjh@gmail.com', '7599000074', '$2y$10$xRmx5NBZD2oxAYKGKrUr8ubeJklV77o4yIx0qe1YkqFluI.FdnlFy'),
(2, 'Sulabh Sharma', 's@gmail.com', '7599000074', '$2y$10$vgKkAtjHj8D6YFd5euLwOOlzUAiO3fTAwKa6lalFhvMd/loMk./vm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bms_booking`
--
ALTER TABLE `bms_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `bms_booking_seat`
--
ALTER TABLE `bms_booking_seat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `sdcefc_fk` (`route_id`);

--
-- Indexes for table `bms_buses`
--
ALTER TABLE `bms_buses`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bms_route`
--
ALTER TABLE `bms_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `bms_sch`
--
ALTER TABLE `bms_sch`
  ADD PRIMARY KEY (`sch_id`),
  ADD KEY `bus_id` (`bus_id`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `bms_seat`
--
ALTER TABLE `bms_seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `bms_user`
--
ALTER TABLE `bms_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bms_booking`
--
ALTER TABLE `bms_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bms_booking_seat`
--
ALTER TABLE `bms_booking_seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bms_buses`
--
ALTER TABLE `bms_buses`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bms_route`
--
ALTER TABLE `bms_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bms_sch`
--
ALTER TABLE `bms_sch`
  MODIFY `sch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bms_seat`
--
ALTER TABLE `bms_seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bms_user`
--
ALTER TABLE `bms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bms_booking`
--
ALTER TABLE `bms_booking`
  ADD CONSTRAINT `bms_booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bms_user` (`id`),
  ADD CONSTRAINT `bms_booking_ibfk_2` FOREIGN KEY (`bus_id`) REFERENCES `bms_buses` (`bus_id`),
  ADD CONSTRAINT `bms_booking_ibfk_3` FOREIGN KEY (`route_id`) REFERENCES `bms_route` (`route_id`),
  ADD CONSTRAINT `bms_booking_ibfk_4` FOREIGN KEY (`seat_id`) REFERENCES `bms_seat` (`seat_id`);

--
-- Constraints for table `bms_booking_seat`
--
ALTER TABLE `bms_booking_seat`
  ADD CONSTRAINT `bms_booking_seat_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bms_buses` (`bus_id`),
  ADD CONSTRAINT `bms_booking_seat_ibfk_2` FOREIGN KEY (`seat_id`) REFERENCES `bms_seat` (`seat_id`),
  ADD CONSTRAINT `sdcefc_fk` FOREIGN KEY (`route_id`) REFERENCES `bms_route` (`route_id`);

--
-- Constraints for table `bms_sch`
--
ALTER TABLE `bms_sch`
  ADD CONSTRAINT `bms_sch_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bms_buses` (`bus_id`),
  ADD CONSTRAINT `bms_sch_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `bms_route` (`route_id`);

--
-- Constraints for table `bms_seat`
--
ALTER TABLE `bms_seat`
  ADD CONSTRAINT `bms_seat_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bms_buses` (`bus_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
