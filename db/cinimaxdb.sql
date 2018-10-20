-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2018 at 04:27 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinimaxdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `compaint`
--

CREATE TABLE `compaint` (
  `c_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `com` longtext COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `director` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `producer` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `production` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `casting` longtext COLLATE utf16_unicode_ci NOT NULL,
  `poster` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `releasedate` date NOT NULL,
  `des` longtext COLLATE utf16_unicode_ci NOT NULL,
  `lan` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `director`, `producer`, `production`, `casting`, `poster`, `releasedate`, `des`, `lan`) VALUES
(1, 'Ranam', 'Nirmal Sahadev', 'Anand Payyanur', '', 'Prithviraj Sukumaran, \r\nIsha Talwar, \r\nRahman, \r\nMathew Arun\r\n', 'Ranam.jpg', '2018-04-27', 'Detroit Crossing aka Ranam, which is said to be a dark, intense crime drama, will be completely shoot at the various locations of the USA.... ', 'Malayalam'),
(2, '102 Not Out', 'Umesh Shukla', 'Bhushan Kumar', 'Sony Pictures', 'Amitabh Bachchan,\r\nRishi Kapoor,\r\nJimit Trivedi', '102 Not Out.jpg', '2018-05-04', 'Based on a Gujarati play, the film highlights an unusual relationship between a 75-year-old son and his 102-year-old father, who aspires to break the record for the longest living man, held by a Chinese man.', 'Hindi'),
(3, 'Sudani from Nigeria', 'Zakariya Mohammed', 'Sameer Thahir', 'Happy Hours ', 'Soubin Shahir,\r\nSamuel Abiola Robinson', 'Sudani from Nigeria.jpg', '2018-03-23', 'The movie is set in a rural town in Kerala. Majeed is an unmarried young man who is rejected due to of his lack of a well paying and constant job. Majeed, like many people in his town, has an enormous passion for football and is even a manager of a local team, named \'MYC Accode\', which participates in Sevens matches. He manages to recruit three Nigerian talented players to his team, who catapults the team\'s talent and fame. Although successful in matches, Majeed, his friends and players are financially set-back.', 'Malayalam'),
(4, 'Swathanthriyam ArdhaRathriyil', 'Tinu Pappachan', 'BC Joshy', '', 'Antony Varghese,\r\nChemban Vinod,\r\nVinayakan', 'Swathanthriyam ArdhaRathriyil.jpg', '2018-03-31', 'Jacob, a manager at a big financial firm, finds himself behind bars when he tries to save the woman he loves from being involved in a criminal case. The only way for him to survive and to escape was to break out of prison. How he plans and executes the prison break forms the crux of the movie. ', 'Malayalam'),
(5, 'Kuttanpillayude Sivarathri', 'Jean Markose', 'Raji Nandakumar', 'Alanghat Productions', 'Suraj Venjaramoodu,\r\nMithun Ramesh,\r\nBiju Sopanam,\r\nSrinda Arhaan', 'Kuttanpillayude Sivarathri.jpg', '2018-05-04', 'Plachottil Kuttan Pillai is an honorable police man. He lives a contented life with his wife, Sub-Inspector Shakunthala. They have three children, all married and settled. An army of his relatives - his children, their spouses and extended family - converge at his humble home to attend the annual Shiva Rathri festival attached to the famous Shiva Temple in the neighborhood. The festive mood sets in, blowing off Pillai’s meager domestic budget. He isn’t happy; and he does not hide his discontent. There begins the story of Kuttanpillayude Sivarathri.', 'Malayalam'),
(6, 'Avengers: Infinity War', 'Anthony Russo, Joe Russo', 'Kevin Feige', 'Marvel Studios', 'Robert Downey Jr,\r\nChris Hemsworth,\r\nMark Ruffalo,\r\nChris Evans,\r\nScarlett Johansson,\r\nBenedict Cumberbatch,\r\nDon Cheadle,\r\nTom Holland', 'Infinity War.jpg', '2018-04-27', 'Two years after the Avengers were torn apart during the events of Captain America: Civil War, Thanos arrives on Earth to collect the Infinity Stones for a gauntlet that will allow him to bend reality to his will. The Avengers must join forces with the Guardians of the Galaxy to stop him before his onslaught of destruction puts an end to half the universe', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `logintb`
--

CREATE TABLE `logintb` (
  `loginid` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `passwrd` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf16_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(30) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `logintb`
--

INSERT INTO `logintb` (`loginid`, `username`, `passwrd`, `type`, `email`) VALUES
(111, 'admin', 'admin', 'admin', 'admin@gmail.com'),
(112, 'ramz', 'qwerty', 'user', 'rameesc1@gmai.com'),
(113, 'sayooj', '12345', 'user', 'anjumolthomas554@gmail.com'),
(114, 'jaison', '12345', 'user', 'jaisonthomas001@gmail.com'),
(115, 'aleeesha', '12345', 'user', 'aleesha@gmail.com'),
(116, 'nidhin', '12345', 'user', 'nidhinkjames@gmail.com'),
(117, 'agnes', 'kurian', 'user', 'agneskurian102@gmail.com'),
(118, 'shilpa', 'joy', 'user', 'shilpakjoy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `regtb`
--

CREATE TABLE `regtb` (
  `fname` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `lname` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `passwrd` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf16_unicode_ci NOT NULL,
  `phnno` bigint(11) NOT NULL,
  `image` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `regtb`
--

INSERT INTO `regtb` (`fname`, `lname`, `dob`, `age`, `email`, `username`, `passwrd`, `gender`, `phnno`, `image`) VALUES
('admin', 'admin', '2018-04-08', 0, 'admin@gmail.com', 'admin', 'admin', 'Male', 9999999999, 'admin.jpg'),
('Agneskurian', 'Kurian', '1980-01-01', 22, 'agneskurian102@gmail.com', 'agnes', 'kurian', 'male', 7856435678, 'agnes.jpg'),
('Aleesha', 'Kurian', '1980-01-01', 0, 'aleesha@gmail.com', 'aleeesha', '12345', 'Male', 7890765667, 'aleeesha.JPG'),
('Jaison', 'Thomas', '1980-01-01', 0, 'jaisonthomas001@gmail.com', 'jaison', '12345', 'Male', 7123456666, 'jaison.jpg'),
('Nidhin', 'James', '1980-01-01', 0, 'nidhinkjames@gmail.com', 'nidhin', '12345', 'Male', 7895645454, 'nidhin.jpg'),
('Ramees', 'Kasim', '1980-01-01', 0, 'rameesc1@gmai.com', 'ramz', 'qwerty', 'Male', 8086047026, 'ramz.JPG'),
('Sayooj', 'P', '1996-01-01', 0, 'anjumolthomas554@gmail.com', 'sayooj', '12345', 'Male', 7856435678, 'sayooj.jpg'),
('Shilpa k', 'Joy', '1996-05-05', 24, 'shilpakjoy@gmail.com', 'shilpa', 'joy', 'male', 7856435678, 'shilpa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `r_id` int(11) NOT NULL,
  `fname` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `phnno` bigint(20) NOT NULL,
  `m_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `seat_type` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `no_of_tickets` int(11) NOT NULL,
  `show_time` time NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `st_id` int(11) NOT NULL,
  `s_type` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `max_seat` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`st_id`, `s_type`, `max_seat`, `price`) VALUES
