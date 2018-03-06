<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 17:50
 */
namespace app\index\Model;
use think\Model;
class Result extends Model{
    public function question(){
        $this->belongsTo('question');
    }
}