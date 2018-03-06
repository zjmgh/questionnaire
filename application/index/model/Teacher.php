<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:29
 */
namespace app\index\model;
use think\Model;
class Teacher extends Model{
    public function course(){
        return $this->belongsTo('course');
    }
    public function inquire(){
        return $this->hasOne('inquire');
    }
    public function studentinfo(){
        return $this->hasMany('student');
    }
}