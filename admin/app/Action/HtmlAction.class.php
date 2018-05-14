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

class HtmlAction extends Action {
	
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
		$this->assign("menu","html");
	}
	
	//获取所有栏目
	private function get_all_arctypes(){
		$service = new MyfService();
		$user = session("user");
		$arctypeIds = 0;
		if($user["id"]!=1){
			$arctypeIds = $service->findUserAuthorityIds($user["id"]);
		}
		$arctypes = $service->find_all_arctype();
		$tree = new Tree();
		$tree->setArr($arctypes);
		$types = $tree->getTree();
		$tt = array();
		if($arctypeIds!=0){
			$arctypeIds="0,".$arctypeIds.",0";
		}
		foreach ($types as $key => $value) {
			$id = ",".$value["id"].",";
			if($arctypeIds!="0"){
				 if(strpos($arctypeIds, $id)){
				 	$tt[]=$types[$key];
				 }
			}else{
				$tt[]=$types[$key];
			}
		}
		$this->assign("arctypes",$tt);
	}
	
	//随机验证码
	private function get_rand_code(){
		//随机验证码
		$randcode = getRandStr();
		session("randcode",$randcode);
		$this->assign("randcode", $randcode);
	}
	
	
	public function main(){
		$this->get_all_arctypes();
		$this->get_rand_code();
		$this->display();
	}
	
	public function archive(){
		$this->get_all_arctypes();
		$this->get_rand_code();
		$this->display();
	}
	
	public function index(){
		$this->get_rand_code();
		$this->display();
	}
	
	
}