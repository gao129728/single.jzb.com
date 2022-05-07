<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class Node extends Model
{
    protected $name = 'auth_rule';

    /**
     * 获取菜单管理权限
     */
    public function getAuthRule($map)
    {
        return $this->where($map)->field('condition,name')->select();
    }

    /**
     * [getNodeInfo 获取节点数据]
     *
     */
    public function getNodeInfo($id)
    {
        $where = 'status = 1';
        $result = $this->field('id,title,pid')->where($where)->order('sort asc')->select();
        $str = "";
        $role = new UserType();
        $rule = $role->getRuleById($id);

        if(!empty($rule)){
            $rule = explode(',', $rule);
        }
        foreach($result as $key=>$vo){
            $str .= '{ "id": "' . $vo['id'] . '", "pId":"' . $vo['pid'] . '", "name":"' . $vo['title'].'"';

            if(!empty($rule) && in_array($vo['id'], $rule)){
                $str .= ' ,"checked":1';
            }

            $str .= '},';
        }

        return "[" . substr($str, 0, -1) . "]";
    }


    /**
     * [getMenu 根据节点数据获取对应的菜单]
     *
     */
    public function getMenu($nodeStr = '')
    {
        if(session('uid') != 0 && session('uid') != 1 && empty($nodeStr)){
            return '';
        }else {
            //超级管理员没有节点数组
            if (session('uid') == 0) {
                $where = '';
            }elseif(session('uid') == 1){
                $where = 'status = 1';
            }else{
                $where = 'status = 1 and id in(' . $nodeStr . ')';
            }
            $result = $this->where($where)->order('sort')->select()->toArray();
            $menu = generateTree($result);
            return $menu;
        }
    }

    /**
     * [根据规则获取对应菜单信息]
     *
     */
    public function getOneNode($map)
    {
        return $this->where($map)->find();
    }
}