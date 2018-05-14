<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
function smarty_block_channel($params, $content, &$smarty, &$repeat) {
	if(!isset($params['id']) || $params['id']==""){
		//输出时，需要定义一个变量进行存储
		//当检测参数中没有定义此名称时，可以使用 throw 来抛出一个 SmartyException 对象来停止程序执行
		//throw new SmartyException("Param 'name' is not defined");
		//也可以给它默认一个名字
		$params['id'] = "vo";
		//本示例使用默认设置名称为 item 的方法
	}
	$limit = $params["limit"];	
	$topid = $params["topid"];
	$mtypepro = $params["type"];	
	$show = $params["tree"];
	if(!isset($show)){
		$show="narmal";
	}
	//index
	$keyindex = $params["key"];
	if(!isset($keyindex)){
		$keyindex = "k";
	}
	@$type = get_object_vars($smarty->tpl_vars["myfcms"]);
	$params["slefid"] = $type["value"]["id"];
    @$page = get_object_vars($smarty->tpl_vars["page"]);
     $params["page"] = $page["value"];
	
	$dataindex = md5(__FUNCTION__ . md5(serialize($params)));
	if(!isset($smarty->block_data)){$smarty->block_data=array();}
	if(!isset($smarty->block_data[$dataindex])){
		$file = new File;
		$arctypes =$file->readCache2("arctypes_cache");
		if($arctypes && $show=="narmal"){
			$res = array();
			foreach ($arctypes as $key => $value) {
				if($value["isshow"]==0){
					continue;
				}
				if(isset($topid) && is_numeric($topid) && $value["topid"]!=$topid){
					continue;
				}
				if(isset($mtypepro) && is_numeric($mtypepro) && $value["typepro"]!=$mtypepro){
					continue;
				}
				$typepro = $value["typepro"];
				if(C("URLTYPE")=="html"){
					$listnamerule = $value["listnamerule"];
					if($typepro==2){
						if(is_numeric($value["typedir"])){
							$id = $value["typedir"];
							foreach ($arctypes as $k => $v) {
								if($v["id"]==$id){
									if($v["typepro"]==3){
										$value["typeurl"]=getBaseName().$listnamerule."/".$v["typedir"].".html";
									}else{
										$value["typeurl"]=getBaseName().$listnamerule."/";
									}
									break;
								}
							}
						}else{
							$value["typeurl"] = $value["typedir"];
						}
					}else{
						if($typepro==3){
							$value["typeurl"] = getBaseName().$listnamerule."/".$value["typedir"].".html";
						}else{
							$value["typeurl"] = getBaseName().$listnamerule."/";
						}
					}
				}else{
					if($typepro==2 && is_numeric($value["typedir"])){
						$value["typeurl"]=getBaseName()."?a=arctype&id=".$value["typedir"];
					}else{
						$value["typeurl"]=getBaseName()."?a=arctype&id=".$value["id"];
					}
				}
				
				$res[] = $value;
			}	
			if(isset($limit) && is_numeric($limit) && count($res)>$limit){
				$res = array_slice($res, 0,$limit);
			}
			if($res){
				// $res 要输出的结果；
				// 示例程序是直接定义了要输出的结果，通常是通过读取数据库来创建二维或多数组来实现
				$smarty->block_data[$dataindex]=$res;
			}
		}else{
			if($arctypes){
				$tree = new Tree();
				$tree->setArr($arctypes);
				$types = $tree->getTree();
				$smarty->block_data[$dataindex]=$types;
			}
		}
	}
	if(is_array($smarty->block_data[$dataindex])){
		$index =count($smarty->block_data[$dataindex]);
		$item = array_shift($smarty->block_data[$dataindex]);
		$item[$keyindex]=$index;
		$smarty->assign($params['id'], $item);
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