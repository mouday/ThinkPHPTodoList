<?php
namespace app\index\model;

use think\Model;
use traits\model\SoftDelete;

class TodoList extends Model
{
    use SoftDelete;

    protected $autoWriteTimestamp = true;  // 开启自动时间戳
    protected $createTime = 'create_time'; // 可自定义时间字段名
    protected $updateTime = 'update_time'; // 关闭 false
    protected $deleteTime = 'delete_time';

    public function getDeleteTimeAttr ($val) {
        if($val){
            return date('Y-m-d H:i:s', $val);
        }
        else{
            return $val;
        }
}
}
