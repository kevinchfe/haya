<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/31
 * Time: 11:29
 */
namespace Home\Model;

use Think\Model\RelationModel;

class GoodsRelationModel extends RelationModel{
    protected $tableName = 'goods';

    protected $_link = array(
        'goods_pic' => array(
            'mapping_type' => self::HAS_MANY,
            'foreign_key' => 'gid',
        ),
    );


    public function getGoodsDesc($id){
        return $this->Relation(true)->find($id);
    }
}