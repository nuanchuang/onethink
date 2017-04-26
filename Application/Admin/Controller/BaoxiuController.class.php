<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;

/**
 * 后台频道控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */

class BaoxiuController extends AdminController {

    /**
     * 频道列表
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index(){
//        $pid = I('get.pid', 0);
//        var_dump($pid);
//        exit;
        /* 获取频道列表 */
//        $map  = array('status' => array('gt', -1), 'pid'=>$pid);
//        var_dump($map);
//        exit;
        $list = M('Baoxiu')->order('id asc')->select();
//        var_dump($list);
//        exit;
//        $list->update_time = date('Y-m-d H:i:s',$list['create_time']);
//        $list->status =
//        <switch name="$list->status">
//            <case value="0">处理中</case>
//            <case value="1">处理完成</case>
//        </switch>
        $this->assign('list', $list);
//        $this->assign('pid', $pid);
        $this->meta_title = '报修管理';
        $this->display('index');
    }


    /**
     * 添加频道
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function add(){
        if(IS_POST){
            $Baoxiu = D('Baoxiu');
//            var_dump($Channel);
//            exit;
            $data = $Baoxiu->create();
            if($data){
                $Baoxiu->create_time = time();
                $id = $Baoxiu->add();
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_Baoxiu', 'Baoxiu', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Baoxiu->getError());
            }
        } else {
//            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
                $parent = M('create')->field('title')->find();
                $this->assign('parent', $parent);
            }

//            $this->assign('pid', $pid);
            $this->assign('info',null);
            $this->meta_title = '新增导航';
            $this->display('add');
        }
    }

    /**
     * 编辑频道
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function edit($id = 0){
        if(IS_POST){
            $Baoxiu = D('Baoxiu');
            $data = $Baoxiu->create();
            if($data){
                if($Baoxiu->save()){
                    //记录行为
                    action_log('update_Baoxiu', 'Baoxiu', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Baoxiu->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Baoxiu')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }

            $pid = I('get.pid', 0);
            //获取父导航
            if(!empty($pid)){
            	$parent = M('Baoxiu')->where(array('id'=>$pid))->field('title')->find();
            	$this->assign('parent', $parent);
            }

            $this->assign('pid', $pid);
            $this->assign('info', $info);
            $this->meta_title = '编辑导航';
            $this->display();
        }
    }

    /**
     * 删除频道
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Baoxiu')->where($map)->delete()){
            //记录行为
            action_log('update_Baoxiu', 'Baoxiu', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    /**
     * 导航排序
     * @author huajie <banhuajie@163.com>
     */
    public function sort(){
        if(IS_GET){
            $ids = I('get.ids');
            $pid = I('get.pid');

            //获取排序的数据
            $map = array('status'=>array('gt',-1));
            if(!empty($ids)){
                $map['id'] = array('in',$ids);
            }else{
                if($pid !== ''){
                    $map['pid'] = $pid;
                }
            }
            $list = M('Channel')->where($map)->field('id,title')->order('sort asc,id asc')->select();

            $this->assign('list', $list);
            $this->meta_title = '导航排序';
            $this->display();
        }elseif (IS_POST){
            $ids = I('post.ids');
            $ids = explode(',', $ids);
            foreach ($ids as $key=>$value){
                $res = M('Channel')->where(array('id'=>$value))->setField('sort', $key+1);
            }
            if($res !== false){
                $this->success('排序成功！');
            }else{
                $this->error('排序失败！');
            }
        }else{
            $this->error('非法请求！');
        }
    }

    public function look($id){
//        $Baoxiu = M("Baoxiu");
//        $Baoxiu->where('id='.$id)->select();
        $id = array_unique((array)I('id',$id));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        $list = M('Baoxiu')->where($map)->find();
//        var_dump($list);
//        exit;
        if($list){
            //记录行为
            $this->assign('list',$list);
//            action_log('update_Baoxiu', 'Baoxiu', $id, UID);
            $this->display('look');
        } else {
            $this->error('无法查看！');
        }
    }
}