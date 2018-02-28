/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.6.17 : Database - weddingdress
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`weddingdress` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `weddingdress`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `AdminId` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `AdminName` varchar(50) NOT NULL COMMENT '管理员账号',
  `AdminPwd` varchar(50) NOT NULL COMMENT '管理员密码',
  `AdminFlag` smallint(2) NOT NULL DEFAULT '0' COMMENT '权限标志(1代表管理所有，0代表只能查看)',
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert  into `admin`(`AdminId`,`AdminName`,`AdminPwd`,`AdminFlag`) values (001,'rico','123456',1);

/*Table structure for table `adminlogindate` */

DROP TABLE IF EXISTS `adminlogindate`;

CREATE TABLE `adminlogindate` (
  `AdminId` int(3) NOT NULL COMMENT '管理员编号',
  `LoginDate` datetime NOT NULL COMMENT '登陆时间',
  PRIMARY KEY (`AdminId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `adminlogindate` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `UserId` int(5) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `UserName` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '姓名',
  `Usersex` int(1) DEFAULT '0' COMMENT '性别',
  `Userphone` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `customer` */

insert  into `customer`(`UserId`,`UserName`,`Usersex`,`Userphone`) values (1,'Rico',0,'13420823614'),(2,'张汝聪',1,'13420823614'),(3,'RICO',0,'13420823614');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `OrderId` int(5) NOT NULL AUTO_INCREMENT COMMENT '订单编号',
  `OrderTypeId` int(10) NOT NULL COMMENT '订单类型编号',
  `UserId` int(20) NOT NULL COMMENT '客户编号',
  `ProductId` int(5) NOT NULL COMMENT '商品编号',
  `Orderdate` datetime DEFAULT NULL COMMENT '下单日期',
  `BeginDate` datetime DEFAULT NULL COMMENT '租赁开始日期',
  `EndDate` datetime DEFAULT NULL COMMENT '租赁结束日期',
  `bargainmoney` decimal(10,2) DEFAULT NULL COMMENT '定金',
  `totalprice` decimal(10,2) DEFAULT NULL COMMENT '交易总价',
  `memo` varchar(500) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  `poststatus` varchar(10) COLLATE utf8_bin DEFAULT '未发货' COMMENT '发货状态默认为未发货，取“未发货”或“已发货”',
  `recevstatus` varchar(10) COLLATE utf8_bin DEFAULT '未收货' COMMENT '收货状态默认为未收货，取“未收货”或“已收货”',
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `order` */

insert  into `order`(`OrderId`,`OrderTypeId`,`UserId`,`ProductId`,`Orderdate`,`BeginDate`,`EndDate`,`bargainmoney`,`totalprice`,`memo`,`poststatus`,`recevstatus`) values (1,1,1,11,'2017-06-30 23:05:06','2017-07-03 23:05:14','2017-07-05 23:05:17','100.00','500.00','颜色：黑色\r\n长度：100','未发货','未收货'),(2,2,2,7,'2017-07-04 18:29:03','2017-07-04 18:29:04','2017-07-06 18:29:07','100.00','300.00','memos','未发货','未收货'),(3,2,3,9,'2017-07-06 22:46:21','2017-07-11 22:46:22','2017-07-14 22:46:26','100.00','400.00','memos','未发货','未收货'),(4,1,3,10,'2017-07-06 22:47:09','2017-07-06 22:47:11','2017-07-06 22:47:12','100.00','100.00','memos','未发货','未收货'),(5,2,3,12,'2017-07-06 23:03:30','2017-07-16 23:03:31','2017-07-20 23:03:35','100.00','222.00','量身定制\r\n衣长：XXX','未发货','未收货'),(6,2,3,10,'2017-07-06 23:14:41','2017-08-15 23:14:44','2017-08-17 23:14:51','100.00','500.00','量身定制','未发货','未收货');

/*Table structure for table `ordertypeinfo` */

DROP TABLE IF EXISTS `ordertypeinfo`;

CREATE TABLE `ordertypeinfo` (
  `OrderTypeId` int(5) NOT NULL AUTO_INCREMENT COMMENT '订单类型编号',
  `OrderTypeName` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '订单类型名称',
  PRIMARY KEY (`OrderTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `ordertypeinfo` */

insert  into `ordertypeinfo`(`OrderTypeId`,`OrderTypeName`) values (1,'出售'),(2,'租借');

/*Table structure for table `productinfo` */

DROP TABLE IF EXISTS `productinfo`;

CREATE TABLE `productinfo` (
  `ProductId` int(5) NOT NULL AUTO_INCREMENT COMMENT '商品编号',
  `ProductTypeId` int(5) NOT NULL COMMENT '商品类型编号',
  `ProductName` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '商品名称',
  `ProductRental` decimal(10,2) DEFAULT NULL COMMENT '商品租价',
  `ProductPrice` decimal(10,2) DEFAULT NULL COMMENT '商品售价',
  `purchasePrice` decimal(10,2) DEFAULT NULL COMMENT '进货价',
  `Storearea` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '产地',
  `ProductStoretime` datetime DEFAULT NULL COMMENT '入库时间',
  `ProductPic` varchar(500) COLLATE utf8_bin DEFAULT NULL COMMENT '商品图片路径',
  `InventoryStatus` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '商品库存状态取“已售”或“空闲”',
  `memo` varchar(500) COLLATE utf8_bin DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `productinfo` */

insert  into `productinfo`(`ProductId`,`ProductTypeId`,`ProductName`,`ProductRental`,`ProductPrice`,`purchasePrice`,`Storearea`,`ProductStoretime`,`ProductPic`,`InventoryStatus`,`memo`) values (4,1,'麂皮','522.00','1120.00','500.00','广州','2017-07-07 11:05:05','/uploadimg/thumb/20170707120523.jpg','已售','柔软指数:偏硬\r\n版型指数:修身\r\n厚度指数:适中\r\n弹力指数:超弹'),(7,2,'靛蓝青年','712.00','1230.00','321.00','比利时','2017-07-07 11:05:52','/uploadimg/thumb/20170707120328.jpg','空闲','柔软指数:柔软\r\n版型指数:修身\r\n厚度指数:稍薄\r\n弹力指数:微弹'),(8,2,'尼龙塔夫泡泡','432.00','1212.00','321.00','巴黎','2017-07-07 11:06:05','/uploadimg/thumb/20170707120337.jpg','空闲','柔软指数:适中\r\n版型指数:宽松\r\n厚度指数:稍薄\r\n弹力指数:微弹'),(9,3,'春亚纺','556.00','1312.00','532.00','荷兰','2017-07-07 11:06:49','/uploadimg/thumb/20170707120343.jpg','空闲','柔软指数:偏硬\r\n版型指数:修身\r\n厚度指数:稍薄\r\n弹力指数:超弹'),(10,3,'超细麦克','522.00','1332.00','552.00','台湾','2017-07-07 11:07:31','/uploadimg/thumb/20170707120350.jpg','空闲','柔软指数:适中\r\n版型指数:A字形\r\n厚度指数:稍厚\r\n弹力指数:微弹'),(11,3,'塔丝隆格','132.00','912.00','531.00','特鲁瓦','2017-07-07 11:07:43','/uploadimg/thumb/20170707120359.jpg','空闲','柔软指数:适中\r\n版型指数:合体\r\n厚度指数:适中\r\n弹力指数:微弹'),(12,3,'哑富迪','1234.00','2345.00','1114.00','杜塞尔多夫','2017-07-07 11:08:00','/uploadimg/thumb/20170707120424.jpg','空闲','柔软指数:偏硬\r\n版型指数:A字形\r\n厚度指数:透视\r\n弹力指数:无弹'),(13,4,'龙格','520.00','1200.00','800.00','夜圣乔治','2017-07-07 11:08:16','/uploadimg/thumb/20170707120515.jpg','空闲','柔软指数:适中\r\n版型指数:修身\r\n厚度指数:稍薄\r\n弹力指数:无弹'),(14,4,'黑天鹅','522.00','1223.00','800.00','莱鲁斯','2017-07-07 11:08:47','/uploadimg/thumb/20170707120431.jpg','空闲','柔软指数:偏硬\r\n版型指数:A字形\r\n厚度指数:适中\r\n弹力指数:微弹'),(15,1,'素色天鹅','600.00','1800.00','11131.00','佩里格','2017-07-07 11:05:22','/uploadimg/thumb/20170707120532.jpg','空闲','柔软指数:适中\r\n版型指数:修身\r\n厚度指数:稍厚\r\n弹力指数:超弹');

/*Table structure for table `producttypeinfo` */

DROP TABLE IF EXISTS `producttypeinfo`;

CREATE TABLE `producttypeinfo` (
  `ProductTypeId` int(5) NOT NULL AUTO_INCREMENT COMMENT '商品类型编号',
  `ProductTypeName` varchar(50) COLLATE utf8_bin NOT NULL COMMENT '类型名称',
  PRIMARY KEY (`ProductTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `producttypeinfo` */

insert  into `producttypeinfo`(`ProductTypeId`,`ProductTypeName`) values (1,'婚纱'),(2,'长礼服'),(3,'短礼服'),(4,'裙褂');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
