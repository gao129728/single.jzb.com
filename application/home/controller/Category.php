<?php
namespace app\home\controller;
use app\home\model\BaseModel;
use app\home\model\ArticleModel;
use think\Db;

class Category extends Base
{
    public function _initialize()
    {
        parent::_initialize();
        $baseModel = new BaseModel();
        $adverList = $baseModel->getAdverList(['status'=>1,'ad_position'=>1]);
        $this->inside = $baseModel->getInsideConfig();
        $this->assign('adverList',$adverList);
        $this->assign('inside',$this->inside);
    }

    public function index()
    {
        $articleModel = new ArticleModel();
        $id = (int)input('param.id');
        $cate = $articleModel->getOneCate(['id' => $id]);
        if (!$cate) {
            $this->error('参数错误');
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
        $this->check_cate_auth($cateCur['id']);

        $current_title = $this->config['web_site_name'];
        $inside_banner = '';
        foreach ($cate_arr as $key => $val) {
            $val['url'] = getCateUrl($val['id'], $val['website'], $val['catedir']);
            $current_title = $val['name'] . ' - ' . $current_title;
            if (!empty($val['photo'])) $inside_banner = $val['photo'];

            $cate_arr[$key] = $val;
        };
        $web_site_keyword = empty($cateCur['keyword']) ? $this->config['web_site_keyword'] : $cateCur['keyword'];
        $web_site_description = empty($cateCur['description']) ? $this->config['web_site_description'] : $cateCur['description'];
        $web_site_title = empty($cateCur['seo_title']) ? $current_title : $cateCur['seo_title'];

        $map_list['cate_id'] = $cateCur['id'];
        $map_list['status'] = 1;
        if($cateCur['cateStyle'] == 0 || $cateCur['cateStyle'] == 4){
            $cateParam = $cateCur['cateParam'];
            $lists = $articleModel->getOneArticle($map_list);
        }else{
            $cateParam = explode('|', $cateCur['cateParam']);
            $count = $articleModel->getArticleCount($map_list);//计算总页面
            $lists = $articleModel->getArticleByWhere($map_list, $cateParam[0], $count, $cateCur['catedir']);
        }

        $banner_img = '';
        if($cateCur['cateStyle'] == 0 && $cateParam ==1){
            $inside_banner = '';
        }else{
            if (empty($inside_banner)) {
                $bannerId = 2;
                $banner_config = $this->getBannerConfig($bannerId);
                $map['bannerId'] = $bannerId;
                $map['state'] = 1;
                $banner_img = $this->getBannerImage($map, $banner_config['switch']);
                $this->assign('banner_config', $banner_config);
            }
        }
        $this->assign('inside_banner', $inside_banner);
        $this->assign('banner_img', $banner_img);

        if($cateCur['cateStyle'] == 0 && $cateParam ==1){
            $showSidebar = false;
        }else{
            if($this->inside['web_menu_style'] == 3){
                $sub_menu = $this->get_top_menu($cate_arr);
                $menu_lvl = count($sub_menu);
                $second_menu = $menu_lvl == 1 ? $sub_menu : $sub_menu[0]['child'];
                $third_menu  = $menu_lvl > 2 ? $sub_menu[1]['child'] : '';
                $four_menu   = $menu_lvl > 3 ? $sub_menu[2]['child'] : '';
                $this->assign([
                    'second_menu' => $second_menu,
                    'third_menu' => $third_menu,
                    'four_menu' => $four_menu
                ]);
            }else{
                $sub_menu = $this->get_sub_menu($cate_arr);
                $this->assign('sub_menu', $sub_menu);
            }
            $showSubMenu = (count($sub_menu) == 1 && count($sub_menu[0]['child']) == 0)? false : true;
            $sidebar_style = $this->inside['cate_sidebar_style'];
            if($sidebar_style){
                $this->assign('module_list',$this->get_sidebar_module());
            }
            if((!$showSubMenu && !$sidebar_style) or ($this->inside['web_menu_style'] == 3 && !$sidebar_style)){
                $showSidebar = false;
            }else{
                $showSidebar = true;
            }
            $this->assign('sidebar_style',$sidebar_style);
            $this->assign('showSubMenu', $showSubMenu);
        }
        $this->assign('showSidebar', $showSidebar);
        $this->assign('cate_arr', $cate_arr);
        $this->assign([
            'web_site_title' => $web_site_title,
            'web_site_keyword' => $web_site_keyword,
            'web_site_description' => $web_site_description,
            'navCur' => $navCur
        ]);

        $this->assign('cate', $cateCur);
        $this->assign('cateParam', $cateParam);
        $this->assign('lists', $lists);

        return $this->fetch();
    }

    public function detail()
    {
        $articleModel = new ArticleModel();
        $id = (int)input('param.id');
        $article = $articleModel->getOneArticle(['id'=>$id]);
        if (!$article) {
            $this->error('参数错误');
        }
        $data['id'] = $article['id'];
        $data['views'] = $article['views']+1;
        $articleModel->updateArticle($data);

        $cate_arr = array_reverse($this->get_parent_cate($article['cate_id']));
        $navCur = $cate_arr[0]['id'];
        $cate = end($cate_arr);
        $this->check_cate_auth($cate['id']);
        $current_title = $this->config['web_site_name'];
        $inside_banner = '';
        foreach ($cate_arr as $key => $val) {
            $val['url'] = getCateUrl($val['id'], $val['website'], $val['catedir']);
            $current_title = $val['name'] . ' - ' . $current_title;
            if (!empty($val['photo'])) $inside_banner = $val['photo'];

            $cate_arr[$key] = $val;
        }
        $current_title = $article['title'] . ' - ' . $current_title;
        $web_site_keyword = empty($article['keyword']) ? $this->config['web_site_keyword'] : $article['keyword'];
        $web_site_description = empty($article['description']) ? $this->config['web_site_description'] : $article['description'];
        $web_site_title = empty($article['seo_title']) ? $current_title : $article['seo_title'];

        if (empty($inside_banner)) {
            $bannerId = 2;
            $banner_config = $this->getBannerConfig($bannerId);
            $map['bannerId'] = $bannerId;
            $map['state'] = 1;
            $this->assign('banner_img', $this->getBannerImage($map, $banner_config['switch']));
            $this->assign('banner_config', $banner_config);
        }

        if($this->inside['web_menu_style'] == 3){
            $sub_menu = $this->get_top_menu($cate_arr);
            $menu_lvl = count($sub_menu);
            $second_menu = $menu_lvl == 1 ? $sub_menu : $sub_menu[0]['child'];
            $third_menu  = $menu_lvl > 2 ? $sub_menu[1]['child'] : '';
            $four_menu   = $menu_lvl > 3 ? $sub_menu[2]['child'] : '';
            $this->assign([
                'second_menu' => $second_menu,
                'third_menu' => $third_menu,
                'four_menu' => $four_menu
            ]);
        }else{
            $sub_menu = $this->get_sub_menu($cate_arr);
            $this->assign('sub_menu', $sub_menu);
        }
        $showSubMenu = (count($sub_menu) == 1 && count($sub_menu[0]['child']) == 0)? false : true;
        $sidebar_style = $this->inside['detail_sidebar_style'];
        if($sidebar_style){
            $this->assign('module_list',$this->get_sidebar_module());
        }
        if((!$showSubMenu && !$sidebar_style) or ($this->inside['web_menu_style'] == 3 && !$sidebar_style)){
            $showSidebar = false;
        }else{
            $showSidebar = true;
        }
        $this->assign('sidebar_style',$sidebar_style);
        $this->assign('showSubMenu', $showSubMenu);
        $this->assign('showSidebar', $showSidebar);

        $this->assign('cate_arr', $cate_arr);
        $this->assign('inside_banner', $inside_banner);
        $this->assign([
            'web_site_title' => $web_site_title,
            'web_site_keyword' => $web_site_keyword,
            'web_site_description' => $web_site_description,
            'navCur' => $navCur
        ]);
        $this->assign('cate', $cate);
        $this->assign('article', $article);
        if($cate['infoStyle'] == 1){
            $infoParam = explode('|', $cate['infoParam']);
            $product_img = $articleModel->getArticleImage(['articleId'=>$id]);
            $map_article['a.cate_id'] = $cate['id'];
            $map_article['a.status'] = 1;
            $map_article['a.id'] = ['<>',$id];
            $map_article['a.photo'] = ['<>',''];
            $relevant_article = $articleModel->getArticleList($map_article, 3);

            $this->assign('infoParam',$infoParam);
            $this->assign('product_img',$product_img);
            $this->assign('relevant_article',$relevant_article);
        }else{
            $map_article['a.cate_id'] = $cate['id'];
            $map_article['b.status'] = 1;
            $cate_article = $articleModel->getArticleList($map_article);
            $up = $down = '';
            foreach($cate_article as $k => $arr_a){
                if($arr_a['id'] == $id){
                    $up = $k > 0 ? $cate_article[$k - 1] : '';
                    $down = $k < count($cate_article)-1? $cate_article[$k + 1] : '';
                }
            }
            $this->assign('up',$up);
            $this->assign('down',$down);
        }

        return $this->fetch();
    }

    public function get_sidebar_module(){
        $articleModel = new ArticleModel();
        $module_list = Db::name('web_sidebar')->where('status=1')->order('sortnum asc')->select();
        foreach($module_list as $k => $v){
            if($v['module_style'] != 4){
                $source_cate = $articleModel->getOneCate($v['cateId']);
                $v['cate_url'] = getCateUrl($source_cate['id'], $source_cate['website'], $source_cate['catedir']);

                $moduleParam = explode('|', $v['module_param']);
                $v['moduleParam'] = $moduleParam;

                $limit = $moduleParam[0];
                $map_article = [];
                if($v['module_style'] == 1|| ($v['module_style'] == 2 && $moduleParam[4]==1) || $v['module_style'] == 3){
                    $map_article['a.photo'] = ['<>',''];
                }

                $cate_id_child = implode(',', $this->get_child_cateId($v['cateId']));
                $map_article['a.cate_id'] = ['in',''.$cate_id_child.''];
                $v['art_list'] = $articleModel->getArticleList($map_article,$limit);
            }
            $module_list[$k] = $v;
        }

        return $module_list;
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

    public function get_child_cateId($cid, $lvl=0)
    {
        $arr = [];
        $articleModel = new ArticleModel();
        $cate = $articleModel->getCateId(['parent_id' => $cid]);
        if (count($cate) > 0) {
            $arr = $cate;
            foreach($cate as $v){
                $arr = array_merge($arr, $this->get_child_cateId($v, $lvl+1));
            }
        }
        if($lvl == 0) array_push($arr, $cid);
        return $arr;
    }

    public function get_sub_menu($category)
    {
        if($category && is_array($category)){
            $lvl = count($category) - 1;
            if($lvl == 0){
                $category[0]['isCurrent'] = 1;
                $sub_menu = $category;
            }else {
                for ($i = $lvl; $i >= 0; $i--) {
                    if ($category[$i]['child']) {
                        foreach ($category[$i]['child'] as $k => $v) {
                            $v['url'] = getCateUrl($v['id'], $v['website'], $v['catedir']);
                            $v['isCurrent'] = 0;
                            $v['child'] = [];
                            if ($v['id'] == $category[$i + 1]['id']) {
                                $v['isCurrent'] = 1;
                                if ($category[$i + 1]['child']) $v['child'] = $category[$i + 1]['child'];
                            }
                            $category[$i]['child'][$k] = $v;
                        }
                    }
                }
                $sub_menu = $category[0]['child'];
            }
            return $sub_menu;
        }else{
            return false;
        }
    }

    public function get_top_menu($category)
    {
        if($category && is_array($category)){
            $lvl = count($category) - 1;
            if($lvl == 0){
                $category[0]['isCurrent'] = 1;
            }else {
                for ($i = $lvl; $i >= 0; $i--) {
                    if ($category[$i]['child']) {
                        foreach ($category[$i]['child'] as $k => $v) {
                            $v['url'] = getCateUrl($v['id'], $v['website'], $v['catedir']);
                            $v['isCurrent'] = 0;
                            if ($v['id'] == $category[$i + 1]['id']) {
                                $v['isCurrent'] = 1;
                            }
                            $category[$i]['child'][$k] = $v;
                        }
                    }
                }
            }
            return $category;
        }else{
            return false;
        }
    }

    public function check_cate_auth($cate_id)
    {
        if($this->config['web_site_member'] == 1){
            $map[]=["exp","FIND_IN_SET($cate_id,group_cate)"];
            $map['status'] = 1;
            $group_cate_arr = Db::name('member_group')->where($map)->column('id');
            if($group_cate_arr){
                $member = $this->isLogin();
                if(!$member){
                    $this->error('您还没有登录，请登录后查看相关内容',url('home/member/login'));
                }elseif(!in_array($member['group_id'], $group_cate_arr)){
                    $this->error('会员没有权限，无法查看相关内容');
                }
            }
        }
    }

}
