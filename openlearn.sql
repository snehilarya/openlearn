-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 09, 2017 at 08:03 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openlearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(60) NOT NULL,
  `course_category` varchar(70) NOT NULL,
  `course_info` varchar(300) NOT NULL,
  `instructor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Course Info is stored here';

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `course_id` varchar(255) NOT NULL,
  `video_title` varchar(50) NOT NULL,
  `video_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `name` varchar(50) NOT NULL,
  `id` varchar(400) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `picture` varchar(400) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` varchar(20) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_email` varchar(70) NOT NULL,
  `student_message` varchar(400) NOT NULL,
  `message_date` datetime NOT NULL,
  `instructor_id` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `Unique` (`course_name`),
  ADD KEY `FK_COURSE_INS` (`instructor_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD KEY `FK` (`course_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `FK_MESSAGE` (`instructor_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_COURSE_INS` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`);

--
-- Constraints for table `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `FK` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `FK_MESSAGE` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
