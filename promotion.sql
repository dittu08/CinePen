USE `movie`;

/*Table structure for table `promotion` */

DROP TABLE IF EXISTS `promotion`;

CREATE TABLE `promotion` (
  `id` int AUTO_INCREMENT,
  `pm_title` varchar(255),
  `pm_contents` text,
  `poster` varchar(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;