<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:40:37
         compiled from "E:\wamp\www\myfcms\admin\tpl\arctype\main.html" */ ?>
<?php /*%%SmartyHeaderCode:12205316825af8f72503cdc0-12637304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4d978fbabadf14bbbcb90d5224c709c91cd2cc4' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\arctype\\main.html',
      1 => 1356335102,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12205316825af8f72503cdc0-12637304',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'arctypes' => 0,
    'vo' => 0,
    'myf_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f725086bb4_55559734',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f725086bb4_55559734')) {function content_5af8f725086bb4_55559734($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>栏目管理-闵益飞内容管理系统</title>
		<meta name="description" content="" />
		<meta name="author" content="minyifei" />
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
					$("#sortForm").submit();
				})
			})
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>栏目管理</h3>
				</div>
				<div class="tabledv">
					<form id="sortForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=sort_rank" method="post">
						<table>
							<tbody>
								<tr>
									<th width="50">排序</th>
	        						<th class="tacenter" width="50">ID</th>
									<th>栏目名称</th>
									<th class="tacenter" width="120">栏目类型</th>
									<th class="tacenter" width="250">操作</th>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?> 
								<tr bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
									<td class="tacenter">
										<input class="left mr10 fm-text" style="margin-top: 0;width:30px;text-align: center"  onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" name="sortrank_<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" id="txtSortrank<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sortrank'];?>
">
									</td>
									<td class="tacenter">
										<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>

									</td>
									<td>
										<?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
(<?php echo $_smarty_tpl->tpl_vars['vo']->value['typedir'];?>
)
									</td>
									<td class="tacenter">
										<?php if ($_smarty_tpl->tpl_vars['vo']->value['typepro']==0){?>
										<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/list.png" />最终列表
										<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['typepro']==1){?>
										<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/face.png" />封面栏目
										<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['typepro']==2){?>
										<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/jump.png" />外部连接
										<?php }elseif($_smarty_tpl->tpl_vars['vo']->value['typepro']==3){?>
										<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/page.png" />单页栏目
										<?php }?>
									</td>
									<td class="tacenter">
										<a href="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
/index.php?a=arctype&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/part-list.gif" title="预览" alt="预览" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
										<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=add&topid=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/add.png" title="添加子栏目" alt="添加子栏目" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
										<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=update&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/gtk-edit.png" title="编辑" alt="编辑" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
										<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=delete_handler&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" onclick="return(confirm('确定删除?请确保要删除的栏目没有子栏目并且栏目下没有文章'))"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/del.png" title="删除" alt="删除" style="cursor:pointer" border="0" width="16" height="16"></a>
									</td>
								</tr>
								<?php } ?> 
								<tr class="alt">
									<td colspan="5">
										<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white"><span>更新排序</span></a>
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