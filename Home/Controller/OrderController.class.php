<?php
namespace Home\Controller;


class OrderController extends BaseController{

	/**
	 *订单列表
	 */
	public function index(){
		$this->display();
	}

	/**
	 * 代付订单
	 */
	public function myorder(){
		$this->display();
	}


	protected function _getOrderNum(){
		$str = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
		$str = str(str_shuffle($str),0,12);
		$sn = date('Ymd').$str;
		$orders = M('Orders');
		$where = array('order_sn'=>$sn);
		$res = $orders->where($where)->find();
		echo $orders->getLastSql();die;
	}


}