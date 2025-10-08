-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2025 at 10:47 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(2, 'Saisi', '$2y$10$qa699yS2bH8ozJg0RuTxw.9mNFyxaJG8iEqecDCSIPCxBDG5aLUyS');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `edition` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `pages` int NOT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `isbn`, `publisher`, `edition`, `price`, `pages`) VALUES
(14, ' Mocking bird', '4256247433', 'Harper Lee', '1', 850.00, 234),
(12, 'Geography-form4', '723097348', 'hennry ibsen', '7', 200.00, 150),
(5, 'english', '123456789', 'jacob njoki', '4', 200.00, 50),
(6, 'kiswahili form2', '45678910', 'bahubali', '7', 150.00, 200),
(9, 'maths form 1', '234234', 'bahati', '2nd', 4.00, 9),
(13, 'tumbo lisiloshiba', '578585956', 'james kiharia', '4', 400.00, 54),
(15, '1984', '347363489', 'George Orwell', '6', 599.00, 433),
(16, 'Pride and Prejudice', '84894583', 'Jane Austen', '7', 3840.00, 445),
(17, 'Introduction to Programming', '9781234567897', 'Pearson', '1st', 4500.00, 350),
(18, 'Data Structures in Depth', '9782345678901', 'McGraw-Hill', '2nd', 5200.00, 420),
(19, 'Advanced Web Development', '9783456789012', 'O\'Reilly Media', '1st', 6100.00, 500),
(20, 'Database Management Systems', '9784567890123', 'Cambridge Press', '3rd', 4800.00, 390),
(21, 'Computer Networks Explained', '9785678901234', 'Oxford University Press', '2nd', 5300.00, 410),
(22, 'Artificial Intelligence Basics', '9786789012345', 'MIT Press', '1st', 7000.00, 600),
(23, 'Cybersecurity Fundamentals', '9787890123456', 'Springer', '1st', 6200.00, 430),
(24, 'Machine Learning Essentials', '9788901234567', 'Packt Publishing', '2nd', 7500.00, 580),
(25, 'Software Engineering Principles', '9789012345678', 'Wiley', '3rd', 5400.00, 400),
(26, 'Cloud Computing for Beginners', '9780123456789', 'Addison-Wesley', '1st', 4900.00, 370),
(27, 'Foundations of Computer Science', '9781111111111', 'HarperCollins', '1st', 4700.00, 360),
(28, 'Mobile App Development Guide', '9782222222222', 'Random House', '2nd', 5500.00, 450),
(29, 'Introduction to Artificial Intelligence', '9783333333333', 'Elsevier', '1st', 7200.00, 510),
(30, 'Big Data Analytics', '9784444444444', 'CRC Press', '3rd', 6300.00, 390),
(31, 'Operating Systems Concepts', '9785555555555', 'John Wiley & Sons', '2nd', 5800.00, 420),
(32, 'Blockchain and Cryptocurrencies', '9786666666666', 'Apress', '1st', 6800.00, 500),
(33, 'Internet of Things: A Practical Approach', '9787777777777', 'Morgan Kaufmann', '1st', 6100.00, 440),
(34, 'Introduction to Quantum Computing', '9788888888888', 'Cambridge University Press', '2nd', 7500.00, 560),
(35, 'Fundamentals of Cybersecurity', '9789999999999', 'Sage Publications', '3rd', 5300.00, 390),
(36, 'Game Development for Beginners', '9780000000001', 'Packt Publishing', '1st', 4900.00, 370);

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

DROP TABLE IF EXISTS `issue_books`;
CREATE TABLE IF NOT EXISTS `issue_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `book_id` int NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pages` int NOT NULL,
  `issue_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_id`, `name`, `class`, `branch`, `semester`, `book_id`, `book_name`, `isbn`, `publisher`, `edition`, `price`, `pages`, `issue_date`) VALUES
