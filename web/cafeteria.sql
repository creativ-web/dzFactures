-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 mai 2019 à 18:16
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cafeteria`
--

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

DROP TABLE IF EXISTS `achats`;
CREATE TABLE IF NOT EXISTS `achats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `produits_id` int(11) DEFAULT NULL,
  `zonnestocks_id` int(11) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `tva2_id` int(11) DEFAULT NULL,
  `depenses_id` int(11) DEFAULT NULL,
  `reduction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalreduct` decimal(10,2) DEFAULT NULL,
  `datevente` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  `qte` decimal(10,3) DEFAULT NULL,
  `puHT` decimal(9,2) DEFAULT NULL,
  `puHTreduit` decimal(9,2) DEFAULT NULL,
  `puTTC` decimal(10,2) DEFAULT NULL,
  `puTTCreduit` decimal(10,2) DEFAULT NULL,
  `prixHT` decimal(10,2) DEFAULT NULL,
  `prixTTCvente` decimal(10,2) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalHTa` decimal(10,2) DEFAULT NULL,
  `totalTTCa` decimal(10,2) DEFAULT NULL,
  `prixTTC` decimal(10,2) DEFAULT NULL,
  `unite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9920924EA76ED395` (`user_id`),
  KEY `IDX_9920924ECD11A2CF` (`produits_id`),
  KEY `IDX_9920924E28ADA6E0` (`zonnestocks_id`),
  KEY `IDX_9920924E4D79775F` (`tva_id`),
  KEY `IDX_9920924E3F40B76F` (`tva2_id`),
  KEY `IDX_9920924E338B55D2` (`depenses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `acheteurs`
--

