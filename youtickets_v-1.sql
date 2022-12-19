-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2022 at 09:58 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id_match` int(11) NOT NULL,
  `id_team1` int(11) NOT NULL,
  `id_team2` int(11) NOT NULL,
  `id_stade` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `id_status` int(11) NOT NULL,
  `picture` text,
  `price` double NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id_match`, `id_team1`, `id_team2`, `id_stade`, `time`, `id_status`, `picture`, `price`, `capacity`, `description`) VALUES
(9, 2, 1, 3, '1979-06-28 00:08:00', 3, '../assets/img/uploads/1312221670956701.png', 427, 40000000, 'Et ut beatae hic fug'),
(12, 1, 1, 2, '1979-11-28 03:43:00', 2, '../assets/img/uploads/1312221670960979.jpg', 431, 81, 'Perferendis eum moll'),
(13, 8, 9, 3, '2012-03-19 18:10:00', 3, '../assets/img/uploads/1312221670960991.jpg', 640, 35, 'Dolores ut in expedi');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'Admin'),
(2, 'Spectateur');

-- --------------------------------------------------------

--
-- Table structure for table `stades`
--

CREATE TABLE `stades` (
  `id_stade` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `capacity` int(20) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stades`
--

INSERT INTO `stades` (`id_stade`, `name`, `location`, `capacity`, `picture`) VALUES
(1, 'Camilla Cervad', 'Ad tempore reiciendsss', 31, '../assets/img/uploads/IMG-6398d0a230d0c4.14012944.png'),
(2, 'Colorado Whitney', 'Dolores sunt repreh', 81, '../assets/img/uploads/IMG-6398d0a9424ff0.24407752.png'),
(3, 'Neve Todd', 'Et in numquam autem ', 35, '../assets/img/uploads/IMG-6398d0af0e0c93.57661050.png');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `name`) VALUES
(1, 'Soon'),
(2, 'In Progress'),
(3, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id_team` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `picture` text,
  `groupe` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id_team`, `nationality`, `picture`, `groupe`) VALUES
(1, 'Morocco', '../assets/img/uploads/IMG-6398dbebcf2c28.87126830.png', 'F'),
(2, 'Canada', '../assets/img/uploads/IMG-6398e88ecd1932.77631048.jpeg', 'F'),
(8, 'Dolore', '../assets/img/uploads/IMG-6398e5d486bbd5.77716718.png', 'E'),
(9, 'Volup', '../assets/img/uploads/IMG-6398d01c62db06.01394293.png', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) DEFAULT '2',
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passworld` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_role`, `fullname`, `email`, `passworld`) VALUES
(1, 2, 'User1 Last1', 'user@user.sr', 'usersr'),
(2, 1, 'user1', 'user@user1.com', '$2y$10$/Lr.GwOPkNvQVnHT.M2eXeG3k1q0Um3JcNer67gOFkYOin23Ml4eS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_Team1` (`id_team1`),
  ADD KEY `id_Team2` (`id_team2`),
  ADD KEY `id_stade` (`id_stade`) USING BTREE,
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `stades`
--
ALTER TABLE `stades`
  ADD PRIMARY KEY (`id_stade`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `id_matche` (`id_match`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stades`
--
ALTER TABLE `stades`
  MODIFY `id_stade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`id_team1`) REFERENCES `teams` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`id_team2`) REFERENCES `teams` (`id_team`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_4` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `matches_ibfk_5` FOREIGN KEY (`id_stade`) REFERENCES `stades` (`id_stade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id_match`) REFERENCES `matches` (`id_match`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
