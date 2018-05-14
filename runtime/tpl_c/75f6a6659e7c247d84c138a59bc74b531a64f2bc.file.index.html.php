<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 09:58:04
         compiled from "E:\wamp\www\myfcms\admin\tpl\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1476014685af8ed2c8213a5-02066435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75f6a6659e7c247d84c138a59bc74b531a64f2bc' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\index\\index.html',
      1 => 1365845950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1476014685af8ed2c8213a5-02066435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'myf_url' => 0,
    'now' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8ed2c84db14_22498166',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8ed2c84db14_22498166')) {function content_5af8ed2c84db14_22498166($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>闵益飞内容管理系统-后台登陆</title>
		<meta name="description" content="" />
		<meta name="author" content="minyifei" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/reset.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/css/login.css"/>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			function changeAuthCode(){
				 var picsrc =$("#vdimgck").attr("src");
				 $("#vdimgck").attr("src",picsrc);
			}
			
			$(document).ready(function(){
				$("#btnSubmit").click(function(){
					var userid = $("#txtUserid").val();
					if(userid==""){
						alert("用户名不能为空！");
						return false;
					}
					
					var pwd = $("#txtPwd").val();
					if(pwd==""){
						alert("密码不能为空！");
						return false;
					}
					
					var code = $("#vdcode").val();
					if(code==""){
						alert("验证码不能为空！");
						return false;
					}
				})
			})
		</script>
	</head>
	
	<body>
		<div class="login-box">
			<div class="login-top">
				<a href="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
">返回网站主页</a>
			</div>
			<div class="login-tips" style="text-align: center">
				感谢使用MyfCMS系统，中国第一款完全免费开源的PHPCMS系统！
			</div>
			<div class="login-main">
					<form name="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=index&a=login_in">
					<dl>
						<dt>
							用户名：
						</dt>
						<dd>
							<input name="userid" id="txtUserid" type="text" style="width:155px;">
						</dd>
						<dt>
							密&nbsp;&nbsp;码：
						</dt>
						<dd>
							<input class="alltxt" id="txtPwd" name="pwd" type="password" style="width:155px;">
						</dd>
						<dt>
							验证码：
						</dt>
						<dd>
							<input id="vdcode" name="verify" maxlength="4" style="text-transform: uppercase;" type="text">
							<img id="vdimgck" onclick="changeAuthCode()" style="cursor: pointer;" alt="验证码" title="看不清？点击更换" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/verify.php" align="absmiddle">
						</dd>
						<dt>
							&nbsp;
						</dt>
						<dd>
							<button type="submit" class="login-btn" id="btnSubmit">
								登录
							</button>
						</dd>
					</dl>
				</form>
			</div>
			<div class="login-copy">
				Powered by<a href="http://www.minyifei.cn" title="MyfCMS官网" target="_blank"><strong>MyfCMS 2.0</strong></a>&copy; 2012-<?php echo $_smarty_tpl->tpl_vars['now']->value;?>

			</div>
		</div>
	</body>
</html><?php }} ?>