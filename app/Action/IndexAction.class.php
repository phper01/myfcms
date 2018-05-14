<?php
// +----------------------------------------------------------------------
// | MyfCMS 闵益飞内容管理系统 [ 中国首家完全免费开源的PHPCMS ]
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
$path = dirname(dirname(__FILE__));
require_once $path.'/Utils/Category.class.php';
class IndexAction extends Action{
	
	private $arctypes=array();
	
	//首页
	public function index($isShow=true){
	    //判断系统是否已经安装
	    $configFile = APP_PATH."/config.php";
        if(!file_exists($configFile)){
            $this->success("准备安装，请稍后", getBaseURL()."/index.php?m=install");
            exit;
        }
		//页面静态化
		if(C("URLTYPE")=="html"){
			$content = $this->fetch("index.html");
			$file = new File;
			$filename = dirname(APP_SYS_PATH)."/index.html";
			$file->write($filename, $content);
			if($isShow){
				echo $content;
			}
		}else{
			$this->display();
		}
	}
	
	public function search(){
		$keyword = getSaveString("keyword");
		$tag = getSaveString("tag");
		$myfcms = array();
		$myfcms["position"] = '<a href="'.getBaseName().'/">首页</a><span class="split"> » </span> 搜索';
		$myfcms["keyword"] = $keyword;
		$myfcms["tag"] = $tag;
		$this->assign("myfcms", $myfcms);
		$this->display("search_default.html");
	}
	
	//更新点击
	public function click(){
		$id = getInteger("id");
		$click=0;
		if($id>0){
			$db = M("archives");
			$arc = $db->find("id=".$id);
			if($arc){
				$click =intval($arc["click"])+1; 
				$data = array("click"=>$click);
				$db->where("id=".$id)->update($data);
			}
		}
		echo "document.write($click)";
	}
	
	//文章内容页
	public function archive($innerId="",$isShow=true){
		if(empty($innerId)){
			$arcid = getInteger("id");
		}else{
			$arcid = $innerId;
		}
		if($arcid>0){
			$db = M("archives");
			$arc = $db->find("id=".$arcid);
			if($arc){
				$arc["arcurl"] = getBaseURL()."?a=archive&id=".$arcid;
				//查询所属栏目
				$arctypes = File::readCache("arctypes_cache");
				foreach ($arctypes as $key => $value) {
					if($value["id"]==$arc["typeid"]){
						$arc["arctype"] = $value;
						break;
					}
				}
				$arctype = $arc["arctype"];
				if(C("URLTYPE")=="html"){
					$arcnamerule = $arctype["arcnamerule"];
					$arc["arcurl"] = getBaseURL().$arcnamerule."/".getArcName($arcid).".html";
				}
				
				$tag = $arc["tag"];
				if(!empty($tag)){
					$tag = str_replace("，", ",", $tag);
					$tags=explode(",",$tag);
					foreach ($tags as $key => $value) {
						if(trim($value)!=""){
							$arc["tags"][]=$value;
						}
					}
				}
				
				//下一篇
				$next = $db->field("id,jump,title")->order("id asc")->limit("1")->find("id>".$arcid." and typeid=".$arctype["id"]);
				
				if($next){
					if(C("URLTYPE")=="html"){
						if(empty($next["jump"])){
							$arc["next"] = "<a href='".getBaseName().$arcnamerule."/".getArcName($next["id"]).".html'>".$next["title"]."</a>";
						}else{
							$arc["next"] = "<a href='".$next["jump"]."' target='_blank'>".$next["title"]."</a>";
						}
					}else{
						$arc["next"] = "<a href='".getBaseName()."?a=archive&id=".$next["id"]."'>".$next["title"]."</a>";
					}
				}else{
					$arc["next"]="没有了";
				}
				//上一篇
				$pre = $db->field("id,jump,title")->order("id desc")->limit("1")->find("id<".$arcid." and typeid=".$arctype["id"]);
				if($pre){
					if(C("URLTYPE")=="html"){
						if(empty($pre["jump"])){
							$arc["pre"] = "<a href='".getBaseName().$arcnamerule."/".getArcName($pre["id"]).".html'>".$pre["title"]."</a>";
						}else{
							$arc["pre"] = "<a href='".$pre["jump"]."' target='_blank'>".$pre["title"]."</a>";
						}
					}else{
						$arc["pre"] = "<a href='".getBaseName()."?a=archive&id=".$pre["id"]."'>".$pre["title"]."</a>";
					}
				}else{
					$arc["pre"]="没有了";
				} 
				//当前位置
				$position = $this->getPosition($arc["typeid"]);
				$position.= $arc["title"];
				$arc["position"]= $position;
				$this->assign("myfcms", $arc);
				
				$tplname = $arc["arctype"]["archivepath"]; 
				//生成html
				if(C("URLTYPE")=="html"){
					$content = $this->fetch($tplname);
					$file = new File;
					$filename = dirname(APP_SYS_PATH).$arcnamerule."/".getArcName($arc["id"]).".html";
					$file->write($filename, $content);
					if($isShow){
						//更新html标志位
						$data = array("ishtml"=>1);
						$row = $db->where("id=".$arcid)->update($data);
						echo $content;
					}else{
						return $arc["arctype"];
					}
				}else{
					$this->display($tplname);
				}
				
			}
		}
	}
	
