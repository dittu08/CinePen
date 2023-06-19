USE `movie`;

/*Table structure for table `member` */

DROP TABLE IF EXISTS `member`;

CREATE TABLE `member` (
  `email` varchar(255) NOT NULL,
  `uid` varchar(20) unique,
  `pwd` varchar(255) NOT NULL,
  `uname` varchar(255),
  `pf_info` varchar(255),
  `rv_count` int DEFAULT 0,
  `avg_rating` decimal(3, 1) DEFAULT 0,
  `like_count` int DEFAULT 0,
  `regdate` date NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;