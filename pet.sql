-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 09:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopts`
--

CREATE TABLE `adopts` (
  `adopt_id` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `pet_name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `pet_specie` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `name`, `image`) VALUES
(1, 'Macskák', 'cats.jpg'),
(2, 'Kutyák', 'dogs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `firstname` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `question_id`, `user`, `firstname`, `lastname`, `email`, `text`) VALUES
(54, 1, 'Norbertasd', 'Norbert', 'Péter', 'pnorbyy01@gmail.com', 'Semmi'),
(55, 2, 'pnorbi', 'Norbert', 'Péter', 'pnorbyy01@gmail.com', 'Most 54'),
(56, 3, 'pnorbi', 'Norbert', 'Péter', 'pnorbyy01@gmail.com', 'asd'),
(57, 1, 'pnorbi', 'Norbert', 'Péter', 'pnorbyy01@gmail.com', 'Mondd el'),
(58, 1, '', 'asd', 'asd', 'asdasdasdasd@asd.com', 'asdsad'),
(59, 2, 'pnorbi', 'Norbert', 'Péter', 'pnorbyy01@gmail.com', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `contact_question`
--

CREATE TABLE `contact_question` (
  `question_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `contact_question`
--

INSERT INTO `contact_question` (`question_id`, `question`) VALUES
(1, 'Mi a legjobb a kiskedvencem számára?'),
(2, 'Tudom módosítani/törölni a lefoglalásomat?'),
(3, 'Hogyan tudok felrakni hírdetést?');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`user_id`, `pet_id`) VALUES
(3, 8),
(3, 6),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `forgotpw`
--

CREATE TABLE `forgotpw` (
  `id_user` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `forgotpw`
--

INSERT INTO `forgotpw` (`id_user`, `token`) VALUES
(3, 'UgmqwFwxetZhmxpAvvxnNobxkLukpsXopkuJrlle'),
(3, 'XhpgdnkjjVrcdushopStexsxescKtqkftoszUqvz'),
(3, 'LkrxlltGrulvbxKdaiuipCvwlyxsPelgxrfLyqcs'),
(3, 'OxvMfeUuoAzyDsuKpwMqgDrgYmrHjbWlsTjpBvwM'),
(3, 'WccovylRrtayjuAodvwefHapjkpgWfntotbQxrcv'),
(3, 'VexvRacxLaglRbuvNiovUbfiBgnxOltoDegzLrkj'),
(3, 'DyzatniAlbebbvMlkhkriRbtdoftWbffaemNrcsw'),
(3, 'XikdaxtxOdumfsapAqjnggbtWcmwrbxvDpkbfqcm'),
(3, 'YmtvrxseWxyhvzygXxofoqhsUrysultnGluqerpj');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `specieId` int(11) NOT NULL,
  `whose` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `age` int(11) NOT NULL,
  `adopted` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `specieId`, `whose`, `name`, `description`, `image`, `gender`, `age`, `adopted`, `active`) VALUES
(1, 2, '', 'Főnök', 'A pihe puha perzsa macska a legkedveltebb macskafajták egyike.', 'persian.jpg', 'Fiú', 2, 1, 1),
(2, 3, '', 'Cirmi', 'Nyugodt és kiegyensúlyozott természetű.', 'brit.jpg', 'Lány', 1, 1, 1),
(3, 4, '', 'Simba', 'Egy igazi “házi tigris macska” hiszen vadmacska vér is csörgedezik az ereiben.', 'bengal.jpg', 'Fiú', 4, 1, 1),
(4, 5, '', 'Tomi', 'Rongybaba macska', 'ragdoll.jpg', 'Fiú', 3, 1, 1),
(5, 1, '', 'Lola', 'Egyik legrégebbi és legismertebb macskafajta.', 'siamese.jpg', 'Lány', 1, 1, 1),
(6, 8, '', 'Parázs', 'Okos, kedves, játékos kutya, és mindemellett hűséges társ. Gyakran alkalmazzák nyomozó-, mentő- és vakvezető kutyaként.', 'german-shepherd.jpg', 'Fiú', 1, 1, 1),
(7, 9, '', 'Maja', 'Sugárzóan kék szemek és a tipikus szőrzetmintázat.', 'siberian-husky.jpg', 'Lány', 2, 1, 1),
(8, 6, '', 'Hamu', 'Gyakran alkalmazzák segítőkutyaként, kedves, barátságos természete van.', 'golden-retriever.jpg', 'Fiú', 1, 1, 1),
(9, 7, '', 'Pepe', 'Bundája plüsshatású és könnyen kezelhető.', 'shiba-inu.jpg', 'Fiú', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `animalId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `name`, `image`, `animalId`) VALUES
(1, 'Sziámi', 'cat-image.png', 1),
(2, 'Perzsa', 'cat-image.png', 1),
(3, 'Brit', 'cat-image.png', 1),
(4, 'Bengáli', 'cat-image.png', 1),
(5, 'Ragdoll', 'cat-image.png', 1),
(6, 'Golden retriever', 'dog-image.png', 2),
(7, 'Shiba Inu', 'dog-image.png', 2),
(8, 'Németjuhász', 'dog-image.png', 2),
(9, 'Husky', 'dog-image.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `new_password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code_password` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `new_password_expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_web`
--

CREATE TABLE `users_web` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime NOT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `code_password` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `new_password_expires` datetime NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users_web`
--

INSERT INTO `users_web` (`id_user`, `username`, `firstname`, `lastname`, `password`, `email`, `token`, `registration_expires`, `active`, `code_password`, `new_password_expires`, `level`) VALUES
(3, 'pnorbi', 'Norbert', 'Péter', '$2y$10$8SwpnMNlssZ8ZbOYZV0MkOn7.Q5vhWuZUI52QrMCLt6bTrgeP9uy.', 'pnorbyy01@gmail.com', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 2),
(4, 'TesztFiók', 'Teszt', 'Fiók', '$2y$10$wvSrRzhdzJUByEefZNytZe9dZHnHu85bj21V6fyxsuwyLLrRZYyau', 'tesztfiok@gmail.com', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 1),
(5, 'teszt23232', 'asd', 'asd', '$2y$10$499SiWWlCAR4K9mR3Bkf3.qPlofMJBYIbNw8Paf6i7.XaXzzI9tiq', 'asdasdasdasd@asd.com', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 1),
(6, 'tesztelek', 'Teszt', 'Elek', '$2y$10$1JB.RofFprnGxh/E833to.qyKTe8frLI4c0SCAO1i8zUOJlL1XLFK', 'tesztelek@gmail.hu', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_email_failure`
--

CREATE TABLE `user_email_failure` (
  `id_user_email_failure` int(11) NOT NULL,
  `id_user_web` int(11) NOT NULL,
  `date_time_added` datetime NOT NULL,
  `date_time_tried` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `user_email_failure`
--

INSERT INTO `user_email_failure` (`id_user_email_failure`, `id_user_web`, `date_time_added`, `date_time_tried`) VALUES
(0, 0, '2022-05-18 17:22:52', '0000-00-00 00:00:00'),
(0, 0, '2022-05-18 19:07:54', '0000-00-00 00:00:00'),
(0, 0, '2022-05-18 21:31:15', '0000-00-00 00:00:00'),
(0, 0, '2022-05-19 14:19:46', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopts`
--
ALTER TABLE `adopts`
  ADD PRIMARY KEY (`adopt_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_ibfk_1` (`question_id`);

--
-- Indexes for table `contact_question`
--
ALTER TABLE `contact_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `fav_fk1` (`user_id`),
  ADD KEY `fav_fk2` (`pet_id`);

--
-- Indexes for table `forgotpw`
--
ALTER TABLE `forgotpw`
  ADD KEY `forgot_fk_1` (`id_user`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pet_specie_ibfk_1` (`specieId`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animalId` (`animalId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users_web`
--
ALTER TABLE `users_web`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopts`
--
ALTER TABLE `adopts`
  MODIFY `adopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contact_question`
--
ALTER TABLE `contact_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_web`
--
ALTER TABLE `users_web`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `con_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `contact_question` (`question_id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fav_fk1` FOREIGN KEY (`user_id`) REFERENCES `users_web` (`id_user`),
  ADD CONSTRAINT `fav_fk2` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`);

--
-- Constraints for table `forgotpw`
--
ALTER TABLE `forgotpw`
  ADD CONSTRAINT `forgot_fk_1` FOREIGN KEY (`id_user`) REFERENCES `users_web` (`id_user`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pet_specie_ibfk_1` FOREIGN KEY (`specieId`) REFERENCES `species` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `species`
--
ALTER TABLE `species`
  ADD CONSTRAINT `species_ibfk_1` FOREIGN KEY (`animalId`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
