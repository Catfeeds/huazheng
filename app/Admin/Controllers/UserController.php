<?php

namespace App\Admin\Controllers;

use App\Models\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('会员');
            $content->description('会员');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('会员');
            $content->description('会员');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('会员');
            $content->description('会员');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {
            $grid->disableExport();
            $grid->model()->orderBy('created_at','DESC');
            $grid->id('ID')->sortable();
            $grid->column('name',"会员名称");
            $grid->column('phone',"手机号码");
            $grid->column('grade',"会员等级")->display(function($grade){
                if($grade==2){
                    return '<span class="badge bg-red">'.trans('home.user.grade.'.$grade).'</span>';
                }else{
                    return '<span class="badge bg-gray">'.trans('home.user.grade.'.$grade).'</span>';
                }
            });
            $grid->column('created_at',"注册日期")->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(){
        return Admin::form(User::class, function (Form $form) {
            $form->image('pic','头像')->move('/uploads/user/'.date('Ymd'))->uniqueName();

            $form->text('name', '名称')->rules('required');
            $form->text('phone', '手机号码')->rules(function ($form) {
                // 如果不是编辑状态，则添加字段唯一验证
                return [
                    'required',
                    'phone',
                    Rule::unique('users')->ignore($form->model()->id),
                ];
            });
            $form->password('password', '密码')->rules(function ($form) {
                // 如果不是编辑状态，则添加字段唯一验证
                if (!$id = $form->model()->id) {
                    return 'required|min:6|max:20';
                }
            });

            $form->display('grade', '会员等级')->with(function ($grade) {
                if(!isset($grade)){
                    $grade = 1;
                }
                return trans('home.user.grade.'.$grade);
            });

            $form->datetime('grade_end','Vip结束时间')->format('YYYY-MM-DD HH:mm:ss');

            // $form->datetime('grade_end','Vip结束时间')->format('YYYY-MM-DD HH:mm:ss')->with(function($grade_end){
            //     return date('Y-m-d H:i:s',$grade_end);
            // });

            $form->hidden('id','ID');

            // $form->display('created_at', 'Created At');
            // $form->display('updated_at', 'Updated At');

            $form->saving(function($arr){
                // admin_toastr('laravel-admin 提示','success');
                $password = $arr->password;
                if(isset($password)&&!empty($password)){
                    $arr->password = Hash::make($password);
                }
                $arr->pic = Image($arr->pic,100,100,"uploads/user/".date("Ymd")."/");
                if(strtotime($arr->grade_end)<time()){
                    $arr->grade = 1;
                }else{
                    $arr->grade = 2;
                }
            });
        });
    }
}
