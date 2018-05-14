<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
$path = dirname(dirname(__FILE__));
require_once $path.'/Service/MyfService.class.php';


class MobanAction extends Action {
	
	public function _before_index(){
		$this->setEmptyTheme();
		$user = session("user");
		if(empty($user)){
			$this->error("未登陆，请先登陆",getBaseName()."/");
			exit;
		}else{
			if($user["id"]!=1){
				$this->error("当前登录用户非超级管理员，没有权限使用该功能！");
				exit;
			}
			$this->assign("user", $user);
		}
		
		$this->assign("submenu",getSaveString("a"));
		$this->assign("menu","moban");
	}
	
	/**
	 * 模板列表
	 */
	public function main(){
		$service = new MyfService;
		$list = $service->find_all_moban();
		$this->assign("list",$list);
		$this->display();
	}
	
	public function add(){
		$this->display();
	}
	
	/**
	 * 新建保存模板
	 */
	public function add_handler(){
		$service = new MyfService;
		$data = array();
		$data["filename"] = $_POST["filename"];
		$data["name"] = $_POST["name"];
		$content = stripslashes($_POST["fileContent"]);
		$id = $service->add_moban($data, $content);
		if($id>0){
			$this->success("模板添加成功",getBaseURL()."/index.php?m=moban&a=main");
		}else{
			$this->error("模板添加失败");
		}
	}
	
	//更新模板
	public function update(){
		$id = $_REQUEST["id"];
		$service = new MyfService;
		$m = $service->find_moban_by_id($id);
		$this->assign("m", $m);
		$this->display();
	}
	
	/**
	 * 处理更新模板
	 */
	public function update_handler(){
		$service = new MyfService;
		$data = array();
		$id = $_POST["id"];
		$data["filename"] = $_POST["filename"];
		$data["name"] = $_POST["name"];
		$content = $_POST["fileContent"];
		$content = stripslashes($content);
		$id = $service->update_moban($data, $content);		
		if($id>0){
			$this->success("模板更新成功",getBaseURL()."/index.php?m=moban&a=main");
		}else{
			$this->error("模板更新失败");
		}
	}
	
	/**
	 * 删除模板
	 */
	public function delete_handler(){
		$id = get("id");
		$service = new MyfService;
		$row = $service->delete_moban($id);
		if($row>0){
			$this->success("模板删除成功",getBaseURL()."/index.php?m=moban&a=main");
		}else{
			$this->error("默认模板不允许删除");
		}
	}
	
	/**
	 * 主题列表
	 */
	public function mlist(){
		$mobans = File::filelist(dirname(APP_SYS_PATH)."/tpl");
		$minfos = array();
		$this->assign("theme", getTheme());
		foreach ($mobans as $key => $value) {
			if($value!='.htaccess'){
				$mb = require_once(dirname(APP_SYS_PATH)."/tpl/$value/default.php");
				$mb["logo"]=getProjectName()."/tpl/".$value."/default.jpg";
				$mb["theme"]=$value;
				$minfos[] = $mb;
			}
		}
		$this->assign("list", $minfos);
		$this->display();
	}
	
	/**
	 * 导入模板
	 */
	public function install(){
		$this->display();
	}
	
	/**
	 * 启用主题
	 */
	public function open(){
		$theme = get("theme");
		if(empty($theme)){
			$this->error("请选择要开启的主题");
			return;
		}
		$path = dirname(APP_SYS_PATH)."/tpl/";
		
		//保存当前主题的模板信息
		$defaultTheme = C("THEME");
		//$defaultConfig = $path."$defaultTheme/default.php";
		// $dmb = require($defaultConfig);
		// $service = new MyfService;
		// $list = $service->find_all_moban();
		// $dmb["moban"]=$list;
		// File::writeArray($defaultConfig, $dmb);
		
		$file = dirname(APP_SYS_PATH)."/config.php";
		$config = require($file);
		$config["THEME"]=$theme;
		File::writeArray($file, $config);
		$this->success("主题启用成功", getBaseURL()."/index.php?m=moban&a=mlist");
	}
	
	/**
	 * 创建新主题
	 */
	public function addt(){
		$this->display();
	}
	
	
	/**
	 * 创建新主题
	 */
	public function theme_add_handler(){
		$theme=post("theme");
		$litpic = dirname(dirname(APP_SYS_PATH)).post("litpic");
		$now = date("Y-m-d H:i:s");
		$config = array();
		$config["author"]=post("author");
		$config["name"]=post("name");
		$config["web"]=post("web");
		$config["version"]=post("version");
		$config["color"]=post("color");
		$config["description"]=post("description");
		$config["updatetime"]=$now;
		$themePath = dirname(APP_SYS_PATH)."/tpl/".$theme;
		//写入配置文件
		$file = $themePath."/default.php";
		File::writeArray($file, $config);
		//移动缩略图
		$img = $themePath."/default.jpg";
		rename($litpic, $img);
		
		$service = new MyfService;
		$service->create_theme($theme);
		
		$this->success("主题创建成功", getBaseURL()."/index.php?m=moban&a=mlist");
	}
	
