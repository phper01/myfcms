<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:50:56
         compiled from "E:\wamp\www\myfcms\tpl\company\index\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:3052663335af8f990004494-09694637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9371aeccf0bce1ed9ac38613f253d51a24083740' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\company\\index\\menu.html',
      1 => 1359379186,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3052663335af8f990004494-09694637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myf_path' => 0,
    'vo' => 0,
    'topchannel' => 0,
    'child' => 0,
    'myfcms' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8f990017e08_09151359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8f990017e08_09151359')) {function content_5af8f990017e08_09151359($_smarty_tpl) {?><?php if (!is_callable('smarty_block_channel')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.channel.php';
?><div class="header">
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
            <div class="position">
                您现在的位置：<?php echo $_smarty_tpl->tpl_vars['myfcms']->value['position'];?>

            </div><?php }} ?>