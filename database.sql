-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Maio-2016 às 23:04
-- Versão do servidor: 5.5.36
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d3sconn3ct_shorter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `d3sc_short`
--

DROP TABLE IF EXISTS `d3sc_short`;
CREATE TABLE IF NOT EXISTS `d3sc_short` (
  `short_id` int(20) NOT NULL AUTO_INCREMENT,
  `short_owner_ip` varchar(50) NOT NULL,
  `short_url_code` varchar(10) NOT NULL,
  `short_url_base` longtext NOT NULL,
  `short_hits` int(20) NOT NULL,
  PRIMARY KEY (`short_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
