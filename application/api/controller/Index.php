<?php
namespace app\api\controller;
use app\api\model\IndexModel;
use think\Db;

class Index extends Base
{
    public function cate_icon()
    {
        $map['otherId'] = 21;
        $map['status'] = 1;
        $lists = Db::name('other_list')->field('title,cateId,photo')->where($map)->order('sortnum asc, id asc')->select();
        if($lists){
            foreach ($lists as $k => $v) {
                if(!empty($v['photo'])) $v['photo'] = $this->imgPath.$v['photo'];
                $lists[$k] = $v;
            }
            return ['code' => 1, 'data' => $lists];
        }else{
            return ['code' => 0, 'msg' => '获取失败'];
        }
    }

    public function getModule()
    {
        $indexModel = new IndexModel();
        $module_list = $indexModel->getModuleList();
        foreach($module_list as $k => $v){
            if(!empty($v['bgphoto'])) $v['bgphoto'] = $this->imgPath.$v['bgphoto'];
            if($v['titleStyle'] ==2 && !empty($v['titPic'])) $v['titPic'] = $this->imgPath.$v['titPic'];
            if($v['module_style'] == 4){
                $module_content = [];
                if(!empty($v['module_content'])){
                    $adv_arr = explode(',', $v['module_content']);
                    foreach($adv_arr as $j2 => $arr2){
                        $module_content[$j2] = $this->imgPath.$arr2;
                    }
                }
                $v['module_content'] = $module_content;
            }else{
                $moduleParam = explode('|', $v['module_param']);
                $map_article = [];
                if($v['module_style'] == 1|| ($v['module_style'] == 2 && $moduleParam[5]==1) || ($v['module_style'] == 3 && $moduleParam[2]==1) || $v['module_style'] == 5){
                    $map_article['photo'] = ['<>',''];
                }
                $cate_id_child = implode(',', $this->get_child_cate($v['cateId']));
                $map_article['cate_id'] = ['in',''.$cate_id_child.''];
                if($v['module_style'] == 3){
                    $art_list = $indexModel->getOneArticle($map_article);
                    $art_list['content'] = leftstr_html($art_list['content'], $moduleParam[0]);
                    if(!empty($art_list['photo'])) $art_list['photo'] = $this->imgPath.$art_list['photo'];
                }else{
                    $art_list = $indexModel->getArticleList($map_article, $moduleParam[0]);
                    foreach($art_list as $j3 => $arr3){
                        if(!empty($arr3['photo'])) $arr3['photo'] = $this->imgPath.$arr3['photo'];
                        if($v['module_style'] == 1 && $moduleParam[3] ==1){
                            $arr3['title'] = leftstr($arr3['title'], $moduleParam[4]);
                        }else if($v['module_style'] == 2){
                            $arr3['title'] = leftstr($arr3['title'], $moduleParam[1]);
                            $arr3['date_day'] = date('m-d',$arr3['create_time']);
                            $arr3['date_year'] = date('Y',$arr3['create_time']);
                            if($moduleParam[3] ==1) $arr3['content'] = leftstr_html($arr3['content'], $moduleParam[4]);
                        }
                        $art_list[$j3] = $arr3;
                    }
                }
                $v['art_list'] = $art_list;
                $v['moduleParam'] = $moduleParam;
            }
            $module_list[$k] = $v;
        }
        return ['code'=>1, 'data'=>$module_list];
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
