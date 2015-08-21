<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/8
 * Time: 9:47
 */
namespace Admin\Model;

use Think\Model\RelationModel;

class OrdersRelationModel extends  RelationModel{
    protected $tableName = 'Orders';

    protected $_link = array(
        'user'=>array(
            'mapping_type'=>self::BELONGS_TO,
            'foreign_key'=>'uid',
            'mapping_fields'=>'mobile',
            'as_fields'=>'mobile'
        ),

//        'user_address'=>array(
//            'mapping_type'=>self::HAS_ONE,
//            'class_name'=>'user_address',
//            'foreign_key'=>"address_id",
//            'mapping_fields'=>'address',
//            'as_fields'=>'address'
//        ),

//        'orders_goods'=>array(
//            'mapping_type'=>self::HAS_MANY,
//            'foreign_key'=>'oid',
//            'mapping_fields'=>'gid'
//        ),




    );


}