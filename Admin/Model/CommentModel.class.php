<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/1
 * Time: 10:27
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class CommentModel extends RelationModel
{

    protected $_link = array(
        'goods' => array(
            'mapping_type' => self::BELONGS_TO,
            'foreign_key' => 'gid',
            'mapping_fields' => 'goods_name',
            'as_fields' => 'goods_name',

        ),

        'user' => array(
            'mapping_type' => self::BELONGS_TO,
            'mapping_fields' => 'username',
            'foreign_key' => 'uid',
            'as_fields' => 'username'

        )

    );

    public function getComment()
    {
        return;
    }

    /**
     * @return mixed
     */
    public function addComment()
    {
        $data = array(
            'gid' => I('goods_id'),
            'uid' => I('user_id'),
            'IPaddress' => I('com_ip'),
            'add_time' => I('com_time'),
            'status' => I('is_show', 0, 'int'),
            'content' =>I('com_content')
        );
        //dump($data);die;
        $res = $this->data($data)->add();
        return $res;


    }
}