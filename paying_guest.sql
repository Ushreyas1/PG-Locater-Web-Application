/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.7.23-log : Database - paying_guest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`paying_guest1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `paying_guest`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `book_rid` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `roomId` int(11) DEFAULT NULL,
  `booked_date` date DEFAULT NULL,
  `is_paid` varchar(10) DEFAULT 'no' COMMENT 'no-not paid,yes-paid',
  `booking_status` int(11) DEFAULT '0' COMMENT '0-under process,1-accepted,2-rejected',
  `payment_type` varchar(20) DEFAULT NULL,
  `is_vacate` int(5) DEFAULT '0',
  PRIMARY KEY (`book_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

insert  into `booking`(`book_rid`,`user_id`,`roomId`,`booked_date`,`is_paid`,`booking_status`,`payment_type`,`is_vacate`) values (1,1,1,'2021-09-09','yes',1,'upi',1),(2,2,1,'2021-09-09','yes',1,'upi',1),(3,1,2,'2021-09-09','yes',1,NULL,1);

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `room_id` int(5) DEFAULT NULL,
  `feedback` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

insert  into `feedback`(`feedback_id`,`user_id`,`room_id`,`feedback`,`date`) values (1,1,1,'good','2021-09-09'),(2,2,1,'ghjgj','2021-09-09'),(3,1,2,'gdfgdfgfgfdg','2021-09-09');

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `gallery_rid` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `image` blob,
  `ownerId` int(11) DEFAULT NULL,
  PRIMARY KEY (`gallery_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `gallery` */

insert  into `gallery`(`gallery_rid`,`room_id`,`image`,`ownerId`) values (1,1,'12931140061336de21cbc4.jpg',1),(2,2,'166980281261336df08b230.jpg',1);

/*Table structure for table `owner` */

DROP TABLE IF EXISTS `owner`;

CREATE TABLE `owner` (
  `owner_rid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `is_enabled` int(5) DEFAULT '1' COMMENT '1-enabled,0-disabled',
  PRIMARY KEY (`owner_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `owner` */

insert  into `owner`(`owner_rid`,`name`,`contact_no`,`email_id`,`address`,`user_name`,`password`,`is_enabled`) values (1,'suneetha','8088969962','sun@gmail.com','karkala','sun','1000',1);

/*Table structure for table `room` */

DROP TABLE IF EXISTS `room`;

CREATE TABLE `room` (
  `room_rid` int(11) NOT NULL AUTO_INCREMENT,
  `room_num` int(11) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `room_rate` int(11) DEFAULT NULL,
  `is_booked` varchar(5) DEFAULT 'no',
  `owner_id` int(5) DEFAULT NULL,
  `photo` blob,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`room_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `room` */

insert  into `room`(`room_rid`,`room_num`,`room_type`,`description`,`room_rate`,`is_booked`,`owner_id`,`photo`,`address`) values (1,344,'double','A room assigned to two people',78000,'no',1,'158221181261336d9061e72.jpg','Karkala'),(2,4444,'triple','a room assigned to three people',89000,'no',1,'110321148161336dc8af689.jpg','Mangalore'),(3,0,'er','ewr',899,'no',1,'110321148161336dc8af689.jpg','gfdg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_rid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `email_id` varchar(40) DEFAULT NULL,
  `address` varchar(40) DEFAULT NULL,
  `user_name` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `is_enabled` int(5) DEFAULT '1' COMMENT '1-enabled,0-disabled',
  PRIMARY KEY (`user_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_rid`,`name`,`contact_no`,`email_id`,`address`,`user_name`,`password`,`is_enabled`) values (1,'Neha','9090909090','neha@gmail.com','Karkala','neha','9000',1),(2,'manu','8989898989','manu@gmail.com','karkala','manu','1234',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
