/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - faculty_monitoring
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`faculty_monitoring` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `faculty_monitoring`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `usertype` int(2) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `facultyId` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account` */

insert  into `account`(`id`,`firstname`,`lastname`,`username`,`password`,`usertype`,`photo`,`facultyId`) values 
(1,'admin','admin','admin','$2y$10$wMs4YPg.R51pRClv4PaXi.bY2.OBc2MsgakyKWozcVJmAmkauwFL2',1,NULL,NULL),
(2,'Ana1','Vocal Jr.','dean','$2y$10$ibNGFfQw6cZRKWaj5YsqW.wjZzlscAgx0jpdzuRLii65vXHSiSu4y',2,'Vocal Jr._1670154309.jpg',5),
(3,'Jane','Santos','1234','$2y$10$Fe3GaezStPa5KNkMlZ6P6uIjtHnBSDntQ3nzN6rcZtQsoYoFf/Np.',3,'Santos_1670154345.jpg',6),
(4,'11','11','12345','$2y$10$L2OWygDYv9XY06J3LB5ri.oSwBqNjmsnQjICopCZiH0apywg59dxO',3,'11_1670639014.jpg',7),
(5,'elmer','calo;pe','103645-1','$2y$10$ByG336Lz.NjWGR8jIqPtAOH9ldRzXIo5JSbusLRtUfqDQBR4OUGcG',3,'calo;pe_1670656665.jpg',8),
(6,'Geraldine','Mangmang','123-1','$2y$10$0SqvO3cLSrzFR09BdmNUm.V61BZU9QFis6wNvqGWNMQ2RaAdExWB6',2,'Mangmang_1670657305.jpg',9),
(7,'Jorton','Tagud','1234-5','$2y$10$s5NzYuryhfJKRXhcvDtzF.PJQsEi9frBH62msGdwCoORZ3Jr13Irq',3,'Tagud_1670658499.jpg',10);

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `designation` */

insert  into `designation`(`id`,`name`,`created_at`) values 
(1,'Intructor I','2022-12-04 13:33:51'),
(2,'Intructor II','2022-12-04 13:34:02'),
(3,'Professor I','2022-12-04 13:34:15'),
(4,'Dean','2022-12-04 13:34:19'),
(5,'Head','2022-12-04 13:34:23'),
(6,'CCSIT','2022-12-08 20:35:57');

/*Table structure for table `expertise` */

DROP TABLE IF EXISTS `expertise`;

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(12) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` int(2) DEFAULT NULL COMMENT '1=expertise 2=research',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

/*Data for the table `expertise` */

insert  into `expertise`(`id`,`empId`,`description`,`created_at`,`type`) values 
(1,1,NULL,'2022-12-04 14:05:41',1),
(2,1,NULL,'2022-12-04 14:05:41',1),
(3,2,'rer','2022-12-04 14:06:56',1),
(4,2,'tyrrt','2022-12-04 14:06:56',1),
(5,3,'DES','2022-12-04 14:19:30',1),
(6,3,'ERT','2022-12-04 14:19:30',1),
(7,3,'U','2022-12-04 14:19:30',1),
(20,4,'des','2022-12-04 15:34:31',1),
(21,4,'der','2022-12-04 15:34:31',1),
(22,5,'NEtworiking','2022-12-04 19:45:10',1),
(23,5,'Programming','2022-12-04 19:45:11',1),
(24,5,'UI Deisgnser','2022-12-04 19:45:11',1),
(25,6,'NEtworiking','2022-12-04 19:45:45',1),
(26,6,'Programming','2022-12-04 19:45:46',1),
(27,6,'UI Deisgnser','2022-12-04 19:45:46',1),
(28,7,'1','2022-12-10 10:23:37',1),
(29,7,'2','2022-12-10 10:23:38',1),
(31,10,'Programmer','2022-12-10 15:48:19',1),
(32,10,'UI','2022-12-10 15:48:19',1),
(36,8,'programer','2022-12-10 15:53:00',1),
(37,8,'Designer III','2022-12-10 15:53:00',1),
(38,8,'Programmer','2022-12-10 15:53:00',1);

/*Table structure for table `faculty` */

DROP TABLE IF EXISTS `faculty`;

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `designation` int(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` int(1) DEFAULT 1,
  `photo` varchar(200) DEFAULT NULL,
  `employeeId` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `faculty` */

insert  into `faculty`(`id`,`firstname`,`middlename`,`lastname`,`sex`,`designation`,`created_at`,`active`,`photo`,`employeeId`) values 
(2,'james',NULL,'Juansda','male',1,'2022-12-04 14:06:56',1,'Juansda_1670134016.jpg',NULL),
(4,'JMEA333','Prose','Yepes','male',1,'2022-12-04 15:29:38',1,'Yepes_1670134790.jpg',NULL),
(5,'Ana',NULL,'Vocal Jr.','female',3,'2022-12-04 19:45:10',1,'Vocal Jr._1670154309.jpg','123'),
(6,'Jane',NULL,'Santos','female',3,'2022-12-04 19:45:45',1,'Santos_1670154345.jpg','1234'),
(7,'11',NULL,'11','female',2,'2022-12-10 10:23:35',1,'11_1670639014.jpg','1'),
(8,'James Bryan',NULL,'Flores','male',5,'2022-12-10 15:53:00',1,'Flores_1670658697.jpg','103645-1'),
(9,'Geraldine',NULL,'Mangmang','female',4,'2022-12-10 15:28:25',1,'Mangmang_1670657305.jpg','123-1'),
(10,'Jorton',NULL,'Tagud','male',1,'2022-12-10 15:48:19',1,'Tagud_1670658499.jpg','1234-5');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timein` varchar(50) DEFAULT NULL,
  `timeout` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `fId` int(12) DEFAULT NULL,
  `fromdate` varchar(50) DEFAULT NULL,
  `todate` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `schedule` */

insert  into `schedule`(`id`,`timein`,`timeout`,`status`,`remarks`,`fId`,`fromdate`,`todate`) values 
(3,'2022-12-10 02:14:01','2022-12-11 01:55:04',NULL,NULL,5,'2022-12-11','2022-12-12'),
(4,NULL,NULL,'ON LEAVE','2022-12-11 - 2022-12-13',7,'2022-12-11','2022-12-13'),
(5,'2022-12-10 05:37:07',NULL,NULL,NULL,6,NULL,NULL),
(6,'2022-12-10 07:19:36',NULL,NULL,NULL,8,NULL,NULL),
(7,NULL,NULL,'ON TRAVEL','2022-12-09 - 2022-12-23',10,'2022-12-09','2022-12-23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
