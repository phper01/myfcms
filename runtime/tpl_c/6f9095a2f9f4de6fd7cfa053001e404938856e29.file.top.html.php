<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:38:50
         compiled from "E:\wamp\www\myfcms\admin\tpl\index\top.html" */ ?>
<?php /*%%SmartyHeaderCode:1719679435af8f6baadd6b8-64830039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f9095a2f9f4de6fd7cfa053001e404938856e29' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\admin\\tpl\\index\\top.html',
      1 => 1371821519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1719679435af8f6baadd6b8-64830039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'user' => 0,
    'myf_url' => 0,
    'menu' => 0,
    'submenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f6bab16646_55533261',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f6bab16646_55533261')) {function content_5af8f6bab16646_55533261($_smarty_tpl) {?><div id="header" class="wapper clearfix">
	<h1 id="logo">
		<a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/">
			<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/logo.png" alt="闵益飞内容管理系统logo" />
		</a>
	</h1>
	<div id="assistive-menu">
		欢迎您，<a title="<?php echo $_smarty_tpl->tpl_vars['user']->value['uname'];?>
" class="user-id" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=main"><?php echo $_smarty_tpl->tpl_vars['user']->value['userid'];?>
</a>
        <span class="cut-line">|</span>
        <a href="<?php echo $_smarty_tpl->tpl_vars['myf_url']->value;?>
/index.php" target="_blank">首页</a>
        <span class="cut-line">|</span>
        <a href="http://myfcms.minyifei.cn" target="_blank">帮助中心</a>
        <span class="cut-line">|</span>
		<a class="link-login-out" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?a=login_out">退出</a>
	</div>
</div>
<div id="nav" class="wapper">
	<ul class="menu clearfix">
        <li class="first-node"><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='archives'){?> class="current-page" <?php }?>><span>文章管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=html&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='html'){?> class="current-page" <?php }?>><span>生成HTML</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='arctype'){?> class="current-page" <?php }?>><span>栏目管理&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/high.gif" /></span></a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='flink'){?> class="current-page" <?php }?>><span>友情链接&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/high.gif" /></span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='moban'){?> class="current-page" <?php }?>><span class="high">模板管理&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/high.gif" /></span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=main" <?php if ($_smarty_tpl->tpl_vars['menu']->value=='sys'){?> class="current-page" <?php }?>><span>系统维护&nbsp;<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/images/high.gif" /></span></a></li>
    </ul>
    <ul class="sub-menu clearfix">
    	<?php if ($_smarty_tpl->tpl_vars['menu']->value=='archives'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=main"  <?php if ($_smarty_tpl->tpl_vars['submenu']->value!='add'){?> class="current-page" <?php }?>><span>文章管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=archives&a=add" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add'){?>  class="current-page" <?php }?> ><span>录入新文章</span></a></li>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['menu']->value=='html'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=html&a=main" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='main'){?>  class="current-page" <?php }?>><span>生成栏目</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=html&a=archive" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='archive'){?>  class="current-page" <?php }?> ><span>生成文章</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=html&a=index" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='index'){?>  class="current-page" <?php }?> ><span>生成首页</span></a></li>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['menu']->value=='flink'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=main" <?php if ($_smarty_tpl->tpl_vars['submenu']->value!='add'){?>  class="current-page" <?php }?>><span>友情链接管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=flink&a=add" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add'){?>  class="current-page" <?php }?> ><span>添加友情链接</span></a></li>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['menu']->value=='arctype'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=main" <?php if ($_smarty_tpl->tpl_vars['submenu']->value!='add'){?>  class="current-page" <?php }?>><span>栏目管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=arctype&a=add" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add'){?>  class="current-page" <?php }?> ><span>添加栏目</span></a></li>
        <?php }?>
        
         <?php if ($_smarty_tpl->tpl_vars['menu']->value=='moban'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=main" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='main'){?>  class="current-page" <?php }?>><span>模板管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=add" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add'){?>  class="current-page" <?php }?> ><span>新建模板</span></a></li>
        <li><a href="http://myfcms.minyifei.cn/category/label.html" target="_blank" ><span>标签详解</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=mlist" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='mlist'||$_smarty_tpl->tpl_vars['submenu']->value=='export'){?>  class="current-page" <?php }?>><span>主题管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=addt" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='addt'){?>  class="current-page" <?php }?>><span>新建主题</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=moban&a=install" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='install'){?>  class="current-page" <?php }?>><span>导入主题</span></a></li>
        <?php }?>
        
        <?php if ($_smarty_tpl->tpl_vars['menu']->value=='sys'){?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=main" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='main'){?>  class="current-page" <?php }?>><span>系统基本参数</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=add_sys" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add_sys'){?>  class="current-page" <?php }?> ><span>添加系统参数</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=admin" <?php if (($_smarty_tpl->tpl_vars['submenu']->value=='admin')||($_smarty_tpl->tpl_vars['submenu']->value=='update_admin')||($_smarty_tpl->tpl_vars['submenu']->value=='delete_admin')){?>  class="current-page" <?php }?> ><span>管理员管理</span></a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=sys&a=add_admin" <?php if ($_smarty_tpl->tpl_vars['submenu']->value=='add_admin'){?>  class="current-page" <?php }?> ><span>添加普通管理员</span></a></li>
        <?php }?>
    </ul>
</div>
<div id="notic" class="wapper" style="display: none">
	<a href="./" style="color:#FF0000">
		欢迎使用闵益飞内容管理系统2.0！
	</a>
</div><?php }} ?>