<?php
namespace app\mobile\controller;
use app\mobile\model\BaseModel;
use app\mobile\model\ArticleModel;
use think\Db;

class Category extends Base
{
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

        $current_title = $this->web_config['web_site_name'];
        foreach ($cate_arr as $key => $val) {
            $val['url'] = wapCateUrl($val['id'], $val['website'], $val['catedir']);
            $current_title = $val['name'] . ' - ' . $current_title;
            $cate_arr[$key] = $val;
        };
        $web_site_keyword = empty($cateCur['keyword']) ? $this->config['wap_site_keyword'] : $cateCur['keyword'];
        $web_site_description = empty($cateCur['description']) ? $this->config['wap_site_description'] : $cateCur['description'];
        $web_site_title = empty($cateCur['seo_title']) ? $current_title : $cateCur['seo_title'];

        $map_list['cate_id'] = $cateCur['id'];
        $map_list['status'] = 1;
        if($cateCur['cateStyle'] == 0 || $cateCur['cateStyle'] == 4){
            $cateParam = $cateCur['cateParam'];
            $lists = $articleModel->getOneArticle($map_list);
        }else{
            switch ($cateCur['cateStyle'])
            {
                case 1:
                    $cur_cate_param = $this->config['newsParam'];
                    break;
                case 2:
                    $cur_cate_param = $this->config['picParam'];
                    break;
                case 3:
                    $cur_cate_param = $this->config['picTxtParam'];
                    break;
                default:
                    $cur_cate_param = '';
            }

            $cateParam = explode('|', $cur_cate_param);
            $count = $articleModel->getArticleCount($map_list);//计算总页面
            $lists = $articleModel->getArticleByWhere($map_list, $cateParam[0], $count, $cateCur['catedir']);
        }
        $this->assign('cate', $cateCur);
        $this->assign('cateParam', $cateParam);
        $this->assign('lists', $lists);

        $banner_img ='';
        if($cateCur['cateStyle'] == 0 && $cateParam==1){
            $inside_banner = '';
        }else{
            $inside_banner = Db::name('wap_nav')->where('cateId = '.$navCur)->value('photo');
            if (empty($inside_banner)) {
                $bannerId = 22;
                $banner_config = $this->getBannerConfig($bannerId);
                $map['bannerId'] = $bannerId;
                $map['state'] = 1;
                $banner_img = $this->getBannerImage($map, $banner_config['switch']);
                $this->assign('banner_config', $banner_config);
            }
        }
        $this->assign('banner_img', $banner_img);
        $this->assign('inside_banner', $inside_banner);

        $sub_menu = $this->get_sub_menu($cate_arr);
        $menu_lvl = count($sub_menu);
        $second_menu = $menu_lvl == 1 ? $sub_menu : $sub_menu[0]['child'];
        $third_menu  = $menu_lvl > 2 ? $sub_menu[1]['child'] : '';
        $four_menu   = $menu_lvl > 3 ? $sub_menu[2]['child'] : '';
        $this->assign([
            'second_menu' => $second_menu,
            'third_menu' => $third_menu,
            'four_menu' => $four_menu
        ]);
        $this->assign([
            'web_site_title' => $web_site_title,
            'web_site_keyword' => $web_site_keyword,
            'web_site_description' => $web_site_description,
            'navCur' => $navCur
        ]);

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
        $current_title = $this->web_config['web_site_name'];
        foreach ($cate_arr as $key => $val) {
            $val['url'] = wapCateUrl($val['id'], $val['website'], $val['catedir']);
            $current_title = $val['name'] . ' - ' . $current_title;
            $cate_arr[$key] = $val;
        }
        $current_title = $article['title'] . ' - ' . $current_title;
        $web_site_keyword = empty($cateCur['keyword']) ? $this->config['wap_site_keyword'] : $cateCur['keyword'];
        $web_site_description = empty($cateCur['description']) ? $this->config['wap_site_description'] : $cateCur['description'];
        $web_site_title = empty($cateCur['seo_title']) ? $current_title : $cateCur['seo_title'];

