SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


--
-- 数据库: `PHPLibrary`
--

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(8) NOT NULL AUTO_INCREMENT,
  `uname` varchar(20) NOT NULL,
  `uavatar` varchar(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--


INSERT INTO `user` (`cno`, `cname`, `company`, `category`) VALUES
(1, 'lilei', '0000000001'),
(2, 'wanghao', '0000000002'),
(3, 'zhangpeiwen', '0000000003');
