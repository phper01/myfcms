<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:46:17
         compiled from "E:\wamp\www\myfcms\tpl\default\index\top.html" */ ?>
<?php /*%%SmartyHeaderCode:9645723565af8f879d0e2f9-60256583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0caf7192098aeef2f99ef94ec5656edc9650bfe' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\default\\index\\top.html',
      1 => 1358205883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9645723565af8f879d0e2f9-60256583',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'vo' => 0,
    'topchannel' => 0,
    'myfcms' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f879d35491_72608403',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f879d35491_72608403')) {function content_5af8f879d35491_72608403($_smarty_tpl) {?><?php if (!is_callable('smarty_block_channel')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.channel.php';
if (!is_callable('smarty_block_taglist')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.taglist.php';
?><div class="top">
	<div class="header">
		<div class="logo">
			<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/"> <img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/default/public/images/logo.jpg" /> </a>
		</div>
		<div class="search">
			<form action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php" method="get">
				<ul>
					<li>
						<select class="searchsel" name="typeid">
							<option value="0">====选择栏目====</option>
							<?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'tree'=>"show")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'tree'=>"show"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

							<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['vo']->value['spacer'];?>
<?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
 </option>
							<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'tree'=>"show"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

						</select>
						<input type="hidden" name="a" value="search" />
					</li>
					<li>
						<input name="keyword" id="search-keyword" onblur="ablur(this)" onclick="aclick(this)"  onmouseover="this.focus()"  value="请输入关键字" size="20" class="searchtxt">
					</li>
					<li>
						<input type="submit" class="searchbtn" value="搜索" />
					</li>
					<li>
					<li class="search_text">
						| 热门: <a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
?a=search&keyword=myfcms">MyfCMS</a>
							<?php $_smarty_tpl->smarty->_tag_stack[] = array('taglist', array('id'=>"vo",'limit'=>"3")); $_block_repeat=true; echo smarty_block_taglist(array('id'=>"vo",'limit'=>"3"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

							<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['tagurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</a>
							<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_taglist(array('id'=>"vo",'limit'=>"3"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

					</li>
				</ul>
			</form>
			<script type="text/javascript">
				 function ablur(obj){
				 	if(obj.value ==''){
				 		obj.value='请输入关键字'
				 		}
				 }
				 function aclick(obj){
				 	if(obj.value=='请输入关键字')obj.value='';
				 }
			</script>
		</div>
	</div>
	<div class="nav">
		<div class="nav-menu">
			<div class="nav-one">
				<ul>
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/">首页</a>
					</li>
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'topid'=>"0",'index'=>"0")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0",'index'=>"0"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

					<li <?php if ($_smarty_tpl->tpl_vars['vo']->value['id']==$_smarty_tpl->tpl_vars['topchannel']->value['id']){?> class="on"<?php }?>>
						<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeurl'];?>
" rel="dropmenu<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</a>
					</li>
					<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0",'index'=>"0"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</ul>
				<div class="clear"></div>
			</div>
			<div class="nav-two">
				<ul>
					<?php if ($_smarty_tpl->tpl_vars['topchannel']->value['id']>0){?>
						<?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'topid'=>$_smarty_tpl->tpl_vars['topchannel']->value['id'],'index'=>"1")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'topid'=>$_smarty_tpl->tpl_vars['topchannel']->value['id'],'index'=>"1"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

						<li <?php if ($_smarty_tpl->tpl_vars['vo']->value['id']==$_smarty_tpl->tpl_vars['myfcms']->value['typeid']){?> class="on"<?php }?>>
							<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeurl'];?>
" rel="dropmenu<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</a>
						</li>
						<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'topid'=>$_smarty_tpl->tpl_vars['topchannel']->value['id'],'index'=>"1"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

					<?php }else{ ?>
					<li>
						感谢使用MyfCMS2.0，中国首款完全开源免费的PHPCMS系统，任何个人或组织,不论赢利与否均可以免费使用！
					</li>
					<?php }?>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<div class="banner">
	<a href="http://www.minyifei.cn" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/default/public/images/banner.jpg" border="0" /></a>
</div><?php }} ?>