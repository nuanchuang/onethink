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
/*
 * 导航首页部分
 */
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

    //报修添加
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

    //小区活动
    public function notice(){
        $document = M('Document');
        $name['category_id'] = '40';
        $name['status'] = '1';
        $documents = $document->where($name)->select();

        $this->assign('documents',$documents);
        $this->display('notice');
    }

    //活动详情
    public function notice_detail(){
        $this->display('notice_detail');
    }

    //商家活动
    public function activity(){
        $document = M('Document');
        $name['category_id'] = '42';
        $name['status'] = '1';
        $documents = $document->where($name)->select();

        $this->assign('documents',$documents);
        $this->display('activity');
    }

    //小区活动
    public function re(){
        $document = M('Document');
        $name['category_id'] = '44';
        $name['status'] = '1';
        $documents = $document->where($name)->select();

        $this->assign('documents',$documents);
        $this->display('re');
    }


    //便民服务
    public function service(){
        $document = M('Document');
        $name['category_id'] = '45';
        $name['status'] = '1';
        $documents = $document->where($name)->select();

        $this->assign('documents',$documents);
        $this->display('service');
    }

    //小区租售
    public function zushou(){
        $document = M('Document');
//        $name['category_id'] = '45';
//        $name['status'] = '1';
//        $documents = $document->where($name)->select();

//        $this->assign('documents',$documents);
        $this->display('zushou');
    }


    //便民服务
    public function noticeALL(){
        $document = M('Document');
        $name['status'] = '1';
        $documents = $document->where($name)->select();

        $this->assign('documents',$documents);
        $this->display('noticeALL');
    }

    /*
 * 导航页服务
 */
    //服务
    public function fuwu(){
//        $document = M('Document');
        $this->display('fuwu');
    }

    //业主认证
    public function yezhurenzheng(){
//        $document = M('Document');
        $this->display('yezhurenzheng');
    }

    //关于我们
    public function about(){
//        $document = M('Document');
        $this->display('about');
    }


    /*
     * 导航页发现
     */
    //发现
    public function faxian(){
//        $document = M('Document');
        $this->display('faxian');
    }


    /*
     * 导航页个人中心
     */
    //我的
    public function my(){
//        $document = M('Document');
        $this->display('my');
    }

    //报修管理
    public function mybaoxiu(){
        $baoxiu = M('Baoxiu');
        $baoxiues = $baoxiu->select();
        $this->assign('baoxiues',$baoxiues);
        $this->display('mybaoxiu');
    }
}