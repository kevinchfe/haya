<?php
namespace  Home\Controller;
use Think\Controller;

class GoodsController extends Controller{

	/**
	 *商品列表
	 */
	public function index(){
        $model = D('GoodsView');
        $list = $model->getGoodsList();

        $this->assign('list', $list);
		$this->display();

	}

	/**
	 *商品详情
	 */
	public function goodsDesc(){
        $gid = I('get.gid', 0, 'int');
        $model = D('GoodsRelation');
        $goodsInfo = $model->getGoodsDesc($gid);

        $this->assign('goods_pic', $goodsInfo['goods_pic']);
        $this->assign('goodsInfo', $goodsInfo);
		$this->display();
	}

	/**
	 * 商品搜索
	 */
	public function searchGoods(){
		$this->display();
	}

	/**
	 *商品搜索结果
	 */
	public function searchRes(){
		if(!IS_POST){
			$this->redirect('index');
			exit;
		};
		$name = I('post.goods_name');
		if(!$name){
			$this->error('请输入产品名称');
		}
		//echo $name;die;
		$goods = D('GoodsView');
		$where['goods_name'] = array('like',"%$name%");
		$data = $goods->where($where)->select();
		//echo $goods->getLastSql();die;
		if(!$data){
			$this->error('没有相关商品');
		}
		$this->assign('data',$data);

		$this->display();
	}

	/**
	 * 商品评论
	 */
	public function getAjaxComment(){
		$id = I('post.id');
		$comment = M('Comment');
		$data = $comment->where('gid='.$id)->field('content,add_time')->select();
		$this->assign('data',$data);
		$this->display('comment');
	}

	/**
	 *详情介绍
	 */
	public function getAjaxDesc(){
		$id = I('post.id');
		$goods = M('goods');
		$data = $goods->where('id=' . $id)->field('goods_desc')->find();
		echo htmlspecialchars_decode($data['goods_desc']);
	}



}