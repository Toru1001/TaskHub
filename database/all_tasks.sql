-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_tasks`
--

CREATE TABLE `all_tasks` (
  `user_id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `category` varchar(250) NOT NULL,
  `due_date` varchar(250) NOT NULL,
  `priority` varchar(250) NOT NULL,
  `assigned_by` varchar(250) NOT NULL,
  `assigned_to` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `all_tasks`
--

INSERT INTO `all_tasks` (`user_id`, `username`, `title`, `description`, `category`, `due_date`, `priority`, `assigned_by`, `assigned_to`, `status`) VALUES
(8, 'me.toru1001', 'CST5 - Lab Activity', 'Open BBL for more information regarding this task', 'Work', '2024-02-21', 'High', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(8, 'me.toru1001', 'Make coffee', 'Make coffee for midnight.', 'Home', '2024-02-22', 'Medium', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(8, 'me.toru1001', 'Code for a java program', 'JAVA MYSQL GUI', 'Coding', '2024-02-27', 'Medium', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(6, 'pammi', 'Make our Group Activity Report!', 'assdsadssda', 'Others', '2024-02-21', 'High', 'pammi', 'me.toru1001', 'Ongoing'),
(6, 'pammi', 'Status Report', 'asdadsczx', 'Home', '2024-02-27', 'Low', 'pammi', 'me.toru1001', 'Ongoing'),
(6, 'pammi', 'RESEARCH THESIS', '', 'Coding', '2024-02-22', 'Medium', 'pammi', 'me.toru1001', 'Ongoing');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
