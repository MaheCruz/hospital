/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.22-MariaDB : Database - hms
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP DATABASE `hms`;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hms` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `hms`;


/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`updationDate`) values (1,'admin','admin@test','28-02-2024 11:42:05 AM');

/*Table structure for table `appointment` */

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `appointment` */

insert  into `appointment`(`id`,`doctorSpecialization`,`doctorId`,`userId`,`consultancyFees`,`appointmentDate`,`appointmentTime`,`postingDate`,`userStatus`,`doctorStatus`,`updationDate`) 
  values (1,'Medico General',6,2,2500,'2024-01-01','8:15 AM','2024-03-10 14:31:28',1,0,'0000-00-00 00:00:00'),
  (2,'Pedriatria',7,6,600,'2024-01-01','8:15 AM','2024-03-10 14:31:28',1,0,'0000-00-00 00:00:00'),
  (3,'Pedriatria',7,6,600,'2024-03-01','9:15 AM','2024-03-10 13:31:28',1,0,'0000-00-00 00:00:00'),
  (4,'Psicologia',5,5,850,'2024-03-11','1:00 PM','2024-03-11 05:28:54',1,1,'0000-00-00 00:00:00'),
  (5,'Terapia Fisica',9,7,500,'2024-02-10','5:30 PM','2024-02-10 13:41:34',1,0,'2024-03-15 13:48:30'),
  (6,'Medico General',6,2,2500,'2024-13-10','6:30 PM','2024-13-10 16:24:38',1,1,NULL);

/*Table structure for table `doctors` */

DROP TABLE IF EXISTS `doctors`;

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `consultorio` varchar(255) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `doctors` */

insert  into `doctors`(`id`,`specilization`,`doctorName`,`address`,`docFees`,`contactno`,`consultorio`,`docEmail`,`password`,`creationDate`,`updationDate`) 
values (1,'Dentista','Francisco Perez','Tulipanes Sur, Pachuca','500',8285703354,'102 - 1er Piso B','paco@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-12-29 01:25:37','2024-01-30 07:11:05'),
(2,'Cardiologa','Sandra Tovar','Cubitos, Pachuca','600',2147483647,'103 - 1er Piso C','sandra@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-12-29 01:51:51','0000-00-00 00:00:00'),
(3,'Cirugia General','Rosalia Montes','Xochihuacan, Mineral de Reforma','700',8523699999,'101 - 1er Piso A','rosalia@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-01-07 02:43:35','0000-00-00 00:00:00'),
(4,'Gastroenterología','Vanessa Cruz','Pachuquilla, Mineral de Reforma','300',25668888,'201 - 2do Piso A','vanessa@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-01-07 02:45:09','0000-00-00 00:00:00'),
(5,'Psicologia','David Mendoza','Zona Plteada, Pachuca','850',442166644646,'305 - 3er Piso E','david@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-01-07 02:47:07','0000-00-00 00:00:00'),
(6,'Medico General','Armando Fuentes','Mineral de la Reforma','2500',45497964,'301 - 3er Piso A','armando@gmail.com','f925916e2754e5e03f75dd58a5733251','2024-01-07 02:52:50','0000-00-00 00:00:00'),
(7,'Pedriatria','Gregorio Hernandez','Plutarco, Pachuca','600',852888888,'202 - 2do Piso B','test@demo.com','f925916e2754e5e03f75dd58a5733251','2024-01-07 03:08:58','2024-02-23 13:17:25'),
(8,'Dermatologia','Keyla Martinez','Santa Julia, Pachuca','150',1234567890,'304 - 3er Piso D','test@test.com','202cb962ac59075b964b07152d234b70','2024-01-23 12:57:43','2024-02-23 13:06:06'),
(9,'Terapia Fisica','Anastasia Huerta','Villas de Pachuca, Pachuca','500',1234567890,'302 - 3er Piso B','ana@gmail.com','f925916e2754e5e03f75dd58a5733251','2024-02-10 13:37:47','2024-02-10 13:38:10');

/*Table structure for table `doctorslog` */

DROP TABLE IF EXISTS `doctorslog`;

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `doctorslog` */

insert  into `doctorslog`(`id`,`uid`,`username`,`userip`,`loginTime`,`logout`,`status`) values 
(20,7,'test@demo.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2022-07-15 15:59:57','16-07-2022 02:30:39 AM',1),
(21,7,'test@demo.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2022-07-15 16:25:47','16-07-2022 02:56:57 AM',1);

/*Table structure for table `doctorspecilization` */

DROP TABLE IF EXISTS `doctorspecilization`;

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `doctorspecilization` */

insert  into `doctorspecilization`(`id`,`specilization`,`creationDate`,`updationDate`) values
 (1,'Dentista','2023-12-28 01:37:25','0000-00-00 00:00:00'),
 (2,'Cardiologa','2023-12-28 01:38:12','0000-00-00 00:00:00'),
 (3,'Dermatolgia','2023-12-28 01:38:48','0000-00-00 00:00:00'),
 (4,'Cirugia General','2023-12-28 01:39:26','0000-00-00 00:00:00'),
 (5,'Medico General','2023-12-28 01:39:51','0000-00-00 00:00:00'),
 (6,'Gastroenterología','2023-12-28 01:40:08','0000-00-00 00:00:00'),
 (7,'Psicologia','2023-12-28 01:41:18','0000-00-00 00:00:00'),
 (9,'Terapia Fisica','2023-12-28 02:37:39','0000-00-00 00:00:00'),
 (10,'Medicina Interna','2023-01-07 03:07:53','0000-00-00 00:00:00'),
 (11,'Oftalmología','2023-06-23 12:51:06','2023-06-23 12:55:06'),
 (12,'Pediatria','2023-11-10 13:36:36','2024-01-10 13:36:50');

/*Table structure for table `tblcontactus` */

DROP TABLE IF EXISTS `tblcontactus`;

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tblcontactus` */

