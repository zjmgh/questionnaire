<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 21:00
 */
namespace app\userindex\validate;
use think\validate;
class Student extends Validate{
    protected $rule=[
        'username'=>'require',
        'password'=>'require',
    ];

    protected $message=[
        'username.require'=>'用户名不能为空!',
        'password.require'=>'密码不能为空!'
    ];

    protected $scene=[
        'index'=>'username,password',
    ];
}