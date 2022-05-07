<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ModuleModel extends Model
{
    protected $name = 'structure_module';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;

    /**
     * [根据条件查询子版块]
     */
    public function getModuleByWhere($map)
    {
        return $this->where($map)->order('sortnum asc, id asc')->select();
    }

    /**
     * [统计子版块]
     */
    public function getModuleCnt($map)
    {
        return $this->where($map)->count();
    }

    /**
     * [获取单个子版块]
     */
    public function getOneModule($id)
    {
        return $this->where('id',$id)->find();
    }

    /**
     * [添加子版块]
     */
    public function addModule($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => $this->id, 'msg' => '添加子版块成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [添加子版块]
     */
    public function editModule($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '编辑子版块成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [更新子版块]
     */
    public function updateModule($param)
    {
        return $this->allowField(true)->update($param);
    }

    public function delModule($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '删除子版块成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }


}