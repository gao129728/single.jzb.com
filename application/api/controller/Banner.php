<?php

namespace app\api\controller;
use app\api\model\BannerModel;
use think\Controller;
use think\Db;

class Banner extends Base
{
	/**
	 * 首页Banner
	 */
	public function index()
    {
		$bannerId = 23;
		$flag = $this->getBanner($bannerId);
		return ['code' => $flag['code'], 'data' => $flag['data']];
    }

	/**
	 * 内页Banner
	 */
	public function inside()
	{
		$bannerId = 24;
		$flag = $this->getBanner($bannerId);
		return ['code' => $flag['code'], 'data' => $flag['data']];
	}

	public function getBanner($bannerId)
	{
		$bannerModel = new BannerModel();
		$cate = $bannerModel->getOneCate($bannerId);
		if($cate){
			$banner = [];
			$banner['switch'] = $cate['switch'];
			$map['bannerId'] = $bannerId;
			$map['state'] = 1;
			$lists = $bannerModel->getBannerImage($map, $cate['switch']);
			if($cate['switch'] == 1){
				$banner['auto'] = $cate['auto'];
				$banner['effect_time'] = $cate['effect_time'];
				$banner['interval_time'] = $cate['interval_time'];
				$banner['circle_btn'] = $cate['circle_btn'];
				$banner['img_list'] = [];
				foreach($lists as $k => $v){
					if(!empty($v['photo'])) $banner['img_list'][$k] = $this->imgPath.$v['photo'];
				}
			}else{
				$banner['img_list'] = empty($lists['photo'])? '':$this->imgPath.$lists['photo'];
			}
			return ['code' => 1, 'data' => $banner];
		}else{
			return ['code' => 0, 'data' => ''];
		}
	}
}