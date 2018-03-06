<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 21:11
 */
namespace app\index\controller;
use app\index\model\Student as StudentModel;
use app\index\model\Teacher as TeacherModel;
use think\Controller;
use think\Db;

class Student extends Controller{
    public function index(){
        $test =StudentModel::all();
        $this->assign('test',$test);
        $this->assign('sum',count($test));

        $list = StudentModel::paginate(3);
        $this->assign('list',$list);
        $this->assign('count',count($list));
        return view('student/index');
    }

    public function create(){
        $teacher = new TeacherModel();
        $list = $teacher->all();
        $this->assign('list',$list);
        return view('student/create');
    }

    public function add(){
        $user = new StudentModel();
        $data['name'] = input('post.name');
        $data['sex'] = input('post.sex');
        $data['age'] = input('post.age');
        $data['teacher_id'] = input('post.teacher');

        if($user->allowField(true)->save($data)){
            $this->success('创建成功','student/index');
        }else{
            $this->error($user->getError());
        }
    }

    public function delete($id){
        $student = StudentModel::get($id);
        if($student){
            if($student->delete()){
                $this->success('删除成功','student/index');
            }else{
                $this->error('删除失败','student/index');
            }
        }else{
            $this->error('删除数据不存在','student/index');
        }
    }

    public function data_del(){
        if ($_POST['allDel']) {

            if (empty($_POST['id'])) {
                echo "<script>alert('必须选择一个产品,才可以删除!');
                       history.back(-1);</script>";
                exit;
            } else {
                $id = implode(",", $_POST['id']);
                if (Db::name('student')->delete("$id")) {
                    $this->success('数据删除成功！', 'student/index');
                } else {
                    $this->error('数据删除失败!');
                }
            }
        }
    }

    public function edit($id){
        $student = StudentModel::find($id);
        $this->assign('student',$student);
        return view('student/edit');
    }

    public function update($id){
        $student = new StudentModel();
        $data['id']=$id;
        $data['name']=input('post.name');
        $data['sex']=input('post.sex');
        $data['age']=input('post.age');
        $data['course_id']=input('post.teacher_id');
        //$this->validate($data,'User.edit');

        if($student->isUpdate(true)->save($data)){
            $this->success("数据修改成功",'Student/index');
        }else{
            $this->error($student->getError());
        }
    }

    public function lookup(){
        $result = $this->request->param('name');
        $list=StudentModel::where('id','like','%'.$result)->whereOr('name','like','%'.$result)->select();
        $this->assign('list', $list);
        return view('student/lookup');
    }
}