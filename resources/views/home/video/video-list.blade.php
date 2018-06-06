@extends('home.layouts.app')
@section('style')
    @parent
@endsection
@section('content')
    <div class="expert_con">
        @include('home.layouts.location')
        <div class="videoType">
            <form method="GET" id="demoform" action="{{URL('video-course')}}">
            <p>
                <span class="type">学习方向</span>
                <span name="cate_id" class="childtype colred filter" tag="">全部</span>
                @foreach($Category as $k=>$v)
                    <span name="cate_id" class="childtype filter" tag="{{$v['id']}}">{{$v['title']}}</span>
                @endforeach
            </p>
            <p>
                <span class="type">课程类型</span>
                <span name="type" class="childtype colred filter" tag="">全部</span>
                @foreach(trans("home.video.type") as $k=>$v)
                <span name="type" class="childtype filter" tag="{{$k}}">{{$v}}</span>
                @endforeach
            </p>
            <input type="hidden" name="cate_id" class="cate_id" value="{{request()->cate_id}}">
            <input type="hidden" name="type" class="type" value="{{request()->type}}">
            <input type="hidden" name="order" class="order" value="{{request()->order}}">
            </form>
        </div>
        <div class="videoCon">
            <p class="videoFilter">
                <span name="filter" class="colred filter" tag="new">最新发布</span><span name="filter" class="filter" tag="popular">人气最高</span>
            </p>
            <ul class="videoList">
                @foreach($video_list as $v)
                    <li>
                        <a href="{{URL('video-info',[$v])}}">
                            <div class="imgDiv">
                                <img class="videoPa" src="{{asset($v['img'])}}">
                                <p><img src="{{asset('resources/home/images/ico/ico22.png')}}">{{count($v['VideoCourseMany'])}}个课时</p>
                            </div>
                            <div class="videoTit"><p>{{$v['title']}}</p><span>897人正在学习</span> </div><div class="priceTag"> <p class="price colred">￥<span class="newprice">299</span> <span class="oldprice">358.80</span> </p> <p class="videotag"> <span>可试学</span> </p> </div> </a> </li>
                @endforeach
            </ul>
            @include('home.layouts.page',['page'=>$video_list])
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection