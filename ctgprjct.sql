-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2017 at 07:33 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctgprjct`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `comm` text,
  `uid` int(11) DEFAULT NULL,
  `evid` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `uid` (`uid`),
  KEY `evid` (`evid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cid`, `comm`, `uid`, `evid`) VALUES
(4, 'asd', 2, 1),
(5, 'nicely done', 3, 1),
(7, 'so so . but grear', 4, 1),
(8, 'not good', 5, 1),
(10, 'woow super', 2, 3),
(11, 'nice', 2, 5),
(15, 'lol', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `evid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `des` text,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`evid`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`evid`, `name`, `des`, `uid`) VALUES
(1, 'test', 'woow so tasty', 2),
(3, 'adhoc', 'bla bla bla bla ', 2),
(4, 'another', 'woow , this snail is fast', 2),
(5, 'osthiir', 'thursty ? lemon lemon lemon.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `val` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `evid` int(11) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `uid` (`uid`),
  KEY `evid` (`evid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `val`, `uid`, `evid`) VALUES
(1, 5, 2, 1),
(2, 1, 3, 1),
(4, 4, 4, 1),
(5, 2, 5, 1),
(7, 5, 2, 3),
(8, 3, 2, 5),
(12, 2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'suny', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'admin2', 'c84258e9c39059a89ab77d846ddab909'),
(5, 'suny2', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'shamssuny', 'b84e67d3501d4019377eeb4e79d7db13'),
(7, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`evid`) REFERENCES `event` (`evid`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`evid`) REFERENCES `event` (`evid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
