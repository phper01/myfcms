<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:51:44
         compiled from "E:\wamp\www\myfcms\admin\tpl\sys\admin.html" */ ?>
<?php /*%%SmartyHeaderCode:16534910365af8f9c09dab31-88068760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb98247c9ffc96202681961dc697dff731de3f05' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\sys\\admin.html',
      1 => 1355536978,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16534910365af8f9c09dab31-88068760',
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
  'unifunc' => 'content_5af8f9c0a13d90_48006045',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9c0a13d90_48006045')) {function content_5af8f9c0a13d90_48006045($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>管理员管理-闵益飞内容管理</title>
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
					<h3>管理员管理</h3>
				</div>
				<div class="tabledv">
					<form id="sysForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=admin" method="post">
					<table>
						<tbody>
							<tr>
								<th width="120">登陆名</th>
								<th width="100">笔名</th>
								<th class="tacenter" width="160">邮箱</th>
								<th class="tacenter" width="130">最后登陆时间</th>
								<th class="tacenter" width="120">最后登陆IP</th>
								<th class="tacenter" width="130">创建时间</th>
								<th class="tacenter" width="120">操作</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['userid'];?>

							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['uname'];?>

							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['email'];?>

							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['logintime'];?>

							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['loginip'];?>

							</td>
							<td class="tacenter">
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['createtime'];?>

							</td>
							<td>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=update_admin&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/gtk-edit.png" title="编辑" alt="编辑" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['id']!=1){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=delete_admin&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/del.png" title="删除" alt="删除" border="0" width="16" height="16"></a>
								<?php }?>
							</td>
						</tr>
						<?php } ?>
						<tr class="alt">
							<td colspan="8" class="taright">
								[温馨提示：请谨慎操作添加删除管理员！]
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