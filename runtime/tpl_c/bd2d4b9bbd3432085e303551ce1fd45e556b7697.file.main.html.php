<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:51:37
         compiled from "E:\wamp\www\myfcms\admin\tpl\sys\main.html" */ ?>
<?php /*%%SmartyHeaderCode:19130885855af8f9b9d8b205-33447561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd2d4b9bbd3432085e303551ce1fd45e556b7697' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\sys\\main.html',
      1 => 1355236465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19130885855af8f9b9d8b205-33447561',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'list' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f9b9dc09b3_26252766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9b9dc09b3_26252766')) {function content_5af8f9b9dc09b3_26252766($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>系统基本参数-闵益飞内容管理</title>
		<meta name="description" content="" />
		<meta name="author" content="minyifei.cn" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/reset.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/myfcms.css" />
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#submit-btn").click(function(){
					$("#sysForm").submit();
				})
				
				$("#chkAll").click(function(){
					 var checked = $(this).attr("checked");
					 if(checked == "checked"){
						 $(".chkid").attr("checked",checked);
					 }else{
					 	$(".chkid").removeAttr("checked");
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
					<h3>系统基本参数</h3>
				</div>
				<div class="tabledv">
					<form id="sysForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=update_sys" method="post">
					<table>
						<tbody>
							<tr>
								<th width="200">参数说明</th>
								<th>参数值</th>
								<th class="tacenter" width="200">变量名称</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="taright">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['info'];?>
：
							</td>
							<td class="tacenter">
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['valuetype']=='text'){?>
								<textarea style="width:450px" rows="5" class="fm-text" name="cfg_<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" id="faq_content"><?php echo $_smarty_tpl->tpl_vars['vo']->value['value'];?>
</textarea>
								<?php }else{ ?>
								<input class="fm-text" style="margin-top: 0;width:450px;" name="cfg_<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" type="text" size="15" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['value'];?>
">
								<?php }?>
							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>

							</td>
						</tr>
						<?php } ?>
						<tr class="alt">
							<td colspan="8">
							<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white mr10"><span>确认保存</span></a>&nbsp;
							</td>
						</tr>
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html>
<?php }} ?>