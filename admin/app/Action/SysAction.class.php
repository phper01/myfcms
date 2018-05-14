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
class SysAction extends Action {
	
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
		$this->assign("menu","sys");
	}
	
	
	public function main(){
		$service = new MyfService();
		$sys = $service->find_all_sys();
		$this->assign("list",$sys);
		//写缓存
		$service->writeSysCache();
		$this->display("main.html");
	}
	
	public function update_sys(){
		$cfgs = array();
		foreach($_REQUEST as $key=>$value){
			if(strpos("###".$key,"cfg")){
				$arr = explode("_", $key);
				$cfgs[$arr[1]] = stripslashes($value);
			}			
		}
		$service = new MyfService();
		$service->update_sys($cfgs);
		$this->success("系统配置参数更新成功",getBaseURL()."/index.php?m=sys&a=main");
	}
	
	public function add_sys(){
		$this->display("add_sys.html");
	}
	
	public function add_handler(){
		$data = array();
		$data["name"] = htmlspecialchars($_POST["name"]);
		$data["value"] = stripslashes($_POST["value"]);
		$data["info"] = htmlspecialchars($_POST["info"]);
		$data["valuetype"] = $_POST["valuetype"];
		$service = new MyfService();
		$rowid = $service->add_sys($data);
		if($rowid>0){
			$this->success("变量添加成功",getBaseURL()."/index.php?m=sys&a=main");
		}else{
			$this->error("变量添加失败");
		}
	}
	
	public function admin(){
		$service  = new MyfService();
		$list = $service->find_all_admin();
		$this->assign("list",$list);
		$this->display("admin.html");
	}
	
	public function add_admin(){
		$code =  md5(rand(200,5000));
		$this->assign("code",$code);
		session("code",$code);
		$this->get_all_arctypes();
		$this->display("add_admin.html");
	}
	
	public function add_admin_handler(){
		
		$code = $_REQUEST["code"];
		if($code!=session("code")){
			$this->error("安全验证串错误！");
			return;
		}
		$arctypes = $_REQUEST["arctype"];
		$arctypes = implode(",",$arctypes);
		$data = array();
		$data["userid"] = $_POST["userid"];
		$data["uname"] = $_POST["uname"];
		$data["pwd"] = md5(base64_encode($_POST["pwd"]));
		$data["email"] = $_POST["email"];
		$data["authority"] = $arctypes;
		$service = new MyfService();
		if($service->find_is_admin_used($userid)){
			$this->error("该管理员登录名已经被使用！");
		}else{
			$rowid = $service->add_admin($data);
			if($rowid>0){
				$this->success("普通管理员添加成功",getBaseURL()."/index.php?m=sys&a=admin");
			}else{
				$this->error("用户添加失败");
			}
		}
	}
	
	public function update_admin(){
		$code =  md5(rand(200,5000));
		$this->assign("code",$code);
		session("updatecode",$code);
		
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$user = $service->find_admin_by_id($id);
		$this->assign("admin",$user);
		$this->get_all_arctypes2($user["authority"]);
		$this->display("update_admin.html");
	}
	
	public function update_admin_handler(){
		$code = $_REQUEST["code"];
		if($code!=session("updatecode")){
			$this->error("安全验证串错误！");
			return;
		}
		$arctypes = $_REQUEST["arctype"];
		$arctypes = implode(",",$arctypes);
		$data = array();
		$data["uname"] = $_POST["uname"];
		$pwd = $_POST["pwd"];
		if(!empty($pwd)){
			$data["pwd"] = md5(base64_encode($pwd));
		}		
		$data["authority"] = $arctypes;
		$data["email"] = $_POST["email"];
		$id = $_POST["id"];
		$service = new MyfService();
		$rowid = $service->update_admin($id, $data);
		if($rowid>0){
			$this->success("管理员修改成功",getBaseURL()."/index.php?m=sys&a=admin");
		}else{
			$this->error("用户修改失败");
		}
	}
	
	public function delete_admin(){
		$code =  md5(rand(200,5000));
		$this->assign("code",$code);
		session("deletecode",$code);
		
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$user = $service->find_admin_by_id($id);
		$this->assign("admin",$user);
		$this->display("delete_admin.html");
	}
	
	public function delete_admin_handler(){
		$code = $_REQUEST["code"];
		if($code!=session("deletecode")){
			$this->error("安全验证串错误！");
			return;
		}
		$id = getInteger("id");
		$service = new MyfService();
		$rowid = $service->delete_admin($id);
		if($rowid>0){
			$this->success("普通管理员删除成功",getBaseURL()."/index.php?m=sys&a=admin");
		}else{
			if($rowid==-1){
				$this->error("初始管理员不能被删除");
			}else{
				$this->error("用户删除失败");
			}
			
		}
	}
	
	//获取所有栏目
	private function get_all_arctypes(){
		$service = new MyfService();
		$arctypes = $service->find_arctypes();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		$this->assign("arctypes",$types);
	}
	
	//获取所有栏目
	private function get_all_arctypes2($ids){
		$ids = "0,".$ids.",0";
		$service = new MyfService();
		$arctypes = $service->find_arctypes();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		foreach ($types as $key => $value) {
			if(strpos($ids, ",".$value["id"].",")){
				$types[$key]["checked"]="checked";
			}
		}
		$this->assign("arctypes",$types);
	}
}
