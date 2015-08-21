<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/31
 * Time: 10:58
 */
namespace Home\Model;

use Think\Model\ViewModel;

class GoodsViewModel extends ViewModel{
    protected $viewFields = array(
        'goods' => array('id','goods_name','goods_price','original_price'),
        'goods_pic' => array('pic_url','_on'=>'goods.id=goods_pic.gid'),
    );

    public function getGoodsList(){
        return $this->order('id desc')->group('id')->select();
    }
}