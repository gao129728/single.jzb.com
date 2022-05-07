<?php

namespace app\home\model;
use think\Model;
use think\Db;

class MemberModel extends Model
{
    protected $name = 'member';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * [ 会员注册]
     */
    public function addMember($param)
    {
        try{
            $result = $this->allowField(true)->save($param);
            if(false === $result){
                return ['code' => 0, 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'msg' => '会员注册成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'msg' => $e->getMessage()];
        }
    }

    /**
     * [ 修改会员信息]
     */
    public function editMember($param)
    {
        try{
            $result = $this->allowField(true)->save($param,['id' => $param['id']]);
            if(false === $result){
                return ['code' => 0, 'msg' => $this->getError()];
            }else{
                return ['code' => 1, 'msg' => '修改成功'];
            }
        }catch( PDOException $e){
            return ['code' => 0, 'msg' => $e->getMessage()];
        }
    }


    public function getOneMember($map)
    {
        $table = config('database.prefix').'member_group';
        return Db::name('member')->alias('a')->field('a.*,b.group_name,b.status as group_status')->join($table.' b', 'a.group_id = b.id', 'LEFT')->where($map)->find();
    }

}