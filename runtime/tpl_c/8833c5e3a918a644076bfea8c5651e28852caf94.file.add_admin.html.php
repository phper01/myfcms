<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:51:46
         compiled from "E:\wamp\www\myfcms\admin\tpl\sys\add_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:16314906875af8f9c2bc2073-65952285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8833c5e3a918a644076bfea8c5651e28852caf94' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\sys\\add_admin.html',
      1 => 1370438147,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16314906875af8f9c2bc2073-65952285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'code' => 0,
    'arctypes' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f9c2bf65c8_41136014',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f9c2bf65c8_41136014')) {function content_5af8f9c2bf65c8_41136014($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>添加普通管理员-闵益飞内容管理系统</title>
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
				//提交
				$("#submit-btn").click(function(){
					var isOk = true;
					var userid = $.trim($("#txtUserId").val());
					if(userid == ""){
						$("#infoUserId").addClass("tred");
						isOk = false;
					}else{
						$("#infoUserId").removeClass("tred");
					}
					var uname = $.trim($("#txtUname").val());
					if(uname == ""){
						$("#infoUname").addClass("tred");
						isOk = false;
					}else{
						$("#infoUname").removeClass("tred");
					}
					var pwd = $.trim($("#txtPwd").val());
					if(pwd == ""){
						$("#infoPwd").addClass("tred");
						isOk = false;
					}else{
						$("#infoPwd").removeClass("tred");
					}
					var email = $.trim($("#txtEmail").val());
					if(email == ""){
						$("#infoEmail").addClass("tred");
						isOk = false;
					}else{
						$("#infoEmail").removeClass("tred");
					}
					var code = $.trim($("#txtCode").val());
					if(code == ""){
						$("#infoCode").addClass("tred");
						isOk = false;
					}else{
						$("#infoCode").removeClass("tred");
					}
					if(isOk){
						$("#adminForm").submit();
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
					<h3>添加普通管理员</h3>
				</div>
				<div class="js_tcont tabledv">
					<form id="adminForm" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=add_admin_handler" method="post">
						<table id="tab0" class="tabindex">
							<tbody>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>用户名：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtUserId" name="userid" type="text" size="15" value="">
										<span class="tinfo" id="infoUserId">（只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符）</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>用户姓名：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtUname" name="uname" type="text" size="15" value="">
										<span class="tinfo" id="infoUname">填写普通管理员姓名</span>
									</td>
								</tr>
								<tr>
									<td class="taright" width="100"><span class="tred">*</span>登陆密码：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtPwd" name="pwd" type="text" size="15" value="">
										<span class="tinfo" id="infoPwd">（只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符）</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>电子邮箱：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtEmail" name="email" type="text" size="15" value="">
										<span class="tinfo" id="infoEmail">输入电子邮箱</span>
									</td>
								</tr>
								<tr>
									<td class="taright"><span class="tred">*</span>安全验证串：</td>
									<td class="taleft">
										<input class="left mr10 fm-text" style="margin-top: 0;width:250px;" id="txtCode" name="code" type="text" size="15" value="">
										<span class="tinfo tred" id="infoCode"><?php echo $_smarty_tpl->tpl_vars['code']->value;?>
</span>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="uitopb-header" style="border-top:1px solid #CCC">
							<h3>授权栏目</h3>
						</div>
						<table id="tab0" class="tabindex">
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arctypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?> 
								<tr>
									<td style="padding-left: 50px;">
										<label>
										<?php if ($_smarty_tpl->tpl_vars['vo']->value['spacer']==''){?>
										<input type="checkbox" name="arctype[]" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
" />
										<?php }?>
										&nbsp;
										<?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
(<?php echo $_smarty_tpl->tpl_vars['vo']->value['typedir'];?>
)
										</label>
									</td>
								</tr>
								<?php } ?> 
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