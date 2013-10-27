SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `bno` int(8) NOT NULL,
  `cno` int(8) NOT NULL,
  `borrowdate`  datetime NOT NULL,
  `returndata`  datetime NOT NULL,
  `mid` char(15) NOT NULL,
  PRIMARY KEY (`bno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`bno`, `cno`, `borrowdate`, `returndata`, `mid` ) VALUES
(1, 1, '2010-04-01 22:20:07', '2010-09-01 22:20:07''zhang3');

