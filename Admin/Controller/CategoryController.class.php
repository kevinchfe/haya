<?php
/**
 * Created by PhpStorm.
 * User: Jerry
 * Date: 2015/7/13
 * Time: 22:19
 */
namespace Admin\Controller;

class CategoryController extends BaseController
{
    public function index(){
        $cat = M('category');
        $list = $cat->select();
        $this->assign('cat_list', $list);
        $this->display();
    }

    /**
     * 添加页面
     */
    public function addCat(){
        $cat = M('category');
        $catList = $cat->select();
        $this->assign('catList',$catList);

        $this->display();
    }

    /**
     * 编辑页面
     */
    public function editCat(){
        if(!IS_GET){
            $this->redirect('index');
        }
        $cid = I('get.cid', 0, 'int');
        $cat = M('category');
        $category = $cat->where('id=' . $cid)->find();
        $this->assign('category', $category);

        $list = $cat->select();
        $this->assign('list', $list);

        $this->display();
    }

    /**
     * 处理添加
     */
    public function insertCat(){
        if(!IS_POST){
            $this->redirect('index');
        }
        $data = I('post.');
        $cat = D('category');
        if ($cat->create()) {
            $rs = $cat->add();
            if ($rs) {
                $this->success('添加成功',U('Admin/Category/index'));
                exit;
            }
        }
        $this->error($cat->getError());
    }

    /**
     * 修改
     */
    public function updateCat(){
        if(!IS_GET){
            $this->redirect('index');
        }

        $data = array();
        $data['cat_name'] = I('post.cat_name');
        $data['cat_desc'] = I('post.cat_desc');
        $data['parent_id'] = I('post.parent_id');
        $data['id'] = I('post.id', '', 'int');

        $cat = D('category');
        if ($cat->create()) {
            $rs = $cat->save($data);
            if ($rs == 1) {
                $this->success('成功', U('Admin/Category/index'));
                exit;
            }
        }
        $this->error($cat->getError());

    }

    /**
     * 删除
     */
    public function delCat(){
        if(!IS_GET){
            $this->redirect('index');
        }

        $cid = I('get.cid', '', 'int');
        if ($cid < 1) {
            $this->success('删除成功',U('Admin/Category/index'));
        }

        $cat = M('category');
        $rs = $cat->delete($cid);
        if (!$rs) {
            $this->error('失败');
        }
        $this->redirect('index');
    }
}