	//栏目页
	public function arctype($innerId="",$isShow=true){
		if(empty($innerId)){
			$typeid = getInteger("id");
		}else{
			$typeid = $innerId;
		}
		$this->assign("selfid", $typeid);
		if($typeid>0){
			$db = M("arctype");
			$arctype = $db->find("id=".$typeid);
			$position = $this->getPosition($arctype["topid"]);
			$position .= $arctype["typename"];
			$arctype["position"]  = $position;
			//设置顶级栏目
			if($arctype["topid"]==0){
				$this->assign("topchannel", $arctype);
			}
			$arctype["typeid"] = $arctype["id"];
			$this->assign("myfcms", $arctype);
			//选择模板
			$typepro = $arctype["typepro"];
			
			$tplname = "";
			//处理跳转栏目
			if($typepro==2){
				if(is_numeric($arctype["typedir"])){
					if($isShow){
						header("Location:".getBaseName()."/?a=arctype&id=".$arctype["typedir"]);
						exit;
					}
				}else{
					if($isShow){
						header("Location:".$arctype["typedir"]);
						exit;
					}
				}
			}else{
				//处理非跳转栏目
				$filename = "";
				$listnamerule = $arctype["listnamerule"];
				if($typepro==0){
					$tplname = $arctype["listpath"];
					$filename = $listnamerule."/index.html";
				}else if($typepro==1){
					$tplname = $arctype["indexpath"];
					$filename = $listnamerule."/index.html";
				}else if($typepro==3){
					$tplname = $arctype["singlepath"];
					$filename = $listnamerule."/".$arctype["typedir"].".html";
				}
				
				//生成html
				if(C("URLTYPE")=="html"){
					//如果是列表页，需要分页生成html
					if($typepro==0){
						//获取改栏目下的文章总数
						$arcdb = M("archives");
						$totalCount = $arcdb->where("typeid=".$typeid)->count();
						
						//获取模版中的分页
						$tplFile = dirname(APP_SYS_PATH)."/tpl/".getTheme()."/index/".$tplname;
						$file = new File();
						$content = $file->read($tplFile);
						$content = str_replace("'", '""', $content);
						$pageSize = getStr($content, 'pagesize="', '"');
						$pageSize = intval($pageSize);
						if(empty($pageSize)){
							$pageSize = 20;
						}
						//总页面
						$totalPage = ceil($totalCount/$pageSize);
						if($totalPage>0){
							for($i=1;$i<=$totalPage;$i++){
								$this->assign("page", $i);
								if($i!=1){
									$filename = $listnamerule."/index_$i.html";
								}
								$content = $this->fetch($tplname);
								$file = new File;
								$filename = dirname(APP_SYS_PATH).$filename;
								$file->write($filename, $content);
								if($isShow && $i==1){
									echo $content;
								}	
							}
						}else{
							//仅生成一个index.html即可
							$content = $this->fetch($tplname);
							$file = new File;
							$filename = dirname(APP_SYS_PATH).$filename;
							$file->write($filename, $content);
							if($isShow){
								echo $content;
							}
						}
					}else{
						//如果是封面页或者单页，仅生成一个index.html即可
						$content = $this->fetch($tplname);
						$file = new File;
						$filename = dirname(APP_SYS_PATH).$filename;
						$file->write($filename, $content);
						if($isShow){
							echo $content;
						}
					}
				}else{
					$this->display($tplname);
				}
				
			}
		}
	}
	
	/**
	 * 手机版本
	 * 
	 * $agent = $_SERVER['HTTP_USER_AGENT'];
			if(strpos($agent,"NetFront") || strpos($agent,"iPhone") || strpos($agent,"MIDP-2.0") || strpos($agent,"Opera Mini") || strpos($agent,"UCWEB") || strpos($agent,"Android") || strpos($agent,"Windows CE") || strpos($agent,"SymbianOS")){
				header("Location:".getBaseURL()."/index.php?a=m");
				exit;
			}
	public function m(){
		$t = getInteger("t");
		$this->assign("t", $t);
		$this->display("mobile_index.html");
	}

	public function n(){
		$id = getInteger("id");
		if($id>0){
			$db = M("archives");
			$arc = $db->find("id=".$id);
			$this->assign("myfcms", $arc);
			$this->display("mobile_archive.html");
		}else{
			echo "您找的资源不存在！";
		}
	}
	
	public function p(){
		$p = getInteger("p");
		if($p<1){
			$p=1;
		}
		$typeid = 4;
		$pageCount = 10;
		$db = M("archives");
		$start = ($p-1)*$pageCount;
		$arcs = $db->field("id,title,sendtime,litpic,description")->where("typeid=".$typeid)->limit($start.",".$pageCount)->findAll();
		echo json_encode($arcs);
	}
	 **/
	
