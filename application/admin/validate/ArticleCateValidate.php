<?php

namespace app\admin\validate;
use think\Validate;

class ArticleCateValidate extends Validate
{
    protected $rule = [
        ['catedir', 'unique:article_cate', '栏目目录已经存在']
    ];

}