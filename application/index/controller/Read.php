<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/4
 * Time: 14:38
 */
namespace app\index\controller;
use app\userindex\model\Course;
use think\Controller;
use app\index\Model\Course as CourseModel;
use app\index\Model\Teacher as TeacherModel;
use app\index\Model\Inquire as InquireModel;
use app\index\Model\Question as QuestionModel;
use app\index\Model\Result as ResultModel;
class Read extends Controller{
    public function showCourse(){
        $course = CourseModel::all();
        $this->assign('course',$course);
        return view();
    }

    public function showInquire(){
        $question = QuestionModel::all();
        $this->assign('question',$question);
        return view();
    }

    public function showQuestion(){
        $result = ResultModel::all();
        $this->assign('result',$result);
        return view();
    }
}