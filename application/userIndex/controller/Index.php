<?php
namespace app\userindex\controller;
use app\userindex\model\Course;
use app\userindex\model\Inquire;
use app\userindex\model\Teacher;
use think\Controller;
use think\Session;
use app\userindex\Model\Student;
class Index extends Controller{
    protected $beforeActionList=[
        'check',
    ];

    public function check(){
        if(!Session::has('name')){
            $this->success('非法操作!','login/index');
        }
    }

    public function index(){
        $name = Session::get('name');
        $user = Student::where('name',$name)->find();
        $teacher = Teacher::where('id',$user['teacher_id'])->find();
        $course = Course::where('id',$teacher['course_id'])->find();

        $time = date("Y-m-d",time());

        $this->assign('teacher',$teacher);
        $this->assign('course',$course);
        $this->assign('time',$time);
        $this->assign('user',$user);
        return view();
    }
    public function show(){
        $name = Session::get('name');
        $user = Student::where('name',$name)->find();
        $teacher = Teacher::where('id',$user['teacher_id'])->find();//echo "<script>alert('必须选择一个产品,才可以删除!');history.back(-1);</script>";
        $inquire = $teacher->inquire()->where('teacher_id',$teacher['id'])->find();
        $question = $inquire->questioninfo()->where('inquire_id',$inquire['id'])->select();
        $this->assign('question',$question);
        $this->assign('i',$i=1);
        return view();
    }
}
