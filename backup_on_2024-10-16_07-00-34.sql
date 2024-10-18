

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
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('164', 'Khmer full time', 'bg-success', '1', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('165', 'English full time', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('166', 'HSK1', '', '3', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('168', 'Starter', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('169', 'Nursery I ', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('170', 'Nursery II', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('171', 'Nursery III', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('172', 'Let\'s Go 1', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('173', 'Let\'s Go 2', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('174', 'Let\'s Go 3', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('175', 'Let\'s Go 4', '', '2', '2024-10-14', '', '');
INSERT INTO `tb_course` (`id`, `Course_name`, `Color`, `Sub_id`, `Date`, `Create_at`, `Update_at`) VALUES ('176', 'Let\'s Go 5', '', '2', '2024-10-14', '', '');


