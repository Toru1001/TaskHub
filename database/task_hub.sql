-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 05:44 PM
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
(1, 8, 'me.toru1001', 'CST5 - Code', 'Check Blackboard learn for other details.', 'Coding', '2024-02-25', 'High', 'me.toru1001', 'me.toru1001', 'Past-Due'),
(2, 8, 'me.toru1001', 'Tarong na task hehe', 'Mao ka', 'Work', '2024-02-26', 'Medium', 'me.toru1001', 'me.toru1001', 'Past-Due'),
(5, 6, 'pammi', 'Status Report', 'asdadsczx', 'Home', '2024-02-27', 'Low', 'pammi', 'me.toru1001', 'Past-Due'),
(7, 6, 'pammi', 'thi task', 'mao nani na task', 'Home', '2024-02-20', 'Medium', 'pammi', 'pammi', 'Past-Due'),
(8, 6, 'pammi', 'Pagkaon nalang', 'HEHE', 'Home', '2024-02-20', 'Low', 'pammi', 'me.toru1001', 'Past-Due'),
(10, 8, 'me.toru1001', 'hello', 'this is', 'Home', '2024-02-27', 'Low', 'me.toru1001', 'pammi', 'Past-Due'),
(11, 8, 'me.toru1001', 'Doing this for you', 'mag maoy :)', 'Others', '2024-03-05', 'Medium', 'me.toru1001', 'pammi', 'Ongoing'),
(12, 6, 'pammi', 'Eat well ikaw!', 'Kain kalang mabuti self hehe', 'Home', '2024-02-26', 'Medium', 'pammi', 'me.toru1001', 'Past-Due'),
(16, 8, 'me.toru1001', 'I need to work', 'Working on it', 'Coding', '2024-03-04', 'Medium', 'me.toru1001', 'me.toru1001', 'Ongoing'),
(17, 8, 'me.toru1001', 'Tasks', 'tasking', 'Coding', '2024-03-04', 'Medium', 'me.toru1001', 'pammi', 'Completed'),
(18, 8, 'me.toru1001', 'tasks', 'asdasdwads', 'Home', '2024-03-07', 'High', 'me.toru1001', 'pammi', 'Ongoing'),
(19, 8, 'me.toru1001', 'himua ni', 'wadsadcaddw', 'Work', '2024-03-07', 'High', 'me.toru1001', 'pammi', 'Ongoing'),
(20, 8, 'me.toru1001', 'hehe', 'asdawdas', 'Work', '2024-03-09', 'Medium', 'me.toru1001', 'me.toru1001', 'Completed'),
(21, 8, 'me.toru1001', 'Taking risks', 'tesdting natin ito', 'Others', '2024-03-20', 'Low', 'me.toru1001', 'me.toru1001', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `id` int(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `img` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `img`) VALUES
(5, 'Anna May', 'Bote', 'annayann123', 'anna@email.com', '$2y$10$N5Dt/DoaQ19XjTBFalgrqOxA17ADmivGo7PbN0mVbslKzkQjHogXq', 'about-nobg.png'),
(6, 'Famira', 'Catalan', 'pammi', 'pai@email.com', 'pammi123', 'c4b11b285c600bb8d667e15e5355825c.jpeg'),
(8, 'Jonniel', 'Mirafuentes', 'me.toru1001', 'jmirafuentes48@gmail.com', 'password', '402054006_2633391690162251_7646562644289389034_n.jpg'),
(9, 'Princess', 'Caballeda', 'prim', 'prim@prim.com', 'prim123', 'download (11).jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_tasks`
--
ALTER TABLE `all_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_tasks`
--
ALTER TABLE `all_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
