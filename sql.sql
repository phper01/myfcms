/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.19 : Database - myfcms2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`myfcms2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `myfcms2`;

/*Table structure for table `myf_admin` */

DROP TABLE IF EXISTS `myf_admin`;

CREATE TABLE `myf_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL COMMENT '登陆名',
  `pwd` varchar(32) NOT NULL COMMENT '密码',
  `uname` varchar(30) DEFAULT NULL COMMENT '笔名',
  `email` varchar(50) NOT NULL COMMENT '邮件',
  `logintime` datetime DEFAULT NULL COMMENT '登陆时间',
  `loginip` varchar(20) DEFAULT NULL COMMENT '上次登陆ip',
  `authority` varchar(500) DEFAULT NULL COMMENT '权限',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统管理员用户表';

/*Data for the table `myf_admin` */

insert  into `myf_admin`(`id`,`userid`,`pwd`,`uname`,`email`,`logintime`,`loginip`,`authority`,`createtime`) values (1,'admin','e3d7e5848837d08ad55aad00f1775812','超级管理员','admin@minyifei.cn','2018-05-14 10:32:57','127.0.0.1',NULL,'2018-05-14 10:31:43');

/*Table structure for table `myf_archives` */

DROP TABLE IF EXISTS `myf_archives`;

CREATE TABLE `myf_archives` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) NOT NULL COMMENT '栏目编号',
  `typename` varchar(50) DEFAULT NULL COMMENT '栏目名称',
  `flag` varchar(50) DEFAULT NULL COMMENT '自定义属性',
  `click` int(11) DEFAULT '0' COMMENT '点击数',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `color` char(7) DEFAULT NULL COMMENT '文章标题颜色',
  `writer` varchar(50) DEFAULT NULL COMMENT '作者名称',
  `source` varchar(50) DEFAULT NULL COMMENT '文章来源',
  `jump` varchar(255) DEFAULT NULL COMMENT '跳转网址',
  `litpic` varchar(255) DEFAULT NULL COMMENT '文章缩略图',
  `smallpic` varchar(255) DEFAULT NULL COMMENT '文章缩略图2-小缩略图',
  `tag` varchar(255) DEFAULT NULL COMMENT '文章标签',
  `keywords` varchar(255) DEFAULT NULL COMMENT '文章关键字',
  `description` varchar(500) DEFAULT NULL COMMENT '文章描述',
  `sendtime` datetime NOT NULL COMMENT '发布时间',
  `adminid` int(11) DEFAULT NULL COMMENT '添加文章管理员编号',
  `adminname` varchar(30) DEFAULT NULL COMMENT '添加文章管理员笔名',
  `body` text COMMENT '文章内容',
  `ishtml` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否生成html',
  `istop` int(11) DEFAULT '0' COMMENT '是否置顶',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `myf_archives` */

insert  into `myf_archives`(`id`,`typeid`,`typename`,`flag`,`click`,`title`,`color`,`writer`,`source`,`jump`,`litpic`,`smallpic`,`tag`,`keywords`,`description`,`sendtime`,`adminid`,`adminname`,`body`,`ishtml`,`istop`) values (1,2,'关于我们','',74,'企业机构','','','','','','','','','企业机构','2018-05-14 10:50:18',NULL,NULL,'企业机构',1,0);

/*Table structure for table `myf_arctype` */

DROP TABLE IF EXISTS `myf_arctype`;

