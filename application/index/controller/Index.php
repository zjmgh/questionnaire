<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/28
 * Time: 11:23
 */
namespace app\index\controller;
use think\Controller;
use app\index\Model\Course as CourseModel;
use app\index\Model\Teacher as TeacherModel;
use app\index\Model\Student as StudentModel;
use app\index\Model\Inquire as InquireModel;
use app\index\Model\Question as QuestionModel;
use app\index\Model\Result as ResultModel;
class Index extends Controller{
    public function index(){
        $teacher = TeacherModel::all();
        $course = CourseModel::all();

        foreach($teacher as $v){
            $student = StudentModel::all(['teacher_id' => $v->id,'status'=>2]);
            $stu_num[] = count($student);
            $totalStu = StudentModel::all(['teacher_id' => $v->id,'status'=>1]);
            $total[] = count($totalStu)+count($student);
        }

        $this->assign('i',0);
        $this->assign('stu_num',$stu_num);
        $this->assign('total',$total);
        $this->assign('teacher',$teacher);
        $this->assign('course',$course);
        $this->assign('time',date("H:i:s",time()));
        $this->assign('date',date("Y-m-d",time()));
        return view();
    }
}

