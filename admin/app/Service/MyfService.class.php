<?php

// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
$path = dirname(dirname(__FILE__));
include_once $path.'/Dao/MyfDao.class.php';
class MyfService{
	
	private $dao;
	
	function __construct(){
		$this->dao = new MyfDao();
	}
	
	/**
	 * 添加栏目
	 */
	public function add_arctype($data){
		$typeid = $this->dao->add_arctype($data);
		return $typeid;
	}
	
	/**
	 * 更新栏目
	 */
	public function update_arctype($id,$data){
		return $this->dao->update_arctype($id, $data);
	}
	
	/**
	 * 删除栏目
	 */
	public function delete_arctype($id){
		return $this->dao->delete_arctype($id);
	}
	
	/**
	 * 获取所有栏目
	 */
	public function find_all_arctype($filter="1=1"){
		return $this->dao->find_all_arctype($filter);
	}
	
	public function find_arctypes(){
		return $this->dao->find_arctypes();
	}
	
	
	public function find_arctype_by_id($id){
		return $this->dao->find_arctype_by_id($id);
	}
	
	/**
	 * 更新栏目排序
	 */
	public function update_arctype_sortrank($arctypes){
		foreach ($arctypes as $key => $value) {
			$data = array("sortrank"=>$value);
			$this->dao->update_arctype($key, $data);
		}
	}
	
	public function count_archives($filter){
		return $this->dao->count_archives($filter);
	}
	
	public function find_archives_by_page($page,$pageCount,$filter="1=1"){
		return $this->dao->find_archives_by_page($page,$pageCount,$filter);
	}
	
	public function find_arctype_by_topid(){
		return $this->dao->find_arctype_by_id($id);
	}
	
	public function add_archives($data){
		//添加文章
		$arcid = $this->dao->add_archives($data);
		//添加标签
		if(!empty($data["tag"]) && $arcid>0){
			$tag = str_replace("，", ",", $data["tag"]) ;
			$tags = array();
			$strs = explode(",",$tag);
			$now = date("Y-m-d H:i:s");
			foreach ($strs as $key => $value) {
				if(trim($value)!=""){
					$atag = array("name"=>trim($value),"arcid"=>$arcid,"typeid"=>$data["typeid"],"createtime"=>$now);
					$tags[]=$atag;
				}
			}
			if($tags && count($tags)>0){
				$this->dao->add_tags($tags);
			}
		}
		return $arcid;
	}
	
	public function find_archives_by_id($id){
		return $this->dao->find_archives_by_id($id);
	}
	
	public function find_archives_typeIds($ids){
		return $this->dao->find_archives_typeIds($ids);
	}
	
	public function update_archives($id,$data){
		$row = $this->dao->update_archives($id, $data);
		if($row>0 && !empty($data["tag"])){
			//删除之前的标签
			$this->dao->delete_tags($id);
			//更新标签
			$tag = str_replace("，", ",", $data["tag"]) ;
			$tags = array();
			$strs = explode(",",$tag);
			$now = date("Y-m-d H:i:s");
			foreach ($strs as $key => $value) {
				if(trim($value)!=""){
					$atag = array("name"=>trim($value),"arcid"=>$id,"typeid"=>$data["typeid"],"createtime"=>$now);
					$tags[]=$atag;
				}
			}
			if($tags && count($tags)>0){
				$this->dao->add_tags($tags);
			}
		}
		return $row;
	}
	
	public function delete_archives($ids){
		$ids[] = 0;
		$ids = implode(",",$ids);
		$row = $this->dao->delete_archives($ids);
		if($row>0){
			$this->dao->delete_tags_byIds($ids);
		}
		return $row;
	}
	
	
	//友情链接相关
	public function find_all_flinks(){
		return $this->dao->find_all_flink();
	}
	
	public function add_flink($data){
		return $this->dao->add_flink($data);
	}
	
	public function find_flink_by_id($id){
		return $this->dao->find_flink_by_id($id);
	}
	
	public function update_flink($id,$data){
		return $this->dao->update_flink($id, $data);
	}
	
	public function delete_flink($ids){
		$ids[] = 0;
		$ids = implode(",",$ids);
		return $this->dao->delete_flink($ids);
	}
	
	public function update_flink_sortrank($sortranks){
		foreach ($sortranks as $key => $value) {
			$data = array("sortrank"=>$value);
			$this->dao->update_flink($key, $data);
		}
	}
	
	//系统参数相关
	public function find_all_sys(){
		return $this->dao->find_all_sys();
	}
	
	public function update_sys($cfgs){
		foreach ($cfgs as $key => $value) {
			$d = array("value"=>$value);
			$this->dao->update_sys($key, $d);
		}
	}
	
	public function add_sys($data){
		return $this->dao->add_sys($data);
	}
	
