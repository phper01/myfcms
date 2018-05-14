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
 
class ArctypeAction extends Action {
	
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
		$this->assign("menu","arctype");
	}
	
	//获取所有栏目
	private function get_all_arctypes(){
		$service = new MyfService();
		$arctypes = $service->find_arctypes();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		$this->assign("arctypes",$types);
		$this->assign("dir_category", C("DIR_CATEGORY"));
		$this->assign("dir_archives", C("DIR_ARCHIVES"));
	}
	
	/**
	 * 栏目管理页面
	 */
	public function main(){
		$this->get_all_arctypes();
		$service = new MyfService();
		////写缓存
		$service->writeArctypeCache();
		$this->display("main.html");
	}
	
	/**
	 * 添加栏目页面
	 */
	public function add(){
		//读取模板
		$list = File::filelist(dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index");
		$faceMoban = array();
		$listMoban = array();
		$archiveMoban = array();
		$singleMoban = array();
		foreach ($list as $key => $value) {
			$arr = explode("_",$value);
			$pix = $arr[0];
			$moban = array("pix"=>$arr[0],"name"=>$arr[1],"filename"=>$value);
			if($pix=="face"){
				$faceMoban[]=$moban;
			}else if($pix=="list"){
				$listMoban[]=$moban; 
			}else if($pix=="archive"){
				$archiveMoban[]=$moban;
			}else if($pix=="single"){
				$singleMoban[]=$moban;
			}
		}
		$this->assign("facemoban", $faceMoban);
		$this->assign("listmoban", $listMoban);
		$this->assign("archivemoabn", $archiveMoban);
		$this->assign("singlemoban", $singleMoban);
		
		$topid = $_GET["topid"];
		if(empty($topid)){
			$topid = 0;
		}
		$this->assign("topid",$topid);
		$this->get_all_arctypes();
		$this->display("add.html");
	}
	
	/**
	 * 添加栏目处理事件
	 */
	public function add_handler(){
		$data = array();
		$data["typename"] = htmlspecialchars($_POST["typename"]);
		$data["topid"] = $_POST["topid"];
		$data["sortrank"] = $_POST["sortrank"];
		$typepro = $_POST["typepro"];
		$data["typepro"] = $typepro;
		$data["seotitle"] = htmlspecialchars($_POST["seotitle"]);
		$data["keywords"] = $_POST["keywords"];
		$data["description"] = htmlspecialchars($_POST["description"]);
		$typedir = $_POST["typedir"];
		$data["typedir"] = $typedir;
		$data["litpic"] = $_POST["litpic"];
		$dirpos = $_POST["dirpos"];
		$data["dirpos"] = $dirpos;
		if($dirpos=="1"){
			$data["listnamerule"] = "/".$typedir;
			$data["arcnamerule"] = "/".$typedir;
		}else{
			$data["listnamerule"] = "/".C("DIR_CATEGORY")."/".$typedir;
			$data["arcnamerule"] = "/".C("DIR_ARCHIVES");
		}
		
		$data["isshow"] = $_POST["isshow"];
		if($typepro==3){
			$body = $_POST["content"]; 
			$data["body"] = get_magic_quotes_gpc()?$body:addslashes($body);
			if($dirpos==1){
				$data["listnamerule"] = "";
			}else{
				$data["listnamerule"] = "/".C("DIR_CATEGORY");
			}
		}
		
		$data["indexpath"]=$_POST["indexpath"];
		$data["listpath"] = $_POST["listpath"];
		$data["singlepath"] = $_POST["singlepath"];
		$data["archivepath"] = $_POST["archivepath"];
		
		$service = new MyfService();		$typeid = $service->add_arctype($data);
		if($typeid>0){
			$this->success("栏目添加成功",getBaseURL()."/index.php?m=arctype&a=main");
		}else{
			$this->error("栏目添加失败");
		}	}
	
	/**
	 * 更新栏目页面
	 */
	public function update(){
		//读取模板
		$list = File::filelist(dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index");
		$faceMoban = array();
		$listMoban = array();
		$archiveMoban = array();
		$singleMoban = array();
		foreach ($list as $key => $value) {
			$arr = explode("_",$value);
			$pix = $arr[0];
			$moban = array("pix"=>$arr[0],"name"=>$arr[1],"filename"=>$value);
			if($pix=="face"){
				$faceMoban[]=$moban;
			}else if($pix=="list"){
				$listMoban[]=$moban; 
			}else if($pix=="archive"){
				$archiveMoban[]=$moban;
			}else if($pix=="single"){
				$singleMoban[]=$moban;
			}
		}
		$this->assign("facemoban", $faceMoban);
		$this->assign("listmoban", $listMoban);
		$this->assign("archivemoabn", $archiveMoban);
		$this->assign("singlemoban", $singleMoban);
		
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$arctype = $service->find_arctype_by_id($id);
		$arctype["body"] = stripcslashes($arctype["body"]);
		$this->assign("topid",$arctype["topid"]);
		$this->assign("typepro",$arctype["typepro"]);
		$this->assign("arctype",$arctype);
		$this->get_all_arctypes();
		
		
		$this->display("update.html");
	}
	
	/**
	 * 更新栏目处理事件
	 */
	public function update_handler(){
		$data = array();
		$data["typename"] = htmlspecialchars($_POST["typename"]);
		$data["topid"] = $_POST["topid"];
		$data["sortrank"] = $_POST["sortrank"];
		$data["seotitle"] = $_POST["seotitle"];
		$data["keywords"] = $_POST["keywords"];
		$data["description"] = $_POST["description"];
		$typedir = $_POST["typedir"];
		$data["typedir"] = $typedir;
		$data["litpic"] = $_POST["litpic"];
		$dirpos = $_POST["dirpos"];
		$data["dirpos"] = $dirpos;
		$data["isshow"] = $_POST["isshow"];
		if($dirpos=="1"){
			$data["listnamerule"] = "/".$typedir;
			$data["arcnamerule"] = "/".$typedir;
		}else{
			$data["listnamerule"] = "/".C("DIR_CATEGORY")."/".$typedir;
			$data["arcnamerule"] = "/".C("DIR_ARCHIVES");
		}
		$typepro = $_POST["typepro"];
		if($typepro==3){
			$body = $_POST["content"];
			$data["body"] = get_magic_quotes_gpc()?$body:addslashes($body);
			if($dirpos==1){
				$data["listnamerule"] = "";
			}else{
				$data["listnamerule"] = "/".C("DIR_CATEGORY");
			}
		}
		$data["typepro"] = $typepro;
		$id = $_POST["id"];
		$data["indexpath"]=$_POST["indexpath"];
		$data["listpath"] = $_POST["listpath"];
		$data["singlepath"] = $_POST["singlepath"];
		$data["archivepath"] = $_POST["archivepath"];
		$service = new MyfService();
		$rowid = $service->update_arctype($id, $data);
		if($rowid>0){
			$this->success("栏目更新成功",getBaseURL()."/index.php?m=arctype&a=main");
		}else{
			$this->error("栏目更新失败");
		}
	}
	
	/**
	 * 更新排序处理事件
	 */
	public function sort_rank(){
		
		$sortranks = array();
		foreach($_REQUEST as $key=>$value){
			if(strpos("###".$key,"sortrank")){
				$arr = explode("_", $key);
				$sortranks[$arr[1]] = $value;
			}			
		}
		$service = new MyfService();
		$service->update_arctype_sortrank($sortranks);
		$this->success("栏目顺序更新成功",getBaseURL()."/index.php?m=arctype&a=main");
	}
	
	/**
	 * 处理删除
	 */
	public function delete_handler(){
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$rowid = $service->delete_arctype($id);
		if($rowid>0){
			$this->success("栏目删除成功",getBaseURL()."/index.php?m=arctype&a=main");
		}else{
			$this->error("栏目删除失败，请确保要删除的栏目没有子栏目并且栏目下没有文章！");
		}
	}
	
}

?>