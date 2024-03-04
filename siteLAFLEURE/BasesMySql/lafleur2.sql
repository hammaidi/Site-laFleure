-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 06 Mai 2013 à 08:44
-- Version du serveur: 5.5.27
-- Version de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `lafleur2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--
create database lafleur2;
use lafleur2;

CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_code` char(3) NOT NULL DEFAULT '',
  `cat_libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`cat_code`, `cat_libelle`) VALUES
('bul', 'Bulbes'),
('mas', 'Plantes à massif'),
('ros', 'Rosiers');

-- --------------------------------------------------------

--
-- Structure de la table `clientconnu`
--

CREATE TABLE IF NOT EXISTS `clientconnu` (
  `clt_code` varchar(5) NOT NULL DEFAULT '',
  `clt_nom` varchar(30) NOT NULL DEFAULT '',
  `clt_adresse` varchar(50) NOT NULL DEFAULT '',
  `clt_tel` varchar(20) NOT NULL DEFAULT '',
  `clt_email` varchar(50) NOT NULL DEFAULT '',
  `clt_motPasse` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`clt_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clientconnu`
--

INSERT INTO `clientconnu` (`clt_code`, `clt_nom`, `clt_adresse`, `clt_tel`, `clt_email`, `clt_motPasse`) VALUES
('c0001', 'Dupont', '12, rue haute 75001 Paris', '01 05 22 35 97', 'dupont@wanadoo.fr', 'aaa'),
('c0002', 'Dubois', '4, bld d''Alsace 75002 Paris', '01 44 97 62 54', 'dubois@club-internet.fr', 'bbb'),
('c0003', 'Durand', '5, allée des Ifs 80000 Amiens', '03 22 79 64 56', 'durand@free.fr', 'ccc');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `cde_moment` varchar(20) NOT NULL DEFAULT '',
  `cde_client` varchar(5) NOT NULL DEFAULT '',
  `cde_date` varchar(10) NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`cde_moment`,`cde_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`cde_moment`, `cde_client`, `cde_date`) VALUES
('1367822548', 'C0001', '2013-05-06');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE IF NOT EXISTS `contenir` (
  `cde_moment` varchar(20) NOT NULL DEFAULT '',
  `cde_client` varchar(5) NOT NULL DEFAULT '',
  `produit` char(3) NOT NULL DEFAULT '',
  `quantite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cde_moment`,`cde_client`,`produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`cde_moment`, `cde_client`, `produit`, `quantite`) VALUES
('1367822548', 'C0001', 'm01', 2),
('1367822548', 'C0001', 'r02', 10);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `pdt_ref` char(3) NOT NULL DEFAULT '',
  `pdt_designation` varchar(50) NOT NULL DEFAULT '',
  `pdt_prix` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pdt_image` varchar(50) NOT NULL DEFAULT '',
  `pdt_categorie` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`pdt_ref`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`pdt_ref`, `pdt_designation`, `pdt_prix`, `pdt_image`, `pdt_categorie`) VALUES
('b01', '3 bulbes de bégonias', 5.00, 'bulbes_begonia', 'bul'),
('b02', '10 bulbes de dahlias', 12.00, 'bulbes_dahlia', 'bul'),
('b03', '50 glaïeuls', 9.00, 'bulbes_glaieul', 'bul'),
('m01', 'Lot de 3 marguerites', 5.00, 'massif_marguerite', 'mas'),
('m02', 'Pour un bouquet de 6 pensées', 6.00, 'massif_pensee', 'mas'),
('m03', 'Mélange varié de 10 plantes à massif', 15.00, 'massif_melange', 'mas'),
('r01', '1 pied spécial grandes fleurs', 20.00, 'rosiers_gdefleur', 'ros'),
('r02', 'Une variété sélectionnée pour son parfum', 9.00, 'rosiers_parfum', 'ros'),
('r03', 'Rosier arbuste', 8.00, 'rosiers_arbuste', 'ros');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