DROP TABLE IF EXISTS `acheteurs`;
CREATE TABLE IF NOT EXISTS `acheteurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `supp` tinyint(1) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `famille` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomusage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reduction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taxe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `limitereglement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modereglement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `immatriculation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personne` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codeclient` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relances` tinyint(1) DEFAULT NULL,
  `civilite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrcselect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nifselect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adressesupp` tinytext COLLATE utf8_unicode_ci,
  `description` tinytext COLLATE utf8_unicode_ci,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telmobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro` tinyint(1) DEFAULT NULL,
  `particulier` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95806A0DA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `acheteurs`
--

INSERT INTO `acheteurs` (`id`, `user_id`, `supp`, `nom`, `prenom`, `famille`, `nomusage`, `type`, `reduction`, `taxe`, `limitereglement`, `modereglement`, `immatriculation`, `personne`, `codeclient`, `relances`, `civilite`, `cb`, `ncb`, `nrcselect`, `nrc`, `nifselect`, `nif`, `adresse`, `adressesupp`, `description`, `codepostal`, `pays`, `ville`, `email`, `siteweb`, `fax`, `telephone`, `telmobile`, `pro`, `particulier`) VALUES
(1, 1, 0, 'client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, 0, 'client2', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 0, 'Client', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NRC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `acheteurs_factures`
--

DROP TABLE IF EXISTS `acheteurs_factures`;
CREATE TABLE IF NOT EXISTS `acheteurs_factures` (
  `acheteurs_id` int(11) NOT NULL,
  `factures_id` int(11) NOT NULL,
  PRIMARY KEY (`acheteurs_id`,`factures_id`),
  KEY `IDX_5D5E2A4D1C3356FB` (`acheteurs_id`),
  KEY `IDX_5D5E2A4DE9D518F9` (`factures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aprodoc`
--

DROP TABLE IF EXISTS `aprodoc`;
CREATE TABLE IF NOT EXISTS `aprodoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produits_id` int(11) DEFAULT NULL,
  `bes_id` int(11) DEFAULT NULL,
  `bls_id` int(11) DEFAULT NULL,
  `bts_id` int(11) DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_22D8E562CD11A2CF` (`produits_id`),
  KEY `IDX_22D8E56245A6E49F` (`bes_id`),
  KEY `IDX_22D8E56248B686EE` (`bls_id`),
  KEY `IDX_22D8E56218265AAD` (`bts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `aprofact`
--

DROP TABLE IF EXISTS `aprofact`;
CREATE TABLE IF NOT EXISTS `aprofact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produits_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `recus_id` int(11) DEFAULT NULL,
  `zone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_866367B8CD11A2CF` (`produits_id`),
  KEY `IDX_866367B8E9D518F9` (`factures_id`),
  KEY `IDX_866367B8D012BDD` (`recus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bcs`
--

DROP TABLE IF EXISTS `bcs`;
CREATE TABLE IF NOT EXISTS `bcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_33CEDEBEA76ED395` (`user_id`),
  KEY `IDX_33CEDEBE1C3356FB` (`acheteurs_id`),
  KEY `IDX_33CEDEBE1DB279A6` (`departements_id`),
  KEY `IDX_33CEDEBEFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bcs_achats`
--

DROP TABLE IF EXISTS `bcs_achats`;
CREATE TABLE IF NOT EXISTS `bcs_achats` (
  `bcs_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`bcs_id`,`achats_id`),
  KEY `IDX_8CD63D9ACAE6113F` (`bcs_id`),
  KEY `IDX_8CD63D9A645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `becs`
--

DROP TABLE IF EXISTS `becs`;
CREATE TABLE IF NOT EXISTS `becs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_79ABF1BD1C3356FB` (`acheteurs_id`),
  KEY `IDX_79ABF1BD1DB279A6` (`departements_id`),
  KEY `IDX_79ABF1BDFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `becs_achats`
--

DROP TABLE IF EXISTS `becs_achats`;
CREATE TABLE IF NOT EXISTS `becs_achats` (
  `becs_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`becs_id`,`achats_id`),
  KEY `IDX_EEBFD080E7640296` (`becs_id`),
  KEY `IDX_EEBFD080645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bes`
--

DROP TABLE IF EXISTS `bes`;
CREATE TABLE IF NOT EXISTS `bes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_65947938A76ED395` (`user_id`),
  KEY `IDX_659479381C3356FB` (`acheteurs_id`),
  KEY `IDX_659479381DB279A6` (`departements_id`),
  KEY `IDX_65947938FACB6020` (`stocks_id`),
  KEY `IDX_65947938E9D518F9` (`factures_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bes`
--

INSERT INTO `bes` (`id`, `user_id`, `acheteurs_id`, `departements_id`, `stocks_id`, `factures_id`, `creele`, `type`, `nf`, `datecreation`, `lieu`, `additionnelle`, `dateadd`, `moderegle`, `dateregle`, `objet`, `etat`, `montantpaye`, `paiementrecu`, `dateenvois`, `nc`, `nomvendeur`, `informations`, `editerpar`, `expedierpar`, `receptionnerpar`, `ncommande`) VALUES
(2, 1, 1, 1, 1, NULL, '2019-05-21 04:31:27', 'be', '1', '2019-05-21', NULL, NULL, '2019-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 1, 1, 1, NULL, '2019-05-21 04:34:55', 'be', '3', '2019-05-21', NULL, NULL, '2019-05-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `bes_achats`
--

DROP TABLE IF EXISTS `bes_achats`;
CREATE TABLE IF NOT EXISTS `bes_achats` (
  `bes_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`bes_id`,`achats_id`),
  KEY `IDX_FFCC441045A6E49F` (`bes_id`),
  KEY `IDX_FFCC4410645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `blcs`
--

DROP TABLE IF EXISTS `blcs`;
CREATE TABLE IF NOT EXISTS `blcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_767ACA32A76ED395` (`user_id`),
  KEY `IDX_767ACA321C3356FB` (`acheteurs_id`),
  KEY `IDX_767ACA321DB279A6` (`departements_id`),
  KEY `IDX_767ACA32FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `blcs_achats`
--

DROP TABLE IF EXISTS `blcs_achats`;
CREATE TABLE IF NOT EXISTS `blcs_achats` (
  `blcs_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`blcs_id`,`achats_id`),
  KEY `IDX_12AAFB4AC06B535E` (`blcs_id`),
  KEY `IDX_12AAFB4A645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bls`
--

DROP TABLE IF EXISTS `bls`;
CREATE TABLE IF NOT EXISTS `bls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B456C271A76ED395` (`user_id`),
  KEY `IDX_B456C2711C3356FB` (`acheteurs_id`),
  KEY `IDX_B456C2711DB279A6` (`departements_id`),
  KEY `IDX_B456C271FACB6020` (`stocks_id`),
  KEY `IDX_B456C271E9D518F9` (`factures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bls_ventes`
--

DROP TABLE IF EXISTS `bls_ventes`;
CREATE TABLE IF NOT EXISTS `bls_ventes` (
  `bls_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`bls_id`,`ventes_id`),
  KEY `IDX_AEA3289F48B686EE` (`bls_id`),
  KEY `IDX_AEA3289F7D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonscommandes`
--

DROP TABLE IF EXISTS `bonscommandes`;
CREATE TABLE IF NOT EXISTS `bonscommandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_F71C65C9A76ED395` (`user_id`),
  KEY `IDX_F71C65C91C3356FB` (`acheteurs_id`),
  KEY `IDX_F71C65C91DB279A6` (`departements_id`),
  KEY `IDX_F71C65C9FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonscommandes_lignes`
--

DROP TABLE IF EXISTS `bonscommandes_lignes`;
CREATE TABLE IF NOT EXISTS `bonscommandes_lignes` (
  `bonscommandes_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`bonscommandes_id`,`lignes_id`),
  KEY `IDX_29C61AE5F4B4ABA5` (`bonscommandes_id`),
  KEY `IDX_29C61AE55E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bonscommandes_ventes`
--

DROP TABLE IF EXISTS `bonscommandes_ventes`;
CREATE TABLE IF NOT EXISTS `bonscommandes_ventes` (
  `bonscommandes_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`bonscommandes_id`,`ventes_id`),
  KEY `IDX_22C2BF35F4B4ABA5` (`bonscommandes_id`),
  KEY `IDX_22C2BF357D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bts`
--

DROP TABLE IF EXISTS `bts`;
CREATE TABLE IF NOT EXISTS `bts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_364D5A28A76ED395` (`user_id`),
  KEY `IDX_364D5A281C3356FB` (`acheteurs_id`),
  KEY `IDX_364D5A281DB279A6` (`departements_id`),
  KEY `IDX_364D5A28FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bts_ventes`
--

DROP TABLE IF EXISTS `bts_ventes`;
CREATE TABLE IF NOT EXISTS `bts_ventes` (
  `bts_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`bts_id`,`ventes_id`),
  KEY `IDX_B9BBC8F618265AAD` (`bts_id`),
  KEY `IDX_B9BBC8F67D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cachets`
--

DROP TABLE IF EXISTS `cachets`;
CREATE TABLE IF NOT EXISTS `cachets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `alt` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D91237A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_3AF34668A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `nom`, `description`) VALUES
(4, 1, 'Boissons fraiches', NULL),
(5, 1, 'Boissons chaudes', NULL),
(6, 1, 'Gâteaux', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cis`
--

DROP TABLE IF EXISTS `cis`;
CREATE TABLE IF NOT EXISTS `cis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C8E35C03A76ED395` (`user_id`),
  KEY `IDX_C8E35C031C3356FB` (`acheteurs_id`),
  KEY `IDX_C8E35C031DB279A6` (`departements_id`),
  KEY `IDX_C8E35C03FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cis_ventes`
--

DROP TABLE IF EXISTS `cis_ventes`;
CREATE TABLE IF NOT EXISTS `cis_ventes` (
  `cis_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`cis_id`,`ventes_id`),
  KEY `IDX_BF606EE4B0ADA3B` (`cis_id`),
  KEY `IDX_BF606EE7D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `valider` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `reference` int(11) NOT NULL,
  `commande` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  KEY `IDX_35D4282CFB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandescafes`
--

DROP TABLE IF EXISTS `commandescafes`;
CREATE TABLE IF NOT EXISTS `commandescafes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_4FF0789EA76ED395` (`user_id`),
  KEY `IDX_4FF0789E1C3356FB` (`acheteurs_id`),
  KEY `IDX_4FF0789E1DB279A6` (`departements_id`),
  KEY `IDX_4FF0789EFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandescafes_lignes`
--

DROP TABLE IF EXISTS `commandescafes_lignes`;
CREATE TABLE IF NOT EXISTS `commandescafes_lignes` (
  `commandescafes_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`commandescafes_id`,`lignes_id`),
  KEY `IDX_451E9032CB975167` (`commandescafes_id`),
  KEY `IDX_451E90325E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandescafes_ventes`
--

DROP TABLE IF EXISTS `commandescafes_ventes`;
CREATE TABLE IF NOT EXISTS `commandescafes_ventes` (
  `commandescafes_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`commandescafes_id`,`ventes_id`),
  KEY `IDX_4E1A35E2CB975167` (`commandescafes_id`),
  KEY `IDX_4E1A35E27D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `sectiondoc_id` int(11) DEFAULT NULL,
  `configname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42697833A76ED395` (`user_id`),
  UNIQUE KEY `UNIQ_426978339439C344` (`sectiondoc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

DROP TABLE IF EXISTS `departements`;
CREATE TABLE IF NOT EXISTS `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nifselect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrcselect` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nrc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banque` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `codepostal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siteweb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deff` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datemodif` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_CF7489B2A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `user_id`, `nom`, `nifselect`, `nrcselect`, `nif`, `nrc`, `iban`, `banque`, `bic`, `adresse`, `codepostal`, `ville`, `email`, `siteweb`, `fax`, `telephone`, `deff`, `datemodif`) VALUES
(1, 1, 'cafe2a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'Nom de votre entreprise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'Nom de votre entreprise', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_EE350ECBA76ED395` (`user_id`),
  KEY `IDX_EE350ECB1C3356FB` (`acheteurs_id`),
  KEY `IDX_EE350ECB1DB279A6` (`departements_id`),
  KEY `IDX_EE350ECBFACB6020` (`stocks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `user_id`, `acheteurs_id`, `departements_id`, `stocks_id`, `totalHT`, `totalTTC`, `totalReduction`, `type`, `nf`, `datecreation`, `lieu`, `additionnelle`, `dateadd`, `moderegle`, `dateregle`, `objet`, `etat`, `montantpaye`, `paiementrecu`, `dateenvois`, `nc`, `nomvendeur`, `informations`) VALUES
(2, 3, 2, 3, 1, '50000.00', '50000.00', NULL, 'fact', '2', '2019-05-21', NULL, 'Date limite de validité', '2019-05-21', 'Espèces', '5 jours', NULL, 'Créé', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `depenses_achats`
--

DROP TABLE IF EXISTS `depenses_achats`;
CREATE TABLE IF NOT EXISTS `depenses_achats` (
  `depenses_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`depenses_id`,`achats_id`),
  KEY `IDX_CB62DE31338B55D2` (`depenses_id`),
  KEY `IDX_CB62DE31645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `depenses_lignes`
--

DROP TABLE IF EXISTS `depenses_lignes`;
CREATE TABLE IF NOT EXISTS `depenses_lignes` (
  `depenses_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`depenses_id`,`lignes_id`),
  KEY `IDX_3DAAA135338B55D2` (`depenses_id`),
  KEY `IDX_3DAAA1355E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_8B27C52BA76ED395` (`user_id`),
  KEY `IDX_8B27C52B1C3356FB` (`acheteurs_id`),
  KEY `IDX_8B27C52B1DB279A6` (`departements_id`),
  KEY `IDX_8B27C52BFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis_lignes`
--

DROP TABLE IF EXISTS `devis_lignes`;
CREATE TABLE IF NOT EXISTS `devis_lignes` (
  `devis_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`devis_id`,`lignes_id`),
  KEY `IDX_53FD2A8641DEFADA` (`devis_id`),
  KEY `IDX_53FD2A865E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `devis_ventes`
--

DROP TABLE IF EXISTS `devis_ventes`;
CREATE TABLE IF NOT EXISTS `devis_ventes` (
  `devis_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`devis_id`,`ventes_id`),
  KEY `IDX_58F98F5641DEFADA` (`devis_id`),
  KEY `IDX_58F98F567D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diffprix`
--

DROP TABLE IF EXISTS `diffprix`;
CREATE TABLE IF NOT EXISTS `diffprix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produits_id` int(11) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `zonnestocks_id` int(11) DEFAULT NULL,
  `puHT` decimal(10,2) DEFAULT NULL,
  `puTTC` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_31D923F6CD11A2CF` (`produits_id`),
  KEY `IDX_31D923F64D79775F` (`tva_id`),
  KEY `IDX_31D923F628ADA6E0` (`zonnestocks_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `diffprix`
--

INSERT INTO `diffprix` (`id`, `produits_id`, `tva_id`, `zonnestocks_id`, `puHT`, `puTTC`) VALUES
(1, NULL, 1, 1, NULL, NULL),
(2, NULL, 1, 1, NULL, NULL),
(3, NULL, 1, 1, NULL, NULL),
(4, NULL, 1, 1, NULL, NULL),
(5, NULL, 1, 1, NULL, NULL),
(6, NULL, 1, 1, NULL, NULL),
(7, NULL, 1, 1, NULL, NULL),
(8, NULL, 1, 1, NULL, NULL),
(9, NULL, 1, 1, NULL, NULL),
(10, NULL, 1, 1, NULL, NULL),
(11, NULL, 1, 1, NULL, NULL),
(12, NULL, 1, 1, NULL, NULL),
(13, NULL, 1, 1, NULL, NULL),
(14, NULL, 1, 1, NULL, NULL),
(15, NULL, 1, 1, NULL, NULL),
(16, NULL, 1, 1, NULL, NULL),
(17, NULL, 1, 1, NULL, NULL),
(18, NULL, 1, 1, NULL, NULL),
(19, NULL, 1, 1, NULL, NULL),
(20, NULL, 1, 1, NULL, NULL),
(21, NULL, 1, 1, NULL, NULL),
(22, NULL, 1, 1, NULL, NULL),
(23, NULL, 1, 1, NULL, NULL),
(24, NULL, 1, 1, NULL, NULL),
(25, NULL, 1, 1, NULL, NULL),
(26, NULL, 1, 1, NULL, NULL),
(27, NULL, 1, 1, NULL, NULL),
(28, NULL, 1, 1, NULL, NULL),
(29, NULL, 1, 1, NULL, NULL),
(30, NULL, 1, 1, NULL, NULL),
(31, NULL, 1, 1, NULL, NULL),
(32, NULL, 1, 1, NULL, NULL),
(33, NULL, 1, 1, NULL, NULL),
(34, NULL, 1, 1, NULL, NULL),
(35, NULL, 1, 1, NULL, NULL),
(36, NULL, 1, 1, NULL, NULL),
(37, NULL, 1, 1, NULL, NULL),
(38, NULL, 1, 1, NULL, NULL),
(39, NULL, 1, 1, NULL, NULL),
(40, NULL, 1, 1, NULL, NULL),
(41, NULL, 1, 1, NULL, NULL),
(42, NULL, 1, 1, NULL, NULL),
(43, NULL, 1, 1, NULL, NULL),
(44, NULL, 1, 1, NULL, NULL),
(45, NULL, 1, 1, NULL, NULL),
(46, NULL, 1, 1, NULL, NULL),
(47, NULL, 1, 1, NULL, NULL),
(48, NULL, 1, 1, NULL, NULL),
(49, NULL, 1, 1, NULL, NULL),
(50, NULL, 1, 1, NULL, NULL),
(51, NULL, 1, 1, NULL, NULL),
(52, NULL, 1, 1, NULL, NULL),
(53, NULL, 1, 1, NULL, NULL),
(54, NULL, 1, 1, NULL, NULL),
(55, NULL, 1, 1, NULL, NULL),
(56, NULL, 1, 1, NULL, NULL),
(57, NULL, 1, 1, NULL, NULL),
(58, NULL, 1, 1, NULL, NULL),
(59, NULL, 1, 1, NULL, NULL),
(60, NULL, 1, 1, NULL, NULL),
(61, NULL, 1, 1, NULL, NULL),
(62, NULL, 1, 1, NULL, NULL),
(63, NULL, 1, 1, NULL, NULL),
(64, NULL, 1, 1, NULL, NULL),
(65, NULL, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A2B072881C3356FB` (`acheteurs_id`),
  KEY `IDX_A2B072881DB279A6` (`departements_id`),
  KEY `IDX_A2B07288FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `documents_achats`
--

DROP TABLE IF EXISTS `documents_achats`;
CREATE TABLE IF NOT EXISTS `documents_achats` (
  `documents_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`documents_id`,`achats_id`),
  KEY `IDX_6AA5A4085F0F2752` (`documents_id`),
  KEY `IDX_6AA5A408645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ext_log_entries`
--

DROP TABLE IF EXISTS `ext_log_entries`;
CREATE TABLE IF NOT EXISTS `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ext_translations`
--

DROP TABLE IF EXISTS `ext_translations`;
CREATE TABLE IF NOT EXISTS `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures`
--

DROP TABLE IF EXISTS `factures`;
CREATE TABLE IF NOT EXISTS `factures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` datetime NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` datetime DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` datetime DEFAULT NULL,
  `dateenvois` datetime DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nrc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_647590BA76ED395` (`user_id`),
  KEY `IDX_647590B1C3356FB` (`acheteurs_id`),
  KEY `IDX_647590B1DB279A6` (`departements_id`),
  KEY `IDX_647590BFACB6020` (`stocks_id`),
  KEY `IDX_647590BECFF285C` (`table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `factures_lignes`
--

DROP TABLE IF EXISTS `factures_lignes`;
CREATE TABLE IF NOT EXISTS `factures_lignes` (
  `factures_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`factures_id`,`lignes_id`),
  KEY `IDX_70E5DC89E9D518F9` (`factures_id`),
  KEY `IDX_70E5DC895E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

DROP TABLE IF EXISTS `familles`;
CREATE TABLE IF NOT EXISTS `familles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires`
--

DROP TABLE IF EXISTS `inventaires`;
CREATE TABLE IF NOT EXISTS `inventaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BB37A4531C3356FB` (`acheteurs_id`),
  KEY `IDX_BB37A4531DB279A6` (`departements_id`),
  KEY `IDX_BB37A453FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inventaires_achats`
--

DROP TABLE IF EXISTS `inventaires_achats`;
CREATE TABLE IF NOT EXISTS `inventaires_achats` (
  `inventaires_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`inventaires_id`,`achats_id`),
  KEY `IDX_29D178127A6D8980` (`inventaires_id`),
  KEY `IDX_29D17812645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignes`
--

DROP TABLE IF EXISTS `lignes`;
CREATE TABLE IF NOT EXISTS `lignes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logos`
--

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `alt` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_9F54004FA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lots`
--

DROP TABLE IF EXISTS `lots`;
CREATE TABLE IF NOT EXISTS `lots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `qte` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_916087CEF347EFB` (`produit_id`),
  KEY `IDX_916087CEE9D518F9` (`factures_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lots`
--

INSERT INTO `lots` (`id`, `produit_id`, `factures_id`, `qte`) VALUES
(1, NULL, NULL, NULL),
(2, NULL, NULL, NULL),
(3, NULL, NULL, NULL),
(4, NULL, NULL, NULL),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(11, NULL, NULL, NULL),
(12, NULL, NULL, NULL),
(13, NULL, NULL, NULL),
(14, NULL, NULL, NULL),
(15, NULL, NULL, NULL),
(16, NULL, NULL, NULL),
(17, NULL, NULL, NULL),
(18, NULL, NULL, NULL),
(19, NULL, NULL, NULL),
(20, NULL, NULL, NULL),
(21, NULL, NULL, NULL),
(22, NULL, NULL, NULL),
(23, NULL, NULL, NULL),
(24, NULL, NULL, NULL),
(25, NULL, NULL, NULL),
(26, NULL, NULL, NULL),
(27, NULL, NULL, NULL),
(28, NULL, NULL, NULL),
(29, NULL, NULL, NULL),
(30, NULL, NULL, NULL),
(31, NULL, NULL, NULL),
(32, NULL, NULL, NULL),
(33, 35, NULL, NULL),
(34, 36, NULL, NULL),
(35, 37, NULL, NULL),
(36, 38, NULL, NULL),
(37, 39, NULL, NULL),
(38, 40, NULL, NULL),
(39, 41, NULL, NULL),
(40, 42, NULL, NULL),
(41, 43, NULL, NULL),
(42, 44, NULL, NULL),
(43, 45, NULL, NULL),
(44, 46, NULL, NULL),
(45, 47, NULL, NULL),
(46, 48, NULL, NULL),
(47, 49, NULL, NULL),
(48, 50, NULL, NULL),
(49, 51, NULL, NULL),
(50, 52, NULL, NULL),
(51, 53, NULL, NULL),
(52, 54, NULL, NULL),
(53, 55, NULL, NULL),
(54, 56, NULL, NULL),
(55, 57, NULL, NULL),
(56, 58, NULL, NULL),
(57, 59, NULL, NULL),
(58, 60, NULL, NULL),
(59, 61, NULL, NULL),
(60, 62, NULL, NULL),
(61, 63, NULL, NULL),
(62, 64, NULL, NULL),
(63, 65, NULL, NULL),
(64, 66, NULL, NULL),
(65, 67, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lotsfactures`
--

DROP TABLE IF EXISTS `lotsfactures`;
CREATE TABLE IF NOT EXISTS `lotsfactures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `produits_id` int(11) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `tva2_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `datevente` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reduction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalreduct` decimal(10,2) DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  `qte` decimal(10,3) DEFAULT NULL,
  `puHT` decimal(10,2) DEFAULT NULL,
  `puHTreduit` decimal(9,2) DEFAULT NULL,
  `puTTC` decimal(10,2) DEFAULT NULL,
  `puTTCreduit` decimal(10,2) DEFAULT NULL,
  `prixHT` decimal(10,2) DEFAULT NULL,
  `prixTTCvente` decimal(10,2) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalHTa` decimal(10,2) DEFAULT NULL,
  `totalTTCa` decimal(10,2) DEFAULT NULL,
  `prixTTC` decimal(10,2) DEFAULT NULL,
  `unite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C048D988A76ED395` (`user_id`),
  KEY `IDX_C048D988CD11A2CF` (`produits_id`),
  KEY `IDX_C048D9884D79775F` (`tva_id`),
  KEY `IDX_C048D9883F40B76F` (`tva2_id`),
  KEY `IDX_C048D988E9D518F9` (`factures_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `paramgestions`
--

DROP TABLE IF EXISTS `paramgestions`;
CREATE TABLE IF NOT EXISTS `paramgestions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `autobl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autobe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_86A35955A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paramgestions`
--

INSERT INTO `paramgestions` (`id`, `user_id`, `autobl`, `autobe`) VALUES
(1, 1, '', ''),
(2, 3, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `pis`
--

DROP TABLE IF EXISTS `pis`;
CREATE TABLE IF NOT EXISTS `pis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D683412AA76ED395` (`user_id`),
  KEY `IDX_D683412A1C3356FB` (`acheteurs_id`),
  KEY `IDX_D683412A1DB279A6` (`departements_id`),
  KEY `IDX_D683412AFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pis_achats`
--

DROP TABLE IF EXISTS `pis_achats`;
CREATE TABLE IF NOT EXISTS `pis_achats` (
  `pis_id` int(11) NOT NULL,
  `achats_id` int(11) NOT NULL,
  PRIMARY KEY (`pis_id`,`achats_id`),
  KEY `IDX_3AA3E6D1CE48AA0E` (`pis_id`),
  KEY `IDX_3AA3E6D1645CAD33` (`achats_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `familles_id` int(11) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `fournisseurs_id` int(11) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `tva2_id` int(11) DEFAULT NULL,
  `images_id` int(11) DEFAULT NULL,
  `activlot` tinyint(1) DEFAULT NULL,
  `afterjoin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affichage` tinyint(1) DEFAULT NULL,
  `moretva` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moretva2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dp` tinyint(1) DEFAULT NULL,
  `aff` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `puHT` decimal(10,2) NOT NULL,
  `puTTC` decimal(10,2) DEFAULT NULL,
  `prixTTC` double DEFAULT NULL,
  `prixHt` double DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `qte` decimal(10,3) DEFAULT NULL,
  `qtedefault` int(11) NOT NULL,
  `qtealert` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moreunite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barecode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_BE2DDF8CD44F05E5` (`images_id`),
  KEY `IDX_BE2DDF8CA76ED395` (`user_id`),
  KEY `IDX_BE2DDF8CD335D67` (`familles_id`),
  KEY `IDX_BE2DDF8CA21214B7` (`categories_id`),
  KEY `IDX_BE2DDF8C27ACDDFD` (`fournisseurs_id`),
  KEY `IDX_BE2DDF8C4D79775F` (`tva_id`),
  KEY `IDX_BE2DDF8C3F40B76F` (`tva2_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `user_id`, `familles_id`, `categories_id`, `fournisseurs_id`, `tva_id`, `tva2_id`, `images_id`, `activlot`, `afterjoin`, `affichage`, `moretva`, `moretva2`, `dp`, `aff`, `description`, `puHT`, `puTTC`, `prixTTC`, `prixHt`, `totalHT`, `totalTTC`, `qte`, `qtedefault`, `qtealert`, `name`, `unite`, `moreunite`, `reference`, `barecode`) VALUES
(35, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri fraise', 'pc', NULL, NULL, NULL),
(36, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri carotte', 'pc', NULL, NULL, NULL),
(37, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri citron', 'pc', NULL, NULL, NULL),
(38, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri citron plast', 'pc', NULL, NULL, NULL),
(39, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri citron plast', 'pc', NULL, NULL, NULL),
(40, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri cocktail plast', 'pc', NULL, NULL, NULL),
(41, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ifri pomme poire', 'pc', NULL, NULL, NULL),
(42, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '80.00', '80.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'star enery', 'pc', NULL, NULL, NULL),
(43, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'star orange', 'pc', NULL, NULL, NULL),
(44, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '80.00', '80.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'star péche poire', 'pc', NULL, NULL, NULL),
(45, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia nature', 'pc', NULL, NULL, NULL),
(46, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia zeste', 'pc', NULL, NULL, NULL),
(47, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia ben haroun', 'pc', NULL, NULL, NULL),
(48, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia mojito', 'pc', NULL, NULL, NULL),
(49, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'toudja coctail', 'pc', NULL, NULL, NULL),
(50, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'toudja pomme', 'pc', NULL, NULL, NULL),
(51, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'toudja zeste', 'pc', NULL, NULL, NULL),
(52, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ramy ananas', 'pc', NULL, NULL, NULL),
(53, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ramy orange', 'pc', NULL, NULL, NULL),
(54, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ramy orange péche', 'pc', NULL, NULL, NULL),
(55, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'ngaous', 'pc', NULL, NULL, NULL),
(56, 1, NULL, 5, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '40.00', '40.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'Café presse', 'pc', NULL, NULL, NULL),
(57, 1, NULL, 5, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '40.00', '40.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'crème', 'pc', NULL, NULL, NULL),
(58, 1, NULL, 5, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '40.00', '40.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'thé', 'pc', NULL, NULL, NULL),
(59, 1, NULL, 6, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '30.00', '30.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'chamia', 'pc', NULL, NULL, NULL),
(60, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'tchina cocktail', 'pc', NULL, NULL, NULL),
(61, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '80.00', '80.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'tchina orange', 'pc', NULL, NULL, NULL),
(62, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '80.00', '80.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'izem energy', 'pc', NULL, NULL, NULL),
(63, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '60.00', '60.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'eau toudja', 'pc', NULL, NULL, NULL),
(64, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '30.00', '30.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'eau toudja sghira', 'pc', NULL, NULL, NULL),
(65, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia citron', 'pc', NULL, NULL, NULL),
(66, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia grenade', 'pc', NULL, NULL, NULL),
(67, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia pomme', 'pc', NULL, NULL, NULL),
(68, 1, NULL, 4, NULL, 1, 1, NULL, 0, '3', NULL, NULL, NULL, 0, '1', NULL, '70.00', '70.00', 0, 0, NULL, NULL, NULL, 1, NULL, 'mozaia menthe', 'pc', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits_lots`
--

DROP TABLE IF EXISTS `produits_lots`;
CREATE TABLE IF NOT EXISTS `produits_lots` (
  `produits_id` int(11) NOT NULL,
  `lots_id` int(11) NOT NULL,
  PRIMARY KEY (`produits_id`,`lots_id`),
  KEY `IDX_8CB7550CCD11A2CF` (`produits_id`),
  KEY `IDX_8CB7550CC400113F` (`lots_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits_lots`
--

INSERT INTO `produits_lots` (`produits_id`, `lots_id`) VALUES
(35, 32),
(36, 33),
(37, 34),
(38, 35),
(39, 36),
(40, 37),
(41, 38),
(42, 39),
(43, 40),
(44, 41),
(45, 42),
(46, 43),
(47, 44),
(48, 45),
(49, 46),
(50, 47),
(51, 48),
(52, 49),
(53, 50),
(54, 51),
(55, 52),
(56, 53),
(57, 54),
(58, 55),
(59, 56),
(60, 57),
(61, 58),
(62, 59),
(63, 60),
(64, 61),
(65, 62),
(66, 63),
(67, 64),
(68, 65);

-- --------------------------------------------------------

--
-- Structure de la table `proformas`
--

DROP TABLE IF EXISTS `proformas`;
CREATE TABLE IF NOT EXISTS `proformas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_743D3B45A76ED395` (`user_id`),
  KEY `IDX_743D3B451C3356FB` (`acheteurs_id`),
  KEY `IDX_743D3B451DB279A6` (`departements_id`),
  KEY `IDX_743D3B45FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proformas_lignes`
--

DROP TABLE IF EXISTS `proformas_lignes`;
CREATE TABLE IF NOT EXISTS `proformas_lignes` (
  `proformas_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`proformas_id`,`lignes_id`),
  KEY `IDX_53B9EC8574CA2946` (`proformas_id`),
  KEY `IDX_53B9EC855E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `proformas_ventes`
--

DROP TABLE IF EXISTS `proformas_ventes`;
CREATE TABLE IF NOT EXISTS `proformas_ventes` (
  `proformas_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`proformas_id`,`ventes_id`),
  KEY `IDX_58BD495574CA2946` (`proformas_id`),
  KEY `IDX_58BD49557D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recus`
--

DROP TABLE IF EXISTS `recus`;
CREATE TABLE IF NOT EXISTS `recus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalReduction` decimal(10,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_981D9BCFA76ED395` (`user_id`),
  KEY `IDX_981D9BCF1C3356FB` (`acheteurs_id`),
  KEY `IDX_981D9BCF1DB279A6` (`departements_id`),
  KEY `IDX_981D9BCFFACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recus_lignes`
--

DROP TABLE IF EXISTS `recus_lignes`;
CREATE TABLE IF NOT EXISTS `recus_lignes` (
  `recus_id` int(11) NOT NULL,
  `lignes_id` int(11) NOT NULL,
  PRIMARY KEY (`recus_id`,`lignes_id`),
  KEY `IDX_3BAB9953D012BDD` (`recus_id`),
  KEY `IDX_3BAB99535E4D2AA2` (`lignes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recus_ventes`
--

DROP TABLE IF EXISTS `recus_ventes`;
CREATE TABLE IF NOT EXISTS `recus_ventes` (
  `recus_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`recus_id`,`ventes_id`),
  KEY `IDX_30AF3C83D012BDD` (`recus_id`),
  KEY `IDX_30AF3C837D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `acheteurs_id` int(11) DEFAULT NULL,
  `departements_id` int(11) DEFAULT NULL,
  `stocks_id` int(11) DEFAULT NULL,
  `creele` datetime DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` date NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionnelle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateadd` date DEFAULT NULL,
  `moderegle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateregle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montantpaye` decimal(10,2) DEFAULT NULL,
  `paiementrecu` date DEFAULT NULL,
  `dateenvois` date DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `nomvendeur` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `informations` longtext COLLATE utf8_unicode_ci,
  `editerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expedierpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receptionnerpar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ncommande` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4DA239A76ED395` (`user_id`),
  KEY `IDX_4DA2391C3356FB` (`acheteurs_id`),
  KEY `IDX_4DA2391DB279A6` (`departements_id`),
  KEY `IDX_4DA239FACB6020` (`stocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations_ventes`
--

DROP TABLE IF EXISTS `reservations_ventes`;
CREATE TABLE IF NOT EXISTS `reservations_ventes` (
  `reservations_id` int(11) NOT NULL,
  `ventes_id` int(11) NOT NULL,
  PRIMARY KEY (`reservations_id`,`ventes_id`),
  KEY `IDX_54936385D9A7F869` (`reservations_id`),
  KEY `IDX_549363857D9932C` (`ventes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sectiondocs`
--

DROP TABLE IF EXISTS `sectiondocs`;
CREATE TABLE IF NOT EXISTS `sectiondocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `default_tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_tax_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_tax2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_tax2_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_tax2_visible` tinyint(1) DEFAULT NULL,
  `invoice_tax3_visible` tinyint(1) DEFAULT NULL,
  `default_tax3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_tax3_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C7E0E11FA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sectiondocs`
--

INSERT INTO `sectiondocs` (`id`, `user_id`, `default_tax`, `invoice_tax_name`, `default_tax2`, `invoice_tax2_name`, `invoice_tax2_visible`, `invoice_tax3_visible`, `default_tax3`, `invoice_tax3_name`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `suivi_facts`
--

DROP TABLE IF EXISTS `suivi_facts`;
CREATE TABLE IF NOT EXISTS `suivi_facts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factures_id` int(11) DEFAULT NULL,
  `proformas_id` int(11) DEFAULT NULL,
  `recus_id` int(11) DEFAULT NULL,
  `devis_id` int(11) DEFAULT NULL,
  `bonscommandes_id` int(11) DEFAULT NULL,
  `commandescafes_id` int(11) DEFAULT NULL,
  `depenses_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `par` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `texte` longtext COLLATE utf8_unicode_ci,
  `etat` longtext COLLATE utf8_unicode_ci,
  `prix` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_38082CB8E9D518F9` (`factures_id`),
  KEY `IDX_38082CB874CA2946` (`proformas_id`),
  KEY `IDX_38082CB8D012BDD` (`recus_id`),
  KEY `IDX_38082CB841DEFADA` (`devis_id`),
  KEY `IDX_38082CB8F4B4ABA5` (`bonscommandes_id`),
  KEY `IDX_38082CB8CB975167` (`commandescafes_id`),
  KEY `IDX_38082CB8338B55D2` (`depenses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_84470221A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tables`
--

INSERT INTO `tables` (`id`, `user_id`, `nom`) VALUES
(1, 2, 'Comptoir'),
(2, 2, 'Table 01'),
(3, 2, 'Table 02'),
(4, 2, 'Table 03'),
(5, 2, 'Table 04'),
(6, 2, 'Table 05'),
(7, 3, 'Comptoir'),
(8, 3, 'Table 01'),
(9, 3, 'Table 02'),
(10, 3, 'Table 03'),
(11, 3, 'Table 04'),
(12, 3, 'Table 05'),
(13, 1, 'Contoire'),
(14, 1, 'Table 01'),
(15, 1, 'Table 02'),
(16, 1, 'Table 03'),
(17, 1, 'Table 04'),
(18, 1, 'Table 05'),
(19, 1, 'Table 06'),
(20, 1, 'Table 07'),
(21, 1, 'Table 08'),
(22, 1, 'Table 09'),
(23, 1, 'Table 10'),
(24, 1, 'Table 11'),
(25, 1, 'Table 12'),
(26, 1, 'Table 13'),
(27, 1, 'Table 14'),
(28, 1, 'Table 15'),
(29, 1, 'Table 16'),
(30, 1, 'Table 17'),
(31, 1, 'Table 18'),
(32, 1, 'Table 19'),
(33, 1, 'Table 20');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

DROP TABLE IF EXISTS `tva`;
CREATE TABLE IF NOT EXISTS `tva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `multiplicate` double DEFAULT NULL,
  `nom` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valeur` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EF699620A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`id`, `user_id`, `multiplicate`, `nom`, `valeur`) VALUES
(1, 1, 0, '0', 0),
(2, 1, 19, '19', 19),
(3, 2, 0, '0', 0),
(4, 2, 0, '19', 19),
(5, 3, 0, '0', 0),
(6, 3, 0, '19', 19);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_2DA17977C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 1, NULL, '$2y$13$/4wECL3KrasR0z2yxE9dcuNwT73iUQeDkrLvekjCsoEQgLjjXSSu.', '2019-05-21 03:05:48', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(2, 'bahdi', 'bahdi', 'elm3hdi@gmail.com', 'elm3hdi@gmail.com', 0, NULL, '$2y$13$Y0SILJqw9FKwvTN7VUmZZ.6ULGPu487FNzfNKSsYF8.GEPRUqXfg6', NULL, '0PD_cauXxZR_JeKDm_PwreRFvJges1FCnKlD9Ju-H4k', NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(3, 'mehdi', 'mehdi', 'mehdi@creativ-dz.com', 'mehdi@creativ-dz.com', 1, NULL, '$2y$13$N6ZQcirO0JR4RAeOQWW4iugxC4OaBu0DLSEUroWWioIh80h/NOIU6', '2019-05-21 00:54:37', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_497B315E92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_497B315EA0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_497B315EC05FB297` (`confirmation_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateursadresses`
--

DROP TABLE IF EXISTS `utilisateursadresses`;
CREATE TABLE IF NOT EXISTS `utilisateursadresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) DEFAULT NULL,
  `nom` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pays` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `ville` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `complement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_95A7AD7AFB88E14F` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `produits_id` int(11) DEFAULT NULL,
  `tva_id` int(11) DEFAULT NULL,
  `tva2_id` int(11) DEFAULT NULL,
  `factures_id` int(11) DEFAULT NULL,
  `datevente` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reduction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalreduct` decimal(10,2) DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  `qte` decimal(10,3) DEFAULT NULL,
  `puHT` decimal(10,2) DEFAULT NULL,
  `puHTreduit` decimal(9,2) DEFAULT NULL,
  `puTTC` decimal(10,2) DEFAULT NULL,
  `puTTCreduit` decimal(10,2) DEFAULT NULL,
  `prixHT` decimal(10,2) DEFAULT NULL,
  `prixTTCvente` decimal(10,2) DEFAULT NULL,
  `totalHT` decimal(10,2) DEFAULT NULL,
  `totalTTC` decimal(10,2) DEFAULT NULL,
  `totalHTa` decimal(10,2) DEFAULT NULL,
  `totalTTCa` decimal(10,2) DEFAULT NULL,
  `prixTTC` decimal(10,2) DEFAULT NULL,
  `unite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64EC489AA76ED395` (`user_id`),
  KEY `IDX_64EC489ACD11A2CF` (`produits_id`),
  KEY `IDX_64EC489A4D79775F` (`tva_id`),
  KEY `IDX_64EC489A3F40B76F` (`tva2_id`),
  KEY `IDX_64EC489AE9D518F9` (`factures_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `ville_id` int(11) NOT NULL AUTO_INCREMENT,
  `ville_departement` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_nom_simple` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_nom_reel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_nom_soundex` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_nom_metaphone` varchar(22) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_code_postal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_commune` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_code_commune` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ville_arrondissement` smallint(6) DEFAULT NULL,
  `ville_canton` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_amdi` smallint(6) DEFAULT NULL,
  `ville_population_2010` int(11) DEFAULT NULL,
  `ville_population_1999` int(11) DEFAULT NULL,
  `ville_population_2012` int(11) DEFAULT NULL,
  `ville_densite_2010` int(11) DEFAULT NULL,
  `ville_surface` double DEFAULT NULL,
  `ville_longitude_deg` double DEFAULT NULL,
  `ville_latitude_deg` double DEFAULT NULL,
  `ville_longitude_grd` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_latitude_grd` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_longitude_dms` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_latitude_dms` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville_zmin` int(11) DEFAULT NULL,
  `ville_zmax` int(11) DEFAULT NULL,
  PRIMARY KEY (`ville_id`),
  UNIQUE KEY `ville_code_commune_2` (`ville_code_commune`),
  UNIQUE KEY `ville_slug` (`ville_slug`),
  KEY `ville_departement` (`ville_departement`),
  KEY `ville_nom` (`ville_nom`),
  KEY `ville_nom_reel` (`ville_nom_reel`),
  KEY `ville_code_postal` (`ville_code_postal`),
  KEY `ville_longitude_latitude_deg` (`ville_longitude_deg`,`ville_latitude_deg`),
  KEY `ville_nom_soundex` (`ville_nom_soundex`),
  KEY `ville_nom_metaphone` (`ville_nom_metaphone`),
  KEY `ville_population_2010` (`ville_population_2010`),
  KEY `ville_nom_simple` (`ville_nom_simple`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `zonnestocks`
--

DROP TABLE IF EXISTS `zonnestocks`;
CREATE TABLE IF NOT EXISTS `zonnestocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nom` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  `types` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_389D563DA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `zonnestocks`
--

INSERT INTO `zonnestocks` (`id`, `user_id`, `nom`, `description`, `types`) VALUES
(1, 1, 'gestion de stokck 1', NULL, 'Normal');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `FK_9920924E28ADA6E0` FOREIGN KEY (`zonnestocks_id`) REFERENCES `zonnestocks` (`id`),
  ADD CONSTRAINT `FK_9920924E338B55D2` FOREIGN KEY (`depenses_id`) REFERENCES `depenses` (`id`),
  ADD CONSTRAINT `FK_9920924E3F40B76F` FOREIGN KEY (`tva2_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_9920924E4D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_9920924EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_9920924ECD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `acheteurs`
--
ALTER TABLE `acheteurs`
  ADD CONSTRAINT `FK_95806A0DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `acheteurs_factures`
--
ALTER TABLE `acheteurs_factures`
  ADD CONSTRAINT `FK_5D5E2A4D1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5D5E2A4DE9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aprodoc`
--
ALTER TABLE `aprodoc`
  ADD CONSTRAINT `FK_22D8E56218265AAD` FOREIGN KEY (`bts_id`) REFERENCES `bts` (`id`),
  ADD CONSTRAINT `FK_22D8E56245A6E49F` FOREIGN KEY (`bes_id`) REFERENCES `bes` (`id`),
  ADD CONSTRAINT `FK_22D8E56248B686EE` FOREIGN KEY (`bls_id`) REFERENCES `bls` (`id`),
  ADD CONSTRAINT `FK_22D8E562CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `aprofact`
--
ALTER TABLE `aprofact`
  ADD CONSTRAINT `FK_866367B8CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `FK_866367B8D012BDD` FOREIGN KEY (`recus_id`) REFERENCES `recus` (`id`),
  ADD CONSTRAINT `FK_866367B8E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `bcs`
--
ALTER TABLE `bcs`
  ADD CONSTRAINT `FK_33CEDEBE1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_33CEDEBE1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_33CEDEBEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_33CEDEBEFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `bcs_achats`
--
ALTER TABLE `bcs_achats`
  ADD CONSTRAINT `FK_8CD63D9A645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8CD63D9ACAE6113F` FOREIGN KEY (`bcs_id`) REFERENCES `bcs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `becs`
--
ALTER TABLE `becs`
  ADD CONSTRAINT `FK_79ABF1BD1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_79ABF1BD1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_79ABF1BDFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `becs_achats`
--
ALTER TABLE `becs_achats`
  ADD CONSTRAINT `FK_EEBFD080645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EEBFD080E7640296` FOREIGN KEY (`becs_id`) REFERENCES `becs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bes`
--
ALTER TABLE `bes`
  ADD CONSTRAINT `FK_659479381C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_659479381DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_65947938A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_65947938E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `depenses` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_65947938FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `bes_achats`
--
ALTER TABLE `bes_achats`
  ADD CONSTRAINT `FK_FFCC441045A6E49F` FOREIGN KEY (`bes_id`) REFERENCES `bes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FFCC4410645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `blcs`
--
ALTER TABLE `blcs`
  ADD CONSTRAINT `FK_767ACA321C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_767ACA321DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_767ACA32A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_767ACA32FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `blcs_achats`
--
ALTER TABLE `blcs_achats`
  ADD CONSTRAINT `FK_12AAFB4A645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_12AAFB4AC06B535E` FOREIGN KEY (`blcs_id`) REFERENCES `blcs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bls`
--
ALTER TABLE `bls`
  ADD CONSTRAINT `FK_B456C2711C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_B456C2711DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_B456C271A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_B456C271E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_B456C271FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `bls_ventes`
--
ALTER TABLE `bls_ventes`
  ADD CONSTRAINT `FK_AEA3289F48B686EE` FOREIGN KEY (`bls_id`) REFERENCES `bls` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AEA3289F7D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bonscommandes`
--
ALTER TABLE `bonscommandes`
  ADD CONSTRAINT `FK_F71C65C91C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_F71C65C91DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_F71C65C9A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_F71C65C9FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `bonscommandes_lignes`
--
ALTER TABLE `bonscommandes_lignes`
  ADD CONSTRAINT `FK_29C61AE55E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_29C61AE5F4B4ABA5` FOREIGN KEY (`bonscommandes_id`) REFERENCES `bonscommandes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bonscommandes_ventes`
--
ALTER TABLE `bonscommandes_ventes`
  ADD CONSTRAINT `FK_22C2BF357D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_22C2BF35F4B4ABA5` FOREIGN KEY (`bonscommandes_id`) REFERENCES `bonscommandes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `bts`
--
ALTER TABLE `bts`
  ADD CONSTRAINT `FK_364D5A281C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_364D5A281DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_364D5A28A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_364D5A28FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `bts_ventes`
--
ALTER TABLE `bts_ventes`
  ADD CONSTRAINT `FK_B9BBC8F618265AAD` FOREIGN KEY (`bts_id`) REFERENCES `bts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B9BBC8F67D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cachets`
--
ALTER TABLE `cachets`
  ADD CONSTRAINT `FK_8D91237A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_3AF34668A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `cis`
--
ALTER TABLE `cis`
  ADD CONSTRAINT `FK_C8E35C031C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_C8E35C031DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_C8E35C03A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C8E35C03FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `cis_ventes`
--
ALTER TABLE `cis_ventes`
  ADD CONSTRAINT `FK_BF606EE4B0ADA3B` FOREIGN KEY (`cis_id`) REFERENCES `cis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BF606EE7D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_35D4282CFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commandescafes`
--
ALTER TABLE `commandescafes`
  ADD CONSTRAINT `FK_4FF0789E1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_4FF0789E1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_4FF0789EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_4FF0789EFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `commandescafes_lignes`
--
ALTER TABLE `commandescafes_lignes`
  ADD CONSTRAINT `FK_451E90325E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_451E9032CB975167` FOREIGN KEY (`commandescafes_id`) REFERENCES `commandescafes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commandescafes_ventes`
--
ALTER TABLE `commandescafes_ventes`
  ADD CONSTRAINT `FK_4E1A35E27D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4E1A35E2CB975167` FOREIGN KEY (`commandescafes_id`) REFERENCES `commandescafes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `configs`
--
ALTER TABLE `configs`
  ADD CONSTRAINT `FK_426978339439C344` FOREIGN KEY (`sectiondoc_id`) REFERENCES `sectiondocs` (`id`),
  ADD CONSTRAINT `FK_42697833A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `FK_CF7489B2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `FK_EE350ECB1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_EE350ECB1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_EE350ECBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_EE350ECBFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `depenses_achats`
--
ALTER TABLE `depenses_achats`
  ADD CONSTRAINT `FK_CB62DE31338B55D2` FOREIGN KEY (`depenses_id`) REFERENCES `depenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CB62DE31645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `depenses_lignes`
--
ALTER TABLE `depenses_lignes`
  ADD CONSTRAINT `FK_3DAAA135338B55D2` FOREIGN KEY (`depenses_id`) REFERENCES `depenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3DAAA1355E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `FK_8B27C52B1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_8B27C52B1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_8B27C52BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_8B27C52BFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `devis_lignes`
--
ALTER TABLE `devis_lignes`
  ADD CONSTRAINT `FK_53FD2A8641DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_53FD2A865E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `devis_ventes`
--
ALTER TABLE `devis_ventes`
  ADD CONSTRAINT `FK_58F98F5641DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_58F98F567D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `diffprix`
--
ALTER TABLE `diffprix`
  ADD CONSTRAINT `FK_31D923F628ADA6E0` FOREIGN KEY (`zonnestocks_id`) REFERENCES `zonnestocks` (`id`),
  ADD CONSTRAINT `FK_31D923F64D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_31D923F6CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `FK_A2B072881C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_A2B072881DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_A2B07288FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `documents_achats`
--
ALTER TABLE `documents_achats`
  ADD CONSTRAINT `FK_6AA5A4085F0F2752` FOREIGN KEY (`documents_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_6AA5A408645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `factures`
--
ALTER TABLE `factures`
  ADD CONSTRAINT `FK_647590B1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_647590B1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_647590BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_647590BECFF285C` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `FK_647590BFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `factures_lignes`
--
ALTER TABLE `factures_lignes`
  ADD CONSTRAINT `FK_70E5DC895E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_70E5DC89E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `inventaires`
--
ALTER TABLE `inventaires`
  ADD CONSTRAINT `FK_BB37A4531C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_BB37A4531DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_BB37A453FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `inventaires_achats`
--
ALTER TABLE `inventaires_achats`
  ADD CONSTRAINT `FK_29D17812645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_29D178127A6D8980` FOREIGN KEY (`inventaires_id`) REFERENCES `inventaires` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `logos`
--
ALTER TABLE `logos`
  ADD CONSTRAINT `FK_9F54004FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `lots`
--
ALTER TABLE `lots`
  ADD CONSTRAINT `FK_916087CEE9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_916087CEF347EFB` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `lotsfactures`
--
ALTER TABLE `lotsfactures`
  ADD CONSTRAINT `FK_C048D9883F40B76F` FOREIGN KEY (`tva2_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_C048D9884D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_C048D988A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C048D988CD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_C048D988E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `paramgestions`
--
ALTER TABLE `paramgestions`
  ADD CONSTRAINT `FK_86A35955A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `pis`
--
ALTER TABLE `pis`
  ADD CONSTRAINT `FK_D683412A1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_D683412A1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_D683412AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_D683412AFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `pis_achats`
--
ALTER TABLE `pis_achats`
  ADD CONSTRAINT `FK_3AA3E6D1645CAD33` FOREIGN KEY (`achats_id`) REFERENCES `achats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3AA3E6D1CE48AA0E` FOREIGN KEY (`pis_id`) REFERENCES `pis` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_BE2DDF8C27ACDDFD` FOREIGN KEY (`fournisseurs_id`) REFERENCES `fournisseurs` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8C3F40B76F` FOREIGN KEY (`tva2_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8C4D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CD335D67` FOREIGN KEY (`familles_id`) REFERENCES `familles` (`id`),
  ADD CONSTRAINT `FK_BE2DDF8CD44F05E5` FOREIGN KEY (`images_id`) REFERENCES `medias` (`id`);

--
-- Contraintes pour la table `produits_lots`
--
ALTER TABLE `produits_lots`
  ADD CONSTRAINT `FK_8CB7550CC400113F` FOREIGN KEY (`lots_id`) REFERENCES `lots` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_8CB7550CCD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `proformas`
--
ALTER TABLE `proformas`
  ADD CONSTRAINT `FK_743D3B451C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_743D3B451DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_743D3B45A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_743D3B45FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `proformas_lignes`
--
ALTER TABLE `proformas_lignes`
  ADD CONSTRAINT `FK_53B9EC855E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_53B9EC8574CA2946` FOREIGN KEY (`proformas_id`) REFERENCES `proformas` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `proformas_ventes`
--
ALTER TABLE `proformas_ventes`
  ADD CONSTRAINT `FK_58BD495574CA2946` FOREIGN KEY (`proformas_id`) REFERENCES `proformas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_58BD49557D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recus`
--
ALTER TABLE `recus`
  ADD CONSTRAINT `FK_981D9BCF1C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_981D9BCF1DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_981D9BCFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_981D9BCFFACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `recus_lignes`
--
ALTER TABLE `recus_lignes`
  ADD CONSTRAINT `FK_3BAB99535E4D2AA2` FOREIGN KEY (`lignes_id`) REFERENCES `lignes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3BAB9953D012BDD` FOREIGN KEY (`recus_id`) REFERENCES `recus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recus_ventes`
--
ALTER TABLE `recus_ventes`
  ADD CONSTRAINT `FK_30AF3C837D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_30AF3C83D012BDD` FOREIGN KEY (`recus_id`) REFERENCES `recus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `FK_4DA2391C3356FB` FOREIGN KEY (`acheteurs_id`) REFERENCES `acheteurs` (`id`),
  ADD CONSTRAINT `FK_4DA2391DB279A6` FOREIGN KEY (`departements_id`) REFERENCES `departements` (`id`),
  ADD CONSTRAINT `FK_4DA239A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_4DA239FACB6020` FOREIGN KEY (`stocks_id`) REFERENCES `zonnestocks` (`id`);

--
-- Contraintes pour la table `reservations_ventes`
--
ALTER TABLE `reservations_ventes`
  ADD CONSTRAINT `FK_549363857D9932C` FOREIGN KEY (`ventes_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_54936385D9A7F869` FOREIGN KEY (`reservations_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `sectiondocs`
--
ALTER TABLE `sectiondocs`
  ADD CONSTRAINT `FK_C7E0E11FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `suivi_facts`
--
ALTER TABLE `suivi_facts`
  ADD CONSTRAINT `FK_38082CB8338B55D2` FOREIGN KEY (`depenses_id`) REFERENCES `depenses` (`id`),
  ADD CONSTRAINT `FK_38082CB841DEFADA` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`),
  ADD CONSTRAINT `FK_38082CB874CA2946` FOREIGN KEY (`proformas_id`) REFERENCES `proformas` (`id`),
  ADD CONSTRAINT `FK_38082CB8CB975167` FOREIGN KEY (`commandescafes_id`) REFERENCES `commandescafes` (`id`),
  ADD CONSTRAINT `FK_38082CB8D012BDD` FOREIGN KEY (`recus_id`) REFERENCES `recus` (`id`),
  ADD CONSTRAINT `FK_38082CB8E9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`),
  ADD CONSTRAINT `FK_38082CB8F4B4ABA5` FOREIGN KEY (`bonscommandes_id`) REFERENCES `bonscommandes` (`id`);

--
-- Contraintes pour la table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `FK_84470221A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `tva`
--
ALTER TABLE `tva`
  ADD CONSTRAINT `FK_EF699620A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `utilisateursadresses`
--
ALTER TABLE `utilisateursadresses`
  ADD CONSTRAINT `FK_95A7AD7AFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `FK_64EC489A3F40B76F` FOREIGN KEY (`tva2_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_64EC489A4D79775F` FOREIGN KEY (`tva_id`) REFERENCES `tva` (`id`),
  ADD CONSTRAINT `FK_64EC489AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_64EC489ACD11A2CF` FOREIGN KEY (`produits_id`) REFERENCES `produits` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_64EC489AE9D518F9` FOREIGN KEY (`factures_id`) REFERENCES `factures` (`id`);

--
-- Contraintes pour la table `zonnestocks`
--
ALTER TABLE `zonnestocks`
  ADD CONSTRAINT `FK_389D563DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