	/**
	 * 上传安装主题
	 */
	public function install_handler(){
		$theme = $_POST["theme"];
		if(empty($theme)){
			$this->error("请先上传主题");
			return;
		}
		$path = dirname(dirname(__FILE__));
		require_once $path.'/Utils/pclzip.lib.php';
		$themeZip = new PclZip($_SERVER["DOCUMENT_ROOT"].$theme);
		$list = $themeZip->extract(PCLZIP_OPT_PATH,dirname(APP_SYS_PATH)."/tpl/");
		if($list){
			$this->success("主题安装成功", getBaseURL()."/index.php?m=moban&a=mlist");
		}else{
			$err = $themeZip->errorInfo(true);
			dump($err);
		}
	}
	
	/**
	 * 修改配置
	 */
	public function export(){
		$theme = $_GET["theme"];
		if(empty($theme)){
			$this->error("请选择要导出的主题");
			return;
		}	
		$this->assign("list", $minfos);
		$mb = require(dirname(APP_SYS_PATH)."/tpl/$theme/default.php");
		$mb["logo"]=getProjectName()."/tpl/".$theme."/default.jpg";
		$mb["theme"]=$theme;
		$this->assign("mb", $mb);
		$this->display();
	}
	
	/**
	 * 修改主题信息
	 */
	public function export_handler2(){
		$theme=post("theme");
		$litpic = dirname(dirname(APP_SYS_PATH)).post("litpic");
		$litpic = str_replace("\\", "/", $litpic);
		$config = array();
		$config["author"]=post("author");
		$config["name"]=post("name");
		$config["web"]=post("web");
		$config["version"]=post("version");
		$config["color"]=post("color");
		$config["description"]=post("description");
		$config["updatetime"]=date("Y-m-d H:i:s");
		$themePath = dirname(APP_SYS_PATH)."/tpl/".$theme;
		//读取数据库模板
		// $service = new MyfService;
		// $list = $service->find_all_moban();
		// $config["moban"]=$list;
		//写入配置文件
		$file = $themePath."/default.php";
		File::writeArray($file, $config);
		//移动缩略图
		$img = $themePath."/default.jpg";
		$img = str_replace("\\", "/", $img);
		if($litpic!=$img){
			@unlink($img);
		}
		@rename($litpic, $img);
		
		$this->success("主题配置修改成功", getBaseURL()."/index.php?m=moban&a=mlist");
	}
	
	
	/**
	 * 导出模板
	 */
	public function export_handler(){
		$theme = $_GET["theme"];
		if(empty($theme)){
			$this->error("请选择要导出的主题");
			return;
		}	
		// if($theme==C("THEME")){
			// $mbfile = dirname(APP_SYS_PATH)."/tpl/$theme/default.php";
			// $mb = require($mbfile);
			// $service = new MyfService;
			// $list = $service->find_all_moban();
			// $mb["moban"]=$list;
			// File::writeArray($mbfile, $mb);
		// }
		$path = dirname(dirname(__FILE__));
		require_once $path.'/Utils/pclzip.lib.php';
		$themeZip = new PclZip(dirname(APP_SYS_PATH)."/runtime/theme/".$theme.".zip");
		$tplPath = dirname(APP_SYS_PATH).'/tpl/';
		$v_list = $themeZip->create($tplPath.$theme."/",PCLZIP_OPT_REMOVE_PATH,$tplPath);
		if($v_list==0){
			$this->error("模板导出失败");
		}else{
			$this->success("模板导出成功", getProjectName()."/runtime/theme/".$theme.".zip");
		}
	}
	
	/**
	 * 删除主题
	 */
	public function delete_cheme(){
		$theme = $_GET["theme"];
		if(empty($theme)){
			$this->error("请选择要删除的主题");
			return;
		}
		if($theme==C("THEME")){
			$this->error("当前主题不能被删除");
			return;
		}	
		$tplPath = dirname(APP_SYS_PATH).'/tpl/'.$theme;
		File::deltree($tplPath);
		$this->success("主题已成功卸载！", getBaseURL()."/index.php?m=moban&a=mlist");
	}
}

	