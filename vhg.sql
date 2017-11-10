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

DROP TABLE IF EXISTS `tips`;
CREATE TABLE `tips` (
  `tip_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tip_title` varchar(255) NOT NULL,
  `tip_content` longtext NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `tip_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tip_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tips` (`tip_id`, `tip_title`, `tip_content`, `category_id`, `tip_time`) VALUES
(1,	'This will be displayed in Markdown.',	'# This will be displayed in Markdown.\r\n## This is the second header.\r\n### This is the third.\r\n> I just quote you.\r\n### Another section\r\n- Unordered list\r\n- Unordered list 2\r\n### Yet another\r\n1. Numbered list\r\n2. Numbered list 2\r\n',	1,	'2017-11-09 04:57:19'),
(2,	'Writing in Markdown',	'# Writing in Markdown\nWriting in Markdown is **easy**!',	1,	'2017-11-10 02:46:37');

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

-- 2017-11-10 03:05:27
