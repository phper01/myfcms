<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:51:50
         compiled from "E:\wamp\www\myfcms\admin\tpl\flink\main.html" */ ?>
<?php /*%%SmartyHeaderCode:4985380825af8f9c6234d55-60355119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bb4939c9978eebde826b1a16d36539eb8065635' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\flink\\main.html',
      1 => 1355536471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4985380825af8f9c6234d55-60355119',
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
  'unifunc' => 'content_5af8f9c6270c20_55174119',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9c6270c20_55174119')) {function content_5af8f9c6270c20_55174119($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>友情链接管理-闵益飞内容管理</title>
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
					<h3>友情链接管理</h3>
				</div>
				<div class="tabledv">
					<form id="flinkForm" action="" method="post">
					<table>
						<tbody>
							<tr>
								<th width="50">顺序</th>
        						<th class="tacenter" width="30"><input type="checkbox" id="chkAll"/></th>
								<th>网站名称</th>
								<th class="tacenter" width="120">网站logo</th>
								<th class="tacenter" width="120">更新时间</th>
								<th class="tacenter" width="100">操作</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td>
								<input class="left mr10 fm-text" style="margin-top: 0;width:30px;text-align: center"  onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')" name="sortrank_<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" id="txtSortrank<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" type="text"  value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sortrank'];?>
">
							</td>
							<td><input type="checkbox" id="chkId<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" class="chkid" name="id[]" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"></td>
							<td align="left"><?php echo $_smarty_tpl->tpl_vars['vo']->value['webname'];?>
</td>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['logo']){?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['vo']->value['logo'];?>
" id="imgLitpic" alt="缩略图预览" title="缩略图预览" style="height:30px;margin-right:10px;border:1px solid #ccc;padding:1px;" />
								<?php }else{ ?>
								无图标
								<?php }?>
							</td>
							<td><div style="width:66px;height:15px;overflow:hidden" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sendtime'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['dtime'];?>
</div></td>
							<td>
								<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['url'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/part-list.gif" title="预览" alt="预览" border="0" width="16" height="16"></a>&nbsp;
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=update&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/gtk-edit.png" title="编辑" alt="编辑" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=delete&id[]=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"  onclick="return(confirm('确定删除?请确保要删除该链接吗'))"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/del.png" title="删除" alt="删除" border="0" width="16" height="16"></a>
							</td>
						</tr>
						<?php } ?>
						<tr class="alt">
							<td colspan="8">
							<a id="submit-sort-btn" href="javascript:void(0)" class="left btn btn-white mr10"><span>更新排序</span></a>&nbsp;
							<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white mr10"><span>批量删除</span></a>&nbsp;
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