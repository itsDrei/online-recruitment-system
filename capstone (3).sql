-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 05:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_perosnal_info`
--

CREATE TABLE `applicant_perosnal_info` (
  `applicant_number` int(11) NOT NULL,
  `firstname` varchar(111) DEFAULT NULL,
  `middlename` varchar(111) DEFAULT NULL,
  `lastname` varchar(111) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(111) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` enum('Male','Female','Rather Not Say') DEFAULT NULL,
  `civil_status` varchar(100) DEFAULT NULL,
  `emails` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_occu` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_occu` varchar(100) DEFAULT NULL,
  `applicant_status` varchar(100) DEFAULT NULL,
  `data_apply` date NOT NULL DEFAULT current_timestamp(),
  `date_status_updated` varchar(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `job_apply` varchar(111) NOT NULL,
  `company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicant_perosnal_info`
--

INSERT INTO `applicant_perosnal_info` (`applicant_number`, `firstname`, `middlename`, `lastname`, `birthdate`, `birthplace`, `age`, `gender`, `civil_status`, `emails`, `contact`, `street`, `barangay`, `city`, `province`, `postal_code`, `father_name`, `father_occu`, `mother_name`, `mother_occu`, `applicant_status`, `data_apply`, `date_status_updated`, `reason`, `job_apply`, `company`) VALUES
(320, 'Juan', 'C', 'Dela Cruz', '1998-03-12', 'Manila', '25', 'Male', 'Single', 'juandelacruz@gmail.com', '09123456890', '123', 'Tondo', 'Manila', 'Ncr', '0000', '', '', '', '', 'Potential Candidate', '2023-06-17', '2023-07-02 10:53:31 AM', '', 'Web Developer', '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `activity` varchar(111) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `user_name`, `activity`, `date`) VALUES
(834, 'System Administrator', 'System Admin Created an Admin Account for <b>Admin </b>', 'June 17, 2023 10:13 AM'),
(835, 'System Administrator', 'System Admin Created a System Administrator Account for <b>System Administrator</b>', 'June 17, 2023 10:14 AM'),
(836, 'System Administrator', 'System Admin Logged in', 'June 27, 2023 01:52 PM'),
(837, 'System Administrator', 'System Admin Logged in', 'July 2, 2023 09:32 AM'),
(838, 'System Administrator', 'System Admin Logged Out', 'July 2, 2023 09:35 AM'),
(839, 'System Administrator', 'System Admin Logged in', 'July 2, 2023 10:39 AM'),
(840, 'System Administrator', 'System Admin Created a job titled <b>Web Developer.</b>', 'July 2, 2023 10:45 AM'),
(841, 'System Administrator', 'System Admin Updated applicant number <b>320</b> status from <b> New</b> to <b> Potential Candidate </b> ', 'July 2, 2023 10:53 AM'),
(842, 'System Administrator', 'System Admin Logged Out', 'July 2, 2023 10:58 AM'),
(843, 'System Administrator', 'System Admin Logged in', 'July 2, 2023 10:58 AM'),
(844, 'System Administrator', 'System Admin Created an Admin Account for <b>Admin </b>', 'July 2, 2023 10:59 AM'),
(845, 'System Administrator', 'System Admin Logged Out', 'July 2, 2023 10:59 AM'),
(846, 'Admin ', 'Admin Logged in', 'July 2, 2023 10:59 AM');

-- --------------------------------------------------------

--
-- Table structure for table `character_reference`
--

CREATE TABLE `character_reference` (
  `charref_id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `ref_firstname` varchar(100) DEFAULT NULL,
  `ref_lastname` varchar(100) DEFAULT NULL,
  `ref_email` varchar(100) DEFAULT NULL,
  `ref_contact` varchar(15) DEFAULT NULL,
  `ref_occupation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `character_reference`
--

INSERT INTO `character_reference` (`charref_id`, `applicant_number`, `ref_firstname`, `ref_lastname`, `ref_email`, `ref_contact`, `ref_occupation`) VALUES
(300, 320, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `create_status`
--

CREATE TABLE `create_status` (
  `id` int(11) NOT NULL,
  `status_` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `create_status`
--

INSERT INTO `create_status` (`id`, `status_`) VALUES
(47, 'Potential Candidate'),
(48, 'Exam'),
(49, 'Initial Interview'),
(50, 'Assessment'),
(51, 'Day-In-The-Field/Road Test'),
(52, 'Final Interview'),
(53, 'Employment Check'),
(54, 'Actual Background Check'),
(55, 'Review and approval of KZ'),
(56, 'Conducts Polygraph Test'),
(57, 'Review and approve Polygraph test result'),
(58, 'Processing of pre-employment requirements'),
(59, 'Review and approves pre-employment requirements'),
(60, 'Conducts AOE Company Orientation'),
(61, 'SIGNS Employment Contract'),
(62, 'Deployment');

-- --------------------------------------------------------

--
-- Table structure for table `cv_file`
--

CREATE TABLE `cv_file` (
  `id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cv_file`
--

INSERT INTO `cv_file` (`id`, `applicant_number`, `name`, `size`) VALUES
(162, 320, 'Applicant Resume.pdf', 63730);

-- --------------------------------------------------------

--
-- Table structure for table `educ_attainment`
--

CREATE TABLE `educ_attainment` (
  `educ_id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `cyear_grad` varchar(100) DEFAULT NULL,
  `S_high` varchar(100) DEFAULT NULL,
  `S_program` varchar(100) DEFAULT NULL,
  `Syear_grad` varchar(100) DEFAULT NULL,
  `J_high` varchar(100) DEFAULT NULL,
  `Jyear_grad` varchar(100) DEFAULT NULL,
  `elem` varchar(100) DEFAULT NULL,
  `Eyear_grad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `educ_attainment`
--

INSERT INTO `educ_attainment` (`educ_id`, `applicant_number`, `college`, `program`, `cyear_grad`, `S_high`, `S_program`, `Syear_grad`, `J_high`, `Jyear_grad`, `elem`, `Eyear_grad`) VALUES
(299, 320, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `first_work_exp`
--

CREATE TABLE `first_work_exp` (
  `fwork_id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `work_date_start` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_add` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `first_work_exp`
--

INSERT INTO `first_work_exp` (`fwork_id`, `applicant_number`, `work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) VALUES
(306, 320, '0000-00-00', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(111) NOT NULL,
  `comp_name` varchar(111) NOT NULL,
  `job_desc` varchar(111) NOT NULL,
  `job_status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`job_id`, `job_title`, `comp_name`, `job_desc`, `job_status`) VALUES
(61, 'Web Developer', 'The Company', '1-2 years experience as web developer', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `registration_sysad`
--

CREATE TABLE `registration_sysad` (
  `sysAd_id` int(11) NOT NULL,
  `firstname` varchar(111) NOT NULL,
  `lastname` varchar(111) NOT NULL,
  `empNum` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `role` enum('System Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration_sysad`
--

INSERT INTO `registration_sysad` (`sysAd_id`, `firstname`, `lastname`, `empNum`, `password`, `role`) VALUES
(12, 'System', 'Administrator', 'Sys_ad2023', '$2y$10$wZVkdQwlahFdSfMDxRGO2u5DMoz8.aOT/XBXBZexNipLXstacyojO', 'System Administrator'),
(14, 'System', 'Administrator', 'sys_ad', '$2y$10$D1oZwHqrakhlmOYVfHAevurYdXqzzaorDDoYc4CmRt4Egz.DJud26', 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `registration_table`
--

CREATE TABLE `registration_table` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(111) NOT NULL,
  `lastname` varchar(111) NOT NULL,
  `empNum` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `role` enum('Administrator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration_table`
--

INSERT INTO `registration_table` (`admin_id`, `firstname`, `lastname`, `empNum`, `password`, `role`) VALUES
(55, 'Admin', '', 'Admin', '$2y$10$gJSQDUP01XiXScuXksh97O/XYivYDRLgm2LoRg/AhTUoDjWmGFZIK', 'Administrator'),
(56, 'Admin', '', 'admin_2023', '$2y$10$8ehrRkK7wLHsnAWzpkJsxeLdMbIvqGl6txVDHetKEjt6KegBeM/Bu', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `second_work_exp`
--

CREATE TABLE `second_work_exp` (
  `swork_id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `work_date_start` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_add` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `second_work_exp`
--

INSERT INTO `second_work_exp` (`swork_id`, `applicant_number`, `work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) VALUES
(306, 320, '0000-00-00', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `third_work_exp`
--

CREATE TABLE `third_work_exp` (
  `twork_id` int(11) NOT NULL,
  `applicant_number` int(11) DEFAULT NULL,
  `work_date_start` date DEFAULT NULL,
  `date_ended` date DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_add` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `third_work_exp`
--

INSERT INTO `third_work_exp` (`twork_id`, `applicant_number`, `work_date_start`, `date_ended`, `position`, `company_name`, `company_add`) VALUES
(306, 320, '0000-00-00', '0000-00-00', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_perosnal_info`
--
ALTER TABLE `applicant_perosnal_info`
  ADD PRIMARY KEY (`applicant_number`);

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_reference`
--
ALTER TABLE `character_reference`
  ADD PRIMARY KEY (`charref_id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- Indexes for table `create_status`
--
ALTER TABLE `create_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv_file`
--
ALTER TABLE `cv_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- Indexes for table `educ_attainment`
--
ALTER TABLE `educ_attainment`
  ADD PRIMARY KEY (`educ_id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- Indexes for table `first_work_exp`
--
ALTER TABLE `first_work_exp`
  ADD PRIMARY KEY (`fwork_id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `registration_sysad`
--
ALTER TABLE `registration_sysad`
  ADD PRIMARY KEY (`sysAd_id`);

--
-- Indexes for table `registration_table`
--
ALTER TABLE `registration_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `second_work_exp`
--
ALTER TABLE `second_work_exp`
  ADD PRIMARY KEY (`swork_id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- Indexes for table `third_work_exp`
--
ALTER TABLE `third_work_exp`
  ADD PRIMARY KEY (`twork_id`),
  ADD KEY `applicant_number` (`applicant_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_perosnal_info`
--
ALTER TABLE `applicant_perosnal_info`
  MODIFY `applicant_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=847;

--
-- AUTO_INCREMENT for table `character_reference`
--
ALTER TABLE `character_reference`
  MODIFY `charref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `create_status`
--
ALTER TABLE `create_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cv_file`
--
ALTER TABLE `cv_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `educ_attainment`
--
ALTER TABLE `educ_attainment`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `first_work_exp`
--
ALTER TABLE `first_work_exp`
  MODIFY `fwork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `registration_sysad`
--
ALTER TABLE `registration_sysad`
  MODIFY `sysAd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registration_table`
--
ALTER TABLE `registration_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `second_work_exp`
--
ALTER TABLE `second_work_exp`
  MODIFY `swork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `third_work_exp`
--
ALTER TABLE `third_work_exp`
  MODIFY `twork_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `character_reference`
--
ALTER TABLE `character_reference`
  ADD CONSTRAINT `character_reference_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);

--
-- Constraints for table `cv_file`
--
ALTER TABLE `cv_file`
  ADD CONSTRAINT `cv_file_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);

--
-- Constraints for table `educ_attainment`
--
ALTER TABLE `educ_attainment`
  ADD CONSTRAINT `educ_attainment_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);

--
-- Constraints for table `first_work_exp`
--
ALTER TABLE `first_work_exp`
  ADD CONSTRAINT `first_work_exp_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);

--
-- Constraints for table `second_work_exp`
--
ALTER TABLE `second_work_exp`
  ADD CONSTRAINT `second_work_exp_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);

--
-- Constraints for table `third_work_exp`
--
ALTER TABLE `third_work_exp`
  ADD CONSTRAINT `third_work_exp_ibfk_1` FOREIGN KEY (`applicant_number`) REFERENCES `applicant_perosnal_info` (`applicant_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
