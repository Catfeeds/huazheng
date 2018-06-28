@extends('mobile.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
@if(isset($banner)&&$banner->count())
<div class="banner">
    <div class="swiper-container" id="swiper1">
        <div class="swiper-wrapper">
            @foreach($banner as $v)
            <a @if(!empty($v['url']))href="{{$v['url']}}"@endif class="swiper-slide" >
                <img src="{{asset($v['image'])}}" alt="{{$v['alt']}}">
            </a>
            @endforeach
        </div>
        <div class="swiper-pagination" id="swiper1-but"></div>
    </div>
</div>
@endif
<div class="project">
    <p class="tabTit">
        {{$index_2_cate['title']}}
    </p>
    <div class="projectsw swiper-container">
        <div class="swiper-wrapper">
            @foreach($index_2 as $v)
            <a href="{{$v['url']}}" class="swiper-slide"><img src="{{asset($v['img'])}}" alt="{{$v['alt']}}"></a>
            @endforeach
        </div>
        <div class="projectpa swiper-pagination"></div>
    </div>
</div>
<div class="newvideo">
    <p class="tabTit">
        {{$index_3_cate['title']}}
    </p>
    <div class="newvideosw swiper-container">
        <div class="swiper-wrapper">
            @foreach($index_3 as $k=>$v)
            <div href="/love3" class="swiper-slide">
                <iframe frameborder="0" src="{{$v['video']}}" allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
        <div class="newvideopa swiper-pagination"></div>
    </div>
</div>
<div class="teacher">
    <p class="teacherTab">
        <a class="active" href="javascript:void(0)">
            <i class="iconfont icon-jiaoshi"></i>
            情感督导师
        </a>
        <a href="javascript:void(0)">
            <i class="iconfont icon-tuandui"></i>
            情感咨询师
        </a>
    </p>
    <div class="teachertab1 swiper-container">
        <div class="teachertab1sw swiper-wrapper">
            @foreach($index_5 as $v)
            <a href="{{URL($index_5_cate['url'],$v['id'])}}" class="swiper-slide">
                <img class="teImg" src="{{asset($v['img2'])}}" alt="{{$v['alt2']}}">
                <p class="teName">{{$v['title']}}</p>
                <div class="teType">
                    <p>{!!nl2br($v['desc'])!!}</p>
                </div>
            </a>
           @endforeach
        </div>
    </div>
    <div class="teachertab2 swiper-container">
        <div class="teachertab1sw swiper-wrapper">
            @foreach($index_6 as $v)
            <a href="{{URL($index_6_cate['url'],$v['id'])}}" class="swiper-slide">
                <img class="teImg" src="{{asset($v['img2'])}}" alt="{{$v['alt2']}}">
                <p class="teName">{{$v['title']}}</p>
                <div class="teType">
                    <p>{!!nl2br($v['desc'])!!}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<div class="others">
    <p class="tabTit">
        {{$index_7_cate['title']}}
    </p>
    <div class="otherssw0 othersw swiper-container">
        <div class="">
            @foreach($index_7 as $b_k=>$b_v)
            <a href="{{URL($index_7_cate['url'],$b_v['id'])}}" class="swiper-slide">
                <!-- <img src="{{asset($b_v['img'])}}" alt="{{$b_v['alt']}}"> -->
                <p class="othText">{{$b_v['title']}}</p>
            </a>
            @endforeach
        </div>
        <div class="otherspa1 otherspa swiper-pagination"></div>
    </div>
</div>
@endsection
@section('script')
    @parent
    <script>
        $(function(){
            //切换新闻
            // $(".con05-tab ul li").mouseenter(function(){
            //     $(this).addClass("on").siblings().removeClass("on");
            //     var _index = $(this).index();
            //     // var _news = ".con05-news"+_index;
            //     // $(".con05-zx").hide();
            //     // $(_news).show();
            //     $('.con05-zx').eq(_index).show().siblings('.con05-zx').hide();
            // });

            var swiper = new Swiper('#swiper1', {
                autoplay: 3000,
                pagination: '#swiper1-but',
                paginationClickable: true
            });
            var projectsw = new Swiper('.projectsw', {
                pagination : '.projectpa',
               
                slidesPerView : 1.8,
                spaceBetween : 20,
                autoplay : 4000
            });
            var newvideosw = new Swiper('.newvideosw', {
                pagination : '.newvideopa',
               
                slidesPerView : 1.5,
                spaceBetween : 20,
            });
            var storysw = new Swiper('.storysw', {
                pagination : '.storypa',
                
                slidesPerView : 1.5,
                spaceBetween : 20,
                autoplay : 4000
            });
            function tetab1(){
                var teachertab1 = new Swiper('.teachertab1', {
                    slidesPerView : 2.2,
                    spaceBetween : 15,
                });
            };
            function tetab2(){
                var teachertab2 = new Swiper('.teachertab2', {
                    slidesPerView : 2,
                    spaceBetween : 15,
                });
            };
            tetab1();
            // function othersw(sw){
            //     var sw = new Swiper('.' + sw, {
            //         pagination : '.otherspa',
            //         loop:true,
            //         autoplay : 4000
            //     });
            // };
            // othersw('otherssw0')
            // $(".teacherTab a").click(function(){
            //     $(this).addClass('active').siblings().removeClass('active');
            //     if($(this).index() == 0){
            //         $(".teachertab2").hide();
            //         $(".teachertab1").show();
            //         tetab1();
            //     }else{
            //         $(".teachertab2").show();
            //         $(".teachertab1").hide();
            //         tetab2()
            //     }
            // });
            // $(".otherTab a").click(function(){
            //     $(this).addClass('active').siblings().removeClass('active');
            //     for(var i=0;i<5;i++){
            //         if(i == $(this).index()){
            //             $(".otherssw"+i).show();
            //             othersw('otherssw'+i)
            //         }else{
            //             $(".otherssw"+i).hide();
            //         }
            //     }
            // });
            
            
            
            $(".videoI").click(function(){
                $(this).hide().siblings('.videov').show();
            })
            $(".newvideo img").click(function(){
                $(this).hide();
                $(this).siblings('video').get(0).play();
            })

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
                    document.getElementById('mobile-video').play();
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