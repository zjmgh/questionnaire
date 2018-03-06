<?php

/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/8/27
 * Time: 21:07
 */
namespace app\index\validate;
use think\Validate;

class Teacher extends Validate{
    protected $rule = [
        'name|老师姓名'=>'require',
    ];
    protected $message = [
        'name.require' => '姓名必须填写!',
    ];
    protected $scene = [
        'create' => ['name'],
        'edit'=>['name'],
    ];
}