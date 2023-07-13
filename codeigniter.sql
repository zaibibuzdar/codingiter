/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 5.7.24 : Database - codeigniter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `codeigniter`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `parent_id` int(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `discription` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`parent_id`,`title`,`discription`,`created_at`,`update_at`) values 
(21,11,'mosuse','dssdg','2023-01-04 16:46:09','2023-01-04 16:46:09'),
(23,21,'ZAIBI  bzdar','asdfha','2023-01-13 23:48:26','2023-01-13 23:48:26'),
(26,21,'ZAIBI  bzdar','fgsdh','2023-01-19 19:01:19','2023-01-19 19:01:19'),
(27,0,'wood','chair table','2023-01-20 15:39:55','2023-01-20 15:39:55');

/*Table structure for table `imagegallery` */

DROP TABLE IF EXISTS `imagegallery`;

CREATE TABLE `imagegallery` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(255) DEFAULT NULL,
  `uploadedFiles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `imagegallery` */

insert  into `imagegallery`(`id`,`product_id`,`uploadedFiles`) values 
(17,11,'6db5798b4b4dbb96dcb7c48db17f135c.jpg'),
(19,12,'52714b4e86227f5275d5b7a28b1ccc80.jpg'),
(21,13,'9d84470c5e354e6e70177ce0fac7ac7f.jpg'),
(22,13,'0f6d1a69d75a4013f58ab0623fdfe147.jpg'),
(23,14,'81d5c775ee312c7761ca79317caa7632.jpg'),
(24,14,'240051a4fc759d2596b65e94e9773177.jpg'),
(25,14,'4ecbd1bd6769f092c545a1091576463e.jpg'),
(26,15,'b6a06c79fb98e457ef2996780805c89f.jpg'),
(27,15,'5c1ac2c02592fb3a7303c521b4db4096.jpg');

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` bigint(222) NOT NULL AUTO_INCREMENT,
  `uploadedFiles` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert  into `images`(`id`,`uploadedFiles`) values 
(1,'6640f45c7654926d934d70'),
(2,'cc909a60b400c2c60bb188'),
(3,'a502386e829b49fa48ada8'),
(4,'666c047fdb95b39dee3bed'),
(5,'d550d32a8eb43d7c7efad4'),
(6,'b629dd263a186c00140025'),
(7,'5edbfa3e2825e1d6788ffc'),
(8,'d9fc6ea0cf11e553199316');

/*Table structure for table `imagescrud` */

DROP TABLE IF EXISTS `imagescrud`;

