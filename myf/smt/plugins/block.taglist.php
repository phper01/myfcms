<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
function smarty_block_taglist($params, $content, &$smarty, &$repeat) {
	if(!isset($params['id']) || $params['id']==""){
		//输出时，需要定义一个变量进行存储
		//当检测参数中没有定义此名称时，可以使用 throw 来抛出一个 SmartyException 对象来停止程序执行
		//throw new SmartyException("Param 'name' is not defined");
		//也可以给它默认一个名字
		$params['id'] = "vo";
		//本示例使用默认设置名称为 item 的方法
	}
	
	@$arcobj = get_object_vars($smarty->tpl_vars["myfcms"]);
	$arc = $arcobj["value"];
	$params["selfid"]=$arc["id"];
	@$pageobj = get_object_vars($smarty->tpl_vars["page"]);
	$page = $pageobj["value"];
	if(empty($page)){
		$page=1;
	}
	$params["page"]=$page;
	
	if(isset($params["limit"])){
		$limit = $params["limit"];
	}else{
		$limit = 20;
	}
	$where = "1=1";
	$typeid = $params["typeid"];
	if(isset($typeid) && is_numeric($typeid)){
		$category = new Category;
		$childs = $category->getChildArctypes($typeid);
		$typeids=$typeid;
		foreach ($childs as $key => $value) {
			if($value["typepro"]==0){
				$typeids.=",".$value["id"];
			}
		}
		if(is_numeric($typeids)){
			$where.=" and typeid=".$typeid;
			//获取当前栏目
			foreach ($arctypes as $key => $value) {
				if($value["id"]==$typeid){
					$arctype = $value;
					break;
				}
			}
		}else{
			$where.=" and typeid in(".$typeids.")";
		}		
		
	}
	//标签排序
	$orderby = "count(name) desc";
	//index
	$keyindex = $params["key"];
	if(!isset($keyindex)){
		$keyindex = "k";
	}
	
	$dataindex = md5(__FUNCTION__ . md5(serialize($params)));
	if(!isset($smarty->block_data)){$smarty->block_data=array();}
	if(!isset($smarty->block_data[$dataindex])){
		$fields = "name,count(name) as count";
		$db_tag = M("tag");
		$res = $db_tag->field($fields)->where($where)->group("name")->order($orderby)->limit($limit)->findAll();
		if($res){
			// $res 要输出的结果；
			// 示例程序是直接定义了要输出的结果，通常是通过读取数据库来创建二维或多数组来实现
			$smarty->block_data[$dataindex]=$res;
		}
	}
	if(is_array($smarty->block_data[$dataindex])){
		$index =count($smarty->block_data[$dataindex]);
		$item = array_shift($smarty->block_data[$dataindex]);
		$item[$keyindex]=$index;
		$item["tagurl"]=getBaseURL()."/index.php?a=search&tag=".$item["name"];
		$smarty->assign($params['id'], $item);		if(count($smarty->block_data[$dataindex]) == 0){
			$smarty->block_data[$dataindex] = false;
		}
		$repeat = true;
	}else{
		$repeat = false;
	}
	echo $content;
}
?>