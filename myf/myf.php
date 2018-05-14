<?php
// +----------------------------------------------------------------------
// | MyfPHP 闵益飞PHP MVC框架  -- 路由类
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
session_start();
error_reporting(E_ALL ^ E_NOTICE); 
date_default_timezone_set('PRC');
header("Content-Type:text/html; charset=utf-8");
//项目跟路径
if(!defined('SITE_PATH')) define('SITE_PATH', dirname($_SERVER['SCRIPT_NAME']));
//项目路径
if(!defined('APP_PATH')) define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']));
//系统配置路径
if(!defined('APP_SYS_PATH')) define('APP_SYS_PATH', dirname(__FILE__));

//基础函数
require_once(APP_SYS_PATH."/functions.php");
//加载数据库操作文件
require_once(APP_SYS_PATH."/db.php");
//文件读写
require_once(APP_SYS_PATH."/file.php");
//无限菜单
require_once(APP_SYS_PATH."/tree.php");
//分页相关
require_once(APP_SYS_PATH."/page.php");
//父Action类
require_once(APP_SYS_PATH."/action.php");
//http请求
require_once(APP_SYS_PATH."/http.php");
//smarty
require_once(APP_SYS_PATH."/smt/Smarty.class.php");
if(C("URLTYPE")=="rewrite"){
	//伪静态
	$myf_nav=$_SERVER['REQUEST_URI'];
	$myf_script=$_SERVER['SCRIPT_NAME'];
	$myf_splits = $_SERVER["QUERY_STRING"];
	$myf_splits = explode("&", $myf_splits);
	$myf_splits[] = "?";
	$myf_nav = str_replace($myf_splits, "", $myf_nav);
	$myf_index = "/index.php";
	$myf_script = str_replace($myf_index, "", $myf_script);
	$myf_nav=ereg_replace("^$myf_script","",$myf_nav);
	$myf_nav = str_replace($myf_index, "", $myf_nav);
	$myf_vars=explode("/",$myf_nav);
}
if(C("DB_DEBUG")){
	DB::$debug = TRUE;
}
//默认控制器
if(!empty($myf_vars[1])){
	$myf_m = $myf_vars[1];
}else{	
	$myf_m = (!empty($_GET["m"]))?$_GET["m"]:"index";
}
//默认方法
if(!empty($myf_vars[2])){
	$myf_action = $myf_vars[2];
}else{
	$myf_action = (!empty($_GET["a"]))?$_GET["a"]:"index";
}
$myf_m = htmlspecialchars($myf_m);
$myf_action = htmlspecialchars($myf_action);

if(C("DEBUG")){
	dump($myf_m."-->".$myf_action);
}

$myf_module = ucfirst($myf_m)."Action";
$myf_file = APP_PATH."/app/Action/".$myf_module.".class.php";
if(file_exists($myf_file)){
	require_once($myf_file);
	$myf_c = new $myf_module;
	$myf_c->_init($myf_m);
	//执行前置方法
	$myf_c->_before_index();
	$myf_c->{$myf_action}();
	//执行后置方法
	$myf_c->_after_index();
}else{
	die("访问出错！");
}
