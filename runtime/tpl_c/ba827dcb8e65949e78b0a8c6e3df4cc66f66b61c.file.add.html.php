<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:50:18
         compiled from "E:\wamp\www\myfcms\admin\tpl\archives\add.html" */ ?>
<?php /*%%SmartyHeaderCode:11223884105af8f96ac56f28-87396006%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba827dcb8e65949e78b0a8c6e3df4cc66f66b61c' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\archives\\add.html',
      1 => 1374407304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11223884105af8f96ac56f28-87396006',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'topid' => 0,
    'arctypes' => 0,
    'vo' => 0,
    'now' => 0,
    'click' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f96ac95b44_32947079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f96ac95b44_32947079')) {function content_5af8f96ac95b44_32947079($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>录入内容-闵益飞内容管理系统</title>
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
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
					var title = $("#txtTitle").val();
					var isOk = true;
					if(title==""){
						$("#infoTitle").addClass("tred");
						isOk = false;
					}else{
						$("#infoTitle").removeClass("tred");
					}
					var typeid = $("#selTypeid").val();
					if(typeid==0){
						$("#infoTypeid").addClass("tred");
						isOk = false;
					}else{
						$("#infoTypeid").removeClass("tred");
					}
					if(isOk){
						$("#content").val(editor.html());
						$("#archiveForm").submit();
					}else{
						tab(0);
					}
				})
				
				$("#txtTag").blur(function(){
					$("#txtKeywords").val($("#txtTag").val());
				})
				
				$("#flagsj").click(function(){
					if($(this).attr("checked")=="checked"){
						$("#trJump").show();
					}else{
						$("#txtJump").val("");
						$("#trJump").hide();
					}
				})
			})
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					uploadJson : '<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/php/upload_json.php',
					fileManagerJson : '<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/editor/php/file_manager_json.php',
					newlineTag:"p"
				});
				K("#add_attach").click(function(){
					var id =$('input[name="pic"]:checked').val();
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							imageUrl : K('#txt'+id).val(),
							clickFn : function(url, title, width, height, border, align) {
								$("#img"+id).attr("src",url).show();   
			 					$("#txt"+id).val(url);
								editor.hideDialog();
							}
						});
					});
				})
			});
			
			function tab(index){
				if(index!=0){
					$("#file").hide();
				}else{
					$("#file").show();
				}
				$("#ul_tabs a").removeClass("current");
				$(".tabindex").hide();
				$("#tab"+index).show();
				$("#atab"+index).addClass("current");
			}
			
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>录入新文章</h3>
				</div>
				<div class="tabs">
					<div class="right mt10 mr10 tgrey">&nbsp;</div>
					<ul id="ul_tabs">
						<li>
							<a id="atab0" href="javascript:tab(0)" class="current">基本选项</a>
						</li>
						<li>
							<a id="atab1" href="javascript:tab(1)">辅助选项</a>
						</li>
					</ul>
				</div>
				<div class="js_tcont tabledv">
					<form id="archiveForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=add_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>文章标题：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtTitle" name="title" type="text" size="15" value="">
										<span class="tinfo" id="infoTitle">输入文章标题，最多255字符</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100">自定义属性：</td>
									<td class="taleft">
					            	<label><input class="np" type="checkbox" name="istop" value="1">置顶</label>
									<label><input class="np" type="checkbox" name="flags[]" id="flagsh" value="h">头条[h]</label>
					            	<label><input class="np" type="checkbox" name="flags[]" id="flagsc" value="c">推荐[c]</label>
					            	<label><input class="np" type="checkbox" name="flags[]" id="flagsf" value="f">幻灯[f]</label>
					            	<label><input class="np" type="checkbox" name="flags[]" id="flagsa" value="a">特荐[a]</label>
					            	<label><input class="np" type="checkbox" name="flags[]" id="flagsp" value="p">图片[p]</label>
					            	<label><input class="np" type="checkbox" name="flags[]" id="flagsj" value="j">跳转[j]</label>
									</td>
								</tr>
								<tr id="trJump" style="display: none">
									<td class="taright" width="100"><span class="tred">*</span>跳转网址：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:350px;" id="txtJump" name="jump" type="text" value="">
										<span class="tinfo" id="infoJump">输入跳转网址，以http开头</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>文章栏目：</td>
									<td class="taleft">
										<select name="typeid" id="selTypeid" style="width:260px;">
											<option value="0" <?php if ($_smarty_tpl->tpl_vars['topid']->value==0){?>selected="selected"<?php }?>>≡ 选择栏目 ≡</option>
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['topid']->value==$_smarty_tpl->tpl_vars['vo']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</option>
											<?php } ?>
										</select>
										<span class="tinfo" id="infoTypeid">选择文章所属栏目</span>
									</td>
								</tr>
								<tr>
									<td class="taright">文章缩略图：</td>
									<td class="taleft" height="51">
										<table class="noborder">
											<tr>
												<td style="width:40px">
													<a id="add_attach" href="javascript:void(0)" class="btn-blue mr10">上传图片</a>
												</td>
												<td>
													<label><input type="radio" name="pic" value="Litpic" checked="checked" />缩略图1</label>
													<img src="" id="imgLitpic" alt="缩略图1预览" title="缩略图1预览" style="display:none;height:50px;margin-right:10px;border:1px solid #ccc;padding:1px;" />
													<input type="hidden" name="litpic" id="txtLitpic" />
												</td>
												<td>
													<label><input type="radio" name="pic" value="SmallPic" />缩略图2</label>
													<img src="" id="imgSmallPic" alt="缩略图2预览" title="缩略图2预览" style="display:none;height:50px;margin-right:10px;border:1px solid #ccc;padding:1px;" />
													<input type="hidden" name="smallpic" id="txtSmallPic" />
												</td>
												<td>
													<span class="tinfo">缩略图仅支持jpg、gif和png格式，且大小不能超过1M</span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="taright">TAG标签：</td>
									<td class="taleft">
										<table class="noborder">
											<tr>
												<td>
													<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="tag" id="txtTag" type="text" value="">
												</td>
												<td>
													关键字：
												</td>
												<td>
													<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="keywords" id="txtKeywords" type="text" value="">
												</td>
												<td>
													<span class="tinfo">多个TAG关键字用逗号隔开，最多255字符</span>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100">文章来源：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="source" type="text" value="">
									</td>
								</tr>
								<tr>
									<td class="taright">摘要：</td>
									<td class="taleft">
										<textarea style="width:350px" rows="5" class="left fm-text" name="description" id="faq_content"></textarea>
									</td>
								</tr>
								<tr>
									<td class="taleft" colspan="2">
										<textarea name="content" id="content" style="width:100%;height:500px;"></textarea>
									</td>
								</tr>
							</tbody>
						</table>
						<table id="tab1" style="display:none" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100">作者：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="writer" type="text" value="">
									</td>
								</tr>
								<tr>
									<td class="taright" width="100">发布时间：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="sendtime" type="text" value="<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
">
									</td>
								</tr>
								<tr>
									<td class="taright">浏览次数：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="click" type="text"  onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')"  value="<?php echo $_smarty_tpl->tpl_vars['click']->value;?>
">
										<span class="tinfo">&nbsp;</span>
									</td>
								</tr>
							</tbody>
						</table>
						<table>
							<tr class="alt">
								<td>
									<input type="checkbox" checked="checked" name="isgo" />继续添加 <a id="submit-btn" href="javascript:void(0)" class="left btn btn-white"><span>确认保存</span></a>
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