

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
  `status` varchar(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL ON UPDATE current_timestamp(5),
  `Update_at` datetime(5) DEFAULT NULL ON UPDATE current_timestamp(5),
  PRIMARY KEY (`id`),
  KEY `En_name` (`En_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `status`, `Date`, `Create_at`, `Update_at`) VALUES ('12', '', 'Saran Chamroeuns', 'សុន មាន', 'T-1', '', '', '2024-10-17', 'web', 'Siem Reap', '010 70 2 84', 'web', '', 'disable', '', '2024-10-17 05:06:21.22135', '2024-10-17 05:06:21.22135');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `status`, `Date`, `Create_at`, `Update_at`) VALUES ('13', '', 'Chet', 'ចិត្រ', 'T-2', '', '', '0000-00-00', '', '', '', '', '', 'active', '', '2024-10-17 04:46:46.83084', '2024-10-17 04:46:46.83084');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `status`, `Date`, `Create_at`, `Update_at`) VALUES ('14', '', 'Muon Piti', 'piti', '', '', '', '2024-10-16', '', '', '', '', '', 'active', '', '2024-10-17 04:48:41.34836', '2024-10-17 04:48:41.34836');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `status`, `Date`, `Create_at`, `Update_at`) VALUES ('15', '', 'Chan Sovanara', 'ច័ន្ទ សុវណ្ណារ៉ា', 'SIST-01', 'ប្រុស', '', '1990-02-26', 'គ្រូបង្រៀន', 'សៀមរាប', '016​ 123 321', 'ខ្មែរ', 'ខ្មែរ', 'active', '', '2024-10-17 04:30:58.18279', '2024-10-17 04:30:58.18279');
INSERT INTO `tb_teacher` (`id`, `Profile_img`, `En_name`, `Kh_name`, `Staff_code`, `Gender`, `Age`, `DOB`, `Position`, `Address`, `Phone`, `Nation`, `Ethnicity`, `status`, `Date`, `Create_at`, `Update_at`) VALUES ('16', '', 'Teacher1', 'សុន មាន', '662823', 'ប្រុស', '', '2024-10-17', 'web', '', '', 'web', '', 'active', '', '', '');




CREATE TABLE `tb_student` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Stu_code` varchar(10) DEFAULT NULL,
  `En_name` varchar(50) DEFAULT NULL,
  `Kh_name` varchar(50) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `Create_at` date DEFAULT NULL,
  `Update_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `Profile_img` varchar(255) DEFAULT NULL,
  `Dad_name` varchar(50) DEFAULT NULL,
  `Mom_name` varchar(50) DEFAULT NULL,
  `Dad_job` varchar(100) DEFAULT NULL,
  `Mom_job` varchar(100) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('89', 'SIS-0012', 'Brak SaiviChhou', 'ប្រាក់ ស៊ីវីឈូ', '', '2019-02-02', 'សៀមរាប\r\n', 'disable', '', '2024-10-17 15:59:37', '455759676_1845419689304169_348413088179969606_n.jpg', 'សួស ប្រាក់', 'នួន ម៉ាស៊ី', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '010 001 101');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('90', 'SIS-002', 'Shok Virak', 'សុខ វីរៈ', 'ស្រី', '2019-01-23', 'សៀមរាប', 'disable', '', '2024-10-17 06:36:39', 'download.jpg', 'កៅ សុខ', 'ណា សុខវី', 'កសិករ', 'មេផ្ទះ', '010 002 102');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('91', 'SIS-003', 'Mean Son', 'សុន មាន', 'ប្រុស', '2019-03-06', 'សៀមរាប', 'active', '', '2024-10-17 06:08:50', '455759676_1845419689304169_348413088179969606_n.jpg', 'ស៊ាន សុន', 'សៅ កញ្ញា', 'កសិករ', 'កសិករ', '010 702 840');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('92', 'SIS-004', 'Nun Thanou', 'នុន​ ថានូ', 'ប្រុស', '2018-05-07', ' សៀមរាប\r\n', 'disable', '', '2024-10-17 06:38:34', 'images (4).jpg', 'តែ ខានុន', 'នៅ ស៊ីថា', 'អាជីវករ', 'មេផ្ទះ', '010 003 103');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('93', 'SIS-005', 'Sav Davy', 'សៅ ដាវី', 'ស្រី', '2020-06-02', 'សៀមរាប', 'disable', '', '2024-10-17 06:38:24', 'images (5).jpg', 'នាង សៅ', 'អក ណាវី', 'អាជីវករ', 'មេផ្ទះ', '010 004 104');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('95', 'SIS-006', 'Mao Socheata', 'ម៉ៅ សុជាតា', 'ស្រី', '2019-03-05', 'សៀមរាប', 'disable', '', '2024-10-17 06:38:37', 'images (2).jpg', 'កៅ ម៉ៅ', 'សាន្ត សុជា', 'អាជីវករ', 'មេផ្ទះ', '010 005 105');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('97', 'SIS-007', 'Phol Phanuth', 'ផល ផានុត', 'Male', '2020-06-23', 'Siem reap', 'disable', '', '2024-10-17 06:39:17', 'images (9).jpg', ' ជួន សុផល ', 'អៀង សុខផា', 'មន្ត្រីរាជការ', 'អាជីវករ', '010 006 106');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('98', 'SIS-008', 'Vanna Maiya', 'វណ្ណា ម៉ៃយ៉ា', 'ស្រី', '2019-12-15', 'សៀមរាប\r\n', 'disable', '', '2024-10-17 06:36:51', 'images (8).jpg', 'ថាវ សុវណ្ណ', 'សៀវ ម៉ៃ', 'មន្ត្រីរាជការ', 'អាជីវករ', '010 007 107');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('99', 'SIS-009', 'Sara Vita', 'សារ៉ា វីតា', 'Female', '2019-02-28', 'Siem reap', 'disable', '', '2024-10-17 06:38:59', 'images (8).jpg', 'ហ៊ន សារ៉ា', 'ឆេង ណាវី', 'អាជីវករ', 'អាជីវករ', '010 008 108');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('100', 'SIS-010', 'Sara Vitu', 'សារ៉ា វីទូ', 'ប្រុស', '2019-02-03', 'សៀមរាប\r\n', 'disable', '', '2024-10-17 06:38:30', 'images (3).jpg', 'ហ៊ន សារ៉ា', 'ឆេង ណាវី', 'អាជីវករ', 'អាជីវករ', '010 009 109');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('101', 'SIS-011', 'Si Ratheb', 'សិក រ៉ាថេប', 'ស្រី', '2020-10-19', 'សៀមរាប', 'disable', '', '2024-10-17 06:36:58', 'images (7).jpg', 'អ៊ុក ណាសិក', 'តូច សុណា', 'នគរបាល', 'មេផ្ទះ', '010 010 110');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('102', 'SIS-012', 'Pich Rathana', 'ពេជ្រ រតនា', 'ប្រុស', '2019-05-23', 'សៀមរាប', 'disable', '', '2024-10-17 06:39:04', 'images (10).jpg', 'សារ៉ុន ពេជ្រ', 'កែវ សុខណា', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '011 001 101');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('103', 'SIS-013', 'Pav Sokhy', 'ប៉ាវ សុខី', 'ស្រី', '2019-07-07', 'សៀមរាប', 'active', '', '2024-10-17 06:11:58', 'images (8).jpg', 'ស៊ីង ប៉ាវ', 'ជុំ មូលីកា', 'អាជីវករ', 'មេផ្ទះ', '011 002 102');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('104', 'SIS-014', 'Muny Mean', 'មុនី មាន', 'ប្រុស', '2021-02-16', 'សៀមរាប', 'active', '', '2024-10-17 06:12:03', 'photo_2023-06-25_00-46-15.jpg', 'ឈុន មុនី', 'សោម សារឿន', 'អ្នកនេសាទ', 'មេផ្ទះ', '010 702 684');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('105', 'SIS-015', 'Muny Chetra', 'មុនី ចិត្រា', 'ប្រុស', '2022-06-16', 'សៀមរាប', 'active', '', '2024-10-17 06:12:09', 'images.jpg', 'ឈុន មុនី', 'សោម សារឿន', 'អ្នកនេសាទ', 'អ្នកនេសាទ', '010 702 844');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('107', 'SIS-007', 'Muon Piti', 'មួន ពិទិ', 'ប្រុស', '2020-06-16', 'សៀមរាប', 'disable', '', '2024-10-17 06:38:40', 'images (2).jpg', 'តា ហូ', 'យាយ កី', 'កសិករ', 'មេផ្ទះ', '069 600​​ 900');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('109', 'SIS-001', 'Brak Saivichhou', 'ប្រាក់ ស៊ីវីឈូ', 'ប្រុស', '2018-03-17', ' សៀមរាប\r\n', 'active', '', '2024-10-17 06:12:23', 'IMG_20230606_174456.png', 'សួស ប្រាក់', 'នួន ម៉ាស៊ី', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '010 101 101');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('110', 'SIS-009', 'Chea Chandara', 'ជា ចាន់ដារ៉ា', 'ប្រុស', '2021-12-17', 'សៀមរាប', 'active', '', '2024-10-17 06:37:36', 'photo_2022-08-22_13-42-11.jpg', 'ឆឹង សុខជា', 'ទិ សារិ', 'មន្ត្រីរាជការ', 'មេផ្ទះ', '010 505 105');
INSERT INTO `tb_student` (`ID`, `Stu_code`, `En_name`, `Kh_name`, `Gender`, `DOB`, `Address`, `status`, `Create_at`, `Update_at`, `Profile_img`, `Dad_name`, `Mom_name`, `Dad_job`, `Mom_job`, `Phone`) VALUES ('111', 'IT-1111', 'Muon Piti', 'មួន ពិទិ', 'ប្រុស', '2024-10-17', '', 'active', '', '', 'images (5).jpg', 'Dad', 'Mom', 'Web', '', '');




CREATE TABLE `tb_subject` (
  `SubID` int(10) NOT NULL AUTO_INCREMENT,
  `Subject_name` varchar(50) DEFAULT NULL,
  `Color` varchar(40) DEFAULT NULL,
  `Create_at` timestamp(5) NULL DEFAULT NULL,
  `Update_at` datetime(5) DEFAULT NULL,
  PRIMARY KEY (`SubID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('1', 'ថ្នាក់ភាសាខ្មែរ', 'bg-warning', '2024-09-04 18:44:06.00000', '2024-09-04 18:44:09.00000');
INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('2', 'ថ្នាក់ភាសាអង់គ្លេស', 'bg-danger', '2024-09-03 18:45:10.00000', '2024-09-04 18:45:15.00000');
INSERT INTO `tb_subject` (`SubID`, `Subject_name`, `Color`, `Create_at`, `Update_at`) VALUES ('3', 'ថ្នាក់ភាសាចិន', 'bg-success', '2024-09-02 18:13:43.00000', '2024-09-01 18:13:48.00000');




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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('36', '89', '23', '2024-10-16 21:23:39', '2024-10-16 21:23:39');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('37', '90', '23', '2024-10-16 21:23:39', '2024-10-16 21:23:39');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('38', '93', '23', '2024-10-17 00:34:56', '2024-10-17 00:34:56');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('39', '89', '16', '2024-10-17 04:02:50', '2024-10-17 04:02:50');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('40', '90', '16', '2024-10-17 04:02:50', '2024-10-17 04:02:50');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('41', '91', '16', '2024-10-17 04:02:50', '2024-10-17 04:02:50');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('42', '89', '19', '2024-10-17 07:28:27', '2024-10-17 07:28:27');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('44', '103', '17', '2024-10-17 16:04:52', '2024-10-17 16:04:52');
INSERT INTO `tb_add_to_class` (`id`, `Stu_id`, `Class_id`, `Create_at`, `Update_at`) VALUES ('45', '104', '17', '2024-10-17 16:04:52', '2024-10-17 16:04:52');




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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('16', 'A002', '', '12', '166', '7', '9', 'ពេលរសៀល', '', '2024-10-14', '', '', 'disable');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('17', 'A002', '', '13', '165', '9', '11', 'ពេលរសៀល', '', '0000-00-00', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('18', 'A003', '', '12', '164', '7', '9', 'ពេលរសៀល', '', '2024-10-14', '', '', 'disable');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('19', 'A001', '', '13', '166', '', '', 'ពេលព្រឹក', '', '2024-12-15', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('22', 'A00014', '', '13', '164', '7', '11', 'ពេញម៉ោង', '2024-10-16', '2024-10-16', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('23', 'A00014', '', '14', '169', '7', '11', 'ពេញម៉ោង', '2024-10-16', '2024-10-16', '', '', 'active');
INSERT INTO `tb_class` (`ClassID`, `Class_name`, `Class_Type`, `Teacher_id`, `course_id`, `Time_in`, `Time_out`, `Shift`, `Start_class`, `End_class`, `Create_at`, `Update_at`, `status`) VALUES ('24', 'A00122', '', '15', '170', '7', '8', 'ពេញម៉ោង', '2024-10-17', '2024-10-17', '', '', 'active');




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
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('164', 'Khmer full time', 'bg-secondary', '2', '2024-10-14', '2024-10-16 16:04:10.45081', '2024-10-16 16:04:10.45081');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('165', 'English full time', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('166', 'HSK1', '', '3', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('168', 'Starter', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('169', 'Nursery I ', 'bg-primary', '2', '2024-10-14', '2024-10-16 16:03:28.39483', '2024-10-16 16:03:28.39483');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('170', 'Nursery II', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('171', 'Nursery III', 'bg-primary', '1', '2024-10-14', '2024-10-16 16:02:56.74062', '2024-10-16 16:02:56.74062');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('172', 'Let\'s Go 1', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('173', 'Let\'s Go 2', 'bg-primary', '2', '2024-10-14', '2024-10-17 03:40:09.92595', '2024-10-17 03:40:09.92595');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('174', 'Let\'s Go 3', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('179', 'test1', '', '2', '2024-10-17', '', '');




CREATE TABLE `tb_login` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `Teacher_id` int(6) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `Role` enum('admin','user') DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('155', '17', '53', '53', '53', '53', '53', 'Active', '', 'First Month', '91', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('156', '17', '59', '59', '59', '59', '59', 'Active', '', 'First Month', '91', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('157', '17', '55', '55', '55', '55', '55', 'Active', '', 'First Month', '91', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('158', '17', '55', '55', '55', '55', '55', 'Active', '', 'First Month', '91', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('159', '17', '66', '66', '66', '66', '66', 'Active', '', 'First Month', '93', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('160', '17', '66', '66', '66', '66', '66', 'Active', '', 'First Month', '93', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('161', '17', '65', '65', '65', '65', '65', 'Active', '', 'First Month', '93', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('162', '17', '89', '89', '89', '89', '89', 'Active', '', 'First Month', '93', '', '2024-10-17 12:04:23.00000', '2024-10-17 12:04:23');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('163', '19', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('164', '19', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('165', '19', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('166', '19', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('167', '19', '76', '76', '76', '76', '76', 'Active', '', 'First Month', '89', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('168', '19', '76', '76', '76', '76', '76', 'Active', '', 'First Month', '89', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('169', '19', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '89', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('170', '19', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '89', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('171', '19', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '104', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('172', '19', '89', '89', '89', '89', '89', 'Active', '', 'First Month', '104', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('173', '19', '89', '89', '89', '89', '89', 'Active', '', 'First Month', '104', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('174', '19', '98', '98', '98', '98', '98', 'Active', '', 'First Month', '104', '', '2024-10-17 12:05:02.00000', '2024-10-17 12:05:02');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('175', '22', '56', '56', '56', '56', '56', 'Active', '', 'First Month', '90', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('176', '22', '6', '6', '6', '6', '6', 'Active', '', 'First Month', '90', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('177', '22', '56', '56', '56', '56', '56', 'Active', '', 'First Month', '90', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('178', '22', '6', '6', '6', '6', '6', 'Active', '', 'First Month', '90', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('179', '22', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('180', '22', '76', '76', '76', '76', '76', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('181', '22', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('182', '22', '67', '67', '67', '67', '67', 'Active', '', 'First Month', '91', '', '2024-10-17 12:05:29.00000', '2024-10-17 12:05:29');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('183', '23', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '89', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('184', '23', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '89', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('185', '23', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '89', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('186', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '89', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('187', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '90', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('188', '23', '45', '45', '45', '45', '45', 'Active', '', 'First Month', '90', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('189', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '90', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('190', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '90', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('191', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '93', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('192', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '93', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('193', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '93', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');
INSERT INTO `tb_month_score` (`id`, `Class_id`, `Homework`, `Participation`, `Attendance`, `Monthly`, `Average`, `Status`, `Date`, `for_month`, `Stu_id`, `Course_id`, `Create_at`, `Update_at`) VALUES ('194', '23', '54', '54', '54', '54', '54', 'Active', '', 'First Month', '93', '', '2024-10-17 12:06:13.00000', '2024-10-17 12:06:13');




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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_sch_student` (`StuSch_id`, `Class_id`, `Time_in`, `Time_out`, `Start_class`, `End_Class`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Create_at`, `Update_at`) VALUES ('4', '', '', '', '', '', 'hbjhbjbh', 'hbbh', 'h', 'ghhg', 'gghg', '0000-00-00 00:00:00.00000', '');
INSERT INTO `tb_sch_student` (`StuSch_id`, `Class_id`, `Time_in`, `Time_out`, `Start_class`, `End_Class`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Create_at`, `Update_at`) VALUES ('5', '', '', '', '', '', '', '', '', '', '', '', '');


