<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/30
 * Time: 11:59
 */

namespace Home\Model;

use Think\Model\ViewModel;

class IndexViewModel extends ViewModel{
    protected $viewFields = array(
        'goods' => array('id','goods_name','goods_price'),
        'goods_pic' => array('pic_url','_on'=>'goods.id=goods_pic.gid'),
    );

    public function getGoodsList(){
        return $this->order('id desc')->group('id')->limit(8)->select();
    }
}