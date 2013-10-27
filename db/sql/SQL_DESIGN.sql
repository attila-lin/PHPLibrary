show databases

Create database PHPLibrary;

use PHPLibrary; 

书号, 类别, 书名, 出版社, 年份, 作者, 价格, 总藏书量, 库存
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

id, 名字, 头像
create table user(
    uid         char(8),
    uname       char(20),
    uavatar     char(20),
);

书名， 评论者名字， 内容
create table comment(
    bno         char(8),
    uid         char(8),
    content     char(200),
);


卡号, 姓名, 单位, 类别 (教师 学生等)
CREATE TABLE IF NOT EXISTS `card` (
  `cno`  int(8) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `company`  char(45) NOT NULL,
  `category`  char(12) NOT NULL,
  PRIMARY KEY (`cno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

管理员ID, 密码， 姓名， 联系方式
CREATE TABLE IF NOT EXISTS `manager` (
  `mid` char(15) NOT NULL AUTO_INCREMENT,
  `mpassword` varchar(20) NOT NULL,
  `mname`  char(20) NOT NULL,
  `phone`  char(11) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;


书号, 借书证号 ,借期, 还期， 经手人（管理员ID）
CREATE TABLE IF NOT EXISTS `borrow` (
  `bno` int(8) NOT NULL,
  `cno` int(8) NOT NULL,
  `borrowdate`  datetime NOT NULL,
  `returndata`  datetime NOT NULL,
  `mid` char(15) NOT NULL,
  PRIMARY KEY (`bno`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;