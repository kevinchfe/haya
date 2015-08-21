<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/21
 * Time: 14:05
 */
namespace Admin\Controller;

class BrandController extends BaseController{
    public function index(){
        $model = M('brand');
        $list = $model->order('id desc')->select();
        $this->assign('list',$list);

        $this->display();
    }

    /**
     * 编辑页面
     */
    public function edit(){
        if(!IS_GET){
            $this->redirect('index');
        }
        $bid = I('get.bid', '', 'int');
        $model = M('brand');
        $brand = $model->where('id='.$bid)->find();

        $this->assign('brand', $brand);
        $this->display();
    }

    /**
     * 添加品牌页面
     */
    public function add(){
        $this->display();
    }

    /**
     * 保存修改
     */
    public function editBrand(){
        if(!IS_POST){
            $this->redirect('index');
        }
        $data['brand_name'] = I('post.brand_name');
        $data['brand_url'] = I('post.brand_url');
        $data['brand_img'] = I('post.brand_img');
        $data['brand_desc'] = I('post.brand_desc');
        $data['id'] = I('post.brand_show', '', 'int');

        $model = D('Brand');
        if($model->create($data)){
            $rs = $model->save();
            if($rs){
                $this->success('保存成功', U('Admin/Brand/index'));
                exit;
            }
        }
        $this->error('保存失败');
    }

    /**
     * 删除品牌
     */
    public function del(){
        if(!IS_GET){
            $this->redirect('index');
        }

        $bid = I('get.bid', '', 'int');
        $model = M('brand');
        $rs = $model->where('id = '.$bid)->delete();

        if(!$rs){
            $this->error('删除失败');
            exit;
        }

        $this->success('删除成功',U('Admin/Brand/index'));
    }

    /**
     * 处理插入
     */
    public function insert(){
        if(!IS_POST){
            $this->redirect('index');
        }
        $data['brand_name'] = I('post.brand_name');
        $data['brand_url'] = I('post.brand_url');
        $data['brand_img'] = I('post.brand_img');
        $data['brand_desc'] = I('post.brand_desc');

        $model = D('Brand');
        if($model->create($data)){
            $rs = $model->add();
            if($rs){
                $this->success('添加成功', U('Admin/Brand/index'));
                exit;
            }
        }
        $this->error($model->getError());

    }

    /**
     *异步上传图片
     */
    public function ajaxUploader(){
        if(!IS_POST){
            $this->redirect('index');
        }
        $config = array(
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            'savePath' => 'Upload/Brand/Images/',
        );

        $file = I('data.file','','',$_FILES);
        $res = $this->uploader($config);
        foreach($res as $v ){
            echo $v['savepath'],$v['savename'];
        }

    }
}