<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:49:06
         compiled from "E:\wamp\www\myfcms\admin\tpl\moban\install.html" */ ?>
<?php /*%%SmartyHeaderCode:2856198845af8f922361061-58661840%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ece6e2530096c6f4c7143fccaf0a256945ffab50' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\moban\\install.html',
      1 => 1358293334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2856198845af8f922361061-58661840',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f92238bcf9_54912789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f92238bcf9_54912789')) {function content_5af8f92238bcf9_54912789($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>导入主题-闵益飞内容管理系统</title>
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/themes/default/default.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/reset.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/myfcms.css" />
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/js/jquery-1.7.2.min.js"></script>
		<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/kindeditor-all-min.js"></script>
		<script charset="utf-8" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/lang/zh_CN.js"></script>
		<script type="text/javascript">
		
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/php/upload_json1.php?dir=file',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#txtTheme').val(url);
							$("#filepath").html(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});

		
			$(document).ready(function(){
				//提交
				$("#submit-btn").click(function(){
					var isOk = true;
					
					var uname = $.trim($("#txtTheme").val());
					if(uname == ""){
						alert("请先上传主题");
						isOk = false;
					}										
					if(isOk){
						$("#mobanForm").submit();
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
					<h3>导入主题</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="mobanForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=install_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>上传主题：</td>
									<td class="taleft">
										<input type="button" id="uploadButton" value="上传主题" />
										<input type="hidden" id="txtTheme" name="theme" />
										<span id="filepath"></span>
									</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tr  class="alt">
								<td>
									<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white"><span>开始导入</span></a>
								</td>
							</tr>
						</table>
						<table>
							<tr>
								<td>
									进度
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