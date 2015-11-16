-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2015 at 07:01 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_yii2_adv`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_auth_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `user_id`, `source`, `source_id`) VALUES
(5, 49, 'facebook', '10153827345394893');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('sysadmin', '1', 1446108332),
('User', '1', 1447401013),
('User', '17', 1447408443),
('UserAdmin', '1', 1447401013);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1447418359, 1447418359),
('/admin/*', 2, NULL, NULL, NULL, 1445343489, 1445343489),
('/user/*', 2, NULL, NULL, NULL, 1447413321, 1447413321),
('/user/admin/*', 2, NULL, NULL, NULL, 1446201290, 1446201290),
('AdminCreateUser', 2, 'Admin Create a user', NULL, NULL, 1447401012, 1447401012),
('AdminCreateUserProfile', 2, 'Admin Create user profile', NULL, NULL, 1447401012, 1447401012),
('AdminDeleteUser', 2, 'Admin Delete user', NULL, NULL, 1447401012, 1447401012),
('AdminDeleteUserProfile', 2, 'Admin Delete user profile', NULL, NULL, 1447401013, 1447401013),
('AdminFileUpload', 2, 'Admin Delete user profile', NULL, NULL, 1447401013, 1447401013),
('AdminIndexUser', 2, 'Admin Index of users', NULL, NULL, 1447401012, 1447401012),
('AdminResetUserPassword', 2, 'Admin Reset user password', NULL, NULL, 1447401012, 1447401012),
('AdminSetUserPassword', 2, 'Admin Set user password', NULL, NULL, 1447401012, 1447401012),
('AdminUpdateUser', 2, 'Admin Update user', NULL, NULL, 1447401012, 1447401012),
('AdminUpdateUserProfile', 2, 'Admin Update user profile', NULL, NULL, 1447401013, 1447401013),
('AdminViewUser', 2, 'Admin View user', NULL, NULL, 1447401012, 1447401012),
('sysadmin', 1, 'System Administrator', NULL, NULL, 1446107563, 1446107563),
('User', 1, 'User role', NULL, NULL, 1447401013, 1447401013),
('user-admin', 2, 'Full User Administration', NULL, NULL, 1446201463, 1446201489),
('UserAccountChangePassword', 2, 'User change password', NULL, NULL, 1447401013, 1447401013),
('UserAccountEdit', 2, 'User edit account', NULL, NULL, 1447401013, 1447401013),
('UserAccountIndex', 2, 'User Accounts index', NULL, NULL, 1447401013, 1447401013),
('UserAccountMy', 2, 'User My data', NULL, NULL, 1447401013, 1447401013),
('UserAdmin', 1, 'User Administrator role', NULL, NULL, 1447401013, 1447401013);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('sysadmin', '/*'),
('User', '/user/*'),
('user-admin', '/user/admin/*'),
('UserAdmin', 'AdminCreateUser'),
('UserAdmin', 'AdminCreateUserProfile'),
('UserAdmin', 'AdminDeleteUser'),
('UserAdmin', 'AdminDeleteUserProfile'),
('UserAdmin', 'AdminFileUpload'),
('UserAdmin', 'AdminIndexUser'),
('UserAdmin', 'AdminResetUserPassword'),
('UserAdmin', 'AdminSetUserPassword'),
('UserAdmin', 'AdminUpdateUser'),
('UserAdmin', 'AdminUpdateUserProfile'),
('UserAdmin', 'AdminViewUser'),
('sysadmin', 'User'),
('User', 'UserAccountChangePassword'),
('User', 'UserAccountEdit'),
('User', 'UserAccountIndex'),
('User', 'UserAccountMy'),
('sysadmin', 'UserAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1427976576),
('m130524_201442_init', 1427976579),
('m140602_111327_create_menu_table', 1446110747);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `intro_text` longtext NOT NULL,
  `full_text` longtext NOT NULL,
  `intro_image` tinytext NOT NULL,
  `full_image` tinytext NOT NULL,
  `user_created` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_last_change` int(11) NOT NULL,
  `date_last_change` datetime NOT NULL,
  `publish` varchar(1) NOT NULL,
  `categories` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `intro_text`, `full_text`, `intro_image`, `full_image`, `user_created`, `date_created`, `user_last_change`, `date_last_change`, `publish`, `categories`) VALUES
