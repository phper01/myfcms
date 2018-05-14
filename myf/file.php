<?php
// +----------------------------------------------------------------------
// | MyfPHP 闵益飞PHP MVC框架  -- 文件读写类
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class File {

	/**
	 * 写文件
	 * @filename 文件路径
	 * @content 内容
	 */
	public function write($filename, $content) {
		$dir = dirname($filename);
		is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, 0777));

		@$fp = fopen($filename, "w");
		if (!$fp) {
			return false;
		} else {
			fwrite($fp, $content);
			fclose($fp);
			return true;
		}
	}

	/**
	 * 读取文件内容
	 */
	public function read($filename) {
		@$fp = fopen($filename, "r");
		if (!$fp) {
			return null;
		} else {
			$content = fread($fp, filesize($filename));
			fclose($fp);
			return $content;
		}
	}

	/**
	 * 删除文件
	 */
	public function delete($filename) {
		$res = @unlink($filename);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 删除目录
	 */
	public static function deltree($pathdir) {
		if (File::is_empty_dir($pathdir))//如果是空的
		{
			@rmdir($pathdir);
			//直接删除
		} else {//否则读这个目录，除了.和..外
			$d = dir($pathdir);
			while ($a = $d -> read()) {
				if (is_file($pathdir . '/' . $a) && ($a != '.') && ($a != '..')) {@unlink($pathdir . '/' . $a);
				}
				//如果是文件就直接删除
				if (is_dir($pathdir . '/' . $a) && ($a != '.') && ($a != '..')) {//如果是目录
					if (!File::is_empty_dir($pathdir . '/' . $a))//是否为空
					{
						//如果不是，调用自身，不过是原来的路径+他下级的目录名
						File::deltree($pathdir . '/' . $a);
					}
					if (File::is_empty_dir($pathdir . '/' . $a)) {//如果是空就直接删除
						@rmdir($pathdir . '/' . $a);
					}
				}
			}
			$d -> close();
			@rmdir($pathdir);
		}
	}

	public static function is_empty_dir($pathdir) {
		//判断目录是否为空，我的方法不是很好吧？只是看除了.和..之外有其他东西不是为空
		$d = @opendir($pathdir);
		$i = 0;
		while ($a = @readdir($d)) {
			$i++;
		}
		@closedir($d);
		if ($i > 2) {
			return false;
		} else
			return true;
	}

	/**
	 * 读取目录下的文件名
	 */
	public static function filelist($dir, $pattern = "") {
		$arr = array();
		$dir_handle = opendir($dir);
		if ($dir_handle) {
			// 这里必须严格比较，因为返回的文件名可能是“0”
			while (($file = readdir($dir_handle)) !== false) {
				if ($file === '.' || $file === '..') {
					continue;
				}
				$tmp = realpath($dir . '/' . $file);
				if (is_dir($tmp)) {
					$retArr = File::filelist($tmp, $pattern);
					if (!empty($retArr)) {
						$arr[] = $file;
					}
				} else {
					if ($pattern === "" || preg_match($pattern, $tmp)) {
						$arr[] = $file;
					}
				}
			}
			closedir($dir_handle);
		}
		return $arr;
	}

	public static function readCache2($filename) {
		$file = dirname(APP_SYS_PATH) . "/runtime/data/" . $filename . '.php';
		if (file_exists($file)) {
			$row =
			include $file;
			return $row;
		}
		return array();
	}

	/**
	 * 写入缓存
	 *
	 * @param string $filename
	 * @param       mixed   $data   缓存内容
	 * @return      bool            是否写入成功
	 */
	public static function writeCache($filename, $data) {
		$file = dirname(APP_SYS_PATH) . "/runtime/data/" . $filename . '.php';
		return File::writeArray($file, $data);
	}

	/**
	 * 写入数组
	 */
	public static function writeArray($file, $data) {
		$dir = dirname($file);
		is_dir($dir) or (create_folders(dirname($dir)) and mkdir($dir, 0777));
		$data = '<?php return ' . var_export($data, TRUE) . '; ?>';
		return file_put_contents($file, $data);
	}

	/**
	 * 读取缓存
	 *
	 * @access      public
	 * @return      mixed   如果读取成功返回缓存内容, 否则返回NULL
	 */
	public static function readCache($filename) {
		$file = dirname(APP_SYS_PATH) . "/runtime/data/" . $filename . '.php';
		if (file_exists($file)) {

			$row =
			include $file;
			return $row;
		}
		return array();
	}

}
?>