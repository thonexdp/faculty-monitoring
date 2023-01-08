/*
SQLyog Professional v13.1.1 (64 bit)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `account` */

insert  into `account`(`id`,`firstname`,`lastname`,`username`,`password`,`usertype`,`photo`,`facultyId`) values 
(1,'admin','admin','admin','$2y$10$wMs4YPg.R51pRClv4PaXi.bY2.OBc2MsgakyKWozcVJmAmkauwFL2',1,NULL,NULL),
(2,'Ana','Vocal Jr.','123','$2y$10$ibNGFfQw6cZRKWaj5YsqW.wjZzlscAgx0jpdzuRLii65vXHSiSu4y',2,'Vocal Jr._1670154309.jpg',5),
(3,'Jane','Santos','1234','$2y$10$Fe3GaezStPa5KNkMlZ6P6uIjtHnBSDntQ3nzN6rcZtQsoYoFf/Np.',3,'Santos_1670154345.jpg',6);

/*Table structure for table `designation` */

DROP TABLE IF EXISTS `designation`;

CREATE TABLE `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `designation` */

insert  into `designation`(`id`,`name`,`created_at`) values 
(1,'Intructor I','2022-12-04 13:33:51'),
(2,'Intructor II','2022-12-04 13:34:02'),
(3,'Professor I','2022-12-04 13:34:15'),
(4,'Dean','2022-12-04 13:34:19'),
(5,'Head','2022-12-04 13:34:23');

/*Table structure for table `expertise` */

DROP TABLE IF EXISTS `expertise`;

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(12) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` int(2) DEFAULT NULL COMMENT '1=expertise 2=research',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

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
(27,6,'UI Deisgnser','2022-12-04 19:45:46',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `faculty` */

insert  into `faculty`(`id`,`firstname`,`middlename`,`lastname`,`sex`,`designation`,`created_at`,`active`,`photo`,`employeeId`) values 
(2,'james',NULL,'Juansda','male',1,'2022-12-04 14:06:56',1,'Juansda_1670134016.jpg',NULL),
(4,'JMEA333','Prose','Yepes','male',1,'2022-12-04 15:29:38',1,'Yepes_1670134790.jpg',NULL),
(5,'Ana',NULL,'Vocal Jr.','female',3,'2022-12-04 19:45:10',1,'Vocal Jr._1670154309.jpg','123'),
(6,'Jane',NULL,'Santos','female',3,'2022-12-04 19:45:45',1,'Santos_1670154345.jpg','1234');

/*Table structure for table `schedule` */

DROP TABLE IF EXISTS `schedule`;

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timein` varchar(50) DEFAULT NULL,
  `timeout` varchar(50) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `fId` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `schedule` */

insert  into `schedule`(`id`,`timein`,`timeout`,`status`,`remarks`,`fId`) values 
(3,'2022-12-07 05:11:04',NULL,NULL,NULL,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
