-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2018 at 12:49 PM
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
(4, 3, 2, 'MARKED_AS_BUSY', '2018-01-13'),
(5, 2, 1, 'MARKED_AS_BUSY', '2018-01-17'),
(6, 2, 2, 'MARKED_AS_BUSY', '2018-01-17'),
(7, 3, 1, 'MARKED_AS_BUSY', '2018-01-12'),
(8, 2, 1, 'MARKED_AS_BUSY', '2018-01-12'),
(9, 3, 1, 'MARKED_AS_BUSY', '2018-01-14'),
(10, 3, 2, 'MARKED_AS_BUSY', '2018-01-15'),
(11, 4, 1, 'MARKED_AS_BUSY', '2018-01-11'),
(12, 4, 2, 'MARKED_AS_BUSY', '2018-01-11'),
(13, 1, 1, 'MARKED_AS_BUSY', '2018-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `chargePerSlot`
--

CREATE TABLE `chargePerSlot` (
  `id` int(10) NOT NULL,
  `stylist_id` int(10) NOT NULL,
  `time_slot_id` int(10) NOT NULL,
  `charge` float(5,2) NOT NULL,
  `currency` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chargePerSlot`
--

INSERT INTO `chargePerSlot` (`id`, `stylist_id`, `time_slot_id`, `charge`, `currency`) VALUES
(1, 1, 1, 250.00, 'AUD'),
(2, 1, 2, 300.00, 'AUD'),
(3, 2, 1, 250.00, 'AUD'),
(4, 2, 2, 300.00, 'AUD'),
(5, 3, 1, 150.00, 'AUD'),
(6, 3, 2, 150.00, 'AUD'),
(7, 4, 1, 400.00, 'AUD'),
(8, 4, 2, 450.00, 'AUD');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `gallery_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `profile_id`, `image_path`, `gallery_path`) VALUES
(1, 1, '../gallery/1/profile/sty_prof.jpg', '../gallery/1/profile/'),
(2, 2, '../gallery/2/profile/sty_prof.jpg', '../gallery/2/profile/'),
(3, 3, '../gallery/3/profile/sty_prof.jpg', '../gallery/3/profile/'),
(4, 4, '../gallery/4/profile/sty_prof.jpg', '../gallery/4/profile/');

-- --------------------------------------------------------

--
-- Table structure for table `jobRole`
--

CREATE TABLE `jobRole` (
  `id` int(10) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobRole`
--

INSERT INTO `jobRole` (`id`, `role`) VALUES
(1, 'Hair Stylist'),
(2, 'Educator');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `city`, `state`) VALUES
(1, 'Sydney', ''),
(2, 'Perth', ''),
(3, 'Kingston', ''),
(4, 'Melbourne', ''),
(5, 'canberra', ''),
(6, 'Newcastle', '');

-- --------------------------------------------------------

--
-- Table structure for table `preferredLocations`
--

CREATE TABLE `preferredLocations` (
  `stylist_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `preferredLocations`
--

INSERT INTO `preferredLocations` (`stylist_id`, `location_id`) VALUES
(1, 1),
(1, 5),
(2, 2),
(2, 3),
(3, 3),
(4, 4),
(4, 6);

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
(2, 1, 'Emma', 'Isabella', 'We were all very young and were just doing what we loved.'),
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
(4, 6),
(2, 3);

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
(2, '1PM - 5PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busyDates`
--
ALTER TABLE `busyDates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chargePerSlot`
--
ALTER TABLE `chargePerSlot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobRole`
--
ALTER TABLE `jobRole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preferredLocations`
--
ALTER TABLE `preferredLocations`
  ADD PRIMARY KEY (`stylist_id`,`location_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chargePerSlot`
--
ALTER TABLE `chargePerSlot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobRole`
--
ALTER TABLE `jobRole`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
