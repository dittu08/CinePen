USE `movie`;

/*Table structure for table `movieinfo` */

DROP TABLE IF EXISTS `movieinfo`;

CREATE TABLE `movieinfo` (
  `id` int AUTO_INCREMENT,
  `title` varchar(255),
  `avg_rating` float,
  `rv_count` int,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;