(3, '4325', 'Cynthia Waituri', '2', 'east', '2nd', 7, 'maths form 1', '234234', 'bahati', '5', 700.00, 1200, '2025-03-05'),
(4, '9000', 'Harry Plastic', '4', 'south', '3rd', 6, 'kiswahili form2', '45678910', 'bahubali', '7', 150.00, 200, '2025-03-05'),
(10, '1212', 'tuna', '4', 'south', '2nd', 9, 'maths form 1', '234234', 'bahati', '2nd', 4.00, 9, '2025-03-27'),
(8, '7875', 'yamil yamal', '1', 'EAST', '2nd', 12, 'Geography-form4', '723097348', 'hennry ibsen', '7', 200.00, 150, '2025-03-27'),
(15, '1245', 'Alice Morgan', '1', 'EAST', '1st', 1, 'Foundations of Computer Science', '9781122334455', 'Pearson', '1st', 4700.00, 340, '2025-04-01'),
(11, '1212', 'tuna', '4', 'south', '2nd', 12, 'Geography-form4', '723097348', 'hennry ibsen', '7', 200.00, 150, '2025-03-27'),
(12, '1212', 'tuna', '4', 'south', '2nd', 5, 'english', '123456789', 'jacob njoki', '4', 200.00, 50, '2025-03-24'),
(17, '3467', 'Charlotte Harris', '3', 'SOUTH', '3rd', 3, 'Modern App Development', '9783344556677', 'O\'Reilly Media', '1st', 6200.00, 520, '2025-04-03'),
(16, '2356', 'Brian Edwards', '2', 'WEST', '2nd', 2, 'Introduction to Data Science', '9782233445566', 'McGraw-Hill', '2nd', 5300.00, 410, '2025-04-02'),
(18, '4578', 'Derek Lewis', '1', 'NORTH', '1st', 4, 'Relational Database Design', '9784455667788', 'Cambridge Press', '3rd', 4900.00, 380, '2025-04-04'),
(20, '6790', 'Franklin Scott', '3', 'WEST', '3rd', 6, 'Basics of Artificial Intelligence', '9786677889900', 'MIT Press', '1st', 7100.00, 590, '2025-04-06'),
(23, '9023', 'Isabella Nelson', '3', 'EAST', '3rd', 9, 'Principles of Software Engineering', '9789900112233', 'Wiley', '3rd', 5500.00, 390, '2025-04-09'),
(24, '0134', 'Jackie Carter', '1', 'WEST', '1st', 10, 'Cloud Computing Overview', '9780011223344', 'Addison-Wesley', '1st', 5000.00, 360, '2025-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `return_books`
--

DROP TABLE IF EXISTS `return_books`;
CREATE TABLE IF NOT EXISTS `return_books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `class` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pages` int NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `return_books`
--

INSERT INTO `return_books` (`id`, `student_id`, `name`, `class`, `branch`, `semester`, `book_name`, `isbn`, `publisher`, `edition`, `price`, `pages`, `issue_date`, `return_date`) VALUES
(1, '5269', 'Joseph ochenje', '3', 'west', '1st', 'english aid', '1275-75-5786', 'jolo fries', '1', 131.00, 21, '2025-03-04', '2025-03-04'),
(2, '4325', 'Cynthia Waituri', '2', 'east', '2nd', 'english aid', '1275-75-5786', 'jolo fries', '1', 131.00, 21, '2025-03-04', '2025-03-05'),
(3, '5000', 'linda', '3', 'south', '2nd', 'physics', '3478394089', 'jack daniel', '7', 230.00, 120, '2025-03-25', '2025-03-25'),
(4, '4325', 'Cynthia Waituri', '2', 'east', '2nd', 'jolo fries', '70771234', 'gatete njoroge', '6', 1000.00, 53, '2025-03-05', '2025-03-27'),
(5, '1234', 'John Doe', '10th Grade', 'EAST', '1st', 'physics', '3478394089', 'jack daniel', '7', 230.00, 120, '2025-03-28', '2025-03-27'),
(6, '1234', 'John Doe', '10th Grade', 'EAST', '1st', 'kiswahili form2', '45678910', 'bahubali', '7', 150.00, 200, '2025-03-15', '2025-03-27'),
(7, '5000', 'linda', '3', 'south', '2nd', 'Geography-form4', '723097348', 'hennry ibsen', '7', 200.00, 150, '2025-03-27', '2025-03-27'),
(8, '7801', 'Grace Hall', '1', 'SOUTH', '1st', 'Cybersecurity Essentials', '9787788990011', 'Springer', '1st', 6300.00, 420, '2025-04-07', '2025-04-09'),
(9, '5689', 'Ella Young', '2', 'EAST', '2nd', 'Understanding Computer Networks', '9785566778899', 'Oxford University Press', '2nd', 5400.00, 400, '2025-04-05', '2025-04-14'),
(10, '8912', 'Henry Adams', '2', 'NORTH', '2nd', 'Introduction to Machine Learning', '9788899001122', 'Packt Publishing', '2nd', 7600.00, 570, '2025-04-08', '2025-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `student_id` char(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(50) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  PRIMARY KEY (`student_id`)
) ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `class`, `branch`, `semester`) VALUES
('1234', 'John Dere', '10th Grade', 'EAST', '1st'),
('4325', 'Cynthia Waituri', '3', 'east', '2nd'),
('5269', 'Joseph ochenje', '2', 'west', '1st'),
('1212', 'tuna', '4', 'south', '2nd'),
('5000', 'linda', '3', 'south', '2nd'),
('3526', 'john dere', '3', 'EAST', '1st'),
('2345', 'Mary Smith', '2', 'WEST', '2nd'),
('3456', 'David Johnson', '3', 'SOUTH', '3rd'),
('4567', 'Sarah Williams', '1', 'NORTH', '1st'),
('5678', 'Daniel Brown', '2', 'EAST', '2nd'),
('6789', 'Patricia Taylor', '3', 'WEST', '3rd'),
('7890', 'James Anderson', '1', 'SOUTH', '1st'),
('8901', 'Linda Martinez', '2', 'NORTH', '2nd'),
('9012', 'Robert Thompson', '3', 'EAST', '3rd'),
('0123', 'Barbara Garcia', '1', 'WEST', '1st'),
('1245', 'Alice Morgan', '1', 'EAST', '1st'),
('2356', 'Brian Edwards', '2', 'WEST', '2nd'),
('3467', 'Charlotte Harris', '3', 'SOUTH', '3rd'),
('4578', 'Derek Lewis', '1', 'NORTH', '1st'),
('5689', 'Ella Young', '2', 'EAST', '2nd'),
('6790', 'Franklin Scott', '3', 'WEST', '3rd'),
('7801', 'Grace Hall', '1', 'SOUTH', '1st'),
('8912', 'Henry Adams', '2', 'NORTH', '2nd'),
('9023', 'Isabella Nelson', '3', 'EAST', '3rd'),
('0134', 'Jackie Carter', '1', 'WEST', '1st');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
