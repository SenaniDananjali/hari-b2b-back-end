-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2018 at 10:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairb2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `busyDates`
--

CREATE TABLE `busyDates` (
  `id` int(10) NOT NULL,
  `stylist_id` int(10) NOT NULL,
  `time_slot_id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busyDates`
--

INSERT INTO `busyDates` (`id`, `stylist_id`, `time_slot_id`, `type`, `date`) VALUES
(1, 1, 1, 'MARKED_AS_BUSY', '2018-01-10'),
(2, 2, 2, 'MARKED_AS_BUSY', '2018-01-11'),
(3, 1, 2, 'MARKED_AS_BUSY', '2018-01-10'),
(4, 3, 2, 'MARKED_AS_BUSY', '2018-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `image_path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `profile_id`, `image_path`) VALUES
(1, 1, '../gallery/1/profile/sty_prof.jpg'),
(2, 2, '../gallery/2/profile/sty_prof.jpg'),
(3, 3, '../gallery/3/profile/sty_prof.jpg'),
(4, 4, '../gallery/4/profile/sty_prof.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `parent_id`, `description`) VALUES
(1, 1, 'Perm'),
(2, 1, 'Full Hair Colour'),
(3, 1, 'Men Hair Cutting'),
(4, 1, 'Hair Relaxing'),
(5, 1, 'Women Long Hair Cut'),
(6, 1, 'Women Short Hair Cut'),
(7, 1, 'Bridel');

-- --------------------------------------------------------

--
-- Table structure for table `stylist`
--

CREATE TABLE `stylist` (
  `id` int(10) NOT NULL,
  `job_role` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stylist`
--

INSERT INTO `stylist` (`id`, `job_role`, `first_name`, `last_name`, `description`) VALUES
(1, 1, 'Emma', 'Olivia', 'We were all very young and were just doing what we loved.'),
(2, 1, 'Sophia', 'Isabella', 'We were all very young and were just doing what we loved.'),
(3, 1, 'Jacob', 'William', 'We were just working and doing what we loved '),
(4, 2, 'James', 'Alexander', 'Famous for styling the tresses of Kate Moss, Sienna Miller and Emma Watson\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `stylistSkillMapping`
--

CREATE TABLE `stylistSkillMapping` (
  `stylist_id` int(10) NOT NULL,
  `skill_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stylistSkillMapping`
--

INSERT INTO `stylistSkillMapping` (`stylist_id`, `skill_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 7),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `timeSlot`
--

CREATE TABLE `timeSlot` (
  `id` int(10) NOT NULL,
  `slot` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeSlot`
--

INSERT INTO `timeSlot` (`id`, `slot`) VALUES
(1, '8AM - 12PM'),
(2, '1PM  - 5PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busyDates`
--
ALTER TABLE `busyDates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stylist`
--
ALTER TABLE `stylist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeSlot`
--
ALTER TABLE `timeSlot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busyDates`
--
ALTER TABLE `busyDates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stylist`
--
ALTER TABLE `stylist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timeSlot`
--
ALTER TABLE `timeSlot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