        $inside_banner = Db::name('wap_nav')->where('cateId = '.$navCur)->value('photo');
        if (empty($inside_banner)) {
            $bannerId = 22;
            $banner_config = $this->getBannerConfig($bannerId);
            $map['bannerId'] = $bannerId;
            $map['state'] = 1;
            $this->assign('banner_img', $this->getBannerImage($map, $banner_config['switch']));
            $this->assign('banner_config', $banner_config);
        }
        $this->assign('inside_banner', $inside_banner);

        $sub_menu = $this->get_sub_menu($cate_arr);
        $menu_lvl = count($sub_menu);
        $second_menu = $menu_lvl == 1 ? $sub_menu : $sub_menu[0]['child'];
        $third_menu  = $menu_lvl > 2 ? $sub_menu[1]['child'] : '';
        $four_menu   = $menu_lvl > 3 ? $sub_menu[2]['child'] : '';
        $this->assign([
            'second_menu' => $second_menu,
            'third_menu' => $third_menu,
            'four_menu' => $four_menu
        ]);

        $this->assign([
            'web_site_title' => $web_site_title,
            'web_site_keyword' => $web_site_keyword,
            'web_site_description' => $web_site_description,
            'navCur' => $navCur
        ]);
        $this->assign('cate', $cate);
        $this->assign('article', $article);
        if($cate['infoStyle'] == 1){
            $product_img = $articleModel->getArticleImage(['articleId'=>$id]);
            $map_article['cate_id'] = $cate['id'];
            $map_article['status'] = 1;
            $map_article['id'] = ['<>',$id];
            $map_article['photo'] = ['<>',''];
            $relevant_article = Db::name('article')->where($map_article)->order('sortnum desc, id desc')->limit(4)->select();
            foreach($relevant_article as $k => $arr_a){
                $arr_a['url'] = wapDetailUrl($arr_a['id'], $arr_a['website'], $cate['catedir']);
                $relevant_article[$k] = $arr_a;
            }
            $this->assign('product_img',$product_img);
            $this->assign('relevant_article',$relevant_article);
        }else{
            $map_article['cate_id'] = $cate['id'];
            $map_article['status'] = 1;
            $cate_article = $articleModel->getArticleList($map_article);
            $relevant_article = [];
            foreach($cate_article as $k => $arr_a){
                if($arr_a['id'] == $id){
                    $up = $k > 0 ? $cate_article[$k - 1] : '';
                    $down = $k < count($cate_article)-1? $cate_article[$k + 1] : '';
                }
                if($arr_a['id'] != $id && count($relevant_article) <= 3){
                    $arr_a['url'] = wapDetailUrl($arr_a['id'], $arr_a['website'], $cate['catedir']);
                    $relevant_article[$k] = $arr_a;
                }
            }
            if(!empty($up)) $up['url'] = wapDetailUrl($up['id'], $up['website'], $cate['catedir']);
            if(!empty($down)) $down['url'] = wapDetailUrl($down['id'], $down['website'], $cate['catedir']);
            $this->assign('up',$up);
            $this->assign('down',$down);
            $this->assign('relevant_article',$relevant_article);
        }

        return $this->fetch();
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
        if($category && is_array($category)){
            $lvl = count($category) - 1;
            if($lvl == 0){
                $category[0]['isCurrent'] = 1;
            }else {
                for ($i = $lvl; $i >= 0; $i--) {
                    if ($category[$i]['child']) {
                        foreach ($category[$i]['child'] as $k => $v) {
                            $v['url'] = wapCateUrl($v['id'], $v['website'], $v['catedir']);
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
        if($this->web_config['web_site_member'] == 1){
            $map[]=["exp","FIND_IN_SET($cate_id,group_cate)"];
            $map['status'] = 1;
            $group_cate_arr = Db::name('member_group')->where($map)->column('id');
            if($group_cate_arr){
                $member = $this->isLogin();
                if(!$member){
                    $this->error('您还没有登录，请登录后查看相关内容',url('mobile/member/login'));
                }elseif(!in_array($member['group_id'], $group_cate_arr)){
                    $this->error('会员没有权限，无法查看相关内容');
                }
            }
        }
    }

}
