-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 04:50 PM
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
  `date_posted` date DEFAULT NULL,
  `time_posted` time DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `title`, `event_desc`, `venue`, `date_start`, `date_end`, `time_start`, `time_end`, `status`, `date_posted`, `time_posted`, `user_id`) VALUES
(12, 'The Conference', 'Lorem Ipsume', 'Covered Court', '2021-10-09', '2021-10-09', '10:00:00', '12:00:00', 'request', NULL, NULL, 2),
(13, 'New Protocol in School', 'Lorem Ipsum Dolor sit amet', 'Covered Court', '2021-10-09', '2021-10-09', '10:00:00', '12:00:00', 'approved', NULL, NULL, 2);

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
(21, 2, '2021-10-01 19:26:06', 'login'),
(22, 2, '2021-10-01 19:26:36', 'login'),
(35, 2, '2021-10-07 19:18:18', 'login'),
(36, 2, '2021-10-07 19:18:41', 'login'),
(38, 2, '2021-10-07 19:21:42', 'login'),
(39, 2, '2021-10-07 19:22:01', 'login'),
(40, 2, '2021-10-07 19:22:42', 'login'),
(41, 2, '2021-10-07 19:24:13', 'login'),
(42, 2, '2021-10-07 19:24:29', 'login'),
(43, 2, '2021-10-07 19:26:47', 'login'),
(44, 2, '2021-10-07 19:27:13', 'login'),
(47, 2, '2021-10-07 19:46:13', 'login'),
(50, 2, '2021-10-07 22:31:46', 'login'),
(52, 2, '2021-10-09 09:42:23', 'login'),
(54, 2, '2021-10-09 09:44:49', 'login'),
(56, 2, '2021-10-09 19:38:19', 'login'),
(59, 2, '2021-10-10 15:45:45', 'login'),
(60, 2, '2021-10-10 19:46:18', 'login'),
(62, 2, '2021-10-10 19:54:58', 'login'),
(64, 2, '2021-10-10 20:13:19', 'login'),
(66, 2, '2021-10-11 19:58:25', 'login'),
(69, 2, '2021-10-11 20:33:29', 'login'),
(71, 2, '2021-10-11 20:36:55', 'login'),
(73, 2, '2021-10-11 20:40:04', 'login'),
(75, 2, '2021-10-11 21:19:37', 'login'),
(78, 2, '2021-10-11 22:25:01', 'login'),
(83, 2, '2021-10-11 22:36:15', 'login'),
(88, 2, '2021-10-12 21:14:32', 'login'),
(89, 2, '2021-10-12 21:19:07', 'login'),
(91, 2, '2021-10-12 21:46:04', 'login'),
(92, 2, '2021-10-12 21:46:52', 'login'),
(99, 2, '2021-10-12 22:42:02', 'login'),
(100, 2, '2021-10-12 22:43:07', 'login'),
(101, 2, '2021-10-15 19:55:37', 'login'),
(102, 2, '2021-10-16 17:53:17', 'login'),
(104, 2, '2021-10-16 20:44:54', 'login'),
(106, 2, '2021-10-16 20:57:45', 'login'),
(107, 48, '2021-10-16 21:54:20', 'login'),
(108, 49, '2021-10-16 22:02:02', 'login'),
(109, 2, '2021-10-16 22:18:47', 'login'),
(110, 48, '2021-10-16 22:25:49', 'login'),
(111, 2, '2021-10-16 22:41:47', 'login'),
(112, 2, '2021-10-16 22:42:12', 'login'),
(113, 2, '2021-10-16 22:44:09', 'login'),
(114, 2, '2021-10-16 22:46:12', 'login'),
(115, 2, '2021-10-16 22:49:08', 'login'),
(116, 2, '2021-10-16 22:49:50', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_desc`) VALUES
(1, 'admin'),
(2, 'student'),
(3, 'department head'),
(4, 'faculty');

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
(4, '12-9636', 8),
(5, '21-9587', 7);

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
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `id_number`, `firstname`, `middlename`, `lastname`, `email`, `mobile_number`, `username`, `password`, `role`) VALUES
(2, '', 'Harry', 'Doe', 'Lim', 'harry_doe@gmail.com', '09123456789', 'admin', '$2y$10$tWpKFzXEbRoT/fd6811ndOHfg7sZAtAQuXEPCYSxwRgBwWnemkH.m', 1),
(3, '', 'Jane', 'Sy', 'Doe', 'jane_doe@gmail.com', '09789456123', 'admin2', '$2y$10$HEF1lGv2J61ypA048pMsEORv.h7ugUziGzmvX9o848y2WrMgG0kFW', 1),
(48, '21-9587', 'Raymund', 'Aloria', 'Hermoso', 'rayhermoso8@mail.com', '095687412', 'ray', '$2y$10$fm74qp.K4pEgcvFpHOr4ouwK/qI8WxoSbevXdDqMZ/4SHr0Kpuyma', 2),
(49, '21-1236', 'Stephanny', 'Demonteverde', 'Bautista', 'steph@gmail.com', '09456789321', 'step', '$2y$10$ztNbKS0g8WGkVIzaT7tM0epsMIX5Uhgnq5kijr6NabEZt9UgIw1bq', 3);

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
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
