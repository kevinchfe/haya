<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	/**
	 *首页
	 */
    public function index(){
    	//echo time();die;
        $modl = D('IndexView');
        $goodslist = $modl->getGoodsList();//推荐

        $this->assign('goodsList', $goodslist);
        $this->display();
    }
}
