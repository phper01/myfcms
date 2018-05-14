<?php
// +----------------------------------------------------------------------
// | MyfPHP 闵益飞PHP MVC框架  -- 基本函数类
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
function dump($var, $echo = true, $label = null, $strict = true) {
	$label = ($label === null) ? '' : rtrim($label) . ' ';
	if (!$strict) {
		if (ini_get('html_errors')) {
			$output = print_r($var, true);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		} else {
			$output = $label . print_r($var, true);
		}
	} else {
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		if (!extension_loaded('xdebug')) {
			$output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		}
	}
	if ($echo) {
		echo($output);
		return null;
	} else
		return $output;
}

/**
 * URL重定向
 * @param string $url 重定向的URL地址
 * @param integer $time 重定向的等待时间（秒）
 * @param string $msg 重定向前的提示信息
 * @return void
 */
function redirect($url, $time = 0, $msg = '') {
	//多行URL地址支持
	$url = str_replace(array("\n", "\r"), '', $url);
	if (empty($msg))
		$msg = "系统将在{$time}秒之后自动跳转到{$url}！";
	if (!headers_sent()) {
		// redirect
		if (0 === $time) {
			header('Location: ' . $url);
		} else {
			header("refresh:{$time};url={$url}");
			echo($msg);
		}
		exit();
	} else {
		$str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
		if ($time != 0)
			$str .= $msg;
		exit($str);
	}
}

// session管理函数
function session($name, $value = '') {
	$prefix = "myf";
	if ('' === $value) {
		if (0 === strpos($name, '[')) {// session 操作
			if ('[pause]' == $name) {// 暂停session
				session_write_close();
			} elseif ('[start]' == $name) {// 启动session
				session_start();
			} elseif ('[destroy]' == $name) {// 销毁session
				$_SESSION = array();
				session_unset();
				session_destroy();
			} elseif ('[regenerate]' == $name) {// 重新生成id
				session_regenerate_id();
			}
		} elseif (0 === strpos($name, '?')) {// 检查session
			$name = substr($name, 1);
			if ($prefix) {
				return isset($_SESSION[$prefix][$name]);
			} else {
				return isset($_SESSION[$name]);
			}
		} elseif (is_null($name)) {// 清空session
			if ($prefix) {
				unset($_SESSION[$prefix]);
			} else {
				$_SESSION = array();
			}
		} elseif ($prefix) {// 获取session
			return $_SESSION[$prefix][$name];
		} else {
			return $_SESSION[$name];
		}
	} elseif (is_null($value)) {// 删除session
		if ($prefix) {
			unset($_SESSION[$prefix][$name]);
		} else {
			unset($_SESSION[$name]);
		}
	} else {// 设置session
		if ($prefix) {
			if (!is_array($_SESSION[$prefix])) {
				$_SESSION[$prefix] = array();
			}
			$_SESSION[$prefix][$name] = $value;
		} else {
			$_SESSION[$name] = $value;
		}
	}
}

// Cookie 设置、获取、删除
function cookie($name, $value = '', $option = null) {
	// 默认设置
	$config = array('prefix' => "myf", // cookie 名称前缀
	'expire' => '36000', // cookie 保存时间
	'path' => '.', // cookie 保存路径
	'domain' => null, // cookie 有效域名
	);
	// 参数设置(会覆盖黙认设置)
	if (!empty($option)) {
		if (is_numeric($option))
			$option = array('expire' => $option);
		elseif (is_string($option))
			parse_str($option, $option);
		$config = array_merge($config, array_change_key_case($option));
	}
	// 清除指定前缀的所有cookie
	if (is_null($name)) {
		if (empty($_COOKIE))
			return;
		// 要删除的cookie前缀，不指定则删除config设置的指定前缀
		$prefix = empty($value) ? $config['prefix'] : $value;
		if (!empty($prefix)) {// 如果前缀为空字符串将不作处理直接返回
			foreach ($_COOKIE as $key => $val) {
				if (0 === stripos($key, $prefix)) {
					setcookie($key, '', time() - 3600, $config['path'], $config['domain']);
					unset($_COOKIE[$key]);
				}
			}
		}
		return;
	}
	$name = $config['prefix'] . $name;
	if ('' === $value) {
		return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
		// 获取指定Cookie
	} else {
		if (is_null($value)) {
			setcookie($name, '', time() - 3600, $config['path'], $config['domain']);
			unset($_COOKIE[$name]);
			// 删除指定cookie
		} else {
			// 设置cookie
			$expire = !empty($config['expire']) ? time() + intval($config['expire']) : 0;
			setcookie($name, $value, $expire, $config['path'], $config['domain']);
			$_COOKIE[$name] = $value;
		}
	}
}

