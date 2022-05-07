<?php
namespace app\api\controller;
use app\api\controller\Banner;
use app\api\model\ArticleModel;
use think\Db;

class Category extends Base
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $id = (int)input('param.id');
        $cate = $articleModel->getOneCate(['id' => $id]);
        if (!$cate) {
            return ['code' => 0, 'msg' => '参数错误'];
        }
        $cate_arr = array_reverse($this->get_parent_cate($id));
        $navCur = $cate_arr[0]['id'];
        $childCnt = $articleModel->getCateCnt(['parent_id' => $id]);
        if ($childCnt == 0) {
            $cateCur = $cate;
        } else {
            $cate_arr = array_merge($cate_arr, $this->get_child_cate($id));
            $cateCur = end($cate_arr);
        }

        $banner = [];
        $applet_nav_cate = Db::name('applet_nav')->where('cateId = '.$navCur)->order('sortnum asc, id asc')->find();
        if($cateCur['cateStyle'] == 0 && $cateCur['cateParam'] == 1){
            $banner['switch'] = 0;
            $banner['img_list'] = '';
        }else{
            if(!empty($applet_nav_cate['photo'])){
                $banner['switch'] = 0;
                $banner['img_list'] =  $this->imgPath.$applet_nav_cate['photo'];
            }else{
                $bannerModel = new Banner();
                $flag = $bannerModel->inside();
                if($flag['code'] > 0){
                    $banner = $flag['data'];
                }
            }
        }

        $menu_arr = $this->get_sub_menu($cate_arr);
        $sub_menu = $menu_arr['menu_list'];
        $menu_lvl = count($sub_menu);
        $second_menu = $menu_lvl == 1 ? $sub_menu : $sub_menu[0]['child'];
        $third_menu  = $menu_lvl > 2 ? $sub_menu[1]['child'] : '';
        $four_menu   = $menu_lvl > 3 ? $sub_menu[2]['child'] : '';

        $data = [
            'navCur'=>$navCur,
            'curCateId'=>$cateCur['id'],
            'curTitle'=>$applet_nav_cate['name'],
            'banner'=>$banner,
            'secondnav'=>$second_menu,
            'thirdnav'=>$third_menu,
            'fournav'=>$four_menu,
            'secondCur'=>$menu_arr['secondCur'],
            'thirdCur'=>$menu_arr['thirdCur'],
            'fourCur'=>$menu_arr['fourCur']
        ];
        return ['code'=>1, 'data'=>$data];
    }

    public function changeCate()
    {
        $articleModel = new ArticleModel();
        $id = (int)input('param.id');
        $lvl = input('param.lvl');
        $secondCur = $thirdnav = $fournav = $thirdCur = $fourCur = '';
        if($lvl=='second'){
            $secondCur = $id;
            $thirdnav = $articleModel->getCateList(['parent_id' => $id]);
            if(count($thirdnav)>0){
                $thirdCur = $thirdnav[0]['id'];
                $fournav = $articleModel->getCateList(['parent_id' => $thirdCur]);
                if(count($fournav)>0){
                    $curCateId = $fourCur = $fournav[0]['id'];
                }else{
                    $curCateId = $thirdCur;
                }
            }else{
                $curCateId = $id;
            }
        }elseif($lvl=='third'){
            $thirdCur = $id;
            $fournav = $articleModel->getCateList(['parent_id' => $id]);
            if(count($fournav)>0){
                $curCateId = $fourCur = $fournav[0]['id'];
            }else{
                $curCateId = $id;
            }
        }else{
            $curCateId = $fourCur = $id;
        }

        return ['curCateId'=>$curCateId, 'secondCur'=>$secondCur, 'thirdnav'=>$thirdnav, 'fournav'=>$fournav,'thirdCur'=>$thirdCur,'fourCur'=>$fourCur];
    }

    public function getArticle()
    {
        $param = input('param.');
        $articleModel = new ArticleModel();
        $cate = $articleModel->getOneCate(['id' => $param['id']]);
        $map_list['cate_id'] = $param['id'];
        $map_list['status'] = 1;
        if($cate['cateStyle'] == 0 || $cate['cateStyle'] == 4){
            $cateParam = $cate['cateParam'];
            $allpage = 1;
            $lists = $articleModel->getOneArticle($map_list);
        }else{
            $applet_config = $this->getConfig();
            switch ($cate['cateStyle'])
            {
                case 1:
                    $cateParam = explode('|', $applet_config['newsParam']);
                    $titLen = $cateParam[1];
                    $contentLen = $cateParam[3];
                    break;
                case 2:
                    $cateParam = explode('|', $applet_config['picParam']);
                    $titLen = $cateParam[2];
                    $contentLen = $cateParam[5];
                    break;
                case 3:
                    $cateParam = explode('|', $applet_config['picTxtParam']);
                    $titLen = $cateParam[1];
                    $contentLen = $cateParam[2];
                    break;
                default:
                    $cateParam = '';
                    $titLen = 0;
                    $contentLen = 0;
            }
            $Nowpage = $param['page'] ? $param['page']:1;
            $limits = $cateParam[0];// 每页显示个数
            $count = $articleModel->getArticleCount($map_list);//计算总页面
            $allpage = intval(ceil($count / $limits));
            $lists = $articleModel->getArticleByWhere($map_list, $Nowpage, $limits);
            foreach($lists as $k=>$v){
                if(!empty($v['photo'])) $v['photo']= $this->imgPath.$v['photo'];
                $v['title'] = leftstr($v['title'], $titLen);
                $v['content'] = leftstr_html($v['content'], $contentLen);
                $v['create_time'] = date('Y-m-d',$v['create_time']);
                $lists[$k] = $v;
            }
        }
        if(!$lists) $lists = '';
        return ['allpage'=>$allpage, 'cateStyle'=>$cate['cateStyle'], 'cateParam'=>$cateParam, 'lists'=>$lists];
    }

    public function get_parent_cate($cid)
    {
        $arr = [];
        $articleModel = new ArticleModel();
        $cate = $articleModel->getOneCate(['id' => $cid]);
        if ($cate) {
            $cate['child'] = $articleModel->getCateList(['parent_id' => $cid]);
            $arr[] = $cate;
            $arr = array_merge($arr, $this->get_parent_cate($cate['parent_id']));
        }
        return $arr;
    }

    public function get_child_cate($cid)
    {
        $arr = [];
        $articleModel = new ArticleModel();
        $cate = $articleModel->getOneCate(['parent_id' => $cid, 'status'=>1]);
        if ($cate) {
            $cate['child'] = $articleModel->getCateList(['parent_id' => $cate['id']]);
            $arr[] = $cate;
            $arr = array_merge($arr, $this->get_child_cate($cate['id']));
        }
        return $arr;
    }

    public function get_sub_menu($category)
    {
        $secondCur = $thirdCur = $fourCur = '';
        $lvl = count($category) - 1;
        if($lvl == 0){
            $secondCur =  $category[0]['id'];
        }else {
            for ($i = $lvl; $i >= 0; $i--) {
                if ($category[$i]['child']) {
                    foreach ($category[$i]['child'] as $k => $v) {
                        if ($v['id'] == $category[$i + 1]['id']) {
                            switch ($i)
                            {
                                case 0:
                                    $secondCur = $v['id'];
                                    break;
                                case 1:
                                    $thirdCur = $v['id'];
                                    break;
                                case 2:
                                    $fourCur = $v['id'];
                                    break;
                            }
                        }
                        $category[$i]['child'][$k] = $v;
                    }
                }
            }
        }
        return ['menu_list'=>$category,'secondCur'=>$secondCur,'thirdCur'=>$thirdCur,'fourCur'=>$fourCur];
    }
}
