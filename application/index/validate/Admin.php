<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 9:49
 */
namespace app\index\validate;
use think\validate;
class Admin extends Validate{
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