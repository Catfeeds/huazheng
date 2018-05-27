@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
@if(isset($banner)&&$banner->count())
<div class="banner">
    <div class="tab">
        <div class="tab_in">
            <ul>
                @foreach(nav(3) as $k=>$v)
                @if($k>0)
                <li>
                    <a class="tab-icon6" style="background-image: url({{asset($v['ico'])}})" @if(!empty($v['url'])) href="{{$v['url']}}" @endif @if($v['is_blank']) target="_blank" @endif title="{{$v['title']}}" >{{$v['title']}}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="swiper-container" id="swiper1">
        <div class="swiper-wrapper">
            @foreach($banner as $v)
            <div class="swiper-slide" style="background-image: url({{asset($v['image'])}})" alt="{{$v['alt']}}">
                <a @if(!empty($v['url']))href="{{$v['url']}}"@endif target="_blank"></a>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination" id="swiper1-but"></div>
    </div>
</div>
@endif
<div class="con01">
    <ul style="text-align:center;">
        @foreach($index_1 as $v)
        <li>
            <div>
                <div class="font0">{!!$v['title']!!}</div>
                <div class="font1">{!!nl2br($v['desc'])!!}</div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
<div class="con02">
    <div class="con02-in">
        <div class="con02-Top">
            <div class="tit">
                <hr class="tit-hr">
                {{$index_2_cate['title']}}
                <hr class="tit-hr">
            </div>
            <div class="tit2">
                {!!nl2br($index_2_cate['cat_desc'])!!}
            </div>
        </div>
        <div class="con02-body">
            <div class="con02-bodyL">
                @if(isset($index_2['0']))
                <a href="{{$index_2['0']['url']}}"><img src="{{asset($index_2['0']['img'])}}" alt="{{$index_2['0']['alt']}}"></a>
                @endif
            </div>
            <div class="con02-bodyR">
                @if(isset($index_2['1']))
                <a href="{{$index_2['1']['url']}}"><img src="{{asset($index_2['1']['img'])}}" alt="{{$index_2['1']['alt']}}"></a>
                @endif
                @if(isset($index_2['2']))
                <a href="{{$index_2['2']['url']}}"><img src="{{asset($index_2['2']['img'])}}" alt="{{$index_2['2']['alt']}}"></a>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="con03">
    <div class="con03-in">
        <div class="con02-Top">
            <div class="tit">
                <hr class="tit-hr">
                {{$index_3_cate['title']}}
                <hr class="tit-hr">
            </div>
            <div class="tit2">
                {!!nl2br($index_3_cate['cat_desc'])!!}
            </div>
        </div>
    <div class="con02-con">
        <div class="tabBar">
            <div class="tabBarCon swiper-container swiper-container-horizontal">
                <div class="swiper-wrapper" >
                    @foreach($index_3 as $k=>$v)
                    <div class="swiper-slide @if($k%2==0) con02-left con02-new @else con02-right @endif" >
                        <h3>{!!$v['title']!!}</h3>
                        <div class="kh-video qy-video">
                            <img src="{{asset($v['img'])}}" alt="{{$v['alt']}}" class="fm show">
                            <video id="qiye-video" class="video-js vjs-default-skin" controls="">
                                <source src="{{$v['video']}}" type="video/mp4">
                            </video>
                            <!-- <embed id="qiye-video" class="video-js vjs-default-skin" src="https://imgcache.qq.com/tencentvideo_v1/playerv3/TPout.swf?max_age=86400&v=20161117&vid=h0665s7je28&auto=0" allowFullScreen="true" quality="high" width="516" height="290" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed> -->
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="tabBarprev swiper-button-prev swiper-button-disabled"></div>
                <div class="tabBarnext swiper-button-next"></div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    
