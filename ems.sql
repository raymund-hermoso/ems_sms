-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 03:31 PM
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
(8, 'Bachelor of Science in Information Technology', 3),
(9, 'Bachelor of Science in Information System', 3),
(10, 'BSIS', 3);

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
  `user_id` int(11) DEFAULT NULL,
  `invited_department` int(11) DEFAULT NULL,
  `invitee` int(11) DEFAULT NULL,
  `event_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `title`, `event_desc`, `venue`, `date_start`, `date_end`, `time_start`, `time_end`, `status`, `date_posted`, `time_posted`, `user_id`, `invited_department`, `invitee`, `event_type`) VALUES
(35, 'The first event', 'Lorem', 'Covered Court', '2022-02-11', '2022-02-11', '10:00:00', '12:00:00', 'posted', '2022-02-05', '02:23:32', 61, 2, 5, '2'),
(36, 'My Fourth Event', 'Lorem', 'Covered Court', '2022-02-14', '2022-02-14', '10:00:00', '12:00:00', 'posted', '2022-02-05', '02:16:42', 61, 1, 1, '2'),
(37, 'Paro2 G', 'Lorem', 'Covered Court', '2022-02-08', '2022-02-08', '10:00:00', '12:00:00', 'posted', NULL, NULL, 61, NULL, 5, '1');

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
(122, 49, '2021-11-14 21:55:12', 'login'),
(123, 49, '2021-11-19 09:13:19', 'login'),
(124, 60, '2021-11-21 17:50:32', 'login'),
(125, 49, '2021-11-21 17:50:43', 'login'),
(126, 2, '2021-11-21 17:58:46', 'login'),
(127, 49, '2021-11-21 18:03:11', 'login'),
(128, 2, '2021-11-21 18:08:52', 'login'),
(129, 49, '2021-11-21 18:09:19', 'login'),
(130, 61, '2021-11-21 18:10:50', 'login'),
(131, 49, '2021-11-21 18:11:04', 'login'),
(132, 2, '2021-12-02 10:04:30', 'login'),
(133, 49, '2021-12-02 10:16:55', 'login'),
(134, 2, '2021-12-02 10:23:34', 'login'),
(135, 49, '2021-12-02 10:24:45', 'login'),
(136, 49, '2021-12-03 10:13:29', 'login'),
(137, 2, '2022-02-03 08:52:40', 'login'),
(138, 2, '2022-02-03 09:39:17', 'login'),
(139, 49, '2022-02-04 08:40:35', 'login'),
(140, 2, '2022-02-05 18:32:17', 'login'),
(141, 61, '2022-02-05 18:46:17', 'login'),
(142, 61, '2022-02-05 19:06:40', 'login'),
(143, 2, '2022-02-05 20:44:07', 'login'),
(144, 62, '2022-02-05 21:27:18', 'login'),
(145, 61, '2022-02-05 21:28:33', 'login');

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
(4, 'faculty'),
(5, 'all');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_recipient`
--

CREATE TABLE `tbl_sms_recipient` (
  `id` int(11) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `event_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `role` int(11) DEFAULT NULL,
  `role_all` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `id_number`, `firstname`, `middlename`, `lastname`, `email`, `mobile_number`, `username`, `password`, `role`, `role_all`) VALUES
(2, '21-0001', 'Harry', 'Doe', 'Lim', 'harry_doe@gmail.com', '09123456789', 'admin', '$2y$10$tWpKFzXEbRoT/fd6811ndOHfg7sZAtAQuXEPCYSxwRgBwWnemkH.m', 1, 5),
(3, '21-0002', 'Jane', 'Sy', 'Doe', 'jane_doe@gmail.com', '09789456123', 'admin2', '$2y$10$HEF1lGv2J61ypA048pMsEORv.h7ugUziGzmvX9o848y2WrMgG0kFW', 1, 5),
(48, '21-9587', 'Raymund', 'Aloria', 'Hermoso', 'rayhermoso8@mail.com', '095687412', 'ray', '$2y$10$fm74qp.K4pEgcvFpHOr4ouwK/qI8WxoSbevXdDqMZ/4SHr0Kpuyma', 2, 5),
(49, '21-1236', 'Stephannys', 'Demonteverdes', 'Bautista', 'steph@gmail.com', '09456789321', 'step', '$2y$10$ztNbKS0g8WGkVIzaT7tM0epsMIX5Uhgnq5kijr6NabEZt9UgIw1bq', 3, 5),
(59, '14-0123', 'Alvin', 'Mahinay', 'Debuyan', 'alvin@gmail.com', '0945789632', 'alvin', '$2y$10$PKMgkPY4Ze2PLFUk7Php4.yk9W6szJB9/kEOxCgmdLVn3yNRmtU5m', 4, 5),
(60, '12-9636', 'Amed', 'Doll', 'Debuyan', 'amed@gmail.com', '09784512963', 'amed', '$2y$10$mZTqH2DWivURRgIR6jYooOYi/lEavBlRF0FlJX1sCFw0ZXeQNn4v.', 2, 5),
(61, '21-1235', 'Ronald', 'Alonzo', 'Pascual', 'ronald@gmail.com', '09386997571', 'ronald', '$2y$10$0dhi49Hso6HTVgAHlXrbsuH471dT/rtp88hs1vRj4uuaY3M/7nqem', 3, 5),
(62, '12-9637', 'Jay', 'Ar', 'Siaboc', 'jay@gmail.com', '09987654321', 'jay', '$2y$10$1V0HNhO4jx4V9YfxQ2n/N.jIGJmmRf3/N/TxR8YkN18wh6ZCLei6a', 2, 5);

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
  ADD KEY `tbl_event_ibfk_1` (`user_id`),
  ADD KEY `tbl_event_ibfk_2` (`invited_department`),
  ADD KEY `tbl_event_ibfk_3` (`invitee`);

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
-- Indexes for table `tbl_sms_recipient`
--
ALTER TABLE `tbl_sms_recipient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_sms_recipient_ibfk_1` (`user_id`),
  ADD KEY `tbl_sms_recipient_ibfk_2` (`event_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sms_recipient`
--
ALTER TABLE `tbl_sms_recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  ADD CONSTRAINT `tbl_event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_event_ibfk_2` FOREIGN KEY (`invited_department`) REFERENCES `tbl_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_event_ibfk_3` FOREIGN KEY (`invitee`) REFERENCES `tbl_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sms_recipient`
--
ALTER TABLE `tbl_sms_recipient`
  ADD CONSTRAINT `tbl_sms_recipient_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sms_recipient_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
