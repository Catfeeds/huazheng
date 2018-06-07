@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="user_main">
    <div class="site_container">
        <div class="container_inner clearfix">
            <?php 
            $user_info = Auth::user();
            ?>
            <div class="user_navigate">
                <div class="user_img xgtx1">
                    <img src="{{asset($user_info['pic'])}}" alt="">
                    <!-- <i></i> -->
                    <!--开通的时候 解开注释-->
                    @if($user_info['grade']==2)
                    <i class="vip"></i>
                    @endif
                </div>
                <div class="user_info">
                    <p class="user_ming">{{$user_info['name']}}</p>
                    @if($user_info['grade']==1)
                    <p class="user_kt">
                        <a href="" target="_blank" class="vip_btn">成为VIP</a>
                    </p>
                    @endif
                    @if(empty($user_info['wx_openid']))
                    <!-- 微信绑定 -->
                    <div class="my_weixin" >
                        <span class="wx_ann">绑定微信</span>
                    </div>
                    @endif
                </div>
                <div class="Gs_panel_title ">
                    <ul>
                        <li @if($Gs_panel_title==1) class="on" @endif><a href="{{URL('member')}}"><img class="icon_img" src="{{asset('resources/home/images/ico/ico29.png')}}">安全设置</a></li>
                        <li @if($Gs_panel_title==2) class="on" @endif><a href="#"><img class="icon_img" src="{{asset('resources/home/images/ico/ico28.png')}}">我的课程</a></li>
                    </ul>
                </div>
            </div>
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
                        <p>绑定手机：<span class="f-ml46">{{substr_replace($user_info['phone'],'****',3,4)}}</span><span class="write cxbd">重新绑定</span></p>
                    </div>
                    <div class="box">
                        <p>密码：<span class="f-ml46" style="margin-left: 77px;">******</span><span class="write xg3">修改</span></p>
                    </div>
                </div>
            </div>
        </div>
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
        
    </script>
@endsection