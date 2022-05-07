<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class ConfigModel extends Model
{
    protected $name = 'config';

    //获取配置所有信息
    public function getAllConfig()
    {
        $list = $this->select();
        $config = [];
        foreach ($list as $k => $v) {
            $config[trim($v['name'])]=$v['value'];
        }
        return $config;
    }


    //保存信息
    public function SaveConfig($map,$value)
    {
        try{
            $result = $this->allowField(true)->where($map)->setField('value', $value);
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