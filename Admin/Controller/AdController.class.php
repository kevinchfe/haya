<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/14
 * Time: 9:22
 * ���
 */

namespace Admin\Controller;

class AdController extends BaseController{

    /**
     *广告列表
     */
    public function index(){
        $ad = D('Ad');
        $ad_list = $ad->getAdList();
        $this->assign('ad_list',$ad_list);
        $this->display();
    }


    /**
     * 添加广告
     */
    public function insert(){
        // $rule = array(
        //     array('ad_title','require','标题必须'),

        // );

        $data = D('Ad')->insert();
        if($data){
            $this->success('添加成功','index.php/Admin/Ad/index',3);
            exit();
        }
        $this->error('失败','',5);
    }


    /**
     *广告编辑
     */
    public function editAd(){
        if(IS_POST){
            $id = I('ad_id',0,'int');
            if($id<1){
                $this->error('参数错误');
            }
            $ad = D('Ad')->edit();
            if(false != $ad){
                $this->success('编辑成功','index');
            }
        }else{
            $id = I('get.ad_id',0,'int');
            $ad_name = I('ad_name','');
            if($id<1){
                $this->error('失败');
            }
            $this->assign('id',$id);
            $this->assign('ad_name',$ad_name);
            $this->display();
        }
        
    }

    /**
     *删除广告
     */
    public function delAd(){
        $ad_id = I('get.ad_id', 0, 'int');
        $ad = M('ad');
        
        if($ad_id<1){
            $this->error('删除失败');
        }
        $res = $ad->delete($ad_id);
        if(!$res){
            $this->error('删除失败');
        }
        $this->redirect('Index');
    }



    /**
     *异步上传图片
     */
    public function ajaxUploader(){
        $config = array(
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'savePath' => 'Upload/Ad/Images/',
        );

        if(!IS_POST){
            $this->redirect('Index');
        }
        $file = I('data.file','','',$_FILES);
        $res = $this->uploader($config);
        foreach($res as $v ){
            echo $v['savepath'],$v['savename'];
        }

    }
        


}

