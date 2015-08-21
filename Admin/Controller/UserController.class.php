<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-7-23
* Time: 下午2:12
*/
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{

    /**
     * 管理员列表
     */
    public function index(){
        $user = M('user');
        $user_list = $user->select();
        $this->assign('user_list',$user_list);
        //dump($user_list);die;
        $this->display();
    }

    /**
     * 添加管理员
     */
    public function add(){
        if(!IS_POST){
            $this->display();
        }else{
            $data = array(
                'mobile'=>I('phone'),
                'password'=>I('password',0,'md5'),
                'username'=>I('username',''),
                'sex'=>I('sex',0),
                'email'=>I('email',''),
                'reg_time'=>time()
            );
            //dump($data);die;

            $user = M('user');
            $user->data($data)->add();
            if(!$user){
                $this->error('error');
            }else{
                $this->success('成功',U('Admin/User/index'));
            }
        }





    }


    /**
     *
     */

}