<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:38:50
         compiled from "E:\wamp\www\myfcms\admin\tpl\archives\main.html" */ ?>
<?php /*%%SmartyHeaderCode:9881855835af8f6ba8ab982-19895991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bd9f7e8e849e65313bbfc3af28362c1ace1e122' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\archives\\main.html',
      1 => 1356783758,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9881855835af8f6ba8ab982-19895991',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'topid' => 0,
    'arctypes' => 0,
    'vo' => 0,
    'typeid' => 0,
    'list' => 0,
    'keyword' => 0,
    'myf_url' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f6ba8fc478_52137988',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f6ba8fc478_52137988')) {function content_5af8f6ba8fc478_52137988($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>文章管理-闵益飞内容管理</title>
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
					if(confirm("确定要删除选中的文章吗？")){
						$("#archiveForm").submit();
					}
				})
				
				$("#chkAll").click(function(){
					 var checked = $(this).attr("checked");
					 if(checked == "checked"){
						 $(".chkid").attr("checked",checked);
					 }else{
					 	$(".chkid").removeAttr("checked");
					 }
				})
				
				$("#search-btn").click(function(){
					$("#search").submit();
				})
			})
		</script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("../index/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div id="main" class="wapper clearfix">
			<div class="uitopb uitopb-border">
				<div class="uitopb-header">
					<h3>文章管理</h3>
				</div>
				<div class="uitopb-bottom pd10 clearfix">
					<form id="search" method="get" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php">
						<input type="hidden" name="m" value="archives" />
						<input type="hidden" name="a" value="main" />
						<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=add" class="left btn btn-white mr10"><span>录入新文章</span></a>&nbsp;
						<a id="submit-btn" href="javascript:void(0)" class="left btn btn-white mr10"><span>批量删除</span></a>&nbsp;
						<span class="right">
							<select  class="left"  name="typeid" id="selTypeid" style="width:130px;margin-right:10px">
								<option value="0" <?php if ($_smarty_tpl->tpl_vars['topid']->value==0){?>selected="selected"<?php }?>>≡ 选择栏目 ≡</option>
								<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"  <?php if ($_smarty_tpl->tpl_vars['typeid']->value==$_smarty_tpl->tpl_vars['vo']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</option>
								<?php } ?>
							</select>
							<input class="left mr10 fm-text" style="margin-top: 0;" placeholder="文章标题" name="keyword" type="text" size="15" value="">
							<a id="search-btn" href="javascript:void(0)" class="left btn btn-white"><span>搜索</span></a>
						</span>
					</form>
				</div>
				<div class="tabledv">
					<form id="archiveForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=delete" method="post">
					<table>
						<tbody>
							<tr>
								<th width="40">ID</th>
        						<th class="tacenter" width="30"><input type="checkbox" id="chkAll"/></th>
								<th>文章标题</th>
								<th class="tacenter" width="120">栏目</th>
								<th class="tacenter" width="120">发布时间</th>
								<th class="tacenter" width="50">静态</th>
								<th class="tacenter" width="50">点击</th>
								<th class="tacenter" width="100">操作</th>
							</tr>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>	
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
</td>
							<td><input type="checkbox" id="chkId<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" class="chkid" name="arcid[]" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"></td>
							<td align="left"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
&nbsp; <span class="tred"><?php echo $_smarty_tpl->tpl_vars['vo']->value['flagname'];?>
</span></td>
							<td><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=main&typeid=<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeid'];?>
&keyword=<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
" title="查看该栏目下的文章"><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</a></td>
							<td><div style="width:66px;height:15px;overflow:hidden" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['sendtime'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['sendtime'];?>
</div></td>
							<td>
								<?php if (($_smarty_tpl->tpl_vars['vo']->value['ishtml']==1)||($_smarty_tpl->tpl_vars['vo']->value['jump'])){?>
								<span class="tgreen">已生成</span>
								<?php }else{ ?>
								<span class="tred">未生成</span>
								<?php }?>
							</td>
							<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['click'];?>
</td>
							<td>
								<?php if ($_smarty_tpl->tpl_vars['vo']->value['jump']){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['jump'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/part-list.gif" title="预览" alt="预览" border="0" width="16" height="16"></a>&nbsp;
								<?php }else{ ?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
/index.php?a=archive&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/part-list.gif" title="预览" alt="预览" border="0" width="16" height="16"></a>&nbsp;
								<?php }?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=update&id=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
								<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/gtk-edit.png" title="编辑" alt="编辑" style="cursor:pointer" border="0" width="16" height="16"></a>&nbsp;
								<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=delete&arcid[]=<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"  onclick="return(confirm('确定删除?请确保要删除这篇文章吗'))"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/del.png" title="删除" alt="删除" border="0" width="16" height="16"></a>
							</td>
						</tr>
						<?php } ?>
						<tr class="alt">
							<td colspan="8">
								<div class="pager">
									<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

								</div>
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