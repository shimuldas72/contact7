-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2017 at 07:38 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_fields`
--

CREATE TABLE IF NOT EXISTS `form_fields` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `field_key` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `placeholder` varchar(255) NOT NULL,
  `hint` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL,
  `options` text NOT NULL,
  `validators` text NOT NULL,
  `template` text NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_fields`
--

INSERT INTO `form_fields` (`id`, `form_id`, `field_key`, `label`, `placeholder`, `hint`, `field_type`, `options`, `validators`, `template`, `sort_order`) VALUES
(27, 4, 'name', 'Name', 'Enter your name here', 'Enter your name here', 'textInput', '', 'string,required', '', 0),
(28, 4, 'phone', 'Phone', 'Enter your phone here', '', 'textInput', '', 'string,required', '', 0),
(29, 4, 'message', 'Message', 'Enter your message here', '', 'textArea', '', 'string,required', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_list`
--

CREATE TABLE IF NOT EXISTS `form_list` (
  `id` int(11) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `form_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `form_class` varchar(255) NOT NULL,
  `submit_button_template` text NOT NULL,
  `success_template` text NOT NULL,
  `error_template` text NOT NULL,
  `success_error_position` varchar(255) NOT NULL,
  `send_to` text NOT NULL,
  `cc` text NOT NULL,
  `bcc` text NOT NULL,
  `subject` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_list`
--

INSERT INTO `form_list` (`id`, `form_name`, `form_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `form_class`, `submit_button_template`, `success_template`, `error_template`, `success_error_position`, `send_to`, `cc`, `bcc`, `subject`, `from_name`, `from_email`) VALUES
(4, 'Contact Form', 'contact-form', '2017-04-08 16:13:37', '2017-04-08 10:13:37', NULL, NULL, 'contact-form', '', '', '', 'top', 'shimuldas72@gmail.com', '', '', 'Landowner mail', 'Dcastalia', 'shimul@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `form_submitted`
--

CREATE TABLE IF NOT EXISTS `form_submitted` (
  `id` int(11) NOT NULL,
  `form_id` varchar(255) NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `form_actual_id` int(11) NOT NULL,
  `form_subject` varchar(255) NOT NULL,
  `sent_to` text NOT NULL,
  `sent_options` text NOT NULL,
  `sent_data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_seen` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_submitted`
--

INSERT INTO `form_submitted` (`id`, `form_id`, `form_name`, `form_actual_id`, `form_subject`, `sent_to`, `sent_options`, `sent_data`, `created_at`, `is_seen`) VALUES
(16, 'contact-form', 'Contact Form', 4, 'Landowner mail', 'shimuldas72@gmail.com', '{"cc":"","bcc":"","from_name":"Dcastalia","from_email":"shimul@yahoo.com"}', '{"name":"Shimul Das","phone":"(281) 658-9593","message":"dadasd"}', '2017-04-08 12:38:57', 0),
(17, 'contact-form', 'Contact Form', 4, 'Landowner mail', 'shimuldas72@gmail.com', '{"cc":"","bcc":"","from_name":"Dcastalia","from_email":"shimul@yahoo.com"}', '{"name":"Shimul Das","phone":"01717356438","message":"This is awesome."}', '2017-04-08 12:40:44', 0),
(18, 'contact-form', 'Contact Form', 4, 'Landowner mail', 'shimuldas72@gmail.com', '{"cc":"","bcc":"","from_name":"Dcastalia","from_email":"shimul@yahoo.com"}', '{"name":"Shimul Das","phone":"01717356438","message":"This is awesome."}', '2017-04-08 12:41:48', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_fields`
--
ALTER TABLE `form_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_list`
--
ALTER TABLE `form_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_submitted`
--
ALTER TABLE `form_submitted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_fields`
--
ALTER TABLE `form_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `form_list`
--
ALTER TABLE `form_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `form_submitted`
--
ALTER TABLE `form_submitted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
