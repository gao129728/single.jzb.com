<?php

namespace app\admin\controller;
use app\admin\model\MenuModel;
use think\Db;

class Menu extends Base
{	
    /**
     * [index 菜单列表]
     * @return [type] [description]
     *
     */
    public function index()
    {
        $nav = new \org\Leftnav;
        $menu = new MenuModel();
        $admin_rule = $menu->getAllMenu();
        $arr = $nav::rule($admin_rule);
        $this->assign('admin_rule',$arr);
        return $this->fetch();
    }

	
    /**
     * [add_rule 添加菜单]
     * @return [type] [description]
     *
     */
	public function add_rule()
    {
        if(request()->isAjax()){
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status'])? $param['status']: 0;
            $menu = new MenuModel();
            $flag = $menu->insertMenu($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }

        return $this->fetch();
    }


    /**
     * [edit_rule 编辑菜单]
     * @return [type] [description]
     *
     */
    public function edit_rule()
    {
        $menu = new MenuModel();
        if(request()->isPost()){
            $this->TestAuth();
            $param = input('post.');
            $param['status'] = isset($param['status'])? $param['status']: 0;
            $flag = $menu->editMenu($param);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
        $id = input('param.id');
        $this->assign('menu',$menu->getOneMenu($id));
        return $this->fetch();
    }


    /**
     * [roleDel 删除角色]
     * @return [type] [description]
     *
     */
    public function del_rule()
    {
        $id = input('param.id');
        $menu = new MenuModel();
        if($menu->getMenuCount(['pid'=>$id]) > 0){
            return json(['code' => 0, 'data' => "", 'msg' => '菜单下有子类，请先删除子类！']);
        }else {
            $flag = $menu->delMenu($id);
            return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
        }
    }



    /**
     * [ruleorder 排序]
     * @return [type] [description]
     *
     */
    public function ruleorder()
    {
        if (request()->isAjax()){
            $param = input('post.');     
            $auth_rule = Db::name('auth_rule');
            foreach ($param as $id => $sort){
                $auth_rule->where(array('id' => $id ))->setField('sort' , $sort);
            }
            return json(['code' => 1, 'msg' => '排序更新成功']);
        }
    }

}