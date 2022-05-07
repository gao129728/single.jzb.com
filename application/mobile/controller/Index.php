<?php
namespace app\mobile\controller;
use app\mobile\model\IndexModel;
use think\Db;

class Index extends Base
{
    public function index(){
        $bannerId = 21;
        $banner_config = $this->getBannerConfig($bannerId);
        $map['bannerId'] = $bannerId;
        $map['state'] = 1;
        $this->assign('banner_img',$this->getBannerImage($map, $banner_config['switch']));
        $this->assign('banner_config',$banner_config);
        $this->assign([
            'web_site_title'  => $this->config['wap_site_title'],
            'web_site_keyword' => $this->config['wap_site_keyword'],
            'web_site_description' => $this->config['wap_site_description'],
            'navCur' => 'index'
        ]);

        $index_cate = Db::name('other_list')->where(['otherId'=>3,'status'=>1])->order('sortnum asc, id asc')->select();
        $this->assign('index_cate',$index_cate);

        $indexModel = new IndexModel();
        $module_list = $indexModel->getModuleList();
        foreach($module_list as $k => $v){
            if($v['module_style'] != 4){
                $moduleParam = explode('|', $v['module_param']);
                $limit = $moduleParam[0];
                $type = $v['module_style'] == 3? 1:0;
                $map_article = [];
                if($v['module_style'] == 1|| ($v['module_style'] == 2 && $moduleParam[5]==1) || ($v['module_style'] == 3 && $moduleParam[2]==1) || $v['module_style'] == 5){
                    $map_article['a.photo'] = ['<>',''];
                }
                if($v['titleStyle'] == 2){
                    $title_attr = explode('|',$v['title_source']);
                    $v['cate_article_list'] = [];
                    foreach($title_attr as $j3 => $arr3){
                        $tit_arr = explode('&',$arr3);
                        $cate = $indexModel->getOneCate($tit_arr[1]);
                        $v['cate_article_list'][$j3]['url'] = wapCateUrl($cate['id'], $cate['website'], $cate['catedir']);
                        $v['cate_article_list'][$j3]['id'] = $tit_arr[1];
                        $v['cate_article_list'][$j3]['name'] = $tit_arr[0];
                        $cate_id_child = implode(',', $this->get_child_cate($tit_arr[1]));
                        $map_article['a.cate_id'] = ['in',''.$cate_id_child.''];
                        $v['cate_article_list'][$j3]['art_list'] = $indexModel->getArticleList($map_article,$limit,$type);
                        $v['cate_article_list'][$j3]['art_list_cnt'] = count($v['cate_article_list'][$j3]['art_list']);
                    }
                }else{
                    $cate_id_child = implode(',', $this->get_child_cate($v['cateId']));
                    $map_article['a.cate_id'] = ['in',''.$cate_id_child.''];
                    $v['art_list'] = $indexModel->getArticleList($map_article,$limit,$type);
                    $v['art_list_cnt'] = count($v['art_list']);
                }
                $v['moduleParam'] = $moduleParam;
            }
            $module_list[$k] = $v;
        }
        $this->assign('module_list',$module_list);
        return $this->fetch();
    }

    public function get_child_cate($cid, $lvl=0)
    {
        $arr = [];
        $indexModel = new IndexModel();
        $cate = $indexModel->getCateId(['parent_id' => $cid]);
        if (count($cate) > 0) {
            $arr = $cate;
            foreach($cate as $v){
                $arr = array_merge($arr, $this->get_child_cate($v, $lvl+1));
            }
        }
        if($lvl == 0) array_push($arr, $cid);
        return $arr;
    }

}