// 获取客户端IP地址
function get_client_ip() {
	static $ip = NULL;
	if ($ip !== NULL)
		return $ip;
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
		$pos = array_search('unknown', $arr);
		if (false !== $pos)
			unset($arr[$pos]);
		$ip = trim($arr[0]);
	} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (isset($_SERVER['REMOTE_ADDR'])) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	// IP地址合法验证
	$ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';
	return $ip;
}

/**
 * 获取Integer变量
 * @param String $name
 * @return NULL|number
 */
function getInteger($name) {
	$value = $_REQUEST[$name];
	if (empty($value)) {
		return null;
	} else {
		return toInteger($value);
	}
}

/**
 * 获取安全的字符串
 * @param String $name
 * @return NULL|Ambigous <number, mixed>
 */
function getSaveString($name) {
	$value = $_REQUEST[$name];
	if (empty($value)) {
		return null;
	} else {
		return htmlspecialchars(filterSql($value));
	}
}

/**
 * 获取没有空格的字符串
 */
function getNoBlankString($name) {
	$value = $_REQUEST[$name];
	if (empty($value)) {
		return null;
	} else {
		return htmlspecialchars(str_replace(" ", "", $value));
	}
}

/**
 * post请求
 */
function post($name){
	$value = $_POST[$name];
	return htmlspecialchars($value);
}

/**
 * get请求
 */
function get($name){
	$value = $_GET[$name];
	return htmlspecialchars($value);
}

/**
 * 转换成Integer类型
 * @param Object $str
 */
function toInteger($str) {
	return (int)$str;
}

/**
 * 转换成String类型
 * @param Object $str
 */
function toString($str) {
	return (string)$str;
}

/**
 * 转换成Double类型
 * @param Object $str
 */
function toDouble($str) {
	return (double)$str;
}

/**
 * 获取随即字符串
 */
function getRandStr(){
	return md5(rand(1,100));
}

/**
 * 获取当前时间毫秒数
 */
function getMillisecond() {
	list($s1, $s2) = explode(' ', microtime());
	return (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
}

/**
 * 过滤sql字符串
 * @param string $sql_str
 * @return number
 */
function filterSql($str) {
	// $str = str_replace("and","",$str);
	// $str = str_replace("execute","",$str);
	// $str = str_replace("update","",$str);
	// $str = str_replace("count","",$str);
	// $str = str_replace("chr","",$str);
	// $str = str_replace("mid","",$str);
	// $str = str_replace("master","",$str);
	// $str = str_replace("truncate","",$str);
	// $str = str_replace("char","",$str);
	// $str = str_replace("declare","",$str);
	// $str = str_replace("select","",$str);
	// $str = str_replace("create","",$str);
	// $str = str_replace("delete","",$str);
	// $str = str_replace("insert","",$str);	$str = str_replace("'", "", $str);
	$str = str_replace("\"", "", $str);
	$str = str_replace(" ", "", $str);
	$str = str_replace("(", "", $str);
	$str = str_replace(")", "", $str);
	// $str = str_replace("or","",$str);	$str = str_replace("=", "", $str);
	$str = str_replace("*", "", $str);
	return $str;
}

/**
 * 读取config文件
 * @param String $name
 */
function C($name = null) {
	global $_config;
	if (!strpos($name, '.')) {
		return isset($_config[$name]) ? $_config[$name] : null;
	}
	// 二维数组设置和获取支持
	$name = explode('.', $name);
	return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : null;
}

/**
	 * 截取字符串
	 * @str 源内容
	 * @start_str 起始字符串
	 * @end_str 结束字符串
	 */
function getStr($str,$start_str,$end_str){
	$start_pos = strpos($str,$start_str)+strlen($start_str);
	$left_str = substr($str,0,$start_pos);
	$right_str = str_replace($left_str,"",$str); 
	$end_pos = strpos($right_str,$end_str,1);
	$content = substr($right_str,0,$end_pos);
	return $content;
}

/**
 * 获取当前程序的根URL
 */
function getBaseURL() {
	$pageURL = 'http';
	$pageURL .= "://";
	$sitePath = dirname($_SERVER['SCRIPT_NAME']);
	if ($sitePath == "/"||$sitePath=="\\") {
		$sitePath = "";
	}

	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $sitePath;
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $sitePath;
	}
	return $pageURL;
}

