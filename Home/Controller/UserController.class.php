<?php
namespace Home\Controller;


class UserController extends BaseController{

    /**
     *用户列表
     */
	public function index(){
		$this->display();
	}



    /**
     * 收货地址列表
     */
    public function manageAdd(){
        echo C('DB_TYPE');die;
        $this->display();

    }

    /**
     * 编辑地址
     */
    public function editAdd(){
        if (!IS_POST) {
            $list = $this->getProvince();
            $this->assign('list', $list);
            $this->display();
            exit;
        }
        $UserAdd = D('UserAddress');
        $data = $UserAdd->editAdd();
       // dump($data);die;
        $province = $this->getProvinceName($data['province']);
        $data['province'] = $province;
        //echo $data['province'];die;
        $rules = array(
            array('name','require','请填写姓名'),
            array('address','require','请填写详细地址',1),
            array('mobile','11','请输入正确的手机号码',0,'length'),
            //array('province','0','请选择省份',1,'equal',)
        );
       // echo $data['province'];die;
        if (!$UserAdd->validate($rules)->create($data)) {
            $this->error($UserAdd->getError());
        }
        $res = $UserAdd->add($data);
        if($res){
            $this->success('编辑成功',U('Home/Index/index'));
        }
    }

    /**
     * 获取市级
     */
    public function getCity(){
        $id = I('post.id');
        $city = M('Address');
        $data = $city->where('parent_id='.$id)->select();
        $this->assign('city',$data);
        echo $this->fetch('getCity');
    }

    /**
     * 新增地址
     */
    public  function insertAdd(){
        $this->display();
    }

    /**
     * 选择地址
     */
    public function changeAdd(){
        $this->display();


    }

    /**
     * 查看是否收藏
     */
    public function isCollect(){



    }

    /**
     * 点击收藏
     */
    public function collect(){
        if(IS_AJAX){
            $id = I('post.id', 0, 'int');//商品id
            $data = array(
                'uid'=>session('user_id'),
                'gid'=>$id,
                'add_time'=>time(),
                'is_attention'=>1,

            );
            //dump($data);die;
            $collect = M('Collect');
            $res = $collect->data($data)->add();
            echo $collect->getLastSql();die;
        }


        //查看收藏

        $collect = D('CollectView');
        //session('user_id');die;
        $where = session('user_id');
        $data = $collect->where($where)->group('gid')->select();
        //dump($data);die;
        //echo $collect->getLastSql();die;
        $this->assign('collect', $data);
        $this->display();
    }

    /**
     * 取消收藏
     */
    public function cancleCollect(){
        $id = I("post.id",0,'int');
        $data = array(
            //'uid' =>1,
            //'gid'=>$id,
            "add_time"=>time(),
            "is_attention"=>0,

        );
        $where = array(
            'uid' => 1,
            'gid' =>$id,
        );
        $collect = M('Collect');
        $data = $collect->where($where)->save($data);
        echo $collect->getLastSql();die;
    }


    public function charge(){
        $this->display();
    }

}