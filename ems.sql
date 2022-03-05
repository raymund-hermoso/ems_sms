-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 03:56 AM
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
(7, 'Bachelor of Secondary Education- Mathematics', 2),
(8, 'Bachelor of Science in Information Technology', 3),
(11, 'Bachelor of Elementary Education', 2),
(12, 'BSBA - CBM', 1),
(13, 'Course 1', 1),
(14, 'Course 2', 7);

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
(5, 'CAF', 'College of Agriculture and Forestry'),
(6, 'All', 'All'),
(7, 'HLA', 'Hello Lab Ath');

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
(10, '22-0001', 7);

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
(37, 'Paro2 G', 'Lorem', 'Covered Court', '2022-02-08', '2022-02-08', '10:00:00', '12:00:00', 'posted', '2022-02-11', '02:02:48', 61, NULL, 5, '1'),
(39, 'Mass', 'LLorem', 'Court', '2022-02-07', '2022-02-07', '10:00:00', '12:00:00', 'posted', NULL, NULL, 61, NULL, 5, '1'),
(40, 'Hekk', 'Lorem', 'Court', '2022-02-08', '2022-02-08', '10:00:00', '10:30:00', 'posted', NULL, NULL, 61, NULL, 5, '1'),
(44, 'Event Requested', 'Lorem', 'Anywhere', '2022-02-10', '2022-02-10', '10:00:00', '10:30:00', 'posted', '2022-02-09', '04:09:38', 61, 6, 5, '2'),
(45, 'Event for CTE', 'Lorem', 'Anywhere', '2022-02-10', '2022-02-10', '10:00:00', '00:00:00', 'posted', '2022-02-09', '04:10:49', 61, 2, 2, '2'),
(46, 'Lorem', 'Lorem', 'Lorem', '2022-02-10', '2022-02-10', '10:00:00', '00:00:00', 'posted', '2022-02-09', '04:13:15', 61, 2, 4, '2'),
(47, 'Lorem2', 'Hello', 'Court', '2022-02-10', '2022-02-10', '10:00:00', '00:00:00', 'posted', '2022-02-09', '04:20:23', 61, 2, 2, '2'),
(50, 'Event from admin', 'Lorem', 'Plaza', '2022-02-18', '2022-02-18', '10:00:00', '12:00:00', 'posted', '2022-02-11', '02:00:56', 2, 6, 5, '2'),
(51, 'My Third Event', 'Lorem', 'Anywhere', '2022-02-12', '2022-02-12', '10:00:00', '12:00:00', 'posted', '2022-02-11', '02:30:10', 2, 2, 2, '2'),
(52, 'Event for CBM', 'Lorem', 'Plaza', '2022-02-14', '2022-02-14', '12:00:00', '15:00:00', 'approved', '2022-02-11', '02:31:36', 2, 1, 5, '2'),
(53, 'Event for CBM for faculty', 'Lorem', 'Everywhere', '2022-02-15', '2022-02-15', '10:00:00', '12:00:00', 'request', '2022-02-11', '03:35:28', 2, 1, 4, '2'),
(54, 'Paro2 G II', 'Lorem', 'Plaza', '2022-02-15', '2022-02-15', '10:00:00', '12:00:00', 'request', '2022-02-11', '04:05:02', 2, 2, 4, '2'),
(56, 'My event for this month', 'Hello', 'Everywhere', '2022-02-16', '2022-02-16', '10:10:00', '12:00:00', 'approved', '0000-00-00', '00:00:00', 61, 1, 5, '2'),
(57, 'Allan Event', 'Lorem', 'An', '2022-03-07', '2022-03-07', '10:00:00', '12:00:00', 'posted', NULL, NULL, 71, NULL, 5, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(200) NOT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`id`, `school_id_number`, `dept_id`) VALUES
(5, '21-1240', 4),
(6, '21-9876', 2),
(7, '21-7896', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jo`
--

CREATE TABLE `tbl_jo` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jo`
--

INSERT INTO `tbl_jo` (`id`, `school_id_number`) VALUES
(1, '21-8484');

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
(145, 61, '2022-02-05 21:28:33', 'login'),
(146, 2, '2022-02-06 18:03:09', 'login'),
(147, 2, '2022-02-06 18:16:19', 'login'),
(148, 61, '2022-02-06 18:31:03', 'login'),
(149, 2, '2022-02-06 20:07:53', 'login'),
(150, 61, '2022-02-07 20:05:39', 'login'),
(151, 61, '2022-02-07 20:38:40', 'login'),
(152, 61, '2022-02-07 21:35:15', 'login'),
(153, 61, '2022-02-07 21:36:22', 'login'),
(154, 61, '2022-02-07 21:37:03', 'login'),
(155, 61, '2022-02-07 21:38:12', 'login'),
(156, 2, '2022-02-07 21:39:04', 'login'),
(157, 61, '2022-02-07 21:42:03', 'login'),
(158, 61, '2022-02-07 21:43:05', 'login'),
(159, 61, '2022-02-07 21:43:28', 'login'),
(160, 49, '2022-02-07 21:56:00', 'login'),
(161, 61, '2022-02-07 21:56:19', 'login'),
(162, 2, '2022-02-08 07:57:55', 'login'),
(163, 61, '2022-02-08 08:09:34', 'login'),
(164, 63, '2022-02-08 08:29:53', 'login'),
(165, 61, '2022-02-08 08:30:14', 'login'),
(166, 2, '2022-02-08 09:22:40', 'login'),
(168, 61, '2022-02-08 09:24:14', 'login'),
(169, 2, '2022-02-08 10:06:52', 'login'),
(170, 61, '2022-02-08 11:43:18', 'login'),
(171, 65, '2022-02-09 10:24:39', 'login'),
(172, 61, '2022-02-09 10:24:51', 'login'),
(173, 61, '2022-02-09 12:19:28', 'login'),
(174, 61, '2022-02-10 08:28:06', 'login'),
(175, 61, '2022-02-11 09:02:05', 'login'),
(176, 2, '2022-02-11 09:02:27', 'login'),
(177, 67, '2022-02-11 12:31:09', 'login'),
(178, 61, '2022-02-11 12:33:51', 'login'),
(179, 70, '2022-02-12 18:08:16', 'login'),
(180, 2, '2022-02-13 15:17:19', 'login'),
(181, 2, '2022-02-14 09:42:19', 'login'),
(182, 61, '2022-02-14 10:35:39', 'login'),
(183, 2, '2022-02-14 10:39:39', 'login'),
(184, 2, '2022-02-16 09:00:01', 'login'),
(185, 2, '2022-02-16 09:15:21', 'login'),
(186, 2, '2022-02-16 09:18:05', 'login'),
(187, 2, '2022-02-16 09:21:03', 'login'),
(188, 2, '2022-02-16 09:30:23', 'login'),
(189, 2, '2022-02-16 09:42:38', 'login'),
(190, 61, '2022-02-16 09:49:00', 'login'),
(191, 61, '2022-02-16 10:19:21', 'login'),
(192, 61, '2022-02-16 10:49:48', 'login'),
(193, 61, '2022-02-16 11:27:36', 'login'),
(194, 2, '2022-02-23 09:04:28', 'login'),
(195, 2, '2022-02-23 10:40:26', 'login'),
(196, 2, '2022-02-23 11:12:36', 'login'),
(197, 2, '2022-02-23 11:43:08', 'login'),
(198, 2, '2022-02-27 09:52:41', 'login'),
(199, 2, '2022-02-27 18:42:56', 'login'),
(200, 2, '2022-02-27 19:14:41', 'login'),
(201, 2, '2022-02-27 19:45:26', 'login'),
(202, 2, '2022-02-28 17:55:42', 'login'),
(203, 2, '2022-03-03 16:58:30', 'login'),
(204, 2, '2022-03-04 09:06:14', 'login'),
(205, 71, '2022-03-04 09:08:49', 'login'),
(206, 61, '2022-03-05 07:41:40', 'login'),
(207, 61, '2022-03-05 08:12:17', 'login'),
(208, 61, '2022-03-05 08:42:30', 'login'),
(209, 61, '2022-03-05 09:13:26', 'login'),
(210, 61, '2022-03-05 10:09:49', 'login');

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
(5, 'all'),
(6, 'job order');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms_recipient`
--

CREATE TABLE `tbl_sms_recipient` (
  `id` int(11) NOT NULL,
  `school_id_number` varchar(50) NOT NULL,
  `event_id` int(50) NOT NULL,
  `sent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sms_recipient`
--

INSERT INTO `tbl_sms_recipient` (`id`, `school_id_number`, `event_id`, `sent`) VALUES
(2, '12-9636', 45, 1),
(4, '21-9587', 45, 1);

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
(2, '12-9637', 7),
(3, '21-1245', 8),
(4, '12-9636', 7),
(5, '21-9587', 7),
(6, '21-6589', 12);

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
(48, '21-9587', 'Raymund', 'Aloria', 'Hermoso', 'rayhermoso8@mail.com', '09386997571', 'ray', '$2y$10$fm74qp.K4pEgcvFpHOr4ouwK/qI8WxoSbevXdDqMZ/4SHr0Kpuyma', 2, 5),
(49, '21-1236', 'Stephannys', 'Demonteverdes', 'Bautista', 'steph@gmail.com', '09456789321', 'step', '$2y$10$ztNbKS0g8WGkVIzaT7tM0epsMIX5Uhgnq5kijr6NabEZt9UgIw1bq', 3, 5),
(60, '12-9636', 'Amed', 'Doll', 'Debuyan', 'amed@gmail.com', '09386997571', 'amed', '$2y$10$mZTqH2DWivURRgIR6jYooOYi/lEavBlRF0FlJX1sCFw0ZXeQNn4v.', 2, 5),
(61, '21-1235', 'Ronald', 'Alonzo', 'Pascual', 'ronald@gmail.com', '09386997571', 'ronald', '$2y$10$0dhi49Hso6HTVgAHlXrbsuH471dT/rtp88hs1vRj4uuaY3M/7nqem', 3, 5),
(62, '12-9637', 'Jay', 'Ar', 'Siaboc', 'jay@gmail.com', '09987654321', 'jay', '$2y$10$1V0HNhO4jx4V9YfxQ2n/N.jIGJmmRf3/N/TxR8YkN18wh6ZCLei6a', 2, 5),
(63, '21-9876', 'Romeo', 'Marry', 'Juliet', 'romeo@gmail.com', '09456789123', 'romeo', '$2y$10$yRuaXVU2Q8l3yPLglIvqd.A6I9MOE7ex7SSt1vAbma0G789Pa8sPm', 4, 5),
(65, '21-1240', 'Allan', 'Alonzo', 'Umay', 'allan@gmail.com', '09789456321', 'allan', '$2y$10$OGhzUibGFedmcAJxeI3xBuJ916mtnIgBp.WQl1VpxcbogYbWUeqq.', 4, 5),
(66, '21-1245', 'Mia', 'Layla', 'Alucard', 'mia@gmail.com', '09854796321', 'mia', '$2y$10$Qh/zDKAFp2BspMcVBHxcse5p1hC0Aa3bju1Ws8.k4WqiP9GRfGm3S', 2, 5),
(67, '21-6589', 'Alex', 'Sanchez', 'Gamboa', 'alex.g@gmail.com', '09875421369', 'alex', '$2y$10$XOOR/fB.REjQ8UaZlWWX5.ZqnasgCdn4Z2Fgzo8tHwqP57GNeouFm', 2, 5),
(68, '21-7896', 'Thamuz', 'Lorde', 'Ama', 'muz@gmail.com', '09789456874', 'muz', '$2y$10$sAZT6trxqWUSTYaxYKOvOOUBaKBbFuiheOhYqrka5MFppdjIINQam', 4, 5),
(70, '21-8484', 'mark', 'roem', 'villar', 'mark@gmail.com', '09789456123', 'mark', '$2y$10$WuGZFoIQq7HPlMaEXgRsKuXHhbubC7MLddyC8888y8yhmmzDZ4OQ.', 6, 5),
(71, '22-0001', 'Allan', 'Marcos', 'Leni', 'marcos@gmail.com', '09789456321', 'marcos', '$2y$10$5DUPOu5k8owZRTHfkBxq1.fnZ290Fy7xtoL4cJmBj1t6AqPRl9HNu', 3, 5);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_faculty_ibfk_1` (`dept_id`);

--
-- Indexes for table `tbl_jo`
--
ALTER TABLE `tbl_jo`
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
  ADD KEY `tbl_sms_recipient_ibfk_1` (`event_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_department_head`
--
ALTER TABLE `tbl_department_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jo`
--
ALTER TABLE `tbl_jo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sms_recipient`
--
ALTER TABLE `tbl_sms_recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
-- Constraints for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD CONSTRAINT `tbl_faculty_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `tbl_department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sms_recipient`
--
ALTER TABLE `tbl_sms_recipient`
  ADD CONSTRAINT `tbl_sms_recipient_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `tbl_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
