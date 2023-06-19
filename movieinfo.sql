USE `movie`;

/*Table structure for table `movieinfo` */

DROP TABLE IF EXISTS `movieinfo`;

CREATE TABLE `movieinfo` (
  `id` int AUTO_INCREMENT,
  `boxoffice` int,
  `title` varchar(255),
  `engtitle` varchar(255),
  `poster` varchar(255),
  `release_date` date,
  `genre` varchar(255),
  `country` varchar(255),
  `runtime` varchar(10),
  `avg_rating` decimal(3, 1) DEFAULT 0,
  `rv_count` int DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `movieinfo` (`boxoffice`, `title`, `engtitle`, `poster`, `release_date`, `genre`, `country`, `runtime`)
VALUES (`1`, '스파이더맨: 어크로스 더 유니버스', 'Spider-Man: Across the Spider-Verse', 'images/Spider-Man.jpg', '2023-06-21', '애니메이션', '미국', '139분 55초'),
(`2`, '귀공자', 'The Childe', 'images/The Childe.jpg', '2023-06-21', '액션', '한국', '117분 43초'),
(`3`, '범죄도시3', 'THE ROUNDUP : NO WAY OUT', 'images/THE ROUNDUP.jpg', '2023-05-31', '범죄, 액션', '한국', '105분 7초'),
(`4`, '엘리멘탈', 'Elemental', 'images/Elemental.jpg', '2023-06-14', '애니메이션', '미국', '109분 9초'),
(`5`, '플래시', 'The Flash', 'images/The Flash.jpg', '2023-06-14', '액션', '미국', '143분 54초'),
(`6`, '명탐정코난: 하이바라 아이 이야기 ~흑철의 미스터리 트레인', 'Detective Conan: The Story of Ai Haibara: Black Iron Mystery Train', 'images/Detective Conan.jpg', '2023-06-23', '애니메이션', '일본', '89분 22초'),
(`7`, '파이어하트', 'Fireheart', 'images/Fireheart.jpg', '2023-06-28', '애니메이션, 어드벤처, 코미디, 가족', '프랑스', '92분 9초'),
(`8`, '트랜스포머: 비스트의 서막', 'Transformers: Rise of the Beasts', 'images/Transformers.jpg', '2023-06-06', '액션', '미국', '126분 56초'),
(`9`, '수라', 'Sura: A Love Song', 'images/Sura.jpg', '2023-06-21', '예술,독립 영화', '한국', '102분 6초'),
(`10`, '비의도적 연애담 스페셜', 'Unintentional Love Story: Special Episode', 'images/Unintentional.jpg', '2023-06-14', '드라마, 멜로/로맨스', '한국', '121분 52초');