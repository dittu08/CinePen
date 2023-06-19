USE `movie`;

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int AUTO_INCREMENT,
  `rv_title` varchar(255),
  `rv_content` longtext,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `movie_id` int,
  `user_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`movie_id`) REFERENCES `movieinfo`(`id`),
  FOREIGN KEY (`user_email`) REFERENCES `member`(`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;