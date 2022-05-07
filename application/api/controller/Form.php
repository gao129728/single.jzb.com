<?php

namespace app\api\controller;
use app\admin\model\MessageModel;
use app\admin\model\JoinModel;
use app\admin\model\JobModel;
use think\Controller;
use think\Db;

class Form extends Base
{
    //保存表单提交信息
    public function save()
    {
        $param = input('post.','','trim');
        $param = filter_escape_string($param);

        $flag['code'] = 0;
        $param['state'] = 0;
        if($param['formType'] == 0){  //在线留言
            $param['sortnum'] = Db::name('message')->max('sortnum') + 10;
            $param['ip'] = get_client_ip();
            $model = new MessageModel();
            $flag = $model->insertMessage($param);
        }elseif($param['formType'] == 1){ //人才招聘
            $param['sortnum'] = Db::name('job')->max('sortnum') + 10;
            $model= new JobModel();
            $flag = $model->insertJob($param);
        }elseif($param['formType'] == 2){  //加盟申请
            if($param['region']){
                $param['province'] = $param['region'][0];
                $param['city'] = $param['region'][1];
                $param['county'] = $param['region'][2];
            }
            $param['sortnum'] = Db::name('join')->max('sortnum') + 10;
            $param['ip'] = get_client_ip();
            $model = new JoinModel();
            $flag = $model->insertJoin($param);
        }

        if ($flag['code'] > 0) {
            return json(['code' => 1, 'msg' => '提交成功']);
        } else {
            return json(['code' => 0, 'msg' => '提交失败，请稍后再试']);
        }
    }

}