/**
 * 获取程序根目录
 */
function getBaseName() {
	$sitePath = dirname($_SERVER['SCRIPT_NAME']);
	if ($sitePath == "/"||$sitePath=="\\") {
		$sitePath = "";
	}
	return $sitePath;
}

/**
 * 获取项目名称
 */
function getProjectName() {
	$sysPath = dirname(dirname(__FILE__));
	$sysPath = str_replace("\\", "/", $sysPath);
	
	$scriptFileName = $_SERVER["SCRIPT_FILENAME"];
	$scriptFileName = str_replace("\\", "/", $scriptFileName);
	
	$name = str_replace($sysPath, "", $scriptFileName);
	$sitePath = dirname($_SERVER['SCRIPT_NAME']);
	if ($sitePath == "/"||$sitePath=="\\") {
		$sitePath = "";
	} else {
		$sitePath = str_replace(dirname($name), "", $sitePath);
	}
	return $sitePath;
}

/**
 * 获取项目目录
 */
function getProjectURL() {
	$sysPath = dirname(dirname(__FILE__));	$sysPath = str_replace("\\", "/", $sysPath);
	if(strpos($sysPath,":")){
		$sysPath = ucfirst($sysPath);
	}else{
		if(substr($sysPath, 0,6)=="/data/"){
			$sysPath = substr($sysPath, 6,strlen($sysPath)-6);
		}
	}
	$scriptFileName = $_SERVER["SCRIPT_FILENAME"];
	$scriptFileName = str_replace("\\", "/", $scriptFileName);
	if(strpos($scriptFileName, ":")){
		$scriptFileName = ucfirst($scriptFileName);
	}else{
		if(substr($sysPath, 0,5)=="/usr/"){
			$sysPath = substr($sysPath, 5,strlen($sysPath)-5);
		}
	}
	
	$name = str_replace($sysPath, "", $scriptFileName);
	$sitePath = dirname($_SERVER['SCRIPT_NAME']);
	if ($sitePath == "/"||$sitePath=="\\") {
		$sitePath = "";
	} else {
		$sitePath = str_replace(dirname($name), "", $sitePath);
	}
	$pageURL = 'http';

	$pageURL .= "://";

	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $sitePath;
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"] . $sitePath;
	}
	return $pageURL;
}

//循环创建目录
function create_folders($dir) {
	return is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, 0777));
}

/**
 * 获取文件名称
 */
function getArcName($id){
	$md5 = md5($id);
	$arcname = substr($md5, 0,20);
	return $arcname;
}
//获取当前模板
function getTheme(){
	$theme = getNoBlankString("t");
	if(empty($theme)){
		$theme = C("THEME");
	}
	if(empty($theme)){
		$theme = "default";
	}
	return $theme;
}
