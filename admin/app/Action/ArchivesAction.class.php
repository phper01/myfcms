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
require_once $path.'/Utils/UploadImage.class.php';

class ArchivesAction extends Action{
	
	public function _before_index(){
		$this->setEmptyTheme();
		$user = session("user");
		if(empty($user)){
			$this->error("未登陆，请先登陆",getBaseName()."/");
			exit;
		}else{
			$this->assign("user", $user);
		}
		
		$this->assign("submenu",getSaveString("a"));
		$this->assign("menu","archives");
	}
	
	//获取所有栏目
	private function get_all_arctypes($aids){
		$service = new MyfService();
		$arctypes = $service->find_all_arctype();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		$tt = array();
		if($aids!=0){
			$aids="0,".$aids.",0";
		}
		foreach ($types as $key => $value) {
			$id = ",".$value["id"].",";
			if($value["typepro"]!=0){
				$types[$key]["typename"]=$value["typename"]."(不可用)";
				$types[$key]["id"]=0;
			}
			if($aids!="0"){
				$k = strpos($aids, $id);
				 if(strpos($aids, $id)){
				 	$tt[]=$types[$key];
				 }
			}else{
				$tt[]=$types[$key];
			}
		}
		$this->assign("arctypes",$tt);
		return $types;
	}
	
	private function get_all_arctypes2(){
		$service = new MyfService();
		$arctypes = $service->find_all_arctype();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		return $types;
	}
	
	/**
	 * 文章列表页
	 */
	public function main(){
		$service = new MyfService();
		$pageCount = 20;
		$p = $_REQUEST["p"];
		if(empty($p)){
			$p = 1;
		}
		
		//关键字搜索
		$keyword = $_REQUEST["keyword"];
		$filter = "1=1";
		if(!empty($keyword)){
			$filter.= " and title like '%".$keyword."%'";
			$this->assign("keyword", $keyword);
		}
		
		$user = session("user");
		$typeid = $_REQUEST["typeid"];
		$arctypeIds = 0;
		if(!empty($typeid) && $typeid>0){
			//查询所有子栏目
			$ids = $service->findAllChildArctypeIds($typeid);
			$filter.= " and typeid in(".$ids.")";
			$this->assign("typeid", $typeid);
		}else{
			//如果不是超级管理员，只能浏览自己权限范围内的文章
			if($user["id"]!=1){
				//获取授权栏目的所有子栏目
				$arctypeIds = $service->findUserAuthorityIds($user["id"]);
				$filter.= " and typeid in(".$arctypeIds.")";
			}
		}
		
		$arctypes = $this->get_all_arctypes2();
		if($arctypeIds!=0){
			$arctypeIds = "0,".$arctypeIds.",0";
			$atypes = array();
			foreach ($arctypes as $key => $value) {
				if(strpos($arctypeIds, ",".$value["id"].",")){
					$atypes[]=$value;
				}
			}
			$this->assign("arctypes", $atypes);
		}else{
			$this->assign("arctypes", $arctypes);
		}
		
		//组织分页
		$count = $service->count_archives($filter);
		$page = new MyfPages($pageCount,$count,$p);
		$page_show = $page->subPageCss2();;
		$this->assign("page",$page_show);
		//文章列表
		$list = $service->find_archives_by_page($p,$pageCount,$filter);
		foreach ($list as $key => $arc) {
			$flagname = array();
			$flag = $arc["flag"];
			if($flag){
				$flags = explode(",",$flag);
				if(in_array("h", $flags)){
					$flagname[]="头";
				}
				if(in_array("c", $flags)){
					$flagname[]="推";
				}
				if(in_array("f", $flags)){
					$flagname[]="幻";
				}
				if(in_array("a", $flags)){
					$flagname[]="特";
				}
				if(in_array("p", $flags)){
					$flagname[]="图";
				}
				if(in_array("j", $flags)){
					$flagname[]="跳";
				}
			}
			if($flagname && count($flagname)>0){
				$flagn = implode(",",$flagname);
				$list[$key]["flagname"]=$flagn;
			}
		}
		$this->assign("list",$list);
		
		$this->display("main.html");
	}
	
	/**
	 * 添加文章页
	 */
	public function add(){
		$service = new MyfService();
		$user = session("user");
		$arctypeIds = 0;
		if($user["id"]!=1){
			$arctypeIds = $service->findUserAuthorityIds($user["id"]);			
		}
		$this->get_all_arctypes($arctypeIds);
		
		$now  = date("Y-m-d H:i:s");
		$this->assign("now",$now);
		
		$click = rand(1,300);
		$this->assign("click",$click);
		$topid = getInteger("topid");
		if($topid>0){
			$this->assign("topid", $topid);
		}
		
		$this->display("add.html");
	}
	
	
	
