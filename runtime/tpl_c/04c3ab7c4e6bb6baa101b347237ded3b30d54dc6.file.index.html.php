<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 11:08:18
         compiled from "E:\wamp\www\myfcms\tpl\green\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1497008415af8fcc309ef07-05958600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04c3ab7c4e6bb6baa101b347237ded3b30d54dc6' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\green\\index\\index.html',
      1 => 1526267296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1497008415af8fcc309ef07-05958600',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8fcc30c6478_96452477',
  'variables' => 
  array (
    'myf_path' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8fcc30c6478_96452477')) {function content_5af8fcc30c6478_96452477($_smarty_tpl) {?><?php if (!is_callable('smarty_block_channel')) include 'E:\\wamp\\www\\myfcms\\myf\\smt\\plugins\\block.channel.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>绿之宇</title>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/css/style.css" />
<!--banner-->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/js/jquery1.42.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/js/index.js"></script>
</head>

<body>
<!--header-->
<div style="height:95px; background-color:white;">
	<dl class="header">
		<dt></dt>
		<dd>
        	<div class="lxwm"><ul><li><a href="#">&nbsp;</a></li></ul></div>
			<div class="tel"><span>4000-000-0000</span></div>
			<div class="search">
				<input type="text">
				<button>&nbsp;</button>
			</div>
		</dd>		
	</dl>
</div>

<!--nav-->
<div class="menu">
	<ul class="nav">
		<a href="index.html"><li id="dangqian">首页</li></a>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('channel', array('id'=>"vo",'topid'=>"0",'index'=>"0")); $_block_repeat=true; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0",'index'=>"0"), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

		<a href="<?php echo $_smarty_tpl->tpl_vars['vo']->value['typeurl'];?>
" rel="dropmenu<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
"><li ><?php echo $_smarty_tpl->tpl_vars['vo']->value['typename'];?>
</li></a>
                <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_channel(array('id'=>"vo",'topid'=>"0",'index'=>"0"), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

		<a href="about.html"><li>关于我们</li></a>
		<a href="product.html"><li>产品展示</li></a>
		<a href="#"><li>案例展示</li></a>
		<a href="#"><li>新闻中心</li></a>
        <li class="last">&nbsp;
        	<ul class="lang">
            	<li><a href="#">English</a></li>
                <li><a href="#">简体中文</a></li>
            </ul>
        </li>
	</ul>
</div>

<!--banner-->
<div class="fullSlide">		
	<div class="bd">
		<ul>
			<li><a href="javascript:void();"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/banner.png"></a></li>
			<li><a href="javascript:void();"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/banner.png"></a></li>
			<li><a href="javascript:void();"><img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/banner.png"></a></li>
		</ul>
	</div>
	<div class="hd"><ul></ul></div>
</div>

	<script type="text/javascript">
		jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });
	</script>

<!--main-->
<div  class="about">
	<div class="inner">
    	<div class="left">
        	<div class="head">
    			<h1>关于我们</h1><small>ABOUT</small>
            </div>
            <div class="con">
            	<img class="l_img" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/about.png" />
            	<p>绿之宇科技有限公司，是一家从事材料表面处理技术研发，生产及销售的专业型企业, 总投资3000万人民币。多年来，投入庞大经费研究表面立体效果处理（梵登立体漆）项目。于2005年初完成产品应用技术，并申报发明专利。2005年底，我司开发出百多款图案拼颜色，并首先将此技术投入玻璃装饰应用，生产出瑰丽多姿的立体玻璃，注册为”梵登立体玻璃” "PHANTOM3D </p>
                <div class="more1">
                	查看详情>>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="right">
        	<div class="head">
    			<h1>联系方式</h1><small>CONTACT</small>
            </div>
            <div class="con">
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/lxwm.png" />
            	<dl>
                	<dt>地址：</dt><dd>广州市白云区江高镇泉溪工业区88号</dd>
                    <dt>手机：</dt><dd>18928798558 李小姐</dd>
                    <dt>手机：</dt><dd>18928823278</dd>
                    <dt>电话：</dt><dd>020-36894352</dd>
                </dl>
            </div>
        </div>
    </div>
</div >

<div  class="news">
	<div class="inner">
    	<div class="left">
        	<div class="head">
    			<h1>新闻中心</h1><small>NEWS</small>
            </div>
            <div class="con">
            	<div class="news_box">
                  <ul>
                      <li><a href="#">钢化玻璃与普通玻璃相比的优劣</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">玻璃幕墙对玻璃的要求</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">解决钢化玻璃自爆问题</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">防弹玻璃防护原理</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">什么是夹胶钢化玻璃</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">钢化玻璃与普通玻璃相比的优劣</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">玻璃幕墙对玻璃的要求</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">解决钢化玻璃自爆问题</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">防弹玻璃防护原理</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">什么是夹胶钢化玻璃</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">钢化玻璃与普通玻璃相比的优劣</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">玻璃幕墙对玻璃的要求</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">解决钢化玻璃自爆问题</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">防弹玻璃防护原理</a><span class="time">2015-05-19</span></li>
                      <li><a href="#">什么是夹胶钢化玻璃</a><span class="time">2015-05-19</span></li>
                  </ul>
                </div>
                <div class="qh">
                	<span class="prev">&nbsp;</span>
                    <span class="next">&nbsp;</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="right">
        	<div class="head">
    			<h1>快捷入口</h1><small>&nbsp;</small>
            </div>
            <div class="con">
            	<div class="tab">
                	<ul>
                    	<li class="cur">留言板</li>
                        <li>计算机</li>
                        <li>产品</li>
                    </ul>
                    <span class="toright"></span>
                </div>
            </div>
        </div>
    </div>
</div >

<div class="yw">
	<div class="inner">
        <ul>
        	<li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p1.png">
                <div class="name">钢化玻璃</div>
            </li>
            <li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p2.png">
                <div class="name">夹膜玻璃</div>
            </li>
            <li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p3.png">
                <div class="name">LOW-E玻璃</div>
            </li>
            <li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p4.png">
                <div class="name">节能中空玻璃</div>
            </li>
            <li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p5.png">
                <div class="name">中空玻璃</div>
            </li>
            <li>
            	<img src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/tpl/green/public/images/p6.png">
                <div class="name">其他玻璃</div>
            </li>
        </ul>
    </div>
</div>

<!--footer-->
<div class="bottom">
	<div class="inner">
      <ul class="ul1">
          <li class="li1">产品与服务
          `	<ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">案例展示
          	<ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">新闻中心
          	<ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">关于我们
          	<ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <li class="li1">人才招聘
          	<ul class="ul1">
                <li><a href="#" >首页</a></li>
                <li><a href="#">关于我们</a></li>
                <li><a href="#">产品中心</a></li>
                <li><a href="#">技术与支持</a></li>
                <li><a href="#">联系我们</a></li>
                <div class="clear"></div>
            </ul>
          </li>
          <div class="clear"></div>
      </ul>
	</div>
    <div class="ba"><div class="inner"><span class="left">深圳市绿之宇科技有限公司 all rights reserved. 更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></span><span class="right"><a href="#">联系我们</a>  |   <a href="#">网站地图</a></span></div></div>
</div>
</body>
</html>




















<?php }} ?>