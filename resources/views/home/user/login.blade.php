@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="register_contain">
    <div class="con">
        <div class="main">
            <div class="right">
                <div class="right-top"><i></i><span>没有最好，只有更好</span><i></i></div>
                <div class="right-box">
                    <div class="tab">
                        <p class="acc cur">
                            <span class="acc">账号登录</span>
                        </p>
                        <p>
                            <span>微信登录</span>
                        </p>
                        <!-- <i></i> -->
                    </div>
                    <div class="form-item" >
                        <form method="POST" id="demoform" action="{{URL('login')}}">
                            @csrf
                            <div class="form-group ">
                                <div class="input-group">
                                    <input id="login-phone" type="text" placeholder="手机号" class="form-control text-input text-name" name="phone" datatype="*" nullmsg="请输入手机号" value="{{old('phone')}}"/>
                                    <label for="login-phone" class="error Validform_checktip  @if($errors->has('phone')) Validform_wrong @endif">
                                        @if ($errors->has('phone'))
                                        {{ $errors->first('phone') }}
                                        @endif
                                    </label>
                                </div>
                                <div class="input-group test">
                                    <input id="login-msg" type="password" name="password" class="form-control text-input text-pass" placeholder="密码" datatype="*" nullmsg="请输入密码" value="{{old('password')}}"/>
                                    <label for="login-msg" class="error Validform_checktip  @if($errors->has('password')) Validform_wrong @endif">
                                        @if ($errors->has('password'))
                                        {{ $errors->first('password') }}
                                        @endif
                                    </label>
                                </div>
                                <div class="input-group forget">
                                    <a href="{{URL('password-reset')}}" style="display:block;">忘记密码?</a>
                                </div>
                                <div class="input-group">
                                    <input class="btn nomargin loginin-btn" type="button" value="登 录">
                                </div>
                                <div class="zc">
                                    <a href="{{URL('register')}}">还没笃爱账号？立即注册 ></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-item" style="display:none">
                        <div class="">
                            <div  id="login_container" style="text-align: center;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
<script>
    var obj = new WxLogin({
        id:"login_container",
        appid: "{{env('WECHAT_APP_ID')}}",
        scope: "snsapi_login",
        redirect_uri: "{{url('wx_login')}}",
        state: "",
        style: "",
        href: ""
    });
    $('.main .right .right-box p').click(function(event) {
        $(this).addClass('cur').siblings('p').removeClass('cur');
        var num = $(this).index();
        $('.main .form-item').eq(num).show().siblings('.form-item').hide();
    });
</script>
<script type="text/javascript">
    $("#demoform").Validform({
        tiptype:3,
        showAllError:true,
        btnSubmit:".loginin-btn",
        beforeSubmit:function(date){
            // submit();
            // return false;
        }
    });
</script>
@endsection