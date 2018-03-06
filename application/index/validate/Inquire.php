<?php

/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/9/4
 * Time: 15:37
 */
namespace app\index\validate;
use think\Validate;

class Inquire extends Validate{
    protected $rule = [
        'name|问卷名'=>'require',

    ];
    protected $message = [
        'name.require' => '问卷名必须填写!',

    ];
    protected $scene = [

        'add' => ['name'],
        'edit'=>['name'],
    ];
}