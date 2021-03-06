<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class WapModel extends Model
{
    protected $name = 'wap_config';

    //获取配置所有信息
    public function getAllConfig()
    {
        return $this->select();
    }

    //保存配置信息
    public function SaveConfig($map,$value)
    {
        try{
            $result = $this->where($map)->setField('value', $value);
            if(false === $result){            
                return ['code' => -1, 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'msg' => '保存成功'];
            }
        }catch( PDOException $e){
            return ['code' => -2, 'data' => '', 'msg' => $e->getMessage()];
        }
    }

}