<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 20:58
 */
namespace app\userindex\model;
use think\Model;
class Student extends Model{
    public function teacher(){
        return $this->belongsTo('teacher');
    }

    //读取器
    public function getStatusAttr($value){
        $key = ['0'=>'问卷未开启','1'=>'问卷进行中','2'=>'已填写问卷'];
        return $key[$value];
    }
}