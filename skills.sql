-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 10:08 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skills`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(100) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_user`, `admin_password`, `date`) VALUES
(1, 'amdin', 'admin@123', '2016-06-20 11:33:05'),
(2, 'admin', 'admin', '2016-06-20 12:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name_eng` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_hi` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_guj` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan4` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan5` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_name_lan6` varchar(200) CHARACTER SET utf8 NOT NULL,
  `c_description_eng` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `c_description_hi` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `c_description_guj` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `c_description_lan4` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan5` longtext CHARACTER SET utf8 NOT NULL,
  `c_description_lan6` longtext CHARACTER SET utf8 NOT NULL,
  `c_icon` varchar(200) NOT NULL,
  `p_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `c_name_eng`, `c_name_hi`, `c_name_guj`, `c_name_lan4`, `c_name_lan5`, `c_name_lan6`, `c_description_eng`, `c_description_hi`, `c_description_guj`, `c_description_lan4`, `c_description_lan5`, `c_description_lan6`, `c_icon`, `p_id`, `date`) VALUES
(1, 'Business ', '', '', '', '', '', '', '', '', '', '', '', 'business.jpg', 0, '2016-06-30 12:02:35'),
(2, 'Web tools ', '', '', '', '', '', '', '', '', '', '', '', 'webtools.jpg', 0, '2016-06-06 09:27:11'),
(3, 'Cloud Storage', '', '', '', '', '', '', '', '', '', '', '', 'cloud_storage.jpg', 0, '2016-06-06 09:32:06'),
(4, 'E-Mail', '', '', '', '', '', '', '', '', '', '', '', 'email.jpg', 0, '2016-06-06 09:32:06'),
(5, 'Audio+Video', '', '', '', '', '', '', '', '', '', '', '', 'audio-video.jpg', 0, '2016-06-06 09:32:06'),
(6, 'Computer Skills ', '', '', '', '', '', '', '', '', '', '', '', 'comp_skills.jpg', 0, '2016-06-06 09:32:06'),
(7, 'Accounting', '', '', '', '', '', '', '', '', '', '', '', 'accounting.jpg', 0, '2016-06-06 09:32:06'),
(8, 'Office Tools', '', '', '', '', '', '', '', '', '', '', '', 'office_tools.jpg', 0, '2016-06-06 09:32:06'),
(9, 'Productivity Tools', '', '', '', '', '', '', '', '', '', '', '', 'prod_tools.jpg', 0, '2016-06-06 09:32:06'),
(10, 'VOIP', '', '', '', '', '', '', '', '', '', '', '', 'voip.jpg', 0, '2016-06-06 09:32:59'),
(11, 'Microsoft PowerPoint', '', '', '', '', '', '', '', '', '', '', '', 'powerpoint.jpg', 1, '2016-06-06 12:08:53'),
(12, 'Google Slides', '', '', '', '', '', '', '', '', '', '', '', 'googleslide.jpg', 1, '2016-06-06 12:08:53'),
(13, 'Gmail', '', '', '', '', '', '', '', '', '', '', '', 'gmail.jpg', 1, '2016-06-06 12:14:39'),
(14, 'Google Calander', '', '', '', '', '', '', '', '', '', '', '', 'calander.jpg', 1, '2016-06-06 12:14:39'),
(15, 'Evernote', '', '', '', '', '', '', '', '', '', '', '', 'evernote.jpg', 1, '2016-06-06 12:14:39'),
(16, 'Wunder List', '', '', '', '', '', '', '', '', '', '', '', 'wunderlist.jpg', 1, '2016-06-06 12:14:39'),
(17, 'Google Keep', '', '', '', '', '', '', '', '', '', '', '', 'google_keep.jpg', 1, '2016-06-06 12:14:39'),
(18, 'Google Forms', '', '', '', '', '', '', '', '', '', '', '', 'forms.jpg', 1, '2016-06-06 12:14:39'),
(19, 'Microsoft Word', '', '', '', '', '', '', '', '', '', '', '', 'word.jpg', 1, '2016-06-06 12:14:39'),
(20, 'Microsoft Excel', '', '', '', '', '', '', '', '', '', '', '', 'exeal.jpg', 1, '2016-06-06 12:14:39'),
(21, 'Google Docs', '', '', '', '', '', '', '', '', '', '', '', 'docs.jpg', 1, '2016-06-06 12:14:39'),
(22, 'Google Sheets', '', '', '', '', '', '', '', '', '', '', '', 'sheet.jpg', 1, '2016-06-06 12:14:39'),
(23, 'Tally', '', '', '', '', '', '', '', '', '', '', '', 'tally.jpg', 1, '2016-06-06 12:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `language` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `full_name`, `email`, `mobile`, `u_name`, `password`, `profile_pic`, `language`, `date`) VALUES
(1, 'Snehal Trapsiya', 'snehal.trapsiya@gmail.com', '8866739817', 'snehal@gmail.com', 'snehal', 'snehal.jpg', 'eng', '2016-06-30 12:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_name_eng` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_hi` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_name_guj` varchar(200) CHARACTER SET utf8 NOT NULL,
  `v_url_eng` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_hi` longtext CHARACTER SET utf8 NOT NULL,
  `v_url_guj` longtext CHARACTER SET utf8 NOT NULL,
  `v_level` varchar(30) NOT NULL,
  `v_duration` varchar(30) NOT NULL,
  `v_rating` varchar(20) NOT NULL,
  `v_view_count` varchar(20) NOT NULL,
  `v_order` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`v_id`, `v_name_eng`, `v_name_hi`, `v_name_guj`, `v_url_eng`, `v_url_hi`, `v_url_guj`, `v_level`, `v_duration`, `v_rating`, `v_view_count`, `v_order`, `cat_id`, `date`) VALUES
(1, 'Introduction Of Powerpoint', '', '', 'https://vimeo.com/143858434', '', '', 'Beginner', '02:30', '4', '20', '1', 11, '2016-06-29 09:19:27'),
(2, 'Interface Of Powerpoint', '', '', 'https://vimeo.com/143858434', '', '', 'Beginner', '02:30', '4', '20', '2', 11, '2016-06-29 09:19:27'),
(3, 'Presenting Slide Show 1', '', '', 'https://vimeo.com/143858434', '', '', 'Intermediate', '02:30', '4', '20', '3', 11, '2016-06-29 09:23:49'),
(4, 'Presenting Slide Show 2', '', '', 'https://vimeo.com/143858434', '', '', 'Intermediate', '02:30', '4', '20', '4', 11, '2016-06-29 09:19:27'),
(5, 'Insert Table', '', '', 'https://vimeo.com/143858434', '', '', 'Advanced', '02:30', '4', '20', '5', 11, '2016-06-29 09:19:27'),
(6, 'Chart', '', '', 'https://vimeo.com/143858434', '', '', 'Advanced', '02:30', '4', '20', '6', 11, '2016-06-29 09:19:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
