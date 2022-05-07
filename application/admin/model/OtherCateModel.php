<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class OtherCateModel extends Model
{
    protected $name = 'other_cate';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;

    /**
     * [getAllCate 获取全部分类]
     */
    public function getAllCate()
    {
        return $this->order('id asc')->select();
    }

    /**
     * [根据条件查询banner]
     */
    public function getCateByWhere($map)
    {
        return $this->where($map)->order('sortnum asc, id asc')->select();
    }

    /**
     * [insertCate 添加分类]
     */
    public function insertCate($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){     
                return ['code' => -1, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '分类添加成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [editMenu 编辑分类]
     */
    public function editCate($param)
    {
        try{
            $result = $this->allowField(true)->save($param, ['id' => $param['id']]);
            if(false === $result){          
                return ['code' => 0, 'data' => '', 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'data' => '', 'msg' => '保存成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

    /**
     * [getOneMenu 根据分类id获取一条信息]
     */
    public function getOneCate($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * [delMenu 删除分类]
     */
    public function delCate($id)
    {
        try{
            $this->where('id', $id)->delete();
            return ['code' => 1, 'data' => '', 'msg' => '分类删除成功'];
        }catch( PDOException $e){
            return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}