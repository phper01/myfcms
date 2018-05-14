<?php

// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class InstallAction extends Action {

    public function index() {
        //判断是否已经安装
        $configFile = APP_PATH . "/config.php";
        if (file_exists($configFile)) {
            $this->error("系统已经安装，若要从新安装，需删除根目录下的config.php文件");
            exit;
        }
        $script_name = $_SERVER["SCRIPT_NAME"];
        $indexurl = str_replace("/index.php", "", $script_name);
        $this->assign("indexurl", $indexurl);
        $now = date("Y");
        $this->assign("now", $now);
        $this->display("index.html");
    }

    /**
     * 检查数据库连接
     */
    public function check() {
        $dbhost = getNoBlankString("dbhost");
        $dbport = getInteger("dbport");
        $dbname = getNoBlankString("dbname");
        $dbuser = getNoBlankString("dbuser");
        $dbpwd = $_REQUEST["dbpwd"];
        $res = array("msg" => "");
//		$conn = mysqli_connect($dbhost.":".$dbport,$dbuser,$dbpwd);
        $conn = mysqli_connect($dbhost . ":" . $dbport, $dbuser, "");
        
        if (mysqli_connect_errno($conn)) {
            $res["msg"] = "数据库连接失败";
            $res["code"] = 0;
        }else{
            $res["msg"] = "数据库连接成功！";
            $res["code"] = 1;
            mysqli_close($conn);
        }
        echo json_encode($res);exit;
    }

    public function step() {
        $dbhost = $_REQUEST["dbhost"];
        $dbport = $_REQUEST["dbport"];
        $dbname = $_REQUEST["dbname"];
        $dbuser = $_REQUEST["dbuser"];
        $dbpwd = $_REQUEST["dbpwd"];
        $userid = $_REQUEST["admin"];
        $pwd = md5(base64_encode($_REQUEST["pwd"]));
        $webname = $_REQUEST["webname"];
        $email = $_REQUEST["email"];
        $basehost = $_REQUEST["basehost"];
        $webpath = $_REQUEST["webpath"];
        $now = date("Y-m-d H:i:s");

        $msg = null;
        if (empty($userid)) {
            $msg = "管理员用户名不能为空！";
        }
        if (empty($pwd)) {
            $msg = "管理员密码不能为空！";
        }
        if (empty($webname)) {
            $msg = "网站名称不能为空！";
        }
        if (empty($email)) {
            $msg = "管理员邮箱不能为空！";
        }
        if (empty($basehost)) {
            $msg = "网站网址不能为空！";
        }
        if (!empty($msg)) {
            $this->error($msg);
            exit;
        }
        
//        $conn = mysqli_connect($dbhost . ":" . $dbport, $dbuser, '');
        $conn = mysqli_connect($dbhost . ":" . $dbport, $dbuser, "");
        mysqli_select_db($conn, $dbname);
        if (!mysqli_connect_errno($conn)) {
            $path = dirname(APP_SYS_PATH);
            $table_sql = "
				DROP TABLE IF EXISTS `myf_admin`;
				DROP TABLE IF EXISTS `myf_archives`;
				DROP TABLE IF EXISTS `myf_arctype`;
				DROP TABLE IF EXISTS `myf_flink`;
				DROP TABLE IF EXISTS `myf_moban`;
				DROP TABLE IF EXISTS `myf_sys`;
				DROP TABLE IF EXISTS `myf_tag`;
				
				CREATE TABLE `myf_admin` (
				  `id` int(11) NOT NULL auto_increment,
				  `userid` varchar(30) NOT NULL COMMENT '登陆名',
				  `pwd` varchar(32) NOT NULL COMMENT '密码',
				  `uname` varchar(30) default NULL COMMENT '笔名',
				  `email` varchar(50) NOT NULL COMMENT '邮件',
				  `logintime` datetime default NULL COMMENT '登陆时间',
				  `loginip` varchar(20) default NULL COMMENT '上次登陆ip',
				  `authority` varchar(500) default NULL COMMENT '权限',
				  `createtime` datetime default NULL COMMENT '创建时间',
				  PRIMARY KEY  (`id`),
				  UNIQUE KEY `userid` (`userid`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统管理员用户表';
				
				CREATE TABLE `myf_archives` (
				  `id` int(11) NOT NULL auto_increment,
				  `typeid` int(11) NOT NULL COMMENT '栏目编号',
				  `typename` varchar(50) default NULL COMMENT '栏目名称',
				  `flag` varchar(50) default NULL COMMENT '自定义属性',
				  `click` int(11) default '0' COMMENT '点击数',
				  `title` varchar(255) NOT NULL COMMENT '标题',
				  `color` char(7) default NULL COMMENT '文章标题颜色',
				  `writer` varchar(50) default NULL COMMENT '作者名称',
				  `source` varchar(50) default NULL COMMENT '文章来源',
				  `jump` varchar(255) default NULL COMMENT '跳转网址',
				  `litpic` varchar(255) default NULL COMMENT '文章缩略图',
				  `smallpic` varchar(255) default NULL COMMENT '文章缩略图2-小缩略图',
				  `tag` varchar(255) default NULL COMMENT '文章标签',
				  `keywords` varchar(255) default NULL COMMENT '文章关键字',
				  `description` varchar(500) default NULL COMMENT '文章描述',
				  `sendtime` datetime NOT NULL COMMENT '发布时间',
				  `adminid` int(11) default NULL COMMENT '添加文章管理员编号',
				  `adminname` varchar(30) default NULL COMMENT '添加文章管理员笔名',
				  `body` text COMMENT '文章内容',
				  `ishtml` tinyint(4) NOT NULL default '0' COMMENT '是否生成html',
				  `istop` int(11) default '0' COMMENT '是否置顶',
				  PRIMARY KEY  (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章表';

		
				CREATE TABLE `myf_tag` (
				  `id` int(10) unsigned NOT NULL auto_increment,
				  `name` varchar(120) NOT NULL COMMENT '标签名',
				  `arcid` int(11) NOT NULL COMMENT '所属文章编号',
				  `typeid` int(11) default NULL COMMENT '所属栏目编号',
				  `createtime` datetime default NULL COMMENT '创建时间',
				  PRIMARY KEY  (`id`),
				  KEY `name` (`name`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章标签';
		
				CREATE TABLE `myf_arctype` (
				  `id` int(11) NOT NULL auto_increment,
				  `topid` int(11) NOT NULL default '0' COMMENT '顶级栏目编号',
				  `sortrank` smallint(6) NOT NULL default '50' COMMENT '栏目排序',
				  `typename` varchar(50) NOT NULL COMMENT '栏目名称,从小到大排序',
				  `typedir` varchar(50) NOT NULL COMMENT '目录地址',
				  `arcnamerule` varchar(50) default NULL COMMENT '文章页命名规则',
				  `listnamerule` varchar(50) default NULL COMMENT '列表页命名规则',
				  `indexpath` varchar(255) default NULL COMMENT '封面模版路径',
				  `listpath` varchar(255) default NULL COMMENT '列表页模板',
				  `singlepath` varchar(255) default NULL COMMENT '单页模板',
				  `archivepath` varchar(255) default NULL COMMENT '文章模板',
				  `keywords` varchar(255) default NULL COMMENT '关键字',
				  `seotitle` varchar(255) default NULL COMMENT 'seo标题',
				  `description` varchar(500) default NULL COMMENT '栏目描述',
				  `typepro` smallint(6) NOT NULL default '0' COMMENT '栏目属性,0-最终列表页，1-频道封面，2-外部链接,3-单页',
				  `dirpos` int(11) default '0' COMMENT '目录相对位置，0-根目录，1-CMS根目录',
				  `isshow` int(11) default '1' COMMENT '是否显示，0-不显示，1-显示',
				  `litpic` varchar(255) default NULL COMMENT '栏目配图',
				  `body` text COMMENT '栏目内容',
				  PRIMARY KEY  (`id`),
				  UNIQUE KEY `typedir` (`typedir`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='栏目表';
				
				CREATE TABLE `myf_flink` (
				  `id` int(11) NOT NULL auto_increment,
				  `sortrank` smallint(6) NOT NULL default '50',
				  `url` varchar(150) NOT NULL COMMENT '连接地址',
				  `webname` varchar(50) NOT NULL COMMENT '网站名称',
				  `description` varchar(255) default NULL COMMENT '网站简介',
				  `logo` varchar(150) default NULL COMMENT '网站logo地址',
				  `dtime` datetime default NULL COMMENT '连接时间',
				  PRIMARY KEY  (`id`),
				  KEY `sortrank` (`sortrank`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='友情链接表';
				
				CREATE TABLE `myf_moban` (
				  `id` int(11) NOT NULL auto_increment,
				  `filename` varchar(255) default NULL COMMENT '模板html网页名称',
				  `name` varchar(50) default NULL COMMENT '模板描述',
				  `updatetime` datetime default NULL COMMENT '最后更新时间',
				  PRIMARY KEY  (`id`),
				  UNIQUE KEY `filename` (`filename`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
				
				CREATE TABLE `myf_sys` (
				  `id` int(11) NOT NULL auto_increment,
				  `name` varchar(50) NOT NULL COMMENT '参数名',
				  `value` varchar(500) NOT NULL COMMENT '值',
				  `info` varchar(255) default NULL COMMENT '变量说明',
				  `valuetype` enum('text','string') NOT NULL default 'string',
				  PRIMARY KEY  (`id`),
				  UNIQUE KEY `un_name` USING BTREE (`name`)
				) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='系统参数表';
				
				
				INSERT INTO `myf_sys` VALUES (1, 'cfg_basehost', '" . $basehost . $webpath . "', '网站根目录', 'string');
				INSERT INTO `myf_sys` VALUES (2, 'cfg_webname', '" . $webname . "', '网站名称', 'string');
				INSERT INTO `myf_sys` VALUES (3, 'cfg_keywords', 'myfcms,phpcms', '网站关键字', 'string');
				INSERT INTO `myf_sys` VALUES (4, 'cfg_description', '闵益飞内容管理系统是国内首家完全开源免费的phpcms系统', '网站描述', 'text');
				INSERT INTO `myf_sys` VALUES (5, 'cfg_copyright', 'copyright @ minyifei.cn 闵益飞内容管理系统', '网站版权', 'text');
				INSERT INTO `myf_sys` VALUES (6, 'user_cfg_author', '闵益飞', '作者', 'string');
				
				INSERT INTO `myf_admin` VALUES (1, '" . $userid . "', '" . $pwd . "', '超级管理员', '" . $email . "', NULL, NULL, NULL,'" . $now . "');
				
				INSERT INTO `myf_moban` VALUES (1, 'index', '首页模板', '2012-12-28 00:06:46');
				INSERT INTO `myf_moban` VALUES (2, 'face_default', '默认频道封面', '2012-12-27 23:43:42');
				INSERT INTO `myf_moban` VALUES (3, 'list_default', '默认栏目页模板', '2012-12-27 23:51:58');
				INSERT INTO `myf_moban` VALUES (4, 'archive_default', '默认内容页模板', '2012-12-28 00:05:14');
				INSERT INTO `myf_moban` VALUES (5, 'single_default', '默认单页模板', '2012-12-28 23:53:22');
				INSERT INTO `myf_moban` VALUES (6, 'search_default', '默认搜索模板', '2012-12-28 23:47:38');
				INSERT INTO `myf_moban` VALUES (7, 'top', '顶部通用代码', '2012-12-28 23:57:34');
				INSERT INTO `myf_moban` VALUES (8, 'bottom', '底部通用代码', '2012-12-28 00:08:55');
								
			";
            mysqli_query($conn,"SET NAMES utf8");
            $explode = explode(";", $table_sql);
            echo "安装中，请稍后……<br/>";
            foreach ($explode as $key => $value) {
                if (!empty($value)) {
                    if (trim($value)) {
                        $result = mysqli_query($conn,$value . ";");
                    }
                }
            }
            $allsys = mysqli_query($conn,"select * from myf_sys");
            $data = array();
            while ($line = mysqli_fetch_assoc($allsys)) {
                $data[] = $line;
            }
            mysqli_close($conn);
            echo "安装完成，正在保存配置文件，请稍后……";
            $dbconfig = array(
                "URLTYPE" => "html",
                "DB_TYPE" => "mysql",
                "DB_HOST" => "$dbhost",
                "DB_NAME" => "$dbname",
                "DB_USER" => "$dbuser",
                "DB_PWD" => "$dbpwd",
                "DB_PORT" => "$dbport",
                "DB_PREFIX" => "myf_",
                "DIR_CATEGORY" => "list",
                "DIR_ARCHIVES" => "view",
                "THEME" => "default",
                "VERSION" => "2.0.20130910"
            );

            $filename = $path . "/config.php";
            $isok = File::writeArray($filename, $dbconfig);
            if ($isok) {
                // $script_name = $_SERVER["SCRIPT_NAME"];
                // $dir = dirname(__FILE__);
                // $oldname = $dir."/InstallAction.class.php";
                // $newname = $dir."/over.php";
                // rename($oldname,$newname); 
                File::writeCache("sys_cache", $data);
                $data = array();
                File::writeCache("arctypes_cache", $data);
                $this->success("系统安装完成", getBaseName() . "/admin");
            } else {
                $this->error("系统初始化失败！");
            }
        } else {
            $this->error("数据库链接失败!");
        }
    }

}

?>