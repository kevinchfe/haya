<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/6
 * Time: 14:25
 */
namespace Home\Widget;
use Think\Controller;

class CityWidget extends Controller{
    public function getCity($id){
        $id = I('post.id');
        echo $id;die;
        $city = M('Address');
        $data = $city->where('parent_id='.$id)->select();
        $this->assign('city',$data);
        $this->display('getCity');
    }
}