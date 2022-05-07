<?php

namespace app\admin\controller;
use think\Controller;
use think\File;

class Upload extends Base
{
	//图片上传
    public function uploadImage($file){
        if($file){
            $info  = $file->validate(['size'=>config('upload_img.size'),'ext'=>config('upload_img.ext')])->move(ROOT_PATH . 'public' . DS . config('upload_img.path'));
            if($info){
                return $info->getSaveName();
            }else{
                return '';
            }
        }

    }

    //头像上传
    public function uploadFace($file){
        if($file){
            $info  = $file->validate(['size'=>config('upload_face.size'),'ext'=>config('upload_face.ext')])->move(ROOT_PATH . 'public' . DS . config('upload_face.path'));
            if($info){
                return $info->getSaveName();
            }else{
                return '';
            }
        }

    }

    //多图上传
    public function multi_upload(){
        @set_time_limit(5 * 60);

        $file = request()->file('file');
        $info = $file->move(ROOT_PATH . 'public' . DS . config('upload_img.path'));
        if($info){
            return json(['code' => 1, 'data' => $info->getSaveName(),'path'=>config('upload_img.path'),'msg' => '上传成功']);
        }else{
            return json(['code' => 0, 'data' => '', 'msg' => $file->getError()]);
        }
    }

}