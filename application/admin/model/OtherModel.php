<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class OtherModel extends Model
{
    protected $name = 'other_list';
    
    // 开启自动写入时间戳
    protected $autoWriteTimestamp = false;


    /**
     * 根据搜索条件获取列表信息
     */
    public function getOtherByWhere($map, $Nowpage, $limits)
    {
        return $this->where($map)->page($Nowpage, $limits)->order('sortnum desc, id desc')->select();
    }

    /**
     * 根据搜索条件获取信息总数
     */
    public function getOtherCount($map)
    {
        return $this->where($map)->count();
    }

    /**
     * [添加]
     */
    public function insertOther($param)
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
     * [编辑]
     */
    public function editOther($param)
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
     * [获取一条信息]
     */
    public function getOneOther($id)
    {
        return $this->where('id', $id)->find();
    }

    /**
     * [删除]
     */
    public function delOther($map)
    {
        return $this->where($map)->delete();
    }

    //获取图片
    public function getImageSrc($map)
    {
        return $this->where($map)->column('photo');
    }

}