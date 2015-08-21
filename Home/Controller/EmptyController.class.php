<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/29
 * Time: 16:43
 */
namespace Home\Controller;
use Think\Controller;


class EmptyController extends Controller{
    public function _empty(){
        header("HTTP/1.0 404 Not Found");//Ê¹HTTP·µ»Ø404×´Ì¬Âë
        $this->display("Public:404");
    }


}