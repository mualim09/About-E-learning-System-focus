-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 12:44 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvsu_elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `numofuser` int(10) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_rooms`
--

INSERT INTO `chat_rooms` (`id`, `name`, `numofuser`, `file`) VALUES
(3, 'aa', 0, ''),
(4, 'bb', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `id` tinyint(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `time_mod` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`id`, `username`, `status`, `time_mod`) VALUES
(23, 'aaaa', 1, 1552205403);

-- --------------------------------------------------------

--
-- Table structure for table `chat_users_rooms`
--

CREATE TABLE `chat_users_rooms` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `mod_time` int(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_post`
--

CREATE TABLE `class_post` (
  `classPost_ID` int(11) UNSIGNED NOT NULL,
  `classTopic_ID` int(11) UNSIGNED DEFAULT NULL,
  `classPost_Name` varchar(85) NOT NULL,
  `classPost_Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `class_ID` int(11) UNSIGNED NOT NULL,
  `class_Code` varchar(85) DEFAULT NULL,
  `class_Name` varchar(85) NOT NULL,
  `class_Description` varchar(255) NOT NULL,
  `class_Color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_room`
--

INSERT INTO `class_room` (`class_ID`, `class_Code`, `class_Name`, `class_Description`, `class_Color`) VALUES
(1, '201900311', 'PL01', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 1),
(2, '201900312', 'PL02', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 2),
(3, '201900313', 'PL03', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 3),
(4, '201900314', 'PL04', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 4),
(5, '201900311', 'PL05', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 5),
(6, '201900312', 'PL06', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 6),
(7, '201900313', 'PL07', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 7),
(8, '201900314', 'PL08', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 8),
(9, '201900314', 'PL09', ' Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.\r\n                            Quis pharetra a pharetra fames blandit. ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `class_student`
--

CREATE TABLE `class_student` (
  `classStudent_ID` int(11) UNSIGNED NOT NULL,
  `student_ID` int(11) UNSIGNED DEFAULT NULL,
  `class_Code` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_student`
--

INSERT INTO `class_student` (`classStudent_ID`, `student_ID`, `class_Code`) VALUES
(1, 1, 'x48z94dsa'),
(2, 2, 'x48z94dsa');

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `classTeacher_ID` int(11) UNSIGNED NOT NULL,
  `teacher_ID` int(11) UNSIGNED DEFAULT NULL,
  `class_Code` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_teacher`
--

INSERT INTO `class_teacher` (`classTeacher_ID`, `teacher_ID`, `class_Code`) VALUES
(1, 1, 'x48z94dsa');

-- --------------------------------------------------------

--
-- Table structure for table `class_topic`
--

CREATE TABLE `class_topic` (
  `classTopic_ID` int(11) UNSIGNED NOT NULL,
  `class_ID` int(11) UNSIGNED DEFAULT NULL,
  `classTopic_Name` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `record_admin_detail`
--

CREATE TABLE `record_admin_detail` (
  `rad_ID` int(11) UNSIGNED NOT NULL,
  `rad_EmpID` varchar(25) DEFAULT NULL,
  `rad_FName` varchar(85) DEFAULT NULL,
  `rad_MName` varchar(85) DEFAULT NULL,
  `rad_LName` varchar(85) DEFAULT NULL,
  `suffix_ID` int(11) UNSIGNED DEFAULT NULL,
  `rad_Sex` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_admin_detail`
--

INSERT INTO `record_admin_detail` (`rad_ID`, `rad_EmpID`, `rad_FName`, `rad_MName`, `rad_LName`, `suffix_ID`, `rad_Sex`) VALUES
(1, '123548', 'teacher', 'teacher', 'teacher', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `record_instructor_detail`
--

CREATE TABLE `record_instructor_detail` (
  `rid_ID` int(11) UNSIGNED NOT NULL,
  `rid_EmpID` varchar(25) DEFAULT NULL,
  `rid_FName` varchar(85) DEFAULT NULL,
  `rid_MName` varchar(85) DEFAULT NULL,
  `rid_LName` varchar(85) DEFAULT NULL,
  `suffix_ID` int(11) UNSIGNED DEFAULT NULL,
  `rid_Sex` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_instructor_detail`
--

INSERT INTO `record_instructor_detail` (`rid_ID`, `rid_EmpID`, `rid_FName`, `rid_MName`, `rid_LName`, `suffix_ID`, `rid_Sex`) VALUES
(1, '30215', 'Instructor 1', 'Instructor 1', 'Instructor 1', NULL, 1),
(3, '30216', 'Instructor 2', 'Instructor 2', 'Instructor 2', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `record_student_details`
--

CREATE TABLE `record_student_details` (
  `rsd_ID` int(11) UNSIGNED NOT NULL,
  `user_ID` int(11) UNSIGNED DEFAULT NULL,
  `rsd_StudNum` varchar(25) NOT NULL,
  `rsd_FName` varchar(85) NOT NULL,
  `rsd_MName` varchar(85) NOT NULL,
  `rsd_LName` varchar(85) NOT NULL,
  `suffix_ID` int(11) UNSIGNED DEFAULT NULL,
  `rsd_Sex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_student_details`
--

INSERT INTO `record_student_details` (`rsd_ID`, `user_ID`, `rsd_StudNum`, `rsd_FName`, `rsd_MName`, `rsd_LName`, `suffix_ID`, `rsd_Sex`) VALUES
(1, 2, '201310656', 'Rhalp Darren', 'Resuena', 'Cabrera', NULL, 1),
(2, 3, '201310657', 'Franzmarc', 'Resuena', 'Cabrera', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_sex`
--

CREATE TABLE `ref_sex` (
  `sex_ID` int(11) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `sex_Name` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_sex`
--

INSERT INTO `ref_sex` (`sex_ID`, `sex_Name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `ref_suffixname`
--

CREATE TABLE `ref_suffixname` (
  `suffix_ID` int(11) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `suffix` varchar(10) DEFAULT NULL COMMENT 'suffix name position on the last name ',
  `suffix_Name` varchar(50) DEFAULT NULL COMMENT 'suffix description'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_suffixname`
--

INSERT INTO `ref_suffixname` (`suffix_ID`, `suffix`, `suffix_Name`) VALUES
(1, 'N/A', 'Not Applicable'),
(2, 'CFRE', 'Certified Fund Raising Executive'),
(3, 'CLU', 'Chartered Life Underwriter'),
(4, 'CPA', 'Certified Public Accountant'),
(5, 'C.S.C.', 'Congregation of Holy Cross'),
(6, 'C.S.J.', 'Sisters of St. Joseph'),
(7, 'D.C.', 'Doctor of Chiropractic'),
(8, 'D.D.', 'Doctor of Divinity'),
(9, 'D.D.S.', 'Doctor of Dental Surgery'),
(10, 'D.M.D.', 'Doctor of Dental Medicine'),
(11, 'D.O.', 'Doctor of Osteopathy'),
(12, 'D.V.M.', 'Doctor of Veterinary Medicine'),
(13, 'Ed.D.', 'Doctor of Education'),
(14, 'Esq.', 'Esquire'),
(15, 'II', 'The Second'),
(16, 'III', 'The Third'),
(17, 'IV', 'The Fourth'),
(18, 'Inc.', 'Incorporated'),
(19, 'J.D.', 'Juris Doctor'),
(20, 'Jr.', 'Junior'),
(21, 'LL.D.', 'Doctor of Laws'),
(22, 'Ltd.', 'Limited'),
(23, 'M.D.', 'Doctor of Medicine'),
(24, 'O.D.', 'Doctor of Optometry'),
(25, 'O.S.B.', 'Order of St Benedict'),
(26, 'P.C.', 'Past Commander, Police Constable, Post Commander'),
(27, 'P.E.', 'Protestant Episcopal'),
(28, 'Ph.D.', 'Doctor of Philosophy'),
(29, 'Ret.', 'Retired'),
(30, 'R.G.S', 'Sisters of Our Lady of Charity of the Good Shepher'),
(31, 'R.N.', 'Registered Nurse'),
(32, 'R.N.C.', 'Registered Nurse Clinician'),
(33, 'S.H.C.J.', 'Society of Holy Child Jesus'),
(34, 'S.J.', 'Society of Jesus'),
(35, 'S.N.J.M.', 'Sisters of Holy Names of Jesus & Mary'),
(36, 'Sr.', 'Senior'),
(37, 'S.S.M.O.', 'Sister of Saint Mary Order'),
(38, 'USA', 'United States Army'),
(39, 'USAF', 'United States Air Force'),
(40, 'USAFR', 'United States Air Force Reserve'),
(41, 'USAR', 'United States Army Reserve'),
(42, 'USCG', 'United States Coast Guard'),
(43, 'USMC', 'United States Marine Corps'),
(44, 'USMCR', 'United States Marine Corps Reserve'),
(45, 'USN', 'United States Navy'),
(46, 'USNR', 'United States Navy Reserve');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `level_ID` tinyint(11) UNSIGNED DEFAULT NULL COMMENT 'user level',
  `user_Name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_Pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_Registered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_ID`, `level_ID`, `user_Name`, `user_Pass`, `user_Email`, `user_Registered`, `user_status`) VALUES
(3, 1, '19874548', 'M8+Cpt+zltZs3QpomFLRjEFCGvI0VGC+jjJzXH32Mtw=', 'email@gmail.com', '2019-02-19 17:21:46', 1),
(4, 3, 'admin', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'email@gmail.com', '2019-02-28 16:37:27', 1),
(6, 2, 'instructor', 'Pds40EmB+V/6xvKy2SFGjkoVLTwzmjfbRI2QGpPmGz0=', 'email@gmail.com', '2019-03-10 18:08:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_ID` tinyint(11) UNSIGNED NOT NULL,
  `level_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_ID`, `level_name`) VALUES
(0, 'unregister'),
(1, 'student'),
(2, 'instructor'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `notif_ID` int(11) UNSIGNED NOT NULL,
  `notif_typeID` int(11) UNSIGNED DEFAULT NULL,
  `notif_topicID` int(11) UNSIGNED DEFAULT NULL,
  `notif_userID` int(11) UNSIGNED DEFAULT NULL,
  `notif_receiverID` int(11) UNSIGNED DEFAULT NULL,
  `notif_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `notif_state` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`notif_ID`, `notif_typeID`, `notif_topicID`, `notif_userID`, `notif_receiverID`, `notif_date`, `notif_state`) VALUES
(3, NULL, NULL, NULL, NULL, '2018-02-23 16:49:20', NULL),
(4, 3, 15, 4, 1, '2018-03-03 15:35:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_state`
--

CREATE TABLE `user_notif_state` (
  `status_ID` int(11) UNSIGNED NOT NULL,
  `status_Desc` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE `user_notif_type` (
  `type_ID` int(11) UNSIGNED NOT NULL,
  `type_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `chat_users_rooms`
--
ALTER TABLE `chat_users_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_post`
--
ALTER TABLE `class_post`
  ADD PRIMARY KEY (`classPost_ID`);

--
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`class_ID`);

--
-- Indexes for table `class_student`
--
ALTER TABLE `class_student`
  ADD PRIMARY KEY (`classStudent_ID`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`classTeacher_ID`);

--
-- Indexes for table `class_topic`
--
ALTER TABLE `class_topic`
  ADD PRIMARY KEY (`classTopic_ID`);

--
-- Indexes for table `record_admin_detail`
--
ALTER TABLE `record_admin_detail`
  ADD PRIMARY KEY (`rad_ID`),
  ADD UNIQUE KEY `rtd_EmpID` (`rad_EmpID`);

--
-- Indexes for table `record_instructor_detail`
--
ALTER TABLE `record_instructor_detail`
  ADD PRIMARY KEY (`rid_ID`),
  ADD UNIQUE KEY `rtd_EmpID` (`rid_EmpID`);

--
-- Indexes for table `record_student_details`
--
ALTER TABLE `record_student_details`
  ADD PRIMARY KEY (`rsd_ID`),
  ADD UNIQUE KEY `rsd_LRN` (`rsd_StudNum`),
  ADD KEY `suffix_ID` (`suffix_ID`);

--
-- Indexes for table `ref_sex`
--
ALTER TABLE `ref_sex`
  ADD PRIMARY KEY (`sex_ID`);

--
-- Indexes for table `ref_suffixname`
--
ALTER TABLE `ref_suffixname`
  ADD PRIMARY KEY (`suffix_ID`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_login_key` (`user_Name`),
  ADD KEY `user_email` (`user_Email`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_ID`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`notif_ID`),
  ADD KEY `notif_topicID` (`notif_topicID`),
  ADD KEY `notif_userID` (`notif_userID`),
  ADD KEY `notif_receiverID` (`notif_receiverID`);

--
-- Indexes for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `chat_users_rooms`
--
ALTER TABLE `chat_users_rooms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1472;
--
-- AUTO_INCREMENT for table `class_post`
--
ALTER TABLE `class_post`
  MODIFY `classPost_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `class_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `class_student`
--
ALTER TABLE `class_student`
  MODIFY `classStudent_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `classTeacher_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class_topic`
--
ALTER TABLE `class_topic`
  MODIFY `classTopic_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `record_admin_detail`
--
ALTER TABLE `record_admin_detail`
  MODIFY `rad_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `record_instructor_detail`
--
ALTER TABLE `record_instructor_detail`
  MODIFY `rid_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `record_student_details`
--
ALTER TABLE `record_student_details`
  MODIFY `rsd_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_suffixname`
--
ALTER TABLE `ref_suffixname`
  MODIFY `suffix_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` tinyint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `notif_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  MODIFY `status_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  MODIFY `type_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
