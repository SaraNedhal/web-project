-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 05:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comID` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `uId` int(11) NOT NULL,
  `mId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comID`, `text`, `uId`, `mId`, `username`) VALUES
(1, 'niceee', 4, 1, 'osama123'),
(2, 'love it', 4, 1, 'osama123');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Language` varchar(50) NOT NULL,
  `Duration` varchar(20) NOT NULL,
  `Rate` int(11) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `TicketPrice` decimal(10,0) NOT NULL,
  `NOSeats` int(11) NOT NULL,
  `Date` date NOT NULL,
  `poster` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`ID`, `Name`, `Language`, `Duration`, `Rate`, `Genre`, `status`, `TicketPrice`, `NOSeats`, `Date`, `poster`, `details`) VALUES
(1, 'Spiderman, No Way Home', 'English', '2h 10m', 9, 'Action', 'Showing', '10', 100, '2021-12-29', 'spiderman.jpg', 'The movie is around Peter Parker who struggles to confront the world when everyone is aware of his identity.'),
(2, 'Uncharted', 'English', '1h 43m', 9, 'Action', 'Showing', '12', 100, '2022-12-29', 'uncharted.png', 'Street-smart Nathan Drake is recruited by seasoned treasure hunter Victor \"Sully\" Sullivan to recover a fortune amassed by Ferdinand Magellan, and lost 500 years ago by the House of Moncada.'),
(3, 'Ambulance', 'English', '1h 40m', 7, 'Action', 'Showing', '7', 100, '2022-01-05', 'ambulance.png', 'Two robbers steal an ambulance after their heist goes away.'),
(4, 'Turning Red', 'English', '1h 50m', 9, 'Animation', 'Showing', '12', 100, '2022-12-10', 'red.webp', 'A 13-year-old girl named Meilin turns into a giant red panda whenever she gets too excited.'),
(5, 'Morbius', 'English', '2h 06m ', 6, 'Fantasy', 'Upcoming', '12', 120, '2022-05-05', 'morbius.png', 'Biochemist Michael Morbius tries to cure himself of a rare blood disease, but he inadvertently infects himself with a form of vampirism instead.'),
(6, 'Shattered', 'English', '1h 45m', 5, 'Drama', 'Upcoming', '9', 120, '2022-06-05', 'shattered.jpg', 'A rich divorcee Chris falls in love with a mysterious woman Sky where Chris, ex-wife and his child eventually gets trapped and a desperate fight for survival will most likely ensue.'),
(7, 'pursuit', 'English', '1h 45m', 6, 'Mystery', 'Upcoming', '11', 120, '2022-11-05', 'pursuit.png', 'Detective Breslin crosses paths with Calloway, a ruthless hacker who is trying to save his kidnapped wife from a drug cartel.'),
(8, 'The Wolf and the Lion', 'English', '1h 43m', 6, 'Family', 'Upcoming', '8', 120, '2022-05-18', 'wolf.png', 'A wolf pup and a lost lion cub are rescued by a girl in the heart of the Canadian wilderness. Their friendship will change their lives forever.'),
(9, 'Maali Mama', 'Arabic', '2h 40m', 0, 'Family', 'Upcoming', '5', 100, '2022-05-12', 'maali.jpg', 'movie about '),
(14, 'Batman', 'English', '2h 40m', 0, 'Family', 'Upcoming', '5', 100, '2022-05-12', 'maali.jpg', 'movie about ');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `userID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatID` int(11) NOT NULL,
  `uId` int(11) NOT NULL,
  `mId` int(11) NOT NULL,
  `showDate` date NOT NULL,
  `showTime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatID`, `uId`, `mId`, `showDate`, `showTime`) VALUES
(1, 4, 3, '2022-06-05', '19:45'),
(2, 4, 1, '2022-06-05', '16:25'),
(3, 4, 6, '2022-11-11', '20:25');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE `timings` (
  `movieID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`movieID`, `date`, `time`) VALUES
(1, '2022-05-05', '14:25'),
(1, '2022-06-05', '16:25'),
(2, '2021-11-11', '16:30'),
(2, '2021-12-11', '18:25'),
(3, '2022-06-05', '19:45'),
(4, '2022-06-05', '16:25'),
(5, '2022-06-05', '16:30'),
(6, '2022-07-05', '18:35'),
(6, '2022-11-11', '20:25');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `statusR` varchar(20) NOT NULL,
  `dateR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`id`, `userid`, `statusR`, `dateR`) VALUES
(13, 6, 'unprocessed', '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(50) NOT NULL,
  `TelNum` varchar(15) DEFAULT NULL,
  `Balance` decimal(6,2) DEFAULT NULL,
  `profilePic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FName`, `LName`, `UserName`, `role`, `Password`, `Gender`, `DOB`, `Email`, `TelNum`, `Balance`, `profilePic`) VALUES
(4, 'Osama', 'Ahmed', 'osama123', 'User', '$2y$10$8XVTMkfTfBmdvoQHFlc78eFFA9sZC7tKcx4.Q9lwUhX8zt5ht3bOa', 'M', '2001-05-05', 'osama123@gmail.com', '33333333', '43.00', 'no-picture.jpg'),
(6, 'Amira', 'Hussain', 'amira123', 'Admin', '$2y$10$.ZRpcU2xd51iaFetMhvQw.jOWIv5RhdKyKQwW7PCs/fnicP.B2//S', 'F', '2000-05-06', 'amira123@gmail.com', '33333333', '90.00', 'top3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comID`),
  ADD KEY `mId` (`mId`),
  ADD KEY `uId` (`uId`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatID`),
  ADD KEY `mId` (`mId`),
  ADD KEY `uId` (`uId`);

--
-- Indexes for table `timings`
--
ALTER TABLE `timings`
  ADD PRIMARY KEY (`movieID`,`date`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topup_ibfk_1` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `SeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`mId`) REFERENCES `movie` (`ID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`uId`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`ID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`mId`) REFERENCES `movie` (`ID`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`uId`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_ibfk_1` FOREIGN KEY (`movieID`) REFERENCES `movie` (`ID`);

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
