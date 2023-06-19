USE `movie`;

/*Table structure for table `movie_rating` */

DROP TABLE IF EXISTS `movie_rating`;

CREATE TABLE `movie_rating` (
  `user_email` varchar(255) NOT NULL,
  `movie_id` int,
  `rating` int DEFAULT 0,
  PRIMARY KEY (`user_email`, `movie_id`),
  FOREIGN KEY (`user_email`) REFERENCES `member`(`email`),
  FOREIGN KEY (`movie_id`) REFERENCES `movieinfo`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;