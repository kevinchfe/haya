<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/13
 * Time: 22:14
 */
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    public function _initialize()
    {

    }

    /**
     * 图片上传类
     * @return array|bool
     */
    public function uploader($config = array()){
        $upload = new \Think\Upload($config);
        $upload->maxSize = 3145728;
        $upload->rootPath = APP_PATH . 'Public/';
        $upload->subName = array('date', 'Ymd');
        $info = $upload->upload();

        return $info;
    }

    /**
     * 生成缩略图
     * @param $pic 图片资源路径
     * @param null $path 保存路径
     * @param null $savename 图片名字
     */
    public function thumb($pic, $info=array()){
        $image = new \Think\Image();
        $image->open($pic);
        $image->thumb(380, 380);
        $savepath = APP_PATH . $info['path'];
        $name = 's_' . $info['name'];
        if(!is_dir($savepath)){
            mkdir($savepath, 0, true);
        }
        $image->save($savepath.$name);
        $data = array();
        $data['name'] = $name;
        $data['path'] = $savepath;
        $data['pic_url'] = $info['savepath'].$name;
        return $data;
    }

    /**
     * 上传缩略图
     * @param null $path
     * @return array
     */
    public function uploadThumb($path=null){
        $upload = new \Think\UploadFile();// 实例化上传类
        $upload->maxSize = 3000000 ;// 设置附件上传大小
        $upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->allowTypes = array('image/jpg','image/jpeg','image/pjpeg','image/png','image/gif');
        $upload->savePath = 'Public/Uploads/'.$path;// 设置附件上传目录
        $upload->saveRule = 'uniqid';
        $upload->thumb = true;
        $upload->thumbMaxWidth = '300';
        $upload->thumbMaxHeight = '300';
        $upload->thumbPrefix = 's_';
        $upload->thumbRemoveOrigin = false;

        if($upload->upload()){
            $info = $upload->getUploadFileInfo();
            return $info;
        }

    }
}
