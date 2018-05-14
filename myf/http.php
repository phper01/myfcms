<?php

// +----------------------------------------------------------------------
// | MyfPHP 闵益飞PHP MVC框架 -- http请求
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://www.minyifei.cn All rights reserved.
// +----------------------------------------------------------------------
// | 交流论坛：http://bbs.minyifei.cn
// +----------------------------------------------------------------------
class Http
{
	public static $debug = false;
	
    /**
     * 发起一个HTTP/HTTPS的请求
     * @param $url 接口的URL 
     * @param $params 接口参数   array('content'=>'test', 'format'=>'json');
     * @param $extheaders 扩展的包头信息
     * @param $method 请求类型    GET|POST
     * @param $multi 图片信息
     * @return string
     */
    public static function request( $url , $params = array(), $method = 'GET' , $headers = array(), $multi = false)
    {
        if(!function_exists('curl_init')) exit('Need to open the curl extension');
        $method = strtoupper($method);
        $ci = curl_init();
        curl_setopt($ci, CURLOPT_USERAGENT, 'tianji api php client');
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ci, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ci, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ci, CURLOPT_HEADER, false);
        switch ($method)
        {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, TRUE);
                if (!empty($params))
                {
                    if(Http::$debug){
                        $log = array("参数"=>$params);
                        dump($log);
                    }
                    if($multi)
                    {
                        foreach($multi as $key => $file)
                        {
                            $params[$key] = '@' . $file;
                        }
                        curl_setopt($ci, CURLOPT_POSTFIELDS, $params);
                        $headers[] = 'Expect: ';
                    }
                    else
                    {
                        curl_setopt($ci, CURLOPT_POSTFIELDS, http_build_query($params));
                    }
                }
                break;
            case 'DELETE':
            case 'GET':
                $method == 'DELETE' && curl_setopt($ci, CURLOPT_CUSTOMREQUEST, 'DELETE');
                if (!empty($params))
                {
                    $url = $url . (strpos($url, '?') ? '&' : '?')
                        . (is_array($params) ? http_build_query($params) : $params);
                }
                break;
        }
        curl_setopt($ci, CURLINFO_HEADER_OUT, TRUE );
        curl_setopt($ci, CURLOPT_URL, $url);
        if($headers)
        {
            curl_setopt($ci, CURLOPT_HTTPHEADER, $headers );
        }
		if(Http::$debug){
		    $log = array("请求URL"=>$url,"header"=>$headers);
			dump($log);
		}
        $response = curl_exec($ci);
        curl_close ($ci);
        return $response;
    }
}