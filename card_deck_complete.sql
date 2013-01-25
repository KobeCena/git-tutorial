-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2012 at 03:26 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carddeck`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cardname` varchar(50) NOT NULL,
  `strength` int(4) NOT NULL DEFAULT '0',
  `defense` int(4) NOT NULL DEFAULT '0',
  `fk_card_skill_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`card_id`),
  UNIQUE KEY `cardname` (`cardname`),
  KEY `fk_card_skill_id1` (`fk_card_skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cards`
--


-- --------------------------------------------------------

--
-- Table structure for table `card_faces`
--

CREATE TABLE IF NOT EXISTS `card_faces` (
  `cface_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_face_name` varchar(255) NOT NULL,
  `usage` tinyint(3) NOT NULL,
  PRIMARY KEY (`cface_id`),
  KEY `card_face_name` (`card_face_name`,`usage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `card_faces`
--

INSERT INTO `card_faces` (`cface_id`, `card_face_name`, `usage`) VALUES
(1, 'after_boom.png', 0),
(2, 'ah.png', 0),
(3, 'amazed.png', 0),
(4, 'amazing.png', 0),
(5, 'anger.png', 0),
(6, 'angry.png', 0),
(7, 'bad_egg.png', 0),
(8, 'bad_smelly.png', 0),
(9, 'bad_smile.png', 0),
(10, 'baffle.png', 0),
(11, 'beated.png', 0),
(12, 'beaten.png', 0),
(13, 'beat_brick.png', 0),
(14, 'beat_plaster.png', 0),
(15, 'beat_shot.png', 0),
(16, 'beauty.png', 0),
(17, 'big_smile.png', 0),
(18, 'big_smiley.png', 0),
(19, 'black_heart.png', 0),
(20, 'boss.png', 0),
(21, 'burn_joss_stick.png', 0),
(22, 'byebye.png', 0),
(23, 'canny.png', 0),
(24, 'choler.png', 0),
(25, 'cold.png', 0),
(26, 'confident.png', 0),
(27, 'confuse.png', 0),
(28, 'cool.png', 0),
(29, 'cry.png', 0),
(30, 'cry_cry.png', 0),
(31, 'doubt.png', 0),
(32, 'dribble.png', 0),
(33, 'electric_shock.png', 0),
(34, 'embarrassed.png', 0),
(35, 'exciting.png', 0),
(36, 'extreme_sexy_girl.png', 0),
(37, 'eyes_droped.png', 0),
(38, 'feel_good.png', 0),
(39, 'girl.png', 0),
(40, 'go.png', 0),
(41, 'greedy.png', 0),
(42, 'grimace.png', 0),
(43, 'haha.png', 0),
(44, 'hahaha.png', 0),
(45, 'happy.png', 0),
(46, 'hell_boy.png', 0),
(47, 'horror.png', 0),
(48, 'hungry.png', 0),
(49, 'look_down.png', 0),
(50, 'matrix.png', 0),
(51, 'misdoubt.png', 0),
(52, 'money.png', 0),
(53, 'nosebleed.png', 0),
(54, 'nothing.png', 0),
(55, 'nothing_to_say.png', 0),
(56, 'oh.png', 0),
(57, 'ops.png', 0),
(58, 'pudency.png', 0),
(59, 'rap.png', 0),
(60, 'red_heart.png', 0),
(61, 'sad.png', 0),
(62, 'scorn.png', 0),
(63, 'secret_smile.png', 0),
(64, 'sexy_girl.png', 0),
(65, 'shame.png', 0),
(66, 'shamey.png', 0),
(67, 'shocked.png', 0),
(68, 'smile.png', 0),
(69, 'spiderman.png', 0),
(70, 'still_dreaming.png', 0),
(71, 'super_man.png', 0),
(72, 'sure.png', 0),
(73, 'surrender.png', 0),
(74, 'sweat.png', 0),
(75, 'sweet_kiss.png', 0),
(76, 'the_iron_man.png', 0),
(77, 'tire.png', 0),
(78, 'too_sad.png', 0),
(79, 'unhappy.png', 0),
(80, 'victory.png', 0),
(81, 'waaaht.png', 0),
(82, 'what.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `card_skills`
--

CREATE TABLE IF NOT EXISTS `card_skills` (
  `card_skill_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(255) NOT NULL,
  PRIMARY KEY (`card_skill_id`),
  KEY `skill_ids` (`skill_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `card_skills`
--

INSERT INTO `card_skills` (`card_skill_id`, `skill_name`) VALUES
(1, ''),
(3, ' 140 Defense'),
(2, 'Add 100 Strength'),
(5, 'Add 30 points to attack'),
(6, 'Add 30 points to attack and poison enemy'),
(7, 'Add 90 points to attack and poison enemy'),
(8, 'Black Magic'),
(9, 'Double Strength'),
(4, 'Poison Enemy');

-- --------------------------------------------------------

--
-- Table structure for table `decks`
--

CREATE TABLE IF NOT EXISTS `decks` (
  `deck_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `deck_name` varchar(255) NOT NULL,
  PRIMARY KEY (`deck_id`),
  KEY `deck_number` (`deck_name`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `decks`
--


-- --------------------------------------------------------

--
-- Table structure for table `deck_cards`
--

CREATE TABLE IF NOT EXISTS `deck_cards` (
  `deck_card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deck_id` int(10) unsigned NOT NULL,
  `card_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`deck_card_id`),
  KEY `deck_number` (`deck_id`,`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `deck_cards`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `fk_card_skill_id1` FOREIGN KEY (`fk_card_skill_id`) REFERENCES `card_skills` (`card_skill_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
