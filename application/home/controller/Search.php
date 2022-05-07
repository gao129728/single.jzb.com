<?php

namespace app\home\controller;
use app\home\model\ArticleModel;
use think\Db;

class Search extends Base
{
    //信息搜索
    public function index()
    {
        $keyword = input('keyword','','trim,htmlspecialchars');
        if(empty($keyword)){
            $this->redirect('home/index/index');
        }
        $base_name = '信息搜索';
        $this->assign([
            'web_site_title'  => $keyword.' - '.$base_name.' - '.$this->config['web_site_title'],
            'web_site_keyword' => $this->config['web_site_keyword'],
            'web_site_description' => $this->config['web_site_description'],
            'navCur'=>'search'
        ]);
        $map['status'] = 1;
        $map['title|content'] = ['like','%' . $keyword . '%'];
        $articleModel = new ArticleModel();
        $count = $articleModel->getArticleCount($map);//计算总页面
        $search_list = $articleModel->getSearchArticle($map, 10, $count, $keyword);
        $this->assign('count', $count);
        $this->assign('base_name', $base_name);
        $this->assign('keyword', $keyword);
        $this->assign('search_list', $search_list);

        return $this->fetch();
    }
}