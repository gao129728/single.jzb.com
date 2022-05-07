<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class AppletNavModel extends Model
{
    protected $name = 'applet_nav';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;


    /**
     * [获取全部导航]
     *
     */
    public function getAllNav()
    {
        return $this->order('sortnum asc, id asc')->select();
    }

    /**
     * [根据条件统计分类个数]
     *
     */
    public function getNavCount($map)
    {
        return $this->where($map)->count();
    }


    /**
     * [添加导航]
     *
     */
    public function insertNav($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){     
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [editMenu 编辑分类]
     *
     */
    public function editNav($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){          
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }



    /**
     * [根据id获取一条信息]
     */
    public function getOneNav($id)
    {
        return $this->where('id', $id)->find();
    }



    /**
     * [删除]
     */
    public function delNav($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}