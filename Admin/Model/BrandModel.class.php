<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/22
 * Time: 9:48
 */

namespace Admin\Model;

use Think\Model;

class BrandModel extends Model{
    protected $_validate = array(
        array('brand_name','require','分类名不能为空！'),
    );
}