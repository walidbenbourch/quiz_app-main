-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_number`, `is_correct`, `text`) VALUES
(1, 2, 1, '$'),
(2, 2, 0, '@'),
(3, 2, 0, '!'),
(4, 2, 0, '&'),
(5, 2, 0, '#'),
(6, 1, 0, 'Private Home Page'),
(7, 1, 1, 'PHP: Hypertext Preprocessor'),
(8, 1, 0, 'Personal Hypertext Processor'),
(9, 1, 0, 'Pro Home Plugin'),
(10, 1, 0, 'Personal Hybrid Preprocessor'),
(11, 3, 1, 'Yes'),
(12, 3, 0, 'No'),
(13, 4, 0, 'Document.Write(\"Hello World\");'),
(14, 4, 0, '\"Hello World\";'),
(15, 4, 0, 'console.log(\"Hello World\");'),
(16, 4, 0, 'putOnScreen(\"Hello World\");'),
(17, 4, 1, 'echo \"Hello World\";'),
(20, 5, 1, 'False'),
(21, 5, 0, 'True'),
(22, 6, 0, 'new_function myFunction()'),
(23, 6, 0, 'create myFunction()'),
(24, 6, 1, 'function myFunction()'),
(25, 7, 1, '// This is a comment'),
(26, 7, 0, '/* This is a comment */'),
(27, 7, 0, '# This is a comment'),
(28, 7, 0, '<!-- This is a comment -->'),
(29, 8, 1, 'array()'),
(30, 8, 0, 'list()'),
(31, 8, 0, 'new Array()'),
(32, 8, 0, 'create_array()'),
(33, 9, 1, 'True'),
(34, 9, 0, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_number` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_number`, `text`) VALUES
(1, 'What does PHP stand for?'),
(2, 'Which character do you use before a variable in PHP?'),
(3, 'Can you use the PHP language for server-side scripting?'),
(4, 'How do you write \"Hello World\" in PHP?'),
(5, 'Include files must have the file extension \".inc\"'),
(6, 'What is the correct way to create a function in PHP?'),
(7, 'What is the correct way to write a single-line comment in PHP?'),
(8, 'How do you create an array in PHP?'),
(9, 'Is PHP a case-sensitive language for variable names?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;