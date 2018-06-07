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
                <ul class="videoList"  id="pageDiv">
                    @foreach($video_list as $v)
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
                @include('home.layouts.page2',['page'=>$video_list])
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@parent
    
@endsection