	//管理员相关
	public function find_all_admin(){
		return $this->dao->find_all_admin();
	}
	
	public function find_is_admin_used($loginid){
		return $this->dao->find_admin_by_userid($loginid);
	}
	
	public function add_admin($data){
		$data["createtime"] = date("Y-m-d H:i:s");
		return $this->dao->add_admin($data);
	}
	
	public function find_admin_by_id($id){
		return $this->dao->find_admin_by_id($id);
	}
	
	public function update_admin($id,$data){
		return $this->dao->update_admin($id, $data);
	}
	
	public function delete_admin($id){
		//不能删除超级管理员
		if($id>1){
			return $this->dao->delete_admin($id);
		}else{
			return -1; 
		}
	}
	
	
	/**
	 * 获取默认模板名称
	 */
	public function get_default_moban(){
		$mobans = array("index","face_default","list_default","archive_default","single_default","search_default");
		return $mobans;
	}
	
	//模板管理
	public function find_all_moban(){
		$path = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/";
		$files = array();
		$current_dir = opendir($path); 
		$defaultMobans = $this->get_default_moban();
		//遍历主题下的文件
		 while(($file = readdir($current_dir)) !== false) {
      		if($file == '.' || $file == '..') {
               continue;
          	} else {
          		//文件名
          		$name =trim($file);
				$name = str_replace(".html", "", $name);
				//更新时间
				$updateTime = date("Y-m-d H:i:s",filemtime($path.$file));
				//控制样式
				$arr = explode("_",$name);
				$f = array("filename"=>$name,"updatetime"=>$updateTime,"pix"=>$arr[0]);
				if(in_array($name,$defaultMobans)){
					$f["default"]=true;
				}
				$files[]=$f;
          	}
		 }
		 return $files;
	}
	
	public function add_moban($data,$content){
		//$data["updatetime"] = date("Y-m-d H:i:s");
		//$rowid = $this->dao->add_moban($data);
		$filename = $data["filename"].".html";
		//if($rowid>0){
		$file = new File;
		$filepath = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/";
		$file->write($filepath.$filename, $content);
		//}
		return 1;
	}
	
	public function find_moban_by_id($filename){
		$filepath = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/".$filename.".html";
		$file = new File;
		$m["filename"]=$filename;
		$m["content"] =htmlspecialchars($file->read($filepath));
		$defaultMobans = $this->get_default_moban();
		if(in_array($filename, $defaultMobans)){
			$m["default"] = true;
		}
		return $m;
	}
	
	public function update_moban($data,$content){
		$filename = $data["filename"].".html";
		$file = new File;
		$filepath = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/";
		$filename = $filepath.$filename;
		$oldFile = $filepath.$data["filename"].".html";
		if(file_exists($oldFile)){
			$file->delete($oldFile);
		}
		$file->write($filename, $content);
		return 1;
	}
	
	public function delete_moban($filename){
		$defaultMobans = $this->get_default_moban();
		if(in_array($filename, $defaultMobans)){
			return 0;
		}else{
			$filename = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/".$filename.".html";
			$file = new File;
			$file->delete($filename);
			return 1;
		}
	}
	
	public function create_theme($theme){
		$defaultMobans = $this->get_default_moban();
		$path = dirname(APP_SYS_PATH)."/tpl/".$theme."/index/";
		$file = new File;
		foreach ($defaultMobans as $key => $value) {
			$file->write($path.$value.".html", "");
		}
	}
	
	/**
	 * 写出栏目缓存
	 */
	public function writeArctypeCache(){
		$data = $this->dao->find_arctypes();
		return File::writeCache("arctypes_cache", $data);
	}
	
	//写系统配置缓存
	public function writeSysCache(){
		$data = $this->dao->find_all_sys();
		return File::writeCache("sys_cache", $data);
	}
	
	/**
	 * 查询一个用户的所有权限
	 */
	public function findUserAuthorityIds($userId){
		$user = $this->find_admin_by_id($userId);
		$authorityIds = explode(",", $user["authority"]);
		$this->ids=$authorityIds;
		foreach ($authorityIds as $key => $value) {
			$ids = $this->findAllChildArchiveIds($value);
		}
		$arctypeIds = implode(",", $this->ids);
		return $arctypeIds;
	}
	
	/**
	 * 查询一个栏目的所有子栏目，包含自身
	 */
	public function findAllChildArctypeIds($id){
		$this->ids=array();
		$this->ids[]=$id;
		$this->findAllChildArchiveIds($id);
		$arctypeIds = implode(",", $this->ids);
		return $arctypeIds;
	}
	
	private $ids = array();
	private function findAllChildArchiveIds($id){
		$arctypes = session("myf_arctypes");
		if(empty($arctypes)){
			$arctypes = $this->find_arctypes();
			session("myf_arctypes",$arctypes);
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
