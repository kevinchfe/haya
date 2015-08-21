<?php
namespace Admin\Model;
use Think\Model;

class AdModel extends Model{

	/**
	 *获取广告列表
	 */
	public function getAdList(){
		return $this->select();

	}

	/**
	 *广告编辑
	 */
	public function edit(){
		$data =array();
        $data['ad_id'] = I('post.ad_id',0,'int');
		$data['ad_name'] = I('post.ad_name');
		$data['ad_url'] = I('post.ad_url');
		$data['ad_desc'] = I('post.ad_desc');
        $data['ad_path'] = I('post.ad_path');
        $ad = $this->where('ad_id='.$data['ad_id'])->save($data);
        //echo $this->getLastSql();die;
		return $ad;
	}

	/**
	 *广告添加
	 */
	public function insert(){
		$data = array();
        $data['ad_name'] = I('post.ad_name');
        $data['ad_url'] = I('post.ad_url');
        $data['ad_desc'] = I('post.ad_desc');
        $data['ad_path'] = I('post.ad_path');
		$res = $this->data($data)->add();
		return $res;
	}
}