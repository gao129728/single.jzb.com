<?php
namespace app\admin\controller;

use think\Controller;

class Ueditor extends Base
{
    public function index() {
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");

        $ueditor_path = PUBLIC_PATH .'/static/admin/ueditor/php/';
        $PathFormat = '/uploads';

        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents($ueditor_path."config.json")), true);
        $CONFIG['imagePathFormat'] = $PathFormat.$CONFIG['imagePathFormat'];
        $CONFIG['scrawlPathFormat'] = $PathFormat.$CONFIG['scrawlPathFormat'];
        $CONFIG['snapscreenPathFormat'] = $PathFormat.$CONFIG['snapscreenPathFormat'];
        $CONFIG['catcherPathFormat'] = $PathFormat.$CONFIG['catcherPathFormat'];
        $CONFIG['videoPathFormat'] = $PathFormat.$CONFIG['videoPathFormat'];
        $CONFIG['filePathFormat'] = $PathFormat.$CONFIG['filePathFormat'];
        $CONFIG['imageManagerListPath'] = $PathFormat.$CONFIG['imageManagerListPath'];
        $CONFIG['fileManagerListPath'] = $PathFormat.$CONFIG['fileManagerListPath'];

        $action = $_GET['action'];

        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;

            /* 上传图片 */
            case 'uploadimage':
                /* 上传涂鸦 */
            case 'uploadscrawl':
                /* 上传视频 */
            case 'uploadvideo':
                /* 上传文件 */
            case 'uploadfile':
                $result = include($ueditor_path."action_upload.php");
                break;
            /* 列出图片 */
            case 'listimage':
                $result = include($ueditor_path."action_list.php");
                break;
            /* 列出文件 */
            case 'listfile':
                $result = include($ueditor_path."action_list.php");
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                $result = include($ueditor_path."action_crawler.php");
                break;

            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }

}