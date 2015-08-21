<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/13
 * Time: 22:30
 */
namespace Admin\Controller;

class GoodsController extends BaseController{
    protected  $_error = array();

    public function index(){
        $goods = D('GoodsView');
        $goods_list = $goods->getGoodsList();
        $this->assign('goods_list',$goods_list);
        //dump($goods_list);die;

        $this->display();
    }

    /**
    * 商品添加页面显示
    */
    public function addGoods(){
        $b = M('Brand');
        $c = M('category');
        $brand = $b->select();
        $cat = $c->select();
        $this->assign('brand_list', $brand);
        $this->assign('cat_list', $cat);

        $this->display();
    }

    /**
     * 编辑显示
     */
    public function editGoods(){
        if(!IS_GET){
            $this->redirect('index');
        }

        $gid = I('get.gid', 0, 'int');
        $model = M('goods');
        $goods = $model->where('id='.$gid)->find();
        $this->assign('goods',$goods);

        $b = M('Brand');
        $c = M('category');
        $brand = $b->select();
        $cat = $c->select();
        $this->assign('brand_list', $brand);
        $this->assign('cat_list', $cat);

        $this->display();
    }


    /**
     * 商品插入
     */
    public function insertGoods(){
        if(!IS_POST){
            $this->redirect('index');
        }
        $data = array(
            'goods_name' => I('post.goods_name'),
            'goods_sn' => $this->_getGoodsNumber(),
            'goods_price' => I('post.goods_price', '0.00'),
            'goods_stock' => I('post.goods_stock'),
            'cat_id' => I('post.cat_id', 0, 'int'),
            'bid' => I('post.bid', 0, 'int'),
            'goods_desc' => I('post.goods_desc'),
            'original_price' => I('post.original_price', 0.00),
            'cost_price' => I('post.cost_price', 0.00),
            'is_new' => I('post.is_new', 0, 'int'),

        );
        $file = I('post.pic_url');
        foreach($file as $k=>$v){
            $data['goods_pic'][] = array('pic_url'=>$v);
        }
        //print_r($data);die;

        $goods = D('GoodsRelation');
        $rs = $goods->insertGoods($data);
        if($rs){
            $this->success('添加成功', U('Admin/Goods/index'));
            exit;
        }
        $this->error('添加失败');

    }

    /**
     * 生成货号
     * @return string
     */
    protected function _getGoodsNumber(){
        $str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
        $str = substr(str_shuffle($str),0,12);

        $sn = date('Ymd').$str;
        $goods = M('goods');
        $where = array('goods_sn'=>$sn);
        $rs = $goods->where($where)->find();
        if($rs){
            return $this->getGoodsNumber();
        }
        return $sn;
    }

    public function del(){
        if(!IS_GET){
            $this->redirect('index');
        }
        $gid = I('get.gid', 0, 'int');

        $rs = M('goods')->delete($gid);
        if($rs){
            $this->redirect('index');
        }
        $this->error('删除失败');
    }

    /**
     * 异步上传
     */
    public function ajaxUploader(){
        if(!IS_POST){
            $this->redirect('index');
        }

        if(!$_FILES){
            $this->redirect('index');
        }

        $path = 'Goods/'.date('Ymd').'/';
        //echo $path;die;
        $rs = $this->uploadThumb($path);
        foreach($rs as $v){
            echo $v['savepath'],'s_',$v['savename'];
        }
    }


}
