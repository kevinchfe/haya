<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/19
 * Time: 18:25
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class GoodsRelationModel extends RelationModel{
    protected $tableName = 'goods';

    //关联图片表
    protected $_link = array(
        'goods_pic' => array(
            'mapping_type' => self::HAS_MANY,
            'foreign_key'  => 'gid',
            'class_name' => 'goods_pic',
            'mapping_name' => 'goods_pic',
            'mapping_fields' => array('pic_url'),
        ),
    );

    protected $_validate = array(
        array('goods_name', 'require', '商品名不能为空'), //商品
        array('goods_price', 'require', '商品价格不能为空'),//价格
        array('goods_stock', 'require', '库存不能为空'),
        array('cat_id', 'require', '分类不能为空'),
        array('goods_desc', 'require', '描述不能为空'),
    );


    /**
     * 关联插入
     * @param null $data
     * @return mixed
     */
    public function insertGoods($data=null){
        $data = is_null($data) ? $_POST : $data;
        return $this->Relation('goods_pic')->data($data)->add();
    }

}