CREATE TABLE `myf_arctype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topid` int(11) NOT NULL DEFAULT '0' COMMENT '顶级栏目编号',
  `sortrank` smallint(6) NOT NULL DEFAULT '50' COMMENT '栏目排序',
  `typename` varchar(50) NOT NULL COMMENT '栏目名称,从小到大排序',
  `typedir` varchar(50) NOT NULL COMMENT '目录地址',
  `arcnamerule` varchar(50) DEFAULT NULL COMMENT '文章页命名规则',
  `listnamerule` varchar(50) DEFAULT NULL COMMENT '列表页命名规则',
  `indexpath` varchar(255) DEFAULT NULL COMMENT '封面模版路径',
  `listpath` varchar(255) DEFAULT NULL COMMENT '列表页模板',
  `singlepath` varchar(255) DEFAULT NULL COMMENT '单页模板',
  `archivepath` varchar(255) DEFAULT NULL COMMENT '文章模板',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键字',
  `seotitle` varchar(255) DEFAULT NULL COMMENT 'seo标题',
  `description` varchar(500) DEFAULT NULL COMMENT '栏目描述',
  `typepro` smallint(6) NOT NULL DEFAULT '0' COMMENT '栏目属性,0-最终列表页，1-频道封面，2-外部链接,3-单页',
  `dirpos` int(11) DEFAULT '0' COMMENT '目录相对位置，0-根目录，1-CMS根目录',
  `isshow` int(11) DEFAULT '1' COMMENT '是否显示，0-不显示，1-显示',
  `litpic` varchar(255) DEFAULT NULL COMMENT '栏目配图',
  `body` text COMMENT '栏目内容',
  PRIMARY KEY (`id`),
  UNIQUE KEY `typedir` (`typedir`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='栏目表';

/*Data for the table `myf_arctype` */

insert  into `myf_arctype`(`id`,`topid`,`sortrank`,`typename`,`typedir`,`arcnamerule`,`listnamerule`,`indexpath`,`listpath`,`singlepath`,`archivepath`,`keywords`,`seotitle`,`description`,`typepro`,`dirpos`,`isshow`,`litpic`,`body`) values (1,0,50,'首页','home','/view','/list/home','face_default.html','list_default.html','single_default.html','archive_default.html','','','',0,0,1,'',NULL),(2,0,50,'关于我们','about','/view','/list/about','face_default.html','list_default.html','single_default.html','archive_default.html','','','',0,0,1,'',NULL);

/*Table structure for table `myf_flink` */

DROP TABLE IF EXISTS `myf_flink`;

CREATE TABLE `myf_flink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortrank` smallint(6) NOT NULL DEFAULT '50',
  `url` varchar(150) NOT NULL COMMENT '连接地址',
  `webname` varchar(50) NOT NULL COMMENT '网站名称',
  `description` varchar(255) DEFAULT NULL COMMENT '网站简介',
  `logo` varchar(150) DEFAULT NULL COMMENT '网站logo地址',
  `dtime` datetime DEFAULT NULL COMMENT '连接时间',
  PRIMARY KEY (`id`),
  KEY `sortrank` (`sortrank`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表';

/*Data for the table `myf_flink` */

/*Table structure for table `myf_moban` */

DROP TABLE IF EXISTS `myf_moban`;

CREATE TABLE `myf_moban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL COMMENT '模板html网页名称',
  `name` varchar(50) DEFAULT NULL COMMENT '模板描述',
  `updatetime` datetime DEFAULT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `myf_moban` */

insert  into `myf_moban`(`id`,`filename`,`name`,`updatetime`) values (1,'index','首页模板','2012-12-28 00:06:46'),(2,'face_default','默认频道封面','2012-12-27 23:43:42'),(3,'list_default','默认栏目页模板','2012-12-27 23:51:58'),(4,'archive_default','默认内容页模板','2012-12-28 00:05:14'),(5,'single_default','默认单页模板','2012-12-28 23:53:22'),(6,'search_default','默认搜索模板','2012-12-28 23:47:38'),(7,'top','顶部通用代码','2012-12-28 23:57:34'),(8,'bottom','底部通用代码','2012-12-28 00:08:55');

/*Table structure for table `myf_sys` */

DROP TABLE IF EXISTS `myf_sys`;

CREATE TABLE `myf_sys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '参数名',
  `value` varchar(500) NOT NULL COMMENT '值',
  `info` varchar(255) DEFAULT NULL COMMENT '变量说明',
  `valuetype` enum('text','string') NOT NULL DEFAULT 'string',
  PRIMARY KEY (`id`),
  UNIQUE KEY `un_name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='系统参数表';

/*Data for the table `myf_sys` */

insert  into `myf_sys`(`id`,`name`,`value`,`info`,`valuetype`) values (1,'cfg_basehost','http://myfcms.local.pingcoo.com','网站根目录','string'),(2,'cfg_webname','我的网站','网站名称','string'),(3,'cfg_keywords','myfcms,phpcms','网站关键字','string'),(4,'cfg_description','闵益飞内容管理系统是国内首家完全开源免费的phpcms系统','网站描述','text'),(5,'cfg_copyright','copyright @ minyifei.cn 闵益飞内容管理系统','网站版权','text'),(6,'user_cfg_author','闵益飞','作者','string');

/*Table structure for table `myf_tag` */

DROP TABLE IF EXISTS `myf_tag`;

CREATE TABLE `myf_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL COMMENT '标签名',
  `arcid` int(11) NOT NULL COMMENT '所属文章编号',
  `typeid` int(11) DEFAULT NULL COMMENT '所属栏目编号',
  `createtime` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章标签';

/*Data for the table `myf_tag` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
