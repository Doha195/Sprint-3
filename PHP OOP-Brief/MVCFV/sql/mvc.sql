-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 mai 2021 à 17:15
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionusers`
--

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'Class 1'),
(2, 'class 2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tele` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `classId` int(11) NOT NULL,
  `dateOfRegister` datetime NOT NULL DEFAULT current_timestamp(),
  `Permision` int(11) NOT NULL DEFAULT 0,
  `recoveryCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `dateOfBirth`, `userName`, `email`, `password`, `tele`, `gender`, `classId`, `dateOfRegister`, `Permision`, `recoveryCode`) VALUES
(1, 'zakariah', 'elarfaoui', '1998-05-21', 'zakaria2105', 'ttestest336@gmail.com', '$2y$10$2xFPyK815tHL/IvauvvqeOHIyr65lcwDhjvqlBMX1k1PFq9BFkgh2', 630114723, 'male', 1, '2021-05-25 22:45:24', 1, '$2y$10$yjd9sTs6.A34eDgmymDSeRWyuOvh0BKVXQFIefad4eaDqSJ3dz6'),
(2, 'Reda', 'Meziouni', '0000-00-00', 'reda.meziouni', '', '$2y$10$BiEozeEJKKRU0fODjnLSseCPOFX3jiAl1CQ0zyvr1xjswJVB8Yuk6', 0, 'male', 1, '2021-05-26 00:15:10', 0, ''),
(3, 'Yassine', 'Bouzar', '0000-00-00', 'Yassine.Bouzar', '', '$2y$10$Rv5rTpAWURgoIiSxM58TAeT.fyWnVPFmNKeNGXbiov/xcx8s2jBD.', 0, '', 1, '2021-05-26 00:15:36', 0, ''),
(4, 'Miriam', 'Munoz de Leon', '0000-00-00', 'Miriam.Munoz de Leon', '', '$2y$10$mNobs7H.6q8KVM.eZAuLH.beOPJLeE1anwvEr3JDGly5KpF09IOCi', 0, 'female', 1, '2021-05-26 00:15:48', 0, ''),
(5, 'Abderrazzaq', 'Laaziri', '0000-00-00', 'Abderrazzaq.Laaziri', '', '$2y$10$xnbmaS6pw5si1I.OzXv/KOpQPBDdQE1oq/yFxU21yF8kNDpisbG6.', 0, '', 1, '2021-05-26 00:16:03', 0, ''),
(6, 'Mohammed', 'Kabli', '0000-00-00', 'Mohammed.Kabli', '', '$2y$10$S0rA9pt281vVTK/wuO10lOppEpADe4.KOYp38rZD/DPNblJxIm0Be', 0, '', 1, '2021-05-26 00:16:15', 0, ''),
(7, 'Rabie', 'EL Adab', '1997-02-02', 'Rabie.EL Adab', 'rabie@gmail.com', '$2y$10$35OxebylzFw30rAXRgcnVuGALEW0U86SWuuPcRx9HwP5MJZPz.I4K', 606060606, 'male', 1, '2021-05-26 00:16:28', 0, ''),
(8, 'Noureddine', 'Barzil', '0000-00-00', 'Noureddine.Barzil', '', '$2y$10$gRkFtNv7RqMShEWzLnfxu.uX70CyqE7Wose6cK2w0LtltxImaB.y.', 0, '', 1, '2021-05-26 00:16:40', 0, ''),
(9, 'Hamza', 'Elglaoui', '0000-00-00', 'Hamza.Elglaoui', '', '$2y$10$307mIwc6aXmYDsJH3i/QXOZwELuZfOHC4lkXfzruX5Yb7FRixE4va', 0, '', 1, '2021-05-26 00:16:51', 0, ''),
(10, 'Oussama', 'Almesskine', '0000-00-00', 'Oussama.Almesskine', '', '$2y$10$kg4HyR5kIK97sWyAZN4vbOLsEgeNrOH2TJljUlek0skaDqnbkVA4q', 0, '', 1, '2021-05-26 00:17:03', 0, ''),
(11, 'Saad', 'Haimeur', '0000-00-00', 'Saad.Haimeur', '', '$2y$10$FGUaZrW.ZJ08.FliHc6lpeQB/Lzakm8pJurCLwUwzAzs4tcMHGAEu', 0, '', 1, '2021-05-26 00:17:15', 0, ''),
(12, 'Ismail', 'Bouaddi', '0000-00-00', 'Ismail.Bouaddi', '', '$2y$10$w3c4IOSZVtsA.LmcE9HFEebSyYBynD.mbVT0KLrn1VwJDgew166N6', 0, 'male', 2, '2021-05-26 00:17:25', 0, ''),
(13, 'Khalid', 'Raqi', '2021-05-05', 'Khalid.Raqi', '', '$2y$10$W0pyRQjfbOIVxHBFb.h4YuILQwVKoH9fpuA59i8l2ZtQY2YAq.NYK', 0, 'male', 2, '2021-05-26 00:17:40', 0, ''),
(14, 'Elmostapha', 'Elarfaoui', '0000-00-00', 'Elmostapha.Elarfaoui', '', '$2y$10$5oGRRBpE8FoRxyaY.JGRLe/iKkhRk47Lwpp9Ip/eefavW1iFpMKFG', 0, '', 2, '2021-05-26 00:17:55', 0, ''),
(15, 'Fadoua', 'Kharroub', '0000-00-00', 'Fadoua.Kharroub', '', '$2y$10$mDMbPHTAC4khm81jpTuvcuEY94CF0uBOCGCGs/7gFE5vlcq6c4o/G', 0, 'male', 2, '2021-05-26 00:18:05', 0, ''),
(16, 'Ismail', 'Erggab', '0000-00-00', 'Ismail.Erggab', '', '$2y$10$3xIIUH6/s0rUdIwpyl8cXeUCR4MhxUZL0G2y6vcKPAob4CMiOo9oW', 0, '', 2, '2021-05-26 00:18:17', 0, ''),
(17, 'Yassine', 'Azdoud', '0000-00-00', 'Yassine.Azdoud', '', '$2y$10$e0ZoHx2gCO6SA0/WVh7Pt.SgAXekZRJsLDpXx8/W7a.WAnXEyQwUO', 0, '', 2, '2021-05-26 00:18:44', 0, ''),
(18, 'Mourad', 'Merguoum', '0000-00-00', 'Mourad.Merguoum', '', '$2y$10$SFeE6TNlS7/ELExEU/QCn.He3mEdX0.627DhIH08Ho/9CccZ9gUhO', 0, '', 2, '2021-05-26 00:18:55', 0, ''),
(19, 'Doha', 'Feriadi', '0000-00-00', 'Doha.Feriadi', '', '$2y$10$YL88AU.hMo.WxC/VsChnvOIWszOph7vAB0.jtEXHLQ.OHWIhxDUGy', 0, '', 2, '2021-05-26 00:19:05', 1, ''),
(20, 'Hammim', 'Samira', '0000-00-00', 'Hammim.Samira', '', '$2y$10$.DajmvzvNM0E9H5ZE45Pr.u3eznP6U45P6gWcxWnI8lUHFxFgUpwG', 0, '', 2, '2021-05-26 00:19:17', 0, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD KEY `class` (`classId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `class` FOREIGN KEY (`classId`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;