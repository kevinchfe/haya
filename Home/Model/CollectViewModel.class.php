<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/7
 * Time: 16:10
 */
namespace Home\Model;
use Think\Model\ViewModel;

class CollectViewModel extends ViewModel{
    protected $viewFields = array(
        'collect'=>array('id','add_time','is_attention','gid','uid'),
        'goods' => array('goods_name','goods_price','_on'=>'goods.id=collect.gid'),
        'goods_pic' => array('pic_url','_on'=>'goods.id=goods_pic.gid'),
    );



}