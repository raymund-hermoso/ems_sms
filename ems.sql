-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 03:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `course` varchar(200) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `course`, `dept_id`) VALUES
(5, 'Bachelor of Elementary Education', 2),
(6, 'Bachelor of Secondary  Education - Science', 2),
(7, 'Bachelor of Secondary Education- Mathematics', 2),
(8, 'Bachelor of Science in Information Technology', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `department_code` varchar(200) NOT NULL,
  `department_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `department_code`, `department_name`) VALUES
(1, 'CBM', 'College of Business and Management'),
(2, 'CTE', 'College of Teacher Education'),
(3, 'CIT', 'College of Information Technology'),
(4, 'CJC', 'College of Justice and Criminology'),
(5, 'CAF', 'College of Agriculture and Forestry');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department_head`
--

CREATE TABLE `tbl_department_head` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(255) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department_head`
--

INSERT INTO `tbl_department_head` (`id`, `school_id_number`, `department_id`) VALUES
(1, '21-1234', 1),
(2, '21-1235', 2),
(3, '21-1236', 3),
(4, '21-1237', 4),
(5, '21-1238', 5),
(6, '21-1239', 1),
(8, '21-1240', 3),
(9, '21-4576', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `event_desc` varchar(1000) NOT NULL,
  `venue` varchar(200) NOT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `title`, `event_desc`, `venue`, `date_start`, `date_end`, `time_start`, `time_end`, `status`, `user_id`) VALUES
(11, 'Mass', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua', 'Covered Court', '2021-10-09', '2021-10-09', '07:00:00', '10:00:00', 'approved', 45),
(12, 'The Conference', 'Lorem Ipsume', 'Covered Court', '2021-10-09', '2021-10-09', '10:00:00', '12:00:00', 'request', 2),
(13, 'New Protocol in School', 'Lorem Ipsum Dolor sit amet', 'Covered Court', '2021-10-09', '2021-10-09', '10:00:00', '12:00:00', 'approved', 2),
(14, 'New Event 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam qua', 'Covered Court', '2021-10-10', '2021-10-10', '10:00:00', '11:00:00', 'request', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`id`, `school_id_number`) VALUES
(1, '14-0123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `log_type` enum('login','logout') NOT NULL DEFAULT 'logout'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `user_id`, `date`, `log_type`) VALUES
(1, 2, '2021-09-27 23:16:44', 'login'),
(2, 2, '2021-09-27 23:16:44', 'login'),
(19, 37, '2021-09-29 19:45:24', 'login'),
(21, 2, '2021-10-01 19:26:06', 'login'),
(22, 2, '2021-10-01 19:26:36', 'login'),
(25, 45, '2021-10-02 20:52:23', 'login'),
(26, 45, '2021-10-02 20:54:55', 'login'),
(27, 43, '2021-10-02 21:05:14', 'login'),
(28, 45, '2021-10-02 21:06:39', 'login'),
(29, 43, '2021-10-02 21:12:18', 'login'),
(30, 45, '2021-10-06 22:18:14', 'login'),
(31, 45, '2021-10-06 23:08:47', 'login'),
(32, 45, '2021-10-06 23:11:48', 'login'),
(33, 45, '2021-10-07 19:11:09', 'login'),
(34, 45, '2021-10-07 19:12:15', 'login'),
(35, 2, '2021-10-07 19:18:18', 'login'),
(36, 2, '2021-10-07 19:18:41', 'login'),
(37, 45, '2021-10-07 19:20:21', 'login'),
(38, 2, '2021-10-07 19:21:42', 'login'),
(39, 2, '2021-10-07 19:22:01', 'login'),
(40, 2, '2021-10-07 19:22:42', 'login'),
(41, 2, '2021-10-07 19:24:13', 'login'),
(42, 2, '2021-10-07 19:24:29', 'login'),
(43, 2, '2021-10-07 19:26:47', 'login'),
(44, 2, '2021-10-07 19:27:13', 'login'),
(45, 45, '2021-10-07 19:30:48', 'login'),
(46, 45, '2021-10-07 19:34:31', 'login'),
(47, 2, '2021-10-07 19:46:13', 'login'),
(48, 45, '2021-10-07 20:46:37', 'login'),
(49, 45, '2021-10-07 21:06:58', 'login'),
(50, 2, '2021-10-07 22:31:46', 'login'),
(51, 45, '2021-10-09 07:35:22', 'login'),
(52, 2, '2021-10-09 09:42:23', 'login'),
(53, 45, '2021-10-09 09:43:47', 'login'),
(54, 2, '2021-10-09 09:44:49', 'login'),
(55, 45, '2021-10-09 19:37:55', 'login'),
(56, 2, '2021-10-09 19:38:19', 'login'),
(57, 45, '2021-10-09 19:38:38', 'login'),
(58, 45, '2021-10-10 09:05:10', 'login'),
(59, 2, '2021-10-10 15:45:45', 'login'),
(60, 2, '2021-10-10 19:46:18', 'login'),
(61, 47, '2021-10-10 19:54:43', 'login'),
(62, 2, '2021-10-10 19:54:58', 'login'),
(63, 45, '2021-10-10 20:00:29', 'login'),
(64, 2, '2021-10-10 20:13:19', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(200) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `school_id_number`, `course_id`) VALUES
(1, '21-1246', 5),
(2, '12-9637', 7),
(3, '21-1245', 8),
(4, '12-9636', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `id_number`, `firstname`, `middlename`, `lastname`, `email`, `mobile_number`, `role`, `username`, `password`) VALUES
(2, '', 'Harry', 'Doe', 'Lim', 'harry_doe@gmail.com', '09123456789', 'admin', 'admin', '$2y$10$tWpKFzXEbRoT/fd6811ndOHfg7sZAtAQuXEPCYSxwRgBwWnemkH.m'),
(3, '', 'Jane', 'Sy', 'Doe', 'jane_doe@gmail.com', '09789456123', 'admin', 'admin2', '$2y$10$HEF1lGv2J61ypA048pMsEORv.h7ugUziGzmvX9o848y2WrMgG0kFW'),
(36, '21-1246', 'Maria', 'Oza', 'Wa', 'maria@gmail.com', '0938677896', 'student', 'maria', '$2y$10$9jIfxPsBGJZOCex6SH3TMumsfVsZFNkELcUqfDXgxnTEvS2va8d7G'),
(37, '12-9637', 'Maria', 'Oz', 'Ozawa', 'mariaoz@gmail.com', '09123456789', 'student', 'maria1', '$2y$10$o4yXpSgK24UcY4lirh.LVu5tOLlgDxsHMMblrnKqUttTaYvRTNaMy'),
(43, '21-1245', 'Jay', 'Monted', 'Damian', 'jay@gmail.com', '09654852159', 'student', 'jay', '$2y$10$0cLtK8D4ZXj.Gp9tuEDOg.gjF1xnPN4sHYqkNuOIgcFYpDxlrPfqa'),
(45, '21-4576', 'Jay', 'Monted', 'Damian', 'jaya@gmail.com', '09654852159', 'department head', 'jaya', '$2y$10$nON/.Zx10e66ATPa3Woq..J.9wTRDdjA8LHGvYpnD52Hi1IV6gKx6'),
(47, '12-9636', 'Raymund', 'Aloria', 'Hermoso', 'rayhermoso8@mail.com', '09789465124', 'student', 'raymund', '$2y$10$ZTl20bAbNiiPZZndIdZfBOgZuC54fEhFRN88t.2kQpyC3Ga9a2MIi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_course_ibfk_1` (`dept_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department_head`
--
ALTER TABLE `tbl_department_head`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `tbl_events_ibfk_1` (`user_id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_department_head`
--
ALTER TABLE `tbl_department_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_department` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_department_head`
--
ALTER TABLE `tbl_department_head`
  ADD CONSTRAINT `tbl_department_head_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`id`);

--
-- Constraints for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `tbl_event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