CREATE TABLE `imagescrud` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` bigint(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `imagescrud` */

insert  into `imagescrud`(`id`,`title`,`description`,`price`,`image`) values 
(11,'chair','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',1500,'1674041227pro-big-1.jpg'),
(12,'Laptop','Dell. If you are looking for a brand that develops laptops for all purposes, such as gaming, programming, day-to-day tasks, and many more, then you can look at Dell.',3450000,'16740429981-4012-696320-240921072219.jpg'),
(13,'books','What is the name of 10 famous book? Here is a list of 12 novels that, for various reasons, have been considered some of the greatest works of literature ever written.',30000,'1674043141book1.jpg'),
(14,'Mouse','The mouse is a small, movable device that lets you control a range of things on a computer. Most types of mouse have two buttons, and some will have a wheel in between the buttons. Most types of mouse connect to the computer with a cable, and use the comp',3450000,'1674043215mousecober.jpg'),
(15,'spone','steel',45465,'167414896561ZEDCMCWrL__AC_SL1200_.jpg'),
(16,'fruite','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',3473,'167416535171BiKm1n6pL__AC_SL1500_.jpg'),
(17,'Electronics','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?',0,'167416538271Bqt7Rx48L__AC_SL1200_.jpg');

/*Table structure for table `prdocuts_categories` */

DROP TABLE IF EXISTS `prdocuts_categories`;

CREATE TABLE `prdocuts_categories` (
  `id` bigint(255) DEFAULT NULL,
  `Product_id` bigint(255) DEFAULT NULL,
  `category_id` bigint(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `prdocuts_categories` */

insert  into `prdocuts_categories`(`id`,`Product_id`,`category_id`,`create_at`,`update_at`) values 
(NULL,1,23,'2023-01-20 14:43:14','2023-01-20 14:43:14'),
(NULL,2,21,'2023-01-20 14:43:55','2023-01-20 14:43:55'),
(NULL,2,23,'2023-01-20 14:43:55','2023-01-20 14:43:55'),
(NULL,2,26,'2023-01-20 14:43:55','2023-01-20 14:43:55'),
(NULL,3,21,'2023-01-20 15:42:07','2023-01-20 15:42:07'),
(NULL,3,27,'2023-01-20 15:42:07','2023-01-20 15:42:07');

/*Table structure for table `producting` */

DROP TABLE IF EXISTS `producting`;

CREATE TABLE `producting` (
  `pro_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(222) DEFAULT NULL,
  `price` bigint(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `producting` */

insert  into `producting`(`pro_id`,`title`,`description`,`price`,`image`,`create_at`,`update_at`) values 
(1,'ASDG','adgba',326,'167420779371BiKm1n6pL__AC_SL1500_.jpg','2023-01-20 14:43:13','2023-01-20 14:43:13'),
(2,'Electronics','sdv  weryh',235,'167420783471BiKm1n6pL__AC_SL1500_.jpg','2023-01-20 14:43:54','2023-01-20 14:43:54'),
(3,'Electronics','wet',346,'1674211327product1.jpg','2023-01-20 15:42:07','2023-01-20 15:42:07');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `upadated-at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`title`,`category_id`,`description`,`price`,`image`,`created_at`,`upadated-at`) values 
(11,'image','11,12','images upload','234','1673869582background1.png','2023-01-02 18:56:46','2023-01-02 18:56:46'),
(12,'carger','12,13','czxv','2315','1672667806categories.PNG','2023-01-03 01:59:15','2023-01-03 01:59:19'),
(13,'casdfh','13','sdfh','3467','1673637151mehran.jpg','2023-01-14 00:12:31','2023-01-14 00:12:31'),
(14,'casdfh','13','sdfh','3467','1673637166mehran.jpg','2023-01-14 00:12:46','2023-01-14 00:12:46'),
(15,'2346547','23,26','3427sdfhsjg','34627','167416005371BiKm1n6pL__AC_SL1500_.jpg','2023-01-20 01:27:33','2023-01-20 01:27:33'),
(16,'asdg','23,26','asdf sdf g','346','167416023171BiKm1n6pL__AC_SL1500_.jpg','2023-01-20 01:30:31','2023-01-20 01:30:31'),
(17,'ASDG','21,23','aesdfh','457','167416038571BiKm1n6pL__AC_SL1500_.jpg','2023-01-20 01:33:05','2023-01-20 01:33:05'),
(18,'asdfgdh','21','sdfh','457','16741605521-4012-596486-190221012147-1540-11121-220221095046.jpg','2023-01-20 01:35:52','2023-01-20 01:35:52'),
(19,'qWETYH','26','asdg','3457','167416063061ZEDCMCWrL__AC_SL1200_.jpg','2023-01-20 01:37:10','2023-01-20 01:37:10'),
(20,'demo','27,21','asdasdasdasdasd','235','167421602061H7njVe1LL__AC_SL1200_.jpg','2023-01-20 17:00:20','2023-01-20 17:00:20');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `students` */

insert  into `students`(`id`,`name`,`email`,`phone`,`course`,`country`,`created_at`,`updated_at`) values 
(1,'noor','noor@gmail.com',3480902358,'jquery','pakistan','2023-01-14 12:43:07','2023-01-14 12:43:07'),
(2,'noor khan','noor@gmail.com',3480902358,'jquery','pakistan','2023-01-14 12:43:08','2023-01-14 12:43:08'),
(5,'noor','noor@gmail.com',3480902358,'jquery','pakistan','2023-01-14 12:43:12','2023-01-14 12:43:12'),
(6,'noor','noor@gmail.com',3480902358,'jquery','pakistan','2023-01-14 12:43:12','2023-01-14 12:43:12'),
(7,'noor','noor@gmail.com',3480902358,'jquery','pakistan','2023-01-14 12:43:55','2023-01-14 12:43:55'),
(8,'zaibi','zaib@gmail.com',90488683279,'sdakfhg','jfgkafv','2023-01-14 12:44:41','2023-01-14 12:44:41');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`username`,`password`,`create_at`,`update_at`) values 
(1,'zaibi','email@gmail.com','zaibibalocoh','1122','2022-12-26 18:18:47','2022-12-26 18:18:43'),
(2,'zaibi buzdar','hameed@gmail.com','zaibi','1122','2022-12-26 19:29:58','2022-12-26 19:29:58'),
(3,'akif baloch','akif@gmail.com','test@gmail.com','1122','2022-12-26 19:30:38','2022-12-26 19:30:38'),
(4,'zaibikhan','zaibibaloch667@gmail.com','buzdar1122','112233','2022-12-27 13:20:48','2022-12-27 13:20:48'),
(5,'abid khan dasti baloch','akif@gmail.com','akif1122','1122','2022-12-27 13:26:59','2022-12-27 13:26:59'),
(6,'kashif','User1@gmail.com','kashi khan','1122','2022-12-27 13:33:05','2022-12-27 13:33:05'),
(7,'zaibi baloch','zaibi3445@gmail.com','zaobiiia','112233','2022-12-27 17:55:46','2022-12-27 17:55:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
