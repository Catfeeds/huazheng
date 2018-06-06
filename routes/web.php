<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', 'HomeController@index');
Route::post('apply-save','ApplyController@apply_save');//申请提交
Route::post('recruitment-apply-save','RecruitmentApplyController@recruitment_apply_save');//申请提交

Route::post('register-sms-send','SmsController@register_sms_send');//发送注册短信验证码
Route::post('password-reset-sms-send','SmsController@password_reset_sms_send');//发送充值密码短信验证码

Route::get('password-reset','UserController@password_reset');//重置密码页面
Route::post('password-reset','UserController@password_reset_save');//重置密码

Route::get('video-list','VideoController@video_list');//视频课程


// Route::get('list-{cate_id}-{page}.html','ArticleController@article_category');
// Route::get('show-{cate_id}-{id}-{page}.html','ArticleController@article_info');

foreach (\App\Models\ArticleCategory::get() as $val) {
	//文章链接
    if (!empty($val['url'])){
        Route::get($val['url'], ['as'=>$val['url'],'uses'=>'ArticleController@article_category']);
        Route::get($val['url']."/{id}",'ArticleController@article_info');
    }
}
