<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/25
 * Time: 14:14
 */
namespace app\index\controller;
use think\Controller;
class Error extends Controller{
    public function index(){
        $controller = $this->request->controller();
        $this->error("{$controller}控制器不存在",'login/index');
    }
}