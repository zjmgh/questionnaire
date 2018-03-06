<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:28
 */
namespace app\index\model;
use think\Model;
class Inquire extends Model{
    public function teacher(){
        return $this->belongsTo('teacher');
    }

    public function questioninfo(){
        return $this->hasMany('question');
    }
}