	//页面静态化
	public function html(){
		set_time_limit(0);
		//生成类型
		$type = getSaveString("type");
		//验证码
		$randcode = getSaveString("randcode");
		//开始时间
		$starttime = getMillisecond();
		$user = session("user");
		if(session("randcode")==$randcode || !empty($user)){
			//生成栏目html页面
			if($type=="category"){
				$typeid = getInteger("typeid");
				$uname = getInteger("uname");
					
				if(!empty($typeid)){
					$arctypes=array();
					$category = new Category;
					if($uname==1){
						$arctypes = $category->getChildArctypes($typeid);
					}
					$arctypes[] = $category->getArctypeById($typeid);
				}else{
					$arctypes = File::readCache("arctypes_cache");
				}
				
				foreach ($arctypes as $key => $value) {
					$this->arctype($value["id"],false);
					echo $value["id"]."-->".$value["typename"]."-->生成完毕<br/>";
				}
				echo "所有栏目(".count($arctypes)."个栏目)生成完毕！";
			}else if($type=="archive"){//生成文章
				//栏目
				$typeid = getInteger("typeid");
				//起始编号
				$start = getInteger("start");
				//结束编号
				$end = getInteger("end");
				//条件
				$where = "1=1";
				if(!empty($typeid)){
					$where.=" and typeid=".$typeid;
				}
				if($start>0){
					$where.= " and id>=".$start;
				}
				if($end>0){
					$where.=" and id<=".$end;
				}
				
				$db = M("archives");
				$arcs = $db->field("id,title,jump")->where($where)->findAll();
				$i=count($arcs);
				foreach ($arcs as $key => $value) {
					if(empty($value["jump"])){
						$arctype = $this->archive($value["id"],false);
						echo  $value["id"]."--><a target='_blank' href='".getBaseURL().$arctype["arcnamerule"]."/".getArcName($value["id"]).".html'>".$value["title"]."</a>--->生成完毕-->还剩".--$i."篇文章<br/>";
					}
				}
				//更新html标志位
				$data = array("ishtml"=>1);
				$db->where($where)->update($data);
				echo "所有文章(".count($arcs)."篇)生成完成！";
			}else if($type=="index"){//生成首页
				$this->index(false);
				echo "<a href='".getBaseURL()."/' target='_blank'>首页</a>生成完毕！";
			}
			//结束时间
			$endtime = getMillisecond();
			echo "耗时-->".(($endtime-$starttime)/1000)."秒";
		}else{
			echo "验证码失效！";
		}
	}
	
	/**
	 * 获取当前位置
	 */
	private function getPosition($topid){
		$category = new Category;
		$arctypes = $category->getTopArctypes($topid);
		$pos = '<a href="'.getBaseName().'/">首页</a><span class="split"> » </span>';
		if($arctypes){
			$arctypes = array_reverse($arctypes);
			$urltype = C("URLTYPE");
			foreach ($arctypes as $key => $value) {
				//html静态化
				if($urltype=="html"){
					$listnamerule = $value["listnamerule"];
					//单页
					if($value["typepro"]==3){
						$pos.='<a href="'.getBaseName().$listnamerule.'/'.$value["typedir"].'.html">'.$value["typename"].'</a><span class="split"> » </span>';
					}else if($value["typepro"]==2){
						if(is_numeric($value["typedir"])){//外链
							$id = $value["typedir"];
							$arctypes_cache = File::readCache("arctypes_cache");
							foreach ($arctypes_cache as $k => $v) {
								if($v["id"]==$id){
									if($v["typepro"]==3){
										$pos.='<a href="'.getBaseName().$listnamerule.'/'.$v["typedir"].'.html">'.$value["typename"].'</a><span class="split"> » </span>';
									}else{
										$pos.='<a href="'.getBaseName().$listnamerule.'/">'.$value["typename"].'</a><span class="split"> » </span>';
									}
									break;
								}
							}
						}else{//内链
							$pos.='<a href="'.$value["typedir"].'">'.$value["typename"].'</a><span class="split"> » </span>';
						}
					}else{//最终列表页或频道封面
						$pos.='<a href="'.getBaseName().$listnamerule.'/">'.$value["typename"].'</a><span class="split"> » </span>';
					}
				}else{//动态页面
					$pos.='<a href="'.getBaseName().'?a=arctype&id='.$value["id"].'">'.$value["typename"].'</a><span class="split"> » </span>';
				}
			}
			$this->assign("topchannel", $arctypes[0]);
		}
		return $pos;
	}
}

?>