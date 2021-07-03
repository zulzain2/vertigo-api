-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dev_vertigo
CREATE DATABASE IF NOT EXISTS `dev_vertigo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dev_vertigo`;

-- Dumping structure for table dev_vertigo.document_logs
CREATE TABLE IF NOT EXISTS `document_logs` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` text COLLATE utf8mb4_unicode_ci,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_document` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci,
  `id_notification` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.document_logs: ~33 rows (approximately)
/*!40000 ALTER TABLE `document_logs` DISABLE KEYS */;
INSERT INTO `document_logs` (`id`, `user_type`, `id_user`, `start_at`, `end_at`, `document_type`, `id_document`, `remark`, `id_notification`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('112f4f2fc8014b00ad087f5199a7f0ba', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:04', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Start Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:04', '2020-07-20 13:15:04'),
	('12d39fe332a04402bcf6de41a8acdbf0', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:54:45', NULL, 'SAS', '1fa2fb3cda3f460b9a3b2df7a1f59380', 'Acknowledge Task in Staff Assignment System', '', 'Acknowledge', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:54:45', '2020-07-19 12:54:45'),
	('1445cc94b12b449dae398d2bc7cd97bd', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:01', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Start Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:01', '2020-07-20 13:15:01'),
	('18695786be8d44979760d9d65ff86f00', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 08:42:02', NULL, 'SAS', 'd3b260666cca46a7ab52bbf1e2fb30c0', 'Start Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 08:42:02', '2020-07-20 08:42:02'),
	('1dc87d81236c4521adb8b9b101c2efae', 'Superadmin', '19e367b357df4fb984384b8150ecd710', '2020-07-19 09:30:23', NULL, 'TMS', 'ae83ad0741f64bbca499e96333e3d6ed', 'Submit New Submission in Tender Management System', '', 'Inquiry Created', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-19 09:30:23', '2020-07-19 09:30:23'),
	('2ab4c1c0aabd40b08e4ab307bcb03767', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:43:30', NULL, 'SAS', '1fa2fb3cda3f460b9a3b2df7a1f59380', 'Finish Task in Staff Assignment System', '', 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:43:30', '2020-07-19 18:43:30'),
	('2bcfe1d79c9e46b6a19db3b1acc6f8c5', 'Manager', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:44:14', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Approve Task for MAS with Job Number : 2006754 in Staff Assignment System', '', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:44:14', '2020-07-19 12:44:14'),
	('2fd760862df34b8ea47ef44d2fe62b1f', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:36:31', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Finish Task in Staff Assignment System', '', 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:36:31', '2020-07-20 13:36:31'),
	('3826597288df47c590ffe60852e37307', 'Director', '3ce67ea225ea4dd489ab4ac4f0999d72', '2020-07-16 19:27:21', NULL, 'SAS', 'cd71aeb6ff934043a799f515cd00d817', 'Create New Task for kamal in Staff Assignment System', '', 'Created', '3ce67ea225ea4dd489ab4ac4f0999d72', '3ce67ea225ea4dd489ab4ac4f0999d72', '2020-07-16 19:27:21', '2020-07-16 19:27:21'),
	('3ae67aa32f934d70b9f7238c12cb143a', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:31:40', NULL, 'SAS', 'd3b260666cca46a7ab52bbf1e2fb30c0', 'Acknowledge Task in Staff Assignment System', '', 'Acknowledge', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:31:40', '2020-07-19 18:31:40'),
	('4945f597b03f4ba5bc040dd8b1aef717', 'Director', '19e367b357df4fb984384b8150ecd710', '2020-07-16 19:24:29', NULL, 'User', '3ce67ea225ea4dd489ab4ac4f0999d72', 'New staff has been registered into system', '', 'Registered In System', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-16 19:24:29', '2020-07-16 19:24:29'),
	('503d3547188344268fe3492fac51b7d6', 'Superadmin', '19e367b357df4fb984384b8150ecd710', '2020-07-19 09:28:49', NULL, 'TMS', '08213957bd384107a380e9caf8f71ef9', 'Submit New Submission in Tender Management System', '', 'Inquiry Created', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-19 09:28:49', '2020-07-19 09:28:49'),
	('53f10a34bb0445a9ad70fa44012a2665', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:54:03', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Finish Task in Staff Assignment System', '', 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:54:03', '2020-07-19 18:54:03'),
	('6a21268d67eb4a9a885c917956d67b54', 'Manager', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:54:30', NULL, 'SAS', '1fa2fb3cda3f460b9a3b2df7a1f59380', 'Approve Task for MAS with Job Number : 202029383i3 in Staff Assignment System', '', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:54:30', '2020-07-19 12:54:30'),
	('7130abd7f4bc4206b2699c26e5b008d0', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:45:39', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Start Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:45:39', '2020-07-19 18:45:39'),
	('72b6a5598ec44c89ac80a259baa65ccb', 'Manager', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:31:09', NULL, 'SAS', 'd3b260666cca46a7ab52bbf1e2fb30c0', 'Approve Task for MAS with Job Number : 123456 in Staff Assignment System', '', 'Approved', 'ae0ed70b200e478b83aebc44f248c5cb', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:31:09', '2020-07-19 18:31:09'),
	('aca9a06af5994dc39e38f2b072b08ef6', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:53:44', NULL, 'SAS', '1fa2fb3cda3f460b9a3b2df7a1f59380', 'Create New Task for MAS in Staff Assignment System', '', 'Created', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:53:44', '2020-07-19 12:53:44'),
	('acb4a5b5ba55447e9cd9721c41e87aea', 'Manager', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:30:07', NULL, 'SAS', 'd3b260666cca46a7ab52bbf1e2fb30c0', 'Create New Task for MAS in Staff Assignment System', '', 'Created', 'ae0ed70b200e478b83aebc44f248c5cb', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:30:07', '2020-07-19 18:30:07'),
	('acc327cc84ac4ce087745851bf8d557a', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:51:50', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Acknowledge Task in Staff Assignment System', '', 'Acknowledge', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:51:50', '2020-07-19 12:51:50'),
	('aea9648e34eb4af8bce939b8d16145a8', 'Manager', '19e367b357df4fb984384b8150ecd710', '2020-07-19 17:41:18', NULL, 'User', 'ae0ed70b200e478b83aebc44f248c5cb', 'New staff has been registered into system', '', 'Registered In System', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-19 17:41:18', '2020-07-19 17:41:18'),
	('b1bbd6c842be4a57b28720a8ea626f6c', 'Manager', '19e367b357df4fb984384b8150ecd710', '2020-07-19 11:47:07', NULL, 'User', 'c154432c2c064d8383371643cf8f9ccb', 'New staff has been registered into system', '', 'Registered In System', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-19 11:47:07', '2020-07-19 11:47:07'),
	('b4bd06453f314a66a8ef3565ea402be6', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:07', NULL, 'SAS', 'd3b260666cca46a7ab52bbf1e2fb30c0', 'Finish Task in Staff Assignment System', '', 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:15:07', '2020-07-20 13:15:07'),
	('b741b6c1d6654d7599248cc6735c9fd1', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:52:16', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Set a new End Date for Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:52:16', '2020-07-19 18:52:16'),
	('c2f3ec8ceec442c9abfe00c964138640', 'Director', '892b3cc0b40443dc8a0ccd516854cccf', '2020-07-19 12:43:39', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Create New Task for MAS in Staff Assignment System', '', 'Created', '892b3cc0b40443dc8a0ccd516854cccf', '892b3cc0b40443dc8a0ccd516854cccf', '2020-07-19 12:43:39', '2020-07-19 12:43:39'),
	('c994071f750f4d248f0f8175d97db05c', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:43:44', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Acknowledge Task in Staff Assignment System', '', 'Acknowledge', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:43:44', '2020-07-19 18:43:44'),
	('cb35ca24f0274d3fa7a4a7e8459a77fc', 'Manager', '20652c46e2ce404996b8fa662b3cef4d', '2020-07-16 19:41:41', NULL, 'SAS', 'cd71aeb6ff934043a799f515cd00d817', 'Approve Task for kamal with Job Number : 2006203 in Staff Assignment System', '', 'Approved', '20652c46e2ce404996b8fa662b3cef4d', '20652c46e2ce404996b8fa662b3cef4d', '2020-07-16 19:41:41', '2020-07-16 19:41:41'),
	('cc60c0bc82874928bc86f61fbbdf850b', 'Technicians / Clerk / Office support', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:36:27', NULL, 'User', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'New staff has been registered into system', '', 'Registered In System', 'c154432c2c064d8383371643cf8f9ccb', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:36:27', '2020-07-19 12:36:27'),
	('e08452dade3b49dd838bbbb1892d420e', 'Director', '19e367b357df4fb984384b8150ecd710', '2020-07-19 11:45:58', NULL, 'User', '892b3cc0b40443dc8a0ccd516854cccf', 'New staff has been registered into system', '', 'Registered In System', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-19 11:45:58', '2020-07-19 11:45:58'),
	('e09890e7037147bd8c19c14eebe986e2', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:36:34', NULL, 'SAS', '4e1936ff9cbd469386c569d05607c798', 'Finish Task in Staff Assignment System', '', 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-20 13:36:34', '2020-07-20 13:36:34'),
	('e502bc994527401eb34c2109353ece8d', 'Manager', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 18:43:23', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Approve Task for MAS with Job Number : 1234 in Staff Assignment System', '', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 18:43:23', '2020-07-19 18:43:23'),
	('ecd3c9479c664d86a955dc1a1d1144a2', 'Contract staff', '19e367b357df4fb984384b8150ecd710', '2020-07-16 19:19:42', NULL, 'User', '4104d278cc1a4ccd8cb82fbe1e5ee2ea', 'New staff has been registered into system', '', 'Registered In System', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-07-16 19:19:42', '2020-07-16 19:19:42'),
	('fab065f83a84491686389d6148953b63', 'Manager', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:43:07', NULL, 'SAS', '27f76d4e5ecd43c682a612d2e2952349', 'Create New Task for MAS in Staff Assignment System', '', 'Created', 'ae0ed70b200e478b83aebc44f248c5cb', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:43:07', '2020-07-19 18:43:07'),
	('fe27620d737d4f17b6c443ab7e68d349', 'Technicians / Clerk / Office support', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 17:37:27', NULL, 'SAS', '1fa2fb3cda3f460b9a3b2df7a1f59380', 'Start Task in Staff Assignment System', '', 'Task Start', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 17:37:27', '2020-07-19 17:37:27');
/*!40000 ALTER TABLE `document_logs` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.ebs
CREATE TABLE IF NOT EXISTS `ebs` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `tag_number` text COLLATE utf8mb4_unicode_ci,
  `job_number` text COLLATE utf8mb4_unicode_ci,
  `job_title` text COLLATE utf8mb4_unicode_ci,
  `start_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_justification` text COLLATE utf8mb4_unicode_ci,
  `booking_progress` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_justification` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_justification` text COLLATE utf8mb4_unicode_ci,
  `img_update` text COLLATE utf8mb4_unicode_ci,
  `img_path_update` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.ebs: ~0 rows (approximately)
/*!40000 ALTER TABLE `ebs` DISABLE KEYS */;
/*!40000 ALTER TABLE `ebs` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.ebs_equipment_uses
CREATE TABLE IF NOT EXISTS `ebs_equipment_uses` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_equipment` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ebs` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.ebs_equipment_uses: ~0 rows (approximately)
/*!40000 ALTER TABLE `ebs_equipment_uses` DISABLE KEYS */;
/*!40000 ALTER TABLE `ebs_equipment_uses` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.ebs_staff_uses
CREATE TABLE IF NOT EXISTS `ebs_staff_uses` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_ebs` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.ebs_staff_uses: ~0 rows (approximately)
/*!40000 ALTER TABLE `ebs_staff_uses` DISABLE KEYS */;
/*!40000 ALTER TABLE `ebs_staff_uses` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.equipments
CREATE TABLE IF NOT EXISTS `equipments` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `tag_number` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `id_equip_category` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `availability` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.equipments: ~7 rows (approximately)
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` (`id`, `name`, `img`, `img_path`, `tag_number`, `description`, `id_equip_category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `availability`) VALUES
	('28a5a220d5554a8cbfb29884c0052e20', 'Alienware Pro Gaming Tower', '28a5a220d5554a8cbfb29884c0052e20_1586306126.jpg', '/storage/equipments/28a5a220d5554a8cbfb29884c0052e20_1586306126.jpg', '451276', 'Alienware Pro Gaming Tower X for testing', '612467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:35:26', '2020-07-14 18:15:24', 'unavailable'),
	('41eb5b7cb2a54dc6ad60b4d08d83cc88', 'Surface Book', '41eb5b7cb2a54dc6ad60b4d08d83cc88_1586305979.png', '/storage/equipments/41eb5b7cb2a54dc6ad60b4d08d83cc88_1586305979.png', '845126', 'Surface Book for testing', '875467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:32:59', '2020-07-16 07:47:24', 'unavailable'),
	('79a5df5fb12848eaa888e0d984ad1b01', 'Ipad Pro', '79a5df5fb12848eaa888e0d984ad1b01_1586305701.png', '/storage/equipments/79a5df5fb12848eaa888e0d984ad1b01_1586305701.png', '1627357', 'Ipad Pro for testing', '2541a87557df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:28:21', '2020-07-16 11:15:34', 'available'),
	('7a7a353181ce4dfcb11a29ad530ed93f', 'Macbook Pro', '7a7a353181ce4dfcb11a29ad530ed93f_1586305804.jfif', '/storage/equipments/7a7a353181ce4dfcb11a29ad530ed93f_1586305804.jfif', '012415', 'Macbook Pro for testing', '875467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:30:04', '2020-07-15 13:36:18', 'available'),
	('7f749cceee154ac09e2f3e8b6fb0127d', 'Mac Pro', '7f749cceee154ac09e2f3e8b6fb0127d_1586305871.jpg', '/storage/equipments/7f749cceee154ac09e2f3e8b6fb0127d_1586305871.jpg', '854172', 'Mac Pro for testing', '612467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:31:11', '2020-07-16 15:30:22', 'available'),
	('c7d41f87ef654111a575cf1badc3554a', 'Northtech Desktop', 'NnTKm8Z7NUUDVq9M1B2gvCFOPCIYSXQkircr7ma5.png', '/storage/equipments/NnTKm8Z7NUUDVq9M1B2gvCFOPCIYSXQkircr7ma5.png', '564411', 'Custom build desktop', '612467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-06-24 22:23:46', '2020-06-25 21:40:28', 'available'),
	('ddd243429dfb40929f09e9c16a449489', 'Windows Laptop', 'VfqBRDJvz4ADaWH9HjUXDSvTCgYGJqt0ilwOVKdK.png', '/storage/app/public/equipments/ddd243429dfb40929f09e9c16a449489_1593621985.jpg', '111223', 'Windows Laptop 15.6 inch', '875467b357df4fb984384b8150ecd710', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-02 00:46:25', '2020-07-16 07:53:31', 'available');
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.equipment_categories
CREATE TABLE IF NOT EXISTS `equipment_categories` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.equipment_categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `equipment_categories` DISABLE KEYS */;
INSERT INTO `equipment_categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('2541a87557df4fb984384b8150ecd710', 'Tablet', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:26:52', '2020-04-08 08:26:54'),
	('612467b357df4fb984384b8150ecd710', 'Desktop', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:27:42', '2020-04-08 08:27:43'),
	('875467b357df4fb984384b8150ecd710', 'Laptop', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:27:18', '2020-04-08 08:27:19');
/*!40000 ALTER TABLE `equipment_categories` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.inquiry_types
CREATE TABLE IF NOT EXISTS `inquiry_types` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.inquiry_types: ~3 rows (approximately)
/*!40000 ALTER TABLE `inquiry_types` DISABLE KEYS */;
INSERT INTO `inquiry_types` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('123f35b51b77452da8abb4703a60b845', 'Service (Service Manager)', '1', NULL, NULL, '2020-03-25 09:44:32', '2020-03-25 09:44:34'),
	('6a5f35b51b77452da8abb4703a60b87b', 'Trading (Trading Manager)', '1', NULL, NULL, '2020-03-25 09:44:35', '2020-03-25 09:44:36'),
	('777f35b51b77452da8abb4703a60b111', 'Rental (Rental Manager)', '1', NULL, NULL, '2020-03-25 09:44:37', '2020-03-25 09:44:38');
/*!40000 ALTER TABLE `inquiry_types` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.maintenance_tasks
CREATE TABLE IF NOT EXISTS `maintenance_tasks` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.maintenance_tasks: ~3 rows (approximately)
/*!40000 ALTER TABLE `maintenance_tasks` DISABLE KEYS */;
INSERT INTO `maintenance_tasks` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('123cc0b8c043437486727264e4548762', 'Calibration', '1', NULL, NULL, NULL, NULL),
	('524180b8c043437486727264e4665127', 'Repair', '1', NULL, NULL, NULL, NULL),
	('785cc0b8c043437486727264e4676123', 'Maintenance', '1', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `maintenance_tasks` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.migrations: ~69 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
	(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
	(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
	(6, '2016_06_01_000004_create_oauth_clients_table', 1),
	(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
	(8, '2019_08_19_000000_create_failed_jobs_table', 1),
	(9, '2020_01_14_124656_add_column_users_03243342342', 1),
	(10, '2020_01_15_155832_create_roles_table', 1),
	(11, '2020_01_15_160512_add_column_users_02123343342342', 1),
	(12, '2020_01_21_013855_create_notifications_table', 1),
	(13, '2020_01_22_063245_add_column_users_034534534545', 1),
	(14, '2020_01_22_070409_add_column_oatuh_token_034534534545', 1),
	(15, '2020_01_22_070608_add_column_oatuh_codes_0334534534545', 1),
	(16, '2020_01_22_070650_add_column_oatuh_client_0234234534534545', 1),
	(17, '2020_01_23_145504_create_equipment_table', 1),
	(18, '2020_01_23_151120_create_transports_table', 1),
	(19, '2020_01_23_151957_create_transport_categories_table', 1),
	(20, '2020_01_23_152012_create_equipment_categories_table', 1),
	(21, '2020_01_24_011556_add_column_oatuh_equipment_04534534534534545', 1),
	(22, '2020_02_17_053818_add_column_user_045234234245', 1),
	(23, '2020_02_17_055529_add_column_transport_04522342344245', 1),
	(24, '2020_02_19_152833_create_s_a_s_s_table', 1),
	(25, '2020_02_19_153804_create_s_a_s_staff_assigns_table', 1),
	(26, '2020_02_19_160911_create_s_a_s_comments_table', 1),
	(27, '2020_02_20_144659_add_column_sas_034534534234245', 1),
	(28, '2020_02_22_020153_add_column_sasstaffassign_03453453345345', 1),
	(29, '2020_02_22_143703_add_column_sas_034534123123', 1),
	(30, '2020_02_22_145202_add_column_sas_03134134234', 1),
	(31, '2020_02_29_030713_add_column_user_03412312343', 1),
	(32, '2020_02_29_050123_create_e_b_s_s_table', 1),
	(33, '2020_02_29_050909_create_e_b_s_staff_uses_table', 1),
	(34, '2020_02_29_050934_create_e_b_s_equipment_uses_table', 1),
	(35, '2020_02_29_130347_add_column_equipment_03412312343', 1),
	(36, '2020_03_01_092727_create_t_b_s_s_table', 1),
	(37, '2020_03_01_092750_create_t_b_s_transport_uses_table', 1),
	(38, '2020_03_01_092829_create_t_b_s_drivers_table', 1),
	(39, '2020_03_01_101918_add_column_transport_03234234', 1),
	(40, '2020_03_21_115350_create_m_s_s_s_table', 1),
	(41, '2020_03_22_034319_add_column_mss_0312334234234', 1),
	(42, '2020_03_22_040254_create_m_s_s_equipment_table', 1),
	(43, '2020_03_22_040304_create_m_s_s_transports_table', 1),
	(44, '2020_03_22_040743_create_m_s_s_pics_table', 1),
	(45, '2020_03_22_040903_create_m_s_s_tasks_table', 1),
	(46, '2020_03_22_041335_create_maintenance_tasks_table', 1),
	(47, '2020_03_22_041818_add_column_mss_031233421231231', 1),
	(48, '2020_03_22_042531_edit_column_mss_0312sdf33421231231', 1),
	(49, '2020_03_22_050428_edit_column_mss_0312s3453453451', 1),
	(50, '2020_03_24_124527_add_column_user_02312312123', 1),
	(51, '2020_03_24_131740_add_column_user_0223423412123', 1),
	(52, '2020_03_24_232225_create_t_m_s_s_table', 1),
	(53, '2020_03_24_233259_create_t_m_s_pics_table', 1),
	(54, '2020_03_24_233642_create_inquiry_types_table', 1),
	(55, '2020_03_24_233831_add_column_user_02234232342343', 1),
	(56, '2020_03_25_013132_add_column_tms_02234232342', 1),
	(57, '2020_04_08_154339_create_document_logs_table', 1),
	(58, '2020_04_14_011236_create_schedulers_table', 2),
	(59, '2020_06_24_145756_add_column_noti_0213111', 3),
	(60, '2020_07_07_191206_edit_column_sas_0213111', 4),
	(61, '2020_07_07_191229_edit_column_ebs_0213111', 4),
	(62, '2020_07_07_191235_edit_column_tbs_0213111', 4),
	(63, '2020_07_07_191244_edit_column_mss_0213111', 4),
	(64, '2020_07_07_191257_edit_column_tms_0213111', 4),
	(65, '2020_07_07_195830_edit_column_sas1_0213111', 4),
	(66, '2020_07_07_195838_edit_column_ebs1_0213111', 4),
	(67, '2020_07_07_195849_edit_column_tbs1_0213111', 4),
	(68, '2020_07_07_195857_edit_column_mss1_0213111', 4),
	(69, '2020_07_07_195906_edit_column_tms1_0213111', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.mss
CREATE TABLE IF NOT EXISTS `mss` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `acknowledge_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acknowledge_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_start` text COLLATE utf8mb4_unicode_ci,
  `task_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Early Completion , Cancellation , Resistance',
  `justification_update` text COLLATE utf8mb4_unicode_ci,
  `finish_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_finish` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.mss: ~0 rows (approximately)
/*!40000 ALTER TABLE `mss` DISABLE KEYS */;
/*!40000 ALTER TABLE `mss` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.mss_equipment
CREATE TABLE IF NOT EXISTS `mss_equipment` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_equipment` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mss` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.mss_equipment: ~0 rows (approximately)
/*!40000 ALTER TABLE `mss_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `mss_equipment` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.mss_pics
CREATE TABLE IF NOT EXISTS `mss_pics` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mss` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.mss_pics: ~0 rows (approximately)
/*!40000 ALTER TABLE `mss_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `mss_pics` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.mss_tasks
CREATE TABLE IF NOT EXISTS `mss_tasks` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mss` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.mss_tasks: ~0 rows (approximately)
/*!40000 ALTER TABLE `mss_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `mss_tasks` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.mss_transports
CREATE TABLE IF NOT EXISTS `mss_transports` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transport` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_mss` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.mss_transports: ~0 rows (approximately)
/*!40000 ALTER TABLE `mss_transports` DISABLE KEYS */;
/*!40000 ALTER TABLE `mss_transports` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_user` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiny_img_url` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `type` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'I - Information; A - Approval; R - Review;',
  `click_url` text COLLATE utf8mb4_unicode_ci,
  `send_status` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'P - Pending; S - Sent; R - Received; D - Read; F - Fail',
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_module` text COLLATE utf8mb4_unicode_ci,
  `module` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.notifications: ~0 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.oauth_access_tokens
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.oauth_access_tokens: ~346 rows (approximately)
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('01baf22b387b7c73ac5b05c8d02aac78d37a97d809d88029d58d3b3de9683b5eaaf8bf432dcaff7e', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 22:19:48', '2020-07-15 22:19:48', '2021-07-15 22:19:48'),
	('041e45ee103dd52506508d468b55a13f85ed7799fc233c2c2908d87eefffab8012083bff6e874458', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 22:54:06', '2020-07-12 22:54:06', '2021-07-12 22:54:06'),
	('0434d86faf3e7c95e44fcc182a492165fba42a82977bd1c45ca7673076c85110a5e76de393949b65', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-02 07:15:36', '2020-07-02 07:15:36', '2021-07-02 07:15:36'),
	('04bebea66862bace22eb37cb2833c1c9f8e46cb42ffd89ad04aee58f78bc8da411514889bf7ff38a', '92534b57088249bcb7a588e8ec4f1e6e', 1, 'authToken', '[]', 0, '2020-01-22 06:55:32', '2020-01-22 06:55:32', '2021-01-22 06:55:32'),
	('074d92fd00f364654118cb0e2af522a07ef7ba148ccd1a98749d277c6c470b5238fb5f4502fda31c', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 03:43:00', '2020-07-16 03:43:00', '2021-07-16 03:43:00'),
	('075430fb9f64985a3bf19477f7ec4622c5f27663e6f6dbf96d4c99d5bd2a875cc1a03112c0145747', '03146f5e07084d799dfc6a78b4fb300c', 1, 'authToken', '[]', 0, '2020-07-03 18:55:10', '2020-07-03 18:55:10', '2021-07-03 18:55:10'),
	('0788465fc4184972e8a5009acf022850b7585460d05da687d4ca0bf315c3073a8e5d5fb830c823e4', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-08 00:11:23', '2020-04-08 00:11:23', '2021-04-08 00:11:23'),
	('079bf37f0261359a1f3b4b0e2aba5ef9fb290622caff69fd0c8280eb127e32b6b8e4f6b60348d9de', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 21:06:52', '2020-07-12 21:06:52', '2021-07-12 21:06:52'),
	('08561275b2b3565a45b63c5f1af2d70c08c3ec186ddfee723a8b78dfc0a6a33a54f1a57542ff0351', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-07 22:20:12', '2020-06-07 22:20:12', '2021-06-07 22:20:12'),
	('087a2df966c9c9c04701ded5ee580203c0e1d531923a7476528ed3e88b31936857067792cf780de6', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-23 17:24:39', '2020-06-23 17:24:39', '2021-06-23 17:24:39'),
	('08ec9632e2d41b12eaf59167b2ce48a3101630fbf413a5b8233eddc884b42bbc7bfd6e525189e3d5', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 17:24:54', '2020-07-13 17:24:54', '2021-07-13 17:24:54'),
	('098596861a3769becd112bebb19a4b44525bbbc4c5e4e1a1d1f1d8eeeaada5490e496e4a50156d56', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 01:22:31', '2020-07-13 01:22:31', '2021-07-13 01:22:31'),
	('0a17edb05f3e6de9ff54b335d60f997699bfbeb602a7676d4b70597f3925845f27be5efca4fbdd0d', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 12:57:24', '2020-07-16 12:57:24', '2021-07-16 12:57:24'),
	('0ab4656ff0771a0e266fd9f0428e329a10d31291113b9c4e58bd1087422fb2cc5eabedc2124fe22d', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 01:08:00', '2020-07-16 01:08:00', '2021-07-16 01:08:00'),
	('0b0882feed2cf719b7e9a4dbe833271d3148b8ae18919840292a987133781a34c518079aa9ae8e5e', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:18:19', '2020-06-23 17:18:19', '2021-06-23 17:18:19'),
	('0bc8f8a4374e51902fb35eabf07581708f65a2482fe9b08d8519a437c8b3f76c3f6deeb6115fd84d', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 14:58:20', '2020-07-13 14:58:20', '2021-07-13 14:58:20'),
	('0c37f5970778b530e69224fa913714fe2f925b0a20f37cf74931fe4d1cd49b70ef13598313272f84', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-15 21:33:32', '2020-07-15 21:33:32', '2021-07-15 21:33:32'),
	('0cdd4bde1c583df365befce0aff7488c8707a9ec667fed99a015bc2525e988e0481b04daad005dc0', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-16 15:25:21', '2020-07-16 15:25:21', '2021-07-16 15:25:21'),
	('0e3c2f4e5d0c139e8404d2429a909f2c105712a7a967f99c7d1f511d853902b586993fd10269588d', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-12 02:58:15', '2020-07-12 02:58:15', '2021-07-12 02:58:15'),
	('0ea2ca87c80184c5c68095c7caed16b01f0c795f2822c2f0598031c1cd83accbfc36aea703aac17d', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-19 12:17:53', '2020-07-19 12:17:53', '2021-07-19 12:17:53'),
	('0ede4b1a646f25dcf6540a3ce52a38842717183dbedb04f635bc8be91358c433351c8ade222aa608', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-05-01 07:43:52', '2020-05-01 07:43:52', '2021-05-01 07:43:52'),
	('0f5842395bb5d47d70e4626aeb9ec480c752a258071b05f1d453c8b0ac0690e424617b0b34043dba', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-12 23:55:12', '2020-07-12 23:55:12', '2021-07-12 23:55:12'),
	('0f7c361946505bd900748920478551fba9218a3b45fceaee1db0bb8f92aa9a466ba7c4321ea2bd5b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-19 12:33:32', '2020-07-19 12:33:32', '2021-07-19 12:33:32'),
	('11a8a43dcb6779dd4995ff8118ff6ac35631760757064a8e207b7dab8989975a2a631ea274569f14', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 21:43:06', '2020-07-13 21:43:06', '2021-07-13 21:43:06'),
	('12997d8f747ca4a8966d9953fb7dfc9fe64e52c6f2a5d6796e8600a00df2e1923827393511725054', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 01:10:18', '2020-07-15 01:10:18', '2021-07-15 01:10:18'),
	('12e548a383862f74662d55d37fa4024461fc241c5ab07a8aa296f07892189470aa7d34943d8d110b', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 01:20:02', '2020-07-13 01:20:02', '2021-07-13 01:20:02'),
	('1351c66b9fed749c5708672bce9736a03e02c34a62ab9ddc06d41924ed4e433d42fe353d8f764b31', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-02 07:24:43', '2020-07-02 07:24:43', '2021-07-02 07:24:43'),
	('147e4dca7e6d8e3bbeb5694f8693967a779bf02c1b899a23e0b7ffb9c69f663a5663dd7ad6768b53', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 21:23:59', '2020-07-09 21:23:59', '2021-07-09 21:23:59'),
	('15ce043be8fa7e59147d1db24bf9d0f5b241bc1bb707b0627800bcf859ef6f8c350b564eee867ab6', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-23 03:03:03', '2020-07-23 03:03:03', '2021-07-23 03:03:03'),
	('16adde47c8ce3ab537d9c2f8b33bbda78b3e8c0024005d545f39cf15d07e04bc61447d950005773b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-12 22:12:21', '2020-07-12 22:12:21', '2021-07-12 22:12:21'),
	('170dc2d2b9fe67273baa2d72b15c11231b0b76a30873b9210d3044f48ddc0aa87c66141dd1f5a9d1', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 11:24:23', '2020-07-12 11:24:23', '2021-07-12 11:24:23'),
	('17672cce2239799fda77cf3498af8f7a46c0be29dd21e5f9eb9d699eb7676e163c9f83d6d2e119a2', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 14:50:20', '2020-07-13 14:50:20', '2021-07-13 14:50:20'),
	('1772b9ad3c99ff040b43e49d5b57f7b2a3f65a7ba1e11fc15250568e3cf394c437a11d7aac543901', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 14:03:50', '2020-07-13 14:03:50', '2021-07-13 14:03:50'),
	('1a9bfa31b94051d2e5b8bff0a1022190e8d49e6a071fed3fba28692b305caa12a579e424557bd915', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-12 23:45:14', '2020-07-12 23:45:14', '2021-07-12 23:45:14'),
	('1af4aeddd3d3ed71fbade5ca9d53a5ce852b6a9dcf44cfda85d43e7b531d5b095b6e50a1a549448d', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 21:46:34', '2020-07-13 21:46:34', '2021-07-13 21:46:34'),
	('1b7d9089d1b21a91889dbc22fe3f8b8de0f2c3063f491c22e054551ad4cc6375175563d8e00f57d2', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-19 09:26:21', '2020-07-19 09:26:21', '2021-07-19 09:26:21'),
	('1c3ba65e11f16383c10b6f716d9c584e8ecc5e657806f8183b0217b17dac1194a66c39b867395a3f', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 16:36:44', '2020-06-23 16:36:44', '2021-06-23 16:36:44'),
	('1cd2ae0b8979fa663607326cc26945426689c4f9f3d0279e88be29ee511d97236ae9be8858220cf9', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-11 20:05:21', '2020-07-11 20:05:21', '2021-07-11 20:05:21'),
	('1da0427bf3078da67a499f2426f5152377c850d58b61352a2719b7eed8fb3104716c992012eaf45c', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-16 02:16:46', '2020-07-16 02:16:46', '2021-07-16 02:16:46'),
	('1e528ee83dc4a3a73a858c542fa4063cf622d933970eff63a14927143e1f94ce35f08d7f68fc56dd', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-09 21:22:28', '2020-07-09 21:22:28', '2021-07-09 21:22:28'),
	('21b4944b1c5f55db569bd89d83ed51fe58d395c8b98a3c859a19ff714c6fa6320b3c6eb6fcf13404', '30ac5c22740a4e6eaa1a640386aac399', 1, 'authToken', '[]', 0, '2020-06-27 21:42:12', '2020-06-27 21:42:12', '2021-06-27 21:42:12'),
	('220a914d4ac242e8a28aee576b66c994adc204969e04a3483091b34acc0ad890e6ecdf32d9ff37c2', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 21:46:52', '2020-07-13 21:46:52', '2021-07-13 21:46:52'),
	('2351b866aa5239e970edcd0f68bc8f81d2b7736b085415095c01e907f19b6f4991709a900f2a65ae', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-27 23:25:28', '2020-06-27 23:25:28', '2021-06-27 23:25:28'),
	('23d76e61a7c44edc4dcc48085e2875852a9f3f0d286cf3b07120190b7611da9ee9f78371879ddf1d', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 22:36:29', '2020-07-13 22:36:29', '2021-07-13 22:36:29'),
	('24bc2a1bdef52926c1829a24b40ff079c328ac247b0fb0d5a4a0a283072c93a384b6422a5e6c4995', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 23:56:26', '2020-07-13 23:56:26', '2021-07-13 23:56:26'),
	('26557b52936b9db6291b2bdcfde15a651b4834faefadbe00433fd0c4535eb1ea8eff455a909316bc', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 14:06:26', '2020-07-13 14:06:26', '2021-07-13 14:06:26'),
	('269bfa6dbc1f6a48692227a8828bf0bf91b32ba0d5182cc8def91d3a74ad9debb6bc29403ccb0865', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-09 01:55:04', '2020-07-09 01:55:04', '2021-07-09 01:55:04'),
	('27680a17cdcb6bcc3a8ba1d24060dc149dcddbcc6a378daf5a510a1b33342376254bd2a84acc6b2b', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 01:00:31', '2020-07-16 01:00:31', '2021-07-16 01:00:31'),
	('29a8e3025dc0de70b364aa0758b0dfdb8095eb966e7febc0cba645c5057752cab6d32d7841012253', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 14:06:11', '2020-07-13 14:06:11', '2021-07-13 14:06:11'),
	('29afdd22472ef5b79a1ef3daa6fb051cba66d360143200c594264cc300de1092ac0bf11414c1c1af', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-12 21:08:52', '2020-07-12 21:08:52', '2021-07-12 21:08:52'),
	('29c5a84005fabdf4443e76a950a595d0e6441f1c22d97812e5f14f21bd5df1500a18d675f898f068', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-13 01:20:46', '2020-07-13 01:20:46', '2021-07-13 01:20:46'),
	('29dc874b540e1b929fa1f98071bd29a926d03e529ed3134f8e56eb42a60233e4c62fbec4eb2a5eab', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-14 01:50:24', '2020-07-14 01:50:24', '2021-07-14 01:50:24'),
	('2ad83af786db830ddf1f3fa6d27f51e0d861c86d029e21ebdb45c407b906a20ba546644aab1ea7ef', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-12 13:24:54', '2020-07-12 13:24:54', '2021-07-12 13:24:54'),
	('2aeaff4f45d5f1c7edc12a511d14892fa073515d426cad5d9eb72a1ed33822966ef9cc2f832517a5', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 10:51:52', '2020-07-02 10:51:52', '2021-07-02 10:51:52'),
	('2af60865eafaa1d02e32cc0de0d204134a4dccebac2c45beb6d3038c304c13caeae1ce5043bc9b94', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 09:05:25', '2020-07-16 09:05:25', '2021-07-16 09:05:25'),
	('2b3153b4280ff338b82e7186226c070375fcf52d6ddd88229a423cfacdcd43c2012ad34d35eb7670', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-16 07:44:49', '2020-07-16 07:44:49', '2021-07-16 07:44:49'),
	('2ccca01d7102c5482a819c3dd5a9e67a02de6ac2015e6d5d9a25b18c7fa30fffc2d52c60e5e51892', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 17:55:47', '2020-07-13 17:55:47', '2021-07-13 17:55:47'),
	('2f673dbc9306c690d741f06d3e0ed9228510bc9053c496792349d338f00e0bb8762361a6d47237b9', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 12:30:31', '2020-06-30 12:30:31', '2021-06-30 12:30:31'),
	('3093e14bb7c38bb916e8c4818d797d399c8e0679f5b5666bfc280debeb441c5b350ae3a17b6872ea', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 23:43:04', '2020-07-13 23:43:04', '2021-07-13 23:43:04'),
	('3152bc42a3367f9c0ef3d2c02a647d2f953615a83ef672b1f5be3ae169e78cc2c1f1ad072c0f83c5', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 14:59:29', '2020-07-13 14:59:29', '2021-07-13 14:59:29'),
	('319f608aa3353df849196a273abd23044f77f6e4827bf25a2feee58d9b681b7880d5c7bc0412ae89', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-16 19:08:09', '2020-07-16 19:08:09', '2021-07-16 19:08:09'),
	('31b836f482656aeed4e5b3a386aeafcec69579a85d0c5a4077d08dc72fc13f25f118c38d187d1692', '2', 1, 'authToken', '[]', 0, '2020-01-24 15:18:32', '2020-01-24 15:18:32', '2021-01-24 15:18:32'),
	('3221c7ec36f76f0e2dfa1992bb0954204949b214aa581c564e6a627bc23765b0f127f0295e12ea83', '2', 1, 'authToken', '[]', 0, '2020-01-13 14:49:31', '2020-01-13 14:49:31', '2021-01-13 14:49:31'),
	('32586dbe9a6b62e3a13c813afaa6cdfd763d63762436521259b7296bb6e1b83c1905186d6db251a1', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-23 04:16:37', '2020-07-23 04:16:37', '2021-07-23 04:16:37'),
	('3260b5ec4edf96b04e606c053e08c0ebc2503223b9508c774fd329452814f9937ea16c722fecb5a7', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-14 23:42:44', '2020-07-14 23:42:44', '2021-07-14 23:42:44'),
	('3290194a1f172cd4c487bded1942b76c4b26244aa5c45df688973a98f4e72b28afa7f59b44e7dc76', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 15:56:20', '2020-07-13 15:56:20', '2021-07-13 15:56:20'),
	('32bc7f96477a2601ffb717e835523d5c6756b944e9b6f3a4e2a13d679cbd115a90c255ef3a673e52', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-24 19:24:46', '2020-06-24 19:24:46', '2021-06-24 19:24:46'),
	('34672b9e86445f59ad9e85eccb82bad88fd74c1e496f5dc8379ab5b3a5058ace2a3f39759afa2c8a', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 11:37:04', '2020-07-16 11:37:04', '2021-07-16 11:37:04'),
	('3469214d04adab3b7ec5c0a60e80b14933ad40a816f253c8380f514dc63e30a5ce13322b791798c3', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 09:49:48', '2020-07-09 09:49:48', '2021-07-09 09:49:48'),
	('360fc5cc5091574f59fc15d81aaffb36c1ec192eaa2d08a01f2762b5f9a35ffc8cb08357f8acc4d8', '2', 1, 'authToken', '[]', 0, '2020-04-08 00:08:02', '2020-04-08 00:08:02', '2021-04-08 00:08:02'),
	('3660240284d7c1689b80f546d7e426b48ed595ec9fb22457203e8beb2ab931d9f6095b0315dd2dcf', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-16 10:23:16', '2020-07-16 10:23:16', '2021-07-16 10:23:16'),
	('37479dd56d9c8bb041040dcc6128a8b2008740b2f78217a8b3bfa7f6105bbfa06c091747ffc34543', '92534b57088249bcb7a588e8ec4f1e6e', 1, 'authToken', '[]', 0, '2020-01-22 06:46:47', '2020-01-22 06:46:47', '2021-01-22 06:46:47'),
	('3833285718d9006e8d342d257ac9b3baa10e2a573a2d2f28c3f007f5dd1e9ce25f5c208d16448ed0', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 10:44:22', '2020-07-15 10:44:22', '2021-07-15 10:44:22'),
	('38588718bdcae9714728f79c9ab7de255be69d96b44b2c35c2f1215cb39859e678dc3c08dfc52bb5', '03146f5e07084d799dfc6a78b4fb300c', 1, 'authToken', '[]', 0, '2020-07-03 19:02:34', '2020-07-03 19:02:34', '2021-07-03 19:02:34'),
	('39d9adfbbe5d79eb9e34acbe26320fd457151912d3ffabda62d8f7b03be25299093b3eea57e91213', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-16 01:44:24', '2020-07-16 01:44:24', '2021-07-16 01:44:24'),
	('3a8e11739ce333e68e28aeb57cec7c9482e5a392d7a9660df0e8353c6a29b78e3fa4d1b3cf953687', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 14:30:55', '2020-06-30 14:30:55', '2021-06-30 14:30:55'),
	('3aa522b381a04aac693ee013284e47535472f8b888e83d7b330527ed0e1ac7f73df03fc3d8610e0d', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 23:29:22', '2020-06-30 23:29:22', '2021-06-30 23:29:22'),
	('3ab9baee365484bdb17a2aba83841a9d6742f76d0176b679ae643ba10f839473685abec686abd4f8', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:20:19', '2020-06-23 17:20:19', '2021-06-23 17:20:19'),
	('3ba14263c808889a884f7353be515a399c80fcf0fc3ef9686bc8fb441e7b7a7b4b3a05e37f1a4f36', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 21:44:35', '2020-07-13 21:44:35', '2021-07-13 21:44:35'),
	('3be0e5d34d0133ede7b07933e0e9060534000d4ed3620b70e93816344566cb0589dbce3d0e46673e', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 01:07:36', '2020-07-13 01:07:36', '2021-07-13 01:07:36'),
	('3c972629cd6fe9610c4465262fa28db413e0231a89892ad9138b5fb9d11a97092a6349d4c3154f7b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-15 17:59:50', '2020-07-15 17:59:50', '2021-07-15 17:59:50'),
	('3cacc59b42bf14699c7c89840cb199f8f8adbecdbfe13583b1dd97e15b91005eb4c7fd16bd90e6f1', '2', 1, 'authToken', '[]', 0, '2020-01-22 16:54:15', '2020-01-22 16:54:15', '2021-01-22 16:54:15'),
	('3d8c6b31d2ea50fca1268135766d2c47dacf82db0033cb9f01cae6b3b70ba47e6380ec60ba07a298', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 15:15:31', '2020-07-16 15:15:31', '2021-07-16 15:15:31'),
	('3e7878a3ee0a3c0391718d43b15bd249ca2931bf8691a790eb6262f3ac0a3347fc2bdbebb71c180b', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 21:53:26', '2020-07-16 21:53:26', '2021-07-16 21:53:26'),
	('3f96258175403e5aa32a178b6661f449a1211a02b1885956ceff50058fc1259a22c41e9275b901ae', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 16:15:18', '2020-07-13 16:15:18', '2021-07-13 16:15:18'),
	('3fafb7aa774229f88ff96d0a607410d297c2dc792d66656b85fa0735ee5af0f15a7b824e340a36d6', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 07:14:53', '2020-07-02 07:14:53', '2021-07-02 07:14:53'),
	('41e52d0443f32445971a4cb78126ab1951d09e9de3e9fd2c7c12d3bf32b9edb1efa4a9b8e78add9d', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 23:04:56', '2020-07-13 23:04:56', '2021-07-13 23:04:56'),
	('41f8a744cf1bfbdc7118955a91af009e955247a7966583714b6bb9e26c88b98528474e1da803aebc', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:19:43', '2020-06-23 17:19:43', '2021-06-23 17:19:43'),
	('4203a22160d7244297c749ae82544b839ce00765c8d03efc973d49d9ff8c864433bb8053188b582b', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 00:24:35', '2020-07-02 00:24:35', '2021-07-02 00:24:35'),
	('44184b8ac6c779d361573e1ace26106d4cbc44ae855dffa4f2f9d3a45cf5c62794753323deca2416', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-13 14:55:10', '2020-07-13 14:55:10', '2021-07-13 14:55:10'),
	('444b5fab2691209dab2e04d4260684011a5718e47a16377ff18cf41e2d02df3f4be894c8110b179e', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-16 01:46:14', '2020-07-16 01:46:14', '2021-07-16 01:46:14'),
	('451892128d6dd76941fa8dc7d9753717bf1fa6a3f9c489692009c9c22bb00affd5411e5a380b8137', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-15 00:20:35', '2020-07-15 00:20:35', '2021-07-15 00:20:35'),
	('458faa7434ba21a52ae5592b5f4829014705f716533e933940661424332dc380b5cc621723301306', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-16 06:39:32', '2020-07-16 06:39:32', '2021-07-16 06:39:32'),
	('48c77219de9229b33fcfd5a68e2d3788925db4f4978917b8573cac94a2f3e841233b8ca9c2cb5f8c', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-14 00:35:25', '2020-07-14 00:35:25', '2021-07-14 00:35:25'),
	('48f6e50a1d5ce542209709c1ce9e23f92d378af010e60c3c9c8dc8ac3b59f03fc63402f76c7e68b4', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 01:01:31', '2020-07-02 01:01:31', '2021-07-02 01:01:31'),
	('4979563ede6ac684b2c9a830b5a48db37b2e3c6ad4605e7cfebdab86cceff35862a7cff5a56c9a6e', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 11:28:01', '2020-07-07 11:28:01', '2021-07-07 11:28:01'),
	('49795c9ea4494d345323809eac372c249bdfc437dc01d918f77344c1f0916a64de7cd040a0601f3c', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 21:50:00', '2020-07-15 21:50:00', '2021-07-15 21:50:00'),
	('49872265290657252e57875014b7f21a0a57681919703b547a32d446587a6958e2c7d66ae2a6a00d', '30ac5c22740a4e6eaa1a640386aac399', 1, 'authToken', '[]', 0, '2020-06-27 12:15:54', '2020-06-27 12:15:54', '2021-06-27 12:15:54'),
	('49d3bd4428807f3795b3bbe5f6864216225c8a71242a91ed149ccf0636016db0ac50bacd8b7b4e11', 'bd665f7ce1804d229149d04888a58fd7', 1, 'authToken', '[]', 0, '2020-06-27 12:05:08', '2020-06-27 12:05:08', '2021-06-27 12:05:08'),
	('4b2a8d4cf29f8add3099cb6cd56e93567f502b61f5c01b8a5ae5b862ef37ec2a850e882e2dcfee74', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 00:22:07', '2020-07-13 00:22:07', '2021-07-13 00:22:07'),
	('4c2152ba3e80cf45f3df69e8f0a304d8d52e7320bc88f4ad916be8c89b255fdcc58da43638061b2d', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-14 22:00:40', '2020-07-14 22:00:40', '2021-07-14 22:00:40'),
	('4d5546ccfb3abfa7bf6aedd6f05a3747e9fbe49728cabc377603a09d6f1bed9fff6d511160a74ef5', 'fbc32990f6ed4d798fd183bc3313696e', 1, 'authToken', '[]', 0, '2020-06-25 15:33:15', '2020-06-25 15:33:15', '2021-06-25 15:33:15'),
	('4fe2ae74bd4490e2db7ee84d50ad31322350e0ea1d8d4c01da4b851f018ec44c6ad74b15853eb2a9', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-05 23:26:05', '2020-07-05 23:26:05', '2021-07-05 23:26:05'),
	('504ed0f89a150a3b3c910e6a111885bbaeb1546f899f866244889b26ebcbc731b64f07a19368b037', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 18:03:56', '2020-07-15 18:03:56', '2021-07-15 18:03:56'),
	('50a0cba204035bb1a2cc69901025e9fb6265a21e05e619067e9350f8e851361ea194ded88f6413b0', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 00:52:06', '2020-07-15 00:52:06', '2021-07-15 00:52:06'),
	('510388c003fdf3747c4c03e565328166994917f6ce6244e8247e324bc847ab7702a75af6d5d43ad7', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 02:17:15', '2020-07-16 02:17:15', '2021-07-16 02:17:15'),
	('5169a174d960484b45c5e2acb98d851db17ad22bebd7075579ceaa20c25bc1617219de687c7a4462', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 10:56:12', '2020-07-15 10:56:12', '2021-07-15 10:56:12'),
	('520b98ceafed42b28ecae5ddb479ca9f0cc85e73b09bf0595eb89d795c39802ba4f4f7e090a1a607', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-02 07:08:47', '2020-07-02 07:08:47', '2021-07-02 07:08:47'),
	('53ace8a5078b2b4d0d50eff069dc3f919642cf7cff9a2aa0728b1c062b8cc5562df2539409800eb9', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-12 11:25:07', '2020-07-12 11:25:07', '2021-07-12 11:25:07'),
	('5516f6b834d29d74c247e29a3a45a65a9438584ff8e1d3eee5f0e432ae6f8115dadc80700dd59753', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 16:23:42', '2020-06-23 16:23:42', '2021-06-23 16:23:42'),
	('56799acba67384abc8e45af5a560e637c7a7b81f1701594eaee520bc91109064e204690b7f5fa263', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-12 23:42:46', '2020-07-12 23:42:46', '2021-07-12 23:42:46'),
	('56bbf4141dab5cac129b36f8078ba1c9159e555feed9a9d7310b24c35fe0d7417d2a4a384ffd2c71', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-14 12:05:38', '2020-07-14 12:05:38', '2021-07-14 12:05:38'),
	('56d3fe8fa57712c6ae2e13cf97f8ef5936c43de86ab6787884406e71d804b8feda81001cadae3fa9', '30ac5c22740a4e6eaa1a640386aac399', 1, 'authToken', '[]', 0, '2020-06-27 21:47:24', '2020-06-27 21:47:24', '2021-06-27 21:47:24'),
	('56d9bc0636034e43075cf7f7dcb14dc1c7a836e5eef380c98098190f77837cbf8a1a0b4994867a20', '2', 1, 'authToken', '[]', 0, '2020-01-14 15:55:28', '2020-01-14 15:55:28', '2021-01-14 15:55:28'),
	('577a36a567f7a117c05f2eccd0c82acb97d7e561394d5c91b3f7ea341c7b94e8569dc208034562f9', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:35:54', '2020-07-13 00:35:54', '2021-07-13 00:35:54'),
	('5806d078606308efffd0a1dd454b09e1e1df91cd40a877a95de63a61140fd07ec93326cede647273', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 11:28:11', '2020-07-07 11:28:11', '2021-07-07 11:28:11'),
	('5850e94fe45680c8f57c6417bff1bef2303659336373ec990ef283e0d69b5e704fb233e86097318e', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-16 01:44:56', '2020-07-16 01:44:56', '2021-07-16 01:44:56'),
	('588750af1132eb8e46bc02715a6bc8a08359368c813e5b25e024e9591bf3820cce328aa3726d1a6d', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-15 17:58:44', '2020-07-15 17:58:44', '2021-07-15 17:58:44'),
	('58b7914ddcade0971824399b7761f901e282616d69b12230a9187dba07583bd510daf00bdbc186aa', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 07:06:40', '2020-07-02 07:06:40', '2021-07-02 07:06:40'),
	('592632a643b7fa29757d8763c30502105690dacdcbba1c9ef97becbd3dfc18526c5a2eae1e14af40', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-16 01:00:41', '2020-07-16 01:00:41', '2021-07-16 01:00:41'),
	('5ac31d63349c4c49500b7076c2a53964630339492f62222454113e0af67a2bed4150a9558b38e019', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 09:49:00', '2020-07-13 09:49:00', '2021-07-13 09:49:00'),
	('5ba992f4b9111b2137acec2159bda8de92e712a2d4117dfc847e95226086e4b09ce798eb8b0d2117', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-15 21:26:33', '2020-07-15 21:26:33', '2021-07-15 21:26:33'),
	('5c21b0a257c461a9a01c27e088f7bbebfc95a4a472aff19cc68ab1aed4bdee2f8b9bc031035c8cc5', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 10:57:42', '2020-07-15 10:57:42', '2021-07-15 10:57:42'),
	('5c2d5757b806344da4af335dcde221a816c8598ff11693bde81071118ef67c9e5ddcae26dd40f919', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-16 14:32:20', '2020-07-16 14:32:20', '2021-07-16 14:32:20'),
	('5cc0f91534ad90ac56eddffebcda2fdcf0b9fb9f5d7f54835d2e23cc28c1e069d47da7d6d008f824', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-12 13:54:04', '2020-07-12 13:54:04', '2021-07-12 13:54:04'),
	('5cd2636a20a45673aa4af36e2b5bd781d568407174b12234bce527fd2d84c4924fd9030ae8c507ad', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:42:42', '2020-07-13 00:42:42', '2021-07-13 00:42:42'),
	('5dadaf82588d32dab3b3d1413f360a4c8973953f5fc760c9f9462331f289ea391f06121907199228', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 21:21:13', '2020-07-13 21:21:13', '2021-07-13 21:21:13'),
	('5f100b8971c3e908f31d1429d92d3c7fc07581643a6f1e113eba9ccfa027c09e3264481f26262b67', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:26:39', '2020-06-23 17:26:39', '2021-06-23 17:26:39'),
	('5f4907a1564a21bc806e03234700ba2b0c4a32302cb2303e44f8cd4020e2f3e13737b84d7e25457d', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-14 17:58:44', '2020-07-14 17:58:44', '2021-07-14 17:58:44'),
	('5f50feefadc155c6ada9fe69b415af7f4addcbc5f077f2aa33727ff8f4f6b7e60924e51e85f378ec', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-14 17:40:50', '2020-07-14 17:40:50', '2021-07-14 17:40:50'),
	('5f8c4f559ee1bb7fafb59e4ab2baf7e63dfc0fb0b916332424f00720721ae637fa100f75b48cba85', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 09:47:48', '2020-07-13 09:47:48', '2021-07-13 09:47:48'),
	('6209c83afcb5ea0e5e3b3e995a40b8740b9116700da026e84de290967d07a613257d9c356bcab703', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 15:12:21', '2020-07-16 15:12:21', '2021-07-16 15:12:21'),
	('6386115988a13353c4398a397b635e2b7b0648daed34cd88cf9d57db4b96b71b0f08a73f7eae0cb0', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 18:39:18', '2020-07-09 18:39:18', '2021-07-09 18:39:18'),
	('63cda96ea723a0076bdd5936b1c21ab829e76a73c7121d36f81de3bba352956e615758617f10f347', 'c154432c2c064d8383371643cf8f9ccb', 1, 'authToken', '[]', 0, '2020-07-19 18:10:48', '2020-07-19 18:10:48', '2021-07-19 18:10:48'),
	('653f0e020987bf1de605ef1292723d285f5d3630d1d32ca15176ab87c57fd998e40fe3476a09c4b1', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-08 00:15:04', '2020-04-08 00:15:04', '2021-04-08 00:15:04'),
	('65d39957b765fc6c4dc443d1dd2feb4c44b7264164c9661a35194932e86749a36b315f0d4cae0bad', '5', 1, 'authToken', '[]', 0, '2020-01-22 06:10:23', '2020-01-22 06:10:23', '2021-01-22 06:10:23'),
	('677e3dbdb941ea5bbcdb98a7a7a66088499ce0b0b1de79fbe8c21eb519ff1e47f32542cc5b08fdf5', '2', 1, 'authToken', '[]', 0, '2020-01-24 02:33:50', '2020-01-24 02:33:50', '2021-01-24 02:33:50'),
	('67961fd21f7b34244a0f2a3040ed54bdba67fc8b2953da3489982d5bd0e9d9fac25935e9c6af2a2d', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 00:41:54', '2020-07-13 00:41:54', '2021-07-13 00:41:54'),
	('69ae945da257b0e87994760418b61ea02aaed3d3fc837dab0818b4fc7927a15add85e8626cd14866', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 14:39:44', '2020-06-30 14:39:44', '2021-06-30 14:39:44'),
	('6a2b50ca5d7d4c831d2707a0c8d6b16202743967a744c3196c9302ca007dec2cec7385435514a856', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-26 20:45:14', '2020-06-26 20:45:14', '2021-06-26 20:45:14'),
	('6b59115fde88be70d6e0888d6cc1c11076ca576065f24fe73acd0d860ad24f89a9f5cb3fe1b68914', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-16 00:45:58', '2020-07-16 00:45:58', '2021-07-16 00:45:58'),
	('6c04bf20e0649fbaec0b5a315fb0f98aeda6befb0a8706a10bb6fb99d02417730237d476b1b8caa1', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-16 15:22:40', '2020-07-16 15:22:40', '2021-07-16 15:22:40'),
	('6ca7f6b82bda71e303573daf1ad97a39132ba927b63701a3f247ec779960542574b8351870395851', 'bd665f7ce1804d229149d04888a58fd7', 1, 'authToken', '[]', 0, '2020-06-27 12:23:39', '2020-06-27 12:23:39', '2021-06-27 12:23:39'),
	('6cd71bd83901b4643c4fe6f860bbce2a44fe1a9e9ff0fbe3d5fd84cbb30c298c8be2446ce712b404', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-14 17:22:01', '2020-07-14 17:22:01', '2021-07-14 17:22:01'),
	('6da9cf1eba888ac4f3a25ed14a008a353c5577c244479bb7c9b7d8a942ceaab2571851514cd95eda', '2', 1, 'authToken', '[]', 0, '2020-01-13 14:55:06', '2020-01-13 14:55:06', '2021-01-13 14:55:06'),
	('6db8c9330108f243bfa41e6b95ac455a002294e46c35ed2cef1cb30daf7194c3cf7efab448ff7cf6', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-26 20:43:08', '2020-06-26 20:43:08', '2021-06-26 20:43:08'),
	('6e14cc03f5d24c6e6b8ba0ab2ca0ef1c111b0bdd171b4edbcaf3a22c33e7d611ff54a873f28ea3f0', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-16 10:36:27', '2020-07-16 10:36:27', '2021-07-16 10:36:27'),
	('6f1a35c3e1114560b88fb811c3f476d64af67c9421ed417779746149ed4bf68035cb74e7bce93029', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-14 17:23:16', '2020-07-14 17:23:16', '2021-07-14 17:23:16'),
	('715b8463cd9eefd02ba52703efb9bc656dcae9e0a79d7bccd4d6c29c9b8c00d92e0500b72d3ab88b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 09:35:21', '2020-07-09 09:35:21', '2021-07-09 09:35:21'),
	('719e515eb7dcff2b1bbd82b98c89be2a22817b8a4eba52819e9a8a3381e6b87c9ff2639d845a4d25', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 07:24:07', '2020-07-02 07:24:07', '2021-07-02 07:24:07'),
	('71cd30a8c8c1ff1622bc02e68cb16819491a0ee682f5e6383bcb794a9224eda86cbc8b2ae1fbeffd', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 15:21:04', '2020-07-16 15:21:04', '2021-07-16 15:21:04'),
	('7248454f2ee60414176473cc16ecfc601359143964ebfbb724d353a8374b4d7cc79d554de745df29', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 06:54:39', '2020-04-10 06:54:39', '2021-04-10 06:54:39'),
	('7273f54d935616a5f03a0790a65213dd930da2793fe1f2e8eb71ca34b59865ef8927437f916003dd', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-12 04:11:07', '2020-07-12 04:11:07', '2021-07-12 04:11:07'),
	('72d2d46884d31e5a8b7aaffc4ca46f29bc83f02ac82ee2c0fce620625368f016d553856227f33790', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-12 12:02:54', '2020-07-12 12:02:54', '2021-07-12 12:02:54'),
	('73fb6cae16fbaf64418a16419113b022c9fcef7e8e2e24368689da2c6e5cf24a538ad6eec27c5432', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-15 18:00:58', '2020-07-15 18:00:58', '2021-07-15 18:00:58'),
	('74891aea1e057112d75b4bcf913fadea24e30b521ad6b49a419312195131ad60b7adfae85772c87c', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-25 10:35:55', '2020-06-25 10:35:55', '2021-06-25 10:35:55'),
	('74ff4417b8848a780b14cdcf688154def363f32f557a8a6f53214712576a26e75b0ea4f23459bd0a', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 05:43:11', '2020-07-15 05:43:11', '2021-07-15 05:43:11'),
	('75e9fcc16f4e21d4bd01eba928df203b481b101337e8e40adefada7fe4dc6e2af7c57069b67f22c5', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 12:42:03', '2020-07-07 12:42:03', '2021-07-07 12:42:03'),
	('76410833b716b30e46cf5df04aaf0b2e08fe7dcb480649ff7fdde1a7ae43cafc06add4c6a95a4f2a', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 09:22:20', '2020-07-16 09:22:20', '2021-07-16 09:22:20'),
	('764b3a9fca9133077a9381d61c4c4f9fcedbe55bdcb49d4a5fd240e6c759f5a6ceaaa74147b50fc7', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 16:43:39', '2020-06-23 16:43:39', '2021-06-23 16:43:39'),
	('767dccd02f42d557c0cb9db1034b4d211988bf0d1f52aa3d7d9e1a0622cd9b31e5deb6cecca8536c', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 17:51:23', '2020-07-09 17:51:23', '2021-07-09 17:51:23'),
	('77344f8d6c44e4b8c2b29d50b837b7b6a5f8173cb8543b4c0799fccded833e1e319a2fe4b3fae7b8', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-16 19:41:30', '2020-07-16 19:41:30', '2021-07-16 19:41:30'),
	('78169f9f00a8d5911a548d0950a5c8e94d1d9fe0640b50355f4564aadca0b9b67a04441e746a45b4', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-13 01:50:44', '2020-07-13 01:50:44', '2021-07-13 01:50:44'),
	('79a33879c0de42a29d1e860456d41319bc8bb81c787adfac10764c019413d6b87ac23522befda0a1', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-26 21:03:50', '2020-06-26 21:03:50', '2021-06-26 21:03:50'),
	('7d4ca95ff4e15065d5764f0775378e121402b65750499d64ec89489ff8cb8e7da5f6ebde92268ae2', '30ac5c22740a4e6eaa1a640386aac399', 1, 'authToken', '[]', 0, '2020-06-27 12:56:31', '2020-06-27 12:56:31', '2021-06-27 12:56:31'),
	('7e545dffdca373679e1870e462aee1567fc51501979c2421e5472c813e80348d56d5e5ee81ac5a93', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 21:49:09', '2020-07-13 21:49:09', '2021-07-13 21:49:09'),
	('7ede5253c09bf28e996a5452223082a4660351ffbba960a4ca29995258b927064ac0d52471658b12', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-13 01:43:49', '2020-07-13 01:43:49', '2021-07-13 01:43:49'),
	('7f3a2eb6b7f23673915927076fd40f3ab0a36e936368e2bb8a7343146f2205a4b55fdf8b2bc487c6', '6', 1, 'authToken', '[]', 0, '2020-01-22 06:11:58', '2020-01-22 06:11:58', '2021-01-22 06:11:58'),
	('7f51b53bab335a0e432647b73bdc7dc53c91b815133986f7faab080c5cce089c78b77ac0e0aefb40', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-16 09:04:44', '2020-07-16 09:04:44', '2021-07-16 09:04:44'),
	('7f904e095794a247e82a79cd5cfa425420d10b4e046b0377046f74e45c7c1f1ed136122e79233aba', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 22:21:37', '2020-06-30 22:21:37', '2021-06-30 22:21:37'),
	('80b6c4ccb143b2964092f402128e33a35e0b4db619d6e9b1eba37cc2f8a8bbbd30253bd09383d760', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-15 10:45:44', '2020-07-15 10:45:44', '2021-07-15 10:45:44'),
	('81dac73b9d14abdc3480afbad12f1f64bf5fe79a9dc7c9ba504577518cb18cdd223d4d98929edf93', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 08:49:14', '2020-04-10 08:49:14', '2021-04-10 08:49:14'),
	('821c3c500113aed16bbc0d8e5096c1dddf5568fb485499198b7a2f2229749de98043b7e4c53fb6dc', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-05 23:12:29', '2020-07-05 23:12:29', '2021-07-05 23:12:29'),
	('82bf3de7391e4f9c48285e90b7f58c3721cfa7674673c4a7a4d4a244e08943e4356b966f97501057', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-14 17:40:02', '2020-07-14 17:40:02', '2021-07-14 17:40:02'),
	('82e7106591acdf04c50dee644d00a62210134941f1cdd0e873d6e6aeb0d568817e73fa6023143e15', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 23:52:32', '2020-07-12 23:52:32', '2021-07-12 23:52:32'),
	('84c245303e274d3c12961d5cb11b8824cb9777011ef2a4f50f69ac1536c44827c3617884f1dff870', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-15 21:58:20', '2020-07-15 21:58:20', '2021-07-15 21:58:20'),
	('854ba3f1cd286e5db0851644e1a32588529d7fc7485044bdde373cf30735586b12128c90d645a5a0', 'fbc32990f6ed4d798fd183bc3313696e', 1, 'authToken', '[]', 0, '2020-06-27 07:40:57', '2020-06-27 07:40:57', '2021-06-27 07:40:57'),
	('86a23123ec8e32f0c6ad0a9b76e0990b495506817bd668a5e75f0252242040504303785c7d695de0', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-15 00:51:20', '2020-07-15 00:51:20', '2021-07-15 00:51:20'),
	('881e181bf3f9ed9ce288ed14ca57c709e4462af597d503fdd954126c61c420c9235db177d92ea317', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-27 12:00:44', '2020-06-27 12:00:44', '2021-06-27 12:00:44'),
	('8895a32b624386f18cfcaabe8812cf17f328744e2ecadd12c0b9bc5af0fa3c4589073beb0bba3948', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-16 00:50:01', '2020-07-16 00:50:01', '2021-07-16 00:50:01'),
	('8afba425c937b00a89e4e0667b6a37f53edc23696f410f3899a2cf32b18021d388b335a8eb929f22', '1', 1, 'authToken', '[]', 0, '2020-01-13 14:37:49', '2020-01-13 14:37:49', '2021-01-13 14:37:49'),
	('8bb0bc240bc97509ac95450f124b90c23450f6af9d0b2db32c66448edbcf0ad299e3d810a25f81da', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 00:40:32', '2020-07-13 00:40:32', '2021-07-13 00:40:32'),
	('8bef328feb40eda06bbb55951c0c05bce4181822f0b70efc7bf3c8ec25358b0064c1b52f730e530f', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:30:49', '2020-07-13 00:30:49', '2021-07-13 00:30:49'),
	('8bf37dad050b3021e548f1710b258af9f734dfa713070a31687e876948d7724ba2cf17fdadfe4367', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 01:34:14', '2020-07-13 01:34:14', '2021-07-13 01:34:14'),
	('8c7b90f38ff2c18dabe8ec3df02f7d8df9a0c216e8feaec4a57778bbe5414b451e55b673f50ba7da', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 23:55:54', '2020-07-13 23:55:54', '2021-07-13 23:55:54'),
	('8d0d5ebe8e010cadb6894a966b5ee038e0f86f878e0b94d67d60ccb9e808e67273a03e6e3fa4102c', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:53:48', '2020-07-13 00:53:48', '2021-07-13 00:53:48'),
	('8d4cc1619b68a3e087d6c1ea24106cbe5503ce5b98a03b4989bba7c687bf03b4303063919c871e24', '3', 1, 'authToken', '[]', 0, '2020-01-15 04:31:51', '2020-01-15 04:31:51', '2021-01-15 04:31:51'),
	('8dcb97470b240ed678c4325c6d9e0084bb3023aba5a7928f909e0b8e90feabb6331c81e49ea2381b', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 14:50:13', '2020-07-13 14:50:13', '2021-07-13 14:50:13'),
	('8ed5db0a035aac122cb3c232f93552cfd458c14d9fcc8f6ecc75634e9b41d14990a8bf058b96eb39', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-02 04:42:17', '2020-07-02 04:42:17', '2021-07-02 04:42:17'),
	('8ef975acf478b9fea45336b0a567b7b08f360a438c1e51ff3cfce4daaab61ba15c39e78ea336e052', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 15:57:13', '2020-07-13 15:57:13', '2021-07-13 15:57:13'),
	('904e0c527392fcc9bb3bc606fb30afc9cfe500f3e1b4a39725ad65474adadb14cc07af71b966c3b8', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-09 21:31:25', '2020-07-09 21:31:25', '2021-07-09 21:31:25'),
	('90d4b9b947beb6033e10c2ef8493b50e8ca4da5bfff88fab4edcc4a55f07aeb8a448f99119961bd9', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 21:55:24', '2020-07-13 21:55:24', '2021-07-13 21:55:24'),
	('915a1411c7ba2ed0af6bba79ee2cd49fe77a145eff06902fb419596010f765ae885ba962ad65f3d9', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-17 06:02:10', '2020-07-17 06:02:10', '2021-07-17 06:02:10'),
	('9250c4508ee48ee83290b881b23a11f7e049c223508df9a117e94b46ec33c05cab5d8f76e99c5ce8', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-12 23:40:06', '2020-07-12 23:40:06', '2021-07-12 23:40:06'),
	('9348e8aacf58ada8f119bde157b025a1eb9b309e2672785fd643e3b21d702eaac9864947ee2e5683', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-15 05:43:33', '2020-07-15 05:43:33', '2021-07-15 05:43:33'),
	('93c07c7a30254fc33c3d5ca7acb05f9ce5a60c51174eaf01e7d5beb0bae667de85f09dd9aed2f43a', '2', 1, 'authToken', '[]', 0, '2020-01-24 01:07:50', '2020-01-24 01:07:50', '2021-01-24 01:07:50'),
	('940586d0dbbbac08eebe0ac1bdafc17ea2436207663bea4fba43a69e7f4e262afdbbf23c2e9176b0', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-14 00:35:56', '2020-07-14 00:35:56', '2021-07-14 00:35:56'),
	('9462b3ea909e8f0b13eb097cff3f9245d3151f002a11f4c2ff1a25f2f1ef064769c52a5055dd89bc', '2', 1, 'authToken', '[]', 0, '2020-01-15 15:42:24', '2020-01-15 15:42:24', '2021-01-15 15:42:24'),
	('948b2d28d2f22f7c293f130b540fbeabc3dfd82d02344e1000b8f5d897e7737a089a88c31d3b1226', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-09 21:05:56', '2020-07-09 21:05:56', '2021-07-09 21:05:56'),
	('94a830ca18a359ed55df9252a29e0489193044769beed81be8dc323b7bff8a2bba8ac2f474e6bc4e', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-07 22:18:39', '2020-06-07 22:18:39', '2021-06-07 22:18:39'),
	('94ce76b03807639d1fc49ffb32bf6245787dce584a0fbee9f3ddd80965781649dcf954303760a1cf', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 12:36:31', '2020-07-07 12:36:31', '2021-07-07 12:36:31'),
	('94d6d007c0577f6fb88f89c730928a4998a48c7ee86309bb3868a54153e1daf17b054f6d92c56cfe', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 21:44:19', '2020-07-13 21:44:19', '2021-07-13 21:44:19'),
	('95212ead96f0d7a0e300ed6ee7046ae48a3c5128535c03b344ca1bf86b83f2f1666905c448169275', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-11 14:54:13', '2020-06-11 14:54:13', '2021-06-11 14:54:13'),
	('95b2e02a5c1a6733757089cc5c099c721901ef95e8c98b83cd72ffb755da4d661370b22da58b1c99', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 21:21:42', '2020-07-13 21:21:42', '2021-07-13 21:21:42'),
	('95d22533dc16afe2bdfd1580639b04da9c9653429a8b17de3342ef3efaf6b68219391ba3a1a5f770', '2', 1, 'authToken', '[]', 0, '2020-01-13 14:49:43', '2020-01-13 14:49:43', '2021-01-13 14:49:43'),
	('95f114b3cd116d8b974fd1496409aa6bef28e189d1f2247a780c0b5375d8cfda2a06ee2a7eda0c07', '405211bb66b3418dadc3ff1c82b4611f', 1, 'authToken', '[]', 0, '2020-07-05 23:34:05', '2020-07-05 23:34:05', '2021-07-05 23:34:05'),
	('973b9fd97ed1ccaadda799acbaf0e782cb52eb7734c5c3b461fa61b1e100b84bc5ddaa940b5a1e18', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-12 23:42:23', '2020-07-12 23:42:23', '2021-07-12 23:42:23'),
	('9796b57087efc1c258992faf0924ae398976200f8ab6f6ed23cad96e1c85f569e0f262060160edee', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-25 20:48:47', '2020-06-25 20:48:47', '2021-06-25 20:48:47'),
	('97a29e995554d2d97d674234ac34a2fd76770845394696d7f3ff647c2cb431f162622a54019cde2c', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-25 22:14:43', '2020-06-25 22:14:43', '2021-06-25 22:14:43'),
	('97d46b17a85e500a3028b2df4726eecfb5632ca6e413c364e631793ca789e4825e128fc08c4d0966', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-25 22:12:18', '2020-06-25 22:12:18', '2021-06-25 22:12:18'),
	('97ed4b7a56479154de73e91268edcefbb3d50754c49f3cfb9b277ec47c8e9b67bc3d17cf1af20971', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-15 00:16:26', '2020-07-15 00:16:26', '2021-07-15 00:16:26'),
	('983978b8a967538139a20a959c6368926c92dd3c6fb996defe7423ddb2d9b199aebdf9292cfe5195', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-26 20:51:36', '2020-06-26 20:51:36', '2021-06-26 20:51:36'),
	('998caed7b5630ad9b697b98315507e8fcf967ac8fe628531eb0c5dc2438beb1ee1a374ab9d4c6e05', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-16 02:53:36', '2020-07-16 02:53:36', '2021-07-16 02:53:36'),
	('99b236197b92ec6578a13afc084fa6f17f8b4f5c5c6cf7840c40a0b138c9bde568c235fb0eb2c561', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-27 19:13:41', '2020-06-27 19:13:41', '2021-06-27 19:13:41'),
	('9a3a46afd84e1168e8bd3d929e74bc7476c15997b2e116689c5a42149fddfdf5711fae15590ad188', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-12 03:02:54', '2020-07-12 03:02:54', '2021-07-12 03:02:54'),
	('9c73cc57d8ebef860ecee9cfd72530db61ec51fa518fd9a1a2b9f3b4d225319f60f762cc38ba9aa3', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-14 19:20:32', '2020-07-14 19:20:32', '2021-07-14 19:20:32'),
	('9d3507350a997cfdeaf5b13843bbaf05dfd5d130d644ba6a524e5a45496c99bc3169d10e397dd045', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 21:14:07', '2020-07-09 21:14:07', '2021-07-09 21:14:07'),
	('9d47982f4c286f298c2ec8e65a370d1637aa3eb7043010820ef7a93ed6aea10160a45d6eee098581', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-14 17:24:46', '2020-07-14 17:24:46', '2021-07-14 17:24:46'),
	('9d665cf2d32937f8716d53748831d17af50478bb0e33669142aaa80b6b6d6100c1b64d6d3d72dfbb', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-16 14:54:46', '2020-07-16 14:54:46', '2021-07-16 14:54:46'),
	('9dfd6ce9e94b516228fe482735fca3c6e72fc07e6061d63a0b01ea8ba920924816c54d8d8cbc2b9d', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 21:19:09', '2020-07-15 21:19:09', '2021-07-15 21:19:09'),
	('9f67e24cbc918f592c44702932d1bcf628e0b694e748d3a37b339a29eb7c8cb9a4cb0aed7c8af9c2', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-14 00:36:15', '2020-07-14 00:36:15', '2021-07-14 00:36:15'),
	('9fe9cad5f218d7867ba456452b207d7a213f2d1b3cf99f4b2cb6e9ad3f62feb6176d215b1480815d', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 08:50:01', '2020-04-10 08:50:01', '2021-04-10 08:50:01'),
	('9ff42ed9d9377c449afacde1b53a650d7ef1e058d37ee5003f7d47f32179bce5c935dda89d62b233', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-14 22:05:35', '2020-07-14 22:05:35', '2021-07-14 22:05:35'),
	('a026cab975d1a9fe750b444a36733770452edeaf22cee93bf607314117eac5021f919a016e829a14', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 09:48:44', '2020-07-13 09:48:44', '2021-07-13 09:48:44'),
	('a07ab67f2de418348e60e5baca2b417d1d0ee7b4bf6d6437d8f93c315682776f9f2da151ea692c64', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-01 21:47:10', '2020-07-01 21:47:10', '2021-07-01 21:47:10'),
	('a0998bd5ee50a0a0529e8ab6a18c72b7fe31ad8a0638f43650a1cbfbbb51dd7375fde980257c1804', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-30 19:55:28', '2020-06-30 19:55:28', '2021-06-30 19:55:28'),
	('a0a79a7416f83d16c8a43d55506da843607342686edd24a2e7b9c077b23914f0a69860490432aaae', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 00:53:13', '2020-07-15 00:53:13', '2021-07-15 00:53:13'),
	('a0ca093be3703d52ec0b8a3f21c6489d836d4988eed2e7a0947cad60fb2c334af523061ab175d453', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 23:55:28', '2020-07-12 23:55:28', '2021-07-12 23:55:28'),
	('a222a3e777f425ee6fef0f0815cc6e194215b4c0435a41becee2da73ccc2668e4642549d426d4cd4', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 17:26:31', '2020-07-13 17:26:31', '2021-07-13 17:26:31'),
	('a35afb11d03e383df07d0f9f9a2ef7f27ade21b43fc692868d0ea97995a8a70490760d237553bf58', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:17:14', '2020-06-23 17:17:14', '2021-06-23 17:17:14'),
	('a441d23ab231d7439b8dabc178ef0e6c8495b2ca1f8d4dff581ebed7be026427b881bbdd09f64f72', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-02 06:34:51', '2020-07-02 06:34:51', '2021-07-02 06:34:51'),
	('a48bcaab59104f119bc61dd0e7349152786e4a236e7522e5d7a8df8a1d0188959a2b8562c5454608', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-15 00:18:44', '2020-07-15 00:18:44', '2021-07-15 00:18:44'),
	('a652b2f27741104d5cd7ab9cc4425b508c0f06b62f4683f5dcca501a66877d53804eea0a08f0370b', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-09 17:34:09', '2020-07-09 17:34:09', '2021-07-09 17:34:09'),
	('a776348a5a19c46a7469ef960608bc0c7bd0bea32243d983a1d7c4f4d637b7780a94822c8b714c24', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-12 05:40:05', '2020-07-12 05:40:05', '2021-07-12 05:40:05'),
	('a8a7b24e41d1b865861aaf7c0b180ddbaacf26282e76f04d48bbe0e18712bf47370009ff88c77e67', '2', 1, 'authToken', '[]', 0, '2020-01-24 13:26:55', '2020-01-24 13:26:55', '2021-01-24 13:26:55'),
	('a923036bf1e19b6674e8203a62373328904774a02129b89f0f198ddb406658b5d7d4af083b2c401d', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-14 20:06:29', '2020-07-14 20:06:29', '2021-07-14 20:06:29'),
	('a96420f56cb98a07937ab8d2b9b1f9a30b790fc10da3b58919440fbdb13aaa59729a432343bf2b62', 'fbc32990f6ed4d798fd183bc3313696e', 1, 'authToken', '[]', 0, '2020-06-26 06:55:49', '2020-06-26 06:55:49', '2021-06-26 06:55:49'),
	('a9b93fc0c267102457fd20ce1b34f599d82c7789ace2d7a20f1c7823ba59bf8375061ed6dd3fe762', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-16 14:40:09', '2020-07-16 14:40:09', '2021-07-16 14:40:09'),
	('ab6dbb1a757f141d97e0c8482dd4ebf8ecee24ea387b37df2511b3d5710bfd2e149e11f443187058', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 12:36:56', '2020-07-07 12:36:56', '2021-07-07 12:36:56'),
	('ab7e966ffc546ee5c8cd71933288454a4daf759647b999ea9c8cc4010021b93cceb5e3df64984636', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 21:49:48', '2020-07-13 21:49:48', '2021-07-13 21:49:48'),
	('ac25b454c0583f41521d03eb1e62eb5649d48b864c39d1713621db5e15646ffec617408b3d5f5fea', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-19 14:30:08', '2020-07-19 14:30:08', '2021-07-19 14:30:08'),
	('ac505febd432c279388c9dc73d5f0ab167133f9ad9cd8bfed0a40fa487af4c7020894b2e008321a8', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-14 00:00:56', '2020-07-14 00:00:56', '2021-07-14 00:00:56'),
	('acec025fd49a22daf3fb37cd3ad9ca4ddd8d0acdcb81d972403a0a03d5fbdeee7066bb75d307df2c', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-15 13:36:05', '2020-07-15 13:36:05', '2021-07-15 13:36:05'),
	('b02983326045460ccf1f2598e27336e09398faf9475f79a336815756e85ace323ade4edc4f1901af', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 23:44:38', '2020-07-13 23:44:38', '2021-07-13 23:44:38'),
	('b0d1e802c823ce3d8cad4059d903b8aa570320a0b1a0800ea84f63853d41b456403f27152dd43cf9', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-27 12:07:39', '2020-06-27 12:07:39', '2021-06-27 12:07:39'),
	('b15fd6a16c4c3908d1979f372f55d160f4abb62045150ed80b33d3c98978afd7a522359276bad64d', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:18:20', '2020-06-23 17:18:20', '2021-06-23 17:18:20'),
	('b1803beb290361f4d08269cebb887ee1043a6b823762ac84c81c4f766490604b178c3fcde3ec2841', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-05 23:13:00', '2020-07-05 23:13:00', '2021-07-05 23:13:00'),
	('b2b1ec53afb4b51454cf375f3c6c014b3939da40a56b0a6382a7521d0a6d125524b421593badc4c5', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-12 22:13:17', '2020-07-12 22:13:17', '2021-07-12 22:13:17'),
	('b3b3d44ee8cdae442d78e55e2a1e269c5ea705d0af8859a85b75afa225d7265709a73429b5d94b63', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:40:59', '2020-07-13 00:40:59', '2021-07-13 00:40:59'),
	('b3b6fa27edf7ea76caf3f171c8971dbad789e18c08f313236ce1dcea2f56354d98668f132483199a', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 00:54:50', '2020-07-15 00:54:50', '2021-07-15 00:54:50'),
	('b411cc42779e0ee43c985a60a5340b449ca5086d2871e146ee9bacfa02d918542a91b2db2e9e3f7d', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-30 14:30:37', '2020-06-30 14:30:37', '2021-06-30 14:30:37'),
	('b5697807da050e8111561f5e3dcb53bbeef64e375d08f42e893844220e526043f4138bdc9225f1f0', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 10:46:02', '2020-07-15 10:46:02', '2021-07-15 10:46:02'),
	('b581618ae24681b37266ccc0390b95cb7023c6fa15ea099aba03b2214eac5988c556d00cf09fcbde', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-16 01:37:28', '2020-07-16 01:37:28', '2021-07-16 01:37:28'),
	('b58fab02e39a5400eb05cc8e2af71aee74bcbe3eab5601f27d0a11ca8af3402332656c925f40b984', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:21:15', '2020-06-23 17:21:15', '2021-06-23 17:21:15'),
	('b5a8a10b855fb6e17481c705649c9953c812b7603e60d4d56ac4763874c1ef51cb63cda81e785e3d', '892b3cc0b40443dc8a0ccd516854cccf', 1, 'authToken', '[]', 0, '2020-07-19 12:40:50', '2020-07-19 12:40:50', '2021-07-19 12:40:50'),
	('b72db6a5099dbbd139a3388423470049a2d968786baf9c68ba4bccf38ed8f5b2a88e1404d5d7856b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-09 17:29:42', '2020-07-09 17:29:42', '2021-07-09 17:29:42'),
	('b760588a08f43f55f1b4c78656727e3e9faff02a0759b3a6cf3b76e045bc3100f8b936defb16cac4', '3ce67ea225ea4dd489ab4ac4f0999d72', 1, 'authToken', '[]', 0, '2020-07-16 19:25:13', '2020-07-16 19:25:13', '2021-07-16 19:25:13'),
	('b7e5da770f21836173c4d484861aa385582463f4181898c24116fac52c6040b2896b4abbe5027370', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 14:05:25', '2020-07-13 14:05:25', '2021-07-13 14:05:25'),
	('b80e4bb570ebe8c1a97d28096cb04f67dd466af8c952c9b792dee769bf8ca41acc427ab5bf00a817', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-14 01:59:33', '2020-04-14 01:59:33', '2021-04-14 01:59:33'),
	('b8806b587b57c72a3b7e77fdcf24a4df334fb2f7d62a6db5c3cc3c58a6c7aa226491fcb81ff88e38', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 01:13:16', '2020-07-15 01:13:16', '2021-07-15 01:13:16'),
	('b8e39679dcd2ee687d7204515975154f63a91a4ef78937655ff250284c053be732ba696a92f11efb', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-09 09:45:23', '2020-07-09 09:45:23', '2021-07-09 09:45:23'),
	('bb7443372c33f735b5ba59d9e8cb01965049a978a119af60e6f82ee0ba34ac4ee455f7636e39e2ec', '3160b5cef10542449e38e01990f67f93', 1, 'authToken', '[]', 0, '2020-07-09 17:33:15', '2020-07-09 17:33:15', '2021-07-09 17:33:15'),
	('bbccfc83768b78602ceca463650f29750634309a0a9087e3958efec1bd977acae30c3553eba33045', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-16 21:53:56', '2020-07-16 21:53:56', '2021-07-16 21:53:56'),
	('bbd09e74166768d8c42e4b7e470c3e5c16ccf8cbab9ad0f105175fb38fb5a300c2fc47561d675551', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-12 22:15:09', '2020-07-12 22:15:09', '2021-07-12 22:15:09'),
	('bc17312861a6f93985a8bc63c86b380da9b6a9bb11018198238bfde867b7e75260749643e76d624d', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 00:38:20', '2020-07-13 00:38:20', '2021-07-13 00:38:20'),
	('bcfe4db21b5f7fb96c69df55b328b082d4527ee90e18397bb42d1c5f0a48a3448846d788026f99e4', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-14 20:13:22', '2020-07-14 20:13:22', '2021-07-14 20:13:22'),
	('bf2872a217ee9b82dc1c2c77e2f1f84b95c389ae0d08e0d41a90c60096003b5b27e5a38d502a86a0', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-11 20:17:00', '2020-07-11 20:17:00', '2021-07-11 20:17:00'),
	('c14083bf1c6b03fcc587481ac54d91976dd1755cd79e252957831e6262558201087a08f469edc648', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 15:00:25', '2020-06-23 15:00:25', '2021-06-23 15:00:25'),
	('c304a06d97c9b7082d7aa63b276d0dd447dce95271f6ebf85fc3523e9f9e1df79aa1fa299a709db5', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-09-19 15:00:07', '2020-09-19 15:00:07', '2021-09-19 15:00:07'),
	('c369769df26523ed69f53f6993f2fe741589971372db71de1effd410390c7f575ebfe8f84020268e', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-25 17:14:11', '2020-06-25 17:14:11', '2021-06-25 17:14:11'),
	('c490979868825968fea82f21c9bca5c334abaf91f82815af3af35337b87df12f5fdd4c31a1b88cee', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-12 13:05:02', '2020-07-12 13:05:02', '2021-07-12 13:05:02'),
	('c50c7c198401fc22d71da87844c2912e64a38a0da11e7a41c3256df9d64486d4a5e6d388c2ec9798', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 01:08:50', '2020-07-15 01:08:50', '2021-07-15 01:08:50'),
	('c5141addc57001b85f719009ebd5cd5bb757622a470316f089c131ebceb19f0784868c9be6e50088', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-16 21:51:09', '2020-07-16 21:51:09', '2021-07-16 21:51:09'),
	('c5230921ff145def8c352af4a7ee6dcf140ced5b47e78ace24a6f077e90ce8e765aaa237c9ff0531', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-14 20:11:17', '2020-07-14 20:11:17', '2021-07-14 20:11:17'),
	('c5b9cbe284c5f586828518968fabf7bb70fb9f1ccaa8aef747917476524cd2539945c3d3f9f33062', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 22:35:40', '2020-07-13 22:35:40', '2021-07-13 22:35:40'),
	('c5f6ba68f5e4019a0c1eae317bf98b751963aad81ecf2739ebff963f5c8bc4ca04803a52286c7f97', 'e15960f819d7451c8bd985764a70f6a0', 1, 'authToken', '[]', 0, '2020-01-22 16:25:13', '2020-01-22 16:25:13', '2021-01-22 16:25:13'),
	('c76d5a63684a5c40ae69bfb092f1a91e67bcbf5eabda4c100aa0a4b402fd8fb72f05bb37500a5650', '2', 1, 'authToken', '[]', 0, '2020-01-14 13:37:01', '2020-01-14 13:37:01', '2021-01-14 13:37:01'),
	('c82c9f8ea2f7f44cec45a03dade4c3e7ce3d379a59acd0a622d20ed7be5b3d90ded25055e7546510', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 23:46:10', '2020-07-15 23:46:10', '2021-07-15 23:46:10'),
	('c93533804f26e1cb45960136eefa5f485093893fa3094e20feea9dda38906ed64ea9d3b443555eaf', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 16:53:18', '2020-07-16 16:53:18', '2021-07-16 16:53:18'),
	('caed3005ff39f5d995cdea7c92942428b59dc5fdce37bf9f5f66169091c93b66ebcceebcf37f90b5', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 01:10:58', '2020-07-13 01:10:58', '2021-07-13 01:10:58'),
	('cb15289548630e97fcda56380607966c153a0fb0d34d912a1865229c47352f3c51ddf8d2db763542', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-16 02:11:20', '2020-07-16 02:11:20', '2021-07-16 02:11:20'),
	('cb416845103610f2e76e638fd0954991a1471834f29c478e745b8ec9313306d48dfa6b4c6ac746f2', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-07 11:25:12', '2020-07-07 11:25:12', '2021-07-07 11:25:12'),
	('ccc0c55ea0e35e722e15c247671ebd0aa304ef0a4056cbe3e97f508ebc383fc6ee5202cfe3bf5097', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 08:25:50', '2020-04-10 08:25:50', '2021-04-10 08:25:50'),
	('ccd2c64459c5a1e0fd4af1b4cacc3358385578bcaba7ad09649514fec5cf75ccd007d51df3b85398', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-23 17:22:21', '2020-06-23 17:22:21', '2021-06-23 17:22:21'),
	('ccec58b9e8a93c122dffbb1fa488faee50d91d952a93d8498655891e799d4cd1c394e61be2aa391a', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-16 14:16:30', '2020-07-16 14:16:30', '2021-07-16 14:16:30'),
	('cdab383fbf019f99f81780687ec4bd58a05043fa9a5a682a30653cb41e2fb6ff88792df24a9185d1', '33ede602307a440a91817e28fdeb415b', 1, 'authToken', '[]', 0, '2020-07-09 10:03:06', '2020-07-09 10:03:06', '2021-07-09 10:03:06'),
	('cfc53ec42b8a17b10792dbdea3c269c9ea5498b88357b4ed91a7d899ac03863126f472337be043a4', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-16 16:53:59', '2020-07-16 16:53:59', '2021-07-16 16:53:59'),
	('cfdd1e0f0d9b685a7b7825fa10755b9a0eaaf65010e021011702aa256e8e50e2015b34ab12eb3d02', '19e367b357df4fb984384b8150ecd750', 1, 'authToken', '[]', 0, '2020-01-22 16:26:21', '2020-01-22 16:26:21', '2021-01-22 16:26:21'),
	('d00ffc8ff5547b6b7c585ec81503106a1eb1e860dc0363ef92328e91120c2210f4ce86905b27fad4', '4cd8e45906e1407b82ad7cd6b375c803', 1, 'authToken', '[]', 0, '2020-07-15 18:02:51', '2020-07-15 18:02:51', '2021-07-15 18:02:51'),
	('d031997a3a573e924e3100b4e230c85ef7f5e990b674bdd21cf6ab5fa738bcf563ecd0e1e020a21f', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 01:22:18', '2020-07-13 01:22:18', '2021-07-13 01:22:18'),
	('d06acb4152177570a06f66ee26855ea9962d0fe44f22fabc501d0f16602936b35b3be049113ffa96', '3c19757dc1b742b1af51a6ee9e6ba79c', 1, 'authToken', '[]', 0, '2020-07-09 10:02:33', '2020-07-09 10:02:33', '2021-07-09 10:02:33'),
	('d071499fd3627ddd4eb48d93f1664c36bbf2963d25aa8301c33c3e9a8a7774c5277de7c9dd1f9437', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-01 18:59:43', '2020-07-01 18:59:43', '2021-07-01 18:59:43'),
	('d0b43cd42f58c9d9cbe3a77c838f03023dcd01f45004d3c10ea59d65b1274f5f9b08e7b12402e912', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-15 11:05:22', '2020-07-15 11:05:22', '2021-07-15 11:05:22'),
	('d102bfe1f6b41281010496c8398e968849580e5ab57731533c57d677da328bfec7db6f03c0d1bea9', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-12 21:05:58', '2020-07-12 21:05:58', '2021-07-12 21:05:58'),
	('d3020323a0522b39b0daf73c6cd7024738c71ed4eaf53dbc48800c54ae6a71be3bb15aef7308abae', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-25 10:33:36', '2020-06-25 10:33:36', '2021-06-25 10:33:36'),
	('d33c538ca4f43fdbf7b8cd9f0457372d200514938ae8806fca90b6def1ce60c8fd9212841795f209', '4', 1, 'authToken', '[]', 0, '2020-01-15 15:38:14', '2020-01-15 15:38:14', '2021-01-15 15:38:14'),
	('d34be0b330b8b239be3f05d2c23271b3bbd88be43678abe05c4da5c368e299216b8bd0066b48556d', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-16 14:14:29', '2020-07-16 14:14:29', '2021-07-16 14:14:29'),
	('d3aba96366f1d5e534b7ed6018c85ce7587f2136e40629aca3062b866219a0e691a34d643d27a10b', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-27 19:03:18', '2020-06-27 19:03:18', '2021-06-27 19:03:18'),
	('d482570ac483785f30e9441a7b0f98f0ce17583d806311f8d8612d88a6ba5871d48c4eaf86992389', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 21:20:28', '2020-07-13 21:20:28', '2021-07-13 21:20:28'),
	('d5d81cbc989ba0802d8c4b01168734521e9141c2eb634e7cc3d91b19f7fdd5214145964792aa62b5', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-16 10:28:58', '2020-07-16 10:28:58', '2021-07-16 10:28:58'),
	('d90237c229b64e73b40798283371965131c5e2bad51323549522448d39babf87186f3a3ceb3dc222', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:22:22', '2020-07-13 00:22:22', '2021-07-13 00:22:22'),
	('d9be02f27ee044903ac9d2bf3f27f9b458179aecf323721a8e12c9ebc40a2b7b1cf0f4970defd13f', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 15:57:33', '2020-07-13 15:57:33', '2021-07-13 15:57:33'),
	('da059686e28f1bc49f316b7ea8cdd7d3a6d70054956aa5d31f06b0582671a85ac9b8c7a928faeaca', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:18:17', '2020-06-23 17:18:17', '2021-06-23 17:18:17'),
	('da5e0782155d342b9e89e1665c6069cdddb46b419cc0db1180033c23d409b032fc290b846488fd45', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-05 23:31:39', '2020-07-05 23:31:39', '2021-07-05 23:31:39'),
	('db0e680844c32cc92322bea1ac338f8526ade5ab030f06d9220f5b45e02106fa4e5825451a2782dd', 'b7a8b40c9c144a819bbc867d3d64fd52', 1, 'authToken', '[]', 0, '2020-07-15 21:32:29', '2020-07-15 21:32:29', '2021-07-15 21:32:29'),
	('db440d494dfc2b10f60174849ace1eb2e9e4d4c116c8b8e319241631c69edb232c5cb11b69995662', '7', 1, 'authToken', '[]', 0, '2020-01-22 06:24:41', '2020-01-22 06:24:41', '2021-01-22 06:24:41'),
	('db6445df4e70eccdb237ed4551215edd8588c6847a640de1d9e7ff01b3bf2cfd83aff3c792c9e66a', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 21:45:29', '2020-07-13 21:45:29', '2021-07-13 21:45:29'),
	('dbcbdaeb8bd7224eaa70d5e3c5a0574d7e7ef15e394bec3df05763d606f6c7f4c0e3120655fb385d', 'ae0ed70b200e478b83aebc44f248c5cb', 1, 'authToken', '[]', 0, '2020-07-19 18:28:22', '2020-07-19 18:28:22', '2021-07-19 18:28:22'),
	('dd1bd4adf62f28602a7bdbaa6c25dfd5f0aa13f6591f5509351fe19cb9b350cd96456811944e377a', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-12 11:26:31', '2020-07-12 11:26:31', '2021-07-12 11:26:31'),
	('dd3eda8cc4c16d7aeea33921d01eee9d184f63be1baee08d5ec36beee229b54a1689af75e6078c3f', '66f5a6e96e7f4b7c9dd8e4dd3187b744', 1, 'authToken', '[]', 0, '2020-07-13 00:57:36', '2020-07-13 00:57:36', '2021-07-13 00:57:36'),
	('de32c9c19d1828eaefe2b78406452baa753b37543e22aded39e8da994d628af04d82a4a9d0b6d268', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-01 19:26:19', '2020-07-01 19:26:19', '2021-07-01 19:26:19'),
	('debd5505a64fdf92c841bc5221afcd080775d0a765266df12cb0f03f25c2bc50ace8501e908779a2', '2', 1, 'authToken', '[]', 0, '2020-01-18 01:24:44', '2020-01-18 01:24:44', '2021-01-18 01:24:44'),
	('dec807efa710d77011d6f84a41d5f898cf5716fd3d6d3b8c04b8100d05b4f52aa386ab7de2985a21', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-06-23 17:24:07', '2020-06-23 17:24:07', '2021-06-23 17:24:07'),
	('ded01ac3a2fe98759c2676c7a8e987d6cc4726ce64181e40adea27ca61200b028ca0c177abcc38e2', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 23:04:23', '2020-07-13 23:04:23', '2021-07-13 23:04:23'),
	('df435a6aba9a6f291244c6248eb3fcb54650329bccaadf5cde04b6fd4215decb4ee03d34821b4cfa', '2', 1, 'authToken', '[]', 0, '2020-01-22 06:09:45', '2020-01-22 06:09:45', '2021-01-22 06:09:45'),
	('df56463e527c178c06f727dd289567f80899276d0721b81d2a9112d8b382929b346f9f67ae87bbf8', '6b5a975c6bc34bdf82abc8f6df995709', 1, 'authToken', '[]', 0, '2020-01-22 15:12:10', '2020-01-22 15:12:10', '2021-01-22 15:12:10'),
	('e02852fc939a16a43b8f9fe600aa0ec45f970b1625f72260034f30dc5f51a9367d9b2aec23869554', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-12 22:14:50', '2020-07-12 22:14:50', '2021-07-12 22:14:50'),
	('e24066d6a52b2cccb3597dc8bbac7fdb7f6730e70703e5c47bc80875314d0bd31b2c8ab0a4550db6', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 21:49:50', '2020-07-12 21:49:50', '2021-07-12 21:49:50'),
	('e2e782e753e030d3554dced22363002eb583afa26c600916b417a48258fb82166248ac2942fd19af', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-15 00:17:00', '2020-07-15 00:17:00', '2021-07-15 00:17:00'),
	('e30cec681e023a08892cfeba5596ba4dd83ef3768def7e7544d92a524ca61f58eda19def4d9c01a7', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-14 01:49:25', '2020-07-14 01:49:25', '2021-07-14 01:49:25'),
	('e30f037513c23eed43ec50beb79c3052e7605b08ffe5b6ef3e79ac2693e37f151c1180e4133688a2', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-15 11:01:32', '2020-07-15 11:01:32', '2021-07-15 11:01:32'),
	('e31e13ad0fb98b3dd9e7ffc7a44f77bc04bc9d98e711b30a737bac4e363686f1fd1ff7c6736d506b', 'c258681d1c6f4621b777c3d6f73b0c60', 1, 'authToken', '[]', 0, '2020-07-09 18:12:00', '2020-07-09 18:12:00', '2021-07-09 18:12:00'),
	('e336df7254e7e55be16a7546c186bffe26c66d2f9f7adff6a7d034d25dc3c71fb3b36bc1cc13330d', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-10 23:11:52', '2020-07-10 23:11:52', '2021-07-10 23:11:52'),
	('e563997adf80bf2da42ac3dbe0c08535ceb34dbd3197717c807e561a6fcfc00ada4b6c1e5d31663e', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-12 11:27:58', '2020-07-12 11:27:58', '2021-07-12 11:27:58'),
	('e70467977c8f3559bf53bb390693a2bd428c9b797f9320ea7403c81d618b773e6dc2dfce4fb6fd70', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 16:54:29', '2020-07-16 16:54:29', '2021-07-16 16:54:29'),
	('e7a0ebe5e9888c8974d0967dc42e32d60b55c01ac63c5730ba5e610f219b08f99d1c7e6c47a993f8', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-09 21:07:58', '2020-07-09 21:07:58', '2021-07-09 21:07:58'),
	('e7cdb9f699f8fd57e050f9073068b9d81bf1e10a721d492973a5ef354efa1c5e9391ce998d45809f', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 08:50:09', '2020-04-10 08:50:09', '2021-04-10 08:50:09'),
	('e7e075c57f50285a13433c0f835a9e0e2c551772e19ae9e91bf024bb282eae3dd0b18b8f325fe792', 'e1aedba9726e4a7480b6d3a06b2e96d8', 1, 'authToken', '[]', 0, '2020-07-19 12:51:37', '2020-07-19 12:51:37', '2021-07-19 12:51:37'),
	('e848d408db02fd3a03b9441a9ef53b1a646b129556749487730e7ea72df81ffac338f98e8740d100', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-06-23 17:18:18', '2020-06-23 17:18:18', '2021-06-23 17:18:18'),
	('e8ec8f33d1918270dd4806fac16de53a5c967af2affd5a42eb3b29d2f71d9e8ecf693496a78d59bc', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-15 11:14:22', '2020-07-15 11:14:22', '2021-07-15 11:14:22'),
	('eb8a269f593858202d5473848995eb8fa0ed3a72fd91bf239214b2bd9e196286852a8b23c8ad93de', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-10 06:52:12', '2020-04-10 06:52:12', '2021-04-10 06:52:12'),
	('eba120f2cc4564bfeef4710ae8302e34a5e751152c66ba48a9bc13be342966b544179f178b0a91a5', '2', 1, 'authToken', '[]', 0, '2020-02-28 13:50:15', '2020-02-28 13:50:15', '2021-02-28 13:50:15'),
	('ecdebcebb2aad86347cde359041acad022da7b1c68535a5b05a2ebaab7250a1df84561ff5ea02544', 'c154432c2c064d8383371643cf8f9ccb', 1, 'authToken', '[]', 0, '2020-07-19 12:34:34', '2020-07-19 12:34:34', '2021-07-19 12:34:34'),
	('ece27bd6f8f2745127c484a9766fc1d8da5fea48a0e8a085f45f0c032efd0bf7e6316b4901df8abf', 'e8f3cacb0be64c8a9f212cc125abc266', 1, 'authToken', '[]', 0, '2020-07-13 23:45:31', '2020-07-13 23:45:31', '2021-07-13 23:45:31'),
	('ee73612da51d0dbec7e093593a9a2e13d92a264458681f38eb4c6c15aba9d9bef8e5386b29ad4c75', 'cd8fa07888794a00bcb142f1808f8b8a', 1, 'authToken', '[]', 0, '2020-07-13 00:38:55', '2020-07-13 00:38:55', '2021-07-13 00:38:55'),
	('ef572ebb64bce07a0d4a84afc1763878ab33ab407c1b71a017547840cf33efd453b342451bf76cfd', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-01 18:51:54', '2020-07-01 18:51:54', '2021-07-01 18:51:54'),
	('f00d09b8d9add835c4ccd3f2dac7d62705ac24fb538e52162b110f04da7c93f2e189c077fd20d00f', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-04-08 00:14:47', '2020-04-08 00:14:47', '2021-04-08 00:14:47'),
	('f0135179a2d0a3ee977ab7a4ac0f50ac957bdef32b255fde081c82c2ee04eab27d1b2de5342c6e56', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-09 21:08:29', '2020-07-09 21:08:29', '2021-07-09 21:08:29'),
	('f1128f8bd70312d7cb18af274cfca598afa776f155813d370a8538bd4c3d518388b48de3eaca0cd2', '550dc3496d484fd888d0f1be273c0ec2', 1, 'authToken', '[]', 0, '2020-07-07 22:50:50', '2020-07-07 22:50:50', '2021-07-07 22:50:50'),
	('f2c37aefa8e85b9e9125382beacfcf6f289a00ca75c8f29f4308f0cf1716c7d3d30d9c674da0844a', '20652c46e2ce404996b8fa662b3cef4d', 1, 'authToken', '[]', 0, '2020-07-13 23:43:59', '2020-07-13 23:43:59', '2021-07-13 23:43:59'),
	('f78c96822cf44cfb91356871dc9a254c8dd75e9dd625805894103272967f27cfb806aee1d01d7b7e', '19e367b357df4fb984384b8150ecd710', 1, 'authToken', '[]', 0, '2020-07-19 17:39:20', '2020-07-19 17:39:20', '2021-07-19 17:39:20'),
	('fb45eb81f80dcd925daa69c95e5b41082f55fe78d638c720553275ec3b32d6fc35153da28c042c80', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-10 11:11:07', '2020-07-10 11:11:07', '2021-07-10 11:11:07'),
	('fcb2f11389c6715c951061fca924945d41bfe03e222cf4612b207526a09e67d2c486a1f46179bbaa', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-16 07:23:11', '2020-07-16 07:23:11', '2021-07-16 07:23:11'),
	('fcda1147ad18a46e651d8330ad324ac9d93fb8ead30f16de876e2caf215bf96a44b4f4382dafdc7e', 'cf175ff4c8764f35890a2838c6003ddc', 1, 'authToken', '[]', 0, '2020-06-25 10:32:51', '2020-06-25 10:32:51', '2021-06-25 10:32:51'),
	('fd1772f0f2cc33f1c6daa1a6e0dbd98041badf6675482fc0284783d6f2001097a754c0d34242eee0', '8ffa5a5232fe42c9b77b258f72ce2125', 1, 'authToken', '[]', 0, '2020-07-12 23:35:19', '2020-07-12 23:35:19', '2021-07-12 23:35:19'),
	('fd3a38b5c60f031df63ed3f0354008db998054f66063e5d515ffa24e854b68153f3d8cde62609b70', 'ea4c960c162c4618b92c39969d7eee29', 1, 'authToken', '[]', 0, '2020-07-13 23:02:01', '2020-07-13 23:02:01', '2021-07-13 23:02:01');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.oauth_auth_codes
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.oauth_auth_codes: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.oauth_clients
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.oauth_clients: ~2 rows (approximately)
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'XEbGRhN3G6Raiw1LMSpVQwRVoXBV87obm5E5y6ve', 'http://localhost', 1, 0, 0, '2020-01-13 12:38:19', '2020-01-13 12:38:19'),
	(2, NULL, 'Laravel Password Grant Client', 'P4bWhLWc8YuLy7o7lqZ3Xo3rTe7JgirVsH9h6Aqo', 'http://localhost', 0, 1, 0, '2020-01-13 12:38:19', '2020-01-13 12:38:19');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.oauth_personal_access_clients
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.oauth_personal_access_clients: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2020-01-13 12:38:19', '2020-01-13 12:38:19');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.oauth_refresh_tokens
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.oauth_refresh_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `level` int(11) DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.roles: ~7 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `level`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('cc1e3153d1054e4794792bc80828fd10', 'Director', 0, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:19:52', '2020-04-08 00:19:52'),
	('ba1dbea312c04a6f95172214e9e1f384', 'Manager', 1, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:20:15', '2020-04-08 00:20:15'),
	('81451a83df6c4044848285785491d49f', 'Engineer / Technical support', 2, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:20:29', '2020-04-08 00:20:29'),
	('cba1bb20bbeb4965a56ae9500e23dc83', 'Technicians / Clerk / Office support', 3, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:20:42', '2020-04-08 00:20:42'),
	('2830aa5f1b3c46f2938f4fa43ea6bd90', 'Contract staff', 4, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:21:00', '2020-04-08 00:21:00'),
	('12796fa38b774cffb61341e8f8b60e8c', 'Intern', 5, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:21:18', '2020-04-08 00:21:18'),
	('61eb237fc29b45e181cbfd00f012d7ca', 'Superadmin', 6, 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:21:41', '2020-04-08 00:21:41');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.sas
CREATE TABLE IF NOT EXISTS `sas` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_number` text COLLATE utf8mb4_unicode_ci,
  `job_title` text COLLATE utf8mb4_unicode_ci,
  `job_description` text COLLATE utf8mb4_unicode_ci,
  `id_approver` text COLLATE utf8mb4_unicode_ci,
  `approval_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.sas: ~5 rows (approximately)
/*!40000 ALTER TABLE `sas` DISABLE KEYS */;
INSERT INTO `sas` (`id`, `job_number`, `job_title`, `job_description`, `id_approver`, `approval_status`, `approved_by`, `rejected_by`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('0f833070c3f24ec59196b877b9cce30c', '2006754', 'send item to ksb', 'bla bla bla', '["c154432c2c064d8383371643cf8f9ccb"]', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', NULL, 'Task Finish', '892b3cc0b40443dc8a0ccd516854cccf', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:43:38', '2020-07-20 13:36:31'),
	('5c03da0400064af98428c17faea02779', '123456', 'anto brg', 'anto brg carigali', '["ae0ed70b200e478b83aebc44f248c5cb","c154432c2c064d8383371643cf8f9ccb"]', 'Approved', 'ae0ed70b200e478b83aebc44f248c5cb', NULL, 'Task Finish', 'ae0ed70b200e478b83aebc44f248c5cb', 'ae0ed70b200e478b83aebc44f248c5cb', '2020-07-19 18:30:07', '2020-07-20 13:15:07'),
	('96646041ae6a4ae597bfef36bfcb92f9', '1234', 'scchh', 'bfyhxf', '["ae0ed70b200e478b83aebc44f248c5cb","c154432c2c064d8383371643cf8f9ccb"]', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', NULL, 'Task Finish', 'ae0ed70b200e478b83aebc44f248c5cb', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 18:43:07', '2020-07-19 18:54:03'),
	('971864b9a6324c24be52e5ffa38f88ad', '202029383i3', 'jejsjeueiejejwh', 'jsjshshsh', '["c154432c2c064d8383371643cf8f9ccb"]', 'Approved', 'c154432c2c064d8383371643cf8f9ccb', NULL, 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'c154432c2c064d8383371643cf8f9ccb', '2020-07-19 12:53:44', '2020-07-19 18:43:30'),
	('f29b57b1e5074fac8bec1240f8a81717', '2006203', 'To deliver battery to KSB', '1)\n2)\n3)\n4)\n5)\n6)\n7)', '["20652c46e2ce404996b8fa662b3cef4d","3c19757dc1b742b1af51a6ee9e6ba79c","4cd8e45906e1407b82ad7cd6b375c803","c258681d1c6f4621b777c3d6f73b0c60"]', 'Approved', '20652c46e2ce404996b8fa662b3cef4d', NULL, 'In Progress', '3ce67ea225ea4dd489ab4ac4f0999d72', '20652c46e2ce404996b8fa662b3cef4d', '2020-07-16 19:27:21', '2020-07-16 19:41:41');
/*!40000 ALTER TABLE `sas` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.sas_comments
CREATE TABLE IF NOT EXISTS `sas_comments` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sas_staff_assign` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user_comment` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.sas_comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `sas_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `sas_comments` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.sas_staff_assigns
CREATE TABLE IF NOT EXISTS `sas_staff_assigns` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_sas` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `acknowledge_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_start` text COLLATE utf8mb4_unicode_ci,
  `task_progress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Early Completion , Cancellation , Resistance',
  `justification_update` text COLLATE utf8mb4_unicode_ci,
  `img_update` text COLLATE utf8mb4_unicode_ci,
  `img_path_update` text COLLATE utf8mb4_unicode_ci,
  `finish_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_finish` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.sas_staff_assigns: ~5 rows (approximately)
/*!40000 ALTER TABLE `sas_staff_assigns` DISABLE KEYS */;
INSERT INTO `sas_staff_assigns` (`id`, `id_user`, `id_sas`, `start_date`, `end_date`, `acknowledge_status`, `start_task`, `justification_start`, `task_progress`, `justification_update`, `img_update`, `img_path_update`, `finish_task`, `justification_finish`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('1fa2fb3cda3f460b9a3b2df7a1f59380', 'e1aedba9726e4a7480b6d3a06b2e96d8', '971864b9a6324c24be52e5ffa38f88ad', '2020-07-19 12:53:00', '2020-07-19 12:59:00', '1', 'Yes', NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, 'Task Finish', 'e1aedba9726e4a7480b6d3a06b2e96d8', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:53:44', '2020-07-19 18:43:30'),
	('27f76d4e5ecd43c682a612d2e2952349', 'e1aedba9726e4a7480b6d3a06b2e96d8', '96646041ae6a4ae597bfef36bfcb92f9', '2020-07-19 18:45:00', '2020-07-19 18:53:00', '1', 'Yes', NULL, NULL, NULL, NULL, NULL, 'Yes', 'ghhvg', 'Task Finish', 'ae0ed70b200e478b83aebc44f248c5cb', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:43:07', '2020-07-19 18:54:03'),
	('4e1936ff9cbd469386c569d05607c798', 'e1aedba9726e4a7480b6d3a06b2e96d8', '0f833070c3f24ec59196b877b9cce30c', '2020-07-20 12:41:00', '2020-07-20 12:43:00', '1', 'Yes', NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, 'Task Finish', '892b3cc0b40443dc8a0ccd516854cccf', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 12:43:39', '2020-07-20 13:36:31'),
	('cd71aeb6ff934043a799f515cd00d817', '4cd8e45906e1407b82ad7cd6b375c803', 'f29b57b1e5074fac8bec1240f8a81717', '2020-07-17 09:00:00', '2020-07-17 09:30:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approved', '3ce67ea225ea4dd489ab4ac4f0999d72', NULL, '2020-07-16 19:27:21', '2020-07-16 19:41:41'),
	('d3b260666cca46a7ab52bbf1e2fb30c0', 'e1aedba9726e4a7480b6d3a06b2e96d8', '5c03da0400064af98428c17faea02779', '2020-07-20 08:03:00', '2020-07-20 12:29:00', '1', 'Yes', NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, 'Task Finish', 'ae0ed70b200e478b83aebc44f248c5cb', 'e1aedba9726e4a7480b6d3a06b2e96d8', '2020-07-19 18:30:07', '2020-07-20 13:15:07');
/*!40000 ALTER TABLE `sas_staff_assigns` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.schedulers
CREATE TABLE IF NOT EXISTS `schedulers` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trigger_datetime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_to_call` text COLLATE utf8mb4_unicode_ci,
  `secret_key` text COLLATE utf8mb4_unicode_ci,
  `params` text COLLATE utf8mb4_unicode_ci,
  `is_triggered` int(11) DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.schedulers: ~102 rows (approximately)
/*!40000 ALTER TABLE `schedulers` DISABLE KEYS */;
INSERT INTO `schedulers` (`id`, `trigger_datetime`, `url_to_call`, `secret_key`, `params`, `is_triggered`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('053ffdfc5cf14609b8ec98fbc6923634', '2020-07-15 06:45:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"b27474e0468946e5a3e4fd910342e3b6","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-15 05:50:24', '2020-07-15 06:45:02'),
	('07f5ae23dbe947b59c312735fc03fbbe', '2020-07-16 09:10:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"40f40e86b1ab4c7bab83aa754835a2e0","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 09:04:57', '2020-07-16 09:10:01'),
	('09bfb699fa784130b74280631d77bfc4', '2020-07-16 23:32:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"821f785efe504bc88b7158f106a06182","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 23:30:54', '2020-07-16 23:32:01'),
	('0b385b7de351450db57336e5f7c61513', '2020-07-19 12:59:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"971864b9a6324c24be52e5ffa38f88ad","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-19 17:37:27', '2020-07-19 17:38:01'),
	('0d3dca93cc3f4bbbae2866b4e5b4d791', '2020-07-15 11:05:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"c96f02d277ca4608b7991229a80d2b21","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 10:53:50', '2020-07-15 11:05:01'),
	('105d5dd3f38c42249ff9815189eebd4e', '2020-07-14 22:04:00', 'triggeredNotification', '', '{"to_user":"03146f5e07084d799dfc6a78b4fb300c","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"18d3e147e3fe4ecc82f3b30c7c9a2663","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-14 22:05:02', '2020-07-14 22:06:01'),
	('10d5484d337249b8b008b842a3e702ef', '2020-07-13 21:35:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"e05a0aee36b049b2b3b684f5e4569524","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-13 21:25:14', '2020-07-13 21:35:01'),
	('154607c037cc465f9b01ba773e77f3e3', '2020-07-13 11:00:00', 'triggeredNotification', '', '{"to_user":"8ffa5a5232fe42c9b77b258f72ce2125","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you utilize the transport?","type":"I","click_url":"tbs-start","send_status":"P","status":"","module":"tbs","id_module":"e93d1f05fb9642aca5988ad3580966f4","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-13 22:57:31', '2020-07-13 22:58:01'),
	('169c88f369fe4a53a5eabcc3e3d0ca8c', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"07f0a71e42dc4e329449e2e38290f022","created_by":"8ffa5a5232fe42c9b77b258f72ce2125"}', 1, '8ffa5a5232fe42c9b77b258f72ce2125', NULL, '2020-07-16 00:45:45', '2020-07-16 01:00:01'),
	('17780678ee4248c58384394b8f454da1', '2020-07-15 11:25:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"5ff91ecbf7e74ac882b3ba9d60d2425c","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 11:15:31', '2020-07-15 11:25:02'),
	('182b4b37286e4d13a66709bf13e3801a', '2020-07-16 09:41:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"d8044503682e4b7baf80389997b6d3c1","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-16 09:36:02', '2020-07-16 09:41:01'),
	('184766c2ef5a43f882a46e5a84d28f54', '2020-07-19 18:45:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"96646041ae6a4ae597bfef36bfcb92f9","created_by":"c154432c2c064d8383371643cf8f9ccb"}', 1, 'c154432c2c064d8383371643cf8f9ccb', NULL, '2020-07-19 18:43:23', '2020-07-19 18:45:01'),
	('1c9c88069cd24dfdaa5bfd0cae735c54', '2020-07-16 21:51:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"930d9a07a77d4698b2418eaa2d460e01","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 21:52:50', '2020-07-16 21:53:01'),
	('1d9156065a9a43a7810a21d5b4db5e86', '2020-07-14 18:05:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"c70427a6db3243f49ccb9b3fdcdd12d9","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 18:04:56', '2020-07-14 18:05:01'),
	('230bfa776e1645bc9d8329bc480bdebb', '2020-07-16 07:50:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"09d4d2100e0e459491817e3c55d9a15d","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 07:50:39', '2020-07-16 07:51:02'),
	('251d0308b2bf4ee08d2b0aa3176356b9', '2020-07-14 18:40:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"832d9f4fefde4bbb9d6f193b2a2157b5","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 18:31:14', '2020-07-14 18:40:01'),
	('2c6bcbd65dce4b68ad37d0eed095b4d9', '2020-07-15 01:25:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"71eaba9e42524c5e8fbf277765ab8bdf","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 10:44:34', '2020-07-15 10:45:01'),
	('2d073b4bb3a14a31b2256e995947f2d7', '2020-07-16 09:41:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you finish the maintenance?","type":"I","click_url":"mss-end","send_status":"P","status":"","module":"mss","id_module":"d8044503682e4b7baf80389997b6d3c1","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-16 09:41:31', '2020-07-16 09:42:02'),
	('2fea05330c344154b93e639b629d5c02', '2020-07-20 08:03:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"5c03da0400064af98428c17faea02779","created_by":"ae0ed70b200e478b83aebc44f248c5cb"}', 1, 'ae0ed70b200e478b83aebc44f248c5cb', NULL, '2020-07-19 18:31:09', '2020-07-20 08:03:01'),
	('31ef825729a3411e839373a8f02807f4', '2020-07-19 18:53:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"96646041ae6a4ae597bfef36bfcb92f9","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-19 18:52:16', '2020-07-19 18:53:02'),
	('322072420f684742a10595287fd909bb', '2020-07-15 18:00:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you utilize the transport?","type":"I","click_url":"tbs-start","send_status":"P","status":"","module":"tbs","id_module":"f5ed95d14cb64a8e861047c17ae58673","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 17:58:22', '2020-07-15 18:00:01'),
	('32dbf92b6fb1420e85af88ef128f08dd', '2020-07-14 00:06:00', 'triggeredNotification', '', '{"to_user":"19e367b357df4fb984384b8150ecd710","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"079a22eeab8e46b3b06fd2cfed88f4aa","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-14 22:06:50', '2020-07-14 22:07:02'),
	('359b1d66b1d3415787433fa3c48b6411', '2020-07-13 16:36:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"5264b81b38de4a4fbca23c9eaf167dec","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-13 16:38:03', '2020-07-13 16:39:01'),
	('38207fab5e8a403d841004857cbdf40f', '2020-07-15 12:25:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"5ff91ecbf7e74ac882b3ba9d60d2425c","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 11:46:22', '2020-07-15 12:25:01'),
	('3ccdc58964a94980adb0c4bd05aa70c9', '2020-07-16 22:51:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"930d9a07a77d4698b2418eaa2d460e01","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-16 21:53:36', '2020-07-16 22:51:01'),
	('3f9b0e6346ff48a39cc3734ed3a41410', '2020-07-14 22:29:00', 'triggeredNotification', '', '{"to_user":"03146f5e07084d799dfc6a78b4fb300c","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"7eb273653aca4843a48da1c8f2ebd209","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 22:30:00', '2020-07-14 22:30:01'),
	('40b1155179e14a4dab7f6617e2afb7aa', '2020-07-14 17:35:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"2f42f84f9e994384ba3313c0be2341e3","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-14 17:22:51', '2020-07-14 17:35:01'),
	('452da3d6d5c44d2e938a84b28c3b5254', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"66f5a6e96e7f4b7c9dd8e4dd3187b744","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"001b713a9ae548aaae0d1ba285199a33","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 02:16:56', '2020-07-16 02:17:01'),
	('4b4aa0044ee0484b959652920aeb7b32', '2020-07-16 16:55:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"2d6d06a9801d46a2a392af11d7e206ca","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 16:54:21', '2020-07-16 16:55:01'),
	('4c1bc699cb9d495181c779f31463f0d0', '2020-07-15 00:58:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"115b1ee92e624a0eaef283595c11967f","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-15 00:53:21', '2020-07-15 00:58:01'),
	('53f68024b419445fa6450a2786ad7190', '2020-07-13 16:00:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"5264b81b38de4a4fbca23c9eaf167dec","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 15:57:18', '2020-07-13 16:00:02'),
	('57236af8991f4bd7863433ebcc69339e', '2020-07-13 19:50:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"bbc1d704d6844ffb8cdef534828f4c6b","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-13 17:55:54', '2020-07-13 19:50:01'),
	('5793770cde4345128c31c619b8dcf41f', '2020-07-13 21:55:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"469aaa0a77434ecdbe26131a5c872112","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 21:44:23', '2020-07-13 21:55:01'),
	('589f4e74304a473a8f58b1807239590f', '2020-07-24 10:00:00', 'triggeredNotification', '', '{"to_user":"550dc3496d484fd888d0f1be273c0ec2","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"46c24729e98f47f8891da48c3cee0d16","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 0, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:27:46', '2020-07-16 14:27:46'),
	('5aa27bdca1b5441ba3ed596fc3e4b1a7', '2020-07-19 12:53:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"971864b9a6324c24be52e5ffa38f88ad","created_by":"c154432c2c064d8383371643cf8f9ccb"}', 1, 'c154432c2c064d8383371643cf8f9ccb', NULL, '2020-07-19 12:54:30', '2020-07-19 12:55:01'),
	('5ed395ee789947a0851b3cef6a7ae7dd', '2020-07-16 23:35:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"541da424dee24a89aa447a5cbfb100f4","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 23:34:40', '2020-07-16 23:35:01'),
	('60af445491424d3ab4040472226eca8f', '2020-07-13 16:36:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"5264b81b38de4a4fbca23c9eaf167dec","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-13 20:05:19', '2020-07-13 20:06:01'),
	('60e1d45e9a6545a198a64dcfb801a7ad', '2020-07-20 12:43:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"0f833070c3f24ec59196b877b9cce30c","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-20 13:15:01', '2020-07-20 13:15:01'),
	('632391d0c9a24e8881cbb3268980a8e3', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"8ffa5a5232fe42c9b77b258f72ce2125","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"001b713a9ae548aaae0d1ba285199a33","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 02:16:56', '2020-07-16 02:17:01'),
	('636298d190a64220960c1196410caf28', '2020-07-13 16:05:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"5264b81b38de4a4fbca23c9eaf167dec","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-13 16:02:51', '2020-07-13 16:05:02'),
	('6379658532154dfb963659f91a6a38a3', '2020-07-16 14:17:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you utilize the transport?","type":"I","click_url":"tbs-start","send_status":"P","status":"","module":"tbs","id_module":"7abd9b4165794b80aaac324d5004b24a","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 14:16:10', '2020-07-16 14:17:01'),
	('63ac0299dd0340d9b3574a14fe04b78a', '2020-07-13 22:45:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"a6fe9d07d3294a5b9cbf07dc62f8775e","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 21:46:40', '2020-07-13 22:45:01'),
	('64fbba4e7706418690de086dfb9fc12a', '2020-07-16 07:48:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"09d4d2100e0e459491817e3c55d9a15d","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 07:47:24', '2020-07-16 07:48:01'),
	('65316f11877842baba2b1b6ef1757309', '2020-07-16 07:47:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"b7e56767b8e04154bcc3a6a59cb70259","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 09:05:01', '2020-07-16 09:06:01'),
	('66eaa3c438b44faf817c455da77fd84a', '2020-07-15 22:33:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"f9874d7cda6d47f9a9a04ab1779504aa","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-15 22:32:06', '2020-07-15 22:33:01'),
	('75651cd5bd3d4ae1a137c94cdde84d0e', '2020-07-15 21:27:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"28be9c76855342f2a02e4779c77625b9","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 21:25:32', '2020-07-15 21:27:02'),
	('780243ba23cd47a48527497ea8baef60', '2020-07-15 17:56:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"994806dc03394f16b315748ac630c195","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 17:54:34', '2020-07-15 17:56:01'),
	('7ac605c5a1ab43238d923fde7eeb34f4', '2020-07-16 08:00:00', 'triggeredNotification', '', '{"to_user":"20652c46e2ce404996b8fa662b3cef4d","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"f32c19e0ff5a474eaf05f2143aa64ee5","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:06:50', '2020-07-16 14:07:01'),
	('801bee1d073a4adeae9fbf4e73444a97', '2020-07-14 17:31:00', 'triggeredNotification', '', '{"to_user":"20652c46e2ce404996b8fa662b3cef4d","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you utilize the transport?","type":"I","click_url":"tbs-start","send_status":"P","status":"","module":"tbs","id_module":"8305fd4ff4f5451a877db1dfd1591e2b","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-14 22:31:30', '2020-07-14 22:32:02'),
	('805b75d46a4e434191b6ae16567e1528', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"07f0a71e42dc4e329449e2e38290f022","created_by":"8ffa5a5232fe42c9b77b258f72ce2125"}', 1, '8ffa5a5232fe42c9b77b258f72ce2125', NULL, '2020-07-16 00:45:45', '2020-07-16 01:00:01'),
	('80e52104d2d34d7ab4fca46bb357119d', '2020-07-15 21:40:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"f65683de2f0148a1a16931d80a86006f","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-15 21:35:38', '2020-07-15 21:40:01'),
	('847695e089e84f129acc53415f40b472', '2020-07-15 01:10:00', 'triggeredNotification', '', '{"to_user":"66f5a6e96e7f4b7c9dd8e4dd3187b744","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"63b9bb33c3e141c598171f9bfccaf0ac","created_by":"8ffa5a5232fe42c9b77b258f72ce2125"}', 1, '8ffa5a5232fe42c9b77b258f72ce2125', NULL, '2020-07-15 00:14:50', '2020-07-15 01:10:01'),
	('87fd5419c27e4301858cf499e8214cf1', '2020-07-16 11:00:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"98bc95a4db2746db8459e8e6d3ad44bc","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-16 10:12:09', '2020-07-16 11:00:01'),
	('8b8d60b9765b46489b95d4e930ad7bfb', '2020-07-16 16:30:00', 'triggeredNotification', '', '{"to_user":"550dc3496d484fd888d0f1be273c0ec2","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you utilize the transport?","type":"I","click_url":"tbs-start","send_status":"P","status":"","module":"tbs","id_module":"4a854eadc05847698e97f2b293e507ee","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:33:22', '2020-07-16 16:30:01'),
	('8c649aac6c1040d3835a2531633957c9', '2020-07-14 18:18:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"e5b74377a42e44e0a5b93a3e9ad7251b","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-14 18:15:24', '2020-07-14 18:18:01'),
	('91c903f820944c25be0a0ee93dc019af', '2020-07-15 01:04:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"115b1ee92e624a0eaef283595c11967f","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 00:58:09', '2020-07-15 01:04:01'),
	('925b9781bd3646c6a1d8f045f56ff4b2', '2020-07-15 01:10:00', 'triggeredNotification', '', '{"to_user":"66f5a6e96e7f4b7c9dd8e4dd3187b744","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"63b9bb33c3e141c598171f9bfccaf0ac","created_by":"8ffa5a5232fe42c9b77b258f72ce2125"}', 1, '8ffa5a5232fe42c9b77b258f72ce2125', NULL, '2020-07-15 00:10:19', '2020-07-15 01:10:01'),
	('9627dba71b0e435ebb3d799789f3cceb', '2020-07-19 18:51:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"96646041ae6a4ae597bfef36bfcb92f9","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-19 18:45:39', '2020-07-19 18:51:01'),
	('9807c03bed4b451cb8cf5315a17cc15e', '2020-07-16 15:35:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"23503dfcc5f34b13bf613d9eeb7b73c3","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 15:24:40', '2020-07-16 15:35:01'),
	('9a02ece56f5d4ff4b8a84d3778ff187e', '2020-07-13 23:55:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"469aaa0a77434ecdbe26131a5c872112","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-13 21:55:28', '2020-07-13 23:55:01'),
	('a13285083eeb4b019fd5eebb6c773123', '2020-07-24 10:00:00', 'triggeredNotification', '', '{"to_user":"3160b5cef10542449e38e01990f67f93","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"46c24729e98f47f8891da48c3cee0d16","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 0, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:27:46', '2020-07-16 14:27:46'),
	('a24a524c987744dbb34505c307f2dfe2', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you finish the maintenance?","type":"I","click_url":"mss-end","send_status":"P","status":"","module":"mss","id_module":"07f0a71e42dc4e329449e2e38290f022","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-16 01:00:46', '2020-07-16 01:01:02'),
	('a359bcacebcd4d968a4b9054b882ae18', '2020-07-15 05:50:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"b27474e0468946e5a3e4fd910342e3b6","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-15 05:43:17', '2020-07-15 05:50:01'),
	('a96a859de0d548119c76596c379728c3', '2020-07-15 01:15:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"71eaba9e42524c5e8fbf277765ab8bdf","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-15 01:08:54', '2020-07-15 01:15:01'),
	('aa556e8994ea4e0d8eca7904f547af3a', '2020-07-16 01:41:00', 'triggeredNotification', '', '{"to_user":"550dc3496d484fd888d0f1be273c0ec2","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"735f59b93a1e4e6f9a9631e29cbf89cf","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-16 01:45:47', '2020-07-16 01:46:02'),
	('b19fc5c16854400f8340b838387bb997', '2020-07-15 01:15:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"031b08c8d40a435590c49e78ccadac59","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-15 00:16:45', '2020-07-15 01:15:01'),
	('b7beba05c4274341b9c540d515d5072c', '2020-07-13 23:15:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"91df4bff0dac4be0856187dc90638f05","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 23:04:46', '2020-07-13 23:15:01'),
	('be17d26cf8bf40ed90aa114220d23671', '2020-07-20 12:29:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"5c03da0400064af98428c17faea02779","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-20 08:42:02', '2020-07-20 12:29:01'),
	('be215aee944846fa832cc56914a08b2b', '2020-07-15 10:50:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"c96f02d277ca4608b7991229a80d2b21","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 10:45:32', '2020-07-15 10:50:01'),
	('be5be295391d46b8a8ee78d3fb7d3a6c', '2020-07-13 23:50:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"0674738ae7574637b03407188c874e37","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 23:44:28', '2020-07-13 23:50:01'),
	('be638a5ad33441cc878e238916faebbc', '2020-07-16 16:30:00', 'triggeredNotification', '', '{"to_user":"550dc3496d484fd888d0f1be273c0ec2","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"88d487d307e349a28d30640c563e32ce","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:49:11', '2020-07-16 16:30:01'),
	('c1369657ad3b4f858d53f8ef3ce56c73', '2020-07-14 18:07:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"c70427a6db3243f49ccb9b3fdcdd12d9","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-14 18:07:10', '2020-07-14 18:08:01'),
	('c150a84c1fee4a438fc3e1330a0b0768', '2020-07-14 17:29:00', 'triggeredNotification', '', '{"to_user":"20652c46e2ce404996b8fa662b3cef4d","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"e2b9138c0ef24020a4f77f01e573bbb4","created_by":"19e367b357df4fb984384b8150ecd710"}', 1, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-14 22:30:15', '2020-07-14 22:31:01'),
	('c81be6727c37450a999b51eff87ec012', '2020-07-16 23:32:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"821f785efe504bc88b7158f106a06182","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 23:30:50', '2020-07-16 23:32:01'),
	('cb8cf543d9804ffa8b7128236769565e', '2020-07-20 12:41:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"0f833070c3f24ec59196b877b9cce30c","created_by":"c154432c2c064d8383371643cf8f9ccb"}', 1, 'c154432c2c064d8383371643cf8f9ccb', NULL, '2020-07-19 12:44:14', '2020-07-20 12:41:01'),
	('cbfbc457f9d9496b89f300c1e2148b71', '2020-07-15 22:00:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you finish the maintenance?","type":"I","click_url":"mss-end","send_status":"P","status":"","module":"mss","id_module":"3d1e09a6481a4b69bd4ca56f359af4ef","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-15 22:01:25', '2020-07-15 22:02:01'),
	('cc6cd1ba25b14b5e90e99e851c8dbf46', '2020-07-20 12:43:00', 'triggeredNotification', '', '{"to_user":"e1aedba9726e4a7480b6d3a06b2e96d8","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"0f833070c3f24ec59196b877b9cce30c","created_by":"e1aedba9726e4a7480b6d3a06b2e96d8"}', 1, 'e1aedba9726e4a7480b6d3a06b2e96d8', NULL, '2020-07-20 13:15:04', '2020-07-20 13:16:01'),
	('ced4448fea684285bf35aa34105323a4', '2020-07-15 11:05:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"c96f02d277ca4608b7991229a80d2b21","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-15 10:56:17', '2020-07-15 11:05:01'),
	('cf3888a3877448b985fd9554878c1abf', '2020-07-17 09:00:00', 'triggeredNotification', '', '{"to_user":"4cd8e45906e1407b82ad7cd6b375c803","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"f29b57b1e5074fac8bec1240f8a81717","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-16 19:41:41', '2020-07-17 09:00:01'),
	('d40871151ee1449dae05f0d34cf6aab9', '2020-07-15 22:00:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"3d1e09a6481a4b69bd4ca56f359af4ef","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 21:57:47', '2020-07-15 22:00:02'),
	('d5cf71354b16485499b67bcf3f3fdb2c', '2020-07-16 01:41:00', 'triggeredNotification', '', '{"to_user":"405211bb66b3418dadc3ff1c82b4611f","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"735f59b93a1e4e6f9a9631e29cbf89cf","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-16 01:42:58', '2020-07-16 01:43:01'),
	('d9148b0d5b984a478c9a8aacfaf64e61', '2020-07-14 02:23:00', 'triggeredNotification', '', '{"to_user":"8ffa5a5232fe42c9b77b258f72ce2125","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"655f5f4548b24ba9b8950aea5858c667","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 1, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-14 00:35:32', '2020-07-14 02:23:01'),
	('d922039c27d44aaeb288ad956f5b3624', '2020-07-13 21:25:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"e05a0aee36b049b2b3b684f5e4569524","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-13 21:21:16', '2020-07-13 21:25:01'),
	('d94b766c686345a7823fd9d72c48ac75', '2020-07-14 01:31:00', 'triggeredNotification', '', '{"to_user":"66f5a6e96e7f4b7c9dd8e4dd3187b744","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"6fe61957e11b413bacdfe18fa8d00e1d","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-14 01:32:00', '2020-07-14 01:32:02'),
	('db3fcb343d1f459a8cfeb0f250aee18d', '2020-07-15 11:05:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"c96f02d277ca4608b7991229a80d2b21","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-15 11:10:49', '2020-07-15 11:11:01'),
	('ddb6e5952a824ef39f3759c0b575d7fe', '2020-07-13 17:40:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"bbc1d704d6844ffb8cdef534828f4c6b","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-13 17:25:49', '2020-07-13 17:40:02'),
	('e17a8b17b3fb443aa6fefaca48f84747', '2020-07-15 11:10:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Tender Management System]","desc":"Have you visited the site?","type":"I","click_url":"tms-update","send_status":"P","status":"","module":"tms","id_module":"29b8865c0da649f6ad33782cf81afac6","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-15 10:57:13', '2020-07-15 11:10:01'),
	('e1ef8c1f353f478d91e67c8a04969f7a', '2020-07-16 14:20:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"tbs-end","send_status":"P","status":"","module":"tbs","id_module":"7abd9b4165794b80aaac324d5004b24a","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-16 14:17:14', '2020-07-16 14:20:02'),
	('e2f0034aa8e74753a0b2355dd6bfd923', '2020-07-15 21:35:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"f65683de2f0148a1a16931d80a86006f","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-15 21:33:17', '2020-07-15 21:35:01'),
	('e4dcdcfddac045268798119c5f452818', '2020-07-15 13:30:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"d81be87558304c5697f0c2b709f8da22","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 12:46:33', '2020-07-15 13:30:01'),
	('e6be326c372444fc9fafb33a4d9219f4', '2020-07-24 09:25:00', 'triggeredNotification', '', '{"to_user":"03146f5e07084d799dfc6a78b4fb300c","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you started the maintenance?","type":"I","click_url":"mss-start","send_status":"P","status":"","module":"mss","id_module":"4214d9c1257b4468a8c3f68bcf9355f8","created_by":"19e367b357df4fb984384b8150ecd710"}', 0, '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-14 23:35:25', '2020-07-14 23:35:25'),
	('e92932509c91447089226a15b7dd9464', '2020-07-16 10:12:00', 'triggeredNotification', '', '{"to_user":"ea4c960c162c4618b92c39969d7eee29","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"98bc95a4db2746db8459e8e6d3ad44bc","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-16 10:09:34', '2020-07-16 10:12:01'),
	('e93297c73dcf4878865d5bcb92dc0142', '2020-07-14 18:20:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"103fbee3073c40eab6ab1b9c9971f3b8","created_by":"b7a8b40c9c144a819bbc867d3d64fd52"}', 1, 'b7a8b40c9c144a819bbc867d3d64fd52', NULL, '2020-07-14 18:16:24', '2020-07-14 18:20:01'),
	('eb6c7ad07b3b4f74ae8f7506a211c767', '2020-07-24 10:00:00', 'triggeredNotification', '', '{"to_user":"550dc3496d484fd888d0f1be273c0ec2","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"46c24729e98f47f8891da48c3cee0d16","created_by":"550dc3496d484fd888d0f1be273c0ec2"}', 0, '550dc3496d484fd888d0f1be273c0ec2', NULL, '2020-07-16 14:17:30', '2020-07-16 14:17:30'),
	('ec926a956735457389c49e388ecb3a70', '2020-07-16 22:31:00', 'triggeredNotification', '', '{"to_user":"20652c46e2ce404996b8fa662b3cef4d","tiny_img_url":"","title":"Vertigo [Transport Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"tbs-end","send_status":"P","status":"","module":"tbs","id_module":"8305fd4ff4f5451a877db1dfd1591e2b","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 22:32:09', '2020-07-16 22:31:01'),
	('ec98d70bc7044958848fa94b0fca1d4c', '2020-07-16 01:00:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Maintenance Schedule System]","desc":"Have you finish the maintenance?","type":"I","click_url":"mss-end","send_status":"P","status":"","module":"mss","id_module":"07f0a71e42dc4e329449e2e38290f022","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-16 01:00:46', '2020-07-16 01:01:02'),
	('eedaac78df3743f8a2eb5a62e449d4ff', '2020-07-16 23:32:00', 'triggeredNotification', '', '{"to_user":"e8f3cacb0be64c8a9f212cc125abc266","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"821f785efe504bc88b7158f106a06182","created_by":"e8f3cacb0be64c8a9f212cc125abc266"}', 1, 'e8f3cacb0be64c8a9f212cc125abc266', NULL, '2020-07-16 23:30:28', '2020-07-16 23:32:01'),
	('ef1b2ea97db340f2b819e47a16e75d41', '2020-07-15 12:30:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"d81be87558304c5697f0c2b709f8da22","created_by":"ea4c960c162c4618b92c39969d7eee29"}', 1, 'ea4c960c162c4618b92c39969d7eee29', NULL, '2020-07-15 12:23:28', '2020-07-15 12:30:01'),
	('f6305ffd914744eba1ec1d8628dd85d2', '2020-07-13 16:36:00', 'triggeredNotification', '', '{"to_user":"cd8fa07888794a00bcb142f1808f8b8a","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you finished the assigned task?","type":"I","click_url":"sas-end","send_status":"P","status":"","module":"sas","id_module":"5264b81b38de4a4fbca23c9eaf167dec","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-13 16:44:07', '2020-07-13 16:45:01'),
	('f8f94f9f2f6948afa350286d733d8cf9', '2020-07-14 18:13:00', 'triggeredNotification', '', '{"to_user":"b7a8b40c9c144a819bbc867d3d64fd52","tiny_img_url":"","title":"Vertigo [Staff Assignment Management]","desc":"Have you started the assigned task?","type":"I","click_url":"sas-start","send_status":"P","status":"","module":"sas","id_module":"103fbee3073c40eab6ab1b9c9971f3b8","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 18:12:31', '2020-07-14 18:13:01'),
	('fb8728506c1d448e900a0d312d53fe7c', '2020-07-14 01:32:00', 'triggeredNotification', '', '{"to_user":"66f5a6e96e7f4b7c9dd8e4dd3187b744","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you utilize the equipment?","type":"I","click_url":"ebs-start","send_status":"P","status":"","module":"ebs","id_module":"6fe61957e11b413bacdfe18fa8d00e1d","created_by":"cd8fa07888794a00bcb142f1808f8b8a"}', 1, 'cd8fa07888794a00bcb142f1808f8b8a', NULL, '2020-07-14 01:32:37', '2020-07-14 01:33:01'),
	('ffa685f8f37746a28c482387c9eb5907', '2020-07-16 15:30:00', 'triggeredNotification', '', '{"to_user":"20652c46e2ce404996b8fa662b3cef4d","tiny_img_url":"","title":"Vertigo [Equipment Booking System]","desc":"Have you completed the booking?","type":"I","click_url":"ebs-end","send_status":"P","status":"","module":"ebs","id_module":"e2b9138c0ef24020a4f77f01e573bbb4","created_by":"20652c46e2ce404996b8fa662b3cef4d"}', 1, '20652c46e2ce404996b8fa662b3cef4d', NULL, '2020-07-14 22:31:13', '2020-07-16 15:30:01');
/*!40000 ALTER TABLE `schedulers` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.tbs
CREATE TABLE IF NOT EXISTS `tbs` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_number` text COLLATE utf8mb4_unicode_ci,
  `job_title` text COLLATE utf8mb4_unicode_ci,
  `start_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_justification` text COLLATE utf8mb4_unicode_ci,
  `booking_progress` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_justification` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_justification` text COLLATE utf8mb4_unicode_ci,
  `img_update` text COLLATE utf8mb4_unicode_ci,
  `img_path_update` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.tbs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbs` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.tbs_drivers
CREATE TABLE IF NOT EXISTS `tbs_drivers` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tbs` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.tbs_drivers: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbs_drivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbs_drivers` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.tbs_transport_uses
CREATE TABLE IF NOT EXISTS `tbs_transport_uses` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transport` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tbs` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.tbs_transport_uses: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbs_transport_uses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbs_transport_uses` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.tms
CREATE TABLE IF NOT EXISTS `tms` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` text COLLATE utf8mb4_unicode_ci,
  `vtsb_num` text COLLATE utf8mb4_unicode_ci,
  `id_inquiry` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acknowledge_status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acknowledge_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_start` text COLLATE utf8mb4_unicode_ci,
  `finish_task` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 : No , 1 : Yes',
  `justification_finish` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clerk_verify_status` text COLLATE utf8mb4_unicode_ci,
  `clerk_verify_by` text COLLATE utf8mb4_unicode_ci,
  `manager_verify_by` text COLLATE utf8mb4_unicode_ci,
  `manager_verify_status` text COLLATE utf8mb4_unicode_ci,
  `sitevisit_start_date` datetime DEFAULT NULL,
  `sitevisit_end_date` datetime DEFAULT NULL,
  `review_start_date` datetime DEFAULT NULL,
  `review_end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.tms: ~2 rows (approximately)
/*!40000 ALTER TABLE `tms` DISABLE KEYS */;
INSERT INTO `tms` (`id`, `client_name`, `vtsb_num`, `id_inquiry`, `acknowledge_status`, `acknowledge_by`, `start_task`, `justification_start`, `finish_task`, `justification_finish`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `clerk_verify_status`, `clerk_verify_by`, `manager_verify_by`, `manager_verify_status`, `sitevisit_start_date`, `sitevisit_end_date`, `review_start_date`, `review_end_date`) VALUES
	('08213957bd384107a380e9caf8f71ef9', 'pcsb', '123456', '6a5f35b51b77452da8abb4703a60b87b', NULL, NULL, NULL, NULL, NULL, NULL, 'Inquiry Created', '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-19 09:28:49', '2020-07-19 09:28:49', NULL, NULL, NULL, NULL, '2020-07-01 09:28:00', '2020-07-21 12:30:00', NULL, NULL),
	('ae83ad0741f64bbca499e96333e3d6ed', 'pcsb', '123456', '6a5f35b51b77452da8abb4703a60b87b', NULL, NULL, NULL, NULL, NULL, NULL, 'Inquiry Created', '19e367b357df4fb984384b8150ecd710', NULL, '2020-07-19 09:30:23', '2020-07-19 09:30:23', NULL, NULL, NULL, NULL, '2020-07-01 12:30:00', '2020-07-02 12:30:00', NULL, NULL);
/*!40000 ALTER TABLE `tms` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.tms_pics
CREATE TABLE IF NOT EXISTS `tms_pics` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tms` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.tms_pics: ~0 rows (approximately)
/*!40000 ALTER TABLE `tms_pics` DISABLE KEYS */;
/*!40000 ALTER TABLE `tms_pics` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.transports
CREATE TABLE IF NOT EXISTS `transports` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `img` text COLLATE utf8mb4_unicode_ci,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `plate_number` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `id_trans_category` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `availability` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.transports: ~3 rows (approximately)
/*!40000 ALTER TABLE `transports` DISABLE KEYS */;
INSERT INTO `transports` (`id`, `name`, `img`, `img_path`, `plate_number`, `description`, `id_trans_category`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `availability`) VALUES
	('99571a6bda23472386013cba25a6cd28', 'Toyota Hiace', '99571a6bda23472386013cba25a6cd28_1586306754.png', '\\storage\\transports\\99571a6bda23472386013cba25a6cd28_1586306754.png', 'VV 2222', 'Toyota Hiace test', '8475353181ce4dfcb11a29ad530ed93f', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:45:54', '2020-07-13 22:57:31', 'unavailable'),
	('b678cfd6e81744068d52af6c0c5cb7d7', 'Kia Cerato', 'b678cfd6e81744068d52af6c0c5cb7d7_1586306593.jpg', '\\storage\\transports\\b678cfd6e81744068d52af6c0c5cb7d7_1586306593.jpg', 'WBX7889', 'Kia Cerato test', '8855353181ce4dfcb11a29ad530ed93f', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:43:13', '2020-07-14 22:31:30', 'unavailable'),
	('da5a121966bd43e9a6b07e4036337d11', 'Proton X70', 'da5a121966bd43e9a6b07e4036337d11_1586306677.jpg', '\\storage\\transports\\da5a121966bd43e9a6b07e4036337d11_1586306677.jpg', 'WB 45566 X', 'Proton X70 test', '1267353181ce4dfcb11a29ad530ed93f', 'enable', '19e367b357df4fb984384b8150ecd710', NULL, '2020-04-08 00:44:37', '2020-07-15 17:58:22', 'unavailable');
/*!40000 ALTER TABLE `transports` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.transport_categories
CREATE TABLE IF NOT EXISTS `transport_categories` (
  `id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `status` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.transport_categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `transport_categories` DISABLE KEYS */;
INSERT INTO `transport_categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	('1267353181ce4dfcb11a29ad530ed93f', 'SUV', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:38:17', '2020-04-08 08:38:20'),
	('4411353181ce4dfcb11a29ad530ed93f', 'Pickup Truck', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:38:18', '2020-04-08 08:38:21'),
	('8475353181ce4dfcb11a29ad530ed93f', 'Van', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:38:49', '2020-04-08 08:38:50'),
	('8855353181ce4dfcb11a29ad530ed93f', 'Sedan', '1', '19e367b357df4fb984384b8150ecd710', '19e367b357df4fb984384b8150ecd710', '2020-04-08 08:38:19', '2020-04-08 08:38:22');
/*!40000 ALTER TABLE `transport_categories` ENABLE KEYS */;

-- Dumping structure for table dev_vertigo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `id_role` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_position` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_department` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_access_role` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_access_position` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_log_web` datetime DEFAULT NULL,
  `last_log_mobile` datetime DEFAULT NULL,
  `created_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` varchar(280) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_name` text COLLATE utf8mb4_unicode_ci,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `staff_id` text COLLATE utf8mb4_unicode_ci,
  `first_name` text COLLATE utf8mb4_unicode_ci,
  `last_name` text COLLATE utf8mb4_unicode_ci,
  `id_inquiry` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dev_vertigo.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `availability`, `id_role`, `id_position`, `id_department`, `id_access_role`, `id_access_position`, `last_log_web`, `last_log_mobile`, `created_by`, `updated_by`, `device_token`, `img_name`, `img_path`, `staff_id`, `first_name`, `last_name`, `id_inquiry`) VALUES
	('19e367b357df4fb984384b8150ecd710', 'Superadmin', 'superadmin@gmail.com', NULL, '$2y$10$kYhh19xHhEpuQwJlLMUFv.se3cpWA5.ECYwQc..FgCDwM5HA1YU4m', NULL, '2020-01-13 14:49:31', '2020-10-04 00:34:22', 1, NULL, '61eb237fc29b45e181cbfd00f012d7ca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '19e367b357df4fb984384b8150ecd710', 'NOTOKEN', '19e367b357df4fb984384b8150ecd710_1591541247.png', '/storage/users/19e367b357df4fb984384b8150ecd710_1591541247.png', '555666', 'Super', 'Admin', NULL),
	('892b3cc0b40443dc8a0ccd516854cccf', 'AHY', 'hafizi@vertigo.com.my', NULL, '$2y$10$lX9EN8TiEc9KdLEvzH3LAeCIyeil/87NjdnhfjmQJUXuQ7nN4f5mO', NULL, '2020-07-19 11:45:58', '2020-07-19 12:40:50', 1, NULL, 'cc1e3153d1054e4794792bc80828fd10', NULL, NULL, NULL, NULL, NULL, NULL, '19e367b357df4fb984384b8150ecd710', NULL, 'cYAQGEcxlvQ:APA91bFBZCNRKUi5_loc_SW6quaAXPOKUYnPwunG9Mbb-N369Ew7XxlCqzAtysAtTqXf_ddIxKLjX6XEZO7wucYuM2KACE2YwZ5_22NN6LP_X-xlJrk9JBaQqIkAmDKmos_boBeNjpcH', '892b3cc0b40443dc8a0ccd516854cccf_1595130358.jpg', '/storage/users/892b3cc0b40443dc8a0ccd516854cccf_1595130358.jpg', 'V001', 'Hafizi', 'Yahaya', NULL),
	('ae0ed70b200e478b83aebc44f248c5cb', 'MNA', 'nasron@vertigo.com.my', NULL, '$2y$10$JSmZieWY3DVP6.wFhpyf0O04g/5/.AcC5.Ni0b2baYVi3oTSlKYk.', NULL, '2020-07-19 17:41:18', '2020-07-19 18:28:22', 1, NULL, 'ba1dbea312c04a6f95172214e9e1f384', NULL, NULL, NULL, NULL, NULL, NULL, '19e367b357df4fb984384b8150ecd710', NULL, 'dh8IxJjxufU:APA91bG8lLT14EQb98FQtkojI6UU5Y0D2V6VtEzS1haKZVTAv9Hqsf4qrq0Dp4ugCwOtT2B-eggfI9B_TLwyHYP8JlYhOadSrALc3nIIl8HYJXQTs3b7f5kTnBpURb0hX2pWhd3lxwVi', 'ae0ed70b200e478b83aebc44f248c5cb_1595151678.jpg', '/storage/users/ae0ed70b200e478b83aebc44f248c5cb_1595151678.jpg', 'V0005', 'MOHAMAD', 'NASRON', NULL),
	('c154432c2c064d8383371643cf8f9ccb', 'DN', 'noridani@vertigo.com.my', NULL, '$2y$10$FhBvvuwMm4cqNYgYy4uDV.yDzvcSwR8V23Iy.Gx/.GXHjRdDcA.fe', NULL, '2020-07-19 11:47:07', '2020-07-19 12:34:34', 1, NULL, 'ba1dbea312c04a6f95172214e9e1f384', NULL, NULL, NULL, NULL, NULL, NULL, '19e367b357df4fb984384b8150ecd710', NULL, 'dPEhbJn_tpg:APA91bFaKdNq53f2R4Q-iTqRU_8RG8AICy4qrvcSCY9Kt-TFVhIZqCuCgu8KGSyzz2o7nMimZkPi3aMTDoJb3xohQNWFUSxRYd6XoDzzJsIYMPdPed1rxr_C_dAt51r4b16EQK0E6m7i', 'c154432c2c064d8383371643cf8f9ccb_1595130427.jpg', '/storage/users/c154432c2c064d8383371643cf8f9ccb_1595130427.jpg', 'V002', 'Noridani', 'Omar', NULL),
	('e1aedba9726e4a7480b6d3a06b2e96d8', 'MAS', 'asmika@vertigo.com.my', NULL, '$2y$10$hap7at4ttW6wSOd2kmAe4evVnUsx9bdVftdZkSDYZ3Hr04NDGAINC', NULL, '2020-07-19 12:36:27', '2020-07-19 12:51:37', 1, NULL, 'cba1bb20bbeb4965a56ae9500e23dc83', NULL, NULL, NULL, NULL, NULL, NULL, 'c154432c2c064d8383371643cf8f9ccb', NULL, 'cYAQGEcxlvQ:APA91bFBZCNRKUi5_loc_SW6quaAXPOKUYnPwunG9Mbb-N369Ew7XxlCqzAtysAtTqXf_ddIxKLjX6XEZO7wucYuM2KACE2YwZ5_22NN6LP_X-xlJrk9JBaQqIkAmDKmos_boBeNjpcH', 'e1aedba9726e4a7480b6d3a06b2e96d8_1595133387.jpg', '/storage/users/e1aedba9726e4a7480b6d3a06b2e96d8_1595133387.jpg', 'V003', 'Asmika', 'Salleh', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
