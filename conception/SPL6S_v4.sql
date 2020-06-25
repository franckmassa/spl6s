-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 02, 2019 at 07:03 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `SPL6S`
--

-- --------------------------------------------------------

--
-- Table structure for table `prs13_expectedAnnualSaving`
--

CREATE TABLE `prs13_expectedAnnualSaving` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_followMeasuresKeys`
--

CREATE TABLE `prs13_followMeasuresKeys` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `mesureEntryDate` datetime NOT NULL,
  `idKeyMesures` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_followSaving`
--

CREATE TABLE `prs13_followSaving` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `savingEntryDate` datetime NOT NULL,
  `idExpectedAnnualSaving` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_has`
--

CREATE TABLE `prs13_has` (
  `id` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idProjectLeanSigma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_keyMesures`
--

CREATE TABLE `prs13_keyMesures` (
  `id` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `base` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `ideal` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `idProjectLeanSigma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_projectLeanSigma`
--

CREATE TABLE `prs13_projectLeanSigma` (
  `id` int(11) NOT NULL,
  `nameProject` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `idLeader` int(11) NOT NULL,
  `idChampion` int(11) NOT NULL,
  `idController` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs13_projectLeanSigma`
--

INSERT INTO `prs13_projectLeanSigma` (`id`, `nameProject`, `department`, `description`, `idLeader`, `idChampion`, `idController`) VALUES
(1, 'testA', 'testA', 'test&lt;&lt;', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `prs13_query`
--

CREATE TABLE `prs13_query` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `idProjectLeanSigma` int(11) NOT NULL,
  `idTypeQuery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_roles`
--

CREATE TABLE `prs13_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs13_roles`
--

INSERT INTO `prs13_roles` (`id`, `name`) VALUES
(2, 'Super utilisateur'),
(3, 'Champion'),
(4, 'Contrôleur financier'),
(5, 'Leader de projet');

-- --------------------------------------------------------

--
-- Table structure for table `prs13_societies`
--

CREATE TABLE `prs13_societies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `siret` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs13_societies`
--

INSERT INTO `prs13_societies` (`id`, `name`, `siret`) VALUES
(1, 'sbu', '11111111111111'),
(2, 'sbu', '11111111111111'),
(3, 'sbu', '11111111111111'),
(4, 'sbu', '11111111111111'),
(5, 'sbu', '11111111111111'),
(6, 'sbu', '11111111111111'),
(7, 'aze', '22222222222222'),
(8, 'aze', '22222222222222'),
(9, 'aze', '22222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `prs13_statusProject`
--

CREATE TABLE `prs13_statusProject` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `idProjectLeanSigma` int(11) NOT NULL,
  `idStatusProjectName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_statusProjectName`
--

CREATE TABLE `prs13_statusProjectName` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_steps`
--

CREATE TABLE `prs13_steps` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `validated` tinyint(4) NOT NULL,
  `idProjectLeanSigma` int(11) NOT NULL,
  `idStepsNames` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_stepsNames`
--

CREATE TABLE `prs13_stepsNames` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_typeQuery`
--

CREATE TABLE `prs13_typeQuery` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prs13_users`
--

CREATE TABLE `prs13_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idRoles` int(11) NOT NULL,
  `idSocieties` int(11) NOT NULL,
  `idUsers` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prs13_users`
--

INSERT INTO `prs13_users` (`id`, `firstname`, `lastname`, `phone`, `email`, `password`, `idRoles`, `idSocieties`, `idUsers`) VALUES
(1, 'Franck', 'Dupont', '0908987876', 'superuserfranck@free.fr', '$2y$10$Mig4tGoQJGAhVBwfIWpU2O6hvMESbhLEZKL7w5jcEyjvaN49h44pa', 2, 1, NULL),
(2, 'Olivier', 'Leclerc', '0807656545', 'champolivier@free.fr', '$2y$10$whdw.mU.iWGfrbtb8KsIbuGLFx1oYlbzMLTFaHCJUUs4KWul8lu2e', 3, 2, 1),
(3, 'Marc', 'Durand', '0123232323', 'controllermarc@free.fr', '$2y$10$J0e62irx3blZFvJWxdLBMeQWnnYIlAcw6r/Mox5tgcTx6BDp2aAfq', 4, 3, 1),
(4, 'Kevin', 'Winie', '0108987876', 'leaderkevin@free.fr', '$2y$10$YYtAXfzicxud.WYurThklu9FmGHWVoSl6hH9/AsQNJc035FjOfr.6', 5, 4, 1),
(5, 'Gérard', 'Martin', '0108987876', 'leadergerard@free.fr', '$2y$10$HWO6G/kym4lfvl7lWDkQLOCq/UPtX7B.DkkSK3kUcikxGinFJXl9K', 5, 5, 1),
(6, 'Denis', 'Denin ', '0132323232', 'superuserdenis@free.fr', '$2y$10$Gv0GxKHw8tiDnTIQRKN5/uwfQUPeFjZ8euBJW5KQPB.84tEL9jtQy', 2, 6, NULL),
(7, 'Bertrand', 'Bolos', '0132434323', 'champbertrand@free.fr', '$2y$10$oS09./V2WR/oZgZCQtm/nu1nhlqHwY/4S3tGDPu.aa03KwNorNv3C', 3, 7, 6),
(8, 'Fabien', 'Ruel', '0132434327', 'controllerfabien@free.fr', '$2y$10$7AkKuq.hKmUw4Z4SChCivOkFynxbNmfCS7RG3H.dAs88QZQExDay.', 4, 8, 6),
(9, 'Dominique', 'Dufure', '0343434343', 'leaderdominique@free.fr', '$2y$10$2wq4lgV.sxlDu2u46AxK3u4lcPzQ1w2TUQyYmGLOIcON7D0iVVkt6', 5, 9, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prs13_expectedAnnualSaving`
--
ALTER TABLE `prs13_expectedAnnualSaving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_followMeasuresKeys`
--
ALTER TABLE `prs13_followMeasuresKeys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followMeasuresKeys_keyMesures_FK` (`idKeyMesures`);

--
-- Indexes for table `prs13_followSaving`
--
ALTER TABLE `prs13_followSaving`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followSaving_expectedAnnualSaving_FK` (`idExpectedAnnualSaving`);

--
-- Indexes for table `prs13_has`
--
ALTER TABLE `prs13_has`
  ADD PRIMARY KEY (`id`),
  ADD KEY `has_users_FK` (`idUsers`),
  ADD KEY `has_projectLeanSigma0_FK` (`idProjectLeanSigma`);

--
-- Indexes for table `prs13_keyMesures`
--
ALTER TABLE `prs13_keyMesures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyMesures_projectLeanSigma_FK` (`idProjectLeanSigma`);

--
-- Indexes for table `prs13_projectLeanSigma`
--
ALTER TABLE `prs13_projectLeanSigma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prs13_projectLeanSixSigma_prs13_users0_FK` (`idLeader`),
  ADD KEY `prs13_projectLeanSixSigma_prs13_users1_FK` (`idChampion`),
  ADD KEY `prs13_projectLeanSixSigma_prs13_users2_FK` (`idController`);

--
-- Indexes for table `prs13_query`
--
ALTER TABLE `prs13_query`
  ADD PRIMARY KEY (`id`),
  ADD KEY `query_projectLeanSigma_FK` (`idProjectLeanSigma`),
  ADD KEY `query_typeQuery0_FK` (`idTypeQuery`);

--
-- Indexes for table `prs13_roles`
--
ALTER TABLE `prs13_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_societies`
--
ALTER TABLE `prs13_societies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_statusProject`
--
ALTER TABLE `prs13_statusProject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusProject_projectLeanSigma_FK` (`idProjectLeanSigma`),
  ADD KEY `statusProject_statusProjectName0_FK` (`idStatusProjectName`);

--
-- Indexes for table `prs13_statusProjectName`
--
ALTER TABLE `prs13_statusProjectName`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_steps`
--
ALTER TABLE `prs13_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `steps_projectLeanSigma_FK` (`idProjectLeanSigma`),
  ADD KEY `steps_stepsNames0_FK` (`idStepsNames`);

--
-- Indexes for table `prs13_stepsNames`
--
ALTER TABLE `prs13_stepsNames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_typeQuery`
--
ALTER TABLE `prs13_typeQuery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prs13_users`
--
ALTER TABLE `prs13_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_FK` (`idRoles`),
  ADD KEY `users_societies0_FK` (`idSocieties`),
  ADD KEY `users_users_FK` (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prs13_expectedAnnualSaving`
--
ALTER TABLE `prs13_expectedAnnualSaving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_followMeasuresKeys`
--
ALTER TABLE `prs13_followMeasuresKeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_followSaving`
--
ALTER TABLE `prs13_followSaving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_has`
--
ALTER TABLE `prs13_has`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_keyMesures`
--
ALTER TABLE `prs13_keyMesures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_projectLeanSigma`
--
ALTER TABLE `prs13_projectLeanSigma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prs13_query`
--
ALTER TABLE `prs13_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_roles`
--
ALTER TABLE `prs13_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prs13_societies`
--
ALTER TABLE `prs13_societies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prs13_statusProject`
--
ALTER TABLE `prs13_statusProject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_statusProjectName`
--
ALTER TABLE `prs13_statusProjectName`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_steps`
--
ALTER TABLE `prs13_steps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_stepsNames`
--
ALTER TABLE `prs13_stepsNames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_typeQuery`
--
ALTER TABLE `prs13_typeQuery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prs13_users`
--
ALTER TABLE `prs13_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prs13_followMeasuresKeys`
--
ALTER TABLE `prs13_followMeasuresKeys`
  ADD CONSTRAINT `followMeasuresKeys_keyMesures_FK` FOREIGN KEY (`idKeyMesures`) REFERENCES `prs13_keyMesures` (`id`);

--
-- Constraints for table `prs13_followSaving`
--
ALTER TABLE `prs13_followSaving`
  ADD CONSTRAINT `followSaving_expectedAnnualSaving_FK` FOREIGN KEY (`idExpectedAnnualSaving`) REFERENCES `prs13_expectedAnnualSaving` (`id`);

--
-- Constraints for table `prs13_has`
--
ALTER TABLE `prs13_has`
  ADD CONSTRAINT `has_projectLeanSigma0_FK` FOREIGN KEY (`idProjectLeanSigma`) REFERENCES `prs13_projectLeanSigma` (`id`),
  ADD CONSTRAINT `has_users_FK` FOREIGN KEY (`idUsers`) REFERENCES `prs13_users` (`id`);

--
-- Constraints for table `prs13_keyMesures`
--
ALTER TABLE `prs13_keyMesures`
  ADD CONSTRAINT `keyMesures_projectLeanSigma_FK` FOREIGN KEY (`idProjectLeanSigma`) REFERENCES `prs13_projectLeanSigma` (`id`);

--
-- Constraints for table `prs13_projectLeanSigma`
--
ALTER TABLE `prs13_projectLeanSigma`
  ADD CONSTRAINT `prs13_projectLeanSixSigma_prs13_users0_FK` FOREIGN KEY (`idLeader`) REFERENCES `prs13_users` (`id`),
  ADD CONSTRAINT `prs13_projectLeanSixSigma_prs13_users1_FK` FOREIGN KEY (`idChampion`) REFERENCES `prs13_users` (`id`),
  ADD CONSTRAINT `prs13_projectLeanSixSigma_prs13_users2_FK` FOREIGN KEY (`idController`) REFERENCES `prs13_users` (`id`);

--
-- Constraints for table `prs13_query`
--
ALTER TABLE `prs13_query`
  ADD CONSTRAINT `query_projectLeanSigma_FK` FOREIGN KEY (`idProjectLeanSigma`) REFERENCES `prs13_projectLeanSigma` (`id`),
  ADD CONSTRAINT `query_typeQuery0_FK` FOREIGN KEY (`idTypeQuery`) REFERENCES `prs13_typeQuery` (`id`);

--
-- Constraints for table `prs13_statusProject`
--
ALTER TABLE `prs13_statusProject`
  ADD CONSTRAINT `statusProject_projectLeanSigma_FK` FOREIGN KEY (`idProjectLeanSigma`) REFERENCES `prs13_projectLeanSigma` (`id`),
  ADD CONSTRAINT `statusProject_statusProjectName0_FK` FOREIGN KEY (`idStatusProjectName`) REFERENCES `prs13_statusProjectName` (`id`);

--
-- Constraints for table `prs13_steps`
--
ALTER TABLE `prs13_steps`
  ADD CONSTRAINT `steps_projectLeanSigma_FK` FOREIGN KEY (`idProjectLeanSigma`) REFERENCES `prs13_projectLeanSigma` (`id`),
  ADD CONSTRAINT `steps_stepsNames0_FK` FOREIGN KEY (`idStepsNames`) REFERENCES `prs13_stepsNames` (`id`);

--
-- Constraints for table `prs13_users`
--
ALTER TABLE `prs13_users`
  ADD CONSTRAINT `users_roles_FK` FOREIGN KEY (`idRoles`) REFERENCES `prs13_roles` (`id`),
  ADD CONSTRAINT `users_societies0_FK` FOREIGN KEY (`idSocieties`) REFERENCES `prs13_societies` (`id`),
  ADD CONSTRAINT `users_users_FK` FOREIGN KEY (`idUsers`) REFERENCES `prs13_users` (`id`);
