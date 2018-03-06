<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/27
 * Time: 20:58
 */
namespace app\index\controller;
use think\Controller;
use think\Session;
use app\index\Model\Admin;
use think\captcha\Captcha;

class Login extends Controller{
    public function index(){
        return view();
    }

    public function save($code=''){
        $captcha = new Captcha();
        if($captcha->check($code)){
            $data['username'] = input('post.username');
            $data['password'] = input('post.password');
            $result = $this->validate($data,'Admin.index');
            if($result !== true){
                $this->error($result);
            }else{
                $user = Admin::where(['username'=>$data['username'],'password'=>md5($data['password'])])->find();
                if($user){
                    $user = $user->toArray();
                    Session::set('name',$user['username']);
                    $this->success('欢迎！','index/index');
                }else{
                    $this->error('用户名或密码错误!');
                }
            }
        }else{
            $this->error('验证码错误');
        }
    }

    public function changePwd(){
        return view();
    }

    public function logout(){
        if(Session::has('name')) {
            Session::delete('name');
            Session::clear();
            $this->success('退出成功!', 'login/index');
        }else{
            $this->error('非法操作!','login/index');
        }
    }

    public function _empty(){
        $this->error('该方法不存在','login/index');
    }
}