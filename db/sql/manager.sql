SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `mid` char(15) NOT NULL,
  `mpassword` varchar(20) NOT NULL,
  `mname`  char(20) NOT NULL,
  `phone`  char(11) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- 转存表中的数据 `manager`
--

INSERT INTO `manager` (`mid`, `mpassword`, `mname`, `phone`) VALUES
('zhang3', '123456', '张三', 18888888888),
('li4', '123456', '李四', 18888888888),
('wang5', '123456', '王五', 18888888888);
