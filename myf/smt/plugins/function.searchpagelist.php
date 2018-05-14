<?php
function smarty_function_searchpagelist($params, &$smarty)
{
    //function的返回值将替换模版中函数调用位置的内容
	$p = getInteger("p");
	$params["p"] =$p; 
	
    if(empty($p)){
   		$p=1;
    }
   
    $pagesize = 20;
	if(isset($params["pagesize"]) && is_numeric($params["pagesize"])){
		$pagesize = $params["pagesize"];
	}
	
	$keyword = getSaveString("keyword");
	if(empty($keyword)){
		$where = "1=1";
	}else{
		$where = "title like '%".$keyword."%'";
	}
	$typeid = getInteger("typeid");
	//搜索标签
	$tag = getSaveString("tag");
	if(!empty($tag)){
		$tagdb = M("tag");
		$tags = $tagdb->field("name,arcid,typeid")->where("name='".$tag."'")->findAll();
		$arcids="0";
		foreach ($tags as $key => $value) {
			$arcids.=",".$value["arcid"];
		}
		$where .= " and id in(".$arcids.")";
	}
	//读取所有栏目
	$arctypes = File::readCache("arctypes_cache");
	
	if($typeid>0){
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
	$db = M("archives");
	$totalCount = $db->count($where);
	$page = new MyfPages($pagesize,$totalCount,$p);
	return $page->subPageCss2();;
}
?>