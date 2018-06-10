<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Routing\Router;
use App\Models\Apply;
class ApplyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
        // $this->middleware('auth');
    }

    /**
     * 申请提交
     *
     * @return \Illuminate\Http\Response
     */
    public function apply_save(Request $request){
        $this->validate($request,[
            'name'    => 'required',
            'phone'   => 'required',
            'sex'   => 'required',
            'captcha'    => 'sometimes|required|captcha',
        ],[],[
            'name'=>"姓名",
            'phone'=>"手机号码",
            'captcha'=>"验证码",
            'sex'=>"性别",
        ]);

        $info = Apply::ApplySave([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'sex'=>$request['sex'],
            'age'=>$request['age'],
            'income'=>$request['income'],
            'fine_time'=>$request['fine_time'],
        ]);

        // $mail = Mail::send("emails.emails",['info'=>$info],function ($message) use ($info) {
        //     $message->to(['75531120@qq.com','715783591@qq.com'])->subject("加盟申请");
        // });

        return render("提交成功",200,$info);
    }
}
