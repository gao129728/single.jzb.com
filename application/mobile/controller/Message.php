<?php
namespace app\mobile\controller;
use app\mobile\model\BaseModel;
use think\Db;

class Message extends Base
{
    public function index()
    {
        $baseName = '在线留言';
        $this->assign('baseName', $baseName);

        $bannerId = 22;
        $banner_config = $this->getBannerConfig($bannerId);
        $map['bannerId'] = $bannerId;
        $map['state'] = 1;
        $banner_img = $this->getBannerImage($map, $banner_config['switch']);
        $this->assign('banner_config', $banner_config);
        $this->assign('banner_img', $banner_img);
        $this->assign('inside_banner', '');

        $this->assign([
            'web_site_title' => $baseName.' - '.$this->config['wap_site_title'],
            'web_site_keyword' => $this->config['wap_site_keyword'],
            'web_site_description' => $this->config['wap_site_description'],
            'navCur' => 'message'
        ]);

        return $this->fetch();
    }
}
