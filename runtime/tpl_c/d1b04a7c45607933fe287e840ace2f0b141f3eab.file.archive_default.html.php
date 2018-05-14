<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:57:12
         compiled from "E:\wamp\www\myfcms\tpl\blue\index\archive_default.html" */ ?>
<?php /*%%SmartyHeaderCode:10994739915af8fb08a76314-60741062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1b04a7c45607933fe287e840ace2f0b141f3eab' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\blue\\index\\archive_default.html',
      1 => 1526266483,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10994739915af8fb08a76314-60741062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myfcms' => 0,
    'myf_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8fb08aa7727_26875465',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8fb08aa7727_26875465')) {function content_5af8fb08aa7727_26875465($_smarty_tpl) {?><?php if (!is_callable('smarty_function_global')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\function.global.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title><?php echo $_smarty_tpl->tpl_vars['myfcms']->value['title'];?>
-<?php echo smarty_function_global(array('name'=>"cfg_webname"),$_smarty_tpl);?>
</title>
		<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['myfcms']->value['keywords'];?>
" />
		<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['myfcms']->value['description'];?>
" />
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/css/main.css" />
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="center">
			<?php echo $_smarty_tpl->getSubTemplate ("menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div class="list">
				<div class="content">
					<div class="title">
						<?php echo $_smarty_tpl->tpl_vars['myfcms']->value['title'];?>

					</div>
					<div class="cbody">
						<?php echo $_smarty_tpl->tpl_vars['myfcms']->value['body'];?>

					</div>
				</div>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ("bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</body>
</html><?php }} ?>