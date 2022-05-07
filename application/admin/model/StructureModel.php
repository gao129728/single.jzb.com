<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class StructureModel extends Model
{
    protected $name = 'structure';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;

    /**
     * [获取全部分类]
     */
    public function getAllStructure()
    {
        return $this->order('sortnum asc, id asc')->select();
    }

    public function insertStructure($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){     
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '添加模块成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    public function editStructure($param)
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
     * [根据分类id获取一条信息]
     */
    public function getOneStructure($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * [更新模块]
     */
    public function updateStructure($param)
    {
        return $this->allowField(true)->update($param);
    }

    public function delStructure($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除模块成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


}