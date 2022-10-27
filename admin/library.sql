-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2019 at 08:02 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
`author_id` int(50) NOT NULL,
  `author_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `create_at`, `update_at`) VALUES
(4, 'صمیم', '2019-10-21', '0000-00-00'),
(6, 'سودابه', '2019-10-21', '0000-00-00'),
(7, 'شفق الله ', '2019-10-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
`book_id` int(50) NOT NULL,
  `record_id` int(50) NOT NULL,
  `book_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  `publisher_id` int(50) NOT NULL,
  `no_of_volume` int(50) NOT NULL,
  `no_of_pages` int(50) NOT NULL,
  `procurement_id` int(50) NOT NULL,
  `category_id` int(50) NOT NULL,
  `edition` varchar(250) COLLATE utf8_bin NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `record_id`, `book_title`, `date`, `publisher_id`, `no_of_volume`, `no_of_pages`, `procurement_id`, `category_id`, `edition`, `price`) VALUES
(7, 89, 'ریاضیات مجزا', '2018-09-29', 6, 87, 800, 7, 4, 'چاپ دوم', 200);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE IF NOT EXISTS `book_author` (
`book_author_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `author_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_author_id`, `book_id`, `author_id`) VALUES
(13, 1, 1),
(16, 1, 1),
(19, 1, 1),
(21, 1, 1),
(14, 1, 2),
(17, 1, 2),
(20, 1, 2),
(22, 1, 2),
(23, 1, 2),
(15, 1, 3),
(18, 1, 3),
(24, 1, 3),
(25, 1, 4),
(26, 1, 6),
(27, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_translator`
--

CREATE TABLE IF NOT EXISTS `book_translator` (
`book_translator_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `translator_id` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book_translator`
--

INSERT INTO `book_translator` (`book_translator_id`, `book_id`, `translator_id`) VALUES
(7, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
`borrow_id` int(50) NOT NULL,
  `book_id` int(50) NOT NULL,
  `type` varchar(250) COLLATE utf8_bin NOT NULL,
  `user_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `borrower_id` int(250) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `collateral` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `book_id`, `type`, `user_name`, `borrower_id`, `check_in`, `check_out`, `collateral`) VALUES
(34, 7, '1', 'sodaba', 9, '2020-02-02', '2019-02-02', 300),
(36, 7, '0', 'sodaba', 14, '2020-02-03', '2020-02-02', 500);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(50) NOT NULL,
  `category_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `create_at`, `update_at`) VALUES
(4, 'هیچ', '2019-10-21', '0000-00-00'),
(5, 'هیچ', '2019-10-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`department_id` int(50) NOT NULL,
  `department_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `faculty_id` int(50) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `faculty_id`, `create_at`, `update_at`) VALUES
(5, 'تعمیرات', 3, '0000-00-00', '0000-00-00'),
(6, 'شهرسازی', 4, '0000-00-00', '0000-00-00'),
(7, 'مهندسی', 5, '2019-09-13', '0000-00-00'),
(8, 'IT', 6, '2019-09-13', '0000-00-00'),
(13, 'samim', 1, '2019-10-02', '0000-00-00'),
(14, 'it', 2, '2019-10-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `external_magazine`
--

CREATE TABLE IF NOT EXISTS `external_magazine` (
`em_id` int(50) NOT NULL,
  `em_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `reference` varchar(250) COLLATE utf8_bin NOT NULL,
  `em_number` int(50) NOT NULL,
  `issue_year` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `external_magazine`
--

INSERT INTO `external_magazine` (`em_id`, `em_name`, `reference`, `em_number`, `issue_year`) VALUES
(4, 'samim', 'کابل ', 3, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`faculty_id` int(50) NOT NULL,
  `faculty_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `create_at`, `update_at`) VALUES
(1, 'ساحتمانی', '0000-00-00', '0000-00-00'),
(2, 'کمپیوترساینس', '0000-00-00', '0000-00-00'),
(3, 'هایدرولیک', '0000-00-00', '0000-00-00'),
(4, 'مهندسی', '0000-00-00', '0000-00-00'),
(5, 'شهر سازی', '2019-09-13', '0000-00-00'),
(6, 'تعمیرات', '2019-09-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `other_member`
--

CREATE TABLE IF NOT EXISTS `other_member` (
`om_id` int(50) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `f_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone_no` int(50) NOT NULL,
  `reference` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `other_member`
--

INSERT INTO `other_member` (`om_id`, `name`, `f_name`, `phone_no`, `reference`) VALUES
(9, 'samim', 'saim', 783670859, 'کابل ');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE IF NOT EXISTS `panel` (
`panel_id` int(50) NOT NULL,
  `wp_id` int(50) NOT NULL,
  `mag_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE IF NOT EXISTS `procurement` (
`procurement_id` int(50) NOT NULL,
  `procurement_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`procurement_id`, `procurement_name`, `create_at`, `update_at`) VALUES
(7, 'نقیب', '2019-10-21', '0000-00-00'),
(8, 'نصیر', '2019-10-21', '0000-00-00'),
(9, 'نجیب', '2019-10-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
`publisher_id` int(50) NOT NULL,
  `publisher_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `publisher_address` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`, `publisher_address`, `create_at`, `update_at`) VALUES
(6, 'سمیغ', 'کابل', '2019-10-21', '0000-00-00'),
(7, 'تمیم', 'بدخشان', '2019-10-21', '0000-00-00'),
(8, 'جواد', 'کابل', '2019-10-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `scientific_magazine`
--

CREATE TABLE IF NOT EXISTS `scientific_magazine` (
`mag_id` int(50) NOT NULL,
  `mag_no` int(50) NOT NULL,
  `faculty_id` int(50) NOT NULL,
  `teacher_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `panel_id` int(50) NOT NULL,
  `issue_year` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `scientific_magazine`
--

INSERT INTO `scientific_magazine` (`mag_id`, `mag_no`, `faculty_id`, `teacher_name`, `panel_id`, `issue_year`) VALUES
(6, 332, 2, 'aa', 1, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(50) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `f_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `id_no` int(50) NOT NULL,
  `date` date NOT NULL,
  `detail` varchar(250) COLLATE utf8_bin NOT NULL,
  `faculty_id` int(50) NOT NULL,
  `department_id` int(50) NOT NULL,
  `current_resident` varchar(250) COLLATE utf8_bin NOT NULL,
  `original_resident` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone_no` int(50) NOT NULL,
  `email_address` varchar(250) COLLATE utf8_bin NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `f_name`, `id_no`, `date`, `detail`, `faculty_id`, `department_id`, `current_resident`, `original_resident`, `phone_no`, `email_address`, `photo`) VALUES
(14, 'sodaba', 'm.naim', 4355, '2019-10-21', 'کانکور', 3, 5, 'kapisa', 'kabul', 783670859, 'samim.saim1212@gmail.com', 0x6173736574732f696d672f73747564656e74732f66656d616c652e6a70673038333532372e6a706567),
(15, 'tamim', 'hamad', 443, '2019-10-21', 'کانکور', 1, 13, 'kabpsi', 'kabul', 783670859, 'samim.saim1212@gmail.com', 0x6173736574732f696d672f73747564656e74732f6d616c652e6a70673036323335322e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `translator`
--

CREATE TABLE IF NOT EXISTS `translator` (
`translator_id` int(50) NOT NULL,
  `translator_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `translator`
--

INSERT INTO `translator` (`translator_id`, `translator_name`, `create_at`, `update_at`) VALUES
(6, 'تواب', '2019-10-21', '0000-00-00'),
(7, 'صادق', '2019-10-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone` int(15) NOT NULL,
  `gender` varchar(20) COLLATE utf8_bin NOT NULL,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `position` varchar(100) COLLATE utf8_bin NOT NULL,
  `privilege` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` int(11) NOT NULL,
  `create_at` date NOT NULL,
  `update_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `last_name`, `email`, `phone`, `gender`, `username`, `password`, `position`, `privilege`, `image`, `create_at`, `update_at`) VALUES
(2, 'sodaba', 'rahimi', 'kapu@gmail.com', 7899685, 'f', 'sodaba', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'staff', 'admin', 0, '0000-00-00', '0000-00-00'),
(3, 'samim', 'saim', 'samim.saim1212@gmail.com', 2147483647, 'm', 'samim', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'کارمند', 'guest', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `writing_panel`
--

CREATE TABLE IF NOT EXISTS `writing_panel` (
`wp_id` int(50) NOT NULL,
  `wp_name` varchar(250) COLLATE utf8_bin NOT NULL,
  `mag_no` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `writing_panel`
--

INSERT INTO `writing_panel` (`wp_id`, `wp_name`, `mag_no`) VALUES
(1, 'samim', 2),
(3, 'sodaba jan', 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
 ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
 ADD PRIMARY KEY (`book_id`), ADD KEY `book_author_id` (`publisher_id`,`procurement_id`,`category_id`), ADD KEY `publisher_id` (`publisher_id`), ADD KEY `procurement_id` (`procurement_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
 ADD PRIMARY KEY (`book_author_id`), ADD KEY `book_id` (`book_id`,`author_id`), ADD KEY `author_id` (`author_id`), ADD KEY `book_id_2` (`book_id`), ADD KEY `author_id_2` (`author_id`);

--
-- Indexes for table `book_translator`
--
ALTER TABLE `book_translator`
 ADD PRIMARY KEY (`book_translator_id`), ADD KEY `book_id` (`book_id`,`translator_id`), ADD KEY `book_id_2` (`book_id`), ADD KEY `translator_id` (`translator_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
 ADD PRIMARY KEY (`borrow_id`), ADD KEY `book_id` (`book_id`,`user_name`), ADD KEY `book_id_2` (`book_id`), ADD KEY `user-id` (`user_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`department_id`), ADD KEY `faculty_id` (`faculty_id`), ADD KEY `faculty_id_2` (`faculty_id`);

--
-- Indexes for table `external_magazine`
--
ALTER TABLE `external_magazine`
 ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `other_member`
--
ALTER TABLE `other_member`
 ADD PRIMARY KEY (`om_id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
 ADD PRIMARY KEY (`panel_id`), ADD KEY `wp_id` (`wp_id`,`mag_id`), ADD KEY `wp_id_2` (`wp_id`), ADD KEY `mag_id` (`mag_id`);

--
-- Indexes for table `procurement`
--
ALTER TABLE `procurement`
 ADD PRIMARY KEY (`procurement_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
 ADD PRIMARY KEY (`publisher_id`);

--
-- Indexes for table `scientific_magazine`
--
ALTER TABLE `scientific_magazine`
 ADD PRIMARY KEY (`mag_id`), ADD KEY `faculty_id` (`faculty_id`,`panel_id`), ADD KEY `faculty_id_2` (`faculty_id`), ADD KEY `panel_id` (`panel_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`), ADD KEY `faculty_id` (`faculty_id`,`department_id`), ADD KEY `faculty_id_2` (`faculty_id`), ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `translator`
--
ALTER TABLE `translator`
 ADD PRIMARY KEY (`translator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `writing_panel`
--
ALTER TABLE `writing_panel`
 ADD PRIMARY KEY (`wp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
MODIFY `author_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
MODIFY `book_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
MODIFY `book_author_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `book_translator`
--
ALTER TABLE `book_translator`
MODIFY `book_translator_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
MODIFY `borrow_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `department_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `external_magazine`
--
ALTER TABLE `external_magazine`
MODIFY `em_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `faculty_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `other_member`
--
ALTER TABLE `other_member`
MODIFY `om_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
MODIFY `panel_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `procurement`
--
ALTER TABLE `procurement`
MODIFY `procurement_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
MODIFY `publisher_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `scientific_magazine`
--
ALTER TABLE `scientific_magazine`
MODIFY `mag_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `translator`
--
ALTER TABLE `translator`
MODIFY `translator_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `writing_panel`
--
ALTER TABLE `writing_panel`
MODIFY `wp_id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
ADD CONSTRAINT `book_ibfk_10` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `book_ibfk_8` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `book_ibfk_9` FOREIGN KEY (`procurement_id`) REFERENCES `procurement` (`procurement_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_translator`
--
ALTER TABLE `book_translator`
ADD CONSTRAINT `book_translator_ibfk_2` FOREIGN KEY (`translator_id`) REFERENCES `translator` (`translator_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panel`
--
ALTER TABLE `panel`
ADD CONSTRAINT `panel_ibfk_1` FOREIGN KEY (`wp_id`) REFERENCES `writing_panel` (`wp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `panel_ibfk_2` FOREIGN KEY (`mag_id`) REFERENCES `scientific_magazine` (`mag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scientific_magazine`
--
ALTER TABLE `scientific_magazine`
ADD CONSTRAINT `scientific_magazine_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
