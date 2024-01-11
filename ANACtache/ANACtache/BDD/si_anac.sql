-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 10 Janvier 2024 à 12:17
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `si_anac`
--

-- --------------------------------------------------------

--
-- Structure de la table `aeronef_adna`
--

CREATE TABLE `aeronef_adna` (
  `idaeronef` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nomaeronef` varchar(50) NOT NULL,
  `immataeronef` varchar(100) NOT NULL,
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `datesaizi` varchar(50) NOT NULL,
  `tonnage` varchar(20) NOT NULL,
  `numserie` varchar(70) NOT NULL,
  `nbremoteur` varchar(50) NOT NULL COMMENT 'Catégorie du Drone',
  `enverugur` varchar(50) NOT NULL COMMENT 'Classe du Drone',
  `drone` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `aeronef_adna`
--

INSERT INTO `aeronef_adna` (`idaeronef`, `nomaeronef`, `immataeronef`, `numat`, `datesaizi`, `tonnage`, `numserie`, `nbremoteur`, `enverugur`, `drone`) VALUES
(999, 'ZEGR', 'RTHT', 4401, '04-07-2023 à 13:32:50', '', '', '', '', 'NON'),
(1000, 'REKIAT', 'DEF', 0085, '04-07-2023 à 17:28:17', '', '', '', '', 'NON'),
(1011, 'XXX', '777-228', 0000, '10-01-2024 à 08:07:37', '', '', '', '', 'NON');

-- --------------------------------------------------------

--
-- Structure de la table `attributeur_tache`
--

CREATE TABLE `attributeur_tache` (
  `idattributeur` int(4) NOT NULL,
  `numat` int(4) NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `nomattributeur` varchar(255) DEFAULT NULL,
  `personnelanac` varchar(3) NOT NULL,
  `emailanac` varchar(255) NOT NULL COMMENT 'POUR ENVYER EMAIL OTOMATIK ATTRIBUTR CHOSI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `attributeur_tache`
--

INSERT INTO `attributeur_tache` (`idattributeur`, `numat`, `dateheuresaisi`, `nomattributeur`, `personnelanac`, `emailanac`) VALUES
(1, 0, '10/01/2024 à 09:07:37', 'JOHN AZOMAHOU', 'OUI', 'johnazomahou@gmail.com'),
(5, 0, '10/01/2024 à 10:01:53', 'RUFIN MBADINGA ', 'OUI', 'rufin.mbadinga@anac-gabon.com'),
(6, 0, '10/01/2024 à 10:03:14', 'RUFIN THALES', 'OUI', 'mbadingarufin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `centre_formation`
--

CREATE TABLE `centre_formation` (
  `idcentre` int(11) NOT NULL,
  `nomcentre` varchar(100) NOT NULL,
  `villecentre` text NOT NULL,
  `payscentre` text NOT NULL,
  `contactcentre` varchar(50) NOT NULL COMMENT 'telephone mobile',
  `iduser` int(4) NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `emailcentre` varchar(80) NOT NULL,
  `adressecentre` varchar(100) NOT NULL,
  `idtypecentre` int(4) NOT NULL,
  `statut_centre` varchar(50) NOT NULL,
  `telefixe` varchar(15) NOT NULL COMMENT 'telephone fixe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `centre_formation`
--

INSERT INTO `centre_formation` (`idcentre`, `nomcentre`, `villecentre`, `payscentre`, `contactcentre`, `iduser`, `dateheuresaisi`, `emailcentre`, `adressecentre`, `idtypecentre`, `statut_centre`, `telefixe`) VALUES
(32, 'MOUKMBAD', 'LIBREVILLE', '090', '06', 109, '29-08-2023 Ã  11:29:13', 'mbadingarufin@gmail.com', 'AÃ‰ROPORT DE LIBREVILLE', 3, 'Deja suivi', '+654200'),
(33, 'MVV', 'LIBREVILLE', '551', '06', 109, '29-08-2023 Ã  11:32:58', 'mbadingarufin@gmail.com', 'AÃ‰ROPORT DE LIBREVILLE', 3, 'Deja suivi', '+654200');

-- --------------------------------------------------------

--
-- Structure de la table `direction_anac`
--

CREATE TABLE `direction_anac` (
  `codedirec` int(11) NOT NULL,
  `libdirec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `direction_anac`
--

INSERT INTO `direction_anac` (`codedirec`, `libdirec`) VALUES
(1, 'Administrateur'),
(7, 'Conseil D''administration'),
(8, '\n                                                 \n                                                 Direction GÃ©nÃ©rale'),
(9, 'Direction Administrative & FinanciÃ¨re'),
(10, '\n                                                 \n                                                 \n                                                 Direction de la RÃ©glementation, des Affaires Juridiques'),
(11, '\n                                                 \n                                                 Direction des AÃ©rodromes et des Equipements AÃ©ronautiques'),
(12, 'Direction de la SuretÃ© et de la Facilitation'),
(13, 'Direction de l''Exploitation AÃ©rienne'),
(14, 'Direction de la NavigabilitÃ©'),
(16, 'DSI');

-- --------------------------------------------------------

--
-- Structure de la table `document_delivre_anactache`
--

CREATE TABLE `document_delivre_anactache` (
  `iddocdelivre` int(4) UNSIGNED ZEROFILL NOT NULL,
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `nomdocdelivre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `document_delivre_anactache`
--

INSERT INTO `document_delivre_anactache` (`iddocdelivre`, `numat`, `dateheuresaisi`, `nomdocdelivre`) VALUES
(0000, 0000, '', NULL),
(0007, 0065, '31/05/2023 à 13:08:31', 'BILAN PEL'),
(0008, 0065, '31/05/2023 à 13:08:31', 'VALIDATION PNT'),
(0009, 0065, '31/05/2023 à 13:08:31', 'LICENCE PNT'),
(0010, 0065, '31/05/2023 à 13:08:31', 'APPOSITION CERTIFICAT D''APTITUDE MÉDICALE'),
(0011, 0065, '31/05/2023 à 13:08:31', 'APPOSITION QT ATR 42/72'),
(0012, 0065, '31/05/2023 à 13:08:31', 'DOSSIERS A RENOUVELLER'),
(0013, 0065, '31/05/2023 à 13:08:31', 'ATTENTE AUTHENTIFIC'),
(0014, 0065, '31/05/2023 à 13:08:31', 'ATTENTE FORMULAIRES'),
(0015, 0065, '31/05/2023 à 14:05:48', 'DELIVRANCE CTA'),
(0016, 0065, '03/07/2023 à 16:54:46', 'CTA');

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `iddomaine` int(11) NOT NULL,
  `nomdomaine` varchar(255) NOT NULL,
  `libel_domaine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`iddomaine`, `nomdomaine`, `libel_domaine`) VALUES
(22, 'OMA', 'Maintenance des Aéronèfs'),
(23, 'AVSEC', 'SÃ»retÃ©'),
(24, 'PEL', 'Licence et formation du personnel aÃ©ronautique'),
(25, '\n												 ANS', '\n							                            Navigation AÃ©rienne'),
(26, 'AGA', '                                                        Gestion des AÃ©rodromes'),
(27, 'AIR							', 'NavigabilitÃ© des AÃ©ronefs'),
(28, 'FACILITATION', 'FACILITATION'),
(29, 'OPS', '							                            Exploitation technique des aÃ©ronefs'),
(30, 'SAFA', ''),
(31, 'SANA', ''),
(32, 'MD', 'MARCHANDISES DANGEREUSES'),
(33, 'CTA', ''),
(35, 'ATO', ''),
(36, 'CEMA', ''),
(37, 'ANSP', ''),
(38, 'EXAMINATEURSÂ DÃ‰SIGNES', 'EXAMINATEURS DESIGNES'),
(40, 'IAI', ''),
(41, 'ORG', ''),
(42, 'IT', '');

-- --------------------------------------------------------

--
-- Structure de la table `emetteur_tache`
--

CREATE TABLE `emetteur_tache` (
  `idemetteur` int(4) NOT NULL,
  `numat` int(4) NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `nomemetteur` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emetteur_tache`
--

INSERT INTO `emetteur_tache` (`idemetteur`, `numat`, `dateheuresaisi`, `nomemetteur`) VALUES
(1, 0, '10/01/2024 à 09:07:37', 'BENIN TELECOM');

-- --------------------------------------------------------

--
-- Structure de la table `fonction_anac`
--

CREATE TABLE `fonction_anac` (
  `codefct` int(11) NOT NULL,
  `libfct` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonction_anac`
--

INSERT INTO `fonction_anac` (`codefct`, `libfct`) VALUES
(0, 'DEVEFULL STACK'),
(1, 'Administrateur'),
(3, '                                                                                                  Juristevb'),
(15, 'Technicien en  Informatique'),
(16, 'CadreÂ  Ressources Humaines'),
(17, 'Directeur GÃ©nÃ©ral'),
(18, 'Directeur GÃ©nÃ©ral Adjoint'),
(19, 'Vice-PrÃ©sident'),
(20, 'PrÃ©sident'),
(21, 'Assistante de Direction du PCA'),
(22, 'Assistante de Direction du VPCA'),
(23, 'Chef de Bureau Courrier'),
(24, 'Chef de Service Informatique'),
(25, 'Assistante de Direction 2  DG-D'),
(26, 'Conseiller du Directeur GÃ©nÃ©ral'),
(27, 'Chef de Bureau Communication'),
(28, 'Inspecteur Nav'),
(29, 'Assistante de Direction 1 DG-D'),
(31, 'Administrateur RÃ©seau et SystÃ¨me'),
(32, 'Cadre Assistant QualitÃ©'),
(33, 'Directeur GÃ©nÃ©ral Adjoint '),
(34, 'Assistante de Direction CI'),
(35, 'Agent QualitÃ©'),
(36, 'Le Chef Inspecteur'),
(38, 'Directeur Administrative & Financier'),
(39, 'Assistante de Direction DAF'),
(40, 'Technicienne de Surface '),
(42, 'Chef de Bureau ComptabilitÃ©'),
(45, 'Chef de Service FH-FA'),
(46, 'Chef de Service FC'),
(47, 'Agent de Liaison'),
(48, 'Agent Administratif'),
(49, 'Agent Administratif Moyens GÃ©nÃ©reaux'),
(50, 'Directeur Juridique'),
(51, 'Assistante du Directeur Juridique'),
(52, 'Juriste'),
(53, 'Statisticien'),
(54, 'Cadre Juridique'),
(56, 'Chef de Service Gestion des AÃ©rodromes'),
(57, 'Assistante de Direction du Directeur des AÃ©rodromes'),
(58, 'Cadre GÃ©nie Civil'),
(59, 'Technicien d''AÃ©rodromes'),
(60, 'Chef de Service des Etudes et de la Planification'),
(61, 'Cadre Stagiaire AGA'),
(62, 'Directeur des AÃ©rodromes'),
(63, 'Assistante de Direction SuretÃ© et Facilitation'),
(64, 'Directeur Sureté et Facilitation'),
(65, 'Chef de Service Facilitation'),
(66, 'Cadre SuretÃ©'),
(67, 'Inspecteur SuretÃ©'),
(69, 'Agent Navigation Aerienne'),
(70, 'Cadre Operations '),
(72, 'Directeur de l''Exploitation AÃ©rienne'),
(75, 'Cadre NavigabilitÃ©'),
(76, 'Assistante de Direction du Directeur de l''Exploitation'),
(78, 'Agent Administratif a la D.E'),
(79, 'Inspecteur OPS'),
(82, 'Chef de Service Navigation Aerienne'),
(83, 'Chef de Service Exploitation Technique des AÃ©ronefs'),
(84, 'Chef de Bureau Licence'),
(85, 'Agent ANS'),
(86, 'Inspecteur '),
(87, 'Directeur de la NavigabilitÃ©'),
(88, 'Assistante de Direction du Directeur de la Navigabilite'),
(89, 'Chef de Service NavigabilitÃ©'),
(90, 'Chef de Service Organisme de Maintenance'),
(91, 'Inspecteur surete'),
(92, 'Chef de Service Protection de l''Environnement'),
(93, 'Cadre Ã  la QualitÃ©'),
(94, 'Chef de bureau OpÃ©ration'),
(95, 'Agent a la suretÃ©'),
(96, 'Cadre Navigation AÃ©rienne'),
(97, 'Etude et Planification'),
(98, 'NILL'),
(99, 'Chef Bureau Finance'),
(100, 'Chef de bureau AIM/MAP '),
(101, 'Chef de bureau circulation aÃ©rienne '),
(102, 'Directeur GÃ©nÃ©ral par intÃ©rim'),
(104, 'Consultant PEL'),
(105, 'ChargÃ© d''Etudes DG'),
(106, 'Consultant OPS');

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_utilise_anactache`
--

CREATE TABLE `formulaire_utilise_anactache` (
  `idformutilise` int(4) UNSIGNED ZEROFILL NOT NULL,
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `nomformulaireutilise` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formulaire_utilise_anactache`
--

INSERT INTO `formulaire_utilise_anactache` (`idformutilise`, `numat`, `dateheuresaisi`, `nomformulaireutilise`) VALUES
(0000, 0000, '', ''),
(0010, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-46-Check-list audit délivrance d’agrément LPO'),
(0011, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-10-Demande de validation de licence étrangère de membre d’équipage de conduite'),
(0012, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-48- Check list évaluation du formulaire de demande d''agrément pour OFA'),
(0013, 0065, '31/05/2023 à 10:59:38', 'RAPPORT BILAN PEL'),
(0014, 0065, '31/05/2023 à 10:59:38', 'FNC'),
(0015, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-21-Check list délivrance licence gabonaise de PNC'),
(0016, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-05-Checklist dune demande de licence de contrôleur de la CA'),
(0017, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-08-Check List  prorogation de qualification '),
(0018, 0065, '31/05/2023 à 10:59:38', 'Check-list compagnie aerienne'),
(0019, 0065, '31/05/2023 à 10:59:38', 'COURRIER'),
(0020, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-22-Check List approbation des instructeurs PNC'),
(0021, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-06-Check List apposition qualification de type ou de classe sur licence gabonaise'),
(0022, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-16-CHECK LIST APPROBATION AEL'),
(0023, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-11-Check List conversion de licence'),
(0024, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-20 CHECK LIST APPOSITION QUALIFICATION DE TYPE PNC'),
(0025, 0065, '31/05/2023 à 10:59:38', 'DE-PEL-I-23LISTE DE VÉRIFICATION DELIVRANCE D’UNE LICENCE DE MAINTENANCE D’AERONEF'),
(0026, 0085, '16/06/2023 à 12:34:08', 'DEUUU'),
(0027, 0065, '03/07/2023 à 16:54:46', 'APOSA');

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

CREATE TABLE `organisme` (
  `idorga` int(11) NOT NULL,
  `nomorga` varchar(255) NOT NULL,
  `typeorga` int(11) NOT NULL COMMENT 'PAS USER FOR MOMAN AIDEX',
  `lieuorga` varchar(70) NOT NULL,
  `adresorga` varchar(200) NOT NULL,
  `telorga` varchar(50) NOT NULL,
  `emailorga` varchar(100) NOT NULL,
  `faxorga` varchar(50) NOT NULL,
  `statutorga` varchar(70) NOT NULL COMMENT 'pour saavoir la zone exploitation operateur',
  `trigrorganisme` varchar(70) NOT NULL,
  `createur` int(11) NOT NULL COMMENT 'pour savoir  le type application et celui ki fait operation',
  `datexpire` date NOT NULL,
  `siteactivite` varchar(255) NOT NULL COMMENT 'pour gerer les operateur crer par la DU',
  `cateoperater` varchar(100) NOT NULL COMMENT 'Type d''exploitation',
  `nom_commercial_org` varchar(255) NOT NULL COMMENT 'POUR AIDEX',
  `ville_org` varchar(150) NOT NULL COMMENT 'POUR AIDEX',
  `idpays` int(3) NOT NULL COMMENT 'POUR AIDEX',
  `boite_postal_org` varchar(100) NOT NULL COMMENT 'POUR AIDEX'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cette table gere les operateur+compagnies dans AGAI et  AGFA';

--
-- Contenu de la table `organisme`
--

INSERT INTO `organisme` (`idorga`, `nomorga`, `typeorga`, `lieuorga`, `adresorga`, `telorga`, `emailorga`, `faxorga`, `statutorga`, `trigrorganisme`, `createur`, `datexpire`, `siteactivite`, `cateoperater`, `nom_commercial_org`, `ville_org`, `idpays`, `boite_postal_org`) VALUES
(31713, 'KITA', 0, '', '', '', '', '', '', '', 0, '0000-00-00', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `pays_adna`
--

CREATE TABLE `pays_adna` (
  `idpays` int(3) UNSIGNED ZEROFILL NOT NULL,
  `nompays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pays_adna`
--

INSERT INTO `pays_adna` (`idpays`, `nompays`) VALUES
(001, 'Hongrie'),
(002, 'Hong_Kong '),
(003, 'Honduras'),
(004, 'Hawaii'),
(005, 'Haiti'),
(006, 'Guyane_Francaise'),
(007, 'Guyana'),
(008, 'Guinee_Equatoriale'),
(009, 'Guinee_Bissau '),
(010, 'Guinee'),
(011, 'Guernesey'),
(012, 'Guatemala'),
(013, 'Guam'),
(014, 'Guadeloupe'),
(015, 'Groenland'),
(016, 'Grenade'),
(017, 'Grece'),
(018, 'Gibraltar'),
(019, 'Ghana'),
(020, 'Georgie'),
(021, 'Gabon'),
(022, 'Gambie'),
(023, 'France'),
(024, 'Finlande'),
(025, 'Fidji'),
(026, 'Feroe'),
(027, 'Falkland '),
(028, 'Ethiopie'),
(029, 'Etats_Unis'),
(030, 'Estonie '),
(031, 'Espagne'),
(032, 'Erythree'),
(033, 'Equateur'),
(034, 'Emirats_Arabes_Unis'),
(035, 'Egypte '),
(036, 'Dominique '),
(037, 'Djibouti '),
(038, 'Danemark'),
(039, 'Cuba'),
(040, 'Croatie'),
(041, 'Côte_d_Ivoire'),
(042, 'Costa_Rica '),
(043, 'Coree_du_Sud'),
(044, 'Coree_du_Nord'),
(045, 'Cook'),
(046, 'Republique Democratique Congo'),
(047, 'Congo'),
(048, 'Colombie'),
(049, 'Chypre'),
(050, 'Chine'),
(051, 'Chili'),
(052, 'Cap_Vert'),
(053, 'Canaries'),
(054, 'Canada'),
(055, 'Cameroun'),
(056, 'Cambodge'),
(057, 'Caiman'),
(058, 'Burundi'),
(059, 'Burkina_Faso'),
(060, 'Bulgarie'),
(061, 'Brunei'),
(062, 'Bresil '),
(063, 'Boznie_Herzegovine'),
(064, 'Bhoutan'),
(065, 'Botswana'),
(066, 'Bolivie '),
(067, 'Bielorussie'),
(068, 'Bermudes'),
(069, 'Benin'),
(070, 'Belize'),
(071, 'Belgique'),
(072, 'Bahrein'),
(073, 'Barbade'),
(074, 'Bangladesh'),
(075, 'Bahamas'),
(076, 'Azerbaidjan'),
(077, 'Autriche'),
(078, 'Australie'),
(079, 'Armenie'),
(080, 'Argentine'),
(081, 'Arabie_Saoudite'),
(082, 'Anguilla'),
(083, 'Angola'),
(084, 'Andorre'),
(085, 'Allemagne'),
(086, 'Algerie'),
(087, 'Albanie'),
(089, 'Afrique_Centrale'),
(090, 'Afghanistan'),
(091, 'NIGER'),
(092, 'NILL'),
(093, 'ZIMBABWE'),
(094, 'ANGLETERRE'),
(095, 'Maroc'),
(351, 'Afghanistan'),
(352, 'Albanie'),
(353, 'Antarctique'),
(354, 'Algérie'),
(355, 'Samoa Américaines'),
(356, 'Andorre'),
(357, 'Angola'),
(358, 'Antigua-et-Barbuda'),
(359, 'Azerbaïdjan'),
(360, 'Argentine'),
(361, 'Australie'),
(362, 'Autriche'),
(363, 'Bahamas'),
(364, 'Bahreïn'),
(365, 'Bangladesh'),
(366, 'Arménie'),
(367, 'Barbade'),
(368, 'Belgique'),
(369, 'Bermudes'),
(370, 'Bhoutan'),
(371, 'Bolivie'),
(372, 'Bosnie-Herzégovine'),
(373, 'Botswana'),
(374, 'Île Bouvet'),
(375, 'Brésil'),
(376, 'Belize'),
(377, 'Territoire Britannique de l''Océan Indien'),
(378, 'Îles Salomon'),
(379, 'Îles Vierges Britanniques'),
(380, 'Brunéi Darussalam'),
(381, 'Bulgarie'),
(382, 'Myanmar'),
(383, 'Burundi'),
(384, 'Bélarus'),
(385, 'Cambodge'),
(386, 'Cameroun'),
(387, 'Canada'),
(388, 'Cap-vert'),
(389, 'Îles Caïmanes'),
(390, 'République Centrafricaine'),
(391, 'Sri Lanka'),
(392, 'Tchad'),
(393, 'Chili'),
(394, 'Chine'),
(395, 'Taïwan'),
(396, 'Île Christmas'),
(397, 'Îles Cocos (Keeling)'),
(398, 'Colombie'),
(399, 'Comores'),
(400, 'Mayotte'),
(401, 'République du Congo'),
(402, 'République Démocratique du Congo'),
(403, 'Îles Cook'),
(404, 'Costa Rica'),
(405, 'Croatie'),
(406, 'Cuba'),
(407, 'Chypre'),
(408, 'République Tchèque'),
(409, 'Bénin'),
(410, 'Danemark'),
(411, 'Dominique'),
(412, 'République Dominicaine'),
(413, 'Équateur'),
(414, 'El Salvador'),
(415, 'Guinée Équatoriale'),
(416, 'Éthiopie'),
(417, 'Érythrée'),
(418, 'Estonie'),
(419, 'Îles Féroé'),
(420, 'Îles (malvinas) Falkland'),
(421, 'Géorgie du Sud et les Îles Sandwich du Sud'),
(422, 'Fidji'),
(423, 'Finlande'),
(424, 'Îles Åland'),
(425, 'France'),
(426, 'Guyane Française'),
(427, 'Polynésie Française'),
(428, 'Terres Australes Françaises'),
(429, 'Djibouti'),
(430, 'Gabon'),
(431, 'Géorgie'),
(432, 'Gambie'),
(433, 'Territoire Palestinien Occupé'),
(434, 'Allemagne'),
(435, 'Ghana'),
(436, 'Gibraltar'),
(437, 'Kiribati'),
(438, 'Grèce'),
(439, 'Groenland'),
(440, 'Grenade'),
(441, 'Guadeloupe'),
(442, 'Guam'),
(443, 'Guatemala'),
(444, 'Guinée'),
(445, 'Guyana'),
(446, 'Haïti'),
(447, 'Îles Heard et Mcdonald'),
(448, 'Saint-Siège (état de la Cité du Vatican)'),
(449, 'Honduras'),
(450, 'Hong-Kong'),
(451, 'Hongrie'),
(452, 'Islande'),
(453, 'Inde'),
(454, 'Indonésie'),
(455, 'République Islamique d''Iran'),
(456, 'Iraq'),
(457, 'Irlande'),
(458, 'Israël'),
(459, 'Italie'),
(460, 'Côte d''Ivoire'),
(461, 'Jamaïque'),
(462, 'Japon'),
(463, 'Kazakhstan'),
(464, 'Jordanie'),
(465, 'Kenya'),
(466, 'République Populaire Démocratique de Corée'),
(467, 'République de Corée'),
(468, 'Koweït'),
(469, 'Kirghizistan'),
(470, 'République Démocratique Populaire Lao'),
(471, 'Liban'),
(472, 'Lesotho'),
(473, 'Lettonie'),
(474, 'Libéria'),
(475, 'Jamahiriya Arabe Libyenne'),
(476, 'Liechtenstein'),
(477, 'Lituanie'),
(478, 'Luxembourg'),
(479, 'Macao'),
(480, 'Madagascar'),
(481, 'Malawi'),
(482, 'Malaisie'),
(483, 'Maldives'),
(484, 'Mali'),
(485, 'Malte'),
(486, 'Martinique'),
(487, 'Mauritanie'),
(488, 'Maurice'),
(489, 'Mexique'),
(490, 'Monaco'),
(491, 'Mongolie'),
(492, 'République de Moldova'),
(493, 'Montserrat'),
(494, 'Maroc'),
(495, 'Mozambique'),
(496, 'Oman'),
(497, 'Namibie'),
(498, 'Nauru'),
(499, 'Népal'),
(500, 'Pays-Bas'),
(501, 'Antilles Néerlandaises'),
(502, 'Aruba'),
(503, 'Nouvelle-Calédonie'),
(504, 'Vanuatu'),
(505, 'Nouvelle-Zélande'),
(506, 'Nicaragua'),
(507, 'Niger'),
(508, 'Nigéria'),
(509, 'Niué'),
(510, 'Île Norfolk'),
(511, 'Norvège'),
(512, 'Îles Mariannes du Nord'),
(513, 'Îles Mineures Éloignées des États-Unis'),
(514, 'États Fédérés de Micronésie'),
(515, 'Îles Marshall'),
(516, 'Palaos'),
(517, 'Pakistan'),
(518, 'Panama'),
(519, 'Papouasie-Nouvelle-Guinée'),
(520, 'Paraguay'),
(521, 'Pérou'),
(522, 'Philippines'),
(523, 'Pitcairn'),
(524, 'Pologne'),
(525, 'Portugal'),
(526, 'Guinée-Bissau'),
(527, 'Timor-Leste'),
(528, 'Porto Rico'),
(529, 'Qatar'),
(530, 'Réunion'),
(531, 'Roumanie'),
(532, 'Fédération de Russie'),
(533, 'Rwanda'),
(534, 'Sainte-Hélène'),
(535, 'Saint-Kitts-et-Nevis'),
(536, 'Anguilla'),
(537, 'Sainte-Lucie'),
(538, 'Saint-Pierre-et-Miquelon'),
(539, 'Saint-Vincent-et-les Grenadines'),
(540, 'Saint-Marin'),
(541, 'Sao Tomé-et-Principe'),
(542, 'Arabie Saoudite'),
(543, 'Sénégal'),
(544, 'Seychelles'),
(545, 'Sierra Leone'),
(546, 'Singapour'),
(547, 'Slovaquie'),
(548, 'Viet Nam'),
(549, 'Slovénie'),
(550, 'Somalie'),
(551, 'Afrique du Sud'),
(552, 'Zimbabwe'),
(553, 'Espagne'),
(554, 'Sahara Occidental'),
(555, 'Soudan'),
(556, 'Suriname'),
(557, 'Svalbard etÎle Jan Mayen'),
(558, 'Swaziland'),
(559, 'Suède'),
(560, 'Suisse'),
(561, 'République Arabe Syrienne'),
(562, 'Tadjikistan'),
(563, 'Thaïlande'),
(564, 'Togo'),
(565, 'Tokelau'),
(566, 'Tonga'),
(567, 'Trinité-et-Tobago'),
(568, 'Émirats Arabes Unis'),
(569, 'Tunisie'),
(570, 'Turquie'),
(571, 'Turkménistan'),
(572, 'Îles Turks et Caïques'),
(573, 'Tuvalu'),
(574, 'Ouganda'),
(575, 'Ukraine'),
(576, 'L''ex-République Yougoslave de Macédoine'),
(577, 'Égypte'),
(578, 'Royaume-Uni'),
(579, 'Île de Man'),
(580, 'République-Unie de Tanzanie'),
(581, 'États-Unis'),
(582, 'Îles Vierges des États-Unis'),
(583, 'Burkina Faso'),
(584, 'Uruguay'),
(585, 'Ouzbékistan'),
(586, 'Venezuela'),
(587, 'Wallis et Futuna'),
(588, 'Samoa'),
(589, 'Yémen'),
(590, 'Serbie-et-Monténégro'),
(591, 'Zambie'),
(592, 'Centre Africain');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_aeronautique`
--

CREATE TABLE `personnel_aeronautique` (
  `idpersoaero` int(4) UNSIGNED ZEROFILL NOT NULL,
  `iduser` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dateheuresaisi` varchar(50) NOT NULL,
  `nompersoaero` varchar(100) NOT NULL,
  `prenompersoaero` varchar(80) NOT NULL,
  `datenaispersoaero` date NOT NULL,
  `lieunaispersoaero` varchar(100) NOT NULL,
  `centre_affectation` varchar(50) NOT NULL COMMENT 'Uniquema controleur le reste sont a lbv',
  `Photo` varchar(255) NOT NULL COMMENT 'pour mettre photo personnel',
  `idorga` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'pour savoir sa compagnie',
  `sexe` varchar(10) NOT NULL,
  `IDPAYS` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'pour savoir nationalite',
  `personel_partie` varchar(25) NOT NULL COMMENT 'pour savir sil est parti,decede',
  `idtypepersoaero` int(4) UNSIGNED ZEROFILL NOT NULL,
  `idspecialite` int(4) UNSIGNED ZEROFILL NOT NULL,
  `adresspersoaero` varchar(250) NOT NULL,
  `telpersoaero` varchar(100) NOT NULL,
  `mailpersoaero` varchar(100) NOT NULL,
  `statut_personnel` varchar(50) NOT NULL COMMENT 'pour savoir si DEJA SUIVI',
  `statut_personel_examinateur` varchar(30) NOT NULL COMMENT 'pour dire quil est deja examinateur',
  `statut_personel_instructeur` varchar(50) NOT NULL COMMENT 'pour dire quil est deja instructeur',
  `statut_personnel_agrema_pnt` varchar(50) NOT NULL COMMENT 'pour dire si agrema TRE-CRE,CEL,AEL',
  `statut_personnel_agrema_pnt_cel` varchar(50) NOT NULL COMMENT 'pour dire deja AGREMA CEL POUR LES PNT',
  `statut_personnel_agrema_pnt_ael` varchar(50) NOT NULL COMMENT 'POUR DIRE DEJA AGREMA AEL POUR LES PNT',
  `Photosignature` varchar(255) NOT NULL COMMENT 'siganture du postulmant'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `personnel_aeronautique`
--

INSERT INTO `personnel_aeronautique` (`idpersoaero`, `iduser`, `dateheuresaisi`, `nompersoaero`, `prenompersoaero`, `datenaispersoaero`, `lieunaispersoaero`, `centre_affectation`, `Photo`, `idorga`, `sexe`, `IDPAYS`, `personel_partie`, `idtypepersoaero`, `idspecialite`, `adresspersoaero`, `telpersoaero`, `mailpersoaero`, `statut_personnel`, `statut_personel_examinateur`, `statut_personel_instructeur`, `statut_personnel_agrema_pnt`, `statut_personnel_agrema_pnt_cel`, `statut_personnel_agrema_pnt_ael`, `Photosignature`) VALUES
(0001, 0000, '10-01-2024 à 09:07:37', 'OBAMBOU MATEYI', '', '0000-00-00', '', '', '', 0000, 'Masculin', 0000, 'Actif', 0007, 0000, '', '', '', 'Pas encore suivi', 'Pas encore Examinateur', 'Pas encore Instructeur', 'Pas_encore_agrement_pnt', 'Pas_encore_agrement_pnt_CEL', 'Pas_encore_agrement_pnt_AEL', '');

-- --------------------------------------------------------

--
-- Structure de la table `personnel_anac`
--

CREATE TABLE `personnel_anac` (
  `idpersonnel` int(11) NOT NULL COMMENT 'cle primaire pour inser le ID',
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `codeserv` int(11) NOT NULL,
  `codefct` int(11) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profil` varchar(20) NOT NULL,
  `pconnexion` varchar(20) NOT NULL COMMENT 'POUR ACTIVE compte=1 DESACTIVE=0',
  `nomag` varchar(150) NOT NULL,
  `prenag` varchar(100) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `matricule` varchar(40) NOT NULL COMMENT 'CODE IDENTIFIANT AGFCAR RH',
  `etat_cpte_gpi` int(11) NOT NULL COMMENT 'pour GPI SAVOIR SI COMPTE ACTIV OU DESACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='USER GPI & ANACTIME';

--
-- Contenu de la table `personnel_anac`
--

INSERT INTO `personnel_anac` (`idpersonnel`, `numat`, `codeserv`, `codefct`, `pwd`, `profil`, `pconnexion`, `nomag`, `prenag`, `sexe`, `matricule`, `etat_cpte_gpi`) VALUES
(1, 0000, 1, 1, '81dc9bdb52d04dc20036dbd8313ed055', 'Administrateur', '1', '', '', 'Feminin', '0', 1),
(4, 0009, 39, 106, '81dc9bdb52d04dc20036dbd8313ed055', 'Super_Utilisateur', '1', 'test', 'KAPRISKY NDO', 'Feminin', '0', 1),
(103, 1989, 8, 78, '81dc9bdb52d04dc20036dbd8313ed055', 'Utilisateur_Power', '1', 'IVOLOU', 'BOUTAMBA', 'Feminin', 'MBR', 1);

-- --------------------------------------------------------

--
-- Structure de la table `pilote_adna`
--

CREATE TABLE `pilote_adna` (
  `idpilote` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nompilote` varchar(50) NOT NULL,
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `datesaizi` varchar(70) NOT NULL,
  `prenpilote` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `service_anac`
--

CREATE TABLE `service_anac` (
  `codeserv` int(11) NOT NULL,
  `codedirec` int(11) NOT NULL,
  `libserv` varchar(150) NOT NULL,
  `abrevserv` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `service_anac`
--

INSERT INTO `service_anac` (`codeserv`, `codedirec`, `libserv`, `abrevserv`) VALUES
(1, 1, 'Administrateur', 'Admi'),
(7, 8, 'Cellule Inspection', 'DG-IX'),
(8, 8, 'Cellule QualitÃ©', 'DG-QM'),
(9, 8, 'Division Communication', 'DG-CD'),
(10, 8, 'Service Informatique', 'DG-IQ'),
(11, 13, 'Service Licence et Formation', 'DE-EL'),
(12, 13, 'Service Exploitation Technique des AÃ©ronefs', 'DE-EX'),
(13, 13, 'Service Navigation AÃ©rienne', 'DE-EN'),
(14, 14, 'Service NavigabilitÃ©', 'DN-NN'),
(15, 14, 'Service des Organismes de Maintenance', 'NN-NM'),
(16, 12, 'Service Surete', 'DU-US'),
(17, 12, 'Service Facilitation', 'DU-UF'),
(18, 11, 'Service Etudes et Planification', 'DA-AP'),
(19, 11, 'Service Gestion des AÃ©rodromes', 'DA-AG'),
(20, 11, 'Service Protection de l''Environnement', 'DA-AE'),
(21, 10, 'Service de la RÃ¨glementation', 'DJ-JR'),
(22, 10, 'Service des Statistiques et des Etudes Economiques', 'DJ-JS'),
(23, 10, 'Service des Affaires Juridiques et du Contentieux', 'DJ-JJ'),
(24, 9, 'Service Ressources Humaines & Moyens GÃ©nÃ©reaux', 'DF-FH'),
(25, 9, 'Service ComptabilitÃ© et Finances', 'DF-FC'),
(26, 8, 'Direction GÃ©nÃ©rale', 'DG-DZ'),
(27, 8, 'Bureau du Courrier', 'DDCOU'),
(28, 9, 'DAF', 'DF-FD'),
(29, 7, 'PCA', 'PCA'),
(30, 11, 'Direction des AÃ©rodromes', 'DA'),
(31, 8, 'Cellule Inspection', 'CI'),
(32, 13, 'Direction de l''Exploitation', 'DE'),
(33, 7, 'VPCA', 'VPCA'),
(34, 14, 'Direction de la NavigabilitÃ©', 'DN'),
(35, 12, 'Direction de la sÃ»retÃ© et Facilitation', 'DU'),
(36, 10, 'Directeur des Affaires Juridiques', 'DJ'),
(37, 9, 'Service RH', 'RH'),
(38, 9, 'Service Moyens GÃ©nÃ©raux', 'MG'),
(39, 9, 'Service Finance', 'SF'),
(0, 16, 'bureau dev/db', 'dg-8');

-- --------------------------------------------------------

--
-- Structure de la table `specialite_personnel_aeronautique`
--

CREATE TABLE `specialite_personnel_aeronautique` (
  `idspecialite` int(4) UNSIGNED ZEROFILL NOT NULL,
  `iduser` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `abrevspecialite` varchar(20) NOT NULL COMMENT 'pour ecrire ORL',
  `nomspecialite` varchar(100) NOT NULL COMMENT 'Otorhinolaryngologie'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `specialite_personnel_aeronautique`
--

INSERT INTO `specialite_personnel_aeronautique` (`idspecialite`, `iduser`, `dateheuresaisi`, `abrevspecialite`, `nomspecialite`) VALUES
(0001, 0090, '05-02-2021 Ã  23:51:28', 'OPHTALMOLOGIE', 'OPHTALMOLOGIE'),
(0002, 0090, '05-02-2021 Ã  23:51:43', '', 'ORL'),
(0003, 0109, '05-02-2021 Ã  23:52:17', '', 'MEDECINE DU TRAVAIL'),
(0006, 0090, '21-06-2021 Ã  14:52:16', '', 'GYNECOLOGIE'),
(0007, 0000, '', '', ''),
(0008, 0090, '21-06-2021 Ã  14:51:33', '', 'CARDIOLOGIE'),
(0009, 0090, '21-06-2021 Ã  15:50:43', '', 'MEDECINE GENERALE'),
(0010, 0090, '21-06-2021 Ã  15:51:07', '', 'MEDECINE AERONAUTIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `statut_tache`
--

CREATE TABLE `statut_tache` (
  `idstatuttache` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nomstatuttache` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut_tache`
--

INSERT INTO `statut_tache` (`idstatuttache`, `nomstatuttache`) VALUES
(0001, 'Envoyee pour Information'),
(0002, '\n												 En Attente de Traitement'),
(0003, 'Pour Avis'),
(0004, 'En Attente de Validation'),
(0005, 'Clos'),
(0006, 'Autres'),
(0007, '\n												 \n												 En attente document complementaire'),
(0008, '\n												 Ouvert'),
(0009, '\n												 Accuse reception de la tache'),
(0010, '\n												 TÃ¢che Effectuee');

-- --------------------------------------------------------

--
-- Structure de la table `suivi_tache`
--

CREATE TABLE `suivi_tache` (
  `idtache` int(4) UNSIGNED ZEROFILL NOT NULL,
  `idemetteur` int(11) NOT NULL COMMENT 'expediteur/exploitant envye dossier',
  `idattributeur` int(11) NOT NULL COMMENT 'RMO ANAC',
  `numeroodre` int(11) NOT NULL,
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `objettache` varchar(255) NOT NULL,
  `idstatuttache` int(11) NOT NULL,
  `dateattribution` date NOT NULL,
  `dateprovisiore` date NOT NULL,
  `datereponsereltache` date NOT NULL,
  `observation_attribution` varchar(255) NOT NULL,
  `observation_retour` varchar(255) NOT NULL,
  `typetache` varchar(255) NOT NULL,
  `dateheuresaisi` varchar(255) NOT NULL,
  `datecloture` date NOT NULL COMMENT 'date cloture tache',
  `numcourier_ref_anac` int(11) NOT NULL COMMENT 'AJOUT PO',
  `dateenrgecouranac` date NOT NULL,
  `idorga` int(4) NOT NULL COMMENT 'NOM DE L''ORGANISME A AGREER',
  `formutilise` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'POUR INSERER idformutilise D LA TABLE FORMULAIR',
  `idpersoaero` int(3) UNSIGNED ZEROFILL NOT NULL,
  `idaeronef` int(3) UNSIGNED ZEROFILL NOT NULL,
  `iddomaine` int(3) UNSIGNED ZEROFILL NOT NULL,
  `datereprisecomplema` date NOT NULL COMMENT 'Date reprise dossier pour complement',
  `suividoc` varchar(50) NOT NULL COMMENT 'suivi du doc  Manque/Signature/Réception/Courrier départ',
  `enregistredans` varchar(20) NOT NULL,
  `datereunion` date NOT NULL COMMENT 'DATE reunion, investigation ou Inspection: date reunion',
  `separer_tache_dj_anac` varchar(89) NOT NULL COMMENT 'pour dire TACHE DG OU ANACA GENERAL',
  `documadelivre` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'POUR INSERER iddocdelivre DE LA TABLE DOCUMEMDELIVR',
  `fichier` varchar(200) NOT NULL COMMENT 'pour inserer le fichier delivr',
  `taille` varchar(200) NOT NULL,
  `file_url` varchar(225) NOT NULL COMMENT 'pour inserer le fichier delivr',
  `file_url_courier_entrant` varchar(255) NOT NULL COMMENT 'pour inserer le courrier',
  `fichier_courrier_entrant` varchar(255) NOT NULL COMMENT 'pour inserer courrier '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `suivi_tache`
--

INSERT INTO `suivi_tache` (`idtache`, `idemetteur`, `idattributeur`, `numeroodre`, `numat`, `objettache`, `idstatuttache`, `dateattribution`, `dateprovisiore`, `datereponsereltache`, `observation_attribution`, `observation_retour`, `typetache`, `dateheuresaisi`, `datecloture`, `numcourier_ref_anac`, `dateenrgecouranac`, `idorga`, `formutilise`, `idpersoaero`, `idaeronef`, `iddomaine`, `datereprisecomplema`, `suividoc`, `enregistredans`, `datereunion`, `separer_tache_dj_anac`, `documadelivre`, `fichier`, `taille`, `file_url`, `file_url_courier_entrant`, `fichier_courrier_entrant`) VALUES
(0001, 1, 1, 1, 0000, 'POUR LA GESTION DES CLIENTS', 8, '2024-01-10', '2024-01-26', '0000-00-00', '', '', '', '10/01/2024 à 09:07:37', '0000-00-00', 85595, '2024-01-12', 31713, 0000, 001, 1011, 042, '0000-00-00', '', 'Classeur', '0000-00-00', 'ANAC', 0000, '', '', '', 'GEDANAC/Union.pdf', 'Union.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `type_centre_formation`
--

CREATE TABLE `type_centre_formation` (
  `idtypecentre` int(4) UNSIGNED ZEROFILL NOT NULL,
  `abrevtypecentre` varchar(20) NOT NULL,
  `nomtypecentre` varchar(100) NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `iduser` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_centre_formation`
--

INSERT INTO `type_centre_formation` (`idtypecentre`, `abrevtypecentre`, `nomtypecentre`, `dateheuresaisi`, `iduser`) VALUES
(0002, 'CEMAL', 'CENTRE D''EXPERTISE EN MEDECINE AERONAUTIQUE', '30-01-2021 Ã  14:06:46', 0090),
(0003, 'ATO-TRTO', 'CENTRE DE FORMATION ATO-TRTO', '30-01-2021 Ã  14:07:16', 0090),
(0005, 'ND', 'NON DEFINIE', '11-02-2021 Ã  11:51:33', 0109),
(0006, 'LPO', 'CENTRE D''EXAMEN DE LANGUE', '04-06-2021 Ã  11:00:39', 0109),
(0000, 'GA.FSTD', 'pour un simulateur', '26-10-2022 Ã  11:07:02', 0000);

-- --------------------------------------------------------

--
-- Structure de la table `type_organisme`
--

CREATE TABLE `type_organisme` (
  `idtypeorga` int(11) NOT NULL,
  `nomtypeorg` varchar(255) CHARACTER SET utf32 NOT NULL,
  `datesaizi` varchar(200) NOT NULL COMMENT 'date d''enregistrement',
  `numat` int(11) NOT NULL COMMENT 'agent operation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='cette table est utiliser dans AGAI et AGFA';

--
-- Contenu de la table `type_organisme`
--

INSERT INTO `type_organisme` (`idtypeorga`, `nomtypeorg`, `datesaizi`, `numat`) VALUES
(35, 'AVIATION CIVILE', '', 0),
(38, 'SURVEILLANCE CONTINUE EXPLOITANT AERIEN', '', 0),
(41, 'FOURNISSEUR DE SERVICE DE LA CIRCULATION AERIENNE', '', 0),
(42, 'FOURNISSEUR DE SERVICE DE LA MÃ‰TÃ‰OROLOGIE AÃ‰RONAUTIQUE', '', 0),
(43, 'FOURNISSEUR DE SERVICE D''INFORMATIONS AÃ‰RONAUTIQUES', '', 0),
(44, 'FOURNISSEUR DE SERVICE COMMUNICATION-NAVIGATION-SURVEILLANCE', '', 0),
(45, 'FOURNISSEUR DE SERVICE  CARTOGRAPHIE AÃ‰RONAUTIQUE', '', 0),
(46, 'FOURNISSEUR DE SERVICE DES PROCÃ‰DURES DE VOLS', '', 0),
(47, 'GESTIONNAIRE AÃ‰ROPORTUAIRE -  AGA', '', 0),
(48, 'EXPLOITANT HÃ‰LIPORT ', '', 0),
(49, 'EXPLOITANT AÃ‰RODROME', '', 0),
(50, 'ORGANISME DE MAINTENANCE AGREE ( O M A)', '', 0),
(51, 'A.T.O', '', 0),
(52, 'MÃ‰DECINE AÃ‰RONAUTIQUE', '', 0),
(53, 'SURETE', '', 0),
(54, 'MARCHANDISE DANGEREUSE ( MD)', '', 0),
(55, 'EXAMINATEURS DÃ‰SIGNES', '', 0),
(56, 'COMPAGNIE AERIENNE', '', 0),
(66, '', '', 0),
(67, 'AUDIT', '', 0),
(0, 'BOIS', '21-12-2022 Ã  10:17:21', 62);

-- --------------------------------------------------------

--
-- Structure de la table `type_personnel_aeronautique`
--

CREATE TABLE `type_personnel_aeronautique` (
  `idtypepersoaero` int(4) UNSIGNED ZEROFILL NOT NULL,
  `iduser` int(4) UNSIGNED ZEROFILL NOT NULL,
  `dateheuresaisi` varchar(100) NOT NULL,
  `abrev_typpersoaero` varchar(20) NOT NULL COMMENT 'pour dire soit ATCO,PCN',
  `nom_typpersoaero` varchar(100) NOT NULL COMMENT 'pour dire controleur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_personnel_aeronautique`
--

INSERT INTO `type_personnel_aeronautique` (`idtypepersoaero`, `iduser`, `dateheuresaisi`, `abrev_typpersoaero`, `nom_typpersoaero`) VALUES
(0000, 0109, '08-02-2021 Ã  12:36:45', '', 'AGENT TECHNIQUE D''EXPLOITATION'),
(0001, 0090, '29-07-2021 Ã  09:41:19', 'I-PEL', 'INSTRUCTEURS '),
(0002, 0109, '06-02-2021 Ã  00:23:35', 'MEA', 'MEDECINS EXAMINATEURS'),
(0005, 0090, '20-02-2021 Ã  18:09:21', 'TMA', 'MECANICIEN TMA'),
(0006, 0090, '22-02-2021 Ã  22:09:22', 'PNC', 'PERSONNEL NAVIGANT COMMERCIAL (PNC)'),
(0007, 0090, '15-04-2021 Ã  10:53:45', 'PILOTES', 'PNT'),
(0008, 0090, '15-02-2021 Ã  19:43:25', 'ATCO', 'CONTROLEUR ATCO'),
(0009, 0000, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_anacstat`
--

CREATE TABLE `user_anacstat` (
  `numat` int(4) UNSIGNED ZEROFILL NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profil` varchar(20) NOT NULL,
  `pconnexion` varchar(3) NOT NULL COMMENT 'pour activer desactiver compte',
  `nomag` varchar(150) NOT NULL,
  `prenag` varchar(100) NOT NULL,
  `trigram_user` varchar(3) NOT NULL COMMENT 'pour mettre les trigram de celui qui a etablie lotorisation',
  `idattributache` int(4) NOT NULL COMMENT 'POUR INSERER ID ATTRIBUTAIRE TACHE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='USER ANAC STAT DJ';

--
-- Contenu de la table `user_anacstat`
--

INSERT INTO `user_anacstat` (`numat`, `pwd`, `profil`, `pconnexion`, `nomag`, `prenag`, `trigram_user`, `idattributache`) VALUES
(0000, '81dc9bdb52d04dc20036dbd8313ed055', 'Administrateur', '1', 'Administrateur', '', '', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aeronef_adna`
--
ALTER TABLE `aeronef_adna`
  ADD PRIMARY KEY (`idaeronef`),
  ADD KEY `numat` (`numat`);

--
-- Index pour la table `attributeur_tache`
--
ALTER TABLE `attributeur_tache`
  ADD PRIMARY KEY (`idattributeur`),
  ADD KEY `numat` (`numat`);

--
-- Index pour la table `centre_formation`
--
ALTER TABLE `centre_formation`
  ADD PRIMARY KEY (`idcentre`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `direction_anac`
--
ALTER TABLE `direction_anac`
  ADD PRIMARY KEY (`codedirec`);

--
-- Index pour la table `document_delivre_anactache`
--
ALTER TABLE `document_delivre_anactache`
  ADD PRIMARY KEY (`iddocdelivre`),
  ADD KEY `numat` (`numat`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`iddomaine`);

--
-- Index pour la table `emetteur_tache`
--
ALTER TABLE `emetteur_tache`
  ADD PRIMARY KEY (`idemetteur`),
  ADD KEY `numat` (`numat`);

--
-- Index pour la table `fonction_anac`
--
ALTER TABLE `fonction_anac`
  ADD PRIMARY KEY (`codefct`);

--
-- Index pour la table `formulaire_utilise_anactache`
--
ALTER TABLE `formulaire_utilise_anactache`
  ADD PRIMARY KEY (`idformutilise`),
  ADD KEY `numat` (`numat`);

--
-- Index pour la table `organisme`
--
ALTER TABLE `organisme`
  ADD PRIMARY KEY (`idorga`);

--
-- Index pour la table `personnel_aeronautique`
--
ALTER TABLE `personnel_aeronautique`
  ADD PRIMARY KEY (`idpersoaero`);

--
-- Index pour la table `personnel_anac`
--
ALTER TABLE `personnel_anac`
  ADD PRIMARY KEY (`idpersonnel`),
  ADD UNIQUE KEY `numat` (`numat`) USING BTREE;

--
-- Index pour la table `pilote_adna`
--
ALTER TABLE `pilote_adna`
  ADD PRIMARY KEY (`idpilote`);

--
-- Index pour la table `statut_tache`
--
ALTER TABLE `statut_tache`
  ADD PRIMARY KEY (`idstatuttache`);

--
-- Index pour la table `suivi_tache`
--
ALTER TABLE `suivi_tache`
  ADD PRIMARY KEY (`idtache`),
  ADD KEY `documadelivre` (`documadelivre`),
  ADD KEY `formutilise` (`formutilise`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `aeronef_adna`
--
ALTER TABLE `aeronef_adna`
  MODIFY `idaeronef` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;
--
-- AUTO_INCREMENT pour la table `attributeur_tache`
--
ALTER TABLE `attributeur_tache`
  MODIFY `idattributeur` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `centre_formation`
--
ALTER TABLE `centre_formation`
  MODIFY `idcentre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `direction_anac`
--
ALTER TABLE `direction_anac`
  MODIFY `codedirec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `document_delivre_anactache`
--
ALTER TABLE `document_delivre_anactache`
  MODIFY `iddocdelivre` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `iddomaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `emetteur_tache`
--
ALTER TABLE `emetteur_tache`
  MODIFY `idemetteur` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `formulaire_utilise_anactache`
--
ALTER TABLE `formulaire_utilise_anactache`
  MODIFY `idformutilise` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `organisme`
--
ALTER TABLE `organisme`
  MODIFY `idorga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31714;
--
-- AUTO_INCREMENT pour la table `personnel_aeronautique`
--
ALTER TABLE `personnel_aeronautique`
  MODIFY `idpersoaero` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `personnel_anac`
--
ALTER TABLE `personnel_anac`
  MODIFY `idpersonnel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'cle primaire pour inser le ID', AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `pilote_adna`
--
ALTER TABLE `pilote_adna`
  MODIFY `idpilote` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `statut_tache`
--
ALTER TABLE `statut_tache`
  MODIFY `idstatuttache` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `suivi_tache`
--
ALTER TABLE `suivi_tache`
  MODIFY `idtache` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
