<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/8
 * Time: 14:15
 */

namespace Admin\Model;

use Think\Model\ViewModel;

class OrdersViewModel extends ViewModel{

    public $viewFields = array(
        'orders'=>array('id','order_status','order_msg'),
        'orders_goods' => array('unit_price','count_price','oid','gid','number','_on'=>'orders_goods.oid=orders.id'),
        'goods' => array('goods_name','_on'=>'goods.id=orders_goods.gid'),
//        'orders_address' => array('address_id','_on'=>'orders_address.orders_id=orders.id'),
//        'user_address'=>array('province','_on'=>'user_address.id=orders_address.address_id')
    );

    public function getGoodsList(){
        return $this->order('id desc')->select();
    }



}