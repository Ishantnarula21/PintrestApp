-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 11:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pintrestapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `eid`, `title`, `imagename`, `visibility`, `username`, `date`, `time`, `views`) VALUES
(7, 20, 'Nature', '20.jpg', 'public', 'jagdeep', '11 / 09 / 2022', ' 18:33', 0),
(8, 19, 'Nature', '19.jpg', 'public', 'ishant', '11 / 09 / 2022', ' 18:12', 0),
(9, 20, 'Nature', '20.jpg', 'public', 'ishant', '11 / 09 / 2022', ' 18:33', 0),
(10, 18, 'Nature', '18.jpg', 'public', 'palak', '11 / 09 / 2022', '8:51', 0),
(11, 19, 'Nature', '19.jpg', 'public', 'palak', '11 / 09 / 2022', ' 18:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `fullname` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`fullname`, `id`, `username`, `email`, `password`, `gender`) VALUES
('Ishant Narula', 1, 'ishant', 'ishant@gmail.com', 'admin', 'male'),
('jagdeep singh', 17, 'jagdeep', 'jagdeep@gmail.com', 'admin', 'male'),
('Palak Taak', 18, 'palak', 'palak@gmail.com', 'admin', 'Female ');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `title`, `imagename`, `visibility`, `username`, `date`, `time`, `views`, `day`) VALUES
(18, 'Nature', '18.jpg', 'public', 'ishant', '11 / 09 / 2022', '8:51', 0, 'am'),
(19, 'Nature', '19.jpg', 'public', 'ishant', '11 / 09 / 2022', ' 18:12', 0, 'pm'),
(20, 'Nature', '20.jpg', 'public', 'ishant', '11 / 09 / 2022', ' 18:33', 0, 'pm'),
(21, 'Ishant', '21.png', 'private ', 'ishant', '11 / 09 / 2022', ' 18:34', 0, 'pm'),
(22, 'Nature', '22.jpg', 'public', 'jagdeep', '11 / 09 / 2022', ' 22:33', 0, 'pm'),
(23, 'Nature', '23.jpg', 'private ', 'jagdeep', '11 / 09 / 2022', ' 22:33', 0, 'pm'),
(25, 'Nature edited', '25.jpg', 'public', 'palak', '11 / 09 / 2022', ' 2:17', 0, 'am'),
(27, 'Nature', '27.jpg', 'public', 'palak', '11 / 09 / 2022', ' 2:25', 0, 'am'),
(28, 'Nature', '28.jpg', 'public', 'palak', '11 / 09 / 2022', ' 2:29', 0, ' am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
