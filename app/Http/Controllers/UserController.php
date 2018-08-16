<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\SmsCaptcha,App\Models\User,App\Models\VipOrder,App\Models\PayLog;

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
        if(isMobile()){
            return view('mobile.user.password-reset');
        }else{
            return view('home.user.password-reset');
        }
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
        if(isMobile()){
            return view('mobile.user.member',$assign);
        }else{
            return view('home.user.member',$assign);
        }
    }
    public function member_edit(Request $request){
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '个人资料',
            'Gs_panel_title' => 1,
            'user_info'      => $user_info,
        ];
        if(isMobile()){
            return view('mobile.user.member_edit',$assign);
        }else{
            return view('home.user.member_edit',$assign);
        }
    }
    public function member_pic(){
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '头像编辑',
            'user_info'      => $user_info,
        ];
        return view('home.user.member-pic',$assign);
    }
    public function user_name_edit(Request $request){
        //会员名称修改
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '名称编辑',
            'user_info'      => $user_info,
        ];
        if(isMobile()){
            return view('mobile.user.user_name_edit',$assign);
        }else{
            return redirect('member');
        }
    }
    public function user_phone_edit(Request $request){
        //会员手机修改
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '手机编辑',
            'user_info'      => $user_info,
        ];
        if(isMobile()){
            return view('mobile.user.user_phone_edit',$assign);
        }else{
            return redirect('member');
        }
    }
    public function user_password_edit(Request $request){
        //会员密码修改
        $user_info = Auth::user();
        $assign = [
            'head_title'     => '密码编辑',
            'user_info'      => $user_info,
        ];
        if(isMobile()){
            return view('mobile.user.user_password_edit',$assign);
        }else{
            return redirect('member');
        }
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
        return render("修改成功",200,$user_info->pic);
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
        $assign = [
            'vip_price'        => ConfigGet('vip_price'),
            'head_title'       => !empty($Video['seo_title'])?$Video['seo_title']:$Video['title'],
            'head_keywords'    => !empty($Video['seo_keywords'])?$Video['seo_keywords']:$Video['title'],
            'head_description' => !empty($Video['seo_description'])?$Video['seo_description']:$Video['title'],
        ];
        if(isMobile()){
            return view('mobile.user.vip-pay',$assign);
        }else{
            return view('home.user.vip-pay',$assign);
        }
    }
    public function vip_pay_save(Request $request){
        //vip购买-支付确认
        $this->validate($request,[
            'pay_type' => 'required',
        ],[],[
            'pay_type' =>"支付方式",
        ]);

        $user_info = Auth::user();
        $arr = new VipOrder;
        $arr->user_id = $user_info['id'];
        $arr->status = 1;
        $arr->price = ConfigGet('vip_price');
        $arr->order_no = vip_order_no();
        $arr->pay_time = date('Y-m-d H:i:s');
        $arr->save();

        //创建支付记录
        $pay_log = PayLog::PaySave([
            'order_id'=>$arr['order_id'],
            'type'=>2,
            'price'=>$arr['price'],
            'user_id'=>$arr['user_id'],
            'order_no'=>$arr['order_no'],
            'pay_type'=>$request['pay_type'],
            'add_time'=>date('Y-m-d H:i:s'),
        ]);

        return redirect('pay?id='.$pay_log['id']);
    }
    public function wx_login(Request $request){
        //微信授权登陆
        if(isMobile()){
        // if(is_weixin()){
            //微信浏览器
            if(!isset($request['code'])){
                $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".env('WECHAT_APP_ID')."&redirect_uri=".url('').$request->getRequestUri()."&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
                header("Location:".$url);
                exit;
            }else{
                $code=$request['code'];
                $get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".env('WECHAT_APP_ID')."&secret=".env('WECHAT_APP_SECRET')."&code=".$code."&grant_type=authorization_code";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_token_url);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                $res = curl_exec($ch);
                curl_close($ch);
                $json_obj = json_decode($res,true);
                if(!$json_obj){
                    return redirect('/');
                }
                
                $get_info="https://api.weixin.qq.com/sns/userinfo?access_token=".$json_obj['access_token']."&openid=".$json_obj['openid']."&lang=zh_CN";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_info);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                $res = curl_exec($ch);
                curl_close($ch);
                $json_info = json_decode($res,true);
                
                $user = User::where('wx_openid',$json_obj['unionid'])->first();
                if(!$user){
                    $user = new User;
                }
                $user->wx_openid = $json_info['unionid'];
                $user->name = $json_info['nickname'];
                $user->pic = $json_info['headimgurl'];
                $user->save();
                Auth::login($user);
                return redirect()->intended();
            }
        }else{
            //网站应用
            if(!isset($request['code'])){
                $url="https://open.weixin.qq.com/connect/qrconnect?appid=".env('WECHAT_KF_APPID')."&redirect_uri=".url('').$request->getRequestUri()."&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect";
                header("Location:".$url);
                exit;
            }else{
                $code=$request['code'];
                $get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".env('WECHAT_KF_APPID')."&secret=".env('WECHAT_KF_SECRET')."&code=".$code."&grant_type=authorization_code";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_token_url);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                $res = curl_exec($ch);
                curl_close($ch);
                $json_obj = json_decode($res,true);
                if(!$json_obj){
                    return redirect('/');
                }
                
                $get_info="https://api.weixin.qq.com/sns/userinfo?access_token=".$json_obj['access_token']."&openid=".$json_obj['openid']."&lang=zh_CN";
                $ch = curl_init();
                curl_setopt($ch,CURLOPT_URL,$get_info);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                $res = curl_exec($ch);
                curl_close($ch);
                $json_info = json_decode($res,true);
                
                $user = User::where('wx_openid',$json_obj['unionid'])->first();
                if(!$user){
                    $user = new User;
                }
                $user->wx_openid = $json_info['unionid'];
                $user->name = $json_info['nickname'];
                $user->pic = $json_info['headimgurl'];
                $user->save();
                Auth::login($user);
                return redirect()->intended();
            }
        }
    }
}
