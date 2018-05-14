<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:49:08
         compiled from "E:\wamp\www\myfcms\admin\tpl\moban\add.html" */ ?>
<?php /*%%SmartyHeaderCode:15961362325af8f9249204a2-37176245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a6f442194fd9d1014948ae200d40a36da1cf5a5' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\moban\\add.html',
      1 => 1376858317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15961362325af8f9249204a2-37176245',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f9249454a6_25490359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9249454a6_25490359')) {function content_5af8f9249454a6_25490359($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>新建模板-闵益飞内容管理系统</title>
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
					var isOk = true;
					var filename = $.trim($("#txtFilename").val());
					if(filename == ""){
						$("#infoFilename").addClass("tred");
						isOk = false;
					}else{
						$("#infoFilename").removeClass("tred");
					}
										
					if(isOk){
						$("#mobanForm").submit();
					}
				})
				
			})
			
			function setMoban($name){
				$("#txtFilename").val($name);
			}
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>新建模板</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="mobanForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=add_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>文件名：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtFilename" name="filename" type="text" size="15" value="">.html
										<span class="tinfo" id="infoFilename">（请输入文件名）</span>
									</td>
								</tr>
								<tr>
									<td class="taleft" colspan="2" style="padding-left:55px">
										<span class="tred">*</span>文件命名规则：文件名必须是字母、数字或下划线
										<ol>
											<li>
												创建【<a href="javascript:setMoban('face_')">封面模板</a>】必须以【<a href="javascript:setMoban('face_')">face_</a>】开头
											</li>
											<li>
												创建【<a href="javascript:setMoban('list_')">列表模板</a>】必须以【<a href="javascript:setMoban('list_')">list_</a>】开头
											</li>
											<li>
												创建【<a href="javascript:setMoban('archive_')">内容页模板</a>】必须以【<a href="javascript:setMoban('archive_')">archive_</a>】开头
											</li>
											<li>
												创建【<a href="javascript:setMoban('single_')">单页页模板</a>】必须以【<a href="javascript:setMoban('single_')">single_</a>】开头
											</li>
											<li>
												【<a href="javascript:setMoban('')">其他模板</a>】，前缀不限制
											</li>
										</ol>
									</td>
								</tr>
								<!--
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>文件描述：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtName" name="name" type="text" size="15" value="">
										<span class="tinfo" id="infoName">输入文件描述，如：列表首页模板</span>
									</td>
								</tr>-->
								<tr>
									<td colspan="2">
										<textarea style="width:99%" rows="30" class="left fm-text" name="fileContent" id="fileContent"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tr  class="alt">
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