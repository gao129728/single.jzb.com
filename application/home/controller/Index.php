<?php
namespace app\home\controller;
use app\home\model\IndexModel;
use app\home\model\BaseModel;
use think\Db;

class Index extends Base
{
    public function index(){

        $bannerId = 1;
        $banner_config = $this->getBannerConfig($bannerId);
        $map['bannerId'] = $bannerId;
        $map['state'] = 1;
        $this->assign('banner_img',$this->getBannerImage($map, $banner_config['switch']));
        $this->assign('banner_config',$banner_config);
        $this->assign([
            'web_site_title'  => $this->config['web_site_title'],
            'web_site_keyword' => $this->config['web_site_keyword'],
            'web_site_description' => $this->config['web_site_description'],
            'navCur' => 'index'
        ]);
        $baseModel = new BaseModel();
        //广告列表
        $adverList = $baseModel->getAdverList(['status'=>1]);
        $this->assign('adverList',$adverList);
        //热门搜索
        if($this->config['web_site_search']){
            $hot_search = $baseModel->getOtherList(['otherId'=>1,'status'=>1]);
            $this->assign('hot_search',$hot_search);
        }    

        $indexModel = new IndexModel();
        $structureList = $indexModel->getStructureList(['status'=>1]);
        $map_module['state'] = 1;
        foreach($structureList as $key => $val){
            $map_module['module_class'] = $val['id'];
            $val['module_list'] = $indexModel->getModuleList($map_module);
            if($val['module_list']){
                $module_cnt = count($val['module_list']);
                foreach($val['module_list'] as $k => $v){
                    $v['width'] = $v['width']? $v['width'].'px':'100%';
                    $v['float'] = 'fl';
                    if($module_cnt > 1 && $k>0){
                        $v['float'] = ($k+1==$module_cnt)? "fr" : "fl MgL";
                    }
                    $source_cate = $indexModel->getOneCate($v['cateId']);
                    if(!empty($source_cate)){
                        $v['cate_url'] = getCateUrl($source_cate['id'], $source_cate['website'], $source_cate['catedir']);
                    }else{
                        $v['cate_url'] =  '';
                    }
                    if($v['module_style'] != 4){
                        $moduleParam = explode('|', $v['module_param']);
                        if($v['module_style'] == 5){
                            $limit = $moduleParam[0]? $moduleParam[0]:'';
                            $map_art = [];
                            $map_art['status'] = 1;
                            if($moduleParam[1]){
                                $map_art['id'] = ['in', ''.$moduleParam[1].''];
                            }else{
                                $map_art['parent_id'] = $v['cateId'];
                            }
                            $cateList = $baseModel->getNavCate($map_art, $limit);
                            $v['cate_article_list'] = [];
                            foreach($cateList as $j2 => $arr2){
                                $v['cate_article_list'][$j2]['id'] = $arr2['id'];
                                $v['cate_article_list'][$j2]['name'] = $arr2['name'];
                                $v['cate_article_list'][$j2]['url'] = getCateUrl($arr2['id'], $arr2['website'], $arr2['catedir']);
                                $cate_id_child = implode(',', $this->get_child_cate($arr2['id']));
                                $v['cate_article_list'][$j2]['art_list'] = $indexModel->getArticleList(['a.cate_id'=>['in',''.$cate_id_child.''],'a.photo'=>['<>','']],$moduleParam[2],0);
                            }
                        }else{
                            $limit = $moduleParam[0];
                            $type = $v['module_style'] == 3? 1:0;
                            $map_article = [];
                            if($v['module_style'] == 1|| ($v['module_style'] == 2 && $moduleParam[5]==1) || ($v['module_style'] == 3 && $moduleParam[4]==1) || $v['module_style'] == 6){
                                $map_article['a.photo'] = ['<>',''];
                            }
                            if($v['titleStyle'] == 3){
                                $title_attr = explode('|',$v['title_source']);
                                $v['cate_article_list'] = [];
                                foreach($title_attr as $j3 => $arr3){
                                    $tit_arr = explode('&',$arr3);
                                    $cate = $indexModel->getOneCate($tit_arr[1]);
                                    $v['cate_article_list'][$j3]['url'] = getCateUrl($cate['id'], $cate['website'], $cate['catedir']);
                                    $v['cate_article_list'][$j3]['id'] = $tit_arr[1];
                                    $v['cate_article_list'][$j3]['name'] = $tit_arr[0];
                                    $cate_id_child = implode(',', $this->get_child_cate($tit_arr[1]));
                                    $map_article['a.cate_id'] = ['in',''.$cate_id_child.''];
                                    $v['cate_article_list'][$j3]['art_list'] = $indexModel->getArticleList($map_article,$limit,$type);
                                }
                            }else{
                                $cate_id_child = implode(',', $this->get_child_cate($v['cateId']));
                                $map_article['a.cate_id'] = ['in',''.$cate_id_child.''];
                                $v['art_list'] = $indexModel->getArticleList($map_article,$limit,$type);
                            }
                        }
                        $v['moduleParam'] = $moduleParam;
                    }
                    $val['module_list'][$k] = $v;
                }
            }
            $structureList[$key] = $val;
        }
        $this->assign('structureList',$structureList);
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
