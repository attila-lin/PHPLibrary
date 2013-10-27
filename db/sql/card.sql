SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `cno` int(8) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `company`  char(45) NOT NULL,
  `category`  char(12) NOT NULL,
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `card`
--

INSERT INTO `card` (`cno`, `cname`, `company`, `category`) VALUES
(1, 'lilei', 'ZJU', "学生"),
(2, 'wanghao', 'THU', "老师"),
(3, 'zhangpeiwen', 'ZJU', "待业");
