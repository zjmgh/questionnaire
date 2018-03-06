<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 14:30
 */
namespace app\userindex\model;
use think\Model;
class Course extends Model{
    public function teacherinfo(){
        return $this->hasMany('teacher');
    }
}