	/**
	 * 保存文章
	 */
	public function add_handler(){
		$data = array();
		$data["title"] = htmlspecialchars($_POST["title"]);
		$flag = $_REQUEST["flags"];
		if(empty($flag)){
			$flag = array();
		}
		$data["litpic"] = $_POST["litpic"];
		$data["smallpic"] = $_POST["smallpic"];
		$data["jump"]=$_POST["jump"];
		if(!empty($data["litpic"])){
			if(!in_array("p", $flag)){
				$flag[] = "p";
			}
		}
		$data["flag"] = @implode(",",$flag);
		$data["keywords"] = $_POST["keywords"];
		$data["color"] = $_POST["color"];
		$data["source"] = $_POST["source"];
		$data["writer"] = $_POST["writer"];
		$data["tag"]=$_POST["tag"];
		$istop = $_POST["istop"];
		if($istop){
			$data["istop"]=1;
		}else{
			$data["istop"]=0;
		}
		$typeid = $_POST["typeid"];
		$service = new MyfService();
		if(!empty($typeid)){
			$arctype = $service->find_arctype_by_id($typeid);
			$data["typeid"]=$typeid;
			$data["typename"] = $arctype["typename"];
			if($arctype["typepro"]==1){
				$this->error("封面栏目不允许添加文章！");
				return;
			}
		}
		$data["description"] = htmlspecialchars($_POST["description"]);
		$sendtime = $_POST["sendtime"];
		if(empty($sendtime)){
			$sendtime = date("Y-m-d H:i:s");
		}
		$data["sendtime"] = $sendtime;
		$data["click"] = $_POST["click"];
		$body = $_POST["content"];
		$data["body"] = get_magic_quotes_gpc()?$body:addslashes($body);
		$archivesId = $service->add_archives($data);
		if($archivesId>0){
			$isgo = $_REQUEST["isgo"];
			//生成静态文章内容页
			if(C("URLTYPE")=="html"){
				$url = getProjectURL()."/index.php?m=index&a=html&start=".$archivesId."&end=".$archivesId."&type=archive";
				Http::request($url);
			}
			if($isgo=="on"){
				$this->success("文章添加成功",getBaseURL()."/index.php?m=archives&a=add&topid=".$typeid);
			}else{
				$this->success("文章添加成功",getBaseURL()."/index.php?m=archives&a=main");
			}
		}else{
			$this->error("文章添加失败");
		}
	}

	/**
	 * 修改文章
	 */
	public function update(){
		$id = getInteger("id");
		$service = new MyfService();
		$archive = $service->find_archives_by_id($id);
		if(!$archive){
			$this->error("查询的文章不存在！");
			return ;
		}
		//判断权限
		$user = session("user");
		if($user["id"]!=1){
			$authorityIds = $service->findUserAuthorityIds($user["id"]);
			if(!strpos("0,".$authorityIds.",0", ",".$archive["typeid"].",")){
				$this->error("没有权限操作该文章！");
				return;
			}
		}
		
		$flag = $archive["flag"];
		$archive["body"] = stripcslashes($archive["body"]);
		$this->assign("topid",$archive["typeid"]);
		$this->assign("arc",$archive);
		if($flag){
			$flags = explode(",",$flag);
			if(in_array("h", $flags)){
				$this->assign("h","h");
			}
			if(in_array("c", $flags)){
				$this->assign("c","c");
			}
			if(in_array("f", $flags)){
				$this->assign("f","f");
			}
			if(in_array("a", $flags)){
				$this->assign("a","a");
			}
			if(in_array("s", $flags)){
				$this->assign("s","s");
			}
			if(in_array("b", $flags)){
				$this->assign("b","b");
			}
			if(in_array("p", $flags)){
				$this->assign("p","p");
			}
			if(in_array("j", $flags)){
				$this->assign("j","j");
			}
		}
		$user = session("user");
		$arctypeIds = 0;
		if($user["id"]!=1){
			$arctypeIds = $service->findUserAuthorityIds($user["id"]);	
		}
		$this->get_all_arctypes($arctypeIds);
		$this->display("update.html");
	}
	/**
	 * 修改文章处理
	 */
	public function update_handler(){
		$data = array();
		$data["title"] = htmlspecialchars($_POST["title"]);
		$flag = $_REQUEST["flags"];
		$data["litpic"] = $_POST["litpic"];
		$data["smallpic"] = $_POST["smallpic"];
		$data["jump"]=$_POST["jump"];
		if(!empty($data["litpic"])){
			if(!in_array("p", $flag)){
				$flag[] = "p";
			}
		}
		$data["flag"] = @implode(",",$flag);
		$data["keywords"] = $_POST["keywords"];
		$data["color"] = $_POST["color"];
		$data["source"] = $_POST["source"];
		$data["writer"] = $_POST["writer"];
		$data["tag"]=$_POST["tag"];
		$istop = $_POST["istop"];
		if($istop){
			$data["istop"]=1;
		}else{
			$data["istop"]=0;
		}
		$typeid = $_POST["typeid"];
		$service = new MyfService();
		if(!empty($typeid)){
			$arctype = $service->find_arctype_by_id($typeid);
			$data["typeid"]=$typeid;
			$data["typename"] = $arctype["typename"];
			if($arctype["typepro"]==1){
				$this->error("封面栏目不允许添加文章！");
				return;
			}
		}
		$data["description"] = $_POST["description"];
		$sendtime = $_POST["sendtime"];
		if(empty($sendtime)){
			$sendtime = date("Y-m-d H:i:s");
		}
		$data["sendtime"] = $sendtime;
		$data["click"] = $_POST["click"];
		$body = $_POST["content"];
		$data["body"] = get_magic_quotes_gpc()?$body:addslashes($body);
		$id = $_POST["id"];
		$rowid = $service->update_archives($id, $data);
		if($rowid>0){
			//生成静态文章内容页
			if(C("URLTYPE")=="html"){
				$url = getProjectURL()."/index.php?m=index&a=html&start=".$id."&end=".$id."&type=archive";
				Http::request($url);
			}
			$this->success("文章更新成功",getBaseURL()."/index.php?m=archives&a=main");
		}else{
			$this->error("文章更新失败");
		}
	}
	
