<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\SmsCaptcha,App\Models\User,App\Models\VipOrder;

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

    public function member(Request $request){
        //会员中心首页
        
        //更新会员vip状态，---后面更改成定时任务
        User::where('grade',2)->where('grade_end',"<",date('Y-m-d H:i:s'))->update(['grade'=>1]);
        User::where('grade',1)->where('grade_end',">",date('Y-m-d H:i:s'))->update(['grade'=>2]);


        $user_info = Auth::user();
        $assign = [
            'head_title'     => '会员中心',
            'Gs_panel_title' => 1,
            'user_info'      => $user_info,
        ];
        return view('home.user.member',$assign);
    }
    public function member_pic(){
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '头像编辑',
            'user_info'      => $user_info,
        ];
        return view('home.user.member-pic',$assign);
    }
    public function user_name_save(Request $request){
        //会员名称修改
        $user_info = Auth::user();
        $user_info->name = $request['name'];
        $user_info->save();
        return render("修改成功",200,$user_info->name);
    }
    public function member_pic_save(Request $request){
        //头像上传
        $user_info = Auth::user();
        $old_pic = $user_info->pic;
        $user_info->pic = Image($request->image,100,100,"uploads/user/".date("Ymd")."/");
        $user_info->save();
        if($old_pic!='resources/home/images/pic.png'){
            @unlink($old_pic);
        }
        return render("修改成功",200);
    }
    public function user_bangding_save(Request $request){
        //修改绑定手机号
        $this->validate($request,[
            'phone'       => 'required|string|phone|max:255',
            'verify_code' => 'required',
        ],[],[
            'phone'=>"手机号码",
            'verify_code'=>"验证码",
        ]);

        $SmsCaptcha = SmsCaptcha::where([
            'phone'=>$request['phone'],
            'captcha'=>$request['verify_code'],
            'status'=>1,
        ])->where('add_time',">",time()-1800)->first();
        if(!$SmsCaptcha){
            return render("短信验证码过期或不存在，请重新获取",500);
        }
        $user_info = Auth::user();
        $user_info->phone = $request['phone'];
        $user_info->save();

        $SmsCaptcha->status=2;
        $SmsCaptcha->save();
        return render("修改成功",200,substr_replace($user_info->phone,'****',3,4));
    }
    public function user_password_save(Request $request){
        //修改密码
        $this->validate($request,[
            'verify_code' => 'required',
            'password'    => 'required|string|min:6|max:20|confirmed',
        ],[],[
            'verify_code' =>"验证码",
            'password'    =>"密码",
        ]);
        $user_info = Auth::user();

        $SmsCaptcha = SmsCaptcha::where([
            'phone'=>$user_info['phone'],
            'captcha'=>$request['verify_code'],
            'status'=>1,
        ])->where('add_time',">",time()-1800)->first();
        if(!$SmsCaptcha){
            return render("短信验证码过期或不存在，请重新获取",500);
        }
        $user_info->password = Hash::make($request['password']);
        $user_info->save();

        $SmsCaptcha->status=2;
        $SmsCaptcha->save();
        return render("修改成功",200);
    }
    public function vip_pay(){
        //vip购买
        
        $user_info = Auth::user();
        //生成订单
        $arr = new VipOrder;
        $arr->user_id = $user_info['id'];
        $arr->status = 2;
        $arr->price = ConfigGet('vip_price');
        $arr->order_no = vip_order_no();
        $arr->pay_time = date('Y-m-d H:i:s');
        $arr->save();

        if($user_info['grade']==2){
            //续费
            $user_info->grade_end = date('Y-m-d H:i:s',strtotime($user_info->grade_end)+60*60*24*365);//增加1年
        }else{
            //新购
            $user_info->grade = 2;
            $user_info->grade_start = date('Y-m-d H:i:s');
            $user_info->grade_end = date('Y-m-d H:i:s',time()+60*60*24*365);//增加1年
        }
        $user_info->save();
        return redirect()->back();
    }
}
