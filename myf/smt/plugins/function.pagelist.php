<?php
function smarty_function_pagelist($params, &$smarty)
{
    //function的返回值将替换模版中函数调用位置的内容
    if(C("URLTYPE")=="html"){
		@$page = get_object_vars($smarty->tpl_vars["page"]);
		$p = $page["value"];
	}else{
		$p = getInteger("p");
	}
	$params["p"] =$p; 
	
    if(empty($p)){
   		$p=1;
    }
   
    $pagesize = 20;
	if(isset($params["pagesize"]) && is_numeric($params["pagesize"])){
		$pagesize = $params["pagesize"];
	}
	
	@$type = get_object_vars($smarty->tpl_vars["myfcms"]);
	$type = $type["value"];
	$typeid = $type["id"];
	//所属分类
	$where="typeid=".$typeid;
	$params["typeid"] = $typeid;
	
	$db = M("archives");
	$totalCount = $db->count($where);
	$page = new MyfPages($pagesize,$totalCount,$p);
	if(C("URLTYPE")=="html"){
		return $page->subPageCss3($type["listnamerule"]);		
	}else{
		return $page->subPageCss2();;
	}
}
?>