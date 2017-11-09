-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `virtualhg`;
CREATE DATABASE `virtualhg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `virtualhg`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1,	'Lorem ipsum');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(32) NOT NULL,
  `pwd` varchar(64) NOT NULL,
  `permission` smallint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `usr`, `pwd`, `permission`) VALUES
(1,	'admin',	'148DE9C5A7A44D19E56CD9AE1A554BF67847AFB0C58F6E12FA29AC7DDFCA9940',	0);

-- 2017-11-09 01:13:58
