<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 15:48
 */
namespace app\userindex\model;
use think\Model;
class Question extends Model{
    public function inquire(){
        return $this->belongsTo('inquire');
    }

    public function result(){
        return $this->hasOne('result');
    }

}