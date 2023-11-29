-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2023 at 04:23 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `banned`
--

CREATE TABLE `banned` (
  `id` int(7) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(7) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `caption` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `userid`, `caption`) VALUES
(1, 'nature.avif', 1, 'Welcome to the image board, I hope that all of the user will post some great images for us to see'),
(2, 'chicken advertisment.webp', 2, 'Looking for some expertly made chicken crafted with love. Head on down to Los Pollos Hermanos now.'),
(3, 'JohnBiden.jpg', 3, 'Drive byin with biden'),
(4, 'Brezhnev.jpg', 4, 'Get a load of this Brezhnev guys eyebrows, like a jungle on his forehead lol'),
(5, 'jessisHUH.png', 5, 'Can anyone here translate junkie? I have no idea what this guy is trying to say'),
(6, 'Mike.jpeg', 6, 'Waltuah, hes asking you if you understand how this buisness works waltuh'),
(7, 'nature2.jpg', 1, 'YOU GUYS ARE USING THE BOARD WRONG, youre supposed to upload cool images like this, not random selfies'),
(8, 'saul.avif', 7, 'As a certified attorney, I can you guys the admin has no legal right to tell us how to use this image board'),
(9, 'Sadbama.jpg', 8, 'uhhh, my fellow americans, I dont think I have many it is what it is left in me'),
(10, 'Gigahoward.webp', 9, 'As a more experienced lawyer, dont listen to saul, he doesnt know what hes talking about'),
(11, 'saxBill.webp', 10, 'Anyone wanna see an epic sax solo?'),
(12, 'walter.jpg', 5, 'Just watched hank die :<'),
(13, 'chuckStare.jpg', 11, 'I hate technology, I dont even know why im here'),
(14, 'TrumpPizza.webp', 12, 'Just got an incredible slice from PATRIOT HUT, best pizza ive ever had, really'),
(15, 'bama.jpg', 8, 'Hes uhhhh... Hes literally me'),
(16, 'Major.jpg', 3, 'Just saw major bit another secret service agent, way to go champ'),
(17, 'bushGolf.webp', 13, 'Just got an insane hole in one #wemuststoptheterror'),
(18, 'uhGuys.avif', 9, 'uhh, guys... hes right behind me, isnt he?'),
(19, 'banana.webp', 14, 'Hey is this the board that lets us upload whatever we want?');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(7) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `password`) VALUES
(1, 'Admin', '$2y$10$g4RjeeTOb.EmdU/.CrdBXOMoLSwsOIcHnGKOdGrq/x4X4EwdQN9lC'),
(2, 'GustavoF', '$2y$10$LXEQq3hJ.h6gqWE5wzfEguov4bhCIOvsSpOeIzUTZNVe9FfF/voJa'),
(3, 'Joe_Biden', '$2y$10$lDzbz5T9EbiFYB7TtgRioOu.AgICyuNTnxu82rV7VuNfyg7rFMAjm'),
(4, 'JimmyC', '$2y$10$YtZozo8tS2tFwhVdefGrrOFoRtSgXYNW7EPWYCSJmxOjWfFVLlTwW'),
(5, 'WalterBreakingBad', '$2y$10$5w3JUJJcqf/KJjL0lukdv.N4/XyVl7gsOA3N4OCL0FTxVFxChPUGy'),
(6, 'Mike', '$2y$10$XC5dLlmIHMj5hlcOx82lBuHtd9CN7SLoOvzW6DUuLByAVriBkGrdq'),
(7, 'SaulGoodLawyer', '$2y$10$78M8k.BwOX7fEP0F.eZNlO7SJVwKbacFIT/O.xBYlxc04W1I7X7RK'),
(8, 'DownBadObama', '$2y$10$RQTsnZZOLRVHxp9MC363uOBn9WRvzlZrKRjy7XMigX0QOdEEv7o2W'),
(9, 'HowardLawman', '$2y$10$ukrW3ajFI6wo6fLE/K/hieDtzL0REroFTYNn6cp.mSHnJdMICXWra'),
(10, 'BillClinton', '$2y$10$76KOceljwS8Id5DwjNowh.80FQXgoo1UXuoUw79uwNQHr4q2cFVNa'),
(11, 'ChuckMcgill', '$2y$10$QQBHfSwJYpKlBgxrkybfhu7kN8oHdz.Yu80OG98.0ywOjCwMPx.1q'),
(12, 'BigDon', '$2y$10$jpaiau6B/7I/KZ3iM/5.ouRUV7bGZygPai1AZDDfXj/Mw1wu.Hdjq'),
(13, 'GeorgieW', '$2y$10$IqB2fSetjT3ArY3PIq7fXeS28EWJFwa44PuNgU.5D/DD.wgRIj6pa'),
(14, 'JohnRandom', '$2y$10$RvmDuioEQ/jlnSNw8dBhluYITe6kH9JmH9SQ3vc5jHEaEp/AbrIri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `registration` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
