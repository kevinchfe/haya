<?php
namespace Home\Controller;
use Think\Controller;

class BaseController extends Controller{
	public function _initialize(){
//		if(!isset($_SESSION['user_id'])){
//			$this->redirect('Home/Login');
//		}



	}

	/**
	 * @return mixed
	 * 获取全国省份
	 */
	public function getProvince(){
		$address = M('Address');
		$list = $address->where('type=1')->select();
		return $list;
	}

	/**
	 * 获取省份名称
	 */
	public function getProvinceName($id){
		$address = M('Address');
		$province = $address->where('id='.$id)->getField('name');
		return $province;
	}



	public function _empty(){
		header("HTTP/1.0 404 Not Found");
		$this->display("Public:404");
	}


}