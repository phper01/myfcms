<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 09:49:07
         compiled from "E:\wamp\www\myfcms\myf\msg.html" */ ?>
<?php /*%%SmartyHeaderCode:12034000875af8eb1339d1b6-81734332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c50b138cd92dcceb7f937ab7b053b256cfa8260a' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\myf\\msg.html',
      1 => 1356243999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12034000875af8eb1339d1b6-81734332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'time' => 0,
    'url' => 0,
    'state' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8eb135fcd15_86957670',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8eb135fcd15_86957670')) {function content_5af8eb135fcd15_86957670($_smarty_tpl) {?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
-页面提示-闵益飞内容管理系统</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv='Refresh' content='<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
;URL=<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
'>
		<style>
			html, body {
				margin: 0;
				padding: 0;
				border: 0 none;
				font: 14px Tahoma, Verdana;
				line-height: 150%;
				background: white
			}
			a {
				text-decoration: none;
				color: #174B73;
				border-bottom: 1px dashed gray
			}
			a:hover {
				color: #F60;
				border-bottom: 1px dashed gray
			}
			div.message {
				margin: 10% auto 0px auto;
				clear: both;
				padding: 5px;
				border: 1px solid silver;
				text-align: center;
				width: 45%;
				padding-bottom:20px;
			}
			span.wait {
				color: blue;
				font-weight: bold
			}
			span.error {
				color: red;
				font-weight: bold
			}
			span.success {
				color: blue;
				font-weight: bold
			}
			div.msg {
				margin: 20px 0px
			}
		</style>
	</head>
	<body>
		<div class="message">
			<div class="msg">
				<?php if ($_smarty_tpl->tpl_vars['state']->value=='error'){?>
				<span class="error"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span>
				<?php }else{ ?>
				<span class="success"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span>
				<?php }?>
			</div>
			<div class="tip">
				页面将在 <span class="wait" id="divWait"><?php echo $_smarty_tpl->tpl_vars['time']->value;?>
</span> 秒后自动跳转，如果不想等待请点击 <a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
">这里</a> 跳转
				<script type="text/javascript">
					window.setInterval(function(){
						var num = document.getElementById("divWait").innerHTML;
						if(num>0){
							document.getElementById("divWait").innerHTML = num-1;
						}
					},1000)
				</script>
			</div>
		</div>
	</body>
</html><?php }} ?>