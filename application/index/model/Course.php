<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:26
 */
namespace app\index\model;
use think\Model;
class Course extends Model{
    //远程一对多
    /*public function students(){
        return $this->hasManyThrough('Student','Teacher');
    }*/

    public function teacherinfo(){
        return $this->hasMany('teacher');
    }



}