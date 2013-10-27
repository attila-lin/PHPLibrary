SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

DROP TABLE IF EXISTS `book`;

CREATE TABLE IF NOT EXISTS `book` (
  `bno` int(8) NOT NULL  AUTO_INCREMENT,
  `category` char(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `press` char(30) NOT NULL,
  `year` date NOT NULL,
  `author` char(25) NOT NULL,
  `price` decimal(7,2) NOT NULL, 
  `briefcontent` text NOT NULL,  
  `total` int(3) NOT NULL,
  `stock` int(3) NOT NULL,
  `labels` char(50) NOT NULL,
  `cover` varchar(20) NOT NULL,
  `page` int(6) NOT NULL,
  `format` char(10) NOT NULL,
  `doubanID` char(8) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  PRIMARY KEY (`bno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`bno`, `category`, `title`, `press`, `year`, `author`, `price`, `briefcontent`, `total`, `stock`, `labels`, `cover`, `page`, `format`, `doubanID`, `ISBN`) VALUES
(1, '教育', 'C++', '教育出版社', '1992-1-1' , '老赵', 12.1, '哈哈哈哈', 10, 7, '教育,语言', '1', 1000, '平装', '20000000', '9781433291012'),
(2, '教育', 'Java', '教育出版社', '1991-1-1' , '老李', 33.1, '哈哈哈哈', 11, 7, '教育,语言', '2', 1000, '平装', '20000200', '9781433251012'),
(3, '教育', 'prime C++', '教育出版社', '1990-1-1' , '老王', 90.1, '哈哈哈哈', 10, 4, '教育,语言,计算机', '1', 1000, '平装', '20032000', '9781323291012');

