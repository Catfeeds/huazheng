@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="user_main">
    <div class="site_container">
        <div class="container_inner clearfix">
            @include('home.layouts.member-nav')
            <div class="user_right_content">
                <h3 class="jichu_info">安全设置</h3>
                <div class="panel_info">
                    <div class="box">
                        <p class="user_name_show">昵称：<span class="unicheng f-ml78 update_field">{{$user_info['name']}}</span><span class="write xg">修改</span></p>
                        <p class="f-dn user_name_edit" data-cfield="nick2" >
                            昵称：<input type="text" name="name" value="{{$user_info['name']}}">
                            <span class="close user_center_colse">保存</span>
                            <span class="sure">取消</span>
                        </p>
                    </div>
                    <div class="box">
                        <p>绑定手机：<span class="f-ml46 user_phone">{{substr_replace($user_info['phone'],'****',3,4)}}</span><span class="write cxbd">重新绑定</span></p>
                    </div>
                    <div class="box">
                        <p>密码：<span class="f-ml46" style="margin-left: 77px;">******</span><span class="write xg3">修改</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--修改密码框-->
<div class="bangding xgmm" id="xgmm">
    <div class="bangdingkuang xgmm2">
        <form method="POST" id="passwordform" action="{{URL('user-password-save')}}">
            @csrf
            <div class="bd1">修改密码
                <img class="xgmm_gb" src="http://a3.huazhen.com/new_huazhen/user_v_1_2/img/icon-guanbi.png" alt=""/></div>
            <!-- <div><input type="text" id="password-mobile" name="phone" placeholder="请输入绑定手机号码"/></div> -->
            <div class="bd4">
                <input type="text" name="verify_code" id="password-verify-code" placeholder="请输入验证码"/>
                <span class="get-msg">获取验证码</span>
            </div>
            <div><input type="password" id="password-password" name="password" placeholder="请输入新密码"/></div>
            <div><input type="password" id="password-password2" name="password_confirmation" placeholder="请再次输入新密码"/></div>
            <div class="bd5">
                <p class="save2">提交</p>
            </div>
        </form>
    </div>
</div>
<!--重新绑定手机框-->
<div id="bangding" class="bangding">
    <div class="bangdingkuang">
        <form method="POST" id="rebindform" action="{{URL('user-bangding-save')}}">
            @csrf
            <div class="bd1">重新绑定手机
                <img class="bd1_gb" src="http://a3.huazhen.com/new_huazhen/user_v_1_2/img/icon-guanbi.png" alt=""/></div>
            <!-- <div><input type="password" id="rebind-password" name="password"  placeholder="请输入密码"/></div> -->
            <div><input type="text" id="rebind-mobile" name="phone" placeholder="请输入新手机"/></div>
            <div class="bd4">
                <input type="text" name="verify_code" id="rebind-verify-code" placeholder="请输入验证码"/>
                <span class="get-msg" id="rebind-get-msg">获取验证码</span>
            </div>
            <div class="bd5">
                <p class="subt">提交</p>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
@parent
    <script type="text/javascript">
        // 名称修改
        $(".xg").click(function(){
            $(".user_name_show").hide();
            $(".user_name_edit").show();
        })
        $(".sure").click(function(){
            $(".user_name_show").show();
            $(".user_name_edit").hide();
        })
        $(".user_center_colse").click(function(){
            var name = $(".user_name_edit").find("input[name='name']").val();
            if($(".get-msg").attr('is')!=false){
                $(".get-msg").attr("is",false);
                $.ajax({
                    type: "POST",
                    url:"{{URL('user-name-save')}}",
                    data:"name="+name,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data.code==200){
                            $(".update_field").html(data.data);
                            $(".user_name_show").show();
                            $(".user_name_edit").hide();
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
        // 名称修改end
        // 修改绑定手机
        $(".cxbd").click(function(){
            $("#bangding").show();
        })
        $(".bd1_gb").click(function(){
            $("#bangding").hide();
        })
        var t=60;
        $("#rebind-get-msg").click(function(){
            var phone = $("#rebind-mobile").val();
            if($("#rebind-get-msg").attr('is')!=false){
                $("#rebind-get-msg").attr("is",false);
                $.ajax({
                    type: "POST",
                    url:"{{URL('bangding-sms-send')}}",
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
                        obj = obj.errors;
                        var msg='';
                        $("#rebind-get-msg").attr("is",true);
                        for (var prop in obj){
                            msg += obj[prop]+"\r";
                        }
                        alert(msg);
                    }
                });
            }
        })
        function captcha_up(){
            $("#rebind-get-msg").val("")
            sint = setInterval(function(){
              $("#rebind-get-msg").val(t--);
              if(t<=0){
                $("#rebind-get-msg").attr("is",true);
                $("#rebind-get-msg").val("获取验证码");
                clearInterval(sint);
              }
            },1000)
        }
        $("#rebindform .subt").click(function(){
            var formData=$("#rebindform").serialize();
            var form_url=$("#rebindform").attr('action');
            if($("#rebindform .subt").attr('is')!=false){
                $("#rebindform .subt").attr("is",false);
                $.ajax({
                    type: "POST",
                    url:form_url,
                    data:formData,
                    success:function(data){
                        if(data.code==200){
                            $(".user_phone").html(data.data);
                            $("#bangding").hide();
                        }else{
                            $(".get-msg").attr("is",true);
                            alert(data.message);
                        }
                    },
                    error:function(data){
                        var obj = new Function("return" + data.responseText)();
                        obj = obj.errors;
                        var msg='';
                        $("#rebindform .subt").attr("is",true);
                        for (var prop in obj){
                            msg += obj[prop]+"\r";
                        }
                        alert(msg);
                    }
                });
            }
        })
        // 修改绑定手机end
        // 修改密码
        $(".xg3").click(function(){
            $("#xgmm").show();
        })
        $(".xgmm_gb").click(function(){
            $("#xgmm").hide();
        })
        var t=60;
        
        $(".get-msg").click(function(){
            var phone = $("#rebind-mobile").val();
            if($(".get-msg").attr('is')!=false){
                $(".get-msg").attr("is",false);
                $.ajax({
                    type: "POST",
                    url:"{{URL('password-sms-send')}}",
                    data:"phone="+phone,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data.code==200){
                            alert(data.message+data.data.captcha);
                            t=60;
                            captcha_up2();
                        }else{
                            $(".get-msg").attr("is",true);
                            alert(data.message);
                        }
                    },
                    error:function(data){
                        var obj = new Function("return" + data.responseText)();
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
        function captcha_up2(){
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
        $("#passwordform .save2").click(function(){
            var formData=$("#passwordform").serialize();
            var form_url=$("#passwordform").attr('action');
            if($("#passwordform .save2").attr('is')!=false){
                $("#passwordform .save2").attr("is",false);
                $.ajax({
                    type: "POST",
                    url:form_url,
                    data:formData,
                    success:function(data){
                        if(data.code==200){
                            alert(data.message);
                            $("#xgmm").hide();
                        }else{
                            alert(data.message);
                        }
                    },
                    error:function(data){
                        var obj = new Function("return" + data.responseText)();
                        obj = obj.errors;
                        var msg='';
                        $("#passwordform .save2").attr("is",true);
                        for (var prop in obj){
                            msg += obj[prop]+"\r";
                        }
                        alert(msg);
                    }
                });
            }
        })
        // 修改密码end
       
    </script>
@endsection