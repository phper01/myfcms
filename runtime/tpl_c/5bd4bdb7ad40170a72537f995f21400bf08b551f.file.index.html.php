<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:46:17
         compiled from "E:\wamp\www\myfcms\tpl\default\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1632105285af8f8799b6f71-77812104%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bd4bdb7ad40170a72537f995f21400bf08b551f' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\default\\index\\index.html',
      1 => 1358205766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1632105285af8f8799b6f71-77812104',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'vo' => 0,
    'arc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f879a33604_49664360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f879a33604_49664360')) {function content_5af8f879a33604_49664360($_smarty_tpl) {?><?php if (!is_callable('smarty_function_global')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\function.global.php';
if (!is_callable('smarty_block_arclist')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.arclist.php';
if (!is_callable('smarty_modifier_date_format')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_block_channel')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.channel.php';
if (!is_callable('smarty_block_flink')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.flink.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title><?php echo smarty_function_global(array('name'=>"cfg_webname"),$_smarty_tpl);?>
</title>
		<meta name="description" content="<?php echo smarty_function_global(array('name'=>'cfg_description'),$_smarty_tpl);?>
" />
		<meta name="keywords" content="<?php echo smarty_function_global(array('name'=>'cfg_keywords'),$_smarty_tpl);?>
" />
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/default/public/css/main.css" />
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="main">
			<div class="main-left">
				<div class="sidebar slidebar-top">
					<h2>排行榜</h2>
					<ul>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('id'=>"vo",'limit'=>"11",'order'=>"click desc")); $_block_repeat=true; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"11",'order'=>"click desc"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['arcurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a>
						</li>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"11",'order'=>"click desc"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

					</ul>
				</div>
				<div class="sidebar slidebar-rand">
					<h2>随机文章</h2>
					<ul>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('id'=>"vo",'limit'=>"20",'order'=>"rand()")); $_block_repeat=true; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"20",'order'=>"rand()"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['arcurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a>
						</li>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"20",'order'=>"rand()"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

					</ul>
				</div>
			</div>
			<div class="main-right">
				<div class="news">
					<div class="news-title">
						<h2>最近更新</h2>
						<p>
							<a href="/">感谢使用MyfCMS系统</a>
						</p>
						<div class="clear"></div>
					</div>
					<div class="news-list">
						<ul>
						   <?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('id'=>"vo",'limit'=>"22")); $_block_repeat=true; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"22"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

							<li>
								<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['arcurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['sendtime'],'%Y-%m-%d');?>

							</li>
							<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_arclist(array('id'=>"vo",'limit'=>"22"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</ul>
						<div class="clear"></div>
					</div>
				</div>
				<?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'key'=>"i",'topid'=>"0",'type'=>"0")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'key'=>"i",'topid'=>"0",'type'=>"0"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

				<div class="new-box <?php if (!(1 & $_smarty_tpl->tpl_vars['vo']->value['i'])){?> new-box-r<?php }?>">
					<div class="news-title">
						<h2><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</h2>
						<p>
							<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeurl'];?>
">感谢使用MyfCMS系统</a>
						</p>
						<div class="clear"></div>
					</div>
					<div class="box-list">
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"0,1")); $_block_repeat=true; echo smarty_block_arclist(array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"0,1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<div class="imgtxt">
							<a href="<?php echo $_smarty_tpl->tpl_vars['arc']->value['arcurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arc']->value['title'];?>
">
								<img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['arc']->value['litpic'])===null||$tmp==='' ? ((string)$_smarty_tpl->tpl_vars['myf_path']->value)."/public/images/nopic.jpg" : $tmp);?>
" border="0" width="120" height="90" alt="<?php echo $_smarty_tpl->tpl_vars['arc']->value['title'];?>
"></a>
							<h3><a href="<?php echo $_smarty_tpl->tpl_vars['arc']->value['arcurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['arc']->value['title'];?>
</a></h3>
							<p><?php echo $_smarty_tpl->tpl_vars['arc']->value['description'];?>
...<a href="<?php echo $_smarty_tpl->tpl_vars['arc']->value['arcurl'];?>
">&gt;&gt;详细</a></p>
						</div>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_arclist(array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"0,1"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						<ul>
							<?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"1,6")); $_block_repeat=true; echo smarty_block_arclist(array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"1,6"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

							<li><a href="<?php echo $_smarty_tpl->tpl_vars['arc']->value['arcurl'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['arc']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['arc']->value['title'];?>
</a></li>
							<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_arclist(array('id'=>"arc",'typeid'=>$_smarty_tpl->tpl_vars['vo']->value['id'],'limit'=>"1,6"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</ul>
					</div>
				</div>
				<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'key'=>"i",'topid'=>"0",'type'=>"0"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="links">
				<div class="links-title">
					<h3>友情链接</h3>
					<p>欢迎访问量>1000ip的网站交换链接</p>
				</div>
				<div class="links-body">
					<ul>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('flink', array('id'=>"vo")); $_block_repeat=true; echo smarty_block_flink(array('id'=>"vo"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<li><a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['linkurl'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['webname'];?>
</a> </li>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_flink(array('id'=>"vo"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

					</ul>
				</div>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ("bottom.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		
	</body>
</html>
<?php }} ?>