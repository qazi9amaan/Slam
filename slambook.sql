-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 11:10 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slambook`
--
CREATE DATABASE IF NOT EXISTS `slambook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `slambook`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(22) NOT NULL AUTO_INCREMENT,
  `replier` varchar(255) NOT NULL,
  `questioner` int(11) NOT NULL,
  `udate` date NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) DEFAULT 'unseen',
  `A` varchar(255) DEFAULT NULL,
  `B` varchar(255) DEFAULT NULL,
  `C` varchar(255) DEFAULT NULL,
  `D` varchar(255) DEFAULT NULL,
  `E` varchar(255) DEFAULT NULL,
  `F` varchar(255) DEFAULT NULL,
  `G` varchar(255) DEFAULT NULL,
  `H` varchar(255) DEFAULT NULL,
  `I` varchar(255) DEFAULT NULL,
  `J` varchar(255) DEFAULT NULL,
  `K` varchar(255) DEFAULT NULL,
  `L` varchar(255) DEFAULT NULL,
  `M` varchar(255) DEFAULT NULL,
  `N` varchar(255) DEFAULT NULL,
  `O` varchar(255) DEFAULT NULL,
  `P` varchar(255) DEFAULT NULL,
  `Q` varchar(255) DEFAULT NULL,
  `R` varchar(255) DEFAULT NULL,
  `S` varchar(255) DEFAULT NULL,
  `T` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `user_fk` (`questioner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `answers`
--
DROP TRIGGER IF EXISTS `delete_notification_for_answers`;
DELIMITER $$
CREATE TRIGGER `delete_notification_for_answers` BEFORE DELETE ON `answers` FOR EACH ROW DELETE FROM `notifications` WHERE `typeid` = OLD.answer_id
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_notification_for_answer`;
DELIMITER $$
CREATE TRIGGER `insert_notification_for_answer` AFTER INSERT ON `answers` FOR EACH ROW INSERT INTO `notifications` ( `user_id`, `type`,`udate`,`replier`,`typeid`) VALUES (NEW.questioner, 'answer',now(),NEW.replier,NEW.answer_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `authenticate`
--

DROP TABLE IF EXISTS `authenticate`;
CREATE TABLE IF NOT EXISTS `authenticate` (
  `auth-id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  PRIMARY KEY (`auth-id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `confessions`
--

DROP TABLE IF EXISTS `confessions`;
CREATE TABLE IF NOT EXISTS `confessions` (
  `confessionid` int(22) NOT NULL AUTO_INCREMENT,
  `replier` varchar(255) NOT NULL,
  `questioner` int(11) NOT NULL,
  `msg` text NOT NULL,
  `udate` date NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(22) NOT NULL DEFAULT 'unseen',
  PRIMARY KEY (`confessionid`),
  KEY `user_fk_confessions` (`questioner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `confessions`
--
DROP TRIGGER IF EXISTS `delete_notification_for_confession`;
DELIMITER $$
CREATE TRIGGER `delete_notification_for_confession` BEFORE DELETE ON `confessions` FOR EACH ROW DELETE FROM `notifications` WHERE `typeid` = OLD.confessionid
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insert_notification_for_confession`;
DELIMITER $$
CREATE TRIGGER `insert_notification_for_confession` AFTER INSERT ON `confessions` FOR EACH ROW INSERT INTO `notifications` ( `user_id`, `type`,`udate`,`replier`,`typeid`) VALUES (NEW.questioner, 'confession',now(),NEW.replier,NEW.confessionid)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `udate` datetime NOT NULL,
  `replier` varchar(255) NOT NULL,
  `typeid` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_fk_noti` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE IF NOT EXISTS `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pinnedposts`
--

DROP TABLE IF EXISTS `pinnedposts`;
CREATE TABLE IF NOT EXISTS `pinnedposts` (
  `post_id` int(22) NOT NULL AUTO_INCREMENT,
  `owner` int(11) NOT NULL,
  `questioner` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `caption` text DEFAULT NULL,
  `udate` date NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`post_id`),
  KEY `user_fk_post_id` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT '/assets/img/default.png	',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL,
  `bio` text DEFAULT 'Hey there, i\'m on bekus',
  `accountstatus` varchar(12) NOT NULL DEFAULT 'incomplete',
  `fans` int(11) NOT NULL DEFAULT 0,
  `friends` int(11) NOT NULL DEFAULT 0,
  `selected_questions` text DEFAULT 'ABCDEFGHIJKLMNOPQRST',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`questioner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confessions`
--
ALTER TABLE `confessions`
  ADD CONSTRAINT `user_fk_confessions` FOREIGN KEY (`questioner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `user_fk_noti` FOREIGN KEY (`user_id`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pinnedposts`
--
ALTER TABLE `pinnedposts`
  ADD CONSTRAINT `user_fk_post_id` FOREIGN KEY (`owner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
