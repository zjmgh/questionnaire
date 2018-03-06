<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/2
 * Time: 14:10
 */
namespace app\userindex\controller;
use think\Controller;
use think\Session;
use app\userindex\Model\Student;
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
            $result = $this->validate($data,'Student.index');
            if($result !== true){
                $this->error($result);
            }else{
                $user = Student::where(['name'=>$data['username'],'password'=>$data['password']])->find();
                if($user){
                    $user = $user->toArray();
                    Session::set('name',$user['name']);
                    $this->success('欢迎！','index/index');
                }else{
                    $this->error('用户名或密码错误!');
                }
            }
        }else{
            $this->error('验证码错误');
        }
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