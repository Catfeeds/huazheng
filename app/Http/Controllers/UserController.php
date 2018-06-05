<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\SmsCaptcha,App\Models\User;

class UserController extends Controller
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
    public function password_reset(Request $request){
        //重置密码页面
        if(Auth::check()){
            //已经登陆的跳转首页
            return redirect('/');
        }
        return view('home.user.password-reset');
    }
    public function password_reset_save(Request $request){
        //重置密码提交
        $Validator = Validator::make($request->all(), [
            'phone'       => 'required|string|phone|max:255',
            'password'    => 'required|string|min:6|max:20|confirmed',
            'verify_code' => 'required',
        ],[],[
            'phone'=>"手机号码",
            'verify_code'=>"验证码",
            'password'=>"密码",
        ]);
        $user = User::where('phone',$request['phone'])->first();
        
        $SmsCaptcha = SmsCaptcha::where([
            'phone'=>$request['phone'],
            'captcha'=>$request['verify_code'],
            'status'=>1,
        ])->where('add_time',">",time()-1800)->first();
        $Validator->after(function($validator) use ($SmsCaptcha,$user){
            if(!$user){
                $validator->errors()->add('phone','该手机号还未注册');
            }
            if(!$SmsCaptcha){
                $validator->errors()->add('verify_code', '短信验证码过期或不存在，请重新获取');
            }
        });
        if(!$Validator->errors()->messages()&&!$Validator->fails()){
            $SmsCaptcha->status=2;
            $SmsCaptcha->save();
        }else{
            return redirect()->back()->withErrors($Validator)->withInput();
        }
        $user->password = Hash::make($request['password']);
        $user->save();
        return redirect('login');
    }
    
}