(1, 'Balcony', 20, 150),
(2, 'General', 130, 100);

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `sh_id` int(11) NOT NULL,
  `show_name` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `show_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`sh_id`, `show_name`, `show_time`) VALUES
(1, 'Mornig Show', '07:00:00'),
(13, 'Noon Show', '13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `show_details`
--

CREATE TABLE `show_details` (
  `shd_id` int(11) NOT NULL,
  `sh_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `booked_btickets` int(11) NOT NULL,
  `booked_gtickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `show_details`
--

INSERT INTO `show_details` (`shd_id`, `sh_id`, `movie_id`, `booked_btickets`, `booked_gtickets`) VALUES
(5, 1, 1, 0, 0),
(9, 13, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stills`
--

CREATE TABLE `stills` (
  `m_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `image1` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `image2` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `image3` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `image4` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `image5` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `image6` varchar(20) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `stills`
--

INSERT INTO `stills` (`m_name`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`) VALUES
('Kuttanpillayude Sivarathri', 'Kuttanpillayude1.jpg', 'Kuttanpillayude2.jpg', 'Kuttanpillayude3.jpg', 'Kuttanpillayude4.jpg', 'Kuttanpillayude5.jpg', 'Kuttanpillayude6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compaint`
--
ALTER TABLE `compaint`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `logintb`
--
ALTER TABLE `logintb`
  ADD PRIMARY KEY (`loginid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `regtb`
--
ALTER TABLE `regtb`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `m_name` (`m_name`),
  ADD KEY `seat_type` (`seat_type`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`st_id`),
  ADD UNIQUE KEY `s_type` (`s_type`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`sh_id`);

--
-- Indexes for table `show_details`
--
ALTER TABLE `show_details`
  ADD PRIMARY KEY (`shd_id`),
  ADD UNIQUE KEY `sh_id` (`sh_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `stills`
--
ALTER TABLE `stills`
  ADD UNIQUE KEY `m_name` (`m_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compaint`
--
ALTER TABLE `compaint`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logintb`
--
ALTER TABLE `logintb`
  MODIFY `loginid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `show_details`
--
ALTER TABLE `show_details`
  MODIFY `shd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logintb`
--
ALTER TABLE `logintb`
  ADD CONSTRAINT `logintb_ibfk_1` FOREIGN KEY (`email`) REFERENCES `regtb` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `logintb_ibfk_2` FOREIGN KEY (`username`) REFERENCES `regtb` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`m_name`) REFERENCES `films` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`seat_type`) REFERENCES `seat` (`s_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `show_details`
--
ALTER TABLE `show_details`
  ADD CONSTRAINT `show_details_ibfk_1` FOREIGN KEY (`sh_id`) REFERENCES `showtime` (`Sh_id`),
  ADD CONSTRAINT `show_details_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `films` (`id`);

--
-- Constraints for table `stills`
--
ALTER TABLE `stills`
  ADD CONSTRAINT `stills_ibfk_1` FOREIGN KEY (`m_name`) REFERENCES `films` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
