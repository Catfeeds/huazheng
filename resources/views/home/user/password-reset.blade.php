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
                    <div class="tab register">
                        <p class="acc cur">
                            <span class="acc">找回密码</span>
                        </p>
                        <div class="tab-right">
                            30秒立即注册 <a href="{{URL('register')}}">还没有账号？</a>
                        </div>

                    </div>
                    <form method="POST" id="demoform" action="{{URL('password-reset')}}">
                        @csrf
                        <div class="form-item" >
                            <div class="input-group">
                                <input type="text" class="form-control retpadding text-input" placeholder="请输入手机号码" id="reset-phone"
                                name="phone" required value="{{old('phone')}}" datatype="*,m" nullmsg="请输入手机号码" errormsg="请输入手机号码"/>
                                <label for="reset-phone" class="error1 Validform_checktip  @if($errors->has('phone')) Validform_wrong @endif">
                                    @if ($errors->has('phone'))
                                    {{ $errors->first('phone') }}
                                    @endif
                                </label>
                            </div>
                            <div class="input-group input-group2 input-group3">
                                <input type="text" class="form-control retpadding note text-input" placeholder="短信验证码"
                                id="reset-code" name="verify_code" required value="{{old('verify_code')}}" datatype="*" nullmsg="请输入短信验证码" />
                                <input class="get-msg " id="reset-get-code" value="获取验证码" type="button">
                                <label for="reset-code" class="Validform_checktip  @if($errors->has('verify_code')) Validform_wrong @endif" style="position: absolute;bottom: 0;left: 0;">
                                    @if ($errors->has('verify_code'))
                                    {{ $errors->first('verify_code') }}
                                    @endif
                                </label>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control retpadding text-input" placeholder="请输入登录密码"
                                id="reset-password" name="password" required value="{{old('password')}}" datatype="*6-20" errormsg="密码由6-20位组成"/>
                                <label for="reset-password" class="error1 Validform_checktip  @if($errors->has('password')) Validform_wrong @endif">
                                    @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                    @endif
                                </label>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control retpadding text-input" placeholder="请再次输入登录密码" id="reset-password_confirmation"
                                name="password_confirmation" required value="{{old('password_confirmation')}}" datatype="*" recheck="password" errormsg="您两次输入的密码不一致！"/>
                                <label for="reset-password_confirmation" class="error1 Validform_checktip  @if($errors->has('password_confirmation')) Validform_wrong @endif">
                                    @if ($errors->has('password_confirmation'))
                                    {{ $errors->first('password_confirmation') }}
                                    @endif
                                </label>
                            </div>
                            <div class="input-group">
                                <input class="btn nomargin" id="reset-submit" type="button" value="确定">
                            </div>
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
    var t=60;
    $(".get-msg").click(function(){
        var phone = $("#reset-phone").val();
        if($(".get-msg").attr('is')!=false){
            $(".get-msg").attr("is",false);
            $.ajax({
                type: "POST",
                url:"{{URL('password-reset-sms-send')}}",
                data:"phone="+phone,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data.code==200){
                        alert(data.message+data.data.captcha);
                        t=60;
                        captcha_up();
                    }else{
                        alert(data.message);
                    }
                },
                error:function(data){
                    var obj = new Function("return" + data.responseText)();
                    console.log(obj);
                    obj = obj.errors;
                    var msg='';
                    $(".get-msg").attr("is",true);
                    for (var prop in obj){
                        msg += obj[prop]+"\r";
                    }
                    alert(msg);
                }
            });
        }
    })
    function captcha_up(){
        $(".get-msg").val("")
        sint = setInterval(function(){
          $(".get-msg").val(t--);
          if(t<=0){
            $(".get-msg").attr("is",true);
            $(".get-msg").val("获取验证码");
            clearInterval(sint);
          }
        },1000)
    }
    $("#demoform").Validform({
        tiptype:3,
        showAllError:true,
        btnSubmit:"#reset-submit",
        beforeSubmit:function(date){
            // submit();
            // return false;
        }
    });
</script>
@endsection