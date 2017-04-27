<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){

        $category = D('Category')->getTree();
//        $lists    = D('Document')->lists(null);
//
        $this->assign('category',$category);//栏目
//        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页

                 
        $this->display();
    }

    public function add(){
        if(IS_POST){
            $Baoxiu = D('Baoxiu');
//            var_dump($Baoxiu);
//            exit;
            $data = $Baoxiu->create();

            if($data){
                $Baoxiu->create_time = time();
                $id = $Baoxiu->add();
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    //action_log('update_Baoxiu', 'Baoxiu', $id, UID);
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
            $this->display('online');
        }
    }

    public function notice(){
        $document = M('Document');
        $documents = $document->where('status=1')->select();

        $this->assign('documents',$documents);
        $this->display('notice');
    }


    public function notice_detail(){
        $this->display('notice_detail');
    }
}