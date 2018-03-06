<?php
namespace app\index\Controller;

use think\Controller;
use app\index\Model\Course as CourseModel;
use app\index\Model\Teacher as TeacherModel;
use think\Db;
class Course extends Controller
{
    //显示总课程页面
    public function index()
    {
        $data = CourseModel::paginate(4);//获取全部数据,并设置每页数据量为3
        $this->assign('count',count($data));
        $this->assign('data', $data);
        return view();
    }

    //添加课程
    public function add()
    {
        return view();
    }

    //保存添加的课程
    public function save()
    {
        $course = new CourseModel();
        //$name = input('post.name');
        $data['name'] = $this->request->param('name');
        $result = $this->validate(//使用内部验证
            ['name' => $data['name']],
            ['name' => 'require|min:2'],
            [
                'name.require' => '名称必须填写!',
                'name.min' => '名称的长度不能少于2个字符'
            ]
        );
        if ($result === true) {
            $arr = $course->save($data);
            if ($arr) {
                $this->success('数据添加成功！', 'course/index');
            } else {
                $this->error('数据添加失败!');
            }

        } else {
            $this->error($result);
        }
    }

    //编辑查询相关的单条数据
    public function edit($id)
    {
        $data = CourseModel::get($id);;
        $this->assign('data', $data);
        return view();
    }

    //数据更新
    public function update($id = array())
    {
        $course = CourseModel::get($id);
        $data['name'] = input('post.name');
        $result = $this->validate(
            ['name' => $data['name']],
            ['name' => 'require|min:2'],
            [
                'name.require' => '名称必须填写!',
                'name.min' => '名称的长度不能少于2个字符'
            ]
        );
        if ($result === true) {
            if ($course->save($data)) {
                $this->success('数据保存成功！', 'course/index');
            } else {
                $this->error('数据未更改!');
            }

        } else {
            $this->error($result);
        }
    }

    //关联删除操作
    public function delete($da = array())
    {
        $course = CourseModel::get($da);
        if ($course->delete()) {
            // if ($course->teacher->delete()&&$course->student->delete()&&$course->inquire->delete()) {
            /*$tea = new TeacherModel();
            $tea->save([
                'course_id' => '0',
            ],['course_id' => $da]);*/
            $this->success('数据删除成功!', 'course/index');
        }
        $this->error("被删除的记录不存在!");
    }

    //}
    public function del_product()
    {
        if ($_POST['btnSave']) {

            if (empty($_POST['id'])) {
                echo "<script>alert('必须选择一个产品,才可以删除!');history.back(-1);</script>";
                exit;
            } else {
                /*如果要获取全部数值则使用下面代码*/

                $id = implode(",", $_POST['id']);
                if (Db::name('course')->delete("$id")) {
                    /*$tea = new TeacherModel();
                    $tea->save([
                        'course_id' => '0',
                    ],['course_id' => $id]);*/
                    $this->success('数据删除成功！', 'course/index');
                } else {
                    $this->error('数据删除失败!');
                }
            }
        }


    }
    public function find(){
        $result = $this->request->param('name');
        $data=CourseModel::where('id','like','%'.$result)->whereOr('name','like','%'.$result)->select();
        $this->assign('data', $data);
        return view();
    }
}