	/**
	 * 上传缩略图
	 */
	public function uploadpic(){
		$upload = new UploadImage("file",dirname(APP_SYS_PATH)."/uploads");
		$newName = $upload->newName();
		$upload->upload($newName);
		$html = "<script>parent.callback('".getProjectName()."/uploads/".$upload->UpFile()."')</script>";
		echo $html;
	}
	
	/**
	 * 简单预览
	 */
	public function view(){
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$arc = $service->find_archives_by_id($id);
		$arc["body"] = stripslashes($arc["body"]);
		$this->assign("arc",$arc);
		$this->display();
	}
	
	/**
	 * 更新文章属性
	 */
	public function update_pro(){
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$archive = $service->find_archives_by_id($id);
		$flag = $archive["flag"];
		$this->assign("arc",$archive);
		if($flag){
			$flags = explode(",",$flag);
			if(in_array("h", $flags)){
				$this->assign("h","h");
			}
			if(in_array("c", $flags)){
				$this->assign("c","c");
			}
			if(in_array("f", $flags)){
				$this->assign("f","f");
			}
			if(in_array("a", $flags)){
				$this->assign("a","a");
			}
			if(in_array("s", $flags)){
				$this->assign("s","s");
			}
			if(in_array("b", $flags)){
				$this->assign("b","b");
			}
			if(in_array("p", $flags)){
				$this->assign("p","p");
			}
		}
		//栏目
		$arttypes = $service->find_all_arctype();
		//删除跳转栏目
		foreach($arttypes as $key=>$value){
			if($value["typepro"]==2){
				unset($arttypes[$key]);
			}
		}
		$this->assign("arttypes",$arttypes);
		$this->display();
	}
	
	/**
	 * 修改文章处理
	 */
	public function update_pro_handler(){
		$data = array();
		$data["title"] = htmlspecialchars($_POST["title"]);
		$flag = $_REQUEST["flags"];
		$data["flag"] = implode(",",$flag);
		$data["keywords"] = $_POST["keywords"];
		$data["source"] = $_POST["source"];
		$data["writer"] = $_POST["writer"];
		$typeid = $_POST["typeid"];
		$service = new MyfService();
		if(!empty($typeid)){
			$arctype = $service->find_arctype_by_id($typeid);
			$data["typeid"]=$typeid;
			$data["typename"] = $arctype["typename"];
			if($arctype["typepro"]==1){
				$this->error("封面栏目不允许添加文章！");
				return;
			}
		}
		$data["description"] = $_POST["description"];
		$id = $_POST["id"];
		$rowid = $service->update_archives($id, $data);
		if($rowid>0){
			$this->success("属性更新成功",$script_name."?m=Archives&a=main");
		}else{
			$this->error("文章更新失败");
		}
	}
	
	/**
	 * 删除文章
	 */
	public function delete(){
		$ids = $_REQUEST["arcid"];
		$service = new MyfService();
		//判断权限
		$user = session("user");
		$authorityIds = $service->findUserAuthorityIds($user["id"]);
		$aids = implode(",", $ids);
		$archives = $service->find_archives_typeIds($aids);
		if($user["id"]!=1){
			foreach ($archives as $key => $value) {
				if(!strpos("0,".$authorityIds.",0", ",".$value["typeid"].",")){
					$this->error("没有权限删除某些文章！");
					return;
				}
			}
		}
		$rows = $service->delete_archives($ids);
		if($rows>0){
			$this->success("文章删除成功",getBaseURL()."/index.php?m=archives&a=main");
		}else{
			$this->error("文章删除失败");
		}
	}
	
	public function findArcitys(){
		$service = new MyfService();
		$arctypes = $service->find_arctypes();
		session("myf_arctypes",$arctypes);
		return $arctypes;
	}
	
	private $ids = array();
	public function findAllChildArchiveIds($id){
		$arctypes = session("myf_arctypes");
		if(empty($arctypes)){
			$arctypes = $this->findArcitys();
		}
		foreach ($arctypes as $key => $value) {
			if($value["topid"]==$id){
				$this->ids[]=$value["id"];
				$this->findAllChildArchiveIds($value["id"]);
			}
		}
		return $this->ids;
	}
	
	
	
}


?>
	