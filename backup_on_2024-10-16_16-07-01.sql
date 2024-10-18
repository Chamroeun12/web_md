

CREATE TABLE `tb_teacher` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Profile_img` varchar(255) DEFAULT NULL,
  `En_name` varchar(50) DEFAULT NULL,
  `Kh_name` varchar(50) DEFAULT NULL,
  `Staff_code` varchar(20) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `Age` int(2) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Nation` varchar(20) DEFAULT NULL,
  `Ethnicity` varchar(20) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`),
  KEY `En_name` (`En_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `Status`, `Date`, `Create_at`, `Update_at`) VALUES ('12', '', 'Saran Chamroeuns', '', 'T-1', 'Male', '', '0000-00-00', '', '', '', '', '', '', '', '2024-10-14 17:37:16.23984', '2024-10-14 17:37:16.23984');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `Status`, `Date`, `Create_at`, `Update_at`) VALUES ('13', '', 'Chet', 'ចិត្រ', 'T-2', 'Female', '', '', '', '', '', '', '', '', '', '2024-10-14 17:37:21.70823', '2024-10-14 17:37:21.70823');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `Status`, `Date`, `Create_at`, `Update_at`) VALUES ('14', '', 'Muon Piti', 'piti', '', 'Female', '', '2024-10-16', '', '', '', '', '', '', '', '2024-10-16 21:06:04.11302', '2024-10-16 21:06:04.11302');




