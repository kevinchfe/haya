<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/8
 * Time: 9:40
 */
namespace Admin\Controller;


class OrdersController extends BaseController{

    /**
     * 订单列表
     */
    public function index(){
        $orders = D('OrdersRelation');
        $data = $orders->relation(true)->select();
        //echo $orders->getLastSql();die;
        //print_r($data);die;
        $this->assign('data',$data);
        $this->display();

    }

    /**
     * 订单详情
     */
    public function orderDesc(){
        $id = I('get.id');
        $orders = D('OrdersRelation');
        $data = $orders->relation(true)->select();
        $this->display();


    }

}