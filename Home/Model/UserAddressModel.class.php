<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/6
 * Time: 15:49
 * 收货地址模型
 */

namespace Home\Model;
use Think\Model;

class UserAddressModel extends Model{

    /**
     * 编辑地址
     */

    public function editAdd(){
        /**
         * 验证
         */
        $data = array(
            'receipt_name'=>I('post.name'),
            'province'=>I('post.province'),
            'city'=>I('post.city'),
            'address'=>I('post.address'),
            'mobile'=>I('post.mobile')

        );

        return $data;

    }


}