-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2019 at 07:27 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

-- CREATE TABLE `questions` (
--   `qid` int(11) NOT NULL,
--   `qno` int(11) NOT NULL,
--   `question` text NOT NULL,
--   `ans1` text NOT NULL,
--   `ans2` text NOT NULL,
--   `ans3` text NOT NULL,
--   `ans4` text NOT NULL,
--   `correct_answer` varchar(1) NOT NULL
-- ) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

-- INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
-- (9, 5, 'What is a correct way to add a comment in PHP?', '&lt;!--&hellip;--&gt;', '/*&hellip;*/', '*\\..\\*', '&lt;comment&gt;&hellip;&lt;/comment&gt;', 'b'),
-- (8, 3, 'The PHP syntax is most similar to:', 'Perl and C', 'VBscript', 'Javascript', 'none of these', 'a'),
-- (7, 2, 'How do you write "Hello World" in PHP?', 'echo "Hello World";', 'Document.Write("Hello World");', '"Hello World";', 'none of these', 'a'),
-- (6, 1, 'What does PHP stand for?', 'Personal Hypertext Processor\r\n', 'Private Home Page', 'Personal Home Page', 'PHP: Hypertext Preprocessor', 'd'),
-- (5, 4, 'How do you get information from a form that is submitted using the &quot;get&quot; method?', '$_GET[];', 'Request.Form;', 'Request.QueryString;', 'none of these', 'a'),
-- (10, 6, 'When using the POST method, variables are displayed in the URL:', 'True', 'False', 'Can\'t say', 'none of these', 'b'),
-- (11, 7, ' Which of the following function is used to get the size of a file?', 'fopen()', 'fread()', 'fsize()', 'filesize()', 'd'),
-- (12, 8, 'Which of the following is used to delete a cookie?', 'setcookie()', '$_COOKIE variable', 'isset() function', 'none of the above', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `mbno` DECIMAL(10,0) PRIMARY KEY,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
 `last_mod` varchar(225) NOT NULL,
  `tattmpt` int(11) NOT NULL DEFAULT '0',
  `tcorrect` int(11) NOT NULL DEFAULT '0',
  `tleft` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
-- ALTER TABLE `questions`
--   ADD PRIMARY KEY (`qid`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
-- ALTER TABLE `questions`
--   MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=01;
-- --
-- AUTO_INCREMENT for table `users`
--
-- ALTER TABLE `users`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=01;
-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
