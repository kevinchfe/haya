<?php
namespace Home\Controller;

class CartController extends BaseController{

	public function index(){
		$this->display();
	}

	/**
	 * 加入购物车
	 */
	public function addAjaxCart(){
		$cid = I('post.id');

	}

}