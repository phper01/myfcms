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

class FlinkAction extends Action {
   	
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
		$this->assign("menu","flink");
	}
	
	public function main(){
		$service = new MyfService();
		$data = $service->find_all_flinks();
		$this->assign("list",$data);
		$this->display("main.html");
	}
	
	public function add(){
		$this->display("add.html");
	}
	
	public function add_handler(){
		$data = array();
		$data["url"] = $_REQUEST["url"];
		$data["webname"] = $_REQUEST["webname"];
		$data["sortrank"] = $_REQUEST["sortrank"];
		$data["description"] = $_REQUEST["description"];
		$data["logo"] = $_REQUEST["litpic"];
		$data["dtime"] =date("Y-m-d H:i:s");
		$service = new MyfService();
		$linkId = $service->add_flink($data);
		if($linkId>0){
			$this->success("链接添加成功",getBaseURL()."/index.php?m=flink&a=main");
		}else{
			$this->error("链接添加失败");
		}
	}
	
	public function update(){
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$link = $service->find_flink_by_id($id);
		$this->assign("link",$link);
		$this->display("update.html");
	}
	
	public function update_handler(){
		$data = array();
		$data["url"] = $_REQUEST["url"];
		$data["webname"] = $_REQUEST["webname"];
		$data["sortrank"] = $_REQUEST["sortrank"];
		$data["description"] = $_REQUEST["description"];
		$data["logo"] = $_REQUEST["litpic"];
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$rows = $service->update_flink($id, $data);
		if($rows>0){
			$this->success("链接更新成功",getBaseURL()."/index.php?m=flink&a=main");
		}else{
			$this->error("链接更新失败");
		}
	}
	
	public function delete(){
		$id = $_REQUEST["id"];
		$service = new MyfService();
		$rows = $service->delete_flink($id);
		if($rows>0){
			$this->success("链接删除成功",getBaseURL()."/index.php?m=flink&a=main");
		}else{
			$this->error("链接删除失败");
		}
	}
	
	public function sort_rank(){
		
		$sortranks = array();
		foreach($_REQUEST as $key=>$value){
			if(strpos("###".$key,"sortrank")){
				$arr = explode("_", $key);
				$sortranks[$arr[1]] = $value;
			}			
		}
		$service = new MyfService();
		$service->update_flink_sortrank($sortranks);
		$this->success("链接排序更新成功",getBaseURL()."/index.php?m=flink&a=main");
	}
}
   
?>