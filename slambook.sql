SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `slambook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `slambook`;

CREATE TABLE `answers` (
  `answer_id` int(22) NOT NULL,
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
  `T` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$
CREATE TRIGGER `delete_notification_for_answers` BEFORE DELETE ON `answers` FOR EACH ROW DELETE FROM `notifications` WHERE `typeid` = OLD.answer_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_notification_for_answer` AFTER INSERT ON `answers` FOR EACH ROW INSERT INTO `notifications` ( `user_id`, `type`,`udate`,`replier`,`typeid`) VALUES (NEW.questioner, 'answer',now(),NEW.replier,NEW.answer_id)
$$
DELIMITER ;

CREATE TABLE `authenticate` (
  `auth-id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `emailaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `confessions` (
  `confessionid` int(22) NOT NULL,
  `replier` varchar(255) NOT NULL,
  `questioner` int(11) NOT NULL,
  `msg` text NOT NULL,
  `udate` date NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(22) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
DELIMITER $$
CREATE TRIGGER `delete_notification_for_confession` BEFORE DELETE ON `confessions` FOR EACH ROW DELETE FROM `notifications` WHERE `typeid` = OLD.confessionid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_notification_for_confession` AFTER INSERT ON `confessions` FOR EACH ROW INSERT INTO `notifications` ( `user_id`, `type`,`udate`,`replier`,`typeid`) VALUES (NEW.questioner, 'confession',now(),NEW.replier,NEW.confessionid)
$$
DELIMITER ;

CREATE TABLE `notifications` (
  `id` int(55) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `udate` datetime NOT NULL,
  `replier` varchar(255) NOT NULL,
  `typeid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pinnedposts` (
  `post_id` int(22) NOT NULL,
  `owner` int(11) NOT NULL,
  `questioner` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `caption` text DEFAULT NULL,
  `udate` date NOT NULL DEFAULT current_timestamp(),
  `utime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `userid` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_picture` text DEFAULT '../assets/img/default.png	',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL,
  `bio` text DEFAULT 'Hey there, i\'m on bekus',
  `accountstatus` varchar(12) NOT NULL DEFAULT 'incomplete',
  `fans` int(11) NOT NULL DEFAULT 0,
  `friends` int(11) NOT NULL DEFAULT 0,
  `selected_questions` text DEFAULT 'ABCDEFGHIJKLMNOPQRST'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `user_fk` (`questioner`);

ALTER TABLE `authenticate`
  ADD PRIMARY KEY (`auth-id`);

ALTER TABLE `confessions`
  ADD PRIMARY KEY (`confessionid`),
  ADD KEY `user_fk_confessions` (`questioner`);

ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_noti` (`user_id`);

ALTER TABLE `pinnedposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_fk_post_id` (`owner`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);


ALTER TABLE `answers`
  MODIFY `answer_id` int(22) NOT NULL AUTO_INCREMENT;

ALTER TABLE `authenticate`
  MODIFY `auth-id` int(15) NOT NULL AUTO_INCREMENT;

ALTER TABLE `confessions`
  MODIFY `confessionid` int(22) NOT NULL AUTO_INCREMENT;

ALTER TABLE `notifications`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pinnedposts`
  MODIFY `post_id` int(22) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `userid` int(15) NOT NULL AUTO_INCREMENT;


ALTER TABLE `answers`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`questioner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `confessions`
  ADD CONSTRAINT `user_fk_confessions` FOREIGN KEY (`questioner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `notifications`
  ADD CONSTRAINT `user_fk_noti` FOREIGN KEY (`user_id`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `pinnedposts`
  ADD CONSTRAINT `user_fk_post_id` FOREIGN KEY (`owner`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `authenticate` (`auth-id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