insert  into `tblcontactus`(`id`,`fullname`,`email`,`contactno`,`message`,`PostingDate`,`AdminRemark`,`LastupdationDate`,`IsRead`) values
 (1,'Juan Ramirez','juan@gmail.com',2523523522523523,' This is sample text for the test.','2024-01-29 14:03:08','Test Admin ','2024-01-30 07:55:23',1),
 (2,'Ana Contreras','ana@gmail.com',2401301,'Testing.','2024-01-30 08:06:50',NULL,NULL,NULL),
 (3,'Daniela Velazquez','daniela@gmail.com',3264826346,' ejemplo','2024-02-10 13:53:48','comentario','2024-02-10 13:54:04',1);

/*Table structure for table `tblmedicalhistory` */

DROP TABLE IF EXISTS `tblmedicalhistory`;

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tblmedicalhistory` */

insert  into `tblmedicalhistory`(`ID`,`PatientID`,`BloodPressure`,`BloodSugar`,`Weight`,`Temperature`,`MedicalPres`,`CreationDate`) values 
(2,3,'120/185','80/120','85 Kg','101 degree','#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n','2024-01-05 23:20:07'),
(3,2,'90/120','92/190','86 kg','99 deg','#Sugar High\r\n1.Petz 30','2024-01-05 23:31:24'),
(4,1,'125/200','86/120','56 kg','98 deg','# blood pressure is high\r\n1.koil cipla','2024-01-05 23:52:42'),
(5,1,'96/120','98/120','57 kg','102 deg','#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M','2024-01-05 23:56:55'),
(6,4,'90/120','120','56','98 F','#blood sugar high\r\n#Asthma problem','2024-01-06 09:38:33'),
(7,5,'80/120','120','85','98.6','Rx\r\n\r\nAbc tab\r\nxyz Syrup','2024-01-10 13:50:23');

/*Table structure for table `tblpatient` */

DROP TABLE IF EXISTS `tblpatient`;

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tblpatient` */

insert  into `tblpatient`(`ID`,`Docid`,`PatientName`,`PatientContno`,`PatientEmail`,`PatientGender`,`PatientAdd`,`PatientAge`,`PatientMedhis`,`CreationDate`,`UpdationDate`) values
 (1,1,'Juan Ramirez',4558968789,'juan@gmail.com','Masculino','Villas Pachuca',26,'Diabetico','2024-01-04 16:38:06','2024-01-06 01:48:05'),
 (2,5,'Ana Contreras',9797977979,'ana@gmail.com','Femenino','Tulancingo',39,'No','2024-01-05 05:40:13','2024-01-05 06:53:45'),
 (3,7,'Daniela Velazquez',9878978798,'daniela@gmail.com','Femenino','Pachuca',46,'No','2024-01-05 05:49:41','2024-01-05 06:58:59'),
 (4,7,'Sofia Angeles',9888988989,'sofia@gmail.com','Femenino','Actopan',45,'Tiene Asma','2024-01-06 09:33:54','2024-01-06 09:34:31'),
 (5,9,'John',1234567890,'john@test.com','Masculino','Test ',25,'Puebla','2024-01-10 13:49:24',NULL);

/*Table structure for table `userlog` */

DROP TABLE IF EXISTS `userlog`;

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `userlog` */

insert  into `userlog`(`id`,`uid`,`username`,`userip`,`loginTime`,`logout`,`status`) values
 (24,NULL,'test@gmail.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2022-07-15 15:57:20',NULL,0),
 (25,2,'test@gmail.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2022-07-15 15:57:57','16-07-2022 02:29:28 AM',1),
 (26,2,'test@gmail.com','::1\0\0\0\0\0\0\0\0\0\0\0\0\0','2022-07-15 16:11:12','16-07-2022 02:55:17 AM',1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`fullName`,`address`,`city`,`gender`,`email`,`password`,`regDate`,`updationDate`) values 
(2,'Samantha Cruz','Cubitos' ,'Pachuca','Femenino','sam@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-12-29 01:51:51','0000-00-00 00:00:00'),
(4,'Ana Contreras','Centro' ,'Tulancingo','Femenino','ana@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-01-07 02:41:14','0000-00-00 00:00:00'),
(5,'Vanessa Cruz','Pachuquilla', 'Mineral de Reforma','Femenino','vanessa@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-01-07 03:00:26','0000-00-00 00:00:00'),
(6,'Juan Ramirez','Villas Pachuca','Pachuca','Masculino', 'juan@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-06-23 13:24:53','2019-06-23 13:36:09'),
(7,'Daniela Velazquez','Santa Julia','Pachuca','Femenino','daniela@gmail.com','f925916e2754e5e03f75dd58a5733251','2023-11-10 13:40:21','2023-11-10 13:40:51');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
