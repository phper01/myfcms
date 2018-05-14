<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 11:04:24
         compiled from "E:\wamp\www\myfcms\admin\tpl\moban\export.html" */ ?>
<?php /*%%SmartyHeaderCode:1826832375af8fcb87454f0-79057039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69daff511cdb7408df71231b3771be71eeebba34' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\moban\\export.html',
      1 => 1358779065,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1826832375af8fcb87454f0-79057039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'mb' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8fcb877b1e8_37269783',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8fcb877b1e8_37269783')) {function content_5af8fcb877b1e8_37269783($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>导出主题-闵益飞内容管理系统</title>
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
			$(document).ready(function(){
				//提交
				$("#submit-btn").click(function(){
					var isOk = true;
					
					var theme = $.trim($("#txtTheme").val());
					if(theme==""){
						$("#infoTheme").addClass("tred");
						isOk=false;
					}else{
						$("#infoTheme").removeClass("tred");
					}
					
					var author = $.trim($("#txtAuthor").val());
					if(author==""){
						$("#infoAuthor").addClass("tred");
						isOk=false;
					}else{
						$("#infoAuthor").removeClass("tred");
					}
					
					var web = $.trim($("#txtWeb").val());
					if(web==""){
						$("#infoWeb").addClass("tred");
						isOk=false;
					}else{
						$("#infoWeb").removeClass("tred");
					}
					
					var version = $.trim($("#txtVersion").val());
					if(version==""){
						$("#infoVersion").addClass("tred");
						isOk=false;
					}else{
						$("#infoVersion").removeClass("tred");
					}
					
					var color = $.trim($("#txtColor").val());
					if(color==""){
						$("#infoColor").addClass("tred");
						isOk=false;
					}else{
						$("#infoColor").removeClass("tred");
					}
					
					var pic = $.trim($("#txtLitpic").val());
					if(pic==""){
						$("#infoPic").addClass("tred");
						isOk=false;
					}else{
						$("#infoPic").removeClass("tred");
					} 
					
					var name = $.trim($("#txtName").val());
					if(name==""){
						$("#infoName").addClass("tred");
						isOk=false;
					}else{
						$("#infoName").removeClass("tred");
					} 
										
					if(isOk){
						$("#mobanForm").submit();
					}
				})
				
			})
			
			KindEditor.ready(function(K) {
				var editor = K.editor({
					allowFileManager : true
				});
				K('#add_attach').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#txtLitpic').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#txtLitpic').val(url);
								$("#imgLitpic").attr("src",url);
								editor.hideDialog();
							}
						});
					});
				});

			});
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>导出主题</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="mobanForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=export_handler2" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>主题英文名：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" readonly="readonly" style="margin-top: 0;width:350px;" id="txtTheme" name="theme" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['theme'];?>
">
										<span class="tinfo" id="infoTheme">只能输入英文和数字</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>主题名称：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtName" name="name" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['name'];?>
">
										<span class="tinfo" id="infoName">输入主题名称</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>作者：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtAuthor" name="author" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['author'];?>
">
										<span class="tinfo" id="infoAuthor">输入作者</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>网址：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtWeb" name="web" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['web'];?>
">
										<span class="tinfo" id="infoWeb">输入官方网址</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>版本：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtVersion" name="version" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['version'];?>
">
										<span class="tinfo" id="infoVersion">输入版本号</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>颜色：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtColor" name="color" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['color'];?>
">
										<span class="tinfo" id="infoColor">输入主题颜色风格</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>缩略图：</td>
									<td class="taleft">
										<table class="noborder">
											<tr>
												<td style="width:40px">
													<a id="add_attach" href="javascript:void(0)" class="btn-blue mr10">上传图片</a>
												</td>
												<td>
													<img src="<?php echo $_smarty_tpl->tpl_vars['mb']->value['logo'];?>
" id="imgLitpic" alt="缩略图" title="缩略图" style="height:50px;margin-right:10px;border:1px solid #ccc;padding:1px;" />
													<input type="hidden" name="litpic" id="txtLitpic" value="<?php echo $_smarty_tpl->tpl_vars['mb']->value['logo'];?>
" />
												</td>
												<td>
													<span id="infoPic">缩略图仅支持jpg且大小不能超过1M，300*250像素</span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>描述：</td>
									<td class="taleft">
										<textarea style="width:350px" rows="5" class="left fm-text" name="description" id="faq_content"><?php echo $_smarty_tpl->tpl_vars['mb']->value['description'];?>
</textarea>
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