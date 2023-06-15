USE `movie`;

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `email` varchar NOT NULL,
  `uid` varchar(20) unique,
  `pwd` varchar NOT NULL,
  `uname` varchar,
  `pf_pic` varchar,
  `pf_info` varchar,
  `rv_count` int DEFAULT 0,
  `av_rating` float DEFAULT 0,
  `like_list` text
  PRIMARY KEY (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;