CREATE TABLE `tb_student` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Stu_code` varchar(10) DEFAULT NULL,
  `En_name` varchar(50) DEFAULT NULL,
  `Kh_name` varchar(50) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Status` varbinary(20) DEFAULT 'Active',
  `Create_at` date DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `Profile_img` varchar(255) DEFAULT NULL,
  `Dad_name` varchar(50) DEFAULT NULL,
  `Mom_name` varchar(50) DEFAULT NULL,
  `Dad_job` varchar(100) DEFAULT NULL,
  `Mom_job` varchar(100) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('89', 'SIS-001', 'Brak SaiviChhou', 'ប្រាក់ ស៊ីវីឈូ', 'Male', '2019-02-02', 'សៀមរាប\r\n', 'Deactive', '', '2024-10-16 19:53:07', '455759676_1845419689304169_348413088179969606_n.jpg', 'សួស ប្រាក់', 'នួន ម៉ាស៊ី', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '010 001 101');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('90', 'SIS-002', 'Shok Virak', 'សុខ វីរៈ', 'Male', '2019-01-23', 'Siem reap', 'Active', '', '2024-10-15 23:47:22', 'download.jpg', 'កៅ សុខ', 'ណា សុខវី', 'កសិករ', 'មេផ្ទះ', '010 002 102');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('91', 'SIS-003', 'Mean SON', 'សុន មាន', 'Male', '2019-03-06', 'Siem Reap', 'Active', '', '2024-10-15 23:46:27', '455759676_1845419689304169_348413088179969606_n.jpg', 'ស៊ាន សុន', 'សៅ កញ្ញា', 'កសិករ', 'កសិករ', '010 70 2 840');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('92', 'SIS-004', 'Nun Thanou', 'នុន​ ថានូ', 'Male', '2018-05-07', 'Siem reap', 'Active', '', '2024-10-15 23:47:57', 'images (4).jpg', 'តែ ខានុន', 'នៅ ស៊ីថា', 'អាជីវករ', 'មេផ្ទះ', '010 003 103');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('93', 'SIS-005', 'Sav Davy', 'សៅ ដាវី', 'Female', '2020-06-02', 'Siem reap', 'Active', '', '2024-10-15 23:48:10', 'images (5).jpg', 'នាង សៅ', 'អក ណាវី', 'អាជីវករ', 'មេផ្ទះ', '010 004 104');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('95', 'SIS-006', 'Mao Socheata', 'ម៉ៅ សុជាតា', 'Female', '2019-03-05', 'Siem reap', 'Active', '', '2024-10-15 23:49:13', 'images (2).jpg', 'កៅ ម៉ៅ', 'សាន្ត សុជា', 'អាជីវករ', 'មេផ្ទះ', '010 005 105');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('97', 'SIS-007', 'Phol Phanuth', 'ផល ផានុត', 'Male', '2020-06-23', 'Siem reap', 'Deactive', '', '2024-10-16 20:59:13', 'images (9).jpg', ' ជួន សុផល ', 'អៀង សុខផា', 'មន្ត្រីរាជការ', 'អាជីវករ', '010 006 106');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('98', 'SIS-008', 'Vanna Maiya', 'វណ្ណា ម៉ៃយ៉ា', 'Female', '2019-12-15', 'Siem reap', 'Active', '', '2024-10-16 18:22:19', 'images (8).jpg', 'ថាវ សុវណ្ណ', 'សៀវ ម៉ៃ', 'មន្ត្រីរាជការ', 'អាជីវករ', '010 007 107');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('99', 'SIS-009', 'Sara Vita', 'សារ៉ា វីតា', 'Female', '2019-02-28', 'Siem reap', 'Deactive', '', '2024-10-16 19:52:13', 'images (8).jpg', 'ហ៊ន សារ៉ា', 'ឆេង ណាវី', 'អាជីវករ', 'អាជីវករ', '010 008 108');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('100', 'SIS-010', 'Sara Vitu', 'សារ៉ា វីទូ', 'Male', '2019-02-03', 'Siem reap', 'Active', '', '2024-10-15 23:49:51', 'images (3).jpg', 'ហ៊ន សារ៉ា', 'ឆេង ណាវី', 'អាជីវករ', 'អាជីវករ', '010 009 109');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('101', 'SIS-011', 'Si Ratheb', 'សិក រ៉ាថេប', 'Male', '2020-10-19', 'Siem reap', 'Active', '', '2024-10-15 23:50:11', 'images (7).jpg', 'អ៊ុក ណាសិក', 'តូច សុណា', 'នគរបាល', 'មេផ្ទះ', '010 010 110');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('102', 'SIS-012', 'Pich Rathana', 'ពេជ្រ រតនា', 'Female', '2019-05-23', 'Siem reap', 'Active', '', '2024-10-16 19:25:14', 'images (10).jpg', 'សារ៉ុន ពេជ្រ', 'កែវ សុខណា', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '011 001 101');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('103', 'SIS-013', 'Pav Sokhy', 'ប៉ាវ សុខី', 'Female', '2019-07-07', 'Siem reap', 'Active', '', '2024-10-15 23:50:40', 'images (8).jpg', 'ស៊ីង ប៉ាវ', 'ជុំ មូលីកា', 'អាជីវករ', 'មេផ្ទះ', '011 002 102');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('104', 'SIS-014', 'MuNy MeaN', 'មុនី មាន', 'Male', '2024-10-16', 'Siem Reap', 'Active', '', '2024-10-16 15:28:41', 'photo_2023-06-25_00-46-15.jpg', 'Dad', 'Mom', 'Web', 'Web', '010 70 26 84');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('105', 'SIS-015', 'MuNy Chetra', 'មុនី ចិត្រា', 'Male', '2024-10-16', 'Siem Reap', 'Active', '', '', 'images.jpg', 'Dad', 'Mom', 'Web', 'Web', '010 70 2 84');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('107', 'SIS-0098', 'Muon Piti', 'មួន ពិទិ', 'Male', '2024-10-16', 'សៀមរាប', 'Active', '', '', 'images (2).jpg', 'តា ហូ', 'យាយ កី', 'កសិករ', 'មេផ្ទះ', '069 6000900');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `Status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('108', '', '', '', '', '0000-00-00', '', 'Active', '', '', '4k-laptop.jpg', '', '', '', '', '');




CREATE TABLE `tb_subject` (
  `SubID` int(10) NOT NULL AUTO_INCREMENT,
  `Subject_name` varchar(50) DEFAULT NULL,
  `Color` varchar(40) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`SubID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('1', 'Khmer', 'bg-danger', '2024-09-04 18:44:06.00000', '2024-09-04 18:44:09.00000');
INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('2', 'English', 'bg-warning', '2024-09-03 18:45:10.00000', '2024-09-04 18:45:15.00000');
INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('3', 'Chinese', 'bg-success', '2024-09-02 18:13:43.00000', '2024-09-01 18:13:48.00000');




CREATE TABLE `tb_add_to_class` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Stu_id` int(6) DEFAULT NULL,
  `Class_id` int(6) DEFAULT NULL,
  `Create_at` timestamp NULL DEFAULT current_timestamp(),
  `Update_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `Stu_id` (`Stu_id`),
  KEY `Class_id` (`Class_id`),
  CONSTRAINT `tb_add_to_class_ibfk_1` FOREIGN KEY (`Stu_id`) REFERENCES `tb_student` (`ID`),
  CONSTRAINT `tb_add_to_class_ibfk_2` FOREIGN KEY (`Class_id`) REFERENCES `tb_class` (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('7', '89', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('8', '90', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('9', '92', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('10', '93', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('11', '95', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('12', '97', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('13', '98', '18', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('15', '91', '16', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('16', '101', '16', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('17', '102', '16', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('18', '103', '16', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('19', '99', '16', '', '');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('27', '91', '19', '2024-10-15 10:53:54', '2024-10-15 10:53:54');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('31', '91', '17', '2024-10-15 22:39:54', '2024-10-15 22:39:54');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('32', '93', '17', '2024-10-15 23:10:29', '2024-10-15 23:10:29');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('33', '90', '22', '2024-10-16 21:02:32', '2024-10-16 21:02:32');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('35', '91', '22', '2024-10-16 21:04:12', '2024-10-16 21:04:12');




CREATE TABLE `tb_attendance` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Class_id` int(6) DEFAULT NULL,
  `Attendance` enum('Present','Permission','Absent') DEFAULT 'Absent',
  `Stu_id` int(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT current_timestamp(5),
  `Update_at` timestamp(5) NULL DEFAULT current_timestamp(5),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_attendance` (`Class_id`,`Stu_id`,`Date`),
  KEY `Class_id` (`Class_id`),
  KEY `Stu_id` (`Stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('97', '17', 'Permission', '91', '2024-10-15', '2024-10-15 23:08:46.11035', '2024-10-15 23:08:46.11035');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('101', '17', 'Permission', '93', '2024-10-15', '2024-10-15 23:10:46.05912', '2024-10-15 23:10:46.05912');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('107', '16', 'Permission', '101', '2024-10-15', '2024-10-15 23:21:27.10952', '2024-10-15 23:21:27.10952');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('108', '16', 'Permission', '102', '2024-10-15', '2024-10-15 23:21:27.11134', '2024-10-15 23:21:27.11134');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('109', '16', 'Permission', '103', '2024-10-15', '2024-10-15 23:21:27.11258', '2024-10-15 23:21:27.11258');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('110', '16', 'Permission', '99', '2024-10-15', '2024-10-15 23:21:27.11369', '2024-10-15 23:21:27.11369');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('112', '17', 'Present', '101', '2024-10-15', '2024-10-15 23:22:00.24710', '2024-10-15 23:22:00.24710');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('113', '17', 'Present', '102', '2024-10-15', '2024-10-15 23:22:00.24812', '2024-10-15 23:22:00.24812');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('119', '16', 'Permission', '93', '2024-10-15', '2024-10-15 23:22:13.23153', '2024-10-15 23:22:13.23153');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('120', '18', 'Present', '89', '2024-10-15', '2024-10-16 00:48:54.59275', '2024-10-16 00:48:54.59275');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('121', '18', 'Present', '90', '2024-10-15', '2024-10-16 00:48:54.59556', '2024-10-16 00:48:54.59556');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('122', '18', 'Present', '92', '2024-10-15', '2024-10-16 00:48:54.59704', '2024-10-16 00:48:54.59704');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('123', '18', 'Present', '93', '2024-10-15', '2024-10-16 00:48:54.59841', '2024-10-16 00:48:54.59841');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('124', '18', 'Present', '95', '2024-10-15', '2024-10-16 00:48:54.60071', '2024-10-16 00:48:54.60071');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('125', '18', 'Present', '97', '2024-10-15', '2024-10-16 00:48:54.60228', '2024-10-16 00:48:54.60228');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('126', '18', 'Present', '98', '2024-10-15', '2024-10-16 00:48:54.60339', '2024-10-16 00:48:54.60339');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('127', '16', 'Permission', '91', '2024-10-15', '2024-10-16 01:38:25.35438', '2024-10-16 01:38:25.35438');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('132', '17', 'Present', '91', '2024-10-16', '2024-10-16 12:03:25.20888', '2024-10-16 12:03:25.20888');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('133', '17', 'Present', '93', '2024-10-16', '2024-10-16 12:03:25.21161', '2024-10-16 12:03:25.21161');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('134', '22', 'Present', '90', '2024-10-16', '2024-10-16 21:04:44.57136', '2024-10-16 21:04:44.57136');
INSERT INTO `tb_attendance` (`id`, `Class_id`, `Attendance`, `Stu_id`, `Date`, `Create_at`, `Update_at`) VALUES ('135', '22', 'Permission', '91', '2024-10-16', '2024-10-16 21:04:44.58780', '2024-10-16 21:04:44.58780');




CREATE TABLE `tb_class` (
  `ClassID` int(6) NOT NULL AUTO_INCREMENT,
  `Class_name` varchar(30) DEFAULT NULL,
  `Class_Type` varchar(1) DEFAULT NULL,
  `Teacher_id` int(6) DEFAULT NULL,
  `course_id` int(6) DEFAULT NULL,
  `Time_in` varchar(10) DEFAULT NULL,
  `Time_out` varchar(10) DEFAULT NULL,
  `Shift` varchar(15) DEFAULT NULL,
  `Start_class` date DEFAULT NULL,
  `End_class` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ClassID`) USING BTREE,
  KEY `Teacher_id` (`Teacher_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `tb_class_ibfk_1` FOREIGN KEY (`Teacher_id`) REFERENCES `tb_teacher` (`id`),
  CONSTRAINT `tb_class_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `tb_course` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('16', 'A001', '', '12', '164', '7', '9', 'PM', '', '2024-10-14', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('17', 'A002', '', '13', '165', '9', '11', 'AM', '', '0000-00-00', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('18', 'A003', '', '12', '164', '7', '9', 'PM', '', '2024-10-14', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('19', 'A001', '', '13', '166', '', '', 'AM', '', '2024-12-15', '', '', 'disable');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('21', '', '', '', '', '', '', 'AM', '', '0000-00-00', '', '', 'disable');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('22', 'A00014', '', '13', '164', '7', '11', 'FULL', '2024-10-16', '2024-10-16', '', '', 'active');




CREATE TABLE `tb_course` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Course_name` varchar(50) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `Sub_id` int(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`),
  KEY `subjectFK` (`Sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('164', 'Khmer full time', 'bg-secondary', '2', '2024-10-14', '2024-10-16 16:04:10.45081', '2024-10-16 16:04:10.45081');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('165', 'English full time', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('166', 'HSK1', '', '3', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('168', 'Starter', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('169', 'Nursery I ', 'bg-primary', '2', '2024-10-14', '2024-10-16 16:03:28.39483', '2024-10-16 16:03:28.39483');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('170', 'Nursery II', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('171', 'Nursery III', 'bg-primary', '1', '2024-10-14', '2024-10-16 16:02:56.74062', '2024-10-16 16:02:56.74062');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('172', 'Let\'s Go 1', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('173', 'Let\'s Go 2', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('174', 'Let\'s Go 3', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('175', 'Let\'s Go 4', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('178', 'Khmer ', 'bg-primary', '1', '2024-10-16', '', '');




CREATE TABLE `tb_login` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(6) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `Role` enum('admin','user') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_login` (`id`, `Teacher_id`, `Username`, `Password`, `Role`, `date`) VALUES ('1', '', 'Chamroeun', '1111', '', '2024-09-04');
INSERT INTO `tb_login` (`id`, `Teacher_id`, `Username`, `Password`, `Role`, `date`) VALUES ('2', '', 'Tii', '2222', 'admin', '');
INSERT INTO `tb_login` (`id`, `Teacher_id`, `Username`, `Password`, `Role`, `date`) VALUES ('4', '', 'Chet', '3333', 'user', '');
INSERT INTO `tb_login` (`id`, `Teacher_id`, `Username`, `Password`, `Role`, `date`) VALUES ('5', '', 'admin', 'admin', 'admin', '');




CREATE TABLE `tb_final_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Participation` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Final` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_final_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Final`, `Average`, `Status`, `Date`, `Stu_id`, `Create_at`, `Update_at`) VALUES ('1', '', '60', '60', '70', '69', '69', 'New', '2024-09-02', '', '2024-10-11 15:53:18.22319', '2024-10-11 15:53:18.22319');




CREATE TABLE `tb_mid_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Paticipantion` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Midterm` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_mid_score` (`id`, `Class_id`, `Homework`, `Paticipantion`, `Attendance`, `Midterm`, `Average`, `Status`, `Date`, `Stu_id`, `Create_at`, `Update_at`) VALUES ('1', '', '79', '50', '59', '79', '79', 'NEW', '2024-09-04', '', '2024-09-04 18:49:08.00000', '2024-09-04 18:49:11.00000');




CREATE TABLE `tb_month_score` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Class_id` int(10) DEFAULT NULL,
  `Homework` double DEFAULT NULL,
  `Participation` double DEFAULT NULL,
  `Attendance` double DEFAULT NULL,
  `Monthly` double DEFAULT NULL,
  `Average` double DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `for_month` varchar(100) DEFAULT NULL,
  `Stu_id` int(10) DEFAULT NULL,
  `Course_id` int(10) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT current_timestamp(5),
  `Update_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('12', '0', '99', '99', '99', '99', '99', '', '', '', '91', '', '2024-10-16 12:49:04.90918', '2024-10-16 12:49:04');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('13', '0', '99', '99', '88', '88', '93.5', '', '', '', '101', '', '2024-10-16 12:49:04.91706', '2024-10-16 12:49:04');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('14', '0', '77', '88', '8', '89', '65.5', '', '', '', '102', '', '2024-10-16 12:49:04.92332', '2024-10-16 12:49:04');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('15', '0', '78', '8', '89', '99', '68.5', '', '', '', '103', '', '2024-10-16 12:49:04.92674', '2024-10-16 12:49:04');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('16', '0', '99', '87', '67', '76', '82.25', '', '', '', '99', '', '2024-10-16 12:49:04.93183', '2024-10-16 12:49:04');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('17', '', '12', '76', '98', '80', '66.5', '', '', '', '90', '', '2024-10-16 21:03:37.80424', '2024-10-16 21:03:37');




CREATE TABLE `tb_monthly` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Class_id` int(6) DEFAULT NULL,
  `Course_id` int(6) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classFK` (`Class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;





CREATE TABLE `tb_sch_student` (
  `StuSch_id` int(6) NOT NULL AUTO_INCREMENT,
  `Class_id` int(6) DEFAULT NULL,
  `Time_in` time DEFAULT NULL,
  `Time_out` time DEFAULT NULL,
  `Start_class` date DEFAULT NULL,
  `End_Class` date DEFAULT NULL,
  `Monday` varchar(255) DEFAULT NULL,
  `Tuesday` varchar(255) DEFAULT NULL,
  `Wednesday` varchar(255) DEFAULT NULL,
  `Thursday` varchar(255) DEFAULT NULL,
  `Friday` varchar(255) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`StuSch_id`),
  KEY `ClassSCH` (`Class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



