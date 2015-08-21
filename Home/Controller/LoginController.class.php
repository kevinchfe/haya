<?php
namespace Home\Controller;

class LoginController extends BaseController{

	/**
	 *登录显示
	 */
	public function index(){

		$this->display('login');
	}

	/**
	 *注册页面
	 */
	public function  reg(){
		$this->display();
	}

	/**
	 * 注册处理
	 */
	public function register(){
		if(!IS_POST){
			$this->redirect('reg');
		}
		$data = array(
				'mobile' =>I('post.mobile',0),
				'password'=>I('post.password', '', 'md5'),
				'username'=>I('post.username',''),
				'sex'=>I('post.sex',0,'int'),
				'email'=>I('post.email',''),
				'reg_time'=>time()
			);
		//dump($data);die;
			$user = D('User');
			if($user->create($data)){
				$res = $user->add();
				if($res){
					$this->success('注册成功',U('Home/Index/index'));
				}else{
					$this->error('注册失败');
				}
			}else{
				$this->error($user->getError());
			}


	}

 
    /**
	 *登录处理
	 */
	public function  isLogin(){
		if(!IS_POST){
			$this->redirect('index');
		}
		$data = array();
		//$data['mobile'] = I('post.phone');

		//dump(preg_match("/^1[3|4|5|8][0-9]\d{8}$/",I('post.phone')));die;

		if(preg_match("/^1[3|4|5|8][0-9]\d{8}$/",I('post.phone'))){
			$data['mobile'] = I('post.phone');
		}else{
			$data['email'] = I('post.phone');
		}



		$data['password'] = I('post.password','','md5');
		//dump($data);die;
		$user = M('User');
		$res = $user->where($data)->find();
		//dump($res);die;
		if($res){
			session('user_id',$res['id']);
			session('user_mobile',$res['mobile']);
			//print_r(session());die;
			$this->success('登录成功',U('Home/Index/index'));
			exit;
		}
		$this->error('登录失败，请输入正确的用户名与密码');


		
	}

	/**
	 *退出
	 */
	public function loginOut(){

	}
}