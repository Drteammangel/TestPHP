-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-09-02 10:29:33
-- 服务器版本： 5.5.39
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_name` varchar(60) NOT NULL,
  `user_sex` varchar(10) NOT NULL,
  `user_grade` varchar(30) NOT NULL,
  `user_degree` varchar(30) DEFAULT NULL,
  `user_comment` mediumtext,
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `unique_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `user_info`
--

INSERT INTO `user_info` (`user_name`, `user_sex`, `user_grade`, `user_degree`, `user_comment`, `user_id`, `user_avatar`) VALUES
('Mark', 'male', 'Grade 2', 'junior', '', 1, 'photos/1.jpg'),
('Alice', 'female', 'Grade 2', 'senior', NULL, 2, NULL),
('David', 'male', 'Grade 1', 'junior', '', 3, ''),
('Sony', 'female', 'Grade 1', 'junior', '', 4, ''),
('Tony', 'male', 'Grade 2', 'senior', '', 5, ''),
('Smith', 'male', 'Grade 3', 'senior', '', 6, 'photos/6.jpg'),
('Ben', 'male', 'Grade 1', 'junior', '1231', 7, 'photos/7.jpg'),
('White', 'male', 'Grade 1', 'junior', 'notihng', 8, 'photos/8.png'),
('张', 'male', '大三', '本科', '', 9, 'photos/9.jpg'),
('Back', 'male', 'Grade 1', 'senior', '', 10, 'photos/10.jpeg'),
('Sherry', 'female', 'Grade 2', 'senior', 'lovely', 11, 'photos/11.jpg'),
('Cherry', 'female', 'Grade 1', 'senior', '', 12, ''),
('Bruke', 'male', 'Grade 1', 'senior', 'asdfg', 13, ''),
('Ajax', 'male', 'Grade 1', 'senior', 'asdf', 14, ''),
('贾达', 'male', '', '', '', 15, 'photos/15.jpeg'),
('贾科斯', 'male', '大二', '本科', '五', 16, 'photos/16.jpg'),
('1234', 'male', '12341325', '412341235', 'adsfadsfadsg', 19, 'photos/19.jpg'),
('jiajia', 'female', 'grade 1', NULL, NULL, 20, NULL),
('幻刺', 'female', '', '', '', 23, ''),
('艾尔太', 'male', 'Grade 2', 'junior', '阿三地方', 24, 'photos/24.jpg'),
('阿尔泰', 'male', '', '', '', 25, 'photos/1408345060.jpeg'),
('米西', 'female', '阿阿斯蒂芬', '阿斯顿枫', '12341234', 26, 'photos/1408345154.jpg'),
('西米', 'male', '123', '12341325', '123413251324', 27, 'photos/1408345229.jpeg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
