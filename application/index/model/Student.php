<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:30
 */
namespace app\index\model;
use think\Model;
class Student extends Model{
    public function teacher(){
        return $this->belongsTo('teacher');
    }
}