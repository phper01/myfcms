<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:40:39
         compiled from "E:\wamp\www\myfcms\admin\tpl\arctype\add.html" */ ?>
<?php /*%%SmartyHeaderCode:17567621315af8f7272d3bc6-50089630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08b4dd931b0e012b2fd5d9f31efe3246e150fc9e' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\arctype\\add.html',
      1 => 1371957061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17567621315af8f7272d3bc6-50089630',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'topid' => 0,
    'arctypes' => 0,
    'vo' => 0,
    'dir_category' => 0,
    'dir_archives' => 0,
    'facemoban' => 0,
    'listmoban' => 0,
    'archivemoabn' => 0,
    'singlemoban' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f72731cde4_45443245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f72731cde4_45443245')) {function content_5af8f72731cde4_45443245($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>添加栏目-闵益飞内容管理系统</title>
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
					var typename = $("#txtTypeName").val();
					var isOk = true;
					if(typename==""){
						$("#infoTypeName").addClass("tred");
						isOk = false;
					}else{
						$("#infoTypeName").removeClass("tred");
					}
					var typedir = $("#txtTypeDir").val();
					if(typename==""){
						$("#infoTypeDir").addClass("tred");
						isOk = false;
					}else{
						$("#infoTypeDir").removeClass("tred");
					}
					if(isOk){
						$("#content").val(editor.html());
						$("#arctypeForm").submit();
					}else{
						tab(0);
					}
				})
			})
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					newlineTag:"p"
				});
				
				K("#add_attach").click(function(){
					var id ="Litpic";
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
					<h3>添加栏目</h3>
				</div>
				<div class="tabs">
					<div class="right mt10 mr10 tgrey">&nbsp;</div>
					<ul id="ul_tabs">
						<li>
							<a id="atab0" href="javascript:tab(0)" class="current">基本选项</a>
						</li>
						<li>
							<a id="atab1" href="javascript:tab(1)">模板设置</a>
						</li>
						<li>
							<a id="atab2" href="javascript:tab(2)">栏目内容</a>
						</li>
					</ul>
				</div>
				<div class="js_tcont tabledv">
					<form id="arctypeForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=add_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>栏目名称：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:150px;" id="txtTypeName" name="typename" type="text" size="15" value="">
										<span class="tinfo" id="infoTypeName">输入栏目名称</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>上级栏目：</td>
									<td class="taleft">
										<select name="topid" id="parentid" style="width:160px;">
											<option value="0" <?php if ($_smarty_tpl->tpl_vars['topid']->value==0){?>selected="selected"<?php }?>>≡ 作为顶级栏目 ≡</option>
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
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>显示顺序：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:50px;" name="sortrank" type="text" value="50">
										<span class="tinfo">从小到大显示</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>英文目录：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;"  id="txtTypeDir" name="typedir" type="text" size="15" value="">
										<span class="tinfo" id="infoTypeDir">输入英文目录，推荐使用栏目拼音或英文单词</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>目录相对位置：</td>
									<td class="taleft">
										<label><input type="radio" name="dirpos" value="0" checked="checked" />默认目录</label>
										<label><input type="radio" name="dirpos" value="1" />CMS根目录</label>
										<span class="tinfo" id="infoDirpos">【栏目默认目录为{cmspath}/<?php echo $_smarty_tpl->tpl_vars['dir_category']->value;?>
，文章默认目录为{cmspath}/<?php echo $_smarty_tpl->tpl_vars['dir_archives']->value;?>
】</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>是否隐藏栏目：</td>
									<td class="taleft">
										<label><input type="radio" name="isshow" value="1" checked="checked" />显示</label>
										<label><input type="radio" name="isshow" value="0" />隐藏</label>
										<span class="tinfo" id="infoIsShow">【调用channel标签时起作用】</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>栏目属性：</td>
									<td class="taleft">
										<label><input type="radio" name="typepro" class="typepro" value="0" checked="checked">最终列表栏目（允许在本栏目发布文档，并生成文档列表）</label><br>
						            	<label><input type="radio" name="typepro" class="typepro" value="1">封面栏目（栏目本身不允许发布文档）</label><br/>						            	
						            	<label><input type="radio" name="typepro" class="typepro" value="3">单页栏目（栏目是最终的内容页面）</label><br/>
						            	<label><input type="radio" name="typepro" class="typepro" value="2">跳转连接（填写在"英文目录"处，1、外部链接：填写网址；2、内部链接：填写栏目编号）</label><br/>
									</td>
								</tr>
							</tbody>
						</table>
						<table id="tab1" style="display:none" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100">封面模板：</td>
									<td class="taleft">
										<select name="indexpath" style="width:160px;">
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facemoban']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
" <?php if ($_smarty_tpl->tpl_vars['vo']->value['name']=='default.html'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="taright">列表模板：</td>
									<td class="taleft">
										<select name="listpath" style="width:160px;">
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['listmoban']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
" <?php if ($_smarty_tpl->tpl_vars['vo']->value['name']=='default.html'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
</option>
											<?php } ?>
										</select>
										<span class="tinfo">&nbsp;</span>
									</td>
								</tr>
								<tr>
									<td class="taright">文章模板：</td>
									<td class="taleft">
										<select name="archivepath" style="width:160px;">
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['archivemoabn']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
" <?php if ($_smarty_tpl->tpl_vars['vo']->value['name']=='default.html'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
</option>
											<?php } ?>
										</select>
										<span class="tinfo">&nbsp;</span>
									</td>
								</tr>
								<tr>
									<td class="taright">单页模板：</td>
									<td class="taleft">
										<select name="singlepath" style="width:160px;">
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['singlemoban']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
" <?php if ($_smarty_tpl->tpl_vars['vo']->value['name']=='default.html'){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
</option>
											<?php } ?>
										</select>
										<span class="tinfo">&nbsp;</span>
									</td>
								</tr>
							</tbody>
						</table>
						<table id="tab2" style="display:none" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100">栏目SEO标题：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="seotitle" type="text" value="">
										<span class="tinfo">输入栏目SEO标题</span>
									</td>
								</tr>
								<tr>
									<td class="taright">栏目关键字：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:200px;" name="keywords" type="text" value="">
										<span class="tinfo">多个关键字用逗号隔开</span>
									</td>
								</tr>
								<tr>
									<td class="taright">栏目描述：</td>
									<td class="taleft">
										<textarea style="width:200px" rows="5" class="left fm-text" name="description" id="faq_content"></textarea>
									</td>
								</tr>
								<tr>
									<td class="taright">缩略图：</td>
									<td class="taleft">
										<a id="add_attach" href="javascript:void(0)" class="btn-blue mr10">上传图片</a>
										<img src="" id="imgLitpic" alt="缩略图1预览" title="缩略图1预览" style="display:none;height:50px;margin-right:10px;border:1px solid #ccc;padding:1px;" />
										<input type="hidden" name="litpic" id="txtLitpic" />
										<span class="tinfo">缩略图仅支持jpg、gif和png格式，且大小不能超过1M</span>
									</td>
								</tr>
								<tr>
									<td class="taleft" colspan="2">
										<textarea name="content" id="content" style="width:100%;height:300px;"></textarea>
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