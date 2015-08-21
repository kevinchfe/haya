<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/14
 * Time: 14:23
 */

namespace Admin\Model;

use Think\Model;

class CategoryModel extends Model{
    protected $_validate = array(
        array('cat_name','require','分类名不能为空！'), //默认情况下用正则进行验证
    );
}
