-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 12:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id_blog`, `image`, `title`, `description`, `approved`, `created_at`, `id_user`) VALUES
(1, 'photo1.jpg', 'Virgil Fully', 'Upholstered Traditional King-Sized', 1, '2021-04-12 22:23:23', 1),
(4, 'photo6.jpg\r\n', 'Regina', 'Modular design for endless freedom', 0, '2021-04-12 22:23:23', 3),
(5, 'photo11.jpg', 'Amazon', 'Unique sense of nature in the home', 1, '2021-04-12 22:23:23', 3),
(16, 'photo10.jpg', 'Stela', 'One of the best in 2019', 0, '2021-04-12 15:20:35', 1),
(17, 'photo14.jpg', 'Plane', 'High level', 0, '2021-04-12 22:27:30', 6),
(18, 'photo2.jpg', 'Sofa', 'Best sofa in 2018', 1, '2021-04-12 22:28:25', 6),
(19, 'photo8.jpg', 'Bond-V', 'A comfortable sofa to rest on after hard work', 1, '2021-04-13 22:29:01', 8),
(20, 'photo3.jpg', 'Meteor', 'The Meteor is fashionable.', 0, '2021-04-12 22:29:55', 8),
(21, 'photo7.jpg', 'Jukon', 'Make it easy to get to work with comfortable furniture', 1, '2021-04-10 22:31:30', 7),
(22, 'photo9.jpg', 'Square', 'Great schedule for big meetings', 0, '2021-04-11 22:32:08', 7),
(23, 'photo13.jpg', 'Alegro', 'A deep seat and comfortable material are the main advantages of this furniture.', 1, '2021-04-11 22:33:12', 3),
(24, 'photo19.jpg', 'Samba lux', 'Bed raised for easy maintenance.A model that will enliven modern bedrooms while giving you peaceful dreams.', 0, '2021-04-12 22:34:37', 5),
(25, 'photo20.jpg', 'Indiana', 'Indiana computer desk will provide functionality and beauty to your workspace', 1, '2021-04-12 22:37:03', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `email`, `password`, `id_role`) VALUES
(1, 'Mika', 'Mikic', 'mikamikic3@gmail.com', '8bdc1b86d6b8fd2bfed4d17a092845ce', 2),
(3, 'Luka', 'Vasic', 'lukavasic2511@gmail.com', '7a9da6d6850242e86b4ddb17369943cc', 2),
(5, 'Aleksa', 'Gajic', 'aleksagajic11@gmail.com', '1fb9a8d5a3533af872f859fc046d5da2', 2),
(6, 'Nikola', 'Nikolic', 'nikola55@gmail.com', '210a4984bf8a9528290cc84416e56fa7', 2),
(7, 'Pera', 'Peric', 'pera10@gmail.com', 'bf33dec6791c321429f46bece7145c01', 2),
(8, 'Marko', 'Markovic', 'marko4@gmail.com', '78d934d419224679cc2382f8294f96b3', 2),
(9, 'Admin', 'Admin', 'admin00@gmail.com', 'a5a30bc4c47888cd59c4e9df68d80242', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
