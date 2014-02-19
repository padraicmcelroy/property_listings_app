-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 172.16.3.158
-- Generation Time: Feb 06, 2013 at 11:28 PM
-- Server version: 5.0.83
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `db1095971_padraic`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE IF NOT EXISTS `adminusers` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 'letmein');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `county_id` int(32) NOT NULL auto_increment,
  `county` varchar(20) NOT NULL,
  PRIMARY KEY  (`county_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`county_id`, `county`) VALUES
(1, 'Antrim'),
(2, 'Armagh'),
(3, 'Carlow'),
(4, 'Cavan'),
(5, 'Clare'),
(6, 'Cork'),
(7, 'Derry'),
(8, 'Donegal'),
(9, 'Down'),
(10, 'Dublin'),
(11, 'Fermanagh'),
(12, 'Galway'),
(13, 'Kerry'),
(14, 'Kildare'),
(15, 'Kilkenny'),
(16, 'Laois'),
(17, 'Leitrim'),
(18, 'Limerick'),
(19, 'Longford'),
(20, 'Louth'),
(21, 'Mayo'),
(22, 'Meath'),
(23, 'Monaghan'),
(24, 'Offaly'),
(25, 'Roscommon'),
(26, 'Sligo'),
(27, 'Tipperary'),
(28, 'Tyrone'),
(29, 'Waterford'),
(30, 'Westmeath'),
(31, 'Wexford'),
(32, 'Wicklow');

-- --------------------------------------------------------

--
-- Table structure for table `houseprice`
--

CREATE TABLE IF NOT EXISTS `houseprice` (
  `houseprice_id` int(11) NOT NULL auto_increment,
  `pricebracket` varchar(50) NOT NULL,
  PRIMARY KEY  (`houseprice_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `houseprice`
--

INSERT INTO `houseprice` (`houseprice_id`, `pricebracket`) VALUES
(1, '< €100k'),
(2, '€100k - €250k'),
(3, '€250k - €500k'),
(4, '> €500k');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(20) NOT NULL auto_increment,
  `_typeofhouse_id` int(15) NOT NULL,
  `_houseprice_id` int(20) NOT NULL,
  `_county_id` int(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `dateoflisting` datetime NOT NULL,
  `imagefile` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY  (`property_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `_typeofhouse_id`, `_houseprice_id`, `_county_id`, `address1`, `dateoflisting`, `imagefile`, `price`, `status`) VALUES
(1, 2, 2, 10, '2 Mount Eustace Green, Tyrrelstown, Dublin 15', '2013-01-01 15:24:00', 'semi-d-1.jpg', '167,000', 'For Sale'),
(2, 2, 3, 10, '4 Mulberry Crescent, Castleknock, Dublin 15', '2013-02-01 16:05:00', 'semi-d-2.jpg', '320,000', 'For Sale'),
(3, 2, 3, 10, '3 Limelawn Rise, Clonsilla, Dublin 15', '2013-02-02 09:22:00', 'semi-d-3.jpg', '330,000', 'Sale Agreed'),
(4, 1, 3, 10, '1 Delwood Road, Castleknock, Dublin 15', '2012-12-09 11:44:00', 'detached-1.jpg', '360,000', 'For Sale'),
(5, 3, 3, 10, '31 Lombard Street West, Portobello, Dublin 8', '2013-01-11 12:22:00', 'terraced-1.jpg', '475,000', 'Sale Agreed'),
(6, 4, 4, 10, '367 South Circular Road, South Circular Road, Dubl', '2012-11-11 10:56:00', 'end-of-terrace-1.jpg', '550,000', 'For Sale'),
(7, 1, 3, 23, 'Aghadreenan, Castleblayney, Co. Monaghan', '2013-02-01 14:12:00', 'detached-2.jpg', '310,000', 'For Sale'),
(8, 1, 2, 23, 'Moybridge, Emyvale, Co. Monaghan', '2013-01-06 10:54:00', 'detached-3.jpg', '160,000', 'For Sale'),
(9, 1, 3, 23, 'Aghaile, Carrickmacross, Co. Monaghan', '2013-02-02 10:32:00', 'detached-4.jpg', '260,000', 'Sale Agreed'),
(10, 2, 2, 23, '40 Woodvale, Carrickmacross, Co. Monaghan', '2012-12-04 17:14:00', 'semi-d-4.jpg', '142,500', 'For Sale'),
(11, 1, 3, 12, 'Kiltrogue, Cregmore', '2013-02-05 16:24:00', 'detached-5.jpg', '315,000', 'For Sale'),
(12, 5, 1, 12, 'Coole Haven, Crow Street, Gort', '2013-02-04 18:54:00', 'townhouse-1.jpg', '65,000', 'For Sale'),
(13, 1, 3, 12, '16 Ashville, Kiltullagh, Athenry', '2013-02-03 09:04:00', 'detached-6.jpg', '198,000', 'For Sale'),
(14, 2, 2, 6, 'No 8 Ard Na Greine, Dark Rd., Castleredmond, Midle', '2013-02-02 09:34:00', 'semi-d-5.jpg', '164,950', 'For Sale'),
(15, 1, 2, 6, 'Gurteenroe, Churchtown', '2013-02-03 11:09:00', 'detached-7.jpg', '177,500', 'For Sale'),
(16, 1, 3, 6, 'Ballylickey, Bantry', '2013-02-01 12:44:00', 'detached-8.jpg', '320,000', 'For Sale');

-- --------------------------------------------------------

--
-- Table structure for table `typeofhouse`
--

CREATE TABLE IF NOT EXISTS `typeofhouse` (
  `typeofhouse_id` int(11) NOT NULL auto_increment,
  `house_type` varchar(50) NOT NULL,
  PRIMARY KEY  (`typeofhouse_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `typeofhouse`
--

INSERT INTO `typeofhouse` (`typeofhouse_id`, `house_type`) VALUES
(1, 'Detached House'),
(2, 'Semi-Detached House'),
(3, 'Terraced House'),
(4, 'End of Terrace House'),
(5, 'Townhouse');