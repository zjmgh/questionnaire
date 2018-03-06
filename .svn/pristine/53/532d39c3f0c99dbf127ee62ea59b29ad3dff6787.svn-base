<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 14:30
 */
namespace app\userindex\model;
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