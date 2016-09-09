-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.17 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.3.0.5013
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de table ppe. places
CREATE TABLE IF NOT EXISTS `places` (
  `id_p` int(10) NOT NULL AUTO_INCREMENT,
  `numplace` varchar(5) DEFAULT NULL,
  `id_u` int(10) NOT NULL,
  `busy` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_p`),
  KEY `id_u` (`id_u`),
  CONSTRAINT `id_u` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table ppe.places : ~0 rows (environ)
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
/*!40000 ALTER TABLE `places` ENABLE KEYS */;


-- Export de la structure de table ppe. reservations
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_r` int(10) NOT NULL AUTO_INCREMENT,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `id_u` int(10) NOT NULL,
  `id_p` int(10) NOT NULL,
  PRIMARY KEY (`id_r`),
  KEY `id_user` (`id_u`),
  KEY `id_place` (`id_p`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`),
  CONSTRAINT `id_place` FOREIGN KEY (`id_p`) REFERENCES `places` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Export de données de la table ppe.reservations : ~0 rows (environ)
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;


-- Export de la structure de table ppe. users
CREATE TABLE IF NOT EXISTS `users` (
  `id_u` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `login` int(10) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table contenant les utilisateurs';

-- Export de données de la table ppe.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
