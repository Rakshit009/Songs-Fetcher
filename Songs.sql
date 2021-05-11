-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2021 at 11:38 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Songs`
--

-- --------------------------------------------------------

--
-- Table structure for table `Album`
--

CREATE TABLE `Album` (
  `album_id` int(255) NOT NULL,
  `album_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Album`
--

INSERT INTO `Album` (`album_id`, `album_name`) VALUES
(1, 'After Hours'),
(2, 'Day Time Hours'),
(3, 'Positions'),
(4, 'lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `Artist`
--

CREATE TABLE `Artist` (
  `artist_id` int(255) NOT NULL,
  `artist_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Artist`
--

INSERT INTO `Artist` (`artist_id`, `artist_name`) VALUES
(3, 'ariana grande'),
(4, 'Jason Derulo'),
(8, 'The Weeknd'),
(12, 'bts');

-- --------------------------------------------------------

--
-- Table structure for table `Song`
--

CREATE TABLE `Song` (
  `song_name` varchar(255) NOT NULL,
  `artist_id` int(255) NOT NULL,
  `album_id` int(255) NOT NULL,
  `release_year` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Song`
--

INSERT INTO `Song` (`song_name`, `artist_id`, `album_id`, `release_year`, `Duration`) VALUES
('34+35', 3, 3, '2020', '300'),
('blinding lights', 8, 1, '2014', '180'),
('dynamite', 12, 2, '2014', '250'),
('lifestyle', 4, 4, '2014', '200'),
('lonely', 12, 2, '2014', '200'),
('positions', 3, 3, '2020', '300'),
('save your tears', 8, 1, '2014', '189');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `Song`
--
ALTER TABLE `Song`
  ADD PRIMARY KEY (`song_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Album`
--
ALTER TABLE `Album`
  MODIFY `album_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Artist`
--
ALTER TABLE `Artist`
  MODIFY `artist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
