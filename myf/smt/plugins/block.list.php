<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
function smarty_block_list($params, $content, &$smarty, &$repeat) {
	if(!isset($params['id']) || $params['id']==""){
		//输出时，需要定义一个变量进行存储
		//当检测参数中没有定义此名称时，可以使用 throw 来抛出一个 SmartyException 对象来停止程序执行
		//throw new SmartyException("Param 'name' is not defined");
		//也可以给它默认一个名字
		$params['id'] = "vo";
		//本示例使用默认设置名称为 item 的方法
	}
	
	
	//所属栏目
	@$type = get_object_vars($smarty->tpl_vars["myfcms"]);
	$arctype = $type["value"];
	$params["selfid"]=$arctype["id"];
	
	$where="typeid=".$arctype["id"];
	$pagesize = 20;
	if(isset($params["pagesize"]) && is_numeric($params["pagesize"])){
		$pagesize = $params["pagesize"];
	}
	if(C("URLTYPE")=="html"){
		@$page = get_object_vars($smarty->tpl_vars["page"]);
		$p = $page["value"];
	}else{
		$p = getInteger("p");
	}
	$params["p"] =$p; 
	//起始记录
	if($p>0){
		$start = ($p-1)*$pagesize;
	}else{
		$start = 0;
	}
	
	$order = $params["order"];
	if(isset($order)){
		$orderby = $order;
	}else{
		$orderby = "istop desc,id desc";
	}
	//index
	$keyindex = $params["key"];
	if(!isset($keyindex)){
		$keyindex = "k";
	}
	
	
	$dataindex = md5(__FUNCTION__ . md5(serialize($params)));
	if(!isset($smarty->block_data)){$smarty->block_data=array();}
	if(!isset($smarty->block_data[$dataindex])){
		$db_archive = M("archives");
		$res = $db_archive->field("id,typeid,typename,title,flag,click,color,writer,source,litpic,smallpic,keywords,description,sendtime,ishtml,jump,tag")->where($where)->order($orderby)->limit($start.",".$pagesize)->findAll();
		if($res){
			// $res 要输出的结果；
			// 示例程序是直接定义了要输出的结果，通常是通过读取数据库来创建二维或多数组来实现
			$smarty->block_data[$dataindex]=$res;
		}
	}
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$item["arctype"] = $arctype;
		$tag = $item["tag"];
		$item[$keyindex]=$index;
		if(!empty($tag)){
			$tag = str_replace("，", ",", $tag);
			$tags=explode(",",$tag);
			foreach ($tags as $key => $value) {
				if(trim($value)!=""){
					$item["tags"][]=$value;
				}
			}
		}
		if(C("URLTYPE")=="html"){
			$listnamerule = $arctype["listnamerule"];
			$arcnamerule = $arctype["arcnamerule"];
			$item["typeurl"] = getBaseName().$listnamerule."/";
			if(!empty($item["jump"])){
				$item["arcurl"] = $item["jump"];
			}else{
				$item["arcurl"] = getBaseName().$arcnamerule."/".getArcName($item["id"]).".html";
			}
		}else{
			$item["typeurl"] = getBaseName()."?a=arctype&id=".$item["typeid"];
			if(!empty($item["jump"])){
				$item["arcurl"] = $item["jump"];
			}else{
				$item["arcurl"] = getBaseName()."?a=archive&id=".$item["id"];
			}
		}
		
		$smarty->assign($params['id'], $item);
		$smarty->assign($key,count($smarty->block_data[$dataindex]));		if(count($smarty->block_data[$dataindex]) == 0){
			$smarty->block_data[$dataindex] = false;
		}
		$repeat = true;
	}else{
		$repeat = false;
	}
	echo $content;
}
?>