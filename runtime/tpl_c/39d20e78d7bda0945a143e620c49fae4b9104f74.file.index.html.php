<?php /* Smarty version Smarty-3.1.11, created on 2018-05-14 10:19:28
         compiled from "E:\wamp\www\myfcms\tpl\default\install\index.html" */ ?>
<?php /*%%SmartyHeaderCode:18683734995af8eb14a36b63-00002914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39d20e78d7bda0945a143e620c49fae4b9104f74' => 
    array (
      0 => 'E:\\wamp\\www\\myfcms\\tpl\\default\\install\\index.html',
      1 => 1526264365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18683734995af8eb14a36b63-00002914',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5af8eb14aa73a9_00116235',
  'variables' => 
  array (
    'myf_path' => 0,
    'indexurl' => 0,
    'now' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af8eb14aa73a9_00116235')) {function content_5af8eb14aa73a9_00116235($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>安装MyfCMS系统</title>
		<meta name="description" content="" />
		<meta name="author" content="minyifei.cn" />
		<style type="text/css">
			body {
				font: 12px/1.5 "Lucida Grande", Helvetica, Arial, Verdana, '微软雅黑', sans-serif;
				margin:0;
				padding:0;
			}
			a:hover {
				text-decoration: underline;
			}
			a {
				color: #06C;
				text-decoration: none;
			}
			#footer {
				clear: both;
				color: #666;
				border-top: 5px solid #D8D8D8;
				text-align: center;
				margin-top: 20px;
				padding: 15px 0 32px 0;
				background: #EFEFEF;
				line-height: 25px;
			}
			#logo{
				text-align:center;
			}
			#main{
				border-top:5px solid #D8D8D8;
				margin-top:10px;
			}
			.wapper{
				width:700px;
				margin:0 auto;
				border: 1px solid #CCC;
				margin-top:20px
			}
			.left {
				float: left;
				display: inline;
			}
			.mr10 {
				margin-right: 10px !important;
			}
			.btn,
			.btn span{ border: 0; background: url(<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/admin/images/buttons.png) no-repeat; cursor: pointer; }
			.btn-pay{ display: inline-block; *display: inline; width: 78px; height: 28px; text-indent: -1000px; *zoom: 1; overflow: hidden; }
			.btn-white{ padding: 0 0 0 10px; height: 27px; background-position: 0 -35px; color: #000; text-shadow: 1px 1px 0 #FFF; }
			.btn-white span{ float: left; padding: 5px 11px 6px 0; height: 16px; background-position: 100% -35px; line-height: 16px; cursor: pointer; }
			.txt{ margin: -3px 0 0; padding: 4px; line-height: 16px; border: 1px solid #CCC; border-radius: 3px; background: #FFF url(<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/admin/images/input-text-bg.png) repeat-x; vertical-align: middle; width:250px }
			.txt:focus{ border-color:#F60; }
			.fm-text-tip{ color:#CCC;}
			.tb{
				width: 700px;
				font-size: 12px;
				overflow: hidden;
				color: #666;
				border-collapse: collapse;
				border-spacing: 0;
				
			}
			.tb tr td{
				border-top: 1px solid #CCC;
				padding: 8px 10px;
				text-align:left
			}
			.tb tr.alt td{
				background: #F7F9FB;
			}
			.tb tr td.tleft{
				width:120px;
				text-align:right;
			}
			.tb tr td.info{
				width:250px;
			}
			.item{
				border-bottom:1px solid #ccc;
			}
			h2{
				padding-left:15px;
			}
			.red{
				color:red;
			}
			.green{
				color:green
			}
		</style>
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/admin/js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

				var url = location.href;
				var url = window.location.protocol+"//"+window.location.host;
				$("#txtBaseHost").val(url);
				
				$("#dataTest").click(function(){
					var isok = checkDbContent();
					if(isok){
						var dbhost = $("#txtHost").val();
						var dbport = $("#txtPort").val();
						var dbname = $("#txtName").val();
						var dbuser = $("#txtUser").val();
						var dbpwd = $("#txtPassword").val();
						$.ajax({
							url:"<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=install&a=check",
							data:{
								dbhost:dbhost,
								dbport:dbport,
								dbname:dbname,
								dbuser:dbuser,
								dbpwd:dbpwd
							},
							dataType:"json",
							success:function(res){
                                                            console.log(res);
								if(res["code"]==1){
									$("#testInfo").html(res["msg"]).removeClass("red").addClass("green");
								}else{
									$("#testInfo").html(res["msg"]).removeClass("green").addClass("red");
								}
							},
							error:function(err){
							    $("#testInfo").html("数据库连a接失败").removeClass("green").addClass("red");
							}
						})
					}
				})
				
				$("#btnSubmit").click(function(){
					if(checkDbContent() && checkInfo()){
						$("#dbform").submit();
					}
				})
			})
			
			function checkDbContent(){
				var isok = true;
				var dbhost = $("#txtHost").val();
				if(dbhost==""){
					$("#infoHost").html("请填写数据库主机").addClass("red");
					isok = false;
				}else{
					$("#infoHost").removeClass("red");
				}
				var dbport = $("#txtPort").val();
				if(dbport==""){
					$("#infoPost").html("请输入数据库端口号").addClass("red");
					isok = false;
				}else{
					$("#infoPost").html("").removeClass("red");
				}
				var dbname = $("#txtName").val();
				if(dbname==""){
					$("#infoName").html("请输入数据库名").addClass("red");
					isok = false;
				}else{
					$("#infoName").html("").removeClass("red");
				}
				var dbuser = $("#txtUser").val();
				if(dbuser==""){
					$("#infoUser").html("请输入数据库用户名").addClass("red");
					isok = false;
				}else{
					$("#infoUser").html("").removeClass("red");
				}
//				var dbpwd = $("#txtPassword").val();
//				if(dbpwd==""){
//					$("#infoPassword").html("请输入数据库密码").addClass("red");
//					isok = false;
//				}else{
//					$("#infoPassword").html("").removeClass("red");
//				}
				return isok;
			}
			
			function checkInfo(){
				var isok = true;
				var admin = $("#txtAdmin").val();
				if(admin==""){
					$("#infoAdmin").html("请输入管理员登陆名").addClass("red");
					isok = false;
				}else{
					$("#infoAdmin").html("").removeClass("red");
				}
				var pwd = $("#txtPwd").val();
				if(pwd==""){
					$("#infoPwd").html("请输入管理员密码").addClass("red");
					isok = false;
				}else{
					$("#infoPwd").html("").removeClass("red");
				}
				var webname = $("#txtWebName").val();
				if(pwd==""){
					$("#infoWebName").html("请输入").addClass("red");
					isok = false;
				}else{
					$("#infoWebName").html("").removeClass("red");
				}
				return isok;
			}
		</script>
	</head>
	<body>
		<div id="header">
			<h1 id="logo"><img border="0" src="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/admin/images/logo.png" alt="闵益飞内容管理系统logo" /></h1>
		</div>
		<div id="main">
			<div class="wapper">
				<form action="<?php echo $_smarty_tpl->tpl_vars['myf_path']->value;?>
/index.php?m=install&a=step" method="post" id="dbform">
					<div class="item">
						<h2>数据库设定</h2>
						<table class="tb">
							<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
								<td class="tleft">
									数据库主机：
								</td>
								<td>
									<input type="text" name="dbhost" id="txtHost" class="txt" value="localhost" />
								</td>
								<td class="info">
									<span class="info" id="infoHost">
										一般为localhost
									</span>
								</td>
							</tr>
							<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
								<td class="tleft">
									数据库端口：
								</td>
								<td>
									<input type="text" name="dbport" value="3306" id="txtPort" class="txt" />
								</td>
								<td>
									<span class="info" id="infoPort">
										
									</span>
								</td>
							</tr>
							<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
								<td class="tleft">
									数据库名称：
								</td>
								<td>
									<input type="text" name="dbname" value="myfcms2" class="txt" id="txtName" />
								</td>
								<td>
									<span class="info" id="infoName">
										
									</span>
								</td>
							</tr>
							<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
								<td class="tleft">
									数据库用户：
								</td>
								<td>
									<input type="text" name="dbuser" class="txt" id="txtUser" />
								</td>
								<td>
									<span class="info" id="infoUser">
										
									</span>
								</td>
							</tr>
							<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
								<td class="tleft">
									数据库密码：
								</td>
								<td>
									<input type="text" name="dbpwd" class="txt" id="txtPassword" />
								</td>
								<td>
									<span class="info" id="infoPassword">
										
									</span>
								</td>
							</tr>
							<tr class="alt">
								<td colspan="3">
									<a href="javascript:void(0)" id="dataTest" class="left btn btn-white mr10"><span>测试连接</span></a>
									<span id="testInfo"></span>
								</td>
							</tr>
						</table>
					</div>
					<div class="item">
					<h2>管理员信息</h2>
					<table class="tb">
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								用户名：
							</td>
							<td>
								<input type="text" class="txt" name="admin" value="admin" id="txtAdmin" />
							</td>
							<td class="info">
								<span class="info" id="infoAdmin">
									只能用'0-9'、'a-z'、'A-Z'
								</span>
							</td>
						</tr>
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								密码：
							</td>
							<td>
								<input type="text" class="txt" name="pwd" value="myfcms" id="txtPwd"/>
							</td>
							<td>
								<span class="info" id="infoPwd">
									
								</span>
							</td>
						</tr>
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								管理员邮箱：
							</td>
							<td>
								<input type="text" class="txt" name="email" value="admin@minyifei.cn" id="txtEmail" />
							</td>
							<td>
								<span class="info" id="infoEmail">
									
								</span>
							</td>
						</tr>
					</table>
					</div>
					<div class="item">
					<h2>网站配置</h2>
					<table class="tb">
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								网站名称：
							</td>
							<td>
								<input type="text" class="txt" name="webname" value="我的网站" id="txtWebName" />
							</td>
							<td class="info">
								<span class="info" id="infoWebName">
								</span>
							</td>
						</tr>
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								网站网址：
							</td>
							<td>
								<input type="text" class="txt" id="txtBaseHost" name="basehost"  value=""/>
							</td>
							<td>
								<span class="info" id="infoBaseHost">
									
								</span>
							</td>
						</tr>
						<tr align="center" bgcolor="#FFFFFF" height="26" onmousemove="javascript:this.bgColor='#fafafa';" onmouseout="javascript:this.bgColor='#FFFFFF';">
							<td class="tleft">
								CMS安装目录：
							</td>
							<td>
								<input type="text" class="txt" name="webpath" value="<?php echo $_smarty_tpl->tpl_vars['indexurl']->value;?>
" id="txtWebPath" />
							</td>
							<td>
								<span class="info" id="infoWebPath">
									在根目录安装时不必理会
								</span>
							</td>
						</tr>
						<tr class="alt">
							<td colspan="3">
								<a id="btnSubmit" href="javascript:void()" class="left btn btn-white mr10"><span>确认保存</span></a>
							</td>
						</tr>
					</table>
					</div>
				</form>
			</div>
		</div>
		<div id="footer">
			<p>
				CopyRight &copy; 2011-<?php echo $_smarty_tpl->tpl_vars['now']->value;?>
 <a href="http://www.minyifei.cn" target="_blank">MyfCMS 2.0</a> 闵益飞内容管理系统
			</p>
			<p>
				<h2> 完全开源免费的PHPCMS系统 </h2>
			</p>
		</div>
	</body>
</html>
<?php }} ?>