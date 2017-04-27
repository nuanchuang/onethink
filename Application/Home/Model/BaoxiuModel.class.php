<?php
namespace Home\Model;
use Think\Model;

/**
 * 导航模型
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */

class BaoxiuModel extends Model {
//    public static $status = ['-1'=>'已接收',0=>'处理中',1=>'处理完成'];
    protected $_validate = array(
        array('name','require','报修人不能为空'),
        array('tel','require','电话不能为空'),
        array('address','require','地址不能为空'),
        array('title','require','标题（简述问题）不能为空'),
        array('text','require','问题不能为空'),
    );

    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', '1', self::MODEL_INSERT),
    );
}