</div>
<div class="con04">
    <div class="con04-in">
        <div class="con02-Top">
            <div class="tit">
                <hr class="tit-hr">
                {{$index_4_cate['title']}}
                <hr class="tit-hr">
            </div>
            <div class="tit2">
                {!!nl2br($index_4_cate['cat_desc'])!!}
            </div>
        </div>
        <div class="con04-body">
            <div class="con04-bodyL">
                <img src="{{asset($index_4_cate['img'])}}" alt="{{asset($index_4_cate['alt'])}}">
            </div>
            <div class="con04-bodyR">
                <div class="con04-tab">
                    <a class="con04-tabA1 on" href="javascript:;" target="_self">情感督导师</a>
                    <a class="con04-tabA2" href="javascript:;" target="_self">情感咨询师</a>
                </div>
                <div class="con04-con cur">
                    <!-- Swiper -->
                    <div class="swiper-container" id="swiper2">
                        <div class="swiper-wrapper" >
                            @foreach($index_5 as $v)
                            <div class="swiper-slide">
                                <a href="{{URL($index_5_cate['url'],$v['id'])}}">
                                    <img class="daoshi" src="{{asset($v['img2'])}}" alt="{{$v['alt2']}}">
                                    <div class="daoshi-desc">
                                        <p class="daoshi-descP">{{$v['title']}}</p>
                                        <p>{!!nl2br($v['desc'])!!}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="con04-bottom">
                        <a class="zx kefu_btn" href="javascript:;" target="_self">在线咨询</a>
                        <a class="yy footer-yy" href="javascript:;" target="_self">预约咨询</a>
                    </div>
                </div>
                <div class="con04-con">
                    <!-- Swiper -->
                    <div class="swiper-container" id="swiper3">
                        <div class="swiper-wrapper" >
                            @foreach($index_6 as $v)
                            <div class="swiper-slide">
                                <a href="{{URL($index_6_cate['url'],$v['id'])}}">
                                    <img class="daoshi" src="{{asset($v['img2'])}}" alt="{{$v['alt2']}}">
                                    <div class="daoshi-desc">
                                        <p class="daoshi-descP">{{$v['title']}}</p>
                                        <p>{!!nl2br($v['desc'])!!}</p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="con04-bottom">
                        <a class="zx kefu_btn" href="javascript:;" target="_self">在线咨询</a>
                        <a class="yy footer-yy" href="javascript:;" target="_self">预约咨询</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @parent
    <script>
        $(function(){
            var swiper = new Swiper('#swiper1', {
                autoplay: 3000,
                pagination: '#swiper1-but',
                paginationClickable: true
            });
            var mySwiper = new Swiper('.tabBarCon', {
                slidesPerView : 2,
                centeredSlides : false,
                slidesPerGroup : 2,
                prevButton:'.tabBarprev',
                nextButton:'.tabBarnext',
            })
            var swiper2 = new Swiper('#swiper2', {
                    pagination: '#swiper2-but',
                    paginationClickable: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev'
                });
            
            var swiper6 = new Swiper('#swiper6', {
                paginationClickable: true,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev'
            });
            

            $('.con04-tab a').click(function(event) {
               $(this).addClass('on').siblings().removeClass('on');
               var num = $(this).index();
               $('.con04-con').eq(num).show().siblings('.con04-con').hide();
               var swiper2 = new Swiper('#swiper2', {
                    pagination: '#swiper2-but',
                    paginationClickable: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev'
                });
                var swiper6 = new Swiper('#swiper3', {
                    paginationClickable: true,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev'
                });
            });
                var qiyeVideo = document.getElementById('qiye-video')
                var kehuVideo = document.getElementById('kehu-video')
                var kehuImg = $('.kehu-video .fm')
                var qiyeImg = $('.qy-video .fm')
                $('.video-play').click(function(event) {
                    $(this).hide();
                    document.getElementById('home-video').play();
                });
                $('.kehu-video img').click(function(event) {
                    $(this).removeClass('show');
                    $(this).siblings('video').get(0).play();
                    // document.getElementById('kehu-video').play();
                    qiyeVideo.pause();
                    $('.qy-video .mb').show();
                    if( qiyeImg.hasClass('show') ){
                        $('.qy-video .mb').hide()
                    }
                                         
                });
                $('.qy-video img').click(function(event) {
                    $(this).removeClass('show');
                    $(this).siblings('video').get(0).play();
                    // document.getElementById('qiye-video').play();
                    kehuVideo.pause();
                    $('.kehu-video .mb').show();
                    if( kehuImg.hasClass('show') ){
                        $('.kehu-video .mb').hide()
                    }
                });

                 $('.kh-video video').click(function(event) {
                     $(this).siblings('.mb').hide();
                     
                 });
                 $('#qiye-video').click(function(event) {
                     qiyeVideo.pause()
                 });
                 $('#kehu-video').click(function(event) {
                     kehuVideo.pause()
                 });
                 $('.kh-video .mb').click(function(event) {
                     $(this).hide()
                 });
        })
    </script>
@endsection