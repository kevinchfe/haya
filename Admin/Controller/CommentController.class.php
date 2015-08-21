<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/31
 * Time: 17:00
 */
namespace Admin\Controller;

class CommentController extends BaseController
{
    /**
     * 评论列表
     */

    public function index()
    {
        $comment = D('CommentRelation');
        $data = $comment->relation(true)->order('add_time desc')->select();
        //echo $comment->getLastSql();
        //dump($data);die;
        $this->assign('data', $data);

        $this->display();
    }

    /**
     * 添加评论
     */
    public function addComment()
    {
        if (!IS_POST) {
            $user = M('User');
            $goods = M('Goods');
            $user = $user->select();
            $goods = $goods->select();
            $this->assign('goods', $goods);
            $this->assign('user', $user);
            $this->display();
        } else {
            $comment = D('Comment');
            $data = $comment->addComment();
           // dump($data);die;
            if ($data) {
                $this->success('新增成功', U('Admin/Comment/index'));
                exit;
            } else {
                $this->error('失败');
            }
        }
    }

    /**
     * 详情
     * m=Admin&c=Comment&a=desc&id=6
     * m=Admin&c=Comment&a=desc&id=4
     * m=Admin&c=Comment&a=desc&id=9
     * m=Admin&c=Comment&a=desc&id=15
     *
     */
    public function desc(){
//        if (!IS_GET) {
//            $this->redirect('index');
//        }
        $id = I('get.id',0,'int');
        //echo $id;die;
        $where['id'] = $id;
        $comment = D('CommentRelation');
        $data = $comment->relation(true)->where($where)->find();
        //echo $comment->getLastSql();
        //dump($data);die;
        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 删除评论
     */
    public function del(){
        if(!IS_GET){
            $this->redirect('index');
        }
        $id = I('id',0,'int');
        $res = M('Comment')->delete($id);
        //echo M('Comment')->getLastSql();die;
        if($res){
            $this->success('删除成功',U('Admin/Comment/index'));
        }else{
            $this->error('删除失败');
        }

    }
}