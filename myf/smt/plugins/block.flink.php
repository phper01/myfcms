<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
function smarty_block_flink($params, $content, &$smarty, &$repeat) {
	if(!isset($params['id']) || $params['id']==""){
		//输出时，需要定义一个变量进行存储
		//当检测参数中没有定义此名称时，可以使用 throw 来抛出一个 SmartyException 对象来停止程序执行
		//throw new SmartyException("Param 'name' is not defined");
		//也可以给它默认一个名字
		$params['id'] = "vo";
		//本示例使用默认设置名称为 item 的方法
	}
	if(isset($params["limit"])){
		$limit = $params["limit"];
	}
	
	//index
	$key = $params["key"];
	if(!isset($key)){
		$key = "k";
	}
	
	$dataindex = md5(__FUNCTION__ . md5(serialize($params)));
	if(!isset($smarty->block_data)){$smarty->block_data=array();}
	if(!isset($smarty->block_data[$dataindex])){
		$db_link = M("flink");
		$res = $db_link->order("sortrank asc")->limit($limit)->findAll();
		if($res){
			// $res 要输出的结果；
			// 示例程序是直接定义了要输出的结果，通常是通过读取数据库来创建二维或多数组来实现
			$smarty->block_data[$dataindex]=$res;
		}
	}
	if(is_array($smarty->block_data[$dataindex])){
		$item = array_shift($smarty->block_data[$dataindex]);
		$item["linkurl"] = $item["url"];
		$smarty->assign($params['id'], $item);
		$smarty->assign($key,count($smarty->block_data[$dataindex]));
		
		if(count($smarty->block_data[$dataindex]) == 0){
			$smarty->block_data[$dataindex] = false;
		}
		$repeat = true;
	}else{
		$repeat = false;
	}
	echo $content;
}
?>