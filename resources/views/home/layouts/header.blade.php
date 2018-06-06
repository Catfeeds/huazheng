@section('header')
    @if(!isset($is_header)||$is_header!=0)
    <!-- <div class="header">
        <div class="htop">
            <div class="layout clearfix">
                <a href="/" class="logo" style="background-image: url({{asset(ConfigGet('logo'))}});"></a>
                <div class="tell">
                    <p>{!!ConfigGet('phone')!!}</p>
                    {{ConfigGet('pingpai')}}
                </div>
            </div>
        </div>
        <div class="hbot">
            <div class="layout menu">
                <ul class="clearfix">
                    @foreach(nav(1) as $k=>$v)
                    <li @if(isset($url)&&in_array(trim($v['url'],"/"),$url)) class="on" @endif>
                        <p><a @if(!empty($v['url']))href="{{$v['url']}}"@endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title']}}">{{$v['title']}}</a></p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> -->
    <div class="new_public_header @if(isset($nav_index)&&$nav_index) index-header @endif ">
        <!-- <div class="wechat">
            <div class="wechat-in">
                <div class="wechat-tt">
                    <p>验证官方微信号</p>
                    <span class="close">
                        <img src="picture/gb_01.png" alt="">
                    </span>
                </div>
                <div class="wechat-text">
                    <b>注意</b>
                    <p>
                        近日来，发现不法分子抄袭盗用花镇宣传材料，高仿花镇微信帐号，冒充花镇情感分析师行骗以及恶意诋毁花镇，严重影响花镇声誉，威胁用户利益。避免上当受骗，请谨慎交易！
                    </p>
                </div>
                <div class="wechat-cx">
                    <div class="cx-left">
                        <p>花镇情感分析师微信号真伪查询：</p>
                        <div class="cx-input">
                            <input type="text" placeholder="请输入分析师微信号" class="f-input">
                            <div class="f-tap-btn">

                            </div>

                        </div>
                        <span>(*更多疑问请拨打唯一官方电话： 400-0173-520)</span>
                    </div>
                    <div class="cx-right">
                        <div class="now-show"><img src="picture/cz_01.png" alt=""></div>
                        <div class="isHzhy"><img src="picture/fh_01.png" alt=""></div>
                        <div class="isNotHzhy"><img src="picture/bfh_01.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="new_header-top">
            <div class="new_header-in clearfix">
                <div class="new_top-left">
                    <span>{!!ConfigGet('phone')!!}</span>
                </div>
                <div class="new_top-right">
                    <a href="#" class="wb">
                        关注微博
                    </a>
                    <a href="#" class="wx">
                        关注微信
                    </a>
                    <p><img src="{{asset(ConfigGet('ewm'))}}" alt="{{ConfigGet('ewm_text')}}"></p>
                    <!-- <a href="#" target="_blank">登录爱情管家</a>
                    <a href="#" target="_blank">登录黄埔计划</a> -->
                </div>
            </div>
        </div>
        <div class="new_header_con">
            <div class="new_logo clearfix">
                <div class="new_header-in">
                    <h1><a href="/" rel="nofollow" ><img src="{{asset(ConfigGet('logo'))}}" alt="{{ConfigGet('site_name')}}" title="{{ConfigGet('site_name')}}"></a></h1>
                    <div class="new_logo-right">
                        <!-- <a href="#" class="header-wxyz">验证官方微信号</a> -->
                        <a href="#" class="kefu_btn header-zx">在线咨询</a>
                        <div class="new_login-in">
                            @if(Auth::check())
                            <div class="new_hy_show">
                                <!-- <span class="tx" onclick="window.open('{{URL('member')}}')"><img src="http://a3.huazhen.com/static/customer/user/personal-images/default.png" alt=""></span> -->
                                <span class="name" onclick="window.open('{{URL('member')}}')">{{Auth::user()->phone}}</span>
                                <!-- <span class="quit" onclick="window.open('/user/logout')">退出</span> -->
                                <div class="new_user-card">
                                    <i class="new_triangle_up"></i>
                                    <div class="new_quick_pop_user">
                                        <a class="user_name" href="/user">{{Auth::user()->phone}}</a>
                                        <span>您好，</span>
                                        <div class="link_quit">
                                            <a href="{{URL('logout')}}" target="_self">退出</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <a href="{{URL('login')}}" rel="nofollow" class="login login-dl" target="_self">登录</a>
                            <a href="{{URL('register')}}" rel="nofollow" class="login login-zc" target="_self">注册</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="new_nav">
            <ul class="clearfix">
                <?php 
                $nav3 = nav(3);
                ?>
                @if(isset($nav3[0])&&$nav3[0]&&isset($nav_index)&&$nav_index)
                <li class="new_list on xm-list">
                    <h3>
                        <a @if(!empty($nav3[0]['url']))href="{{$nav3[0]['url']}}"@endif @if($nav3[0]['is_blank']) target="_blank" @endif title='{{$nav3[0]['title']}}'>{{$nav3[0]['title']}}</a>
                    </h3>
                </li>
                @endif
                @foreach(nav(1) as $k=>$v)
                <li class="new_list @if(isset($url)&&trim($v['url'],"/")==$url) cur @endif ">
                    <h3>
                        <a @if(!empty($v['url'])) href="{{$v['url']}}" @endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title']}}"  @if(count($v['child'])) class="cur" @endif>{{$v['title']}}</a>
                    </h3>
                    @if(count($v['child']))
                        <div class="new_hz_project">
                            @foreach($v['child'] as $v2)
                            <div @if(isset($url)&&trim($v2['url'],"/")==$url) class="on" @endif ><a @if(!empty($v2['url'])) href="{{$v2['url']}}" @endif @if($v2['is_blank']) target="_blank" @endif title="{{$v2['title']}}">{{$v2['title']}}</a></div>
                            @endforeach
                        </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        $(".new_nav .new_hz_project .on").parents("li").addClass("cur");
           // 顶部二维码
        $('.new_header-top .wx').hover(function() {
            $('.new_header-top .new_top-right p').show();
        }, function() {
            $('.new_header-top .new_top-right p').hide();
        });
        //下拉菜单
        $('.new_nav .new_list').hover(function() {
            $(this).children('div').show();

        }, function() {
            $(this).children('div').hide();
        });
        $('.header-wxyz').click(function(event) {
            $('.wechat').show();
        });
        $('.wechat .close').click(function(event) {
            $(".isHzhy").hide();
            $(".isNotHzhy").hide();
            $('.now-show').show();
            $('.wechat').hide();
        });
        $(".f-tap-btn").on("click",function(){

            $.post('/web_wechat_validate' , {'wechat_id':$(".f-input").val(),'_token':"rUBJd2dGOFtN0s5r7WLARRxHjIJDzw7s5xVVDH8s"} , function(json){
                if(json.status) {
                    $(".isHzhy").show();
                    $(".isNotHzhy").hide();
                    $('.now-show').hide();
                }
                else{
                    $(".isHzhy").hide();
                    $(".isNotHzhy").show();
                    $('.now-show').hide();
                }
            });
        });

        $('.new_hy_show').hover(function() {
            $('.new_user-card').show();
        }, function() {
            $('.new_user-card').hide();
        });
    </script>
    @endif
@show