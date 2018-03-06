<?php

/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/9/4
 * Time: 16:30
 */
namespace app\index\validate;
use think\Validate;

class Question extends Validate{
    protected $rule = [
        'title|问卷内容'=>'require',

    ];
    protected $message = [
        'title.require' => '问卷内容不能为空!',

    ];
    protected $scene = [
        'create' =>['title'],
        'edit' =>['title']
    ];
}