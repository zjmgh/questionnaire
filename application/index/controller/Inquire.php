<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 20:44
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Inquire as InquireModel;
use app\index\model\Teacher as TeacherModel;
use app\index\model\Question as QuestionModel;

class Inquire extends Controller{
    public function index(){
        $inquire = InquireModel::all();
        $teacher = TeacherModel::all();
        $this->assign('inquire',$inquire);
        $this->assign('teacher',$teacher);
        return view();
    }

    public function add(){
        $t = new TeacherModel();
        $teacher = $t->all();
        $this->assign('teacher',$teacher);
        return view();
    }
    public function insert(){
        $inquire = new InquireModel();
        $data['name'] = input('post.name');
        $data['teacher_id'] = input('post.teacher');
        if($inquire->allowField(true)->validate(true)->save($data)){
            $this->success('添加成功!','inquire/index');
        }else{
            $this->error($inquire->getError());
        }
    }

    public function create($id){
        $inquire = InquireModel::find($id);
        $question = new QuestionModel();
        $data = $question->all();
        $this->assign('data',$data);
        $this->assign('inquire',$inquire);
        return view('inquire/create');
    }

    public function save($id){
        $question = new QuestionModel();
        $data['inquire_id'] = $id;
        $data['title'] = input('post.title');
        if($question->allowField(true)->validate(true)->save($data)){
            $this->success('添加成功!','inquire/index');
        }else{
            $this->error($question->getError());
        }
    }

    public function delete($id){
        $inquire = InquireModel::get($id);
        if($inquire){
            if($inquire->delete()){
                $que = new QuestionModel();
                $que->save([
                    'inquire_id' => '0',
                ],['inquire_id' => $id]);
                $this->success('删除成功!','inquire/index');
            }else{
                $this->error('删除失败!');
            }
        }else{
            $this->error('删除数据不存在!');
        }
    }

    public function edit($id){
        $inquire = InquireModel::get($id);
        $teacher = new TeacherModel();
        $data = $teacher->all();
        $this->assign('data',$data);
        $this->assign('inquire',$inquire);
        return view();
    }

    public function update($id){
        $inquire = new InquireModel();
        $data['id'] = $id;
        $data['name'] = input('post.name');
        $data['teacher_id'] = input('post.teacher');

        $this->validate($data,'inquire.edit');
        if($inquire->isUpdate(true)->validate(true)->save($data)){
            $this->success('数据修改成功!','inquire/index');
        }else{
            $this->error($inquire->getError());
        }
    }



}