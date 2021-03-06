<?php

/**
 * Created by PhpStorm.
 * User: zjm
 * Date: 2017/8/27
 * Time: 20:02
 */
namespace app\index\controller;
use think\Controller;
use app\index\model\Teacher as TeacherModel;
use app\index\model\Course as CourseModel;
use app\index\model\Student as StudentModel;

class Teacher extends Controller{

    public function index(){
        $data = TeacherModel::paginate(5);
        $this->assign('data',$data);
        return view();
    }

    public function create(){
        $teacher = new CourseModel();
        $data = $teacher->all();
        /*var_dump($data);
        die;*/

        $this->assign('data',$data);
        return view();
    }

    public function save(){
        $teacher = new TeacherModel();

        $data['name'] = input('post.name');
        $data['sex'] = input('post.sex');
        $data['age'] = input('post.age');
        $data['course_id'] = input('post.course');

        if($teacher->allowField(true)->validate(true)->save($data)){
            $this->success('添加成功!','teacher/index');
        }else{
            $this->error($teacher->getError());
        }

    }

    public function delete($id){
        $teacher = TeacherModel::get($id);
        if($teacher){
            if($teacher->delete()){
                $stu = new StudentModel();
                $stu->save([
                    'teacher_id' => '0',
                ],['teacher_id' => $id]);
                $this->success('删除成功!','teacher/index');
            }else{
                $this->error('删除失败!');
            }
        }else{
            $this->error('删除数据不存在!');
        }
    }

    public function edit($id){
        $teacher = TeacherModel::get($id);
        $t = new CourseModel();
        $data = $t->all();
        $this->assign('data',$data);
        $this->assign('teacher',$teacher);
        return view();
    }

    public function update($id){
        $teacher = new TeacherModel();
        $data['id'] = $id;
        $data['name'] = input('post.name');
        $data['age'] = input('post.age');
        $data['course_id'] = input('post.course');
        //验证场景为修改页面（控制器.场景）
        $this->validate($data,'Teacher.edit');
        if($teacher->isUpdate(true)->validate(true)->save($data)){
            $this->success('数据修改成功!','teacher/index');
        }else{
            $this->error($teacher->getError());
        }
    }

}
