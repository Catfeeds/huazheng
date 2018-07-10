<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Validator,Auth;
use App\Models\PayLog;
use Yansongda\Pay\Pay;
use Yansongda\Pay\Log;
class PayController extends Controller
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
    public function pay(Request $request){
        $this->validate($request,[
            'id'    => 'required',
        ],[],[
            'id'=>"订单",
        ]);
        if(!$request['id']>0){
            return redirect("/");
        }
        $id = $request['id'];
        $user_info = Auth::user();
        $pay_log = PayLog::where('user_id',$user_info['id'])->where("id",$id)->where("pay_status",1)->first();
        if(!$pay_log){
            return redirect("/");
        }

        if($pay_log['pay_type']==1){
            //微信支付流程
            $config = [
                'appid' => 'wxb3fxxxxxxxxxxx', // APP APPID
                'app_id' => 'wxb3fxxxxxxxxxxx', // 公众号 APPID
                'miniapp_id' => 'wxb3fxxxxxxxxxxx', // 小程序 APPID
                'mch_id' => '145776xxxx',
                'key' => 'mF2suE9sU6Mk1CxxxxIxxxxx',
                'notify_url' => 'http://yanda.net.cn',
                'cert_client' => './cert/apiclient_cert.pem', // optional, 退款，红包等情况时需要用到
                'cert_key' => './cert/apiclient_key.pem',// optional, 退款，红包等情况时需要用到
                'log' => [ // optional
                    'file' => './logs/wechat.log',
                    'level' => 'debug'
                ],
            ];
            if(strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false){
                if(!session()->has('pay_open_id')){
                    if(!isset($request['code'])){
                        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$config['appid']."&redirect_uri=".url('').$request->getRequestUri()."&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
                        header("Location:".$url);
                        exit;
                    }else{
                        $code=$request['code'];
                        $get_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$config['appid']."&secret=".$config['secret']."&code=".$code."&grant_type=authorization_code";
                        $ch = curl_init();
                        curl_setopt($ch,CURLOPT_URL,$get_token_url);
                        curl_setopt($ch,CURLOPT_HEADER,0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
                        $res = curl_exec($ch);
                        curl_close($ch);
                        $json_obj = json_decode($res,true);
                        $open_id=$json_obj['openid'];

                        session(['pay_open_id'=>$open_id]);
                    }
                }
            }
            
            // 扫码支付
            $order = [
                'out_trade_no' => $pay_log['order_no'],
                'body'         => '订单支付',
                'total_fee'    => round($pay_log['price']*100),
                'openid'       => 'onkVf1FjWS5SBxxxxxxxx',
            ];
            $result = Pay::wechat($config)->mp($order);
            $qr = $result->code_url;
            dd($result);
        }

    }
}
