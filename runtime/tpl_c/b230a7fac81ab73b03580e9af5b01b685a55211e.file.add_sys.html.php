<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:51:43
         compiled from "E:\wamp\www\myfcms\admin\tpl\sys\add_sys.html" */ ?>
<?php /*%%SmartyHeaderCode:20757767445af8f9bfdd54d3-79457835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b230a7fac81ab73b03580e9af5b01b685a55211e' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\sys\\add_sys.html',
      1 => 1355271833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20757767445af8f9bfdd54d3-79457835',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f9bfe00698_89181325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9bfe00698_89181325')) {function content_5af8f9bfe00698_89181325($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>添加基本参数-闵益飞内容管理系统</title>
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/reset.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/myfcms.css" />
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				//提交
				$("#submit-btn").click(function(){
					var name = $("#txtName").val();
					var isOk = true;
					if(name==""){
						$("#infoName").addClass("tred");
						isOk = false;
					}else{
						$("#infoName").removeClass("tred");
					}
					var value = $("#txtValue").val();
					if(value==0){
						$("#infoValue").addClass("tred");
						isOk = false;
					}else{
						$("#infoValue").removeClass("tred");
					}
					var info = $("#txtInfo").val();
					if(info!=""){
						$("#infoLabel").addClass("tred");
					}else{
						$("#infoLable").removeClass("tred");
					}
					if(isOk){
						$("#flinkForm").submit();
					}
				})
				
			})
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>添加基本参数</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="flinkForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=add_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>变量名：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtName" name="name" type="text" size="15" value="user_cfg_">
										<span class="tinfo" id="infoName">建议以"user_cfg_"开头</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>变量值：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtValue" name="value" type="text" size="15" value="">
										<span class="tinfo" id="infoValue">如：闵益飞内容管理系统</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>变量说明：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtInfo" name="info" type="text" size="15" value="">
										<span class="tinfo" id="infoLabel">如：网站名称</span>
									</td>
								</tr>
								<tr>
									<td class="taright">变量类型：</td>
									<td class="taleft">
										<input type="radio" name="valuetype" value="string" checked="checked">文本
						            	<input type="radio" name="valuetype" value="text">多行文本
									</td>
								</tr>
							</tbody>
						</table>
						
						<table>
							<tr class="alt">
								<td>
									<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white"><span>确认保存</span></a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html>
<?php }} ?>