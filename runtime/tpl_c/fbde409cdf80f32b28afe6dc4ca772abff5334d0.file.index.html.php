<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:47:00
         compiled from "E:\wamp\www\myfcms\tpl\company\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:16583222865af8f8a4e953c9-56814011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fbde409cdf80f32b28afe6dc4ca772abff5334d0' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\company\\index\\index.html',
      1 => 1359378815,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16583222865af8f8a4e953c9-56814011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'vo' => 0,
    'topchannel' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f8a4eea3c5_64885512',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f8a4eea3c5_64885512')) {function content_5af8f8a4eea3c5_64885512($_smarty_tpl) {?><?php if (!is_callable('smarty_function_global')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\function.global.php';
if (!is_callable('smarty_block_channel')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.channel.php';
?><tagLib name="myfcms" />
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title><?php echo smarty_function_global(array('name'=>"cfg_webname"),$_smarty_tpl);?>
-中国首款完全开源免费的phpcms系统</title>
		<meta name="keywords" content="闵益飞，闵益飞内容管理系统，myfcms，开源免费的phpcms系统，phpcms">
		<meta name="description" content="闵益飞内容管理系统，英文缩写MyfCMS，是中国首款完全开源免费的phpcms系统，任何个人或组织,不论赢利与否均可以免费使用！">
		<meta name="author" content="minyifei.cn" />
		<link rel="shortcut icon" href="/favicon.ico" />
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/css/main.css" />
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/js/jquery.carouFredSel-5.5.0.js"></script>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/js/index.js"></script>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="center">
			<div class="header">
                <div class="nav">
                    <ul class="menu">
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/">首页</a>
                        </li>
                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'topid'=>"0")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                        <li>
                            <a <?php if ($_smarty_tpl->tpl_vars['vo']->value['id']==$_smarty_tpl->tpl_vars['topchannel']->value['id']){?>class="on"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</a>
                            <ul>
                                <?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"child",'topid'=>$_smarty_tpl->tpl_vars['vo']->value['id'])); $_block_repeat=true; echo smarty_block_channel(array('id'=>"child",'topid'=>$_smarty_tpl->tpl_vars['vo']->value['id']), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

                                <li>
                                    <a  href="<?php echo $_smarty_tpl->tpl_vars['child']->value['typeurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['typename'];?>
</a>
                                </li>
                                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"child",'topid'=>$_smarty_tpl->tpl_vars['vo']->value['id']), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                            </ul>
                        </li>
                        <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </ul>
                </div>
            </div>
			<div class="main">
				<div id="wrapper">
					<div id="bg"></div>
					<div id="carousel">
						<div>
							<img class="img-front" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/dot1.png" alt="dot1" width="450" height="350" />
							<img class="img-back" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/dot2.png" alt="dot2" width="350" height="275" />
							<h3>MyfCMS2.0</h3>
							<p>中国首款完全开源免费的PHPCMS系统</p>
							<a href="http://myfcms.minyifei.cn/category/download.html">免费下载 »</a>
						</div>
						<div>
							<img class="img-front" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/cfs1.png" alt="cfs1" width="450" height="350" />
							<img class="img-back" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/cfs2.png" alt="cfs2" width="350" height="275" />
							<h3>MyfCMS2.0后台界面</h3>
							<p>清爽的后台管理界面</p>
							<a href="http://myfcms.minyifei.cn/category/use.html">界面预览 »</a>
						</div>
						<div>
							<img class="img-front" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/val1.png" alt="val1" width="450" height="350" />
							<img class="img-back" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/public/images/val2.png" alt="val2" width="350" height="275" />
							<h3>强大的模板支持</h3>
							<p>MyfCMS2.0采用Smarty模板引擎，支持在线编辑模板！</p>
							<a href="http://myfcms.minyifei.cn/category/download.html">免费下载 »</a>
						</div>
					</div>
					<a id="prev" href="#"><span></span></a>
					<a id="next" href="#"><span></span></a>
				</div>
			</div>
			<div class="footer">
                <div class="logo">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/company/public/images/logo.png" />
                </div>

                <div class="powerby">
                    Powered by <a href="http://www.minyifei.cn" target="_blank">MyfCMS</a>
                    <br/>
                    &copy;2012&nbsp;minyifei.cn
                    <br/>
                    京ICP备12002334号-1
                </div>

                <ul class="footer_nav">
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/Introduction.html">产品简介</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/contact.html">联系我们</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/use.html">帮助中心</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/license.html">授权协议</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/partner.html">合作伙伴</a>
                    </li>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/category/love.html">捐助我们</a>
                    </li>
                    <li>
                       <script src="http://s84.cnzz.com/stat.php?id=3498821&web_id=3498821" language="JavaScript"></script>
                    </li>
                </ul>
			</div>
		</div>
		
	</body>
</html><?php }} ?>