-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 01:56 PM
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
  `task_id` int(11) NOT NULL,
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

INSERT INTO `all_tasks` (`task_id`, `user_id`, `username`, `title`, `description`, `category`, `due_date`, `priority`, `assigned_by`, `assigned_to`, `status`) VALUES
(1, 8, 'me.toru1001', 'CST5 - Code', 'Check Blackboard learn for other details.', 'Coding', '2024-02-25', 'High', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(2, 8, 'me.toru1001', 'Tarong na task hehe', 'Mao ka', 'Work', '2024-02-26', 'Medium', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(5, 6, 'pammi', 'Status Report', 'asdadsczx', 'Home', '2024-02-27', 'Low', 'pammi', 'me.toru1001', 'Completed'),
(7, 6, 'pammi', 'thi task', 'mao nani na task', 'Home', '2024-02-20', 'Medium', 'pammi', 'pammi', 'Past-Due'),
(8, 6, 'pammi', 'Pagkaon nalang', 'HEHE', 'Home', '2024-02-20', 'Low', 'pammi', 'me.toru1001', 'Past-Due'),
(10, 8, 'me.toru1001', 'hello', 'this is', 'Home', '2024-02-27', 'Low', 'me.toru1001', 'pammi', 'Ongoing'),
(11, 8, 'me.toru1001', 'Doing this for you', 'mag maoy :)', 'Others', '2024-02-26', 'Medium', 'me.toru1001', 'pammi', 'Ongoing'),
(12, 6, 'pammi', 'Eat well ikaw!', 'Kain kalang mabuti self hehe', 'Home', '2024-02-26', 'Medium', 'pammi', 'me.toru1001', 'Ongoing'),
(13, 6, 'pammi', 'Help meee', 'nyenye', 'Coding', '2024-02-27', 'Low', 'pammi', 'me.toru1001', 'Ongoing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_tasks`
--
ALTER TABLE `all_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_tasks`
--
ALTER TABLE `all_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
