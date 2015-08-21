<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/20
 * Time: 10:22
 */
namespace Admin\Model;

use Think\Model\ViewModel;

class GoodsViewModel extends ViewModel{

    public $viewFields = array(
        'goods' => array('goods_sn','goods_name','id','goods_price','cost_price','original_price','cat_id','bid'),
        'category' => array('cat_name','_on'=>'goods.cat_id=category.id'),
        'brand' => array('brand_name','_on'=>'goods.bid=brand.id'),
    );

    public function getGoodsList(){
        return $this->order('id desc')->select();
    }

}