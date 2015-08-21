<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/5
 * Time: 10:39
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    protected $_validate =  array(
        array('mobile','11','请输入正确的手机号码',1,'length'),
        array('mobile','require','该用户已注册',1,'unique'),
        array('pwdcheck','password','确认密码不正确',0,'confirm')
    );


    /**
     * 注册处理
     */
    public function register(){

    }


}