(3, 'This is a test Article 3', 'This is a intro textdfdsfg\r\n', '<p>This is a full text</p><p>gfhgfhgfhghnjgj</p><p><br></p>', '', '', 1, '2015-10-27 15:48:41', 1, '2015-11-12 16:30:51', '1', 'category1, category2,'),
(4, 'Test Article 4', 'tuytutyu', '<p>uytutyu</p>', '', '', 1, '2015-10-27 15:48:55', 1, '2015-10-29 09:31:38', '1', ''),
(5, 'jghjghjghj', 'jhgjgh', '<p>fgjhgjghj</p>', '', '', 1, '2015-11-10 10:20:24', 1, '2015-11-10 10:20:15', '1', 'hjhgj'),
(6, 'dsfdsfgfd', 'gfdgdfg', '<p>dfgfdgd</p>', '', '', 1, '2015-11-12 12:48:36', 1, '2015-11-12 12:48:26', '1', 'dsfds sdfgfdgdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL,
  `activate_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `activate_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'OfPhyA7FGlmyY8RfaPEQs7Y4EO7TNcdu', '$2y$13$K5SxCOnmAVgr5H0XgGKU3uLkaNbARemBsSMOGwRldfwghHtYSOZCO', 'FCbZoXv7p73VRgpfPuV7miE2ZXNuK98m_1447320611', 'plathir@gmail.com', 0, '', 10, 1427976606, 1447411664),
(17, 'user', 'Pen27THphVPZHSQ0au1b2FNT-uzyL4Ut', '$2y$13$0gAyErcnbdwKgJBD0/gAw.BqY4IiejrOXsGCBhY5adN2oBorlPbKK', NULL, 'developerpages.gr@gmail.com', 0, 'oq3yYOJdU22hkCBI74Pf0YGM0umkPsE1_1440075658', 10, 1440075658, 1447411684),
(18, 'testxx', 'tQSea-2mqrr47suXt_ZT6J0FflMtgvuL', '$2y$13$EM7UPPa5S6KtKpHRz1eINuGFfsRlmlBISnmKMwKn224r3PXbimT/e', NULL, 'plathir@test.gr', 0, '', 10, 1442495245, 1444994288),
(33, 'test3', 'aNumQ2PILS5X2-fHvizbZZ_mAJ5k7xML', '$2y$13$eEPgQWHbmFRrcMvhPj5aK.PNRm0lZuLx/cINmJDqIdlxFX8AEVmo6', NULL, 'plathir@quest.gr', 1, '', 10, 1443444159, 1444136826),
(42, 'testddd', 'CUEVleNLz0RHIHpoM2iBlsYnT61ivHrd', '$2y$13$z8MVX7lsEEJVixDdpdLfMenOj/2jRygteoN6XwWPyJEwuzyhHJIOy', NULL, 'testddd@testdd.gr', 1, '', 10, 1443774310, 1443774382),
(49, 'Lathiris Panagiotis', 'LJ5sb1CIhCn6Xanln4SVKnI9etDUtvOc', '$2y$13$UyleVEfxSZnwJBzaLpZjgu0X5TpcUWIkM6CQJHG8UM1PO85g8gwbK', 'Nv9ycbM3SjGo_WdVxAQkPfZQRxJCrcgI_1444994295', 'plathir@yahoo.com', 0, '', 10, 1444994295, 1444994295);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `gender` smallint(6) NOT NULL,
  `birth_date` date NOT NULL,
  `profile_image` tinytext CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `first_name`, `last_name`, `gender`, `birth_date`, `profile_image`, `created_at`, `updated_at`, `updated_by`) VALUES
(1, 'First Name ', 'fghgfh', 1, '1900-12-14', '5645ea0b71ca3.jpg', 1444740590, 1447422476, 1),
(16, 'dfg', 'fdgfdg', 1, '0000-00-00', '', 1443613589, 1443613716, 1),
(17, 'User First Name', 'ghf', 1, '2015-10-29', '561cd8b3af2ec.jpg', 1444731066, 1447411356, 17),
(18, 'truytu', 'utyu', 1, '2015-10-23', '56334e84ebee8.jpg', 1446203023, 1446203023, 1),
(33, 'vbnvn', 'vbnbvn', 1, '2015-10-22', '', 1444310291, 1444310371, 1),
(42, 'dfdsf', 'sdfdsf', 1, '1900-12-21', '5631e6ea9e481.jpg', 1443777173, 1446110955, 1),
(49, 'dfg', 'dfgfdg', 1, '2015-10-22', '5644a31441606.jpg', 1445004962, 1447338774, 49);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
