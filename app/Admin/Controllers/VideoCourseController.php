<?php

namespace App\Admin\Controllers;

use App\Models\VideoCourse,App\Models\Video;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;
class VideoCourseController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index(Request $request)
    {
        return Admin::content(function (Content $content) use ($request){
            $content->header('课程目录');
            $content->body($this->grid($request));
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
            $content->header('课程目录');
            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create(Request $request)
    {
        return Admin::content(function (Content $content) use ($request){
            $content->header('课程目录');
            $content->body($this->form($request));
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid($request=array())
    {

        return Admin::grid(VideoCourse::class, function (Grid $grid) use ($request){
            $grid->disableExport();//禁止导出
            $grid->disableFilter();//禁止筛选
            //默认排序
            $grid->model()->orderBy("created_at","ASC")->orderBy("course_id","ASC");
            $grid->course_id('ID')->sortable();
            $grid->column('title', '标题');
            // $grid->image("图片")->image();
            $grid->column('video',"链接");
            // $grid->column('order',"排序")->sortable();

            $grid->urlCreateButton('/admin/video-course/create?video_id='.$request['video_id']);//修改添加按钮链接
            $grid->filter(function ($filter) {
                $filter->equal('video_id','对应视频课程')->select();
            });
        });

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($request=array())
    {
        return Admin::form(VideoCourse::class, function (Form $form) use ($request){
            $form->tools(function (Form\Tools $tools) {
                // 去掉跳转列表按钮
                $tools->disableListButton();
            });
            $form->hidden('video_id','对应视频')->value($request['video_id']);

            $form->text('title', '标题');
            $form->text('video', '链接');
            $form->text('try_video', '试看链接');
            // $form->image('image','图片')->move('/uploads/images/'.date('Ymd'))->uniqueName();

            // $form->setAction('/admin/ads-image');//提交地址

            $form->saving(function (Form $form) {
                // $AdsPosition = AdsPosition::find($form->cate_id);
                // $form->image = Image($form->image,$AdsPosition['width'],$AdsPosition['height'],"uploads/images/".date("Ymd")."/");
            });
            $form->saved(function (Form $form) {
                admin_toastr(trans('admin.update_succeeded'));
                return redirect('/admin/video-course?video_id='.$form->video_id);
            });
        });
    }
}
