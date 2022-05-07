<?php
namespace app\api\controller;
use app\api\controller\Banner;
use app\api\model\ArticleModel;
use think\Db;

class Detail extends Base
{
    public function index()
    {
        $articleModel = new ArticleModel();
        $id = (int)input('param.id');
        $method = input('param.method');
        $article = $articleModel->getOneArticle(['id'=>$id]);
        if (!$article) {
            return ['code' => 0, 'msg' => '参数错误'];
        }
        $article['create_time'] = date('Y-m-d',$article['create_time']);
        $data['id'] = $article['id'];
        $data['views'] = $article['views']+1;
        $articleModel->updateArticle($data);

        $banner = [];
        if($method == 1){
            $cate_arr = array_reverse($this->get_parent_cate($article['cate_id']));
            $navCur = $cate_arr[0]['id'];
            $cate = end($cate_arr);

            $applet_nav_cate = Db::name('applet_nav')->where('cateId = ' . $navCur)->order('sortnum asc, id asc')->find();
            if (!empty($applet_nav_cate['photo'])) {
                $banner['switch'] = 0;
                $banner['img_list'] = $this->imgPath . $applet_nav_cate['photo'];
            } else {
                $bannerModel = new Banner();
                $flag = $bannerModel->inside();
                if ($flag['code'] > 0) {
                    $banner = $flag['data'];
                }
            }
        }else{
            $cate = $articleModel->getOneCate(['id'=>$article['cate_id']]);
        }

        $up_art = $down_art = '';
        if($cate['infoStyle'] == 1){
            $product_img = $articleModel->getArticleImage(['articleId'=>$id]);
            if($product_img){
                foreach($product_img as $key => $val){
                    if(!empty($val['photo'])) $val['photo']= $this->imgPath.$val['photo'];
                    $product_img[$key] = $val;
                }
            }else{
                $product_img = '';
            }

            $map_article['cate_id'] = $cate['id'];
            $map_article['status'] = 1;
            $map_article['id'] = ['<>',$id];
            $map_article['photo'] = ['<>',''];
            $relevant_list = Db::name('article')->where($map_article)->order('sortnum desc, id desc')->limit(4)->select();
            foreach($relevant_list as $k => $arr_a){
                if(!empty($arr_a['photo'])) $arr_a['photo']= $this->imgPath.$arr_a['photo'];
                $relevant_list[$k] = $arr_a;
            }
        }else{
            $product_img = '';
            $map_article['cate_id'] = $cate['id'];
            $map_article['status'] = 1;
            $cate_article = $articleModel->getArticleList($map_article);
            $relevant_list = [];
            foreach($cate_article as $k => $arr_a){
                if($arr_a['id'] == $id){
                    $up_art = $k > 0 ? $cate_article[$k - 1]['id'] : '';
                    $down_art = $k < count($cate_article)-1? $cate_article[$k + 1]['id'] : '';
                }
                if($arr_a['id'] != $id && count($relevant_list) <= 3){
                    $relevant_list[$k] = $arr_a;
                }
            }
        }

        $data = [
            'curTitle' => $cate['name'],
            'article' => $article,
            'banner' => $banner,
            'infoStyle'=>$cate['infoStyle'],
            'up_art' => $up_art,
            'down_art' => $down_art,
            'relevant_list' => $relevant_list,
            'product_img' => $product_img
        ];
        return ['code' => 1, 'data' => $data];
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

}
