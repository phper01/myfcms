<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class Category {

	private $arctypes=array();
	
	function __construct(){
		$this->arctypes = array();
	}
	
	/**
	 * 清空
	 */
	public function emptyArctypes(){
		$this->arctypes=array();
	}
	
	/**
	 * 获取所有父级栏目
	 */
	public function getTopArctypes($topid){
		if($topid>0){
			$arctypes = File::readCache("arctypes_cache");
			$arctype = null;
			if(!empty($arctypes)){
				foreach ($arctypes as $key => $value) {
					if($value["id"]==$topid){
						$arctype=$value;
						break;
					}
				}
				$this->arctypes[] = $arctype;
				if($arctype["topid"]>0){
					return $this->getTopArctypes($arctype["topid"]);
				}
			}
			return $this->arctypes;
		}
	}
	
	/**
	 * 获取所有子栏目
	 */
	public function getChildArctypes($topid){
		$arctypes = File::readCache("arctypes_cache");
		if(!empty($arctypes)){
			foreach ($arctypes as $key => $value) {
				if($value["topid"]==$topid){
					$this->arctypes[] = $value;
					if($value){
						$this->getChildArctypes($value["id"]);
					}
				}
			}
		}
		return $this->arctypes;
	}
	
	/**
	 * 获取当前栏目
	 */
	public function getArctypeById($id){
		$arctypes = File::readCache("arctypes_cache");
		if(!empty($arctypes)){
			foreach ($arctypes as $key => $value) {
				if($value["id"]==$id){
					return $value;
				}
			}
		}
	}
}


?>