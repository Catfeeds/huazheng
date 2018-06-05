@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="register_contain">
    <div class="con">
        <div class="main">
            <div class="left" style="display:none">
                <img src="http://a3.huazhen.com/huazhen_revision/pc/account/images/img01.png" alt="">
            </div>
            <div class="right">
                <div class="right-top"><i></i><span>没有最好，只有更好</span><i></i></div>
                <div class="right-box">
                    <div class="tab register">
                        <p class="acc cur">
                            <span class="acc">欢迎注册</span>
                        </p>
                        <div class="tab-right">
                            已经注册 <a href="{{URL('login')}}">直接登录</a>
                        </div>
                    </div>
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="form-item" >
                            <!--注册from-->
                            <div class="form-group ">
                                <div class="input-group">
                                    <input type="text" class="form-control retpadding text-input" placeholder="请输入手机号码" id="register-phone" name="phone"/>
                                    <label for="register-phone" class="error"></label>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control retpadding text-input" placeholder="密码由6-20位字母，数字和符号组成"
                                    id="register-password" name="password" id="register-password"/>
                                    <label for="register-password" class="error"></label>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control retpadding text-input" placeholder="请再次输入上面的密码"  name="password_confirmation" id="register-password_confirmation" />
                                    <label for="register-password_confirmation" class="error"></label>
                                </div>
                                <div class="input-group input-group2">
                                    <input type="text" class="form-control retpadding note text-input" placeholder="图形验证码" name="captcha"
                                    id="register-captcha" required/>
                                    <label for="register-captcha" class="error" style="right:48%;"></label>
                                    <div class="captcha">
                                        {!!captcha_img()!!}
                                    </div>
                                </div>
                                <div class="input-group input-group2">
                                    <input type="text" class="form-control retpadding note text-input" placeholder="短信验证码" name="verify_code"
                                    id="register-code" required/>
                                    <label for="register-code" class="error" style="right:48%;"></label>
                                    <input class="get-msg" id="register-get-code" value="获取验证码" type="button">
                                </div>
                                <div class="input-group">
                                    <div class="dropdown">
                                        <input type="hidden" class="form-control retpadding text-input" placeholder="预约咨询时间" id="dropdown-input"
                                        name="consult-time"/>
                                        <label for="login-time" class="error"></label>
                                        <span class="dropdown-title">预约咨询时间</span>

                                        <ul name="consult-time" class="dropdown-items">
                                            <div class="ul-p">预约咨询时间</div>
                                            <li class="dropdown-item" data-value="1">早上： 9:00-12:00</li>
                                            <li class="dropdown-item" data-value="2">中午：13:00-17:00</li>
                                            <li class="dropdown-item" data-value="3">晚上：18:00-21:00</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <input class="btn nomargin" type="button" value="立 即 注 册" id="register-submit">
                                </div>
                                <input type="hidden" name="channelName" value="竞价-花镇-官网">
                                <input type="hidden" name="channel_code" value="490640b43519c77281cb2f8471e61a71">
                                <div class="input-group yhxy" >
                                    <input class="reset" type="checkbox" id="register-checkbox" >
                                    <label for="register-checkbox" style="display:inline-block;">我已接受并阅读<span onclick="window.open('/huazhen_agreement')">《花镇用户协议》</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="right-bottom register">
                            <ul>
                                <li>
                                    <span><img src="http://a3.huazhen.com/huazhen_revision/pc/account/images/icon-03.png" alt=""></span>
                                    个性化
                                </li>
                                <li>
                                    <span><img src="http://a3.huazhen.com/huazhen_revision/pc/account/images/icon-04.png" alt=""></span>
                                    品质化
                                </li>
                                <li>
                                    <span><img src="http://a3.huazhen.com/huazhen_revision/pc/account/images/icon-05.png" alt=""></span>
                                    高端化
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
<script type="text/javascript">
    $(".captcha").click(function(){
        $(".captcha").find("img").attr('src',"{{captcha_src()}}"+Math.random());
    })
</script>
@endsection