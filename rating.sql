USE `movie`;

/*Table structure for table `rating` */

DROP TABLE IF EXISTS `rating`;

CREATE TABLE `rating` (
  `userid` varchar(255) NOT NULL,
  `movieid` int,
  `userrating` DECIMAL(3, 1),
  PRIMARY KEY (`userid`),
  FOREIGN KEY (`userid`) REFERENCES `member`(`email`),
  FOREIGN KEY (`movieid`) REFERENCES `movieinfo`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO rating (userid, movieid, userrating)
VALUES ('janedoe@abc.com', 1, 4.5);