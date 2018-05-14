<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:50:11
         compiled from "E:\wamp\www\myfcms\admin\tpl\html\main.html" */ ?>
<?php /*%%SmartyHeaderCode:12018176495af8f96396d001-11356133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e05b90611e36aded910332728f9cec40e84c2c3' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\html\\main.html',
      1 => 1356015811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12018176495af8f96396d001-11356133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'myf_url' => 0,
    'arctypes' => 0,
    'vo' => 0,
    'randcode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f9639a44a3_27177035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9639a44a3_27177035')) {function content_5af8f9639a44a3_27177035($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>生成栏目HTML静态页面-闵益飞内容管理系统</title>
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
				$("#submit-btn").click(function(){
					$("#htmlForm").submit();
				})
			})
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>生成栏目HTML静态页面</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="htmlForm" target="htmlframe" action="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
/index.php?m=index&a=html" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100">栏目：</td>
									<td class="taleft">
										<select name="typeid" id="parentid" style="width:160px;">
											<option value="0" selected="selected">≡ 更新所有栏目  ≡</option>
											<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
												<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</option>
											<?php } ?>
										</select>
										<input type="hidden" name="type" value="category" />
										<input type="hidden" name="randcode" value="<?php echo $_smarty_tpl->tpl_vars['randcode']->value;?>
" />
										<span class="tinfo" id="infoUrl"></span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100">更新项：</td>
									<td class="taleft">
										<input name="uname" type="radio" class="np" value="1" checked="1">
								     更新子级栏目  
								    <input type="radio" name="uname" class="np" value="0">
								     仅更新所选栏目
									</td>
								</tr>
							</tbody>
						</table>
						
						<table>
							<tr class="alt">
								<td>
									<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white"><span>开始生成HTML静态页面</span></a>
								</td>
							</tr>
						</table>
						<table>
							<tr class="alt">
								<td>
									页面生成进度：
								</td>
							</tr>
							<tr>
								<td height="200">
									<iframe id="htmlframe" name="htmlframe" style="width:100%;height:200px;border:0;"></iframe>
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