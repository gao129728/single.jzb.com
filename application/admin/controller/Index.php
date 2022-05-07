<?php

namespace app\admin\controller;
use app\admin\model\CounterModel;
use think\Config;
use think\Loader;
use think\Db;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('/index');
    }


    /**
     * [indexPage 后台首页]
     * @return [type] [description]
     *
     */
    public function indexPage()
    {
        $all_cate_cnt = Db::name('article_cate')->count();
        $this->assign('all_cate_cnt', $all_cate_cnt);

        $all_article_cnt = Db::name('article')->where('status>=0')->count();
        $this->assign('all_article_cnt', $all_article_cnt);

        $all_message_cnt = Db::name('message')->count();
        $this->assign('all_message_cnt', $all_message_cnt);

        $counterModel = new CounterModel();
        $all_counter_cnt = $counterModel->getCounterCnt([]);
        $this->assign('all_counter_cnt', $all_counter_cnt);

        $chart_date = [];
        for($i=11; $i>=0; $i--){
            if($i==0){
                $date = date('Y-m-d');
            }else{
                $date = date("Y-m-d",strtotime("-".$i." day"));
            }
            $chart_date[$i]['date'] = $date;
            $map["from_unixtime(create_time,'%Y-%m-%d')"] = $date;
            $chart_date[$i]['val'] = $counterModel->getCounterCnt($map);
        }
        $this->assign('chart_date',$chart_date);

        $info = array(
            'web_server' => $_SERVER['SERVER_SOFTWARE'],
            'onload'     => ini_get('upload_max_filesize'),
            'web_system'    => php_uname('s'),
            'phpversion' => phpversion(),
        );

        $website = array(
            'web_name' => Db::name('web_config')->where('name', 'web_site_name')->value('value'),
            'web_domain' => request()->domain(),
        );

        $this->assign('info',$info);
        $this->assign('website',$website);
        return $this->fetch('index');
    }


    /**
     * 清除缓存
     */
    public function clear() {
        if (delete_dir_file(CACHE_PATH) || delete_dir_file(TEMP_PATH)) {
            return json(['code' => 1, 'msg' => '清除缓存成功']);
        } else {
            return json(['code' => 0, 'msg' => '清除缓存失败']);
        }
    }

}
