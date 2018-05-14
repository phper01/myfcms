<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:46:43
         compiled from "E:\wamp\www\myfcms\admin\tpl\moban\mlist.html" */ ?>
<?php /*%%SmartyHeaderCode:5788425585af8f893019d55-92161765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92d6e572f690130807844d9e81353283d516d287' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\moban\\mlist.html',
      1 => 1358780004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5788425585af8f893019d55-92161765',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'list' => 0,
    'vo' => 0,
    'theme' => 0,
    'myf_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f893056621_18242254',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f893056621_18242254')) {function content_5af8f893056621_18242254($_smarty_tpl) {?><!DOCTYPE html>
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
			})
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>主题管理</h3>
				</div>
				<div class="tabledv">
					<form id="flinkForm" action="" method="post">
					<table>
						<tbody>
							<tr>
								<th class="tacenter" width="150">主题缩略图</th>
								<th class="tacenter" width="150">主题描述信息</th>
								<th class="tacenter" width="100">操作</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td  style="width:310px">
								<div class="theme-box">
								<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['web'];?>
" class="mlogo" target="_blank"><img style="width:300px;height:250px" src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['logo'];?>
" /></a>
								<?php if ($_smarty_tpl->tpl_vars['theme']->value==$_smarty_tpl->tpl_vars['vo']->value['theme']){?>
								<div class="theme-current">当前使用主题</div>
								<?php }?>
								</div>
							</td>
							<td align="left" valign="top"  class="minfo">
								<div class="minfo">
									<ul>
										<dt><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</dt>
										<dd>作者：<?php echo $_smarty_tpl->tpl_vars['vo']->value['author'];?>
</dd>
										<dd>网址：<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['web'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['web'];?>
</a></dd>
										<dd>版本：<?php echo $_smarty_tpl->tpl_vars['vo']->value['version'];?>
</dd>
										<dd>颜色：<?php echo $_smarty_tpl->tpl_vars['vo']->value['color'];?>
</dd>
										<dd>最后更新时间：<?php echo $_smarty_tpl->tpl_vars['vo']->value['updatetime'];?>
</dd>
										<dd class="info">
											<?php echo $_smarty_tpl->tpl_vars['vo']->value['description'];?>

										</dd>
									</ul>
								</div>
								
							</td>
							<td class="mcontrol">
								<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
/index.php?t=<?php echo $_smarty_tpl->tpl_vars['vo']->value['theme'];?>
">预览</a><br/>
								<?php if ($_smarty_tpl->tpl_vars['theme']->value!=$_smarty_tpl->tpl_vars['vo']->value['theme']){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=open&theme=<?php echo $_smarty_tpl->tpl_vars['vo']->value['theme'];?>
">启用</a><br/>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=delete_cheme&theme=<?php echo $_smarty_tpl->tpl_vars['vo']->value['theme'];?>
" onclick="return(confirm('确定卸载?卸载后该主题将被删除！'))">卸载</a><br/>
								<?php }else{ ?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=export&theme=<?php echo $_smarty_tpl->tpl_vars['vo']->value['theme'];?>
">配置</a><br/>
								<?php }?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=export_handler&theme=<?php echo $_smarty_tpl->tpl_vars['vo']->value['theme'];?>
" target="_blank">导出</a><br/>
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