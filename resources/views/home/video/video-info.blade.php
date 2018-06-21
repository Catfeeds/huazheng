@extends('home.layouts.app')
@section('style')
@parent
@endsection
@section('content')
<div class="expert_con">
    @include('home.layouts.location')
    <div class="videoInfo">
        <div class="imgDiv1">
            <img class="videoP" src="{{asset($info['img'])}}" alt="{{$info['alt']}}">
        </div>
        <div class="videoI">
            <p class="videoTit">{{$info['title']}}</p>
            <p class="videoSumm">{!!nl2br($info['desc'])!!}</p>
            <div class="videoCon">
                <p class="price">价格 <span class="newPrice"><i>￥</i>{{$info['price']}}</span><span class="oldPrice">{{$info['old_price']}}</span></p>
                <p class="courseNum">{{$info['number']}}人学习过 | {{count($info['VideoCourseMany'])}}个课时</p>
                <p class="videoTag">
                    <span>新用户注册</span>
                    @if($info['is_try']&&$info['is_fee']!=3)
                    <span>免费试听</span>
                    @endif
                    @if($info['is_fee']==2)
                    <span>会员免费</span>
                    @elseif($info['is_fee']==3)
                    <span>免费观看</span>
                    @endif
                </p>
                <p class="btns">
                    @if($is_pay)
                    <a>{{$is_pay}}</a>
                    @else
                    <a href="{{URL('video-pay',$info['video_id'])}}">立刻购买</a>
                    @endif
                    <a  class="kefu_btn">我要咨询</a>
                </p>
                @if (session('error_message'))
                    <div class="error_message">
                        {{ session('error_message') }}
                    </div>
                @endif
            </div>
            
            <div class="fx">
                <div class="bdsharebuttonbox">
                    <span class="fon14 fxfont">分享</span>
                    <a  class="bds_more" data-cmd="more"></a>
                    <a  class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a  class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a  class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                    <a  class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    <a  class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="videoOth">
        <p class="videoOthTab">
            <span class="active">课程介绍</span>
            <span class="mulu">课程目录</span>
            <span>常见问题</span>
        </p>
        <ul class="videoTabCon">
            <li class="active">
                {!!$info['content']!!}
            </li>
            <li>
                @foreach($info['VideoCourseMany'] as $k=>$v)
                <p class="courseItem" onclick="window.open('{{URL('video-play',[$v['course_id']])}}')">
                    <i></i>
                    {{$v['title']}}
                    @if(!empty($v['try_video'])&&($is_pay!='免费观看'||$is_pay!='已购买'))
                    <span class="free">免费试听</span>
                    @endif
                    <i></i>
                </p>
                @endforeach
            </li>
            <li class="commonPr">
                <p class="proTit">常见问题：</p>
                <div>
                    {!!f_article_info(1249)['content']!!}
                </div>
            </li>
        </ul>
    </div>
    <div class="videoLike">
        <p class="likes">
            猜你喜欢
        </p>
        <ul class="videoList">
            @foreach($like_video_list as $v)
                <li>
                    <a href="{{URL('video-info',[$v])}}">
                        <div class="imgDiv">
                            <img class="videoPa" src="{{asset($v['img'])}}">
                            <p><img src="{{asset('resources/home/images/ico/ico22.png')}}">{{count($v['VideoCourseMany'])}}个课时</p>
                        </div>
                        <div class="videoTit">
                            <p>{{$v['title']}}</p>
                            <span>{{$v['number']}}人正在学习</span> 
                        </div>
                        <div class="priceTag"> 
                            <p class="price colred">￥<span class="newprice">{{$v['price']}}</span><span class="oldprice">{{$v['old_price']}}</span> </p> 
                            @if($v['is_try'])
                            <p class="videotag"> <span>可试学</span> </p> 
                            @endif
                        </div> 
                    </a> 
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
@section('script')
@parent
<script type="text/javascript">
    window._bd_share_config={
        "common":{
            "bdText" : '',
            "bdDesc" : '',
            "bdUrl": '',
            "bdPic": '',
            "bdStyle":"1",
        },"share":{}
    };
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
    $(".videoOthTab span").click(function(){
        var index = $(this).index();
        $(this).addClass("active").siblings().removeClass('active');
        $(".videoTabCon li").eq(index).addClass('active').siblings().removeClass('active')
    })
</script>
@endsection