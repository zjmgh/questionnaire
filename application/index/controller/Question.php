<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 21:13
 */
namespace app\index\controller;
use app\index\model\Question as Ques;
use app\index\model\Result as Res;
use think\Controller;
use think\Db;

class Question extends Controller{
    public function index(){
        $data = Ques::all();
        $this->assign('count',count($data));
        $this->assign('data',$data);
        return view();
    }

    public function create(){
        return view();
    }

    public function addindex(){
        $data = Ques::all();
        $this->assign('data',$data);
        return view();
    }
    public function addinquire(){

    }

    public function save(){
        $question = new Ques();
        $data['title'] = input('post.title');
        $data['option1'] = input('option1');
        $data['option2'] = input('option2');
        $data['option3'] = input('option3');
        $data['option4'] = input('option4');
        $data['option5'] = input('option5');
        if ($question->validate(true)->save($data)){
            $result = new Res();
            $result->question_id = $question->id;
            $result->save();
            $this->success('问题添加成功','question/index');
        }else{
            $this->error($question->getError());
        }
    }
    public function delete($id){
        $question = Ques::get($id);
        if($question){
            if($question->delete()){
                $result = new Res();
                $result->where('question_id',$id)->delete();
                $this->success('问题删除成功','question/index');
            }else{
                $this->error('问题删除失败');
            }
        }else{
            $this->error('问题不存在');
        }
    }

    public function edit($id){
        $question = Ques::get($id);
        $this->assign('question',$question);
        return view();
    }

    public function update($id){
        $question = new Ques();
        $data['title'] = input('post.title');
        $data['option1'] = input('option1');
        $data['option2'] = input('option2');
        $data['option3'] = input('option3');
        $data['option4'] = input('option4');
        $data['option5'] = input('option5');
        if ($question->validate(true)->where('id',$id)->update($data)){
            $this->success('问题修改成功','question/index');
        }else{
            $this->error($question->getError());
        }
    }

    public function data_del(){
        echo "delete!";
    }
}