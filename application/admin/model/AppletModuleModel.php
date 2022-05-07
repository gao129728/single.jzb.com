<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class AppletModuleModel extends Model
{
    protected $name = 'applet_module';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;

    /**
     * [根据条件查询版块]
     */
    public function getAllModule()
    {
        return $this->order('sortnum asc, id asc')->select();
    }

    /**
     * [获取单个版块]
     */
    public function getOneModule($id)
    {
        return $this->where('id',$id)->find();
    }

    /**
     * [添加版块]
     */
    public function addModule($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => $this->id, 'msg' => '添加模块成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [添加版块]
     */
    public function editModule($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑模块成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [更新版块]
     */
    public function updateModule($param)
    {
        return $this->allowField(true)->update($param);
    }

    public function delModule($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除模块成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


}