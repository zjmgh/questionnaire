<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 17:47
 */
namespace app\index\Controller;
//use app\userindex\validate\Student;
use think\Controller;
use app\index\Model\Result as ResultModel;
use app\index\Model\Student as StudentModel;
class Result extends Controller{
    public function add(){
        $post = input('post.');
        $keys = array_keys($post);
        foreach($keys as $k){//$k 6,7,submit
            if("submit" != $k) { //过滤submit
                $arr = ResultModel::where('question_id', $k)->find();
                //if (count($arr)) {
                    $result = "result" . $post[$k];
                    $data[$result] = $arr[$result] + 1;
                    ResultModel::where('question_id', $k)->Update([$result => $data[$result]]);
                /*} else {
                    $res = new ResultModel([
                        "result" . $post[$k] => 1,
                        'question_id' => $k
                    ]);
                    $res->save();
                }*/
            }else{
                $stu = new StudentModel();
                $stu->where('name',session('name'))->update(['status'=>2]);
                $this->redirect("__ROOT__/userindex/index/index");
            }
        }

    }


}