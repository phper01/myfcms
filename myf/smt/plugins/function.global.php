<?php
function smarty_function_global($params, &$smarty)
{        
    //function的返回值将替换模版中函数调用位置的内容
    $name = $params["name"];
	if(isset($name)){
		$sys = File::readCache("sys_cache");
		if($sys && count($sys)>0){
			foreach ($sys as $key => $value) {
				if($value["name"]==$name){
					return $value["value"];
				}
			}
		}
	}
}
?>