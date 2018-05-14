<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class IndexAction extends Action{
	
	public function _before_index(){
		$this->setEmptyTheme();
	}
	
	public function index(){
		$admin = session("user");
		if(empty($admin)){
			$now = date("Y");
			$this->assign("now", $now);
			$this->showTpl();
			$this->display("index.html");
		}else{
			$this->success("已经登陆", getBaseName()."/index.php?m=archives&a=main");
		}	}
	
	public function login_in(){
		$username = getSaveString("userid");
		$pwd = getSaveString("pwd");
		$code = getInteger("verify");
		if($code!=$_SESSION["myf_vcode"]){
			$this->error("验证码错误！");
			return;
		}
		if(empty($username) || empty($pwd)){
			$this->error("用户名或密码不能为空！");
		}else{
			$pwd = md5(base64_encode($pwd));
			$db = M("admin");
			$admin = $db->find("userid='".$username."' and pwd='".$pwd."'");
			if($admin){
				session("user",$admin);
				$data = array("logintime"=>date("Y-m-d H:i:s"),"loginip"=>get_client_ip());
				$db->where("id=".$admin["id"])->update($data);
				$this->success("登陆成功", getBaseName()."/index.php?m=archives&a=main");
			}else{
				$this->error("用户名或密码错误！");
			}
		}
	}
	
	public function login_out(){
		session("user",NULL);
		$this->success("成功退出", getBaseName());
	}
	
	public function _after_index(){
	}
}
