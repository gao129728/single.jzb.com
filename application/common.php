<?php
use think\Db;

/**
 * 字符串截取，支持中文和其他编码
 */
function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = true) {
	if (function_exists("mb_substr"))
		$slice = mb_substr($str, $start, $length, $charset);
	elseif (function_exists('iconv_substr')) {
		$slice = iconv_substr($str, $start, $length, $charset);
		if (false === $slice) {
			$slice = '';
		}
	} else {
		$re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
		$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
		$re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
		$re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
		preg_match_all($re[$charset], $str, $match);
		$slice = join("", array_slice($match[0], $start, $length));
	}
	return $suffix ? $slice . '...' : $slice;
}


//生成网址的二维码 返回图片地址
function Qrcode($token, $url, $size = 8){ 

    $md5 = md5($token);
    $dir = date('Ymd'). '/' . substr($md5, 0, 10) . '/';
    $patch = 'qrcode/' . $dir;
    if (!file_exists($patch)){
        mkdir($patch, 0755, true);
    }
    $file = 'qrcode/' . $dir . $md5 . '.png';
    $fileName =  $file;
    if (!file_exists($fileName)) {

        $level = 'L';
        $data = $url;
        QRcode::png($data, $fileName, $level, $size, 2, true);
    }
    return $file;
}


/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name) {
    $result = false;
    if(is_dir($dir_name)){
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}



//时间格式化1
function formatTime($time) {
    $now_time = time();
    $t = $now_time - $time;
    $mon = (int) ($t / (86400 * 30));
    if ($mon >= 1) {
        return '一个月前';
    }
    $day = (int) ($t / 86400);
    if ($day >= 1) {
        return $day . '天前';
    }
    $h = (int) ($t / 3600);
    if ($h >= 1) {
        return $h . '小时前';
    }
    $min = (int) ($t / 60);
    if ($min >= 1) {
        return $min . '分钟前';
    }
    return '刚刚';
}

//时间格式化2
function pincheTime($time) {
     $today  =  strtotime(date('Y-m-d')); //今天零点
      $here   =  (int)(($time - $today)/86400) ; 
      if($here==1){
          return '明天';  
      }
      if($here==2) {
          return '后天';  
      }
      if($here>=3 && $here<7){
          return $here.'天后';  
      }
      if($here>=7 && $here<30){
          return '一周后';  
      }
      if($here>=30 && $here<365){
          return '一个月后';  
      }
      if($here>=365){
          $r = (int)($here/365).'年后'; 
          return   $r;
      }
     return '今天';
}

/*
 *	功能：删除单个文件
 *	$path 文件路径, 可为相对路径或绝对路径
*/
function deleteFile($file, $path)
{
    if (empty($file))
    {
        return;
    }

    $file = $path . $file;

    if (file_exists($file))
    {
        @unlink($file);
    }else{
        echo $file;
        exit;
    }
}

/*
 *	功能：删除多个文件
 *	$path 文件路径, 可为相对路径或绝对路径
 *	多个文件间以逗号“,”隔开
*/
function deleteFiles($file, $path)
{
    if (empty($file))
    {
        return;
    }

    if (is_string($file))
    {
        $file = explode(",", $file);
    }

    if (is_array($file))
    {
        foreach($file as $value)
        {
            if ($value != "" && file_exists($path . $value))
            {
                @unlink($path . $value);
            }
        }
    }
}

/*
 *	创建文件夹
*/
function mkFolder($path) {
    if(!is_readable($path)) {
        is_file($path) or mkdir($path,0777,true);
    }
}

/*
 *	得到指定文件的扩展名
*/
function getFileExt($filename = "")
{
    $dot = strrpos($filename, ".");
    return substr($filename, $dot + 1);
}

/*
 *	利用UNIX时间戳返回一个唯一的文件名，不含后缀
*/
function getTmpName()
{
    list($a, $b) = explode(" ", microtime());
    return (string)$b . (string)substr($a, 2);
}

/*
 *	字符串加密解密
*/
function urlsafe_b64encode($string) {
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
}

function urlsafe_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}

/**
 * 获取客户端IP地址
 * @return string
 */
function get_client_ip() {
    if(getenv('HTTP_CLIENT_IP')){
        $client_ip = getenv('HTTP_CLIENT_IP');
    } elseif(getenv('HTTP_X_FORWARDED_FOR')) {
        $client_ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif(getenv('REMOTE_ADDR')) {
        $client_ip = getenv('REMOTE_ADDR');
    } else {
        $client_ip = $_SERVER['REMOTE_ADDR'];
    }
    return $client_ip;
}
/**
 * 获取服务器端IP地址
 * @return string
 */
function get_server_ip() {
    if (isset($_SERVER)) {
        if($_SERVER['SERVER_ADDR']) {
            $server_ip = $_SERVER['SERVER_ADDR'];
        } else {
            $server_ip = $_SERVER['LOCAL_ADDR'];
        }
    } else {
        $server_ip = getenv('SERVER_ADDR');
    }
    return $server_ip;
}

/**
 * 字符串截取，截取标题
 */
function leftstr($str, $len=0, $from = 0, $ellipsis = '…')
{
    if($len<1){
        return $str;
    }else{
        $string = preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $from . '}' .
            '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len . '}).*#s', '$1', $str);
        if(count($string) > $len){
            $string .= $ellipsis;
        }
        return $string;
    }
}

/**
 * 内容截取，去除html标签
 */
function leftstr_html($string, $length = 0, $ellipsis = '…')
{
    $string = strip_tags($string);
    $string = preg_replace('/\n/is', '', $string);
    $string = preg_replace('/ |　/is', '', $string);
    $string = preg_replace('/&nbsp;/is', '', $string);
    preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $string);
    if (is_array($string) && !empty($string[0])) {
        if (is_numeric($length) && $length) {
            if(count($string[0]) <= $length){
                $string = join('', array_slice($string[0], 0));
            }
            else
            {
                $string = join('', array_slice($string[0], 0, $length)).$ellipsis;
            }
        } else {
            $string = implode('', $string[0]);
        }
    } else {
        $string = '';
    }
    return $string;
}

//防止注入
function filter_escape_string($param) {
    if($param && is_array($param)){
        foreach($param as $key=>$val){
            if(is_string($val)) $param[$key] = addslashes($val);
        }
    }
    else{
        $param = addslashes($param);
    }
    return $param;
}