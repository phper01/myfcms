<?php
// +----------------------------------------------------------------------
// | MyfPHP 闵益飞PHP MVC框架 -- 路由类
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class Action{
	
	private $tpl;
	private $model;
	/**
	 * 初始化函数
	 */
	public function _init($model){
		$this->model = $model;
		$this->tpl = new Smarty();
		$this->tpl->left_delimiter = '{';
		$this->tpl->right_delimiter = '}';
		$this->tpl->template_dir = APP_PATH."/tpl/".getTheme()."/".strtolower($model); //设置模板目录 
		$this->tpl->compile_dir = dirname(APP_SYS_PATH)."/runtime/tpl_c"; //设置编译目录 
		$this->tpl->assign("myf_path",getBaseName());//定义程序路径
		$this->tpl->assign("myf_full_path",getBaseURL());//定义绝对URL路径
		$this->tpl->assign("myf_url",getProjectURL());//项目绝对URL路径
	}
	
	/**
	 * 设置空模板--后台使用
	 */
	public function setEmptyTheme(){
		$this->tpl->template_dir = APP_PATH."/tpl/".strtolower($this->model); //设置模板目录 
	}
	
	public function showTpl(){
	}
	
	/**
	 * method前执行的全局方法
	 */
	public function _before_index(){
		
	}
	
	/**
	 * method后执行的全局方法
	 */
	public function _after_index(){
		
	}
	
	/**
	 * 显示模板
	 */
	public function display($tplname=""){
		if(empty($tplname)){
			$tplname = getSaveString("a");
			if(empty($tplname)){
				$tplname = "index";
			}
			$tplname.=".html";
		}	
		$this->tpl->display($tplname);
	}
	
	/**
	 * 模板变量赋值
	 */
	public function assign($name,$value){
		$this->tpl->assign($name,$value);
	}
	
	/**
	 * 获取模板内容
	 */
	public function fetch($tplname,$display=false){
		return $this->tpl->fetch($tplname);
	}
	
	/**
	 * @parmas $url 跳转路径，例:index/index
	 * @params $time=0 间隔时间，单位：秒
     * @params $msg='' 提示信息
	 */
	public function redirect($url, $time=0, $msg=''){
		redirect($url,$time,$msg);
	}
	
	/**
	 * 错误跳转
	 */
	public function error($msg,$url='javascript:history.back(-1);'){
		$this->tpl->template_dir = APP_SYS_PATH;
		$this->tpl->assign("state","error");
		$this->tpl->assign("msg",$msg);
		$this->tpl->assign("time",3);
		$this->tpl->assign("url",$url);
		$this->tpl->display("msg.html");
	}
	
	/**
	 * 成功跳转
	 */
	public function success($msg,$url){
		$this->tpl->template_dir = APP_SYS_PATH;
		$this->tpl->assign("state","success");
		$this->tpl->assign("msg",$msg);
		$this->tpl->assign("url",$url);
		$this->tpl->assign("time",1);
		$this->tpl->display("msg.html");
	}
	
	/**
     * 
     */
	public function __call($method, $args){
		echo "访问出错，没有该资源";
	}	
	
}

