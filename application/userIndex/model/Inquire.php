<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 15:47
 */
namespace app\userindex\model;
use think\Model;
class Inquire extends Model{
    public function teacher(){
        return $this->belongsTo('teacher');
    }
    public function questioninfo(){
        return $this->hasMany('question');
    }

}