<?php

namespace App\Admin\Controllers;

use App\Models\Apply,App\Models\ArticleCategory;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
class ApplyController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content){
            $content->header('申请预约');
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
            $content->header('申请预约');
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
            $content->header('申请预约');
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

        return Admin::grid(Apply::class, function (Grid $grid) use ($request){
            $grid->disableExport();//禁止导出
            $grid->disableFilter();//禁止筛选
            $grid->disableCreateButton();//禁止创建按钮
            //默认排序
            $grid->model()->orderBy('created_at','DESC')->orderBy('id','DESC');
            $grid->id('ID')->sortable();
            $grid->column('name',"姓名");
            $grid->column('phone',"手机号码");
            $grid->column('sex',"性别")->display(function($grade){
                if($grade==1){
                    return '男';
                }else{
                    return '女';
                }
            });
            $grid->column('age',"年龄");
            $grid->column('income',"月收入");
            $grid->column('fine_time',"最佳致电时间");

            $states = [
                'on'  => ['value' => 1, 'text' => '处理', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未处理', 'color' => 'danger'],
            ];
            $grid->column('is_read',"状态")->switch($states);

            $grid->column('created_at',"申请时间")->sortable();
            
            
        });

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Apply::class, function (Form $form) use ($cate_id){
            $form->display('name', '姓名');
            $form->display('phone', '手机号码');
            $form->display('sex',"性别")->with(function($value){
                if($value==1){
                    return '男';
                }else{
                    return '女';
                }
            });
            $form->display('age', '年龄');
            $form->display('income', '月收入');
            $form->display('fine_time', '最佳致电时间');
            $states = [
                'on'  => ['value' => 1, 'text' => '处理', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '未处理', 'color' => 'danger'],
            ];
            $form->switch('is_read','状态')->states($states);
            // $form->display('years', '学画时间')->with(function ($value) {
            //     switch ($value) {
            //         case '1':
            //             return '半年';
            //             break;
            //         case '2':
            //             return '半年至一年';
            //             break;
            //         case '3':
            //             return '一年以上';
            //             break;
            //     }
            // });
            // $form->display('cate_id', '意向班级')->with(function ($value) {
            //     if($value>0){
            //         $cate_info = ArticleCategory::find($value);
            //         return $cate_info['title'];
            //     }else{
            //         return "无";
            //     }
            // });
            
        });
    }
}
