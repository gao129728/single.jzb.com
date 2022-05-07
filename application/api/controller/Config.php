<?php

namespace app\api\controller;
use think\Db;

class Config extends Base
{
    /**
     * 获取配置参数
     */
    public function index() {
       $config = $this->getConfig();
        if(!empty($config['applet_logo'])) $config['applet_logo'] = $this->imgPath.$config['applet_logo'];
        $web_style = Db::name('web_config')->where('name','web_site_style')->value('value');
        $config['webstyle'] = 'color'.$web_style;
        $lists = Db::name('applet_nav')->field('name,cateId')->where('status=1')->order('sortnum asc, id asc')->select();

        $data = [
            'config' => $config,
            'leftMenu' => $lists
        ];
        return ['code'=>1, 'data'=>$data];
    }

    /**
     * 访问统计
     */
    public function counter()
    {
        $data['source'] = "";
        $data['id'] = Db::name('counter')->max('id') + 1;
        $data['client'] = 3;
        $data['ip'] = get_client_ip();
        $data['create_time'] = time();
        $data['state'] = 0;
        Db::name('counter')->insert($data);
    }
}