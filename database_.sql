-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: mysql3.blazingfast.io:3306
-- Generation Time: Aug 14, 2017 at 08:51 AM
-- Server version: 10.1.22-MariaDB-1~xenial
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamoodde_testarea`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_options`
--

CREATE TABLE `activity_options` (
  `PID` int(5) NOT NULL,
  `Option` varchar(15) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(5) NOT NULL,
  `Author` varchar(45) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `Author`, `Title`, `Text`, `DateTime`) VALUES
(19, 'HamoodDev', 'Test', 'TEst', '2017-08-09 04:24:24.415384'),
(20, 'Tester', 'test', 'test', '2017-08-09 10:15:01.000000');

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

CREATE TABLE `changelog` (
  `id` int(5) NOT NULL,
  `version` varchar(10) NOT NULL,
  `Text` varchar(550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`id`, `version`, `Text`) VALUES
(0, '0.5', 'TSET'),
(15, '1.0', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `poster` varchar(40) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `datet` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `poster`, `message`, `datet`) VALUES
(300, 'BOT', 'Chat Has Been Pruned!', '2017-08-07 06:17:23'),
(301, 'test', '<i>This Message Has Been Removed.</i>', '2017-08-09 08:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `custom_settings`
--

CREATE TABLE `custom_settings` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `enabled` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_settings`
--

INSERT INTO `custom_settings` (`id`, `name`, `enabled`) VALUES
(0, 'MOTD', 'Our Official Chat!'),
(1, 'DisableLogins', '0'),
(2, 'DisablePurchases', '1'),
(3, 'PaypalEmail', 'hamooddev@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `Version` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `filename`, `size`, `type`, `Version`) VALUES
(15, 'New Text Document', '0', 'txt', '1.0');

-- --------------------------------------------------------

--
-- Table structure for table `emojis`
--

CREATE TABLE `emojis` (
  `id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Wut` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emojis`
--

INSERT INTO `emojis` (`id`, `Name`, `Wut`, `url`) VALUES
(0, 'Smile', ':)', 'dist/img/Emojis/smile.png'),
(1, 'Smile', ':D', 'dist/img/Emojis/smile2.png'),
(2, ':P', ':p', 'dist/img/Emojis/tounge.png'),
(3, 'Wink', ';)', 'dist/img/Emojis/wink.png'),
(4, 'Angry', ':@', 'dist/img/Emojis/angry.png'),
(5, 'Sad', ':(', 'dist/img/Emojis/sad.png'),
(6, 'Shocked', ':o', 'dist/img/Emojis/shock.png'),
(7, 'WUT', ':|', 'dist/img/Emojis/straight.png'),
(8, 'Poop', ':poop:', 'dist/img/Emojis/poop.png'),
(9, 'Ghost', ':ghost:', 'dist/img/Emojis/ghost.png'),
(10, 'Frog', ':frog:', 'dist/img/Emojis/frog.png'),
(11, 'Turtle', ':turtle:', 'dist/img/Emojis/turtle.png'),
(12, 'Broken', ':broken:', 'dist/img/Emojis/broken.png'),
(13, 'Praying', ':praying:', 'dist/img/Emojis/praying.png'),
(14, 'Thumps Up', ':thumpsup:', 'dist/img/Emojis/ThumbsUp.png'),
(15, 'Thumps Down', ':thumpsdown:', 'dist/img/Emojis/ThumbsDown.png'),
(16, 'Fuck', ':fuck:', 'dist/img/Emojis/fuck.png'),
(17, 'WUT', ':wut:', 'dist/img/Emojis/wut.webp'),
(18, 'Doggy', ':doggy:', 'dist/img/Emojis/doggy.gif'),
(19, 'ttt', ':/', 'dist/img/Emojis/confused.png'),
(40, 'Smile', ':)', 'dist/img/Emojis/smile.png'),
(41, 'Smile', ':D', 'dist/img/Emojis/smile2.png'),
(42, 'Hand', ':hand:', 'http://www.pngmart.com/files/1/Hand-Emoji-PNG-Image.png'),
(46, 'Ring', ':ring:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Diamond_Ring_Emoji_42x42.png?5542046363841426502'),
(47, 'crying', ':crying:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Loudly_Crying_Face_Emoji_42x42.png?8026536574188759287'),
(48, 'Thinking', ':thinking:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Thinking_Face_Emoji_42x42.png?6135488989279264585'),
(49, 'Sick', ':sick:', 'https://cdn.shopify.com/s/files/1/1061/1924/files/Face_With_Thermometer_Emoji_42x42.png?6135488989279264585');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `username` varchar(40) NOT NULL,
  `version` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `username` varchar(45) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `type` varchar(15) NOT NULL,
  `DateTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`username`, `ip`, `type`, `DateTime`) VALUES
('', '185.96.70.127', 'PC Login', '2017-07-24 03:10:58.000000'),
('HamoodDev', '185.96.70.127', 'PC Login', '2017-07-24 03:11:46.000000'),
('HamoodDev', '', 'PC Login', '2017-07-24 03:19:55.000000'),
('PBMODZ', '', 'PC Login', '2017-07-24 04:10:56.000000'),
('PBMODZ', '', 'PC Login', '2017-07-24 04:10:56.000000'),
('PBMODZ', '', 'PC Login', '2017-07-24 04:10:57.000000'),
('HamoodDev', '', 'PC Login', '2017-07-24 04:34:08.000000'),
('HamoodDev', '', 'PC Login', '2017-07-25 06:22:36.000000'),
('HamoodDev', '', 'PC Login', '2017-07-25 06:45:11.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 04:26:24.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 05:17:35.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 06:32:40.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 04:51:32.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 04:51:33.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 05:49:36.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 11:09:43.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 04:23:23.000000'),
('HamoodDev', '', 'PC Login', '2017-07-26 04:23:23.000000'),
('Jason', '', 'PC Login', '2017-07-26 09:23:21.000000'),
('Jason', '', 'PC Login', '2017-07-27 08:05:34.000000'),
('HamoodDev', '', 'PC Login', '2017-07-27 08:05:42.000000'),
('HamoodDev', '', 'PC Login', '2017-07-29 04:13:08.000000'),
('HamoodDev', '', 'PC Login', '2017-08-03 04:23:07.000000'),
('HamoodDev', '', 'PC Login', '2017-08-03 04:25:07.000000'),
('HamoodDev', '', 'PC Login', '2017-08-03 04:25:07.000000'),
('HamoodDev', '', 'PC Login', '2017-08-03 04:25:08.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:01:22.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:20:12.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:20:39.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:22:30.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:23:57.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:24:45.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:25:21.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:25:39.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:26:14.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:26:50.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:27:34.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:28:31.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:29:19.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:30:00.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:30:27.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:35:02.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:35:21.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:38:21.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:38:35.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:39:07.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:40:06.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:41:29.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:42:49.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:43:53.000000'),
('HamoodDev', '', 'PC Login', '2017-08-07 08:44:36.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:49:43.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:49:51.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:50:42.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:50:42.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:50:43.000000'),
('Tester', '', 'PC Login', '2017-08-08 05:50:43.000000'),
('Tester', '', 'PC Login', '2017-08-08 06:10:37.000000'),
('Tester', '', 'PC Login', '2017-08-08 06:13:26.000000'),
('Tester', '', 'PC Login', '2017-08-08 06:13:57.000000'),
('Tester', '', 'PC Login', '2017-08-08 02:30:38.000000'),
('Tester', '', 'PC Login', '2017-08-08 02:30:53.000000'),
('Tester', '', 'PC Login', '2017-08-08 02:30:59.000000'),
('Tester', '', 'PC Login', '2017-08-08 02:32:23.000000'),
('Tester', '', 'PC Login', '2017-08-08 02:32:32.000000'),
('Tester', '', 'PC Login', '2017-08-08 04:09:33.000000'),
('Tester', '', 'PC Login', '2017-08-08 04:10:49.000000'),
('HamoodDev', '', 'PC Login', '2017-08-08 07:38:54.000000'),
('Tester', '', 'PC Login', '2017-08-08 07:48:35.000000'),
('Tester', '', 'PC Login', '2017-08-08 07:48:40.000000'),
('HamoodDev', '', 'PC Login', '2017-08-08 08:49:04.000000'),
('HamoodDev', '', 'PC Login', '2017-08-09 08:09:16.000000'),
('', '', 'PC Login', '2017-08-09 08:28:41.000000'),
('', '', 'PC Login', '2017-08-09 08:33:03.000000'),
('', '', 'PC Login', '2017-08-09 08:33:34.000000'),
('', '', 'PC Login', '2017-08-09 08:33:39.000000'),
('', '', 'PC Login', '2017-08-09 08:34:01.000000'),
('', '', 'PC Login', '2017-08-09 08:44:00.000000'),
('', '', 'PC Login', '2017-08-09 08:45:34.000000'),
('HamoodDev', '', 'PC Login', '2017-08-09 08:53:21.000000'),
('HamoodDev', '', 'PC Login', '2017-08-09 09:18:57.000000'),
('HamoodDev', '', 'PC Login', '2017-08-09 09:20:55.000000'),
('HamoodDev', '', 'PC Login', '2017-08-09 09:22:05.000000'),
('', '', 'PC Login', '2017-08-09 09:22:18.000000'),
('test', '', 'PC Login', '2017-08-09 09:39:13.000000'),
('test', '', 'PC Login', '2017-08-09 09:40:42.000000'),
('test', '', 'PC Login', '2017-08-09 09:41:03.000000'),
('test', '', 'PC Login', '2017-08-09 09:41:49.000000'),
('test', '', 'PC Login', '2017-08-09 09:44:43.000000'),
('test', '', 'PC Login', '2017-08-09 09:44:53.000000'),
('test', '', 'PC Login', '2017-08-09 09:45:06.000000'),
('test', '', 'PC Login', '2017-08-09 09:45:42.000000'),
('test', '', 'PC Login', '2017-08-09 09:46:15.000000'),
('test', '', 'PC Login', '2017-08-09 09:49:49.000000'),
('test', '', 'PC Login', '2017-08-09 09:54:13.000000'),
('test', '', 'PC Login', '2017-08-09 09:55:55.000000'),
('Tester', '', 'PC Login', '2017-08-09 10:14:31.000000'),
('Tester', '', 'PC Login', '2017-08-09 06:11:05.000000'),
('Tester', '', 'PC Login', '2017-08-09 06:11:23.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:00:20.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:00:52.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:01:16.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:01:16.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:01:40.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:01:55.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:01:58.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:02:10.000000'),
('Tester', '', 'PC Login', '2017-08-09 09:03:14.000000'),
('Tester', '', 'PC Login', '2017-08-10 01:02:41.000000'),
('HamoodDev', '', 'PC Login', '2017-08-10 07:20:22.000000'),
('HamoodDev', '', 'PC Login', '2017-08-10 07:20:22.000000'),
('HamoodDev', '', 'PC Login', '2017-08-10 07:20:22.000000');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `username` varchar(40) NOT NULL,
  `action` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`username`, `action`, `DateTime`, `type`) VALUES
('HamoodDev', 'Created User [Jason]', '2017-07-26 20:17:15', 'log'),
('HamoodDev', 'Edited User [] Changed Rank From [] to [4]', '2017-07-28 00:06:10', 'log'),
('HamoodDev', 'Edited User [] Changed Rank From [] to [1]', '2017-07-28 00:06:17', 'log'),
('HamoodDev', 'Edited User [] Changed Rank From [] to [2]', '2017-07-28 00:06:21', 'log'),
('HamoodDev', 'Banned User []', '2017-07-28 00:06:23', 'log'),
('HamoodDev', 'Edited User [] Changed Rank From [] to [4]', '2017-07-28 00:06:36', 'log'),
('HamoodDev', 'Created User [Tester]', '2017-08-08 01:45:16', 'log'),
('HamoodDev', 'Edited User [] Changed Rank From [] to [1]', '2017-08-08 01:46:22', 'log'),
('HamoodDev', 'Edited User [BLOODY REIGNS] Changed Rank From [3] to [1]', '2017-08-08 01:46:40', 'log'),
('HamoodDev', 'Created User []', '2017-08-09 12:15:40', 'log'),
('test', 'Deleted test&^&s Message.', '2017-08-09 14:04:34', 'log');

-- --------------------------------------------------------

--
-- Table structure for table `mentions`
--

CREATE TABLE `mentions` (
  `userwhotagged` varchar(45) NOT NULL,
  `taggeduser` varchar(45) NOT NULL,
  `postid` int(5) NOT NULL,
  `whotaggedid` int(5) NOT NULL,
  `taggedid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentions`
--

INSERT INTO `mentions` (`userwhotagged`, `taggeduser`, `postid`, `whotaggedid`, `taggedid`) VALUES
('HamoodDev', 'test', 258, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Text` varchar(550) NOT NULL,
  `Sender` varchar(45) NOT NULL,
  `DateTime` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `Section` varchar(7) NOT NULL,
  `To` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mydownloads`
--

CREATE TABLE `mydownloads` (
  `username` varchar(40) NOT NULL,
  `file` varchar(55) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mydownloads`
--

INSERT INTO `mydownloads` (`username`, `file`, `DateTime`) VALUES
('BLOODY REIGNS', 'index', '2017-07-22 21:29:13'),
('HamoodDev', 'dodge_challenger_srt_hellcat_2015-t3', '2017-07-22 22:11:34'),
('HamoodDev', 'index', '2017-07-23 00:54:49'),
('HamoodDev', 'download', '2017-07-23 01:20:38'),
('HamoodDev', 'download', '2017-07-23 01:51:15'),
('HamoodDev', 'New Text Document', '2017-07-24 11:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `Poster` varchar(40) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Title`, `Text`, `Poster`, `DateTime`) VALUES
(3, 'Test News', 'New Update!', 'HamoodDev', '2017-07-23 02:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `pharses`
--

CREATE TABLE `pharses` (
  `id` int(5) NOT NULL,
  `Text` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharses`
--

INSERT INTO `pharses` (`id`, `Text`) VALUES
(5, 'Chat Has Been Pruned!'),
(1, 'Successfully logged in!');

-- --------------------------------------------------------

--
-- Table structure for table `refferals`
--

CREATE TABLE `refferals` (
  `id` int(5) NOT NULL,
  `BuyerName` varchar(45) NOT NULL,
  `ReffID` int(5) NOT NULL,
  `ReffUser` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(5) NOT NULL,
  `Author` varchar(45) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `Author`, `Title`, `Text`, `DateTime`) VALUES
(12, 'test', 'yrdy', 'yrdy', '2017-08-09 10:02:43.000000'),
(13, 'Tester', 'test', 'etst', '2017-08-09 10:14:50.000000');

-- --------------------------------------------------------

--
-- Table structure for table `supporttickets`
--

CREATE TABLE `supporttickets` (
  `Title` varchar(50) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `By` varchar(40) NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supporttickets`
--

INSERT INTO `supporttickets` (`Title`, `Text`, `DateTime`, `By`, `id`, `status`) VALUES
('tset', 'tsest', '2017-07-22 20:41:43', 'HamoodDev', 3, 'Active'),
('test', 'testing', '2017-07-22 22:36:34', 'test 2', 4, 'Active'),
('test', 'tes', '2017-07-23 01:46:45', 'HamoodDev', 5, 'Active'),
('test', 'teset', '2017-07-23 01:47:33', 'HamoodDev', 6, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `supportticketsreplies`
--

CREATE TABLE `supportticketsreplies` (
  `SID` int(5) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `From` varchar(40) NOT NULL,
  `MsgType` varchar(15) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supportticketsreplies`
--

INSERT INTO `supportticketsreplies` (`SID`, `Text`, `From`, `MsgType`, `DateTime`) VALUES
(3, 'tse', 'HamoodDev', 'Client', '2017-07-22 20:41:50'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:18:30'),
(3, 'tset', 'HamoodDev', 'Client', '2017-07-23 01:27:13'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:28:10'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:28:13'),
(3, 'test', 'HamoodDev', 'Client', '2017-07-23 01:33:18'),
(3, 'tset', 'HamoodDev', 'Client', '2017-07-23 01:44:11'),
(6, 'test', 'HamoodDev', 'Client', '2017-07-23 01:47:38'),
(6, 'test', 'HamoodDev', 'Client', '2017-07-23 01:47:47'),
(6, 'ttest', 'HamoodDev', 'Client', '2017-07-23 01:47:52'),
(5, 'test', 'HamoodDev', 'Client', '2017-07-23 01:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `license` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `customtitle` varchar(50) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  `img` varchar(200) NOT NULL DEFAULT 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg',
  `DateJoined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `chatbanned` varchar(5) NOT NULL DEFAULT 'false',
  `theme` varchar(20) NOT NULL DEFAULT 'purple',
  `customindex` int(2) NOT NULL DEFAULT '10',
  `Banned` int(2) NOT NULL DEFAULT '0',
  `pcip` int(50) NOT NULL,
  `ps3ip` int(50) NOT NULL,
  `ps3mac` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `license`, `email`, `customtitle`, `rank`, `img`, `DateJoined`, `country`, `city`, `bio`, `chatbanned`, `theme`, `customindex`, `Banned`, `pcip`, `ps3ip`, `ps3mac`) VALUES
(1, 'HamoodDev', '1111-1111-1111', 'hamoddev@gmail.com', 'Fuck You Bitch.', 4, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-08-09 14:15:40', 'Ukraine', 'Kiev (Shevchenkivs\'kyi district)', '', 'false', 'purple', 3, 0, 0, 0, ''),
(2, 'BOT', 'QFMZ-V2QC-YGUE-MFDP', 'admin@admin.com', 'Fuck You Im BOT Bitch.', 4, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '0000-00-00 00:00:00', '', '', '', 'false', 'purple', 2, 1, 0, 0, ''),
(5, 'BLOODY REIGNS', '7U6B-G5DC-3LPA-4T6D', 'test@gmail.com', '', 1, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-07-22 22:54:10', '', '', '', 'false', 'purple', 10, 0, 0, 0, ''),
(7, 'PBMODZ', '2744-9GLN-S7ZV-6TK2', 'pbmodz1@pbmodz.com', '', 2, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-07-23 00:34:28', 'Ukraine', 'Kiev (Shevchenkivs\'kyi di', '', 'false', 'purple', 10, 0, 0, 0, ''),
(12, 'Jason', '2222-2222-2222', '', '', 1, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-07-26 22:17:15', 'Ukraine', 'Kiev (Shevchenkivs\'kyi di', '', 'false', 'purple', 10, 0, 0, 0, ''),
(13, 'Tester', 'T596-MK3K-EJ5H-NCGV', 'tester@hamooddev.xyz', '', 1, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-08-08 03:45:16', 'Ukraine', 'Kiev (Shevchenkivs\'kyi district)', '', 'false', 'purple', 10, 0, 0, 0, ''),
(14, 'test', '45J6-X8D4-RW7Q-2Y2P', 'test', '', 1, 'https://s-media-cache-ak0.pinimg.com/236x/ae/b3/08/aeb308736b614eb9277ef43983749e3f.jpg', '2017-08-09 14:15:40', 'Ukraine', 'Kiev (Shevchenkivs\'kyi district)', '', 'false', 'purple', 10, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `username` varchar(40) NOT NULL,
  `text` varchar(255) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_options`
--
ALTER TABLE `activity_options`
  ADD KEY `id` (`id`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_settings`
--
ALTER TABLE `custom_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emojis`
--
ALTER TABLE `emojis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `supporttickets`
--
ALTER TABLE `supporttickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_options`
--
ALTER TABLE `activity_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;
--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `emojis`
--
ALTER TABLE `emojis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `supporttickets`
--
ALTER TABLE `supporttickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
