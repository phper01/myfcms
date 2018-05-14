<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:46:36
         compiled from "E:\wamp\www\myfcms\admin\tpl\moban\main.html" */ ?>
<?php /*%%SmartyHeaderCode:2487410195af8f88c808998-64024470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98af79f2dc26f8b0fefcc63ae2fb9a199f0d070c' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\moban\\main.html',
      1 => 1376859042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2487410195af8f88c808998-64024470',
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
  'unifunc' => 'content_5af8f88c849230_55921716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f88c849230_55921716')) {function content_5af8f88c849230_55921716($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>模板管理-闵益飞内容管理</title>
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
					if(confirm("确定要删除选中的链接吗？")){
						$("#flinkForm").attr("action","<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=delete");
						$("#flinkForm").submit();
					}
				})
				
				$("#submit-sort-btn").click(function(){
					$("#flinkForm").attr("action","<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=sort_rank");
					$("#flinkForm").submit();
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
					<h3>模板管理</h3>
				</div>
				<div class="tabledv">
					<form id="flinkForm" action="" method="post">
					<table>
						<tbody>
							<tr>
								<th class="tacenter" width="150">文件名</th>
								<th class="tacenter" width="150">文件描述</th>
								<th class="tacenter" width="120">修改时间</th>
								<th class="tacenter" width="100">操作</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="taleft">
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['pix']=='face'){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/face.png" />
								<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['pix']=='list'){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/list.png" />
								<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['pix']=='single'){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/page.png" />
								<?php }else{ ?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/htm.gif" />
								<?php }?>
								 <?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
.html
							</td>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>

							</td>
							<td>
								<?php echo $_smarty_tpl->tpl_vars['vo']->value['updatetime'];?>

							</td>
							<td>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=update&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/gtk-edit.png" title="编辑" alt="编辑" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['default']!='true'){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=delete_handler&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
"  onclick="return(confirm('确定删除?删除后网站有可能不能正常显示'))"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/del.png" title="删除" alt="删除" border="0" width="16" height="16"></a>
								<?php }?>
							</td>
						</tr>
						<?php } ?>
						<tr class="alt">
							<td colspan="4" class="taright">
							[温馨提示：请谨慎修改、删除模板，此操作不可恢复!]
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